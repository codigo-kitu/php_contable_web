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

namespace com\bydan\contabilidad\contabilidad\cuenta\presentation\control;

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

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/util/cuenta_carga.php');
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;

use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_param_return;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\presentation\session\cuenta_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\entity\tipo_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\logic\tipo_cuenta_logic;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_carga;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_util;

use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\entity\tipo_nivel_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\logic\tipo_nivel_cuenta_logic;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\util\tipo_nivel_cuenta_carga;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\util\tipo_nivel_cuenta_util;

//REL


use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_util;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\presentation\session\categoria_cheque_session;

use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_carga;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_util;
use com\bydan\contabilidad\facturacion\otro_impuesto\presentation\session\otro_impuesto_session;

use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_carga;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_util;
use com\bydan\contabilidad\facturacion\impuesto\presentation\session\impuesto_session;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\presentation\session\cuenta_corriente_session;

use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;
use com\bydan\contabilidad\inventario\producto\presentation\session\producto_session;

use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\util\instrumento_pago_carga;
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\util\instrumento_pago_util;
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\presentation\session\instrumento_pago_session;

use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;
use com\bydan\contabilidad\inventario\lista_producto\presentation\session\lista_producto_session;

use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_util;
use com\bydan\contabilidad\contabilidad\asiento_detalle\presentation\session\asiento_detalle_session;

use com\bydan\contabilidad\facturacion\retencion\util\retencion_carga;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_util;
use com\bydan\contabilidad\facturacion\retencion\presentation\session\retencion_session;

use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_carga;
use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_util;
use com\bydan\contabilidad\facturacion\retencion_fuente\presentation\session\retencion_fuente_session;

use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;

use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_util;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\presentation\session\forma_pago_cliente_session;

use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_carga;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_util;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\presentation\session\saldo_cuenta_session;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\presentation\session\termino_pago_proveedor_session;

use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_carga;
use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_util;
use com\bydan\contabilidad\facturacion\retencion_ica\presentation\session\retencion_ica_session;

use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_util;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\presentation\session\asiento_predefinido_detalle_session;

use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;

use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_util;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\presentation\session\asiento_automatico_detalle_session;

use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\presentation\session\forma_pago_proveedor_session;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\presentation\session\termino_pago_cliente_session;


/*CARGA ARCHIVOS FRAMEWORK*/
cuenta_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cuenta_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cuenta_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/contabilidad/cuenta/presentation/control/cuenta_init_control.php');
use com\bydan\contabilidad\contabilidad\cuenta\presentation\control\cuenta_init_control;

include_once('com/bydan/contabilidad/contabilidad/cuenta/presentation/control/cuenta_base_control.php');
use com\bydan\contabilidad\contabilidad\cuenta\presentation\control\cuenta_base_control;

class cuenta_control extends cuenta_base_control {	
	
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
					
					
				if($this->data['usa_monto_base']==null) {$this->data['usa_monto_base']=false;} else {if($this->data['usa_monto_base']=='on') {$this->data['usa_monto_base']=true;}}
					
				if($this->data['con_centro_costos']==null) {$this->data['con_centro_costos']=false;} else {if($this->data['con_centro_costos']=='on') {$this->data['con_centro_costos']=true;}}
					
				if($this->data['con_ruc']==null) {$this->data['con_ruc']=false;} else {if($this->data['con_ruc']=='on') {$this->data['con_ruc']=true;}}
					
				if($this->data['con_retencion']==null) {$this->data['con_retencion']=false;} else {if($this->data['con_retencion']=='on') {$this->data['con_retencion']=true;}}
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
			else if($action=='registrarSesionParacategoria_cheques' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuentaActual=$this->getDataId();
				$this->registrarSesionParacategoria_cheques($idcuentaActual);
			}
			else if($action=='registrarSesion_ventasParaotro_impuestos' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuentaActual=$this->getDataId();
				$this->registrarSesion_ventasParaotro_impuestos($idcuentaActual);
			}
			else if($action=='registrarSesion_ventasParaimpuestos' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuentaActual=$this->getDataId();
				$this->registrarSesion_ventasParaimpuestos($idcuentaActual);
			}
			else if($action=='registrarSesionParacuenta_corrientes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuentaActual=$this->getDataId();
				$this->registrarSesionParacuenta_corrientes($idcuentaActual);
			}
			else if($action=='registrarSesion_ventaParaproductos' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuentaActual=$this->getDataId();
				$this->registrarSesion_ventaParaproductos($idcuentaActual);
			}
			else if($action=='registrarSesion_ventasParainstrumento_pagos' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuentaActual=$this->getDataId();
				$this->registrarSesion_ventasParainstrumento_pagos($idcuentaActual);
			}
			else if($action=='registrarSesion_ventaParalista_productoes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuentaActual=$this->getDataId();
				$this->registrarSesion_ventaParalista_productoes($idcuentaActual);
			}
			else if($action=='registrarSesionParaasiento_detallees' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuentaActual=$this->getDataId();
				$this->registrarSesionParaasiento_detallees($idcuentaActual);
			}
			else if($action=='registrarSesion_comprasPararetenciones' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuentaActual=$this->getDataId();
				$this->registrarSesion_comprasPararetenciones($idcuentaActual);
			}
			else if($action=='registrarSesion_comprasPararetencion_fuentees' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuentaActual=$this->getDataId();
				$this->registrarSesion_comprasPararetencion_fuentees($idcuentaActual);
			}
			else if($action=='registrarSesionParacuentaes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuentaActual=$this->getDataId();
				$this->registrarSesionParacuentaes($idcuentaActual);
			}
			else if($action=='registrarSesionParaproveedores' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuentaActual=$this->getDataId();
				$this->registrarSesionParaproveedores($idcuentaActual);
			}
			else if($action=='registrarSesionParaforma_pago_clientes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuentaActual=$this->getDataId();
				$this->registrarSesionParaforma_pago_clientes($idcuentaActual);
			}
			else if($action=='registrarSesionParasaldo_cuentas' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuentaActual=$this->getDataId();
				$this->registrarSesionParasaldo_cuentas($idcuentaActual);
			}
			else if($action=='registrarSesionParatermino_pago_proveedores' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuentaActual=$this->getDataId();
				$this->registrarSesionParatermino_pago_proveedores($idcuentaActual);
			}
			else if($action=='registrarSesion_ventasPararetencion_icas' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuentaActual=$this->getDataId();
				$this->registrarSesion_ventasPararetencion_icas($idcuentaActual);
			}
			else if($action=='registrarSesionParaasiento_predefinido_detalles' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuentaActual=$this->getDataId();
				$this->registrarSesionParaasiento_predefinido_detalles($idcuentaActual);
			}
			else if($action=='registrarSesionParaclientes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuentaActual=$this->getDataId();
				$this->registrarSesionParaclientes($idcuentaActual);
			}
			else if($action=='registrarSesionParaasiento_automatico_detalles' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuentaActual=$this->getDataId();
				$this->registrarSesionParaasiento_automatico_detalles($idcuentaActual);
			}
			else if($action=='registrarSesionParaforma_pago_proveedores' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuentaActual=$this->getDataId();
				$this->registrarSesionParaforma_pago_proveedores($idcuentaActual);
			}
			else if($action=='registrarSesionParatermino_pago_clientes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuentaActual=$this->getDataId();
				$this->registrarSesionParatermino_pago_clientes($idcuentaActual);
			} 
			
			
			else if($action=="FK_Idcuenta"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdcuentaParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idtipo_cuenta"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtipo_cuentaParaProcesar();
			}
			else if($action=="FK_Idtipo_nivel_cuenta"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtipo_nivel_cuentaParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuentaActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idcuentaActual
			}
			else if($action=='abrirBusquedaParatipo_cuenta') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuentaActual=$this->getDataId();
				$this->abrirBusquedaParatipo_cuenta();//$idcuentaActual
			}
			else if($action=='abrirBusquedaParatipo_nivel_cuenta') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuentaActual=$this->getDataId();
				$this->abrirBusquedaParatipo_nivel_cuenta();//$idcuentaActual
			}
			else if($action=='abrirBusquedaParacuenta') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuentaActual=$this->getDataId();
				$this->abrirBusquedaParacuenta();//$idcuentaActual
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
					
					$cuentaController = new cuenta_control();
					
					$cuentaController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($cuentaController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$cuentaController = new cuenta_control();
						$cuentaController = $this;
						
						$jsonResponse = json_encode($cuentaController->cuentas);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->cuentaReturnGeneral==null) {
					$this->cuentaReturnGeneral=new cuenta_param_return();
				}
				
				echo($this->cuentaReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$cuentaController=new cuenta_control();
		
		$cuentaController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$cuentaController->usuarioActual=new usuario();
		
		$cuentaController->usuarioActual->setId($this->usuarioActual->getId());
		$cuentaController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$cuentaController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$cuentaController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$cuentaController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$cuentaController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$cuentaController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$cuentaController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $cuentaController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadcuenta= $this->getDataGeneralString('strTypeOnLoadcuenta');
		$strTipoPaginaAuxiliarcuenta= $this->getDataGeneralString('strTipoPaginaAuxiliarcuenta');
		$strTipoUsuarioAuxiliarcuenta= $this->getDataGeneralString('strTipoUsuarioAuxiliarcuenta');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadcuenta,$strTipoPaginaAuxiliarcuenta,$strTipoUsuarioAuxiliarcuenta,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadcuenta!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('cuenta','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->cuentaReturnGeneral=new cuenta_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cuentaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cuentaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cuentaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cuentaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cuentaReturnGeneral);
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
		$this->cuentaReturnGeneral=new cuenta_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cuentaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cuentaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cuentaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cuentaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cuentaReturnGeneral);
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
		$this->cuentaReturnGeneral=new cuenta_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cuentaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cuentaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cuentaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cuentaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cuentaReturnGeneral);
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
				$this->cuentaLogic->getNewConnexionToDeep();
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
			
			
			$this->cuentaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->cuentaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cuentaReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->cuentaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->cuentaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cuentaReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
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
				$this->cuentaLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->cuentaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->cuentaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->cuentaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cuentaReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->cuentaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cuentaReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->cuentaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->cuentaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->cuentaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cuentaReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->cuentaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cuentaReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
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
		
		$this->cuentaLogic=new cuenta_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->cuenta=new cuenta();
		
		$this->strTypeOnLoadcuenta='onload';
		$this->strTipoPaginaAuxiliarcuenta='none';
		$this->strTipoUsuarioAuxiliarcuenta='none';	

		$this->intNumeroPaginacion=cuenta_util::$INT_NUMERO_PAGINACION;
		
		$this->cuentaModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuentaControllerAdditional=new cuenta_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(cuenta_session $cuenta_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($cuenta_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadcuenta='',?string $strTipoPaginaAuxiliarcuenta='',?string $strTipoUsuarioAuxiliarcuenta='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadcuenta=$strTypeOnLoadcuenta;
			$this->strTipoPaginaAuxiliarcuenta=$strTipoPaginaAuxiliarcuenta;
			$this->strTipoUsuarioAuxiliarcuenta=$strTipoUsuarioAuxiliarcuenta;
	
			if($strTipoUsuarioAuxiliarcuenta=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->cuenta=new cuenta();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Cuentases';
			
			
			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));
							
			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
				
				/*$this->Session->write('cuenta_session',$cuenta_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($cuenta_session->strFuncionJsPadre!=null && $cuenta_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$cuenta_session->strFuncionJsPadre;
				
				$cuenta_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($cuenta_session);
			
			if($strTypeOnLoadcuenta!=null && $strTypeOnLoadcuenta=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$cuenta_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$cuenta_session->setPaginaPopupVariables(true);
				}
				
				if($cuenta_session->intNumeroPaginacion==cuenta_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,cuenta_util::$STR_SESSION_NAME,'contabilidad');																
			
			} else if($strTypeOnLoadcuenta!=null && $strTypeOnLoadcuenta=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$cuenta_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=cuenta_util::$INT_NUMERO_PAGINACION;*/
				
				if($cuenta_session->intNumeroPaginacion==cuenta_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarcuenta!=null && $strTipoPaginaAuxiliarcuenta=='none') {
				/*$cuenta_session->strStyleDivHeader='display:table-row';*/
				
				/*$cuenta_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarcuenta!=null && $strTipoPaginaAuxiliarcuenta=='iframe') {
					/*
					$cuenta_session->strStyleDivArbol='display:none';
					$cuenta_session->strStyleDivHeader='display:none';
					$cuenta_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$cuenta_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->cuentaClase=new cuenta();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=cuenta_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(cuenta_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->cuentaLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->cuentaLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$categoriachequeLogic=new categoria_cheque_logic();
			//$otroimpuestoLogic=new otro_impuesto_logic();
			//$impuestoLogic=new impuesto_logic();
			//$cuentacorrienteLogic=new cuenta_corriente_logic();
			//$productoLogic=new producto_logic();
			//$instrumentopagoLogic=new instrumento_pago_logic();
			//$listaproductoLogic=new lista_producto_logic();
			//$asientodetalleLogic=new asiento_detalle_logic();
			//$retencionLogic=new retencion_logic();
			//$retencionfuenteLogic=new retencion_fuente_logic();
			//$cuentaLogic=new cuenta_logic();
			//$proveedorLogic=new proveedor_logic();
			//$formapagoclienteLogic=new forma_pago_cliente_logic();
			//$saldocuentaLogic=new saldo_cuenta_logic();
			//$terminopagoproveedorLogic=new termino_pago_proveedor_logic();
			//$retencionicaLogic=new retencion_ica_logic();
			//$asientopredefinidodetalleLogic=new asiento_predefinido_detalle_logic();
			//$clienteLogic=new cliente_logic();
			//$asientoautomaticodetalleLogic=new asiento_automatico_detalle_logic();
			//$formapagoproveedorLogic=new forma_pago_proveedor_logic();
			//$terminopagoclienteLogic=new termino_pago_cliente_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->cuentaLogic=new cuenta_logic();*/
			
			
			$this->cuentasModel=null;
			/*new ListDataModel();*/
			
			/*$this->cuentasModel.setWrappedData(cuentaLogic->getcuentas());*/
						
			$this->cuentas= array();
			$this->cuentasEliminados=array();
			$this->cuentasSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= cuenta_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= cuenta_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->cuenta= new cuenta();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idcuenta='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idtipo_cuenta='display:table-row';
			$this->strVisibleFK_Idtipo_nivel_cuenta='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarcuenta!=null && $strTipoUsuarioAuxiliarcuenta!='none' && $strTipoUsuarioAuxiliarcuenta!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcuenta);
																
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
				if($strTipoUsuarioAuxiliarcuenta!=null && $strTipoUsuarioAuxiliarcuenta!='none' && $strTipoUsuarioAuxiliarcuenta!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcuenta);
																
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
				if($strTipoUsuarioAuxiliarcuenta==null || $strTipoUsuarioAuxiliarcuenta=='none' || $strTipoUsuarioAuxiliarcuenta=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarcuenta,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina cuenta');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($cuenta_session);
			
			$this->getSetBusquedasSesionConfig($cuenta_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportecuentas($this->strAccionBusqueda,$this->cuentaLogic->getcuentas());*/
				} else if($this->strGenerarReporte=='Html')	{
					$cuenta_session->strServletGenerarHtmlReporte='cuentaServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(cuenta_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(cuenta_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($cuenta_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarcuenta!=null && $strTipoUsuarioAuxiliarcuenta=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($cuenta_session);
			}
								
			$this->set(cuenta_util::$STR_SESSION_NAME, $cuenta_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($cuenta_session);
			
			/*
			$this->cuenta->recursive = 0;
			
			$this->cuentas=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('cuentas', $this->cuentas);
			
			$this->set(cuenta_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->cuentaActual =$this->cuentaClase;
			
			/*$this->cuentaActual =$this->migrarModelcuenta($this->cuentaClase);*/
			
			$this->returnHtml(false);
			
			$this->set(cuenta_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=cuenta_util::$STR_NOMBRE_OPCION;
				
			if(cuenta_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=cuenta_util::$STR_MODULO_OPCION.cuenta_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
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
			/*$cuentaClase= (cuenta) cuentasModel.getRowData();*/
			
			$this->cuentaClase->setId($this->cuenta->getId());	
			$this->cuentaClase->setVersionRow($this->cuenta->getVersionRow());	
			$this->cuentaClase->setVersionRow($this->cuenta->getVersionRow());	
			$this->cuentaClase->setid_empresa($this->cuenta->getid_empresa());	
			$this->cuentaClase->setid_tipo_cuenta($this->cuenta->getid_tipo_cuenta());	
			$this->cuentaClase->setid_tipo_nivel_cuenta($this->cuenta->getid_tipo_nivel_cuenta());	
			$this->cuentaClase->setid_cuenta($this->cuenta->getid_cuenta());	
			$this->cuentaClase->setcodigo($this->cuenta->getcodigo());	
			$this->cuentaClase->setnombre($this->cuenta->getnombre());	
			$this->cuentaClase->setnivel_cuenta($this->cuenta->getnivel_cuenta());	
			$this->cuentaClase->setusa_monto_base($this->cuenta->getusa_monto_base());	
			$this->cuentaClase->setmonto_base($this->cuenta->getmonto_base());	
			$this->cuentaClase->setporcentaje_base($this->cuenta->getporcentaje_base());	
			$this->cuentaClase->setcon_centro_costos($this->cuenta->getcon_centro_costos());	
			$this->cuentaClase->setcon_ruc($this->cuenta->getcon_ruc());	
			$this->cuentaClase->setbalance($this->cuenta->getbalance());	
			$this->cuentaClase->setdescripcion($this->cuenta->getdescripcion());	
			$this->cuentaClase->setcon_retencion($this->cuenta->getcon_retencion());	
			$this->cuentaClase->setvalor_retencion($this->cuenta->getvalor_retencion());	
			$this->cuentaClase->setultima_transaccion($this->cuenta->getultima_transaccion());	
		
			/*$this->Session->write('cuentaVersionRowActual', cuenta.getVersionRow());*/
			
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
			
			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));
						
			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('cuenta', $this->cuenta->read(null, $id));
	
			
			$this->cuenta->recursive = 0;
			
			$this->cuentas=$this->paginate();
			
			$this->set('cuentas', $this->cuentas);
	
			if (empty($this->data)) {
				$this->data = $this->cuenta->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->cuentaLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cuentaClase);
			
			$this->cuentaActual=$this->cuentaClase;
			
			/*$this->cuentaActual =$this->migrarModelcuenta($this->cuentaClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cuentaLogic->getcuentas(),$this->cuentaActual);
			
			$this->actualizarControllerConReturnGeneral($this->cuentaReturnGeneral);
			
			//$this->cuentaReturnGeneral=$this->cuentaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cuentaLogic->getcuentas(),$this->cuentaActual,$this->cuentaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));
						
			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevocuenta', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->cuentaClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cuentaClase);
			
			$this->cuentaActual =$this->cuentaClase;
			
			/*$this->cuentaActual =$this->migrarModelcuenta($this->cuentaClase);*/
			
			$this->setcuentaFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cuentaLogic->getcuentas(),$this->cuenta);
			
			$this->actualizarControllerConReturnGeneral($this->cuentaReturnGeneral);
			
			//this->cuentaReturnGeneral=$this->cuentaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cuentaLogic->getcuentas(),$this->cuenta,$this->cuentaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->cuentaReturnGeneral->getcuenta()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idtipo_cuentaDefaultFK!=null && $this->idtipo_cuentaDefaultFK > -1) {
				$this->cuentaReturnGeneral->getcuenta()->setid_tipo_cuenta($this->idtipo_cuentaDefaultFK);
			}

			if($this->idtipo_nivel_cuentaDefaultFK!=null && $this->idtipo_nivel_cuentaDefaultFK > -1) {
				$this->cuentaReturnGeneral->getcuenta()->setid_tipo_nivel_cuenta($this->idtipo_nivel_cuentaDefaultFK);
			}

			if($this->idcuentaDefaultFK!=null && $this->idcuentaDefaultFK > -1) {
				$this->cuentaReturnGeneral->getcuenta()->setid_cuenta($this->idcuentaDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->cuentaReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->cuentaReturnGeneral->getcuenta(),$this->cuentaActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeycuenta($this->cuentaReturnGeneral->getcuenta());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariocuenta($this->cuentaReturnGeneral->getcuenta());*/
			}
			
			if($this->cuentaReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->cuentaReturnGeneral->getcuenta(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualcuenta($this->cuenta,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->cuentasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuentasAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->cuentasAuxiliar=array();
			}
			
			if(count($this->cuentasAuxiliar)==2) {
				$cuentaOrigen=$this->cuentasAuxiliar[0];
				$cuentaDestino=$this->cuentasAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($cuentaOrigen,$cuentaDestino,true,false,false);
				
				$this->actualizarLista($cuentaDestino,$this->cuentas);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->cuentasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuentasAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cuentasAuxiliar=array();
			}
			
			if(count($this->cuentasAuxiliar) > 0) {
				foreach ($this->cuentasAuxiliar as $cuentaSeleccionado) {
					$this->cuenta=new cuenta();
					
					$this->setCopiarVariablesObjetos($cuentaSeleccionado,$this->cuenta,true,true,false);
						
					$this->cuentas[]=$this->cuenta;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->cuentasEliminados as $cuentaEliminado) {
				$this->cuentaLogic->cuentas[]=$cuentaEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->cuenta=new cuenta();
							
				$this->cuentas[]=$this->cuenta;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
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
		
		$cuentaActual=new cuenta();
		
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
				
				$cuentaActual=$this->cuentas[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $cuentaActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $cuentaActual->setid_tipo_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $cuentaActual->setid_tipo_nivel_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $cuentaActual->setid_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $cuentaActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $cuentaActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $cuentaActual->setnivel_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $cuentaActual->setusa_monto_base(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_10')));  } else { $cuentaActual->setusa_monto_base(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $cuentaActual->setmonto_base((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $cuentaActual->setporcentaje_base((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $cuentaActual->setcon_centro_costos(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_13')));  } else { $cuentaActual->setcon_centro_costos(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $cuentaActual->setcon_ruc(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_14')));  } else { $cuentaActual->setcon_ruc(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $cuentaActual->setbalance((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $cuentaActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $cuentaActual->setcon_retencion(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_17')));  } else { $cuentaActual->setcon_retencion(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $cuentaActual->setvalor_retencion((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $cuentaActual->setultima_transaccion(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19')));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->cuentasAuxiliar=array();		 
		/*$this->cuentasEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->cuentasAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->cuentasAuxiliar=array();
		}
			
		if(count($this->cuentasAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->cuentasAuxiliar as $cuentaAuxLocal) {				
				
				foreach($this->cuentas as $cuentaLocal) {
					if($cuentaLocal->getId()==$cuentaAuxLocal->getId()) {
						$cuentaLocal->setIsDeleted(true);
						
						/*$this->cuentasEliminados[]=$cuentaLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->cuentaLogic->setcuentas($this->cuentas);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
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
				$this->cuentaLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cuenta_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadcuenta='',string $strTipoPaginaAuxiliarcuenta='',string $strTipoUsuarioAuxiliarcuenta='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadcuenta,$strTipoPaginaAuxiliarcuenta,$strTipoUsuarioAuxiliarcuenta,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->cuentas) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=cuenta_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=cuenta_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=cuenta_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));
						
			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
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
					/*$this->intNumeroPaginacion=cuenta_util::$INT_NUMERO_PAGINACION;*/
					
					if($cuenta_session->intNumeroPaginacion==cuenta_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=cuenta_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$cuenta_session->intNumeroPaginacion;
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
			
			$this->cuentasEliminados=array();
			
			/*$this->cuentaLogic->setConnexion($connexion);*/
			
			$this->cuentaLogic->setIsConDeep(true);
			
			$this->cuentaLogic->getcuentaDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_cuenta');$classes[]=$class;
			$class=new Classe('tipo_nivel_cuenta');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
			
			$this->cuentaLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuentaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->cuentaLogic->getcuentas()==null|| count($this->cuentaLogic->getcuentas())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cuentas=$this->cuentaLogic->getcuentas();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuentaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->cuentasReporte=$this->cuentaLogic->getcuentas();
									
						/*$this->generarReportes('Todos',$this->cuentaLogic->getcuentas());*/
					
						$this->cuentaLogic->setcuentas($this->cuentas);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuentaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->cuentaLogic->getcuentas()==null|| count($this->cuentaLogic->getcuentas())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cuentas=$this->cuentaLogic->getcuentas();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuentaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->cuentasReporte=$this->cuentaLogic->getcuentas();
									
						/*$this->generarReportes('Todos',$this->cuentaLogic->getcuentas());*/
					
						$this->cuentaLogic->setcuentas($this->cuentas);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idcuenta=0;*/
				
				if($cuenta_session->bitBusquedaDesdeFKSesionFK!=null && $cuenta_session->bitBusquedaDesdeFKSesionFK==true) {
					if($cuenta_session->bigIdActualFK!=null && $cuenta_session->bigIdActualFK!=0)	{
						$this->idcuenta=$cuenta_session->bigIdActualFK;	
					}
					
					$cuenta_session->bitBusquedaDesdeFKSesionFK=false;
					
					$cuenta_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idcuenta=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idcuenta=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuentaLogic->getEntity($this->idcuenta);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*cuentaLogicAdditional::getDetalleIndicePorId($idcuenta);*/

				
				if($this->cuentaLogic->getcuenta()!=null) {
					$this->cuentaLogic->setcuentas(array());
					$this->cuentaLogic->cuentas[]=$this->cuentaLogic->getcuenta();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idcuenta')
			{

				if($cuenta_session->bigidcuentaActual!=null && $cuenta_session->bigidcuentaActual!=0)
				{
					$this->id_cuentaFK_Idcuenta=$cuenta_session->bigidcuentaActual;
					$cuenta_session->bigidcuentaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuentaLogic->getsFK_Idcuenta($finalQueryPaginacion,$this->pagination,$this->id_cuentaFK_Idcuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuentaLogicAdditional::getDetalleIndiceFK_Idcuenta($this->id_cuentaFK_Idcuenta);


					if($this->cuentaLogic->getcuentas()==null || count($this->cuentaLogic->getcuentas())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuentas=$this->cuentaLogic->getcuentas();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuentaLogic->getsFK_Idcuenta('',$this->pagination,$this->id_cuentaFK_Idcuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuentasReporte=$this->cuentaLogic->getcuentas();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuentas("FK_Idcuenta",$this->cuentaLogic->getcuentas());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuentaLogic->setcuentas($cuentas);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($cuenta_session->bigidempresaActual!=null && $cuenta_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$cuenta_session->bigidempresaActual;
					$cuenta_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuentaLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuentaLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->cuentaLogic->getcuentas()==null || count($this->cuentaLogic->getcuentas())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuentas=$this->cuentaLogic->getcuentas();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuentaLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuentasReporte=$this->cuentaLogic->getcuentas();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuentas("FK_Idempresa",$this->cuentaLogic->getcuentas());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuentaLogic->setcuentas($cuentas);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtipo_cuenta')
			{

				if($cuenta_session->bigidtipo_cuentaActual!=null && $cuenta_session->bigidtipo_cuentaActual!=0)
				{
					$this->id_tipo_cuentaFK_Idtipo_cuenta=$cuenta_session->bigidtipo_cuentaActual;
					$cuenta_session->bigidtipo_cuentaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuentaLogic->getsFK_Idtipo_cuenta($finalQueryPaginacion,$this->pagination,$this->id_tipo_cuentaFK_Idtipo_cuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuentaLogicAdditional::getDetalleIndiceFK_Idtipo_cuenta($this->id_tipo_cuentaFK_Idtipo_cuenta);


					if($this->cuentaLogic->getcuentas()==null || count($this->cuentaLogic->getcuentas())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuentas=$this->cuentaLogic->getcuentas();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuentaLogic->getsFK_Idtipo_cuenta('',$this->pagination,$this->id_tipo_cuentaFK_Idtipo_cuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuentasReporte=$this->cuentaLogic->getcuentas();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuentas("FK_Idtipo_cuenta",$this->cuentaLogic->getcuentas());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuentaLogic->setcuentas($cuentas);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtipo_nivel_cuenta')
			{

				if($cuenta_session->bigidtipo_nivel_cuentaActual!=null && $cuenta_session->bigidtipo_nivel_cuentaActual!=0)
				{
					$this->id_tipo_nivel_cuentaFK_Idtipo_nivel_cuenta=$cuenta_session->bigidtipo_nivel_cuentaActual;
					$cuenta_session->bigidtipo_nivel_cuentaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuentaLogic->getsFK_Idtipo_nivel_cuenta($finalQueryPaginacion,$this->pagination,$this->id_tipo_nivel_cuentaFK_Idtipo_nivel_cuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuentaLogicAdditional::getDetalleIndiceFK_Idtipo_nivel_cuenta($this->id_tipo_nivel_cuentaFK_Idtipo_nivel_cuenta);


					if($this->cuentaLogic->getcuentas()==null || count($this->cuentaLogic->getcuentas())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuentas=$this->cuentaLogic->getcuentas();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuentaLogic->getsFK_Idtipo_nivel_cuenta('',$this->pagination,$this->id_tipo_nivel_cuentaFK_Idtipo_nivel_cuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuentasReporte=$this->cuentaLogic->getcuentas();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuentas("FK_Idtipo_nivel_cuenta",$this->cuentaLogic->getcuentas());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuentaLogic->setcuentas($cuentas);
					}
				//}

			} 
		
		$cuenta_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cuenta_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->cuentaLogic->loadForeignsKeysDescription();*/
		
		$this->cuentas=$this->cuentaLogic->getcuentas();
		
		if($this->cuentasEliminados==null) {
			$this->cuentasEliminados=array();
		}
		
		$this->Session->write(cuenta_util::$STR_SESSION_NAME.'Lista',serialize($this->cuentas));
		$this->Session->write(cuenta_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->cuentasEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idcuenta=$idGeneral;
			
			$this->intNumeroPaginacion=cuenta_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
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
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
			}

			if(count($this->cuentas) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_IdcuentaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuentaFK_Idcuenta=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta','cmbid_cuenta');

			$this->strAccionBusqueda='FK_Idcuenta';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
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
				$this->cuentaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtipo_cuentaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_tipo_cuentaFK_Idtipo_cuenta=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtipo_cuenta','cmbid_tipo_cuenta');

			$this->strAccionBusqueda='FK_Idtipo_cuenta';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtipo_nivel_cuentaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_tipo_nivel_cuentaFK_Idtipo_nivel_cuenta=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtipo_nivel_cuenta','cmbid_tipo_nivel_cuenta');

			$this->strAccionBusqueda='FK_Idtipo_nivel_cuenta';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idcuenta($strFinalQuery,$id_cuenta)
	{
		try
		{

			$this->cuentaLogic->getsFK_Idcuenta($strFinalQuery,new Pagination(),$id_cuenta);
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

			$this->cuentaLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtipo_cuenta($strFinalQuery,$id_tipo_cuenta)
	{
		try
		{

			$this->cuentaLogic->getsFK_Idtipo_cuenta($strFinalQuery,new Pagination(),$id_tipo_cuenta);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtipo_nivel_cuenta($strFinalQuery,$id_tipo_nivel_cuenta)
	{
		try
		{

			$this->cuentaLogic->getsFK_Idtipo_nivel_cuenta($strFinalQuery,new Pagination(),$id_tipo_nivel_cuenta);
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
			
			
			$cuentaForeignKey=new cuenta_param_return(); //cuentaForeignKey();
			
			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));
						
			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$cuentaForeignKey=$this->cuentaLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$cuenta_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$cuentaForeignKey->empresasFK;
				$this->idempresaDefaultFK=$cuentaForeignKey->idempresaDefaultFK;
			}

			if($cuenta_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_cuenta',$this->strRecargarFkTipos,',')) {
				$this->tipo_cuentasFK=$cuentaForeignKey->tipo_cuentasFK;
				$this->idtipo_cuentaDefaultFK=$cuentaForeignKey->idtipo_cuentaDefaultFK;
			}

			if($cuenta_session->bitBusquedaDesdeFKSesiontipo_cuenta) {
				$this->setVisibleBusquedasParatipo_cuenta(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_nivel_cuenta',$this->strRecargarFkTipos,',')) {
				$this->tipo_nivel_cuentasFK=$cuentaForeignKey->tipo_nivel_cuentasFK;
				$this->idtipo_nivel_cuentaDefaultFK=$cuentaForeignKey->idtipo_nivel_cuentaDefaultFK;
			}

			if($cuenta_session->bitBusquedaDesdeFKSesiontipo_nivel_cuenta) {
				$this->setVisibleBusquedasParatipo_nivel_cuenta(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta',$this->strRecargarFkTipos,',')) {
				$this->cuentasFK=$cuentaForeignKey->cuentasFK;
				$this->idcuentaDefaultFK=$cuentaForeignKey->idcuentaDefaultFK;
			}

			if($cuenta_session->bitBusquedaDesdeFKSesioncuenta) {
				$this->setVisibleBusquedasParacuenta(true);
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
	
	function cargarCombosFKFromReturnGeneral($cuentaReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$cuentaReturnGeneral->strRecargarFkTipos;
			
			


			if($cuentaReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$cuentaReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$cuentaReturnGeneral->idempresaDefaultFK;
			}


			if($cuentaReturnGeneral->con_tipo_cuentasFK==true) {
				$this->tipo_cuentasFK=$cuentaReturnGeneral->tipo_cuentasFK;
				$this->idtipo_cuentaDefaultFK=$cuentaReturnGeneral->idtipo_cuentaDefaultFK;
			}


			if($cuentaReturnGeneral->con_tipo_nivel_cuentasFK==true) {
				$this->tipo_nivel_cuentasFK=$cuentaReturnGeneral->tipo_nivel_cuentasFK;
				$this->idtipo_nivel_cuentaDefaultFK=$cuentaReturnGeneral->idtipo_nivel_cuentaDefaultFK;
			}


			if($cuentaReturnGeneral->con_cuentasFK==true) {
				$this->cuentasFK=$cuentaReturnGeneral->cuentasFK;
				$this->idcuentaDefaultFK=$cuentaReturnGeneral->idcuentaDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(cuenta_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));
		
		if($cuenta_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($cuenta_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($cuenta_session->getstrNombrePaginaNavegacionHaciaFKDesde()==tipo_cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='tipo_cuenta';
			}
			else if($cuenta_session->getstrNombrePaginaNavegacionHaciaFKDesde()==tipo_nivel_cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='tipo_nivel_cuenta';
			}
			else if($cuenta_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta';
			}
			
			$cuenta_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
			}						
			
			$this->cuentasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuentasAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cuentasAuxiliar=array();
			}
			
			if(count($this->cuentasAuxiliar) > 0) {
				
				foreach ($this->cuentasAuxiliar as $cuentaSeleccionado) {
					$this->eliminarTablaBase($cuentaSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('asiento_automatico_detalle');
			$tipoRelacionReporte->setsDescripcion('Detalle Asiento Automaticos');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('asiento_detalle');
			$tipoRelacionReporte->setsDescripcion('Detalle Asientoes');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('asiento_predefinido_detalle');
			$tipoRelacionReporte->setsDescripcion('Detalle Asiento Predefinidos');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('categoria_cheque');
			$tipoRelacionReporte->setsDescripcion('Categoria Cheques');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('cliente');
			$tipoRelacionReporte->setsDescripcion('Clientes');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('cuenta_corriente');
			$tipoRelacionReporte->setsDescripcion('Cuenta Corrientes');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('cuenta');
			$tipoRelacionReporte->setsDescripcion('es');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('forma_pago_cliente');
			$tipoRelacionReporte->setsDescripcion('Forma Pago Clientes');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('forma_pago_proveedor');
			$tipoRelacionReporte->setsDescripcion('Forma Pago Proveedores');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('impuesto');
			$tipoRelacionReporte->setsDescripcion('Impuesto_VENTASs');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('instrumento_pago');
			$tipoRelacionReporte->setsDescripcion('Instrumento Pago_VENTASs');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('lista_producto');
			$tipoRelacionReporte->setsDescripcion('Lista Productos_VENTAes');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('otro_impuesto');
			$tipoRelacionReporte->setsDescripcion('Otro Impuesto_VENTASs');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('producto');
			$tipoRelacionReporte->setsDescripcion('Producto_VENTAs');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('proveedor');
			$tipoRelacionReporte->setsDescripcion('Proveedores');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('retencion');
			$tipoRelacionReporte->setsDescripcion('Retencion_COMPRASes');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('retencion_fuente');
			$tipoRelacionReporte->setsDescripcion('Retencion Fuente_COMPRASes');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('retencion_ica');
			$tipoRelacionReporte->setsDescripcion('Retencion Ica_VENTASs');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('saldo_cuenta');
			$tipoRelacionReporte->setsDescripcion('Saldo Cuentas');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('termino_pago_cliente');
			$tipoRelacionReporte->setsDescripcion('Terminos Pago Clientes');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('termino_pago_proveedor');
			$tipoRelacionReporte->setsDescripcion('Terminos Pago Proveedoreses');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=categoria_cheque_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=otro_impuesto_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=impuesto_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=cuenta_corriente_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=producto_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=instrumento_pago_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=lista_producto_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=asiento_detalle_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=retencion_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=retencion_fuente_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=cuenta_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=proveedor_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=forma_pago_cliente_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=saldo_cuenta_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=termino_pago_proveedor_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=retencion_ica_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=asiento_predefinido_detalle_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=cliente_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=asiento_automatico_detalle_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=forma_pago_proveedor_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=termino_pago_cliente_util::$STR_NOMBRE_CLASE;
		
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


	public function gettipo_cuentasFKListSelectItem() 
	{
		$tipo_cuentasList=array();

		$item=null;

		foreach($this->tipo_cuentasFK as $tipo_cuenta)
		{
			$item=new SelectItem();
			$item->setLabel($tipo_cuenta->getnombre());
			$item->setValue($tipo_cuenta->getId());
			$tipo_cuentasList[]=$item;
		}

		return $tipo_cuentasList;
	}


	public function gettipo_nivel_cuentasFKListSelectItem() 
	{
		$tipo_nivel_cuentasList=array();

		$item=null;

		foreach($this->tipo_nivel_cuentasFK as $tipo_nivel_cuenta)
		{
			$item=new SelectItem();
			$item->setLabel($tipo_nivel_cuenta->getnombre());
			$item->setValue($tipo_nivel_cuenta->getId());
			$tipo_nivel_cuentasList[]=$item;
		}

		return $tipo_nivel_cuentasList;
	}


	public function getcuentasFKListSelectItem() 
	{
		$cuentasList=array();

		$item=null;

		foreach($this->cuentasFK as $cuenta)
		{
			$item=new SelectItem();
			$item->setLabel($cuenta->getcodigo());
			$item->setValue($cuenta->getId());
			$cuentasList[]=$item;
		}

		return $cuentasList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cuenta_util::$INT_NUMERO_PAGINACION;
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
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$cuentasNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->cuentas as $cuentaLocal) {
				if($cuentaLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->cuenta=new cuenta();
				
				$this->cuenta->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->cuentas[]=$this->cuenta;*/
				
				$cuentasNuevos[]=$this->cuenta;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_cuenta');$classes[]=$class;
				$class=new Classe('tipo_nivel_cuenta');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->setcuentas($cuentasNuevos);
					
				$this->cuentaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($cuentasNuevos as $cuentaNuevo) {
					$this->cuentas[]=$cuentaNuevo;
				}
				
				/*$this->cuentas[]=$cuentasNuevos;*/
				
				$this->cuentaLogic->setcuentas($this->cuentas);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($cuentasNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

		if($cuenta_session==null) {
			$cuenta_session=new cuenta_session();
		}
		
		if($cuenta_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($cuenta_session->bigidempresaActual!=null && $cuenta_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cuenta_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=cuenta_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombostipo_cuentasFK($connexion=null,$strRecargarFkQuery=''){
		$tipo_cuentaLogic= new tipo_cuenta_logic();
		$pagination= new Pagination();
		$this->tipo_cuentasFK=array();

		$tipo_cuentaLogic->setConnexion($connexion);
		$tipo_cuentaLogic->gettipo_cuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

		if($cuenta_session==null) {
			$cuenta_session=new cuenta_session();
		}
		
		if($cuenta_session->bitBusquedaDesdeFKSesiontipo_cuenta!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_cuenta_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltipo_cuenta=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_cuenta=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_cuenta, '');
				$finalQueryGlobaltipo_cuenta.=tipo_cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_cuenta.$strRecargarFkQuery;		

				$tipo_cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostipo_cuentasFK($tipo_cuentaLogic->gettipo_cuentas());

		} else {
			$this->setVisibleBusquedasParatipo_cuenta(true);


			if($cuenta_session->bigidtipo_cuentaActual!=null && $cuenta_session->bigidtipo_cuentaActual > 0) {
				$tipo_cuentaLogic->getEntity($cuenta_session->bigidtipo_cuentaActual);//WithConnection

				$this->tipo_cuentasFK[$tipo_cuentaLogic->gettipo_cuenta()->getId()]=cuenta_util::gettipo_cuentaDescripcion($tipo_cuentaLogic->gettipo_cuenta());
				$this->idtipo_cuentaDefaultFK=$tipo_cuentaLogic->gettipo_cuenta()->getId();
			}
		}
	}

	public function cargarCombostipo_nivel_cuentasFK($connexion=null,$strRecargarFkQuery=''){
		$tipo_nivel_cuentaLogic= new tipo_nivel_cuenta_logic();
		$pagination= new Pagination();
		$this->tipo_nivel_cuentasFK=array();

		$tipo_nivel_cuentaLogic->setConnexion($connexion);
		$tipo_nivel_cuentaLogic->gettipo_nivel_cuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

		if($cuenta_session==null) {
			$cuenta_session=new cuenta_session();
		}
		
		if($cuenta_session->bitBusquedaDesdeFKSesiontipo_nivel_cuenta!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_nivel_cuenta_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltipo_nivel_cuenta=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_nivel_cuenta=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_nivel_cuenta, '');
				$finalQueryGlobaltipo_nivel_cuenta.=tipo_nivel_cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_nivel_cuenta.$strRecargarFkQuery;		

				$tipo_nivel_cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostipo_nivel_cuentasFK($tipo_nivel_cuentaLogic->gettipo_nivel_cuentas());

		} else {
			$this->setVisibleBusquedasParatipo_nivel_cuenta(true);


			if($cuenta_session->bigidtipo_nivel_cuentaActual!=null && $cuenta_session->bigidtipo_nivel_cuentaActual > 0) {
				$tipo_nivel_cuentaLogic->getEntity($cuenta_session->bigidtipo_nivel_cuentaActual);//WithConnection

				$this->tipo_nivel_cuentasFK[$tipo_nivel_cuentaLogic->gettipo_nivel_cuenta()->getId()]=cuenta_util::gettipo_nivel_cuentaDescripcion($tipo_nivel_cuentaLogic->gettipo_nivel_cuenta());
				$this->idtipo_nivel_cuentaDefaultFK=$tipo_nivel_cuentaLogic->gettipo_nivel_cuenta()->getId();
			}
		}
	}

	public function cargarComboscuentasFK($connexion=null,$strRecargarFkQuery=''){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$this->cuentasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

		if($cuenta_session==null) {
			$cuenta_session=new cuenta_session();
		}
		
		if($cuenta_session->bitBusquedaDesdeFKSesioncuenta!=true) {
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


			$this->prepararComboscuentasFK($cuentaLogic->getcuentas());

		} else {
			$this->setVisibleBusquedasParacuenta(true);


			if($cuenta_session->bigidcuentaActual!=null && $cuenta_session->bigidcuentaActual > 0) {
				$cuentaLogic->getEntity($cuenta_session->bigidcuentaActual);//WithConnection

				$this->cuentasFK[$cuentaLogic->getcuenta()->getId()]=cuenta_util::getcuentaDescripcion($cuentaLogic->getcuenta());
				$this->idcuentaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=cuenta_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombostipo_cuentasFK($tipo_cuentas){

		foreach ($tipo_cuentas as $tipo_cuentaLocal ) {
			if($this->idtipo_cuentaDefaultFK==0) {
				$this->idtipo_cuentaDefaultFK=$tipo_cuentaLocal->getId();
			}

			$this->tipo_cuentasFK[$tipo_cuentaLocal->getId()]=cuenta_util::gettipo_cuentaDescripcion($tipo_cuentaLocal);
		}
	}

	public function prepararCombostipo_nivel_cuentasFK($tipo_nivel_cuentas){

		foreach ($tipo_nivel_cuentas as $tipo_nivel_cuentaLocal ) {
			if($this->idtipo_nivel_cuentaDefaultFK==0) {
				$this->idtipo_nivel_cuentaDefaultFK=$tipo_nivel_cuentaLocal->getId();
			}

			$this->tipo_nivel_cuentasFK[$tipo_nivel_cuentaLocal->getId()]=cuenta_util::gettipo_nivel_cuentaDescripcion($tipo_nivel_cuentaLocal);
		}
	}

	public function prepararComboscuentasFK($cuentas){

		foreach ($cuentas as $cuentaLocal ) {
			if($this->idcuentaDefaultFK==0) {
				$this->idcuentaDefaultFK=$cuentaLocal->getId();
			}

			$this->cuentasFK[$cuentaLocal->getId()]=cuenta_util::getcuentaDescripcion($cuentaLocal);
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

			$strDescripcionempresa=cuenta_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
	}

	public function cargarDescripciontipo_cuentaFK($idtipo_cuenta,$connexion=null){
		$tipo_cuentaLogic= new tipo_cuenta_logic();
		$tipo_cuentaLogic->setConnexion($connexion);
		$tipo_cuentaLogic->gettipo_cuentaDataAccess()->isForFKData=true;
		$strDescripciontipo_cuenta='';

		if($idtipo_cuenta!=null && $idtipo_cuenta!='' && $idtipo_cuenta!='null') {
			if($connexion!=null) {
				$tipo_cuentaLogic->getEntity($idtipo_cuenta);//WithConnection
			} else {
				$tipo_cuentaLogic->getEntityWithConnection($idtipo_cuenta);//
			}

			$strDescripciontipo_cuenta=cuenta_util::gettipo_cuentaDescripcion($tipo_cuentaLogic->gettipo_cuenta());

		} else {
			$strDescripciontipo_cuenta='null';
		}

		return $strDescripciontipo_cuenta;
	}

	public function cargarDescripciontipo_nivel_cuentaFK($idtipo_nivel_cuenta,$connexion=null){
		$tipo_nivel_cuentaLogic= new tipo_nivel_cuenta_logic();
		$tipo_nivel_cuentaLogic->setConnexion($connexion);
		$tipo_nivel_cuentaLogic->gettipo_nivel_cuentaDataAccess()->isForFKData=true;
		$strDescripciontipo_nivel_cuenta='';

		if($idtipo_nivel_cuenta!=null && $idtipo_nivel_cuenta!='' && $idtipo_nivel_cuenta!='null') {
			if($connexion!=null) {
				$tipo_nivel_cuentaLogic->getEntity($idtipo_nivel_cuenta);//WithConnection
			} else {
				$tipo_nivel_cuentaLogic->getEntityWithConnection($idtipo_nivel_cuenta);//
			}

			$strDescripciontipo_nivel_cuenta=cuenta_util::gettipo_nivel_cuentaDescripcion($tipo_nivel_cuentaLogic->gettipo_nivel_cuenta());

		} else {
			$strDescripciontipo_nivel_cuenta='null';
		}

		return $strDescripciontipo_nivel_cuenta;
	}

	public function cargarDescripcioncuentaFK($idcuenta,$connexion=null){
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

			$strDescripcioncuenta=cuenta_util::getcuentaDescripcion($cuentaLogic->getcuenta());

		} else {
			$strDescripcioncuenta='null';
		}

		return $strDescripcioncuenta;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(cuenta $cuentaClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$cuentaClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function abrirArbol(){
		$this->saveGetSessionControllerAndPageAuxiliar(false);
		
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaArbol(cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'');
		
		$this->strAuxiliarTipo='POPUP';
			
		$this->saveGetSessionControllerAndPageAuxiliar(true);

		//$this->returnAjax();
	}
	
	public function cargarArbol(){
		$this->saveGetSessionControllerAndPageAuxiliar(false);
		
		/*//SI SE EJECUTA FUNCIONES DEL ARBOL NO SE MUESTRA
		$this->htmlAuxiliar='<h1>AUXILIAR</h1>';*/
		
		$nombre_clase='cuenta';
		$nombre_objeto='cuenta';
		$objetosUsuario=$this->cuentas;
		$tree=null;
		$webroot='webroot';
		
		foreach($objetosUsuario as $objeto) {
			$objeto->setsDescription(cuenta_util::getcuentaDescripcion($objeto));
		}
		
		$this->htmlAuxiliar=FuncionesWebArbol::getMenuUsuarioJQuery2($nombre_clase,$nombre_objeto,$objetosUsuario,$tree,$webroot);
		
		//$this->returnAjax();
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

		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idtipo_cuenta=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idtipo_nivel_cuenta=$strParaVisibleNegacionempresa;
	}

	public function setVisibleBusquedasParatipo_cuenta($isParatipo_cuenta){
		$strParaVisibletipo_cuenta='display:table-row';
		$strParaVisibleNegaciontipo_cuenta='display:none';

		if($isParatipo_cuenta) {
			$strParaVisibletipo_cuenta='display:table-row';
			$strParaVisibleNegaciontipo_cuenta='display:none';
		} else {
			$strParaVisibletipo_cuenta='display:none';
			$strParaVisibleNegaciontipo_cuenta='display:table-row';
		}


		$strParaVisibleNegaciontipo_cuenta=trim($strParaVisibleNegaciontipo_cuenta);

		$this->strVisibleFK_Idcuenta=$strParaVisibleNegaciontipo_cuenta;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontipo_cuenta;
		$this->strVisibleFK_Idtipo_cuenta=$strParaVisibletipo_cuenta;
		$this->strVisibleFK_Idtipo_nivel_cuenta=$strParaVisibleNegaciontipo_cuenta;
	}

	public function setVisibleBusquedasParatipo_nivel_cuenta($isParatipo_nivel_cuenta){
		$strParaVisibletipo_nivel_cuenta='display:table-row';
		$strParaVisibleNegaciontipo_nivel_cuenta='display:none';

		if($isParatipo_nivel_cuenta) {
			$strParaVisibletipo_nivel_cuenta='display:table-row';
			$strParaVisibleNegaciontipo_nivel_cuenta='display:none';
		} else {
			$strParaVisibletipo_nivel_cuenta='display:none';
			$strParaVisibleNegaciontipo_nivel_cuenta='display:table-row';
		}


		$strParaVisibleNegaciontipo_nivel_cuenta=trim($strParaVisibleNegaciontipo_nivel_cuenta);

		$this->strVisibleFK_Idcuenta=$strParaVisibleNegaciontipo_nivel_cuenta;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontipo_nivel_cuenta;
		$this->strVisibleFK_Idtipo_cuenta=$strParaVisibleNegaciontipo_nivel_cuenta;
		$this->strVisibleFK_Idtipo_nivel_cuenta=$strParaVisibletipo_nivel_cuenta;
	}

	public function setVisibleBusquedasParacuenta($isParacuenta){
		$strParaVisiblecuenta='display:table-row';
		$strParaVisibleNegacioncuenta='display:none';

		if($isParacuenta) {
			$strParaVisiblecuenta='display:table-row';
			$strParaVisibleNegacioncuenta='display:none';
		} else {
			$strParaVisiblecuenta='display:none';
			$strParaVisibleNegacioncuenta='display:table-row';
		}


		$strParaVisibleNegacioncuenta=trim($strParaVisibleNegacioncuenta);

		$this->strVisibleFK_Idcuenta=$strParaVisiblecuenta;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idtipo_cuenta=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idtipo_nivel_cuenta=$strParaVisibleNegacioncuenta;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idcuentaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuentaActual=$idcuentaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuentaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuentaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatipo_cuenta() {//$idcuentaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuentaActual=$idcuentaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.tipo_cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuentaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_cuenta(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',tipo_cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuentaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_cuenta(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatipo_nivel_cuenta() {//$idcuentaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuentaActual=$idcuentaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.tipo_nivel_cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuentaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_nivel_cuenta(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',tipo_nivel_cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuentaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_nivel_cuenta(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_nivel_cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta() {//$idcuentaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuentaActual=$idcuentaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuentaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuentaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParacategoria_cheques(int $idcuentaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuentaActual=$idcuentaActual;

		$bitPaginaPopupcategoria_cheque=false;

		try {

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$categoria_cheque_session=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME));

			if($categoria_cheque_session==null) {
				$categoria_cheque_session=new categoria_cheque_session();
			}

			$categoria_cheque_session->strUltimaBusqueda='FK_Idcuenta';
			$categoria_cheque_session->strPathNavegacionActual=$cuenta_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.categoria_cheque_util::$STR_CLASS_WEB_TITULO;
			$categoria_cheque_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcategoria_cheque=$categoria_cheque_session->bitPaginaPopup;
			$categoria_cheque_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcategoria_cheque=$categoria_cheque_session->bitPaginaPopup;
			$categoria_cheque_session->bitPermiteNavegacionHaciaFKDesde=false;
			$categoria_cheque_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_util::$STR_NOMBRE_OPCION;
			$categoria_cheque_session->bitBusquedaDesdeFKSesioncuenta=true;
			$categoria_cheque_session->bigidcuentaActual=$this->idcuentaActual;

			$cuenta_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_session->bigIdActualFK=$this->idcuentaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"categoria_cheque"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"categoria_cheque"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
			$this->Session->write(categoria_cheque_util::$STR_SESSION_NAME,serialize($categoria_cheque_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcategoria_cheque!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',categoria_cheque_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(categoria_cheque_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',categoria_cheque_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(categoria_cheque_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesion_ventasParaotro_impuestos(int $idcuentaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuentaActual=$idcuentaActual;

		$bitPaginaPopupotro_impuesto=false;

		try {

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$otro_impuesto_session=unserialize($this->Session->read(otro_impuesto_util::$STR_SESSION_NAME));

			if($otro_impuesto_session==null) {
				$otro_impuesto_session=new otro_impuesto_session();
			}

			$otro_impuesto_session->strUltimaBusqueda='FK_Idcuenta';
			$otro_impuesto_session->strPathNavegacionActual=$cuenta_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.otro_impuesto_util::$STR_CLASS_WEB_TITULO;
			$otro_impuesto_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupotro_impuesto=$otro_impuesto_session->bitPaginaPopup;
			$otro_impuesto_session->setPaginaPopupVariables(true);
			$bitPaginaPopupotro_impuesto=$otro_impuesto_session->bitPaginaPopup;
			$otro_impuesto_session->bitPermiteNavegacionHaciaFKDesde=false;
			$otro_impuesto_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_util::$STR_NOMBRE_OPCION;
			$otro_impuesto_session->bitBusquedaDesdeFKSesioncuenta_ventas=true;
			$otro_impuesto_session->bigidcuenta_ventasActual=$this->idcuentaActual;

			$cuenta_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_session->bigIdActualFK=$this->idcuentaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"otro_impuesto"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"otro_impuesto"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
			$this->Session->write(otro_impuesto_util::$STR_SESSION_NAME,serialize($otro_impuesto_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupotro_impuesto!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',otro_impuesto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(otro_impuesto_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',otro_impuesto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(otro_impuesto_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesion_ventasParaimpuestos(int $idcuentaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuentaActual=$idcuentaActual;

		$bitPaginaPopupimpuesto=false;

		try {

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$impuesto_session=unserialize($this->Session->read(impuesto_util::$STR_SESSION_NAME));

			if($impuesto_session==null) {
				$impuesto_session=new impuesto_session();
			}

			$impuesto_session->strUltimaBusqueda='FK_Idcuenta';
			$impuesto_session->strPathNavegacionActual=$cuenta_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.impuesto_util::$STR_CLASS_WEB_TITULO;
			$impuesto_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupimpuesto=$impuesto_session->bitPaginaPopup;
			$impuesto_session->setPaginaPopupVariables(true);
			$bitPaginaPopupimpuesto=$impuesto_session->bitPaginaPopup;
			$impuesto_session->bitPermiteNavegacionHaciaFKDesde=false;
			$impuesto_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_util::$STR_NOMBRE_OPCION;
			$impuesto_session->bitBusquedaDesdeFKSesioncuenta_ventas=true;
			$impuesto_session->bigidcuenta_ventasActual=$this->idcuentaActual;

			$cuenta_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_session->bigIdActualFK=$this->idcuentaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"impuesto"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"impuesto"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
			$this->Session->write(impuesto_util::$STR_SESSION_NAME,serialize($impuesto_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupimpuesto!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',impuesto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(impuesto_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',impuesto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(impuesto_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParacuenta_corrientes(int $idcuentaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuentaActual=$idcuentaActual;

		$bitPaginaPopupcuenta_corriente=false;

		try {

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));

			if($cuenta_corriente_session==null) {
				$cuenta_corriente_session=new cuenta_corriente_session();
			}

			$cuenta_corriente_session->strUltimaBusqueda='FK_Idcuenta';
			$cuenta_corriente_session->strPathNavegacionActual=$cuenta_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
			$cuenta_corriente_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcuenta_corriente=$cuenta_corriente_session->bitPaginaPopup;
			$cuenta_corriente_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcuenta_corriente=$cuenta_corriente_session->bitPaginaPopup;
			$cuenta_corriente_session->bitPermiteNavegacionHaciaFKDesde=false;
			$cuenta_corriente_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_util::$STR_NOMBRE_OPCION;
			$cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta=true;
			$cuenta_corriente_session->bigidcuentaActual=$this->idcuentaActual;

			$cuenta_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_session->bigIdActualFK=$this->idcuentaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"cuenta_corriente"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"cuenta_corriente"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
			$this->Session->write(cuenta_corriente_util::$STR_SESSION_NAME,serialize($cuenta_corriente_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcuenta_corriente!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_corriente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_corriente_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_corriente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_corriente_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesion_ventaParaproductos(int $idcuentaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuentaActual=$idcuentaActual;

		$bitPaginaPopupproducto=false;

		try {

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

			if($producto_session==null) {
				$producto_session=new producto_session();
			}

			$producto_session->strUltimaBusqueda='FK_Idcuenta';
			$producto_session->strPathNavegacionActual=$cuenta_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.producto_util::$STR_CLASS_WEB_TITULO;
			$producto_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupproducto=$producto_session->bitPaginaPopup;
			$producto_session->setPaginaPopupVariables(true);
			$bitPaginaPopupproducto=$producto_session->bitPaginaPopup;
			$producto_session->bitPermiteNavegacionHaciaFKDesde=false;
			$producto_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_util::$STR_NOMBRE_OPCION;
			$producto_session->bitBusquedaDesdeFKSesioncuenta_venta=true;
			$producto_session->bigidcuenta_ventaActual=$this->idcuentaActual;

			$cuenta_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_session->bigIdActualFK=$this->idcuentaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"producto"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"producto"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
			$this->Session->write(producto_util::$STR_SESSION_NAME,serialize($producto_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupproducto!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesion_ventasParainstrumento_pagos(int $idcuentaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuentaActual=$idcuentaActual;

		$bitPaginaPopupinstrumento_pago=false;

		try {

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$instrumento_pago_session=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME));

			if($instrumento_pago_session==null) {
				$instrumento_pago_session=new instrumento_pago_session();
			}

			$instrumento_pago_session->strUltimaBusqueda='FK_Idcuenta';
			$instrumento_pago_session->strPathNavegacionActual=$cuenta_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.instrumento_pago_util::$STR_CLASS_WEB_TITULO;
			$instrumento_pago_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupinstrumento_pago=$instrumento_pago_session->bitPaginaPopup;
			$instrumento_pago_session->setPaginaPopupVariables(true);
			$bitPaginaPopupinstrumento_pago=$instrumento_pago_session->bitPaginaPopup;
			$instrumento_pago_session->bitPermiteNavegacionHaciaFKDesde=false;
			$instrumento_pago_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_util::$STR_NOMBRE_OPCION;
			$instrumento_pago_session->bitBusquedaDesdeFKSesioncuenta_ventas=true;
			$instrumento_pago_session->bigidcuenta_ventasActual=$this->idcuentaActual;

			$cuenta_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_session->bigIdActualFK=$this->idcuentaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"instrumento_pago"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"instrumento_pago"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
			$this->Session->write(instrumento_pago_util::$STR_SESSION_NAME,serialize($instrumento_pago_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupinstrumento_pago!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',instrumento_pago_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(instrumento_pago_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',instrumento_pago_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(instrumento_pago_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesion_ventaParalista_productoes(int $idcuentaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuentaActual=$idcuentaActual;

		$bitPaginaPopuplista_producto=false;

		try {

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

			if($lista_producto_session==null) {
				$lista_producto_session=new lista_producto_session();
			}

			$lista_producto_session->strUltimaBusqueda='FK_Idcuenta';
			$lista_producto_session->strPathNavegacionActual=$cuenta_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.lista_producto_util::$STR_CLASS_WEB_TITULO;
			$lista_producto_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopuplista_producto=$lista_producto_session->bitPaginaPopup;
			$lista_producto_session->setPaginaPopupVariables(true);
			$bitPaginaPopuplista_producto=$lista_producto_session->bitPaginaPopup;
			$lista_producto_session->bitPermiteNavegacionHaciaFKDesde=false;
			$lista_producto_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_util::$STR_NOMBRE_OPCION;
			$lista_producto_session->bitBusquedaDesdeFKSesioncuenta_venta=true;
			$lista_producto_session->bigidcuenta_ventaActual=$this->idcuentaActual;

			$cuenta_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_session->bigIdActualFK=$this->idcuentaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"lista_producto"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"lista_producto"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
			$this->Session->write(lista_producto_util::$STR_SESSION_NAME,serialize($lista_producto_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopuplista_producto!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',lista_producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(lista_producto_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',lista_producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(lista_producto_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaasiento_detallees(int $idcuentaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuentaActual=$idcuentaActual;

		$bitPaginaPopupasiento_detalle=false;

		try {

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$asiento_detalle_session=unserialize($this->Session->read(asiento_detalle_util::$STR_SESSION_NAME));

			if($asiento_detalle_session==null) {
				$asiento_detalle_session=new asiento_detalle_session();
			}

			$asiento_detalle_session->strUltimaBusqueda='FK_Idcuenta';
			$asiento_detalle_session->strPathNavegacionActual=$cuenta_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.asiento_detalle_util::$STR_CLASS_WEB_TITULO;
			$asiento_detalle_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupasiento_detalle=$asiento_detalle_session->bitPaginaPopup;
			$asiento_detalle_session->setPaginaPopupVariables(true);
			$bitPaginaPopupasiento_detalle=$asiento_detalle_session->bitPaginaPopup;
			$asiento_detalle_session->bitPermiteNavegacionHaciaFKDesde=false;
			$asiento_detalle_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_util::$STR_NOMBRE_OPCION;
			$asiento_detalle_session->bitBusquedaDesdeFKSesioncuenta=true;
			$asiento_detalle_session->bigidcuentaActual=$this->idcuentaActual;

			$cuenta_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_session->bigIdActualFK=$this->idcuentaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"asiento_detalle"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"asiento_detalle"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
			$this->Session->write(asiento_detalle_util::$STR_SESSION_NAME,serialize($asiento_detalle_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupasiento_detalle!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',asiento_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_detalle_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',asiento_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_detalle_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesion_comprasPararetenciones(int $idcuentaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuentaActual=$idcuentaActual;

		$bitPaginaPopupretencion=false;

		try {

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$retencion_session=unserialize($this->Session->read(retencion_util::$STR_SESSION_NAME));

			if($retencion_session==null) {
				$retencion_session=new retencion_session();
			}

			$retencion_session->strUltimaBusqueda='FK_Idcuenta';
			$retencion_session->strPathNavegacionActual=$cuenta_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.retencion_util::$STR_CLASS_WEB_TITULO;
			$retencion_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupretencion=$retencion_session->bitPaginaPopup;
			$retencion_session->setPaginaPopupVariables(true);
			$bitPaginaPopupretencion=$retencion_session->bitPaginaPopup;
			$retencion_session->bitPermiteNavegacionHaciaFKDesde=false;
			$retencion_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_util::$STR_NOMBRE_OPCION;
			$retencion_session->bitBusquedaDesdeFKSesioncuenta_compras=true;
			$retencion_session->bigidcuenta_comprasActual=$this->idcuentaActual;

			$cuenta_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_session->bigIdActualFK=$this->idcuentaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"retencion"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"retencion"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
			$this->Session->write(retencion_util::$STR_SESSION_NAME,serialize($retencion_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupretencion!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',retencion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(retencion_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',retencion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(retencion_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesion_comprasPararetencion_fuentees(int $idcuentaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuentaActual=$idcuentaActual;

		$bitPaginaPopupretencion_fuente=false;

		try {

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$retencion_fuente_session=unserialize($this->Session->read(retencion_fuente_util::$STR_SESSION_NAME));

			if($retencion_fuente_session==null) {
				$retencion_fuente_session=new retencion_fuente_session();
			}

			$retencion_fuente_session->strUltimaBusqueda='FK_Idcuenta';
			$retencion_fuente_session->strPathNavegacionActual=$cuenta_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.retencion_fuente_util::$STR_CLASS_WEB_TITULO;
			$retencion_fuente_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupretencion_fuente=$retencion_fuente_session->bitPaginaPopup;
			$retencion_fuente_session->setPaginaPopupVariables(true);
			$bitPaginaPopupretencion_fuente=$retencion_fuente_session->bitPaginaPopup;
			$retencion_fuente_session->bitPermiteNavegacionHaciaFKDesde=false;
			$retencion_fuente_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_util::$STR_NOMBRE_OPCION;
			$retencion_fuente_session->bitBusquedaDesdeFKSesioncuenta_compras=true;
			$retencion_fuente_session->bigidcuenta_comprasActual=$this->idcuentaActual;

			$cuenta_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_session->bigIdActualFK=$this->idcuentaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"retencion_fuente"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"retencion_fuente"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
			$this->Session->write(retencion_fuente_util::$STR_SESSION_NAME,serialize($retencion_fuente_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupretencion_fuente!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',retencion_fuente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(retencion_fuente_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',retencion_fuente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(retencion_fuente_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParacuentaes(int $idcuentaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuentaActual=$idcuentaActual;

		$bitPaginaPopupcuenta=false;

		try {

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$cuenta_session->strUltimaBusqueda='FK_Idcuenta';
			$cuenta_session->strPathNavegacionActual=$cuenta_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.cuenta_util::$STR_CLASS_WEB_TITULO;
			$cuenta_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcuenta=$cuenta_session->bitPaginaPopup;
			$cuenta_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcuenta=$cuenta_session->bitPaginaPopup;
			$cuenta_session->bitPermiteNavegacionHaciaFKDesde=false;
			$cuenta_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_util::$STR_NOMBRE_OPCION;
			$cuenta_session->bitBusquedaDesdeFKSesioncuenta=true;
			$cuenta_session->bigidcuentaActual=$this->idcuentaActual;

			$cuenta_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_session->bigIdActualFK=$this->idcuentaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"cuenta"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"cuenta"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcuenta!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaproveedores(int $idcuentaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuentaActual=$idcuentaActual;

		$bitPaginaPopupproveedor=false;

		try {

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

			if($proveedor_session==null) {
				$proveedor_session=new proveedor_session();
			}

			$proveedor_session->strUltimaBusqueda='FK_Idcuenta';
			$proveedor_session->strPathNavegacionActual=$cuenta_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.proveedor_util::$STR_CLASS_WEB_TITULO;
			$proveedor_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupproveedor=$proveedor_session->bitPaginaPopup;
			$proveedor_session->setPaginaPopupVariables(true);
			$bitPaginaPopupproveedor=$proveedor_session->bitPaginaPopup;
			$proveedor_session->bitPermiteNavegacionHaciaFKDesde=false;
			$proveedor_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_util::$STR_NOMBRE_OPCION;
			$proveedor_session->bitBusquedaDesdeFKSesioncuenta=true;
			$proveedor_session->bigidcuentaActual=$this->idcuentaActual;

			$cuenta_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_session->bigIdActualFK=$this->idcuentaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"proveedor"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"proveedor"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
			$this->Session->write(proveedor_util::$STR_SESSION_NAME,serialize($proveedor_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupproveedor!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(proveedor_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(proveedor_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaforma_pago_clientes(int $idcuentaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuentaActual=$idcuentaActual;

		$bitPaginaPopupforma_pago_cliente=false;

		try {

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$forma_pago_cliente_session=unserialize($this->Session->read(forma_pago_cliente_util::$STR_SESSION_NAME));

			if($forma_pago_cliente_session==null) {
				$forma_pago_cliente_session=new forma_pago_cliente_session();
			}

			$forma_pago_cliente_session->strUltimaBusqueda='FK_Idcuenta';
			$forma_pago_cliente_session->strPathNavegacionActual=$cuenta_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.forma_pago_cliente_util::$STR_CLASS_WEB_TITULO;
			$forma_pago_cliente_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupforma_pago_cliente=$forma_pago_cliente_session->bitPaginaPopup;
			$forma_pago_cliente_session->setPaginaPopupVariables(true);
			$bitPaginaPopupforma_pago_cliente=$forma_pago_cliente_session->bitPaginaPopup;
			$forma_pago_cliente_session->bitPermiteNavegacionHaciaFKDesde=false;
			$forma_pago_cliente_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_util::$STR_NOMBRE_OPCION;
			$forma_pago_cliente_session->bitBusquedaDesdeFKSesioncuenta=true;
			$forma_pago_cliente_session->bigidcuentaActual=$this->idcuentaActual;

			$cuenta_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_session->bigIdActualFK=$this->idcuentaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"forma_pago_cliente"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"forma_pago_cliente"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
			$this->Session->write(forma_pago_cliente_util::$STR_SESSION_NAME,serialize($forma_pago_cliente_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupforma_pago_cliente!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',forma_pago_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(forma_pago_cliente_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',forma_pago_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(forma_pago_cliente_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParasaldo_cuentas(int $idcuentaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuentaActual=$idcuentaActual;

		$bitPaginaPopupsaldo_cuenta=false;

		try {

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));

			if($saldo_cuenta_session==null) {
				$saldo_cuenta_session=new saldo_cuenta_session();
			}

			$saldo_cuenta_session->strUltimaBusqueda='FK_Idcuenta';
			$saldo_cuenta_session->strPathNavegacionActual=$cuenta_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.saldo_cuenta_util::$STR_CLASS_WEB_TITULO;
			$saldo_cuenta_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupsaldo_cuenta=$saldo_cuenta_session->bitPaginaPopup;
			$saldo_cuenta_session->setPaginaPopupVariables(true);
			$bitPaginaPopupsaldo_cuenta=$saldo_cuenta_session->bitPaginaPopup;
			$saldo_cuenta_session->bitPermiteNavegacionHaciaFKDesde=false;
			$saldo_cuenta_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_util::$STR_NOMBRE_OPCION;
			$saldo_cuenta_session->bitBusquedaDesdeFKSesioncuenta=true;
			$saldo_cuenta_session->bigidcuentaActual=$this->idcuentaActual;

			$cuenta_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_session->bigIdActualFK=$this->idcuentaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"saldo_cuenta"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"saldo_cuenta"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
			$this->Session->write(saldo_cuenta_util::$STR_SESSION_NAME,serialize($saldo_cuenta_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupsaldo_cuenta!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',saldo_cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(saldo_cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',saldo_cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(saldo_cuenta_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParatermino_pago_proveedores(int $idcuentaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuentaActual=$idcuentaActual;

		$bitPaginaPopuptermino_pago_proveedor=false;

		try {

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));

			if($termino_pago_proveedor_session==null) {
				$termino_pago_proveedor_session=new termino_pago_proveedor_session();
			}

			$termino_pago_proveedor_session->strUltimaBusqueda='FK_Idcuenta';
			$termino_pago_proveedor_session->strPathNavegacionActual=$cuenta_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.termino_pago_proveedor_util::$STR_CLASS_WEB_TITULO;
			$termino_pago_proveedor_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopuptermino_pago_proveedor=$termino_pago_proveedor_session->bitPaginaPopup;
			$termino_pago_proveedor_session->setPaginaPopupVariables(true);
			$bitPaginaPopuptermino_pago_proveedor=$termino_pago_proveedor_session->bitPaginaPopup;
			$termino_pago_proveedor_session->bitPermiteNavegacionHaciaFKDesde=false;
			$termino_pago_proveedor_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_util::$STR_NOMBRE_OPCION;
			$termino_pago_proveedor_session->bitBusquedaDesdeFKSesioncuenta=true;
			$termino_pago_proveedor_session->bigidcuentaActual=$this->idcuentaActual;

			$cuenta_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_session->bigIdActualFK=$this->idcuentaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"termino_pago_proveedor"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"termino_pago_proveedor"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
			$this->Session->write(termino_pago_proveedor_util::$STR_SESSION_NAME,serialize($termino_pago_proveedor_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopuptermino_pago_proveedor!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',termino_pago_proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(termino_pago_proveedor_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',termino_pago_proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(termino_pago_proveedor_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesion_ventasPararetencion_icas(int $idcuentaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuentaActual=$idcuentaActual;

		$bitPaginaPopupretencion_ica=false;

		try {

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$retencion_ica_session=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME));

			if($retencion_ica_session==null) {
				$retencion_ica_session=new retencion_ica_session();
			}

			$retencion_ica_session->strUltimaBusqueda='FK_Idcuenta';
			$retencion_ica_session->strPathNavegacionActual=$cuenta_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.retencion_ica_util::$STR_CLASS_WEB_TITULO;
			$retencion_ica_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupretencion_ica=$retencion_ica_session->bitPaginaPopup;
			$retencion_ica_session->setPaginaPopupVariables(true);
			$bitPaginaPopupretencion_ica=$retencion_ica_session->bitPaginaPopup;
			$retencion_ica_session->bitPermiteNavegacionHaciaFKDesde=false;
			$retencion_ica_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_util::$STR_NOMBRE_OPCION;
			$retencion_ica_session->bitBusquedaDesdeFKSesioncuenta_ventas=true;
			$retencion_ica_session->bigidcuenta_ventasActual=$this->idcuentaActual;

			$cuenta_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_session->bigIdActualFK=$this->idcuentaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"retencion_ica"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"retencion_ica"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
			$this->Session->write(retencion_ica_util::$STR_SESSION_NAME,serialize($retencion_ica_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupretencion_ica!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',retencion_ica_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(retencion_ica_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',retencion_ica_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(retencion_ica_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaasiento_predefinido_detalles(int $idcuentaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuentaActual=$idcuentaActual;

		$bitPaginaPopupasiento_predefinido_detalle=false;

		try {

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$asiento_predefinido_detalle_session=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME));

			if($asiento_predefinido_detalle_session==null) {
				$asiento_predefinido_detalle_session=new asiento_predefinido_detalle_session();
			}

			$asiento_predefinido_detalle_session->strUltimaBusqueda='FK_Idcuenta';
			$asiento_predefinido_detalle_session->strPathNavegacionActual=$cuenta_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.asiento_predefinido_detalle_util::$STR_CLASS_WEB_TITULO;
			$asiento_predefinido_detalle_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupasiento_predefinido_detalle=$asiento_predefinido_detalle_session->bitPaginaPopup;
			$asiento_predefinido_detalle_session->setPaginaPopupVariables(true);
			$bitPaginaPopupasiento_predefinido_detalle=$asiento_predefinido_detalle_session->bitPaginaPopup;
			$asiento_predefinido_detalle_session->bitPermiteNavegacionHaciaFKDesde=false;
			$asiento_predefinido_detalle_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_util::$STR_NOMBRE_OPCION;
			$asiento_predefinido_detalle_session->bitBusquedaDesdeFKSesioncuenta=true;
			$asiento_predefinido_detalle_session->bigidcuentaActual=$this->idcuentaActual;

			$cuenta_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_session->bigIdActualFK=$this->idcuentaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"asiento_predefinido_detalle"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"asiento_predefinido_detalle"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
			$this->Session->write(asiento_predefinido_detalle_util::$STR_SESSION_NAME,serialize($asiento_predefinido_detalle_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupasiento_predefinido_detalle!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',asiento_predefinido_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_predefinido_detalle_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',asiento_predefinido_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_predefinido_detalle_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaclientes(int $idcuentaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuentaActual=$idcuentaActual;

		$bitPaginaPopupcliente=false;

		try {

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

			if($cliente_session==null) {
				$cliente_session=new cliente_session();
			}

			$cliente_session->strUltimaBusqueda='FK_Idcuenta';
			$cliente_session->strPathNavegacionActual=$cuenta_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.cliente_util::$STR_CLASS_WEB_TITULO;
			$cliente_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcliente=$cliente_session->bitPaginaPopup;
			$cliente_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcliente=$cliente_session->bitPaginaPopup;
			$cliente_session->bitPermiteNavegacionHaciaFKDesde=false;
			$cliente_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_util::$STR_NOMBRE_OPCION;
			$cliente_session->bitBusquedaDesdeFKSesioncuenta=true;
			$cliente_session->bigidcuentaActual=$this->idcuentaActual;

			$cuenta_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_session->bigIdActualFK=$this->idcuentaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"cliente"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"cliente"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
			$this->Session->write(cliente_util::$STR_SESSION_NAME,serialize($cliente_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcliente!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cliente_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cliente_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaasiento_automatico_detalles(int $idcuentaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuentaActual=$idcuentaActual;

		$bitPaginaPopupasiento_automatico_detalle=false;

		try {

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$asiento_automatico_detalle_session=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME));

			if($asiento_automatico_detalle_session==null) {
				$asiento_automatico_detalle_session=new asiento_automatico_detalle_session();
			}

			$asiento_automatico_detalle_session->strUltimaBusqueda='FK_Idcuenta';
			$asiento_automatico_detalle_session->strPathNavegacionActual=$cuenta_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.asiento_automatico_detalle_util::$STR_CLASS_WEB_TITULO;
			$asiento_automatico_detalle_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupasiento_automatico_detalle=$asiento_automatico_detalle_session->bitPaginaPopup;
			$asiento_automatico_detalle_session->setPaginaPopupVariables(true);
			$bitPaginaPopupasiento_automatico_detalle=$asiento_automatico_detalle_session->bitPaginaPopup;
			$asiento_automatico_detalle_session->bitPermiteNavegacionHaciaFKDesde=false;
			$asiento_automatico_detalle_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_util::$STR_NOMBRE_OPCION;
			$asiento_automatico_detalle_session->bitBusquedaDesdeFKSesioncuenta=true;
			$asiento_automatico_detalle_session->bigidcuentaActual=$this->idcuentaActual;

			$cuenta_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_session->bigIdActualFK=$this->idcuentaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"asiento_automatico_detalle"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"asiento_automatico_detalle"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
			$this->Session->write(asiento_automatico_detalle_util::$STR_SESSION_NAME,serialize($asiento_automatico_detalle_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupasiento_automatico_detalle!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',asiento_automatico_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_automatico_detalle_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',asiento_automatico_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_automatico_detalle_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaforma_pago_proveedores(int $idcuentaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuentaActual=$idcuentaActual;

		$bitPaginaPopupforma_pago_proveedor=false;

		try {

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));

			if($forma_pago_proveedor_session==null) {
				$forma_pago_proveedor_session=new forma_pago_proveedor_session();
			}

			$forma_pago_proveedor_session->strUltimaBusqueda='FK_Idcuenta';
			$forma_pago_proveedor_session->strPathNavegacionActual=$cuenta_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.forma_pago_proveedor_util::$STR_CLASS_WEB_TITULO;
			$forma_pago_proveedor_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupforma_pago_proveedor=$forma_pago_proveedor_session->bitPaginaPopup;
			$forma_pago_proveedor_session->setPaginaPopupVariables(true);
			$bitPaginaPopupforma_pago_proveedor=$forma_pago_proveedor_session->bitPaginaPopup;
			$forma_pago_proveedor_session->bitPermiteNavegacionHaciaFKDesde=false;
			$forma_pago_proveedor_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_util::$STR_NOMBRE_OPCION;
			$forma_pago_proveedor_session->bitBusquedaDesdeFKSesioncuenta=true;
			$forma_pago_proveedor_session->bigidcuentaActual=$this->idcuentaActual;

			$cuenta_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_session->bigIdActualFK=$this->idcuentaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"forma_pago_proveedor"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"forma_pago_proveedor"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
			$this->Session->write(forma_pago_proveedor_util::$STR_SESSION_NAME,serialize($forma_pago_proveedor_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupforma_pago_proveedor!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',forma_pago_proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(forma_pago_proveedor_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',forma_pago_proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(forma_pago_proveedor_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParatermino_pago_clientes(int $idcuentaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuentaActual=$idcuentaActual;

		$bitPaginaPopuptermino_pago_cliente=false;

		try {

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}

			$termino_pago_cliente_session=unserialize($this->Session->read(termino_pago_cliente_util::$STR_SESSION_NAME));

			if($termino_pago_cliente_session==null) {
				$termino_pago_cliente_session=new termino_pago_cliente_session();
			}

			$termino_pago_cliente_session->strUltimaBusqueda='FK_Idcuenta';
			$termino_pago_cliente_session->strPathNavegacionActual=$cuenta_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.termino_pago_cliente_util::$STR_CLASS_WEB_TITULO;
			$termino_pago_cliente_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopuptermino_pago_cliente=$termino_pago_cliente_session->bitPaginaPopup;
			$termino_pago_cliente_session->setPaginaPopupVariables(true);
			$bitPaginaPopuptermino_pago_cliente=$termino_pago_cliente_session->bitPaginaPopup;
			$termino_pago_cliente_session->bitPermiteNavegacionHaciaFKDesde=false;
			$termino_pago_cliente_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_util::$STR_NOMBRE_OPCION;
			$termino_pago_cliente_session->bitBusquedaDesdeFKSesioncuenta=true;
			$termino_pago_cliente_session->bigidcuentaActual=$this->idcuentaActual;

			$cuenta_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_session->bigIdActualFK=$this->idcuentaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"termino_pago_cliente"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"termino_pago_cliente"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));
			$this->Session->write(termino_pago_cliente_util::$STR_SESSION_NAME,serialize($termino_pago_cliente_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopuptermino_pago_cliente!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',termino_pago_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(termino_pago_cliente_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',termino_pago_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(termino_pago_cliente_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta,$this->strTipoUsuarioAuxiliarcuenta,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(cuenta_util::$STR_SESSION_NAME,cuenta_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$cuenta_session=$this->Session->read(cuenta_util::$STR_SESSION_NAME);
				
		if($cuenta_session==null) {
			$cuenta_session=new cuenta_session();		
			//$this->Session->write('cuenta_session',$cuenta_session);							
		}
		*/
		
		$cuenta_session=new cuenta_session();
    	$cuenta_session->strPathNavegacionActual=cuenta_util::$STR_CLASS_WEB_TITULO;
    	$cuenta_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));		
	}	
	
	public function getSetBusquedasSesionConfig(cuenta_session $cuenta_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($cuenta_session->bitBusquedaDesdeFKSesionFK!=null && $cuenta_session->bitBusquedaDesdeFKSesionFK==true) {
			if($cuenta_session->bigIdActualFK!=null && $cuenta_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$cuenta_session->bigIdActualFKParaPosibleAtras=$cuenta_session->bigIdActualFK;*/
			}
				
			$cuenta_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$cuenta_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(cuenta_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($cuenta_session->bitBusquedaDesdeFKSesionempresa!=null && $cuenta_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($cuenta_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($cuenta_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_util::$INT_NUMERO_PAGINACION;

				if($cuenta_session->intNumeroPaginacion==cuenta_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_session->bitBusquedaDesdeFKSesiontipo_cuenta!=null && $cuenta_session->bitBusquedaDesdeFKSesiontipo_cuenta==true)
			{
				if($cuenta_session->bigidtipo_cuentaActual!=0) {
					$this->strAccionBusqueda='FK_Idtipo_cuenta';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_session->bigidtipo_cuentaActualDescripcion);
						$historyWeb->setIdActual($cuenta_session->bigidtipo_cuentaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_session->bigidtipo_cuentaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_session->bitBusquedaDesdeFKSesiontipo_cuenta=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_util::$INT_NUMERO_PAGINACION;

				if($cuenta_session->intNumeroPaginacion==cuenta_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_session->bitBusquedaDesdeFKSesiontipo_nivel_cuenta!=null && $cuenta_session->bitBusquedaDesdeFKSesiontipo_nivel_cuenta==true)
			{
				if($cuenta_session->bigidtipo_nivel_cuentaActual!=0) {
					$this->strAccionBusqueda='FK_Idtipo_nivel_cuenta';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_session->bigidtipo_nivel_cuentaActualDescripcion);
						$historyWeb->setIdActual($cuenta_session->bigidtipo_nivel_cuentaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_session->bigidtipo_nivel_cuentaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_session->bitBusquedaDesdeFKSesiontipo_nivel_cuenta=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_util::$INT_NUMERO_PAGINACION;

				if($cuenta_session->intNumeroPaginacion==cuenta_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_session->bitBusquedaDesdeFKSesioncuenta!=null && $cuenta_session->bitBusquedaDesdeFKSesioncuenta==true)
			{
				if($cuenta_session->bigidcuentaActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_session->bigidcuentaActualDescripcion);
						$historyWeb->setIdActual($cuenta_session->bigidcuentaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_session->bigidcuentaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_session->bitBusquedaDesdeFKSesioncuenta=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_util::$INT_NUMERO_PAGINACION;

				if($cuenta_session->intNumeroPaginacion==cuenta_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$cuenta_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));
		
		if($cuenta_session==null) {
			$cuenta_session=new cuenta_session();
		}
		
		$cuenta_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$cuenta_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cuenta_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idcuenta') {
			$cuenta_session->id_cuenta=$this->id_cuentaFK_Idcuenta;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$cuenta_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idtipo_cuenta') {
			$cuenta_session->id_tipo_cuenta=$this->id_tipo_cuentaFK_Idtipo_cuenta;	

		}
		else if($this->strAccionBusqueda=='FK_Idtipo_nivel_cuenta') {
			$cuenta_session->id_tipo_nivel_cuenta=$this->id_tipo_nivel_cuentaFK_Idtipo_nivel_cuenta;	

		}
		
		$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(cuenta_session $cuenta_session) {
		
		if($cuenta_session==null) {
			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));
		}
		
		if($cuenta_session==null) {
		   $cuenta_session=new cuenta_session();
		}
		
		if($cuenta_session->strUltimaBusqueda!=null && $cuenta_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$cuenta_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$cuenta_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$cuenta_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idcuenta') {
				$this->id_cuentaFK_Idcuenta=$cuenta_session->id_cuenta;
				$cuenta_session->id_cuenta=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$cuenta_session->id_empresa;
				$cuenta_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtipo_cuenta') {
				$this->id_tipo_cuentaFK_Idtipo_cuenta=$cuenta_session->id_tipo_cuenta;
				$cuenta_session->id_tipo_cuenta=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtipo_nivel_cuenta') {
				$this->id_tipo_nivel_cuentaFK_Idtipo_nivel_cuenta=$cuenta_session->id_tipo_nivel_cuenta;
				$cuenta_session->id_tipo_nivel_cuenta=-1;

			}
		}
		
		$cuenta_session->strUltimaBusqueda='';
		//$cuenta_session->intNumeroPaginacion=10;
		$cuenta_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(cuenta_util::$STR_SESSION_NAME,serialize($cuenta_session));		
	}
	
	public function cuentasControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idtipo_cuentaDefaultFK = 0;
		$this->idtipo_nivel_cuentaDefaultFK = 0;
		$this->idcuentaDefaultFK = 0;
	}
	
	public function setcuentaFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_tipo_cuenta',$this->idtipo_cuentaDefaultFK);
		$this->setExistDataCampoForm('form','id_tipo_nivel_cuenta',$this->idtipo_nivel_cuentaDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta',$this->idcuentaDefaultFK);
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

		tipo_cuenta::$class;
		tipo_cuenta_carga::$CONTROLLER;

		tipo_nivel_cuenta::$class;
		tipo_nivel_cuenta_carga::$CONTROLLER;
		
		//REL
		

		categoria_cheque_carga::$CONTROLLER;
		categoria_cheque_util::$STR_SCHEMA;
		categoria_cheque_session::class;

		otro_impuesto_carga::$CONTROLLER;
		otro_impuesto_util::$STR_SCHEMA;
		otro_impuesto_session::class;

		impuesto_carga::$CONTROLLER;
		impuesto_util::$STR_SCHEMA;
		impuesto_session::class;

		cuenta_corriente_carga::$CONTROLLER;
		cuenta_corriente_util::$STR_SCHEMA;
		cuenta_corriente_session::class;

		producto_carga::$CONTROLLER;
		producto_util::$STR_SCHEMA;
		producto_session::class;

		instrumento_pago_carga::$CONTROLLER;
		instrumento_pago_util::$STR_SCHEMA;
		instrumento_pago_session::class;

		lista_producto_carga::$CONTROLLER;
		lista_producto_util::$STR_SCHEMA;
		lista_producto_session::class;

		asiento_detalle_carga::$CONTROLLER;
		asiento_detalle_util::$STR_SCHEMA;
		asiento_detalle_session::class;

		retencion_carga::$CONTROLLER;
		retencion_util::$STR_SCHEMA;
		retencion_session::class;

		retencion_fuente_carga::$CONTROLLER;
		retencion_fuente_util::$STR_SCHEMA;
		retencion_fuente_session::class;

		proveedor_carga::$CONTROLLER;
		proveedor_util::$STR_SCHEMA;
		proveedor_session::class;

		forma_pago_cliente_carga::$CONTROLLER;
		forma_pago_cliente_util::$STR_SCHEMA;
		forma_pago_cliente_session::class;

		saldo_cuenta_carga::$CONTROLLER;
		saldo_cuenta_util::$STR_SCHEMA;
		saldo_cuenta_session::class;

		termino_pago_proveedor_carga::$CONTROLLER;
		termino_pago_proveedor_util::$STR_SCHEMA;
		termino_pago_proveedor_session::class;

		retencion_ica_carga::$CONTROLLER;
		retencion_ica_util::$STR_SCHEMA;
		retencion_ica_session::class;

		asiento_predefinido_detalle_carga::$CONTROLLER;
		asiento_predefinido_detalle_util::$STR_SCHEMA;
		asiento_predefinido_detalle_session::class;

		cliente_carga::$CONTROLLER;
		cliente_util::$STR_SCHEMA;
		cliente_session::class;

		asiento_automatico_detalle_carga::$CONTROLLER;
		asiento_automatico_detalle_util::$STR_SCHEMA;
		asiento_automatico_detalle_session::class;

		forma_pago_proveedor_carga::$CONTROLLER;
		forma_pago_proveedor_util::$STR_SCHEMA;
		forma_pago_proveedor_session::class;

		termino_pago_cliente_carga::$CONTROLLER;
		termino_pago_cliente_util::$STR_SCHEMA;
		termino_pago_cliente_session::class;
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
		interface cuenta_controlI {	
		
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
		
		public function onLoad(cuenta_session $cuenta_session=null);	
		function index(?string $strTypeOnLoadcuenta='',?string $strTipoPaginaAuxiliarcuenta='',?string $strTipoUsuarioAuxiliarcuenta='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadcuenta='',string $strTipoPaginaAuxiliarcuenta='',string $strTipoUsuarioAuxiliarcuenta='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($cuentaReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(cuenta $cuentaClase);
		
		public function abrirArbol();	
		public function cargarArbol();
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(cuenta_session $cuenta_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(cuenta_session $cuenta_session);	
		public function cuentasControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setcuentaFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
