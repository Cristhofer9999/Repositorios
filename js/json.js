<script src="./js/codigo.js"></script>

$(function(){
     

    $("#boton_validar_curp").click(function(){
      
      $curp=$_POST['curp'];

       
      alert("HOLA");
           
      // $.ajax({
      //   url:"consulta_curp.php",
      //   data:  Curp,
      //   type: JSON,
      //   method: POST
      // })
      // succes(data){
      //   if data.procede == 1(
          
      //   )
      // }

      $.ajax({
        type: 'post',
        url: 'consulta_curp.php',
        data: Curp,
        dataType: 'json',
        succes: function(response)
        {
          var jsonData = JSON.stringify(response);
          var obj =$.parseJSON(jsonData);

          $('#curp').val(obj.curp);
          $('#nombre').val(obj.nombre);
          $('#paterno').val(obj.paterno);
          $('#materno').val(obj.materno);
          $('#fechaNac').val(obj.fechaNac);
          $('#nombre_estado').val(obj.nombre_estado);
          $('#sexo').val(obj.sexo);

          // if(jsonData.procede == 1){
          //   location.href = 'consulta_curp.php';
          // }
          // else{
          //   alert("CURP no encontrada")
          // }
        }
      })
           
      
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