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

namespace com\bydan\contabilidad\cuentaspagar\cuenta_pagar\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/cuenta_pagar/util/cuenta_pagar_carga.php');
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_carga;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_param_return;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\logic\cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\logic\cuenta_pagar_logic_add;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\presentation\session\cuenta_pagar_session;


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

use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;
use com\bydan\contabilidad\inventario\orden_compra\business\logic\orden_compra_logic;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;

use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\business\entity\estado_cuentas_pagar;
use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\business\logic\estado_cuentas_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\util\estado_cuentas_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\util\estado_cuentas_pagar_util;

//REL


use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\presentation\session\debito_cuenta_pagar_session;

use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\presentation\session\credito_cuenta_pagar_session;

use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\presentation\session\pago_cuenta_pagar_session;


/*CARGA ARCHIVOS FRAMEWORK*/
cuenta_pagar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/cuentaspagar/cuenta_pagar/presentation/control/cuenta_pagar_init_control.php');
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\presentation\control\cuenta_pagar_init_control;

include_once('com/bydan/contabilidad/cuentaspagar/cuenta_pagar/presentation/control/cuenta_pagar_base_control.php');
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\presentation\control\cuenta_pagar_base_control;

class cuenta_pagar_control extends cuenta_pagar_base_control {	
	
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
			else if($action=='registrarSesionParadebito_cuenta_pagars' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuenta_pagarActual=$this->getDataId();
				$this->registrarSesionParadebito_cuenta_pagars($idcuenta_pagarActual);
			}
			else if($action=='registrarSesionParacredito_cuenta_pagars' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuenta_pagarActual=$this->getDataId();
				$this->registrarSesionParacredito_cuenta_pagars($idcuenta_pagarActual);
			}
			else if($action=='registrarSesionParapago_cuenta_pagars' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuenta_pagarActual=$this->getDataId();
				$this->registrarSesionParapago_cuenta_pagars($idcuenta_pagarActual);
			} 
			
			
			else if($action=="FK_Idejercicio"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdejercicioParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idestado_cuentas_pagar"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idestado_cuentas_pagarParaProcesar();
			}
			else if($action=="FK_Idorden_compra"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idorden_compraParaProcesar();
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
			else if($action=="FK_Idtermino_pago_proveedor"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtermino_pago_proveedorParaProcesar();
			}
			else if($action=="FK_Idusuario"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdusuarioParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_pagarActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idcuenta_pagarActual
			}
			else if($action=='abrirBusquedaParasucursal') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_pagarActual=$this->getDataId();
				$this->abrirBusquedaParasucursal();//$idcuenta_pagarActual
			}
			else if($action=='abrirBusquedaParaejercicio') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_pagarActual=$this->getDataId();
				$this->abrirBusquedaParaejercicio();//$idcuenta_pagarActual
			}
			else if($action=='abrirBusquedaParaperiodo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_pagarActual=$this->getDataId();
				$this->abrirBusquedaParaperiodo();//$idcuenta_pagarActual
			}
			else if($action=='abrirBusquedaParausuario') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_pagarActual=$this->getDataId();
				$this->abrirBusquedaParausuario();//$idcuenta_pagarActual
			}
			else if($action=='abrirBusquedaParaorden_compra') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_pagarActual=$this->getDataId();
				$this->abrirBusquedaParaorden_compra();//$idcuenta_pagarActual
			}
			else if($action=='abrirBusquedaParaproveedor') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_pagarActual=$this->getDataId();
				$this->abrirBusquedaParaproveedor();//$idcuenta_pagarActual
			}
			else if($action=='abrirBusquedaParatermino_pago_proveedor') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_pagarActual=$this->getDataId();
				$this->abrirBusquedaParatermino_pago_proveedor();//$idcuenta_pagarActual
			}
			else if($action=='abrirBusquedaParaestado_cuentas_pagar') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_pagarActual=$this->getDataId();
				$this->abrirBusquedaParaestado_cuentas_pagar();//$idcuenta_pagarActual
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
					
					$cuenta_pagarController = new cuenta_pagar_control();
					
					$cuenta_pagarController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($cuenta_pagarController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$cuenta_pagarController = new cuenta_pagar_control();
						$cuenta_pagarController = $this;
						
						$jsonResponse = json_encode($cuenta_pagarController->cuenta_pagars);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->cuenta_pagarReturnGeneral==null) {
					$this->cuenta_pagarReturnGeneral=new cuenta_pagar_param_return();
				}
				
				echo($this->cuenta_pagarReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$cuenta_pagarController=new cuenta_pagar_control();
		
		$cuenta_pagarController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$cuenta_pagarController->usuarioActual=new usuario();
		
		$cuenta_pagarController->usuarioActual->setId($this->usuarioActual->getId());
		$cuenta_pagarController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$cuenta_pagarController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$cuenta_pagarController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$cuenta_pagarController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$cuenta_pagarController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$cuenta_pagarController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$cuenta_pagarController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $cuenta_pagarController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadcuenta_pagar= $this->getDataGeneralString('strTypeOnLoadcuenta_pagar');
		$strTipoPaginaAuxiliarcuenta_pagar= $this->getDataGeneralString('strTipoPaginaAuxiliarcuenta_pagar');
		$strTipoUsuarioAuxiliarcuenta_pagar= $this->getDataGeneralString('strTipoUsuarioAuxiliarcuenta_pagar');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadcuenta_pagar,$strTipoPaginaAuxiliarcuenta_pagar,$strTipoUsuarioAuxiliarcuenta_pagar,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadcuenta_pagar!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('cuenta_pagar','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_pagar_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliarcuenta_pagar,$this->strTipoUsuarioAuxiliarcuenta_pagar,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_pagar_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliarcuenta_pagar,$this->strTipoUsuarioAuxiliarcuenta_pagar,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->cuenta_pagarReturnGeneral=new cuenta_pagar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cuenta_pagarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cuenta_pagarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cuenta_pagarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cuenta_pagarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cuenta_pagarReturnGeneral);
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
		$this->cuenta_pagarReturnGeneral=new cuenta_pagar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cuenta_pagarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cuenta_pagarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cuenta_pagarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cuenta_pagarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cuenta_pagarReturnGeneral);
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
		$this->cuenta_pagarReturnGeneral=new cuenta_pagar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cuenta_pagarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cuenta_pagarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cuenta_pagarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cuenta_pagarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cuenta_pagarReturnGeneral);
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
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
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
			
			
			$this->cuenta_pagarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->cuenta_pagarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cuenta_pagarReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->cuenta_pagarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->cuenta_pagarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cuenta_pagarReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->cuenta_pagarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->cuenta_pagarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->cuenta_pagarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cuenta_pagarReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->cuenta_pagarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cuenta_pagarReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->cuenta_pagarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->cuenta_pagarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->cuenta_pagarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cuenta_pagarReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->cuenta_pagarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cuenta_pagarReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
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
		
		$this->cuenta_pagarLogic=new cuenta_pagar_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->cuenta_pagar=new cuenta_pagar();
		
		$this->strTypeOnLoadcuenta_pagar='onload';
		$this->strTipoPaginaAuxiliarcuenta_pagar='none';
		$this->strTipoUsuarioAuxiliarcuenta_pagar='none';	

		$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
		
		$this->cuenta_pagarModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuenta_pagarControllerAdditional=new cuenta_pagar_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(cuenta_pagar_session $cuenta_pagar_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($cuenta_pagar_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadcuenta_pagar='',?string $strTipoPaginaAuxiliarcuenta_pagar='',?string $strTipoUsuarioAuxiliarcuenta_pagar='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadcuenta_pagar=$strTypeOnLoadcuenta_pagar;
			$this->strTipoPaginaAuxiliarcuenta_pagar=$strTipoPaginaAuxiliarcuenta_pagar;
			$this->strTipoUsuarioAuxiliarcuenta_pagar=$strTipoUsuarioAuxiliarcuenta_pagar;
	
			if($strTipoUsuarioAuxiliarcuenta_pagar=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->cuenta_pagar=new cuenta_pagar();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Cuenta Pagars';
			
			
			$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));
							
			if($cuenta_pagar_session==null) {
				$cuenta_pagar_session=new cuenta_pagar_session();
				
				/*$this->Session->write('cuenta_pagar_session',$cuenta_pagar_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($cuenta_pagar_session->strFuncionJsPadre!=null && $cuenta_pagar_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$cuenta_pagar_session->strFuncionJsPadre;
				
				$cuenta_pagar_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($cuenta_pagar_session);
			
			if($strTypeOnLoadcuenta_pagar!=null && $strTypeOnLoadcuenta_pagar=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$cuenta_pagar_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$cuenta_pagar_session->setPaginaPopupVariables(true);
				}
				
				if($cuenta_pagar_session->intNumeroPaginacion==cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_pagar_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,cuenta_pagar_util::$STR_SESSION_NAME,'cuentaspagar');																
			
			} else if($strTypeOnLoadcuenta_pagar!=null && $strTypeOnLoadcuenta_pagar=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$cuenta_pagar_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;*/
				
				if($cuenta_pagar_session->intNumeroPaginacion==cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_pagar_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarcuenta_pagar!=null && $strTipoPaginaAuxiliarcuenta_pagar=='none') {
				/*$cuenta_pagar_session->strStyleDivHeader='display:table-row';*/
				
				/*$cuenta_pagar_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarcuenta_pagar!=null && $strTipoPaginaAuxiliarcuenta_pagar=='iframe') {
					/*
					$cuenta_pagar_session->strStyleDivArbol='display:none';
					$cuenta_pagar_session->strStyleDivHeader='display:none';
					$cuenta_pagar_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$cuenta_pagar_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->cuenta_pagarClase=new cuenta_pagar();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=cuenta_pagar_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(cuenta_pagar_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->cuenta_pagarLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->cuenta_pagarLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$debitocuentapagarLogic=new debito_cuenta_pagar_logic();
			//$cuentacorrientedetalleLogic=new cuenta_corriente_detalle_logic();
			//$creditocuentapagarLogic=new credito_cuenta_pagar_logic();
			//$cuentapagardetalleLogic=new cuenta_pagar_detalle_logic();
			//$pagocuentapagarLogic=new pago_cuenta_pagar_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->cuenta_pagarLogic=new cuenta_pagar_logic();*/
			
			
			$this->cuenta_pagarsModel=null;
			/*new ListDataModel();*/
			
			/*$this->cuenta_pagarsModel.setWrappedData(cuenta_pagarLogic->getcuenta_pagars());*/
						
			$this->cuenta_pagars= array();
			$this->cuenta_pagarsEliminados=array();
			$this->cuenta_pagarsSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= cuenta_pagar_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= cuenta_pagar_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->cuenta_pagar= new cuenta_pagar();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idejercicio='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idestado_cuentas_pagar='display:table-row';
			$this->strVisibleFK_Idorden_compra='display:table-row';
			$this->strVisibleFK_Idperiodo='display:table-row';
			$this->strVisibleFK_Idproveedor='display:table-row';
			$this->strVisibleFK_Idsucursal='display:table-row';
			$this->strVisibleFK_Idtermino_pago_proveedor='display:table-row';
			$this->strVisibleFK_Idusuario='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarcuenta_pagar!=null && $strTipoUsuarioAuxiliarcuenta_pagar!='none' && $strTipoUsuarioAuxiliarcuenta_pagar!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcuenta_pagar);
																
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
				if($strTipoUsuarioAuxiliarcuenta_pagar!=null && $strTipoUsuarioAuxiliarcuenta_pagar!='none' && $strTipoUsuarioAuxiliarcuenta_pagar!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcuenta_pagar);
																
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
				if($strTipoUsuarioAuxiliarcuenta_pagar==null || $strTipoUsuarioAuxiliarcuenta_pagar=='none' || $strTipoUsuarioAuxiliarcuenta_pagar=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarcuenta_pagar,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_pagar_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_pagar_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina cuenta_pagar');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($cuenta_pagar_session);
			
			$this->getSetBusquedasSesionConfig($cuenta_pagar_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportecuenta_pagars($this->strAccionBusqueda,$this->cuenta_pagarLogic->getcuenta_pagars());*/
				} else if($this->strGenerarReporte=='Html')	{
					$cuenta_pagar_session->strServletGenerarHtmlReporte='cuenta_pagarServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(cuenta_pagar_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(cuenta_pagar_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($cuenta_pagar_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarcuenta_pagar!=null && $strTipoUsuarioAuxiliarcuenta_pagar=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($cuenta_pagar_session);
			}
								
			$this->set(cuenta_pagar_util::$STR_SESSION_NAME, $cuenta_pagar_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($cuenta_pagar_session);
			
			/*
			$this->cuenta_pagar->recursive = 0;
			
			$this->cuenta_pagars=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('cuenta_pagars', $this->cuenta_pagars);
			
			$this->set(cuenta_pagar_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->cuenta_pagarActual =$this->cuenta_pagarClase;
			
			/*$this->cuenta_pagarActual =$this->migrarModelcuenta_pagar($this->cuenta_pagarClase);*/
			
			$this->returnHtml(false);
			
			$this->set(cuenta_pagar_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=cuenta_pagar_util::$STR_NOMBRE_OPCION;
				
			if(cuenta_pagar_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=cuenta_pagar_util::$STR_MODULO_OPCION.cuenta_pagar_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(cuenta_pagar_util::$STR_SESSION_NAME,serialize($cuenta_pagar_session));
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
			/*$cuenta_pagarClase= (cuenta_pagar) cuenta_pagarsModel.getRowData();*/
			
			$this->cuenta_pagarClase->setId($this->cuenta_pagar->getId());	
			$this->cuenta_pagarClase->setVersionRow($this->cuenta_pagar->getVersionRow());	
			$this->cuenta_pagarClase->setVersionRow($this->cuenta_pagar->getVersionRow());	
			$this->cuenta_pagarClase->setid_empresa($this->cuenta_pagar->getid_empresa());	
			$this->cuenta_pagarClase->setid_sucursal($this->cuenta_pagar->getid_sucursal());	
			$this->cuenta_pagarClase->setid_ejercicio($this->cuenta_pagar->getid_ejercicio());	
			$this->cuenta_pagarClase->setid_periodo($this->cuenta_pagar->getid_periodo());	
			$this->cuenta_pagarClase->setid_usuario($this->cuenta_pagar->getid_usuario());	
			$this->cuenta_pagarClase->setid_orden_compra($this->cuenta_pagar->getid_orden_compra());	
			$this->cuenta_pagarClase->setid_proveedor($this->cuenta_pagar->getid_proveedor());	
			$this->cuenta_pagarClase->setid_termino_pago_proveedor($this->cuenta_pagar->getid_termino_pago_proveedor());	
			$this->cuenta_pagarClase->setnumero($this->cuenta_pagar->getnumero());	
			$this->cuenta_pagarClase->setfecha_emision($this->cuenta_pagar->getfecha_emision());	
			$this->cuenta_pagarClase->setfecha_vence($this->cuenta_pagar->getfecha_vence());	
			$this->cuenta_pagarClase->setfecha_ultimo_movimiento($this->cuenta_pagar->getfecha_ultimo_movimiento());	
			$this->cuenta_pagarClase->setmonto($this->cuenta_pagar->getmonto());	
			$this->cuenta_pagarClase->setsaldo($this->cuenta_pagar->getsaldo());	
			$this->cuenta_pagarClase->setporcentaje($this->cuenta_pagar->getporcentaje());	
			$this->cuenta_pagarClase->setdescripcion($this->cuenta_pagar->getdescripcion());	
			$this->cuenta_pagarClase->setid_estado_cuentas_pagar($this->cuenta_pagar->getid_estado_cuentas_pagar());	
			$this->cuenta_pagarClase->setreferencia($this->cuenta_pagar->getreferencia());	
		
			/*$this->Session->write('cuenta_pagarVersionRowActual', cuenta_pagar.getVersionRow());*/
			
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
			
			$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));
						
			if($cuenta_pagar_session==null) {
				$cuenta_pagar_session=new cuenta_pagar_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('cuenta_pagar', $this->cuenta_pagar->read(null, $id));
	
			
			$this->cuenta_pagar->recursive = 0;
			
			$this->cuenta_pagars=$this->paginate();
			
			$this->set('cuenta_pagars', $this->cuenta_pagars);
	
			if (empty($this->data)) {
				$this->data = $this->cuenta_pagar->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->cuenta_pagarLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cuenta_pagarClase);
			
			$this->cuenta_pagarActual=$this->cuenta_pagarClase;
			
			/*$this->cuenta_pagarActual =$this->migrarModelcuenta_pagar($this->cuenta_pagarClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cuenta_pagarLogic->getcuenta_pagars(),$this->cuenta_pagarActual);
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_pagarReturnGeneral);
			
			//$this->cuenta_pagarReturnGeneral=$this->cuenta_pagarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cuenta_pagarLogic->getcuenta_pagars(),$this->cuenta_pagarActual,$this->cuenta_pagarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));
						
			if($cuenta_pagar_session==null) {
				$cuenta_pagar_session=new cuenta_pagar_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevocuenta_pagar', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->cuenta_pagarClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cuenta_pagarClase);
			
			$this->cuenta_pagarActual =$this->cuenta_pagarClase;
			
			/*$this->cuenta_pagarActual =$this->migrarModelcuenta_pagar($this->cuenta_pagarClase);*/
			
			$this->setcuenta_pagarFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cuenta_pagarLogic->getcuenta_pagars(),$this->cuenta_pagar);
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_pagarReturnGeneral);
			
			//this->cuenta_pagarReturnGeneral=$this->cuenta_pagarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cuenta_pagarLogic->getcuenta_pagars(),$this->cuenta_pagar,$this->cuenta_pagarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->cuenta_pagarReturnGeneral->getcuenta_pagar()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idsucursalDefaultFK!=null && $this->idsucursalDefaultFK > -1) {
				$this->cuenta_pagarReturnGeneral->getcuenta_pagar()->setid_sucursal($this->idsucursalDefaultFK);
			}

			if($this->idejercicioDefaultFK!=null && $this->idejercicioDefaultFK > -1) {
				$this->cuenta_pagarReturnGeneral->getcuenta_pagar()->setid_ejercicio($this->idejercicioDefaultFK);
			}

			if($this->idperiodoDefaultFK!=null && $this->idperiodoDefaultFK > -1) {
				$this->cuenta_pagarReturnGeneral->getcuenta_pagar()->setid_periodo($this->idperiodoDefaultFK);
			}

			if($this->idusuarioDefaultFK!=null && $this->idusuarioDefaultFK > -1) {
				$this->cuenta_pagarReturnGeneral->getcuenta_pagar()->setid_usuario($this->idusuarioDefaultFK);
			}

			if($this->idorden_compraDefaultFK!=null && $this->idorden_compraDefaultFK > -1) {
				$this->cuenta_pagarReturnGeneral->getcuenta_pagar()->setid_orden_compra($this->idorden_compraDefaultFK);
			}

			if($this->idproveedorDefaultFK!=null && $this->idproveedorDefaultFK > -1) {
				$this->cuenta_pagarReturnGeneral->getcuenta_pagar()->setid_proveedor($this->idproveedorDefaultFK);
			}

			if($this->idtermino_pago_proveedorDefaultFK!=null && $this->idtermino_pago_proveedorDefaultFK > -1) {
				$this->cuenta_pagarReturnGeneral->getcuenta_pagar()->setid_termino_pago_proveedor($this->idtermino_pago_proveedorDefaultFK);
			}

			if($this->idestado_cuentas_pagarDefaultFK!=null && $this->idestado_cuentas_pagarDefaultFK > -1) {
				$this->cuenta_pagarReturnGeneral->getcuenta_pagar()->setid_estado_cuentas_pagar($this->idestado_cuentas_pagarDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->cuenta_pagarReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->cuenta_pagarReturnGeneral->getcuenta_pagar(),$this->cuenta_pagarActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeycuenta_pagar($this->cuenta_pagarReturnGeneral->getcuenta_pagar());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariocuenta_pagar($this->cuenta_pagarReturnGeneral->getcuenta_pagar());*/
			}
			
			if($this->cuenta_pagarReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta_pagarReturnGeneral->getcuenta_pagar(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualcuenta_pagar($this->cuenta_pagar,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->cuenta_pagarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_pagarsAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->cuenta_pagarsAuxiliar=array();
			}
			
			if(count($this->cuenta_pagarsAuxiliar)==2) {
				$cuenta_pagarOrigen=$this->cuenta_pagarsAuxiliar[0];
				$cuenta_pagarDestino=$this->cuenta_pagarsAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($cuenta_pagarOrigen,$cuenta_pagarDestino,true,false,false);
				
				$this->actualizarLista($cuenta_pagarDestino,$this->cuenta_pagars);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->cuenta_pagarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_pagarsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cuenta_pagarsAuxiliar=array();
			}
			
			if(count($this->cuenta_pagarsAuxiliar) > 0) {
				foreach ($this->cuenta_pagarsAuxiliar as $cuenta_pagarSeleccionado) {
					$this->cuenta_pagar=new cuenta_pagar();
					
					$this->setCopiarVariablesObjetos($cuenta_pagarSeleccionado,$this->cuenta_pagar,true,true,false);
						
					$this->cuenta_pagars[]=$this->cuenta_pagar;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->cuenta_pagarsEliminados as $cuenta_pagarEliminado) {
				$this->cuenta_pagarLogic->cuenta_pagars[]=$cuenta_pagarEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->cuenta_pagar=new cuenta_pagar();
							
				$this->cuenta_pagars[]=$this->cuenta_pagar;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
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
		
		$cuenta_pagarActual=new cuenta_pagar();
		
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
				
				$cuenta_pagarActual=$this->cuenta_pagars[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $cuenta_pagarActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $cuenta_pagarActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $cuenta_pagarActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $cuenta_pagarActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $cuenta_pagarActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $cuenta_pagarActual->setid_orden_compra((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $cuenta_pagarActual->setid_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $cuenta_pagarActual->setid_termino_pago_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $cuenta_pagarActual->setnumero($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $cuenta_pagarActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $cuenta_pagarActual->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $cuenta_pagarActual->setfecha_ultimo_movimiento(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $cuenta_pagarActual->setmonto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $cuenta_pagarActual->setsaldo((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $cuenta_pagarActual->setporcentaje((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $cuenta_pagarActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $cuenta_pagarActual->setid_estado_cuentas_pagar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $cuenta_pagarActual->setreferencia($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->cuenta_pagarsAuxiliar=array();		 
		/*$this->cuenta_pagarsEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->cuenta_pagarsAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->cuenta_pagarsAuxiliar=array();
		}
			
		if(count($this->cuenta_pagarsAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->cuenta_pagarsAuxiliar as $cuenta_pagarAuxLocal) {				
				
				foreach($this->cuenta_pagars as $cuenta_pagarLocal) {
					if($cuenta_pagarLocal->getId()==$cuenta_pagarAuxLocal->getId()) {
						$cuenta_pagarLocal->setIsDeleted(true);
						
						/*$this->cuenta_pagarsEliminados[]=$cuenta_pagarLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->cuenta_pagarLogic->setcuenta_pagars($this->cuenta_pagars);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
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
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadcuenta_pagar='',string $strTipoPaginaAuxiliarcuenta_pagar='',string $strTipoUsuarioAuxiliarcuenta_pagar='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadcuenta_pagar,$strTipoPaginaAuxiliarcuenta_pagar,$strTipoUsuarioAuxiliarcuenta_pagar,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->cuenta_pagars) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=cuenta_pagar_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=cuenta_pagar_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=cuenta_pagar_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));
						
			if($cuenta_pagar_session==null) {
				$cuenta_pagar_session=new cuenta_pagar_session();
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
					/*$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;*/
					
					if($cuenta_pagar_session->intNumeroPaginacion==cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$cuenta_pagar_session->intNumeroPaginacion;
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
			
			$this->cuenta_pagarsEliminados=array();
			
			/*$this->cuenta_pagarLogic->setConnexion($connexion);*/
			
			$this->cuenta_pagarLogic->setIsConDeep(true);
			
			$this->cuenta_pagarLogic->getcuenta_pagarDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('orden_compra');$classes[]=$class;
			$class=new Classe('proveedor');$classes[]=$class;
			$class=new Classe('termino_pago_proveedor');$classes[]=$class;
			$class=new Classe('estado_cuentas_pagar');$classes[]=$class;
			
			$this->cuenta_pagarLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_pagarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->cuenta_pagarLogic->getcuenta_pagars()==null|| count($this->cuenta_pagarLogic->getcuenta_pagars())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cuenta_pagars=$this->cuenta_pagarLogic->getcuenta_pagars();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_pagarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->cuenta_pagarsReporte=$this->cuenta_pagarLogic->getcuenta_pagars();
									
						/*$this->generarReportes('Todos',$this->cuenta_pagarLogic->getcuenta_pagars());*/
					
						$this->cuenta_pagarLogic->setcuenta_pagars($this->cuenta_pagars);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_pagarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->cuenta_pagarLogic->getcuenta_pagars()==null|| count($this->cuenta_pagarLogic->getcuenta_pagars())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cuenta_pagars=$this->cuenta_pagarLogic->getcuenta_pagars();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_pagarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->cuenta_pagarsReporte=$this->cuenta_pagarLogic->getcuenta_pagars();
									
						/*$this->generarReportes('Todos',$this->cuenta_pagarLogic->getcuenta_pagars());*/
					
						$this->cuenta_pagarLogic->setcuenta_pagars($this->cuenta_pagars);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idcuenta_pagar=0;*/
				
				if($cuenta_pagar_session->bitBusquedaDesdeFKSesionFK!=null && $cuenta_pagar_session->bitBusquedaDesdeFKSesionFK==true) {
					if($cuenta_pagar_session->bigIdActualFK!=null && $cuenta_pagar_session->bigIdActualFK!=0)	{
						$this->idcuenta_pagar=$cuenta_pagar_session->bigIdActualFK;	
					}
					
					$cuenta_pagar_session->bitBusquedaDesdeFKSesionFK=false;
					
					$cuenta_pagar_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idcuenta_pagar=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idcuenta_pagar=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_pagarLogic->getEntity($this->idcuenta_pagar);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*cuenta_pagarLogicAdditional::getDetalleIndicePorId($idcuenta_pagar);*/

				
				if($this->cuenta_pagarLogic->getcuenta_pagar()!=null) {
					$this->cuenta_pagarLogic->setcuenta_pagars(array());
					$this->cuenta_pagarLogic->cuenta_pagars[]=$this->cuenta_pagarLogic->getcuenta_pagar();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idejercicio')
			{

				if($cuenta_pagar_session->bigidejercicioActual!=null && $cuenta_pagar_session->bigidejercicioActual!=0)
				{
					$this->id_ejercicioFK_Idejercicio=$cuenta_pagar_session->bigidejercicioActual;
					$cuenta_pagar_session->bigidejercicioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_pagarLogic->getsFK_Idejercicio($finalQueryPaginacion,$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_pagarLogicAdditional::getDetalleIndiceFK_Idejercicio($this->id_ejercicioFK_Idejercicio);


					if($this->cuenta_pagarLogic->getcuenta_pagars()==null || count($this->cuenta_pagarLogic->getcuenta_pagars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_pagars=$this->cuenta_pagarLogic->getcuenta_pagars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_pagarLogic->getsFK_Idejercicio('',$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_pagarsReporte=$this->cuenta_pagarLogic->getcuenta_pagars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_pagars("FK_Idejercicio",$this->cuenta_pagarLogic->getcuenta_pagars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_pagarLogic->setcuenta_pagars($cuenta_pagars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($cuenta_pagar_session->bigidempresaActual!=null && $cuenta_pagar_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$cuenta_pagar_session->bigidempresaActual;
					$cuenta_pagar_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_pagarLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_pagarLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->cuenta_pagarLogic->getcuenta_pagars()==null || count($this->cuenta_pagarLogic->getcuenta_pagars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_pagars=$this->cuenta_pagarLogic->getcuenta_pagars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_pagarLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_pagarsReporte=$this->cuenta_pagarLogic->getcuenta_pagars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_pagars("FK_Idempresa",$this->cuenta_pagarLogic->getcuenta_pagars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_pagarLogic->setcuenta_pagars($cuenta_pagars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idestado_cuentas_pagar')
			{

				if($cuenta_pagar_session->bigidestado_cuentas_pagarActual!=null && $cuenta_pagar_session->bigidestado_cuentas_pagarActual!=0)
				{
					$this->id_estado_cuentas_pagarFK_Idestado_cuentas_pagar=$cuenta_pagar_session->bigidestado_cuentas_pagarActual;
					$cuenta_pagar_session->bigidestado_cuentas_pagarActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_pagarLogic->getsFK_Idestado_cuentas_pagar($finalQueryPaginacion,$this->pagination,$this->id_estado_cuentas_pagarFK_Idestado_cuentas_pagar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_pagarLogicAdditional::getDetalleIndiceFK_Idestado_cuentas_pagar($this->id_estado_cuentas_pagarFK_Idestado_cuentas_pagar);


					if($this->cuenta_pagarLogic->getcuenta_pagars()==null || count($this->cuenta_pagarLogic->getcuenta_pagars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_pagars=$this->cuenta_pagarLogic->getcuenta_pagars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_pagarLogic->getsFK_Idestado_cuentas_pagar('',$this->pagination,$this->id_estado_cuentas_pagarFK_Idestado_cuentas_pagar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_pagarsReporte=$this->cuenta_pagarLogic->getcuenta_pagars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_pagars("FK_Idestado_cuentas_pagar",$this->cuenta_pagarLogic->getcuenta_pagars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_pagarLogic->setcuenta_pagars($cuenta_pagars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idorden_compra')
			{

				if($cuenta_pagar_session->bigidorden_compraActual!=null && $cuenta_pagar_session->bigidorden_compraActual!=0)
				{
					$this->id_orden_compraFK_Idorden_compra=$cuenta_pagar_session->bigidorden_compraActual;
					$cuenta_pagar_session->bigidorden_compraActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_pagarLogic->getsFK_Idorden_compra($finalQueryPaginacion,$this->pagination,$this->id_orden_compraFK_Idorden_compra);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_pagarLogicAdditional::getDetalleIndiceFK_Idorden_compra($this->id_orden_compraFK_Idorden_compra);


					if($this->cuenta_pagarLogic->getcuenta_pagars()==null || count($this->cuenta_pagarLogic->getcuenta_pagars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_pagars=$this->cuenta_pagarLogic->getcuenta_pagars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_pagarLogic->getsFK_Idorden_compra('',$this->pagination,$this->id_orden_compraFK_Idorden_compra);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_pagarsReporte=$this->cuenta_pagarLogic->getcuenta_pagars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_pagars("FK_Idorden_compra",$this->cuenta_pagarLogic->getcuenta_pagars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_pagarLogic->setcuenta_pagars($cuenta_pagars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idperiodo')
			{

				if($cuenta_pagar_session->bigidperiodoActual!=null && $cuenta_pagar_session->bigidperiodoActual!=0)
				{
					$this->id_periodoFK_Idperiodo=$cuenta_pagar_session->bigidperiodoActual;
					$cuenta_pagar_session->bigidperiodoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_pagarLogic->getsFK_Idperiodo($finalQueryPaginacion,$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_pagarLogicAdditional::getDetalleIndiceFK_Idperiodo($this->id_periodoFK_Idperiodo);


					if($this->cuenta_pagarLogic->getcuenta_pagars()==null || count($this->cuenta_pagarLogic->getcuenta_pagars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_pagars=$this->cuenta_pagarLogic->getcuenta_pagars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_pagarLogic->getsFK_Idperiodo('',$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_pagarsReporte=$this->cuenta_pagarLogic->getcuenta_pagars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_pagars("FK_Idperiodo",$this->cuenta_pagarLogic->getcuenta_pagars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_pagarLogic->setcuenta_pagars($cuenta_pagars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idproveedor')
			{

				if($cuenta_pagar_session->bigidproveedorActual!=null && $cuenta_pagar_session->bigidproveedorActual!=0)
				{
					$this->id_proveedorFK_Idproveedor=$cuenta_pagar_session->bigidproveedorActual;
					$cuenta_pagar_session->bigidproveedorActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_pagarLogic->getsFK_Idproveedor($finalQueryPaginacion,$this->pagination,$this->id_proveedorFK_Idproveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_pagarLogicAdditional::getDetalleIndiceFK_Idproveedor($this->id_proveedorFK_Idproveedor);


					if($this->cuenta_pagarLogic->getcuenta_pagars()==null || count($this->cuenta_pagarLogic->getcuenta_pagars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_pagars=$this->cuenta_pagarLogic->getcuenta_pagars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_pagarLogic->getsFK_Idproveedor('',$this->pagination,$this->id_proveedorFK_Idproveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_pagarsReporte=$this->cuenta_pagarLogic->getcuenta_pagars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_pagars("FK_Idproveedor",$this->cuenta_pagarLogic->getcuenta_pagars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_pagarLogic->setcuenta_pagars($cuenta_pagars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idsucursal')
			{

				if($cuenta_pagar_session->bigidsucursalActual!=null && $cuenta_pagar_session->bigidsucursalActual!=0)
				{
					$this->id_sucursalFK_Idsucursal=$cuenta_pagar_session->bigidsucursalActual;
					$cuenta_pagar_session->bigidsucursalActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_pagarLogic->getsFK_Idsucursal($finalQueryPaginacion,$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_pagarLogicAdditional::getDetalleIndiceFK_Idsucursal($this->id_sucursalFK_Idsucursal);


					if($this->cuenta_pagarLogic->getcuenta_pagars()==null || count($this->cuenta_pagarLogic->getcuenta_pagars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_pagars=$this->cuenta_pagarLogic->getcuenta_pagars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_pagarLogic->getsFK_Idsucursal('',$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_pagarsReporte=$this->cuenta_pagarLogic->getcuenta_pagars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_pagars("FK_Idsucursal",$this->cuenta_pagarLogic->getcuenta_pagars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_pagarLogic->setcuenta_pagars($cuenta_pagars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtermino_pago_proveedor')
			{

				if($cuenta_pagar_session->bigidtermino_pago_proveedorActual!=null && $cuenta_pagar_session->bigidtermino_pago_proveedorActual!=0)
				{
					$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor=$cuenta_pagar_session->bigidtermino_pago_proveedorActual;
					$cuenta_pagar_session->bigidtermino_pago_proveedorActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_pagarLogic->getsFK_Idtermino_pago_proveedor($finalQueryPaginacion,$this->pagination,$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_pagarLogicAdditional::getDetalleIndiceFK_Idtermino_pago_proveedor($this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor);


					if($this->cuenta_pagarLogic->getcuenta_pagars()==null || count($this->cuenta_pagarLogic->getcuenta_pagars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_pagars=$this->cuenta_pagarLogic->getcuenta_pagars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_pagarLogic->getsFK_Idtermino_pago_proveedor('',$this->pagination,$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_pagarsReporte=$this->cuenta_pagarLogic->getcuenta_pagars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_pagars("FK_Idtermino_pago_proveedor",$this->cuenta_pagarLogic->getcuenta_pagars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_pagarLogic->setcuenta_pagars($cuenta_pagars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idusuario')
			{

				if($cuenta_pagar_session->bigidusuarioActual!=null && $cuenta_pagar_session->bigidusuarioActual!=0)
				{
					$this->id_usuarioFK_Idusuario=$cuenta_pagar_session->bigidusuarioActual;
					$cuenta_pagar_session->bigidusuarioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_pagarLogic->getsFK_Idusuario($finalQueryPaginacion,$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_pagarLogicAdditional::getDetalleIndiceFK_Idusuario($this->id_usuarioFK_Idusuario);


					if($this->cuenta_pagarLogic->getcuenta_pagars()==null || count($this->cuenta_pagarLogic->getcuenta_pagars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_pagars=$this->cuenta_pagarLogic->getcuenta_pagars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_pagarLogic->getsFK_Idusuario('',$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_pagarsReporte=$this->cuenta_pagarLogic->getcuenta_pagars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_pagars("FK_Idusuario",$this->cuenta_pagarLogic->getcuenta_pagars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_pagarLogic->setcuenta_pagars($cuenta_pagars);
					}
				//}

			} 
		
		$cuenta_pagar_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cuenta_pagar_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->cuenta_pagarLogic->loadForeignsKeysDescription();*/
		
		$this->cuenta_pagars=$this->cuenta_pagarLogic->getcuenta_pagars();
		
		if($this->cuenta_pagarsEliminados==null) {
			$this->cuenta_pagarsEliminados=array();
		}
		
		$this->Session->write(cuenta_pagar_util::$STR_SESSION_NAME.'Lista',serialize($this->cuenta_pagars));
		$this->Session->write(cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->cuenta_pagarsEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(cuenta_pagar_util::$STR_SESSION_NAME,serialize($cuenta_pagar_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idcuenta_pagar=$idGeneral;
			
			$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
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
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}

			if(count($this->cuenta_pagars) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
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
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_ejercicioFK_Idejercicio=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idejercicio','cmbid_ejercicio');

			$this->strAccionBusqueda='FK_Idejercicio';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
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
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idestado_cuentas_pagarParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_estado_cuentas_pagarFK_Idestado_cuentas_pagar=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idestado_cuentas_pagar','cmbid_estado_cuentas_pagar');

			$this->strAccionBusqueda='FK_Idestado_cuentas_pagar';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idorden_compraParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_orden_compraFK_Idorden_compra=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idorden_compra','cmbid_orden_compra');

			$this->strAccionBusqueda='FK_Idorden_compra';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
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
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_periodoFK_Idperiodo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idperiodo','cmbid_periodo');

			$this->strAccionBusqueda='FK_Idperiodo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
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
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_proveedorFK_Idproveedor=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idproveedor','cmbid_proveedor');

			$this->strAccionBusqueda='FK_Idproveedor';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
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
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_sucursalFK_Idsucursal=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idsucursal','cmbid_sucursal');

			$this->strAccionBusqueda='FK_Idsucursal';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtermino_pago_proveedorParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtermino_pago_proveedor','cmbid_termino_pago_proveedor');

			$this->strAccionBusqueda='FK_Idtermino_pago_proveedor';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
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
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_usuarioFK_Idusuario=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idusuario','cmbid_usuario');

			$this->strAccionBusqueda='FK_Idusuario';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idejercicio($strFinalQuery,$id_ejercicio)
	{
		try
		{

			$this->cuenta_pagarLogic->getsFK_Idejercicio($strFinalQuery,new Pagination(),$id_ejercicio);
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

			$this->cuenta_pagarLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idestado_cuentas_pagar($strFinalQuery,$id_estado_cuentas_pagar)
	{
		try
		{

			$this->cuenta_pagarLogic->getsFK_Idestado_cuentas_pagar($strFinalQuery,new Pagination(),$id_estado_cuentas_pagar);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idorden_compra($strFinalQuery,$id_orden_compra)
	{
		try
		{

			$this->cuenta_pagarLogic->getsFK_Idorden_compra($strFinalQuery,new Pagination(),$id_orden_compra);
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

			$this->cuenta_pagarLogic->getsFK_Idperiodo($strFinalQuery,new Pagination(),$id_periodo);
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

			$this->cuenta_pagarLogic->getsFK_Idproveedor($strFinalQuery,new Pagination(),$id_proveedor);
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

			$this->cuenta_pagarLogic->getsFK_Idsucursal($strFinalQuery,new Pagination(),$id_sucursal);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtermino_pago_proveedor($strFinalQuery,$id_termino_pago_proveedor)
	{
		try
		{

			$this->cuenta_pagarLogic->getsFK_Idtermino_pago_proveedor($strFinalQuery,new Pagination(),$id_termino_pago_proveedor);
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

			$this->cuenta_pagarLogic->getsFK_Idusuario($strFinalQuery,new Pagination(),$id_usuario);
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
			
			
			$cuenta_pagarForeignKey=new cuenta_pagar_param_return(); //cuenta_pagarForeignKey();
			
			$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));
						
			if($cuenta_pagar_session==null) {
				$cuenta_pagar_session=new cuenta_pagar_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$cuenta_pagarForeignKey=$this->cuenta_pagarLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$cuenta_pagar_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$cuenta_pagarForeignKey->empresasFK;
				$this->idempresaDefaultFK=$cuenta_pagarForeignKey->idempresaDefaultFK;
			}

			if($cuenta_pagar_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$this->strRecargarFkTipos,',')) {
				$this->sucursalsFK=$cuenta_pagarForeignKey->sucursalsFK;
				$this->idsucursalDefaultFK=$cuenta_pagarForeignKey->idsucursalDefaultFK;
			}

			if($cuenta_pagar_session->bitBusquedaDesdeFKSesionsucursal) {
				$this->setVisibleBusquedasParasucursal(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$this->strRecargarFkTipos,',')) {
				$this->ejerciciosFK=$cuenta_pagarForeignKey->ejerciciosFK;
				$this->idejercicioDefaultFK=$cuenta_pagarForeignKey->idejercicioDefaultFK;
			}

			if($cuenta_pagar_session->bitBusquedaDesdeFKSesionejercicio) {
				$this->setVisibleBusquedasParaejercicio(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$this->strRecargarFkTipos,',')) {
				$this->periodosFK=$cuenta_pagarForeignKey->periodosFK;
				$this->idperiodoDefaultFK=$cuenta_pagarForeignKey->idperiodoDefaultFK;
			}

			if($cuenta_pagar_session->bitBusquedaDesdeFKSesionperiodo) {
				$this->setVisibleBusquedasParaperiodo(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$this->strRecargarFkTipos,',')) {
				$this->usuariosFK=$cuenta_pagarForeignKey->usuariosFK;
				$this->idusuarioDefaultFK=$cuenta_pagarForeignKey->idusuarioDefaultFK;
			}

			if($cuenta_pagar_session->bitBusquedaDesdeFKSesionusuario) {
				$this->setVisibleBusquedasParausuario(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_orden_compra',$this->strRecargarFkTipos,',')) {
				$this->orden_comprasFK=$cuenta_pagarForeignKey->orden_comprasFK;
				$this->idorden_compraDefaultFK=$cuenta_pagarForeignKey->idorden_compraDefaultFK;
			}

			if($cuenta_pagar_session->bitBusquedaDesdeFKSesionorden_compra) {
				$this->setVisibleBusquedasParaorden_compra(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$this->strRecargarFkTipos,',')) {
				$this->proveedorsFK=$cuenta_pagarForeignKey->proveedorsFK;
				$this->idproveedorDefaultFK=$cuenta_pagarForeignKey->idproveedorDefaultFK;
			}

			if($cuenta_pagar_session->bitBusquedaDesdeFKSesionproveedor) {
				$this->setVisibleBusquedasParaproveedor(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_termino_pago_proveedor',$this->strRecargarFkTipos,',')) {
				$this->termino_pago_proveedorsFK=$cuenta_pagarForeignKey->termino_pago_proveedorsFK;
				$this->idtermino_pago_proveedorDefaultFK=$cuenta_pagarForeignKey->idtermino_pago_proveedorDefaultFK;
			}

			if($cuenta_pagar_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor) {
				$this->setVisibleBusquedasParatermino_pago_proveedor(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado_cuentas_pagar',$this->strRecargarFkTipos,',')) {
				$this->estado_cuentas_pagarsFK=$cuenta_pagarForeignKey->estado_cuentas_pagarsFK;
				$this->idestado_cuentas_pagarDefaultFK=$cuenta_pagarForeignKey->idestado_cuentas_pagarDefaultFK;
			}

			if($cuenta_pagar_session->bitBusquedaDesdeFKSesionestado_cuentas_pagar) {
				$this->setVisibleBusquedasParaestado_cuentas_pagar(true);
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
	
	function cargarCombosFKFromReturnGeneral($cuenta_pagarReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$cuenta_pagarReturnGeneral->strRecargarFkTipos;
			
			


			if($cuenta_pagarReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$cuenta_pagarReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$cuenta_pagarReturnGeneral->idempresaDefaultFK;
			}


			if($cuenta_pagarReturnGeneral->con_sucursalsFK==true) {
				$this->sucursalsFK=$cuenta_pagarReturnGeneral->sucursalsFK;
				$this->idsucursalDefaultFK=$cuenta_pagarReturnGeneral->idsucursalDefaultFK;
			}


			if($cuenta_pagarReturnGeneral->con_ejerciciosFK==true) {
				$this->ejerciciosFK=$cuenta_pagarReturnGeneral->ejerciciosFK;
				$this->idejercicioDefaultFK=$cuenta_pagarReturnGeneral->idejercicioDefaultFK;
			}


			if($cuenta_pagarReturnGeneral->con_periodosFK==true) {
				$this->periodosFK=$cuenta_pagarReturnGeneral->periodosFK;
				$this->idperiodoDefaultFK=$cuenta_pagarReturnGeneral->idperiodoDefaultFK;
			}


			if($cuenta_pagarReturnGeneral->con_usuariosFK==true) {
				$this->usuariosFK=$cuenta_pagarReturnGeneral->usuariosFK;
				$this->idusuarioDefaultFK=$cuenta_pagarReturnGeneral->idusuarioDefaultFK;
			}


			if($cuenta_pagarReturnGeneral->con_orden_comprasFK==true) {
				$this->orden_comprasFK=$cuenta_pagarReturnGeneral->orden_comprasFK;
				$this->idorden_compraDefaultFK=$cuenta_pagarReturnGeneral->idorden_compraDefaultFK;
			}


			if($cuenta_pagarReturnGeneral->con_proveedorsFK==true) {
				$this->proveedorsFK=$cuenta_pagarReturnGeneral->proveedorsFK;
				$this->idproveedorDefaultFK=$cuenta_pagarReturnGeneral->idproveedorDefaultFK;
			}


			if($cuenta_pagarReturnGeneral->con_termino_pago_proveedorsFK==true) {
				$this->termino_pago_proveedorsFK=$cuenta_pagarReturnGeneral->termino_pago_proveedorsFK;
				$this->idtermino_pago_proveedorDefaultFK=$cuenta_pagarReturnGeneral->idtermino_pago_proveedorDefaultFK;
			}


			if($cuenta_pagarReturnGeneral->con_estado_cuentas_pagarsFK==true) {
				$this->estado_cuentas_pagarsFK=$cuenta_pagarReturnGeneral->estado_cuentas_pagarsFK;
				$this->idestado_cuentas_pagarDefaultFK=$cuenta_pagarReturnGeneral->idestado_cuentas_pagarDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(cuenta_pagar_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));
		
		if($cuenta_pagar_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($cuenta_pagar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($cuenta_pagar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==sucursal_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='sucursal';
			}
			else if($cuenta_pagar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==ejercicio_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='ejercicio';
			}
			else if($cuenta_pagar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==periodo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='periodo';
			}
			else if($cuenta_pagar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==usuario_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='usuario';
			}
			else if($cuenta_pagar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==orden_compra_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='orden_compra';
			}
			else if($cuenta_pagar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==proveedor_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='proveedor';
			}
			else if($cuenta_pagar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==termino_pago_proveedor_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='termino_pago_proveedor';
			}
			else if($cuenta_pagar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==estado_cuentas_pagar_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='estado_cuentas_pagar';
			}
			
			$cuenta_pagar_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}						
			
			$this->cuenta_pagarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_pagarsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cuenta_pagarsAuxiliar=array();
			}
			
			if(count($this->cuenta_pagarsAuxiliar) > 0) {
				
				foreach ($this->cuenta_pagarsAuxiliar as $cuenta_pagarSeleccionado) {
					$this->eliminarTablaBase($cuenta_pagarSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('credito_cuenta_pagar');
			$tipoRelacionReporte->setsDescripcion('Credito s');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('debito_cuenta_pagar');
			$tipoRelacionReporte->setsDescripcion('Debito s');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('pago_cuenta_pagar');
			$tipoRelacionReporte->setsDescripcion('Pago s');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=debito_cuenta_pagar_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=credito_cuenta_pagar_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=pago_cuenta_pagar_util::$STR_NOMBRE_CLASE;
		
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


	public function getorden_comprasFKListSelectItem() 
	{
		$orden_comprasList=array();

		$item=null;

		foreach($this->orden_comprasFK as $orden_compra)
		{
			$item=new SelectItem();
			$item->setLabel($orden_compra->getnumero());
			$item->setValue($orden_compra->getId());
			$orden_comprasList[]=$item;
		}

		return $orden_comprasList;
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


	public function gettermino_pago_proveedorsFKListSelectItem() 
	{
		$termino_pago_proveedorsList=array();

		$item=null;

		foreach($this->termino_pago_proveedorsFK as $termino_pago_proveedor)
		{
			$item=new SelectItem();
			$item->setLabel($termino_pago_proveedor->getdescripcion());
			$item->setValue($termino_pago_proveedor->getId());
			$termino_pago_proveedorsList[]=$item;
		}

		return $termino_pago_proveedorsList;
	}


	public function getestado_cuentas_pagarsFKListSelectItem() 
	{
		$estado_cuentas_pagarsList=array();

		$item=null;

		foreach($this->estado_cuentas_pagarsFK as $estado_cuentas_pagar)
		{
			$item=new SelectItem();
			$item->setLabel($estado_cuentas_pagar->getnombre());
			$item->setValue($estado_cuentas_pagar->getId());
			$estado_cuentas_pagarsList[]=$item;
		}

		return $estado_cuentas_pagarsList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
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
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$cuenta_pagarsNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->cuenta_pagars as $cuenta_pagarLocal) {
				if($cuenta_pagarLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->cuenta_pagar=new cuenta_pagar();
				
				$this->cuenta_pagar->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->cuenta_pagars[]=$this->cuenta_pagar;*/
				
				$cuenta_pagarsNuevos[]=$this->cuenta_pagar;
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
				$class=new Classe('orden_compra');$classes[]=$class;
				$class=new Classe('proveedor');$classes[]=$class;
				$class=new Classe('termino_pago_proveedor');$classes[]=$class;
				$class=new Classe('estado_cuentas_pagar');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->setcuenta_pagars($cuenta_pagarsNuevos);
					
				$this->cuenta_pagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($cuenta_pagarsNuevos as $cuenta_pagarNuevo) {
					$this->cuenta_pagars[]=$cuenta_pagarNuevo;
				}
				
				/*$this->cuenta_pagars[]=$cuenta_pagarsNuevos;*/
				
				$this->cuenta_pagarLogic->setcuenta_pagars($this->cuenta_pagars);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($cuenta_pagarsNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		if($cuenta_pagar_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($cuenta_pagar_session->bigidempresaActual!=null && $cuenta_pagar_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cuenta_pagar_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=cuenta_pagar_util::getempresaDescripcion($empresaLogic->getempresa());
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

		$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		if($cuenta_pagar_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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


			if($cuenta_pagar_session->bigidsucursalActual!=null && $cuenta_pagar_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($cuenta_pagar_session->bigidsucursalActual);//WithConnection

				$this->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=cuenta_pagar_util::getsucursalDescripcion($sucursalLogic->getsucursal());
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

		$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		if($cuenta_pagar_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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


			if($cuenta_pagar_session->bigidejercicioActual!=null && $cuenta_pagar_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($cuenta_pagar_session->bigidejercicioActual);//WithConnection

				$this->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=cuenta_pagar_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
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

		$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		if($cuenta_pagar_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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


			if($cuenta_pagar_session->bigidperiodoActual!=null && $cuenta_pagar_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($cuenta_pagar_session->bigidperiodoActual);//WithConnection

				$this->periodosFK[$periodoLogic->getperiodo()->getId()]=cuenta_pagar_util::getperiodoDescripcion($periodoLogic->getperiodo());
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

		$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		if($cuenta_pagar_session->bitBusquedaDesdeFKSesionusuario!=true) {
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


			if($cuenta_pagar_session->bigidusuarioActual!=null && $cuenta_pagar_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($cuenta_pagar_session->bigidusuarioActual);//WithConnection

				$this->usuariosFK[$usuarioLogic->getusuario()->getId()]=cuenta_pagar_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$this->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosorden_comprasFK($connexion=null,$strRecargarFkQuery=''){
		$orden_compraLogic= new orden_compra_logic();
		$pagination= new Pagination();
		$this->orden_comprasFK=array();

		$orden_compraLogic->setConnexion($connexion);
		$orden_compraLogic->getorden_compraDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		if($cuenta_pagar_session->bitBusquedaDesdeFKSesionorden_compra!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=orden_compra_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalorden_compra=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalorden_compra=Funciones::GetFinalQueryAppend($finalQueryGlobalorden_compra, '');
				$finalQueryGlobalorden_compra.=orden_compra_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalorden_compra.$strRecargarFkQuery;		

				$orden_compraLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosorden_comprasFK($orden_compraLogic->getorden_compras());

		} else {
			$this->setVisibleBusquedasParaorden_compra(true);


			if($cuenta_pagar_session->bigidorden_compraActual!=null && $cuenta_pagar_session->bigidorden_compraActual > 0) {
				$orden_compraLogic->getEntity($cuenta_pagar_session->bigidorden_compraActual);//WithConnection

				$this->orden_comprasFK[$orden_compraLogic->getorden_compra()->getId()]=cuenta_pagar_util::getorden_compraDescripcion($orden_compraLogic->getorden_compra());
				$this->idorden_compraDefaultFK=$orden_compraLogic->getorden_compra()->getId();
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

		$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		if($cuenta_pagar_session->bitBusquedaDesdeFKSesionproveedor!=true) {
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


			if($cuenta_pagar_session->bigidproveedorActual!=null && $cuenta_pagar_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($cuenta_pagar_session->bigidproveedorActual);//WithConnection

				$this->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=cuenta_pagar_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$this->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	public function cargarCombostermino_pago_proveedorsFK($connexion=null,$strRecargarFkQuery=''){
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic();
		$pagination= new Pagination();
		$this->termino_pago_proveedorsFK=array();

		$termino_pago_proveedorLogic->setConnexion($connexion);
		$termino_pago_proveedorLogic->gettermino_pago_proveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		if($cuenta_pagar_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=termino_pago_proveedor_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltermino_pago_proveedor=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltermino_pago_proveedor=Funciones::GetFinalQueryAppend($finalQueryGlobaltermino_pago_proveedor, '');
				$finalQueryGlobaltermino_pago_proveedor.=termino_pago_proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltermino_pago_proveedor.$strRecargarFkQuery;		

				$termino_pago_proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostermino_pago_proveedorsFK($termino_pago_proveedorLogic->gettermino_pago_proveedors());

		} else {
			$this->setVisibleBusquedasParatermino_pago_proveedor(true);


			if($cuenta_pagar_session->bigidtermino_pago_proveedorActual!=null && $cuenta_pagar_session->bigidtermino_pago_proveedorActual > 0) {
				$termino_pago_proveedorLogic->getEntity($cuenta_pagar_session->bigidtermino_pago_proveedorActual);//WithConnection

				$this->termino_pago_proveedorsFK[$termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId()]=cuenta_pagar_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLogic->gettermino_pago_proveedor());
				$this->idtermino_pago_proveedorDefaultFK=$termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId();
			}
		}
	}

	public function cargarCombosestado_cuentas_pagarsFK($connexion=null,$strRecargarFkQuery=''){
		$estado_cuentas_pagarLogic= new estado_cuentas_pagar_logic();
		$pagination= new Pagination();
		$this->estado_cuentas_pagarsFK=array();

		$estado_cuentas_pagarLogic->setConnexion($connexion);
		$estado_cuentas_pagarLogic->getestado_cuentas_pagarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		if($cuenta_pagar_session->bitBusquedaDesdeFKSesionestado_cuentas_pagar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=estado_cuentas_pagar_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalestado_cuentas_pagar=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalestado_cuentas_pagar=Funciones::GetFinalQueryAppend($finalQueryGlobalestado_cuentas_pagar, '');
				$finalQueryGlobalestado_cuentas_pagar.=estado_cuentas_pagar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalestado_cuentas_pagar.$strRecargarFkQuery;		

				$estado_cuentas_pagarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosestado_cuentas_pagarsFK($estado_cuentas_pagarLogic->getestado_cuentas_pagars());

		} else {
			$this->setVisibleBusquedasParaestado_cuentas_pagar(true);


			if($cuenta_pagar_session->bigidestado_cuentas_pagarActual!=null && $cuenta_pagar_session->bigidestado_cuentas_pagarActual > 0) {
				$estado_cuentas_pagarLogic->getEntity($cuenta_pagar_session->bigidestado_cuentas_pagarActual);//WithConnection

				$this->estado_cuentas_pagarsFK[$estado_cuentas_pagarLogic->getestado_cuentas_pagar()->getId()]=cuenta_pagar_util::getestado_cuentas_pagarDescripcion($estado_cuentas_pagarLogic->getestado_cuentas_pagar());
				$this->idestado_cuentas_pagarDefaultFK=$estado_cuentas_pagarLogic->getestado_cuentas_pagar()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=cuenta_pagar_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombossucursalsFK($sucursals){

		foreach ($sucursals as $sucursalLocal ) {
			if($this->idsucursalDefaultFK==0) {
				$this->idsucursalDefaultFK=$sucursalLocal->getId();
			}

			$this->sucursalsFK[$sucursalLocal->getId()]=cuenta_pagar_util::getsucursalDescripcion($sucursalLocal);
		}
	}

	public function prepararCombosejerciciosFK($ejercicios){

		foreach ($ejercicios as $ejercicioLocal ) {
			if($this->idejercicioDefaultFK==0) {
				$this->idejercicioDefaultFK=$ejercicioLocal->getId();
			}

			$this->ejerciciosFK[$ejercicioLocal->getId()]=cuenta_pagar_util::getejercicioDescripcion($ejercicioLocal);
		}
	}

	public function prepararCombosperiodosFK($periodos){

		foreach ($periodos as $periodoLocal ) {
			if($this->idperiodoDefaultFK==0) {
				$this->idperiodoDefaultFK=$periodoLocal->getId();
			}

			$this->periodosFK[$periodoLocal->getId()]=cuenta_pagar_util::getperiodoDescripcion($periodoLocal);
		}
	}

	public function prepararCombosusuariosFK($usuarios){

		foreach ($usuarios as $usuarioLocal ) {
			if($this->idusuarioDefaultFK==0) {
				$this->idusuarioDefaultFK=$usuarioLocal->getId();
			}

			$this->usuariosFK[$usuarioLocal->getId()]=cuenta_pagar_util::getusuarioDescripcion($usuarioLocal);
		}
	}

	public function prepararCombosorden_comprasFK($orden_compras){

		foreach ($orden_compras as $orden_compraLocal ) {
			if($this->idorden_compraDefaultFK==0) {
				$this->idorden_compraDefaultFK=$orden_compraLocal->getId();
			}

			$this->orden_comprasFK[$orden_compraLocal->getId()]=cuenta_pagar_util::getorden_compraDescripcion($orden_compraLocal);
		}
	}

	public function prepararCombosproveedorsFK($proveedors){

		foreach ($proveedors as $proveedorLocal ) {
			if($this->idproveedorDefaultFK==0) {
				$this->idproveedorDefaultFK=$proveedorLocal->getId();
			}

			$this->proveedorsFK[$proveedorLocal->getId()]=cuenta_pagar_util::getproveedorDescripcion($proveedorLocal);
		}
	}

	public function prepararCombostermino_pago_proveedorsFK($termino_pago_proveedors){

		foreach ($termino_pago_proveedors as $termino_pago_proveedorLocal ) {
			if($this->idtermino_pago_proveedorDefaultFK==0) {
				$this->idtermino_pago_proveedorDefaultFK=$termino_pago_proveedorLocal->getId();
			}

			$this->termino_pago_proveedorsFK[$termino_pago_proveedorLocal->getId()]=cuenta_pagar_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLocal);
		}
	}

	public function prepararCombosestado_cuentas_pagarsFK($estado_cuentas_pagars){

		foreach ($estado_cuentas_pagars as $estado_cuentas_pagarLocal ) {
			if($this->idestado_cuentas_pagarDefaultFK==0) {
				$this->idestado_cuentas_pagarDefaultFK=$estado_cuentas_pagarLocal->getId();
			}

			$this->estado_cuentas_pagarsFK[$estado_cuentas_pagarLocal->getId()]=cuenta_pagar_util::getestado_cuentas_pagarDescripcion($estado_cuentas_pagarLocal);
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

			$strDescripcionempresa=cuenta_pagar_util::getempresaDescripcion($empresaLogic->getempresa());

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

			$strDescripcionsucursal=cuenta_pagar_util::getsucursalDescripcion($sucursalLogic->getsucursal());

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

			$strDescripcionejercicio=cuenta_pagar_util::getejercicioDescripcion($ejercicioLogic->getejercicio());

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

			$strDescripcionperiodo=cuenta_pagar_util::getperiodoDescripcion($periodoLogic->getperiodo());

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

			$strDescripcionusuario=cuenta_pagar_util::getusuarioDescripcion($usuarioLogic->getusuario());

		} else {
			$strDescripcionusuario='null';
		}

		return $strDescripcionusuario;
	}

	public function cargarDescripcionorden_compraFK($idorden_compra,$connexion=null){
		$orden_compraLogic= new orden_compra_logic();
		$orden_compraLogic->setConnexion($connexion);
		$orden_compraLogic->getorden_compraDataAccess()->isForFKData=true;
		$strDescripcionorden_compra='';

		if($idorden_compra!=null && $idorden_compra!='' && $idorden_compra!='null') {
			if($connexion!=null) {
				$orden_compraLogic->getEntity($idorden_compra);//WithConnection
			} else {
				$orden_compraLogic->getEntityWithConnection($idorden_compra);//
			}

			$strDescripcionorden_compra=cuenta_pagar_util::getorden_compraDescripcion($orden_compraLogic->getorden_compra());

		} else {
			$strDescripcionorden_compra='null';
		}

		return $strDescripcionorden_compra;
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

			$strDescripcionproveedor=cuenta_pagar_util::getproveedorDescripcion($proveedorLogic->getproveedor());

		} else {
			$strDescripcionproveedor='null';
		}

		return $strDescripcionproveedor;
	}

	public function cargarDescripciontermino_pago_proveedorFK($idtermino_pago_proveedor,$connexion=null){
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic();
		$termino_pago_proveedorLogic->setConnexion($connexion);
		$termino_pago_proveedorLogic->gettermino_pago_proveedorDataAccess()->isForFKData=true;
		$strDescripciontermino_pago_proveedor='';

		if($idtermino_pago_proveedor!=null && $idtermino_pago_proveedor!='' && $idtermino_pago_proveedor!='null') {
			if($connexion!=null) {
				$termino_pago_proveedorLogic->getEntity($idtermino_pago_proveedor);//WithConnection
			} else {
				$termino_pago_proveedorLogic->getEntityWithConnection($idtermino_pago_proveedor);//
			}

			$strDescripciontermino_pago_proveedor=cuenta_pagar_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLogic->gettermino_pago_proveedor());

		} else {
			$strDescripciontermino_pago_proveedor='null';
		}

		return $strDescripciontermino_pago_proveedor;
	}

	public function cargarDescripcionestado_cuentas_pagarFK($idestado_cuentas_pagar,$connexion=null){
		$estado_cuentas_pagarLogic= new estado_cuentas_pagar_logic();
		$estado_cuentas_pagarLogic->setConnexion($connexion);
		$estado_cuentas_pagarLogic->getestado_cuentas_pagarDataAccess()->isForFKData=true;
		$strDescripcionestado_cuentas_pagar='';

		if($idestado_cuentas_pagar!=null && $idestado_cuentas_pagar!='' && $idestado_cuentas_pagar!='null') {
			if($connexion!=null) {
				$estado_cuentas_pagarLogic->getEntity($idestado_cuentas_pagar);//WithConnection
			} else {
				$estado_cuentas_pagarLogic->getEntityWithConnection($idestado_cuentas_pagar);//
			}

			$strDescripcionestado_cuentas_pagar=cuenta_pagar_util::getestado_cuentas_pagarDescripcion($estado_cuentas_pagarLogic->getestado_cuentas_pagar());

		} else {
			$strDescripcionestado_cuentas_pagar='null';
		}

		return $strDescripcionestado_cuentas_pagar;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(cuenta_pagar $cuenta_pagarClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$cuenta_pagarClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
				$cuenta_pagarClase->setid_sucursal($this->parametroGeneralUsuarioActual->getid_sucursal());
				$cuenta_pagarClase->setid_ejercicio($this->parametroGeneralUsuarioActual->getid_ejercicio());
				$cuenta_pagarClase->setid_periodo($this->parametroGeneralUsuarioActual->getid_periodo());
				$cuenta_pagarClase->setid_usuario($this->usuarioActual->getId());
			
			
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

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idestado_cuentas_pagar=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idorden_compra=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionempresa;
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

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idestado_cuentas_pagar=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idorden_compra=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idsucursal=$strParaVisiblesucursal;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionsucursal;
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

		$this->strVisibleFK_Idejercicio=$strParaVisibleejercicio;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idestado_cuentas_pagar=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idorden_compra=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionejercicio;
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

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idestado_cuentas_pagar=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idorden_compra=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idperiodo=$strParaVisibleperiodo;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionperiodo;
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

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idestado_cuentas_pagar=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idorden_compra=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idusuario=$strParaVisibleusuario;
	}

	public function setVisibleBusquedasParaorden_compra($isParaorden_compra){
		$strParaVisibleorden_compra='display:table-row';
		$strParaVisibleNegacionorden_compra='display:none';

		if($isParaorden_compra) {
			$strParaVisibleorden_compra='display:table-row';
			$strParaVisibleNegacionorden_compra='display:none';
		} else {
			$strParaVisibleorden_compra='display:none';
			$strParaVisibleNegacionorden_compra='display:table-row';
		}


		$strParaVisibleNegacionorden_compra=trim($strParaVisibleNegacionorden_compra);

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionorden_compra;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionorden_compra;
		$this->strVisibleFK_Idestado_cuentas_pagar=$strParaVisibleNegacionorden_compra;
		$this->strVisibleFK_Idorden_compra=$strParaVisibleorden_compra;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionorden_compra;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionorden_compra;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionorden_compra;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionorden_compra;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionorden_compra;
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

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idestado_cuentas_pagar=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idorden_compra=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idproveedor=$strParaVisibleproveedor;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionproveedor;
	}

	public function setVisibleBusquedasParatermino_pago_proveedor($isParatermino_pago_proveedor){
		$strParaVisibletermino_pago_proveedor='display:table-row';
		$strParaVisibleNegaciontermino_pago_proveedor='display:none';

		if($isParatermino_pago_proveedor) {
			$strParaVisibletermino_pago_proveedor='display:table-row';
			$strParaVisibleNegaciontermino_pago_proveedor='display:none';
		} else {
			$strParaVisibletermino_pago_proveedor='display:none';
			$strParaVisibleNegaciontermino_pago_proveedor='display:table-row';
		}


		$strParaVisibleNegaciontermino_pago_proveedor=trim($strParaVisibleNegaciontermino_pago_proveedor);

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idestado_cuentas_pagar=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idorden_compra=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibletermino_pago_proveedor;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegaciontermino_pago_proveedor;
	}

	public function setVisibleBusquedasParaestado_cuentas_pagar($isParaestado_cuentas_pagar){
		$strParaVisibleestado_cuentas_pagar='display:table-row';
		$strParaVisibleNegacionestado_cuentas_pagar='display:none';

		if($isParaestado_cuentas_pagar) {
			$strParaVisibleestado_cuentas_pagar='display:table-row';
			$strParaVisibleNegacionestado_cuentas_pagar='display:none';
		} else {
			$strParaVisibleestado_cuentas_pagar='display:none';
			$strParaVisibleNegacionestado_cuentas_pagar='display:table-row';
		}


		$strParaVisibleNegacionestado_cuentas_pagar=trim($strParaVisibleNegacionestado_cuentas_pagar);

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionestado_cuentas_pagar;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionestado_cuentas_pagar;
		$this->strVisibleFK_Idestado_cuentas_pagar=$strParaVisibleestado_cuentas_pagar;
		$this->strVisibleFK_Idorden_compra=$strParaVisibleNegacionestado_cuentas_pagar;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionestado_cuentas_pagar;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionestado_cuentas_pagar;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionestado_cuentas_pagar;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionestado_cuentas_pagar;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionestado_cuentas_pagar;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idcuenta_pagarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_pagarActual=$idcuenta_pagarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_pagar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParasucursal() {//$idcuenta_pagarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_pagarActual=$idcuenta_pagarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.sucursal_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',sucursal_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(sucursal_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_pagar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaejercicio() {//$idcuenta_pagarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_pagarActual=$idcuenta_pagarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.ejercicio_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',ejercicio_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ejercicio_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_pagar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaperiodo() {//$idcuenta_pagarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_pagarActual=$idcuenta_pagarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.periodo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',periodo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(periodo_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_pagar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParausuario() {//$idcuenta_pagarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_pagarActual=$idcuenta_pagarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.usuario_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_pagar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaorden_compra() {//$idcuenta_pagarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_pagarActual=$idcuenta_pagarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.orden_compra_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_orden_compra(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',orden_compra_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_orden_compra(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(orden_compra_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_pagar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaproveedor() {//$idcuenta_pagarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_pagarActual=$idcuenta_pagarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.proveedor_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_proveedor(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_proveedor(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(proveedor_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_pagar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatermino_pago_proveedor() {//$idcuenta_pagarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_pagarActual=$idcuenta_pagarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.termino_pago_proveedor_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_termino_pago_proveedor(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',termino_pago_proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_termino_pago_proveedor(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(termino_pago_proveedor_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_pagar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaestado_cuentas_pagar() {//$idcuenta_pagarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_pagarActual=$idcuenta_pagarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.estado_cuentas_pagar_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado_cuentas_pagar(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',estado_cuentas_pagar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado_cuentas_pagar(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(estado_cuentas_pagar_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_pagar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParadebito_cuenta_pagars(int $idcuenta_pagarActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuenta_pagarActual=$idcuenta_pagarActual;

		$bitPaginaPopupdebito_cuenta_pagar=false;

		try {

			$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));

			if($cuenta_pagar_session==null) {
				$cuenta_pagar_session=new cuenta_pagar_session();
			}

			$debito_cuenta_pagar_session=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME));

			if($debito_cuenta_pagar_session==null) {
				$debito_cuenta_pagar_session=new debito_cuenta_pagar_session();
			}

			$debito_cuenta_pagar_session->strUltimaBusqueda='FK_Idcuenta_pagar';
			$debito_cuenta_pagar_session->strPathNavegacionActual=$cuenta_pagar_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.debito_cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
			$debito_cuenta_pagar_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupdebito_cuenta_pagar=$debito_cuenta_pagar_session->bitPaginaPopup;
			$debito_cuenta_pagar_session->setPaginaPopupVariables(true);
			$bitPaginaPopupdebito_cuenta_pagar=$debito_cuenta_pagar_session->bitPaginaPopup;
			$debito_cuenta_pagar_session->bitPermiteNavegacionHaciaFKDesde=false;
			$debito_cuenta_pagar_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_pagar_util::$STR_NOMBRE_OPCION;
			$debito_cuenta_pagar_session->bitBusquedaDesdeFKSesioncuenta_pagar=true;
			$debito_cuenta_pagar_session->bigidcuenta_pagarActual=$this->idcuenta_pagarActual;

			$cuenta_pagar_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_pagar_session->bigIdActualFK=$this->idcuenta_pagarActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"debito_cuenta_pagar"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_pagar_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"debito_cuenta_pagar"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_pagar_util::$STR_SESSION_NAME,serialize($cuenta_pagar_session));
			$this->Session->write(debito_cuenta_pagar_util::$STR_SESSION_NAME,serialize($debito_cuenta_pagar_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupdebito_cuenta_pagar!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',debito_cuenta_pagar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(debito_cuenta_pagar_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliarcuenta_pagar,$this->strTipoUsuarioAuxiliarcuenta_pagar,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',debito_cuenta_pagar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(debito_cuenta_pagar_util::$STR_CLASS_NAME,'cuentaspagar','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta_pagar,$this->strTipoUsuarioAuxiliarcuenta_pagar,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParacredito_cuenta_pagars(int $idcuenta_pagarActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuenta_pagarActual=$idcuenta_pagarActual;

		$bitPaginaPopupcredito_cuenta_pagar=false;

		try {

			$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));

			if($cuenta_pagar_session==null) {
				$cuenta_pagar_session=new cuenta_pagar_session();
			}

			$credito_cuenta_pagar_session=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME));

			if($credito_cuenta_pagar_session==null) {
				$credito_cuenta_pagar_session=new credito_cuenta_pagar_session();
			}

			$credito_cuenta_pagar_session->strUltimaBusqueda='FK_Idcuenta_pagar';
			$credito_cuenta_pagar_session->strPathNavegacionActual=$cuenta_pagar_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.credito_cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
			$credito_cuenta_pagar_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcredito_cuenta_pagar=$credito_cuenta_pagar_session->bitPaginaPopup;
			$credito_cuenta_pagar_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcredito_cuenta_pagar=$credito_cuenta_pagar_session->bitPaginaPopup;
			$credito_cuenta_pagar_session->bitPermiteNavegacionHaciaFKDesde=false;
			$credito_cuenta_pagar_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_pagar_util::$STR_NOMBRE_OPCION;
			$credito_cuenta_pagar_session->bitBusquedaDesdeFKSesioncuenta_pagar=true;
			$credito_cuenta_pagar_session->bigidcuenta_pagarActual=$this->idcuenta_pagarActual;

			$cuenta_pagar_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_pagar_session->bigIdActualFK=$this->idcuenta_pagarActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"credito_cuenta_pagar"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_pagar_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"credito_cuenta_pagar"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_pagar_util::$STR_SESSION_NAME,serialize($cuenta_pagar_session));
			$this->Session->write(credito_cuenta_pagar_util::$STR_SESSION_NAME,serialize($credito_cuenta_pagar_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcredito_cuenta_pagar!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',credito_cuenta_pagar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(credito_cuenta_pagar_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliarcuenta_pagar,$this->strTipoUsuarioAuxiliarcuenta_pagar,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',credito_cuenta_pagar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(credito_cuenta_pagar_util::$STR_CLASS_NAME,'cuentaspagar','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta_pagar,$this->strTipoUsuarioAuxiliarcuenta_pagar,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParapago_cuenta_pagars(int $idcuenta_pagarActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuenta_pagarActual=$idcuenta_pagarActual;

		$bitPaginaPopuppago_cuenta_pagar=false;

		try {

			$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));

			if($cuenta_pagar_session==null) {
				$cuenta_pagar_session=new cuenta_pagar_session();
			}

			$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));

			if($pago_cuenta_pagar_session==null) {
				$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
			}

			$pago_cuenta_pagar_session->strUltimaBusqueda='FK_Idcuenta_pagar';
			$pago_cuenta_pagar_session->strPathNavegacionActual=$cuenta_pagar_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
			$pago_cuenta_pagar_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopuppago_cuenta_pagar=$pago_cuenta_pagar_session->bitPaginaPopup;
			$pago_cuenta_pagar_session->setPaginaPopupVariables(true);
			$bitPaginaPopuppago_cuenta_pagar=$pago_cuenta_pagar_session->bitPaginaPopup;
			$pago_cuenta_pagar_session->bitPermiteNavegacionHaciaFKDesde=false;
			$pago_cuenta_pagar_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_pagar_util::$STR_NOMBRE_OPCION;
			$pago_cuenta_pagar_session->bitBusquedaDesdeFKSesioncuenta_pagar=true;
			$pago_cuenta_pagar_session->bigidcuenta_pagarActual=$this->idcuenta_pagarActual;

			$cuenta_pagar_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_pagar_session->bigIdActualFK=$this->idcuenta_pagarActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"pago_cuenta_pagar"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_pagar_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"pago_cuenta_pagar"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_pagar_util::$STR_SESSION_NAME,serialize($cuenta_pagar_session));
			$this->Session->write(pago_cuenta_pagar_util::$STR_SESSION_NAME,serialize($pago_cuenta_pagar_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopuppago_cuenta_pagar!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',pago_cuenta_pagar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(pago_cuenta_pagar_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliarcuenta_pagar,$this->strTipoUsuarioAuxiliarcuenta_pagar,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',pago_cuenta_pagar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(pago_cuenta_pagar_util::$STR_CLASS_NAME,'cuentaspagar','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta_pagar,$this->strTipoUsuarioAuxiliarcuenta_pagar,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(cuenta_pagar_util::$STR_SESSION_NAME,cuenta_pagar_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$cuenta_pagar_session=$this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME);
				
		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();		
			//$this->Session->write('cuenta_pagar_session',$cuenta_pagar_session);							
		}
		*/
		
		$cuenta_pagar_session=new cuenta_pagar_session();
    	$cuenta_pagar_session->strPathNavegacionActual=cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
    	$cuenta_pagar_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(cuenta_pagar_util::$STR_SESSION_NAME,serialize($cuenta_pagar_session));		
	}	
	
	public function getSetBusquedasSesionConfig(cuenta_pagar_session $cuenta_pagar_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($cuenta_pagar_session->bitBusquedaDesdeFKSesionFK!=null && $cuenta_pagar_session->bitBusquedaDesdeFKSesionFK==true) {
			if($cuenta_pagar_session->bigIdActualFK!=null && $cuenta_pagar_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$cuenta_pagar_session->bigIdActualFKParaPosibleAtras=$cuenta_pagar_session->bigIdActualFK;*/
			}
				
			$cuenta_pagar_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$cuenta_pagar_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(cuenta_pagar_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($cuenta_pagar_session->bitBusquedaDesdeFKSesionempresa!=null && $cuenta_pagar_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($cuenta_pagar_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_pagar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_pagar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_pagar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_pagar_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($cuenta_pagar_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_pagar_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_pagar_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;

				if($cuenta_pagar_session->intNumeroPaginacion==cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_pagar_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_pagar_session->bitBusquedaDesdeFKSesionsucursal!=null && $cuenta_pagar_session->bitBusquedaDesdeFKSesionsucursal==true)
			{
				if($cuenta_pagar_session->bigidsucursalActual!=0) {
					$this->strAccionBusqueda='FK_Idsucursal';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_pagar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_pagar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_pagar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_pagar_session->bigidsucursalActualDescripcion);
						$historyWeb->setIdActual($cuenta_pagar_session->bigidsucursalActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_pagar_session->bigidsucursalActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_pagar_session->bitBusquedaDesdeFKSesionsucursal=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;

				if($cuenta_pagar_session->intNumeroPaginacion==cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_pagar_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_pagar_session->bitBusquedaDesdeFKSesionejercicio!=null && $cuenta_pagar_session->bitBusquedaDesdeFKSesionejercicio==true)
			{
				if($cuenta_pagar_session->bigidejercicioActual!=0) {
					$this->strAccionBusqueda='FK_Idejercicio';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_pagar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_pagar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_pagar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_pagar_session->bigidejercicioActualDescripcion);
						$historyWeb->setIdActual($cuenta_pagar_session->bigidejercicioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_pagar_session->bigidejercicioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_pagar_session->bitBusquedaDesdeFKSesionejercicio=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;

				if($cuenta_pagar_session->intNumeroPaginacion==cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_pagar_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_pagar_session->bitBusquedaDesdeFKSesionperiodo!=null && $cuenta_pagar_session->bitBusquedaDesdeFKSesionperiodo==true)
			{
				if($cuenta_pagar_session->bigidperiodoActual!=0) {
					$this->strAccionBusqueda='FK_Idperiodo';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_pagar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_pagar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_pagar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_pagar_session->bigidperiodoActualDescripcion);
						$historyWeb->setIdActual($cuenta_pagar_session->bigidperiodoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_pagar_session->bigidperiodoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_pagar_session->bitBusquedaDesdeFKSesionperiodo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;

				if($cuenta_pagar_session->intNumeroPaginacion==cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_pagar_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_pagar_session->bitBusquedaDesdeFKSesionusuario!=null && $cuenta_pagar_session->bitBusquedaDesdeFKSesionusuario==true)
			{
				if($cuenta_pagar_session->bigidusuarioActual!=0) {
					$this->strAccionBusqueda='FK_Idusuario';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_pagar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_pagar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_pagar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_pagar_session->bigidusuarioActualDescripcion);
						$historyWeb->setIdActual($cuenta_pagar_session->bigidusuarioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_pagar_session->bigidusuarioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_pagar_session->bitBusquedaDesdeFKSesionusuario=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;

				if($cuenta_pagar_session->intNumeroPaginacion==cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_pagar_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_pagar_session->bitBusquedaDesdeFKSesionorden_compra!=null && $cuenta_pagar_session->bitBusquedaDesdeFKSesionorden_compra==true)
			{
				if($cuenta_pagar_session->bigidorden_compraActual!=0) {
					$this->strAccionBusqueda='FK_Idorden_compra';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_pagar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_pagar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_pagar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_pagar_session->bigidorden_compraActualDescripcion);
						$historyWeb->setIdActual($cuenta_pagar_session->bigidorden_compraActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_pagar_session->bigidorden_compraActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_pagar_session->bitBusquedaDesdeFKSesionorden_compra=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;

				if($cuenta_pagar_session->intNumeroPaginacion==cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_pagar_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_pagar_session->bitBusquedaDesdeFKSesionproveedor!=null && $cuenta_pagar_session->bitBusquedaDesdeFKSesionproveedor==true)
			{
				if($cuenta_pagar_session->bigidproveedorActual!=0) {
					$this->strAccionBusqueda='FK_Idproveedor';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_pagar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_pagar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_pagar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_pagar_session->bigidproveedorActualDescripcion);
						$historyWeb->setIdActual($cuenta_pagar_session->bigidproveedorActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_pagar_session->bigidproveedorActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_pagar_session->bitBusquedaDesdeFKSesionproveedor=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;

				if($cuenta_pagar_session->intNumeroPaginacion==cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_pagar_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_pagar_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor!=null && $cuenta_pagar_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor==true)
			{
				if($cuenta_pagar_session->bigidtermino_pago_proveedorActual!=0) {
					$this->strAccionBusqueda='FK_Idtermino_pago_proveedor';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_pagar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_pagar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_pagar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_pagar_session->bigidtermino_pago_proveedorActualDescripcion);
						$historyWeb->setIdActual($cuenta_pagar_session->bigidtermino_pago_proveedorActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_pagar_session->bigidtermino_pago_proveedorActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_pagar_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;

				if($cuenta_pagar_session->intNumeroPaginacion==cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_pagar_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_pagar_session->bitBusquedaDesdeFKSesionestado_cuentas_pagar!=null && $cuenta_pagar_session->bitBusquedaDesdeFKSesionestado_cuentas_pagar==true)
			{
				if($cuenta_pagar_session->bigidestado_cuentas_pagarActual!=0) {
					$this->strAccionBusqueda='FK_Idestado_cuentas_pagar';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_pagar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_pagar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_pagar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_pagar_session->bigidestado_cuentas_pagarActualDescripcion);
						$historyWeb->setIdActual($cuenta_pagar_session->bigidestado_cuentas_pagarActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_pagar_session->bigidestado_cuentas_pagarActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_pagar_session->bitBusquedaDesdeFKSesionestado_cuentas_pagar=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;

				if($cuenta_pagar_session->intNumeroPaginacion==cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_pagar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_pagar_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$cuenta_pagar_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));
		
		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		$cuenta_pagar_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$cuenta_pagar_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cuenta_pagar_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idejercicio') {
			$cuenta_pagar_session->id_ejercicio=$this->id_ejercicioFK_Idejercicio;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$cuenta_pagar_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idestado_cuentas_pagar') {
			$cuenta_pagar_session->id_estado_cuentas_pagar=$this->id_estado_cuentas_pagarFK_Idestado_cuentas_pagar;	

		}
		else if($this->strAccionBusqueda=='FK_Idorden_compra') {
			$cuenta_pagar_session->id_orden_compra=$this->id_orden_compraFK_Idorden_compra;	

		}
		else if($this->strAccionBusqueda=='FK_Idperiodo') {
			$cuenta_pagar_session->id_periodo=$this->id_periodoFK_Idperiodo;	

		}
		else if($this->strAccionBusqueda=='FK_Idproveedor') {
			$cuenta_pagar_session->id_proveedor=$this->id_proveedorFK_Idproveedor;	

		}
		else if($this->strAccionBusqueda=='FK_Idsucursal') {
			$cuenta_pagar_session->id_sucursal=$this->id_sucursalFK_Idsucursal;	

		}
		else if($this->strAccionBusqueda=='FK_Idtermino_pago_proveedor') {
			$cuenta_pagar_session->id_termino_pago_proveedor=$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor;	

		}
		else if($this->strAccionBusqueda=='FK_Idusuario') {
			$cuenta_pagar_session->id_usuario=$this->id_usuarioFK_Idusuario;	

		}
		
		$this->Session->write(cuenta_pagar_util::$STR_SESSION_NAME,serialize($cuenta_pagar_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(cuenta_pagar_session $cuenta_pagar_session) {
		
		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));
		}
		
		if($cuenta_pagar_session==null) {
		   $cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		if($cuenta_pagar_session->strUltimaBusqueda!=null && $cuenta_pagar_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$cuenta_pagar_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$cuenta_pagar_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$cuenta_pagar_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idejercicio') {
				$this->id_ejercicioFK_Idejercicio=$cuenta_pagar_session->id_ejercicio;
				$cuenta_pagar_session->id_ejercicio=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$cuenta_pagar_session->id_empresa;
				$cuenta_pagar_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idestado_cuentas_pagar') {
				$this->id_estado_cuentas_pagarFK_Idestado_cuentas_pagar=$cuenta_pagar_session->id_estado_cuentas_pagar;
				$cuenta_pagar_session->id_estado_cuentas_pagar=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idorden_compra') {
				$this->id_orden_compraFK_Idorden_compra=$cuenta_pagar_session->id_orden_compra;
				$cuenta_pagar_session->id_orden_compra=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idperiodo') {
				$this->id_periodoFK_Idperiodo=$cuenta_pagar_session->id_periodo;
				$cuenta_pagar_session->id_periodo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idproveedor') {
				$this->id_proveedorFK_Idproveedor=$cuenta_pagar_session->id_proveedor;
				$cuenta_pagar_session->id_proveedor=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idsucursal') {
				$this->id_sucursalFK_Idsucursal=$cuenta_pagar_session->id_sucursal;
				$cuenta_pagar_session->id_sucursal=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtermino_pago_proveedor') {
				$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor=$cuenta_pagar_session->id_termino_pago_proveedor;
				$cuenta_pagar_session->id_termino_pago_proveedor=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idusuario') {
				$this->id_usuarioFK_Idusuario=$cuenta_pagar_session->id_usuario;
				$cuenta_pagar_session->id_usuario=-1;

			}
		}
		
		$cuenta_pagar_session->strUltimaBusqueda='';
		//$cuenta_pagar_session->intNumeroPaginacion=10;
		$cuenta_pagar_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(cuenta_pagar_util::$STR_SESSION_NAME,serialize($cuenta_pagar_session));		
	}
	
	public function cuenta_pagarsControllerAux($conexion_control) 	 {
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
		$this->idorden_compraDefaultFK = 0;
		$this->idproveedorDefaultFK = 0;
		$this->idtermino_pago_proveedorDefaultFK = 0;
		$this->idestado_cuentas_pagarDefaultFK = 0;
	}
	
	public function setcuenta_pagarFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_sucursal',$this->idsucursalDefaultFK);
		$this->setExistDataCampoForm('form','id_ejercicio',$this->idejercicioDefaultFK);
		$this->setExistDataCampoForm('form','id_periodo',$this->idperiodoDefaultFK);
		$this->setExistDataCampoForm('form','id_usuario',$this->idusuarioDefaultFK);
		$this->setExistDataCampoForm('form','id_orden_compra',$this->idorden_compraDefaultFK);
		$this->setExistDataCampoForm('form','id_proveedor',$this->idproveedorDefaultFK);
		$this->setExistDataCampoForm('form','id_termino_pago_proveedor',$this->idtermino_pago_proveedorDefaultFK);
		$this->setExistDataCampoForm('form','id_estado_cuentas_pagar',$this->idestado_cuentas_pagarDefaultFK);
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

		orden_compra::$class;
		orden_compra_carga::$CONTROLLER;

		proveedor::$class;
		proveedor_carga::$CONTROLLER;

		termino_pago_proveedor::$class;
		termino_pago_proveedor_carga::$CONTROLLER;

		estado_cuentas_pagar::$class;
		estado_cuentas_pagar_carga::$CONTROLLER;
		
		//REL
		

		debito_cuenta_pagar_carga::$CONTROLLER;
		debito_cuenta_pagar_util::$STR_SCHEMA;
		debito_cuenta_pagar_session::class;

		credito_cuenta_pagar_carga::$CONTROLLER;
		credito_cuenta_pagar_util::$STR_SCHEMA;
		credito_cuenta_pagar_session::class;

		pago_cuenta_pagar_carga::$CONTROLLER;
		pago_cuenta_pagar_util::$STR_SCHEMA;
		pago_cuenta_pagar_session::class;
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
		interface cuenta_pagar_controlI {	
		
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
		
		public function onLoad(cuenta_pagar_session $cuenta_pagar_session=null);	
		function index(?string $strTypeOnLoadcuenta_pagar='',?string $strTipoPaginaAuxiliarcuenta_pagar='',?string $strTipoUsuarioAuxiliarcuenta_pagar='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadcuenta_pagar='',string $strTipoPaginaAuxiliarcuenta_pagar='',string $strTipoUsuarioAuxiliarcuenta_pagar='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($cuenta_pagarReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(cuenta_pagar $cuenta_pagarClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(cuenta_pagar_session $cuenta_pagar_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(cuenta_pagar_session $cuenta_pagar_session);	
		public function cuenta_pagarsControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setcuenta_pagarFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
