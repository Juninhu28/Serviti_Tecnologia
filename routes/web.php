<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\ChamadoController;
use App\Http\Controllers\DemandaController;

Route::resource('chamados', ChamadoController::class);
Route::resource('servicos', ServicoController::class);
Route::resource('tecnicos', TecnicoController::class);
Route::resource('clientes', ClienteController::class);

// Rotas para demandas
Route::get('/chamados/{id}/demandas', [DemandaController::class, 'indexPorChamado'])->name('demandas.indexPorChamado');
Route::get('/chamados/{id}/demandas/create', [DemandaController::class, 'create'])->name('demandas.create');
Route::post('/demandas', [DemandaController::class, 'store'])->name('demandas.store');
Route::delete('/demandas/{id}', [DemandaController::class, 'destroy'])->name('demandas.destroy'); 

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::resource('clientes', ClienteController::class)
     ->only(['index','create','store','edit','update','destroy']);

require __DIR__.'/auth.php';
