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

namespace com\bydan\contabilidad\general\tipo_termino_pago\presentation\control;

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

use com\bydan\contabilidad\general\tipo_termino_pago\business\entity\tipo_termino_pago;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/tipo_termino_pago/util/tipo_termino_pago_carga.php');
use com\bydan\contabilidad\general\tipo_termino_pago\util\tipo_termino_pago_carga;

use com\bydan\contabilidad\general\tipo_termino_pago\util\tipo_termino_pago_util;
use com\bydan\contabilidad\general\tipo_termino_pago\util\tipo_termino_pago_param_return;
use com\bydan\contabilidad\general\tipo_termino_pago\business\logic\tipo_termino_pago_logic;
use com\bydan\contabilidad\general\tipo_termino_pago\presentation\session\tipo_termino_pago_session;


//FK


//REL


use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\presentation\session\termino_pago_cliente_session;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\presentation\session\termino_pago_proveedor_session;


/*CARGA ARCHIVOS FRAMEWORK*/
tipo_termino_pago_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
tipo_termino_pago_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
tipo_termino_pago_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
tipo_termino_pago_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*tipo_termino_pago_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/general/tipo_termino_pago/presentation/control/tipo_termino_pago_init_control.php');
use com\bydan\contabilidad\general\tipo_termino_pago\presentation\control\tipo_termino_pago_init_control;

include_once('com/bydan/contabilidad/general/tipo_termino_pago/presentation/control/tipo_termino_pago_base_control.php');
use com\bydan\contabilidad\general\tipo_termino_pago\presentation\control\tipo_termino_pago_base_control;

class tipo_termino_pago_control extends tipo_termino_pago_base_control {	
	
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
			else if($action=='registrarSesionParatermino_pago_clientes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idtipo_termino_pagoActual=$this->getDataId();
				$this->registrarSesionParatermino_pago_clientes($idtipo_termino_pagoActual);
			}
			else if($action=='registrarSesionParatermino_pago_proveedores' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idtipo_termino_pagoActual=$this->getDataId();
				$this->registrarSesionParatermino_pago_proveedores($idtipo_termino_pagoActual);
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
					
					$tipo_termino_pagoController = new tipo_termino_pago_control();
					
					$tipo_termino_pagoController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($tipo_termino_pagoController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$tipo_termino_pagoController = new tipo_termino_pago_control();
						$tipo_termino_pagoController = $this;
						
						$jsonResponse = json_encode($tipo_termino_pagoController->tipo_termino_pagos);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->tipo_termino_pagoReturnGeneral==null) {
					$this->tipo_termino_pagoReturnGeneral=new tipo_termino_pago_param_return();
				}
				
				echo($this->tipo_termino_pagoReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$tipo_termino_pagoController=new tipo_termino_pago_control();
		
		$tipo_termino_pagoController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$tipo_termino_pagoController->usuarioActual=new usuario();
		
		$tipo_termino_pagoController->usuarioActual->setId($this->usuarioActual->getId());
		$tipo_termino_pagoController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$tipo_termino_pagoController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$tipo_termino_pagoController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$tipo_termino_pagoController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$tipo_termino_pagoController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$tipo_termino_pagoController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$tipo_termino_pagoController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $tipo_termino_pagoController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadtipo_termino_pago= $this->getDataGeneralString('strTypeOnLoadtipo_termino_pago');
		$strTipoPaginaAuxiliartipo_termino_pago= $this->getDataGeneralString('strTipoPaginaAuxiliartipo_termino_pago');
		$strTipoUsuarioAuxiliartipo_termino_pago= $this->getDataGeneralString('strTipoUsuarioAuxiliartipo_termino_pago');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadtipo_termino_pago,$strTipoPaginaAuxiliartipo_termino_pago,$strTipoUsuarioAuxiliartipo_termino_pago,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadtipo_termino_pago!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('tipo_termino_pago','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->commitNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->rollbackNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_termino_pago_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'general','','POPUP',$this->strTipoPaginaAuxiliartipo_termino_pago,$this->strTipoUsuarioAuxiliartipo_termino_pago,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_termino_pago_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'general','','POPUP',$this->strTipoPaginaAuxiliartipo_termino_pago,$this->strTipoUsuarioAuxiliartipo_termino_pago,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->tipo_termino_pagoReturnGeneral=new tipo_termino_pago_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->tipo_termino_pagoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->tipo_termino_pagoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->tipo_termino_pagoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->tipo_termino_pagoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->tipo_termino_pagoReturnGeneral);
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
		$this->tipo_termino_pagoReturnGeneral=new tipo_termino_pago_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->tipo_termino_pagoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->tipo_termino_pagoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->tipo_termino_pagoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->tipo_termino_pagoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->tipo_termino_pagoReturnGeneral);
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
		$this->tipo_termino_pagoReturnGeneral=new tipo_termino_pago_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->tipo_termino_pagoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->tipo_termino_pagoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->tipo_termino_pagoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->tipo_termino_pagoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->tipo_termino_pagoReturnGeneral);
	}
	
	public function eliminarCascadaAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
					
		$this->eliminarCascada();
	}
	
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->tipo_termino_pagoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->tipo_termino_pagoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->tipo_termino_pagoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->tipo_termino_pagoReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->tipo_termino_pagoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->tipo_termino_pagoReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->commitNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->rollbackNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->tipo_termino_pagoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->tipo_termino_pagoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->tipo_termino_pagoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->tipo_termino_pagoReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->tipo_termino_pagoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->tipo_termino_pagoReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->commitNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->rollbackNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
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
		
		$this->tipo_termino_pagoLogic=new tipo_termino_pago_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->tipo_termino_pago=new tipo_termino_pago();
		
		$this->strTypeOnLoadtipo_termino_pago='onload';
		$this->strTipoPaginaAuxiliartipo_termino_pago='none';
		$this->strTipoUsuarioAuxiliartipo_termino_pago='none';	

		$this->intNumeroPaginacion=tipo_termino_pago_util::$INT_NUMERO_PAGINACION;
		
		$this->tipo_termino_pagoModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->tipo_termino_pagoControllerAdditional=new tipo_termino_pago_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(tipo_termino_pago_session $tipo_termino_pago_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($tipo_termino_pago_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadtipo_termino_pago='',?string $strTipoPaginaAuxiliartipo_termino_pago='',?string $strTipoUsuarioAuxiliartipo_termino_pago='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadtipo_termino_pago=$strTypeOnLoadtipo_termino_pago;
			$this->strTipoPaginaAuxiliartipo_termino_pago=$strTipoPaginaAuxiliartipo_termino_pago;
			$this->strTipoUsuarioAuxiliartipo_termino_pago=$strTipoUsuarioAuxiliartipo_termino_pago;
	
			if($strTipoUsuarioAuxiliartipo_termino_pago=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->tipo_termino_pago=new tipo_termino_pago();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Tipo Termino Pagos';
			
			
			$tipo_termino_pago_session=unserialize($this->Session->read(tipo_termino_pago_util::$STR_SESSION_NAME));
							
			if($tipo_termino_pago_session==null) {
				$tipo_termino_pago_session=new tipo_termino_pago_session();
				
				/*$this->Session->write('tipo_termino_pago_session',$tipo_termino_pago_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($tipo_termino_pago_session->strFuncionJsPadre!=null && $tipo_termino_pago_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$tipo_termino_pago_session->strFuncionJsPadre;
				
				$tipo_termino_pago_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($tipo_termino_pago_session);
			
			if($strTypeOnLoadtipo_termino_pago!=null && $strTypeOnLoadtipo_termino_pago=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$tipo_termino_pago_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$tipo_termino_pago_session->setPaginaPopupVariables(true);
				}
				
				if($tipo_termino_pago_session->intNumeroPaginacion==tipo_termino_pago_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=tipo_termino_pago_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$tipo_termino_pago_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,tipo_termino_pago_util::$STR_SESSION_NAME,'general');																
			
			} else if($strTypeOnLoadtipo_termino_pago!=null && $strTypeOnLoadtipo_termino_pago=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$tipo_termino_pago_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=tipo_termino_pago_util::$INT_NUMERO_PAGINACION;*/
				
				if($tipo_termino_pago_session->intNumeroPaginacion==tipo_termino_pago_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=tipo_termino_pago_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$tipo_termino_pago_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliartipo_termino_pago!=null && $strTipoPaginaAuxiliartipo_termino_pago=='none') {
				/*$tipo_termino_pago_session->strStyleDivHeader='display:table-row';*/
				
				/*$tipo_termino_pago_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliartipo_termino_pago!=null && $strTipoPaginaAuxiliartipo_termino_pago=='iframe') {
					/*
					$tipo_termino_pago_session->strStyleDivArbol='display:none';
					$tipo_termino_pago_session->strStyleDivHeader='display:none';
					$tipo_termino_pago_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$tipo_termino_pago_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->tipo_termino_pagoClase=new tipo_termino_pago();
			
			
			
		
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=tipo_termino_pago_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(tipo_termino_pago_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->tipo_termino_pagoLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->tipo_termino_pagoLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$terminopagoclienteLogic=new termino_pago_cliente_logic();
			//$terminopagoproveedorLogic=new termino_pago_proveedor_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->tipo_termino_pagoLogic=new tipo_termino_pago_logic();*/
			
			
			$this->tipo_termino_pagosModel=null;
			/*new ListDataModel();*/
			
			/*$this->tipo_termino_pagosModel.setWrappedData(tipo_termino_pagoLogic->gettipo_termino_pagos());*/
						
			$this->tipo_termino_pagos= array();
			$this->tipo_termino_pagosEliminados=array();
			$this->tipo_termino_pagosSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= tipo_termino_pago_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= tipo_termino_pago_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->tipo_termino_pago= new tipo_termino_pago();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliartipo_termino_pago!=null && $strTipoUsuarioAuxiliartipo_termino_pago!='none' && $strTipoUsuarioAuxiliartipo_termino_pago!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliartipo_termino_pago);
																
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
				if($strTipoUsuarioAuxiliartipo_termino_pago!=null && $strTipoUsuarioAuxiliartipo_termino_pago!='none' && $strTipoUsuarioAuxiliartipo_termino_pago!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliartipo_termino_pago);
																
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
				if($strTipoUsuarioAuxiliartipo_termino_pago==null || $strTipoUsuarioAuxiliartipo_termino_pago=='none' || $strTipoUsuarioAuxiliartipo_termino_pago=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliartipo_termino_pago,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, tipo_termino_pago_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, tipo_termino_pago_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina tipo_termino_pago');
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
			
			
			
			
			
			//$existe_history=false;
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($tipo_termino_pago_session);
			
			$this->getSetBusquedasSesionConfig($tipo_termino_pago_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportetipo_termino_pagos($this->strAccionBusqueda,$this->tipo_termino_pagoLogic->gettipo_termino_pagos());*/
				} else if($this->strGenerarReporte=='Html')	{
					$tipo_termino_pago_session->strServletGenerarHtmlReporte='tipo_termino_pagoServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(tipo_termino_pago_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(tipo_termino_pago_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($tipo_termino_pago_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$tipo_termino_pago_session=unserialize($this->Session->read(tipo_termino_pago_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliartipo_termino_pago!=null && $strTipoUsuarioAuxiliartipo_termino_pago=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($tipo_termino_pago_session);
			}
								
			$this->set(tipo_termino_pago_util::$STR_SESSION_NAME, $tipo_termino_pago_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($tipo_termino_pago_session);
			
			/*
			$this->tipo_termino_pago->recursive = 0;
			
			$this->tipo_termino_pagos=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('tipo_termino_pagos', $this->tipo_termino_pagos);
			
			$this->set(tipo_termino_pago_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->tipo_termino_pagoActual =$this->tipo_termino_pagoClase;
			
			/*$this->tipo_termino_pagoActual =$this->migrarModeltipo_termino_pago($this->tipo_termino_pagoClase);*/
			
			$this->returnHtml(false);
			
			$this->set(tipo_termino_pago_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=tipo_termino_pago_util::$STR_NOMBRE_OPCION;
				
			if(tipo_termino_pago_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=tipo_termino_pago_util::$STR_MODULO_OPCION.tipo_termino_pago_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(tipo_termino_pago_util::$STR_SESSION_NAME,serialize($tipo_termino_pago_session));
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
			/*$tipo_termino_pagoClase= (tipo_termino_pago) tipo_termino_pagosModel.getRowData();*/
			
			$this->tipo_termino_pagoClase->setId($this->tipo_termino_pago->getId());	
			$this->tipo_termino_pagoClase->setVersionRow($this->tipo_termino_pago->getVersionRow());	
			$this->tipo_termino_pagoClase->setVersionRow($this->tipo_termino_pago->getVersionRow());	
			$this->tipo_termino_pagoClase->setcodigo($this->tipo_termino_pago->getcodigo());	
			$this->tipo_termino_pagoClase->setnombre($this->tipo_termino_pago->getnombre());	
		
			/*$this->Session->write('tipo_termino_pagoVersionRowActual', tipo_termino_pago.getVersionRow());*/
			
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
			
			$tipo_termino_pago_session=unserialize($this->Session->read(tipo_termino_pago_util::$STR_SESSION_NAME));
						
			if($tipo_termino_pago_session==null) {
				$tipo_termino_pago_session=new tipo_termino_pago_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('tipo_termino_pago', $this->tipo_termino_pago->read(null, $id));
	
			
			$this->tipo_termino_pago->recursive = 0;
			
			$this->tipo_termino_pagos=$this->paginate();
			
			$this->set('tipo_termino_pagos', $this->tipo_termino_pagos);
	
			if (empty($this->data)) {
				$this->data = $this->tipo_termino_pago->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->tipo_termino_pagoLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->tipo_termino_pagoClase);
			
			$this->tipo_termino_pagoActual=$this->tipo_termino_pagoClase;
			
			/*$this->tipo_termino_pagoActual =$this->migrarModeltipo_termino_pago($this->tipo_termino_pagoClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->tipo_termino_pagoLogic->gettipo_termino_pagos(),$this->tipo_termino_pagoActual);
			
			$this->actualizarControllerConReturnGeneral($this->tipo_termino_pagoReturnGeneral);
			
			//$this->tipo_termino_pagoReturnGeneral=$this->tipo_termino_pagoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->tipo_termino_pagoLogic->gettipo_termino_pagos(),$this->tipo_termino_pagoActual,$this->tipo_termino_pagoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->commitNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->rollbackNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$tipo_termino_pago_session=unserialize($this->Session->read(tipo_termino_pago_util::$STR_SESSION_NAME));
						
			if($tipo_termino_pago_session==null) {
				$tipo_termino_pago_session=new tipo_termino_pago_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevotipo_termino_pago', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->tipo_termino_pagoClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->tipo_termino_pagoClase);
			
			$this->tipo_termino_pagoActual =$this->tipo_termino_pagoClase;
			
			/*$this->tipo_termino_pagoActual =$this->migrarModeltipo_termino_pago($this->tipo_termino_pagoClase);*/
			
			$this->settipo_termino_pagoFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->tipo_termino_pagoLogic->gettipo_termino_pagos(),$this->tipo_termino_pago);
			
			$this->actualizarControllerConReturnGeneral($this->tipo_termino_pagoReturnGeneral);
			
			//this->tipo_termino_pagoReturnGeneral=$this->tipo_termino_pagoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->tipo_termino_pagoLogic->gettipo_termino_pagos(),$this->tipo_termino_pago,$this->tipo_termino_pagoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
						
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->tipo_termino_pagoReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->tipo_termino_pagoReturnGeneral->gettipo_termino_pago(),$this->tipo_termino_pagoActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeytipo_termino_pago($this->tipo_termino_pagoReturnGeneral->gettipo_termino_pago());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariotipo_termino_pago($this->tipo_termino_pagoReturnGeneral->gettipo_termino_pago());*/
			}
			
			if($this->tipo_termino_pagoReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->tipo_termino_pagoReturnGeneral->gettipo_termino_pago(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualtipo_termino_pago($this->tipo_termino_pago,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->commitNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->rollbackNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->tipo_termino_pagosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->tipo_termino_pagosAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->tipo_termino_pagosAuxiliar=array();
			}
			
			if(count($this->tipo_termino_pagosAuxiliar)==2) {
				$tipo_termino_pagoOrigen=$this->tipo_termino_pagosAuxiliar[0];
				$tipo_termino_pagoDestino=$this->tipo_termino_pagosAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($tipo_termino_pagoOrigen,$tipo_termino_pagoDestino,true,false,false);
				
				$this->actualizarLista($tipo_termino_pagoDestino,$this->tipo_termino_pagos);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->commitNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->rollbackNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->tipo_termino_pagosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->tipo_termino_pagosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->tipo_termino_pagosAuxiliar=array();
			}
			
			if(count($this->tipo_termino_pagosAuxiliar) > 0) {
				foreach ($this->tipo_termino_pagosAuxiliar as $tipo_termino_pagoSeleccionado) {
					$this->tipo_termino_pago=new tipo_termino_pago();
					
					$this->setCopiarVariablesObjetos($tipo_termino_pagoSeleccionado,$this->tipo_termino_pago,true,true,false);
						
					$this->tipo_termino_pagos[]=$this->tipo_termino_pago;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->commitNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->rollbackNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->tipo_termino_pagosEliminados as $tipo_termino_pagoEliminado) {
				$this->tipo_termino_pagoLogic->tipo_termino_pagos[]=$tipo_termino_pagoEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->commitNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->rollbackNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->tipo_termino_pago=new tipo_termino_pago();
							
				$this->tipo_termino_pagos[]=$this->tipo_termino_pago;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->commitNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->rollbackNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
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
		
		$tipo_termino_pagoActual=new tipo_termino_pago();
		
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
				
				$tipo_termino_pagoActual=$this->tipo_termino_pagos[$indice];		
				
				$tipo_termino_pagoActual->setId($this->data['t'.$this->strSufijo]['cel_'.$i.'_0']);
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $tipo_termino_pagoActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $tipo_termino_pagoActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->tipo_termino_pagosAuxiliar=array();		 
		/*$this->tipo_termino_pagosEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->tipo_termino_pagosAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->tipo_termino_pagosAuxiliar=array();
		}
			
		if(count($this->tipo_termino_pagosAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->tipo_termino_pagosAuxiliar as $tipo_termino_pagoAuxLocal) {				
				
				foreach($this->tipo_termino_pagos as $tipo_termino_pagoLocal) {
					if($tipo_termino_pagoLocal->getId()==$tipo_termino_pagoAuxLocal->getId()) {
						$tipo_termino_pagoLocal->setIsDeleted(true);
						
						/*$this->tipo_termino_pagosEliminados[]=$tipo_termino_pagoLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->tipo_termino_pagoLogic->settipo_termino_pagos($this->tipo_termino_pagos);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->commitNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->rollbackNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
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
				$this->tipo_termino_pagoLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=tipo_termino_pago_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->commitNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->rollbackNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadtipo_termino_pago='',string $strTipoPaginaAuxiliartipo_termino_pago='',string $strTipoUsuarioAuxiliartipo_termino_pago='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadtipo_termino_pago,$strTipoPaginaAuxiliartipo_termino_pago,$strTipoUsuarioAuxiliartipo_termino_pago,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->tipo_termino_pagos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->commitNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->rollbackNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=tipo_termino_pago_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=tipo_termino_pago_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=tipo_termino_pago_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$tipo_termino_pago_session=unserialize($this->Session->read(tipo_termino_pago_util::$STR_SESSION_NAME));
						
			if($tipo_termino_pago_session==null) {
				$tipo_termino_pago_session=new tipo_termino_pago_session();
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
					/*$this->intNumeroPaginacion=tipo_termino_pago_util::$INT_NUMERO_PAGINACION;*/
					
					if($tipo_termino_pago_session->intNumeroPaginacion==tipo_termino_pago_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=tipo_termino_pago_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$tipo_termino_pago_session->intNumeroPaginacion;
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
			
			$this->tipo_termino_pagosEliminados=array();
			
			/*$this->tipo_termino_pagoLogic->setConnexion($connexion);*/
			
			$this->tipo_termino_pagoLogic->setIsConDeep(true);
			
			$this->tipo_termino_pagoLogic->gettipo_termino_pagoDataAccess()->isForFKDataRels=true;
			
			
			
			$this->tipo_termino_pagoLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->tipo_termino_pagoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->tipo_termino_pagoLogic->gettipo_termino_pagos()==null|| count($this->tipo_termino_pagoLogic->gettipo_termino_pagos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->tipo_termino_pagos=$this->tipo_termino_pagoLogic->gettipo_termino_pagos();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->tipo_termino_pagoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->tipo_termino_pagosReporte=$this->tipo_termino_pagoLogic->gettipo_termino_pagos();
									
						/*$this->generarReportes('Todos',$this->tipo_termino_pagoLogic->gettipo_termino_pagos());*/
					
						$this->tipo_termino_pagoLogic->settipo_termino_pagos($this->tipo_termino_pagos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->tipo_termino_pagoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->tipo_termino_pagoLogic->gettipo_termino_pagos()==null|| count($this->tipo_termino_pagoLogic->gettipo_termino_pagos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->tipo_termino_pagos=$this->tipo_termino_pagoLogic->gettipo_termino_pagos();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->tipo_termino_pagoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->tipo_termino_pagosReporte=$this->tipo_termino_pagoLogic->gettipo_termino_pagos();
									
						/*$this->generarReportes('Todos',$this->tipo_termino_pagoLogic->gettipo_termino_pagos());*/
					
						$this->tipo_termino_pagoLogic->settipo_termino_pagos($this->tipo_termino_pagos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idtipo_termino_pago=0;*/
				
				if($tipo_termino_pago_session->bitBusquedaDesdeFKSesionFK!=null && $tipo_termino_pago_session->bitBusquedaDesdeFKSesionFK==true) {
					if($tipo_termino_pago_session->bigIdActualFK!=null && $tipo_termino_pago_session->bigIdActualFK!=0)	{
						$this->idtipo_termino_pago=$tipo_termino_pago_session->bigIdActualFK;	
					}
					
					$tipo_termino_pago_session->bitBusquedaDesdeFKSesionFK=false;
					
					$tipo_termino_pago_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idtipo_termino_pago=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idtipo_termino_pago=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->tipo_termino_pagoLogic->getEntity($this->idtipo_termino_pago);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*tipo_termino_pagoLogicAdditional::getDetalleIndicePorId($idtipo_termino_pago);*/

				
				if($this->tipo_termino_pagoLogic->gettipo_termino_pago()!=null) {
					$this->tipo_termino_pagoLogic->settipo_termino_pagos(array());
					$this->tipo_termino_pagoLogic->tipo_termino_pagos[]=$this->tipo_termino_pagoLogic->gettipo_termino_pago();
				}
			
			}
		 
		
		$tipo_termino_pago_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$tipo_termino_pago_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->tipo_termino_pagoLogic->loadForeignsKeysDescription();*/
		
		$this->tipo_termino_pagos=$this->tipo_termino_pagoLogic->gettipo_termino_pagos();
		
		if($this->tipo_termino_pagosEliminados==null) {
			$this->tipo_termino_pagosEliminados=array();
		}
		
		$this->Session->write(tipo_termino_pago_util::$STR_SESSION_NAME.'Lista',serialize($this->tipo_termino_pagos));
		$this->Session->write(tipo_termino_pago_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->tipo_termino_pagosEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(tipo_termino_pago_util::$STR_SESSION_NAME,serialize($tipo_termino_pago_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idtipo_termino_pago=$idGeneral;
			
			$this->intNumeroPaginacion=tipo_termino_pago_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->commitNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->rollbackNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->getNewConnexionToDeep();
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
				$this->tipo_termino_pagoLogic->commitNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->rollbackNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->getNewConnexionToDeep();
			}

			if(count($this->tipo_termino_pagos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->commitNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->rollbackNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	
	
	
		
	
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(tipo_termino_pago_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$tipo_termino_pago_session=unserialize($this->Session->read(tipo_termino_pago_util::$STR_SESSION_NAME));
		
		if($tipo_termino_pago_session->bitPermiteNavegacionHaciaFKDesde) {
			
			
			$tipo_termino_pago_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->getNewConnexionToDeep();
			}						
			
			$this->tipo_termino_pagosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->tipo_termino_pagosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->tipo_termino_pagosAuxiliar=array();
			}
			
			if(count($this->tipo_termino_pagosAuxiliar) > 0) {
				
				foreach ($this->tipo_termino_pagosAuxiliar as $tipo_termino_pagoSeleccionado) {
					$this->eliminarTablaBase($tipo_termino_pagoSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->commitNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->rollbackNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('termino_pago_proveedor');
			$tipoRelacionReporte->setsDescripcion('Terminos Pago Proveedoreses');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('termino_pago_cliente');
			$tipoRelacionReporte->setsDescripcion('Terminos Pago Clientes');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=termino_pago_cliente_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=termino_pago_proveedor_util::$STR_NOMBRE_CLASE;
		
		return $arrNombresClasesRelacionadasLocal;
	}
	
	
	public function setstrRecargarFkInicializar() {
		$this->setstrRecargarFk('TODOS','NINGUNO',0,'');		
	}
	
	
	
	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=tipo_termino_pago_util::$INT_NUMERO_PAGINACION;
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
				$this->tipo_termino_pagoLogic->commitNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_termino_pagoLogic->rollbackNewConnexionToDeep();
				$this->tipo_termino_pagoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$tipo_termino_pagosNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->tipo_termino_pagos as $tipo_termino_pagoLocal) {
				if($tipo_termino_pagoLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->tipo_termino_pago=new tipo_termino_pago();
				
				$this->tipo_termino_pago->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->tipo_termino_pagos[]=$this->tipo_termino_pago;*/
				
				$tipo_termino_pagosNuevos[]=$this->tipo_termino_pago;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($tipo_termino_pagosNuevos!=null);
	}
					
	
	
	
	
	
	
	
	
	public function setVariablesGlobalesCombosFK(tipo_termino_pago $tipo_termino_pagoClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	
	
	
	
	

	public function registrarSesionParatermino_pago_clientes(int $idtipo_termino_pagoActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idtipo_termino_pagoActual=$idtipo_termino_pagoActual;

		$bitPaginaPopuptermino_pago_cliente=false;

		try {

			$tipo_termino_pago_session=unserialize($this->Session->read(tipo_termino_pago_util::$STR_SESSION_NAME));

			if($tipo_termino_pago_session==null) {
				$tipo_termino_pago_session=new tipo_termino_pago_session();
			}

			$termino_pago_cliente_session=unserialize($this->Session->read(termino_pago_cliente_util::$STR_SESSION_NAME));

			if($termino_pago_cliente_session==null) {
				$termino_pago_cliente_session=new termino_pago_cliente_session();
			}

			$termino_pago_cliente_session->strUltimaBusqueda='FK_Idtipo_termino_pago';
			$termino_pago_cliente_session->strPathNavegacionActual=$tipo_termino_pago_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.termino_pago_cliente_util::$STR_CLASS_WEB_TITULO;
			$termino_pago_cliente_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopuptermino_pago_cliente=$termino_pago_cliente_session->bitPaginaPopup;
			$termino_pago_cliente_session->setPaginaPopupVariables(true);
			$bitPaginaPopuptermino_pago_cliente=$termino_pago_cliente_session->bitPaginaPopup;
			$termino_pago_cliente_session->bitPermiteNavegacionHaciaFKDesde=false;
			$termino_pago_cliente_session->strNombrePaginaNavegacionHaciaFKDesde=tipo_termino_pago_util::$STR_NOMBRE_OPCION;
			$termino_pago_cliente_session->bitBusquedaDesdeFKSesiontipo_termino_pago=true;
			$termino_pago_cliente_session->bigidtipo_termino_pagoActual=$this->idtipo_termino_pagoActual;

			$tipo_termino_pago_session->bitBusquedaDesdeFKSesionFK=true;
			$tipo_termino_pago_session->bigIdActualFK=$this->idtipo_termino_pagoActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"termino_pago_cliente"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=tipo_termino_pago_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"termino_pago_cliente"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(tipo_termino_pago_util::$STR_SESSION_NAME,serialize($tipo_termino_pago_session));
			$this->Session->write(termino_pago_cliente_util::$STR_SESSION_NAME,serialize($termino_pago_cliente_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopuptermino_pago_cliente!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',termino_pago_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(termino_pago_cliente_util::$STR_CLASS_NAME,'general','','POPUP',$this->strTipoPaginaAuxiliartipo_termino_pago,$this->strTipoUsuarioAuxiliartipo_termino_pago,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',termino_pago_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(termino_pago_cliente_util::$STR_CLASS_NAME,'general','','NO-POPUP',$this->strTipoPaginaAuxiliartipo_termino_pago,$this->strTipoUsuarioAuxiliartipo_termino_pago,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParatermino_pago_proveedores(int $idtipo_termino_pagoActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idtipo_termino_pagoActual=$idtipo_termino_pagoActual;

		$bitPaginaPopuptermino_pago_proveedor=false;

		try {

			$tipo_termino_pago_session=unserialize($this->Session->read(tipo_termino_pago_util::$STR_SESSION_NAME));

			if($tipo_termino_pago_session==null) {
				$tipo_termino_pago_session=new tipo_termino_pago_session();
			}

			$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));

			if($termino_pago_proveedor_session==null) {
				$termino_pago_proveedor_session=new termino_pago_proveedor_session();
			}

			$termino_pago_proveedor_session->strUltimaBusqueda='FK_Idtipo_termino_pago';
			$termino_pago_proveedor_session->strPathNavegacionActual=$tipo_termino_pago_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.termino_pago_proveedor_util::$STR_CLASS_WEB_TITULO;
			$termino_pago_proveedor_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopuptermino_pago_proveedor=$termino_pago_proveedor_session->bitPaginaPopup;
			$termino_pago_proveedor_session->setPaginaPopupVariables(true);
			$bitPaginaPopuptermino_pago_proveedor=$termino_pago_proveedor_session->bitPaginaPopup;
			$termino_pago_proveedor_session->bitPermiteNavegacionHaciaFKDesde=false;
			$termino_pago_proveedor_session->strNombrePaginaNavegacionHaciaFKDesde=tipo_termino_pago_util::$STR_NOMBRE_OPCION;
			$termino_pago_proveedor_session->bitBusquedaDesdeFKSesiontipo_termino_pago=true;
			$termino_pago_proveedor_session->bigidtipo_termino_pagoActual=$this->idtipo_termino_pagoActual;

			$tipo_termino_pago_session->bitBusquedaDesdeFKSesionFK=true;
			$tipo_termino_pago_session->bigIdActualFK=$this->idtipo_termino_pagoActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"termino_pago_proveedor"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=tipo_termino_pago_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"termino_pago_proveedor"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(tipo_termino_pago_util::$STR_SESSION_NAME,serialize($tipo_termino_pago_session));
			$this->Session->write(termino_pago_proveedor_util::$STR_SESSION_NAME,serialize($termino_pago_proveedor_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopuptermino_pago_proveedor!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',termino_pago_proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(termino_pago_proveedor_util::$STR_CLASS_NAME,'general','','POPUP',$this->strTipoPaginaAuxiliartipo_termino_pago,$this->strTipoUsuarioAuxiliartipo_termino_pago,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',termino_pago_proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(termino_pago_proveedor_util::$STR_CLASS_NAME,'general','','NO-POPUP',$this->strTipoPaginaAuxiliartipo_termino_pago,$this->strTipoUsuarioAuxiliartipo_termino_pago,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(tipo_termino_pago_util::$STR_SESSION_NAME,tipo_termino_pago_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$tipo_termino_pago_session=$this->Session->read(tipo_termino_pago_util::$STR_SESSION_NAME);
				
		if($tipo_termino_pago_session==null) {
			$tipo_termino_pago_session=new tipo_termino_pago_session();		
			//$this->Session->write('tipo_termino_pago_session',$tipo_termino_pago_session);							
		}
		*/
		
		$tipo_termino_pago_session=new tipo_termino_pago_session();
    	$tipo_termino_pago_session->strPathNavegacionActual=tipo_termino_pago_util::$STR_CLASS_WEB_TITULO;
    	$tipo_termino_pago_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(tipo_termino_pago_util::$STR_SESSION_NAME,serialize($tipo_termino_pago_session));		
	}	
	
	public function getSetBusquedasSesionConfig(tipo_termino_pago_session $tipo_termino_pago_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($tipo_termino_pago_session->bitBusquedaDesdeFKSesionFK!=null && $tipo_termino_pago_session->bitBusquedaDesdeFKSesionFK==true) {
			if($tipo_termino_pago_session->bigIdActualFK!=null && $tipo_termino_pago_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$tipo_termino_pago_session->bigIdActualFKParaPosibleAtras=$tipo_termino_pago_session->bigIdActualFK;*/
			}
				
			$tipo_termino_pago_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$tipo_termino_pago_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(tipo_termino_pago_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$tipo_termino_pago_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$tipo_termino_pago_session=unserialize($this->Session->read(tipo_termino_pago_util::$STR_SESSION_NAME));
		
		if($tipo_termino_pago_session==null) {
			$tipo_termino_pago_session=new tipo_termino_pago_session();
		}
		
		$tipo_termino_pago_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$tipo_termino_pago_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$tipo_termino_pago_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		
		$this->Session->write(tipo_termino_pago_util::$STR_SESSION_NAME,serialize($tipo_termino_pago_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(tipo_termino_pago_session $tipo_termino_pago_session) {
		
		if($tipo_termino_pago_session==null) {
			$tipo_termino_pago_session=unserialize($this->Session->read(tipo_termino_pago_util::$STR_SESSION_NAME));
		}
		
		if($tipo_termino_pago_session==null) {
		   $tipo_termino_pago_session=new tipo_termino_pago_session();
		}
		
		if($tipo_termino_pago_session->strUltimaBusqueda!=null && $tipo_termino_pago_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$tipo_termino_pago_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$tipo_termino_pago_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$tipo_termino_pago_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

		}
		
		$tipo_termino_pago_session->strUltimaBusqueda='';
		//$tipo_termino_pago_session->intNumeroPaginacion=10;
		$tipo_termino_pago_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(tipo_termino_pago_util::$STR_SESSION_NAME,serialize($tipo_termino_pago_session));		
	}
	
	public function tipo_termino_pagosControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
	}
	
	public function settipo_termino_pagoFKsDefault() {
	
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		
		
		//REL
		

		termino_pago_cliente_carga::$CONTROLLER;
		termino_pago_cliente_util::$STR_SCHEMA;
		termino_pago_cliente_session::class;

		termino_pago_proveedor_carga::$CONTROLLER;
		termino_pago_proveedor_util::$STR_SCHEMA;
		termino_pago_proveedor_session::class;
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
		interface tipo_termino_pago_controlI {	
		
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
		
		
		
		public function manejarEventosAction();
		public function recargarFormularioGeneralAction();
		
		
		public function mostrarEjecutarAccionesRelacionesAction();
		
		public function generarReporteConPhpExcelAction();	
		public function generarReporteConPhpExcelVerticalAction();	
		public function generarReporteConPhpExcelRelacionesAction();
		
		public function onLoad(tipo_termino_pago_session $tipo_termino_pago_session=null);	
		function index(?string $strTypeOnLoadtipo_termino_pago='',?string $strTipoPaginaAuxiliartipo_termino_pago='',?string $strTipoUsuarioAuxiliartipo_termino_pago='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadtipo_termino_pago='',string $strTipoPaginaAuxiliartipo_termino_pago='',string $strTipoUsuarioAuxiliartipo_termino_pago='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(tipo_termino_pago $tipo_termino_pagoClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(tipo_termino_pago_session $tipo_termino_pago_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(tipo_termino_pago_session $tipo_termino_pago_session);	
		public function tipo_termino_pagosControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function settipo_termino_pagoFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
