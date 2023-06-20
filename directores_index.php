<!DOCTYPE html>
<html lang="es">
<head>
    <?php
    include_once "inclusiones/meta_tags.php"; 
    ?>
    <title>Cambio de director</title>
 
    <?php
    include_once "inclusiones/css_incluidos_y_favicon.php"; 
    ?>
  
</head>
<body>
    

    <div style="height: 10px;"></div>
    <!--Encabezado de la pagina-->
    <h1 class="display-4 text-center">Ingrese una Clave de CCT</h1> 

    
    
    
    <div class="shadow p-3 mb-5 bg-white rounded">
    <!--Container-->    
        <div class="container my-3">
        
                <div class="row row-cols-1 row-cols-md-2 g-4"> 
                
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-5 col-md-3"> 
                            
                    <!-- <form action="directorescambios.php"  method="post" name="frm" onsubmit="return valida_cct();">
                            <input id="clave" type="text" class="form-control" name="clave" 
                            placeholder="Ingresar Clave de Centro de Trabajo" onkeyup="this.value=this.value.toUpperCase()">  
                    </div> -->
                    <form id="myform" method="post" name="myform">
                            <input id="clave" name="clave" type="text" class="form-control" 
                            placeholder="Ingresar Clave de Centro de Trabajo" maxlength="10" 
                            onkeyup="this.value=this.value.toUpperCase()">  
                    </div>
                    
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-md-3 my-5"> 
                    <button id= "boton_buscar_centro" type="button" class="btn btn-warning">Buscar Centro</button>
                    </div>
                    </form> 
                    

                </div>
       
            <div class="row row-cols-1 row-cols-md-2 g-4">

        </div>      
    </div>
    <?php include_once "inclusiones/js_incluidos.php"; ?>
    
    <script type="text/javascript">
    $(document).ready(function(){

        $("#boton_buscar_centro").click(function(){
            
            let clave=$("#clave").val().trim();
            //alert("pueba");   
            if (clave.length == 0){
                //alert("La clave de CCT no puede ir vacía");
                Swal.fire({
                            icon: 'error',
                            title: 'Clave CCT',
                            text: "¡La clave de CCT no puede ir vacía!",
                            })
                $("#clave").focus();
                $("#clave").select();
            }
            else if (!pattern_cct.test(clave)){
                Swal.fire({
                            icon: 'error',
                            title: 'Clave Escuela',
                            text: "¡La clave de CCT no cumple el formato ejemplo: 05DPR0001X!",
                            })
                $("#clave").focus();
                $("#clave").select();
            }
            else 
            {
                //alert(clave);
                $.ajax({
                    url: "actions/valida_cct.php",
                    method: "POST",
                    data: {cct: clave},
                    success: function(data)
                    {
                        //alert(data);

                        if (data == 1){//hace login porque la clave si existe
                            //alert("La clave si existe");
                            window.location.href = "directores_cambios.php";
                        }
                        else //si success == 0, la clave no existe
                        {
                            //alert("La clave no existe en el catálogo");
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: "¡La clave no existe en el catálogo!",
                            })
                        }
                    },
                    error: function error(){
                        //alert("Error");
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: "¡Error desconocido vuelve a intentarlo mas tarde!",
                            })
                    }
                });
            }
        });

        $("#clave").bind('keypress', function(event) {
            var regex = new RegExp("^[0-9a-zA-Z\u00f1\u00d1]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });

    });//end ready document
</script>
</body>
</html>