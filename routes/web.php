<?php

use App\Http\Controllers\DepartamentoController;
use App\Models\Departamento;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
//Para mandar datos al dashboard que quiera ver en modo invitado y dentro del dashboard en el controlador mandar los datos en la vista
/* Route::get('/dashboard', [ArticuloController::class, 'dashboard'])->middleware(['auth'])->name('dashboard'); */
//Cuando te autentiques te manda a la vista dashboard, cuando mandas a la ruta /dashboard si no estas autenticado te manda directo al login con este middleware

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::get('/departamentos/index', [DepartamentoController::class, 'index']);
Route::resource('departamentos', DepartamentoController::class);

/* Route::resource('albumes', AlbumController::class)
    ->parameters(['albumes' => 'album']); */
    //Cuando visualizamos las rutas salga asi albumes/{album} con php artisan route:list
    /*
    -GET /departamentos/index   => (INDEX) (select global) Crear este manual
   - GET  /departamentos departamentos.index => INDEX(select global)
    -GET   /departamentos/create departamentos.create => CREATE(formulario en blanco para INSERT)
    -POST  /departamentos departamentos.store => (graba la información)coge la request y valida
   - GET /departamentos/{departamento}/edit departamentos.edit => (Formulario para EDITAR)
   - PUT   /departamentos/{departamento} departamentos.update =>update (update de una fila)(MODIFICA)Cojo el id y los valores de la request
    -GET   /departamentos/{departamento} departamentos.show => show (select de una fila)
    -DELETE  /departamentos/{departamento} departamentos.destroy

    Route::put('/depart/{id}/update', [DepartController::class, 'update'])->name('depart.update');

    Route::middleware(['auth'])->group(function () {


    //Crea un middeleware de grupo en el cual antes de acceder a cualquier ruta debe estar logueado y el can es otro middleware que trae laravel que llama a la  Gate::define('dashboard-especialista' que esta en app->providers->AuthServi... en boot y comprueba si es paciente sigue la ejecucuión si no da fallo.

    middleware(['auth', 'can:dashboard-especialista'])


    */
