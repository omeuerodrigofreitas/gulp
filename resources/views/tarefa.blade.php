

<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Lista de Tarefa</title>

    <!-- Load Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-narrow">
        <h2>Lista de Tarefa</h2>
        <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Task</button>
        <div>

            <!-- Table-to-load-the-data Part -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tarefa</th>
                        <th>Descricao</th>
                        <th>Data Criada</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody id="tasks-list" name="tasks-list">
                    @foreach ($tarefas as $tarefa)
                    <tr id="task{{$tarefa->id}}">
                        <td>{{$tarefa->id}}</td>
                        <td>{{$tarefa->tarefa}}</td>
                        <td>{{$tarefa->descricao}}</td>
                        <td>{{$tarefa->created_at}}</td>
                        <td>
                            <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$tarefa->id}}">Editar</button>
                            <button class="btn btn-danger btn-xs btn-delete delete-task" value="{{$tarefa->id}}">Deletar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End of Table-to-load-the-data Part -->
            <!-- Modal (Pop up when detail button clicked) -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Ediatr Tarefa</h4>
                        </div>
                        <div class="modal-body">
                            <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="">

                                <div class="form-group error">
                                    <label for="inputTask" class="col-sm-3 control-label">Tarefa</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="tarefa" name="tarefa" placeholder="Task" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Descrição</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Description" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Feito</label>
                                    <div class="col-sm-9">
                                        <input type="checkbox" class="form-control" id="feito" name="feito" placeholder="Description" value="">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-salvar" value="add">Salvar Alterações</button>
                            <input type="hidden" id="task_id" name="task_id" value="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <meta name="_token" content="{!! csrf_token() !!}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{asset('js/tarefa.js')}}"></script>
</body>
</html>
