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

namespace com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\entity\cheque_cuenta_corriente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/cheque_cuenta_corriente/util/cheque_cuenta_corriente_carga.php');
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_carga;

use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_param_return;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\logic\cheque_cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\logic\cheque_cuenta_corriente_logic_add;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\presentation\session\cheque_cuenta_corriente_session;


//FK


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

use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\entity\categoria_cheque;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\logic\categoria_cheque_logic;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\entity\beneficiario_ocacional_cheque;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\logic\beneficiario_ocacional_cheque_logic;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_util;

use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\entity\estado_deposito_retiro;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\logic\estado_deposito_retiro_logic;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\util\estado_deposito_retiro_carga;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\util\estado_deposito_retiro_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
cheque_cuenta_corriente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cheque_cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cheque_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cheque_cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cheque_cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/cuentascorrientes/cheque_cuenta_corriente/presentation/control/cheque_cuenta_corriente_init_control.php');
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\presentation\control\cheque_cuenta_corriente_init_control;

include_once('com/bydan/contabilidad/cuentascorrientes/cheque_cuenta_corriente/presentation/control/cheque_cuenta_corriente_base_control.php');
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\presentation\control\cheque_cuenta_corriente_base_control;

class cheque_cuenta_corriente_control extends cheque_cuenta_corriente_base_control {	
	
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
					
					
				if($this->data['cobrado']==null) {$this->data['cobrado']=false;} else {if($this->data['cobrado']=='on') {$this->data['cobrado']=true;}}
					
				if($this->data['impreso']==null) {$this->data['impreso']=false;} else {if($this->data['impreso']=='on') {$this->data['impreso']=true;}}
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
			
			
			else if($action=="FK_Idbeneficiario_ocacional"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idbeneficiario_ocacionalParaProcesar();
			}
			else if($action=="FK_Idcategoria_cheque"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcategoria_chequeParaProcesar();
			}
			else if($action=="FK_Idcliente"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdclienteParaProcesar();
			}
			else if($action=="FK_Idcuenta_corriente"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcuenta_corrienteParaProcesar();
			}
			else if($action=="FK_Idejercicio"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdejercicioParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idestado_deposito_retiro"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idestado_deposito_retiroParaProcesar();
			}
			else if($action=="FK_Idperiodo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdperiodoParaProcesar();
			}
			else if($action=="FK_Idproveedor"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdproveedorParaProcesar();
			}
			else if($action=="FK_Idsucursal"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdsucursalParaProcesar();
			}
			else if($action=="FK_Idusuario"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdusuarioParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcheque_cuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idcheque_cuenta_corrienteActual
			}
			else if($action=='abrirBusquedaParasucursal') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcheque_cuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParasucursal();//$idcheque_cuenta_corrienteActual
			}
			else if($action=='abrirBusquedaParaejercicio') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcheque_cuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParaejercicio();//$idcheque_cuenta_corrienteActual
			}
			else if($action=='abrirBusquedaParaperiodo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcheque_cuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParaperiodo();//$idcheque_cuenta_corrienteActual
			}
			else if($action=='abrirBusquedaParausuario') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcheque_cuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParausuario();//$idcheque_cuenta_corrienteActual
			}
			else if($action=='abrirBusquedaParacuenta_corriente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcheque_cuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParacuenta_corriente();//$idcheque_cuenta_corrienteActual
			}
			else if($action=='abrirBusquedaParacategoria_cheque') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcheque_cuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParacategoria_cheque();//$idcheque_cuenta_corrienteActual
			}
			else if($action=='abrirBusquedaParacliente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcheque_cuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParacliente();//$idcheque_cuenta_corrienteActual
			}
			else if($action=='abrirBusquedaParaproveedor') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcheque_cuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParaproveedor();//$idcheque_cuenta_corrienteActual
			}
			else if($action=='abrirBusquedaParabeneficiario_ocacional_cheque') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcheque_cuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParabeneficiario_ocacional_cheque();//$idcheque_cuenta_corrienteActual
			}
			else if($action=='abrirBusquedaParaestado_deposito_retiro') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcheque_cuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParaestado_deposito_retiro();//$idcheque_cuenta_corrienteActual
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
					
					$cheque_cuenta_corrienteController = new cheque_cuenta_corriente_control();
					
					$cheque_cuenta_corrienteController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($cheque_cuenta_corrienteController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$cheque_cuenta_corrienteController = new cheque_cuenta_corriente_control();
						$cheque_cuenta_corrienteController = $this;
						
						$jsonResponse = json_encode($cheque_cuenta_corrienteController->cheque_cuenta_corrientes);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->cheque_cuenta_corrienteReturnGeneral==null) {
					$this->cheque_cuenta_corrienteReturnGeneral=new cheque_cuenta_corriente_param_return();
				}
				
				echo($this->cheque_cuenta_corrienteReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$cheque_cuenta_corrienteController=new cheque_cuenta_corriente_control();
		
		$cheque_cuenta_corrienteController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$cheque_cuenta_corrienteController->usuarioActual=new usuario();
		
		$cheque_cuenta_corrienteController->usuarioActual->setId($this->usuarioActual->getId());
		$cheque_cuenta_corrienteController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$cheque_cuenta_corrienteController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$cheque_cuenta_corrienteController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$cheque_cuenta_corrienteController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$cheque_cuenta_corrienteController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$cheque_cuenta_corrienteController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$cheque_cuenta_corrienteController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $cheque_cuenta_corrienteController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadcheque_cuenta_corriente= $this->getDataGeneralString('strTypeOnLoadcheque_cuenta_corriente');
		$strTipoPaginaAuxiliarcheque_cuenta_corriente= $this->getDataGeneralString('strTipoPaginaAuxiliarcheque_cuenta_corriente');
		$strTipoUsuarioAuxiliarcheque_cuenta_corriente= $this->getDataGeneralString('strTipoUsuarioAuxiliarcheque_cuenta_corriente');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadcheque_cuenta_corriente,$strTipoPaginaAuxiliarcheque_cuenta_corriente,$strTipoUsuarioAuxiliarcheque_cuenta_corriente,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadcheque_cuenta_corriente!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('cheque_cuenta_corriente','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cheque_cuenta_corriente_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliarcheque_cuenta_corriente,$this->strTipoUsuarioAuxiliarcheque_cuenta_corriente,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cheque_cuenta_corriente_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliarcheque_cuenta_corriente,$this->strTipoUsuarioAuxiliarcheque_cuenta_corriente,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->cheque_cuenta_corrienteReturnGeneral=new cheque_cuenta_corriente_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cheque_cuenta_corrienteReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cheque_cuenta_corrienteReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cheque_cuenta_corrienteReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cheque_cuenta_corrienteReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cheque_cuenta_corrienteReturnGeneral);
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
		$this->cheque_cuenta_corrienteReturnGeneral=new cheque_cuenta_corriente_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cheque_cuenta_corrienteReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cheque_cuenta_corrienteReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cheque_cuenta_corrienteReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cheque_cuenta_corrienteReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cheque_cuenta_corrienteReturnGeneral);
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
		$this->cheque_cuenta_corrienteReturnGeneral=new cheque_cuenta_corriente_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cheque_cuenta_corrienteReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cheque_cuenta_corrienteReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cheque_cuenta_corrienteReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cheque_cuenta_corrienteReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cheque_cuenta_corrienteReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
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
			
			
			$this->cheque_cuenta_corrienteReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->cheque_cuenta_corrienteReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cheque_cuenta_corrienteReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->cheque_cuenta_corrienteReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->cheque_cuenta_corrienteReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cheque_cuenta_corrienteReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->cheque_cuenta_corrienteReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->cheque_cuenta_corrienteReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->cheque_cuenta_corrienteReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cheque_cuenta_corrienteReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->cheque_cuenta_corrienteReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cheque_cuenta_corrienteReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->cheque_cuenta_corrienteReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->cheque_cuenta_corrienteReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->cheque_cuenta_corrienteReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cheque_cuenta_corrienteReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->cheque_cuenta_corrienteReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cheque_cuenta_corrienteReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
		
		$this->cheque_cuenta_corrienteLogic=new cheque_cuenta_corriente_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->cheque_cuenta_corriente=new cheque_cuenta_corriente();
		
		$this->strTypeOnLoadcheque_cuenta_corriente='onload';
		$this->strTipoPaginaAuxiliarcheque_cuenta_corriente='none';
		$this->strTipoUsuarioAuxiliarcheque_cuenta_corriente='none';	

		$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
		
		$this->cheque_cuenta_corrienteModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cheque_cuenta_corrienteControllerAdditional=new cheque_cuenta_corriente_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(cheque_cuenta_corriente_session $cheque_cuenta_corriente_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($cheque_cuenta_corriente_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadcheque_cuenta_corriente='',?string $strTipoPaginaAuxiliarcheque_cuenta_corriente='',?string $strTipoUsuarioAuxiliarcheque_cuenta_corriente='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadcheque_cuenta_corriente=$strTypeOnLoadcheque_cuenta_corriente;
			$this->strTipoPaginaAuxiliarcheque_cuenta_corriente=$strTipoPaginaAuxiliarcheque_cuenta_corriente;
			$this->strTipoUsuarioAuxiliarcheque_cuenta_corriente=$strTipoUsuarioAuxiliarcheque_cuenta_corriente;
	
			if($strTipoUsuarioAuxiliarcheque_cuenta_corriente=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->cheque_cuenta_corriente=new cheque_cuenta_corriente();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Cheques';
			
			
			$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));
							
			if($cheque_cuenta_corriente_session==null) {
				$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
				
				/*$this->Session->write('cheque_cuenta_corriente_session',$cheque_cuenta_corriente_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($cheque_cuenta_corriente_session->strFuncionJsPadre!=null && $cheque_cuenta_corriente_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$cheque_cuenta_corriente_session->strFuncionJsPadre;
				
				$cheque_cuenta_corriente_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($cheque_cuenta_corriente_session);
			
			if($strTypeOnLoadcheque_cuenta_corriente!=null && $strTypeOnLoadcheque_cuenta_corriente=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$cheque_cuenta_corriente_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$cheque_cuenta_corriente_session->setPaginaPopupVariables(true);
				}
				
				if($cheque_cuenta_corriente_session->intNumeroPaginacion==cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cheque_cuenta_corriente_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,cheque_cuenta_corriente_util::$STR_SESSION_NAME,'cuentascorrientes');																
			
			} else if($strTypeOnLoadcheque_cuenta_corriente!=null && $strTypeOnLoadcheque_cuenta_corriente=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$cheque_cuenta_corriente_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;*/
				
				if($cheque_cuenta_corriente_session->intNumeroPaginacion==cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cheque_cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarcheque_cuenta_corriente!=null && $strTipoPaginaAuxiliarcheque_cuenta_corriente=='none') {
				/*$cheque_cuenta_corriente_session->strStyleDivHeader='display:table-row';*/
				
				/*$cheque_cuenta_corriente_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarcheque_cuenta_corriente!=null && $strTipoPaginaAuxiliarcheque_cuenta_corriente=='iframe') {
					/*
					$cheque_cuenta_corriente_session->strStyleDivArbol='display:none';
					$cheque_cuenta_corriente_session->strStyleDivHeader='display:none';
					$cheque_cuenta_corriente_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$cheque_cuenta_corriente_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->cheque_cuenta_corrienteClase=new cheque_cuenta_corriente();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=cheque_cuenta_corriente_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(cheque_cuenta_corriente_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->cheque_cuenta_corrienteLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->cheque_cuenta_corrienteLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->cheque_cuenta_corrienteLogic=new cheque_cuenta_corriente_logic();*/
			
			
			$this->cheque_cuenta_corrientesModel=null;
			/*new ListDataModel();*/
			
			/*$this->cheque_cuenta_corrientesModel.setWrappedData(cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes());*/
						
			$this->cheque_cuenta_corrientes= array();
			$this->cheque_cuenta_corrientesEliminados=array();
			$this->cheque_cuenta_corrientesSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= cheque_cuenta_corriente_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->cheque_cuenta_corriente= new cheque_cuenta_corriente();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idbeneficiario_ocacional='display:table-row';
			$this->strVisibleFK_Idcategoria_cheque='display:table-row';
			$this->strVisibleFK_Idcliente='display:table-row';
			$this->strVisibleFK_Idcuenta_corriente='display:table-row';
			$this->strVisibleFK_Idejercicio='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idestado_deposito_retiro='display:table-row';
			$this->strVisibleFK_Idperiodo='display:table-row';
			$this->strVisibleFK_Idproveedor='display:table-row';
			$this->strVisibleFK_Idsucursal='display:table-row';
			$this->strVisibleFK_Idusuario='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarcheque_cuenta_corriente!=null && $strTipoUsuarioAuxiliarcheque_cuenta_corriente!='none' && $strTipoUsuarioAuxiliarcheque_cuenta_corriente!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcheque_cuenta_corriente);
																
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
				if($strTipoUsuarioAuxiliarcheque_cuenta_corriente!=null && $strTipoUsuarioAuxiliarcheque_cuenta_corriente!='none' && $strTipoUsuarioAuxiliarcheque_cuenta_corriente!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcheque_cuenta_corriente);
																
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
				if($strTipoUsuarioAuxiliarcheque_cuenta_corriente==null || $strTipoUsuarioAuxiliarcheque_cuenta_corriente=='none' || $strTipoUsuarioAuxiliarcheque_cuenta_corriente=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarcheque_cuenta_corriente,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cheque_cuenta_corriente_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cheque_cuenta_corriente_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina cheque_cuenta_corriente');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($cheque_cuenta_corriente_session);
			
			$this->getSetBusquedasSesionConfig($cheque_cuenta_corriente_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportecheque_cuenta_corrientes($this->strAccionBusqueda,$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes());*/
				} else if($this->strGenerarReporte=='Html')	{
					$cheque_cuenta_corriente_session->strServletGenerarHtmlReporte='cheque_cuenta_corrienteServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(cheque_cuenta_corriente_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($cheque_cuenta_corriente_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarcheque_cuenta_corriente!=null && $strTipoUsuarioAuxiliarcheque_cuenta_corriente=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($cheque_cuenta_corriente_session);
			}
								
			$this->set(cheque_cuenta_corriente_util::$STR_SESSION_NAME, $cheque_cuenta_corriente_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($cheque_cuenta_corriente_session);
			
			/*
			$this->cheque_cuenta_corriente->recursive = 0;
			
			$this->cheque_cuenta_corrientes=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('cheque_cuenta_corrientes', $this->cheque_cuenta_corrientes);
			
			$this->set(cheque_cuenta_corriente_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->cheque_cuenta_corrienteActual =$this->cheque_cuenta_corrienteClase;
			
			/*$this->cheque_cuenta_corrienteActual =$this->migrarModelcheque_cuenta_corriente($this->cheque_cuenta_corrienteClase);*/
			
			$this->returnHtml(false);
			
			$this->set(cheque_cuenta_corriente_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=cheque_cuenta_corriente_util::$STR_NOMBRE_OPCION;
				
			if(cheque_cuenta_corriente_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=cheque_cuenta_corriente_util::$STR_MODULO_OPCION.cheque_cuenta_corriente_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(cheque_cuenta_corriente_util::$STR_SESSION_NAME,serialize($cheque_cuenta_corriente_session));
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
			/*$cheque_cuenta_corrienteClase= (cheque_cuenta_corriente) cheque_cuenta_corrientesModel.getRowData();*/
			
			$this->cheque_cuenta_corrienteClase->setId($this->cheque_cuenta_corriente->getId());	
			$this->cheque_cuenta_corrienteClase->setVersionRow($this->cheque_cuenta_corriente->getVersionRow());	
			$this->cheque_cuenta_corrienteClase->setVersionRow($this->cheque_cuenta_corriente->getVersionRow());	
			$this->cheque_cuenta_corrienteClase->setid_empresa($this->cheque_cuenta_corriente->getid_empresa());	
			$this->cheque_cuenta_corrienteClase->setid_sucursal($this->cheque_cuenta_corriente->getid_sucursal());	
			$this->cheque_cuenta_corrienteClase->setid_ejercicio($this->cheque_cuenta_corriente->getid_ejercicio());	
			$this->cheque_cuenta_corrienteClase->setid_periodo($this->cheque_cuenta_corriente->getid_periodo());	
			$this->cheque_cuenta_corrienteClase->setid_usuario($this->cheque_cuenta_corriente->getid_usuario());	
			$this->cheque_cuenta_corrienteClase->setid_cuenta_corriente($this->cheque_cuenta_corriente->getid_cuenta_corriente());	
			$this->cheque_cuenta_corrienteClase->setid_categoria_cheque($this->cheque_cuenta_corriente->getid_categoria_cheque());	
			$this->cheque_cuenta_corrienteClase->setid_cliente($this->cheque_cuenta_corriente->getid_cliente());	
			$this->cheque_cuenta_corrienteClase->setid_proveedor($this->cheque_cuenta_corriente->getid_proveedor());	
			$this->cheque_cuenta_corrienteClase->setid_beneficiario_ocacional_cheque($this->cheque_cuenta_corriente->getid_beneficiario_ocacional_cheque());	
			$this->cheque_cuenta_corrienteClase->setnumero_cheque($this->cheque_cuenta_corriente->getnumero_cheque());	
			$this->cheque_cuenta_corrienteClase->setfecha_emision($this->cheque_cuenta_corriente->getfecha_emision());	
			$this->cheque_cuenta_corrienteClase->setmonto($this->cheque_cuenta_corriente->getmonto());	
			$this->cheque_cuenta_corrienteClase->setmonto_texto($this->cheque_cuenta_corriente->getmonto_texto());	
			$this->cheque_cuenta_corrienteClase->setsaldo($this->cheque_cuenta_corriente->getsaldo());	
			$this->cheque_cuenta_corrienteClase->setdescripcion($this->cheque_cuenta_corriente->getdescripcion());	
			$this->cheque_cuenta_corrienteClase->setcobrado($this->cheque_cuenta_corriente->getcobrado());	
			$this->cheque_cuenta_corrienteClase->setimpreso($this->cheque_cuenta_corriente->getimpreso());	
			$this->cheque_cuenta_corrienteClase->setid_estado_deposito_retiro($this->cheque_cuenta_corriente->getid_estado_deposito_retiro());	
			$this->cheque_cuenta_corrienteClase->setdebito($this->cheque_cuenta_corriente->getdebito());	
			$this->cheque_cuenta_corrienteClase->setcredito($this->cheque_cuenta_corriente->getcredito());	
		
			/*$this->Session->write('cheque_cuenta_corrienteVersionRowActual', cheque_cuenta_corriente.getVersionRow());*/
			
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
			
			$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));
						
			if($cheque_cuenta_corriente_session==null) {
				$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('cheque_cuenta_corriente', $this->cheque_cuenta_corriente->read(null, $id));
	
			
			$this->cheque_cuenta_corriente->recursive = 0;
			
			$this->cheque_cuenta_corrientes=$this->paginate();
			
			$this->set('cheque_cuenta_corrientes', $this->cheque_cuenta_corrientes);
	
			if (empty($this->data)) {
				$this->data = $this->cheque_cuenta_corriente->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->cheque_cuenta_corrienteLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cheque_cuenta_corrienteClase);
			
			$this->cheque_cuenta_corrienteActual=$this->cheque_cuenta_corrienteClase;
			
			/*$this->cheque_cuenta_corrienteActual =$this->migrarModelcheque_cuenta_corriente($this->cheque_cuenta_corrienteClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes(),$this->cheque_cuenta_corrienteActual);
			
			$this->actualizarControllerConReturnGeneral($this->cheque_cuenta_corrienteReturnGeneral);
			
			//$this->cheque_cuenta_corrienteReturnGeneral=$this->cheque_cuenta_corrienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes(),$this->cheque_cuenta_corrienteActual,$this->cheque_cuenta_corrienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));
						
			if($cheque_cuenta_corriente_session==null) {
				$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevocheque_cuenta_corriente', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->cheque_cuenta_corrienteClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cheque_cuenta_corrienteClase);
			
			$this->cheque_cuenta_corrienteActual =$this->cheque_cuenta_corrienteClase;
			
			/*$this->cheque_cuenta_corrienteActual =$this->migrarModelcheque_cuenta_corriente($this->cheque_cuenta_corrienteClase);*/
			
			$this->setcheque_cuenta_corrienteFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes(),$this->cheque_cuenta_corriente);
			
			$this->actualizarControllerConReturnGeneral($this->cheque_cuenta_corrienteReturnGeneral);
			
			//this->cheque_cuenta_corrienteReturnGeneral=$this->cheque_cuenta_corrienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes(),$this->cheque_cuenta_corriente,$this->cheque_cuenta_corrienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->cheque_cuenta_corrienteReturnGeneral->getcheque_cuenta_corriente()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idsucursalDefaultFK!=null && $this->idsucursalDefaultFK > -1) {
				$this->cheque_cuenta_corrienteReturnGeneral->getcheque_cuenta_corriente()->setid_sucursal($this->idsucursalDefaultFK);
			}

			if($this->idejercicioDefaultFK!=null && $this->idejercicioDefaultFK > -1) {
				$this->cheque_cuenta_corrienteReturnGeneral->getcheque_cuenta_corriente()->setid_ejercicio($this->idejercicioDefaultFK);
			}

			if($this->idperiodoDefaultFK!=null && $this->idperiodoDefaultFK > -1) {
				$this->cheque_cuenta_corrienteReturnGeneral->getcheque_cuenta_corriente()->setid_periodo($this->idperiodoDefaultFK);
			}

			if($this->idusuarioDefaultFK!=null && $this->idusuarioDefaultFK > -1) {
				$this->cheque_cuenta_corrienteReturnGeneral->getcheque_cuenta_corriente()->setid_usuario($this->idusuarioDefaultFK);
			}

			if($this->idcuenta_corrienteDefaultFK!=null && $this->idcuenta_corrienteDefaultFK > -1) {
				$this->cheque_cuenta_corrienteReturnGeneral->getcheque_cuenta_corriente()->setid_cuenta_corriente($this->idcuenta_corrienteDefaultFK);
			}

			if($this->idcategoria_chequeDefaultFK!=null && $this->idcategoria_chequeDefaultFK > -1) {
				$this->cheque_cuenta_corrienteReturnGeneral->getcheque_cuenta_corriente()->setid_categoria_cheque($this->idcategoria_chequeDefaultFK);
			}

			if($this->idclienteDefaultFK!=null && $this->idclienteDefaultFK > -1) {
				$this->cheque_cuenta_corrienteReturnGeneral->getcheque_cuenta_corriente()->setid_cliente($this->idclienteDefaultFK);
			}

			if($this->idproveedorDefaultFK!=null && $this->idproveedorDefaultFK > -1) {
				$this->cheque_cuenta_corrienteReturnGeneral->getcheque_cuenta_corriente()->setid_proveedor($this->idproveedorDefaultFK);
			}

			if($this->idbeneficiario_ocacional_chequeDefaultFK!=null && $this->idbeneficiario_ocacional_chequeDefaultFK > -1) {
				$this->cheque_cuenta_corrienteReturnGeneral->getcheque_cuenta_corriente()->setid_beneficiario_ocacional_cheque($this->idbeneficiario_ocacional_chequeDefaultFK);
			}

			if($this->idestado_deposito_retiroDefaultFK!=null && $this->idestado_deposito_retiroDefaultFK > -1) {
				$this->cheque_cuenta_corrienteReturnGeneral->getcheque_cuenta_corriente()->setid_estado_deposito_retiro($this->idestado_deposito_retiroDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->cheque_cuenta_corrienteReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->cheque_cuenta_corrienteReturnGeneral->getcheque_cuenta_corriente(),$this->cheque_cuenta_corrienteActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeycheque_cuenta_corriente($this->cheque_cuenta_corrienteReturnGeneral->getcheque_cuenta_corriente());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariocheque_cuenta_corriente($this->cheque_cuenta_corrienteReturnGeneral->getcheque_cuenta_corriente());*/
			}
			
			if($this->cheque_cuenta_corrienteReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->cheque_cuenta_corrienteReturnGeneral->getcheque_cuenta_corriente(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualcheque_cuenta_corriente($this->cheque_cuenta_corriente,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->cheque_cuenta_corrientesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cheque_cuenta_corrientesAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->cheque_cuenta_corrientesAuxiliar=array();
			}
			
			if(count($this->cheque_cuenta_corrientesAuxiliar)==2) {
				$cheque_cuenta_corrienteOrigen=$this->cheque_cuenta_corrientesAuxiliar[0];
				$cheque_cuenta_corrienteDestino=$this->cheque_cuenta_corrientesAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($cheque_cuenta_corrienteOrigen,$cheque_cuenta_corrienteDestino,true,false,false);
				
				$this->actualizarLista($cheque_cuenta_corrienteDestino,$this->cheque_cuenta_corrientes);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->cheque_cuenta_corrientesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cheque_cuenta_corrientesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cheque_cuenta_corrientesAuxiliar=array();
			}
			
			if(count($this->cheque_cuenta_corrientesAuxiliar) > 0) {
				foreach ($this->cheque_cuenta_corrientesAuxiliar as $cheque_cuenta_corrienteSeleccionado) {
					$this->cheque_cuenta_corriente=new cheque_cuenta_corriente();
					
					$this->setCopiarVariablesObjetos($cheque_cuenta_corrienteSeleccionado,$this->cheque_cuenta_corriente,true,true,false);
						
					$this->cheque_cuenta_corrientes[]=$this->cheque_cuenta_corriente;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->cheque_cuenta_corrientesEliminados as $cheque_cuenta_corrienteEliminado) {
				$this->cheque_cuenta_corrienteLogic->cheque_cuenta_corrientes[]=$cheque_cuenta_corrienteEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->cheque_cuenta_corriente=new cheque_cuenta_corriente();
							
				$this->cheque_cuenta_corrientes[]=$this->cheque_cuenta_corriente;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
		
		$cheque_cuenta_corrienteActual=new cheque_cuenta_corriente();
		
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
				
				$cheque_cuenta_corrienteActual=$this->cheque_cuenta_corrientes[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_cuenta_corriente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_categoria_cheque((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_beneficiario_ocacional_cheque((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setnumero_cheque($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setmonto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setmonto_texto($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setsaldo((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setcobrado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_19')));  } else { $cheque_cuenta_corrienteActual->setcobrado(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setimpreso(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_20')));  } else { $cheque_cuenta_corrienteActual->setimpreso(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_estado_deposito_retiro((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setdebito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_22'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setcredito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }
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
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadcheque_cuenta_corriente='',string $strTipoPaginaAuxiliarcheque_cuenta_corriente='',string $strTipoUsuarioAuxiliarcheque_cuenta_corriente='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadcheque_cuenta_corriente,$strTipoPaginaAuxiliarcheque_cuenta_corriente,$strTipoUsuarioAuxiliarcheque_cuenta_corriente,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->cheque_cuenta_corrientes) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=cheque_cuenta_corriente_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=cheque_cuenta_corriente_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=cheque_cuenta_corriente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));
						
			if($cheque_cuenta_corriente_session==null) {
				$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
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
					/*$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;*/
					
					if($cheque_cuenta_corriente_session->intNumeroPaginacion==cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$cheque_cuenta_corriente_session->intNumeroPaginacion;
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
			
			$this->cheque_cuenta_corrientesEliminados=array();
			
			/*$this->cheque_cuenta_corrienteLogic->setConnexion($connexion);*/
			
			$this->cheque_cuenta_corrienteLogic->setIsConDeep(true);
			
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrienteDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cuenta_corriente');$classes[]=$class;
			$class=new Classe('categoria_cheque');$classes[]=$class;
			$class=new Classe('cliente');$classes[]=$class;
			$class=new Classe('proveedor');$classes[]=$class;
			$class=new Classe('beneficiario_ocacional_cheque');$classes[]=$class;
			$class=new Classe('estado_deposito_retiro');$classes[]=$class;
			
			$this->cheque_cuenta_corrienteLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cheque_cuenta_corrienteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes()==null|| count($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cheque_cuenta_corrienteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->cheque_cuenta_corrientesReporte=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
									
						/*$this->generarReportes('Todos',$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes());*/
					
						$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($this->cheque_cuenta_corrientes);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cheque_cuenta_corrienteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes()==null|| count($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cheque_cuenta_corrienteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->cheque_cuenta_corrientesReporte=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
									
						/*$this->generarReportes('Todos',$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes());*/
					
						$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($this->cheque_cuenta_corrientes);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idcheque_cuenta_corriente=0;*/
				
				if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionFK!=null && $cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionFK==true) {
					if($cheque_cuenta_corriente_session->bigIdActualFK!=null && $cheque_cuenta_corriente_session->bigIdActualFK!=0)	{
						$this->idcheque_cuenta_corriente=$cheque_cuenta_corriente_session->bigIdActualFK;	
					}
					
					$cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionFK=false;
					
					$cheque_cuenta_corriente_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idcheque_cuenta_corriente=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idcheque_cuenta_corriente=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cheque_cuenta_corrienteLogic->getEntity($this->idcheque_cuenta_corriente);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*cheque_cuenta_corrienteLogicAdditional::getDetalleIndicePorId($idcheque_cuenta_corriente);*/

				
				if($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()!=null) {
					$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes(array());
					$this->cheque_cuenta_corrienteLogic->cheque_cuenta_corrientes[]=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idbeneficiario_ocacional')
			{

				if($cheque_cuenta_corriente_session->bigidbeneficiario_ocacional_chequeActual!=null && $cheque_cuenta_corriente_session->bigidbeneficiario_ocacional_chequeActual!=0)
				{
					$this->id_beneficiario_ocacional_chequeFK_Idbeneficiario_ocacional=$cheque_cuenta_corriente_session->bigidbeneficiario_ocacional_chequeActual;
					$cheque_cuenta_corriente_session->bigidbeneficiario_ocacional_chequeActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idbeneficiario_ocacional($finalQueryPaginacion,$this->pagination,$this->id_beneficiario_ocacional_chequeFK_Idbeneficiario_ocacional);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cheque_cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idbeneficiario_ocacional($this->id_beneficiario_ocacional_chequeFK_Idbeneficiario_ocacional);


					if($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes()==null || count($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idbeneficiario_ocacional('',$this->pagination,$this->id_beneficiario_ocacional_chequeFK_Idbeneficiario_ocacional);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cheque_cuenta_corrientesReporte=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecheque_cuenta_corrientes("FK_Idbeneficiario_ocacional",$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($cheque_cuenta_corrientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcategoria_cheque')
			{

				if($cheque_cuenta_corriente_session->bigidcategoria_chequeActual!=null && $cheque_cuenta_corriente_session->bigidcategoria_chequeActual!=0)
				{
					$this->id_categoria_chequeFK_Idcategoria_cheque=$cheque_cuenta_corriente_session->bigidcategoria_chequeActual;
					$cheque_cuenta_corriente_session->bigidcategoria_chequeActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idcategoria_cheque($finalQueryPaginacion,$this->pagination,$this->id_categoria_chequeFK_Idcategoria_cheque);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cheque_cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idcategoria_cheque($this->id_categoria_chequeFK_Idcategoria_cheque);


					if($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes()==null || count($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idcategoria_cheque('',$this->pagination,$this->id_categoria_chequeFK_Idcategoria_cheque);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cheque_cuenta_corrientesReporte=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecheque_cuenta_corrientes("FK_Idcategoria_cheque",$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($cheque_cuenta_corrientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcliente')
			{

				if($cheque_cuenta_corriente_session->bigidclienteActual!=null && $cheque_cuenta_corriente_session->bigidclienteActual!=0)
				{
					$this->id_clienteFK_Idcliente=$cheque_cuenta_corriente_session->bigidclienteActual;
					$cheque_cuenta_corriente_session->bigidclienteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idcliente($finalQueryPaginacion,$this->pagination,$this->id_clienteFK_Idcliente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cheque_cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idcliente($this->id_clienteFK_Idcliente);


					if($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes()==null || count($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idcliente('',$this->pagination,$this->id_clienteFK_Idcliente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cheque_cuenta_corrientesReporte=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecheque_cuenta_corrientes("FK_Idcliente",$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($cheque_cuenta_corrientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcuenta_corriente')
			{

				if($cheque_cuenta_corriente_session->bigidcuenta_corrienteActual!=null && $cheque_cuenta_corriente_session->bigidcuenta_corrienteActual!=0)
				{
					$this->id_cuenta_corrienteFK_Idcuenta_corriente=$cheque_cuenta_corriente_session->bigidcuenta_corrienteActual;
					$cheque_cuenta_corriente_session->bigidcuenta_corrienteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idcuenta_corriente($finalQueryPaginacion,$this->pagination,$this->id_cuenta_corrienteFK_Idcuenta_corriente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cheque_cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idcuenta_corriente($this->id_cuenta_corrienteFK_Idcuenta_corriente);


					if($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes()==null || count($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idcuenta_corriente('',$this->pagination,$this->id_cuenta_corrienteFK_Idcuenta_corriente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cheque_cuenta_corrientesReporte=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecheque_cuenta_corrientes("FK_Idcuenta_corriente",$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($cheque_cuenta_corrientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idejercicio')
			{

				if($cheque_cuenta_corriente_session->bigidejercicioActual!=null && $cheque_cuenta_corriente_session->bigidejercicioActual!=0)
				{
					$this->id_ejercicioFK_Idejercicio=$cheque_cuenta_corriente_session->bigidejercicioActual;
					$cheque_cuenta_corriente_session->bigidejercicioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idejercicio($finalQueryPaginacion,$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cheque_cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idejercicio($this->id_ejercicioFK_Idejercicio);


					if($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes()==null || count($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idejercicio('',$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cheque_cuenta_corrientesReporte=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecheque_cuenta_corrientes("FK_Idejercicio",$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($cheque_cuenta_corrientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($cheque_cuenta_corriente_session->bigidempresaActual!=null && $cheque_cuenta_corriente_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$cheque_cuenta_corriente_session->bigidempresaActual;
					$cheque_cuenta_corriente_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cheque_cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes()==null || count($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cheque_cuenta_corrientesReporte=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecheque_cuenta_corrientes("FK_Idempresa",$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($cheque_cuenta_corrientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idestado_deposito_retiro')
			{

				if($cheque_cuenta_corriente_session->bigidestado_deposito_retiroActual!=null && $cheque_cuenta_corriente_session->bigidestado_deposito_retiroActual!=0)
				{
					$this->id_estado_deposito_retiroFK_Idestado_deposito_retiro=$cheque_cuenta_corriente_session->bigidestado_deposito_retiroActual;
					$cheque_cuenta_corriente_session->bigidestado_deposito_retiroActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idestado_deposito_retiro($finalQueryPaginacion,$this->pagination,$this->id_estado_deposito_retiroFK_Idestado_deposito_retiro);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cheque_cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idestado_deposito_retiro($this->id_estado_deposito_retiroFK_Idestado_deposito_retiro);


					if($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes()==null || count($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idestado_deposito_retiro('',$this->pagination,$this->id_estado_deposito_retiroFK_Idestado_deposito_retiro);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cheque_cuenta_corrientesReporte=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecheque_cuenta_corrientes("FK_Idestado_deposito_retiro",$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($cheque_cuenta_corrientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idperiodo')
			{

				if($cheque_cuenta_corriente_session->bigidperiodoActual!=null && $cheque_cuenta_corriente_session->bigidperiodoActual!=0)
				{
					$this->id_periodoFK_Idperiodo=$cheque_cuenta_corriente_session->bigidperiodoActual;
					$cheque_cuenta_corriente_session->bigidperiodoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idperiodo($finalQueryPaginacion,$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cheque_cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idperiodo($this->id_periodoFK_Idperiodo);


					if($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes()==null || count($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idperiodo('',$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cheque_cuenta_corrientesReporte=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecheque_cuenta_corrientes("FK_Idperiodo",$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($cheque_cuenta_corrientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idproveedor')
			{

				if($cheque_cuenta_corriente_session->bigidproveedorActual!=null && $cheque_cuenta_corriente_session->bigidproveedorActual!=0)
				{
					$this->id_proveedorFK_Idproveedor=$cheque_cuenta_corriente_session->bigidproveedorActual;
					$cheque_cuenta_corriente_session->bigidproveedorActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idproveedor($finalQueryPaginacion,$this->pagination,$this->id_proveedorFK_Idproveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cheque_cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idproveedor($this->id_proveedorFK_Idproveedor);


					if($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes()==null || count($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idproveedor('',$this->pagination,$this->id_proveedorFK_Idproveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cheque_cuenta_corrientesReporte=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecheque_cuenta_corrientes("FK_Idproveedor",$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($cheque_cuenta_corrientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idsucursal')
			{

				if($cheque_cuenta_corriente_session->bigidsucursalActual!=null && $cheque_cuenta_corriente_session->bigidsucursalActual!=0)
				{
					$this->id_sucursalFK_Idsucursal=$cheque_cuenta_corriente_session->bigidsucursalActual;
					$cheque_cuenta_corriente_session->bigidsucursalActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idsucursal($finalQueryPaginacion,$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cheque_cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idsucursal($this->id_sucursalFK_Idsucursal);


					if($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes()==null || count($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idsucursal('',$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cheque_cuenta_corrientesReporte=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecheque_cuenta_corrientes("FK_Idsucursal",$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($cheque_cuenta_corrientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idusuario')
			{

				if($cheque_cuenta_corriente_session->bigidusuarioActual!=null && $cheque_cuenta_corriente_session->bigidusuarioActual!=0)
				{
					$this->id_usuarioFK_Idusuario=$cheque_cuenta_corriente_session->bigidusuarioActual;
					$cheque_cuenta_corriente_session->bigidusuarioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idusuario($finalQueryPaginacion,$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cheque_cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idusuario($this->id_usuarioFK_Idusuario);


					if($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes()==null || count($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cheque_cuenta_corrienteLogic->getsFK_Idusuario('',$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cheque_cuenta_corrientesReporte=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecheque_cuenta_corrientes("FK_Idusuario",$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($cheque_cuenta_corrientes);
					}
				//}

			} 
		
		$cheque_cuenta_corriente_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cheque_cuenta_corriente_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->cheque_cuenta_corrienteLogic->loadForeignsKeysDescription();*/
		
		$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
		
		if($this->cheque_cuenta_corrientesEliminados==null) {
			$this->cheque_cuenta_corrientesEliminados=array();
		}
		
		$this->Session->write(cheque_cuenta_corriente_util::$STR_SESSION_NAME.'Lista',serialize($this->cheque_cuenta_corrientes));
		$this->Session->write(cheque_cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->cheque_cuenta_corrientesEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(cheque_cuenta_corriente_util::$STR_SESSION_NAME,serialize($cheque_cuenta_corriente_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idcheque_cuenta_corriente=$idGeneral;
			
			$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
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
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if(count($this->cheque_cuenta_corrientes) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_Idbeneficiario_ocacionalParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_beneficiario_ocacional_chequeFK_Idbeneficiario_ocacional=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idbeneficiario_ocacional','cmbid_beneficiario_ocacional_cheque');

			$this->strAccionBusqueda='FK_Idbeneficiario_ocacional';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idcategoria_chequeParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_categoria_chequeFK_Idcategoria_cheque=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcategoria_cheque','cmbid_categoria_cheque');

			$this->strAccionBusqueda='FK_Idcategoria_cheque';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_clienteFK_Idcliente=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcliente','cmbid_cliente');

			$this->strAccionBusqueda='FK_Idcliente';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuenta_corrienteFK_Idcuenta_corriente=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta_corriente','cmbid_cuenta_corriente');

			$this->strAccionBusqueda='FK_Idcuenta_corriente';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_ejercicioFK_Idejercicio=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idejercicio','cmbid_ejercicio');

			$this->strAccionBusqueda='FK_Idejercicio';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idestado_deposito_retiroParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_estado_deposito_retiroFK_Idestado_deposito_retiro=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idestado_deposito_retiro','cmbid_estado_deposito_retiro');

			$this->strAccionBusqueda='FK_Idestado_deposito_retiro';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_periodoFK_Idperiodo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idperiodo','cmbid_periodo');

			$this->strAccionBusqueda='FK_Idperiodo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_proveedorFK_Idproveedor=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idproveedor','cmbid_proveedor');

			$this->strAccionBusqueda='FK_Idproveedor';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_sucursalFK_Idsucursal=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idsucursal','cmbid_sucursal');

			$this->strAccionBusqueda='FK_Idsucursal';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_usuarioFK_Idusuario=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idusuario','cmbid_usuario');

			$this->strAccionBusqueda='FK_Idusuario';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idbeneficiario_ocacional($strFinalQuery,$id_beneficiario_ocacional_cheque)
	{
		try
		{

			$this->cheque_cuenta_corrienteLogic->getsFK_Idbeneficiario_ocacional($strFinalQuery,new Pagination(),$id_beneficiario_ocacional_cheque);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idcategoria_cheque($strFinalQuery,$id_categoria_cheque)
	{
		try
		{

			$this->cheque_cuenta_corrienteLogic->getsFK_Idcategoria_cheque($strFinalQuery,new Pagination(),$id_categoria_cheque);
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

			$this->cheque_cuenta_corrienteLogic->getsFK_Idcliente($strFinalQuery,new Pagination(),$id_cliente);
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

			$this->cheque_cuenta_corrienteLogic->getsFK_Idcuenta_corriente($strFinalQuery,new Pagination(),$id_cuenta_corriente);
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

			$this->cheque_cuenta_corrienteLogic->getsFK_Idejercicio($strFinalQuery,new Pagination(),$id_ejercicio);
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

			$this->cheque_cuenta_corrienteLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idestado_deposito_retiro($strFinalQuery,$id_estado_deposito_retiro)
	{
		try
		{

			$this->cheque_cuenta_corrienteLogic->getsFK_Idestado_deposito_retiro($strFinalQuery,new Pagination(),$id_estado_deposito_retiro);
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

			$this->cheque_cuenta_corrienteLogic->getsFK_Idperiodo($strFinalQuery,new Pagination(),$id_periodo);
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

			$this->cheque_cuenta_corrienteLogic->getsFK_Idproveedor($strFinalQuery,new Pagination(),$id_proveedor);
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

			$this->cheque_cuenta_corrienteLogic->getsFK_Idsucursal($strFinalQuery,new Pagination(),$id_sucursal);
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

			$this->cheque_cuenta_corrienteLogic->getsFK_Idusuario($strFinalQuery,new Pagination(),$id_usuario);
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
			
			
			$cheque_cuenta_corrienteForeignKey=new cheque_cuenta_corriente_param_return(); //cheque_cuenta_corrienteForeignKey();
			
			$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));
						
			if($cheque_cuenta_corriente_session==null) {
				$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$cheque_cuenta_corrienteForeignKey=$this->cheque_cuenta_corrienteLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$cheque_cuenta_corriente_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$cheque_cuenta_corrienteForeignKey->empresasFK;
				$this->idempresaDefaultFK=$cheque_cuenta_corrienteForeignKey->idempresaDefaultFK;
			}

			if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$this->strRecargarFkTipos,',')) {
				$this->sucursalsFK=$cheque_cuenta_corrienteForeignKey->sucursalsFK;
				$this->idsucursalDefaultFK=$cheque_cuenta_corrienteForeignKey->idsucursalDefaultFK;
			}

			if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionsucursal) {
				$this->setVisibleBusquedasParasucursal(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$this->strRecargarFkTipos,',')) {
				$this->ejerciciosFK=$cheque_cuenta_corrienteForeignKey->ejerciciosFK;
				$this->idejercicioDefaultFK=$cheque_cuenta_corrienteForeignKey->idejercicioDefaultFK;
			}

			if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionejercicio) {
				$this->setVisibleBusquedasParaejercicio(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$this->strRecargarFkTipos,',')) {
				$this->periodosFK=$cheque_cuenta_corrienteForeignKey->periodosFK;
				$this->idperiodoDefaultFK=$cheque_cuenta_corrienteForeignKey->idperiodoDefaultFK;
			}

			if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionperiodo) {
				$this->setVisibleBusquedasParaperiodo(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$this->strRecargarFkTipos,',')) {
				$this->usuariosFK=$cheque_cuenta_corrienteForeignKey->usuariosFK;
				$this->idusuarioDefaultFK=$cheque_cuenta_corrienteForeignKey->idusuarioDefaultFK;
			}

			if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionusuario) {
				$this->setVisibleBusquedasParausuario(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_corriente',$this->strRecargarFkTipos,',')) {
				$this->cuenta_corrientesFK=$cheque_cuenta_corrienteForeignKey->cuenta_corrientesFK;
				$this->idcuenta_corrienteDefaultFK=$cheque_cuenta_corrienteForeignKey->idcuenta_corrienteDefaultFK;
			}

			if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta_corriente) {
				$this->setVisibleBusquedasParacuenta_corriente(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_categoria_cheque',$this->strRecargarFkTipos,',')) {
				$this->categoria_chequesFK=$cheque_cuenta_corrienteForeignKey->categoria_chequesFK;
				$this->idcategoria_chequeDefaultFK=$cheque_cuenta_corrienteForeignKey->idcategoria_chequeDefaultFK;
			}

			if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesioncategoria_cheque) {
				$this->setVisibleBusquedasParacategoria_cheque(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cliente',$this->strRecargarFkTipos,',')) {
				$this->clientesFK=$cheque_cuenta_corrienteForeignKey->clientesFK;
				$this->idclienteDefaultFK=$cheque_cuenta_corrienteForeignKey->idclienteDefaultFK;
			}

			if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesioncliente) {
				$this->setVisibleBusquedasParacliente(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$this->strRecargarFkTipos,',')) {
				$this->proveedorsFK=$cheque_cuenta_corrienteForeignKey->proveedorsFK;
				$this->idproveedorDefaultFK=$cheque_cuenta_corrienteForeignKey->idproveedorDefaultFK;
			}

			if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionproveedor) {
				$this->setVisibleBusquedasParaproveedor(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_beneficiario_ocacional_cheque',$this->strRecargarFkTipos,',')) {
				$this->beneficiario_ocacional_chequesFK=$cheque_cuenta_corrienteForeignKey->beneficiario_ocacional_chequesFK;
				$this->idbeneficiario_ocacional_chequeDefaultFK=$cheque_cuenta_corrienteForeignKey->idbeneficiario_ocacional_chequeDefaultFK;
			}

			if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionbeneficiario_ocacional_cheque) {
				$this->setVisibleBusquedasParabeneficiario_ocacional_cheque(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado_deposito_retiro',$this->strRecargarFkTipos,',')) {
				$this->estado_deposito_retirosFK=$cheque_cuenta_corrienteForeignKey->estado_deposito_retirosFK;
				$this->idestado_deposito_retiroDefaultFK=$cheque_cuenta_corrienteForeignKey->idestado_deposito_retiroDefaultFK;
			}

			if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionestado_deposito_retiro) {
				$this->setVisibleBusquedasParaestado_deposito_retiro(true);
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
	
	function cargarCombosFKFromReturnGeneral($cheque_cuenta_corrienteReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$cheque_cuenta_corrienteReturnGeneral->strRecargarFkTipos;
			
			


			if($cheque_cuenta_corrienteReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$cheque_cuenta_corrienteReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$cheque_cuenta_corrienteReturnGeneral->idempresaDefaultFK;
			}


			if($cheque_cuenta_corrienteReturnGeneral->con_sucursalsFK==true) {
				$this->sucursalsFK=$cheque_cuenta_corrienteReturnGeneral->sucursalsFK;
				$this->idsucursalDefaultFK=$cheque_cuenta_corrienteReturnGeneral->idsucursalDefaultFK;
			}


			if($cheque_cuenta_corrienteReturnGeneral->con_ejerciciosFK==true) {
				$this->ejerciciosFK=$cheque_cuenta_corrienteReturnGeneral->ejerciciosFK;
				$this->idejercicioDefaultFK=$cheque_cuenta_corrienteReturnGeneral->idejercicioDefaultFK;
			}


			if($cheque_cuenta_corrienteReturnGeneral->con_periodosFK==true) {
				$this->periodosFK=$cheque_cuenta_corrienteReturnGeneral->periodosFK;
				$this->idperiodoDefaultFK=$cheque_cuenta_corrienteReturnGeneral->idperiodoDefaultFK;
			}


			if($cheque_cuenta_corrienteReturnGeneral->con_usuariosFK==true) {
				$this->usuariosFK=$cheque_cuenta_corrienteReturnGeneral->usuariosFK;
				$this->idusuarioDefaultFK=$cheque_cuenta_corrienteReturnGeneral->idusuarioDefaultFK;
			}


			if($cheque_cuenta_corrienteReturnGeneral->con_cuenta_corrientesFK==true) {
				$this->cuenta_corrientesFK=$cheque_cuenta_corrienteReturnGeneral->cuenta_corrientesFK;
				$this->idcuenta_corrienteDefaultFK=$cheque_cuenta_corrienteReturnGeneral->idcuenta_corrienteDefaultFK;
			}


			if($cheque_cuenta_corrienteReturnGeneral->con_categoria_chequesFK==true) {
				$this->categoria_chequesFK=$cheque_cuenta_corrienteReturnGeneral->categoria_chequesFK;
				$this->idcategoria_chequeDefaultFK=$cheque_cuenta_corrienteReturnGeneral->idcategoria_chequeDefaultFK;
			}


			if($cheque_cuenta_corrienteReturnGeneral->con_clientesFK==true) {
				$this->clientesFK=$cheque_cuenta_corrienteReturnGeneral->clientesFK;
				$this->idclienteDefaultFK=$cheque_cuenta_corrienteReturnGeneral->idclienteDefaultFK;
			}


			if($cheque_cuenta_corrienteReturnGeneral->con_proveedorsFK==true) {
				$this->proveedorsFK=$cheque_cuenta_corrienteReturnGeneral->proveedorsFK;
				$this->idproveedorDefaultFK=$cheque_cuenta_corrienteReturnGeneral->idproveedorDefaultFK;
			}


			if($cheque_cuenta_corrienteReturnGeneral->con_beneficiario_ocacional_chequesFK==true) {
				$this->beneficiario_ocacional_chequesFK=$cheque_cuenta_corrienteReturnGeneral->beneficiario_ocacional_chequesFK;
				$this->idbeneficiario_ocacional_chequeDefaultFK=$cheque_cuenta_corrienteReturnGeneral->idbeneficiario_ocacional_chequeDefaultFK;
			}


			if($cheque_cuenta_corrienteReturnGeneral->con_estado_deposito_retirosFK==true) {
				$this->estado_deposito_retirosFK=$cheque_cuenta_corrienteReturnGeneral->estado_deposito_retirosFK;
				$this->idestado_deposito_retiroDefaultFK=$cheque_cuenta_corrienteReturnGeneral->idestado_deposito_retiroDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));
		
		if($cheque_cuenta_corriente_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($cheque_cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($cheque_cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==sucursal_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='sucursal';
			}
			else if($cheque_cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==ejercicio_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='ejercicio';
			}
			else if($cheque_cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==periodo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='periodo';
			}
			else if($cheque_cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==usuario_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='usuario';
			}
			else if($cheque_cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_corriente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta_corriente';
			}
			else if($cheque_cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==categoria_cheque_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='categoria_cheque';
			}
			else if($cheque_cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cliente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cliente';
			}
			else if($cheque_cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==proveedor_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='proveedor';
			}
			else if($cheque_cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==beneficiario_ocacional_cheque_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='beneficiario_ocacional_cheque';
			}
			else if($cheque_cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==estado_deposito_retiro_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='estado_deposito_retiro';
			}
			
			$cheque_cuenta_corriente_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}						
			
			$this->cheque_cuenta_corrientesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cheque_cuenta_corrientesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cheque_cuenta_corrientesAuxiliar=array();
			}
			
			if(count($this->cheque_cuenta_corrientesAuxiliar) > 0) {
				
				foreach ($this->cheque_cuenta_corrientesAuxiliar as $cheque_cuenta_corrienteSeleccionado) {
					$this->eliminarTablaBase($cheque_cuenta_corrienteSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
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


	public function getcategoria_chequesFKListSelectItem() 
	{
		$categoria_chequesList=array();

		$item=null;

		foreach($this->categoria_chequesFK as $categoria_cheque)
		{
			$item=new SelectItem();
			$item->setLabel($categoria_cheque->getnombre());
			$item->setValue($categoria_cheque->getId());
			$categoria_chequesList[]=$item;
		}

		return $categoria_chequesList;
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


	public function getbeneficiario_ocacional_chequesFKListSelectItem() 
	{
		$beneficiario_ocacional_chequesList=array();

		$item=null;

		foreach($this->beneficiario_ocacional_chequesFK as $beneficiario_ocacional_cheque)
		{
			$item=new SelectItem();
			$item->setLabel($beneficiario_ocacional_cheque->getnombre());
			$item->setValue($beneficiario_ocacional_cheque->getId());
			$beneficiario_ocacional_chequesList[]=$item;
		}

		return $beneficiario_ocacional_chequesList;
	}


	public function getestado_deposito_retirosFKListSelectItem() 
	{
		$estado_deposito_retirosList=array();

		$item=null;

		foreach($this->estado_deposito_retirosFK as $estado_deposito_retiro)
		{
			$item=new SelectItem();
			$item->setLabel($estado_deposito_retiro->getcodigo());
			$item->setValue($estado_deposito_retiro->getId());
			$estado_deposito_retirosList[]=$item;
		}

		return $estado_deposito_retirosList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
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
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$cheque_cuenta_corrientesNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->cheque_cuenta_corrientes as $cheque_cuenta_corrienteLocal) {
				if($cheque_cuenta_corrienteLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->cheque_cuenta_corriente=new cheque_cuenta_corriente();
				
				$this->cheque_cuenta_corriente->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->cheque_cuenta_corrientes[]=$this->cheque_cuenta_corriente;*/
				
				$cheque_cuenta_corrientesNuevos[]=$this->cheque_cuenta_corriente;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('cuenta_corriente');$classes[]=$class;
				$class=new Classe('categoria_cheque');$classes[]=$class;
				$class=new Classe('cliente');$classes[]=$class;
				$class=new Classe('proveedor');$classes[]=$class;
				$class=new Classe('beneficiario_ocacional_cheque');$classes[]=$class;
				$class=new Classe('estado_deposito_retiro');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($cheque_cuenta_corrientesNuevos);
					
				$this->cheque_cuenta_corrienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($cheque_cuenta_corrientesNuevos as $cheque_cuenta_corrienteNuevo) {
					$this->cheque_cuenta_corrientes[]=$cheque_cuenta_corrienteNuevo;
				}
				
				/*$this->cheque_cuenta_corrientes[]=$cheque_cuenta_corrientesNuevos;*/
				
				$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($this->cheque_cuenta_corrientes);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($cheque_cuenta_corrientesNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($cheque_cuenta_corriente_session->bigidempresaActual!=null && $cheque_cuenta_corriente_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cheque_cuenta_corriente_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=cheque_cuenta_corriente_util::getempresaDescripcion($empresaLogic->getempresa());
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

		$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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


			if($cheque_cuenta_corriente_session->bigidsucursalActual!=null && $cheque_cuenta_corriente_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($cheque_cuenta_corriente_session->bigidsucursalActual);//WithConnection

				$this->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=cheque_cuenta_corriente_util::getsucursalDescripcion($sucursalLogic->getsucursal());
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

		$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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


			if($cheque_cuenta_corriente_session->bigidejercicioActual!=null && $cheque_cuenta_corriente_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($cheque_cuenta_corriente_session->bigidejercicioActual);//WithConnection

				$this->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=cheque_cuenta_corriente_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
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

		$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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


			if($cheque_cuenta_corriente_session->bigidperiodoActual!=null && $cheque_cuenta_corriente_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($cheque_cuenta_corriente_session->bigidperiodoActual);//WithConnection

				$this->periodosFK[$periodoLogic->getperiodo()->getId()]=cheque_cuenta_corriente_util::getperiodoDescripcion($periodoLogic->getperiodo());
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

		$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionusuario!=true) {
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


			if($cheque_cuenta_corriente_session->bigidusuarioActual!=null && $cheque_cuenta_corriente_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($cheque_cuenta_corriente_session->bigidusuarioActual);//WithConnection

				$this->usuariosFK[$usuarioLogic->getusuario()->getId()]=cheque_cuenta_corriente_util::getusuarioDescripcion($usuarioLogic->getusuario());
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

		$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta_corriente!=true) {
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


			if($cheque_cuenta_corriente_session->bigidcuenta_corrienteActual!=null && $cheque_cuenta_corriente_session->bigidcuenta_corrienteActual > 0) {
				$cuenta_corrienteLogic->getEntity($cheque_cuenta_corriente_session->bigidcuenta_corrienteActual);//WithConnection

				$this->cuenta_corrientesFK[$cuenta_corrienteLogic->getcuenta_corriente()->getId()]=cheque_cuenta_corriente_util::getcuenta_corrienteDescripcion($cuenta_corrienteLogic->getcuenta_corriente());
				$this->idcuenta_corrienteDefaultFK=$cuenta_corrienteLogic->getcuenta_corriente()->getId();
			}
		}
	}

	public function cargarComboscategoria_chequesFK($connexion=null,$strRecargarFkQuery=''){
		$categoria_chequeLogic= new categoria_cheque_logic();
		$pagination= new Pagination();
		$this->categoria_chequesFK=array();

		$categoria_chequeLogic->setConnexion($connexion);
		$categoria_chequeLogic->getcategoria_chequeDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesioncategoria_cheque!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=categoria_cheque_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcategoria_cheque=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcategoria_cheque=Funciones::GetFinalQueryAppend($finalQueryGlobalcategoria_cheque, '');
				$finalQueryGlobalcategoria_cheque.=categoria_cheque_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcategoria_cheque.$strRecargarFkQuery;		

				$categoria_chequeLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscategoria_chequesFK($categoria_chequeLogic->getcategoria_cheques());

		} else {
			$this->setVisibleBusquedasParacategoria_cheque(true);


			if($cheque_cuenta_corriente_session->bigidcategoria_chequeActual!=null && $cheque_cuenta_corriente_session->bigidcategoria_chequeActual > 0) {
				$categoria_chequeLogic->getEntity($cheque_cuenta_corriente_session->bigidcategoria_chequeActual);//WithConnection

				$this->categoria_chequesFK[$categoria_chequeLogic->getcategoria_cheque()->getId()]=cheque_cuenta_corriente_util::getcategoria_chequeDescripcion($categoria_chequeLogic->getcategoria_cheque());
				$this->idcategoria_chequeDefaultFK=$categoria_chequeLogic->getcategoria_cheque()->getId();
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

		$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesioncliente!=true) {
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


			if($cheque_cuenta_corriente_session->bigidclienteActual!=null && $cheque_cuenta_corriente_session->bigidclienteActual > 0) {
				$clienteLogic->getEntity($cheque_cuenta_corriente_session->bigidclienteActual);//WithConnection

				$this->clientesFK[$clienteLogic->getcliente()->getId()]=cheque_cuenta_corriente_util::getclienteDescripcion($clienteLogic->getcliente());
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

		$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionproveedor!=true) {
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


			if($cheque_cuenta_corriente_session->bigidproveedorActual!=null && $cheque_cuenta_corriente_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($cheque_cuenta_corriente_session->bigidproveedorActual);//WithConnection

				$this->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=cheque_cuenta_corriente_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$this->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	public function cargarCombosbeneficiario_ocacional_chequesFK($connexion=null,$strRecargarFkQuery=''){
		$beneficiario_ocacional_chequeLogic= new beneficiario_ocacional_cheque_logic();
		$pagination= new Pagination();
		$this->beneficiario_ocacional_chequesFK=array();

		$beneficiario_ocacional_chequeLogic->setConnexion($connexion);
		$beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_chequeDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionbeneficiario_ocacional_cheque!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=beneficiario_ocacional_cheque_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalbeneficiario_ocacional_cheque=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalbeneficiario_ocacional_cheque=Funciones::GetFinalQueryAppend($finalQueryGlobalbeneficiario_ocacional_cheque, '');
				$finalQueryGlobalbeneficiario_ocacional_cheque.=beneficiario_ocacional_cheque_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalbeneficiario_ocacional_cheque.$strRecargarFkQuery;		

				$beneficiario_ocacional_chequeLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosbeneficiario_ocacional_chequesFK($beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques());

		} else {
			$this->setVisibleBusquedasParabeneficiario_ocacional_cheque(true);


			if($cheque_cuenta_corriente_session->bigidbeneficiario_ocacional_chequeActual!=null && $cheque_cuenta_corriente_session->bigidbeneficiario_ocacional_chequeActual > 0) {
				$beneficiario_ocacional_chequeLogic->getEntity($cheque_cuenta_corriente_session->bigidbeneficiario_ocacional_chequeActual);//WithConnection

				$this->beneficiario_ocacional_chequesFK[$beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->getId()]=cheque_cuenta_corriente_util::getbeneficiario_ocacional_chequeDescripcion($beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque());
				$this->idbeneficiario_ocacional_chequeDefaultFK=$beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->getId();
			}
		}
	}

	public function cargarCombosestado_deposito_retirosFK($connexion=null,$strRecargarFkQuery=''){
		$estado_deposito_retiroLogic= new estado_deposito_retiro_logic();
		$pagination= new Pagination();
		$this->estado_deposito_retirosFK=array();

		$estado_deposito_retiroLogic->setConnexion($connexion);
		$estado_deposito_retiroLogic->getestado_deposito_retiroDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionestado_deposito_retiro!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=estado_deposito_retiro_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalestado_deposito_retiro=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalestado_deposito_retiro=Funciones::GetFinalQueryAppend($finalQueryGlobalestado_deposito_retiro, '');
				$finalQueryGlobalestado_deposito_retiro.=estado_deposito_retiro_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalestado_deposito_retiro.$strRecargarFkQuery;		

				$estado_deposito_retiroLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosestado_deposito_retirosFK($estado_deposito_retiroLogic->getestado_deposito_retiros());

		} else {
			$this->setVisibleBusquedasParaestado_deposito_retiro(true);


			if($cheque_cuenta_corriente_session->bigidestado_deposito_retiroActual!=null && $cheque_cuenta_corriente_session->bigidestado_deposito_retiroActual > 0) {
				$estado_deposito_retiroLogic->getEntity($cheque_cuenta_corriente_session->bigidestado_deposito_retiroActual);//WithConnection

				$this->estado_deposito_retirosFK[$estado_deposito_retiroLogic->getestado_deposito_retiro()->getId()]=cheque_cuenta_corriente_util::getestado_deposito_retiroDescripcion($estado_deposito_retiroLogic->getestado_deposito_retiro());
				$this->idestado_deposito_retiroDefaultFK=$estado_deposito_retiroLogic->getestado_deposito_retiro()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=cheque_cuenta_corriente_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombossucursalsFK($sucursals){

		foreach ($sucursals as $sucursalLocal ) {
			if($this->idsucursalDefaultFK==0) {
				$this->idsucursalDefaultFK=$sucursalLocal->getId();
			}

			$this->sucursalsFK[$sucursalLocal->getId()]=cheque_cuenta_corriente_util::getsucursalDescripcion($sucursalLocal);
		}
	}

	public function prepararCombosejerciciosFK($ejercicios){

		foreach ($ejercicios as $ejercicioLocal ) {
			if($this->idejercicioDefaultFK==0) {
				$this->idejercicioDefaultFK=$ejercicioLocal->getId();
			}

			$this->ejerciciosFK[$ejercicioLocal->getId()]=cheque_cuenta_corriente_util::getejercicioDescripcion($ejercicioLocal);
		}
	}

	public function prepararCombosperiodosFK($periodos){

		foreach ($periodos as $periodoLocal ) {
			if($this->idperiodoDefaultFK==0) {
				$this->idperiodoDefaultFK=$periodoLocal->getId();
			}

			$this->periodosFK[$periodoLocal->getId()]=cheque_cuenta_corriente_util::getperiodoDescripcion($periodoLocal);
		}
	}

	public function prepararCombosusuariosFK($usuarios){

		foreach ($usuarios as $usuarioLocal ) {
			if($this->idusuarioDefaultFK==0) {
				$this->idusuarioDefaultFK=$usuarioLocal->getId();
			}

			$this->usuariosFK[$usuarioLocal->getId()]=cheque_cuenta_corriente_util::getusuarioDescripcion($usuarioLocal);
		}
	}

	public function prepararComboscuenta_corrientesFK($cuenta_corrientes){

		foreach ($cuenta_corrientes as $cuenta_corrienteLocal ) {
			if($this->idcuenta_corrienteDefaultFK==0) {
				$this->idcuenta_corrienteDefaultFK=$cuenta_corrienteLocal->getId();
			}

			$this->cuenta_corrientesFK[$cuenta_corrienteLocal->getId()]=cheque_cuenta_corriente_util::getcuenta_corrienteDescripcion($cuenta_corrienteLocal);
		}
	}

	public function prepararComboscategoria_chequesFK($categoria_cheques){

		foreach ($categoria_cheques as $categoria_chequeLocal ) {
			if($this->idcategoria_chequeDefaultFK==0) {
				$this->idcategoria_chequeDefaultFK=$categoria_chequeLocal->getId();
			}

			$this->categoria_chequesFK[$categoria_chequeLocal->getId()]=cheque_cuenta_corriente_util::getcategoria_chequeDescripcion($categoria_chequeLocal);
		}
	}

	public function prepararCombosclientesFK($clientes){

		foreach ($clientes as $clienteLocal ) {
			if($this->idclienteDefaultFK==0) {
				$this->idclienteDefaultFK=$clienteLocal->getId();
			}

			$this->clientesFK[$clienteLocal->getId()]=cheque_cuenta_corriente_util::getclienteDescripcion($clienteLocal);
		}
	}

	public function prepararCombosproveedorsFK($proveedors){

		foreach ($proveedors as $proveedorLocal ) {
			if($this->idproveedorDefaultFK==0) {
				$this->idproveedorDefaultFK=$proveedorLocal->getId();
			}

			$this->proveedorsFK[$proveedorLocal->getId()]=cheque_cuenta_corriente_util::getproveedorDescripcion($proveedorLocal);
		}
	}

	public function prepararCombosbeneficiario_ocacional_chequesFK($beneficiario_ocacional_cheques){

		foreach ($beneficiario_ocacional_cheques as $beneficiario_ocacional_chequeLocal ) {
			if($this->idbeneficiario_ocacional_chequeDefaultFK==0) {
				$this->idbeneficiario_ocacional_chequeDefaultFK=$beneficiario_ocacional_chequeLocal->getId();
			}

			$this->beneficiario_ocacional_chequesFK[$beneficiario_ocacional_chequeLocal->getId()]=cheque_cuenta_corriente_util::getbeneficiario_ocacional_chequeDescripcion($beneficiario_ocacional_chequeLocal);
		}
	}

	public function prepararCombosestado_deposito_retirosFK($estado_deposito_retiros){

		foreach ($estado_deposito_retiros as $estado_deposito_retiroLocal ) {
			if($this->idestado_deposito_retiroDefaultFK==0) {
				$this->idestado_deposito_retiroDefaultFK=$estado_deposito_retiroLocal->getId();
			}

			$this->estado_deposito_retirosFK[$estado_deposito_retiroLocal->getId()]=cheque_cuenta_corriente_util::getestado_deposito_retiroDescripcion($estado_deposito_retiroLocal);
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

			$strDescripcionempresa=cheque_cuenta_corriente_util::getempresaDescripcion($empresaLogic->getempresa());

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

			$strDescripcionsucursal=cheque_cuenta_corriente_util::getsucursalDescripcion($sucursalLogic->getsucursal());

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

			$strDescripcionejercicio=cheque_cuenta_corriente_util::getejercicioDescripcion($ejercicioLogic->getejercicio());

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

			$strDescripcionperiodo=cheque_cuenta_corriente_util::getperiodoDescripcion($periodoLogic->getperiodo());

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

			$strDescripcionusuario=cheque_cuenta_corriente_util::getusuarioDescripcion($usuarioLogic->getusuario());

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

			$strDescripcioncuenta_corriente=cheque_cuenta_corriente_util::getcuenta_corrienteDescripcion($cuenta_corrienteLogic->getcuenta_corriente());

		} else {
			$strDescripcioncuenta_corriente='null';
		}

		return $strDescripcioncuenta_corriente;
	}

	public function cargarDescripcioncategoria_chequeFK($idcategoria_cheque,$connexion=null){
		$categoria_chequeLogic= new categoria_cheque_logic();
		$categoria_chequeLogic->setConnexion($connexion);
		$categoria_chequeLogic->getcategoria_chequeDataAccess()->isForFKData=true;
		$strDescripcioncategoria_cheque='';

		if($idcategoria_cheque!=null && $idcategoria_cheque!='' && $idcategoria_cheque!='null') {
			if($connexion!=null) {
				$categoria_chequeLogic->getEntity($idcategoria_cheque);//WithConnection
			} else {
				$categoria_chequeLogic->getEntityWithConnection($idcategoria_cheque);//
			}

			$strDescripcioncategoria_cheque=cheque_cuenta_corriente_util::getcategoria_chequeDescripcion($categoria_chequeLogic->getcategoria_cheque());

		} else {
			$strDescripcioncategoria_cheque='null';
		}

		return $strDescripcioncategoria_cheque;
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

			$strDescripcioncliente=cheque_cuenta_corriente_util::getclienteDescripcion($clienteLogic->getcliente());

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

			$strDescripcionproveedor=cheque_cuenta_corriente_util::getproveedorDescripcion($proveedorLogic->getproveedor());

		} else {
			$strDescripcionproveedor='null';
		}

		return $strDescripcionproveedor;
	}

	public function cargarDescripcionbeneficiario_ocacional_chequeFK($idbeneficiario_ocacional_cheque,$connexion=null){
		$beneficiario_ocacional_chequeLogic= new beneficiario_ocacional_cheque_logic();
		$beneficiario_ocacional_chequeLogic->setConnexion($connexion);
		$beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_chequeDataAccess()->isForFKData=true;
		$strDescripcionbeneficiario_ocacional_cheque='';

		if($idbeneficiario_ocacional_cheque!=null && $idbeneficiario_ocacional_cheque!='' && $idbeneficiario_ocacional_cheque!='null') {
			if($connexion!=null) {
				$beneficiario_ocacional_chequeLogic->getEntity($idbeneficiario_ocacional_cheque);//WithConnection
			} else {
				$beneficiario_ocacional_chequeLogic->getEntityWithConnection($idbeneficiario_ocacional_cheque);//
			}

			$strDescripcionbeneficiario_ocacional_cheque=cheque_cuenta_corriente_util::getbeneficiario_ocacional_chequeDescripcion($beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque());

		} else {
			$strDescripcionbeneficiario_ocacional_cheque='null';
		}

		return $strDescripcionbeneficiario_ocacional_cheque;
	}

	public function cargarDescripcionestado_deposito_retiroFK($idestado_deposito_retiro,$connexion=null){
		$estado_deposito_retiroLogic= new estado_deposito_retiro_logic();
		$estado_deposito_retiroLogic->setConnexion($connexion);
		$estado_deposito_retiroLogic->getestado_deposito_retiroDataAccess()->isForFKData=true;
		$strDescripcionestado_deposito_retiro='';

		if($idestado_deposito_retiro!=null && $idestado_deposito_retiro!='' && $idestado_deposito_retiro!='null') {
			if($connexion!=null) {
				$estado_deposito_retiroLogic->getEntity($idestado_deposito_retiro);//WithConnection
			} else {
				$estado_deposito_retiroLogic->getEntityWithConnection($idestado_deposito_retiro);//
			}

			$strDescripcionestado_deposito_retiro=cheque_cuenta_corriente_util::getestado_deposito_retiroDescripcion($estado_deposito_retiroLogic->getestado_deposito_retiro());

		} else {
			$strDescripcionestado_deposito_retiro='null';
		}

		return $strDescripcionestado_deposito_retiro;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(cheque_cuenta_corriente $cheque_cuenta_corrienteClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$cheque_cuenta_corrienteClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
				$cheque_cuenta_corrienteClase->setid_sucursal($this->parametroGeneralUsuarioActual->getid_sucursal());
				$cheque_cuenta_corrienteClase->setid_ejercicio($this->parametroGeneralUsuarioActual->getid_ejercicio());
				$cheque_cuenta_corrienteClase->setid_periodo($this->parametroGeneralUsuarioActual->getid_periodo());
				$cheque_cuenta_corrienteClase->setid_usuario($this->usuarioActual->getId());
			
			
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

		$this->strVisibleFK_Idbeneficiario_ocacional=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idcategoria_cheque=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idestado_deposito_retiro=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionempresa;
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

		$this->strVisibleFK_Idbeneficiario_ocacional=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idcategoria_cheque=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idestado_deposito_retiro=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idsucursal=$strParaVisiblesucursal;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionsucursal;
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

		$this->strVisibleFK_Idbeneficiario_ocacional=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idcategoria_cheque=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idejercicio=$strParaVisibleejercicio;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idestado_deposito_retiro=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionejercicio;
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

		$this->strVisibleFK_Idbeneficiario_ocacional=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idcategoria_cheque=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idestado_deposito_retiro=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idperiodo=$strParaVisibleperiodo;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionperiodo;
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

		$this->strVisibleFK_Idbeneficiario_ocacional=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idcategoria_cheque=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idestado_deposito_retiro=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionusuario;
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

		$this->strVisibleFK_Idbeneficiario_ocacional=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idcategoria_cheque=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisiblecuenta_corriente;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idestado_deposito_retiro=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacioncuenta_corriente;
	}

	public function setVisibleBusquedasParacategoria_cheque($isParacategoria_cheque){
		$strParaVisiblecategoria_cheque='display:table-row';
		$strParaVisibleNegacioncategoria_cheque='display:none';

		if($isParacategoria_cheque) {
			$strParaVisiblecategoria_cheque='display:table-row';
			$strParaVisibleNegacioncategoria_cheque='display:none';
		} else {
			$strParaVisiblecategoria_cheque='display:none';
			$strParaVisibleNegacioncategoria_cheque='display:table-row';
		}


		$strParaVisibleNegacioncategoria_cheque=trim($strParaVisibleNegacioncategoria_cheque);

		$this->strVisibleFK_Idbeneficiario_ocacional=$strParaVisibleNegacioncategoria_cheque;
		$this->strVisibleFK_Idcategoria_cheque=$strParaVisiblecategoria_cheque;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacioncategoria_cheque;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacioncategoria_cheque;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacioncategoria_cheque;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncategoria_cheque;
		$this->strVisibleFK_Idestado_deposito_retiro=$strParaVisibleNegacioncategoria_cheque;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacioncategoria_cheque;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacioncategoria_cheque;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacioncategoria_cheque;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacioncategoria_cheque;
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

		$this->strVisibleFK_Idbeneficiario_ocacional=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idcategoria_cheque=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idcliente=$strParaVisiblecliente;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idestado_deposito_retiro=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacioncliente;
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

		$this->strVisibleFK_Idbeneficiario_ocacional=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idcategoria_cheque=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idestado_deposito_retiro=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idproveedor=$strParaVisibleproveedor;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionproveedor;
	}

	public function setVisibleBusquedasParabeneficiario_ocacional_cheque($isParabeneficiario_ocacional_cheque){
		$strParaVisiblebeneficiario_ocacional_cheque='display:table-row';
		$strParaVisibleNegacionbeneficiario_ocacional_cheque='display:none';

		if($isParabeneficiario_ocacional_cheque) {
			$strParaVisiblebeneficiario_ocacional_cheque='display:table-row';
			$strParaVisibleNegacionbeneficiario_ocacional_cheque='display:none';
		} else {
			$strParaVisiblebeneficiario_ocacional_cheque='display:none';
			$strParaVisibleNegacionbeneficiario_ocacional_cheque='display:table-row';
		}


		$strParaVisibleNegacionbeneficiario_ocacional_cheque=trim($strParaVisibleNegacionbeneficiario_ocacional_cheque);

		$this->strVisibleFK_Idbeneficiario_ocacional=$strParaVisiblebeneficiario_ocacional_cheque;
		$this->strVisibleFK_Idcategoria_cheque=$strParaVisibleNegacionbeneficiario_ocacional_cheque;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionbeneficiario_ocacional_cheque;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionbeneficiario_ocacional_cheque;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionbeneficiario_ocacional_cheque;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionbeneficiario_ocacional_cheque;
		$this->strVisibleFK_Idestado_deposito_retiro=$strParaVisibleNegacionbeneficiario_ocacional_cheque;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionbeneficiario_ocacional_cheque;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionbeneficiario_ocacional_cheque;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionbeneficiario_ocacional_cheque;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionbeneficiario_ocacional_cheque;
	}

	public function setVisibleBusquedasParaestado_deposito_retiro($isParaestado_deposito_retiro){
		$strParaVisibleestado_deposito_retiro='display:table-row';
		$strParaVisibleNegacionestado_deposito_retiro='display:none';

		if($isParaestado_deposito_retiro) {
			$strParaVisibleestado_deposito_retiro='display:table-row';
			$strParaVisibleNegacionestado_deposito_retiro='display:none';
		} else {
			$strParaVisibleestado_deposito_retiro='display:none';
			$strParaVisibleNegacionestado_deposito_retiro='display:table-row';
		}


		$strParaVisibleNegacionestado_deposito_retiro=trim($strParaVisibleNegacionestado_deposito_retiro);

		$this->strVisibleFK_Idbeneficiario_ocacional=$strParaVisibleNegacionestado_deposito_retiro;
		$this->strVisibleFK_Idcategoria_cheque=$strParaVisibleNegacionestado_deposito_retiro;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionestado_deposito_retiro;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionestado_deposito_retiro;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionestado_deposito_retiro;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionestado_deposito_retiro;
		$this->strVisibleFK_Idestado_deposito_retiro=$strParaVisibleestado_deposito_retiro;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionestado_deposito_retiro;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionestado_deposito_retiro;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionestado_deposito_retiro;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionestado_deposito_retiro;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idcheque_cuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcheque_cuenta_corrienteActual=$idcheque_cuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcheque_cuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParasucursal() {//$idcheque_cuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcheque_cuenta_corrienteActual=$idcheque_cuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.sucursal_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',sucursal_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(sucursal_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcheque_cuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaejercicio() {//$idcheque_cuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcheque_cuenta_corrienteActual=$idcheque_cuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.ejercicio_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',ejercicio_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ejercicio_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcheque_cuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaperiodo() {//$idcheque_cuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcheque_cuenta_corrienteActual=$idcheque_cuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.periodo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',periodo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(periodo_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcheque_cuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParausuario() {//$idcheque_cuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcheque_cuenta_corrienteActual=$idcheque_cuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.usuario_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcheque_cuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta_corriente() {//$idcheque_cuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcheque_cuenta_corrienteActual=$idcheque_cuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_corriente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_corriente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_corriente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_corriente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_corriente_util::$STR_CLASS_NAME,'cuentascorrientes','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcheque_cuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacategoria_cheque() {//$idcheque_cuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcheque_cuenta_corrienteActual=$idcheque_cuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.categoria_cheque_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_categoria_cheque(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',categoria_cheque_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_categoria_cheque(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(categoria_cheque_util::$STR_CLASS_NAME,'cuentascorrientes','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcheque_cuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacliente() {//$idcheque_cuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcheque_cuenta_corrienteActual=$idcheque_cuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cliente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cliente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cliente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cliente_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcheque_cuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaproveedor() {//$idcheque_cuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcheque_cuenta_corrienteActual=$idcheque_cuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.proveedor_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_proveedor(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_proveedor(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(proveedor_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcheque_cuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParabeneficiario_ocacional_cheque() {//$idcheque_cuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcheque_cuenta_corrienteActual=$idcheque_cuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.beneficiario_ocacional_cheque_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_beneficiario_ocacional_cheque(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',beneficiario_ocacional_cheque_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_beneficiario_ocacional_cheque(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(beneficiario_ocacional_cheque_util::$STR_CLASS_NAME,'cuentascorrientes','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcheque_cuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaestado_deposito_retiro() {//$idcheque_cuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcheque_cuenta_corrienteActual=$idcheque_cuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.estado_deposito_retiro_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado_deposito_retiro(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',estado_deposito_retiro_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cheque_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado_deposito_retiro(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(estado_deposito_retiro_util::$STR_CLASS_NAME,'cuentascorrientes','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcheque_cuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(cheque_cuenta_corriente_util::$STR_SESSION_NAME,cheque_cuenta_corriente_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$cheque_cuenta_corriente_session=$this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME);
				
		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();		
			//$this->Session->write('cheque_cuenta_corriente_session',$cheque_cuenta_corriente_session);							
		}
		*/
		
		$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
    	$cheque_cuenta_corriente_session->strPathNavegacionActual=cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
    	$cheque_cuenta_corriente_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(cheque_cuenta_corriente_util::$STR_SESSION_NAME,serialize($cheque_cuenta_corriente_session));		
	}	
	
	public function getSetBusquedasSesionConfig(cheque_cuenta_corriente_session $cheque_cuenta_corriente_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionFK!=null && $cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionFK==true) {
			if($cheque_cuenta_corriente_session->bigIdActualFK!=null && $cheque_cuenta_corriente_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$cheque_cuenta_corriente_session->bigIdActualFKParaPosibleAtras=$cheque_cuenta_corriente_session->bigIdActualFK;*/
			}
				
			$cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(cheque_cuenta_corriente_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionempresa!=null && $cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($cheque_cuenta_corriente_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(cheque_cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cheque_cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cheque_cuenta_corriente_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($cheque_cuenta_corriente_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cheque_cuenta_corriente_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($cheque_cuenta_corriente_session->intNumeroPaginacion==cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cheque_cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			else if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionsucursal!=null && $cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionsucursal==true)
			{
				if($cheque_cuenta_corriente_session->bigidsucursalActual!=0) {
					$this->strAccionBusqueda='FK_Idsucursal';

					$existe_history=HistoryWeb::ExisteElemento(cheque_cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cheque_cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cheque_cuenta_corriente_session->bigidsucursalActualDescripcion);
						$historyWeb->setIdActual($cheque_cuenta_corriente_session->bigidsucursalActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cheque_cuenta_corriente_session->bigidsucursalActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionsucursal=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($cheque_cuenta_corriente_session->intNumeroPaginacion==cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cheque_cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			else if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionejercicio!=null && $cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionejercicio==true)
			{
				if($cheque_cuenta_corriente_session->bigidejercicioActual!=0) {
					$this->strAccionBusqueda='FK_Idejercicio';

					$existe_history=HistoryWeb::ExisteElemento(cheque_cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cheque_cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cheque_cuenta_corriente_session->bigidejercicioActualDescripcion);
						$historyWeb->setIdActual($cheque_cuenta_corriente_session->bigidejercicioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cheque_cuenta_corriente_session->bigidejercicioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionejercicio=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($cheque_cuenta_corriente_session->intNumeroPaginacion==cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cheque_cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			else if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionperiodo!=null && $cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionperiodo==true)
			{
				if($cheque_cuenta_corriente_session->bigidperiodoActual!=0) {
					$this->strAccionBusqueda='FK_Idperiodo';

					$existe_history=HistoryWeb::ExisteElemento(cheque_cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cheque_cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cheque_cuenta_corriente_session->bigidperiodoActualDescripcion);
						$historyWeb->setIdActual($cheque_cuenta_corriente_session->bigidperiodoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cheque_cuenta_corriente_session->bigidperiodoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionperiodo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($cheque_cuenta_corriente_session->intNumeroPaginacion==cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cheque_cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			else if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionusuario!=null && $cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionusuario==true)
			{
				if($cheque_cuenta_corriente_session->bigidusuarioActual!=0) {
					$this->strAccionBusqueda='FK_Idusuario';

					$existe_history=HistoryWeb::ExisteElemento(cheque_cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cheque_cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cheque_cuenta_corriente_session->bigidusuarioActualDescripcion);
						$historyWeb->setIdActual($cheque_cuenta_corriente_session->bigidusuarioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cheque_cuenta_corriente_session->bigidusuarioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionusuario=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($cheque_cuenta_corriente_session->intNumeroPaginacion==cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cheque_cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			else if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta_corriente!=null && $cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta_corriente==true)
			{
				if($cheque_cuenta_corriente_session->bigidcuenta_corrienteActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta_corriente';

					$existe_history=HistoryWeb::ExisteElemento(cheque_cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cheque_cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cheque_cuenta_corriente_session->bigidcuenta_corrienteActualDescripcion);
						$historyWeb->setIdActual($cheque_cuenta_corriente_session->bigidcuenta_corrienteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cheque_cuenta_corriente_session->bigidcuenta_corrienteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta_corriente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($cheque_cuenta_corriente_session->intNumeroPaginacion==cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cheque_cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			else if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesioncategoria_cheque!=null && $cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesioncategoria_cheque==true)
			{
				if($cheque_cuenta_corriente_session->bigidcategoria_chequeActual!=0) {
					$this->strAccionBusqueda='FK_Idcategoria_cheque';

					$existe_history=HistoryWeb::ExisteElemento(cheque_cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cheque_cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cheque_cuenta_corriente_session->bigidcategoria_chequeActualDescripcion);
						$historyWeb->setIdActual($cheque_cuenta_corriente_session->bigidcategoria_chequeActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cheque_cuenta_corriente_session->bigidcategoria_chequeActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesioncategoria_cheque=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($cheque_cuenta_corriente_session->intNumeroPaginacion==cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cheque_cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			else if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesioncliente!=null && $cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesioncliente==true)
			{
				if($cheque_cuenta_corriente_session->bigidclienteActual!=0) {
					$this->strAccionBusqueda='FK_Idcliente';

					$existe_history=HistoryWeb::ExisteElemento(cheque_cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cheque_cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cheque_cuenta_corriente_session->bigidclienteActualDescripcion);
						$historyWeb->setIdActual($cheque_cuenta_corriente_session->bigidclienteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cheque_cuenta_corriente_session->bigidclienteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesioncliente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($cheque_cuenta_corriente_session->intNumeroPaginacion==cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cheque_cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			else if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionproveedor!=null && $cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionproveedor==true)
			{
				if($cheque_cuenta_corriente_session->bigidproveedorActual!=0) {
					$this->strAccionBusqueda='FK_Idproveedor';

					$existe_history=HistoryWeb::ExisteElemento(cheque_cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cheque_cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cheque_cuenta_corriente_session->bigidproveedorActualDescripcion);
						$historyWeb->setIdActual($cheque_cuenta_corriente_session->bigidproveedorActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cheque_cuenta_corriente_session->bigidproveedorActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionproveedor=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($cheque_cuenta_corriente_session->intNumeroPaginacion==cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cheque_cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			else if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionbeneficiario_ocacional_cheque!=null && $cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionbeneficiario_ocacional_cheque==true)
			{
				if($cheque_cuenta_corriente_session->bigidbeneficiario_ocacional_chequeActual!=0) {
					$this->strAccionBusqueda='FK_Idbeneficiario_ocacional_cheque';

					$existe_history=HistoryWeb::ExisteElemento(cheque_cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cheque_cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cheque_cuenta_corriente_session->bigidbeneficiario_ocacional_chequeActualDescripcion);
						$historyWeb->setIdActual($cheque_cuenta_corriente_session->bigidbeneficiario_ocacional_chequeActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cheque_cuenta_corriente_session->bigidbeneficiario_ocacional_chequeActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionbeneficiario_ocacional_cheque=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($cheque_cuenta_corriente_session->intNumeroPaginacion==cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cheque_cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			else if($cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionestado_deposito_retiro!=null && $cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionestado_deposito_retiro==true)
			{
				if($cheque_cuenta_corriente_session->bigidestado_deposito_retiroActual!=0) {
					$this->strAccionBusqueda='FK_Idestado_deposito_retiro';

					$existe_history=HistoryWeb::ExisteElemento(cheque_cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cheque_cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cheque_cuenta_corriente_session->bigidestado_deposito_retiroActualDescripcion);
						$historyWeb->setIdActual($cheque_cuenta_corriente_session->bigidestado_deposito_retiroActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cheque_cuenta_corriente_session->bigidestado_deposito_retiroActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionestado_deposito_retiro=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($cheque_cuenta_corriente_session->intNumeroPaginacion==cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cheque_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cheque_cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$cheque_cuenta_corriente_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));
		
		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		$cheque_cuenta_corriente_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$cheque_cuenta_corriente_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cheque_cuenta_corriente_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idbeneficiario_ocacional') {
			$cheque_cuenta_corriente_session->id_beneficiario_ocacional_cheque=$this->id_beneficiario_ocacional_chequeFK_Idbeneficiario_ocacional;	

		}
		else if($this->strAccionBusqueda=='FK_Idcategoria_cheque') {
			$cheque_cuenta_corriente_session->id_categoria_cheque=$this->id_categoria_chequeFK_Idcategoria_cheque;	

		}
		else if($this->strAccionBusqueda=='FK_Idcliente') {
			$cheque_cuenta_corriente_session->id_cliente=$this->id_clienteFK_Idcliente;	

		}
		else if($this->strAccionBusqueda=='FK_Idcuenta_corriente') {
			$cheque_cuenta_corriente_session->id_cuenta_corriente=$this->id_cuenta_corrienteFK_Idcuenta_corriente;	

		}
		else if($this->strAccionBusqueda=='FK_Idejercicio') {
			$cheque_cuenta_corriente_session->id_ejercicio=$this->id_ejercicioFK_Idejercicio;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$cheque_cuenta_corriente_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idestado_deposito_retiro') {
			$cheque_cuenta_corriente_session->id_estado_deposito_retiro=$this->id_estado_deposito_retiroFK_Idestado_deposito_retiro;	

		}
		else if($this->strAccionBusqueda=='FK_Idperiodo') {
			$cheque_cuenta_corriente_session->id_periodo=$this->id_periodoFK_Idperiodo;	

		}
		else if($this->strAccionBusqueda=='FK_Idproveedor') {
			$cheque_cuenta_corriente_session->id_proveedor=$this->id_proveedorFK_Idproveedor;	

		}
		else if($this->strAccionBusqueda=='FK_Idsucursal') {
			$cheque_cuenta_corriente_session->id_sucursal=$this->id_sucursalFK_Idsucursal;	

		}
		else if($this->strAccionBusqueda=='FK_Idusuario') {
			$cheque_cuenta_corriente_session->id_usuario=$this->id_usuarioFK_Idusuario;	

		}
		
		$this->Session->write(cheque_cuenta_corriente_util::$STR_SESSION_NAME,serialize($cheque_cuenta_corriente_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(cheque_cuenta_corriente_session $cheque_cuenta_corriente_session) {
		
		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));
		}
		
		if($cheque_cuenta_corriente_session==null) {
		   $cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		if($cheque_cuenta_corriente_session->strUltimaBusqueda!=null && $cheque_cuenta_corriente_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$cheque_cuenta_corriente_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$cheque_cuenta_corriente_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$cheque_cuenta_corriente_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idbeneficiario_ocacional') {
				$this->id_beneficiario_ocacional_chequeFK_Idbeneficiario_ocacional=$cheque_cuenta_corriente_session->id_beneficiario_ocacional_cheque;
				$cheque_cuenta_corriente_session->id_beneficiario_ocacional_cheque=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idcategoria_cheque') {
				$this->id_categoria_chequeFK_Idcategoria_cheque=$cheque_cuenta_corriente_session->id_categoria_cheque;
				$cheque_cuenta_corriente_session->id_categoria_cheque=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idcliente') {
				$this->id_clienteFK_Idcliente=$cheque_cuenta_corriente_session->id_cliente;
				$cheque_cuenta_corriente_session->id_cliente=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idcuenta_corriente') {
				$this->id_cuenta_corrienteFK_Idcuenta_corriente=$cheque_cuenta_corriente_session->id_cuenta_corriente;
				$cheque_cuenta_corriente_session->id_cuenta_corriente=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idejercicio') {
				$this->id_ejercicioFK_Idejercicio=$cheque_cuenta_corriente_session->id_ejercicio;
				$cheque_cuenta_corriente_session->id_ejercicio=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$cheque_cuenta_corriente_session->id_empresa;
				$cheque_cuenta_corriente_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idestado_deposito_retiro') {
				$this->id_estado_deposito_retiroFK_Idestado_deposito_retiro=$cheque_cuenta_corriente_session->id_estado_deposito_retiro;
				$cheque_cuenta_corriente_session->id_estado_deposito_retiro=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idperiodo') {
				$this->id_periodoFK_Idperiodo=$cheque_cuenta_corriente_session->id_periodo;
				$cheque_cuenta_corriente_session->id_periodo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idproveedor') {
				$this->id_proveedorFK_Idproveedor=$cheque_cuenta_corriente_session->id_proveedor;
				$cheque_cuenta_corriente_session->id_proveedor=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idsucursal') {
				$this->id_sucursalFK_Idsucursal=$cheque_cuenta_corriente_session->id_sucursal;
				$cheque_cuenta_corriente_session->id_sucursal=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idusuario') {
				$this->id_usuarioFK_Idusuario=$cheque_cuenta_corriente_session->id_usuario;
				$cheque_cuenta_corriente_session->id_usuario=-1;

			}
		}
		
		$cheque_cuenta_corriente_session->strUltimaBusqueda='';
		//$cheque_cuenta_corriente_session->intNumeroPaginacion=10;
		$cheque_cuenta_corriente_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(cheque_cuenta_corriente_util::$STR_SESSION_NAME,serialize($cheque_cuenta_corriente_session));		
	}
	
	public function cheque_cuenta_corrientesControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idsucursalDefaultFK = 0;
		$this->idejercicioDefaultFK = 0;
		$this->idperiodoDefaultFK = 0;
		$this->idusuarioDefaultFK = 0;
		$this->idcuenta_corrienteDefaultFK = 0;
		$this->idcategoria_chequeDefaultFK = 0;
		$this->idclienteDefaultFK = 0;
		$this->idproveedorDefaultFK = 0;
		$this->idbeneficiario_ocacional_chequeDefaultFK = 0;
		$this->idestado_deposito_retiroDefaultFK = 0;
	}
	
	public function setcheque_cuenta_corrienteFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_sucursal',$this->idsucursalDefaultFK);
		$this->setExistDataCampoForm('form','id_ejercicio',$this->idejercicioDefaultFK);
		$this->setExistDataCampoForm('form','id_periodo',$this->idperiodoDefaultFK);
		$this->setExistDataCampoForm('form','id_usuario',$this->idusuarioDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta_corriente',$this->idcuenta_corrienteDefaultFK);
		$this->setExistDataCampoForm('form','id_categoria_cheque',$this->idcategoria_chequeDefaultFK);
		$this->setExistDataCampoForm('form','id_cliente',$this->idclienteDefaultFK);
		$this->setExistDataCampoForm('form','id_proveedor',$this->idproveedorDefaultFK);
		$this->setExistDataCampoForm('form','id_beneficiario_ocacional_cheque',$this->idbeneficiario_ocacional_chequeDefaultFK);
		$this->setExistDataCampoForm('form','id_estado_deposito_retiro',$this->idestado_deposito_retiroDefaultFK);
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

		sucursal::$class;
		sucursal_carga::$CONTROLLER;

		ejercicio::$class;
		ejercicio_carga::$CONTROLLER;

		periodo::$class;
		periodo_carga::$CONTROLLER;

		usuario::$class;
		usuario_carga::$CONTROLLER;

		cuenta_corriente::$class;
		cuenta_corriente_carga::$CONTROLLER;

		categoria_cheque::$class;
		categoria_cheque_carga::$CONTROLLER;

		cliente::$class;
		cliente_carga::$CONTROLLER;

		proveedor::$class;
		proveedor_carga::$CONTROLLER;

		beneficiario_ocacional_cheque::$class;
		beneficiario_ocacional_cheque_carga::$CONTROLLER;

		estado_deposito_retiro::$class;
		estado_deposito_retiro_carga::$CONTROLLER;
		
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
		interface cheque_cuenta_corriente_controlI {	
		
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
		
		public function onLoad(cheque_cuenta_corriente_session $cheque_cuenta_corriente_session=null);	
		function index(?string $strTypeOnLoadcheque_cuenta_corriente='',?string $strTipoPaginaAuxiliarcheque_cuenta_corriente='',?string $strTipoUsuarioAuxiliarcheque_cuenta_corriente='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadcheque_cuenta_corriente='',string $strTipoPaginaAuxiliarcheque_cuenta_corriente='',string $strTipoUsuarioAuxiliarcheque_cuenta_corriente='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($cheque_cuenta_corrienteReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(cheque_cuenta_corriente $cheque_cuenta_corrienteClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(cheque_cuenta_corriente_session $cheque_cuenta_corriente_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(cheque_cuenta_corriente_session $cheque_cuenta_corriente_session);	
		public function cheque_cuenta_corrientesControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setcheque_cuenta_corrienteFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
