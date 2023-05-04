//<script src="./js/codigo.js"></script>

$(function(){
    
  $("#boton_validar_curp").click(function(){
    
     //$("#boton_validar_curp").hide();
     if($("#inputCurp").val().indexOf('@', 0) == -1 || $("#inputCurp").val().indexOf('.', 0) == -1) {
      alert('El correo electrónico introducido no es correcto.');
      return false;
  }

  alert('El email introducido es correcto ¡Felicidades!.');
    //alert("Hola");
  });

});