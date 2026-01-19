<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

// ADMIN
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\StudioController as AdminStudio;
use App\Http\Controllers\Admin\JadwalController as AdminJadwal;
use App\Http\Controllers\Admin\ReservasiController as AdminReservasi;
use App\Http\Controllers\Admin\PembayaranController as AdminPembayaran;
use App\Http\Controllers\Admin\MetodePembayaranController as AdminMetodePembayaran;

// USER
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\User\StudioController as UserStudio;
use App\Http\Controllers\User\JadwalController as UserJadwal;
use App\Http\Controllers\User\ReservasiController as UserReservasi;
use App\Http\Controllers\User\PembayaranController as UserPembayaran;

/*
|--------------------------------------------------------------------------
| ROOT
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    if (auth()->check()) {
        $user = auth()->user();
        $dashboardRoute = $user && $user->role === 'admin' ? 'admin.dashboard' : 'users.dashboard';

        return redirect()->route($dashboardRoute);
    }

    return view('landing');
});


/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware(['auth', 'role:admin'])
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

        // STUDIO
        Route::resource('studio', AdminStudio::class)->except(['show']);

        // JADWAL (tanpa edit/update)
        Route::resource('jadwal', AdminJadwal::class)->except(['show', 'edit', 'update']);

        // RESERVASI
        Route::get('/reservasi', [AdminReservasi::class, 'index'])->name('reservasi.index');
        Route::get('/reservasi/{reservasi}', [AdminReservasi::class, 'show'])->name('reservasi.show');
        Route::put('/reservasi/{reservasi}/selesai', [AdminReservasi::class, 'selesai'])->name('reservasi.selesai');
        Route::put('/reservasi/{reservasi}', [AdminReservasi::class, 'update'])->name('reservasi.update');
        Route::delete('/reservasi/{reservasi}', [AdminReservasi::class, 'destroy'])->name('reservasi.destroy');
        Route::get('/laporan/pendapatan', [AdminReservasi::class, 'laporan'])->name('laporan.pendapatan');

        // USERS
        Route::resource('users', UserController::class);

        // PEMBAYARAN
        Route::get('/pembayaran', [AdminPembayaran::class, 'index'])->name('pembayaran.index');
        Route::post('/pembayaran/{id}/valid', [AdminPembayaran::class, 'validasi'])->name('pembayaran.valid');
        Route::post('/pembayaran/{id}/invalid', [AdminPembayaran::class, 'invalid'])->name('pembayaran.invalid');
        Route::get('/pembayaran/{id}/bukti', [AdminPembayaran::class, 'bukti'])
    ->name('pembayaran.bukti');

    });

/*
|--------------------------------------------------------------------------
| USER AREA
|--------------------------------------------------------------------------
*/
Route::prefix('users')
    ->middleware(['auth', 'role:users'])
    ->name('users.')
    ->group(function () {

        Route::get('/dashboard', [UserDashboard::class, 'index'])->name('dashboard');

        Route::get('/studio', [UserStudio::class, 'index'])->name('studio');
        Route::get('/studio/{id}', [UserStudio::class, 'show'])->name('studio.detail');

        Route::get('/jadwal/{studio}', [UserJadwal::class, 'index'])->name('jadwal');

        Route::get('/reservasi/create/{studio}', [UserReservasi::class, 'create'])->name('reservasi.create');
        Route::post('/reservasi', [UserReservasi::class, 'store'])->name('reservasi.store');
        Route::post('/reservasi/jadwal-terbooking', [UserReservasi::class, 'jadwalTerbooking'])->name('reservasi.jadwal');
        Route::get('/reservasi/{id}', [UserReservasi::class, 'show'])->name('reservasi.show');
        Route::get('/reservasi/{id}/struk', [UserReservasi::class, 'struk'])->name('reservasi.struk');
        Route::get('/reservasi', [UserReservasi::class, 'index'])->name('reservasi.index');

        // PEMBAYARAN
        Route::get('/pembayaran/{reservasi}', [UserPembayaran::class, 'create'])->name('pembayaran.create');
        Route::post('/pembayaran', [UserPembayaran::class, 'store'])->name('pembayaran.store');
        Route::get('/pembayaran/qris/{pembayaran}', [UserPembayaran::class, 'showQris'])->name('pembayaran.qris');


    });

require __DIR__.'/auth.php';
