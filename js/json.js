//<script src="./js/codigo.js"></script>

$(function(){
    
  $("#boton_validar_curp").click(function(){
    
     //$("#boton_validar_curp").hide();
     //if($("#inputCurp").val().indexOf('@', 0) == -1 || $("#inputCurp").val().indexOf('.', 0) == -1) {
      if($("#inputCurp").val().match(/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/)) {
      
      alert('Formato de curp correcto. ');
      return true;

       
     

    

      }
     else{
      
      alert('Formato de curp incorrecto');
     //alert("Hola"); 
     }
   
    

  });

});