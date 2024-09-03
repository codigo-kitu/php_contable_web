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

namespace com\bydan\contabilidad\contabilidad\asiento_automatico\presentation\control;

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

use com\bydan\contabilidad\contabilidad\asiento_automatico\business\entity\asiento_automatico;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/asiento_automatico/util/asiento_automatico_carga.php');
use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_carga;

use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_util;
use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_param_return;
use com\bydan\contabilidad\contabilidad\asiento_automatico\business\logic\asiento_automatico_logic;
use com\bydan\contabilidad\contabilidad\asiento_automatico\presentation\session\asiento_automatico_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\modulo\business\logic\modulo_logic;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;

use com\bydan\contabilidad\contabilidad\fuente\business\entity\fuente;
use com\bydan\contabilidad\contabilidad\fuente\business\logic\fuente_logic;
use com\bydan\contabilidad\contabilidad\fuente\util\fuente_carga;
use com\bydan\contabilidad\contabilidad\fuente\util\fuente_util;

use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\logic\libro_auxiliar_logic;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_carga;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_util;

use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;
use com\bydan\contabilidad\contabilidad\centro_costo\business\logic\centro_costo_logic;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_carga;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_util;

//REL


use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_util;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\presentation\session\asiento_automatico_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
asiento_automatico_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
asiento_automatico_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
asiento_automatico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
asiento_automatico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*asiento_automatico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class asiento_automatico_init_control extends ControllerBase {	
	
	public $asiento_automaticoClase=null;	
	public $asiento_automaticosModel=null;	
	public $asiento_automaticosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idasiento_automatico=0;	
	public ?int $idasiento_automaticoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $asiento_automaticoLogic=null;
	
	public $asiento_automaticoActual=null;	
	
	public $asiento_automatico=null;
	public $asiento_automaticos=null;
	public $asiento_automaticosEliminados=array();
	public $asiento_automaticosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $asiento_automaticosLocal=array();
	public ?array $asiento_automaticosReporte=null;
	public ?array $asiento_automaticosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadasiento_automatico='onload';
	public string $strTipoPaginaAuxiliarasiento_automatico='none';
	public string $strTipoUsuarioAuxiliarasiento_automatico='none';
		
	public $asiento_automaticoReturnGeneral=null;
	public $asiento_automaticoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $asiento_automaticoModel=null;
	public $asiento_automaticoControllerAdditional=null;
	
	
	

	public $asientoautomaticodetalleLogic=null;

	public function  getasiento_automatico_detalleLogic() {
		return $this->asientoautomaticodetalleLogic;
	}

	public function setasiento_automatico_detalleLogic($asientoautomaticodetalleLogic) {
		$this->asientoautomaticodetalleLogic =$asientoautomaticodetalleLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_modulo='';
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	public string $strMensajeid_fuente='';
	public string $strMensajeid_libro_auxiliar='';
	public string $strMensajeid_centro_costo='';
	public string $strMensajedescripcion='';
	public string $strMensajeactivo='';
	public string $strMensajeasignada='';
	
	
	public string $strVisibleFK_Idcentro_costo='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idfuente='display:table-row';
	public string $strVisibleFK_Idlibro_auxiliar='display:table-row';
	public string $strVisibleFK_Idmodulo='display:table-row';

	
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

	public array $fuentesFK=array();

	public function getfuentesFK():array {
		return $this->fuentesFK;
	}

	public function setfuentesFK(array $fuentesFK) {
		$this->fuentesFK = $fuentesFK;
	}

	public int $idfuenteDefaultFK=-1;

	public function getIdfuenteDefaultFK():int {
		return $this->idfuenteDefaultFK;
	}

	public function setIdfuenteDefaultFK(int $idfuenteDefaultFK) {
		$this->idfuenteDefaultFK = $idfuenteDefaultFK;
	}

	public array $libro_auxiliarsFK=array();

	public function getlibro_auxiliarsFK():array {
		return $this->libro_auxiliarsFK;
	}

	public function setlibro_auxiliarsFK(array $libro_auxiliarsFK) {
		$this->libro_auxiliarsFK = $libro_auxiliarsFK;
	}

	public int $idlibro_auxiliarDefaultFK=-1;

	public function getIdlibro_auxiliarDefaultFK():int {
		return $this->idlibro_auxiliarDefaultFK;
	}

	public function setIdlibro_auxiliarDefaultFK(int $idlibro_auxiliarDefaultFK) {
		$this->idlibro_auxiliarDefaultFK = $idlibro_auxiliarDefaultFK;
	}

	public array $centro_costosFK=array();

	public function getcentro_costosFK():array {
		return $this->centro_costosFK;
	}

	public function setcentro_costosFK(array $centro_costosFK) {
		$this->centro_costosFK = $centro_costosFK;
	}

	public int $idcentro_costoDefaultFK=-1;

	public function getIdcentro_costoDefaultFK():int {
		return $this->idcentro_costoDefaultFK;
	}

	public function setIdcentro_costoDefaultFK(int $idcentro_costoDefaultFK) {
		$this->idcentro_costoDefaultFK = $idcentro_costoDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisosasiento_automatico_detalle='none';
	
	
	public  $id_centro_costoFK_Idcentro_costo=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_fuenteFK_Idfuente=null;

	public  $id_libro_auxiliarFK_Idlibro_auxiliar=null;

	public  $id_moduloFK_Idmodulo=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->asiento_automaticoLogic==null) {
				$this->asiento_automaticoLogic=new asiento_automatico_logic();
			}
			
		} else {
			if($this->asiento_automaticoLogic==null) {
				$this->asiento_automaticoLogic=new asiento_automatico_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->asiento_automaticoClase==null) {
				$this->asiento_automaticoClase=new asiento_automatico();
			}
			
			$this->asiento_automaticoClase->setId(0);	
				
				
			$this->asiento_automaticoClase->setid_empresa(-1);	
			$this->asiento_automaticoClase->setid_modulo(-1);	
			$this->asiento_automaticoClase->setcodigo('');	
			$this->asiento_automaticoClase->setnombre('');	
			$this->asiento_automaticoClase->setid_fuente(-1);	
			$this->asiento_automaticoClase->setid_libro_auxiliar(-1);	
			$this->asiento_automaticoClase->setid_centro_costo(-1);	
			$this->asiento_automaticoClase->setdescripcion('');	
			$this->asiento_automaticoClase->setactivo(false);	
			$this->asiento_automaticoClase->setasignada('');	
			
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
		$this->prepararEjecutarMantenimientoBase('asiento_automatico');
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
		$this->cargarParametrosReporteBase('asiento_automatico');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('asiento_automatico');
	}
	
	public function actualizarControllerConReturnGeneral(asiento_automatico_param_return $asiento_automaticoReturnGeneral) {
		if($asiento_automaticoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesasiento_automaticosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$asiento_automaticoReturnGeneral->getsMensajeProceso();
		}
		
		if($asiento_automaticoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$asiento_automaticoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($asiento_automaticoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$asiento_automaticoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$asiento_automaticoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($asiento_automaticoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($asiento_automaticoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$asiento_automaticoReturnGeneral->getsFuncionJs();
		}
		
		if($asiento_automaticoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(asiento_automatico_session $asiento_automatico_session){
		$this->strStyleDivArbol=$asiento_automatico_session->strStyleDivArbol;	
		$this->strStyleDivContent=$asiento_automatico_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$asiento_automatico_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$asiento_automatico_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$asiento_automatico_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$asiento_automatico_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$asiento_automatico_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(asiento_automatico_session $asiento_automatico_session){
		$asiento_automatico_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$asiento_automatico_session->strStyleDivHeader='display:none';			
		$asiento_automatico_session->strStyleDivContent='width:93%;height:100%';	
		$asiento_automatico_session->strStyleDivOpcionesBanner='display:none';	
		$asiento_automatico_session->strStyleDivExpandirColapsar='display:none';	
		$asiento_automatico_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(asiento_automatico_control $asiento_automatico_control_session){
		$this->idNuevo=$asiento_automatico_control_session->idNuevo;
		$this->asiento_automaticoActual=$asiento_automatico_control_session->asiento_automaticoActual;
		$this->asiento_automatico=$asiento_automatico_control_session->asiento_automatico;
		$this->asiento_automaticoClase=$asiento_automatico_control_session->asiento_automaticoClase;
		$this->asiento_automaticos=$asiento_automatico_control_session->asiento_automaticos;
		$this->asiento_automaticosEliminados=$asiento_automatico_control_session->asiento_automaticosEliminados;
		$this->asiento_automatico=$asiento_automatico_control_session->asiento_automatico;
		$this->asiento_automaticosReporte=$asiento_automatico_control_session->asiento_automaticosReporte;
		$this->asiento_automaticosSeleccionados=$asiento_automatico_control_session->asiento_automaticosSeleccionados;
		$this->arrOrderBy=$asiento_automatico_control_session->arrOrderBy;
		$this->arrOrderByRel=$asiento_automatico_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$asiento_automatico_control_session->arrHistoryWebs;
		$this->arrSessionBases=$asiento_automatico_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadasiento_automatico=$asiento_automatico_control_session->strTypeOnLoadasiento_automatico;
		$this->strTipoPaginaAuxiliarasiento_automatico=$asiento_automatico_control_session->strTipoPaginaAuxiliarasiento_automatico;
		$this->strTipoUsuarioAuxiliarasiento_automatico=$asiento_automatico_control_session->strTipoUsuarioAuxiliarasiento_automatico;	
		
		$this->bitEsPopup=$asiento_automatico_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$asiento_automatico_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$asiento_automatico_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$asiento_automatico_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$asiento_automatico_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$asiento_automatico_control_session->strSufijo;
		$this->bitEsRelaciones=$asiento_automatico_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$asiento_automatico_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$asiento_automatico_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$asiento_automatico_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$asiento_automatico_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$asiento_automatico_control_session->strTituloTabla;
		$this->strTituloPathPagina=$asiento_automatico_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$asiento_automatico_control_session->strTituloPathElementoActual;
		
		if($this->asiento_automaticoLogic==null) {			
			$this->asiento_automaticoLogic=new asiento_automatico_logic();
		}
		
		
		if($this->asiento_automaticoClase==null) {
			$this->asiento_automaticoClase=new asiento_automatico();	
		}
		
		$this->asiento_automaticoLogic->setasiento_automatico($this->asiento_automaticoClase);
		
		
		if($this->asiento_automaticos==null) {
			$this->asiento_automaticos=array();	
		}
		
		$this->asiento_automaticoLogic->setasiento_automaticos($this->asiento_automaticos);
		
		
		$this->strTipoView=$asiento_automatico_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$asiento_automatico_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$asiento_automatico_control_session->datosCliente;
		$this->strAccionBusqueda=$asiento_automatico_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$asiento_automatico_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$asiento_automatico_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$asiento_automatico_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$asiento_automatico_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$asiento_automatico_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$asiento_automatico_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$asiento_automatico_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$asiento_automatico_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$asiento_automatico_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$asiento_automatico_control_session->strTipoPaginacion;
		$this->strTipoAccion=$asiento_automatico_control_session->strTipoAccion;
		$this->tiposReportes=$asiento_automatico_control_session->tiposReportes;
		$this->tiposReporte=$asiento_automatico_control_session->tiposReporte;
		$this->tiposAcciones=$asiento_automatico_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$asiento_automatico_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$asiento_automatico_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$asiento_automatico_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$asiento_automatico_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$asiento_automatico_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$asiento_automatico_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$asiento_automatico_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$asiento_automatico_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$asiento_automatico_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$asiento_automatico_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$asiento_automatico_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$asiento_automatico_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$asiento_automatico_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$asiento_automatico_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$asiento_automatico_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$asiento_automatico_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$asiento_automatico_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$asiento_automatico_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$asiento_automatico_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$asiento_automatico_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$asiento_automatico_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$asiento_automatico_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$asiento_automatico_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$asiento_automatico_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$asiento_automatico_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$asiento_automatico_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$asiento_automatico_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$asiento_automatico_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$asiento_automatico_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$asiento_automatico_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$asiento_automatico_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$asiento_automatico_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$asiento_automatico_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$asiento_automatico_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$asiento_automatico_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$asiento_automatico_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$asiento_automatico_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$asiento_automatico_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$asiento_automatico_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$asiento_automatico_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$asiento_automatico_control_session->resumenUsuarioActual;	
		$this->moduloActual=$asiento_automatico_control_session->moduloActual;	
		$this->opcionActual=$asiento_automatico_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$asiento_automatico_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$asiento_automatico_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$asiento_automatico_session=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME));
				
		if($asiento_automatico_session==null) {
			$asiento_automatico_session=new asiento_automatico_session();
		}
		
		$this->strStyleDivArbol=$asiento_automatico_session->strStyleDivArbol;	
		$this->strStyleDivContent=$asiento_automatico_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$asiento_automatico_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$asiento_automatico_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$asiento_automatico_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$asiento_automatico_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$asiento_automatico_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$asiento_automatico_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$asiento_automatico_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$asiento_automatico_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$asiento_automatico_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$asiento_automatico_control_session->strMensajeid_empresa;
		$this->strMensajeid_modulo=$asiento_automatico_control_session->strMensajeid_modulo;
		$this->strMensajecodigo=$asiento_automatico_control_session->strMensajecodigo;
		$this->strMensajenombre=$asiento_automatico_control_session->strMensajenombre;
		$this->strMensajeid_fuente=$asiento_automatico_control_session->strMensajeid_fuente;
		$this->strMensajeid_libro_auxiliar=$asiento_automatico_control_session->strMensajeid_libro_auxiliar;
		$this->strMensajeid_centro_costo=$asiento_automatico_control_session->strMensajeid_centro_costo;
		$this->strMensajedescripcion=$asiento_automatico_control_session->strMensajedescripcion;
		$this->strMensajeactivo=$asiento_automatico_control_session->strMensajeactivo;
		$this->strMensajeasignada=$asiento_automatico_control_session->strMensajeasignada;
			
		
		$this->empresasFK=$asiento_automatico_control_session->empresasFK;
		$this->idempresaDefaultFK=$asiento_automatico_control_session->idempresaDefaultFK;
		$this->modulosFK=$asiento_automatico_control_session->modulosFK;
		$this->idmoduloDefaultFK=$asiento_automatico_control_session->idmoduloDefaultFK;
		$this->fuentesFK=$asiento_automatico_control_session->fuentesFK;
		$this->idfuenteDefaultFK=$asiento_automatico_control_session->idfuenteDefaultFK;
		$this->libro_auxiliarsFK=$asiento_automatico_control_session->libro_auxiliarsFK;
		$this->idlibro_auxiliarDefaultFK=$asiento_automatico_control_session->idlibro_auxiliarDefaultFK;
		$this->centro_costosFK=$asiento_automatico_control_session->centro_costosFK;
		$this->idcentro_costoDefaultFK=$asiento_automatico_control_session->idcentro_costoDefaultFK;
		
		
		$this->strVisibleFK_Idcentro_costo=$asiento_automatico_control_session->strVisibleFK_Idcentro_costo;
		$this->strVisibleFK_Idempresa=$asiento_automatico_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idfuente=$asiento_automatico_control_session->strVisibleFK_Idfuente;
		$this->strVisibleFK_Idlibro_auxiliar=$asiento_automatico_control_session->strVisibleFK_Idlibro_auxiliar;
		$this->strVisibleFK_Idmodulo=$asiento_automatico_control_session->strVisibleFK_Idmodulo;
		
		
		$this->strTienePermisosasiento_automatico_detalle=$asiento_automatico_control_session->strTienePermisosasiento_automatico_detalle;
		
		
		$this->id_centro_costoFK_Idcentro_costo=$asiento_automatico_control_session->id_centro_costoFK_Idcentro_costo;
		$this->id_empresaFK_Idempresa=$asiento_automatico_control_session->id_empresaFK_Idempresa;
		$this->id_fuenteFK_Idfuente=$asiento_automatico_control_session->id_fuenteFK_Idfuente;
		$this->id_libro_auxiliarFK_Idlibro_auxiliar=$asiento_automatico_control_session->id_libro_auxiliarFK_Idlibro_auxiliar;
		$this->id_moduloFK_Idmodulo=$asiento_automatico_control_session->id_moduloFK_Idmodulo;

		
		
		
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
	
	public function getasiento_automaticoControllerAdditional() {
		return $this->asiento_automaticoControllerAdditional;
	}

	public function setasiento_automaticoControllerAdditional($asiento_automaticoControllerAdditional) {
		$this->asiento_automaticoControllerAdditional = $asiento_automaticoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getasiento_automaticoActual() : asiento_automatico {
		return $this->asiento_automaticoActual;
	}

	public function setasiento_automaticoActual(asiento_automatico $asiento_automaticoActual) {
		$this->asiento_automaticoActual = $asiento_automaticoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidasiento_automatico() : int {
		return $this->idasiento_automatico;
	}

	public function setidasiento_automatico(int $idasiento_automatico) {
		$this->idasiento_automatico = $idasiento_automatico;
	}
	
	public function getasiento_automatico() : asiento_automatico {
		return $this->asiento_automatico;
	}

	public function setasiento_automatico(asiento_automatico $asiento_automatico) {
		$this->asiento_automatico = $asiento_automatico;
	}
		
	public function getasiento_automaticoLogic() : asiento_automatico_logic {		
		return $this->asiento_automaticoLogic;
	}

	public function setasiento_automaticoLogic(asiento_automatico_logic $asiento_automaticoLogic) {
		$this->asiento_automaticoLogic = $asiento_automaticoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getasiento_automaticosModel() {		
		try {						
			/*asiento_automaticosModel.setWrappedData(asiento_automaticoLogic->getasiento_automaticos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->asiento_automaticosModel;
	}
	
	public function setasiento_automaticosModel($asiento_automaticosModel) {
		$this->asiento_automaticosModel = $asiento_automaticosModel;
	}
	
	public function getasiento_automaticos() : array {		
		return $this->asiento_automaticos;
	}
	
	public function setasiento_automaticos(array $asiento_automaticos) {
		$this->asiento_automaticos= $asiento_automaticos;
	}
	
	public function getasiento_automaticosEliminados() : array {		
		return $this->asiento_automaticosEliminados;
	}
	
	public function setasiento_automaticosEliminados(array $asiento_automaticosEliminados) {
		$this->asiento_automaticosEliminados= $asiento_automaticosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getasiento_automaticoActualFromListDataModel() {
		try {
			/*$asiento_automaticoClase= $this->asiento_automaticosModel->getRowData();*/
			
			/*return $asiento_automatico;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
