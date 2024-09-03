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
	


class lista_producto_init_control extends ControllerBase {	
	
	public $lista_productoClase=null;	
	public $lista_productosModel=null;	
	public $lista_productosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idlista_producto=0;	
	public ?int $idlista_productoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $lista_productoLogic=null;
	
	public $lista_productoActual=null;	
	
	public $lista_producto=null;
	public $lista_productos=null;
	public $lista_productosEliminados=array();
	public $lista_productosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $lista_productosLocal=array();
	public ?array $lista_productosReporte=null;
	public ?array $lista_productosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadlista_producto='onload';
	public string $strTipoPaginaAuxiliarlista_producto='none';
	public string $strTipoUsuarioAuxiliarlista_producto='none';
		
	public $lista_productoReturnGeneral=null;
	public $lista_productoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $lista_productoModel=null;
	public $lista_productoControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_producto='';
	public string $strMensajecodigo_producto='';
	public string $strMensajedescripcion_producto='';
	public string $strMensajeprecio1='';
	public string $strMensajeprecio2='';
	public string $strMensajeprecio3='';
	public string $strMensajeprecio4='';
	public string $strMensajecosto='';
	public string $strMensajeid_unidad_compra='';
	public string $strMensajeunidad_en_compra='';
	public string $strMensajeequivalencia_en_compra='';
	public string $strMensajeid_unidad_venta='';
	public string $strMensajeunidad_en_venta='';
	public string $strMensajeequivalencia_en_venta='';
	public string $strMensajecantidad_total='';
	public string $strMensajecantidad_minima='';
	public string $strMensajeid_categoria_producto='';
	public string $strMensajeid_sub_categoria_producto='';
	public string $strMensajeacepta_lote='';
	public string $strMensajevalor_inventario='';
	public string $strMensajeimagen='';
	public string $strMensajeincremento1='';
	public string $strMensajeincremento2='';
	public string $strMensajeincremento3='';
	public string $strMensajeincremento4='';
	public string $strMensajecodigo_fabricante='';
	public string $strMensajeproducto_fisico='';
	public string $strMensajesituacion_producto='';
	public string $strMensajeid_tipo_producto='';
	public string $strMensajetipo_producto_codigo='';
	public string $strMensajeid_bodega='';
	public string $strMensajemostrar_componente='';
	public string $strMensajefactura_sin_stock='';
	public string $strMensajeavisa_expiracion='';
	public string $strMensajefactura_con_precio='';
	public string $strMensajeproducto_equivalente='';
	public string $strMensajeid_cuenta_compra='';
	public string $strMensajeid_cuenta_venta='';
	public string $strMensajeid_cuenta_inventario='';
	public string $strMensajecuenta_compra_codigo='';
	public string $strMensajecuenta_venta_codigo='';
	public string $strMensajecuenta_inventario_codigo='';
	public string $strMensajeid_otro_suplidor='';
	public string $strMensajeid_impuesto='';
	public string $strMensajeid_impuesto_ventas='';
	public string $strMensajeid_impuesto_compras='';
	public string $strMensajeimpuesto1_en_ventas='';
	public string $strMensajeimpuesto1_en_compras='';
	public string $strMensajeultima_venta='';
	public string $strMensajeid_otro_impuesto='';
	public string $strMensajeid_otro_impuesto_ventas='';
	public string $strMensajeid_otro_impuesto_compras='';
	public string $strMensajeotro_impuesto_ventas_codigo='';
	public string $strMensajeotro_impuesto_compras_codigo='';
	public string $strMensajeprecio_de_compra_0='';
	public string $strMensajeprecio_actualizado='';
	public string $strMensajerequiere_nro_serie='';
	public string $strMensajecosto_dolar='';
	public string $strMensajecomentario='';
	public string $strMensajecomenta_factura='';
	public string $strMensajeid_retencion='';
	public string $strMensajeid_retencion_ventas='';
	public string $strMensajeid_retencion_compras='';
	public string $strMensajeretencion_ventas_codigo='';
	public string $strMensajeretencion_compras_codigo='';
	public string $strMensajenotas='';
	
	
	public string $strVisibleFK_Idbodega='display:table-row';
	public string $strVisibleFK_Idcategoria_producto='display:table-row';
	public string $strVisibleFK_Idcuenta_compra='display:table-row';
	public string $strVisibleFK_Idcuenta_inventario='display:table-row';
	public string $strVisibleFK_Idcuenta_venta='display:table-row';
	public string $strVisibleFK_Idimpuesto='display:table-row';
	public string $strVisibleFK_Idimpuesto_compras='display:table-row';
	public string $strVisibleFK_Idimpuesto_ventas='display:table-row';
	public string $strVisibleFK_Idotro_impuesto='display:table-row';
	public string $strVisibleFK_Idotro_impuesto_compras='display:table-row';
	public string $strVisibleFK_Idotro_impuesto_ventas='display:table-row';
	public string $strVisibleFK_Idotro_suplidor='display:table-row';
	public string $strVisibleFK_Idproducto='display:table-row';
	public string $strVisibleFK_Idretencion='display:table-row';
	public string $strVisibleFK_Idretencion_compras='display:table-row';
	public string $strVisibleFK_Idretencion_ventas='display:table-row';
	public string $strVisibleFK_Idsub_categoria_producto='display:table-row';
	public string $strVisibleFK_Idtipo_producto='display:table-row';
	public string $strVisibleFK_Idunidad_compra='display:table-row';
	public string $strVisibleFK_Idunidad_venta='display:table-row';

	
	public array $productosFK=array();

	public function getproductosFK():array {
		return $this->productosFK;
	}

	public function setproductosFK(array $productosFK) {
		$this->productosFK = $productosFK;
	}

	public int $idproductoDefaultFK=-1;

	public function getIdproductoDefaultFK():int {
		return $this->idproductoDefaultFK;
	}

	public function setIdproductoDefaultFK(int $idproductoDefaultFK) {
		$this->idproductoDefaultFK = $idproductoDefaultFK;
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

	public array $bodegasFK=array();

	public function getbodegasFK():array {
		return $this->bodegasFK;
	}

	public function setbodegasFK(array $bodegasFK) {
		$this->bodegasFK = $bodegasFK;
	}

	public int $idbodegaDefaultFK=-1;

	public function getIdbodegaDefaultFK():int {
		return $this->idbodegaDefaultFK;
	}

	public function setIdbodegaDefaultFK(int $idbodegaDefaultFK) {
		$this->idbodegaDefaultFK = $idbodegaDefaultFK;
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

	public array $cuenta_inventariosFK=array();

	public function getcuenta_inventariosFK():array {
		return $this->cuenta_inventariosFK;
	}

	public function setcuenta_inventariosFK(array $cuenta_inventariosFK) {
		$this->cuenta_inventariosFK = $cuenta_inventariosFK;
	}

	public int $idcuenta_inventarioDefaultFK=-1;

	public function getIdcuenta_inventarioDefaultFK():int {
		return $this->idcuenta_inventarioDefaultFK;
	}

	public function setIdcuenta_inventarioDefaultFK(int $idcuenta_inventarioDefaultFK) {
		$this->idcuenta_inventarioDefaultFK = $idcuenta_inventarioDefaultFK;
	}

	public array $otro_suplidorsFK=array();

	public function getotro_suplidorsFK():array {
		return $this->otro_suplidorsFK;
	}

	public function setotro_suplidorsFK(array $otro_suplidorsFK) {
		$this->otro_suplidorsFK = $otro_suplidorsFK;
	}

	public int $idotro_suplidorDefaultFK=-1;

	public function getIdotro_suplidorDefaultFK():int {
		return $this->idotro_suplidorDefaultFK;
	}

	public function setIdotro_suplidorDefaultFK(int $idotro_suplidorDefaultFK) {
		$this->idotro_suplidorDefaultFK = $idotro_suplidorDefaultFK;
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

	public array $impuesto_ventassFK=array();

	public function getimpuesto_ventassFK():array {
		return $this->impuesto_ventassFK;
	}

	public function setimpuesto_ventassFK(array $impuesto_ventassFK) {
		$this->impuesto_ventassFK = $impuesto_ventassFK;
	}

	public int $idimpuesto_ventasDefaultFK=-1;

	public function getIdimpuesto_ventasDefaultFK():int {
		return $this->idimpuesto_ventasDefaultFK;
	}

	public function setIdimpuesto_ventasDefaultFK(int $idimpuesto_ventasDefaultFK) {
		$this->idimpuesto_ventasDefaultFK = $idimpuesto_ventasDefaultFK;
	}

	public array $impuesto_comprassFK=array();

	public function getimpuesto_comprassFK():array {
		return $this->impuesto_comprassFK;
	}

	public function setimpuesto_comprassFK(array $impuesto_comprassFK) {
		$this->impuesto_comprassFK = $impuesto_comprassFK;
	}

	public int $idimpuesto_comprasDefaultFK=-1;

	public function getIdimpuesto_comprasDefaultFK():int {
		return $this->idimpuesto_comprasDefaultFK;
	}

	public function setIdimpuesto_comprasDefaultFK(int $idimpuesto_comprasDefaultFK) {
		$this->idimpuesto_comprasDefaultFK = $idimpuesto_comprasDefaultFK;
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

	public array $otro_impuesto_ventassFK=array();

	public function getotro_impuesto_ventassFK():array {
		return $this->otro_impuesto_ventassFK;
	}

	public function setotro_impuesto_ventassFK(array $otro_impuesto_ventassFK) {
		$this->otro_impuesto_ventassFK = $otro_impuesto_ventassFK;
	}

	public int $idotro_impuesto_ventasDefaultFK=-1;

	public function getIdotro_impuesto_ventasDefaultFK():int {
		return $this->idotro_impuesto_ventasDefaultFK;
	}

	public function setIdotro_impuesto_ventasDefaultFK(int $idotro_impuesto_ventasDefaultFK) {
		$this->idotro_impuesto_ventasDefaultFK = $idotro_impuesto_ventasDefaultFK;
	}

	public array $otro_impuesto_comprassFK=array();

	public function getotro_impuesto_comprassFK():array {
		return $this->otro_impuesto_comprassFK;
	}

	public function setotro_impuesto_comprassFK(array $otro_impuesto_comprassFK) {
		$this->otro_impuesto_comprassFK = $otro_impuesto_comprassFK;
	}

	public int $idotro_impuesto_comprasDefaultFK=-1;

	public function getIdotro_impuesto_comprasDefaultFK():int {
		return $this->idotro_impuesto_comprasDefaultFK;
	}

	public function setIdotro_impuesto_comprasDefaultFK(int $idotro_impuesto_comprasDefaultFK) {
		$this->idotro_impuesto_comprasDefaultFK = $idotro_impuesto_comprasDefaultFK;
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

	public array $retencion_ventassFK=array();

	public function getretencion_ventassFK():array {
		return $this->retencion_ventassFK;
	}

	public function setretencion_ventassFK(array $retencion_ventassFK) {
		$this->retencion_ventassFK = $retencion_ventassFK;
	}

	public int $idretencion_ventasDefaultFK=-1;

	public function getIdretencion_ventasDefaultFK():int {
		return $this->idretencion_ventasDefaultFK;
	}

	public function setIdretencion_ventasDefaultFK(int $idretencion_ventasDefaultFK) {
		$this->idretencion_ventasDefaultFK = $idretencion_ventasDefaultFK;
	}

	public array $retencion_comprassFK=array();

	public function getretencion_comprassFK():array {
		return $this->retencion_comprassFK;
	}

	public function setretencion_comprassFK(array $retencion_comprassFK) {
		$this->retencion_comprassFK = $retencion_comprassFK;
	}

	public int $idretencion_comprasDefaultFK=-1;

	public function getIdretencion_comprasDefaultFK():int {
		return $this->idretencion_comprasDefaultFK;
	}

	public function setIdretencion_comprasDefaultFK(int $idretencion_comprasDefaultFK) {
		$this->idretencion_comprasDefaultFK = $idretencion_comprasDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_bodegaFK_Idbodega=null;

	public  $id_categoria_productoFK_Idcategoria_producto=null;

	public  $id_cuenta_compraFK_Idcuenta_compra=null;

	public  $id_cuenta_inventarioFK_Idcuenta_inventario=null;

	public  $id_cuenta_ventaFK_Idcuenta_venta=null;

	public  $id_impuestoFK_Idimpuesto=null;

	public  $id_impuesto_comprasFK_Idimpuesto_compras=null;

	public  $id_impuesto_ventasFK_Idimpuesto_ventas=null;

	public  $id_otro_impuestoFK_Idotro_impuesto=null;

	public  $id_otro_impuesto_comprasFK_Idotro_impuesto_compras=null;

	public  $id_otro_impuesto_ventasFK_Idotro_impuesto_ventas=null;

	public  $id_otro_suplidorFK_Idotro_suplidor=null;

	public  $id_productoFK_Idproducto=null;

	public  $id_retencionFK_Idretencion=null;

	public  $id_retencion_comprasFK_Idretencion_compras=null;

	public  $id_retencion_ventasFK_Idretencion_ventas=null;

	public  $id_sub_categoria_productoFK_Idsub_categoria_producto=null;

	public  $id_tipo_productoFK_Idtipo_producto=null;

	public  $id_unidad_compraFK_Idunidad_compra=null;

	public  $id_unidad_ventaFK_Idunidad_venta=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->lista_productoLogic==null) {
				$this->lista_productoLogic=new lista_producto_logic();
			}
			
		} else {
			if($this->lista_productoLogic==null) {
				$this->lista_productoLogic=new lista_producto_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->lista_productoClase==null) {
				$this->lista_productoClase=new lista_producto();
			}
			
			$this->lista_productoClase->setId(0);	
				
				
			$this->lista_productoClase->setid_producto(-1);	
			$this->lista_productoClase->setcodigo_producto('');	
			$this->lista_productoClase->setdescripcion_producto('');	
			$this->lista_productoClase->setprecio1(0.0);	
			$this->lista_productoClase->setprecio2(0.0);	
			$this->lista_productoClase->setprecio3(0.0);	
			$this->lista_productoClase->setprecio4(0.0);	
			$this->lista_productoClase->setcosto(0.0);	
			$this->lista_productoClase->setid_unidad_compra(-1);	
			$this->lista_productoClase->setunidad_en_compra(0);	
			$this->lista_productoClase->setequivalencia_en_compra(0.0);	
			$this->lista_productoClase->setid_unidad_venta(-1);	
			$this->lista_productoClase->setunidad_en_venta(0);	
			$this->lista_productoClase->setequivalencia_en_venta(0.0);	
			$this->lista_productoClase->setcantidad_total(0.0);	
			$this->lista_productoClase->setcantidad_minima(0.0);	
			$this->lista_productoClase->setid_categoria_producto(-1);	
			$this->lista_productoClase->setid_sub_categoria_producto(-1);	
			$this->lista_productoClase->setacepta_lote('');	
			$this->lista_productoClase->setvalor_inventario(0.0);	
			$this->lista_productoClase->setimagen('');	
			$this->lista_productoClase->setincremento1(0.0);	
			$this->lista_productoClase->setincremento2(0.0);	
			$this->lista_productoClase->setincremento3(0.0);	
			$this->lista_productoClase->setincremento4(0.0);	
			$this->lista_productoClase->setcodigo_fabricante('');	
			$this->lista_productoClase->setproducto_fisico(0);	
			$this->lista_productoClase->setsituacion_producto(0);	
			$this->lista_productoClase->setid_tipo_producto(-1);	
			$this->lista_productoClase->settipo_producto_codigo('');	
			$this->lista_productoClase->setid_bodega(-1);	
			$this->lista_productoClase->setmostrar_componente('');	
			$this->lista_productoClase->setfactura_sin_stock('');	
			$this->lista_productoClase->setavisa_expiracion('');	
			$this->lista_productoClase->setfactura_con_precio(0);	
			$this->lista_productoClase->setproducto_equivalente('');	
			$this->lista_productoClase->setid_cuenta_compra(-1);	
			$this->lista_productoClase->setid_cuenta_venta(-1);	
			$this->lista_productoClase->setid_cuenta_inventario(-1);	
			$this->lista_productoClase->setcuenta_compra_codigo('');	
			$this->lista_productoClase->setcuenta_venta_codigo('');	
			$this->lista_productoClase->setcuenta_inventario_codigo('');	
			$this->lista_productoClase->setid_otro_suplidor(-1);	
			$this->lista_productoClase->setid_impuesto(-1);	
			$this->lista_productoClase->setid_impuesto_ventas(-1);	
			$this->lista_productoClase->setid_impuesto_compras(-1);	
			$this->lista_productoClase->setimpuesto1_en_ventas('');	
			$this->lista_productoClase->setimpuesto1_en_compras('');	
			$this->lista_productoClase->setultima_venta(date('Y-m-d'));	
			$this->lista_productoClase->setid_otro_impuesto(-1);	
			$this->lista_productoClase->setid_otro_impuesto_ventas(-1);	
			$this->lista_productoClase->setid_otro_impuesto_compras(-1);	
			$this->lista_productoClase->setotro_impuesto_ventas_codigo('');	
			$this->lista_productoClase->setotro_impuesto_compras_codigo('');	
			$this->lista_productoClase->setprecio_de_compra_0(0.0);	
			$this->lista_productoClase->setprecio_actualizado(date('Y-m-d'));	
			$this->lista_productoClase->setrequiere_nro_serie('');	
			$this->lista_productoClase->setcosto_dolar(0.0);	
			$this->lista_productoClase->setcomentario('');	
			$this->lista_productoClase->setcomenta_factura('');	
			$this->lista_productoClase->setid_retencion(-1);	
			$this->lista_productoClase->setid_retencion_ventas(-1);	
			$this->lista_productoClase->setid_retencion_compras(-1);	
			$this->lista_productoClase->setretencion_ventas_codigo('');	
			$this->lista_productoClase->setretencion_compras_codigo('');	
			$this->lista_productoClase->setnotas('');	
			
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
		$this->prepararEjecutarMantenimientoBase('lista_producto');
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
		$this->cargarParametrosReporteBase('lista_producto');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('lista_producto');
	}
	
	public function actualizarControllerConReturnGeneral(lista_producto_param_return $lista_productoReturnGeneral) {
		if($lista_productoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajeslista_productosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$lista_productoReturnGeneral->getsMensajeProceso();
		}
		
		if($lista_productoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$lista_productoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($lista_productoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$lista_productoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$lista_productoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($lista_productoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($lista_productoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$lista_productoReturnGeneral->getsFuncionJs();
		}
		
		if($lista_productoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(lista_producto_session $lista_producto_session){
		$this->strStyleDivArbol=$lista_producto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$lista_producto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$lista_producto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$lista_producto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$lista_producto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$lista_producto_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$lista_producto_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(lista_producto_session $lista_producto_session){
		$lista_producto_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$lista_producto_session->strStyleDivHeader='display:none';			
		$lista_producto_session->strStyleDivContent='width:93%;height:100%';	
		$lista_producto_session->strStyleDivOpcionesBanner='display:none';	
		$lista_producto_session->strStyleDivExpandirColapsar='display:none';	
		$lista_producto_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(lista_producto_control $lista_producto_control_session){
		$this->idNuevo=$lista_producto_control_session->idNuevo;
		$this->lista_productoActual=$lista_producto_control_session->lista_productoActual;
		$this->lista_producto=$lista_producto_control_session->lista_producto;
		$this->lista_productoClase=$lista_producto_control_session->lista_productoClase;
		$this->lista_productos=$lista_producto_control_session->lista_productos;
		$this->lista_productosEliminados=$lista_producto_control_session->lista_productosEliminados;
		$this->lista_producto=$lista_producto_control_session->lista_producto;
		$this->lista_productosReporte=$lista_producto_control_session->lista_productosReporte;
		$this->lista_productosSeleccionados=$lista_producto_control_session->lista_productosSeleccionados;
		$this->arrOrderBy=$lista_producto_control_session->arrOrderBy;
		$this->arrOrderByRel=$lista_producto_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$lista_producto_control_session->arrHistoryWebs;
		$this->arrSessionBases=$lista_producto_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadlista_producto=$lista_producto_control_session->strTypeOnLoadlista_producto;
		$this->strTipoPaginaAuxiliarlista_producto=$lista_producto_control_session->strTipoPaginaAuxiliarlista_producto;
		$this->strTipoUsuarioAuxiliarlista_producto=$lista_producto_control_session->strTipoUsuarioAuxiliarlista_producto;	
		
		$this->bitEsPopup=$lista_producto_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$lista_producto_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$lista_producto_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$lista_producto_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$lista_producto_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$lista_producto_control_session->strSufijo;
		$this->bitEsRelaciones=$lista_producto_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$lista_producto_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$lista_producto_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$lista_producto_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$lista_producto_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$lista_producto_control_session->strTituloTabla;
		$this->strTituloPathPagina=$lista_producto_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$lista_producto_control_session->strTituloPathElementoActual;
		
		if($this->lista_productoLogic==null) {			
			$this->lista_productoLogic=new lista_producto_logic();
		}
		
		
		if($this->lista_productoClase==null) {
			$this->lista_productoClase=new lista_producto();	
		}
		
		$this->lista_productoLogic->setlista_producto($this->lista_productoClase);
		
		
		if($this->lista_productos==null) {
			$this->lista_productos=array();	
		}
		
		$this->lista_productoLogic->setlista_productos($this->lista_productos);
		
		
		$this->strTipoView=$lista_producto_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$lista_producto_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$lista_producto_control_session->datosCliente;
		$this->strAccionBusqueda=$lista_producto_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$lista_producto_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$lista_producto_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$lista_producto_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$lista_producto_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$lista_producto_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$lista_producto_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$lista_producto_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$lista_producto_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$lista_producto_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$lista_producto_control_session->strTipoPaginacion;
		$this->strTipoAccion=$lista_producto_control_session->strTipoAccion;
		$this->tiposReportes=$lista_producto_control_session->tiposReportes;
		$this->tiposReporte=$lista_producto_control_session->tiposReporte;
		$this->tiposAcciones=$lista_producto_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$lista_producto_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$lista_producto_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$lista_producto_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$lista_producto_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$lista_producto_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$lista_producto_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$lista_producto_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$lista_producto_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$lista_producto_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$lista_producto_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$lista_producto_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$lista_producto_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$lista_producto_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$lista_producto_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$lista_producto_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$lista_producto_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$lista_producto_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$lista_producto_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$lista_producto_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$lista_producto_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$lista_producto_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$lista_producto_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$lista_producto_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$lista_producto_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$lista_producto_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$lista_producto_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$lista_producto_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$lista_producto_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$lista_producto_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$lista_producto_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$lista_producto_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$lista_producto_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$lista_producto_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$lista_producto_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$lista_producto_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$lista_producto_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$lista_producto_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$lista_producto_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$lista_producto_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$lista_producto_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$lista_producto_control_session->resumenUsuarioActual;	
		$this->moduloActual=$lista_producto_control_session->moduloActual;	
		$this->opcionActual=$lista_producto_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$lista_producto_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$lista_producto_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));
				
		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		$this->strStyleDivArbol=$lista_producto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$lista_producto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$lista_producto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$lista_producto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$lista_producto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$lista_producto_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$lista_producto_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$lista_producto_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$lista_producto_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$lista_producto_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$lista_producto_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_producto=$lista_producto_control_session->strMensajeid_producto;
		$this->strMensajecodigo_producto=$lista_producto_control_session->strMensajecodigo_producto;
		$this->strMensajedescripcion_producto=$lista_producto_control_session->strMensajedescripcion_producto;
		$this->strMensajeprecio1=$lista_producto_control_session->strMensajeprecio1;
		$this->strMensajeprecio2=$lista_producto_control_session->strMensajeprecio2;
		$this->strMensajeprecio3=$lista_producto_control_session->strMensajeprecio3;
		$this->strMensajeprecio4=$lista_producto_control_session->strMensajeprecio4;
		$this->strMensajecosto=$lista_producto_control_session->strMensajecosto;
		$this->strMensajeid_unidad_compra=$lista_producto_control_session->strMensajeid_unidad_compra;
		$this->strMensajeunidad_en_compra=$lista_producto_control_session->strMensajeunidad_en_compra;
		$this->strMensajeequivalencia_en_compra=$lista_producto_control_session->strMensajeequivalencia_en_compra;
		$this->strMensajeid_unidad_venta=$lista_producto_control_session->strMensajeid_unidad_venta;
		$this->strMensajeunidad_en_venta=$lista_producto_control_session->strMensajeunidad_en_venta;
		$this->strMensajeequivalencia_en_venta=$lista_producto_control_session->strMensajeequivalencia_en_venta;
		$this->strMensajecantidad_total=$lista_producto_control_session->strMensajecantidad_total;
		$this->strMensajecantidad_minima=$lista_producto_control_session->strMensajecantidad_minima;
		$this->strMensajeid_categoria_producto=$lista_producto_control_session->strMensajeid_categoria_producto;
		$this->strMensajeid_sub_categoria_producto=$lista_producto_control_session->strMensajeid_sub_categoria_producto;
		$this->strMensajeacepta_lote=$lista_producto_control_session->strMensajeacepta_lote;
		$this->strMensajevalor_inventario=$lista_producto_control_session->strMensajevalor_inventario;
		$this->strMensajeimagen=$lista_producto_control_session->strMensajeimagen;
		$this->strMensajeincremento1=$lista_producto_control_session->strMensajeincremento1;
		$this->strMensajeincremento2=$lista_producto_control_session->strMensajeincremento2;
		$this->strMensajeincremento3=$lista_producto_control_session->strMensajeincremento3;
		$this->strMensajeincremento4=$lista_producto_control_session->strMensajeincremento4;
		$this->strMensajecodigo_fabricante=$lista_producto_control_session->strMensajecodigo_fabricante;
		$this->strMensajeproducto_fisico=$lista_producto_control_session->strMensajeproducto_fisico;
		$this->strMensajesituacion_producto=$lista_producto_control_session->strMensajesituacion_producto;
		$this->strMensajeid_tipo_producto=$lista_producto_control_session->strMensajeid_tipo_producto;
		$this->strMensajetipo_producto_codigo=$lista_producto_control_session->strMensajetipo_producto_codigo;
		$this->strMensajeid_bodega=$lista_producto_control_session->strMensajeid_bodega;
		$this->strMensajemostrar_componente=$lista_producto_control_session->strMensajemostrar_componente;
		$this->strMensajefactura_sin_stock=$lista_producto_control_session->strMensajefactura_sin_stock;
		$this->strMensajeavisa_expiracion=$lista_producto_control_session->strMensajeavisa_expiracion;
		$this->strMensajefactura_con_precio=$lista_producto_control_session->strMensajefactura_con_precio;
		$this->strMensajeproducto_equivalente=$lista_producto_control_session->strMensajeproducto_equivalente;
		$this->strMensajeid_cuenta_compra=$lista_producto_control_session->strMensajeid_cuenta_compra;
		$this->strMensajeid_cuenta_venta=$lista_producto_control_session->strMensajeid_cuenta_venta;
		$this->strMensajeid_cuenta_inventario=$lista_producto_control_session->strMensajeid_cuenta_inventario;
		$this->strMensajecuenta_compra_codigo=$lista_producto_control_session->strMensajecuenta_compra_codigo;
		$this->strMensajecuenta_venta_codigo=$lista_producto_control_session->strMensajecuenta_venta_codigo;
		$this->strMensajecuenta_inventario_codigo=$lista_producto_control_session->strMensajecuenta_inventario_codigo;
		$this->strMensajeid_otro_suplidor=$lista_producto_control_session->strMensajeid_otro_suplidor;
		$this->strMensajeid_impuesto=$lista_producto_control_session->strMensajeid_impuesto;
		$this->strMensajeid_impuesto_ventas=$lista_producto_control_session->strMensajeid_impuesto_ventas;
		$this->strMensajeid_impuesto_compras=$lista_producto_control_session->strMensajeid_impuesto_compras;
		$this->strMensajeimpuesto1_en_ventas=$lista_producto_control_session->strMensajeimpuesto1_en_ventas;
		$this->strMensajeimpuesto1_en_compras=$lista_producto_control_session->strMensajeimpuesto1_en_compras;
		$this->strMensajeultima_venta=$lista_producto_control_session->strMensajeultima_venta;
		$this->strMensajeid_otro_impuesto=$lista_producto_control_session->strMensajeid_otro_impuesto;
		$this->strMensajeid_otro_impuesto_ventas=$lista_producto_control_session->strMensajeid_otro_impuesto_ventas;
		$this->strMensajeid_otro_impuesto_compras=$lista_producto_control_session->strMensajeid_otro_impuesto_compras;
		$this->strMensajeotro_impuesto_ventas_codigo=$lista_producto_control_session->strMensajeotro_impuesto_ventas_codigo;
		$this->strMensajeotro_impuesto_compras_codigo=$lista_producto_control_session->strMensajeotro_impuesto_compras_codigo;
		$this->strMensajeprecio_de_compra_0=$lista_producto_control_session->strMensajeprecio_de_compra_0;
		$this->strMensajeprecio_actualizado=$lista_producto_control_session->strMensajeprecio_actualizado;
		$this->strMensajerequiere_nro_serie=$lista_producto_control_session->strMensajerequiere_nro_serie;
		$this->strMensajecosto_dolar=$lista_producto_control_session->strMensajecosto_dolar;
		$this->strMensajecomentario=$lista_producto_control_session->strMensajecomentario;
		$this->strMensajecomenta_factura=$lista_producto_control_session->strMensajecomenta_factura;
		$this->strMensajeid_retencion=$lista_producto_control_session->strMensajeid_retencion;
		$this->strMensajeid_retencion_ventas=$lista_producto_control_session->strMensajeid_retencion_ventas;
		$this->strMensajeid_retencion_compras=$lista_producto_control_session->strMensajeid_retencion_compras;
		$this->strMensajeretencion_ventas_codigo=$lista_producto_control_session->strMensajeretencion_ventas_codigo;
		$this->strMensajeretencion_compras_codigo=$lista_producto_control_session->strMensajeretencion_compras_codigo;
		$this->strMensajenotas=$lista_producto_control_session->strMensajenotas;
			
		
		$this->productosFK=$lista_producto_control_session->productosFK;
		$this->idproductoDefaultFK=$lista_producto_control_session->idproductoDefaultFK;
		$this->unidad_comprasFK=$lista_producto_control_session->unidad_comprasFK;
		$this->idunidad_compraDefaultFK=$lista_producto_control_session->idunidad_compraDefaultFK;
		$this->unidad_ventasFK=$lista_producto_control_session->unidad_ventasFK;
		$this->idunidad_ventaDefaultFK=$lista_producto_control_session->idunidad_ventaDefaultFK;
		$this->categoria_productosFK=$lista_producto_control_session->categoria_productosFK;
		$this->idcategoria_productoDefaultFK=$lista_producto_control_session->idcategoria_productoDefaultFK;
		$this->sub_categoria_productosFK=$lista_producto_control_session->sub_categoria_productosFK;
		$this->idsub_categoria_productoDefaultFK=$lista_producto_control_session->idsub_categoria_productoDefaultFK;
		$this->tipo_productosFK=$lista_producto_control_session->tipo_productosFK;
		$this->idtipo_productoDefaultFK=$lista_producto_control_session->idtipo_productoDefaultFK;
		$this->bodegasFK=$lista_producto_control_session->bodegasFK;
		$this->idbodegaDefaultFK=$lista_producto_control_session->idbodegaDefaultFK;
		$this->cuenta_comprasFK=$lista_producto_control_session->cuenta_comprasFK;
		$this->idcuenta_compraDefaultFK=$lista_producto_control_session->idcuenta_compraDefaultFK;
		$this->cuenta_ventasFK=$lista_producto_control_session->cuenta_ventasFK;
		$this->idcuenta_ventaDefaultFK=$lista_producto_control_session->idcuenta_ventaDefaultFK;
		$this->cuenta_inventariosFK=$lista_producto_control_session->cuenta_inventariosFK;
		$this->idcuenta_inventarioDefaultFK=$lista_producto_control_session->idcuenta_inventarioDefaultFK;
		$this->otro_suplidorsFK=$lista_producto_control_session->otro_suplidorsFK;
		$this->idotro_suplidorDefaultFK=$lista_producto_control_session->idotro_suplidorDefaultFK;
		$this->impuestosFK=$lista_producto_control_session->impuestosFK;
		$this->idimpuestoDefaultFK=$lista_producto_control_session->idimpuestoDefaultFK;
		$this->impuesto_ventassFK=$lista_producto_control_session->impuesto_ventassFK;
		$this->idimpuesto_ventasDefaultFK=$lista_producto_control_session->idimpuesto_ventasDefaultFK;
		$this->impuesto_comprassFK=$lista_producto_control_session->impuesto_comprassFK;
		$this->idimpuesto_comprasDefaultFK=$lista_producto_control_session->idimpuesto_comprasDefaultFK;
		$this->otro_impuestosFK=$lista_producto_control_session->otro_impuestosFK;
		$this->idotro_impuestoDefaultFK=$lista_producto_control_session->idotro_impuestoDefaultFK;
		$this->otro_impuesto_ventassFK=$lista_producto_control_session->otro_impuesto_ventassFK;
		$this->idotro_impuesto_ventasDefaultFK=$lista_producto_control_session->idotro_impuesto_ventasDefaultFK;
		$this->otro_impuesto_comprassFK=$lista_producto_control_session->otro_impuesto_comprassFK;
		$this->idotro_impuesto_comprasDefaultFK=$lista_producto_control_session->idotro_impuesto_comprasDefaultFK;
		$this->retencionsFK=$lista_producto_control_session->retencionsFK;
		$this->idretencionDefaultFK=$lista_producto_control_session->idretencionDefaultFK;
		$this->retencion_ventassFK=$lista_producto_control_session->retencion_ventassFK;
		$this->idretencion_ventasDefaultFK=$lista_producto_control_session->idretencion_ventasDefaultFK;
		$this->retencion_comprassFK=$lista_producto_control_session->retencion_comprassFK;
		$this->idretencion_comprasDefaultFK=$lista_producto_control_session->idretencion_comprasDefaultFK;
		
		
		$this->strVisibleFK_Idbodega=$lista_producto_control_session->strVisibleFK_Idbodega;
		$this->strVisibleFK_Idcategoria_producto=$lista_producto_control_session->strVisibleFK_Idcategoria_producto;
		$this->strVisibleFK_Idcuenta_compra=$lista_producto_control_session->strVisibleFK_Idcuenta_compra;
		$this->strVisibleFK_Idcuenta_inventario=$lista_producto_control_session->strVisibleFK_Idcuenta_inventario;
		$this->strVisibleFK_Idcuenta_venta=$lista_producto_control_session->strVisibleFK_Idcuenta_venta;
		$this->strVisibleFK_Idimpuesto=$lista_producto_control_session->strVisibleFK_Idimpuesto;
		$this->strVisibleFK_Idimpuesto_compras=$lista_producto_control_session->strVisibleFK_Idimpuesto_compras;
		$this->strVisibleFK_Idimpuesto_ventas=$lista_producto_control_session->strVisibleFK_Idimpuesto_ventas;
		$this->strVisibleFK_Idotro_impuesto=$lista_producto_control_session->strVisibleFK_Idotro_impuesto;
		$this->strVisibleFK_Idotro_impuesto_compras=$lista_producto_control_session->strVisibleFK_Idotro_impuesto_compras;
		$this->strVisibleFK_Idotro_impuesto_ventas=$lista_producto_control_session->strVisibleFK_Idotro_impuesto_ventas;
		$this->strVisibleFK_Idotro_suplidor=$lista_producto_control_session->strVisibleFK_Idotro_suplidor;
		$this->strVisibleFK_Idproducto=$lista_producto_control_session->strVisibleFK_Idproducto;
		$this->strVisibleFK_Idretencion=$lista_producto_control_session->strVisibleFK_Idretencion;
		$this->strVisibleFK_Idretencion_compras=$lista_producto_control_session->strVisibleFK_Idretencion_compras;
		$this->strVisibleFK_Idretencion_ventas=$lista_producto_control_session->strVisibleFK_Idretencion_ventas;
		$this->strVisibleFK_Idsub_categoria_producto=$lista_producto_control_session->strVisibleFK_Idsub_categoria_producto;
		$this->strVisibleFK_Idtipo_producto=$lista_producto_control_session->strVisibleFK_Idtipo_producto;
		$this->strVisibleFK_Idunidad_compra=$lista_producto_control_session->strVisibleFK_Idunidad_compra;
		$this->strVisibleFK_Idunidad_venta=$lista_producto_control_session->strVisibleFK_Idunidad_venta;
		
		
		
		
		$this->id_bodegaFK_Idbodega=$lista_producto_control_session->id_bodegaFK_Idbodega;
		$this->id_categoria_productoFK_Idcategoria_producto=$lista_producto_control_session->id_categoria_productoFK_Idcategoria_producto;
		$this->id_cuenta_compraFK_Idcuenta_compra=$lista_producto_control_session->id_cuenta_compraFK_Idcuenta_compra;
		$this->id_cuenta_inventarioFK_Idcuenta_inventario=$lista_producto_control_session->id_cuenta_inventarioFK_Idcuenta_inventario;
		$this->id_cuenta_ventaFK_Idcuenta_venta=$lista_producto_control_session->id_cuenta_ventaFK_Idcuenta_venta;
		$this->id_impuestoFK_Idimpuesto=$lista_producto_control_session->id_impuestoFK_Idimpuesto;
		$this->id_impuesto_comprasFK_Idimpuesto_compras=$lista_producto_control_session->id_impuesto_comprasFK_Idimpuesto_compras;
		$this->id_impuesto_ventasFK_Idimpuesto_ventas=$lista_producto_control_session->id_impuesto_ventasFK_Idimpuesto_ventas;
		$this->id_otro_impuestoFK_Idotro_impuesto=$lista_producto_control_session->id_otro_impuestoFK_Idotro_impuesto;
		$this->id_otro_impuesto_comprasFK_Idotro_impuesto_compras=$lista_producto_control_session->id_otro_impuesto_comprasFK_Idotro_impuesto_compras;
		$this->id_otro_impuesto_ventasFK_Idotro_impuesto_ventas=$lista_producto_control_session->id_otro_impuesto_ventasFK_Idotro_impuesto_ventas;
		$this->id_otro_suplidorFK_Idotro_suplidor=$lista_producto_control_session->id_otro_suplidorFK_Idotro_suplidor;
		$this->id_productoFK_Idproducto=$lista_producto_control_session->id_productoFK_Idproducto;
		$this->id_retencionFK_Idretencion=$lista_producto_control_session->id_retencionFK_Idretencion;
		$this->id_retencion_comprasFK_Idretencion_compras=$lista_producto_control_session->id_retencion_comprasFK_Idretencion_compras;
		$this->id_retencion_ventasFK_Idretencion_ventas=$lista_producto_control_session->id_retencion_ventasFK_Idretencion_ventas;
		$this->id_sub_categoria_productoFK_Idsub_categoria_producto=$lista_producto_control_session->id_sub_categoria_productoFK_Idsub_categoria_producto;
		$this->id_tipo_productoFK_Idtipo_producto=$lista_producto_control_session->id_tipo_productoFK_Idtipo_producto;
		$this->id_unidad_compraFK_Idunidad_compra=$lista_producto_control_session->id_unidad_compraFK_Idunidad_compra;
		$this->id_unidad_ventaFK_Idunidad_venta=$lista_producto_control_session->id_unidad_ventaFK_Idunidad_venta;

		
		
		
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
	
	public function getlista_productoControllerAdditional() {
		return $this->lista_productoControllerAdditional;
	}

	public function setlista_productoControllerAdditional($lista_productoControllerAdditional) {
		$this->lista_productoControllerAdditional = $lista_productoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getlista_productoActual() : lista_producto {
		return $this->lista_productoActual;
	}

	public function setlista_productoActual(lista_producto $lista_productoActual) {
		$this->lista_productoActual = $lista_productoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidlista_producto() : int {
		return $this->idlista_producto;
	}

	public function setidlista_producto(int $idlista_producto) {
		$this->idlista_producto = $idlista_producto;
	}
	
	public function getlista_producto() : lista_producto {
		return $this->lista_producto;
	}

	public function setlista_producto(lista_producto $lista_producto) {
		$this->lista_producto = $lista_producto;
	}
		
	public function getlista_productoLogic() : lista_producto_logic {		
		return $this->lista_productoLogic;
	}

	public function setlista_productoLogic(lista_producto_logic $lista_productoLogic) {
		$this->lista_productoLogic = $lista_productoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getlista_productosModel() {		
		try {						
			/*lista_productosModel.setWrappedData(lista_productoLogic->getlista_productos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->lista_productosModel;
	}
	
	public function setlista_productosModel($lista_productosModel) {
		$this->lista_productosModel = $lista_productosModel;
	}
	
	public function getlista_productos() : array {		
		return $this->lista_productos;
	}
	
	public function setlista_productos(array $lista_productos) {
		$this->lista_productos= $lista_productos;
	}
	
	public function getlista_productosEliminados() : array {		
		return $this->lista_productosEliminados;
	}
	
	public function setlista_productosEliminados(array $lista_productosEliminados) {
		$this->lista_productosEliminados= $lista_productosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getlista_productoActualFromListDataModel() {
		try {
			/*$lista_productoClase= $this->lista_productosModel->getRowData();*/
			
			/*return $lista_producto;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
