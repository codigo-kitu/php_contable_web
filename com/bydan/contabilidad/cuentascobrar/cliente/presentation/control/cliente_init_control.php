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

namespace com\bydan\contabilidad\cuentascobrar\cliente\presentation\control;

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

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/util/cliente_carga.php');
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;

use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_param_return;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\tipo_persona\business\entity\tipo_persona;
use com\bydan\contabilidad\general\tipo_persona\business\logic\tipo_persona_logic;
use com\bydan\contabilidad\general\tipo_persona\util\tipo_persona_carga;
use com\bydan\contabilidad\general\tipo_persona\util\tipo_persona_util;

use com\bydan\contabilidad\cuentascobrar\categoria_cliente\business\entity\categoria_cliente;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\business\logic\categoria_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\util\categoria_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\util\categoria_cliente_util;

use com\bydan\contabilidad\inventario\tipo_precio\business\entity\tipo_precio;
use com\bydan\contabilidad\inventario\tipo_precio\business\logic\tipo_precio_logic;
use com\bydan\contabilidad\inventario\tipo_precio\util\tipo_precio_carga;
use com\bydan\contabilidad\inventario\tipo_precio\util\tipo_precio_util;

use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\business\entity\giro_negocio_cliente;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\business\logic\giro_negocio_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\util\giro_negocio_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\util\giro_negocio_cliente_util;

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

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

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


use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;
use com\bydan\contabilidad\facturacion\devolucion_factura\presentation\session\devolucion_factura_session;

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\presentation\session\cuenta_cobrar_session;

use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_util;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\presentation\session\documento_cliente_session;

use com\bydan\contabilidad\estimados\estimado\util\estimado_carga;
use com\bydan\contabilidad\estimados\estimado\util\estimado_util;
use com\bydan\contabilidad\estimados\estimado\presentation\session\estimado_session;

use com\bydan\contabilidad\cuentascobrar\imagen_cliente\util\imagen_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\util\imagen_cliente_util;
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\presentation\session\imagen_cliente_session;

use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;
use com\bydan\contabilidad\facturacion\factura\presentation\session\factura_session;

use com\bydan\contabilidad\estimados\consignacion\util\consignacion_carga;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;
use com\bydan\contabilidad\estimados\consignacion\presentation\session\consignacion_session;

use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_carga;
use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_util;
use com\bydan\contabilidad\inventario\lista_cliente\presentation\session\lista_cliente_session;


/*CARGA ARCHIVOS FRAMEWORK*/
cliente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class cliente_init_control extends ControllerBase {	
	
	public $clienteClase=null;	
	public $clientesModel=null;	
	public $clientesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcliente=0;	
	public ?int $idclienteActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $clienteLogic=null;
	
	public $clienteActual=null;	
	
	public $cliente=null;
	public $clientes=null;
	public $clientesEliminados=array();
	public $clientesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $clientesLocal=array();
	public ?array $clientesReporte=null;
	public ?array $clientesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcliente='onload';
	public string $strTipoPaginaAuxiliarcliente='none';
	public string $strTipoUsuarioAuxiliarcliente='none';
		
	public $clienteReturnGeneral=null;
	public $clienteParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $clienteModel=null;
	public $clienteControllerAdditional=null;
	
	
	

	public $documentocuentacobrarLogic=null;

	public function  getdocumento_cuenta_cobrarLogic() {
		return $this->documentocuentacobrarLogic;
	}

	public function setdocumento_cuenta_cobrarLogic($documentocuentacobrarLogic) {
		$this->documentocuentacobrarLogic =$documentocuentacobrarLogic;
	}


	public $devolucionfacturaLogic=null;

	public function  getdevolucion_facturaLogic() {
		return $this->devolucionfacturaLogic;
	}

	public function setdevolucion_facturaLogic($devolucionfacturaLogic) {
		$this->devolucionfacturaLogic =$devolucionfacturaLogic;
	}


	public $kardexLogic=null;

	public function  getkardexLogic() {
		return $this->kardexLogic;
	}

	public function setkardexLogic($kardexLogic) {
		$this->kardexLogic =$kardexLogic;
	}


	public $imagenclienteLogic=null;

	public function  getimagen_clienteLogic() {
		return $this->imagenclienteLogic;
	}

	public function setimagen_clienteLogic($imagenclienteLogic) {
		$this->imagenclienteLogic =$imagenclienteLogic;
	}


	public $documentoclienteLogic=null;

	public function  getdocumento_clienteLogic() {
		return $this->documentoclienteLogic;
	}

	public function setdocumento_clienteLogic($documentoclienteLogic) {
		$this->documentoclienteLogic =$documentoclienteLogic;
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


	public $cuentacobrarLogic=null;

	public function  getcuenta_cobrarLogic() {
		return $this->cuentacobrarLogic;
	}

	public function setcuenta_cobrarLogic($cuentacobrarLogic) {
		$this->cuentacobrarLogic =$cuentacobrarLogic;
	}


	public $facturamodeloLogic=null;

	public function  getfactura_modeloLogic() {
		return $this->facturamodeloLogic;
	}

	public function setfactura_modeloLogic($facturamodeloLogic) {
		$this->facturamodeloLogic =$facturamodeloLogic;
	}


	public $facturaLogic=null;

	public function  getfacturaLogic() {
		return $this->facturaLogic;
	}

	public function setfacturaLogic($facturaLogic) {
		$this->facturaLogic =$facturaLogic;
	}


	public $chequecuentacorrienteLogic=null;

	public function  getcheque_cuenta_corrienteLogic() {
		return $this->chequecuentacorrienteLogic;
	}

	public function setcheque_cuenta_corrienteLogic($chequecuentacorrienteLogic) {
		$this->chequecuentacorrienteLogic =$chequecuentacorrienteLogic;
	}


	public $facturaloteLogic=null;

	public function  getfactura_loteLogic() {
		return $this->facturaloteLogic;
	}

	public function setfactura_loteLogic($facturaloteLogic) {
		$this->facturaloteLogic =$facturaloteLogic;
	}


	public $consignacionLogic=null;

	public function  getconsignacionLogic() {
		return $this->consignacionLogic;
	}

	public function setconsignacionLogic($consignacionLogic) {
		$this->consignacionLogic =$consignacionLogic;
	}


	public $listaclienteLogic=null;

	public function  getlista_clienteLogic() {
		return $this->listaclienteLogic;
	}

	public function setlista_clienteLogic($listaclienteLogic) {
		$this->listaclienteLogic =$listaclienteLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_tipo_persona='';
	public string $strMensajeid_categoria_cliente='';
	public string $strMensajeid_tipo_precio='';
	public string $strMensajeid_giro_negocio_cliente='';
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
	public string $strMensajeid_termino_pago_cliente='';
	public string $strMensajeid_cuenta='';
	public string $strMensajefacturar_con='';
	public string $strMensajeaplica_impuesto_ventas='';
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
	
	
	public string $strVisibleFK_Idcategoria_cliente='display:table-row';
	public string $strVisibleFK_Idciudad='display:table-row';
	public string $strVisibleFK_Idcuenta='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idgiro_negocio='display:table-row';
	public string $strVisibleFK_Idimpuesto='display:table-row';
	public string $strVisibleFK_Idotro_impuesto='display:table-row';
	public string $strVisibleFK_Idpais='display:table-row';
	public string $strVisibleFK_Idprovincia='display:table-row';
	public string $strVisibleFK_Idretencion='display:table-row';
	public string $strVisibleFK_Idretencion_fuente='display:table-row';
	public string $strVisibleFK_Idretencion_ica='display:table-row';
	public string $strVisibleFK_Idtermino_pago='display:table-row';
	public string $strVisibleFK_Idtipo_persona='display:table-row';
	public string $strVisibleFK_Idtipo_precio='display:table-row';
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

	public array $categoria_clientesFK=array();

	public function getcategoria_clientesFK():array {
		return $this->categoria_clientesFK;
	}

	public function setcategoria_clientesFK(array $categoria_clientesFK) {
		$this->categoria_clientesFK = $categoria_clientesFK;
	}

	public int $idcategoria_clienteDefaultFK=-1;

	public function getIdcategoria_clienteDefaultFK():int {
		return $this->idcategoria_clienteDefaultFK;
	}

	public function setIdcategoria_clienteDefaultFK(int $idcategoria_clienteDefaultFK) {
		$this->idcategoria_clienteDefaultFK = $idcategoria_clienteDefaultFK;
	}

	public array $tipo_preciosFK=array();

	public function gettipo_preciosFK():array {
		return $this->tipo_preciosFK;
	}

	public function settipo_preciosFK(array $tipo_preciosFK) {
		$this->tipo_preciosFK = $tipo_preciosFK;
	}

	public int $idtipo_precioDefaultFK=-1;

	public function getIdtipo_precioDefaultFK():int {
		return $this->idtipo_precioDefaultFK;
	}

	public function setIdtipo_precioDefaultFK(int $idtipo_precioDefaultFK) {
		$this->idtipo_precioDefaultFK = $idtipo_precioDefaultFK;
	}

	public array $giro_negocio_clientesFK=array();

	public function getgiro_negocio_clientesFK():array {
		return $this->giro_negocio_clientesFK;
	}

	public function setgiro_negocio_clientesFK(array $giro_negocio_clientesFK) {
		$this->giro_negocio_clientesFK = $giro_negocio_clientesFK;
	}

	public int $idgiro_negocio_clienteDefaultFK=-1;

	public function getIdgiro_negocio_clienteDefaultFK():int {
		return $this->idgiro_negocio_clienteDefaultFK;
	}

	public function setIdgiro_negocio_clienteDefaultFK(int $idgiro_negocio_clienteDefaultFK) {
		$this->idgiro_negocio_clienteDefaultFK = $idgiro_negocio_clienteDefaultFK;
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

	public array $termino_pago_clientesFK=array();

	public function gettermino_pago_clientesFK():array {
		return $this->termino_pago_clientesFK;
	}

	public function settermino_pago_clientesFK(array $termino_pago_clientesFK) {
		$this->termino_pago_clientesFK = $termino_pago_clientesFK;
	}

	public int $idtermino_pago_clienteDefaultFK=-1;

	public function getIdtermino_pago_clienteDefaultFK():int {
		return $this->idtermino_pago_clienteDefaultFK;
	}

	public function setIdtermino_pago_clienteDefaultFK(int $idtermino_pago_clienteDefaultFK) {
		$this->idtermino_pago_clienteDefaultFK = $idtermino_pago_clienteDefaultFK;
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

	
	
	
	
	
	
	public $strTienePermisosdocumento_cuenta_cobrar='none';
	public $strTienePermisosdevolucion_factura='none';
	public $strTienePermisoskardex='none';
	public $strTienePermisosimagen_cliente='none';
	public $strTienePermisosdocumento_cliente='none';
	public $strTienePermisoscuenta_corriente_detalle='none';
	public $strTienePermisosestimado='none';
	public $strTienePermisoscuenta_cobrar='none';
	public $strTienePermisosfactura_modelo='none';
	public $strTienePermisosfactura='none';
	public $strTienePermisoscheque_cuenta_corriente='none';
	public $strTienePermisosfactura_lote='none';
	public $strTienePermisosconsignacion='none';
	public $strTienePermisoslista_cliente='none';
	
	
	public  $id_categoria_clienteFK_Idcategoria_cliente=null;

	public  $id_ciudadFK_Idciudad=null;

	public  $id_cuentaFK_Idcuenta=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_giro_negocio_clienteFK_Idgiro_negocio=null;

	public  $id_impuestoFK_Idimpuesto=null;

	public  $id_otro_impuestoFK_Idotro_impuesto=null;

	public  $id_paisFK_Idpais=null;

	public  $id_provinciaFK_Idprovincia=null;

	public  $id_retencionFK_Idretencion=null;

	public  $id_retencion_fuenteFK_Idretencion_fuente=null;

	public  $id_retencion_icaFK_Idretencion_ica=null;

	public  $id_termino_pago_clienteFK_Idtermino_pago=null;

	public  $id_tipo_personaFK_Idtipo_persona=null;

	public  $id_tipo_precioFK_Idtipo_precio=null;

	public  $id_vendedorFK_Idvendedor=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->clienteLogic==null) {
				$this->clienteLogic=new cliente_logic();
			}
			
		} else {
			if($this->clienteLogic==null) {
				$this->clienteLogic=new cliente_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->clienteClase==null) {
				$this->clienteClase=new cliente();
			}
			
			$this->clienteClase->setId(0);	
				
				
			$this->clienteClase->setid_empresa(-1);	
			$this->clienteClase->setid_tipo_persona(-1);	
			$this->clienteClase->setid_categoria_cliente(-1);	
			$this->clienteClase->setid_tipo_precio(-1);	
			$this->clienteClase->setid_giro_negocio_cliente(-1);	
			$this->clienteClase->setcodigo('');	
			$this->clienteClase->setruc('');	
			$this->clienteClase->setprimer_apellido('');	
			$this->clienteClase->setsegundo_apellido('');	
			$this->clienteClase->setprimer_nombre('');	
			$this->clienteClase->setsegundo_nombre('');	
			$this->clienteClase->setnombre_completo('');	
			$this->clienteClase->setdireccion('');	
			$this->clienteClase->settelefono('');	
			$this->clienteClase->settelefono_movil('');	
			$this->clienteClase->sete_mail('');	
			$this->clienteClase->sete_mail2('');	
			$this->clienteClase->setcomentario('');	
			$this->clienteClase->setimagen('');	
			$this->clienteClase->setactivo(true);	
			$this->clienteClase->setid_pais(-1);	
			$this->clienteClase->setid_provincia(-1);	
			$this->clienteClase->setid_ciudad(-1);	
			$this->clienteClase->setcodigo_postal('');	
			$this->clienteClase->setfax('');	
			$this->clienteClase->setcontacto('');	
			$this->clienteClase->setid_vendedor(-1);	
			$this->clienteClase->setmaximo_credito(0.0);	
			$this->clienteClase->setmaximo_descuento(0.0);	
			$this->clienteClase->setinteres_anual(0.0);	
			$this->clienteClase->setbalance(0.0);	
			$this->clienteClase->setid_termino_pago_cliente(-1);	
			$this->clienteClase->setid_cuenta(null);	
			$this->clienteClase->setfacturar_con(0);	
			$this->clienteClase->setaplica_impuesto_ventas(false);	
			$this->clienteClase->setid_impuesto(-1);	
			$this->clienteClase->setaplica_retencion_impuesto(false);	
			$this->clienteClase->setid_retencion(null);	
			$this->clienteClase->setaplica_retencion_fuente(false);	
			$this->clienteClase->setid_retencion_fuente(null);	
			$this->clienteClase->setaplica_retencion_ica(false);	
			$this->clienteClase->setid_retencion_ica(null);	
			$this->clienteClase->setaplica_2do_impuesto(false);	
			$this->clienteClase->setid_otro_impuesto(null);	
			$this->clienteClase->setcreado(date('Y-m-d'));	
			$this->clienteClase->setmonto_ultima_transaccion(0.0);	
			$this->clienteClase->setfecha_ultima_transaccion(date('Y-m-d'));	
			$this->clienteClase->setdescripcion_ultima_transaccion('');	
			
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
		$this->prepararEjecutarMantenimientoBase('cliente');
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
		$this->cargarParametrosReporteBase('cliente');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('cliente');
	}
	
	public function actualizarControllerConReturnGeneral(cliente_param_return $clienteReturnGeneral) {
		if($clienteReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesclientesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$clienteReturnGeneral->getsMensajeProceso();
		}
		
		if($clienteReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$clienteReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($clienteReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$clienteReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$clienteReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($clienteReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($clienteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$clienteReturnGeneral->getsFuncionJs();
		}
		
		if($clienteReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(cliente_session $cliente_session){
		$this->strStyleDivArbol=$cliente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cliente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cliente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cliente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cliente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cliente_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$cliente_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(cliente_session $cliente_session){
		$cliente_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$cliente_session->strStyleDivHeader='display:none';			
		$cliente_session->strStyleDivContent='width:93%;height:100%';	
		$cliente_session->strStyleDivOpcionesBanner='display:none';	
		$cliente_session->strStyleDivExpandirColapsar='display:none';	
		$cliente_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(cliente_control $cliente_control_session){
		$this->idNuevo=$cliente_control_session->idNuevo;
		$this->clienteActual=$cliente_control_session->clienteActual;
		$this->cliente=$cliente_control_session->cliente;
		$this->clienteClase=$cliente_control_session->clienteClase;
		$this->clientes=$cliente_control_session->clientes;
		$this->clientesEliminados=$cliente_control_session->clientesEliminados;
		$this->cliente=$cliente_control_session->cliente;
		$this->clientesReporte=$cliente_control_session->clientesReporte;
		$this->clientesSeleccionados=$cliente_control_session->clientesSeleccionados;
		$this->arrOrderBy=$cliente_control_session->arrOrderBy;
		$this->arrOrderByRel=$cliente_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$cliente_control_session->arrHistoryWebs;
		$this->arrSessionBases=$cliente_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcliente=$cliente_control_session->strTypeOnLoadcliente;
		$this->strTipoPaginaAuxiliarcliente=$cliente_control_session->strTipoPaginaAuxiliarcliente;
		$this->strTipoUsuarioAuxiliarcliente=$cliente_control_session->strTipoUsuarioAuxiliarcliente;	
		
		$this->bitEsPopup=$cliente_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$cliente_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$cliente_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$cliente_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$cliente_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$cliente_control_session->strSufijo;
		$this->bitEsRelaciones=$cliente_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$cliente_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$cliente_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$cliente_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$cliente_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$cliente_control_session->strTituloTabla;
		$this->strTituloPathPagina=$cliente_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$cliente_control_session->strTituloPathElementoActual;
		
		if($this->clienteLogic==null) {			
			$this->clienteLogic=new cliente_logic();
		}
		
		
		if($this->clienteClase==null) {
			$this->clienteClase=new cliente();	
		}
		
		$this->clienteLogic->setcliente($this->clienteClase);
		
		
		if($this->clientes==null) {
			$this->clientes=array();	
		}
		
		$this->clienteLogic->setclientes($this->clientes);
		
		
		$this->strTipoView=$cliente_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$cliente_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$cliente_control_session->datosCliente;
		$this->strAccionBusqueda=$cliente_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$cliente_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$cliente_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$cliente_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$cliente_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$cliente_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$cliente_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$cliente_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$cliente_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$cliente_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$cliente_control_session->strTipoPaginacion;
		$this->strTipoAccion=$cliente_control_session->strTipoAccion;
		$this->tiposReportes=$cliente_control_session->tiposReportes;
		$this->tiposReporte=$cliente_control_session->tiposReporte;
		$this->tiposAcciones=$cliente_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$cliente_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$cliente_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$cliente_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$cliente_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$cliente_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$cliente_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$cliente_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$cliente_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$cliente_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$cliente_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$cliente_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$cliente_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$cliente_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$cliente_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$cliente_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$cliente_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$cliente_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$cliente_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$cliente_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$cliente_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$cliente_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$cliente_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$cliente_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$cliente_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$cliente_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$cliente_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$cliente_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$cliente_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$cliente_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$cliente_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$cliente_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$cliente_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$cliente_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$cliente_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$cliente_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$cliente_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$cliente_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$cliente_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$cliente_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$cliente_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$cliente_control_session->resumenUsuarioActual;	
		$this->moduloActual=$cliente_control_session->moduloActual;	
		$this->opcionActual=$cliente_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$cliente_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$cliente_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));
				
		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		$this->strStyleDivArbol=$cliente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cliente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cliente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cliente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cliente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cliente_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$cliente_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$cliente_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$cliente_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$cliente_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$cliente_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$cliente_control_session->strMensajeid_empresa;
		$this->strMensajeid_tipo_persona=$cliente_control_session->strMensajeid_tipo_persona;
		$this->strMensajeid_categoria_cliente=$cliente_control_session->strMensajeid_categoria_cliente;
		$this->strMensajeid_tipo_precio=$cliente_control_session->strMensajeid_tipo_precio;
		$this->strMensajeid_giro_negocio_cliente=$cliente_control_session->strMensajeid_giro_negocio_cliente;
		$this->strMensajecodigo=$cliente_control_session->strMensajecodigo;
		$this->strMensajeruc=$cliente_control_session->strMensajeruc;
		$this->strMensajeprimer_apellido=$cliente_control_session->strMensajeprimer_apellido;
		$this->strMensajesegundo_apellido=$cliente_control_session->strMensajesegundo_apellido;
		$this->strMensajeprimer_nombre=$cliente_control_session->strMensajeprimer_nombre;
		$this->strMensajesegundo_nombre=$cliente_control_session->strMensajesegundo_nombre;
		$this->strMensajenombre_completo=$cliente_control_session->strMensajenombre_completo;
		$this->strMensajedireccion=$cliente_control_session->strMensajedireccion;
		$this->strMensajetelefono=$cliente_control_session->strMensajetelefono;
		$this->strMensajetelefono_movil=$cliente_control_session->strMensajetelefono_movil;
		$this->strMensajee_mail=$cliente_control_session->strMensajee_mail;
		$this->strMensajee_mail2=$cliente_control_session->strMensajee_mail2;
		$this->strMensajecomentario=$cliente_control_session->strMensajecomentario;
		$this->strMensajeimagen=$cliente_control_session->strMensajeimagen;
		$this->strMensajeactivo=$cliente_control_session->strMensajeactivo;
		$this->strMensajeid_pais=$cliente_control_session->strMensajeid_pais;
		$this->strMensajeid_provincia=$cliente_control_session->strMensajeid_provincia;
		$this->strMensajeid_ciudad=$cliente_control_session->strMensajeid_ciudad;
		$this->strMensajecodigo_postal=$cliente_control_session->strMensajecodigo_postal;
		$this->strMensajefax=$cliente_control_session->strMensajefax;
		$this->strMensajecontacto=$cliente_control_session->strMensajecontacto;
		$this->strMensajeid_vendedor=$cliente_control_session->strMensajeid_vendedor;
		$this->strMensajemaximo_credito=$cliente_control_session->strMensajemaximo_credito;
		$this->strMensajemaximo_descuento=$cliente_control_session->strMensajemaximo_descuento;
		$this->strMensajeinteres_anual=$cliente_control_session->strMensajeinteres_anual;
		$this->strMensajebalance=$cliente_control_session->strMensajebalance;
		$this->strMensajeid_termino_pago_cliente=$cliente_control_session->strMensajeid_termino_pago_cliente;
		$this->strMensajeid_cuenta=$cliente_control_session->strMensajeid_cuenta;
		$this->strMensajefacturar_con=$cliente_control_session->strMensajefacturar_con;
		$this->strMensajeaplica_impuesto_ventas=$cliente_control_session->strMensajeaplica_impuesto_ventas;
		$this->strMensajeid_impuesto=$cliente_control_session->strMensajeid_impuesto;
		$this->strMensajeaplica_retencion_impuesto=$cliente_control_session->strMensajeaplica_retencion_impuesto;
		$this->strMensajeid_retencion=$cliente_control_session->strMensajeid_retencion;
		$this->strMensajeaplica_retencion_fuente=$cliente_control_session->strMensajeaplica_retencion_fuente;
		$this->strMensajeid_retencion_fuente=$cliente_control_session->strMensajeid_retencion_fuente;
		$this->strMensajeaplica_retencion_ica=$cliente_control_session->strMensajeaplica_retencion_ica;
		$this->strMensajeid_retencion_ica=$cliente_control_session->strMensajeid_retencion_ica;
		$this->strMensajeaplica_2do_impuesto=$cliente_control_session->strMensajeaplica_2do_impuesto;
		$this->strMensajeid_otro_impuesto=$cliente_control_session->strMensajeid_otro_impuesto;
		$this->strMensajecreado=$cliente_control_session->strMensajecreado;
		$this->strMensajemonto_ultima_transaccion=$cliente_control_session->strMensajemonto_ultima_transaccion;
		$this->strMensajefecha_ultima_transaccion=$cliente_control_session->strMensajefecha_ultima_transaccion;
		$this->strMensajedescripcion_ultima_transaccion=$cliente_control_session->strMensajedescripcion_ultima_transaccion;
			
		
		$this->empresasFK=$cliente_control_session->empresasFK;
		$this->idempresaDefaultFK=$cliente_control_session->idempresaDefaultFK;
		$this->tipo_personasFK=$cliente_control_session->tipo_personasFK;
		$this->idtipo_personaDefaultFK=$cliente_control_session->idtipo_personaDefaultFK;
		$this->categoria_clientesFK=$cliente_control_session->categoria_clientesFK;
		$this->idcategoria_clienteDefaultFK=$cliente_control_session->idcategoria_clienteDefaultFK;
		$this->tipo_preciosFK=$cliente_control_session->tipo_preciosFK;
		$this->idtipo_precioDefaultFK=$cliente_control_session->idtipo_precioDefaultFK;
		$this->giro_negocio_clientesFK=$cliente_control_session->giro_negocio_clientesFK;
		$this->idgiro_negocio_clienteDefaultFK=$cliente_control_session->idgiro_negocio_clienteDefaultFK;
		$this->paissFK=$cliente_control_session->paissFK;
		$this->idpaisDefaultFK=$cliente_control_session->idpaisDefaultFK;
		$this->provinciasFK=$cliente_control_session->provinciasFK;
		$this->idprovinciaDefaultFK=$cliente_control_session->idprovinciaDefaultFK;
		$this->ciudadsFK=$cliente_control_session->ciudadsFK;
		$this->idciudadDefaultFK=$cliente_control_session->idciudadDefaultFK;
		$this->vendedorsFK=$cliente_control_session->vendedorsFK;
		$this->idvendedorDefaultFK=$cliente_control_session->idvendedorDefaultFK;
		$this->termino_pago_clientesFK=$cliente_control_session->termino_pago_clientesFK;
		$this->idtermino_pago_clienteDefaultFK=$cliente_control_session->idtermino_pago_clienteDefaultFK;
		$this->cuentasFK=$cliente_control_session->cuentasFK;
		$this->idcuentaDefaultFK=$cliente_control_session->idcuentaDefaultFK;
		$this->impuestosFK=$cliente_control_session->impuestosFK;
		$this->idimpuestoDefaultFK=$cliente_control_session->idimpuestoDefaultFK;
		$this->retencionsFK=$cliente_control_session->retencionsFK;
		$this->idretencionDefaultFK=$cliente_control_session->idretencionDefaultFK;
		$this->retencion_fuentesFK=$cliente_control_session->retencion_fuentesFK;
		$this->idretencion_fuenteDefaultFK=$cliente_control_session->idretencion_fuenteDefaultFK;
		$this->retencion_icasFK=$cliente_control_session->retencion_icasFK;
		$this->idretencion_icaDefaultFK=$cliente_control_session->idretencion_icaDefaultFK;
		$this->otro_impuestosFK=$cliente_control_session->otro_impuestosFK;
		$this->idotro_impuestoDefaultFK=$cliente_control_session->idotro_impuestoDefaultFK;
		
		
		$this->strVisibleFK_Idcategoria_cliente=$cliente_control_session->strVisibleFK_Idcategoria_cliente;
		$this->strVisibleFK_Idciudad=$cliente_control_session->strVisibleFK_Idciudad;
		$this->strVisibleFK_Idcuenta=$cliente_control_session->strVisibleFK_Idcuenta;
		$this->strVisibleFK_Idempresa=$cliente_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idgiro_negocio=$cliente_control_session->strVisibleFK_Idgiro_negocio;
		$this->strVisibleFK_Idimpuesto=$cliente_control_session->strVisibleFK_Idimpuesto;
		$this->strVisibleFK_Idotro_impuesto=$cliente_control_session->strVisibleFK_Idotro_impuesto;
		$this->strVisibleFK_Idpais=$cliente_control_session->strVisibleFK_Idpais;
		$this->strVisibleFK_Idprovincia=$cliente_control_session->strVisibleFK_Idprovincia;
		$this->strVisibleFK_Idretencion=$cliente_control_session->strVisibleFK_Idretencion;
		$this->strVisibleFK_Idretencion_fuente=$cliente_control_session->strVisibleFK_Idretencion_fuente;
		$this->strVisibleFK_Idretencion_ica=$cliente_control_session->strVisibleFK_Idretencion_ica;
		$this->strVisibleFK_Idtermino_pago=$cliente_control_session->strVisibleFK_Idtermino_pago;
		$this->strVisibleFK_Idtipo_persona=$cliente_control_session->strVisibleFK_Idtipo_persona;
		$this->strVisibleFK_Idtipo_precio=$cliente_control_session->strVisibleFK_Idtipo_precio;
		$this->strVisibleFK_Idvendedor=$cliente_control_session->strVisibleFK_Idvendedor;
		
		
		$this->strTienePermisosdocumento_cuenta_cobrar=$cliente_control_session->strTienePermisosdocumento_cuenta_cobrar;
		$this->strTienePermisosdevolucion_factura=$cliente_control_session->strTienePermisosdevolucion_factura;
		$this->strTienePermisoskardex=$cliente_control_session->strTienePermisoskardex;
		$this->strTienePermisosimagen_cliente=$cliente_control_session->strTienePermisosimagen_cliente;
		$this->strTienePermisosdocumento_cliente=$cliente_control_session->strTienePermisosdocumento_cliente;
		$this->strTienePermisoscuenta_corriente_detalle=$cliente_control_session->strTienePermisoscuenta_corriente_detalle;
		$this->strTienePermisosestimado=$cliente_control_session->strTienePermisosestimado;
		$this->strTienePermisoscuenta_cobrar=$cliente_control_session->strTienePermisoscuenta_cobrar;
		$this->strTienePermisosfactura_modelo=$cliente_control_session->strTienePermisosfactura_modelo;
		$this->strTienePermisosfactura=$cliente_control_session->strTienePermisosfactura;
		$this->strTienePermisoscheque_cuenta_corriente=$cliente_control_session->strTienePermisoscheque_cuenta_corriente;
		$this->strTienePermisosfactura_lote=$cliente_control_session->strTienePermisosfactura_lote;
		$this->strTienePermisosconsignacion=$cliente_control_session->strTienePermisosconsignacion;
		$this->strTienePermisoslista_cliente=$cliente_control_session->strTienePermisoslista_cliente;
		
		
		$this->id_categoria_clienteFK_Idcategoria_cliente=$cliente_control_session->id_categoria_clienteFK_Idcategoria_cliente;
		$this->id_ciudadFK_Idciudad=$cliente_control_session->id_ciudadFK_Idciudad;
		$this->id_cuentaFK_Idcuenta=$cliente_control_session->id_cuentaFK_Idcuenta;
		$this->id_empresaFK_Idempresa=$cliente_control_session->id_empresaFK_Idempresa;
		$this->id_giro_negocio_clienteFK_Idgiro_negocio=$cliente_control_session->id_giro_negocio_clienteFK_Idgiro_negocio;
		$this->id_impuestoFK_Idimpuesto=$cliente_control_session->id_impuestoFK_Idimpuesto;
		$this->id_otro_impuestoFK_Idotro_impuesto=$cliente_control_session->id_otro_impuestoFK_Idotro_impuesto;
		$this->id_paisFK_Idpais=$cliente_control_session->id_paisFK_Idpais;
		$this->id_provinciaFK_Idprovincia=$cliente_control_session->id_provinciaFK_Idprovincia;
		$this->id_retencionFK_Idretencion=$cliente_control_session->id_retencionFK_Idretencion;
		$this->id_retencion_fuenteFK_Idretencion_fuente=$cliente_control_session->id_retencion_fuenteFK_Idretencion_fuente;
		$this->id_retencion_icaFK_Idretencion_ica=$cliente_control_session->id_retencion_icaFK_Idretencion_ica;
		$this->id_termino_pago_clienteFK_Idtermino_pago=$cliente_control_session->id_termino_pago_clienteFK_Idtermino_pago;
		$this->id_tipo_personaFK_Idtipo_persona=$cliente_control_session->id_tipo_personaFK_Idtipo_persona;
		$this->id_tipo_precioFK_Idtipo_precio=$cliente_control_session->id_tipo_precioFK_Idtipo_precio;
		$this->id_vendedorFK_Idvendedor=$cliente_control_session->id_vendedorFK_Idvendedor;

		
		
		
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
	
	public function getclienteControllerAdditional() {
		return $this->clienteControllerAdditional;
	}

	public function setclienteControllerAdditional($clienteControllerAdditional) {
		$this->clienteControllerAdditional = $clienteControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getclienteActual() : cliente {
		return $this->clienteActual;
	}

	public function setclienteActual(cliente $clienteActual) {
		$this->clienteActual = $clienteActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcliente() : int {
		return $this->idcliente;
	}

	public function setidcliente(int $idcliente) {
		$this->idcliente = $idcliente;
	}
	
	public function getcliente() : cliente {
		return $this->cliente;
	}

	public function setcliente(cliente $cliente) {
		$this->cliente = $cliente;
	}
		
	public function getclienteLogic() : cliente_logic {		
		return $this->clienteLogic;
	}

	public function setclienteLogic(cliente_logic $clienteLogic) {
		$this->clienteLogic = $clienteLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getclientesModel() {		
		try {						
			/*clientesModel.setWrappedData(clienteLogic->getclientes());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->clientesModel;
	}
	
	public function setclientesModel($clientesModel) {
		$this->clientesModel = $clientesModel;
	}
	
	public function getclientes() : array {		
		return $this->clientes;
	}
	
	public function setclientes(array $clientes) {
		$this->clientes= $clientes;
	}
	
	public function getclientesEliminados() : array {		
		return $this->clientesEliminados;
	}
	
	public function setclientesEliminados(array $clientesEliminados) {
		$this->clientesEliminados= $clientesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getclienteActualFromListDataModel() {
		try {
			/*$clienteClase= $this->clientesModel->getRowData();*/
			
			/*return $cliente;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
