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

namespace com\bydan\contabilidad\inventario\lista_producto\presentation\control;

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

use com\bydan\contabilidad\inventario\lista_producto\business\entity\lista_producto;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/lista_producto/util/lista_producto_carga.php');
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;

use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_param_return;
use com\bydan\contabilidad\inventario\lista_producto\business\logic\lista_producto_logic;
use com\bydan\contabilidad\inventario\lista_producto\presentation\session\lista_producto_session;


//FK


use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;
use com\bydan\contabilidad\inventario\unidad\business\logic\unidad_logic;
use com\bydan\contabilidad\inventario\unidad\util\unidad_carga;
use com\bydan\contabilidad\inventario\unidad\util\unidad_util;

use com\bydan\contabilidad\inventario\categoria_producto\business\entity\categoria_producto;
use com\bydan\contabilidad\inventario\categoria_producto\business\logic\categoria_producto_logic;
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_carga;
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_util;

use com\bydan\contabilidad\inventario\sub_categoria_producto\business\entity\sub_categoria_producto;
use com\bydan\contabilidad\inventario\sub_categoria_producto\business\logic\sub_categoria_producto_logic;
use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_carga;
use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_util;

use com\bydan\contabilidad\inventario\tipo_producto\business\entity\tipo_producto;
use com\bydan\contabilidad\inventario\tipo_producto\business\logic\tipo_producto_logic;
use com\bydan\contabilidad\inventario\tipo_producto\util\tipo_producto_carga;
use com\bydan\contabilidad\inventario\tipo_producto\util\tipo_producto_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_carga;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\inventario\otro_suplidor\business\entity\otro_suplidor;
use com\bydan\contabilidad\inventario\otro_suplidor\business\logic\otro_suplidor_logic;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_carga;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_util;

use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;
use com\bydan\contabilidad\facturacion\impuesto\business\logic\impuesto_logic;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_carga;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_util;

use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\logic\otro_impuesto_logic;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_carga;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_util;

use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;
use com\bydan\contabilidad\facturacion\retencion\business\logic\retencion_logic;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_carga;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
lista_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
lista_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
lista_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
lista_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*lista_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/inventario/lista_producto/presentation/control/lista_producto_init_control.php');
use com\bydan\contabilidad\inventario\lista_producto\presentation\control\lista_producto_init_control;

include_once('com/bydan/contabilidad/inventario/lista_producto/presentation/control/lista_producto_base_control.php');
use com\bydan\contabilidad\inventario\lista_producto\presentation\control\lista_producto_base_control;

class lista_producto_control extends lista_producto_base_control {	
	
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
			else if($action=="FK_Idimpuesto"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdimpuestoParaProcesar();
			}
			else if($action=="FK_Idimpuesto_compras"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idimpuesto_comprasParaProcesar();
			}
			else if($action=="FK_Idimpuesto_ventas"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idimpuesto_ventasParaProcesar();
			}
			else if($action=="FK_Idotro_impuesto"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idotro_impuestoParaProcesar();
			}
			else if($action=="FK_Idotro_impuesto_compras"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idotro_impuesto_comprasParaProcesar();
			}
			else if($action=="FK_Idotro_impuesto_ventas"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idotro_impuesto_ventasParaProcesar();
			}
			else if($action=="FK_Idotro_suplidor"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idotro_suplidorParaProcesar();
			}
			else if($action=="FK_Idproducto"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdproductoParaProcesar();
			}
			else if($action=="FK_Idretencion"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdretencionParaProcesar();
			}
			else if($action=="FK_Idretencion_compras"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idretencion_comprasParaProcesar();
			}
			else if($action=="FK_Idretencion_ventas"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idretencion_ventasParaProcesar();
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
			
			
			else if($action=='abrirBusquedaParaproducto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idlista_productoActual=$this->getDataId();
				$this->abrirBusquedaParaproducto();//$idlista_productoActual
			}
			else if($action=='abrirBusquedaParaunidad_compra') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idlista_productoActual=$this->getDataId();
				$this->abrirBusquedaParaunidad_compra();//$idlista_productoActual
			}
			else if($action=='abrirBusquedaParaunidad_venta') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idlista_productoActual=$this->getDataId();
				$this->abrirBusquedaParaunidad_venta();//$idlista_productoActual
			}
			else if($action=='abrirBusquedaParacategoria_producto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idlista_productoActual=$this->getDataId();
				$this->abrirBusquedaParacategoria_producto();//$idlista_productoActual
			}
			else if($action=='abrirBusquedaParasub_categoria_producto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idlista_productoActual=$this->getDataId();
				$this->abrirBusquedaParasub_categoria_producto();//$idlista_productoActual
			}
			else if($action=='abrirBusquedaParatipo_producto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idlista_productoActual=$this->getDataId();
				$this->abrirBusquedaParatipo_producto();//$idlista_productoActual
			}
			else if($action=='abrirBusquedaParabodega') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idlista_productoActual=$this->getDataId();
				$this->abrirBusquedaParabodega();//$idlista_productoActual
			}
			else if($action=='abrirBusquedaParacuenta_compra') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idlista_productoActual=$this->getDataId();
				$this->abrirBusquedaParacuenta_compra();//$idlista_productoActual
			}
			else if($action=='abrirBusquedaParacuenta_venta') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idlista_productoActual=$this->getDataId();
				$this->abrirBusquedaParacuenta_venta();//$idlista_productoActual
			}
			else if($action=='abrirBusquedaParacuenta_inventario') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idlista_productoActual=$this->getDataId();
				$this->abrirBusquedaParacuenta_inventario();//$idlista_productoActual
			}
			else if($action=='abrirBusquedaParaotro_suplidor') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idlista_productoActual=$this->getDataId();
				$this->abrirBusquedaParaotro_suplidor();//$idlista_productoActual
			}
			else if($action=='abrirBusquedaParaimpuesto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idlista_productoActual=$this->getDataId();
				$this->abrirBusquedaParaimpuesto();//$idlista_productoActual
			}
			else if($action=='abrirBusquedaParaimpuesto_ventas') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idlista_productoActual=$this->getDataId();
				$this->abrirBusquedaParaimpuesto_ventas();//$idlista_productoActual
			}
			else if($action=='abrirBusquedaParaimpuesto_compras') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idlista_productoActual=$this->getDataId();
				$this->abrirBusquedaParaimpuesto_compras();//$idlista_productoActual
			}
			else if($action=='abrirBusquedaParaotro_impuesto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idlista_productoActual=$this->getDataId();
				$this->abrirBusquedaParaotro_impuesto();//$idlista_productoActual
			}
			else if($action=='abrirBusquedaParaotro_impuesto_ventas') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idlista_productoActual=$this->getDataId();
				$this->abrirBusquedaParaotro_impuesto_ventas();//$idlista_productoActual
			}
			else if($action=='abrirBusquedaParaotro_impuesto_compras') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idlista_productoActual=$this->getDataId();
				$this->abrirBusquedaParaotro_impuesto_compras();//$idlista_productoActual
			}
			else if($action=='abrirBusquedaPararetencion') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idlista_productoActual=$this->getDataId();
				$this->abrirBusquedaPararetencion();//$idlista_productoActual
			}
			else if($action=='abrirBusquedaPararetencion_ventas') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idlista_productoActual=$this->getDataId();
				$this->abrirBusquedaPararetencion_ventas();//$idlista_productoActual
			}
			else if($action=='abrirBusquedaPararetencion_compras') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idlista_productoActual=$this->getDataId();
				$this->abrirBusquedaPararetencion_compras();//$idlista_productoActual
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
					
					$lista_productoController = new lista_producto_control();
					
					$lista_productoController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($lista_productoController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$lista_productoController = new lista_producto_control();
						$lista_productoController = $this;
						
						$jsonResponse = json_encode($lista_productoController->lista_productos);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->lista_productoReturnGeneral==null) {
					$this->lista_productoReturnGeneral=new lista_producto_param_return();
				}
				
				echo($this->lista_productoReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$lista_productoController=new lista_producto_control();
		
		$lista_productoController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$lista_productoController->usuarioActual=new usuario();
		
		$lista_productoController->usuarioActual->setId($this->usuarioActual->getId());
		$lista_productoController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$lista_productoController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$lista_productoController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$lista_productoController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$lista_productoController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$lista_productoController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$lista_productoController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $lista_productoController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadlista_producto= $this->getDataGeneralString('strTypeOnLoadlista_producto');
		$strTipoPaginaAuxiliarlista_producto= $this->getDataGeneralString('strTipoPaginaAuxiliarlista_producto');
		$strTipoUsuarioAuxiliarlista_producto= $this->getDataGeneralString('strTipoUsuarioAuxiliarlista_producto');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadlista_producto,$strTipoPaginaAuxiliarlista_producto,$strTipoUsuarioAuxiliarlista_producto,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadlista_producto!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('lista_producto','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(lista_producto_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarlista_producto,$this->strTipoUsuarioAuxiliarlista_producto,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(lista_producto_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarlista_producto,$this->strTipoUsuarioAuxiliarlista_producto,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->lista_productoReturnGeneral=new lista_producto_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->lista_productoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->lista_productoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->lista_productoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->lista_productoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->lista_productoReturnGeneral);
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
		$this->lista_productoReturnGeneral=new lista_producto_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->lista_productoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->lista_productoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->lista_productoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->lista_productoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->lista_productoReturnGeneral);
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
		$this->lista_productoReturnGeneral=new lista_producto_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->lista_productoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->lista_productoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->lista_productoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->lista_productoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->lista_productoReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
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
			
			
			$this->lista_productoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->lista_productoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->lista_productoReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->lista_productoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->lista_productoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->lista_productoReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->lista_productoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->lista_productoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->lista_productoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->lista_productoReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->lista_productoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->lista_productoReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->lista_productoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->lista_productoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->lista_productoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->lista_productoReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->lista_productoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->lista_productoReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
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
		
		$this->lista_productoLogic=new lista_producto_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->lista_producto=new lista_producto();
		
		$this->strTypeOnLoadlista_producto='onload';
		$this->strTipoPaginaAuxiliarlista_producto='none';
		$this->strTipoUsuarioAuxiliarlista_producto='none';	

		$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
		
		$this->lista_productoModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->lista_productoControllerAdditional=new lista_producto_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(lista_producto_session $lista_producto_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($lista_producto_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadlista_producto='',?string $strTipoPaginaAuxiliarlista_producto='',?string $strTipoUsuarioAuxiliarlista_producto='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadlista_producto=$strTypeOnLoadlista_producto;
			$this->strTipoPaginaAuxiliarlista_producto=$strTipoPaginaAuxiliarlista_producto;
			$this->strTipoUsuarioAuxiliarlista_producto=$strTipoUsuarioAuxiliarlista_producto;
	
			if($strTipoUsuarioAuxiliarlista_producto=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->lista_producto=new lista_producto();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Lista Productoses';
			
			
			$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));
							
			if($lista_producto_session==null) {
				$lista_producto_session=new lista_producto_session();
				
				/*$this->Session->write('lista_producto_session',$lista_producto_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($lista_producto_session->strFuncionJsPadre!=null && $lista_producto_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$lista_producto_session->strFuncionJsPadre;
				
				$lista_producto_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($lista_producto_session);
			
			if($strTypeOnLoadlista_producto!=null && $strTypeOnLoadlista_producto=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$lista_producto_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$lista_producto_session->setPaginaPopupVariables(true);
				}
				
				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,lista_producto_util::$STR_SESSION_NAME,'inventario');																
			
			} else if($strTypeOnLoadlista_producto!=null && $strTypeOnLoadlista_producto=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$lista_producto_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;*/
				
				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarlista_producto!=null && $strTipoPaginaAuxiliarlista_producto=='none') {
				/*$lista_producto_session->strStyleDivHeader='display:table-row';*/
				
				/*$lista_producto_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarlista_producto!=null && $strTipoPaginaAuxiliarlista_producto=='iframe') {
					/*
					$lista_producto_session->strStyleDivArbol='display:none';
					$lista_producto_session->strStyleDivHeader='display:none';
					$lista_producto_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$lista_producto_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->lista_productoClase=new lista_producto();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=lista_producto_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(lista_producto_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->lista_productoLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->lista_productoLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->lista_productoLogic=new lista_producto_logic();*/
			
			
			$this->lista_productosModel=null;
			/*new ListDataModel();*/
			
			/*$this->lista_productosModel.setWrappedData(lista_productoLogic->getlista_productos());*/
						
			$this->lista_productos= array();
			$this->lista_productosEliminados=array();
			$this->lista_productosSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= lista_producto_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->lista_producto= new lista_producto();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idbodega='display:table-row';
			$this->strVisibleFK_Idcategoria_producto='display:table-row';
			$this->strVisibleFK_Idcuenta_compra='display:table-row';
			$this->strVisibleFK_Idcuenta_inventario='display:table-row';
			$this->strVisibleFK_Idcuenta_venta='display:table-row';
			$this->strVisibleFK_Idimpuesto='display:table-row';
			$this->strVisibleFK_Idimpuesto_compras='display:table-row';
			$this->strVisibleFK_Idimpuesto_ventas='display:table-row';
			$this->strVisibleFK_Idotro_impuesto='display:table-row';
			$this->strVisibleFK_Idotro_impuesto_compras='display:table-row';
			$this->strVisibleFK_Idotro_impuesto_ventas='display:table-row';
			$this->strVisibleFK_Idotro_suplidor='display:table-row';
			$this->strVisibleFK_Idproducto='display:table-row';
			$this->strVisibleFK_Idretencion='display:table-row';
			$this->strVisibleFK_Idretencion_compras='display:table-row';
			$this->strVisibleFK_Idretencion_ventas='display:table-row';
			$this->strVisibleFK_Idsub_categoria_producto='display:table-row';
			$this->strVisibleFK_Idtipo_producto='display:table-row';
			$this->strVisibleFK_Idunidad_compra='display:table-row';
			$this->strVisibleFK_Idunidad_venta='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarlista_producto!=null && $strTipoUsuarioAuxiliarlista_producto!='none' && $strTipoUsuarioAuxiliarlista_producto!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarlista_producto);
																
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
				if($strTipoUsuarioAuxiliarlista_producto!=null && $strTipoUsuarioAuxiliarlista_producto!='none' && $strTipoUsuarioAuxiliarlista_producto!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarlista_producto);
																
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
				if($strTipoUsuarioAuxiliarlista_producto==null || $strTipoUsuarioAuxiliarlista_producto=='none' || $strTipoUsuarioAuxiliarlista_producto=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarlista_producto,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, lista_producto_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, lista_producto_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina lista_producto');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($lista_producto_session);
			
			$this->getSetBusquedasSesionConfig($lista_producto_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportelista_productos($this->strAccionBusqueda,$this->lista_productoLogic->getlista_productos());*/
				} else if($this->strGenerarReporte=='Html')	{
					$lista_producto_session->strServletGenerarHtmlReporte='lista_productoServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(lista_producto_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(lista_producto_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($lista_producto_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarlista_producto!=null && $strTipoUsuarioAuxiliarlista_producto=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($lista_producto_session);
			}
								
			$this->set(lista_producto_util::$STR_SESSION_NAME, $lista_producto_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($lista_producto_session);
			
			/*
			$this->lista_producto->recursive = 0;
			
			$this->lista_productos=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('lista_productos', $this->lista_productos);
			
			$this->set(lista_producto_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->lista_productoActual =$this->lista_productoClase;
			
			/*$this->lista_productoActual =$this->migrarModellista_producto($this->lista_productoClase);*/
			
			$this->returnHtml(false);
			
			$this->set(lista_producto_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=lista_producto_util::$STR_NOMBRE_OPCION;
				
			if(lista_producto_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=lista_producto_util::$STR_MODULO_OPCION.lista_producto_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(lista_producto_util::$STR_SESSION_NAME,serialize($lista_producto_session));
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
			/*$lista_productoClase= (lista_producto) lista_productosModel.getRowData();*/
			
			$this->lista_productoClase->setId($this->lista_producto->getId());	
			$this->lista_productoClase->setVersionRow($this->lista_producto->getVersionRow());	
			$this->lista_productoClase->setVersionRow($this->lista_producto->getVersionRow());	
			$this->lista_productoClase->setid_producto($this->lista_producto->getid_producto());	
			$this->lista_productoClase->setcodigo_producto($this->lista_producto->getcodigo_producto());	
			$this->lista_productoClase->setdescripcion_producto($this->lista_producto->getdescripcion_producto());	
			$this->lista_productoClase->setprecio1($this->lista_producto->getprecio1());	
			$this->lista_productoClase->setprecio2($this->lista_producto->getprecio2());	
			$this->lista_productoClase->setprecio3($this->lista_producto->getprecio3());	
			$this->lista_productoClase->setprecio4($this->lista_producto->getprecio4());	
			$this->lista_productoClase->setcosto($this->lista_producto->getcosto());	
			$this->lista_productoClase->setid_unidad_compra($this->lista_producto->getid_unidad_compra());	
			$this->lista_productoClase->setunidad_en_compra($this->lista_producto->getunidad_en_compra());	
			$this->lista_productoClase->setequivalencia_en_compra($this->lista_producto->getequivalencia_en_compra());	
			$this->lista_productoClase->setid_unidad_venta($this->lista_producto->getid_unidad_venta());	
			$this->lista_productoClase->setunidad_en_venta($this->lista_producto->getunidad_en_venta());	
			$this->lista_productoClase->setequivalencia_en_venta($this->lista_producto->getequivalencia_en_venta());	
			$this->lista_productoClase->setcantidad_total($this->lista_producto->getcantidad_total());	
			$this->lista_productoClase->setcantidad_minima($this->lista_producto->getcantidad_minima());	
			$this->lista_productoClase->setid_categoria_producto($this->lista_producto->getid_categoria_producto());	
			$this->lista_productoClase->setid_sub_categoria_producto($this->lista_producto->getid_sub_categoria_producto());	
			$this->lista_productoClase->setacepta_lote($this->lista_producto->getacepta_lote());	
			$this->lista_productoClase->setvalor_inventario($this->lista_producto->getvalor_inventario());	
			$this->lista_productoClase->setimagen($this->lista_producto->getimagen());	
			$this->lista_productoClase->setincremento1($this->lista_producto->getincremento1());	
			$this->lista_productoClase->setincremento2($this->lista_producto->getincremento2());	
			$this->lista_productoClase->setincremento3($this->lista_producto->getincremento3());	
			$this->lista_productoClase->setincremento4($this->lista_producto->getincremento4());	
			$this->lista_productoClase->setcodigo_fabricante($this->lista_producto->getcodigo_fabricante());	
			$this->lista_productoClase->setproducto_fisico($this->lista_producto->getproducto_fisico());	
			$this->lista_productoClase->setsituacion_producto($this->lista_producto->getsituacion_producto());	
			$this->lista_productoClase->setid_tipo_producto($this->lista_producto->getid_tipo_producto());	
			$this->lista_productoClase->settipo_producto_codigo($this->lista_producto->gettipo_producto_codigo());	
			$this->lista_productoClase->setid_bodega($this->lista_producto->getid_bodega());	
			$this->lista_productoClase->setmostrar_componente($this->lista_producto->getmostrar_componente());	
			$this->lista_productoClase->setfactura_sin_stock($this->lista_producto->getfactura_sin_stock());	
			$this->lista_productoClase->setavisa_expiracion($this->lista_producto->getavisa_expiracion());	
			$this->lista_productoClase->setfactura_con_precio($this->lista_producto->getfactura_con_precio());	
			$this->lista_productoClase->setproducto_equivalente($this->lista_producto->getproducto_equivalente());	
			$this->lista_productoClase->setid_cuenta_compra($this->lista_producto->getid_cuenta_compra());	
			$this->lista_productoClase->setid_cuenta_venta($this->lista_producto->getid_cuenta_venta());	
			$this->lista_productoClase->setid_cuenta_inventario($this->lista_producto->getid_cuenta_inventario());	
			$this->lista_productoClase->setcuenta_compra_codigo($this->lista_producto->getcuenta_compra_codigo());	
			$this->lista_productoClase->setcuenta_venta_codigo($this->lista_producto->getcuenta_venta_codigo());	
			$this->lista_productoClase->setcuenta_inventario_codigo($this->lista_producto->getcuenta_inventario_codigo());	
			$this->lista_productoClase->setid_otro_suplidor($this->lista_producto->getid_otro_suplidor());	
			$this->lista_productoClase->setid_impuesto($this->lista_producto->getid_impuesto());	
			$this->lista_productoClase->setid_impuesto_ventas($this->lista_producto->getid_impuesto_ventas());	
			$this->lista_productoClase->setid_impuesto_compras($this->lista_producto->getid_impuesto_compras());	
			$this->lista_productoClase->setimpuesto1_en_ventas($this->lista_producto->getimpuesto1_en_ventas());	
			$this->lista_productoClase->setimpuesto1_en_compras($this->lista_producto->getimpuesto1_en_compras());	
			$this->lista_productoClase->setultima_venta($this->lista_producto->getultima_venta());	
			$this->lista_productoClase->setid_otro_impuesto($this->lista_producto->getid_otro_impuesto());	
			$this->lista_productoClase->setid_otro_impuesto_ventas($this->lista_producto->getid_otro_impuesto_ventas());	
			$this->lista_productoClase->setid_otro_impuesto_compras($this->lista_producto->getid_otro_impuesto_compras());	
			$this->lista_productoClase->setotro_impuesto_ventas_codigo($this->lista_producto->getotro_impuesto_ventas_codigo());	
			$this->lista_productoClase->setotro_impuesto_compras_codigo($this->lista_producto->getotro_impuesto_compras_codigo());	
			$this->lista_productoClase->setprecio_de_compra_0($this->lista_producto->getprecio_de_compra_0());	
			$this->lista_productoClase->setprecio_actualizado($this->lista_producto->getprecio_actualizado());	
			$this->lista_productoClase->setrequiere_nro_serie($this->lista_producto->getrequiere_nro_serie());	
			$this->lista_productoClase->setcosto_dolar($this->lista_producto->getcosto_dolar());	
			$this->lista_productoClase->setcomentario($this->lista_producto->getcomentario());	
			$this->lista_productoClase->setcomenta_factura($this->lista_producto->getcomenta_factura());	
			$this->lista_productoClase->setid_retencion($this->lista_producto->getid_retencion());	
			$this->lista_productoClase->setid_retencion_ventas($this->lista_producto->getid_retencion_ventas());	
			$this->lista_productoClase->setid_retencion_compras($this->lista_producto->getid_retencion_compras());	
			$this->lista_productoClase->setretencion_ventas_codigo($this->lista_producto->getretencion_ventas_codigo());	
			$this->lista_productoClase->setretencion_compras_codigo($this->lista_producto->getretencion_compras_codigo());	
			$this->lista_productoClase->setnotas($this->lista_producto->getnotas());	
		
			/*$this->Session->write('lista_productoVersionRowActual', lista_producto.getVersionRow());*/
			
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
			
			$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));
						
			if($lista_producto_session==null) {
				$lista_producto_session=new lista_producto_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('lista_producto', $this->lista_producto->read(null, $id));
	
			
			$this->lista_producto->recursive = 0;
			
			$this->lista_productos=$this->paginate();
			
			$this->set('lista_productos', $this->lista_productos);
	
			if (empty($this->data)) {
				$this->data = $this->lista_producto->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->lista_productoLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->lista_productoClase);
			
			$this->lista_productoActual=$this->lista_productoClase;
			
			/*$this->lista_productoActual =$this->migrarModellista_producto($this->lista_productoClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->lista_productoLogic->getlista_productos(),$this->lista_productoActual);
			
			$this->actualizarControllerConReturnGeneral($this->lista_productoReturnGeneral);
			
			//$this->lista_productoReturnGeneral=$this->lista_productoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->lista_productoLogic->getlista_productos(),$this->lista_productoActual,$this->lista_productoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));
						
			if($lista_producto_session==null) {
				$lista_producto_session=new lista_producto_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevolista_producto', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->lista_productoClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->lista_productoClase);
			
			$this->lista_productoActual =$this->lista_productoClase;
			
			/*$this->lista_productoActual =$this->migrarModellista_producto($this->lista_productoClase);*/
			
			$this->setlista_productoFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->lista_productoLogic->getlista_productos(),$this->lista_producto);
			
			$this->actualizarControllerConReturnGeneral($this->lista_productoReturnGeneral);
			
			//this->lista_productoReturnGeneral=$this->lista_productoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->lista_productoLogic->getlista_productos(),$this->lista_producto,$this->lista_productoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idproductoDefaultFK!=null && $this->idproductoDefaultFK > -1) {
				$this->lista_productoReturnGeneral->getlista_producto()->setid_producto($this->idproductoDefaultFK);
			}

			if($this->idunidad_compraDefaultFK!=null && $this->idunidad_compraDefaultFK > -1) {
				$this->lista_productoReturnGeneral->getlista_producto()->setid_unidad_compra($this->idunidad_compraDefaultFK);
			}

			if($this->idunidad_ventaDefaultFK!=null && $this->idunidad_ventaDefaultFK > -1) {
				$this->lista_productoReturnGeneral->getlista_producto()->setid_unidad_venta($this->idunidad_ventaDefaultFK);
			}

			if($this->idcategoria_productoDefaultFK!=null && $this->idcategoria_productoDefaultFK > -1) {
				$this->lista_productoReturnGeneral->getlista_producto()->setid_categoria_producto($this->idcategoria_productoDefaultFK);
			}

			if($this->idsub_categoria_productoDefaultFK!=null && $this->idsub_categoria_productoDefaultFK > -1) {
				$this->lista_productoReturnGeneral->getlista_producto()->setid_sub_categoria_producto($this->idsub_categoria_productoDefaultFK);
			}

			if($this->idtipo_productoDefaultFK!=null && $this->idtipo_productoDefaultFK > -1) {
				$this->lista_productoReturnGeneral->getlista_producto()->setid_tipo_producto($this->idtipo_productoDefaultFK);
			}

			if($this->idbodegaDefaultFK!=null && $this->idbodegaDefaultFK > -1) {
				$this->lista_productoReturnGeneral->getlista_producto()->setid_bodega($this->idbodegaDefaultFK);
			}

			if($this->idcuenta_compraDefaultFK!=null && $this->idcuenta_compraDefaultFK > -1) {
				$this->lista_productoReturnGeneral->getlista_producto()->setid_cuenta_compra($this->idcuenta_compraDefaultFK);
			}

			if($this->idcuenta_ventaDefaultFK!=null && $this->idcuenta_ventaDefaultFK > -1) {
				$this->lista_productoReturnGeneral->getlista_producto()->setid_cuenta_venta($this->idcuenta_ventaDefaultFK);
			}

			if($this->idcuenta_inventarioDefaultFK!=null && $this->idcuenta_inventarioDefaultFK > -1) {
				$this->lista_productoReturnGeneral->getlista_producto()->setid_cuenta_inventario($this->idcuenta_inventarioDefaultFK);
			}

			if($this->idotro_suplidorDefaultFK!=null && $this->idotro_suplidorDefaultFK > -1) {
				$this->lista_productoReturnGeneral->getlista_producto()->setid_otro_suplidor($this->idotro_suplidorDefaultFK);
			}

			if($this->idimpuestoDefaultFK!=null && $this->idimpuestoDefaultFK > -1) {
				$this->lista_productoReturnGeneral->getlista_producto()->setid_impuesto($this->idimpuestoDefaultFK);
			}

			if($this->idimpuesto_ventasDefaultFK!=null && $this->idimpuesto_ventasDefaultFK > -1) {
				$this->lista_productoReturnGeneral->getlista_producto()->setid_impuesto_ventas($this->idimpuesto_ventasDefaultFK);
			}

			if($this->idimpuesto_comprasDefaultFK!=null && $this->idimpuesto_comprasDefaultFK > -1) {
				$this->lista_productoReturnGeneral->getlista_producto()->setid_impuesto_compras($this->idimpuesto_comprasDefaultFK);
			}

			if($this->idotro_impuestoDefaultFK!=null && $this->idotro_impuestoDefaultFK > -1) {
				$this->lista_productoReturnGeneral->getlista_producto()->setid_otro_impuesto($this->idotro_impuestoDefaultFK);
			}

			if($this->idotro_impuesto_ventasDefaultFK!=null && $this->idotro_impuesto_ventasDefaultFK > -1) {
				$this->lista_productoReturnGeneral->getlista_producto()->setid_otro_impuesto_ventas($this->idotro_impuesto_ventasDefaultFK);
			}

			if($this->idotro_impuesto_comprasDefaultFK!=null && $this->idotro_impuesto_comprasDefaultFK > -1) {
				$this->lista_productoReturnGeneral->getlista_producto()->setid_otro_impuesto_compras($this->idotro_impuesto_comprasDefaultFK);
			}

			if($this->idretencionDefaultFK!=null && $this->idretencionDefaultFK > -1) {
				$this->lista_productoReturnGeneral->getlista_producto()->setid_retencion($this->idretencionDefaultFK);
			}

			if($this->idretencion_ventasDefaultFK!=null && $this->idretencion_ventasDefaultFK > -1) {
				$this->lista_productoReturnGeneral->getlista_producto()->setid_retencion_ventas($this->idretencion_ventasDefaultFK);
			}

			if($this->idretencion_comprasDefaultFK!=null && $this->idretencion_comprasDefaultFK > -1) {
				$this->lista_productoReturnGeneral->getlista_producto()->setid_retencion_compras($this->idretencion_comprasDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->lista_productoReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->lista_productoReturnGeneral->getlista_producto(),$this->lista_productoActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeylista_producto($this->lista_productoReturnGeneral->getlista_producto());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariolista_producto($this->lista_productoReturnGeneral->getlista_producto());*/
			}
			
			if($this->lista_productoReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->lista_productoReturnGeneral->getlista_producto(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActuallista_producto($this->lista_producto,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->lista_productosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->lista_productosAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->lista_productosAuxiliar=array();
			}
			
			if(count($this->lista_productosAuxiliar)==2) {
				$lista_productoOrigen=$this->lista_productosAuxiliar[0];
				$lista_productoDestino=$this->lista_productosAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($lista_productoOrigen,$lista_productoDestino,true,false,false);
				
				$this->actualizarLista($lista_productoDestino,$this->lista_productos);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->lista_productosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->lista_productosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->lista_productosAuxiliar=array();
			}
			
			if(count($this->lista_productosAuxiliar) > 0) {
				foreach ($this->lista_productosAuxiliar as $lista_productoSeleccionado) {
					$this->lista_producto=new lista_producto();
					
					$this->setCopiarVariablesObjetos($lista_productoSeleccionado,$this->lista_producto,true,true,false);
						
					$this->lista_productos[]=$this->lista_producto;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->lista_productosEliminados as $lista_productoEliminado) {
				$this->lista_productoLogic->lista_productos[]=$lista_productoEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->lista_producto=new lista_producto();
							
				$this->lista_productos[]=$this->lista_producto;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
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
		
		$lista_productoActual=new lista_producto();
		
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
				
				$lista_productoActual=$this->lista_productos[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $lista_productoActual->setid_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $lista_productoActual->setcodigo_producto($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $lista_productoActual->setdescripcion_producto($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $lista_productoActual->setprecio1((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $lista_productoActual->setprecio2((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $lista_productoActual->setprecio3((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $lista_productoActual->setprecio4((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $lista_productoActual->setcosto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $lista_productoActual->setid_unidad_compra((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $lista_productoActual->setunidad_en_compra((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $lista_productoActual->setequivalencia_en_compra((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $lista_productoActual->setid_unidad_venta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $lista_productoActual->setunidad_en_venta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $lista_productoActual->setequivalencia_en_venta((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $lista_productoActual->setcantidad_total((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $lista_productoActual->setcantidad_minima((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $lista_productoActual->setid_categoria_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $lista_productoActual->setid_sub_categoria_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $lista_productoActual->setacepta_lote($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $lista_productoActual->setvalor_inventario((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_22'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $lista_productoActual->setimagen($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_24','t'.$this->strSufijo)) {  $lista_productoActual->setincremento1((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_24'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_25','t'.$this->strSufijo)) {  $lista_productoActual->setincremento2((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_25'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_26','t'.$this->strSufijo)) {  $lista_productoActual->setincremento3((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_26'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_27','t'.$this->strSufijo)) {  $lista_productoActual->setincremento4((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_27'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_28','t'.$this->strSufijo)) {  $lista_productoActual->setcodigo_fabricante($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_28'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_29','t'.$this->strSufijo)) {  $lista_productoActual->setproducto_fisico((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_29'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_30','t'.$this->strSufijo)) {  $lista_productoActual->setsituacion_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_30'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_31','t'.$this->strSufijo)) {  $lista_productoActual->setid_tipo_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_31'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_32','t'.$this->strSufijo)) {  $lista_productoActual->settipo_producto_codigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_32'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_33','t'.$this->strSufijo)) {  $lista_productoActual->setid_bodega((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_33'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_34','t'.$this->strSufijo)) {  $lista_productoActual->setmostrar_componente($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_34'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_35','t'.$this->strSufijo)) {  $lista_productoActual->setfactura_sin_stock($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_35'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_36','t'.$this->strSufijo)) {  $lista_productoActual->setavisa_expiracion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_36'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_37','t'.$this->strSufijo)) {  $lista_productoActual->setfactura_con_precio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_37'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_38','t'.$this->strSufijo)) {  $lista_productoActual->setproducto_equivalente($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_38'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_39','t'.$this->strSufijo)) {  $lista_productoActual->setid_cuenta_compra((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_39'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_40','t'.$this->strSufijo)) {  $lista_productoActual->setid_cuenta_venta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_40'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_41','t'.$this->strSufijo)) {  $lista_productoActual->setid_cuenta_inventario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_41'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_42','t'.$this->strSufijo)) {  $lista_productoActual->setcuenta_compra_codigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_42'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_43','t'.$this->strSufijo)) {  $lista_productoActual->setcuenta_venta_codigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_43'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_44','t'.$this->strSufijo)) {  $lista_productoActual->setcuenta_inventario_codigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_44'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_45','t'.$this->strSufijo)) {  $lista_productoActual->setid_otro_suplidor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_45'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_46','t'.$this->strSufijo)) {  $lista_productoActual->setid_impuesto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_46'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_47','t'.$this->strSufijo)) {  $lista_productoActual->setid_impuesto_ventas((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_47'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_48','t'.$this->strSufijo)) {  $lista_productoActual->setid_impuesto_compras((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_48'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_49','t'.$this->strSufijo)) {  $lista_productoActual->setimpuesto1_en_ventas($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_49'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_50','t'.$this->strSufijo)) {  $lista_productoActual->setimpuesto1_en_compras($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_50'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_51','t'.$this->strSufijo)) {  $lista_productoActual->setultima_venta(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_51')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_52','t'.$this->strSufijo)) {  $lista_productoActual->setid_otro_impuesto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_52'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_53','t'.$this->strSufijo)) {  $lista_productoActual->setid_otro_impuesto_ventas((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_53'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_54','t'.$this->strSufijo)) {  $lista_productoActual->setid_otro_impuesto_compras((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_54'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_55','t'.$this->strSufijo)) {  $lista_productoActual->setotro_impuesto_ventas_codigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_55'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_56','t'.$this->strSufijo)) {  $lista_productoActual->setotro_impuesto_compras_codigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_56'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_57','t'.$this->strSufijo)) {  $lista_productoActual->setprecio_de_compra_0((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_57'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_58','t'.$this->strSufijo)) {  $lista_productoActual->setprecio_actualizado(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_58')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_59','t'.$this->strSufijo)) {  $lista_productoActual->setrequiere_nro_serie($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_59'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_60','t'.$this->strSufijo)) {  $lista_productoActual->setcosto_dolar((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_60'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_61','t'.$this->strSufijo)) {  $lista_productoActual->setcomentario($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_61'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_62','t'.$this->strSufijo)) {  $lista_productoActual->setcomenta_factura($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_62'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_63','t'.$this->strSufijo)) {  $lista_productoActual->setid_retencion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_63'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_64','t'.$this->strSufijo)) {  $lista_productoActual->setid_retencion_ventas((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_64'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_65','t'.$this->strSufijo)) {  $lista_productoActual->setid_retencion_compras((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_65'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_66','t'.$this->strSufijo)) {  $lista_productoActual->setretencion_ventas_codigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_66'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_67','t'.$this->strSufijo)) {  $lista_productoActual->setretencion_compras_codigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_67'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_68','t'.$this->strSufijo)) {  $lista_productoActual->setnotas($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_68'));  }
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
				$this->lista_productoLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadlista_producto='',string $strTipoPaginaAuxiliarlista_producto='',string $strTipoUsuarioAuxiliarlista_producto='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadlista_producto,$strTipoPaginaAuxiliarlista_producto,$strTipoUsuarioAuxiliarlista_producto,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->lista_productos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=lista_producto_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=lista_producto_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=lista_producto_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));
						
			if($lista_producto_session==null) {
				$lista_producto_session=new lista_producto_session();
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
					/*$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;*/
					
					if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
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
			
			$this->lista_productosEliminados=array();
			
			/*$this->lista_productoLogic->setConnexion($connexion);*/
			
			$this->lista_productoLogic->setIsConDeep(true);
			
			$this->lista_productoLogic->getlista_productoDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('producto');$classes[]=$class;
			$class=new Classe('unidad_compra');$classes[]=$class;
			$class=new Classe('unidad_venta');$classes[]=$class;
			$class=new Classe('categoria_producto');$classes[]=$class;
			$class=new Classe('sub_categoria_producto');$classes[]=$class;
			$class=new Classe('tipo_producto');$classes[]=$class;
			$class=new Classe('bodega');$classes[]=$class;
			$class=new Classe('cuenta_compra');$classes[]=$class;
			$class=new Classe('cuenta_venta');$classes[]=$class;
			$class=new Classe('cuenta_inventario');$classes[]=$class;
			$class=new Classe('otro_suplidor');$classes[]=$class;
			$class=new Classe('impuesto');$classes[]=$class;
			$class=new Classe('impuesto_ventas');$classes[]=$class;
			$class=new Classe('impuesto_compras');$classes[]=$class;
			$class=new Classe('otro_impuesto');$classes[]=$class;
			$class=new Classe('otro_impuesto_ventas');$classes[]=$class;
			$class=new Classe('otro_impuesto_compras');$classes[]=$class;
			$class=new Classe('retencion');$classes[]=$class;
			$class=new Classe('retencion_ventas');$classes[]=$class;
			$class=new Classe('retencion_compras');$classes[]=$class;
			
			$this->lista_productoLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->lista_productoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->lista_productoLogic->getlista_productos()==null|| count($this->lista_productoLogic->getlista_productos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->lista_productos=$this->lista_productoLogic->getlista_productos();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->lista_productoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();
									
						/*$this->generarReportes('Todos',$this->lista_productoLogic->getlista_productos());*/
					
						$this->lista_productoLogic->setlista_productos($this->lista_productos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->lista_productoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->lista_productoLogic->getlista_productos()==null|| count($this->lista_productoLogic->getlista_productos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->lista_productos=$this->lista_productoLogic->getlista_productos();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->lista_productoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();
									
						/*$this->generarReportes('Todos',$this->lista_productoLogic->getlista_productos());*/
					
						$this->lista_productoLogic->setlista_productos($this->lista_productos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idlista_producto=0;*/
				
				if($lista_producto_session->bitBusquedaDesdeFKSesionFK!=null && $lista_producto_session->bitBusquedaDesdeFKSesionFK==true) {
					if($lista_producto_session->bigIdActualFK!=null && $lista_producto_session->bigIdActualFK!=0)	{
						$this->idlista_producto=$lista_producto_session->bigIdActualFK;	
					}
					
					$lista_producto_session->bitBusquedaDesdeFKSesionFK=false;
					
					$lista_producto_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idlista_producto=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idlista_producto=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->lista_productoLogic->getEntity($this->idlista_producto);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*lista_productoLogicAdditional::getDetalleIndicePorId($idlista_producto);*/

				
				if($this->lista_productoLogic->getlista_producto()!=null) {
					$this->lista_productoLogic->setlista_productos(array());
					$this->lista_productoLogic->lista_productos[]=$this->lista_productoLogic->getlista_producto();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idbodega')
			{

				if($lista_producto_session->bigidbodegaActual!=null && $lista_producto_session->bigidbodegaActual!=0)
				{
					$this->id_bodegaFK_Idbodega=$lista_producto_session->bigidbodegaActual;
					$lista_producto_session->bigidbodegaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idbodega($finalQueryPaginacion,$this->pagination,$this->id_bodegaFK_Idbodega);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//lista_productoLogicAdditional::getDetalleIndiceFK_Idbodega($this->id_bodegaFK_Idbodega);


					if($this->lista_productoLogic->getlista_productos()==null || count($this->lista_productoLogic->getlista_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$lista_productos=$this->lista_productoLogic->getlista_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idbodega('',$this->pagination,$this->id_bodegaFK_Idbodega);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportelista_productos("FK_Idbodega",$this->lista_productoLogic->getlista_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->lista_productoLogic->setlista_productos($lista_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcategoria_producto')
			{

				if($lista_producto_session->bigidcategoria_productoActual!=null && $lista_producto_session->bigidcategoria_productoActual!=0)
				{
					$this->id_categoria_productoFK_Idcategoria_producto=$lista_producto_session->bigidcategoria_productoActual;
					$lista_producto_session->bigidcategoria_productoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idcategoria_producto($finalQueryPaginacion,$this->pagination,$this->id_categoria_productoFK_Idcategoria_producto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//lista_productoLogicAdditional::getDetalleIndiceFK_Idcategoria_producto($this->id_categoria_productoFK_Idcategoria_producto);


					if($this->lista_productoLogic->getlista_productos()==null || count($this->lista_productoLogic->getlista_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$lista_productos=$this->lista_productoLogic->getlista_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idcategoria_producto('',$this->pagination,$this->id_categoria_productoFK_Idcategoria_producto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportelista_productos("FK_Idcategoria_producto",$this->lista_productoLogic->getlista_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->lista_productoLogic->setlista_productos($lista_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcuenta_compra')
			{

				if($lista_producto_session->bigidcuenta_compraActual!=null && $lista_producto_session->bigidcuenta_compraActual!=0)
				{
					$this->id_cuenta_compraFK_Idcuenta_compra=$lista_producto_session->bigidcuenta_compraActual;
					$lista_producto_session->bigidcuenta_compraActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idcuenta_compra($finalQueryPaginacion,$this->pagination,$this->id_cuenta_compraFK_Idcuenta_compra);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//lista_productoLogicAdditional::getDetalleIndiceFK_Idcuenta_compra($this->id_cuenta_compraFK_Idcuenta_compra);


					if($this->lista_productoLogic->getlista_productos()==null || count($this->lista_productoLogic->getlista_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$lista_productos=$this->lista_productoLogic->getlista_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idcuenta_compra('',$this->pagination,$this->id_cuenta_compraFK_Idcuenta_compra);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportelista_productos("FK_Idcuenta_compra",$this->lista_productoLogic->getlista_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->lista_productoLogic->setlista_productos($lista_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcuenta_inventario')
			{

				if($lista_producto_session->bigidcuenta_inventarioActual!=null && $lista_producto_session->bigidcuenta_inventarioActual!=0)
				{
					$this->id_cuenta_inventarioFK_Idcuenta_inventario=$lista_producto_session->bigidcuenta_inventarioActual;
					$lista_producto_session->bigidcuenta_inventarioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idcuenta_inventario($finalQueryPaginacion,$this->pagination,$this->id_cuenta_inventarioFK_Idcuenta_inventario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//lista_productoLogicAdditional::getDetalleIndiceFK_Idcuenta_inventario($this->id_cuenta_inventarioFK_Idcuenta_inventario);


					if($this->lista_productoLogic->getlista_productos()==null || count($this->lista_productoLogic->getlista_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$lista_productos=$this->lista_productoLogic->getlista_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idcuenta_inventario('',$this->pagination,$this->id_cuenta_inventarioFK_Idcuenta_inventario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportelista_productos("FK_Idcuenta_inventario",$this->lista_productoLogic->getlista_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->lista_productoLogic->setlista_productos($lista_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcuenta_venta')
			{

				if($lista_producto_session->bigidcuenta_ventaActual!=null && $lista_producto_session->bigidcuenta_ventaActual!=0)
				{
					$this->id_cuenta_ventaFK_Idcuenta_venta=$lista_producto_session->bigidcuenta_ventaActual;
					$lista_producto_session->bigidcuenta_ventaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idcuenta_venta($finalQueryPaginacion,$this->pagination,$this->id_cuenta_ventaFK_Idcuenta_venta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//lista_productoLogicAdditional::getDetalleIndiceFK_Idcuenta_venta($this->id_cuenta_ventaFK_Idcuenta_venta);


					if($this->lista_productoLogic->getlista_productos()==null || count($this->lista_productoLogic->getlista_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$lista_productos=$this->lista_productoLogic->getlista_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idcuenta_venta('',$this->pagination,$this->id_cuenta_ventaFK_Idcuenta_venta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportelista_productos("FK_Idcuenta_venta",$this->lista_productoLogic->getlista_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->lista_productoLogic->setlista_productos($lista_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idimpuesto')
			{

				if($lista_producto_session->bigidimpuestoActual!=null && $lista_producto_session->bigidimpuestoActual!=0)
				{
					$this->id_impuestoFK_Idimpuesto=$lista_producto_session->bigidimpuestoActual;
					$lista_producto_session->bigidimpuestoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idimpuesto($finalQueryPaginacion,$this->pagination,$this->id_impuestoFK_Idimpuesto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//lista_productoLogicAdditional::getDetalleIndiceFK_Idimpuesto($this->id_impuestoFK_Idimpuesto);


					if($this->lista_productoLogic->getlista_productos()==null || count($this->lista_productoLogic->getlista_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$lista_productos=$this->lista_productoLogic->getlista_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idimpuesto('',$this->pagination,$this->id_impuestoFK_Idimpuesto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportelista_productos("FK_Idimpuesto",$this->lista_productoLogic->getlista_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->lista_productoLogic->setlista_productos($lista_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idimpuesto_compras')
			{

				if($lista_producto_session->bigidimpuesto_comprasActual!=null && $lista_producto_session->bigidimpuesto_comprasActual!=0)
				{
					$this->id_impuesto_comprasFK_Idimpuesto_compras=$lista_producto_session->bigidimpuesto_comprasActual;
					$lista_producto_session->bigidimpuesto_comprasActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idimpuesto_compras($finalQueryPaginacion,$this->pagination,$this->id_impuesto_comprasFK_Idimpuesto_compras);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//lista_productoLogicAdditional::getDetalleIndiceFK_Idimpuesto_compras($this->id_impuesto_comprasFK_Idimpuesto_compras);


					if($this->lista_productoLogic->getlista_productos()==null || count($this->lista_productoLogic->getlista_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$lista_productos=$this->lista_productoLogic->getlista_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idimpuesto_compras('',$this->pagination,$this->id_impuesto_comprasFK_Idimpuesto_compras);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportelista_productos("FK_Idimpuesto_compras",$this->lista_productoLogic->getlista_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->lista_productoLogic->setlista_productos($lista_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idimpuesto_ventas')
			{

				if($lista_producto_session->bigidimpuesto_ventasActual!=null && $lista_producto_session->bigidimpuesto_ventasActual!=0)
				{
					$this->id_impuesto_ventasFK_Idimpuesto_ventas=$lista_producto_session->bigidimpuesto_ventasActual;
					$lista_producto_session->bigidimpuesto_ventasActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idimpuesto_ventas($finalQueryPaginacion,$this->pagination,$this->id_impuesto_ventasFK_Idimpuesto_ventas);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//lista_productoLogicAdditional::getDetalleIndiceFK_Idimpuesto_ventas($this->id_impuesto_ventasFK_Idimpuesto_ventas);


					if($this->lista_productoLogic->getlista_productos()==null || count($this->lista_productoLogic->getlista_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$lista_productos=$this->lista_productoLogic->getlista_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idimpuesto_ventas('',$this->pagination,$this->id_impuesto_ventasFK_Idimpuesto_ventas);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportelista_productos("FK_Idimpuesto_ventas",$this->lista_productoLogic->getlista_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->lista_productoLogic->setlista_productos($lista_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idotro_impuesto')
			{

				if($lista_producto_session->bigidotro_impuestoActual!=null && $lista_producto_session->bigidotro_impuestoActual!=0)
				{
					$this->id_otro_impuestoFK_Idotro_impuesto=$lista_producto_session->bigidotro_impuestoActual;
					$lista_producto_session->bigidotro_impuestoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idotro_impuesto($finalQueryPaginacion,$this->pagination,$this->id_otro_impuestoFK_Idotro_impuesto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//lista_productoLogicAdditional::getDetalleIndiceFK_Idotro_impuesto($this->id_otro_impuestoFK_Idotro_impuesto);


					if($this->lista_productoLogic->getlista_productos()==null || count($this->lista_productoLogic->getlista_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$lista_productos=$this->lista_productoLogic->getlista_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idotro_impuesto('',$this->pagination,$this->id_otro_impuestoFK_Idotro_impuesto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportelista_productos("FK_Idotro_impuesto",$this->lista_productoLogic->getlista_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->lista_productoLogic->setlista_productos($lista_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idotro_impuesto_compras')
			{

				if($lista_producto_session->bigidotro_impuesto_comprasActual!=null && $lista_producto_session->bigidotro_impuesto_comprasActual!=0)
				{
					$this->id_otro_impuesto_comprasFK_Idotro_impuesto_compras=$lista_producto_session->bigidotro_impuesto_comprasActual;
					$lista_producto_session->bigidotro_impuesto_comprasActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idotro_impuesto_compras($finalQueryPaginacion,$this->pagination,$this->id_otro_impuesto_comprasFK_Idotro_impuesto_compras);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//lista_productoLogicAdditional::getDetalleIndiceFK_Idotro_impuesto_compras($this->id_otro_impuesto_comprasFK_Idotro_impuesto_compras);


					if($this->lista_productoLogic->getlista_productos()==null || count($this->lista_productoLogic->getlista_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$lista_productos=$this->lista_productoLogic->getlista_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idotro_impuesto_compras('',$this->pagination,$this->id_otro_impuesto_comprasFK_Idotro_impuesto_compras);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportelista_productos("FK_Idotro_impuesto_compras",$this->lista_productoLogic->getlista_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->lista_productoLogic->setlista_productos($lista_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idotro_impuesto_ventas')
			{

				if($lista_producto_session->bigidotro_impuesto_ventasActual!=null && $lista_producto_session->bigidotro_impuesto_ventasActual!=0)
				{
					$this->id_otro_impuesto_ventasFK_Idotro_impuesto_ventas=$lista_producto_session->bigidotro_impuesto_ventasActual;
					$lista_producto_session->bigidotro_impuesto_ventasActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idotro_impuesto_ventas($finalQueryPaginacion,$this->pagination,$this->id_otro_impuesto_ventasFK_Idotro_impuesto_ventas);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//lista_productoLogicAdditional::getDetalleIndiceFK_Idotro_impuesto_ventas($this->id_otro_impuesto_ventasFK_Idotro_impuesto_ventas);


					if($this->lista_productoLogic->getlista_productos()==null || count($this->lista_productoLogic->getlista_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$lista_productos=$this->lista_productoLogic->getlista_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idotro_impuesto_ventas('',$this->pagination,$this->id_otro_impuesto_ventasFK_Idotro_impuesto_ventas);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportelista_productos("FK_Idotro_impuesto_ventas",$this->lista_productoLogic->getlista_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->lista_productoLogic->setlista_productos($lista_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idotro_suplidor')
			{

				if($lista_producto_session->bigidotro_suplidorActual!=null && $lista_producto_session->bigidotro_suplidorActual!=0)
				{
					$this->id_otro_suplidorFK_Idotro_suplidor=$lista_producto_session->bigidotro_suplidorActual;
					$lista_producto_session->bigidotro_suplidorActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idotro_suplidor($finalQueryPaginacion,$this->pagination,$this->id_otro_suplidorFK_Idotro_suplidor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//lista_productoLogicAdditional::getDetalleIndiceFK_Idotro_suplidor($this->id_otro_suplidorFK_Idotro_suplidor);


					if($this->lista_productoLogic->getlista_productos()==null || count($this->lista_productoLogic->getlista_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$lista_productos=$this->lista_productoLogic->getlista_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idotro_suplidor('',$this->pagination,$this->id_otro_suplidorFK_Idotro_suplidor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportelista_productos("FK_Idotro_suplidor",$this->lista_productoLogic->getlista_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->lista_productoLogic->setlista_productos($lista_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idproducto')
			{

				if($lista_producto_session->bigidproductoActual!=null && $lista_producto_session->bigidproductoActual!=0)
				{
					$this->id_productoFK_Idproducto=$lista_producto_session->bigidproductoActual;
					$lista_producto_session->bigidproductoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idproducto($finalQueryPaginacion,$this->pagination,$this->id_productoFK_Idproducto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//lista_productoLogicAdditional::getDetalleIndiceFK_Idproducto($this->id_productoFK_Idproducto);


					if($this->lista_productoLogic->getlista_productos()==null || count($this->lista_productoLogic->getlista_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$lista_productos=$this->lista_productoLogic->getlista_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idproducto('',$this->pagination,$this->id_productoFK_Idproducto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportelista_productos("FK_Idproducto",$this->lista_productoLogic->getlista_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->lista_productoLogic->setlista_productos($lista_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idretencion')
			{

				if($lista_producto_session->bigidretencionActual!=null && $lista_producto_session->bigidretencionActual!=0)
				{
					$this->id_retencionFK_Idretencion=$lista_producto_session->bigidretencionActual;
					$lista_producto_session->bigidretencionActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idretencion($finalQueryPaginacion,$this->pagination,$this->id_retencionFK_Idretencion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//lista_productoLogicAdditional::getDetalleIndiceFK_Idretencion($this->id_retencionFK_Idretencion);


					if($this->lista_productoLogic->getlista_productos()==null || count($this->lista_productoLogic->getlista_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$lista_productos=$this->lista_productoLogic->getlista_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idretencion('',$this->pagination,$this->id_retencionFK_Idretencion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportelista_productos("FK_Idretencion",$this->lista_productoLogic->getlista_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->lista_productoLogic->setlista_productos($lista_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idretencion_compras')
			{

				if($lista_producto_session->bigidretencion_comprasActual!=null && $lista_producto_session->bigidretencion_comprasActual!=0)
				{
					$this->id_retencion_comprasFK_Idretencion_compras=$lista_producto_session->bigidretencion_comprasActual;
					$lista_producto_session->bigidretencion_comprasActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idretencion_compras($finalQueryPaginacion,$this->pagination,$this->id_retencion_comprasFK_Idretencion_compras);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//lista_productoLogicAdditional::getDetalleIndiceFK_Idretencion_compras($this->id_retencion_comprasFK_Idretencion_compras);


					if($this->lista_productoLogic->getlista_productos()==null || count($this->lista_productoLogic->getlista_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$lista_productos=$this->lista_productoLogic->getlista_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idretencion_compras('',$this->pagination,$this->id_retencion_comprasFK_Idretencion_compras);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportelista_productos("FK_Idretencion_compras",$this->lista_productoLogic->getlista_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->lista_productoLogic->setlista_productos($lista_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idretencion_ventas')
			{

				if($lista_producto_session->bigidretencion_ventasActual!=null && $lista_producto_session->bigidretencion_ventasActual!=0)
				{
					$this->id_retencion_ventasFK_Idretencion_ventas=$lista_producto_session->bigidretencion_ventasActual;
					$lista_producto_session->bigidretencion_ventasActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idretencion_ventas($finalQueryPaginacion,$this->pagination,$this->id_retencion_ventasFK_Idretencion_ventas);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//lista_productoLogicAdditional::getDetalleIndiceFK_Idretencion_ventas($this->id_retencion_ventasFK_Idretencion_ventas);


					if($this->lista_productoLogic->getlista_productos()==null || count($this->lista_productoLogic->getlista_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$lista_productos=$this->lista_productoLogic->getlista_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idretencion_ventas('',$this->pagination,$this->id_retencion_ventasFK_Idretencion_ventas);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportelista_productos("FK_Idretencion_ventas",$this->lista_productoLogic->getlista_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->lista_productoLogic->setlista_productos($lista_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idsub_categoria_producto')
			{

				if($lista_producto_session->bigidsub_categoria_productoActual!=null && $lista_producto_session->bigidsub_categoria_productoActual!=0)
				{
					$this->id_sub_categoria_productoFK_Idsub_categoria_producto=$lista_producto_session->bigidsub_categoria_productoActual;
					$lista_producto_session->bigidsub_categoria_productoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idsub_categoria_producto($finalQueryPaginacion,$this->pagination,$this->id_sub_categoria_productoFK_Idsub_categoria_producto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//lista_productoLogicAdditional::getDetalleIndiceFK_Idsub_categoria_producto($this->id_sub_categoria_productoFK_Idsub_categoria_producto);


					if($this->lista_productoLogic->getlista_productos()==null || count($this->lista_productoLogic->getlista_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$lista_productos=$this->lista_productoLogic->getlista_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idsub_categoria_producto('',$this->pagination,$this->id_sub_categoria_productoFK_Idsub_categoria_producto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportelista_productos("FK_Idsub_categoria_producto",$this->lista_productoLogic->getlista_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->lista_productoLogic->setlista_productos($lista_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtipo_producto')
			{

				if($lista_producto_session->bigidtipo_productoActual!=null && $lista_producto_session->bigidtipo_productoActual!=0)
				{
					$this->id_tipo_productoFK_Idtipo_producto=$lista_producto_session->bigidtipo_productoActual;
					$lista_producto_session->bigidtipo_productoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idtipo_producto($finalQueryPaginacion,$this->pagination,$this->id_tipo_productoFK_Idtipo_producto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//lista_productoLogicAdditional::getDetalleIndiceFK_Idtipo_producto($this->id_tipo_productoFK_Idtipo_producto);


					if($this->lista_productoLogic->getlista_productos()==null || count($this->lista_productoLogic->getlista_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$lista_productos=$this->lista_productoLogic->getlista_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idtipo_producto('',$this->pagination,$this->id_tipo_productoFK_Idtipo_producto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportelista_productos("FK_Idtipo_producto",$this->lista_productoLogic->getlista_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->lista_productoLogic->setlista_productos($lista_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idunidad_compra')
			{

				if($lista_producto_session->bigidunidad_compraActual!=null && $lista_producto_session->bigidunidad_compraActual!=0)
				{
					$this->id_unidad_compraFK_Idunidad_compra=$lista_producto_session->bigidunidad_compraActual;
					$lista_producto_session->bigidunidad_compraActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idunidad_compra($finalQueryPaginacion,$this->pagination,$this->id_unidad_compraFK_Idunidad_compra);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//lista_productoLogicAdditional::getDetalleIndiceFK_Idunidad_compra($this->id_unidad_compraFK_Idunidad_compra);


					if($this->lista_productoLogic->getlista_productos()==null || count($this->lista_productoLogic->getlista_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$lista_productos=$this->lista_productoLogic->getlista_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idunidad_compra('',$this->pagination,$this->id_unidad_compraFK_Idunidad_compra);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportelista_productos("FK_Idunidad_compra",$this->lista_productoLogic->getlista_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->lista_productoLogic->setlista_productos($lista_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idunidad_venta')
			{

				if($lista_producto_session->bigidunidad_ventaActual!=null && $lista_producto_session->bigidunidad_ventaActual!=0)
				{
					$this->id_unidad_ventaFK_Idunidad_venta=$lista_producto_session->bigidunidad_ventaActual;
					$lista_producto_session->bigidunidad_ventaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idunidad_venta($finalQueryPaginacion,$this->pagination,$this->id_unidad_ventaFK_Idunidad_venta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//lista_productoLogicAdditional::getDetalleIndiceFK_Idunidad_venta($this->id_unidad_ventaFK_Idunidad_venta);


					if($this->lista_productoLogic->getlista_productos()==null || count($this->lista_productoLogic->getlista_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$lista_productos=$this->lista_productoLogic->getlista_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->lista_productoLogic->getsFK_Idunidad_venta('',$this->pagination,$this->id_unidad_ventaFK_Idunidad_venta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->lista_productosReporte=$this->lista_productoLogic->getlista_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportelista_productos("FK_Idunidad_venta",$this->lista_productoLogic->getlista_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->lista_productoLogic->setlista_productos($lista_productos);
					}
				//}

			} 
		
		$lista_producto_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$lista_producto_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->lista_productoLogic->loadForeignsKeysDescription();*/
		
		$this->lista_productos=$this->lista_productoLogic->getlista_productos();
		
		if($this->lista_productosEliminados==null) {
			$this->lista_productosEliminados=array();
		}
		
		$this->Session->write(lista_producto_util::$STR_SESSION_NAME.'Lista',serialize($this->lista_productos));
		$this->Session->write(lista_producto_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->lista_productosEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(lista_producto_util::$STR_SESSION_NAME,serialize($lista_producto_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idlista_producto=$idGeneral;
			
			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
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
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			if(count($this->lista_productos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
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
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_bodegaFK_Idbodega=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idbodega','cmbid_bodega');

			$this->strAccionBusqueda='FK_Idbodega';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
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
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_categoria_productoFK_Idcategoria_producto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcategoria_producto','cmbid_categoria_producto');

			$this->strAccionBusqueda='FK_Idcategoria_producto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
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
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuenta_compraFK_Idcuenta_compra=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta_compra','cmbid_cuenta_compra');

			$this->strAccionBusqueda='FK_Idcuenta_compra';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
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
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuenta_inventarioFK_Idcuenta_inventario=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta_inventario','cmbid_cuenta_inventario');

			$this->strAccionBusqueda='FK_Idcuenta_inventario';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
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
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuenta_ventaFK_Idcuenta_venta=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta_venta','cmbid_cuenta_venta');

			$this->strAccionBusqueda='FK_Idcuenta_venta';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
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
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_impuestoFK_Idimpuesto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idimpuesto','cmbid_impuesto');

			$this->strAccionBusqueda='FK_Idimpuesto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idimpuesto_comprasParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_impuesto_comprasFK_Idimpuesto_compras=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idimpuesto_compras','cmbid_impuesto_compras');

			$this->strAccionBusqueda='FK_Idimpuesto_compras';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idimpuesto_ventasParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_impuesto_ventasFK_Idimpuesto_ventas=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idimpuesto_ventas','cmbid_impuesto_ventas');

			$this->strAccionBusqueda='FK_Idimpuesto_ventas';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
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
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_otro_impuestoFK_Idotro_impuesto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idotro_impuesto','cmbid_otro_impuesto');

			$this->strAccionBusqueda='FK_Idotro_impuesto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idotro_impuesto_comprasParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_otro_impuesto_comprasFK_Idotro_impuesto_compras=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idotro_impuesto_compras','cmbid_otro_impuesto_compras');

			$this->strAccionBusqueda='FK_Idotro_impuesto_compras';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idotro_impuesto_ventasParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_otro_impuesto_ventasFK_Idotro_impuesto_ventas=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idotro_impuesto_ventas','cmbid_otro_impuesto_ventas');

			$this->strAccionBusqueda='FK_Idotro_impuesto_ventas';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idotro_suplidorParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_otro_suplidorFK_Idotro_suplidor=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idotro_suplidor','cmbid_otro_suplidor');

			$this->strAccionBusqueda='FK_Idotro_suplidor';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdproductoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_productoFK_Idproducto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idproducto','cmbid_producto');

			$this->strAccionBusqueda='FK_Idproducto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
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
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_retencionFK_Idretencion=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idretencion','cmbid_retencion');

			$this->strAccionBusqueda='FK_Idretencion';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idretencion_comprasParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_retencion_comprasFK_Idretencion_compras=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idretencion_compras','cmbid_retencion_compras');

			$this->strAccionBusqueda='FK_Idretencion_compras';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idretencion_ventasParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_retencion_ventasFK_Idretencion_ventas=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idretencion_ventas','cmbid_retencion_ventas');

			$this->strAccionBusqueda='FK_Idretencion_ventas';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
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
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_sub_categoria_productoFK_Idsub_categoria_producto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idsub_categoria_producto','cmbid_sub_categoria_producto');

			$this->strAccionBusqueda='FK_Idsub_categoria_producto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
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
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_tipo_productoFK_Idtipo_producto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtipo_producto','cmbid_tipo_producto');

			$this->strAccionBusqueda='FK_Idtipo_producto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
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
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_unidad_compraFK_Idunidad_compra=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idunidad_compra','cmbid_unidad_compra');

			$this->strAccionBusqueda='FK_Idunidad_compra';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
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
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_unidad_ventaFK_Idunidad_venta=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idunidad_venta','cmbid_unidad_venta');

			$this->strAccionBusqueda='FK_Idunidad_venta';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idbodega($strFinalQuery,$id_bodega)
	{
		try
		{

			$this->lista_productoLogic->getsFK_Idbodega($strFinalQuery,new Pagination(),$id_bodega);
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

			$this->lista_productoLogic->getsFK_Idcategoria_producto($strFinalQuery,new Pagination(),$id_categoria_producto);
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

			$this->lista_productoLogic->getsFK_Idcuenta_compra($strFinalQuery,new Pagination(),$id_cuenta_compra);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idcuenta_inventario($strFinalQuery,$id_cuenta_inventario)
	{
		try
		{

			$this->lista_productoLogic->getsFK_Idcuenta_inventario($strFinalQuery,new Pagination(),$id_cuenta_inventario);
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

			$this->lista_productoLogic->getsFK_Idcuenta_venta($strFinalQuery,new Pagination(),$id_cuenta_venta);
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

			$this->lista_productoLogic->getsFK_Idimpuesto($strFinalQuery,new Pagination(),$id_impuesto);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idimpuesto_compras($strFinalQuery,$id_impuesto_compras)
	{
		try
		{

			$this->lista_productoLogic->getsFK_Idimpuesto_compras($strFinalQuery,new Pagination(),$id_impuesto_compras);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idimpuesto_ventas($strFinalQuery,$id_impuesto_ventas)
	{
		try
		{

			$this->lista_productoLogic->getsFK_Idimpuesto_ventas($strFinalQuery,new Pagination(),$id_impuesto_ventas);
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

			$this->lista_productoLogic->getsFK_Idotro_impuesto($strFinalQuery,new Pagination(),$id_otro_impuesto);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idotro_impuesto_compras($strFinalQuery,$id_otro_impuesto_compras)
	{
		try
		{

			$this->lista_productoLogic->getsFK_Idotro_impuesto_compras($strFinalQuery,new Pagination(),$id_otro_impuesto_compras);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idotro_impuesto_ventas($strFinalQuery,$id_otro_impuesto_ventas)
	{
		try
		{

			$this->lista_productoLogic->getsFK_Idotro_impuesto_ventas($strFinalQuery,new Pagination(),$id_otro_impuesto_ventas);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idotro_suplidor($strFinalQuery,$id_otro_suplidor)
	{
		try
		{

			$this->lista_productoLogic->getsFK_Idotro_suplidor($strFinalQuery,new Pagination(),$id_otro_suplidor);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idproducto($strFinalQuery,$id_producto)
	{
		try
		{

			$this->lista_productoLogic->getsFK_Idproducto($strFinalQuery,new Pagination(),$id_producto);
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

			$this->lista_productoLogic->getsFK_Idretencion($strFinalQuery,new Pagination(),$id_retencion);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idretencion_compras($strFinalQuery,$id_retencion_compras)
	{
		try
		{

			$this->lista_productoLogic->getsFK_Idretencion_compras($strFinalQuery,new Pagination(),$id_retencion_compras);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idretencion_ventas($strFinalQuery,$id_retencion_ventas)
	{
		try
		{

			$this->lista_productoLogic->getsFK_Idretencion_ventas($strFinalQuery,new Pagination(),$id_retencion_ventas);
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

			$this->lista_productoLogic->getsFK_Idsub_categoria_producto($strFinalQuery,new Pagination(),$id_sub_categoria_producto);
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

			$this->lista_productoLogic->getsFK_Idtipo_producto($strFinalQuery,new Pagination(),$id_tipo_producto);
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

			$this->lista_productoLogic->getsFK_Idunidad_compra($strFinalQuery,new Pagination(),$id_unidad_compra);
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

			$this->lista_productoLogic->getsFK_Idunidad_venta($strFinalQuery,new Pagination(),$id_unidad_venta);
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
			
			
			$lista_productoForeignKey=new lista_producto_param_return(); //lista_productoForeignKey();
			
			$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));
						
			if($lista_producto_session==null) {
				$lista_producto_session=new lista_producto_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$lista_productoForeignKey=$this->lista_productoLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$lista_producto_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$this->strRecargarFkTipos,',')) {
				$this->productosFK=$lista_productoForeignKey->productosFK;
				$this->idproductoDefaultFK=$lista_productoForeignKey->idproductoDefaultFK;
			}

			if($lista_producto_session->bitBusquedaDesdeFKSesionproducto) {
				$this->setVisibleBusquedasParaproducto(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_unidad_compra',$this->strRecargarFkTipos,',')) {
				$this->unidad_comprasFK=$lista_productoForeignKey->unidad_comprasFK;
				$this->idunidad_compraDefaultFK=$lista_productoForeignKey->idunidad_compraDefaultFK;
			}

			if($lista_producto_session->bitBusquedaDesdeFKSesionunidad_compra) {
				$this->setVisibleBusquedasParaunidad_compra(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_unidad_venta',$this->strRecargarFkTipos,',')) {
				$this->unidad_ventasFK=$lista_productoForeignKey->unidad_ventasFK;
				$this->idunidad_ventaDefaultFK=$lista_productoForeignKey->idunidad_ventaDefaultFK;
			}

			if($lista_producto_session->bitBusquedaDesdeFKSesionunidad_venta) {
				$this->setVisibleBusquedasParaunidad_venta(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_categoria_producto',$this->strRecargarFkTipos,',')) {
				$this->categoria_productosFK=$lista_productoForeignKey->categoria_productosFK;
				$this->idcategoria_productoDefaultFK=$lista_productoForeignKey->idcategoria_productoDefaultFK;
			}

			if($lista_producto_session->bitBusquedaDesdeFKSesioncategoria_producto) {
				$this->setVisibleBusquedasParacategoria_producto(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sub_categoria_producto',$this->strRecargarFkTipos,',')) {
				$this->sub_categoria_productosFK=$lista_productoForeignKey->sub_categoria_productosFK;
				$this->idsub_categoria_productoDefaultFK=$lista_productoForeignKey->idsub_categoria_productoDefaultFK;
			}

			if($lista_producto_session->bitBusquedaDesdeFKSesionsub_categoria_producto) {
				$this->setVisibleBusquedasParasub_categoria_producto(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_producto',$this->strRecargarFkTipos,',')) {
				$this->tipo_productosFK=$lista_productoForeignKey->tipo_productosFK;
				$this->idtipo_productoDefaultFK=$lista_productoForeignKey->idtipo_productoDefaultFK;
			}

			if($lista_producto_session->bitBusquedaDesdeFKSesiontipo_producto) {
				$this->setVisibleBusquedasParatipo_producto(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$this->strRecargarFkTipos,',')) {
				$this->bodegasFK=$lista_productoForeignKey->bodegasFK;
				$this->idbodegaDefaultFK=$lista_productoForeignKey->idbodegaDefaultFK;
			}

			if($lista_producto_session->bitBusquedaDesdeFKSesionbodega) {
				$this->setVisibleBusquedasParabodega(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_compra',$this->strRecargarFkTipos,',')) {
				$this->cuenta_comprasFK=$lista_productoForeignKey->cuenta_comprasFK;
				$this->idcuenta_compraDefaultFK=$lista_productoForeignKey->idcuenta_compraDefaultFK;
			}

			if($lista_producto_session->bitBusquedaDesdeFKSesioncuenta_compra) {
				$this->setVisibleBusquedasParacuenta_compra(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_venta',$this->strRecargarFkTipos,',')) {
				$this->cuenta_ventasFK=$lista_productoForeignKey->cuenta_ventasFK;
				$this->idcuenta_ventaDefaultFK=$lista_productoForeignKey->idcuenta_ventaDefaultFK;
			}

			if($lista_producto_session->bitBusquedaDesdeFKSesioncuenta_venta) {
				$this->setVisibleBusquedasParacuenta_venta(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_inventario',$this->strRecargarFkTipos,',')) {
				$this->cuenta_inventariosFK=$lista_productoForeignKey->cuenta_inventariosFK;
				$this->idcuenta_inventarioDefaultFK=$lista_productoForeignKey->idcuenta_inventarioDefaultFK;
			}

			if($lista_producto_session->bitBusquedaDesdeFKSesioncuenta_inventario) {
				$this->setVisibleBusquedasParacuenta_inventario(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_otro_suplidor',$this->strRecargarFkTipos,',')) {
				$this->otro_suplidorsFK=$lista_productoForeignKey->otro_suplidorsFK;
				$this->idotro_suplidorDefaultFK=$lista_productoForeignKey->idotro_suplidorDefaultFK;
			}

			if($lista_producto_session->bitBusquedaDesdeFKSesionotro_suplidor) {
				$this->setVisibleBusquedasParaotro_suplidor(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_impuesto',$this->strRecargarFkTipos,',')) {
				$this->impuestosFK=$lista_productoForeignKey->impuestosFK;
				$this->idimpuestoDefaultFK=$lista_productoForeignKey->idimpuestoDefaultFK;
			}

			if($lista_producto_session->bitBusquedaDesdeFKSesionimpuesto) {
				$this->setVisibleBusquedasParaimpuesto(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_impuesto_ventas',$this->strRecargarFkTipos,',')) {
				$this->impuesto_ventassFK=$lista_productoForeignKey->impuesto_ventassFK;
				$this->idimpuesto_ventasDefaultFK=$lista_productoForeignKey->idimpuesto_ventasDefaultFK;
			}

			if($lista_producto_session->bitBusquedaDesdeFKSesionimpuesto_ventas) {
				$this->setVisibleBusquedasParaimpuesto_ventas(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_impuesto_compras',$this->strRecargarFkTipos,',')) {
				$this->impuesto_comprassFK=$lista_productoForeignKey->impuesto_comprassFK;
				$this->idimpuesto_comprasDefaultFK=$lista_productoForeignKey->idimpuesto_comprasDefaultFK;
			}

			if($lista_producto_session->bitBusquedaDesdeFKSesionimpuesto_compras) {
				$this->setVisibleBusquedasParaimpuesto_compras(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_otro_impuesto',$this->strRecargarFkTipos,',')) {
				$this->otro_impuestosFK=$lista_productoForeignKey->otro_impuestosFK;
				$this->idotro_impuestoDefaultFK=$lista_productoForeignKey->idotro_impuestoDefaultFK;
			}

			if($lista_producto_session->bitBusquedaDesdeFKSesionotro_impuesto) {
				$this->setVisibleBusquedasParaotro_impuesto(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_otro_impuesto_ventas',$this->strRecargarFkTipos,',')) {
				$this->otro_impuesto_ventassFK=$lista_productoForeignKey->otro_impuesto_ventassFK;
				$this->idotro_impuesto_ventasDefaultFK=$lista_productoForeignKey->idotro_impuesto_ventasDefaultFK;
			}

			if($lista_producto_session->bitBusquedaDesdeFKSesionotro_impuesto_ventas) {
				$this->setVisibleBusquedasParaotro_impuesto_ventas(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_otro_impuesto_compras',$this->strRecargarFkTipos,',')) {
				$this->otro_impuesto_comprassFK=$lista_productoForeignKey->otro_impuesto_comprassFK;
				$this->idotro_impuesto_comprasDefaultFK=$lista_productoForeignKey->idotro_impuesto_comprasDefaultFK;
			}

			if($lista_producto_session->bitBusquedaDesdeFKSesionotro_impuesto_compras) {
				$this->setVisibleBusquedasParaotro_impuesto_compras(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_retencion',$this->strRecargarFkTipos,',')) {
				$this->retencionsFK=$lista_productoForeignKey->retencionsFK;
				$this->idretencionDefaultFK=$lista_productoForeignKey->idretencionDefaultFK;
			}

			if($lista_producto_session->bitBusquedaDesdeFKSesionretencion) {
				$this->setVisibleBusquedasPararetencion(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_retencion_ventas',$this->strRecargarFkTipos,',')) {
				$this->retencion_ventassFK=$lista_productoForeignKey->retencion_ventassFK;
				$this->idretencion_ventasDefaultFK=$lista_productoForeignKey->idretencion_ventasDefaultFK;
			}

			if($lista_producto_session->bitBusquedaDesdeFKSesionretencion_ventas) {
				$this->setVisibleBusquedasPararetencion_ventas(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_retencion_compras',$this->strRecargarFkTipos,',')) {
				$this->retencion_comprassFK=$lista_productoForeignKey->retencion_comprassFK;
				$this->idretencion_comprasDefaultFK=$lista_productoForeignKey->idretencion_comprasDefaultFK;
			}

			if($lista_producto_session->bitBusquedaDesdeFKSesionretencion_compras) {
				$this->setVisibleBusquedasPararetencion_compras(true);
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
	
	function cargarCombosFKFromReturnGeneral($lista_productoReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$lista_productoReturnGeneral->strRecargarFkTipos;
			
			


			if($lista_productoReturnGeneral->con_productosFK==true) {
				$this->productosFK=$lista_productoReturnGeneral->productosFK;
				$this->idproductoDefaultFK=$lista_productoReturnGeneral->idproductoDefaultFK;
			}


			if($lista_productoReturnGeneral->con_unidad_comprasFK==true) {
				$this->unidad_comprasFK=$lista_productoReturnGeneral->unidad_comprasFK;
				$this->idunidad_compraDefaultFK=$lista_productoReturnGeneral->idunidad_compraDefaultFK;
			}


			if($lista_productoReturnGeneral->con_unidad_ventasFK==true) {
				$this->unidad_ventasFK=$lista_productoReturnGeneral->unidad_ventasFK;
				$this->idunidad_ventaDefaultFK=$lista_productoReturnGeneral->idunidad_ventaDefaultFK;
			}


			if($lista_productoReturnGeneral->con_categoria_productosFK==true) {
				$this->categoria_productosFK=$lista_productoReturnGeneral->categoria_productosFK;
				$this->idcategoria_productoDefaultFK=$lista_productoReturnGeneral->idcategoria_productoDefaultFK;
			}


			if($lista_productoReturnGeneral->con_sub_categoria_productosFK==true) {
				$this->sub_categoria_productosFK=$lista_productoReturnGeneral->sub_categoria_productosFK;
				$this->idsub_categoria_productoDefaultFK=$lista_productoReturnGeneral->idsub_categoria_productoDefaultFK;
			}


			if($lista_productoReturnGeneral->con_tipo_productosFK==true) {
				$this->tipo_productosFK=$lista_productoReturnGeneral->tipo_productosFK;
				$this->idtipo_productoDefaultFK=$lista_productoReturnGeneral->idtipo_productoDefaultFK;
			}


			if($lista_productoReturnGeneral->con_bodegasFK==true) {
				$this->bodegasFK=$lista_productoReturnGeneral->bodegasFK;
				$this->idbodegaDefaultFK=$lista_productoReturnGeneral->idbodegaDefaultFK;
			}


			if($lista_productoReturnGeneral->con_cuenta_comprasFK==true) {
				$this->cuenta_comprasFK=$lista_productoReturnGeneral->cuenta_comprasFK;
				$this->idcuenta_compraDefaultFK=$lista_productoReturnGeneral->idcuenta_compraDefaultFK;
			}


			if($lista_productoReturnGeneral->con_cuenta_ventasFK==true) {
				$this->cuenta_ventasFK=$lista_productoReturnGeneral->cuenta_ventasFK;
				$this->idcuenta_ventaDefaultFK=$lista_productoReturnGeneral->idcuenta_ventaDefaultFK;
			}


			if($lista_productoReturnGeneral->con_cuenta_inventariosFK==true) {
				$this->cuenta_inventariosFK=$lista_productoReturnGeneral->cuenta_inventariosFK;
				$this->idcuenta_inventarioDefaultFK=$lista_productoReturnGeneral->idcuenta_inventarioDefaultFK;
			}


			if($lista_productoReturnGeneral->con_otro_suplidorsFK==true) {
				$this->otro_suplidorsFK=$lista_productoReturnGeneral->otro_suplidorsFK;
				$this->idotro_suplidorDefaultFK=$lista_productoReturnGeneral->idotro_suplidorDefaultFK;
			}


			if($lista_productoReturnGeneral->con_impuestosFK==true) {
				$this->impuestosFK=$lista_productoReturnGeneral->impuestosFK;
				$this->idimpuestoDefaultFK=$lista_productoReturnGeneral->idimpuestoDefaultFK;
			}


			if($lista_productoReturnGeneral->con_impuesto_ventassFK==true) {
				$this->impuesto_ventassFK=$lista_productoReturnGeneral->impuesto_ventassFK;
				$this->idimpuesto_ventasDefaultFK=$lista_productoReturnGeneral->idimpuesto_ventasDefaultFK;
			}


			if($lista_productoReturnGeneral->con_impuesto_comprassFK==true) {
				$this->impuesto_comprassFK=$lista_productoReturnGeneral->impuesto_comprassFK;
				$this->idimpuesto_comprasDefaultFK=$lista_productoReturnGeneral->idimpuesto_comprasDefaultFK;
			}


			if($lista_productoReturnGeneral->con_otro_impuestosFK==true) {
				$this->otro_impuestosFK=$lista_productoReturnGeneral->otro_impuestosFK;
				$this->idotro_impuestoDefaultFK=$lista_productoReturnGeneral->idotro_impuestoDefaultFK;
			}


			if($lista_productoReturnGeneral->con_otro_impuesto_ventassFK==true) {
				$this->otro_impuesto_ventassFK=$lista_productoReturnGeneral->otro_impuesto_ventassFK;
				$this->idotro_impuesto_ventasDefaultFK=$lista_productoReturnGeneral->idotro_impuesto_ventasDefaultFK;
			}


			if($lista_productoReturnGeneral->con_otro_impuesto_comprassFK==true) {
				$this->otro_impuesto_comprassFK=$lista_productoReturnGeneral->otro_impuesto_comprassFK;
				$this->idotro_impuesto_comprasDefaultFK=$lista_productoReturnGeneral->idotro_impuesto_comprasDefaultFK;
			}


			if($lista_productoReturnGeneral->con_retencionsFK==true) {
				$this->retencionsFK=$lista_productoReturnGeneral->retencionsFK;
				$this->idretencionDefaultFK=$lista_productoReturnGeneral->idretencionDefaultFK;
			}


			if($lista_productoReturnGeneral->con_retencion_ventassFK==true) {
				$this->retencion_ventassFK=$lista_productoReturnGeneral->retencion_ventassFK;
				$this->idretencion_ventasDefaultFK=$lista_productoReturnGeneral->idretencion_ventasDefaultFK;
			}


			if($lista_productoReturnGeneral->con_retencion_comprassFK==true) {
				$this->retencion_comprassFK=$lista_productoReturnGeneral->retencion_comprassFK;
				$this->idretencion_comprasDefaultFK=$lista_productoReturnGeneral->idretencion_comprasDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(lista_producto_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));
		
		if($lista_producto_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($lista_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==producto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='producto';
			}
			else if($lista_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==unidad_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='unidad';
			}
			else if($lista_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==unidad_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='unidad';
			}
			else if($lista_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==categoria_producto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='categoria_producto';
			}
			else if($lista_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==sub_categoria_producto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='sub_categoria_producto';
			}
			else if($lista_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==tipo_producto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='tipo_producto';
			}
			else if($lista_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==bodega_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='bodega';
			}
			else if($lista_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta';
			}
			else if($lista_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta';
			}
			else if($lista_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta';
			}
			else if($lista_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==otro_suplidor_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='otro_suplidor';
			}
			else if($lista_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==impuesto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='impuesto';
			}
			else if($lista_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==impuesto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='impuesto';
			}
			else if($lista_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==impuesto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='impuesto';
			}
			else if($lista_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==otro_impuesto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='otro_impuesto';
			}
			else if($lista_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==otro_impuesto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='otro_impuesto';
			}
			else if($lista_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==otro_impuesto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='otro_impuesto';
			}
			else if($lista_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==retencion_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='retencion';
			}
			else if($lista_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==retencion_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='retencion';
			}
			else if($lista_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==retencion_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='retencion';
			}
			
			$lista_producto_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}						
			
			$this->lista_productosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->lista_productosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->lista_productosAuxiliar=array();
			}
			
			if(count($this->lista_productosAuxiliar) > 0) {
				
				foreach ($this->lista_productosAuxiliar as $lista_productoSeleccionado) {
					$this->eliminarTablaBase($lista_productoSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
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
	
	
	
	public function getproductosFKListSelectItem() 
	{
		$productosList=array();

		$item=null;

		foreach($this->productosFK as $producto)
		{
			$item=new SelectItem();
			$item->setLabel($producto->getcodigo());
			$item->setValue($producto->getId());
			$productosList[]=$item;
		}

		return $productosList;
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


	public function getbodegasFKListSelectItem() 
	{
		$bodegasList=array();

		$item=null;

		foreach($this->bodegasFK as $bodega)
		{
			$item=new SelectItem();
			$item->setLabel($bodega->getcodigo());
			$item->setValue($bodega->getId());
			$bodegasList[]=$item;
		}

		return $bodegasList;
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


	public function getcuenta_inventariosFKListSelectItem() 
	{
		$cuenta_inventariosList=array();

		$item=null;

		foreach($this->cuenta_inventariosFK as $cuenta_inventario)
		{
			$item=new SelectItem();
			$item->setLabel($cuenta_inventario->getcodigo());
			$item->setValue($cuenta_inventario->getId());
			$cuenta_inventariosList[]=$item;
		}

		return $cuenta_inventariosList;
	}


	public function getotro_suplidorsFKListSelectItem() 
	{
		$otro_suplidorsList=array();

		$item=null;

		foreach($this->otro_suplidorsFK as $otro_suplidor)
		{
			$item=new SelectItem();
			$item->setLabel($otro_suplidor>getId());
			$item->setValue($otro_suplidor->getId());
			$otro_suplidorsList[]=$item;
		}

		return $otro_suplidorsList;
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


	public function getimpuesto_ventassFKListSelectItem() 
	{
		$impuesto_ventassList=array();

		$item=null;

		foreach($this->impuesto_ventassFK as $impuesto_ventas)
		{
			$item=new SelectItem();
			$item->setLabel($impuesto_ventas->getdescripcion());
			$item->setValue($impuesto_ventas->getId());
			$impuesto_ventassList[]=$item;
		}

		return $impuesto_ventassList;
	}


	public function getimpuesto_comprassFKListSelectItem() 
	{
		$impuesto_comprassList=array();

		$item=null;

		foreach($this->impuesto_comprassFK as $impuesto_compras)
		{
			$item=new SelectItem();
			$item->setLabel($impuesto_compras->getdescripcion());
			$item->setValue($impuesto_compras->getId());
			$impuesto_comprassList[]=$item;
		}

		return $impuesto_comprassList;
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


	public function getotro_impuesto_ventassFKListSelectItem() 
	{
		$otro_impuesto_ventassList=array();

		$item=null;

		foreach($this->otro_impuesto_ventassFK as $otro_impuesto_ventas)
		{
			$item=new SelectItem();
			$item->setLabel($otro_impuesto_ventas->getcodigo());
			$item->setValue($otro_impuesto_ventas->getId());
			$otro_impuesto_ventassList[]=$item;
		}

		return $otro_impuesto_ventassList;
	}


	public function getotro_impuesto_comprassFKListSelectItem() 
	{
		$otro_impuesto_comprassList=array();

		$item=null;

		foreach($this->otro_impuesto_comprassFK as $otro_impuesto_compras)
		{
			$item=new SelectItem();
			$item->setLabel($otro_impuesto_compras->getcodigo());
			$item->setValue($otro_impuesto_compras->getId());
			$otro_impuesto_comprassList[]=$item;
		}

		return $otro_impuesto_comprassList;
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


	public function getretencion_ventassFKListSelectItem() 
	{
		$retencion_ventassList=array();

		$item=null;

		foreach($this->retencion_ventassFK as $retencion_ventas)
		{
			$item=new SelectItem();
			$item->setLabel($retencion_ventas->getcodigo());
			$item->setValue($retencion_ventas->getId());
			$retencion_ventassList[]=$item;
		}

		return $retencion_ventassList;
	}


	public function getretencion_comprassFKListSelectItem() 
	{
		$retencion_comprassList=array();

		$item=null;

		foreach($this->retencion_comprassFK as $retencion_compras)
		{
			$item=new SelectItem();
			$item->setLabel($retencion_compras->getcodigo());
			$item->setValue($retencion_compras->getId());
			$retencion_comprassList[]=$item;
		}

		return $retencion_comprassList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
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
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$lista_productosNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->lista_productos as $lista_productoLocal) {
				if($lista_productoLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->lista_producto=new lista_producto();
				
				$this->lista_producto->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->lista_productos[]=$this->lista_producto;*/
				
				$lista_productosNuevos[]=$this->lista_producto;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('producto');$classes[]=$class;
				$class=new Classe('unidad_compra');$classes[]=$class;
				$class=new Classe('unidad_venta');$classes[]=$class;
				$class=new Classe('categoria_producto');$classes[]=$class;
				$class=new Classe('sub_categoria_producto');$classes[]=$class;
				$class=new Classe('tipo_producto');$classes[]=$class;
				$class=new Classe('bodega');$classes[]=$class;
				$class=new Classe('cuenta_compra');$classes[]=$class;
				$class=new Classe('cuenta_venta');$classes[]=$class;
				$class=new Classe('cuenta_inventario');$classes[]=$class;
				$class=new Classe('otro_suplidor');$classes[]=$class;
				$class=new Classe('impuesto');$classes[]=$class;
				$class=new Classe('impuesto_ventas');$classes[]=$class;
				$class=new Classe('impuesto_compras');$classes[]=$class;
				$class=new Classe('otro_impuesto');$classes[]=$class;
				$class=new Classe('otro_impuesto_ventas');$classes[]=$class;
				$class=new Classe('otro_impuesto_compras');$classes[]=$class;
				$class=new Classe('retencion');$classes[]=$class;
				$class=new Classe('retencion_ventas');$classes[]=$class;
				$class=new Classe('retencion_compras');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->setlista_productos($lista_productosNuevos);
					
				$this->lista_productoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($lista_productosNuevos as $lista_productoNuevo) {
					$this->lista_productos[]=$lista_productoNuevo;
				}
				
				/*$this->lista_productos[]=$lista_productosNuevos;*/
				
				$this->lista_productoLogic->setlista_productos($this->lista_productos);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($lista_productosNuevos!=null);
	}
					
	
	public function cargarCombosproductosFK($connexion=null,$strRecargarFkQuery=''){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$this->productosFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionproducto!=true) {
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


			$this->prepararCombosproductosFK($productoLogic->getproductos());

		} else {
			$this->setVisibleBusquedasParaproducto(true);


			if($lista_producto_session->bigidproductoActual!=null && $lista_producto_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($lista_producto_session->bigidproductoActual);//WithConnection

				$this->productosFK[$productoLogic->getproducto()->getId()]=lista_producto_util::getproductoDescripcion($productoLogic->getproducto());
				$this->idproductoDefaultFK=$productoLogic->getproducto()->getId();
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

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionunidad_compra!=true) {
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


			if($lista_producto_session->bigidunidad_compraActual!=null && $lista_producto_session->bigidunidad_compraActual > 0) {
				$unidadLogic->getEntity($lista_producto_session->bigidunidad_compraActual);//WithConnection

				$this->unidad_comprasFK[$unidadLogic->getunidad()->getId()]=lista_producto_util::getunidad_compraDescripcion($unidadLogic->getunidad());
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

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionunidad_venta!=true) {
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


			if($lista_producto_session->bigidunidad_ventaActual!=null && $lista_producto_session->bigidunidad_ventaActual > 0) {
				$unidadLogic->getEntity($lista_producto_session->bigidunidad_ventaActual);//WithConnection

				$this->unidad_ventasFK[$unidadLogic->getunidad()->getId()]=lista_producto_util::getunidad_ventaDescripcion($unidadLogic->getunidad());
				$this->idunidad_ventaDefaultFK=$unidadLogic->getunidad()->getId();
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

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesioncategoria_producto!=true) {
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


			if($lista_producto_session->bigidcategoria_productoActual!=null && $lista_producto_session->bigidcategoria_productoActual > 0) {
				$categoria_productoLogic->getEntity($lista_producto_session->bigidcategoria_productoActual);//WithConnection

				$this->categoria_productosFK[$categoria_productoLogic->getcategoria_producto()->getId()]=lista_producto_util::getcategoria_productoDescripcion($categoria_productoLogic->getcategoria_producto());
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

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionsub_categoria_producto!=true) {
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


			if($lista_producto_session->bigidsub_categoria_productoActual!=null && $lista_producto_session->bigidsub_categoria_productoActual > 0) {
				$sub_categoria_productoLogic->getEntity($lista_producto_session->bigidsub_categoria_productoActual);//WithConnection

				$this->sub_categoria_productosFK[$sub_categoria_productoLogic->getsub_categoria_producto()->getId()]=lista_producto_util::getsub_categoria_productoDescripcion($sub_categoria_productoLogic->getsub_categoria_producto());
				$this->idsub_categoria_productoDefaultFK=$sub_categoria_productoLogic->getsub_categoria_producto()->getId();
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

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesiontipo_producto!=true) {
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


			if($lista_producto_session->bigidtipo_productoActual!=null && $lista_producto_session->bigidtipo_productoActual > 0) {
				$tipo_productoLogic->getEntity($lista_producto_session->bigidtipo_productoActual);//WithConnection

				$this->tipo_productosFK[$tipo_productoLogic->gettipo_producto()->getId()]=lista_producto_util::gettipo_productoDescripcion($tipo_productoLogic->gettipo_producto());
				$this->idtipo_productoDefaultFK=$tipo_productoLogic->gettipo_producto()->getId();
			}
		}
	}

	public function cargarCombosbodegasFK($connexion=null,$strRecargarFkQuery=''){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$this->bodegasFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionbodega!=true) {
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


			$this->prepararCombosbodegasFK($bodegaLogic->getbodegas());

		} else {
			$this->setVisibleBusquedasParabodega(true);


			if($lista_producto_session->bigidbodegaActual!=null && $lista_producto_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($lista_producto_session->bigidbodegaActual);//WithConnection

				$this->bodegasFK[$bodegaLogic->getbodega()->getId()]=lista_producto_util::getbodegaDescripcion($bodegaLogic->getbodega());
				$this->idbodegaDefaultFK=$bodegaLogic->getbodega()->getId();
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

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesioncuenta_compra!=true) {
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


			if($lista_producto_session->bigidcuenta_compraActual!=null && $lista_producto_session->bigidcuenta_compraActual > 0) {
				$cuentaLogic->getEntity($lista_producto_session->bigidcuenta_compraActual);//WithConnection

				$this->cuenta_comprasFK[$cuentaLogic->getcuenta()->getId()]=lista_producto_util::getcuenta_compraDescripcion($cuentaLogic->getcuenta());
				$this->idcuenta_compraDefaultFK=$cuentaLogic->getcuenta()->getId();
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

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesioncuenta_venta!=true) {
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


			if($lista_producto_session->bigidcuenta_ventaActual!=null && $lista_producto_session->bigidcuenta_ventaActual > 0) {
				$cuentaLogic->getEntity($lista_producto_session->bigidcuenta_ventaActual);//WithConnection

				$this->cuenta_ventasFK[$cuentaLogic->getcuenta()->getId()]=lista_producto_util::getcuenta_ventaDescripcion($cuentaLogic->getcuenta());
				$this->idcuenta_ventaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarComboscuenta_inventariosFK($connexion=null,$strRecargarFkQuery=''){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$this->cuenta_inventariosFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesioncuenta_inventario!=true) {
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


			$this->prepararComboscuenta_inventariosFK($cuentaLogic->getcuentas());

		} else {
			$this->setVisibleBusquedasParacuenta_inventario(true);


			if($lista_producto_session->bigidcuenta_inventarioActual!=null && $lista_producto_session->bigidcuenta_inventarioActual > 0) {
				$cuentaLogic->getEntity($lista_producto_session->bigidcuenta_inventarioActual);//WithConnection

				$this->cuenta_inventariosFK[$cuentaLogic->getcuenta()->getId()]=lista_producto_util::getcuenta_inventarioDescripcion($cuentaLogic->getcuenta());
				$this->idcuenta_inventarioDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarCombosotro_suplidorsFK($connexion=null,$strRecargarFkQuery=''){
		$otro_suplidorLogic= new otro_suplidor_logic();
		$pagination= new Pagination();
		$this->otro_suplidorsFK=array();

		$otro_suplidorLogic->setConnexion($connexion);
		$otro_suplidorLogic->getotro_suplidorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionotro_suplidor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=otro_suplidor_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalotro_suplidor=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalotro_suplidor=Funciones::GetFinalQueryAppend($finalQueryGlobalotro_suplidor, '');
				$finalQueryGlobalotro_suplidor.=otro_suplidor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalotro_suplidor.$strRecargarFkQuery;		

				$otro_suplidorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosotro_suplidorsFK($otro_suplidorLogic->getotro_suplidors());

		} else {
			$this->setVisibleBusquedasParaotro_suplidor(true);


			if($lista_producto_session->bigidotro_suplidorActual!=null && $lista_producto_session->bigidotro_suplidorActual > 0) {
				$otro_suplidorLogic->getEntity($lista_producto_session->bigidotro_suplidorActual);//WithConnection

				$this->otro_suplidorsFK[$otro_suplidorLogic->getotro_suplidor()->getId()]=lista_producto_util::getotro_suplidorDescripcion($otro_suplidorLogic->getotro_suplidor());
				$this->idotro_suplidorDefaultFK=$otro_suplidorLogic->getotro_suplidor()->getId();
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

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionimpuesto!=true) {
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


			if($lista_producto_session->bigidimpuestoActual!=null && $lista_producto_session->bigidimpuestoActual > 0) {
				$impuestoLogic->getEntity($lista_producto_session->bigidimpuestoActual);//WithConnection

				$this->impuestosFK[$impuestoLogic->getimpuesto()->getId()]=lista_producto_util::getimpuestoDescripcion($impuestoLogic->getimpuesto());
				$this->idimpuestoDefaultFK=$impuestoLogic->getimpuesto()->getId();
			}
		}
	}

	public function cargarCombosimpuesto_ventassFK($connexion=null,$strRecargarFkQuery=''){
		$impuestoLogic= new impuesto_logic();
		$pagination= new Pagination();
		$this->impuesto_ventassFK=array();

		$impuestoLogic->setConnexion($connexion);
		$impuestoLogic->getimpuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionimpuesto_ventas!=true) {
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


			$this->prepararCombosimpuesto_ventassFK($impuestoLogic->getimpuestos());

		} else {
			$this->setVisibleBusquedasParaimpuesto_ventas(true);


			if($lista_producto_session->bigidimpuesto_ventasActual!=null && $lista_producto_session->bigidimpuesto_ventasActual > 0) {
				$impuestoLogic->getEntity($lista_producto_session->bigidimpuesto_ventasActual);//WithConnection

				$this->impuesto_ventassFK[$impuestoLogic->getimpuesto()->getId()]=lista_producto_util::getimpuesto_ventasDescripcion($impuestoLogic->getimpuesto());
				$this->idimpuesto_ventasDefaultFK=$impuestoLogic->getimpuesto()->getId();
			}
		}
	}

	public function cargarCombosimpuesto_comprassFK($connexion=null,$strRecargarFkQuery=''){
		$impuestoLogic= new impuesto_logic();
		$pagination= new Pagination();
		$this->impuesto_comprassFK=array();

		$impuestoLogic->setConnexion($connexion);
		$impuestoLogic->getimpuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionimpuesto_compras!=true) {
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


			$this->prepararCombosimpuesto_comprassFK($impuestoLogic->getimpuestos());

		} else {
			$this->setVisibleBusquedasParaimpuesto_compras(true);


			if($lista_producto_session->bigidimpuesto_comprasActual!=null && $lista_producto_session->bigidimpuesto_comprasActual > 0) {
				$impuestoLogic->getEntity($lista_producto_session->bigidimpuesto_comprasActual);//WithConnection

				$this->impuesto_comprassFK[$impuestoLogic->getimpuesto()->getId()]=lista_producto_util::getimpuesto_comprasDescripcion($impuestoLogic->getimpuesto());
				$this->idimpuesto_comprasDefaultFK=$impuestoLogic->getimpuesto()->getId();
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

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionotro_impuesto!=true) {
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


			if($lista_producto_session->bigidotro_impuestoActual!=null && $lista_producto_session->bigidotro_impuestoActual > 0) {
				$otro_impuestoLogic->getEntity($lista_producto_session->bigidotro_impuestoActual);//WithConnection

				$this->otro_impuestosFK[$otro_impuestoLogic->getotro_impuesto()->getId()]=lista_producto_util::getotro_impuestoDescripcion($otro_impuestoLogic->getotro_impuesto());
				$this->idotro_impuestoDefaultFK=$otro_impuestoLogic->getotro_impuesto()->getId();
			}
		}
	}

	public function cargarCombosotro_impuesto_ventassFK($connexion=null,$strRecargarFkQuery=''){
		$otro_impuestoLogic= new otro_impuesto_logic();
		$pagination= new Pagination();
		$this->otro_impuesto_ventassFK=array();

		$otro_impuestoLogic->setConnexion($connexion);
		$otro_impuestoLogic->getotro_impuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionotro_impuesto_ventas!=true) {
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


			$this->prepararCombosotro_impuesto_ventassFK($otro_impuestoLogic->getotro_impuestos());

		} else {
			$this->setVisibleBusquedasParaotro_impuesto_ventas(true);


			if($lista_producto_session->bigidotro_impuesto_ventasActual!=null && $lista_producto_session->bigidotro_impuesto_ventasActual > 0) {
				$otro_impuestoLogic->getEntity($lista_producto_session->bigidotro_impuesto_ventasActual);//WithConnection

				$this->otro_impuesto_ventassFK[$otro_impuestoLogic->getotro_impuesto()->getId()]=lista_producto_util::getotro_impuesto_ventasDescripcion($otro_impuestoLogic->getotro_impuesto());
				$this->idotro_impuesto_ventasDefaultFK=$otro_impuestoLogic->getotro_impuesto()->getId();
			}
		}
	}

	public function cargarCombosotro_impuesto_comprassFK($connexion=null,$strRecargarFkQuery=''){
		$otro_impuestoLogic= new otro_impuesto_logic();
		$pagination= new Pagination();
		$this->otro_impuesto_comprassFK=array();

		$otro_impuestoLogic->setConnexion($connexion);
		$otro_impuestoLogic->getotro_impuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionotro_impuesto_compras!=true) {
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


			$this->prepararCombosotro_impuesto_comprassFK($otro_impuestoLogic->getotro_impuestos());

		} else {
			$this->setVisibleBusquedasParaotro_impuesto_compras(true);


			if($lista_producto_session->bigidotro_impuesto_comprasActual!=null && $lista_producto_session->bigidotro_impuesto_comprasActual > 0) {
				$otro_impuestoLogic->getEntity($lista_producto_session->bigidotro_impuesto_comprasActual);//WithConnection

				$this->otro_impuesto_comprassFK[$otro_impuestoLogic->getotro_impuesto()->getId()]=lista_producto_util::getotro_impuesto_comprasDescripcion($otro_impuestoLogic->getotro_impuesto());
				$this->idotro_impuesto_comprasDefaultFK=$otro_impuestoLogic->getotro_impuesto()->getId();
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

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionretencion!=true) {
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


			if($lista_producto_session->bigidretencionActual!=null && $lista_producto_session->bigidretencionActual > 0) {
				$retencionLogic->getEntity($lista_producto_session->bigidretencionActual);//WithConnection

				$this->retencionsFK[$retencionLogic->getretencion()->getId()]=lista_producto_util::getretencionDescripcion($retencionLogic->getretencion());
				$this->idretencionDefaultFK=$retencionLogic->getretencion()->getId();
			}
		}
	}

	public function cargarCombosretencion_ventassFK($connexion=null,$strRecargarFkQuery=''){
		$retencionLogic= new retencion_logic();
		$pagination= new Pagination();
		$this->retencion_ventassFK=array();

		$retencionLogic->setConnexion($connexion);
		$retencionLogic->getretencionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionretencion_ventas!=true) {
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


			$this->prepararCombosretencion_ventassFK($retencionLogic->getretencions());

		} else {
			$this->setVisibleBusquedasPararetencion_ventas(true);


			if($lista_producto_session->bigidretencion_ventasActual!=null && $lista_producto_session->bigidretencion_ventasActual > 0) {
				$retencionLogic->getEntity($lista_producto_session->bigidretencion_ventasActual);//WithConnection

				$this->retencion_ventassFK[$retencionLogic->getretencion()->getId()]=lista_producto_util::getretencion_ventasDescripcion($retencionLogic->getretencion());
				$this->idretencion_ventasDefaultFK=$retencionLogic->getretencion()->getId();
			}
		}
	}

	public function cargarCombosretencion_comprassFK($connexion=null,$strRecargarFkQuery=''){
		$retencionLogic= new retencion_logic();
		$pagination= new Pagination();
		$this->retencion_comprassFK=array();

		$retencionLogic->setConnexion($connexion);
		$retencionLogic->getretencionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionretencion_compras!=true) {
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


			$this->prepararCombosretencion_comprassFK($retencionLogic->getretencions());

		} else {
			$this->setVisibleBusquedasPararetencion_compras(true);


			if($lista_producto_session->bigidretencion_comprasActual!=null && $lista_producto_session->bigidretencion_comprasActual > 0) {
				$retencionLogic->getEntity($lista_producto_session->bigidretencion_comprasActual);//WithConnection

				$this->retencion_comprassFK[$retencionLogic->getretencion()->getId()]=lista_producto_util::getretencion_comprasDescripcion($retencionLogic->getretencion());
				$this->idretencion_comprasDefaultFK=$retencionLogic->getretencion()->getId();
			}
		}
	}

	
	
	public function prepararCombosproductosFK($productos){

		foreach ($productos as $productoLocal ) {
			if($this->idproductoDefaultFK==0) {
				$this->idproductoDefaultFK=$productoLocal->getId();
			}

			$this->productosFK[$productoLocal->getId()]=lista_producto_util::getproductoDescripcion($productoLocal);
		}
	}

	public function prepararCombosunidad_comprasFK($unidads){

		foreach ($unidads as $unidadLocal ) {
			if($this->idunidad_compraDefaultFK==0) {
				$this->idunidad_compraDefaultFK=$unidadLocal->getId();
			}

			$this->unidad_comprasFK[$unidadLocal->getId()]=lista_producto_util::getunidad_compraDescripcion($unidadLocal);
		}
	}

	public function prepararCombosunidad_ventasFK($unidads){

		foreach ($unidads as $unidadLocal ) {
			if($this->idunidad_ventaDefaultFK==0) {
				$this->idunidad_ventaDefaultFK=$unidadLocal->getId();
			}

			$this->unidad_ventasFK[$unidadLocal->getId()]=lista_producto_util::getunidad_ventaDescripcion($unidadLocal);
		}
	}

	public function prepararComboscategoria_productosFK($categoria_productos){

		foreach ($categoria_productos as $categoria_productoLocal ) {
			if($this->idcategoria_productoDefaultFK==0) {
				$this->idcategoria_productoDefaultFK=$categoria_productoLocal->getId();
			}

			$this->categoria_productosFK[$categoria_productoLocal->getId()]=lista_producto_util::getcategoria_productoDescripcion($categoria_productoLocal);
		}
	}

	public function prepararCombossub_categoria_productosFK($sub_categoria_productos){

		foreach ($sub_categoria_productos as $sub_categoria_productoLocal ) {
			if($this->idsub_categoria_productoDefaultFK==0) {
				$this->idsub_categoria_productoDefaultFK=$sub_categoria_productoLocal->getId();
			}

			$this->sub_categoria_productosFK[$sub_categoria_productoLocal->getId()]=lista_producto_util::getsub_categoria_productoDescripcion($sub_categoria_productoLocal);
		}
	}

	public function prepararCombostipo_productosFK($tipo_productos){

		foreach ($tipo_productos as $tipo_productoLocal ) {
			if($this->idtipo_productoDefaultFK==0) {
				$this->idtipo_productoDefaultFK=$tipo_productoLocal->getId();
			}

			$this->tipo_productosFK[$tipo_productoLocal->getId()]=lista_producto_util::gettipo_productoDescripcion($tipo_productoLocal);
		}
	}

	public function prepararCombosbodegasFK($bodegas){

		foreach ($bodegas as $bodegaLocal ) {
			if($this->idbodegaDefaultFK==0) {
				$this->idbodegaDefaultFK=$bodegaLocal->getId();
			}

			$this->bodegasFK[$bodegaLocal->getId()]=lista_producto_util::getbodegaDescripcion($bodegaLocal);
		}
	}

	public function prepararComboscuenta_comprasFK($cuentas){

		foreach ($cuentas as $cuentaLocal ) {
			if($this->idcuenta_compraDefaultFK==0) {
				$this->idcuenta_compraDefaultFK=$cuentaLocal->getId();
			}

			$this->cuenta_comprasFK[$cuentaLocal->getId()]=lista_producto_util::getcuenta_compraDescripcion($cuentaLocal);
		}
	}

	public function prepararComboscuenta_ventasFK($cuentas){

		foreach ($cuentas as $cuentaLocal ) {
			if($this->idcuenta_ventaDefaultFK==0) {
				$this->idcuenta_ventaDefaultFK=$cuentaLocal->getId();
			}

			$this->cuenta_ventasFK[$cuentaLocal->getId()]=lista_producto_util::getcuenta_ventaDescripcion($cuentaLocal);
		}
	}

	public function prepararComboscuenta_inventariosFK($cuentas){

		foreach ($cuentas as $cuentaLocal ) {
			if($this->idcuenta_inventarioDefaultFK==0) {
				$this->idcuenta_inventarioDefaultFK=$cuentaLocal->getId();
			}

			$this->cuenta_inventariosFK[$cuentaLocal->getId()]=lista_producto_util::getcuenta_inventarioDescripcion($cuentaLocal);
		}
	}

	public function prepararCombosotro_suplidorsFK($otro_suplidors){

		foreach ($otro_suplidors as $otro_suplidorLocal ) {
			if($this->idotro_suplidorDefaultFK==0) {
				$this->idotro_suplidorDefaultFK=$otro_suplidorLocal->getId();
			}

			$this->otro_suplidorsFK[$otro_suplidorLocal->getId()]=lista_producto_util::getotro_suplidorDescripcion($otro_suplidorLocal);
		}
	}

	public function prepararCombosimpuestosFK($impuestos){

		foreach ($impuestos as $impuestoLocal ) {
			if($this->idimpuestoDefaultFK==0) {
				$this->idimpuestoDefaultFK=$impuestoLocal->getId();
			}

			$this->impuestosFK[$impuestoLocal->getId()]=lista_producto_util::getimpuestoDescripcion($impuestoLocal);
		}
	}

	public function prepararCombosimpuesto_ventassFK($impuestos){

		foreach ($impuestos as $impuestoLocal ) {
			if($this->idimpuesto_ventasDefaultFK==0) {
				$this->idimpuesto_ventasDefaultFK=$impuestoLocal->getId();
			}

			$this->impuesto_ventassFK[$impuestoLocal->getId()]=lista_producto_util::getimpuesto_ventasDescripcion($impuestoLocal);
		}
	}

	public function prepararCombosimpuesto_comprassFK($impuestos){

		foreach ($impuestos as $impuestoLocal ) {
			if($this->idimpuesto_comprasDefaultFK==0) {
				$this->idimpuesto_comprasDefaultFK=$impuestoLocal->getId();
			}

			$this->impuesto_comprassFK[$impuestoLocal->getId()]=lista_producto_util::getimpuesto_comprasDescripcion($impuestoLocal);
		}
	}

	public function prepararCombosotro_impuestosFK($otro_impuestos){

		foreach ($otro_impuestos as $otro_impuestoLocal ) {
			if($this->idotro_impuestoDefaultFK==0) {
				$this->idotro_impuestoDefaultFK=$otro_impuestoLocal->getId();
			}

			$this->otro_impuestosFK[$otro_impuestoLocal->getId()]=lista_producto_util::getotro_impuestoDescripcion($otro_impuestoLocal);
		}
	}

	public function prepararCombosotro_impuesto_ventassFK($otro_impuestos){

		foreach ($otro_impuestos as $otro_impuestoLocal ) {
			if($this->idotro_impuesto_ventasDefaultFK==0) {
				$this->idotro_impuesto_ventasDefaultFK=$otro_impuestoLocal->getId();
			}

			$this->otro_impuesto_ventassFK[$otro_impuestoLocal->getId()]=lista_producto_util::getotro_impuesto_ventasDescripcion($otro_impuestoLocal);
		}
	}

	public function prepararCombosotro_impuesto_comprassFK($otro_impuestos){

		foreach ($otro_impuestos as $otro_impuestoLocal ) {
			if($this->idotro_impuesto_comprasDefaultFK==0) {
				$this->idotro_impuesto_comprasDefaultFK=$otro_impuestoLocal->getId();
			}

			$this->otro_impuesto_comprassFK[$otro_impuestoLocal->getId()]=lista_producto_util::getotro_impuesto_comprasDescripcion($otro_impuestoLocal);
		}
	}

	public function prepararCombosretencionsFK($retencions){

		foreach ($retencions as $retencionLocal ) {
			if($this->idretencionDefaultFK==0) {
				$this->idretencionDefaultFK=$retencionLocal->getId();
			}

			$this->retencionsFK[$retencionLocal->getId()]=lista_producto_util::getretencionDescripcion($retencionLocal);
		}
	}

	public function prepararCombosretencion_ventassFK($retencions){

		foreach ($retencions as $retencionLocal ) {
			if($this->idretencion_ventasDefaultFK==0) {
				$this->idretencion_ventasDefaultFK=$retencionLocal->getId();
			}

			$this->retencion_ventassFK[$retencionLocal->getId()]=lista_producto_util::getretencion_ventasDescripcion($retencionLocal);
		}
	}

	public function prepararCombosretencion_comprassFK($retencions){

		foreach ($retencions as $retencionLocal ) {
			if($this->idretencion_comprasDefaultFK==0) {
				$this->idretencion_comprasDefaultFK=$retencionLocal->getId();
			}

			$this->retencion_comprassFK[$retencionLocal->getId()]=lista_producto_util::getretencion_comprasDescripcion($retencionLocal);
		}
	}

	
	
	public function cargarDescripcionproductoFK($idproducto,$connexion=null){
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

			$strDescripcionproducto=lista_producto_util::getproductoDescripcion($productoLogic->getproducto());

		} else {
			$strDescripcionproducto='null';
		}

		return $strDescripcionproducto;
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

			$strDescripcionunidad=lista_producto_util::getunidad_compraDescripcion($unidadLogic->getunidad());

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

			$strDescripcionunidad=lista_producto_util::getunidad_ventaDescripcion($unidadLogic->getunidad());

		} else {
			$strDescripcionunidad='null';
		}

		return $strDescripcionunidad;
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

			$strDescripcioncategoria_producto=lista_producto_util::getcategoria_productoDescripcion($categoria_productoLogic->getcategoria_producto());

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

			$strDescripcionsub_categoria_producto=lista_producto_util::getsub_categoria_productoDescripcion($sub_categoria_productoLogic->getsub_categoria_producto());

		} else {
			$strDescripcionsub_categoria_producto='null';
		}

		return $strDescripcionsub_categoria_producto;
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

			$strDescripciontipo_producto=lista_producto_util::gettipo_productoDescripcion($tipo_productoLogic->gettipo_producto());

		} else {
			$strDescripciontipo_producto='null';
		}

		return $strDescripciontipo_producto;
	}

	public function cargarDescripcionbodegaFK($idbodega,$connexion=null){
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

			$strDescripcionbodega=lista_producto_util::getbodegaDescripcion($bodegaLogic->getbodega());

		} else {
			$strDescripcionbodega='null';
		}

		return $strDescripcionbodega;
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

			$strDescripcioncuenta=lista_producto_util::getcuenta_compraDescripcion($cuentaLogic->getcuenta());

		} else {
			$strDescripcioncuenta='null';
		}

		return $strDescripcioncuenta;
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

			$strDescripcioncuenta=lista_producto_util::getcuenta_ventaDescripcion($cuentaLogic->getcuenta());

		} else {
			$strDescripcioncuenta='null';
		}

		return $strDescripcioncuenta;
	}

	public function cargarDescripcioncuenta_inventarioFK($idcuenta,$connexion=null){
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

			$strDescripcioncuenta=lista_producto_util::getcuenta_inventarioDescripcion($cuentaLogic->getcuenta());

		} else {
			$strDescripcioncuenta='null';
		}

		return $strDescripcioncuenta;
	}

	public function cargarDescripcionotro_suplidorFK($idotro_suplidor,$connexion=null){
		$otro_suplidorLogic= new otro_suplidor_logic();
		$otro_suplidorLogic->setConnexion($connexion);
		$otro_suplidorLogic->getotro_suplidorDataAccess()->isForFKData=true;
		$strDescripcionotro_suplidor='';

		if($idotro_suplidor!=null && $idotro_suplidor!='' && $idotro_suplidor!='null') {
			if($connexion!=null) {
				$otro_suplidorLogic->getEntity($idotro_suplidor);//WithConnection
			} else {
				$otro_suplidorLogic->getEntityWithConnection($idotro_suplidor);//
			}

			$strDescripcionotro_suplidor=lista_producto_util::getotro_suplidorDescripcion($otro_suplidorLogic->getotro_suplidor());

		} else {
			$strDescripcionotro_suplidor='null';
		}

		return $strDescripcionotro_suplidor;
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

			$strDescripcionimpuesto=lista_producto_util::getimpuestoDescripcion($impuestoLogic->getimpuesto());

		} else {
			$strDescripcionimpuesto='null';
		}

		return $strDescripcionimpuesto;
	}

	public function cargarDescripcionimpuesto_ventasFK($idimpuesto,$connexion=null){
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

			$strDescripcionimpuesto=lista_producto_util::getimpuesto_ventasDescripcion($impuestoLogic->getimpuesto());

		} else {
			$strDescripcionimpuesto='null';
		}

		return $strDescripcionimpuesto;
	}

	public function cargarDescripcionimpuesto_comprasFK($idimpuesto,$connexion=null){
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

			$strDescripcionimpuesto=lista_producto_util::getimpuesto_comprasDescripcion($impuestoLogic->getimpuesto());

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

			$strDescripcionotro_impuesto=lista_producto_util::getotro_impuestoDescripcion($otro_impuestoLogic->getotro_impuesto());

		} else {
			$strDescripcionotro_impuesto='null';
		}

		return $strDescripcionotro_impuesto;
	}

	public function cargarDescripcionotro_impuesto_ventasFK($idotro_impuesto,$connexion=null){
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

			$strDescripcionotro_impuesto=lista_producto_util::getotro_impuesto_ventasDescripcion($otro_impuestoLogic->getotro_impuesto());

		} else {
			$strDescripcionotro_impuesto='null';
		}

		return $strDescripcionotro_impuesto;
	}

	public function cargarDescripcionotro_impuesto_comprasFK($idotro_impuesto,$connexion=null){
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

			$strDescripcionotro_impuesto=lista_producto_util::getotro_impuesto_comprasDescripcion($otro_impuestoLogic->getotro_impuesto());

		} else {
			$strDescripcionotro_impuesto='null';
		}

		return $strDescripcionotro_impuesto;
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

			$strDescripcionretencion=lista_producto_util::getretencionDescripcion($retencionLogic->getretencion());

		} else {
			$strDescripcionretencion='null';
		}

		return $strDescripcionretencion;
	}

	public function cargarDescripcionretencion_ventasFK($idretencion,$connexion=null){
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

			$strDescripcionretencion=lista_producto_util::getretencion_ventasDescripcion($retencionLogic->getretencion());

		} else {
			$strDescripcionretencion='null';
		}

		return $strDescripcionretencion;
	}

	public function cargarDescripcionretencion_comprasFK($idretencion,$connexion=null){
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

			$strDescripcionretencion=lista_producto_util::getretencion_comprasDescripcion($retencionLogic->getretencion());

		} else {
			$strDescripcionretencion='null';
		}

		return $strDescripcionretencion;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(lista_producto $lista_productoClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParaproducto($isParaproducto){
		$strParaVisibleproducto='display:table-row';
		$strParaVisibleNegacionproducto='display:none';

		if($isParaproducto) {
			$strParaVisibleproducto='display:table-row';
			$strParaVisibleNegacionproducto='display:none';
		} else {
			$strParaVisibleproducto='display:none';
			$strParaVisibleNegacionproducto='display:table-row';
		}


		$strParaVisibleNegacionproducto=trim($strParaVisibleNegacionproducto);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idimpuesto_compras=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idimpuesto_ventas=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idotro_impuesto_compras=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idotro_impuesto_ventas=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idproducto=$strParaVisibleproducto;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idretencion_compras=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idretencion_ventas=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacionproducto;
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
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idimpuesto_compras=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idimpuesto_ventas=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idotro_impuesto_compras=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idotro_impuesto_ventas=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idretencion_compras=$strParaVisibleNegacionunidad_compra;
		$this->strVisibleFK_Idretencion_ventas=$strParaVisibleNegacionunidad_compra;
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
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idimpuesto_compras=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idimpuesto_ventas=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idotro_impuesto_compras=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idotro_impuesto_ventas=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idretencion_compras=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idretencion_ventas=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionunidad_venta;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleunidad_venta;
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
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idimpuesto_compras=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idimpuesto_ventas=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idotro_impuesto_compras=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idotro_impuesto_ventas=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idretencion_compras=$strParaVisibleNegacioncategoria_producto;
		$this->strVisibleFK_Idretencion_ventas=$strParaVisibleNegacioncategoria_producto;
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
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idimpuesto_compras=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idimpuesto_ventas=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idotro_impuesto_compras=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idotro_impuesto_ventas=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idretencion_compras=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idretencion_ventas=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisiblesub_categoria_producto;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionsub_categoria_producto;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacionsub_categoria_producto;
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
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idimpuesto_compras=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idimpuesto_ventas=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idotro_impuesto_compras=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idotro_impuesto_ventas=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idretencion_compras=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idretencion_ventas=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibletipo_producto;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegaciontipo_producto;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegaciontipo_producto;
	}

	public function setVisibleBusquedasParabodega($isParabodega){
		$strParaVisiblebodega='display:table-row';
		$strParaVisibleNegacionbodega='display:none';

		if($isParabodega) {
			$strParaVisiblebodega='display:table-row';
			$strParaVisibleNegacionbodega='display:none';
		} else {
			$strParaVisiblebodega='display:none';
			$strParaVisibleNegacionbodega='display:table-row';
		}


		$strParaVisibleNegacionbodega=trim($strParaVisibleNegacionbodega);

		$this->strVisibleFK_Idbodega=$strParaVisiblebodega;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idimpuesto_compras=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idimpuesto_ventas=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idotro_impuesto_compras=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idotro_impuesto_ventas=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idretencion_compras=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idretencion_ventas=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacionbodega;
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
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idimpuesto_compras=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idimpuesto_ventas=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idotro_impuesto_compras=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idotro_impuesto_ventas=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idretencion_compras=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idretencion_ventas=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacioncuenta_compra;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacioncuenta_compra;
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
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idimpuesto_compras=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idimpuesto_ventas=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idotro_impuesto_compras=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idotro_impuesto_ventas=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idretencion_compras=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idretencion_ventas=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacioncuenta_venta;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacioncuenta_venta;
	}

	public function setVisibleBusquedasParacuenta_inventario($isParacuenta_inventario){
		$strParaVisiblecuenta_inventario='display:table-row';
		$strParaVisibleNegacioncuenta_inventario='display:none';

		if($isParacuenta_inventario) {
			$strParaVisiblecuenta_inventario='display:table-row';
			$strParaVisibleNegacioncuenta_inventario='display:none';
		} else {
			$strParaVisiblecuenta_inventario='display:none';
			$strParaVisibleNegacioncuenta_inventario='display:table-row';
		}


		$strParaVisibleNegacioncuenta_inventario=trim($strParaVisibleNegacioncuenta_inventario);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacioncuenta_inventario;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacioncuenta_inventario;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacioncuenta_inventario;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisiblecuenta_inventario;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacioncuenta_inventario;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacioncuenta_inventario;
		$this->strVisibleFK_Idimpuesto_compras=$strParaVisibleNegacioncuenta_inventario;
		$this->strVisibleFK_Idimpuesto_ventas=$strParaVisibleNegacioncuenta_inventario;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacioncuenta_inventario;
		$this->strVisibleFK_Idotro_impuesto_compras=$strParaVisibleNegacioncuenta_inventario;
		$this->strVisibleFK_Idotro_impuesto_ventas=$strParaVisibleNegacioncuenta_inventario;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacioncuenta_inventario;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacioncuenta_inventario;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacioncuenta_inventario;
		$this->strVisibleFK_Idretencion_compras=$strParaVisibleNegacioncuenta_inventario;
		$this->strVisibleFK_Idretencion_ventas=$strParaVisibleNegacioncuenta_inventario;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacioncuenta_inventario;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacioncuenta_inventario;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacioncuenta_inventario;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacioncuenta_inventario;
	}

	public function setVisibleBusquedasParaotro_suplidor($isParaotro_suplidor){
		$strParaVisibleotro_suplidor='display:table-row';
		$strParaVisibleNegacionotro_suplidor='display:none';

		if($isParaotro_suplidor) {
			$strParaVisibleotro_suplidor='display:table-row';
			$strParaVisibleNegacionotro_suplidor='display:none';
		} else {
			$strParaVisibleotro_suplidor='display:none';
			$strParaVisibleNegacionotro_suplidor='display:table-row';
		}


		$strParaVisibleNegacionotro_suplidor=trim($strParaVisibleNegacionotro_suplidor);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionotro_suplidor;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacionotro_suplidor;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacionotro_suplidor;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegacionotro_suplidor;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacionotro_suplidor;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionotro_suplidor;
		$this->strVisibleFK_Idimpuesto_compras=$strParaVisibleNegacionotro_suplidor;
		$this->strVisibleFK_Idimpuesto_ventas=$strParaVisibleNegacionotro_suplidor;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionotro_suplidor;
		$this->strVisibleFK_Idotro_impuesto_compras=$strParaVisibleNegacionotro_suplidor;
		$this->strVisibleFK_Idotro_impuesto_ventas=$strParaVisibleNegacionotro_suplidor;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleotro_suplidor;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionotro_suplidor;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionotro_suplidor;
		$this->strVisibleFK_Idretencion_compras=$strParaVisibleNegacionotro_suplidor;
		$this->strVisibleFK_Idretencion_ventas=$strParaVisibleNegacionotro_suplidor;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacionotro_suplidor;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionotro_suplidor;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionotro_suplidor;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacionotro_suplidor;
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
		$this->strVisibleFK_Idimpuesto=$strParaVisibleimpuesto;
		$this->strVisibleFK_Idimpuesto_compras=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idimpuesto_ventas=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idotro_impuesto_compras=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idotro_impuesto_ventas=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idretencion_compras=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idretencion_ventas=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacionimpuesto;
	}

	public function setVisibleBusquedasParaimpuesto_ventas($isParaimpuesto_ventas){
		$strParaVisibleimpuesto_ventas='display:table-row';
		$strParaVisibleNegacionimpuesto_ventas='display:none';

		if($isParaimpuesto_ventas) {
			$strParaVisibleimpuesto_ventas='display:table-row';
			$strParaVisibleNegacionimpuesto_ventas='display:none';
		} else {
			$strParaVisibleimpuesto_ventas='display:none';
			$strParaVisibleNegacionimpuesto_ventas='display:table-row';
		}


		$strParaVisibleNegacionimpuesto_ventas=trim($strParaVisibleNegacionimpuesto_ventas);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionimpuesto_ventas;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacionimpuesto_ventas;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacionimpuesto_ventas;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegacionimpuesto_ventas;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacionimpuesto_ventas;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionimpuesto_ventas;
		$this->strVisibleFK_Idimpuesto_compras=$strParaVisibleNegacionimpuesto_ventas;
		$this->strVisibleFK_Idimpuesto_ventas=$strParaVisibleimpuesto_ventas;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionimpuesto_ventas;
		$this->strVisibleFK_Idotro_impuesto_compras=$strParaVisibleNegacionimpuesto_ventas;
		$this->strVisibleFK_Idotro_impuesto_ventas=$strParaVisibleNegacionimpuesto_ventas;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacionimpuesto_ventas;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionimpuesto_ventas;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionimpuesto_ventas;
		$this->strVisibleFK_Idretencion_compras=$strParaVisibleNegacionimpuesto_ventas;
		$this->strVisibleFK_Idretencion_ventas=$strParaVisibleNegacionimpuesto_ventas;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacionimpuesto_ventas;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionimpuesto_ventas;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionimpuesto_ventas;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacionimpuesto_ventas;
	}

	public function setVisibleBusquedasParaimpuesto_compras($isParaimpuesto_compras){
		$strParaVisibleimpuesto_compras='display:table-row';
		$strParaVisibleNegacionimpuesto_compras='display:none';

		if($isParaimpuesto_compras) {
			$strParaVisibleimpuesto_compras='display:table-row';
			$strParaVisibleNegacionimpuesto_compras='display:none';
		} else {
			$strParaVisibleimpuesto_compras='display:none';
			$strParaVisibleNegacionimpuesto_compras='display:table-row';
		}


		$strParaVisibleNegacionimpuesto_compras=trim($strParaVisibleNegacionimpuesto_compras);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionimpuesto_compras;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacionimpuesto_compras;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacionimpuesto_compras;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegacionimpuesto_compras;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacionimpuesto_compras;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionimpuesto_compras;
		$this->strVisibleFK_Idimpuesto_compras=$strParaVisibleimpuesto_compras;
		$this->strVisibleFK_Idimpuesto_ventas=$strParaVisibleNegacionimpuesto_compras;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionimpuesto_compras;
		$this->strVisibleFK_Idotro_impuesto_compras=$strParaVisibleNegacionimpuesto_compras;
		$this->strVisibleFK_Idotro_impuesto_ventas=$strParaVisibleNegacionimpuesto_compras;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacionimpuesto_compras;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionimpuesto_compras;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionimpuesto_compras;
		$this->strVisibleFK_Idretencion_compras=$strParaVisibleNegacionimpuesto_compras;
		$this->strVisibleFK_Idretencion_ventas=$strParaVisibleNegacionimpuesto_compras;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacionimpuesto_compras;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionimpuesto_compras;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionimpuesto_compras;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacionimpuesto_compras;
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
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idimpuesto_compras=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idimpuesto_ventas=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleotro_impuesto;
		$this->strVisibleFK_Idotro_impuesto_compras=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idotro_impuesto_ventas=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idretencion_compras=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idretencion_ventas=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacionotro_impuesto;
	}

	public function setVisibleBusquedasParaotro_impuesto_ventas($isParaotro_impuesto_ventas){
		$strParaVisibleotro_impuesto_ventas='display:table-row';
		$strParaVisibleNegacionotro_impuesto_ventas='display:none';

		if($isParaotro_impuesto_ventas) {
			$strParaVisibleotro_impuesto_ventas='display:table-row';
			$strParaVisibleNegacionotro_impuesto_ventas='display:none';
		} else {
			$strParaVisibleotro_impuesto_ventas='display:none';
			$strParaVisibleNegacionotro_impuesto_ventas='display:table-row';
		}


		$strParaVisibleNegacionotro_impuesto_ventas=trim($strParaVisibleNegacionotro_impuesto_ventas);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionotro_impuesto_ventas;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacionotro_impuesto_ventas;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacionotro_impuesto_ventas;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegacionotro_impuesto_ventas;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacionotro_impuesto_ventas;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionotro_impuesto_ventas;
		$this->strVisibleFK_Idimpuesto_compras=$strParaVisibleNegacionotro_impuesto_ventas;
		$this->strVisibleFK_Idimpuesto_ventas=$strParaVisibleNegacionotro_impuesto_ventas;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionotro_impuesto_ventas;
		$this->strVisibleFK_Idotro_impuesto_compras=$strParaVisibleNegacionotro_impuesto_ventas;
		$this->strVisibleFK_Idotro_impuesto_ventas=$strParaVisibleotro_impuesto_ventas;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacionotro_impuesto_ventas;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionotro_impuesto_ventas;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionotro_impuesto_ventas;
		$this->strVisibleFK_Idretencion_compras=$strParaVisibleNegacionotro_impuesto_ventas;
		$this->strVisibleFK_Idretencion_ventas=$strParaVisibleNegacionotro_impuesto_ventas;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacionotro_impuesto_ventas;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionotro_impuesto_ventas;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionotro_impuesto_ventas;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacionotro_impuesto_ventas;
	}

	public function setVisibleBusquedasParaotro_impuesto_compras($isParaotro_impuesto_compras){
		$strParaVisibleotro_impuesto_compras='display:table-row';
		$strParaVisibleNegacionotro_impuesto_compras='display:none';

		if($isParaotro_impuesto_compras) {
			$strParaVisibleotro_impuesto_compras='display:table-row';
			$strParaVisibleNegacionotro_impuesto_compras='display:none';
		} else {
			$strParaVisibleotro_impuesto_compras='display:none';
			$strParaVisibleNegacionotro_impuesto_compras='display:table-row';
		}


		$strParaVisibleNegacionotro_impuesto_compras=trim($strParaVisibleNegacionotro_impuesto_compras);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionotro_impuesto_compras;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacionotro_impuesto_compras;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacionotro_impuesto_compras;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegacionotro_impuesto_compras;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacionotro_impuesto_compras;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionotro_impuesto_compras;
		$this->strVisibleFK_Idimpuesto_compras=$strParaVisibleNegacionotro_impuesto_compras;
		$this->strVisibleFK_Idimpuesto_ventas=$strParaVisibleNegacionotro_impuesto_compras;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionotro_impuesto_compras;
		$this->strVisibleFK_Idotro_impuesto_compras=$strParaVisibleotro_impuesto_compras;
		$this->strVisibleFK_Idotro_impuesto_ventas=$strParaVisibleNegacionotro_impuesto_compras;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacionotro_impuesto_compras;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionotro_impuesto_compras;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionotro_impuesto_compras;
		$this->strVisibleFK_Idretencion_compras=$strParaVisibleNegacionotro_impuesto_compras;
		$this->strVisibleFK_Idretencion_ventas=$strParaVisibleNegacionotro_impuesto_compras;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacionotro_impuesto_compras;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionotro_impuesto_compras;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionotro_impuesto_compras;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacionotro_impuesto_compras;
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
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idimpuesto_compras=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idimpuesto_ventas=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idotro_impuesto_compras=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idotro_impuesto_ventas=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idretencion=$strParaVisibleretencion;
		$this->strVisibleFK_Idretencion_compras=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idretencion_ventas=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacionretencion;
	}

	public function setVisibleBusquedasPararetencion_ventas($isPararetencion_ventas){
		$strParaVisibleretencion_ventas='display:table-row';
		$strParaVisibleNegacionretencion_ventas='display:none';

		if($isPararetencion_ventas) {
			$strParaVisibleretencion_ventas='display:table-row';
			$strParaVisibleNegacionretencion_ventas='display:none';
		} else {
			$strParaVisibleretencion_ventas='display:none';
			$strParaVisibleNegacionretencion_ventas='display:table-row';
		}


		$strParaVisibleNegacionretencion_ventas=trim($strParaVisibleNegacionretencion_ventas);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionretencion_ventas;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacionretencion_ventas;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacionretencion_ventas;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegacionretencion_ventas;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacionretencion_ventas;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionretencion_ventas;
		$this->strVisibleFK_Idimpuesto_compras=$strParaVisibleNegacionretencion_ventas;
		$this->strVisibleFK_Idimpuesto_ventas=$strParaVisibleNegacionretencion_ventas;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionretencion_ventas;
		$this->strVisibleFK_Idotro_impuesto_compras=$strParaVisibleNegacionretencion_ventas;
		$this->strVisibleFK_Idotro_impuesto_ventas=$strParaVisibleNegacionretencion_ventas;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacionretencion_ventas;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionretencion_ventas;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionretencion_ventas;
		$this->strVisibleFK_Idretencion_compras=$strParaVisibleNegacionretencion_ventas;
		$this->strVisibleFK_Idretencion_ventas=$strParaVisibleretencion_ventas;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacionretencion_ventas;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionretencion_ventas;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionretencion_ventas;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacionretencion_ventas;
	}

	public function setVisibleBusquedasPararetencion_compras($isPararetencion_compras){
		$strParaVisibleretencion_compras='display:table-row';
		$strParaVisibleNegacionretencion_compras='display:none';

		if($isPararetencion_compras) {
			$strParaVisibleretencion_compras='display:table-row';
			$strParaVisibleNegacionretencion_compras='display:none';
		} else {
			$strParaVisibleretencion_compras='display:none';
			$strParaVisibleNegacionretencion_compras='display:table-row';
		}


		$strParaVisibleNegacionretencion_compras=trim($strParaVisibleNegacionretencion_compras);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionretencion_compras;
		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacionretencion_compras;
		$this->strVisibleFK_Idcuenta_compra=$strParaVisibleNegacionretencion_compras;
		$this->strVisibleFK_Idcuenta_inventario=$strParaVisibleNegacionretencion_compras;
		$this->strVisibleFK_Idcuenta_venta=$strParaVisibleNegacionretencion_compras;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionretencion_compras;
		$this->strVisibleFK_Idimpuesto_compras=$strParaVisibleNegacionretencion_compras;
		$this->strVisibleFK_Idimpuesto_ventas=$strParaVisibleNegacionretencion_compras;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionretencion_compras;
		$this->strVisibleFK_Idotro_impuesto_compras=$strParaVisibleNegacionretencion_compras;
		$this->strVisibleFK_Idotro_impuesto_ventas=$strParaVisibleNegacionretencion_compras;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacionretencion_compras;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionretencion_compras;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionretencion_compras;
		$this->strVisibleFK_Idretencion_compras=$strParaVisibleretencion_compras;
		$this->strVisibleFK_Idretencion_ventas=$strParaVisibleNegacionretencion_compras;
		$this->strVisibleFK_Idsub_categoria_producto=$strParaVisibleNegacionretencion_compras;
		$this->strVisibleFK_Idtipo_producto=$strParaVisibleNegacionretencion_compras;
		$this->strVisibleFK_Idunidad_compra=$strParaVisibleNegacionretencion_compras;
		$this->strVisibleFK_Idunidad_venta=$strParaVisibleNegacionretencion_compras;
	}
	
	

	public function abrirBusquedaParaproducto() {//$idlista_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idlista_productoActual=$idlista_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.producto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_producto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_producto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarlista_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaunidad_compra() {//$idlista_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idlista_productoActual=$idlista_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.unidad_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_unidad_compra(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',unidad_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_unidad_compra(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(unidad_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarlista_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaunidad_venta() {//$idlista_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idlista_productoActual=$idlista_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.unidad_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_unidad_venta(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',unidad_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_unidad_venta(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(unidad_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarlista_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacategoria_producto() {//$idlista_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idlista_productoActual=$idlista_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.categoria_producto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_categoria_producto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',categoria_producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_categoria_producto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(categoria_producto_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarlista_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParasub_categoria_producto() {//$idlista_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idlista_productoActual=$idlista_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.sub_categoria_producto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sub_categoria_producto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',sub_categoria_producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sub_categoria_producto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(sub_categoria_producto_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarlista_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatipo_producto() {//$idlista_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idlista_productoActual=$idlista_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.tipo_producto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_producto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',tipo_producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_producto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_producto_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarlista_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParabodega() {//$idlista_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idlista_productoActual=$idlista_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.bodega_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_bodega(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',bodega_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_bodega(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(bodega_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarlista_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta_compra() {//$idlista_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idlista_productoActual=$idlista_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_compra(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_compra(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarlista_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta_venta() {//$idlista_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idlista_productoActual=$idlista_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_venta(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_venta(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarlista_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta_inventario() {//$idlista_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idlista_productoActual=$idlista_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_inventario(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_inventario(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarlista_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaotro_suplidor() {//$idlista_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idlista_productoActual=$idlista_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.otro_suplidor_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_otro_suplidor(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',otro_suplidor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_otro_suplidor(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(otro_suplidor_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarlista_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaimpuesto() {//$idlista_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idlista_productoActual=$idlista_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.impuesto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_impuesto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',impuesto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_impuesto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(impuesto_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarlista_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaimpuesto_ventas() {//$idlista_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idlista_productoActual=$idlista_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.impuesto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_impuesto_ventas(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',impuesto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_impuesto_ventas(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(impuesto_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarlista_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaimpuesto_compras() {//$idlista_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idlista_productoActual=$idlista_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.impuesto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_impuesto_compras(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',impuesto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_impuesto_compras(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(impuesto_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarlista_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaotro_impuesto() {//$idlista_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idlista_productoActual=$idlista_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.otro_impuesto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_otro_impuesto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',otro_impuesto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_otro_impuesto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(otro_impuesto_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarlista_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaotro_impuesto_ventas() {//$idlista_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idlista_productoActual=$idlista_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.otro_impuesto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_otro_impuesto_ventas(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',otro_impuesto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_otro_impuesto_ventas(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(otro_impuesto_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarlista_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaotro_impuesto_compras() {//$idlista_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idlista_productoActual=$idlista_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.otro_impuesto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_otro_impuesto_compras(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',otro_impuesto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_otro_impuesto_compras(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(otro_impuesto_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarlista_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaPararetencion() {//$idlista_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idlista_productoActual=$idlista_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.retencion_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_retencion(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',retencion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_retencion(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(retencion_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarlista_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaPararetencion_ventas() {//$idlista_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idlista_productoActual=$idlista_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.retencion_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_retencion_ventas(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',retencion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_retencion_ventas(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(retencion_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarlista_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaPararetencion_compras() {//$idlista_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idlista_productoActual=$idlista_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.retencion_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_retencion_compras(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',retencion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.lista_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_retencion_compras(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(retencion_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarlista_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(lista_producto_util::$STR_SESSION_NAME,lista_producto_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$lista_producto_session=$this->Session->read(lista_producto_util::$STR_SESSION_NAME);
				
		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();		
			//$this->Session->write('lista_producto_session',$lista_producto_session);							
		}
		*/
		
		$lista_producto_session=new lista_producto_session();
    	$lista_producto_session->strPathNavegacionActual=lista_producto_util::$STR_CLASS_WEB_TITULO;
    	$lista_producto_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(lista_producto_util::$STR_SESSION_NAME,serialize($lista_producto_session));		
	}	
	
	public function getSetBusquedasSesionConfig(lista_producto_session $lista_producto_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($lista_producto_session->bitBusquedaDesdeFKSesionFK!=null && $lista_producto_session->bitBusquedaDesdeFKSesionFK==true) {
			if($lista_producto_session->bigIdActualFK!=null && $lista_producto_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$lista_producto_session->bigIdActualFKParaPosibleAtras=$lista_producto_session->bigIdActualFK;*/
			}
				
			$lista_producto_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$lista_producto_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(lista_producto_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($lista_producto_session->bitBusquedaDesdeFKSesionproducto!=null && $lista_producto_session->bitBusquedaDesdeFKSesionproducto==true)
			{
				if($lista_producto_session->bigidproductoActual!=0) {
					$this->strAccionBusqueda='FK_Idproducto';

					$existe_history=HistoryWeb::ExisteElemento(lista_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(lista_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(lista_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($lista_producto_session->bigidproductoActualDescripcion);
						$historyWeb->setIdActual($lista_producto_session->bigidproductoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=lista_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$lista_producto_session->bigidproductoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$lista_producto_session->bitBusquedaDesdeFKSesionproducto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;

				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
			}
			else if($lista_producto_session->bitBusquedaDesdeFKSesionunidad_compra!=null && $lista_producto_session->bitBusquedaDesdeFKSesionunidad_compra==true)
			{
				if($lista_producto_session->bigidunidad_compraActual!=0) {
					$this->strAccionBusqueda='FK_Idunidad_compra';

					$existe_history=HistoryWeb::ExisteElemento(lista_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(lista_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(lista_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($lista_producto_session->bigidunidad_compraActualDescripcion);
						$historyWeb->setIdActual($lista_producto_session->bigidunidad_compraActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=lista_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$lista_producto_session->bigidunidad_compraActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$lista_producto_session->bitBusquedaDesdeFKSesionunidad_compra=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;

				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
			}
			else if($lista_producto_session->bitBusquedaDesdeFKSesionunidad_venta!=null && $lista_producto_session->bitBusquedaDesdeFKSesionunidad_venta==true)
			{
				if($lista_producto_session->bigidunidad_ventaActual!=0) {
					$this->strAccionBusqueda='FK_Idunidad_venta';

					$existe_history=HistoryWeb::ExisteElemento(lista_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(lista_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(lista_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($lista_producto_session->bigidunidad_ventaActualDescripcion);
						$historyWeb->setIdActual($lista_producto_session->bigidunidad_ventaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=lista_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$lista_producto_session->bigidunidad_ventaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$lista_producto_session->bitBusquedaDesdeFKSesionunidad_venta=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;

				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
			}
			else if($lista_producto_session->bitBusquedaDesdeFKSesioncategoria_producto!=null && $lista_producto_session->bitBusquedaDesdeFKSesioncategoria_producto==true)
			{
				if($lista_producto_session->bigidcategoria_productoActual!=0) {
					$this->strAccionBusqueda='FK_Idcategoria_producto';

					$existe_history=HistoryWeb::ExisteElemento(lista_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(lista_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(lista_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($lista_producto_session->bigidcategoria_productoActualDescripcion);
						$historyWeb->setIdActual($lista_producto_session->bigidcategoria_productoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=lista_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$lista_producto_session->bigidcategoria_productoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$lista_producto_session->bitBusquedaDesdeFKSesioncategoria_producto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;

				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
			}
			else if($lista_producto_session->bitBusquedaDesdeFKSesionsub_categoria_producto!=null && $lista_producto_session->bitBusquedaDesdeFKSesionsub_categoria_producto==true)
			{
				if($lista_producto_session->bigidsub_categoria_productoActual!=0) {
					$this->strAccionBusqueda='FK_Idsub_categoria_producto';

					$existe_history=HistoryWeb::ExisteElemento(lista_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(lista_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(lista_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($lista_producto_session->bigidsub_categoria_productoActualDescripcion);
						$historyWeb->setIdActual($lista_producto_session->bigidsub_categoria_productoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=lista_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$lista_producto_session->bigidsub_categoria_productoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$lista_producto_session->bitBusquedaDesdeFKSesionsub_categoria_producto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;

				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
			}
			else if($lista_producto_session->bitBusquedaDesdeFKSesiontipo_producto!=null && $lista_producto_session->bitBusquedaDesdeFKSesiontipo_producto==true)
			{
				if($lista_producto_session->bigidtipo_productoActual!=0) {
					$this->strAccionBusqueda='FK_Idtipo_producto';

					$existe_history=HistoryWeb::ExisteElemento(lista_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(lista_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(lista_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($lista_producto_session->bigidtipo_productoActualDescripcion);
						$historyWeb->setIdActual($lista_producto_session->bigidtipo_productoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=lista_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$lista_producto_session->bigidtipo_productoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$lista_producto_session->bitBusquedaDesdeFKSesiontipo_producto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;

				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
			}
			else if($lista_producto_session->bitBusquedaDesdeFKSesionbodega!=null && $lista_producto_session->bitBusquedaDesdeFKSesionbodega==true)
			{
				if($lista_producto_session->bigidbodegaActual!=0) {
					$this->strAccionBusqueda='FK_Idbodega';

					$existe_history=HistoryWeb::ExisteElemento(lista_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(lista_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(lista_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($lista_producto_session->bigidbodegaActualDescripcion);
						$historyWeb->setIdActual($lista_producto_session->bigidbodegaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=lista_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$lista_producto_session->bigidbodegaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$lista_producto_session->bitBusquedaDesdeFKSesionbodega=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;

				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
			}
			else if($lista_producto_session->bitBusquedaDesdeFKSesioncuenta_compra!=null && $lista_producto_session->bitBusquedaDesdeFKSesioncuenta_compra==true)
			{
				if($lista_producto_session->bigidcuenta_compraActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta_compra';

					$existe_history=HistoryWeb::ExisteElemento(lista_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(lista_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(lista_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($lista_producto_session->bigidcuenta_compraActualDescripcion);
						$historyWeb->setIdActual($lista_producto_session->bigidcuenta_compraActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=lista_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$lista_producto_session->bigidcuenta_compraActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$lista_producto_session->bitBusquedaDesdeFKSesioncuenta_compra=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;

				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
			}
			else if($lista_producto_session->bitBusquedaDesdeFKSesioncuenta_venta!=null && $lista_producto_session->bitBusquedaDesdeFKSesioncuenta_venta==true)
			{
				if($lista_producto_session->bigidcuenta_ventaActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta_venta';

					$existe_history=HistoryWeb::ExisteElemento(lista_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(lista_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(lista_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($lista_producto_session->bigidcuenta_ventaActualDescripcion);
						$historyWeb->setIdActual($lista_producto_session->bigidcuenta_ventaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=lista_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$lista_producto_session->bigidcuenta_ventaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$lista_producto_session->bitBusquedaDesdeFKSesioncuenta_venta=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;

				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
			}
			else if($lista_producto_session->bitBusquedaDesdeFKSesioncuenta_inventario!=null && $lista_producto_session->bitBusquedaDesdeFKSesioncuenta_inventario==true)
			{
				if($lista_producto_session->bigidcuenta_inventarioActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta_inventario';

					$existe_history=HistoryWeb::ExisteElemento(lista_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(lista_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(lista_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($lista_producto_session->bigidcuenta_inventarioActualDescripcion);
						$historyWeb->setIdActual($lista_producto_session->bigidcuenta_inventarioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=lista_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$lista_producto_session->bigidcuenta_inventarioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$lista_producto_session->bitBusquedaDesdeFKSesioncuenta_inventario=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;

				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
			}
			else if($lista_producto_session->bitBusquedaDesdeFKSesionotro_suplidor!=null && $lista_producto_session->bitBusquedaDesdeFKSesionotro_suplidor==true)
			{
				if($lista_producto_session->bigidotro_suplidorActual!=0) {
					$this->strAccionBusqueda='FK_Idotro_suplidor';

					$existe_history=HistoryWeb::ExisteElemento(lista_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(lista_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(lista_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($lista_producto_session->bigidotro_suplidorActualDescripcion);
						$historyWeb->setIdActual($lista_producto_session->bigidotro_suplidorActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=lista_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$lista_producto_session->bigidotro_suplidorActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$lista_producto_session->bitBusquedaDesdeFKSesionotro_suplidor=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;

				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
			}
			else if($lista_producto_session->bitBusquedaDesdeFKSesionimpuesto!=null && $lista_producto_session->bitBusquedaDesdeFKSesionimpuesto==true)
			{
				if($lista_producto_session->bigidimpuestoActual!=0) {
					$this->strAccionBusqueda='FK_Idimpuesto';

					$existe_history=HistoryWeb::ExisteElemento(lista_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(lista_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(lista_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($lista_producto_session->bigidimpuestoActualDescripcion);
						$historyWeb->setIdActual($lista_producto_session->bigidimpuestoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=lista_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$lista_producto_session->bigidimpuestoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$lista_producto_session->bitBusquedaDesdeFKSesionimpuesto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;

				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
			}
			else if($lista_producto_session->bitBusquedaDesdeFKSesionimpuesto_ventas!=null && $lista_producto_session->bitBusquedaDesdeFKSesionimpuesto_ventas==true)
			{
				if($lista_producto_session->bigidimpuesto_ventasActual!=0) {
					$this->strAccionBusqueda='FK_Idimpuesto_ventas';

					$existe_history=HistoryWeb::ExisteElemento(lista_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(lista_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(lista_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($lista_producto_session->bigidimpuesto_ventasActualDescripcion);
						$historyWeb->setIdActual($lista_producto_session->bigidimpuesto_ventasActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=lista_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$lista_producto_session->bigidimpuesto_ventasActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$lista_producto_session->bitBusquedaDesdeFKSesionimpuesto_ventas=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;

				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
			}
			else if($lista_producto_session->bitBusquedaDesdeFKSesionimpuesto_compras!=null && $lista_producto_session->bitBusquedaDesdeFKSesionimpuesto_compras==true)
			{
				if($lista_producto_session->bigidimpuesto_comprasActual!=0) {
					$this->strAccionBusqueda='FK_Idimpuesto_compras';

					$existe_history=HistoryWeb::ExisteElemento(lista_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(lista_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(lista_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($lista_producto_session->bigidimpuesto_comprasActualDescripcion);
						$historyWeb->setIdActual($lista_producto_session->bigidimpuesto_comprasActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=lista_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$lista_producto_session->bigidimpuesto_comprasActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$lista_producto_session->bitBusquedaDesdeFKSesionimpuesto_compras=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;

				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
			}
			else if($lista_producto_session->bitBusquedaDesdeFKSesionotro_impuesto!=null && $lista_producto_session->bitBusquedaDesdeFKSesionotro_impuesto==true)
			{
				if($lista_producto_session->bigidotro_impuestoActual!=0) {
					$this->strAccionBusqueda='FK_Idotro_impuesto';

					$existe_history=HistoryWeb::ExisteElemento(lista_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(lista_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(lista_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($lista_producto_session->bigidotro_impuestoActualDescripcion);
						$historyWeb->setIdActual($lista_producto_session->bigidotro_impuestoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=lista_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$lista_producto_session->bigidotro_impuestoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$lista_producto_session->bitBusquedaDesdeFKSesionotro_impuesto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;

				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
			}
			else if($lista_producto_session->bitBusquedaDesdeFKSesionotro_impuesto_ventas!=null && $lista_producto_session->bitBusquedaDesdeFKSesionotro_impuesto_ventas==true)
			{
				if($lista_producto_session->bigidotro_impuesto_ventasActual!=0) {
					$this->strAccionBusqueda='FK_Idotro_impuesto_ventas';

					$existe_history=HistoryWeb::ExisteElemento(lista_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(lista_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(lista_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($lista_producto_session->bigidotro_impuesto_ventasActualDescripcion);
						$historyWeb->setIdActual($lista_producto_session->bigidotro_impuesto_ventasActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=lista_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$lista_producto_session->bigidotro_impuesto_ventasActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$lista_producto_session->bitBusquedaDesdeFKSesionotro_impuesto_ventas=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;

				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
			}
			else if($lista_producto_session->bitBusquedaDesdeFKSesionotro_impuesto_compras!=null && $lista_producto_session->bitBusquedaDesdeFKSesionotro_impuesto_compras==true)
			{
				if($lista_producto_session->bigidotro_impuesto_comprasActual!=0) {
					$this->strAccionBusqueda='FK_Idotro_impuesto_compras';

					$existe_history=HistoryWeb::ExisteElemento(lista_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(lista_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(lista_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($lista_producto_session->bigidotro_impuesto_comprasActualDescripcion);
						$historyWeb->setIdActual($lista_producto_session->bigidotro_impuesto_comprasActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=lista_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$lista_producto_session->bigidotro_impuesto_comprasActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$lista_producto_session->bitBusquedaDesdeFKSesionotro_impuesto_compras=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;

				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
			}
			else if($lista_producto_session->bitBusquedaDesdeFKSesionretencion!=null && $lista_producto_session->bitBusquedaDesdeFKSesionretencion==true)
			{
				if($lista_producto_session->bigidretencionActual!=0) {
					$this->strAccionBusqueda='FK_Idretencion';

					$existe_history=HistoryWeb::ExisteElemento(lista_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(lista_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(lista_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($lista_producto_session->bigidretencionActualDescripcion);
						$historyWeb->setIdActual($lista_producto_session->bigidretencionActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=lista_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$lista_producto_session->bigidretencionActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$lista_producto_session->bitBusquedaDesdeFKSesionretencion=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;

				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
			}
			else if($lista_producto_session->bitBusquedaDesdeFKSesionretencion_ventas!=null && $lista_producto_session->bitBusquedaDesdeFKSesionretencion_ventas==true)
			{
				if($lista_producto_session->bigidretencion_ventasActual!=0) {
					$this->strAccionBusqueda='FK_Idretencion_ventas';

					$existe_history=HistoryWeb::ExisteElemento(lista_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(lista_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(lista_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($lista_producto_session->bigidretencion_ventasActualDescripcion);
						$historyWeb->setIdActual($lista_producto_session->bigidretencion_ventasActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=lista_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$lista_producto_session->bigidretencion_ventasActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$lista_producto_session->bitBusquedaDesdeFKSesionretencion_ventas=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;

				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
			}
			else if($lista_producto_session->bitBusquedaDesdeFKSesionretencion_compras!=null && $lista_producto_session->bitBusquedaDesdeFKSesionretencion_compras==true)
			{
				if($lista_producto_session->bigidretencion_comprasActual!=0) {
					$this->strAccionBusqueda='FK_Idretencion_compras';

					$existe_history=HistoryWeb::ExisteElemento(lista_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(lista_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(lista_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($lista_producto_session->bigidretencion_comprasActualDescripcion);
						$historyWeb->setIdActual($lista_producto_session->bigidretencion_comprasActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=lista_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$lista_producto_session->bigidretencion_comprasActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$lista_producto_session->bitBusquedaDesdeFKSesionretencion_compras=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;

				if($lista_producto_session->intNumeroPaginacion==lista_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=lista_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$lista_producto_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));
		
		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		$lista_producto_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$lista_producto_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$lista_producto_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idbodega') {
			$lista_producto_session->id_bodega=$this->id_bodegaFK_Idbodega;	

		}
		else if($this->strAccionBusqueda=='FK_Idcategoria_producto') {
			$lista_producto_session->id_categoria_producto=$this->id_categoria_productoFK_Idcategoria_producto;	

		}
		else if($this->strAccionBusqueda=='FK_Idcuenta_compra') {
			$lista_producto_session->id_cuenta_compra=$this->id_cuenta_compraFK_Idcuenta_compra;	

		}
		else if($this->strAccionBusqueda=='FK_Idcuenta_inventario') {
			$lista_producto_session->id_cuenta_inventario=$this->id_cuenta_inventarioFK_Idcuenta_inventario;	

		}
		else if($this->strAccionBusqueda=='FK_Idcuenta_venta') {
			$lista_producto_session->id_cuenta_venta=$this->id_cuenta_ventaFK_Idcuenta_venta;	

		}
		else if($this->strAccionBusqueda=='FK_Idimpuesto') {
			$lista_producto_session->id_impuesto=$this->id_impuestoFK_Idimpuesto;	

		}
		else if($this->strAccionBusqueda=='FK_Idimpuesto_compras') {
			$lista_producto_session->id_impuesto_compras=$this->id_impuesto_comprasFK_Idimpuesto_compras;	

		}
		else if($this->strAccionBusqueda=='FK_Idimpuesto_ventas') {
			$lista_producto_session->id_impuesto_ventas=$this->id_impuesto_ventasFK_Idimpuesto_ventas;	

		}
		else if($this->strAccionBusqueda=='FK_Idotro_impuesto') {
			$lista_producto_session->id_otro_impuesto=$this->id_otro_impuestoFK_Idotro_impuesto;	

		}
		else if($this->strAccionBusqueda=='FK_Idotro_impuesto_compras') {
			$lista_producto_session->id_otro_impuesto_compras=$this->id_otro_impuesto_comprasFK_Idotro_impuesto_compras;	

		}
		else if($this->strAccionBusqueda=='FK_Idotro_impuesto_ventas') {
			$lista_producto_session->id_otro_impuesto_ventas=$this->id_otro_impuesto_ventasFK_Idotro_impuesto_ventas;	

		}
		else if($this->strAccionBusqueda=='FK_Idotro_suplidor') {
			$lista_producto_session->id_otro_suplidor=$this->id_otro_suplidorFK_Idotro_suplidor;	

		}
		else if($this->strAccionBusqueda=='FK_Idproducto') {
			$lista_producto_session->id_producto=$this->id_productoFK_Idproducto;	

		}
		else if($this->strAccionBusqueda=='FK_Idretencion') {
			$lista_producto_session->id_retencion=$this->id_retencionFK_Idretencion;	

		}
		else if($this->strAccionBusqueda=='FK_Idretencion_compras') {
			$lista_producto_session->id_retencion_compras=$this->id_retencion_comprasFK_Idretencion_compras;	

		}
		else if($this->strAccionBusqueda=='FK_Idretencion_ventas') {
			$lista_producto_session->id_retencion_ventas=$this->id_retencion_ventasFK_Idretencion_ventas;	

		}
		else if($this->strAccionBusqueda=='FK_Idsub_categoria_producto') {
			$lista_producto_session->id_sub_categoria_producto=$this->id_sub_categoria_productoFK_Idsub_categoria_producto;	

		}
		else if($this->strAccionBusqueda=='FK_Idtipo_producto') {
			$lista_producto_session->id_tipo_producto=$this->id_tipo_productoFK_Idtipo_producto;	

		}
		else if($this->strAccionBusqueda=='FK_Idunidad_compra') {
			$lista_producto_session->id_unidad_compra=$this->id_unidad_compraFK_Idunidad_compra;	

		}
		else if($this->strAccionBusqueda=='FK_Idunidad_venta') {
			$lista_producto_session->id_unidad_venta=$this->id_unidad_ventaFK_Idunidad_venta;	

		}
		
		$this->Session->write(lista_producto_util::$STR_SESSION_NAME,serialize($lista_producto_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(lista_producto_session $lista_producto_session) {
		
		if($lista_producto_session==null) {
			$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));
		}
		
		if($lista_producto_session==null) {
		   $lista_producto_session=new lista_producto_session();
		}
		
		if($lista_producto_session->strUltimaBusqueda!=null && $lista_producto_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$lista_producto_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$lista_producto_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$lista_producto_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idbodega') {
				$this->id_bodegaFK_Idbodega=$lista_producto_session->id_bodega;
				$lista_producto_session->id_bodega=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idcategoria_producto') {
				$this->id_categoria_productoFK_Idcategoria_producto=$lista_producto_session->id_categoria_producto;
				$lista_producto_session->id_categoria_producto=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idcuenta_compra') {
				$this->id_cuenta_compraFK_Idcuenta_compra=$lista_producto_session->id_cuenta_compra;
				$lista_producto_session->id_cuenta_compra=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idcuenta_inventario') {
				$this->id_cuenta_inventarioFK_Idcuenta_inventario=$lista_producto_session->id_cuenta_inventario;
				$lista_producto_session->id_cuenta_inventario=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idcuenta_venta') {
				$this->id_cuenta_ventaFK_Idcuenta_venta=$lista_producto_session->id_cuenta_venta;
				$lista_producto_session->id_cuenta_venta=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idimpuesto') {
				$this->id_impuestoFK_Idimpuesto=$lista_producto_session->id_impuesto;
				$lista_producto_session->id_impuesto=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idimpuesto_compras') {
				$this->id_impuesto_comprasFK_Idimpuesto_compras=$lista_producto_session->id_impuesto_compras;
				$lista_producto_session->id_impuesto_compras=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idimpuesto_ventas') {
				$this->id_impuesto_ventasFK_Idimpuesto_ventas=$lista_producto_session->id_impuesto_ventas;
				$lista_producto_session->id_impuesto_ventas=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idotro_impuesto') {
				$this->id_otro_impuestoFK_Idotro_impuesto=$lista_producto_session->id_otro_impuesto;
				$lista_producto_session->id_otro_impuesto=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idotro_impuesto_compras') {
				$this->id_otro_impuesto_comprasFK_Idotro_impuesto_compras=$lista_producto_session->id_otro_impuesto_compras;
				$lista_producto_session->id_otro_impuesto_compras=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idotro_impuesto_ventas') {
				$this->id_otro_impuesto_ventasFK_Idotro_impuesto_ventas=$lista_producto_session->id_otro_impuesto_ventas;
				$lista_producto_session->id_otro_impuesto_ventas=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idotro_suplidor') {
				$this->id_otro_suplidorFK_Idotro_suplidor=$lista_producto_session->id_otro_suplidor;
				$lista_producto_session->id_otro_suplidor=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idproducto') {
				$this->id_productoFK_Idproducto=$lista_producto_session->id_producto;
				$lista_producto_session->id_producto=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idretencion') {
				$this->id_retencionFK_Idretencion=$lista_producto_session->id_retencion;
				$lista_producto_session->id_retencion=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idretencion_compras') {
				$this->id_retencion_comprasFK_Idretencion_compras=$lista_producto_session->id_retencion_compras;
				$lista_producto_session->id_retencion_compras=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idretencion_ventas') {
				$this->id_retencion_ventasFK_Idretencion_ventas=$lista_producto_session->id_retencion_ventas;
				$lista_producto_session->id_retencion_ventas=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idsub_categoria_producto') {
				$this->id_sub_categoria_productoFK_Idsub_categoria_producto=$lista_producto_session->id_sub_categoria_producto;
				$lista_producto_session->id_sub_categoria_producto=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtipo_producto') {
				$this->id_tipo_productoFK_Idtipo_producto=$lista_producto_session->id_tipo_producto;
				$lista_producto_session->id_tipo_producto=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idunidad_compra') {
				$this->id_unidad_compraFK_Idunidad_compra=$lista_producto_session->id_unidad_compra;
				$lista_producto_session->id_unidad_compra=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idunidad_venta') {
				$this->id_unidad_ventaFK_Idunidad_venta=$lista_producto_session->id_unidad_venta;
				$lista_producto_session->id_unidad_venta=-1;

			}
		}
		
		$lista_producto_session->strUltimaBusqueda='';
		//$lista_producto_session->intNumeroPaginacion=10;
		$lista_producto_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(lista_producto_util::$STR_SESSION_NAME,serialize($lista_producto_session));		
	}
	
	public function lista_productosControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idproductoDefaultFK = 0;
		$this->idunidad_compraDefaultFK = 0;
		$this->idunidad_ventaDefaultFK = 0;
		$this->idcategoria_productoDefaultFK = 0;
		$this->idsub_categoria_productoDefaultFK = 0;
		$this->idtipo_productoDefaultFK = 0;
		$this->idbodegaDefaultFK = 0;
		$this->idcuenta_compraDefaultFK = 0;
		$this->idcuenta_ventaDefaultFK = 0;
		$this->idcuenta_inventarioDefaultFK = 0;
		$this->idotro_suplidorDefaultFK = 0;
		$this->idimpuestoDefaultFK = 0;
		$this->idimpuesto_ventasDefaultFK = 0;
		$this->idimpuesto_comprasDefaultFK = 0;
		$this->idotro_impuestoDefaultFK = 0;
		$this->idotro_impuesto_ventasDefaultFK = 0;
		$this->idotro_impuesto_comprasDefaultFK = 0;
		$this->idretencionDefaultFK = 0;
		$this->idretencion_ventasDefaultFK = 0;
		$this->idretencion_comprasDefaultFK = 0;
	}
	
	public function setlista_productoFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_producto',$this->idproductoDefaultFK);
		$this->setExistDataCampoForm('form','id_unidad_compra',$this->idunidad_compraDefaultFK);
		$this->setExistDataCampoForm('form','id_unidad_venta',$this->idunidad_ventaDefaultFK);
		$this->setExistDataCampoForm('form','id_categoria_producto',$this->idcategoria_productoDefaultFK);
		$this->setExistDataCampoForm('form','id_sub_categoria_producto',$this->idsub_categoria_productoDefaultFK);
		$this->setExistDataCampoForm('form','id_tipo_producto',$this->idtipo_productoDefaultFK);
		$this->setExistDataCampoForm('form','id_bodega',$this->idbodegaDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta_compra',$this->idcuenta_compraDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta_venta',$this->idcuenta_ventaDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta_inventario',$this->idcuenta_inventarioDefaultFK);
		$this->setExistDataCampoForm('form','id_otro_suplidor',$this->idotro_suplidorDefaultFK);
		$this->setExistDataCampoForm('form','id_impuesto',$this->idimpuestoDefaultFK);
		$this->setExistDataCampoForm('form','id_impuesto_ventas',$this->idimpuesto_ventasDefaultFK);
		$this->setExistDataCampoForm('form','id_impuesto_compras',$this->idimpuesto_comprasDefaultFK);
		$this->setExistDataCampoForm('form','id_otro_impuesto',$this->idotro_impuestoDefaultFK);
		$this->setExistDataCampoForm('form','id_otro_impuesto_ventas',$this->idotro_impuesto_ventasDefaultFK);
		$this->setExistDataCampoForm('form','id_otro_impuesto_compras',$this->idotro_impuesto_comprasDefaultFK);
		$this->setExistDataCampoForm('form','id_retencion',$this->idretencionDefaultFK);
		$this->setExistDataCampoForm('form','id_retencion_ventas',$this->idretencion_ventasDefaultFK);
		$this->setExistDataCampoForm('form','id_retencion_compras',$this->idretencion_comprasDefaultFK);
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

		unidad::$class;
		unidad_carga::$CONTROLLER;

		categoria_producto::$class;
		categoria_producto_carga::$CONTROLLER;

		sub_categoria_producto::$class;
		sub_categoria_producto_carga::$CONTROLLER;

		tipo_producto::$class;
		tipo_producto_carga::$CONTROLLER;

		bodega::$class;
		bodega_carga::$CONTROLLER;

		cuenta::$class;
		cuenta_carga::$CONTROLLER;

		otro_suplidor::$class;
		otro_suplidor_carga::$CONTROLLER;

		impuesto::$class;
		impuesto_carga::$CONTROLLER;

		otro_impuesto::$class;
		otro_impuesto_carga::$CONTROLLER;

		retencion::$class;
		retencion_carga::$CONTROLLER;
		
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
		interface lista_producto_controlI {	
		
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
		
		public function onLoad(lista_producto_session $lista_producto_session=null);	
		function index(?string $strTypeOnLoadlista_producto='',?string $strTipoPaginaAuxiliarlista_producto='',?string $strTipoUsuarioAuxiliarlista_producto='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadlista_producto='',string $strTipoPaginaAuxiliarlista_producto='',string $strTipoUsuarioAuxiliarlista_producto='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($lista_productoReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(lista_producto $lista_productoClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(lista_producto_session $lista_producto_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(lista_producto_session $lista_producto_session);	
		public function lista_productosControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setlista_productoFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
