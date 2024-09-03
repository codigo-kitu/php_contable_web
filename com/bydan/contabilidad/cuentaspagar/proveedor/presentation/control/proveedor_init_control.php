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

namespace com\bydan\contabilidad\cuentaspagar\proveedor\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/proveedor/util/proveedor_carga.php');
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;

use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_param_return;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\tipo_persona\business\entity\tipo_persona;
use com\bydan\contabilidad\general\tipo_persona\business\logic\tipo_persona_logic;
use com\bydan\contabilidad\general\tipo_persona\util\tipo_persona_carga;
use com\bydan\contabilidad\general\tipo_persona\util\tipo_persona_util;

use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\business\entity\categoria_proveedor;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\business\logic\categoria_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\util\categoria_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\util\categoria_proveedor_util;

use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\business\entity\giro_negocio_proveedor;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\business\logic\giro_negocio_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\util\giro_negocio_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\util\giro_negocio_proveedor_util;

use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\business\logic\pais_logic;
use com\bydan\contabilidad\seguridad\pais\util\pais_carga;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;

use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;
use com\bydan\contabilidad\seguridad\provincia\business\logic\provincia_logic;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_carga;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_util;

use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;
use com\bydan\contabilidad\seguridad\ciudad\business\logic\ciudad_logic;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_carga;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;

use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\business\logic\vendedor_logic;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_carga;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;
use com\bydan\contabilidad\facturacion\impuesto\business\logic\impuesto_logic;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_carga;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_util;

use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;
use com\bydan\contabilidad\facturacion\retencion\business\logic\retencion_logic;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_carga;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_util;

use com\bydan\contabilidad\facturacion\retencion_fuente\business\entity\retencion_fuente;
use com\bydan\contabilidad\facturacion\retencion_fuente\business\logic\retencion_fuente_logic;
use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_carga;
use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_util;

use com\bydan\contabilidad\facturacion\retencion_ica\business\entity\retencion_ica;
use com\bydan\contabilidad\facturacion\retencion_ica\business\logic\retencion_ica_logic;
use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_carga;
use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_util;

use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\logic\otro_impuesto_logic;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_carga;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_util;

//REL


use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_carga;
use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_util;
use com\bydan\contabilidad\inventario\lista_precio\presentation\session\lista_precio_session;

use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;
use com\bydan\contabilidad\inventario\orden_compra\presentation\session\orden_compra_session;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\presentation\session\cuenta_pagar_session;

use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\util\imagen_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\util\imagen_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\presentation\session\imagen_proveedor_session;

use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\presentation\session\documento_proveedor_session;

use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_carga;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_util;
use com\bydan\contabilidad\inventario\otro_suplidor\presentation\session\otro_suplidor_session;


/*CARGA ARCHIVOS FRAMEWORK*/
proveedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class proveedor_init_control extends ControllerBase {	
	
	public $proveedorClase=null;	
	public $proveedorsModel=null;	
	public $proveedorsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idproveedor=0;	
	public ?int $idproveedorActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $proveedorLogic=null;
	
	public $proveedorActual=null;	
	
	public $proveedor=null;
	public $proveedors=null;
	public $proveedorsEliminados=array();
	public $proveedorsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $proveedorsLocal=array();
	public ?array $proveedorsReporte=null;
	public ?array $proveedorsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadproveedor='onload';
	public string $strTipoPaginaAuxiliarproveedor='none';
	public string $strTipoUsuarioAuxiliarproveedor='none';
		
	public $proveedorReturnGeneral=null;
	public $proveedorParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $proveedorModel=null;
	public $proveedorControllerAdditional=null;
	
	
	

	public $documentocuentapagarLogic=null;

	public function  getdocumento_cuenta_pagarLogic() {
		return $this->documentocuentapagarLogic;
	}

	public function setdocumento_cuenta_pagarLogic($documentocuentapagarLogic) {
		$this->documentocuentapagarLogic =$documentocuentapagarLogic;
	}


	public $loteproductoLogic=null;

	public function  getlote_productoLogic() {
		return $this->loteproductoLogic;
	}

	public function setlote_productoLogic($loteproductoLogic) {
		$this->loteproductoLogic =$loteproductoLogic;
	}


	public $listaprecioLogic=null;

	public function  getlista_precioLogic() {
		return $this->listaprecioLogic;
	}

	public function setlista_precioLogic($listaprecioLogic) {
		$this->listaprecioLogic =$listaprecioLogic;
	}


	public $documentoproveedorLogic=null;

	public function  getdocumento_proveedorLogic() {
		return $this->documentoproveedorLogic;
	}

	public function setdocumento_proveedorLogic($documentoproveedorLogic) {
		$this->documentoproveedorLogic =$documentoproveedorLogic;
	}


	public $kardexLogic=null;

	public function  getkardexLogic() {
		return $this->kardexLogic;
	}

	public function setkardexLogic($kardexLogic) {
		$this->kardexLogic =$kardexLogic;
	}


	public $cuentacorrientedetalleLogic=null;

	public function  getcuenta_corriente_detalleLogic() {
		return $this->cuentacorrientedetalleLogic;
	}

	public function setcuenta_corriente_detalleLogic($cuentacorrientedetalleLogic) {
		$this->cuentacorrientedetalleLogic =$cuentacorrientedetalleLogic;
	}


	public $estimadoLogic=null;

	public function  getestimadoLogic() {
		return $this->estimadoLogic;
	}

	public function setestimadoLogic($estimadoLogic) {
		$this->estimadoLogic =$estimadoLogic;
	}


	public $devolucionLogic=null;

	public function  getdevolucionLogic() {
		return $this->devolucionLogic;
	}

	public function setdevolucionLogic($devolucionLogic) {
		$this->devolucionLogic =$devolucionLogic;
	}


	public $ordencompraLogic=null;

	public function  getorden_compraLogic() {
		return $this->ordencompraLogic;
	}

	public function setorden_compraLogic($ordencompraLogic) {
		$this->ordencompraLogic =$ordencompraLogic;
	}


	public $imagenproveedorLogic=null;

	public function  getimagen_proveedorLogic() {
		return $this->imagenproveedorLogic;
	}

	public function setimagen_proveedorLogic($imagenproveedorLogic) {
		$this->imagenproveedorLogic =$imagenproveedorLogic;
	}


	public $chequecuentacorrienteLogic=null;

	public function  getcheque_cuenta_corrienteLogic() {
		return $this->chequecuentacorrienteLogic;
	}

	public function setcheque_cuenta_corrienteLogic($chequecuentacorrienteLogic) {
		$this->chequecuentacorrienteLogic =$chequecuentacorrienteLogic;
	}


	public $otrosuplidorLogic=null;

	public function  getotro_suplidorLogic() {
		return $this->otrosuplidorLogic;
	}

	public function setotro_suplidorLogic($otrosuplidorLogic) {
		$this->otrosuplidorLogic =$otrosuplidorLogic;
	}


	public $cotizacionLogic=null;

	public function  getcotizacionLogic() {
		return $this->cotizacionLogic;
	}

	public function setcotizacionLogic($cotizacionLogic) {
		$this->cotizacionLogic =$cotizacionLogic;
	}


	public $cuentapagarLogic=null;

	public function  getcuenta_pagarLogic() {
		return $this->cuentapagarLogic;
	}

	public function setcuenta_pagarLogic($cuentapagarLogic) {
		$this->cuentapagarLogic =$cuentapagarLogic;
	}


	public $productoLogic=null;

	public function  getproductoLogic() {
		return $this->productoLogic;
	}

	public function setproductoLogic($productoLogic) {
		$this->productoLogic =$productoLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_tipo_persona='';
	public string $strMensajeid_categoria_proveedor='';
	public string $strMensajeid_giro_negocio_proveedor='';
	public string $strMensajecodigo='';
	public string $strMensajeruc='';
	public string $strMensajeprimer_apellido='';
	public string $strMensajesegundo_apellido='';
	public string $strMensajeprimer_nombre='';
	public string $strMensajesegundo_nombre='';
	public string $strMensajenombre_completo='';
	public string $strMensajedireccion='';
	public string $strMensajetelefono='';
	public string $strMensajetelefono_movil='';
	public string $strMensajee_mail='';
	public string $strMensajee_mail2='';
	public string $strMensajecomentario='';
	public string $strMensajeimagen='';
	public string $strMensajeactivo='';
	public string $strMensajeid_pais='';
	public string $strMensajeid_provincia='';
	public string $strMensajeid_ciudad='';
	public string $strMensajecodigo_postal='';
	public string $strMensajefax='';
	public string $strMensajecontacto='';
	public string $strMensajeid_vendedor='';
	public string $strMensajemaximo_credito='';
	public string $strMensajemaximo_descuento='';
	public string $strMensajeinteres_anual='';
	public string $strMensajebalance='';
	public string $strMensajeid_termino_pago_proveedor='';
	public string $strMensajeid_cuenta='';
	public string $strMensajeaplica_impuesto_compras='';
	public string $strMensajeid_impuesto='';
	public string $strMensajeaplica_retencion_impuesto='';
	public string $strMensajeid_retencion='';
	public string $strMensajeaplica_retencion_fuente='';
	public string $strMensajeid_retencion_fuente='';
	public string $strMensajeaplica_retencion_ica='';
	public string $strMensajeid_retencion_ica='';
	public string $strMensajeaplica_2do_impuesto='';
	public string $strMensajeid_otro_impuesto='';
	public string $strMensajecreado='';
	public string $strMensajemonto_ultima_transaccion='';
	public string $strMensajefecha_ultima_transaccion='';
	public string $strMensajedescripcion_ultima_transaccion='';
	
	
	public string $strVisibleFK_Idcategoria_proveedor='display:table-row';
	public string $strVisibleFK_Idciudad='display:table-row';
	public string $strVisibleFK_Idcuenta='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idgiro_negocio_proveedor='display:table-row';
	public string $strVisibleFK_Idimpuesto='display:table-row';
	public string $strVisibleFK_Idotro_impuesto='display:table-row';
	public string $strVisibleFK_Idpais='display:table-row';
	public string $strVisibleFK_Idprovincia='display:table-row';
	public string $strVisibleFK_Idretencion='display:table-row';
	public string $strVisibleFK_Idretencion_fuente='display:table-row';
	public string $strVisibleFK_Idretencion_ica='display:table-row';
	public string $strVisibleFK_Idtermino_pago_proveedor='display:table-row';
	public string $strVisibleFK_Idtipo_persona='display:table-row';
	public string $strVisibleFK_Idvendedor='display:table-row';

	
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

	public array $tipo_personasFK=array();

	public function gettipo_personasFK():array {
		return $this->tipo_personasFK;
	}

	public function settipo_personasFK(array $tipo_personasFK) {
		$this->tipo_personasFK = $tipo_personasFK;
	}

	public int $idtipo_personaDefaultFK=-1;

	public function getIdtipo_personaDefaultFK():int {
		return $this->idtipo_personaDefaultFK;
	}

	public function setIdtipo_personaDefaultFK(int $idtipo_personaDefaultFK) {
		$this->idtipo_personaDefaultFK = $idtipo_personaDefaultFK;
	}

	public array $categoria_proveedorsFK=array();

	public function getcategoria_proveedorsFK():array {
		return $this->categoria_proveedorsFK;
	}

	public function setcategoria_proveedorsFK(array $categoria_proveedorsFK) {
		$this->categoria_proveedorsFK = $categoria_proveedorsFK;
	}

	public int $idcategoria_proveedorDefaultFK=-1;

	public function getIdcategoria_proveedorDefaultFK():int {
		return $this->idcategoria_proveedorDefaultFK;
	}

	public function setIdcategoria_proveedorDefaultFK(int $idcategoria_proveedorDefaultFK) {
		$this->idcategoria_proveedorDefaultFK = $idcategoria_proveedorDefaultFK;
	}

	public array $giro_negocio_proveedorsFK=array();

	public function getgiro_negocio_proveedorsFK():array {
		return $this->giro_negocio_proveedorsFK;
	}

	public function setgiro_negocio_proveedorsFK(array $giro_negocio_proveedorsFK) {
		$this->giro_negocio_proveedorsFK = $giro_negocio_proveedorsFK;
	}

	public int $idgiro_negocio_proveedorDefaultFK=-1;

	public function getIdgiro_negocio_proveedorDefaultFK():int {
		return $this->idgiro_negocio_proveedorDefaultFK;
	}

	public function setIdgiro_negocio_proveedorDefaultFK(int $idgiro_negocio_proveedorDefaultFK) {
		$this->idgiro_negocio_proveedorDefaultFK = $idgiro_negocio_proveedorDefaultFK;
	}

	public array $paissFK=array();

	public function getpaissFK():array {
		return $this->paissFK;
	}

	public function setpaissFK(array $paissFK) {
		$this->paissFK = $paissFK;
	}

	public int $idpaisDefaultFK=-1;

	public function getIdpaisDefaultFK():int {
		return $this->idpaisDefaultFK;
	}

	public function setIdpaisDefaultFK(int $idpaisDefaultFK) {
		$this->idpaisDefaultFK = $idpaisDefaultFK;
	}

	public array $provinciasFK=array();

	public function getprovinciasFK():array {
		return $this->provinciasFK;
	}

	public function setprovinciasFK(array $provinciasFK) {
		$this->provinciasFK = $provinciasFK;
	}

	public int $idprovinciaDefaultFK=-1;

	public function getIdprovinciaDefaultFK():int {
		return $this->idprovinciaDefaultFK;
	}

	public function setIdprovinciaDefaultFK(int $idprovinciaDefaultFK) {
		$this->idprovinciaDefaultFK = $idprovinciaDefaultFK;
	}

	public array $ciudadsFK=array();

	public function getciudadsFK():array {
		return $this->ciudadsFK;
	}

	public function setciudadsFK(array $ciudadsFK) {
		$this->ciudadsFK = $ciudadsFK;
	}

	public int $idciudadDefaultFK=-1;

	public function getIdciudadDefaultFK():int {
		return $this->idciudadDefaultFK;
	}

	public function setIdciudadDefaultFK(int $idciudadDefaultFK) {
		$this->idciudadDefaultFK = $idciudadDefaultFK;
	}

	public array $vendedorsFK=array();

	public function getvendedorsFK():array {
		return $this->vendedorsFK;
	}

	public function setvendedorsFK(array $vendedorsFK) {
		$this->vendedorsFK = $vendedorsFK;
	}

	public int $idvendedorDefaultFK=-1;

	public function getIdvendedorDefaultFK():int {
		return $this->idvendedorDefaultFK;
	}

	public function setIdvendedorDefaultFK(int $idvendedorDefaultFK) {
		$this->idvendedorDefaultFK = $idvendedorDefaultFK;
	}

	public array $termino_pago_proveedorsFK=array();

	public function gettermino_pago_proveedorsFK():array {
		return $this->termino_pago_proveedorsFK;
	}

	public function settermino_pago_proveedorsFK(array $termino_pago_proveedorsFK) {
		$this->termino_pago_proveedorsFK = $termino_pago_proveedorsFK;
	}

	public int $idtermino_pago_proveedorDefaultFK=-1;

	public function getIdtermino_pago_proveedorDefaultFK():int {
		return $this->idtermino_pago_proveedorDefaultFK;
	}

	public function setIdtermino_pago_proveedorDefaultFK(int $idtermino_pago_proveedorDefaultFK) {
		$this->idtermino_pago_proveedorDefaultFK = $idtermino_pago_proveedorDefaultFK;
	}

	public array $cuentasFK=array();

	public function getcuentasFK():array {
		return $this->cuentasFK;
	}

	public function setcuentasFK(array $cuentasFK) {
		$this->cuentasFK = $cuentasFK;
	}

	public int $idcuentaDefaultFK=-1;

	public function getIdcuentaDefaultFK():int {
		return $this->idcuentaDefaultFK;
	}

	public function setIdcuentaDefaultFK(int $idcuentaDefaultFK) {
		$this->idcuentaDefaultFK = $idcuentaDefaultFK;
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

	public array $retencion_fuentesFK=array();

	public function getretencion_fuentesFK():array {
		return $this->retencion_fuentesFK;
	}

	public function setretencion_fuentesFK(array $retencion_fuentesFK) {
		$this->retencion_fuentesFK = $retencion_fuentesFK;
	}

	public int $idretencion_fuenteDefaultFK=-1;

	public function getIdretencion_fuenteDefaultFK():int {
		return $this->idretencion_fuenteDefaultFK;
	}

	public function setIdretencion_fuenteDefaultFK(int $idretencion_fuenteDefaultFK) {
		$this->idretencion_fuenteDefaultFK = $idretencion_fuenteDefaultFK;
	}

	public array $retencion_icasFK=array();

	public function getretencion_icasFK():array {
		return $this->retencion_icasFK;
	}

	public function setretencion_icasFK(array $retencion_icasFK) {
		$this->retencion_icasFK = $retencion_icasFK;
	}

	public int $idretencion_icaDefaultFK=-1;

	public function getIdretencion_icaDefaultFK():int {
		return $this->idretencion_icaDefaultFK;
	}

	public function setIdretencion_icaDefaultFK(int $idretencion_icaDefaultFK) {
		$this->idretencion_icaDefaultFK = $idretencion_icaDefaultFK;
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

	
	
	
	
	
	
	public $strTienePermisosdocumento_cuenta_pagar='none';
	public $strTienePermisoslote_producto='none';
	public $strTienePermisoslista_precio='none';
	public $strTienePermisosdocumento_proveedor='none';
	public $strTienePermisoskardex='none';
	public $strTienePermisoscuenta_corriente_detalle='none';
	public $strTienePermisosestimado='none';
	public $strTienePermisosdevolucion='none';
	public $strTienePermisosorden_compra='none';
	public $strTienePermisosimagen_proveedor='none';
	public $strTienePermisoscheque_cuenta_corriente='none';
	public $strTienePermisosotro_suplidor='none';
	public $strTienePermisoscotizacion='none';
	public $strTienePermisoscuenta_pagar='none';
	public $strTienePermisosproducto='none';
	
	
	public  $id_categoria_proveedorFK_Idcategoria_proveedor=null;

	public  $id_ciudadFK_Idciudad=null;

	public  $id_cuentaFK_Idcuenta=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_giro_negocio_proveedorFK_Idgiro_negocio_proveedor=null;

	public  $id_impuestoFK_Idimpuesto=null;

	public  $id_otro_impuestoFK_Idotro_impuesto=null;

	public  $id_paisFK_Idpais=null;

	public  $id_provinciaFK_Idprovincia=null;

	public  $id_retencionFK_Idretencion=null;

	public  $id_retencion_fuenteFK_Idretencion_fuente=null;

	public  $id_retencion_icaFK_Idretencion_ica=null;

	public  $id_termino_pago_proveedorFK_Idtermino_pago_proveedor=null;

	public  $id_tipo_personaFK_Idtipo_persona=null;

	public  $id_vendedorFK_Idvendedor=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->proveedorLogic==null) {
				$this->proveedorLogic=new proveedor_logic();
			}
			
		} else {
			if($this->proveedorLogic==null) {
				$this->proveedorLogic=new proveedor_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->proveedorClase==null) {
				$this->proveedorClase=new proveedor();
			}
			
			$this->proveedorClase->setId(0);	
				
				
			$this->proveedorClase->setid_empresa(-1);	
			$this->proveedorClase->setid_tipo_persona(-1);	
			$this->proveedorClase->setid_categoria_proveedor(-1);	
			$this->proveedorClase->setid_giro_negocio_proveedor(-1);	
			$this->proveedorClase->setcodigo('');	
			$this->proveedorClase->setruc('');	
			$this->proveedorClase->setprimer_apellido('');	
			$this->proveedorClase->setsegundo_apellido('');	
			$this->proveedorClase->setprimer_nombre('');	
			$this->proveedorClase->setsegundo_nombre('');	
			$this->proveedorClase->setnombre_completo('');	
			$this->proveedorClase->setdireccion('');	
			$this->proveedorClase->settelefono('');	
			$this->proveedorClase->settelefono_movil('');	
			$this->proveedorClase->sete_mail('');	
			$this->proveedorClase->sete_mail2('');	
			$this->proveedorClase->setcomentario('');	
			$this->proveedorClase->setimagen('');	
			$this->proveedorClase->setactivo(true);	
			$this->proveedorClase->setid_pais(-1);	
			$this->proveedorClase->setid_provincia(-1);	
			$this->proveedorClase->setid_ciudad(-1);	
			$this->proveedorClase->setcodigo_postal('');	
			$this->proveedorClase->setfax('');	
			$this->proveedorClase->setcontacto('');	
			$this->proveedorClase->setid_vendedor(-1);	
			$this->proveedorClase->setmaximo_credito(0.0);	
			$this->proveedorClase->setmaximo_descuento(0.0);	
			$this->proveedorClase->setinteres_anual(0.0);	
			$this->proveedorClase->setbalance(0.0);	
			$this->proveedorClase->setid_termino_pago_proveedor(-1);	
			$this->proveedorClase->setid_cuenta(null);	
			$this->proveedorClase->setaplica_impuesto_compras(false);	
			$this->proveedorClase->setid_impuesto(-1);	
			$this->proveedorClase->setaplica_retencion_impuesto(false);	
			$this->proveedorClase->setid_retencion(null);	
			$this->proveedorClase->setaplica_retencion_fuente(false);	
			$this->proveedorClase->setid_retencion_fuente(null);	
			$this->proveedorClase->setaplica_retencion_ica(false);	
			$this->proveedorClase->setid_retencion_ica(null);	
			$this->proveedorClase->setaplica_2do_impuesto(false);	
			$this->proveedorClase->setid_otro_impuesto(null);	
			$this->proveedorClase->setcreado(date('Y-m-d'));	
			$this->proveedorClase->setmonto_ultima_transaccion(0.0);	
			$this->proveedorClase->setfecha_ultima_transaccion(date('Y-m-d'));	
			$this->proveedorClase->setdescripcion_ultima_transaccion('');	
			
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
		$this->prepararEjecutarMantenimientoBase('proveedor');
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
		$this->cargarParametrosReporteBase('proveedor');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('proveedor');
	}
	
	public function actualizarControllerConReturnGeneral(proveedor_param_return $proveedorReturnGeneral) {
		if($proveedorReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesproveedorsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$proveedorReturnGeneral->getsMensajeProceso();
		}
		
		if($proveedorReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$proveedorReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($proveedorReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$proveedorReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$proveedorReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($proveedorReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($proveedorReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$proveedorReturnGeneral->getsFuncionJs();
		}
		
		if($proveedorReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(proveedor_session $proveedor_session){
		$this->strStyleDivArbol=$proveedor_session->strStyleDivArbol;	
		$this->strStyleDivContent=$proveedor_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$proveedor_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$proveedor_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$proveedor_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$proveedor_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$proveedor_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(proveedor_session $proveedor_session){
		$proveedor_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$proveedor_session->strStyleDivHeader='display:none';			
		$proveedor_session->strStyleDivContent='width:93%;height:100%';	
		$proveedor_session->strStyleDivOpcionesBanner='display:none';	
		$proveedor_session->strStyleDivExpandirColapsar='display:none';	
		$proveedor_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(proveedor_control $proveedor_control_session){
		$this->idNuevo=$proveedor_control_session->idNuevo;
		$this->proveedorActual=$proveedor_control_session->proveedorActual;
		$this->proveedor=$proveedor_control_session->proveedor;
		$this->proveedorClase=$proveedor_control_session->proveedorClase;
		$this->proveedors=$proveedor_control_session->proveedors;
		$this->proveedorsEliminados=$proveedor_control_session->proveedorsEliminados;
		$this->proveedor=$proveedor_control_session->proveedor;
		$this->proveedorsReporte=$proveedor_control_session->proveedorsReporte;
		$this->proveedorsSeleccionados=$proveedor_control_session->proveedorsSeleccionados;
		$this->arrOrderBy=$proveedor_control_session->arrOrderBy;
		$this->arrOrderByRel=$proveedor_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$proveedor_control_session->arrHistoryWebs;
		$this->arrSessionBases=$proveedor_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadproveedor=$proveedor_control_session->strTypeOnLoadproveedor;
		$this->strTipoPaginaAuxiliarproveedor=$proveedor_control_session->strTipoPaginaAuxiliarproveedor;
		$this->strTipoUsuarioAuxiliarproveedor=$proveedor_control_session->strTipoUsuarioAuxiliarproveedor;	
		
		$this->bitEsPopup=$proveedor_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$proveedor_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$proveedor_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$proveedor_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$proveedor_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$proveedor_control_session->strSufijo;
		$this->bitEsRelaciones=$proveedor_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$proveedor_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$proveedor_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$proveedor_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$proveedor_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$proveedor_control_session->strTituloTabla;
		$this->strTituloPathPagina=$proveedor_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$proveedor_control_session->strTituloPathElementoActual;
		
		if($this->proveedorLogic==null) {			
			$this->proveedorLogic=new proveedor_logic();
		}
		
		
		if($this->proveedorClase==null) {
			$this->proveedorClase=new proveedor();	
		}
		
		$this->proveedorLogic->setproveedor($this->proveedorClase);
		
		
		if($this->proveedors==null) {
			$this->proveedors=array();	
		}
		
		$this->proveedorLogic->setproveedors($this->proveedors);
		
		
		$this->strTipoView=$proveedor_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$proveedor_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$proveedor_control_session->datosCliente;
		$this->strAccionBusqueda=$proveedor_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$proveedor_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$proveedor_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$proveedor_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$proveedor_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$proveedor_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$proveedor_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$proveedor_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$proveedor_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$proveedor_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$proveedor_control_session->strTipoPaginacion;
		$this->strTipoAccion=$proveedor_control_session->strTipoAccion;
		$this->tiposReportes=$proveedor_control_session->tiposReportes;
		$this->tiposReporte=$proveedor_control_session->tiposReporte;
		$this->tiposAcciones=$proveedor_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$proveedor_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$proveedor_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$proveedor_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$proveedor_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$proveedor_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$proveedor_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$proveedor_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$proveedor_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$proveedor_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$proveedor_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$proveedor_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$proveedor_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$proveedor_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$proveedor_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$proveedor_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$proveedor_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$proveedor_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$proveedor_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$proveedor_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$proveedor_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$proveedor_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$proveedor_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$proveedor_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$proveedor_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$proveedor_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$proveedor_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$proveedor_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$proveedor_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$proveedor_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$proveedor_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$proveedor_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$proveedor_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$proveedor_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$proveedor_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$proveedor_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$proveedor_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$proveedor_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$proveedor_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$proveedor_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$proveedor_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$proveedor_control_session->resumenUsuarioActual;	
		$this->moduloActual=$proveedor_control_session->moduloActual;	
		$this->opcionActual=$proveedor_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$proveedor_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$proveedor_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));
				
		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		$this->strStyleDivArbol=$proveedor_session->strStyleDivArbol;	
		$this->strStyleDivContent=$proveedor_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$proveedor_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$proveedor_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$proveedor_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$proveedor_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$proveedor_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$proveedor_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$proveedor_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$proveedor_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$proveedor_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$proveedor_control_session->strMensajeid_empresa;
		$this->strMensajeid_tipo_persona=$proveedor_control_session->strMensajeid_tipo_persona;
		$this->strMensajeid_categoria_proveedor=$proveedor_control_session->strMensajeid_categoria_proveedor;
		$this->strMensajeid_giro_negocio_proveedor=$proveedor_control_session->strMensajeid_giro_negocio_proveedor;
		$this->strMensajecodigo=$proveedor_control_session->strMensajecodigo;
		$this->strMensajeruc=$proveedor_control_session->strMensajeruc;
		$this->strMensajeprimer_apellido=$proveedor_control_session->strMensajeprimer_apellido;
		$this->strMensajesegundo_apellido=$proveedor_control_session->strMensajesegundo_apellido;
		$this->strMensajeprimer_nombre=$proveedor_control_session->strMensajeprimer_nombre;
		$this->strMensajesegundo_nombre=$proveedor_control_session->strMensajesegundo_nombre;
		$this->strMensajenombre_completo=$proveedor_control_session->strMensajenombre_completo;
		$this->strMensajedireccion=$proveedor_control_session->strMensajedireccion;
		$this->strMensajetelefono=$proveedor_control_session->strMensajetelefono;
		$this->strMensajetelefono_movil=$proveedor_control_session->strMensajetelefono_movil;
		$this->strMensajee_mail=$proveedor_control_session->strMensajee_mail;
		$this->strMensajee_mail2=$proveedor_control_session->strMensajee_mail2;
		$this->strMensajecomentario=$proveedor_control_session->strMensajecomentario;
		$this->strMensajeimagen=$proveedor_control_session->strMensajeimagen;
		$this->strMensajeactivo=$proveedor_control_session->strMensajeactivo;
		$this->strMensajeid_pais=$proveedor_control_session->strMensajeid_pais;
		$this->strMensajeid_provincia=$proveedor_control_session->strMensajeid_provincia;
		$this->strMensajeid_ciudad=$proveedor_control_session->strMensajeid_ciudad;
		$this->strMensajecodigo_postal=$proveedor_control_session->strMensajecodigo_postal;
		$this->strMensajefax=$proveedor_control_session->strMensajefax;
		$this->strMensajecontacto=$proveedor_control_session->strMensajecontacto;
		$this->strMensajeid_vendedor=$proveedor_control_session->strMensajeid_vendedor;
		$this->strMensajemaximo_credito=$proveedor_control_session->strMensajemaximo_credito;
		$this->strMensajemaximo_descuento=$proveedor_control_session->strMensajemaximo_descuento;
		$this->strMensajeinteres_anual=$proveedor_control_session->strMensajeinteres_anual;
		$this->strMensajebalance=$proveedor_control_session->strMensajebalance;
		$this->strMensajeid_termino_pago_proveedor=$proveedor_control_session->strMensajeid_termino_pago_proveedor;
		$this->strMensajeid_cuenta=$proveedor_control_session->strMensajeid_cuenta;
		$this->strMensajeaplica_impuesto_compras=$proveedor_control_session->strMensajeaplica_impuesto_compras;
		$this->strMensajeid_impuesto=$proveedor_control_session->strMensajeid_impuesto;
		$this->strMensajeaplica_retencion_impuesto=$proveedor_control_session->strMensajeaplica_retencion_impuesto;
		$this->strMensajeid_retencion=$proveedor_control_session->strMensajeid_retencion;
		$this->strMensajeaplica_retencion_fuente=$proveedor_control_session->strMensajeaplica_retencion_fuente;
		$this->strMensajeid_retencion_fuente=$proveedor_control_session->strMensajeid_retencion_fuente;
		$this->strMensajeaplica_retencion_ica=$proveedor_control_session->strMensajeaplica_retencion_ica;
		$this->strMensajeid_retencion_ica=$proveedor_control_session->strMensajeid_retencion_ica;
		$this->strMensajeaplica_2do_impuesto=$proveedor_control_session->strMensajeaplica_2do_impuesto;
		$this->strMensajeid_otro_impuesto=$proveedor_control_session->strMensajeid_otro_impuesto;
		$this->strMensajecreado=$proveedor_control_session->strMensajecreado;
		$this->strMensajemonto_ultima_transaccion=$proveedor_control_session->strMensajemonto_ultima_transaccion;
		$this->strMensajefecha_ultima_transaccion=$proveedor_control_session->strMensajefecha_ultima_transaccion;
		$this->strMensajedescripcion_ultima_transaccion=$proveedor_control_session->strMensajedescripcion_ultima_transaccion;
			
		
		$this->empresasFK=$proveedor_control_session->empresasFK;
		$this->idempresaDefaultFK=$proveedor_control_session->idempresaDefaultFK;
		$this->tipo_personasFK=$proveedor_control_session->tipo_personasFK;
		$this->idtipo_personaDefaultFK=$proveedor_control_session->idtipo_personaDefaultFK;
		$this->categoria_proveedorsFK=$proveedor_control_session->categoria_proveedorsFK;
		$this->idcategoria_proveedorDefaultFK=$proveedor_control_session->idcategoria_proveedorDefaultFK;
		$this->giro_negocio_proveedorsFK=$proveedor_control_session->giro_negocio_proveedorsFK;
		$this->idgiro_negocio_proveedorDefaultFK=$proveedor_control_session->idgiro_negocio_proveedorDefaultFK;
		$this->paissFK=$proveedor_control_session->paissFK;
		$this->idpaisDefaultFK=$proveedor_control_session->idpaisDefaultFK;
		$this->provinciasFK=$proveedor_control_session->provinciasFK;
		$this->idprovinciaDefaultFK=$proveedor_control_session->idprovinciaDefaultFK;
		$this->ciudadsFK=$proveedor_control_session->ciudadsFK;
		$this->idciudadDefaultFK=$proveedor_control_session->idciudadDefaultFK;
		$this->vendedorsFK=$proveedor_control_session->vendedorsFK;
		$this->idvendedorDefaultFK=$proveedor_control_session->idvendedorDefaultFK;
		$this->termino_pago_proveedorsFK=$proveedor_control_session->termino_pago_proveedorsFK;
		$this->idtermino_pago_proveedorDefaultFK=$proveedor_control_session->idtermino_pago_proveedorDefaultFK;
		$this->cuentasFK=$proveedor_control_session->cuentasFK;
		$this->idcuentaDefaultFK=$proveedor_control_session->idcuentaDefaultFK;
		$this->impuestosFK=$proveedor_control_session->impuestosFK;
		$this->idimpuestoDefaultFK=$proveedor_control_session->idimpuestoDefaultFK;
		$this->retencionsFK=$proveedor_control_session->retencionsFK;
		$this->idretencionDefaultFK=$proveedor_control_session->idretencionDefaultFK;
		$this->retencion_fuentesFK=$proveedor_control_session->retencion_fuentesFK;
		$this->idretencion_fuenteDefaultFK=$proveedor_control_session->idretencion_fuenteDefaultFK;
		$this->retencion_icasFK=$proveedor_control_session->retencion_icasFK;
		$this->idretencion_icaDefaultFK=$proveedor_control_session->idretencion_icaDefaultFK;
		$this->otro_impuestosFK=$proveedor_control_session->otro_impuestosFK;
		$this->idotro_impuestoDefaultFK=$proveedor_control_session->idotro_impuestoDefaultFK;
		
		
		$this->strVisibleFK_Idcategoria_proveedor=$proveedor_control_session->strVisibleFK_Idcategoria_proveedor;
		$this->strVisibleFK_Idciudad=$proveedor_control_session->strVisibleFK_Idciudad;
		$this->strVisibleFK_Idcuenta=$proveedor_control_session->strVisibleFK_Idcuenta;
		$this->strVisibleFK_Idempresa=$proveedor_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idgiro_negocio_proveedor=$proveedor_control_session->strVisibleFK_Idgiro_negocio_proveedor;
		$this->strVisibleFK_Idimpuesto=$proveedor_control_session->strVisibleFK_Idimpuesto;
		$this->strVisibleFK_Idotro_impuesto=$proveedor_control_session->strVisibleFK_Idotro_impuesto;
		$this->strVisibleFK_Idpais=$proveedor_control_session->strVisibleFK_Idpais;
		$this->strVisibleFK_Idprovincia=$proveedor_control_session->strVisibleFK_Idprovincia;
		$this->strVisibleFK_Idretencion=$proveedor_control_session->strVisibleFK_Idretencion;
		$this->strVisibleFK_Idretencion_fuente=$proveedor_control_session->strVisibleFK_Idretencion_fuente;
		$this->strVisibleFK_Idretencion_ica=$proveedor_control_session->strVisibleFK_Idretencion_ica;
		$this->strVisibleFK_Idtermino_pago_proveedor=$proveedor_control_session->strVisibleFK_Idtermino_pago_proveedor;
		$this->strVisibleFK_Idtipo_persona=$proveedor_control_session->strVisibleFK_Idtipo_persona;
		$this->strVisibleFK_Idvendedor=$proveedor_control_session->strVisibleFK_Idvendedor;
		
		
		$this->strTienePermisosdocumento_cuenta_pagar=$proveedor_control_session->strTienePermisosdocumento_cuenta_pagar;
		$this->strTienePermisoslote_producto=$proveedor_control_session->strTienePermisoslote_producto;
		$this->strTienePermisoslista_precio=$proveedor_control_session->strTienePermisoslista_precio;
		$this->strTienePermisosdocumento_proveedor=$proveedor_control_session->strTienePermisosdocumento_proveedor;
		$this->strTienePermisoskardex=$proveedor_control_session->strTienePermisoskardex;
		$this->strTienePermisoscuenta_corriente_detalle=$proveedor_control_session->strTienePermisoscuenta_corriente_detalle;
		$this->strTienePermisosestimado=$proveedor_control_session->strTienePermisosestimado;
		$this->strTienePermisosdevolucion=$proveedor_control_session->strTienePermisosdevolucion;
		$this->strTienePermisosorden_compra=$proveedor_control_session->strTienePermisosorden_compra;
		$this->strTienePermisosimagen_proveedor=$proveedor_control_session->strTienePermisosimagen_proveedor;
		$this->strTienePermisoscheque_cuenta_corriente=$proveedor_control_session->strTienePermisoscheque_cuenta_corriente;
		$this->strTienePermisosotro_suplidor=$proveedor_control_session->strTienePermisosotro_suplidor;
		$this->strTienePermisoscotizacion=$proveedor_control_session->strTienePermisoscotizacion;
		$this->strTienePermisoscuenta_pagar=$proveedor_control_session->strTienePermisoscuenta_pagar;
		$this->strTienePermisosproducto=$proveedor_control_session->strTienePermisosproducto;
		
		
		$this->id_categoria_proveedorFK_Idcategoria_proveedor=$proveedor_control_session->id_categoria_proveedorFK_Idcategoria_proveedor;
		$this->id_ciudadFK_Idciudad=$proveedor_control_session->id_ciudadFK_Idciudad;
		$this->id_cuentaFK_Idcuenta=$proveedor_control_session->id_cuentaFK_Idcuenta;
		$this->id_empresaFK_Idempresa=$proveedor_control_session->id_empresaFK_Idempresa;
		$this->id_giro_negocio_proveedorFK_Idgiro_negocio_proveedor=$proveedor_control_session->id_giro_negocio_proveedorFK_Idgiro_negocio_proveedor;
		$this->id_impuestoFK_Idimpuesto=$proveedor_control_session->id_impuestoFK_Idimpuesto;
		$this->id_otro_impuestoFK_Idotro_impuesto=$proveedor_control_session->id_otro_impuestoFK_Idotro_impuesto;
		$this->id_paisFK_Idpais=$proveedor_control_session->id_paisFK_Idpais;
		$this->id_provinciaFK_Idprovincia=$proveedor_control_session->id_provinciaFK_Idprovincia;
		$this->id_retencionFK_Idretencion=$proveedor_control_session->id_retencionFK_Idretencion;
		$this->id_retencion_fuenteFK_Idretencion_fuente=$proveedor_control_session->id_retencion_fuenteFK_Idretencion_fuente;
		$this->id_retencion_icaFK_Idretencion_ica=$proveedor_control_session->id_retencion_icaFK_Idretencion_ica;
		$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor=$proveedor_control_session->id_termino_pago_proveedorFK_Idtermino_pago_proveedor;
		$this->id_tipo_personaFK_Idtipo_persona=$proveedor_control_session->id_tipo_personaFK_Idtipo_persona;
		$this->id_vendedorFK_Idvendedor=$proveedor_control_session->id_vendedorFK_Idvendedor;

		
		
		
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
	
	public function getproveedorControllerAdditional() {
		return $this->proveedorControllerAdditional;
	}

	public function setproveedorControllerAdditional($proveedorControllerAdditional) {
		$this->proveedorControllerAdditional = $proveedorControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getproveedorActual() : proveedor {
		return $this->proveedorActual;
	}

	public function setproveedorActual(proveedor $proveedorActual) {
		$this->proveedorActual = $proveedorActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidproveedor() : int {
		return $this->idproveedor;
	}

	public function setidproveedor(int $idproveedor) {
		$this->idproveedor = $idproveedor;
	}
	
	public function getproveedor() : proveedor {
		return $this->proveedor;
	}

	public function setproveedor(proveedor $proveedor) {
		$this->proveedor = $proveedor;
	}
		
	public function getproveedorLogic() : proveedor_logic {		
		return $this->proveedorLogic;
	}

	public function setproveedorLogic(proveedor_logic $proveedorLogic) {
		$this->proveedorLogic = $proveedorLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getproveedorsModel() {		
		try {						
			/*proveedorsModel.setWrappedData(proveedorLogic->getproveedors());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->proveedorsModel;
	}
	
	public function setproveedorsModel($proveedorsModel) {
		$this->proveedorsModel = $proveedorsModel;
	}
	
	public function getproveedors() : array {		
		return $this->proveedors;
	}
	
	public function setproveedors(array $proveedors) {
		$this->proveedors= $proveedors;
	}
	
	public function getproveedorsEliminados() : array {		
		return $this->proveedorsEliminados;
	}
	
	public function setproveedorsEliminados(array $proveedorsEliminados) {
		$this->proveedorsEliminados= $proveedorsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getproveedorActualFromListDataModel() {
		try {
			/*$proveedorClase= $this->proveedorsModel->getRowData();*/
			
			/*return $proveedor;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
