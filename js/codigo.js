 const formulario = document.getElementById('formulario');
 const inputs = document.querySelectorAll('#formulario');
 
   
 const expresiones = {
   curp: /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
   rfc: /^[ña-z]{3,4}[0-9]{6}[0-9a-z]{3}$/i,
   correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
   telefono: /^\d{7,14}$/ // 7 a 14 numeros.
 }
   
   
   
   //$(function() {
    //    $('#datepicker').datepicker();
    //});

    //Validacion Solo Numeros
    function soloNumero(e)
    {
        key=e.keyCode || e.witch;
        teclado=String.fromCharCode(key);
        numero="0123456789";
        especiales="8-37-38-46";//array
        teclado_especial=false;
        for(var i in especiales){
            if(key==especiales[i]){
                teclado_especial=true;
            } 
        }
        if(numero.indexOf(teclado)==-1 && !teclado_especial){
               return false;
        }
    }

        
    //Validacion Solo Letras
    function soloLetras(e)
    {
        key=e.keyCode || e.witch;
        teclado=String.fromCharCode(key);
        numero="ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnopqrstuvwxyzáéíóú";
        especiales="8-37-38-46";//array
        teclado_especial=false;
        for(var i in especiales){
            if(key==especiales[i]){
                teclado_especial=true;
            } 
        }
        if(numero.indexOf(teclado)==-1 && !teclado_especial){
               return false;
        }
    }



    //Función para validar una CURP
function curpValida(curp) {
    var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
        validado = curp.match(re);
	
    if (!validado)  //Coincide con el formato general?
    	return false;
    
    //Validar que coincida el dígito verificador
    function digitoVerificador(curp17) {
        //Fuente https://consultas.curp.gob.mx/CurpSP/
        var diccionario  = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
            lngSuma      = 0.0,
            lngDigito    = 0.0;
        for(var i=0; i<17; i++)
            lngSuma = lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
        lngDigito = 10 - lngSuma % 10;
        if (lngDigito == 10) return 0;
        return lngDigito;
    }
  
    if (validado[2] != digitoVerificador(validado[1])) 
    	return false;
        
    return true; //Validado
}
//Handler para el evento cuando cambia el input
//Lleva la CURP a mayúsculas para validarlo
function validarInput(input) {
    var curp = input.value.toUpperCase(),
        resultado = document.getElementById("resultado"),
        valido = "No válido";
        
    if (curpValida(curp)) { // Se comprueba
    	valido = "Válido";
        resultado.classList.add("ok");

    } else {
    	resultado.classList.remove("ok");
    } 
    resultado.innerText = "\nFormato de CURP: " + valido;
}
//Copiar los primeros 10 digitos de la Curp en el input del RFC
function enviarTexto()
{
 var texto=document.getElementById("inputCurp").value;
 
 if(texto == ""){
    texto = "Valida tu CURP"
    document.getElementById("rfcInput").value=texto;
 }
 else{
    
    document.getElementById("rfcInput").value=texto[0]+texto[1]+texto[2]+texto[3]+texto[4]+texto[5]+texto[6]+texto[7]+texto[8]+texto[9];

 }
}

//Copiar los primeros 10 digitos de la Curp en el input del RFC
/* function enviarTexto()
{
 var texto=document.getElementById("inputCurp").value;

 if(validarInput.valido = "No válido"){
 document.getElementById("rfcInput").value=texto[0]+texto[1]+texto[2]+texto[3]+texto[4]+texto[5]+texto[6]+texto[7]+texto[8]+texto[9];
  }
  else{
  document.getElementById("rfcInput").value="Error en el curp";
  }
} */








    