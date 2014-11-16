$(document).ready(function() {
	
    $("#enviar").click(function(){
 
        var formData = $("#mjr_formulario").serialize();
 
        $.ajax({
            type: "POST",
            url: "inc/nuevaMejora.php",
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
			
			 $("#plataforma").val("");
                	 $("#titulo").val("");
                     $("#descripcion").val("");

        }

function onSuccess(data, status)
{
    //resetTextFields();
    // Notify the user the new post was saved
    $("#notification").fadeIn(2000);
    data = $.trim(data);
    if(data == "SUCCESS")
    {
        $("#notification").css("background-color", "#ffff00");
        $("#notification").text("The post was saved");
    }
    else
    {
        $("#notification").css("background-color", "#ff0000");
        $("#notification").text(data);
    }
    $("#notification").fadeOut(5000);
}