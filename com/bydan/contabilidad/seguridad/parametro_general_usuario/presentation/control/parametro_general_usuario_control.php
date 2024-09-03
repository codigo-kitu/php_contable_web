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

namespace com\bydan\contabilidad\seguridad\parametro_general_usuario\presentation\control;

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

use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/parametro_general_usuario/util/parametro_general_usuario_carga.php');
use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_carga;

use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_util;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_param_return;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\logic\parametro_general_usuario_logic;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\presentation\session\parametro_general_usuario_session;


//FK


use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\seguridad\tipo_fondo\business\entity\tipo_fondo;
use com\bydan\contabilidad\seguridad\tipo_fondo\business\logic\tipo_fondo_logic;
use com\bydan\contabilidad\seguridad\tipo_fondo\util\tipo_fondo_carga;
use com\bydan\contabilidad\seguridad\tipo_fondo\util\tipo_fondo_util;

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\sucursal\util\sucursal_carga;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_carga;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_carga;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
parametro_general_usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
parametro_general_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
parametro_general_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
parametro_general_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*parametro_general_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/seguridad/parametro_general_usuario/presentation/control/parametro_general_usuario_init_control.php');
use com\bydan\contabilidad\seguridad\parametro_general_usuario\presentation\control\parametro_general_usuario_init_control;

include_once('com/bydan/contabilidad/seguridad/parametro_general_usuario/presentation/control/parametro_general_usuario_base_control.php');
use com\bydan\contabilidad\seguridad\parametro_general_usuario\presentation\control\parametro_general_usuario_base_control;

class parametro_general_usuario_control extends parametro_general_usuario_base_control {	
	
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
					
					
				if($this->data['con_exportar_cabecera']==null) {$this->data['con_exportar_cabecera']=false;} else {if($this->data['con_exportar_cabecera']=='on') {$this->data['con_exportar_cabecera']=true;}}
					
				if($this->data['con_exportar_campo_version']==null) {$this->data['con_exportar_campo_version']=false;} else {if($this->data['con_exportar_campo_version']=='on') {$this->data['con_exportar_campo_version']=true;}}
					
				if($this->data['con_botones_tool_bar']==null) {$this->data['con_botones_tool_bar']=false;} else {if($this->data['con_botones_tool_bar']=='on') {$this->data['con_botones_tool_bar']=true;}}
					
				if($this->data['con_cargar_por_parte']==null) {$this->data['con_cargar_por_parte']=false;} else {if($this->data['con_cargar_por_parte']=='on') {$this->data['con_cargar_por_parte']=true;}}
					
				if($this->data['con_guardar_relaciones']==null) {$this->data['con_guardar_relaciones']=false;} else {if($this->data['con_guardar_relaciones']=='on') {$this->data['con_guardar_relaciones']=true;}}
					
				if($this->data['con_mostrar_acciones_campo_general']==null) {$this->data['con_mostrar_acciones_campo_general']=false;} else {if($this->data['con_mostrar_acciones_campo_general']=='on') {$this->data['con_mostrar_acciones_campo_general']=true;}}
					
				if($this->data['con_mensaje_confirmacion']==null) {$this->data['con_mensaje_confirmacion']=false;} else {if($this->data['con_mensaje_confirmacion']=='on') {$this->data['con_mensaje_confirmacion']=true;}}
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
			
			
			else if($action=="FK_Idejercicio"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdejercicioParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idperiodo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdperiodoParaProcesar();
			}
			else if($action=="FK_Idsucursal"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdsucursalParaProcesar();
			}
			else if($action=="FK_Idtipo_fondo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtipo_fondoParaProcesar();
			}
			else if($action=="FK_Idusuarioid"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdusuarioidParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParausuario') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idparametro_general_usuarioActual=$this->getDataId();
				$this->abrirBusquedaParausuario();//$idparametro_general_usuarioActual
			}
			else if($action=='abrirBusquedaParatipo_fondo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idparametro_general_usuarioActual=$this->getDataId();
				$this->abrirBusquedaParatipo_fondo();//$idparametro_general_usuarioActual
			}
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idparametro_general_usuarioActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idparametro_general_usuarioActual
			}
			else if($action=='abrirBusquedaParasucursal') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idparametro_general_usuarioActual=$this->getDataId();
				$this->abrirBusquedaParasucursal();//$idparametro_general_usuarioActual
			}
			else if($action=='abrirBusquedaParaejercicio') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idparametro_general_usuarioActual=$this->getDataId();
				$this->abrirBusquedaParaejercicio();//$idparametro_general_usuarioActual
			}
			else if($action=='abrirBusquedaParaperiodo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idparametro_general_usuarioActual=$this->getDataId();
				$this->abrirBusquedaParaperiodo();//$idparametro_general_usuarioActual
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
					
					$parametro_general_usuarioController = new parametro_general_usuario_control();
					
					$parametro_general_usuarioController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($parametro_general_usuarioController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$parametro_general_usuarioController = new parametro_general_usuario_control();
						$parametro_general_usuarioController = $this;
						
						$jsonResponse = json_encode($parametro_general_usuarioController->parametro_general_usuarios);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->parametro_general_usuarioReturnGeneral==null) {
					$this->parametro_general_usuarioReturnGeneral=new parametro_general_usuario_param_return();
				}
				
				echo($this->parametro_general_usuarioReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$parametro_general_usuarioController=new parametro_general_usuario_control();
		
		$parametro_general_usuarioController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$parametro_general_usuarioController->usuarioActual=new usuario();
		
		$parametro_general_usuarioController->usuarioActual->setId($this->usuarioActual->getId());
		$parametro_general_usuarioController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$parametro_general_usuarioController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$parametro_general_usuarioController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$parametro_general_usuarioController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$parametro_general_usuarioController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$parametro_general_usuarioController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$parametro_general_usuarioController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $parametro_general_usuarioController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadparametro_general_usuario= $this->getDataGeneralString('strTypeOnLoadparametro_general_usuario');
		$strTipoPaginaAuxiliarparametro_general_usuario= $this->getDataGeneralString('strTipoPaginaAuxiliarparametro_general_usuario');
		$strTipoUsuarioAuxiliarparametro_general_usuario= $this->getDataGeneralString('strTipoUsuarioAuxiliarparametro_general_usuario');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadparametro_general_usuario,$strTipoPaginaAuxiliarparametro_general_usuario,$strTipoUsuarioAuxiliarparametro_general_usuario,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadparametro_general_usuario!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('parametro_general_usuario','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(parametro_general_usuario_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarparametro_general_usuario,$this->strTipoUsuarioAuxiliarparametro_general_usuario,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(parametro_general_usuario_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarparametro_general_usuario,$this->strTipoUsuarioAuxiliarparametro_general_usuario,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->parametro_general_usuarioReturnGeneral=new parametro_general_usuario_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->parametro_general_usuarioReturnGeneral->conGuardarReturnSessionJs=true;
		$this->parametro_general_usuarioReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->parametro_general_usuarioReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->parametro_general_usuarioReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->parametro_general_usuarioReturnGeneral);
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
		$this->parametro_general_usuarioReturnGeneral=new parametro_general_usuario_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->parametro_general_usuarioReturnGeneral->conGuardarReturnSessionJs=true;
		$this->parametro_general_usuarioReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->parametro_general_usuarioReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->parametro_general_usuarioReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->parametro_general_usuarioReturnGeneral);
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
		$this->parametro_general_usuarioReturnGeneral=new parametro_general_usuario_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->parametro_general_usuarioReturnGeneral->conGuardarReturnSessionJs=true;
		$this->parametro_general_usuarioReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->parametro_general_usuarioReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->parametro_general_usuarioReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->parametro_general_usuarioReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
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
			
			
			$this->parametro_general_usuarioReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->parametro_general_usuarioReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->parametro_general_usuarioReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->parametro_general_usuarioReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->parametro_general_usuarioReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->parametro_general_usuarioReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->parametro_general_usuarioReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->parametro_general_usuarioReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->parametro_general_usuarioReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->parametro_general_usuarioReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->parametro_general_usuarioReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->parametro_general_usuarioReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->parametro_general_usuarioReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->parametro_general_usuarioReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->parametro_general_usuarioReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->parametro_general_usuarioReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->parametro_general_usuarioReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->parametro_general_usuarioReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
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
		
		$this->parametro_general_usuarioLogic=new parametro_general_usuario_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->parametro_general_usuario=new parametro_general_usuario();
		
		$this->strTypeOnLoadparametro_general_usuario='onload';
		$this->strTipoPaginaAuxiliarparametro_general_usuario='none';
		$this->strTipoUsuarioAuxiliarparametro_general_usuario='none';	

		$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;
		
		$this->parametro_general_usuarioModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_general_usuarioControllerAdditional=new parametro_general_usuario_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(parametro_general_usuario_session $parametro_general_usuario_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($parametro_general_usuario_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadparametro_general_usuario='',?string $strTipoPaginaAuxiliarparametro_general_usuario='',?string $strTipoUsuarioAuxiliarparametro_general_usuario='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadparametro_general_usuario=$strTypeOnLoadparametro_general_usuario;
			$this->strTipoPaginaAuxiliarparametro_general_usuario=$strTipoPaginaAuxiliarparametro_general_usuario;
			$this->strTipoUsuarioAuxiliarparametro_general_usuario=$strTipoUsuarioAuxiliarparametro_general_usuario;
	
			if($strTipoUsuarioAuxiliarparametro_general_usuario=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->parametro_general_usuario=new parametro_general_usuario();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Parametro Generales';
			
			
			$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));
							
			if($parametro_general_usuario_session==null) {
				$parametro_general_usuario_session=new parametro_general_usuario_session();
				
				/*$this->Session->write('parametro_general_usuario_session',$parametro_general_usuario_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($parametro_general_usuario_session->strFuncionJsPadre!=null && $parametro_general_usuario_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$parametro_general_usuario_session->strFuncionJsPadre;
				
				$parametro_general_usuario_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($parametro_general_usuario_session);
			
			if($strTypeOnLoadparametro_general_usuario!=null && $strTypeOnLoadparametro_general_usuario=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$parametro_general_usuario_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$parametro_general_usuario_session->setPaginaPopupVariables(true);
				}
				
				if($parametro_general_usuario_session->intNumeroPaginacion==parametro_general_usuario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_general_usuario_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,parametro_general_usuario_util::$STR_SESSION_NAME,'seguridad');																
			
			} else if($strTypeOnLoadparametro_general_usuario!=null && $strTypeOnLoadparametro_general_usuario=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$parametro_general_usuario_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;*/
				
				if($parametro_general_usuario_session->intNumeroPaginacion==parametro_general_usuario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_general_usuario_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarparametro_general_usuario!=null && $strTipoPaginaAuxiliarparametro_general_usuario=='none') {
				/*$parametro_general_usuario_session->strStyleDivHeader='display:table-row';*/
				
				/*$parametro_general_usuario_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarparametro_general_usuario!=null && $strTipoPaginaAuxiliarparametro_general_usuario=='iframe') {
					/*
					$parametro_general_usuario_session->strStyleDivArbol='display:none';
					$parametro_general_usuario_session->strStyleDivHeader='display:none';
					$parametro_general_usuario_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$parametro_general_usuario_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->parametro_general_usuarioClase=new parametro_general_usuario();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=parametro_general_usuario_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(parametro_general_usuario_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->parametro_general_usuarioLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->parametro_general_usuarioLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->parametro_general_usuarioLogic=new parametro_general_usuario_logic();*/
			
			
			$this->parametro_general_usuariosModel=null;
			/*new ListDataModel();*/
			
			/*$this->parametro_general_usuariosModel.setWrappedData(parametro_general_usuarioLogic->getparametro_general_usuarios());*/
						
			$this->parametro_general_usuarios= array();
			$this->parametro_general_usuariosEliminados=array();
			$this->parametro_general_usuariosSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= parametro_general_usuario_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->parametro_general_usuario= new parametro_general_usuario();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idejercicio='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idperiodo='display:table-row';
			$this->strVisibleFK_Idsucursal='display:table-row';
			$this->strVisibleFK_Idtipo_fondo='display:table-row';
			$this->strVisibleFK_Idusuarioid='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarparametro_general_usuario!=null && $strTipoUsuarioAuxiliarparametro_general_usuario!='none' && $strTipoUsuarioAuxiliarparametro_general_usuario!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarparametro_general_usuario);
																
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
				if($strTipoUsuarioAuxiliarparametro_general_usuario!=null && $strTipoUsuarioAuxiliarparametro_general_usuario!='none' && $strTipoUsuarioAuxiliarparametro_general_usuario!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarparametro_general_usuario);
																
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
				if($strTipoUsuarioAuxiliarparametro_general_usuario==null || $strTipoUsuarioAuxiliarparametro_general_usuario=='none' || $strTipoUsuarioAuxiliarparametro_general_usuario=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarparametro_general_usuario,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, parametro_general_usuario_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, parametro_general_usuario_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina parametro_general_usuario');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($parametro_general_usuario_session);
			
			$this->getSetBusquedasSesionConfig($parametro_general_usuario_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteparametro_general_usuarios($this->strAccionBusqueda,$this->parametro_general_usuarioLogic->getparametro_general_usuarios());*/
				} else if($this->strGenerarReporte=='Html')	{
					$parametro_general_usuario_session->strServletGenerarHtmlReporte='parametro_general_usuarioServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(parametro_general_usuario_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(parametro_general_usuario_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($parametro_general_usuario_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarparametro_general_usuario!=null && $strTipoUsuarioAuxiliarparametro_general_usuario=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($parametro_general_usuario_session);
			}
								
			$this->set(parametro_general_usuario_util::$STR_SESSION_NAME, $parametro_general_usuario_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($parametro_general_usuario_session);
			
			/*
			$this->parametro_general_usuario->recursive = 0;
			
			$this->parametro_general_usuarios=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('parametro_general_usuarios', $this->parametro_general_usuarios);
			
			$this->set(parametro_general_usuario_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->parametro_general_usuarioActual =$this->parametro_general_usuarioClase;
			
			/*$this->parametro_general_usuarioActual =$this->migrarModelparametro_general_usuario($this->parametro_general_usuarioClase);*/
			
			$this->returnHtml(false);
			
			$this->set(parametro_general_usuario_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=parametro_general_usuario_util::$STR_NOMBRE_OPCION;
				
			if(parametro_general_usuario_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=parametro_general_usuario_util::$STR_MODULO_OPCION.parametro_general_usuario_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(parametro_general_usuario_util::$STR_SESSION_NAME,serialize($parametro_general_usuario_session));
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
			/*$parametro_general_usuarioClase= (parametro_general_usuario) parametro_general_usuariosModel.getRowData();*/
			
			$this->parametro_general_usuarioClase->setId($this->parametro_general_usuario->getId());	
			$this->parametro_general_usuarioClase->setVersionRow($this->parametro_general_usuario->getVersionRow());	
			$this->parametro_general_usuarioClase->setVersionRow($this->parametro_general_usuario->getVersionRow());	
			$this->parametro_general_usuarioClase->setid_tipo_fondo($this->parametro_general_usuario->getid_tipo_fondo());	
			$this->parametro_general_usuarioClase->setid_empresa($this->parametro_general_usuario->getid_empresa());	
			$this->parametro_general_usuarioClase->setid_sucursal($this->parametro_general_usuario->getid_sucursal());	
			$this->parametro_general_usuarioClase->setid_ejercicio($this->parametro_general_usuario->getid_ejercicio());	
			$this->parametro_general_usuarioClase->setid_periodo($this->parametro_general_usuario->getid_periodo());	
			$this->parametro_general_usuarioClase->setpath_exportar($this->parametro_general_usuario->getpath_exportar());	
			$this->parametro_general_usuarioClase->setcon_exportar_cabecera($this->parametro_general_usuario->getcon_exportar_cabecera());	
			$this->parametro_general_usuarioClase->setcon_exportar_campo_version($this->parametro_general_usuario->getcon_exportar_campo_version());	
			$this->parametro_general_usuarioClase->setcon_botones_tool_bar($this->parametro_general_usuario->getcon_botones_tool_bar());	
			$this->parametro_general_usuarioClase->setcon_cargar_por_parte($this->parametro_general_usuario->getcon_cargar_por_parte());	
			$this->parametro_general_usuarioClase->setcon_guardar_relaciones($this->parametro_general_usuario->getcon_guardar_relaciones());	
			$this->parametro_general_usuarioClase->setcon_mostrar_acciones_campo_general($this->parametro_general_usuario->getcon_mostrar_acciones_campo_general());	
			$this->parametro_general_usuarioClase->setcon_mensaje_confirmacion($this->parametro_general_usuario->getcon_mensaje_confirmacion());	
		
			/*$this->Session->write('parametro_general_usuarioVersionRowActual', parametro_general_usuario.getVersionRow());*/
			
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
			
			$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));
						
			if($parametro_general_usuario_session==null) {
				$parametro_general_usuario_session=new parametro_general_usuario_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('parametro_general_usuario', $this->parametro_general_usuario->read(null, $id));
	
			
			$this->parametro_general_usuario->recursive = 0;
			
			$this->parametro_general_usuarios=$this->paginate();
			
			$this->set('parametro_general_usuarios', $this->parametro_general_usuarios);
	
			if (empty($this->data)) {
				$this->data = $this->parametro_general_usuario->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->parametro_general_usuarioLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->parametro_general_usuarioClase);
			
			$this->parametro_general_usuarioActual=$this->parametro_general_usuarioClase;
			
			/*$this->parametro_general_usuarioActual =$this->migrarModelparametro_general_usuario($this->parametro_general_usuarioClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->parametro_general_usuarioLogic->getparametro_general_usuarios(),$this->parametro_general_usuarioActual);
			
			$this->actualizarControllerConReturnGeneral($this->parametro_general_usuarioReturnGeneral);
			
			//$this->parametro_general_usuarioReturnGeneral=$this->parametro_general_usuarioLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->parametro_general_usuarioLogic->getparametro_general_usuarios(),$this->parametro_general_usuarioActual,$this->parametro_general_usuarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));
						
			if($parametro_general_usuario_session==null) {
				$parametro_general_usuario_session=new parametro_general_usuario_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoparametro_general_usuario', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->parametro_general_usuarioClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->parametro_general_usuarioClase);
			
			$this->parametro_general_usuarioActual =$this->parametro_general_usuarioClase;
			
			/*$this->parametro_general_usuarioActual =$this->migrarModelparametro_general_usuario($this->parametro_general_usuarioClase);*/
			
			$this->setparametro_general_usuarioFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			/*PARA RELACION DE UNO A UNO*/
			$this->parametro_general_usuarioClase->setId($this->bigIdFK_IdNONE);
			$this->data['id']=$this->bigIdFK_IdNONE;
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->parametro_general_usuarioLogic->getparametro_general_usuarios(),$this->parametro_general_usuario);
			
			$this->actualizarControllerConReturnGeneral($this->parametro_general_usuarioReturnGeneral);
			
			//this->parametro_general_usuarioReturnGeneral=$this->parametro_general_usuarioLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->parametro_general_usuarioLogic->getparametro_general_usuarios(),$this->parametro_general_usuario,$this->parametro_general_usuarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idusuarioDefaultFK!=null && $this->idusuarioDefaultFK > -1) {
				$this->parametro_general_usuarioReturnGeneral->getparametro_general_usuario()->setid($this->idusuarioDefaultFK);
			}

			if($this->idtipo_fondoDefaultFK!=null && $this->idtipo_fondoDefaultFK > -1) {
				$this->parametro_general_usuarioReturnGeneral->getparametro_general_usuario()->setid_tipo_fondo($this->idtipo_fondoDefaultFK);
			}

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->parametro_general_usuarioReturnGeneral->getparametro_general_usuario()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idsucursalDefaultFK!=null && $this->idsucursalDefaultFK > -1) {
				$this->parametro_general_usuarioReturnGeneral->getparametro_general_usuario()->setid_sucursal($this->idsucursalDefaultFK);
			}

			if($this->idejercicioDefaultFK!=null && $this->idejercicioDefaultFK > -1) {
				$this->parametro_general_usuarioReturnGeneral->getparametro_general_usuario()->setid_ejercicio($this->idejercicioDefaultFK);
			}

			if($this->idperiodoDefaultFK!=null && $this->idperiodoDefaultFK > -1) {
				$this->parametro_general_usuarioReturnGeneral->getparametro_general_usuario()->setid_periodo($this->idperiodoDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->parametro_general_usuarioReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->parametro_general_usuarioReturnGeneral->getparametro_general_usuario(),$this->parametro_general_usuarioActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyparametro_general_usuario($this->parametro_general_usuarioReturnGeneral->getparametro_general_usuario());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioparametro_general_usuario($this->parametro_general_usuarioReturnGeneral->getparametro_general_usuario());*/
			}
			
			if($this->parametro_general_usuarioReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->parametro_general_usuarioReturnGeneral->getparametro_general_usuario(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualparametro_general_usuario($this->parametro_general_usuario,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->parametro_general_usuariosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_general_usuariosAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->parametro_general_usuariosAuxiliar=array();
			}
			
			if(count($this->parametro_general_usuariosAuxiliar)==2) {
				$parametro_general_usuarioOrigen=$this->parametro_general_usuariosAuxiliar[0];
				$parametro_general_usuarioDestino=$this->parametro_general_usuariosAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($parametro_general_usuarioOrigen,$parametro_general_usuarioDestino,true,false,false);
				
				$this->actualizarLista($parametro_general_usuarioDestino,$this->parametro_general_usuarios);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->parametro_general_usuariosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_general_usuariosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->parametro_general_usuariosAuxiliar=array();
			}
			
			if(count($this->parametro_general_usuariosAuxiliar) > 0) {
				foreach ($this->parametro_general_usuariosAuxiliar as $parametro_general_usuarioSeleccionado) {
					$this->parametro_general_usuario=new parametro_general_usuario();
					
					$this->setCopiarVariablesObjetos($parametro_general_usuarioSeleccionado,$this->parametro_general_usuario,true,true,false);
						
					$this->parametro_general_usuarios[]=$this->parametro_general_usuario;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->parametro_general_usuariosEliminados as $parametro_general_usuarioEliminado) {
				$this->parametro_general_usuarioLogic->parametro_general_usuarios[]=$parametro_general_usuarioEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->parametro_general_usuario=new parametro_general_usuario();
							
				$this->parametro_general_usuarios[]=$this->parametro_general_usuario;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
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
		
		$parametro_general_usuarioActual=new parametro_general_usuario();
		
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
				
				$parametro_general_usuarioActual=$this->parametro_general_usuarios[$indice];		
				
				$parametro_general_usuarioActual->setId($this->data['t'.$this->strSufijo]['cel_'.$i.'_0']);
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setid_tipo_fondo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setpath_exportar($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setcon_exportar_cabecera(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_9')));  } else { $parametro_general_usuarioActual->setcon_exportar_cabecera(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setcon_exportar_campo_version(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_10')));  } else { $parametro_general_usuarioActual->setcon_exportar_campo_version(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setcon_botones_tool_bar(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_11')));  } else { $parametro_general_usuarioActual->setcon_botones_tool_bar(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setcon_cargar_por_parte(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_12')));  } else { $parametro_general_usuarioActual->setcon_cargar_por_parte(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setcon_guardar_relaciones(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_13')));  } else { $parametro_general_usuarioActual->setcon_guardar_relaciones(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setcon_mostrar_acciones_campo_general(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_14')));  } else { $parametro_general_usuarioActual->setcon_mostrar_acciones_campo_general(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setcon_mensaje_confirmacion(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_15')));  } else { $parametro_general_usuarioActual->setcon_mensaje_confirmacion(false); }
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
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadparametro_general_usuario='',string $strTipoPaginaAuxiliarparametro_general_usuario='',string $strTipoUsuarioAuxiliarparametro_general_usuario='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadparametro_general_usuario,$strTipoPaginaAuxiliarparametro_general_usuario,$strTipoUsuarioAuxiliarparametro_general_usuario,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->parametro_general_usuarios) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=parametro_general_usuario_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=parametro_general_usuario_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=parametro_general_usuario_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));
						
			if($parametro_general_usuario_session==null) {
				$parametro_general_usuario_session=new parametro_general_usuario_session();
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
					/*$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;*/
					
					if($parametro_general_usuario_session->intNumeroPaginacion==parametro_general_usuario_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$parametro_general_usuario_session->intNumeroPaginacion;
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
			
			$this->parametro_general_usuariosEliminados=array();
			
			/*$this->parametro_general_usuarioLogic->setConnexion($connexion);*/
			
			$this->parametro_general_usuarioLogic->setIsConDeep(true);
			
			$this->parametro_general_usuarioLogic->getparametro_general_usuarioDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('tipo_fondo');$classes[]=$class;
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			
			$this->parametro_general_usuarioLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->parametro_general_usuarioLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->parametro_general_usuarioLogic->getparametro_general_usuarios()==null|| count($this->parametro_general_usuarioLogic->getparametro_general_usuarios())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->parametro_general_usuarios=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->parametro_general_usuarioLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->parametro_general_usuariosReporte=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();
									
						/*$this->generarReportes('Todos',$this->parametro_general_usuarioLogic->getparametro_general_usuarios());*/
					
						$this->parametro_general_usuarioLogic->setparametro_general_usuarios($this->parametro_general_usuarios);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->parametro_general_usuarioLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->parametro_general_usuarioLogic->getparametro_general_usuarios()==null|| count($this->parametro_general_usuarioLogic->getparametro_general_usuarios())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->parametro_general_usuarios=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->parametro_general_usuarioLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->parametro_general_usuariosReporte=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();
									
						/*$this->generarReportes('Todos',$this->parametro_general_usuarioLogic->getparametro_general_usuarios());*/
					
						$this->parametro_general_usuarioLogic->setparametro_general_usuarios($this->parametro_general_usuarios);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idparametro_general_usuario=0;*/
				
				if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionFK!=null && $parametro_general_usuario_session->bitBusquedaDesdeFKSesionFK==true) {
					if($parametro_general_usuario_session->bigIdActualFK!=null && $parametro_general_usuario_session->bigIdActualFK!=0)	{
						$this->idparametro_general_usuario=$parametro_general_usuario_session->bigIdActualFK;	
					}
					
					$parametro_general_usuario_session->bitBusquedaDesdeFKSesionFK=false;
					
					$parametro_general_usuario_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idparametro_general_usuario=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idparametro_general_usuario=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->parametro_general_usuarioLogic->getEntity($this->idparametro_general_usuario);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*parametro_general_usuarioLogicAdditional::getDetalleIndicePorId($idparametro_general_usuario);*/

				
				if($this->parametro_general_usuarioLogic->getparametro_general_usuario()!=null) {
					$this->parametro_general_usuarioLogic->setparametro_general_usuarios(array());
					$this->parametro_general_usuarioLogic->parametro_general_usuarios[]=$this->parametro_general_usuarioLogic->getparametro_general_usuario();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idejercicio')
			{

				if($parametro_general_usuario_session->bigidejercicioActual!=null && $parametro_general_usuario_session->bigidejercicioActual!=0)
				{
					$this->id_ejercicioFK_Idejercicio=$parametro_general_usuario_session->bigidejercicioActual;
					$parametro_general_usuario_session->bigidejercicioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_general_usuarioLogic->getsFK_Idejercicio($finalQueryPaginacion,$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//parametro_general_usuarioLogicAdditional::getDetalleIndiceFK_Idejercicio($this->id_ejercicioFK_Idejercicio);


					if($this->parametro_general_usuarioLogic->getparametro_general_usuarios()==null || count($this->parametro_general_usuarioLogic->getparametro_general_usuarios())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$parametro_general_usuarios=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_general_usuarioLogic->getsFK_Idejercicio('',$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->parametro_general_usuariosReporte=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteparametro_general_usuarios("FK_Idejercicio",$this->parametro_general_usuarioLogic->getparametro_general_usuarios());

					if($this->strTipoPaginacion=='TODOS') {
						$this->parametro_general_usuarioLogic->setparametro_general_usuarios($parametro_general_usuarios);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($parametro_general_usuario_session->bigidempresaActual!=null && $parametro_general_usuario_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$parametro_general_usuario_session->bigidempresaActual;
					$parametro_general_usuario_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_general_usuarioLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//parametro_general_usuarioLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->parametro_general_usuarioLogic->getparametro_general_usuarios()==null || count($this->parametro_general_usuarioLogic->getparametro_general_usuarios())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$parametro_general_usuarios=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_general_usuarioLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->parametro_general_usuariosReporte=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteparametro_general_usuarios("FK_Idempresa",$this->parametro_general_usuarioLogic->getparametro_general_usuarios());

					if($this->strTipoPaginacion=='TODOS') {
						$this->parametro_general_usuarioLogic->setparametro_general_usuarios($parametro_general_usuarios);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idperiodo')
			{

				if($parametro_general_usuario_session->bigidperiodoActual!=null && $parametro_general_usuario_session->bigidperiodoActual!=0)
				{
					$this->id_periodoFK_Idperiodo=$parametro_general_usuario_session->bigidperiodoActual;
					$parametro_general_usuario_session->bigidperiodoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_general_usuarioLogic->getsFK_Idperiodo($finalQueryPaginacion,$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//parametro_general_usuarioLogicAdditional::getDetalleIndiceFK_Idperiodo($this->id_periodoFK_Idperiodo);


					if($this->parametro_general_usuarioLogic->getparametro_general_usuarios()==null || count($this->parametro_general_usuarioLogic->getparametro_general_usuarios())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$parametro_general_usuarios=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_general_usuarioLogic->getsFK_Idperiodo('',$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->parametro_general_usuariosReporte=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteparametro_general_usuarios("FK_Idperiodo",$this->parametro_general_usuarioLogic->getparametro_general_usuarios());

					if($this->strTipoPaginacion=='TODOS') {
						$this->parametro_general_usuarioLogic->setparametro_general_usuarios($parametro_general_usuarios);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idsucursal')
			{

				if($parametro_general_usuario_session->bigidsucursalActual!=null && $parametro_general_usuario_session->bigidsucursalActual!=0)
				{
					$this->id_sucursalFK_Idsucursal=$parametro_general_usuario_session->bigidsucursalActual;
					$parametro_general_usuario_session->bigidsucursalActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_general_usuarioLogic->getsFK_Idsucursal($finalQueryPaginacion,$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//parametro_general_usuarioLogicAdditional::getDetalleIndiceFK_Idsucursal($this->id_sucursalFK_Idsucursal);


					if($this->parametro_general_usuarioLogic->getparametro_general_usuarios()==null || count($this->parametro_general_usuarioLogic->getparametro_general_usuarios())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$parametro_general_usuarios=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_general_usuarioLogic->getsFK_Idsucursal('',$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->parametro_general_usuariosReporte=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteparametro_general_usuarios("FK_Idsucursal",$this->parametro_general_usuarioLogic->getparametro_general_usuarios());

					if($this->strTipoPaginacion=='TODOS') {
						$this->parametro_general_usuarioLogic->setparametro_general_usuarios($parametro_general_usuarios);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtipo_fondo')
			{

				if($parametro_general_usuario_session->bigidtipo_fondoActual!=null && $parametro_general_usuario_session->bigidtipo_fondoActual!=0)
				{
					$this->id_tipo_fondoFK_Idtipo_fondo=$parametro_general_usuario_session->bigidtipo_fondoActual;
					$parametro_general_usuario_session->bigidtipo_fondoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_general_usuarioLogic->getsFK_Idtipo_fondo($finalQueryPaginacion,$this->pagination,$this->id_tipo_fondoFK_Idtipo_fondo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//parametro_general_usuarioLogicAdditional::getDetalleIndiceFK_Idtipo_fondo($this->id_tipo_fondoFK_Idtipo_fondo);


					if($this->parametro_general_usuarioLogic->getparametro_general_usuarios()==null || count($this->parametro_general_usuarioLogic->getparametro_general_usuarios())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$parametro_general_usuarios=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_general_usuarioLogic->getsFK_Idtipo_fondo('',$this->pagination,$this->id_tipo_fondoFK_Idtipo_fondo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->parametro_general_usuariosReporte=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteparametro_general_usuarios("FK_Idtipo_fondo",$this->parametro_general_usuarioLogic->getparametro_general_usuarios());

					if($this->strTipoPaginacion=='TODOS') {
						$this->parametro_general_usuarioLogic->setparametro_general_usuarios($parametro_general_usuarios);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idusuarioid')
			{

				if($parametro_general_usuario_session->bigidusuarioActual!=null && $parametro_general_usuario_session->bigidusuarioActual!=0)
				{
					$this->idFK_Idusuarioid=$parametro_general_usuario_session->bigidusuarioActual;
					$parametro_general_usuario_session->bigidusuarioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_general_usuarioLogic->getsFK_Idusuarioid($finalQueryPaginacion,$this->pagination,$this->idFK_Idusuarioid);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//parametro_general_usuarioLogicAdditional::getDetalleIndiceFK_Idusuarioid($this->idFK_Idusuarioid);


					if($this->parametro_general_usuarioLogic->getparametro_general_usuarios()==null || count($this->parametro_general_usuarioLogic->getparametro_general_usuarios())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$parametro_general_usuarios=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_general_usuarioLogic->getsFK_Idusuarioid('',$this->pagination,$this->idFK_Idusuarioid);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->parametro_general_usuariosReporte=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteparametro_general_usuarios("FK_Idusuarioid",$this->parametro_general_usuarioLogic->getparametro_general_usuarios());

					if($this->strTipoPaginacion=='TODOS') {
						$this->parametro_general_usuarioLogic->setparametro_general_usuarios($parametro_general_usuarios);
					}
				//}
					$blnTieneDatosparametro_general_usuario=true;
					$blnTieneDatosparametro_general_usuario=$this->parametro_general_usuarioLogic->getparametro_general_usuarios()!=null && count($this->parametro_general_usuarioLogic->getparametro_general_usuarios())>0;

					if($blnTieneDatosparametro_general_usuario) {
						$this->strPermisoNuevoparametro_general_usuario='none';
					}

			} 
		
		$parametro_general_usuario_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$parametro_general_usuario_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->parametro_general_usuarioLogic->loadForeignsKeysDescription();*/
		
		$this->parametro_general_usuarios=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();
		
		if($this->parametro_general_usuariosEliminados==null) {
			$this->parametro_general_usuariosEliminados=array();
		}
		
		$this->Session->write(parametro_general_usuario_util::$STR_SESSION_NAME.'Lista',serialize($this->parametro_general_usuarios));
		$this->Session->write(parametro_general_usuario_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->parametro_general_usuariosEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(parametro_general_usuario_util::$STR_SESSION_NAME,serialize($parametro_general_usuario_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idparametro_general_usuario=$idGeneral;
			
			$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
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
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}

			if(count($this->parametro_general_usuarios) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_IdejercicioParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_ejercicioFK_Idejercicio=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idejercicio','cmbid_ejercicio');

			$this->strAccionBusqueda='FK_Idejercicio';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
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
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdperiodoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_periodoFK_Idperiodo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idperiodo','cmbid_periodo');

			$this->strAccionBusqueda='FK_Idperiodo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdsucursalParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_sucursalFK_Idsucursal=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idsucursal','cmbid_sucursal');

			$this->strAccionBusqueda='FK_Idsucursal';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtipo_fondoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_tipo_fondoFK_Idtipo_fondo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtipo_fondo','cmbid_tipo_fondo');

			$this->strAccionBusqueda='FK_Idtipo_fondo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdusuarioidParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->idFK_Idusuarioid=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idusuarioid','hdnIdActual');

			$this->strAccionBusqueda='FK_Idusuarioid';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idejercicio($strFinalQuery,$id_ejercicio)
	{
		try
		{

			$this->parametro_general_usuarioLogic->getsFK_Idejercicio($strFinalQuery,new Pagination(),$id_ejercicio);
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

			$this->parametro_general_usuarioLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idperiodo($strFinalQuery,$id_periodo)
	{
		try
		{

			$this->parametro_general_usuarioLogic->getsFK_Idperiodo($strFinalQuery,new Pagination(),$id_periodo);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idsucursal($strFinalQuery,$id_sucursal)
	{
		try
		{

			$this->parametro_general_usuarioLogic->getsFK_Idsucursal($strFinalQuery,new Pagination(),$id_sucursal);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtipo_fondo($strFinalQuery,$id_tipo_fondo)
	{
		try
		{

			$this->parametro_general_usuarioLogic->getsFK_Idtipo_fondo($strFinalQuery,new Pagination(),$id_tipo_fondo);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idusuarioid($strFinalQuery,$id)
	{
		try
		{

			$this->parametro_general_usuarioLogic->getsFK_Idusuarioid($strFinalQuery,new Pagination(),$id);
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
			
			
			$parametro_general_usuarioForeignKey=new parametro_general_usuario_param_return(); //parametro_general_usuarioForeignKey();
			
			$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));
						
			if($parametro_general_usuario_session==null) {
				$parametro_general_usuario_session=new parametro_general_usuario_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$parametro_general_usuarioForeignKey=$this->parametro_general_usuarioLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$parametro_general_usuario_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id',$this->strRecargarFkTipos,',')) {
				$this->usuariosFK=$parametro_general_usuarioForeignKey->usuariosFK;
				$this->idusuarioDefaultFK=$parametro_general_usuarioForeignKey->idusuarioDefaultFK;
			}

			if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionusuario) {
				$this->setVisibleBusquedasParausuario(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_fondo',$this->strRecargarFkTipos,',')) {
				$this->tipo_fondosFK=$parametro_general_usuarioForeignKey->tipo_fondosFK;
				$this->idtipo_fondoDefaultFK=$parametro_general_usuarioForeignKey->idtipo_fondoDefaultFK;
			}

			if($parametro_general_usuario_session->bitBusquedaDesdeFKSesiontipo_fondo) {
				$this->setVisibleBusquedasParatipo_fondo(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$parametro_general_usuarioForeignKey->empresasFK;
				$this->idempresaDefaultFK=$parametro_general_usuarioForeignKey->idempresaDefaultFK;
			}

			if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$this->strRecargarFkTipos,',')) {
				$this->sucursalsFK=$parametro_general_usuarioForeignKey->sucursalsFK;
				$this->idsucursalDefaultFK=$parametro_general_usuarioForeignKey->idsucursalDefaultFK;
			}

			if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionsucursal) {
				$this->setVisibleBusquedasParasucursal(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$this->strRecargarFkTipos,',')) {
				$this->ejerciciosFK=$parametro_general_usuarioForeignKey->ejerciciosFK;
				$this->idejercicioDefaultFK=$parametro_general_usuarioForeignKey->idejercicioDefaultFK;
			}

			if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionejercicio) {
				$this->setVisibleBusquedasParaejercicio(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$this->strRecargarFkTipos,',')) {
				$this->periodosFK=$parametro_general_usuarioForeignKey->periodosFK;
				$this->idperiodoDefaultFK=$parametro_general_usuarioForeignKey->idperiodoDefaultFK;
			}

			if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionperiodo) {
				$this->setVisibleBusquedasParaperiodo(true);
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
	
	function cargarCombosFKFromReturnGeneral($parametro_general_usuarioReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$parametro_general_usuarioReturnGeneral->strRecargarFkTipos;
			
			


			if($parametro_general_usuarioReturnGeneral->con_usuariosFK==true) {
				$this->usuariosFK=$parametro_general_usuarioReturnGeneral->usuariosFK;
				$this->idusuarioDefaultFK=$parametro_general_usuarioReturnGeneral->idusuarioDefaultFK;
			}


			if($parametro_general_usuarioReturnGeneral->con_tipo_fondosFK==true) {
				$this->tipo_fondosFK=$parametro_general_usuarioReturnGeneral->tipo_fondosFK;
				$this->idtipo_fondoDefaultFK=$parametro_general_usuarioReturnGeneral->idtipo_fondoDefaultFK;
			}


			if($parametro_general_usuarioReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$parametro_general_usuarioReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$parametro_general_usuarioReturnGeneral->idempresaDefaultFK;
			}


			if($parametro_general_usuarioReturnGeneral->con_sucursalsFK==true) {
				$this->sucursalsFK=$parametro_general_usuarioReturnGeneral->sucursalsFK;
				$this->idsucursalDefaultFK=$parametro_general_usuarioReturnGeneral->idsucursalDefaultFK;
			}


			if($parametro_general_usuarioReturnGeneral->con_ejerciciosFK==true) {
				$this->ejerciciosFK=$parametro_general_usuarioReturnGeneral->ejerciciosFK;
				$this->idejercicioDefaultFK=$parametro_general_usuarioReturnGeneral->idejercicioDefaultFK;
			}


			if($parametro_general_usuarioReturnGeneral->con_periodosFK==true) {
				$this->periodosFK=$parametro_general_usuarioReturnGeneral->periodosFK;
				$this->idperiodoDefaultFK=$parametro_general_usuarioReturnGeneral->idperiodoDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(parametro_general_usuario_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));
		
		if($parametro_general_usuario_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($parametro_general_usuario_session->getstrNombrePaginaNavegacionHaciaFKDesde()==usuario_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='usuario';
			}
			else if($parametro_general_usuario_session->getstrNombrePaginaNavegacionHaciaFKDesde()==tipo_fondo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='tipo_fondo';
			}
			else if($parametro_general_usuario_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($parametro_general_usuario_session->getstrNombrePaginaNavegacionHaciaFKDesde()==sucursal_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='sucursal';
			}
			else if($parametro_general_usuario_session->getstrNombrePaginaNavegacionHaciaFKDesde()==ejercicio_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='ejercicio';
			}
			else if($parametro_general_usuario_session->getstrNombrePaginaNavegacionHaciaFKDesde()==periodo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='periodo';
			}
			
			$parametro_general_usuario_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}						
			
			$this->parametro_general_usuariosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_general_usuariosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->parametro_general_usuariosAuxiliar=array();
			}
			
			if(count($this->parametro_general_usuariosAuxiliar) > 0) {
				
				foreach ($this->parametro_general_usuariosAuxiliar as $parametro_general_usuarioSeleccionado) {
					$this->eliminarTablaBase($parametro_general_usuarioSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
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
	
	
	
	public function getusuariosFKListSelectItem() 
	{
		$usuariosList=array();

		$item=null;

		foreach($this->usuariosFK as $usuario)
		{
			$item=new SelectItem();
			$item->setLabel($usuario->getuser_name());
			$item->setValue($usuario->getId());
			$usuariosList[]=$item;
		}

		return $usuariosList;
	}


	public function gettipo_fondosFKListSelectItem() 
	{
		$tipo_fondosList=array();

		$item=null;

		foreach($this->tipo_fondosFK as $tipo_fondo)
		{
			$item=new SelectItem();
			$item->setLabel($tipo_fondo->getcodigo());
			$item->setValue($tipo_fondo->getId());
			$tipo_fondosList[]=$item;
		}

		return $tipo_fondosList;
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


	public function getsucursalsFKListSelectItem() 
	{
		$sucursalsList=array();

		$item=null;

		foreach($this->sucursalsFK as $sucursal)
		{
			$item=new SelectItem();
			$item->setLabel($sucursal->getnombre());
			$item->setValue($sucursal->getId());
			$sucursalsList[]=$item;
		}

		return $sucursalsList;
	}


	public function getejerciciosFKListSelectItem() 
	{
		$ejerciciosList=array();

		$item=null;

		foreach($this->ejerciciosFK as $ejercicio)
		{
			$item=new SelectItem();
			$item->setLabel($ejercicio->getId());
			$item->setValue($ejercicio->getId());
			$ejerciciosList[]=$item;
		}

		return $ejerciciosList;
	}


	public function getperiodosFKListSelectItem() 
	{
		$periodosList=array();

		$item=null;

		foreach($this->periodosFK as $periodo)
		{
			$item=new SelectItem();
			$item->setLabel($periodo->getnombre());
			$item->setValue($periodo->getId());
			$periodosList[]=$item;
		}

		return $periodosList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;
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
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$parametro_general_usuariosNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->parametro_general_usuarios as $parametro_general_usuarioLocal) {
				if($parametro_general_usuarioLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->parametro_general_usuario=new parametro_general_usuario();
				
				$this->parametro_general_usuario->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->parametro_general_usuarios[]=$this->parametro_general_usuario;*/
				
				$parametro_general_usuariosNuevos[]=$this->parametro_general_usuario;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('tipo_fondo');$classes[]=$class;
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->setparametro_general_usuarios($parametro_general_usuariosNuevos);
					
				$this->parametro_general_usuarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($parametro_general_usuariosNuevos as $parametro_general_usuarioNuevo) {
					$this->parametro_general_usuarios[]=$parametro_general_usuarioNuevo;
				}
				
				/*$this->parametro_general_usuarios[]=$parametro_general_usuariosNuevos;*/
				
				$this->parametro_general_usuarioLogic->setparametro_general_usuarios($this->parametro_general_usuarios);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($parametro_general_usuariosNuevos!=null);
	}
					
	
	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery=''){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$this->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));

		if($parametro_general_usuario_session==null) {
			$parametro_general_usuario_session=new parametro_general_usuario_session();
		}
		
		if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionusuario!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=usuario_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalusuario=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalusuario=Funciones::GetFinalQueryAppend($finalQueryGlobalusuario, '');
				$finalQueryGlobalusuario.=usuario_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalusuario.$strRecargarFkQuery;		

				$usuarioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosusuariosFK($usuarioLogic->getusuarios());

		} else {
			$this->setVisibleBusquedasParausuario(true);


			if($parametro_general_usuario_session->bigidusuarioActual!=null && $parametro_general_usuario_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($parametro_general_usuario_session->bigidusuarioActual);//WithConnection

				$this->usuariosFK[$usuarioLogic->getusuario()->getId()]=parametro_general_usuario_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$this->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombostipo_fondosFK($connexion=null,$strRecargarFkQuery=''){
		$tipo_fondoLogic= new tipo_fondo_logic();
		$pagination= new Pagination();
		$this->tipo_fondosFK=array();

		$tipo_fondoLogic->setConnexion($connexion);
		$tipo_fondoLogic->gettipo_fondoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));

		if($parametro_general_usuario_session==null) {
			$parametro_general_usuario_session=new parametro_general_usuario_session();
		}
		
		if($parametro_general_usuario_session->bitBusquedaDesdeFKSesiontipo_fondo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_fondo_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltipo_fondo=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_fondo=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_fondo, '');
				$finalQueryGlobaltipo_fondo.=tipo_fondo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_fondo.$strRecargarFkQuery;		

				$tipo_fondoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostipo_fondosFK($tipo_fondoLogic->gettipo_fondos());

		} else {
			$this->setVisibleBusquedasParatipo_fondo(true);


			if($parametro_general_usuario_session->bigidtipo_fondoActual!=null && $parametro_general_usuario_session->bigidtipo_fondoActual > 0) {
				$tipo_fondoLogic->getEntity($parametro_general_usuario_session->bigidtipo_fondoActual);//WithConnection

				$this->tipo_fondosFK[$tipo_fondoLogic->gettipo_fondo()->getId()]=parametro_general_usuario_util::gettipo_fondoDescripcion($tipo_fondoLogic->gettipo_fondo());
				$this->idtipo_fondoDefaultFK=$tipo_fondoLogic->gettipo_fondo()->getId();
			}
		}
	}

	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));

		if($parametro_general_usuario_session==null) {
			$parametro_general_usuario_session=new parametro_general_usuario_session();
		}
		
		if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($parametro_general_usuario_session->bigidempresaActual!=null && $parametro_general_usuario_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($parametro_general_usuario_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=parametro_general_usuario_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery=''){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$this->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));

		if($parametro_general_usuario_session==null) {
			$parametro_general_usuario_session=new parametro_general_usuario_session();
		}
		
		if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionsucursal!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=sucursal_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalsucursal=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalsucursal=Funciones::GetFinalQueryAppend($finalQueryGlobalsucursal, '');
				$finalQueryGlobalsucursal.=sucursal_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalsucursal.$strRecargarFkQuery;		

				$sucursalLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombossucursalsFK($sucursalLogic->getsucursals());

		} else {
			$this->setVisibleBusquedasParasucursal(true);


			if($parametro_general_usuario_session->bigidsucursalActual!=null && $parametro_general_usuario_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($parametro_general_usuario_session->bigidsucursalActual);//WithConnection

				$this->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=parametro_general_usuario_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$this->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery=''){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$this->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));

		if($parametro_general_usuario_session==null) {
			$parametro_general_usuario_session=new parametro_general_usuario_session();
		}
		
		if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionejercicio!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=ejercicio_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalejercicio=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalejercicio=Funciones::GetFinalQueryAppend($finalQueryGlobalejercicio, '');
				$finalQueryGlobalejercicio.=ejercicio_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalejercicio.$strRecargarFkQuery;		

				$ejercicioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosejerciciosFK($ejercicioLogic->getejercicios());

		} else {
			$this->setVisibleBusquedasParaejercicio(true);


			if($parametro_general_usuario_session->bigidejercicioActual!=null && $parametro_general_usuario_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($parametro_general_usuario_session->bigidejercicioActual);//WithConnection

				$this->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=parametro_general_usuario_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$this->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery=''){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$this->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));

		if($parametro_general_usuario_session==null) {
			$parametro_general_usuario_session=new parametro_general_usuario_session();
		}
		
		if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionperiodo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=periodo_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalperiodo=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalperiodo=Funciones::GetFinalQueryAppend($finalQueryGlobalperiodo, '');
				$finalQueryGlobalperiodo.=periodo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalperiodo.$strRecargarFkQuery;		

				$periodoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosperiodosFK($periodoLogic->getperiodos());

		} else {
			$this->setVisibleBusquedasParaperiodo(true);


			if($parametro_general_usuario_session->bigidperiodoActual!=null && $parametro_general_usuario_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($parametro_general_usuario_session->bigidperiodoActual);//WithConnection

				$this->periodosFK[$periodoLogic->getperiodo()->getId()]=parametro_general_usuario_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$this->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	
	
	public function prepararCombosusuariosFK($usuarios){

		foreach ($usuarios as $usuarioLocal ) {
			if($this->idusuarioDefaultFK==0) {
				$this->idusuarioDefaultFK=$usuarioLocal->getId();
			}

			$this->usuariosFK[$usuarioLocal->getId()]=parametro_general_usuario_util::getusuarioDescripcion($usuarioLocal);
		}
	}

	public function prepararCombostipo_fondosFK($tipo_fondos){

		foreach ($tipo_fondos as $tipo_fondoLocal ) {
			if($this->idtipo_fondoDefaultFK==0) {
				$this->idtipo_fondoDefaultFK=$tipo_fondoLocal->getId();
			}

			$this->tipo_fondosFK[$tipo_fondoLocal->getId()]=parametro_general_usuario_util::gettipo_fondoDescripcion($tipo_fondoLocal);
		}
	}

	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=parametro_general_usuario_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombossucursalsFK($sucursals){

		foreach ($sucursals as $sucursalLocal ) {
			if($this->idsucursalDefaultFK==0) {
				$this->idsucursalDefaultFK=$sucursalLocal->getId();
			}

			$this->sucursalsFK[$sucursalLocal->getId()]=parametro_general_usuario_util::getsucursalDescripcion($sucursalLocal);
		}
	}

	public function prepararCombosejerciciosFK($ejercicios){

		foreach ($ejercicios as $ejercicioLocal ) {
			if($this->idejercicioDefaultFK==0) {
				$this->idejercicioDefaultFK=$ejercicioLocal->getId();
			}

			$this->ejerciciosFK[$ejercicioLocal->getId()]=parametro_general_usuario_util::getejercicioDescripcion($ejercicioLocal);
		}
	}

	public function prepararCombosperiodosFK($periodos){

		foreach ($periodos as $periodoLocal ) {
			if($this->idperiodoDefaultFK==0) {
				$this->idperiodoDefaultFK=$periodoLocal->getId();
			}

			$this->periodosFK[$periodoLocal->getId()]=parametro_general_usuario_util::getperiodoDescripcion($periodoLocal);
		}
	}

	
	
	public function cargarDescripcionusuarioFK($idusuario,$connexion=null){
		$usuarioLogic= new usuario_logic();
		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$strDescripcionusuario='';

		if($idusuario!=null && $idusuario!='' && $idusuario!='null') {
			if($connexion!=null) {
				$usuarioLogic->getEntity($idusuario);//WithConnection
			} else {
				$usuarioLogic->getEntityWithConnection($idusuario);//
			}

			$strDescripcionusuario=parametro_general_usuario_util::getusuarioDescripcion($usuarioLogic->getusuario());

		} else {
			$strDescripcionusuario='null';
		}

		return $strDescripcionusuario;
	}

	public function cargarDescripciontipo_fondoFK($idtipo_fondo,$connexion=null){
		$tipo_fondoLogic= new tipo_fondo_logic();
		$tipo_fondoLogic->setConnexion($connexion);
		$tipo_fondoLogic->gettipo_fondoDataAccess()->isForFKData=true;
		$strDescripciontipo_fondo='';

		if($idtipo_fondo!=null && $idtipo_fondo!='' && $idtipo_fondo!='null') {
			if($connexion!=null) {
				$tipo_fondoLogic->getEntity($idtipo_fondo);//WithConnection
			} else {
				$tipo_fondoLogic->getEntityWithConnection($idtipo_fondo);//
			}

			$strDescripciontipo_fondo=parametro_general_usuario_util::gettipo_fondoDescripcion($tipo_fondoLogic->gettipo_fondo());

		} else {
			$strDescripciontipo_fondo='null';
		}

		return $strDescripciontipo_fondo;
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

			$strDescripcionempresa=parametro_general_usuario_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
	}

	public function cargarDescripcionsucursalFK($idsucursal,$connexion=null){
		$sucursalLogic= new sucursal_logic();
		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$strDescripcionsucursal='';

		if($idsucursal!=null && $idsucursal!='' && $idsucursal!='null') {
			if($connexion!=null) {
				$sucursalLogic->getEntity($idsucursal);//WithConnection
			} else {
				$sucursalLogic->getEntityWithConnection($idsucursal);//
			}

			$strDescripcionsucursal=parametro_general_usuario_util::getsucursalDescripcion($sucursalLogic->getsucursal());

		} else {
			$strDescripcionsucursal='null';
		}

		return $strDescripcionsucursal;
	}

	public function cargarDescripcionejercicioFK($idejercicio,$connexion=null){
		$ejercicioLogic= new ejercicio_logic();
		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$strDescripcionejercicio='';

		if($idejercicio!=null && $idejercicio!='' && $idejercicio!='null') {
			if($connexion!=null) {
				$ejercicioLogic->getEntity($idejercicio);//WithConnection
			} else {
				$ejercicioLogic->getEntityWithConnection($idejercicio);//
			}

			$strDescripcionejercicio=parametro_general_usuario_util::getejercicioDescripcion($ejercicioLogic->getejercicio());

		} else {
			$strDescripcionejercicio='null';
		}

		return $strDescripcionejercicio;
	}

	public function cargarDescripcionperiodoFK($idperiodo,$connexion=null){
		$periodoLogic= new periodo_logic();
		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$strDescripcionperiodo='';

		if($idperiodo!=null && $idperiodo!='' && $idperiodo!='null') {
			if($connexion!=null) {
				$periodoLogic->getEntity($idperiodo);//WithConnection
			} else {
				$periodoLogic->getEntityWithConnection($idperiodo);//
			}

			$strDescripcionperiodo=parametro_general_usuario_util::getperiodoDescripcion($periodoLogic->getperiodo());

		} else {
			$strDescripcionperiodo='null';
		}

		return $strDescripcionperiodo;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(parametro_general_usuario $parametro_general_usuarioClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParausuario($isParausuario){
		$strParaVisibleusuario='display:table-row';
		$strParaVisibleNegacionusuario='display:none';

		if($isParausuario) {
			$strParaVisibleusuario='display:table-row';
			$strParaVisibleNegacionusuario='display:none';
		} else {
			$strParaVisibleusuario='display:none';
			$strParaVisibleNegacionusuario='display:table-row';
		}


		$strParaVisibleNegacionusuario=trim($strParaVisibleNegacionusuario);

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idtipo_fondo=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idusuarioid=$strParaVisibleusuario;
	}

	public function setVisibleBusquedasParatipo_fondo($isParatipo_fondo){
		$strParaVisibletipo_fondo='display:table-row';
		$strParaVisibleNegaciontipo_fondo='display:none';

		if($isParatipo_fondo) {
			$strParaVisibletipo_fondo='display:table-row';
			$strParaVisibleNegaciontipo_fondo='display:none';
		} else {
			$strParaVisibletipo_fondo='display:none';
			$strParaVisibleNegaciontipo_fondo='display:table-row';
		}


		$strParaVisibleNegaciontipo_fondo=trim($strParaVisibleNegaciontipo_fondo);

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegaciontipo_fondo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontipo_fondo;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegaciontipo_fondo;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegaciontipo_fondo;
		$this->strVisibleFK_Idtipo_fondo=$strParaVisibletipo_fondo;
		$this->strVisibleFK_Idusuarioid=$strParaVisibleNegaciontipo_fondo;
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

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idtipo_fondo=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idusuarioid=$strParaVisibleNegacionempresa;
	}

	public function setVisibleBusquedasParasucursal($isParasucursal){
		$strParaVisiblesucursal='display:table-row';
		$strParaVisibleNegacionsucursal='display:none';

		if($isParasucursal) {
			$strParaVisiblesucursal='display:table-row';
			$strParaVisibleNegacionsucursal='display:none';
		} else {
			$strParaVisiblesucursal='display:none';
			$strParaVisibleNegacionsucursal='display:table-row';
		}


		$strParaVisibleNegacionsucursal=trim($strParaVisibleNegacionsucursal);

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idsucursal=$strParaVisiblesucursal;
		$this->strVisibleFK_Idtipo_fondo=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idusuarioid=$strParaVisibleNegacionsucursal;
	}

	public function setVisibleBusquedasParaejercicio($isParaejercicio){
		$strParaVisibleejercicio='display:table-row';
		$strParaVisibleNegacionejercicio='display:none';

		if($isParaejercicio) {
			$strParaVisibleejercicio='display:table-row';
			$strParaVisibleNegacionejercicio='display:none';
		} else {
			$strParaVisibleejercicio='display:none';
			$strParaVisibleNegacionejercicio='display:table-row';
		}


		$strParaVisibleNegacionejercicio=trim($strParaVisibleNegacionejercicio);

		$this->strVisibleFK_Idejercicio=$strParaVisibleejercicio;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idtipo_fondo=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idusuarioid=$strParaVisibleNegacionejercicio;
	}

	public function setVisibleBusquedasParaperiodo($isParaperiodo){
		$strParaVisibleperiodo='display:table-row';
		$strParaVisibleNegacionperiodo='display:none';

		if($isParaperiodo) {
			$strParaVisibleperiodo='display:table-row';
			$strParaVisibleNegacionperiodo='display:none';
		} else {
			$strParaVisibleperiodo='display:none';
			$strParaVisibleNegacionperiodo='display:table-row';
		}


		$strParaVisibleNegacionperiodo=trim($strParaVisibleNegacionperiodo);

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idperiodo=$strParaVisibleperiodo;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idtipo_fondo=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idusuarioid=$strParaVisibleNegacionperiodo;
	}
	
	

	public function abrirBusquedaParausuario() {//$idparametro_general_usuarioActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idparametro_general_usuarioActual=$idparametro_general_usuarioActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.usuario_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.parametro_general_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.parametro_general_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarparametro_general_usuario,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatipo_fondo() {//$idparametro_general_usuarioActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idparametro_general_usuarioActual=$idparametro_general_usuarioActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.tipo_fondo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.parametro_general_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_fondo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',tipo_fondo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.parametro_general_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_fondo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_fondo_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarparametro_general_usuario,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaempresa() {//$idparametro_general_usuarioActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idparametro_general_usuarioActual=$idparametro_general_usuarioActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.parametro_general_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.parametro_general_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarparametro_general_usuario,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParasucursal() {//$idparametro_general_usuarioActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idparametro_general_usuarioActual=$idparametro_general_usuarioActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.sucursal_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.parametro_general_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',sucursal_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.parametro_general_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(sucursal_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarparametro_general_usuario,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaejercicio() {//$idparametro_general_usuarioActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idparametro_general_usuarioActual=$idparametro_general_usuarioActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.ejercicio_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.parametro_general_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',ejercicio_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.parametro_general_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ejercicio_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarparametro_general_usuario,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaperiodo() {//$idparametro_general_usuarioActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idparametro_general_usuarioActual=$idparametro_general_usuarioActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.periodo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.parametro_general_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',periodo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.parametro_general_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(periodo_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarparametro_general_usuario,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(parametro_general_usuario_util::$STR_SESSION_NAME,parametro_general_usuario_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$parametro_general_usuario_session=$this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME);
				
		if($parametro_general_usuario_session==null) {
			$parametro_general_usuario_session=new parametro_general_usuario_session();		
			//$this->Session->write('parametro_general_usuario_session',$parametro_general_usuario_session);							
		}
		*/
		
		$parametro_general_usuario_session=new parametro_general_usuario_session();
    	$parametro_general_usuario_session->strPathNavegacionActual=parametro_general_usuario_util::$STR_CLASS_WEB_TITULO;
    	$parametro_general_usuario_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(parametro_general_usuario_util::$STR_SESSION_NAME,serialize($parametro_general_usuario_session));		
	}	
	
	public function getSetBusquedasSesionConfig(parametro_general_usuario_session $parametro_general_usuario_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionFK!=null && $parametro_general_usuario_session->bitBusquedaDesdeFKSesionFK==true) {
			if($parametro_general_usuario_session->bigIdActualFK!=null && $parametro_general_usuario_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$parametro_general_usuario_session->bigIdActualFKParaPosibleAtras=$parametro_general_usuario_session->bigIdActualFK;*/
			}
				
			$parametro_general_usuario_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$parametro_general_usuario_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(parametro_general_usuario_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionusuario!=null && $parametro_general_usuario_session->bitBusquedaDesdeFKSesionusuario==true)
			{
				if($parametro_general_usuario_session->bigidusuarioActual!=0) {
					$this->strAccionBusqueda='FK_Idusuario';

					$existe_history=HistoryWeb::ExisteElemento(parametro_general_usuario_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(parametro_general_usuario_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(parametro_general_usuario_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($parametro_general_usuario_session->bigidusuarioActualDescripcion);
						$historyWeb->setIdActual($parametro_general_usuario_session->bigidusuarioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=parametro_general_usuario_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$parametro_general_usuario_session->bigidusuarioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$parametro_general_usuario_session->bitBusquedaDesdeFKSesionusuario=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;

				if($parametro_general_usuario_session->intNumeroPaginacion==parametro_general_usuario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_general_usuario_session->intNumeroPaginacion;
				}
			}
			else if($parametro_general_usuario_session->bitBusquedaDesdeFKSesiontipo_fondo!=null && $parametro_general_usuario_session->bitBusquedaDesdeFKSesiontipo_fondo==true)
			{
				if($parametro_general_usuario_session->bigidtipo_fondoActual!=0) {
					$this->strAccionBusqueda='FK_Idtipo_fondo';

					$existe_history=HistoryWeb::ExisteElemento(parametro_general_usuario_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(parametro_general_usuario_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(parametro_general_usuario_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($parametro_general_usuario_session->bigidtipo_fondoActualDescripcion);
						$historyWeb->setIdActual($parametro_general_usuario_session->bigidtipo_fondoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=parametro_general_usuario_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$parametro_general_usuario_session->bigidtipo_fondoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$parametro_general_usuario_session->bitBusquedaDesdeFKSesiontipo_fondo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;

				if($parametro_general_usuario_session->intNumeroPaginacion==parametro_general_usuario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_general_usuario_session->intNumeroPaginacion;
				}
			}
			else if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionempresa!=null && $parametro_general_usuario_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($parametro_general_usuario_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(parametro_general_usuario_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(parametro_general_usuario_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(parametro_general_usuario_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($parametro_general_usuario_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($parametro_general_usuario_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=parametro_general_usuario_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$parametro_general_usuario_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$parametro_general_usuario_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;

				if($parametro_general_usuario_session->intNumeroPaginacion==parametro_general_usuario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_general_usuario_session->intNumeroPaginacion;
				}
			}
			else if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionsucursal!=null && $parametro_general_usuario_session->bitBusquedaDesdeFKSesionsucursal==true)
			{
				if($parametro_general_usuario_session->bigidsucursalActual!=0) {
					$this->strAccionBusqueda='FK_Idsucursal';

					$existe_history=HistoryWeb::ExisteElemento(parametro_general_usuario_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(parametro_general_usuario_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(parametro_general_usuario_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($parametro_general_usuario_session->bigidsucursalActualDescripcion);
						$historyWeb->setIdActual($parametro_general_usuario_session->bigidsucursalActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=parametro_general_usuario_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$parametro_general_usuario_session->bigidsucursalActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$parametro_general_usuario_session->bitBusquedaDesdeFKSesionsucursal=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;

				if($parametro_general_usuario_session->intNumeroPaginacion==parametro_general_usuario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_general_usuario_session->intNumeroPaginacion;
				}
			}
			else if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionejercicio!=null && $parametro_general_usuario_session->bitBusquedaDesdeFKSesionejercicio==true)
			{
				if($parametro_general_usuario_session->bigidejercicioActual!=0) {
					$this->strAccionBusqueda='FK_Idejercicio';

					$existe_history=HistoryWeb::ExisteElemento(parametro_general_usuario_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(parametro_general_usuario_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(parametro_general_usuario_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($parametro_general_usuario_session->bigidejercicioActualDescripcion);
						$historyWeb->setIdActual($parametro_general_usuario_session->bigidejercicioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=parametro_general_usuario_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$parametro_general_usuario_session->bigidejercicioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$parametro_general_usuario_session->bitBusquedaDesdeFKSesionejercicio=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;

				if($parametro_general_usuario_session->intNumeroPaginacion==parametro_general_usuario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_general_usuario_session->intNumeroPaginacion;
				}
			}
			else if($parametro_general_usuario_session->bitBusquedaDesdeFKSesionperiodo!=null && $parametro_general_usuario_session->bitBusquedaDesdeFKSesionperiodo==true)
			{
				if($parametro_general_usuario_session->bigidperiodoActual!=0) {
					$this->strAccionBusqueda='FK_Idperiodo';

					$existe_history=HistoryWeb::ExisteElemento(parametro_general_usuario_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(parametro_general_usuario_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(parametro_general_usuario_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($parametro_general_usuario_session->bigidperiodoActualDescripcion);
						$historyWeb->setIdActual($parametro_general_usuario_session->bigidperiodoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=parametro_general_usuario_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$parametro_general_usuario_session->bigidperiodoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$parametro_general_usuario_session->bitBusquedaDesdeFKSesionperiodo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;

				if($parametro_general_usuario_session->intNumeroPaginacion==parametro_general_usuario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_general_usuario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_general_usuario_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$parametro_general_usuario_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));
		
		if($parametro_general_usuario_session==null) {
			$parametro_general_usuario_session=new parametro_general_usuario_session();
		}
		
		$parametro_general_usuario_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$parametro_general_usuario_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$parametro_general_usuario_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idejercicio') {
			$parametro_general_usuario_session->id_ejercicio=$this->id_ejercicioFK_Idejercicio;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$parametro_general_usuario_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idperiodo') {
			$parametro_general_usuario_session->id_periodo=$this->id_periodoFK_Idperiodo;	

		}
		else if($this->strAccionBusqueda=='FK_Idsucursal') {
			$parametro_general_usuario_session->id_sucursal=$this->id_sucursalFK_Idsucursal;	

		}
		else if($this->strAccionBusqueda=='FK_Idtipo_fondo') {
			$parametro_general_usuario_session->id_tipo_fondo=$this->id_tipo_fondoFK_Idtipo_fondo;	

		}
		else if($this->strAccionBusqueda=='FK_Idusuarioid') {
			$parametro_general_usuario_session->id=$this->idFK_Idusuarioid;	

		}
		
		$this->Session->write(parametro_general_usuario_util::$STR_SESSION_NAME,serialize($parametro_general_usuario_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(parametro_general_usuario_session $parametro_general_usuario_session) {
		
		if($parametro_general_usuario_session==null) {
			$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));
		}
		
		if($parametro_general_usuario_session==null) {
		   $parametro_general_usuario_session=new parametro_general_usuario_session();
		}
		
		if($parametro_general_usuario_session->strUltimaBusqueda!=null && $parametro_general_usuario_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$parametro_general_usuario_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$parametro_general_usuario_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$parametro_general_usuario_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idejercicio') {
				$this->id_ejercicioFK_Idejercicio=$parametro_general_usuario_session->id_ejercicio;
				$parametro_general_usuario_session->id_ejercicio=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$parametro_general_usuario_session->id_empresa;
				$parametro_general_usuario_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idperiodo') {
				$this->id_periodoFK_Idperiodo=$parametro_general_usuario_session->id_periodo;
				$parametro_general_usuario_session->id_periodo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idsucursal') {
				$this->id_sucursalFK_Idsucursal=$parametro_general_usuario_session->id_sucursal;
				$parametro_general_usuario_session->id_sucursal=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtipo_fondo') {
				$this->id_tipo_fondoFK_Idtipo_fondo=$parametro_general_usuario_session->id_tipo_fondo;
				$parametro_general_usuario_session->id_tipo_fondo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idusuarioid') {
				$this->idFK_Idusuarioid=$parametro_general_usuario_session->id;
				$parametro_general_usuario_session->id=-1;

			}
		}
		
		$parametro_general_usuario_session->strUltimaBusqueda='';
		//$parametro_general_usuario_session->intNumeroPaginacion=10;
		$parametro_general_usuario_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(parametro_general_usuario_util::$STR_SESSION_NAME,serialize($parametro_general_usuario_session));		
	}
	
	public function parametro_general_usuariosControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idusuarioDefaultFK = 0;
		$this->idtipo_fondoDefaultFK = 0;
		$this->idempresaDefaultFK = 0;
		$this->idsucursalDefaultFK = 0;
		$this->idejercicioDefaultFK = 0;
		$this->idperiodoDefaultFK = 0;
	}
	
	public function setparametro_general_usuarioFKsDefault() {
	
		$this->setExistDataCampoForm('form','id',$this->idusuarioDefaultFK);
		$this->setExistDataCampoForm('form','id_tipo_fondo',$this->idtipo_fondoDefaultFK);
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_sucursal',$this->idsucursalDefaultFK);
		$this->setExistDataCampoForm('form','id_ejercicio',$this->idejercicioDefaultFK);
		$this->setExistDataCampoForm('form','id_periodo',$this->idperiodoDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		usuario::$class;
		usuario_carga::$CONTROLLER;

		tipo_fondo::$class;
		tipo_fondo_carga::$CONTROLLER;

		empresa::$class;
		empresa_carga::$CONTROLLER;

		sucursal::$class;
		sucursal_carga::$CONTROLLER;

		ejercicio::$class;
		ejercicio_carga::$CONTROLLER;

		periodo::$class;
		periodo_carga::$CONTROLLER;
		
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
		interface parametro_general_usuario_controlI {	
		
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
		
		public function onLoad(parametro_general_usuario_session $parametro_general_usuario_session=null);	
		function index(?string $strTypeOnLoadparametro_general_usuario='',?string $strTipoPaginaAuxiliarparametro_general_usuario='',?string $strTipoUsuarioAuxiliarparametro_general_usuario='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadparametro_general_usuario='',string $strTipoPaginaAuxiliarparametro_general_usuario='',string $strTipoUsuarioAuxiliarparametro_general_usuario='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($parametro_general_usuarioReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(parametro_general_usuario $parametro_general_usuarioClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(parametro_general_usuario_session $parametro_general_usuario_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(parametro_general_usuario_session $parametro_general_usuario_session);	
		public function parametro_general_usuariosControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setparametro_general_usuarioFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
