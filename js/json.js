$(document).on('pagebeforeshow', '#login', function(){ 
    $('#login-button').on('click', function(){
        if($('#username').val().length > 0 && $('#password').val().length > 0){
            userObject.username = $('#username').val(); // Put username into the object
            userObject.password = $('#password').val(); // Put password into the object
            // Convert an userObject to a JSON string representation
            var outputJSON = JSON.stringify(userObject);
            // Send data to server through ajax call
            // action is functionality we want to call and outputJSON is our data
            ajax.sendRequest({action : 'login', outputJSON : outputJSON});
        } else {
            alert('Please fill all nececery fields');
        }
    });    
});

$(document).on('pagebeforeshow', '#menu', function(){ 
    if(userObject.username.length == 0){ // If username is not set (lets say after force page refresh) get us back to the login page
        $.mobile.changePage( "#login", { transition: "slide"} ); // In case result is true change page to Index  
    }
    $(this).find('[data-role="content"] h4').append('Bienvenido ' + userObject.username); // Change header with wellcome msg
    //$("#index").trigger('pagecreate');
});

// This will be an ajax function set
var ajax = {
    sendRequest:function(save_data){
		address = 'http://mobile.surinteractive.com/inc/validacionUsuarios.php?jsoncallback=?';
		
        $.ajax({url: address,
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
				//console.log(result);
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
				
            }
        });
    }
}

// We will use this object to store username and password before we serialize it and send to server. This part can be done in numerous ways but I like this approach because it is simple
var userObject = {
    username : "",
    password : ""
}