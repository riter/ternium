/**
 * Created by Riter on 24/10/14.
 */

$("document").ready(function() {

    $( "#pais_id" ).change(function () {

        $.ajax({
            type: "GET",
            url: "/ternium/provincias/provincia_ajax/"+$(this).val(),
            beforeSend: function() {

            },
            success: function(msg){
                $('#UserProvinciaId').html(msg);
            }
        });

    });

});
