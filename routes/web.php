<?php

//prevent Call to undefined method Illuminate\Support\Facades\Request::all()
use Illuminate\Http\Request;

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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::redirect('/home', '/tarefa')->name('home');

Route::resource('tarefa', 'TarefaController')->middleware('auth');

//index retorna todos os dados
// Route::get('/tarefa', function () {
//     $tarefas = \App\Models\Tarefa::all();

//     return View::make('tarefa')->with('tarefas',$tarefas);
// });

//get id retorna o registro corespondente ao id
// Route::get('/tarefa/{tarefa_id?}',function($tarefa_id){
//     $tarefa = \App\Models\Tarefa::find($tarefa_id);

//     return Response::json($tarefa);
// });

// post
Route::post('/tarefa',function(Request $request){
    $tarefa = \App\Models\Tarefa::create($request->all());

    return Response::json($tarefa);
});

//store
// Route::put('/tarefa/{tarefa_id?}',function(Request $request,$tarefa_id){

// 	// dd($request);
//     $tarefa = \App\Models\Tarefa::find($tarefa_id);

//     $tarefa->tarefa = $request->tarefa;
//     $tarefa->descricao = $request->descricao;
//     $tarefa->feito = $request->feito;

//     $tarefa->save();

//     return Response::json($tarefa);
// });

//delete
// Route::delete('/tarefa/{tarefa_id?}',function($tarefa_id){
//     $tarefa = \App\Models\Tarefa::destroy($tarefa_id);

//     return Response::json($tarefa);
// });



//Route::get('/home', 'HomeController@index')->name('home');

Route::get('audits', 'AuditController@index')
    ->middleware('auth', \App\Http\Middleware\AllowOnlyAdmin::class);








// //prevent Call to undefined method Illuminate\Support\Facades\Request::all()
// use Illuminate\Http\Request;
// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |
// */

// Route::get('/', function () {
//     return view('welcome');
// });


//Route::get('/home', 'HomeController@index')->name('home');
// //Route::redirect('/home', '/tarefa');

// //index
// //Route::resource('tarefa', 'TarefaController')->middleware('auth');
// Route::get('/tarefa', function () {
//     $tarefas = \App\Models\Tarefa::all();

//     return View::make('tarefa')->with('tarefas',$tarefas);
// });

// //get id
// // Route::get('/tarefas/{tarefa_id?}',function($tarefa_id){
// //     $tarefa = \App\Tarefa::find($tarefa_id);

// //     return Response::json($tarefa);
// // });

// // post
// // Route::post('/tarefas',function(Request $request){
// //     $tarefa = \App\Tarefa::create($request->all());

// //     return Response::json($tarefa);
// // });

// //store
// Route::put('/tarefas/{tarefa_id?}',function(Request $request,$tarefa_id){

// 	// dd($request);
//     $tarefa = \App\Tarefa::find($tarefa_id);

//     $tarefa->tarefa = $request->tarefa;
//     $tarefa->descricao = $request->descricao;
//     $tarefa->feito = $request->feito;

//     $tarefa->save();

//     return Response::json($tarefa);
// });

// //delete
// Route::delete('/tarefas/{tarefa_id?}',function($tarefa_id){
//     $tarefa = \App\Tarefa::destroy($tarefa_id);

//     return Response::json($tarefa);
// });
// //Auth::routes();

// //Route::get('/home', 'HomeController@index')->name('home');









//Route::redirect('/', '/tarefas');

//Auth::routes();

//Route::redirect('/home', '/tarefas')->name('home');

//Route::resource('tarefas', 'TarefaController')->middleware('auth');


// Route::get('audits', 'AuditController@index')
//     ->middleware('auth', \App\Http\Middleware\AllowOnlyAdmin::class);
