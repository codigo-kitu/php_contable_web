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
	


class producto_init_control extends ControllerBase {	
	
	public $productoClase=null;	
	public $productosModel=null;	
	public $productosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idproducto=0;	
	public ?int $idproductoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $productoLogic=null;
	
	public $productoActual=null;	
	
	public $producto=null;
	public $productos=null;
	public $productosEliminados=array();
	public $productosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $productosLocal=array();
	public ?array $productosReporte=null;
	public ?array $productosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadproducto='onload';
	public string $strTipoPaginaAuxiliarproducto='none';
	public string $strTipoUsuarioAuxiliarproducto='none';
		
	public $productoReturnGeneral=null;
	public $productoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $productoModel=null;
	public $productoControllerAdditional=null;
	
	
	

	public $listaprecioLogic=null;

	public function  getlista_precioLogic() {
		return $this->listaprecioLogic;
	}

	public function setlista_precioLogic($listaprecioLogic) {
		$this->listaprecioLogic =$listaprecioLogic;
	}


	public $productobodegaLogic=null;

	public function  getproducto_bodegaLogic() {
		return $this->productobodegaLogic;
	}

	public function setproducto_bodegaLogic($productobodegaLogic) {
		$this->productobodegaLogic =$productobodegaLogic;
	}


	public $otrosuplidorLogic=null;

	public function  getotro_suplidorLogic() {
		return $this->otrosuplidorLogic;
	}

	public function setotro_suplidorLogic($otrosuplidorLogic) {
		$this->otrosuplidorLogic =$otrosuplidorLogic;
	}


	public $listaclienteLogic=null;

	public function  getlista_clienteLogic() {
		return $this->listaclienteLogic;
	}

	public function setlista_clienteLogic($listaclienteLogic) {
		$this->listaclienteLogic =$listaclienteLogic;
	}


	public $imagenproductoLogic=null;

	public function  getimagen_productoLogic() {
		return $this->imagenproductoLogic;
	}

	public function setimagen_productoLogic($imagenproductoLogic) {
		$this->imagenproductoLogic =$imagenproductoLogic;
	}


	public $listaproductoLogic=null;

	public function  getlista_productoLogic() {
		return $this->listaproductoLogic;
	}

	public function setlista_productoLogic($listaproductoLogic) {
		$this->listaproductoLogic =$listaproductoLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_proveedor='';
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	public string $strMensajecosto='';
	public string $strMensajeactivo='';
	public string $strMensajeid_tipo_producto='';
	public string $strMensajecantidad_inicial='';
	public string $strMensajeid_impuesto='';
	public string $strMensajeid_otro_impuesto='';
	public string $strMensajeimpuesto_ventas='';
	public string $strMensajeotro_impuesto_ventas='';
	public string $strMensajeimpuesto_compras='';
	public string $strMensajeotro_impuesto_compras='';
	public string $strMensajeid_categoria_producto='';
	public string $strMensajeid_sub_categoria_producto='';
	public string $strMensajeid_bodega_defecto='';
	public string $strMensajeid_unidad_compra='';
	public string $strMensajeequivalencia_compra='';
	public string $strMensajeid_unidad_venta='';
	public string $strMensajeequivalencia_venta='';
	public string $strMensajedescripcion='';
	public string $strMensajeimagen='';
	public string $strMensajeobservacion='';
	public string $strMensajecomenta_factura='';
	public string $strMensajecodigo_fabricante='';
	public string $strMensajecantidad='';
	public string $strMensajecantidad_minima='';
	public string $strMensajecantidad_maxima='';
	public string $strMensajefactura_sin_stock='';
	public string $strMensajemostrar_componente='';
	public string $strMensajeproducto_equivalente='';
	public string $strMensajeavisa_expiracion='';
	public string $strMensajerequiere_serie='';
	public string $strMensajeacepta_lote='';
	public string $strMensajeid_cuenta_venta='';
	public string $strMensajeid_cuenta_compra='';
	public string $strMensajeid_cuenta_costo='';
	public string $strMensajevalor_inventario='';
	public string $strMensajeproducto_fisico='';
	public string $strMensajeultima_venta='';
	public string $strMensajeprecio_actualizado='';
	public string $strMensajeid_retencion='';
	public string $strMensajeretencion_ventas='';
	public string $strMensajeretencion_compras='';
	public string $strMensajefactura_con_precio='';
	
	
	public string $strVisibleFK_Idbodega='display:table-row';
	public string $strVisibleFK_Idcategoria_producto='display:table-row';
	public string $strVisibleFK_Idcuenta_compra='display:table-row';
	public string $strVisibleFK_Idcuenta_inventario='display:table-row';
	public string $strVisibleFK_Idcuenta_venta='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idimpuesto='display:table-row';
	public string $strVisibleFK_Idotro_impuesto='display:table-row';
	public string $strVisibleFK_Idproveedor='display:table-row';
	public string $strVisibleFK_Idretencion='display:table-row';
	public string $strVisibleFK_Idsub_categoria_producto='display:table-row';
	public string $strVisibleFK_Idtipo_producto='display:table-row';
	public string $strVisibleFK_Idunidad_compra='display:table-row';
	public string $strVisibleFK_Idunidad_venta='display:table-row';

	
	public array $empresasFK=array();

	public function getempresasFK():array {
		return $this->empresasFK;
	}

	public function setempresasFK(array $empresasFK) {
		$this->empresasFK = $empresasFK;
	}

	public int $idempresaDefaultFK=-1;

	public function getIdempresaDefaultFK():int {
		return $this->idempresaDefaultFK;
	}

	public function setIdempresaDefaultFK(int $idempresaDefaultFK) {
		$this->idempresaDefaultFK = $idempresaDefaultFK;
	}

	public array $proveedorsFK=array();

	public function getproveedorsFK():array {
		return $this->proveedorsFK;
	}

	public function setproveedorsFK(array $proveedorsFK) {
		$this->proveedorsFK = $proveedorsFK;
	}

	public int $idproveedorDefaultFK=-1;

	public function getIdproveedorDefaultFK():int {
		return $this->idproveedorDefaultFK;
	}

	public function setIdproveedorDefaultFK(int $idproveedorDefaultFK) {
		$this->idproveedorDefaultFK = $idproveedorDefaultFK;
	}

	public array $tipo_productosFK=array();

	public function gettipo_productosFK():array {
		return $this->tipo_productosFK;
	}

	public function settipo_productosFK(array $tipo_productosFK) {
		$this->tipo_productosFK = $tipo_productosFK;
	}

	public int $idtipo_productoDefaultFK=-1;

	public function getIdtipo_productoDefaultFK():int {
		return $this->idtipo_productoDefaultFK;
	}

	public function setIdtipo_productoDefaultFK(int $idtipo_productoDefaultFK) {
		$this->idtipo_productoDefaultFK = $idtipo_productoDefaultFK;
	}

	public array $impuestosFK=array();

	public function getimpuestosFK():array {
		return $this->impuestosFK;
	}

	public function setimpuestosFK(array $impuestosFK) {
		$this->impuestosFK = $impuestosFK;
	}

	public int $idimpuestoDefaultFK=-1;

	public function getIdimpuestoDefaultFK():int {
		return $this->idimpuestoDefaultFK;
	}

	public function setIdimpuestoDefaultFK(int $idimpuestoDefaultFK) {
		$this->idimpuestoDefaultFK = $idimpuestoDefaultFK;
	}

	public array $otro_impuestosFK=array();

	public function getotro_impuestosFK():array {
		return $this->otro_impuestosFK;
	}

	public function setotro_impuestosFK(array $otro_impuestosFK) {
		$this->otro_impuestosFK = $otro_impuestosFK;
	}

	public int $idotro_impuestoDefaultFK=-1;

	public function getIdotro_impuestoDefaultFK():int {
		return $this->idotro_impuestoDefaultFK;
	}

	public function setIdotro_impuestoDefaultFK(int $idotro_impuestoDefaultFK) {
		$this->idotro_impuestoDefaultFK = $idotro_impuestoDefaultFK;
	}

	public array $categoria_productosFK=array();

	public function getcategoria_productosFK():array {
		return $this->categoria_productosFK;
	}

	public function setcategoria_productosFK(array $categoria_productosFK) {
		$this->categoria_productosFK = $categoria_productosFK;
	}

	public int $idcategoria_productoDefaultFK=-1;

	public function getIdcategoria_productoDefaultFK():int {
		return $this->idcategoria_productoDefaultFK;
	}

	public function setIdcategoria_productoDefaultFK(int $idcategoria_productoDefaultFK) {
		$this->idcategoria_productoDefaultFK = $idcategoria_productoDefaultFK;
	}

	public array $sub_categoria_productosFK=array();

	public function getsub_categoria_productosFK():array {
		return $this->sub_categoria_productosFK;
	}

	public function setsub_categoria_productosFK(array $sub_categoria_productosFK) {
		$this->sub_categoria_productosFK = $sub_categoria_productosFK;
	}

	public int $idsub_categoria_productoDefaultFK=-1;

	public function getIdsub_categoria_productoDefaultFK():int {
		return $this->idsub_categoria_productoDefaultFK;
	}

	public function setIdsub_categoria_productoDefaultFK(int $idsub_categoria_productoDefaultFK) {
		$this->idsub_categoria_productoDefaultFK = $idsub_categoria_productoDefaultFK;
	}

	public array $bodega_defectosFK=array();

	public function getbodega_defectosFK():array {
		return $this->bodega_defectosFK;
	}

	public function setbodega_defectosFK(array $bodega_defectosFK) {
		$this->bodega_defectosFK = $bodega_defectosFK;
	}

	public int $idbodega_defectoDefaultFK=-1;

	public function getIdbodega_defectoDefaultFK():int {
		return $this->idbodega_defectoDefaultFK;
	}

	public function setIdbodega_defectoDefaultFK(int $idbodega_defectoDefaultFK) {
		$this->idbodega_defectoDefaultFK = $idbodega_defectoDefaultFK;
	}

	public array $unidad_comprasFK=array();

	public function getunidad_comprasFK():array {
		return $this->unidad_comprasFK;
	}

	public function setunidad_comprasFK(array $unidad_comprasFK) {
		$this->unidad_comprasFK = $unidad_comprasFK;
	}

	public int $idunidad_compraDefaultFK=-1;

	public function getIdunidad_compraDefaultFK():int {
		return $this->idunidad_compraDefaultFK;
	}

	public function setIdunidad_compraDefaultFK(int $idunidad_compraDefaultFK) {
		$this->idunidad_compraDefaultFK = $idunidad_compraDefaultFK;
	}

	public array $unidad_ventasFK=array();

	public function getunidad_ventasFK():array {
		return $this->unidad_ventasFK;
	}

	public function setunidad_ventasFK(array $unidad_ventasFK) {
		$this->unidad_ventasFK = $unidad_ventasFK;
	}

	public int $idunidad_ventaDefaultFK=-1;

	public function getIdunidad_ventaDefaultFK():int {
		return $this->idunidad_ventaDefaultFK;
	}

	public function setIdunidad_ventaDefaultFK(int $idunidad_ventaDefaultFK) {
		$this->idunidad_ventaDefaultFK = $idunidad_ventaDefaultFK;
	}

	public array $cuenta_ventasFK=array();

	public function getcuenta_ventasFK():array {
		return $this->cuenta_ventasFK;
	}

	public function setcuenta_ventasFK(array $cuenta_ventasFK) {
		$this->cuenta_ventasFK = $cuenta_ventasFK;
	}

	public int $idcuenta_ventaDefaultFK=-1;

	public function getIdcuenta_ventaDefaultFK():int {
		return $this->idcuenta_ventaDefaultFK;
	}

	public function setIdcuenta_ventaDefaultFK(int $idcuenta_ventaDefaultFK) {
		$this->idcuenta_ventaDefaultFK = $idcuenta_ventaDefaultFK;
	}

	public array $cuenta_comprasFK=array();

	public function getcuenta_comprasFK():array {
		return $this->cuenta_comprasFK;
	}

	public function setcuenta_comprasFK(array $cuenta_comprasFK) {
		$this->cuenta_comprasFK = $cuenta_comprasFK;
	}

	public int $idcuenta_compraDefaultFK=-1;

	public function getIdcuenta_compraDefaultFK():int {
		return $this->idcuenta_compraDefaultFK;
	}

	public function setIdcuenta_compraDefaultFK(int $idcuenta_compraDefaultFK) {
		$this->idcuenta_compraDefaultFK = $idcuenta_compraDefaultFK;
	}

	public array $cuenta_costosFK=array();

	public function getcuenta_costosFK():array {
		return $this->cuenta_costosFK;
	}

	public function setcuenta_costosFK(array $cuenta_costosFK) {
		$this->cuenta_costosFK = $cuenta_costosFK;
	}

	public int $idcuenta_costoDefaultFK=-1;

	public function getIdcuenta_costoDefaultFK():int {
		return $this->idcuenta_costoDefaultFK;
	}

	public function setIdcuenta_costoDefaultFK(int $idcuenta_costoDefaultFK) {
		$this->idcuenta_costoDefaultFK = $idcuenta_costoDefaultFK;
	}

	public array $retencionsFK=array();

	public function getretencionsFK():array {
		return $this->retencionsFK;
	}

	public function setretencionsFK(array $retencionsFK) {
		$this->retencionsFK = $retencionsFK;
	}

	public int $idretencionDefaultFK=-1;

	public function getIdretencionDefaultFK():int {
		return $this->idretencionDefaultFK;
	}

	public function setIdretencionDefaultFK(int $idretencionDefaultFK) {
		$this->idretencionDefaultFK = $idretencionDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisoslista_precio='none';
	public $strTienePermisosproducto_bodega='none';
	public $strTienePermisosotro_suplidor='none';
	public $strTienePermisoslista_cliente='none';
	public $strTienePermisosimagen_producto='none';
	public $strTienePermisoslista_producto='none';
	
	
	public  $id_bodega_defectoFK_Idbodega=null;

	public  $id_categoria_productoFK_Idcategoria_producto=null;

	public  $id_cuenta_compraFK_Idcuenta_compra=null;

	public  $id_cuenta_costoFK_Idcuenta_inventario=null;

	public  $id_cuenta_ventaFK_Idcuenta_venta=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_impuestoFK_Idimpuesto=null;

	public  $id_otro_impuestoFK_Idotro_impuesto=null;

	public  $id_proveedorFK_Idproveedor=null;

	public  $id_retencionFK_Idretencion=null;

	public  $id_sub_categoria_productoFK_Idsub_categoria_producto=null;

	public  $id_tipo_productoFK_Idtipo_producto=null;

	public  $id_unidad_compraFK_Idunidad_compra=null;

	public  $id_unidad_ventaFK_Idunidad_venta=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->productoLogic==null) {
				$this->productoLogic=new producto_logic();
			}
			
		} else {
			if($this->productoLogic==null) {
				$this->productoLogic=new producto_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->productoClase==null) {
				$this->productoClase=new producto();
			}
			
			$this->productoClase->setId(0);	
				
				
			$this->productoClase->setid_empresa(-1);	
			$this->productoClase->setid_proveedor(-1);	
			$this->productoClase->setcodigo('');	
			$this->productoClase->setnombre('');	
			$this->productoClase->setcosto(0.0);	
			$this->productoClase->setactivo(true);	
			$this->productoClase->setid_tipo_producto(-1);	
			$this->productoClase->setcantidad_inicial(0.0);	
			$this->productoClase->setid_impuesto(-1);	
			$this->productoClase->setid_otro_impuesto(null);	
			$this->productoClase->setimpuesto_ventas(false);	
			$this->productoClase->setotro_impuesto_ventas(false);	
			$this->productoClase->setimpuesto_compras(false);	
			$this->productoClase->setotro_impuesto_compras(false);	
			$this->productoClase->setid_categoria_producto(-1);	
			$this->productoClase->setid_sub_categoria_producto(-1);	
			$this->productoClase->setid_bodega_defecto(-1);	
			$this->productoClase->setid_unidad_compra(-1);	
			$this->productoClase->setequivalencia_compra(0.0);	
			$this->productoClase->setid_unidad_venta(-1);	
			$this->productoClase->setequivalencia_venta(0.0);	
			$this->productoClase->setdescripcion('');	
			$this->productoClase->setimagen('');	
			$this->productoClase->setobservacion('');	
			$this->productoClase->setcomenta_factura(false);	
			$this->productoClase->setcodigo_fabricante('');	
			$this->productoClase->setcantidad(0.0);	
			$this->productoClase->setcantidad_minima(0.0);	
			$this->productoClase->setcantidad_maxima(0.0);	
			$this->productoClase->setfactura_sin_stock(false);	
			$this->productoClase->setmostrar_componente(false);	
			$this->productoClase->setproducto_equivalente(false);	
			$this->productoClase->setavisa_expiracion(false);	
			$this->productoClase->setrequiere_serie(false);	
			$this->productoClase->setacepta_lote(false);	
			$this->productoClase->setid_cuenta_venta(null);	
			$this->productoClase->setid_cuenta_compra(null);	
			$this->productoClase->setid_cuenta_costo(null);	
			$this->productoClase->setvalor_inventario(0.0);	
			$this->productoClase->setproducto_fisico(0);	
			$this->productoClase->setultima_venta(date('Y-m-d'));	
			$this->productoClase->setprecio_actualizado(date('Y-m-d'));	
			$this->productoClase->setid_retencion(null);	
			$this->productoClase->setretencion_ventas(false);	
			$this->productoClase->setretencion_compras(false);	
			$this->productoClase->setfactura_con_precio(0);	
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function actualizarEstadoCeldasBotones(string $strAccion,bool $bitGuardarCambiosEnLote=false,bool $bitEsMantenimientoRelacionado=false){
		$this->actualizarEstadoCeldasBotonesBase($strAccion,$bitGuardarCambiosEnLote,$bitEsMantenimientoRelacionado);
	}
	
	public function manejarRetornarExcepcion(Exception $e) {
		$this->manejarRetornarExcepcionBase($e);
	}
	
	public function cancelarControles() {			
		$this->cancelarControlesBase();
	}
	
	public function inicializarAuxiliares() {
		$this->inicializarAuxiliaresBase();				
	}
	
	public function inicializarMensajesTipo(string $tipo,$e=null) {
		$this->inicializarMensajesTipoBase($tipo,$e);
	}			
	
	public function prepararEjecutarMantenimiento() {
		$this->prepararEjecutarMantenimientoBase('producto');
	}
	
	public function setTipoAction(string $action='INDEX') {		
		$this->setTipoActionBase($action);
	}
	
	public function cargarDatosCliente() {
		$this->cargarDatosClienteBase();
	}
	
	public function cargarParametrosPagina() {		
		$this->cargarParametrosPaginaBase();
	}
	
	public function cargarParametrosEventosTabla() {
		$this->cargarParametrosEventosTablaBase();
	}
	
	public function cargarParametrosReporte() {
		$this->cargarParametrosReporteBase('producto');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('producto');
	}
	
	public function actualizarControllerConReturnGeneral(producto_param_return $productoReturnGeneral) {
		if($productoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesproductosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$productoReturnGeneral->getsMensajeProceso();
		}
		
		if($productoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$productoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($productoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$productoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$productoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($productoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($productoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$productoReturnGeneral->getsFuncionJs();
		}
		
		if($productoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(producto_session $producto_session){
		$this->strStyleDivArbol=$producto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$producto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$producto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$producto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$producto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$producto_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$producto_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(producto_session $producto_session){
		$producto_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$producto_session->strStyleDivHeader='display:none';			
		$producto_session->strStyleDivContent='width:93%;height:100%';	
		$producto_session->strStyleDivOpcionesBanner='display:none';	
		$producto_session->strStyleDivExpandirColapsar='display:none';	
		$producto_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(producto_control $producto_control_session){
		$this->idNuevo=$producto_control_session->idNuevo;
		$this->productoActual=$producto_control_session->productoActual;
		$this->producto=$producto_control_session->producto;
		$this->productoClase=$producto_control_session->productoClase;
		$this->productos=$producto_control_session->productos;
		$this->productosEliminados=$producto_control_session->productosEliminados;
		$this->producto=$producto_control_session->producto;
		$this->productosReporte=$producto_control_session->productosReporte;
		$this->productosSeleccionados=$producto_control_session->productosSeleccionados;
		$this->arrOrderBy=$producto_control_session->arrOrderBy;
		$this->arrOrderByRel=$producto_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$producto_control_session->arrHistoryWebs;
		$this->arrSessionBases=$producto_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadproducto=$producto_control_session->strTypeOnLoadproducto;
		$this->strTipoPaginaAuxiliarproducto=$producto_control_session->strTipoPaginaAuxiliarproducto;
		$this->strTipoUsuarioAuxiliarproducto=$producto_control_session->strTipoUsuarioAuxiliarproducto;	
		
		$this->bitEsPopup=$producto_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$producto_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$producto_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$producto_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$producto_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$producto_control_session->strSufijo;
		$this->bitEsRelaciones=$producto_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$producto_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$producto_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$producto_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$producto_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$producto_control_session->strTituloTabla;
		$this->strTituloPathPagina=$producto_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$producto_control_session->strTituloPathElementoActual;
		
		if($this->productoLogic==null) {			
			$this->productoLogic=new producto_logic();
		}
		
		
		if($this->productoClase==null) {
			$this->productoClase=new producto();	
		}
		
		$this->productoLogic->setproducto($this->productoClase);
		
		
		if($this->productos==null) {
			$this->productos=array();	
		}
		
		$this->productoLogic->setproductos($this->productos);
		
		
		$this->strTipoView=$producto_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$producto_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$producto_control_session->datosCliente;
		$this->strAccionBusqueda=$producto_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$producto_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$producto_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$producto_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$producto_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$producto_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$producto_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$producto_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$producto_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$producto_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$producto_control_session->strTipoPaginacion;
		$this->strTipoAccion=$producto_control_session->strTipoAccion;
		$this->tiposReportes=$producto_control_session->tiposReportes;
		$this->tiposReporte=$producto_control_session->tiposReporte;
		$this->tiposAcciones=$producto_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$producto_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$producto_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$producto_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$producto_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$producto_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$producto_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$producto_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$producto_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$producto_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$producto_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$producto_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$producto_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$producto_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$producto_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$producto_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$producto_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$producto_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$producto_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$producto_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$producto_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$producto_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$producto_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$producto_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$producto_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$producto_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$producto_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$producto_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$producto_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$producto_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$producto_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$producto_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$producto_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$producto_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$producto_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$producto_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$producto_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$producto_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$producto_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$producto_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$producto_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$producto_control_session->resumenUsuarioActual;	
		$this->moduloActual=$producto_control_session->moduloActual;	
		$this->opcionActual=$producto_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$producto_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$producto_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));
				
		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		$this->strStyleDivArbol=$producto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$producto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$producto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$producto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$producto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$producto_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$producto_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$producto_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$producto_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$producto_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$producto_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$producto_control_session->strMensajeid_empresa;
		$this->strMensajeid_proveedor=$producto_control_session->strMensajeid_proveedor;
		$this->strMensajecodigo=$producto_control_session->strMensajecodigo;
		$this->strMensajenombre=$producto_control_session->strMensajenombre;
		$this->strMensajecosto=$producto_control_session->strMensajecosto;
		$this->strMensajeactivo=$producto_control_session->strMensajeactivo;
		$this->strMensajeid_tipo_producto=$producto_control_session->strMensajeid_tipo_producto;
		$this->strMensajecantidad_inicial=$producto_control_session->strMensajecantidad_inicial;
		$this->strMensajeid_impuesto=$producto_control_session->strMensajeid_impuesto;
		$this->strMensajeid_otro_impuesto=$producto_control_session->strMensajeid_otro_impuesto;
		$this->strMensajeimpuesto_ventas=$producto_control_session->strMensajeimpuesto_ventas;
		$this->strMensajeotro_impuesto_ventas=$producto_control_session->strMensajeotro_impuesto_ventas;
		$this->strMensajeimpuesto_compras=$producto_control_session->strMensajeimpuesto_compras;
		$this->strMensajeotro_impuesto_compras=$producto_control_session->strMensajeotro_impuesto_compras;
		$this->strMensajeid_categoria_producto=$producto_control_session->strMensajeid_categoria_producto;
		$this->strMensajeid_sub_categoria_producto=$producto_control_session->strMensajeid_sub_categoria_producto;
		$this->strMensajeid_bodega_defecto=$producto_control_session->strMensajeid_bodega_defecto;
		$this->strMensajeid_unidad_compra=$producto_control_session->strMensajeid_unidad_compra;
		$this->strMensajeequivalencia_compra=$producto_control_session->strMensajeequivalencia_compra;
		$this->strMensajeid_unidad_venta=$producto_control_session->strMensajeid_unidad_venta;
		$this->strMensajeequivalencia_venta=$producto_control_session->strMensajeequivalencia_venta;
		$this->strMensajedescripcion=$producto_control_session->strMensajedescripcion;
		$this->strMensajeimagen=$producto_control_session->strMensajeimagen;
		$this->strMensajeobservacion=$producto_control_session->strMensajeobservacion;
		$this->strMensajecomenta_factura=$producto_control_session->strMensajecomenta_factura;
		$this->strMensajecodigo_fabricante=$producto_control_session->strMensajecodigo_fabricante;
		$this->strMensajecantidad=$producto_control_session->strMensajecantidad;
		$this->strMensajecantidad_minima=$producto_control_session->strMensajecantidad_minima;
		$this->strMensajecantidad_maxima=$producto_control_session->strMensajecantidad_maxima;
		$this->strMensajefactura_sin_stock=$producto_control_session->strMensajefactura_sin_stock;
		$this->strMensajemostrar_componente=$producto_control_session->strMensajemostrar_componente;
		$this->strMensajeproducto_equivalente=$producto_control_session->strMensajeproducto_equivalente;
		$this->strMensajeavisa_expiracion=$producto_control_session->strMensajeavisa_expiracion;
		$this->strMensajerequiere_serie=$producto_control_session->strMensajerequiere_serie;
		$this->strMensajeacepta_lote=$producto_control_session->strMensajeacepta_lote;
		$this->strMensajeid_cuenta_venta=$producto_control_session->strMensajeid_cuenta_venta;
		$this->strMensajeid_cuenta_compra=$producto_control_session->strMensajeid_cuenta_compra;
		$this->strMensajeid_cuenta_costo=$producto_control_session->strMensajeid_cuenta_costo;
		$this->strMensajevalor_inventario=$producto_control_session->strMensajevalor_inventario;
		$this->strMensajeproducto_fisico=$producto_control_session->strMensajeproducto_fisico;
		$this->strMensajeultima_venta=$producto_control_session->strMensajeultima_venta;
		$this->strMensajeprecio_actualizado=$producto_control_session->strMensajeprecio_actualizado;
		$this->strMensajeid_retencion=$producto_control_session->strMensajeid_retencion;
		$this->strMensajeretencion_ventas=$producto_control_session->strMensajeretencion_ventas;
		$this->strMensajeretencion_compras=$producto_control_session->strMensajeretencion_compras;
		$this->strMensajefactura_con_precio=$producto_control_session->strMensajefactura_con_precio;
			
		
		$this->empresasFK=$producto_control_session->empresasFK;
		$this->idempresaDefaultFK=$producto_control_session->idempresaDefaultFK;
		$this->proveedorsFK=$producto_control_session->proveedorsFK;
		$this->idproveedorDefaultFK=$producto_control_session->idproveedorDefaultFK;
		$this->tipo_productosFK=$producto_control_session->tipo_productosFK;
		$this->idtipo_productoDefaultFK=$producto_control_session->idtipo_productoDefaultFK;
		$this->impuestosFK=$producto_control_session->impuestosFK;
		$this->idimpuestoDefaultFK=$producto_control_session->idimpuestoDefaultFK;
		$this->otro_impuestosFK=$producto_control_session->otro_impuestosFK;
		$this->idotro_impuestoDefaultFK=$producto_control_session->idotro_impuestoDefaultFK;
		$this->categoria_productosFK=$producto_control_session->categoria_productosFK;
		$this->idcategoria_productoDefaultFK=$producto_control_session->idcategoria_productoDefaultFK;
		$this->sub_categoria_productosFK=$producto_control_session->sub_categoria_productosFK;
		$this->idsub_categoria_productoDefaultFK=$producto_control_session->idsub_categoria_productoDefaultFK;
		$this->bodega_defectosFK=$producto_control_session->bodega_defectosFK;
		$this->idbodega_defectoDefaultFK=$producto_control_session->idbodega_defectoDefaultFK;
		$this->unidad_comprasFK=$producto_control_session->unidad_comprasFK;
		$this->idunidad_compraDefaultFK=$producto_control_session->idunidad_compraDefaultFK;
		$this->unidad_ventasFK=$producto_control_session->unidad_ventasFK;
		$this->idunidad_ventaDefaultFK=$producto_control_session->idunidad_ventaDefaultFK;
		$this->cuenta_ventasFK=$producto_control_session->cuenta_ventasFK;
		$this->idcuenta_ventaDefaultFK=$producto_control_session->idcuenta_ventaDefaultFK;
		$this->cuenta_comprasFK=$producto_control_session->cuenta_comprasFK;
		$this->idcuenta_compraDefaultFK=$producto_control_session->idcuenta_compraDefaultFK;
		$this->cuenta_costosFK=$producto_control_session->cuenta_costosFK;
		$this->idcuenta_costoDefaultFK=$producto_control_session->idcuenta_costoDefaultFK;
		$this->retencionsFK=$producto_control_session->retencionsFK;
		$this->idretencionDefaultFK=$producto_control_session->idretencionDefaultFK;
		
		
		$this->strVisibleFK_Idbodega=$producto_control_session->strVisibleFK_Idbodega;
		$this->strVisibleFK_Idcategoria_producto=$producto_control_session->strVisibleFK_Idcategoria_producto;
		$this->strVisibleFK_Idcuenta_compra=$producto_control_session->strVisibleFK_Idcuenta_compra;
		$this->strVisibleFK_Idcuenta_inventario=$producto_control_session->strVisibleFK_Idcuenta_inventario;
		$this->strVisibleFK_Idcuenta_venta=$producto_control_session->strVisibleFK_Idcuenta_venta;
		$this->strVisibleFK_Idempresa=$producto_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idimpuesto=$producto_control_session->strVisibleFK_Idimpuesto;
		$this->strVisibleFK_Idotro_impuesto=$producto_control_session->strVisibleFK_Idotro_impuesto;
		$this->strVisibleFK_Idproveedor=$producto_control_session->strVisibleFK_Idproveedor;
		$this->strVisibleFK_Idretencion=$producto_control_session->strVisibleFK_Idretencion;
		$this->strVisibleFK_Idsub_categoria_producto=$producto_control_session->strVisibleFK_Idsub_categoria_producto;
		$this->strVisibleFK_Idtipo_producto=$producto_control_session->strVisibleFK_Idtipo_producto;
		$this->strVisibleFK_Idunidad_compra=$producto_control_session->strVisibleFK_Idunidad_compra;
		$this->strVisibleFK_Idunidad_venta=$producto_control_session->strVisibleFK_Idunidad_venta;
		
		
		$this->strTienePermisoslista_precio=$producto_control_session->strTienePermisoslista_precio;
		$this->strTienePermisosproducto_bodega=$producto_control_session->strTienePermisosproducto_bodega;
		$this->strTienePermisosotro_suplidor=$producto_control_session->strTienePermisosotro_suplidor;
		$this->strTienePermisoslista_cliente=$producto_control_session->strTienePermisoslista_cliente;
		$this->strTienePermisosimagen_producto=$producto_control_session->strTienePermisosimagen_producto;
		$this->strTienePermisoslista_producto=$producto_control_session->strTienePermisoslista_producto;
		
		
		$this->id_bodega_defectoFK_Idbodega=$producto_control_session->id_bodega_defectoFK_Idbodega;
		$this->id_categoria_productoFK_Idcategoria_producto=$producto_control_session->id_categoria_productoFK_Idcategoria_producto;
		$this->id_cuenta_compraFK_Idcuenta_compra=$producto_control_session->id_cuenta_compraFK_Idcuenta_compra;
		$this->id_cuenta_costoFK_Idcuenta_inventario=$producto_control_session->id_cuenta_costoFK_Idcuenta_inventario;
		$this->id_cuenta_ventaFK_Idcuenta_venta=$producto_control_session->id_cuenta_ventaFK_Idcuenta_venta;
		$this->id_empresaFK_Idempresa=$producto_control_session->id_empresaFK_Idempresa;
		$this->id_impuestoFK_Idimpuesto=$producto_control_session->id_impuestoFK_Idimpuesto;
		$this->id_otro_impuestoFK_Idotro_impuesto=$producto_control_session->id_otro_impuestoFK_Idotro_impuesto;
		$this->id_proveedorFK_Idproveedor=$producto_control_session->id_proveedorFK_Idproveedor;
		$this->id_retencionFK_Idretencion=$producto_control_session->id_retencionFK_Idretencion;
		$this->id_sub_categoria_productoFK_Idsub_categoria_producto=$producto_control_session->id_sub_categoria_productoFK_Idsub_categoria_producto;
		$this->id_tipo_productoFK_Idtipo_producto=$producto_control_session->id_tipo_productoFK_Idtipo_producto;
		$this->id_unidad_compraFK_Idunidad_compra=$producto_control_session->id_unidad_compraFK_Idunidad_compra;
		$this->id_unidad_ventaFK_Idunidad_venta=$producto_control_session->id_unidad_ventaFK_Idunidad_venta;

		
		
		
		/*ACTUALIZA CON PARAMETROS ACTUALES*/
		$this->cargarParamsPostAccion();
		
		$this->cargarParametrosReporte();
		/*ACTUALIZA CON PARAMETROS ACTUALES*/
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function getidNuevo() : int {
		return $this->idNuevo;
	}

	public function setidNuevo(int $idNuevo) {
		$this->idNuevo = $idNuevo;
	}
	
	public function getproductoControllerAdditional() {
		return $this->productoControllerAdditional;
	}

	public function setproductoControllerAdditional($productoControllerAdditional) {
		$this->productoControllerAdditional = $productoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getproductoActual() : producto {
		return $this->productoActual;
	}

	public function setproductoActual(producto $productoActual) {
		$this->productoActual = $productoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidproducto() : int {
		return $this->idproducto;
	}

	public function setidproducto(int $idproducto) {
		$this->idproducto = $idproducto;
	}
	
	public function getproducto() : producto {
		return $this->producto;
	}

	public function setproducto(producto $producto) {
		$this->producto = $producto;
	}
		
	public function getproductoLogic() : producto_logic {		
		return $this->productoLogic;
	}

	public function setproductoLogic(producto_logic $productoLogic) {
		$this->productoLogic = $productoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getproductosModel() {		
		try {						
			/*productosModel.setWrappedData(productoLogic->getproductos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->productosModel;
	}
	
	public function setproductosModel($productosModel) {
		$this->productosModel = $productosModel;
	}
	
	public function getproductos() : array {		
		return $this->productos;
	}
	
	public function setproductos(array $productos) {
		$this->productos= $productos;
	}
	
	public function getproductosEliminados() : array {		
		return $this->productosEliminados;
	}
	
	public function setproductosEliminados(array $productosEliminados) {
		$this->productosEliminados= $productosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getproductoActualFromListDataModel() {
		try {
			/*$productoClase= $this->productosModel->getRowData();*/
			
			/*return $producto;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
