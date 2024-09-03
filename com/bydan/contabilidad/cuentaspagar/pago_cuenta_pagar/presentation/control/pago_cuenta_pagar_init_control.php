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

namespace com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\entity\pago_cuenta_pagar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/pago_cuenta_pagar/util/pago_cuenta_pagar_carga.php');
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_carga;

use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_param_return;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\logic\pago_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\logic\pago_cuenta_pagar_logic_add;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\presentation\session\pago_cuenta_pagar_session;


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

use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\entity\forma_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\logic\forma_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
pago_cuenta_pagar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
pago_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
pago_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
pago_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*pago_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class pago_cuenta_pagar_init_control extends ControllerBase {	
	
	public $pago_cuenta_pagarClase=null;	
	public $pago_cuenta_pagarsModel=null;	
	public $pago_cuenta_pagarsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idpago_cuenta_pagar=0;	
	public ?int $idpago_cuenta_pagarActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $pago_cuenta_pagarLogic=null;
	
	public $pago_cuenta_pagarActual=null;	
	
	public $pago_cuenta_pagar=null;
	public $pago_cuenta_pagars=null;
	public $pago_cuenta_pagarsEliminados=array();
	public $pago_cuenta_pagarsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $pago_cuenta_pagarsLocal=array();
	public ?array $pago_cuenta_pagarsReporte=null;
	public ?array $pago_cuenta_pagarsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadpago_cuenta_pagar='onload';
	public string $strTipoPaginaAuxiliarpago_cuenta_pagar='none';
	public string $strTipoUsuarioAuxiliarpago_cuenta_pagar='none';
		
	public $pago_cuenta_pagarReturnGeneral=null;
	public $pago_cuenta_pagarParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $pago_cuenta_pagarModel=null;
	public $pago_cuenta_pagarControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajeid_cuenta_pagar='';
	public string $strMensajeid_forma_pago_proveedor='';
	public string $strMensajenumero='';
	public string $strMensajefecha_emision='';
	public string $strMensajefecha_vence='';
	public string $strMensajeabono='';
	public string $strMensajesaldo='';
	public string $strMensajedescripcion='';
	public string $strMensajeid_estado='';
	public string $strMensajereferencia='';
	public string $strMensajedebito='';
	public string $strMensajecredito='';
	
	
	public string $strVisibleFK_Idcuenta_pagar='display:table-row';
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idestado='display:table-row';
	public string $strVisibleFK_Idforma_pago_proveedor='display:table-row';
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

	public array $forma_pago_proveedorsFK=array();

	public function getforma_pago_proveedorsFK():array {
		return $this->forma_pago_proveedorsFK;
	}

	public function setforma_pago_proveedorsFK(array $forma_pago_proveedorsFK) {
		$this->forma_pago_proveedorsFK = $forma_pago_proveedorsFK;
	}

	public int $idforma_pago_proveedorDefaultFK=-1;

	public function getIdforma_pago_proveedorDefaultFK():int {
		return $this->idforma_pago_proveedorDefaultFK;
	}

	public function setIdforma_pago_proveedorDefaultFK(int $idforma_pago_proveedorDefaultFK) {
		$this->idforma_pago_proveedorDefaultFK = $idforma_pago_proveedorDefaultFK;
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

	public  $id_forma_pago_proveedorFK_Idforma_pago_proveedor=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_sucursalFK_Idsucursal=null;

	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->pago_cuenta_pagarLogic==null) {
				$this->pago_cuenta_pagarLogic=new pago_cuenta_pagar_logic();
			}
			
		} else {
			if($this->pago_cuenta_pagarLogic==null) {
				$this->pago_cuenta_pagarLogic=new pago_cuenta_pagar_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->pago_cuenta_pagarClase==null) {
				$this->pago_cuenta_pagarClase=new pago_cuenta_pagar();
			}
			
			$this->pago_cuenta_pagarClase->setId(0);	
				
				
			$this->pago_cuenta_pagarClase->setid_empresa(-1);	
			$this->pago_cuenta_pagarClase->setid_sucursal(-1);	
			$this->pago_cuenta_pagarClase->setid_ejercicio(-1);	
			$this->pago_cuenta_pagarClase->setid_periodo(-1);	
			$this->pago_cuenta_pagarClase->setid_usuario(-1);	
			$this->pago_cuenta_pagarClase->setid_cuenta_pagar(-1);	
			$this->pago_cuenta_pagarClase->setid_forma_pago_proveedor(-1);	
			$this->pago_cuenta_pagarClase->setnumero('');	
			$this->pago_cuenta_pagarClase->setfecha_emision(date('Y-m-d'));	
			$this->pago_cuenta_pagarClase->setfecha_vence(date('Y-m-d'));	
			$this->pago_cuenta_pagarClase->setabono(0.0);	
			$this->pago_cuenta_pagarClase->setsaldo(0.0);	
			$this->pago_cuenta_pagarClase->setdescripcion('');	
			$this->pago_cuenta_pagarClase->setid_estado(-1);	
			$this->pago_cuenta_pagarClase->setreferencia('');	
			$this->pago_cuenta_pagarClase->setdebito(0.0);	
			$this->pago_cuenta_pagarClase->setcredito(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('pago_cuenta_pagar');
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
		$this->cargarParametrosReporteBase('pago_cuenta_pagar');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('pago_cuenta_pagar');
	}
	
	public function actualizarControllerConReturnGeneral(pago_cuenta_pagar_param_return $pago_cuenta_pagarReturnGeneral) {
		if($pago_cuenta_pagarReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajespago_cuenta_pagarsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$pago_cuenta_pagarReturnGeneral->getsMensajeProceso();
		}
		
		if($pago_cuenta_pagarReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$pago_cuenta_pagarReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($pago_cuenta_pagarReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$pago_cuenta_pagarReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$pago_cuenta_pagarReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($pago_cuenta_pagarReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($pago_cuenta_pagarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$pago_cuenta_pagarReturnGeneral->getsFuncionJs();
		}
		
		if($pago_cuenta_pagarReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(pago_cuenta_pagar_session $pago_cuenta_pagar_session){
		$this->strStyleDivArbol=$pago_cuenta_pagar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$pago_cuenta_pagar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$pago_cuenta_pagar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$pago_cuenta_pagar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$pago_cuenta_pagar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$pago_cuenta_pagar_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$pago_cuenta_pagar_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(pago_cuenta_pagar_session $pago_cuenta_pagar_session){
		$pago_cuenta_pagar_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$pago_cuenta_pagar_session->strStyleDivHeader='display:none';			
		$pago_cuenta_pagar_session->strStyleDivContent='width:93%;height:100%';	
		$pago_cuenta_pagar_session->strStyleDivOpcionesBanner='display:none';	
		$pago_cuenta_pagar_session->strStyleDivExpandirColapsar='display:none';	
		$pago_cuenta_pagar_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(pago_cuenta_pagar_control $pago_cuenta_pagar_control_session){
		$this->idNuevo=$pago_cuenta_pagar_control_session->idNuevo;
		$this->pago_cuenta_pagarActual=$pago_cuenta_pagar_control_session->pago_cuenta_pagarActual;
		$this->pago_cuenta_pagar=$pago_cuenta_pagar_control_session->pago_cuenta_pagar;
		$this->pago_cuenta_pagarClase=$pago_cuenta_pagar_control_session->pago_cuenta_pagarClase;
		$this->pago_cuenta_pagars=$pago_cuenta_pagar_control_session->pago_cuenta_pagars;
		$this->pago_cuenta_pagarsEliminados=$pago_cuenta_pagar_control_session->pago_cuenta_pagarsEliminados;
		$this->pago_cuenta_pagar=$pago_cuenta_pagar_control_session->pago_cuenta_pagar;
		$this->pago_cuenta_pagarsReporte=$pago_cuenta_pagar_control_session->pago_cuenta_pagarsReporte;
		$this->pago_cuenta_pagarsSeleccionados=$pago_cuenta_pagar_control_session->pago_cuenta_pagarsSeleccionados;
		$this->arrOrderBy=$pago_cuenta_pagar_control_session->arrOrderBy;
		$this->arrOrderByRel=$pago_cuenta_pagar_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$pago_cuenta_pagar_control_session->arrHistoryWebs;
		$this->arrSessionBases=$pago_cuenta_pagar_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadpago_cuenta_pagar=$pago_cuenta_pagar_control_session->strTypeOnLoadpago_cuenta_pagar;
		$this->strTipoPaginaAuxiliarpago_cuenta_pagar=$pago_cuenta_pagar_control_session->strTipoPaginaAuxiliarpago_cuenta_pagar;
		$this->strTipoUsuarioAuxiliarpago_cuenta_pagar=$pago_cuenta_pagar_control_session->strTipoUsuarioAuxiliarpago_cuenta_pagar;	
		
		$this->bitEsPopup=$pago_cuenta_pagar_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$pago_cuenta_pagar_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$pago_cuenta_pagar_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$pago_cuenta_pagar_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$pago_cuenta_pagar_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$pago_cuenta_pagar_control_session->strSufijo;
		$this->bitEsRelaciones=$pago_cuenta_pagar_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$pago_cuenta_pagar_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$pago_cuenta_pagar_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$pago_cuenta_pagar_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$pago_cuenta_pagar_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$pago_cuenta_pagar_control_session->strTituloTabla;
		$this->strTituloPathPagina=$pago_cuenta_pagar_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$pago_cuenta_pagar_control_session->strTituloPathElementoActual;
		
		if($this->pago_cuenta_pagarLogic==null) {			
			$this->pago_cuenta_pagarLogic=new pago_cuenta_pagar_logic();
		}
		
		
		if($this->pago_cuenta_pagarClase==null) {
			$this->pago_cuenta_pagarClase=new pago_cuenta_pagar();	
		}
		
		$this->pago_cuenta_pagarLogic->setpago_cuenta_pagar($this->pago_cuenta_pagarClase);
		
		
		if($this->pago_cuenta_pagars==null) {
			$this->pago_cuenta_pagars=array();	
		}
		
		$this->pago_cuenta_pagarLogic->setpago_cuenta_pagars($this->pago_cuenta_pagars);
		
		
		$this->strTipoView=$pago_cuenta_pagar_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$pago_cuenta_pagar_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$pago_cuenta_pagar_control_session->datosCliente;
		$this->strAccionBusqueda=$pago_cuenta_pagar_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$pago_cuenta_pagar_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$pago_cuenta_pagar_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$pago_cuenta_pagar_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$pago_cuenta_pagar_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$pago_cuenta_pagar_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$pago_cuenta_pagar_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$pago_cuenta_pagar_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$pago_cuenta_pagar_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$pago_cuenta_pagar_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$pago_cuenta_pagar_control_session->strTipoPaginacion;
		$this->strTipoAccion=$pago_cuenta_pagar_control_session->strTipoAccion;
		$this->tiposReportes=$pago_cuenta_pagar_control_session->tiposReportes;
		$this->tiposReporte=$pago_cuenta_pagar_control_session->tiposReporte;
		$this->tiposAcciones=$pago_cuenta_pagar_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$pago_cuenta_pagar_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$pago_cuenta_pagar_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$pago_cuenta_pagar_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$pago_cuenta_pagar_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$pago_cuenta_pagar_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$pago_cuenta_pagar_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$pago_cuenta_pagar_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$pago_cuenta_pagar_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$pago_cuenta_pagar_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$pago_cuenta_pagar_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$pago_cuenta_pagar_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$pago_cuenta_pagar_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$pago_cuenta_pagar_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$pago_cuenta_pagar_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$pago_cuenta_pagar_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$pago_cuenta_pagar_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$pago_cuenta_pagar_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$pago_cuenta_pagar_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$pago_cuenta_pagar_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$pago_cuenta_pagar_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$pago_cuenta_pagar_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$pago_cuenta_pagar_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$pago_cuenta_pagar_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$pago_cuenta_pagar_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$pago_cuenta_pagar_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$pago_cuenta_pagar_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$pago_cuenta_pagar_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$pago_cuenta_pagar_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$pago_cuenta_pagar_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$pago_cuenta_pagar_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$pago_cuenta_pagar_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$pago_cuenta_pagar_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$pago_cuenta_pagar_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$pago_cuenta_pagar_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$pago_cuenta_pagar_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$pago_cuenta_pagar_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$pago_cuenta_pagar_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$pago_cuenta_pagar_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$pago_cuenta_pagar_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$pago_cuenta_pagar_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$pago_cuenta_pagar_control_session->resumenUsuarioActual;	
		$this->moduloActual=$pago_cuenta_pagar_control_session->moduloActual;	
		$this->opcionActual=$pago_cuenta_pagar_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$pago_cuenta_pagar_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$pago_cuenta_pagar_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));
				
		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		}
		
		$this->strStyleDivArbol=$pago_cuenta_pagar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$pago_cuenta_pagar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$pago_cuenta_pagar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$pago_cuenta_pagar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$pago_cuenta_pagar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$pago_cuenta_pagar_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$pago_cuenta_pagar_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$pago_cuenta_pagar_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$pago_cuenta_pagar_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$pago_cuenta_pagar_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$pago_cuenta_pagar_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$pago_cuenta_pagar_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$pago_cuenta_pagar_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$pago_cuenta_pagar_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$pago_cuenta_pagar_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$pago_cuenta_pagar_control_session->strMensajeid_usuario;
		$this->strMensajeid_cuenta_pagar=$pago_cuenta_pagar_control_session->strMensajeid_cuenta_pagar;
		$this->strMensajeid_forma_pago_proveedor=$pago_cuenta_pagar_control_session->strMensajeid_forma_pago_proveedor;
		$this->strMensajenumero=$pago_cuenta_pagar_control_session->strMensajenumero;
		$this->strMensajefecha_emision=$pago_cuenta_pagar_control_session->strMensajefecha_emision;
		$this->strMensajefecha_vence=$pago_cuenta_pagar_control_session->strMensajefecha_vence;
		$this->strMensajeabono=$pago_cuenta_pagar_control_session->strMensajeabono;
		$this->strMensajesaldo=$pago_cuenta_pagar_control_session->strMensajesaldo;
		$this->strMensajedescripcion=$pago_cuenta_pagar_control_session->strMensajedescripcion;
		$this->strMensajeid_estado=$pago_cuenta_pagar_control_session->strMensajeid_estado;
		$this->strMensajereferencia=$pago_cuenta_pagar_control_session->strMensajereferencia;
		$this->strMensajedebito=$pago_cuenta_pagar_control_session->strMensajedebito;
		$this->strMensajecredito=$pago_cuenta_pagar_control_session->strMensajecredito;
			
		
		$this->empresasFK=$pago_cuenta_pagar_control_session->empresasFK;
		$this->idempresaDefaultFK=$pago_cuenta_pagar_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$pago_cuenta_pagar_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$pago_cuenta_pagar_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$pago_cuenta_pagar_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$pago_cuenta_pagar_control_session->idejercicioDefaultFK;
		$this->periodosFK=$pago_cuenta_pagar_control_session->periodosFK;
		$this->idperiodoDefaultFK=$pago_cuenta_pagar_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$pago_cuenta_pagar_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$pago_cuenta_pagar_control_session->idusuarioDefaultFK;
		$this->cuenta_pagarsFK=$pago_cuenta_pagar_control_session->cuenta_pagarsFK;
		$this->idcuenta_pagarDefaultFK=$pago_cuenta_pagar_control_session->idcuenta_pagarDefaultFK;
		$this->forma_pago_proveedorsFK=$pago_cuenta_pagar_control_session->forma_pago_proveedorsFK;
		$this->idforma_pago_proveedorDefaultFK=$pago_cuenta_pagar_control_session->idforma_pago_proveedorDefaultFK;
		$this->estadosFK=$pago_cuenta_pagar_control_session->estadosFK;
		$this->idestadoDefaultFK=$pago_cuenta_pagar_control_session->idestadoDefaultFK;
		
		
		$this->strVisibleFK_Idcuenta_pagar=$pago_cuenta_pagar_control_session->strVisibleFK_Idcuenta_pagar;
		$this->strVisibleFK_Idejercicio=$pago_cuenta_pagar_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$pago_cuenta_pagar_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idestado=$pago_cuenta_pagar_control_session->strVisibleFK_Idestado;
		$this->strVisibleFK_Idforma_pago_proveedor=$pago_cuenta_pagar_control_session->strVisibleFK_Idforma_pago_proveedor;
		$this->strVisibleFK_Idperiodo=$pago_cuenta_pagar_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idsucursal=$pago_cuenta_pagar_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idusuario=$pago_cuenta_pagar_control_session->strVisibleFK_Idusuario;
		
		
		
		
		$this->id_cuenta_pagarFK_Idcuenta_pagar=$pago_cuenta_pagar_control_session->id_cuenta_pagarFK_Idcuenta_pagar;
		$this->id_ejercicioFK_Idejercicio=$pago_cuenta_pagar_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$pago_cuenta_pagar_control_session->id_empresaFK_Idempresa;
		$this->id_estadoFK_Idestado=$pago_cuenta_pagar_control_session->id_estadoFK_Idestado;
		$this->id_forma_pago_proveedorFK_Idforma_pago_proveedor=$pago_cuenta_pagar_control_session->id_forma_pago_proveedorFK_Idforma_pago_proveedor;
		$this->id_periodoFK_Idperiodo=$pago_cuenta_pagar_control_session->id_periodoFK_Idperiodo;
		$this->id_sucursalFK_Idsucursal=$pago_cuenta_pagar_control_session->id_sucursalFK_Idsucursal;
		$this->id_usuarioFK_Idusuario=$pago_cuenta_pagar_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getpago_cuenta_pagarControllerAdditional() {
		return $this->pago_cuenta_pagarControllerAdditional;
	}

	public function setpago_cuenta_pagarControllerAdditional($pago_cuenta_pagarControllerAdditional) {
		$this->pago_cuenta_pagarControllerAdditional = $pago_cuenta_pagarControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getpago_cuenta_pagarActual() : pago_cuenta_pagar {
		return $this->pago_cuenta_pagarActual;
	}

	public function setpago_cuenta_pagarActual(pago_cuenta_pagar $pago_cuenta_pagarActual) {
		$this->pago_cuenta_pagarActual = $pago_cuenta_pagarActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidpago_cuenta_pagar() : int {
		return $this->idpago_cuenta_pagar;
	}

	public function setidpago_cuenta_pagar(int $idpago_cuenta_pagar) {
		$this->idpago_cuenta_pagar = $idpago_cuenta_pagar;
	}
	
	public function getpago_cuenta_pagar() : pago_cuenta_pagar {
		return $this->pago_cuenta_pagar;
	}

	public function setpago_cuenta_pagar(pago_cuenta_pagar $pago_cuenta_pagar) {
		$this->pago_cuenta_pagar = $pago_cuenta_pagar;
	}
		
	public function getpago_cuenta_pagarLogic() : pago_cuenta_pagar_logic {		
		return $this->pago_cuenta_pagarLogic;
	}

	public function setpago_cuenta_pagarLogic(pago_cuenta_pagar_logic $pago_cuenta_pagarLogic) {
		$this->pago_cuenta_pagarLogic = $pago_cuenta_pagarLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getpago_cuenta_pagarsModel() {		
		try {						
			/*pago_cuenta_pagarsModel.setWrappedData(pago_cuenta_pagarLogic->getpago_cuenta_pagars());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->pago_cuenta_pagarsModel;
	}
	
	public function setpago_cuenta_pagarsModel($pago_cuenta_pagarsModel) {
		$this->pago_cuenta_pagarsModel = $pago_cuenta_pagarsModel;
	}
	
	public function getpago_cuenta_pagars() : array {		
		return $this->pago_cuenta_pagars;
	}
	
	public function setpago_cuenta_pagars(array $pago_cuenta_pagars) {
		$this->pago_cuenta_pagars= $pago_cuenta_pagars;
	}
	
	public function getpago_cuenta_pagarsEliminados() : array {		
		return $this->pago_cuenta_pagarsEliminados;
	}
	
	public function setpago_cuenta_pagarsEliminados(array $pago_cuenta_pagarsEliminados) {
		$this->pago_cuenta_pagarsEliminados= $pago_cuenta_pagarsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getpago_cuenta_pagarActualFromListDataModel() {
		try {
			/*$pago_cuenta_pagarClase= $this->pago_cuenta_pagarsModel->getRowData();*/
			
			/*return $pago_cuenta_pagar;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
