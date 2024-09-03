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

namespace com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\entity\cuenta_corriente_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/cuenta_corriente_detalle/util/cuenta_corriente_detalle_carga.php');
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_carga;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_util;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_param_return;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\logic\cuenta_corriente_detalle_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\presentation\session\cuenta_corriente_detalle_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_carga;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_carga;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\general\tabla\business\entity\tabla;
use com\bydan\contabilidad\general\tabla\business\logic\tabla_logic;
use com\bydan\contabilidad\general\tabla\util\tabla_carga;
use com\bydan\contabilidad\general\tabla\util\tabla_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_util;

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\logic\cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\logic\cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_util;

//REL


use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_util;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\presentation\session\clasificacion_cheque_session;


/*CARGA ARCHIVOS FRAMEWORK*/
cuenta_corriente_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cuenta_corriente_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cuenta_corriente_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cuenta_corriente_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cuenta_corriente_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/cuentascorrientes/cuenta_corriente_detalle/presentation/control/cuenta_corriente_detalle_init_control.php');
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\presentation\control\cuenta_corriente_detalle_init_control;

include_once('com/bydan/contabilidad/cuentascorrientes/cuenta_corriente_detalle/presentation/control/cuenta_corriente_detalle_base_control.php');
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\presentation\control\cuenta_corriente_detalle_base_control;

class cuenta_corriente_detalle_control extends cuenta_corriente_detalle_base_control {	
	
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
					
					
				if($this->data['es_balance_inicial']==null) {$this->data['es_balance_inicial']=false;} else {if($this->data['es_balance_inicial']=='on') {$this->data['es_balance_inicial']=true;}}
					
				if($this->data['es_cheque']==null) {$this->data['es_cheque']=false;} else {if($this->data['es_cheque']=='on') {$this->data['es_cheque']=true;}}
					
				if($this->data['es_deposito']==null) {$this->data['es_deposito']=false;} else {if($this->data['es_deposito']=='on') {$this->data['es_deposito']=true;}}
					
				if($this->data['es_retiro']==null) {$this->data['es_retiro']=false;} else {if($this->data['es_retiro']=='on') {$this->data['es_retiro']=true;}}
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
			else if($action=='registrarSesionParaclasificacion_cheques' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuenta_corriente_detalleActual=$this->getDataId();
				$this->registrarSesionParaclasificacion_cheques($idcuenta_corriente_detalleActual);
			} 
			
			
			else if($action=="FK_Idasiento"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdasientoParaProcesar();
			}
			else if($action=="FK_Idcliente"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdclienteParaProcesar();
			}
			else if($action=="FK_Idcuenta_corriente"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcuenta_corrienteParaProcesar();
			}
			else if($action=="FK_Iddocumento_cuenta_cobrar"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Iddocumento_cuenta_cobrarParaProcesar();
			}
			else if($action=="FK_Iddocumento_cuenta_pagar"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Iddocumento_cuenta_pagarParaProcesar();
			}
			else if($action=="FK_Idejercicio"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdejercicioParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idestado"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdestadoParaProcesar();
			}
			else if($action=="FK_Idperiodo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdperiodoParaProcesar();
			}
			else if($action=="FK_Idproveedor"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdproveedorParaProcesar();
			}
			else if($action=="FK_Idtabla"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdtablaParaProcesar();
			}
			else if($action=="FK_Idusuario"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdusuarioParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_corriente_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idcuenta_corriente_detalleActual
			}
			else if($action=='abrirBusquedaParaejercicio') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_corriente_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaejercicio();//$idcuenta_corriente_detalleActual
			}
			else if($action=='abrirBusquedaParaperiodo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_corriente_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaperiodo();//$idcuenta_corriente_detalleActual
			}
			else if($action=='abrirBusquedaParausuario') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_corriente_detalleActual=$this->getDataId();
				$this->abrirBusquedaParausuario();//$idcuenta_corriente_detalleActual
			}
			else if($action=='abrirBusquedaParacuenta_corriente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_corriente_detalleActual=$this->getDataId();
				$this->abrirBusquedaParacuenta_corriente();//$idcuenta_corriente_detalleActual
			}
			else if($action=='abrirBusquedaParacliente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_corriente_detalleActual=$this->getDataId();
				$this->abrirBusquedaParacliente();//$idcuenta_corriente_detalleActual
			}
			else if($action=='abrirBusquedaParaproveedor') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_corriente_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaproveedor();//$idcuenta_corriente_detalleActual
			}
			else if($action=='abrirBusquedaParatabla') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_corriente_detalleActual=$this->getDataId();
				$this->abrirBusquedaParatabla();//$idcuenta_corriente_detalleActual
			}
			else if($action=='abrirBusquedaParaestado') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_corriente_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaestado();//$idcuenta_corriente_detalleActual
			}
			else if($action=='abrirBusquedaParaasiento') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_corriente_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaasiento();//$idcuenta_corriente_detalleActual
			}
			else if($action=='abrirBusquedaParacuenta_pagar') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_corriente_detalleActual=$this->getDataId();
				$this->abrirBusquedaParacuenta_pagar();//$idcuenta_corriente_detalleActual
			}
			else if($action=='abrirBusquedaParacuenta_cobrar') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_corriente_detalleActual=$this->getDataId();
				$this->abrirBusquedaParacuenta_cobrar();//$idcuenta_corriente_detalleActual
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
					
					$cuenta_corriente_detalleController = new cuenta_corriente_detalle_control();
					
					$cuenta_corriente_detalleController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($cuenta_corriente_detalleController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$cuenta_corriente_detalleController = new cuenta_corriente_detalle_control();
						$cuenta_corriente_detalleController = $this;
						
						$jsonResponse = json_encode($cuenta_corriente_detalleController->cuenta_corriente_detalles);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->cuenta_corriente_detalleReturnGeneral==null) {
					$this->cuenta_corriente_detalleReturnGeneral=new cuenta_corriente_detalle_param_return();
				}
				
				echo($this->cuenta_corriente_detalleReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$cuenta_corriente_detalleController=new cuenta_corriente_detalle_control();
		
		$cuenta_corriente_detalleController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$cuenta_corriente_detalleController->usuarioActual=new usuario();
		
		$cuenta_corriente_detalleController->usuarioActual->setId($this->usuarioActual->getId());
		$cuenta_corriente_detalleController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$cuenta_corriente_detalleController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$cuenta_corriente_detalleController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$cuenta_corriente_detalleController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$cuenta_corriente_detalleController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$cuenta_corriente_detalleController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$cuenta_corriente_detalleController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $cuenta_corriente_detalleController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadcuenta_corriente_detalle= $this->getDataGeneralString('strTypeOnLoadcuenta_corriente_detalle');
		$strTipoPaginaAuxiliarcuenta_corriente_detalle= $this->getDataGeneralString('strTipoPaginaAuxiliarcuenta_corriente_detalle');
		$strTipoUsuarioAuxiliarcuenta_corriente_detalle= $this->getDataGeneralString('strTipoUsuarioAuxiliarcuenta_corriente_detalle');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadcuenta_corriente_detalle,$strTipoPaginaAuxiliarcuenta_corriente_detalle,$strTipoUsuarioAuxiliarcuenta_corriente_detalle,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadcuenta_corriente_detalle!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('cuenta_corriente_detalle','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_corriente_detalle_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliarcuenta_corriente_detalle,$this->strTipoUsuarioAuxiliarcuenta_corriente_detalle,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_corriente_detalle_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliarcuenta_corriente_detalle,$this->strTipoUsuarioAuxiliarcuenta_corriente_detalle,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->cuenta_corriente_detalleReturnGeneral=new cuenta_corriente_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cuenta_corriente_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cuenta_corriente_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cuenta_corriente_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cuenta_corriente_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cuenta_corriente_detalleReturnGeneral);
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
		$this->cuenta_corriente_detalleReturnGeneral=new cuenta_corriente_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cuenta_corriente_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cuenta_corriente_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cuenta_corriente_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cuenta_corriente_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cuenta_corriente_detalleReturnGeneral);
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
		$this->cuenta_corriente_detalleReturnGeneral=new cuenta_corriente_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cuenta_corriente_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cuenta_corriente_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cuenta_corriente_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cuenta_corriente_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cuenta_corriente_detalleReturnGeneral);
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
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
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
			
			
			$this->cuenta_corriente_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->cuenta_corriente_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cuenta_corriente_detalleReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->cuenta_corriente_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->cuenta_corriente_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cuenta_corriente_detalleReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->cuenta_corriente_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->cuenta_corriente_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->cuenta_corriente_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cuenta_corriente_detalleReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->cuenta_corriente_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cuenta_corriente_detalleReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->cuenta_corriente_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->cuenta_corriente_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->cuenta_corriente_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cuenta_corriente_detalleReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->cuenta_corriente_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cuenta_corriente_detalleReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
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
		
		$this->cuenta_corriente_detalleLogic=new cuenta_corriente_detalle_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->cuenta_corriente_detalle=new cuenta_corriente_detalle();
		
		$this->strTypeOnLoadcuenta_corriente_detalle='onload';
		$this->strTipoPaginaAuxiliarcuenta_corriente_detalle='none';
		$this->strTipoUsuarioAuxiliarcuenta_corriente_detalle='none';	

		$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
		
		$this->cuenta_corriente_detalleModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuenta_corriente_detalleControllerAdditional=new cuenta_corriente_detalle_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(cuenta_corriente_detalle_session $cuenta_corriente_detalle_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($cuenta_corriente_detalle_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadcuenta_corriente_detalle='',?string $strTipoPaginaAuxiliarcuenta_corriente_detalle='',?string $strTipoUsuarioAuxiliarcuenta_corriente_detalle='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadcuenta_corriente_detalle=$strTypeOnLoadcuenta_corriente_detalle;
			$this->strTipoPaginaAuxiliarcuenta_corriente_detalle=$strTipoPaginaAuxiliarcuenta_corriente_detalle;
			$this->strTipoUsuarioAuxiliarcuenta_corriente_detalle=$strTipoUsuarioAuxiliarcuenta_corriente_detalle;
	
			if($strTipoUsuarioAuxiliarcuenta_corriente_detalle=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->cuenta_corriente_detalle=new cuenta_corriente_detalle();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Cuenta Corriente Detalles';
			
			
			$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));
							
			if($cuenta_corriente_detalle_session==null) {
				$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
				
				/*$this->Session->write('cuenta_corriente_detalle_session',$cuenta_corriente_detalle_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($cuenta_corriente_detalle_session->strFuncionJsPadre!=null && $cuenta_corriente_detalle_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$cuenta_corriente_detalle_session->strFuncionJsPadre;
				
				$cuenta_corriente_detalle_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($cuenta_corriente_detalle_session);
			
			if($strTypeOnLoadcuenta_corriente_detalle!=null && $strTypeOnLoadcuenta_corriente_detalle=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$cuenta_corriente_detalle_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$cuenta_corriente_detalle_session->setPaginaPopupVariables(true);
				}
				
				if($cuenta_corriente_detalle_session->intNumeroPaginacion==cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_corriente_detalle_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,cuenta_corriente_detalle_util::$STR_SESSION_NAME,'cuentascorrientes');																
			
			} else if($strTypeOnLoadcuenta_corriente_detalle!=null && $strTypeOnLoadcuenta_corriente_detalle=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$cuenta_corriente_detalle_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;*/
				
				if($cuenta_corriente_detalle_session->intNumeroPaginacion==cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_corriente_detalle_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarcuenta_corriente_detalle!=null && $strTipoPaginaAuxiliarcuenta_corriente_detalle=='none') {
				/*$cuenta_corriente_detalle_session->strStyleDivHeader='display:table-row';*/
				
				/*$cuenta_corriente_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarcuenta_corriente_detalle!=null && $strTipoPaginaAuxiliarcuenta_corriente_detalle=='iframe') {
					/*
					$cuenta_corriente_detalle_session->strStyleDivArbol='display:none';
					$cuenta_corriente_detalle_session->strStyleDivHeader='display:none';
					$cuenta_corriente_detalle_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$cuenta_corriente_detalle_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->cuenta_corriente_detalleClase=new cuenta_corriente_detalle();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=cuenta_corriente_detalle_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(cuenta_corriente_detalle_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->cuenta_corriente_detalleLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->cuenta_corriente_detalleLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$clasificacionchequeLogic=new clasificacion_cheque_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->cuenta_corriente_detalleLogic=new cuenta_corriente_detalle_logic();*/
			
			
			$this->cuenta_corriente_detallesModel=null;
			/*new ListDataModel();*/
			
			/*$this->cuenta_corriente_detallesModel.setWrappedData(cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());*/
						
			$this->cuenta_corriente_detalles= array();
			$this->cuenta_corriente_detallesEliminados=array();
			$this->cuenta_corriente_detallesSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= cuenta_corriente_detalle_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= cuenta_corriente_detalle_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->cuenta_corriente_detalle= new cuenta_corriente_detalle();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idasiento='display:table-row';
			$this->strVisibleFK_Idcliente='display:table-row';
			$this->strVisibleFK_Idcuenta_corriente='display:table-row';
			$this->strVisibleFK_Iddocumento_cuenta_cobrar='display:table-row';
			$this->strVisibleFK_Iddocumento_cuenta_pagar='display:table-row';
			$this->strVisibleFK_Idejercicio='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idestado='display:table-row';
			$this->strVisibleFK_Idperiodo='display:table-row';
			$this->strVisibleFK_Idproveedor='display:table-row';
			$this->strVisibleFK_Idtabla='display:table-row';
			$this->strVisibleFK_Idusuario='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarcuenta_corriente_detalle!=null && $strTipoUsuarioAuxiliarcuenta_corriente_detalle!='none' && $strTipoUsuarioAuxiliarcuenta_corriente_detalle!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcuenta_corriente_detalle);
																
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
				if($strTipoUsuarioAuxiliarcuenta_corriente_detalle!=null && $strTipoUsuarioAuxiliarcuenta_corriente_detalle!='none' && $strTipoUsuarioAuxiliarcuenta_corriente_detalle!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcuenta_corriente_detalle);
																
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
				if($strTipoUsuarioAuxiliarcuenta_corriente_detalle==null || $strTipoUsuarioAuxiliarcuenta_corriente_detalle=='none' || $strTipoUsuarioAuxiliarcuenta_corriente_detalle=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarcuenta_corriente_detalle,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_corriente_detalle_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_corriente_detalle_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina cuenta_corriente_detalle');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($cuenta_corriente_detalle_session);
			
			$this->getSetBusquedasSesionConfig($cuenta_corriente_detalle_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportecuenta_corriente_detalles($this->strAccionBusqueda,$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());*/
				} else if($this->strGenerarReporte=='Html')	{
					$cuenta_corriente_detalle_session->strServletGenerarHtmlReporte='cuenta_corriente_detalleServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(cuenta_corriente_detalle_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($cuenta_corriente_detalle_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarcuenta_corriente_detalle!=null && $strTipoUsuarioAuxiliarcuenta_corriente_detalle=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($cuenta_corriente_detalle_session);
			}
								
			$this->set(cuenta_corriente_detalle_util::$STR_SESSION_NAME, $cuenta_corriente_detalle_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($cuenta_corriente_detalle_session);
			
			/*
			$this->cuenta_corriente_detalle->recursive = 0;
			
			$this->cuenta_corriente_detalles=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('cuenta_corriente_detalles', $this->cuenta_corriente_detalles);
			
			$this->set(cuenta_corriente_detalle_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->cuenta_corriente_detalleActual =$this->cuenta_corriente_detalleClase;
			
			/*$this->cuenta_corriente_detalleActual =$this->migrarModelcuenta_corriente_detalle($this->cuenta_corriente_detalleClase);*/
			
			$this->returnHtml(false);
			
			$this->set(cuenta_corriente_detalle_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=cuenta_corriente_detalle_util::$STR_NOMBRE_OPCION;
				
			if(cuenta_corriente_detalle_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=cuenta_corriente_detalle_util::$STR_MODULO_OPCION.cuenta_corriente_detalle_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(cuenta_corriente_detalle_util::$STR_SESSION_NAME,serialize($cuenta_corriente_detalle_session));
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
			/*$cuenta_corriente_detalleClase= (cuenta_corriente_detalle) cuenta_corriente_detallesModel.getRowData();*/
			
			$this->cuenta_corriente_detalleClase->setId($this->cuenta_corriente_detalle->getId());	
			$this->cuenta_corriente_detalleClase->setVersionRow($this->cuenta_corriente_detalle->getVersionRow());	
			$this->cuenta_corriente_detalleClase->setVersionRow($this->cuenta_corriente_detalle->getVersionRow());	
			$this->cuenta_corriente_detalleClase->setid_empresa($this->cuenta_corriente_detalle->getid_empresa());	
			$this->cuenta_corriente_detalleClase->setid_ejercicio($this->cuenta_corriente_detalle->getid_ejercicio());	
			$this->cuenta_corriente_detalleClase->setid_periodo($this->cuenta_corriente_detalle->getid_periodo());	
			$this->cuenta_corriente_detalleClase->setid_usuario($this->cuenta_corriente_detalle->getid_usuario());	
			$this->cuenta_corriente_detalleClase->setid_cuenta_corriente($this->cuenta_corriente_detalle->getid_cuenta_corriente());	
			$this->cuenta_corriente_detalleClase->setes_balance_inicial($this->cuenta_corriente_detalle->getes_balance_inicial());	
			$this->cuenta_corriente_detalleClase->setes_cheque($this->cuenta_corriente_detalle->getes_cheque());	
			$this->cuenta_corriente_detalleClase->setes_deposito($this->cuenta_corriente_detalle->getes_deposito());	
			$this->cuenta_corriente_detalleClase->setes_retiro($this->cuenta_corriente_detalle->getes_retiro());	
			$this->cuenta_corriente_detalleClase->setnumero_cheque($this->cuenta_corriente_detalle->getnumero_cheque());	
			$this->cuenta_corriente_detalleClase->setfecha_emision($this->cuenta_corriente_detalle->getfecha_emision());	
			$this->cuenta_corriente_detalleClase->setid_cliente($this->cuenta_corriente_detalle->getid_cliente());	
			$this->cuenta_corriente_detalleClase->setid_proveedor($this->cuenta_corriente_detalle->getid_proveedor());	
			$this->cuenta_corriente_detalleClase->setmonto($this->cuenta_corriente_detalle->getmonto());	
			$this->cuenta_corriente_detalleClase->setdebito($this->cuenta_corriente_detalle->getdebito());	
			$this->cuenta_corriente_detalleClase->setcredito($this->cuenta_corriente_detalle->getcredito());	
			$this->cuenta_corriente_detalleClase->setbalance($this->cuenta_corriente_detalle->getbalance());	
			$this->cuenta_corriente_detalleClase->setfecha_hora($this->cuenta_corriente_detalle->getfecha_hora());	
			$this->cuenta_corriente_detalleClase->setid_tabla($this->cuenta_corriente_detalle->getid_tabla());	
			$this->cuenta_corriente_detalleClase->setid_origen($this->cuenta_corriente_detalle->getid_origen());	
			$this->cuenta_corriente_detalleClase->setdescripcion($this->cuenta_corriente_detalle->getdescripcion());	
			$this->cuenta_corriente_detalleClase->setid_estado($this->cuenta_corriente_detalle->getid_estado());	
			$this->cuenta_corriente_detalleClase->setid_asiento($this->cuenta_corriente_detalle->getid_asiento());	
			$this->cuenta_corriente_detalleClase->setid_cuenta_pagar($this->cuenta_corriente_detalle->getid_cuenta_pagar());	
			$this->cuenta_corriente_detalleClase->setid_cuenta_cobrar($this->cuenta_corriente_detalle->getid_cuenta_cobrar());	
			$this->cuenta_corriente_detalleClase->settabla_origen($this->cuenta_corriente_detalle->gettabla_origen());	
			$this->cuenta_corriente_detalleClase->setorigen_empresa($this->cuenta_corriente_detalle->getorigen_empresa());	
			$this->cuenta_corriente_detalleClase->setmotivo_anulacion($this->cuenta_corriente_detalle->getmotivo_anulacion());	
			$this->cuenta_corriente_detalleClase->setorigen_dato($this->cuenta_corriente_detalle->getorigen_dato());	
			$this->cuenta_corriente_detalleClase->setcomputador_origen($this->cuenta_corriente_detalle->getcomputador_origen());	
		
			/*$this->Session->write('cuenta_corriente_detalleVersionRowActual', cuenta_corriente_detalle.getVersionRow());*/
			
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
			
			$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));
						
			if($cuenta_corriente_detalle_session==null) {
				$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('cuenta_corriente_detalle', $this->cuenta_corriente_detalle->read(null, $id));
	
			
			$this->cuenta_corriente_detalle->recursive = 0;
			
			$this->cuenta_corriente_detalles=$this->paginate();
			
			$this->set('cuenta_corriente_detalles', $this->cuenta_corriente_detalles);
	
			if (empty($this->data)) {
				$this->data = $this->cuenta_corriente_detalle->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->cuenta_corriente_detalleLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cuenta_corriente_detalleClase);
			
			$this->cuenta_corriente_detalleActual=$this->cuenta_corriente_detalleClase;
			
			/*$this->cuenta_corriente_detalleActual =$this->migrarModelcuenta_corriente_detalle($this->cuenta_corriente_detalleClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles(),$this->cuenta_corriente_detalleActual);
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_corriente_detalleReturnGeneral);
			
			//$this->cuenta_corriente_detalleReturnGeneral=$this->cuenta_corriente_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles(),$this->cuenta_corriente_detalleActual,$this->cuenta_corriente_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));
						
			if($cuenta_corriente_detalle_session==null) {
				$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevocuenta_corriente_detalle', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->cuenta_corriente_detalleClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cuenta_corriente_detalleClase);
			
			$this->cuenta_corriente_detalleActual =$this->cuenta_corriente_detalleClase;
			
			/*$this->cuenta_corriente_detalleActual =$this->migrarModelcuenta_corriente_detalle($this->cuenta_corriente_detalleClase);*/
			
			$this->setcuenta_corriente_detalleFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles(),$this->cuenta_corriente_detalle);
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_corriente_detalleReturnGeneral);
			
			//this->cuenta_corriente_detalleReturnGeneral=$this->cuenta_corriente_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles(),$this->cuenta_corriente_detalle,$this->cuenta_corriente_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idejercicioDefaultFK!=null && $this->idejercicioDefaultFK > -1) {
				$this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle()->setid_ejercicio($this->idejercicioDefaultFK);
			}

			if($this->idperiodoDefaultFK!=null && $this->idperiodoDefaultFK > -1) {
				$this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle()->setid_periodo($this->idperiodoDefaultFK);
			}

			if($this->idusuarioDefaultFK!=null && $this->idusuarioDefaultFK > -1) {
				$this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle()->setid_usuario($this->idusuarioDefaultFK);
			}

			if($this->idcuenta_corrienteDefaultFK!=null && $this->idcuenta_corrienteDefaultFK > -1) {
				$this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle()->setid_cuenta_corriente($this->idcuenta_corrienteDefaultFK);
			}

			if($this->idclienteDefaultFK!=null && $this->idclienteDefaultFK > -1) {
				$this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle()->setid_cliente($this->idclienteDefaultFK);
			}

			if($this->idproveedorDefaultFK!=null && $this->idproveedorDefaultFK > -1) {
				$this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle()->setid_proveedor($this->idproveedorDefaultFK);
			}

			if($this->idtablaDefaultFK!=null && $this->idtablaDefaultFK > -1) {
				$this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle()->setid_tabla($this->idtablaDefaultFK);
			}

			if($this->idestadoDefaultFK!=null && $this->idestadoDefaultFK > -1) {
				$this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle()->setid_estado($this->idestadoDefaultFK);
			}

			if($this->idasientoDefaultFK!=null && $this->idasientoDefaultFK > -1) {
				$this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle()->setid_asiento($this->idasientoDefaultFK);
			}

			if($this->idcuenta_pagarDefaultFK!=null && $this->idcuenta_pagarDefaultFK > -1) {
				$this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle()->setid_cuenta_pagar($this->idcuenta_pagarDefaultFK);
			}

			if($this->idcuenta_cobrarDefaultFK!=null && $this->idcuenta_cobrarDefaultFK > -1) {
				$this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle()->setid_cuenta_cobrar($this->idcuenta_cobrarDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->cuenta_corriente_detalleReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle(),$this->cuenta_corriente_detalleActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeycuenta_corriente_detalle($this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariocuenta_corriente_detalle($this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle());*/
			}
			
			if($this->cuenta_corriente_detalleReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualcuenta_corriente_detalle($this->cuenta_corriente_detalle,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->cuenta_corriente_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_corriente_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->cuenta_corriente_detallesAuxiliar=array();
			}
			
			if(count($this->cuenta_corriente_detallesAuxiliar)==2) {
				$cuenta_corriente_detalleOrigen=$this->cuenta_corriente_detallesAuxiliar[0];
				$cuenta_corriente_detalleDestino=$this->cuenta_corriente_detallesAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($cuenta_corriente_detalleOrigen,$cuenta_corriente_detalleDestino,true,false,false);
				
				$this->actualizarLista($cuenta_corriente_detalleDestino,$this->cuenta_corriente_detalles);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->cuenta_corriente_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_corriente_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cuenta_corriente_detallesAuxiliar=array();
			}
			
			if(count($this->cuenta_corriente_detallesAuxiliar) > 0) {
				foreach ($this->cuenta_corriente_detallesAuxiliar as $cuenta_corriente_detalleSeleccionado) {
					$this->cuenta_corriente_detalle=new cuenta_corriente_detalle();
					
					$this->setCopiarVariablesObjetos($cuenta_corriente_detalleSeleccionado,$this->cuenta_corriente_detalle,true,true,false);
						
					$this->cuenta_corriente_detalles[]=$this->cuenta_corriente_detalle;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->cuenta_corriente_detallesEliminados as $cuenta_corriente_detalleEliminado) {
				$this->cuenta_corriente_detalleLogic->cuenta_corriente_detalles[]=$cuenta_corriente_detalleEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->cuenta_corriente_detalle=new cuenta_corriente_detalle();
							
				$this->cuenta_corriente_detalles[]=$this->cuenta_corriente_detalle;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
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
		
		$cuenta_corriente_detalleActual=new cuenta_corriente_detalle();
		
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
				
				$cuenta_corriente_detalleActual=$this->cuenta_corriente_detalles[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_cuenta_corriente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setes_balance_inicial(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_8')));  } else { $cuenta_corriente_detalleActual->setes_balance_inicial(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setes_cheque(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_9')));  } else { $cuenta_corriente_detalleActual->setes_cheque(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setes_deposito(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_10')));  } else { $cuenta_corriente_detalleActual->setes_deposito(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setes_retiro(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_11')));  } else { $cuenta_corriente_detalleActual->setes_retiro(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setnumero_cheque($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setmonto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setdebito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setcredito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setbalance((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setfecha_hora(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_tabla((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_origen((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_22'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_24','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_estado((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_24'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_25','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_asiento((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_25'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_26','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_cuenta_pagar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_26'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_27','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_cuenta_cobrar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_27'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_28','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->settabla_origen($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_28'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_29','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setorigen_empresa($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_29'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_30','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setmotivo_anulacion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_30'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_31','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setorigen_dato($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_31'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_32','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setcomputador_origen($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_32'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->cuenta_corriente_detallesAuxiliar=array();		 
		/*$this->cuenta_corriente_detallesEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->cuenta_corriente_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->cuenta_corriente_detallesAuxiliar=array();
		}
			
		if(count($this->cuenta_corriente_detallesAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->cuenta_corriente_detallesAuxiliar as $cuenta_corriente_detalleAuxLocal) {				
				
				foreach($this->cuenta_corriente_detalles as $cuenta_corriente_detalleLocal) {
					if($cuenta_corriente_detalleLocal->getId()==$cuenta_corriente_detalleAuxLocal->getId()) {
						$cuenta_corriente_detalleLocal->setIsDeleted(true);
						
						/*$this->cuenta_corriente_detallesEliminados[]=$cuenta_corriente_detalleLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($this->cuenta_corriente_detalles);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
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
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadcuenta_corriente_detalle='',string $strTipoPaginaAuxiliarcuenta_corriente_detalle='',string $strTipoUsuarioAuxiliarcuenta_corriente_detalle='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadcuenta_corriente_detalle,$strTipoPaginaAuxiliarcuenta_corriente_detalle,$strTipoUsuarioAuxiliarcuenta_corriente_detalle,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->cuenta_corriente_detalles) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=cuenta_corriente_detalle_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=cuenta_corriente_detalle_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=cuenta_corriente_detalle_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));
						
			if($cuenta_corriente_detalle_session==null) {
				$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
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
					/*$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;*/
					
					if($cuenta_corriente_detalle_session->intNumeroPaginacion==cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$cuenta_corriente_detalle_session->intNumeroPaginacion;
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
			
			$this->cuenta_corriente_detallesEliminados=array();
			
			/*$this->cuenta_corriente_detalleLogic->setConnexion($connexion);*/
			
			$this->cuenta_corriente_detalleLogic->setIsConDeep(true);
			
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalleDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cuenta_corriente');$classes[]=$class;
			$class=new Classe('cliente');$classes[]=$class;
			$class=new Classe('proveedor');$classes[]=$class;
			$class=new Classe('tabla');$classes[]=$class;
			$class=new Classe('estado');$classes[]=$class;
			$class=new Classe('asiento');$classes[]=$class;
			$class=new Classe('cuenta_pagar');$classes[]=$class;
			$class=new Classe('cuenta_cobrar');$classes[]=$class;
			
			$this->cuenta_corriente_detalleLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_corriente_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles()==null|| count($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_corriente_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->cuenta_corriente_detallesReporte=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
									
						/*$this->generarReportes('Todos',$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());*/
					
						$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($this->cuenta_corriente_detalles);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_corriente_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles()==null|| count($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_corriente_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->cuenta_corriente_detallesReporte=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
									
						/*$this->generarReportes('Todos',$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());*/
					
						$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($this->cuenta_corriente_detalles);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idcuenta_corriente_detalle=0;*/
				
				if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionFK!=null && $cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionFK==true) {
					if($cuenta_corriente_detalle_session->bigIdActualFK!=null && $cuenta_corriente_detalle_session->bigIdActualFK!=0)	{
						$this->idcuenta_corriente_detalle=$cuenta_corriente_detalle_session->bigIdActualFK;	
					}
					
					$cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionFK=false;
					
					$cuenta_corriente_detalle_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idcuenta_corriente_detalle=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idcuenta_corriente_detalle=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_corriente_detalleLogic->getEntity($this->idcuenta_corriente_detalle);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*cuenta_corriente_detalleLogicAdditional::getDetalleIndicePorId($idcuenta_corriente_detalle);*/

				
				if($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()!=null) {
					$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles(array());
					$this->cuenta_corriente_detalleLogic->cuenta_corriente_detalles[]=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idasiento')
			{

				if($cuenta_corriente_detalle_session->bigidasientoActual!=null && $cuenta_corriente_detalle_session->bigidasientoActual!=0)
				{
					$this->id_asientoFK_Idasiento=$cuenta_corriente_detalle_session->bigidasientoActual;
					$cuenta_corriente_detalle_session->bigidasientoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Idasiento($finalQueryPaginacion,$this->pagination,$this->id_asientoFK_Idasiento);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_corriente_detalleLogicAdditional::getDetalleIndiceFK_Idasiento($this->id_asientoFK_Idasiento);


					if($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles()==null || count($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_corriente_detalles=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Idasiento('',$this->pagination,$this->id_asientoFK_Idasiento);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_corriente_detallesReporte=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_corriente_detalles("FK_Idasiento",$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($cuenta_corriente_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcliente')
			{

				if($cuenta_corriente_detalle_session->bigidclienteActual!=null && $cuenta_corriente_detalle_session->bigidclienteActual!=0)
				{
					$this->id_clienteFK_Idcliente=$cuenta_corriente_detalle_session->bigidclienteActual;
					$cuenta_corriente_detalle_session->bigidclienteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Idcliente($finalQueryPaginacion,$this->pagination,$this->id_clienteFK_Idcliente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_corriente_detalleLogicAdditional::getDetalleIndiceFK_Idcliente($this->id_clienteFK_Idcliente);


					if($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles()==null || count($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_corriente_detalles=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Idcliente('',$this->pagination,$this->id_clienteFK_Idcliente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_corriente_detallesReporte=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_corriente_detalles("FK_Idcliente",$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($cuenta_corriente_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcuenta_corriente')
			{

				if($cuenta_corriente_detalle_session->bigidcuenta_corrienteActual!=null && $cuenta_corriente_detalle_session->bigidcuenta_corrienteActual!=0)
				{
					$this->id_cuenta_corrienteFK_Idcuenta_corriente=$cuenta_corriente_detalle_session->bigidcuenta_corrienteActual;
					$cuenta_corriente_detalle_session->bigidcuenta_corrienteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Idcuenta_corriente($finalQueryPaginacion,$this->pagination,$this->id_cuenta_corrienteFK_Idcuenta_corriente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_corriente_detalleLogicAdditional::getDetalleIndiceFK_Idcuenta_corriente($this->id_cuenta_corrienteFK_Idcuenta_corriente);


					if($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles()==null || count($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_corriente_detalles=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Idcuenta_corriente('',$this->pagination,$this->id_cuenta_corrienteFK_Idcuenta_corriente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_corriente_detallesReporte=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_corriente_detalles("FK_Idcuenta_corriente",$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($cuenta_corriente_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Iddocumento_cuenta_cobrar')
			{

				if($cuenta_corriente_detalle_session->bigidcuenta_cobrarActual!=null && $cuenta_corriente_detalle_session->bigidcuenta_cobrarActual!=0)
				{
					$this->id_cuenta_cobrarFK_Iddocumento_cuenta_cobrar=$cuenta_corriente_detalle_session->bigidcuenta_cobrarActual;
					$cuenta_corriente_detalle_session->bigidcuenta_cobrarActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Iddocumento_cuenta_cobrar($finalQueryPaginacion,$this->pagination,$this->id_cuenta_cobrarFK_Iddocumento_cuenta_cobrar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_corriente_detalleLogicAdditional::getDetalleIndiceFK_Iddocumento_cuenta_cobrar($this->id_cuenta_cobrarFK_Iddocumento_cuenta_cobrar);


					if($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles()==null || count($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_corriente_detalles=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Iddocumento_cuenta_cobrar('',$this->pagination,$this->id_cuenta_cobrarFK_Iddocumento_cuenta_cobrar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_corriente_detallesReporte=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_corriente_detalles("FK_Iddocumento_cuenta_cobrar",$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($cuenta_corriente_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Iddocumento_cuenta_pagar')
			{

				if($cuenta_corriente_detalle_session->bigidcuenta_pagarActual!=null && $cuenta_corriente_detalle_session->bigidcuenta_pagarActual!=0)
				{
					$this->id_cuenta_pagarFK_Iddocumento_cuenta_pagar=$cuenta_corriente_detalle_session->bigidcuenta_pagarActual;
					$cuenta_corriente_detalle_session->bigidcuenta_pagarActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Iddocumento_cuenta_pagar($finalQueryPaginacion,$this->pagination,$this->id_cuenta_pagarFK_Iddocumento_cuenta_pagar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_corriente_detalleLogicAdditional::getDetalleIndiceFK_Iddocumento_cuenta_pagar($this->id_cuenta_pagarFK_Iddocumento_cuenta_pagar);


					if($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles()==null || count($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_corriente_detalles=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Iddocumento_cuenta_pagar('',$this->pagination,$this->id_cuenta_pagarFK_Iddocumento_cuenta_pagar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_corriente_detallesReporte=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_corriente_detalles("FK_Iddocumento_cuenta_pagar",$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($cuenta_corriente_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idejercicio')
			{

				if($cuenta_corriente_detalle_session->bigidejercicioActual!=null && $cuenta_corriente_detalle_session->bigidejercicioActual!=0)
				{
					$this->id_ejercicioFK_Idejercicio=$cuenta_corriente_detalle_session->bigidejercicioActual;
					$cuenta_corriente_detalle_session->bigidejercicioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Idejercicio($finalQueryPaginacion,$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_corriente_detalleLogicAdditional::getDetalleIndiceFK_Idejercicio($this->id_ejercicioFK_Idejercicio);


					if($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles()==null || count($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_corriente_detalles=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Idejercicio('',$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_corriente_detallesReporte=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_corriente_detalles("FK_Idejercicio",$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($cuenta_corriente_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($cuenta_corriente_detalle_session->bigidempresaActual!=null && $cuenta_corriente_detalle_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$cuenta_corriente_detalle_session->bigidempresaActual;
					$cuenta_corriente_detalle_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_corriente_detalleLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles()==null || count($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_corriente_detalles=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_corriente_detallesReporte=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_corriente_detalles("FK_Idempresa",$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($cuenta_corriente_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idestado')
			{

				if($cuenta_corriente_detalle_session->bigidestadoActual!=null && $cuenta_corriente_detalle_session->bigidestadoActual!=0)
				{
					$this->id_estadoFK_Idestado=$cuenta_corriente_detalle_session->bigidestadoActual;
					$cuenta_corriente_detalle_session->bigidestadoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Idestado($finalQueryPaginacion,$this->pagination,$this->id_estadoFK_Idestado);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_corriente_detalleLogicAdditional::getDetalleIndiceFK_Idestado($this->id_estadoFK_Idestado);


					if($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles()==null || count($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_corriente_detalles=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Idestado('',$this->pagination,$this->id_estadoFK_Idestado);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_corriente_detallesReporte=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_corriente_detalles("FK_Idestado",$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($cuenta_corriente_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idperiodo')
			{

				if($cuenta_corriente_detalle_session->bigidperiodoActual!=null && $cuenta_corriente_detalle_session->bigidperiodoActual!=0)
				{
					$this->id_periodoFK_Idperiodo=$cuenta_corriente_detalle_session->bigidperiodoActual;
					$cuenta_corriente_detalle_session->bigidperiodoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Idperiodo($finalQueryPaginacion,$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_corriente_detalleLogicAdditional::getDetalleIndiceFK_Idperiodo($this->id_periodoFK_Idperiodo);


					if($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles()==null || count($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_corriente_detalles=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Idperiodo('',$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_corriente_detallesReporte=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_corriente_detalles("FK_Idperiodo",$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($cuenta_corriente_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idproveedor')
			{

				if($cuenta_corriente_detalle_session->bigidproveedorActual!=null && $cuenta_corriente_detalle_session->bigidproveedorActual!=0)
				{
					$this->id_proveedorFK_Idproveedor=$cuenta_corriente_detalle_session->bigidproveedorActual;
					$cuenta_corriente_detalle_session->bigidproveedorActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Idproveedor($finalQueryPaginacion,$this->pagination,$this->id_proveedorFK_Idproveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_corriente_detalleLogicAdditional::getDetalleIndiceFK_Idproveedor($this->id_proveedorFK_Idproveedor);


					if($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles()==null || count($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_corriente_detalles=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Idproveedor('',$this->pagination,$this->id_proveedorFK_Idproveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_corriente_detallesReporte=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_corriente_detalles("FK_Idproveedor",$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($cuenta_corriente_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtabla')
			{

				if($cuenta_corriente_detalle_session->bigidtablaActual!=null && $cuenta_corriente_detalle_session->bigidtablaActual!=0)
				{
					$this->id_tablaFK_Idtabla=$cuenta_corriente_detalle_session->bigidtablaActual;
					$cuenta_corriente_detalle_session->bigidtablaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Idtabla($finalQueryPaginacion,$this->pagination,$this->id_tablaFK_Idtabla);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_corriente_detalleLogicAdditional::getDetalleIndiceFK_Idtabla($this->id_tablaFK_Idtabla);


					if($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles()==null || count($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_corriente_detalles=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Idtabla('',$this->pagination,$this->id_tablaFK_Idtabla);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_corriente_detallesReporte=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_corriente_detalles("FK_Idtabla",$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($cuenta_corriente_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idusuario')
			{

				if($cuenta_corriente_detalle_session->bigidusuarioActual!=null && $cuenta_corriente_detalle_session->bigidusuarioActual!=0)
				{
					$this->id_usuarioFK_Idusuario=$cuenta_corriente_detalle_session->bigidusuarioActual;
					$cuenta_corriente_detalle_session->bigidusuarioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Idusuario($finalQueryPaginacion,$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_corriente_detalleLogicAdditional::getDetalleIndiceFK_Idusuario($this->id_usuarioFK_Idusuario);


					if($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles()==null || count($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_corriente_detalles=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corriente_detalleLogic->getsFK_Idusuario('',$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_corriente_detallesReporte=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_corriente_detalles("FK_Idusuario",$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($cuenta_corriente_detalles);
					}
				//}

			} 
		
		$cuenta_corriente_detalle_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cuenta_corriente_detalle_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->cuenta_corriente_detalleLogic->loadForeignsKeysDescription();*/
		
		$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
		
		if($this->cuenta_corriente_detallesEliminados==null) {
			$this->cuenta_corriente_detallesEliminados=array();
		}
		
		$this->Session->write(cuenta_corriente_detalle_util::$STR_SESSION_NAME.'Lista',serialize($this->cuenta_corriente_detalles));
		$this->Session->write(cuenta_corriente_detalle_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->cuenta_corriente_detallesEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(cuenta_corriente_detalle_util::$STR_SESSION_NAME,serialize($cuenta_corriente_detalle_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idcuenta_corriente_detalle=$idGeneral;
			
			$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
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
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}

			if(count($this->cuenta_corriente_detalles) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_IdasientoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_asientoFK_Idasiento=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idasiento','cmbid_asiento');

			$this->strAccionBusqueda='FK_Idasiento';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdclienteParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_clienteFK_Idcliente=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcliente','cmbid_cliente');

			$this->strAccionBusqueda='FK_Idcliente';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
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
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuenta_corrienteFK_Idcuenta_corriente=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta_corriente','cmbid_cuenta_corriente');

			$this->strAccionBusqueda='FK_Idcuenta_corriente';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Iddocumento_cuenta_cobrarParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuenta_cobrarFK_Iddocumento_cuenta_cobrar=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Iddocumento_cuenta_cobrar','cmbid_cuenta_cobrar');

			$this->strAccionBusqueda='FK_Iddocumento_cuenta_cobrar';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Iddocumento_cuenta_pagarParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuenta_pagarFK_Iddocumento_cuenta_pagar=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Iddocumento_cuenta_pagar','cmbid_cuenta_pagar');

			$this->strAccionBusqueda='FK_Iddocumento_cuenta_pagar';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
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
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_ejercicioFK_Idejercicio=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idejercicio','cmbid_ejercicio');

			$this->strAccionBusqueda='FK_Idejercicio';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
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
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdestadoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_estadoFK_Idestado=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idestado','cmbid_estado');

			$this->strAccionBusqueda='FK_Idestado';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
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
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_periodoFK_Idperiodo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idperiodo','cmbid_periodo');

			$this->strAccionBusqueda='FK_Idperiodo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdproveedorParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_proveedorFK_Idproveedor=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idproveedor','cmbid_proveedor');

			$this->strAccionBusqueda='FK_Idproveedor';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdtablaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_tablaFK_Idtabla=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtabla','cmbid_tabla');

			$this->strAccionBusqueda='FK_Idtabla';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdusuarioParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_usuarioFK_Idusuario=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idusuario','cmbid_usuario');

			$this->strAccionBusqueda='FK_Idusuario';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idasiento($strFinalQuery,$id_asiento)
	{
		try
		{

			$this->cuenta_corriente_detalleLogic->getsFK_Idasiento($strFinalQuery,new Pagination(),$id_asiento);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idcliente($strFinalQuery,$id_cliente)
	{
		try
		{

			$this->cuenta_corriente_detalleLogic->getsFK_Idcliente($strFinalQuery,new Pagination(),$id_cliente);
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

			$this->cuenta_corriente_detalleLogic->getsFK_Idcuenta_corriente($strFinalQuery,new Pagination(),$id_cuenta_corriente);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Iddocumento_cuenta_cobrar($strFinalQuery,$id_cuenta_cobrar)
	{
		try
		{

			$this->cuenta_corriente_detalleLogic->getsFK_Iddocumento_cuenta_cobrar($strFinalQuery,new Pagination(),$id_cuenta_cobrar);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Iddocumento_cuenta_pagar($strFinalQuery,$id_cuenta_pagar)
	{
		try
		{

			$this->cuenta_corriente_detalleLogic->getsFK_Iddocumento_cuenta_pagar($strFinalQuery,new Pagination(),$id_cuenta_pagar);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idejercicio($strFinalQuery,$id_ejercicio)
	{
		try
		{

			$this->cuenta_corriente_detalleLogic->getsFK_Idejercicio($strFinalQuery,new Pagination(),$id_ejercicio);
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

			$this->cuenta_corriente_detalleLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idestado($strFinalQuery,$id_estado)
	{
		try
		{

			$this->cuenta_corriente_detalleLogic->getsFK_Idestado($strFinalQuery,new Pagination(),$id_estado);
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

			$this->cuenta_corriente_detalleLogic->getsFK_Idperiodo($strFinalQuery,new Pagination(),$id_periodo);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idproveedor($strFinalQuery,$id_proveedor)
	{
		try
		{

			$this->cuenta_corriente_detalleLogic->getsFK_Idproveedor($strFinalQuery,new Pagination(),$id_proveedor);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtabla($strFinalQuery,$id_tabla)
	{
		try
		{

			$this->cuenta_corriente_detalleLogic->getsFK_Idtabla($strFinalQuery,new Pagination(),$id_tabla);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idusuario($strFinalQuery,$id_usuario)
	{
		try
		{

			$this->cuenta_corriente_detalleLogic->getsFK_Idusuario($strFinalQuery,new Pagination(),$id_usuario);
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
			
			
			$cuenta_corriente_detalleForeignKey=new cuenta_corriente_detalle_param_return(); //cuenta_corriente_detalleForeignKey();
			
			$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));
						
			if($cuenta_corriente_detalle_session==null) {
				$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$cuenta_corriente_detalleForeignKey=$this->cuenta_corriente_detalleLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$cuenta_corriente_detalle_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$cuenta_corriente_detalleForeignKey->empresasFK;
				$this->idempresaDefaultFK=$cuenta_corriente_detalleForeignKey->idempresaDefaultFK;
			}

			if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$this->strRecargarFkTipos,',')) {
				$this->ejerciciosFK=$cuenta_corriente_detalleForeignKey->ejerciciosFK;
				$this->idejercicioDefaultFK=$cuenta_corriente_detalleForeignKey->idejercicioDefaultFK;
			}

			if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionejercicio) {
				$this->setVisibleBusquedasParaejercicio(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$this->strRecargarFkTipos,',')) {
				$this->periodosFK=$cuenta_corriente_detalleForeignKey->periodosFK;
				$this->idperiodoDefaultFK=$cuenta_corriente_detalleForeignKey->idperiodoDefaultFK;
			}

			if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionperiodo) {
				$this->setVisibleBusquedasParaperiodo(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$this->strRecargarFkTipos,',')) {
				$this->usuariosFK=$cuenta_corriente_detalleForeignKey->usuariosFK;
				$this->idusuarioDefaultFK=$cuenta_corriente_detalleForeignKey->idusuarioDefaultFK;
			}

			if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionusuario) {
				$this->setVisibleBusquedasParausuario(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_corriente',$this->strRecargarFkTipos,',')) {
				$this->cuenta_corrientesFK=$cuenta_corriente_detalleForeignKey->cuenta_corrientesFK;
				$this->idcuenta_corrienteDefaultFK=$cuenta_corriente_detalleForeignKey->idcuenta_corrienteDefaultFK;
			}

			if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncuenta_corriente) {
				$this->setVisibleBusquedasParacuenta_corriente(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cliente',$this->strRecargarFkTipos,',')) {
				$this->clientesFK=$cuenta_corriente_detalleForeignKey->clientesFK;
				$this->idclienteDefaultFK=$cuenta_corriente_detalleForeignKey->idclienteDefaultFK;
			}

			if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncliente) {
				$this->setVisibleBusquedasParacliente(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$this->strRecargarFkTipos,',')) {
				$this->proveedorsFK=$cuenta_corriente_detalleForeignKey->proveedorsFK;
				$this->idproveedorDefaultFK=$cuenta_corriente_detalleForeignKey->idproveedorDefaultFK;
			}

			if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionproveedor) {
				$this->setVisibleBusquedasParaproveedor(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tabla',$this->strRecargarFkTipos,',')) {
				$this->tablasFK=$cuenta_corriente_detalleForeignKey->tablasFK;
				$this->idtablaDefaultFK=$cuenta_corriente_detalleForeignKey->idtablaDefaultFK;
			}

			if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesiontabla) {
				$this->setVisibleBusquedasParatabla(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado',$this->strRecargarFkTipos,',')) {
				$this->estadosFK=$cuenta_corriente_detalleForeignKey->estadosFK;
				$this->idestadoDefaultFK=$cuenta_corriente_detalleForeignKey->idestadoDefaultFK;
			}

			if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionestado) {
				$this->setVisibleBusquedasParaestado(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_asiento',$this->strRecargarFkTipos,',')) {
				$this->asientosFK=$cuenta_corriente_detalleForeignKey->asientosFK;
				$this->idasientoDefaultFK=$cuenta_corriente_detalleForeignKey->idasientoDefaultFK;
			}

			if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionasiento) {
				$this->setVisibleBusquedasParaasiento(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_pagar',$this->strRecargarFkTipos,',')) {
				$this->cuenta_pagarsFK=$cuenta_corriente_detalleForeignKey->cuenta_pagarsFK;
				$this->idcuenta_pagarDefaultFK=$cuenta_corriente_detalleForeignKey->idcuenta_pagarDefaultFK;
			}

			if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncuenta_pagar) {
				$this->setVisibleBusquedasParacuenta_pagar(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_cobrar',$this->strRecargarFkTipos,',')) {
				$this->cuenta_cobrarsFK=$cuenta_corriente_detalleForeignKey->cuenta_cobrarsFK;
				$this->idcuenta_cobrarDefaultFK=$cuenta_corriente_detalleForeignKey->idcuenta_cobrarDefaultFK;
			}

			if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncuenta_cobrar) {
				$this->setVisibleBusquedasParacuenta_cobrar(true);
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
	
	function cargarCombosFKFromReturnGeneral($cuenta_corriente_detalleReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$cuenta_corriente_detalleReturnGeneral->strRecargarFkTipos;
			
			


			if($cuenta_corriente_detalleReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$cuenta_corriente_detalleReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$cuenta_corriente_detalleReturnGeneral->idempresaDefaultFK;
			}


			if($cuenta_corriente_detalleReturnGeneral->con_ejerciciosFK==true) {
				$this->ejerciciosFK=$cuenta_corriente_detalleReturnGeneral->ejerciciosFK;
				$this->idejercicioDefaultFK=$cuenta_corriente_detalleReturnGeneral->idejercicioDefaultFK;
			}


			if($cuenta_corriente_detalleReturnGeneral->con_periodosFK==true) {
				$this->periodosFK=$cuenta_corriente_detalleReturnGeneral->periodosFK;
				$this->idperiodoDefaultFK=$cuenta_corriente_detalleReturnGeneral->idperiodoDefaultFK;
			}


			if($cuenta_corriente_detalleReturnGeneral->con_usuariosFK==true) {
				$this->usuariosFK=$cuenta_corriente_detalleReturnGeneral->usuariosFK;
				$this->idusuarioDefaultFK=$cuenta_corriente_detalleReturnGeneral->idusuarioDefaultFK;
			}


			if($cuenta_corriente_detalleReturnGeneral->con_cuenta_corrientesFK==true) {
				$this->cuenta_corrientesFK=$cuenta_corriente_detalleReturnGeneral->cuenta_corrientesFK;
				$this->idcuenta_corrienteDefaultFK=$cuenta_corriente_detalleReturnGeneral->idcuenta_corrienteDefaultFK;
			}


			if($cuenta_corriente_detalleReturnGeneral->con_clientesFK==true) {
				$this->clientesFK=$cuenta_corriente_detalleReturnGeneral->clientesFK;
				$this->idclienteDefaultFK=$cuenta_corriente_detalleReturnGeneral->idclienteDefaultFK;
			}


			if($cuenta_corriente_detalleReturnGeneral->con_proveedorsFK==true) {
				$this->proveedorsFK=$cuenta_corriente_detalleReturnGeneral->proveedorsFK;
				$this->idproveedorDefaultFK=$cuenta_corriente_detalleReturnGeneral->idproveedorDefaultFK;
			}


			if($cuenta_corriente_detalleReturnGeneral->con_tablasFK==true) {
				$this->tablasFK=$cuenta_corriente_detalleReturnGeneral->tablasFK;
				$this->idtablaDefaultFK=$cuenta_corriente_detalleReturnGeneral->idtablaDefaultFK;
			}


			if($cuenta_corriente_detalleReturnGeneral->con_estadosFK==true) {
				$this->estadosFK=$cuenta_corriente_detalleReturnGeneral->estadosFK;
				$this->idestadoDefaultFK=$cuenta_corriente_detalleReturnGeneral->idestadoDefaultFK;
			}


			if($cuenta_corriente_detalleReturnGeneral->con_asientosFK==true) {
				$this->asientosFK=$cuenta_corriente_detalleReturnGeneral->asientosFK;
				$this->idasientoDefaultFK=$cuenta_corriente_detalleReturnGeneral->idasientoDefaultFK;
			}


			if($cuenta_corriente_detalleReturnGeneral->con_cuenta_pagarsFK==true) {
				$this->cuenta_pagarsFK=$cuenta_corriente_detalleReturnGeneral->cuenta_pagarsFK;
				$this->idcuenta_pagarDefaultFK=$cuenta_corriente_detalleReturnGeneral->idcuenta_pagarDefaultFK;
			}


			if($cuenta_corriente_detalleReturnGeneral->con_cuenta_cobrarsFK==true) {
				$this->cuenta_cobrarsFK=$cuenta_corriente_detalleReturnGeneral->cuenta_cobrarsFK;
				$this->idcuenta_cobrarDefaultFK=$cuenta_corriente_detalleReturnGeneral->idcuenta_cobrarDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));
		
		if($cuenta_corriente_detalle_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($cuenta_corriente_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($cuenta_corriente_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==ejercicio_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='ejercicio';
			}
			else if($cuenta_corriente_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==periodo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='periodo';
			}
			else if($cuenta_corriente_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==usuario_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='usuario';
			}
			else if($cuenta_corriente_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_corriente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta_corriente';
			}
			else if($cuenta_corriente_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cliente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cliente';
			}
			else if($cuenta_corriente_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==proveedor_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='proveedor';
			}
			else if($cuenta_corriente_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==tabla_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='tabla';
			}
			else if($cuenta_corriente_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==estado_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='estado';
			}
			else if($cuenta_corriente_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==asiento_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='asiento';
			}
			else if($cuenta_corriente_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_pagar_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta_pagar';
			}
			else if($cuenta_corriente_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_cobrar_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta_cobrar';
			}
			
			$cuenta_corriente_detalle_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}						
			
			$this->cuenta_corriente_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_corriente_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cuenta_corriente_detallesAuxiliar=array();
			}
			
			if(count($this->cuenta_corriente_detallesAuxiliar) > 0) {
				
				foreach ($this->cuenta_corriente_detallesAuxiliar as $cuenta_corriente_detalleSeleccionado) {
					$this->eliminarTablaBase($cuenta_corriente_detalleSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('clasificacion_cheque');
			$tipoRelacionReporte->setsDescripcion('Clasificacion Cheques');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=clasificacion_cheque_util::$STR_NOMBRE_CLASE;
		
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


	public function getclientesFKListSelectItem() 
	{
		$clientesList=array();

		$item=null;

		foreach($this->clientesFK as $cliente)
		{
			$item=new SelectItem();
			$item->setLabel($cliente->getnombre_completo());
			$item->setValue($cliente->getId());
			$clientesList[]=$item;
		}

		return $clientesList;
	}


	public function getproveedorsFKListSelectItem() 
	{
		$proveedorsList=array();

		$item=null;

		foreach($this->proveedorsFK as $proveedor)
		{
			$item=new SelectItem();
			$item->setLabel($proveedor->getnombre_completo());
			$item->setValue($proveedor->getId());
			$proveedorsList[]=$item;
		}

		return $proveedorsList;
	}


	public function gettablasFKListSelectItem() 
	{
		$tablasList=array();

		$item=null;

		foreach($this->tablasFK as $tabla)
		{
			$item=new SelectItem();
			$item->setLabel($tabla->getnombre());
			$item->setValue($tabla->getId());
			$tablasList[]=$item;
		}

		return $tablasList;
	}


	public function getestadosFKListSelectItem() 
	{
		$estadosList=array();

		$item=null;

		foreach($this->estadosFK as $estado)
		{
			$item=new SelectItem();
			$item->setLabel($estado->getnombre());
			$item->setValue($estado->getId());
			$estadosList[]=$item;
		}

		return $estadosList;
	}


	public function getasientosFKListSelectItem() 
	{
		$asientosList=array();

		$item=null;

		foreach($this->asientosFK as $asiento)
		{
			$item=new SelectItem();
			$item->setLabel($asiento->getnumero());
			$item->setValue($asiento->getId());
			$asientosList[]=$item;
		}

		return $asientosList;
	}


	public function getcuenta_pagarsFKListSelectItem() 
	{
		$cuenta_pagarsList=array();

		$item=null;

		foreach($this->cuenta_pagarsFK as $cuenta_pagar)
		{
			$item=new SelectItem();
			$item->setLabel($cuenta_pagar>getId());
			$item->setValue($cuenta_pagar->getId());
			$cuenta_pagarsList[]=$item;
		}

		return $cuenta_pagarsList;
	}


	public function getcuenta_cobrarsFKListSelectItem() 
	{
		$cuenta_cobrarsList=array();

		$item=null;

		foreach($this->cuenta_cobrarsFK as $cuenta_cobrar)
		{
			$item=new SelectItem();
			$item->setLabel($cuenta_cobrar>getId());
			$item->setValue($cuenta_cobrar->getId());
			$cuenta_cobrarsList[]=$item;
		}

		return $cuenta_cobrarsList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
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
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$cuenta_corriente_detallesNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->cuenta_corriente_detalles as $cuenta_corriente_detalleLocal) {
				if($cuenta_corriente_detalleLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->cuenta_corriente_detalle=new cuenta_corriente_detalle();
				
				$this->cuenta_corriente_detalle->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->cuenta_corriente_detalles[]=$this->cuenta_corriente_detalle;*/
				
				$cuenta_corriente_detallesNuevos[]=$this->cuenta_corriente_detalle;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('cuenta_corriente');$classes[]=$class;
				$class=new Classe('cliente');$classes[]=$class;
				$class=new Classe('proveedor');$classes[]=$class;
				$class=new Classe('tabla');$classes[]=$class;
				$class=new Classe('estado');$classes[]=$class;
				$class=new Classe('asiento');$classes[]=$class;
				$class=new Classe('cuenta_pagar');$classes[]=$class;
				$class=new Classe('cuenta_cobrar');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($cuenta_corriente_detallesNuevos);
					
				$this->cuenta_corriente_detalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($cuenta_corriente_detallesNuevos as $cuenta_corriente_detalleNuevo) {
					$this->cuenta_corriente_detalles[]=$cuenta_corriente_detalleNuevo;
				}
				
				/*$this->cuenta_corriente_detalles[]=$cuenta_corriente_detallesNuevos;*/
				
				$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($this->cuenta_corriente_detalles);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($cuenta_corriente_detallesNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($cuenta_corriente_detalle_session->bigidempresaActual!=null && $cuenta_corriente_detalle_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cuenta_corriente_detalle_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=cuenta_corriente_detalle_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
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

		$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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


			if($cuenta_corriente_detalle_session->bigidejercicioActual!=null && $cuenta_corriente_detalle_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($cuenta_corriente_detalle_session->bigidejercicioActual);//WithConnection

				$this->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=cuenta_corriente_detalle_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
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

		$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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


			if($cuenta_corriente_detalle_session->bigidperiodoActual!=null && $cuenta_corriente_detalle_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($cuenta_corriente_detalle_session->bigidperiodoActual);//WithConnection

				$this->periodosFK[$periodoLogic->getperiodo()->getId()]=cuenta_corriente_detalle_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$this->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery=''){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$this->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionusuario!=true) {
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


			if($cuenta_corriente_detalle_session->bigidusuarioActual!=null && $cuenta_corriente_detalle_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($cuenta_corriente_detalle_session->bigidusuarioActual);//WithConnection

				$this->usuariosFK[$usuarioLogic->getusuario()->getId()]=cuenta_corriente_detalle_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$this->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
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

		$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncuenta_corriente!=true) {
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


			if($cuenta_corriente_detalle_session->bigidcuenta_corrienteActual!=null && $cuenta_corriente_detalle_session->bigidcuenta_corrienteActual > 0) {
				$cuenta_corrienteLogic->getEntity($cuenta_corriente_detalle_session->bigidcuenta_corrienteActual);//WithConnection

				$this->cuenta_corrientesFK[$cuenta_corrienteLogic->getcuenta_corriente()->getId()]=cuenta_corriente_detalle_util::getcuenta_corrienteDescripcion($cuenta_corrienteLogic->getcuenta_corriente());
				$this->idcuenta_corrienteDefaultFK=$cuenta_corrienteLogic->getcuenta_corriente()->getId();
			}
		}
	}

	public function cargarCombosclientesFK($connexion=null,$strRecargarFkQuery=''){
		$clienteLogic= new cliente_logic();
		$pagination= new Pagination();
		$this->clientesFK=array();

		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncliente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=cliente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcliente=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcliente=Funciones::GetFinalQueryAppend($finalQueryGlobalcliente, '');
				$finalQueryGlobalcliente.=cliente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcliente.$strRecargarFkQuery;		

				$clienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosclientesFK($clienteLogic->getclientes());

		} else {
			$this->setVisibleBusquedasParacliente(true);


			if($cuenta_corriente_detalle_session->bigidclienteActual!=null && $cuenta_corriente_detalle_session->bigidclienteActual > 0) {
				$clienteLogic->getEntity($cuenta_corriente_detalle_session->bigidclienteActual);//WithConnection

				$this->clientesFK[$clienteLogic->getcliente()->getId()]=cuenta_corriente_detalle_util::getclienteDescripcion($clienteLogic->getcliente());
				$this->idclienteDefaultFK=$clienteLogic->getcliente()->getId();
			}
		}
	}

	public function cargarCombosproveedorsFK($connexion=null,$strRecargarFkQuery=''){
		$proveedorLogic= new proveedor_logic();
		$pagination= new Pagination();
		$this->proveedorsFK=array();

		$proveedorLogic->setConnexion($connexion);
		$proveedorLogic->getproveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionproveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=proveedor_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalproveedor=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalproveedor=Funciones::GetFinalQueryAppend($finalQueryGlobalproveedor, '');
				$finalQueryGlobalproveedor.=proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalproveedor.$strRecargarFkQuery;		

				$proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosproveedorsFK($proveedorLogic->getproveedors());

		} else {
			$this->setVisibleBusquedasParaproveedor(true);


			if($cuenta_corriente_detalle_session->bigidproveedorActual!=null && $cuenta_corriente_detalle_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($cuenta_corriente_detalle_session->bigidproveedorActual);//WithConnection

				$this->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=cuenta_corriente_detalle_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$this->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	public function cargarCombostablasFK($connexion=null,$strRecargarFkQuery=''){
		$tablaLogic= new tabla_logic();
		$pagination= new Pagination();
		$this->tablasFK=array();

		$tablaLogic->setConnexion($connexion);
		$tablaLogic->gettablaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesiontabla!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=tabla_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltabla=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltabla=Funciones::GetFinalQueryAppend($finalQueryGlobaltabla, '');
				$finalQueryGlobaltabla.=tabla_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltabla.$strRecargarFkQuery;		

				$tablaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostablasFK($tablaLogic->gettablas());

		} else {
			$this->setVisibleBusquedasParatabla(true);


			if($cuenta_corriente_detalle_session->bigidtablaActual!=null && $cuenta_corriente_detalle_session->bigidtablaActual > 0) {
				$tablaLogic->getEntity($cuenta_corriente_detalle_session->bigidtablaActual);//WithConnection

				$this->tablasFK[$tablaLogic->gettabla()->getId()]=cuenta_corriente_detalle_util::gettablaDescripcion($tablaLogic->gettabla());
				$this->idtablaDefaultFK=$tablaLogic->gettabla()->getId();
			}
		}
	}

	public function cargarCombosestadosFK($connexion=null,$strRecargarFkQuery=''){
		$estadoLogic= new estado_logic();
		$pagination= new Pagination();
		$this->estadosFK=array();

		$estadoLogic->setConnexion($connexion);
		$estadoLogic->getestadoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionestado!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=estado_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalestado=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalestado=Funciones::GetFinalQueryAppend($finalQueryGlobalestado, '');
				$finalQueryGlobalestado.=estado_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalestado.$strRecargarFkQuery;		

				$estadoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosestadosFK($estadoLogic->getestados());

		} else {
			$this->setVisibleBusquedasParaestado(true);


			if($cuenta_corriente_detalle_session->bigidestadoActual!=null && $cuenta_corriente_detalle_session->bigidestadoActual > 0) {
				$estadoLogic->getEntity($cuenta_corriente_detalle_session->bigidestadoActual);//WithConnection

				$this->estadosFK[$estadoLogic->getestado()->getId()]=cuenta_corriente_detalle_util::getestadoDescripcion($estadoLogic->getestado());
				$this->idestadoDefaultFK=$estadoLogic->getestado()->getId();
			}
		}
	}

	public function cargarCombosasientosFK($connexion=null,$strRecargarFkQuery=''){
		$asientoLogic= new asiento_logic();
		$pagination= new Pagination();
		$this->asientosFK=array();

		$asientoLogic->setConnexion($connexion);
		$asientoLogic->getasientoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionasiento!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=asiento_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalasiento=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalasiento=Funciones::GetFinalQueryAppend($finalQueryGlobalasiento, '');
				$finalQueryGlobalasiento.=asiento_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalasiento.$strRecargarFkQuery;		

				$asientoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosasientosFK($asientoLogic->getasientos());

		} else {
			$this->setVisibleBusquedasParaasiento(true);


			if($cuenta_corriente_detalle_session->bigidasientoActual!=null && $cuenta_corriente_detalle_session->bigidasientoActual > 0) {
				$asientoLogic->getEntity($cuenta_corriente_detalle_session->bigidasientoActual);//WithConnection

				$this->asientosFK[$asientoLogic->getasiento()->getId()]=cuenta_corriente_detalle_util::getasientoDescripcion($asientoLogic->getasiento());
				$this->idasientoDefaultFK=$asientoLogic->getasiento()->getId();
			}
		}
	}

	public function cargarComboscuenta_pagarsFK($connexion=null,$strRecargarFkQuery=''){
		$cuenta_pagarLogic= new cuenta_pagar_logic();
		$pagination= new Pagination();
		$this->cuenta_pagarsFK=array();

		$cuenta_pagarLogic->setConnexion($connexion);
		$cuenta_pagarLogic->getcuenta_pagarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncuenta_pagar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_pagar_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcuenta_pagar=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta_pagar=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta_pagar, '');
				$finalQueryGlobalcuenta_pagar.=cuenta_pagar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta_pagar.$strRecargarFkQuery;		

				$cuenta_pagarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscuenta_pagarsFK($cuenta_pagarLogic->getcuenta_pagars());

		} else {
			$this->setVisibleBusquedasParacuenta_pagar(true);


			if($cuenta_corriente_detalle_session->bigidcuenta_pagarActual!=null && $cuenta_corriente_detalle_session->bigidcuenta_pagarActual > 0) {
				$cuenta_pagarLogic->getEntity($cuenta_corriente_detalle_session->bigidcuenta_pagarActual);//WithConnection

				$this->cuenta_pagarsFK[$cuenta_pagarLogic->getcuenta_pagar()->getId()]=cuenta_corriente_detalle_util::getcuenta_pagarDescripcion($cuenta_pagarLogic->getcuenta_pagar());
				$this->idcuenta_pagarDefaultFK=$cuenta_pagarLogic->getcuenta_pagar()->getId();
			}
		}
	}

	public function cargarComboscuenta_cobrarsFK($connexion=null,$strRecargarFkQuery=''){
		$cuenta_cobrarLogic= new cuenta_cobrar_logic();
		$pagination= new Pagination();
		$this->cuenta_cobrarsFK=array();

		$cuenta_cobrarLogic->setConnexion($connexion);
		$cuenta_cobrarLogic->getcuenta_cobrarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));

		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncuenta_cobrar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_cobrar_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcuenta_cobrar=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta_cobrar=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta_cobrar, '');
				$finalQueryGlobalcuenta_cobrar.=cuenta_cobrar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta_cobrar.$strRecargarFkQuery;		

				$cuenta_cobrarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscuenta_cobrarsFK($cuenta_cobrarLogic->getcuenta_cobrars());

		} else {
			$this->setVisibleBusquedasParacuenta_cobrar(true);


			if($cuenta_corriente_detalle_session->bigidcuenta_cobrarActual!=null && $cuenta_corriente_detalle_session->bigidcuenta_cobrarActual > 0) {
				$cuenta_cobrarLogic->getEntity($cuenta_corriente_detalle_session->bigidcuenta_cobrarActual);//WithConnection

				$this->cuenta_cobrarsFK[$cuenta_cobrarLogic->getcuenta_cobrar()->getId()]=cuenta_corriente_detalle_util::getcuenta_cobrarDescripcion($cuenta_cobrarLogic->getcuenta_cobrar());
				$this->idcuenta_cobrarDefaultFK=$cuenta_cobrarLogic->getcuenta_cobrar()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=cuenta_corriente_detalle_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombosejerciciosFK($ejercicios){

		foreach ($ejercicios as $ejercicioLocal ) {
			if($this->idejercicioDefaultFK==0) {
				$this->idejercicioDefaultFK=$ejercicioLocal->getId();
			}

			$this->ejerciciosFK[$ejercicioLocal->getId()]=cuenta_corriente_detalle_util::getejercicioDescripcion($ejercicioLocal);
		}
	}

	public function prepararCombosperiodosFK($periodos){

		foreach ($periodos as $periodoLocal ) {
			if($this->idperiodoDefaultFK==0) {
				$this->idperiodoDefaultFK=$periodoLocal->getId();
			}

			$this->periodosFK[$periodoLocal->getId()]=cuenta_corriente_detalle_util::getperiodoDescripcion($periodoLocal);
		}
	}

	public function prepararCombosusuariosFK($usuarios){

		foreach ($usuarios as $usuarioLocal ) {
			if($this->idusuarioDefaultFK==0) {
				$this->idusuarioDefaultFK=$usuarioLocal->getId();
			}

			$this->usuariosFK[$usuarioLocal->getId()]=cuenta_corriente_detalle_util::getusuarioDescripcion($usuarioLocal);
		}
	}

	public function prepararComboscuenta_corrientesFK($cuenta_corrientes){

		foreach ($cuenta_corrientes as $cuenta_corrienteLocal ) {
			if($this->idcuenta_corrienteDefaultFK==0) {
				$this->idcuenta_corrienteDefaultFK=$cuenta_corrienteLocal->getId();
			}

			$this->cuenta_corrientesFK[$cuenta_corrienteLocal->getId()]=cuenta_corriente_detalle_util::getcuenta_corrienteDescripcion($cuenta_corrienteLocal);
		}
	}

	public function prepararCombosclientesFK($clientes){

		foreach ($clientes as $clienteLocal ) {
			if($this->idclienteDefaultFK==0) {
				$this->idclienteDefaultFK=$clienteLocal->getId();
			}

			$this->clientesFK[$clienteLocal->getId()]=cuenta_corriente_detalle_util::getclienteDescripcion($clienteLocal);
		}
	}

	public function prepararCombosproveedorsFK($proveedors){

		foreach ($proveedors as $proveedorLocal ) {
			if($this->idproveedorDefaultFK==0) {
				$this->idproveedorDefaultFK=$proveedorLocal->getId();
			}

			$this->proveedorsFK[$proveedorLocal->getId()]=cuenta_corriente_detalle_util::getproveedorDescripcion($proveedorLocal);
		}
	}

	public function prepararCombostablasFK($tablas){

		foreach ($tablas as $tablaLocal ) {
			if($this->idtablaDefaultFK==0) {
				$this->idtablaDefaultFK=$tablaLocal->getId();
			}

			$this->tablasFK[$tablaLocal->getId()]=cuenta_corriente_detalle_util::gettablaDescripcion($tablaLocal);
		}
	}

	public function prepararCombosestadosFK($estados){

		foreach ($estados as $estadoLocal ) {
			if($this->idestadoDefaultFK==0) {
				$this->idestadoDefaultFK=$estadoLocal->getId();
			}

			$this->estadosFK[$estadoLocal->getId()]=cuenta_corriente_detalle_util::getestadoDescripcion($estadoLocal);
		}
	}

	public function prepararCombosasientosFK($asientos){

		foreach ($asientos as $asientoLocal ) {
			if($this->idasientoDefaultFK==0) {
				$this->idasientoDefaultFK=$asientoLocal->getId();
			}

			$this->asientosFK[$asientoLocal->getId()]=cuenta_corriente_detalle_util::getasientoDescripcion($asientoLocal);
		}
	}

	public function prepararComboscuenta_pagarsFK($cuenta_pagars){

		foreach ($cuenta_pagars as $cuenta_pagarLocal ) {
			if($this->idcuenta_pagarDefaultFK==0) {
				$this->idcuenta_pagarDefaultFK=$cuenta_pagarLocal->getId();
			}

			$this->cuenta_pagarsFK[$cuenta_pagarLocal->getId()]=cuenta_corriente_detalle_util::getcuenta_pagarDescripcion($cuenta_pagarLocal);
		}
	}

	public function prepararComboscuenta_cobrarsFK($cuenta_cobrars){

		foreach ($cuenta_cobrars as $cuenta_cobrarLocal ) {
			if($this->idcuenta_cobrarDefaultFK==0) {
				$this->idcuenta_cobrarDefaultFK=$cuenta_cobrarLocal->getId();
			}

			$this->cuenta_cobrarsFK[$cuenta_cobrarLocal->getId()]=cuenta_corriente_detalle_util::getcuenta_cobrarDescripcion($cuenta_cobrarLocal);
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

			$strDescripcionempresa=cuenta_corriente_detalle_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
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

			$strDescripcionejercicio=cuenta_corriente_detalle_util::getejercicioDescripcion($ejercicioLogic->getejercicio());

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

			$strDescripcionperiodo=cuenta_corriente_detalle_util::getperiodoDescripcion($periodoLogic->getperiodo());

		} else {
			$strDescripcionperiodo='null';
		}

		return $strDescripcionperiodo;
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

			$strDescripcionusuario=cuenta_corriente_detalle_util::getusuarioDescripcion($usuarioLogic->getusuario());

		} else {
			$strDescripcionusuario='null';
		}

		return $strDescripcionusuario;
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

			$strDescripcioncuenta_corriente=cuenta_corriente_detalle_util::getcuenta_corrienteDescripcion($cuenta_corrienteLogic->getcuenta_corriente());

		} else {
			$strDescripcioncuenta_corriente='null';
		}

		return $strDescripcioncuenta_corriente;
	}

	public function cargarDescripcionclienteFK($idcliente,$connexion=null){
		$clienteLogic= new cliente_logic();
		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$strDescripcioncliente='';

		if($idcliente!=null && $idcliente!='' && $idcliente!='null') {
			if($connexion!=null) {
				$clienteLogic->getEntity($idcliente);//WithConnection
			} else {
				$clienteLogic->getEntityWithConnection($idcliente);//
			}

			$strDescripcioncliente=cuenta_corriente_detalle_util::getclienteDescripcion($clienteLogic->getcliente());

		} else {
			$strDescripcioncliente='null';
		}

		return $strDescripcioncliente;
	}

	public function cargarDescripcionproveedorFK($idproveedor,$connexion=null){
		$proveedorLogic= new proveedor_logic();
		$proveedorLogic->setConnexion($connexion);
		$proveedorLogic->getproveedorDataAccess()->isForFKData=true;
		$strDescripcionproveedor='';

		if($idproveedor!=null && $idproveedor!='' && $idproveedor!='null') {
			if($connexion!=null) {
				$proveedorLogic->getEntity($idproveedor);//WithConnection
			} else {
				$proveedorLogic->getEntityWithConnection($idproveedor);//
			}

			$strDescripcionproveedor=cuenta_corriente_detalle_util::getproveedorDescripcion($proveedorLogic->getproveedor());

		} else {
			$strDescripcionproveedor='null';
		}

		return $strDescripcionproveedor;
	}

	public function cargarDescripciontablaFK($idtabla,$connexion=null){
		$tablaLogic= new tabla_logic();
		$tablaLogic->setConnexion($connexion);
		$tablaLogic->gettablaDataAccess()->isForFKData=true;
		$strDescripciontabla='';

		if($idtabla!=null && $idtabla!='' && $idtabla!='null') {
			if($connexion!=null) {
				$tablaLogic->getEntity($idtabla);//WithConnection
			} else {
				$tablaLogic->getEntityWithConnection($idtabla);//
			}

			$strDescripciontabla=cuenta_corriente_detalle_util::gettablaDescripcion($tablaLogic->gettabla());

		} else {
			$strDescripciontabla='null';
		}

		return $strDescripciontabla;
	}

	public function cargarDescripcionestadoFK($idestado,$connexion=null){
		$estadoLogic= new estado_logic();
		$estadoLogic->setConnexion($connexion);
		$estadoLogic->getestadoDataAccess()->isForFKData=true;
		$strDescripcionestado='';

		if($idestado!=null && $idestado!='' && $idestado!='null') {
			if($connexion!=null) {
				$estadoLogic->getEntity($idestado);//WithConnection
			} else {
				$estadoLogic->getEntityWithConnection($idestado);//
			}

			$strDescripcionestado=cuenta_corriente_detalle_util::getestadoDescripcion($estadoLogic->getestado());

		} else {
			$strDescripcionestado='null';
		}

		return $strDescripcionestado;
	}

	public function cargarDescripcionasientoFK($idasiento,$connexion=null){
		$asientoLogic= new asiento_logic();
		$asientoLogic->setConnexion($connexion);
		$asientoLogic->getasientoDataAccess()->isForFKData=true;
		$strDescripcionasiento='';

		if($idasiento!=null && $idasiento!='' && $idasiento!='null') {
			if($connexion!=null) {
				$asientoLogic->getEntity($idasiento);//WithConnection
			} else {
				$asientoLogic->getEntityWithConnection($idasiento);//
			}

			$strDescripcionasiento=cuenta_corriente_detalle_util::getasientoDescripcion($asientoLogic->getasiento());

		} else {
			$strDescripcionasiento='null';
		}

		return $strDescripcionasiento;
	}

	public function cargarDescripcioncuenta_pagarFK($idcuenta_pagar,$connexion=null){
		$cuenta_pagarLogic= new cuenta_pagar_logic();
		$cuenta_pagarLogic->setConnexion($connexion);
		$cuenta_pagarLogic->getcuenta_pagarDataAccess()->isForFKData=true;
		$strDescripcioncuenta_pagar='';

		if($idcuenta_pagar!=null && $idcuenta_pagar!='' && $idcuenta_pagar!='null') {
			if($connexion!=null) {
				$cuenta_pagarLogic->getEntity($idcuenta_pagar);//WithConnection
			} else {
				$cuenta_pagarLogic->getEntityWithConnection($idcuenta_pagar);//
			}

			$strDescripcioncuenta_pagar=cuenta_corriente_detalle_util::getcuenta_pagarDescripcion($cuenta_pagarLogic->getcuenta_pagar());

		} else {
			$strDescripcioncuenta_pagar='null';
		}

		return $strDescripcioncuenta_pagar;
	}

	public function cargarDescripcioncuenta_cobrarFK($idcuenta_cobrar,$connexion=null){
		$cuenta_cobrarLogic= new cuenta_cobrar_logic();
		$cuenta_cobrarLogic->setConnexion($connexion);
		$cuenta_cobrarLogic->getcuenta_cobrarDataAccess()->isForFKData=true;
		$strDescripcioncuenta_cobrar='';

		if($idcuenta_cobrar!=null && $idcuenta_cobrar!='' && $idcuenta_cobrar!='null') {
			if($connexion!=null) {
				$cuenta_cobrarLogic->getEntity($idcuenta_cobrar);//WithConnection
			} else {
				$cuenta_cobrarLogic->getEntityWithConnection($idcuenta_cobrar);//
			}

			$strDescripcioncuenta_cobrar=cuenta_corriente_detalle_util::getcuenta_cobrarDescripcion($cuenta_cobrarLogic->getcuenta_cobrar());

		} else {
			$strDescripcioncuenta_cobrar='null';
		}

		return $strDescripcioncuenta_cobrar;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(cuenta_corriente_detalle $cuenta_corriente_detalleClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$cuenta_corriente_detalleClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
				$cuenta_corriente_detalleClase->setid_ejercicio($this->parametroGeneralUsuarioActual->getid_ejercicio());
				$cuenta_corriente_detalleClase->setid_periodo($this->parametroGeneralUsuarioActual->getid_periodo());
				$cuenta_corriente_detalleClase->setid_usuario($this->usuarioActual->getId());
			
			
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

		$this->strVisibleFK_Idasiento=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Iddocumento_cuenta_pagar=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idtabla=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionempresa;
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

		$this->strVisibleFK_Idasiento=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Iddocumento_cuenta_pagar=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idejercicio=$strParaVisibleejercicio;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idtabla=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionejercicio;
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

		$this->strVisibleFK_Idasiento=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Iddocumento_cuenta_pagar=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idperiodo=$strParaVisibleperiodo;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idtabla=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionperiodo;
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

		$this->strVisibleFK_Idasiento=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Iddocumento_cuenta_pagar=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idtabla=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idusuario=$strParaVisibleusuario;
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

		$this->strVisibleFK_Idasiento=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisiblecuenta_corriente;
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Iddocumento_cuenta_pagar=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idtabla=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacioncuenta_corriente;
	}

	public function setVisibleBusquedasParacliente($isParacliente){
		$strParaVisiblecliente='display:table-row';
		$strParaVisibleNegacioncliente='display:none';

		if($isParacliente) {
			$strParaVisiblecliente='display:table-row';
			$strParaVisibleNegacioncliente='display:none';
		} else {
			$strParaVisiblecliente='display:none';
			$strParaVisibleNegacioncliente='display:table-row';
		}


		$strParaVisibleNegacioncliente=trim($strParaVisibleNegacioncliente);

		$this->strVisibleFK_Idasiento=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idcliente=$strParaVisiblecliente;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Iddocumento_cuenta_pagar=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idtabla=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacioncliente;
	}

	public function setVisibleBusquedasParaproveedor($isParaproveedor){
		$strParaVisibleproveedor='display:table-row';
		$strParaVisibleNegacionproveedor='display:none';

		if($isParaproveedor) {
			$strParaVisibleproveedor='display:table-row';
			$strParaVisibleNegacionproveedor='display:none';
		} else {
			$strParaVisibleproveedor='display:none';
			$strParaVisibleNegacionproveedor='display:table-row';
		}


		$strParaVisibleNegacionproveedor=trim($strParaVisibleNegacionproveedor);

		$this->strVisibleFK_Idasiento=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Iddocumento_cuenta_pagar=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idproveedor=$strParaVisibleproveedor;
		$this->strVisibleFK_Idtabla=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionproveedor;
	}

	public function setVisibleBusquedasParatabla($isParatabla){
		$strParaVisibletabla='display:table-row';
		$strParaVisibleNegaciontabla='display:none';

		if($isParatabla) {
			$strParaVisibletabla='display:table-row';
			$strParaVisibleNegaciontabla='display:none';
		} else {
			$strParaVisibletabla='display:none';
			$strParaVisibleNegaciontabla='display:table-row';
		}


		$strParaVisibleNegaciontabla=trim($strParaVisibleNegaciontabla);

		$this->strVisibleFK_Idasiento=$strParaVisibleNegaciontabla;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegaciontabla;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegaciontabla;
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegaciontabla;
		$this->strVisibleFK_Iddocumento_cuenta_pagar=$strParaVisibleNegaciontabla;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegaciontabla;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontabla;
		$this->strVisibleFK_Idestado=$strParaVisibleNegaciontabla;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegaciontabla;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegaciontabla;
		$this->strVisibleFK_Idtabla=$strParaVisibletabla;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegaciontabla;
	}

	public function setVisibleBusquedasParaestado($isParaestado){
		$strParaVisibleestado='display:table-row';
		$strParaVisibleNegacionestado='display:none';

		if($isParaestado) {
			$strParaVisibleestado='display:table-row';
			$strParaVisibleNegacionestado='display:none';
		} else {
			$strParaVisibleestado='display:none';
			$strParaVisibleNegacionestado='display:table-row';
		}


		$strParaVisibleNegacionestado=trim($strParaVisibleNegacionestado);

		$this->strVisibleFK_Idasiento=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Iddocumento_cuenta_pagar=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idestado=$strParaVisibleestado;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idtabla=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionestado;
	}

	public function setVisibleBusquedasParaasiento($isParaasiento){
		$strParaVisibleasiento='display:table-row';
		$strParaVisibleNegacionasiento='display:none';

		if($isParaasiento) {
			$strParaVisibleasiento='display:table-row';
			$strParaVisibleNegacionasiento='display:none';
		} else {
			$strParaVisibleasiento='display:none';
			$strParaVisibleNegacionasiento='display:table-row';
		}


		$strParaVisibleNegacionasiento=trim($strParaVisibleNegacionasiento);

		$this->strVisibleFK_Idasiento=$strParaVisibleasiento;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionasiento;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionasiento;
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegacionasiento;
		$this->strVisibleFK_Iddocumento_cuenta_pagar=$strParaVisibleNegacionasiento;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionasiento;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionasiento;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionasiento;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionasiento;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionasiento;
		$this->strVisibleFK_Idtabla=$strParaVisibleNegacionasiento;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionasiento;
	}

	public function setVisibleBusquedasParacuenta_pagar($isParacuenta_pagar){
		$strParaVisiblecuenta_pagar='display:table-row';
		$strParaVisibleNegacioncuenta_pagar='display:none';

		if($isParacuenta_pagar) {
			$strParaVisiblecuenta_pagar='display:table-row';
			$strParaVisibleNegacioncuenta_pagar='display:none';
		} else {
			$strParaVisiblecuenta_pagar='display:none';
			$strParaVisibleNegacioncuenta_pagar='display:table-row';
		}


		$strParaVisibleNegacioncuenta_pagar=trim($strParaVisibleNegacioncuenta_pagar);

		$this->strVisibleFK_Idasiento=$strParaVisibleNegacioncuenta_pagar;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacioncuenta_pagar;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacioncuenta_pagar;
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegacioncuenta_pagar;
		$this->strVisibleFK_Iddocumento_cuenta_pagar=$strParaVisiblecuenta_pagar;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacioncuenta_pagar;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncuenta_pagar;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacioncuenta_pagar;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacioncuenta_pagar;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacioncuenta_pagar;
		$this->strVisibleFK_Idtabla=$strParaVisibleNegacioncuenta_pagar;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacioncuenta_pagar;
	}

	public function setVisibleBusquedasParacuenta_cobrar($isParacuenta_cobrar){
		$strParaVisiblecuenta_cobrar='display:table-row';
		$strParaVisibleNegacioncuenta_cobrar='display:none';

		if($isParacuenta_cobrar) {
			$strParaVisiblecuenta_cobrar='display:table-row';
			$strParaVisibleNegacioncuenta_cobrar='display:none';
		} else {
			$strParaVisiblecuenta_cobrar='display:none';
			$strParaVisibleNegacioncuenta_cobrar='display:table-row';
		}


		$strParaVisibleNegacioncuenta_cobrar=trim($strParaVisibleNegacioncuenta_cobrar);

		$this->strVisibleFK_Idasiento=$strParaVisibleNegacioncuenta_cobrar;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacioncuenta_cobrar;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacioncuenta_cobrar;
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisiblecuenta_cobrar;
		$this->strVisibleFK_Iddocumento_cuenta_pagar=$strParaVisibleNegacioncuenta_cobrar;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacioncuenta_cobrar;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncuenta_cobrar;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacioncuenta_cobrar;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacioncuenta_cobrar;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacioncuenta_cobrar;
		$this->strVisibleFK_Idtabla=$strParaVisibleNegacioncuenta_cobrar;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacioncuenta_cobrar;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idcuenta_corriente_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_corriente_detalleActual=$idcuenta_corriente_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_corriente_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaejercicio() {//$idcuenta_corriente_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_corriente_detalleActual=$idcuenta_corriente_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.ejercicio_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',ejercicio_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ejercicio_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_corriente_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaperiodo() {//$idcuenta_corriente_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_corriente_detalleActual=$idcuenta_corriente_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.periodo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',periodo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(periodo_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_corriente_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParausuario() {//$idcuenta_corriente_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_corriente_detalleActual=$idcuenta_corriente_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.usuario_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_corriente_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta_corriente() {//$idcuenta_corriente_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_corriente_detalleActual=$idcuenta_corriente_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_corriente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_corriente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_corriente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_corriente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_corriente_util::$STR_CLASS_NAME,'cuentascorrientes','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_corriente_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacliente() {//$idcuenta_corriente_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_corriente_detalleActual=$idcuenta_corriente_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cliente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cliente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cliente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cliente_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_corriente_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaproveedor() {//$idcuenta_corriente_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_corriente_detalleActual=$idcuenta_corriente_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.proveedor_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_proveedor(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_proveedor(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(proveedor_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_corriente_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatabla() {//$idcuenta_corriente_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_corriente_detalleActual=$idcuenta_corriente_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.tabla_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tabla(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',tabla_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tabla(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tabla_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_corriente_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaestado() {//$idcuenta_corriente_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_corriente_detalleActual=$idcuenta_corriente_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.estado_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',estado_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(estado_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_corriente_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaasiento() {//$idcuenta_corriente_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_corriente_detalleActual=$idcuenta_corriente_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.asiento_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_asiento(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',asiento_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_asiento(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_corriente_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta_pagar() {//$idcuenta_corriente_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_corriente_detalleActual=$idcuenta_corriente_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_pagar_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_pagar(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_pagar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_pagar(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_pagar_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_corriente_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta_cobrar() {//$idcuenta_corriente_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_corriente_detalleActual=$idcuenta_corriente_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_cobrar_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_cobrar(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_cobrar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_corriente_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_cobrar(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_cobrar_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_corriente_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParaclasificacion_cheques(int $idcuenta_corriente_detalleActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuenta_corriente_detalleActual=$idcuenta_corriente_detalleActual;

		$bitPaginaPopupclasificacion_cheque=false;

		try {

			$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));

			if($cuenta_corriente_detalle_session==null) {
				$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
			}

			$clasificacion_cheque_session=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME));

			if($clasificacion_cheque_session==null) {
				$clasificacion_cheque_session=new clasificacion_cheque_session();
			}

			$clasificacion_cheque_session->strUltimaBusqueda='FK_Idcuenta_corriente_detalle';
			$clasificacion_cheque_session->strPathNavegacionActual=$cuenta_corriente_detalle_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.clasificacion_cheque_util::$STR_CLASS_WEB_TITULO;
			$clasificacion_cheque_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupclasificacion_cheque=$clasificacion_cheque_session->bitPaginaPopup;
			$clasificacion_cheque_session->setPaginaPopupVariables(true);
			$bitPaginaPopupclasificacion_cheque=$clasificacion_cheque_session->bitPaginaPopup;
			$clasificacion_cheque_session->bitPermiteNavegacionHaciaFKDesde=false;
			$clasificacion_cheque_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_corriente_detalle_util::$STR_NOMBRE_OPCION;
			$clasificacion_cheque_session->bitBusquedaDesdeFKSesioncuenta_corriente_detalle=true;
			$clasificacion_cheque_session->bigidcuenta_corriente_detalleActual=$this->idcuenta_corriente_detalleActual;

			$cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_corriente_detalle_session->bigIdActualFK=$this->idcuenta_corriente_detalleActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"clasificacion_cheque"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_corriente_detalle_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"clasificacion_cheque"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_corriente_detalle_util::$STR_SESSION_NAME,serialize($cuenta_corriente_detalle_session));
			$this->Session->write(clasificacion_cheque_util::$STR_SESSION_NAME,serialize($clasificacion_cheque_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupclasificacion_cheque!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',clasificacion_cheque_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(clasificacion_cheque_util::$STR_CLASS_NAME,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliarcuenta_corriente_detalle,$this->strTipoUsuarioAuxiliarcuenta_corriente_detalle,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',clasificacion_cheque_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(clasificacion_cheque_util::$STR_CLASS_NAME,'cuentascorrientes','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta_corriente_detalle,$this->strTipoUsuarioAuxiliarcuenta_corriente_detalle,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(cuenta_corriente_detalle_util::$STR_SESSION_NAME,cuenta_corriente_detalle_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$cuenta_corriente_detalle_session=$this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME);
				
		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();		
			//$this->Session->write('cuenta_corriente_detalle_session',$cuenta_corriente_detalle_session);							
		}
		*/
		
		$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
    	$cuenta_corriente_detalle_session->strPathNavegacionActual=cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO;
    	$cuenta_corriente_detalle_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(cuenta_corriente_detalle_util::$STR_SESSION_NAME,serialize($cuenta_corriente_detalle_session));		
	}	
	
	public function getSetBusquedasSesionConfig(cuenta_corriente_detalle_session $cuenta_corriente_detalle_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionFK!=null && $cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionFK==true) {
			if($cuenta_corriente_detalle_session->bigIdActualFK!=null && $cuenta_corriente_detalle_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$cuenta_corriente_detalle_session->bigIdActualFKParaPosibleAtras=$cuenta_corriente_detalle_session->bigIdActualFK;*/
			}
				
			$cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(cuenta_corriente_detalle_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionempresa!=null && $cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($cuenta_corriente_detalle_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_corriente_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_corriente_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_corriente_detalle_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($cuenta_corriente_detalle_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_corriente_detalle_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;

				if($cuenta_corriente_detalle_session->intNumeroPaginacion==cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_corriente_detalle_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionejercicio!=null && $cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionejercicio==true)
			{
				if($cuenta_corriente_detalle_session->bigidejercicioActual!=0) {
					$this->strAccionBusqueda='FK_Idejercicio';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_corriente_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_corriente_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_corriente_detalle_session->bigidejercicioActualDescripcion);
						$historyWeb->setIdActual($cuenta_corriente_detalle_session->bigidejercicioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_corriente_detalle_session->bigidejercicioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionejercicio=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;

				if($cuenta_corriente_detalle_session->intNumeroPaginacion==cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_corriente_detalle_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionperiodo!=null && $cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionperiodo==true)
			{
				if($cuenta_corriente_detalle_session->bigidperiodoActual!=0) {
					$this->strAccionBusqueda='FK_Idperiodo';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_corriente_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_corriente_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_corriente_detalle_session->bigidperiodoActualDescripcion);
						$historyWeb->setIdActual($cuenta_corriente_detalle_session->bigidperiodoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_corriente_detalle_session->bigidperiodoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionperiodo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;

				if($cuenta_corriente_detalle_session->intNumeroPaginacion==cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_corriente_detalle_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionusuario!=null && $cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionusuario==true)
			{
				if($cuenta_corriente_detalle_session->bigidusuarioActual!=0) {
					$this->strAccionBusqueda='FK_Idusuario';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_corriente_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_corriente_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_corriente_detalle_session->bigidusuarioActualDescripcion);
						$historyWeb->setIdActual($cuenta_corriente_detalle_session->bigidusuarioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_corriente_detalle_session->bigidusuarioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionusuario=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;

				if($cuenta_corriente_detalle_session->intNumeroPaginacion==cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_corriente_detalle_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncuenta_corriente!=null && $cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncuenta_corriente==true)
			{
				if($cuenta_corriente_detalle_session->bigidcuenta_corrienteActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta_corriente';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_corriente_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_corriente_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_corriente_detalle_session->bigidcuenta_corrienteActualDescripcion);
						$historyWeb->setIdActual($cuenta_corriente_detalle_session->bigidcuenta_corrienteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_corriente_detalle_session->bigidcuenta_corrienteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncuenta_corriente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;

				if($cuenta_corriente_detalle_session->intNumeroPaginacion==cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_corriente_detalle_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncliente!=null && $cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncliente==true)
			{
				if($cuenta_corriente_detalle_session->bigidclienteActual!=0) {
					$this->strAccionBusqueda='FK_Idcliente';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_corriente_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_corriente_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_corriente_detalle_session->bigidclienteActualDescripcion);
						$historyWeb->setIdActual($cuenta_corriente_detalle_session->bigidclienteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_corriente_detalle_session->bigidclienteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncliente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;

				if($cuenta_corriente_detalle_session->intNumeroPaginacion==cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_corriente_detalle_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionproveedor!=null && $cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionproveedor==true)
			{
				if($cuenta_corriente_detalle_session->bigidproveedorActual!=0) {
					$this->strAccionBusqueda='FK_Idproveedor';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_corriente_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_corriente_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_corriente_detalle_session->bigidproveedorActualDescripcion);
						$historyWeb->setIdActual($cuenta_corriente_detalle_session->bigidproveedorActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_corriente_detalle_session->bigidproveedorActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionproveedor=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;

				if($cuenta_corriente_detalle_session->intNumeroPaginacion==cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_corriente_detalle_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesiontabla!=null && $cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesiontabla==true)
			{
				if($cuenta_corriente_detalle_session->bigidtablaActual!=0) {
					$this->strAccionBusqueda='FK_Idtabla';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_corriente_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_corriente_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_corriente_detalle_session->bigidtablaActualDescripcion);
						$historyWeb->setIdActual($cuenta_corriente_detalle_session->bigidtablaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_corriente_detalle_session->bigidtablaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesiontabla=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;

				if($cuenta_corriente_detalle_session->intNumeroPaginacion==cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_corriente_detalle_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionestado!=null && $cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionestado==true)
			{
				if($cuenta_corriente_detalle_session->bigidestadoActual!=0) {
					$this->strAccionBusqueda='FK_Idestado';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_corriente_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_corriente_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_corriente_detalle_session->bigidestadoActualDescripcion);
						$historyWeb->setIdActual($cuenta_corriente_detalle_session->bigidestadoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_corriente_detalle_session->bigidestadoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionestado=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;

				if($cuenta_corriente_detalle_session->intNumeroPaginacion==cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_corriente_detalle_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionasiento!=null && $cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionasiento==true)
			{
				if($cuenta_corriente_detalle_session->bigidasientoActual!=0) {
					$this->strAccionBusqueda='FK_Idasiento';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_corriente_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_corriente_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_corriente_detalle_session->bigidasientoActualDescripcion);
						$historyWeb->setIdActual($cuenta_corriente_detalle_session->bigidasientoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_corriente_detalle_session->bigidasientoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesionasiento=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;

				if($cuenta_corriente_detalle_session->intNumeroPaginacion==cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_corriente_detalle_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncuenta_pagar!=null && $cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncuenta_pagar==true)
			{
				if($cuenta_corriente_detalle_session->bigidcuenta_pagarActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta_pagar';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_corriente_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_corriente_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_corriente_detalle_session->bigidcuenta_pagarActualDescripcion);
						$historyWeb->setIdActual($cuenta_corriente_detalle_session->bigidcuenta_pagarActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_corriente_detalle_session->bigidcuenta_pagarActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncuenta_pagar=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;

				if($cuenta_corriente_detalle_session->intNumeroPaginacion==cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_corriente_detalle_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncuenta_cobrar!=null && $cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncuenta_cobrar==true)
			{
				if($cuenta_corriente_detalle_session->bigidcuenta_cobrarActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta_cobrar';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_corriente_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_corriente_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_corriente_detalle_session->bigidcuenta_cobrarActualDescripcion);
						$historyWeb->setIdActual($cuenta_corriente_detalle_session->bigidcuenta_cobrarActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_corriente_detalle_session->bigidcuenta_cobrarActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_corriente_detalle_session->bitBusquedaDesdeFKSesioncuenta_cobrar=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;

				if($cuenta_corriente_detalle_session->intNumeroPaginacion==cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_corriente_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_corriente_detalle_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$cuenta_corriente_detalle_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));
		
		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		$cuenta_corriente_detalle_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$cuenta_corriente_detalle_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cuenta_corriente_detalle_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idasiento') {
			$cuenta_corriente_detalle_session->id_asiento=$this->id_asientoFK_Idasiento;	

		}
		else if($this->strAccionBusqueda=='FK_Idcliente') {
			$cuenta_corriente_detalle_session->id_cliente=$this->id_clienteFK_Idcliente;	

		}
		else if($this->strAccionBusqueda=='FK_Idcuenta_corriente') {
			$cuenta_corriente_detalle_session->id_cuenta_corriente=$this->id_cuenta_corrienteFK_Idcuenta_corriente;	

		}
		else if($this->strAccionBusqueda=='FK_Iddocumento_cuenta_cobrar') {
			$cuenta_corriente_detalle_session->id_cuenta_cobrar=$this->id_cuenta_cobrarFK_Iddocumento_cuenta_cobrar;	

		}
		else if($this->strAccionBusqueda=='FK_Iddocumento_cuenta_pagar') {
			$cuenta_corriente_detalle_session->id_cuenta_pagar=$this->id_cuenta_pagarFK_Iddocumento_cuenta_pagar;	

		}
		else if($this->strAccionBusqueda=='FK_Idejercicio') {
			$cuenta_corriente_detalle_session->id_ejercicio=$this->id_ejercicioFK_Idejercicio;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$cuenta_corriente_detalle_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idestado') {
			$cuenta_corriente_detalle_session->id_estado=$this->id_estadoFK_Idestado;	

		}
		else if($this->strAccionBusqueda=='FK_Idperiodo') {
			$cuenta_corriente_detalle_session->id_periodo=$this->id_periodoFK_Idperiodo;	

		}
		else if($this->strAccionBusqueda=='FK_Idproveedor') {
			$cuenta_corriente_detalle_session->id_proveedor=$this->id_proveedorFK_Idproveedor;	

		}
		else if($this->strAccionBusqueda=='FK_Idtabla') {
			$cuenta_corriente_detalle_session->id_tabla=$this->id_tablaFK_Idtabla;	

		}
		else if($this->strAccionBusqueda=='FK_Idusuario') {
			$cuenta_corriente_detalle_session->id_usuario=$this->id_usuarioFK_Idusuario;	

		}
		
		$this->Session->write(cuenta_corriente_detalle_util::$STR_SESSION_NAME,serialize($cuenta_corriente_detalle_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(cuenta_corriente_detalle_session $cuenta_corriente_detalle_session) {
		
		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));
		}
		
		if($cuenta_corriente_detalle_session==null) {
		   $cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		if($cuenta_corriente_detalle_session->strUltimaBusqueda!=null && $cuenta_corriente_detalle_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$cuenta_corriente_detalle_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$cuenta_corriente_detalle_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$cuenta_corriente_detalle_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idasiento') {
				$this->id_asientoFK_Idasiento=$cuenta_corriente_detalle_session->id_asiento;
				$cuenta_corriente_detalle_session->id_asiento=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idcliente') {
				$this->id_clienteFK_Idcliente=$cuenta_corriente_detalle_session->id_cliente;
				$cuenta_corriente_detalle_session->id_cliente=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idcuenta_corriente') {
				$this->id_cuenta_corrienteFK_Idcuenta_corriente=$cuenta_corriente_detalle_session->id_cuenta_corriente;
				$cuenta_corriente_detalle_session->id_cuenta_corriente=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Iddocumento_cuenta_cobrar') {
				$this->id_cuenta_cobrarFK_Iddocumento_cuenta_cobrar=$cuenta_corriente_detalle_session->id_cuenta_cobrar;
				$cuenta_corriente_detalle_session->id_cuenta_cobrar=null;

			}
			 else if($this->strAccionBusqueda=='FK_Iddocumento_cuenta_pagar') {
				$this->id_cuenta_pagarFK_Iddocumento_cuenta_pagar=$cuenta_corriente_detalle_session->id_cuenta_pagar;
				$cuenta_corriente_detalle_session->id_cuenta_pagar=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idejercicio') {
				$this->id_ejercicioFK_Idejercicio=$cuenta_corriente_detalle_session->id_ejercicio;
				$cuenta_corriente_detalle_session->id_ejercicio=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$cuenta_corriente_detalle_session->id_empresa;
				$cuenta_corriente_detalle_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idestado') {
				$this->id_estadoFK_Idestado=$cuenta_corriente_detalle_session->id_estado;
				$cuenta_corriente_detalle_session->id_estado=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idperiodo') {
				$this->id_periodoFK_Idperiodo=$cuenta_corriente_detalle_session->id_periodo;
				$cuenta_corriente_detalle_session->id_periodo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idproveedor') {
				$this->id_proveedorFK_Idproveedor=$cuenta_corriente_detalle_session->id_proveedor;
				$cuenta_corriente_detalle_session->id_proveedor=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idtabla') {
				$this->id_tablaFK_Idtabla=$cuenta_corriente_detalle_session->id_tabla;
				$cuenta_corriente_detalle_session->id_tabla=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idusuario') {
				$this->id_usuarioFK_Idusuario=$cuenta_corriente_detalle_session->id_usuario;
				$cuenta_corriente_detalle_session->id_usuario=-1;

			}
		}
		
		$cuenta_corriente_detalle_session->strUltimaBusqueda='';
		//$cuenta_corriente_detalle_session->intNumeroPaginacion=10;
		$cuenta_corriente_detalle_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(cuenta_corriente_detalle_util::$STR_SESSION_NAME,serialize($cuenta_corriente_detalle_session));		
	}
	
	public function cuenta_corriente_detallesControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idejercicioDefaultFK = 0;
		$this->idperiodoDefaultFK = 0;
		$this->idusuarioDefaultFK = 0;
		$this->idcuenta_corrienteDefaultFK = 0;
		$this->idclienteDefaultFK = 0;
		$this->idproveedorDefaultFK = 0;
		$this->idtablaDefaultFK = 0;
		$this->idestadoDefaultFK = 0;
		$this->idasientoDefaultFK = 0;
		$this->idcuenta_pagarDefaultFK = 0;
		$this->idcuenta_cobrarDefaultFK = 0;
	}
	
	public function setcuenta_corriente_detalleFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_ejercicio',$this->idejercicioDefaultFK);
		$this->setExistDataCampoForm('form','id_periodo',$this->idperiodoDefaultFK);
		$this->setExistDataCampoForm('form','id_usuario',$this->idusuarioDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta_corriente',$this->idcuenta_corrienteDefaultFK);
		$this->setExistDataCampoForm('form','id_cliente',$this->idclienteDefaultFK);
		$this->setExistDataCampoForm('form','id_proveedor',$this->idproveedorDefaultFK);
		$this->setExistDataCampoForm('form','id_tabla',$this->idtablaDefaultFK);
		$this->setExistDataCampoForm('form','id_estado',$this->idestadoDefaultFK);
		$this->setExistDataCampoForm('form','id_asiento',$this->idasientoDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta_pagar',$this->idcuenta_pagarDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta_cobrar',$this->idcuenta_cobrarDefaultFK);
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

		ejercicio::$class;
		ejercicio_carga::$CONTROLLER;

		periodo::$class;
		periodo_carga::$CONTROLLER;

		usuario::$class;
		usuario_carga::$CONTROLLER;

		cuenta_corriente::$class;
		cuenta_corriente_carga::$CONTROLLER;

		cliente::$class;
		cliente_carga::$CONTROLLER;

		proveedor::$class;
		proveedor_carga::$CONTROLLER;

		tabla::$class;
		tabla_carga::$CONTROLLER;

		estado::$class;
		estado_carga::$CONTROLLER;

		asiento::$class;
		asiento_carga::$CONTROLLER;

		cuenta_pagar::$class;
		cuenta_pagar_carga::$CONTROLLER;

		cuenta_cobrar::$class;
		cuenta_cobrar_carga::$CONTROLLER;
		
		//REL
		

		clasificacion_cheque_carga::$CONTROLLER;
		clasificacion_cheque_util::$STR_SCHEMA;
		clasificacion_cheque_session::class;
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
		interface cuenta_corriente_detalle_controlI {	
		
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
		
		public function onLoad(cuenta_corriente_detalle_session $cuenta_corriente_detalle_session=null);	
		function index(?string $strTypeOnLoadcuenta_corriente_detalle='',?string $strTipoPaginaAuxiliarcuenta_corriente_detalle='',?string $strTipoUsuarioAuxiliarcuenta_corriente_detalle='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadcuenta_corriente_detalle='',string $strTipoPaginaAuxiliarcuenta_corriente_detalle='',string $strTipoUsuarioAuxiliarcuenta_corriente_detalle='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($cuenta_corriente_detalleReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(cuenta_corriente_detalle $cuenta_corriente_detalleClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(cuenta_corriente_detalle_session $cuenta_corriente_detalle_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(cuenta_corriente_detalle_session $cuenta_corriente_detalle_session);	
		public function cuenta_corriente_detallesControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setcuenta_corriente_detalleFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
