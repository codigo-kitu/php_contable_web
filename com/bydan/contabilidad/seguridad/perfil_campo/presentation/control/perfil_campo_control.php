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

namespace com\bydan\contabilidad\seguridad\perfil_campo\presentation\control;

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

use com\bydan\contabilidad\seguridad\perfil_campo\business\entity\perfil_campo;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/perfil_campo/util/perfil_campo_carga.php');
use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_carga;

use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_util;
use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_param_return;
use com\bydan\contabilidad\seguridad\perfil_campo\business\logic\perfil_campo_logic;
use com\bydan\contabilidad\seguridad\perfil_campo\presentation\session\perfil_campo_session;


//FK


use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\business\logic\perfil_logic;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;

use com\bydan\contabilidad\seguridad\campo\business\entity\campo;
use com\bydan\contabilidad\seguridad\campo\business\logic\campo_logic;
use com\bydan\contabilidad\seguridad\campo\util\campo_carga;
use com\bydan\contabilidad\seguridad\campo\util\campo_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
perfil_campo_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
perfil_campo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
perfil_campo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
perfil_campo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*perfil_campo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/seguridad/perfil_campo/presentation/control/perfil_campo_init_control.php');
use com\bydan\contabilidad\seguridad\perfil_campo\presentation\control\perfil_campo_init_control;

include_once('com/bydan/contabilidad/seguridad/perfil_campo/presentation/control/perfil_campo_base_control.php');
use com\bydan\contabilidad\seguridad\perfil_campo\presentation\control\perfil_campo_base_control;

class perfil_campo_control extends perfil_campo_base_control {	
	
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
					
					
				if($this->data['todo']==null) {$this->data['todo']=false;} else {if($this->data['todo']=='on') {$this->data['todo']=true;}}
					
				if($this->data['ingreso']==null) {$this->data['ingreso']=false;} else {if($this->data['ingreso']=='on') {$this->data['ingreso']=true;}}
					
				if($this->data['modificacion']==null) {$this->data['modificacion']=false;} else {if($this->data['modificacion']=='on') {$this->data['modificacion']=true;}}
					
				if($this->data['eliminacion']==null) {$this->data['eliminacion']=false;} else {if($this->data['eliminacion']=='on') {$this->data['eliminacion']=true;}}
					
				if($this->data['consulta']==null) {$this->data['consulta']=false;} else {if($this->data['consulta']=='on') {$this->data['consulta']=true;}}
					
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
			
			
			else if($action=="FK_Idcampo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdcampoParaProcesar();
			}
			else if($action=="FK_Idperfil"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdperfilParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaperfil') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idperfil_campoActual=$this->getDataId();
				$this->abrirBusquedaParaperfil();//$idperfil_campoActual
			}
			else if($action=='abrirBusquedaParacampo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idperfil_campoActual=$this->getDataId();
				$this->abrirBusquedaParacampo();//$idperfil_campoActual
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
					
					$perfil_campoController = new perfil_campo_control();
					
					$perfil_campoController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($perfil_campoController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$perfil_campoController = new perfil_campo_control();
						$perfil_campoController = $this;
						
						$jsonResponse = json_encode($perfil_campoController->perfil_campos);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->perfil_campoReturnGeneral==null) {
					$this->perfil_campoReturnGeneral=new perfil_campo_param_return();
				}
				
				echo($this->perfil_campoReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$perfil_campoController=new perfil_campo_control();
		
		$perfil_campoController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$perfil_campoController->usuarioActual=new usuario();
		
		$perfil_campoController->usuarioActual->setId($this->usuarioActual->getId());
		$perfil_campoController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$perfil_campoController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$perfil_campoController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$perfil_campoController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$perfil_campoController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$perfil_campoController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$perfil_campoController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $perfil_campoController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadperfil_campo= $this->getDataGeneralString('strTypeOnLoadperfil_campo');
		$strTipoPaginaAuxiliarperfil_campo= $this->getDataGeneralString('strTipoPaginaAuxiliarperfil_campo');
		$strTipoUsuarioAuxiliarperfil_campo= $this->getDataGeneralString('strTipoUsuarioAuxiliarperfil_campo');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadperfil_campo,$strTipoPaginaAuxiliarperfil_campo,$strTipoUsuarioAuxiliarperfil_campo,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadperfil_campo!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('perfil_campo','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->commitNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->rollbackNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(perfil_campo_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarperfil_campo,$this->strTipoUsuarioAuxiliarperfil_campo,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(perfil_campo_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarperfil_campo,$this->strTipoUsuarioAuxiliarperfil_campo,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->perfil_campoReturnGeneral=new perfil_campo_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->perfil_campoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->perfil_campoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->perfil_campoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->perfil_campoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->perfil_campoReturnGeneral);
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
		$this->perfil_campoReturnGeneral=new perfil_campo_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->perfil_campoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->perfil_campoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->perfil_campoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->perfil_campoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->perfil_campoReturnGeneral);
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
		$this->perfil_campoReturnGeneral=new perfil_campo_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->perfil_campoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->perfil_campoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->perfil_campoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->perfil_campoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->perfil_campoReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->getNewConnexionToDeep();
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
			
			
			$this->perfil_campoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->perfil_campoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->perfil_campoReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->perfil_campoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->perfil_campoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->perfil_campoReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->commitNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->rollbackNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->perfil_campoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->perfil_campoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->perfil_campoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->perfil_campoReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->perfil_campoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->perfil_campoReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->commitNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->rollbackNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->perfil_campoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->perfil_campoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->perfil_campoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->perfil_campoReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->perfil_campoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->perfil_campoReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->commitNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->rollbackNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
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
		
		$this->perfil_campoLogic=new perfil_campo_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->perfil_campo=new perfil_campo();
		
		$this->strTypeOnLoadperfil_campo='onload';
		$this->strTipoPaginaAuxiliarperfil_campo='none';
		$this->strTipoUsuarioAuxiliarperfil_campo='none';	

		$this->intNumeroPaginacion=perfil_campo_util::$INT_NUMERO_PAGINACION;
		
		$this->perfil_campoModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->perfil_campoControllerAdditional=new perfil_campo_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(perfil_campo_session $perfil_campo_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($perfil_campo_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadperfil_campo='',?string $strTipoPaginaAuxiliarperfil_campo='',?string $strTipoUsuarioAuxiliarperfil_campo='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadperfil_campo=$strTypeOnLoadperfil_campo;
			$this->strTipoPaginaAuxiliarperfil_campo=$strTipoPaginaAuxiliarperfil_campo;
			$this->strTipoUsuarioAuxiliarperfil_campo=$strTipoUsuarioAuxiliarperfil_campo;
	
			if($strTipoUsuarioAuxiliarperfil_campo=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->perfil_campo=new perfil_campo();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Perfil Campos';
			
			
			$perfil_campo_session=unserialize($this->Session->read(perfil_campo_util::$STR_SESSION_NAME));
							
			if($perfil_campo_session==null) {
				$perfil_campo_session=new perfil_campo_session();
				
				/*$this->Session->write('perfil_campo_session',$perfil_campo_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($perfil_campo_session->strFuncionJsPadre!=null && $perfil_campo_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$perfil_campo_session->strFuncionJsPadre;
				
				$perfil_campo_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($perfil_campo_session);
			
			if($strTypeOnLoadperfil_campo!=null && $strTypeOnLoadperfil_campo=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$perfil_campo_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$perfil_campo_session->setPaginaPopupVariables(true);
				}
				
				if($perfil_campo_session->intNumeroPaginacion==perfil_campo_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=perfil_campo_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$perfil_campo_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,perfil_campo_util::$STR_SESSION_NAME,'seguridad');																
			
			} else if($strTypeOnLoadperfil_campo!=null && $strTypeOnLoadperfil_campo=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$perfil_campo_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=perfil_campo_util::$INT_NUMERO_PAGINACION;*/
				
				if($perfil_campo_session->intNumeroPaginacion==perfil_campo_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=perfil_campo_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$perfil_campo_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarperfil_campo!=null && $strTipoPaginaAuxiliarperfil_campo=='none') {
				/*$perfil_campo_session->strStyleDivHeader='display:table-row';*/
				
				/*$perfil_campo_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarperfil_campo!=null && $strTipoPaginaAuxiliarperfil_campo=='iframe') {
					/*
					$perfil_campo_session->strStyleDivArbol='display:none';
					$perfil_campo_session->strStyleDivHeader='display:none';
					$perfil_campo_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$perfil_campo_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->perfil_campoClase=new perfil_campo();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=perfil_campo_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(perfil_campo_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->perfil_campoLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->perfil_campoLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->perfil_campoLogic=new perfil_campo_logic();*/
			
			
			$this->perfil_camposModel=null;
			/*new ListDataModel();*/
			
			/*$this->perfil_camposModel.setWrappedData(perfil_campoLogic->getperfil_campos());*/
						
			$this->perfil_campos= array();
			$this->perfil_camposEliminados=array();
			$this->perfil_camposSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= perfil_campo_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->perfil_campo= new perfil_campo();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idcampo='display:table-row';
			$this->strVisibleFK_Idperfil='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarperfil_campo!=null && $strTipoUsuarioAuxiliarperfil_campo!='none' && $strTipoUsuarioAuxiliarperfil_campo!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarperfil_campo);
																
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
				if($strTipoUsuarioAuxiliarperfil_campo!=null && $strTipoUsuarioAuxiliarperfil_campo!='none' && $strTipoUsuarioAuxiliarperfil_campo!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarperfil_campo);
																
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
				if($strTipoUsuarioAuxiliarperfil_campo==null || $strTipoUsuarioAuxiliarperfil_campo=='none' || $strTipoUsuarioAuxiliarperfil_campo=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarperfil_campo,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, perfil_campo_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, perfil_campo_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina perfil_campo');
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
			
			
			//BUSQUEDA INTERNA FK
			$this->idperfilActual=0;
			
			$this->cargarCombosFK(false);
			
			
			//$existe_history=false;
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($perfil_campo_session);
			
			$this->getSetBusquedasSesionConfig($perfil_campo_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteperfil_campos($this->strAccionBusqueda,$this->perfil_campoLogic->getperfil_campos());*/
				} else if($this->strGenerarReporte=='Html')	{
					$perfil_campo_session->strServletGenerarHtmlReporte='perfil_campoServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(perfil_campo_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(perfil_campo_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($perfil_campo_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$perfil_campo_session=unserialize($this->Session->read(perfil_campo_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarperfil_campo!=null && $strTipoUsuarioAuxiliarperfil_campo=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($perfil_campo_session);
			}
								
			$this->set(perfil_campo_util::$STR_SESSION_NAME, $perfil_campo_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($perfil_campo_session);
			
			/*
			$this->perfil_campo->recursive = 0;
			
			$this->perfil_campos=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('perfil_campos', $this->perfil_campos);
			
			$this->set(perfil_campo_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->perfil_campoActual =$this->perfil_campoClase;
			
			/*$this->perfil_campoActual =$this->migrarModelperfil_campo($this->perfil_campoClase);*/
			
			$this->returnHtml(false);
			
			$this->set(perfil_campo_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=perfil_campo_util::$STR_NOMBRE_OPCION;
				
			if(perfil_campo_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=perfil_campo_util::$STR_MODULO_OPCION.perfil_campo_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(perfil_campo_util::$STR_SESSION_NAME,serialize($perfil_campo_session));
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
			/*$perfil_campoClase= (perfil_campo) perfil_camposModel.getRowData();*/
			
			$this->perfil_campoClase->setId($this->perfil_campo->getId());	
			$this->perfil_campoClase->setVersionRow($this->perfil_campo->getVersionRow());	
			$this->perfil_campoClase->setVersionRow($this->perfil_campo->getVersionRow());	
			$this->perfil_campoClase->setid_perfil($this->perfil_campo->getid_perfil());	
			$this->perfil_campoClase->setid_campo($this->perfil_campo->getid_campo());	
			$this->perfil_campoClase->settodo($this->perfil_campo->gettodo());	
			$this->perfil_campoClase->setingreso($this->perfil_campo->getingreso());	
			$this->perfil_campoClase->setmodificacion($this->perfil_campo->getmodificacion());	
			$this->perfil_campoClase->seteliminacion($this->perfil_campo->geteliminacion());	
			$this->perfil_campoClase->setconsulta($this->perfil_campo->getconsulta());	
			$this->perfil_campoClase->setestado($this->perfil_campo->getestado());	
		
			/*$this->Session->write('perfil_campoVersionRowActual', perfil_campo.getVersionRow());*/
			
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
			
			$perfil_campo_session=unserialize($this->Session->read(perfil_campo_util::$STR_SESSION_NAME));
						
			if($perfil_campo_session==null) {
				$perfil_campo_session=new perfil_campo_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('perfil_campo', $this->perfil_campo->read(null, $id));
	
			
			$this->perfil_campo->recursive = 0;
			
			$this->perfil_campos=$this->paginate();
			
			$this->set('perfil_campos', $this->perfil_campos);
	
			if (empty($this->data)) {
				$this->data = $this->perfil_campo->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->perfil_campoLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->perfil_campoClase);
			
			$this->perfil_campoActual=$this->perfil_campoClase;
			
			/*$this->perfil_campoActual =$this->migrarModelperfil_campo($this->perfil_campoClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->perfil_campoLogic->getperfil_campos(),$this->perfil_campoActual);
			
			$this->actualizarControllerConReturnGeneral($this->perfil_campoReturnGeneral);
			
			//$this->perfil_campoReturnGeneral=$this->perfil_campoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->perfil_campoLogic->getperfil_campos(),$this->perfil_campoActual,$this->perfil_campoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->commitNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->rollbackNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$perfil_campo_session=unserialize($this->Session->read(perfil_campo_util::$STR_SESSION_NAME));
						
			if($perfil_campo_session==null) {
				$perfil_campo_session=new perfil_campo_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoperfil_campo', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->perfil_campoClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->perfil_campoClase);
			
			$this->perfil_campoActual =$this->perfil_campoClase;
			
			/*$this->perfil_campoActual =$this->migrarModelperfil_campo($this->perfil_campoClase);*/
			
			$this->setperfil_campoFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->perfil_campoLogic->getperfil_campos(),$this->perfil_campo);
			
			$this->actualizarControllerConReturnGeneral($this->perfil_campoReturnGeneral);
			
			//this->perfil_campoReturnGeneral=$this->perfil_campoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->perfil_campoLogic->getperfil_campos(),$this->perfil_campo,$this->perfil_campoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idperfilDefaultFK!=null && $this->idperfilDefaultFK > -1) {
				$this->perfil_campoReturnGeneral->getperfil_campo()->setid_perfil($this->idperfilDefaultFK);
			}

			if($this->idcampoDefaultFK!=null && $this->idcampoDefaultFK > -1) {
				$this->perfil_campoReturnGeneral->getperfil_campo()->setid_campo($this->idcampoDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->perfil_campoReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->perfil_campoReturnGeneral->getperfil_campo(),$this->perfil_campoActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyperfil_campo($this->perfil_campoReturnGeneral->getperfil_campo());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioperfil_campo($this->perfil_campoReturnGeneral->getperfil_campo());*/
			}
			
			if($this->perfil_campoReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->perfil_campoReturnGeneral->getperfil_campo(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualperfil_campo($this->perfil_campo,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->commitNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->rollbackNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->perfil_camposAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->perfil_camposAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->perfil_camposAuxiliar=array();
			}
			
			if(count($this->perfil_camposAuxiliar)==2) {
				$perfil_campoOrigen=$this->perfil_camposAuxiliar[0];
				$perfil_campoDestino=$this->perfil_camposAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($perfil_campoOrigen,$perfil_campoDestino,true,false,false);
				
				$this->actualizarLista($perfil_campoDestino,$this->perfil_campos);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->commitNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->rollbackNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->perfil_camposAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->perfil_camposAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->perfil_camposAuxiliar=array();
			}
			
			if(count($this->perfil_camposAuxiliar) > 0) {
				foreach ($this->perfil_camposAuxiliar as $perfil_campoSeleccionado) {
					$this->perfil_campo=new perfil_campo();
					
					$this->setCopiarVariablesObjetos($perfil_campoSeleccionado,$this->perfil_campo,true,true,false);
						
					$this->perfil_campos[]=$this->perfil_campo;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->commitNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->rollbackNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->perfil_camposEliminados as $perfil_campoEliminado) {
				$this->perfil_campoLogic->perfil_campos[]=$perfil_campoEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->commitNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->rollbackNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->perfil_campo=new perfil_campo();
							
				$this->perfil_campos[]=$this->perfil_campo;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->commitNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->rollbackNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
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
		
		$perfil_campoActual=new perfil_campo();
		
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
				
				$perfil_campoActual=$this->perfil_campos[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $perfil_campoActual->setid_perfil((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $perfil_campoActual->setid_campo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $perfil_campoActual->settodo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_5')));  } else { $perfil_campoActual->settodo(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $perfil_campoActual->setingreso(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_6')));  } else { $perfil_campoActual->setingreso(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $perfil_campoActual->setmodificacion(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_7')));  } else { $perfil_campoActual->setmodificacion(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $perfil_campoActual->seteliminacion(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_8')));  } else { $perfil_campoActual->seteliminacion(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $perfil_campoActual->setconsulta(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_9')));  } else { $perfil_campoActual->setconsulta(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $perfil_campoActual->setestado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_10')));  } else { $perfil_campoActual->setestado(false); }
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
				$this->perfil_campoLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=perfil_campo_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->commitNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->rollbackNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadperfil_campo='',string $strTipoPaginaAuxiliarperfil_campo='',string $strTipoUsuarioAuxiliarperfil_campo='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadperfil_campo,$strTipoPaginaAuxiliarperfil_campo,$strTipoUsuarioAuxiliarperfil_campo,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->perfil_campos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->commitNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->rollbackNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=perfil_campo_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=perfil_campo_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=perfil_campo_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$perfil_campo_session=unserialize($this->Session->read(perfil_campo_util::$STR_SESSION_NAME));
						
			if($perfil_campo_session==null) {
				$perfil_campo_session=new perfil_campo_session();
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
					/*$this->intNumeroPaginacion=perfil_campo_util::$INT_NUMERO_PAGINACION;*/
					
					if($perfil_campo_session->intNumeroPaginacion==perfil_campo_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=perfil_campo_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$perfil_campo_session->intNumeroPaginacion;
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
			
			$this->perfil_camposEliminados=array();
			
			/*$this->perfil_campoLogic->setConnexion($connexion);*/
			
			$this->perfil_campoLogic->setIsConDeep(true);
			
			$this->perfil_campoLogic->getperfil_campoDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('perfil');$classes[]=$class;
			$class=new Classe('campo');$classes[]=$class;
			
			$this->perfil_campoLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->perfil_campoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->perfil_campoLogic->getperfil_campos()==null|| count($this->perfil_campoLogic->getperfil_campos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->perfil_campos=$this->perfil_campoLogic->getperfil_campos();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->perfil_campoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->perfil_camposReporte=$this->perfil_campoLogic->getperfil_campos();
									
						/*$this->generarReportes('Todos',$this->perfil_campoLogic->getperfil_campos());*/
					
						$this->perfil_campoLogic->setperfil_campos($this->perfil_campos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->perfil_campoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->perfil_campoLogic->getperfil_campos()==null|| count($this->perfil_campoLogic->getperfil_campos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->perfil_campos=$this->perfil_campoLogic->getperfil_campos();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->perfil_campoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->perfil_camposReporte=$this->perfil_campoLogic->getperfil_campos();
									
						/*$this->generarReportes('Todos',$this->perfil_campoLogic->getperfil_campos());*/
					
						$this->perfil_campoLogic->setperfil_campos($this->perfil_campos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idperfil_campo=0;*/
				
				if($perfil_campo_session->bitBusquedaDesdeFKSesionFK!=null && $perfil_campo_session->bitBusquedaDesdeFKSesionFK==true) {
					if($perfil_campo_session->bigIdActualFK!=null && $perfil_campo_session->bigIdActualFK!=0)	{
						$this->idperfil_campo=$perfil_campo_session->bigIdActualFK;	
					}
					
					$perfil_campo_session->bitBusquedaDesdeFKSesionFK=false;
					
					$perfil_campo_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idperfil_campo=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idperfil_campo=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->perfil_campoLogic->getEntity($this->idperfil_campo);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*perfil_campoLogicAdditional::getDetalleIndicePorId($idperfil_campo);*/

				
				if($this->perfil_campoLogic->getperfil_campo()!=null) {
					$this->perfil_campoLogic->setperfil_campos(array());
					$this->perfil_campoLogic->perfil_campos[]=$this->perfil_campoLogic->getperfil_campo();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idcampo')
			{

				if($perfil_campo_session->bigidcampoActual!=null && $perfil_campo_session->bigidcampoActual!=0)
				{
					$this->id_campoFK_Idcampo=$perfil_campo_session->bigidcampoActual;
					$perfil_campo_session->bigidcampoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfil_campoLogic->getsFK_Idcampo($finalQueryPaginacion,$this->pagination,$this->id_campoFK_Idcampo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//perfil_campoLogicAdditional::getDetalleIndiceFK_Idcampo($this->id_campoFK_Idcampo);


					if($this->perfil_campoLogic->getperfil_campos()==null || count($this->perfil_campoLogic->getperfil_campos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$perfil_campos=$this->perfil_campoLogic->getperfil_campos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfil_campoLogic->getsFK_Idcampo('',$this->pagination,$this->id_campoFK_Idcampo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->perfil_camposReporte=$this->perfil_campoLogic->getperfil_campos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteperfil_campos("FK_Idcampo",$this->perfil_campoLogic->getperfil_campos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->perfil_campoLogic->setperfil_campos($perfil_campos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idperfil')
			{

				if($perfil_campo_session->bigidperfilActual!=null && $perfil_campo_session->bigidperfilActual!=0)
				{
					$this->id_perfilFK_Idperfil=$perfil_campo_session->bigidperfilActual;
					$perfil_campo_session->bigidperfilActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfil_campoLogic->getsFK_Idperfil($finalQueryPaginacion,$this->pagination,$this->id_perfilFK_Idperfil);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//perfil_campoLogicAdditional::getDetalleIndiceFK_Idperfil($this->id_perfilFK_Idperfil);


					if($this->perfil_campoLogic->getperfil_campos()==null || count($this->perfil_campoLogic->getperfil_campos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$perfil_campos=$this->perfil_campoLogic->getperfil_campos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfil_campoLogic->getsFK_Idperfil('',$this->pagination,$this->id_perfilFK_Idperfil);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->perfil_camposReporte=$this->perfil_campoLogic->getperfil_campos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteperfil_campos("FK_Idperfil",$this->perfil_campoLogic->getperfil_campos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->perfil_campoLogic->setperfil_campos($perfil_campos);
					}
				//}

			} 
		
		$perfil_campo_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$perfil_campo_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->perfil_campoLogic->loadForeignsKeysDescription();*/
		
		$this->perfil_campos=$this->perfil_campoLogic->getperfil_campos();
		
		if($this->perfil_camposEliminados==null) {
			$this->perfil_camposEliminados=array();
		}
		
		$this->Session->write(perfil_campo_util::$STR_SESSION_NAME.'Lista',serialize($this->perfil_campos));
		$this->Session->write(perfil_campo_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->perfil_camposEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(perfil_campo_util::$STR_SESSION_NAME,serialize($perfil_campo_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idperfil_campo=$idGeneral;
			
			$this->intNumeroPaginacion=perfil_campo_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->commitNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->rollbackNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->getNewConnexionToDeep();
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
				$this->perfil_campoLogic->commitNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->rollbackNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->getNewConnexionToDeep();
			}

			if(count($this->perfil_campos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->commitNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->rollbackNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_IdcampoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=perfil_campo_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_campoFK_Idcampo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcampo','cmbid_campo');

			$this->strAccionBusqueda='FK_Idcampo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->commitNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->rollbackNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdperfilParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=perfil_campo_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_perfilFK_Idperfil=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idperfil','cmbid_perfil');

			$this->strAccionBusqueda='FK_Idperfil';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->commitNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->rollbackNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idcampo($strFinalQuery,$id_campo)
	{
		try
		{

			$this->perfil_campoLogic->getsFK_Idcampo($strFinalQuery,new Pagination(),$id_campo);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idperfil($strFinalQuery,$id_perfil)
	{
		try
		{

			$this->perfil_campoLogic->getsFK_Idperfil($strFinalQuery,new Pagination(),$id_perfil);
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
			
			
			$perfil_campoForeignKey=new perfil_campo_param_return(); //perfil_campoForeignKey();
			
			$perfil_campo_session=unserialize($this->Session->read(perfil_campo_util::$STR_SESSION_NAME));
						
			if($perfil_campo_session==null) {
				$perfil_campo_session=new perfil_campo_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$perfil_campoForeignKey=$this->perfil_campoLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$perfil_campo_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_perfil',$this->strRecargarFkTipos,',')) {
				$this->perfilsFK=$perfil_campoForeignKey->perfilsFK;
				$this->idperfilDefaultFK=$perfil_campoForeignKey->idperfilDefaultFK;
			}

			if($perfil_campo_session->bitBusquedaDesdeFKSesionperfil) {
				$this->setVisibleBusquedasParaperfil(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_campo',$this->strRecargarFkTipos,',')) {
				$this->camposFK=$perfil_campoForeignKey->camposFK;
				$this->idcampoDefaultFK=$perfil_campoForeignKey->idcampoDefaultFK;
			}

			if($perfil_campo_session->bitBusquedaDesdeFKSesioncampo) {
				$this->setVisibleBusquedasParacampo(true);
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
	
	function cargarCombosFKFromReturnGeneral($perfil_campoReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$perfil_campoReturnGeneral->strRecargarFkTipos;
			
			


			if($perfil_campoReturnGeneral->con_perfilsFK==true) {
				$this->perfilsFK=$perfil_campoReturnGeneral->perfilsFK;
				$this->idperfilDefaultFK=$perfil_campoReturnGeneral->idperfilDefaultFK;
			}


			if($perfil_campoReturnGeneral->con_camposFK==true) {
				$this->camposFK=$perfil_campoReturnGeneral->camposFK;
				$this->idcampoDefaultFK=$perfil_campoReturnGeneral->idcampoDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(perfil_campo_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$perfil_campo_session=unserialize($this->Session->read(perfil_campo_util::$STR_SESSION_NAME));
		
		if($perfil_campo_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($perfil_campo_session->getstrNombrePaginaNavegacionHaciaFKDesde()==perfil_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='perfil';
			}
			else if($perfil_campo_session->getstrNombrePaginaNavegacionHaciaFKDesde()==campo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='campo';
			}
			
			$perfil_campo_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->getNewConnexionToDeep();
			}						
			
			$this->perfil_camposAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->perfil_camposAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->perfil_camposAuxiliar=array();
			}
			
			if(count($this->perfil_camposAuxiliar) > 0) {
				
				foreach ($this->perfil_camposAuxiliar as $perfil_campoSeleccionado) {
					$this->eliminarTablaBase($perfil_campoSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->commitNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->rollbackNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
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
	
	
	
	public function getperfilsFKListSelectItem() 
	{
		$perfilsList=array();

		$item=null;

		foreach($this->perfilsFK as $perfil)
		{
			$item=new SelectItem();
			$item->setLabel($perfil->getnombre());
			$item->setValue($perfil->getId());
			$perfilsList[]=$item;
		}

		return $perfilsList;
	}


	public function getcamposFKListSelectItem() 
	{
		$camposList=array();

		$item=null;

		foreach($this->camposFK as $campo)
		{
			$item=new SelectItem();
			$item->setLabel($campo->getcodigo());
			$item->setValue($campo->getId());
			$camposList[]=$item;
		}

		return $camposList;
	}


	
	
	//BUSQUEDA INTERNA FK
	public function seleccionarperfilActual($idperfilActual=0) {
		try	{
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			$this->idperfilActual=$idperfilActual;
			$perfilAux=new perfil();
			$perfilLogic= new perfil_logic();
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$perfilLogic->getEntity($this->idperfilActual);/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			$perfilAux= $perfilLogic->getperfil();

			$this->perfilsForeignKey=array();
			//$this->perfilsForeignKey[]=$perfilAux;
			$this->perfilsForeignKey[$perfilAux->getId()]=perfil_campo_util::getperfilDescripcion($perfilAux);

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}	
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=perfil_campo_util::$INT_NUMERO_PAGINACION;
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
				$this->perfil_campoLogic->commitNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->rollbackNewConnexionToDeep();
				$this->perfil_campoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$perfil_camposNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->perfil_campos as $perfil_campoLocal) {
				if($perfil_campoLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->perfil_campo=new perfil_campo();
				
				$this->perfil_campo->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->perfil_campos[]=$this->perfil_campo;*/
				
				$perfil_camposNuevos[]=$this->perfil_campo;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('perfil');$classes[]=$class;
				$class=new Classe('campo');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_campoLogic->setperfil_campos($perfil_camposNuevos);
					
				$this->perfil_campoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($perfil_camposNuevos as $perfil_campoNuevo) {
					$this->perfil_campos[]=$perfil_campoNuevo;
				}
				
				/*$this->perfil_campos[]=$perfil_camposNuevos;*/
				
				$this->perfil_campoLogic->setperfil_campos($this->perfil_campos);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($perfil_camposNuevos!=null);
	}
					
	
	public function cargarCombosperfilsFK($connexion=null,$strRecargarFkQuery=''){
		$perfilLogic= new perfil_logic();
		$pagination= new Pagination();
		$this->perfilsFK=array();

		$perfilLogic->setConnexion($connexion);
		$perfilLogic->getperfilDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$perfil_campo_session=unserialize($this->Session->read(perfil_campo_util::$STR_SESSION_NAME));

		if($perfil_campo_session==null) {
			$perfil_campo_session=new perfil_campo_session();
		}
		
		if($perfil_campo_session->bitBusquedaDesdeFKSesionperfil!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=perfil_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalperfil=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalperfil=Funciones::GetFinalQueryAppend($finalQueryGlobalperfil, '');
				$finalQueryGlobalperfil.=perfil_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalperfil.$strRecargarFkQuery;		

				$perfilLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosperfilsFK($perfilLogic->getperfils());

		} else {
			$this->setVisibleBusquedasParaperfil(true);


			if($perfil_campo_session->bigidperfilActual!=null && $perfil_campo_session->bigidperfilActual > 0) {
				$perfilLogic->getEntity($perfil_campo_session->bigidperfilActual);//WithConnection

				$this->perfilsFK[$perfilLogic->getperfil()->getId()]=perfil_campo_util::getperfilDescripcion($perfilLogic->getperfil());
				$this->idperfilDefaultFK=$perfilLogic->getperfil()->getId();
			}
		}
	}

	public function cargarComboscamposFK($connexion=null,$strRecargarFkQuery=''){
		$campoLogic= new campo_logic();
		$pagination= new Pagination();
		$this->camposFK=array();

		$campoLogic->setConnexion($connexion);
		$campoLogic->getcampoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$perfil_campo_session=unserialize($this->Session->read(perfil_campo_util::$STR_SESSION_NAME));

		if($perfil_campo_session==null) {
			$perfil_campo_session=new perfil_campo_session();
		}
		
		if($perfil_campo_session->bitBusquedaDesdeFKSesioncampo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=campo_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcampo=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcampo=Funciones::GetFinalQueryAppend($finalQueryGlobalcampo, '');
				$finalQueryGlobalcampo.=campo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcampo.$strRecargarFkQuery;		

				$campoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscamposFK($campoLogic->getcampos());

		} else {
			$this->setVisibleBusquedasParacampo(true);


			if($perfil_campo_session->bigidcampoActual!=null && $perfil_campo_session->bigidcampoActual > 0) {
				$campoLogic->getEntity($perfil_campo_session->bigidcampoActual);//WithConnection

				$this->camposFK[$campoLogic->getcampo()->getId()]=perfil_campo_util::getcampoDescripcion($campoLogic->getcampo());
				$this->idcampoDefaultFK=$campoLogic->getcampo()->getId();
			}
		}
	}

	
	
	public function prepararCombosperfilsFK($perfils){

		foreach ($perfils as $perfilLocal ) {
			if($this->idperfilDefaultFK==0) {
				$this->idperfilDefaultFK=$perfilLocal->getId();
			}

			$this->perfilsFK[$perfilLocal->getId()]=perfil_campo_util::getperfilDescripcion($perfilLocal);
		}
	}

	public function prepararComboscamposFK($campos){

		foreach ($campos as $campoLocal ) {
			if($this->idcampoDefaultFK==0) {
				$this->idcampoDefaultFK=$campoLocal->getId();
			}

			$this->camposFK[$campoLocal->getId()]=perfil_campo_util::getcampoDescripcion($campoLocal);
		}
	}

	
	
	public function cargarDescripcionperfilFK($idperfil,$connexion=null){
		$perfilLogic= new perfil_logic();
		$perfilLogic->setConnexion($connexion);
		$perfilLogic->getperfilDataAccess()->isForFKData=true;
		$strDescripcionperfil='';

		if($idperfil!=null && $idperfil!='' && $idperfil!='null') {
			if($connexion!=null) {
				$perfilLogic->getEntity($idperfil);//WithConnection
			} else {
				$perfilLogic->getEntityWithConnection($idperfil);//
			}

			$strDescripcionperfil=perfil_campo_util::getperfilDescripcion($perfilLogic->getperfil());

		} else {
			$strDescripcionperfil='null';
		}

		return $strDescripcionperfil;
	}

	public function cargarDescripcioncampoFK($idcampo,$connexion=null){
		$campoLogic= new campo_logic();
		$campoLogic->setConnexion($connexion);
		$campoLogic->getcampoDataAccess()->isForFKData=true;
		$strDescripcioncampo='';

		if($idcampo!=null && $idcampo!='' && $idcampo!='null') {
			if($connexion!=null) {
				$campoLogic->getEntity($idcampo);//WithConnection
			} else {
				$campoLogic->getEntityWithConnection($idcampo);//
			}

			$strDescripcioncampo=perfil_campo_util::getcampoDescripcion($campoLogic->getcampo());

		} else {
			$strDescripcioncampo='null';
		}

		return $strDescripcioncampo;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(perfil_campo $perfil_campoClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParaperfil($isParaperfil){
		$strParaVisibleperfil='display:table-row';
		$strParaVisibleNegacionperfil='display:none';

		if($isParaperfil) {
			$strParaVisibleperfil='display:table-row';
			$strParaVisibleNegacionperfil='display:none';
		} else {
			$strParaVisibleperfil='display:none';
			$strParaVisibleNegacionperfil='display:table-row';
		}


		$strParaVisibleNegacionperfil=trim($strParaVisibleNegacionperfil);

		$this->strVisibleFK_Idcampo=$strParaVisibleNegacionperfil;
		$this->strVisibleFK_Idperfil=$strParaVisibleperfil;
	}

	public function setVisibleBusquedasParacampo($isParacampo){
		$strParaVisiblecampo='display:table-row';
		$strParaVisibleNegacioncampo='display:none';

		if($isParacampo) {
			$strParaVisiblecampo='display:table-row';
			$strParaVisibleNegacioncampo='display:none';
		} else {
			$strParaVisiblecampo='display:none';
			$strParaVisibleNegacioncampo='display:table-row';
		}


		$strParaVisibleNegacioncampo=trim($strParaVisibleNegacioncampo);

		$this->strVisibleFK_Idcampo=$strParaVisiblecampo;
		$this->strVisibleFK_Idperfil=$strParaVisibleNegacioncampo;
	}
	
	

	public function abrirBusquedaParaperfil() {//$idperfil_campoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idperfil_campoActual=$idperfil_campoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.perfil_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.perfil_campoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_perfil(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',perfil_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.perfil_campoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_perfil(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(perfil_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarperfil_campo,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacampo() {//$idperfil_campoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idperfil_campoActual=$idperfil_campoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.campo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.perfil_campoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_campo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',campo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.perfil_campoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_campo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(campo_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarperfil_campo,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(perfil_campo_util::$STR_SESSION_NAME,perfil_campo_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$perfil_campo_session=$this->Session->read(perfil_campo_util::$STR_SESSION_NAME);
				
		if($perfil_campo_session==null) {
			$perfil_campo_session=new perfil_campo_session();		
			//$this->Session->write('perfil_campo_session',$perfil_campo_session);							
		}
		*/
		
		$perfil_campo_session=new perfil_campo_session();
    	$perfil_campo_session->strPathNavegacionActual=perfil_campo_util::$STR_CLASS_WEB_TITULO;
    	$perfil_campo_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(perfil_campo_util::$STR_SESSION_NAME,serialize($perfil_campo_session));		
	}	
	
	public function getSetBusquedasSesionConfig(perfil_campo_session $perfil_campo_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($perfil_campo_session->bitBusquedaDesdeFKSesionFK!=null && $perfil_campo_session->bitBusquedaDesdeFKSesionFK==true) {
			if($perfil_campo_session->bigIdActualFK!=null && $perfil_campo_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$perfil_campo_session->bigIdActualFKParaPosibleAtras=$perfil_campo_session->bigIdActualFK;*/
			}
				
			$perfil_campo_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$perfil_campo_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(perfil_campo_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($perfil_campo_session->bitBusquedaDesdeFKSesionperfil!=null && $perfil_campo_session->bitBusquedaDesdeFKSesionperfil==true)
			{
				if($perfil_campo_session->bigidperfilActual!=0) {
					$this->strAccionBusqueda='FK_Idperfil';

					$existe_history=HistoryWeb::ExisteElemento(perfil_campo_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(perfil_campo_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(perfil_campo_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($perfil_campo_session->bigidperfilActualDescripcion);
						$historyWeb->setIdActual($perfil_campo_session->bigidperfilActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=perfil_campo_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$perfil_campo_session->bigidperfilActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$perfil_campo_session->bitBusquedaDesdeFKSesionperfil=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=perfil_campo_util::$INT_NUMERO_PAGINACION;

				if($perfil_campo_session->intNumeroPaginacion==perfil_campo_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=perfil_campo_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$perfil_campo_session->intNumeroPaginacion;
				}
			}
			else if($perfil_campo_session->bitBusquedaDesdeFKSesioncampo!=null && $perfil_campo_session->bitBusquedaDesdeFKSesioncampo==true)
			{
				if($perfil_campo_session->bigidcampoActual!=0) {
					$this->strAccionBusqueda='FK_Idcampo';

					$existe_history=HistoryWeb::ExisteElemento(perfil_campo_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(perfil_campo_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(perfil_campo_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($perfil_campo_session->bigidcampoActualDescripcion);
						$historyWeb->setIdActual($perfil_campo_session->bigidcampoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=perfil_campo_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$perfil_campo_session->bigidcampoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$perfil_campo_session->bitBusquedaDesdeFKSesioncampo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=perfil_campo_util::$INT_NUMERO_PAGINACION;

				if($perfil_campo_session->intNumeroPaginacion==perfil_campo_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=perfil_campo_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$perfil_campo_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$perfil_campo_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$perfil_campo_session=unserialize($this->Session->read(perfil_campo_util::$STR_SESSION_NAME));
		
		if($perfil_campo_session==null) {
			$perfil_campo_session=new perfil_campo_session();
		}
		
		$perfil_campo_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$perfil_campo_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$perfil_campo_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idcampo') {
			$perfil_campo_session->id_campo=$this->id_campoFK_Idcampo;	

		}
		else if($this->strAccionBusqueda=='FK_Idperfil') {
			$perfil_campo_session->id_perfil=$this->id_perfilFK_Idperfil;	

		}
		
		$this->Session->write(perfil_campo_util::$STR_SESSION_NAME,serialize($perfil_campo_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(perfil_campo_session $perfil_campo_session) {
		
		if($perfil_campo_session==null) {
			$perfil_campo_session=unserialize($this->Session->read(perfil_campo_util::$STR_SESSION_NAME));
		}
		
		if($perfil_campo_session==null) {
		   $perfil_campo_session=new perfil_campo_session();
		}
		
		if($perfil_campo_session->strUltimaBusqueda!=null && $perfil_campo_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$perfil_campo_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$perfil_campo_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$perfil_campo_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idcampo') {
				$this->id_campoFK_Idcampo=$perfil_campo_session->id_campo;
				$perfil_campo_session->id_campo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idperfil') {
				$this->id_perfilFK_Idperfil=$perfil_campo_session->id_perfil;
				$perfil_campo_session->id_perfil=-1;

			}
		}
		
		$perfil_campo_session->strUltimaBusqueda='';
		//$perfil_campo_session->intNumeroPaginacion=10;
		$perfil_campo_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(perfil_campo_util::$STR_SESSION_NAME,serialize($perfil_campo_session));		
	}
	
	public function perfil_camposControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idperfilDefaultFK = 0;
		$this->idcampoDefaultFK = 0;
	}
	
	public function setperfil_campoFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_perfil',$this->idperfilDefaultFK);
		$this->setExistDataCampoForm('form','id_campo',$this->idcampoDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		perfil::$class;
		perfil_carga::$CONTROLLER;

		campo::$class;
		campo_carga::$CONTROLLER;
		
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
		interface perfil_campo_controlI {	
		
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
		
		public function onLoad(perfil_campo_session $perfil_campo_session=null);	
		function index(?string $strTypeOnLoadperfil_campo='',?string $strTipoPaginaAuxiliarperfil_campo='',?string $strTipoUsuarioAuxiliarperfil_campo='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadperfil_campo='',string $strTipoPaginaAuxiliarperfil_campo='',string $strTipoUsuarioAuxiliarperfil_campo='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($perfil_campoReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(perfil_campo $perfil_campoClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(perfil_campo_session $perfil_campo_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(perfil_campo_session $perfil_campo_session);	
		public function perfil_camposControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setperfil_campoFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
