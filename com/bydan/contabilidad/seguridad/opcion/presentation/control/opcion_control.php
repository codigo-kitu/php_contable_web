<?php declare(strict_types = 1);
 /*
*AVISO LEGAL
(C) Copyright
*Este programa esta protegido por la ley de derechos de autor.
*La reproduccion o distribucion ilicita de este programa o de cualquiera de
*sus partes esta penado por la ley con severas sanciones civiles y penales,
*y seran objeto de todas las sanciones legales que correspondan.

*Su contenido no puede copiarse para fines comerciales o de otras,
*ni puede mostrarse, incluso en una version modificada, en otros sitios Web.
Solo esta permitido colocar hipervinculos al sitio web.
*/

namespace com\bydan\contabilidad\seguridad\opcion\presentation\control;

use Exception;

include_once('com/bydan/framework/contabilidad/util/Constantes.php');
use com\bydan\framework\contabilidad\util\Constantes;

include_once(Constantes::$PATH_REL.'com/bydan/framework/contabilidad/util/Funciones.php');
use com\bydan\framework\contabilidad\util\Funciones;

use com\bydan\framework\contabilidad\util\FuncionesWebArbol;

include_once(Constantes::$PATH_REL.'com/bydan/framework/contabilidad/util/PaqueteTipo.php');
use com\bydan\framework\contabilidad\util\PaqueteTipo;

use com\bydan\framework\contabilidad\util\ControlTipo;
use com\bydan\framework\contabilidad\util\DeepLoadType;
use com\bydan\framework\contabilidad\util\EventoTipo;
use com\bydan\framework\contabilidad\util\EventoSubTipo;
use com\bydan\framework\contabilidad\util\EventoGlobalTipo;
use com\bydan\framework\contabilidad\util\FuncionesObject;
use com\bydan\framework\contabilidad\util\Connexion;

use com\bydan\framework\contabilidad\util\excel\ExcelHelper;
use com\bydan\framework\contabilidad\util\pdf\FpdfHelper;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Mensajes;
use com\bydan\framework\contabilidad\business\entity\SelectItem;

//use com\bydan\framework\contabilidad\business\entity\DatoGeneralMinimo;
//use com\bydan\framework\contabilidad\business\logic\DatosDeep;

use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\ConexionController;

use com\bydan\framework\contabilidad\business\data\ModelBase;

use com\bydan\framework\contabilidad\business\logic\DatosCliente;
use com\bydan\framework\contabilidad\business\logic\Pagination;

use com\bydan\framework\contabilidad\presentation\report\CellReport;
use com\bydan\framework\contabilidad\presentation\templating\Template;

use com\bydan\framework\contabilidad\presentation\web\control\ControllerBase;

use com\bydan\framework\contabilidad\presentation\web\SessionBase;
use com\bydan\framework\contabilidad\presentation\web\PaginationLink;
use com\bydan\framework\contabilidad\presentation\web\HistoryWeb;

use com\bydan\framework\contabilidad\business\entity\MaintenanceType;
use com\bydan\framework\contabilidad\business\entity\ParameterDivSecciones;
//use com\bydan\framework\contabilidad\business\entity\Classe;
//use com\bydan\framework\contabilidad\presentation\web\SessionBase;

use com\bydan\framework\globales\seguridad\logic\GlobalSeguridad;

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\perfil_opcion\business\entity\perfil_opcion;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_param_return;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_param_return;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic_add;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\logic\resumen_usuario_logic_add;

use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/opcion/util/opcion_carga.php');
use com\bydan\contabilidad\seguridad\opcion\util\opcion_carga;

use com\bydan\contabilidad\seguridad\opcion\util\opcion_util;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_param_return;
use com\bydan\contabilidad\seguridad\opcion\business\logic\opcion_logic;
use com\bydan\contabilidad\seguridad\opcion\presentation\session\opcion_session;


//FK


use com\bydan\contabilidad\seguridad\sistema\business\entity\sistema;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_carga;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_util;

use com\bydan\contabilidad\seguridad\grupo_opcion\business\entity\grupo_opcion;
use com\bydan\contabilidad\seguridad\grupo_opcion\business\logic\grupo_opcion_logic;
use com\bydan\contabilidad\seguridad\grupo_opcion\util\grupo_opcion_carga;
use com\bydan\contabilidad\seguridad\grupo_opcion\util\grupo_opcion_util;

use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\modulo\business\logic\modulo_logic;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;

//REL


use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;
use com\bydan\contabilidad\seguridad\perfil\presentation\session\perfil_session;

use com\bydan\contabilidad\seguridad\accion\util\accion_carga;
use com\bydan\contabilidad\seguridad\accion\util\accion_util;
use com\bydan\contabilidad\seguridad\accion\presentation\session\accion_session;

use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_carga;
use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_util;
use com\bydan\contabilidad\seguridad\perfil_opcion\presentation\session\perfil_opcion_session;

use com\bydan\contabilidad\seguridad\campo\util\campo_carga;
use com\bydan\contabilidad\seguridad\campo\util\campo_util;
use com\bydan\contabilidad\seguridad\campo\presentation\session\campo_session;


/*CARGA ARCHIVOS FRAMEWORK*/
opcion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
opcion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/seguridad/opcion/presentation/control/opcion_init_control.php');
use com\bydan\contabilidad\seguridad\opcion\presentation\control\opcion_init_control;

include_once('com/bydan/contabilidad/seguridad/opcion/presentation/control/opcion_base_control.php');
use com\bydan\contabilidad\seguridad\opcion\presentation\control\opcion_base_control;

class opcion_control extends opcion_base_control {	
	
	public function inicializarParametrosQueryString(mixed $post1=null) {
		$post=null;			
		
		if($_POST) {
			$post=$_POST;	
			
		} else if($_GET) {
			$post=$_GET;
		
		} else if($post1) {
			$post=$post1;
		}
		
		if($_POST || $_GET) {
			
			if($post!=null && count($post)>0) {
				
				$this->inicializarParametrosQueryStringBase($post);
				
				/*TIENE PARAMETROS DE MANTENIMIENTO DE DATOS*/			
				if($this->tieneParametrosMantenimientoDatos()) {
					
					
				if($this->data['es_para_menu']==null) {$this->data['es_para_menu']=false;} else {if($this->data['es_para_menu']=='on') {$this->data['es_para_menu']=true;}}
					
				if($this->data['es_guardar_relaciones']==null) {$this->data['es_guardar_relaciones']=false;} else {if($this->data['es_guardar_relaciones']=='on') {$this->data['es_guardar_relaciones']=true;}}
					
				if($this->data['con_mostrar_acciones_campo']==null) {$this->data['con_mostrar_acciones_campo']=false;} else {if($this->data['con_mostrar_acciones_campo']=='on') {$this->data['con_mostrar_acciones_campo']=true;}}
					
				if($this->data['estado']==null) {$this->data['estado']=false;} else {if($this->data['estado']=='on') {$this->data['estado']=true;}}
				}
			}
		
		} else {
			$this->data = $post;
		}
		
		$this->cargarParametrosReporte();
		
		$this->cargarParamsPostAccion();
		
		$this->cargarParamsPaginar();
		
		$this->cargarParametrosEventosTabla();
	}

	public function ejecutarParametrosQueryString() {
		/*$post=$_POST;*/	
		$action='';
		$return_json=true;
		
		$bitEsPopup=false;
		
		/*
		if(count($_GET) > 1) {
			$post=$_GET;
		}
		*/
		
		
		$action = $this->getDataAction();
			
		if($action!=null) {
			
			$this->action=$action;
			
			$this->bitEsAndroid=false;
				
			$this->bitEsAndroid = $this->getDataEsAndroid();

			/*NO SE GUARDA EN SESSION PERO SIEMPRE SE INICIALIZA DEFECTO
			INICIALIZA VARIABLES PARA QUE RECARGE TODOS COMBOS*/
			$this->setstrRecargarFkInicializar();
				
			if($action=='load' || $action=='index') {
				$this->loadIndex();				
				
			} else if($action=='indexRecargarRelacionado') {
				$this->indexRecargarRelacionado();								
				
			} else if($action=='unload') {
				$this->eliminarVariablesDeSesion();
				
			} else if($action=='recargarInformacion') {
				$this->recargarInformacionAction();								
				
			} else if($action=='buscarPorIdGeneral') {
				$this->buscarPorIdGeneralAction();	
				
			} else if($action=='anteriores') {
				$this->anterioresAction();				
				
			} else if($action=='siguientes') {
				$this->siguientesAction();	
				
			} else if($action=='recargarUltimaInformacion') {
				$this->recargarUltimaInformacionAction();								
				
			} else if($action=='seleccionarLoteFk') {
				$this->seleccionarLoteFkAction();								
				
			} else if($action=='nuevo') {
				$this->nuevoAction();				
				
			} else if($action=='actualizar') {
				$this->actualizarAction();				
				
			} else if($action=='eliminar') {
				$this->eliminarAction();			
				
			} else if($action=='cancelar') {
				$this->cancelarAction();				
				
			} else if($action=='guardarCambios') {
				$this->guardarCambiosAction();				
				
			} else if($action=='duplicar') {
				$this->duplicarAction();				
				
			}  else if($action=='copiar') {
				$this->copiarAction();				
				
			} else if($action=='nuevoPreparar') {//Para Pagina con Formulario											
				$this->nuevoPrepararAction();
				
			} else if($action=='nuevoPrepararPaginaForm') {
				$this->nuevoPrepararPaginaFormAction();							
				
			} else if($action=='nuevoPrepararAbrirPaginaForm') {//Para Pagina Formulario
				$this->nuevoPrepararAbrirPaginaFormAction();														
				
			} else if($action=='nuevoTablaPreparar') {
				$this->nuevoTablaPrepararAction();				
				
			} else if($action=='seleccionarActual') {
				$this->seleccionarActualAction();	
				
			} else if($action=='seleccionarActualPaginaForm') {
				$this->seleccionarActualPaginaFormAction();
									
			} else if($action=='seleccionarActualAbrirPaginaForm') {
				$this->seleccionarActualAbrirPaginaFormAction();
				
			} else if($action=='editarTablaDatos') {
				$this->editarTablaDatosAction();				
				
			}
			else if($action=='eliminarCascada' ) {
				$this->eliminarCascadaAction();
				
			} 
			else if($action=='eliminarTabla' ) {
				$this->eliminarTablaAction();	
				
			} else if($action=='quitarElementosTabla' ) {
				$this->quitarElementosTablaAction();
				
			} 
			else if($action=='recargarReferencias' ) {
				$this->recargarReferenciasAction();
				
			}
			else if($action=='abrirArbol') {
				$this->abrirArbolAction();
			}
			else if($action=='cargarArbol') {
				$this->cargarArbolAction();
			}
			else if($action=='manejarEventos' ) {
				$this->manejarEventosAction();
			}
			else if($action=='recargarFormularioGeneral' ) {
				$this->recargarFormularioGeneralAction();
			} 
			
			else if($action=='mostrarEjecutarAccionesRelaciones' ) {
				$this->mostrarEjecutarAccionesRelacionesAction();
			}
			
			else if($action=='generarFpdf') {		
				$this->generarFpdfAction();
				
			} else if($action=='generarHtmlReporte') {
				$this->generarHtmlReporteAction();
				
			} else if($action=='generarHtmlFormReporte') {
				$this->generarHtmlFormReporteAction();
				
			} else if($action=='generarHtmlRelacionesReporte') {
				$this->generarHtmlRelacionesReporteAction();
				
			} else if($action=='quitarRelacionesReporte') {
				$this->quitarRelacionesReporte();
				
			} else if($action=='generarReporteConPhpExcel') {
				$return_json=$this->generarReporteConPhpExcelAction();
				
			} else if($action=='generarReporteConPhpExcelVertical') {
				$return_json=$this->generarReporteConPhpExcelVerticalAction();
				
			} else if($action=='generarReporteConPhpExcelRelaciones') {
				$return_json=$this->generarReporteConPhpExcelRelacionesAction();
				
			} 
			else if($action=='registrarSesionParaperfil_opciones' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idopcionActual=$this->getDataId();
				$this->registrarSesionParaperfil_opciones($idopcionActual);
			}
			else if($action=='registrarSesionParaopciones' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idopcionActual=$this->getDataId();
				$this->registrarSesionParaopciones($idopcionActual);
			}
			else if($action=='registrarSesionParaacciones' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idopcionActual=$this->getDataId();
				$this->registrarSesionParaacciones($idopcionActual);
			}
			else if($action=='registrarSesionParacampos' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idopcionActual=$this->getDataId();
				$this->registrarSesionParacampos($idopcionActual);
			} 
			
			
			else if($action=="BusquedaPorIdSistemaPorIdOpcion"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsBusquedaPorIdSistemaPorIdOpcionParaProcesar();
			}
			else if($action=="BusquedaPorIdSistemaPorNombre"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsBusquedaPorIdSistemaPorNombreParaProcesar();
			}
			else if($action=="FK_Idgrupo_opcion"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idgrupo_opcionParaProcesar();
			}
			else if($action=="FK_Idmodulo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdmoduloParaProcesar();
			}
			else if($action=="FK_Idopcion"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdopcionParaProcesar();
			}
			else if($action=="FK_Idsistema"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdsistemaParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParasistema') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idopcionActual=$this->getDataId();
				$this->abrirBusquedaParasistema();//$idopcionActual
			}
			else if($action=='abrirBusquedaParaopcion') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idopcionActual=$this->getDataId();
				$this->abrirBusquedaParaopcion();//$idopcionActual
			}
			else if($action=='abrirBusquedaParagrupo_opcion') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idopcionActual=$this->getDataId();
				$this->abrirBusquedaParagrupo_opcion();//$idopcionActual
			}
			else if($action=='abrirBusquedaParamodulo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idopcionActual=$this->getDataId();
				$this->abrirBusquedaParamodulo();//$idopcionActual
			}
			
			else {
				/*ACCIONES ADDITIONAL*/
				
				$this->strProceso=$action;
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				
				$return_json=$this->procesarAccionJson($return_json,$action);				
			}
			
			
			$this->setTipoAction($action);
			
			//$this->setActualizarParameterDivSecciones();
			
			
			if($return_json==true) {
				
				if(!$this->bitEsAndroid) {
					
					$opcionController = new opcion_control();
					
					$opcionController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($opcionController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$opcionController = new opcion_control();
						$opcionController = $this;
						
						$jsonResponse = json_encode($opcionController->opcions);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->opcionReturnGeneral==null) {
					$this->opcionReturnGeneral=new opcion_param_return();
				}
				
				echo($this->opcionReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$opcionController=new opcion_control();
		
		$opcionController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$opcionController->usuarioActual=new usuario();
		
		$opcionController->usuarioActual->setId($this->usuarioActual->getId());
		$opcionController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$opcionController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$opcionController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$opcionController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$opcionController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$opcionController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$opcionController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $opcionController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadopcion= $this->getDataGeneralString('strTypeOnLoadopcion');
		$strTipoPaginaAuxiliaropcion= $this->getDataGeneralString('strTipoPaginaAuxiliaropcion');
		$strTipoUsuarioAuxiliaropcion= $this->getDataGeneralString('strTipoUsuarioAuxiliaropcion');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadopcion,$strTipoPaginaAuxiliaropcion,$strTipoUsuarioAuxiliaropcion,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadopcion!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('opcion','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	public function indexRecargarRelacionado() {
		$this->cargarParametrosPagina();
									
		$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);
		
		$this->saveGetSessionControllerAndPageAuxiliar(false);
		
		//SE DUPLICA
		//$this->getHtmlTablaDatos(false);
		
		$this->returnHtml(true);
	}
	
	public function recargarInformacionAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);				
		$this->recargarInformacion();
	}
	
	public function buscarPorIdGeneralAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);				
				
		$idActual=$this->getDataId();
		
		$this->buscarPorIdGeneral($idActual);
	}
	
	public function anterioresAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);				
		$this->anteriores();
	}
		
	public function siguientesAction() {	
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);			
		$this->siguientes();
	}
	
	public function recargarUltimaInformacionAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);				
		$this->recargarUltimaInformacion();
	}
	
	public function seleccionarLoteFkAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);				
		$this->seleccionarLoteFk();
	}
	
	public function nuevoAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
		$this->nuevo();
	}
	
	public function actualizarAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
		$this->actualizar();
	}
	
	public function eliminarAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
					
		$idActual=$this->getDataId();
					
		$this->eliminar($idActual);	
	}
	
	public function cancelarAction() {
		$this->setCargarParameterDivSecciones(false,false,false,true,true,false,false,true,false,false,false,false);
		$this->cancelar();
	}
	
	public function guardarCambiosAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
		$this->guardarCambios();
	}
	
	public function duplicarAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
		$this->duplicar();
	}
	
	public function copiarAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
		$this->copiar();
	}
	
	public function nuevoPrepararAction() {
		$this->setCargarParameterDivSecciones(false,false,false,true,true,false,false,true,false,false,false,false);
				
		$this->nuevoPreparar();
	}
	
	public function nuevoPrepararPaginaFormAction() {
		$this->cargarParametrosPagina();
									
		//TALVEZ ELIMINAR, TALVEZ MISMA PAGINA FORM
		$this->setCargarParameterDivSecciones(false,false,true,true,true,false,false,true,false,false,false,true);
				
		$this->nuevoPreparar();
	}
	
	public function nuevoPrepararAbrirPaginaFormAction() {
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);										
					
		//Se llama desde Load de Javascript a nuevoPrepararPaginaForm
		//$this->nuevoPreparar();
					
		if($this->Session->read('opcionActual')!=null) {
			$this->opcionActual=unserialize($this->Session->read('opcionActual'));
		}
					
		$this->bitEsAbrirVentanaAuxiliarUrl=true;
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(opcion_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliaropcion,$this->strTipoUsuarioAuxiliaropcion,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
		$this->strAuxiliarTipo='POPUP';
	}
	
	public function nuevoTablaPrepararAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
				
		$this->nuevoTablaPreparar();
	}
	
	public function seleccionarActualAction() {
		$this->setCargarParameterDivSecciones(false,false,false,true,true,false,false,true,false,false,false,false);
		$idActual=$this->getDataId();
					
		$this->seleccionarActual($idActual);
	}
	
	public function seleccionarActualPaginaFormAction() {
		$this->cargarParametrosPagina();
									
		$this->setCargarParameterDivSecciones(false,false,true,true,true,false,false,true,false,false,false,true);
					
		$idActual=$this->getDataId();
					
		$this->seleccionarActual($idActual);
	}
	
	public function seleccionarActualAbrirPaginaFormAction() {
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);										
					
		$idActual=$this->getDataId();
					
		//Se llama desde Load de Javascript a seleccionarActualPaginaForm
		//$this->seleccionarActual($idActual);
					
		if($this->Session->read('opcionActual')!=null) {
			$this->opcionActual=$this->Session->unserialize('opcionActual');
		}
		
		$this->bitEsAbrirVentanaAuxiliarUrl=true;
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(opcion_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliaropcion,$this->strTipoUsuarioAuxiliaropcion,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
		$this->strAuxiliarUrlPagina=$this->strAuxiliarUrlPagina.'&id='.$idActual;
		$this->strAuxiliarTipo='POPUP';
	}
	
	public function editarTablaDatosAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);
		$this->editarTablaDatos();
	}
	
	public function eliminarTablaAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);			
					
		$idActual=$this->getDataId();
		
		$this->eliminarTabla($idActual);
	}
	
	public function quitarElementosTablaAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);								
					
		$this->quitarElementosTabla();
	}
	
	public function generarFpdfAction() {
		$return_json=false;
		$this->generarFpdf();
	}
	
	public function generarHtmlReporteAction() {
		//$return_json=false;
					
		$htmlReporteAuxiliar='';
		
		//$htmlReporteIniAuxiliar='';
		//$htmlReporteFinAuxiliar='';				
		
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,true,false,false,false);
		
		$this->htmlTablaReporteAuxiliars='';
		
		$this->generarHtmlReporte();
		
		$htmlReporteAuxiliar=$this->htmlTablaReporteAuxiliars;
		
		//$htmlReporteIniAuxiliar=$this->getHtmlReporteIniAuxiliar();
		
		//$htmlReporteFinAuxiliar=$this->getHtmlReporteFinAuxiliar();								
		
		/*HTML FINAL*/
		//$this->htmlTablaReporteAuxiliars=$htmlReporteIniAuxiliar;
		$this->htmlTablaReporteAuxiliars=$htmlReporteAuxiliar;
		//$this->htmlTablaReporteAuxiliars.=$htmlReporteFinAuxiliar;				
		
		//echo($this->htmlTablaReporteAuxiliars);
		
		//ABRIR PAGINA Report con SessionStorage
		$this->opcionReturnGeneral=new opcion_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->opcionReturnGeneral->conGuardarReturnSessionJs=true;
		$this->opcionReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->opcionReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->opcionReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->opcionReturnGeneral);
	}
	
	public function generarHtmlFormReporteAction() {
		//$return_json=false;
					
		$htmlReporteAuxiliar='';
		//$htmlReporteIniAuxiliar='';
		//$htmlReporteFinAuxiliar='';								
		
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,true,false,false,false);
		
		$this->htmlTablaReporteAuxiliars='';
		
		$this->generarHtmlFormReporte();
				
		$htmlReporteAuxiliar=$this->htmlTablaReporteAuxiliars;
		
		//$htmlReporteIniAuxiliar=$this->getHtmlReporteIniAuxiliar();
		
		//$htmlReporteFinAuxiliar=$this->getHtmlReporteFinAuxiliar();
		
		/*HTML FINAL*/
			//$this->htmlTablaReporteAuxiliars=$htmlReporteIniAuxiliar;
		//$this->htmlTablaReporteAuxiliars=$htmlReporteAuxiliar;
			//$this->htmlTablaReporteAuxiliars.=$htmlReporteFinAuxiliar;
		
		//echo($this->htmlTablaReporteAuxiliars);
		
		//ABRIR PAGINA Report con SessionStorage
		$this->opcionReturnGeneral=new opcion_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->opcionReturnGeneral->conGuardarReturnSessionJs=true;
		$this->opcionReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->opcionReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->opcionReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->opcionReturnGeneral);
	}
	
	public function generarHtmlRelacionesReporteAction() {
		//$return_json=false;
					
		$htmlReporteAuxiliar='';
		//$htmlReporteIniAuxiliar='';
		//$htmlReporteFinAuxiliar='';								
		
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,true,false,false,false);
		
		$this->htmlTablaReporteAuxiliars='';
		
		$this->generarHtmlRelacionesReporte();
				
		$htmlReporteAuxiliar=$this->htmlTablaReporteAuxiliars;
		
		//$htmlReporteIniAuxiliar=$this->getHtmlReporteIniAuxiliar();
		
		//$htmlReporteFinAuxiliar=$this->getHtmlReporteFinAuxiliar();
		
		/*HTML FINAL*/
			//$this->htmlTablaReporteAuxiliars=$htmlReporteIniAuxiliar;
		//$this->htmlTablaReporteAuxiliars=$htmlReporteAuxiliar;
			//$this->htmlTablaReporteAuxiliars.=$htmlReporteFinAuxiliar;
		
		//echo($this->htmlTablaReporteAuxiliars);
		
		//ABRIR PAGINA Report con SessionStorage
		$this->opcionReturnGeneral=new opcion_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->opcionReturnGeneral->conGuardarReturnSessionJs=true;
		$this->opcionReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->opcionReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->opcionReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->opcionReturnGeneral);
	}
	
	public function eliminarCascadaAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
					
		$this->eliminarCascada();
	}
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}

			/*CARGA VARIABLES PARA TALVEZ RECARGAR POR PARTES*/
			$this->getDataRecargarPartes();
			/*CARGA VARIABLES PARA TALVEZ RECARGAR POR PARTES_FIN*/
			
			$bitDivsEsCargarFKsAjaxWebPart=false;
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			
			if($this->strRecargarFkTipos!='NINGUNO') {
				$bitDivsEsCargarFKsAjaxWebPart=true;
				
				/*$this->setCargarParameterDivSecciones(false,false,false,false,true,false,false,false,false,false,false,true);*/
				
				$this->cargarCombosFK(false);					
			} else {
				/*$bitDivEsCargarMantenimientosAjaxWebPart=true;				
				$this->setCargarParameterDivSecciones(false,false,false,false,true,false,false,false,false,false,false,false);*/
			}
											
			$sTipoControl='';
			$sTipoEvento='';
			
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
			
			
			$this->opcionReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->opcionReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->opcionReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->opcionReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->opcionReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->opcionReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function abrirArbolAction() {
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
		$this->abrirArbol();
	}
	
	public function cargarArbolAction() {
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
		$this->cargarArbol();
	}
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->opcionReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->opcionReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->opcionReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->opcionReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->opcionReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->opcionReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->opcionReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->opcionReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->opcionReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->opcionReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->opcionReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->opcionReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
	
			$this->manejarRetornarExcepcion($e);
		}	
	}
	
	
	
	public function mostrarEjecutarAccionesRelacionesAction() {
		$this->setCargarParameterDivSecciones(false,false,false,false,true,false,false,false,false,false,true,false);			
		$idActual=$this->getDataId();
					
		$this->mostrarEjecutarAccionesRelaciones($idActual);						
	}	
	
	public function generarReporteConPhpExcelAction() {
		$tipo_reporte=$this->getDataTipoReporte();				
		$this->generarReporteConPhpExcel($tipo_reporte);				
		return false;			
	}
	
	public function generarReporteConPhpExcelVerticalAction() {
		$tipo_reporte=$this->getDataTipoReporte();				
		$this->generarReporteConPhpExcelVertical($tipo_reporte);				
		return false;						
	}
	
	public function generarReporteConPhpExcelRelacionesAction() {
		$tipo_reporte=$this->getDataTipoReporte();				
		$this->generarReporteConPhpExcelRelaciones($tipo_reporte);				
		return false;
	}

	function __construct () {
		
		parent::__construct();
		
		$this->opcionLogic=new opcion_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->opcion=new opcion();
		
		$this->strTypeOnLoadopcion='onload';
		$this->strTipoPaginaAuxiliaropcion='none';
		$this->strTipoUsuarioAuxiliaropcion='none';	

		$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;
		
		$this->opcionModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->opcionControllerAdditional=new opcion_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(opcion_session $opcion_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($opcion_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadopcion='',?string $strTipoPaginaAuxiliaropcion='',?string $strTipoUsuarioAuxiliaropcion='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadopcion=$strTypeOnLoadopcion;
			$this->strTipoPaginaAuxiliaropcion=$strTipoPaginaAuxiliaropcion;
			$this->strTipoUsuarioAuxiliaropcion=$strTipoUsuarioAuxiliaropcion;
	
			if($strTipoUsuarioAuxiliaropcion=='webroot' || $strFuncionBusquedaRapida=='webroot') {
				return ;
			}
			
			/*$this->activarSession();*/
									
	
	
			/*ACTUALIZAR VALORES*/
			$this->bitEsPopup=$bitEsPopup;
			$this->bitConBusquedaRapida=$bitConBusquedaRapida;
			
			$this->indexBase($bitEsPopup,$bitConBusquedaRapida);			
			
			
			$this->strTipoView=$strTipoView;			
			$this->strValorBusquedaRapida=$strValorBusquedaRapida;
			$this->strFuncionBusquedaRapida=$strFuncionBusquedaRapida;
			
			$this->opcion=new opcion();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Opciones';
			
			
			$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));
							
			if($opcion_session==null) {
				$opcion_session=new opcion_session();
				
				/*$this->Session->write('opcion_session',$opcion_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($opcion_session->strFuncionJsPadre!=null && $opcion_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$opcion_session->strFuncionJsPadre;
				
				$opcion_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($opcion_session);
			
			if($strTypeOnLoadopcion!=null && $strTypeOnLoadopcion=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$opcion_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$opcion_session->setPaginaPopupVariables(true);
				}
				
				if($opcion_session->intNumeroPaginacion==opcion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$opcion_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,opcion_util::$STR_SESSION_NAME,'seguridad');																
			
			} else if($strTypeOnLoadopcion!=null && $strTypeOnLoadopcion=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$opcion_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;*/
				
				if($opcion_session->intNumeroPaginacion==opcion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$opcion_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliaropcion!=null && $strTipoPaginaAuxiliaropcion=='none') {
				/*$opcion_session->strStyleDivHeader='display:table-row';*/
				
				/*$opcion_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliaropcion!=null && $strTipoPaginaAuxiliaropcion=='iframe') {
					/*
					$opcion_session->strStyleDivArbol='display:none';
					$opcion_session->strStyleDivHeader='display:none';
					$opcion_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$opcion_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->opcionClase=new opcion();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=opcion_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(opcion_util::getTiposSeleccionar(true) as $reporte) {
				$this->tiposColumnasSelect[]=$reporte;
			}			
			
			/*RELACIONES*/
			$this->tiposRelaciones[]=Reporte::NewReporte(Constantes::$STR_RELACIONES,Constantes::$STR_RELACIONES);
			
			foreach($this->getTiposRelacionesReporte() as $reporte) {
				$this->tiposRelaciones[]=$reporte;
			}
			
			/*FORMULARIO*/
			$this->tiposRelacionesFormulario[]=Reporte::NewReporte(Constantes::$STR_RELACIONES,Constantes::$STR_RELACIONES);
			
			foreach($this->getTiposRelacionesReporte() as $reporte) {
				$this->tiposRelacionesFormulario[]=$reporte;
			}
			/*RELACIONES*/
						
			$this->sistemaLogicAdditional=new sistema_logic_add();
			$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
			
			$this->sistemaLogicAdditional->setConnexion($this->opcionLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->opcionLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$opcionLogic=new opcion_logic();
			//$accionLogic=new accion_logic();
			//$perfilopcionLogic=new perfil_opcion_logic();
			//$campoLogic=new campo_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->opcionLogic=new opcion_logic();*/
			
			
			$this->opcionsModel=null;
			/*new ListDataModel();*/
			
			/*$this->opcionsModel.setWrappedData(opcionLogic->getopcions());*/
						
			$this->opcions= array();
			$this->opcionsEliminados=array();
			$this->opcionsSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= opcion_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= opcion_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->opcion= new opcion();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleBusquedaPorIdSistemaPorIdOpcion='display:table-row';
			$this->strVisibleBusquedaPorIdSistemaPorNombre='display:table-row';
			$this->strVisibleFK_Idgrupo_opcion='display:table-row';
			$this->strVisibleFK_Idmodulo='display:table-row';
			$this->strVisibleFK_Idopcion='display:table-row';
			$this->strVisibleFK_Idsistema='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliaropcion!=null && $strTipoUsuarioAuxiliaropcion!='none' && $strTipoUsuarioAuxiliaropcion!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliaropcion);
																
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$usuarioLogic->getEntity($idUsuarioAutomatico);/*WithConnection*/
						
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
											
					}					
												
					$this->usuarioActual=$usuarioLogic->getUsuario();								
														
					if($this->usuarioActual!=null && $this->usuarioActual->getId()>0) {
						$this->Session->write('usuarioActual',serialize($this->usuarioActual));
					}
				}
			} else {
				if($strTipoUsuarioAuxiliaropcion!=null && $strTipoUsuarioAuxiliaropcion!='none' && $strTipoUsuarioAuxiliaropcion!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliaropcion);
																
					if($idUsuarioAutomatico>0) {
						$this->usuarioActual=new usuario();
						
						$this->usuarioActual->setId($idUsuarioAutomatico);
						
						$this->Session->write('usuarioActual',serialize($this->usuarioActual));
					}																	
				}
			}
			
			/*SI NO EXISTE SEGURIDAD*/
			//if($this->Session->read('usuarioActual')==null) {
			//	$this->usuarioActual=new usuario();
			//	$this->Session->write('usuarioActual',serialize($this->usuarioActual));
			//}
			
			if($this->Session->read('usuarioActual')!=null) {
				$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));
				
				if($this->usuarioActual!=null) {
					$this->bigIdUsuarioSesion=$this->usuarioActual->getId();	
				}
			
			} else {	
				if($strTipoUsuarioAuxiliaropcion==null || $strTipoUsuarioAuxiliaropcion=='none' || $strTipoUsuarioAuxiliaropcion=='undefined') {
					throw new Exception("Reinicie la sesion");
				}				
			}
			
			/*VALIDAR CARGAR SESION USUARIO*/			
			$this->sistemaReturnGeneral=new sistema_param_return();
			$this->arrNombresClasesRelacionadas=array();
			$bigIdOpcion=$this->bigIdOpcion;
			
			$this->arrNombresClasesRelacionadas=$this->getClasesRelacionadas();
			
			if(!Constantes::$CON_LLAMADA_SIMPLE) {
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					
					/*SI ES RELACIONADO, FORZAR PERMISOS*/
					if($this->bitEsRelacionado) {
						$bigIdOpcion=0;
					}
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliaropcion,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, opcion_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
					$this->opcionActual=$this->sistemaReturnGeneral->getOpcionActual();
					
					//SI ES RELACIONADO, SE MANTENGA PANTALLA PRINCIPAL RELACIONES COMO opcionActual
					if(!$this->bitEsRelacionado) {						
						$this->Session->write('opcionActual',serialize($this->opcionActual));
					}
					/*$this->sistemaReturnGeneral->settiene_permisos_paginaweb(true);*/
					
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
			}
			/*VALIDAR CARGAR SESION USUARIO*/
			
			
			/*ACTUALIZAR SESION USUARIO*/
			if($this->sistemaReturnGeneral->getUsuarioActual()->getId()!=$this->usuarioActual->getId()) {
				$this->Session->write('usuarioActual',serialize($this->sistemaReturnGeneral->getUsuarioActual()));
			}
			/*ACTUALIZAR SESION USUARIO*/
			
			
			
			/*VALIDACION_LICENCIA*/		
			$sUsuarioPCCliente=array_key_exists(Constantes::$REMOTE_USER,$_SERVER)? $_SERVER[Constantes::$REMOTE_USER]:''; 
			$sNamePCCliente=array_key_exists(Constantes::$REMOTE_USER,$_SERVER)? $_SERVER[Constantes::$REMOTE_HOST]:''; 
			$sIPPCCliente=array_key_exists(Constantes::$REMOTE_USER,$_SERVER)? $_SERVER[Constantes::$REMOTE_ADDR]:'';
			$sMacAddressPCCliente=array_key_exists(Constantes::$REMOTE_USER,$_SERVER)? $_SERVER[Constantes::$REMOTE_ADDR]:''; 
			$dFechaServer=date('Y-m-d');
			$idUsuario=$this->usuarioActual->getId();
			$sNombreModuloActual='';
			
			if($this->moduloActual!=null) {
				$sNombreModuloActual=$this->moduloActual->getnombre();
				/*'INVENTARIO';*/
			}
						
			$sNombreUsuarioActual=$this->usuarioActual->getuser_name();
			/*'ADMIN';*/
			
			/*if($sUsuarioPCCliente=='') {
				$sUsuarioPCCliente=$sNombreUsuarioActual;
			}*/
			
			if(!GlobalSeguridad::validarLicenciaCliente($sUsuarioPCCliente, $sNamePCCliente, $sIPPCCliente, $sMacAddressPCCliente, $dFechaServer, $idUsuario, $sNombreModuloActual, $sNombreUsuarioActual)) {
				throw new Exception(Mensajes::$SERROR_LICENCIA);
			}
			/*VALIDACION_LICENCIA_FIN*/
			
			
			/*VALIDACION_RESUMEN_USUARIO*/
			$validar_resumen_usuario=true;
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$validar_resumen_usuario=$this->resumenUsuarioLogicAdditional->validarResumenUsuarioController($this->usuarioActual,$this->resumenUsuarioActual);	/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
			} else {
				$validar_resumen_usuario=$this->sistemaReturnGeneral->getvalidar_resumen_usuario();
			}
			
			if($validar_resumen_usuario==false) {
				throw new Exception('Usuario ingresado mas de una vez, debe reingresar al sistema');
			}
			/*VALIDACION_RESUMEN_USUARIO_FIN*/
			
						
			
			/*VALIDACION_PAGINA*/
			$tiene_permisos_paginaweb=true;
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, opcion_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina opcion');
			}
			/*VALIDACION_PAGINA_FIN*/
									
			
			
			$this->inicializarPermisos();
						
			$this->setPermisosUsuario();
			
			$this->inicializarSetPermisosUsuarioClasesRelacionadas();
			
			/*ACCIONES*/
			$this->setAccionesUsuario();
			
			if($this->bitEsPopup || $this->bitEsSubPagina) {
				$this->strPermisoPopup='table-row';
			}
			
			
			$this->inicializarFKsDefault();
			
			
			
			$this->cargarCombosFK(false);
			
			
			//$existe_history=false;
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($opcion_session);
			
			$this->getSetBusquedasSesionConfig($opcion_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteopcions($this->strAccionBusqueda,$this->opcionLogic->getopcions());*/
				} else if($this->strGenerarReporte=='Html')	{
					$opcion_session->strServletGenerarHtmlReporte='opcionServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(opcion_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(opcion_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($opcion_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliaropcion!=null && $strTipoUsuarioAuxiliaropcion=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($opcion_session);
			}
								
			$this->set(opcion_util::$STR_SESSION_NAME, $opcion_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($opcion_session);
			
			/*
			$this->opcion->recursive = 0;
			
			$this->opcions=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('opcions', $this->opcions);
			
			$this->set(opcion_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->opcionActual =$this->opcionClase;
			
			/*$this->opcionActual =$this->migrarModelopcion($this->opcionClase);*/
			
			$this->returnHtml(false);
			
			$this->set(opcion_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=opcion_util::$STR_NOMBRE_OPCION;
				
			if(opcion_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=opcion_util::$STR_MODULO_OPCION.opcion_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(opcion_util::$STR_SESSION_NAME,serialize($opcion_session));
			/*GUARDAR SESSION*/
			
			/*$this->strAuxiliarMensajeAlert=Funciones::mostrarMemoriaActual();*/
			
			$this->render('/'.Constantes::$STR_CARPETA_VIEWS.'/'.$strNombreViewIndex.'/'.$this->strTipoView);
		}
		catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function seleccionar() {
		try {
			/*$opcionClase= (opcion) opcionsModel.getRowData();*/
			
			$this->opcionClase->setId($this->opcion->getId());	
			$this->opcionClase->setVersionRow($this->opcion->getVersionRow());	
			$this->opcionClase->setVersionRow($this->opcion->getVersionRow());	
			$this->opcionClase->setid_sistema($this->opcion->getid_sistema());	
			$this->opcionClase->setid_opcion($this->opcion->getid_opcion());	
			$this->opcionClase->setid_grupo_opcion($this->opcion->getid_grupo_opcion());	
			$this->opcionClase->setid_modulo($this->opcion->getid_modulo());	
			$this->opcionClase->setcodigo($this->opcion->getcodigo());	
			$this->opcionClase->setnombre($this->opcion->getnombre());	
			$this->opcionClase->setposicion($this->opcion->getposicion());	
			$this->opcionClase->seticon_name($this->opcion->geticon_name());	
			$this->opcionClase->setnombre_clase($this->opcion->getnombre_clase());	
			$this->opcionClase->setmodulo0($this->opcion->getmodulo0());	
			$this->opcionClase->setsub_modulo($this->opcion->getsub_modulo());	
			$this->opcionClase->setpaquete($this->opcion->getpaquete());	
			$this->opcionClase->setes_para_menu($this->opcion->getes_para_menu());	
			$this->opcionClase->setes_guardar_relaciones($this->opcion->getes_guardar_relaciones());	
			$this->opcionClase->setcon_mostrar_acciones_campo($this->opcion->getcon_mostrar_acciones_campo());	
			$this->opcionClase->setestado($this->opcion->getestado());	
		
			/*$this->Session->write('opcionVersionRowActual', opcion.getVersionRow());*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function seleccionarActual(int $id = null) {
		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			$this->idActual=$id;
			
			$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));
						
			if($opcion_session==null) {
				$opcion_session=new opcion_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('opcion', $this->opcion->read(null, $id));
	
			
			$this->opcion->recursive = 0;
			
			$this->opcions=$this->paginate();
			
			$this->set('opcions', $this->opcions);
	
			if (empty($this->data)) {
				$this->data = $this->opcion->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->opcionLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->opcionClase);
			
			$this->opcionActual=$this->opcionClase;
			
			/*$this->opcionActual =$this->migrarModelopcion($this->opcionClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->opcionLogic->getopcions(),$this->opcionActual);
			
			$this->actualizarControllerConReturnGeneral($this->opcionReturnGeneral);
			
			//$this->opcionReturnGeneral=$this->opcionLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->opcionLogic->getopcions(),$this->opcionActual,$this->opcionParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));
						
			if($opcion_session==null) {
				$opcion_session=new opcion_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoopcion', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->opcionClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->opcionClase);
			
			$this->opcionActual =$this->opcionClase;
			
			/*$this->opcionActual =$this->migrarModelopcion($this->opcionClase);*/
			
			$this->setopcionFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->opcionLogic->getopcions(),$this->opcion);
			
			$this->actualizarControllerConReturnGeneral($this->opcionReturnGeneral);
			
			//this->opcionReturnGeneral=$this->opcionLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->opcionLogic->getopcions(),$this->opcion,$this->opcionParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idsistemaDefaultFK!=null && $this->idsistemaDefaultFK > -1) {
				$this->opcionReturnGeneral->getopcion()->setid_sistema($this->idsistemaDefaultFK);
			}

			if($this->idopcionDefaultFK!=null && $this->idopcionDefaultFK > -1) {
				$this->opcionReturnGeneral->getopcion()->setid_opcion($this->idopcionDefaultFK);
			}

			if($this->idgrupo_opcionDefaultFK!=null && $this->idgrupo_opcionDefaultFK > -1) {
				$this->opcionReturnGeneral->getopcion()->setid_grupo_opcion($this->idgrupo_opcionDefaultFK);
			}

			if($this->idmoduloDefaultFK!=null && $this->idmoduloDefaultFK > -1) {
				$this->opcionReturnGeneral->getopcion()->setid_modulo($this->idmoduloDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->opcionReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->opcionReturnGeneral->getopcion(),$this->opcionActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyopcion($this->opcionReturnGeneral->getopcion());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioopcion($this->opcionReturnGeneral->getopcion());*/
			}
			
			if($this->opcionReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->opcionReturnGeneral->getopcion(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualopcion($this->opcion,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->opcionsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->opcionsAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->opcionsAuxiliar=array();
			}
			
			if(count($this->opcionsAuxiliar)==2) {
				$opcionOrigen=$this->opcionsAuxiliar[0];
				$opcionDestino=$this->opcionsAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($opcionOrigen,$opcionDestino,true,false,false);
				
				$this->actualizarLista($opcionDestino,$this->opcions);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->opcionsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->opcionsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->opcionsAuxiliar=array();
			}
			
			if(count($this->opcionsAuxiliar) > 0) {
				foreach ($this->opcionsAuxiliar as $opcionSeleccionado) {
					$this->opcion=new opcion();
					
					$this->setCopiarVariablesObjetos($opcionSeleccionado,$this->opcion,true,true,false);
						
					$this->opcions[]=$this->opcion;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->opcionsEliminados as $opcionEliminado) {
				$this->opcionLogic->opcions[]=$opcionEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->opcion=new opcion();
							
				$this->opcions[]=$this->opcion;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function editarTablaDatos() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);						
			
			if($this->bitConEditar) {
				$this->bitConAltoMaximoTabla=true;
			}
			
			$this->getHtmlTablaDatos(false);
															
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	function guardarCambiosTablas() {
		$indice=0;
		$maxima_fila=0;
		
		if($this->existDataTabla('t'.$this->strSufijo)) {
			$maxima_fila=$this->getDataMaximaFila();
		}
		
		$opcionActual=new opcion();
		
		if($maxima_fila!=null && $maxima_fila>0) {
			for($i=1;$i<=$maxima_fila;$i++) {
				/*CUANDO NO EXISTE DATOS TABLA*/
				if($this->existDataCampoFormTabla('cel_'.$i.'_0','t'.$this->strSufijo)) {
					if($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_0')==null) {
						break;	
					}
				} else {
					break;
				}
				
				$indice=$i-1;								
				
				$opcionActual=$this->opcions[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $opcionActual->setid_sistema((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $opcionActual->setid_opcion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $opcionActual->setid_grupo_opcion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $opcionActual->setid_modulo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $opcionActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $opcionActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $opcionActual->setposicion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $opcionActual->seticon_name($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $opcionActual->setnombre_clase($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $opcionActual->setmodulo0($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $opcionActual->setsub_modulo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $opcionActual->setpaquete($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $opcionActual->setes_para_menu(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_15')));  } else { $opcionActual->setes_para_menu(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $opcionActual->setes_guardar_relaciones(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_16')));  } else { $opcionActual->setes_guardar_relaciones(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $opcionActual->setcon_mostrar_acciones_campo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_17')));  } else { $opcionActual->setcon_mostrar_acciones_campo(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $opcionActual->setestado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_18')));  } else { $opcionActual->setestado(false); }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->opcionsAuxiliar=array();		 
		/*$this->opcionsEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->opcionsAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->opcionsAuxiliar=array();
		}
			
		if(count($this->opcionsAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->opcionsAuxiliar as $opcionAuxLocal) {				
				
				foreach($this->opcions as $opcionLocal) {
					if($opcionLocal->getId()==$opcionAuxLocal->getId()) {
						$opcionLocal->setIsDeleted(true);
						
						/*$this->opcionsEliminados[]=$opcionLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->opcionLogic->setopcions($this->opcions);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}	
	
	
	
	
	public function cancelarAccionesRelaciones() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			$this->strVisibleTablaAccionesRelaciones='none';	
			
			$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_INFO;
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function recargarInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadopcion='',string $strTipoPaginaAuxiliaropcion='',string $strTipoUsuarioAuxiliaropcion='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadopcion,$strTipoPaginaAuxiliaropcion,$strTipoUsuarioAuxiliaropcion,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->opcions) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=opcion_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=opcion_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=opcion_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
		$finalQueryGlobal=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,!$esBusqueda,$esBusqueda,$arrColumnasGlobales);
		
		
		/*QUERY GLOBAL GLOBAL + SELECCIONAR_LOTE + ORDER_QUERY
		SELECCIONAR_LOTE*/
		if($this->strFinalQuerySeleccionarLote!='') {			
			$finalQueryPaginacion=$finalQueryPaginacion.$this->strFinalQuerySeleccionarLote;
		}
		
		/*GLOBAL*/
		if($finalQueryGlobal!='') {
			$finalQueryPaginacion=$finalQueryGlobal.$finalQueryPaginacion;
		}
				
		/*ORDER_QUERY*/
		if($this->orderByQuery!='') {
			$finalQueryPaginacion=$finalQueryPaginacion.$this->orderByQuery;
		}	
		
		/*QUERY GLOBAL GLOBAL + SELECCIONAR_LOTE + ORDER_QUERY*/
		
		try {				
			
			$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));
						
			if($opcion_session==null) {
				$opcion_session=new opcion_session();
			}
			
			/*$this->cargarParametrosReporte();
			
			$this->cargarParamsPostAccion();*/
			
			$this->inicializarVariables('NORMAL');
			
			if($this->strTipoPaginacion!='TODOS' && $this->strTipoPaginacion!='') { //Combo Paginacion 5-10-15
				$this->intNumeroPaginacion=(int)$this->strTipoPaginacion;				
			} else {
				if($this->strTipoPaginacion=='TODOS') {
					$this->pagination->setBlnConNumeroMaximo(true);
				} else {
					/*$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;*/
					
					if($opcion_session->intNumeroPaginacion==opcion_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$opcion_session->intNumeroPaginacion;
					}
				}
			}
			
			$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
			$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
			/*$this->pagination->setBlnConNumeroMaximo(true);*/
						
			/*
			//DESHABILITADO AQUI, LA PAGINACION EN DATAACCESS
			if($this->intNumeroPaginacion!=null && $this->intNumeroPaginacionPagina!=null){ 						
				$finalQueryPaginacion=' LIMIT '.$this->intNumeroPaginacion.','.$this->intNumeroPaginacionPagina;
			}
			*/
			
			$this->opcionsEliminados=array();
			
			/*$this->opcionLogic->setConnexion($connexion);*/
			
			$this->opcionLogic->setIsConDeep(true);
			
			$this->opcionLogic->getopcionDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('sistema');$classes[]=$class;
			$class=new Classe('opcion');$classes[]=$class;
			$class=new Classe('grupo_opcion');$classes[]=$class;
			$class=new Classe('modulo');$classes[]=$class;
			
			$this->opcionLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->opcionLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->opcionLogic->getopcions()==null|| count($this->opcionLogic->getopcions())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->opcions=$this->opcionLogic->getopcions();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->opcionLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->opcionsReporte=$this->opcionLogic->getopcions();
									
						/*$this->generarReportes('Todos',$this->opcionLogic->getopcions());*/
					
						$this->opcionLogic->setopcions($this->opcions);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->opcionLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->opcionLogic->getopcions()==null|| count($this->opcionLogic->getopcions())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->opcions=$this->opcionLogic->getopcions();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->opcionLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->opcionsReporte=$this->opcionLogic->getopcions();
									
						/*$this->generarReportes('Todos',$this->opcionLogic->getopcions());*/
					
						$this->opcionLogic->setopcions($this->opcions);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idopcion=0;*/
				
				if($opcion_session->bitBusquedaDesdeFKSesionFK!=null && $opcion_session->bitBusquedaDesdeFKSesionFK==true) {
					if($opcion_session->bigIdActualFK!=null && $opcion_session->bigIdActualFK!=0)	{
						$this->idopcion=$opcion_session->bigIdActualFK;	
					}
					
					$opcion_session->bitBusquedaDesdeFKSesionFK=false;
					
					$opcion_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idopcion=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idopcion=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->opcionLogic->getEntity($this->idopcion);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*opcionLogicAdditional::getDetalleIndicePorId($idopcion);*/

				
				if($this->opcionLogic->getopcion()!=null) {
					$this->opcionLogic->setopcions(array());
					$this->opcionLogic->opcions[]=$this->opcionLogic->getopcion();
				}
			
			}
		
			else if($strAccionBusqueda=='BusquedaPorIdSistemaPorIdOpcion')
			{

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->opcionLogic->getsBusquedaPorIdSistemaPorIdOpcion($finalQueryPaginacion,$this->pagination,$this->id_sistemaBusquedaPorIdSistemaPorIdOpcion,$this->id_opcionBusquedaPorIdSistemaPorIdOpcion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//opcionLogicAdditional::getDetalleIndiceBusquedaPorIdSistemaPorIdOpcion($this->id_sistemaBusquedaPorIdSistemaPorIdOpcion,$this->id_opcionBusquedaPorIdSistemaPorIdOpcion);


					if($this->opcionLogic->getopcions()==null || count($this->opcionLogic->getopcions())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$opcions=$this->opcionLogic->getopcions();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->opcionLogic->getsBusquedaPorIdSistemaPorIdOpcion('',$this->pagination,$this->id_sistemaBusquedaPorIdSistemaPorIdOpcion,$this->id_opcionBusquedaPorIdSistemaPorIdOpcion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->opcionsReporte=$this->opcionLogic->getopcions();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteopcions("BusquedaPorIdSistemaPorIdOpcion",$this->opcionLogic->getopcions());

					if($this->strTipoPaginacion=='TODOS') {
						$this->opcionLogic->setopcions($opcions);
					}
				//}

			}
			else if($strAccionBusqueda=='BusquedaPorIdSistemaPorNombre')
			{

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->opcionLogic->getsBusquedaPorIdSistemaPorNombre($finalQueryPaginacion,$this->pagination,$this->id_sistemaBusquedaPorIdSistemaPorNombre,$this->nombreBusquedaPorIdSistemaPorNombre);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//opcionLogicAdditional::getDetalleIndiceBusquedaPorIdSistemaPorNombre($this->id_sistemaBusquedaPorIdSistemaPorNombre,$this->nombreBusquedaPorIdSistemaPorNombre);


					if($this->opcionLogic->getopcions()==null || count($this->opcionLogic->getopcions())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$opcions=$this->opcionLogic->getopcions();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->opcionLogic->getsBusquedaPorIdSistemaPorNombre('',$this->pagination,$this->id_sistemaBusquedaPorIdSistemaPorNombre,$this->nombreBusquedaPorIdSistemaPorNombre);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->opcionsReporte=$this->opcionLogic->getopcions();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteopcions("BusquedaPorIdSistemaPorNombre",$this->opcionLogic->getopcions());

					if($this->strTipoPaginacion=='TODOS') {
						$this->opcionLogic->setopcions($opcions);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idgrupo_opcion')
			{

				if($opcion_session->bigidgrupo_opcionActual!=null && $opcion_session->bigidgrupo_opcionActual!=0)
				{
					$this->id_grupo_opcionFK_Idgrupo_opcion=$opcion_session->bigidgrupo_opcionActual;
					$opcion_session->bigidgrupo_opcionActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->opcionLogic->getsFK_Idgrupo_opcion($finalQueryPaginacion,$this->pagination,$this->id_grupo_opcionFK_Idgrupo_opcion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//opcionLogicAdditional::getDetalleIndiceFK_Idgrupo_opcion($this->id_grupo_opcionFK_Idgrupo_opcion);


					if($this->opcionLogic->getopcions()==null || count($this->opcionLogic->getopcions())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$opcions=$this->opcionLogic->getopcions();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->opcionLogic->getsFK_Idgrupo_opcion('',$this->pagination,$this->id_grupo_opcionFK_Idgrupo_opcion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->opcionsReporte=$this->opcionLogic->getopcions();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteopcions("FK_Idgrupo_opcion",$this->opcionLogic->getopcions());

					if($this->strTipoPaginacion=='TODOS') {
						$this->opcionLogic->setopcions($opcions);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idmodulo')
			{

				if($opcion_session->bigidmoduloActual!=null && $opcion_session->bigidmoduloActual!=0)
				{
					$this->id_moduloFK_Idmodulo=$opcion_session->bigidmoduloActual;
					$opcion_session->bigidmoduloActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->opcionLogic->getsFK_Idmodulo($finalQueryPaginacion,$this->pagination,$this->id_moduloFK_Idmodulo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//opcionLogicAdditional::getDetalleIndiceFK_Idmodulo($this->id_moduloFK_Idmodulo);


					if($this->opcionLogic->getopcions()==null || count($this->opcionLogic->getopcions())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$opcions=$this->opcionLogic->getopcions();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->opcionLogic->getsFK_Idmodulo('',$this->pagination,$this->id_moduloFK_Idmodulo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->opcionsReporte=$this->opcionLogic->getopcions();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteopcions("FK_Idmodulo",$this->opcionLogic->getopcions());

					if($this->strTipoPaginacion=='TODOS') {
						$this->opcionLogic->setopcions($opcions);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idopcion')
			{

				if($opcion_session->bigidopcionActual!=null && $opcion_session->bigidopcionActual!=0)
				{
					$this->id_opcionFK_Idopcion=$opcion_session->bigidopcionActual;
					$opcion_session->bigidopcionActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->opcionLogic->getsFK_Idopcion($finalQueryPaginacion,$this->pagination,$this->id_opcionFK_Idopcion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//opcionLogicAdditional::getDetalleIndiceFK_Idopcion($this->id_opcionFK_Idopcion);


					if($this->opcionLogic->getopcions()==null || count($this->opcionLogic->getopcions())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$opcions=$this->opcionLogic->getopcions();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->opcionLogic->getsFK_Idopcion('',$this->pagination,$this->id_opcionFK_Idopcion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->opcionsReporte=$this->opcionLogic->getopcions();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteopcions("FK_Idopcion",$this->opcionLogic->getopcions());

					if($this->strTipoPaginacion=='TODOS') {
						$this->opcionLogic->setopcions($opcions);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idsistema')
			{

				if($opcion_session->bigidsistemaActual!=null && $opcion_session->bigidsistemaActual!=0)
				{
					$this->id_sistemaFK_Idsistema=$opcion_session->bigidsistemaActual;
					$opcion_session->bigidsistemaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->opcionLogic->getsFK_Idsistema($finalQueryPaginacion,$this->pagination,$this->id_sistemaFK_Idsistema);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//opcionLogicAdditional::getDetalleIndiceFK_Idsistema($this->id_sistemaFK_Idsistema);


					if($this->opcionLogic->getopcions()==null || count($this->opcionLogic->getopcions())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$opcions=$this->opcionLogic->getopcions();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->opcionLogic->getsFK_Idsistema('',$this->pagination,$this->id_sistemaFK_Idsistema);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->opcionsReporte=$this->opcionLogic->getopcions();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteopcions("FK_Idsistema",$this->opcionLogic->getopcions());

					if($this->strTipoPaginacion=='TODOS') {
						$this->opcionLogic->setopcions($opcions);
					}
				//}

			}
			else if($strAccionBusqueda=='PorIdSistemaPorIdOpcionPorNombre')
			{

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->opcionLogic->getPorIdSistemaPorIdOpcionPorNombre($this->id_sistemaPorIdSistemaPorIdOpcionPorNombre,$this->id_opcionPorIdSistemaPorIdOpcionPorNombre,$this->nombrePorIdSistemaPorIdOpcionPorNombre);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//opcionLogicAdditional::getDetalleIndicePorIdSistemaPorIdOpcionPorNombre($this->id_sistemaPorIdSistemaPorIdOpcionPorNombre,$this->id_opcionPorIdSistemaPorIdOpcionPorNombre,$this->nombrePorIdSistemaPorIdOpcionPorNombre);


					if($this->opcionLogic->getopcion()!=null && $this->opcionLogic->getopcion()->getId()!=0) {
					} else {
					}

			} 
		
		$opcion_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$opcion_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->opcionLogic->loadForeignsKeysDescription();*/
		
		$this->opcions=$this->opcionLogic->getopcions();
		
		if($this->opcionsEliminados==null) {
			$this->opcionsEliminados=array();
		}
		
		$this->Session->write(opcion_util::$STR_SESSION_NAME.'Lista',serialize($this->opcions));
		$this->Session->write(opcion_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->opcionsEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(opcion_util::$STR_SESSION_NAME,serialize($opcion_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idopcion=$idGeneral;
			
			$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}
			
			
			if($this->intNumeroPaginacionPagina - $this->intNumeroPaginacion < $this->intNumeroPaginacion) {
				$this->intNumeroPaginacionPagina=0;		
			} else {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina - $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}

			if(count($this->opcions) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsBusquedaPorIdSistemaPorIdOpcionParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_sistemaBusquedaPorIdSistemaPorIdOpcion=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPorIdSistemaPorIdOpcion','cmbid_sistema');
			$this->id_opcionBusquedaPorIdSistemaPorIdOpcion=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPorIdSistemaPorIdOpcion','cmbid_opcion');

			$this->strAccionBusqueda='BusquedaPorIdSistemaPorIdOpcion';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsBusquedaPorIdSistemaPorNombreParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_sistemaBusquedaPorIdSistemaPorNombre=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPorIdSistemaPorNombre','cmbid_sistema');
			$this->nombreBusquedaPorIdSistemaPorNombre=(string)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPorIdSistemaPorNombre','txtnombre');

			$this->strAccionBusqueda='BusquedaPorIdSistemaPorNombre';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idgrupo_opcionParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_grupo_opcionFK_Idgrupo_opcion=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idgrupo_opcion','cmbid_grupo_opcion');

			$this->strAccionBusqueda='FK_Idgrupo_opcion';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdmoduloParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_moduloFK_Idmodulo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idmodulo','cmbid_modulo');

			$this->strAccionBusqueda='FK_Idmodulo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdopcionParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_opcionFK_Idopcion=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idopcion','cmbid_opcion');

			$this->strAccionBusqueda='FK_Idopcion';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdsistemaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_sistemaFK_Idsistema=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idsistema','cmbid_sistema');

			$this->strAccionBusqueda='FK_Idsistema';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getPorIdSistemaPorIdOpcionPorNombreParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_sistemaPorIdSistemaPorIdOpcionPorNombre=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'PorIdSistemaPorIdOpcionPorNombre','cmbid_sistema');
			$this->id_opcionPorIdSistemaPorIdOpcionPorNombre=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'PorIdSistemaPorIdOpcionPorNombre','cmbid_opcion');
			$this->nombrePorIdSistemaPorIdOpcionPorNombre=(string)$this->getDataCampoFormTabla(''.$this->strSufijo.'PorIdSistemaPorIdOpcionPorNombre','txtnombre');

			$this->strAccionBusqueda='PorIdSistemaPorIdOpcionPorNombre';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsBusquedaPorIdSistemaPorIdOpcion($strFinalQuery,$id_sistema,$id_opcion)
	{
		try
		{

			$this->opcionLogic->getsBusquedaPorIdSistemaPorIdOpcion($strFinalQuery,new Pagination(),$id_sistema,$id_opcion);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsBusquedaPorIdSistemaPorNombre($strFinalQuery,$id_sistema,$nombre)
	{
		try
		{

			$this->opcionLogic->getsBusquedaPorIdSistemaPorNombre($strFinalQuery,new Pagination(),$id_sistema,$nombre);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idgrupo_opcion($strFinalQuery,$id_grupo_opcion)
	{
		try
		{

			$this->opcionLogic->getsFK_Idgrupo_opcion($strFinalQuery,new Pagination(),$id_grupo_opcion);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idmodulo($strFinalQuery,$id_modulo)
	{
		try
		{

			$this->opcionLogic->getsFK_Idmodulo($strFinalQuery,new Pagination(),$id_modulo);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idopcion($strFinalQuery,$id_opcion)
	{
		try
		{

			$this->opcionLogic->getsFK_Idopcion($strFinalQuery,new Pagination(),$id_opcion);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idsistema($strFinalQuery,$id_sistema)
	{
		try
		{

			$this->opcionLogic->getsFK_Idsistema($strFinalQuery,new Pagination(),$id_sistema);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getPorIdSistemaPorIdOpcionPorNombre($id_sistema,$id_opcion,$nombre)
	{
		try
		{

			$this->opcionLogic->getopcionPorIdSistemaPorIdOpcionPorNombre($id_sistema,$id_opcion,$nombre);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	
		
	
	function cargarCombosFK(bool $cargarControllerDesdeSession=true) {		
		
		try {
			
			if($cargarControllerDesdeSession) {
				/*SOLO SI ES NECESARIO*/
				$this->saveGetSessionControllerAndPageAuxiliar(false);
			}
			
			
			$opcionForeignKey=new opcion_param_return(); //opcionForeignKey();
			
			$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));
						
			if($opcion_session==null) {
				$opcion_session=new opcion_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$opcionForeignKey=$this->opcionLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$opcion_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sistema',$this->strRecargarFkTipos,',')) {
				$this->sistemasFK=$opcionForeignKey->sistemasFK;
				$this->idsistemaDefaultFK=$opcionForeignKey->idsistemaDefaultFK;
			}

			if($opcion_session->bitBusquedaDesdeFKSesionsistema) {
				$this->setVisibleBusquedasParasistema(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_opcion',$this->strRecargarFkTipos,',')) {
				$this->opcionsFK=$opcionForeignKey->opcionsFK;
				$this->idopcionDefaultFK=$opcionForeignKey->idopcionDefaultFK;
			}

			if($opcion_session->bitBusquedaDesdeFKSesionopcion) {
				$this->setVisibleBusquedasParaopcion(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_grupo_opcion',$this->strRecargarFkTipos,',')) {
				$this->grupo_opcionsFK=$opcionForeignKey->grupo_opcionsFK;
				$this->idgrupo_opcionDefaultFK=$opcionForeignKey->idgrupo_opcionDefaultFK;
			}

			if($opcion_session->bitBusquedaDesdeFKSesiongrupo_opcion) {
				$this->setVisibleBusquedasParagrupo_opcion(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_modulo',$this->strRecargarFkTipos,',')) {
				$this->modulosFK=$opcionForeignKey->modulosFK;
				$this->idmoduloDefaultFK=$opcionForeignKey->idmoduloDefaultFK;
			}

			if($opcion_session->bitBusquedaDesdeFKSesionmodulo) {
				$this->setVisibleBusquedasParamodulo(true);
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			
			
			/*//RECARGAR COMBOS SIN ELEMENTOS
			if($this->strRecargarFkTiposNinguno!=null && $this->strRecargarFkTiposNinguno!='NINGUNO' && $this->strRecargarFkTiposNinguno!='') {*/
			/*}*/
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	function cargarCombosFKFromReturnGeneral($opcionReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$opcionReturnGeneral->strRecargarFkTipos;
			
			


			if($opcionReturnGeneral->con_sistemasFK==true) {
				$this->sistemasFK=$opcionReturnGeneral->sistemasFK;
				$this->idsistemaDefaultFK=$opcionReturnGeneral->idsistemaDefaultFK;
			}


			if($opcionReturnGeneral->con_opcionsFK==true) {
				$this->opcionsFK=$opcionReturnGeneral->opcionsFK;
				$this->idopcionDefaultFK=$opcionReturnGeneral->idopcionDefaultFK;
			}


			if($opcionReturnGeneral->con_grupo_opcionsFK==true) {
				$this->grupo_opcionsFK=$opcionReturnGeneral->grupo_opcionsFK;
				$this->idgrupo_opcionDefaultFK=$opcionReturnGeneral->idgrupo_opcionDefaultFK;
			}


			if($opcionReturnGeneral->con_modulosFK==true) {
				$this->modulosFK=$opcionReturnGeneral->modulosFK;
				$this->idmoduloDefaultFK=$opcionReturnGeneral->idmoduloDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(opcion_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));
		
		if($opcion_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($opcion_session->getstrNombrePaginaNavegacionHaciaFKDesde()==sistema_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='sistema';
			}
			else if($opcion_session->getstrNombrePaginaNavegacionHaciaFKDesde()==opcion_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='opcion';
			}
			else if($opcion_session->getstrNombrePaginaNavegacionHaciaFKDesde()==grupo_opcion_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='grupo_opcion';
			}
			else if($opcion_session->getstrNombrePaginaNavegacionHaciaFKDesde()==modulo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='modulo';
			}
			
			$opcion_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}						
			
			$this->opcionsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->opcionsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->opcionsAuxiliar=array();
			}
			
			if(count($this->opcionsAuxiliar) > 0) {
				
				foreach ($this->opcionsAuxiliar as $opcionSeleccionado) {
					$this->eliminarTablaBase($opcionSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getTiposRelacionesReporte() : array {
		$arrTiposRelacionesReportes=array();
				
		$tipoRelacionReporte=new Reporte();
		
		/*$tipoRelacionReporte->setsCodigo(PerfilConstantesFunciones::$LABEL_IDSISTEMA);
		$tipoRelacionReporte->setsDescripcion(PerfilConstantesFunciones::$LABEL_IDSISTEMA);

		$arrTiposRelacionesReportes[]=$tipoRelacionReporte;*/
		
		if(!$this->bitEsRelaciones) {
			


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('accion');
			$tipoRelacionReporte->setsDescripcion('Acciones');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('campo');
			$tipoRelacionReporte->setsDescripcion('Campos');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('opcion');
			$tipoRelacionReporte->setsDescripcion('es');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('perfil_opcion');
			$tipoRelacionReporte->setsDescripcion('Perfil es');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=perfil_opcion_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=opcion_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=accion_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=campo_util::$STR_NOMBRE_CLASE;
		
		return $arrNombresClasesRelacionadasLocal;
	}
	
	
	public function setstrRecargarFkInicializar() {
		$this->setstrRecargarFk('TODOS','NINGUNO',0,'');		
	}
	
	
	
	public function getsistemasFKListSelectItem() 
	{
		$sistemasList=array();

		$item=null;

		foreach($this->sistemasFK as $sistema)
		{
			$item=new SelectItem();
			$item->setLabel($sistema->getnombre_principal());
			$item->setValue($sistema->getId());
			$sistemasList[]=$item;
		}

		return $sistemasList;
	}


	public function getopcionsFKListSelectItem() 
	{
		$opcionsList=array();

		$item=null;

		foreach($this->opcionsFK as $opcion)
		{
			$item=new SelectItem();
			$item->setLabel($opcion->getcodigo());
			$item->setValue($opcion->getId());
			$opcionsList[]=$item;
		}

		return $opcionsList;
	}


	public function getgrupo_opcionsFKListSelectItem() 
	{
		$grupo_opcionsList=array();

		$item=null;

		foreach($this->grupo_opcionsFK as $grupo_opcion)
		{
			$item=new SelectItem();
			$item->setLabel($grupo_opcion->getnombre_principal());
			$item->setValue($grupo_opcion->getId());
			$grupo_opcionsList[]=$item;
		}

		return $grupo_opcionsList;
	}


	public function getmodulosFKListSelectItem() 
	{
		$modulosList=array();

		$item=null;

		foreach($this->modulosFK as $modulo)
		{
			$item=new SelectItem();
			$item->setLabel($modulo->getnombre());
			$item->setValue($modulo->getId());
			$modulosList[]=$item;
		}

		return $modulosList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			*/
			
			/*$this->strNombreCampoBusqueda*/
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				
			} else {
				
			}
			
			$IdsFksSeleccionados=$this->getIdsFksSeleccionados($maxima_fila);
			$strQueryIn='';
			$esPrimero=true;
			
			foreach($IdsFksSeleccionados as $idFkSeleccionado) {
				
				if(!$esPrimero) {
					$strQueryIn.=',';
				} else {
					$esPrimero=false;	
				}
				
				$strQueryIn.=$idFkSeleccionado;
			}
			
			$this->strFinalQuerySeleccionarLote=' and '.$this->strNombreCampoBusqueda.' in('.$strQueryIn.')';
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			$this->validarCargarSeleccionarLoteFk($IdsFksSeleccionados);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$opcionsNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->opcions as $opcionLocal) {
				if($opcionLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->opcion=new opcion();
				
				$this->opcion->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->opcions[]=$this->opcion;*/
				
				$opcionsNuevos[]=$this->opcion;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('sistema');$classes[]=$class;
				$class=new Classe('opcion');$classes[]=$class;
				$class=new Classe('grupo_opcion');$classes[]=$class;
				$class=new Classe('modulo');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->setopcions($opcionsNuevos);
					
				$this->opcionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($opcionsNuevos as $opcionNuevo) {
					$this->opcions[]=$opcionNuevo;
				}
				
				/*$this->opcions[]=$opcionsNuevos;*/
				
				$this->opcionLogic->setopcions($this->opcions);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($opcionsNuevos!=null);
	}
					
	
	public function cargarCombossistemasFK($connexion=null,$strRecargarFkQuery=''){
		$sistemaLogic= new sistema_logic();
		$pagination= new Pagination();
		$this->sistemasFK=array();

		$sistemaLogic->setConnexion($connexion);
		$sistemaLogic->getsistemaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));

		if($opcion_session==null) {
			$opcion_session=new opcion_session();
		}
		
		if($opcion_session->bitBusquedaDesdeFKSesionsistema!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=sistema_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalsistema=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalsistema=Funciones::GetFinalQueryAppend($finalQueryGlobalsistema, '');
				$finalQueryGlobalsistema.=sistema_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalsistema.$strRecargarFkQuery;		

				$sistemaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombossistemasFK($sistemaLogic->getsistemas());

		} else {
			$this->setVisibleBusquedasParasistema(true);


			if($opcion_session->bigidsistemaActual!=null && $opcion_session->bigidsistemaActual > 0) {
				$sistemaLogic->getEntity($opcion_session->bigidsistemaActual);//WithConnection

				$this->sistemasFK[$sistemaLogic->getsistema()->getId()]=opcion_util::getsistemaDescripcion($sistemaLogic->getsistema());
				$this->idsistemaDefaultFK=$sistemaLogic->getsistema()->getId();
			}
		}
	}

	public function cargarCombosopcionsFK($connexion=null,$strRecargarFkQuery=''){
		$opcionLogic= new opcion_logic();
		$pagination= new Pagination();
		$this->opcionsFK=array();

		$opcionLogic->setConnexion($connexion);
		$opcionLogic->getopcionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));

		if($opcion_session==null) {
			$opcion_session=new opcion_session();
		}
		
		if($opcion_session->bitBusquedaDesdeFKSesionopcion!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=opcion_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalopcion=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalopcion=Funciones::GetFinalQueryAppend($finalQueryGlobalopcion, '');
				$finalQueryGlobalopcion.=opcion_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalopcion.$strRecargarFkQuery;		

				$opcionLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosopcionsFK($opcionLogic->getopcions());

		} else {
			$this->setVisibleBusquedasParaopcion(true);


			if($opcion_session->bigidopcionActual!=null && $opcion_session->bigidopcionActual > 0) {
				$opcionLogic->getEntity($opcion_session->bigidopcionActual);//WithConnection

				$this->opcionsFK[$opcionLogic->getopcion()->getId()]=opcion_util::getopcionDescripcion($opcionLogic->getopcion());
				$this->idopcionDefaultFK=$opcionLogic->getopcion()->getId();
			}
		}
	}

	public function cargarCombosgrupo_opcionsFK($connexion=null,$strRecargarFkQuery=''){
		$grupo_opcionLogic= new grupo_opcion_logic();
		$pagination= new Pagination();
		$this->grupo_opcionsFK=array();

		$grupo_opcionLogic->setConnexion($connexion);
		$grupo_opcionLogic->getgrupo_opcionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));

		if($opcion_session==null) {
			$opcion_session=new opcion_session();
		}
		
		if($opcion_session->bitBusquedaDesdeFKSesiongrupo_opcion!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=grupo_opcion_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalgrupo_opcion=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalgrupo_opcion=Funciones::GetFinalQueryAppend($finalQueryGlobalgrupo_opcion, '');
				$finalQueryGlobalgrupo_opcion.=grupo_opcion_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalgrupo_opcion.$strRecargarFkQuery;		

				$grupo_opcionLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosgrupo_opcionsFK($grupo_opcionLogic->getgrupo_opcions());

		} else {
			$this->setVisibleBusquedasParagrupo_opcion(true);


			if($opcion_session->bigidgrupo_opcionActual!=null && $opcion_session->bigidgrupo_opcionActual > 0) {
				$grupo_opcionLogic->getEntity($opcion_session->bigidgrupo_opcionActual);//WithConnection

				$this->grupo_opcionsFK[$grupo_opcionLogic->getgrupo_opcion()->getId()]=opcion_util::getgrupo_opcionDescripcion($grupo_opcionLogic->getgrupo_opcion());
				$this->idgrupo_opcionDefaultFK=$grupo_opcionLogic->getgrupo_opcion()->getId();
			}
		}
	}

	public function cargarCombosmodulosFK($connexion=null,$strRecargarFkQuery=''){
		$moduloLogic= new modulo_logic();
		$pagination= new Pagination();
		$this->modulosFK=array();

		$moduloLogic->setConnexion($connexion);
		$moduloLogic->getmoduloDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));

		if($opcion_session==null) {
			$opcion_session=new opcion_session();
		}
		
		if($opcion_session->bitBusquedaDesdeFKSesionmodulo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=modulo_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalmodulo=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalmodulo=Funciones::GetFinalQueryAppend($finalQueryGlobalmodulo, '');
				$finalQueryGlobalmodulo.=modulo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalmodulo.$strRecargarFkQuery;		

				$moduloLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosmodulosFK($moduloLogic->getmodulos());

		} else {
			$this->setVisibleBusquedasParamodulo(true);


			if($opcion_session->bigidmoduloActual!=null && $opcion_session->bigidmoduloActual > 0) {
				$moduloLogic->getEntity($opcion_session->bigidmoduloActual);//WithConnection

				$this->modulosFK[$moduloLogic->getmodulo()->getId()]=opcion_util::getmoduloDescripcion($moduloLogic->getmodulo());
				$this->idmoduloDefaultFK=$moduloLogic->getmodulo()->getId();
			}
		}
	}

	
	
	public function prepararCombossistemasFK($sistemas){

		foreach ($sistemas as $sistemaLocal ) {
			if($this->idsistemaDefaultFK==0) {
				$this->idsistemaDefaultFK=$sistemaLocal->getId();
			}

			$this->sistemasFK[$sistemaLocal->getId()]=opcion_util::getsistemaDescripcion($sistemaLocal);
		}
	}

	public function prepararCombosopcionsFK($opcions){

		foreach ($opcions as $opcionLocal ) {
			if($this->idopcionDefaultFK==0) {
				$this->idopcionDefaultFK=$opcionLocal->getId();
			}

			$this->opcionsFK[$opcionLocal->getId()]=opcion_util::getopcionDescripcion($opcionLocal);
		}
	}

	public function prepararCombosgrupo_opcionsFK($grupo_opcions){

		foreach ($grupo_opcions as $grupo_opcionLocal ) {
			if($this->idgrupo_opcionDefaultFK==0) {
				$this->idgrupo_opcionDefaultFK=$grupo_opcionLocal->getId();
			}

			$this->grupo_opcionsFK[$grupo_opcionLocal->getId()]=opcion_util::getgrupo_opcionDescripcion($grupo_opcionLocal);
		}
	}

	public function prepararCombosmodulosFK($modulos){

		foreach ($modulos as $moduloLocal ) {
			if($this->idmoduloDefaultFK==0) {
				$this->idmoduloDefaultFK=$moduloLocal->getId();
			}

			$this->modulosFK[$moduloLocal->getId()]=opcion_util::getmoduloDescripcion($moduloLocal);
		}
	}

	
	
	public function cargarDescripcionsistemaFK($idsistema,$connexion=null){
		$sistemaLogic= new sistema_logic();
		$sistemaLogic->setConnexion($connexion);
		$sistemaLogic->getsistemaDataAccess()->isForFKData=true;
		$strDescripcionsistema='';

		if($idsistema!=null && $idsistema!='' && $idsistema!='null') {
			if($connexion!=null) {
				$sistemaLogic->getEntity($idsistema);//WithConnection
			} else {
				$sistemaLogic->getEntityWithConnection($idsistema);//
			}

			$strDescripcionsistema=opcion_util::getsistemaDescripcion($sistemaLogic->getsistema());

		} else {
			$strDescripcionsistema='null';
		}

		return $strDescripcionsistema;
	}

	public function cargarDescripcionopcionFK($idopcion,$connexion=null){
		$opcionLogic= new opcion_logic();
		$opcionLogic->setConnexion($connexion);
		$opcionLogic->getopcionDataAccess()->isForFKData=true;
		$strDescripcionopcion='';

		if($idopcion!=null && $idopcion!='' && $idopcion!='null') {
			if($connexion!=null) {
				$opcionLogic->getEntity($idopcion);//WithConnection
			} else {
				$opcionLogic->getEntityWithConnection($idopcion);//
			}

			$strDescripcionopcion=opcion_util::getopcionDescripcion($opcionLogic->getopcion());

		} else {
			$strDescripcionopcion='null';
		}

		return $strDescripcionopcion;
	}

	public function cargarDescripciongrupo_opcionFK($idgrupo_opcion,$connexion=null){
		$grupo_opcionLogic= new grupo_opcion_logic();
		$grupo_opcionLogic->setConnexion($connexion);
		$grupo_opcionLogic->getgrupo_opcionDataAccess()->isForFKData=true;
		$strDescripciongrupo_opcion='';

		if($idgrupo_opcion!=null && $idgrupo_opcion!='' && $idgrupo_opcion!='null') {
			if($connexion!=null) {
				$grupo_opcionLogic->getEntity($idgrupo_opcion);//WithConnection
			} else {
				$grupo_opcionLogic->getEntityWithConnection($idgrupo_opcion);//
			}

			$strDescripciongrupo_opcion=opcion_util::getgrupo_opcionDescripcion($grupo_opcionLogic->getgrupo_opcion());

		} else {
			$strDescripciongrupo_opcion='null';
		}

		return $strDescripciongrupo_opcion;
	}

	public function cargarDescripcionmoduloFK($idmodulo,$connexion=null){
		$moduloLogic= new modulo_logic();
		$moduloLogic->setConnexion($connexion);
		$moduloLogic->getmoduloDataAccess()->isForFKData=true;
		$strDescripcionmodulo='';

		if($idmodulo!=null && $idmodulo!='' && $idmodulo!='null') {
			if($connexion!=null) {
				$moduloLogic->getEntity($idmodulo);//WithConnection
			} else {
				$moduloLogic->getEntityWithConnection($idmodulo);//
			}

			$strDescripcionmodulo=opcion_util::getmoduloDescripcion($moduloLogic->getmodulo());

		} else {
			$strDescripcionmodulo='null';
		}

		return $strDescripcionmodulo;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(opcion $opcionClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$opcionClase->setid_modulo($this->moduloActual->getId());
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function abrirArbol(){
		$this->saveGetSessionControllerAndPageAuxiliar(false);
		
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaArbol(opcion_util::$STR_CLASS_NAME,'seguridad','','POPUP',$this->strTipoPaginaAuxiliaropcion,$this->strTipoUsuarioAuxiliaropcion,false,'');
		
		$this->strAuxiliarTipo='POPUP';
			
		$this->saveGetSessionControllerAndPageAuxiliar(true);

		//$this->returnAjax();
	}
	
	public function cargarArbol(){
		$this->saveGetSessionControllerAndPageAuxiliar(false);
		
		/*//SI SE EJECUTA FUNCIONES DEL ARBOL NO SE MUESTRA
		$this->htmlAuxiliar='<h1>AUXILIAR</h1>';*/
		
		$nombre_clase='opcion';
		$nombre_objeto='opcion';
		$objetosUsuario=$this->opcions;
		$tree=null;
		$webroot='webroot';
		
		foreach($objetosUsuario as $objeto) {
			$objeto->setsDescription(opcion_util::getopcionDescripcion($objeto));
		}
		
		$this->htmlAuxiliar=FuncionesWebArbol::getMenuUsuarioJQuery2($nombre_clase,$nombre_objeto,$objetosUsuario,$tree,$webroot);
		
		//$this->returnAjax();
	}
	
	

	public function setVisibleBusquedasParasistema($isParasistema){
		$strParaVisiblesistema='display:table-row';
		$strParaVisibleNegacionsistema='display:none';

		if($isParasistema) {
			$strParaVisiblesistema='display:table-row';
			$strParaVisibleNegacionsistema='display:none';
		} else {
			$strParaVisiblesistema='display:none';
			$strParaVisibleNegacionsistema='display:table-row';
		}


		$strParaVisibleNegacionsistema=trim($strParaVisibleNegacionsistema);

		$this->strVisibleBusquedaPorIdSistemaPorIdOpcion=$strParaVisiblesistema;
		$this->strVisibleBusquedaPorIdSistemaPorNombre=$strParaVisiblesistema;
		$this->strVisibleFK_Idgrupo_opcion=$strParaVisibleNegacionsistema;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacionsistema;
		$this->strVisibleFK_Idopcion=$strParaVisibleNegacionsistema;
		$this->strVisibleFK_Idsistema=$strParaVisiblesistema;
	}

	public function setVisibleBusquedasParaopcion($isParaopcion){
		$strParaVisibleopcion='display:table-row';
		$strParaVisibleNegacionopcion='display:none';

		if($isParaopcion) {
			$strParaVisibleopcion='display:table-row';
			$strParaVisibleNegacionopcion='display:none';
		} else {
			$strParaVisibleopcion='display:none';
			$strParaVisibleNegacionopcion='display:table-row';
		}


		$strParaVisibleNegacionopcion=trim($strParaVisibleNegacionopcion);

		$this->strVisibleBusquedaPorIdSistemaPorIdOpcion=$strParaVisibleopcion;
		$this->strVisibleBusquedaPorIdSistemaPorNombre=$strParaVisibleNegacionopcion;
		$this->strVisibleFK_Idgrupo_opcion=$strParaVisibleNegacionopcion;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacionopcion;
		$this->strVisibleFK_Idopcion=$strParaVisibleopcion;
		$this->strVisibleFK_Idsistema=$strParaVisibleNegacionopcion;
	}

	public function setVisibleBusquedasParagrupo_opcion($isParagrupo_opcion){
		$strParaVisiblegrupo_opcion='display:table-row';
		$strParaVisibleNegaciongrupo_opcion='display:none';

		if($isParagrupo_opcion) {
			$strParaVisiblegrupo_opcion='display:table-row';
			$strParaVisibleNegaciongrupo_opcion='display:none';
		} else {
			$strParaVisiblegrupo_opcion='display:none';
			$strParaVisibleNegaciongrupo_opcion='display:table-row';
		}


		$strParaVisibleNegaciongrupo_opcion=trim($strParaVisibleNegaciongrupo_opcion);

		$this->strVisibleBusquedaPorIdSistemaPorIdOpcion=$strParaVisibleNegaciongrupo_opcion;
		$this->strVisibleBusquedaPorIdSistemaPorNombre=$strParaVisibleNegaciongrupo_opcion;
		$this->strVisibleFK_Idgrupo_opcion=$strParaVisiblegrupo_opcion;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegaciongrupo_opcion;
		$this->strVisibleFK_Idopcion=$strParaVisibleNegaciongrupo_opcion;
		$this->strVisibleFK_Idsistema=$strParaVisibleNegaciongrupo_opcion;
	}

	public function setVisibleBusquedasParamodulo($isParamodulo){
		$strParaVisiblemodulo='display:table-row';
		$strParaVisibleNegacionmodulo='display:none';

		if($isParamodulo) {
			$strParaVisiblemodulo='display:table-row';
			$strParaVisibleNegacionmodulo='display:none';
		} else {
			$strParaVisiblemodulo='display:none';
			$strParaVisibleNegacionmodulo='display:table-row';
		}


		$strParaVisibleNegacionmodulo=trim($strParaVisibleNegacionmodulo);

		$this->strVisibleBusquedaPorIdSistemaPorIdOpcion=$strParaVisibleNegacionmodulo;
		$this->strVisibleBusquedaPorIdSistemaPorNombre=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idgrupo_opcion=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idmodulo=$strParaVisiblemodulo;
		$this->strVisibleFK_Idopcion=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idsistema=$strParaVisibleNegacionmodulo;
	}
	
	

	public function abrirBusquedaParasistema() {//$idopcionActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idopcionActual=$idopcionActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.sistema_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.opcionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sistema(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',sistema_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.opcionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sistema(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(sistema_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliaropcion,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaopcion() {//$idopcionActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idopcionActual=$idopcionActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.opcion_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.opcionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_opcion(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',opcion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.opcionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_opcion(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(opcion_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliaropcion,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParagrupo_opcion() {//$idopcionActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idopcionActual=$idopcionActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.grupo_opcion_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.opcionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_grupo_opcion(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',grupo_opcion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.opcionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_grupo_opcion(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(grupo_opcion_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliaropcion,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParamodulo() {//$idopcionActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idopcionActual=$idopcionActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.modulo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.opcionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_modulo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',modulo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.opcionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_modulo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(modulo_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliaropcion,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParaperfil_opciones(int $idopcionActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idopcionActual=$idopcionActual;

		$bitPaginaPopupperfil_opcion=false;

		try {

			$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));

			if($opcion_session==null) {
				$opcion_session=new opcion_session();
			}

			$perfil_opcion_session=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME));

			if($perfil_opcion_session==null) {
				$perfil_opcion_session=new perfil_opcion_session();
			}

			$perfil_opcion_session->strUltimaBusqueda='FK_Idopcion';
			$perfil_opcion_session->strPathNavegacionActual=$opcion_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.perfil_opcion_util::$STR_CLASS_WEB_TITULO;
			$perfil_opcion_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupperfil_opcion=$perfil_opcion_session->bitPaginaPopup;
			$perfil_opcion_session->setPaginaPopupVariables(true);
			$bitPaginaPopupperfil_opcion=$perfil_opcion_session->bitPaginaPopup;
			$perfil_opcion_session->bitPermiteNavegacionHaciaFKDesde=false;
			$perfil_opcion_session->strNombrePaginaNavegacionHaciaFKDesde=opcion_util::$STR_NOMBRE_OPCION;
			$perfil_opcion_session->bitBusquedaDesdeFKSesionopcion=true;
			$perfil_opcion_session->bigidopcionActual=$this->idopcionActual;

			$opcion_session->bitBusquedaDesdeFKSesionFK=true;
			$opcion_session->bigIdActualFK=$this->idopcionActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"perfil_opcion"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=opcion_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"perfil_opcion"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(opcion_util::$STR_SESSION_NAME,serialize($opcion_session));
			$this->Session->write(perfil_opcion_util::$STR_SESSION_NAME,serialize($perfil_opcion_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupperfil_opcion!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',perfil_opcion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(perfil_opcion_util::$STR_CLASS_NAME,'seguridad','','POPUP',$this->strTipoPaginaAuxiliaropcion,$this->strTipoUsuarioAuxiliaropcion,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',perfil_opcion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(perfil_opcion_util::$STR_CLASS_NAME,'seguridad','','NO-POPUP',$this->strTipoPaginaAuxiliaropcion,$this->strTipoUsuarioAuxiliaropcion,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaopciones(int $idopcionActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idopcionActual=$idopcionActual;

		$bitPaginaPopupopcion=false;

		try {

			$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));

			if($opcion_session==null) {
				$opcion_session=new opcion_session();
			}

			$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));

			if($opcion_session==null) {
				$opcion_session=new opcion_session();
			}

			$opcion_session->strUltimaBusqueda='FK_Idopcion';
			$opcion_session->strPathNavegacionActual=$opcion_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.opcion_util::$STR_CLASS_WEB_TITULO;
			$opcion_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupopcion=$opcion_session->bitPaginaPopup;
			$opcion_session->setPaginaPopupVariables(true);
			$bitPaginaPopupopcion=$opcion_session->bitPaginaPopup;
			$opcion_session->bitPermiteNavegacionHaciaFKDesde=false;
			$opcion_session->strNombrePaginaNavegacionHaciaFKDesde=opcion_util::$STR_NOMBRE_OPCION;
			$opcion_session->bitBusquedaDesdeFKSesionopcion=true;
			$opcion_session->bigidopcionActual=$this->idopcionActual;

			$opcion_session->bitBusquedaDesdeFKSesionFK=true;
			$opcion_session->bigIdActualFK=$this->idopcionActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"opcion"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=opcion_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"opcion"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(opcion_util::$STR_SESSION_NAME,serialize($opcion_session));
			$this->Session->write(opcion_util::$STR_SESSION_NAME,serialize($opcion_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupopcion!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',opcion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(opcion_util::$STR_CLASS_NAME,'seguridad','','POPUP',$this->strTipoPaginaAuxiliaropcion,$this->strTipoUsuarioAuxiliaropcion,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',opcion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(opcion_util::$STR_CLASS_NAME,'seguridad','','NO-POPUP',$this->strTipoPaginaAuxiliaropcion,$this->strTipoUsuarioAuxiliaropcion,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaacciones(int $idopcionActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idopcionActual=$idopcionActual;

		$bitPaginaPopupaccion=false;

		try {

			$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));

			if($opcion_session==null) {
				$opcion_session=new opcion_session();
			}

			$accion_session=unserialize($this->Session->read(accion_util::$STR_SESSION_NAME));

			if($accion_session==null) {
				$accion_session=new accion_session();
			}

			$accion_session->strUltimaBusqueda='FK_Idopcion';
			$accion_session->strPathNavegacionActual=$opcion_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.accion_util::$STR_CLASS_WEB_TITULO;
			$accion_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupaccion=$accion_session->bitPaginaPopup;
			$accion_session->setPaginaPopupVariables(true);
			$bitPaginaPopupaccion=$accion_session->bitPaginaPopup;
			$accion_session->bitPermiteNavegacionHaciaFKDesde=false;
			$accion_session->strNombrePaginaNavegacionHaciaFKDesde=opcion_util::$STR_NOMBRE_OPCION;
			$accion_session->bitBusquedaDesdeFKSesionopcion=true;
			$accion_session->bigidopcionActual=$this->idopcionActual;

			$opcion_session->bitBusquedaDesdeFKSesionFK=true;
			$opcion_session->bigIdActualFK=$this->idopcionActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"accion"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=opcion_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"accion"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(opcion_util::$STR_SESSION_NAME,serialize($opcion_session));
			$this->Session->write(accion_util::$STR_SESSION_NAME,serialize($accion_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupaccion!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',accion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(accion_util::$STR_CLASS_NAME,'seguridad','','POPUP',$this->strTipoPaginaAuxiliaropcion,$this->strTipoUsuarioAuxiliaropcion,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',accion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(accion_util::$STR_CLASS_NAME,'seguridad','','NO-POPUP',$this->strTipoPaginaAuxiliaropcion,$this->strTipoUsuarioAuxiliaropcion,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParacampos(int $idopcionActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idopcionActual=$idopcionActual;

		$bitPaginaPopupcampo=false;

		try {

			$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));

			if($opcion_session==null) {
				$opcion_session=new opcion_session();
			}

			$campo_session=unserialize($this->Session->read(campo_util::$STR_SESSION_NAME));

			if($campo_session==null) {
				$campo_session=new campo_session();
			}

			$campo_session->strUltimaBusqueda='FK_Idopcion';
			$campo_session->strPathNavegacionActual=$opcion_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.campo_util::$STR_CLASS_WEB_TITULO;
			$campo_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcampo=$campo_session->bitPaginaPopup;
			$campo_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcampo=$campo_session->bitPaginaPopup;
			$campo_session->bitPermiteNavegacionHaciaFKDesde=false;
			$campo_session->strNombrePaginaNavegacionHaciaFKDesde=opcion_util::$STR_NOMBRE_OPCION;
			$campo_session->bitBusquedaDesdeFKSesionopcion=true;
			$campo_session->bigidopcionActual=$this->idopcionActual;

			$opcion_session->bitBusquedaDesdeFKSesionFK=true;
			$opcion_session->bigIdActualFK=$this->idopcionActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"campo"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=opcion_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"campo"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(opcion_util::$STR_SESSION_NAME,serialize($opcion_session));
			$this->Session->write(campo_util::$STR_SESSION_NAME,serialize($campo_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcampo!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',campo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(campo_util::$STR_CLASS_NAME,'seguridad','','POPUP',$this->strTipoPaginaAuxiliaropcion,$this->strTipoUsuarioAuxiliaropcion,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',campo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(campo_util::$STR_CLASS_NAME,'seguridad','','NO-POPUP',$this->strTipoPaginaAuxiliaropcion,$this->strTipoUsuarioAuxiliaropcion,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(opcion_util::$STR_SESSION_NAME,opcion_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$opcion_session=$this->Session->read(opcion_util::$STR_SESSION_NAME);
				
		if($opcion_session==null) {
			$opcion_session=new opcion_session();		
			//$this->Session->write('opcion_session',$opcion_session);							
		}
		*/
		
		$opcion_session=new opcion_session();
    	$opcion_session->strPathNavegacionActual=opcion_util::$STR_CLASS_WEB_TITULO;
    	$opcion_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(opcion_util::$STR_SESSION_NAME,serialize($opcion_session));		
	}	
	
	public function getSetBusquedasSesionConfig(opcion_session $opcion_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($opcion_session->bitBusquedaDesdeFKSesionFK!=null && $opcion_session->bitBusquedaDesdeFKSesionFK==true) {
			if($opcion_session->bigIdActualFK!=null && $opcion_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$opcion_session->bigIdActualFKParaPosibleAtras=$opcion_session->bigIdActualFK;*/
			}
				
			$opcion_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$opcion_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(opcion_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($opcion_session->bitBusquedaDesdeFKSesionsistema!=null && $opcion_session->bitBusquedaDesdeFKSesionsistema==true)
			{
				if($opcion_session->bigidsistemaActual!=0) {
					$this->strAccionBusqueda='FK_Idsistema';

					$existe_history=HistoryWeb::ExisteElemento(opcion_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(opcion_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(opcion_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($opcion_session->bigidsistemaActualDescripcion);
						$historyWeb->setIdActual($opcion_session->bigidsistemaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=opcion_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$opcion_session->bigidsistemaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$opcion_session->bitBusquedaDesdeFKSesionsistema=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;

				if($opcion_session->intNumeroPaginacion==opcion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$opcion_session->intNumeroPaginacion;
				}
			}
			else if($opcion_session->bitBusquedaDesdeFKSesionopcion!=null && $opcion_session->bitBusquedaDesdeFKSesionopcion==true)
			{
				if($opcion_session->bigidopcionActual!=0) {
					$this->strAccionBusqueda='FK_Idopcion';

					$existe_history=HistoryWeb::ExisteElemento(opcion_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(opcion_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(opcion_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($opcion_session->bigidopcionActualDescripcion);
						$historyWeb->setIdActual($opcion_session->bigidopcionActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=opcion_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$opcion_session->bigidopcionActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$opcion_session->bitBusquedaDesdeFKSesionopcion=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;

				if($opcion_session->intNumeroPaginacion==opcion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$opcion_session->intNumeroPaginacion;
				}
			}
			else if($opcion_session->bitBusquedaDesdeFKSesiongrupo_opcion!=null && $opcion_session->bitBusquedaDesdeFKSesiongrupo_opcion==true)
			{
				if($opcion_session->bigidgrupo_opcionActual!=0) {
					$this->strAccionBusqueda='FK_Idgrupo_opcion';

					$existe_history=HistoryWeb::ExisteElemento(opcion_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(opcion_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(opcion_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($opcion_session->bigidgrupo_opcionActualDescripcion);
						$historyWeb->setIdActual($opcion_session->bigidgrupo_opcionActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=opcion_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$opcion_session->bigidgrupo_opcionActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$opcion_session->bitBusquedaDesdeFKSesiongrupo_opcion=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;

				if($opcion_session->intNumeroPaginacion==opcion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$opcion_session->intNumeroPaginacion;
				}
			}
			else if($opcion_session->bitBusquedaDesdeFKSesionmodulo!=null && $opcion_session->bitBusquedaDesdeFKSesionmodulo==true)
			{
				if($opcion_session->bigidmoduloActual!=0) {
					$this->strAccionBusqueda='FK_Idmodulo';

					$existe_history=HistoryWeb::ExisteElemento(opcion_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(opcion_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(opcion_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($opcion_session->bigidmoduloActualDescripcion);
						$historyWeb->setIdActual($opcion_session->bigidmoduloActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=opcion_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$opcion_session->bigidmoduloActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$opcion_session->bitBusquedaDesdeFKSesionmodulo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;

				if($opcion_session->intNumeroPaginacion==opcion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=opcion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$opcion_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$opcion_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));
		
		if($opcion_session==null) {
			$opcion_session=new opcion_session();
		}
		
		$opcion_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$opcion_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$opcion_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='BusquedaPorIdSistemaPorIdOpcion') {
			$opcion_session->id_sistema=$this->id_sistemaBusquedaPorIdSistemaPorIdOpcion;	
			$opcion_session->id_opcion=$this->id_opcionBusquedaPorIdSistemaPorIdOpcion;	

		}
		else if($this->strAccionBusqueda=='BusquedaPorIdSistemaPorNombre') {
			$opcion_session->id_sistema=$this->id_sistemaBusquedaPorIdSistemaPorNombre;	
			$opcion_session->nombre=$this->nombreBusquedaPorIdSistemaPorNombre;	

		}
		else if($this->strAccionBusqueda=='FK_Idgrupo_opcion') {
			$opcion_session->id_grupo_opcion=$this->id_grupo_opcionFK_Idgrupo_opcion;	

		}
		else if($this->strAccionBusqueda=='FK_Idmodulo') {
			$opcion_session->id_modulo=$this->id_moduloFK_Idmodulo;	

		}
		else if($this->strAccionBusqueda=='FK_Idopcion') {
			$opcion_session->id_opcion=$this->id_opcionFK_Idopcion;	

		}
		else if($this->strAccionBusqueda=='FK_Idsistema') {
			$opcion_session->id_sistema=$this->id_sistemaFK_Idsistema;	

		}
		
		$this->Session->write(opcion_util::$STR_SESSION_NAME,serialize($opcion_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(opcion_session $opcion_session) {
		
		if($opcion_session==null) {
			$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));
		}
		
		if($opcion_session==null) {
		   $opcion_session=new opcion_session();
		}
		
		if($opcion_session->strUltimaBusqueda!=null && $opcion_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$opcion_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$opcion_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$opcion_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='BusquedaPorIdSistemaPorIdOpcion') {
				$this->id_sistemaBusquedaPorIdSistemaPorIdOpcion=$opcion_session->id_sistema;
				$opcion_session->id_sistema=-1;
				$this->id_opcionBusquedaPorIdSistemaPorIdOpcion=$opcion_session->id_opcion;
				$opcion_session->id_opcion=null;

			}
			 else if($this->strAccionBusqueda=='BusquedaPorIdSistemaPorNombre') {
				$this->id_sistemaBusquedaPorIdSistemaPorNombre=$opcion_session->id_sistema;
				$opcion_session->id_sistema=-1;
				$this->nombreBusquedaPorIdSistemaPorNombre=$opcion_session->nombre;
				$opcion_session->nombre='';

			}
			 else if($this->strAccionBusqueda=='FK_Idgrupo_opcion') {
				$this->id_grupo_opcionFK_Idgrupo_opcion=$opcion_session->id_grupo_opcion;
				$opcion_session->id_grupo_opcion=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idmodulo') {
				$this->id_moduloFK_Idmodulo=$opcion_session->id_modulo;
				$opcion_session->id_modulo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idopcion') {
				$this->id_opcionFK_Idopcion=$opcion_session->id_opcion;
				$opcion_session->id_opcion=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idsistema') {
				$this->id_sistemaFK_Idsistema=$opcion_session->id_sistema;
				$opcion_session->id_sistema=-1;

			}
		}
		
		$opcion_session->strUltimaBusqueda='';
		//$opcion_session->intNumeroPaginacion=10;
		$opcion_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(opcion_util::$STR_SESSION_NAME,serialize($opcion_session));		
	}
	
	public function opcionsControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idsistemaDefaultFK = 0;
		$this->idopcionDefaultFK = 0;
		$this->idgrupo_opcionDefaultFK = 0;
		$this->idmoduloDefaultFK = 0;
	}
	
	public function setopcionFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_sistema',$this->idsistemaDefaultFK);
		$this->setExistDataCampoForm('form','id_opcion',$this->idopcionDefaultFK);
		$this->setExistDataCampoForm('form','id_grupo_opcion',$this->idgrupo_opcionDefaultFK);
		$this->setExistDataCampoForm('form','id_modulo',$this->idmoduloDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		sistema::$class;
		sistema_carga::$CONTROLLER;

		grupo_opcion::$class;
		grupo_opcion_carga::$CONTROLLER;

		modulo::$class;
		modulo_carga::$CONTROLLER;
		
		//REL
		

		perfil_carga::$CONTROLLER;
		perfil_util::$STR_SCHEMA;
		perfil_session::class;

		accion_carga::$CONTROLLER;
		accion_util::$STR_SCHEMA;
		accion_session::class;

		perfil_opcion_carga::$CONTROLLER;
		perfil_opcion_util::$STR_SCHEMA;
		perfil_opcion_session::class;

		campo_carga::$CONTROLLER;
		campo_util::$STR_SCHEMA;
		campo_session::class;
    }
		
	public function irPagina(int $paginacion_pagina=0){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			$this->intNumeroPaginacionPagina=$paginacion_pagina;
						
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	/*
		interface opcion_controlI {	
		
		public function inicializarParametrosQueryString(mixed $post1=null);
		public function ejecutarParametrosQueryString();	
		public function getBuildControllerResponse();
		
		public function loadIndex();	
		public function indexRecargarRelacionado();	
		public function recargarInformacionAction();
		
		public function buscarPorIdGeneralAction();	
		public function anterioresAction();		
		public function siguientesAction();	
		public function recargarUltimaInformacionAction();	
		public function seleccionarLoteFkAction();
		
		public function nuevoAction();	
		public function actualizarAction();	
		public function eliminarAction();	
		public function cancelarAction();	
		public function guardarCambiosAction();
		
		public function duplicarAction();	
		public function copiarAction();	
		public function nuevoPrepararAction();	
		public function nuevoPrepararPaginaFormAction();	
		public function nuevoPrepararAbrirPaginaFormAction();	
		public function nuevoTablaPrepararAction();
		
		public function seleccionarActualAction();	
		public function seleccionarActualPaginaFormAction();	
		public function seleccionarActualAbrirPaginaFormAction();
		
		public function editarTablaDatosAction();	
		public function eliminarTablaAction();	
		public function quitarElementosTablaAction();
		
		public function generarFpdfAction();	
		public function generarHtmlReporteAction();	
		public function generarHtmlFormReporteAction();	
		public function generarHtmlRelacionesReporteAction();
		
		public function eliminarCascadaAction();
		
		public function recargarReferenciasAction();
		
		public function abrirArbolAction();	
		public function cargarArbolAction();
		
		public function manejarEventosAction();
		public function recargarFormularioGeneralAction();
		
		
		public function mostrarEjecutarAccionesRelacionesAction();
		
		public function generarReporteConPhpExcelAction();	
		public function generarReporteConPhpExcelVerticalAction();	
		public function generarReporteConPhpExcelRelacionesAction();
		
		public function onLoad(opcion_session $opcion_session=null);	
		function index(?string $strTypeOnLoadopcion='',?string $strTipoPaginaAuxiliaropcion='',?string $strTipoUsuarioAuxiliaropcion='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
		public function seleccionar();	
		public function seleccionarActual(int $id = null);
		
		
		public function nuevoPreparar();	
		public function copiar();	
		public function duplicar();	
		public function guardarCambios();	
		public function nuevoTablaPreparar();	
		public function editarTablaDatos();	
		function guardarCambiosTablas();
		
		function eliminarCascadas();
			
		public function eliminarCascada();
		
		public function cancelarAccionesRelaciones();	
		public function recargarInformacion();	
		public function search(string $strTypeOnLoadopcion='',string $strTipoPaginaAuxiliaropcion='',string $strTipoUsuarioAuxiliaropcion='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($opcionReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(opcion $opcionClase);
		
		public function abrirArbol();	
		public function cargarArbol();
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(opcion_session $opcion_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(opcion_session $opcion_session);	
		public function opcionsControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setopcionFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
