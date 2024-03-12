<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RepresentanteController;
use App\Http\Controllers\CidadeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sobrenos', function () {
    return view('sobrenos');
});

Route::get('/ondecomprar', function () {
    return view('ondecomprar');
});

Route::get('/contato', function () {
    return view('contato');
});

Route::get('/regioesAtendidas', [HomeController::class, 'regioesAtendidas'])->name('regioesatendidas');

//Route::get('/produtos', function () {
//    return view('produtos');
//});

//Route::get('/gerarSenha', [HomeController::class, 'gerarSenha']);

// Representantes //
// Representantes //
// Representantes //

Route::get('/dashboard/representantes', [RepresentanteController::class, 'index'])->middleware('auth', 'isSuper')->name('representantes');
Route::post('/dashboard/addRep', [RepresentanteController::class, 'store'])->middleware('auth', 'isSuper')->name('dashboard.addRep');

// Representantes //
// Representantes //
// Representantes //

// Regiões atendidas //
// Regiões atendidas //
// Regiões atendidas //

Route::get('/dashboard/regioesatendidas', [CidadeController::class, 'index'])->middleware('auth', 'isAdmin')->name('dashboard.regioesatendidas');

Route::post('dashboard/addRegiao', [CidadeController::class, 'addRegiao'])->middleware('auth', 'isAdmin')->name('dashboard.addRegiao');

Route::get('dashboard/buscarCidadesInativas{uf}', [CidadeController::class, 'buscarCidadesInativas'])->middleware(['auth', 'isSuper'])->name('dashboard.buscarCidadesInativas');

Route::get('dashboard/buscarCidadesAtivas{uf}', [CidadeController::class, 'buscarCidadesAtivas'])->middleware(['auth', 'isSuper'])->name('dashboard.buscarCidadesAtivas');

// Regiões atendidas //
// Regiões atendidas //
// Regiões atendidas //

Route::get('/clientes', function () {
    return view('clientes');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware('auth', 'isAdmin');
});

require __DIR__.'/auth.php';
