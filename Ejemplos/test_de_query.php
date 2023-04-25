
<?php
include('Conexion_POO.php');
            $obj=new class_db();
            #echo '<pre>';
           # print_r($obj);
           # echo '</pre>';
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>mostrar datos</title>
        <!--Bootstrap trabaja con internet-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">     
    
    </head>
    <body>
    <div class="container my-3">    
    <div class="row row-cols-1 row-cols-md-2 g-4"> 
                    
                
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-5 col-md-3"> 
                           <form action="test_de_query.php" method="post" name="frm">
                            <input id="inputCCT" type="text" class="form-control" name="clave" 
                            placeholder="Ingresar Clave de Centro de Trabajo" required>  

                      </div>
                    
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-md-3 my-5"> 
                      <button type="submit" class="btn btn-warning" name="btn1" >Buscar Centro</button>
                    </div>
                    </form> 
                    

                 
    
    <br>
    
        <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">cve_centro</th>
          <th scope="col">curp</th>
          <th scope="col">nombre</th>
        </tr>
    
        <?php 
            
            $sql="SELECT * FROM director WHERE cve_centro='$_POST[clave]'";
            $result=mysqli_query($obj->db_conn,$sql);
    
            while($mostrar=mysqli_fetch_array($result)){
                
              ?>
      </thead>
       
      <tbody>
        <tr>
          <th scope="row"><?php echo $mostrar['cve_centro'] ?></th>
          <td><?php echo $mostrar['curp'] ?></td>
          <td><?php echo $mostrar['nombre'] ?></td>
        </tr>
        </tbody> 
        <?php 
        }
         ?> 
        
        </table>
        <?php 
            
            $sql2="SELECT * FROM director WHERE cve_centro='$_POST[clave]'";
            $result=mysqli_query($obj->db_conn,$sql2);
    
            while($mostrar=mysqli_fetch_array($result)){
                
              ?>
        
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6"> 
                    <li class="list-group-item list-group-item-primary"> Clave: <?php echo $mostrar['cve_centro'] ?></li>
                </div> 
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-4"> 
                <i class="icon fa-solid fa-person fa-md"></i>
                <label for="nombreInput" class="form-label">Nombre</label>   
                <input type ="text" class = "form-control" id="nombreInput" placeholder="Nombre" value="<?php echo $mostrar['nombre'] ?>" onkeyup="this.value=this.value.toUpperCase()" onkeypress="return soloLetras(event)" readonly > 
                            </div>       
                
                <?php 

                

        }
         ?> 
                    
    </div>
    </body>
    </html>
   