<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\ProgramDateController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProgramRegistrationController as AdminProgramRegistrationController;
use App\Http\Controllers\BlogPageController;
use App\Http\Controllers\GalleryPageController;
use App\Http\Controllers\ProgramRegistrationController;

// Language switching route
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'kn'])) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }
    return redirect()->back();
})->name('lang.switch');

// Main routes
Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/services', \App\Http\Controllers\ServicePageController::class)->name('services');

Route::get('/programs', \App\Http\Controllers\ProgramPageController::class)->name('programs.index');
Route::get('/programs/{program:slug}', [\App\Http\Controllers\ProgramPageController::class, 'show'])->name('programs.show');

// Program Registration with Payment
Route::post('/program-registration/create-order', [ProgramRegistrationController::class, 'createOrder'])->name('program.createOrder');
Route::post('/program-registration/verify-payment', [ProgramRegistrationController::class, 'verifyPayment'])->name('program.verifyPayment');

// Test Razorpay credentials (remove in production)
Route::get('/test-razorpay', function() {
    try {
        $api = new \Razorpay\Api\Api(config('services.razorpay.key'), config('services.razorpay.secret'));
        $orders = $api->order->all(['count' => 1]);
        return response()->json([
            'status' => 'success',
            'message' => 'Razorpay credentials are valid!',
            'key' => config('services.razorpay.key'),
            'orders_count' => count($orders->items)
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage(),
            'key' => config('services.razorpay.key'),
            'secret_length' => strlen(config('services.razorpay.secret'))
        ]);
    }
});

Route::get('/blog', [BlogPageController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogPageController::class, 'show'])->name('blog.show');

Route::get('/gallery', [GalleryPageController::class, 'index'])->name('gallery');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Programs
    Route::resource('programs', ProgramController::class);
    
    // Program Dates
    Route::prefix('programs/{program}')->name('programs.')->group(function () {
        Route::get('/dates', [ProgramDateController::class, 'index'])->name('dates.index');
        Route::get('/dates/create', [ProgramDateController::class, 'create'])->name('dates.create');
        Route::post('/dates', [ProgramDateController::class, 'store'])->name('dates.store');
        Route::get('/dates/{date}/edit', [ProgramDateController::class, 'edit'])->name('dates.edit');
        Route::put('/dates/{date}', [ProgramDateController::class, 'update'])->name('dates.update');
        Route::delete('/dates/{date}', [ProgramDateController::class, 'destroy'])->name('dates.destroy');
    });
    
    // Blogs
    Route::resource('blogs', BlogController::class);
    
    // Services
    Route::resource('services', ServiceController::class)->except(['show']);
    
    // Gallery (combined)
    Route::resource('gallery', GalleryController::class)->except(['show']);
    
    // Photos (images only)
    Route::get('/photos', [GalleryController::class, 'photos'])->name('photos.index');
    
    // Videos (videos only)
    Route::get('/videos', [GalleryController::class, 'videos'])->name('videos.index');
    
    // Program Registrations
    Route::get('/registrations', [AdminProgramRegistrationController::class, 'index'])->name('registrations.index');
    Route::patch('/registrations/{registration}/status', [AdminProgramRegistrationController::class, 'updateStatus'])->name('registrations.updateStatus');
    Route::delete('/registrations/{registration}', [AdminProgramRegistrationController::class, 'destroy'])->name('registrations.destroy');
});

require __DIR__.'/auth.php';
