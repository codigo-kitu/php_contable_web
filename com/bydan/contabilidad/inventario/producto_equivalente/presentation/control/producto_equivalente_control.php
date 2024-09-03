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

namespace com\bydan\contabilidad\inventario\producto_equivalente\presentation\control;

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

use com\bydan\contabilidad\inventario\producto_equivalente\business\entity\producto_equivalente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/producto_equivalente/util/producto_equivalente_carga.php');
use com\bydan\contabilidad\inventario\producto_equivalente\util\producto_equivalente_carga;

use com\bydan\contabilidad\inventario\producto_equivalente\util\producto_equivalente_util;
use com\bydan\contabilidad\inventario\producto_equivalente\util\producto_equivalente_param_return;
use com\bydan\contabilidad\inventario\producto_equivalente\business\logic\producto_equivalente_logic;
use com\bydan\contabilidad\inventario\producto_equivalente\presentation\session\producto_equivalente_session;


//FK


use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
producto_equivalente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
producto_equivalente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
producto_equivalente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
producto_equivalente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*producto_equivalente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/inventario/producto_equivalente/presentation/control/producto_equivalente_init_control.php');
use com\bydan\contabilidad\inventario\producto_equivalente\presentation\control\producto_equivalente_init_control;

include_once('com/bydan/contabilidad/inventario/producto_equivalente/presentation/control/producto_equivalente_base_control.php');
use com\bydan\contabilidad\inventario\producto_equivalente\presentation\control\producto_equivalente_base_control;

class producto_equivalente_control extends producto_equivalente_base_control {	
	
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
			else if($action=='registrarSesionParaproducto_equivalentes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idproducto_equivalenteActual=$this->getDataId();
				$this->registrarSesionParaproducto_equivalentes($idproducto_equivalenteActual);
			} 
			
			
			else if($action=="FK_Idproducto_equivalente"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idproducto_equivalenteParaProcesar();
			}
			else if($action=="FK_Idproducto_principal"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idproducto_principalParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaproducto_principal') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproducto_equivalenteActual=$this->getDataId();
				$this->abrirBusquedaParaproducto_principal();//$idproducto_equivalenteActual
			}
			else if($action=='abrirBusquedaParaproducto_equivalente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproducto_equivalenteActual=$this->getDataId();
				$this->abrirBusquedaParaproducto_equivalente();//$idproducto_equivalenteActual
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
					
					$producto_equivalenteController = new producto_equivalente_control();
					
					$producto_equivalenteController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($producto_equivalenteController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$producto_equivalenteController = new producto_equivalente_control();
						$producto_equivalenteController = $this;
						
						$jsonResponse = json_encode($producto_equivalenteController->producto_equivalentes);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->producto_equivalenteReturnGeneral==null) {
					$this->producto_equivalenteReturnGeneral=new producto_equivalente_param_return();
				}
				
				echo($this->producto_equivalenteReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$producto_equivalenteController=new producto_equivalente_control();
		
		$producto_equivalenteController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$producto_equivalenteController->usuarioActual=new usuario();
		
		$producto_equivalenteController->usuarioActual->setId($this->usuarioActual->getId());
		$producto_equivalenteController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$producto_equivalenteController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$producto_equivalenteController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$producto_equivalenteController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$producto_equivalenteController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$producto_equivalenteController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$producto_equivalenteController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $producto_equivalenteController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadproducto_equivalente= $this->getDataGeneralString('strTypeOnLoadproducto_equivalente');
		$strTipoPaginaAuxiliarproducto_equivalente= $this->getDataGeneralString('strTipoPaginaAuxiliarproducto_equivalente');
		$strTipoUsuarioAuxiliarproducto_equivalente= $this->getDataGeneralString('strTipoUsuarioAuxiliarproducto_equivalente');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadproducto_equivalente,$strTipoPaginaAuxiliarproducto_equivalente,$strTipoUsuarioAuxiliarproducto_equivalente,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadproducto_equivalente!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('producto_equivalente','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->commitNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->rollbackNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_equivalente_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarproducto_equivalente,$this->strTipoUsuarioAuxiliarproducto_equivalente,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_equivalente_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarproducto_equivalente,$this->strTipoUsuarioAuxiliarproducto_equivalente,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->producto_equivalenteReturnGeneral=new producto_equivalente_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->producto_equivalenteReturnGeneral->conGuardarReturnSessionJs=true;
		$this->producto_equivalenteReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->producto_equivalenteReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->producto_equivalenteReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->producto_equivalenteReturnGeneral);
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
		$this->producto_equivalenteReturnGeneral=new producto_equivalente_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->producto_equivalenteReturnGeneral->conGuardarReturnSessionJs=true;
		$this->producto_equivalenteReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->producto_equivalenteReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->producto_equivalenteReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->producto_equivalenteReturnGeneral);
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
		$this->producto_equivalenteReturnGeneral=new producto_equivalente_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->producto_equivalenteReturnGeneral->conGuardarReturnSessionJs=true;
		$this->producto_equivalenteReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->producto_equivalenteReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->producto_equivalenteReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->producto_equivalenteReturnGeneral);
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
				$this->producto_equivalenteLogic->getNewConnexionToDeep();
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
			
			
			$this->producto_equivalenteReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->producto_equivalenteReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->producto_equivalenteReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->producto_equivalenteReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->producto_equivalenteReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->producto_equivalenteReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->commitNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->rollbackNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
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
				$this->producto_equivalenteLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->producto_equivalenteReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->producto_equivalenteReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->producto_equivalenteReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->producto_equivalenteReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->producto_equivalenteReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->producto_equivalenteReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->commitNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->rollbackNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->producto_equivalenteReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->producto_equivalenteReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->producto_equivalenteReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->producto_equivalenteReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->producto_equivalenteReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->producto_equivalenteReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->commitNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->rollbackNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
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
		
		$this->producto_equivalenteLogic=new producto_equivalente_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->producto_equivalente=new producto_equivalente();
		
		$this->strTypeOnLoadproducto_equivalente='onload';
		$this->strTipoPaginaAuxiliarproducto_equivalente='none';
		$this->strTipoUsuarioAuxiliarproducto_equivalente='none';	

		$this->intNumeroPaginacion=producto_equivalente_util::$INT_NUMERO_PAGINACION;
		
		$this->producto_equivalenteModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->producto_equivalenteControllerAdditional=new producto_equivalente_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(producto_equivalente_session $producto_equivalente_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($producto_equivalente_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadproducto_equivalente='',?string $strTipoPaginaAuxiliarproducto_equivalente='',?string $strTipoUsuarioAuxiliarproducto_equivalente='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadproducto_equivalente=$strTypeOnLoadproducto_equivalente;
			$this->strTipoPaginaAuxiliarproducto_equivalente=$strTipoPaginaAuxiliarproducto_equivalente;
			$this->strTipoUsuarioAuxiliarproducto_equivalente=$strTipoUsuarioAuxiliarproducto_equivalente;
	
			if($strTipoUsuarioAuxiliarproducto_equivalente=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->producto_equivalente=new producto_equivalente();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Producto Equivalentess';
			
			
			$producto_equivalente_session=unserialize($this->Session->read(producto_equivalente_util::$STR_SESSION_NAME));
							
			if($producto_equivalente_session==null) {
				$producto_equivalente_session=new producto_equivalente_session();
				
				/*$this->Session->write('producto_equivalente_session',$producto_equivalente_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($producto_equivalente_session->strFuncionJsPadre!=null && $producto_equivalente_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$producto_equivalente_session->strFuncionJsPadre;
				
				$producto_equivalente_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($producto_equivalente_session);
			
			if($strTypeOnLoadproducto_equivalente!=null && $strTypeOnLoadproducto_equivalente=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$producto_equivalente_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$producto_equivalente_session->setPaginaPopupVariables(true);
				}
				
				if($producto_equivalente_session->intNumeroPaginacion==producto_equivalente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_equivalente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_equivalente_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,producto_equivalente_util::$STR_SESSION_NAME,'inventario');																
			
			} else if($strTypeOnLoadproducto_equivalente!=null && $strTypeOnLoadproducto_equivalente=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$producto_equivalente_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=producto_equivalente_util::$INT_NUMERO_PAGINACION;*/
				
				if($producto_equivalente_session->intNumeroPaginacion==producto_equivalente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_equivalente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_equivalente_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarproducto_equivalente!=null && $strTipoPaginaAuxiliarproducto_equivalente=='none') {
				/*$producto_equivalente_session->strStyleDivHeader='display:table-row';*/
				
				/*$producto_equivalente_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarproducto_equivalente!=null && $strTipoPaginaAuxiliarproducto_equivalente=='iframe') {
					/*
					$producto_equivalente_session->strStyleDivArbol='display:none';
					$producto_equivalente_session->strStyleDivHeader='display:none';
					$producto_equivalente_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$producto_equivalente_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->producto_equivalenteClase=new producto_equivalente();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=producto_equivalente_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(producto_equivalente_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->producto_equivalenteLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->producto_equivalenteLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$productoequivalenteLogic=new producto_equivalente_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->producto_equivalenteLogic=new producto_equivalente_logic();*/
			
			
			$this->producto_equivalentesModel=null;
			/*new ListDataModel();*/
			
			/*$this->producto_equivalentesModel.setWrappedData(producto_equivalenteLogic->getproducto_equivalentes());*/
						
			$this->producto_equivalentes= array();
			$this->producto_equivalentesEliminados=array();
			$this->producto_equivalentesSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= producto_equivalente_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= producto_equivalente_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->producto_equivalente= new producto_equivalente();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idproducto_equivalente='display:table-row';
			$this->strVisibleFK_Idproducto_principal='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarproducto_equivalente!=null && $strTipoUsuarioAuxiliarproducto_equivalente!='none' && $strTipoUsuarioAuxiliarproducto_equivalente!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarproducto_equivalente);
																
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
				if($strTipoUsuarioAuxiliarproducto_equivalente!=null && $strTipoUsuarioAuxiliarproducto_equivalente!='none' && $strTipoUsuarioAuxiliarproducto_equivalente!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarproducto_equivalente);
																
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
				if($strTipoUsuarioAuxiliarproducto_equivalente==null || $strTipoUsuarioAuxiliarproducto_equivalente=='none' || $strTipoUsuarioAuxiliarproducto_equivalente=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarproducto_equivalente,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, producto_equivalente_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, producto_equivalente_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina producto_equivalente');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($producto_equivalente_session);
			
			$this->getSetBusquedasSesionConfig($producto_equivalente_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteproducto_equivalentes($this->strAccionBusqueda,$this->producto_equivalenteLogic->getproducto_equivalentes());*/
				} else if($this->strGenerarReporte=='Html')	{
					$producto_equivalente_session->strServletGenerarHtmlReporte='producto_equivalenteServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(producto_equivalente_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(producto_equivalente_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($producto_equivalente_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$producto_equivalente_session=unserialize($this->Session->read(producto_equivalente_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarproducto_equivalente!=null && $strTipoUsuarioAuxiliarproducto_equivalente=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($producto_equivalente_session);
			}
								
			$this->set(producto_equivalente_util::$STR_SESSION_NAME, $producto_equivalente_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($producto_equivalente_session);
			
			/*
			$this->producto_equivalente->recursive = 0;
			
			$this->producto_equivalentes=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('producto_equivalentes', $this->producto_equivalentes);
			
			$this->set(producto_equivalente_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->producto_equivalenteActual =$this->producto_equivalenteClase;
			
			/*$this->producto_equivalenteActual =$this->migrarModelproducto_equivalente($this->producto_equivalenteClase);*/
			
			$this->returnHtml(false);
			
			$this->set(producto_equivalente_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=producto_equivalente_util::$STR_NOMBRE_OPCION;
				
			if(producto_equivalente_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=producto_equivalente_util::$STR_MODULO_OPCION.producto_equivalente_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(producto_equivalente_util::$STR_SESSION_NAME,serialize($producto_equivalente_session));
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
			/*$producto_equivalenteClase= (producto_equivalente) producto_equivalentesModel.getRowData();*/
			
			$this->producto_equivalenteClase->setId($this->producto_equivalente->getId());	
			$this->producto_equivalenteClase->setVersionRow($this->producto_equivalente->getVersionRow());	
			$this->producto_equivalenteClase->setVersionRow($this->producto_equivalente->getVersionRow());	
			$this->producto_equivalenteClase->setid_producto_principal($this->producto_equivalente->getid_producto_principal());	
			$this->producto_equivalenteClase->setid_producto_equivalente($this->producto_equivalente->getid_producto_equivalente());	
			$this->producto_equivalenteClase->setproducto_id_principal($this->producto_equivalente->getproducto_id_principal());	
			$this->producto_equivalenteClase->setproducto_id_equivalente($this->producto_equivalente->getproducto_id_equivalente());	
			$this->producto_equivalenteClase->setcomentario($this->producto_equivalente->getcomentario());	
		
			/*$this->Session->write('producto_equivalenteVersionRowActual', producto_equivalente.getVersionRow());*/
			
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
			
			$producto_equivalente_session=unserialize($this->Session->read(producto_equivalente_util::$STR_SESSION_NAME));
						
			if($producto_equivalente_session==null) {
				$producto_equivalente_session=new producto_equivalente_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('producto_equivalente', $this->producto_equivalente->read(null, $id));
	
			
			$this->producto_equivalente->recursive = 0;
			
			$this->producto_equivalentes=$this->paginate();
			
			$this->set('producto_equivalentes', $this->producto_equivalentes);
	
			if (empty($this->data)) {
				$this->data = $this->producto_equivalente->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->producto_equivalenteLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->producto_equivalenteClase);
			
			$this->producto_equivalenteActual=$this->producto_equivalenteClase;
			
			/*$this->producto_equivalenteActual =$this->migrarModelproducto_equivalente($this->producto_equivalenteClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->producto_equivalenteLogic->getproducto_equivalentes(),$this->producto_equivalenteActual);
			
			$this->actualizarControllerConReturnGeneral($this->producto_equivalenteReturnGeneral);
			
			//$this->producto_equivalenteReturnGeneral=$this->producto_equivalenteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->producto_equivalenteLogic->getproducto_equivalentes(),$this->producto_equivalenteActual,$this->producto_equivalenteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->commitNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->rollbackNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$producto_equivalente_session=unserialize($this->Session->read(producto_equivalente_util::$STR_SESSION_NAME));
						
			if($producto_equivalente_session==null) {
				$producto_equivalente_session=new producto_equivalente_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoproducto_equivalente', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->producto_equivalenteClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->producto_equivalenteClase);
			
			$this->producto_equivalenteActual =$this->producto_equivalenteClase;
			
			/*$this->producto_equivalenteActual =$this->migrarModelproducto_equivalente($this->producto_equivalenteClase);*/
			
			$this->setproducto_equivalenteFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->producto_equivalenteLogic->getproducto_equivalentes(),$this->producto_equivalente);
			
			$this->actualizarControllerConReturnGeneral($this->producto_equivalenteReturnGeneral);
			
			//this->producto_equivalenteReturnGeneral=$this->producto_equivalenteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->producto_equivalenteLogic->getproducto_equivalentes(),$this->producto_equivalente,$this->producto_equivalenteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idproducto_principalDefaultFK!=null && $this->idproducto_principalDefaultFK > -1) {
				$this->producto_equivalenteReturnGeneral->getproducto_equivalente()->setid_producto_principal($this->idproducto_principalDefaultFK);
			}

			if($this->idproducto_equivalenteDefaultFK!=null && $this->idproducto_equivalenteDefaultFK > -1) {
				$this->producto_equivalenteReturnGeneral->getproducto_equivalente()->setid_producto_equivalente($this->idproducto_equivalenteDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->producto_equivalenteReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->producto_equivalenteReturnGeneral->getproducto_equivalente(),$this->producto_equivalenteActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyproducto_equivalente($this->producto_equivalenteReturnGeneral->getproducto_equivalente());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioproducto_equivalente($this->producto_equivalenteReturnGeneral->getproducto_equivalente());*/
			}
			
			if($this->producto_equivalenteReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->producto_equivalenteReturnGeneral->getproducto_equivalente(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualproducto_equivalente($this->producto_equivalente,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->commitNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->rollbackNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->producto_equivalentesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->producto_equivalentesAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->producto_equivalentesAuxiliar=array();
			}
			
			if(count($this->producto_equivalentesAuxiliar)==2) {
				$producto_equivalenteOrigen=$this->producto_equivalentesAuxiliar[0];
				$producto_equivalenteDestino=$this->producto_equivalentesAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($producto_equivalenteOrigen,$producto_equivalenteDestino,true,false,false);
				
				$this->actualizarLista($producto_equivalenteDestino,$this->producto_equivalentes);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->commitNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->rollbackNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->producto_equivalentesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->producto_equivalentesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->producto_equivalentesAuxiliar=array();
			}
			
			if(count($this->producto_equivalentesAuxiliar) > 0) {
				foreach ($this->producto_equivalentesAuxiliar as $producto_equivalenteSeleccionado) {
					$this->producto_equivalente=new producto_equivalente();
					
					$this->setCopiarVariablesObjetos($producto_equivalenteSeleccionado,$this->producto_equivalente,true,true,false);
						
					$this->producto_equivalentes[]=$this->producto_equivalente;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->commitNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->rollbackNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->producto_equivalentesEliminados as $producto_equivalenteEliminado) {
				$this->producto_equivalenteLogic->producto_equivalentes[]=$producto_equivalenteEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->commitNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->rollbackNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->producto_equivalente=new producto_equivalente();
							
				$this->producto_equivalentes[]=$this->producto_equivalente;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->commitNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->rollbackNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
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
		
		$producto_equivalenteActual=new producto_equivalente();
		
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
				
				$producto_equivalenteActual=$this->producto_equivalentes[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $producto_equivalenteActual->setid_producto_principal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $producto_equivalenteActual->setid_producto_equivalente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $producto_equivalenteActual->setproducto_id_principal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $producto_equivalenteActual->setproducto_id_equivalente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $producto_equivalenteActual->setcomentario($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->producto_equivalentesAuxiliar=array();		 
		/*$this->producto_equivalentesEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->producto_equivalentesAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->producto_equivalentesAuxiliar=array();
		}
			
		if(count($this->producto_equivalentesAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->producto_equivalentesAuxiliar as $producto_equivalenteAuxLocal) {				
				
				foreach($this->producto_equivalentes as $producto_equivalenteLocal) {
					if($producto_equivalenteLocal->getId()==$producto_equivalenteAuxLocal->getId()) {
						$producto_equivalenteLocal->setIsDeleted(true);
						
						/*$this->producto_equivalentesEliminados[]=$producto_equivalenteLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->producto_equivalenteLogic->setproducto_equivalentes($this->producto_equivalentes);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->commitNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->rollbackNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
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
				$this->producto_equivalenteLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=producto_equivalente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->commitNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->rollbackNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadproducto_equivalente='',string $strTipoPaginaAuxiliarproducto_equivalente='',string $strTipoUsuarioAuxiliarproducto_equivalente='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadproducto_equivalente,$strTipoPaginaAuxiliarproducto_equivalente,$strTipoUsuarioAuxiliarproducto_equivalente,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->producto_equivalentes) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->commitNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->rollbackNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=producto_equivalente_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=producto_equivalente_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=producto_equivalente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$producto_equivalente_session=unserialize($this->Session->read(producto_equivalente_util::$STR_SESSION_NAME));
						
			if($producto_equivalente_session==null) {
				$producto_equivalente_session=new producto_equivalente_session();
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
					/*$this->intNumeroPaginacion=producto_equivalente_util::$INT_NUMERO_PAGINACION;*/
					
					if($producto_equivalente_session->intNumeroPaginacion==producto_equivalente_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=producto_equivalente_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$producto_equivalente_session->intNumeroPaginacion;
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
			
			$this->producto_equivalentesEliminados=array();
			
			/*$this->producto_equivalenteLogic->setConnexion($connexion);*/
			
			$this->producto_equivalenteLogic->setIsConDeep(true);
			
			$this->producto_equivalenteLogic->getproducto_equivalenteDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('producto_principal');$classes[]=$class;
			$class=new Classe('producto_equivalente');$classes[]=$class;
			
			$this->producto_equivalenteLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->producto_equivalenteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->producto_equivalenteLogic->getproducto_equivalentes()==null|| count($this->producto_equivalenteLogic->getproducto_equivalentes())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->producto_equivalentes=$this->producto_equivalenteLogic->getproducto_equivalentes();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->producto_equivalenteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->producto_equivalentesReporte=$this->producto_equivalenteLogic->getproducto_equivalentes();
									
						/*$this->generarReportes('Todos',$this->producto_equivalenteLogic->getproducto_equivalentes());*/
					
						$this->producto_equivalenteLogic->setproducto_equivalentes($this->producto_equivalentes);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->producto_equivalenteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->producto_equivalenteLogic->getproducto_equivalentes()==null|| count($this->producto_equivalenteLogic->getproducto_equivalentes())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->producto_equivalentes=$this->producto_equivalenteLogic->getproducto_equivalentes();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->producto_equivalenteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->producto_equivalentesReporte=$this->producto_equivalenteLogic->getproducto_equivalentes();
									
						/*$this->generarReportes('Todos',$this->producto_equivalenteLogic->getproducto_equivalentes());*/
					
						$this->producto_equivalenteLogic->setproducto_equivalentes($this->producto_equivalentes);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idproducto_equivalente=0;*/
				
				if($producto_equivalente_session->bitBusquedaDesdeFKSesionFK!=null && $producto_equivalente_session->bitBusquedaDesdeFKSesionFK==true) {
					if($producto_equivalente_session->bigIdActualFK!=null && $producto_equivalente_session->bigIdActualFK!=0)	{
						$this->idproducto_equivalente=$producto_equivalente_session->bigIdActualFK;	
					}
					
					$producto_equivalente_session->bitBusquedaDesdeFKSesionFK=false;
					
					$producto_equivalente_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idproducto_equivalente=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idproducto_equivalente=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->producto_equivalenteLogic->getEntity($this->idproducto_equivalente);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*producto_equivalenteLogicAdditional::getDetalleIndicePorId($idproducto_equivalente);*/

				
				if($this->producto_equivalenteLogic->getproducto_equivalente()!=null) {
					$this->producto_equivalenteLogic->setproducto_equivalentes(array());
					$this->producto_equivalenteLogic->producto_equivalentes[]=$this->producto_equivalenteLogic->getproducto_equivalente();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idproducto_equivalente')
			{

				if($producto_equivalente_session->bigidproducto_equivalenteActual!=null && $producto_equivalente_session->bigidproducto_equivalenteActual!=0)
				{
					$this->id_producto_equivalenteFK_Idproducto_equivalente=$producto_equivalente_session->bigidproducto_equivalenteActual;
					$producto_equivalente_session->bigidproducto_equivalenteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->producto_equivalenteLogic->getsFK_Idproducto_equivalente($finalQueryPaginacion,$this->pagination,$this->id_producto_equivalenteFK_Idproducto_equivalente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//producto_equivalenteLogicAdditional::getDetalleIndiceFK_Idproducto_equivalente($this->id_producto_equivalenteFK_Idproducto_equivalente);


					if($this->producto_equivalenteLogic->getproducto_equivalentes()==null || count($this->producto_equivalenteLogic->getproducto_equivalentes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$producto_equivalentes=$this->producto_equivalenteLogic->getproducto_equivalentes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->producto_equivalenteLogic->getsFK_Idproducto_equivalente('',$this->pagination,$this->id_producto_equivalenteFK_Idproducto_equivalente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->producto_equivalentesReporte=$this->producto_equivalenteLogic->getproducto_equivalentes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproducto_equivalentes("FK_Idproducto_equivalente",$this->producto_equivalenteLogic->getproducto_equivalentes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->producto_equivalenteLogic->setproducto_equivalentes($producto_equivalentes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idproducto_principal')
			{

				if($producto_equivalente_session->bigidproducto_principalActual!=null && $producto_equivalente_session->bigidproducto_principalActual!=0)
				{
					$this->id_producto_principalFK_Idproducto_principal=$producto_equivalente_session->bigidproducto_principalActual;
					$producto_equivalente_session->bigidproducto_principalActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->producto_equivalenteLogic->getsFK_Idproducto_principal($finalQueryPaginacion,$this->pagination,$this->id_producto_principalFK_Idproducto_principal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//producto_equivalenteLogicAdditional::getDetalleIndiceFK_Idproducto_principal($this->id_producto_principalFK_Idproducto_principal);


					if($this->producto_equivalenteLogic->getproducto_equivalentes()==null || count($this->producto_equivalenteLogic->getproducto_equivalentes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$producto_equivalentes=$this->producto_equivalenteLogic->getproducto_equivalentes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->producto_equivalenteLogic->getsFK_Idproducto_principal('',$this->pagination,$this->id_producto_principalFK_Idproducto_principal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->producto_equivalentesReporte=$this->producto_equivalenteLogic->getproducto_equivalentes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproducto_equivalentes("FK_Idproducto_principal",$this->producto_equivalenteLogic->getproducto_equivalentes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->producto_equivalenteLogic->setproducto_equivalentes($producto_equivalentes);
					}
				//}

			} 
		
		$producto_equivalente_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$producto_equivalente_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->producto_equivalenteLogic->loadForeignsKeysDescription();*/
		
		$this->producto_equivalentes=$this->producto_equivalenteLogic->getproducto_equivalentes();
		
		if($this->producto_equivalentesEliminados==null) {
			$this->producto_equivalentesEliminados=array();
		}
		
		$this->Session->write(producto_equivalente_util::$STR_SESSION_NAME.'Lista',serialize($this->producto_equivalentes));
		$this->Session->write(producto_equivalente_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->producto_equivalentesEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(producto_equivalente_util::$STR_SESSION_NAME,serialize($producto_equivalente_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idproducto_equivalente=$idGeneral;
			
			$this->intNumeroPaginacion=producto_equivalente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->commitNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->rollbackNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->getNewConnexionToDeep();
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
				$this->producto_equivalenteLogic->commitNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->rollbackNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->getNewConnexionToDeep();
			}

			if(count($this->producto_equivalentes) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->commitNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->rollbackNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_Idproducto_equivalenteParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=producto_equivalente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_producto_equivalenteFK_Idproducto_equivalente=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idproducto_equivalente','cmbid_producto_equivalente');

			$this->strAccionBusqueda='FK_Idproducto_equivalente';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->commitNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->rollbackNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idproducto_principalParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=producto_equivalente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_producto_principalFK_Idproducto_principal=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idproducto_principal','cmbid_producto_principal');

			$this->strAccionBusqueda='FK_Idproducto_principal';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->commitNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->rollbackNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idproducto_equivalente($strFinalQuery,$id_producto_equivalente)
	{
		try
		{

			$this->producto_equivalenteLogic->getsFK_Idproducto_equivalente($strFinalQuery,new Pagination(),$id_producto_equivalente);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idproducto_principal($strFinalQuery,$id_producto_principal)
	{
		try
		{

			$this->producto_equivalenteLogic->getsFK_Idproducto_principal($strFinalQuery,new Pagination(),$id_producto_principal);
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
			
			
			$producto_equivalenteForeignKey=new producto_equivalente_param_return(); //producto_equivalenteForeignKey();
			
			$producto_equivalente_session=unserialize($this->Session->read(producto_equivalente_util::$STR_SESSION_NAME));
						
			if($producto_equivalente_session==null) {
				$producto_equivalente_session=new producto_equivalente_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$producto_equivalenteForeignKey=$this->producto_equivalenteLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$producto_equivalente_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto_principal',$this->strRecargarFkTipos,',')) {
				$this->producto_principalsFK=$producto_equivalenteForeignKey->producto_principalsFK;
				$this->idproducto_principalDefaultFK=$producto_equivalenteForeignKey->idproducto_principalDefaultFK;
			}

			if($producto_equivalente_session->bitBusquedaDesdeFKSesionproducto_principal) {
				$this->setVisibleBusquedasParaproducto_principal(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto_equivalente',$this->strRecargarFkTipos,',')) {
				$this->producto_equivalentesFK=$producto_equivalenteForeignKey->producto_equivalentesFK;
				$this->idproducto_equivalenteDefaultFK=$producto_equivalenteForeignKey->idproducto_equivalenteDefaultFK;
			}

			if($producto_equivalente_session->bitBusquedaDesdeFKSesionproducto_equivalente) {
				$this->setVisibleBusquedasParaproducto_equivalente(true);
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
	
	function cargarCombosFKFromReturnGeneral($producto_equivalenteReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$producto_equivalenteReturnGeneral->strRecargarFkTipos;
			
			


			if($producto_equivalenteReturnGeneral->con_producto_principalsFK==true) {
				$this->producto_principalsFK=$producto_equivalenteReturnGeneral->producto_principalsFK;
				$this->idproducto_principalDefaultFK=$producto_equivalenteReturnGeneral->idproducto_principalDefaultFK;
			}


			if($producto_equivalenteReturnGeneral->con_producto_equivalentesFK==true) {
				$this->producto_equivalentesFK=$producto_equivalenteReturnGeneral->producto_equivalentesFK;
				$this->idproducto_equivalenteDefaultFK=$producto_equivalenteReturnGeneral->idproducto_equivalenteDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(producto_equivalente_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$producto_equivalente_session=unserialize($this->Session->read(producto_equivalente_util::$STR_SESSION_NAME));
		
		if($producto_equivalente_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($producto_equivalente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==producto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='producto';
			}
			else if($producto_equivalente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==producto_equivalente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='producto_equivalente';
			}
			
			$producto_equivalente_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->getNewConnexionToDeep();
			}						
			
			$this->producto_equivalentesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->producto_equivalentesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->producto_equivalentesAuxiliar=array();
			}
			
			if(count($this->producto_equivalentesAuxiliar) > 0) {
				
				foreach ($this->producto_equivalentesAuxiliar as $producto_equivalenteSeleccionado) {
					$this->eliminarTablaBase($producto_equivalenteSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->commitNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->rollbackNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('producto_equivalente');
			$tipoRelacionReporte->setsDescripcion('s');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=producto_equivalente_util::$STR_NOMBRE_CLASE;
		
		return $arrNombresClasesRelacionadasLocal;
	}
	
	
	public function setstrRecargarFkInicializar() {
		$this->setstrRecargarFk('TODOS','NINGUNO',0,'');		
	}
	
	
	
	public function getproducto_principalsFKListSelectItem() 
	{
		$producto_principalsList=array();

		$item=null;

		foreach($this->producto_principalsFK as $producto_principal)
		{
			$item=new SelectItem();
			$item->setLabel($producto_principal->getcodigo());
			$item->setValue($producto_principal->getId());
			$producto_principalsList[]=$item;
		}

		return $producto_principalsList;
	}


	public function getproducto_equivalentesFKListSelectItem() 
	{
		$producto_equivalentesList=array();

		$item=null;

		foreach($this->producto_equivalentesFK as $producto_equivalente)
		{
			$item=new SelectItem();
			$item->setLabel($producto_equivalente>getId());
			$item->setValue($producto_equivalente->getId());
			$producto_equivalentesList[]=$item;
		}

		return $producto_equivalentesList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=producto_equivalente_util::$INT_NUMERO_PAGINACION;
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
				$this->producto_equivalenteLogic->commitNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->rollbackNewConnexionToDeep();
				$this->producto_equivalenteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$producto_equivalentesNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->producto_equivalentes as $producto_equivalenteLocal) {
				if($producto_equivalenteLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->producto_equivalente=new producto_equivalente();
				
				$this->producto_equivalente->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->producto_equivalentes[]=$this->producto_equivalente;*/
				
				$producto_equivalentesNuevos[]=$this->producto_equivalente;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('producto_principal');$classes[]=$class;
				$class=new Classe('producto_equivalente');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_equivalenteLogic->setproducto_equivalentes($producto_equivalentesNuevos);
					
				$this->producto_equivalenteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($producto_equivalentesNuevos as $producto_equivalenteNuevo) {
					$this->producto_equivalentes[]=$producto_equivalenteNuevo;
				}
				
				/*$this->producto_equivalentes[]=$producto_equivalentesNuevos;*/
				
				$this->producto_equivalenteLogic->setproducto_equivalentes($this->producto_equivalentes);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($producto_equivalentesNuevos!=null);
	}
					
	
	public function cargarCombosproducto_principalsFK($connexion=null,$strRecargarFkQuery=''){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$this->producto_principalsFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$producto_equivalente_session=unserialize($this->Session->read(producto_equivalente_util::$STR_SESSION_NAME));

		if($producto_equivalente_session==null) {
			$producto_equivalente_session=new producto_equivalente_session();
		}
		
		if($producto_equivalente_session->bitBusquedaDesdeFKSesionproducto_principal!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=producto_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalproducto=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalproducto=Funciones::GetFinalQueryAppend($finalQueryGlobalproducto, '');
				$finalQueryGlobalproducto.=producto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalproducto.$strRecargarFkQuery;		

				$productoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosproducto_principalsFK($productoLogic->getproductos());

		} else {
			$this->setVisibleBusquedasParaproducto_principal(true);


			if($producto_equivalente_session->bigidproducto_principalActual!=null && $producto_equivalente_session->bigidproducto_principalActual > 0) {
				$productoLogic->getEntity($producto_equivalente_session->bigidproducto_principalActual);//WithConnection

				$this->producto_principalsFK[$productoLogic->getproducto()->getId()]=producto_equivalente_util::getproducto_principalDescripcion($productoLogic->getproducto());
				$this->idproducto_principalDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	public function cargarCombosproducto_equivalentesFK($connexion=null,$strRecargarFkQuery=''){
		$producto_equivalenteLogic= new producto_equivalente_logic();
		$pagination= new Pagination();
		$this->producto_equivalentesFK=array();

		$producto_equivalenteLogic->setConnexion($connexion);
		$producto_equivalenteLogic->getproducto_equivalenteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$producto_equivalente_session=unserialize($this->Session->read(producto_equivalente_util::$STR_SESSION_NAME));

		if($producto_equivalente_session==null) {
			$producto_equivalente_session=new producto_equivalente_session();
		}
		
		if($producto_equivalente_session->bitBusquedaDesdeFKSesionproducto_equivalente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=producto_equivalente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalproducto_equivalente=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalproducto_equivalente=Funciones::GetFinalQueryAppend($finalQueryGlobalproducto_equivalente, '');
				$finalQueryGlobalproducto_equivalente.=producto_equivalente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalproducto_equivalente.$strRecargarFkQuery;		

				$producto_equivalenteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosproducto_equivalentesFK($producto_equivalenteLogic->getproducto_equivalentes());

		} else {
			$this->setVisibleBusquedasParaproducto_equivalente(true);


			if($producto_equivalente_session->bigidproducto_equivalenteActual!=null && $producto_equivalente_session->bigidproducto_equivalenteActual > 0) {
				$producto_equivalenteLogic->getEntity($producto_equivalente_session->bigidproducto_equivalenteActual);//WithConnection

				$this->producto_equivalentesFK[$producto_equivalenteLogic->getproducto_equivalente()->getId()]=producto_equivalente_util::getproducto_equivalenteDescripcion($producto_equivalenteLogic->getproducto_equivalente());
				$this->idproducto_equivalenteDefaultFK=$producto_equivalenteLogic->getproducto_equivalente()->getId();
			}
		}
	}

	
	
	public function prepararCombosproducto_principalsFK($productos){

		foreach ($productos as $productoLocal ) {
			if($this->idproducto_principalDefaultFK==0) {
				$this->idproducto_principalDefaultFK=$productoLocal->getId();
			}

			$this->producto_principalsFK[$productoLocal->getId()]=producto_equivalente_util::getproducto_principalDescripcion($productoLocal);
		}
	}

	public function prepararCombosproducto_equivalentesFK($producto_equivalentes){

		foreach ($producto_equivalentes as $producto_equivalenteLocal ) {
			if($this->idproducto_equivalenteDefaultFK==0) {
				$this->idproducto_equivalenteDefaultFK=$producto_equivalenteLocal->getId();
			}

			$this->producto_equivalentesFK[$producto_equivalenteLocal->getId()]=producto_equivalente_util::getproducto_equivalenteDescripcion($producto_equivalenteLocal);
		}
	}

	
	
	public function cargarDescripcionproducto_principalFK($idproducto,$connexion=null){
		$productoLogic= new producto_logic();
		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$strDescripcionproducto='';

		if($idproducto!=null && $idproducto!='' && $idproducto!='null') {
			if($connexion!=null) {
				$productoLogic->getEntity($idproducto);//WithConnection
			} else {
				$productoLogic->getEntityWithConnection($idproducto);//
			}

			$strDescripcionproducto=producto_equivalente_util::getproducto_principalDescripcion($productoLogic->getproducto());

		} else {
			$strDescripcionproducto='null';
		}

		return $strDescripcionproducto;
	}

	public function cargarDescripcionproducto_equivalenteFK($idproducto_equivalente,$connexion=null){
		$producto_equivalenteLogic= new producto_equivalente_logic();
		$producto_equivalenteLogic->setConnexion($connexion);
		$producto_equivalenteLogic->getproducto_equivalenteDataAccess()->isForFKData=true;
		$strDescripcionproducto_equivalente='';

		if($idproducto_equivalente!=null && $idproducto_equivalente!='' && $idproducto_equivalente!='null') {
			if($connexion!=null) {
				$producto_equivalenteLogic->getEntity($idproducto_equivalente);//WithConnection
			} else {
				$producto_equivalenteLogic->getEntityWithConnection($idproducto_equivalente);//
			}

			$strDescripcionproducto_equivalente=producto_equivalente_util::getproducto_equivalenteDescripcion($producto_equivalenteLogic->getproducto_equivalente());

		} else {
			$strDescripcionproducto_equivalente='null';
		}

		return $strDescripcionproducto_equivalente;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(producto_equivalente $producto_equivalenteClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function abrirArbol(){
		$this->saveGetSessionControllerAndPageAuxiliar(false);
		
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaArbol(producto_equivalente_util::$STR_CLASS_NAME,'inventario','','POPUP',$this->strTipoPaginaAuxiliarproducto_equivalente,$this->strTipoUsuarioAuxiliarproducto_equivalente,false,'');
		
		$this->strAuxiliarTipo='POPUP';
			
		$this->saveGetSessionControllerAndPageAuxiliar(true);

		//$this->returnAjax();
	}
	
	public function cargarArbol(){
		$this->saveGetSessionControllerAndPageAuxiliar(false);
		
		/*//SI SE EJECUTA FUNCIONES DEL ARBOL NO SE MUESTRA
		$this->htmlAuxiliar='<h1>AUXILIAR</h1>';*/
		
		$nombre_clase='producto_equivalente';
		$nombre_objeto='producto_equivalente';
		$objetosUsuario=$this->producto_equivalentes;
		$tree=null;
		$webroot='webroot';
		
		foreach($objetosUsuario as $objeto) {
			$objeto->setsDescription(producto_equivalente_util::getproducto_equivalenteDescripcion($objeto));
		}
		
		$this->htmlAuxiliar=FuncionesWebArbol::getMenuUsuarioJQuery2($nombre_clase,$nombre_objeto,$objetosUsuario,$tree,$webroot);
		
		//$this->returnAjax();
	}
	
	

	public function setVisibleBusquedasParaproducto_principal($isParaproducto_principal){
		$strParaVisibleproducto_principal='display:table-row';
		$strParaVisibleNegacionproducto_principal='display:none';

		if($isParaproducto_principal) {
			$strParaVisibleproducto_principal='display:table-row';
			$strParaVisibleNegacionproducto_principal='display:none';
		} else {
			$strParaVisibleproducto_principal='display:none';
			$strParaVisibleNegacionproducto_principal='display:table-row';
		}


		$strParaVisibleNegacionproducto_principal=trim($strParaVisibleNegacionproducto_principal);

		$this->strVisibleFK_Idproducto_equivalente=$strParaVisibleNegacionproducto_principal;
		$this->strVisibleFK_Idproducto_principal=$strParaVisibleproducto_principal;
	}

	public function setVisibleBusquedasParaproducto_equivalente($isParaproducto_equivalente){
		$strParaVisibleproducto_equivalente='display:table-row';
		$strParaVisibleNegacionproducto_equivalente='display:none';

		if($isParaproducto_equivalente) {
			$strParaVisibleproducto_equivalente='display:table-row';
			$strParaVisibleNegacionproducto_equivalente='display:none';
		} else {
			$strParaVisibleproducto_equivalente='display:none';
			$strParaVisibleNegacionproducto_equivalente='display:table-row';
		}


		$strParaVisibleNegacionproducto_equivalente=trim($strParaVisibleNegacionproducto_equivalente);

		$this->strVisibleFK_Idproducto_equivalente=$strParaVisibleproducto_equivalente;
		$this->strVisibleFK_Idproducto_principal=$strParaVisibleNegacionproducto_equivalente;
	}
	
	

	public function abrirBusquedaParaproducto_principal() {//$idproducto_equivalenteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproducto_equivalenteActual=$idproducto_equivalenteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.producto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.producto_equivalenteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_producto_principal(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.producto_equivalenteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_producto_principal(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproducto_equivalente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaproducto_equivalente() {//$idproducto_equivalenteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproducto_equivalenteActual=$idproducto_equivalenteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.producto_equivalente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.producto_equivalenteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_producto_equivalente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',producto_equivalente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.producto_equivalenteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_producto_equivalente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_equivalente_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproducto_equivalente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParaproducto_equivalentes(int $idproducto_equivalenteActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idproducto_equivalenteActual=$idproducto_equivalenteActual;

		$bitPaginaPopupproducto_equivalente=false;

		try {

			$producto_equivalente_session=unserialize($this->Session->read(producto_equivalente_util::$STR_SESSION_NAME));

			if($producto_equivalente_session==null) {
				$producto_equivalente_session=new producto_equivalente_session();
			}

			$producto_equivalente_session=unserialize($this->Session->read(producto_equivalente_util::$STR_SESSION_NAME));

			if($producto_equivalente_session==null) {
				$producto_equivalente_session=new producto_equivalente_session();
			}

			$producto_equivalente_session->strUltimaBusqueda='FK_Idproducto_equivalente';
			$producto_equivalente_session->strPathNavegacionActual=$producto_equivalente_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.producto_equivalente_util::$STR_CLASS_WEB_TITULO;
			$producto_equivalente_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupproducto_equivalente=$producto_equivalente_session->bitPaginaPopup;
			$producto_equivalente_session->setPaginaPopupVariables(true);
			$bitPaginaPopupproducto_equivalente=$producto_equivalente_session->bitPaginaPopup;
			$producto_equivalente_session->bitPermiteNavegacionHaciaFKDesde=false;
			$producto_equivalente_session->strNombrePaginaNavegacionHaciaFKDesde=producto_equivalente_util::$STR_NOMBRE_OPCION;
			$producto_equivalente_session->bitBusquedaDesdeFKSesionproducto_equivalente=true;
			$producto_equivalente_session->bigidproducto_equivalenteActual=$this->idproducto_equivalenteActual;

			$producto_equivalente_session->bitBusquedaDesdeFKSesionFK=true;
			$producto_equivalente_session->bigIdActualFK=$this->idproducto_equivalenteActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"producto_equivalente"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=producto_equivalente_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"producto_equivalente"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(producto_equivalente_util::$STR_SESSION_NAME,serialize($producto_equivalente_session));
			$this->Session->write(producto_equivalente_util::$STR_SESSION_NAME,serialize($producto_equivalente_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupproducto_equivalente!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',producto_equivalente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_equivalente_util::$STR_CLASS_NAME,'inventario','','POPUP',$this->strTipoPaginaAuxiliarproducto_equivalente,$this->strTipoUsuarioAuxiliarproducto_equivalente,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',producto_equivalente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_equivalente_util::$STR_CLASS_NAME,'inventario','','NO-POPUP',$this->strTipoPaginaAuxiliarproducto_equivalente,$this->strTipoUsuarioAuxiliarproducto_equivalente,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(producto_equivalente_util::$STR_SESSION_NAME,producto_equivalente_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$producto_equivalente_session=$this->Session->read(producto_equivalente_util::$STR_SESSION_NAME);
				
		if($producto_equivalente_session==null) {
			$producto_equivalente_session=new producto_equivalente_session();		
			//$this->Session->write('producto_equivalente_session',$producto_equivalente_session);							
		}
		*/
		
		$producto_equivalente_session=new producto_equivalente_session();
    	$producto_equivalente_session->strPathNavegacionActual=producto_equivalente_util::$STR_CLASS_WEB_TITULO;
    	$producto_equivalente_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(producto_equivalente_util::$STR_SESSION_NAME,serialize($producto_equivalente_session));		
	}	
	
	public function getSetBusquedasSesionConfig(producto_equivalente_session $producto_equivalente_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($producto_equivalente_session->bitBusquedaDesdeFKSesionFK!=null && $producto_equivalente_session->bitBusquedaDesdeFKSesionFK==true) {
			if($producto_equivalente_session->bigIdActualFK!=null && $producto_equivalente_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$producto_equivalente_session->bigIdActualFKParaPosibleAtras=$producto_equivalente_session->bigIdActualFK;*/
			}
				
			$producto_equivalente_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$producto_equivalente_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(producto_equivalente_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($producto_equivalente_session->bitBusquedaDesdeFKSesionproducto_principal!=null && $producto_equivalente_session->bitBusquedaDesdeFKSesionproducto_principal==true)
			{
				if($producto_equivalente_session->bigidproducto_principalActual!=0) {
					$this->strAccionBusqueda='FK_Idproducto_principal';

					$existe_history=HistoryWeb::ExisteElemento(producto_equivalente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(producto_equivalente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(producto_equivalente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($producto_equivalente_session->bigidproducto_principalActualDescripcion);
						$historyWeb->setIdActual($producto_equivalente_session->bigidproducto_principalActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=producto_equivalente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$producto_equivalente_session->bigidproducto_principalActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$producto_equivalente_session->bitBusquedaDesdeFKSesionproducto_principal=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=producto_equivalente_util::$INT_NUMERO_PAGINACION;

				if($producto_equivalente_session->intNumeroPaginacion==producto_equivalente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_equivalente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_equivalente_session->intNumeroPaginacion;
				}
			}
			else if($producto_equivalente_session->bitBusquedaDesdeFKSesionproducto_equivalente!=null && $producto_equivalente_session->bitBusquedaDesdeFKSesionproducto_equivalente==true)
			{
				if($producto_equivalente_session->bigidproducto_equivalenteActual!=0) {
					$this->strAccionBusqueda='FK_Idproducto_equivalente';

					$existe_history=HistoryWeb::ExisteElemento(producto_equivalente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(producto_equivalente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(producto_equivalente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($producto_equivalente_session->bigidproducto_equivalenteActualDescripcion);
						$historyWeb->setIdActual($producto_equivalente_session->bigidproducto_equivalenteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=producto_equivalente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$producto_equivalente_session->bigidproducto_equivalenteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$producto_equivalente_session->bitBusquedaDesdeFKSesionproducto_equivalente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=producto_equivalente_util::$INT_NUMERO_PAGINACION;

				if($producto_equivalente_session->intNumeroPaginacion==producto_equivalente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_equivalente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_equivalente_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$producto_equivalente_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$producto_equivalente_session=unserialize($this->Session->read(producto_equivalente_util::$STR_SESSION_NAME));
		
		if($producto_equivalente_session==null) {
			$producto_equivalente_session=new producto_equivalente_session();
		}
		
		$producto_equivalente_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$producto_equivalente_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$producto_equivalente_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idproducto_equivalente') {
			$producto_equivalente_session->id_producto_equivalente=$this->id_producto_equivalenteFK_Idproducto_equivalente;	

		}
		else if($this->strAccionBusqueda=='FK_Idproducto_principal') {
			$producto_equivalente_session->id_producto_principal=$this->id_producto_principalFK_Idproducto_principal;	

		}
		
		$this->Session->write(producto_equivalente_util::$STR_SESSION_NAME,serialize($producto_equivalente_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(producto_equivalente_session $producto_equivalente_session) {
		
		if($producto_equivalente_session==null) {
			$producto_equivalente_session=unserialize($this->Session->read(producto_equivalente_util::$STR_SESSION_NAME));
		}
		
		if($producto_equivalente_session==null) {
		   $producto_equivalente_session=new producto_equivalente_session();
		}
		
		if($producto_equivalente_session->strUltimaBusqueda!=null && $producto_equivalente_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$producto_equivalente_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$producto_equivalente_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$producto_equivalente_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idproducto_equivalente') {
				$this->id_producto_equivalenteFK_Idproducto_equivalente=$producto_equivalente_session->id_producto_equivalente;
				$producto_equivalente_session->id_producto_equivalente=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idproducto_principal') {
				$this->id_producto_principalFK_Idproducto_principal=$producto_equivalente_session->id_producto_principal;
				$producto_equivalente_session->id_producto_principal=-1;

			}
		}
		
		$producto_equivalente_session->strUltimaBusqueda='';
		//$producto_equivalente_session->intNumeroPaginacion=10;
		$producto_equivalente_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(producto_equivalente_util::$STR_SESSION_NAME,serialize($producto_equivalente_session));		
	}
	
	public function producto_equivalentesControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idproducto_principalDefaultFK = 0;
		$this->idproducto_equivalenteDefaultFK = 0;
	}
	
	public function setproducto_equivalenteFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_producto_principal',$this->idproducto_principalDefaultFK);
		$this->setExistDataCampoForm('form','id_producto_equivalente',$this->idproducto_equivalenteDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		producto::$class;
		producto_carga::$CONTROLLER;
		
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
		interface producto_equivalente_controlI {	
		
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
		
		public function onLoad(producto_equivalente_session $producto_equivalente_session=null);	
		function index(?string $strTypeOnLoadproducto_equivalente='',?string $strTipoPaginaAuxiliarproducto_equivalente='',?string $strTipoUsuarioAuxiliarproducto_equivalente='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadproducto_equivalente='',string $strTipoPaginaAuxiliarproducto_equivalente='',string $strTipoUsuarioAuxiliarproducto_equivalente='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($producto_equivalenteReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(producto_equivalente $producto_equivalenteClase);
		
		public function abrirArbol();	
		public function cargarArbol();
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(producto_equivalente_session $producto_equivalente_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(producto_equivalente_session $producto_equivalente_session);	
		public function producto_equivalentesControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setproducto_equivalenteFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
