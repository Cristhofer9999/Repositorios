<script src="./js/codigo.js"></script>

$(function(){
     

    $("#boton_validar_curp").click(function(){
      
      $curp=$_POST['curp'];

       
      alert("HOLA");
           
      $.ajax({
        url:"consulta_curp.php",
        data:  Curp,
        type: JSON,
        method: POST
      })
      succes(data){
        if data.procede ==1(
          
        )
      }
           
      
      $("#Prueba_RFC").css({"color": "red"});
           
           $("#formulario").submit(function(evento){
           let curp = $("#curp").val().trim();
             if(curp.length = 18){
                alert("Curp Completo");
                console.log("Si entro al if");
                return;
             }

           });

           //$("")
    });
    
    //$("#boton2").click(function(){

      //      $("h1").show();
    //});


    //$("h1").css({"background-color": "red"});



});