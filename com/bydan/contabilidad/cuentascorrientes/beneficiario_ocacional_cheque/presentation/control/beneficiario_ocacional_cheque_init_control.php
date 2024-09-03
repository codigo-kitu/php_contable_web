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

namespace com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\entity\beneficiario_ocacional_cheque;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/util/beneficiario_ocacional_cheque_carga.php');
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_carga;

use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_util;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_param_return;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\logic\beneficiario_ocacional_cheque_logic;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\presentation\session\beneficiario_ocacional_cheque_session;


//FK


//REL


use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\presentation\session\cheque_cuenta_corriente_session;


/*CARGA ARCHIVOS FRAMEWORK*/
beneficiario_ocacional_cheque_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
beneficiario_ocacional_cheque_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
beneficiario_ocacional_cheque_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
beneficiario_ocacional_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*beneficiario_ocacional_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class beneficiario_ocacional_cheque_init_control extends ControllerBase {	
	
	public $beneficiario_ocacional_chequeClase=null;	
	public $beneficiario_ocacional_chequesModel=null;	
	public $beneficiario_ocacional_chequesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idbeneficiario_ocacional_cheque=0;	
	public ?int $idbeneficiario_ocacional_chequeActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $beneficiario_ocacional_chequeLogic=null;
	
	public $beneficiario_ocacional_chequeActual=null;	
	
	public $beneficiario_ocacional_cheque=null;
	public $beneficiario_ocacional_cheques=null;
	public $beneficiario_ocacional_chequesEliminados=array();
	public $beneficiario_ocacional_chequesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $beneficiario_ocacional_chequesLocal=array();
	public ?array $beneficiario_ocacional_chequesReporte=null;
	public ?array $beneficiario_ocacional_chequesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadbeneficiario_ocacional_cheque='onload';
	public string $strTipoPaginaAuxiliarbeneficiario_ocacional_cheque='none';
	public string $strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque='none';
		
	public $beneficiario_ocacional_chequeReturnGeneral=null;
	public $beneficiario_ocacional_chequeParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $beneficiario_ocacional_chequeModel=null;
	public $beneficiario_ocacional_chequeControllerAdditional=null;
	
	
	

	public $chequecuentacorrienteLogic=null;

	public function  getcheque_cuenta_corrienteLogic() {
		return $this->chequecuentacorrienteLogic;
	}

	public function setcheque_cuenta_corrienteLogic($chequecuentacorrienteLogic) {
		$this->chequecuentacorrienteLogic =$chequecuentacorrienteLogic;
	}
 	
	
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	public string $strMensajedireccion_1='';
	public string $strMensajedireccion_2='';
	public string $strMensajedireccion_3='';
	public string $strMensajetelefono='';
	public string $strMensajetelefono_movil='';
	public string $strMensajeemail='';
	public string $strMensajenotas='';
	public string $strMensajeregistro_ocacional='';
	public string $strMensajeregistro_tributario='';
	
	

	
	
	
	
	
	
	
	public $strTienePermisoscheque_cuenta_corriente='none';
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->beneficiario_ocacional_chequeLogic==null) {
				$this->beneficiario_ocacional_chequeLogic=new beneficiario_ocacional_cheque_logic();
			}
			
		} else {
			if($this->beneficiario_ocacional_chequeLogic==null) {
				$this->beneficiario_ocacional_chequeLogic=new beneficiario_ocacional_cheque_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->beneficiario_ocacional_chequeClase==null) {
				$this->beneficiario_ocacional_chequeClase=new beneficiario_ocacional_cheque();
			}
			
			$this->beneficiario_ocacional_chequeClase->setId(0);	
				
				
			$this->beneficiario_ocacional_chequeClase->setcodigo('');	
			$this->beneficiario_ocacional_chequeClase->setnombre('');	
			$this->beneficiario_ocacional_chequeClase->setdireccion_1('');	
			$this->beneficiario_ocacional_chequeClase->setdireccion_2('');	
			$this->beneficiario_ocacional_chequeClase->setdireccion_3('');	
			$this->beneficiario_ocacional_chequeClase->settelefono('');	
			$this->beneficiario_ocacional_chequeClase->settelefono_movil('');	
			$this->beneficiario_ocacional_chequeClase->setemail('');	
			$this->beneficiario_ocacional_chequeClase->setnotas('');	
			$this->beneficiario_ocacional_chequeClase->setregistro_ocacional('');	
			$this->beneficiario_ocacional_chequeClase->setregistro_tributario('');	
			
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
		$this->prepararEjecutarMantenimientoBase('beneficiario_ocacional_cheque');
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
		$this->cargarParametrosReporteBase('beneficiario_ocacional_cheque');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('beneficiario_ocacional_cheque');
	}
	
	public function actualizarControllerConReturnGeneral(beneficiario_ocacional_cheque_param_return $beneficiario_ocacional_chequeReturnGeneral) {
		if($beneficiario_ocacional_chequeReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesbeneficiario_ocacional_chequesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$beneficiario_ocacional_chequeReturnGeneral->getsMensajeProceso();
		}
		
		if($beneficiario_ocacional_chequeReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$beneficiario_ocacional_chequeReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($beneficiario_ocacional_chequeReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$beneficiario_ocacional_chequeReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$beneficiario_ocacional_chequeReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($beneficiario_ocacional_chequeReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($beneficiario_ocacional_chequeReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$beneficiario_ocacional_chequeReturnGeneral->getsFuncionJs();
		}
		
		if($beneficiario_ocacional_chequeReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(beneficiario_ocacional_cheque_session $beneficiario_ocacional_cheque_session){
		$this->strStyleDivArbol=$beneficiario_ocacional_cheque_session->strStyleDivArbol;	
		$this->strStyleDivContent=$beneficiario_ocacional_cheque_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$beneficiario_ocacional_cheque_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$beneficiario_ocacional_cheque_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$beneficiario_ocacional_cheque_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$beneficiario_ocacional_cheque_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$beneficiario_ocacional_cheque_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(beneficiario_ocacional_cheque_session $beneficiario_ocacional_cheque_session){
		$beneficiario_ocacional_cheque_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$beneficiario_ocacional_cheque_session->strStyleDivHeader='display:none';			
		$beneficiario_ocacional_cheque_session->strStyleDivContent='width:93%;height:100%';	
		$beneficiario_ocacional_cheque_session->strStyleDivOpcionesBanner='display:none';	
		$beneficiario_ocacional_cheque_session->strStyleDivExpandirColapsar='display:none';	
		$beneficiario_ocacional_cheque_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(beneficiario_ocacional_cheque_control $beneficiario_ocacional_cheque_control_session){
		$this->idNuevo=$beneficiario_ocacional_cheque_control_session->idNuevo;
		$this->beneficiario_ocacional_chequeActual=$beneficiario_ocacional_cheque_control_session->beneficiario_ocacional_chequeActual;
		$this->beneficiario_ocacional_cheque=$beneficiario_ocacional_cheque_control_session->beneficiario_ocacional_cheque;
		$this->beneficiario_ocacional_chequeClase=$beneficiario_ocacional_cheque_control_session->beneficiario_ocacional_chequeClase;
		$this->beneficiario_ocacional_cheques=$beneficiario_ocacional_cheque_control_session->beneficiario_ocacional_cheques;
		$this->beneficiario_ocacional_chequesEliminados=$beneficiario_ocacional_cheque_control_session->beneficiario_ocacional_chequesEliminados;
		$this->beneficiario_ocacional_cheque=$beneficiario_ocacional_cheque_control_session->beneficiario_ocacional_cheque;
		$this->beneficiario_ocacional_chequesReporte=$beneficiario_ocacional_cheque_control_session->beneficiario_ocacional_chequesReporte;
		$this->beneficiario_ocacional_chequesSeleccionados=$beneficiario_ocacional_cheque_control_session->beneficiario_ocacional_chequesSeleccionados;
		$this->arrOrderBy=$beneficiario_ocacional_cheque_control_session->arrOrderBy;
		$this->arrOrderByRel=$beneficiario_ocacional_cheque_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$beneficiario_ocacional_cheque_control_session->arrHistoryWebs;
		$this->arrSessionBases=$beneficiario_ocacional_cheque_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadbeneficiario_ocacional_cheque=$beneficiario_ocacional_cheque_control_session->strTypeOnLoadbeneficiario_ocacional_cheque;
		$this->strTipoPaginaAuxiliarbeneficiario_ocacional_cheque=$beneficiario_ocacional_cheque_control_session->strTipoPaginaAuxiliarbeneficiario_ocacional_cheque;
		$this->strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque=$beneficiario_ocacional_cheque_control_session->strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque;	
		
		$this->bitEsPopup=$beneficiario_ocacional_cheque_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$beneficiario_ocacional_cheque_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$beneficiario_ocacional_cheque_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$beneficiario_ocacional_cheque_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$beneficiario_ocacional_cheque_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$beneficiario_ocacional_cheque_control_session->strSufijo;
		$this->bitEsRelaciones=$beneficiario_ocacional_cheque_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$beneficiario_ocacional_cheque_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$beneficiario_ocacional_cheque_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$beneficiario_ocacional_cheque_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$beneficiario_ocacional_cheque_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$beneficiario_ocacional_cheque_control_session->strTituloTabla;
		$this->strTituloPathPagina=$beneficiario_ocacional_cheque_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$beneficiario_ocacional_cheque_control_session->strTituloPathElementoActual;
		
		if($this->beneficiario_ocacional_chequeLogic==null) {			
			$this->beneficiario_ocacional_chequeLogic=new beneficiario_ocacional_cheque_logic();
		}
		
		
		if($this->beneficiario_ocacional_chequeClase==null) {
			$this->beneficiario_ocacional_chequeClase=new beneficiario_ocacional_cheque();	
		}
		
		$this->beneficiario_ocacional_chequeLogic->setbeneficiario_ocacional_cheque($this->beneficiario_ocacional_chequeClase);
		
		
		if($this->beneficiario_ocacional_cheques==null) {
			$this->beneficiario_ocacional_cheques=array();	
		}
		
		$this->beneficiario_ocacional_chequeLogic->setbeneficiario_ocacional_cheques($this->beneficiario_ocacional_cheques);
		
		
		$this->strTipoView=$beneficiario_ocacional_cheque_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$beneficiario_ocacional_cheque_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$beneficiario_ocacional_cheque_control_session->datosCliente;
		$this->strAccionBusqueda=$beneficiario_ocacional_cheque_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$beneficiario_ocacional_cheque_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$beneficiario_ocacional_cheque_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$beneficiario_ocacional_cheque_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$beneficiario_ocacional_cheque_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$beneficiario_ocacional_cheque_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$beneficiario_ocacional_cheque_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$beneficiario_ocacional_cheque_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$beneficiario_ocacional_cheque_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$beneficiario_ocacional_cheque_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$beneficiario_ocacional_cheque_control_session->strTipoPaginacion;
		$this->strTipoAccion=$beneficiario_ocacional_cheque_control_session->strTipoAccion;
		$this->tiposReportes=$beneficiario_ocacional_cheque_control_session->tiposReportes;
		$this->tiposReporte=$beneficiario_ocacional_cheque_control_session->tiposReporte;
		$this->tiposAcciones=$beneficiario_ocacional_cheque_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$beneficiario_ocacional_cheque_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$beneficiario_ocacional_cheque_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$beneficiario_ocacional_cheque_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$beneficiario_ocacional_cheque_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$beneficiario_ocacional_cheque_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$beneficiario_ocacional_cheque_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$beneficiario_ocacional_cheque_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$beneficiario_ocacional_cheque_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$beneficiario_ocacional_cheque_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$beneficiario_ocacional_cheque_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$beneficiario_ocacional_cheque_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$beneficiario_ocacional_cheque_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$beneficiario_ocacional_cheque_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$beneficiario_ocacional_cheque_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$beneficiario_ocacional_cheque_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$beneficiario_ocacional_cheque_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$beneficiario_ocacional_cheque_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$beneficiario_ocacional_cheque_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$beneficiario_ocacional_cheque_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$beneficiario_ocacional_cheque_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$beneficiario_ocacional_cheque_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$beneficiario_ocacional_cheque_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$beneficiario_ocacional_cheque_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$beneficiario_ocacional_cheque_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$beneficiario_ocacional_cheque_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$beneficiario_ocacional_cheque_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$beneficiario_ocacional_cheque_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$beneficiario_ocacional_cheque_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$beneficiario_ocacional_cheque_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$beneficiario_ocacional_cheque_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$beneficiario_ocacional_cheque_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$beneficiario_ocacional_cheque_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$beneficiario_ocacional_cheque_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$beneficiario_ocacional_cheque_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$beneficiario_ocacional_cheque_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$beneficiario_ocacional_cheque_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$beneficiario_ocacional_cheque_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$beneficiario_ocacional_cheque_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$beneficiario_ocacional_cheque_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$beneficiario_ocacional_cheque_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$beneficiario_ocacional_cheque_control_session->resumenUsuarioActual;	
		$this->moduloActual=$beneficiario_ocacional_cheque_control_session->moduloActual;	
		$this->opcionActual=$beneficiario_ocacional_cheque_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$beneficiario_ocacional_cheque_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$beneficiario_ocacional_cheque_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$beneficiario_ocacional_cheque_session=unserialize($this->Session->read(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME));
				
		if($beneficiario_ocacional_cheque_session==null) {
			$beneficiario_ocacional_cheque_session=new beneficiario_ocacional_cheque_session();
		}
		
		$this->strStyleDivArbol=$beneficiario_ocacional_cheque_session->strStyleDivArbol;	
		$this->strStyleDivContent=$beneficiario_ocacional_cheque_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$beneficiario_ocacional_cheque_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$beneficiario_ocacional_cheque_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$beneficiario_ocacional_cheque_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$beneficiario_ocacional_cheque_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$beneficiario_ocacional_cheque_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$beneficiario_ocacional_cheque_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$beneficiario_ocacional_cheque_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$beneficiario_ocacional_cheque_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$beneficiario_ocacional_cheque_session->strRecargarFkQuery;
		*/
		
		$this->strMensajecodigo=$beneficiario_ocacional_cheque_control_session->strMensajecodigo;
		$this->strMensajenombre=$beneficiario_ocacional_cheque_control_session->strMensajenombre;
		$this->strMensajedireccion_1=$beneficiario_ocacional_cheque_control_session->strMensajedireccion_1;
		$this->strMensajedireccion_2=$beneficiario_ocacional_cheque_control_session->strMensajedireccion_2;
		$this->strMensajedireccion_3=$beneficiario_ocacional_cheque_control_session->strMensajedireccion_3;
		$this->strMensajetelefono=$beneficiario_ocacional_cheque_control_session->strMensajetelefono;
		$this->strMensajetelefono_movil=$beneficiario_ocacional_cheque_control_session->strMensajetelefono_movil;
		$this->strMensajeemail=$beneficiario_ocacional_cheque_control_session->strMensajeemail;
		$this->strMensajenotas=$beneficiario_ocacional_cheque_control_session->strMensajenotas;
		$this->strMensajeregistro_ocacional=$beneficiario_ocacional_cheque_control_session->strMensajeregistro_ocacional;
		$this->strMensajeregistro_tributario=$beneficiario_ocacional_cheque_control_session->strMensajeregistro_tributario;
			
		
		
		
		
		
		$this->strTienePermisoscheque_cuenta_corriente=$beneficiario_ocacional_cheque_control_session->strTienePermisoscheque_cuenta_corriente;
		
		

		
		
		
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
	
	public function getbeneficiario_ocacional_chequeControllerAdditional() {
		return $this->beneficiario_ocacional_chequeControllerAdditional;
	}

	public function setbeneficiario_ocacional_chequeControllerAdditional($beneficiario_ocacional_chequeControllerAdditional) {
		$this->beneficiario_ocacional_chequeControllerAdditional = $beneficiario_ocacional_chequeControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getbeneficiario_ocacional_chequeActual() : beneficiario_ocacional_cheque {
		return $this->beneficiario_ocacional_chequeActual;
	}

	public function setbeneficiario_ocacional_chequeActual(beneficiario_ocacional_cheque $beneficiario_ocacional_chequeActual) {
		$this->beneficiario_ocacional_chequeActual = $beneficiario_ocacional_chequeActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidbeneficiario_ocacional_cheque() : int {
		return $this->idbeneficiario_ocacional_cheque;
	}

	public function setidbeneficiario_ocacional_cheque(int $idbeneficiario_ocacional_cheque) {
		$this->idbeneficiario_ocacional_cheque = $idbeneficiario_ocacional_cheque;
	}
	
	public function getbeneficiario_ocacional_cheque() : beneficiario_ocacional_cheque {
		return $this->beneficiario_ocacional_cheque;
	}

	public function setbeneficiario_ocacional_cheque(beneficiario_ocacional_cheque $beneficiario_ocacional_cheque) {
		$this->beneficiario_ocacional_cheque = $beneficiario_ocacional_cheque;
	}
		
	public function getbeneficiario_ocacional_chequeLogic() : beneficiario_ocacional_cheque_logic {		
		return $this->beneficiario_ocacional_chequeLogic;
	}

	public function setbeneficiario_ocacional_chequeLogic(beneficiario_ocacional_cheque_logic $beneficiario_ocacional_chequeLogic) {
		$this->beneficiario_ocacional_chequeLogic = $beneficiario_ocacional_chequeLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getbeneficiario_ocacional_chequesModel() {		
		try {						
			/*beneficiario_ocacional_chequesModel.setWrappedData(beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->beneficiario_ocacional_chequesModel;
	}
	
	public function setbeneficiario_ocacional_chequesModel($beneficiario_ocacional_chequesModel) {
		$this->beneficiario_ocacional_chequesModel = $beneficiario_ocacional_chequesModel;
	}
	
	public function getbeneficiario_ocacional_cheques() : array {		
		return $this->beneficiario_ocacional_cheques;
	}
	
	public function setbeneficiario_ocacional_cheques(array $beneficiario_ocacional_cheques) {
		$this->beneficiario_ocacional_cheques= $beneficiario_ocacional_cheques;
	}
	
	public function getbeneficiario_ocacional_chequesEliminados() : array {		
		return $this->beneficiario_ocacional_chequesEliminados;
	}
	
	public function setbeneficiario_ocacional_chequesEliminados(array $beneficiario_ocacional_chequesEliminados) {
		$this->beneficiario_ocacional_chequesEliminados= $beneficiario_ocacional_chequesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getbeneficiario_ocacional_chequeActualFromListDataModel() {
		try {
			/*$beneficiario_ocacional_chequeClase= $this->beneficiario_ocacional_chequesModel->getRowData();*/
			
			/*return $beneficiario_ocacional_cheque;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
