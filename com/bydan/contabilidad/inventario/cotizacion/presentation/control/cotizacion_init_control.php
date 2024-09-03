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

namespace com\bydan\contabilidad\inventario\cotizacion\presentation\control;

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

use com\bydan\contabilidad\inventario\cotizacion\business\entity\cotizacion;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/cotizacion/util/cotizacion_carga.php');
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_carga;

use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_util;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_param_return;
use com\bydan\contabilidad\inventario\cotizacion\business\logic\cotizacion_logic;
use com\bydan\contabilidad\inventario\cotizacion\business\logic\cotizacion_logic_add;
use com\bydan\contabilidad\inventario\cotizacion\presentation\session\cotizacion_session;


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

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\business\logic\vendedor_logic;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_carga;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;

use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;
use com\bydan\contabilidad\contabilidad\moneda\business\logic\moneda_logic;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_carga;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL


use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_carga;
use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_util;
use com\bydan\contabilidad\inventario\cotizacion_detalle\presentation\session\cotizacion_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
cotizacion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cotizacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cotizacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cotizacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cotizacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class cotizacion_init_control extends ControllerBase {	
	
	public $cotizacionClase=null;	
	public $cotizacionsModel=null;	
	public $cotizacionsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcotizacion=0;	
	public ?int $idcotizacionActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $cotizacionLogic=null;
	
	public $cotizacionActual=null;	
	
	public $cotizacion=null;
	public $cotizacions=null;
	public $cotizacionsEliminados=array();
	public $cotizacionsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $cotizacionsLocal=array();
	public ?array $cotizacionsReporte=null;
	public ?array $cotizacionsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcotizacion='onload';
	public string $strTipoPaginaAuxiliarcotizacion='none';
	public string $strTipoUsuarioAuxiliarcotizacion='none';
		
	public $cotizacionReturnGeneral=null;
	public $cotizacionParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $cotizacionModel=null;
	public $cotizacionControllerAdditional=null;
	
	
	

	public $cotizaciondetalleLogic=null;

	public function  getcotizacion_detalleLogic() {
		return $this->cotizaciondetalleLogic;
	}

	public function setcotizacion_detalleLogic($cotizaciondetalleLogic) {
		$this->cotizaciondetalleLogic =$cotizaciondetalleLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajeid_proveedor='';
	public string $strMensajeruc='';
	public string $strMensajenumero='';
	public string $strMensajefecha_emision='';
	public string $strMensajeid_vendedor='';
	public string $strMensajeid_termino_pago_proveedor='';
	public string $strMensajefecha_vence='';
	public string $strMensajeid_moneda='';
	public string $strMensajecotizacion='';
	public string $strMensajedireccion='';
	public string $strMensajeenviar='';
	public string $strMensajeobservacion='';
	public string $strMensajeid_estado='';
	public string $strMensajesub_total='';
	public string $strMensajedescuento_monto='';
	public string $strMensajedescuento_porciento='';
	public string $strMensajeiva_monto='';
	public string $strMensajeiva_porciento='';
	public string $strMensajetotal='';
	public string $strMensajeotro_monto='';
	public string $strMensajeotro_porciento='';
	
	
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idestado='display:table-row';
	public string $strVisibleFK_Idmoneda='display:table-row';
	public string $strVisibleFK_Idperiodo='display:table-row';
	public string $strVisibleFK_Idproveedor='display:table-row';
	public string $strVisibleFK_Idsucursal='display:table-row';
	public string $strVisibleFK_Idtermino_pago_proveedor='display:table-row';
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

	
	
	
	
	
	
	public $strTienePermisoscotizacion_detalle='none';
	
	
	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_estadoFK_Idestado=null;

	public  $id_monedaFK_Idmoneda=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_proveedorFK_Idproveedor=null;

	public  $id_sucursalFK_Idsucursal=null;

	public  $id_termino_pago_proveedorFK_Idtermino_pago_proveedor=null;

	public  $id_usuarioFK_Idusuario=null;

	public  $id_vendedorFK_Idvendedor=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->cotizacionLogic==null) {
				$this->cotizacionLogic=new cotizacion_logic();
			}
			
		} else {
			if($this->cotizacionLogic==null) {
				$this->cotizacionLogic=new cotizacion_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->cotizacionClase==null) {
				$this->cotizacionClase=new cotizacion();
			}
			
			$this->cotizacionClase->setId(0);	
				
				
			$this->cotizacionClase->setid_empresa(-1);	
			$this->cotizacionClase->setid_sucursal(-1);	
			$this->cotizacionClase->setid_ejercicio(-1);	
			$this->cotizacionClase->setid_periodo(-1);	
			$this->cotizacionClase->setid_usuario(-1);	
			$this->cotizacionClase->setid_proveedor(-1);	
			$this->cotizacionClase->setruc('');	
			$this->cotizacionClase->setnumero('');	
			$this->cotizacionClase->setfecha_emision(date('Y-m-d'));	
			$this->cotizacionClase->setid_vendedor(-1);	
			$this->cotizacionClase->setid_termino_pago_proveedor(-1);	
			$this->cotizacionClase->setfecha_vence(date('Y-m-d'));	
			$this->cotizacionClase->setid_moneda(-1);	
			$this->cotizacionClase->setcotizacion(0.0);	
			$this->cotizacionClase->setdireccion('');	
			$this->cotizacionClase->setenviar('');	
			$this->cotizacionClase->setobservacion('');	
			$this->cotizacionClase->setid_estado(-1);	
			$this->cotizacionClase->setsub_total(0.0);	
			$this->cotizacionClase->setdescuento_monto(0.0);	
			$this->cotizacionClase->setdescuento_porciento(0.0);	
			$this->cotizacionClase->setiva_monto(0.0);	
			$this->cotizacionClase->setiva_porciento(0.0);	
			$this->cotizacionClase->settotal(0.0);	
			$this->cotizacionClase->setotro_monto(0.0);	
			$this->cotizacionClase->setotro_porciento(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('cotizacion');
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
		$this->cargarParametrosReporteBase('cotizacion');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('cotizacion');
	}
	
	public function actualizarControllerConReturnGeneral(cotizacion_param_return $cotizacionReturnGeneral) {
		if($cotizacionReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescotizacionsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$cotizacionReturnGeneral->getsMensajeProceso();
		}
		
		if($cotizacionReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$cotizacionReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($cotizacionReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$cotizacionReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$cotizacionReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($cotizacionReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($cotizacionReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$cotizacionReturnGeneral->getsFuncionJs();
		}
		
		if($cotizacionReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(cotizacion_session $cotizacion_session){
		$this->strStyleDivArbol=$cotizacion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cotizacion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cotizacion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cotizacion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cotizacion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cotizacion_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$cotizacion_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(cotizacion_session $cotizacion_session){
		$cotizacion_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$cotizacion_session->strStyleDivHeader='display:none';			
		$cotizacion_session->strStyleDivContent='width:93%;height:100%';	
		$cotizacion_session->strStyleDivOpcionesBanner='display:none';	
		$cotizacion_session->strStyleDivExpandirColapsar='display:none';	
		$cotizacion_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(cotizacion_control $cotizacion_control_session){
		$this->idNuevo=$cotizacion_control_session->idNuevo;
		$this->cotizacionActual=$cotizacion_control_session->cotizacionActual;
		$this->cotizacion=$cotizacion_control_session->cotizacion;
		$this->cotizacionClase=$cotizacion_control_session->cotizacionClase;
		$this->cotizacions=$cotizacion_control_session->cotizacions;
		$this->cotizacionsEliminados=$cotizacion_control_session->cotizacionsEliminados;
		$this->cotizacion=$cotizacion_control_session->cotizacion;
		$this->cotizacionsReporte=$cotizacion_control_session->cotizacionsReporte;
		$this->cotizacionsSeleccionados=$cotizacion_control_session->cotizacionsSeleccionados;
		$this->arrOrderBy=$cotizacion_control_session->arrOrderBy;
		$this->arrOrderByRel=$cotizacion_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$cotizacion_control_session->arrHistoryWebs;
		$this->arrSessionBases=$cotizacion_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcotizacion=$cotizacion_control_session->strTypeOnLoadcotizacion;
		$this->strTipoPaginaAuxiliarcotizacion=$cotizacion_control_session->strTipoPaginaAuxiliarcotizacion;
		$this->strTipoUsuarioAuxiliarcotizacion=$cotizacion_control_session->strTipoUsuarioAuxiliarcotizacion;	
		
		$this->bitEsPopup=$cotizacion_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$cotizacion_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$cotizacion_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$cotizacion_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$cotizacion_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$cotizacion_control_session->strSufijo;
		$this->bitEsRelaciones=$cotizacion_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$cotizacion_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$cotizacion_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$cotizacion_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$cotizacion_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$cotizacion_control_session->strTituloTabla;
		$this->strTituloPathPagina=$cotizacion_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$cotizacion_control_session->strTituloPathElementoActual;
		
		if($this->cotizacionLogic==null) {			
			$this->cotizacionLogic=new cotizacion_logic();
		}
		
		
		if($this->cotizacionClase==null) {
			$this->cotizacionClase=new cotizacion();	
		}
		
		$this->cotizacionLogic->setcotizacion($this->cotizacionClase);
		
		
		if($this->cotizacions==null) {
			$this->cotizacions=array();	
		}
		
		$this->cotizacionLogic->setcotizacions($this->cotizacions);
		
		
		$this->strTipoView=$cotizacion_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$cotizacion_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$cotizacion_control_session->datosCliente;
		$this->strAccionBusqueda=$cotizacion_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$cotizacion_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$cotizacion_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$cotizacion_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$cotizacion_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$cotizacion_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$cotizacion_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$cotizacion_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$cotizacion_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$cotizacion_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$cotizacion_control_session->strTipoPaginacion;
		$this->strTipoAccion=$cotizacion_control_session->strTipoAccion;
		$this->tiposReportes=$cotizacion_control_session->tiposReportes;
		$this->tiposReporte=$cotizacion_control_session->tiposReporte;
		$this->tiposAcciones=$cotizacion_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$cotizacion_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$cotizacion_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$cotizacion_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$cotizacion_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$cotizacion_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$cotizacion_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$cotizacion_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$cotizacion_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$cotizacion_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$cotizacion_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$cotizacion_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$cotizacion_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$cotizacion_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$cotizacion_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$cotizacion_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$cotizacion_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$cotizacion_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$cotizacion_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$cotizacion_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$cotizacion_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$cotizacion_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$cotizacion_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$cotizacion_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$cotizacion_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$cotizacion_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$cotizacion_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$cotizacion_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$cotizacion_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$cotizacion_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$cotizacion_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$cotizacion_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$cotizacion_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$cotizacion_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$cotizacion_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$cotizacion_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$cotizacion_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$cotizacion_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$cotizacion_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$cotizacion_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$cotizacion_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$cotizacion_control_session->resumenUsuarioActual;	
		$this->moduloActual=$cotizacion_control_session->moduloActual;	
		$this->opcionActual=$cotizacion_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$cotizacion_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$cotizacion_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));
				
		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		$this->strStyleDivArbol=$cotizacion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cotizacion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cotizacion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cotizacion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cotizacion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cotizacion_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$cotizacion_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$cotizacion_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$cotizacion_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$cotizacion_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$cotizacion_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$cotizacion_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$cotizacion_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$cotizacion_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$cotizacion_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$cotizacion_control_session->strMensajeid_usuario;
		$this->strMensajeid_proveedor=$cotizacion_control_session->strMensajeid_proveedor;
		$this->strMensajeruc=$cotizacion_control_session->strMensajeruc;
		$this->strMensajenumero=$cotizacion_control_session->strMensajenumero;
		$this->strMensajefecha_emision=$cotizacion_control_session->strMensajefecha_emision;
		$this->strMensajeid_vendedor=$cotizacion_control_session->strMensajeid_vendedor;
		$this->strMensajeid_termino_pago_proveedor=$cotizacion_control_session->strMensajeid_termino_pago_proveedor;
		$this->strMensajefecha_vence=$cotizacion_control_session->strMensajefecha_vence;
		$this->strMensajeid_moneda=$cotizacion_control_session->strMensajeid_moneda;
		$this->strMensajecotizacion=$cotizacion_control_session->strMensajecotizacion;
		$this->strMensajedireccion=$cotizacion_control_session->strMensajedireccion;
		$this->strMensajeenviar=$cotizacion_control_session->strMensajeenviar;
		$this->strMensajeobservacion=$cotizacion_control_session->strMensajeobservacion;
		$this->strMensajeid_estado=$cotizacion_control_session->strMensajeid_estado;
		$this->strMensajesub_total=$cotizacion_control_session->strMensajesub_total;
		$this->strMensajedescuento_monto=$cotizacion_control_session->strMensajedescuento_monto;
		$this->strMensajedescuento_porciento=$cotizacion_control_session->strMensajedescuento_porciento;
		$this->strMensajeiva_monto=$cotizacion_control_session->strMensajeiva_monto;
		$this->strMensajeiva_porciento=$cotizacion_control_session->strMensajeiva_porciento;
		$this->strMensajetotal=$cotizacion_control_session->strMensajetotal;
		$this->strMensajeotro_monto=$cotizacion_control_session->strMensajeotro_monto;
		$this->strMensajeotro_porciento=$cotizacion_control_session->strMensajeotro_porciento;
			
		
		$this->empresasFK=$cotizacion_control_session->empresasFK;
		$this->idempresaDefaultFK=$cotizacion_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$cotizacion_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$cotizacion_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$cotizacion_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$cotizacion_control_session->idejercicioDefaultFK;
		$this->periodosFK=$cotizacion_control_session->periodosFK;
		$this->idperiodoDefaultFK=$cotizacion_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$cotizacion_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$cotizacion_control_session->idusuarioDefaultFK;
		$this->proveedorsFK=$cotizacion_control_session->proveedorsFK;
		$this->idproveedorDefaultFK=$cotizacion_control_session->idproveedorDefaultFK;
		$this->vendedorsFK=$cotizacion_control_session->vendedorsFK;
		$this->idvendedorDefaultFK=$cotizacion_control_session->idvendedorDefaultFK;
		$this->termino_pago_proveedorsFK=$cotizacion_control_session->termino_pago_proveedorsFK;
		$this->idtermino_pago_proveedorDefaultFK=$cotizacion_control_session->idtermino_pago_proveedorDefaultFK;
		$this->monedasFK=$cotizacion_control_session->monedasFK;
		$this->idmonedaDefaultFK=$cotizacion_control_session->idmonedaDefaultFK;
		$this->estadosFK=$cotizacion_control_session->estadosFK;
		$this->idestadoDefaultFK=$cotizacion_control_session->idestadoDefaultFK;
		
		
		$this->strVisibleFK_Idejercicio=$cotizacion_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$cotizacion_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idestado=$cotizacion_control_session->strVisibleFK_Idestado;
		$this->strVisibleFK_Idmoneda=$cotizacion_control_session->strVisibleFK_Idmoneda;
		$this->strVisibleFK_Idperiodo=$cotizacion_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idproveedor=$cotizacion_control_session->strVisibleFK_Idproveedor;
		$this->strVisibleFK_Idsucursal=$cotizacion_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idtermino_pago_proveedor=$cotizacion_control_session->strVisibleFK_Idtermino_pago_proveedor;
		$this->strVisibleFK_Idusuario=$cotizacion_control_session->strVisibleFK_Idusuario;
		$this->strVisibleFK_Idvendedor=$cotizacion_control_session->strVisibleFK_Idvendedor;
		
		
		$this->strTienePermisoscotizacion_detalle=$cotizacion_control_session->strTienePermisoscotizacion_detalle;
		
		
		$this->id_ejercicioFK_Idejercicio=$cotizacion_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$cotizacion_control_session->id_empresaFK_Idempresa;
		$this->id_estadoFK_Idestado=$cotizacion_control_session->id_estadoFK_Idestado;
		$this->id_monedaFK_Idmoneda=$cotizacion_control_session->id_monedaFK_Idmoneda;
		$this->id_periodoFK_Idperiodo=$cotizacion_control_session->id_periodoFK_Idperiodo;
		$this->id_proveedorFK_Idproveedor=$cotizacion_control_session->id_proveedorFK_Idproveedor;
		$this->id_sucursalFK_Idsucursal=$cotizacion_control_session->id_sucursalFK_Idsucursal;
		$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor=$cotizacion_control_session->id_termino_pago_proveedorFK_Idtermino_pago_proveedor;
		$this->id_usuarioFK_Idusuario=$cotizacion_control_session->id_usuarioFK_Idusuario;
		$this->id_vendedorFK_Idvendedor=$cotizacion_control_session->id_vendedorFK_Idvendedor;

		
		
		
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
	
	public function getcotizacionControllerAdditional() {
		return $this->cotizacionControllerAdditional;
	}

	public function setcotizacionControllerAdditional($cotizacionControllerAdditional) {
		$this->cotizacionControllerAdditional = $cotizacionControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcotizacionActual() : cotizacion {
		return $this->cotizacionActual;
	}

	public function setcotizacionActual(cotizacion $cotizacionActual) {
		$this->cotizacionActual = $cotizacionActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcotizacion() : int {
		return $this->idcotizacion;
	}

	public function setidcotizacion(int $idcotizacion) {
		$this->idcotizacion = $idcotizacion;
	}
	
	public function getcotizacion() : cotizacion {
		return $this->cotizacion;
	}

	public function setcotizacion(cotizacion $cotizacion) {
		$this->cotizacion = $cotizacion;
	}
		
	public function getcotizacionLogic() : cotizacion_logic {		
		return $this->cotizacionLogic;
	}

	public function setcotizacionLogic(cotizacion_logic $cotizacionLogic) {
		$this->cotizacionLogic = $cotizacionLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcotizacionsModel() {		
		try {						
			/*cotizacionsModel.setWrappedData(cotizacionLogic->getcotizacions());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->cotizacionsModel;
	}
	
	public function setcotizacionsModel($cotizacionsModel) {
		$this->cotizacionsModel = $cotizacionsModel;
	}
	
	public function getcotizacions() : array {		
		return $this->cotizacions;
	}
	
	public function setcotizacions(array $cotizacions) {
		$this->cotizacions= $cotizacions;
	}
	
	public function getcotizacionsEliminados() : array {		
		return $this->cotizacionsEliminados;
	}
	
	public function setcotizacionsEliminados(array $cotizacionsEliminados) {
		$this->cotizacionsEliminados= $cotizacionsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcotizacionActualFromListDataModel() {
		try {
			/*$cotizacionClase= $this->cotizacionsModel->getRowData();*/
			
			/*return $cotizacion;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
