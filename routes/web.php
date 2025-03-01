<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RepresentanteController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PecuariaController;
use App\Http\Controllers\FamiliaController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\EstagioAnimalController;
use App\Http\Controllers\NutrienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\BibliotecaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;

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

Route::get('/clientes', function () {
    return view('clientes');
});

Route::get('/produtoscorte', [HomeController::class, 'produtosCorte'])->name('produtosCorte');

Route::get('/produto-{slug}', [HomeController::class, 'showProdutos'])->name('produto.show');

Route::get('/produtosleite', [HomeController::class, 'produtosLeite'])->name('produtosLeite');

Route::get('/regioesAtendidas', [HomeController::class, 'regioesAtendidas'])->name('regioesatendidas');

Route::get('/blog', [HomeController::class, 'blog'])->name('blog');

Route::get('/materia-{slug}', [HomeController::class, 'showPost'])->name('blog.post');

//Route::get('/produtos', function () {
//    return view('produtos');
//});
//Route::get('/gerarSenha', [HomeController::class, 'gerarSenha']);
// Representantes //
// Representantes //
// Representantes //

Route::get('/dashboard/representantes', [RepresentanteController::class, 'index'])->middleware('auth', 'isSuper')->name('representantes');

Route::post('/dashboard/addRep', [RepresentanteController::class, 'store'])->middleware('auth', 'isSuper')->name('dashboard.addRep');

Route::get('/dashboard/desativarRep{id}', [RepresentanteController::class, 'desativar'])->middleware('auth', 'isSuper')->name('dashboard.desativarRep');

Route::get('/dashboard/cidadesAtendidas/{user}', [RepresentanteController::class, 'cidadesAtendidas']);

Route::post('/dashboard/salvarCidadesAtendidas/{user}', [RepresentanteController::class, 'salvarCidadesAtendidas']);

Route::get('/dashboard/ativarRep{id}', [RepresentanteController::class, 'ativar'])->middleware('auth', 'isSuper')->name('dashboard.ativarRep');

Route::get('/dashboard/deletarRep{id}', [RepresentanteController::class, 'destroy'])->middleware('auth', 'isSuper')->name('dashboard.deletarRep');

// Representantes //
// Representantes //
// Representantes //
// Biblioteca
// 

Route::get('dashboard/biblioteca', [BibliotecaController::class, 'index'])->middleware('auth', 'isSuper');
Route::post('dashboard/biblioteca/upload', [BibliotecaController::class, 'store'])->middleware('auth', 'isSuper');
// 
// Biblioteca
// Usuários //
// Usuários //
// Usuários //

Route::get('/dashboard/usuarios', [UserController::class, 'index'])->middleware('auth', 'isAdmin')->name('dashboard/usuarios');

Route::post('/dashboard/addUser', [UserController::class, 'store'])->middleware('auth', 'isAdmin')->name('dashboard.addUser');

Route::get('/dashboard/desativarUser{id}', [UserController::class, 'desativar'])->middleware('auth', 'isAdmin')->name('dashboard.desativarUser');

Route::get('/dashboard/ativarUser{id}', [UserController::class, 'ativar'])->middleware('auth', 'isAdmin')->name('dashboard.ativarUser');

Route::get('/dashboard/deletarUser{id}', [UserController::class, 'destroy'])->middleware('auth', 'isAdmin')->name('dashboard.deletarUser');

// Usuários //
// Usuários //
// Usuários //
// Regiões atendidas //

Route::get('dashboard/buscarCidades/{estado}', [CidadeController::class, 'buscarCidades'])->middleware('auth', 'isSuper');

Route::get('/dashboard/regioesatendidas', [CidadeController::class, 'index'])->middleware('auth', 'isSuper')->name('dashboard.regioesatendidas')->middleware('auth', 'isSuper');

Route::post('dashboard/addRegiao', [CidadeController::class, 'addRegiao'])->middleware('auth', 'isSuper')->name('dashboard.addRegiao')->middleware('auth', 'isSuper');

Route::get('dashboard/buscarCidadesInativas{uf}', [CidadeController::class, 'buscarCidadesInativas'])->middleware(['auth', 'isSuper'])->name('dashboard.buscarCidadesInativas');

Route::get('dashboard/buscarCidadesAtivas{uf}', [CidadeController::class, 'buscarCidadesAtivas'])->middleware(['auth', 'isSuper'])->name('dashboard.buscarCidadesAtivas');

// Regiões atendidas //
// protudos e afins ///

Route::resource('dashboard/pecuarias', PecuariaController::class)->middleware('auth', 'isAdmin');

Route::resource('dashboard/familias', FamiliaController::class)->middleware('auth', 'isAdmin');

Route::resource('dashboard/periodos', PeriodoController::class)->middleware('auth', 'isAdmin');

Route::post('dashboard/periodos/{periodo}/produtos', [PeriodoController::class, 'attachProdutos'])->name('periodos.attachProdutos')->middleware('auth', 'isAdmin');

Route::post('dashboard/pecuarias/{pecuaria}/attach-produtos', [PecuariaController::class, 'attachProdutos'])->name('pecuarias.attachProdutos')->middleware('auth', 'isAdmin');

Route::resource('dashboard/estagios', EstagioAnimalController::class)->middleware('auth', 'isAdmin');

Route::post('dashboard/estagios/{estagio}/produtos', [EstagioAnimalController::class, 'attachProdutos'])->name('estagios.attachProdutos')->middleware('auth', 'isAdmin');

Route::resource('dashboard/nutrientes', NutrienteController::class)->middleware('auth', 'isAdmin');


Route::prefix('/dashboard/produtos')->group(function () {
    // CRUD principal
    Route::get('/', [ProdutoController::class, 'index'])->name('produtos.index')->middleware('auth', 'isSuper');
    Route::get('/create', [ProdutoController::class, 'create'])->name('produtos.create')->middleware('auth', 'isSuper');
    Route::post('/', [ProdutoController::class, 'store'])->name('produtos.store')->middleware('auth', 'isSuper');
    Route::get('/{produto}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit')->middleware('auth', 'isSuper');
    Route::put('/{produto}', [ProdutoController::class, 'update'])->name('produtos.update')->middleware('auth', 'isSuper');
    Route::delete('/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy')->middleware('auth', 'isAdmin');

    // Gerenciamento de Nutrientes
    Route::get('/{produto}/nutrientes', [ProdutoController::class, 'nutrientes'])->name('produtos.nutrientes')->middleware('auth', 'isSuper');
    Route::post('/{produto}/nutrientes', [ProdutoController::class, 'saveNutrientes'])->name('produtos.saveNutrientes')->middleware('auth', 'isSuper');

    // Gerenciamento de Pecuárias
    Route::get('/{produto}/pecuarias', [ProdutoController::class, 'pecuarias'])->name('produtos.pecuarias')->middleware('auth', 'isSuper');
    Route::post('/{produto}/pecuarias', [ProdutoController::class, 'savePecuarias'])->name('produtos.savePecuarias')->middleware('auth', 'isSuper');

    // Gerenciamento de Períodos
    Route::get('/{produto}/periodos', [ProdutoController::class, 'periodos'])->name('produtos.periodos')->middleware('auth', 'isSuper');
    Route::post('/{produto}/periodos', [ProdutoController::class, 'savePeriodos'])->name('produtos.savePeriodos')->middleware('auth', 'isSuper');

    // Gerenciamento de Estágios Animais
    Route::get('/{produto}/estagios', [ProdutoController::class, 'estagiosAnimais'])->name('produtos.estagios')->middleware('auth', 'isSuper');
    Route::post('/{produto}/estagios', [ProdutoController::class, 'saveEstagiosAnimais'])->name('produtos.saveEstagios')->middleware('auth', 'isSuper');
});

Route::get('dashboard/produtos/{id}/pdf', [DashboardController::class, 'generatePdf'])->name('produtos.pdf')->middleware('auth');
Route::get('dashboard/produtos/{id}/preview', [DashboardController::class, 'previewPdf'])->name('produtos.preview')->middleware('auth', 'isSuper');

// protudos e afins ///


Route::get('dashboard/tags', [TagController::class, 'index'])->middleware(['auth', 'isSuper'])->name('tags.index');

Route::get('dashboard/tags/create', [TagController::class, 'create'])->middleware(['auth', 'isSuper'])->name('tags.create');

Route::post('dashboard/tags', [TagController::class, 'store'])->middleware(['auth', 'isSuper'])->name('tags.store');

Route::get('dashboard/tags/{tag}/edit', [TagController::class, 'edit'])->middleware(['auth', 'isAdmin'])->name('tags.edit');

Route::put('dashboard/tags/{tag}', [TagController::class, 'update'])->middleware(['auth', 'isAdmin'])->name('tags.update');

Route::delete('dashboard/tags/{tag}', [TagController::class, 'destroy'])->middleware(['auth', 'isAdmin'])->name('tags.destroy');

// Listagem de posts (acessível por superusuários)
Route::get('dashboard/posts', [PostController::class, 'index'])->middleware(['auth', 'isSuper'])->name('posts.index');

// Criação de um novo post (acessível por superusuários)
Route::get('dashboard/posts/create', [PostController::class, 'create'])->middleware(['auth', 'isSuper'])->name('posts.create');

// Armazenar um novo post (acessível por superusuários)
Route::post('dashboard/posts', [PostController::class, 'store'])->middleware(['auth', 'isSuper'])->name('posts.store');

// Edição de um post existente (acessível por administradores)
Route::get('dashboard/posts/{post}/edit', [PostController::class, 'edit'])->middleware(['auth', 'isAdmin'])->name('posts.edit');

// Atualização de um post existente (acessível por administradores)
Route::put('dashboard/posts/{post}', [PostController::class, 'update'])->middleware(['auth', 'isAdmin'])->name('posts.update');

// Exclusão de um post existente (acessível por administradores)
Route::delete('dashboard/posts/{post}', [PostController::class, 'destroy'])->middleware(['auth', 'isAdmin'])->name('posts.destroy');

// Alterar o status do post (acessível por administradores)
Route::patch('dashboard/posts/{slug}/status', [PostController::class, 'updateStatus'])->middleware(['auth', 'isAdmin'])->name('posts.updateStatus');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware('auth', 'isAdmin');
});

require __DIR__ . '/auth.php';
