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

namespace com\bydan\contabilidad\inventario\kardex\presentation\control;

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

use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/kardex/util/kardex_carga.php');
use com\bydan\contabilidad\inventario\kardex\util\kardex_carga;

use com\bydan\contabilidad\inventario\kardex\util\kardex_util;
use com\bydan\contabilidad\inventario\kardex\util\kardex_param_return;
use com\bydan\contabilidad\inventario\kardex\business\logic\kardex_logic;
use com\bydan\contabilidad\inventario\kardex\business\logic\kardex_logic_add;
use com\bydan\contabilidad\inventario\kardex\presentation\session\kardex_session;


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

use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\modulo\business\logic\modulo_logic;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;

use com\bydan\contabilidad\inventario\tipo_kardex\business\entity\tipo_kardex;
use com\bydan\contabilidad\inventario\tipo_kardex\business\logic\tipo_kardex_logic;
use com\bydan\contabilidad\inventario\tipo_kardex\util\tipo_kardex_carga;
use com\bydan\contabilidad\inventario\tipo_kardex\util\tipo_kardex_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL


use com\bydan\contabilidad\inventario\kardex_detalle\util\kardex_detalle_carga;
use com\bydan\contabilidad\inventario\kardex_detalle\util\kardex_detalle_util;
use com\bydan\contabilidad\inventario\kardex_detalle\presentation\session\kardex_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
kardex_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
kardex_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
kardex_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
kardex_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*kardex_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class kardex_init_control extends ControllerBase {	
	
	public $kardexClase=null;	
	public $kardexsModel=null;	
	public $kardexsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idkardex=0;	
	public ?int $idkardexActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $kardexLogic=null;
	
	public $kardexActual=null;	
	
	public $kardex=null;
	public $kardexs=null;
	public $kardexsEliminados=array();
	public $kardexsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $kardexsLocal=array();
	public ?array $kardexsReporte=null;
	public ?array $kardexsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadkardex='onload';
	public string $strTipoPaginaAuxiliarkardex='none';
	public string $strTipoUsuarioAuxiliarkardex='none';
		
	public $kardexReturnGeneral=null;
	public $kardexParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $kardexModel=null;
	public $kardexControllerAdditional=null;
	
	
	

	public $ordencompraLogic=null;

	public function  getorden_compraLogic() {
		return $this->ordencompraLogic;
	}

	public function setorden_compraLogic($ordencompraLogic) {
		$this->ordencompraLogic =$ordencompraLogic;
	}


	public $facturaLogic=null;

	public function  getfacturaLogic() {
		return $this->facturaLogic;
	}

	public function setfacturaLogic($facturaLogic) {
		$this->facturaLogic =$facturaLogic;
	}


	public $consignacionLogic=null;

	public function  getconsignacionLogic() {
		return $this->consignacionLogic;
	}

	public function setconsignacionLogic($consignacionLogic) {
		$this->consignacionLogic =$consignacionLogic;
	}


	public $facturaloteLogic=null;

	public function  getfactura_loteLogic() {
		return $this->facturaloteLogic;
	}

	public function setfactura_loteLogic($facturaloteLogic) {
		$this->facturaloteLogic =$facturaloteLogic;
	}


	public $devolucionfacturaLogic=null;

	public function  getdevolucion_facturaLogic() {
		return $this->devolucionfacturaLogic;
	}

	public function setdevolucion_facturaLogic($devolucionfacturaLogic) {
		$this->devolucionfacturaLogic =$devolucionfacturaLogic;
	}


	public $kardexdetalleLogic=null;

	public function  getkardex_detalleLogic() {
		return $this->kardexdetalleLogic;
	}

	public function setkardex_detalleLogic($kardexdetalleLogic) {
		$this->kardexdetalleLogic =$kardexdetalleLogic;
	}


	public $devolucionLogic=null;

	public function  getdevolucionLogic() {
		return $this->devolucionLogic;
	}

	public function setdevolucionLogic($devolucionLogic) {
		$this->devolucionLogic =$devolucionLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajeid_modulo='';
	public string $strMensajeid_tipo_kardex='';
	public string $strMensajenumero='';
	public string $strMensajenumero_documento='';
	public string $strMensajeid_proveedor='';
	public string $strMensajeid_cliente='';
	public string $strMensajetotal='';
	public string $strMensajedescripcion='';
	public string $strMensajeid_estado='';
	public string $strMensajecosto='';
	
	
	public string $strVisibleFK_Idcliente='display:table-row';
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idestado='display:table-row';
	public string $strVisibleFK_Idmodulo='display:table-row';
	public string $strVisibleFK_Idperiodo='display:table-row';
	public string $strVisibleFK_Idproveedor='display:table-row';
	public string $strVisibleFK_Idsucursal='display:table-row';
	public string $strVisibleFK_Idtipo_kardex='display:table-row';
	public string $strVisibleFK_Idusuario='display:table-row';

	
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

	public array $modulosFK=array();

	public function getmodulosFK():array {
		return $this->modulosFK;
	}

	public function setmodulosFK(array $modulosFK) {
		$this->modulosFK = $modulosFK;
	}

	public int $idmoduloDefaultFK=-1;

	public function getIdmoduloDefaultFK():int {
		return $this->idmoduloDefaultFK;
	}

	public function setIdmoduloDefaultFK(int $idmoduloDefaultFK) {
		$this->idmoduloDefaultFK = $idmoduloDefaultFK;
	}

	public array $tipo_kardexsFK=array();

	public function gettipo_kardexsFK():array {
		return $this->tipo_kardexsFK;
	}

	public function settipo_kardexsFK(array $tipo_kardexsFK) {
		$this->tipo_kardexsFK = $tipo_kardexsFK;
	}

	public int $idtipo_kardexDefaultFK=-1;

	public function getIdtipo_kardexDefaultFK():int {
		return $this->idtipo_kardexDefaultFK;
	}

	public function setIdtipo_kardexDefaultFK(int $idtipo_kardexDefaultFK) {
		$this->idtipo_kardexDefaultFK = $idtipo_kardexDefaultFK;
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

	
	
	
	
	
	
	public $strTienePermisosorden_compra='none';
	public $strTienePermisosfactura='none';
	public $strTienePermisosconsignacion='none';
	public $strTienePermisosfactura_lote='none';
	public $strTienePermisosdevolucion_factura='none';
	public $strTienePermisoskardex_detalle='none';
	public $strTienePermisosdevolucion='none';
	
	
	public  $id_clienteFK_Idcliente=null;

	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_estadoFK_Idestado=null;

	public  $id_moduloFK_Idmodulo=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_proveedorFK_Idproveedor=null;

	public  $id_sucursalFK_Idsucursal=null;

	public  $id_tipo_kardexFK_Idtipo_kardex=null;

	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->kardexLogic==null) {
				$this->kardexLogic=new kardex_logic();
			}
			
		} else {
			if($this->kardexLogic==null) {
				$this->kardexLogic=new kardex_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->kardexClase==null) {
				$this->kardexClase=new kardex();
			}
			
			$this->kardexClase->setId(0);	
				
				
			$this->kardexClase->setid_empresa(-1);	
			$this->kardexClase->setid_sucursal(-1);	
			$this->kardexClase->setid_ejercicio(-1);	
			$this->kardexClase->setid_periodo(-1);	
			$this->kardexClase->setid_usuario(-1);	
			$this->kardexClase->setid_modulo(-1);	
			$this->kardexClase->setid_tipo_kardex(-1);	
			$this->kardexClase->setnumero('');	
			$this->kardexClase->setnumero_documento('');	
			$this->kardexClase->setid_proveedor(null);	
			$this->kardexClase->setid_cliente(null);	
			$this->kardexClase->settotal(0.0);	
			$this->kardexClase->setdescripcion('');	
			$this->kardexClase->setid_estado(-1);	
			$this->kardexClase->setcosto(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('kardex');
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
		$this->cargarParametrosReporteBase('kardex');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('kardex');
	}
	
	public function actualizarControllerConReturnGeneral(kardex_param_return $kardexReturnGeneral) {
		if($kardexReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajeskardexsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$kardexReturnGeneral->getsMensajeProceso();
		}
		
		if($kardexReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$kardexReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($kardexReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$kardexReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$kardexReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($kardexReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($kardexReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$kardexReturnGeneral->getsFuncionJs();
		}
		
		if($kardexReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(kardex_session $kardex_session){
		$this->strStyleDivArbol=$kardex_session->strStyleDivArbol;	
		$this->strStyleDivContent=$kardex_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$kardex_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$kardex_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$kardex_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$kardex_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$kardex_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(kardex_session $kardex_session){
		$kardex_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$kardex_session->strStyleDivHeader='display:none';			
		$kardex_session->strStyleDivContent='width:93%;height:100%';	
		$kardex_session->strStyleDivOpcionesBanner='display:none';	
		$kardex_session->strStyleDivExpandirColapsar='display:none';	
		$kardex_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(kardex_control $kardex_control_session){
		$this->idNuevo=$kardex_control_session->idNuevo;
		$this->kardexActual=$kardex_control_session->kardexActual;
		$this->kardex=$kardex_control_session->kardex;
		$this->kardexClase=$kardex_control_session->kardexClase;
		$this->kardexs=$kardex_control_session->kardexs;
		$this->kardexsEliminados=$kardex_control_session->kardexsEliminados;
		$this->kardex=$kardex_control_session->kardex;
		$this->kardexsReporte=$kardex_control_session->kardexsReporte;
		$this->kardexsSeleccionados=$kardex_control_session->kardexsSeleccionados;
		$this->arrOrderBy=$kardex_control_session->arrOrderBy;
		$this->arrOrderByRel=$kardex_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$kardex_control_session->arrHistoryWebs;
		$this->arrSessionBases=$kardex_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadkardex=$kardex_control_session->strTypeOnLoadkardex;
		$this->strTipoPaginaAuxiliarkardex=$kardex_control_session->strTipoPaginaAuxiliarkardex;
		$this->strTipoUsuarioAuxiliarkardex=$kardex_control_session->strTipoUsuarioAuxiliarkardex;	
		
		$this->bitEsPopup=$kardex_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$kardex_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$kardex_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$kardex_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$kardex_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$kardex_control_session->strSufijo;
		$this->bitEsRelaciones=$kardex_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$kardex_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$kardex_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$kardex_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$kardex_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$kardex_control_session->strTituloTabla;
		$this->strTituloPathPagina=$kardex_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$kardex_control_session->strTituloPathElementoActual;
		
		if($this->kardexLogic==null) {			
			$this->kardexLogic=new kardex_logic();
		}
		
		
		if($this->kardexClase==null) {
			$this->kardexClase=new kardex();	
		}
		
		$this->kardexLogic->setkardex($this->kardexClase);
		
		
		if($this->kardexs==null) {
			$this->kardexs=array();	
		}
		
		$this->kardexLogic->setkardexs($this->kardexs);
		
		
		$this->strTipoView=$kardex_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$kardex_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$kardex_control_session->datosCliente;
		$this->strAccionBusqueda=$kardex_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$kardex_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$kardex_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$kardex_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$kardex_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$kardex_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$kardex_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$kardex_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$kardex_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$kardex_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$kardex_control_session->strTipoPaginacion;
		$this->strTipoAccion=$kardex_control_session->strTipoAccion;
		$this->tiposReportes=$kardex_control_session->tiposReportes;
		$this->tiposReporte=$kardex_control_session->tiposReporte;
		$this->tiposAcciones=$kardex_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$kardex_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$kardex_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$kardex_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$kardex_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$kardex_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$kardex_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$kardex_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$kardex_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$kardex_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$kardex_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$kardex_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$kardex_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$kardex_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$kardex_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$kardex_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$kardex_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$kardex_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$kardex_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$kardex_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$kardex_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$kardex_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$kardex_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$kardex_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$kardex_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$kardex_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$kardex_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$kardex_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$kardex_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$kardex_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$kardex_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$kardex_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$kardex_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$kardex_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$kardex_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$kardex_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$kardex_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$kardex_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$kardex_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$kardex_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$kardex_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$kardex_control_session->resumenUsuarioActual;	
		$this->moduloActual=$kardex_control_session->moduloActual;	
		$this->opcionActual=$kardex_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$kardex_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$kardex_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$kardex_session=unserialize($this->Session->read(kardex_util::$STR_SESSION_NAME));
				
		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		$this->strStyleDivArbol=$kardex_session->strStyleDivArbol;	
		$this->strStyleDivContent=$kardex_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$kardex_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$kardex_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$kardex_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$kardex_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$kardex_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$kardex_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$kardex_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$kardex_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$kardex_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$kardex_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$kardex_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$kardex_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$kardex_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$kardex_control_session->strMensajeid_usuario;
		$this->strMensajeid_modulo=$kardex_control_session->strMensajeid_modulo;
		$this->strMensajeid_tipo_kardex=$kardex_control_session->strMensajeid_tipo_kardex;
		$this->strMensajenumero=$kardex_control_session->strMensajenumero;
		$this->strMensajenumero_documento=$kardex_control_session->strMensajenumero_documento;
		$this->strMensajeid_proveedor=$kardex_control_session->strMensajeid_proveedor;
		$this->strMensajeid_cliente=$kardex_control_session->strMensajeid_cliente;
		$this->strMensajetotal=$kardex_control_session->strMensajetotal;
		$this->strMensajedescripcion=$kardex_control_session->strMensajedescripcion;
		$this->strMensajeid_estado=$kardex_control_session->strMensajeid_estado;
		$this->strMensajecosto=$kardex_control_session->strMensajecosto;
			
		
		$this->empresasFK=$kardex_control_session->empresasFK;
		$this->idempresaDefaultFK=$kardex_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$kardex_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$kardex_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$kardex_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$kardex_control_session->idejercicioDefaultFK;
		$this->periodosFK=$kardex_control_session->periodosFK;
		$this->idperiodoDefaultFK=$kardex_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$kardex_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$kardex_control_session->idusuarioDefaultFK;
		$this->modulosFK=$kardex_control_session->modulosFK;
		$this->idmoduloDefaultFK=$kardex_control_session->idmoduloDefaultFK;
		$this->tipo_kardexsFK=$kardex_control_session->tipo_kardexsFK;
		$this->idtipo_kardexDefaultFK=$kardex_control_session->idtipo_kardexDefaultFK;
		$this->proveedorsFK=$kardex_control_session->proveedorsFK;
		$this->idproveedorDefaultFK=$kardex_control_session->idproveedorDefaultFK;
		$this->clientesFK=$kardex_control_session->clientesFK;
		$this->idclienteDefaultFK=$kardex_control_session->idclienteDefaultFK;
		$this->estadosFK=$kardex_control_session->estadosFK;
		$this->idestadoDefaultFK=$kardex_control_session->idestadoDefaultFK;
		
		
		$this->strVisibleFK_Idcliente=$kardex_control_session->strVisibleFK_Idcliente;
		$this->strVisibleFK_Idejercicio=$kardex_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$kardex_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idestado=$kardex_control_session->strVisibleFK_Idestado;
		$this->strVisibleFK_Idmodulo=$kardex_control_session->strVisibleFK_Idmodulo;
		$this->strVisibleFK_Idperiodo=$kardex_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idproveedor=$kardex_control_session->strVisibleFK_Idproveedor;
		$this->strVisibleFK_Idsucursal=$kardex_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idtipo_kardex=$kardex_control_session->strVisibleFK_Idtipo_kardex;
		$this->strVisibleFK_Idusuario=$kardex_control_session->strVisibleFK_Idusuario;
		
		
		$this->strTienePermisosorden_compra=$kardex_control_session->strTienePermisosorden_compra;
		$this->strTienePermisosfactura=$kardex_control_session->strTienePermisosfactura;
		$this->strTienePermisosconsignacion=$kardex_control_session->strTienePermisosconsignacion;
		$this->strTienePermisosfactura_lote=$kardex_control_session->strTienePermisosfactura_lote;
		$this->strTienePermisosdevolucion_factura=$kardex_control_session->strTienePermisosdevolucion_factura;
		$this->strTienePermisoskardex_detalle=$kardex_control_session->strTienePermisoskardex_detalle;
		$this->strTienePermisosdevolucion=$kardex_control_session->strTienePermisosdevolucion;
		
		
		$this->id_clienteFK_Idcliente=$kardex_control_session->id_clienteFK_Idcliente;
		$this->id_ejercicioFK_Idejercicio=$kardex_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$kardex_control_session->id_empresaFK_Idempresa;
		$this->id_estadoFK_Idestado=$kardex_control_session->id_estadoFK_Idestado;
		$this->id_moduloFK_Idmodulo=$kardex_control_session->id_moduloFK_Idmodulo;
		$this->id_periodoFK_Idperiodo=$kardex_control_session->id_periodoFK_Idperiodo;
		$this->id_proveedorFK_Idproveedor=$kardex_control_session->id_proveedorFK_Idproveedor;
		$this->id_sucursalFK_Idsucursal=$kardex_control_session->id_sucursalFK_Idsucursal;
		$this->id_tipo_kardexFK_Idtipo_kardex=$kardex_control_session->id_tipo_kardexFK_Idtipo_kardex;
		$this->id_usuarioFK_Idusuario=$kardex_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getkardexControllerAdditional() {
		return $this->kardexControllerAdditional;
	}

	public function setkardexControllerAdditional($kardexControllerAdditional) {
		$this->kardexControllerAdditional = $kardexControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getkardexActual() : kardex {
		return $this->kardexActual;
	}

	public function setkardexActual(kardex $kardexActual) {
		$this->kardexActual = $kardexActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidkardex() : int {
		return $this->idkardex;
	}

	public function setidkardex(int $idkardex) {
		$this->idkardex = $idkardex;
	}
	
	public function getkardex() : kardex {
		return $this->kardex;
	}

	public function setkardex(kardex $kardex) {
		$this->kardex = $kardex;
	}
		
	public function getkardexLogic() : kardex_logic {		
		return $this->kardexLogic;
	}

	public function setkardexLogic(kardex_logic $kardexLogic) {
		$this->kardexLogic = $kardexLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getkardexsModel() {		
		try {						
			/*kardexsModel.setWrappedData(kardexLogic->getkardexs());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->kardexsModel;
	}
	
	public function setkardexsModel($kardexsModel) {
		$this->kardexsModel = $kardexsModel;
	}
	
	public function getkardexs() : array {		
		return $this->kardexs;
	}
	
	public function setkardexs(array $kardexs) {
		$this->kardexs= $kardexs;
	}
	
	public function getkardexsEliminados() : array {		
		return $this->kardexsEliminados;
	}
	
	public function setkardexsEliminados(array $kardexsEliminados) {
		$this->kardexsEliminados= $kardexsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getkardexActualFromListDataModel() {
		try {
			/*$kardexClase= $this->kardexsModel->getRowData();*/
			
			/*return $kardex;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
