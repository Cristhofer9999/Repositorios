<!--
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>-->

  <!-- <script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script> -->
  
  <?php 
session_start();
// $cct=$_SESSION["usuario"];
// $cct=$_SESSION['cct'];
$cct = '05PES0262A';
include_once "inclusiones/js_incluidos.php"; 

include ("modelo/class_c_tipo_director_dal.php");
$tipo_director=new tipo_director_dal();
include("modelo/class_c_centro_educativo_dal.php");
$centro_educativo=new centro_educativo_dal();
$resultado=$centro_educativo->list_by_centro($cct);
include ('modelo/class_c_estados_dal.php');
$estados = new estados_dal;
?>
<div class="row">
	<div class="col-xs-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-yellow">
                    <i class="fa fa-child font-yellow"></i>
                    <span class="caption-subject bold uppercase">Director</span>
                </div>               
            </div>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="javascript:;">Aplicación</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="javascript:;">Director</a>
                    </li>
                </ul>
            </div>
            <div class="portlet-body">
                <div class="row margin-bottom-20">
                    <div class="col-md-12">
                        <?php if ($resultado): ?>
                            <?php foreach ($resultado as $key => $value): ?>

                                <form class="form-horizontal" id="form_update">
                                    <div class="form-body">
                                        <div class="row">
                                            <div id="show-hide" class="col-md-12">
                                                <h2 class="margin-bottom-20">Datos del Director de el Centro Educativo tino</h2>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="well well-lg">
                                                            <input type="hidden" id="cen" name="cen" value="<?=$value->getCve_centro();?>">
                                                            <h3 id="cct" class="text-justify"><?='Clave: '.$value->getCve_centro();?></h3>
                                                            <h4 id="ncct" class="text-justify"><?='Nombre: '.$value->getNombre_centro();?></h4>
                                                            <h4 id="turno" class="text-justify"><?='Turno: '.$value->getCve_turno().' '.$value->turno;?></h4>
                                                            <h4 id="est" class="text-justify"><?='Estatus: '.$value->getCve_estatus().' '.$value->estatus;?></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Tipo de Director</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control opcion" id="tipdir" name="tipdir" data-placeholder="Tipo de Director">
                                                                    <option></option>
                                                                    <?php foreach ($tipo_director->main_list() as $key => $value2): ?>
                                                                        <?php if ($value->cve_tipo_director==$value2->getCve_tipo_director()): ?>
                                                                            <option value="<?=$value2->getCve_tipo_director();?>" selected><?=$value2->getTipo_director();?></option>         
                                                                            <?php else: ?>
                                                                                <option value="<?=$value2->getCve_tipo_director();?>"><?=$value2->getTipo_director();?></option>         
                                                                            <?php endif ?>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <div class="clearfix"></div>                   
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="curp" class="col-md-4 control-label">C.U.R.P.</label>
                                                                <div class="col-md-8">
                                                                    <div class="input-icon">
                                                                        <i class="fa fa-cube"></i>
                                                                        <input type="text" class="form-control" id="curp" name="curp" placeholder="C.U.R.P." maxlength="18" value="<?=$value->curp;?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button id="cons_curp" type="button" class="btn red-thunderbird">
                                                                Validar C.U.R.P.
                                                            </button>
                                                        </div>    
                                                        <!--/span-->
                                                        <div class="clearfix"></div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="rfc" class="col-md-4 control-label">R.F.C.</label>
                                                                <div class="col-md-8">
                                                                    <div class="input-icon">
                                                                        <i class="fa fa-codepen"></i>
                                                                        <input type="text" class="form-control" id="rfc" name="rfc" placeholder="R.F.C." maxlength="13" value="<?=$value->rfc;?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="nomdirec" class="col-md-2 control-label">Nombre</label>
                                                                <div class="col-md-10">
                                                                    <div class="input-icon">
                                                                        <i class="fa fa-male"></i>
                                                                        <input type="text" class="form-control" id="nomdirec" name="nomdirec" placeholder="Nombre del Director" maxlength="50" value="<?=$value->nombre;?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="apaterno" class="col-md-4 control-label">Apellido Paterno</label>
                                                                <div class="col-md-8">
                                                                    <div class="input-icon">
                                                                        <i class="fa fa-male"></i>
                                                                        <input type="text" class="form-control" id="apaterno" name="apaterno" placeholder="Apellido Paterno" maxlength="50" value="<?=$value->apellido_paterno;?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="amaterno" class="col-md-4 control-label">Apellido Materno</label>
                                                                <div class="col-md-8">
                                                                    <div class="input-icon">
                                                                        <i class="fa fa-female"></i>
                                                                        <input type="text" class="form-control" id="amaterno" name="amaterno" placeholder="Apellido Materno" maxlength="50" value="<?=$value->apellido_materno;?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4">Fecha Nacimiento</label>
                                                                <div class="col-md-8">
                                                                    <div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
                                                                        <input type="text" class="form-control" id="fechnac" name="fechnac" placeholder="Seleccione Fecha de Nacimiento" value="<?=$value->fecha_nacimiento;?>" readonly disabled>
                                                                        <span class="input-group-btn">
                                                                            <button class="btn default" type="button" disabled><i class="fa fa-calendar"></i></button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="hidden" id="pais" name="pais" value="<?=$value->cve_pais?>">
                                                                <label class="control-label col-md-4" for="entnacalumn">Entidad de Nacimiento</label>
                                                                <div class="col-md-8">
                                                                    <select class="form-control" name="entnacalumn" id="entnacalumn" data-placeholder="Seleccione la Entidad de Nacimiento" readonly disabled>
                                                                        <option></option>
                                                                        <?php foreach ($estados->mostrar_las_opciones_por_pais('9') as $key => $value3): ?>
                                                                            <?php if ($value->cve_estado==$value3->getCve_estado()): ?>
                                                                                <option value="<?=$value3->getCve_estado();?>" selected><?=$value3->getNombre_estado();?></option>         
                                                                                <?php else: ?>
                                                                                    <option value="<?=$value3->getCve_estado();?>"><?=$value3->getNombre_estado();?></option>         
                                                                                <?php endif ?>
                                                                            <?php endforeach ?>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4">Sexo</label>
                                                                <div class="col-md-8">
                                                                    <select class="form-control" id="sexo" name="sexo" data-placeholder="Seleccione el Sexo" readonly disabled>
                                                                        <option value=""></option>
                                                                        <?php if ($value->sexo=="M"): ?>
                                                                            <option value="M" selected>MUJER</option>
                                                                            <option value="H">HOMBRE</option>
                                                                            <?php elseif($value->sexo=="H"): ?>
                                                                                <option value="M">MUJER</option>
                                                                                <option value="H" selected>HOMBRE</option>
                                                                                <?php else: ?>
                                                                                    <option value="M">MUJER</option>
                                                                                    <option value="H">HOMBRE</option>
                                                                                <?php endif ?>
                                                                                
                                                                                
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="telofi" class="col-md-4 control-label">Tel&eacute;fono de Oficina</label>
                                                                        <div class="col-md-8">
                                                                            <div class="input-icon">
                                                                                <i class="fa fa-phone"></i>
                                                                                <input type="text" class="form-control phone" id="telofi" name="telofi" placeholder="Tel&eacute;fono de Oficina" maxlength="20" value="<?=$value->telefono_oficina;?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="telpart" class="col-md-4 control-label">Tel&eacute;fono Particular</label>
                                                                        <div class="col-md-8">
                                                                            <div class="input-icon">
                                                                                <i class="fa fa-phone"></i>
                                                                                <input type="text" class="form-control phone" id="telpart" name="telpart" placeholder="Tel&eacute;fono Particular" maxlength="20" value="<?=$value->telefono_particular;?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="telcel" class="col-md-4 control-label">Tel&eacute;fono Celular</label>
                                                                        <div class="col-md-8">
                                                                            <div class="input-icon">
                                                                                <i class="fa fa-phone"></i>
                                                                                <input type="text" class="form-control phone" id="telcel" name="telcel" placeholder="Tel&eacute;fono Celular" maxlength="20" value="<?=$value->telefono_celular;?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="emailpers" class="col-md-2 control-label">Correo Electr&oacute;nico</label>
                                                                        <div class="col-md-10">
                                                                            <div class="input-icon">
                                                                                <i class="fa fa-envelope"></i>
                                                                                <input type="text" class="form-control" id="emailpers" name="emailpers" placeholder="Correo Electr&oacute;nico Personal" maxlength="100" value="<?=$value->correo_electronico_personal;?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> 

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="emailpers" class="col-md-2 control-label">Correo Electr&oacute;nico Institucional</label>
                                                                        <div class="col-md-10">
                                                                            <div class="input-icon">
                                                                                <i class="fa fa-envelope"></i>
                                                                                <input type="text" class="form-control" id="emailinstitucional" name="emailpers" placeholder="Correo Electr&oacute;nico Personal" maxlength="100" value="<?=$value->correo_electronico_personal;?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>                                       
                                                            <div class="form-actions pull-right">
                                                                <div class="row">
                                                                    <div class=" col-md-12">
                                                                        <button id="update-cct" type="submit" class="btn yellow-gold">
                                                                            Actualizar
                                                                        </button>
                                                                        <button id="cancelar-mov" type="button" class="btn default" data-dismiss="modal">Cancelar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                            
                                        <?php endforeach ?>
                                        <?php else: ?>
                                            
                                        <?php endif ?>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--MODAL ACTUALIZAR-->
                <div id="modalupdate" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-body">
                        <h4>
                            ¿Desea actualizar los datos del Director del Centro Educativo?
                        </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn grey">No</button>
                        <button id="btn-update"  type="button">Si</button>
                    </div>
                </div>
                <script>

$("#btn-update").click(function(event) {
    alert('tito');
    
      
            $.ajax({
                url: 'http://localhost/centros_educativos/centros/_actions/administra/w_service_test2.php',
                type: 'POST',
                dataType: 'HTML',
                data: { mov: '4',
                        cct: $("#cen").val(),
                        tipdir: $("#tipdir").val().toUpperCase(),
                        cct: $("#cen").val().toUpperCase(),
                        rfc: $("#rfc").val().toUpperCase(),
                        curp: $("#curp").val().toUpperCase(),
                        nomdirec: $("#nomdirec").val().toUpperCase(),
                        apaterno: $("#apaterno").val().toUpperCase(),
                        amaterno: $("#amaterno").val().toUpperCase(),
                        fechnac: $("#fechnac").val().toUpperCase(),
                        entnacalumn: $('#entnacalumn').val().toUpperCase(),
                        pais: 9,
                        //pais: $("#pais").val().toUpperCase(),
                        sexo: $("#sexo").val().toUpperCase(),
                        telofi: $("#telofi").val().toUpperCase(),
                        telpart: $("#telpart").val().toUpperCase(),
                        telcel: $("#telcel").val().toUpperCase(),
                        emailpers: $("#emailpers").val().toLowerCase(),
                        emailinstitucional: $("#emailinstitucional").val().toLowerCase()                        
                      },
                    success:function(response){
                            console.log(response);
                            //alert(response);  
                          //$('#aspirante_curso_detail').html(response);  
                          //$('#dataModal').modal('show');  
                     },
                    error : function(request, status, error) {

                            var val = request.responseText;
                            alert("error"+val);
                    }  
                });  
});
</script>
<?php 
unset($tipo_director);
unset($centro_educativo);
unset($estados);
?>