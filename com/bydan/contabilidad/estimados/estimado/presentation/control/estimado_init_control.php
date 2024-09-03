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

namespace com\bydan\contabilidad\estimados\estimado\presentation\control;

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

use com\bydan\contabilidad\estimados\estimado\business\entity\estimado;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/estimado/util/estimado_carga.php');
use com\bydan\contabilidad\estimados\estimado\util\estimado_carga;

use com\bydan\contabilidad\estimados\estimado\util\estimado_util;
use com\bydan\contabilidad\estimados\estimado\util\estimado_param_return;
use com\bydan\contabilidad\estimados\estimado\business\logic\estimado_logic;
use com\bydan\contabilidad\estimados\estimado\presentation\session\estimado_session;


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

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

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

//REL


use com\bydan\contabilidad\estimados\imagen_estimado\util\imagen_estimado_carga;
use com\bydan\contabilidad\estimados\imagen_estimado\util\imagen_estimado_util;
use com\bydan\contabilidad\estimados\imagen_estimado\presentation\session\imagen_estimado_session;

use com\bydan\contabilidad\estimados\estimado_detalle\util\estimado_detalle_carga;
use com\bydan\contabilidad\estimados\estimado_detalle\util\estimado_detalle_util;
use com\bydan\contabilidad\estimados\estimado_detalle\presentation\session\estimado_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
estimado_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
estimado_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
estimado_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
estimado_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*estimado_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class estimado_init_control extends ControllerBase {	
	
	public $estimadoClase=null;	
	public $estimadosModel=null;	
	public $estimadosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idestimado=0;	
	public ?int $idestimadoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $estimadoLogic=null;
	
	public $estimadoActual=null;	
	
	public $estimado=null;
	public $estimados=null;
	public $estimadosEliminados=array();
	public $estimadosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $estimadosLocal=array();
	public ?array $estimadosReporte=null;
	public ?array $estimadosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadestimado='onload';
	public string $strTipoPaginaAuxiliarestimado='none';
	public string $strTipoUsuarioAuxiliarestimado='none';
		
	public $estimadoReturnGeneral=null;
	public $estimadoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $estimadoModel=null;
	public $estimadoControllerAdditional=null;
	
	
	

	public $imagenestimadoLogic=null;

	public function  getimagen_estimadoLogic() {
		return $this->imagenestimadoLogic;
	}

	public function setimagen_estimadoLogic($imagenestimadoLogic) {
		$this->imagenestimadoLogic =$imagenestimadoLogic;
	}


	public $estimadodetalleLogic=null;

	public function  getestimado_detalleLogic() {
		return $this->estimadodetalleLogic;
	}

	public function setestimado_detalleLogic($estimadodetalleLogic) {
		$this->estimadodetalleLogic =$estimadodetalleLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajenumero='';
	public string $strMensajeid_cliente='';
	public string $strMensajeid_proveedor='';
	public string $strMensajeruc='';
	public string $strMensajereferencia_cliente='';
	public string $strMensajefecha_emision='';
	public string $strMensajeid_vendedor='';
	public string $strMensajeid_termino_pago_cliente='';
	public string $strMensajefecha_vence='';
	public string $strMensajeid_moneda='';
	public string $strMensajecotizacion='';
	public string $strMensajeid_estado='';
	public string $strMensajedireccion='';
	public string $strMensajeenviar_a='';
	public string $strMensajeobservacion='';
	public string $strMensajeiva_en_precio='';
	public string $strMensajegenero_factura='';
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
	public string $strMensajehora='';
	public string $strMensajeretencion_ica_monto='';
	public string $strMensajeretencion_ica_porciento='';
	
	
	public string $strVisibleFK_Idcliente='display:table-row';
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idestado='display:table-row';
	public string $strVisibleFK_Idmoneda='display:table-row';
	public string $strVisibleFK_Idperiodo='display:table-row';
	public string $strVisibleFK_Idproveedor='display:table-row';
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

	
	
	
	
	
	
	public $strTienePermisosimagen_estimado='none';
	public $strTienePermisosestimado_detalle='none';
	
	
	public  $id_clienteFK_Idcliente=null;

	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_estadoFK_Idestado=null;

	public  $id_monedaFK_Idmoneda=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_proveedorFK_Idproveedor=null;

	public  $id_sucursalFK_Idsucursal=null;

	public  $id_termino_pago_clienteFK_Idtermino_pago=null;

	public  $id_usuarioFK_Idusuario=null;

	public  $id_vendedorFK_Idvendedor=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->estimadoLogic==null) {
				$this->estimadoLogic=new estimado_logic();
			}
			
		} else {
			if($this->estimadoLogic==null) {
				$this->estimadoLogic=new estimado_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->estimadoClase==null) {
				$this->estimadoClase=new estimado();
			}
			
			$this->estimadoClase->setId(0);	
				
				
			$this->estimadoClase->setid_empresa(-1);	
			$this->estimadoClase->setid_sucursal(-1);	
			$this->estimadoClase->setid_ejercicio(-1);	
			$this->estimadoClase->setid_periodo(-1);	
			$this->estimadoClase->setid_usuario(-1);	
			$this->estimadoClase->setnumero('');	
			$this->estimadoClase->setid_cliente(null);	
			$this->estimadoClase->setid_proveedor(null);	
			$this->estimadoClase->setruc('');	
			$this->estimadoClase->setreferencia_cliente('');	
			$this->estimadoClase->setfecha_emision(date('Y-m-d'));	
			$this->estimadoClase->setid_vendedor(-1);	
			$this->estimadoClase->setid_termino_pago_cliente(-1);	
			$this->estimadoClase->setfecha_vence(date('Y-m-d'));	
			$this->estimadoClase->setid_moneda(-1);	
			$this->estimadoClase->setcotizacion(0.0);	
			$this->estimadoClase->setid_estado(-1);	
			$this->estimadoClase->setdireccion('');	
			$this->estimadoClase->setenviar_a('');	
			$this->estimadoClase->setobservacion('');	
			$this->estimadoClase->setiva_en_precio(false);	
			$this->estimadoClase->setgenero_factura(false);	
			$this->estimadoClase->setsub_total(0.0);	
			$this->estimadoClase->setdescuento_monto(0.0);	
			$this->estimadoClase->setdescuento_porciento(0.0);	
			$this->estimadoClase->setiva_monto(0.0);	
			$this->estimadoClase->setiva_porciento(0.0);	
			$this->estimadoClase->setretencion_fuente_monto(0.0);	
			$this->estimadoClase->setretencion_fuente_porciento(0.0);	
			$this->estimadoClase->setretencion_iva_monto(0.0);	
			$this->estimadoClase->setretencion_iva_porciento(0.0);	
			$this->estimadoClase->settotal(0.0);	
			$this->estimadoClase->setotro_monto(0.0);	
			$this->estimadoClase->setotro_porciento(0.0);	
			$this->estimadoClase->sethora(date('Y-m-d'));	
			$this->estimadoClase->setretencion_ica_monto(0.0);	
			$this->estimadoClase->setretencion_ica_porciento(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('estimado');
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
		$this->cargarParametrosReporteBase('estimado');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('estimado');
	}
	
	public function actualizarControllerConReturnGeneral(estimado_param_return $estimadoReturnGeneral) {
		if($estimadoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesestimadosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$estimadoReturnGeneral->getsMensajeProceso();
		}
		
		if($estimadoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$estimadoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($estimadoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$estimadoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$estimadoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($estimadoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($estimadoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$estimadoReturnGeneral->getsFuncionJs();
		}
		
		if($estimadoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(estimado_session $estimado_session){
		$this->strStyleDivArbol=$estimado_session->strStyleDivArbol;	
		$this->strStyleDivContent=$estimado_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$estimado_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$estimado_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$estimado_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$estimado_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$estimado_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(estimado_session $estimado_session){
		$estimado_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$estimado_session->strStyleDivHeader='display:none';			
		$estimado_session->strStyleDivContent='width:93%;height:100%';	
		$estimado_session->strStyleDivOpcionesBanner='display:none';	
		$estimado_session->strStyleDivExpandirColapsar='display:none';	
		$estimado_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(estimado_control $estimado_control_session){
		$this->idNuevo=$estimado_control_session->idNuevo;
		$this->estimadoActual=$estimado_control_session->estimadoActual;
		$this->estimado=$estimado_control_session->estimado;
		$this->estimadoClase=$estimado_control_session->estimadoClase;
		$this->estimados=$estimado_control_session->estimados;
		$this->estimadosEliminados=$estimado_control_session->estimadosEliminados;
		$this->estimado=$estimado_control_session->estimado;
		$this->estimadosReporte=$estimado_control_session->estimadosReporte;
		$this->estimadosSeleccionados=$estimado_control_session->estimadosSeleccionados;
		$this->arrOrderBy=$estimado_control_session->arrOrderBy;
		$this->arrOrderByRel=$estimado_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$estimado_control_session->arrHistoryWebs;
		$this->arrSessionBases=$estimado_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadestimado=$estimado_control_session->strTypeOnLoadestimado;
		$this->strTipoPaginaAuxiliarestimado=$estimado_control_session->strTipoPaginaAuxiliarestimado;
		$this->strTipoUsuarioAuxiliarestimado=$estimado_control_session->strTipoUsuarioAuxiliarestimado;	
		
		$this->bitEsPopup=$estimado_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$estimado_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$estimado_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$estimado_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$estimado_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$estimado_control_session->strSufijo;
		$this->bitEsRelaciones=$estimado_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$estimado_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$estimado_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$estimado_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$estimado_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$estimado_control_session->strTituloTabla;
		$this->strTituloPathPagina=$estimado_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$estimado_control_session->strTituloPathElementoActual;
		
		if($this->estimadoLogic==null) {			
			$this->estimadoLogic=new estimado_logic();
		}
		
		
		if($this->estimadoClase==null) {
			$this->estimadoClase=new estimado();	
		}
		
		$this->estimadoLogic->setestimado($this->estimadoClase);
		
		
		if($this->estimados==null) {
			$this->estimados=array();	
		}
		
		$this->estimadoLogic->setestimados($this->estimados);
		
		
		$this->strTipoView=$estimado_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$estimado_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$estimado_control_session->datosCliente;
		$this->strAccionBusqueda=$estimado_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$estimado_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$estimado_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$estimado_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$estimado_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$estimado_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$estimado_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$estimado_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$estimado_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$estimado_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$estimado_control_session->strTipoPaginacion;
		$this->strTipoAccion=$estimado_control_session->strTipoAccion;
		$this->tiposReportes=$estimado_control_session->tiposReportes;
		$this->tiposReporte=$estimado_control_session->tiposReporte;
		$this->tiposAcciones=$estimado_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$estimado_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$estimado_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$estimado_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$estimado_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$estimado_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$estimado_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$estimado_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$estimado_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$estimado_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$estimado_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$estimado_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$estimado_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$estimado_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$estimado_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$estimado_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$estimado_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$estimado_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$estimado_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$estimado_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$estimado_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$estimado_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$estimado_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$estimado_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$estimado_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$estimado_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$estimado_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$estimado_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$estimado_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$estimado_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$estimado_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$estimado_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$estimado_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$estimado_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$estimado_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$estimado_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$estimado_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$estimado_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$estimado_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$estimado_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$estimado_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$estimado_control_session->resumenUsuarioActual;	
		$this->moduloActual=$estimado_control_session->moduloActual;	
		$this->opcionActual=$estimado_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$estimado_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$estimado_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$estimado_session=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME));
				
		if($estimado_session==null) {
			$estimado_session=new estimado_session();
		}
		
		$this->strStyleDivArbol=$estimado_session->strStyleDivArbol;	
		$this->strStyleDivContent=$estimado_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$estimado_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$estimado_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$estimado_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$estimado_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$estimado_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$estimado_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$estimado_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$estimado_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$estimado_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$estimado_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$estimado_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$estimado_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$estimado_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$estimado_control_session->strMensajeid_usuario;
		$this->strMensajenumero=$estimado_control_session->strMensajenumero;
		$this->strMensajeid_cliente=$estimado_control_session->strMensajeid_cliente;
		$this->strMensajeid_proveedor=$estimado_control_session->strMensajeid_proveedor;
		$this->strMensajeruc=$estimado_control_session->strMensajeruc;
		$this->strMensajereferencia_cliente=$estimado_control_session->strMensajereferencia_cliente;
		$this->strMensajefecha_emision=$estimado_control_session->strMensajefecha_emision;
		$this->strMensajeid_vendedor=$estimado_control_session->strMensajeid_vendedor;
		$this->strMensajeid_termino_pago_cliente=$estimado_control_session->strMensajeid_termino_pago_cliente;
		$this->strMensajefecha_vence=$estimado_control_session->strMensajefecha_vence;
		$this->strMensajeid_moneda=$estimado_control_session->strMensajeid_moneda;
		$this->strMensajecotizacion=$estimado_control_session->strMensajecotizacion;
		$this->strMensajeid_estado=$estimado_control_session->strMensajeid_estado;
		$this->strMensajedireccion=$estimado_control_session->strMensajedireccion;
		$this->strMensajeenviar_a=$estimado_control_session->strMensajeenviar_a;
		$this->strMensajeobservacion=$estimado_control_session->strMensajeobservacion;
		$this->strMensajeiva_en_precio=$estimado_control_session->strMensajeiva_en_precio;
		$this->strMensajegenero_factura=$estimado_control_session->strMensajegenero_factura;
		$this->strMensajesub_total=$estimado_control_session->strMensajesub_total;
		$this->strMensajedescuento_monto=$estimado_control_session->strMensajedescuento_monto;
		$this->strMensajedescuento_porciento=$estimado_control_session->strMensajedescuento_porciento;
		$this->strMensajeiva_monto=$estimado_control_session->strMensajeiva_monto;
		$this->strMensajeiva_porciento=$estimado_control_session->strMensajeiva_porciento;
		$this->strMensajeretencion_fuente_monto=$estimado_control_session->strMensajeretencion_fuente_monto;
		$this->strMensajeretencion_fuente_porciento=$estimado_control_session->strMensajeretencion_fuente_porciento;
		$this->strMensajeretencion_iva_monto=$estimado_control_session->strMensajeretencion_iva_monto;
		$this->strMensajeretencion_iva_porciento=$estimado_control_session->strMensajeretencion_iva_porciento;
		$this->strMensajetotal=$estimado_control_session->strMensajetotal;
		$this->strMensajeotro_monto=$estimado_control_session->strMensajeotro_monto;
		$this->strMensajeotro_porciento=$estimado_control_session->strMensajeotro_porciento;
		$this->strMensajehora=$estimado_control_session->strMensajehora;
		$this->strMensajeretencion_ica_monto=$estimado_control_session->strMensajeretencion_ica_monto;
		$this->strMensajeretencion_ica_porciento=$estimado_control_session->strMensajeretencion_ica_porciento;
			
		
		$this->empresasFK=$estimado_control_session->empresasFK;
		$this->idempresaDefaultFK=$estimado_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$estimado_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$estimado_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$estimado_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$estimado_control_session->idejercicioDefaultFK;
		$this->periodosFK=$estimado_control_session->periodosFK;
		$this->idperiodoDefaultFK=$estimado_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$estimado_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$estimado_control_session->idusuarioDefaultFK;
		$this->clientesFK=$estimado_control_session->clientesFK;
		$this->idclienteDefaultFK=$estimado_control_session->idclienteDefaultFK;
		$this->proveedorsFK=$estimado_control_session->proveedorsFK;
		$this->idproveedorDefaultFK=$estimado_control_session->idproveedorDefaultFK;
		$this->vendedorsFK=$estimado_control_session->vendedorsFK;
		$this->idvendedorDefaultFK=$estimado_control_session->idvendedorDefaultFK;
		$this->termino_pago_clientesFK=$estimado_control_session->termino_pago_clientesFK;
		$this->idtermino_pago_clienteDefaultFK=$estimado_control_session->idtermino_pago_clienteDefaultFK;
		$this->monedasFK=$estimado_control_session->monedasFK;
		$this->idmonedaDefaultFK=$estimado_control_session->idmonedaDefaultFK;
		$this->estadosFK=$estimado_control_session->estadosFK;
		$this->idestadoDefaultFK=$estimado_control_session->idestadoDefaultFK;
		
		
		$this->strVisibleFK_Idcliente=$estimado_control_session->strVisibleFK_Idcliente;
		$this->strVisibleFK_Idejercicio=$estimado_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$estimado_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idestado=$estimado_control_session->strVisibleFK_Idestado;
		$this->strVisibleFK_Idmoneda=$estimado_control_session->strVisibleFK_Idmoneda;
		$this->strVisibleFK_Idperiodo=$estimado_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idproveedor=$estimado_control_session->strVisibleFK_Idproveedor;
		$this->strVisibleFK_Idsucursal=$estimado_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idtermino_pago=$estimado_control_session->strVisibleFK_Idtermino_pago;
		$this->strVisibleFK_Idusuario=$estimado_control_session->strVisibleFK_Idusuario;
		$this->strVisibleFK_Idvendedor=$estimado_control_session->strVisibleFK_Idvendedor;
		
		
		$this->strTienePermisosimagen_estimado=$estimado_control_session->strTienePermisosimagen_estimado;
		$this->strTienePermisosestimado_detalle=$estimado_control_session->strTienePermisosestimado_detalle;
		
		
		$this->id_clienteFK_Idcliente=$estimado_control_session->id_clienteFK_Idcliente;
		$this->id_ejercicioFK_Idejercicio=$estimado_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$estimado_control_session->id_empresaFK_Idempresa;
		$this->id_estadoFK_Idestado=$estimado_control_session->id_estadoFK_Idestado;
		$this->id_monedaFK_Idmoneda=$estimado_control_session->id_monedaFK_Idmoneda;
		$this->id_periodoFK_Idperiodo=$estimado_control_session->id_periodoFK_Idperiodo;
		$this->id_proveedorFK_Idproveedor=$estimado_control_session->id_proveedorFK_Idproveedor;
		$this->id_sucursalFK_Idsucursal=$estimado_control_session->id_sucursalFK_Idsucursal;
		$this->id_termino_pago_clienteFK_Idtermino_pago=$estimado_control_session->id_termino_pago_clienteFK_Idtermino_pago;
		$this->id_usuarioFK_Idusuario=$estimado_control_session->id_usuarioFK_Idusuario;
		$this->id_vendedorFK_Idvendedor=$estimado_control_session->id_vendedorFK_Idvendedor;

		
		
		
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
	
	public function getestimadoControllerAdditional() {
		return $this->estimadoControllerAdditional;
	}

	public function setestimadoControllerAdditional($estimadoControllerAdditional) {
		$this->estimadoControllerAdditional = $estimadoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getestimadoActual() : estimado {
		return $this->estimadoActual;
	}

	public function setestimadoActual(estimado $estimadoActual) {
		$this->estimadoActual = $estimadoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidestimado() : int {
		return $this->idestimado;
	}

	public function setidestimado(int $idestimado) {
		$this->idestimado = $idestimado;
	}
	
	public function getestimado() : estimado {
		return $this->estimado;
	}

	public function setestimado(estimado $estimado) {
		$this->estimado = $estimado;
	}
		
	public function getestimadoLogic() : estimado_logic {		
		return $this->estimadoLogic;
	}

	public function setestimadoLogic(estimado_logic $estimadoLogic) {
		$this->estimadoLogic = $estimadoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getestimadosModel() {		
		try {						
			/*estimadosModel.setWrappedData(estimadoLogic->getestimados());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->estimadosModel;
	}
	
	public function setestimadosModel($estimadosModel) {
		$this->estimadosModel = $estimadosModel;
	}
	
	public function getestimados() : array {		
		return $this->estimados;
	}
	
	public function setestimados(array $estimados) {
		$this->estimados= $estimados;
	}
	
	public function getestimadosEliminados() : array {		
		return $this->estimadosEliminados;
	}
	
	public function setestimadosEliminados(array $estimadosEliminados) {
		$this->estimadosEliminados= $estimadosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getestimadoActualFromListDataModel() {
		try {
			/*$estimadoClase= $this->estimadosModel->getRowData();*/
			
			/*return $estimado;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
