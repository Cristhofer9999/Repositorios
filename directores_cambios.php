<?php
    session_start();
	$cct=$_SESSION['cct'];

    #$mysqli->set_charset("utf8");
    include('modelo/class_db.php');
    $obj=new class_db(); 
       
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    

    
    

</head>
<body>
    

    <div style="height: 10px;"></div>
    <!--Encabezado de la pagina-->
    <h1 class="display-4 text-center">DATOS DEL CENTRO EDUCATIVO</h1> 

   
    
    <div class="shadow p-3 mb-5 bg-white rounded">
    <!--Container-->    
        <div class="container my-3">

            
            
            <!--Clase row que se puede dividir en 12 segmentos-->
            

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 my-6 col-md-6">  
         
               
            
            <form id="formulario"  class="row needs-validation" novalidate> 

             

             <?php               
                                            $datosCentro=
                                            "SELECT 
                                            cct, nombre, turno, desc_status, nombre_de_localidad, asentamiento, nombre_vialidad_principal,
                                            municipio,nombre_de_municipio, localidad, nombre_de_localidad, desc_nivel_educativo, desc_sostenimiento
                                            FROM vista_cct WHERE cct = '$cct'";
                                    
                                            //echo $datosCentro;exit;
                                            $result=mysqli_query($obj->db_conn,$datosCentro);
                                            while($mostrar=mysqli_fetch_array($result)){ 
                                            ?>
                                                
                                                   <div class="row row-cols-1 row-cols-md-2 g-4"> 
                                                    
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6"> 
                                                            <li class="list-group-item list-group-item-primary">Clave: <?php echo $mostrar['cct'] ?></li>
                                                        </div>

                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6"> 
                                                            <li class="list-group-item list-group-item-warning">Domicilio: <?php echo $mostrar['nombre_de_localidad'] ?> - 
                                                            <?php echo $mostrar['asentamiento'] ?> - CALLE <?php echo $mostrar['nombre_vialidad_principal'] ?> </li>
                                                        </div>

                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6"> 
                                                            <li class="list-group-item list-group-item-secondary">Nombre de la escuela: <?php echo $mostrar['nombre'] ?></li>
                                                        </div>

                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6"> 
                                                            <li class="list-group-item list-group-item-success">Municipio: <?php echo $mostrar['municipio'] ?> - 
                                                            <?php echo $mostrar['nombre_de_municipio'] ?> </li>
                                                        </div>

                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6"> 
                                                            <li class="list-group-item list-group-item-danger">Turno: <?php echo $mostrar['turno'] ?></li>
                                                        </div>

                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6"> 
                                                            <li class="list-group-item list-group-item-dark">Localidad: <?php echo $mostrar['localidad'] ?> - 
                                                            <?php echo $mostrar['nombre_de_localidad'] ?></li>  
                                                        </div>

                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6"> 
                                                            <li class="list-group-item list-group-item-warning">Estatus: <?php echo $mostrar['desc_status'] ?></li>
                                                        </div>

                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6"> 
                                                            <li class="list-group-item list-group-item-primary">Nivel/Control: <?php echo $mostrar['desc_nivel_educativo'] ?> - 
                                                            <?php echo $mostrar['desc_sostenimiento'] ?></li>
                                                        </div>

                                                    </div> 
                
                                            <?php 
                                                        }
                                                ?> 


                             <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" > 
                            <div class="card-header my-2 text-center">CAPTURA DE DATOS</div>
                             <div style="height: 10px;"></div>   
                            </div>             
                            
                            

                            
                            <?php               
                                $sql3="SELECT * FROM director WHERE cve_centro='$cct'";
                                $result=mysqli_query($obj->db_conn,$sql3);
                                                            
                                 while($mostrar=mysqli_fetch_array($result)){
                                                                        
                                 ?>
                                    <!--Captura de Tipo de director-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6" >     
                                    <label for="tipoDirector">Tipo de director</label> 
                                    <div class="input-group">
                                    <select class="custom-select" id="directorInput" name="tipoDirector" aria-label="Example select with button addon">
                                                                                        
                                    <option value="0"> 
                                            <?php  
                                            //echo $mostrar['cve_tipo_director'];                                     
                                            if ($mostrar['cve_tipo_director'] == 1) {
                                                echo ('Encargado');   
                                            }
                                            else if ($mostrar['cve_tipo_director'] == 2) {
                                                echo ('Titular');
                                            }                                                                        
                                            ?>                                                                    
                                    </option>

                                    <option value="1"> 
                                            <?php 
                                            if ($mostrar['cve_tipo_director'] == 1) {
                                                echo ('Titular');
                                                $mostrar['cve_tipo_director'] = 2;
                                             }
                                             else if ($mostrar['cve_tipo_director'] == 2) {
                                                echo ('Encargado');
                                                $mostrar['cve_tipo_director'] = 1;
                                             }
                                            ?>  
                                    </option>


                                    </select>
                                    
                                  <!-- <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="reset">X</button>
                                    </div> --> 
                    
                                                                                             
                                    </div> 
                                </div>

                                    <!--Espaciado Horizontal-->                                               
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-md-3 my-4"> </div>
                                                                                   
                                    <!--Peticion de curp-->
                                                                                   
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-md-3 my-4"> 

                                    <label for="curpInput" class="form-label">C.U.R.P</label>
                                    <input id="inputCurp" name="curp" value="<?php echo $mostrar['curp'] ?>" type="text" class="form-control" 
                                     placeholder="Ingresar CURP" aria-label="Recipient's username" 
                                     aria-describedby="button-addon2" onkeyup="this.value=this.value.toUpperCase()" 
                                     oninput="validarInput(this)"  maxlength="18" minlength="18" onkeypress="return validarInput(event)"  
                                     pattern="^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$" required>
                                    <i class="icon fa-solid fa-cube fa-md"></i>   
                                                                                                    
                                    <p class="resultado" id="resultado"></pclass> </p>
                                              
                                    <!--Validacion mostrando tooltips-->
                                    <div class="valid-tooltip my-6">
                                     Curp listo para validacion.
                                    </div>

                                    <div class="invalid-tooltip my-6">
                                    Favor de llenar este campo de manera correcta.
                                    </div>
                                                
                                    
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 my-4 col-md-3"> 
                                    <!--<button id="boton_validar_curp" type="button" onclick="return valida_curp();" class="btn btn-danger">Validar C.U.R.P</button> -->
                                    <button id="boton_validar_curp" type="button" class="btn btn-danger">Validar C.U.R.P</button> 
                                </div>

                                                                                               

                                    <!--Peticion de RFC-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-2"> 
                                        <i class="icon fa-solid fa-id-badge fa-md"></i>
                                        <label id="Prueba_RFC" for="rfcInput" class="form-label">R.F.C</label>   

                                        <input type ="text" name="rfc" class = "form-control" value="<?php echo $mostrar['rfc'] ?>" id="rfcInput" placeholder="Ingresar RFC" 
                                        onkeyup="this.value=this.value.toUpperCase()" 
                                        onclick="enviarTexto()" minlength="13" maxlength="13" pattern="^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([A-Z]|[0-9]){2}([A]|[0-9]){1})?$" required>

                                        <p class="resultadoRfc" id="resultadoRfc"> </p>
                                        <div class="valid-tooltip">
                                            Formato de R.F.C. valido
                                        </div>
                                        <div class="invalid-tooltip">
                                            Agrega los ultimos 3 digitos de tu R.F.C y/o valida tu curp.
                                        </div>
                                        <i class="icon fa-solid fa-id-badge fa-md"></i>
                                </div>
                                

                                    <!--Espaciado Horizontal-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> </div>

                                    
                                    <!--Lectura de nombre-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-4"> 
                                        <i class="icon fa-solid fa-person fa-md"></i>
                                        <label for="nombreInput"  class="form-label">Nombre</label>   
                                        <input type ="text" name="nombre" value="<?php echo $mostrar['nombre'] ?>" class = "form-control" id="nombreInput" placeholder="Nombre" onkeyup="this.value=this.value.toUpperCase()" onkeypress="return soloLetras(event)" readonly > 
                                </div>

                                    <!--Espaciado Horizontal-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> </div>
                                    
                                    
                                    
                                    <!--Lectura de paterno-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> 
                                        <i class="icon fa-solid fa-person fa-md"></i>
                                        <label for="paternoInput"  class="form-label">Apellido Paterno</label>   
                                        <input type ="text" name="paterno" class = "form-control" value="<?php echo $mostrar['apellido_paterno'] ?>" id="paternoInput" placeholder="Apellido Paterno" onkeyup="this.value=this.value.toUpperCase()" onkeypress="return soloLetras(event)" readonly>
                                </div>
                                    
                                    <!--Lectura de materno-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> 
                                        <i class="icon fa-solid fa-person fa-md"></i>
                                        <label for="maternoInput"  class="form-label">Apellido Materno</label>   
                                        <input type ="text" name="materno" class = "form-control" value="<?php echo $mostrar['apellido_materno'] ?>" id="maternoInput" placeholder="Apellido Materno" onkeyup="this.value=this.value.toUpperCase()" onkeypress="return soloLetras(event)" readonly>
                                </div>
                                    



                                    <!--Lectura de fecha-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> 
                                        <i class="icon fa-solid fa-calendar-days fa-md"></i>
                                        <label for="fecha"  class="col-form-label">Fecha de Nacimiento</label>
                                        <div class="date" id="datepicker">
                                        <input type="date" id="fechaInput" name="fecha" class="form-control" value="<?php echo $mostrar['fecha_nacimiento'] ?>" readonly >
                                        </div>
                                 </div>

                                    <!--Espaciado Horizontal-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> </div>
                                
                                    <!--Lectura de entidad-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> 
                                        <i class="icon fa-solid fa-location-dot fa-md"></i>
                                        <label for="entidadInput"  class="form-label">Entidad de Nacimiento</label>   
                                        <input type ="text" name="entidad" class = "form-control" value="<?php echo $mostrar['lugar_nacimiento'] ?>" id="entidadInput" placeholder="Entidad" onkeyup="this.value=this.value.toUpperCase()" onkeypress="return soloLetras(event)" readonly >
                                </div>

                                    <!--Espaciado Horizontal-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">  </div>
                                    
                                    <!--Lectura de sexo-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> 
                                        <i class="icon fa-solid fa-person fa-md"></i>
                                        <label for="sexoInput"  class="form-label">Sexo</label>   
                                        <input type ="text" name="sexo" class = "form-control" value="<?php echo $mostrar['sexo'] ?>" id="sexoInput" placeholder="Sexo" onkeyup="this.value=this.value.toUpperCase()" onkeypress="return soloLetras(event)" readonly>
                                </div>   

                                    <!--Espaciado Horizontal-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> </div>
                                    
                                     
                                    <!--Peticion telefono de oficina-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-3"> 
                                        <i class="icon fa-solid fa-phone fa-md"></i>
                                        <label for="telOfiInput"  class="form-label">Telefono de Oficina</label>   
                                        <input type ="tel" id="telOfiInput" name="telefono_ofi" class = "form-control" value="<?php echo $mostrar['telefono_oficina'] ?>" placeholder="(999)-999-9999" onkeypress="return soloNumero(event)" onpaste="return false" maxlength="10" minlength="10">
                                        
                                        <div class="invalid-tooltip">
                                            Favor de introducir los 10 digitos.
                                        </div>
                                </div>

                                    <!--Peticion telefono de personal-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-3"> 
                                        <i class="icon fa-solid fa-phone fa-md"></i>
                                        <label for="telPersoInput"  class="form-label">Telefono Personal</label>   
                                        <input type ="tel"  id="telPersoInput" name="telefono_perso" class = "form-control"  value="<?php echo $mostrar['telefono_particular']?>" placeholder="(999)-999-9999" onkeypress="return soloNumero(event)" onpaste="return false" maxlength="10" minlength="10">
                                        <div class="invalid-tooltip">
                                            Favor de introducir los 10 digitos.
                                        </div>
                                </div>
                                    
                                    
                                    
                                    <!--Peticion telefono de celular-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-3"> 
                                        <i class="icon fa-solid fa-phone fa-md"></i>
                                        <label for="celInput" class="form-label">Telefono Celular</label>   
                                        <input type ="tel" id="telCelInput" name="telefono_cel" class ="form-control" value="<?php echo $mostrar['telefono_celular']?>" placeholder="(999)-999-9999" onkeypress="return soloNumero(event)" onpaste="return false" maxlength="10" minlength="10" required>
                                        <div class="valid-tooltip">
                                            CAMPO OK.
                                        </div>
                                        <div class="invalid-tooltip">
                                            Favor de llenar este campo y/o introducir un numero valido.
                                        </div>
                                </div>


                                    <!--Peticion de correo personal-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-3"> 
                                        <i class="icon fa-solid fa-envelope fa-md"></i>
                                        <label for="correoInput"  class="form-label"> Correo Personal Institucional</label>   
                                        <input id="correoPersoInput" type ="text" name="correo" value="<?php echo $mostrar['correo_electronico_personal']?>" class = "form-control" id="correolInput" 
                                        onkeyup="this.value=this.value.toUpperCase()" pattern="^[A-Z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[A-Z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[A-Z0-9](?:[A-Z0-9-]*[A-Z0-9])?\.)+[A-Z0-9](?:[A-Z0-9-]*[A-Z0-9])?$" placeholder="Ingresar Correo @DOCENTECOAHUILA.GOB.MX" onclick="validCorreo(form.correo.value)" required> 
                                        <div id="correoValid" class="valid-tooltip">
                                            CAMPO OK.
                                        </div>
                                        <div id="correoInvalid" class="invalid-tooltip">
                                            Favor de llenar este campo de manera correcta.
                                        </div>
                                </div>
                                                                                                       


                                    <!--Peticion telefono de correo institucional-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-3">
                                        <i class="icon fa-solid fa-envelope fa-md"></i> 
                                        <label for="correoInsituInput"  class="form-label">Correo Institucional (Escuela)</label >   
                                        <input type ="email" id="correoInstInput" name="correo_insti" class = "form-control" value="<?php echo $mostrar['correo_electronico_institucional']?>" id="correoInsituInput" placeholder="Ingresar Correo Institucional @SEDUCOAHUILA.GOB.MX" required>
                                        <div class="valid-tooltip">
                                            CAMPO OK.
                                        </div>
                                        <div class="invalid-tooltip">
                                            Favor de llenar este campo de manera correcta.
                                        </div>
                                </div>

                                    <!--Espaciado Horizontal-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"></div>
                                    
                                        <!-- Imput Oculto de clave de centro -->
                                       
                                        <input type ="hidden" name="cve_centro" class = "form-control-hidden" value="<?php echo $mostrar['cve_centro']?>" id="correoInsituInput" placeholder="Ingresar Correo Institucional" readonly required>

                                    <!--Espaciado Horizontal-->
                                <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9"> </div>

                                    <!--Boton de Actualizar-->
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 my-3"> 
                                        <input id="btnEnviar" class="btn btn-warning" type="submit" value="Actualizar">
                                        <!--Boton de Cancelar-->
                                        <button  type="reset"  class="btn btn-secondary" >Cancelar</button>
                                </div>

                                                            <?php 
                                                            }
                                                        ?> 

            </form>      
           
        </div>
    </div>





    <!--Scrip de validacion de campos con Bootstrap-->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
         (() => {
         'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
        })()

    </script>
    
    <!--Scrip de uso de Jquery-->
    <script
    src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous"></script>
        <!--Iconos -->
    <script src="https://kit.fontawesome.com/6c14e3a650.js" crossorigin="anonymous"></script>
    
    <!--Codigo de validacion-->
    <script src="./js/validaciones.js"></script>
    
    <!--SweetAlert-->
    <script src="./plugins/sweetAlert/sweetalert2.all.min.js"></script>


<script type="text/javascript">
$(document).ready(function(){

    $("#boton_validar_curp").click(function(){
    
      if($("#inputCurp").val().match(/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/)) {
      
        //alert('Formato de curp correcto.');
       let curp=$("#inputCurp").val();
       //alert(curp);
           

        $.ajax({
          url: "actions/consulta_curp.php",
          method: "POST",
          data: {curp: curp},
          dataType: "json",
          success: function(data){
            alert(JSON.stringify(data));
            let procede=data.procede;
            let status=data.status; 

            if (procede=="0" && status=="500"){//falla servicio
                
                //alert("Servicio no disponible");
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "¡Servicio no disponible, intentalo mas tarde!",
                    })

            }
            else if (procede=="0" && status=="0"){//no encontró
                
                //alert("No se contontró curp");
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "¡No se encontro ninguna CURP!",
                    })

            }
            else if (procede=="1" && status=="1"){//exito
                
                //alert("se encontro y colocar datos");
                Swal.fire({
                   //position: 'top-end',
                    icon: 'success',
                    title: 'DATOS CORRECTOS',
                    showConfirmButton: false,
                    timer: 1500
                    })
                
                $('#nombreInput').val(data.nombre);
                $('#paternoInput').val(data.paterno);  
                $('#maternoInput').val(data.materno);  
                $('#fechaInput').val(data.fechaNac);  
                $('#entidadInput').val(data.nombre_estado);  
                $('#sexoInput').val(data.sexo_nombre);
                $('#sexoInput').val($('#sexoInput').val().toUpperCase());
                $('#rfcInput').val("");    
                $('#telOfiInput').val("");
                $('#telCelInput').val("");
                $('#telPersoInput').val("");
                $('#correoPersoInput').val("");
                $('#correoInstInput').val("");

                //para componer la Ñ de origen vienen mal;
                $('#nombreInput').val($('#nombreInput').val().replace("Ã","Ñ"));
                $('#paternoInput').val($('#paternoInput').val().replace("Ã","Ñ"));
                $('#maternoInput').val($('#maternoInput').val().replace("Ã","Ñ"));
                
            }
            else{

                //alert("Error desconocido, vuelva a intentar");
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "¡Error desconocido, vuelva a intentar!", 
                    })

            }        

          },
          error: function error(){
            alert("Error");
          }
        });
      }
     else{

        Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "¡Formato de curp incorrecto!",
                    })
                    
     }

    });
});//end ready document
</script>
</body>
</html>