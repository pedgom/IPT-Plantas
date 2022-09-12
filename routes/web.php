<?php

use App\Http\Controllers\PlantaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SettingController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('base-dados', [App\Http\Controllers\BaseDadosController::class, 'index'])->name('base_dados.layout');

Route::get('search-plantas', [App\Http\Controllers\HomeController::class, 'search'])->name('home.search');

Route::get('get-plantas', [App\Http\Controllers\PlantaController::class, 'getPlantas'])->name('plantas.get_plantas');
//only users autenticated and with email verified can access the following routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('home');

    Route::post('/api-upload', [HomeController::class,'apiUpload'])->name('home.api_upload');
    Route::delete('/api-upload-delete', [HomeController::class,'apiUploadDelete'])->name('home.api_upload_delete');

    Route::post('/renew-model-lock', [HomeController::class,'renewModelLock'])->name('home.renew_model_lock');

    Route::get('/users', [UserController::class,'index'])->name('users.index');
    Route::post('/users', [UserController::class,'store'])->name('users.store');
    Route::get('/users/create', [UserController::class,'create'])->name('users.create');
    Route::get('/users/get-users', [UserController::class,'getUsers'])->name('users.get_users');
    Route::get('/users/{user}', [UserController::class,'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class,'edit'])->name('users.edit');
    Route::patch('/users/{user}', [UserController::class,'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class,'destroy'])->name('users.destroy');

    //Route::middleware('can:adminApp')->group(function () { // dava problemas no leave impersonation
    Route::impersonate();
    //});

    Route::resource('roles', RoleController::class)->middleware('can:adminFullApp');
    Route::patch('/roles/{role}/update-permissions', [RoleController::class,'updatePermissions'])->name('roles.update_permissions')->middleware('can:adminFullApp');
    Route::resource('permissions', PermissionController::class)->middleware('can:adminFullApp');

    Route::resource('settings', SettingController::class)->middleware('can:adminFullApp');
    //Route::resource('settings', SettingController::class)->middleware('can:viewAny,App\Models\Setting'); // não funciona porque vai aplicar sempre a mesma policy tinha que separar todas as routes



    /*Route::resource('testes', TesteController::class)->parameters([
        'testes' => 'teste'
    ]); //para escolher um parametro diferentes dava erro e em vez de teste estava a meter testis*/
    Route::get('/demos/get-demos', [App\Http\Controllers\DemoController::class,'getDemos'])->name('demos.get_demos');
    Route::resource('demos', App\Http\Controllers\DemoController::class);

    Route::resource('plantas', App\Http\Controllers\PlantaController::class)->except('index');

});

require __DIR__.'/auth.php';

Route::get('plantas', [App\Http\Controllers\PlantaController::class,'index'])->name('plantas.index');


Route::resource('altura-atributos', App\Http\Controllers\AlturaAtributoController::class)->except('index');
Route::get('alturaAtributos', [App\Http\Controllers\AlturaAtributoController::class,'index'])->name('altura-atributos.index');


Route::resource('altura-atributo-plantas', App\Http\Controllers\AlturaAtributoPlantaController::class)->except('index');;
Route::get('alturaAtributoPlantas', [App\Http\Controllers\AlturaAtributoPlantaController::class,'index'])->name('altura-atributo-plantas.index');

Route::resource('categoria-atributos', App\Http\Controllers\CategoriaAtributoController::class)->except('index');
Route::get('categoriaAtributos', [App\Http\Controllers\CategoriaAtributoController::class,'index'])->name('categoria-atributos.index');


Route::resource('categoria-atributo-plantas', App\Http\Controllers\CategoriaAtributoPlantaController::class)->except('index');;
Route::get('categoriaAtributoPlantas', [App\Http\Controllers\CategoriaAtributoPlantaController::class,'index'])->name('categoria-atributo-plantas.index');



Route::resource('luz-atributos', App\Http\Controllers\LuzAtributoController::class)->except('index');
Route::get('luzAtributos', [App\Http\Controllers\LuzAtributoController::class,'index'])->name('luz-atributos.index');


Route::resource('luz-atributo-plantas', App\Http\Controllers\LuzAtributoPlantaController::class)->except('index');;
Route::get('luzAtributoPlantas', [App\Http\Controllers\LuzAtributoPlantaController::class,'index'])->name('luz-atributo-plantas.index');

Route::resource('diametro-atributos', App\Http\Controllers\DiametroAtributoController::class)->except('index');
Route::get('diametroAtributos', [App\Http\Controllers\DiametroAtributoController::class,'index'])->name('diametro-atributos.index');


Route::resource('diametro-atributo-plantas', App\Http\Controllers\DiametroAtributoPlantaController::class)->except('index');;
Route::get('diametroAtributoPlantas', [App\Http\Controllers\DiametroAtributoPlantaController::class,'index'])->name('diametro-atributo-plantas.index');



Route::resource('densidade-atributos', App\Http\Controllers\DensidadeAtributoController::class)->except('index');
Route::get('densidadeAtributos', [App\Http\Controllers\DensidadeAtributoController::class,'index'])->name('densidade-atributos.index');


Route::resource('densidade-atributo-plantas', App\Http\Controllers\DensidadeAtributoPlantaController::class)->except('index');;
Route::get('densidadeAtributoPlantas', [App\Http\Controllers\DensidadeAtributoPlantaController::class,'index'])->name('densidade-atributo-plantas.index');



Route::resource('agua-atributos', App\Http\Controllers\AguaAtributoController::class)->except('index');
Route::get('aguaAtributos', [App\Http\Controllers\AguaAtributoController::class,'index'])->name('agua-atributos.index');


Route::resource('agua-atributo-plantas', App\Http\Controllers\AguaAtributoPlantaController::class)->except('index');;
Route::get('aguaAtributoPlantas', [App\Http\Controllers\AguaAtributoPlantaController::class,'index'])->name('agua-atributo-plantas.index');




Route::resource('resistencia-atributos', App\Http\Controllers\ResistenciaAtributoController::class)->except('index');
Route::get('resistenciaAtributos', [App\Http\Controllers\ResistenciaAtributoController::class,'index'])->name('resistencia-atributos.index');


Route::resource('resistencia-atributo-plantas', App\Http\Controllers\ResistenciaAtributoPlantaController::class)->except('index');;
Route::get('resistenciaAtributoPlantas', [App\Http\Controllers\ResistenciaAtributoPlantaController::class,'index'])->name('resistencia-atributo-plantas.index');


Route::resource('solo-atributos', App\Http\Controllers\SoloAtributoController::class)->except('index');
Route::get('soloAtributos', [App\Http\Controllers\SoloAtributoController::class,'index'])->name('solo-atributos.index');

Route::resource('solo-atributo-plantas', App\Http\Controllers\SoloAtributoPlantaController::class)->except('index');;
Route::get('soloAtributoPlantas', [App\Http\Controllers\SoloAtributoPlantaController::class,'index'])->name('solo-atributo-plantas.index');


Route::resource('ph-solo-atributos', App\Http\Controllers\PhSoloAtributoController::class)->except('index');
Route::get('phSoloAtributos', [App\Http\Controllers\PhSoloAtributoController::class,'index'])->name('ph-solo-atributos.index');

Route::resource('ph-solo-atributo-plantas', App\Http\Controllers\PhSoloAtributoPlantaController::class)->except('index');;
Route::get('phsoloAtributoPlantas', [App\Http\Controllers\PhSoloAtributoPlantaController::class,'index'])->name('ph-solo-atributo-plantas.index');



Route::resource('estacao-atributos', App\Http\Controllers\EstacaoAtributoController::class)->except('index');
Route::get('estacaoAtributos', [App\Http\Controllers\EstacaoAtributoController::class,'index'])->name('estacao-atributos.index');

Route::resource('estacao-atributo-plantas', App\Http\Controllers\EstacaoAtributoPlantaController::class)->except('index');;
Route::get('estacaoAtributoPlantas', [App\Http\Controllers\EstacaoAtributoPlantaController::class,'index'])->name('estacao-atributo-plantas.index');









Route::resource('descritorAtributos', App\Http\Controllers\DescritorAtributoController::class);
Route::get('descritorAtributos', [App\Http\Controllers\DescritorAtributoController::class,'index'])->name('descritor-atributos.index');




Route::resource('situacaoEcologicaAtributos', App\Http\Controllers\SituacaoEcologicaAtributoController::class);


Route::resource('origemAtributos', App\Http\Controllers\OrigemAtributoController::class);
Route::get('origemAtributos', [App\Http\Controllers\OrigemAtributoController::class,'index'])->name('origem-atributos.index');


Route::resource('origemRelacaoAtributos', App\Http\Controllers\OrigemRelacaoAtributoController::class);


Route::resource('aplicacaoAtributos', App\Http\Controllers\AplicacaoAtributoController::class);
Route::get('aplicacaoAtributos', [App\Http\Controllers\AplicacaoAtributoController::class,'index'])->name('aplicacao-atributos.index');


Route::resource('colecaoAtributos', App\Http\Controllers\ColecaoAtributoController::class);
Route::get('colecaoAtributos', [App\Http\Controllers\ColecaoAtributoController::class,'index'])->name('colecao-atributos.index');


Route::resource('especieZonaAtributos', App\Http\Controllers\EspecieZonaAtributoController::class);
Route::get('especieZonaAtributos', [App\Http\Controllers\EspecieZonaAtributoController::class,'index'])->name('especie-zona-atributos.index');


Route::resource('especieQuercusAtributos', App\Http\Controllers\EspecieQuercusAtributoController::class);
Route::get('especieQuercusAtributos', [App\Http\Controllers\EspecieQuercusAtributoController::class,'index'])->name('especie-quercus-atributos.index');


Route::resource('formaArvoreAtributos', App\Http\Controllers\FormaArvoreAtributoController::class);

Route::get('importPlantas', [App\Http\Controllers\PlantaController::class, 'importPlantas'])->name('plantas.import_plantas');
Route::post('submitPlantas', [App\Http\Controllers\PlantaController::class, 'submitPlantas'])->name('plantas.submit_plantas');







Route::resource('familiaAtributos', App\Http\Controllers\FamiliaAtributoController::class);
Route::resource('formaArbustoAtributos', App\Http\Controllers\FormaArbustoAtributoController::class);
Route::resource('corSinteseAtributos', App\Http\Controllers\CorSinteseAtributoController::class);
Route::resource('formaArvoreAtributos', App\Http\Controllers\FormaArvoreAtributoController::class);
Route::resource('formaHerbaceaAtributos', App\Http\Controllers\FormaHerbaceaAtributoController::class);
Route::resource('generoAtributos', App\Http\Controllers\GeneroAtributoController::class);
Route::resource('ordemAtributos', App\Http\Controllers\OrdemAtributoController::class);
Route::resource('origemRelacaoAtributos', App\Http\Controllers\OrigemRelacaoAtributoController::class);
Route::resource('persistenciaAtributos', App\Http\Controllers\PersistenciaAtributoController::class);
Route::resource('situacaoEcologicaAtributos', App\Http\Controllers\SituacaoEcologicaAtributoController::class);
Route::resource('usoAtributos', App\Http\Controllers\UsoAtributoController::class);


//Route::get('corSinteseAtributos', [App\Http\Controllers\CorSinteseAtributoController::class,'index'])->name('cor-sintese-atributos.index');

//Route::resource('cor-sintese-atributos', App\Http\Controllers\CorSinteseAtributoController::class, ['names' => 'corSinteseAtributos'])->parameter('cor-sintese-atributos', 'corSinteseAtributo');

//Route::resource('estacaoSinteseAtributos', App\Http\Controllers\EstacaoSinteseAtributoController::class);





//Route::resource('media', App\Http\Controllers\MediaController::class);
