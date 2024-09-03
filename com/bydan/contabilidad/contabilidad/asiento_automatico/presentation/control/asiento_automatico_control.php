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

namespace com\bydan\contabilidad\contabilidad\asiento_automatico\presentation\control;

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

use com\bydan\contabilidad\contabilidad\asiento_automatico\business\entity\asiento_automatico;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/asiento_automatico/util/asiento_automatico_carga.php');
use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_carga;

use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_util;
use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_param_return;
use com\bydan\contabilidad\contabilidad\asiento_automatico\business\logic\asiento_automatico_logic;
use com\bydan\contabilidad\contabilidad\asiento_automatico\presentation\session\asiento_automatico_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\modulo\business\logic\modulo_logic;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;

use com\bydan\contabilidad\contabilidad\fuente\business\entity\fuente;
use com\bydan\contabilidad\contabilidad\fuente\business\logic\fuente_logic;
use com\bydan\contabilidad\contabilidad\fuente\util\fuente_carga;
use com\bydan\contabilidad\contabilidad\fuente\util\fuente_util;

use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\logic\libro_auxiliar_logic;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_carga;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_util;

use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;
use com\bydan\contabilidad\contabilidad\centro_costo\business\logic\centro_costo_logic;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_carga;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_util;

//REL


use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_util;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\presentation\session\asiento_automatico_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
asiento_automatico_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
asiento_automatico_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
asiento_automatico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
asiento_automatico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*asiento_automatico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/contabilidad/asiento_automatico/presentation/control/asiento_automatico_init_control.php');
use com\bydan\contabilidad\contabilidad\asiento_automatico\presentation\control\asiento_automatico_init_control;

include_once('com/bydan/contabilidad/contabilidad/asiento_automatico/presentation/control/asiento_automatico_base_control.php');
use com\bydan\contabilidad\contabilidad\asiento_automatico\presentation\control\asiento_automatico_base_control;

class asiento_automatico_control extends asiento_automatico_base_control {	
	
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
					
					
				if($this->data['activo']==null) {$this->data['activo']=false;} else {if($this->data['activo']=='on') {$this->data['activo']=true;}}
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
			else if($action=='registrarSesionParaasiento_automatico_detalles' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idasiento_automaticoActual=$this->getDataId();
				$this->registrarSesionParaasiento_automatico_detalles($idasiento_automaticoActual);
			} 
			
			
			else if($action=="FK_Idcentro_costo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcentro_costoParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idfuente"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdfuenteParaProcesar();
			}
			else if($action=="FK_Idlibro_auxiliar"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idlibro_auxiliarParaProcesar();
			}
			else if($action=="FK_Idmodulo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdmoduloParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idasiento_automaticoActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idasiento_automaticoActual
			}
			else if($action=='abrirBusquedaParamodulo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idasiento_automaticoActual=$this->getDataId();
				$this->abrirBusquedaParamodulo();//$idasiento_automaticoActual
			}
			else if($action=='abrirBusquedaParafuente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idasiento_automaticoActual=$this->getDataId();
				$this->abrirBusquedaParafuente();//$idasiento_automaticoActual
			}
			else if($action=='abrirBusquedaParalibro_auxiliar') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idasiento_automaticoActual=$this->getDataId();
				$this->abrirBusquedaParalibro_auxiliar();//$idasiento_automaticoActual
			}
			else if($action=='abrirBusquedaParacentro_costo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idasiento_automaticoActual=$this->getDataId();
				$this->abrirBusquedaParacentro_costo();//$idasiento_automaticoActual
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
					
					$asiento_automaticoController = new asiento_automatico_control();
					
					$asiento_automaticoController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($asiento_automaticoController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$asiento_automaticoController = new asiento_automatico_control();
						$asiento_automaticoController = $this;
						
						$jsonResponse = json_encode($asiento_automaticoController->asiento_automaticos);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->asiento_automaticoReturnGeneral==null) {
					$this->asiento_automaticoReturnGeneral=new asiento_automatico_param_return();
				}
				
				echo($this->asiento_automaticoReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$asiento_automaticoController=new asiento_automatico_control();
		
		$asiento_automaticoController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$asiento_automaticoController->usuarioActual=new usuario();
		
		$asiento_automaticoController->usuarioActual->setId($this->usuarioActual->getId());
		$asiento_automaticoController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$asiento_automaticoController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$asiento_automaticoController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$asiento_automaticoController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$asiento_automaticoController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$asiento_automaticoController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$asiento_automaticoController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $asiento_automaticoController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadasiento_automatico= $this->getDataGeneralString('strTypeOnLoadasiento_automatico');
		$strTipoPaginaAuxiliarasiento_automatico= $this->getDataGeneralString('strTipoPaginaAuxiliarasiento_automatico');
		$strTipoUsuarioAuxiliarasiento_automatico= $this->getDataGeneralString('strTipoUsuarioAuxiliarasiento_automatico');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadasiento_automatico,$strTipoPaginaAuxiliarasiento_automatico,$strTipoUsuarioAuxiliarasiento_automatico,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadasiento_automatico!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('asiento_automatico','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_automatico_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarasiento_automatico,$this->strTipoUsuarioAuxiliarasiento_automatico,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_automatico_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarasiento_automatico,$this->strTipoUsuarioAuxiliarasiento_automatico,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->asiento_automaticoReturnGeneral=new asiento_automatico_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->asiento_automaticoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->asiento_automaticoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->asiento_automaticoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->asiento_automaticoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->asiento_automaticoReturnGeneral);
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
		$this->asiento_automaticoReturnGeneral=new asiento_automatico_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->asiento_automaticoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->asiento_automaticoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->asiento_automaticoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->asiento_automaticoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->asiento_automaticoReturnGeneral);
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
		$this->asiento_automaticoReturnGeneral=new asiento_automatico_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->asiento_automaticoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->asiento_automaticoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->asiento_automaticoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->asiento_automaticoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->asiento_automaticoReturnGeneral);
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
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
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
			
			
			$this->asiento_automaticoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->asiento_automaticoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->asiento_automaticoReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->asiento_automaticoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->asiento_automaticoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->asiento_automaticoReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->asiento_automaticoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->asiento_automaticoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->asiento_automaticoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->asiento_automaticoReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->asiento_automaticoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->asiento_automaticoReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->asiento_automaticoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->asiento_automaticoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->asiento_automaticoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->asiento_automaticoReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->asiento_automaticoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->asiento_automaticoReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
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
		
		$this->asiento_automaticoLogic=new asiento_automatico_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->asiento_automatico=new asiento_automatico();
		
		$this->strTypeOnLoadasiento_automatico='onload';
		$this->strTipoPaginaAuxiliarasiento_automatico='none';
		$this->strTipoUsuarioAuxiliarasiento_automatico='none';	

		$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;
		
		$this->asiento_automaticoModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->asiento_automaticoControllerAdditional=new asiento_automatico_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(asiento_automatico_session $asiento_automatico_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($asiento_automatico_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadasiento_automatico='',?string $strTipoPaginaAuxiliarasiento_automatico='',?string $strTipoUsuarioAuxiliarasiento_automatico='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadasiento_automatico=$strTypeOnLoadasiento_automatico;
			$this->strTipoPaginaAuxiliarasiento_automatico=$strTipoPaginaAuxiliarasiento_automatico;
			$this->strTipoUsuarioAuxiliarasiento_automatico=$strTipoUsuarioAuxiliarasiento_automatico;
	
			if($strTipoUsuarioAuxiliarasiento_automatico=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->asiento_automatico=new asiento_automatico();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Asiento Automaticos';
			
			
			$asiento_automatico_session=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME));
							
			if($asiento_automatico_session==null) {
				$asiento_automatico_session=new asiento_automatico_session();
				
				/*$this->Session->write('asiento_automatico_session',$asiento_automatico_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($asiento_automatico_session->strFuncionJsPadre!=null && $asiento_automatico_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$asiento_automatico_session->strFuncionJsPadre;
				
				$asiento_automatico_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($asiento_automatico_session);
			
			if($strTypeOnLoadasiento_automatico!=null && $strTypeOnLoadasiento_automatico=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$asiento_automatico_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$asiento_automatico_session->setPaginaPopupVariables(true);
				}
				
				if($asiento_automatico_session->intNumeroPaginacion==asiento_automatico_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_automatico_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,asiento_automatico_util::$STR_SESSION_NAME,'contabilidad');																
			
			} else if($strTypeOnLoadasiento_automatico!=null && $strTypeOnLoadasiento_automatico=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$asiento_automatico_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;*/
				
				if($asiento_automatico_session->intNumeroPaginacion==asiento_automatico_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_automatico_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarasiento_automatico!=null && $strTipoPaginaAuxiliarasiento_automatico=='none') {
				/*$asiento_automatico_session->strStyleDivHeader='display:table-row';*/
				
				/*$asiento_automatico_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarasiento_automatico!=null && $strTipoPaginaAuxiliarasiento_automatico=='iframe') {
					/*
					$asiento_automatico_session->strStyleDivArbol='display:none';
					$asiento_automatico_session->strStyleDivHeader='display:none';
					$asiento_automatico_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$asiento_automatico_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->asiento_automaticoClase=new asiento_automatico();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=asiento_automatico_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(asiento_automatico_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->asiento_automaticoLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->asiento_automaticoLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$asientoautomaticodetalleLogic=new asiento_automatico_detalle_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->asiento_automaticoLogic=new asiento_automatico_logic();*/
			
			
			$this->asiento_automaticosModel=null;
			/*new ListDataModel();*/
			
			/*$this->asiento_automaticosModel.setWrappedData(asiento_automaticoLogic->getasiento_automaticos());*/
						
			$this->asiento_automaticos= array();
			$this->asiento_automaticosEliminados=array();
			$this->asiento_automaticosSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= asiento_automatico_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= asiento_automatico_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->asiento_automatico= new asiento_automatico();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idcentro_costo='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idfuente='display:table-row';
			$this->strVisibleFK_Idlibro_auxiliar='display:table-row';
			$this->strVisibleFK_Idmodulo='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarasiento_automatico!=null && $strTipoUsuarioAuxiliarasiento_automatico!='none' && $strTipoUsuarioAuxiliarasiento_automatico!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarasiento_automatico);
																
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
				if($strTipoUsuarioAuxiliarasiento_automatico!=null && $strTipoUsuarioAuxiliarasiento_automatico!='none' && $strTipoUsuarioAuxiliarasiento_automatico!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarasiento_automatico);
																
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
				if($strTipoUsuarioAuxiliarasiento_automatico==null || $strTipoUsuarioAuxiliarasiento_automatico=='none' || $strTipoUsuarioAuxiliarasiento_automatico=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarasiento_automatico,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, asiento_automatico_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, asiento_automatico_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina asiento_automatico');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($asiento_automatico_session);
			
			$this->getSetBusquedasSesionConfig($asiento_automatico_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteasiento_automaticos($this->strAccionBusqueda,$this->asiento_automaticoLogic->getasiento_automaticos());*/
				} else if($this->strGenerarReporte=='Html')	{
					$asiento_automatico_session->strServletGenerarHtmlReporte='asiento_automaticoServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(asiento_automatico_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(asiento_automatico_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($asiento_automatico_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$asiento_automatico_session=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarasiento_automatico!=null && $strTipoUsuarioAuxiliarasiento_automatico=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($asiento_automatico_session);
			}
								
			$this->set(asiento_automatico_util::$STR_SESSION_NAME, $asiento_automatico_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($asiento_automatico_session);
			
			/*
			$this->asiento_automatico->recursive = 0;
			
			$this->asiento_automaticos=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('asiento_automaticos', $this->asiento_automaticos);
			
			$this->set(asiento_automatico_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->asiento_automaticoActual =$this->asiento_automaticoClase;
			
			/*$this->asiento_automaticoActual =$this->migrarModelasiento_automatico($this->asiento_automaticoClase);*/
			
			$this->returnHtml(false);
			
			$this->set(asiento_automatico_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=asiento_automatico_util::$STR_NOMBRE_OPCION;
				
			if(asiento_automatico_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=asiento_automatico_util::$STR_MODULO_OPCION.asiento_automatico_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(asiento_automatico_util::$STR_SESSION_NAME,serialize($asiento_automatico_session));
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
			/*$asiento_automaticoClase= (asiento_automatico) asiento_automaticosModel.getRowData();*/
			
			$this->asiento_automaticoClase->setId($this->asiento_automatico->getId());	
			$this->asiento_automaticoClase->setVersionRow($this->asiento_automatico->getVersionRow());	
			$this->asiento_automaticoClase->setVersionRow($this->asiento_automatico->getVersionRow());	
			$this->asiento_automaticoClase->setid_empresa($this->asiento_automatico->getid_empresa());	
			$this->asiento_automaticoClase->setid_modulo($this->asiento_automatico->getid_modulo());	
			$this->asiento_automaticoClase->setcodigo($this->asiento_automatico->getcodigo());	
			$this->asiento_automaticoClase->setnombre($this->asiento_automatico->getnombre());	
			$this->asiento_automaticoClase->setid_fuente($this->asiento_automatico->getid_fuente());	
			$this->asiento_automaticoClase->setid_libro_auxiliar($this->asiento_automatico->getid_libro_auxiliar());	
			$this->asiento_automaticoClase->setid_centro_costo($this->asiento_automatico->getid_centro_costo());	
			$this->asiento_automaticoClase->setdescripcion($this->asiento_automatico->getdescripcion());	
			$this->asiento_automaticoClase->setactivo($this->asiento_automatico->getactivo());	
			$this->asiento_automaticoClase->setasignada($this->asiento_automatico->getasignada());	
		
			/*$this->Session->write('asiento_automaticoVersionRowActual', asiento_automatico.getVersionRow());*/
			
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
			
			$asiento_automatico_session=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME));
						
			if($asiento_automatico_session==null) {
				$asiento_automatico_session=new asiento_automatico_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('asiento_automatico', $this->asiento_automatico->read(null, $id));
	
			
			$this->asiento_automatico->recursive = 0;
			
			$this->asiento_automaticos=$this->paginate();
			
			$this->set('asiento_automaticos', $this->asiento_automaticos);
	
			if (empty($this->data)) {
				$this->data = $this->asiento_automatico->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->asiento_automaticoLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->asiento_automaticoClase);
			
			$this->asiento_automaticoActual=$this->asiento_automaticoClase;
			
			/*$this->asiento_automaticoActual =$this->migrarModelasiento_automatico($this->asiento_automaticoClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->asiento_automaticoLogic->getasiento_automaticos(),$this->asiento_automaticoActual);
			
			$this->actualizarControllerConReturnGeneral($this->asiento_automaticoReturnGeneral);
			
			//$this->asiento_automaticoReturnGeneral=$this->asiento_automaticoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->asiento_automaticoLogic->getasiento_automaticos(),$this->asiento_automaticoActual,$this->asiento_automaticoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$asiento_automatico_session=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME));
						
			if($asiento_automatico_session==null) {
				$asiento_automatico_session=new asiento_automatico_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoasiento_automatico', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->asiento_automaticoClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->asiento_automaticoClase);
			
			$this->asiento_automaticoActual =$this->asiento_automaticoClase;
			
			/*$this->asiento_automaticoActual =$this->migrarModelasiento_automatico($this->asiento_automaticoClase);*/
			
			$this->setasiento_automaticoFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->asiento_automaticoLogic->getasiento_automaticos(),$this->asiento_automatico);
			
			$this->actualizarControllerConReturnGeneral($this->asiento_automaticoReturnGeneral);
			
			//this->asiento_automaticoReturnGeneral=$this->asiento_automaticoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->asiento_automaticoLogic->getasiento_automaticos(),$this->asiento_automatico,$this->asiento_automaticoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->asiento_automaticoReturnGeneral->getasiento_automatico()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idmoduloDefaultFK!=null && $this->idmoduloDefaultFK > -1) {
				$this->asiento_automaticoReturnGeneral->getasiento_automatico()->setid_modulo($this->idmoduloDefaultFK);
			}

			if($this->idfuenteDefaultFK!=null && $this->idfuenteDefaultFK > -1) {
				$this->asiento_automaticoReturnGeneral->getasiento_automatico()->setid_fuente($this->idfuenteDefaultFK);
			}

			if($this->idlibro_auxiliarDefaultFK!=null && $this->idlibro_auxiliarDefaultFK > -1) {
				$this->asiento_automaticoReturnGeneral->getasiento_automatico()->setid_libro_auxiliar($this->idlibro_auxiliarDefaultFK);
			}

			if($this->idcentro_costoDefaultFK!=null && $this->idcentro_costoDefaultFK > -1) {
				$this->asiento_automaticoReturnGeneral->getasiento_automatico()->setid_centro_costo($this->idcentro_costoDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->asiento_automaticoReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->asiento_automaticoReturnGeneral->getasiento_automatico(),$this->asiento_automaticoActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyasiento_automatico($this->asiento_automaticoReturnGeneral->getasiento_automatico());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioasiento_automatico($this->asiento_automaticoReturnGeneral->getasiento_automatico());*/
			}
			
			if($this->asiento_automaticoReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->asiento_automaticoReturnGeneral->getasiento_automatico(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualasiento_automatico($this->asiento_automatico,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->asiento_automaticosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->asiento_automaticosAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->asiento_automaticosAuxiliar=array();
			}
			
			if(count($this->asiento_automaticosAuxiliar)==2) {
				$asiento_automaticoOrigen=$this->asiento_automaticosAuxiliar[0];
				$asiento_automaticoDestino=$this->asiento_automaticosAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($asiento_automaticoOrigen,$asiento_automaticoDestino,true,false,false);
				
				$this->actualizarLista($asiento_automaticoDestino,$this->asiento_automaticos);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->asiento_automaticosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->asiento_automaticosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->asiento_automaticosAuxiliar=array();
			}
			
			if(count($this->asiento_automaticosAuxiliar) > 0) {
				foreach ($this->asiento_automaticosAuxiliar as $asiento_automaticoSeleccionado) {
					$this->asiento_automatico=new asiento_automatico();
					
					$this->setCopiarVariablesObjetos($asiento_automaticoSeleccionado,$this->asiento_automatico,true,true,false);
						
					$this->asiento_automaticos[]=$this->asiento_automatico;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->asiento_automaticosEliminados as $asiento_automaticoEliminado) {
				$this->asiento_automaticoLogic->asiento_automaticos[]=$asiento_automaticoEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->asiento_automatico=new asiento_automatico();
							
				$this->asiento_automaticos[]=$this->asiento_automatico;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
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
		
		$asiento_automaticoActual=new asiento_automatico();
		
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
				
				$asiento_automaticoActual=$this->asiento_automaticos[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $asiento_automaticoActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $asiento_automaticoActual->setid_modulo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $asiento_automaticoActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $asiento_automaticoActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $asiento_automaticoActual->setid_fuente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $asiento_automaticoActual->setid_libro_auxiliar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $asiento_automaticoActual->setid_centro_costo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $asiento_automaticoActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $asiento_automaticoActual->setactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_11')));  } else { $asiento_automaticoActual->setactivo(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $asiento_automaticoActual->setasignada($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->asiento_automaticosAuxiliar=array();		 
		/*$this->asiento_automaticosEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->asiento_automaticosAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->asiento_automaticosAuxiliar=array();
		}
			
		if(count($this->asiento_automaticosAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->asiento_automaticosAuxiliar as $asiento_automaticoAuxLocal) {				
				
				foreach($this->asiento_automaticos as $asiento_automaticoLocal) {
					if($asiento_automaticoLocal->getId()==$asiento_automaticoAuxLocal->getId()) {
						$asiento_automaticoLocal->setIsDeleted(true);
						
						/*$this->asiento_automaticosEliminados[]=$asiento_automaticoLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->asiento_automaticoLogic->setasiento_automaticos($this->asiento_automaticos);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
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
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadasiento_automatico='',string $strTipoPaginaAuxiliarasiento_automatico='',string $strTipoUsuarioAuxiliarasiento_automatico='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadasiento_automatico,$strTipoPaginaAuxiliarasiento_automatico,$strTipoUsuarioAuxiliarasiento_automatico,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->asiento_automaticos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=asiento_automatico_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=asiento_automatico_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=asiento_automatico_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$asiento_automatico_session=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME));
						
			if($asiento_automatico_session==null) {
				$asiento_automatico_session=new asiento_automatico_session();
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
					/*$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;*/
					
					if($asiento_automatico_session->intNumeroPaginacion==asiento_automatico_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$asiento_automatico_session->intNumeroPaginacion;
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
			
			$this->asiento_automaticosEliminados=array();
			
			/*$this->asiento_automaticoLogic->setConnexion($connexion);*/
			
			$this->asiento_automaticoLogic->setIsConDeep(true);
			
			$this->asiento_automaticoLogic->getasiento_automaticoDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('modulo');$classes[]=$class;
			$class=new Classe('fuente');$classes[]=$class;
			$class=new Classe('libro_auxiliar');$classes[]=$class;
			$class=new Classe('centro_costo');$classes[]=$class;
			
			$this->asiento_automaticoLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->asiento_automaticoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->asiento_automaticoLogic->getasiento_automaticos()==null|| count($this->asiento_automaticoLogic->getasiento_automaticos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->asiento_automaticos=$this->asiento_automaticoLogic->getasiento_automaticos();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->asiento_automaticoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->asiento_automaticosReporte=$this->asiento_automaticoLogic->getasiento_automaticos();
									
						/*$this->generarReportes('Todos',$this->asiento_automaticoLogic->getasiento_automaticos());*/
					
						$this->asiento_automaticoLogic->setasiento_automaticos($this->asiento_automaticos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->asiento_automaticoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->asiento_automaticoLogic->getasiento_automaticos()==null|| count($this->asiento_automaticoLogic->getasiento_automaticos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->asiento_automaticos=$this->asiento_automaticoLogic->getasiento_automaticos();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->asiento_automaticoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->asiento_automaticosReporte=$this->asiento_automaticoLogic->getasiento_automaticos();
									
						/*$this->generarReportes('Todos',$this->asiento_automaticoLogic->getasiento_automaticos());*/
					
						$this->asiento_automaticoLogic->setasiento_automaticos($this->asiento_automaticos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idasiento_automatico=0;*/
				
				if($asiento_automatico_session->bitBusquedaDesdeFKSesionFK!=null && $asiento_automatico_session->bitBusquedaDesdeFKSesionFK==true) {
					if($asiento_automatico_session->bigIdActualFK!=null && $asiento_automatico_session->bigIdActualFK!=0)	{
						$this->idasiento_automatico=$asiento_automatico_session->bigIdActualFK;	
					}
					
					$asiento_automatico_session->bitBusquedaDesdeFKSesionFK=false;
					
					$asiento_automatico_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idasiento_automatico=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idasiento_automatico=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->asiento_automaticoLogic->getEntity($this->idasiento_automatico);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*asiento_automaticoLogicAdditional::getDetalleIndicePorId($idasiento_automatico);*/

				
				if($this->asiento_automaticoLogic->getasiento_automatico()!=null) {
					$this->asiento_automaticoLogic->setasiento_automaticos(array());
					$this->asiento_automaticoLogic->asiento_automaticos[]=$this->asiento_automaticoLogic->getasiento_automatico();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idcentro_costo')
			{

				if($asiento_automatico_session->bigidcentro_costoActual!=null && $asiento_automatico_session->bigidcentro_costoActual!=0)
				{
					$this->id_centro_costoFK_Idcentro_costo=$asiento_automatico_session->bigidcentro_costoActual;
					$asiento_automatico_session->bigidcentro_costoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_automaticoLogic->getsFK_Idcentro_costo($finalQueryPaginacion,$this->pagination,$this->id_centro_costoFK_Idcentro_costo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//asiento_automaticoLogicAdditional::getDetalleIndiceFK_Idcentro_costo($this->id_centro_costoFK_Idcentro_costo);


					if($this->asiento_automaticoLogic->getasiento_automaticos()==null || count($this->asiento_automaticoLogic->getasiento_automaticos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$asiento_automaticos=$this->asiento_automaticoLogic->getasiento_automaticos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_automaticoLogic->getsFK_Idcentro_costo('',$this->pagination,$this->id_centro_costoFK_Idcentro_costo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->asiento_automaticosReporte=$this->asiento_automaticoLogic->getasiento_automaticos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteasiento_automaticos("FK_Idcentro_costo",$this->asiento_automaticoLogic->getasiento_automaticos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->asiento_automaticoLogic->setasiento_automaticos($asiento_automaticos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($asiento_automatico_session->bigidempresaActual!=null && $asiento_automatico_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$asiento_automatico_session->bigidempresaActual;
					$asiento_automatico_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_automaticoLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//asiento_automaticoLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->asiento_automaticoLogic->getasiento_automaticos()==null || count($this->asiento_automaticoLogic->getasiento_automaticos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$asiento_automaticos=$this->asiento_automaticoLogic->getasiento_automaticos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_automaticoLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->asiento_automaticosReporte=$this->asiento_automaticoLogic->getasiento_automaticos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteasiento_automaticos("FK_Idempresa",$this->asiento_automaticoLogic->getasiento_automaticos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->asiento_automaticoLogic->setasiento_automaticos($asiento_automaticos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idfuente')
			{

				if($asiento_automatico_session->bigidfuenteActual!=null && $asiento_automatico_session->bigidfuenteActual!=0)
				{
					$this->id_fuenteFK_Idfuente=$asiento_automatico_session->bigidfuenteActual;
					$asiento_automatico_session->bigidfuenteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_automaticoLogic->getsFK_Idfuente($finalQueryPaginacion,$this->pagination,$this->id_fuenteFK_Idfuente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//asiento_automaticoLogicAdditional::getDetalleIndiceFK_Idfuente($this->id_fuenteFK_Idfuente);


					if($this->asiento_automaticoLogic->getasiento_automaticos()==null || count($this->asiento_automaticoLogic->getasiento_automaticos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$asiento_automaticos=$this->asiento_automaticoLogic->getasiento_automaticos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_automaticoLogic->getsFK_Idfuente('',$this->pagination,$this->id_fuenteFK_Idfuente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->asiento_automaticosReporte=$this->asiento_automaticoLogic->getasiento_automaticos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteasiento_automaticos("FK_Idfuente",$this->asiento_automaticoLogic->getasiento_automaticos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->asiento_automaticoLogic->setasiento_automaticos($asiento_automaticos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idlibro_auxiliar')
			{

				if($asiento_automatico_session->bigidlibro_auxiliarActual!=null && $asiento_automatico_session->bigidlibro_auxiliarActual!=0)
				{
					$this->id_libro_auxiliarFK_Idlibro_auxiliar=$asiento_automatico_session->bigidlibro_auxiliarActual;
					$asiento_automatico_session->bigidlibro_auxiliarActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_automaticoLogic->getsFK_Idlibro_auxiliar($finalQueryPaginacion,$this->pagination,$this->id_libro_auxiliarFK_Idlibro_auxiliar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//asiento_automaticoLogicAdditional::getDetalleIndiceFK_Idlibro_auxiliar($this->id_libro_auxiliarFK_Idlibro_auxiliar);


					if($this->asiento_automaticoLogic->getasiento_automaticos()==null || count($this->asiento_automaticoLogic->getasiento_automaticos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$asiento_automaticos=$this->asiento_automaticoLogic->getasiento_automaticos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_automaticoLogic->getsFK_Idlibro_auxiliar('',$this->pagination,$this->id_libro_auxiliarFK_Idlibro_auxiliar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->asiento_automaticosReporte=$this->asiento_automaticoLogic->getasiento_automaticos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteasiento_automaticos("FK_Idlibro_auxiliar",$this->asiento_automaticoLogic->getasiento_automaticos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->asiento_automaticoLogic->setasiento_automaticos($asiento_automaticos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idmodulo')
			{

				if($asiento_automatico_session->bigidmoduloActual!=null && $asiento_automatico_session->bigidmoduloActual!=0)
				{
					$this->id_moduloFK_Idmodulo=$asiento_automatico_session->bigidmoduloActual;
					$asiento_automatico_session->bigidmoduloActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_automaticoLogic->getsFK_Idmodulo($finalQueryPaginacion,$this->pagination,$this->id_moduloFK_Idmodulo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//asiento_automaticoLogicAdditional::getDetalleIndiceFK_Idmodulo($this->id_moduloFK_Idmodulo);


					if($this->asiento_automaticoLogic->getasiento_automaticos()==null || count($this->asiento_automaticoLogic->getasiento_automaticos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$asiento_automaticos=$this->asiento_automaticoLogic->getasiento_automaticos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_automaticoLogic->getsFK_Idmodulo('',$this->pagination,$this->id_moduloFK_Idmodulo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->asiento_automaticosReporte=$this->asiento_automaticoLogic->getasiento_automaticos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteasiento_automaticos("FK_Idmodulo",$this->asiento_automaticoLogic->getasiento_automaticos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->asiento_automaticoLogic->setasiento_automaticos($asiento_automaticos);
					}
				//}

			} 
		
		$asiento_automatico_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$asiento_automatico_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->asiento_automaticoLogic->loadForeignsKeysDescription();*/
		
		$this->asiento_automaticos=$this->asiento_automaticoLogic->getasiento_automaticos();
		
		if($this->asiento_automaticosEliminados==null) {
			$this->asiento_automaticosEliminados=array();
		}
		
		$this->Session->write(asiento_automatico_util::$STR_SESSION_NAME.'Lista',serialize($this->asiento_automaticos));
		$this->Session->write(asiento_automatico_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->asiento_automaticosEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(asiento_automatico_util::$STR_SESSION_NAME,serialize($asiento_automatico_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idasiento_automatico=$idGeneral;
			
			$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
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
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
			}

			if(count($this->asiento_automaticos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_Idcentro_costoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_centro_costoFK_Idcentro_costo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcentro_costo','cmbid_centro_costo');

			$this->strAccionBusqueda='FK_Idcentro_costo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdempresaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdfuenteParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_fuenteFK_Idfuente=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idfuente','cmbid_fuente');

			$this->strAccionBusqueda='FK_Idfuente';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idlibro_auxiliarParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_libro_auxiliarFK_Idlibro_auxiliar=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idlibro_auxiliar','cmbid_libro_auxiliar');

			$this->strAccionBusqueda='FK_Idlibro_auxiliar';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
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
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_moduloFK_Idmodulo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idmodulo','cmbid_modulo');

			$this->strAccionBusqueda='FK_Idmodulo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idcentro_costo($strFinalQuery,$id_centro_costo)
	{
		try
		{

			$this->asiento_automaticoLogic->getsFK_Idcentro_costo($strFinalQuery,new Pagination(),$id_centro_costo);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idempresa($strFinalQuery,$id_empresa)
	{
		try
		{

			$this->asiento_automaticoLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idfuente($strFinalQuery,$id_fuente)
	{
		try
		{

			$this->asiento_automaticoLogic->getsFK_Idfuente($strFinalQuery,new Pagination(),$id_fuente);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idlibro_auxiliar($strFinalQuery,$id_libro_auxiliar)
	{
		try
		{

			$this->asiento_automaticoLogic->getsFK_Idlibro_auxiliar($strFinalQuery,new Pagination(),$id_libro_auxiliar);
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

			$this->asiento_automaticoLogic->getsFK_Idmodulo($strFinalQuery,new Pagination(),$id_modulo);
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
			
			
			$asiento_automaticoForeignKey=new asiento_automatico_param_return(); //asiento_automaticoForeignKey();
			
			$asiento_automatico_session=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME));
						
			if($asiento_automatico_session==null) {
				$asiento_automatico_session=new asiento_automatico_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$asiento_automaticoForeignKey=$this->asiento_automaticoLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$asiento_automatico_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$asiento_automaticoForeignKey->empresasFK;
				$this->idempresaDefaultFK=$asiento_automaticoForeignKey->idempresaDefaultFK;
			}

			if($asiento_automatico_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_modulo',$this->strRecargarFkTipos,',')) {
				$this->modulosFK=$asiento_automaticoForeignKey->modulosFK;
				$this->idmoduloDefaultFK=$asiento_automaticoForeignKey->idmoduloDefaultFK;
			}

			if($asiento_automatico_session->bitBusquedaDesdeFKSesionmodulo) {
				$this->setVisibleBusquedasParamodulo(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_fuente',$this->strRecargarFkTipos,',')) {
				$this->fuentesFK=$asiento_automaticoForeignKey->fuentesFK;
				$this->idfuenteDefaultFK=$asiento_automaticoForeignKey->idfuenteDefaultFK;
			}

			if($asiento_automatico_session->bitBusquedaDesdeFKSesionfuente) {
				$this->setVisibleBusquedasParafuente(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_libro_auxiliar',$this->strRecargarFkTipos,',')) {
				$this->libro_auxiliarsFK=$asiento_automaticoForeignKey->libro_auxiliarsFK;
				$this->idlibro_auxiliarDefaultFK=$asiento_automaticoForeignKey->idlibro_auxiliarDefaultFK;
			}

			if($asiento_automatico_session->bitBusquedaDesdeFKSesionlibro_auxiliar) {
				$this->setVisibleBusquedasParalibro_auxiliar(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_centro_costo',$this->strRecargarFkTipos,',')) {
				$this->centro_costosFK=$asiento_automaticoForeignKey->centro_costosFK;
				$this->idcentro_costoDefaultFK=$asiento_automaticoForeignKey->idcentro_costoDefaultFK;
			}

			if($asiento_automatico_session->bitBusquedaDesdeFKSesioncentro_costo) {
				$this->setVisibleBusquedasParacentro_costo(true);
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
	
	function cargarCombosFKFromReturnGeneral($asiento_automaticoReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$asiento_automaticoReturnGeneral->strRecargarFkTipos;
			
			


			if($asiento_automaticoReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$asiento_automaticoReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$asiento_automaticoReturnGeneral->idempresaDefaultFK;
			}


			if($asiento_automaticoReturnGeneral->con_modulosFK==true) {
				$this->modulosFK=$asiento_automaticoReturnGeneral->modulosFK;
				$this->idmoduloDefaultFK=$asiento_automaticoReturnGeneral->idmoduloDefaultFK;
			}


			if($asiento_automaticoReturnGeneral->con_fuentesFK==true) {
				$this->fuentesFK=$asiento_automaticoReturnGeneral->fuentesFK;
				$this->idfuenteDefaultFK=$asiento_automaticoReturnGeneral->idfuenteDefaultFK;
			}


			if($asiento_automaticoReturnGeneral->con_libro_auxiliarsFK==true) {
				$this->libro_auxiliarsFK=$asiento_automaticoReturnGeneral->libro_auxiliarsFK;
				$this->idlibro_auxiliarDefaultFK=$asiento_automaticoReturnGeneral->idlibro_auxiliarDefaultFK;
			}


			if($asiento_automaticoReturnGeneral->con_centro_costosFK==true) {
				$this->centro_costosFK=$asiento_automaticoReturnGeneral->centro_costosFK;
				$this->idcentro_costoDefaultFK=$asiento_automaticoReturnGeneral->idcentro_costoDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(asiento_automatico_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$asiento_automatico_session=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME));
		
		if($asiento_automatico_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($asiento_automatico_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($asiento_automatico_session->getstrNombrePaginaNavegacionHaciaFKDesde()==modulo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='modulo';
			}
			else if($asiento_automatico_session->getstrNombrePaginaNavegacionHaciaFKDesde()==fuente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='fuente';
			}
			else if($asiento_automatico_session->getstrNombrePaginaNavegacionHaciaFKDesde()==libro_auxiliar_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='libro_auxiliar';
			}
			else if($asiento_automatico_session->getstrNombrePaginaNavegacionHaciaFKDesde()==centro_costo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='centro_costo';
			}
			
			$asiento_automatico_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
			}						
			
			$this->asiento_automaticosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->asiento_automaticosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->asiento_automaticosAuxiliar=array();
			}
			
			if(count($this->asiento_automaticosAuxiliar) > 0) {
				
				foreach ($this->asiento_automaticosAuxiliar as $asiento_automaticoSeleccionado) {
					$this->eliminarTablaBase($asiento_automaticoSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('asiento_automatico_detalle');
			$tipoRelacionReporte->setsDescripcion('Detalle s');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=asiento_automatico_detalle_util::$STR_NOMBRE_CLASE;
		
		return $arrNombresClasesRelacionadasLocal;
	}
	
	
	public function setstrRecargarFkInicializar() {
		$this->setstrRecargarFk('TODOS','NINGUNO',0,'');		
	}
	
	
	
	public function getempresasFKListSelectItem() 
	{
		$empresasList=array();

		$item=null;

		foreach($this->empresasFK as $empresa)
		{
			$item=new SelectItem();
			$item->setLabel($empresa->getnombre());
			$item->setValue($empresa->getId());
			$empresasList[]=$item;
		}

		return $empresasList;
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


	public function getfuentesFKListSelectItem() 
	{
		$fuentesList=array();

		$item=null;

		foreach($this->fuentesFK as $fuente)
		{
			$item=new SelectItem();
			$item->setLabel($fuente->getnombre());
			$item->setValue($fuente->getId());
			$fuentesList[]=$item;
		}

		return $fuentesList;
	}


	public function getlibro_auxiliarsFKListSelectItem() 
	{
		$libro_auxiliarsList=array();

		$item=null;

		foreach($this->libro_auxiliarsFK as $libro_auxiliar)
		{
			$item=new SelectItem();
			$item->setLabel($libro_auxiliar->getnombre());
			$item->setValue($libro_auxiliar->getId());
			$libro_auxiliarsList[]=$item;
		}

		return $libro_auxiliarsList;
	}


	public function getcentro_costosFKListSelectItem() 
	{
		$centro_costosList=array();

		$item=null;

		foreach($this->centro_costosFK as $centro_costo)
		{
			$item=new SelectItem();
			$item->setLabel($centro_costo->getnombre());
			$item->setValue($centro_costo->getId());
			$centro_costosList[]=$item;
		}

		return $centro_costosList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;
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
				$this->asiento_automaticoLogic->commitNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->rollbackNewConnexionToDeep();
				$this->asiento_automaticoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$asiento_automaticosNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->asiento_automaticos as $asiento_automaticoLocal) {
				if($asiento_automaticoLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->asiento_automatico=new asiento_automatico();
				
				$this->asiento_automatico->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->asiento_automaticos[]=$this->asiento_automatico;*/
				
				$asiento_automaticosNuevos[]=$this->asiento_automatico;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('modulo');$classes[]=$class;
				$class=new Classe('fuente');$classes[]=$class;
				$class=new Classe('libro_auxiliar');$classes[]=$class;
				$class=new Classe('centro_costo');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automaticoLogic->setasiento_automaticos($asiento_automaticosNuevos);
					
				$this->asiento_automaticoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($asiento_automaticosNuevos as $asiento_automaticoNuevo) {
					$this->asiento_automaticos[]=$asiento_automaticoNuevo;
				}
				
				/*$this->asiento_automaticos[]=$asiento_automaticosNuevos;*/
				
				$this->asiento_automaticoLogic->setasiento_automaticos($this->asiento_automaticos);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($asiento_automaticosNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$asiento_automatico_session=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME));

		if($asiento_automatico_session==null) {
			$asiento_automatico_session=new asiento_automatico_session();
		}
		
		if($asiento_automatico_session->bitBusquedaDesdeFKSesionempresa!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=empresa_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalempresa=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalempresa=Funciones::GetFinalQueryAppend($finalQueryGlobalempresa, '');
				$finalQueryGlobalempresa.=empresa_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalempresa.$strRecargarFkQuery;		

				$empresaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosempresasFK($empresaLogic->getempresas());

		} else {
			$this->setVisibleBusquedasParaempresa(true);


			if($asiento_automatico_session->bigidempresaActual!=null && $asiento_automatico_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($asiento_automatico_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=asiento_automatico_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
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

		$asiento_automatico_session=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME));

		if($asiento_automatico_session==null) {
			$asiento_automatico_session=new asiento_automatico_session();
		}
		
		if($asiento_automatico_session->bitBusquedaDesdeFKSesionmodulo!=true) {
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


			if($asiento_automatico_session->bigidmoduloActual!=null && $asiento_automatico_session->bigidmoduloActual > 0) {
				$moduloLogic->getEntity($asiento_automatico_session->bigidmoduloActual);//WithConnection

				$this->modulosFK[$moduloLogic->getmodulo()->getId()]=asiento_automatico_util::getmoduloDescripcion($moduloLogic->getmodulo());
				$this->idmoduloDefaultFK=$moduloLogic->getmodulo()->getId();
			}
		}
	}

	public function cargarCombosfuentesFK($connexion=null,$strRecargarFkQuery=''){
		$fuenteLogic= new fuente_logic();
		$pagination= new Pagination();
		$this->fuentesFK=array();

		$fuenteLogic->setConnexion($connexion);
		$fuenteLogic->getfuenteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$asiento_automatico_session=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME));

		if($asiento_automatico_session==null) {
			$asiento_automatico_session=new asiento_automatico_session();
		}
		
		if($asiento_automatico_session->bitBusquedaDesdeFKSesionfuente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=fuente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalfuente=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalfuente=Funciones::GetFinalQueryAppend($finalQueryGlobalfuente, '');
				$finalQueryGlobalfuente.=fuente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalfuente.$strRecargarFkQuery;		

				$fuenteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosfuentesFK($fuenteLogic->getfuentes());

		} else {
			$this->setVisibleBusquedasParafuente(true);


			if($asiento_automatico_session->bigidfuenteActual!=null && $asiento_automatico_session->bigidfuenteActual > 0) {
				$fuenteLogic->getEntity($asiento_automatico_session->bigidfuenteActual);//WithConnection

				$this->fuentesFK[$fuenteLogic->getfuente()->getId()]=asiento_automatico_util::getfuenteDescripcion($fuenteLogic->getfuente());
				$this->idfuenteDefaultFK=$fuenteLogic->getfuente()->getId();
			}
		}
	}

	public function cargarComboslibro_auxiliarsFK($connexion=null,$strRecargarFkQuery=''){
		$libro_auxiliarLogic= new libro_auxiliar_logic();
		$pagination= new Pagination();
		$this->libro_auxiliarsFK=array();

		$libro_auxiliarLogic->setConnexion($connexion);
		$libro_auxiliarLogic->getlibro_auxiliarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$asiento_automatico_session=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME));

		if($asiento_automatico_session==null) {
			$asiento_automatico_session=new asiento_automatico_session();
		}
		
		if($asiento_automatico_session->bitBusquedaDesdeFKSesionlibro_auxiliar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=libro_auxiliar_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGloballibro_auxiliar=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGloballibro_auxiliar=Funciones::GetFinalQueryAppend($finalQueryGloballibro_auxiliar, '');
				$finalQueryGloballibro_auxiliar.=libro_auxiliar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGloballibro_auxiliar.$strRecargarFkQuery;		

				$libro_auxiliarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboslibro_auxiliarsFK($libro_auxiliarLogic->getlibro_auxiliars());

		} else {
			$this->setVisibleBusquedasParalibro_auxiliar(true);


			if($asiento_automatico_session->bigidlibro_auxiliarActual!=null && $asiento_automatico_session->bigidlibro_auxiliarActual > 0) {
				$libro_auxiliarLogic->getEntity($asiento_automatico_session->bigidlibro_auxiliarActual);//WithConnection

				$this->libro_auxiliarsFK[$libro_auxiliarLogic->getlibro_auxiliar()->getId()]=asiento_automatico_util::getlibro_auxiliarDescripcion($libro_auxiliarLogic->getlibro_auxiliar());
				$this->idlibro_auxiliarDefaultFK=$libro_auxiliarLogic->getlibro_auxiliar()->getId();
			}
		}
	}

	public function cargarComboscentro_costosFK($connexion=null,$strRecargarFkQuery=''){
		$centro_costoLogic= new centro_costo_logic();
		$pagination= new Pagination();
		$this->centro_costosFK=array();

		$centro_costoLogic->setConnexion($connexion);
		$centro_costoLogic->getcentro_costoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$asiento_automatico_session=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME));

		if($asiento_automatico_session==null) {
			$asiento_automatico_session=new asiento_automatico_session();
		}
		
		if($asiento_automatico_session->bitBusquedaDesdeFKSesioncentro_costo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=centro_costo_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcentro_costo=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcentro_costo=Funciones::GetFinalQueryAppend($finalQueryGlobalcentro_costo, '');
				$finalQueryGlobalcentro_costo.=centro_costo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcentro_costo.$strRecargarFkQuery;		

				$centro_costoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscentro_costosFK($centro_costoLogic->getcentro_costos());

		} else {
			$this->setVisibleBusquedasParacentro_costo(true);


			if($asiento_automatico_session->bigidcentro_costoActual!=null && $asiento_automatico_session->bigidcentro_costoActual > 0) {
				$centro_costoLogic->getEntity($asiento_automatico_session->bigidcentro_costoActual);//WithConnection

				$this->centro_costosFK[$centro_costoLogic->getcentro_costo()->getId()]=asiento_automatico_util::getcentro_costoDescripcion($centro_costoLogic->getcentro_costo());
				$this->idcentro_costoDefaultFK=$centro_costoLogic->getcentro_costo()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=asiento_automatico_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombosmodulosFK($modulos){

		foreach ($modulos as $moduloLocal ) {
			if($this->idmoduloDefaultFK==0) {
				$this->idmoduloDefaultFK=$moduloLocal->getId();
			}

			$this->modulosFK[$moduloLocal->getId()]=asiento_automatico_util::getmoduloDescripcion($moduloLocal);
		}
	}

	public function prepararCombosfuentesFK($fuentes){

		foreach ($fuentes as $fuenteLocal ) {
			if($this->idfuenteDefaultFK==0) {
				$this->idfuenteDefaultFK=$fuenteLocal->getId();
			}

			$this->fuentesFK[$fuenteLocal->getId()]=asiento_automatico_util::getfuenteDescripcion($fuenteLocal);
		}
	}

	public function prepararComboslibro_auxiliarsFK($libro_auxiliars){

		foreach ($libro_auxiliars as $libro_auxiliarLocal ) {
			if($this->idlibro_auxiliarDefaultFK==0) {
				$this->idlibro_auxiliarDefaultFK=$libro_auxiliarLocal->getId();
			}

			$this->libro_auxiliarsFK[$libro_auxiliarLocal->getId()]=asiento_automatico_util::getlibro_auxiliarDescripcion($libro_auxiliarLocal);
		}
	}

	public function prepararComboscentro_costosFK($centro_costos){

		foreach ($centro_costos as $centro_costoLocal ) {
			if($this->idcentro_costoDefaultFK==0) {
				$this->idcentro_costoDefaultFK=$centro_costoLocal->getId();
			}

			$this->centro_costosFK[$centro_costoLocal->getId()]=asiento_automatico_util::getcentro_costoDescripcion($centro_costoLocal);
		}
	}

	
	
	public function cargarDescripcionempresaFK($idempresa,$connexion=null){
		$empresaLogic= new empresa_logic();
		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$strDescripcionempresa='';

		if($idempresa!=null && $idempresa!='' && $idempresa!='null') {
			if($connexion!=null) {
				$empresaLogic->getEntity($idempresa);//WithConnection
			} else {
				$empresaLogic->getEntityWithConnection($idempresa);//
			}

			$strDescripcionempresa=asiento_automatico_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
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

			$strDescripcionmodulo=asiento_automatico_util::getmoduloDescripcion($moduloLogic->getmodulo());

		} else {
			$strDescripcionmodulo='null';
		}

		return $strDescripcionmodulo;
	}

	public function cargarDescripcionfuenteFK($idfuente,$connexion=null){
		$fuenteLogic= new fuente_logic();
		$fuenteLogic->setConnexion($connexion);
		$fuenteLogic->getfuenteDataAccess()->isForFKData=true;
		$strDescripcionfuente='';

		if($idfuente!=null && $idfuente!='' && $idfuente!='null') {
			if($connexion!=null) {
				$fuenteLogic->getEntity($idfuente);//WithConnection
			} else {
				$fuenteLogic->getEntityWithConnection($idfuente);//
			}

			$strDescripcionfuente=asiento_automatico_util::getfuenteDescripcion($fuenteLogic->getfuente());

		} else {
			$strDescripcionfuente='null';
		}

		return $strDescripcionfuente;
	}

	public function cargarDescripcionlibro_auxiliarFK($idlibro_auxiliar,$connexion=null){
		$libro_auxiliarLogic= new libro_auxiliar_logic();
		$libro_auxiliarLogic->setConnexion($connexion);
		$libro_auxiliarLogic->getlibro_auxiliarDataAccess()->isForFKData=true;
		$strDescripcionlibro_auxiliar='';

		if($idlibro_auxiliar!=null && $idlibro_auxiliar!='' && $idlibro_auxiliar!='null') {
			if($connexion!=null) {
				$libro_auxiliarLogic->getEntity($idlibro_auxiliar);//WithConnection
			} else {
				$libro_auxiliarLogic->getEntityWithConnection($idlibro_auxiliar);//
			}

			$strDescripcionlibro_auxiliar=asiento_automatico_util::getlibro_auxiliarDescripcion($libro_auxiliarLogic->getlibro_auxiliar());

		} else {
			$strDescripcionlibro_auxiliar='null';
		}

		return $strDescripcionlibro_auxiliar;
	}

	public function cargarDescripcioncentro_costoFK($idcentro_costo,$connexion=null){
		$centro_costoLogic= new centro_costo_logic();
		$centro_costoLogic->setConnexion($connexion);
		$centro_costoLogic->getcentro_costoDataAccess()->isForFKData=true;
		$strDescripcioncentro_costo='';

		if($idcentro_costo!=null && $idcentro_costo!='' && $idcentro_costo!='null') {
			if($connexion!=null) {
				$centro_costoLogic->getEntity($idcentro_costo);//WithConnection
			} else {
				$centro_costoLogic->getEntityWithConnection($idcentro_costo);//
			}

			$strDescripcioncentro_costo=asiento_automatico_util::getcentro_costoDescripcion($centro_costoLogic->getcentro_costo());

		} else {
			$strDescripcioncentro_costo='null';
		}

		return $strDescripcioncentro_costo;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(asiento_automatico $asiento_automaticoClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$asiento_automaticoClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParaempresa($isParaempresa){
		$strParaVisibleempresa='display:table-row';
		$strParaVisibleNegacionempresa='display:none';

		if($isParaempresa) {
			$strParaVisibleempresa='display:table-row';
			$strParaVisibleNegacionempresa='display:none';
		} else {
			$strParaVisibleempresa='display:none';
			$strParaVisibleNegacionempresa='display:table-row';
		}


		$strParaVisibleNegacionempresa=trim($strParaVisibleNegacionempresa);

		$this->strVisibleFK_Idcentro_costo=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idfuente=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idlibro_auxiliar=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacionempresa;
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

		$this->strVisibleFK_Idcentro_costo=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idfuente=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idlibro_auxiliar=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idmodulo=$strParaVisiblemodulo;
	}

	public function setVisibleBusquedasParafuente($isParafuente){
		$strParaVisiblefuente='display:table-row';
		$strParaVisibleNegacionfuente='display:none';

		if($isParafuente) {
			$strParaVisiblefuente='display:table-row';
			$strParaVisibleNegacionfuente='display:none';
		} else {
			$strParaVisiblefuente='display:none';
			$strParaVisibleNegacionfuente='display:table-row';
		}


		$strParaVisibleNegacionfuente=trim($strParaVisibleNegacionfuente);

		$this->strVisibleFK_Idcentro_costo=$strParaVisibleNegacionfuente;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionfuente;
		$this->strVisibleFK_Idfuente=$strParaVisiblefuente;
		$this->strVisibleFK_Idlibro_auxiliar=$strParaVisibleNegacionfuente;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacionfuente;
	}

	public function setVisibleBusquedasParalibro_auxiliar($isParalibro_auxiliar){
		$strParaVisiblelibro_auxiliar='display:table-row';
		$strParaVisibleNegacionlibro_auxiliar='display:none';

		if($isParalibro_auxiliar) {
			$strParaVisiblelibro_auxiliar='display:table-row';
			$strParaVisibleNegacionlibro_auxiliar='display:none';
		} else {
			$strParaVisiblelibro_auxiliar='display:none';
			$strParaVisibleNegacionlibro_auxiliar='display:table-row';
		}


		$strParaVisibleNegacionlibro_auxiliar=trim($strParaVisibleNegacionlibro_auxiliar);

		$this->strVisibleFK_Idcentro_costo=$strParaVisibleNegacionlibro_auxiliar;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionlibro_auxiliar;
		$this->strVisibleFK_Idfuente=$strParaVisibleNegacionlibro_auxiliar;
		$this->strVisibleFK_Idlibro_auxiliar=$strParaVisiblelibro_auxiliar;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacionlibro_auxiliar;
	}

	public function setVisibleBusquedasParacentro_costo($isParacentro_costo){
		$strParaVisiblecentro_costo='display:table-row';
		$strParaVisibleNegacioncentro_costo='display:none';

		if($isParacentro_costo) {
			$strParaVisiblecentro_costo='display:table-row';
			$strParaVisibleNegacioncentro_costo='display:none';
		} else {
			$strParaVisiblecentro_costo='display:none';
			$strParaVisibleNegacioncentro_costo='display:table-row';
		}


		$strParaVisibleNegacioncentro_costo=trim($strParaVisibleNegacioncentro_costo);

		$this->strVisibleFK_Idcentro_costo=$strParaVisiblecentro_costo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncentro_costo;
		$this->strVisibleFK_Idfuente=$strParaVisibleNegacioncentro_costo;
		$this->strVisibleFK_Idlibro_auxiliar=$strParaVisibleNegacioncentro_costo;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacioncentro_costo;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idasiento_automaticoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idasiento_automaticoActual=$idasiento_automaticoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.asiento_automaticoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.asiento_automaticoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarasiento_automatico,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParamodulo() {//$idasiento_automaticoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idasiento_automaticoActual=$idasiento_automaticoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.modulo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.asiento_automaticoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_modulo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',modulo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.asiento_automaticoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_modulo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(modulo_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarasiento_automatico,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParafuente() {//$idasiento_automaticoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idasiento_automaticoActual=$idasiento_automaticoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.fuente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.asiento_automaticoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_fuente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',fuente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.asiento_automaticoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_fuente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(fuente_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarasiento_automatico,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParalibro_auxiliar() {//$idasiento_automaticoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idasiento_automaticoActual=$idasiento_automaticoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.libro_auxiliar_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.asiento_automaticoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_libro_auxiliar(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',libro_auxiliar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.asiento_automaticoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_libro_auxiliar(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(libro_auxiliar_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarasiento_automatico,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacentro_costo() {//$idasiento_automaticoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idasiento_automaticoActual=$idasiento_automaticoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.centro_costo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.asiento_automaticoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_centro_costo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',centro_costo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.asiento_automaticoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_centro_costo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(centro_costo_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarasiento_automatico,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParaasiento_automatico_detalles(int $idasiento_automaticoActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idasiento_automaticoActual=$idasiento_automaticoActual;

		$bitPaginaPopupasiento_automatico_detalle=false;

		try {

			$asiento_automatico_session=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME));

			if($asiento_automatico_session==null) {
				$asiento_automatico_session=new asiento_automatico_session();
			}

			$asiento_automatico_detalle_session=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME));

			if($asiento_automatico_detalle_session==null) {
				$asiento_automatico_detalle_session=new asiento_automatico_detalle_session();
			}

			$asiento_automatico_detalle_session->strUltimaBusqueda='FK_Idasiento_automatico';
			$asiento_automatico_detalle_session->strPathNavegacionActual=$asiento_automatico_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.asiento_automatico_detalle_util::$STR_CLASS_WEB_TITULO;
			$asiento_automatico_detalle_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupasiento_automatico_detalle=$asiento_automatico_detalle_session->bitPaginaPopup;
			$asiento_automatico_detalle_session->setPaginaPopupVariables(true);
			$bitPaginaPopupasiento_automatico_detalle=$asiento_automatico_detalle_session->bitPaginaPopup;
			$asiento_automatico_detalle_session->bitPermiteNavegacionHaciaFKDesde=false;
			$asiento_automatico_detalle_session->strNombrePaginaNavegacionHaciaFKDesde=asiento_automatico_util::$STR_NOMBRE_OPCION;
			$asiento_automatico_detalle_session->bitBusquedaDesdeFKSesionasiento_automatico=true;
			$asiento_automatico_detalle_session->bigidasiento_automaticoActual=$this->idasiento_automaticoActual;

			$asiento_automatico_session->bitBusquedaDesdeFKSesionFK=true;
			$asiento_automatico_session->bigIdActualFK=$this->idasiento_automaticoActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"asiento_automatico_detalle"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=asiento_automatico_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"asiento_automatico_detalle"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(asiento_automatico_util::$STR_SESSION_NAME,serialize($asiento_automatico_session));
			$this->Session->write(asiento_automatico_detalle_util::$STR_SESSION_NAME,serialize($asiento_automatico_detalle_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupasiento_automatico_detalle!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',asiento_automatico_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_automatico_detalle_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarasiento_automatico,$this->strTipoUsuarioAuxiliarasiento_automatico,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',asiento_automatico_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_automatico_detalle_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarasiento_automatico,$this->strTipoUsuarioAuxiliarasiento_automatico,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(asiento_automatico_util::$STR_SESSION_NAME,asiento_automatico_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$asiento_automatico_session=$this->Session->read(asiento_automatico_util::$STR_SESSION_NAME);
				
		if($asiento_automatico_session==null) {
			$asiento_automatico_session=new asiento_automatico_session();		
			//$this->Session->write('asiento_automatico_session',$asiento_automatico_session);							
		}
		*/
		
		$asiento_automatico_session=new asiento_automatico_session();
    	$asiento_automatico_session->strPathNavegacionActual=asiento_automatico_util::$STR_CLASS_WEB_TITULO;
    	$asiento_automatico_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(asiento_automatico_util::$STR_SESSION_NAME,serialize($asiento_automatico_session));		
	}	
	
	public function getSetBusquedasSesionConfig(asiento_automatico_session $asiento_automatico_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($asiento_automatico_session->bitBusquedaDesdeFKSesionFK!=null && $asiento_automatico_session->bitBusquedaDesdeFKSesionFK==true) {
			if($asiento_automatico_session->bigIdActualFK!=null && $asiento_automatico_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$asiento_automatico_session->bigIdActualFKParaPosibleAtras=$asiento_automatico_session->bigIdActualFK;*/
			}
				
			$asiento_automatico_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$asiento_automatico_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(asiento_automatico_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($asiento_automatico_session->bitBusquedaDesdeFKSesionempresa!=null && $asiento_automatico_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($asiento_automatico_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(asiento_automatico_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(asiento_automatico_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(asiento_automatico_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($asiento_automatico_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($asiento_automatico_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=asiento_automatico_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$asiento_automatico_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$asiento_automatico_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;

				if($asiento_automatico_session->intNumeroPaginacion==asiento_automatico_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_automatico_session->intNumeroPaginacion;
				}
			}
			else if($asiento_automatico_session->bitBusquedaDesdeFKSesionmodulo!=null && $asiento_automatico_session->bitBusquedaDesdeFKSesionmodulo==true)
			{
				if($asiento_automatico_session->bigidmoduloActual!=0) {
					$this->strAccionBusqueda='FK_Idmodulo';

					$existe_history=HistoryWeb::ExisteElemento(asiento_automatico_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(asiento_automatico_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(asiento_automatico_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($asiento_automatico_session->bigidmoduloActualDescripcion);
						$historyWeb->setIdActual($asiento_automatico_session->bigidmoduloActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=asiento_automatico_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$asiento_automatico_session->bigidmoduloActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$asiento_automatico_session->bitBusquedaDesdeFKSesionmodulo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;

				if($asiento_automatico_session->intNumeroPaginacion==asiento_automatico_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_automatico_session->intNumeroPaginacion;
				}
			}
			else if($asiento_automatico_session->bitBusquedaDesdeFKSesionfuente!=null && $asiento_automatico_session->bitBusquedaDesdeFKSesionfuente==true)
			{
				if($asiento_automatico_session->bigidfuenteActual!=0) {
					$this->strAccionBusqueda='FK_Idfuente';

					$existe_history=HistoryWeb::ExisteElemento(asiento_automatico_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(asiento_automatico_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(asiento_automatico_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($asiento_automatico_session->bigidfuenteActualDescripcion);
						$historyWeb->setIdActual($asiento_automatico_session->bigidfuenteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=asiento_automatico_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$asiento_automatico_session->bigidfuenteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$asiento_automatico_session->bitBusquedaDesdeFKSesionfuente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;

				if($asiento_automatico_session->intNumeroPaginacion==asiento_automatico_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_automatico_session->intNumeroPaginacion;
				}
			}
			else if($asiento_automatico_session->bitBusquedaDesdeFKSesionlibro_auxiliar!=null && $asiento_automatico_session->bitBusquedaDesdeFKSesionlibro_auxiliar==true)
			{
				if($asiento_automatico_session->bigidlibro_auxiliarActual!=0) {
					$this->strAccionBusqueda='FK_Idlibro_auxiliar';

					$existe_history=HistoryWeb::ExisteElemento(asiento_automatico_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(asiento_automatico_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(asiento_automatico_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($asiento_automatico_session->bigidlibro_auxiliarActualDescripcion);
						$historyWeb->setIdActual($asiento_automatico_session->bigidlibro_auxiliarActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=asiento_automatico_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$asiento_automatico_session->bigidlibro_auxiliarActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$asiento_automatico_session->bitBusquedaDesdeFKSesionlibro_auxiliar=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;

				if($asiento_automatico_session->intNumeroPaginacion==asiento_automatico_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_automatico_session->intNumeroPaginacion;
				}
			}
			else if($asiento_automatico_session->bitBusquedaDesdeFKSesioncentro_costo!=null && $asiento_automatico_session->bitBusquedaDesdeFKSesioncentro_costo==true)
			{
				if($asiento_automatico_session->bigidcentro_costoActual!=0) {
					$this->strAccionBusqueda='FK_Idcentro_costo';

					$existe_history=HistoryWeb::ExisteElemento(asiento_automatico_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(asiento_automatico_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(asiento_automatico_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($asiento_automatico_session->bigidcentro_costoActualDescripcion);
						$historyWeb->setIdActual($asiento_automatico_session->bigidcentro_costoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=asiento_automatico_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$asiento_automatico_session->bigidcentro_costoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$asiento_automatico_session->bitBusquedaDesdeFKSesioncentro_costo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;

				if($asiento_automatico_session->intNumeroPaginacion==asiento_automatico_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_automatico_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_automatico_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$asiento_automatico_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$asiento_automatico_session=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME));
		
		if($asiento_automatico_session==null) {
			$asiento_automatico_session=new asiento_automatico_session();
		}
		
		$asiento_automatico_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$asiento_automatico_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$asiento_automatico_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idcentro_costo') {
			$asiento_automatico_session->id_centro_costo=$this->id_centro_costoFK_Idcentro_costo;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$asiento_automatico_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idfuente') {
			$asiento_automatico_session->id_fuente=$this->id_fuenteFK_Idfuente;	

		}
		else if($this->strAccionBusqueda=='FK_Idlibro_auxiliar') {
			$asiento_automatico_session->id_libro_auxiliar=$this->id_libro_auxiliarFK_Idlibro_auxiliar;	

		}
		else if($this->strAccionBusqueda=='FK_Idmodulo') {
			$asiento_automatico_session->id_modulo=$this->id_moduloFK_Idmodulo;	

		}
		
		$this->Session->write(asiento_automatico_util::$STR_SESSION_NAME,serialize($asiento_automatico_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(asiento_automatico_session $asiento_automatico_session) {
		
		if($asiento_automatico_session==null) {
			$asiento_automatico_session=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME));
		}
		
		if($asiento_automatico_session==null) {
		   $asiento_automatico_session=new asiento_automatico_session();
		}
		
		if($asiento_automatico_session->strUltimaBusqueda!=null && $asiento_automatico_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$asiento_automatico_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$asiento_automatico_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$asiento_automatico_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idcentro_costo') {
				$this->id_centro_costoFK_Idcentro_costo=$asiento_automatico_session->id_centro_costo;
				$asiento_automatico_session->id_centro_costo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$asiento_automatico_session->id_empresa;
				$asiento_automatico_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idfuente') {
				$this->id_fuenteFK_Idfuente=$asiento_automatico_session->id_fuente;
				$asiento_automatico_session->id_fuente=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idlibro_auxiliar') {
				$this->id_libro_auxiliarFK_Idlibro_auxiliar=$asiento_automatico_session->id_libro_auxiliar;
				$asiento_automatico_session->id_libro_auxiliar=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idmodulo') {
				$this->id_moduloFK_Idmodulo=$asiento_automatico_session->id_modulo;
				$asiento_automatico_session->id_modulo=-1;

			}
		}
		
		$asiento_automatico_session->strUltimaBusqueda='';
		//$asiento_automatico_session->intNumeroPaginacion=10;
		$asiento_automatico_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(asiento_automatico_util::$STR_SESSION_NAME,serialize($asiento_automatico_session));		
	}
	
	public function asiento_automaticosControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idmoduloDefaultFK = 0;
		$this->idfuenteDefaultFK = 0;
		$this->idlibro_auxiliarDefaultFK = 0;
		$this->idcentro_costoDefaultFK = 0;
	}
	
	public function setasiento_automaticoFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_modulo',$this->idmoduloDefaultFK);
		$this->setExistDataCampoForm('form','id_fuente',$this->idfuenteDefaultFK);
		$this->setExistDataCampoForm('form','id_libro_auxiliar',$this->idlibro_auxiliarDefaultFK);
		$this->setExistDataCampoForm('form','id_centro_costo',$this->idcentro_costoDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		empresa::$class;
		empresa_carga::$CONTROLLER;

		modulo::$class;
		modulo_carga::$CONTROLLER;

		fuente::$class;
		fuente_carga::$CONTROLLER;

		libro_auxiliar::$class;
		libro_auxiliar_carga::$CONTROLLER;

		centro_costo::$class;
		centro_costo_carga::$CONTROLLER;
		
		//REL
		

		asiento_automatico_detalle_carga::$CONTROLLER;
		asiento_automatico_detalle_util::$STR_SCHEMA;
		asiento_automatico_detalle_session::class;
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
		interface asiento_automatico_controlI {	
		
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
		
		
		public function manejarEventosAction();
		public function recargarFormularioGeneralAction();
		
		
		public function mostrarEjecutarAccionesRelacionesAction();
		
		public function generarReporteConPhpExcelAction();	
		public function generarReporteConPhpExcelVerticalAction();	
		public function generarReporteConPhpExcelRelacionesAction();
		
		public function onLoad(asiento_automatico_session $asiento_automatico_session=null);	
		function index(?string $strTypeOnLoadasiento_automatico='',?string $strTipoPaginaAuxiliarasiento_automatico='',?string $strTipoUsuarioAuxiliarasiento_automatico='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadasiento_automatico='',string $strTipoPaginaAuxiliarasiento_automatico='',string $strTipoUsuarioAuxiliarasiento_automatico='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($asiento_automaticoReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(asiento_automatico $asiento_automaticoClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(asiento_automatico_session $asiento_automatico_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(asiento_automatico_session $asiento_automatico_session);	
		public function asiento_automaticosControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setasiento_automaticoFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
