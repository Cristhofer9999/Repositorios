<?php
    session_start();
	$cct=$_SESSION['cct'];

    #$mysqli->set_charset("utf8");
    include('modelo/class_db.php');
    include('modelo/class_metodos_consulta_dal.php');
    include('modelo/class_director_dal.php');

    $obj=new class_db(); 

    $obj_centro = new centro_dal;
    $result_query = $obj_centro->datosCentroCct($cct);

    $obj_dir = new director_dal;
    $result_dir = $obj_dir->directorCct($cct);
    /* echo '<pre>';
    print_r($result_dir);
    echo '</pre>';
    exit;  */

    $valor_entidad_nac=$obj_centro->get_entidad_nac_director($result_dir["cve_pais"],$result_dir["cve_estado"]);
    $valor_pais_nac=$obj_centro->get_pais_nac_director($result_dir["cve_pais"],$result_dir["cve_estado"]);
     
?>


<!DOCTYPE html>
<html lang="en">
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
    <h1 class="display-4 text-center">DATOS DEL CENTRO EDUCATIVO</h1> 

   
    
    <div class="shadow p-3 mb-5 bg-white rounded">
    <!--Container-->    
        <div class="container my-3">

            
            
            <!--Clase row que se puede dividir en 12 segmentos-->
            

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 my-6 col-md-6">  
         
               
            
            <form id="formulario" method="post" action="actions/actualizar_director.php" class="row needs-validation" novalidate> 

             

             <?php               
                                            
                                            while($result_query){ 
                                            ?>
                                                
                                                   
                            <table class="table table-hover table-bordered" >
                             

                                    <tbody>
                                                <tr class="bg-success text-white font-weight-bold">
                                                    <td>Clave: <?php echo $result_query['cve_centro'] ?></td>
                                                    <td>Nombre de la escuela: <?php echo $result_query['nombre_centro'] ?></td>
                                                    
                                                </tr>
                                                <!-- .bg-primary --> <!-- .bg-success --> <!-- .bg-warning --><!-- .bg-danger --><!-- .bg-info -->
                                                <tr class="bg-success text-white font-weight-bold">
                                                    <td>Domicilio: <?php echo $result_query['municipio'] ?> - 
                                                                <?php echo strtoupper($result_query['nombre_colonia']) ?> - CALLE <?php echo $result_query['calle'] ?></td>
                                                    <td>Municipio: <?php echo $result_query['cve_municipio'] ?> - 
                                                                            <?php echo $result_query['municipio'] ?></td>
                                                    
                                                </tr>
                                                <tr class="bg-success text-white font-weight-bold">
                                                    <td> Turno: <?php echo $result_query['cve_turno'] ?></td>
                                                    <td>Localidad: <?php echo $result_query['cve_localidad'] ?> - 
                                                                                    <?php echo $result_query['localidad'] ?></td>
                                                    
                                                </tr>
                                                <tr class="bg-success text-white font-weight-bold">
                                                    <td>Estatus: <?php echo $result_query['estatus'] ?></td>
                                                    <td>Nivel/Control: <?php echo $result_query['nivel_educativo'] ?> - 
                                                                                    <?php echo $result_query['sostenimiento'] ?></td>
                                                    
                                                </tr>
                                        </tbody>
				            </table>
                
                                            <?php 
                                                break;
                                            }
                                            ?> 


                             <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" > 
                            <div class="card-header my-2 text-center">CAPTURA DE DATOS</div>
                             <div style="height: 10px;"></div>   
                            </div>             
                            
                            

                            
                            <?php               
                                                            
                                 while($result_dir){
                                                                        
                                 ?>
                                    <!--Captura de Tipo de director-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6" >     
                                    <label for="tipoDirector">Tipo de director</label> 
                                    <div class="input-group">
                                    
<?php
        
        include('modelo/class_tipo_director_dal.php');
        $obj_lista_tipo_dir= new tipo_director_dal;
        $result_lista_tipo_dir=$obj_lista_tipo_dir->obtener_lista_tipo_director();
/*      echo '<pre>';
        print_r($result_lista_tipo_dir);
        echo '</pre>';
        exit; 
 */         if ($result_lista_tipo_dir==NULL){
                echo '<h2>No se encontraron empresas</h2>';
        }
        else{
?>                                           
                                    
                                    <select class="custom-select" id="directorInput" name="tipoDirector" aria-label="Example select with button addon">
<?php
        foreach ($result_lista_tipo_dir as $key => $value){									
?>
	    <option value="<?=$value->cve_tipo_director; ?>" <?php if ($result_dir['cve_tipo_director']==$value->cve_tipo_director){ echo 'selected';} ?>><?=$value->tipo_director; ?></option>
<?php } ?>							                                                                                        
                                   

                                    </select>
<?php } ?>                                    
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
                                    <input id="inputCurp" name="curp" value="<?php echo $result_dir['curp'] ?>" type="text" class="form-control" 
                                     placeholder="Ingresar CURP" aria-label="Recipient's username" 
                                     aria-describedby="button-addon2" onkeyup="this.value=this.value.toUpperCase()" 
                                     oninput="validarInput(this)"  maxlength="18" minlength="18" onkeypress="return validarInput(event)"  
                                     pattern="^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$" readonly required >
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
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 col-xl-2 my-4 col-md-3"> 
                                    <!--<button id="boton_validar_curp" type="button" onclick="return valida_curp();" class="btn btn-danger">Validar C.U.R.P</button> -->
                                    <label id="text_validar_curp" for="boton_validar_curp" style="display: none; color: red; font-weight: bolder; font-size: 10px;" >Es necesario validar tu CURP*</label>
                                    <button id="boton_validar_curp" type="button" class="btn btn-danger">Validar C.U.R.P</button> 
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 col-xl-2 my-4 col-md-3 "> 
                                    <!--<button id="boton_validar_curp" type="button" onclick="return valida_curp();" class="btn btn-danger">Validar C.U.R.P</button> -->
                                    <button style="background-color:DarkCyan; border-color:Teal" id="cambiar_curp" type="button" class="btn btn-danger">Cambiar C.U.R.P</button> 
                                    
                                    <!-- Flag para uso de Query -->
                                        <select class="custom-select" style="display:none;" id="flag_upddir" name="flag_upddir" aria-label="Example select with button addon">                                                
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                        </select>

                                    </div>

                                                                                               

                                    <!--Peticion de RFC-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-2"> 
                                        <i class="icon fa-solid fa-id-badge fa-md"></i>
                                        <label id="Prueba_RFC" for="rfcInput" class="form-label">R.F.C</label>   

                                        <input type ="text" name="rfc" class = "form-control" value="<?php echo $result_dir['rfc'] ?>" id="rfcInput" placeholder="Ingresar RFC" 
                                        onkeyup="this.value=this.value.toUpperCase()" 
                                        onclick="enviarTexto()" minlength="13" maxlength="13" autocomplete="off" pattern="^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([A-Z]|[0-9]){2}([A]|[0-9]){1})?$" readonly required>

                                        <p class="resultadoRfc" id="resultadoRfc"> </p>
                                        <div class="valid-tooltip">
                                            Formato de R.F.C. valido
                                        </div>
                                        <div class="invalid-tooltip">
                                            Agrega la Homoclave a tu R.F.C y/o valida tu curp.
                                        </div>
                                        <i class="icon fa-solid fa-id-badge fa-md"></i>
                                </div>
                                

                                    <!--Espaciado Horizontal-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> </div>

                                    
                                    <!--Lectura de nombre-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-4"> 
                                        <i class="icon fa-solid fa-person fa-md"></i>
                                        <label for="nombreInput"  class="form-label">Nombre</label>   
                                        <input type ="text" name="nombre" value="<?php echo $result_dir['nombre'] ?>" class = "form-control" id="nombreInput" placeholder="Nombre" onkeyup="this.value=this.value.toUpperCase()" onkeypress="return soloLetras(event)" readonly required> 
                                </div>

                                    <!--Espaciado Horizontal-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> </div>
                                    
                                    
                                    
                                    <!--Lectura de paterno-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> 
                                        <i class="icon fa-solid fa-person fa-md"></i>
                                        <label for="paternoInput"  class="form-label">Apellido Paterno</label>   
                                        <input type ="text" name="paterno" class = "form-control" value="<?php echo $result_dir['apellido_paterno'] ?>" id="paternoInput" placeholder="Apellido Paterno" onkeyup="this.value=this.value.toUpperCase()" onkeypress="return soloLetras(event)" readonly required>
                                </div>
                                    
                                    <!--Lectura de materno-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> 
                                        <i class="icon fa-solid fa-person fa-md"></i>
                                        <label for="maternoInput"  class="form-label">Apellido Materno</label>   
                                        <input type ="text" name="materno" class = "form-control" value="<?php echo $result_dir['apellido_materno'] ?>" id="maternoInput" placeholder="Apellido Materno" onkeyup="this.value=this.value.toUpperCase()" onkeypress="return soloLetras(event)" readonly required>
                                </div>
                                    



                                    <!--Lectura de fecha-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> 
                                        <i class="icon fa-solid fa-calendar-days fa-md"></i>
                                        <label for="fecha"  class="col-form-label">Fecha de Nacimiento</label>
                                        <div class="date" id="datepicker">
                                        <input type="text" id="fechaInput" name="fecha" class="form-control" value="<?php echo $result_dir['fecha_nacimiento'] ?>" placeholder="Fecha de Nacimiento" readonly required>
                                        </div>
                                 </div>

                                    <!--Espaciado Horizontal-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> </div>
                                
                                    <!--Lectura de entidad-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> 
                                        <i class="icon fa-solid fa-location-dot fa-md"></i>
                                        <label for="entidadInput"  class="form-label">Entidad de Nacimiento</label>   
                                        <input type ="text" name="entidad" class = "form-control" value="<?php echo $valor_entidad_nac ?>" id="entidadInput" placeholder="Entidad" onkeyup="this.value=this.value.toUpperCase()" onkeypress="return soloLetras(event)" readonly required>
                                </div>

                                    <!--Lectura de Pais-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">  
                                <i class="icon fa-solid fa-location-dot fa-md"></i>
                                        <label for="paisInput"  class="form-label">País de Nacimiento</label>   
                                        <input type ="text" name="pais" class = "form-control" value="<?php echo strtoupper($valor_pais_nac) ?>" id="paisInput" placeholder="Pais de Nacimiento" onkeyup="this.value=this.value.toUpperCase()" onkeypress="return soloLetras(event)" readonly required>

                                </div>
                                    
                                    <!--Lectura de sexo-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> 

                                             <?php 
                                                if ($result_dir['sexo']=='H'){
                                                    $desc_sexo="HOMBRE";
                                                }
                                                else if ($result_dir['sexo']=='M'){
                                                    $desc_sexo="MUJER";
                                                }
                                                else{
                                                    $desc_sexo="";
                                                }                                             
                                             ?>
                                        <i class="icon fa-solid fa-person fa-md"></i>
                                        <label for="sexoInput"  class="form-label">Sexo</label>   
                                        <input type ="text" name="sexo" class = "form-control" value="<?php echo $desc_sexo ?>" id="sexoInput" placeholder="Sexo" onkeyup="this.value=this.value.toUpperCase()" onkeypress="return soloLetras(event)" readonly required>
                                </div>   

                                    <!--Espaciado Horizontal-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> </div>
                                    
                                     
                                    <!--Peticion telefono de oficina-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-3"> 
                                        <i class="icon fa-solid fa-phone fa-md"></i>
                                        <label for="telOfiInput"  class="form-label">Telefono de Oficina</label>   
                                        <input type ="tel" id="telOfiInput" name="telefono_ofi" class = "form-control" value="<?php echo $result_dir['telefono_oficina'] ?>" placeholder="(999)-999-9999" onkeypress="return soloNumero(event)" onpaste="return false" maxlength="10" minlength="10" autocomplete="off"  required>
                                        <div class="invalid-tooltip">
                                            Favor de introducir los 10 digitos.
                                        </div>
                                </div>

                                    <!--Peticion telefono de personal-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-3"> 
                                        <i class="icon fa-solid fa-phone fa-md"></i>
                                        <label for="telPersoInput"  class="form-label">Telefono Personal</label>   
                                        <input type ="tel" id="telPersoInput" name="telefono_perso" class = "form-control"  value="<?php echo $result_dir['telefono_particular']?>" placeholder="(999)-999-9999" onkeypress="return soloNumero(event)" onpaste="return false" maxlength="10"  minlength="10" autocomplete="off" required >
                                        <div class="invalid-tooltip">
                                            Favor de introducir los 10 digitos.
                                        </div>
                                </div>
                                    
                                    
                                    
                                    <!--Peticion telefono de celular-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-3"> 
                                        <i class="icon fa-solid fa-phone fa-md"></i>
                                        <label for="celInput" class="form-label">Telefono Celular</label>   
                                        <input type ="tel" id="telCelInput" name="telefono_cel" class ="form-control" value="<?php echo $result_dir['telefono_celular']?>" placeholder="(999)-999-9999" onkeypress="return soloNumero(event)" onpaste="return false" maxlength="10" minlength="10" autocomplete="off"  required>
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
                                        <input id="correoPersoInput" type ="email" name="correo" value="<?php echo $result_dir['correo_electronico_personal']?>" class = "form-control" id="correolInput" 
                                        onkeyup="this.value=this.value.toUpperCase()" pattern="^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$" placeholder="Ingresar Correo @DOCENTECOAHUILA.GOB.MX" onclick="validCorreo(form.correo.value)" autocomplete="off"  required> 
                                        <div id="correoValid" class="valid-tooltip">
                                            CAMPO OK.
                                        </div>
                                        <div id="correoInvalid" class="invalid-tooltip">
                                            Favor de llenar este campo de manera correcta.
                                        </div>
                                </div>
                                                                                                       


                                    <!--Peticion telefono de correo institucional-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-3">

                                        <?php
                                            $correo_institucional = $result_query['cve_centro']."@SEDUCOAHUILA.GOB.MX";
                                        ?>
                                        <i class="icon fa-solid fa-envelope fa-md"></i> 
                                        <label for="correoInsituInput"  class="form-label">Correo Institucional (Escuela)</label >   
                                        <input type ="email" id="correoInstInput" name="correo_insti" class = "form-control" value="<?php echo $correo_institucional?>" id="correoInsituInput" placeholder="Ingresar Correo Institucional @SEDUCOAHUILA.GOB.MX" readonly>
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
                                       
                                        <input type ="hidden" name="cve_centro" class = "form-control-hidden" value="<?php echo $result_dir['cve_centro']?>" id="cve_centro" placeholder="cve_centro" readonly required>
                                        <input type ="hidden" name="cve_pais" class = "form-control-hidden" value="<?php echo $result_dir['cve_pais']?>" id="cve_pais" placeholder="cve_pais" readonly required>
                                        <input type ="hidden" name="cve_estado" class = "form-control-hidden" value="<?php echo $result_dir['cve_estado']?>" id="cve_estado" placeholder="cve_estado" readonly required>
                                
                                        
                                    <!--Espaciado Horizontal-->
                                <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9"> </div>

                                    <!--Boton de Actualizar-->
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 my-3"> 
                                        <input id="btnEnviar" class="btn btn-warning" type="submit" value="Actualizar">
                                        <!--Boton de Cancelar-->
                                        <button  type="reset"  class="btn btn-secondary" >Cancelar</button>
                                </div>

                                                            <?php 
                                                            break;
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
            }, 
            
            false)
        })
        })()

    </script>
    
    <?php include_once "inclusiones/js_incluidos.php"; ?>

<script type="text/javascript">
$(document).ready(function(){

    //Desactiva el boton de validar curp 
    $('#boton_validar_curp').prop("disabled", true);

    $("#boton_validar_curp").click(function(){
    
      if($("#inputCurp").val().match(/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/)) {
      
        //alert('Formato de curp correcto.');
       let curp=$("#inputCurp").val();
       //alert(curp);

       $('#text_validar_curp').hide(); 
           
       function getEdad(dateString) {
            let hoy = new Date()
            let fechaNacimiento = new Date(dateString)
            let edad = hoy.getFullYear() - fechaNacimiento.getFullYear()
            let diferenciaMeses = hoy.getMonth() - fechaNacimiento.getMonth()
            if (diferenciaMeses < 0 || (diferenciaMeses === 0 && hoy.getDate() < fechaNacimiento.getDate()))
            {
                edad--;
            }
            return edad;
        }

        $.ajax({
          url: "actions/consulta_curp.php",
          method: "POST",
          data: {curp: curp},
          dataType: "json",
          success: function(data){
            //alert(JSON.stringify(data));
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
                
                if(getEdad(data.fechaNac) < 18)
                {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "¡La CURP debe ser de alguien mayor a 18 años!", 
                    })
                    
                } 
                else
                {
                
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
                        //$('#entidadInput').val(data.nombre_estado);  
                        //$('#paisInput').val(data.nombre_pais);  
                        $('#sexoInput').val(data.sexo_nombre);
                        $('#sexoInput').val($('#sexoInput').val().toUpperCase());
                        $('#rfcInput').val("");    
                        $('#telOfiInput').val("");
                        $('#telCelInput').val("");
                        $('#telPersoInput').val("");
                        $('#correoPersoInput').val("");

                        
                        //$('#correoInstInput').val("");

                        $('#btnEnviar').show();

                        //Propuesta solucion a nacidos en el extranjero
                        if(data.nombre_estado == "Extranjero" || data.nombre_estado == "NACIDO EN EL EXTRANJERO") 
                        {
                            $('#entidadInput').val("NACIDO EN EL EXTRANJERO");
                            $('#cve_estado').val("33");
                            $('#cve_pais').val("10");
                            $('#paisInput').val("PAIS EXTRANJERO");

                                if(data.materno == ""){
                                    $('#maternoInput').val("X");
                                } 
                        } 
                        else
                        {
                            $('#paisInput').val(data.nombre_pais);
                            $('#entidadInput').val(data.nombre_estado);
                            $('#cve_pais').val(data.cvePais);
                            $('#cve_estado').val(data.cveEstado);
                        }
                        // if(data.nombre_pais == "Otros Paises")
                        // {
                        //     $('#paisInput').val("PAIS EXTRANJERO");
                        //     $('#cve_pais').val("10");
                        // }
                        // else
                        // {
                        //     //$('#paisInput').val(data.nombre_pais);
                        //     $('#cve_pais').val(data.cvePais);
                        //     $('#cve_estado').val(data.cveEstado);
                            
                        // }

                        //para componer la Ñ de origen vienen mal;
                        $('#nombreInput').val($('#nombreInput').val().replace("Ã","Ñ"));
                        $('#paternoInput').val($('#paternoInput').val().replace("Ã","Ñ"));
                        $('#maternoInput').val($('#maternoInput').val().replace("Ã","Ñ"));

                        $('#inputCurp').prop("readonly", true);

                }


               
                
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
            //alert("Error");
            Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "¡Error desconocido, vuelva a intentar!", 
                    })
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

    }); //end fuction #boton_validar_curp

    $("#cambiar_curp").click(function(){

        //Activa el boton de validar curp
        $('#boton_validar_curp').prop("disabled", false);

        $("#inputCurp").prop("readonly", false);
        $("#inputCurp").val("");

        $("#rfcInput").prop("readonly", false);
        $("#rfcInput").val("");
        
        $('#nombreInput').val("");
        $('#paternoInput').val("");  
        $('#maternoInput').val(""); 
        $('#fechaInput').val(""); 
        $('#entidadInput').val("");
        $('#paisInput').val(""); 
        $('#sexoInput').val("");
        $('#telOfiInput').val("");
        $('#telCelInput').val("");
        $('#telPersoInput').val("");
        $('#correoPersoInput').val("");
        $('#cve_pais').val("");
        $('#cve_estado').val("");

        

        $("#btnEnviar").css("display", "none");
        $('#text_validar_curp').show();

        $('#inputCurp').focus();
        
        //Bandera de uso de Query
        $('#flag_upddir').val(value="1");
    }); //end function #cambiar_curp

    
   

});//end ready document
</script>
</body>
</html>