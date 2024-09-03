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

namespace com\bydan\contabilidad\general\parametro_general\presentation\control;

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

use com\bydan\contabilidad\general\parametro_general\business\entity\parametro_general;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/parametro_general/util/parametro_general_carga.php');
use com\bydan\contabilidad\general\parametro_general\util\parametro_general_carga;

use com\bydan\contabilidad\general\parametro_general\util\parametro_general_util;
use com\bydan\contabilidad\general\parametro_general\util\parametro_general_param_return;
use com\bydan\contabilidad\general\parametro_general\business\logic\parametro_general_logic;
use com\bydan\contabilidad\general\parametro_general\presentation\session\parametro_general_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\business\logic\pais_logic;
use com\bydan\contabilidad\seguridad\pais\util\pais_carga;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;

use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;
use com\bydan\contabilidad\contabilidad\moneda\business\logic\moneda_logic;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_carga;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
parametro_general_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
parametro_general_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
parametro_general_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
parametro_general_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*parametro_general_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/general/parametro_general/presentation/control/parametro_general_init_control.php');
use com\bydan\contabilidad\general\parametro_general\presentation\control\parametro_general_init_control;

include_once('com/bydan/contabilidad/general/parametro_general/presentation/control/parametro_general_base_control.php');
use com\bydan\contabilidad\general\parametro_general\presentation\control\parametro_general_base_control;

class parametro_general_control extends parametro_general_base_control {	
	
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
					
					
				if($this->data['con_formato_fecha_mda']==null) {$this->data['con_formato_fecha_mda']=false;} else {if($this->data['con_formato_fecha_mda']=='on') {$this->data['con_formato_fecha_mda']=true;}}
					
				if($this->data['con_formato_cantidad_coma']==null) {$this->data['con_formato_cantidad_coma']=false;} else {if($this->data['con_formato_cantidad_coma']=='on') {$this->data['con_formato_cantidad_coma']=true;}}
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
			else if($action=="FK_Idmoneda"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdmonedaParaProcesar();
			}
			else if($action=="FK_Idpais"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdpaisParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idparametro_generalActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idparametro_generalActual
			}
			else if($action=='abrirBusquedaParapais') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idparametro_generalActual=$this->getDataId();
				$this->abrirBusquedaParapais();//$idparametro_generalActual
			}
			else if($action=='abrirBusquedaParamoneda') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idparametro_generalActual=$this->getDataId();
				$this->abrirBusquedaParamoneda();//$idparametro_generalActual
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
					
					$parametro_generalController = new parametro_general_control();
					
					$parametro_generalController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($parametro_generalController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$parametro_generalController = new parametro_general_control();
						$parametro_generalController = $this;
						
						$jsonResponse = json_encode($parametro_generalController->parametro_generals);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->parametro_generalReturnGeneral==null) {
					$this->parametro_generalReturnGeneral=new parametro_general_param_return();
				}
				
				echo($this->parametro_generalReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$parametro_generalController=new parametro_general_control();
		
		$parametro_generalController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$parametro_generalController->usuarioActual=new usuario();
		
		$parametro_generalController->usuarioActual->setId($this->usuarioActual->getId());
		$parametro_generalController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$parametro_generalController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$parametro_generalController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$parametro_generalController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$parametro_generalController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$parametro_generalController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$parametro_generalController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $parametro_generalController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadparametro_general= $this->getDataGeneralString('strTypeOnLoadparametro_general');
		$strTipoPaginaAuxiliarparametro_general= $this->getDataGeneralString('strTipoPaginaAuxiliarparametro_general');
		$strTipoUsuarioAuxiliarparametro_general= $this->getDataGeneralString('strTipoUsuarioAuxiliarparametro_general');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadparametro_general,$strTipoPaginaAuxiliarparametro_general,$strTipoUsuarioAuxiliarparametro_general,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadparametro_general!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('parametro_general','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->commitNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->rollbackNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(parametro_general_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'general','','POPUP',$this->strTipoPaginaAuxiliarparametro_general,$this->strTipoUsuarioAuxiliarparametro_general,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(parametro_general_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'general','','POPUP',$this->strTipoPaginaAuxiliarparametro_general,$this->strTipoUsuarioAuxiliarparametro_general,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->parametro_generalReturnGeneral=new parametro_general_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->parametro_generalReturnGeneral->conGuardarReturnSessionJs=true;
		$this->parametro_generalReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->parametro_generalReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->parametro_generalReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->parametro_generalReturnGeneral);
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
		$this->parametro_generalReturnGeneral=new parametro_general_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->parametro_generalReturnGeneral->conGuardarReturnSessionJs=true;
		$this->parametro_generalReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->parametro_generalReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->parametro_generalReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->parametro_generalReturnGeneral);
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
		$this->parametro_generalReturnGeneral=new parametro_general_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->parametro_generalReturnGeneral->conGuardarReturnSessionJs=true;
		$this->parametro_generalReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->parametro_generalReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->parametro_generalReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->parametro_generalReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->getNewConnexionToDeep();
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
			
			
			$this->parametro_generalReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->parametro_generalReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->parametro_generalReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->parametro_generalReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->parametro_generalReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->parametro_generalReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->commitNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->rollbackNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->parametro_generalReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->parametro_generalReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->parametro_generalReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->parametro_generalReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->parametro_generalReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->parametro_generalReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->commitNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->rollbackNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->parametro_generalReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->parametro_generalReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->parametro_generalReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->parametro_generalReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->parametro_generalReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->parametro_generalReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->commitNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->rollbackNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
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
		
		$this->parametro_generalLogic=new parametro_general_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->parametro_general=new parametro_general();
		
		$this->strTypeOnLoadparametro_general='onload';
		$this->strTipoPaginaAuxiliarparametro_general='none';
		$this->strTipoUsuarioAuxiliarparametro_general='none';	

		$this->intNumeroPaginacion=parametro_general_util::$INT_NUMERO_PAGINACION;
		
		$this->parametro_generalModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_generalControllerAdditional=new parametro_general_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(parametro_general_session $parametro_general_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($parametro_general_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadparametro_general='',?string $strTipoPaginaAuxiliarparametro_general='',?string $strTipoUsuarioAuxiliarparametro_general='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadparametro_general=$strTypeOnLoadparametro_general;
			$this->strTipoPaginaAuxiliarparametro_general=$strTipoPaginaAuxiliarparametro_general;
			$this->strTipoUsuarioAuxiliarparametro_general=$strTipoUsuarioAuxiliarparametro_general;
	
			if($strTipoUsuarioAuxiliarparametro_general=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->parametro_general=new parametro_general();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Parametro Generales';
			
			
			$parametro_general_session=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME));
							
			if($parametro_general_session==null) {
				$parametro_general_session=new parametro_general_session();
				
				/*$this->Session->write('parametro_general_session',$parametro_general_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($parametro_general_session->strFuncionJsPadre!=null && $parametro_general_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$parametro_general_session->strFuncionJsPadre;
				
				$parametro_general_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($parametro_general_session);
			
			if($strTypeOnLoadparametro_general!=null && $strTypeOnLoadparametro_general=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$parametro_general_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$parametro_general_session->setPaginaPopupVariables(true);
				}
				
				if($parametro_general_session->intNumeroPaginacion==parametro_general_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_general_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_general_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,parametro_general_util::$STR_SESSION_NAME,'general');																
			
			} else if($strTypeOnLoadparametro_general!=null && $strTypeOnLoadparametro_general=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$parametro_general_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=parametro_general_util::$INT_NUMERO_PAGINACION;*/
				
				if($parametro_general_session->intNumeroPaginacion==parametro_general_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_general_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_general_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarparametro_general!=null && $strTipoPaginaAuxiliarparametro_general=='none') {
				/*$parametro_general_session->strStyleDivHeader='display:table-row';*/
				
				/*$parametro_general_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarparametro_general!=null && $strTipoPaginaAuxiliarparametro_general=='iframe') {
					/*
					$parametro_general_session->strStyleDivArbol='display:none';
					$parametro_general_session->strStyleDivHeader='display:none';
					$parametro_general_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$parametro_general_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->parametro_generalClase=new parametro_general();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=parametro_general_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(parametro_general_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->parametro_generalLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->parametro_generalLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->parametro_generalLogic=new parametro_general_logic();*/
			
			
			$this->parametro_generalsModel=null;
			/*new ListDataModel();*/
			
			/*$this->parametro_generalsModel.setWrappedData(parametro_generalLogic->getparametro_generals());*/
						
			$this->parametro_generals= array();
			$this->parametro_generalsEliminados=array();
			$this->parametro_generalsSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= parametro_general_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->parametro_general= new parametro_general();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idmoneda='display:table-row';
			$this->strVisibleFK_Idpais='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarparametro_general!=null && $strTipoUsuarioAuxiliarparametro_general!='none' && $strTipoUsuarioAuxiliarparametro_general!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarparametro_general);
																
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
				if($strTipoUsuarioAuxiliarparametro_general!=null && $strTipoUsuarioAuxiliarparametro_general!='none' && $strTipoUsuarioAuxiliarparametro_general!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarparametro_general);
																
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
				if($strTipoUsuarioAuxiliarparametro_general==null || $strTipoUsuarioAuxiliarparametro_general=='none' || $strTipoUsuarioAuxiliarparametro_general=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarparametro_general,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, parametro_general_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, parametro_general_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina parametro_general');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($parametro_general_session);
			
			$this->getSetBusquedasSesionConfig($parametro_general_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteparametro_generals($this->strAccionBusqueda,$this->parametro_generalLogic->getparametro_generals());*/
				} else if($this->strGenerarReporte=='Html')	{
					$parametro_general_session->strServletGenerarHtmlReporte='parametro_generalServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(parametro_general_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(parametro_general_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($parametro_general_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$parametro_general_session=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarparametro_general!=null && $strTipoUsuarioAuxiliarparametro_general=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($parametro_general_session);
			}
								
			$this->set(parametro_general_util::$STR_SESSION_NAME, $parametro_general_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($parametro_general_session);
			
			/*
			$this->parametro_general->recursive = 0;
			
			$this->parametro_generals=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('parametro_generals', $this->parametro_generals);
			
			$this->set(parametro_general_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->parametro_generalActual =$this->parametro_generalClase;
			
			/*$this->parametro_generalActual =$this->migrarModelparametro_general($this->parametro_generalClase);*/
			
			$this->returnHtml(false);
			
			$this->set(parametro_general_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=parametro_general_util::$STR_NOMBRE_OPCION;
				
			if(parametro_general_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=parametro_general_util::$STR_MODULO_OPCION.parametro_general_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(parametro_general_util::$STR_SESSION_NAME,serialize($parametro_general_session));
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
			/*$parametro_generalClase= (parametro_general) parametro_generalsModel.getRowData();*/
			
			$this->parametro_generalClase->setId($this->parametro_general->getId());	
			$this->parametro_generalClase->setVersionRow($this->parametro_general->getVersionRow());	
			$this->parametro_generalClase->setVersionRow($this->parametro_general->getVersionRow());	
			$this->parametro_generalClase->setid_empresa($this->parametro_general->getid_empresa());	
			$this->parametro_generalClase->setid_pais($this->parametro_general->getid_pais());	
			$this->parametro_generalClase->setid_modena($this->parametro_general->getid_modena());	
			$this->parametro_generalClase->setsimbolo_moneda($this->parametro_general->getsimbolo_moneda());	
			$this->parametro_generalClase->setnumero_decimales($this->parametro_general->getnumero_decimales());	
			$this->parametro_generalClase->setcon_formato_fecha_mda($this->parametro_general->getcon_formato_fecha_mda());	
			$this->parametro_generalClase->setcon_formato_cantidad_coma($this->parametro_general->getcon_formato_cantidad_coma());	
			$this->parametro_generalClase->setiva_porciento($this->parametro_general->getiva_porciento());	
		
			/*$this->Session->write('parametro_generalVersionRowActual', parametro_general.getVersionRow());*/
			
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
			
			$parametro_general_session=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME));
						
			if($parametro_general_session==null) {
				$parametro_general_session=new parametro_general_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('parametro_general', $this->parametro_general->read(null, $id));
	
			
			$this->parametro_general->recursive = 0;
			
			$this->parametro_generals=$this->paginate();
			
			$this->set('parametro_generals', $this->parametro_generals);
	
			if (empty($this->data)) {
				$this->data = $this->parametro_general->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->parametro_generalLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->parametro_generalClase);
			
			$this->parametro_generalActual=$this->parametro_generalClase;
			
			/*$this->parametro_generalActual =$this->migrarModelparametro_general($this->parametro_generalClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->parametro_generalLogic->getparametro_generals(),$this->parametro_generalActual);
			
			$this->actualizarControllerConReturnGeneral($this->parametro_generalReturnGeneral);
			
			//$this->parametro_generalReturnGeneral=$this->parametro_generalLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->parametro_generalLogic->getparametro_generals(),$this->parametro_generalActual,$this->parametro_generalParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->commitNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->rollbackNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$parametro_general_session=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME));
						
			if($parametro_general_session==null) {
				$parametro_general_session=new parametro_general_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoparametro_general', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->parametro_generalClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->parametro_generalClase);
			
			$this->parametro_generalActual =$this->parametro_generalClase;
			
			/*$this->parametro_generalActual =$this->migrarModelparametro_general($this->parametro_generalClase);*/
			
			$this->setparametro_generalFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->parametro_generalLogic->getparametro_generals(),$this->parametro_general);
			
			$this->actualizarControllerConReturnGeneral($this->parametro_generalReturnGeneral);
			
			//this->parametro_generalReturnGeneral=$this->parametro_generalLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->parametro_generalLogic->getparametro_generals(),$this->parametro_general,$this->parametro_generalParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->parametro_generalReturnGeneral->getparametro_general()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idpaisDefaultFK!=null && $this->idpaisDefaultFK > -1) {
				$this->parametro_generalReturnGeneral->getparametro_general()->setid_pais($this->idpaisDefaultFK);
			}

			if($this->idmonedaDefaultFK!=null && $this->idmonedaDefaultFK > -1) {
				$this->parametro_generalReturnGeneral->getparametro_general()->setid_modena($this->idmonedaDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->parametro_generalReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->parametro_generalReturnGeneral->getparametro_general(),$this->parametro_generalActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyparametro_general($this->parametro_generalReturnGeneral->getparametro_general());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioparametro_general($this->parametro_generalReturnGeneral->getparametro_general());*/
			}
			
			if($this->parametro_generalReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->parametro_generalReturnGeneral->getparametro_general(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualparametro_general($this->parametro_general,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->commitNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->rollbackNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->parametro_generalsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_generalsAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->parametro_generalsAuxiliar=array();
			}
			
			if(count($this->parametro_generalsAuxiliar)==2) {
				$parametro_generalOrigen=$this->parametro_generalsAuxiliar[0];
				$parametro_generalDestino=$this->parametro_generalsAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($parametro_generalOrigen,$parametro_generalDestino,true,false,false);
				
				$this->actualizarLista($parametro_generalDestino,$this->parametro_generals);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->commitNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->rollbackNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->parametro_generalsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_generalsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->parametro_generalsAuxiliar=array();
			}
			
			if(count($this->parametro_generalsAuxiliar) > 0) {
				foreach ($this->parametro_generalsAuxiliar as $parametro_generalSeleccionado) {
					$this->parametro_general=new parametro_general();
					
					$this->setCopiarVariablesObjetos($parametro_generalSeleccionado,$this->parametro_general,true,true,false);
						
					$this->parametro_generals[]=$this->parametro_general;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->commitNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->rollbackNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->parametro_generalsEliminados as $parametro_generalEliminado) {
				$this->parametro_generalLogic->parametro_generals[]=$parametro_generalEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->commitNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->rollbackNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->parametro_general=new parametro_general();
							
				$this->parametro_generals[]=$this->parametro_general;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->commitNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->rollbackNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
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
		
		$parametro_generalActual=new parametro_general();
		
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
				
				$parametro_generalActual=$this->parametro_generals[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $parametro_generalActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $parametro_generalActual->setid_pais((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $parametro_generalActual->setid_modena((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $parametro_generalActual->setsimbolo_moneda($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $parametro_generalActual->setnumero_decimales((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $parametro_generalActual->setcon_formato_fecha_mda(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_8')));  } else { $parametro_generalActual->setcon_formato_fecha_mda(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $parametro_generalActual->setcon_formato_cantidad_coma(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_9')));  } else { $parametro_generalActual->setcon_formato_cantidad_coma(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $parametro_generalActual->setiva_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
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
				$this->parametro_generalLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=parametro_general_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->commitNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->rollbackNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadparametro_general='',string $strTipoPaginaAuxiliarparametro_general='',string $strTipoUsuarioAuxiliarparametro_general='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadparametro_general,$strTipoPaginaAuxiliarparametro_general,$strTipoUsuarioAuxiliarparametro_general,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->parametro_generals) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->commitNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->rollbackNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=parametro_general_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=parametro_general_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=parametro_general_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$parametro_general_session=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME));
						
			if($parametro_general_session==null) {
				$parametro_general_session=new parametro_general_session();
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
					/*$this->intNumeroPaginacion=parametro_general_util::$INT_NUMERO_PAGINACION;*/
					
					if($parametro_general_session->intNumeroPaginacion==parametro_general_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=parametro_general_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$parametro_general_session->intNumeroPaginacion;
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
			
			$this->parametro_generalsEliminados=array();
			
			/*$this->parametro_generalLogic->setConnexion($connexion);*/
			
			$this->parametro_generalLogic->setIsConDeep(true);
			
			$this->parametro_generalLogic->getparametro_generalDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('pais');$classes[]=$class;
			$class=new Classe('moneda');$classes[]=$class;
			
			$this->parametro_generalLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->parametro_generalLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->parametro_generalLogic->getparametro_generals()==null|| count($this->parametro_generalLogic->getparametro_generals())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->parametro_generals=$this->parametro_generalLogic->getparametro_generals();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->parametro_generalLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->parametro_generalsReporte=$this->parametro_generalLogic->getparametro_generals();
									
						/*$this->generarReportes('Todos',$this->parametro_generalLogic->getparametro_generals());*/
					
						$this->parametro_generalLogic->setparametro_generals($this->parametro_generals);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->parametro_generalLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->parametro_generalLogic->getparametro_generals()==null|| count($this->parametro_generalLogic->getparametro_generals())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->parametro_generals=$this->parametro_generalLogic->getparametro_generals();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->parametro_generalLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->parametro_generalsReporte=$this->parametro_generalLogic->getparametro_generals();
									
						/*$this->generarReportes('Todos',$this->parametro_generalLogic->getparametro_generals());*/
					
						$this->parametro_generalLogic->setparametro_generals($this->parametro_generals);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idparametro_general=0;*/
				
				if($parametro_general_session->bitBusquedaDesdeFKSesionFK!=null && $parametro_general_session->bitBusquedaDesdeFKSesionFK==true) {
					if($parametro_general_session->bigIdActualFK!=null && $parametro_general_session->bigIdActualFK!=0)	{
						$this->idparametro_general=$parametro_general_session->bigIdActualFK;	
					}
					
					$parametro_general_session->bitBusquedaDesdeFKSesionFK=false;
					
					$parametro_general_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idparametro_general=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idparametro_general=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->parametro_generalLogic->getEntity($this->idparametro_general);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*parametro_generalLogicAdditional::getDetalleIndicePorId($idparametro_general);*/

				
				if($this->parametro_generalLogic->getparametro_general()!=null) {
					$this->parametro_generalLogic->setparametro_generals(array());
					$this->parametro_generalLogic->parametro_generals[]=$this->parametro_generalLogic->getparametro_general();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($parametro_general_session->bigidempresaActual!=null && $parametro_general_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$parametro_general_session->bigidempresaActual;
					$parametro_general_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_generalLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//parametro_generalLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->parametro_generalLogic->getparametro_generals()==null || count($this->parametro_generalLogic->getparametro_generals())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$parametro_generals=$this->parametro_generalLogic->getparametro_generals();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_generalLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->parametro_generalsReporte=$this->parametro_generalLogic->getparametro_generals();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteparametro_generals("FK_Idempresa",$this->parametro_generalLogic->getparametro_generals());

					if($this->strTipoPaginacion=='TODOS') {
						$this->parametro_generalLogic->setparametro_generals($parametro_generals);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idmoneda')
			{

				if($parametro_general_session->bigidmonedaActual!=null && $parametro_general_session->bigidmonedaActual!=0)
				{
					$this->id_modenaFK_Idmoneda=$parametro_general_session->bigidmonedaActual;
					$parametro_general_session->bigidmonedaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_generalLogic->getsFK_Idmoneda($finalQueryPaginacion,$this->pagination,$this->id_modenaFK_Idmoneda);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//parametro_generalLogicAdditional::getDetalleIndiceFK_Idmoneda($this->id_modenaFK_Idmoneda);


					if($this->parametro_generalLogic->getparametro_generals()==null || count($this->parametro_generalLogic->getparametro_generals())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$parametro_generals=$this->parametro_generalLogic->getparametro_generals();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_generalLogic->getsFK_Idmoneda('',$this->pagination,$this->id_modenaFK_Idmoneda);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->parametro_generalsReporte=$this->parametro_generalLogic->getparametro_generals();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteparametro_generals("FK_Idmoneda",$this->parametro_generalLogic->getparametro_generals());

					if($this->strTipoPaginacion=='TODOS') {
						$this->parametro_generalLogic->setparametro_generals($parametro_generals);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idpais')
			{

				if($parametro_general_session->bigidpaisActual!=null && $parametro_general_session->bigidpaisActual!=0)
				{
					$this->id_paisFK_Idpais=$parametro_general_session->bigidpaisActual;
					$parametro_general_session->bigidpaisActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_generalLogic->getsFK_Idpais($finalQueryPaginacion,$this->pagination,$this->id_paisFK_Idpais);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//parametro_generalLogicAdditional::getDetalleIndiceFK_Idpais($this->id_paisFK_Idpais);


					if($this->parametro_generalLogic->getparametro_generals()==null || count($this->parametro_generalLogic->getparametro_generals())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$parametro_generals=$this->parametro_generalLogic->getparametro_generals();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_generalLogic->getsFK_Idpais('',$this->pagination,$this->id_paisFK_Idpais);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->parametro_generalsReporte=$this->parametro_generalLogic->getparametro_generals();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteparametro_generals("FK_Idpais",$this->parametro_generalLogic->getparametro_generals());

					if($this->strTipoPaginacion=='TODOS') {
						$this->parametro_generalLogic->setparametro_generals($parametro_generals);
					}
				//}

			} 
		
		$parametro_general_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$parametro_general_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->parametro_generalLogic->loadForeignsKeysDescription();*/
		
		$this->parametro_generals=$this->parametro_generalLogic->getparametro_generals();
		
		if($this->parametro_generalsEliminados==null) {
			$this->parametro_generalsEliminados=array();
		}
		
		$this->Session->write(parametro_general_util::$STR_SESSION_NAME.'Lista',serialize($this->parametro_generals));
		$this->Session->write(parametro_general_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->parametro_generalsEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(parametro_general_util::$STR_SESSION_NAME,serialize($parametro_general_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idparametro_general=$idGeneral;
			
			$this->intNumeroPaginacion=parametro_general_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->commitNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->rollbackNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->getNewConnexionToDeep();
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
				$this->parametro_generalLogic->commitNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->rollbackNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->getNewConnexionToDeep();
			}

			if(count($this->parametro_generals) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->commitNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->rollbackNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
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
				$this->parametro_generalLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=parametro_general_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->commitNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->rollbackNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdmonedaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=parametro_general_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_modenaFK_Idmoneda=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idmoneda','cmbid_modena');

			$this->strAccionBusqueda='FK_Idmoneda';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->commitNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->rollbackNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdpaisParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=parametro_general_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_paisFK_Idpais=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idpais','cmbid_pais');

			$this->strAccionBusqueda='FK_Idpais';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->commitNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->rollbackNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idempresa($strFinalQuery,$id_empresa)
	{
		try
		{

			$this->parametro_generalLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idmoneda($strFinalQuery,$id_modena)
	{
		try
		{

			$this->parametro_generalLogic->getsFK_Idmoneda($strFinalQuery,new Pagination(),$id_modena);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idpais($strFinalQuery,$id_pais)
	{
		try
		{

			$this->parametro_generalLogic->getsFK_Idpais($strFinalQuery,new Pagination(),$id_pais);
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
			
			
			$parametro_generalForeignKey=new parametro_general_param_return(); //parametro_generalForeignKey();
			
			$parametro_general_session=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME));
						
			if($parametro_general_session==null) {
				$parametro_general_session=new parametro_general_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$parametro_generalForeignKey=$this->parametro_generalLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$parametro_general_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$parametro_generalForeignKey->empresasFK;
				$this->idempresaDefaultFK=$parametro_generalForeignKey->idempresaDefaultFK;
			}

			if($parametro_general_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_pais',$this->strRecargarFkTipos,',')) {
				$this->paissFK=$parametro_generalForeignKey->paissFK;
				$this->idpaisDefaultFK=$parametro_generalForeignKey->idpaisDefaultFK;
			}

			if($parametro_general_session->bitBusquedaDesdeFKSesionpais) {
				$this->setVisibleBusquedasParapais(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_modena',$this->strRecargarFkTipos,',')) {
				$this->monedasFK=$parametro_generalForeignKey->monedasFK;
				$this->idmonedaDefaultFK=$parametro_generalForeignKey->idmonedaDefaultFK;
			}

			if($parametro_general_session->bitBusquedaDesdeFKSesionmoneda) {
				$this->setVisibleBusquedasParamoneda(true);
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
	
	function cargarCombosFKFromReturnGeneral($parametro_generalReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$parametro_generalReturnGeneral->strRecargarFkTipos;
			
			


			if($parametro_generalReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$parametro_generalReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$parametro_generalReturnGeneral->idempresaDefaultFK;
			}


			if($parametro_generalReturnGeneral->con_paissFK==true) {
				$this->paissFK=$parametro_generalReturnGeneral->paissFK;
				$this->idpaisDefaultFK=$parametro_generalReturnGeneral->idpaisDefaultFK;
			}


			if($parametro_generalReturnGeneral->con_monedasFK==true) {
				$this->monedasFK=$parametro_generalReturnGeneral->monedasFK;
				$this->idmonedaDefaultFK=$parametro_generalReturnGeneral->idmonedaDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(parametro_general_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$parametro_general_session=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME));
		
		if($parametro_general_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($parametro_general_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($parametro_general_session->getstrNombrePaginaNavegacionHaciaFKDesde()==pais_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='pais';
			}
			else if($parametro_general_session->getstrNombrePaginaNavegacionHaciaFKDesde()==moneda_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='moneda';
			}
			
			$parametro_general_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->getNewConnexionToDeep();
			}						
			
			$this->parametro_generalsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_generalsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->parametro_generalsAuxiliar=array();
			}
			
			if(count($this->parametro_generalsAuxiliar) > 0) {
				
				foreach ($this->parametro_generalsAuxiliar as $parametro_generalSeleccionado) {
					$this->eliminarTablaBase($parametro_generalSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->commitNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->rollbackNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
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


	public function getpaissFKListSelectItem() 
	{
		$paissList=array();

		$item=null;

		foreach($this->paissFK as $pais)
		{
			$item=new SelectItem();
			$item->setLabel($pais->getcodigo());
			$item->setValue($pais->getId());
			$paissList[]=$item;
		}

		return $paissList;
	}


	public function getmonedasFKListSelectItem() 
	{
		$monedasList=array();

		$item=null;

		foreach($this->monedasFK as $moneda)
		{
			$item=new SelectItem();
			$item->setLabel($moneda->getcodigo());
			$item->setValue($moneda->getId());
			$monedasList[]=$item;
		}

		return $monedasList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=parametro_general_util::$INT_NUMERO_PAGINACION;
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
				$this->parametro_generalLogic->commitNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->rollbackNewConnexionToDeep();
				$this->parametro_generalLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$parametro_generalsNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->parametro_generals as $parametro_generalLocal) {
				if($parametro_generalLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->parametro_general=new parametro_general();
				
				$this->parametro_general->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->parametro_generals[]=$this->parametro_general;*/
				
				$parametro_generalsNuevos[]=$this->parametro_general;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('pais');$classes[]=$class;
				$class=new Classe('moneda');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_generalLogic->setparametro_generals($parametro_generalsNuevos);
					
				$this->parametro_generalLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($parametro_generalsNuevos as $parametro_generalNuevo) {
					$this->parametro_generals[]=$parametro_generalNuevo;
				}
				
				/*$this->parametro_generals[]=$parametro_generalsNuevos;*/
				
				$this->parametro_generalLogic->setparametro_generals($this->parametro_generals);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($parametro_generalsNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$parametro_general_session=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME));

		if($parametro_general_session==null) {
			$parametro_general_session=new parametro_general_session();
		}
		
		if($parametro_general_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($parametro_general_session->bigidempresaActual!=null && $parametro_general_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($parametro_general_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=parametro_general_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombospaissFK($connexion=null,$strRecargarFkQuery=''){
		$paisLogic= new pais_logic();
		$pagination= new Pagination();
		$this->paissFK=array();

		$paisLogic->setConnexion($connexion);
		$paisLogic->getpaisDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$parametro_general_session=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME));

		if($parametro_general_session==null) {
			$parametro_general_session=new parametro_general_session();
		}
		
		if($parametro_general_session->bitBusquedaDesdeFKSesionpais!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=pais_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalpais=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalpais=Funciones::GetFinalQueryAppend($finalQueryGlobalpais, '');
				$finalQueryGlobalpais.=pais_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalpais.$strRecargarFkQuery;		

				$paisLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombospaissFK($paisLogic->getpaiss());

		} else {
			$this->setVisibleBusquedasParapais(true);


			if($parametro_general_session->bigidpaisActual!=null && $parametro_general_session->bigidpaisActual > 0) {
				$paisLogic->getEntity($parametro_general_session->bigidpaisActual);//WithConnection

				$this->paissFK[$paisLogic->getpais()->getId()]=parametro_general_util::getpaisDescripcion($paisLogic->getpais());
				$this->idpaisDefaultFK=$paisLogic->getpais()->getId();
			}
		}
	}

	public function cargarCombosmonedasFK($connexion=null,$strRecargarFkQuery=''){
		$monedaLogic= new moneda_logic();
		$pagination= new Pagination();
		$this->monedasFK=array();

		$monedaLogic->setConnexion($connexion);
		$monedaLogic->getmonedaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$parametro_general_session=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME));

		if($parametro_general_session==null) {
			$parametro_general_session=new parametro_general_session();
		}
		
		if($parametro_general_session->bitBusquedaDesdeFKSesionmoneda!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=moneda_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalmoneda=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalmoneda=Funciones::GetFinalQueryAppend($finalQueryGlobalmoneda, '');
				$finalQueryGlobalmoneda.=moneda_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalmoneda.$strRecargarFkQuery;		

				$monedaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosmonedasFK($monedaLogic->getmonedas());

		} else {
			$this->setVisibleBusquedasParamoneda(true);


			if($parametro_general_session->bigidmonedaActual!=null && $parametro_general_session->bigidmonedaActual > 0) {
				$monedaLogic->getEntity($parametro_general_session->bigidmonedaActual);//WithConnection

				$this->monedasFK[$monedaLogic->getmoneda()->getId()]=parametro_general_util::getmonedaDescripcion($monedaLogic->getmoneda());
				$this->idmonedaDefaultFK=$monedaLogic->getmoneda()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=parametro_general_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombospaissFK($paiss){

		foreach ($paiss as $paisLocal ) {
			if($this->idpaisDefaultFK==0) {
				$this->idpaisDefaultFK=$paisLocal->getId();
			}

			$this->paissFK[$paisLocal->getId()]=parametro_general_util::getpaisDescripcion($paisLocal);
		}
	}

	public function prepararCombosmonedasFK($monedas){

		foreach ($monedas as $monedaLocal ) {
			if($this->idmonedaDefaultFK==0) {
				$this->idmonedaDefaultFK=$monedaLocal->getId();
			}

			$this->monedasFK[$monedaLocal->getId()]=parametro_general_util::getmonedaDescripcion($monedaLocal);
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

			$strDescripcionempresa=parametro_general_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
	}

	public function cargarDescripcionpaisFK($idpais,$connexion=null){
		$paisLogic= new pais_logic();
		$paisLogic->setConnexion($connexion);
		$paisLogic->getpaisDataAccess()->isForFKData=true;
		$strDescripcionpais='';

		if($idpais!=null && $idpais!='' && $idpais!='null') {
			if($connexion!=null) {
				$paisLogic->getEntity($idpais);//WithConnection
			} else {
				$paisLogic->getEntityWithConnection($idpais);//
			}

			$strDescripcionpais=parametro_general_util::getpaisDescripcion($paisLogic->getpais());

		} else {
			$strDescripcionpais='null';
		}

		return $strDescripcionpais;
	}

	public function cargarDescripcionmonedaFK($idmoneda,$connexion=null){
		$monedaLogic= new moneda_logic();
		$monedaLogic->setConnexion($connexion);
		$monedaLogic->getmonedaDataAccess()->isForFKData=true;
		$strDescripcionmoneda='';

		if($idmoneda!=null && $idmoneda!='' && $idmoneda!='null') {
			if($connexion!=null) {
				$monedaLogic->getEntity($idmoneda);//WithConnection
			} else {
				$monedaLogic->getEntityWithConnection($idmoneda);//
			}

			$strDescripcionmoneda=parametro_general_util::getmonedaDescripcion($monedaLogic->getmoneda());

		} else {
			$strDescripcionmoneda='null';
		}

		return $strDescripcionmoneda;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(parametro_general $parametro_generalClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$parametro_generalClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
			
			
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
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionempresa;
	}

	public function setVisibleBusquedasParapais($isParapais){
		$strParaVisiblepais='display:table-row';
		$strParaVisibleNegacionpais='display:none';

		if($isParapais) {
			$strParaVisiblepais='display:table-row';
			$strParaVisibleNegacionpais='display:none';
		} else {
			$strParaVisiblepais='display:none';
			$strParaVisibleNegacionpais='display:table-row';
		}


		$strParaVisibleNegacionpais=trim($strParaVisibleNegacionpais);

		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idpais=$strParaVisiblepais;
	}

	public function setVisibleBusquedasParamoneda($isParamoneda){
		$strParaVisiblemoneda='display:table-row';
		$strParaVisibleNegacionmoneda='display:none';

		if($isParamoneda) {
			$strParaVisiblemoneda='display:table-row';
			$strParaVisibleNegacionmoneda='display:none';
		} else {
			$strParaVisiblemoneda='display:none';
			$strParaVisibleNegacionmoneda='display:table-row';
		}


		$strParaVisibleNegacionmoneda=trim($strParaVisibleNegacionmoneda);

		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionmoneda;
		$this->strVisibleFK_Idmoneda=$strParaVisiblemoneda;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionmoneda;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idparametro_generalActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idparametro_generalActual=$idparametro_generalActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.parametro_generalJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.parametro_generalJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarparametro_general,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParapais() {//$idparametro_generalActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idparametro_generalActual=$idparametro_generalActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.pais_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.parametro_generalJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_pais(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',pais_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.parametro_generalJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_pais(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(pais_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarparametro_general,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParamoneda() {//$idparametro_generalActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idparametro_generalActual=$idparametro_generalActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.moneda_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.parametro_generalJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_modena(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',moneda_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.parametro_generalJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_modena(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(moneda_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarparametro_general,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(parametro_general_util::$STR_SESSION_NAME,parametro_general_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$parametro_general_session=$this->Session->read(parametro_general_util::$STR_SESSION_NAME);
				
		if($parametro_general_session==null) {
			$parametro_general_session=new parametro_general_session();		
			//$this->Session->write('parametro_general_session',$parametro_general_session);							
		}
		*/
		
		$parametro_general_session=new parametro_general_session();
    	$parametro_general_session->strPathNavegacionActual=parametro_general_util::$STR_CLASS_WEB_TITULO;
    	$parametro_general_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(parametro_general_util::$STR_SESSION_NAME,serialize($parametro_general_session));		
	}	
	
	public function getSetBusquedasSesionConfig(parametro_general_session $parametro_general_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($parametro_general_session->bitBusquedaDesdeFKSesionFK!=null && $parametro_general_session->bitBusquedaDesdeFKSesionFK==true) {
			if($parametro_general_session->bigIdActualFK!=null && $parametro_general_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$parametro_general_session->bigIdActualFKParaPosibleAtras=$parametro_general_session->bigIdActualFK;*/
			}
				
			$parametro_general_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$parametro_general_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(parametro_general_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($parametro_general_session->bitBusquedaDesdeFKSesionempresa!=null && $parametro_general_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($parametro_general_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(parametro_general_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(parametro_general_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(parametro_general_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($parametro_general_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($parametro_general_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=parametro_general_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$parametro_general_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$parametro_general_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=parametro_general_util::$INT_NUMERO_PAGINACION;

				if($parametro_general_session->intNumeroPaginacion==parametro_general_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_general_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_general_session->intNumeroPaginacion;
				}
			}
			else if($parametro_general_session->bitBusquedaDesdeFKSesionpais!=null && $parametro_general_session->bitBusquedaDesdeFKSesionpais==true)
			{
				if($parametro_general_session->bigidpaisActual!=0) {
					$this->strAccionBusqueda='FK_Idpais';

					$existe_history=HistoryWeb::ExisteElemento(parametro_general_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(parametro_general_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(parametro_general_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($parametro_general_session->bigidpaisActualDescripcion);
						$historyWeb->setIdActual($parametro_general_session->bigidpaisActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=parametro_general_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$parametro_general_session->bigidpaisActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$parametro_general_session->bitBusquedaDesdeFKSesionpais=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=parametro_general_util::$INT_NUMERO_PAGINACION;

				if($parametro_general_session->intNumeroPaginacion==parametro_general_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_general_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_general_session->intNumeroPaginacion;
				}
			}
			else if($parametro_general_session->bitBusquedaDesdeFKSesionmoneda!=null && $parametro_general_session->bitBusquedaDesdeFKSesionmoneda==true)
			{
				if($parametro_general_session->bigidmonedaActual!=0) {
					$this->strAccionBusqueda='FK_Idmoneda';

					$existe_history=HistoryWeb::ExisteElemento(parametro_general_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(parametro_general_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(parametro_general_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($parametro_general_session->bigidmonedaActualDescripcion);
						$historyWeb->setIdActual($parametro_general_session->bigidmonedaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=parametro_general_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$parametro_general_session->bigidmonedaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$parametro_general_session->bitBusquedaDesdeFKSesionmoneda=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=parametro_general_util::$INT_NUMERO_PAGINACION;

				if($parametro_general_session->intNumeroPaginacion==parametro_general_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_general_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_general_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$parametro_general_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$parametro_general_session=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME));
		
		if($parametro_general_session==null) {
			$parametro_general_session=new parametro_general_session();
		}
		
		$parametro_general_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$parametro_general_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$parametro_general_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$parametro_general_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idmoneda') {
			$parametro_general_session->id_modena=$this->id_modenaFK_Idmoneda;	

		}
		else if($this->strAccionBusqueda=='FK_Idpais') {
			$parametro_general_session->id_pais=$this->id_paisFK_Idpais;	

		}
		
		$this->Session->write(parametro_general_util::$STR_SESSION_NAME,serialize($parametro_general_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(parametro_general_session $parametro_general_session) {
		
		if($parametro_general_session==null) {
			$parametro_general_session=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME));
		}
		
		if($parametro_general_session==null) {
		   $parametro_general_session=new parametro_general_session();
		}
		
		if($parametro_general_session->strUltimaBusqueda!=null && $parametro_general_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$parametro_general_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$parametro_general_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$parametro_general_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$parametro_general_session->id_empresa;
				$parametro_general_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idmoneda') {
				$this->id_modenaFK_Idmoneda=$parametro_general_session->id_modena;
				$parametro_general_session->id_modena=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idpais') {
				$this->id_paisFK_Idpais=$parametro_general_session->id_pais;
				$parametro_general_session->id_pais=-1;

			}
		}
		
		$parametro_general_session->strUltimaBusqueda='';
		//$parametro_general_session->intNumeroPaginacion=10;
		$parametro_general_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(parametro_general_util::$STR_SESSION_NAME,serialize($parametro_general_session));		
	}
	
	public function parametro_generalsControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idpaisDefaultFK = 0;
		$this->idmonedaDefaultFK = 0;
	}
	
	public function setparametro_generalFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_pais',$this->idpaisDefaultFK);
		$this->setExistDataCampoForm('form','id_modena',$this->idmonedaDefaultFK);
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

		pais::$class;
		pais_carga::$CONTROLLER;

		moneda::$class;
		moneda_carga::$CONTROLLER;
		
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
		interface parametro_general_controlI {	
		
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
		
		public function onLoad(parametro_general_session $parametro_general_session=null);	
		function index(?string $strTypeOnLoadparametro_general='',?string $strTipoPaginaAuxiliarparametro_general='',?string $strTipoUsuarioAuxiliarparametro_general='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadparametro_general='',string $strTipoPaginaAuxiliarparametro_general='',string $strTipoUsuarioAuxiliarparametro_general='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($parametro_generalReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(parametro_general $parametro_generalClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(parametro_general_session $parametro_general_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(parametro_general_session $parametro_general_session);	
		public function parametro_generalsControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setparametro_generalFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
