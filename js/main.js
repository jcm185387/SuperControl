
(function ($) {
    "use strict";

    
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('#acceder').click(function(event){
        $("#errorLog").css("display","none");
        var check = true;    
        var usr=$('#usr').val();
        var pass=$('#cont').val(); 

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }
        if(check == false){
            return check;
        }else{
            var  avanza = false;
            $.get('session/validausuario.php',{usr:usr,pass:pass},
            function(data)
            {
                if(avanza = false)
                {    
                    return false;
                }else{//avanzamos
                    data=data.trim();
                    $('#request_valida').val(data);
                    if (data==3)
                    {
                        $('#errorLog').show().text('Este usuario se encuentra inactivo, contacta a tu administrador para una reactivación');
                        $('#auxiliar').val('1');
                        $('#daTableBarrita').css("display","none");
                    }   
                    else
                    {
                        if (data==1) 
                        {                                                                   
                            $('#errorLog').show().text('La contraseña no es correcta');
                            $('#auxiliar').val('1');
                            $('#daTableBarrita').css("display","none");
                            event.preventDefault(); 
                            return false;               
                        }
                        else
                        {
                            if (data==2) 
                            {
                                $('#errorLog').show().text('El usuario no existe');
                                $('#auxiliar').val('1');
                                $('#daTableBarrita').css("display","none");
                                event.preventDefault(); 
                                return false;   
                            }
                            else
                            {                   

                                //alert("avanzamos");
                                $("#Form-IniciarSesion").submit();
                            }
                        }
                    }                       
                }

            });   
        }
    });  

    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });			
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }//Valida el Email
        else {//valida si los input están vacíos
            if($(input).val().trim() == ''){
                return false;
            }
        }
		
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }        

})(jQuery);