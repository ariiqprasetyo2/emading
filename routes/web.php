<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function (\Illuminate\Http\Request $request) {
    if (auth()->check()) {
        return redirect('/dashboard');
    }
    
    $query = \App\Models\Artikel::with(['user', 'category', 'comments', 'likes'])
                                ->where('status', 'publish');
    
    if ($request->search) {
        $query->where('judul', 'like', '%' . $request->search . '%')
              ->orWhere('isi', 'like', '%' . $request->search . '%');
    }
    
    if ($request->category) {
        $query->where('id_kategori', $request->category);
    }
    
    $articles = $query->latest()->paginate(10);
    return view('welcome', compact('articles'));
});

Route::get('/public/articles/{id}', function($id) {
    $article = \App\Models\Artikel::with(['user', 'category', 'comments.user', 'likes'])
                                  ->where('status', 'publish')
                                  ->findOrFail($id);
    return view('public.article', compact('article'));
})->name('public.article');

Route::get('/public/articles/{id}/pdf', [\App\Http\Controllers\PdfController::class, 'exportArticle'])->name('public.articles.pdf');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Article routes
Route::middleware('auth')->group(function () {
    Route::get('/articles', [\App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [\App\Http\Controllers\ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [\App\Http\Controllers\ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/my', [\App\Http\Controllers\ArticleController::class, 'myArticles'])->name('articles.my');
    Route::get('/articles/{id}', [\App\Http\Controllers\ArticleController::class, 'show'])->name('articles.show');
    Route::get('/articles/{id}/edit', [\App\Http\Controllers\ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{id}', [\App\Http\Controllers\ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{id}', [\App\Http\Controllers\ArticleController::class, 'destroy'])->name('articles.destroy');
    Route::post('/articles/{id}/comment', [\App\Http\Controllers\ArticleController::class, 'storeComment'])->name('articles.comment');
    Route::post('/articles/{id}/publish', [\App\Http\Controllers\ArticleController::class, 'publish'])->name('articles.publish');
    Route::post('/articles/{id}/unpublish', [\App\Http\Controllers\ArticleController::class, 'unpublish'])->name('articles.unpublish');
    Route::post('/articles/{id}/like', [\App\Http\Controllers\LikeController::class, 'toggle'])->name('articles.like');
    Route::get('/articles/{id}/pdf', [\App\Http\Controllers\PdfController::class, 'exportArticle'])->name('articles.pdf');
    
    // Notification routes
    Route::get('/notifications', [\App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/{id}/read', [\App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('notifications.mark-read');
    Route::get('/notifications/mark-all-read', [\App\Http\Controllers\NotificationController::class, 'markAllAsRead'])->name('notifications.mark-all-read');
    
    // Admin routes
    Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/categories', [\App\Http\Controllers\AdminController::class, 'categories'])->name('categories');
        Route::post('/categories', [\App\Http\Controllers\AdminController::class, 'storeCategory'])->name('categories.store');
        Route::put('/categories/{id}', [\App\Http\Controllers\AdminController::class, 'updateCategory'])->name('categories.update');
        Route::delete('/categories/{id}', [\App\Http\Controllers\AdminController::class, 'deleteCategory'])->name('categories.delete');
        Route::get('/articles', [\App\Http\Controllers\AdminController::class, 'articles'])->name('articles');
        Route::post('/articles/{id}/approve', [\App\Http\Controllers\AdminController::class, 'approveArticle'])->name('articles.approve');
        Route::post('/articles/{id}/reject', [\App\Http\Controllers\AdminController::class, 'rejectArticle'])->name('articles.reject');
        Route::delete('/articles/{id}', [\App\Http\Controllers\AdminController::class, 'deleteArticle'])->name('articles.delete');
        Route::get('/users', [\App\Http\Controllers\AdminController::class, 'users'])->name('users');
        Route::post('/users', [\App\Http\Controllers\AdminController::class, 'storeUser'])->name('users.store');
        Route::put('/users/{id}', [\App\Http\Controllers\AdminController::class, 'updateUser'])->name('users.update');
        Route::delete('/users/{id}', [\App\Http\Controllers\AdminController::class, 'deleteUser'])->name('users.delete');
        Route::get('/reports', [\App\Http\Controllers\AdminController::class, 'reports'])->name('reports');
    });
    
    // Guru routes
    Route::middleware(['auth'])->prefix('guru')->name('guru.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\GuruController::class, 'dashboard'])->name('dashboard');
        Route::get('/my-articles', [\App\Http\Controllers\GuruController::class, 'myArticles'])->name('my-articles');
        Route::get('/student-articles', [\App\Http\Controllers\GuruController::class, 'studentArticles'])->name('student-articles');
        Route::post('/articles/{id}/approve', [\App\Http\Controllers\GuruController::class, 'approveArticle'])->name('articles.approve');
        Route::post('/articles/{id}/reject', [\App\Http\Controllers\GuruController::class, 'rejectArticle'])->name('articles.reject');
        Route::get('/comments', [\App\Http\Controllers\GuruController::class, 'comments'])->name('comments');
    });
});