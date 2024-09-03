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

namespace com\bydan\contabilidad\inventario\imagen_orden_compra\presentation\control;

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

use com\bydan\contabilidad\inventario\imagen_orden_compra\business\entity\imagen_orden_compra;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/imagen_orden_compra/util/imagen_orden_compra_carga.php');
use com\bydan\contabilidad\inventario\imagen_orden_compra\util\imagen_orden_compra_carga;

use com\bydan\contabilidad\inventario\imagen_orden_compra\util\imagen_orden_compra_util;
use com\bydan\contabilidad\inventario\imagen_orden_compra\util\imagen_orden_compra_param_return;
use com\bydan\contabilidad\inventario\imagen_orden_compra\business\logic\imagen_orden_compra_logic;
use com\bydan\contabilidad\inventario\imagen_orden_compra\presentation\session\imagen_orden_compra_session;


//FK


//REL



/*CARGA ARCHIVOS FRAMEWORK*/
imagen_orden_compra_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
imagen_orden_compra_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
imagen_orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
imagen_orden_compra_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*imagen_orden_compra_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class imagen_orden_compra_init_control extends ControllerBase {	
	
	public $imagen_orden_compraClase=null;	
	public $imagen_orden_comprasModel=null;	
	public $imagen_orden_comprasListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idimagen_orden_compra=0;	
	public ?int $idimagen_orden_compraActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $imagen_orden_compraLogic=null;
	
	public $imagen_orden_compraActual=null;	
	
	public $imagen_orden_compra=null;
	public $imagen_orden_compras=null;
	public $imagen_orden_comprasEliminados=array();
	public $imagen_orden_comprasAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $imagen_orden_comprasLocal=array();
	public ?array $imagen_orden_comprasReporte=null;
	public ?array $imagen_orden_comprasSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadimagen_orden_compra='onload';
	public string $strTipoPaginaAuxiliarimagen_orden_compra='none';
	public string $strTipoUsuarioAuxiliarimagen_orden_compra='none';
		
	public $imagen_orden_compraReturnGeneral=null;
	public $imagen_orden_compraParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $imagen_orden_compraModel=null;
	public $imagen_orden_compraControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeimagen='';
	public string $strMensajenro_compra='';
	
	

	
	
	
	
	
	
	
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->imagen_orden_compraLogic==null) {
				$this->imagen_orden_compraLogic=new imagen_orden_compra_logic();
			}
			
		} else {
			if($this->imagen_orden_compraLogic==null) {
				$this->imagen_orden_compraLogic=new imagen_orden_compra_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->imagen_orden_compraClase==null) {
				$this->imagen_orden_compraClase=new imagen_orden_compra();
			}
			
			$this->imagen_orden_compraClase->setId(0);	
				
				
			$this->imagen_orden_compraClase->setimagen('');	
			$this->imagen_orden_compraClase->setnro_compra('');	
			
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
		$this->prepararEjecutarMantenimientoBase('imagen_orden_compra');
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
		$this->cargarParametrosReporteBase('imagen_orden_compra');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('imagen_orden_compra');
	}
	
	public function actualizarControllerConReturnGeneral(imagen_orden_compra_param_return $imagen_orden_compraReturnGeneral) {
		if($imagen_orden_compraReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesimagen_orden_comprasAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$imagen_orden_compraReturnGeneral->getsMensajeProceso();
		}
		
		if($imagen_orden_compraReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$imagen_orden_compraReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($imagen_orden_compraReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$imagen_orden_compraReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$imagen_orden_compraReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($imagen_orden_compraReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($imagen_orden_compraReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$imagen_orden_compraReturnGeneral->getsFuncionJs();
		}
		
		if($imagen_orden_compraReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(imagen_orden_compra_session $imagen_orden_compra_session){
		$this->strStyleDivArbol=$imagen_orden_compra_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_orden_compra_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_orden_compra_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_orden_compra_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_orden_compra_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_orden_compra_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$imagen_orden_compra_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(imagen_orden_compra_session $imagen_orden_compra_session){
		$imagen_orden_compra_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$imagen_orden_compra_session->strStyleDivHeader='display:none';			
		$imagen_orden_compra_session->strStyleDivContent='width:93%;height:100%';	
		$imagen_orden_compra_session->strStyleDivOpcionesBanner='display:none';	
		$imagen_orden_compra_session->strStyleDivExpandirColapsar='display:none';	
		$imagen_orden_compra_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(imagen_orden_compra_control $imagen_orden_compra_control_session){
		$this->idNuevo=$imagen_orden_compra_control_session->idNuevo;
		$this->imagen_orden_compraActual=$imagen_orden_compra_control_session->imagen_orden_compraActual;
		$this->imagen_orden_compra=$imagen_orden_compra_control_session->imagen_orden_compra;
		$this->imagen_orden_compraClase=$imagen_orden_compra_control_session->imagen_orden_compraClase;
		$this->imagen_orden_compras=$imagen_orden_compra_control_session->imagen_orden_compras;
		$this->imagen_orden_comprasEliminados=$imagen_orden_compra_control_session->imagen_orden_comprasEliminados;
		$this->imagen_orden_compra=$imagen_orden_compra_control_session->imagen_orden_compra;
		$this->imagen_orden_comprasReporte=$imagen_orden_compra_control_session->imagen_orden_comprasReporte;
		$this->imagen_orden_comprasSeleccionados=$imagen_orden_compra_control_session->imagen_orden_comprasSeleccionados;
		$this->arrOrderBy=$imagen_orden_compra_control_session->arrOrderBy;
		$this->arrOrderByRel=$imagen_orden_compra_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$imagen_orden_compra_control_session->arrHistoryWebs;
		$this->arrSessionBases=$imagen_orden_compra_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadimagen_orden_compra=$imagen_orden_compra_control_session->strTypeOnLoadimagen_orden_compra;
		$this->strTipoPaginaAuxiliarimagen_orden_compra=$imagen_orden_compra_control_session->strTipoPaginaAuxiliarimagen_orden_compra;
		$this->strTipoUsuarioAuxiliarimagen_orden_compra=$imagen_orden_compra_control_session->strTipoUsuarioAuxiliarimagen_orden_compra;	
		
		$this->bitEsPopup=$imagen_orden_compra_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$imagen_orden_compra_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$imagen_orden_compra_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$imagen_orden_compra_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$imagen_orden_compra_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$imagen_orden_compra_control_session->strSufijo;
		$this->bitEsRelaciones=$imagen_orden_compra_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$imagen_orden_compra_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$imagen_orden_compra_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$imagen_orden_compra_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$imagen_orden_compra_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$imagen_orden_compra_control_session->strTituloTabla;
		$this->strTituloPathPagina=$imagen_orden_compra_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$imagen_orden_compra_control_session->strTituloPathElementoActual;
		
		if($this->imagen_orden_compraLogic==null) {			
			$this->imagen_orden_compraLogic=new imagen_orden_compra_logic();
		}
		
		
		if($this->imagen_orden_compraClase==null) {
			$this->imagen_orden_compraClase=new imagen_orden_compra();	
		}
		
		$this->imagen_orden_compraLogic->setimagen_orden_compra($this->imagen_orden_compraClase);
		
		
		if($this->imagen_orden_compras==null) {
			$this->imagen_orden_compras=array();	
		}
		
		$this->imagen_orden_compraLogic->setimagen_orden_compras($this->imagen_orden_compras);
		
		
		$this->strTipoView=$imagen_orden_compra_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$imagen_orden_compra_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$imagen_orden_compra_control_session->datosCliente;
		$this->strAccionBusqueda=$imagen_orden_compra_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$imagen_orden_compra_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$imagen_orden_compra_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$imagen_orden_compra_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$imagen_orden_compra_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$imagen_orden_compra_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$imagen_orden_compra_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$imagen_orden_compra_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$imagen_orden_compra_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$imagen_orden_compra_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$imagen_orden_compra_control_session->strTipoPaginacion;
		$this->strTipoAccion=$imagen_orden_compra_control_session->strTipoAccion;
		$this->tiposReportes=$imagen_orden_compra_control_session->tiposReportes;
		$this->tiposReporte=$imagen_orden_compra_control_session->tiposReporte;
		$this->tiposAcciones=$imagen_orden_compra_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$imagen_orden_compra_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$imagen_orden_compra_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$imagen_orden_compra_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$imagen_orden_compra_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$imagen_orden_compra_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$imagen_orden_compra_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$imagen_orden_compra_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$imagen_orden_compra_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$imagen_orden_compra_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$imagen_orden_compra_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$imagen_orden_compra_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$imagen_orden_compra_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$imagen_orden_compra_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$imagen_orden_compra_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$imagen_orden_compra_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$imagen_orden_compra_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$imagen_orden_compra_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$imagen_orden_compra_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$imagen_orden_compra_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$imagen_orden_compra_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$imagen_orden_compra_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$imagen_orden_compra_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$imagen_orden_compra_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$imagen_orden_compra_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$imagen_orden_compra_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$imagen_orden_compra_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$imagen_orden_compra_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$imagen_orden_compra_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$imagen_orden_compra_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$imagen_orden_compra_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$imagen_orden_compra_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$imagen_orden_compra_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$imagen_orden_compra_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$imagen_orden_compra_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$imagen_orden_compra_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$imagen_orden_compra_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$imagen_orden_compra_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$imagen_orden_compra_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$imagen_orden_compra_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$imagen_orden_compra_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$imagen_orden_compra_control_session->resumenUsuarioActual;	
		$this->moduloActual=$imagen_orden_compra_control_session->moduloActual;	
		$this->opcionActual=$imagen_orden_compra_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$imagen_orden_compra_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$imagen_orden_compra_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$imagen_orden_compra_session=unserialize($this->Session->read(imagen_orden_compra_util::$STR_SESSION_NAME));
				
		if($imagen_orden_compra_session==null) {
			$imagen_orden_compra_session=new imagen_orden_compra_session();
		}
		
		$this->strStyleDivArbol=$imagen_orden_compra_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_orden_compra_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_orden_compra_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_orden_compra_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_orden_compra_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_orden_compra_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$imagen_orden_compra_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$imagen_orden_compra_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$imagen_orden_compra_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$imagen_orden_compra_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$imagen_orden_compra_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeimagen=$imagen_orden_compra_control_session->strMensajeimagen;
		$this->strMensajenro_compra=$imagen_orden_compra_control_session->strMensajenro_compra;
			
		
		
		
		
		
		
		

		
		
		
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
	
	public function getimagen_orden_compraControllerAdditional() {
		return $this->imagen_orden_compraControllerAdditional;
	}

	public function setimagen_orden_compraControllerAdditional($imagen_orden_compraControllerAdditional) {
		$this->imagen_orden_compraControllerAdditional = $imagen_orden_compraControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getimagen_orden_compraActual() : imagen_orden_compra {
		return $this->imagen_orden_compraActual;
	}

	public function setimagen_orden_compraActual(imagen_orden_compra $imagen_orden_compraActual) {
		$this->imagen_orden_compraActual = $imagen_orden_compraActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidimagen_orden_compra() : int {
		return $this->idimagen_orden_compra;
	}

	public function setidimagen_orden_compra(int $idimagen_orden_compra) {
		$this->idimagen_orden_compra = $idimagen_orden_compra;
	}
	
	public function getimagen_orden_compra() : imagen_orden_compra {
		return $this->imagen_orden_compra;
	}

	public function setimagen_orden_compra(imagen_orden_compra $imagen_orden_compra) {
		$this->imagen_orden_compra = $imagen_orden_compra;
	}
		
	public function getimagen_orden_compraLogic() : imagen_orden_compra_logic {		
		return $this->imagen_orden_compraLogic;
	}

	public function setimagen_orden_compraLogic(imagen_orden_compra_logic $imagen_orden_compraLogic) {
		$this->imagen_orden_compraLogic = $imagen_orden_compraLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getimagen_orden_comprasModel() {		
		try {						
			/*imagen_orden_comprasModel.setWrappedData(imagen_orden_compraLogic->getimagen_orden_compras());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->imagen_orden_comprasModel;
	}
	
	public function setimagen_orden_comprasModel($imagen_orden_comprasModel) {
		$this->imagen_orden_comprasModel = $imagen_orden_comprasModel;
	}
	
	public function getimagen_orden_compras() : array {		
		return $this->imagen_orden_compras;
	}
	
	public function setimagen_orden_compras(array $imagen_orden_compras) {
		$this->imagen_orden_compras= $imagen_orden_compras;
	}
	
	public function getimagen_orden_comprasEliminados() : array {		
		return $this->imagen_orden_comprasEliminados;
	}
	
	public function setimagen_orden_comprasEliminados(array $imagen_orden_comprasEliminados) {
		$this->imagen_orden_comprasEliminados= $imagen_orden_comprasEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getimagen_orden_compraActualFromListDataModel() {
		try {
			/*$imagen_orden_compraClase= $this->imagen_orden_comprasModel->getRowData();*/
			
			/*return $imagen_orden_compra;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
