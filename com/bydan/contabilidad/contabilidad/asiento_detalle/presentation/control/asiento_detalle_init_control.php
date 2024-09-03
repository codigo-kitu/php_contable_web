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

namespace com\bydan\contabilidad\contabilidad\asiento_detalle\presentation\control;

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

use com\bydan\contabilidad\contabilidad\asiento_detalle\business\entity\asiento_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/asiento_detalle/util/asiento_detalle_carga.php');
use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_carga;

use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_util;
use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_param_return;
use com\bydan\contabilidad\contabilidad\asiento_detalle\business\logic\asiento_detalle_logic;
use com\bydan\contabilidad\contabilidad\asiento_detalle\presentation\session\asiento_detalle_session;


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

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;
use com\bydan\contabilidad\contabilidad\centro_costo\business\logic\centro_costo_logic;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_carga;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
asiento_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
asiento_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
asiento_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
asiento_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*asiento_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class asiento_detalle_init_control extends ControllerBase {	
	
	public $asiento_detalleClase=null;	
	public $asiento_detallesModel=null;	
	public $asiento_detallesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idasiento_detalle=0;	
	public ?int $idasiento_detalleActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $asiento_detalleLogic=null;
	
	public $asiento_detalleActual=null;	
	
	public $asiento_detalle=null;
	public $asiento_detalles=null;
	public $asiento_detallesEliminados=array();
	public $asiento_detallesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $asiento_detallesLocal=array();
	public ?array $asiento_detallesReporte=null;
	public ?array $asiento_detallesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadasiento_detalle='onload';
	public string $strTipoPaginaAuxiliarasiento_detalle='none';
	public string $strTipoUsuarioAuxiliarasiento_detalle='none';
		
	public $asiento_detalleReturnGeneral=null;
	public $asiento_detalleParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $asiento_detalleModel=null;
	public $asiento_detalleControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajeid_asiento='';
	public string $strMensajeid_cuenta='';
	public string $strMensajeid_centro_costo='';
	public string $strMensajeorden='';
	public string $strMensajedebito='';
	public string $strMensajecredito='';
	public string $strMensajevalor_base='';
	public string $strMensajecuenta_contable='';
	
	
	public string $strVisibleFK_Idasiento='display:table-row';
	public string $strVisibleFK_Idcentro_costo='display:table-row';
	public string $strVisibleFK_Idcuenta='display:table-row';
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idperiodo='display:table-row';
	public string $strVisibleFK_Idsucursal='display:table-row';
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

	public array $centro_costosFK=array();

	public function getcentro_costosFK():array {
		return $this->centro_costosFK;
	}

	public function setcentro_costosFK(array $centro_costosFK) {
		$this->centro_costosFK = $centro_costosFK;
	}

	public int $idcentro_costoDefaultFK=-1;

	public function getIdcentro_costoDefaultFK():int {
		return $this->idcentro_costoDefaultFK;
	}

	public function setIdcentro_costoDefaultFK(int $idcentro_costoDefaultFK) {
		$this->idcentro_costoDefaultFK = $idcentro_costoDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_asientoFK_Idasiento=null;

	public  $id_centro_costoFK_Idcentro_costo=null;

	public  $id_cuentaFK_Idcuenta=null;

	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_sucursalFK_Idsucursal=null;

	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->asiento_detalleLogic==null) {
				$this->asiento_detalleLogic=new asiento_detalle_logic();
			}
			
		} else {
			if($this->asiento_detalleLogic==null) {
				$this->asiento_detalleLogic=new asiento_detalle_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->asiento_detalleClase==null) {
				$this->asiento_detalleClase=new asiento_detalle();
			}
			
			$this->asiento_detalleClase->setId(0);	
				
				
			$this->asiento_detalleClase->setid_empresa(-1);	
			$this->asiento_detalleClase->setid_sucursal(-1);	
			$this->asiento_detalleClase->setid_ejercicio(-1);	
			$this->asiento_detalleClase->setid_periodo(-1);	
			$this->asiento_detalleClase->setid_usuario(-1);	
			$this->asiento_detalleClase->setid_asiento(-1);	
			$this->asiento_detalleClase->setid_cuenta(-1);	
			$this->asiento_detalleClase->setid_centro_costo(-1);	
			$this->asiento_detalleClase->setorden(0);	
			$this->asiento_detalleClase->setdebito(0.0);	
			$this->asiento_detalleClase->setcredito(0.0);	
			$this->asiento_detalleClase->setvalor_base(0.0);	
			$this->asiento_detalleClase->setcuenta_contable('');	
			
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
		$this->prepararEjecutarMantenimientoBase('asiento_detalle');
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
		$this->cargarParametrosReporteBase('asiento_detalle');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('asiento_detalle');
	}
	
	public function actualizarControllerConReturnGeneral(asiento_detalle_param_return $asiento_detalleReturnGeneral) {
		if($asiento_detalleReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesasiento_detallesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$asiento_detalleReturnGeneral->getsMensajeProceso();
		}
		
		if($asiento_detalleReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$asiento_detalleReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($asiento_detalleReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$asiento_detalleReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$asiento_detalleReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($asiento_detalleReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($asiento_detalleReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$asiento_detalleReturnGeneral->getsFuncionJs();
		}
		
		if($asiento_detalleReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(asiento_detalle_session $asiento_detalle_session){
		$this->strStyleDivArbol=$asiento_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$asiento_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$asiento_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$asiento_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$asiento_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$asiento_detalle_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$asiento_detalle_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(asiento_detalle_session $asiento_detalle_session){
		$asiento_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$asiento_detalle_session->strStyleDivHeader='display:none';			
		$asiento_detalle_session->strStyleDivContent='width:93%;height:100%';	
		$asiento_detalle_session->strStyleDivOpcionesBanner='display:none';	
		$asiento_detalle_session->strStyleDivExpandirColapsar='display:none';	
		$asiento_detalle_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(asiento_detalle_control $asiento_detalle_control_session){
		$this->idNuevo=$asiento_detalle_control_session->idNuevo;
		$this->asiento_detalleActual=$asiento_detalle_control_session->asiento_detalleActual;
		$this->asiento_detalle=$asiento_detalle_control_session->asiento_detalle;
		$this->asiento_detalleClase=$asiento_detalle_control_session->asiento_detalleClase;
		$this->asiento_detalles=$asiento_detalle_control_session->asiento_detalles;
		$this->asiento_detallesEliminados=$asiento_detalle_control_session->asiento_detallesEliminados;
		$this->asiento_detalle=$asiento_detalle_control_session->asiento_detalle;
		$this->asiento_detallesReporte=$asiento_detalle_control_session->asiento_detallesReporte;
		$this->asiento_detallesSeleccionados=$asiento_detalle_control_session->asiento_detallesSeleccionados;
		$this->arrOrderBy=$asiento_detalle_control_session->arrOrderBy;
		$this->arrOrderByRel=$asiento_detalle_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$asiento_detalle_control_session->arrHistoryWebs;
		$this->arrSessionBases=$asiento_detalle_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadasiento_detalle=$asiento_detalle_control_session->strTypeOnLoadasiento_detalle;
		$this->strTipoPaginaAuxiliarasiento_detalle=$asiento_detalle_control_session->strTipoPaginaAuxiliarasiento_detalle;
		$this->strTipoUsuarioAuxiliarasiento_detalle=$asiento_detalle_control_session->strTipoUsuarioAuxiliarasiento_detalle;	
		
		$this->bitEsPopup=$asiento_detalle_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$asiento_detalle_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$asiento_detalle_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$asiento_detalle_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$asiento_detalle_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$asiento_detalle_control_session->strSufijo;
		$this->bitEsRelaciones=$asiento_detalle_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$asiento_detalle_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$asiento_detalle_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$asiento_detalle_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$asiento_detalle_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$asiento_detalle_control_session->strTituloTabla;
		$this->strTituloPathPagina=$asiento_detalle_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$asiento_detalle_control_session->strTituloPathElementoActual;
		
		if($this->asiento_detalleLogic==null) {			
			$this->asiento_detalleLogic=new asiento_detalle_logic();
		}
		
		
		if($this->asiento_detalleClase==null) {
			$this->asiento_detalleClase=new asiento_detalle();	
		}
		
		$this->asiento_detalleLogic->setasiento_detalle($this->asiento_detalleClase);
		
		
		if($this->asiento_detalles==null) {
			$this->asiento_detalles=array();	
		}
		
		$this->asiento_detalleLogic->setasiento_detalles($this->asiento_detalles);
		
		
		$this->strTipoView=$asiento_detalle_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$asiento_detalle_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$asiento_detalle_control_session->datosCliente;
		$this->strAccionBusqueda=$asiento_detalle_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$asiento_detalle_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$asiento_detalle_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$asiento_detalle_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$asiento_detalle_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$asiento_detalle_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$asiento_detalle_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$asiento_detalle_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$asiento_detalle_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$asiento_detalle_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$asiento_detalle_control_session->strTipoPaginacion;
		$this->strTipoAccion=$asiento_detalle_control_session->strTipoAccion;
		$this->tiposReportes=$asiento_detalle_control_session->tiposReportes;
		$this->tiposReporte=$asiento_detalle_control_session->tiposReporte;
		$this->tiposAcciones=$asiento_detalle_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$asiento_detalle_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$asiento_detalle_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$asiento_detalle_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$asiento_detalle_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$asiento_detalle_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$asiento_detalle_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$asiento_detalle_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$asiento_detalle_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$asiento_detalle_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$asiento_detalle_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$asiento_detalle_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$asiento_detalle_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$asiento_detalle_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$asiento_detalle_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$asiento_detalle_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$asiento_detalle_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$asiento_detalle_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$asiento_detalle_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$asiento_detalle_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$asiento_detalle_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$asiento_detalle_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$asiento_detalle_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$asiento_detalle_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$asiento_detalle_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$asiento_detalle_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$asiento_detalle_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$asiento_detalle_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$asiento_detalle_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$asiento_detalle_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$asiento_detalle_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$asiento_detalle_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$asiento_detalle_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$asiento_detalle_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$asiento_detalle_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$asiento_detalle_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$asiento_detalle_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$asiento_detalle_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$asiento_detalle_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$asiento_detalle_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$asiento_detalle_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$asiento_detalle_control_session->resumenUsuarioActual;	
		$this->moduloActual=$asiento_detalle_control_session->moduloActual;	
		$this->opcionActual=$asiento_detalle_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$asiento_detalle_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$asiento_detalle_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$asiento_detalle_session=unserialize($this->Session->read(asiento_detalle_util::$STR_SESSION_NAME));
				
		if($asiento_detalle_session==null) {
			$asiento_detalle_session=new asiento_detalle_session();
		}
		
		$this->strStyleDivArbol=$asiento_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$asiento_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$asiento_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$asiento_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$asiento_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$asiento_detalle_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$asiento_detalle_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$asiento_detalle_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$asiento_detalle_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$asiento_detalle_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$asiento_detalle_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$asiento_detalle_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$asiento_detalle_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$asiento_detalle_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$asiento_detalle_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$asiento_detalle_control_session->strMensajeid_usuario;
		$this->strMensajeid_asiento=$asiento_detalle_control_session->strMensajeid_asiento;
		$this->strMensajeid_cuenta=$asiento_detalle_control_session->strMensajeid_cuenta;
		$this->strMensajeid_centro_costo=$asiento_detalle_control_session->strMensajeid_centro_costo;
		$this->strMensajeorden=$asiento_detalle_control_session->strMensajeorden;
		$this->strMensajedebito=$asiento_detalle_control_session->strMensajedebito;
		$this->strMensajecredito=$asiento_detalle_control_session->strMensajecredito;
		$this->strMensajevalor_base=$asiento_detalle_control_session->strMensajevalor_base;
		$this->strMensajecuenta_contable=$asiento_detalle_control_session->strMensajecuenta_contable;
			
		
		$this->empresasFK=$asiento_detalle_control_session->empresasFK;
		$this->idempresaDefaultFK=$asiento_detalle_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$asiento_detalle_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$asiento_detalle_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$asiento_detalle_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$asiento_detalle_control_session->idejercicioDefaultFK;
		$this->periodosFK=$asiento_detalle_control_session->periodosFK;
		$this->idperiodoDefaultFK=$asiento_detalle_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$asiento_detalle_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$asiento_detalle_control_session->idusuarioDefaultFK;
		$this->asientosFK=$asiento_detalle_control_session->asientosFK;
		$this->idasientoDefaultFK=$asiento_detalle_control_session->idasientoDefaultFK;
		$this->cuentasFK=$asiento_detalle_control_session->cuentasFK;
		$this->idcuentaDefaultFK=$asiento_detalle_control_session->idcuentaDefaultFK;
		$this->centro_costosFK=$asiento_detalle_control_session->centro_costosFK;
		$this->idcentro_costoDefaultFK=$asiento_detalle_control_session->idcentro_costoDefaultFK;
		
		
		$this->strVisibleFK_Idasiento=$asiento_detalle_control_session->strVisibleFK_Idasiento;
		$this->strVisibleFK_Idcentro_costo=$asiento_detalle_control_session->strVisibleFK_Idcentro_costo;
		$this->strVisibleFK_Idcuenta=$asiento_detalle_control_session->strVisibleFK_Idcuenta;
		$this->strVisibleFK_Idejercicio=$asiento_detalle_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$asiento_detalle_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idperiodo=$asiento_detalle_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idsucursal=$asiento_detalle_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idusuario=$asiento_detalle_control_session->strVisibleFK_Idusuario;
		
		
		
		
		$this->id_asientoFK_Idasiento=$asiento_detalle_control_session->id_asientoFK_Idasiento;
		$this->id_centro_costoFK_Idcentro_costo=$asiento_detalle_control_session->id_centro_costoFK_Idcentro_costo;
		$this->id_cuentaFK_Idcuenta=$asiento_detalle_control_session->id_cuentaFK_Idcuenta;
		$this->id_ejercicioFK_Idejercicio=$asiento_detalle_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$asiento_detalle_control_session->id_empresaFK_Idempresa;
		$this->id_periodoFK_Idperiodo=$asiento_detalle_control_session->id_periodoFK_Idperiodo;
		$this->id_sucursalFK_Idsucursal=$asiento_detalle_control_session->id_sucursalFK_Idsucursal;
		$this->id_usuarioFK_Idusuario=$asiento_detalle_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getasiento_detalleControllerAdditional() {
		return $this->asiento_detalleControllerAdditional;
	}

	public function setasiento_detalleControllerAdditional($asiento_detalleControllerAdditional) {
		$this->asiento_detalleControllerAdditional = $asiento_detalleControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getasiento_detalleActual() : asiento_detalle {
		return $this->asiento_detalleActual;
	}

	public function setasiento_detalleActual(asiento_detalle $asiento_detalleActual) {
		$this->asiento_detalleActual = $asiento_detalleActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidasiento_detalle() : int {
		return $this->idasiento_detalle;
	}

	public function setidasiento_detalle(int $idasiento_detalle) {
		$this->idasiento_detalle = $idasiento_detalle;
	}
	
	public function getasiento_detalle() : asiento_detalle {
		return $this->asiento_detalle;
	}

	public function setasiento_detalle(asiento_detalle $asiento_detalle) {
		$this->asiento_detalle = $asiento_detalle;
	}
		
	public function getasiento_detalleLogic() : asiento_detalle_logic {		
		return $this->asiento_detalleLogic;
	}

	public function setasiento_detalleLogic(asiento_detalle_logic $asiento_detalleLogic) {
		$this->asiento_detalleLogic = $asiento_detalleLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getasiento_detallesModel() {		
		try {						
			/*asiento_detallesModel.setWrappedData(asiento_detalleLogic->getasiento_detalles());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->asiento_detallesModel;
	}
	
	public function setasiento_detallesModel($asiento_detallesModel) {
		$this->asiento_detallesModel = $asiento_detallesModel;
	}
	
	public function getasiento_detalles() : array {		
		return $this->asiento_detalles;
	}
	
	public function setasiento_detalles(array $asiento_detalles) {
		$this->asiento_detalles= $asiento_detalles;
	}
	
	public function getasiento_detallesEliminados() : array {		
		return $this->asiento_detallesEliminados;
	}
	
	public function setasiento_detallesEliminados(array $asiento_detallesEliminados) {
		$this->asiento_detallesEliminados= $asiento_detallesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getasiento_detalleActualFromListDataModel() {
		try {
			/*$asiento_detalleClase= $this->asiento_detallesModel->getRowData();*/
			
			/*return $asiento_detalle;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
