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

namespace com\bydan\contabilidad\inventario\inventario_fisico\presentation\control;

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

use com\bydan\contabilidad\inventario\inventario_fisico\business\entity\inventario_fisico;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/inventario_fisico/util/inventario_fisico_carga.php');
use com\bydan\contabilidad\inventario\inventario_fisico\util\inventario_fisico_carga;

use com\bydan\contabilidad\inventario\inventario_fisico\util\inventario_fisico_util;
use com\bydan\contabilidad\inventario\inventario_fisico\util\inventario_fisico_param_return;
use com\bydan\contabilidad\inventario\inventario_fisico\business\logic\inventario_fisico_logic;
use com\bydan\contabilidad\inventario\inventario_fisico\presentation\session\inventario_fisico_session;


//FK


use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_carga;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

//REL


use com\bydan\contabilidad\inventario\inventario_fisico_detalle\util\inventario_fisico_detalle_carga;
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\util\inventario_fisico_detalle_util;
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\presentation\session\inventario_fisico_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
inventario_fisico_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
inventario_fisico_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
inventario_fisico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
inventario_fisico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*inventario_fisico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class inventario_fisico_init_control extends ControllerBase {	
	
	public $inventario_fisicoClase=null;	
	public $inventario_fisicosModel=null;	
	public $inventario_fisicosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idinventario_fisico=0;	
	public ?int $idinventario_fisicoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $inventario_fisicoLogic=null;
	
	public $inventario_fisicoActual=null;	
	
	public $inventario_fisico=null;
	public $inventario_fisicos=null;
	public $inventario_fisicosEliminados=array();
	public $inventario_fisicosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $inventario_fisicosLocal=array();
	public ?array $inventario_fisicosReporte=null;
	public ?array $inventario_fisicosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadinventario_fisico='onload';
	public string $strTipoPaginaAuxiliarinventario_fisico='none';
	public string $strTipoUsuarioAuxiliarinventario_fisico='none';
		
	public $inventario_fisicoReturnGeneral=null;
	public $inventario_fisicoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $inventario_fisicoModel=null;
	public $inventario_fisicoControllerAdditional=null;
	
	
	

	public $inventariofisicodetalleLogic=null;

	public function  getinventario_fisico_detalleLogic() {
		return $this->inventariofisicodetalleLogic;
	}

	public function setinventario_fisico_detalleLogic($inventariofisicodetalleLogic) {
		$this->inventariofisicodetalleLogic =$inventariofisicodetalleLogic;
	}
 	
	
	public string $strMensajeid_inventario_fisico='';
	public string $strMensajeid_bodega='';
	public string $strMensajefecha='';
	public string $strMensajedescripcion='';
	public string $strMensajeid_almacen='';
	public string $strMensajeprod_cont_almacen='';
	public string $strMensajetotal_productos_almacen='';
	public string $strMensajecampo1='';
	public string $strMensajecampo2='';
	public string $strMensajecampo3='';
	
	
	public string $strVisibleFK_Idbodega='display:table-row';
	public string $strVisibleFK_Idinventario_fisico='display:table-row';

	
	public array $inventario_fisicosFK=array();

	public function getinventario_fisicosFK():array {
		return $this->inventario_fisicosFK;
	}

	public function setinventario_fisicosFK(array $inventario_fisicosFK) {
		$this->inventario_fisicosFK = $inventario_fisicosFK;
	}

	public int $idinventario_fisicoDefaultFK=-1;

	public function getIdinventario_fisicoDefaultFK():int {
		return $this->idinventario_fisicoDefaultFK;
	}

	public function setIdinventario_fisicoDefaultFK(int $idinventario_fisicoDefaultFK) {
		$this->idinventario_fisicoDefaultFK = $idinventario_fisicoDefaultFK;
	}

	public array $bodegasFK=array();

	public function getbodegasFK():array {
		return $this->bodegasFK;
	}

	public function setbodegasFK(array $bodegasFK) {
		$this->bodegasFK = $bodegasFK;
	}

	public int $idbodegaDefaultFK=-1;

	public function getIdbodegaDefaultFK():int {
		return $this->idbodegaDefaultFK;
	}

	public function setIdbodegaDefaultFK(int $idbodegaDefaultFK) {
		$this->idbodegaDefaultFK = $idbodegaDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisosinventario_fisico_detalle='none';
	public $strTienePermisosinventario_fisico='none';
	
	
	public  $id_bodegaFK_Idbodega=null;

	public  $id_inventario_fisicoFK_Idinventario_fisico=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->inventario_fisicoLogic==null) {
				$this->inventario_fisicoLogic=new inventario_fisico_logic();
			}
			
		} else {
			if($this->inventario_fisicoLogic==null) {
				$this->inventario_fisicoLogic=new inventario_fisico_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->inventario_fisicoClase==null) {
				$this->inventario_fisicoClase=new inventario_fisico();
			}
			
			$this->inventario_fisicoClase->setId(0);	
				
				
			$this->inventario_fisicoClase->setid_inventario_fisico(-1);	
			$this->inventario_fisicoClase->setid_bodega(-1);	
			$this->inventario_fisicoClase->setfecha(date('Y-m-d'));	
			$this->inventario_fisicoClase->setdescripcion('');	
			$this->inventario_fisicoClase->setid_almacen(0);	
			$this->inventario_fisicoClase->setprod_cont_almacen(0.0);	
			$this->inventario_fisicoClase->settotal_productos_almacen(0.0);	
			$this->inventario_fisicoClase->setcampo1('');	
			$this->inventario_fisicoClase->setcampo2(0.0);	
			$this->inventario_fisicoClase->setcampo3('');	
			
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
		$this->prepararEjecutarMantenimientoBase('inventario_fisico');
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
		$this->cargarParametrosReporteBase('inventario_fisico');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('inventario_fisico');
	}
	
	public function actualizarControllerConReturnGeneral(inventario_fisico_param_return $inventario_fisicoReturnGeneral) {
		if($inventario_fisicoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesinventario_fisicosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$inventario_fisicoReturnGeneral->getsMensajeProceso();
		}
		
		if($inventario_fisicoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$inventario_fisicoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($inventario_fisicoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$inventario_fisicoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$inventario_fisicoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($inventario_fisicoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($inventario_fisicoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$inventario_fisicoReturnGeneral->getsFuncionJs();
		}
		
		if($inventario_fisicoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(inventario_fisico_session $inventario_fisico_session){
		$this->strStyleDivArbol=$inventario_fisico_session->strStyleDivArbol;	
		$this->strStyleDivContent=$inventario_fisico_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$inventario_fisico_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$inventario_fisico_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$inventario_fisico_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$inventario_fisico_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$inventario_fisico_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(inventario_fisico_session $inventario_fisico_session){
		$inventario_fisico_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$inventario_fisico_session->strStyleDivHeader='display:none';			
		$inventario_fisico_session->strStyleDivContent='width:93%;height:100%';	
		$inventario_fisico_session->strStyleDivOpcionesBanner='display:none';	
		$inventario_fisico_session->strStyleDivExpandirColapsar='display:none';	
		$inventario_fisico_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(inventario_fisico_control $inventario_fisico_control_session){
		$this->idNuevo=$inventario_fisico_control_session->idNuevo;
		$this->inventario_fisicoActual=$inventario_fisico_control_session->inventario_fisicoActual;
		$this->inventario_fisico=$inventario_fisico_control_session->inventario_fisico;
		$this->inventario_fisicoClase=$inventario_fisico_control_session->inventario_fisicoClase;
		$this->inventario_fisicos=$inventario_fisico_control_session->inventario_fisicos;
		$this->inventario_fisicosEliminados=$inventario_fisico_control_session->inventario_fisicosEliminados;
		$this->inventario_fisico=$inventario_fisico_control_session->inventario_fisico;
		$this->inventario_fisicosReporte=$inventario_fisico_control_session->inventario_fisicosReporte;
		$this->inventario_fisicosSeleccionados=$inventario_fisico_control_session->inventario_fisicosSeleccionados;
		$this->arrOrderBy=$inventario_fisico_control_session->arrOrderBy;
		$this->arrOrderByRel=$inventario_fisico_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$inventario_fisico_control_session->arrHistoryWebs;
		$this->arrSessionBases=$inventario_fisico_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadinventario_fisico=$inventario_fisico_control_session->strTypeOnLoadinventario_fisico;
		$this->strTipoPaginaAuxiliarinventario_fisico=$inventario_fisico_control_session->strTipoPaginaAuxiliarinventario_fisico;
		$this->strTipoUsuarioAuxiliarinventario_fisico=$inventario_fisico_control_session->strTipoUsuarioAuxiliarinventario_fisico;	
		
		$this->bitEsPopup=$inventario_fisico_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$inventario_fisico_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$inventario_fisico_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$inventario_fisico_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$inventario_fisico_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$inventario_fisico_control_session->strSufijo;
		$this->bitEsRelaciones=$inventario_fisico_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$inventario_fisico_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$inventario_fisico_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$inventario_fisico_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$inventario_fisico_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$inventario_fisico_control_session->strTituloTabla;
		$this->strTituloPathPagina=$inventario_fisico_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$inventario_fisico_control_session->strTituloPathElementoActual;
		
		if($this->inventario_fisicoLogic==null) {			
			$this->inventario_fisicoLogic=new inventario_fisico_logic();
		}
		
		
		if($this->inventario_fisicoClase==null) {
			$this->inventario_fisicoClase=new inventario_fisico();	
		}
		
		$this->inventario_fisicoLogic->setinventario_fisico($this->inventario_fisicoClase);
		
		
		if($this->inventario_fisicos==null) {
			$this->inventario_fisicos=array();	
		}
		
		$this->inventario_fisicoLogic->setinventario_fisicos($this->inventario_fisicos);
		
		
		$this->strTipoView=$inventario_fisico_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$inventario_fisico_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$inventario_fisico_control_session->datosCliente;
		$this->strAccionBusqueda=$inventario_fisico_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$inventario_fisico_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$inventario_fisico_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$inventario_fisico_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$inventario_fisico_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$inventario_fisico_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$inventario_fisico_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$inventario_fisico_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$inventario_fisico_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$inventario_fisico_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$inventario_fisico_control_session->strTipoPaginacion;
		$this->strTipoAccion=$inventario_fisico_control_session->strTipoAccion;
		$this->tiposReportes=$inventario_fisico_control_session->tiposReportes;
		$this->tiposReporte=$inventario_fisico_control_session->tiposReporte;
		$this->tiposAcciones=$inventario_fisico_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$inventario_fisico_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$inventario_fisico_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$inventario_fisico_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$inventario_fisico_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$inventario_fisico_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$inventario_fisico_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$inventario_fisico_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$inventario_fisico_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$inventario_fisico_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$inventario_fisico_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$inventario_fisico_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$inventario_fisico_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$inventario_fisico_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$inventario_fisico_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$inventario_fisico_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$inventario_fisico_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$inventario_fisico_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$inventario_fisico_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$inventario_fisico_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$inventario_fisico_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$inventario_fisico_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$inventario_fisico_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$inventario_fisico_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$inventario_fisico_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$inventario_fisico_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$inventario_fisico_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$inventario_fisico_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$inventario_fisico_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$inventario_fisico_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$inventario_fisico_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$inventario_fisico_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$inventario_fisico_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$inventario_fisico_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$inventario_fisico_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$inventario_fisico_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$inventario_fisico_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$inventario_fisico_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$inventario_fisico_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$inventario_fisico_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$inventario_fisico_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$inventario_fisico_control_session->resumenUsuarioActual;	
		$this->moduloActual=$inventario_fisico_control_session->moduloActual;	
		$this->opcionActual=$inventario_fisico_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$inventario_fisico_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$inventario_fisico_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$inventario_fisico_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME));
				
		if($inventario_fisico_session==null) {
			$inventario_fisico_session=new inventario_fisico_session();
		}
		
		$this->strStyleDivArbol=$inventario_fisico_session->strStyleDivArbol;	
		$this->strStyleDivContent=$inventario_fisico_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$inventario_fisico_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$inventario_fisico_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$inventario_fisico_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$inventario_fisico_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$inventario_fisico_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$inventario_fisico_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$inventario_fisico_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$inventario_fisico_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$inventario_fisico_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_inventario_fisico=$inventario_fisico_control_session->strMensajeid_inventario_fisico;
		$this->strMensajeid_bodega=$inventario_fisico_control_session->strMensajeid_bodega;
		$this->strMensajefecha=$inventario_fisico_control_session->strMensajefecha;
		$this->strMensajedescripcion=$inventario_fisico_control_session->strMensajedescripcion;
		$this->strMensajeid_almacen=$inventario_fisico_control_session->strMensajeid_almacen;
		$this->strMensajeprod_cont_almacen=$inventario_fisico_control_session->strMensajeprod_cont_almacen;
		$this->strMensajetotal_productos_almacen=$inventario_fisico_control_session->strMensajetotal_productos_almacen;
		$this->strMensajecampo1=$inventario_fisico_control_session->strMensajecampo1;
		$this->strMensajecampo2=$inventario_fisico_control_session->strMensajecampo2;
		$this->strMensajecampo3=$inventario_fisico_control_session->strMensajecampo3;
			
		
		$this->inventario_fisicosFK=$inventario_fisico_control_session->inventario_fisicosFK;
		$this->idinventario_fisicoDefaultFK=$inventario_fisico_control_session->idinventario_fisicoDefaultFK;
		$this->bodegasFK=$inventario_fisico_control_session->bodegasFK;
		$this->idbodegaDefaultFK=$inventario_fisico_control_session->idbodegaDefaultFK;
		
		
		$this->strVisibleFK_Idbodega=$inventario_fisico_control_session->strVisibleFK_Idbodega;
		$this->strVisibleFK_Idinventario_fisico=$inventario_fisico_control_session->strVisibleFK_Idinventario_fisico;
		
		
		$this->strTienePermisosinventario_fisico_detalle=$inventario_fisico_control_session->strTienePermisosinventario_fisico_detalle;
		$this->strTienePermisosinventario_fisico=$inventario_fisico_control_session->strTienePermisosinventario_fisico;
		
		
		$this->id_bodegaFK_Idbodega=$inventario_fisico_control_session->id_bodegaFK_Idbodega;
		$this->id_inventario_fisicoFK_Idinventario_fisico=$inventario_fisico_control_session->id_inventario_fisicoFK_Idinventario_fisico;

		
		
		
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
	
	public function getinventario_fisicoControllerAdditional() {
		return $this->inventario_fisicoControllerAdditional;
	}

	public function setinventario_fisicoControllerAdditional($inventario_fisicoControllerAdditional) {
		$this->inventario_fisicoControllerAdditional = $inventario_fisicoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getinventario_fisicoActual() : inventario_fisico {
		return $this->inventario_fisicoActual;
	}

	public function setinventario_fisicoActual(inventario_fisico $inventario_fisicoActual) {
		$this->inventario_fisicoActual = $inventario_fisicoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidinventario_fisico() : int {
		return $this->idinventario_fisico;
	}

	public function setidinventario_fisico(int $idinventario_fisico) {
		$this->idinventario_fisico = $idinventario_fisico;
	}
	
	public function getinventario_fisico() : inventario_fisico {
		return $this->inventario_fisico;
	}

	public function setinventario_fisico(inventario_fisico $inventario_fisico) {
		$this->inventario_fisico = $inventario_fisico;
	}
		
	public function getinventario_fisicoLogic() : inventario_fisico_logic {		
		return $this->inventario_fisicoLogic;
	}

	public function setinventario_fisicoLogic(inventario_fisico_logic $inventario_fisicoLogic) {
		$this->inventario_fisicoLogic = $inventario_fisicoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getinventario_fisicosModel() {		
		try {						
			/*inventario_fisicosModel.setWrappedData(inventario_fisicoLogic->getinventario_fisicos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->inventario_fisicosModel;
	}
	
	public function setinventario_fisicosModel($inventario_fisicosModel) {
		$this->inventario_fisicosModel = $inventario_fisicosModel;
	}
	
	public function getinventario_fisicos() : array {		
		return $this->inventario_fisicos;
	}
	
	public function setinventario_fisicos(array $inventario_fisicos) {
		$this->inventario_fisicos= $inventario_fisicos;
	}
	
	public function getinventario_fisicosEliminados() : array {		
		return $this->inventario_fisicosEliminados;
	}
	
	public function setinventario_fisicosEliminados(array $inventario_fisicosEliminados) {
		$this->inventario_fisicosEliminados= $inventario_fisicosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getinventario_fisicoActualFromListDataModel() {
		try {
			/*$inventario_fisicoClase= $this->inventario_fisicosModel->getRowData();*/
			
			/*return $inventario_fisico;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
