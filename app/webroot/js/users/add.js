/**
 * Created by Riter on 24/10/14.
 */

$("document").ready(function() {
 
    $( "#pais_id" ).change(function () {

        $.ajax({
            type: "GET",
            url: "/provincias/provincia_ajax/"+$(this).val(),
            beforeSend: function() {

            },
            success: function(msg){
                $( "select[data-ajax-provincia]" ).html(msg);
            }
        });

    });

});
