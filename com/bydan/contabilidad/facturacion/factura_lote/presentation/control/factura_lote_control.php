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

namespace com\bydan\contabilidad\facturacion\factura_lote\presentation\control;

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

use com\bydan\contabilidad\facturacion\factura_lote\business\entity\factura_lote;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/factura_lote/util/factura_lote_carga.php');
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_carga;

use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_param_return;
use com\bydan\contabilidad\facturacion\factura_lote\business\logic\factura_lote_logic;
use com\bydan\contabilidad\facturacion\factura_lote\presentation\session\factura_lote_session;


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

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\business\logic\vendedor_logic;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_carga;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;
use com\bydan\contabilidad\contabilidad\moneda\business\logic\moneda_logic;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_carga;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_util;

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\entity\documento_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\logic\documento_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_util;

use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;
use com\bydan\contabilidad\inventario\kardex\business\logic\kardex_logic;
use com\bydan\contabilidad\inventario\kardex\util\kardex_carga;
use com\bydan\contabilidad\inventario\kardex\util\kardex_util;

//REL


use com\bydan\contabilidad\facturacion\factura_lote_detalle\util\factura_lote_detalle_carga;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\util\factura_lote_detalle_util;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\presentation\session\factura_lote_detalle_session;

use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_carga;
use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_util;
use com\bydan\contabilidad\facturacion\factura_modelo\presentation\session\factura_modelo_session;


/*CARGA ARCHIVOS FRAMEWORK*/
factura_lote_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
factura_lote_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
factura_lote_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
factura_lote_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*factura_lote_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/facturacion/factura_lote/presentation/control/factura_lote_init_control.php');
use com\bydan\contabilidad\facturacion\factura_lote\presentation\control\factura_lote_init_control;

include_once('com/bydan/contabilidad/facturacion/factura_lote/presentation/control/factura_lote_base_control.php');
use com\bydan\contabilidad\facturacion\factura_lote\presentation\control\factura_lote_base_control;

class factura_lote_control extends factura_lote_base_control {	
	
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
					
					
				if($this->data['impuesto_en_precio']==null) {$this->data['impuesto_en_precio']=false;} else {if($this->data['impuesto_en_precio']=='on') {$this->data['impuesto_en_precio']=true;}}
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
			else if($action=='registrarSesionParafactura_lote_detalles' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idfactura_loteActual=$this->getDataId();
				$this->registrarSesionParafactura_lote_detalles($idfactura_loteActual);
			}
			else if($action=='registrarSesionParafactura_modeloes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idfactura_loteActual=$this->getDataId();
				$this->registrarSesionParafactura_modeloes($idfactura_loteActual);
			} 
			
			
			else if($action=="FK_Idasiento"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdasientoParaProcesar();
			}
			else if($action=="FK_Idcliente"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdclienteParaProcesar();
			}
			else if($action=="FK_Iddocumento_cuenta_cobrar"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Iddocumento_cuenta_cobrarParaProcesar();
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
			else if($action=="FK_Idkardex"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdkardexParaProcesar();
			}
			else if($action=="FK_Idmoneda"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdmonedaParaProcesar();
			}
			else if($action=="FK_Idperiodo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdperiodoParaProcesar();
			}
			else if($action=="FK_Idsucursal"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdsucursalParaProcesar();
			}
			else if($action=="FK_Idtermino_pago"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtermino_pagoParaProcesar();
			}
			else if($action=="FK_Idusuario"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdusuarioParaProcesar();
			}
			else if($action=="FK_Idvendedor"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdvendedorParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idfactura_loteActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idfactura_loteActual
			}
			else if($action=='abrirBusquedaParasucursal') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idfactura_loteActual=$this->getDataId();
				$this->abrirBusquedaParasucursal();//$idfactura_loteActual
			}
			else if($action=='abrirBusquedaParaejercicio') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idfactura_loteActual=$this->getDataId();
				$this->abrirBusquedaParaejercicio();//$idfactura_loteActual
			}
			else if($action=='abrirBusquedaParaperiodo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idfactura_loteActual=$this->getDataId();
				$this->abrirBusquedaParaperiodo();//$idfactura_loteActual
			}
			else if($action=='abrirBusquedaParausuario') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idfactura_loteActual=$this->getDataId();
				$this->abrirBusquedaParausuario();//$idfactura_loteActual
			}
			else if($action=='abrirBusquedaParacliente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idfactura_loteActual=$this->getDataId();
				$this->abrirBusquedaParacliente();//$idfactura_loteActual
			}
			else if($action=='abrirBusquedaParavendedor') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idfactura_loteActual=$this->getDataId();
				$this->abrirBusquedaParavendedor();//$idfactura_loteActual
			}
			else if($action=='abrirBusquedaParatermino_pago') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idfactura_loteActual=$this->getDataId();
				$this->abrirBusquedaParatermino_pago();//$idfactura_loteActual
			}
			else if($action=='abrirBusquedaParamoneda') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idfactura_loteActual=$this->getDataId();
				$this->abrirBusquedaParamoneda();//$idfactura_loteActual
			}
			else if($action=='abrirBusquedaParaestado') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idfactura_loteActual=$this->getDataId();
				$this->abrirBusquedaParaestado();//$idfactura_loteActual
			}
			else if($action=='abrirBusquedaParaasiento') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idfactura_loteActual=$this->getDataId();
				$this->abrirBusquedaParaasiento();//$idfactura_loteActual
			}
			else if($action=='abrirBusquedaParadocumento_cuenta_cobrar') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idfactura_loteActual=$this->getDataId();
				$this->abrirBusquedaParadocumento_cuenta_cobrar();//$idfactura_loteActual
			}
			else if($action=='abrirBusquedaParakardex') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idfactura_loteActual=$this->getDataId();
				$this->abrirBusquedaParakardex();//$idfactura_loteActual
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
					
					$factura_loteController = new factura_lote_control();
					
					$factura_loteController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($factura_loteController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$factura_loteController = new factura_lote_control();
						$factura_loteController = $this;
						
						$jsonResponse = json_encode($factura_loteController->factura_lotes);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->factura_loteReturnGeneral==null) {
					$this->factura_loteReturnGeneral=new factura_lote_param_return();
				}
				
				echo($this->factura_loteReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$factura_loteController=new factura_lote_control();
		
		$factura_loteController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$factura_loteController->usuarioActual=new usuario();
		
		$factura_loteController->usuarioActual->setId($this->usuarioActual->getId());
		$factura_loteController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$factura_loteController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$factura_loteController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$factura_loteController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$factura_loteController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$factura_loteController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$factura_loteController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $factura_loteController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadfactura_lote= $this->getDataGeneralString('strTypeOnLoadfactura_lote');
		$strTipoPaginaAuxiliarfactura_lote= $this->getDataGeneralString('strTipoPaginaAuxiliarfactura_lote');
		$strTipoUsuarioAuxiliarfactura_lote= $this->getDataGeneralString('strTipoUsuarioAuxiliarfactura_lote');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadfactura_lote,$strTipoPaginaAuxiliarfactura_lote,$strTipoUsuarioAuxiliarfactura_lote,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadfactura_lote!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('factura_lote','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(factura_lote_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'facturacion','','POPUP',$this->strTipoPaginaAuxiliarfactura_lote,$this->strTipoUsuarioAuxiliarfactura_lote,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(factura_lote_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'facturacion','','POPUP',$this->strTipoPaginaAuxiliarfactura_lote,$this->strTipoUsuarioAuxiliarfactura_lote,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->factura_loteReturnGeneral=new factura_lote_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->factura_loteReturnGeneral->conGuardarReturnSessionJs=true;
		$this->factura_loteReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->factura_loteReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->factura_loteReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->factura_loteReturnGeneral);
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
		$this->factura_loteReturnGeneral=new factura_lote_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->factura_loteReturnGeneral->conGuardarReturnSessionJs=true;
		$this->factura_loteReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->factura_loteReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->factura_loteReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->factura_loteReturnGeneral);
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
		$this->factura_loteReturnGeneral=new factura_lote_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->factura_loteReturnGeneral->conGuardarReturnSessionJs=true;
		$this->factura_loteReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->factura_loteReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->factura_loteReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->factura_loteReturnGeneral);
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
				$this->factura_loteLogic->getNewConnexionToDeep();
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
			
			
			$this->factura_loteReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->factura_loteReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->factura_loteReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->factura_loteReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->factura_loteReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->factura_loteReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->factura_loteReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->factura_loteReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->factura_loteReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->factura_loteReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->factura_loteReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->factura_loteReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->factura_loteReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->factura_loteReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->factura_loteReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->factura_loteReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->factura_loteReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->factura_loteReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
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
		
		$this->factura_loteLogic=new factura_lote_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->factura_lote=new factura_lote();
		
		$this->strTypeOnLoadfactura_lote='onload';
		$this->strTipoPaginaAuxiliarfactura_lote='none';
		$this->strTipoUsuarioAuxiliarfactura_lote='none';	

		$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
		
		$this->factura_loteModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->factura_loteControllerAdditional=new factura_lote_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(factura_lote_session $factura_lote_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($factura_lote_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadfactura_lote='',?string $strTipoPaginaAuxiliarfactura_lote='',?string $strTipoUsuarioAuxiliarfactura_lote='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadfactura_lote=$strTypeOnLoadfactura_lote;
			$this->strTipoPaginaAuxiliarfactura_lote=$strTipoPaginaAuxiliarfactura_lote;
			$this->strTipoUsuarioAuxiliarfactura_lote=$strTipoUsuarioAuxiliarfactura_lote;
	
			if($strTipoUsuarioAuxiliarfactura_lote=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->factura_lote=new factura_lote();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Facturas Loteses';
			
			
			$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));
							
			if($factura_lote_session==null) {
				$factura_lote_session=new factura_lote_session();
				
				/*$this->Session->write('factura_lote_session',$factura_lote_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($factura_lote_session->strFuncionJsPadre!=null && $factura_lote_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$factura_lote_session->strFuncionJsPadre;
				
				$factura_lote_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($factura_lote_session);
			
			if($strTypeOnLoadfactura_lote!=null && $strTypeOnLoadfactura_lote=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$factura_lote_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$factura_lote_session->setPaginaPopupVariables(true);
				}
				
				if($factura_lote_session->intNumeroPaginacion==factura_lote_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$factura_lote_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,factura_lote_util::$STR_SESSION_NAME,'facturacion');																
			
			} else if($strTypeOnLoadfactura_lote!=null && $strTypeOnLoadfactura_lote=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$factura_lote_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;*/
				
				if($factura_lote_session->intNumeroPaginacion==factura_lote_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$factura_lote_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarfactura_lote!=null && $strTipoPaginaAuxiliarfactura_lote=='none') {
				/*$factura_lote_session->strStyleDivHeader='display:table-row';*/
				
				/*$factura_lote_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarfactura_lote!=null && $strTipoPaginaAuxiliarfactura_lote=='iframe') {
					/*
					$factura_lote_session->strStyleDivArbol='display:none';
					$factura_lote_session->strStyleDivHeader='display:none';
					$factura_lote_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$factura_lote_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->factura_loteClase=new factura_lote();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=factura_lote_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(factura_lote_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->factura_loteLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->factura_loteLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$facturalotedetalleLogic=new factura_lote_detalle_logic();
			//$facturamodeloLogic=new factura_modelo_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->factura_loteLogic=new factura_lote_logic();*/
			
			
			$this->factura_lotesModel=null;
			/*new ListDataModel();*/
			
			/*$this->factura_lotesModel.setWrappedData(factura_loteLogic->getfactura_lotes());*/
						
			$this->factura_lotes= array();
			$this->factura_lotesEliminados=array();
			$this->factura_lotesSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= factura_lote_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= factura_lote_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->factura_lote= new factura_lote();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idasiento='display:table-row';
			$this->strVisibleFK_Idcliente='display:table-row';
			$this->strVisibleFK_Iddocumento_cuenta_cobrar='display:table-row';
			$this->strVisibleFK_Idejercicio='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idestado='display:table-row';
			$this->strVisibleFK_Idkardex='display:table-row';
			$this->strVisibleFK_Idmoneda='display:table-row';
			$this->strVisibleFK_Idperiodo='display:table-row';
			$this->strVisibleFK_Idsucursal='display:table-row';
			$this->strVisibleFK_Idtermino_pago='display:table-row';
			$this->strVisibleFK_Idusuario='display:table-row';
			$this->strVisibleFK_Idvendedor='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarfactura_lote!=null && $strTipoUsuarioAuxiliarfactura_lote!='none' && $strTipoUsuarioAuxiliarfactura_lote!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarfactura_lote);
																
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
				if($strTipoUsuarioAuxiliarfactura_lote!=null && $strTipoUsuarioAuxiliarfactura_lote!='none' && $strTipoUsuarioAuxiliarfactura_lote!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarfactura_lote);
																
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
				if($strTipoUsuarioAuxiliarfactura_lote==null || $strTipoUsuarioAuxiliarfactura_lote=='none' || $strTipoUsuarioAuxiliarfactura_lote=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarfactura_lote,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, factura_lote_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, factura_lote_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina factura_lote');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($factura_lote_session);
			
			$this->getSetBusquedasSesionConfig($factura_lote_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportefactura_lotes($this->strAccionBusqueda,$this->factura_loteLogic->getfactura_lotes());*/
				} else if($this->strGenerarReporte=='Html')	{
					$factura_lote_session->strServletGenerarHtmlReporte='factura_loteServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(factura_lote_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(factura_lote_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($factura_lote_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarfactura_lote!=null && $strTipoUsuarioAuxiliarfactura_lote=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($factura_lote_session);
			}
								
			$this->set(factura_lote_util::$STR_SESSION_NAME, $factura_lote_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($factura_lote_session);
			
			/*
			$this->factura_lote->recursive = 0;
			
			$this->factura_lotes=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('factura_lotes', $this->factura_lotes);
			
			$this->set(factura_lote_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->factura_loteActual =$this->factura_loteClase;
			
			/*$this->factura_loteActual =$this->migrarModelfactura_lote($this->factura_loteClase);*/
			
			$this->returnHtml(false);
			
			$this->set(factura_lote_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=factura_lote_util::$STR_NOMBRE_OPCION;
				
			if(factura_lote_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=factura_lote_util::$STR_MODULO_OPCION.factura_lote_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(factura_lote_util::$STR_SESSION_NAME,serialize($factura_lote_session));
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
			/*$factura_loteClase= (factura_lote) factura_lotesModel.getRowData();*/
			
			$this->factura_loteClase->setId($this->factura_lote->getId());	
			$this->factura_loteClase->setVersionRow($this->factura_lote->getVersionRow());	
			$this->factura_loteClase->setVersionRow($this->factura_lote->getVersionRow());	
			$this->factura_loteClase->setid_empresa($this->factura_lote->getid_empresa());	
			$this->factura_loteClase->setid_sucursal($this->factura_lote->getid_sucursal());	
			$this->factura_loteClase->setid_ejercicio($this->factura_lote->getid_ejercicio());	
			$this->factura_loteClase->setid_periodo($this->factura_lote->getid_periodo());	
			$this->factura_loteClase->setid_usuario($this->factura_lote->getid_usuario());	
			$this->factura_loteClase->setnumero($this->factura_lote->getnumero());	
			$this->factura_loteClase->setid_cliente($this->factura_lote->getid_cliente());	
			$this->factura_loteClase->setruc($this->factura_lote->getruc());	
			$this->factura_loteClase->setreferencia_cliente($this->factura_lote->getreferencia_cliente());	
			$this->factura_loteClase->setfecha_emision($this->factura_lote->getfecha_emision());	
			$this->factura_loteClase->setid_vendedor($this->factura_lote->getid_vendedor());	
			$this->factura_loteClase->setid_termino_pago($this->factura_lote->getid_termino_pago());	
			$this->factura_loteClase->setfecha_vence($this->factura_lote->getfecha_vence());	
			$this->factura_loteClase->setcotizacion($this->factura_lote->getcotizacion());	
			$this->factura_loteClase->setid_moneda($this->factura_lote->getid_moneda());	
			$this->factura_loteClase->setid_estado($this->factura_lote->getid_estado());	
			$this->factura_loteClase->setdireccion($this->factura_lote->getdireccion());	
			$this->factura_loteClase->setenviar_a($this->factura_lote->getenviar_a());	
			$this->factura_loteClase->setobservacion($this->factura_lote->getobservacion());	
			$this->factura_loteClase->setimpuesto_en_precio($this->factura_lote->getimpuesto_en_precio());	
			$this->factura_loteClase->setsub_total($this->factura_lote->getsub_total());	
			$this->factura_loteClase->setdescuento_monto($this->factura_lote->getdescuento_monto());	
			$this->factura_loteClase->setdescuento_porciento($this->factura_lote->getdescuento_porciento());	
			$this->factura_loteClase->setiva_monto($this->factura_lote->getiva_monto());	
			$this->factura_loteClase->setiva_porciento($this->factura_lote->getiva_porciento());	
			$this->factura_loteClase->setretencion_fuente_monto($this->factura_lote->getretencion_fuente_monto());	
			$this->factura_loteClase->setretencion_fuente_porciento($this->factura_lote->getretencion_fuente_porciento());	
			$this->factura_loteClase->setretencion_iva_monto($this->factura_lote->getretencion_iva_monto());	
			$this->factura_loteClase->setretencion_iva_porciento($this->factura_lote->getretencion_iva_porciento());	
			$this->factura_loteClase->settotal($this->factura_lote->gettotal());	
			$this->factura_loteClase->setotro_monto($this->factura_lote->getotro_monto());	
			$this->factura_loteClase->setotro_porciento($this->factura_lote->getotro_porciento());	
			$this->factura_loteClase->sethora($this->factura_lote->gethora());	
			$this->factura_loteClase->setretencion_ica_monto($this->factura_lote->getretencion_ica_monto());	
			$this->factura_loteClase->setretencion_ica_porciento($this->factura_lote->getretencion_ica_porciento());	
			$this->factura_loteClase->setid_asiento($this->factura_lote->getid_asiento());	
			$this->factura_loteClase->setid_documento_cuenta_cobrar($this->factura_lote->getid_documento_cuenta_cobrar());	
			$this->factura_loteClase->setid_kardex($this->factura_lote->getid_kardex());	
		
			/*$this->Session->write('factura_loteVersionRowActual', factura_lote.getVersionRow());*/
			
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
			
			$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));
						
			if($factura_lote_session==null) {
				$factura_lote_session=new factura_lote_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('factura_lote', $this->factura_lote->read(null, $id));
	
			
			$this->factura_lote->recursive = 0;
			
			$this->factura_lotes=$this->paginate();
			
			$this->set('factura_lotes', $this->factura_lotes);
	
			if (empty($this->data)) {
				$this->data = $this->factura_lote->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->factura_loteLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->factura_loteClase);
			
			$this->factura_loteActual=$this->factura_loteClase;
			
			/*$this->factura_loteActual =$this->migrarModelfactura_lote($this->factura_loteClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->factura_loteLogic->getfactura_lotes(),$this->factura_loteActual);
			
			$this->actualizarControllerConReturnGeneral($this->factura_loteReturnGeneral);
			
			//$this->factura_loteReturnGeneral=$this->factura_loteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->factura_loteLogic->getfactura_lotes(),$this->factura_loteActual,$this->factura_loteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			


				//CLASE FACTURA_LOTE_DETALLE
				$this->registrarSesionParafactura_lote_detalles($this->idActual,true);

				$factura_lote_detalle_session=null;
				$factura_lote_detalle_session=unserialize($this->Session->read(factura_lote_detalle_util::$STR_SESSION_NAME));

				if($factura_lote_detalle_session==null) {
					$factura_lote_detalle_session=new factura_lote_detalle_session();
				}

				require_once('com/bydan/contabilidad/facturacion/presentation/control/factura_lote_detalle_control.php');
				$factura_lote_detalleController=new factura_lote_detalle_control();

				$factura_lote_detalleController->saveGetSessionControllerAndPageAuxiliar(false);
				$factura_lote_detalleController->getfactura_lote_detalleLogic()->setConnexion($this->getfactura_loteLogic()->getConnexion());
				$factura_lote_detalleController->cargarCombosFK(false);
				$factura_lote_detalleController->getSetBusquedasSesionConfig($factura_lote_detalle_session);
				$factura_lote_detalleController->onLoad($factura_lote_detalle_session);
				$factura_lote_detalleController->saveGetSessionControllerAndPageAuxiliar(true);


				//CLASE FACTURA_MODELO
				$this->registrarSesionParafactura_modeloes($this->idActual,true);

				$factura_modelo_session=null;
				$factura_modelo_session=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME));

				if($factura_modelo_session==null) {
					$factura_modelo_session=new factura_modelo_session();
				}

				require_once('com/bydan/contabilidad/facturacion/presentation/control/factura_modelo_control.php');
				$factura_modeloController=new factura_modelo_control();

				$factura_modeloController->saveGetSessionControllerAndPageAuxiliar(false);
				$factura_modeloController->getfactura_modeloLogic()->setConnexion($this->getfactura_loteLogic()->getConnexion());
				$factura_modeloController->cargarCombosFK(false);
				$factura_modeloController->getSetBusquedasSesionConfig($factura_modelo_session);
				$factura_modeloController->onLoad($factura_modelo_session);
				$factura_modeloController->saveGetSessionControllerAndPageAuxiliar(true);
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));
						
			if($factura_lote_session==null) {
				$factura_lote_session=new factura_lote_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevofactura_lote', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->factura_loteClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->factura_loteClase);
			
			$this->factura_loteActual =$this->factura_loteClase;
			
			/*$this->factura_loteActual =$this->migrarModelfactura_lote($this->factura_loteClase);*/
			
			$this->setfactura_loteFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->factura_loteLogic->getfactura_lotes(),$this->factura_lote);
			
			$this->actualizarControllerConReturnGeneral($this->factura_loteReturnGeneral);
			
			//this->factura_loteReturnGeneral=$this->factura_loteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->factura_loteLogic->getfactura_lotes(),$this->factura_lote,$this->factura_loteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->factura_loteReturnGeneral->getfactura_lote()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idsucursalDefaultFK!=null && $this->idsucursalDefaultFK > -1) {
				$this->factura_loteReturnGeneral->getfactura_lote()->setid_sucursal($this->idsucursalDefaultFK);
			}

			if($this->idejercicioDefaultFK!=null && $this->idejercicioDefaultFK > -1) {
				$this->factura_loteReturnGeneral->getfactura_lote()->setid_ejercicio($this->idejercicioDefaultFK);
			}

			if($this->idperiodoDefaultFK!=null && $this->idperiodoDefaultFK > -1) {
				$this->factura_loteReturnGeneral->getfactura_lote()->setid_periodo($this->idperiodoDefaultFK);
			}

			if($this->idusuarioDefaultFK!=null && $this->idusuarioDefaultFK > -1) {
				$this->factura_loteReturnGeneral->getfactura_lote()->setid_usuario($this->idusuarioDefaultFK);
			}

			if($this->idclienteDefaultFK!=null && $this->idclienteDefaultFK > -1) {
				$this->factura_loteReturnGeneral->getfactura_lote()->setid_cliente($this->idclienteDefaultFK);
			}

			if($this->idvendedorDefaultFK!=null && $this->idvendedorDefaultFK > -1) {
				$this->factura_loteReturnGeneral->getfactura_lote()->setid_vendedor($this->idvendedorDefaultFK);
			}

			if($this->idtermino_pagoDefaultFK!=null && $this->idtermino_pagoDefaultFK > -1) {
				$this->factura_loteReturnGeneral->getfactura_lote()->setid_termino_pago($this->idtermino_pagoDefaultFK);
			}

			if($this->idmonedaDefaultFK!=null && $this->idmonedaDefaultFK > -1) {
				$this->factura_loteReturnGeneral->getfactura_lote()->setid_moneda($this->idmonedaDefaultFK);
			}

			if($this->idestadoDefaultFK!=null && $this->idestadoDefaultFK > -1) {
				$this->factura_loteReturnGeneral->getfactura_lote()->setid_estado($this->idestadoDefaultFK);
			}

			if($this->idasientoDefaultFK!=null && $this->idasientoDefaultFK > -1) {
				$this->factura_loteReturnGeneral->getfactura_lote()->setid_asiento($this->idasientoDefaultFK);
			}

			if($this->iddocumento_cuenta_cobrarDefaultFK!=null && $this->iddocumento_cuenta_cobrarDefaultFK > -1) {
				$this->factura_loteReturnGeneral->getfactura_lote()->setid_documento_cuenta_cobrar($this->iddocumento_cuenta_cobrarDefaultFK);
			}

			if($this->idkardexDefaultFK!=null && $this->idkardexDefaultFK > -1) {
				$this->factura_loteReturnGeneral->getfactura_lote()->setid_kardex($this->idkardexDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->factura_loteReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->factura_loteReturnGeneral->getfactura_lote(),$this->factura_loteActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyfactura_lote($this->factura_loteReturnGeneral->getfactura_lote());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariofactura_lote($this->factura_loteReturnGeneral->getfactura_lote());*/
			}
			
			if($this->factura_loteReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->factura_loteReturnGeneral->getfactura_lote(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualfactura_lote($this->factura_lote,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			


				//CLASE FACTURA_LOTE_DETALLE
				$this->registrarSesionParafactura_lote_detalles($this->idActual,true);

				$factura_lote_detalle_session=null;
				$factura_lote_detalle_session=unserialize($this->Session->read(factura_lote_detalle_util::$STR_SESSION_NAME));

				if($factura_lote_detalle_session==null) {
					$factura_lote_detalle_session=new factura_lote_detalle_session();
				}

				require_once('com/bydan/contabilidad/facturacion/presentation/control/factura_lote_detalle_control.php');
				$factura_lote_detalleController=new factura_lote_detalle_control();

				$factura_lote_detalleController->saveGetSessionControllerAndPageAuxiliar(false);
				$factura_lote_detalleController->getfactura_lote_detalleLogic()->setConnexion($this->getfactura_loteLogic()->getConnexion());
				$factura_lote_detalleController->cargarCombosFK(false);
				$factura_lote_detalleController->getSetBusquedasSesionConfig($factura_lote_detalle_session);
				$factura_lote_detalleController->onLoad($factura_lote_detalle_session);
				$factura_lote_detalleController->saveGetSessionControllerAndPageAuxiliar(true);


				//CLASE FACTURA_MODELO
				$this->registrarSesionParafactura_modeloes($this->idActual,true);

				$factura_modelo_session=null;
				$factura_modelo_session=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME));

				if($factura_modelo_session==null) {
					$factura_modelo_session=new factura_modelo_session();
				}

				require_once('com/bydan/contabilidad/facturacion/presentation/control/factura_modelo_control.php');
				$factura_modeloController=new factura_modelo_control();

				$factura_modeloController->saveGetSessionControllerAndPageAuxiliar(false);
				$factura_modeloController->getfactura_modeloLogic()->setConnexion($this->getfactura_loteLogic()->getConnexion());
				$factura_modeloController->cargarCombosFK(false);
				$factura_modeloController->getSetBusquedasSesionConfig($factura_modelo_session);
				$factura_modeloController->onLoad($factura_modelo_session);
				$factura_modeloController->saveGetSessionControllerAndPageAuxiliar(true);
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->factura_lotesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->factura_lotesAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->factura_lotesAuxiliar=array();
			}
			
			if(count($this->factura_lotesAuxiliar)==2) {
				$factura_loteOrigen=$this->factura_lotesAuxiliar[0];
				$factura_loteDestino=$this->factura_lotesAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($factura_loteOrigen,$factura_loteDestino,true,false,false);
				
				$this->actualizarLista($factura_loteDestino,$this->factura_lotes);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->factura_lotesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->factura_lotesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->factura_lotesAuxiliar=array();
			}
			
			if(count($this->factura_lotesAuxiliar) > 0) {
				foreach ($this->factura_lotesAuxiliar as $factura_loteSeleccionado) {
					$this->factura_lote=new factura_lote();
					
					$this->setCopiarVariablesObjetos($factura_loteSeleccionado,$this->factura_lote,true,true,false);
						
					$this->factura_lotes[]=$this->factura_lote;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->factura_lotesEliminados as $factura_loteEliminado) {
				$this->factura_loteLogic->factura_lotes[]=$factura_loteEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->factura_lote=new factura_lote();
							
				$this->factura_lotes[]=$this->factura_lote;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
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
		
		$factura_loteActual=new factura_lote();
		
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
				
				$factura_loteActual=$this->factura_lotes[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $factura_loteActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $factura_loteActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $factura_loteActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $factura_loteActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $factura_loteActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $factura_loteActual->setnumero($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $factura_loteActual->setid_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $factura_loteActual->setruc($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $factura_loteActual->setreferencia_cliente($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $factura_loteActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $factura_loteActual->setid_vendedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $factura_loteActual->setid_termino_pago((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $factura_loteActual->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $factura_loteActual->setcotizacion((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $factura_loteActual->setid_moneda((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $factura_loteActual->setid_estado((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $factura_loteActual->setdireccion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $factura_loteActual->setenviar_a($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $factura_loteActual->setobservacion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $factura_loteActual->setimpuesto_en_precio(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_22')));  } else { $factura_loteActual->setimpuesto_en_precio(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $factura_loteActual->setsub_total((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_24','t'.$this->strSufijo)) {  $factura_loteActual->setdescuento_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_24'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_25','t'.$this->strSufijo)) {  $factura_loteActual->setdescuento_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_25'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_26','t'.$this->strSufijo)) {  $factura_loteActual->setiva_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_26'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_27','t'.$this->strSufijo)) {  $factura_loteActual->setiva_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_27'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_28','t'.$this->strSufijo)) {  $factura_loteActual->setretencion_fuente_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_28'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_29','t'.$this->strSufijo)) {  $factura_loteActual->setretencion_fuente_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_29'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_30','t'.$this->strSufijo)) {  $factura_loteActual->setretencion_iva_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_30'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_31','t'.$this->strSufijo)) {  $factura_loteActual->setretencion_iva_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_31'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_32','t'.$this->strSufijo)) {  $factura_loteActual->settotal((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_32'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_33','t'.$this->strSufijo)) {  $factura_loteActual->setotro_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_33'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_34','t'.$this->strSufijo)) {  $factura_loteActual->setotro_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_34'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_35','t'.$this->strSufijo)) {  $factura_loteActual->sethora(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_35')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_36','t'.$this->strSufijo)) {  $factura_loteActual->setretencion_ica_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_36'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_37','t'.$this->strSufijo)) {  $factura_loteActual->setretencion_ica_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_37'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_38','t'.$this->strSufijo)) {  $factura_loteActual->setid_asiento((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_38'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_39','t'.$this->strSufijo)) {  $factura_loteActual->setid_documento_cuenta_cobrar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_39'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_40','t'.$this->strSufijo)) {  $factura_loteActual->setid_kardex((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_40'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->factura_lotesAuxiliar=array();		 
		/*$this->factura_lotesEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->factura_lotesAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->factura_lotesAuxiliar=array();
		}
			
		if(count($this->factura_lotesAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->factura_lotesAuxiliar as $factura_loteAuxLocal) {				
				
				foreach($this->factura_lotes as $factura_loteLocal) {
					if($factura_loteLocal->getId()==$factura_loteAuxLocal->getId()) {
						$factura_loteLocal->setIsDeleted(true);
						
						/*$this->factura_lotesEliminados[]=$factura_loteLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->factura_loteLogic->setfactura_lotes($this->factura_lotes);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
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
				$this->factura_loteLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadfactura_lote='',string $strTipoPaginaAuxiliarfactura_lote='',string $strTipoUsuarioAuxiliarfactura_lote='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadfactura_lote,$strTipoPaginaAuxiliarfactura_lote,$strTipoUsuarioAuxiliarfactura_lote,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->factura_lotes) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=factura_lote_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=factura_lote_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=factura_lote_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));
						
			if($factura_lote_session==null) {
				$factura_lote_session=new factura_lote_session();
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
					/*$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;*/
					
					if($factura_lote_session->intNumeroPaginacion==factura_lote_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$factura_lote_session->intNumeroPaginacion;
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
			
			$this->factura_lotesEliminados=array();
			
			/*$this->factura_loteLogic->setConnexion($connexion);*/
			
			$this->factura_loteLogic->setIsConDeep(true);
			
			$this->factura_loteLogic->getfactura_loteDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cliente');$classes[]=$class;
			$class=new Classe('vendedor');$classes[]=$class;
			$class=new Classe('termino_pago');$classes[]=$class;
			$class=new Classe('moneda');$classes[]=$class;
			$class=new Classe('estado');$classes[]=$class;
			$class=new Classe('asiento');$classes[]=$class;
			$class=new Classe('documento_cuenta_cobrar');$classes[]=$class;
			$class=new Classe('kardex');$classes[]=$class;
			
			$this->factura_loteLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->factura_loteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->factura_loteLogic->getfactura_lotes()==null|| count($this->factura_loteLogic->getfactura_lotes())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->factura_lotes=$this->factura_loteLogic->getfactura_lotes();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->factura_loteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->factura_lotesReporte=$this->factura_loteLogic->getfactura_lotes();
									
						/*$this->generarReportes('Todos',$this->factura_loteLogic->getfactura_lotes());*/
					
						$this->factura_loteLogic->setfactura_lotes($this->factura_lotes);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->factura_loteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->factura_loteLogic->getfactura_lotes()==null|| count($this->factura_loteLogic->getfactura_lotes())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->factura_lotes=$this->factura_loteLogic->getfactura_lotes();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->factura_loteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->factura_lotesReporte=$this->factura_loteLogic->getfactura_lotes();
									
						/*$this->generarReportes('Todos',$this->factura_loteLogic->getfactura_lotes());*/
					
						$this->factura_loteLogic->setfactura_lotes($this->factura_lotes);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idfactura_lote=0;*/
				
				if($factura_lote_session->bitBusquedaDesdeFKSesionFK!=null && $factura_lote_session->bitBusquedaDesdeFKSesionFK==true) {
					if($factura_lote_session->bigIdActualFK!=null && $factura_lote_session->bigIdActualFK!=0)	{
						$this->idfactura_lote=$factura_lote_session->bigIdActualFK;	
					}
					
					$factura_lote_session->bitBusquedaDesdeFKSesionFK=false;
					
					$factura_lote_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idfactura_lote=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idfactura_lote=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->factura_loteLogic->getEntity($this->idfactura_lote);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*factura_loteLogicAdditional::getDetalleIndicePorId($idfactura_lote);*/

				
				if($this->factura_loteLogic->getfactura_lote()!=null) {
					$this->factura_loteLogic->setfactura_lotes(array());
					$this->factura_loteLogic->factura_lotes[]=$this->factura_loteLogic->getfactura_lote();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idasiento')
			{

				if($factura_lote_session->bigidasientoActual!=null && $factura_lote_session->bigidasientoActual!=0)
				{
					$this->id_asientoFK_Idasiento=$factura_lote_session->bigidasientoActual;
					$factura_lote_session->bigidasientoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idasiento($finalQueryPaginacion,$this->pagination,$this->id_asientoFK_Idasiento);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//factura_loteLogicAdditional::getDetalleIndiceFK_Idasiento($this->id_asientoFK_Idasiento);


					if($this->factura_loteLogic->getfactura_lotes()==null || count($this->factura_loteLogic->getfactura_lotes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$factura_lotes=$this->factura_loteLogic->getfactura_lotes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idasiento('',$this->pagination,$this->id_asientoFK_Idasiento);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->factura_lotesReporte=$this->factura_loteLogic->getfactura_lotes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportefactura_lotes("FK_Idasiento",$this->factura_loteLogic->getfactura_lotes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->factura_loteLogic->setfactura_lotes($factura_lotes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcliente')
			{

				if($factura_lote_session->bigidclienteActual!=null && $factura_lote_session->bigidclienteActual!=0)
				{
					$this->id_clienteFK_Idcliente=$factura_lote_session->bigidclienteActual;
					$factura_lote_session->bigidclienteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idcliente($finalQueryPaginacion,$this->pagination,$this->id_clienteFK_Idcliente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//factura_loteLogicAdditional::getDetalleIndiceFK_Idcliente($this->id_clienteFK_Idcliente);


					if($this->factura_loteLogic->getfactura_lotes()==null || count($this->factura_loteLogic->getfactura_lotes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$factura_lotes=$this->factura_loteLogic->getfactura_lotes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idcliente('',$this->pagination,$this->id_clienteFK_Idcliente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->factura_lotesReporte=$this->factura_loteLogic->getfactura_lotes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportefactura_lotes("FK_Idcliente",$this->factura_loteLogic->getfactura_lotes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->factura_loteLogic->setfactura_lotes($factura_lotes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Iddocumento_cuenta_cobrar')
			{

				if($factura_lote_session->bigiddocumento_cuenta_cobrarActual!=null && $factura_lote_session->bigiddocumento_cuenta_cobrarActual!=0)
				{
					$this->id_documento_cuenta_cobrarFK_Iddocumento_cuenta_cobrar=$factura_lote_session->bigiddocumento_cuenta_cobrarActual;
					$factura_lote_session->bigiddocumento_cuenta_cobrarActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Iddocumento_cuenta_cobrar($finalQueryPaginacion,$this->pagination,$this->id_documento_cuenta_cobrarFK_Iddocumento_cuenta_cobrar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//factura_loteLogicAdditional::getDetalleIndiceFK_Iddocumento_cuenta_cobrar($this->id_documento_cuenta_cobrarFK_Iddocumento_cuenta_cobrar);


					if($this->factura_loteLogic->getfactura_lotes()==null || count($this->factura_loteLogic->getfactura_lotes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$factura_lotes=$this->factura_loteLogic->getfactura_lotes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Iddocumento_cuenta_cobrar('',$this->pagination,$this->id_documento_cuenta_cobrarFK_Iddocumento_cuenta_cobrar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->factura_lotesReporte=$this->factura_loteLogic->getfactura_lotes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportefactura_lotes("FK_Iddocumento_cuenta_cobrar",$this->factura_loteLogic->getfactura_lotes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->factura_loteLogic->setfactura_lotes($factura_lotes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idejercicio')
			{

				if($factura_lote_session->bigidejercicioActual!=null && $factura_lote_session->bigidejercicioActual!=0)
				{
					$this->id_ejercicioFK_Idejercicio=$factura_lote_session->bigidejercicioActual;
					$factura_lote_session->bigidejercicioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idejercicio($finalQueryPaginacion,$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//factura_loteLogicAdditional::getDetalleIndiceFK_Idejercicio($this->id_ejercicioFK_Idejercicio);


					if($this->factura_loteLogic->getfactura_lotes()==null || count($this->factura_loteLogic->getfactura_lotes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$factura_lotes=$this->factura_loteLogic->getfactura_lotes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idejercicio('',$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->factura_lotesReporte=$this->factura_loteLogic->getfactura_lotes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportefactura_lotes("FK_Idejercicio",$this->factura_loteLogic->getfactura_lotes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->factura_loteLogic->setfactura_lotes($factura_lotes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($factura_lote_session->bigidempresaActual!=null && $factura_lote_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$factura_lote_session->bigidempresaActual;
					$factura_lote_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//factura_loteLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->factura_loteLogic->getfactura_lotes()==null || count($this->factura_loteLogic->getfactura_lotes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$factura_lotes=$this->factura_loteLogic->getfactura_lotes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->factura_lotesReporte=$this->factura_loteLogic->getfactura_lotes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportefactura_lotes("FK_Idempresa",$this->factura_loteLogic->getfactura_lotes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->factura_loteLogic->setfactura_lotes($factura_lotes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idestado')
			{

				if($factura_lote_session->bigidestadoActual!=null && $factura_lote_session->bigidestadoActual!=0)
				{
					$this->id_estadoFK_Idestado=$factura_lote_session->bigidestadoActual;
					$factura_lote_session->bigidestadoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idestado($finalQueryPaginacion,$this->pagination,$this->id_estadoFK_Idestado);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//factura_loteLogicAdditional::getDetalleIndiceFK_Idestado($this->id_estadoFK_Idestado);


					if($this->factura_loteLogic->getfactura_lotes()==null || count($this->factura_loteLogic->getfactura_lotes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$factura_lotes=$this->factura_loteLogic->getfactura_lotes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idestado('',$this->pagination,$this->id_estadoFK_Idestado);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->factura_lotesReporte=$this->factura_loteLogic->getfactura_lotes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportefactura_lotes("FK_Idestado",$this->factura_loteLogic->getfactura_lotes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->factura_loteLogic->setfactura_lotes($factura_lotes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idkardex')
			{

				if($factura_lote_session->bigidkardexActual!=null && $factura_lote_session->bigidkardexActual!=0)
				{
					$this->id_kardexFK_Idkardex=$factura_lote_session->bigidkardexActual;
					$factura_lote_session->bigidkardexActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idkardex($finalQueryPaginacion,$this->pagination,$this->id_kardexFK_Idkardex);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//factura_loteLogicAdditional::getDetalleIndiceFK_Idkardex($this->id_kardexFK_Idkardex);


					if($this->factura_loteLogic->getfactura_lotes()==null || count($this->factura_loteLogic->getfactura_lotes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$factura_lotes=$this->factura_loteLogic->getfactura_lotes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idkardex('',$this->pagination,$this->id_kardexFK_Idkardex);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->factura_lotesReporte=$this->factura_loteLogic->getfactura_lotes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportefactura_lotes("FK_Idkardex",$this->factura_loteLogic->getfactura_lotes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->factura_loteLogic->setfactura_lotes($factura_lotes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idmoneda')
			{

				if($factura_lote_session->bigidmonedaActual!=null && $factura_lote_session->bigidmonedaActual!=0)
				{
					$this->id_monedaFK_Idmoneda=$factura_lote_session->bigidmonedaActual;
					$factura_lote_session->bigidmonedaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idmoneda($finalQueryPaginacion,$this->pagination,$this->id_monedaFK_Idmoneda);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//factura_loteLogicAdditional::getDetalleIndiceFK_Idmoneda($this->id_monedaFK_Idmoneda);


					if($this->factura_loteLogic->getfactura_lotes()==null || count($this->factura_loteLogic->getfactura_lotes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$factura_lotes=$this->factura_loteLogic->getfactura_lotes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idmoneda('',$this->pagination,$this->id_monedaFK_Idmoneda);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->factura_lotesReporte=$this->factura_loteLogic->getfactura_lotes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportefactura_lotes("FK_Idmoneda",$this->factura_loteLogic->getfactura_lotes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->factura_loteLogic->setfactura_lotes($factura_lotes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idperiodo')
			{

				if($factura_lote_session->bigidperiodoActual!=null && $factura_lote_session->bigidperiodoActual!=0)
				{
					$this->id_periodoFK_Idperiodo=$factura_lote_session->bigidperiodoActual;
					$factura_lote_session->bigidperiodoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idperiodo($finalQueryPaginacion,$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//factura_loteLogicAdditional::getDetalleIndiceFK_Idperiodo($this->id_periodoFK_Idperiodo);


					if($this->factura_loteLogic->getfactura_lotes()==null || count($this->factura_loteLogic->getfactura_lotes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$factura_lotes=$this->factura_loteLogic->getfactura_lotes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idperiodo('',$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->factura_lotesReporte=$this->factura_loteLogic->getfactura_lotes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportefactura_lotes("FK_Idperiodo",$this->factura_loteLogic->getfactura_lotes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->factura_loteLogic->setfactura_lotes($factura_lotes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idsucursal')
			{

				if($factura_lote_session->bigidsucursalActual!=null && $factura_lote_session->bigidsucursalActual!=0)
				{
					$this->id_sucursalFK_Idsucursal=$factura_lote_session->bigidsucursalActual;
					$factura_lote_session->bigidsucursalActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idsucursal($finalQueryPaginacion,$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//factura_loteLogicAdditional::getDetalleIndiceFK_Idsucursal($this->id_sucursalFK_Idsucursal);


					if($this->factura_loteLogic->getfactura_lotes()==null || count($this->factura_loteLogic->getfactura_lotes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$factura_lotes=$this->factura_loteLogic->getfactura_lotes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idsucursal('',$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->factura_lotesReporte=$this->factura_loteLogic->getfactura_lotes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportefactura_lotes("FK_Idsucursal",$this->factura_loteLogic->getfactura_lotes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->factura_loteLogic->setfactura_lotes($factura_lotes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtermino_pago')
			{

				if($factura_lote_session->bigidtermino_pagoActual!=null && $factura_lote_session->bigidtermino_pagoActual!=0)
				{
					$this->id_termino_pagoFK_Idtermino_pago=$factura_lote_session->bigidtermino_pagoActual;
					$factura_lote_session->bigidtermino_pagoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idtermino_pago($finalQueryPaginacion,$this->pagination,$this->id_termino_pagoFK_Idtermino_pago);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//factura_loteLogicAdditional::getDetalleIndiceFK_Idtermino_pago($this->id_termino_pagoFK_Idtermino_pago);


					if($this->factura_loteLogic->getfactura_lotes()==null || count($this->factura_loteLogic->getfactura_lotes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$factura_lotes=$this->factura_loteLogic->getfactura_lotes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idtermino_pago('',$this->pagination,$this->id_termino_pagoFK_Idtermino_pago);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->factura_lotesReporte=$this->factura_loteLogic->getfactura_lotes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportefactura_lotes("FK_Idtermino_pago",$this->factura_loteLogic->getfactura_lotes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->factura_loteLogic->setfactura_lotes($factura_lotes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idusuario')
			{

				if($factura_lote_session->bigidusuarioActual!=null && $factura_lote_session->bigidusuarioActual!=0)
				{
					$this->id_usuarioFK_Idusuario=$factura_lote_session->bigidusuarioActual;
					$factura_lote_session->bigidusuarioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idusuario($finalQueryPaginacion,$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//factura_loteLogicAdditional::getDetalleIndiceFK_Idusuario($this->id_usuarioFK_Idusuario);


					if($this->factura_loteLogic->getfactura_lotes()==null || count($this->factura_loteLogic->getfactura_lotes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$factura_lotes=$this->factura_loteLogic->getfactura_lotes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idusuario('',$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->factura_lotesReporte=$this->factura_loteLogic->getfactura_lotes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportefactura_lotes("FK_Idusuario",$this->factura_loteLogic->getfactura_lotes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->factura_loteLogic->setfactura_lotes($factura_lotes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idvendedor')
			{

				if($factura_lote_session->bigidvendedorActual!=null && $factura_lote_session->bigidvendedorActual!=0)
				{
					$this->id_vendedorFK_Idvendedor=$factura_lote_session->bigidvendedorActual;
					$factura_lote_session->bigidvendedorActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idvendedor($finalQueryPaginacion,$this->pagination,$this->id_vendedorFK_Idvendedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//factura_loteLogicAdditional::getDetalleIndiceFK_Idvendedor($this->id_vendedorFK_Idvendedor);


					if($this->factura_loteLogic->getfactura_lotes()==null || count($this->factura_loteLogic->getfactura_lotes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$factura_lotes=$this->factura_loteLogic->getfactura_lotes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_loteLogic->getsFK_Idvendedor('',$this->pagination,$this->id_vendedorFK_Idvendedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->factura_lotesReporte=$this->factura_loteLogic->getfactura_lotes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportefactura_lotes("FK_Idvendedor",$this->factura_loteLogic->getfactura_lotes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->factura_loteLogic->setfactura_lotes($factura_lotes);
					}
				//}

			} 
		
		$factura_lote_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$factura_lote_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->factura_loteLogic->loadForeignsKeysDescription();*/
		
		$this->factura_lotes=$this->factura_loteLogic->getfactura_lotes();
		
		if($this->factura_lotesEliminados==null) {
			$this->factura_lotesEliminados=array();
		}
		
		$this->Session->write(factura_lote_util::$STR_SESSION_NAME.'Lista',serialize($this->factura_lotes));
		$this->Session->write(factura_lote_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->factura_lotesEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(factura_lote_util::$STR_SESSION_NAME,serialize($factura_lote_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idfactura_lote=$idGeneral;
			
			$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
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
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}

			if(count($this->factura_lotes) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
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
				$this->factura_loteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_asientoFK_Idasiento=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idasiento','cmbid_asiento');

			$this->strAccionBusqueda='FK_Idasiento';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
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
				$this->factura_loteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_clienteFK_Idcliente=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcliente','cmbid_cliente');

			$this->strAccionBusqueda='FK_Idcliente';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
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
				$this->factura_loteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_documento_cuenta_cobrarFK_Iddocumento_cuenta_cobrar=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Iddocumento_cuenta_cobrar','cmbid_documento_cuenta_cobrar');

			$this->strAccionBusqueda='FK_Iddocumento_cuenta_cobrar';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
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
				$this->factura_loteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_ejercicioFK_Idejercicio=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idejercicio','cmbid_ejercicio');

			$this->strAccionBusqueda='FK_Idejercicio';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
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
				$this->factura_loteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
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
				$this->factura_loteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_estadoFK_Idestado=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idestado','cmbid_estado');

			$this->strAccionBusqueda='FK_Idestado';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdkardexParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_kardexFK_Idkardex=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idkardex','cmbid_kardex');

			$this->strAccionBusqueda='FK_Idkardex';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdmonedaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_monedaFK_Idmoneda=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idmoneda','cmbid_moneda');

			$this->strAccionBusqueda='FK_Idmoneda';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
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
				$this->factura_loteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_periodoFK_Idperiodo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idperiodo','cmbid_periodo');

			$this->strAccionBusqueda='FK_Idperiodo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
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
				$this->factura_loteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_sucursalFK_Idsucursal=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idsucursal','cmbid_sucursal');

			$this->strAccionBusqueda='FK_Idsucursal';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtermino_pagoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_termino_pagoFK_Idtermino_pago=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtermino_pago','cmbid_termino_pago');

			$this->strAccionBusqueda='FK_Idtermino_pago';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
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
				$this->factura_loteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_usuarioFK_Idusuario=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idusuario','cmbid_usuario');

			$this->strAccionBusqueda='FK_Idusuario';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdvendedorParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_vendedorFK_Idvendedor=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idvendedor','cmbid_vendedor');

			$this->strAccionBusqueda='FK_Idvendedor';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idasiento($strFinalQuery,$id_asiento)
	{
		try
		{

			$this->factura_loteLogic->getsFK_Idasiento($strFinalQuery,new Pagination(),$id_asiento);
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

			$this->factura_loteLogic->getsFK_Idcliente($strFinalQuery,new Pagination(),$id_cliente);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Iddocumento_cuenta_cobrar($strFinalQuery,$id_documento_cuenta_cobrar)
	{
		try
		{

			$this->factura_loteLogic->getsFK_Iddocumento_cuenta_cobrar($strFinalQuery,new Pagination(),$id_documento_cuenta_cobrar);
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

			$this->factura_loteLogic->getsFK_Idejercicio($strFinalQuery,new Pagination(),$id_ejercicio);
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

			$this->factura_loteLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
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

			$this->factura_loteLogic->getsFK_Idestado($strFinalQuery,new Pagination(),$id_estado);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idkardex($strFinalQuery,$id_kardex)
	{
		try
		{

			$this->factura_loteLogic->getsFK_Idkardex($strFinalQuery,new Pagination(),$id_kardex);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idmoneda($strFinalQuery,$id_moneda)
	{
		try
		{

			$this->factura_loteLogic->getsFK_Idmoneda($strFinalQuery,new Pagination(),$id_moneda);
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

			$this->factura_loteLogic->getsFK_Idperiodo($strFinalQuery,new Pagination(),$id_periodo);
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

			$this->factura_loteLogic->getsFK_Idsucursal($strFinalQuery,new Pagination(),$id_sucursal);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtermino_pago($strFinalQuery,$id_termino_pago)
	{
		try
		{

			$this->factura_loteLogic->getsFK_Idtermino_pago($strFinalQuery,new Pagination(),$id_termino_pago);
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

			$this->factura_loteLogic->getsFK_Idusuario($strFinalQuery,new Pagination(),$id_usuario);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idvendedor($strFinalQuery,$id_vendedor)
	{
		try
		{

			$this->factura_loteLogic->getsFK_Idvendedor($strFinalQuery,new Pagination(),$id_vendedor);
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
			
			
			$factura_loteForeignKey=new factura_lote_param_return(); //factura_loteForeignKey();
			
			$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));
						
			if($factura_lote_session==null) {
				$factura_lote_session=new factura_lote_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$factura_loteForeignKey=$this->factura_loteLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$factura_lote_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$factura_loteForeignKey->empresasFK;
				$this->idempresaDefaultFK=$factura_loteForeignKey->idempresaDefaultFK;
			}

			if($factura_lote_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$this->strRecargarFkTipos,',')) {
				$this->sucursalsFK=$factura_loteForeignKey->sucursalsFK;
				$this->idsucursalDefaultFK=$factura_loteForeignKey->idsucursalDefaultFK;
			}

			if($factura_lote_session->bitBusquedaDesdeFKSesionsucursal) {
				$this->setVisibleBusquedasParasucursal(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$this->strRecargarFkTipos,',')) {
				$this->ejerciciosFK=$factura_loteForeignKey->ejerciciosFK;
				$this->idejercicioDefaultFK=$factura_loteForeignKey->idejercicioDefaultFK;
			}

			if($factura_lote_session->bitBusquedaDesdeFKSesionejercicio) {
				$this->setVisibleBusquedasParaejercicio(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$this->strRecargarFkTipos,',')) {
				$this->periodosFK=$factura_loteForeignKey->periodosFK;
				$this->idperiodoDefaultFK=$factura_loteForeignKey->idperiodoDefaultFK;
			}

			if($factura_lote_session->bitBusquedaDesdeFKSesionperiodo) {
				$this->setVisibleBusquedasParaperiodo(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$this->strRecargarFkTipos,',')) {
				$this->usuariosFK=$factura_loteForeignKey->usuariosFK;
				$this->idusuarioDefaultFK=$factura_loteForeignKey->idusuarioDefaultFK;
			}

			if($factura_lote_session->bitBusquedaDesdeFKSesionusuario) {
				$this->setVisibleBusquedasParausuario(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cliente',$this->strRecargarFkTipos,',')) {
				$this->clientesFK=$factura_loteForeignKey->clientesFK;
				$this->idclienteDefaultFK=$factura_loteForeignKey->idclienteDefaultFK;
			}

			if($factura_lote_session->bitBusquedaDesdeFKSesioncliente) {
				$this->setVisibleBusquedasParacliente(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_vendedor',$this->strRecargarFkTipos,',')) {
				$this->vendedorsFK=$factura_loteForeignKey->vendedorsFK;
				$this->idvendedorDefaultFK=$factura_loteForeignKey->idvendedorDefaultFK;
			}

			if($factura_lote_session->bitBusquedaDesdeFKSesionvendedor) {
				$this->setVisibleBusquedasParavendedor(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_termino_pago',$this->strRecargarFkTipos,',')) {
				$this->termino_pagosFK=$factura_loteForeignKey->termino_pagosFK;
				$this->idtermino_pagoDefaultFK=$factura_loteForeignKey->idtermino_pagoDefaultFK;
			}

			if($factura_lote_session->bitBusquedaDesdeFKSesiontermino_pago) {
				$this->setVisibleBusquedasParatermino_pago_clienteid_termino_pago(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_moneda',$this->strRecargarFkTipos,',')) {
				$this->monedasFK=$factura_loteForeignKey->monedasFK;
				$this->idmonedaDefaultFK=$factura_loteForeignKey->idmonedaDefaultFK;
			}

			if($factura_lote_session->bitBusquedaDesdeFKSesionmoneda) {
				$this->setVisibleBusquedasParamoneda(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado',$this->strRecargarFkTipos,',')) {
				$this->estadosFK=$factura_loteForeignKey->estadosFK;
				$this->idestadoDefaultFK=$factura_loteForeignKey->idestadoDefaultFK;
			}

			if($factura_lote_session->bitBusquedaDesdeFKSesionestado) {
				$this->setVisibleBusquedasParaestado(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_asiento',$this->strRecargarFkTipos,',')) {
				$this->asientosFK=$factura_loteForeignKey->asientosFK;
				$this->idasientoDefaultFK=$factura_loteForeignKey->idasientoDefaultFK;
			}

			if($factura_lote_session->bitBusquedaDesdeFKSesionasiento) {
				$this->setVisibleBusquedasParaasiento(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_documento_cuenta_cobrar',$this->strRecargarFkTipos,',')) {
				$this->documento_cuenta_cobrarsFK=$factura_loteForeignKey->documento_cuenta_cobrarsFK;
				$this->iddocumento_cuenta_cobrarDefaultFK=$factura_loteForeignKey->iddocumento_cuenta_cobrarDefaultFK;
			}

			if($factura_lote_session->bitBusquedaDesdeFKSesiondocumento_cuenta_cobrar) {
				$this->setVisibleBusquedasParadocumento_cuenta_cobrar(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_kardex',$this->strRecargarFkTipos,',')) {
				$this->kardexsFK=$factura_loteForeignKey->kardexsFK;
				$this->idkardexDefaultFK=$factura_loteForeignKey->idkardexDefaultFK;
			}

			if($factura_lote_session->bitBusquedaDesdeFKSesionkardex) {
				$this->setVisibleBusquedasParakardex(true);
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
	
	function cargarCombosFKFromReturnGeneral($factura_loteReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$factura_loteReturnGeneral->strRecargarFkTipos;
			
			


			if($factura_loteReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$factura_loteReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$factura_loteReturnGeneral->idempresaDefaultFK;
			}


			if($factura_loteReturnGeneral->con_sucursalsFK==true) {
				$this->sucursalsFK=$factura_loteReturnGeneral->sucursalsFK;
				$this->idsucursalDefaultFK=$factura_loteReturnGeneral->idsucursalDefaultFK;
			}


			if($factura_loteReturnGeneral->con_ejerciciosFK==true) {
				$this->ejerciciosFK=$factura_loteReturnGeneral->ejerciciosFK;
				$this->idejercicioDefaultFK=$factura_loteReturnGeneral->idejercicioDefaultFK;
			}


			if($factura_loteReturnGeneral->con_periodosFK==true) {
				$this->periodosFK=$factura_loteReturnGeneral->periodosFK;
				$this->idperiodoDefaultFK=$factura_loteReturnGeneral->idperiodoDefaultFK;
			}


			if($factura_loteReturnGeneral->con_usuariosFK==true) {
				$this->usuariosFK=$factura_loteReturnGeneral->usuariosFK;
				$this->idusuarioDefaultFK=$factura_loteReturnGeneral->idusuarioDefaultFK;
			}


			if($factura_loteReturnGeneral->con_clientesFK==true) {
				$this->clientesFK=$factura_loteReturnGeneral->clientesFK;
				$this->idclienteDefaultFK=$factura_loteReturnGeneral->idclienteDefaultFK;
			}


			if($factura_loteReturnGeneral->con_vendedorsFK==true) {
				$this->vendedorsFK=$factura_loteReturnGeneral->vendedorsFK;
				$this->idvendedorDefaultFK=$factura_loteReturnGeneral->idvendedorDefaultFK;
			}


			if($factura_loteReturnGeneral->con_termino_pagosFK==true) {
				$this->termino_pagosFK=$factura_loteReturnGeneral->termino_pagosFK;
				$this->idtermino_pagoDefaultFK=$factura_loteReturnGeneral->idtermino_pagoDefaultFK;
			}


			if($factura_loteReturnGeneral->con_monedasFK==true) {
				$this->monedasFK=$factura_loteReturnGeneral->monedasFK;
				$this->idmonedaDefaultFK=$factura_loteReturnGeneral->idmonedaDefaultFK;
			}


			if($factura_loteReturnGeneral->con_estadosFK==true) {
				$this->estadosFK=$factura_loteReturnGeneral->estadosFK;
				$this->idestadoDefaultFK=$factura_loteReturnGeneral->idestadoDefaultFK;
			}


			if($factura_loteReturnGeneral->con_asientosFK==true) {
				$this->asientosFK=$factura_loteReturnGeneral->asientosFK;
				$this->idasientoDefaultFK=$factura_loteReturnGeneral->idasientoDefaultFK;
			}


			if($factura_loteReturnGeneral->con_documento_cuenta_cobrarsFK==true) {
				$this->documento_cuenta_cobrarsFK=$factura_loteReturnGeneral->documento_cuenta_cobrarsFK;
				$this->iddocumento_cuenta_cobrarDefaultFK=$factura_loteReturnGeneral->iddocumento_cuenta_cobrarDefaultFK;
			}


			if($factura_loteReturnGeneral->con_kardexsFK==true) {
				$this->kardexsFK=$factura_loteReturnGeneral->kardexsFK;
				$this->idkardexDefaultFK=$factura_loteReturnGeneral->idkardexDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(factura_lote_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));
		
		if($factura_lote_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($factura_lote_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($factura_lote_session->getstrNombrePaginaNavegacionHaciaFKDesde()==sucursal_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='sucursal';
			}
			else if($factura_lote_session->getstrNombrePaginaNavegacionHaciaFKDesde()==ejercicio_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='ejercicio';
			}
			else if($factura_lote_session->getstrNombrePaginaNavegacionHaciaFKDesde()==periodo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='periodo';
			}
			else if($factura_lote_session->getstrNombrePaginaNavegacionHaciaFKDesde()==usuario_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='usuario';
			}
			else if($factura_lote_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cliente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cliente';
			}
			else if($factura_lote_session->getstrNombrePaginaNavegacionHaciaFKDesde()==vendedor_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='vendedor';
			}
			else if($factura_lote_session->getstrNombrePaginaNavegacionHaciaFKDesde()==termino_pago_cliente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='termino_pago_cliente';
			}
			else if($factura_lote_session->getstrNombrePaginaNavegacionHaciaFKDesde()==moneda_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='moneda';
			}
			else if($factura_lote_session->getstrNombrePaginaNavegacionHaciaFKDesde()==estado_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='estado';
			}
			else if($factura_lote_session->getstrNombrePaginaNavegacionHaciaFKDesde()==asiento_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='asiento';
			}
			else if($factura_lote_session->getstrNombrePaginaNavegacionHaciaFKDesde()==documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='documento_cuenta_cobrar';
			}
			else if($factura_lote_session->getstrNombrePaginaNavegacionHaciaFKDesde()==kardex_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='kardex';
			}
			
			$factura_lote_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}						
			
			$this->factura_lotesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->factura_lotesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->factura_lotesAuxiliar=array();
			}
			
			if(count($this->factura_lotesAuxiliar) > 0) {
				
				foreach ($this->factura_lotesAuxiliar as $factura_loteSeleccionado) {
					$this->eliminarTablaBase($factura_loteSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('factura_lote_detalle');
			$tipoRelacionReporte->setsDescripcion('Factura Lote Detalles');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('factura_modelo');
			$tipoRelacionReporte->setsDescripcion('Facturas Modeloses');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=factura_lote_detalle_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=factura_modelo_util::$STR_NOMBRE_CLASE;
		
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


	public function getvendedorsFKListSelectItem() 
	{
		$vendedorsList=array();

		$item=null;

		foreach($this->vendedorsFK as $vendedor)
		{
			$item=new SelectItem();
			$item->setLabel($vendedor->getnombre());
			$item->setValue($vendedor->getId());
			$vendedorsList[]=$item;
		}

		return $vendedorsList;
	}


	public function gettermino_pagosFKListSelectItem() 
	{
		$termino_pagosList=array();

		$item=null;

		foreach($this->termino_pagosFK as $termino_pago)
		{
			$item=new SelectItem();
			$item->setLabel($termino_pago->getdescripcion());
			$item->setValue($termino_pago->getId());
			$termino_pagosList[]=$item;
		}

		return $termino_pagosList;
	}


	public function getmonedasFKListSelectItem() 
	{
		$monedasList=array();

		$item=null;

		foreach($this->monedasFK as $moneda)
		{
			$item=new SelectItem();
			$item->setLabel($moneda->getcodigo());
			$item->setValue($moneda->getId());
			$monedasList[]=$item;
		}

		return $monedasList;
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


	public function getdocumento_cuenta_cobrarsFKListSelectItem() 
	{
		$documento_cuenta_cobrarsList=array();

		$item=null;

		foreach($this->documento_cuenta_cobrarsFK as $documento_cuenta_cobrar)
		{
			$item=new SelectItem();
			$item->setLabel($documento_cuenta_cobrar>getId());
			$item->setValue($documento_cuenta_cobrar->getId());
			$documento_cuenta_cobrarsList[]=$item;
		}

		return $documento_cuenta_cobrarsList;
	}


	public function getkardexsFKListSelectItem() 
	{
		$kardexsList=array();

		$item=null;

		foreach($this->kardexsFK as $kardex)
		{
			$item=new SelectItem();
			$item->setLabel($kardex>getId());
			$item->setValue($kardex->getId());
			$kardexsList[]=$item;
		}

		return $kardexsList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
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
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$factura_lotesNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->factura_lotes as $factura_loteLocal) {
				if($factura_loteLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->factura_lote=new factura_lote();
				
				$this->factura_lote->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->factura_lotes[]=$this->factura_lote;*/
				
				$factura_lotesNuevos[]=$this->factura_lote;
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
				$class=new Classe('cliente');$classes[]=$class;
				$class=new Classe('vendedor');$classes[]=$class;
				$class=new Classe('termino_pago');$classes[]=$class;
				$class=new Classe('moneda');$classes[]=$class;
				$class=new Classe('estado');$classes[]=$class;
				$class=new Classe('asiento');$classes[]=$class;
				$class=new Classe('documento_cuenta_cobrar');$classes[]=$class;
				$class=new Classe('kardex');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->setfactura_lotes($factura_lotesNuevos);
					
				$this->factura_loteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($factura_lotesNuevos as $factura_loteNuevo) {
					$this->factura_lotes[]=$factura_loteNuevo;
				}
				
				/*$this->factura_lotes[]=$factura_lotesNuevos;*/
				
				$this->factura_loteLogic->setfactura_lotes($this->factura_lotes);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($factura_lotesNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($factura_lote_session->bigidempresaActual!=null && $factura_lote_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($factura_lote_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=factura_lote_util::getempresaDescripcion($empresaLogic->getempresa());
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

		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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


			if($factura_lote_session->bigidsucursalActual!=null && $factura_lote_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($factura_lote_session->bigidsucursalActual);//WithConnection

				$this->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=factura_lote_util::getsucursalDescripcion($sucursalLogic->getsucursal());
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

		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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


			if($factura_lote_session->bigidejercicioActual!=null && $factura_lote_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($factura_lote_session->bigidejercicioActual);//WithConnection

				$this->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=factura_lote_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
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

		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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


			if($factura_lote_session->bigidperiodoActual!=null && $factura_lote_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($factura_lote_session->bigidperiodoActual);//WithConnection

				$this->periodosFK[$periodoLogic->getperiodo()->getId()]=factura_lote_util::getperiodoDescripcion($periodoLogic->getperiodo());
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

		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesionusuario!=true) {
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


			if($factura_lote_session->bigidusuarioActual!=null && $factura_lote_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($factura_lote_session->bigidusuarioActual);//WithConnection

				$this->usuariosFK[$usuarioLogic->getusuario()->getId()]=factura_lote_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$this->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
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

		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesioncliente!=true) {
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


			if($factura_lote_session->bigidclienteActual!=null && $factura_lote_session->bigidclienteActual > 0) {
				$clienteLogic->getEntity($factura_lote_session->bigidclienteActual);//WithConnection

				$this->clientesFK[$clienteLogic->getcliente()->getId()]=factura_lote_util::getclienteDescripcion($clienteLogic->getcliente());
				$this->idclienteDefaultFK=$clienteLogic->getcliente()->getId();
			}
		}
	}

	public function cargarCombosvendedorsFK($connexion=null,$strRecargarFkQuery=''){
		$vendedorLogic= new vendedor_logic();
		$pagination= new Pagination();
		$this->vendedorsFK=array();

		$vendedorLogic->setConnexion($connexion);
		$vendedorLogic->getvendedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesionvendedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=vendedor_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalvendedor=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalvendedor=Funciones::GetFinalQueryAppend($finalQueryGlobalvendedor, '');
				$finalQueryGlobalvendedor.=vendedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalvendedor.$strRecargarFkQuery;		

				$vendedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosvendedorsFK($vendedorLogic->getvendedors());

		} else {
			$this->setVisibleBusquedasParavendedor(true);


			if($factura_lote_session->bigidvendedorActual!=null && $factura_lote_session->bigidvendedorActual > 0) {
				$vendedorLogic->getEntity($factura_lote_session->bigidvendedorActual);//WithConnection

				$this->vendedorsFK[$vendedorLogic->getvendedor()->getId()]=factura_lote_util::getvendedorDescripcion($vendedorLogic->getvendedor());
				$this->idvendedorDefaultFK=$vendedorLogic->getvendedor()->getId();
			}
		}
	}

	public function cargarCombostermino_pagosFK($connexion=null,$strRecargarFkQuery=''){
		$termino_pago_clienteLogic= new termino_pago_cliente_logic();
		$pagination= new Pagination();
		$this->termino_pagosFK=array();

		$termino_pago_clienteLogic->setConnexion($connexion);
		$termino_pago_clienteLogic->gettermino_pago_clienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesiontermino_pago!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=termino_pago_cliente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltermino_pago_cliente=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltermino_pago_cliente=Funciones::GetFinalQueryAppend($finalQueryGlobaltermino_pago_cliente, '');
				$finalQueryGlobaltermino_pago_cliente.=termino_pago_cliente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltermino_pago_cliente.$strRecargarFkQuery;		

				$termino_pago_clienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostermino_pagosFK($termino_pago_clienteLogic->gettermino_pago_clientes());

		} else {
			$this->setVisibleBusquedasParatermino_pago_clienteid_termino_pago(true);


			if($factura_lote_session->bigidtermino_pago_clienteid_termino_pagoActual!=null && $factura_lote_session->bigidtermino_pago_clienteid_termino_pagoActual > 0) {
				$termino_pago_clienteLogic->getEntity($factura_lote_session->bigidtermino_pago_clienteid_termino_pagoActual);//WithConnection

				$this->termino_pagosFK[$termino_pago_clienteLogic->gettermino_pago_cliente()->getId()]=factura_lote_util::gettermino_pagoDescripcion($termino_pago_clienteLogic->gettermino_pago_cliente());
				$this->idtermino_pagoDefaultFK=$termino_pago_clienteLogic->gettermino_pago_cliente()->getId();
			}
		}
	}

	public function cargarCombosmonedasFK($connexion=null,$strRecargarFkQuery=''){
		$monedaLogic= new moneda_logic();
		$pagination= new Pagination();
		$this->monedasFK=array();

		$monedaLogic->setConnexion($connexion);
		$monedaLogic->getmonedaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesionmoneda!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=moneda_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalmoneda=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalmoneda=Funciones::GetFinalQueryAppend($finalQueryGlobalmoneda, '');
				$finalQueryGlobalmoneda.=moneda_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalmoneda.$strRecargarFkQuery;		

				$monedaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosmonedasFK($monedaLogic->getmonedas());

		} else {
			$this->setVisibleBusquedasParamoneda(true);


			if($factura_lote_session->bigidmonedaActual!=null && $factura_lote_session->bigidmonedaActual > 0) {
				$monedaLogic->getEntity($factura_lote_session->bigidmonedaActual);//WithConnection

				$this->monedasFK[$monedaLogic->getmoneda()->getId()]=factura_lote_util::getmonedaDescripcion($monedaLogic->getmoneda());
				$this->idmonedaDefaultFK=$monedaLogic->getmoneda()->getId();
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

		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesionestado!=true) {
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


			if($factura_lote_session->bigidestadoActual!=null && $factura_lote_session->bigidestadoActual > 0) {
				$estadoLogic->getEntity($factura_lote_session->bigidestadoActual);//WithConnection

				$this->estadosFK[$estadoLogic->getestado()->getId()]=factura_lote_util::getestadoDescripcion($estadoLogic->getestado());
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

		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesionasiento!=true) {
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


			if($factura_lote_session->bigidasientoActual!=null && $factura_lote_session->bigidasientoActual > 0) {
				$asientoLogic->getEntity($factura_lote_session->bigidasientoActual);//WithConnection

				$this->asientosFK[$asientoLogic->getasiento()->getId()]=factura_lote_util::getasientoDescripcion($asientoLogic->getasiento());
				$this->idasientoDefaultFK=$asientoLogic->getasiento()->getId();
			}
		}
	}

	public function cargarCombosdocumento_cuenta_cobrarsFK($connexion=null,$strRecargarFkQuery=''){
		$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic();
		$pagination= new Pagination();
		$this->documento_cuenta_cobrarsFK=array();

		$documento_cuenta_cobrarLogic->setConnexion($connexion);
		$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesiondocumento_cuenta_cobrar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=documento_cuenta_cobrar_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaldocumento_cuenta_cobrar=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaldocumento_cuenta_cobrar=Funciones::GetFinalQueryAppend($finalQueryGlobaldocumento_cuenta_cobrar, '');
				$finalQueryGlobaldocumento_cuenta_cobrar.=documento_cuenta_cobrar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaldocumento_cuenta_cobrar.$strRecargarFkQuery;		

				$documento_cuenta_cobrarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosdocumento_cuenta_cobrarsFK($documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars());

		} else {
			$this->setVisibleBusquedasParadocumento_cuenta_cobrar(true);


			if($factura_lote_session->bigiddocumento_cuenta_cobrarActual!=null && $factura_lote_session->bigiddocumento_cuenta_cobrarActual > 0) {
				$documento_cuenta_cobrarLogic->getEntity($factura_lote_session->bigiddocumento_cuenta_cobrarActual);//WithConnection

				$this->documento_cuenta_cobrarsFK[$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getId()]=factura_lote_util::getdocumento_cuenta_cobrarDescripcion($documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar());
				$this->iddocumento_cuenta_cobrarDefaultFK=$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getId();
			}
		}
	}

	public function cargarComboskardexsFK($connexion=null,$strRecargarFkQuery=''){
		$kardexLogic= new kardex_logic();
		$pagination= new Pagination();
		$this->kardexsFK=array();

		$kardexLogic->setConnexion($connexion);
		$kardexLogic->getkardexDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->bitBusquedaDesdeFKSesionkardex!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=kardex_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalkardex=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalkardex=Funciones::GetFinalQueryAppend($finalQueryGlobalkardex, '');
				$finalQueryGlobalkardex.=kardex_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalkardex.$strRecargarFkQuery;		

				$kardexLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboskardexsFK($kardexLogic->getkardexs());

		} else {
			$this->setVisibleBusquedasParakardex(true);


			if($factura_lote_session->bigidkardexActual!=null && $factura_lote_session->bigidkardexActual > 0) {
				$kardexLogic->getEntity($factura_lote_session->bigidkardexActual);//WithConnection

				$this->kardexsFK[$kardexLogic->getkardex()->getId()]=factura_lote_util::getkardexDescripcion($kardexLogic->getkardex());
				$this->idkardexDefaultFK=$kardexLogic->getkardex()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=factura_lote_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombossucursalsFK($sucursals){

		foreach ($sucursals as $sucursalLocal ) {
			if($this->idsucursalDefaultFK==0) {
				$this->idsucursalDefaultFK=$sucursalLocal->getId();
			}

			$this->sucursalsFK[$sucursalLocal->getId()]=factura_lote_util::getsucursalDescripcion($sucursalLocal);
		}
	}

	public function prepararCombosejerciciosFK($ejercicios){

		foreach ($ejercicios as $ejercicioLocal ) {
			if($this->idejercicioDefaultFK==0) {
				$this->idejercicioDefaultFK=$ejercicioLocal->getId();
			}

			$this->ejerciciosFK[$ejercicioLocal->getId()]=factura_lote_util::getejercicioDescripcion($ejercicioLocal);
		}
	}

	public function prepararCombosperiodosFK($periodos){

		foreach ($periodos as $periodoLocal ) {
			if($this->idperiodoDefaultFK==0) {
				$this->idperiodoDefaultFK=$periodoLocal->getId();
			}

			$this->periodosFK[$periodoLocal->getId()]=factura_lote_util::getperiodoDescripcion($periodoLocal);
		}
	}

	public function prepararCombosusuariosFK($usuarios){

		foreach ($usuarios as $usuarioLocal ) {
			if($this->idusuarioDefaultFK==0) {
				$this->idusuarioDefaultFK=$usuarioLocal->getId();
			}

			$this->usuariosFK[$usuarioLocal->getId()]=factura_lote_util::getusuarioDescripcion($usuarioLocal);
		}
	}

	public function prepararCombosclientesFK($clientes){

		foreach ($clientes as $clienteLocal ) {
			if($this->idclienteDefaultFK==0) {
				$this->idclienteDefaultFK=$clienteLocal->getId();
			}

			$this->clientesFK[$clienteLocal->getId()]=factura_lote_util::getclienteDescripcion($clienteLocal);
		}
	}

	public function prepararCombosvendedorsFK($vendedors){

		foreach ($vendedors as $vendedorLocal ) {
			if($this->idvendedorDefaultFK==0) {
				$this->idvendedorDefaultFK=$vendedorLocal->getId();
			}

			$this->vendedorsFK[$vendedorLocal->getId()]=factura_lote_util::getvendedorDescripcion($vendedorLocal);
		}
	}

	public function prepararCombostermino_pagosFK($termino_pago_clientes){

		foreach ($termino_pago_clientes as $termino_pago_clienteLocal ) {
			if($this->idtermino_pagoDefaultFK==0) {
				$this->idtermino_pagoDefaultFK=$termino_pago_clienteLocal->getId();
			}

			$this->termino_pagosFK[$termino_pago_clienteLocal->getId()]=factura_lote_util::gettermino_pagoDescripcion($termino_pago_clienteLocal);
		}
	}

	public function prepararCombosmonedasFK($monedas){

		foreach ($monedas as $monedaLocal ) {
			if($this->idmonedaDefaultFK==0) {
				$this->idmonedaDefaultFK=$monedaLocal->getId();
			}

			$this->monedasFK[$monedaLocal->getId()]=factura_lote_util::getmonedaDescripcion($monedaLocal);
		}
	}

	public function prepararCombosestadosFK($estados){

		foreach ($estados as $estadoLocal ) {
			if($this->idestadoDefaultFK==0) {
				$this->idestadoDefaultFK=$estadoLocal->getId();
			}

			$this->estadosFK[$estadoLocal->getId()]=factura_lote_util::getestadoDescripcion($estadoLocal);
		}
	}

	public function prepararCombosasientosFK($asientos){

		foreach ($asientos as $asientoLocal ) {
			if($this->idasientoDefaultFK==0) {
				$this->idasientoDefaultFK=$asientoLocal->getId();
			}

			$this->asientosFK[$asientoLocal->getId()]=factura_lote_util::getasientoDescripcion($asientoLocal);
		}
	}

	public function prepararCombosdocumento_cuenta_cobrarsFK($documento_cuenta_cobrars){

		foreach ($documento_cuenta_cobrars as $documento_cuenta_cobrarLocal ) {
			if($this->iddocumento_cuenta_cobrarDefaultFK==0) {
				$this->iddocumento_cuenta_cobrarDefaultFK=$documento_cuenta_cobrarLocal->getId();
			}

			$this->documento_cuenta_cobrarsFK[$documento_cuenta_cobrarLocal->getId()]=factura_lote_util::getdocumento_cuenta_cobrarDescripcion($documento_cuenta_cobrarLocal);
		}
	}

	public function prepararComboskardexsFK($kardexs){

		foreach ($kardexs as $kardexLocal ) {
			if($this->idkardexDefaultFK==0) {
				$this->idkardexDefaultFK=$kardexLocal->getId();
			}

			$this->kardexsFK[$kardexLocal->getId()]=factura_lote_util::getkardexDescripcion($kardexLocal);
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

			$strDescripcionempresa=factura_lote_util::getempresaDescripcion($empresaLogic->getempresa());

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

			$strDescripcionsucursal=factura_lote_util::getsucursalDescripcion($sucursalLogic->getsucursal());

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

			$strDescripcionejercicio=factura_lote_util::getejercicioDescripcion($ejercicioLogic->getejercicio());

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

			$strDescripcionperiodo=factura_lote_util::getperiodoDescripcion($periodoLogic->getperiodo());

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

			$strDescripcionusuario=factura_lote_util::getusuarioDescripcion($usuarioLogic->getusuario());

		} else {
			$strDescripcionusuario='null';
		}

		return $strDescripcionusuario;
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

			$strDescripcioncliente=factura_lote_util::getclienteDescripcion($clienteLogic->getcliente());

		} else {
			$strDescripcioncliente='null';
		}

		return $strDescripcioncliente;
	}

	public function cargarDescripcionvendedorFK($idvendedor,$connexion=null){
		$vendedorLogic= new vendedor_logic();
		$vendedorLogic->setConnexion($connexion);
		$vendedorLogic->getvendedorDataAccess()->isForFKData=true;
		$strDescripcionvendedor='';

		if($idvendedor!=null && $idvendedor!='' && $idvendedor!='null') {
			if($connexion!=null) {
				$vendedorLogic->getEntity($idvendedor);//WithConnection
			} else {
				$vendedorLogic->getEntityWithConnection($idvendedor);//
			}

			$strDescripcionvendedor=factura_lote_util::getvendedorDescripcion($vendedorLogic->getvendedor());

		} else {
			$strDescripcionvendedor='null';
		}

		return $strDescripcionvendedor;
	}

	public function cargarDescripciontermino_pagoFK($idtermino_pago_cliente,$connexion=null){
		$termino_pago_clienteLogic= new termino_pago_cliente_logic();
		$termino_pago_clienteLogic->setConnexion($connexion);
		$termino_pago_clienteLogic->gettermino_pago_clienteDataAccess()->isForFKData=true;
		$strDescripciontermino_pago_cliente='';

		if($idtermino_pago_cliente!=null && $idtermino_pago_cliente!='' && $idtermino_pago_cliente!='null') {
			if($connexion!=null) {
				$termino_pago_clienteLogic->getEntity($idtermino_pago_cliente);//WithConnection
			} else {
				$termino_pago_clienteLogic->getEntityWithConnection($idtermino_pago_cliente);//
			}

			$strDescripciontermino_pago_cliente=factura_lote_util::gettermino_pagoDescripcion($termino_pago_clienteLogic->gettermino_pago_cliente());

		} else {
			$strDescripciontermino_pago_cliente='null';
		}

		return $strDescripciontermino_pago_cliente;
	}

	public function cargarDescripcionmonedaFK($idmoneda,$connexion=null){
		$monedaLogic= new moneda_logic();
		$monedaLogic->setConnexion($connexion);
		$monedaLogic->getmonedaDataAccess()->isForFKData=true;
		$strDescripcionmoneda='';

		if($idmoneda!=null && $idmoneda!='' && $idmoneda!='null') {
			if($connexion!=null) {
				$monedaLogic->getEntity($idmoneda);//WithConnection
			} else {
				$monedaLogic->getEntityWithConnection($idmoneda);//
			}

			$strDescripcionmoneda=factura_lote_util::getmonedaDescripcion($monedaLogic->getmoneda());

		} else {
			$strDescripcionmoneda='null';
		}

		return $strDescripcionmoneda;
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

			$strDescripcionestado=factura_lote_util::getestadoDescripcion($estadoLogic->getestado());

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

			$strDescripcionasiento=factura_lote_util::getasientoDescripcion($asientoLogic->getasiento());

		} else {
			$strDescripcionasiento='null';
		}

		return $strDescripcionasiento;
	}

	public function cargarDescripciondocumento_cuenta_cobrarFK($iddocumento_cuenta_cobrar,$connexion=null){
		$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic();
		$documento_cuenta_cobrarLogic->setConnexion($connexion);
		$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrarDataAccess()->isForFKData=true;
		$strDescripciondocumento_cuenta_cobrar='';

		if($iddocumento_cuenta_cobrar!=null && $iddocumento_cuenta_cobrar!='' && $iddocumento_cuenta_cobrar!='null') {
			if($connexion!=null) {
				$documento_cuenta_cobrarLogic->getEntity($iddocumento_cuenta_cobrar);//WithConnection
			} else {
				$documento_cuenta_cobrarLogic->getEntityWithConnection($iddocumento_cuenta_cobrar);//
			}

			$strDescripciondocumento_cuenta_cobrar=factura_lote_util::getdocumento_cuenta_cobrarDescripcion($documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar());

		} else {
			$strDescripciondocumento_cuenta_cobrar='null';
		}

		return $strDescripciondocumento_cuenta_cobrar;
	}

	public function cargarDescripcionkardexFK($idkardex,$connexion=null){
		$kardexLogic= new kardex_logic();
		$kardexLogic->setConnexion($connexion);
		$kardexLogic->getkardexDataAccess()->isForFKData=true;
		$strDescripcionkardex='';

		if($idkardex!=null && $idkardex!='' && $idkardex!='null') {
			if($connexion!=null) {
				$kardexLogic->getEntity($idkardex);//WithConnection
			} else {
				$kardexLogic->getEntityWithConnection($idkardex);//
			}

			$strDescripcionkardex=factura_lote_util::getkardexDescripcion($kardexLogic->getkardex());

		} else {
			$strDescripcionkardex='null';
		}

		return $strDescripcionkardex;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(factura_lote $factura_loteClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$factura_loteClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
				$factura_loteClase->setid_sucursal($this->parametroGeneralUsuarioActual->getid_sucursal());
				$factura_loteClase->setid_ejercicio($this->parametroGeneralUsuarioActual->getid_ejercicio());
				$factura_loteClase->setid_periodo($this->parametroGeneralUsuarioActual->getid_periodo());
				$factura_loteClase->setid_usuario($this->usuarioActual->getId());
			
			
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
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idkardex=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionempresa;
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

		$this->strVisibleFK_Idasiento=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idkardex=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idsucursal=$strParaVisiblesucursal;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionsucursal;
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
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idejercicio=$strParaVisibleejercicio;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idkardex=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionejercicio;
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
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idkardex=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idperiodo=$strParaVisibleperiodo;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionperiodo;
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
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idkardex=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idusuario=$strParaVisibleusuario;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionusuario;
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
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idkardex=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacioncliente;
	}

	public function setVisibleBusquedasParavendedor($isParavendedor){
		$strParaVisiblevendedor='display:table-row';
		$strParaVisibleNegacionvendedor='display:none';

		if($isParavendedor) {
			$strParaVisiblevendedor='display:table-row';
			$strParaVisibleNegacionvendedor='display:none';
		} else {
			$strParaVisiblevendedor='display:none';
			$strParaVisibleNegacionvendedor='display:table-row';
		}


		$strParaVisibleNegacionvendedor=trim($strParaVisibleNegacionvendedor);

		$this->strVisibleFK_Idasiento=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idkardex=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idvendedor=$strParaVisiblevendedor;
	}

	public function setVisibleBusquedasParatermino_pago($isParatermino_pago){
		$strParaVisibletermino_pago='display:table-row';
		$strParaVisibleNegaciontermino_pago='display:none';

		if($isParatermino_pago) {
			$strParaVisibletermino_pago='display:table-row';
			$strParaVisibleNegaciontermino_pago='display:none';
		} else {
			$strParaVisibletermino_pago='display:none';
			$strParaVisibleNegaciontermino_pago='display:table-row';
		}


		$strParaVisibleNegaciontermino_pago=trim($strParaVisibleNegaciontermino_pago);

		$this->strVisibleFK_Idasiento=$strParaVisibleNegaciontermino_pago;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegaciontermino_pago;
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegaciontermino_pago;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegaciontermino_pago;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontermino_pago;
		$this->strVisibleFK_Idestado=$strParaVisibleNegaciontermino_pago;
		$this->strVisibleFK_Idkardex=$strParaVisibleNegaciontermino_pago;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegaciontermino_pago;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegaciontermino_pago;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegaciontermino_pago;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibletermino_pago;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegaciontermino_pago;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegaciontermino_pago;
	}

	public function setVisibleBusquedasParamoneda($isParamoneda){
		$strParaVisiblemoneda='display:table-row';
		$strParaVisibleNegacionmoneda='display:none';

		if($isParamoneda) {
			$strParaVisiblemoneda='display:table-row';
			$strParaVisibleNegacionmoneda='display:none';
		} else {
			$strParaVisiblemoneda='display:none';
			$strParaVisibleNegacionmoneda='display:table-row';
		}


		$strParaVisibleNegacionmoneda=trim($strParaVisibleNegacionmoneda);

		$this->strVisibleFK_Idasiento=$strParaVisibleNegacionmoneda;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionmoneda;
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegacionmoneda;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionmoneda;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionmoneda;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionmoneda;
		$this->strVisibleFK_Idkardex=$strParaVisibleNegacionmoneda;
		$this->strVisibleFK_Idmoneda=$strParaVisiblemoneda;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionmoneda;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionmoneda;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacionmoneda;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionmoneda;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionmoneda;
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
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idestado=$strParaVisibleestado;
		$this->strVisibleFK_Idkardex=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionestado;
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
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegacionasiento;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionasiento;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionasiento;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionasiento;
		$this->strVisibleFK_Idkardex=$strParaVisibleNegacionasiento;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegacionasiento;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionasiento;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionasiento;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacionasiento;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionasiento;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionasiento;
	}

	public function setVisibleBusquedasParadocumento_cuenta_cobrar($isParadocumento_cuenta_cobrar){
		$strParaVisibledocumento_cuenta_cobrar='display:table-row';
		$strParaVisibleNegaciondocumento_cuenta_cobrar='display:none';

		if($isParadocumento_cuenta_cobrar) {
			$strParaVisibledocumento_cuenta_cobrar='display:table-row';
			$strParaVisibleNegaciondocumento_cuenta_cobrar='display:none';
		} else {
			$strParaVisibledocumento_cuenta_cobrar='display:none';
			$strParaVisibleNegaciondocumento_cuenta_cobrar='display:table-row';
		}


		$strParaVisibleNegaciondocumento_cuenta_cobrar=trim($strParaVisibleNegaciondocumento_cuenta_cobrar);

		$this->strVisibleFK_Idasiento=$strParaVisibleNegaciondocumento_cuenta_cobrar;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegaciondocumento_cuenta_cobrar;
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibledocumento_cuenta_cobrar;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegaciondocumento_cuenta_cobrar;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciondocumento_cuenta_cobrar;
		$this->strVisibleFK_Idestado=$strParaVisibleNegaciondocumento_cuenta_cobrar;
		$this->strVisibleFK_Idkardex=$strParaVisibleNegaciondocumento_cuenta_cobrar;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegaciondocumento_cuenta_cobrar;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegaciondocumento_cuenta_cobrar;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegaciondocumento_cuenta_cobrar;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegaciondocumento_cuenta_cobrar;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegaciondocumento_cuenta_cobrar;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegaciondocumento_cuenta_cobrar;
	}

	public function setVisibleBusquedasParakardex($isParakardex){
		$strParaVisiblekardex='display:table-row';
		$strParaVisibleNegacionkardex='display:none';

		if($isParakardex) {
			$strParaVisiblekardex='display:table-row';
			$strParaVisibleNegacionkardex='display:none';
		} else {
			$strParaVisiblekardex='display:none';
			$strParaVisibleNegacionkardex='display:table-row';
		}


		$strParaVisibleNegacionkardex=trim($strParaVisibleNegacionkardex);

		$this->strVisibleFK_Idasiento=$strParaVisibleNegacionkardex;
		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionkardex;
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibleNegacionkardex;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionkardex;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionkardex;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionkardex;
		$this->strVisibleFK_Idkardex=$strParaVisiblekardex;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegacionkardex;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionkardex;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionkardex;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacionkardex;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionkardex;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionkardex;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idfactura_loteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idfactura_loteActual=$idfactura_loteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarfactura_lote,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParasucursal() {//$idfactura_loteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idfactura_loteActual=$idfactura_loteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.sucursal_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',sucursal_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(sucursal_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarfactura_lote,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaejercicio() {//$idfactura_loteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idfactura_loteActual=$idfactura_loteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.ejercicio_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',ejercicio_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ejercicio_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarfactura_lote,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaperiodo() {//$idfactura_loteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idfactura_loteActual=$idfactura_loteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.periodo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',periodo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(periodo_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarfactura_lote,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParausuario() {//$idfactura_loteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idfactura_loteActual=$idfactura_loteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.usuario_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarfactura_lote,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacliente() {//$idfactura_loteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idfactura_loteActual=$idfactura_loteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cliente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cliente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cliente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cliente_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarfactura_lote,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParavendedor() {//$idfactura_loteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idfactura_loteActual=$idfactura_loteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.vendedor_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_vendedor(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',vendedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_vendedor(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(vendedor_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarfactura_lote,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatermino_pago() {//$idfactura_loteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idfactura_loteActual=$idfactura_loteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.termino_pago_cliente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_termino_pago(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',termino_pago_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_termino_pago(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(termino_pago_cliente_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarfactura_lote,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParamoneda() {//$idfactura_loteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idfactura_loteActual=$idfactura_loteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.moneda_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_moneda(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',moneda_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_moneda(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(moneda_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarfactura_lote,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaestado() {//$idfactura_loteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idfactura_loteActual=$idfactura_loteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.estado_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',estado_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(estado_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarfactura_lote,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaasiento() {//$idfactura_loteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idfactura_loteActual=$idfactura_loteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.asiento_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_asiento(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',asiento_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_asiento(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarfactura_lote,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParadocumento_cuenta_cobrar() {//$idfactura_loteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idfactura_loteActual=$idfactura_loteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_documento_cuenta_cobrar(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',documento_cuenta_cobrar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_documento_cuenta_cobrar(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(documento_cuenta_cobrar_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarfactura_lote,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParakardex() {//$idfactura_loteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idfactura_loteActual=$idfactura_loteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.kardex_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_kardex(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',kardex_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.factura_loteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_kardex(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(kardex_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarfactura_lote,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParafactura_lote_detalles(int $idfactura_loteActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idfactura_loteActual=$idfactura_loteActual;

		$bitPaginaPopupfactura_lote_detalle=false;

		try {

			$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

			if($factura_lote_session==null) {
				$factura_lote_session=new factura_lote_session();
			}

			$factura_lote_detalle_session=unserialize($this->Session->read(factura_lote_detalle_util::$STR_SESSION_NAME));

			if($factura_lote_detalle_session==null) {
				$factura_lote_detalle_session=new factura_lote_detalle_session();
			}

			$factura_lote_detalle_session->strUltimaBusqueda='FK_Idfactura_lote';
			$factura_lote_detalle_session->strPathNavegacionActual=$factura_lote_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.factura_lote_detalle_util::$STR_CLASS_WEB_TITULO;
			$factura_lote_detalle_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupfactura_lote_detalle=$factura_lote_detalle_session->bitPaginaPopup;
			$factura_lote_detalle_session->setPaginaPopupVariables(true);
			$bitPaginaPopupfactura_lote_detalle=$factura_lote_detalle_session->bitPaginaPopup;
			$factura_lote_detalle_session->bitPermiteNavegacionHaciaFKDesde=false;
			$factura_lote_detalle_session->strNombrePaginaNavegacionHaciaFKDesde=factura_lote_util::$STR_NOMBRE_OPCION;
			$factura_lote_detalle_session->bitBusquedaDesdeFKSesionfactura_lote=true;
			$factura_lote_detalle_session->bigidfactura_loteActual=$this->idfactura_loteActual;

			$factura_lote_session->bitBusquedaDesdeFKSesionFK=true;
			$factura_lote_session->bigIdActualFK=$this->idfactura_loteActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"factura_lote_detalle"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=factura_lote_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"factura_lote_detalle"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(factura_lote_util::$STR_SESSION_NAME,serialize($factura_lote_session));
			$this->Session->write(factura_lote_detalle_util::$STR_SESSION_NAME,serialize($factura_lote_detalle_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupfactura_lote_detalle!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',factura_lote_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(factura_lote_detalle_util::$STR_CLASS_NAME,'facturacion','','POPUP',$this->strTipoPaginaAuxiliarfactura_lote,$this->strTipoUsuarioAuxiliarfactura_lote,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',factura_lote_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(factura_lote_detalle_util::$STR_CLASS_NAME,'facturacion','','NO-POPUP',$this->strTipoPaginaAuxiliarfactura_lote,$this->strTipoUsuarioAuxiliarfactura_lote,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParafactura_modeloes(int $idfactura_loteActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idfactura_loteActual=$idfactura_loteActual;

		$bitPaginaPopupfactura_modelo=false;

		try {

			$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

			if($factura_lote_session==null) {
				$factura_lote_session=new factura_lote_session();
			}

			$factura_modelo_session=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME));

			if($factura_modelo_session==null) {
				$factura_modelo_session=new factura_modelo_session();
			}

			$factura_modelo_session->strUltimaBusqueda='FK_Idfactura_lote';
			$factura_modelo_session->strPathNavegacionActual=$factura_lote_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.factura_modelo_util::$STR_CLASS_WEB_TITULO;
			$factura_modelo_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupfactura_modelo=$factura_modelo_session->bitPaginaPopup;
			$factura_modelo_session->setPaginaPopupVariables(true);
			$bitPaginaPopupfactura_modelo=$factura_modelo_session->bitPaginaPopup;
			$factura_modelo_session->bitPermiteNavegacionHaciaFKDesde=false;
			$factura_modelo_session->strNombrePaginaNavegacionHaciaFKDesde=factura_lote_util::$STR_NOMBRE_OPCION;
			$factura_modelo_session->bitBusquedaDesdeFKSesionfactura_lote=true;
			$factura_modelo_session->bigidfactura_loteActual=$this->idfactura_loteActual;

			$factura_lote_session->bitBusquedaDesdeFKSesionFK=true;
			$factura_lote_session->bigIdActualFK=$this->idfactura_loteActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"factura_modelo"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=factura_lote_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"factura_modelo"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(factura_lote_util::$STR_SESSION_NAME,serialize($factura_lote_session));
			$this->Session->write(factura_modelo_util::$STR_SESSION_NAME,serialize($factura_modelo_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupfactura_modelo!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',factura_modelo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(factura_modelo_util::$STR_CLASS_NAME,'facturacion','','POPUP',$this->strTipoPaginaAuxiliarfactura_lote,$this->strTipoUsuarioAuxiliarfactura_lote,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',factura_modelo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(factura_modelo_util::$STR_CLASS_NAME,'facturacion','','NO-POPUP',$this->strTipoPaginaAuxiliarfactura_lote,$this->strTipoUsuarioAuxiliarfactura_lote,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(factura_lote_util::$STR_SESSION_NAME,factura_lote_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$factura_lote_session=$this->Session->read(factura_lote_util::$STR_SESSION_NAME);
				
		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();		
			//$this->Session->write('factura_lote_session',$factura_lote_session);							
		}
		*/
		
		$factura_lote_session=new factura_lote_session();
    	$factura_lote_session->strPathNavegacionActual=factura_lote_util::$STR_CLASS_WEB_TITULO;
    	$factura_lote_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(factura_lote_util::$STR_SESSION_NAME,serialize($factura_lote_session));		
	}	
	
	public function getSetBusquedasSesionConfig(factura_lote_session $factura_lote_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($factura_lote_session->bitBusquedaDesdeFKSesionFK!=null && $factura_lote_session->bitBusquedaDesdeFKSesionFK==true) {
			if($factura_lote_session->bigIdActualFK!=null && $factura_lote_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$factura_lote_session->bigIdActualFKParaPosibleAtras=$factura_lote_session->bigIdActualFK;*/
			}
				
			$factura_lote_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$factura_lote_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(factura_lote_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($factura_lote_session->bitBusquedaDesdeFKSesionempresa!=null && $factura_lote_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($factura_lote_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(factura_lote_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(factura_lote_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(factura_lote_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($factura_lote_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($factura_lote_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=factura_lote_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$factura_lote_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$factura_lote_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;

				if($factura_lote_session->intNumeroPaginacion==factura_lote_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$factura_lote_session->intNumeroPaginacion;
				}
			}
			else if($factura_lote_session->bitBusquedaDesdeFKSesionsucursal!=null && $factura_lote_session->bitBusquedaDesdeFKSesionsucursal==true)
			{
				if($factura_lote_session->bigidsucursalActual!=0) {
					$this->strAccionBusqueda='FK_Idsucursal';

					$existe_history=HistoryWeb::ExisteElemento(factura_lote_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(factura_lote_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(factura_lote_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($factura_lote_session->bigidsucursalActualDescripcion);
						$historyWeb->setIdActual($factura_lote_session->bigidsucursalActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=factura_lote_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$factura_lote_session->bigidsucursalActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$factura_lote_session->bitBusquedaDesdeFKSesionsucursal=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;

				if($factura_lote_session->intNumeroPaginacion==factura_lote_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$factura_lote_session->intNumeroPaginacion;
				}
			}
			else if($factura_lote_session->bitBusquedaDesdeFKSesionejercicio!=null && $factura_lote_session->bitBusquedaDesdeFKSesionejercicio==true)
			{
				if($factura_lote_session->bigidejercicioActual!=0) {
					$this->strAccionBusqueda='FK_Idejercicio';

					$existe_history=HistoryWeb::ExisteElemento(factura_lote_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(factura_lote_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(factura_lote_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($factura_lote_session->bigidejercicioActualDescripcion);
						$historyWeb->setIdActual($factura_lote_session->bigidejercicioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=factura_lote_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$factura_lote_session->bigidejercicioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$factura_lote_session->bitBusquedaDesdeFKSesionejercicio=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;

				if($factura_lote_session->intNumeroPaginacion==factura_lote_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$factura_lote_session->intNumeroPaginacion;
				}
			}
			else if($factura_lote_session->bitBusquedaDesdeFKSesionperiodo!=null && $factura_lote_session->bitBusquedaDesdeFKSesionperiodo==true)
			{
				if($factura_lote_session->bigidperiodoActual!=0) {
					$this->strAccionBusqueda='FK_Idperiodo';

					$existe_history=HistoryWeb::ExisteElemento(factura_lote_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(factura_lote_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(factura_lote_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($factura_lote_session->bigidperiodoActualDescripcion);
						$historyWeb->setIdActual($factura_lote_session->bigidperiodoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=factura_lote_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$factura_lote_session->bigidperiodoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$factura_lote_session->bitBusquedaDesdeFKSesionperiodo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;

				if($factura_lote_session->intNumeroPaginacion==factura_lote_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$factura_lote_session->intNumeroPaginacion;
				}
			}
			else if($factura_lote_session->bitBusquedaDesdeFKSesionusuario!=null && $factura_lote_session->bitBusquedaDesdeFKSesionusuario==true)
			{
				if($factura_lote_session->bigidusuarioActual!=0) {
					$this->strAccionBusqueda='FK_Idusuario';

					$existe_history=HistoryWeb::ExisteElemento(factura_lote_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(factura_lote_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(factura_lote_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($factura_lote_session->bigidusuarioActualDescripcion);
						$historyWeb->setIdActual($factura_lote_session->bigidusuarioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=factura_lote_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$factura_lote_session->bigidusuarioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$factura_lote_session->bitBusquedaDesdeFKSesionusuario=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;

				if($factura_lote_session->intNumeroPaginacion==factura_lote_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$factura_lote_session->intNumeroPaginacion;
				}
			}
			else if($factura_lote_session->bitBusquedaDesdeFKSesioncliente!=null && $factura_lote_session->bitBusquedaDesdeFKSesioncliente==true)
			{
				if($factura_lote_session->bigidclienteActual!=0) {
					$this->strAccionBusqueda='FK_Idcliente';

					$existe_history=HistoryWeb::ExisteElemento(factura_lote_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(factura_lote_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(factura_lote_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($factura_lote_session->bigidclienteActualDescripcion);
						$historyWeb->setIdActual($factura_lote_session->bigidclienteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=factura_lote_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$factura_lote_session->bigidclienteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$factura_lote_session->bitBusquedaDesdeFKSesioncliente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;

				if($factura_lote_session->intNumeroPaginacion==factura_lote_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$factura_lote_session->intNumeroPaginacion;
				}
			}
			else if($factura_lote_session->bitBusquedaDesdeFKSesionvendedor!=null && $factura_lote_session->bitBusquedaDesdeFKSesionvendedor==true)
			{
				if($factura_lote_session->bigidvendedorActual!=0) {
					$this->strAccionBusqueda='FK_Idvendedor';

					$existe_history=HistoryWeb::ExisteElemento(factura_lote_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(factura_lote_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(factura_lote_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($factura_lote_session->bigidvendedorActualDescripcion);
						$historyWeb->setIdActual($factura_lote_session->bigidvendedorActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=factura_lote_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$factura_lote_session->bigidvendedorActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$factura_lote_session->bitBusquedaDesdeFKSesionvendedor=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;

				if($factura_lote_session->intNumeroPaginacion==factura_lote_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$factura_lote_session->intNumeroPaginacion;
				}
			}
			else if($factura_lote_session->bitBusquedaDesdeFKSesiontermino_pago!=null && $factura_lote_session->bitBusquedaDesdeFKSesiontermino_pago==true)
			{
				if($factura_lote_session->bigidtermino_pagoActual!=0) {
					$this->strAccionBusqueda='FK_Idtermino_pago';

					$existe_history=HistoryWeb::ExisteElemento(factura_lote_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(factura_lote_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(factura_lote_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($factura_lote_session->bigidtermino_pagoActualDescripcion);
						$historyWeb->setIdActual($factura_lote_session->bigidtermino_pagoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=factura_lote_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$factura_lote_session->bigidtermino_pagoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$factura_lote_session->bitBusquedaDesdeFKSesiontermino_pago=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;

				if($factura_lote_session->intNumeroPaginacion==factura_lote_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$factura_lote_session->intNumeroPaginacion;
				}
			}
			else if($factura_lote_session->bitBusquedaDesdeFKSesionmoneda!=null && $factura_lote_session->bitBusquedaDesdeFKSesionmoneda==true)
			{
				if($factura_lote_session->bigidmonedaActual!=0) {
					$this->strAccionBusqueda='FK_Idmoneda';

					$existe_history=HistoryWeb::ExisteElemento(factura_lote_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(factura_lote_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(factura_lote_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($factura_lote_session->bigidmonedaActualDescripcion);
						$historyWeb->setIdActual($factura_lote_session->bigidmonedaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=factura_lote_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$factura_lote_session->bigidmonedaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$factura_lote_session->bitBusquedaDesdeFKSesionmoneda=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;

				if($factura_lote_session->intNumeroPaginacion==factura_lote_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$factura_lote_session->intNumeroPaginacion;
				}
			}
			else if($factura_lote_session->bitBusquedaDesdeFKSesionestado!=null && $factura_lote_session->bitBusquedaDesdeFKSesionestado==true)
			{
				if($factura_lote_session->bigidestadoActual!=0) {
					$this->strAccionBusqueda='FK_Idestado';

					$existe_history=HistoryWeb::ExisteElemento(factura_lote_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(factura_lote_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(factura_lote_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($factura_lote_session->bigidestadoActualDescripcion);
						$historyWeb->setIdActual($factura_lote_session->bigidestadoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=factura_lote_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$factura_lote_session->bigidestadoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$factura_lote_session->bitBusquedaDesdeFKSesionestado=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;

				if($factura_lote_session->intNumeroPaginacion==factura_lote_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$factura_lote_session->intNumeroPaginacion;
				}
			}
			else if($factura_lote_session->bitBusquedaDesdeFKSesionasiento!=null && $factura_lote_session->bitBusquedaDesdeFKSesionasiento==true)
			{
				if($factura_lote_session->bigidasientoActual!=0) {
					$this->strAccionBusqueda='FK_Idasiento';

					$existe_history=HistoryWeb::ExisteElemento(factura_lote_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(factura_lote_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(factura_lote_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($factura_lote_session->bigidasientoActualDescripcion);
						$historyWeb->setIdActual($factura_lote_session->bigidasientoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=factura_lote_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$factura_lote_session->bigidasientoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$factura_lote_session->bitBusquedaDesdeFKSesionasiento=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;

				if($factura_lote_session->intNumeroPaginacion==factura_lote_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$factura_lote_session->intNumeroPaginacion;
				}
			}
			else if($factura_lote_session->bitBusquedaDesdeFKSesiondocumento_cuenta_cobrar!=null && $factura_lote_session->bitBusquedaDesdeFKSesiondocumento_cuenta_cobrar==true)
			{
				if($factura_lote_session->bigiddocumento_cuenta_cobrarActual!=0) {
					$this->strAccionBusqueda='FK_Iddocumento_cuenta_cobrar';

					$existe_history=HistoryWeb::ExisteElemento(factura_lote_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(factura_lote_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(factura_lote_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($factura_lote_session->bigiddocumento_cuenta_cobrarActualDescripcion);
						$historyWeb->setIdActual($factura_lote_session->bigiddocumento_cuenta_cobrarActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=factura_lote_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$factura_lote_session->bigiddocumento_cuenta_cobrarActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$factura_lote_session->bitBusquedaDesdeFKSesiondocumento_cuenta_cobrar=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;

				if($factura_lote_session->intNumeroPaginacion==factura_lote_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$factura_lote_session->intNumeroPaginacion;
				}
			}
			else if($factura_lote_session->bitBusquedaDesdeFKSesionkardex!=null && $factura_lote_session->bitBusquedaDesdeFKSesionkardex==true)
			{
				if($factura_lote_session->bigidkardexActual!=0) {
					$this->strAccionBusqueda='FK_Idkardex';

					$existe_history=HistoryWeb::ExisteElemento(factura_lote_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(factura_lote_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(factura_lote_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($factura_lote_session->bigidkardexActualDescripcion);
						$historyWeb->setIdActual($factura_lote_session->bigidkardexActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=factura_lote_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$factura_lote_session->bigidkardexActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$factura_lote_session->bitBusquedaDesdeFKSesionkardex=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;

				if($factura_lote_session->intNumeroPaginacion==factura_lote_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=factura_lote_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$factura_lote_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$factura_lote_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));
		
		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		$factura_lote_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$factura_lote_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$factura_lote_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idasiento') {
			$factura_lote_session->id_asiento=$this->id_asientoFK_Idasiento;	

		}
		else if($this->strAccionBusqueda=='FK_Idcliente') {
			$factura_lote_session->id_cliente=$this->id_clienteFK_Idcliente;	

		}
		else if($this->strAccionBusqueda=='FK_Iddocumento_cuenta_cobrar') {
			$factura_lote_session->id_documento_cuenta_cobrar=$this->id_documento_cuenta_cobrarFK_Iddocumento_cuenta_cobrar;	

		}
		else if($this->strAccionBusqueda=='FK_Idejercicio') {
			$factura_lote_session->id_ejercicio=$this->id_ejercicioFK_Idejercicio;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$factura_lote_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idestado') {
			$factura_lote_session->id_estado=$this->id_estadoFK_Idestado;	

		}
		else if($this->strAccionBusqueda=='FK_Idkardex') {
			$factura_lote_session->id_kardex=$this->id_kardexFK_Idkardex;	

		}
		else if($this->strAccionBusqueda=='FK_Idmoneda') {
			$factura_lote_session->id_moneda=$this->id_monedaFK_Idmoneda;	

		}
		else if($this->strAccionBusqueda=='FK_Idperiodo') {
			$factura_lote_session->id_periodo=$this->id_periodoFK_Idperiodo;	

		}
		else if($this->strAccionBusqueda=='FK_Idsucursal') {
			$factura_lote_session->id_sucursal=$this->id_sucursalFK_Idsucursal;	

		}
		else if($this->strAccionBusqueda=='FK_Idtermino_pago') {
			$factura_lote_session->id_termino_pago=$this->id_termino_pagoFK_Idtermino_pago;	

		}
		else if($this->strAccionBusqueda=='FK_Idusuario') {
			$factura_lote_session->id_usuario=$this->id_usuarioFK_Idusuario;	

		}
		else if($this->strAccionBusqueda=='FK_Idvendedor') {
			$factura_lote_session->id_vendedor=$this->id_vendedorFK_Idvendedor;	

		}
		
		$this->Session->write(factura_lote_util::$STR_SESSION_NAME,serialize($factura_lote_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(factura_lote_session $factura_lote_session) {
		
		if($factura_lote_session==null) {
			$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));
		}
		
		if($factura_lote_session==null) {
		   $factura_lote_session=new factura_lote_session();
		}
		
		if($factura_lote_session->strUltimaBusqueda!=null && $factura_lote_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$factura_lote_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$factura_lote_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$factura_lote_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idasiento') {
				$this->id_asientoFK_Idasiento=$factura_lote_session->id_asiento;
				$factura_lote_session->id_asiento=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idcliente') {
				$this->id_clienteFK_Idcliente=$factura_lote_session->id_cliente;
				$factura_lote_session->id_cliente=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Iddocumento_cuenta_cobrar') {
				$this->id_documento_cuenta_cobrarFK_Iddocumento_cuenta_cobrar=$factura_lote_session->id_documento_cuenta_cobrar;
				$factura_lote_session->id_documento_cuenta_cobrar=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idejercicio') {
				$this->id_ejercicioFK_Idejercicio=$factura_lote_session->id_ejercicio;
				$factura_lote_session->id_ejercicio=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$factura_lote_session->id_empresa;
				$factura_lote_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idestado') {
				$this->id_estadoFK_Idestado=$factura_lote_session->id_estado;
				$factura_lote_session->id_estado=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idkardex') {
				$this->id_kardexFK_Idkardex=$factura_lote_session->id_kardex;
				$factura_lote_session->id_kardex=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idmoneda') {
				$this->id_monedaFK_Idmoneda=$factura_lote_session->id_moneda;
				$factura_lote_session->id_moneda=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idperiodo') {
				$this->id_periodoFK_Idperiodo=$factura_lote_session->id_periodo;
				$factura_lote_session->id_periodo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idsucursal') {
				$this->id_sucursalFK_Idsucursal=$factura_lote_session->id_sucursal;
				$factura_lote_session->id_sucursal=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtermino_pago') {
				$this->id_termino_pagoFK_Idtermino_pago=$factura_lote_session->id_termino_pago;
				$factura_lote_session->id_termino_pago=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idusuario') {
				$this->id_usuarioFK_Idusuario=$factura_lote_session->id_usuario;
				$factura_lote_session->id_usuario=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idvendedor') {
				$this->id_vendedorFK_Idvendedor=$factura_lote_session->id_vendedor;
				$factura_lote_session->id_vendedor=-1;

			}
		}
		
		$factura_lote_session->strUltimaBusqueda='';
		//$factura_lote_session->intNumeroPaginacion=10;
		$factura_lote_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(factura_lote_util::$STR_SESSION_NAME,serialize($factura_lote_session));		
	}
	
	public function factura_lotesControllerAux($conexion_control) 	 {
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
		$this->idclienteDefaultFK = 0;
		$this->idvendedorDefaultFK = 0;
		$this->idtermino_pagoDefaultFK = 0;
		$this->idmonedaDefaultFK = 0;
		$this->idestadoDefaultFK = 0;
		$this->idasientoDefaultFK = 0;
		$this->iddocumento_cuenta_cobrarDefaultFK = 0;
		$this->idkardexDefaultFK = 0;
	}
	
	public function setfactura_loteFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_sucursal',$this->idsucursalDefaultFK);
		$this->setExistDataCampoForm('form','id_ejercicio',$this->idejercicioDefaultFK);
		$this->setExistDataCampoForm('form','id_periodo',$this->idperiodoDefaultFK);
		$this->setExistDataCampoForm('form','id_usuario',$this->idusuarioDefaultFK);
		$this->setExistDataCampoForm('form','id_cliente',$this->idclienteDefaultFK);
		$this->setExistDataCampoForm('form','id_vendedor',$this->idvendedorDefaultFK);
		$this->setExistDataCampoForm('form','id_termino_pago',$this->idtermino_pagoDefaultFK);
		$this->setExistDataCampoForm('form','id_moneda',$this->idmonedaDefaultFK);
		$this->setExistDataCampoForm('form','id_estado',$this->idestadoDefaultFK);
		$this->setExistDataCampoForm('form','id_asiento',$this->idasientoDefaultFK);
		$this->setExistDataCampoForm('form','id_documento_cuenta_cobrar',$this->iddocumento_cuenta_cobrarDefaultFK);
		$this->setExistDataCampoForm('form','id_kardex',$this->idkardexDefaultFK);
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

		cliente::$class;
		cliente_carga::$CONTROLLER;

		vendedor::$class;
		vendedor_carga::$CONTROLLER;

		termino_pago_cliente::$class;
		termino_pago_cliente_carga::$CONTROLLER;

		moneda::$class;
		moneda_carga::$CONTROLLER;

		estado::$class;
		estado_carga::$CONTROLLER;

		asiento::$class;
		asiento_carga::$CONTROLLER;

		documento_cuenta_cobrar::$class;
		documento_cuenta_cobrar_carga::$CONTROLLER;

		kardex::$class;
		kardex_carga::$CONTROLLER;
		
		//REL
		

		factura_lote_detalle_carga::$CONTROLLER;
		factura_lote_detalle_util::$STR_SCHEMA;
		factura_lote_detalle_session::class;

		factura_modelo_carga::$CONTROLLER;
		factura_modelo_util::$STR_SCHEMA;
		factura_modelo_session::class;
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
		interface factura_lote_controlI {	
		
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
		
		public function onLoad(factura_lote_session $factura_lote_session=null);	
		function index(?string $strTypeOnLoadfactura_lote='',?string $strTipoPaginaAuxiliarfactura_lote='',?string $strTipoUsuarioAuxiliarfactura_lote='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadfactura_lote='',string $strTipoPaginaAuxiliarfactura_lote='',string $strTipoUsuarioAuxiliarfactura_lote='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($factura_loteReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(factura_lote $factura_loteClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(factura_lote_session $factura_lote_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(factura_lote_session $factura_lote_session);	
		public function factura_lotesControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setfactura_loteFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
