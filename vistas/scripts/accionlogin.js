 
 
$("#frmAccesos").on('submit',function(e){
	e.preventDefault();
    let loginac=$("#loginacc").val();
    let claveac=$("#claveacc").val();

    $.post("../ajax/video.php?op=verificar", {loginac : loginac , claveac : claveac }, 
    function(data){
        if (data!="null"){       //si es diferente a null  
            $(location).attr("href","videos.php");           
        }else{
           bootbox.alert({
                size: 'small',
                title: 'Error de Acceso',
                message: 'Usuario y/o Password incorrectos ',    
                callback: function() {  $("#loginacc").val("");
                                        $("#claveacc").val("");}
  
                });
        }
    });
});


 