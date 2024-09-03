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

namespace com\bydan\contabilidad\cuentascorrientes\instrumento_pago\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\business\entity\instrumento_pago;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/instrumento_pago/util/instrumento_pago_carga.php');
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\util\instrumento_pago_carga;

use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\util\instrumento_pago_util;
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\util\instrumento_pago_param_return;
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\business\logic\instrumento_pago_logic;
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\presentation\session\instrumento_pago_session;


//FK


use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
instrumento_pago_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
instrumento_pago_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
instrumento_pago_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
instrumento_pago_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*instrumento_pago_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/cuentascorrientes/instrumento_pago/presentation/control/instrumento_pago_init_control.php');
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\presentation\control\instrumento_pago_init_control;

include_once('com/bydan/contabilidad/cuentascorrientes/instrumento_pago/presentation/control/instrumento_pago_base_control.php');
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\presentation\control\instrumento_pago_base_control;

class instrumento_pago_control extends instrumento_pago_base_control {	
	
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
			
			
			else if($action=="FK_Idcuenta_compras"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcuenta_comprasParaProcesar();
			}
			else if($action=="FK_Idcuenta_corriente"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcuenta_corrienteParaProcesar();
			}
			else if($action=="FK_Idcuenta_ventas"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcuenta_ventasParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParacuenta_compras') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idinstrumento_pagoActual=$this->getDataId();
				$this->abrirBusquedaParacuenta_compras();//$idinstrumento_pagoActual
			}
			else if($action=='abrirBusquedaParacuenta_ventas') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idinstrumento_pagoActual=$this->getDataId();
				$this->abrirBusquedaParacuenta_ventas();//$idinstrumento_pagoActual
			}
			else if($action=='abrirBusquedaParacuenta_corriente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idinstrumento_pagoActual=$this->getDataId();
				$this->abrirBusquedaParacuenta_corriente();//$idinstrumento_pagoActual
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
					
					$instrumento_pagoController = new instrumento_pago_control();
					
					$instrumento_pagoController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($instrumento_pagoController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$instrumento_pagoController = new instrumento_pago_control();
						$instrumento_pagoController = $this;
						
						$jsonResponse = json_encode($instrumento_pagoController->instrumento_pagos);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->instrumento_pagoReturnGeneral==null) {
					$this->instrumento_pagoReturnGeneral=new instrumento_pago_param_return();
				}
				
				echo($this->instrumento_pagoReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$instrumento_pagoController=new instrumento_pago_control();
		
		$instrumento_pagoController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$instrumento_pagoController->usuarioActual=new usuario();
		
		$instrumento_pagoController->usuarioActual->setId($this->usuarioActual->getId());
		$instrumento_pagoController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$instrumento_pagoController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$instrumento_pagoController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$instrumento_pagoController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$instrumento_pagoController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$instrumento_pagoController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$instrumento_pagoController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $instrumento_pagoController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadinstrumento_pago= $this->getDataGeneralString('strTypeOnLoadinstrumento_pago');
		$strTipoPaginaAuxiliarinstrumento_pago= $this->getDataGeneralString('strTipoPaginaAuxiliarinstrumento_pago');
		$strTipoUsuarioAuxiliarinstrumento_pago= $this->getDataGeneralString('strTipoUsuarioAuxiliarinstrumento_pago');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadinstrumento_pago,$strTipoPaginaAuxiliarinstrumento_pago,$strTipoUsuarioAuxiliarinstrumento_pago,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadinstrumento_pago!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('instrumento_pago','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->commitNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->rollbackNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(instrumento_pago_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliarinstrumento_pago,$this->strTipoUsuarioAuxiliarinstrumento_pago,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(instrumento_pago_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliarinstrumento_pago,$this->strTipoUsuarioAuxiliarinstrumento_pago,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->instrumento_pagoReturnGeneral=new instrumento_pago_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->instrumento_pagoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->instrumento_pagoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->instrumento_pagoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->instrumento_pagoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->instrumento_pagoReturnGeneral);
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
		$this->instrumento_pagoReturnGeneral=new instrumento_pago_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->instrumento_pagoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->instrumento_pagoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->instrumento_pagoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->instrumento_pagoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->instrumento_pagoReturnGeneral);
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
		$this->instrumento_pagoReturnGeneral=new instrumento_pago_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->instrumento_pagoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->instrumento_pagoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->instrumento_pagoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->instrumento_pagoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->instrumento_pagoReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->getNewConnexionToDeep();
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
			
			
			$this->instrumento_pagoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->instrumento_pagoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->instrumento_pagoReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->instrumento_pagoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->instrumento_pagoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->instrumento_pagoReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->commitNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->rollbackNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->instrumento_pagoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->instrumento_pagoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->instrumento_pagoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->instrumento_pagoReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->instrumento_pagoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->instrumento_pagoReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->commitNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->rollbackNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->instrumento_pagoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->instrumento_pagoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->instrumento_pagoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->instrumento_pagoReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->instrumento_pagoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->instrumento_pagoReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->commitNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->rollbackNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
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
		
		$this->instrumento_pagoLogic=new instrumento_pago_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->instrumento_pago=new instrumento_pago();
		
		$this->strTypeOnLoadinstrumento_pago='onload';
		$this->strTipoPaginaAuxiliarinstrumento_pago='none';
		$this->strTipoUsuarioAuxiliarinstrumento_pago='none';	

		$this->intNumeroPaginacion=instrumento_pago_util::$INT_NUMERO_PAGINACION;
		
		$this->instrumento_pagoModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->instrumento_pagoControllerAdditional=new instrumento_pago_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(instrumento_pago_session $instrumento_pago_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($instrumento_pago_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadinstrumento_pago='',?string $strTipoPaginaAuxiliarinstrumento_pago='',?string $strTipoUsuarioAuxiliarinstrumento_pago='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadinstrumento_pago=$strTypeOnLoadinstrumento_pago;
			$this->strTipoPaginaAuxiliarinstrumento_pago=$strTipoPaginaAuxiliarinstrumento_pago;
			$this->strTipoUsuarioAuxiliarinstrumento_pago=$strTipoUsuarioAuxiliarinstrumento_pago;
	
			if($strTipoUsuarioAuxiliarinstrumento_pago=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->instrumento_pago=new instrumento_pago();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Instrumento Pagos';
			
			
			$instrumento_pago_session=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME));
							
			if($instrumento_pago_session==null) {
				$instrumento_pago_session=new instrumento_pago_session();
				
				/*$this->Session->write('instrumento_pago_session',$instrumento_pago_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($instrumento_pago_session->strFuncionJsPadre!=null && $instrumento_pago_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$instrumento_pago_session->strFuncionJsPadre;
				
				$instrumento_pago_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($instrumento_pago_session);
			
			if($strTypeOnLoadinstrumento_pago!=null && $strTypeOnLoadinstrumento_pago=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$instrumento_pago_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$instrumento_pago_session->setPaginaPopupVariables(true);
				}
				
				if($instrumento_pago_session->intNumeroPaginacion==instrumento_pago_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=instrumento_pago_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$instrumento_pago_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,instrumento_pago_util::$STR_SESSION_NAME,'cuentascorrientes');																
			
			} else if($strTypeOnLoadinstrumento_pago!=null && $strTypeOnLoadinstrumento_pago=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$instrumento_pago_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=instrumento_pago_util::$INT_NUMERO_PAGINACION;*/
				
				if($instrumento_pago_session->intNumeroPaginacion==instrumento_pago_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=instrumento_pago_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$instrumento_pago_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarinstrumento_pago!=null && $strTipoPaginaAuxiliarinstrumento_pago=='none') {
				/*$instrumento_pago_session->strStyleDivHeader='display:table-row';*/
				
				/*$instrumento_pago_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarinstrumento_pago!=null && $strTipoPaginaAuxiliarinstrumento_pago=='iframe') {
					/*
					$instrumento_pago_session->strStyleDivArbol='display:none';
					$instrumento_pago_session->strStyleDivHeader='display:none';
					$instrumento_pago_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$instrumento_pago_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->instrumento_pagoClase=new instrumento_pago();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=instrumento_pago_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(instrumento_pago_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->instrumento_pagoLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->instrumento_pagoLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->instrumento_pagoLogic=new instrumento_pago_logic();*/
			
			
			$this->instrumento_pagosModel=null;
			/*new ListDataModel();*/
			
			/*$this->instrumento_pagosModel.setWrappedData(instrumento_pagoLogic->getinstrumento_pagos());*/
						
			$this->instrumento_pagos= array();
			$this->instrumento_pagosEliminados=array();
			$this->instrumento_pagosSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= instrumento_pago_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->instrumento_pago= new instrumento_pago();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idcuenta_compras='display:table-row';
			$this->strVisibleFK_Idcuenta_corriente='display:table-row';
			$this->strVisibleFK_Idcuenta_ventas='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarinstrumento_pago!=null && $strTipoUsuarioAuxiliarinstrumento_pago!='none' && $strTipoUsuarioAuxiliarinstrumento_pago!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarinstrumento_pago);
																
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
				if($strTipoUsuarioAuxiliarinstrumento_pago!=null && $strTipoUsuarioAuxiliarinstrumento_pago!='none' && $strTipoUsuarioAuxiliarinstrumento_pago!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarinstrumento_pago);
																
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
				if($strTipoUsuarioAuxiliarinstrumento_pago==null || $strTipoUsuarioAuxiliarinstrumento_pago=='none' || $strTipoUsuarioAuxiliarinstrumento_pago=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarinstrumento_pago,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, instrumento_pago_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, instrumento_pago_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina instrumento_pago');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($instrumento_pago_session);
			
			$this->getSetBusquedasSesionConfig($instrumento_pago_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteinstrumento_pagos($this->strAccionBusqueda,$this->instrumento_pagoLogic->getinstrumento_pagos());*/
				} else if($this->strGenerarReporte=='Html')	{
					$instrumento_pago_session->strServletGenerarHtmlReporte='instrumento_pagoServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(instrumento_pago_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(instrumento_pago_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($instrumento_pago_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$instrumento_pago_session=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarinstrumento_pago!=null && $strTipoUsuarioAuxiliarinstrumento_pago=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($instrumento_pago_session);
			}
								
			$this->set(instrumento_pago_util::$STR_SESSION_NAME, $instrumento_pago_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($instrumento_pago_session);
			
			/*
			$this->instrumento_pago->recursive = 0;
			
			$this->instrumento_pagos=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('instrumento_pagos', $this->instrumento_pagos);
			
			$this->set(instrumento_pago_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->instrumento_pagoActual =$this->instrumento_pagoClase;
			
			/*$this->instrumento_pagoActual =$this->migrarModelinstrumento_pago($this->instrumento_pagoClase);*/
			
			$this->returnHtml(false);
			
			$this->set(instrumento_pago_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=instrumento_pago_util::$STR_NOMBRE_OPCION;
				
			if(instrumento_pago_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=instrumento_pago_util::$STR_MODULO_OPCION.instrumento_pago_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(instrumento_pago_util::$STR_SESSION_NAME,serialize($instrumento_pago_session));
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
			/*$instrumento_pagoClase= (instrumento_pago) instrumento_pagosModel.getRowData();*/
			
			$this->instrumento_pagoClase->setId($this->instrumento_pago->getId());	
			$this->instrumento_pagoClase->setVersionRow($this->instrumento_pago->getVersionRow());	
			$this->instrumento_pagoClase->setVersionRow($this->instrumento_pago->getVersionRow());	
			$this->instrumento_pagoClase->setcodigo($this->instrumento_pago->getcodigo());	
			$this->instrumento_pagoClase->setdescripcion($this->instrumento_pago->getdescripcion());	
			$this->instrumento_pagoClase->setpredeterminado($this->instrumento_pago->getpredeterminado());	
			$this->instrumento_pagoClase->setid_cuenta_compras($this->instrumento_pago->getid_cuenta_compras());	
			$this->instrumento_pagoClase->setid_cuenta_ventas($this->instrumento_pago->getid_cuenta_ventas());	
			$this->instrumento_pagoClase->setcuenta_contable_compra($this->instrumento_pago->getcuenta_contable_compra());	
			$this->instrumento_pagoClase->setcuenta_contable_ventas($this->instrumento_pago->getcuenta_contable_ventas());	
			$this->instrumento_pagoClase->setid_cuenta_corriente($this->instrumento_pago->getid_cuenta_corriente());	
		
			/*$this->Session->write('instrumento_pagoVersionRowActual', instrumento_pago.getVersionRow());*/
			
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
			
			$instrumento_pago_session=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME));
						
			if($instrumento_pago_session==null) {
				$instrumento_pago_session=new instrumento_pago_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('instrumento_pago', $this->instrumento_pago->read(null, $id));
	
			
			$this->instrumento_pago->recursive = 0;
			
			$this->instrumento_pagos=$this->paginate();
			
			$this->set('instrumento_pagos', $this->instrumento_pagos);
	
			if (empty($this->data)) {
				$this->data = $this->instrumento_pago->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->instrumento_pagoLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->instrumento_pagoClase);
			
			$this->instrumento_pagoActual=$this->instrumento_pagoClase;
			
			/*$this->instrumento_pagoActual =$this->migrarModelinstrumento_pago($this->instrumento_pagoClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->instrumento_pagoLogic->getinstrumento_pagos(),$this->instrumento_pagoActual);
			
			$this->actualizarControllerConReturnGeneral($this->instrumento_pagoReturnGeneral);
			
			//$this->instrumento_pagoReturnGeneral=$this->instrumento_pagoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->instrumento_pagoLogic->getinstrumento_pagos(),$this->instrumento_pagoActual,$this->instrumento_pagoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->commitNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->rollbackNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$instrumento_pago_session=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME));
						
			if($instrumento_pago_session==null) {
				$instrumento_pago_session=new instrumento_pago_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoinstrumento_pago', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->instrumento_pagoClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->instrumento_pagoClase);
			
			$this->instrumento_pagoActual =$this->instrumento_pagoClase;
			
			/*$this->instrumento_pagoActual =$this->migrarModelinstrumento_pago($this->instrumento_pagoClase);*/
			
			$this->setinstrumento_pagoFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->instrumento_pagoLogic->getinstrumento_pagos(),$this->instrumento_pago);
			
			$this->actualizarControllerConReturnGeneral($this->instrumento_pagoReturnGeneral);
			
			//this->instrumento_pagoReturnGeneral=$this->instrumento_pagoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->instrumento_pagoLogic->getinstrumento_pagos(),$this->instrumento_pago,$this->instrumento_pagoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idcuenta_comprasDefaultFK!=null && $this->idcuenta_comprasDefaultFK > -1) {
				$this->instrumento_pagoReturnGeneral->getinstrumento_pago()->setid_cuenta_compras($this->idcuenta_comprasDefaultFK);
			}

			if($this->idcuenta_ventasDefaultFK!=null && $this->idcuenta_ventasDefaultFK > -1) {
				$this->instrumento_pagoReturnGeneral->getinstrumento_pago()->setid_cuenta_ventas($this->idcuenta_ventasDefaultFK);
			}

			if($this->idcuenta_corrienteDefaultFK!=null && $this->idcuenta_corrienteDefaultFK > -1) {
				$this->instrumento_pagoReturnGeneral->getinstrumento_pago()->setid_cuenta_corriente($this->idcuenta_corrienteDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->instrumento_pagoReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->instrumento_pagoReturnGeneral->getinstrumento_pago(),$this->instrumento_pagoActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyinstrumento_pago($this->instrumento_pagoReturnGeneral->getinstrumento_pago());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioinstrumento_pago($this->instrumento_pagoReturnGeneral->getinstrumento_pago());*/
			}
			
			if($this->instrumento_pagoReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->instrumento_pagoReturnGeneral->getinstrumento_pago(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualinstrumento_pago($this->instrumento_pago,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->commitNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->rollbackNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->instrumento_pagosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->instrumento_pagosAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->instrumento_pagosAuxiliar=array();
			}
			
			if(count($this->instrumento_pagosAuxiliar)==2) {
				$instrumento_pagoOrigen=$this->instrumento_pagosAuxiliar[0];
				$instrumento_pagoDestino=$this->instrumento_pagosAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($instrumento_pagoOrigen,$instrumento_pagoDestino,true,false,false);
				
				$this->actualizarLista($instrumento_pagoDestino,$this->instrumento_pagos);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->commitNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->rollbackNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->instrumento_pagosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->instrumento_pagosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->instrumento_pagosAuxiliar=array();
			}
			
			if(count($this->instrumento_pagosAuxiliar) > 0) {
				foreach ($this->instrumento_pagosAuxiliar as $instrumento_pagoSeleccionado) {
					$this->instrumento_pago=new instrumento_pago();
					
					$this->setCopiarVariablesObjetos($instrumento_pagoSeleccionado,$this->instrumento_pago,true,true,false);
						
					$this->instrumento_pagos[]=$this->instrumento_pago;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->commitNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->rollbackNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->instrumento_pagosEliminados as $instrumento_pagoEliminado) {
				$this->instrumento_pagoLogic->instrumento_pagos[]=$instrumento_pagoEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->commitNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->rollbackNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->instrumento_pago=new instrumento_pago();
							
				$this->instrumento_pagos[]=$this->instrumento_pago;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->commitNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->rollbackNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
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
		
		$instrumento_pagoActual=new instrumento_pago();
		
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
				
				$instrumento_pagoActual=$this->instrumento_pagos[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $instrumento_pagoActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $instrumento_pagoActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $instrumento_pagoActual->setpredeterminado((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $instrumento_pagoActual->setid_cuenta_compras((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $instrumento_pagoActual->setid_cuenta_ventas((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $instrumento_pagoActual->setcuenta_contable_compra($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $instrumento_pagoActual->setcuenta_contable_ventas($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $instrumento_pagoActual->setid_cuenta_corriente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
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
				$this->instrumento_pagoLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=instrumento_pago_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->commitNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->rollbackNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadinstrumento_pago='',string $strTipoPaginaAuxiliarinstrumento_pago='',string $strTipoUsuarioAuxiliarinstrumento_pago='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadinstrumento_pago,$strTipoPaginaAuxiliarinstrumento_pago,$strTipoUsuarioAuxiliarinstrumento_pago,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->instrumento_pagos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->commitNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->rollbackNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=instrumento_pago_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=instrumento_pago_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=instrumento_pago_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$instrumento_pago_session=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME));
						
			if($instrumento_pago_session==null) {
				$instrumento_pago_session=new instrumento_pago_session();
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
					/*$this->intNumeroPaginacion=instrumento_pago_util::$INT_NUMERO_PAGINACION;*/
					
					if($instrumento_pago_session->intNumeroPaginacion==instrumento_pago_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=instrumento_pago_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$instrumento_pago_session->intNumeroPaginacion;
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
			
			$this->instrumento_pagosEliminados=array();
			
			/*$this->instrumento_pagoLogic->setConnexion($connexion);*/
			
			$this->instrumento_pagoLogic->setIsConDeep(true);
			
			$this->instrumento_pagoLogic->getinstrumento_pagoDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('cuenta_compras');$classes[]=$class;
			$class=new Classe('cuenta_ventas');$classes[]=$class;
			$class=new Classe('cuenta_corriente');$classes[]=$class;
			
			$this->instrumento_pagoLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->instrumento_pagoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->instrumento_pagoLogic->getinstrumento_pagos()==null|| count($this->instrumento_pagoLogic->getinstrumento_pagos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->instrumento_pagos=$this->instrumento_pagoLogic->getinstrumento_pagos();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->instrumento_pagoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->instrumento_pagosReporte=$this->instrumento_pagoLogic->getinstrumento_pagos();
									
						/*$this->generarReportes('Todos',$this->instrumento_pagoLogic->getinstrumento_pagos());*/
					
						$this->instrumento_pagoLogic->setinstrumento_pagos($this->instrumento_pagos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->instrumento_pagoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->instrumento_pagoLogic->getinstrumento_pagos()==null|| count($this->instrumento_pagoLogic->getinstrumento_pagos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->instrumento_pagos=$this->instrumento_pagoLogic->getinstrumento_pagos();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->instrumento_pagoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->instrumento_pagosReporte=$this->instrumento_pagoLogic->getinstrumento_pagos();
									
						/*$this->generarReportes('Todos',$this->instrumento_pagoLogic->getinstrumento_pagos());*/
					
						$this->instrumento_pagoLogic->setinstrumento_pagos($this->instrumento_pagos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idinstrumento_pago=0;*/
				
				if($instrumento_pago_session->bitBusquedaDesdeFKSesionFK!=null && $instrumento_pago_session->bitBusquedaDesdeFKSesionFK==true) {
					if($instrumento_pago_session->bigIdActualFK!=null && $instrumento_pago_session->bigIdActualFK!=0)	{
						$this->idinstrumento_pago=$instrumento_pago_session->bigIdActualFK;	
					}
					
					$instrumento_pago_session->bitBusquedaDesdeFKSesionFK=false;
					
					$instrumento_pago_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idinstrumento_pago=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idinstrumento_pago=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->instrumento_pagoLogic->getEntity($this->idinstrumento_pago);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*instrumento_pagoLogicAdditional::getDetalleIndicePorId($idinstrumento_pago);*/

				
				if($this->instrumento_pagoLogic->getinstrumento_pago()!=null) {
					$this->instrumento_pagoLogic->setinstrumento_pagos(array());
					$this->instrumento_pagoLogic->instrumento_pagos[]=$this->instrumento_pagoLogic->getinstrumento_pago();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idcuenta_compras')
			{

				if($instrumento_pago_session->bigidcuenta_comprasActual!=null && $instrumento_pago_session->bigidcuenta_comprasActual!=0)
				{
					$this->id_cuenta_comprasFK_Idcuenta_compras=$instrumento_pago_session->bigidcuenta_comprasActual;
					$instrumento_pago_session->bigidcuenta_comprasActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->instrumento_pagoLogic->getsFK_Idcuenta_compras($finalQueryPaginacion,$this->pagination,$this->id_cuenta_comprasFK_Idcuenta_compras);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//instrumento_pagoLogicAdditional::getDetalleIndiceFK_Idcuenta_compras($this->id_cuenta_comprasFK_Idcuenta_compras);


					if($this->instrumento_pagoLogic->getinstrumento_pagos()==null || count($this->instrumento_pagoLogic->getinstrumento_pagos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$instrumento_pagos=$this->instrumento_pagoLogic->getinstrumento_pagos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->instrumento_pagoLogic->getsFK_Idcuenta_compras('',$this->pagination,$this->id_cuenta_comprasFK_Idcuenta_compras);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->instrumento_pagosReporte=$this->instrumento_pagoLogic->getinstrumento_pagos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteinstrumento_pagos("FK_Idcuenta_compras",$this->instrumento_pagoLogic->getinstrumento_pagos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->instrumento_pagoLogic->setinstrumento_pagos($instrumento_pagos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcuenta_corriente')
			{

				if($instrumento_pago_session->bigidcuenta_corrienteActual!=null && $instrumento_pago_session->bigidcuenta_corrienteActual!=0)
				{
					$this->id_cuenta_corrienteFK_Idcuenta_corriente=$instrumento_pago_session->bigidcuenta_corrienteActual;
					$instrumento_pago_session->bigidcuenta_corrienteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->instrumento_pagoLogic->getsFK_Idcuenta_corriente($finalQueryPaginacion,$this->pagination,$this->id_cuenta_corrienteFK_Idcuenta_corriente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//instrumento_pagoLogicAdditional::getDetalleIndiceFK_Idcuenta_corriente($this->id_cuenta_corrienteFK_Idcuenta_corriente);


					if($this->instrumento_pagoLogic->getinstrumento_pagos()==null || count($this->instrumento_pagoLogic->getinstrumento_pagos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$instrumento_pagos=$this->instrumento_pagoLogic->getinstrumento_pagos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->instrumento_pagoLogic->getsFK_Idcuenta_corriente('',$this->pagination,$this->id_cuenta_corrienteFK_Idcuenta_corriente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->instrumento_pagosReporte=$this->instrumento_pagoLogic->getinstrumento_pagos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteinstrumento_pagos("FK_Idcuenta_corriente",$this->instrumento_pagoLogic->getinstrumento_pagos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->instrumento_pagoLogic->setinstrumento_pagos($instrumento_pagos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcuenta_ventas')
			{

				if($instrumento_pago_session->bigidcuenta_ventasActual!=null && $instrumento_pago_session->bigidcuenta_ventasActual!=0)
				{
					$this->id_cuenta_ventasFK_Idcuenta_ventas=$instrumento_pago_session->bigidcuenta_ventasActual;
					$instrumento_pago_session->bigidcuenta_ventasActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->instrumento_pagoLogic->getsFK_Idcuenta_ventas($finalQueryPaginacion,$this->pagination,$this->id_cuenta_ventasFK_Idcuenta_ventas);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//instrumento_pagoLogicAdditional::getDetalleIndiceFK_Idcuenta_ventas($this->id_cuenta_ventasFK_Idcuenta_ventas);


					if($this->instrumento_pagoLogic->getinstrumento_pagos()==null || count($this->instrumento_pagoLogic->getinstrumento_pagos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$instrumento_pagos=$this->instrumento_pagoLogic->getinstrumento_pagos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->instrumento_pagoLogic->getsFK_Idcuenta_ventas('',$this->pagination,$this->id_cuenta_ventasFK_Idcuenta_ventas);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->instrumento_pagosReporte=$this->instrumento_pagoLogic->getinstrumento_pagos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteinstrumento_pagos("FK_Idcuenta_ventas",$this->instrumento_pagoLogic->getinstrumento_pagos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->instrumento_pagoLogic->setinstrumento_pagos($instrumento_pagos);
					}
				//}

			} 
		
		$instrumento_pago_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$instrumento_pago_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->instrumento_pagoLogic->loadForeignsKeysDescription();*/
		
		$this->instrumento_pagos=$this->instrumento_pagoLogic->getinstrumento_pagos();
		
		if($this->instrumento_pagosEliminados==null) {
			$this->instrumento_pagosEliminados=array();
		}
		
		$this->Session->write(instrumento_pago_util::$STR_SESSION_NAME.'Lista',serialize($this->instrumento_pagos));
		$this->Session->write(instrumento_pago_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->instrumento_pagosEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(instrumento_pago_util::$STR_SESSION_NAME,serialize($instrumento_pago_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idinstrumento_pago=$idGeneral;
			
			$this->intNumeroPaginacion=instrumento_pago_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->commitNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->rollbackNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->getNewConnexionToDeep();
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
				$this->instrumento_pagoLogic->commitNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->rollbackNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->getNewConnexionToDeep();
			}

			if(count($this->instrumento_pagos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->commitNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->rollbackNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_Idcuenta_comprasParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=instrumento_pago_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuenta_comprasFK_Idcuenta_compras=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta_compras','cmbid_cuenta_compras');

			$this->strAccionBusqueda='FK_Idcuenta_compras';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->commitNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->rollbackNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idcuenta_corrienteParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=instrumento_pago_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuenta_corrienteFK_Idcuenta_corriente=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta_corriente','cmbid_cuenta_corriente');

			$this->strAccionBusqueda='FK_Idcuenta_corriente';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->commitNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->rollbackNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idcuenta_ventasParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=instrumento_pago_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuenta_ventasFK_Idcuenta_ventas=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta_ventas','cmbid_cuenta_ventas');

			$this->strAccionBusqueda='FK_Idcuenta_ventas';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->commitNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->rollbackNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idcuenta_compras($strFinalQuery,$id_cuenta_compras)
	{
		try
		{

			$this->instrumento_pagoLogic->getsFK_Idcuenta_compras($strFinalQuery,new Pagination(),$id_cuenta_compras);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idcuenta_corriente($strFinalQuery,$id_cuenta_corriente)
	{
		try
		{

			$this->instrumento_pagoLogic->getsFK_Idcuenta_corriente($strFinalQuery,new Pagination(),$id_cuenta_corriente);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idcuenta_ventas($strFinalQuery,$id_cuenta_ventas)
	{
		try
		{

			$this->instrumento_pagoLogic->getsFK_Idcuenta_ventas($strFinalQuery,new Pagination(),$id_cuenta_ventas);
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
			
			
			$instrumento_pagoForeignKey=new instrumento_pago_param_return(); //instrumento_pagoForeignKey();
			
			$instrumento_pago_session=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME));
						
			if($instrumento_pago_session==null) {
				$instrumento_pago_session=new instrumento_pago_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$instrumento_pagoForeignKey=$this->instrumento_pagoLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$instrumento_pago_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_compras',$this->strRecargarFkTipos,',')) {
				$this->cuenta_comprassFK=$instrumento_pagoForeignKey->cuenta_comprassFK;
				$this->idcuenta_comprasDefaultFK=$instrumento_pagoForeignKey->idcuenta_comprasDefaultFK;
			}

			if($instrumento_pago_session->bitBusquedaDesdeFKSesioncuenta_compras) {
				$this->setVisibleBusquedasParacuenta_compras(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_ventas',$this->strRecargarFkTipos,',')) {
				$this->cuenta_ventassFK=$instrumento_pagoForeignKey->cuenta_ventassFK;
				$this->idcuenta_ventasDefaultFK=$instrumento_pagoForeignKey->idcuenta_ventasDefaultFK;
			}

			if($instrumento_pago_session->bitBusquedaDesdeFKSesioncuenta_ventas) {
				$this->setVisibleBusquedasParacuenta_ventas(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_corriente',$this->strRecargarFkTipos,',')) {
				$this->cuenta_corrientesFK=$instrumento_pagoForeignKey->cuenta_corrientesFK;
				$this->idcuenta_corrienteDefaultFK=$instrumento_pagoForeignKey->idcuenta_corrienteDefaultFK;
			}

			if($instrumento_pago_session->bitBusquedaDesdeFKSesioncuenta_corriente) {
				$this->setVisibleBusquedasParacuenta_corriente(true);
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
	
	function cargarCombosFKFromReturnGeneral($instrumento_pagoReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$instrumento_pagoReturnGeneral->strRecargarFkTipos;
			
			


			if($instrumento_pagoReturnGeneral->con_cuenta_comprassFK==true) {
				$this->cuenta_comprassFK=$instrumento_pagoReturnGeneral->cuenta_comprassFK;
				$this->idcuenta_comprasDefaultFK=$instrumento_pagoReturnGeneral->idcuenta_comprasDefaultFK;
			}


			if($instrumento_pagoReturnGeneral->con_cuenta_ventassFK==true) {
				$this->cuenta_ventassFK=$instrumento_pagoReturnGeneral->cuenta_ventassFK;
				$this->idcuenta_ventasDefaultFK=$instrumento_pagoReturnGeneral->idcuenta_ventasDefaultFK;
			}


			if($instrumento_pagoReturnGeneral->con_cuenta_corrientesFK==true) {
				$this->cuenta_corrientesFK=$instrumento_pagoReturnGeneral->cuenta_corrientesFK;
				$this->idcuenta_corrienteDefaultFK=$instrumento_pagoReturnGeneral->idcuenta_corrienteDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(instrumento_pago_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$instrumento_pago_session=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME));
		
		if($instrumento_pago_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($instrumento_pago_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta';
			}
			else if($instrumento_pago_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta';
			}
			else if($instrumento_pago_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_corriente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta_corriente';
			}
			
			$instrumento_pago_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->getNewConnexionToDeep();
			}						
			
			$this->instrumento_pagosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->instrumento_pagosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->instrumento_pagosAuxiliar=array();
			}
			
			if(count($this->instrumento_pagosAuxiliar) > 0) {
				
				foreach ($this->instrumento_pagosAuxiliar as $instrumento_pagoSeleccionado) {
					$this->eliminarTablaBase($instrumento_pagoSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->commitNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->rollbackNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
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
	
	
	
	public function getcuenta_comprassFKListSelectItem() 
	{
		$cuenta_comprassList=array();

		$item=null;

		foreach($this->cuenta_comprassFK as $cuenta_compras)
		{
			$item=new SelectItem();
			$item->setLabel($cuenta_compras->getcodigo());
			$item->setValue($cuenta_compras->getId());
			$cuenta_comprassList[]=$item;
		}

		return $cuenta_comprassList;
	}


	public function getcuenta_ventassFKListSelectItem() 
	{
		$cuenta_ventassList=array();

		$item=null;

		foreach($this->cuenta_ventassFK as $cuenta_ventas)
		{
			$item=new SelectItem();
			$item->setLabel($cuenta_ventas->getcodigo());
			$item->setValue($cuenta_ventas->getId());
			$cuenta_ventassList[]=$item;
		}

		return $cuenta_ventassList;
	}


	public function getcuenta_corrientesFKListSelectItem() 
	{
		$cuenta_corrientesList=array();

		$item=null;

		foreach($this->cuenta_corrientesFK as $cuenta_corriente)
		{
			$item=new SelectItem();
			$item->setLabel($cuenta_corriente->getId());
			$item->setValue($cuenta_corriente->getId());
			$cuenta_corrientesList[]=$item;
		}

		return $cuenta_corrientesList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=instrumento_pago_util::$INT_NUMERO_PAGINACION;
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
				$this->instrumento_pagoLogic->commitNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->rollbackNewConnexionToDeep();
				$this->instrumento_pagoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$instrumento_pagosNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->instrumento_pagos as $instrumento_pagoLocal) {
				if($instrumento_pagoLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->instrumento_pago=new instrumento_pago();
				
				$this->instrumento_pago->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->instrumento_pagos[]=$this->instrumento_pago;*/
				
				$instrumento_pagosNuevos[]=$this->instrumento_pago;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('cuenta_compras');$classes[]=$class;
				$class=new Classe('cuenta_ventas');$classes[]=$class;
				$class=new Classe('cuenta_corriente');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->instrumento_pagoLogic->setinstrumento_pagos($instrumento_pagosNuevos);
					
				$this->instrumento_pagoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($instrumento_pagosNuevos as $instrumento_pagoNuevo) {
					$this->instrumento_pagos[]=$instrumento_pagoNuevo;
				}
				
				/*$this->instrumento_pagos[]=$instrumento_pagosNuevos;*/
				
				$this->instrumento_pagoLogic->setinstrumento_pagos($this->instrumento_pagos);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($instrumento_pagosNuevos!=null);
	}
					
	
	public function cargarComboscuenta_comprassFK($connexion=null,$strRecargarFkQuery=''){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$this->cuenta_comprassFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$instrumento_pago_session=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME));

		if($instrumento_pago_session==null) {
			$instrumento_pago_session=new instrumento_pago_session();
		}
		
		if($instrumento_pago_session->bitBusquedaDesdeFKSesioncuenta_compras!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcuenta=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta, '');
				$finalQueryGlobalcuenta.=cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta.$strRecargarFkQuery;		

				$cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscuenta_comprassFK($cuentaLogic->getcuentas());

		} else {
			$this->setVisibleBusquedasParacuenta_compras(true);


			if($instrumento_pago_session->bigidcuenta_comprasActual!=null && $instrumento_pago_session->bigidcuenta_comprasActual > 0) {
				$cuentaLogic->getEntity($instrumento_pago_session->bigidcuenta_comprasActual);//WithConnection

				$this->cuenta_comprassFK[$cuentaLogic->getcuenta()->getId()]=instrumento_pago_util::getcuenta_comprasDescripcion($cuentaLogic->getcuenta());
				$this->idcuenta_comprasDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarComboscuenta_ventassFK($connexion=null,$strRecargarFkQuery=''){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$this->cuenta_ventassFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$instrumento_pago_session=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME));

		if($instrumento_pago_session==null) {
			$instrumento_pago_session=new instrumento_pago_session();
		}
		
		if($instrumento_pago_session->bitBusquedaDesdeFKSesioncuenta_ventas!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcuenta=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta, '');
				$finalQueryGlobalcuenta.=cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta.$strRecargarFkQuery;		

				$cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscuenta_ventassFK($cuentaLogic->getcuentas());

		} else {
			$this->setVisibleBusquedasParacuenta_ventas(true);


			if($instrumento_pago_session->bigidcuenta_ventasActual!=null && $instrumento_pago_session->bigidcuenta_ventasActual > 0) {
				$cuentaLogic->getEntity($instrumento_pago_session->bigidcuenta_ventasActual);//WithConnection

				$this->cuenta_ventassFK[$cuentaLogic->getcuenta()->getId()]=instrumento_pago_util::getcuenta_ventasDescripcion($cuentaLogic->getcuenta());
				$this->idcuenta_ventasDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarComboscuenta_corrientesFK($connexion=null,$strRecargarFkQuery=''){
		$cuenta_corrienteLogic= new cuenta_corriente_logic();
		$pagination= new Pagination();
		$this->cuenta_corrientesFK=array();

		$cuenta_corrienteLogic->setConnexion($connexion);
		$cuenta_corrienteLogic->getcuenta_corrienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$instrumento_pago_session=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME));

		if($instrumento_pago_session==null) {
			$instrumento_pago_session=new instrumento_pago_session();
		}
		
		if($instrumento_pago_session->bitBusquedaDesdeFKSesioncuenta_corriente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_corriente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcuenta_corriente=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta_corriente=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta_corriente, '');
				$finalQueryGlobalcuenta_corriente.=cuenta_corriente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta_corriente.$strRecargarFkQuery;		

				$cuenta_corrienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscuenta_corrientesFK($cuenta_corrienteLogic->getcuenta_corrientes());

		} else {
			$this->setVisibleBusquedasParacuenta_corriente(true);


			if($instrumento_pago_session->bigidcuenta_corrienteActual!=null && $instrumento_pago_session->bigidcuenta_corrienteActual > 0) {
				$cuenta_corrienteLogic->getEntity($instrumento_pago_session->bigidcuenta_corrienteActual);//WithConnection

				$this->cuenta_corrientesFK[$cuenta_corrienteLogic->getcuenta_corriente()->getId()]=instrumento_pago_util::getcuenta_corrienteDescripcion($cuenta_corrienteLogic->getcuenta_corriente());
				$this->idcuenta_corrienteDefaultFK=$cuenta_corrienteLogic->getcuenta_corriente()->getId();
			}
		}
	}

	
	
	public function prepararComboscuenta_comprassFK($cuentas){

		foreach ($cuentas as $cuentaLocal ) {
			if($this->idcuenta_comprasDefaultFK==0) {
				$this->idcuenta_comprasDefaultFK=$cuentaLocal->getId();
			}

			$this->cuenta_comprassFK[$cuentaLocal->getId()]=instrumento_pago_util::getcuenta_comprasDescripcion($cuentaLocal);
		}
	}

	public function prepararComboscuenta_ventassFK($cuentas){

		foreach ($cuentas as $cuentaLocal ) {
			if($this->idcuenta_ventasDefaultFK==0) {
				$this->idcuenta_ventasDefaultFK=$cuentaLocal->getId();
			}

			$this->cuenta_ventassFK[$cuentaLocal->getId()]=instrumento_pago_util::getcuenta_ventasDescripcion($cuentaLocal);
		}
	}

	public function prepararComboscuenta_corrientesFK($cuenta_corrientes){

		foreach ($cuenta_corrientes as $cuenta_corrienteLocal ) {
			if($this->idcuenta_corrienteDefaultFK==0) {
				$this->idcuenta_corrienteDefaultFK=$cuenta_corrienteLocal->getId();
			}

			$this->cuenta_corrientesFK[$cuenta_corrienteLocal->getId()]=instrumento_pago_util::getcuenta_corrienteDescripcion($cuenta_corrienteLocal);
		}
	}

	
	
	public function cargarDescripcioncuenta_comprasFK($idcuenta,$connexion=null){
		$cuentaLogic= new cuenta_logic();
		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$strDescripcioncuenta='';

		if($idcuenta!=null && $idcuenta!='' && $idcuenta!='null') {
			if($connexion!=null) {
				$cuentaLogic->getEntity($idcuenta);//WithConnection
			} else {
				$cuentaLogic->getEntityWithConnection($idcuenta);//
			}

			$strDescripcioncuenta=instrumento_pago_util::getcuenta_comprasDescripcion($cuentaLogic->getcuenta());

		} else {
			$strDescripcioncuenta='null';
		}

		return $strDescripcioncuenta;
	}

	public function cargarDescripcioncuenta_ventasFK($idcuenta,$connexion=null){
		$cuentaLogic= new cuenta_logic();
		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$strDescripcioncuenta='';

		if($idcuenta!=null && $idcuenta!='' && $idcuenta!='null') {
			if($connexion!=null) {
				$cuentaLogic->getEntity($idcuenta);//WithConnection
			} else {
				$cuentaLogic->getEntityWithConnection($idcuenta);//
			}

			$strDescripcioncuenta=instrumento_pago_util::getcuenta_ventasDescripcion($cuentaLogic->getcuenta());

		} else {
			$strDescripcioncuenta='null';
		}

		return $strDescripcioncuenta;
	}

	public function cargarDescripcioncuenta_corrienteFK($idcuenta_corriente,$connexion=null){
		$cuenta_corrienteLogic= new cuenta_corriente_logic();
		$cuenta_corrienteLogic->setConnexion($connexion);
		$cuenta_corrienteLogic->getcuenta_corrienteDataAccess()->isForFKData=true;
		$strDescripcioncuenta_corriente='';

		if($idcuenta_corriente!=null && $idcuenta_corriente!='' && $idcuenta_corriente!='null') {
			if($connexion!=null) {
				$cuenta_corrienteLogic->getEntity($idcuenta_corriente);//WithConnection
			} else {
				$cuenta_corrienteLogic->getEntityWithConnection($idcuenta_corriente);//
			}

			$strDescripcioncuenta_corriente=instrumento_pago_util::getcuenta_corrienteDescripcion($cuenta_corrienteLogic->getcuenta_corriente());

		} else {
			$strDescripcioncuenta_corriente='null';
		}

		return $strDescripcioncuenta_corriente;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(instrumento_pago $instrumento_pagoClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParacuenta_compras($isParacuenta_compras){
		$strParaVisiblecuenta_compras='display:table-row';
		$strParaVisibleNegacioncuenta_compras='display:none';

		if($isParacuenta_compras) {
			$strParaVisiblecuenta_compras='display:table-row';
			$strParaVisibleNegacioncuenta_compras='display:none';
		} else {
			$strParaVisiblecuenta_compras='display:none';
			$strParaVisibleNegacioncuenta_compras='display:table-row';
		}


		$strParaVisibleNegacioncuenta_compras=trim($strParaVisibleNegacioncuenta_compras);

		$this->strVisibleFK_Idcuenta_compras=$strParaVisiblecuenta_compras;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacioncuenta_compras;
		$this->strVisibleFK_Idcuenta_ventas=$strParaVisibleNegacioncuenta_compras;
	}

	public function setVisibleBusquedasParacuenta_ventas($isParacuenta_ventas){
		$strParaVisiblecuenta_ventas='display:table-row';
		$strParaVisibleNegacioncuenta_ventas='display:none';

		if($isParacuenta_ventas) {
			$strParaVisiblecuenta_ventas='display:table-row';
			$strParaVisibleNegacioncuenta_ventas='display:none';
		} else {
			$strParaVisiblecuenta_ventas='display:none';
			$strParaVisibleNegacioncuenta_ventas='display:table-row';
		}


		$strParaVisibleNegacioncuenta_ventas=trim($strParaVisibleNegacioncuenta_ventas);

		$this->strVisibleFK_Idcuenta_compras=$strParaVisibleNegacioncuenta_ventas;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacioncuenta_ventas;
		$this->strVisibleFK_Idcuenta_ventas=$strParaVisiblecuenta_ventas;
	}

	public function setVisibleBusquedasParacuenta_corriente($isParacuenta_corriente){
		$strParaVisiblecuenta_corriente='display:table-row';
		$strParaVisibleNegacioncuenta_corriente='display:none';

		if($isParacuenta_corriente) {
			$strParaVisiblecuenta_corriente='display:table-row';
			$strParaVisibleNegacioncuenta_corriente='display:none';
		} else {
			$strParaVisiblecuenta_corriente='display:none';
			$strParaVisibleNegacioncuenta_corriente='display:table-row';
		}


		$strParaVisibleNegacioncuenta_corriente=trim($strParaVisibleNegacioncuenta_corriente);

		$this->strVisibleFK_Idcuenta_compras=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisiblecuenta_corriente;
		$this->strVisibleFK_Idcuenta_ventas=$strParaVisibleNegacioncuenta_corriente;
	}
	
	

	public function abrirBusquedaParacuenta_compras() {//$idinstrumento_pagoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idinstrumento_pagoActual=$idinstrumento_pagoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.instrumento_pagoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_compras(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.instrumento_pagoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_compras(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarinstrumento_pago,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta_ventas() {//$idinstrumento_pagoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idinstrumento_pagoActual=$idinstrumento_pagoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.instrumento_pagoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_ventas(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.instrumento_pagoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_ventas(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarinstrumento_pago,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta_corriente() {//$idinstrumento_pagoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idinstrumento_pagoActual=$idinstrumento_pagoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_corriente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.instrumento_pagoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_corriente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_corriente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.instrumento_pagoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_corriente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_corriente_util::$STR_CLASS_NAME,'cuentascorrientes','','POPUP','iframe',$this->strTipoUsuarioAuxiliarinstrumento_pago,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(instrumento_pago_util::$STR_SESSION_NAME,instrumento_pago_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$instrumento_pago_session=$this->Session->read(instrumento_pago_util::$STR_SESSION_NAME);
				
		if($instrumento_pago_session==null) {
			$instrumento_pago_session=new instrumento_pago_session();		
			//$this->Session->write('instrumento_pago_session',$instrumento_pago_session);							
		}
		*/
		
		$instrumento_pago_session=new instrumento_pago_session();
    	$instrumento_pago_session->strPathNavegacionActual=instrumento_pago_util::$STR_CLASS_WEB_TITULO;
    	$instrumento_pago_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(instrumento_pago_util::$STR_SESSION_NAME,serialize($instrumento_pago_session));		
	}	
	
	public function getSetBusquedasSesionConfig(instrumento_pago_session $instrumento_pago_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($instrumento_pago_session->bitBusquedaDesdeFKSesionFK!=null && $instrumento_pago_session->bitBusquedaDesdeFKSesionFK==true) {
			if($instrumento_pago_session->bigIdActualFK!=null && $instrumento_pago_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$instrumento_pago_session->bigIdActualFKParaPosibleAtras=$instrumento_pago_session->bigIdActualFK;*/
			}
				
			$instrumento_pago_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$instrumento_pago_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(instrumento_pago_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($instrumento_pago_session->bitBusquedaDesdeFKSesioncuenta_compras!=null && $instrumento_pago_session->bitBusquedaDesdeFKSesioncuenta_compras==true)
			{
				if($instrumento_pago_session->bigidcuenta_comprasActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta_compras';

					$existe_history=HistoryWeb::ExisteElemento(instrumento_pago_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(instrumento_pago_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(instrumento_pago_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($instrumento_pago_session->bigidcuenta_comprasActualDescripcion);
						$historyWeb->setIdActual($instrumento_pago_session->bigidcuenta_comprasActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=instrumento_pago_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$instrumento_pago_session->bigidcuenta_comprasActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$instrumento_pago_session->bitBusquedaDesdeFKSesioncuenta_compras=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=instrumento_pago_util::$INT_NUMERO_PAGINACION;

				if($instrumento_pago_session->intNumeroPaginacion==instrumento_pago_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=instrumento_pago_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$instrumento_pago_session->intNumeroPaginacion;
				}
			}
			else if($instrumento_pago_session->bitBusquedaDesdeFKSesioncuenta_ventas!=null && $instrumento_pago_session->bitBusquedaDesdeFKSesioncuenta_ventas==true)
			{
				if($instrumento_pago_session->bigidcuenta_ventasActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta_ventas';

					$existe_history=HistoryWeb::ExisteElemento(instrumento_pago_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(instrumento_pago_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(instrumento_pago_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($instrumento_pago_session->bigidcuenta_ventasActualDescripcion);
						$historyWeb->setIdActual($instrumento_pago_session->bigidcuenta_ventasActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=instrumento_pago_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$instrumento_pago_session->bigidcuenta_ventasActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$instrumento_pago_session->bitBusquedaDesdeFKSesioncuenta_ventas=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=instrumento_pago_util::$INT_NUMERO_PAGINACION;

				if($instrumento_pago_session->intNumeroPaginacion==instrumento_pago_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=instrumento_pago_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$instrumento_pago_session->intNumeroPaginacion;
				}
			}
			else if($instrumento_pago_session->bitBusquedaDesdeFKSesioncuenta_corriente!=null && $instrumento_pago_session->bitBusquedaDesdeFKSesioncuenta_corriente==true)
			{
				if($instrumento_pago_session->bigidcuenta_corrienteActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta_corriente';

					$existe_history=HistoryWeb::ExisteElemento(instrumento_pago_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(instrumento_pago_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(instrumento_pago_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($instrumento_pago_session->bigidcuenta_corrienteActualDescripcion);
						$historyWeb->setIdActual($instrumento_pago_session->bigidcuenta_corrienteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=instrumento_pago_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$instrumento_pago_session->bigidcuenta_corrienteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$instrumento_pago_session->bitBusquedaDesdeFKSesioncuenta_corriente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=instrumento_pago_util::$INT_NUMERO_PAGINACION;

				if($instrumento_pago_session->intNumeroPaginacion==instrumento_pago_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=instrumento_pago_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$instrumento_pago_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$instrumento_pago_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$instrumento_pago_session=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME));
		
		if($instrumento_pago_session==null) {
			$instrumento_pago_session=new instrumento_pago_session();
		}
		
		$instrumento_pago_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$instrumento_pago_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$instrumento_pago_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idcuenta_compras') {
			$instrumento_pago_session->id_cuenta_compras=$this->id_cuenta_comprasFK_Idcuenta_compras;	

		}
		else if($this->strAccionBusqueda=='FK_Idcuenta_corriente') {
			$instrumento_pago_session->id_cuenta_corriente=$this->id_cuenta_corrienteFK_Idcuenta_corriente;	

		}
		else if($this->strAccionBusqueda=='FK_Idcuenta_ventas') {
			$instrumento_pago_session->id_cuenta_ventas=$this->id_cuenta_ventasFK_Idcuenta_ventas;	

		}
		
		$this->Session->write(instrumento_pago_util::$STR_SESSION_NAME,serialize($instrumento_pago_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(instrumento_pago_session $instrumento_pago_session) {
		
		if($instrumento_pago_session==null) {
			$instrumento_pago_session=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME));
		}
		
		if($instrumento_pago_session==null) {
		   $instrumento_pago_session=new instrumento_pago_session();
		}
		
		if($instrumento_pago_session->strUltimaBusqueda!=null && $instrumento_pago_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$instrumento_pago_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$instrumento_pago_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$instrumento_pago_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idcuenta_compras') {
				$this->id_cuenta_comprasFK_Idcuenta_compras=$instrumento_pago_session->id_cuenta_compras;
				$instrumento_pago_session->id_cuenta_compras=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idcuenta_corriente') {
				$this->id_cuenta_corrienteFK_Idcuenta_corriente=$instrumento_pago_session->id_cuenta_corriente;
				$instrumento_pago_session->id_cuenta_corriente=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idcuenta_ventas') {
				$this->id_cuenta_ventasFK_Idcuenta_ventas=$instrumento_pago_session->id_cuenta_ventas;
				$instrumento_pago_session->id_cuenta_ventas=-1;

			}
		}
		
		$instrumento_pago_session->strUltimaBusqueda='';
		//$instrumento_pago_session->intNumeroPaginacion=10;
		$instrumento_pago_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(instrumento_pago_util::$STR_SESSION_NAME,serialize($instrumento_pago_session));		
	}
	
	public function instrumento_pagosControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idcuenta_comprasDefaultFK = 0;
		$this->idcuenta_ventasDefaultFK = 0;
		$this->idcuenta_corrienteDefaultFK = 0;
	}
	
	public function setinstrumento_pagoFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_cuenta_compras',$this->idcuenta_comprasDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta_ventas',$this->idcuenta_ventasDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta_corriente',$this->idcuenta_corrienteDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		cuenta::$class;
		cuenta_carga::$CONTROLLER;

		cuenta_corriente::$class;
		cuenta_corriente_carga::$CONTROLLER;
		
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
		interface instrumento_pago_controlI {	
		
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
		
		public function onLoad(instrumento_pago_session $instrumento_pago_session=null);	
		function index(?string $strTypeOnLoadinstrumento_pago='',?string $strTipoPaginaAuxiliarinstrumento_pago='',?string $strTipoUsuarioAuxiliarinstrumento_pago='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadinstrumento_pago='',string $strTipoPaginaAuxiliarinstrumento_pago='',string $strTipoUsuarioAuxiliarinstrumento_pago='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($instrumento_pagoReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(instrumento_pago $instrumento_pagoClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(instrumento_pago_session $instrumento_pago_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(instrumento_pago_session $instrumento_pago_session);	
		public function instrumento_pagosControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setinstrumento_pagoFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
