<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Tarefa;


class CreateTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tarefa');
            $table->text('descricao');
            $table->boolean('feito');
            $table->timestamps();
        });

        Tarefa::create([
            'tarefa' => 'Atualizar',
            'descricao' => 'Atualizar todos os dias a lista de tarefas',
            'feito' => false,
        ]);

        Tarefa::create([
            'tarefa' => 'Implementar',
            'descricao' => 'Imcrementar uma funcionalidade todos os dias em qualquer projeto MEU',
            'feito' => false,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarefas');
    }
}
