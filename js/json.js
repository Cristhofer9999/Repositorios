//<script src="./js/codigo.js"></script>

$(function(){
    
  $("#boton_validar_curp").click(function(){
    
     //$("#boton_validar_curp").hide();
     //if($("#inputCurp").val().indexOf('@', 0) == -1 || $("#inputCurp").val().indexOf('.', 0) == -1) {
      if($("#inputCurp").val().match(/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/)) {
      
        alert('Formato de curp correcto.');
        //return true;

        // function mostrar_consulta_php(){
        //   alert("consulta_curp.php");
        // }
        // mostrar_consulta_php();

        $.ajax({
          url: "consulta_curp.php",
          method: "POST",
          data: {curp: curp},
          type: "PHP",
          success: function(data){
            alert("Si funciona"); //Prueba para revisar si funciona el ajax
            var msj = "";
            if(data == "ok"){
              mensaje = "Gracias por los datos";
              alert("Gracias por los datos");
            }
            else{
              mensaje = "Error"
            }
          },
          error: function error(){
            alert("Error")
          }
        })

        // $(document).on("ready", main);

        //     function cargarNota(url){
        //         $(alert).load(url);
        //     }

        //     function main(){
        //         $("#inputCurp").on("click", function(){
        //             alert("consulta_curp.html");
        //         })
        //     }


        // <><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        // <script>
        //   $(document).on("ready", main);

        //   function cargarNota(url){
        //     $("#inputCurp").load(url)
        //   }

        //   function main(){
        //     $("#boton_validar_curp").on("click", function () {
        //     alert(cargarNota("consulta_curp.php"));
        //   })}
        // </script></>

        

      }
     else{
      
      alert('Formato de curp incorrecto');
     //alert("Hola"); 
     }
   
    

  });

});