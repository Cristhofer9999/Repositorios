<?php 
header('Content-Type: text/html;'); 
if ($_POST) {
	#Alta 1 Clausura 2 Reapertura 3 Cambio 4
	$status=$_POST["mov"];
	$cct=$_POST["cct"];


   	$tipdir=$_POST["tipdir"];
    $rfc=$_POST["rfc"];
    $curp=$_POST["curp"];
    $nomdirec=$_POST["nomdirec"];
    $apaterno=$_POST["apaterno"];
    $amaterno=$_POST["amaterno"];
    $fechnac=$_POST["fechnac"];
    $entnacalumn=$_POST["entnacalumn"];
    $pais=9;
    //pais: $("#pais").val().toUpperCase(),
    $sexo=$_POST["sexo"];
    $telofi=$_POST["telofi"];
    $telpart=$_POST["telpart"];
    $telcel=$_POST["telcel"];
    $emailpers=$_POST["emailpers"];
    $emailinstitucional=$_POST["emailinstitucional"];


	//echo $status.' - '.$cct.'-'.$rfc;exit;



	include("../modelo/class_c_centro_educativo_dal.php");
	include("../modelo/class_c_migracion_dependencia_dal.php");

	include("../modelo/class_c_migracion_sostenimiento_dal.php");

	include("../modelo/class_c_incorporacion_dal.php");

	$centro_educativo=new centro_educativo_dal();
	$resultado=$centro_educativo->list_by_centro($cct);

	
	
	
	
	
//url del webservice que invocaremos
	$wsdl="http://planeacion.sep.gob.mx/SIC_WCF/Service.svc?wsdl";

//instanciando un nuevo objeto cliente para consumir el webservice
	try {

		$client=new SoapClient($wsdl);
		$client->soap_defencoding ='UTF-8';

	} catch (Exception $e) {

		$centro_educativo->valida_web_service($cct, $status);
		echo 'Excepción capturada: ',  $e->getMessage(), "\r";  

	}


	$CV_Usuario = "COAH05";
	$CONTRASENA = "O3X9L@S1";

	$muni='035';
	$loci='0158';

	switch ($status) {
		case '4':
		foreach ($resultado as $key => $value) {

			if ($value->getCve_estatus()=="1" || $value->getCve_estatus()=="4") {

				// Usuario, Contraseña y Tipo de Movimiento
				$tipomovimiento                 = "C";
				$persona                        = $CV_Usuario;	     
				$password                       = $CONTRASENA;

	     		// Datos de identificación del CT		 
				$Nombre_del_CT                  = $value->getNombre_centro();
				$Cve_Tipo                       = $value->getCve_tipo_centro();
				$Entidad                        = "05";
				$Entidad_Oficial                = "05";
				$date 							= date_create($value->getFecha_fundacion());
				$Date_Fundacion                 = date_format($date, 'd/m/Y');

         		// Datos del Inmueble
				$Cv_Cct_Compartido              = 0;
				$Clave_Cct_Compartido           = "";
				$Cve_Entidad_Inmueble           = "05";
				$Cve_Municipio_Inmueble         = $muni;
				$Cve_Localidad_Inmueble         = $loci;
				$Cve_Tipo_Asentamiento_Inmueble = $value->cve_tipo_asentamiento;
				$Desc_Asentamiento_Inmueble     = $value->asentamiento;
				$Cve_CodPostal_Inmueble         = $value->codigo_postal;
				$Vialidad_Principal             = $value->nombre_vialidad_principal;
				$Clave_Tipo_Vialidad_Principal  = $value->cve_tipo_vialidad_principal;
				$Vialidad_Derecha               = $value->nombre_vialidad_derecha;
				$Clave_Tipo_Vialidad_Derecha    = $value->cve_tipo_vialidad_derecha;
				$Vialidad_Izquierda             = $value->nombre_vialidad_izquierda;
				$Clave_Tipo_Vialidad_Izquierda  = $value->cve_tipo_vialidad_izquierda;
				$Vialidad_Posterior             = $value->nombre_vialidad_posterior;
				$Clave_Tipo_Vialidad_Posterior  = $value->cve_tipo_vialidad_posterior;

         		//VALIDACION INMUEBLE
				if ($value->numero_exterior=='SN') {
					$NumeroExteriorNum=0;
					$Domicilio_Conocido=0;
					$Sin_Numero=1;
				} elseif ($value->numero_exterior=='DOMICILIO CONOCIDO') {
					$NumeroExteriorNum=0;
					$Domicilio_Conocido=1;
					$Sin_Numero=0;
				} 
				else {
					$NumeroExteriorNum=$value->numero_exterior;
					$Domicilio_Conocido=0;
					$Sin_Numero=0;
				}

				$NumeroExteriorAlfanumerico=0;

				if ($value->numero_interior=="") {
					$NumeroInteriorNum=0;
				} else {
					$NumeroInteriorNum=$value->numero_interior;
				}

				$NumeroInteriorAlfanumerico=0;

				if ($value->latitud=="") {
					$Pos_Latitud_Inmueble="28.700000";
				} else {
					$Pos_Latitud_Inmueble=$value->latitud;
				}

				if ($value->longitud=="") {
					$Pos_Longitud_Inmueble="-100.523056";
				} else {
					$Pos_Longitud_Inmueble=$value->longitud;
				}	

				$Referencias_Inmueble           = $value->descripcion_ubicacion;

        		// Datos del Sostenimiento
				$migracion_sostenimiento=new migracion_sostenimiento_dal();
				$list_sost=$migracion_sostenimiento->list_by_sost_dep($value->getCve_sostenimiento(),$value->getCve_dependencia_normativa());

				$Cve_Servicio_Sost              = $value->getCve_migracion_servicio();

				foreach ($list_sost as $key => $value3) {

					$Cve_Control_Sost				= $value3->getCV_CONTROL();
					$Cve_Subcontrol_Sost			= $value3->getCV_SUBCONTROL();
					$Cve_Dep1_Sos					= $value3->getCV_DEPENDENCIAN1();
					$Cve_Dep2_Sos					= $value3->getCV_DEPENDENCIAN2();
					$Cve_Dep3_Sos					= $value3->getCV_DEPENDENCIAN3();
					$Cve_Dep4_Sos					= $value3->getCV_DEPENDENCIAN4();
					$Cve_Dep5_Sos					= $value3->getCV_DEPENDENCIAN5();
					$Cve_Subsidio                   = 0;

				}

				// Datos de la Dependencia Operativa
				$migracion_dependencia=new migracion_dependencia_dal();
				$list_dep=$migracion_dependencia->list_by_dep($value->getCve_dependencia_normativa());

				foreach ($list_dep as $key => $value2) {
					
					$CV_Control_DepOperativa 		= $value2->getCV_CONTROL();
					$Cve_Subcontrol_DepOperativa 	= $value2->getCV_SUBCONTROL();
					$Cve_Dep1_DepOperativa			= $value2->getCV_DEPENDENCIAN1();
					$Cve_Dep2_DepOperativa			= $value2->getCV_DEPENDENCIAN2();
					$Cve_Dep3_DepOperativa			= $value2->getCV_DEPENDENCIAN3();
					$Cve_Dep4_DepOperativa			= $value2->getCV_DEPENDENCIAN4();
					$Cve_Dep5_DepOperativa			= $value2->getCV_DEPENDENCIAN5();

				}

				// Datos de los Contactos
				if ($value->curp=="X" || $value->curp=="") {
					$Curp="XXXX920930HCLNLL09";
				} else {
					$Curp=$curp;
				}

				if ($value->rfc=="X" || $value->rfc=="") {
					$Rfc="XXXX920930";
				} else {
					$Rfc=$rfc;
				}

				if ($value->correo_electronico_institucional=="") {
					$Email="director@docentecoahuila.gob.mx";
				} else {
					$Email=mb_strtolower($emailinstitucional);
				}

				$oContactos = array(
					array(
						'Asociacion'       => "",
						'ClaveCargo'       => 1,
						'Curp'             => $Curp,
						'Rfc'              => $Rfc,
						'Nombre'           => $nomdirec,
						'Apellido1'        => $apaterno,
						'Apellido2'        => $amaterno,
						'Telefono'         => $telofi,
						'Celular'          => $telcel,
						'Email'            => $Email,
						'PaginaWeb'        => "",
						'Extension'        => "",
						'CveTipoDirector'  => $tipdir
					)
				);

				//SUPERVISION
				if ($value->getCve_tipo_centro()=="1") {				

         			// Datos de Supervision
					$CVe_Supervision                 = $value->getCve_tipo_supervision();

         			// Datos de la Dependencia Normativa
					$DepNorBasica = array(
						'CV_CONTROL'       => 0,
						'CV_SUBCONTROL'    => 0,
						'CV_DEPENDENCIAN1' => 0,
						'CV_DEPENDENCIAN2' => 0,
						'CV_DEPENDENCIAN3' => 0,
						'CV_DEPENDENCIAN4' => 0,
						'CV_DEPENDENCIAN5' => 0,
					);

					// Datos de las Caracteristicas
					$CV_CARACTERIZAN1               = 0;
					$CV_CARACTERIZAN2               = 0;

    				//Datos de los Programas
					$Cve_Programa[0]                = 0;

         			// Datos para asociar una escuela con centros de trabajo del tipo de supervisión (Jefatura de Sector o Servicio Regional)
					$Jefatura = array(
						array(
							'CV_RELACIONADA'      => "",
							'CV_TIPO'             => 0
						)
					);

					// Datos para asociar una escuela con Relaciones Institucionales
					$Cve_CCTRELCT = array(
						array(
							'CV_RELACIONADA'      => "",
							'CV_TIPO'             => 0
						)
					);		 

					//Datos para las Carreras
					$carreras = array(
						array(
							'CV_CARRERA'				=> "99999",
							'CV_MODALIDAD'				=> 0,
							'CV_OPCION_EDUCATIVA'     	=> 0,
							'CV_PLAN_ESTUDIO'        	=> 0,
							'DURACION'                	=> 999,
							'CV_DURACION'				=> 999,
							'CV_ESTATUS'              	=> 0,				 
							'CV_CONTROL'     			=> 0,
							'CV_SUBCONTROL'    			=> 0,
							'CV_DEPENDENCIAN1' 			=> 0,
							'CV_DEPENDENCIAN2' 			=> 0,
							'CV_DEPENDENCIAN3' 			=> 0,
							'CV_DEPENDENCIAN4' 			=> 0,
							'CV_DEPENDENCIAN5' 			=> 0, 
							'CV_TIPO_INCORPORACION'   	=> 999,
							'NUMERO_ACUERDO'          	=> "",
							'FECHA_ACUERDO'           	=> "",
							'C_ASOCIACION'            	=> ""
						)
					);

    				//Datos para la Escuela
					if (substr($value->getCve_turno(), 0,1)!="0" && substr($value->getCve_turno(), 1,1)=="0" && substr($value->getCve_turno(), 2,1)=="0") {
						$escuelas=array(
							array(
								'CV_TURNO'                   => substr($value->getCve_turno(), 0,1),
								'CV_TURNO_ANT'               => substr($value->getCve_turno(), 0,1),
								'Carreras'			    	 => $carreras,
								'CV_PROGRAMA'                => $Cve_Programa,
								'CV_CCTRelCT'                => $Cve_CCTRELCT,
								'JefSec_ServReg_Supervicion' => $Jefatura,					
							)
						);
					}

    				//Centro de Atencion Multiple
					$CtroAtenMul=array(
						array(
							'CV_ServicioCAM'      => 0,//1=inicial,2=preescolar....
							'C_ServicioCAM'       => ''
						)
					);

					$fecha_cambio					 = date('d/m/Y');
					$paramct=array(
						'CV_CCT_PROD'					 => $cct,
						'CV_Movimiento'                  => $tipomovimiento,
						'CV_Usuario'                     => $persona,
						'CONTRASENA'                     => $password,

						'Nombre_CT'                      => $Nombre_del_CT,
						'CV_Tipo'                        => $Cve_Tipo,
						'cv_entidad'                     => $Entidad,
						'cv_entidad_oficial'             => $Entidad_Oficial,
						'Fecha_Fundacion'                => $Date_Fundacion,
						'fecha_cambio'					 =>  $fecha_cambio,
						'Cv_Cct_Compartido'              => $Cv_Cct_Compartido,
						'clave_Cct_Compartido'           => $Clave_Cct_Compartido,
						'cve_entidad_Inmueble'           => $Cve_Entidad_Inmueble,
						'cve_municipio_Inmueble'         => $Cve_Municipio_Inmueble,
						'cve_localidad_Inmueble'         => $Cve_Localidad_Inmueble,
						'cve_tipo_asentamiento_Inmueble' => $Cve_Tipo_Asentamiento_Inmueble,
						'desc_asentamiento_Inmueble'     => $Desc_Asentamiento_Inmueble,
						'cve_codpostal_Inmueble'         => $Cve_CodPostal_Inmueble,
						'Vialidad_Principal'             => $Vialidad_Principal,
						'Clave_tipo_vialidad_Principal'  => $Clave_Tipo_Vialidad_Principal,
						'Vialidad_Derecha'               => $Vialidad_Derecha,
						'Clave_tipo_vialidad_Derecha'    => $Clave_Tipo_Vialidad_Derecha,
						'Vialidad_Izquierda'             => $Vialidad_Izquierda,
						'Clave_tipo_vialidad_Izquierda'  => $Clave_Tipo_Vialidad_Izquierda,
						'Vialidad_Posterior'             => $Vialidad_Posterior,
						'Clave_tipo_vialidad_Posterior'  => $Clave_Tipo_Vialidad_Posterior,
						'domicilio_conocido'             => $Domicilio_Conocido,
						'sin_numero'                     => $Sin_Numero,
						'NumeroExteriorNumerico'         => $NumeroExteriorNum,
						'NumeroExteriorAlfanumerico'     => $NumeroExteriorAlfanumerico,
						'NumeroInteriorNumerico'         => $NumeroInteriorNum,
						'NumeroInteriorAlfanumerico'     => $NumeroInteriorAlfanumerico,
						'pos_latitud_Inmueble'           => $Pos_Latitud_Inmueble,
						'pos_longitud_Inmueble'          => $Pos_Longitud_Inmueble,
						'referencias_Inmueble'           => $Referencias_Inmueble,

						'CV_Servicio_Sost'               => $Cve_Servicio_Sost,
						'CV_Control_Sost'                => $Cve_Control_Sost,
						'CV_Subcontrol_Sost'             => $Cve_Subcontrol_Sost,
						'CV_Dep1_Sost'                   => $Cve_Dep1_Sos,
						'CV_Dep2_Sost'                   => $Cve_Dep2_Sos,
						'CV_Dep3_Sost'                   => $Cve_Dep3_Sos,
						'CV_Dep4_Sost'                   => $Cve_Dep4_Sos,
						'CV_Dep5_Sost'                   => $Cve_Dep5_Sos,
						'CV_Subsidio'                    => $Cve_Subsidio,

						'CV_Control_DepOperativa'        => $CV_Control_DepOperativa,
						'CV_Subcontrol_DepOperativa'     => $Cve_Subcontrol_DepOperativa,
						'CV_Dep1_DepOperativa'           => $Cve_Dep1_DepOperativa,
						'CV_Dep2_DepOperativa'           => $Cve_Dep2_DepOperativa,
						'CV_Dep3_DepOperativa'           => $Cve_Dep3_DepOperativa,
						'CV_Dep4_DepOperativa'           => $Cve_Dep4_DepOperativa,
						'CV_Dep5_DepOperativa'           => $Cve_Dep5_DepOperativa,

						'Contactos'                      => $oContactos,		 		

						'CV_SERVICION1_Esc'              => $CV_SERVICION1_Esc,
						'CV_SERVICION2_Esc'              => $CV_SERVICION2_Esc,
						'CV_SERVICION3_Esc'              => $CV_SERVICION3_Esc,

						'DepNormativaBasica'             => $DepNorBasica,

						'CV_CARACTERIZAN1_Esc'           => $CV_CARACTERIZAN1,
						'CV_CARACTERIZAN2_Esc'           => $CV_CARACTERIZAN2,

						'CV_Supervision'                 => $CVe_Supervision,

						'CAM'                            => $CtroAtenMul
					);

    			//JEFATURA DE SECTOR (PENDIENTE)
				} elseif ($value->getCve_tipo_centro()=="2") {
					# code...

				//SERVICIO REGIONAL (PENDIENTE)
				} elseif($value->getCve_tipo_centro()=="3"){

				//COORDINACIÓN DE ZONAS DE EDUCACION FISICA (PENDIENTE)
				} elseif ($value->getCve_tipo_centro()=="4") {
					# code...


				//ALMACEN DE LIBROS GRATUITOS (PENDIENTE)
				} elseif ($value->getCve_tipo_centro()=="5") {
					# code...


				//ADMINISTRATIVO
				} elseif ($value->getCve_tipo_centro()=="6") {

         			// Datos del Servicios de la Escuela
					$CV_SERVICION1_Esc              = 0;
					$CV_SERVICION2_Esc              = 0;
					$CV_SERVICION3_Esc              = 0;

         			// Datos de la Dependencia Normativa
					$DepNorBasica = array(
						'CV_CONTROL'       => 0,
						'CV_SUBCONTROL'    => 0,
						'CV_DEPENDENCIAN1' => 0,
						'CV_DEPENDENCIAN2' => 0,
						'CV_DEPENDENCIAN3' => 0,
						'CV_DEPENDENCIAN4' => 0,
						'CV_DEPENDENCIAN5' => 0,
					);

					// Datos de las Caracteristicas
					$CV_CARACTERIZAN1               = 0;
					$CV_CARACTERIZAN2               = 0;

         			//Datos de los Programas
					$Cve_Programa[0]                = 0;

         			// Datos para asociar una escuela con centros de trabajo del tipo de supervisión (Jefatura de Sector o Servicio Regional)
					$Jefatura = array(
						array(
				   			'CV_RELACIONADA'      => $value->cve_centro_regional, //pendiente
				   			'CV_TIPO'             => 6
				   		)
					);

		 			// Datos para asociar una escuela con Relaciones Institucionales
					$Cve_CCTRELCT = array(
						array(
							'CV_RELACIONADA'      => "",
							'CV_TIPO'             => 0
						)
					);

		 			//Datos para las Carreras
					$carreras = array(
						array(
							'CV_CARRERA'				=> "99999",
							'CV_MODALIDAD'				=> 0,
							'CV_OPCION_EDUCATIVA'    	=> 999,
							'CV_PLAN_ESTUDIO'         	=> 0,
							'DURACION'                	=> 999,
							'CV_DURACION'				=> 999,
							'CV_ESTATUS'              	=> 1,				 
							'CV_CONTROL'     			=> 0,
							'CV_SUBCONTROL'    			=> 0,
							'CV_DEPENDENCIAN1' 			=> 0,
							'CV_DEPENDENCIAN2' 			=> 0,
							'CV_DEPENDENCIAN3' 			=> 0,
							'CV_DEPENDENCIAN4' 			=> 0,
							'CV_DEPENDENCIAN5' 			=> 0, 
							'CV_TIPO_INCORPORACION'   	=> 999,
							'NUMERO_ACUERDO'          	=> "",
							'FECHA_ACUERDO'           	=> "",
							'C_ASOCIACION'            	=> ""
						)
					);

		 			//Datos para la Escuela
					if (substr($value->getCve_turno(), 0,1)!="0" && substr($value->getCve_turno(), 1,1)=="0" && substr($value->getCve_turno(), 2,1)=="0") {

						$escuelas=array(
							array(
								'CV_TURNO'                   => substr($value->getCve_turno(), 0,1),
								'CV_TURNO_ANT'               => substr($value->getCve_turno(), 0,1),
								'Carreras'			    	 => $carreras,
								'CV_PROGRAMA'                => $Cve_Programa,					
								'CV_CCTRelCT'                => $Cve_CCTRELCT,
								'JefSec_ServReg_Supervicion' => $Jefatura,		
							)
						);

					} 

		 			//Centro de Atencion Multiple
					$CtroAtenMul=array(
						array(
							'CV_ServicioCAM'      => 0,
							'C_ServicioCAM'       => ''
						)
					);
					$fecha_cambio					 = date('d/m/Y');
					$paramct=array(
						'CV_CCT_PROD'					 => $cct,
						'CV_Movimiento'                  => $tipomovimiento,
						'CV_Usuario'                     => $persona,
						'CONTRASENA'                     => $password,

						'Nombre_CT'                      => $Nombre_del_CT,
						'CV_Tipo'                        => $Cve_Tipo,
						'cv_entidad'                     => $Entidad,
						'cv_entidad_oficial'             => $Entidad_Oficial,
						'Fecha_Fundacion'                => $Date_Fundacion,
						'fecha_cambio'					=> $fecha_cambio,

						'Cv_Cct_Compartido'              => $Cv_Cct_Compartido,
						'clave_Cct_Compartido'           => $Clave_Cct_Compartido,
						'cve_entidad_Inmueble'           => $Cve_Entidad_Inmueble,
						'cve_municipio_Inmueble'         => $Cve_Municipio_Inmueble,
						'cve_localidad_Inmueble'         => $Cve_Localidad_Inmueble,
						'cve_tipo_asentamiento_Inmueble' => $Cve_Tipo_Asentamiento_Inmueble,
						'desc_asentamiento_Inmueble'     => $Desc_Asentamiento_Inmueble,
						'cve_codpostal_Inmueble'         => $Cve_CodPostal_Inmueble,
						'Vialidad_Principal'             => $Vialidad_Principal,
						'Clave_tipo_vialidad_Principal'  => $Clave_Tipo_Vialidad_Principal,
						'Vialidad_Derecha'               => $Vialidad_Derecha,
						'Clave_tipo_vialidad_Derecha'    => $Clave_Tipo_Vialidad_Derecha,
						'Vialidad_Izquierda'             => $Vialidad_Izquierda,
						'Clave_tipo_vialidad_Izquierda'  => $Clave_Tipo_Vialidad_Izquierda,
						'Vialidad_Posterior'             => $Vialidad_Posterior,
						'Clave_tipo_vialidad_Posterior'  => $Clave_Tipo_Vialidad_Posterior,
						'domicilio_conocido'             => $Domicilio_Conocido,
						'sin_numero'                     => $Sin_Numero,
						'NumeroExteriorNumerico'         => $NumeroExteriorNum,
						'NumeroExteriorAlfanumerico'     => $NumeroExteriorAlfanumerico,
						'NumeroInteriorNumerico'         => $NumeroInteriorNum,
						'NumeroInteriorAlfanumerico'     => $NumeroInteriorAlfanumerico,
						'pos_latitud_Inmueble'           => $Pos_Latitud_Inmueble,
						'pos_longitud_Inmueble'          => $Pos_Longitud_Inmueble,
						'referencias_Inmueble'           => $Referencias_Inmueble,

						'CV_Servicio_Sost'               => $Cve_Servicio_Sost,
						'CV_Control_Sost'                => $Cve_Control_Sost,
						'CV_Subcontrol_Sost'             => $Cve_Subcontrol_Sost,
						'CV_Dep1_Sost'                   => $Cve_Dep1_Sos,
						'CV_Dep2_Sost'                   => $Cve_Dep2_Sos,
						'CV_Dep3_Sost'                   => $Cve_Dep3_Sos,
						'CV_Dep4_Sost'                   => $Cve_Dep4_Sos,
						'CV_Dep5_Sost'                   => $Cve_Dep5_Sos,
						'CV_Subsidio'                    => $Cve_Subsidio,

						'CV_Control_DepOperativa'        => $CV_Control_DepOperativa,
						'CV_Subcontrol_DepOperativa'     => $Cve_Subcontrol_DepOperativa,
						'CV_Dep1_DepOperativa'           => $Cve_Dep1_DepOperativa,
						'CV_Dep2_DepOperativa'           => $Cve_Dep2_DepOperativa,
						'CV_Dep3_DepOperativa'           => $Cve_Dep3_DepOperativa,
						'CV_Dep4_DepOperativa'           => $Cve_Dep4_DepOperativa,
						'CV_Dep5_DepOperativa'           => $Cve_Dep5_DepOperativa,

						'Contactos'                      => $oContactos,		 		

						'CV_SERVICION1_Esc'              => $CV_SERVICION1_Esc,
						'CV_SERVICION2_Esc'              => $CV_SERVICION2_Esc,
						'CV_SERVICION3_Esc'              => $CV_SERVICION3_Esc,

						'DepNormativaBasica'             => $DepNorBasica,

						'CV_CARACTERIZAN1_Esc'           => $CV_CARACTERIZAN1,
						'CV_CARACTERIZAN2_Esc'           => $CV_CARACTERIZAN2,

						'CAM'                            => $CtroAtenMul
					);			

				//BIBLIOTECA
				} elseif ($value->getCve_tipo_centro()=="7") {

         			// Datos del Servicios de la Escuela
					$CV_SERVICION1_Esc              = 0;
					$CV_SERVICION2_Esc              = 0;
					$CV_SERVICION3_Esc              = 0;

         			// Datos de Biblioteca
					$CVe_Biblioteca                 = $value->getCve_tipo_biblioteca();
					$CV_RelBiblioteca               = null;

         			// Datos de la Dependencia Normativa
					$DepNorBasica = array(
						'CV_CONTROL'       => 0,
						'CV_SUBCONTROL'    => 0,
						'CV_DEPENDENCIAN1' => 0,
						'CV_DEPENDENCIAN2' => 0,
						'CV_DEPENDENCIAN3' => 0,
						'CV_DEPENDENCIAN4' => 0,
						'CV_DEPENDENCIAN5' => 0,
					);

					// Datos de las Caracteristicas
					$CV_CARACTERIZAN1               = 0;
					$CV_CARACTERIZAN2               = 0;

         			//Datos de los Programas
					$Cve_Programa[0]                = 0;

         			// Datos para asociar una escuela con centros de trabajo del tipo de supervisión (Jefatura de Sector o Servicio Regional)
					$Jefatura = array(
						array(
							'CV_RELACIONADA'      => "",
							'CV_TIPO'             => 0
						)
					);

					// Datos para asociar una escuela con Relaciones Institucionales
					$Cve_CCTRELCT = array(
						array(
							'CV_RELACIONADA'      => "",
							'CV_TIPO'             => 0
						)
					);

		 			//Datos para las Carreras
					$carreras = array(
						array(
							'CV_CARRERA'				=> "99999",
							'CV_MODALIDAD'				=> 0,
							'CV_OPCION_EDUCATIVA'     	=> 0,
							'CV_PLAN_ESTUDIO'         	=> 0,
							'DURACION'                	=> 999,
							'CV_DURACION'				=> 999,
							'CV_ESTATUS'              	=> 0,				 
							'CV_CONTROL'     			=> 0,
							'CV_SUBCONTROL'    			=> 0,
							'CV_DEPENDENCIAN1' 			=> 0,
							'CV_DEPENDENCIAN2' 			=> 0,
							'CV_DEPENDENCIAN3' 			=> 0,
							'CV_DEPENDENCIAN4' 			=> 0,
							'CV_DEPENDENCIAN5' 			=> 0, 
							'CV_TIPO_INCORPORACION'   	=> 999,
							'NUMERO_ACUERDO'          	=> "",
							'FECHA_ACUERDO'           	=> "",
							'C_ASOCIACION'            	=> ""
						)
					);

		 			//Datos para la Escuela
					if (substr($value->getCve_turno(), 0,1)!="0" && substr($value->getCve_turno(), 1,1)=="0" && substr($value->getCve_turno(), 2,1)=="0") {

						$escuelas=array(
							array(
								'CV_TURNO'                   => substr($value->getCve_turno(), 0,1),
								'CV_TURNO_ANT'               => substr($value->getCve_turno(), 0,1),
								'Carreras'			    	 => $carreras,
								'CV_PROGRAMA'                => $Cve_Programa,					
								'CV_CCTRelCT'                => $Cve_CCTRELCT,
								'JefSec_ServReg_Supervicion' => $Jefatura,		
							)
						);

					} elseif (substr($value->getCve_turno(), 0,1)!="0" && substr($value->getCve_turno(), 1,1)!="0" && substr($value->getCve_turno(), 2,1)=="0") {

						$escuelas=array(
							array(
								'CV_TURNO'                   => substr($value->getCve_turno(), 0,1),
								'CV_TURNO_ANT'               => substr($value->getCve_turno(), 0,1),
								array(
									'CV_TURNO'                   => substr($value->getCve_turno(), 1,1),
									'CV_TURNO_ANT'               => substr($value->getCve_turno(), 1,1),
								),
								'Carreras'			    	 => $carreras,
								'CV_PROGRAMA'                => $Cve_Programa,					
								'CV_CCTRelCT'                => $Cve_CCTRELCT,
								'JefSec_ServReg_Supervicion' => $Jefatura,								
							)
						);

					} elseif (substr($value->getCve_turno(), 0,1)!="0" && substr($value->getCve_turno(), 1,1)!="0" && substr($value->getCve_turno(), 2,1)!="0") {

						$escuelas=array(
							array(
								'CV_TURNO'                   => substr($value->getCve_turno(), 0,1),
								'CV_TURNO_ANT'               => substr($value->getCve_turno(), 0,1),
								array(
									'CV_TURNO'                   => substr($value->getCve_turno(), 1,1),
									'CV_TURNO_ANT'               => substr($value->getCve_turno(), 1,1),
								),
								array(
									'CV_TURNO'                   => substr($value->getCve_turno(), 2,1),
									'CV_TURNO_ANT'               => substr($value->getCve_turno(), 2,1),
								),
								'Carreras'			    	 => $carreras,
								'CV_PROGRAMA'                => $Cve_Programa,					
								'CV_CCTRelCT'                => $Cve_CCTRELCT,
								'JefSec_ServReg_Supervicion' => $Jefatura,								
							)
						);
					}

        			//Centro de Atencion Multiple
					$CtroAtenMul=array(
						array(
							'CV_ServicioCAM'      => 0,
							'C_ServicioCAM'       => ''
						)
					);

					$fecha_cambio					 = date('d/m/Y');

					$paramct=array(
						'CV_CCT_PROD'					 => $cct,
						'CV_Movimiento'                  => $tipomovimiento,
						'CV_Usuario'                     => $persona,
						'CONTRASENA'                     => $password,

						'Nombre_CT'                      => $Nombre_del_CT,
						'CV_Tipo'                        => $Cve_Tipo,
						'cv_entidad'                     => $Entidad,
						'cv_entidad_oficial'             => $Entidad_Oficial,
						'Fecha_Fundacion'                => $Date_Fundacion,
						'fecha_cambio'					=> $fecha_cambio,	

						'Cv_Cct_Compartido'              => $Cv_Cct_Compartido,
						'clave_Cct_Compartido'           => $Clave_Cct_Compartido,
						'cve_entidad_Inmueble'           => $Cve_Entidad_Inmueble,
						'cve_municipio_Inmueble'         => $Cve_Municipio_Inmueble,
						'cve_localidad_Inmueble'         => $Cve_Localidad_Inmueble,
						'cve_tipo_asentamiento_Inmueble' => $Cve_Tipo_Asentamiento_Inmueble,
						'desc_asentamiento_Inmueble'     => $Desc_Asentamiento_Inmueble,
						'cve_codpostal_Inmueble'         => $Cve_CodPostal_Inmueble,
						'Vialidad_Principal'             => $Vialidad_Principal,
						'Clave_tipo_vialidad_Principal'  => $Clave_Tipo_Vialidad_Principal,
						'Vialidad_Derecha'               => $Vialidad_Derecha,
						'Clave_tipo_vialidad_Derecha'    => $Clave_Tipo_Vialidad_Derecha,
						'Vialidad_Izquierda'             => $Vialidad_Izquierda,
						'Clave_tipo_vialidad_Izquierda'  => $Clave_Tipo_Vialidad_Izquierda,
						'Vialidad_Posterior'             => $Vialidad_Posterior,
						'Clave_tipo_vialidad_Posterior'  => $Clave_Tipo_Vialidad_Posterior,
						'domicilio_conocido'             => $Domicilio_Conocido,
						'sin_numero'                     => $Sin_Numero,
						'NumeroExteriorNumerico'         => $NumeroExteriorNum,
						'NumeroExteriorAlfanumerico'     => $NumeroExteriorAlfanumerico,
						'NumeroInteriorNumerico'         => $NumeroInteriorNum,
						'NumeroInteriorAlfanumerico'     => $NumeroInteriorAlfanumerico,
						'pos_latitud_Inmueble'           => $Pos_Latitud_Inmueble,
						'pos_longitud_Inmueble'          => $Pos_Longitud_Inmueble,
						'referencias_Inmueble'           => $Referencias_Inmueble,

						'CV_Servicio_Sost'               => $Cve_Servicio_Sost,
						'CV_Control_Sost'                => $Cve_Control_Sost,
						'CV_Subcontrol_Sost'             => $Cve_Subcontrol_Sost,
						'CV_Dep1_Sost'                   => $Cve_Dep1_Sos,
						'CV_Dep2_Sost'                   => $Cve_Dep2_Sos,
						'CV_Dep3_Sost'                   => $Cve_Dep3_Sos,
						'CV_Dep4_Sost'                   => $Cve_Dep4_Sos,
						'CV_Dep5_Sost'                   => $Cve_Dep5_Sos,
						'CV_Subsidio'                    => $Cve_Subsidio,

						'CV_Control_DepOperativa'        => $CV_Control_DepOperativa,
						'CV_Subcontrol_DepOperativa'     => $Cve_Subcontrol_DepOperativa,
						'CV_Dep1_DepOperativa'           => $Cve_Dep1_DepOperativa,
						'CV_Dep2_DepOperativa'           => $Cve_Dep2_DepOperativa,
						'CV_Dep3_DepOperativa'           => $Cve_Dep3_DepOperativa,
						'CV_Dep4_DepOperativa'           => $Cve_Dep4_DepOperativa,
						'CV_Dep5_DepOperativa'           => $Cve_Dep5_DepOperativa,

						'Contactos'                      => $oContactos,		 		

						'CV_SERVICION1_Esc'              => $CV_SERVICION1_Esc,
						'CV_SERVICION2_Esc'              => $CV_SERVICION2_Esc,
						'CV_SERVICION3_Esc'              => $CV_SERVICION3_Esc,

						'DepNormativaBasica'             => $DepNorBasica,

						'CV_CARACTERIZAN1_Esc'           => $CV_CARACTERIZAN1,
						'CV_CARACTERIZAN2_Esc'           => $CV_CARACTERIZAN2,

						'CV_Biblioteca'                  => $CVe_Biblioteca,

						'CAM'                            => $CtroAtenMul
					);

				//CENTRO CULTURAL (PENDIENTE)
				} elseif ($value->getCve_tipo_centro()=="8") {
					# code...


				//ESCUELA
				} elseif ($value->getCve_tipo_centro()=="9") {
					// Datos del Servicios de la Escuela
					$CV_SERVICION1_Esc              = $value->getCve_tipo_educacion();
					$CV_SERVICION2_Esc              = $value->getCve_nivel_educativo();
					$CV_SERVICION3_Esc              = $value->getCve_subnivel_educativo();

        			// Datos de las Caracteristicas
					$CV_CARACTERIZAN1               = $value->getCve_caracterizan1();
					$CV_CARACTERIZAN2               = $value->getcve_caracterizan2();
					
					//INICIAL
					if ($value->getCve_tipo_educacion()=="1") {

					//BASICA
					} elseif ($value->getCve_tipo_educacion()=="2") {

						// Datos de la Dependencia Normativa (SOLO PARA BASICA)
						$DepNorBasica = array(
							'CV_CONTROL'       => $CV_Control_DepOperativa,
							'CV_SUBCONTROL'    => $Cve_Subcontrol_DepOperativa,
							'CV_DEPENDENCIAN1' => $Cve_Dep1_DepOperativa,
							'CV_DEPENDENCIAN2' => $Cve_Dep2_DepOperativa,
							'CV_DEPENDENCIAN3' => $Cve_Dep3_DepOperativa,
							'CV_DEPENDENCIAN4' => $Cve_Dep4_DepOperativa,
							'CV_DEPENDENCIAN5' => $Cve_Dep5_DepOperativa
						);

						//Datos de los Programas y Relaciones Institucionales
						$Cve_Programa[0]                = 0;
						$Cve_CCTRELCT[0]                = $value->cve_centro_almacen;

						// Datos para asociar una escuela con centros de trabajo del tipo de supervisión (Jefatura de Sector o Servicio Regional)
						$zona=$centro_educativo->cct_zonas($cct);

						if ($zona) {
							foreach ($zona as $key => $value5) {
								$supervisión=$value5->cct_supervision;
							}
						} else{
							$supervisión="";
						}

						$sector=$centro_educativo->cct_jefatura($cct);

						if ($sector) {
							foreach ($sector as $key => $value6) {
								$jefsec=$value6->cct_jefatura;
							}
						} else{

							$jefsec="";
						}

						if ($supervisión!="" && $jefsec!="") {

							$Jefatura = array(
								array(
									'CV_RELACIONADA'      => $supervisión,
									'CV_TIPO'             => 1
								),
								array(
									'CV_RELACIONADA'      => $jefsec,
									'CV_TIPO'             => 2
								),
								array(
									'CV_RELACIONADA'      => $value->cve_centro_regional,
									'CV_TIPO'             => 3
								)
							);

						} elseif ($supervisión!="" && $jefsec=="") {

							$Jefatura = array(
								array(
									'CV_RELACIONADA'      => $supervisión,
									'CV_TIPO'             => 1
								),
								array(
									'CV_RELACIONADA'      => $value->cve_centro_regional,
									'CV_TIPO'             => 3
								)
							);     		

						} elseif ($supervisión=="" && $jefsec!="") {

							$Jefatura = array(
								array(
									'CV_RELACIONADA'      => $jefsec,
									'CV_TIPO'             => 2
								),
								array(
									'CV_RELACIONADA'      => $value->cve_centro_regional,
									'CV_TIPO'             => 3
								)
							);

						} else {

							$Jefatura = array(
								array(
									'CV_RELACIONADA'      => $value->cve_centro_regional,
									'CV_TIPO'             => 3
								)
							);
						} 

						$incorporacion=new incorporacion_dal();
						$list_inc=$incorporacion->list_by_cct_limit($cct);
						$incor = array();

						if ($list_inc) {

							foreach ($list_inc as $key => $value4) {

								if ($value4->getNumero_autorizacion_reconocimiento_estudio()=="") {

									$acuerdo="00000";

								} else
								{

									$acuerdo=$value4->getNumero_autorizacion_reconocimiento_estudio();

								}

								if ($value4->getFecha_acuerdo()=="") {

									$fecha_acuerdo=date('d/m/Y');

								} else
								{
									$date2 = date_create($value4->getFecha_acuerdo());         	
									$fecha_acuerdo = date_format($date2, 'd/m/Y');					
								}

								$cve_tipo_incorporacion=$value4->getCve_tipo_incorporacion();
							}

						} else {
							$cve_tipo_incorporacion = 999;
							$acuerdo="";
							$fecha_acuerdo="";
						}

     					//Datos para la Escuela
						if (substr($value->getCve_turno(), 0,1)!="0" && substr($value->getCve_turno(), 1,1)=="0" && substr($value->getCve_turno(), 2,1)=="0") {

							$escuelas=array(
								array(
									'CV_TURNO'                   => substr($value->getCve_turno(), 0,1),
									'CV_TURNO_ANT'               => substr($value->getCve_turno(), 0,1),
									'CV_MODALIDAD'    			 => $value->getCve_tipo_modalidad(),
									'CV_TIPO_INCORPORACION'      => $cve_tipo_incorporacion,
									'NUMERO_ACUERDO'             => $acuerdo,
									'FECHA_ACUERDO'              => $fecha_acuerdo,
									'C_ASOCIACION'               => "",
									'CV_PROGRAMA'                => $Cve_Programa,					
									'CV_CCTRelCT'                => $Cve_CCTRELCT,
									'JefSec_ServReg_Supervicion' => $Jefatura,	
								)
							);

						} elseif (substr($value->getCve_turno(), 0,1)!="0" && substr($value->getCve_turno(), 1,1)!="0" && substr($value->getCve_turno(), 2,1)=="0") {

							$escuelas=array(
								array(
									'CV_TURNO'                   => substr($value->getCve_turno(), 0,1),
									'CV_TURNO_ANT'               => substr($value->getCve_turno(), 0,1),
									array(
										'CV_TURNO'                   => substr($value->getCve_turno(), 1,1),
										'CV_TURNO_ANT'               => substr($value->getCve_turno(), 1,1),
									),
									'CV_MODALIDAD'    			 => $value->getCve_tipo_modalidad(),
									'CV_TIPO_INCORPORACION'      => $cve_tipo_incorporacion,
									'NUMERO_ACUERDO'             => $acuerdo,
									'FECHA_ACUERDO'              => $fecha_acuerdo,
									'C_ASOCIACION'               => "",
									'CV_PROGRAMA'                => $Cve_Programa,					
									'CV_CCTRelCT'                => $Cve_CCTRELCT,
									'JefSec_ServReg_Supervicion' => $Jefatura,								
								)
							);

						} elseif (substr($value->getCve_turno(), 0,1)!="0" && substr($value->getCve_turno(), 1,1)!="0" && substr($value->getCve_turno(), 2,1)!="0") {

							$escuelas=array(
								array(
									'CV_TURNO'                   => substr($value->getCve_turno(), 0,1),
									'CV_TURNO_ANT'               => substr($value->getCve_turno(), 0,1),
									array(
										'CV_TURNO'                   => substr($value->getCve_turno(), 1,1),
										'CV_TURNO_ANT'               => substr($value->getCve_turno(), 1,1),
									),
									array(
										'CV_TURNO'                   => substr($value->getCve_turno(), 2,1),
										'CV_TURNO_ANT'               => substr($value->getCve_turno(), 2,1),
									),
									'CV_MODALIDAD'    			 => $value->getCve_tipo_modalidad(),
									'CV_TIPO_INCORPORACION'      => $cve_tipo_incorporacion,
									'NUMERO_ACUERDO'             => $acuerdo,
									'FECHA_ACUERDO'              => $fecha_acuerdo,
									'C_ASOCIACION'               => "",
									'CV_PROGRAMA'                => $Cve_Programa,					
									'CV_CCTRelCT'                => $Cve_CCTRELCT,
									'JefSec_ServReg_Supervicion' => $Jefatura,							
								)
							);
						}

		 				//Centro de Atencion Multiple
						$CtroAtenMul=array(
							array(
								'CV_ServicioCAM'      => 0,
								'C_ServicioCAM'       => ''
							)
						);
						$fecha_cambio					 = date('d/m/Y');
						$paramct=array(
							'CV_CCT_PROD'					 => $cct,
							'CV_Movimiento'                  => $tipomovimiento,
							'CV_Usuario'                     => $persona,
							'CONTRASENA'                     => $password,

							'Nombre_CT'                      => $Nombre_del_CT,
							'CV_Tipo'                        => $Cve_Tipo,
							'cv_entidad'                     => $Entidad,
							'cv_entidad_oficial'             => $Entidad_Oficial,
							'Fecha_Fundacion'                => $Date_Fundacion,
							'fecha_cambio'					 => $fecha_cambio,

							'Cv_Cct_Compartido'              => $Cv_Cct_Compartido,
							'clave_Cct_Compartido'           => $Clave_Cct_Compartido,
							'cve_entidad_Inmueble'           => $Cve_Entidad_Inmueble,
							'cve_municipio_Inmueble'         => $Cve_Municipio_Inmueble,
							'cve_localidad_Inmueble'         => $Cve_Localidad_Inmueble,
							'cve_tipo_asentamiento_Inmueble' => $Cve_Tipo_Asentamiento_Inmueble,
							'desc_asentamiento_Inmueble'     => $Desc_Asentamiento_Inmueble,
							'cve_codpostal_Inmueble'         => $Cve_CodPostal_Inmueble,
							'Vialidad_Principal'             => $Vialidad_Principal,
							'Clave_tipo_vialidad_Principal'  => $Clave_Tipo_Vialidad_Principal,
							'Vialidad_Derecha'               => $Vialidad_Derecha,
							'Clave_tipo_vialidad_Derecha'    => $Clave_Tipo_Vialidad_Derecha,
							'Vialidad_Izquierda'             => $Vialidad_Izquierda,
							'Clave_tipo_vialidad_Izquierda'  => $Clave_Tipo_Vialidad_Izquierda,
							'Vialidad_Posterior'             => $Vialidad_Posterior,
							'Clave_tipo_vialidad_Posterior'  => $Clave_Tipo_Vialidad_Posterior,
							'domicilio_conocido'             => $Domicilio_Conocido,
							'sin_numero'                     => $Sin_Numero,
							'NumeroExteriorNumerico'         => $NumeroExteriorNum,
							'NumeroExteriorAlfanumerico'     => $NumeroExteriorAlfanumerico,
							'NumeroInteriorNumerico'         => $NumeroInteriorNum,
							'NumeroInteriorAlfanumerico'     => $NumeroInteriorAlfanumerico,
							'pos_latitud_Inmueble'           => $Pos_Latitud_Inmueble,
							'pos_longitud_Inmueble'          => $Pos_Longitud_Inmueble,
							'referencias_Inmueble'           => $Referencias_Inmueble,

							'CV_Servicio_Sost'               => $Cve_Servicio_Sost,
							'CV_Control_Sost'                => $Cve_Control_Sost,
							'CV_Subcontrol_Sost'             => $Cve_Subcontrol_Sost,
							'CV_Dep1_Sost'                   => $Cve_Dep1_Sos,
							'CV_Dep2_Sost'                   => $Cve_Dep2_Sos,
							'CV_Dep3_Sost'                   => $Cve_Dep3_Sos,
							'CV_Dep4_Sost'                   => $Cve_Dep4_Sos,
							'CV_Dep5_Sost'                   => $Cve_Dep5_Sos,
							'CV_Subsidio'                    => $Cve_Subsidio,

							'CV_Control_DepOperativa'        => $CV_Control_DepOperativa,
							'CV_Subcontrol_DepOperativa'     => $Cve_Subcontrol_DepOperativa,
							'CV_Dep1_DepOperativa'           => $Cve_Dep1_DepOperativa,
							'CV_Dep2_DepOperativa'           => $Cve_Dep2_DepOperativa,
							'CV_Dep3_DepOperativa'           => $Cve_Dep3_DepOperativa,
							'CV_Dep4_DepOperativa'           => $Cve_Dep4_DepOperativa,
							'CV_Dep5_DepOperativa'           => $Cve_Dep5_DepOperativa,

							'Contactos'                      => $oContactos,		 

							'CV_SERVICION1_Esc'              => $CV_SERVICION1_Esc,
							'CV_SERVICION2_Esc'              => $CV_SERVICION2_Esc,
							'CV_SERVICION3_Esc'              => $CV_SERVICION3_Esc,

							'DepNormativaBasica'             => $DepNorBasica,

							'CV_CARACTERIZAN1_Esc'           => $CV_CARACTERIZAN1,
							'CV_CARACTERIZAN2_Esc'           => $CV_CARACTERIZAN2,

							'CAM'                            => $CtroAtenMul
						);

					//MEDIA SUPERIOR
					} elseif ($value->getCve_tipo_educacion()=="3") {
						// Datos de la Dependencia Normativa
						$DepNorBasica = array(
							'CV_CONTROL'       => 0,
							'CV_SUBCONTROL'    => 0,
							'CV_DEPENDENCIAN1' => 0,
							'CV_DEPENDENCIAN2' => 0,
							'CV_DEPENDENCIAN3' => 0,
							'CV_DEPENDENCIAN4' => 0,
							'CV_DEPENDENCIAN5' => 0,
						);

						// Datos de las Caracteristicas
						$CV_CARACTERIZAN1               = 0;
						$CV_CARACTERIZAN2               = 0;

         				//Datos de los Programas
						$Cve_Programa[0]                = 0;

         				// Datos para asociar una escuela con centros de trabajo del tipo de supervisión (Jefatura de Sector o Servicio Regional)
						$Jefatura = array(
							array(
								'CV_RELACIONADA'      => "",
								'CV_TIPO'             => 0
							)
						);

						$institucion=$centro_educativo->list_by_centro($value->getCve_institucional());

						if ($institucion) {
							foreach ($institucion as $key => $value7) {
								$tipo_institucion=$value7->getCve_tipo_centro();
							}
						} else {
							$tipo_institucion="18";
						}

     					// Datos para asociar una escuela con Relaciones Institucionales
						$Cve_CCTRELCT = array(
							array(
								'CV_RELACIONADA'      => $value->getCve_institucional(),
								'CV_TIPO'             => $tipo_institucion
							)
						);	

		 				//Datos para las Carreras
						$carreras = array(
							array(
								'CV_CARRERA'				=> "99999",
								'CV_MODALIDAD'				=> 1,
								'CV_OPCION_EDUCATIVA'     	=> 1,
								'CV_PLAN_ESTUDIO'         	=> 0,
								'DURACION'                	=> 999,
								'CV_DURACION'				=> 999,
								'CV_ESTATUS'              	=> 1,				 
								'CV_CONTROL'     			=> 1,
								'CV_SUBCONTROL'    			=> 2,
								'CV_DEPENDENCIAN1' 			=> 1,
								'CV_DEPENDENCIAN2' 			=> 1,
								'CV_DEPENDENCIAN3' 			=> 0,
								'CV_DEPENDENCIAN4' 			=> 0,
								'CV_DEPENDENCIAN5' 			=> 0, 
								'CV_TIPO_INCORPORACION'   	=> 999,
								'NUMERO_ACUERDO'         	=> "",
								'FECHA_ACUERDO'           	=> "",
								'C_ASOCIACION'            	=> ""
							)
						);

		 				//Datos para la Escuela
						if (substr($value->getCve_turno(), 0,1)!="0" && substr($value->getCve_turno(), 1,1)=="0" && substr($value->getCve_turno(), 2,1)=="0") {

							$escuelas=array(
								array(
									'CV_TURNO'                   => substr($value->getCve_turno(), 0,1),
									'CV_TURNO_ANT'               => substr($value->getCve_turno(), 0,1),
									'Carreras'			    	 => $carreras,
									'CV_PROGRAMA'                => $Cve_Programa,					
									'CV_CCTRelCT'                => $Cve_CCTRELCT,
									'JefSec_ServReg_Supervicion' => $Jefatura,		
								)
							);

						} elseif (substr($value->getCve_turno(), 0,1)!="0" && substr($value->getCve_turno(), 1,1)!="0" && substr($value->getCve_turno(), 2,1)=="0") {

							$escuelas=array(
								array(
									'CV_TURNO'                   => substr($value->getCve_turno(), 0,1),
									'CV_TURNO_ANT'               => substr($value->getCve_turno(), 0,1),
									array(
										'CV_TURNO'                   => substr($value->getCve_turno(), 1,1),
										'CV_TURNO_ANT'               => substr($value->getCve_turno(), 1,1),
									),
									'Carreras'			    	 => $carreras,
									'CV_PROGRAMA'                => $Cve_Programa,					
									'CV_CCTRelCT'                => $Cve_CCTRELCT,
									'JefSec_ServReg_Supervicion' => $Jefatura,								
								)
							);

						} elseif (substr($value->getCve_turno(), 0,1)!="0" && substr($value->getCve_turno(), 1,1)!="0" && substr($value->getCve_turno(), 2,1)!="0") {

							$escuelas=array(
								array(
									'CV_TURNO'                   => substr($value->getCve_turno(), 0,1),
									'CV_TURNO_ANT'               => substr($value->getCve_turno(), 0,1),
									array(
										'CV_TURNO'                   => substr($value->getCve_turno(), 1,1),
										'CV_TURNO_ANT'               => substr($value->getCve_turno(), 1,1),
									),
									array(
										'CV_TURNO'                   => substr($value->getCve_turno(), 2,1),
										'CV_TURNO_ANT'               => substr($value->getCve_turno(), 2,1),
									),
									'Carreras'			    	 => $carreras,
									'CV_PROGRAMA'                => $Cve_Programa,					
									'CV_CCTRelCT'                => $Cve_CCTRELCT,
									'JefSec_ServReg_Supervicion' => $Jefatura,								
								)
							);
						}

        				//Centro de Atencion Multiple
						$CtroAtenMul=array(
							array(
								'CV_ServicioCAM'      => 0,
								'C_ServicioCAM'       => ''
							)
						);

						$fecha_cambio					 = date('d/m/Y');

						$paramct=array(
							'CV_CCT_PROD'					 => $cct,
							'CV_Movimiento'                  => $tipomovimiento,
							'CV_Usuario'                     => $persona,
							'CONTRASENA'                     => $password,

							'Nombre_CT'                      => $Nombre_del_CT,
							'CV_Tipo'                        => $Cve_Tipo,
							'cv_entidad'                     => $Entidad,
							'cv_entidad_oficial'             => $Entidad_Oficial,
							'Fecha_Fundacion'                => $Date_Fundacion,
							'fecha_cambio'					 => $fecha_cambio,	

							'Cv_Cct_Compartido'              => $Cv_Cct_Compartido,
							'clave_Cct_Compartido'           => $Clave_Cct_Compartido,
							'cve_entidad_Inmueble'           => $Cve_Entidad_Inmueble,
							'cve_municipio_Inmueble'         => $Cve_Municipio_Inmueble,
							'cve_localidad_Inmueble'         => $Cve_Localidad_Inmueble,
							'cve_tipo_asentamiento_Inmueble' => $Cve_Tipo_Asentamiento_Inmueble,
							'desc_asentamiento_Inmueble'     => $Desc_Asentamiento_Inmueble,
							'cve_codpostal_Inmueble'         => $Cve_CodPostal_Inmueble,
							'Vialidad_Principal'             => $Vialidad_Principal,
							'Clave_tipo_vialidad_Principal'  => $Clave_Tipo_Vialidad_Principal,
							'Vialidad_Derecha'               => $Vialidad_Derecha,
							'Clave_tipo_vialidad_Derecha'    => $Clave_Tipo_Vialidad_Derecha,
							'Vialidad_Izquierda'             => $Vialidad_Izquierda,
							'Clave_tipo_vialidad_Izquierda'  => $Clave_Tipo_Vialidad_Izquierda,
							'Vialidad_Posterior'             => $Vialidad_Posterior,
							'Clave_tipo_vialidad_Posterior'  => $Clave_Tipo_Vialidad_Posterior,
							'domicilio_conocido'             => $Domicilio_Conocido,
							'sin_numero'                     => $Sin_Numero,
							'NumeroExteriorNumerico'         => $NumeroExteriorNum,
							'NumeroExteriorAlfanumerico'     => $NumeroExteriorAlfanumerico,
							'NumeroInteriorNumerico'         => $NumeroInteriorNum,
							'NumeroInteriorAlfanumerico'     => $NumeroInteriorAlfanumerico,
							'pos_latitud_Inmueble'           => $Pos_Latitud_Inmueble,
							'pos_longitud_Inmueble'          => $Pos_Longitud_Inmueble,
							'referencias_Inmueble'           => $Referencias_Inmueble,

							'CV_Servicio_Sost'               => $Cve_Servicio_Sost,
							'CV_Control_Sost'                => $Cve_Control_Sost,
							'CV_Subcontrol_Sost'             => $Cve_Subcontrol_Sost,
							'CV_Dep1_Sost'                   => $Cve_Dep1_Sos,
							'CV_Dep2_Sost'                   => $Cve_Dep2_Sos,
							'CV_Dep3_Sost'                   => $Cve_Dep3_Sos,
							'CV_Dep4_Sost'                   => $Cve_Dep4_Sos,
							'CV_Dep5_Sost'                   => $Cve_Dep5_Sos,
							'CV_Subsidio'                    => $Cve_Subsidio,

							'CV_Control_DepOperativa'        => $CV_Control_DepOperativa,
							'CV_Subcontrol_DepOperativa'     => $Cve_Subcontrol_DepOperativa,
							'CV_Dep1_DepOperativa'           => $Cve_Dep1_DepOperativa,
							'CV_Dep2_DepOperativa'           => $Cve_Dep2_DepOperativa,
							'CV_Dep3_DepOperativa'           => $Cve_Dep3_DepOperativa,
							'CV_Dep4_DepOperativa'           => $Cve_Dep4_DepOperativa,
							'CV_Dep5_DepOperativa'           => $Cve_Dep5_DepOperativa,

							'Contactos'                      => $oContactos,		 		

							'CV_SERVICION1_Esc'              => $CV_SERVICION1_Esc,
							'CV_SERVICION2_Esc'              => $CV_SERVICION2_Esc,
							'CV_SERVICION3_Esc'              => $CV_SERVICION3_Esc,

							'DepNormativaBasica'             => $DepNorBasica,

							'CV_CARACTERIZAN1_Esc'           => $CV_CARACTERIZAN1,
							'CV_CARACTERIZAN2_Esc'           => $CV_CARACTERIZAN2,

							'CAM'                            => $CtroAtenMul
						);

												

					//SUPERIOR
					} elseif ($value->getCve_tipo_educacion()=="4") {

					//CAPACITACION PARA EL TRABAJO
					} elseif ($value->getCve_tipo_educacion()=="5") {

					//ESPECIAL
					} elseif ($value->getCve_tipo_educacion()=="6") {

					//OTROS
					} elseif ($value->getCve_tipo_educacion()=="7") {
						# code...
					}
					


				//APOYO A LA EDUCACION (PENDIENTE)
				} elseif ($value->getCve_tipo_centro()=="10") {
					# code...


				//DESARROLLO COMUNITARIO (PENDIENTE)
				} elseif ($value->getCve_tipo_centro()=="11") {
					# code...


				//CENTRO DE INVESTIGACION (PENDIENTE)
				} elseif ($value->getCve_tipo_centro()=="12") {
					# code...


				//RECTORIA
				} elseif ($value->getCve_tipo_centro()=="13") {
					# code...


				//ASISTENCIALES (PENDIENTE)
				} elseif ($value->getCve_tipo_centro()=="14") {
					# code...


				//BOLSA (LIQUIDACION) (PENDIENTE)
				} elseif ($value->getCve_tipo_centro()=="15") {
					# code...


				//NO DISPONIBLE (PENDIENTE)
				} elseif ($value->getCve_tipo_centro()=="16") {
					# code...


				//CENTRO DE MAESTROS (PENDIENTE)
				} elseif ($value->getCve_tipo_centro()=="17") {
					# code...


				//PLANTEL (MEDIA SUPERIOR) (PENDIENTE)
				} elseif ($value->getCve_tipo_centro()=="18") {
					# code...
				}

				$parametrosEsc=$escuelas;
				//print_r($paramct);
				//print_r($parametrosEsc);exit;
				try
				{
					
						echo '<pre>';
						print_r($parametrosEsc);
						echo '</pre>';
					$resultado = $client->CambioCentroTrabajo(array('CT' => $paramct, 'escuelaWS' => $parametrosEsc));  



					if ($resultado->Errores->string[0]==$cct) {
						$centro_educativo->valida_web_service($cct, '0');
						print 'resultado';
						print_r($resultado);
					} else
					{
						$centro_educativo->valida_web_service($cct, $status);
						print "resultado";
						print_r($resultado);
					}
				}
				catch (Exception $e)
				{
					$centro_educativo->valida_web_service($cct, $status);
					echo 'Excepción capturada: ',  $e->getMessage(), "\r";  
				}
				
			} else {
				echo "El Centro Educativo no está como Alta o como Reapertura";
				return;
			}
		}
		break;
	}
}
unset($centro_educativo);
unset($migracion_dependencia);
unset($migracion_sostenimiento);
unset($incorporacion);
unset($institucion);
?>