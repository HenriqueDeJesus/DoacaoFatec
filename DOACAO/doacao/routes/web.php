<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DoacaoController;
use App\Http\Controllers\FuncionarioController;
/*
Route::get('/', function(){
    return view('welcome');
});*/

Route::get('/welcome', [DoacaoController::class, 'index']);
Route::get('/doacao/create', [DoacaoController::class, 'create']);
Route::post('/welcome/store', [DoacaoController::class, 'store']);

Route::get('/', [DoacaoController::class, 'sistema']);
Route::get('/cadastro', [DoacaoController::class, 'cadastro']);
Route::get('/loginUser', [DoacaoController::class, 'acesso']);

Route::get('/loginfuncionario', [FuncionarioController::class, 'loginfuncionario'])->name('funcionario.login');
Route::post('/loginfuncionario', [FuncionarioController::class, 'logar']);
Route::post('/loginfuncionario/logout', [FuncionarioController::class, 'logout']);
//Route::get('/loginfuncionario/dashboard', [FuncionarioController::class, 'dashboard']);
Route::get('/loginfuncionario/cadastro-funcionario', [FuncionarioController::class, 'create'])->middleware('verificar_tipo_usuario');
Route::post('/loginfuncionario/cadastro-funcionario', [FuncionarioController::class, 'store'])->middleware('verificar_tipo_usuario');
Route::get('/loginfuncionario/editar-funcionario/{id}', [FuncionarioController::class, 'editfuncionario'])->middleware('verificar_tipo_usuario');
Route::put('/loginfuncionario/editar-funcionario/{id}', [FuncionarioController::class, 'updateFuncionario'])->middleware('verificar_tipo_usuario');
Route::delete('/loginfuncionario/delete/{id}', [FuncionarioController::class, 'destroyFuncionario'])->middleware('verificar_tipo_usuario')->name('destroyFuncionario');


Route::get('/loginfuncionario/cadastro-produto', [FuncionarioController::class, 'createproduto'])->middleware('verificar_tipo_usuario');
Route::post('/loginfuncionario/cadastro-produto', [FuncionarioController::class, 'storeproduct'])->middleware('verificar_tipo_usuario');
Route::get('/loginfuncionario/editar-produto/{id}', [FuncionarioController::class, 'editproduto'])->middleware('verificar_tipo_usuario');
Route::put('/loginfuncionario/editar-produto/{id}', [FuncionarioController::class, 'updateProduto'])->middleware('verificar_tipo_usuario');
//Route::delete('/loginfuncionario/delete/{id}', [FuncionarioController::class, 'destroyProduto'])->middleware('verificar_tipo_usuario')->name('destroyProduto');
Route::delete('/loginfuncionario/deleteproduto/{id}', [FuncionarioController::class, 'destroyProduto'])->middleware('verificar_tipo_usuario')->name('destroyProduto');


Route::get('/loginfuncionario/cadastro-polo', [FuncionarioController::class, 'createpolo'])->middleware('verificar_tipo_usuario');
Route::post('/loginfuncionario/cadastro-polo', [FuncionarioController::class, 'storepolo'])->middleware('verificar_tipo_usuario');
Route::get('/loginfuncionario/editar-polo/{id}', [FuncionarioController::class, 'editpolo'])->middleware('verificar_tipo_usuario');
Route::put('/loginfuncionario/editar-polo/{id}', [FuncionarioController::class, 'updatePoloAndEndereco'])->middleware('verificar_tipo_usuario');
Route::delete('/loginfuncionario/delete/{id}', [FuncionarioController::class, 'destroyPolo'])->middleware('verificar_tipo_usuario')->name('destroyPolo');

/*Route::post('/loginfuncionario/editar-polo/{id}/editar-polo', [FuncionarioController::class, 'editpolo'])->name('polo.edit')->middleware('verificar_tipo_usuario');*/

Route::get('/loginfuncionario', function () {
    return view('/loginfuncionario');
})->name('pagina_acesso_nao_autorizado');

Route::get('/loginfuncionario/dashboard', [FuncionarioController::class, 'dashboard'])
    ->middleware('verificar_tipo_usuario');

Route::get('/loginfuncionario/sistemareservar', [FuncionarioController::class, 'reservar'])
    ->middleware('verificar_tipo_usuario');

Route::get('/loginfuncionario/sistemadoados', [FuncionarioController::class, 'doados'])
    ->middleware('verificar_tipo_usuario');

Route::get('/loginfuncionario/polos', [FuncionarioController::class, 'polo'])
    ->middleware('verificar_tipo_usuario');

Route::get('/loginfuncionario/funcionarios', [FuncionarioController::class, 'funcionario'])
    ->middleware('verificar_tipo_usuario');

Route::get('/loginfuncionario/edit/{id}/edit', [FuncionarioController::class, 'edit'])->name('doacaos.edit')
    ->middleware('verificar_tipo_usuario');

/*
Route::get('/loginfuncionario/edit/{id}/edit', [FuncionarioController::class, 'edit'])
    ->name('doacao.edit')
    ->middleware('verificar_tipo_usuario');*/

/*Route::get('/loginfuncionario/edit/{id}/edit', [FuncionarioController::class, 'edit'])->name('doacaos.edit')
    ->middleware('verificar_tipo_usuario');*/


//Route::get('/loginfuncionario/doacaos/{id}/edit', [FuncionarioController::class, 'edit'])->middleware('verificar_tipo_usuario');

/*Route::get('/loginfuncionario', [FuncionarioController::class, 'loginfuncionario']);
Route::post('/loginfuncionario', 'FuncionarioController@valida_login_fun');*/
/*
Route::get('/', [DoacaoController::class, 'index']);
Route::get('/doacao/create', [DoacaoController::class, 'create']);
Route::post('/doacao', [DoacaoController::class, 'store']);*/



Route::get('/contact', function () {
    return view('contact');
});


Route::get('/produtos', function () {

    $busca = request('search');

    return view('products', ['busca' => $busca]);
});


Route::get('/produtos_teste', [UsuarioController::class, 'index']);
Route::get('/produtos_teste/create', [UsuarioController::class, 'create']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
