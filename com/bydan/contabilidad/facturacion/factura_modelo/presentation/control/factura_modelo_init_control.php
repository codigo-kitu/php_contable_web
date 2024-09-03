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

namespace com\bydan\contabilidad\facturacion\factura_modelo\presentation\control;

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

use com\bydan\contabilidad\facturacion\factura_modelo\business\entity\factura_modelo;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/factura_modelo/util/factura_modelo_carga.php');
use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_carga;

use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_util;
use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_param_return;
use com\bydan\contabilidad\facturacion\factura_modelo\business\logic\factura_modelo_logic;
use com\bydan\contabilidad\facturacion\factura_modelo\presentation\session\factura_modelo_session;


//FK


use com\bydan\contabilidad\facturacion\factura_lote\business\entity\factura_lote;
use com\bydan\contabilidad\facturacion\factura_lote\business\logic\factura_lote_logic;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_carga;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
factura_modelo_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
factura_modelo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
factura_modelo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
factura_modelo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*factura_modelo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class factura_modelo_init_control extends ControllerBase {	
	
	public $factura_modeloClase=null;	
	public $factura_modelosModel=null;	
	public $factura_modelosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idfactura_modelo=0;	
	public ?int $idfactura_modeloActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $factura_modeloLogic=null;
	
	public $factura_modeloActual=null;	
	
	public $factura_modelo=null;
	public $factura_modelos=null;
	public $factura_modelosEliminados=array();
	public $factura_modelosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $factura_modelosLocal=array();
	public ?array $factura_modelosReporte=null;
	public ?array $factura_modelosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadfactura_modelo='onload';
	public string $strTipoPaginaAuxiliarfactura_modelo='none';
	public string $strTipoUsuarioAuxiliarfactura_modelo='none';
		
	public $factura_modeloReturnGeneral=null;
	public $factura_modeloParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $factura_modeloModel=null;
	public $factura_modeloControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_factura_lote='';
	public string $strMensajeid_cliente='';
	public string $strMensajemarcado='';
	public string $strMensajeultimo='';
	
	
	public string $strVisibleFK_Idcliente='display:table-row';
	public string $strVisibleFK_Idfactura_lote='display:table-row';

	
	public array $factura_lotesFK=array();

	public function getfactura_lotesFK():array {
		return $this->factura_lotesFK;
	}

	public function setfactura_lotesFK(array $factura_lotesFK) {
		$this->factura_lotesFK = $factura_lotesFK;
	}

	public int $idfactura_loteDefaultFK=-1;

	public function getIdfactura_loteDefaultFK():int {
		return $this->idfactura_loteDefaultFK;
	}

	public function setIdfactura_loteDefaultFK(int $idfactura_loteDefaultFK) {
		$this->idfactura_loteDefaultFK = $idfactura_loteDefaultFK;
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

	public  $id_factura_loteFK_Idfactura_lote=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->factura_modeloLogic==null) {
				$this->factura_modeloLogic=new factura_modelo_logic();
			}
			
		} else {
			if($this->factura_modeloLogic==null) {
				$this->factura_modeloLogic=new factura_modelo_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->factura_modeloClase==null) {
				$this->factura_modeloClase=new factura_modelo();
			}
			
			$this->factura_modeloClase->setId(0);	
				
				
			$this->factura_modeloClase->setid_factura_lote(-1);	
			$this->factura_modeloClase->setid_cliente(-1);	
			$this->factura_modeloClase->setmarcado(false);	
			$this->factura_modeloClase->setultimo('');	
			
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
		$this->prepararEjecutarMantenimientoBase('factura_modelo');
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
		$this->cargarParametrosReporteBase('factura_modelo');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('factura_modelo');
	}
	
	public function actualizarControllerConReturnGeneral(factura_modelo_param_return $factura_modeloReturnGeneral) {
		if($factura_modeloReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesfactura_modelosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$factura_modeloReturnGeneral->getsMensajeProceso();
		}
		
		if($factura_modeloReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$factura_modeloReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($factura_modeloReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$factura_modeloReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$factura_modeloReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($factura_modeloReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($factura_modeloReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$factura_modeloReturnGeneral->getsFuncionJs();
		}
		
		if($factura_modeloReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(factura_modelo_session $factura_modelo_session){
		$this->strStyleDivArbol=$factura_modelo_session->strStyleDivArbol;	
		$this->strStyleDivContent=$factura_modelo_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$factura_modelo_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$factura_modelo_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$factura_modelo_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$factura_modelo_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$factura_modelo_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(factura_modelo_session $factura_modelo_session){
		$factura_modelo_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$factura_modelo_session->strStyleDivHeader='display:none';			
		$factura_modelo_session->strStyleDivContent='width:93%;height:100%';	
		$factura_modelo_session->strStyleDivOpcionesBanner='display:none';	
		$factura_modelo_session->strStyleDivExpandirColapsar='display:none';	
		$factura_modelo_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(factura_modelo_control $factura_modelo_control_session){
		$this->idNuevo=$factura_modelo_control_session->idNuevo;
		$this->factura_modeloActual=$factura_modelo_control_session->factura_modeloActual;
		$this->factura_modelo=$factura_modelo_control_session->factura_modelo;
		$this->factura_modeloClase=$factura_modelo_control_session->factura_modeloClase;
		$this->factura_modelos=$factura_modelo_control_session->factura_modelos;
		$this->factura_modelosEliminados=$factura_modelo_control_session->factura_modelosEliminados;
		$this->factura_modelo=$factura_modelo_control_session->factura_modelo;
		$this->factura_modelosReporte=$factura_modelo_control_session->factura_modelosReporte;
		$this->factura_modelosSeleccionados=$factura_modelo_control_session->factura_modelosSeleccionados;
		$this->arrOrderBy=$factura_modelo_control_session->arrOrderBy;
		$this->arrOrderByRel=$factura_modelo_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$factura_modelo_control_session->arrHistoryWebs;
		$this->arrSessionBases=$factura_modelo_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadfactura_modelo=$factura_modelo_control_session->strTypeOnLoadfactura_modelo;
		$this->strTipoPaginaAuxiliarfactura_modelo=$factura_modelo_control_session->strTipoPaginaAuxiliarfactura_modelo;
		$this->strTipoUsuarioAuxiliarfactura_modelo=$factura_modelo_control_session->strTipoUsuarioAuxiliarfactura_modelo;	
		
		$this->bitEsPopup=$factura_modelo_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$factura_modelo_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$factura_modelo_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$factura_modelo_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$factura_modelo_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$factura_modelo_control_session->strSufijo;
		$this->bitEsRelaciones=$factura_modelo_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$factura_modelo_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$factura_modelo_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$factura_modelo_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$factura_modelo_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$factura_modelo_control_session->strTituloTabla;
		$this->strTituloPathPagina=$factura_modelo_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$factura_modelo_control_session->strTituloPathElementoActual;
		
		if($this->factura_modeloLogic==null) {			
			$this->factura_modeloLogic=new factura_modelo_logic();
		}
		
		
		if($this->factura_modeloClase==null) {
			$this->factura_modeloClase=new factura_modelo();	
		}
		
		$this->factura_modeloLogic->setfactura_modelo($this->factura_modeloClase);
		
		
		if($this->factura_modelos==null) {
			$this->factura_modelos=array();	
		}
		
		$this->factura_modeloLogic->setfactura_modelos($this->factura_modelos);
		
		
		$this->strTipoView=$factura_modelo_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$factura_modelo_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$factura_modelo_control_session->datosCliente;
		$this->strAccionBusqueda=$factura_modelo_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$factura_modelo_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$factura_modelo_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$factura_modelo_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$factura_modelo_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$factura_modelo_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$factura_modelo_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$factura_modelo_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$factura_modelo_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$factura_modelo_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$factura_modelo_control_session->strTipoPaginacion;
		$this->strTipoAccion=$factura_modelo_control_session->strTipoAccion;
		$this->tiposReportes=$factura_modelo_control_session->tiposReportes;
		$this->tiposReporte=$factura_modelo_control_session->tiposReporte;
		$this->tiposAcciones=$factura_modelo_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$factura_modelo_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$factura_modelo_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$factura_modelo_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$factura_modelo_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$factura_modelo_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$factura_modelo_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$factura_modelo_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$factura_modelo_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$factura_modelo_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$factura_modelo_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$factura_modelo_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$factura_modelo_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$factura_modelo_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$factura_modelo_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$factura_modelo_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$factura_modelo_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$factura_modelo_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$factura_modelo_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$factura_modelo_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$factura_modelo_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$factura_modelo_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$factura_modelo_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$factura_modelo_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$factura_modelo_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$factura_modelo_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$factura_modelo_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$factura_modelo_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$factura_modelo_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$factura_modelo_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$factura_modelo_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$factura_modelo_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$factura_modelo_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$factura_modelo_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$factura_modelo_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$factura_modelo_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$factura_modelo_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$factura_modelo_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$factura_modelo_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$factura_modelo_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$factura_modelo_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$factura_modelo_control_session->resumenUsuarioActual;	
		$this->moduloActual=$factura_modelo_control_session->moduloActual;	
		$this->opcionActual=$factura_modelo_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$factura_modelo_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$factura_modelo_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$factura_modelo_session=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME));
				
		if($factura_modelo_session==null) {
			$factura_modelo_session=new factura_modelo_session();
		}
		
		$this->strStyleDivArbol=$factura_modelo_session->strStyleDivArbol;	
		$this->strStyleDivContent=$factura_modelo_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$factura_modelo_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$factura_modelo_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$factura_modelo_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$factura_modelo_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$factura_modelo_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$factura_modelo_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$factura_modelo_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$factura_modelo_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$factura_modelo_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_factura_lote=$factura_modelo_control_session->strMensajeid_factura_lote;
		$this->strMensajeid_cliente=$factura_modelo_control_session->strMensajeid_cliente;
		$this->strMensajemarcado=$factura_modelo_control_session->strMensajemarcado;
		$this->strMensajeultimo=$factura_modelo_control_session->strMensajeultimo;
			
		
		$this->factura_lotesFK=$factura_modelo_control_session->factura_lotesFK;
		$this->idfactura_loteDefaultFK=$factura_modelo_control_session->idfactura_loteDefaultFK;
		$this->clientesFK=$factura_modelo_control_session->clientesFK;
		$this->idclienteDefaultFK=$factura_modelo_control_session->idclienteDefaultFK;
		
		
		$this->strVisibleFK_Idcliente=$factura_modelo_control_session->strVisibleFK_Idcliente;
		$this->strVisibleFK_Idfactura_lote=$factura_modelo_control_session->strVisibleFK_Idfactura_lote;
		
		
		
		
		$this->id_clienteFK_Idcliente=$factura_modelo_control_session->id_clienteFK_Idcliente;
		$this->id_factura_loteFK_Idfactura_lote=$factura_modelo_control_session->id_factura_loteFK_Idfactura_lote;

		
		
		
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
	
	public function getfactura_modeloControllerAdditional() {
		return $this->factura_modeloControllerAdditional;
	}

	public function setfactura_modeloControllerAdditional($factura_modeloControllerAdditional) {
		$this->factura_modeloControllerAdditional = $factura_modeloControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getfactura_modeloActual() : factura_modelo {
		return $this->factura_modeloActual;
	}

	public function setfactura_modeloActual(factura_modelo $factura_modeloActual) {
		$this->factura_modeloActual = $factura_modeloActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidfactura_modelo() : int {
		return $this->idfactura_modelo;
	}

	public function setidfactura_modelo(int $idfactura_modelo) {
		$this->idfactura_modelo = $idfactura_modelo;
	}
	
	public function getfactura_modelo() : factura_modelo {
		return $this->factura_modelo;
	}

	public function setfactura_modelo(factura_modelo $factura_modelo) {
		$this->factura_modelo = $factura_modelo;
	}
		
	public function getfactura_modeloLogic() : factura_modelo_logic {		
		return $this->factura_modeloLogic;
	}

	public function setfactura_modeloLogic(factura_modelo_logic $factura_modeloLogic) {
		$this->factura_modeloLogic = $factura_modeloLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getfactura_modelosModel() {		
		try {						
			/*factura_modelosModel.setWrappedData(factura_modeloLogic->getfactura_modelos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->factura_modelosModel;
	}
	
	public function setfactura_modelosModel($factura_modelosModel) {
		$this->factura_modelosModel = $factura_modelosModel;
	}
	
	public function getfactura_modelos() : array {		
		return $this->factura_modelos;
	}
	
	public function setfactura_modelos(array $factura_modelos) {
		$this->factura_modelos= $factura_modelos;
	}
	
	public function getfactura_modelosEliminados() : array {		
		return $this->factura_modelosEliminados;
	}
	
	public function setfactura_modelosEliminados(array $factura_modelosEliminados) {
		$this->factura_modelosEliminados= $factura_modelosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getfactura_modeloActualFromListDataModel() {
		try {
			/*$factura_modeloClase= $this->factura_modelosModel->getRowData();*/
			
			/*return $factura_modelo;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
