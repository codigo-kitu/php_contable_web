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

namespace com\bydan\contabilidad\contabilidad\cuenta_predefinida\presentation\control;

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

use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\entity\cuenta_predefinida;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta_predefinida/util/cuenta_predefinida_carga.php');
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_carga;

use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_util;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_param_return;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\logic\cuenta_predefinida_logic;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\presentation\session\cuenta_predefinida_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\entity\tipo_cuenta_predefinida;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\logic\tipo_cuenta_predefinida_logic;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util\tipo_cuenta_predefinida_carga;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util\tipo_cuenta_predefinida_util;

use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\entity\tipo_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\logic\tipo_cuenta_logic;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_carga;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_util;

use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\entity\tipo_nivel_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\logic\tipo_nivel_cuenta_logic;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\util\tipo_nivel_cuenta_carga;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\util\tipo_nivel_cuenta_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
cuenta_predefinida_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cuenta_predefinida_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cuenta_predefinida_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cuenta_predefinida_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cuenta_predefinida_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/contabilidad/cuenta_predefinida/presentation/control/cuenta_predefinida_init_control.php');
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\presentation\control\cuenta_predefinida_init_control;

include_once('com/bydan/contabilidad/contabilidad/cuenta_predefinida/presentation/control/cuenta_predefinida_base_control.php');
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\presentation\control\cuenta_predefinida_base_control;

class cuenta_predefinida_control extends cuenta_predefinida_base_control {	
	
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
					
					
				if($this->data['centro_costos']==null) {$this->data['centro_costos']=false;} else {if($this->data['centro_costos']=='on') {$this->data['centro_costos']=true;}}
					
				if($this->data['retencion']==null) {$this->data['retencion']=false;} else {if($this->data['retencion']=='on') {$this->data['retencion']=true;}}
					
				if($this->data['usa_base']==null) {$this->data['usa_base']=false;} else {if($this->data['usa_base']=='on') {$this->data['usa_base']=true;}}
					
				if($this->data['nit']==null) {$this->data['nit']=false;} else {if($this->data['nit']=='on') {$this->data['nit']=true;}}
					
				if($this->data['modifica']==null) {$this->data['modifica']=false;} else {if($this->data['modifica']=='on') {$this->data['modifica']=true;}}
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
			
			
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idtipo_cuenta"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtipo_cuentaParaProcesar();
			}
			else if($action=="FK_Idtipo_cuenta_predefinida"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtipo_cuenta_predefinidaParaProcesar();
			}
			else if($action=="FK_Idtipo_nivel_cuenta"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtipo_nivel_cuentaParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_predefinidaActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idcuenta_predefinidaActual
			}
			else if($action=='abrirBusquedaParatipo_cuenta_predefinida') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_predefinidaActual=$this->getDataId();
				$this->abrirBusquedaParatipo_cuenta_predefinida();//$idcuenta_predefinidaActual
			}
			else if($action=='abrirBusquedaParatipo_cuenta') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_predefinidaActual=$this->getDataId();
				$this->abrirBusquedaParatipo_cuenta();//$idcuenta_predefinidaActual
			}
			else if($action=='abrirBusquedaParatipo_nivel_cuenta') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_predefinidaActual=$this->getDataId();
				$this->abrirBusquedaParatipo_nivel_cuenta();//$idcuenta_predefinidaActual
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
					
					$cuenta_predefinidaController = new cuenta_predefinida_control();
					
					$cuenta_predefinidaController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($cuenta_predefinidaController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$cuenta_predefinidaController = new cuenta_predefinida_control();
						$cuenta_predefinidaController = $this;
						
						$jsonResponse = json_encode($cuenta_predefinidaController->cuenta_predefinidas);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->cuenta_predefinidaReturnGeneral==null) {
					$this->cuenta_predefinidaReturnGeneral=new cuenta_predefinida_param_return();
				}
				
				echo($this->cuenta_predefinidaReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$cuenta_predefinidaController=new cuenta_predefinida_control();
		
		$cuenta_predefinidaController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$cuenta_predefinidaController->usuarioActual=new usuario();
		
		$cuenta_predefinidaController->usuarioActual->setId($this->usuarioActual->getId());
		$cuenta_predefinidaController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$cuenta_predefinidaController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$cuenta_predefinidaController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$cuenta_predefinidaController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$cuenta_predefinidaController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$cuenta_predefinidaController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$cuenta_predefinidaController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $cuenta_predefinidaController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadcuenta_predefinida= $this->getDataGeneralString('strTypeOnLoadcuenta_predefinida');
		$strTipoPaginaAuxiliarcuenta_predefinida= $this->getDataGeneralString('strTipoPaginaAuxiliarcuenta_predefinida');
		$strTipoUsuarioAuxiliarcuenta_predefinida= $this->getDataGeneralString('strTipoUsuarioAuxiliarcuenta_predefinida');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadcuenta_predefinida,$strTipoPaginaAuxiliarcuenta_predefinida,$strTipoUsuarioAuxiliarcuenta_predefinida,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadcuenta_predefinida!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('cuenta_predefinida','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_predefinida_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta_predefinida,$this->strTipoUsuarioAuxiliarcuenta_predefinida,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_predefinida_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta_predefinida,$this->strTipoUsuarioAuxiliarcuenta_predefinida,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->cuenta_predefinidaReturnGeneral=new cuenta_predefinida_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cuenta_predefinidaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cuenta_predefinidaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cuenta_predefinidaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cuenta_predefinidaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cuenta_predefinidaReturnGeneral);
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
		$this->cuenta_predefinidaReturnGeneral=new cuenta_predefinida_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cuenta_predefinidaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cuenta_predefinidaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cuenta_predefinidaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cuenta_predefinidaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cuenta_predefinidaReturnGeneral);
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
		$this->cuenta_predefinidaReturnGeneral=new cuenta_predefinida_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cuenta_predefinidaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cuenta_predefinidaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cuenta_predefinidaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cuenta_predefinidaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cuenta_predefinidaReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
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
			
			
			$this->cuenta_predefinidaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->cuenta_predefinidaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cuenta_predefinidaReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->cuenta_predefinidaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->cuenta_predefinidaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cuenta_predefinidaReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->cuenta_predefinidaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->cuenta_predefinidaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->cuenta_predefinidaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cuenta_predefinidaReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->cuenta_predefinidaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cuenta_predefinidaReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->cuenta_predefinidaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->cuenta_predefinidaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->cuenta_predefinidaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cuenta_predefinidaReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->cuenta_predefinidaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cuenta_predefinidaReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
	
			$this->manejarRetornarExcepcion($e);
		}	
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
		
		$this->cuenta_predefinidaLogic=new cuenta_predefinida_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->cuenta_predefinida=new cuenta_predefinida();
		
		$this->strTypeOnLoadcuenta_predefinida='onload';
		$this->strTipoPaginaAuxiliarcuenta_predefinida='none';
		$this->strTipoUsuarioAuxiliarcuenta_predefinida='none';	

		$this->intNumeroPaginacion=cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
		
		$this->cuenta_predefinidaModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuenta_predefinidaControllerAdditional=new cuenta_predefinida_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(cuenta_predefinida_session $cuenta_predefinida_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($cuenta_predefinida_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadcuenta_predefinida='',?string $strTipoPaginaAuxiliarcuenta_predefinida='',?string $strTipoUsuarioAuxiliarcuenta_predefinida='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadcuenta_predefinida=$strTypeOnLoadcuenta_predefinida;
			$this->strTipoPaginaAuxiliarcuenta_predefinida=$strTipoPaginaAuxiliarcuenta_predefinida;
			$this->strTipoUsuarioAuxiliarcuenta_predefinida=$strTipoUsuarioAuxiliarcuenta_predefinida;
	
			if($strTipoUsuarioAuxiliarcuenta_predefinida=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->cuenta_predefinida=new cuenta_predefinida();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Cuentas Predefinidases';
			
			
			$cuenta_predefinida_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME));
							
			if($cuenta_predefinida_session==null) {
				$cuenta_predefinida_session=new cuenta_predefinida_session();
				
				/*$this->Session->write('cuenta_predefinida_session',$cuenta_predefinida_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($cuenta_predefinida_session->strFuncionJsPadre!=null && $cuenta_predefinida_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$cuenta_predefinida_session->strFuncionJsPadre;
				
				$cuenta_predefinida_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($cuenta_predefinida_session);
			
			if($strTypeOnLoadcuenta_predefinida!=null && $strTypeOnLoadcuenta_predefinida=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$cuenta_predefinida_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$cuenta_predefinida_session->setPaginaPopupVariables(true);
				}
				
				if($cuenta_predefinida_session->intNumeroPaginacion==cuenta_predefinida_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_predefinida_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,cuenta_predefinida_util::$STR_SESSION_NAME,'contabilidad');																
			
			} else if($strTypeOnLoadcuenta_predefinida!=null && $strTypeOnLoadcuenta_predefinida=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$cuenta_predefinida_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=cuenta_predefinida_util::$INT_NUMERO_PAGINACION;*/
				
				if($cuenta_predefinida_session->intNumeroPaginacion==cuenta_predefinida_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_predefinida_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarcuenta_predefinida!=null && $strTipoPaginaAuxiliarcuenta_predefinida=='none') {
				/*$cuenta_predefinida_session->strStyleDivHeader='display:table-row';*/
				
				/*$cuenta_predefinida_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarcuenta_predefinida!=null && $strTipoPaginaAuxiliarcuenta_predefinida=='iframe') {
					/*
					$cuenta_predefinida_session->strStyleDivArbol='display:none';
					$cuenta_predefinida_session->strStyleDivHeader='display:none';
					$cuenta_predefinida_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$cuenta_predefinida_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->cuenta_predefinidaClase=new cuenta_predefinida();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=cuenta_predefinida_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(cuenta_predefinida_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->cuenta_predefinidaLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->cuenta_predefinidaLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->cuenta_predefinidaLogic=new cuenta_predefinida_logic();*/
			
			
			$this->cuenta_predefinidasModel=null;
			/*new ListDataModel();*/
			
			/*$this->cuenta_predefinidasModel.setWrappedData(cuenta_predefinidaLogic->getcuenta_predefinidas());*/
						
			$this->cuenta_predefinidas= array();
			$this->cuenta_predefinidasEliminados=array();
			$this->cuenta_predefinidasSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= cuenta_predefinida_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->cuenta_predefinida= new cuenta_predefinida();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idtipo_cuenta='display:table-row';
			$this->strVisibleFK_Idtipo_cuenta_predefinida='display:table-row';
			$this->strVisibleFK_Idtipo_nivel_cuenta='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarcuenta_predefinida!=null && $strTipoUsuarioAuxiliarcuenta_predefinida!='none' && $strTipoUsuarioAuxiliarcuenta_predefinida!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcuenta_predefinida);
																
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
				if($strTipoUsuarioAuxiliarcuenta_predefinida!=null && $strTipoUsuarioAuxiliarcuenta_predefinida!='none' && $strTipoUsuarioAuxiliarcuenta_predefinida!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcuenta_predefinida);
																
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
				if($strTipoUsuarioAuxiliarcuenta_predefinida==null || $strTipoUsuarioAuxiliarcuenta_predefinida=='none' || $strTipoUsuarioAuxiliarcuenta_predefinida=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarcuenta_predefinida,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_predefinida_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_predefinida_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina cuenta_predefinida');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($cuenta_predefinida_session);
			
			$this->getSetBusquedasSesionConfig($cuenta_predefinida_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportecuenta_predefinidas($this->strAccionBusqueda,$this->cuenta_predefinidaLogic->getcuenta_predefinidas());*/
				} else if($this->strGenerarReporte=='Html')	{
					$cuenta_predefinida_session->strServletGenerarHtmlReporte='cuenta_predefinidaServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(cuenta_predefinida_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(cuenta_predefinida_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($cuenta_predefinida_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$cuenta_predefinida_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarcuenta_predefinida!=null && $strTipoUsuarioAuxiliarcuenta_predefinida=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($cuenta_predefinida_session);
			}
								
			$this->set(cuenta_predefinida_util::$STR_SESSION_NAME, $cuenta_predefinida_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($cuenta_predefinida_session);
			
			/*
			$this->cuenta_predefinida->recursive = 0;
			
			$this->cuenta_predefinidas=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('cuenta_predefinidas', $this->cuenta_predefinidas);
			
			$this->set(cuenta_predefinida_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->cuenta_predefinidaActual =$this->cuenta_predefinidaClase;
			
			/*$this->cuenta_predefinidaActual =$this->migrarModelcuenta_predefinida($this->cuenta_predefinidaClase);*/
			
			$this->returnHtml(false);
			
			$this->set(cuenta_predefinida_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=cuenta_predefinida_util::$STR_NOMBRE_OPCION;
				
			if(cuenta_predefinida_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=cuenta_predefinida_util::$STR_MODULO_OPCION.cuenta_predefinida_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(cuenta_predefinida_util::$STR_SESSION_NAME,serialize($cuenta_predefinida_session));
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
			/*$cuenta_predefinidaClase= (cuenta_predefinida) cuenta_predefinidasModel.getRowData();*/
			
			$this->cuenta_predefinidaClase->setId($this->cuenta_predefinida->getId());	
			$this->cuenta_predefinidaClase->setVersionRow($this->cuenta_predefinida->getVersionRow());	
			$this->cuenta_predefinidaClase->setVersionRow($this->cuenta_predefinida->getVersionRow());	
			$this->cuenta_predefinidaClase->setid_empresa($this->cuenta_predefinida->getid_empresa());	
			$this->cuenta_predefinidaClase->setid_tipo_cuenta_predefinida($this->cuenta_predefinida->getid_tipo_cuenta_predefinida());	
			$this->cuenta_predefinidaClase->setid_tipo_cuenta($this->cuenta_predefinida->getid_tipo_cuenta());	
			$this->cuenta_predefinidaClase->setid_tipo_nivel_cuenta($this->cuenta_predefinida->getid_tipo_nivel_cuenta());	
			$this->cuenta_predefinidaClase->setcodigo_tabla($this->cuenta_predefinida->getcodigo_tabla());	
			$this->cuenta_predefinidaClase->setcodigo_cuenta($this->cuenta_predefinida->getcodigo_cuenta());	
			$this->cuenta_predefinidaClase->setnombre_cuenta($this->cuenta_predefinida->getnombre_cuenta());	
			$this->cuenta_predefinidaClase->setmonto_minimo($this->cuenta_predefinida->getmonto_minimo());	
			$this->cuenta_predefinidaClase->setvalor_retencion($this->cuenta_predefinida->getvalor_retencion());	
			$this->cuenta_predefinidaClase->setbalance($this->cuenta_predefinida->getbalance());	
			$this->cuenta_predefinidaClase->setporcentaje_base($this->cuenta_predefinida->getporcentaje_base());	
			$this->cuenta_predefinidaClase->setseleccionar($this->cuenta_predefinida->getseleccionar());	
			$this->cuenta_predefinidaClase->setcentro_costos($this->cuenta_predefinida->getcentro_costos());	
			$this->cuenta_predefinidaClase->setretencion($this->cuenta_predefinida->getretencion());	
			$this->cuenta_predefinidaClase->setusa_base($this->cuenta_predefinida->getusa_base());	
			$this->cuenta_predefinidaClase->setnit($this->cuenta_predefinida->getnit());	
			$this->cuenta_predefinidaClase->setmodifica($this->cuenta_predefinida->getmodifica());	
			$this->cuenta_predefinidaClase->setultima_transaccion($this->cuenta_predefinida->getultima_transaccion());	
			$this->cuenta_predefinidaClase->setcomenta1($this->cuenta_predefinida->getcomenta1());	
			$this->cuenta_predefinidaClase->setcomenta2($this->cuenta_predefinida->getcomenta2());	
		
			/*$this->Session->write('cuenta_predefinidaVersionRowActual', cuenta_predefinida.getVersionRow());*/
			
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
			
			$cuenta_predefinida_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME));
						
			if($cuenta_predefinida_session==null) {
				$cuenta_predefinida_session=new cuenta_predefinida_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('cuenta_predefinida', $this->cuenta_predefinida->read(null, $id));
	
			
			$this->cuenta_predefinida->recursive = 0;
			
			$this->cuenta_predefinidas=$this->paginate();
			
			$this->set('cuenta_predefinidas', $this->cuenta_predefinidas);
	
			if (empty($this->data)) {
				$this->data = $this->cuenta_predefinida->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->cuenta_predefinidaLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cuenta_predefinidaClase);
			
			$this->cuenta_predefinidaActual=$this->cuenta_predefinidaClase;
			
			/*$this->cuenta_predefinidaActual =$this->migrarModelcuenta_predefinida($this->cuenta_predefinidaClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cuenta_predefinidaLogic->getcuenta_predefinidas(),$this->cuenta_predefinidaActual);
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_predefinidaReturnGeneral);
			
			//$this->cuenta_predefinidaReturnGeneral=$this->cuenta_predefinidaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cuenta_predefinidaLogic->getcuenta_predefinidas(),$this->cuenta_predefinidaActual,$this->cuenta_predefinidaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$cuenta_predefinida_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME));
						
			if($cuenta_predefinida_session==null) {
				$cuenta_predefinida_session=new cuenta_predefinida_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevocuenta_predefinida', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->cuenta_predefinidaClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cuenta_predefinidaClase);
			
			$this->cuenta_predefinidaActual =$this->cuenta_predefinidaClase;
			
			/*$this->cuenta_predefinidaActual =$this->migrarModelcuenta_predefinida($this->cuenta_predefinidaClase);*/
			
			$this->setcuenta_predefinidaFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cuenta_predefinidaLogic->getcuenta_predefinidas(),$this->cuenta_predefinida);
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_predefinidaReturnGeneral);
			
			//this->cuenta_predefinidaReturnGeneral=$this->cuenta_predefinidaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cuenta_predefinidaLogic->getcuenta_predefinidas(),$this->cuenta_predefinida,$this->cuenta_predefinidaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->cuenta_predefinidaReturnGeneral->getcuenta_predefinida()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idtipo_cuenta_predefinidaDefaultFK!=null && $this->idtipo_cuenta_predefinidaDefaultFK > -1) {
				$this->cuenta_predefinidaReturnGeneral->getcuenta_predefinida()->setid_tipo_cuenta_predefinida($this->idtipo_cuenta_predefinidaDefaultFK);
			}

			if($this->idtipo_cuentaDefaultFK!=null && $this->idtipo_cuentaDefaultFK > -1) {
				$this->cuenta_predefinidaReturnGeneral->getcuenta_predefinida()->setid_tipo_cuenta($this->idtipo_cuentaDefaultFK);
			}

			if($this->idtipo_nivel_cuentaDefaultFK!=null && $this->idtipo_nivel_cuentaDefaultFK > -1) {
				$this->cuenta_predefinidaReturnGeneral->getcuenta_predefinida()->setid_tipo_nivel_cuenta($this->idtipo_nivel_cuentaDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->cuenta_predefinidaReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->cuenta_predefinidaReturnGeneral->getcuenta_predefinida(),$this->cuenta_predefinidaActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeycuenta_predefinida($this->cuenta_predefinidaReturnGeneral->getcuenta_predefinida());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariocuenta_predefinida($this->cuenta_predefinidaReturnGeneral->getcuenta_predefinida());*/
			}
			
			if($this->cuenta_predefinidaReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta_predefinidaReturnGeneral->getcuenta_predefinida(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualcuenta_predefinida($this->cuenta_predefinida,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->cuenta_predefinidasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_predefinidasAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->cuenta_predefinidasAuxiliar=array();
			}
			
			if(count($this->cuenta_predefinidasAuxiliar)==2) {
				$cuenta_predefinidaOrigen=$this->cuenta_predefinidasAuxiliar[0];
				$cuenta_predefinidaDestino=$this->cuenta_predefinidasAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($cuenta_predefinidaOrigen,$cuenta_predefinidaDestino,true,false,false);
				
				$this->actualizarLista($cuenta_predefinidaDestino,$this->cuenta_predefinidas);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->cuenta_predefinidasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_predefinidasAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cuenta_predefinidasAuxiliar=array();
			}
			
			if(count($this->cuenta_predefinidasAuxiliar) > 0) {
				foreach ($this->cuenta_predefinidasAuxiliar as $cuenta_predefinidaSeleccionado) {
					$this->cuenta_predefinida=new cuenta_predefinida();
					
					$this->setCopiarVariablesObjetos($cuenta_predefinidaSeleccionado,$this->cuenta_predefinida,true,true,false);
						
					$this->cuenta_predefinidas[]=$this->cuenta_predefinida;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->cuenta_predefinidasEliminados as $cuenta_predefinidaEliminado) {
				$this->cuenta_predefinidaLogic->cuenta_predefinidas[]=$cuenta_predefinidaEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->cuenta_predefinida=new cuenta_predefinida();
							
				$this->cuenta_predefinidas[]=$this->cuenta_predefinida;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
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
		
		$cuenta_predefinidaActual=new cuenta_predefinida();
		
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
				
				$cuenta_predefinidaActual=$this->cuenta_predefinidas[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setid_tipo_cuenta_predefinida((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setid_tipo_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setid_tipo_nivel_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setcodigo_tabla($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setcodigo_cuenta($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setnombre_cuenta($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setmonto_minimo((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setvalor_retencion((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setbalance((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setporcentaje_base((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setseleccionar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setcentro_costos(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_15')));  } else { $cuenta_predefinidaActual->setcentro_costos(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setretencion(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_16')));  } else { $cuenta_predefinidaActual->setretencion(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setusa_base(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_17')));  } else { $cuenta_predefinidaActual->setusa_base(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setnit(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_18')));  } else { $cuenta_predefinidaActual->setnit(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setmodifica(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_19')));  } else { $cuenta_predefinidaActual->setmodifica(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setultima_transaccion(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setcomenta1($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setcomenta2($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_22'));  }
			}
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
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadcuenta_predefinida='',string $strTipoPaginaAuxiliarcuenta_predefinida='',string $strTipoUsuarioAuxiliarcuenta_predefinida='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadcuenta_predefinida,$strTipoPaginaAuxiliarcuenta_predefinida,$strTipoUsuarioAuxiliarcuenta_predefinida,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->cuenta_predefinidas) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=cuenta_predefinida_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=cuenta_predefinida_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=cuenta_predefinida_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$cuenta_predefinida_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME));
						
			if($cuenta_predefinida_session==null) {
				$cuenta_predefinida_session=new cuenta_predefinida_session();
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
					/*$this->intNumeroPaginacion=cuenta_predefinida_util::$INT_NUMERO_PAGINACION;*/
					
					if($cuenta_predefinida_session->intNumeroPaginacion==cuenta_predefinida_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$cuenta_predefinida_session->intNumeroPaginacion;
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
			
			$this->cuenta_predefinidasEliminados=array();
			
			/*$this->cuenta_predefinidaLogic->setConnexion($connexion);*/
			
			$this->cuenta_predefinidaLogic->setIsConDeep(true);
			
			$this->cuenta_predefinidaLogic->getcuenta_predefinidaDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_cuenta_predefinida');$classes[]=$class;
			$class=new Classe('tipo_cuenta');$classes[]=$class;
			$class=new Classe('tipo_nivel_cuenta');$classes[]=$class;
			
			$this->cuenta_predefinidaLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_predefinidaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->cuenta_predefinidaLogic->getcuenta_predefinidas()==null|| count($this->cuenta_predefinidaLogic->getcuenta_predefinidas())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cuenta_predefinidas=$this->cuenta_predefinidaLogic->getcuenta_predefinidas();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_predefinidaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->cuenta_predefinidasReporte=$this->cuenta_predefinidaLogic->getcuenta_predefinidas();
									
						/*$this->generarReportes('Todos',$this->cuenta_predefinidaLogic->getcuenta_predefinidas());*/
					
						$this->cuenta_predefinidaLogic->setcuenta_predefinidas($this->cuenta_predefinidas);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_predefinidaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->cuenta_predefinidaLogic->getcuenta_predefinidas()==null|| count($this->cuenta_predefinidaLogic->getcuenta_predefinidas())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cuenta_predefinidas=$this->cuenta_predefinidaLogic->getcuenta_predefinidas();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_predefinidaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->cuenta_predefinidasReporte=$this->cuenta_predefinidaLogic->getcuenta_predefinidas();
									
						/*$this->generarReportes('Todos',$this->cuenta_predefinidaLogic->getcuenta_predefinidas());*/
					
						$this->cuenta_predefinidaLogic->setcuenta_predefinidas($this->cuenta_predefinidas);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idcuenta_predefinida=0;*/
				
				if($cuenta_predefinida_session->bitBusquedaDesdeFKSesionFK!=null && $cuenta_predefinida_session->bitBusquedaDesdeFKSesionFK==true) {
					if($cuenta_predefinida_session->bigIdActualFK!=null && $cuenta_predefinida_session->bigIdActualFK!=0)	{
						$this->idcuenta_predefinida=$cuenta_predefinida_session->bigIdActualFK;	
					}
					
					$cuenta_predefinida_session->bitBusquedaDesdeFKSesionFK=false;
					
					$cuenta_predefinida_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idcuenta_predefinida=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idcuenta_predefinida=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_predefinidaLogic->getEntity($this->idcuenta_predefinida);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*cuenta_predefinidaLogicAdditional::getDetalleIndicePorId($idcuenta_predefinida);*/

				
				if($this->cuenta_predefinidaLogic->getcuenta_predefinida()!=null) {
					$this->cuenta_predefinidaLogic->setcuenta_predefinidas(array());
					$this->cuenta_predefinidaLogic->cuenta_predefinidas[]=$this->cuenta_predefinidaLogic->getcuenta_predefinida();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($cuenta_predefinida_session->bigidempresaActual!=null && $cuenta_predefinida_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$cuenta_predefinida_session->bigidempresaActual;
					$cuenta_predefinida_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_predefinidaLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_predefinidaLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->cuenta_predefinidaLogic->getcuenta_predefinidas()==null || count($this->cuenta_predefinidaLogic->getcuenta_predefinidas())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_predefinidas=$this->cuenta_predefinidaLogic->getcuenta_predefinidas();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_predefinidaLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_predefinidasReporte=$this->cuenta_predefinidaLogic->getcuenta_predefinidas();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_predefinidas("FK_Idempresa",$this->cuenta_predefinidaLogic->getcuenta_predefinidas());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_predefinidaLogic->setcuenta_predefinidas($cuenta_predefinidas);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtipo_cuenta')
			{

				if($cuenta_predefinida_session->bigidtipo_cuentaActual!=null && $cuenta_predefinida_session->bigidtipo_cuentaActual!=0)
				{
					$this->id_tipo_cuentaFK_Idtipo_cuenta=$cuenta_predefinida_session->bigidtipo_cuentaActual;
					$cuenta_predefinida_session->bigidtipo_cuentaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_predefinidaLogic->getsFK_Idtipo_cuenta($finalQueryPaginacion,$this->pagination,$this->id_tipo_cuentaFK_Idtipo_cuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_predefinidaLogicAdditional::getDetalleIndiceFK_Idtipo_cuenta($this->id_tipo_cuentaFK_Idtipo_cuenta);


					if($this->cuenta_predefinidaLogic->getcuenta_predefinidas()==null || count($this->cuenta_predefinidaLogic->getcuenta_predefinidas())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_predefinidas=$this->cuenta_predefinidaLogic->getcuenta_predefinidas();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_predefinidaLogic->getsFK_Idtipo_cuenta('',$this->pagination,$this->id_tipo_cuentaFK_Idtipo_cuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_predefinidasReporte=$this->cuenta_predefinidaLogic->getcuenta_predefinidas();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_predefinidas("FK_Idtipo_cuenta",$this->cuenta_predefinidaLogic->getcuenta_predefinidas());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_predefinidaLogic->setcuenta_predefinidas($cuenta_predefinidas);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtipo_cuenta_predefinida')
			{

				if($cuenta_predefinida_session->bigidtipo_cuenta_predefinidaActual!=null && $cuenta_predefinida_session->bigidtipo_cuenta_predefinidaActual!=0)
				{
					$this->id_tipo_cuenta_predefinidaFK_Idtipo_cuenta_predefinida=$cuenta_predefinida_session->bigidtipo_cuenta_predefinidaActual;
					$cuenta_predefinida_session->bigidtipo_cuenta_predefinidaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_predefinidaLogic->getsFK_Idtipo_cuenta_predefinida($finalQueryPaginacion,$this->pagination,$this->id_tipo_cuenta_predefinidaFK_Idtipo_cuenta_predefinida);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_predefinidaLogicAdditional::getDetalleIndiceFK_Idtipo_cuenta_predefinida($this->id_tipo_cuenta_predefinidaFK_Idtipo_cuenta_predefinida);


					if($this->cuenta_predefinidaLogic->getcuenta_predefinidas()==null || count($this->cuenta_predefinidaLogic->getcuenta_predefinidas())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_predefinidas=$this->cuenta_predefinidaLogic->getcuenta_predefinidas();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_predefinidaLogic->getsFK_Idtipo_cuenta_predefinida('',$this->pagination,$this->id_tipo_cuenta_predefinidaFK_Idtipo_cuenta_predefinida);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_predefinidasReporte=$this->cuenta_predefinidaLogic->getcuenta_predefinidas();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_predefinidas("FK_Idtipo_cuenta_predefinida",$this->cuenta_predefinidaLogic->getcuenta_predefinidas());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_predefinidaLogic->setcuenta_predefinidas($cuenta_predefinidas);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtipo_nivel_cuenta')
			{

				if($cuenta_predefinida_session->bigidtipo_nivel_cuentaActual!=null && $cuenta_predefinida_session->bigidtipo_nivel_cuentaActual!=0)
				{
					$this->id_tipo_nivel_cuentaFK_Idtipo_nivel_cuenta=$cuenta_predefinida_session->bigidtipo_nivel_cuentaActual;
					$cuenta_predefinida_session->bigidtipo_nivel_cuentaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_predefinidaLogic->getsFK_Idtipo_nivel_cuenta($finalQueryPaginacion,$this->pagination,$this->id_tipo_nivel_cuentaFK_Idtipo_nivel_cuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_predefinidaLogicAdditional::getDetalleIndiceFK_Idtipo_nivel_cuenta($this->id_tipo_nivel_cuentaFK_Idtipo_nivel_cuenta);


					if($this->cuenta_predefinidaLogic->getcuenta_predefinidas()==null || count($this->cuenta_predefinidaLogic->getcuenta_predefinidas())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_predefinidas=$this->cuenta_predefinidaLogic->getcuenta_predefinidas();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_predefinidaLogic->getsFK_Idtipo_nivel_cuenta('',$this->pagination,$this->id_tipo_nivel_cuentaFK_Idtipo_nivel_cuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_predefinidasReporte=$this->cuenta_predefinidaLogic->getcuenta_predefinidas();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_predefinidas("FK_Idtipo_nivel_cuenta",$this->cuenta_predefinidaLogic->getcuenta_predefinidas());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_predefinidaLogic->setcuenta_predefinidas($cuenta_predefinidas);
					}
				//}

			} 
		
		$cuenta_predefinida_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cuenta_predefinida_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->cuenta_predefinidaLogic->loadForeignsKeysDescription();*/
		
		$this->cuenta_predefinidas=$this->cuenta_predefinidaLogic->getcuenta_predefinidas();
		
		if($this->cuenta_predefinidasEliminados==null) {
			$this->cuenta_predefinidasEliminados=array();
		}
		
		$this->Session->write(cuenta_predefinida_util::$STR_SESSION_NAME.'Lista',serialize($this->cuenta_predefinidas));
		$this->Session->write(cuenta_predefinida_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->cuenta_predefinidasEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(cuenta_predefinida_util::$STR_SESSION_NAME,serialize($cuenta_predefinida_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idcuenta_predefinida=$idGeneral;
			
			$this->intNumeroPaginacion=cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
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
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}

			if(count($this->cuenta_predefinidas) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
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
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtipo_cuentaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_tipo_cuentaFK_Idtipo_cuenta=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtipo_cuenta','cmbid_tipo_cuenta');

			$this->strAccionBusqueda='FK_Idtipo_cuenta';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtipo_cuenta_predefinidaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_tipo_cuenta_predefinidaFK_Idtipo_cuenta_predefinida=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtipo_cuenta_predefinida','cmbid_tipo_cuenta_predefinida');

			$this->strAccionBusqueda='FK_Idtipo_cuenta_predefinida';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtipo_nivel_cuentaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_tipo_nivel_cuentaFK_Idtipo_nivel_cuenta=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtipo_nivel_cuenta','cmbid_tipo_nivel_cuenta');

			$this->strAccionBusqueda='FK_Idtipo_nivel_cuenta';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idempresa($strFinalQuery,$id_empresa)
	{
		try
		{

			$this->cuenta_predefinidaLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtipo_cuenta($strFinalQuery,$id_tipo_cuenta)
	{
		try
		{

			$this->cuenta_predefinidaLogic->getsFK_Idtipo_cuenta($strFinalQuery,new Pagination(),$id_tipo_cuenta);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtipo_cuenta_predefinida($strFinalQuery,$id_tipo_cuenta_predefinida)
	{
		try
		{

			$this->cuenta_predefinidaLogic->getsFK_Idtipo_cuenta_predefinida($strFinalQuery,new Pagination(),$id_tipo_cuenta_predefinida);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtipo_nivel_cuenta($strFinalQuery,$id_tipo_nivel_cuenta)
	{
		try
		{

			$this->cuenta_predefinidaLogic->getsFK_Idtipo_nivel_cuenta($strFinalQuery,new Pagination(),$id_tipo_nivel_cuenta);
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
			
			
			$cuenta_predefinidaForeignKey=new cuenta_predefinida_param_return(); //cuenta_predefinidaForeignKey();
			
			$cuenta_predefinida_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME));
						
			if($cuenta_predefinida_session==null) {
				$cuenta_predefinida_session=new cuenta_predefinida_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$cuenta_predefinidaForeignKey=$this->cuenta_predefinidaLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$cuenta_predefinida_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$cuenta_predefinidaForeignKey->empresasFK;
				$this->idempresaDefaultFK=$cuenta_predefinidaForeignKey->idempresaDefaultFK;
			}

			if($cuenta_predefinida_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_cuenta_predefinida',$this->strRecargarFkTipos,',')) {
				$this->tipo_cuenta_predefinidasFK=$cuenta_predefinidaForeignKey->tipo_cuenta_predefinidasFK;
				$this->idtipo_cuenta_predefinidaDefaultFK=$cuenta_predefinidaForeignKey->idtipo_cuenta_predefinidaDefaultFK;
			}

			if($cuenta_predefinida_session->bitBusquedaDesdeFKSesiontipo_cuenta_predefinida) {
				$this->setVisibleBusquedasParatipo_cuenta_predefinida(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_cuenta',$this->strRecargarFkTipos,',')) {
				$this->tipo_cuentasFK=$cuenta_predefinidaForeignKey->tipo_cuentasFK;
				$this->idtipo_cuentaDefaultFK=$cuenta_predefinidaForeignKey->idtipo_cuentaDefaultFK;
			}

			if($cuenta_predefinida_session->bitBusquedaDesdeFKSesiontipo_cuenta) {
				$this->setVisibleBusquedasParatipo_cuenta(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_nivel_cuenta',$this->strRecargarFkTipos,',')) {
				$this->tipo_nivel_cuentasFK=$cuenta_predefinidaForeignKey->tipo_nivel_cuentasFK;
				$this->idtipo_nivel_cuentaDefaultFK=$cuenta_predefinidaForeignKey->idtipo_nivel_cuentaDefaultFK;
			}

			if($cuenta_predefinida_session->bitBusquedaDesdeFKSesiontipo_nivel_cuenta) {
				$this->setVisibleBusquedasParatipo_nivel_cuenta(true);
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
	
	function cargarCombosFKFromReturnGeneral($cuenta_predefinidaReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$cuenta_predefinidaReturnGeneral->strRecargarFkTipos;
			
			


			if($cuenta_predefinidaReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$cuenta_predefinidaReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$cuenta_predefinidaReturnGeneral->idempresaDefaultFK;
			}


			if($cuenta_predefinidaReturnGeneral->con_tipo_cuenta_predefinidasFK==true) {
				$this->tipo_cuenta_predefinidasFK=$cuenta_predefinidaReturnGeneral->tipo_cuenta_predefinidasFK;
				$this->idtipo_cuenta_predefinidaDefaultFK=$cuenta_predefinidaReturnGeneral->idtipo_cuenta_predefinidaDefaultFK;
			}


			if($cuenta_predefinidaReturnGeneral->con_tipo_cuentasFK==true) {
				$this->tipo_cuentasFK=$cuenta_predefinidaReturnGeneral->tipo_cuentasFK;
				$this->idtipo_cuentaDefaultFK=$cuenta_predefinidaReturnGeneral->idtipo_cuentaDefaultFK;
			}


			if($cuenta_predefinidaReturnGeneral->con_tipo_nivel_cuentasFK==true) {
				$this->tipo_nivel_cuentasFK=$cuenta_predefinidaReturnGeneral->tipo_nivel_cuentasFK;
				$this->idtipo_nivel_cuentaDefaultFK=$cuenta_predefinidaReturnGeneral->idtipo_nivel_cuentaDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(cuenta_predefinida_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$cuenta_predefinida_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME));
		
		if($cuenta_predefinida_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($cuenta_predefinida_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($cuenta_predefinida_session->getstrNombrePaginaNavegacionHaciaFKDesde()==tipo_cuenta_predefinida_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='tipo_cuenta_predefinida';
			}
			else if($cuenta_predefinida_session->getstrNombrePaginaNavegacionHaciaFKDesde()==tipo_cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='tipo_cuenta';
			}
			else if($cuenta_predefinida_session->getstrNombrePaginaNavegacionHaciaFKDesde()==tipo_nivel_cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='tipo_nivel_cuenta';
			}
			
			$cuenta_predefinida_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}						
			
			$this->cuenta_predefinidasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_predefinidasAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cuenta_predefinidasAuxiliar=array();
			}
			
			if(count($this->cuenta_predefinidasAuxiliar) > 0) {
				
				foreach ($this->cuenta_predefinidasAuxiliar as $cuenta_predefinidaSeleccionado) {
					$this->eliminarTablaBase($cuenta_predefinidaSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
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
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		
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


	public function gettipo_cuenta_predefinidasFKListSelectItem() 
	{
		$tipo_cuenta_predefinidasList=array();

		$item=null;

		foreach($this->tipo_cuenta_predefinidasFK as $tipo_cuenta_predefinida)
		{
			$item=new SelectItem();
			$item->setLabel($tipo_cuenta_predefinida->getnombre());
			$item->setValue($tipo_cuenta_predefinida->getId());
			$tipo_cuenta_predefinidasList[]=$item;
		}

		return $tipo_cuenta_predefinidasList;
	}


	public function gettipo_cuentasFKListSelectItem() 
	{
		$tipo_cuentasList=array();

		$item=null;

		foreach($this->tipo_cuentasFK as $tipo_cuenta)
		{
			$item=new SelectItem();
			$item->setLabel($tipo_cuenta->getnombre());
			$item->setValue($tipo_cuenta->getId());
			$tipo_cuentasList[]=$item;
		}

		return $tipo_cuentasList;
	}


	public function gettipo_nivel_cuentasFKListSelectItem() 
	{
		$tipo_nivel_cuentasList=array();

		$item=null;

		foreach($this->tipo_nivel_cuentasFK as $tipo_nivel_cuenta)
		{
			$item=new SelectItem();
			$item->setLabel($tipo_nivel_cuenta->getnombre());
			$item->setValue($tipo_nivel_cuenta->getId());
			$tipo_nivel_cuentasList[]=$item;
		}

		return $tipo_nivel_cuentasList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
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
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$cuenta_predefinidasNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->cuenta_predefinidas as $cuenta_predefinidaLocal) {
				if($cuenta_predefinidaLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->cuenta_predefinida=new cuenta_predefinida();
				
				$this->cuenta_predefinida->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->cuenta_predefinidas[]=$this->cuenta_predefinida;*/
				
				$cuenta_predefinidasNuevos[]=$this->cuenta_predefinida;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_cuenta_predefinida');$classes[]=$class;
				$class=new Classe('tipo_cuenta');$classes[]=$class;
				$class=new Classe('tipo_nivel_cuenta');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->setcuenta_predefinidas($cuenta_predefinidasNuevos);
					
				$this->cuenta_predefinidaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($cuenta_predefinidasNuevos as $cuenta_predefinidaNuevo) {
					$this->cuenta_predefinidas[]=$cuenta_predefinidaNuevo;
				}
				
				/*$this->cuenta_predefinidas[]=$cuenta_predefinidasNuevos;*/
				
				$this->cuenta_predefinidaLogic->setcuenta_predefinidas($this->cuenta_predefinidas);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($cuenta_predefinidasNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_predefinida_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME));

		if($cuenta_predefinida_session==null) {
			$cuenta_predefinida_session=new cuenta_predefinida_session();
		}
		
		if($cuenta_predefinida_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($cuenta_predefinida_session->bigidempresaActual!=null && $cuenta_predefinida_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cuenta_predefinida_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=cuenta_predefinida_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombostipo_cuenta_predefinidasFK($connexion=null,$strRecargarFkQuery=''){
		$tipo_cuenta_predefinidaLogic= new tipo_cuenta_predefinida_logic();
		$pagination= new Pagination();
		$this->tipo_cuenta_predefinidasFK=array();

		$tipo_cuenta_predefinidaLogic->setConnexion($connexion);
		$tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_predefinida_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME));

		if($cuenta_predefinida_session==null) {
			$cuenta_predefinida_session=new cuenta_predefinida_session();
		}
		
		if($cuenta_predefinida_session->bitBusquedaDesdeFKSesiontipo_cuenta_predefinida!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_cuenta_predefinida_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltipo_cuenta_predefinida=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_cuenta_predefinida=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_cuenta_predefinida, '');
				$finalQueryGlobaltipo_cuenta_predefinida.=tipo_cuenta_predefinida_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_cuenta_predefinida.$strRecargarFkQuery;		

				$tipo_cuenta_predefinidaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostipo_cuenta_predefinidasFK($tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas());

		} else {
			$this->setVisibleBusquedasParatipo_cuenta_predefinida(true);


			if($cuenta_predefinida_session->bigidtipo_cuenta_predefinidaActual!=null && $cuenta_predefinida_session->bigidtipo_cuenta_predefinidaActual > 0) {
				$tipo_cuenta_predefinidaLogic->getEntity($cuenta_predefinida_session->bigidtipo_cuenta_predefinidaActual);//WithConnection

				$this->tipo_cuenta_predefinidasFK[$tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->getId()]=cuenta_predefinida_util::gettipo_cuenta_predefinidaDescripcion($tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida());
				$this->idtipo_cuenta_predefinidaDefaultFK=$tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->getId();
			}
		}
	}

	public function cargarCombostipo_cuentasFK($connexion=null,$strRecargarFkQuery=''){
		$tipo_cuentaLogic= new tipo_cuenta_logic();
		$pagination= new Pagination();
		$this->tipo_cuentasFK=array();

		$tipo_cuentaLogic->setConnexion($connexion);
		$tipo_cuentaLogic->gettipo_cuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_predefinida_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME));

		if($cuenta_predefinida_session==null) {
			$cuenta_predefinida_session=new cuenta_predefinida_session();
		}
		
		if($cuenta_predefinida_session->bitBusquedaDesdeFKSesiontipo_cuenta!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_cuenta_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltipo_cuenta=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_cuenta=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_cuenta, '');
				$finalQueryGlobaltipo_cuenta.=tipo_cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_cuenta.$strRecargarFkQuery;		

				$tipo_cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostipo_cuentasFK($tipo_cuentaLogic->gettipo_cuentas());

		} else {
			$this->setVisibleBusquedasParatipo_cuenta(true);


			if($cuenta_predefinida_session->bigidtipo_cuentaActual!=null && $cuenta_predefinida_session->bigidtipo_cuentaActual > 0) {
				$tipo_cuentaLogic->getEntity($cuenta_predefinida_session->bigidtipo_cuentaActual);//WithConnection

				$this->tipo_cuentasFK[$tipo_cuentaLogic->gettipo_cuenta()->getId()]=cuenta_predefinida_util::gettipo_cuentaDescripcion($tipo_cuentaLogic->gettipo_cuenta());
				$this->idtipo_cuentaDefaultFK=$tipo_cuentaLogic->gettipo_cuenta()->getId();
			}
		}
	}

	public function cargarCombostipo_nivel_cuentasFK($connexion=null,$strRecargarFkQuery=''){
		$tipo_nivel_cuentaLogic= new tipo_nivel_cuenta_logic();
		$pagination= new Pagination();
		$this->tipo_nivel_cuentasFK=array();

		$tipo_nivel_cuentaLogic->setConnexion($connexion);
		$tipo_nivel_cuentaLogic->gettipo_nivel_cuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_predefinida_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME));

		if($cuenta_predefinida_session==null) {
			$cuenta_predefinida_session=new cuenta_predefinida_session();
		}
		
		if($cuenta_predefinida_session->bitBusquedaDesdeFKSesiontipo_nivel_cuenta!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_nivel_cuenta_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltipo_nivel_cuenta=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_nivel_cuenta=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_nivel_cuenta, '');
				$finalQueryGlobaltipo_nivel_cuenta.=tipo_nivel_cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_nivel_cuenta.$strRecargarFkQuery;		

				$tipo_nivel_cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostipo_nivel_cuentasFK($tipo_nivel_cuentaLogic->gettipo_nivel_cuentas());

		} else {
			$this->setVisibleBusquedasParatipo_nivel_cuenta(true);


			if($cuenta_predefinida_session->bigidtipo_nivel_cuentaActual!=null && $cuenta_predefinida_session->bigidtipo_nivel_cuentaActual > 0) {
				$tipo_nivel_cuentaLogic->getEntity($cuenta_predefinida_session->bigidtipo_nivel_cuentaActual);//WithConnection

				$this->tipo_nivel_cuentasFK[$tipo_nivel_cuentaLogic->gettipo_nivel_cuenta()->getId()]=cuenta_predefinida_util::gettipo_nivel_cuentaDescripcion($tipo_nivel_cuentaLogic->gettipo_nivel_cuenta());
				$this->idtipo_nivel_cuentaDefaultFK=$tipo_nivel_cuentaLogic->gettipo_nivel_cuenta()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=cuenta_predefinida_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombostipo_cuenta_predefinidasFK($tipo_cuenta_predefinidas){

		foreach ($tipo_cuenta_predefinidas as $tipo_cuenta_predefinidaLocal ) {
			if($this->idtipo_cuenta_predefinidaDefaultFK==0) {
				$this->idtipo_cuenta_predefinidaDefaultFK=$tipo_cuenta_predefinidaLocal->getId();
			}

			$this->tipo_cuenta_predefinidasFK[$tipo_cuenta_predefinidaLocal->getId()]=cuenta_predefinida_util::gettipo_cuenta_predefinidaDescripcion($tipo_cuenta_predefinidaLocal);
		}
	}

	public function prepararCombostipo_cuentasFK($tipo_cuentas){

		foreach ($tipo_cuentas as $tipo_cuentaLocal ) {
			if($this->idtipo_cuentaDefaultFK==0) {
				$this->idtipo_cuentaDefaultFK=$tipo_cuentaLocal->getId();
			}

			$this->tipo_cuentasFK[$tipo_cuentaLocal->getId()]=cuenta_predefinida_util::gettipo_cuentaDescripcion($tipo_cuentaLocal);
		}
	}

	public function prepararCombostipo_nivel_cuentasFK($tipo_nivel_cuentas){

		foreach ($tipo_nivel_cuentas as $tipo_nivel_cuentaLocal ) {
			if($this->idtipo_nivel_cuentaDefaultFK==0) {
				$this->idtipo_nivel_cuentaDefaultFK=$tipo_nivel_cuentaLocal->getId();
			}

			$this->tipo_nivel_cuentasFK[$tipo_nivel_cuentaLocal->getId()]=cuenta_predefinida_util::gettipo_nivel_cuentaDescripcion($tipo_nivel_cuentaLocal);
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

			$strDescripcionempresa=cuenta_predefinida_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
	}

	public function cargarDescripciontipo_cuenta_predefinidaFK($idtipo_cuenta_predefinida,$connexion=null){
		$tipo_cuenta_predefinidaLogic= new tipo_cuenta_predefinida_logic();
		$tipo_cuenta_predefinidaLogic->setConnexion($connexion);
		$tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidaDataAccess()->isForFKData=true;
		$strDescripciontipo_cuenta_predefinida='';

		if($idtipo_cuenta_predefinida!=null && $idtipo_cuenta_predefinida!='' && $idtipo_cuenta_predefinida!='null') {
			if($connexion!=null) {
				$tipo_cuenta_predefinidaLogic->getEntity($idtipo_cuenta_predefinida);//WithConnection
			} else {
				$tipo_cuenta_predefinidaLogic->getEntityWithConnection($idtipo_cuenta_predefinida);//
			}

			$strDescripciontipo_cuenta_predefinida=cuenta_predefinida_util::gettipo_cuenta_predefinidaDescripcion($tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida());

		} else {
			$strDescripciontipo_cuenta_predefinida='null';
		}

		return $strDescripciontipo_cuenta_predefinida;
	}

	public function cargarDescripciontipo_cuentaFK($idtipo_cuenta,$connexion=null){
		$tipo_cuentaLogic= new tipo_cuenta_logic();
		$tipo_cuentaLogic->setConnexion($connexion);
		$tipo_cuentaLogic->gettipo_cuentaDataAccess()->isForFKData=true;
		$strDescripciontipo_cuenta='';

		if($idtipo_cuenta!=null && $idtipo_cuenta!='' && $idtipo_cuenta!='null') {
			if($connexion!=null) {
				$tipo_cuentaLogic->getEntity($idtipo_cuenta);//WithConnection
			} else {
				$tipo_cuentaLogic->getEntityWithConnection($idtipo_cuenta);//
			}

			$strDescripciontipo_cuenta=cuenta_predefinida_util::gettipo_cuentaDescripcion($tipo_cuentaLogic->gettipo_cuenta());

		} else {
			$strDescripciontipo_cuenta='null';
		}

		return $strDescripciontipo_cuenta;
	}

	public function cargarDescripciontipo_nivel_cuentaFK($idtipo_nivel_cuenta,$connexion=null){
		$tipo_nivel_cuentaLogic= new tipo_nivel_cuenta_logic();
		$tipo_nivel_cuentaLogic->setConnexion($connexion);
		$tipo_nivel_cuentaLogic->gettipo_nivel_cuentaDataAccess()->isForFKData=true;
		$strDescripciontipo_nivel_cuenta='';

		if($idtipo_nivel_cuenta!=null && $idtipo_nivel_cuenta!='' && $idtipo_nivel_cuenta!='null') {
			if($connexion!=null) {
				$tipo_nivel_cuentaLogic->getEntity($idtipo_nivel_cuenta);//WithConnection
			} else {
				$tipo_nivel_cuentaLogic->getEntityWithConnection($idtipo_nivel_cuenta);//
			}

			$strDescripciontipo_nivel_cuenta=cuenta_predefinida_util::gettipo_nivel_cuentaDescripcion($tipo_nivel_cuentaLogic->gettipo_nivel_cuenta());

		} else {
			$strDescripciontipo_nivel_cuenta='null';
		}

		return $strDescripciontipo_nivel_cuenta;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(cuenta_predefinida $cuenta_predefinidaClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$cuenta_predefinidaClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
			
			
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

		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idtipo_cuenta=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idtipo_cuenta_predefinida=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idtipo_nivel_cuenta=$strParaVisibleNegacionempresa;
	}

	public function setVisibleBusquedasParatipo_cuenta_predefinida($isParatipo_cuenta_predefinida){
		$strParaVisibletipo_cuenta_predefinida='display:table-row';
		$strParaVisibleNegaciontipo_cuenta_predefinida='display:none';

		if($isParatipo_cuenta_predefinida) {
			$strParaVisibletipo_cuenta_predefinida='display:table-row';
			$strParaVisibleNegaciontipo_cuenta_predefinida='display:none';
		} else {
			$strParaVisibletipo_cuenta_predefinida='display:none';
			$strParaVisibleNegaciontipo_cuenta_predefinida='display:table-row';
		}


		$strParaVisibleNegaciontipo_cuenta_predefinida=trim($strParaVisibleNegaciontipo_cuenta_predefinida);

		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontipo_cuenta_predefinida;
		$this->strVisibleFK_Idtipo_cuenta=$strParaVisibleNegaciontipo_cuenta_predefinida;
		$this->strVisibleFK_Idtipo_cuenta_predefinida=$strParaVisibletipo_cuenta_predefinida;
		$this->strVisibleFK_Idtipo_nivel_cuenta=$strParaVisibleNegaciontipo_cuenta_predefinida;
	}

	public function setVisibleBusquedasParatipo_cuenta($isParatipo_cuenta){
		$strParaVisibletipo_cuenta='display:table-row';
		$strParaVisibleNegaciontipo_cuenta='display:none';

		if($isParatipo_cuenta) {
			$strParaVisibletipo_cuenta='display:table-row';
			$strParaVisibleNegaciontipo_cuenta='display:none';
		} else {
			$strParaVisibletipo_cuenta='display:none';
			$strParaVisibleNegaciontipo_cuenta='display:table-row';
		}


		$strParaVisibleNegaciontipo_cuenta=trim($strParaVisibleNegaciontipo_cuenta);

		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontipo_cuenta;
		$this->strVisibleFK_Idtipo_cuenta=$strParaVisibletipo_cuenta;
		$this->strVisibleFK_Idtipo_cuenta_predefinida=$strParaVisibleNegaciontipo_cuenta;
		$this->strVisibleFK_Idtipo_nivel_cuenta=$strParaVisibleNegaciontipo_cuenta;
	}

	public function setVisibleBusquedasParatipo_nivel_cuenta($isParatipo_nivel_cuenta){
		$strParaVisibletipo_nivel_cuenta='display:table-row';
		$strParaVisibleNegaciontipo_nivel_cuenta='display:none';

		if($isParatipo_nivel_cuenta) {
			$strParaVisibletipo_nivel_cuenta='display:table-row';
			$strParaVisibleNegaciontipo_nivel_cuenta='display:none';
		} else {
			$strParaVisibletipo_nivel_cuenta='display:none';
			$strParaVisibleNegaciontipo_nivel_cuenta='display:table-row';
		}


		$strParaVisibleNegaciontipo_nivel_cuenta=trim($strParaVisibleNegaciontipo_nivel_cuenta);

		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontipo_nivel_cuenta;
		$this->strVisibleFK_Idtipo_cuenta=$strParaVisibleNegaciontipo_nivel_cuenta;
		$this->strVisibleFK_Idtipo_cuenta_predefinida=$strParaVisibleNegaciontipo_nivel_cuenta;
		$this->strVisibleFK_Idtipo_nivel_cuenta=$strParaVisibletipo_nivel_cuenta;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idcuenta_predefinidaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_predefinidaActual=$idcuenta_predefinidaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_predefinidaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_predefinidaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_predefinida,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatipo_cuenta_predefinida() {//$idcuenta_predefinidaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_predefinidaActual=$idcuenta_predefinidaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.tipo_cuenta_predefinida_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_predefinidaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_cuenta_predefinida(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',tipo_cuenta_predefinida_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_predefinidaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_cuenta_predefinida(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_cuenta_predefinida_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_predefinida,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatipo_cuenta() {//$idcuenta_predefinidaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_predefinidaActual=$idcuenta_predefinidaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.tipo_cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_predefinidaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_cuenta(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',tipo_cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_predefinidaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_cuenta(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_predefinida,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatipo_nivel_cuenta() {//$idcuenta_predefinidaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_predefinidaActual=$idcuenta_predefinidaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.tipo_nivel_cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_predefinidaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_nivel_cuenta(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',tipo_nivel_cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_predefinidaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_nivel_cuenta(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_nivel_cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_predefinida,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(cuenta_predefinida_util::$STR_SESSION_NAME,cuenta_predefinida_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$cuenta_predefinida_session=$this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME);
				
		if($cuenta_predefinida_session==null) {
			$cuenta_predefinida_session=new cuenta_predefinida_session();		
			//$this->Session->write('cuenta_predefinida_session',$cuenta_predefinida_session);							
		}
		*/
		
		$cuenta_predefinida_session=new cuenta_predefinida_session();
    	$cuenta_predefinida_session->strPathNavegacionActual=cuenta_predefinida_util::$STR_CLASS_WEB_TITULO;
    	$cuenta_predefinida_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(cuenta_predefinida_util::$STR_SESSION_NAME,serialize($cuenta_predefinida_session));		
	}	
	
	public function getSetBusquedasSesionConfig(cuenta_predefinida_session $cuenta_predefinida_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($cuenta_predefinida_session->bitBusquedaDesdeFKSesionFK!=null && $cuenta_predefinida_session->bitBusquedaDesdeFKSesionFK==true) {
			if($cuenta_predefinida_session->bigIdActualFK!=null && $cuenta_predefinida_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$cuenta_predefinida_session->bigIdActualFKParaPosibleAtras=$cuenta_predefinida_session->bigIdActualFK;*/
			}
				
			$cuenta_predefinida_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$cuenta_predefinida_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(cuenta_predefinida_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($cuenta_predefinida_session->bitBusquedaDesdeFKSesionempresa!=null && $cuenta_predefinida_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($cuenta_predefinida_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_predefinida_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_predefinida_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_predefinida_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_predefinida_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($cuenta_predefinida_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_predefinida_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_predefinida_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_predefinida_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_predefinida_util::$INT_NUMERO_PAGINACION;

				if($cuenta_predefinida_session->intNumeroPaginacion==cuenta_predefinida_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_predefinida_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_predefinida_session->bitBusquedaDesdeFKSesiontipo_cuenta_predefinida!=null && $cuenta_predefinida_session->bitBusquedaDesdeFKSesiontipo_cuenta_predefinida==true)
			{
				if($cuenta_predefinida_session->bigidtipo_cuenta_predefinidaActual!=0) {
					$this->strAccionBusqueda='FK_Idtipo_cuenta_predefinida';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_predefinida_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_predefinida_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_predefinida_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_predefinida_session->bigidtipo_cuenta_predefinidaActualDescripcion);
						$historyWeb->setIdActual($cuenta_predefinida_session->bigidtipo_cuenta_predefinidaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_predefinida_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_predefinida_session->bigidtipo_cuenta_predefinidaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_predefinida_session->bitBusquedaDesdeFKSesiontipo_cuenta_predefinida=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_predefinida_util::$INT_NUMERO_PAGINACION;

				if($cuenta_predefinida_session->intNumeroPaginacion==cuenta_predefinida_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_predefinida_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_predefinida_session->bitBusquedaDesdeFKSesiontipo_cuenta!=null && $cuenta_predefinida_session->bitBusquedaDesdeFKSesiontipo_cuenta==true)
			{
				if($cuenta_predefinida_session->bigidtipo_cuentaActual!=0) {
					$this->strAccionBusqueda='FK_Idtipo_cuenta';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_predefinida_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_predefinida_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_predefinida_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_predefinida_session->bigidtipo_cuentaActualDescripcion);
						$historyWeb->setIdActual($cuenta_predefinida_session->bigidtipo_cuentaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_predefinida_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_predefinida_session->bigidtipo_cuentaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_predefinida_session->bitBusquedaDesdeFKSesiontipo_cuenta=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_predefinida_util::$INT_NUMERO_PAGINACION;

				if($cuenta_predefinida_session->intNumeroPaginacion==cuenta_predefinida_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_predefinida_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_predefinida_session->bitBusquedaDesdeFKSesiontipo_nivel_cuenta!=null && $cuenta_predefinida_session->bitBusquedaDesdeFKSesiontipo_nivel_cuenta==true)
			{
				if($cuenta_predefinida_session->bigidtipo_nivel_cuentaActual!=0) {
					$this->strAccionBusqueda='FK_Idtipo_nivel_cuenta';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_predefinida_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_predefinida_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_predefinida_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_predefinida_session->bigidtipo_nivel_cuentaActualDescripcion);
						$historyWeb->setIdActual($cuenta_predefinida_session->bigidtipo_nivel_cuentaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_predefinida_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_predefinida_session->bigidtipo_nivel_cuentaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_predefinida_session->bitBusquedaDesdeFKSesiontipo_nivel_cuenta=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_predefinida_util::$INT_NUMERO_PAGINACION;

				if($cuenta_predefinida_session->intNumeroPaginacion==cuenta_predefinida_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_predefinida_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$cuenta_predefinida_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$cuenta_predefinida_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME));
		
		if($cuenta_predefinida_session==null) {
			$cuenta_predefinida_session=new cuenta_predefinida_session();
		}
		
		$cuenta_predefinida_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$cuenta_predefinida_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cuenta_predefinida_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$cuenta_predefinida_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idtipo_cuenta') {
			$cuenta_predefinida_session->id_tipo_cuenta=$this->id_tipo_cuentaFK_Idtipo_cuenta;	

		}
		else if($this->strAccionBusqueda=='FK_Idtipo_cuenta_predefinida') {
			$cuenta_predefinida_session->id_tipo_cuenta_predefinida=$this->id_tipo_cuenta_predefinidaFK_Idtipo_cuenta_predefinida;	

		}
		else if($this->strAccionBusqueda=='FK_Idtipo_nivel_cuenta') {
			$cuenta_predefinida_session->id_tipo_nivel_cuenta=$this->id_tipo_nivel_cuentaFK_Idtipo_nivel_cuenta;	

		}
		
		$this->Session->write(cuenta_predefinida_util::$STR_SESSION_NAME,serialize($cuenta_predefinida_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(cuenta_predefinida_session $cuenta_predefinida_session) {
		
		if($cuenta_predefinida_session==null) {
			$cuenta_predefinida_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME));
		}
		
		if($cuenta_predefinida_session==null) {
		   $cuenta_predefinida_session=new cuenta_predefinida_session();
		}
		
		if($cuenta_predefinida_session->strUltimaBusqueda!=null && $cuenta_predefinida_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$cuenta_predefinida_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$cuenta_predefinida_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$cuenta_predefinida_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$cuenta_predefinida_session->id_empresa;
				$cuenta_predefinida_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtipo_cuenta') {
				$this->id_tipo_cuentaFK_Idtipo_cuenta=$cuenta_predefinida_session->id_tipo_cuenta;
				$cuenta_predefinida_session->id_tipo_cuenta=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtipo_cuenta_predefinida') {
				$this->id_tipo_cuenta_predefinidaFK_Idtipo_cuenta_predefinida=$cuenta_predefinida_session->id_tipo_cuenta_predefinida;
				$cuenta_predefinida_session->id_tipo_cuenta_predefinida=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtipo_nivel_cuenta') {
				$this->id_tipo_nivel_cuentaFK_Idtipo_nivel_cuenta=$cuenta_predefinida_session->id_tipo_nivel_cuenta;
				$cuenta_predefinida_session->id_tipo_nivel_cuenta=-1;

			}
		}
		
		$cuenta_predefinida_session->strUltimaBusqueda='';
		//$cuenta_predefinida_session->intNumeroPaginacion=10;
		$cuenta_predefinida_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(cuenta_predefinida_util::$STR_SESSION_NAME,serialize($cuenta_predefinida_session));		
	}
	
	public function cuenta_predefinidasControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idtipo_cuenta_predefinidaDefaultFK = 0;
		$this->idtipo_cuentaDefaultFK = 0;
		$this->idtipo_nivel_cuentaDefaultFK = 0;
	}
	
	public function setcuenta_predefinidaFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_tipo_cuenta_predefinida',$this->idtipo_cuenta_predefinidaDefaultFK);
		$this->setExistDataCampoForm('form','id_tipo_cuenta',$this->idtipo_cuentaDefaultFK);
		$this->setExistDataCampoForm('form','id_tipo_nivel_cuenta',$this->idtipo_nivel_cuentaDefaultFK);
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

		tipo_cuenta_predefinida::$class;
		tipo_cuenta_predefinida_carga::$CONTROLLER;

		tipo_cuenta::$class;
		tipo_cuenta_carga::$CONTROLLER;

		tipo_nivel_cuenta::$class;
		tipo_nivel_cuenta_carga::$CONTROLLER;
		
		//REL
		
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
		interface cuenta_predefinida_controlI {	
		
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
		
		
		public function recargarReferenciasAction();
		
		
		public function manejarEventosAction();
		public function recargarFormularioGeneralAction();
		
		
		
		public function generarReporteConPhpExcelAction();	
		public function generarReporteConPhpExcelVerticalAction();	
		public function generarReporteConPhpExcelRelacionesAction();
		
		public function onLoad(cuenta_predefinida_session $cuenta_predefinida_session=null);	
		function index(?string $strTypeOnLoadcuenta_predefinida='',?string $strTipoPaginaAuxiliarcuenta_predefinida='',?string $strTipoUsuarioAuxiliarcuenta_predefinida='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
		public function seleccionar();	
		public function seleccionarActual(int $id = null);
		
		
		public function nuevoPreparar();	
		public function copiar();	
		public function duplicar();	
		public function guardarCambios();	
		public function nuevoTablaPreparar();	
		public function editarTablaDatos();	
		function guardarCambiosTablas();
		
			
		
		public function cancelarAccionesRelaciones();	
		public function recargarInformacion();	
		public function search(string $strTypeOnLoadcuenta_predefinida='',string $strTipoPaginaAuxiliarcuenta_predefinida='',string $strTipoUsuarioAuxiliarcuenta_predefinida='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($cuenta_predefinidaReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(cuenta_predefinida $cuenta_predefinidaClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(cuenta_predefinida_session $cuenta_predefinida_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(cuenta_predefinida_session $cuenta_predefinida_session);	
		public function cuenta_predefinidasControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setcuenta_predefinidaFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
