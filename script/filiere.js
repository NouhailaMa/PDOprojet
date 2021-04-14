$(document).ready(function () { 
    $.ajax({
        url: 'Controller/FiliereController.php',
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
        var libelle = $("#libelle");
        if ($('#btn').text() == 'Enregistrer') {
            $.ajax({
                url: 'Controller/FiliereController.php',
                data: {op: 'add', libelle: libelle.val(), code: code.val()},
                type: 'POST',
                datatype: 'json',
                success: function (data, textStatus, jqXHR) {
                    $('#myTable').DataTable().destroy();
                    remplir(data);
                    $('#myTable').DataTable();
                    code.val('');
                    libelle.val('');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });
        }
    });
    
    $(document).on('click', '.supprimer', function () {
        var id = $(this).closest('tr').find('th').text();
        $.ajax({
            url: 'Controller/FiliereController.php',
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
    
    $(document).on('click', '.modifier', function () {
        var btn = $('#btn');
    
        var id = $(this).closest('tr').find('th').text();
        var code = $(this).closest('tr').find('td').eq(0).text();
        var libelle = $(this).closest('tr').find('td').eq(1).text();
        btn.text('Modifier');
        
        $("#code").val(code);
        $("#libelle").val(libelle);
        $("#id").val(id);
        btn.click(function () {
            if ($('#btn').text() == 'Modifier') {
                $.ajax({
                    url: 'Controller/FiliereController.php',
                    data: {op: 'update', id: id, libelle: $("#libelle").val(), code: $("#code").val()},
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        $('#myTable').DataTable().destroy();
                        remplir(data);
                        $('#myTable').DataTable();
                        $("#code").val('');
                        $("#libelle").val('');
                        btn.text('Enregistrer');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
            }
        });
    });

    function remplir(data) {
        var contenu = $('#table-content');
        var ligne = "";
        for (i = 0; i < data.length; i++) {
            ligne += '<tr><th>' + data[i].id + '</th>';
            ligne += '<td>' + data[i].code + '</td>';
            ligne += '<td>' + data[i].libelle + '</td>';
            ligne += '<td><button type="button" class="btn btn-outline-danger supprimer">Supprimer</button></td>';
            ligne += '<td><button type="button" class="btn btn-outline-secondary modifier">Modifier</button></td></tr>';
        }
        contenu.html(ligne);
    }
});



