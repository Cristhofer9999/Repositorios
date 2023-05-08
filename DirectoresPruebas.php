<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de director</title>
    
    <!-- Bootstrap CSS -->
    <!--Bootstrap trabaja con internet-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">     
    <!-- Bootstrap trabaja sin internet -->
    <!-- <link href="ccs /bootstrap.min.ccs" rel="stylesheet" /> -->

    

    <!--Estilos  -->
    <link rel="stylesheet" href="./css/iconos.css">
    
    <!--Iconos -->
    <script src="https://kit.fontawesome.com/6c14e3a650.js" crossorigin="anonymous"></script>
    
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
                            
                    <form action="directorescambios.php" method="post" name="frm" onsubmit="return valida_cct();">
                            <input id="clave" type="text" class="form-control" name="clave" 
                            placeholder="Ingresar Clave de Centro de Trabajo" onkeyup="this.value=this.value.toUpperCase()">  

                      </div>
                    
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-md-3 my-5"> 
                      <button type="submit" class="btn btn-warning" name="btn1" >Buscar Centro</button>
                    </div>
                    </form> 
                    

                </div>
       
            <div class="row row-cols-1 row-cols-md-2 g-4">

            
    <!--Scrip de uso de Jquery-->
    <!-- Jquery -->
    <script src = "./jquery/jquery-3.6.4.min.js"></script>
    <script src = "js/validaciones.js"></script>

</body>
</html>