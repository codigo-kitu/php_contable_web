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

namespace com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\presentation\control;

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

use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\business\entity\giro_negocio_cliente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/giro_negocio_cliente/util/giro_negocio_cliente_carga.php');
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\util\giro_negocio_cliente_carga;

use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\util\giro_negocio_cliente_util;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\util\giro_negocio_cliente_param_return;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\business\logic\giro_negocio_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\presentation\session\giro_negocio_cliente_session;


//FK


//REL


use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;


/*CARGA ARCHIVOS FRAMEWORK*/
giro_negocio_cliente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
giro_negocio_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
giro_negocio_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
giro_negocio_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*giro_negocio_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class giro_negocio_cliente_init_control extends ControllerBase {	
	
	public $giro_negocio_clienteClase=null;	
	public $giro_negocio_clientesModel=null;	
	public $giro_negocio_clientesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idgiro_negocio_cliente=0;	
	public ?int $idgiro_negocio_clienteActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $giro_negocio_clienteLogic=null;
	
	public $giro_negocio_clienteActual=null;	
	
	public $giro_negocio_cliente=null;
	public $giro_negocio_clientes=null;
	public $giro_negocio_clientesEliminados=array();
	public $giro_negocio_clientesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $giro_negocio_clientesLocal=array();
	public ?array $giro_negocio_clientesReporte=null;
	public ?array $giro_negocio_clientesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadgiro_negocio_cliente='onload';
	public string $strTipoPaginaAuxiliargiro_negocio_cliente='none';
	public string $strTipoUsuarioAuxiliargiro_negocio_cliente='none';
		
	public $giro_negocio_clienteReturnGeneral=null;
	public $giro_negocio_clienteParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $giro_negocio_clienteModel=null;
	public $giro_negocio_clienteControllerAdditional=null;
	
	
	

	public $clienteLogic=null;

	public function  getclienteLogic() {
		return $this->clienteLogic;
	}

	public function setclienteLogic($clienteLogic) {
		$this->clienteLogic =$clienteLogic;
	}
 	
	
	public string $strMensajenombre='';
	public string $strMensajepredeterminado='';
	
	

	
	
	
	
	
	
	
	public $strTienePermisoscliente='none';
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->giro_negocio_clienteLogic==null) {
				$this->giro_negocio_clienteLogic=new giro_negocio_cliente_logic();
			}
			
		} else {
			if($this->giro_negocio_clienteLogic==null) {
				$this->giro_negocio_clienteLogic=new giro_negocio_cliente_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->giro_negocio_clienteClase==null) {
				$this->giro_negocio_clienteClase=new giro_negocio_cliente();
			}
			
			$this->giro_negocio_clienteClase->setId(0);	
				
				
			$this->giro_negocio_clienteClase->setnombre('');	
			$this->giro_negocio_clienteClase->setpredeterminado(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('giro_negocio_cliente');
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
		$this->cargarParametrosReporteBase('giro_negocio_cliente');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('giro_negocio_cliente');
	}
	
	public function actualizarControllerConReturnGeneral(giro_negocio_cliente_param_return $giro_negocio_clienteReturnGeneral) {
		if($giro_negocio_clienteReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesgiro_negocio_clientesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$giro_negocio_clienteReturnGeneral->getsMensajeProceso();
		}
		
		if($giro_negocio_clienteReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$giro_negocio_clienteReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($giro_negocio_clienteReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$giro_negocio_clienteReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$giro_negocio_clienteReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($giro_negocio_clienteReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($giro_negocio_clienteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$giro_negocio_clienteReturnGeneral->getsFuncionJs();
		}
		
		if($giro_negocio_clienteReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(giro_negocio_cliente_session $giro_negocio_cliente_session){
		$this->strStyleDivArbol=$giro_negocio_cliente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$giro_negocio_cliente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$giro_negocio_cliente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$giro_negocio_cliente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$giro_negocio_cliente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$giro_negocio_cliente_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$giro_negocio_cliente_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(giro_negocio_cliente_session $giro_negocio_cliente_session){
		$giro_negocio_cliente_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$giro_negocio_cliente_session->strStyleDivHeader='display:none';			
		$giro_negocio_cliente_session->strStyleDivContent='width:93%;height:100%';	
		$giro_negocio_cliente_session->strStyleDivOpcionesBanner='display:none';	
		$giro_negocio_cliente_session->strStyleDivExpandirColapsar='display:none';	
		$giro_negocio_cliente_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(giro_negocio_cliente_control $giro_negocio_cliente_control_session){
		$this->idNuevo=$giro_negocio_cliente_control_session->idNuevo;
		$this->giro_negocio_clienteActual=$giro_negocio_cliente_control_session->giro_negocio_clienteActual;
		$this->giro_negocio_cliente=$giro_negocio_cliente_control_session->giro_negocio_cliente;
		$this->giro_negocio_clienteClase=$giro_negocio_cliente_control_session->giro_negocio_clienteClase;
		$this->giro_negocio_clientes=$giro_negocio_cliente_control_session->giro_negocio_clientes;
		$this->giro_negocio_clientesEliminados=$giro_negocio_cliente_control_session->giro_negocio_clientesEliminados;
		$this->giro_negocio_cliente=$giro_negocio_cliente_control_session->giro_negocio_cliente;
		$this->giro_negocio_clientesReporte=$giro_negocio_cliente_control_session->giro_negocio_clientesReporte;
		$this->giro_negocio_clientesSeleccionados=$giro_negocio_cliente_control_session->giro_negocio_clientesSeleccionados;
		$this->arrOrderBy=$giro_negocio_cliente_control_session->arrOrderBy;
		$this->arrOrderByRel=$giro_negocio_cliente_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$giro_negocio_cliente_control_session->arrHistoryWebs;
		$this->arrSessionBases=$giro_negocio_cliente_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadgiro_negocio_cliente=$giro_negocio_cliente_control_session->strTypeOnLoadgiro_negocio_cliente;
		$this->strTipoPaginaAuxiliargiro_negocio_cliente=$giro_negocio_cliente_control_session->strTipoPaginaAuxiliargiro_negocio_cliente;
		$this->strTipoUsuarioAuxiliargiro_negocio_cliente=$giro_negocio_cliente_control_session->strTipoUsuarioAuxiliargiro_negocio_cliente;	
		
		$this->bitEsPopup=$giro_negocio_cliente_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$giro_negocio_cliente_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$giro_negocio_cliente_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$giro_negocio_cliente_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$giro_negocio_cliente_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$giro_negocio_cliente_control_session->strSufijo;
		$this->bitEsRelaciones=$giro_negocio_cliente_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$giro_negocio_cliente_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$giro_negocio_cliente_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$giro_negocio_cliente_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$giro_negocio_cliente_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$giro_negocio_cliente_control_session->strTituloTabla;
		$this->strTituloPathPagina=$giro_negocio_cliente_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$giro_negocio_cliente_control_session->strTituloPathElementoActual;
		
		if($this->giro_negocio_clienteLogic==null) {			
			$this->giro_negocio_clienteLogic=new giro_negocio_cliente_logic();
		}
		
		
		if($this->giro_negocio_clienteClase==null) {
			$this->giro_negocio_clienteClase=new giro_negocio_cliente();	
		}
		
		$this->giro_negocio_clienteLogic->setgiro_negocio_cliente($this->giro_negocio_clienteClase);
		
		
		if($this->giro_negocio_clientes==null) {
			$this->giro_negocio_clientes=array();	
		}
		
		$this->giro_negocio_clienteLogic->setgiro_negocio_clientes($this->giro_negocio_clientes);
		
		
		$this->strTipoView=$giro_negocio_cliente_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$giro_negocio_cliente_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$giro_negocio_cliente_control_session->datosCliente;
		$this->strAccionBusqueda=$giro_negocio_cliente_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$giro_negocio_cliente_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$giro_negocio_cliente_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$giro_negocio_cliente_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$giro_negocio_cliente_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$giro_negocio_cliente_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$giro_negocio_cliente_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$giro_negocio_cliente_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$giro_negocio_cliente_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$giro_negocio_cliente_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$giro_negocio_cliente_control_session->strTipoPaginacion;
		$this->strTipoAccion=$giro_negocio_cliente_control_session->strTipoAccion;
		$this->tiposReportes=$giro_negocio_cliente_control_session->tiposReportes;
		$this->tiposReporte=$giro_negocio_cliente_control_session->tiposReporte;
		$this->tiposAcciones=$giro_negocio_cliente_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$giro_negocio_cliente_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$giro_negocio_cliente_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$giro_negocio_cliente_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$giro_negocio_cliente_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$giro_negocio_cliente_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$giro_negocio_cliente_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$giro_negocio_cliente_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$giro_negocio_cliente_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$giro_negocio_cliente_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$giro_negocio_cliente_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$giro_negocio_cliente_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$giro_negocio_cliente_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$giro_negocio_cliente_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$giro_negocio_cliente_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$giro_negocio_cliente_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$giro_negocio_cliente_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$giro_negocio_cliente_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$giro_negocio_cliente_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$giro_negocio_cliente_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$giro_negocio_cliente_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$giro_negocio_cliente_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$giro_negocio_cliente_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$giro_negocio_cliente_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$giro_negocio_cliente_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$giro_negocio_cliente_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$giro_negocio_cliente_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$giro_negocio_cliente_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$giro_negocio_cliente_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$giro_negocio_cliente_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$giro_negocio_cliente_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$giro_negocio_cliente_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$giro_negocio_cliente_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$giro_negocio_cliente_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$giro_negocio_cliente_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$giro_negocio_cliente_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$giro_negocio_cliente_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$giro_negocio_cliente_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$giro_negocio_cliente_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$giro_negocio_cliente_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$giro_negocio_cliente_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$giro_negocio_cliente_control_session->resumenUsuarioActual;	
		$this->moduloActual=$giro_negocio_cliente_control_session->moduloActual;	
		$this->opcionActual=$giro_negocio_cliente_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$giro_negocio_cliente_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$giro_negocio_cliente_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$giro_negocio_cliente_session=unserialize($this->Session->read(giro_negocio_cliente_util::$STR_SESSION_NAME));
				
		if($giro_negocio_cliente_session==null) {
			$giro_negocio_cliente_session=new giro_negocio_cliente_session();
		}
		
		$this->strStyleDivArbol=$giro_negocio_cliente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$giro_negocio_cliente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$giro_negocio_cliente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$giro_negocio_cliente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$giro_negocio_cliente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$giro_negocio_cliente_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$giro_negocio_cliente_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$giro_negocio_cliente_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$giro_negocio_cliente_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$giro_negocio_cliente_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$giro_negocio_cliente_session->strRecargarFkQuery;
		*/
		
		$this->strMensajenombre=$giro_negocio_cliente_control_session->strMensajenombre;
		$this->strMensajepredeterminado=$giro_negocio_cliente_control_session->strMensajepredeterminado;
			
		
		
		
		
		
		$this->strTienePermisoscliente=$giro_negocio_cliente_control_session->strTienePermisoscliente;
		
		

		
		
		
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
	
	public function getgiro_negocio_clienteControllerAdditional() {
		return $this->giro_negocio_clienteControllerAdditional;
	}

	public function setgiro_negocio_clienteControllerAdditional($giro_negocio_clienteControllerAdditional) {
		$this->giro_negocio_clienteControllerAdditional = $giro_negocio_clienteControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getgiro_negocio_clienteActual() : giro_negocio_cliente {
		return $this->giro_negocio_clienteActual;
	}

	public function setgiro_negocio_clienteActual(giro_negocio_cliente $giro_negocio_clienteActual) {
		$this->giro_negocio_clienteActual = $giro_negocio_clienteActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidgiro_negocio_cliente() : int {
		return $this->idgiro_negocio_cliente;
	}

	public function setidgiro_negocio_cliente(int $idgiro_negocio_cliente) {
		$this->idgiro_negocio_cliente = $idgiro_negocio_cliente;
	}
	
	public function getgiro_negocio_cliente() : giro_negocio_cliente {
		return $this->giro_negocio_cliente;
	}

	public function setgiro_negocio_cliente(giro_negocio_cliente $giro_negocio_cliente) {
		$this->giro_negocio_cliente = $giro_negocio_cliente;
	}
		
	public function getgiro_negocio_clienteLogic() : giro_negocio_cliente_logic {		
		return $this->giro_negocio_clienteLogic;
	}

	public function setgiro_negocio_clienteLogic(giro_negocio_cliente_logic $giro_negocio_clienteLogic) {
		$this->giro_negocio_clienteLogic = $giro_negocio_clienteLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getgiro_negocio_clientesModel() {		
		try {						
			/*giro_negocio_clientesModel.setWrappedData(giro_negocio_clienteLogic->getgiro_negocio_clientes());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->giro_negocio_clientesModel;
	}
	
	public function setgiro_negocio_clientesModel($giro_negocio_clientesModel) {
		$this->giro_negocio_clientesModel = $giro_negocio_clientesModel;
	}
	
	public function getgiro_negocio_clientes() : array {		
		return $this->giro_negocio_clientes;
	}
	
	public function setgiro_negocio_clientes(array $giro_negocio_clientes) {
		$this->giro_negocio_clientes= $giro_negocio_clientes;
	}
	
	public function getgiro_negocio_clientesEliminados() : array {		
		return $this->giro_negocio_clientesEliminados;
	}
	
	public function setgiro_negocio_clientesEliminados(array $giro_negocio_clientesEliminados) {
		$this->giro_negocio_clientesEliminados= $giro_negocio_clientesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getgiro_negocio_clienteActualFromListDataModel() {
		try {
			/*$giro_negocio_clienteClase= $this->giro_negocio_clientesModel->getRowData();*/
			
			/*return $giro_negocio_cliente;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
