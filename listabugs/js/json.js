
	// Dirección desde donde se envía la información desde php
	address = 'inc/listarErrores.php';
	
	// Petición Ajax
	$.ajax({url: address,
            cache: false,
            data: "",
            dataType: 'json',
            success: function(new_data){
					
				
				// Create the variable content to concatenate the results
            	var content = "";

                // Build an iteration of the information received in data

                for (var i = 0; i < new_data.length; i++) {

                	// Add the header of the collapsible  
                    content = "<div data-role='collapsible' data-collapsed-icon='arrow-r'   data-expanded-icon='arrow-d' data-iconpos='right' data-theme='a'><h3> " + new_data[i].codigo_error + ' - ' + new_data[i].titulo + "</h3>" + "<ul data-role='listview' data-inset='true'  data-theme='a'>";

                    // Concatenate the header with the information retreived
                    content = content +
                    '<li>Proyecto: ' + new_data[i].proyecto + '</li>' +
                    '<li>Tipo: ' + new_data[i].tipo + '</li>' +
                    '<li>Estado: ' + new_data[i].estado + '</li>' +
                    '<li>Severidad: ' + new_data[i].severidad + '</li>' +
                    '<li>Navegador: ' + new_data[i].navegador + '</li>' +
                           
                     '<li>Detalle: ' + new_data[i].descripcion + '</li>'+
					'<li>Fecha Creaci&oacute;n ' + new_data[i].fecha_creacion + '</li>' 

                    content = content + '</ul>';
                    content = content + "</div>";

                    // Append the content into the div     
                    $("#set").append(content);
                 }

                    // Refresh the Collapsible 
                    $("#set").collapsibleset("refresh").enhanceWithin();	
						
                // This callback function will trigger on successful action
            },
            error: function (request,error) {
				
				//var err = eval("(" + xhr.responseText + ")");
 				//alert(err.Message);
                // This callback function will trigger on unsuccessful action                
                alert('Error de conexión. Intente nuevamente!');
				alert('Error: ' + error);
				//console.log(new_data);
         
		    }
	});