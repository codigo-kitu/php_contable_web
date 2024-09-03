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

namespace com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/cuenta_corriente/util/cuenta_corriente_carga.php');
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_param_return;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic_add;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\presentation\session\cuenta_corriente_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\cuentascorrientes\banco\business\entity\banco;
use com\bydan\contabilidad\cuentascorrientes\banco\business\logic\banco_logic;
use com\bydan\contabilidad\cuentascorrientes\banco\util\banco_carga;
use com\bydan\contabilidad\cuentascorrientes\banco\util\banco_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\business\entity\estado_cuentas_corrientes;
use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\business\logic\estado_cuentas_corrientes_logic;
use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\util\estado_cuentas_corrientes_carga;
use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\util\estado_cuentas_corrientes_util;

//REL


use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\presentation\session\cheque_cuenta_corriente_session;

use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\util\retiro_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\util\retiro_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\presentation\session\retiro_cuenta_corriente_session;

use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\util\deposito_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\util\deposito_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\presentation\session\deposito_cuenta_corriente_session;


/*CARGA ARCHIVOS FRAMEWORK*/
cuenta_corriente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class cuenta_corriente_init_control extends ControllerBase {	
	
	public $cuenta_corrienteClase=null;	
	public $cuenta_corrientesModel=null;	
	public $cuenta_corrientesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcuenta_corriente=0;	
	public ?int $idcuenta_corrienteActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $cuenta_corrienteLogic=null;
	
	public $cuenta_corrienteActual=null;	
	
	public $cuenta_corriente=null;
	public $cuenta_corrientes=null;
	public $cuenta_corrientesEliminados=array();
	public $cuenta_corrientesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $cuenta_corrientesLocal=array();
	public ?array $cuenta_corrientesReporte=null;
	public ?array $cuenta_corrientesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcuenta_corriente='onload';
	public string $strTipoPaginaAuxiliarcuenta_corriente='none';
	public string $strTipoUsuarioAuxiliarcuenta_corriente='none';
		
	public $cuenta_corrienteReturnGeneral=null;
	public $cuenta_corrienteParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $cuenta_corrienteModel=null;
	public $cuenta_corrienteControllerAdditional=null;
	
	
	

	public $documentocuentapagarLogic=null;

	public function  getdocumento_cuenta_pagarLogic() {
		return $this->documentocuentapagarLogic;
	}

	public function setdocumento_cuenta_pagarLogic($documentocuentapagarLogic) {
		$this->documentocuentapagarLogic =$documentocuentapagarLogic;
	}


	public $chequecuentacorrienteLogic=null;

	public function  getcheque_cuenta_corrienteLogic() {
		return $this->chequecuentacorrienteLogic;
	}

	public function setcheque_cuenta_corrienteLogic($chequecuentacorrienteLogic) {
		$this->chequecuentacorrienteLogic =$chequecuentacorrienteLogic;
	}


	public $cuentacorrientedetalleLogic=null;

	public function  getcuenta_corriente_detalleLogic() {
		return $this->cuentacorrientedetalleLogic;
	}

	public function setcuenta_corriente_detalleLogic($cuentacorrientedetalleLogic) {
		$this->cuentacorrientedetalleLogic =$cuentacorrientedetalleLogic;
	}


	public $retirocuentacorrienteLogic=null;

	public function  getretiro_cuenta_corrienteLogic() {
		return $this->retirocuentacorrienteLogic;
	}

	public function setretiro_cuenta_corrienteLogic($retirocuentacorrienteLogic) {
		$this->retirocuentacorrienteLogic =$retirocuentacorrienteLogic;
	}


	public $depositocuentacorrienteLogic=null;

	public function  getdeposito_cuenta_corrienteLogic() {
		return $this->depositocuentacorrienteLogic;
	}

	public function setdeposito_cuenta_corrienteLogic($depositocuentacorrienteLogic) {
		$this->depositocuentacorrienteLogic =$depositocuentacorrienteLogic;
	}


	public $instrumentopagoLogic=null;

	public function  getinstrumento_pagoLogic() {
		return $this->instrumentopagoLogic;
	}

	public function setinstrumento_pagoLogic($instrumentopagoLogic) {
		$this->instrumentopagoLogic =$instrumentopagoLogic;
	}


	public $documentocuentacobrarLogic=null;

	public function  getdocumento_cuenta_cobrarLogic() {
		return $this->documentocuentacobrarLogic;
	}

	public function setdocumento_cuenta_cobrarLogic($documentocuentacobrarLogic) {
		$this->documentocuentacobrarLogic =$documentocuentacobrarLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_usuario='';
	public string $strMensajeid_banco='';
	public string $strMensajenumero_cuenta='';
	public string $strMensajebalance_inicial='';
	public string $strMensajesaldo='';
	public string $strMensajecontador_cheque='';
	public string $strMensajeid_cuenta='';
	public string $strMensajedescripcion='';
	public string $strMensajeicono='';
	public string $strMensajeid_estado_cuentas_corrientes='';
	
	
	public string $strVisibleFK_Idbanco='display:table-row';
	public string $strVisibleFK_Idcuenta='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idestado_cuentas_corrientes='display:table-row';
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

	public array $bancosFK=array();

	public function getbancosFK():array {
		return $this->bancosFK;
	}

	public function setbancosFK(array $bancosFK) {
		$this->bancosFK = $bancosFK;
	}

	public int $idbancoDefaultFK=-1;

	public function getIdbancoDefaultFK():int {
		return $this->idbancoDefaultFK;
	}

	public function setIdbancoDefaultFK(int $idbancoDefaultFK) {
		$this->idbancoDefaultFK = $idbancoDefaultFK;
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

	public array $estado_cuentas_corrientessFK=array();

	public function getestado_cuentas_corrientessFK():array {
		return $this->estado_cuentas_corrientessFK;
	}

	public function setestado_cuentas_corrientessFK(array $estado_cuentas_corrientessFK) {
		$this->estado_cuentas_corrientessFK = $estado_cuentas_corrientessFK;
	}

	public int $idestado_cuentas_corrientesDefaultFK=-1;

	public function getIdestado_cuentas_corrientesDefaultFK():int {
		return $this->idestado_cuentas_corrientesDefaultFK;
	}

	public function setIdestado_cuentas_corrientesDefaultFK(int $idestado_cuentas_corrientesDefaultFK) {
		$this->idestado_cuentas_corrientesDefaultFK = $idestado_cuentas_corrientesDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisosdocumento_cuenta_pagar='none';
	public $strTienePermisoscheque_cuenta_corriente='none';
	public $strTienePermisoscuenta_corriente_detalle='none';
	public $strTienePermisosretiro_cuenta_corriente='none';
	public $strTienePermisosdeposito_cuenta_corriente='none';
	public $strTienePermisosinstrumento_pago='none';
	public $strTienePermisosdocumento_cuenta_cobrar='none';
	
	
	public  $id_bancoFK_Idbanco=null;

	public  $id_cuentaFK_Idcuenta=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_estado_cuentas_corrientesFK_Idestado_cuentas_corrientes=null;

	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->cuenta_corrienteLogic==null) {
				$this->cuenta_corrienteLogic=new cuenta_corriente_logic();
			}
			
		} else {
			if($this->cuenta_corrienteLogic==null) {
				$this->cuenta_corrienteLogic=new cuenta_corriente_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->cuenta_corrienteClase==null) {
				$this->cuenta_corrienteClase=new cuenta_corriente();
			}
			
			$this->cuenta_corrienteClase->setId(0);	
				
				
			$this->cuenta_corrienteClase->setid_empresa(-1);	
			$this->cuenta_corrienteClase->setid_usuario(-1);	
			$this->cuenta_corrienteClase->setid_banco(-1);	
			$this->cuenta_corrienteClase->setnumero_cuenta('');	
			$this->cuenta_corrienteClase->setbalance_inicial(0.0);	
			$this->cuenta_corrienteClase->setsaldo(0.0);	
			$this->cuenta_corrienteClase->setcontador_cheque(0);	
			$this->cuenta_corrienteClase->setid_cuenta(null);	
			$this->cuenta_corrienteClase->setdescripcion('');	
			$this->cuenta_corrienteClase->seticono('');	
			$this->cuenta_corrienteClase->setid_estado_cuentas_corrientes(-1);	
			
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
		$this->prepararEjecutarMantenimientoBase('cuenta_corriente');
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
		$this->cargarParametrosReporteBase('cuenta_corriente');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('cuenta_corriente');
	}
	
	public function actualizarControllerConReturnGeneral(cuenta_corriente_param_return $cuenta_corrienteReturnGeneral) {
		if($cuenta_corrienteReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescuenta_corrientesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$cuenta_corrienteReturnGeneral->getsMensajeProceso();
		}
		
		if($cuenta_corrienteReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$cuenta_corrienteReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($cuenta_corrienteReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$cuenta_corrienteReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$cuenta_corrienteReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($cuenta_corrienteReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($cuenta_corrienteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$cuenta_corrienteReturnGeneral->getsFuncionJs();
		}
		
		if($cuenta_corrienteReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(cuenta_corriente_session $cuenta_corriente_session){
		$this->strStyleDivArbol=$cuenta_corriente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cuenta_corriente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cuenta_corriente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cuenta_corriente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cuenta_corriente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cuenta_corriente_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$cuenta_corriente_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(cuenta_corriente_session $cuenta_corriente_session){
		$cuenta_corriente_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$cuenta_corriente_session->strStyleDivHeader='display:none';			
		$cuenta_corriente_session->strStyleDivContent='width:93%;height:100%';	
		$cuenta_corriente_session->strStyleDivOpcionesBanner='display:none';	
		$cuenta_corriente_session->strStyleDivExpandirColapsar='display:none';	
		$cuenta_corriente_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(cuenta_corriente_control $cuenta_corriente_control_session){
		$this->idNuevo=$cuenta_corriente_control_session->idNuevo;
		$this->cuenta_corrienteActual=$cuenta_corriente_control_session->cuenta_corrienteActual;
		$this->cuenta_corriente=$cuenta_corriente_control_session->cuenta_corriente;
		$this->cuenta_corrienteClase=$cuenta_corriente_control_session->cuenta_corrienteClase;
		$this->cuenta_corrientes=$cuenta_corriente_control_session->cuenta_corrientes;
		$this->cuenta_corrientesEliminados=$cuenta_corriente_control_session->cuenta_corrientesEliminados;
		$this->cuenta_corriente=$cuenta_corriente_control_session->cuenta_corriente;
		$this->cuenta_corrientesReporte=$cuenta_corriente_control_session->cuenta_corrientesReporte;
		$this->cuenta_corrientesSeleccionados=$cuenta_corriente_control_session->cuenta_corrientesSeleccionados;
		$this->arrOrderBy=$cuenta_corriente_control_session->arrOrderBy;
		$this->arrOrderByRel=$cuenta_corriente_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$cuenta_corriente_control_session->arrHistoryWebs;
		$this->arrSessionBases=$cuenta_corriente_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcuenta_corriente=$cuenta_corriente_control_session->strTypeOnLoadcuenta_corriente;
		$this->strTipoPaginaAuxiliarcuenta_corriente=$cuenta_corriente_control_session->strTipoPaginaAuxiliarcuenta_corriente;
		$this->strTipoUsuarioAuxiliarcuenta_corriente=$cuenta_corriente_control_session->strTipoUsuarioAuxiliarcuenta_corriente;	
		
		$this->bitEsPopup=$cuenta_corriente_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$cuenta_corriente_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$cuenta_corriente_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$cuenta_corriente_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$cuenta_corriente_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$cuenta_corriente_control_session->strSufijo;
		$this->bitEsRelaciones=$cuenta_corriente_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$cuenta_corriente_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$cuenta_corriente_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$cuenta_corriente_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$cuenta_corriente_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$cuenta_corriente_control_session->strTituloTabla;
		$this->strTituloPathPagina=$cuenta_corriente_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$cuenta_corriente_control_session->strTituloPathElementoActual;
		
		if($this->cuenta_corrienteLogic==null) {			
			$this->cuenta_corrienteLogic=new cuenta_corriente_logic();
		}
		
		
		if($this->cuenta_corrienteClase==null) {
			$this->cuenta_corrienteClase=new cuenta_corriente();	
		}
		
		$this->cuenta_corrienteLogic->setcuenta_corriente($this->cuenta_corrienteClase);
		
		
		if($this->cuenta_corrientes==null) {
			$this->cuenta_corrientes=array();	
		}
		
		$this->cuenta_corrienteLogic->setcuenta_corrientes($this->cuenta_corrientes);
		
		
		$this->strTipoView=$cuenta_corriente_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$cuenta_corriente_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$cuenta_corriente_control_session->datosCliente;
		$this->strAccionBusqueda=$cuenta_corriente_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$cuenta_corriente_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$cuenta_corriente_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$cuenta_corriente_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$cuenta_corriente_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$cuenta_corriente_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$cuenta_corriente_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$cuenta_corriente_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$cuenta_corriente_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$cuenta_corriente_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$cuenta_corriente_control_session->strTipoPaginacion;
		$this->strTipoAccion=$cuenta_corriente_control_session->strTipoAccion;
		$this->tiposReportes=$cuenta_corriente_control_session->tiposReportes;
		$this->tiposReporte=$cuenta_corriente_control_session->tiposReporte;
		$this->tiposAcciones=$cuenta_corriente_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$cuenta_corriente_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$cuenta_corriente_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$cuenta_corriente_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$cuenta_corriente_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$cuenta_corriente_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$cuenta_corriente_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$cuenta_corriente_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$cuenta_corriente_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$cuenta_corriente_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$cuenta_corriente_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$cuenta_corriente_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$cuenta_corriente_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$cuenta_corriente_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$cuenta_corriente_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$cuenta_corriente_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$cuenta_corriente_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$cuenta_corriente_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$cuenta_corriente_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$cuenta_corriente_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$cuenta_corriente_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$cuenta_corriente_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$cuenta_corriente_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$cuenta_corriente_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$cuenta_corriente_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$cuenta_corriente_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$cuenta_corriente_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$cuenta_corriente_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$cuenta_corriente_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$cuenta_corriente_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$cuenta_corriente_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$cuenta_corriente_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$cuenta_corriente_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$cuenta_corriente_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$cuenta_corriente_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$cuenta_corriente_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$cuenta_corriente_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$cuenta_corriente_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$cuenta_corriente_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$cuenta_corriente_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$cuenta_corriente_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$cuenta_corriente_control_session->resumenUsuarioActual;	
		$this->moduloActual=$cuenta_corriente_control_session->moduloActual;	
		$this->opcionActual=$cuenta_corriente_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$cuenta_corriente_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$cuenta_corriente_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));
				
		if($cuenta_corriente_session==null) {
			$cuenta_corriente_session=new cuenta_corriente_session();
		}
		
		$this->strStyleDivArbol=$cuenta_corriente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cuenta_corriente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cuenta_corriente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cuenta_corriente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cuenta_corriente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cuenta_corriente_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$cuenta_corriente_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$cuenta_corriente_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$cuenta_corriente_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$cuenta_corriente_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$cuenta_corriente_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$cuenta_corriente_control_session->strMensajeid_empresa;
		$this->strMensajeid_usuario=$cuenta_corriente_control_session->strMensajeid_usuario;
		$this->strMensajeid_banco=$cuenta_corriente_control_session->strMensajeid_banco;
		$this->strMensajenumero_cuenta=$cuenta_corriente_control_session->strMensajenumero_cuenta;
		$this->strMensajebalance_inicial=$cuenta_corriente_control_session->strMensajebalance_inicial;
		$this->strMensajesaldo=$cuenta_corriente_control_session->strMensajesaldo;
		$this->strMensajecontador_cheque=$cuenta_corriente_control_session->strMensajecontador_cheque;
		$this->strMensajeid_cuenta=$cuenta_corriente_control_session->strMensajeid_cuenta;
		$this->strMensajedescripcion=$cuenta_corriente_control_session->strMensajedescripcion;
		$this->strMensajeicono=$cuenta_corriente_control_session->strMensajeicono;
		$this->strMensajeid_estado_cuentas_corrientes=$cuenta_corriente_control_session->strMensajeid_estado_cuentas_corrientes;
			
		
		$this->empresasFK=$cuenta_corriente_control_session->empresasFK;
		$this->idempresaDefaultFK=$cuenta_corriente_control_session->idempresaDefaultFK;
		$this->usuariosFK=$cuenta_corriente_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$cuenta_corriente_control_session->idusuarioDefaultFK;
		$this->bancosFK=$cuenta_corriente_control_session->bancosFK;
		$this->idbancoDefaultFK=$cuenta_corriente_control_session->idbancoDefaultFK;
		$this->cuentasFK=$cuenta_corriente_control_session->cuentasFK;
		$this->idcuentaDefaultFK=$cuenta_corriente_control_session->idcuentaDefaultFK;
		$this->estado_cuentas_corrientessFK=$cuenta_corriente_control_session->estado_cuentas_corrientessFK;
		$this->idestado_cuentas_corrientesDefaultFK=$cuenta_corriente_control_session->idestado_cuentas_corrientesDefaultFK;
		
		
		$this->strVisibleFK_Idbanco=$cuenta_corriente_control_session->strVisibleFK_Idbanco;
		$this->strVisibleFK_Idcuenta=$cuenta_corriente_control_session->strVisibleFK_Idcuenta;
		$this->strVisibleFK_Idempresa=$cuenta_corriente_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idestado_cuentas_corrientes=$cuenta_corriente_control_session->strVisibleFK_Idestado_cuentas_corrientes;
		$this->strVisibleFK_Idusuario=$cuenta_corriente_control_session->strVisibleFK_Idusuario;
		
		
		$this->strTienePermisosdocumento_cuenta_pagar=$cuenta_corriente_control_session->strTienePermisosdocumento_cuenta_pagar;
		$this->strTienePermisoscheque_cuenta_corriente=$cuenta_corriente_control_session->strTienePermisoscheque_cuenta_corriente;
		$this->strTienePermisoscuenta_corriente_detalle=$cuenta_corriente_control_session->strTienePermisoscuenta_corriente_detalle;
		$this->strTienePermisosretiro_cuenta_corriente=$cuenta_corriente_control_session->strTienePermisosretiro_cuenta_corriente;
		$this->strTienePermisosdeposito_cuenta_corriente=$cuenta_corriente_control_session->strTienePermisosdeposito_cuenta_corriente;
		$this->strTienePermisosinstrumento_pago=$cuenta_corriente_control_session->strTienePermisosinstrumento_pago;
		$this->strTienePermisosdocumento_cuenta_cobrar=$cuenta_corriente_control_session->strTienePermisosdocumento_cuenta_cobrar;
		
		
		$this->id_bancoFK_Idbanco=$cuenta_corriente_control_session->id_bancoFK_Idbanco;
		$this->id_cuentaFK_Idcuenta=$cuenta_corriente_control_session->id_cuentaFK_Idcuenta;
		$this->id_empresaFK_Idempresa=$cuenta_corriente_control_session->id_empresaFK_Idempresa;
		$this->id_estado_cuentas_corrientesFK_Idestado_cuentas_corrientes=$cuenta_corriente_control_session->id_estado_cuentas_corrientesFK_Idestado_cuentas_corrientes;
		$this->id_usuarioFK_Idusuario=$cuenta_corriente_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getcuenta_corrienteControllerAdditional() {
		return $this->cuenta_corrienteControllerAdditional;
	}

	public function setcuenta_corrienteControllerAdditional($cuenta_corrienteControllerAdditional) {
		$this->cuenta_corrienteControllerAdditional = $cuenta_corrienteControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcuenta_corrienteActual() : cuenta_corriente {
		return $this->cuenta_corrienteActual;
	}

	public function setcuenta_corrienteActual(cuenta_corriente $cuenta_corrienteActual) {
		$this->cuenta_corrienteActual = $cuenta_corrienteActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcuenta_corriente() : int {
		return $this->idcuenta_corriente;
	}

	public function setidcuenta_corriente(int $idcuenta_corriente) {
		$this->idcuenta_corriente = $idcuenta_corriente;
	}
	
	public function getcuenta_corriente() : cuenta_corriente {
		return $this->cuenta_corriente;
	}

	public function setcuenta_corriente(cuenta_corriente $cuenta_corriente) {
		$this->cuenta_corriente = $cuenta_corriente;
	}
		
	public function getcuenta_corrienteLogic() : cuenta_corriente_logic {		
		return $this->cuenta_corrienteLogic;
	}

	public function setcuenta_corrienteLogic(cuenta_corriente_logic $cuenta_corrienteLogic) {
		$this->cuenta_corrienteLogic = $cuenta_corrienteLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcuenta_corrientesModel() {		
		try {						
			/*cuenta_corrientesModel.setWrappedData(cuenta_corrienteLogic->getcuenta_corrientes());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->cuenta_corrientesModel;
	}
	
	public function setcuenta_corrientesModel($cuenta_corrientesModel) {
		$this->cuenta_corrientesModel = $cuenta_corrientesModel;
	}
	
	public function getcuenta_corrientes() : array {		
		return $this->cuenta_corrientes;
	}
	
	public function setcuenta_corrientes(array $cuenta_corrientes) {
		$this->cuenta_corrientes= $cuenta_corrientes;
	}
	
	public function getcuenta_corrientesEliminados() : array {		
		return $this->cuenta_corrientesEliminados;
	}
	
	public function setcuenta_corrientesEliminados(array $cuenta_corrientesEliminados) {
		$this->cuenta_corrientesEliminados= $cuenta_corrientesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcuenta_corrienteActualFromListDataModel() {
		try {
			/*$cuenta_corrienteClase= $this->cuenta_corrientesModel->getRowData();*/
			
			/*return $cuenta_corriente;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
