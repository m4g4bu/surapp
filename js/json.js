$(document).on('pagebeforeshow', '#login', function(){ 
    
	// 1. Al enviar el formulario
	
	$('#login-button').on('click', function(){
        
		// 1. Verifica la longitud del usuario / clave
		
		if($('#username').val().length > 0 && $('#password').val().length > 0){
           
		   // Si el usuario / clave no están vacias
		   
		    userObject.username = $('#username').val(); // Ingreso el usuario en el objeto
            userObject.password = $('#password').val(); // Ingreso la clave en el objeto
			
            // Convierto la variable userObject al formato JSON
			
            var outputJSON = JSON.stringify(userObject);
            
			// Envio los datos al servidor en formato Ajax
            
            ajax.sendRequest({action : 'login', outputJSON : outputJSON});
      
	    } else {
			
			// Si la longitud de usuario / clave están vacias, muestra un mensaje
			
            alert('Por favor ingresar todos los campos mandatorios');
			
        }
    });    
});








var ajax = {
	
    sendRequest:function(save_data){
		
		var address = null;

		//address = 'http://127.0.0.1/surapp/inc/validacionUsuarios.php?jsoncallback=?';
		address = 'http://mobile.surinteractive.com/inc/validacionUsuarios.php?jsoncallback=?';
		
        $.ajax({url: address,
            crossDomain: true,
            data: save_data,
            async: true,
            beforeSend: function() {
                // This callback function will trigger before data is sent
                $.mobile.loading('show', {theme:"a", text:"Inicializando...", textonly:true, textVisible: true});
            },
            complete: function() {
                // This callback function will trigger on data sent/received complete
                $.mobile.loading('hide');
            },
            success: function (result) {
                if(result == "true") {
                    $.mobile.changePage( "#menu", { transition: "slide"} ); 
					
                } else {
                    alert('Login incorrecto, por favor trate nuevamente!'); // In case result is false throw an error
                }
                // This callback function will trigger on successful action
            },
            error: function (request,error) {
				
                // This callback function will trigger on unsuccessful action                
                alert('Error de conexión. Intente nuevamente!');
				alert(error);
            }
        });
    }
}

// We will use this object to store username and password before we serialize it and send to server. This part can be done in numerous ways but I like this approach because it is simple
var userObject = {
    username : "",
    password : ""
}




          
