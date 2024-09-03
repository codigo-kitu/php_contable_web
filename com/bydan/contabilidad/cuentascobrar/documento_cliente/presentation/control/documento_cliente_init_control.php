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

namespace com\bydan\contabilidad\cuentascobrar\documento_cliente\presentation\control;

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

use com\bydan\contabilidad\cuentascobrar\documento_cliente\business\entity\documento_cliente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/documento_cliente/util/documento_cliente_carga.php');
use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_carga;

use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_util;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_param_return;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\business\logic\documento_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\presentation\session\documento_cliente_session;


//FK


use com\bydan\contabilidad\cuentaspagar\documento_proveedor\business\entity\documento_proveedor;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\business\logic\documento_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
documento_cliente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
documento_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
documento_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
documento_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*documento_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class documento_cliente_init_control extends ControllerBase {	
	
	public $documento_clienteClase=null;	
	public $documento_clientesModel=null;	
	public $documento_clientesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $iddocumento_cliente=0;	
	public ?int $iddocumento_clienteActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $documento_clienteLogic=null;
	
	public $documento_clienteActual=null;	
	
	public $documento_cliente=null;
	public $documento_clientes=null;
	public $documento_clientesEliminados=array();
	public $documento_clientesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $documento_clientesLocal=array();
	public ?array $documento_clientesReporte=null;
	public ?array $documento_clientesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoaddocumento_cliente='onload';
	public string $strTipoPaginaAuxiliardocumento_cliente='none';
	public string $strTipoUsuarioAuxiliardocumento_cliente='none';
		
	public $documento_clienteReturnGeneral=null;
	public $documento_clienteParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $documento_clienteModel=null;
	public $documento_clienteControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_documento_proveedor='';
	public string $strMensajeid_cliente='';
	public string $strMensajedocumento='';
	
	
	public string $strVisibleFK_Idcliente='display:table-row';
	public string $strVisibleFK_Iddocumento_proveedor='display:table-row';

	
	public array $documento_proveedorsFK=array();

	public function getdocumento_proveedorsFK():array {
		return $this->documento_proveedorsFK;
	}

	public function setdocumento_proveedorsFK(array $documento_proveedorsFK) {
		$this->documento_proveedorsFK = $documento_proveedorsFK;
	}

	public int $iddocumento_proveedorDefaultFK=-1;

	public function getIddocumento_proveedorDefaultFK():int {
		return $this->iddocumento_proveedorDefaultFK;
	}

	public function setIddocumento_proveedorDefaultFK(int $iddocumento_proveedorDefaultFK) {
		$this->iddocumento_proveedorDefaultFK = $iddocumento_proveedorDefaultFK;
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

	
	
	
	
	
	
	
	
	public  $id_clienteFK_Idcliente=null;

	public  $id_documento_proveedorFK_Iddocumento_proveedor=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->documento_clienteLogic==null) {
				$this->documento_clienteLogic=new documento_cliente_logic();
			}
			
		} else {
			if($this->documento_clienteLogic==null) {
				$this->documento_clienteLogic=new documento_cliente_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->documento_clienteClase==null) {
				$this->documento_clienteClase=new documento_cliente();
			}
			
			$this->documento_clienteClase->setId(0);	
				
				
			$this->documento_clienteClase->setid_documento_proveedor(-1);	
			$this->documento_clienteClase->setid_cliente(-1);	
			$this->documento_clienteClase->setdocumento('');	
			
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
		$this->prepararEjecutarMantenimientoBase('documento_cliente');
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
		$this->cargarParametrosReporteBase('documento_cliente');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('documento_cliente');
	}
	
	public function actualizarControllerConReturnGeneral(documento_cliente_param_return $documento_clienteReturnGeneral) {
		if($documento_clienteReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesdocumento_clientesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$documento_clienteReturnGeneral->getsMensajeProceso();
		}
		
		if($documento_clienteReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$documento_clienteReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($documento_clienteReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$documento_clienteReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$documento_clienteReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($documento_clienteReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($documento_clienteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$documento_clienteReturnGeneral->getsFuncionJs();
		}
		
		if($documento_clienteReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(documento_cliente_session $documento_cliente_session){
		$this->strStyleDivArbol=$documento_cliente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$documento_cliente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$documento_cliente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$documento_cliente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$documento_cliente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$documento_cliente_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$documento_cliente_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(documento_cliente_session $documento_cliente_session){
		$documento_cliente_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$documento_cliente_session->strStyleDivHeader='display:none';			
		$documento_cliente_session->strStyleDivContent='width:93%;height:100%';	
		$documento_cliente_session->strStyleDivOpcionesBanner='display:none';	
		$documento_cliente_session->strStyleDivExpandirColapsar='display:none';	
		$documento_cliente_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(documento_cliente_control $documento_cliente_control_session){
		$this->idNuevo=$documento_cliente_control_session->idNuevo;
		$this->documento_clienteActual=$documento_cliente_control_session->documento_clienteActual;
		$this->documento_cliente=$documento_cliente_control_session->documento_cliente;
		$this->documento_clienteClase=$documento_cliente_control_session->documento_clienteClase;
		$this->documento_clientes=$documento_cliente_control_session->documento_clientes;
		$this->documento_clientesEliminados=$documento_cliente_control_session->documento_clientesEliminados;
		$this->documento_cliente=$documento_cliente_control_session->documento_cliente;
		$this->documento_clientesReporte=$documento_cliente_control_session->documento_clientesReporte;
		$this->documento_clientesSeleccionados=$documento_cliente_control_session->documento_clientesSeleccionados;
		$this->arrOrderBy=$documento_cliente_control_session->arrOrderBy;
		$this->arrOrderByRel=$documento_cliente_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$documento_cliente_control_session->arrHistoryWebs;
		$this->arrSessionBases=$documento_cliente_control_session->arrSessionBases;		
		
		$this->strTypeOnLoaddocumento_cliente=$documento_cliente_control_session->strTypeOnLoaddocumento_cliente;
		$this->strTipoPaginaAuxiliardocumento_cliente=$documento_cliente_control_session->strTipoPaginaAuxiliardocumento_cliente;
		$this->strTipoUsuarioAuxiliardocumento_cliente=$documento_cliente_control_session->strTipoUsuarioAuxiliardocumento_cliente;	
		
		$this->bitEsPopup=$documento_cliente_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$documento_cliente_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$documento_cliente_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$documento_cliente_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$documento_cliente_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$documento_cliente_control_session->strSufijo;
		$this->bitEsRelaciones=$documento_cliente_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$documento_cliente_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$documento_cliente_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$documento_cliente_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$documento_cliente_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$documento_cliente_control_session->strTituloTabla;
		$this->strTituloPathPagina=$documento_cliente_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$documento_cliente_control_session->strTituloPathElementoActual;
		
		if($this->documento_clienteLogic==null) {			
			$this->documento_clienteLogic=new documento_cliente_logic();
		}
		
		
		if($this->documento_clienteClase==null) {
			$this->documento_clienteClase=new documento_cliente();	
		}
		
		$this->documento_clienteLogic->setdocumento_cliente($this->documento_clienteClase);
		
		
		if($this->documento_clientes==null) {
			$this->documento_clientes=array();	
		}
		
		$this->documento_clienteLogic->setdocumento_clientes($this->documento_clientes);
		
		
		$this->strTipoView=$documento_cliente_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$documento_cliente_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$documento_cliente_control_session->datosCliente;
		$this->strAccionBusqueda=$documento_cliente_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$documento_cliente_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$documento_cliente_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$documento_cliente_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$documento_cliente_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$documento_cliente_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$documento_cliente_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$documento_cliente_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$documento_cliente_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$documento_cliente_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$documento_cliente_control_session->strTipoPaginacion;
		$this->strTipoAccion=$documento_cliente_control_session->strTipoAccion;
		$this->tiposReportes=$documento_cliente_control_session->tiposReportes;
		$this->tiposReporte=$documento_cliente_control_session->tiposReporte;
		$this->tiposAcciones=$documento_cliente_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$documento_cliente_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$documento_cliente_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$documento_cliente_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$documento_cliente_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$documento_cliente_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$documento_cliente_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$documento_cliente_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$documento_cliente_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$documento_cliente_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$documento_cliente_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$documento_cliente_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$documento_cliente_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$documento_cliente_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$documento_cliente_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$documento_cliente_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$documento_cliente_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$documento_cliente_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$documento_cliente_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$documento_cliente_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$documento_cliente_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$documento_cliente_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$documento_cliente_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$documento_cliente_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$documento_cliente_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$documento_cliente_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$documento_cliente_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$documento_cliente_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$documento_cliente_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$documento_cliente_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$documento_cliente_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$documento_cliente_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$documento_cliente_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$documento_cliente_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$documento_cliente_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$documento_cliente_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$documento_cliente_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$documento_cliente_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$documento_cliente_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$documento_cliente_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$documento_cliente_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$documento_cliente_control_session->resumenUsuarioActual;	
		$this->moduloActual=$documento_cliente_control_session->moduloActual;	
		$this->opcionActual=$documento_cliente_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$documento_cliente_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$documento_cliente_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$documento_cliente_session=unserialize($this->Session->read(documento_cliente_util::$STR_SESSION_NAME));
				
		if($documento_cliente_session==null) {
			$documento_cliente_session=new documento_cliente_session();
		}
		
		$this->strStyleDivArbol=$documento_cliente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$documento_cliente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$documento_cliente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$documento_cliente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$documento_cliente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$documento_cliente_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$documento_cliente_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$documento_cliente_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$documento_cliente_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$documento_cliente_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$documento_cliente_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_documento_proveedor=$documento_cliente_control_session->strMensajeid_documento_proveedor;
		$this->strMensajeid_cliente=$documento_cliente_control_session->strMensajeid_cliente;
		$this->strMensajedocumento=$documento_cliente_control_session->strMensajedocumento;
			
		
		$this->documento_proveedorsFK=$documento_cliente_control_session->documento_proveedorsFK;
		$this->iddocumento_proveedorDefaultFK=$documento_cliente_control_session->iddocumento_proveedorDefaultFK;
		$this->clientesFK=$documento_cliente_control_session->clientesFK;
		$this->idclienteDefaultFK=$documento_cliente_control_session->idclienteDefaultFK;
		
		
		$this->strVisibleFK_Idcliente=$documento_cliente_control_session->strVisibleFK_Idcliente;
		$this->strVisibleFK_Iddocumento_proveedor=$documento_cliente_control_session->strVisibleFK_Iddocumento_proveedor;
		
		
		
		
		$this->id_clienteFK_Idcliente=$documento_cliente_control_session->id_clienteFK_Idcliente;
		$this->id_documento_proveedorFK_Iddocumento_proveedor=$documento_cliente_control_session->id_documento_proveedorFK_Iddocumento_proveedor;

		
		
		
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
	
	public function getdocumento_clienteControllerAdditional() {
		return $this->documento_clienteControllerAdditional;
	}

	public function setdocumento_clienteControllerAdditional($documento_clienteControllerAdditional) {
		$this->documento_clienteControllerAdditional = $documento_clienteControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getdocumento_clienteActual() : documento_cliente {
		return $this->documento_clienteActual;
	}

	public function setdocumento_clienteActual(documento_cliente $documento_clienteActual) {
		$this->documento_clienteActual = $documento_clienteActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getiddocumento_cliente() : int {
		return $this->iddocumento_cliente;
	}

	public function setiddocumento_cliente(int $iddocumento_cliente) {
		$this->iddocumento_cliente = $iddocumento_cliente;
	}
	
	public function getdocumento_cliente() : documento_cliente {
		return $this->documento_cliente;
	}

	public function setdocumento_cliente(documento_cliente $documento_cliente) {
		$this->documento_cliente = $documento_cliente;
	}
		
	public function getdocumento_clienteLogic() : documento_cliente_logic {		
		return $this->documento_clienteLogic;
	}

	public function setdocumento_clienteLogic(documento_cliente_logic $documento_clienteLogic) {
		$this->documento_clienteLogic = $documento_clienteLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getdocumento_clientesModel() {		
		try {						
			/*documento_clientesModel.setWrappedData(documento_clienteLogic->getdocumento_clientes());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->documento_clientesModel;
	}
	
	public function setdocumento_clientesModel($documento_clientesModel) {
		$this->documento_clientesModel = $documento_clientesModel;
	}
	
	public function getdocumento_clientes() : array {		
		return $this->documento_clientes;
	}
	
	public function setdocumento_clientes(array $documento_clientes) {
		$this->documento_clientes= $documento_clientes;
	}
	
	public function getdocumento_clientesEliminados() : array {		
		return $this->documento_clientesEliminados;
	}
	
	public function setdocumento_clientesEliminados(array $documento_clientesEliminados) {
		$this->documento_clientesEliminados= $documento_clientesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getdocumento_clienteActualFromListDataModel() {
		try {
			/*$documento_clienteClase= $this->documento_clientesModel->getRowData();*/
			
			/*return $documento_cliente;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
