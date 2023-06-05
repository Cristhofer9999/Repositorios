<?php 

function valida_curp($curp){
    $pattern = "/[\A-Z]{4}[0-9]{6}[HM]{1}[A-Z]{2}[BCDFGHJKLMNPQRSTVWXYZ]{3}([A-Z]{2})?([0-9]{2})?/i";
    $result= preg_match($pattern, $curp);
    return $result; // Outputs 1
}

function valida_rfc($rfc){
   $pattern = "/([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([A-Z]|[0-9]){2}([A]|[0-9]){1})?/i";
   $result= preg_match($pattern, $rfc);
   return $result; // Outputs 1
}

function msg($title,$text,$type){
                        print "<script>";
                            print "Swal.fire({
                                title: '$title',
                                text: '$text',
                                type: '$type'
                                }).then(function() {
                                window.location = 'aspirantes.php';
                                });";
                          print "</script>";
}

 function validaRequerido($valor){
    if(trim($valor) == ''){
       return false;
    }else{
       return true;
    }
 }

 

 function validarEntero($valor){
    $min=1;
    $max=2147483647;
    /*esta funcion es para rango de numero  y segun la doc de php el max es hasta donde alcanza*/
    if(filter_var($valor, FILTER_VALIDATE_INT, array("options"=>
    array("min_range"=>$min, "max_range"=>$max))) === FALSE){
       return false;
    }else{
       return true;
    }
 }

 

 function validarNumerico($valor){
    if (!ctype_digit($valor)) {
    return false;
    }
    else{
      return true;
    }
 }

 

function validaEmail($valor){
    if(filter_var($valor, FILTER_VALIDATE_EMAIL) === FALSE){
       return false;
    }else{
       return true;
    }
 }

 

function validaSelecthtml($valor){
    if ($valor=='0'){
      return false;
    }
    else{
      return true;
    }
}
?>