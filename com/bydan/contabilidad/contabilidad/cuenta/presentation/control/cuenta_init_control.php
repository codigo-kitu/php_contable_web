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
	


class cuenta_init_control extends ControllerBase {	
	
	public $cuentaClase=null;	
	public $cuentasModel=null;	
	public $cuentasListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcuenta=0;	
	public ?int $idcuentaActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $cuentaLogic=null;
	
	public $cuentaActual=null;	
	
	public $cuenta=null;
	public $cuentas=null;
	public $cuentasEliminados=array();
	public $cuentasAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $cuentasLocal=array();
	public ?array $cuentasReporte=null;
	public ?array $cuentasSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcuenta='onload';
	public string $strTipoPaginaAuxiliarcuenta='none';
	public string $strTipoUsuarioAuxiliarcuenta='none';
		
	public $cuentaReturnGeneral=null;
	public $cuentaParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $cuentaModel=null;
	public $cuentaControllerAdditional=null;
	
	
	

	public $categoriachequeLogic=null;

	public function  getcategoria_chequeLogic() {
		return $this->categoriachequeLogic;
	}

	public function setcategoria_chequeLogic($categoriachequeLogic) {
		$this->categoriachequeLogic =$categoriachequeLogic;
	}


	public $otroimpuestoLogic=null;

	public function  getotro_impuestoLogic() {
		return $this->otroimpuestoLogic;
	}

	public function setotro_impuestoLogic($otroimpuestoLogic) {
		$this->otroimpuestoLogic =$otroimpuestoLogic;
	}


	public $impuestoLogic=null;

	public function  getimpuestoLogic() {
		return $this->impuestoLogic;
	}

	public function setimpuestoLogic($impuestoLogic) {
		$this->impuestoLogic =$impuestoLogic;
	}


	public $cuentacorrienteLogic=null;

	public function  getcuenta_corrienteLogic() {
		return $this->cuentacorrienteLogic;
	}

	public function setcuenta_corrienteLogic($cuentacorrienteLogic) {
		$this->cuentacorrienteLogic =$cuentacorrienteLogic;
	}


	public $productoLogic=null;

	public function  getproductoLogic() {
		return $this->productoLogic;
	}

	public function setproductoLogic($productoLogic) {
		$this->productoLogic =$productoLogic;
	}


	public $instrumentopagoLogic=null;

	public function  getinstrumento_pagoLogic() {
		return $this->instrumentopagoLogic;
	}

	public function setinstrumento_pagoLogic($instrumentopagoLogic) {
		$this->instrumentopagoLogic =$instrumentopagoLogic;
	}


	public $listaproductoLogic=null;

	public function  getlista_productoLogic() {
		return $this->listaproductoLogic;
	}

	public function setlista_productoLogic($listaproductoLogic) {
		$this->listaproductoLogic =$listaproductoLogic;
	}


	public $asientodetalleLogic=null;

	public function  getasiento_detalleLogic() {
		return $this->asientodetalleLogic;
	}

	public function setasiento_detalleLogic($asientodetalleLogic) {
		$this->asientodetalleLogic =$asientodetalleLogic;
	}


	public $retencionLogic=null;

	public function  getretencionLogic() {
		return $this->retencionLogic;
	}

	public function setretencionLogic($retencionLogic) {
		$this->retencionLogic =$retencionLogic;
	}


	public $retencionfuenteLogic=null;

	public function  getretencion_fuenteLogic() {
		return $this->retencionfuenteLogic;
	}

	public function setretencion_fuenteLogic($retencionfuenteLogic) {
		$this->retencionfuenteLogic =$retencionfuenteLogic;
	}


	public $proveedorLogic=null;

	public function  getproveedorLogic() {
		return $this->proveedorLogic;
	}

	public function setproveedorLogic($proveedorLogic) {
		$this->proveedorLogic =$proveedorLogic;
	}


	public $formapagoclienteLogic=null;

	public function  getforma_pago_clienteLogic() {
		return $this->formapagoclienteLogic;
	}

	public function setforma_pago_clienteLogic($formapagoclienteLogic) {
		$this->formapagoclienteLogic =$formapagoclienteLogic;
	}


	public $saldocuentaLogic=null;

	public function  getsaldo_cuentaLogic() {
		return $this->saldocuentaLogic;
	}

	public function setsaldo_cuentaLogic($saldocuentaLogic) {
		$this->saldocuentaLogic =$saldocuentaLogic;
	}


	public $terminopagoproveedorLogic=null;

	public function  gettermino_pago_proveedorLogic() {
		return $this->terminopagoproveedorLogic;
	}

	public function settermino_pago_proveedorLogic($terminopagoproveedorLogic) {
		$this->terminopagoproveedorLogic =$terminopagoproveedorLogic;
	}


	public $retencionicaLogic=null;

	public function  getretencion_icaLogic() {
		return $this->retencionicaLogic;
	}

	public function setretencion_icaLogic($retencionicaLogic) {
		$this->retencionicaLogic =$retencionicaLogic;
	}


	public $asientopredefinidodetalleLogic=null;

	public function  getasiento_predefinido_detalleLogic() {
		return $this->asientopredefinidodetalleLogic;
	}

	public function setasiento_predefinido_detalleLogic($asientopredefinidodetalleLogic) {
		$this->asientopredefinidodetalleLogic =$asientopredefinidodetalleLogic;
	}


	public $clienteLogic=null;

	public function  getclienteLogic() {
		return $this->clienteLogic;
	}

	public function setclienteLogic($clienteLogic) {
		$this->clienteLogic =$clienteLogic;
	}


	public $asientoautomaticodetalleLogic=null;

	public function  getasiento_automatico_detalleLogic() {
		return $this->asientoautomaticodetalleLogic;
	}

	public function setasiento_automatico_detalleLogic($asientoautomaticodetalleLogic) {
		$this->asientoautomaticodetalleLogic =$asientoautomaticodetalleLogic;
	}


	public $formapagoproveedorLogic=null;

	public function  getforma_pago_proveedorLogic() {
		return $this->formapagoproveedorLogic;
	}

	public function setforma_pago_proveedorLogic($formapagoproveedorLogic) {
		$this->formapagoproveedorLogic =$formapagoproveedorLogic;
	}


	public $terminopagoclienteLogic=null;

	public function  gettermino_pago_clienteLogic() {
		return $this->terminopagoclienteLogic;
	}

	public function settermino_pago_clienteLogic($terminopagoclienteLogic) {
		$this->terminopagoclienteLogic =$terminopagoclienteLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_tipo_cuenta='';
	public string $strMensajeid_tipo_nivel_cuenta='';
	public string $strMensajeid_cuenta='';
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	public string $strMensajenivel_cuenta='';
	public string $strMensajeusa_monto_base='';
	public string $strMensajemonto_base='';
	public string $strMensajeporcentaje_base='';
	public string $strMensajecon_centro_costos='';
	public string $strMensajecon_ruc='';
	public string $strMensajebalance='';
	public string $strMensajedescripcion='';
	public string $strMensajecon_retencion='';
	public string $strMensajevalor_retencion='';
	public string $strMensajeultima_transaccion='';
	
	
	public string $strVisibleFK_Idcuenta='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idtipo_cuenta='display:table-row';
	public string $strVisibleFK_Idtipo_nivel_cuenta='display:table-row';

	
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

	public array $tipo_cuentasFK=array();

	public function gettipo_cuentasFK():array {
		return $this->tipo_cuentasFK;
	}

	public function settipo_cuentasFK(array $tipo_cuentasFK) {
		$this->tipo_cuentasFK = $tipo_cuentasFK;
	}

	public int $idtipo_cuentaDefaultFK=-1;

	public function getIdtipo_cuentaDefaultFK():int {
		return $this->idtipo_cuentaDefaultFK;
	}

	public function setIdtipo_cuentaDefaultFK(int $idtipo_cuentaDefaultFK) {
		$this->idtipo_cuentaDefaultFK = $idtipo_cuentaDefaultFK;
	}

	public array $tipo_nivel_cuentasFK=array();

	public function gettipo_nivel_cuentasFK():array {
		return $this->tipo_nivel_cuentasFK;
	}

	public function settipo_nivel_cuentasFK(array $tipo_nivel_cuentasFK) {
		$this->tipo_nivel_cuentasFK = $tipo_nivel_cuentasFK;
	}

	public int $idtipo_nivel_cuentaDefaultFK=-1;

	public function getIdtipo_nivel_cuentaDefaultFK():int {
		return $this->idtipo_nivel_cuentaDefaultFK;
	}

	public function setIdtipo_nivel_cuentaDefaultFK(int $idtipo_nivel_cuentaDefaultFK) {
		$this->idtipo_nivel_cuentaDefaultFK = $idtipo_nivel_cuentaDefaultFK;
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

	
	
	
	
	
	
	public $strTienePermisoscategoria_cheque='none';
	public $strTienePermisosotro_impuesto='none';
	public $strTienePermisosimpuesto='none';
	public $strTienePermisoscuenta_corriente='none';
	public $strTienePermisosproducto='none';
	public $strTienePermisosinstrumento_pago='none';
	public $strTienePermisoslista_producto='none';
	public $strTienePermisosasiento_detalle='none';
	public $strTienePermisosretencion='none';
	public $strTienePermisosretencion_fuente='none';
	public $strTienePermisoscuenta='none';
	public $strTienePermisosproveedor='none';
	public $strTienePermisosforma_pago_cliente='none';
	public $strTienePermisossaldo_cuenta='none';
	public $strTienePermisostermino_pago_proveedor='none';
	public $strTienePermisosretencion_ica='none';
	public $strTienePermisosasiento_predefinido_detalle='none';
	public $strTienePermisoscliente='none';
	public $strTienePermisosasiento_automatico_detalle='none';
	public $strTienePermisosforma_pago_proveedor='none';
	public $strTienePermisostermino_pago_cliente='none';
	
	
	public  $id_cuentaFK_Idcuenta=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_tipo_cuentaFK_Idtipo_cuenta=null;

	public  $id_tipo_nivel_cuentaFK_Idtipo_nivel_cuenta=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->cuentaLogic==null) {
				$this->cuentaLogic=new cuenta_logic();
			}
			
		} else {
			if($this->cuentaLogic==null) {
				$this->cuentaLogic=new cuenta_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->cuentaClase==null) {
				$this->cuentaClase=new cuenta();
			}
			
			$this->cuentaClase->setId(0);	
				
				
			$this->cuentaClase->setid_empresa(-1);	
			$this->cuentaClase->setid_tipo_cuenta(-1);	
			$this->cuentaClase->setid_tipo_nivel_cuenta(-1);	
			$this->cuentaClase->setid_cuenta(null);	
			$this->cuentaClase->setcodigo('');	
			$this->cuentaClase->setnombre('');	
			$this->cuentaClase->setnivel_cuenta(0);	
			$this->cuentaClase->setusa_monto_base(false);	
			$this->cuentaClase->setmonto_base(0.0);	
			$this->cuentaClase->setporcentaje_base(0.0);	
			$this->cuentaClase->setcon_centro_costos(false);	
			$this->cuentaClase->setcon_ruc(false);	
			$this->cuentaClase->setbalance(0.0);	
			$this->cuentaClase->setdescripcion('');	
			$this->cuentaClase->setcon_retencion(false);	
			$this->cuentaClase->setvalor_retencion(0.0);	
			$this->cuentaClase->setultima_transaccion(date('Y-m-d'));	
			
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
		$this->prepararEjecutarMantenimientoBase('cuenta');
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
		$this->cargarParametrosReporteBase('cuenta');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('cuenta');
	}
	
	public function actualizarControllerConReturnGeneral(cuenta_param_return $cuentaReturnGeneral) {
		if($cuentaReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescuentasAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$cuentaReturnGeneral->getsMensajeProceso();
		}
		
		if($cuentaReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$cuentaReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($cuentaReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$cuentaReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$cuentaReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($cuentaReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($cuentaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$cuentaReturnGeneral->getsFuncionJs();
		}
		
		if($cuentaReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(cuenta_session $cuenta_session){
		$this->strStyleDivArbol=$cuenta_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cuenta_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cuenta_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cuenta_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cuenta_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cuenta_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$cuenta_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(cuenta_session $cuenta_session){
		$cuenta_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$cuenta_session->strStyleDivHeader='display:none';			
		$cuenta_session->strStyleDivContent='width:93%;height:100%';	
		$cuenta_session->strStyleDivOpcionesBanner='display:none';	
		$cuenta_session->strStyleDivExpandirColapsar='display:none';	
		$cuenta_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(cuenta_control $cuenta_control_session){
		$this->idNuevo=$cuenta_control_session->idNuevo;
		$this->cuentaActual=$cuenta_control_session->cuentaActual;
		$this->cuenta=$cuenta_control_session->cuenta;
		$this->cuentaClase=$cuenta_control_session->cuentaClase;
		$this->cuentas=$cuenta_control_session->cuentas;
		$this->cuentasEliminados=$cuenta_control_session->cuentasEliminados;
		$this->cuenta=$cuenta_control_session->cuenta;
		$this->cuentasReporte=$cuenta_control_session->cuentasReporte;
		$this->cuentasSeleccionados=$cuenta_control_session->cuentasSeleccionados;
		$this->arrOrderBy=$cuenta_control_session->arrOrderBy;
		$this->arrOrderByRel=$cuenta_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$cuenta_control_session->arrHistoryWebs;
		$this->arrSessionBases=$cuenta_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcuenta=$cuenta_control_session->strTypeOnLoadcuenta;
		$this->strTipoPaginaAuxiliarcuenta=$cuenta_control_session->strTipoPaginaAuxiliarcuenta;
		$this->strTipoUsuarioAuxiliarcuenta=$cuenta_control_session->strTipoUsuarioAuxiliarcuenta;	
		
		$this->bitEsPopup=$cuenta_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$cuenta_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$cuenta_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$cuenta_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$cuenta_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$cuenta_control_session->strSufijo;
		$this->bitEsRelaciones=$cuenta_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$cuenta_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$cuenta_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$cuenta_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$cuenta_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$cuenta_control_session->strTituloTabla;
		$this->strTituloPathPagina=$cuenta_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$cuenta_control_session->strTituloPathElementoActual;
		
		if($this->cuentaLogic==null) {			
			$this->cuentaLogic=new cuenta_logic();
		}
		
		
		if($this->cuentaClase==null) {
			$this->cuentaClase=new cuenta();	
		}
		
		$this->cuentaLogic->setcuenta($this->cuentaClase);
		
		
		if($this->cuentas==null) {
			$this->cuentas=array();	
		}
		
		$this->cuentaLogic->setcuentas($this->cuentas);
		
		
		$this->strTipoView=$cuenta_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$cuenta_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$cuenta_control_session->datosCliente;
		$this->strAccionBusqueda=$cuenta_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$cuenta_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$cuenta_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$cuenta_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$cuenta_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$cuenta_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$cuenta_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$cuenta_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$cuenta_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$cuenta_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$cuenta_control_session->strTipoPaginacion;
		$this->strTipoAccion=$cuenta_control_session->strTipoAccion;
		$this->tiposReportes=$cuenta_control_session->tiposReportes;
		$this->tiposReporte=$cuenta_control_session->tiposReporte;
		$this->tiposAcciones=$cuenta_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$cuenta_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$cuenta_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$cuenta_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$cuenta_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$cuenta_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$cuenta_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$cuenta_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$cuenta_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$cuenta_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$cuenta_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$cuenta_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$cuenta_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$cuenta_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$cuenta_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$cuenta_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$cuenta_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$cuenta_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$cuenta_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$cuenta_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$cuenta_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$cuenta_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$cuenta_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$cuenta_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$cuenta_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$cuenta_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$cuenta_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$cuenta_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$cuenta_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$cuenta_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$cuenta_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$cuenta_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$cuenta_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$cuenta_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$cuenta_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$cuenta_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$cuenta_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$cuenta_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$cuenta_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$cuenta_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$cuenta_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$cuenta_control_session->resumenUsuarioActual;	
		$this->moduloActual=$cuenta_control_session->moduloActual;	
		$this->opcionActual=$cuenta_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$cuenta_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$cuenta_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));
				
		if($cuenta_session==null) {
			$cuenta_session=new cuenta_session();
		}
		
		$this->strStyleDivArbol=$cuenta_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cuenta_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cuenta_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cuenta_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cuenta_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cuenta_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$cuenta_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$cuenta_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$cuenta_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$cuenta_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$cuenta_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$cuenta_control_session->strMensajeid_empresa;
		$this->strMensajeid_tipo_cuenta=$cuenta_control_session->strMensajeid_tipo_cuenta;
		$this->strMensajeid_tipo_nivel_cuenta=$cuenta_control_session->strMensajeid_tipo_nivel_cuenta;
		$this->strMensajeid_cuenta=$cuenta_control_session->strMensajeid_cuenta;
		$this->strMensajecodigo=$cuenta_control_session->strMensajecodigo;
		$this->strMensajenombre=$cuenta_control_session->strMensajenombre;
		$this->strMensajenivel_cuenta=$cuenta_control_session->strMensajenivel_cuenta;
		$this->strMensajeusa_monto_base=$cuenta_control_session->strMensajeusa_monto_base;
		$this->strMensajemonto_base=$cuenta_control_session->strMensajemonto_base;
		$this->strMensajeporcentaje_base=$cuenta_control_session->strMensajeporcentaje_base;
		$this->strMensajecon_centro_costos=$cuenta_control_session->strMensajecon_centro_costos;
		$this->strMensajecon_ruc=$cuenta_control_session->strMensajecon_ruc;
		$this->strMensajebalance=$cuenta_control_session->strMensajebalance;
		$this->strMensajedescripcion=$cuenta_control_session->strMensajedescripcion;
		$this->strMensajecon_retencion=$cuenta_control_session->strMensajecon_retencion;
		$this->strMensajevalor_retencion=$cuenta_control_session->strMensajevalor_retencion;
		$this->strMensajeultima_transaccion=$cuenta_control_session->strMensajeultima_transaccion;
			
		
		$this->empresasFK=$cuenta_control_session->empresasFK;
		$this->idempresaDefaultFK=$cuenta_control_session->idempresaDefaultFK;
		$this->tipo_cuentasFK=$cuenta_control_session->tipo_cuentasFK;
		$this->idtipo_cuentaDefaultFK=$cuenta_control_session->idtipo_cuentaDefaultFK;
		$this->tipo_nivel_cuentasFK=$cuenta_control_session->tipo_nivel_cuentasFK;
		$this->idtipo_nivel_cuentaDefaultFK=$cuenta_control_session->idtipo_nivel_cuentaDefaultFK;
		$this->cuentasFK=$cuenta_control_session->cuentasFK;
		$this->idcuentaDefaultFK=$cuenta_control_session->idcuentaDefaultFK;
		
		
		$this->strVisibleFK_Idcuenta=$cuenta_control_session->strVisibleFK_Idcuenta;
		$this->strVisibleFK_Idempresa=$cuenta_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idtipo_cuenta=$cuenta_control_session->strVisibleFK_Idtipo_cuenta;
		$this->strVisibleFK_Idtipo_nivel_cuenta=$cuenta_control_session->strVisibleFK_Idtipo_nivel_cuenta;
		
		
		$this->strTienePermisoscategoria_cheque=$cuenta_control_session->strTienePermisoscategoria_cheque;
		$this->strTienePermisosotro_impuesto=$cuenta_control_session->strTienePermisosotro_impuesto;
		$this->strTienePermisosimpuesto=$cuenta_control_session->strTienePermisosimpuesto;
		$this->strTienePermisoscuenta_corriente=$cuenta_control_session->strTienePermisoscuenta_corriente;
		$this->strTienePermisosproducto=$cuenta_control_session->strTienePermisosproducto;
		$this->strTienePermisosinstrumento_pago=$cuenta_control_session->strTienePermisosinstrumento_pago;
		$this->strTienePermisoslista_producto=$cuenta_control_session->strTienePermisoslista_producto;
		$this->strTienePermisosasiento_detalle=$cuenta_control_session->strTienePermisosasiento_detalle;
		$this->strTienePermisosretencion=$cuenta_control_session->strTienePermisosretencion;
		$this->strTienePermisosretencion_fuente=$cuenta_control_session->strTienePermisosretencion_fuente;
		$this->strTienePermisoscuenta=$cuenta_control_session->strTienePermisoscuenta;
		$this->strTienePermisosproveedor=$cuenta_control_session->strTienePermisosproveedor;
		$this->strTienePermisosforma_pago_cliente=$cuenta_control_session->strTienePermisosforma_pago_cliente;
		$this->strTienePermisossaldo_cuenta=$cuenta_control_session->strTienePermisossaldo_cuenta;
		$this->strTienePermisostermino_pago_proveedor=$cuenta_control_session->strTienePermisostermino_pago_proveedor;
		$this->strTienePermisosretencion_ica=$cuenta_control_session->strTienePermisosretencion_ica;
		$this->strTienePermisosasiento_predefinido_detalle=$cuenta_control_session->strTienePermisosasiento_predefinido_detalle;
		$this->strTienePermisoscliente=$cuenta_control_session->strTienePermisoscliente;
		$this->strTienePermisosasiento_automatico_detalle=$cuenta_control_session->strTienePermisosasiento_automatico_detalle;
		$this->strTienePermisosforma_pago_proveedor=$cuenta_control_session->strTienePermisosforma_pago_proveedor;
		$this->strTienePermisostermino_pago_cliente=$cuenta_control_session->strTienePermisostermino_pago_cliente;
		
		
		$this->id_cuentaFK_Idcuenta=$cuenta_control_session->id_cuentaFK_Idcuenta;
		$this->id_empresaFK_Idempresa=$cuenta_control_session->id_empresaFK_Idempresa;
		$this->id_tipo_cuentaFK_Idtipo_cuenta=$cuenta_control_session->id_tipo_cuentaFK_Idtipo_cuenta;
		$this->id_tipo_nivel_cuentaFK_Idtipo_nivel_cuenta=$cuenta_control_session->id_tipo_nivel_cuentaFK_Idtipo_nivel_cuenta;

		
		
		
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
	
	public function getcuentaControllerAdditional() {
		return $this->cuentaControllerAdditional;
	}

	public function setcuentaControllerAdditional($cuentaControllerAdditional) {
		$this->cuentaControllerAdditional = $cuentaControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcuentaActual() : cuenta {
		return $this->cuentaActual;
	}

	public function setcuentaActual(cuenta $cuentaActual) {
		$this->cuentaActual = $cuentaActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcuenta() : int {
		return $this->idcuenta;
	}

	public function setidcuenta(int $idcuenta) {
		$this->idcuenta = $idcuenta;
	}
	
	public function getcuenta() : cuenta {
		return $this->cuenta;
	}

	public function setcuenta(cuenta $cuenta) {
		$this->cuenta = $cuenta;
	}
		
	public function getcuentaLogic() : cuenta_logic {		
		return $this->cuentaLogic;
	}

	public function setcuentaLogic(cuenta_logic $cuentaLogic) {
		$this->cuentaLogic = $cuentaLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcuentasModel() {		
		try {						
			/*cuentasModel.setWrappedData(cuentaLogic->getcuentas());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->cuentasModel;
	}
	
	public function setcuentasModel($cuentasModel) {
		$this->cuentasModel = $cuentasModel;
	}
	
	public function getcuentas() : array {		
		return $this->cuentas;
	}
	
	public function setcuentas(array $cuentas) {
		$this->cuentas= $cuentas;
	}
	
	public function getcuentasEliminados() : array {		
		return $this->cuentasEliminados;
	}
	
	public function setcuentasEliminados(array $cuentasEliminados) {
		$this->cuentasEliminados= $cuentasEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcuentaActualFromListDataModel() {
		try {
			/*$cuentaClase= $this->cuentasModel->getRowData();*/
			
			/*return $cuenta;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
