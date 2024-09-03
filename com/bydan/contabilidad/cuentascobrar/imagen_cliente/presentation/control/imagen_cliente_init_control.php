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

namespace com\bydan\contabilidad\cuentascobrar\imagen_cliente\presentation\control;

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

use com\bydan\contabilidad\cuentascobrar\imagen_cliente\business\entity\imagen_cliente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/imagen_cliente/util/imagen_cliente_carga.php');
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\util\imagen_cliente_carga;

use com\bydan\contabilidad\cuentascobrar\imagen_cliente\util\imagen_cliente_util;
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\util\imagen_cliente_param_return;
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\business\logic\imagen_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\presentation\session\imagen_cliente_session;


//FK


use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
imagen_cliente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
imagen_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
imagen_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
imagen_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*imagen_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class imagen_cliente_init_control extends ControllerBase {	
	
	public $imagen_clienteClase=null;	
	public $imagen_clientesModel=null;	
	public $imagen_clientesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idimagen_cliente=0;	
	public ?int $idimagen_clienteActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $imagen_clienteLogic=null;
	
	public $imagen_clienteActual=null;	
	
	public $imagen_cliente=null;
	public $imagen_clientes=null;
	public $imagen_clientesEliminados=array();
	public $imagen_clientesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $imagen_clientesLocal=array();
	public ?array $imagen_clientesReporte=null;
	public ?array $imagen_clientesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadimagen_cliente='onload';
	public string $strTipoPaginaAuxiliarimagen_cliente='none';
	public string $strTipoUsuarioAuxiliarimagen_cliente='none';
		
	public $imagen_clienteReturnGeneral=null;
	public $imagen_clienteParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $imagen_clienteModel=null;
	public $imagen_clienteControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_imagen='';
	public string $strMensajeid_cliente='';
	public string $strMensajeimagen='';
	
	
	public string $strVisibleFK_Idcliente='display:table-row';

	
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


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->imagen_clienteLogic==null) {
				$this->imagen_clienteLogic=new imagen_cliente_logic();
			}
			
		} else {
			if($this->imagen_clienteLogic==null) {
				$this->imagen_clienteLogic=new imagen_cliente_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->imagen_clienteClase==null) {
				$this->imagen_clienteClase=new imagen_cliente();
			}
			
			$this->imagen_clienteClase->setId(0);	
				
				
			$this->imagen_clienteClase->setid_imagen(0);	
			$this->imagen_clienteClase->setid_cliente(-1);	
			$this->imagen_clienteClase->setimagen('');	
			
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
		$this->prepararEjecutarMantenimientoBase('imagen_cliente');
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
		$this->cargarParametrosReporteBase('imagen_cliente');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('imagen_cliente');
	}
	
	public function actualizarControllerConReturnGeneral(imagen_cliente_param_return $imagen_clienteReturnGeneral) {
		if($imagen_clienteReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesimagen_clientesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$imagen_clienteReturnGeneral->getsMensajeProceso();
		}
		
		if($imagen_clienteReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$imagen_clienteReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($imagen_clienteReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$imagen_clienteReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$imagen_clienteReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($imagen_clienteReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($imagen_clienteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$imagen_clienteReturnGeneral->getsFuncionJs();
		}
		
		if($imagen_clienteReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(imagen_cliente_session $imagen_cliente_session){
		$this->strStyleDivArbol=$imagen_cliente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_cliente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_cliente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_cliente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_cliente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_cliente_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$imagen_cliente_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(imagen_cliente_session $imagen_cliente_session){
		$imagen_cliente_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$imagen_cliente_session->strStyleDivHeader='display:none';			
		$imagen_cliente_session->strStyleDivContent='width:93%;height:100%';	
		$imagen_cliente_session->strStyleDivOpcionesBanner='display:none';	
		$imagen_cliente_session->strStyleDivExpandirColapsar='display:none';	
		$imagen_cliente_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(imagen_cliente_control $imagen_cliente_control_session){
		$this->idNuevo=$imagen_cliente_control_session->idNuevo;
		$this->imagen_clienteActual=$imagen_cliente_control_session->imagen_clienteActual;
		$this->imagen_cliente=$imagen_cliente_control_session->imagen_cliente;
		$this->imagen_clienteClase=$imagen_cliente_control_session->imagen_clienteClase;
		$this->imagen_clientes=$imagen_cliente_control_session->imagen_clientes;
		$this->imagen_clientesEliminados=$imagen_cliente_control_session->imagen_clientesEliminados;
		$this->imagen_cliente=$imagen_cliente_control_session->imagen_cliente;
		$this->imagen_clientesReporte=$imagen_cliente_control_session->imagen_clientesReporte;
		$this->imagen_clientesSeleccionados=$imagen_cliente_control_session->imagen_clientesSeleccionados;
		$this->arrOrderBy=$imagen_cliente_control_session->arrOrderBy;
		$this->arrOrderByRel=$imagen_cliente_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$imagen_cliente_control_session->arrHistoryWebs;
		$this->arrSessionBases=$imagen_cliente_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadimagen_cliente=$imagen_cliente_control_session->strTypeOnLoadimagen_cliente;
		$this->strTipoPaginaAuxiliarimagen_cliente=$imagen_cliente_control_session->strTipoPaginaAuxiliarimagen_cliente;
		$this->strTipoUsuarioAuxiliarimagen_cliente=$imagen_cliente_control_session->strTipoUsuarioAuxiliarimagen_cliente;	
		
		$this->bitEsPopup=$imagen_cliente_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$imagen_cliente_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$imagen_cliente_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$imagen_cliente_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$imagen_cliente_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$imagen_cliente_control_session->strSufijo;
		$this->bitEsRelaciones=$imagen_cliente_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$imagen_cliente_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$imagen_cliente_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$imagen_cliente_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$imagen_cliente_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$imagen_cliente_control_session->strTituloTabla;
		$this->strTituloPathPagina=$imagen_cliente_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$imagen_cliente_control_session->strTituloPathElementoActual;
		
		if($this->imagen_clienteLogic==null) {			
			$this->imagen_clienteLogic=new imagen_cliente_logic();
		}
		
		
		if($this->imagen_clienteClase==null) {
			$this->imagen_clienteClase=new imagen_cliente();	
		}
		
		$this->imagen_clienteLogic->setimagen_cliente($this->imagen_clienteClase);
		
		
		if($this->imagen_clientes==null) {
			$this->imagen_clientes=array();	
		}
		
		$this->imagen_clienteLogic->setimagen_clientes($this->imagen_clientes);
		
		
		$this->strTipoView=$imagen_cliente_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$imagen_cliente_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$imagen_cliente_control_session->datosCliente;
		$this->strAccionBusqueda=$imagen_cliente_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$imagen_cliente_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$imagen_cliente_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$imagen_cliente_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$imagen_cliente_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$imagen_cliente_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$imagen_cliente_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$imagen_cliente_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$imagen_cliente_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$imagen_cliente_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$imagen_cliente_control_session->strTipoPaginacion;
		$this->strTipoAccion=$imagen_cliente_control_session->strTipoAccion;
		$this->tiposReportes=$imagen_cliente_control_session->tiposReportes;
		$this->tiposReporte=$imagen_cliente_control_session->tiposReporte;
		$this->tiposAcciones=$imagen_cliente_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$imagen_cliente_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$imagen_cliente_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$imagen_cliente_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$imagen_cliente_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$imagen_cliente_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$imagen_cliente_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$imagen_cliente_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$imagen_cliente_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$imagen_cliente_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$imagen_cliente_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$imagen_cliente_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$imagen_cliente_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$imagen_cliente_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$imagen_cliente_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$imagen_cliente_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$imagen_cliente_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$imagen_cliente_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$imagen_cliente_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$imagen_cliente_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$imagen_cliente_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$imagen_cliente_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$imagen_cliente_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$imagen_cliente_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$imagen_cliente_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$imagen_cliente_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$imagen_cliente_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$imagen_cliente_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$imagen_cliente_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$imagen_cliente_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$imagen_cliente_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$imagen_cliente_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$imagen_cliente_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$imagen_cliente_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$imagen_cliente_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$imagen_cliente_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$imagen_cliente_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$imagen_cliente_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$imagen_cliente_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$imagen_cliente_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$imagen_cliente_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$imagen_cliente_control_session->resumenUsuarioActual;	
		$this->moduloActual=$imagen_cliente_control_session->moduloActual;	
		$this->opcionActual=$imagen_cliente_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$imagen_cliente_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$imagen_cliente_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$imagen_cliente_session=unserialize($this->Session->read(imagen_cliente_util::$STR_SESSION_NAME));
				
		if($imagen_cliente_session==null) {
			$imagen_cliente_session=new imagen_cliente_session();
		}
		
		$this->strStyleDivArbol=$imagen_cliente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_cliente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_cliente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_cliente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_cliente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_cliente_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$imagen_cliente_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$imagen_cliente_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$imagen_cliente_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$imagen_cliente_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$imagen_cliente_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_imagen=$imagen_cliente_control_session->strMensajeid_imagen;
		$this->strMensajeid_cliente=$imagen_cliente_control_session->strMensajeid_cliente;
		$this->strMensajeimagen=$imagen_cliente_control_session->strMensajeimagen;
			
		
		$this->clientesFK=$imagen_cliente_control_session->clientesFK;
		$this->idclienteDefaultFK=$imagen_cliente_control_session->idclienteDefaultFK;
		
		
		$this->strVisibleFK_Idcliente=$imagen_cliente_control_session->strVisibleFK_Idcliente;
		
		
		
		
		$this->id_clienteFK_Idcliente=$imagen_cliente_control_session->id_clienteFK_Idcliente;

		
		
		
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
	
	public function getimagen_clienteControllerAdditional() {
		return $this->imagen_clienteControllerAdditional;
	}

	public function setimagen_clienteControllerAdditional($imagen_clienteControllerAdditional) {
		$this->imagen_clienteControllerAdditional = $imagen_clienteControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getimagen_clienteActual() : imagen_cliente {
		return $this->imagen_clienteActual;
	}

	public function setimagen_clienteActual(imagen_cliente $imagen_clienteActual) {
		$this->imagen_clienteActual = $imagen_clienteActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidimagen_cliente() : int {
		return $this->idimagen_cliente;
	}

	public function setidimagen_cliente(int $idimagen_cliente) {
		$this->idimagen_cliente = $idimagen_cliente;
	}
	
	public function getimagen_cliente() : imagen_cliente {
		return $this->imagen_cliente;
	}

	public function setimagen_cliente(imagen_cliente $imagen_cliente) {
		$this->imagen_cliente = $imagen_cliente;
	}
		
	public function getimagen_clienteLogic() : imagen_cliente_logic {		
		return $this->imagen_clienteLogic;
	}

	public function setimagen_clienteLogic(imagen_cliente_logic $imagen_clienteLogic) {
		$this->imagen_clienteLogic = $imagen_clienteLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getimagen_clientesModel() {		
		try {						
			/*imagen_clientesModel.setWrappedData(imagen_clienteLogic->getimagen_clientes());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->imagen_clientesModel;
	}
	
	public function setimagen_clientesModel($imagen_clientesModel) {
		$this->imagen_clientesModel = $imagen_clientesModel;
	}
	
	public function getimagen_clientes() : array {		
		return $this->imagen_clientes;
	}
	
	public function setimagen_clientes(array $imagen_clientes) {
		$this->imagen_clientes= $imagen_clientes;
	}
	
	public function getimagen_clientesEliminados() : array {		
		return $this->imagen_clientesEliminados;
	}
	
	public function setimagen_clientesEliminados(array $imagen_clientesEliminados) {
		$this->imagen_clientesEliminados= $imagen_clientesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getimagen_clienteActualFromListDataModel() {
		try {
			/*$imagen_clienteClase= $this->imagen_clientesModel->getRowData();*/
			
			/*return $imagen_cliente;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
