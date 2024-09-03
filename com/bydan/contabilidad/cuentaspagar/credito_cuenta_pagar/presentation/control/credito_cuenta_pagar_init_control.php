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

namespace com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\business\entity\credito_cuenta_pagar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/credito_cuenta_pagar/util/credito_cuenta_pagar_carga.php');
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_carga;

use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_param_return;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\business\logic\credito_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\business\logic\credito_cuenta_pagar_logic_add;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\presentation\session\credito_cuenta_pagar_session;


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

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
credito_cuenta_pagar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
credito_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
credito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
credito_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*credito_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class credito_cuenta_pagar_init_control extends ControllerBase {	
	
	public $credito_cuenta_pagarClase=null;	
	public $credito_cuenta_pagarsModel=null;	
	public $credito_cuenta_pagarsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcredito_cuenta_pagar=0;	
	public ?int $idcredito_cuenta_pagarActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $credito_cuenta_pagarLogic=null;
	
	public $credito_cuenta_pagarActual=null;	
	
	public $credito_cuenta_pagar=null;
	public $credito_cuenta_pagars=null;
	public $credito_cuenta_pagarsEliminados=array();
	public $credito_cuenta_pagarsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $credito_cuenta_pagarsLocal=array();
	public ?array $credito_cuenta_pagarsReporte=null;
	public ?array $credito_cuenta_pagarsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcredito_cuenta_pagar='onload';
	public string $strTipoPaginaAuxiliarcredito_cuenta_pagar='none';
	public string $strTipoUsuarioAuxiliarcredito_cuenta_pagar='none';
		
	public $credito_cuenta_pagarReturnGeneral=null;
	public $credito_cuenta_pagarParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $credito_cuenta_pagarModel=null;
	public $credito_cuenta_pagarControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajeid_cuenta_pagar='';
	public string $strMensajenumero='';
	public string $strMensajefecha_emision='';
	public string $strMensajefecha_vence='';
	public string $strMensajeid_termino_pago_proveedor='';
	public string $strMensajemonto='';
	public string $strMensajesaldo='';
	public string $strMensajedescripcion='';
	public string $strMensajesub_total='';
	public string $strMensajeiva='';
	public string $strMensajees_balance_inicial='';
	public string $strMensajeid_estado='';
	public string $strMensajereferencia='';
	public string $strMensajedebito='';
	public string $strMensajecredito='';
	
	
	public string $strVisibleFK_Idcuenta_pagar='display:table-row';
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idestado='display:table-row';
	public string $strVisibleFK_Idperiodo='display:table-row';
	public string $strVisibleFK_Idsucursal='display:table-row';
	public string $strVisibleFK_Idtermino_pago_proveedor='display:table-row';
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

	public  $id_termino_pago_proveedorFK_Idtermino_pago_proveedor=null;

	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->credito_cuenta_pagarLogic==null) {
				$this->credito_cuenta_pagarLogic=new credito_cuenta_pagar_logic();
			}
			
		} else {
			if($this->credito_cuenta_pagarLogic==null) {
				$this->credito_cuenta_pagarLogic=new credito_cuenta_pagar_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->credito_cuenta_pagarClase==null) {
				$this->credito_cuenta_pagarClase=new credito_cuenta_pagar();
			}
			
			$this->credito_cuenta_pagarClase->setId(0);	
				
				
			$this->credito_cuenta_pagarClase->setid_empresa(-1);	
			$this->credito_cuenta_pagarClase->setid_sucursal(-1);	
			$this->credito_cuenta_pagarClase->setid_ejercicio(-1);	
			$this->credito_cuenta_pagarClase->setid_periodo(-1);	
			$this->credito_cuenta_pagarClase->setid_usuario(-1);	
			$this->credito_cuenta_pagarClase->setid_cuenta_pagar(-1);	
			$this->credito_cuenta_pagarClase->setnumero('');	
			$this->credito_cuenta_pagarClase->setfecha_emision(date('Y-m-d'));	
			$this->credito_cuenta_pagarClase->setfecha_vence(date('Y-m-d'));	
			$this->credito_cuenta_pagarClase->setid_termino_pago_proveedor(-1);	
			$this->credito_cuenta_pagarClase->setmonto(0.0);	
			$this->credito_cuenta_pagarClase->setsaldo(0.0);	
			$this->credito_cuenta_pagarClase->setdescripcion('');	
			$this->credito_cuenta_pagarClase->setsub_total(0.0);	
			$this->credito_cuenta_pagarClase->setiva(0.0);	
			$this->credito_cuenta_pagarClase->setes_balance_inicial(false);	
			$this->credito_cuenta_pagarClase->setid_estado(-1);	
			$this->credito_cuenta_pagarClase->setreferencia('');	
			$this->credito_cuenta_pagarClase->setdebito(0.0);	
			$this->credito_cuenta_pagarClase->setcredito(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('credito_cuenta_pagar');
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
		$this->cargarParametrosReporteBase('credito_cuenta_pagar');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('credito_cuenta_pagar');
	}
	
	public function actualizarControllerConReturnGeneral(credito_cuenta_pagar_param_return $credito_cuenta_pagarReturnGeneral) {
		if($credito_cuenta_pagarReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescredito_cuenta_pagarsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$credito_cuenta_pagarReturnGeneral->getsMensajeProceso();
		}
		
		if($credito_cuenta_pagarReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$credito_cuenta_pagarReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($credito_cuenta_pagarReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$credito_cuenta_pagarReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$credito_cuenta_pagarReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($credito_cuenta_pagarReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($credito_cuenta_pagarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$credito_cuenta_pagarReturnGeneral->getsFuncionJs();
		}
		
		if($credito_cuenta_pagarReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(credito_cuenta_pagar_session $credito_cuenta_pagar_session){
		$this->strStyleDivArbol=$credito_cuenta_pagar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$credito_cuenta_pagar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$credito_cuenta_pagar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$credito_cuenta_pagar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$credito_cuenta_pagar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$credito_cuenta_pagar_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$credito_cuenta_pagar_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(credito_cuenta_pagar_session $credito_cuenta_pagar_session){
		$credito_cuenta_pagar_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$credito_cuenta_pagar_session->strStyleDivHeader='display:none';			
		$credito_cuenta_pagar_session->strStyleDivContent='width:93%;height:100%';	
		$credito_cuenta_pagar_session->strStyleDivOpcionesBanner='display:none';	
		$credito_cuenta_pagar_session->strStyleDivExpandirColapsar='display:none';	
		$credito_cuenta_pagar_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(credito_cuenta_pagar_control $credito_cuenta_pagar_control_session){
		$this->idNuevo=$credito_cuenta_pagar_control_session->idNuevo;
		$this->credito_cuenta_pagarActual=$credito_cuenta_pagar_control_session->credito_cuenta_pagarActual;
		$this->credito_cuenta_pagar=$credito_cuenta_pagar_control_session->credito_cuenta_pagar;
		$this->credito_cuenta_pagarClase=$credito_cuenta_pagar_control_session->credito_cuenta_pagarClase;
		$this->credito_cuenta_pagars=$credito_cuenta_pagar_control_session->credito_cuenta_pagars;
		$this->credito_cuenta_pagarsEliminados=$credito_cuenta_pagar_control_session->credito_cuenta_pagarsEliminados;
		$this->credito_cuenta_pagar=$credito_cuenta_pagar_control_session->credito_cuenta_pagar;
		$this->credito_cuenta_pagarsReporte=$credito_cuenta_pagar_control_session->credito_cuenta_pagarsReporte;
		$this->credito_cuenta_pagarsSeleccionados=$credito_cuenta_pagar_control_session->credito_cuenta_pagarsSeleccionados;
		$this->arrOrderBy=$credito_cuenta_pagar_control_session->arrOrderBy;
		$this->arrOrderByRel=$credito_cuenta_pagar_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$credito_cuenta_pagar_control_session->arrHistoryWebs;
		$this->arrSessionBases=$credito_cuenta_pagar_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcredito_cuenta_pagar=$credito_cuenta_pagar_control_session->strTypeOnLoadcredito_cuenta_pagar;
		$this->strTipoPaginaAuxiliarcredito_cuenta_pagar=$credito_cuenta_pagar_control_session->strTipoPaginaAuxiliarcredito_cuenta_pagar;
		$this->strTipoUsuarioAuxiliarcredito_cuenta_pagar=$credito_cuenta_pagar_control_session->strTipoUsuarioAuxiliarcredito_cuenta_pagar;	
		
		$this->bitEsPopup=$credito_cuenta_pagar_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$credito_cuenta_pagar_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$credito_cuenta_pagar_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$credito_cuenta_pagar_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$credito_cuenta_pagar_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$credito_cuenta_pagar_control_session->strSufijo;
		$this->bitEsRelaciones=$credito_cuenta_pagar_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$credito_cuenta_pagar_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$credito_cuenta_pagar_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$credito_cuenta_pagar_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$credito_cuenta_pagar_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$credito_cuenta_pagar_control_session->strTituloTabla;
		$this->strTituloPathPagina=$credito_cuenta_pagar_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$credito_cuenta_pagar_control_session->strTituloPathElementoActual;
		
		if($this->credito_cuenta_pagarLogic==null) {			
			$this->credito_cuenta_pagarLogic=new credito_cuenta_pagar_logic();
		}
		
		
		if($this->credito_cuenta_pagarClase==null) {
			$this->credito_cuenta_pagarClase=new credito_cuenta_pagar();	
		}
		
		$this->credito_cuenta_pagarLogic->setcredito_cuenta_pagar($this->credito_cuenta_pagarClase);
		
		
		if($this->credito_cuenta_pagars==null) {
			$this->credito_cuenta_pagars=array();	
		}
		
		$this->credito_cuenta_pagarLogic->setcredito_cuenta_pagars($this->credito_cuenta_pagars);
		
		
		$this->strTipoView=$credito_cuenta_pagar_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$credito_cuenta_pagar_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$credito_cuenta_pagar_control_session->datosCliente;
		$this->strAccionBusqueda=$credito_cuenta_pagar_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$credito_cuenta_pagar_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$credito_cuenta_pagar_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$credito_cuenta_pagar_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$credito_cuenta_pagar_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$credito_cuenta_pagar_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$credito_cuenta_pagar_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$credito_cuenta_pagar_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$credito_cuenta_pagar_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$credito_cuenta_pagar_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$credito_cuenta_pagar_control_session->strTipoPaginacion;
		$this->strTipoAccion=$credito_cuenta_pagar_control_session->strTipoAccion;
		$this->tiposReportes=$credito_cuenta_pagar_control_session->tiposReportes;
		$this->tiposReporte=$credito_cuenta_pagar_control_session->tiposReporte;
		$this->tiposAcciones=$credito_cuenta_pagar_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$credito_cuenta_pagar_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$credito_cuenta_pagar_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$credito_cuenta_pagar_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$credito_cuenta_pagar_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$credito_cuenta_pagar_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$credito_cuenta_pagar_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$credito_cuenta_pagar_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$credito_cuenta_pagar_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$credito_cuenta_pagar_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$credito_cuenta_pagar_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$credito_cuenta_pagar_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$credito_cuenta_pagar_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$credito_cuenta_pagar_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$credito_cuenta_pagar_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$credito_cuenta_pagar_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$credito_cuenta_pagar_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$credito_cuenta_pagar_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$credito_cuenta_pagar_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$credito_cuenta_pagar_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$credito_cuenta_pagar_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$credito_cuenta_pagar_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$credito_cuenta_pagar_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$credito_cuenta_pagar_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$credito_cuenta_pagar_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$credito_cuenta_pagar_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$credito_cuenta_pagar_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$credito_cuenta_pagar_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$credito_cuenta_pagar_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$credito_cuenta_pagar_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$credito_cuenta_pagar_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$credito_cuenta_pagar_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$credito_cuenta_pagar_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$credito_cuenta_pagar_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$credito_cuenta_pagar_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$credito_cuenta_pagar_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$credito_cuenta_pagar_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$credito_cuenta_pagar_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$credito_cuenta_pagar_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$credito_cuenta_pagar_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$credito_cuenta_pagar_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$credito_cuenta_pagar_control_session->resumenUsuarioActual;	
		$this->moduloActual=$credito_cuenta_pagar_control_session->moduloActual;	
		$this->opcionActual=$credito_cuenta_pagar_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$credito_cuenta_pagar_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$credito_cuenta_pagar_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$credito_cuenta_pagar_session=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME));
				
		if($credito_cuenta_pagar_session==null) {
			$credito_cuenta_pagar_session=new credito_cuenta_pagar_session();
		}
		
		$this->strStyleDivArbol=$credito_cuenta_pagar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$credito_cuenta_pagar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$credito_cuenta_pagar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$credito_cuenta_pagar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$credito_cuenta_pagar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$credito_cuenta_pagar_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$credito_cuenta_pagar_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$credito_cuenta_pagar_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$credito_cuenta_pagar_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$credito_cuenta_pagar_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$credito_cuenta_pagar_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$credito_cuenta_pagar_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$credito_cuenta_pagar_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$credito_cuenta_pagar_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$credito_cuenta_pagar_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$credito_cuenta_pagar_control_session->strMensajeid_usuario;
		$this->strMensajeid_cuenta_pagar=$credito_cuenta_pagar_control_session->strMensajeid_cuenta_pagar;
		$this->strMensajenumero=$credito_cuenta_pagar_control_session->strMensajenumero;
		$this->strMensajefecha_emision=$credito_cuenta_pagar_control_session->strMensajefecha_emision;
		$this->strMensajefecha_vence=$credito_cuenta_pagar_control_session->strMensajefecha_vence;
		$this->strMensajeid_termino_pago_proveedor=$credito_cuenta_pagar_control_session->strMensajeid_termino_pago_proveedor;
		$this->strMensajemonto=$credito_cuenta_pagar_control_session->strMensajemonto;
		$this->strMensajesaldo=$credito_cuenta_pagar_control_session->strMensajesaldo;
		$this->strMensajedescripcion=$credito_cuenta_pagar_control_session->strMensajedescripcion;
		$this->strMensajesub_total=$credito_cuenta_pagar_control_session->strMensajesub_total;
		$this->strMensajeiva=$credito_cuenta_pagar_control_session->strMensajeiva;
		$this->strMensajees_balance_inicial=$credito_cuenta_pagar_control_session->strMensajees_balance_inicial;
		$this->strMensajeid_estado=$credito_cuenta_pagar_control_session->strMensajeid_estado;
		$this->strMensajereferencia=$credito_cuenta_pagar_control_session->strMensajereferencia;
		$this->strMensajedebito=$credito_cuenta_pagar_control_session->strMensajedebito;
		$this->strMensajecredito=$credito_cuenta_pagar_control_session->strMensajecredito;
			
		
		$this->empresasFK=$credito_cuenta_pagar_control_session->empresasFK;
		$this->idempresaDefaultFK=$credito_cuenta_pagar_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$credito_cuenta_pagar_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$credito_cuenta_pagar_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$credito_cuenta_pagar_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$credito_cuenta_pagar_control_session->idejercicioDefaultFK;
		$this->periodosFK=$credito_cuenta_pagar_control_session->periodosFK;
		$this->idperiodoDefaultFK=$credito_cuenta_pagar_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$credito_cuenta_pagar_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$credito_cuenta_pagar_control_session->idusuarioDefaultFK;
		$this->cuenta_pagarsFK=$credito_cuenta_pagar_control_session->cuenta_pagarsFK;
		$this->idcuenta_pagarDefaultFK=$credito_cuenta_pagar_control_session->idcuenta_pagarDefaultFK;
		$this->termino_pago_proveedorsFK=$credito_cuenta_pagar_control_session->termino_pago_proveedorsFK;
		$this->idtermino_pago_proveedorDefaultFK=$credito_cuenta_pagar_control_session->idtermino_pago_proveedorDefaultFK;
		$this->estadosFK=$credito_cuenta_pagar_control_session->estadosFK;
		$this->idestadoDefaultFK=$credito_cuenta_pagar_control_session->idestadoDefaultFK;
		
		
		$this->strVisibleFK_Idcuenta_pagar=$credito_cuenta_pagar_control_session->strVisibleFK_Idcuenta_pagar;
		$this->strVisibleFK_Idejercicio=$credito_cuenta_pagar_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$credito_cuenta_pagar_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idestado=$credito_cuenta_pagar_control_session->strVisibleFK_Idestado;
		$this->strVisibleFK_Idperiodo=$credito_cuenta_pagar_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idsucursal=$credito_cuenta_pagar_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idtermino_pago_proveedor=$credito_cuenta_pagar_control_session->strVisibleFK_Idtermino_pago_proveedor;
		$this->strVisibleFK_Idusuario=$credito_cuenta_pagar_control_session->strVisibleFK_Idusuario;
		
		
		
		
		$this->id_cuenta_pagarFK_Idcuenta_pagar=$credito_cuenta_pagar_control_session->id_cuenta_pagarFK_Idcuenta_pagar;
		$this->id_ejercicioFK_Idejercicio=$credito_cuenta_pagar_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$credito_cuenta_pagar_control_session->id_empresaFK_Idempresa;
		$this->id_estadoFK_Idestado=$credito_cuenta_pagar_control_session->id_estadoFK_Idestado;
		$this->id_periodoFK_Idperiodo=$credito_cuenta_pagar_control_session->id_periodoFK_Idperiodo;
		$this->id_sucursalFK_Idsucursal=$credito_cuenta_pagar_control_session->id_sucursalFK_Idsucursal;
		$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor=$credito_cuenta_pagar_control_session->id_termino_pago_proveedorFK_Idtermino_pago_proveedor;
		$this->id_usuarioFK_Idusuario=$credito_cuenta_pagar_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getcredito_cuenta_pagarControllerAdditional() {
		return $this->credito_cuenta_pagarControllerAdditional;
	}

	public function setcredito_cuenta_pagarControllerAdditional($credito_cuenta_pagarControllerAdditional) {
		$this->credito_cuenta_pagarControllerAdditional = $credito_cuenta_pagarControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcredito_cuenta_pagarActual() : credito_cuenta_pagar {
		return $this->credito_cuenta_pagarActual;
	}

	public function setcredito_cuenta_pagarActual(credito_cuenta_pagar $credito_cuenta_pagarActual) {
		$this->credito_cuenta_pagarActual = $credito_cuenta_pagarActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcredito_cuenta_pagar() : int {
		return $this->idcredito_cuenta_pagar;
	}

	public function setidcredito_cuenta_pagar(int $idcredito_cuenta_pagar) {
		$this->idcredito_cuenta_pagar = $idcredito_cuenta_pagar;
	}
	
	public function getcredito_cuenta_pagar() : credito_cuenta_pagar {
		return $this->credito_cuenta_pagar;
	}

	public function setcredito_cuenta_pagar(credito_cuenta_pagar $credito_cuenta_pagar) {
		$this->credito_cuenta_pagar = $credito_cuenta_pagar;
	}
		
	public function getcredito_cuenta_pagarLogic() : credito_cuenta_pagar_logic {		
		return $this->credito_cuenta_pagarLogic;
	}

	public function setcredito_cuenta_pagarLogic(credito_cuenta_pagar_logic $credito_cuenta_pagarLogic) {
		$this->credito_cuenta_pagarLogic = $credito_cuenta_pagarLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcredito_cuenta_pagarsModel() {		
		try {						
			/*credito_cuenta_pagarsModel.setWrappedData(credito_cuenta_pagarLogic->getcredito_cuenta_pagars());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->credito_cuenta_pagarsModel;
	}
	
	public function setcredito_cuenta_pagarsModel($credito_cuenta_pagarsModel) {
		$this->credito_cuenta_pagarsModel = $credito_cuenta_pagarsModel;
	}
	
	public function getcredito_cuenta_pagars() : array {		
		return $this->credito_cuenta_pagars;
	}
	
	public function setcredito_cuenta_pagars(array $credito_cuenta_pagars) {
		$this->credito_cuenta_pagars= $credito_cuenta_pagars;
	}
	
	public function getcredito_cuenta_pagarsEliminados() : array {		
		return $this->credito_cuenta_pagarsEliminados;
	}
	
	public function setcredito_cuenta_pagarsEliminados(array $credito_cuenta_pagarsEliminados) {
		$this->credito_cuenta_pagarsEliminados= $credito_cuenta_pagarsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcredito_cuenta_pagarActualFromListDataModel() {
		try {
			/*$credito_cuenta_pagarClase= $this->credito_cuenta_pagarsModel->getRowData();*/
			
			/*return $credito_cuenta_pagar;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
