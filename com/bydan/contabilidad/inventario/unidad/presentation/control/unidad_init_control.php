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

namespace com\bydan\contabilidad\inventario\unidad\presentation\control;

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

use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/unidad/util/unidad_carga.php');
use com\bydan\contabilidad\inventario\unidad\util\unidad_carga;

use com\bydan\contabilidad\inventario\unidad\util\unidad_util;
use com\bydan\contabilidad\inventario\unidad\util\unidad_param_return;
use com\bydan\contabilidad\inventario\unidad\business\logic\unidad_logic;
use com\bydan\contabilidad\inventario\unidad\presentation\session\unidad_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
unidad_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
unidad_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
unidad_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
unidad_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*unidad_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class unidad_init_control extends ControllerBase {	
	
	public $unidadClase=null;	
	public $unidadsModel=null;	
	public $unidadsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idunidad=0;	
	public ?int $idunidadActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $unidadLogic=null;
	
	public $unidadActual=null;	
	
	public $unidad=null;
	public $unidads=null;
	public $unidadsEliminados=array();
	public $unidadsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $unidadsLocal=array();
	public ?array $unidadsReporte=null;
	public ?array $unidadsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadunidad='onload';
	public string $strTipoPaginaAuxiliarunidad='none';
	public string $strTipoUsuarioAuxiliarunidad='none';
		
	public $unidadReturnGeneral=null;
	public $unidadParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $unidadModel=null;
	public $unidadControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	public string $strMensajedefecto_venta='';
	public string $strMensajedefecto_compra='';
	public string $strMensajenumero_productos='';
	
	
	public string $strVisibleFK_Idempresa='display:table-row';

	
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

	
	
	
	
	
	
	
	
	public  $id_empresaFK_Idempresa=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->unidadLogic==null) {
				$this->unidadLogic=new unidad_logic();
			}
			
		} else {
			if($this->unidadLogic==null) {
				$this->unidadLogic=new unidad_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->unidadClase==null) {
				$this->unidadClase=new unidad();
			}
			
			$this->unidadClase->setId(0);	
				
				
			$this->unidadClase->setid_empresa(-1);	
			$this->unidadClase->setcodigo('');	
			$this->unidadClase->setnombre('');	
			$this->unidadClase->setdefecto_venta(false);	
			$this->unidadClase->setdefecto_compra(false);	
			$this->unidadClase->setnumero_productos(0);	
			
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
		$this->prepararEjecutarMantenimientoBase('unidad');
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
		$this->cargarParametrosReporteBase('unidad');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('unidad');
	}
	
	public function actualizarControllerConReturnGeneral(unidad_param_return $unidadReturnGeneral) {
		if($unidadReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesunidadsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$unidadReturnGeneral->getsMensajeProceso();
		}
		
		if($unidadReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$unidadReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($unidadReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$unidadReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$unidadReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($unidadReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($unidadReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$unidadReturnGeneral->getsFuncionJs();
		}
		
		if($unidadReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(unidad_session $unidad_session){
		$this->strStyleDivArbol=$unidad_session->strStyleDivArbol;	
		$this->strStyleDivContent=$unidad_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$unidad_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$unidad_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$unidad_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$unidad_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$unidad_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(unidad_session $unidad_session){
		$unidad_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$unidad_session->strStyleDivHeader='display:none';			
		$unidad_session->strStyleDivContent='width:93%;height:100%';	
		$unidad_session->strStyleDivOpcionesBanner='display:none';	
		$unidad_session->strStyleDivExpandirColapsar='display:none';	
		$unidad_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(unidad_control $unidad_control_session){
		$this->idNuevo=$unidad_control_session->idNuevo;
		$this->unidadActual=$unidad_control_session->unidadActual;
		$this->unidad=$unidad_control_session->unidad;
		$this->unidadClase=$unidad_control_session->unidadClase;
		$this->unidads=$unidad_control_session->unidads;
		$this->unidadsEliminados=$unidad_control_session->unidadsEliminados;
		$this->unidad=$unidad_control_session->unidad;
		$this->unidadsReporte=$unidad_control_session->unidadsReporte;
		$this->unidadsSeleccionados=$unidad_control_session->unidadsSeleccionados;
		$this->arrOrderBy=$unidad_control_session->arrOrderBy;
		$this->arrOrderByRel=$unidad_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$unidad_control_session->arrHistoryWebs;
		$this->arrSessionBases=$unidad_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadunidad=$unidad_control_session->strTypeOnLoadunidad;
		$this->strTipoPaginaAuxiliarunidad=$unidad_control_session->strTipoPaginaAuxiliarunidad;
		$this->strTipoUsuarioAuxiliarunidad=$unidad_control_session->strTipoUsuarioAuxiliarunidad;	
		
		$this->bitEsPopup=$unidad_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$unidad_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$unidad_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$unidad_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$unidad_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$unidad_control_session->strSufijo;
		$this->bitEsRelaciones=$unidad_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$unidad_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$unidad_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$unidad_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$unidad_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$unidad_control_session->strTituloTabla;
		$this->strTituloPathPagina=$unidad_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$unidad_control_session->strTituloPathElementoActual;
		
		if($this->unidadLogic==null) {			
			$this->unidadLogic=new unidad_logic();
		}
		
		
		if($this->unidadClase==null) {
			$this->unidadClase=new unidad();	
		}
		
		$this->unidadLogic->setunidad($this->unidadClase);
		
		
		if($this->unidads==null) {
			$this->unidads=array();	
		}
		
		$this->unidadLogic->setunidads($this->unidads);
		
		
		$this->strTipoView=$unidad_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$unidad_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$unidad_control_session->datosCliente;
		$this->strAccionBusqueda=$unidad_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$unidad_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$unidad_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$unidad_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$unidad_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$unidad_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$unidad_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$unidad_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$unidad_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$unidad_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$unidad_control_session->strTipoPaginacion;
		$this->strTipoAccion=$unidad_control_session->strTipoAccion;
		$this->tiposReportes=$unidad_control_session->tiposReportes;
		$this->tiposReporte=$unidad_control_session->tiposReporte;
		$this->tiposAcciones=$unidad_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$unidad_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$unidad_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$unidad_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$unidad_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$unidad_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$unidad_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$unidad_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$unidad_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$unidad_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$unidad_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$unidad_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$unidad_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$unidad_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$unidad_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$unidad_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$unidad_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$unidad_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$unidad_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$unidad_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$unidad_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$unidad_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$unidad_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$unidad_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$unidad_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$unidad_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$unidad_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$unidad_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$unidad_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$unidad_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$unidad_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$unidad_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$unidad_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$unidad_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$unidad_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$unidad_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$unidad_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$unidad_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$unidad_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$unidad_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$unidad_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$unidad_control_session->resumenUsuarioActual;	
		$this->moduloActual=$unidad_control_session->moduloActual;	
		$this->opcionActual=$unidad_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$unidad_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$unidad_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$unidad_session=unserialize($this->Session->read(unidad_util::$STR_SESSION_NAME));
				
		if($unidad_session==null) {
			$unidad_session=new unidad_session();
		}
		
		$this->strStyleDivArbol=$unidad_session->strStyleDivArbol;	
		$this->strStyleDivContent=$unidad_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$unidad_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$unidad_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$unidad_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$unidad_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$unidad_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$unidad_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$unidad_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$unidad_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$unidad_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$unidad_control_session->strMensajeid_empresa;
		$this->strMensajecodigo=$unidad_control_session->strMensajecodigo;
		$this->strMensajenombre=$unidad_control_session->strMensajenombre;
		$this->strMensajedefecto_venta=$unidad_control_session->strMensajedefecto_venta;
		$this->strMensajedefecto_compra=$unidad_control_session->strMensajedefecto_compra;
		$this->strMensajenumero_productos=$unidad_control_session->strMensajenumero_productos;
			
		
		$this->empresasFK=$unidad_control_session->empresasFK;
		$this->idempresaDefaultFK=$unidad_control_session->idempresaDefaultFK;
		
		
		$this->strVisibleFK_Idempresa=$unidad_control_session->strVisibleFK_Idempresa;
		
		
		
		
		$this->id_empresaFK_Idempresa=$unidad_control_session->id_empresaFK_Idempresa;

		
		
		
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
	
	public function getunidadControllerAdditional() {
		return $this->unidadControllerAdditional;
	}

	public function setunidadControllerAdditional($unidadControllerAdditional) {
		$this->unidadControllerAdditional = $unidadControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getunidadActual() : unidad {
		return $this->unidadActual;
	}

	public function setunidadActual(unidad $unidadActual) {
		$this->unidadActual = $unidadActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidunidad() : int {
		return $this->idunidad;
	}

	public function setidunidad(int $idunidad) {
		$this->idunidad = $idunidad;
	}
	
	public function getunidad() : unidad {
		return $this->unidad;
	}

	public function setunidad(unidad $unidad) {
		$this->unidad = $unidad;
	}
		
	public function getunidadLogic() : unidad_logic {		
		return $this->unidadLogic;
	}

	public function setunidadLogic(unidad_logic $unidadLogic) {
		$this->unidadLogic = $unidadLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getunidadsModel() {		
		try {						
			/*unidadsModel.setWrappedData(unidadLogic->getunidads());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->unidadsModel;
	}
	
	public function setunidadsModel($unidadsModel) {
		$this->unidadsModel = $unidadsModel;
	}
	
	public function getunidads() : array {		
		return $this->unidads;
	}
	
	public function setunidads(array $unidads) {
		$this->unidads= $unidads;
	}
	
	public function getunidadsEliminados() : array {		
		return $this->unidadsEliminados;
	}
	
	public function setunidadsEliminados(array $unidadsEliminados) {
		$this->unidadsEliminados= $unidadsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getunidadActualFromListDataModel() {
		try {
			/*$unidadClase= $this->unidadsModel->getRowData();*/
			
			/*return $unidad;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
