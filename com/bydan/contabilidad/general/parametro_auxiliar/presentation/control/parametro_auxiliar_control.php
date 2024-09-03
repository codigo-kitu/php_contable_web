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

namespace com\bydan\contabilidad\general\parametro_auxiliar\presentation\control;

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

use com\bydan\contabilidad\general\parametro_auxiliar\business\entity\parametro_auxiliar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/parametro_auxiliar/util/parametro_auxiliar_carga.php');
use com\bydan\contabilidad\general\parametro_auxiliar\util\parametro_auxiliar_carga;

use com\bydan\contabilidad\general\parametro_auxiliar\util\parametro_auxiliar_util;
use com\bydan\contabilidad\general\parametro_auxiliar\util\parametro_auxiliar_param_return;
use com\bydan\contabilidad\general\parametro_auxiliar\business\logic\parametro_auxiliar_logic;
use com\bydan\contabilidad\general\parametro_auxiliar\presentation\session\parametro_auxiliar_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\tipo_costeo_kardex\business\entity\tipo_costeo_kardex;
use com\bydan\contabilidad\general\tipo_costeo_kardex\business\logic\tipo_costeo_kardex_logic;
use com\bydan\contabilidad\general\tipo_costeo_kardex\util\tipo_costeo_kardex_carga;
use com\bydan\contabilidad\general\tipo_costeo_kardex\util\tipo_costeo_kardex_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
parametro_auxiliar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
parametro_auxiliar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
parametro_auxiliar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
parametro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*parametro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/general/parametro_auxiliar/presentation/control/parametro_auxiliar_init_control.php');
use com\bydan\contabilidad\general\parametro_auxiliar\presentation\control\parametro_auxiliar_init_control;

include_once('com/bydan/contabilidad/general/parametro_auxiliar/presentation/control/parametro_auxiliar_base_control.php');
use com\bydan\contabilidad\general\parametro_auxiliar\presentation\control\parametro_auxiliar_base_control;

class parametro_auxiliar_control extends parametro_auxiliar_base_control {	
	
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
					
					
				if($this->data['mostrar_solo_costo_producto']==null) {$this->data['mostrar_solo_costo_producto']=false;} else {if($this->data['mostrar_solo_costo_producto']=='on') {$this->data['mostrar_solo_costo_producto']=true;}}
					
				if($this->data['con_codigo_secuencial_producto']==null) {$this->data['con_codigo_secuencial_producto']=false;} else {if($this->data['con_codigo_secuencial_producto']=='on') {$this->data['con_codigo_secuencial_producto']=true;}}
					
				if($this->data['con_producto_inactivo']==null) {$this->data['con_producto_inactivo']=false;} else {if($this->data['con_producto_inactivo']=='on') {$this->data['con_producto_inactivo']=true;}}
					
				if($this->data['con_busqueda_incremental']==null) {$this->data['con_busqueda_incremental']=false;} else {if($this->data['con_busqueda_incremental']=='on') {$this->data['con_busqueda_incremental']=true;}}
					
				if($this->data['permitir_revisar_asiento']==null) {$this->data['permitir_revisar_asiento']=false;} else {if($this->data['permitir_revisar_asiento']=='on') {$this->data['permitir_revisar_asiento']=true;}}
					
				if($this->data['mostrar_documento_anulado']==null) {$this->data['mostrar_documento_anulado']=false;} else {if($this->data['mostrar_documento_anulado']=='on') {$this->data['mostrar_documento_anulado']=true;}}
					
				if($this->data['con_eliminacion_fisica_asiento']==null) {$this->data['con_eliminacion_fisica_asiento']=false;} else {if($this->data['con_eliminacion_fisica_asiento']=='on') {$this->data['con_eliminacion_fisica_asiento']=true;}}
					
				if($this->data['con_asiento_simple_factura']==null) {$this->data['con_asiento_simple_factura']=false;} else {if($this->data['con_asiento_simple_factura']=='on') {$this->data['con_asiento_simple_factura']=true;}}
					
				if($this->data['con_codigo_secuencial_cliente']==null) {$this->data['con_codigo_secuencial_cliente']=false;} else {if($this->data['con_codigo_secuencial_cliente']=='on') {$this->data['con_codigo_secuencial_cliente']=true;}}
					
				if($this->data['con_cliente_inactivo']==null) {$this->data['con_cliente_inactivo']=false;} else {if($this->data['con_cliente_inactivo']=='on') {$this->data['con_cliente_inactivo']=true;}}
					
				if($this->data['con_codigo_secuencial_proveedor']==null) {$this->data['con_codigo_secuencial_proveedor']=false;} else {if($this->data['con_codigo_secuencial_proveedor']=='on') {$this->data['con_codigo_secuencial_proveedor']=true;}}
					
				if($this->data['con_proveedor_inactivo']==null) {$this->data['con_proveedor_inactivo']=false;} else {if($this->data['con_proveedor_inactivo']=='on') {$this->data['con_proveedor_inactivo']=true;}}
					
				if($this->data['con_asiento_cheque']==null) {$this->data['con_asiento_cheque']=false;} else {if($this->data['con_asiento_cheque']=='on') {$this->data['con_asiento_cheque']=true;}}
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
			else if($action=="FK_Idtipo_costeo_kardex"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtipo_costeo_kardexParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idparametro_auxiliarActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idparametro_auxiliarActual
			}
			else if($action=='abrirBusquedaParatipo_costeo_kardex') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idparametro_auxiliarActual=$this->getDataId();
				$this->abrirBusquedaParatipo_costeo_kardex();//$idparametro_auxiliarActual
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
					
					$parametro_auxiliarController = new parametro_auxiliar_control();
					
					$parametro_auxiliarController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($parametro_auxiliarController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$parametro_auxiliarController = new parametro_auxiliar_control();
						$parametro_auxiliarController = $this;
						
						$jsonResponse = json_encode($parametro_auxiliarController->parametro_auxiliars);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->parametro_auxiliarReturnGeneral==null) {
					$this->parametro_auxiliarReturnGeneral=new parametro_auxiliar_param_return();
				}
				
				echo($this->parametro_auxiliarReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$parametro_auxiliarController=new parametro_auxiliar_control();
		
		$parametro_auxiliarController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$parametro_auxiliarController->usuarioActual=new usuario();
		
		$parametro_auxiliarController->usuarioActual->setId($this->usuarioActual->getId());
		$parametro_auxiliarController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$parametro_auxiliarController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$parametro_auxiliarController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$parametro_auxiliarController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$parametro_auxiliarController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$parametro_auxiliarController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$parametro_auxiliarController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $parametro_auxiliarController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadparametro_auxiliar= $this->getDataGeneralString('strTypeOnLoadparametro_auxiliar');
		$strTipoPaginaAuxiliarparametro_auxiliar= $this->getDataGeneralString('strTipoPaginaAuxiliarparametro_auxiliar');
		$strTipoUsuarioAuxiliarparametro_auxiliar= $this->getDataGeneralString('strTipoUsuarioAuxiliarparametro_auxiliar');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadparametro_auxiliar,$strTipoPaginaAuxiliarparametro_auxiliar,$strTipoUsuarioAuxiliarparametro_auxiliar,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadparametro_auxiliar!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('parametro_auxiliar','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(parametro_auxiliar_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'general','','POPUP',$this->strTipoPaginaAuxiliarparametro_auxiliar,$this->strTipoUsuarioAuxiliarparametro_auxiliar,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(parametro_auxiliar_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'general','','POPUP',$this->strTipoPaginaAuxiliarparametro_auxiliar,$this->strTipoUsuarioAuxiliarparametro_auxiliar,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->parametro_auxiliarReturnGeneral=new parametro_auxiliar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->parametro_auxiliarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->parametro_auxiliarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->parametro_auxiliarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->parametro_auxiliarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->parametro_auxiliarReturnGeneral);
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
		$this->parametro_auxiliarReturnGeneral=new parametro_auxiliar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->parametro_auxiliarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->parametro_auxiliarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->parametro_auxiliarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->parametro_auxiliarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->parametro_auxiliarReturnGeneral);
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
		$this->parametro_auxiliarReturnGeneral=new parametro_auxiliar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->parametro_auxiliarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->parametro_auxiliarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->parametro_auxiliarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->parametro_auxiliarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->parametro_auxiliarReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
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
			
			
			$this->parametro_auxiliarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->parametro_auxiliarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->parametro_auxiliarReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->parametro_auxiliarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->parametro_auxiliarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->parametro_auxiliarReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->parametro_auxiliarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->parametro_auxiliarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->parametro_auxiliarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->parametro_auxiliarReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->parametro_auxiliarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->parametro_auxiliarReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->parametro_auxiliarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->parametro_auxiliarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->parametro_auxiliarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->parametro_auxiliarReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->parametro_auxiliarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->parametro_auxiliarReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
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
		
		$this->parametro_auxiliarLogic=new parametro_auxiliar_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->parametro_auxiliar=new parametro_auxiliar();
		
		$this->strTypeOnLoadparametro_auxiliar='onload';
		$this->strTipoPaginaAuxiliarparametro_auxiliar='none';
		$this->strTipoUsuarioAuxiliarparametro_auxiliar='none';	

		$this->intNumeroPaginacion=parametro_auxiliar_util::$INT_NUMERO_PAGINACION;
		
		$this->parametro_auxiliarModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_auxiliarControllerAdditional=new parametro_auxiliar_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(parametro_auxiliar_session $parametro_auxiliar_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($parametro_auxiliar_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadparametro_auxiliar='',?string $strTipoPaginaAuxiliarparametro_auxiliar='',?string $strTipoUsuarioAuxiliarparametro_auxiliar='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadparametro_auxiliar=$strTypeOnLoadparametro_auxiliar;
			$this->strTipoPaginaAuxiliarparametro_auxiliar=$strTipoPaginaAuxiliarparametro_auxiliar;
			$this->strTipoUsuarioAuxiliarparametro_auxiliar=$strTipoUsuarioAuxiliarparametro_auxiliar;
	
			if($strTipoUsuarioAuxiliarparametro_auxiliar=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->parametro_auxiliar=new parametro_auxiliar();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Parametro Auxiliares';
			
			
			$parametro_auxiliar_session=unserialize($this->Session->read(parametro_auxiliar_util::$STR_SESSION_NAME));
							
			if($parametro_auxiliar_session==null) {
				$parametro_auxiliar_session=new parametro_auxiliar_session();
				
				/*$this->Session->write('parametro_auxiliar_session',$parametro_auxiliar_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($parametro_auxiliar_session->strFuncionJsPadre!=null && $parametro_auxiliar_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$parametro_auxiliar_session->strFuncionJsPadre;
				
				$parametro_auxiliar_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($parametro_auxiliar_session);
			
			if($strTypeOnLoadparametro_auxiliar!=null && $strTypeOnLoadparametro_auxiliar=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$parametro_auxiliar_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$parametro_auxiliar_session->setPaginaPopupVariables(true);
				}
				
				if($parametro_auxiliar_session->intNumeroPaginacion==parametro_auxiliar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_auxiliar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_auxiliar_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,parametro_auxiliar_util::$STR_SESSION_NAME,'general');																
			
			} else if($strTypeOnLoadparametro_auxiliar!=null && $strTypeOnLoadparametro_auxiliar=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$parametro_auxiliar_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=parametro_auxiliar_util::$INT_NUMERO_PAGINACION;*/
				
				if($parametro_auxiliar_session->intNumeroPaginacion==parametro_auxiliar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_auxiliar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_auxiliar_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarparametro_auxiliar!=null && $strTipoPaginaAuxiliarparametro_auxiliar=='none') {
				/*$parametro_auxiliar_session->strStyleDivHeader='display:table-row';*/
				
				/*$parametro_auxiliar_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarparametro_auxiliar!=null && $strTipoPaginaAuxiliarparametro_auxiliar=='iframe') {
					/*
					$parametro_auxiliar_session->strStyleDivArbol='display:none';
					$parametro_auxiliar_session->strStyleDivHeader='display:none';
					$parametro_auxiliar_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$parametro_auxiliar_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->parametro_auxiliarClase=new parametro_auxiliar();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=parametro_auxiliar_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(parametro_auxiliar_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->parametro_auxiliarLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->parametro_auxiliarLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->parametro_auxiliarLogic=new parametro_auxiliar_logic();*/
			
			
			$this->parametro_auxiliarsModel=null;
			/*new ListDataModel();*/
			
			/*$this->parametro_auxiliarsModel.setWrappedData(parametro_auxiliarLogic->getparametro_auxiliars());*/
						
			$this->parametro_auxiliars= array();
			$this->parametro_auxiliarsEliminados=array();
			$this->parametro_auxiliarsSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= parametro_auxiliar_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->parametro_auxiliar= new parametro_auxiliar();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idtipo_costeo_kardex='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarparametro_auxiliar!=null && $strTipoUsuarioAuxiliarparametro_auxiliar!='none' && $strTipoUsuarioAuxiliarparametro_auxiliar!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarparametro_auxiliar);
																
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
				if($strTipoUsuarioAuxiliarparametro_auxiliar!=null && $strTipoUsuarioAuxiliarparametro_auxiliar!='none' && $strTipoUsuarioAuxiliarparametro_auxiliar!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarparametro_auxiliar);
																
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
				if($strTipoUsuarioAuxiliarparametro_auxiliar==null || $strTipoUsuarioAuxiliarparametro_auxiliar=='none' || $strTipoUsuarioAuxiliarparametro_auxiliar=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarparametro_auxiliar,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, parametro_auxiliar_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, parametro_auxiliar_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina parametro_auxiliar');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($parametro_auxiliar_session);
			
			$this->getSetBusquedasSesionConfig($parametro_auxiliar_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteparametro_auxiliars($this->strAccionBusqueda,$this->parametro_auxiliarLogic->getparametro_auxiliars());*/
				} else if($this->strGenerarReporte=='Html')	{
					$parametro_auxiliar_session->strServletGenerarHtmlReporte='parametro_auxiliarServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(parametro_auxiliar_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(parametro_auxiliar_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($parametro_auxiliar_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$parametro_auxiliar_session=unserialize($this->Session->read(parametro_auxiliar_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarparametro_auxiliar!=null && $strTipoUsuarioAuxiliarparametro_auxiliar=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($parametro_auxiliar_session);
			}
								
			$this->set(parametro_auxiliar_util::$STR_SESSION_NAME, $parametro_auxiliar_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($parametro_auxiliar_session);
			
			/*
			$this->parametro_auxiliar->recursive = 0;
			
			$this->parametro_auxiliars=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('parametro_auxiliars', $this->parametro_auxiliars);
			
			$this->set(parametro_auxiliar_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->parametro_auxiliarActual =$this->parametro_auxiliarClase;
			
			/*$this->parametro_auxiliarActual =$this->migrarModelparametro_auxiliar($this->parametro_auxiliarClase);*/
			
			$this->returnHtml(false);
			
			$this->set(parametro_auxiliar_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=parametro_auxiliar_util::$STR_NOMBRE_OPCION;
				
			if(parametro_auxiliar_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=parametro_auxiliar_util::$STR_MODULO_OPCION.parametro_auxiliar_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(parametro_auxiliar_util::$STR_SESSION_NAME,serialize($parametro_auxiliar_session));
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
			/*$parametro_auxiliarClase= (parametro_auxiliar) parametro_auxiliarsModel.getRowData();*/
			
			$this->parametro_auxiliarClase->setId($this->parametro_auxiliar->getId());	
			$this->parametro_auxiliarClase->setVersionRow($this->parametro_auxiliar->getVersionRow());	
			$this->parametro_auxiliarClase->setVersionRow($this->parametro_auxiliar->getVersionRow());	
			$this->parametro_auxiliarClase->setid_empresa($this->parametro_auxiliar->getid_empresa());	
			$this->parametro_auxiliarClase->setnombre_asignado($this->parametro_auxiliar->getnombre_asignado());	
			$this->parametro_auxiliarClase->setsiguiente_numero_correlativo($this->parametro_auxiliar->getsiguiente_numero_correlativo());	
			$this->parametro_auxiliarClase->setincremento($this->parametro_auxiliar->getincremento());	
			$this->parametro_auxiliarClase->setmostrar_solo_costo_producto($this->parametro_auxiliar->getmostrar_solo_costo_producto());	
			$this->parametro_auxiliarClase->setcon_codigo_secuencial_producto($this->parametro_auxiliar->getcon_codigo_secuencial_producto());	
			$this->parametro_auxiliarClase->setcontador_producto($this->parametro_auxiliar->getcontador_producto());	
			$this->parametro_auxiliarClase->setid_tipo_costeo_kardex($this->parametro_auxiliar->getid_tipo_costeo_kardex());	
			$this->parametro_auxiliarClase->setcon_producto_inactivo($this->parametro_auxiliar->getcon_producto_inactivo());	
			$this->parametro_auxiliarClase->setcon_busqueda_incremental($this->parametro_auxiliar->getcon_busqueda_incremental());	
			$this->parametro_auxiliarClase->setpermitir_revisar_asiento($this->parametro_auxiliar->getpermitir_revisar_asiento());	
			$this->parametro_auxiliarClase->setnumero_decimales_unidades($this->parametro_auxiliar->getnumero_decimales_unidades());	
			$this->parametro_auxiliarClase->setmostrar_documento_anulado($this->parametro_auxiliar->getmostrar_documento_anulado());	
			$this->parametro_auxiliarClase->setsiguiente_numero_correlativo_cc($this->parametro_auxiliar->getsiguiente_numero_correlativo_cc());	
			$this->parametro_auxiliarClase->setcon_eliminacion_fisica_asiento($this->parametro_auxiliar->getcon_eliminacion_fisica_asiento());	
			$this->parametro_auxiliarClase->setsiguiente_numero_correlativo_asiento($this->parametro_auxiliar->getsiguiente_numero_correlativo_asiento());	
			$this->parametro_auxiliarClase->setcon_asiento_simple_factura($this->parametro_auxiliar->getcon_asiento_simple_factura());	
			$this->parametro_auxiliarClase->setcon_codigo_secuencial_cliente($this->parametro_auxiliar->getcon_codigo_secuencial_cliente());	
			$this->parametro_auxiliarClase->setcontador_cliente($this->parametro_auxiliar->getcontador_cliente());	
			$this->parametro_auxiliarClase->setcon_cliente_inactivo($this->parametro_auxiliar->getcon_cliente_inactivo());	
			$this->parametro_auxiliarClase->setcon_codigo_secuencial_proveedor($this->parametro_auxiliar->getcon_codigo_secuencial_proveedor());	
			$this->parametro_auxiliarClase->setcontador_proveedor($this->parametro_auxiliar->getcontador_proveedor());	
			$this->parametro_auxiliarClase->setcon_proveedor_inactivo($this->parametro_auxiliar->getcon_proveedor_inactivo());	
			$this->parametro_auxiliarClase->setabreviatura_registro_tributario($this->parametro_auxiliar->getabreviatura_registro_tributario());	
			$this->parametro_auxiliarClase->setcon_asiento_cheque($this->parametro_auxiliar->getcon_asiento_cheque());	
		
			/*$this->Session->write('parametro_auxiliarVersionRowActual', parametro_auxiliar.getVersionRow());*/
			
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
			
			$parametro_auxiliar_session=unserialize($this->Session->read(parametro_auxiliar_util::$STR_SESSION_NAME));
						
			if($parametro_auxiliar_session==null) {
				$parametro_auxiliar_session=new parametro_auxiliar_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('parametro_auxiliar', $this->parametro_auxiliar->read(null, $id));
	
			
			$this->parametro_auxiliar->recursive = 0;
			
			$this->parametro_auxiliars=$this->paginate();
			
			$this->set('parametro_auxiliars', $this->parametro_auxiliars);
	
			if (empty($this->data)) {
				$this->data = $this->parametro_auxiliar->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->parametro_auxiliarLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->parametro_auxiliarClase);
			
			$this->parametro_auxiliarActual=$this->parametro_auxiliarClase;
			
			/*$this->parametro_auxiliarActual =$this->migrarModelparametro_auxiliar($this->parametro_auxiliarClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->parametro_auxiliarLogic->getparametro_auxiliars(),$this->parametro_auxiliarActual);
			
			$this->actualizarControllerConReturnGeneral($this->parametro_auxiliarReturnGeneral);
			
			//$this->parametro_auxiliarReturnGeneral=$this->parametro_auxiliarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->parametro_auxiliarLogic->getparametro_auxiliars(),$this->parametro_auxiliarActual,$this->parametro_auxiliarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$parametro_auxiliar_session=unserialize($this->Session->read(parametro_auxiliar_util::$STR_SESSION_NAME));
						
			if($parametro_auxiliar_session==null) {
				$parametro_auxiliar_session=new parametro_auxiliar_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoparametro_auxiliar', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->parametro_auxiliarClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->parametro_auxiliarClase);
			
			$this->parametro_auxiliarActual =$this->parametro_auxiliarClase;
			
			/*$this->parametro_auxiliarActual =$this->migrarModelparametro_auxiliar($this->parametro_auxiliarClase);*/
			
			$this->setparametro_auxiliarFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->parametro_auxiliarLogic->getparametro_auxiliars(),$this->parametro_auxiliar);
			
			$this->actualizarControllerConReturnGeneral($this->parametro_auxiliarReturnGeneral);
			
			//this->parametro_auxiliarReturnGeneral=$this->parametro_auxiliarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->parametro_auxiliarLogic->getparametro_auxiliars(),$this->parametro_auxiliar,$this->parametro_auxiliarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->parametro_auxiliarReturnGeneral->getparametro_auxiliar()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idtipo_costeo_kardexDefaultFK!=null && $this->idtipo_costeo_kardexDefaultFK > -1) {
				$this->parametro_auxiliarReturnGeneral->getparametro_auxiliar()->setid_tipo_costeo_kardex($this->idtipo_costeo_kardexDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->parametro_auxiliarReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->parametro_auxiliarReturnGeneral->getparametro_auxiliar(),$this->parametro_auxiliarActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyparametro_auxiliar($this->parametro_auxiliarReturnGeneral->getparametro_auxiliar());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioparametro_auxiliar($this->parametro_auxiliarReturnGeneral->getparametro_auxiliar());*/
			}
			
			if($this->parametro_auxiliarReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->parametro_auxiliarReturnGeneral->getparametro_auxiliar(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualparametro_auxiliar($this->parametro_auxiliar,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->parametro_auxiliarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_auxiliarsAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->parametro_auxiliarsAuxiliar=array();
			}
			
			if(count($this->parametro_auxiliarsAuxiliar)==2) {
				$parametro_auxiliarOrigen=$this->parametro_auxiliarsAuxiliar[0];
				$parametro_auxiliarDestino=$this->parametro_auxiliarsAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($parametro_auxiliarOrigen,$parametro_auxiliarDestino,true,false,false);
				
				$this->actualizarLista($parametro_auxiliarDestino,$this->parametro_auxiliars);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->parametro_auxiliarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_auxiliarsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->parametro_auxiliarsAuxiliar=array();
			}
			
			if(count($this->parametro_auxiliarsAuxiliar) > 0) {
				foreach ($this->parametro_auxiliarsAuxiliar as $parametro_auxiliarSeleccionado) {
					$this->parametro_auxiliar=new parametro_auxiliar();
					
					$this->setCopiarVariablesObjetos($parametro_auxiliarSeleccionado,$this->parametro_auxiliar,true,true,false);
						
					$this->parametro_auxiliars[]=$this->parametro_auxiliar;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->parametro_auxiliarsEliminados as $parametro_auxiliarEliminado) {
				$this->parametro_auxiliarLogic->parametro_auxiliars[]=$parametro_auxiliarEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->parametro_auxiliar=new parametro_auxiliar();
							
				$this->parametro_auxiliars[]=$this->parametro_auxiliar;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
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
		
		$parametro_auxiliarActual=new parametro_auxiliar();
		
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
				
				$parametro_auxiliarActual=$this->parametro_auxiliars[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setnombre_asignado($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setsiguiente_numero_correlativo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setincremento((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setmostrar_solo_costo_producto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_7')));  } else { $parametro_auxiliarActual->setmostrar_solo_costo_producto(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcon_codigo_secuencial_producto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_8')));  } else { $parametro_auxiliarActual->setcon_codigo_secuencial_producto(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcontador_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setid_tipo_costeo_kardex((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcon_producto_inactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_11')));  } else { $parametro_auxiliarActual->setcon_producto_inactivo(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcon_busqueda_incremental(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_12')));  } else { $parametro_auxiliarActual->setcon_busqueda_incremental(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setpermitir_revisar_asiento(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_13')));  } else { $parametro_auxiliarActual->setpermitir_revisar_asiento(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setnumero_decimales_unidades((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setmostrar_documento_anulado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_15')));  } else { $parametro_auxiliarActual->setmostrar_documento_anulado(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setsiguiente_numero_correlativo_cc((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcon_eliminacion_fisica_asiento(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_17')));  } else { $parametro_auxiliarActual->setcon_eliminacion_fisica_asiento(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setsiguiente_numero_correlativo_asiento((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcon_asiento_simple_factura(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_19')));  } else { $parametro_auxiliarActual->setcon_asiento_simple_factura(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcon_codigo_secuencial_cliente(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_20')));  } else { $parametro_auxiliarActual->setcon_codigo_secuencial_cliente(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcontador_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcon_cliente_inactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_22')));  } else { $parametro_auxiliarActual->setcon_cliente_inactivo(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcon_codigo_secuencial_proveedor(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_23')));  } else { $parametro_auxiliarActual->setcon_codigo_secuencial_proveedor(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_24','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcontador_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_24'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_25','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcon_proveedor_inactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_25')));  } else { $parametro_auxiliarActual->setcon_proveedor_inactivo(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_26','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setabreviatura_registro_tributario($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_26'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_27','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcon_asiento_cheque(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_27')));  } else { $parametro_auxiliarActual->setcon_asiento_cheque(false); }
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
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=parametro_auxiliar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadparametro_auxiliar='',string $strTipoPaginaAuxiliarparametro_auxiliar='',string $strTipoUsuarioAuxiliarparametro_auxiliar='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadparametro_auxiliar,$strTipoPaginaAuxiliarparametro_auxiliar,$strTipoUsuarioAuxiliarparametro_auxiliar,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->parametro_auxiliars) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=parametro_auxiliar_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=parametro_auxiliar_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=parametro_auxiliar_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$parametro_auxiliar_session=unserialize($this->Session->read(parametro_auxiliar_util::$STR_SESSION_NAME));
						
			if($parametro_auxiliar_session==null) {
				$parametro_auxiliar_session=new parametro_auxiliar_session();
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
					/*$this->intNumeroPaginacion=parametro_auxiliar_util::$INT_NUMERO_PAGINACION;*/
					
					if($parametro_auxiliar_session->intNumeroPaginacion==parametro_auxiliar_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=parametro_auxiliar_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$parametro_auxiliar_session->intNumeroPaginacion;
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
			
			$this->parametro_auxiliarsEliminados=array();
			
			/*$this->parametro_auxiliarLogic->setConnexion($connexion);*/
			
			$this->parametro_auxiliarLogic->setIsConDeep(true);
			
			$this->parametro_auxiliarLogic->getparametro_auxiliarDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_costeo_kardex');$classes[]=$class;
			
			$this->parametro_auxiliarLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->parametro_auxiliarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->parametro_auxiliarLogic->getparametro_auxiliars()==null|| count($this->parametro_auxiliarLogic->getparametro_auxiliars())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->parametro_auxiliars=$this->parametro_auxiliarLogic->getparametro_auxiliars();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->parametro_auxiliarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->parametro_auxiliarsReporte=$this->parametro_auxiliarLogic->getparametro_auxiliars();
									
						/*$this->generarReportes('Todos',$this->parametro_auxiliarLogic->getparametro_auxiliars());*/
					
						$this->parametro_auxiliarLogic->setparametro_auxiliars($this->parametro_auxiliars);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->parametro_auxiliarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->parametro_auxiliarLogic->getparametro_auxiliars()==null|| count($this->parametro_auxiliarLogic->getparametro_auxiliars())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->parametro_auxiliars=$this->parametro_auxiliarLogic->getparametro_auxiliars();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->parametro_auxiliarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->parametro_auxiliarsReporte=$this->parametro_auxiliarLogic->getparametro_auxiliars();
									
						/*$this->generarReportes('Todos',$this->parametro_auxiliarLogic->getparametro_auxiliars());*/
					
						$this->parametro_auxiliarLogic->setparametro_auxiliars($this->parametro_auxiliars);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idparametro_auxiliar=0;*/
				
				if($parametro_auxiliar_session->bitBusquedaDesdeFKSesionFK!=null && $parametro_auxiliar_session->bitBusquedaDesdeFKSesionFK==true) {
					if($parametro_auxiliar_session->bigIdActualFK!=null && $parametro_auxiliar_session->bigIdActualFK!=0)	{
						$this->idparametro_auxiliar=$parametro_auxiliar_session->bigIdActualFK;	
					}
					
					$parametro_auxiliar_session->bitBusquedaDesdeFKSesionFK=false;
					
					$parametro_auxiliar_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idparametro_auxiliar=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idparametro_auxiliar=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->parametro_auxiliarLogic->getEntity($this->idparametro_auxiliar);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*parametro_auxiliarLogicAdditional::getDetalleIndicePorId($idparametro_auxiliar);*/

				
				if($this->parametro_auxiliarLogic->getparametro_auxiliar()!=null) {
					$this->parametro_auxiliarLogic->setparametro_auxiliars(array());
					$this->parametro_auxiliarLogic->parametro_auxiliars[]=$this->parametro_auxiliarLogic->getparametro_auxiliar();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($parametro_auxiliar_session->bigidempresaActual!=null && $parametro_auxiliar_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$parametro_auxiliar_session->bigidempresaActual;
					$parametro_auxiliar_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_auxiliarLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//parametro_auxiliarLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->parametro_auxiliarLogic->getparametro_auxiliars()==null || count($this->parametro_auxiliarLogic->getparametro_auxiliars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$parametro_auxiliars=$this->parametro_auxiliarLogic->getparametro_auxiliars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_auxiliarLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->parametro_auxiliarsReporte=$this->parametro_auxiliarLogic->getparametro_auxiliars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteparametro_auxiliars("FK_Idempresa",$this->parametro_auxiliarLogic->getparametro_auxiliars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->parametro_auxiliarLogic->setparametro_auxiliars($parametro_auxiliars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtipo_costeo_kardex')
			{

				if($parametro_auxiliar_session->bigidtipo_costeo_kardexActual!=null && $parametro_auxiliar_session->bigidtipo_costeo_kardexActual!=0)
				{
					$this->id_tipo_costeo_kardexFK_Idtipo_costeo_kardex=$parametro_auxiliar_session->bigidtipo_costeo_kardexActual;
					$parametro_auxiliar_session->bigidtipo_costeo_kardexActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_auxiliarLogic->getsFK_Idtipo_costeo_kardex($finalQueryPaginacion,$this->pagination,$this->id_tipo_costeo_kardexFK_Idtipo_costeo_kardex);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//parametro_auxiliarLogicAdditional::getDetalleIndiceFK_Idtipo_costeo_kardex($this->id_tipo_costeo_kardexFK_Idtipo_costeo_kardex);


					if($this->parametro_auxiliarLogic->getparametro_auxiliars()==null || count($this->parametro_auxiliarLogic->getparametro_auxiliars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$parametro_auxiliars=$this->parametro_auxiliarLogic->getparametro_auxiliars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_auxiliarLogic->getsFK_Idtipo_costeo_kardex('',$this->pagination,$this->id_tipo_costeo_kardexFK_Idtipo_costeo_kardex);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->parametro_auxiliarsReporte=$this->parametro_auxiliarLogic->getparametro_auxiliars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteparametro_auxiliars("FK_Idtipo_costeo_kardex",$this->parametro_auxiliarLogic->getparametro_auxiliars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->parametro_auxiliarLogic->setparametro_auxiliars($parametro_auxiliars);
					}
				//}

			} 
		
		$parametro_auxiliar_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$parametro_auxiliar_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->parametro_auxiliarLogic->loadForeignsKeysDescription();*/
		
		$this->parametro_auxiliars=$this->parametro_auxiliarLogic->getparametro_auxiliars();
		
		if($this->parametro_auxiliarsEliminados==null) {
			$this->parametro_auxiliarsEliminados=array();
		}
		
		$this->Session->write(parametro_auxiliar_util::$STR_SESSION_NAME.'Lista',serialize($this->parametro_auxiliars));
		$this->Session->write(parametro_auxiliar_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->parametro_auxiliarsEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(parametro_auxiliar_util::$STR_SESSION_NAME,serialize($parametro_auxiliar_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idparametro_auxiliar=$idGeneral;
			
			$this->intNumeroPaginacion=parametro_auxiliar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
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
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}

			if(count($this->parametro_auxiliars) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
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
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=parametro_auxiliar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtipo_costeo_kardexParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=parametro_auxiliar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_tipo_costeo_kardexFK_Idtipo_costeo_kardex=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtipo_costeo_kardex','cmbid_tipo_costeo_kardex');

			$this->strAccionBusqueda='FK_Idtipo_costeo_kardex';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idempresa($strFinalQuery,$id_empresa)
	{
		try
		{

			$this->parametro_auxiliarLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtipo_costeo_kardex($strFinalQuery,$id_tipo_costeo_kardex)
	{
		try
		{

			$this->parametro_auxiliarLogic->getsFK_Idtipo_costeo_kardex($strFinalQuery,new Pagination(),$id_tipo_costeo_kardex);
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
			
			
			$parametro_auxiliarForeignKey=new parametro_auxiliar_param_return(); //parametro_auxiliarForeignKey();
			
			$parametro_auxiliar_session=unserialize($this->Session->read(parametro_auxiliar_util::$STR_SESSION_NAME));
						
			if($parametro_auxiliar_session==null) {
				$parametro_auxiliar_session=new parametro_auxiliar_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$parametro_auxiliarForeignKey=$this->parametro_auxiliarLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$parametro_auxiliar_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$parametro_auxiliarForeignKey->empresasFK;
				$this->idempresaDefaultFK=$parametro_auxiliarForeignKey->idempresaDefaultFK;
			}

			if($parametro_auxiliar_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_costeo_kardex',$this->strRecargarFkTipos,',')) {
				$this->tipo_costeo_kardexsFK=$parametro_auxiliarForeignKey->tipo_costeo_kardexsFK;
				$this->idtipo_costeo_kardexDefaultFK=$parametro_auxiliarForeignKey->idtipo_costeo_kardexDefaultFK;
			}

			if($parametro_auxiliar_session->bitBusquedaDesdeFKSesiontipo_costeo_kardex) {
				$this->setVisibleBusquedasParatipo_costeo_kardex(true);
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
	
	function cargarCombosFKFromReturnGeneral($parametro_auxiliarReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$parametro_auxiliarReturnGeneral->strRecargarFkTipos;
			
			


			if($parametro_auxiliarReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$parametro_auxiliarReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$parametro_auxiliarReturnGeneral->idempresaDefaultFK;
			}


			if($parametro_auxiliarReturnGeneral->con_tipo_costeo_kardexsFK==true) {
				$this->tipo_costeo_kardexsFK=$parametro_auxiliarReturnGeneral->tipo_costeo_kardexsFK;
				$this->idtipo_costeo_kardexDefaultFK=$parametro_auxiliarReturnGeneral->idtipo_costeo_kardexDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(parametro_auxiliar_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$parametro_auxiliar_session=unserialize($this->Session->read(parametro_auxiliar_util::$STR_SESSION_NAME));
		
		if($parametro_auxiliar_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($parametro_auxiliar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($parametro_auxiliar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==tipo_costeo_kardex_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='tipo_costeo_kardex';
			}
			
			$parametro_auxiliar_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}						
			
			$this->parametro_auxiliarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_auxiliarsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->parametro_auxiliarsAuxiliar=array();
			}
			
			if(count($this->parametro_auxiliarsAuxiliar) > 0) {
				
				foreach ($this->parametro_auxiliarsAuxiliar as $parametro_auxiliarSeleccionado) {
					$this->eliminarTablaBase($parametro_auxiliarSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
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


	public function gettipo_costeo_kardexsFKListSelectItem() 
	{
		$tipo_costeo_kardexsList=array();

		$item=null;

		foreach($this->tipo_costeo_kardexsFK as $tipo_costeo_kardex)
		{
			$item=new SelectItem();
			$item->setLabel($tipo_costeo_kardex->getnombre());
			$item->setValue($tipo_costeo_kardex->getId());
			$tipo_costeo_kardexsList[]=$item;
		}

		return $tipo_costeo_kardexsList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=parametro_auxiliar_util::$INT_NUMERO_PAGINACION;
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
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$parametro_auxiliarsNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->parametro_auxiliars as $parametro_auxiliarLocal) {
				if($parametro_auxiliarLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->parametro_auxiliar=new parametro_auxiliar();
				
				$this->parametro_auxiliar->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->parametro_auxiliars[]=$this->parametro_auxiliar;*/
				
				$parametro_auxiliarsNuevos[]=$this->parametro_auxiliar;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_costeo_kardex');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->setparametro_auxiliars($parametro_auxiliarsNuevos);
					
				$this->parametro_auxiliarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($parametro_auxiliarsNuevos as $parametro_auxiliarNuevo) {
					$this->parametro_auxiliars[]=$parametro_auxiliarNuevo;
				}
				
				/*$this->parametro_auxiliars[]=$parametro_auxiliarsNuevos;*/
				
				$this->parametro_auxiliarLogic->setparametro_auxiliars($this->parametro_auxiliars);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($parametro_auxiliarsNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$parametro_auxiliar_session=unserialize($this->Session->read(parametro_auxiliar_util::$STR_SESSION_NAME));

		if($parametro_auxiliar_session==null) {
			$parametro_auxiliar_session=new parametro_auxiliar_session();
		}
		
		if($parametro_auxiliar_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($parametro_auxiliar_session->bigidempresaActual!=null && $parametro_auxiliar_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($parametro_auxiliar_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=parametro_auxiliar_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombostipo_costeo_kardexsFK($connexion=null,$strRecargarFkQuery=''){
		$tipo_costeo_kardexLogic= new tipo_costeo_kardex_logic();
		$pagination= new Pagination();
		$this->tipo_costeo_kardexsFK=array();

		$tipo_costeo_kardexLogic->setConnexion($connexion);
		$tipo_costeo_kardexLogic->gettipo_costeo_kardexDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$parametro_auxiliar_session=unserialize($this->Session->read(parametro_auxiliar_util::$STR_SESSION_NAME));

		if($parametro_auxiliar_session==null) {
			$parametro_auxiliar_session=new parametro_auxiliar_session();
		}
		
		if($parametro_auxiliar_session->bitBusquedaDesdeFKSesiontipo_costeo_kardex!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_costeo_kardex_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltipo_costeo_kardex=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_costeo_kardex=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_costeo_kardex, '');
				$finalQueryGlobaltipo_costeo_kardex.=tipo_costeo_kardex_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_costeo_kardex.$strRecargarFkQuery;		

				$tipo_costeo_kardexLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostipo_costeo_kardexsFK($tipo_costeo_kardexLogic->gettipo_costeo_kardexs());

		} else {
			$this->setVisibleBusquedasParatipo_costeo_kardex(true);


			if($parametro_auxiliar_session->bigidtipo_costeo_kardexActual!=null && $parametro_auxiliar_session->bigidtipo_costeo_kardexActual > 0) {
				$tipo_costeo_kardexLogic->getEntity($parametro_auxiliar_session->bigidtipo_costeo_kardexActual);//WithConnection

				$this->tipo_costeo_kardexsFK[$tipo_costeo_kardexLogic->gettipo_costeo_kardex()->getId()]=parametro_auxiliar_util::gettipo_costeo_kardexDescripcion($tipo_costeo_kardexLogic->gettipo_costeo_kardex());
				$this->idtipo_costeo_kardexDefaultFK=$tipo_costeo_kardexLogic->gettipo_costeo_kardex()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=parametro_auxiliar_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombostipo_costeo_kardexsFK($tipo_costeo_kardexs){

		foreach ($tipo_costeo_kardexs as $tipo_costeo_kardexLocal ) {
			if($this->idtipo_costeo_kardexDefaultFK==0) {
				$this->idtipo_costeo_kardexDefaultFK=$tipo_costeo_kardexLocal->getId();
			}

			$this->tipo_costeo_kardexsFK[$tipo_costeo_kardexLocal->getId()]=parametro_auxiliar_util::gettipo_costeo_kardexDescripcion($tipo_costeo_kardexLocal);
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

			$strDescripcionempresa=parametro_auxiliar_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
	}

	public function cargarDescripciontipo_costeo_kardexFK($idtipo_costeo_kardex,$connexion=null){
		$tipo_costeo_kardexLogic= new tipo_costeo_kardex_logic();
		$tipo_costeo_kardexLogic->setConnexion($connexion);
		$tipo_costeo_kardexLogic->gettipo_costeo_kardexDataAccess()->isForFKData=true;
		$strDescripciontipo_costeo_kardex='';

		if($idtipo_costeo_kardex!=null && $idtipo_costeo_kardex!='' && $idtipo_costeo_kardex!='null') {
			if($connexion!=null) {
				$tipo_costeo_kardexLogic->getEntity($idtipo_costeo_kardex);//WithConnection
			} else {
				$tipo_costeo_kardexLogic->getEntityWithConnection($idtipo_costeo_kardex);//
			}

			$strDescripciontipo_costeo_kardex=parametro_auxiliar_util::gettipo_costeo_kardexDescripcion($tipo_costeo_kardexLogic->gettipo_costeo_kardex());

		} else {
			$strDescripciontipo_costeo_kardex='null';
		}

		return $strDescripciontipo_costeo_kardex;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(parametro_auxiliar $parametro_auxiliarClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$parametro_auxiliarClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
			
			
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
		$this->strVisibleFK_Idtipo_costeo_kardex=$strParaVisibleNegacionempresa;
	}

	public function setVisibleBusquedasParatipo_costeo_kardex($isParatipo_costeo_kardex){
		$strParaVisibletipo_costeo_kardex='display:table-row';
		$strParaVisibleNegaciontipo_costeo_kardex='display:none';

		if($isParatipo_costeo_kardex) {
			$strParaVisibletipo_costeo_kardex='display:table-row';
			$strParaVisibleNegaciontipo_costeo_kardex='display:none';
		} else {
			$strParaVisibletipo_costeo_kardex='display:none';
			$strParaVisibleNegaciontipo_costeo_kardex='display:table-row';
		}


		$strParaVisibleNegaciontipo_costeo_kardex=trim($strParaVisibleNegaciontipo_costeo_kardex);

		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontipo_costeo_kardex;
		$this->strVisibleFK_Idtipo_costeo_kardex=$strParaVisibletipo_costeo_kardex;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idparametro_auxiliarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idparametro_auxiliarActual=$idparametro_auxiliarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.parametro_auxiliarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.parametro_auxiliarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarparametro_auxiliar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatipo_costeo_kardex() {//$idparametro_auxiliarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idparametro_auxiliarActual=$idparametro_auxiliarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.tipo_costeo_kardex_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.parametro_auxiliarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_costeo_kardex(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',tipo_costeo_kardex_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.parametro_auxiliarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_costeo_kardex(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_costeo_kardex_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarparametro_auxiliar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(parametro_auxiliar_util::$STR_SESSION_NAME,parametro_auxiliar_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$parametro_auxiliar_session=$this->Session->read(parametro_auxiliar_util::$STR_SESSION_NAME);
				
		if($parametro_auxiliar_session==null) {
			$parametro_auxiliar_session=new parametro_auxiliar_session();		
			//$this->Session->write('parametro_auxiliar_session',$parametro_auxiliar_session);							
		}
		*/
		
		$parametro_auxiliar_session=new parametro_auxiliar_session();
    	$parametro_auxiliar_session->strPathNavegacionActual=parametro_auxiliar_util::$STR_CLASS_WEB_TITULO;
    	$parametro_auxiliar_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(parametro_auxiliar_util::$STR_SESSION_NAME,serialize($parametro_auxiliar_session));		
	}	
	
	public function getSetBusquedasSesionConfig(parametro_auxiliar_session $parametro_auxiliar_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($parametro_auxiliar_session->bitBusquedaDesdeFKSesionFK!=null && $parametro_auxiliar_session->bitBusquedaDesdeFKSesionFK==true) {
			if($parametro_auxiliar_session->bigIdActualFK!=null && $parametro_auxiliar_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$parametro_auxiliar_session->bigIdActualFKParaPosibleAtras=$parametro_auxiliar_session->bigIdActualFK;*/
			}
				
			$parametro_auxiliar_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$parametro_auxiliar_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(parametro_auxiliar_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($parametro_auxiliar_session->bitBusquedaDesdeFKSesionempresa!=null && $parametro_auxiliar_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($parametro_auxiliar_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(parametro_auxiliar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(parametro_auxiliar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(parametro_auxiliar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($parametro_auxiliar_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($parametro_auxiliar_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=parametro_auxiliar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$parametro_auxiliar_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$parametro_auxiliar_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=parametro_auxiliar_util::$INT_NUMERO_PAGINACION;

				if($parametro_auxiliar_session->intNumeroPaginacion==parametro_auxiliar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_auxiliar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_auxiliar_session->intNumeroPaginacion;
				}
			}
			else if($parametro_auxiliar_session->bitBusquedaDesdeFKSesiontipo_costeo_kardex!=null && $parametro_auxiliar_session->bitBusquedaDesdeFKSesiontipo_costeo_kardex==true)
			{
				if($parametro_auxiliar_session->bigidtipo_costeo_kardexActual!=0) {
					$this->strAccionBusqueda='FK_Idtipo_costeo_kardex';

					$existe_history=HistoryWeb::ExisteElemento(parametro_auxiliar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(parametro_auxiliar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(parametro_auxiliar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($parametro_auxiliar_session->bigidtipo_costeo_kardexActualDescripcion);
						$historyWeb->setIdActual($parametro_auxiliar_session->bigidtipo_costeo_kardexActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=parametro_auxiliar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$parametro_auxiliar_session->bigidtipo_costeo_kardexActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$parametro_auxiliar_session->bitBusquedaDesdeFKSesiontipo_costeo_kardex=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=parametro_auxiliar_util::$INT_NUMERO_PAGINACION;

				if($parametro_auxiliar_session->intNumeroPaginacion==parametro_auxiliar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_auxiliar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_auxiliar_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$parametro_auxiliar_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$parametro_auxiliar_session=unserialize($this->Session->read(parametro_auxiliar_util::$STR_SESSION_NAME));
		
		if($parametro_auxiliar_session==null) {
			$parametro_auxiliar_session=new parametro_auxiliar_session();
		}
		
		$parametro_auxiliar_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$parametro_auxiliar_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$parametro_auxiliar_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$parametro_auxiliar_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idtipo_costeo_kardex') {
			$parametro_auxiliar_session->id_tipo_costeo_kardex=$this->id_tipo_costeo_kardexFK_Idtipo_costeo_kardex;	

		}
		
		$this->Session->write(parametro_auxiliar_util::$STR_SESSION_NAME,serialize($parametro_auxiliar_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(parametro_auxiliar_session $parametro_auxiliar_session) {
		
		if($parametro_auxiliar_session==null) {
			$parametro_auxiliar_session=unserialize($this->Session->read(parametro_auxiliar_util::$STR_SESSION_NAME));
		}
		
		if($parametro_auxiliar_session==null) {
		   $parametro_auxiliar_session=new parametro_auxiliar_session();
		}
		
		if($parametro_auxiliar_session->strUltimaBusqueda!=null && $parametro_auxiliar_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$parametro_auxiliar_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$parametro_auxiliar_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$parametro_auxiliar_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$parametro_auxiliar_session->id_empresa;
				$parametro_auxiliar_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtipo_costeo_kardex') {
				$this->id_tipo_costeo_kardexFK_Idtipo_costeo_kardex=$parametro_auxiliar_session->id_tipo_costeo_kardex;
				$parametro_auxiliar_session->id_tipo_costeo_kardex=-1;

			}
		}
		
		$parametro_auxiliar_session->strUltimaBusqueda='';
		//$parametro_auxiliar_session->intNumeroPaginacion=10;
		$parametro_auxiliar_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(parametro_auxiliar_util::$STR_SESSION_NAME,serialize($parametro_auxiliar_session));		
	}
	
	public function parametro_auxiliarsControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idtipo_costeo_kardexDefaultFK = 0;
	}
	
	public function setparametro_auxiliarFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_tipo_costeo_kardex',$this->idtipo_costeo_kardexDefaultFK);
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

		tipo_costeo_kardex::$class;
		tipo_costeo_kardex_carga::$CONTROLLER;
		
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
		interface parametro_auxiliar_controlI {	
		
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
		
		public function onLoad(parametro_auxiliar_session $parametro_auxiliar_session=null);	
		function index(?string $strTypeOnLoadparametro_auxiliar='',?string $strTipoPaginaAuxiliarparametro_auxiliar='',?string $strTipoUsuarioAuxiliarparametro_auxiliar='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadparametro_auxiliar='',string $strTipoPaginaAuxiliarparametro_auxiliar='',string $strTipoUsuarioAuxiliarparametro_auxiliar='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($parametro_auxiliarReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(parametro_auxiliar $parametro_auxiliarClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(parametro_auxiliar_session $parametro_auxiliar_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(parametro_auxiliar_session $parametro_auxiliar_session);	
		public function parametro_auxiliarsControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setparametro_auxiliarFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
