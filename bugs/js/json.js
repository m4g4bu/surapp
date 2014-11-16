$(document).ready(function() {
    $("#submit").click(function(){
 
        var formData = $("#formulario").serialize();
 
        $.ajax({
            type: "POST",
            url: "inc/nuevoError.php",
            cache: false,
            data: formData,
            success: onSuccess
        });
 
        return false;
    });
 
    $("#cancel").click(function(){
        resetTextFields();
    });
 
    $("#refresh").click(function(){
        location.reload();
    });
});
  
 function resetTextFields()
        {
			
			 $("#tipo").val("");
                	 $("#prioridad").val("");
                	 $("#severidad").val("");
                	 $("#sistema").val("");
                	 $("#navegador").val("");
                	 $("#titulo").val("");
                     $("#descripcion").val("");

        }

function onSuccess(data, status)
{
    resetTextFields();
    // Notify the user the new post was saved
    $("#notification").fadeIn(2000);
    data = $.trim(data);
    if(data == "SUCCESS")
    {
        $("#notification").css("background-color", "#F5F5F5");
        $("#notification").text("El error fue creado correctamente");
    }
    else
    {
        $("#notification").css("background-color", "#ff0000");
        $("#notification").text(data);
    }
    $("#notification").fadeOut(5000);
}