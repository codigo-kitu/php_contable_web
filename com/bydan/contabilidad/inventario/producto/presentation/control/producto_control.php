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

namespace com\bydan\contabilidad\inventario\producto\presentation\control;

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

use com\bydan\contabilidad\inventario\producto\business\entity\producto;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/producto/util/producto_carga.php');
use com\bydan\contabilidad\inventario\producto\util\producto_carga;

use com\bydan\contabilidad\inventario\producto\util\producto_util;
use com\bydan\contabilidad\inventario\producto\util\producto_param_return;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic_add;
use com\bydan\contabilidad\inventario\producto\presentation\session\producto_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\inventario\tipo_producto\business\entity\tipo_producto;
use com\bydan\contabilidad\inventario\tipo_producto\business\logic\tipo_producto_logic;
use com\bydan\contabilidad\inventario\tipo_producto\util\tipo_producto_carga;
use com\bydan\contabilidad\inventario\tipo_producto\util\tipo_producto_util;

use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;
use com\bydan\contabilidad\facturacion\impuesto\business\logic\impuesto_logic;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_carga;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_util;

use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\logic\otro_impuesto_logic;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_carga;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_util;

use com\bydan\contabilidad\inventario\categoria_producto\business\entity\categoria_producto;
use com\bydan\contabilidad\inventario\categoria_producto\business\logic\categoria_producto_logic;
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_carga;
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_util;

use com\bydan\contabilidad\inventario\sub_categoria_producto\business\entity\sub_categoria_producto;
use com\bydan\contabilidad\inventario\sub_categoria_producto\business\logic\sub_categoria_producto_logic;
use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_carga;
use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_carga;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;
use com\bydan\contabilidad\inventario\unidad\business\logic\unidad_logic;
use com\bydan\contabilidad\inventario\unidad\util\unidad_carga;
use com\bydan\contabilidad\inventario\unidad\util\unidad_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;
use com\bydan\contabilidad\facturacion\retencion\business\logic\retencion_logic;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_carga;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_util;

//REL


use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_carga;
use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_util;
use com\bydan\contabilidad\inventario\lista_precio\presentation\session\lista_precio_session;

use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_carga;
use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_util;
use com\bydan\contabilidad\inventario\producto_bodega\presentation\session\producto_bodega_session;

use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_carga;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_util;
use com\bydan\contabilidad\inventario\otro_suplidor\presentation\session\otro_suplidor_session;

use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_carga;
use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_util;
use com\bydan\contabilidad\inventario\lista_cliente\presentation\session\lista_cliente_session;
use com\bydan\contabilidad\inventario\bodega\presentation\session\bodega_session;

use com\bydan\contabilidad\inventario\imagen_producto\util\imagen_producto_carga;
use com\bydan\contabilidad\inventario\imagen_producto\util\imagen_producto_util;
use com\bydan\contabilidad\inventario\imagen_producto\presentation\session\imagen_producto_session;

use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;
use com\bydan\contabilidad\inventario\lista_producto\presentation\session\lista_producto_session;


/*CARGA ARCHIVOS FRAMEWORK*/
producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/inventario/producto/presentation/control/producto_init_control.php');
use com\bydan\contabilidad\inventario\producto\presentation\control\producto_init_control;

include_once('com/bydan/contabilidad/inventario/producto/presentation/control/producto_base_control.php');
use com\bydan\contabilidad\inventario\producto\presentation\control\producto_base_control;

class producto_control extends producto_base_control {	
	
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
					
					
				if($this->data['activo']==null) {$this->data['activo']=false;} else {if($this->data['activo']=='on') {$this->data['activo']=true;}}
					
				if($this->data['impuesto_ventas']==null) {$this->data['impuesto_ventas']=false;} else {if($this->data['impuesto_ventas']=='on') {$this->data['impuesto_ventas']=true;}}
					
				if($this->data['otro_impuesto_ventas']==null) {$this->data['otro_impuesto_ventas']=false;} else {if($this->data['otro_impuesto_ventas']=='on') {$this->data['otro_impuesto_ventas']=true;}}
					
				if($this->data['impuesto_compras']==null) {$this->data['impuesto_compras']=false;} else {if($this->data['impuesto_compras']=='on') {$this->data['impuesto_compras']=true;}}
					
				if($this->data['otro_impuesto_compras']==null) {$this->data['otro_impuesto_compras']=false;} else {if($this->data['otro_impuesto_compras']=='on') {$this->data['otro_impuesto_compras']=true;}}
					
				if($this->data['comenta_factura']==null) {$this->data['comenta_factura']=false;} else {if($this->data['comenta_factura']=='on') {$this->data['comenta_factura']=true;}}
					
				if($this->data['factura_sin_stock']==null) {$this->data['factura_sin_stock']=false;} else {if($this->data['factura_sin_stock']=='on') {$this->data['factura_sin_stock']=true;}}
					
				if($this->data['mostrar_componente']==null) {$this->data['mostrar_componente']=false;} else {if($this->data['mostrar_componente']=='on') {$this->data['mostrar_componente']=true;}}
					
				if($this->data['producto_equivalente']==null) {$this->data['producto_equivalente']=false;} else {if($this->data['producto_equivalente']=='on') {$this->data['producto_equivalente']=true;}}
					
				if($this->data['avisa_expiracion']==null) {$this->data['avisa_expiracion']=false;} else {if($this->data['avisa_expiracion']=='on') {$this->data['avisa_expiracion']=true;}}
					
				if($this->data['requiere_serie']==null) {$this->data['requiere_serie']=false;} else {if($this->data['requiere_serie']=='on') {$this->data['requiere_serie']=true;}}
					
				if($this->data['acepta_lote']==null) {$this->data['acepta_lote']=false;} else {if($this->data['acepta_lote']=='on') {$this->data['acepta_lote']=true;}}
					
				if($this->data['retencion_ventas']==null) {$this->data['retencion_ventas']=false;} else {if($this->data['retencion_ventas']=='on') {$this->data['retencion_ventas']=true;}}
					
				if($this->data['retencion_compras']==null) {$this->data['retencion_compras']=false;} else {if($this->data['retencion_compras']=='on') {$this->data['retencion_compras']=true;}}
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
			else if($action=='registrarSesionParalista_precioes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idproductoActual=$this->getDataId();
				$this->registrarSesionParalista_precioes($idproductoActual);
			}
			else if($action=='registrarSesionParaproducto_bodegas' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idproductoActual=$this->getDataId();
				$this->registrarSesionParaproducto_bodegas($idproductoActual);
			}
			else if($action=='registrarSesionParaotro_suplidores' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idproductoActual=$this->getDataId();
				$this->registrarSesionParaotro_suplidores($idproductoActual);
			}
			else if($action=='registrarSesionParalista_clientes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idproductoActual=$this->getDataId();
				$this->registrarSesionParalista_clientes($idproductoActual);
			}
			else if($action=='registrarSesionParaimagen_productos' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idproductoActual=$this->getDataId();
				$this->registrarSesionParaimagen_productos($idproductoActual);
			}
			else if($action=='registrarSesionParalista_productoes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idproductoActual=$this->getDataId();
				$this->registrarSesionParalista_productoes($idproductoActual);
			} 
			
			
			else if($action=="FK_Idbodega"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdbodegaParaProcesar();
			}
			else if($action=="FK_Idcategoria_producto"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcategoria_productoParaProcesar();
			}
			else if($action=="FK_Idcuenta_compra"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcuenta_compraParaProcesar();
			}
			else if($action=="FK_Idcuenta_inventario"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcuenta_inventarioParaProcesar();
			}
			else if($action=="FK_Idcuenta_venta"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcuenta_ventaParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idimpuesto"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdimpuestoParaProcesar();
			}
			else if($action=="FK_Idotro_impuesto"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idotro_impuestoParaProcesar();
			}
			else if($action=="FK_Idproveedor"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdproveedorParaProcesar();
			}
			else if($action=="FK_Idretencion"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdretencionParaProcesar();
			}
			else if($action=="FK_Idsub_categoria_producto"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idsub_categoria_productoParaProcesar();
			}
			else if($action=="FK_Idtipo_producto"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtipo_productoParaProcesar();
			}
			else if($action=="FK_Idunidad_compra"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idunidad_compraParaProcesar();
			}
			else if($action=="FK_Idunidad_venta"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idunidad_ventaParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproductoActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idproductoActual
			}
			else if($action=='abrirBusquedaParaproveedor') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproductoActual=$this->getDataId();
				$this->abrirBusquedaParaproveedor();//$idproductoActual
			}
			else if($action=='abrirBusquedaParatipo_producto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproductoActual=$this->getDataId();
				$this->abrirBusquedaParatipo_producto();//$idproductoActual
			}
			else if($action=='abrirBusquedaParaimpuesto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproductoActual=$this->getDataId();
				$this->abrirBusquedaParaimpuesto();//$idproductoActual
			}
			else if($action=='abrirBusquedaParaotro_impuesto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproductoActual=$this->getDataId();
				$this->abrirBusquedaParaotro_impuesto();//$idproductoActual
			}
			else if($action=='abrirBusquedaParacategoria_producto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproductoActual=$this->getDataId();
				$this->abrirBusquedaParacategoria_producto();//$idproductoActual
			}
			else if($action=='abrirBusquedaParasub_categoria_producto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproductoActual=$this->getDataId();
				$this->abrirBusquedaParasub_categoria_producto();//$idproductoActual
			}
			else if($action=='abrirBusquedaParabodega_defecto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproductoActual=$this->getDataId();
				$this->abrirBusquedaParabodega_defecto();//$idproductoActual
			}
			else if($action=='abrirBusquedaParaunidad_compra') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproductoActual=$this->getDataId();
				$this->abrirBusquedaParaunidad_compra();//$idproductoActual
			}
			else if($action=='abrirBusquedaParaunidad_venta') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproductoActual=$this->getDataId();
				$this->abrirBusquedaParaunidad_venta();//$idproductoActual
			}
			else if($action=='abrirBusquedaParacuenta_venta') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproductoActual=$this->getDataId();
				$this->abrirBusquedaParacuenta_venta();//$idproductoActual
			}
			else if($action=='abrirBusquedaParacuenta_compra') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproductoActual=$this->getDataId();
				$this->abrirBusquedaParacuenta_compra();//$idproductoActual
			}
			else if($action=='abrirBusquedaParacuenta_costo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproductoActual=$this->getDataId();
				$this->abrirBusquedaParacuenta_costo();//$idproductoActual
			}
			else if($action=='abrirBusquedaPararetencion') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproductoActual=$this->getDataId();
				$this->abrirBusquedaPararetencion();//$idproductoActual
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
					
					$productoController = new producto_control();
					
					$productoController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($productoController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$productoController = new producto_control();
						$productoController = $this;
						
						$jsonResponse = json_encode($productoController->productos);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->productoReturnGeneral==null) {
					$this->productoReturnGeneral=new producto_param_return();
				}
				
				echo($this->productoReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$productoController=new producto_control();
		
		$productoController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$productoController->usuarioActual=new usuario();
		
		$productoController->usuarioActual->setId($this->usuarioActual->getId());
		$productoController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$productoController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$productoController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$productoController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$productoController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$productoController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$productoController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $productoController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadproducto= $this->getDataGeneralString('strTypeOnLoadproducto');
		$strTipoPaginaAuxiliarproducto= $this->getDataGeneralString('strTipoPaginaAuxiliarproducto');
		$strTipoUsuarioAuxiliarproducto= $this->getDataGeneralString('strTipoUsuarioAuxiliarproducto');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadproducto,$strTipoPaginaAuxiliarproducto,$strTipoUsuarioAuxiliarproducto,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadproducto!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('producto','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarproducto,$this->strTipoUsuarioAuxiliarproducto,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarproducto,$this->strTipoUsuarioAuxiliarproducto,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->productoReturnGeneral=new producto_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->productoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->productoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->productoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->productoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->productoReturnGeneral);
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
		$this->productoReturnGeneral=new producto_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->productoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->productoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->productoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->productoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->productoReturnGeneral);
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
		$this->productoReturnGeneral=new producto_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->productoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->productoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->productoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->productoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->productoReturnGeneral);
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
				$this->productoLogic->getNewConnexionToDeep();
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
			
			
			$this->productoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->productoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->productoReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->productoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->productoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->productoReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->productoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->productoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->productoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->productoReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->productoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->productoReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->productoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->productoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->productoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->productoReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->productoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->productoReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
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
		
		$this->productoLogic=new producto_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->producto=new producto();
		
		$this->strTypeOnLoadproducto='onload';
		$this->strTipoPaginaAuxiliarproducto='none';
		$this->strTipoUsuarioAuxiliarproducto='none';	

		$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
		
		$this->productoModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->productoControllerAdditional=new producto_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(producto_session $producto_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($producto_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadproducto='',?string $strTipoPaginaAuxiliarproducto='',?string $strTipoUsuarioAuxiliarproducto='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadproducto=$strTypeOnLoadproducto;
			$this->strTipoPaginaAuxiliarproducto=$strTipoPaginaAuxiliarproducto;
			$this->strTipoUsuarioAuxiliarproducto=$strTipoUsuarioAuxiliarproducto;
	
			if($strTipoUsuarioAuxiliarproducto=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->producto=new producto();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Productos';
			
			
			$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));
							
			if($producto_session==null) {
				$producto_session=new producto_session();
				
				/*$this->Session->write('producto_session',$producto_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($producto_session->strFuncionJsPadre!=null && $producto_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$producto_session->strFuncionJsPadre;
				
				$producto_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($producto_session);
			
			if($strTypeOnLoadproducto!=null && $strTypeOnLoadproducto=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$producto_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$producto_session->setPaginaPopupVariables(true);
				}
				
				if($producto_session->intNumeroPaginacion==producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,producto_util::$STR_SESSION_NAME,'inventario');																
			
			} else if($strTypeOnLoadproducto!=null && $strTypeOnLoadproducto=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$producto_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;*/
				
				if($producto_session->intNumeroPaginacion==producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarproducto!=null && $strTipoPaginaAuxiliarproducto=='none') {
				/*$producto_session->strStyleDivHeader='display:table-row';*/
				
				/*$producto_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarproducto!=null && $strTipoPaginaAuxiliarproducto=='iframe') {
					/*
					$producto_session->strStyleDivArbol='display:none';
					$producto_session->strStyleDivHeader='display:none';
					$producto_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$producto_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->productoClase=new producto();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=producto_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(producto_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->productoLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->productoLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$listaprecioLogic=new lista_precio_logic();
			//$productobodegaLogic=new producto_bodega_logic();
			//$otrosuplidorLogic=new otro_suplidor_logic();
			//$listaclienteLogic=new lista_cliente_logic();
			//$imagenproductoLogic=new imagen_producto_logic();
			//$listaproductoLogic=new lista_producto_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->productoLogic=new producto_logic();*/
			
			
			$this->productosModel=null;
			/*new ListDataModel();*/
			
			/*$this->productosModel.setWrappedData(productoLogic->getproductos());*/
						
			$this->productos= array();
			$this->productosEliminados=array();
			$this->productosSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= producto_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= producto_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->producto= new producto();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idbodega='display:table-row';
			$this->strVisibleFK_Idcategoria_producto='display:table-row';
			$this->strVisibleFK_Idcuenta_compra='display:table-row';
			$this->strVisibleFK_Idcuenta_inventario='display:table-row';
			$this->strVisibleFK_Idcuenta_venta='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idimpuesto='display:table-row';
			$this->strVisibleFK_Idotro_impuesto='display:table-row';
			$this->strVisibleFK_Idproveedor='display:table-row';
			$this->strVisibleFK_Idretencion='display:table-row';
			$this->strVisibleFK_Idsub_categoria_producto='display:table-row';
			$this->strVisibleFK_Idtipo_producto='display:table-row';
			$this->strVisibleFK_Idunidad_compra='display:table-row';
			$this->strVisibleFK_Idunidad_venta='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarproducto!=null && $strTipoUsuarioAuxiliarproducto!='none' && $strTipoUsuarioAuxiliarproducto!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarproducto);
																
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
				if($strTipoUsuarioAuxiliarproducto!=null && $strTipoUsuarioAuxiliarproducto!='none' && $strTipoUsuarioAuxiliarproducto!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarproducto);
																
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
				if($strTipoUsuarioAuxiliarproducto==null || $strTipoUsuarioAuxiliarproducto=='none' || $strTipoUsuarioAuxiliarproducto=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarproducto,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, producto_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, producto_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina producto');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($producto_session);
			
			$this->getSetBusquedasSesionConfig($producto_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteproductos($this->strAccionBusqueda,$this->productoLogic->getproductos());*/
				} else if($this->strGenerarReporte=='Html')	{
					$producto_session->strServletGenerarHtmlReporte='productoServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(producto_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(producto_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($producto_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarproducto!=null && $strTipoUsuarioAuxiliarproducto=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($producto_session);
			}
								
			$this->set(producto_util::$STR_SESSION_NAME, $producto_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($producto_session);
			
			/*
			$this->producto->recursive = 0;
			
			$this->productos=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('productos', $this->productos);
			
			$this->set(producto_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->productoActual =$this->productoClase;
			
			/*$this->productoActual =$this->migrarModelproducto($this->productoClase);*/
			
			$this->returnHtml(false);
			
			$this->set(producto_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=producto_util::$STR_NOMBRE_OPCION;
				
			if(producto_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=producto_util::$STR_MODULO_OPCION.producto_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(producto_util::$STR_SESSION_NAME,serialize($producto_session));
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
			/*$productoClase= (producto) productosModel.getRowData();*/
			
			$this->productoClase->setId($this->producto->getId());	
			$this->productoClase->setVersionRow($this->producto->getVersionRow());	
			$this->productoClase->setVersionRow($this->producto->getVersionRow());	
			$this->productoClase->setid_empresa($this->producto->getid_empresa());	
			$this->productoClase->setid_proveedor($this->producto->getid_proveedor());	
			$this->productoClase->setcodigo($this->producto->getcodigo());	
			$this->productoClase->setnombre($this->producto->getnombre());	
			$this->productoClase->setcosto($this->producto->getcosto());	
			$this->productoClase->setactivo($this->producto->getactivo());	
			$this->productoClase->setid_tipo_producto($this->producto->getid_tipo_producto());	
			$this->productoClase->setcantidad_inicial($this->producto->getcantidad_inicial());	
			$this->productoClase->setid_impuesto($this->producto->getid_impuesto());	
			$this->productoClase->setid_otro_impuesto($this->producto->getid_otro_impuesto());	
			$this->productoClase->setimpuesto_ventas($this->producto->getimpuesto_ventas());	
			$this->productoClase->setotro_impuesto_ventas($this->producto->getotro_impuesto_ventas());	
			$this->productoClase->setimpuesto_compras($this->producto->getimpuesto_compras());	
			$this->productoClase->setotro_impuesto_compras($this->producto->getotro_impuesto_compras());	
			$this->productoClase->setid_categoria_producto($this->producto->getid_categoria_producto());	
			$this->productoClase->setid_sub_categoria_producto($this->producto->getid_sub_categoria_producto());	
			$this->productoClase->setid_bodega_defecto($this->producto->getid_bodega_defecto());	
			$this->productoClase->setid_unidad_compra($this->producto->getid_unidad_compra());	
			$this->productoClase->setequivalencia_compra($this->producto->getequivalencia_compra());	
			$this->productoClase->setid_unidad_venta($this->producto->getid_unidad_venta());	
			$this->productoClase->setequivalencia_venta($this->producto->getequivalencia_venta());	
			$this->productoClase->setdescripcion($this->producto->getdescripcion());	
			$this->productoClase->setimagen($this->producto->getimagen());	
			$this->productoClase->setobservacion($this->producto->getobservacion());	
			$this->productoClase->setcomenta_factura($this->producto->getcomenta_factura());	
			$this->productoClase->setcodigo_fabricante($this->producto->getcodigo_fabricante());	
			$this->productoClase->setcantidad($this->producto->getcantidad());	
			$this->productoClase->setcantidad_minima($this->producto->getcantidad_minima());	
			$this->productoClase->setcantidad_maxima($this->producto->getcantidad_maxima());	
			$this->productoClase->setfactura_sin_stock($this->producto->getfactura_sin_stock());	
			$this->productoClase->setmostrar_componente($this->producto->getmostrar_componente());	
			$this->productoClase->setproducto_equivalente($this->producto->getproducto_equivalente());	
			$this->productoClase->setavisa_expiracion($this->producto->getavisa_expiracion());	
			$this->productoClase->setrequiere_serie($this->producto->getrequiere_serie());	
			$this->productoClase->setacepta_lote($this->producto->getacepta_lote());	
			$this->productoClase->setid_cuenta_venta($this->producto->getid_cuenta_venta());	
			$this->productoClase->setid_cuenta_compra($this->producto->getid_cuenta_compra());	
			$this->productoClase->setid_cuenta_costo($this->producto->getid_cuenta_costo());	
			$this->productoClase->setvalor_inventario($this->producto->getvalor_inventario());	
			$this->productoClase->setproducto_fisico($this->producto->getproducto_fisico());	
			$this->productoClase->setultima_venta($this->producto->getultima_venta());	
			$this->productoClase->setprecio_actualizado($this->producto->getprecio_actualizado());	
			$this->productoClase->setid_retencion($this->producto->getid_retencion());	
			$this->productoClase->setretencion_ventas($this->producto->getretencion_ventas());	
			$this->productoClase->setretencion_compras($this->producto->getretencion_compras());	
			$this->productoClase->setfactura_con_precio($this->producto->getfactura_con_precio());	
		
			/*$this->Session->write('productoVersionRowActual', producto.getVersionRow());*/
			
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
			
			$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));
						
			if($producto_session==null) {
				$producto_session=new producto_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('producto', $this->producto->read(null, $id));
	
			
			$this->producto->recursive = 0;
			
			$this->productos=$this->paginate();
			
			$this->set('productos', $this->productos);
	
			if (empty($this->data)) {
				$this->data = $this->producto->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->productoLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->productoClase);
			
			$this->productoActual=$this->productoClase;
			
			/*$this->productoActual =$this->migrarModelproducto($this->productoClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->productoLogic->getproductos(),$this->productoActual);
			
			$this->actualizarControllerConReturnGeneral($this->productoReturnGeneral);
			
			//$this->productoReturnGeneral=$this->productoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->productoLogic->getproductos(),$this->productoActual,$this->productoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));
						
			if($producto_session==null) {
				$producto_session=new producto_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoproducto', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->productoClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->productoClase);
			
			$this->productoActual =$this->productoClase;
			
			/*$this->productoActual =$this->migrarModelproducto($this->productoClase);*/
			
			$this->setproductoFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->productoLogic->getproductos(),$this->producto);
			
			$this->actualizarControllerConReturnGeneral($this->productoReturnGeneral);
			
			//this->productoReturnGeneral=$this->productoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->productoLogic->getproductos(),$this->producto,$this->productoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->productoReturnGeneral->getproducto()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idproveedorDefaultFK!=null && $this->idproveedorDefaultFK > -1) {
				$this->productoReturnGeneral->getproducto()->setid_proveedor($this->idproveedorDefaultFK);
			}

			if($this->idtipo_productoDefaultFK!=null && $this->idtipo_productoDefaultFK > -1) {
				$this->productoReturnGeneral->getproducto()->setid_tipo_producto($this->idtipo_productoDefaultFK);
			}

			if($this->idimpuestoDefaultFK!=null && $this->idimpuestoDefaultFK > -1) {
				$this->productoReturnGeneral->getproducto()->setid_impuesto($this->idimpuestoDefaultFK);
			}

			if($this->idotro_impuestoDefaultFK!=null && $this->idotro_impuestoDefaultFK > -1) {
				$this->productoReturnGeneral->getproducto()->setid_otro_impuesto($this->idotro_impuestoDefaultFK);
			}

			if($this->idcategoria_productoDefaultFK!=null && $this->idcategoria_productoDefaultFK > -1) {
				$this->productoReturnGeneral->getproducto()->setid_categoria_producto($this->idcategoria_productoDefaultFK);
			}

			if($this->idsub_categoria_productoDefaultFK!=null && $this->idsub_categoria_productoDefaultFK > -1) {
				$this->productoReturnGeneral->getproducto()->setid_sub_categoria_producto($this->idsub_categoria_productoDefaultFK);
			}

			if($this->idbodega_defectoDefaultFK!=null && $this->idbodega_defectoDefaultFK > -1) {
				$this->productoReturnGeneral->getproducto()->setid_bodega_defecto($this->idbodega_defectoDefaultFK);
			}

			if($this->idunidad_compraDefaultFK!=null && $this->idunidad_compraDefaultFK > -1) {
				$this->productoReturnGeneral->getproducto()->setid_unidad_compra($this->idunidad_compraDefaultFK);
			}

			if($this->idunidad_ventaDefaultFK!=null && $this->idunidad_ventaDefaultFK > -1) {
				$this->productoReturnGeneral->getproducto()->setid_unidad_venta($this->idunidad_ventaDefaultFK);
			}

			if($this->idcuenta_ventaDefaultFK!=null && $this->idcuenta_ventaDefaultFK > -1) {
				$this->productoReturnGeneral->getproducto()->setid_cuenta_venta($this->idcuenta_ventaDefaultFK);
			}

			if($this->idcuenta_compraDefaultFK!=null && $this->idcuenta_compraDefaultFK > -1) {
				$this->productoReturnGeneral->getproducto()->setid_cuenta_compra($this->idcuenta_compraDefaultFK);
			}

			if($this->idcuenta_costoDefaultFK!=null && $this->idcuenta_costoDefaultFK > -1) {
				$this->productoReturnGeneral->getproducto()->setid_cuenta_costo($this->idcuenta_costoDefaultFK);
			}

			if($this->idretencionDefaultFK!=null && $this->idretencionDefaultFK > -1) {
				$this->productoReturnGeneral->getproducto()->setid_retencion($this->idretencionDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->productoReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->productoReturnGeneral->getproducto(),$this->productoActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyproducto($this->productoReturnGeneral->getproducto());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioproducto($this->productoReturnGeneral->getproducto());*/
			}
			
			if($this->productoReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->productoReturnGeneral->getproducto(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualproducto($this->producto,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->productosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->productosAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->productosAuxiliar=array();
			}
			
			if(count($this->productosAuxiliar)==2) {
				$productoOrigen=$this->productosAuxiliar[0];
				$productoDestino=$this->productosAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($productoOrigen,$productoDestino,true,false,false);
				
				$this->actualizarLista($productoDestino,$this->productos);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->productosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->productosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->productosAuxiliar=array();
			}
			
			if(count($this->productosAuxiliar) > 0) {
				foreach ($this->productosAuxiliar as $productoSeleccionado) {
					$this->producto=new producto();
					
					$this->setCopiarVariablesObjetos($productoSeleccionado,$this->producto,true,true,false);
						
					$this->productos[]=$this->producto;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->productosEliminados as $productoEliminado) {
				$this->productoLogic->productos[]=$productoEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->producto=new producto();
							
				$this->productos[]=$this->producto;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
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
		
		$productoActual=new producto();
		
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
				
				$productoActual=$this->productos[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $productoActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $productoActual->setid_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $productoActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $productoActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $productoActual->setcosto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $productoActual->setactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_8')));  } else { $productoActual->setactivo(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $productoActual->setid_tipo_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $productoActual->setcantidad_inicial((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $productoActual->setid_impuesto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $productoActual->setid_otro_impuesto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $productoActual->setimpuesto_ventas(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_13')));  } else { $productoActual->setimpuesto_ventas(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $productoActual->setotro_impuesto_ventas(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_14')));  } else { $productoActual->setotro_impuesto_ventas(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $productoActual->setimpuesto_compras(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_15')));  } else { $productoActual->setimpuesto_compras(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $productoActual->setotro_impuesto_compras(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_16')));  } else { $productoActual->setotro_impuesto_compras(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $productoActual->setid_categoria_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $productoActual->setid_sub_categoria_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $productoActual->setid_bodega_defecto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $productoActual->setid_unidad_compra((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $productoActual->setequivalencia_compra((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $productoActual->setid_unidad_venta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_22'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $productoActual->setequivalencia_venta((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_24','t'.$this->strSufijo)) {  $productoActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_24'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_25','t'.$this->strSufijo)) {  $productoActual->setimagen($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_25'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_26','t'.$this->strSufijo)) {  $productoActual->setobservacion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_26'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_27','t'.$this->strSufijo)) {  $productoActual->setcomenta_factura(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_27')));  } else { $productoActual->setcomenta_factura(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_28','t'.$this->strSufijo)) {  $productoActual->setcodigo_fabricante($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_28'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_29','t'.$this->strSufijo)) {  $productoActual->setcantidad((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_29'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_30','t'.$this->strSufijo)) {  $productoActual->setcantidad_minima((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_30'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_31','t'.$this->strSufijo)) {  $productoActual->setcantidad_maxima((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_31'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_32','t'.$this->strSufijo)) {  $productoActual->setfactura_sin_stock(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_32')));  } else { $productoActual->setfactura_sin_stock(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_33','t'.$this->strSufijo)) {  $productoActual->setmostrar_componente(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_33')));  } else { $productoActual->setmostrar_componente(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_34','t'.$this->strSufijo)) {  $productoActual->setproducto_equivalente(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_34')));  } else { $productoActual->setproducto_equivalente(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_35','t'.$this->strSufijo)) {  $productoActual->setavisa_expiracion(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_35')));  } else { $productoActual->setavisa_expiracion(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_36','t'.$this->strSufijo)) {  $productoActual->setrequiere_serie(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_36')));  } else { $productoActual->setrequiere_serie(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_37','t'.$this->strSufijo)) {  $productoActual->setacepta_lote(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_37')));  } else { $productoActual->setacepta_lote(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_38','t'.$this->strSufijo)) {  $productoActual->setid_cuenta_venta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_38'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_39','t'.$this->strSufijo)) {  $productoActual->setid_cuenta_compra((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_39'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_40','t'.$this->strSufijo)) {  $productoActual->setid_cuenta_costo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_40'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_41','t'.$this->strSufijo)) {  $productoActual->setvalor_inventario((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_41'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_42','t'.$this->strSufijo)) {  $productoActual->setproducto_fisico((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_42'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_43','t'.$this->strSufijo)) {  $productoActual->setultima_venta(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_43')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_44','t'.$this->strSufijo)) {  $productoActual->setprecio_actualizado(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_44')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_45','t'.$this->strSufijo)) {  $productoActual->setid_retencion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_45'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_46','t'.$this->strSufijo)) {  $productoActual->setretencion_ventas(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_46')));  } else { $productoActual->setretencion_ventas(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_47','t'.$this->strSufijo)) {  $productoActual->setretencion_compras(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_47')));  } else { $productoActual->setretencion_compras(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_48','t'.$this->strSufijo)) {  $productoActual->setfactura_con_precio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_48'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->productosAuxiliar=array();		 
		/*$this->productosEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->productosAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->productosAuxiliar=array();
		}
			
		if(count($this->productosAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->productosAuxiliar as $productoAuxLocal) {				
				
				foreach($this->productos as $productoLocal) {
					if($productoLocal->getId()==$productoAuxLocal->getId()) {
						$productoLocal->setIsDeleted(true);
						
						/*$this->productosEliminados[]=$productoLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->productoLogic->setproductos($this->productos);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
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
				$this->productoLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadproducto='',string $strTipoPaginaAuxiliarproducto='',string $strTipoUsuarioAuxiliarproducto='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadproducto,$strTipoPaginaAuxiliarproducto,$strTipoUsuarioAuxiliarproducto,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->productos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=producto_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=producto_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=producto_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));
						
			if($producto_session==null) {
				$producto_session=new producto_session();
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
					/*$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;*/
					
					if($producto_session->intNumeroPaginacion==producto_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$producto_session->intNumeroPaginacion;
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
			
			$this->productosEliminados=array();
			
			/*$this->productoLogic->setConnexion($connexion);*/
			
			$this->productoLogic->setIsConDeep(true);
			
			$this->productoLogic->getproductoDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('proveedor');$classes[]=$class;
			$class=new Classe('tipo_producto');$classes[]=$class;
			$class=new Classe('impuesto');$classes[]=$class;
			$class=new Classe('otro_impuesto');$classes[]=$class;
			$class=new Classe('categoria_producto');$classes[]=$class;
			$class=new Classe('sub_categoria_producto');$classes[]=$class;
			$class=new Classe('bodega_defecto');$classes[]=$class;
			$class=new Classe('unidad_compra');$classes[]=$class;
			$class=new Classe('unidad_venta');$classes[]=$class;
			$class=new Classe('cuenta_venta');$classes[]=$class;
			$class=new Classe('cuenta_compra');$classes[]=$class;
			$class=new Classe('cuenta_costo');$classes[]=$class;
			$class=new Classe('retencion');$classes[]=$class;
			
			$this->productoLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->productoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->productoLogic->getproductos()==null|| count($this->productoLogic->getproductos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->productos=$this->productoLogic->getproductos();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->productoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->productosReporte=$this->productoLogic->getproductos();
									
						/*$this->generarReportes('Todos',$this->productoLogic->getproductos());*/
					
						$this->productoLogic->setproductos($this->productos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->productoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->productoLogic->getproductos()==null|| count($this->productoLogic->getproductos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->productos=$this->productoLogic->getproductos();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->productoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->productosReporte=$this->productoLogic->getproductos();
									
						/*$this->generarReportes('Todos',$this->productoLogic->getproductos());*/
					
						$this->productoLogic->setproductos($this->productos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idproducto=0;*/
				
				if($producto_session->bitBusquedaDesdeFKSesionFK!=null && $producto_session->bitBusquedaDesdeFKSesionFK==true) {
					if($producto_session->bigIdActualFK!=null && $producto_session->bigIdActualFK!=0)	{
						$this->idproducto=$producto_session->bigIdActualFK;	
					}
					
					$producto_session->bitBusquedaDesdeFKSesionFK=false;
					
					$producto_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idproducto=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idproducto=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->productoLogic->getEntity($this->idproducto);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*productoLogicAdditional::getDetalleIndicePorId($idproducto);*/

				
				if($this->productoLogic->getproducto()!=null) {
					$this->productoLogic->setproductos(array());
					$this->productoLogic->productos[]=$this->productoLogic->getproducto();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idbodega')
			{

				if($producto_session->bigidbodega_defectoActual!=null && $producto_session->bigidbodega_defectoActual!=0)
				{
					$this->id_bodega_defectoFK_Idbodega=$producto_session->bigidbodega_defectoActual;
					$producto_session->bigidbodega_defectoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idbodega($finalQueryPaginacion,$this->pagination,$this->id_bodega_defectoFK_Idbodega);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//productoLogicAdditional::getDetalleIndiceFK_Idbodega($this->id_bodega_defectoFK_Idbodega);


					if($this->productoLogic->getproductos()==null || count($this->productoLogic->getproductos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$productos=$this->productoLogic->getproductos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idbodega('',$this->pagination,$this->id_bodega_defectoFK_Idbodega);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->productosReporte=$this->productoLogic->getproductos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproductos("FK_Idbodega",$this->productoLogic->getproductos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->productoLogic->setproductos($productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcategoria_producto')
			{

				if($producto_session->bigidcategoria_productoActual!=null && $producto_session->bigidcategoria_productoActual!=0)
				{
					$this->id_categoria_productoFK_Idcategoria_producto=$producto_session->bigidcategoria_productoActual;
					$producto_session->bigidcategoria_productoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idcategoria_producto($finalQueryPaginacion,$this->pagination,$this->id_categoria_productoFK_Idcategoria_producto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//productoLogicAdditional::getDetalleIndiceFK_Idcategoria_producto($this->id_categoria_productoFK_Idcategoria_producto);


					if($this->productoLogic->getproductos()==null || count($this->productoLogic->getproductos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$productos=$this->productoLogic->getproductos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idcategoria_producto('',$this->pagination,$this->id_categoria_productoFK_Idcategoria_producto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->productosReporte=$this->productoLogic->getproductos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproductos("FK_Idcategoria_producto",$this->productoLogic->getproductos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->productoLogic->setproductos($productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcuenta_compra')
			{

				if($producto_session->bigidcuenta_compraActual!=null && $producto_session->bigidcuenta_compraActual!=0)
				{
					$this->id_cuenta_compraFK_Idcuenta_compra=$producto_session->bigidcuenta_compraActual;
					$producto_session->bigidcuenta_compraActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idcuenta_compra($finalQueryPaginacion,$this->pagination,$this->id_cuenta_compraFK_Idcuenta_compra);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//productoLogicAdditional::getDetalleIndiceFK_Idcuenta_compra($this->id_cuenta_compraFK_Idcuenta_compra);


					if($this->productoLogic->getproductos()==null || count($this->productoLogic->getproductos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$productos=$this->productoLogic->getproductos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idcuenta_compra('',$this->pagination,$this->id_cuenta_compraFK_Idcuenta_compra);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->productosReporte=$this->productoLogic->getproductos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproductos("FK_Idcuenta_compra",$this->productoLogic->getproductos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->productoLogic->setproductos($productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcuenta_inventario')
			{

				if($producto_session->bigidcuenta_costoActual!=null && $producto_session->bigidcuenta_costoActual!=0)
				{
					$this->id_cuenta_costoFK_Idcuenta_inventario=$producto_session->bigidcuenta_costoActual;
					$producto_session->bigidcuenta_costoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idcuenta_inventario($finalQueryPaginacion,$this->pagination,$this->id_cuenta_costoFK_Idcuenta_inventario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//productoLogicAdditional::getDetalleIndiceFK_Idcuenta_inventario($this->id_cuenta_costoFK_Idcuenta_inventario);


					if($this->productoLogic->getproductos()==null || count($this->productoLogic->getproductos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$productos=$this->productoLogic->getproductos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idcuenta_inventario('',$this->pagination,$this->id_cuenta_costoFK_Idcuenta_inventario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->productosReporte=$this->productoLogic->getproductos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproductos("FK_Idcuenta_inventario",$this->productoLogic->getproductos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->productoLogic->setproductos($productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcuenta_venta')
			{

				if($producto_session->bigidcuenta_ventaActual!=null && $producto_session->bigidcuenta_ventaActual!=0)
				{
					$this->id_cuenta_ventaFK_Idcuenta_venta=$producto_session->bigidcuenta_ventaActual;
					$producto_session->bigidcuenta_ventaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idcuenta_venta($finalQueryPaginacion,$this->pagination,$this->id_cuenta_ventaFK_Idcuenta_venta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//productoLogicAdditional::getDetalleIndiceFK_Idcuenta_venta($this->id_cuenta_ventaFK_Idcuenta_venta);


					if($this->productoLogic->getproductos()==null || count($this->productoLogic->getproductos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$productos=$this->productoLogic->getproductos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idcuenta_venta('',$this->pagination,$this->id_cuenta_ventaFK_Idcuenta_venta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->productosReporte=$this->productoLogic->getproductos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproductos("FK_Idcuenta_venta",$this->productoLogic->getproductos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->productoLogic->setproductos($productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($producto_session->bigidempresaActual!=null && $producto_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$producto_session->bigidempresaActual;
					$producto_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//productoLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->productoLogic->getproductos()==null || count($this->productoLogic->getproductos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$productos=$this->productoLogic->getproductos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->productosReporte=$this->productoLogic->getproductos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproductos("FK_Idempresa",$this->productoLogic->getproductos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->productoLogic->setproductos($productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idimpuesto')
			{

				if($producto_session->bigidimpuestoActual!=null && $producto_session->bigidimpuestoActual!=0)
				{
					$this->id_impuestoFK_Idimpuesto=$producto_session->bigidimpuestoActual;
					$producto_session->bigidimpuestoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idimpuesto($finalQueryPaginacion,$this->pagination,$this->id_impuestoFK_Idimpuesto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//productoLogicAdditional::getDetalleIndiceFK_Idimpuesto($this->id_impuestoFK_Idimpuesto);


					if($this->productoLogic->getproductos()==null || count($this->productoLogic->getproductos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$productos=$this->productoLogic->getproductos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idimpuesto('',$this->pagination,$this->id_impuestoFK_Idimpuesto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->productosReporte=$this->productoLogic->getproductos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproductos("FK_Idimpuesto",$this->productoLogic->getproductos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->productoLogic->setproductos($productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idotro_impuesto')
			{

				if($producto_session->bigidotro_impuestoActual!=null && $producto_session->bigidotro_impuestoActual!=0)
				{
					$this->id_otro_impuestoFK_Idotro_impuesto=$producto_session->bigidotro_impuestoActual;
					$producto_session->bigidotro_impuestoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idotro_impuesto($finalQueryPaginacion,$this->pagination,$this->id_otro_impuestoFK_Idotro_impuesto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//productoLogicAdditional::getDetalleIndiceFK_Idotro_impuesto($this->id_otro_impuestoFK_Idotro_impuesto);


					if($this->productoLogic->getproductos()==null || count($this->productoLogic->getproductos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$productos=$this->productoLogic->getproductos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idotro_impuesto('',$this->pagination,$this->id_otro_impuestoFK_Idotro_impuesto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->productosReporte=$this->productoLogic->getproductos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproductos("FK_Idotro_impuesto",$this->productoLogic->getproductos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->productoLogic->setproductos($productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idproveedor')
			{

				if($producto_session->bigidproveedorActual!=null && $producto_session->bigidproveedorActual!=0)
				{
					$this->id_proveedorFK_Idproveedor=$producto_session->bigidproveedorActual;
					$producto_session->bigidproveedorActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idproveedor($finalQueryPaginacion,$this->pagination,$this->id_proveedorFK_Idproveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//productoLogicAdditional::getDetalleIndiceFK_Idproveedor($this->id_proveedorFK_Idproveedor);


					if($this->productoLogic->getproductos()==null || count($this->productoLogic->getproductos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$productos=$this->productoLogic->getproductos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idproveedor('',$this->pagination,$this->id_proveedorFK_Idproveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->productosReporte=$this->productoLogic->getproductos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproductos("FK_Idproveedor",$this->productoLogic->getproductos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->productoLogic->setproductos($productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idretencion')
			{

				if($producto_session->bigidretencionActual!=null && $producto_session->bigidretencionActual!=0)
				{
					$this->id_retencionFK_Idretencion=$producto_session->bigidretencionActual;
					$producto_session->bigidretencionActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idretencion($finalQueryPaginacion,$this->pagination,$this->id_retencionFK_Idretencion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//productoLogicAdditional::getDetalleIndiceFK_Idretencion($this->id_retencionFK_Idretencion);


					if($this->productoLogic->getproductos()==null || count($this->productoLogic->getproductos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$productos=$this->productoLogic->getproductos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idretencion('',$this->pagination,$this->id_retencionFK_Idretencion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->productosReporte=$this->productoLogic->getproductos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproductos("FK_Idretencion",$this->productoLogic->getproductos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->productoLogic->setproductos($productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idsub_categoria_producto')
			{

				if($producto_session->bigidsub_categoria_productoActual!=null && $producto_session->bigidsub_categoria_productoActual!=0)
				{
					$this->id_sub_categoria_productoFK_Idsub_categoria_producto=$producto_session->bigidsub_categoria_productoActual;
					$producto_session->bigidsub_categoria_productoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idsub_categoria_producto($finalQueryPaginacion,$this->pagination,$this->id_sub_categoria_productoFK_Idsub_categoria_producto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//productoLogicAdditional::getDetalleIndiceFK_Idsub_categoria_producto($this->id_sub_categoria_productoFK_Idsub_categoria_producto);


					if($this->productoLogic->getproductos()==null || count($this->productoLogic->getproductos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$productos=$this->productoLogic->getproductos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idsub_categoria_producto('',$this->pagination,$this->id_sub_categoria_productoFK_Idsub_categoria_producto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->productosReporte=$this->productoLogic->getproductos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproductos("FK_Idsub_categoria_producto",$this->productoLogic->getproductos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->productoLogic->setproductos($productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtipo_producto')
			{

				if($producto_session->bigidtipo_productoActual!=null && $producto_session->bigidtipo_productoActual!=0)
				{
					$this->id_tipo_productoFK_Idtipo_producto=$producto_session->bigidtipo_productoActual;
					$producto_session->bigidtipo_productoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idtipo_producto($finalQueryPaginacion,$this->pagination,$this->id_tipo_productoFK_Idtipo_producto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//productoLogicAdditional::getDetalleIndiceFK_Idtipo_producto($this->id_tipo_productoFK_Idtipo_producto);


					if($this->productoLogic->getproductos()==null || count($this->productoLogic->getproductos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$productos=$this->productoLogic->getproductos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idtipo_producto('',$this->pagination,$this->id_tipo_productoFK_Idtipo_producto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->productosReporte=$this->productoLogic->getproductos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproductos("FK_Idtipo_producto",$this->productoLogic->getproductos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->productoLogic->setproductos($productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idunidad_compra')
			{

				if($producto_session->bigidunidad_compraActual!=null && $producto_session->bigidunidad_compraActual!=0)
				{
					$this->id_unidad_compraFK_Idunidad_compra=$producto_session->bigidunidad_compraActual;
					$producto_session->bigidunidad_compraActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idunidad_compra($finalQueryPaginacion,$this->pagination,$this->id_unidad_compraFK_Idunidad_compra);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//productoLogicAdditional::getDetalleIndiceFK_Idunidad_compra($this->id_unidad_compraFK_Idunidad_compra);


					if($this->productoLogic->getproductos()==null || count($this->productoLogic->getproductos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$productos=$this->productoLogic->getproductos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idunidad_compra('',$this->pagination,$this->id_unidad_compraFK_Idunidad_compra);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->productosReporte=$this->productoLogic->getproductos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproductos("FK_Idunidad_compra",$this->productoLogic->getproductos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->productoLogic->setproductos($productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idunidad_venta')
			{

				if($producto_session->bigidunidad_ventaActual!=null && $producto_session->bigidunidad_ventaActual!=0)
				{
					$this->id_unidad_ventaFK_Idunidad_venta=$producto_session->bigidunidad_ventaActual;
					$producto_session->bigidunidad_ventaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idunidad_venta($finalQueryPaginacion,$this->pagination,$this->id_unidad_ventaFK_Idunidad_venta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//productoLogicAdditional::getDetalleIndiceFK_Idunidad_venta($this->id_unidad_ventaFK_Idunidad_venta);


					if($this->productoLogic->getproductos()==null || count($this->productoLogic->getproductos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$productos=$this->productoLogic->getproductos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->productoLogic->getsFK_Idunidad_venta('',$this->pagination,$this->id_unidad_ventaFK_Idunidad_venta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->productosReporte=$this->productoLogic->getproductos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproductos("FK_Idunidad_venta",$this->productoLogic->getproductos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->productoLogic->setproductos($productos);
					}
				//}

			} 
		
		$producto_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$producto_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->productoLogic->loadForeignsKeysDescription();*/
		
		$this->productos=$this->productoLogic->getproductos();
		
		if($this->productosEliminados==null) {
			$this->productosEliminados=array();
		}
		
		$this->Session->write(producto_util::$STR_SESSION_NAME.'Lista',serialize($this->productos));
		$this->Session->write(producto_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->productosEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(producto_util::$STR_SESSION_NAME,serialize($producto_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idproducto=$idGeneral;
			
			$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
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
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}

			if(count($this->productos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_IdbodegaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_bodega_defectoFK_Idbodega=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idbodega','cmbid_bodega_defecto');

			$this->strAccionBusqueda='FK_Idbodega';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idcategoria_productoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_categoria_productoFK_Idcategoria_producto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcategoria_producto','cmbid_categoria_producto');

			$this->strAccionBusqueda='FK_Idcategoria_producto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idcuenta_compraParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuenta_compraFK_Idcuenta_compra=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta_compra','cmbid_cuenta_compra');

			$this->strAccionBusqueda='FK_Idcuenta_compra';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idcuenta_inventarioParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuenta_costoFK_Idcuenta_inventario=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta_inventario','cmbid_cuenta_costo');

			$this->strAccionBusqueda='FK_Idcuenta_inventario';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idcuenta_ventaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuenta_ventaFK_Idcuenta_venta=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta_venta','cmbid_cuenta_venta');

			$this->strAccionBusqueda='FK_Idcuenta_venta';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
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
				$this->productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdimpuestoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_impuestoFK_Idimpuesto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idimpuesto','cmbid_impuesto');

			$this->strAccionBusqueda='FK_Idimpuesto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idotro_impuestoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_otro_impuestoFK_Idotro_impuesto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idotro_impuesto','cmbid_otro_impuesto');

			$this->strAccionBusqueda='FK_Idotro_impuesto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
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
				$this->productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_proveedorFK_Idproveedor=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idproveedor','cmbid_proveedor');

			$this->strAccionBusqueda='FK_Idproveedor';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdretencionParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_retencionFK_Idretencion=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idretencion','cmbid_retencion');

			$this->strAccionBusqueda='FK_Idretencion';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idsub_categoria_productoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_sub_categoria_productoFK_Idsub_categoria_producto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idsub_categoria_producto','cmbid_sub_categoria_producto');

			$this->strAccionBusqueda='FK_Idsub_categoria_producto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtipo_productoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_tipo_productoFK_Idtipo_producto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtipo_producto','cmbid_tipo_producto');

			$this->strAccionBusqueda='FK_Idtipo_producto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idunidad_compraParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_unidad_compraFK_Idunidad_compra=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idunidad_compra','cmbid_unidad_compra');

			$this->strAccionBusqueda='FK_Idunidad_compra';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idunidad_ventaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_unidad_ventaFK_Idunidad_venta=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idunidad_venta','cmbid_unidad_venta');

			$this->strAccionBusqueda='FK_Idunidad_venta';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idbodega($strFinalQuery,$id_bodega_defecto)
	{
		try
		{

			$this->productoLogic->getsFK_Idbodega($strFinalQuery,new Pagination(),$id_bodega_defecto);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idcategoria_producto($strFinalQuery,$id_categoria_producto)
	{
		try
		{

			$this->productoLogic->getsFK_Idcategoria_producto($strFinalQuery,new Pagination(),$id_categoria_producto);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idcuenta_compra($strFinalQuery,$id_cuenta_compra)
	{
		try
		{

			$this->productoLogic->getsFK_Idcuenta_compra($strFinalQuery,new Pagination(),$id_cuenta_compra);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idcuenta_inventario($strFinalQuery,$id_cuenta_costo)
	{
		try
		{

			$this->productoLogic->getsFK_Idcuenta_inventario($strFinalQuery,new Pagination(),$id_cuenta_costo);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idcuenta_venta($strFinalQuery,$id_cuenta_venta)
	{
		try
		{

			$this->productoLogic->getsFK_Idcuenta_venta($strFinalQuery,new Pagination(),$id_cuenta_venta);
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

			$this->productoLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idimpuesto($strFinalQuery,$id_impuesto)
	{
		try
		{

			$this->productoLogic->getsFK_Idimpuesto($strFinalQuery,new Pagination(),$id_impuesto);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idotro_impuesto($strFinalQuery,$id_otro_impuesto)
	{
		try
		{

			$this->productoLogic->getsFK_Idotro_impuesto($strFinalQuery,new Pagination(),$id_otro_impuesto);
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

			$this->productoLogic->getsFK_Idproveedor($strFinalQuery,new Pagination(),$id_proveedor);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idretencion($strFinalQuery,$id_retencion)
	{
		try
		{

			$this->productoLogic->getsFK_Idretencion($strFinalQuery,new Pagination(),$id_retencion);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idsub_categoria_producto($strFinalQuery,$id_sub_categoria_producto)
	{
		try
		{

			$this->productoLogic->getsFK_Idsub_categoria_producto($strFinalQuery,new Pagination(),$id_sub_categoria_producto);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtipo_producto($strFinalQuery,$id_tipo_producto)
	{
		try
		{

			$this->productoLogic->getsFK_Idtipo_producto($strFinalQuery,new Pagination(),$id_tipo_producto);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idunidad_compra($strFinalQuery,$id_unidad_compra)
	{
		try
		{

			$this->productoLogic->getsFK_Idunidad_compra($strFinalQuery,new Pagination(),$id_unidad_compra);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idunidad_venta($strFinalQuery,$id_unidad_venta)
	{
		try
		{

			$this->productoLogic->getsFK_Idunidad_venta($strFinalQuery,new Pagination(),$id_unidad_venta);
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
			
			
			$productoForeignKey=new producto_param_return(); //productoForeignKey();
			
			$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));
						
			if($producto_session==null) {
				$producto_session=new producto_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$productoForeignKey=$this->productoLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$producto_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$productoForeignKey->empresasFK;
				$this->idempresaDefaultFK=$productoForeignKey->idempresaDefaultFK;
			}

			if($producto_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$this->strRecargarFkTipos,',')) {
				$this->proveedorsFK=$productoForeignKey->proveedorsFK;
				$this->idproveedorDefaultFK=$productoForeignKey->idproveedorDefaultFK;
			}

			if($producto_session->bitBusquedaDesdeFKSesionproveedor) {
				$this->setVisibleBusquedasParaproveedor(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_producto',$this->strRecargarFkTipos,',')) {
				$this->tipo_productosFK=$productoForeignKey->tipo_productosFK;
				$this->idtipo_productoDefaultFK=$productoForeignKey->idtipo_productoDefaultFK;
			}

			if($producto_session->bitBusquedaDesdeFKSesiontipo_producto) {
				$this->setVisibleBusquedasParatipo_producto(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_impuesto',$this->strRecargarFkTipos,',')) {
				$this->impuestosFK=$productoForeignKey->impuestosFK;
				$this->idimpuestoDefaultFK=$productoForeignKey->idimpuestoDefaultFK;
			}

			if($producto_session->bitBusquedaDesdeFKSesionimpuesto) {
				$this->setVisibleBusquedasParaimpuesto(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_otro_impuesto',$this->strRecargarFkTipos,',')) {
				$this->otro_impuestosFK=$productoForeignKey->otro_impuestosFK;
				$this->idotro_impuestoDefaultFK=$productoForeignKey->idotro_impuestoDefaultFK;
			}

			if($producto_session->bitBusquedaDesdeFKSesionotro_impuesto) {
				$this->setVisibleBusquedasParaotro_impuesto(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_categoria_producto',$this->strRecargarFkTipos,',')) {
				$this->categoria_productosFK=$productoForeignKey->categoria_productosFK;
				$this->idcategoria_productoDefaultFK=$productoForeignKey->idcategoria_productoDefaultFK;
			}

			if($producto_session->bitBusquedaDesdeFKSesioncategoria_producto) {
				$this->setVisibleBusquedasParacategoria_producto(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sub_categoria_producto',$this->strRecargarFkTipos,',')) {
				$this->sub_categoria_productosFK=$productoForeignKey->sub_categoria_productosFK;
				$this->idsub_categoria_productoDefaultFK=$productoForeignKey->idsub_categoria_productoDefaultFK;
			}

			if($producto_session->bitBusquedaDesdeFKSesionsub_categoria_producto) {
				$this->setVisibleBusquedasParasub_categoria_producto(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega_defecto',$this->strRecargarFkTipos,',')) {
				$this->bodega_defectosFK=$productoForeignKey->bodega_defectosFK;
				$this->idbodega_defectoDefaultFK=$productoForeignKey->idbodega_defectoDefaultFK;
			}

			if($producto_session->bitBusquedaDesdeFKSesionbodega_defecto) {
				$this->setVisibleBusquedasParabodega_defecto(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_unidad_compra',$this->strRecargarFkTipos,',')) {
				$this->unidad_comprasFK=$productoForeignKey->unidad_comprasFK;
				$this->idunidad_compraDefaultFK=$productoForeignKey->idunidad_compraDefaultFK;
			}

			if($producto_session->bitBusquedaDesdeFKSesionunidad_compra) {
				$this->setVisibleBusquedasParaunidad_compra(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_unidad_venta',$this->strRecargarFkTipos,',')) {
				$this->unidad_ventasFK=$productoForeignKey->unidad_ventasFK;
				$this->idunidad_ventaDefaultFK=$productoForeignKey->idunidad_ventaDefaultFK;
			}

			if($producto_session->bitBusquedaDesdeFKSesionunidad_venta) {
				$this->setVisibleBusquedasParaunidad_venta(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_venta',$this->strRecargarFkTipos,',')) {
				$this->cuenta_ventasFK=$productoForeignKey->cuenta_ventasFK;
				$this->idcuenta_ventaDefaultFK=$productoForeignKey->idcuenta_ventaDefaultFK;
			}

			if($producto_session->bitBusquedaDesdeFKSesioncuenta_venta) {
				$this->setVisibleBusquedasParacuenta_venta(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_compra',$this->strRecargarFkTipos,',')) {
				$this->cuenta_comprasFK=$productoForeignKey->cuenta_comprasFK;
				$this->idcuenta_compraDefaultFK=$productoForeignKey->idcuenta_compraDefaultFK;
			}

			if($producto_session->bitBusquedaDesdeFKSesioncuenta_compra) {
				$this->setVisibleBusquedasParacuenta_compra(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_costo',$this->strRecargarFkTipos,',')) {
				$this->cuenta_costosFK=$productoForeignKey->cuenta_costosFK;
				$this->idcuenta_costoDefaultFK=$productoForeignKey->idcuenta_costoDefaultFK;
			}

			if($producto_session->bitBusquedaDesdeFKSesioncuenta_costo) {
				$this->setVisibleBusquedasParacuenta_costo(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_retencion',$this->strRecargarFkTipos,',')) {
				$this->retencionsFK=$productoForeignKey->retencionsFK;
				$this->idretencionDefaultFK=$productoForeignKey->idretencionDefaultFK;
			}

			if($producto_session->bitBusquedaDesdeFKSesionretencion) {
				$this->setVisibleBusquedasPararetencion(true);
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
	
	function cargarCombosFKFromReturnGeneral($productoReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$productoReturnGeneral->strRecargarFkTipos;
			
			


			if($productoReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$productoReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$productoReturnGeneral->idempresaDefaultFK;
			}


			if($productoReturnGeneral->con_proveedorsFK==true) {
				$this->proveedorsFK=$productoReturnGeneral->proveedorsFK;
				$this->idproveedorDefaultFK=$productoReturnGeneral->idproveedorDefaultFK;
			}


			if($productoReturnGeneral->con_tipo_productosFK==true) {
				$this->tipo_productosFK=$productoReturnGeneral->tipo_productosFK;
				$this->idtipo_productoDefaultFK=$productoReturnGeneral->idtipo_productoDefaultFK;
			}


			if($productoReturnGeneral->con_impuestosFK==true) {
				$this->impuestosFK=$productoReturnGeneral->impuestosFK;
				$this->idimpuestoDefaultFK=$productoReturnGeneral->idimpuestoDefaultFK;
			}


			if($productoReturnGeneral->con_otro_impuestosFK==true) {
				$this->otro_impuestosFK=$productoReturnGeneral->otro_impuestosFK;
				$this->idotro_impuestoDefaultFK=$productoReturnGeneral->idotro_impuestoDefaultFK;
			}


			if($productoReturnGeneral->con_categoria_productosFK==true) {
				$this->categoria_productosFK=$productoReturnGeneral->categoria_productosFK;
				$this->idcategoria_productoDefaultFK=$productoReturnGeneral->idcategoria_productoDefaultFK;
			}


			if($productoReturnGeneral->con_sub_categoria_productosFK==true) {
				$this->sub_categoria_productosFK=$productoReturnGeneral->sub_categoria_productosFK;
				$this->idsub_categoria_productoDefaultFK=$productoReturnGeneral->idsub_categoria_productoDefaultFK;
			}


			if($productoReturnGeneral->con_bodega_defectosFK==true) {
				$this->bodega_defectosFK=$productoReturnGeneral->bodega_defectosFK;
				$this->idbodega_defectoDefaultFK=$productoReturnGeneral->idbodega_defectoDefaultFK;
			}


			if($productoReturnGeneral->con_unidad_comprasFK==true) {
				$this->unidad_comprasFK=$productoReturnGeneral->unidad_comprasFK;
				$this->idunidad_compraDefaultFK=$productoReturnGeneral->idunidad_compraDefaultFK;
			}


			if($productoReturnGeneral->con_unidad_ventasFK==true) {
				$this->unidad_ventasFK=$productoReturnGeneral->unidad_ventasFK;
				$this->idunidad_ventaDefaultFK=$productoReturnGeneral->idunidad_ventaDefaultFK;
			}


			if($productoReturnGeneral->con_cuenta_ventasFK==true) {
				$this->cuenta_ventasFK=$productoReturnGeneral->cuenta_ventasFK;
				$this->idcuenta_ventaDefaultFK=$productoReturnGeneral->idcuenta_ventaDefaultFK;
			}


			if($productoReturnGeneral->con_cuenta_comprasFK==true) {
				$this->cuenta_comprasFK=$productoReturnGeneral->cuenta_comprasFK;
				$this->idcuenta_compraDefaultFK=$productoReturnGeneral->idcuenta_compraDefaultFK;
			}


			if($productoReturnGeneral->con_cuenta_costosFK==true) {
				$this->cuenta_costosFK=$productoReturnGeneral->cuenta_costosFK;
				$this->idcuenta_costoDefaultFK=$productoReturnGeneral->idcuenta_costoDefaultFK;
			}


			if($productoReturnGeneral->con_retencionsFK==true) {
				$this->retencionsFK=$productoReturnGeneral->retencionsFK;
				$this->idretencionDefaultFK=$productoReturnGeneral->idretencionDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(producto_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));
		
		if($producto_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==proveedor_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='proveedor';
			}
			else if($producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==tipo_producto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='tipo_producto';
			}
			else if($producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==impuesto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='impuesto';
			}
			else if($producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==otro_impuesto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='otro_impuesto';
			}
			else if($producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==categoria_producto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='categoria_producto';
			}
			else if($producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==sub_categoria_producto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='sub_categoria_producto';
			}
			else if($producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==bodega_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='bodega';
			}
			else if($producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==unidad_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='unidad';
			}
			else if($producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==unidad_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='unidad';
			}
			else if($producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta';
			}
			else if($producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta';
			}
			else if($producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta';
			}
			else if($producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==retencion_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='retencion';
			}
			
			$producto_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}						
			
			$this->productosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->productosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->productosAuxiliar=array();
			}
			
			if(count($this->productosAuxiliar) > 0) {
				
				foreach ($this->productosAuxiliar as $productoSeleccionado) {
					$this->eliminarTablaBase($productoSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('imagen_producto');
			$tipoRelacionReporte->setsDescripcion('Imagenes s');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('lista_cliente');
			$tipoRelacionReporte->setsDescripcion('Lista Clientes');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('lista_precio');
			$tipoRelacionReporte->setsDescripcion('Lista Precioses');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('lista_producto');
			$tipoRelacionReporte->setsDescripcion('Lista ses');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('otro_suplidor');
			$tipoRelacionReporte->setsDescripcion('Otro Suplidores');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('producto_bodega');
			$tipoRelacionReporte->setsDescripcion(' Bodegas');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=lista_precio_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=producto_bodega_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=otro_suplidor_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=lista_cliente_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=imagen_producto_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=lista_producto_util::$STR_NOMBRE_CLASE;
		
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


	public function gettipo_productosFKListSelectItem() 
	{
		$tipo_productosList=array();

		$item=null;

		foreach($this->tipo_productosFK as $tipo_producto)
		{
			$item=new SelectItem();
			$item->setLabel($tipo_producto->getnombre());
			$item->setValue($tipo_producto->getId());
			$tipo_productosList[]=$item;
		}

		return $tipo_productosList;
	}


	public function getimpuestosFKListSelectItem() 
	{
		$impuestosList=array();

		$item=null;

		foreach($this->impuestosFK as $impuesto)
		{
			$item=new SelectItem();
			$item->setLabel($impuesto->getdescripcion());
			$item->setValue($impuesto->getId());
			$impuestosList[]=$item;
		}

		return $impuestosList;
	}


	public function getotro_impuestosFKListSelectItem() 
	{
		$otro_impuestosList=array();

		$item=null;

		foreach($this->otro_impuestosFK as $otro_impuesto)
		{
			$item=new SelectItem();
			$item->setLabel($otro_impuesto->getcodigo());
			$item->setValue($otro_impuesto->getId());
			$otro_impuestosList[]=$item;
		}

		return $otro_impuestosList;
	}


	public function getcategoria_productosFKListSelectItem() 
	{
		$categoria_productosList=array();

		$item=null;

		foreach($this->categoria_productosFK as $categoria_producto)
		{
			$item=new SelectItem();
			$item->setLabel($categoria_producto->getnombre());
			$item->setValue($categoria_producto->getId());
			$categoria_productosList[]=$item;
		}

		return $categoria_productosList;
	}


	public function getsub_categoria_productosFKListSelectItem() 
	{
		$sub_categoria_productosList=array();

		$item=null;

		foreach($this->sub_categoria_productosFK as $sub_categoria_producto)
		{
			$item=new SelectItem();
			$item->setLabel($sub_categoria_producto->getnombre());
			$item->setValue($sub_categoria_producto->getId());
			$sub_categoria_productosList[]=$item;
		}

		return $sub_categoria_productosList;
	}


	public function getbodega_defectosFKListSelectItem() 
	{
		$bodega_defectosList=array();

		$item=null;

		foreach($this->bodega_defectosFK as $bodega_defecto)
		{
			$item=new SelectItem();
			$item->setLabel($bodega_defecto->getcodigo());
			$item->setValue($bodega_defecto->getId());
			$bodega_defectosList[]=$item;
		}

		return $bodega_defectosList;
	}


	public function getunidad_comprasFKListSelectItem() 
	{
		$unidad_comprasList=array();

		$item=null;

		foreach($this->unidad_comprasFK as $unidad_compra)
		{
			$item=new SelectItem();
			$item->setLabel($unidad_compra->getnombre());
			$item->setValue($unidad_compra->getId());
			$unidad_comprasList[]=$item;
		}

		return $unidad_comprasList;
	}


	public function getunidad_ventasFKListSelectItem() 
	{
		$unidad_ventasList=array();

		$item=null;

		foreach($this->unidad_ventasFK as $unidad_venta)
		{
			$item=new SelectItem();
			$item->setLabel($unidad_venta->getnombre());
			$item->setValue($unidad_venta->getId());
			$unidad_ventasList[]=$item;
		}

		return $unidad_ventasList;
	}


	public function getcuenta_ventasFKListSelectItem() 
	{
		$cuenta_ventasList=array();

		$item=null;

		foreach($this->cuenta_ventasFK as $cuenta_venta)
		{
			$item=new SelectItem();
			$item->setLabel($cuenta_venta->getcodigo());
			$item->setValue($cuenta_venta->getId());
			$cuenta_ventasList[]=$item;
		}

		return $cuenta_ventasList;
	}


	public function getcuenta_comprasFKListSelectItem() 
	{
		$cuenta_comprasList=array();

		$item=null;

		foreach($this->cuenta_comprasFK as $cuenta_compra)
		{
			$item=new SelectItem();
			$item->setLabel($cuenta_compra->getcodigo());
			$item->setValue($cuenta_compra->getId());
			$cuenta_comprasList[]=$item;
		}

		return $cuenta_comprasList;
	}


	public function getcuenta_costosFKListSelectItem() 
	{
		$cuenta_costosList=array();

		$item=null;

		foreach($this->cuenta_costosFK as $cuenta_costo)
		{
			$item=new SelectItem();
			$item->setLabel($cuenta_costo->getcodigo());
			$item->setValue($cuenta_costo->getId());
			$cuenta_costosList[]=$item;
		}

		return $cuenta_costosList;
	}


	public function getretencionsFKListSelectItem() 
	{
		$retencionsList=array();

		$item=null;

		foreach($this->retencionsFK as $retencion)
		{
			$item=new SelectItem();
			$item->setLabel($retencion->getcodigo());
			$item->setValue($retencion->getId());
			$retencionsList[]=$item;
		}

		return $retencionsList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
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
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$productosNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->productos as $productoLocal) {
				if($productoLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->producto=new producto();
				
				$this->producto->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->productos[]=$this->producto;*/
				
				$productosNuevos[]=$this->producto;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('proveedor');$classes[]=$class;
				$class=new Classe('tipo_producto');$classes[]=$class;
				$class=new Classe('impuesto');$classes[]=$class;
				$class=new Classe('otro_impuesto');$classes[]=$class;
				$class=new Classe('categoria_producto');$classes[]=$class;
				$class=new Classe('sub_categoria_producto');$classes[]=$class;
				$class=new Classe('bodega_defecto');$classes[]=$class;
				$class=new Classe('unidad_compra');$classes[]=$class;
				$class=new Classe('unidad_venta');$classes[]=$class;
				$class=new Classe('cuenta_venta');$classes[]=$class;
				$class=new Classe('cuenta_compra');$classes[]=$class;
				$class=new Classe('cuenta_costo');$classes[]=$class;
				$class=new Classe('retencion');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->setproductos($productosNuevos);
					
				$this->productoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($productosNuevos as $productoNuevo) {
					$this->productos[]=$productoNuevo;
				}
				
				/*$this->productos[]=$productosNuevos;*/
				
				$this->productoLogic->setproductos($this->productos);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($productosNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($producto_session->bigidempresaActual!=null && $producto_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($producto_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=producto_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
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

		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesionproveedor!=true) {
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


			if($producto_session->bigidproveedorActual!=null && $producto_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($producto_session->bigidproveedorActual);//WithConnection

				$this->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=producto_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$this->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	public function cargarCombostipo_productosFK($connexion=null,$strRecargarFkQuery=''){
		$tipo_productoLogic= new tipo_producto_logic();
		$pagination= new Pagination();
		$this->tipo_productosFK=array();

		$tipo_productoLogic->setConnexion($connexion);
		$tipo_productoLogic->gettipo_productoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesiontipo_producto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_producto_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltipo_producto=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_producto=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_producto, '');
				$finalQueryGlobaltipo_producto.=tipo_producto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_producto.$strRecargarFkQuery;		

				$tipo_productoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostipo_productosFK($tipo_productoLogic->gettipo_productos());

		} else {
			$this->setVisibleBusquedasParatipo_producto(true);


			if($producto_session->bigidtipo_productoActual!=null && $producto_session->bigidtipo_productoActual > 0) {
				$tipo_productoLogic->getEntity($producto_session->bigidtipo_productoActual);//WithConnection

				$this->tipo_productosFK[$tipo_productoLogic->gettipo_producto()->getId()]=producto_util::gettipo_productoDescripcion($tipo_productoLogic->gettipo_producto());
				$this->idtipo_productoDefaultFK=$tipo_productoLogic->gettipo_producto()->getId();
			}
		}
	}

	public function cargarCombosimpuestosFK($connexion=null,$strRecargarFkQuery=''){
		$impuestoLogic= new impuesto_logic();
		$pagination= new Pagination();
		$this->impuestosFK=array();

		$impuestoLogic->setConnexion($connexion);
		$impuestoLogic->getimpuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesionimpuesto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=impuesto_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalimpuesto=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalimpuesto=Funciones::GetFinalQueryAppend($finalQueryGlobalimpuesto, '');
				$finalQueryGlobalimpuesto.=impuesto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalimpuesto.$strRecargarFkQuery;		

				$impuestoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosimpuestosFK($impuestoLogic->getimpuestos());

		} else {
			$this->setVisibleBusquedasParaimpuesto(true);


			if($producto_session->bigidimpuestoActual!=null && $producto_session->bigidimpuestoActual > 0) {
				$impuestoLogic->getEntity($producto_session->bigidimpuestoActual);//WithConnection

				$this->impuestosFK[$impuestoLogic->getimpuesto()->getId()]=producto_util::getimpuestoDescripcion($impuestoLogic->getimpuesto());
				$this->idimpuestoDefaultFK=$impuestoLogic->getimpuesto()->getId();
			}
		}
	}

	public function cargarCombosotro_impuestosFK($connexion=null,$strRecargarFkQuery=''){
		$otro_impuestoLogic= new otro_impuesto_logic();
		$pagination= new Pagination();
		$this->otro_impuestosFK=array();

		$otro_impuestoLogic->setConnexion($connexion);
		$otro_impuestoLogic->getotro_impuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesionotro_impuesto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=otro_impuesto_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalotro_impuesto=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalotro_impuesto=Funciones::GetFinalQueryAppend($finalQueryGlobalotro_impuesto, '');
				$finalQueryGlobalotro_impuesto.=otro_impuesto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalotro_impuesto.$strRecargarFkQuery;		

				$otro_impuestoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosotro_impuestosFK($otro_impuestoLogic->getotro_impuestos());

		} else {
			$this->setVisibleBusquedasParaotro_impuesto(true);


			if($producto_session->bigidotro_impuestoActual!=null && $producto_session->bigidotro_impuestoActual > 0) {
				$otro_impuestoLogic->getEntity($producto_session->bigidotro_impuestoActual);//WithConnection

				$this->otro_impuestosFK[$otro_impuestoLogic->getotro_impuesto()->getId()]=producto_util::getotro_impuestoDescripcion($otro_impuestoLogic->getotro_impuesto());
				$this->idotro_impuestoDefaultFK=$otro_impuestoLogic->getotro_impuesto()->getId();
			}
		}
	}

	public function cargarComboscategoria_productosFK($connexion=null,$strRecargarFkQuery=''){
		$categoria_productoLogic= new categoria_producto_logic();
		$pagination= new Pagination();
		$this->categoria_productosFK=array();

		$categoria_productoLogic->setConnexion($connexion);
		$categoria_productoLogic->getcategoria_productoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesioncategoria_producto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=categoria_producto_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcategoria_producto=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcategoria_producto=Funciones::GetFinalQueryAppend($finalQueryGlobalcategoria_producto, '');
				$finalQueryGlobalcategoria_producto.=categoria_producto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcategoria_producto.$strRecargarFkQuery;		

				$categoria_productoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscategoria_productosFK($categoria_productoLogic->getcategoria_productos());

		} else {
			$this->setVisibleBusquedasParacategoria_producto(true);


			if($producto_session->bigidcategoria_productoActual!=null && $producto_session->bigidcategoria_productoActual > 0) {
				$categoria_productoLogic->getEntity($producto_session->bigidcategoria_productoActual);//WithConnection

				$this->categoria_productosFK[$categoria_productoLogic->getcategoria_producto()->getId()]=producto_util::getcategoria_productoDescripcion($categoria_productoLogic->getcategoria_producto());
				$this->idcategoria_productoDefaultFK=$categoria_productoLogic->getcategoria_producto()->getId();
			}
		}
	}

	public function cargarCombossub_categoria_productosFK($connexion=null,$strRecargarFkQuery=''){
		$sub_categoria_productoLogic= new sub_categoria_producto_logic();
		$pagination= new Pagination();
		$this->sub_categoria_productosFK=array();

		$sub_categoria_productoLogic->setConnexion($connexion);
		$sub_categoria_productoLogic->getsub_categoria_productoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesionsub_categoria_producto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=sub_categoria_producto_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalsub_categoria_producto=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalsub_categoria_producto=Funciones::GetFinalQueryAppend($finalQueryGlobalsub_categoria_producto, '');
				$finalQueryGlobalsub_categoria_producto.=sub_categoria_producto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalsub_categoria_producto.$strRecargarFkQuery;		

				$sub_categoria_productoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombossub_categoria_productosFK($sub_categoria_productoLogic->getsub_categoria_productos());

		} else {
			$this->setVisibleBusquedasParasub_categoria_producto(true);


			if($producto_session->bigidsub_categoria_productoActual!=null && $producto_session->bigidsub_categoria_productoActual > 0) {
				$sub_categoria_productoLogic->getEntity($producto_session->bigidsub_categoria_productoActual);//WithConnection

				$this->sub_categoria_productosFK[$sub_categoria_productoLogic->getsub_categoria_producto()->getId()]=producto_util::getsub_categoria_productoDescripcion($sub_categoria_productoLogic->getsub_categoria_producto());
				$this->idsub_categoria_productoDefaultFK=$sub_categoria_productoLogic->getsub_categoria_producto()->getId();
			}
		}
	}

	public function cargarCombosbodega_defectosFK($connexion=null,$strRecargarFkQuery=''){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$this->bodega_defectosFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesionbodega_defecto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=bodega_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalbodega=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalbodega=Funciones::GetFinalQueryAppend($finalQueryGlobalbodega, '');
				$finalQueryGlobalbodega.=bodega_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalbodega.$strRecargarFkQuery;		

				$bodegaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosbodega_defectosFK($bodegaLogic->getbodegas());

		} else {
			$this->setVisibleBusquedasParabodega_defecto(true);


			if($producto_session->bigidbodega_defectoActual!=null && $producto_session->bigidbodega_defectoActual > 0) {
				$bodegaLogic->getEntity($producto_session->bigidbodega_defectoActual);//WithConnection

				$this->bodega_defectosFK[$bodegaLogic->getbodega()->getId()]=producto_util::getbodega_defectoDescripcion($bodegaLogic->getbodega());
				$this->idbodega_defectoDefaultFK=$bodegaLogic->getbodega()->getId();
			}
		}
	}

	public function cargarCombosunidad_comprasFK($connexion=null,$strRecargarFkQuery=''){
		$unidadLogic= new unidad_logic();
		$pagination= new Pagination();
		$this->unidad_comprasFK=array();

		$unidadLogic->setConnexion($connexion);
		$unidadLogic->getunidadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesionunidad_compra!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=unidad_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalunidad=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalunidad=Funciones::GetFinalQueryAppend($finalQueryGlobalunidad, '');
				$finalQueryGlobalunidad.=unidad_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalunidad.$strRecargarFkQuery;		

				$unidadLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosunidad_comprasFK($unidadLogic->getunidads());

		} else {
			$this->setVisibleBusquedasParaunidad_compra(true);


			if($producto_session->bigidunidad_compraActual!=null && $producto_session->bigidunidad_compraActual > 0) {
				$unidadLogic->getEntity($producto_session->bigidunidad_compraActual);//WithConnection

				$this->unidad_comprasFK[$unidadLogic->getunidad()->getId()]=producto_util::getunidad_compraDescripcion($unidadLogic->getunidad());
				$this->idunidad_compraDefaultFK=$unidadLogic->getunidad()->getId();
			}
		}
	}

	public function cargarCombosunidad_ventasFK($connexion=null,$strRecargarFkQuery=''){
		$unidadLogic= new unidad_logic();
		$pagination= new Pagination();
		$this->unidad_ventasFK=array();

		$unidadLogic->setConnexion($connexion);
		$unidadLogic->getunidadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesionunidad_venta!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=unidad_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalunidad=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalunidad=Funciones::GetFinalQueryAppend($finalQueryGlobalunidad, '');
				$finalQueryGlobalunidad.=unidad_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalunidad.$strRecargarFkQuery;		

				$unidadLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosunidad_ventasFK($unidadLogic->getunidads());

		} else {
			$this->setVisibleBusquedasParaunidad_venta(true);


			if($producto_session->bigidunidad_ventaActual!=null && $producto_session->bigidunidad_ventaActual > 0) {
				$unidadLogic->getEntity($producto_session->bigidunidad_ventaActual);//WithConnection

				$this->unidad_ventasFK[$unidadLogic->getunidad()->getId()]=producto_util::getunidad_ventaDescripcion($unidadLogic->getunidad());
				$this->idunidad_ventaDefaultFK=$unidadLogic->getunidad()->getId();
			}
		}
	}

	public function cargarComboscuenta_ventasFK($connexion=null,$strRecargarFkQuery=''){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$this->cuenta_ventasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesioncuenta_venta!=true) {
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


			$this->prepararComboscuenta_ventasFK($cuentaLogic->getcuentas());

		} else {
			$this->setVisibleBusquedasParacuenta_venta(true);


			if($producto_session->bigidcuenta_ventaActual!=null && $producto_session->bigidcuenta_ventaActual > 0) {
				$cuentaLogic->getEntity($producto_session->bigidcuenta_ventaActual);//WithConnection

				$this->cuenta_ventasFK[$cuentaLogic->getcuenta()->getId()]=producto_util::getcuenta_ventaDescripcion($cuentaLogic->getcuenta());
				$this->idcuenta_ventaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarComboscuenta_comprasFK($connexion=null,$strRecargarFkQuery=''){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$this->cuenta_comprasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesioncuenta_compra!=true) {
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


			$this->prepararComboscuenta_comprasFK($cuentaLogic->getcuentas());

		} else {
			$this->setVisibleBusquedasParacuenta_compra(true);


			if($producto_session->bigidcuenta_compraActual!=null && $producto_session->bigidcuenta_compraActual > 0) {
				$cuentaLogic->getEntity($producto_session->bigidcuenta_compraActual);//WithConnection

				$this->cuenta_comprasFK[$cuentaLogic->getcuenta()->getId()]=producto_util::getcuenta_compraDescripcion($cuentaLogic->getcuenta());
				$this->idcuenta_compraDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarComboscuenta_costosFK($connexion=null,$strRecargarFkQuery=''){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$this->cuenta_costosFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesioncuenta_costo!=true) {
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


			$this->prepararComboscuenta_costosFK($cuentaLogic->getcuentas());

		} else {
			$this->setVisibleBusquedasParacuenta_costo(true);


			if($producto_session->bigidcuenta_costoActual!=null && $producto_session->bigidcuenta_costoActual > 0) {
				$cuentaLogic->getEntity($producto_session->bigidcuenta_costoActual);//WithConnection

				$this->cuenta_costosFK[$cuentaLogic->getcuenta()->getId()]=producto_util::getcuenta_costoDescripcion($cuentaLogic->getcuenta());
				$this->idcuenta_costoDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarCombosretencionsFK($connexion=null,$strRecargarFkQuery=''){
		$retencionLogic= new retencion_logic();
		$pagination= new Pagination();
		$this->retencionsFK=array();

		$retencionLogic->setConnexion($connexion);
		$retencionLogic->getretencionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		if($producto_session->bitBusquedaDesdeFKSesionretencion!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=retencion_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalretencion=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalretencion=Funciones::GetFinalQueryAppend($finalQueryGlobalretencion, '');
				$finalQueryGlobalretencion.=retencion_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalretencion.$strRecargarFkQuery;		

				$retencionLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosretencionsFK($retencionLogic->getretencions());

		} else {
			$this->setVisibleBusquedasPararetencion(true);


			if($producto_session->bigidretencionActual!=null && $producto_session->bigidretencionActual > 0) {
				$retencionLogic->getEntity($producto_session->bigidretencionActual);//WithConnection

				$this->retencionsFK[$retencionLogic->getretencion()->getId()]=producto_util::getretencionDescripcion($retencionLogic->getretencion());
				$this->idretencionDefaultFK=$retencionLogic->getretencion()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=producto_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombosproveedorsFK($proveedors){

		foreach ($proveedors as $proveedorLocal ) {
			if($this->idproveedorDefaultFK==0) {
				$this->idproveedorDefaultFK=$proveedorLocal->getId();
			}

			$this->proveedorsFK[$proveedorLocal->getId()]=producto_util::getproveedorDescripcion($proveedorLocal);
		}
	}

	public function prepararCombostipo_productosFK($tipo_productos){

		foreach ($tipo_productos as $tipo_productoLocal ) {
			if($this->idtipo_productoDefaultFK==0) {
				$this->idtipo_productoDefaultFK=$tipo_productoLocal->getId();
			}

			$this->tipo_productosFK[$tipo_productoLocal->getId()]=producto_util::gettipo_productoDescripcion($tipo_productoLocal);
		}
	}

	public function prepararCombosimpuestosFK($impuestos){

		foreach ($impuestos as $impuestoLocal ) {
			if($this->idimpuestoDefaultFK==0) {
				$this->idimpuestoDefaultFK=$impuestoLocal->getId();
			}

			$this->impuestosFK[$impuestoLocal->getId()]=producto_util::getimpuestoDescripcion($impuestoLocal);
		}
	}

	public function prepararCombosotro_impuestosFK($otro_impuestos){

		foreach ($otro_impuestos as $otro_impuestoLocal ) {
			if($this->idotro_impuestoDefaultFK==0) {
				$this->idotro_impuestoDefaultFK=$otro_impuestoLocal->getId();
			}

			$this->otro_impuestosFK[$otro_impuestoLocal->getId()]=producto_util::getotro_impuestoDescripcion($otro_impuestoLocal);
		}
	}

	public function prepararComboscategoria_productosFK($categoria_productos){

		foreach ($categoria_productos as $categoria_productoLocal ) {
			if($this->idcategoria_productoDefaultFK==0) {
				$this->idcategoria_productoDefaultFK=$categoria_productoLocal->getId();
			}

			$this->categoria_productosFK[$categoria_productoLocal->getId()]=producto_util::getcategoria_productoDescripcion($categoria_productoLocal);
		}
	}

	public function prepararCombossub_categoria_productosFK($sub_categoria_productos){

		foreach ($sub_categoria_productos as $sub_categoria_productoLocal ) {
			if($this->idsub_categoria_productoDefaultFK==0) {
				$this->idsub_categoria_productoDefaultFK=$sub_categoria_productoLocal->getId();
			}

			$this->sub_categoria_productosFK[$sub_categoria_productoLocal->getId()]=producto_util::getsub_categoria_productoDescripcion($sub_categoria_productoLocal);
		}
	}

	public function prepararCombosbodega_defectosFK($bodegas){

		foreach ($bodegas as $bodegaLocal ) {
			if($this->idbodega_defectoDefaultFK==0) {
				$this->idbodega_defectoDefaultFK=$bodegaLocal->getId();
			}

			$this->bodega_defectosFK[$bodegaLocal->getId()]=producto_util::getbodega_defectoDescripcion($bodegaLocal);
		}
	}

	public function prepararCombosunidad_comprasFK($unidads){

		foreach ($unidads as $unidadLocal ) {
			if($this->idunidad_compraDefaultFK==0) {
				$this->idunidad_compraDefaultFK=$unidadLocal->getId();
			}

			$this->unidad_comprasFK[$unidadLocal->getId()]=producto_util::getunidad_compraDescripcion($unidadLocal);
		}
	}

	public function prepararCombosunidad_ventasFK($unidads){

		foreach ($unidads as $unidadLocal ) {
			if($this->idunidad_ventaDefaultFK==0) {
				$this->idunidad_ventaDefaultFK=$unidadLocal->getId();
			}

			$this->unidad_ventasFK[$unidadLocal->getId()]=producto_util::getunidad_ventaDescripcion($unidadLocal);
		}
	}

	public function prepararComboscuenta_ventasFK($cuentas){

		foreach ($cuentas as $cuentaLocal ) {
			if($this->idcuenta_ventaDefaultFK==0) {
				$this->idcuenta_ventaDefaultFK=$cuentaLocal->getId();
			}

			$this->cuenta_ventasFK[$cuentaLocal->getId()]=producto_util::getcuenta_ventaDescripcion($cuentaLocal);
		}
	}

	public function prepararComboscuenta_comprasFK($cuentas){

		foreach ($cuentas as $cuentaLocal ) {
			if($this->idcuenta_compraDefaultFK==0) {
				$this->idcuenta_compraDefaultFK=$cuentaLocal->getId();
			}

			$this->cuenta_comprasFK[$cuentaLocal->getId()]=producto_util::getcuenta_compraDescripcion($cuentaLocal);
		}
	}

	public function prepararComboscuenta_costosFK($cuentas){

		foreach ($cuentas as $cuentaLocal ) {
			if($this->idcuenta_costoDefaultFK==0) {
				$this->idcuenta_costoDefaultFK=$cuentaLocal->getId();
			}

			$this->cuenta_costosFK[$cuentaLocal->getId()]=producto_util::getcuenta_costoDescripcion($cuentaLocal);
		}
	}

	public function prepararCombosretencionsFK($retencions){

		foreach ($retencions as $retencionLocal ) {
			if($this->idretencionDefaultFK==0) {
				$this->idretencionDefaultFK=$retencionLocal->getId();
			}

			$this->retencionsFK[$retencionLocal->getId()]=producto_util::getretencionDescripcion($retencionLocal);
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

			$strDescripcionempresa=producto_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
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

			$strDescripcionproveedor=producto_util::getproveedorDescripcion($proveedorLogic->getproveedor());

		} else {
			$strDescripcionproveedor='null';
		}

		return $strDescripcionproveedor;
	}

	public function cargarDescripciontipo_productoFK($idtipo_producto,$connexion=null){
		$tipo_productoLogic= new tipo_producto_logic();
		$tipo_productoLogic->setConnexion($connexion);
		$tipo_productoLogic->gettipo_productoDataAccess()->isForFKData=true;
		$strDescripciontipo_producto='';

		if($idtipo_producto!=null && $idtipo_producto!='' && $idtipo_producto!='null') {
			if($connexion!=null) {
				$tipo_productoLogic->getEntity($idtipo_producto);//WithConnection
			} else {
				$tipo_productoLogic->getEntityWithConnection($idtipo_producto);//
			}

			$strDescripciontipo_producto=producto_util::gettipo_productoDescripcion($tipo_productoLogic->gettipo_producto());

		} else {
			$strDescripciontipo_producto='null';
		}

		return $strDescripciontipo_producto;
	}

	public function cargarDescripcionimpuestoFK($idimpuesto,$connexion=null){
		$impuestoLogic= new impuesto_logic();
		$impuestoLogic->setConnexion($connexion);
		$impuestoLogic->getimpuestoDataAccess()->isForFKData=true;
		$strDescripcionimpuesto='';

		if($idimpuesto!=null && $idimpuesto!='' && $idimpuesto!='null') {
			if($connexion!=null) {
				$impuestoLogic->getEntity($idimpuesto);//WithConnection
			} else {
				$impuestoLogic->getEntityWithConnection($idimpuesto);//
			}

			$strDescripcionimpuesto=producto_util::getimpuestoDescripcion($impuestoLogic->getimpuesto());

		} else {
			$strDescripcionimpuesto='null';
		}

		return $strDescripcionimpuesto;
	}

	public function cargarDescripcionotro_impuestoFK($idotro_impuesto,$connexion=null){
		$otro_impuestoLogic= new otro_impuesto_logic();
		$otro_impuestoLogic->setConnexion($connexion);
		$otro_impuestoLogic->getotro_impuestoDataAccess()->isForFKData=true;
		$strDescripcionotro_impuesto='';

		if($idotro_impuesto!=null && $idotro_impuesto!='' && $idotro_impuesto!='null') {
			if($connexion!=null) {
				$otro_impuestoLogic->getEntity($idotro_impuesto);//WithConnection
			} else {
				$otro_impuestoLogic->getEntityWithConnection($idotro_impuesto);//
			}

			$strDescripcionotro_impuesto=producto_util::getotro_impuestoDescripcion($otro_impuestoLogic->getotro_impuesto());

		} else {
			$strDescripcionotro_impuesto='null';
		}

		return $strDescripcionotro_impuesto;
	}

	public function cargarDescripcioncategoria_productoFK($idcategoria_producto,$connexion=null){
		$categoria_productoLogic= new categoria_producto_logic();
		$categoria_productoLogic->setConnexion($connexion);
		$categoria_productoLogic->getcategoria_productoDataAccess()->isForFKData=true;
		$strDescripcioncategoria_producto='';

		if($idcategoria_producto!=null && $idcategoria_producto!='' && $idcategoria_producto!='null') {
			if($connexion!=null) {
				$categoria_productoLogic->getEntity($idcategoria_producto);//WithConnection
			} else {
				$categoria_productoLogic->getEntityWithConnection($idcategoria_producto);//
			}

			$strDescripcioncategoria_producto=producto_util::getcategoria_productoDescripcion($categoria_productoLogic->getcategoria_producto());

		} else {
			$strDescripcioncategoria_producto='null';
		}

		return $strDescripcioncategoria_producto;
	}

	public function cargarDescripcionsub_categoria_productoFK($idsub_categoria_producto,$connexion=null){
		$sub_categoria_productoLogic= new sub_categoria_producto_logic();
		$sub_categoria_productoLogic->setConnexion($connexion);
		$sub_categoria_productoLogic->getsub_categoria_productoDataAccess()->isForFKData=true;
		$strDescripcionsub_categoria_producto='';

		if($idsub_categoria_producto!=null && $idsub_categoria_producto!='' && $idsub_categoria_producto!='null') {
			if($connexion!=null) {
				$sub_categoria_productoLogic->getEntity($idsub_categoria_producto);//WithConnection
			} else {
				$sub_categoria_productoLogic->getEntityWithConnection($idsub_categoria_producto);//
			}

			$strDescripcionsub_categoria_producto=producto_util::getsub_categoria_productoDescripcion($sub_categoria_productoLogic->getsub_categoria_producto());

		} else {
			$strDescripcionsub_categoria_producto='null';
		}

		return $strDescripcionsub_categoria_producto;
	}

	public function cargarDescripcionbodega_defectoFK($idbodega,$connexion=null){
		$bodegaLogic= new bodega_logic();
		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$strDescripcionbodega='';

		if($idbodega!=null && $idbodega!='' && $idbodega!='null') {
			if($connexion!=null) {
				$bodegaLogic->getEntity($idbodega);//WithConnection
			} else {
				$bodegaLogic->getEntityWithConnection($idbodega);//
			}

			$strDescripcionbodega=producto_util::getbodega_defectoDescripcion($bodegaLogic->getbodega());

		} else {
			$strDescripcionbodega='null';
		}

		return $strDescripcionbodega;
	}

	public function cargarDescripcionunidad_compraFK($idunidad,$connexion=null){
		$unidadLogic= new unidad_logic();
		$unidadLogic->setConnexion($connexion);
		$unidadLogic->getunidadDataAccess()->isForFKData=true;
		$strDescripcionunidad='';

		if($idunidad!=null && $idunidad!='' && $idunidad!='null') {
			if($connexion!=null) {
				$unidadLogic->getEntity($idunidad);//WithConnection
			} else {
				$unidadLogic->getEntityWithConnection($idunidad);//
			}

			$strDescripcionunidad=producto_util::getunidad_compraDescripcion($unidadLogic->getunidad());

		} else {
			$strDescripcionunidad='null';
		}

		return $strDescripcionunidad;
	}

	public function cargarDescripcionunidad_ventaFK($idunidad,$connexion=null){
		$unidadLogic= new unidad_logic();
		$unidadLogic->setConnexion($connexion);
		$unidadLogic->getunidadDataAccess()->isForFKData=true;
		$strDescripcionunidad='';

		if($idunidad!=null && $idunidad!='' && $idunidad!='null') {
			if($connexion!=null) {
				$unidadLogic->getEntity($idunidad);//WithConnection
			} else {
				$unidadLogic->getEntityWithConnection($idunidad);//
			}

			$strDescripcionunidad=producto_util::getunidad_ventaDescripcion($unidadLogic->getunidad());

		} else {
			$strDescripcionunidad='null';
		}

		return $strDescripcionunidad;
	}

	public function cargarDescripcioncuenta_ventaFK($idcuenta,$connexion=null){
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

			$strDescripcioncuenta=producto_util::getcuenta_ventaDescripcion($cuentaLogic->getcuenta());

		} else {
			$strDescripcioncuenta='null';
		}

		return $strDescripcioncuenta;
	}

	public function cargarDescripcioncuenta_compraFK($idcuenta,$connexion=null){
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

			$strDescripcioncuenta=producto_util::getcuenta_compraDescripcion($cuentaLogic->getcuenta());

		} else {
			$strDescripcioncuenta='null';
		}

		return $strDescripcioncuenta;
	}

	public function cargarDescripcioncuenta_costoFK($idcuenta,$connexion=null){
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

			$strDescripcioncuenta=producto_util::getcuenta_costoDescripcion($cuentaLogic->getcuenta());

		} else {
			$strDescripcioncuenta='null';
		}

		return $strDescripcioncuenta;
	}

	public function cargarDescripcionretencionFK($idretencion,$connexion=null){
		$retencionLogic= new retencion_logic();
		$retencionLogic->setConnexion($connexion);
		$retencionLogic->getretencionDataAccess()->isForFKData=true;
		$strDescripcionretencion='';

		if($idretencion!=null && $idretencion!='' && $idretencion!='null') {
			if($connexion!=null) {
				$retencionLogic->getEntity($idretencion);//WithConnection
			} else {
				$retencionLogic->getEntityWithConnection($idretencion);//
			}

			$strDescripcionretencion=producto_util::getretencionDescripcion($retencionLogic->getretencion());

		} else {
			$strDescripcionretencion='null';
		}

		return $strDescripcionretencion;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(producto $productoClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$productoClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
			
			
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

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacionempresa;
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

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idproveedor=$strParaVisibleproveedor;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacionproveedor;
	}

	public function setVisibleBusquedasParatipo_producto($isParatipo_producto){
		$strParaVisibletipo_producto='display:table-row';
		$strParaVisibleNegaciontipo_producto='display:none';

		if($isParatipo_producto) {
			$strParaVisibletipo_producto='display:table-row';
			$strParaVisibleNegaciontipo_producto='display:none';
		} else {
			$strParaVisibletipo_producto='display:none';
			$strParaVisibleNegaciontipo_producto='display:table-row';
		}


		$strParaVisibleNegaciontipo_producto=trim($strParaVisibleNegaciontipo_producto);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibletipo_producto;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegaciontipo_producto;
	}

	public function setVisibleBusquedasParaimpuesto($isParaimpuesto){
		$strParaVisibleimpuesto='display:table-row';
		$strParaVisibleNegacionimpuesto='display:none';

		if($isParaimpuesto) {
			$strParaVisibleimpuesto='display:table-row';
			$strParaVisibleNegacionimpuesto='display:none';
		} else {
			$strParaVisibleimpuesto='display:none';
			$strParaVisibleNegacionimpuesto='display:table-row';
		}


		$strParaVisibleNegacionimpuesto=trim($strParaVisibleNegacionimpuesto);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleimpuesto;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacionimpuesto;
	}

	public function setVisibleBusquedasParaotro_impuesto($isParaotro_impuesto){
		$strParaVisibleotro_impuesto='display:table-row';
		$strParaVisibleNegacionotro_impuesto='display:none';

		if($isParaotro_impuesto) {
			$strParaVisibleotro_impuesto='display:table-row';
			$strParaVisibleNegacionotro_impuesto='display:none';
		} else {
			$strParaVisibleotro_impuesto='display:none';
			$strParaVisibleNegacionotro_impuesto='display:table-row';
		}


		$strParaVisibleNegacionotro_impuesto=trim($strParaVisibleNegacionotro_impuesto);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleotro_impuesto;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacionotro_impuesto;
	}

	public function setVisibleBusquedasParacategoria_producto($isParacategoria_producto){
		$strParaVisiblecategoria_producto='display:table-row';
		$strParaVisibleNegacioncategoria_producto='display:none';

		if($isParacategoria_producto) {
			$strParaVisiblecategoria_producto='display:table-row';
			$strParaVisibleNegacioncategoria_producto='display:none';
		} else {
			$strParaVisiblecategoria_producto='display:none';
			$strParaVisibleNegacioncategoria_producto='display:table-row';
		}


		$strParaVisibleNegacioncategoria_producto=trim($strParaVisibleNegacioncategoria_producto);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisiblecategoria_producto;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacioncategoria_producto;
	}

	public function setVisibleBusquedasParasub_categoria_producto($isParasub_categoria_producto){
		$strParaVisiblesub_categoria_producto='display:table-row';
		$strParaVisibleNegacionsub_categoria_producto='display:none';

		if($isParasub_categoria_producto) {
			$strParaVisiblesub_categoria_producto='display:table-row';
			$strParaVisibleNegacionsub_categoria_producto='display:none';
		} else {
			$strParaVisiblesub_categoria_producto='display:none';
			$strParaVisibleNegacionsub_categoria_producto='display:table-row';
		}


		$strParaVisibleNegacionsub_categoria_producto=trim($strParaVisibleNegacionsub_categoria_producto);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisiblesub_categoria_producto;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacionsub_categoria_producto;
	}

	public function setVisibleBusquedasParabodega_defecto($isParabodega_defecto){
		$strParaVisiblebodega_defecto='display:table-row';
		$strParaVisibleNegacionbodega_defecto='display:none';

		if($isParabodega_defecto) {
			$strParaVisiblebodega_defecto='display:table-row';
			$strParaVisibleNegacionbodega_defecto='display:none';
		} else {
			$strParaVisiblebodega_defecto='display:none';
			$strParaVisibleNegacionbodega_defecto='display:table-row';
		}


		$strParaVisibleNegacionbodega_defecto=trim($strParaVisibleNegacionbodega_defecto);

		$this->strVisibleFK_Idbodega=$strParaVisiblebodega_defecto;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacionbodega_defecto;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacionbodega_defecto;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegacionbodega_defecto;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacionbodega_defecto;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionbodega_defecto;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionbodega_defecto;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionbodega_defecto;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionbodega_defecto;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionbodega_defecto;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacionbodega_defecto;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionbodega_defecto;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionbodega_defecto;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacionbodega_defecto;
	}

	public function setVisibleBusquedasParaunidad_compra($isParaunidad_compra){
		$strParaVisibleunidad_compra='display:table-row';
		$strParaVisibleNegacionunidad_compra='display:none';

		if($isParaunidad_compra) {
			$strParaVisibleunidad_compra='display:table-row';
			$strParaVisibleNegacionunidad_compra='display:none';
		} else {
			$strParaVisibleunidad_compra='display:none';
			$strParaVisibleNegacionunidad_compra='display:table-row';
		}


		$strParaVisibleNegacionunidad_compra=trim($strParaVisibleNegacionunidad_compra);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleunidad_compra;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacionunidad_compra;
	}

	public function setVisibleBusquedasParaunidad_venta($isParaunidad_venta){
		$strParaVisibleunidad_venta='display:table-row';
		$strParaVisibleNegacionunidad_venta='display:none';

		if($isParaunidad_venta) {
			$strParaVisibleunidad_venta='display:table-row';
			$strParaVisibleNegacionunidad_venta='display:none';
		} else {
			$strParaVisibleunidad_venta='display:none';
			$strParaVisibleNegacionunidad_venta='display:table-row';
		}


		$strParaVisibleNegacionunidad_venta=trim($strParaVisibleNegacionunidad_venta);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleunidad_venta;
	}

	public function setVisibleBusquedasParacuenta_venta($isParacuenta_venta){
		$strParaVisiblecuenta_venta='display:table-row';
		$strParaVisibleNegacioncuenta_venta='display:none';

		if($isParacuenta_venta) {
			$strParaVisiblecuenta_venta='display:table-row';
			$strParaVisibleNegacioncuenta_venta='display:none';
		} else {
			$strParaVisiblecuenta_venta='display:none';
			$strParaVisibleNegacioncuenta_venta='display:table-row';
		}


		$strParaVisibleNegacioncuenta_venta=trim($strParaVisibleNegacioncuenta_venta);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisiblecuenta_venta;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacioncuenta_venta;
	}

	public function setVisibleBusquedasParacuenta_compra($isParacuenta_compra){
		$strParaVisiblecuenta_compra='display:table-row';
		$strParaVisibleNegacioncuenta_compra='display:none';

		if($isParacuenta_compra) {
			$strParaVisiblecuenta_compra='display:table-row';
			$strParaVisibleNegacioncuenta_compra='display:none';
		} else {
			$strParaVisiblecuenta_compra='display:none';
			$strParaVisibleNegacioncuenta_compra='display:table-row';
		}


		$strParaVisibleNegacioncuenta_compra=trim($strParaVisibleNegacioncuenta_compra);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisiblecuenta_compra;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacioncuenta_compra;
	}

	public function setVisibleBusquedasParacuenta_costo($isParacuenta_costo){
		$strParaVisiblecuenta_costo='display:table-row';
		$strParaVisibleNegacioncuenta_costo='display:none';

		if($isParacuenta_costo) {
			$strParaVisiblecuenta_costo='display:table-row';
			$strParaVisibleNegacioncuenta_costo='display:none';
		} else {
			$strParaVisiblecuenta_costo='display:none';
			$strParaVisibleNegacioncuenta_costo='display:table-row';
		}


		$strParaVisibleNegacioncuenta_costo=trim($strParaVisibleNegacioncuenta_costo);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacioncuenta_costo;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacioncuenta_costo;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacioncuenta_costo;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisiblecuenta_costo;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacioncuenta_costo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncuenta_costo;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacioncuenta_costo;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacioncuenta_costo;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacioncuenta_costo;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacioncuenta_costo;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacioncuenta_costo;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacioncuenta_costo;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacioncuenta_costo;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacioncuenta_costo;
	}

	public function setVisibleBusquedasPararetencion($isPararetencion){
		$strParaVisibleretencion='display:table-row';
		$strParaVisibleNegacionretencion='display:none';

		if($isPararetencion) {
			$strParaVisibleretencion='display:table-row';
			$strParaVisibleNegacionretencion='display:none';
		} else {
			$strParaVisibleretencion='display:none';
			$strParaVisibleNegacionretencion='display:table-row';
		}


		$strParaVisibleNegacionretencion=trim($strParaVisibleNegacionretencion);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idretencion=$strParaVisibleretencion;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacionretencion;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idproductoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproductoActual=$idproductoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproducto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaproveedor() {//$idproductoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproductoActual=$idproductoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.proveedor_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_proveedor(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_proveedor(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(proveedor_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproducto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatipo_producto() {//$idproductoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproductoActual=$idproductoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.tipo_producto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_producto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',tipo_producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_producto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_producto_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproducto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaimpuesto() {//$idproductoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproductoActual=$idproductoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.impuesto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_impuesto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',impuesto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_impuesto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(impuesto_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproducto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaotro_impuesto() {//$idproductoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproductoActual=$idproductoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.otro_impuesto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_otro_impuesto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',otro_impuesto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_otro_impuesto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(otro_impuesto_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproducto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacategoria_producto() {//$idproductoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproductoActual=$idproductoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.categoria_producto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_categoria_producto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',categoria_producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_categoria_producto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(categoria_producto_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproducto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParasub_categoria_producto() {//$idproductoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproductoActual=$idproductoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.sub_categoria_producto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sub_categoria_producto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',sub_categoria_producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sub_categoria_producto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(sub_categoria_producto_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproducto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParabodega_defecto() {//$idproductoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproductoActual=$idproductoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.bodega_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_bodega_defecto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',bodega_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_bodega_defecto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(bodega_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproducto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaunidad_compra() {//$idproductoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproductoActual=$idproductoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.unidad_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_unidad_compra(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',unidad_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_unidad_compra(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(unidad_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproducto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaunidad_venta() {//$idproductoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproductoActual=$idproductoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.unidad_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_unidad_venta(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',unidad_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_unidad_venta(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(unidad_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproducto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta_venta() {//$idproductoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproductoActual=$idproductoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_venta(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_venta(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproducto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta_compra() {//$idproductoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproductoActual=$idproductoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_compra(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_compra(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproducto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta_costo() {//$idproductoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproductoActual=$idproductoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_costo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_costo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproducto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaPararetencion() {//$idproductoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproductoActual=$idproductoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.retencion_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_retencion(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',retencion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_retencion(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(retencion_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproducto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParalista_precioes(int $idproductoActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idproductoActual=$idproductoActual;

		$bitPaginaPopuplista_precio=false;

		try {

			$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

			if($producto_session==null) {
				$producto_session=new producto_session();
			}

			$lista_precio_session=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME));

			if($lista_precio_session==null) {
				$lista_precio_session=new lista_precio_session();
			}

			$lista_precio_session->strUltimaBusqueda='FK_Idproducto';
			$lista_precio_session->strPathNavegacionActual=$producto_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.lista_precio_util::$STR_CLASS_WEB_TITULO;
			$lista_precio_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopuplista_precio=$lista_precio_session->bitPaginaPopup;
			$lista_precio_session->setPaginaPopupVariables(true);
			$bitPaginaPopuplista_precio=$lista_precio_session->bitPaginaPopup;
			$lista_precio_session->bitPermiteNavegacionHaciaFKDesde=false;
			$lista_precio_session->strNombrePaginaNavegacionHaciaFKDesde=producto_util::$STR_NOMBRE_OPCION;
			$lista_precio_session->bitBusquedaDesdeFKSesionproducto=true;
			$lista_precio_session->bigidproductoActual=$this->idproductoActual;

			$producto_session->bitBusquedaDesdeFKSesionFK=true;
			$producto_session->bigIdActualFK=$this->idproductoActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"lista_precio"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=producto_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"lista_precio"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(producto_util::$STR_SESSION_NAME,serialize($producto_session));
			$this->Session->write(lista_precio_util::$STR_SESSION_NAME,serialize($lista_precio_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopuplista_precio!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',lista_precio_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(lista_precio_util::$STR_CLASS_NAME,'inventario','','POPUP',$this->strTipoPaginaAuxiliarproducto,$this->strTipoUsuarioAuxiliarproducto,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',lista_precio_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(lista_precio_util::$STR_CLASS_NAME,'inventario','','NO-POPUP',$this->strTipoPaginaAuxiliarproducto,$this->strTipoUsuarioAuxiliarproducto,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaproducto_bodegas(int $idproductoActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idproductoActual=$idproductoActual;

		$bitPaginaPopupproducto_bodega=false;

		try {

			$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

			if($producto_session==null) {
				$producto_session=new producto_session();
			}

			$producto_bodega_session=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME));

			if($producto_bodega_session==null) {
				$producto_bodega_session=new producto_bodega_session();
			}

			$producto_bodega_session->strUltimaBusqueda='FK_Idproducto';
			$producto_bodega_session->strPathNavegacionActual=$producto_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.producto_bodega_util::$STR_CLASS_WEB_TITULO;
			$producto_bodega_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupproducto_bodega=$producto_bodega_session->bitPaginaPopup;
			$producto_bodega_session->setPaginaPopupVariables(true);
			$bitPaginaPopupproducto_bodega=$producto_bodega_session->bitPaginaPopup;
			$producto_bodega_session->bitPermiteNavegacionHaciaFKDesde=false;
			$producto_bodega_session->strNombrePaginaNavegacionHaciaFKDesde=producto_util::$STR_NOMBRE_OPCION;
			$producto_bodega_session->bitBusquedaDesdeFKSesionproducto=true;
			$producto_bodega_session->bigidproductoActual=$this->idproductoActual;

			$producto_session->bitBusquedaDesdeFKSesionFK=true;
			$producto_session->bigIdActualFK=$this->idproductoActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"producto_bodega"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=producto_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"producto_bodega"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(producto_util::$STR_SESSION_NAME,serialize($producto_session));
			$this->Session->write(producto_bodega_util::$STR_SESSION_NAME,serialize($producto_bodega_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupproducto_bodega!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',producto_bodega_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_bodega_util::$STR_CLASS_NAME,'inventario','','POPUP',$this->strTipoPaginaAuxiliarproducto,$this->strTipoUsuarioAuxiliarproducto,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',producto_bodega_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_bodega_util::$STR_CLASS_NAME,'inventario','','NO-POPUP',$this->strTipoPaginaAuxiliarproducto,$this->strTipoUsuarioAuxiliarproducto,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaotro_suplidores(int $idproductoActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idproductoActual=$idproductoActual;

		$bitPaginaPopupotro_suplidor=false;

		try {

			$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

			if($producto_session==null) {
				$producto_session=new producto_session();
			}

			$otro_suplidor_session=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME));

			if($otro_suplidor_session==null) {
				$otro_suplidor_session=new otro_suplidor_session();
			}

			$otro_suplidor_session->strUltimaBusqueda='FK_Idproducto';
			$otro_suplidor_session->strPathNavegacionActual=$producto_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.otro_suplidor_util::$STR_CLASS_WEB_TITULO;
			$otro_suplidor_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupotro_suplidor=$otro_suplidor_session->bitPaginaPopup;
			$otro_suplidor_session->setPaginaPopupVariables(true);
			$bitPaginaPopupotro_suplidor=$otro_suplidor_session->bitPaginaPopup;
			$otro_suplidor_session->bitPermiteNavegacionHaciaFKDesde=false;
			$otro_suplidor_session->strNombrePaginaNavegacionHaciaFKDesde=producto_util::$STR_NOMBRE_OPCION;
			$otro_suplidor_session->bitBusquedaDesdeFKSesionproducto=true;
			$otro_suplidor_session->bigidproductoActual=$this->idproductoActual;

			$producto_session->bitBusquedaDesdeFKSesionFK=true;
			$producto_session->bigIdActualFK=$this->idproductoActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"otro_suplidor"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=producto_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"otro_suplidor"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(producto_util::$STR_SESSION_NAME,serialize($producto_session));
			$this->Session->write(otro_suplidor_util::$STR_SESSION_NAME,serialize($otro_suplidor_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupotro_suplidor!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',otro_suplidor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(otro_suplidor_util::$STR_CLASS_NAME,'inventario','','POPUP',$this->strTipoPaginaAuxiliarproducto,$this->strTipoUsuarioAuxiliarproducto,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',otro_suplidor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(otro_suplidor_util::$STR_CLASS_NAME,'inventario','','NO-POPUP',$this->strTipoPaginaAuxiliarproducto,$this->strTipoUsuarioAuxiliarproducto,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParalista_clientes(int $idproductoActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idproductoActual=$idproductoActual;

		$bitPaginaPopuplista_cliente=false;

		try {

			$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

			if($producto_session==null) {
				$producto_session=new producto_session();
			}

			$lista_cliente_session=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME));

			if($lista_cliente_session==null) {
				$lista_cliente_session=new lista_cliente_session();
			}

			$lista_cliente_session->strUltimaBusqueda='FK_Idproducto';
			$lista_cliente_session->strPathNavegacionActual=$producto_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.lista_cliente_util::$STR_CLASS_WEB_TITULO;
			$lista_cliente_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopuplista_cliente=$lista_cliente_session->bitPaginaPopup;
			$lista_cliente_session->setPaginaPopupVariables(true);
			$bitPaginaPopuplista_cliente=$lista_cliente_session->bitPaginaPopup;
			$lista_cliente_session->bitPermiteNavegacionHaciaFKDesde=false;
			$lista_cliente_session->strNombrePaginaNavegacionHaciaFKDesde=producto_util::$STR_NOMBRE_OPCION;
			$lista_cliente_session->bitBusquedaDesdeFKSesionproducto=true;
			$lista_cliente_session->bigidproductoActual=$this->idproductoActual;

			$producto_session->bitBusquedaDesdeFKSesionFK=true;
			$producto_session->bigIdActualFK=$this->idproductoActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"lista_cliente"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=producto_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"lista_cliente"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(producto_util::$STR_SESSION_NAME,serialize($producto_session));
			$this->Session->write(lista_cliente_util::$STR_SESSION_NAME,serialize($lista_cliente_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopuplista_cliente!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',lista_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(lista_cliente_util::$STR_CLASS_NAME,'inventario','','POPUP',$this->strTipoPaginaAuxiliarproducto,$this->strTipoUsuarioAuxiliarproducto,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',lista_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(lista_cliente_util::$STR_CLASS_NAME,'inventario','','NO-POPUP',$this->strTipoPaginaAuxiliarproducto,$this->strTipoUsuarioAuxiliarproducto,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaimagen_productos(int $idproductoActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idproductoActual=$idproductoActual;

		$bitPaginaPopupimagen_producto=false;

		try {

			$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

			if($producto_session==null) {
				$producto_session=new producto_session();
			}

			$imagen_producto_session=unserialize($this->Session->read(imagen_producto_util::$STR_SESSION_NAME));

			if($imagen_producto_session==null) {
				$imagen_producto_session=new imagen_producto_session();
			}

			$imagen_producto_session->strUltimaBusqueda='FK_Idproducto';
			$imagen_producto_session->strPathNavegacionActual=$producto_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.imagen_producto_util::$STR_CLASS_WEB_TITULO;
			$imagen_producto_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupimagen_producto=$imagen_producto_session->bitPaginaPopup;
			$imagen_producto_session->setPaginaPopupVariables(true);
			$bitPaginaPopupimagen_producto=$imagen_producto_session->bitPaginaPopup;
			$imagen_producto_session->bitPermiteNavegacionHaciaFKDesde=false;
			$imagen_producto_session->strNombrePaginaNavegacionHaciaFKDesde=producto_util::$STR_NOMBRE_OPCION;
			$imagen_producto_session->bitBusquedaDesdeFKSesionproducto=true;
			$imagen_producto_session->bigidproductoActual=$this->idproductoActual;

			$producto_session->bitBusquedaDesdeFKSesionFK=true;
			$producto_session->bigIdActualFK=$this->idproductoActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"imagen_producto"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=producto_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"imagen_producto"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(producto_util::$STR_SESSION_NAME,serialize($producto_session));
			$this->Session->write(imagen_producto_util::$STR_SESSION_NAME,serialize($imagen_producto_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupimagen_producto!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',imagen_producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(imagen_producto_util::$STR_CLASS_NAME,'inventario','','POPUP',$this->strTipoPaginaAuxiliarproducto,$this->strTipoUsuarioAuxiliarproducto,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',imagen_producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(imagen_producto_util::$STR_CLASS_NAME,'inventario','','NO-POPUP',$this->strTipoPaginaAuxiliarproducto,$this->strTipoUsuarioAuxiliarproducto,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParalista_productoes(int $idproductoActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idproductoActual=$idproductoActual;

		$bitPaginaPopuplista_producto=false;

		try {

			$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

			if($producto_session==null) {
				$producto_session=new producto_session();
			}

			$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

			if($lista_producto_session==null) {
				$lista_producto_session=new lista_producto_session();
			}

			$lista_producto_session->strUltimaBusqueda='FK_Idproducto';
			$lista_producto_session->strPathNavegacionActual=$producto_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.lista_producto_util::$STR_CLASS_WEB_TITULO;
			$lista_producto_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopuplista_producto=$lista_producto_session->bitPaginaPopup;
			$lista_producto_session->setPaginaPopupVariables(true);
			$bitPaginaPopuplista_producto=$lista_producto_session->bitPaginaPopup;
			$lista_producto_session->bitPermiteNavegacionHaciaFKDesde=false;
			$lista_producto_session->strNombrePaginaNavegacionHaciaFKDesde=producto_util::$STR_NOMBRE_OPCION;
			$lista_producto_session->bitBusquedaDesdeFKSesionproducto=true;
			$lista_producto_session->bigidproductoActual=$this->idproductoActual;

			$producto_session->bitBusquedaDesdeFKSesionFK=true;
			$producto_session->bigIdActualFK=$this->idproductoActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"lista_producto"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=producto_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"lista_producto"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(producto_util::$STR_SESSION_NAME,serialize($producto_session));
			$this->Session->write(lista_producto_util::$STR_SESSION_NAME,serialize($lista_producto_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopuplista_producto!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',lista_producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(lista_producto_util::$STR_CLASS_NAME,'inventario','','POPUP',$this->strTipoPaginaAuxiliarproducto,$this->strTipoUsuarioAuxiliarproducto,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',lista_producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(lista_producto_util::$STR_CLASS_NAME,'inventario','','NO-POPUP',$this->strTipoPaginaAuxiliarproducto,$this->strTipoUsuarioAuxiliarproducto,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(producto_util::$STR_SESSION_NAME,producto_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$producto_session=$this->Session->read(producto_util::$STR_SESSION_NAME);
				
		if($producto_session==null) {
			$producto_session=new producto_session();		
			//$this->Session->write('producto_session',$producto_session);							
		}
		*/
		
		$producto_session=new producto_session();
    	$producto_session->strPathNavegacionActual=producto_util::$STR_CLASS_WEB_TITULO;
    	$producto_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(producto_util::$STR_SESSION_NAME,serialize($producto_session));		
	}	
	
	public function getSetBusquedasSesionConfig(producto_session $producto_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($producto_session->bitBusquedaDesdeFKSesionFK!=null && $producto_session->bitBusquedaDesdeFKSesionFK==true) {
			if($producto_session->bigIdActualFK!=null && $producto_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$producto_session->bigIdActualFKParaPosibleAtras=$producto_session->bigIdActualFK;*/
			}
				
			$producto_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$producto_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(producto_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($producto_session->bitBusquedaDesdeFKSesionempresa!=null && $producto_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($producto_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($producto_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($producto_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$producto_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$producto_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;

				if($producto_session->intNumeroPaginacion==producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_session->intNumeroPaginacion;
				}
			}
			else if($producto_session->bitBusquedaDesdeFKSesionproveedor!=null && $producto_session->bitBusquedaDesdeFKSesionproveedor==true)
			{
				if($producto_session->bigidproveedorActual!=0) {
					$this->strAccionBusqueda='FK_Idproveedor';

					$existe_history=HistoryWeb::ExisteElemento(producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($producto_session->bigidproveedorActualDescripcion);
						$historyWeb->setIdActual($producto_session->bigidproveedorActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$producto_session->bigidproveedorActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$producto_session->bitBusquedaDesdeFKSesionproveedor=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;

				if($producto_session->intNumeroPaginacion==producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_session->intNumeroPaginacion;
				}
			}
			else if($producto_session->bitBusquedaDesdeFKSesiontipo_producto!=null && $producto_session->bitBusquedaDesdeFKSesiontipo_producto==true)
			{
				if($producto_session->bigidtipo_productoActual!=0) {
					$this->strAccionBusqueda='FK_Idtipo_producto';

					$existe_history=HistoryWeb::ExisteElemento(producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($producto_session->bigidtipo_productoActualDescripcion);
						$historyWeb->setIdActual($producto_session->bigidtipo_productoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$producto_session->bigidtipo_productoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$producto_session->bitBusquedaDesdeFKSesiontipo_producto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;

				if($producto_session->intNumeroPaginacion==producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_session->intNumeroPaginacion;
				}
			}
			else if($producto_session->bitBusquedaDesdeFKSesionimpuesto!=null && $producto_session->bitBusquedaDesdeFKSesionimpuesto==true)
			{
				if($producto_session->bigidimpuestoActual!=0) {
					$this->strAccionBusqueda='FK_Idimpuesto';

					$existe_history=HistoryWeb::ExisteElemento(producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($producto_session->bigidimpuestoActualDescripcion);
						$historyWeb->setIdActual($producto_session->bigidimpuestoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$producto_session->bigidimpuestoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$producto_session->bitBusquedaDesdeFKSesionimpuesto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;

				if($producto_session->intNumeroPaginacion==producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_session->intNumeroPaginacion;
				}
			}
			else if($producto_session->bitBusquedaDesdeFKSesionotro_impuesto!=null && $producto_session->bitBusquedaDesdeFKSesionotro_impuesto==true)
			{
				if($producto_session->bigidotro_impuestoActual!=0) {
					$this->strAccionBusqueda='FK_Idotro_impuesto';

					$existe_history=HistoryWeb::ExisteElemento(producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($producto_session->bigidotro_impuestoActualDescripcion);
						$historyWeb->setIdActual($producto_session->bigidotro_impuestoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$producto_session->bigidotro_impuestoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$producto_session->bitBusquedaDesdeFKSesionotro_impuesto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;

				if($producto_session->intNumeroPaginacion==producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_session->intNumeroPaginacion;
				}
			}
			else if($producto_session->bitBusquedaDesdeFKSesioncategoria_producto!=null && $producto_session->bitBusquedaDesdeFKSesioncategoria_producto==true)
			{
				if($producto_session->bigidcategoria_productoActual!=0) {
					$this->strAccionBusqueda='FK_Idcategoria_producto';

					$existe_history=HistoryWeb::ExisteElemento(producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($producto_session->bigidcategoria_productoActualDescripcion);
						$historyWeb->setIdActual($producto_session->bigidcategoria_productoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$producto_session->bigidcategoria_productoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$producto_session->bitBusquedaDesdeFKSesioncategoria_producto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;

				if($producto_session->intNumeroPaginacion==producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_session->intNumeroPaginacion;
				}
			}
			else if($producto_session->bitBusquedaDesdeFKSesionsub_categoria_producto!=null && $producto_session->bitBusquedaDesdeFKSesionsub_categoria_producto==true)
			{
				if($producto_session->bigidsub_categoria_productoActual!=0) {
					$this->strAccionBusqueda='FK_Idsub_categoria_producto';

					$existe_history=HistoryWeb::ExisteElemento(producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($producto_session->bigidsub_categoria_productoActualDescripcion);
						$historyWeb->setIdActual($producto_session->bigidsub_categoria_productoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$producto_session->bigidsub_categoria_productoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$producto_session->bitBusquedaDesdeFKSesionsub_categoria_producto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;

				if($producto_session->intNumeroPaginacion==producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_session->intNumeroPaginacion;
				}
			}
			else if($producto_session->bitBusquedaDesdeFKSesionbodega_defecto!=null && $producto_session->bitBusquedaDesdeFKSesionbodega_defecto==true)
			{
				if($producto_session->bigidbodega_defectoActual!=0) {
					$this->strAccionBusqueda='FK_Idbodega_defecto';

					$existe_history=HistoryWeb::ExisteElemento(producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($producto_session->bigidbodega_defectoActualDescripcion);
						$historyWeb->setIdActual($producto_session->bigidbodega_defectoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$producto_session->bigidbodega_defectoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$producto_session->bitBusquedaDesdeFKSesionbodega_defecto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;

				if($producto_session->intNumeroPaginacion==producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_session->intNumeroPaginacion;
				}
			}
			else if($producto_session->bitBusquedaDesdeFKSesionunidad_compra!=null && $producto_session->bitBusquedaDesdeFKSesionunidad_compra==true)
			{
				if($producto_session->bigidunidad_compraActual!=0) {
					$this->strAccionBusqueda='FK_Idunidad_compra';

					$existe_history=HistoryWeb::ExisteElemento(producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($producto_session->bigidunidad_compraActualDescripcion);
						$historyWeb->setIdActual($producto_session->bigidunidad_compraActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$producto_session->bigidunidad_compraActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$producto_session->bitBusquedaDesdeFKSesionunidad_compra=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;

				if($producto_session->intNumeroPaginacion==producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_session->intNumeroPaginacion;
				}
			}
			else if($producto_session->bitBusquedaDesdeFKSesionunidad_venta!=null && $producto_session->bitBusquedaDesdeFKSesionunidad_venta==true)
			{
				if($producto_session->bigidunidad_ventaActual!=0) {
					$this->strAccionBusqueda='FK_Idunidad_venta';

					$existe_history=HistoryWeb::ExisteElemento(producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($producto_session->bigidunidad_ventaActualDescripcion);
						$historyWeb->setIdActual($producto_session->bigidunidad_ventaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$producto_session->bigidunidad_ventaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$producto_session->bitBusquedaDesdeFKSesionunidad_venta=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;

				if($producto_session->intNumeroPaginacion==producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_session->intNumeroPaginacion;
				}
			}
			else if($producto_session->bitBusquedaDesdeFKSesioncuenta_venta!=null && $producto_session->bitBusquedaDesdeFKSesioncuenta_venta==true)
			{
				if($producto_session->bigidcuenta_ventaActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta_venta';

					$existe_history=HistoryWeb::ExisteElemento(producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($producto_session->bigidcuenta_ventaActualDescripcion);
						$historyWeb->setIdActual($producto_session->bigidcuenta_ventaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$producto_session->bigidcuenta_ventaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$producto_session->bitBusquedaDesdeFKSesioncuenta_venta=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;

				if($producto_session->intNumeroPaginacion==producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_session->intNumeroPaginacion;
				}
			}
			else if($producto_session->bitBusquedaDesdeFKSesioncuenta_compra!=null && $producto_session->bitBusquedaDesdeFKSesioncuenta_compra==true)
			{
				if($producto_session->bigidcuenta_compraActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta_compra';

					$existe_history=HistoryWeb::ExisteElemento(producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($producto_session->bigidcuenta_compraActualDescripcion);
						$historyWeb->setIdActual($producto_session->bigidcuenta_compraActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$producto_session->bigidcuenta_compraActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$producto_session->bitBusquedaDesdeFKSesioncuenta_compra=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;

				if($producto_session->intNumeroPaginacion==producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_session->intNumeroPaginacion;
				}
			}
			else if($producto_session->bitBusquedaDesdeFKSesioncuenta_costo!=null && $producto_session->bitBusquedaDesdeFKSesioncuenta_costo==true)
			{
				if($producto_session->bigidcuenta_costoActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta_costo';

					$existe_history=HistoryWeb::ExisteElemento(producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($producto_session->bigidcuenta_costoActualDescripcion);
						$historyWeb->setIdActual($producto_session->bigidcuenta_costoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$producto_session->bigidcuenta_costoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$producto_session->bitBusquedaDesdeFKSesioncuenta_costo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;

				if($producto_session->intNumeroPaginacion==producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_session->intNumeroPaginacion;
				}
			}
			else if($producto_session->bitBusquedaDesdeFKSesionretencion!=null && $producto_session->bitBusquedaDesdeFKSesionretencion==true)
			{
				if($producto_session->bigidretencionActual!=0) {
					$this->strAccionBusqueda='FK_Idretencion';

					$existe_history=HistoryWeb::ExisteElemento(producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($producto_session->bigidretencionActualDescripcion);
						$historyWeb->setIdActual($producto_session->bigidretencionActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$producto_session->bigidretencionActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$producto_session->bitBusquedaDesdeFKSesionretencion=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;

				if($producto_session->intNumeroPaginacion==producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$producto_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));
		
		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		$producto_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$producto_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$producto_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idbodega') {
			$producto_session->id_bodega_defecto=$this->id_bodega_defectoFK_Idbodega;	

		}
		else if($this->strAccionBusqueda=='FK_Idcategoria_producto') {
			$producto_session->id_categoria_producto=$this->id_categoria_productoFK_Idcategoria_producto;	

		}
		else if($this->strAccionBusqueda=='FK_Idcuenta_compra') {
			$producto_session->id_cuenta_compra=$this->id_cuenta_compraFK_Idcuenta_compra;	

		}
		else if($this->strAccionBusqueda=='FK_Idcuenta_inventario') {
			$producto_session->id_cuenta_costo=$this->id_cuenta_costoFK_Idcuenta_inventario;	

		}
		else if($this->strAccionBusqueda=='FK_Idcuenta_venta') {
			$producto_session->id_cuenta_venta=$this->id_cuenta_ventaFK_Idcuenta_venta;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$producto_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idimpuesto') {
			$producto_session->id_impuesto=$this->id_impuestoFK_Idimpuesto;	

		}
		else if($this->strAccionBusqueda=='FK_Idotro_impuesto') {
			$producto_session->id_otro_impuesto=$this->id_otro_impuestoFK_Idotro_impuesto;	

		}
		else if($this->strAccionBusqueda=='FK_Idproveedor') {
			$producto_session->id_proveedor=$this->id_proveedorFK_Idproveedor;	

		}
		else if($this->strAccionBusqueda=='FK_Idretencion') {
			$producto_session->id_retencion=$this->id_retencionFK_Idretencion;	

		}
		else if($this->strAccionBusqueda=='FK_Idsub_categoria_producto') {
			$producto_session->id_sub_categoria_producto=$this->id_sub_categoria_productoFK_Idsub_categoria_producto;	

		}
		else if($this->strAccionBusqueda=='FK_Idtipo_producto') {
			$producto_session->id_tipo_producto=$this->id_tipo_productoFK_Idtipo_producto;	

		}
		else if($this->strAccionBusqueda=='FK_Idunidad_compra') {
			$producto_session->id_unidad_compra=$this->id_unidad_compraFK_Idunidad_compra;	

		}
		else if($this->strAccionBusqueda=='FK_Idunidad_venta') {
			$producto_session->id_unidad_venta=$this->id_unidad_ventaFK_Idunidad_venta;	

		}
		
		$this->Session->write(producto_util::$STR_SESSION_NAME,serialize($producto_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(producto_session $producto_session) {
		
		if($producto_session==null) {
			$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));
		}
		
		if($producto_session==null) {
		   $producto_session=new producto_session();
		}
		
		if($producto_session->strUltimaBusqueda!=null && $producto_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$producto_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$producto_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$producto_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idbodega') {
				$this->id_bodega_defectoFK_Idbodega=$producto_session->id_bodega_defecto;
				$producto_session->id_bodega_defecto=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idcategoria_producto') {
				$this->id_categoria_productoFK_Idcategoria_producto=$producto_session->id_categoria_producto;
				$producto_session->id_categoria_producto=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idcuenta_compra') {
				$this->id_cuenta_compraFK_Idcuenta_compra=$producto_session->id_cuenta_compra;
				$producto_session->id_cuenta_compra=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idcuenta_inventario') {
				$this->id_cuenta_costoFK_Idcuenta_inventario=$producto_session->id_cuenta_costo;
				$producto_session->id_cuenta_costo=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idcuenta_venta') {
				$this->id_cuenta_ventaFK_Idcuenta_venta=$producto_session->id_cuenta_venta;
				$producto_session->id_cuenta_venta=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$producto_session->id_empresa;
				$producto_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idimpuesto') {
				$this->id_impuestoFK_Idimpuesto=$producto_session->id_impuesto;
				$producto_session->id_impuesto=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idotro_impuesto') {
				$this->id_otro_impuestoFK_Idotro_impuesto=$producto_session->id_otro_impuesto;
				$producto_session->id_otro_impuesto=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idproveedor') {
				$this->id_proveedorFK_Idproveedor=$producto_session->id_proveedor;
				$producto_session->id_proveedor=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idretencion') {
				$this->id_retencionFK_Idretencion=$producto_session->id_retencion;
				$producto_session->id_retencion=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idsub_categoria_producto') {
				$this->id_sub_categoria_productoFK_Idsub_categoria_producto=$producto_session->id_sub_categoria_producto;
				$producto_session->id_sub_categoria_producto=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtipo_producto') {
				$this->id_tipo_productoFK_Idtipo_producto=$producto_session->id_tipo_producto;
				$producto_session->id_tipo_producto=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idunidad_compra') {
				$this->id_unidad_compraFK_Idunidad_compra=$producto_session->id_unidad_compra;
				$producto_session->id_unidad_compra=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idunidad_venta') {
				$this->id_unidad_ventaFK_Idunidad_venta=$producto_session->id_unidad_venta;
				$producto_session->id_unidad_venta=-1;

			}
		}
		
		$producto_session->strUltimaBusqueda='';
		//$producto_session->intNumeroPaginacion=10;
		$producto_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(producto_util::$STR_SESSION_NAME,serialize($producto_session));		
	}
	
	public function productosControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idproveedorDefaultFK = 0;
		$this->idtipo_productoDefaultFK = 0;
		$this->idimpuestoDefaultFK = 0;
		$this->idotro_impuestoDefaultFK = 0;
		$this->idcategoria_productoDefaultFK = 0;
		$this->idsub_categoria_productoDefaultFK = 0;
		$this->idbodega_defectoDefaultFK = 0;
		$this->idunidad_compraDefaultFK = 0;
		$this->idunidad_ventaDefaultFK = 0;
		$this->idcuenta_ventaDefaultFK = 0;
		$this->idcuenta_compraDefaultFK = 0;
		$this->idcuenta_costoDefaultFK = 0;
		$this->idretencionDefaultFK = 0;
	}
	
	public function setproductoFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_proveedor',$this->idproveedorDefaultFK);
		$this->setExistDataCampoForm('form','id_tipo_producto',$this->idtipo_productoDefaultFK);
		$this->setExistDataCampoForm('form','id_impuesto',$this->idimpuestoDefaultFK);
		$this->setExistDataCampoForm('form','id_otro_impuesto',$this->idotro_impuestoDefaultFK);
		$this->setExistDataCampoForm('form','id_categoria_producto',$this->idcategoria_productoDefaultFK);
		$this->setExistDataCampoForm('form','id_sub_categoria_producto',$this->idsub_categoria_productoDefaultFK);
		$this->setExistDataCampoForm('form','id_bodega_defecto',$this->idbodega_defectoDefaultFK);
		$this->setExistDataCampoForm('form','id_unidad_compra',$this->idunidad_compraDefaultFK);
		$this->setExistDataCampoForm('form','id_unidad_venta',$this->idunidad_ventaDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta_venta',$this->idcuenta_ventaDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta_compra',$this->idcuenta_compraDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta_costo',$this->idcuenta_costoDefaultFK);
		$this->setExistDataCampoForm('form','id_retencion',$this->idretencionDefaultFK);
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

		proveedor::$class;
		proveedor_carga::$CONTROLLER;

		tipo_producto::$class;
		tipo_producto_carga::$CONTROLLER;

		impuesto::$class;
		impuesto_carga::$CONTROLLER;

		otro_impuesto::$class;
		otro_impuesto_carga::$CONTROLLER;

		categoria_producto::$class;
		categoria_producto_carga::$CONTROLLER;

		sub_categoria_producto::$class;
		sub_categoria_producto_carga::$CONTROLLER;

		bodega::$class;
		bodega_carga::$CONTROLLER;

		unidad::$class;
		unidad_carga::$CONTROLLER;

		cuenta::$class;
		cuenta_carga::$CONTROLLER;

		retencion::$class;
		retencion_carga::$CONTROLLER;
		
		//REL
		

		lista_precio_carga::$CONTROLLER;
		lista_precio_util::$STR_SCHEMA;
		lista_precio_session::class;

		producto_bodega_carga::$CONTROLLER;
		producto_bodega_util::$STR_SCHEMA;
		producto_bodega_session::class;

		otro_suplidor_carga::$CONTROLLER;
		otro_suplidor_util::$STR_SCHEMA;
		otro_suplidor_session::class;

		lista_cliente_carga::$CONTROLLER;
		lista_cliente_util::$STR_SCHEMA;
		lista_cliente_session::class;
		bodega_session::class;

		imagen_producto_carga::$CONTROLLER;
		imagen_producto_util::$STR_SCHEMA;
		imagen_producto_session::class;

		lista_producto_carga::$CONTROLLER;
		lista_producto_util::$STR_SCHEMA;
		lista_producto_session::class;
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
		interface producto_controlI {	
		
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
		
		public function onLoad(producto_session $producto_session=null);	
		function index(?string $strTypeOnLoadproducto='',?string $strTipoPaginaAuxiliarproducto='',?string $strTipoUsuarioAuxiliarproducto='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadproducto='',string $strTipoPaginaAuxiliarproducto='',string $strTipoUsuarioAuxiliarproducto='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($productoReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(producto $productoClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(producto_session $producto_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(producto_session $producto_session);	
		public function productosControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setproductoFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
