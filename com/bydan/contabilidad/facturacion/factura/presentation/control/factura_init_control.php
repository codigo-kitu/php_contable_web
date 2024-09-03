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

namespace com\bydan\contabilidad\facturacion\factura\presentation\control;

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

use com\bydan\contabilidad\facturacion\factura\business\entity\factura;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/factura/util/factura_carga.php');
use com\bydan\contabilidad\facturacion\factura\util\factura_carga;

use com\bydan\contabilidad\facturacion\factura\util\factura_util;
use com\bydan\contabilidad\facturacion\factura\util\factura_param_return;
use com\bydan\contabilidad\facturacion\factura\business\logic\factura_logic;
use com\bydan\contabilidad\facturacion\factura\presentation\session\factura_session;


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

use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;
use com\bydan\contabilidad\contabilidad\moneda\business\logic\moneda_logic;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_carga;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_util;

use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\business\logic\vendedor_logic;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_carga;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

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


use com\bydan\contabilidad\facturacion\factura_detalle\util\factura_detalle_carga;
use com\bydan\contabilidad\facturacion\factura_detalle\util\factura_detalle_util;
use com\bydan\contabilidad\facturacion\factura_detalle\presentation\session\factura_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
factura_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
factura_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
factura_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*factura_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class factura_init_control extends ControllerBase {	
	
	public $facturaClase=null;	
	public $facturasModel=null;	
	public $facturasListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idfactura=0;	
	public ?int $idfacturaActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $facturaLogic=null;
	
	public $facturaActual=null;	
	
	public $factura=null;
	public $facturas=null;
	public $facturasEliminados=array();
	public $facturasAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $facturasLocal=array();
	public ?array $facturasReporte=null;
	public ?array $facturasSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadfactura='onload';
	public string $strTipoPaginaAuxiliarfactura='none';
	public string $strTipoUsuarioAuxiliarfactura='none';
		
	public $facturaReturnGeneral=null;
	public $facturaParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $facturaModel=null;
	public $facturaControllerAdditional=null;
	
	
	

	public $facturadetalleLogic=null;

	public function  getfactura_detalleLogic() {
		return $this->facturadetalleLogic;
	}

	public function setfactura_detalleLogic($facturadetalleLogic) {
		$this->facturadetalleLogic =$facturadetalleLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajenumero='';
	public string $strMensajeid_cliente='';
	public string $strMensajeruc='';
	public string $strMensajereferencia_cliente='';
	public string $strMensajefecha_emision='';
	public string $strMensajeid_moneda='';
	public string $strMensajeid_vendedor='';
	public string $strMensajeid_termino_pago_cliente='';
	public string $strMensajefecha_vence='';
	public string $strMensajeid_estado='';
	public string $strMensajedireccion='';
	public string $strMensajeenviar_a='';
	public string $strMensajeobservacion='';
	public string $strMensajeimpuesto_en_precio='';
	public string $strMensajesub_total='';
	public string $strMensajedescuento_monto='';
	public string $strMensajedescuento_porciento='';
	public string $strMensajeiva_monto='';
	public string $strMensajeiva_porciento='';
	public string $strMensajeretencion_fuente_monto='';
	public string $strMensajeretencion_fuente_porciento='';
	public string $strMensajeretencion_iva_monto='';
	public string $strMensajeretencion_iva_porciento='';
	public string $strMensajetotal='';
	public string $strMensajehora='';
	public string $strMensajecotizacion='';
	public string $strMensajeotro_monto='';
	public string $strMensajeotro_porciento='';
	public string $strMensajeretencion_ica_porciento='';
	public string $strMensajeretencion_ica_monto='';
	public string $strMensajeid_asiento='';
	public string $strMensajeid_documento_cuenta_cobrar='';
	public string $strMensajeid_kardex='';
	
	
	public string $strVisibleFK_Idasiento='display:table-row';
	public string $strVisibleFK_Idcliente='display:table-row';
	public string $strVisibleFK_Iddocumento_cuenta_cobrar='display:table-row';
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idestado='display:table-row';
	public string $strVisibleFK_Idkardex='display:table-row';
	public string $strVisibleFK_Idmoneda='display:table-row';
	public string $strVisibleFK_Idperiodo='display:table-row';
	public string $strVisibleFK_Idsucursal='display:table-row';
	public string $strVisibleFK_Idtermino_pago='display:table-row';
	public string $strVisibleFK_Idusuario='display:table-row';
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

	public array $sucursalsFK=array();

	public function getsucursalsFK():array {
		return $this->sucursalsFK;
	}

	public function setsucursalsFK(array $sucursalsFK) {
		$this->sucursalsFK = $sucursalsFK;
	}

	public int $idsucursalDefaultFK=-1;

	public function getIdsucursalDefaultFK():int {
		return $this->idsucursalDefaultFK;
	}

	public function setIdsucursalDefaultFK(int $idsucursalDefaultFK) {
		$this->idsucursalDefaultFK = $idsucursalDefaultFK;
	}

	public array $ejerciciosFK=array();

	public function getejerciciosFK():array {
		return $this->ejerciciosFK;
	}

	public function setejerciciosFK(array $ejerciciosFK) {
		$this->ejerciciosFK = $ejerciciosFK;
	}

	public int $idejercicioDefaultFK=-1;

	public function getIdejercicioDefaultFK():int {
		return $this->idejercicioDefaultFK;
	}

	public function setIdejercicioDefaultFK(int $idejercicioDefaultFK) {
		$this->idejercicioDefaultFK = $idejercicioDefaultFK;
	}

	public array $periodosFK=array();

	public function getperiodosFK():array {
		return $this->periodosFK;
	}

	public function setperiodosFK(array $periodosFK) {
		$this->periodosFK = $periodosFK;
	}

	public int $idperiodoDefaultFK=-1;

	public function getIdperiodoDefaultFK():int {
		return $this->idperiodoDefaultFK;
	}

	public function setIdperiodoDefaultFK(int $idperiodoDefaultFK) {
		$this->idperiodoDefaultFK = $idperiodoDefaultFK;
	}

	public array $usuariosFK=array();

	public function getusuariosFK():array {
		return $this->usuariosFK;
	}

	public function setusuariosFK(array $usuariosFK) {
		$this->usuariosFK = $usuariosFK;
	}

	public int $idusuarioDefaultFK=-1;

	public function getIdusuarioDefaultFK():int {
		return $this->idusuarioDefaultFK;
	}

	public function setIdusuarioDefaultFK(int $idusuarioDefaultFK) {
		$this->idusuarioDefaultFK = $idusuarioDefaultFK;
	}

	public array $clientesFK=array();

	public function getclientesFK():array {
		return $this->clientesFK;
	}

	public function setclientesFK(array $clientesFK) {
		$this->clientesFK = $clientesFK;
	}

	public int $idclienteDefaultFK=-1;

	public function getIdclienteDefaultFK():int {
		return $this->idclienteDefaultFK;
	}

	public function setIdclienteDefaultFK(int $idclienteDefaultFK) {
		$this->idclienteDefaultFK = $idclienteDefaultFK;
	}

	public array $monedasFK=array();

	public function getmonedasFK():array {
		return $this->monedasFK;
	}

	public function setmonedasFK(array $monedasFK) {
		$this->monedasFK = $monedasFK;
	}

	public int $idmonedaDefaultFK=-1;

	public function getIdmonedaDefaultFK():int {
		return $this->idmonedaDefaultFK;
	}

	public function setIdmonedaDefaultFK(int $idmonedaDefaultFK) {
		$this->idmonedaDefaultFK = $idmonedaDefaultFK;
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

	public array $estadosFK=array();

	public function getestadosFK():array {
		return $this->estadosFK;
	}

	public function setestadosFK(array $estadosFK) {
		$this->estadosFK = $estadosFK;
	}

	public int $idestadoDefaultFK=-1;

	public function getIdestadoDefaultFK():int {
		return $this->idestadoDefaultFK;
	}

	public function setIdestadoDefaultFK(int $idestadoDefaultFK) {
		$this->idestadoDefaultFK = $idestadoDefaultFK;
	}

	public array $asientosFK=array();

	public function getasientosFK():array {
		return $this->asientosFK;
	}

	public function setasientosFK(array $asientosFK) {
		$this->asientosFK = $asientosFK;
	}

	public int $idasientoDefaultFK=-1;

	public function getIdasientoDefaultFK():int {
		return $this->idasientoDefaultFK;
	}

	public function setIdasientoDefaultFK(int $idasientoDefaultFK) {
		$this->idasientoDefaultFK = $idasientoDefaultFK;
	}

	public array $documento_cuenta_cobrarsFK=array();

	public function getdocumento_cuenta_cobrarsFK():array {
		return $this->documento_cuenta_cobrarsFK;
	}

	public function setdocumento_cuenta_cobrarsFK(array $documento_cuenta_cobrarsFK) {
		$this->documento_cuenta_cobrarsFK = $documento_cuenta_cobrarsFK;
	}

	public int $iddocumento_cuenta_cobrarDefaultFK=-1;

	public function getIddocumento_cuenta_cobrarDefaultFK():int {
		return $this->iddocumento_cuenta_cobrarDefaultFK;
	}

	public function setIddocumento_cuenta_cobrarDefaultFK(int $iddocumento_cuenta_cobrarDefaultFK) {
		$this->iddocumento_cuenta_cobrarDefaultFK = $iddocumento_cuenta_cobrarDefaultFK;
	}

	public array $kardexsFK=array();

	public function getkardexsFK():array {
		return $this->kardexsFK;
	}

	public function setkardexsFK(array $kardexsFK) {
		$this->kardexsFK = $kardexsFK;
	}

	public int $idkardexDefaultFK=-1;

	public function getIdkardexDefaultFK():int {
		return $this->idkardexDefaultFK;
	}

	public function setIdkardexDefaultFK(int $idkardexDefaultFK) {
		$this->idkardexDefaultFK = $idkardexDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisosfactura_detalle='none';
	
	
	public  $id_asientoFK_Idasiento=null;

	public  $id_clienteFK_Idcliente=null;

	public  $id_documento_cuenta_cobrarFK_Iddocumento_cuenta_cobrar=null;

	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_estadoFK_Idestado=null;

	public  $id_kardexFK_Idkardex=null;

	public  $id_monedaFK_Idmoneda=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_sucursalFK_Idsucursal=null;

	public  $id_termino_pago_clienteFK_Idtermino_pago=null;

	public  $id_usuarioFK_Idusuario=null;

	public  $id_vendedorFK_Idvendedor=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->facturaLogic==null) {
				$this->facturaLogic=new factura_logic();
			}
			
		} else {
			if($this->facturaLogic==null) {
				$this->facturaLogic=new factura_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->facturaClase==null) {
				$this->facturaClase=new factura();
			}
			
			$this->facturaClase->setId(0);	
				
				
			$this->facturaClase->setid_empresa(-1);	
			$this->facturaClase->setid_sucursal(-1);	
			$this->facturaClase->setid_ejercicio(-1);	
			$this->facturaClase->setid_periodo(-1);	
			$this->facturaClase->setid_usuario(-1);	
			$this->facturaClase->setnumero('');	
			$this->facturaClase->setid_cliente(-1);	
			$this->facturaClase->setruc('');	
			$this->facturaClase->setreferencia_cliente('');	
			$this->facturaClase->setfecha_emision(date('Y-m-d'));	
			$this->facturaClase->setid_moneda(-1);	
			$this->facturaClase->setid_vendedor(-1);	
			$this->facturaClase->setid_termino_pago_cliente(-1);	
			$this->facturaClase->setfecha_vence(date('Y-m-d'));	
			$this->facturaClase->setid_estado(-1);	
			$this->facturaClase->setdireccion('');	
			$this->facturaClase->setenviar_a('');	
			$this->facturaClase->setobservacion('');	
			$this->facturaClase->setimpuesto_en_precio(false);	
			$this->facturaClase->setsub_total(0.0);	
			$this->facturaClase->setdescuento_monto(0.0);	
			$this->facturaClase->setdescuento_porciento(0.0);	
			$this->facturaClase->setiva_monto(0.0);	
			$this->facturaClase->setiva_porciento(0.0);	
			$this->facturaClase->setretencion_fuente_monto(0.0);	
			$this->facturaClase->setretencion_fuente_porciento(0.0);	
			$this->facturaClase->setretencion_iva_monto(0.0);	
			$this->facturaClase->setretencion_iva_porciento(0.0);	
			$this->facturaClase->settotal(0.0);	
			$this->facturaClase->sethora(date('Y-m-d'));	
			$this->facturaClase->setcotizacion(0.0);	
			$this->facturaClase->setotro_monto(0.0);	
			$this->facturaClase->setotro_porciento(0.0);	
			$this->facturaClase->setretencion_ica_porciento(0.0);	
			$this->facturaClase->setretencion_ica_monto(0.0);	
			$this->facturaClase->setid_asiento(null);	
			$this->facturaClase->setid_documento_cuenta_cobrar(null);	
			$this->facturaClase->setid_kardex(null);	
			
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
		$this->prepararEjecutarMantenimientoBase('factura');
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
		$this->cargarParametrosReporteBase('factura');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('factura');
	}
	
	public function actualizarControllerConReturnGeneral(factura_param_return $facturaReturnGeneral) {
		if($facturaReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesfacturasAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$facturaReturnGeneral->getsMensajeProceso();
		}
		
		if($facturaReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$facturaReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($facturaReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$facturaReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$facturaReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($facturaReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($facturaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$facturaReturnGeneral->getsFuncionJs();
		}
		
		if($facturaReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(factura_session $factura_session){
		$this->strStyleDivArbol=$factura_session->strStyleDivArbol;	
		$this->strStyleDivContent=$factura_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$factura_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$factura_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$factura_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$factura_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$factura_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(factura_session $factura_session){
		$factura_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$factura_session->strStyleDivHeader='display:none';			
		$factura_session->strStyleDivContent='width:93%;height:100%';	
		$factura_session->strStyleDivOpcionesBanner='display:none';	
		$factura_session->strStyleDivExpandirColapsar='display:none';	
		$factura_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(factura_control $factura_control_session){
		$this->idNuevo=$factura_control_session->idNuevo;
		$this->facturaActual=$factura_control_session->facturaActual;
		$this->factura=$factura_control_session->factura;
		$this->facturaClase=$factura_control_session->facturaClase;
		$this->facturas=$factura_control_session->facturas;
		$this->facturasEliminados=$factura_control_session->facturasEliminados;
		$this->factura=$factura_control_session->factura;
		$this->facturasReporte=$factura_control_session->facturasReporte;
		$this->facturasSeleccionados=$factura_control_session->facturasSeleccionados;
		$this->arrOrderBy=$factura_control_session->arrOrderBy;
		$this->arrOrderByRel=$factura_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$factura_control_session->arrHistoryWebs;
		$this->arrSessionBases=$factura_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadfactura=$factura_control_session->strTypeOnLoadfactura;
		$this->strTipoPaginaAuxiliarfactura=$factura_control_session->strTipoPaginaAuxiliarfactura;
		$this->strTipoUsuarioAuxiliarfactura=$factura_control_session->strTipoUsuarioAuxiliarfactura;	
		
		$this->bitEsPopup=$factura_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$factura_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$factura_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$factura_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$factura_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$factura_control_session->strSufijo;
		$this->bitEsRelaciones=$factura_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$factura_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$factura_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$factura_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$factura_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$factura_control_session->strTituloTabla;
		$this->strTituloPathPagina=$factura_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$factura_control_session->strTituloPathElementoActual;
		
		if($this->facturaLogic==null) {			
			$this->facturaLogic=new factura_logic();
		}
		
		
		if($this->facturaClase==null) {
			$this->facturaClase=new factura();	
		}
		
		$this->facturaLogic->setfactura($this->facturaClase);
		
		
		if($this->facturas==null) {
			$this->facturas=array();	
		}
		
		$this->facturaLogic->setfacturas($this->facturas);
		
		
		$this->strTipoView=$factura_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$factura_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$factura_control_session->datosCliente;
		$this->strAccionBusqueda=$factura_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$factura_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$factura_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$factura_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$factura_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$factura_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$factura_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$factura_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$factura_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$factura_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$factura_control_session->strTipoPaginacion;
		$this->strTipoAccion=$factura_control_session->strTipoAccion;
		$this->tiposReportes=$factura_control_session->tiposReportes;
		$this->tiposReporte=$factura_control_session->tiposReporte;
		$this->tiposAcciones=$factura_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$factura_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$factura_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$factura_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$factura_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$factura_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$factura_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$factura_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$factura_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$factura_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$factura_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$factura_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$factura_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$factura_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$factura_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$factura_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$factura_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$factura_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$factura_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$factura_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$factura_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$factura_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$factura_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$factura_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$factura_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$factura_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$factura_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$factura_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$factura_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$factura_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$factura_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$factura_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$factura_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$factura_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$factura_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$factura_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$factura_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$factura_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$factura_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$factura_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$factura_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$factura_control_session->resumenUsuarioActual;	
		$this->moduloActual=$factura_control_session->moduloActual;	
		$this->opcionActual=$factura_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$factura_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$factura_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$factura_session=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME));
				
		if($factura_session==null) {
			$factura_session=new factura_session();
		}
		
		$this->strStyleDivArbol=$factura_session->strStyleDivArbol;	
		$this->strStyleDivContent=$factura_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$factura_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$factura_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$factura_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$factura_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$factura_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$factura_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$factura_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$factura_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$factura_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$factura_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$factura_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$factura_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$factura_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$factura_control_session->strMensajeid_usuario;
		$this->strMensajenumero=$factura_control_session->strMensajenumero;
		$this->strMensajeid_cliente=$factura_control_session->strMensajeid_cliente;
		$this->strMensajeruc=$factura_control_session->strMensajeruc;
		$this->strMensajereferencia_cliente=$factura_control_session->strMensajereferencia_cliente;
		$this->strMensajefecha_emision=$factura_control_session->strMensajefecha_emision;
		$this->strMensajeid_moneda=$factura_control_session->strMensajeid_moneda;
		$this->strMensajeid_vendedor=$factura_control_session->strMensajeid_vendedor;
		$this->strMensajeid_termino_pago_cliente=$factura_control_session->strMensajeid_termino_pago_cliente;
		$this->strMensajefecha_vence=$factura_control_session->strMensajefecha_vence;
		$this->strMensajeid_estado=$factura_control_session->strMensajeid_estado;
		$this->strMensajedireccion=$factura_control_session->strMensajedireccion;
		$this->strMensajeenviar_a=$factura_control_session->strMensajeenviar_a;
		$this->strMensajeobservacion=$factura_control_session->strMensajeobservacion;
		$this->strMensajeimpuesto_en_precio=$factura_control_session->strMensajeimpuesto_en_precio;
		$this->strMensajesub_total=$factura_control_session->strMensajesub_total;
		$this->strMensajedescuento_monto=$factura_control_session->strMensajedescuento_monto;
		$this->strMensajedescuento_porciento=$factura_control_session->strMensajedescuento_porciento;
		$this->strMensajeiva_monto=$factura_control_session->strMensajeiva_monto;
		$this->strMensajeiva_porciento=$factura_control_session->strMensajeiva_porciento;
		$this->strMensajeretencion_fuente_monto=$factura_control_session->strMensajeretencion_fuente_monto;
		$this->strMensajeretencion_fuente_porciento=$factura_control_session->strMensajeretencion_fuente_porciento;
		$this->strMensajeretencion_iva_monto=$factura_control_session->strMensajeretencion_iva_monto;
		$this->strMensajeretencion_iva_porciento=$factura_control_session->strMensajeretencion_iva_porciento;
		$this->strMensajetotal=$factura_control_session->strMensajetotal;
		$this->strMensajehora=$factura_control_session->strMensajehora;
		$this->strMensajecotizacion=$factura_control_session->strMensajecotizacion;
		$this->strMensajeotro_monto=$factura_control_session->strMensajeotro_monto;
		$this->strMensajeotro_porciento=$factura_control_session->strMensajeotro_porciento;
		$this->strMensajeretencion_ica_porciento=$factura_control_session->strMensajeretencion_ica_porciento;
		$this->strMensajeretencion_ica_monto=$factura_control_session->strMensajeretencion_ica_monto;
		$this->strMensajeid_asiento=$factura_control_session->strMensajeid_asiento;
		$this->strMensajeid_documento_cuenta_cobrar=$factura_control_session->strMensajeid_documento_cuenta_cobrar;
		$this->strMensajeid_kardex=$factura_control_session->strMensajeid_kardex;
			
		
		$this->empresasFK=$factura_control_session->empresasFK;
		$this->idempresaDefaultFK=$factura_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$factura_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$factura_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$factura_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$factura_control_session->idejercicioDefaultFK;
		$this->periodosFK=$factura_control_session->periodosFK;
		$this->idperiodoDefaultFK=$factura_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$factura_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$factura_control_session->idusuarioDefaultFK;
		$this->clientesFK=$factura_control_session->clientesFK;
		$this->idclienteDefaultFK=$factura_control_session->idclienteDefaultFK;
		$this->monedasFK=$factura_control_session->monedasFK;
		$this->idmonedaDefaultFK=$factura_control_session->idmonedaDefaultFK;
		$this->vendedorsFK=$factura_control_session->vendedorsFK;
		$this->idvendedorDefaultFK=$factura_control_session->idvendedorDefaultFK;
		$this->termino_pago_clientesFK=$factura_control_session->termino_pago_clientesFK;
		$this->idtermino_pago_clienteDefaultFK=$factura_control_session->idtermino_pago_clienteDefaultFK;
		$this->estadosFK=$factura_control_session->estadosFK;
		$this->idestadoDefaultFK=$factura_control_session->idestadoDefaultFK;
		$this->asientosFK=$factura_control_session->asientosFK;
		$this->idasientoDefaultFK=$factura_control_session->idasientoDefaultFK;
		$this->documento_cuenta_cobrarsFK=$factura_control_session->documento_cuenta_cobrarsFK;
		$this->iddocumento_cuenta_cobrarDefaultFK=$factura_control_session->iddocumento_cuenta_cobrarDefaultFK;
		$this->kardexsFK=$factura_control_session->kardexsFK;
		$this->idkardexDefaultFK=$factura_control_session->idkardexDefaultFK;
		
		
		$this->strVisibleFK_Idasiento=$factura_control_session->strVisibleFK_Idasiento;
		$this->strVisibleFK_Idcliente=$factura_control_session->strVisibleFK_Idcliente;
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$factura_control_session->strVisibleFK_Iddocumento_cuenta_cobrar;
		$this->strVisibleFK_Idejercicio=$factura_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$factura_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idestado=$factura_control_session->strVisibleFK_Idestado;
		$this->strVisibleFK_Idkardex=$factura_control_session->strVisibleFK_Idkardex;
		$this->strVisibleFK_Idmoneda=$factura_control_session->strVisibleFK_Idmoneda;
		$this->strVisibleFK_Idperiodo=$factura_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idsucursal=$factura_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idtermino_pago=$factura_control_session->strVisibleFK_Idtermino_pago;
		$this->strVisibleFK_Idusuario=$factura_control_session->strVisibleFK_Idusuario;
		$this->strVisibleFK_Idvendedor=$factura_control_session->strVisibleFK_Idvendedor;
		
		
		$this->strTienePermisosfactura_detalle=$factura_control_session->strTienePermisosfactura_detalle;
		
		
		$this->id_asientoFK_Idasiento=$factura_control_session->id_asientoFK_Idasiento;
		$this->id_clienteFK_Idcliente=$factura_control_session->id_clienteFK_Idcliente;
		$this->id_documento_cuenta_cobrarFK_Iddocumento_cuenta_cobrar=$factura_control_session->id_documento_cuenta_cobrarFK_Iddocumento_cuenta_cobrar;
		$this->id_ejercicioFK_Idejercicio=$factura_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$factura_control_session->id_empresaFK_Idempresa;
		$this->id_estadoFK_Idestado=$factura_control_session->id_estadoFK_Idestado;
		$this->id_kardexFK_Idkardex=$factura_control_session->id_kardexFK_Idkardex;
		$this->id_monedaFK_Idmoneda=$factura_control_session->id_monedaFK_Idmoneda;
		$this->id_periodoFK_Idperiodo=$factura_control_session->id_periodoFK_Idperiodo;
		$this->id_sucursalFK_Idsucursal=$factura_control_session->id_sucursalFK_Idsucursal;
		$this->id_termino_pago_clienteFK_Idtermino_pago=$factura_control_session->id_termino_pago_clienteFK_Idtermino_pago;
		$this->id_usuarioFK_Idusuario=$factura_control_session->id_usuarioFK_Idusuario;
		$this->id_vendedorFK_Idvendedor=$factura_control_session->id_vendedorFK_Idvendedor;

		
		
		
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
	
	public function getfacturaControllerAdditional() {
		return $this->facturaControllerAdditional;
	}

	public function setfacturaControllerAdditional($facturaControllerAdditional) {
		$this->facturaControllerAdditional = $facturaControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getfacturaActual() : factura {
		return $this->facturaActual;
	}

	public function setfacturaActual(factura $facturaActual) {
		$this->facturaActual = $facturaActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidfactura() : int {
		return $this->idfactura;
	}

	public function setidfactura(int $idfactura) {
		$this->idfactura = $idfactura;
	}
	
	public function getfactura() : factura {
		return $this->factura;
	}

	public function setfactura(factura $factura) {
		$this->factura = $factura;
	}
		
	public function getfacturaLogic() : factura_logic {		
		return $this->facturaLogic;
	}

	public function setfacturaLogic(factura_logic $facturaLogic) {
		$this->facturaLogic = $facturaLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getfacturasModel() {		
		try {						
			/*facturasModel.setWrappedData(facturaLogic->getfacturas());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->facturasModel;
	}
	
	public function setfacturasModel($facturasModel) {
		$this->facturasModel = $facturasModel;
	}
	
	public function getfacturas() : array {		
		return $this->facturas;
	}
	
	public function setfacturas(array $facturas) {
		$this->facturas= $facturas;
	}
	
	public function getfacturasEliminados() : array {		
		return $this->facturasEliminados;
	}
	
	public function setfacturasEliminados(array $facturasEliminados) {
		$this->facturasEliminados= $facturasEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getfacturaActualFromListDataModel() {
		try {
			/*$facturaClase= $this->facturasModel->getRowData();*/
			
			/*return $factura;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
