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

    $('#filiere').change(function () {
        var filiere = $(this).val();
        $.ajax({
            url: 'Controller/ClasseFiliereController.php',
            data: {op: 'search', filiere: filiere},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                $('#myTable').DataTable().destroy();
                remplir(data);
                $('#table-content').DataTable();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
    });

    function remplir(data) {
        var contenu = $('#table-content');
        var ligne = "<thead><tr><th>ID</th><th>Code</th><th>Filière</th><th>Anée Scolaire</th></tr></thead><tbody>";

        for (i = 0; i < data.length; i++) {
            ligne += '<tr><th>' + data[i].id + '</th>';
            ligne += '<td>' + data[i].code + '</td>';
            ligne += '<td>' + data[i].filiere + '</td>';
            ligne += '<td>' + data[i].anneescolaire + '</td>';        
        }
        ligne += '</tbody>';     
        contenu.html(ligne);
    }
});



