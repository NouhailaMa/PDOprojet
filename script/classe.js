$(document).ready(function () {
    var filiere = $("#filiere");
    $.ajax({
        url: 'Controller/FiliereController.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            var option = '<option selected>Choisi une filière</option>';
            for (var i = 0; i < data.length; i++) {
                option += '<option value="' + data[i].code + '">' + data[i].code + '</option>';
            }
            filiere.html(option);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });
    $.ajax({
        url: 'Controller/ClasseController.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            remplir(data);
            $('#myTable').DataTable();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });
    
    $('#btn').click(function () {
        var code = $("#code");
        var filiere = $("#filiere");
        var anneescolaire = $("#anneescolaire");
        if ($('#btn').text() == 'Enregistrer') {
            $.ajax({
                url: 'Controller/ClasseController.php',
                data: {op: 'add', code: code.val(), filiere: filiere.val(), anneescolaire: anneescolaire.val()},
                type: 'POST',
                datatype: 'json',
                success: function (data, textStatus, jqXHR) {
                    $('#myTable').DataTable().destroy();
                    remplir(data);
                    $('#myTable').DataTable();
                    code.val('');
                    filiere.val('');
                    anneescolaire.val('');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });
        }
    });
    
    $(document).on('click', '.modifier', function () {
        var btn = $('#btn');
    
        var id = $(this).closest('tr').find('th').text();
        var code = $(this).closest('tr').find('td').eq(0).text();
        var filiere = $(this).closest('tr').find('td').eq(1).text();
        var anneescolaire = $(this).closest('tr').find('td').eq(2).text();
        btn.text('Modifier');
        
        $("#code").val(code);
        $("#filiere").val(filiere);
        $("#anneescolaire").val(anneescolaire);
        $("#id").val(id);
        
        btn.click(function () {
            if ($('#btn').text() == 'Modifier') {
                $.ajax({
                    url: 'Controller/ClasseController.php',
                    data: {op: 'update', id: id, code: $("#code").val(), filiere: $("#filiere").val(), anneescolaire : $("#anneescolaire").val()},
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        $('#myTable').DataTable().destroy();
                        remplir(data);
                        $('#myTable').DataTable();
                        $("#code").val('');
                        $("#filiere").val('');
                        $("#anneescolaire").val('');
                        btn.text('Enregistrer');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
            }
        });
    });
    
    $(document).on('click', '.supprimer', function () {
        var id = $(this).closest('tr').find('th').text();
        $.ajax({
            url: 'Controller/ClasseController.php',
            data: {op: 'delete', id: id},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                $('#myTable').DataTable().destroy();
                remplir(data);
                $('#myTable').DataTable();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
    });
   
    function remplir(data) {
        
        var contenu = $('#table-content');
        var ligne = "";
        for (i = 0; i < data.length; i++) {
            ligne += '<tr><th>' + data[i].id + '</th>';
            ligne += '<td>' + data[i].code + '</td>';
            ligne += '<td>' + data[i].filiere + '</td>';
            ligne += '<td>' + data[i].anneescolaire + '</td>';
            ligne += '<td><button type="button" class="btn btn-outline-danger supprimer">Supprimer</button></td>';
            ligne += '<td><button type="button" class="btn  btn-outline-secondary modifier">Modifier</button></td></tr>';
        }
        contenu.html(ligne);
    }
});



