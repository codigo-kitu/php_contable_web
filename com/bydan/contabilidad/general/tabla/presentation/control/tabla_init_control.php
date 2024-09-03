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

namespace com\bydan\contabilidad\general\tabla\presentation\control;

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

use com\bydan\contabilidad\general\tabla\business\entity\tabla;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/tabla/util/tabla_carga.php');
use com\bydan\contabilidad\general\tabla\util\tabla_carga;

use com\bydan\contabilidad\general\tabla\util\tabla_util;
use com\bydan\contabilidad\general\tabla\util\tabla_param_return;
use com\bydan\contabilidad\general\tabla\business\logic\tabla_logic;
use com\bydan\contabilidad\general\tabla\presentation\session\tabla_session;


//FK


use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\modulo\business\logic\modulo_logic;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;

//REL


use com\bydan\contabilidad\inventario\costo_producto\util\costo_producto_carga;
use com\bydan\contabilidad\inventario\costo_producto\util\costo_producto_util;
use com\bydan\contabilidad\inventario\costo_producto\presentation\session\costo_producto_session;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_util;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\presentation\session\cuenta_corriente_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
tabla_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
tabla_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
tabla_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
tabla_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*tabla_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class tabla_init_control extends ControllerBase {	
	
	public $tablaClase=null;	
	public $tablasModel=null;	
	public $tablasListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idtabla=0;	
	public ?int $idtablaActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $tablaLogic=null;
	
	public $tablaActual=null;	
	
	public $tabla=null;
	public $tablas=null;
	public $tablasEliminados=array();
	public $tablasAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $tablasLocal=array();
	public ?array $tablasReporte=null;
	public ?array $tablasSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadtabla='onload';
	public string $strTipoPaginaAuxiliartabla='none';
	public string $strTipoUsuarioAuxiliartabla='none';
		
	public $tablaReturnGeneral=null;
	public $tablaParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $tablaModel=null;
	public $tablaControllerAdditional=null;
	
	
	

	public $costoproductoLogic=null;

	public function  getcosto_productoLogic() {
		return $this->costoproductoLogic;
	}

	public function setcosto_productoLogic($costoproductoLogic) {
		$this->costoproductoLogic =$costoproductoLogic;
	}


	public $cuentacorrientedetalleLogic=null;

	public function  getcuenta_corriente_detalleLogic() {
		return $this->cuentacorrientedetalleLogic;
	}

	public function setcuenta_corriente_detalleLogic($cuentacorrientedetalleLogic) {
		$this->cuentacorrientedetalleLogic =$cuentacorrientedetalleLogic;
	}
 	
	
	public string $strMensajeid_modulo='';
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	public string $strMensajedescripcion='';
	
	
	public string $strVisibleFK_Idmodulo='display:table-row';

	
	public array $modulosFK=array();

	public function getmodulosFK():array {
		return $this->modulosFK;
	}

	public function setmodulosFK(array $modulosFK) {
		$this->modulosFK = $modulosFK;
	}

	public int $idmoduloDefaultFK=-1;

	public function getIdmoduloDefaultFK():int {
		return $this->idmoduloDefaultFK;
	}

	public function setIdmoduloDefaultFK(int $idmoduloDefaultFK) {
		$this->idmoduloDefaultFK = $idmoduloDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisoscosto_producto='none';
	public $strTienePermisoscuenta_corriente_detalle='none';
	
	
	public  $id_moduloFK_Idmodulo=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->tablaLogic==null) {
				$this->tablaLogic=new tabla_logic();
			}
			
		} else {
			if($this->tablaLogic==null) {
				$this->tablaLogic=new tabla_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->tablaClase==null) {
				$this->tablaClase=new tabla();
			}
			
			$this->tablaClase->setId(0);	
				
				
			$this->tablaClase->setid_modulo(-1);	
			$this->tablaClase->setcodigo('');	
			$this->tablaClase->setnombre('');	
			$this->tablaClase->setdescripcion('');	
			
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
		$this->prepararEjecutarMantenimientoBase('tabla');
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
		$this->cargarParametrosReporteBase('tabla');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('tabla');
	}
	
	public function actualizarControllerConReturnGeneral(tabla_param_return $tablaReturnGeneral) {
		if($tablaReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajestablasAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$tablaReturnGeneral->getsMensajeProceso();
		}
		
		if($tablaReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$tablaReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($tablaReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$tablaReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$tablaReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($tablaReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($tablaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$tablaReturnGeneral->getsFuncionJs();
		}
		
		if($tablaReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(tabla_session $tabla_session){
		$this->strStyleDivArbol=$tabla_session->strStyleDivArbol;	
		$this->strStyleDivContent=$tabla_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$tabla_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$tabla_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$tabla_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$tabla_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$tabla_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(tabla_session $tabla_session){
		$tabla_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$tabla_session->strStyleDivHeader='display:none';			
		$tabla_session->strStyleDivContent='width:93%;height:100%';	
		$tabla_session->strStyleDivOpcionesBanner='display:none';	
		$tabla_session->strStyleDivExpandirColapsar='display:none';	
		$tabla_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(tabla_control $tabla_control_session){
		$this->idNuevo=$tabla_control_session->idNuevo;
		$this->tablaActual=$tabla_control_session->tablaActual;
		$this->tabla=$tabla_control_session->tabla;
		$this->tablaClase=$tabla_control_session->tablaClase;
		$this->tablas=$tabla_control_session->tablas;
		$this->tablasEliminados=$tabla_control_session->tablasEliminados;
		$this->tabla=$tabla_control_session->tabla;
		$this->tablasReporte=$tabla_control_session->tablasReporte;
		$this->tablasSeleccionados=$tabla_control_session->tablasSeleccionados;
		$this->arrOrderBy=$tabla_control_session->arrOrderBy;
		$this->arrOrderByRel=$tabla_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$tabla_control_session->arrHistoryWebs;
		$this->arrSessionBases=$tabla_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadtabla=$tabla_control_session->strTypeOnLoadtabla;
		$this->strTipoPaginaAuxiliartabla=$tabla_control_session->strTipoPaginaAuxiliartabla;
		$this->strTipoUsuarioAuxiliartabla=$tabla_control_session->strTipoUsuarioAuxiliartabla;	
		
		$this->bitEsPopup=$tabla_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$tabla_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$tabla_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$tabla_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$tabla_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$tabla_control_session->strSufijo;
		$this->bitEsRelaciones=$tabla_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$tabla_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$tabla_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$tabla_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$tabla_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$tabla_control_session->strTituloTabla;
		$this->strTituloPathPagina=$tabla_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$tabla_control_session->strTituloPathElementoActual;
		
		if($this->tablaLogic==null) {			
			$this->tablaLogic=new tabla_logic();
		}
		
		
		if($this->tablaClase==null) {
			$this->tablaClase=new tabla();	
		}
		
		$this->tablaLogic->settabla($this->tablaClase);
		
		
		if($this->tablas==null) {
			$this->tablas=array();	
		}
		
		$this->tablaLogic->settablas($this->tablas);
		
		
		$this->strTipoView=$tabla_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$tabla_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$tabla_control_session->datosCliente;
		$this->strAccionBusqueda=$tabla_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$tabla_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$tabla_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$tabla_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$tabla_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$tabla_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$tabla_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$tabla_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$tabla_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$tabla_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$tabla_control_session->strTipoPaginacion;
		$this->strTipoAccion=$tabla_control_session->strTipoAccion;
		$this->tiposReportes=$tabla_control_session->tiposReportes;
		$this->tiposReporte=$tabla_control_session->tiposReporte;
		$this->tiposAcciones=$tabla_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$tabla_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$tabla_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$tabla_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$tabla_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$tabla_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$tabla_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$tabla_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$tabla_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$tabla_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$tabla_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$tabla_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$tabla_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$tabla_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$tabla_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$tabla_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$tabla_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$tabla_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$tabla_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$tabla_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$tabla_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$tabla_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$tabla_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$tabla_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$tabla_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$tabla_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$tabla_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$tabla_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$tabla_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$tabla_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$tabla_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$tabla_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$tabla_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$tabla_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$tabla_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$tabla_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$tabla_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$tabla_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$tabla_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$tabla_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$tabla_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$tabla_control_session->resumenUsuarioActual;	
		$this->moduloActual=$tabla_control_session->moduloActual;	
		$this->opcionActual=$tabla_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$tabla_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$tabla_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$tabla_session=unserialize($this->Session->read(tabla_util::$STR_SESSION_NAME));
				
		if($tabla_session==null) {
			$tabla_session=new tabla_session();
		}
		
		$this->strStyleDivArbol=$tabla_session->strStyleDivArbol;	
		$this->strStyleDivContent=$tabla_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$tabla_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$tabla_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$tabla_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$tabla_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$tabla_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$tabla_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$tabla_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$tabla_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$tabla_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_modulo=$tabla_control_session->strMensajeid_modulo;
		$this->strMensajecodigo=$tabla_control_session->strMensajecodigo;
		$this->strMensajenombre=$tabla_control_session->strMensajenombre;
		$this->strMensajedescripcion=$tabla_control_session->strMensajedescripcion;
			
		
		$this->modulosFK=$tabla_control_session->modulosFK;
		$this->idmoduloDefaultFK=$tabla_control_session->idmoduloDefaultFK;
		
		
		$this->strVisibleFK_Idmodulo=$tabla_control_session->strVisibleFK_Idmodulo;
		
		
		$this->strTienePermisoscosto_producto=$tabla_control_session->strTienePermisoscosto_producto;
		$this->strTienePermisoscuenta_corriente_detalle=$tabla_control_session->strTienePermisoscuenta_corriente_detalle;
		
		
		$this->id_moduloFK_Idmodulo=$tabla_control_session->id_moduloFK_Idmodulo;

		
		
		
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
	
	public function gettablaControllerAdditional() {
		return $this->tablaControllerAdditional;
	}

	public function settablaControllerAdditional($tablaControllerAdditional) {
		$this->tablaControllerAdditional = $tablaControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function gettablaActual() : tabla {
		return $this->tablaActual;
	}

	public function settablaActual(tabla $tablaActual) {
		$this->tablaActual = $tablaActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidtabla() : int {
		return $this->idtabla;
	}

	public function setidtabla(int $idtabla) {
		$this->idtabla = $idtabla;
	}
	
	public function gettabla() : tabla {
		return $this->tabla;
	}

	public function settabla(tabla $tabla) {
		$this->tabla = $tabla;
	}
		
	public function gettablaLogic() : tabla_logic {		
		return $this->tablaLogic;
	}

	public function settablaLogic(tabla_logic $tablaLogic) {
		$this->tablaLogic = $tablaLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function gettablasModel() {		
		try {						
			/*tablasModel.setWrappedData(tablaLogic->gettablas());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->tablasModel;
	}
	
	public function settablasModel($tablasModel) {
		$this->tablasModel = $tablasModel;
	}
	
	public function gettablas() : array {		
		return $this->tablas;
	}
	
	public function settablas(array $tablas) {
		$this->tablas= $tablas;
	}
	
	public function gettablasEliminados() : array {		
		return $this->tablasEliminados;
	}
	
	public function settablasEliminados(array $tablasEliminados) {
		$this->tablasEliminados= $tablasEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function gettablaActualFromListDataModel() {
		try {
			/*$tablaClase= $this->tablasModel->getRowData();*/
			
			/*return $tabla;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
