<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Response;
//use Illuminate\Http\Response;

class TarefaController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //DD("Index");
        return view('tarefa', ['tarefas' => Tarefa::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Response::json($tarefa); //Via javaScript
        //return view('tarefa.create', ['tarefa' => Tarefa::TAREFA]); //Via Http
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
        return Response::json($tarefa); // Via javaScript
        //return  view('tarefa.show', ['tarefa' => $tarefa]); //Via Http
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        $tarefa->update(\request()->all());
        //flash('Tarefa editada')->success();
        return Response::json($tarefa);
        return redirect("products/$product->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        //flash('Tarefa deletada')->success();
        return Response::json($tarefa->id);
        //return redirect('/tarefa');
    }
}
