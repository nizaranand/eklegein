///fitxer on tens el post

$(document).ready(function() {
	////submit
	$("#formulario_fallo").submit(function(){
            var datos = $('#formulario_fallo').serialize();
            datos = decodeURIComponent(datos.replace(/%40/, "@"))
            filtrar(datos);
            return false;
    });
});
function filtrar(datos)
{	
	$.ajax({
		data: datos,
		type: "POST",
		dataType: "json",
		url: "registrodb.php",
			success: function(data){
				if(data.existe == true){
                                    
                                    $("#registro_error_nick").fadeIn('3000');
                                    $("#registro_posicion_nick_existe").fadeIn('3000');
                                    $('.login').on('keyup textarea',function(){
                                        $("#registro_error_nick").fadeOut('5000');
                                        $("#registro_posicion_nick_existe").css('display','none');
                                    });
				}
                                if(data.contenido_nick == true){
                                    
                                    $("#registro_error_nick").fadeIn('3000');
                                    $("#registro_posicion_nick").fadeIn('3000');
                                    $('.login').on('keyup textarea',function(){
                                        $("#registro_error_nick").fadeOut('5000');
                                        $("#registro_posicion_nick").css('display','none');
                                    });
                                }
                                if(data.contenido_clau == true){
                                    
                                    $("#registro_error_pass").fadeIn('3000');
                                    $("#registro_posicion_pass").fadeIn('3000');
                                    $('.pass').on('keyup textarea',function(){
                                        $("#registro_error_pass").fadeOut('5000');
                                        $("#registro_posicion_pass").css('display','none');
                                    });
                                }
                                if(data.contenido_email == true){
                                    
                                    $("#registro_error_email").fadeIn('3000');
                                    $("#registro_posicion_email").fadeIn('3000');
                                    $('.email').on('keyup textarea',function(){
                                        $("#registro_error_email").fadeOut('5000');
                                        $("#registro_posicion_email").css('display','none');
                                    });
                                }
                                if(data.contenido_email_punto_arroba == true){
                                    
                                    $("#registro_error_email").fadeIn('3000');
                                    $("#registro_posicion_email_formato").fadeIn('3000');
                                    $('.email').on('keyup textarea',function(){
                                        $("#registro_error_email").fadeOut('5000');
                                        $("#registro_posicion_email_formato").css('display','none');
                                    });
                                }
                                if(data.contenido == true){
                                    
                                    $("#registro_error_nick").fadeIn('3000');
                                    $("#registro_error_pass").fadeIn('3000');
                                    $("#registro_error_email").fadeIn('3000');
                                    $('.login').on('keyup textarea',function(){
                                        $("#registro_error_nick").fadeOut('5000');
                                    });
                                    $('.pass').on('keyup textarea',function(){
                                        $("#registro_error_pass").fadeOut('5000');
                                    });
                                    $('.email').on('keyup textarea',function(){
                                        $("#registro_error_email").fadeOut('5000');
                                    });
                                }
                                if(data.registroOK == true){
                                    
                                    $("#registro_error_nick").css('background-color','green');
                                    $("#registro_error_nick").fadeIn('3000');
                                    $("#registro_error_pass").css('background-color','green');
                                    $("#registro_error_pass").fadeIn('3000');
                                    $("#registro_error_email").css('background-color','green');
                                    $("#registro_error_email").fadeIn('3000',function(){
                                        alert('registrado en eklegein, ya puede entrar, Gracias.');
                                        window.location = "index.php";
                                    });
                                    
                                    

                                }
				
			},
			error: function() {
          			alert('Error occured');
                                $("#registro_error").fadeIn('3000');
           		}

	  });
}

