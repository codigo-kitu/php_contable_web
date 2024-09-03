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

namespace com\bydan\contabilidad\estimados\consignacion\presentation\control;

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

use com\bydan\contabilidad\estimados\consignacion\business\entity\consignacion;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/consignacion/util/consignacion_carga.php');
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_carga;

use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_param_return;
use com\bydan\contabilidad\estimados\consignacion\business\logic\consignacion_logic;
use com\bydan\contabilidad\estimados\consignacion\presentation\session\consignacion_session;


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

use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;
use com\bydan\contabilidad\inventario\kardex\business\logic\kardex_logic;
use com\bydan\contabilidad\inventario\kardex\util\kardex_carga;
use com\bydan\contabilidad\inventario\kardex\util\kardex_util;

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

//REL


use com\bydan\contabilidad\estimados\imagen_consignacion\util\imagen_consignacion_carga;
use com\bydan\contabilidad\estimados\imagen_consignacion\util\imagen_consignacion_util;
use com\bydan\contabilidad\estimados\imagen_consignacion\presentation\session\imagen_consignacion_session;

use com\bydan\contabilidad\estimados\consignacion_detalle\util\consignacion_detalle_carga;
use com\bydan\contabilidad\estimados\consignacion_detalle\util\consignacion_detalle_util;
use com\bydan\contabilidad\estimados\consignacion_detalle\presentation\session\consignacion_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
consignacion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
consignacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
consignacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
consignacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*consignacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class consignacion_init_control extends ControllerBase {	
	
	public $consignacionClase=null;	
	public $consignacionsModel=null;	
	public $consignacionsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idconsignacion=0;	
	public ?int $idconsignacionActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $consignacionLogic=null;
	
	public $consignacionActual=null;	
	
	public $consignacion=null;
	public $consignacions=null;
	public $consignacionsEliminados=array();
	public $consignacionsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $consignacionsLocal=array();
	public ?array $consignacionsReporte=null;
	public ?array $consignacionsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadconsignacion='onload';
	public string $strTipoPaginaAuxiliarconsignacion='none';
	public string $strTipoUsuarioAuxiliarconsignacion='none';
		
	public $consignacionReturnGeneral=null;
	public $consignacionParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $consignacionModel=null;
	public $consignacionControllerAdditional=null;
	
	
	

	public $imagenconsignacionLogic=null;

	public function  getimagen_consignacionLogic() {
		return $this->imagenconsignacionLogic;
	}

	public function setimagen_consignacionLogic($imagenconsignacionLogic) {
		$this->imagenconsignacionLogic =$imagenconsignacionLogic;
	}


	public $consignaciondetalleLogic=null;

	public function  getconsignacion_detalleLogic() {
		return $this->consignaciondetalleLogic;
	}

	public function setconsignacion_detalleLogic($consignaciondetalleLogic) {
		$this->consignaciondetalleLogic =$consignaciondetalleLogic;
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
	public string $strMensajeid_vendedor='';
	public string $strMensajeid_termino_pago_cliente='';
	public string $strMensajefecha_vence='';
	public string $strMensajeid_moneda='';
	public string $strMensajecotizacion='';
	public string $strMensajedireccion='';
	public string $strMensajeenviar_a='';
	public string $strMensajeobservacion='';
	public string $strMensajeimpuesto_en_precio='';
	public string $strMensajegenero_factura='';
	public string $strMensajeid_estado='';
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
	public string $strMensajeotro_monto='';
	public string $strMensajeotro_porciento='';
	public string $strMensajeretencion_ica_porciento='';
	public string $strMensajeretencion_ica_monto='';
	public string $strMensajeid_kardex='';
	public string $strMensajeid_asiento='';
	
	
	public string $strVisibleFK_Idasiento='display:table-row';
	public string $strVisibleFK_Idcliente='display:table-row';
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

	
	
	
	
	
	
	public $strTienePermisosimagen_consignacion='none';
	public $strTienePermisosconsignacion_detalle='none';
	
	
	public  $id_asientoFK_Idasiento=null;

	public  $id_clienteFK_Idcliente=null;

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
			if($this->consignacionLogic==null) {
				$this->consignacionLogic=new consignacion_logic();
			}
			
		} else {
			if($this->consignacionLogic==null) {
				$this->consignacionLogic=new consignacion_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->consignacionClase==null) {
				$this->consignacionClase=new consignacion();
			}
			
			$this->consignacionClase->setId(0);	
				
				
			$this->consignacionClase->setid_empresa(-1);	
			$this->consignacionClase->setid_sucursal(-1);	
			$this->consignacionClase->setid_ejercicio(-1);	
			$this->consignacionClase->setid_periodo(-1);	
			$this->consignacionClase->setid_usuario(-1);	
			$this->consignacionClase->setnumero('');	
			$this->consignacionClase->setid_cliente(-1);	
			$this->consignacionClase->setruc('');	
			$this->consignacionClase->setreferencia_cliente('');	
			$this->consignacionClase->setfecha_emision(date('Y-m-d'));	
			$this->consignacionClase->setid_vendedor(-1);	
			$this->consignacionClase->setid_termino_pago_cliente(-1);	
			$this->consignacionClase->setfecha_vence(date('Y-m-d'));	
			$this->consignacionClase->setid_moneda(-1);	
			$this->consignacionClase->setcotizacion(0.0);	
			$this->consignacionClase->setdireccion('');	
			$this->consignacionClase->setenviar_a('');	
			$this->consignacionClase->setobservacion('');	
			$this->consignacionClase->setimpuesto_en_precio(false);	
			$this->consignacionClase->setgenero_factura(false);	
			$this->consignacionClase->setid_estado(-1);	
			$this->consignacionClase->setsub_total(0.0);	
			$this->consignacionClase->setdescuento_monto(0.0);	
			$this->consignacionClase->setdescuento_porciento(0.0);	
			$this->consignacionClase->setiva_monto(0.0);	
			$this->consignacionClase->setiva_porciento(0.0);	
			$this->consignacionClase->setretencion_fuente_monto(0.0);	
			$this->consignacionClase->setretencion_fuente_porciento(0.0);	
			$this->consignacionClase->setretencion_iva_monto(0.0);	
			$this->consignacionClase->setretencion_iva_porciento(0.0);	
			$this->consignacionClase->settotal(0.0);	
			$this->consignacionClase->setotro_monto(0.0);	
			$this->consignacionClase->setotro_porciento(0.0);	
			$this->consignacionClase->setretencion_ica_porciento(0.0);	
			$this->consignacionClase->setretencion_ica_monto(0.0);	
			$this->consignacionClase->setid_kardex(null);	
			$this->consignacionClase->setid_asiento(null);	
			
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
		$this->prepararEjecutarMantenimientoBase('consignacion');
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
		$this->cargarParametrosReporteBase('consignacion');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('consignacion');
	}
	
	public function actualizarControllerConReturnGeneral(consignacion_param_return $consignacionReturnGeneral) {
		if($consignacionReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesconsignacionsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$consignacionReturnGeneral->getsMensajeProceso();
		}
		
		if($consignacionReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$consignacionReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($consignacionReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$consignacionReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$consignacionReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($consignacionReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($consignacionReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$consignacionReturnGeneral->getsFuncionJs();
		}
		
		if($consignacionReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(consignacion_session $consignacion_session){
		$this->strStyleDivArbol=$consignacion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$consignacion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$consignacion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$consignacion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$consignacion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$consignacion_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$consignacion_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(consignacion_session $consignacion_session){
		$consignacion_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$consignacion_session->strStyleDivHeader='display:none';			
		$consignacion_session->strStyleDivContent='width:93%;height:100%';	
		$consignacion_session->strStyleDivOpcionesBanner='display:none';	
		$consignacion_session->strStyleDivExpandirColapsar='display:none';	
		$consignacion_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(consignacion_control $consignacion_control_session){
		$this->idNuevo=$consignacion_control_session->idNuevo;
		$this->consignacionActual=$consignacion_control_session->consignacionActual;
		$this->consignacion=$consignacion_control_session->consignacion;
		$this->consignacionClase=$consignacion_control_session->consignacionClase;
		$this->consignacions=$consignacion_control_session->consignacions;
		$this->consignacionsEliminados=$consignacion_control_session->consignacionsEliminados;
		$this->consignacion=$consignacion_control_session->consignacion;
		$this->consignacionsReporte=$consignacion_control_session->consignacionsReporte;
		$this->consignacionsSeleccionados=$consignacion_control_session->consignacionsSeleccionados;
		$this->arrOrderBy=$consignacion_control_session->arrOrderBy;
		$this->arrOrderByRel=$consignacion_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$consignacion_control_session->arrHistoryWebs;
		$this->arrSessionBases=$consignacion_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadconsignacion=$consignacion_control_session->strTypeOnLoadconsignacion;
		$this->strTipoPaginaAuxiliarconsignacion=$consignacion_control_session->strTipoPaginaAuxiliarconsignacion;
		$this->strTipoUsuarioAuxiliarconsignacion=$consignacion_control_session->strTipoUsuarioAuxiliarconsignacion;	
		
		$this->bitEsPopup=$consignacion_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$consignacion_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$consignacion_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$consignacion_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$consignacion_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$consignacion_control_session->strSufijo;
		$this->bitEsRelaciones=$consignacion_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$consignacion_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$consignacion_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$consignacion_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$consignacion_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$consignacion_control_session->strTituloTabla;
		$this->strTituloPathPagina=$consignacion_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$consignacion_control_session->strTituloPathElementoActual;
		
		if($this->consignacionLogic==null) {			
			$this->consignacionLogic=new consignacion_logic();
		}
		
		
		if($this->consignacionClase==null) {
			$this->consignacionClase=new consignacion();	
		}
		
		$this->consignacionLogic->setconsignacion($this->consignacionClase);
		
		
		if($this->consignacions==null) {
			$this->consignacions=array();	
		}
		
		$this->consignacionLogic->setconsignacions($this->consignacions);
		
		
		$this->strTipoView=$consignacion_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$consignacion_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$consignacion_control_session->datosCliente;
		$this->strAccionBusqueda=$consignacion_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$consignacion_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$consignacion_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$consignacion_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$consignacion_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$consignacion_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$consignacion_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$consignacion_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$consignacion_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$consignacion_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$consignacion_control_session->strTipoPaginacion;
		$this->strTipoAccion=$consignacion_control_session->strTipoAccion;
		$this->tiposReportes=$consignacion_control_session->tiposReportes;
		$this->tiposReporte=$consignacion_control_session->tiposReporte;
		$this->tiposAcciones=$consignacion_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$consignacion_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$consignacion_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$consignacion_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$consignacion_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$consignacion_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$consignacion_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$consignacion_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$consignacion_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$consignacion_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$consignacion_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$consignacion_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$consignacion_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$consignacion_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$consignacion_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$consignacion_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$consignacion_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$consignacion_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$consignacion_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$consignacion_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$consignacion_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$consignacion_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$consignacion_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$consignacion_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$consignacion_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$consignacion_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$consignacion_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$consignacion_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$consignacion_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$consignacion_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$consignacion_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$consignacion_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$consignacion_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$consignacion_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$consignacion_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$consignacion_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$consignacion_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$consignacion_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$consignacion_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$consignacion_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$consignacion_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$consignacion_control_session->resumenUsuarioActual;	
		$this->moduloActual=$consignacion_control_session->moduloActual;	
		$this->opcionActual=$consignacion_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$consignacion_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$consignacion_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$consignacion_session=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME));
				
		if($consignacion_session==null) {
			$consignacion_session=new consignacion_session();
		}
		
		$this->strStyleDivArbol=$consignacion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$consignacion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$consignacion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$consignacion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$consignacion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$consignacion_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$consignacion_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$consignacion_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$consignacion_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$consignacion_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$consignacion_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$consignacion_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$consignacion_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$consignacion_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$consignacion_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$consignacion_control_session->strMensajeid_usuario;
		$this->strMensajenumero=$consignacion_control_session->strMensajenumero;
		$this->strMensajeid_cliente=$consignacion_control_session->strMensajeid_cliente;
		$this->strMensajeruc=$consignacion_control_session->strMensajeruc;
		$this->strMensajereferencia_cliente=$consignacion_control_session->strMensajereferencia_cliente;
		$this->strMensajefecha_emision=$consignacion_control_session->strMensajefecha_emision;
		$this->strMensajeid_vendedor=$consignacion_control_session->strMensajeid_vendedor;
		$this->strMensajeid_termino_pago_cliente=$consignacion_control_session->strMensajeid_termino_pago_cliente;
		$this->strMensajefecha_vence=$consignacion_control_session->strMensajefecha_vence;
		$this->strMensajeid_moneda=$consignacion_control_session->strMensajeid_moneda;
		$this->strMensajecotizacion=$consignacion_control_session->strMensajecotizacion;
		$this->strMensajedireccion=$consignacion_control_session->strMensajedireccion;
		$this->strMensajeenviar_a=$consignacion_control_session->strMensajeenviar_a;
		$this->strMensajeobservacion=$consignacion_control_session->strMensajeobservacion;
		$this->strMensajeimpuesto_en_precio=$consignacion_control_session->strMensajeimpuesto_en_precio;
		$this->strMensajegenero_factura=$consignacion_control_session->strMensajegenero_factura;
		$this->strMensajeid_estado=$consignacion_control_session->strMensajeid_estado;
		$this->strMensajesub_total=$consignacion_control_session->strMensajesub_total;
		$this->strMensajedescuento_monto=$consignacion_control_session->strMensajedescuento_monto;
		$this->strMensajedescuento_porciento=$consignacion_control_session->strMensajedescuento_porciento;
		$this->strMensajeiva_monto=$consignacion_control_session->strMensajeiva_monto;
		$this->strMensajeiva_porciento=$consignacion_control_session->strMensajeiva_porciento;
		$this->strMensajeretencion_fuente_monto=$consignacion_control_session->strMensajeretencion_fuente_monto;
		$this->strMensajeretencion_fuente_porciento=$consignacion_control_session->strMensajeretencion_fuente_porciento;
		$this->strMensajeretencion_iva_monto=$consignacion_control_session->strMensajeretencion_iva_monto;
		$this->strMensajeretencion_iva_porciento=$consignacion_control_session->strMensajeretencion_iva_porciento;
		$this->strMensajetotal=$consignacion_control_session->strMensajetotal;
		$this->strMensajeotro_monto=$consignacion_control_session->strMensajeotro_monto;
		$this->strMensajeotro_porciento=$consignacion_control_session->strMensajeotro_porciento;
		$this->strMensajeretencion_ica_porciento=$consignacion_control_session->strMensajeretencion_ica_porciento;
		$this->strMensajeretencion_ica_monto=$consignacion_control_session->strMensajeretencion_ica_monto;
		$this->strMensajeid_kardex=$consignacion_control_session->strMensajeid_kardex;
		$this->strMensajeid_asiento=$consignacion_control_session->strMensajeid_asiento;
			
		
		$this->empresasFK=$consignacion_control_session->empresasFK;
		$this->idempresaDefaultFK=$consignacion_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$consignacion_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$consignacion_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$consignacion_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$consignacion_control_session->idejercicioDefaultFK;
		$this->periodosFK=$consignacion_control_session->periodosFK;
		$this->idperiodoDefaultFK=$consignacion_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$consignacion_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$consignacion_control_session->idusuarioDefaultFK;
		$this->clientesFK=$consignacion_control_session->clientesFK;
		$this->idclienteDefaultFK=$consignacion_control_session->idclienteDefaultFK;
		$this->vendedorsFK=$consignacion_control_session->vendedorsFK;
		$this->idvendedorDefaultFK=$consignacion_control_session->idvendedorDefaultFK;
		$this->termino_pago_clientesFK=$consignacion_control_session->termino_pago_clientesFK;
		$this->idtermino_pago_clienteDefaultFK=$consignacion_control_session->idtermino_pago_clienteDefaultFK;
		$this->monedasFK=$consignacion_control_session->monedasFK;
		$this->idmonedaDefaultFK=$consignacion_control_session->idmonedaDefaultFK;
		$this->estadosFK=$consignacion_control_session->estadosFK;
		$this->idestadoDefaultFK=$consignacion_control_session->idestadoDefaultFK;
		$this->kardexsFK=$consignacion_control_session->kardexsFK;
		$this->idkardexDefaultFK=$consignacion_control_session->idkardexDefaultFK;
		$this->asientosFK=$consignacion_control_session->asientosFK;
		$this->idasientoDefaultFK=$consignacion_control_session->idasientoDefaultFK;
		
		
		$this->strVisibleFK_Idasiento=$consignacion_control_session->strVisibleFK_Idasiento;
		$this->strVisibleFK_Idcliente=$consignacion_control_session->strVisibleFK_Idcliente;
		$this->strVisibleFK_Idejercicio=$consignacion_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$consignacion_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idestado=$consignacion_control_session->strVisibleFK_Idestado;
		$this->strVisibleFK_Idkardex=$consignacion_control_session->strVisibleFK_Idkardex;
		$this->strVisibleFK_Idmoneda=$consignacion_control_session->strVisibleFK_Idmoneda;
		$this->strVisibleFK_Idperiodo=$consignacion_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idsucursal=$consignacion_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idtermino_pago=$consignacion_control_session->strVisibleFK_Idtermino_pago;
		$this->strVisibleFK_Idusuario=$consignacion_control_session->strVisibleFK_Idusuario;
		$this->strVisibleFK_Idvendedor=$consignacion_control_session->strVisibleFK_Idvendedor;
		
		
		$this->strTienePermisosimagen_consignacion=$consignacion_control_session->strTienePermisosimagen_consignacion;
		$this->strTienePermisosconsignacion_detalle=$consignacion_control_session->strTienePermisosconsignacion_detalle;
		
		
		$this->id_asientoFK_Idasiento=$consignacion_control_session->id_asientoFK_Idasiento;
		$this->id_clienteFK_Idcliente=$consignacion_control_session->id_clienteFK_Idcliente;
		$this->id_ejercicioFK_Idejercicio=$consignacion_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$consignacion_control_session->id_empresaFK_Idempresa;
		$this->id_estadoFK_Idestado=$consignacion_control_session->id_estadoFK_Idestado;
		$this->id_kardexFK_Idkardex=$consignacion_control_session->id_kardexFK_Idkardex;
		$this->id_monedaFK_Idmoneda=$consignacion_control_session->id_monedaFK_Idmoneda;
		$this->id_periodoFK_Idperiodo=$consignacion_control_session->id_periodoFK_Idperiodo;
		$this->id_sucursalFK_Idsucursal=$consignacion_control_session->id_sucursalFK_Idsucursal;
		$this->id_termino_pago_clienteFK_Idtermino_pago=$consignacion_control_session->id_termino_pago_clienteFK_Idtermino_pago;
		$this->id_usuarioFK_Idusuario=$consignacion_control_session->id_usuarioFK_Idusuario;
		$this->id_vendedorFK_Idvendedor=$consignacion_control_session->id_vendedorFK_Idvendedor;

		
		
		
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
	
	public function getconsignacionControllerAdditional() {
		return $this->consignacionControllerAdditional;
	}

	public function setconsignacionControllerAdditional($consignacionControllerAdditional) {
		$this->consignacionControllerAdditional = $consignacionControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getconsignacionActual() : consignacion {
		return $this->consignacionActual;
	}

	public function setconsignacionActual(consignacion $consignacionActual) {
		$this->consignacionActual = $consignacionActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidconsignacion() : int {
		return $this->idconsignacion;
	}

	public function setidconsignacion(int $idconsignacion) {
		$this->idconsignacion = $idconsignacion;
	}
	
	public function getconsignacion() : consignacion {
		return $this->consignacion;
	}

	public function setconsignacion(consignacion $consignacion) {
		$this->consignacion = $consignacion;
	}
		
	public function getconsignacionLogic() : consignacion_logic {		
		return $this->consignacionLogic;
	}

	public function setconsignacionLogic(consignacion_logic $consignacionLogic) {
		$this->consignacionLogic = $consignacionLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getconsignacionsModel() {		
		try {						
			/*consignacionsModel.setWrappedData(consignacionLogic->getconsignacions());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->consignacionsModel;
	}
	
	public function setconsignacionsModel($consignacionsModel) {
		$this->consignacionsModel = $consignacionsModel;
	}
	
	public function getconsignacions() : array {		
		return $this->consignacions;
	}
	
	public function setconsignacions(array $consignacions) {
		$this->consignacions= $consignacions;
	}
	
	public function getconsignacionsEliminados() : array {		
		return $this->consignacionsEliminados;
	}
	
	public function setconsignacionsEliminados(array $consignacionsEliminados) {
		$this->consignacionsEliminados= $consignacionsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getconsignacionActualFromListDataModel() {
		try {
			/*$consignacionClase= $this->consignacionsModel->getRowData();*/
			
			/*return $consignacion;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
