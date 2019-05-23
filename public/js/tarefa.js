$(document).ready(function(){

    var url = "/tarefas";

    //exibir formulário modal para edição de tarefas
    $('.open-modal').click(function(){
        var tarefa_id = $(this).val();

        $.get(url + '/' + tarefa_id, function (data) {
            //success data
            console.log(data);
            $('#tarefa_id').val(data.id);
            $('#tarefa').val(data.tarefa);
            $('#descricao').val(data.descricao);
            $('#feito').val(data.feito);
            $('#btn-salvar').val("update");

            $('#myModal').modal('show');
        }) 
    });

    //exibir formulário modal para criar nova tarefa
    $('#btn-add').click(function(){
        $('#btn-salvar').val("add");
        $('#frmTarefas').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete tarefa e remove item da lista
    $('.deletar-tarefa').click(function(){
        var tarefa_id = $(this).val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: "DELETE",
            url: url + '/' + tarefa_id,
            success: function (data) {
                console.log(data);

                $("#tarefa" + tarefa_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    //cria nova tarefa / atualiza tarefa existente
    $("#btn-salvar").click(function (e) {
        alert("dsjc");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault(); 

        var formData = {
            tarefa: $('#tarefa').val(),
            descricao: $('#descricao').val(),
            feito: ( ($("#feito")[0].checked == true) ? 1 : 0 ),
        }

        //usado para determinar o verbo http para usar [add = POST], [update = PUT]
        var state = $('#btn-salvar').val();

        var type = "POST"; //para criar novo recurso
        var tarefa_id = $('#tarefa_id').val();;
        var my_url = url;

        if (state == "update"){
            type = "PUT"; //para atualizar o recurso existente
            my_url += '/' + tarefa_id;
        }

        console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                var tarefa = '<tr id="tarefa' + data.id + '"><td>' + data.id + '</td><td>' + data.tarefa + '</td><td>' + data.descricao + '</td><td>' + data.feito + '</td><td>' + data.created_at + '</td>';
                tarefa += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Editar</button>';
                tarefa += '<button class="btn btn-danger btn-xs btn-delete deletar-tarefa" value="' + data.id + '">Deletar</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#tarefas-listar').append(tarefa);
                }else{ //if user updated an existing record

                    $("#tarefa" + tarefa_id).replaceWith( tarefa );
                }

                $('#frmTarefas').trigger("reset");

                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});