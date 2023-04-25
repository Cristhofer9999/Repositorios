
<?php
include('Conexion_POO.php');
            $obj=new class_db();
            echo '<pre>';
           # print_r($obj);
            echo '</pre>';
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>mostrar datos</title>
        <!--Bootstrap trabaja con internet-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">     
    
    </head>
    <body>
    
    <br>
    
        <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">cve_centro</th>
          <th scope="col">curp</th>
          <th scope="col">nombre</th>
        </tr>
    
        <?php 
            
            $sql="SELECT cve_centro, curp, nombre FROM director";
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
        
    
    
    </body>
    </html>
    ?>