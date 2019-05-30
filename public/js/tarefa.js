$(document).ready(function(){

    var url = "/tarefa";

    //exibir formulário modal para edição de tarefas
    $('.open-modal').click(function(){
        alert("Clicou no editar");
        var tarefa_id = $(this).val();
        $.get(url + '/' + tarefa_id, function (data) {
            console.log(data);
            $('#tarefa_id').val(data.id);
            $('#tarefa').val(data.tarefa);
            $('#descricao').val(data.descricao);
            $('#feito').prop('checked', data.feito);
            $('#myModalLabel').html("Ediatr Tarefa");
            $('#btn-salvar').html("Editar");
            $('#btn-salvar').val("update");

            $('#myModal').modal('show');
        }) 
    });

    //exibir formulário modal para criar nova tarefa
    $('#btn-add').click(function(){
        $('#myModalLabel').html("Cadastrar Nova Tarefa");
        $('#btn-salvar').val("add");
        $('#btn-salvar').html("Cadastrar");
        $('#frmTarefas').trigger("reset");
        // $('#frmTarefas').each (function(){
        //     this.reset();
        //   });
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
        var tarefa_id = $('#tarefa_id').val();
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
                var feito;
                if (data.feito == 1) feito = "Feito";
                else feito = "Não";

                var tarefa = '<tr id="tarefa' + data.id + '"><td>' + data.id + '</td><td>' + data.tarefa + '</td><td>' + data.descricao + '</td><td>' + feito + '</td><td>' + data.created_at + '</td>';
                tarefa += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Editar</button>';
                tarefa += '<button class="btn btn-danger btn-xs btn-delete deletar-tarefa" value="' + data.id + '">Deletar</button></td></tr>';

                if (state == "add"){
                    $("#tarefas-listar").append(tarefa);
                    //$('body').load('#tarefas-listar');
                    //$('body').on('load', "#tarefas-listar");

                    // $('.open-modal').live('click', function(){
                    //     $("#tarefas-listar").append(tarefa);
                    // });

                    //$("#tarefas-listar").onload();
                    
                    // $(document).ready(function(){
                    //     $("#tarefas-listar").append(tarefa);
                    // });
                   // $("#tarefas-listar").on('click');

                    
                }else{ //se for update 

                    $("#tarefa" + tarefa_id).replaceWith( tarefa );
                }

                $('#frmTarefas').trigger("reset");

                $('#myModal').modal('hide');
                //$('body').load('#tarefas-listar');
                window.location.reload(true);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});