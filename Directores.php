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
    
    <!--Iconos -->
    <script src="https://kit.fontawesome.com/6c14e3a650.js" crossorigin="anonymous"></script>
    
    <!--Codigo de validacion-->
    <script src="./js/codigo.js"></script>

    


</head>
<body>
    

    <div style="height: 10px;"></div>
    <!--Encabezado de la pagina-->
    <h1 class="display-4 text-center">Datos del director del centro educativo</h1> 

   
    
    <div class="shadow p-3 mb-5 bg-white rounded">
    <!--Container-->    
        <div class="container my-3">

       
            <div class="row row-cols-1 row-cols-md-2 g-4">

                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6"> 
                    <li class="list-group-item list-group-item-primary">Clave: 05EPR0093X</li>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6"> 
                    <li class="list-group-item list-group-item-warning">Domicilio: SALTILLO ZONA CENTRO RAMOS ARIZPE Y OBREGON</li>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6"> 
                    <li class="list-group-item list-group-item-secondary">Nombre de la escuela: ANEXA A LA NORMAL DEL ESTADO</li>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6"> 
                    <li class="list-group-item list-group-item-success">Municipio: 030 - Saltillo </li>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6"> 
                    <li class="list-group-item list-group-item-danger">Turno: 100</li>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6"> 
                    <li class="list-group-item list-group-item-dark">Localidad: 0001 - Saltillo</li>  
                </div>

                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6"> 
                    <li class="list-group-item list-group-item-warning">Estatus: Activa</li>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6"> 
                    <li class="list-group-item list-group-item-primary">Nivel/Control: Primaria/Estatal</li>
                </div>

            </div>

            
            <div class="card-header my-2 text-center">CAPTURA DE DATOS</div>
            <div style="height: 10px;"></div>
            
            <!--Clase row que se puede dividir en 12 segmentos-->
            

             <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 my-6 col-md-6">  

               
            
             <form id="formulario" class="row needs-validation" novalidate> 

                            <!--Captura de Tipo de director-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6" > 
                             
                                 <label for="tipoDirector">Tipo de director</label> 
                                <div class="input-group">
                                  <select class="custom-select" id="directorInput" aria-label="Example select with button addon">
                                    <option value="0">Elija el tipo de Director...</option>
                                    <option value="1">Encargado</option>
                                    <option value="2">Titular</option>
                                  </select>
                                    <div class="input-group-append">
                                      <button class="btn btn-outline-secondary" type="submit">X</button>
                                    </div> 
                                 <!--
                                    <label for="tipoDirector">Tipo de director</label> 
                                    <div class="input-group">
                                        <select class="form-control opcion" id="directorInput" placeholder="Hola">
                                            <option value="0"></option>
                                            <option value="1">Encargado</option>
                                            <option value="2">Titular</option>
                                        </select>
                                        <div class="input-group-append">
                                             <button class="btn btn-outline-secondary" type="submit">X</button>
                                        </div>
                                    </div> -->
                                </div>
                            </div> 
  
                            <!--Espaciado Horizontal-->
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">                                                                                                              
                            </div>
                        
                            <!--Peticion de curp-->
                            
                              <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-4 col-md-3"> 

                                <fieldset>
                                    
                                         <label for="curpInput" class="form-label">C.U.R.P</label>
                                        <input id="inputCurp" type="text" class="form-control" 
                                            placeholder="Ingresar CURP" aria-label="Recipient's username" 
                                            aria-describedby="button-addon2" onkeyup="this.value=this.value.toUpperCase()" 
                                            oninput="validarInput(this)"  maxlength="18" minlength="18" onkeypress="return validarInput(event)"  
                                            pattern="^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$" required>
                                        <i class="icon fa-solid fa-cube fa-md"></i>   
                                    
                                        <p class="resultado" id="resultado"></pclass> </p>
                                        <div class="valid-tooltip my-6">
                                            Curp listo para validacion.
                                        </div>
                                        <div class="invalid-tooltip my-6">
                                            Favor de llenar este campo de manera correcta.
                                        </div>
                                    
                                    </div>
                                    
                                
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-4 col-md-3"> 
                                        <button type="submit" class="btn btn-danger">Validar C.U.R.P</button>
                                    </div>
                               </fieldset>

                            <!--Peticion de RFC-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-3"> 
                                <i class="icon fa-solid fa-id-badge fa-md"></i>
                                <label for="rfcInput" class="form-label">R.F.C</label>   

                                <input type ="text" class = "form-control" id="rfcInput" placeholder="Ingresar RFC" 
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
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> 
                            </div>
                            
                            <!--Lectura de nombre-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-4"> 
                                <i class="icon fa-solid fa-person fa-md"></i>
                                <label for="nombreInput" class="form-label">Nombre</label>   
                                <input type ="text" class = "form-control" id="nombreInput" placeholder="Nombre" onkeyup="this.value=this.value.toUpperCase()" onkeypress="return soloLetras(event)" readonly > 
                            </div>

                            <!--Espaciado Horizontal-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> 
                            </div>
                            
                            <!--Lectura de paterno-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> 
                                <i class="icon fa-solid fa-person fa-md"></i>
                                <label for="paternoInput" class="form-label">Apellido Paterno</label>   
                                <input type ="text" class = "form-control" id="paternoInput" placeholder="Apellido Paterno" onkeyup="this.value=this.value.toUpperCase()" onkeypress="return soloLetras(event)" readonly>
                            </div>
                            
                            <!--Lectura de materno-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> 
                                <i class="icon fa-solid fa-person fa-md"></i>
                                <label for="maternoInput" class="form-label">Apellido Materno</label>   
                                <input type ="text" class = "form-control" id="maternoInput" placeholder="Apellido Materno" onkeyup="this.value=this.value.toUpperCase()" onkeypress="return soloLetras(event)" readonly>
                            </div>

                            
                            <!--Lectura de fecha-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> 
                                <i class="icon fa-solid fa-calendar-days fa-md"></i>
                                <label for="fecha" class="col-form-label">Fecha de Nacimiento</label>
                                <div class="date" id="datepicker">
                                  <input type="date" class="form-control" readonly >
                                </div>
                            </div>

                            <!--Espaciado Horizontal-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> 
                            </div>
                        
                            <!--Lectura de entidad-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> 
                                <i class="icon fa-solid fa-location-dot fa-md"></i>
                                <label for="entidadInput" class="form-label">Entidad de Nacimiento</label>   
                                <input type ="text" class = "form-control" id="entidadInput" placeholder="Entidad" onkeyup="this.value=this.value.toUpperCase()" onkeypress="return soloLetras(event)" readonly>
                            </div>

                            <!--Espaciado Horizontal-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> 
                            </div>
                            
                            <!--Lectura de sexo-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> 
                                <i class="icon fa-solid fa-person fa-md"></i>
                                <label for="sexoInput" class="form-label">Sexo</label>   
                                <input type ="text" class = "form-control" id="sexoInput" placeholder="Sexo" onkeyup="this.value=this.value.toUpperCase()" onkeypress="return soloLetras(event)" readonly>
                            </div>   

                            <!--Espaciado Horizontal-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> 
                            </div>

                            <!--Peticion telefono de oficina-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-3"> 
                                <i class="icon fa-solid fa-phone fa-md"></i>
                                <label for="telOfiInput" class="form-label">Telefono de Oficina</label>   
                                <input type ="tel" class = "form-control" id="telOfiInput" placeholder="(999)-999-9999" onkeypress="return soloNumero(event)" onpaste="return false" maxlength="10" minlength="10">
                                
                                <div class="invalid-tooltip">
                                    Favor de introducir los 10 digitos.
                                </div>
                            </div>

                            <!--Peticion telefono de personal-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-3"> 
                                <i class="icon fa-solid fa-phone fa-md"></i>
                                <label for="telPersoInput" class="form-label">Telefono Personal</label>   
                                <input type ="tel"  class = "form-control" id="telPersoInput" placeholder="(999)-999-9999" onkeypress="return soloNumero(event)" onpaste="return false" maxlength="10" minlength="10">
                                <div class="invalid-tooltip">
                                    Favor de introducir los 10 digitos.
                                </div>
                            </div>
                            
                            <!--Peticion telefono de celular-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-3"> 
                                <i class="icon fa-solid fa-phone fa-md"></i>
                                <label for="celInput" class="form-label">Telefono Celular</label>   
                                <input type ="tel" class = "form-control" id="celInput" placeholder="(999)-999-9999" onkeypress="return soloNumero(event)" onpaste="return false" maxlength="10" minlength="10"  required>
                                
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
                                <label for="correoInput" class="form-label"> Correo Personal Institucional</label>   
                                <input id="correo" type ="text" class = "form-control" id="correolInput" 
                                onkeyup="this.value=this.value.toUpperCase()" pattern="^[A-Z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[A-Z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[A-Z0-9](?:[A-Z0-9-]*[A-Z0-9])?\.)+[A-Z0-9](?:[A-Z0-9-]*[A-Z0-9])?$" placeholder="Ingresar Correo" onclick="validCorreo(form.correo.value)" required> 
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
                                <label for="correoInsituInput" class="form-label">Correo Institucional (Escuela)</label >   
                                <input type ="email" class = "form-control" id="correoInsituInput" placeholder="Ingresar Correo Institucional" readonly required>
                                <div class="valid-tooltip">
                                    CAMPO OK.
                                  </div>
                                <div class="invalid-tooltip">
                                    Favor de llenar este campo de manera correcta.
                                </div>
                            </div>

                            <!--Espaciado Horizontal-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"> 
                            </div>

                            <!--Espaciado Horizontal-->
                            <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9"> 
                            </div>

                            <!--Boton de Actualizar-->
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 my-3"> 
                                <input id="btnEnviar" class="btn btn-warning" type="submit" value="Actualizar">
                                <!--Boton de Cancelar-->
                                <button  type="button" class="btn btn-secondary">Cancelar</button>
                            </div>

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


</body>
</html>