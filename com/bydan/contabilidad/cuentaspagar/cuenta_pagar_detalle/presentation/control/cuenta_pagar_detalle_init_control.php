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

namespace com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\business\entity\cuenta_pagar_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/cuenta_pagar_detalle/util/cuenta_pagar_detalle_carga.php');
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\util\cuenta_pagar_detalle_carga;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\util\cuenta_pagar_detalle_util;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\util\cuenta_pagar_detalle_param_return;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\business\logic\cuenta_pagar_detalle_logic;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\presentation\session\cuenta_pagar_detalle_session;


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

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\logic\cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
cuenta_pagar_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cuenta_pagar_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cuenta_pagar_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cuenta_pagar_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cuenta_pagar_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class cuenta_pagar_detalle_init_control extends ControllerBase {	
	
	public $cuenta_pagar_detalleClase=null;	
	public $cuenta_pagar_detallesModel=null;	
	public $cuenta_pagar_detallesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcuenta_pagar_detalle=0;	
	public ?int $idcuenta_pagar_detalleActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $cuenta_pagar_detalleLogic=null;
	
	public $cuenta_pagar_detalleActual=null;	
	
	public $cuenta_pagar_detalle=null;
	public $cuenta_pagar_detalles=null;
	public $cuenta_pagar_detallesEliminados=array();
	public $cuenta_pagar_detallesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $cuenta_pagar_detallesLocal=array();
	public ?array $cuenta_pagar_detallesReporte=null;
	public ?array $cuenta_pagar_detallesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcuenta_pagar_detalle='onload';
	public string $strTipoPaginaAuxiliarcuenta_pagar_detalle='none';
	public string $strTipoUsuarioAuxiliarcuenta_pagar_detalle='none';
		
	public $cuenta_pagar_detalleReturnGeneral=null;
	public $cuenta_pagar_detalleParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $cuenta_pagar_detalleModel=null;
	public $cuenta_pagar_detalleControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajeid_cuenta_pagar='';
	public string $strMensajenumero='';
	public string $strMensajefecha_emision='';
	public string $strMensajefecha_vence='';
	public string $strMensajereferencia='';
	public string $strMensajemonto='';
	public string $strMensajedebito='';
	public string $strMensajecredito='';
	public string $strMensajedescripcion='';
	public string $strMensajeid_estado='';
	
	
	public string $strVisibleFK_Idcuenta_pagar='display:table-row';
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idestado='display:table-row';
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

	public array $cuenta_pagarsFK=array();

	public function getcuenta_pagarsFK():array {
		return $this->cuenta_pagarsFK;
	}

	public function setcuenta_pagarsFK(array $cuenta_pagarsFK) {
		$this->cuenta_pagarsFK = $cuenta_pagarsFK;
	}

	public int $idcuenta_pagarDefaultFK=-1;

	public function getIdcuenta_pagarDefaultFK():int {
		return $this->idcuenta_pagarDefaultFK;
	}

	public function setIdcuenta_pagarDefaultFK(int $idcuenta_pagarDefaultFK) {
		$this->idcuenta_pagarDefaultFK = $idcuenta_pagarDefaultFK;
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

	
	
	
	
	
	
	
	
	public  $id_cuenta_pagarFK_Idcuenta_pagar=null;

	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_estadoFK_Idestado=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_sucursalFK_Idsucursal=null;

	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->cuenta_pagar_detalleLogic==null) {
				$this->cuenta_pagar_detalleLogic=new cuenta_pagar_detalle_logic();
			}
			
		} else {
			if($this->cuenta_pagar_detalleLogic==null) {
				$this->cuenta_pagar_detalleLogic=new cuenta_pagar_detalle_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->cuenta_pagar_detalleClase==null) {
				$this->cuenta_pagar_detalleClase=new cuenta_pagar_detalle();
			}
			
			$this->cuenta_pagar_detalleClase->setId(0);	
				
				
			$this->cuenta_pagar_detalleClase->setid_empresa(-1);	
			$this->cuenta_pagar_detalleClase->setid_sucursal(-1);	
			$this->cuenta_pagar_detalleClase->setid_ejercicio(-1);	
			$this->cuenta_pagar_detalleClase->setid_periodo(-1);	
			$this->cuenta_pagar_detalleClase->setid_usuario(-1);	
			$this->cuenta_pagar_detalleClase->setid_cuenta_pagar(-1);	
			$this->cuenta_pagar_detalleClase->setnumero('');	
			$this->cuenta_pagar_detalleClase->setfecha_emision(date('Y-m-d'));	
			$this->cuenta_pagar_detalleClase->setfecha_vence(date('Y-m-d'));	
			$this->cuenta_pagar_detalleClase->setreferencia('');	
			$this->cuenta_pagar_detalleClase->setmonto(0.0);	
			$this->cuenta_pagar_detalleClase->setdebito(0.0);	
			$this->cuenta_pagar_detalleClase->setcredito(0.0);	
			$this->cuenta_pagar_detalleClase->setdescripcion('');	
			$this->cuenta_pagar_detalleClase->setid_estado(-1);	
			
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
		$this->prepararEjecutarMantenimientoBase('cuenta_pagar_detalle');
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
		$this->cargarParametrosReporteBase('cuenta_pagar_detalle');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('cuenta_pagar_detalle');
	}
	
	public function actualizarControllerConReturnGeneral(cuenta_pagar_detalle_param_return $cuenta_pagar_detalleReturnGeneral) {
		if($cuenta_pagar_detalleReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescuenta_pagar_detallesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$cuenta_pagar_detalleReturnGeneral->getsMensajeProceso();
		}
		
		if($cuenta_pagar_detalleReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$cuenta_pagar_detalleReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($cuenta_pagar_detalleReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$cuenta_pagar_detalleReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$cuenta_pagar_detalleReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($cuenta_pagar_detalleReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($cuenta_pagar_detalleReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$cuenta_pagar_detalleReturnGeneral->getsFuncionJs();
		}
		
		if($cuenta_pagar_detalleReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(cuenta_pagar_detalle_session $cuenta_pagar_detalle_session){
		$this->strStyleDivArbol=$cuenta_pagar_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cuenta_pagar_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cuenta_pagar_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cuenta_pagar_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cuenta_pagar_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cuenta_pagar_detalle_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$cuenta_pagar_detalle_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(cuenta_pagar_detalle_session $cuenta_pagar_detalle_session){
		$cuenta_pagar_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$cuenta_pagar_detalle_session->strStyleDivHeader='display:none';			
		$cuenta_pagar_detalle_session->strStyleDivContent='width:93%;height:100%';	
		$cuenta_pagar_detalle_session->strStyleDivOpcionesBanner='display:none';	
		$cuenta_pagar_detalle_session->strStyleDivExpandirColapsar='display:none';	
		$cuenta_pagar_detalle_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(cuenta_pagar_detalle_control $cuenta_pagar_detalle_control_session){
		$this->idNuevo=$cuenta_pagar_detalle_control_session->idNuevo;
		$this->cuenta_pagar_detalleActual=$cuenta_pagar_detalle_control_session->cuenta_pagar_detalleActual;
		$this->cuenta_pagar_detalle=$cuenta_pagar_detalle_control_session->cuenta_pagar_detalle;
		$this->cuenta_pagar_detalleClase=$cuenta_pagar_detalle_control_session->cuenta_pagar_detalleClase;
		$this->cuenta_pagar_detalles=$cuenta_pagar_detalle_control_session->cuenta_pagar_detalles;
		$this->cuenta_pagar_detallesEliminados=$cuenta_pagar_detalle_control_session->cuenta_pagar_detallesEliminados;
		$this->cuenta_pagar_detalle=$cuenta_pagar_detalle_control_session->cuenta_pagar_detalle;
		$this->cuenta_pagar_detallesReporte=$cuenta_pagar_detalle_control_session->cuenta_pagar_detallesReporte;
		$this->cuenta_pagar_detallesSeleccionados=$cuenta_pagar_detalle_control_session->cuenta_pagar_detallesSeleccionados;
		$this->arrOrderBy=$cuenta_pagar_detalle_control_session->arrOrderBy;
		$this->arrOrderByRel=$cuenta_pagar_detalle_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$cuenta_pagar_detalle_control_session->arrHistoryWebs;
		$this->arrSessionBases=$cuenta_pagar_detalle_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcuenta_pagar_detalle=$cuenta_pagar_detalle_control_session->strTypeOnLoadcuenta_pagar_detalle;
		$this->strTipoPaginaAuxiliarcuenta_pagar_detalle=$cuenta_pagar_detalle_control_session->strTipoPaginaAuxiliarcuenta_pagar_detalle;
		$this->strTipoUsuarioAuxiliarcuenta_pagar_detalle=$cuenta_pagar_detalle_control_session->strTipoUsuarioAuxiliarcuenta_pagar_detalle;	
		
		$this->bitEsPopup=$cuenta_pagar_detalle_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$cuenta_pagar_detalle_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$cuenta_pagar_detalle_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$cuenta_pagar_detalle_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$cuenta_pagar_detalle_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$cuenta_pagar_detalle_control_session->strSufijo;
		$this->bitEsRelaciones=$cuenta_pagar_detalle_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$cuenta_pagar_detalle_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$cuenta_pagar_detalle_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$cuenta_pagar_detalle_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$cuenta_pagar_detalle_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$cuenta_pagar_detalle_control_session->strTituloTabla;
		$this->strTituloPathPagina=$cuenta_pagar_detalle_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$cuenta_pagar_detalle_control_session->strTituloPathElementoActual;
		
		if($this->cuenta_pagar_detalleLogic==null) {			
			$this->cuenta_pagar_detalleLogic=new cuenta_pagar_detalle_logic();
		}
		
		
		if($this->cuenta_pagar_detalleClase==null) {
			$this->cuenta_pagar_detalleClase=new cuenta_pagar_detalle();	
		}
		
		$this->cuenta_pagar_detalleLogic->setcuenta_pagar_detalle($this->cuenta_pagar_detalleClase);
		
		
		if($this->cuenta_pagar_detalles==null) {
			$this->cuenta_pagar_detalles=array();	
		}
		
		$this->cuenta_pagar_detalleLogic->setcuenta_pagar_detalles($this->cuenta_pagar_detalles);
		
		
		$this->strTipoView=$cuenta_pagar_detalle_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$cuenta_pagar_detalle_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$cuenta_pagar_detalle_control_session->datosCliente;
		$this->strAccionBusqueda=$cuenta_pagar_detalle_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$cuenta_pagar_detalle_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$cuenta_pagar_detalle_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$cuenta_pagar_detalle_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$cuenta_pagar_detalle_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$cuenta_pagar_detalle_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$cuenta_pagar_detalle_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$cuenta_pagar_detalle_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$cuenta_pagar_detalle_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$cuenta_pagar_detalle_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$cuenta_pagar_detalle_control_session->strTipoPaginacion;
		$this->strTipoAccion=$cuenta_pagar_detalle_control_session->strTipoAccion;
		$this->tiposReportes=$cuenta_pagar_detalle_control_session->tiposReportes;
		$this->tiposReporte=$cuenta_pagar_detalle_control_session->tiposReporte;
		$this->tiposAcciones=$cuenta_pagar_detalle_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$cuenta_pagar_detalle_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$cuenta_pagar_detalle_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$cuenta_pagar_detalle_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$cuenta_pagar_detalle_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$cuenta_pagar_detalle_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$cuenta_pagar_detalle_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$cuenta_pagar_detalle_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$cuenta_pagar_detalle_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$cuenta_pagar_detalle_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$cuenta_pagar_detalle_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$cuenta_pagar_detalle_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$cuenta_pagar_detalle_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$cuenta_pagar_detalle_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$cuenta_pagar_detalle_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$cuenta_pagar_detalle_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$cuenta_pagar_detalle_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$cuenta_pagar_detalle_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$cuenta_pagar_detalle_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$cuenta_pagar_detalle_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$cuenta_pagar_detalle_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$cuenta_pagar_detalle_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$cuenta_pagar_detalle_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$cuenta_pagar_detalle_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$cuenta_pagar_detalle_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$cuenta_pagar_detalle_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$cuenta_pagar_detalle_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$cuenta_pagar_detalle_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$cuenta_pagar_detalle_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$cuenta_pagar_detalle_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$cuenta_pagar_detalle_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$cuenta_pagar_detalle_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$cuenta_pagar_detalle_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$cuenta_pagar_detalle_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$cuenta_pagar_detalle_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$cuenta_pagar_detalle_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$cuenta_pagar_detalle_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$cuenta_pagar_detalle_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$cuenta_pagar_detalle_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$cuenta_pagar_detalle_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$cuenta_pagar_detalle_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$cuenta_pagar_detalle_control_session->resumenUsuarioActual;	
		$this->moduloActual=$cuenta_pagar_detalle_control_session->moduloActual;	
		$this->opcionActual=$cuenta_pagar_detalle_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$cuenta_pagar_detalle_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$cuenta_pagar_detalle_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$cuenta_pagar_detalle_session=unserialize($this->Session->read(cuenta_pagar_detalle_util::$STR_SESSION_NAME));
				
		if($cuenta_pagar_detalle_session==null) {
			$cuenta_pagar_detalle_session=new cuenta_pagar_detalle_session();
		}
		
		$this->strStyleDivArbol=$cuenta_pagar_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cuenta_pagar_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cuenta_pagar_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cuenta_pagar_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cuenta_pagar_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cuenta_pagar_detalle_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$cuenta_pagar_detalle_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$cuenta_pagar_detalle_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$cuenta_pagar_detalle_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$cuenta_pagar_detalle_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$cuenta_pagar_detalle_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$cuenta_pagar_detalle_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$cuenta_pagar_detalle_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$cuenta_pagar_detalle_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$cuenta_pagar_detalle_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$cuenta_pagar_detalle_control_session->strMensajeid_usuario;
		$this->strMensajeid_cuenta_pagar=$cuenta_pagar_detalle_control_session->strMensajeid_cuenta_pagar;
		$this->strMensajenumero=$cuenta_pagar_detalle_control_session->strMensajenumero;
		$this->strMensajefecha_emision=$cuenta_pagar_detalle_control_session->strMensajefecha_emision;
		$this->strMensajefecha_vence=$cuenta_pagar_detalle_control_session->strMensajefecha_vence;
		$this->strMensajereferencia=$cuenta_pagar_detalle_control_session->strMensajereferencia;
		$this->strMensajemonto=$cuenta_pagar_detalle_control_session->strMensajemonto;
		$this->strMensajedebito=$cuenta_pagar_detalle_control_session->strMensajedebito;
		$this->strMensajecredito=$cuenta_pagar_detalle_control_session->strMensajecredito;
		$this->strMensajedescripcion=$cuenta_pagar_detalle_control_session->strMensajedescripcion;
		$this->strMensajeid_estado=$cuenta_pagar_detalle_control_session->strMensajeid_estado;
			
		
		$this->empresasFK=$cuenta_pagar_detalle_control_session->empresasFK;
		$this->idempresaDefaultFK=$cuenta_pagar_detalle_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$cuenta_pagar_detalle_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$cuenta_pagar_detalle_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$cuenta_pagar_detalle_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$cuenta_pagar_detalle_control_session->idejercicioDefaultFK;
		$this->periodosFK=$cuenta_pagar_detalle_control_session->periodosFK;
		$this->idperiodoDefaultFK=$cuenta_pagar_detalle_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$cuenta_pagar_detalle_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$cuenta_pagar_detalle_control_session->idusuarioDefaultFK;
		$this->cuenta_pagarsFK=$cuenta_pagar_detalle_control_session->cuenta_pagarsFK;
		$this->idcuenta_pagarDefaultFK=$cuenta_pagar_detalle_control_session->idcuenta_pagarDefaultFK;
		$this->estadosFK=$cuenta_pagar_detalle_control_session->estadosFK;
		$this->idestadoDefaultFK=$cuenta_pagar_detalle_control_session->idestadoDefaultFK;
		
		
		$this->strVisibleFK_Idcuenta_pagar=$cuenta_pagar_detalle_control_session->strVisibleFK_Idcuenta_pagar;
		$this->strVisibleFK_Idejercicio=$cuenta_pagar_detalle_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$cuenta_pagar_detalle_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idestado=$cuenta_pagar_detalle_control_session->strVisibleFK_Idestado;
		$this->strVisibleFK_Idperiodo=$cuenta_pagar_detalle_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idsucursal=$cuenta_pagar_detalle_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idusuario=$cuenta_pagar_detalle_control_session->strVisibleFK_Idusuario;
		
		
		
		
		$this->id_cuenta_pagarFK_Idcuenta_pagar=$cuenta_pagar_detalle_control_session->id_cuenta_pagarFK_Idcuenta_pagar;
		$this->id_ejercicioFK_Idejercicio=$cuenta_pagar_detalle_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$cuenta_pagar_detalle_control_session->id_empresaFK_Idempresa;
		$this->id_estadoFK_Idestado=$cuenta_pagar_detalle_control_session->id_estadoFK_Idestado;
		$this->id_periodoFK_Idperiodo=$cuenta_pagar_detalle_control_session->id_periodoFK_Idperiodo;
		$this->id_sucursalFK_Idsucursal=$cuenta_pagar_detalle_control_session->id_sucursalFK_Idsucursal;
		$this->id_usuarioFK_Idusuario=$cuenta_pagar_detalle_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getcuenta_pagar_detalleControllerAdditional() {
		return $this->cuenta_pagar_detalleControllerAdditional;
	}

	public function setcuenta_pagar_detalleControllerAdditional($cuenta_pagar_detalleControllerAdditional) {
		$this->cuenta_pagar_detalleControllerAdditional = $cuenta_pagar_detalleControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcuenta_pagar_detalleActual() : cuenta_pagar_detalle {
		return $this->cuenta_pagar_detalleActual;
	}

	public function setcuenta_pagar_detalleActual(cuenta_pagar_detalle $cuenta_pagar_detalleActual) {
		$this->cuenta_pagar_detalleActual = $cuenta_pagar_detalleActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcuenta_pagar_detalle() : int {
		return $this->idcuenta_pagar_detalle;
	}

	public function setidcuenta_pagar_detalle(int $idcuenta_pagar_detalle) {
		$this->idcuenta_pagar_detalle = $idcuenta_pagar_detalle;
	}
	
	public function getcuenta_pagar_detalle() : cuenta_pagar_detalle {
		return $this->cuenta_pagar_detalle;
	}

	public function setcuenta_pagar_detalle(cuenta_pagar_detalle $cuenta_pagar_detalle) {
		$this->cuenta_pagar_detalle = $cuenta_pagar_detalle;
	}
		
	public function getcuenta_pagar_detalleLogic() : cuenta_pagar_detalle_logic {		
		return $this->cuenta_pagar_detalleLogic;
	}

	public function setcuenta_pagar_detalleLogic(cuenta_pagar_detalle_logic $cuenta_pagar_detalleLogic) {
		$this->cuenta_pagar_detalleLogic = $cuenta_pagar_detalleLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcuenta_pagar_detallesModel() {		
		try {						
			/*cuenta_pagar_detallesModel.setWrappedData(cuenta_pagar_detalleLogic->getcuenta_pagar_detalles());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->cuenta_pagar_detallesModel;
	}
	
	public function setcuenta_pagar_detallesModel($cuenta_pagar_detallesModel) {
		$this->cuenta_pagar_detallesModel = $cuenta_pagar_detallesModel;
	}
	
	public function getcuenta_pagar_detalles() : array {		
		return $this->cuenta_pagar_detalles;
	}
	
	public function setcuenta_pagar_detalles(array $cuenta_pagar_detalles) {
		$this->cuenta_pagar_detalles= $cuenta_pagar_detalles;
	}
	
	public function getcuenta_pagar_detallesEliminados() : array {		
		return $this->cuenta_pagar_detallesEliminados;
	}
	
	public function setcuenta_pagar_detallesEliminados(array $cuenta_pagar_detallesEliminados) {
		$this->cuenta_pagar_detallesEliminados= $cuenta_pagar_detallesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcuenta_pagar_detalleActualFromListDataModel() {
		try {
			/*$cuenta_pagar_detalleClase= $this->cuenta_pagar_detallesModel->getRowData();*/
			
			/*return $cuenta_pagar_detalle;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
