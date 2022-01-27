<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [\App\Http\Controllers\HomeController::class , 'index']);
/*
Route::post('/user/registration', [\App\Http\Controllers\UserController::class, 'registration']);
Route::post('/user/authorization', [\App\Http\Controllers\UserController::class, 'authorization']);
Route::get('/user/{id}/show', [\App\Http\Controllers\UserController::class, 'show']);
Route::delete('/user/delete', [\App\Http\Controllers\UserController::class, 'delete']);
*/
/*Route::prefix('/user')->group(function (\Illuminate\Routing\Router $router)
{
    $router->post ('/registration', [\App\Http\Controllers\UserController::class, 'registration']);
    $router->post('/authorization', [\App\Http\Controllers\UserController::class, 'authorization']);
    $router->get('/{id}/show', [\App\Http\Controllers\UserController::class, 'show']);
    $router->delete('/delete', [\App\Http\Controllers\UserController::class, 'delete']);
}
);*/
Route::name('user.')->group(function (){
    Route::prefix('/user')->group(function (\Illuminate\Routing\Router $router)
    {
        $router->post ('/registration', [\App\Http\Controllers\UserController::class, 'registration'])->name('registration');
        $router->post('/authorization', [\App\Http\Controllers\UserController::class, 'authorization'])->name('authorization');
        $router->get('/{id}/show', [\App\Http\Controllers\UserController::class, 'show'])->name('show');
        $router->delete('/delete', [\App\Http\Controllers\UserController::class, 'delete'])->name('delete');
    }
    );
});
//Route::resource('task',\App\Http\Controllers\TaskController::class);
//    Route::get('task',[\App\Http\Controllers\TaskController::class, 'index'])->name("task-index");
//    Route::get('task/{id}/delete',[\App\Http\Controllers\TaskController::class, 'delete'])->name("task-delete");
//    Route::get('task/{id}/edit',[\App\Http\Controllers\TaskController::class, 'edit'])->name("task-edit");
//    Route::delete('task/{id}/delete/deleteTask',[\App\Http\Controllers\TaskController::class, 'deleteTask'])->name("task-deleteTask");
//    Route::patch('task/{id}/edit/editTask', [\App\Http\Controllers\TaskController::class, 'editTask'] )->name("task-editTask");
//    Route::get('task/create', [\App\Http\Controllers\TaskController::class, 'create'] )->name("task-create");
//    Route::put('task/create/createTask', [\App\Http\Controllers\TaskController::class, 'createTask'] )->name("task-createTask");
//Route::get('admin/task',[\App\Http\Controllers\AdminController::class, 'task']);
Route::name('task-')->group(function (){
    Route::prefix('/task')->group(function (\Illuminate\Routing\Router $router)
    {
        Route::get('/',[\App\Http\Controllers\TaskController::class, 'index'])->name("index");
        Route::get('/{id}/delete',[\App\Http\Controllers\TaskController::class, 'delete'])->name("delete");
        Route::get('/{id}/edit',[\App\Http\Controllers\TaskController::class, 'edit'])->name("edit");
        Route::delete('/{id}/delete/deleteTask',[\App\Http\Controllers\TaskController::class, 'destroy'])->name("destroy");
        Route::patch('/{id}/edit/editTask', [\App\Http\Controllers\TaskController::class, 'update'] )->name("update");
        Route::get('/create', [\App\Http\Controllers\TaskController::class, 'create'] )->name("create");
        Route::put('/create/createTask', [\App\Http\Controllers\TaskController::class, 'store'] )->name("store");
    }
    );
});
