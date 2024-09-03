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

namespace com\bydan\contabilidad\facturacion\imagen_factura\presentation\control;

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

use com\bydan\contabilidad\facturacion\imagen_factura\business\entity\imagen_factura;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/imagen_factura/util/imagen_factura_carga.php');
use com\bydan\contabilidad\facturacion\imagen_factura\util\imagen_factura_carga;

use com\bydan\contabilidad\facturacion\imagen_factura\util\imagen_factura_util;
use com\bydan\contabilidad\facturacion\imagen_factura\util\imagen_factura_param_return;
use com\bydan\contabilidad\facturacion\imagen_factura\business\logic\imagen_factura_logic;
use com\bydan\contabilidad\facturacion\imagen_factura\presentation\session\imagen_factura_session;


//FK


use com\bydan\contabilidad\facturacion\factura\business\entity\factura;
use com\bydan\contabilidad\facturacion\factura\business\logic\factura_logic;
use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
imagen_factura_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
imagen_factura_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
imagen_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
imagen_factura_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*imagen_factura_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class imagen_factura_init_control extends ControllerBase {	
	
	public $imagen_facturaClase=null;	
	public $imagen_facturasModel=null;	
	public $imagen_facturasListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idimagen_factura=0;	
	public ?int $idimagen_facturaActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $imagen_facturaLogic=null;
	
	public $imagen_facturaActual=null;	
	
	public $imagen_factura=null;
	public $imagen_facturas=null;
	public $imagen_facturasEliminados=array();
	public $imagen_facturasAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $imagen_facturasLocal=array();
	public ?array $imagen_facturasReporte=null;
	public ?array $imagen_facturasSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadimagen_factura='onload';
	public string $strTipoPaginaAuxiliarimagen_factura='none';
	public string $strTipoUsuarioAuxiliarimagen_factura='none';
		
	public $imagen_facturaReturnGeneral=null;
	public $imagen_facturaParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $imagen_facturaModel=null;
	public $imagen_facturaControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_factura='';
	public string $strMensajeid_imagen='';
	public string $strMensajeimagen='';
	public string $strMensajenro_factura='';
	
	
	public string $strVisibleFK_Idfactura='display:table-row';

	
	public array $facturasFK=array();

	public function getfacturasFK():array {
		return $this->facturasFK;
	}

	public function setfacturasFK(array $facturasFK) {
		$this->facturasFK = $facturasFK;
	}

	public int $idfacturaDefaultFK=-1;

	public function getIdfacturaDefaultFK():int {
		return $this->idfacturaDefaultFK;
	}

	public function setIdfacturaDefaultFK(int $idfacturaDefaultFK) {
		$this->idfacturaDefaultFK = $idfacturaDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_facturaFK_Idfactura=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->imagen_facturaLogic==null) {
				$this->imagen_facturaLogic=new imagen_factura_logic();
			}
			
		} else {
			if($this->imagen_facturaLogic==null) {
				$this->imagen_facturaLogic=new imagen_factura_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->imagen_facturaClase==null) {
				$this->imagen_facturaClase=new imagen_factura();
			}
			
			$this->imagen_facturaClase->setId(0);	
				
				
			$this->imagen_facturaClase->setid_factura(-1);	
			$this->imagen_facturaClase->setid_imagen(0);	
			$this->imagen_facturaClase->setimagen('');	
			$this->imagen_facturaClase->setnro_factura('');	
			
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
		$this->prepararEjecutarMantenimientoBase('imagen_factura');
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
		$this->cargarParametrosReporteBase('imagen_factura');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('imagen_factura');
	}
	
	public function actualizarControllerConReturnGeneral(imagen_factura_param_return $imagen_facturaReturnGeneral) {
		if($imagen_facturaReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesimagen_facturasAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$imagen_facturaReturnGeneral->getsMensajeProceso();
		}
		
		if($imagen_facturaReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$imagen_facturaReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($imagen_facturaReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$imagen_facturaReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$imagen_facturaReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($imagen_facturaReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($imagen_facturaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$imagen_facturaReturnGeneral->getsFuncionJs();
		}
		
		if($imagen_facturaReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(imagen_factura_session $imagen_factura_session){
		$this->strStyleDivArbol=$imagen_factura_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_factura_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_factura_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_factura_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_factura_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_factura_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$imagen_factura_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(imagen_factura_session $imagen_factura_session){
		$imagen_factura_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$imagen_factura_session->strStyleDivHeader='display:none';			
		$imagen_factura_session->strStyleDivContent='width:93%;height:100%';	
		$imagen_factura_session->strStyleDivOpcionesBanner='display:none';	
		$imagen_factura_session->strStyleDivExpandirColapsar='display:none';	
		$imagen_factura_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(imagen_factura_control $imagen_factura_control_session){
		$this->idNuevo=$imagen_factura_control_session->idNuevo;
		$this->imagen_facturaActual=$imagen_factura_control_session->imagen_facturaActual;
		$this->imagen_factura=$imagen_factura_control_session->imagen_factura;
		$this->imagen_facturaClase=$imagen_factura_control_session->imagen_facturaClase;
		$this->imagen_facturas=$imagen_factura_control_session->imagen_facturas;
		$this->imagen_facturasEliminados=$imagen_factura_control_session->imagen_facturasEliminados;
		$this->imagen_factura=$imagen_factura_control_session->imagen_factura;
		$this->imagen_facturasReporte=$imagen_factura_control_session->imagen_facturasReporte;
		$this->imagen_facturasSeleccionados=$imagen_factura_control_session->imagen_facturasSeleccionados;
		$this->arrOrderBy=$imagen_factura_control_session->arrOrderBy;
		$this->arrOrderByRel=$imagen_factura_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$imagen_factura_control_session->arrHistoryWebs;
		$this->arrSessionBases=$imagen_factura_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadimagen_factura=$imagen_factura_control_session->strTypeOnLoadimagen_factura;
		$this->strTipoPaginaAuxiliarimagen_factura=$imagen_factura_control_session->strTipoPaginaAuxiliarimagen_factura;
		$this->strTipoUsuarioAuxiliarimagen_factura=$imagen_factura_control_session->strTipoUsuarioAuxiliarimagen_factura;	
		
		$this->bitEsPopup=$imagen_factura_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$imagen_factura_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$imagen_factura_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$imagen_factura_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$imagen_factura_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$imagen_factura_control_session->strSufijo;
		$this->bitEsRelaciones=$imagen_factura_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$imagen_factura_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$imagen_factura_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$imagen_factura_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$imagen_factura_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$imagen_factura_control_session->strTituloTabla;
		$this->strTituloPathPagina=$imagen_factura_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$imagen_factura_control_session->strTituloPathElementoActual;
		
		if($this->imagen_facturaLogic==null) {			
			$this->imagen_facturaLogic=new imagen_factura_logic();
		}
		
		
		if($this->imagen_facturaClase==null) {
			$this->imagen_facturaClase=new imagen_factura();	
		}
		
		$this->imagen_facturaLogic->setimagen_factura($this->imagen_facturaClase);
		
		
		if($this->imagen_facturas==null) {
			$this->imagen_facturas=array();	
		}
		
		$this->imagen_facturaLogic->setimagen_facturas($this->imagen_facturas);
		
		
		$this->strTipoView=$imagen_factura_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$imagen_factura_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$imagen_factura_control_session->datosCliente;
		$this->strAccionBusqueda=$imagen_factura_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$imagen_factura_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$imagen_factura_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$imagen_factura_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$imagen_factura_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$imagen_factura_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$imagen_factura_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$imagen_factura_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$imagen_factura_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$imagen_factura_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$imagen_factura_control_session->strTipoPaginacion;
		$this->strTipoAccion=$imagen_factura_control_session->strTipoAccion;
		$this->tiposReportes=$imagen_factura_control_session->tiposReportes;
		$this->tiposReporte=$imagen_factura_control_session->tiposReporte;
		$this->tiposAcciones=$imagen_factura_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$imagen_factura_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$imagen_factura_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$imagen_factura_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$imagen_factura_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$imagen_factura_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$imagen_factura_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$imagen_factura_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$imagen_factura_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$imagen_factura_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$imagen_factura_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$imagen_factura_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$imagen_factura_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$imagen_factura_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$imagen_factura_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$imagen_factura_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$imagen_factura_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$imagen_factura_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$imagen_factura_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$imagen_factura_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$imagen_factura_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$imagen_factura_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$imagen_factura_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$imagen_factura_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$imagen_factura_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$imagen_factura_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$imagen_factura_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$imagen_factura_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$imagen_factura_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$imagen_factura_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$imagen_factura_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$imagen_factura_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$imagen_factura_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$imagen_factura_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$imagen_factura_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$imagen_factura_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$imagen_factura_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$imagen_factura_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$imagen_factura_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$imagen_factura_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$imagen_factura_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$imagen_factura_control_session->resumenUsuarioActual;	
		$this->moduloActual=$imagen_factura_control_session->moduloActual;	
		$this->opcionActual=$imagen_factura_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$imagen_factura_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$imagen_factura_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$imagen_factura_session=unserialize($this->Session->read(imagen_factura_util::$STR_SESSION_NAME));
				
		if($imagen_factura_session==null) {
			$imagen_factura_session=new imagen_factura_session();
		}
		
		$this->strStyleDivArbol=$imagen_factura_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_factura_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_factura_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_factura_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_factura_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_factura_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$imagen_factura_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$imagen_factura_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$imagen_factura_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$imagen_factura_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$imagen_factura_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_factura=$imagen_factura_control_session->strMensajeid_factura;
		$this->strMensajeid_imagen=$imagen_factura_control_session->strMensajeid_imagen;
		$this->strMensajeimagen=$imagen_factura_control_session->strMensajeimagen;
		$this->strMensajenro_factura=$imagen_factura_control_session->strMensajenro_factura;
			
		
		$this->facturasFK=$imagen_factura_control_session->facturasFK;
		$this->idfacturaDefaultFK=$imagen_factura_control_session->idfacturaDefaultFK;
		
		
		$this->strVisibleFK_Idfactura=$imagen_factura_control_session->strVisibleFK_Idfactura;
		
		
		
		
		$this->id_facturaFK_Idfactura=$imagen_factura_control_session->id_facturaFK_Idfactura;

		
		
		
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
	
	public function getimagen_facturaControllerAdditional() {
		return $this->imagen_facturaControllerAdditional;
	}

	public function setimagen_facturaControllerAdditional($imagen_facturaControllerAdditional) {
		$this->imagen_facturaControllerAdditional = $imagen_facturaControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getimagen_facturaActual() : imagen_factura {
		return $this->imagen_facturaActual;
	}

	public function setimagen_facturaActual(imagen_factura $imagen_facturaActual) {
		$this->imagen_facturaActual = $imagen_facturaActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidimagen_factura() : int {
		return $this->idimagen_factura;
	}

	public function setidimagen_factura(int $idimagen_factura) {
		$this->idimagen_factura = $idimagen_factura;
	}
	
	public function getimagen_factura() : imagen_factura {
		return $this->imagen_factura;
	}

	public function setimagen_factura(imagen_factura $imagen_factura) {
		$this->imagen_factura = $imagen_factura;
	}
		
	public function getimagen_facturaLogic() : imagen_factura_logic {		
		return $this->imagen_facturaLogic;
	}

	public function setimagen_facturaLogic(imagen_factura_logic $imagen_facturaLogic) {
		$this->imagen_facturaLogic = $imagen_facturaLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getimagen_facturasModel() {		
		try {						
			/*imagen_facturasModel.setWrappedData(imagen_facturaLogic->getimagen_facturas());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->imagen_facturasModel;
	}
	
	public function setimagen_facturasModel($imagen_facturasModel) {
		$this->imagen_facturasModel = $imagen_facturasModel;
	}
	
	public function getimagen_facturas() : array {		
		return $this->imagen_facturas;
	}
	
	public function setimagen_facturas(array $imagen_facturas) {
		$this->imagen_facturas= $imagen_facturas;
	}
	
	public function getimagen_facturasEliminados() : array {		
		return $this->imagen_facturasEliminados;
	}
	
	public function setimagen_facturasEliminados(array $imagen_facturasEliminados) {
		$this->imagen_facturasEliminados= $imagen_facturasEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getimagen_facturaActualFromListDataModel() {
		try {
			/*$imagen_facturaClase= $this->imagen_facturasModel->getRowData();*/
			
			/*return $imagen_factura;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
