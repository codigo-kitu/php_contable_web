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

namespace com\bydan\contabilidad\seguridad\opcion\presentation\control;

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

use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/opcion/util/opcion_carga.php');
use com\bydan\contabilidad\seguridad\opcion\util\opcion_carga;

use com\bydan\contabilidad\seguridad\opcion\util\opcion_util;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_param_return;
use com\bydan\contabilidad\seguridad\opcion\business\logic\opcion_logic;
use com\bydan\contabilidad\seguridad\opcion\presentation\session\opcion_session;


//FK


use com\bydan\contabilidad\seguridad\sistema\business\entity\sistema;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_carga;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_util;

use com\bydan\contabilidad\seguridad\grupo_opcion\business\entity\grupo_opcion;
use com\bydan\contabilidad\seguridad\grupo_opcion\business\logic\grupo_opcion_logic;
use com\bydan\contabilidad\seguridad\grupo_opcion\util\grupo_opcion_carga;
use com\bydan\contabilidad\seguridad\grupo_opcion\util\grupo_opcion_util;

use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\modulo\business\logic\modulo_logic;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;

//REL


use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;
use com\bydan\contabilidad\seguridad\perfil\presentation\session\perfil_session;

use com\bydan\contabilidad\seguridad\accion\util\accion_carga;
use com\bydan\contabilidad\seguridad\accion\util\accion_util;
use com\bydan\contabilidad\seguridad\accion\presentation\session\accion_session;

use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_carga;
use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_util;
use com\bydan\contabilidad\seguridad\perfil_opcion\presentation\session\perfil_opcion_session;

use com\bydan\contabilidad\seguridad\campo\util\campo_carga;
use com\bydan\contabilidad\seguridad\campo\util\campo_util;
use com\bydan\contabilidad\seguridad\campo\presentation\session\campo_session;


/*CARGA ARCHIVOS FRAMEWORK*/
opcion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
opcion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class opcion_init_control extends ControllerBase {	
	
	public $opcionClase=null;	
	public $opcionsModel=null;	
	public $opcionsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idopcion=0;	
	public ?int $idopcionActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $opcionLogic=null;
	
	public $opcionActual=null;	
	
	public $opcion=null;
	public $opcions=null;
	public $opcionsEliminados=array();
	public $opcionsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $opcionsLocal=array();
	public ?array $opcionsReporte=null;
	public ?array $opcionsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadopcion='onload';
	public string $strTipoPaginaAuxiliaropcion='none';
	public string $strTipoUsuarioAuxiliaropcion='none';
		
	public $opcionReturnGeneral=null;
	public $opcionParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $opcionModel=null;
	public $opcionControllerAdditional=null;
	
	
	

	public $accionLogic=null;

	public function  getaccionLogic() {
		return $this->accionLogic;
	}

	public function setaccionLogic($accionLogic) {
		$this->accionLogic =$accionLogic;
	}


	public $perfilopcionLogic=null;

	public function  getperfil_opcionLogic() {
		return $this->perfilopcionLogic;
	}

	public function setperfil_opcionLogic($perfilopcionLogic) {
		$this->perfilopcionLogic =$perfilopcionLogic;
	}


	public $campoLogic=null;

	public function  getcampoLogic() {
		return $this->campoLogic;
	}

	public function setcampoLogic($campoLogic) {
		$this->campoLogic =$campoLogic;
	}
 	
	
	public string $strMensajeid_sistema='';
	public string $strMensajeid_opcion='';
	public string $strMensajeid_grupo_opcion='';
	public string $strMensajeid_modulo='';
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	public string $strMensajeposicion='';
	public string $strMensajeicon_name='';
	public string $strMensajenombre_clase='';
	public string $strMensajemodulo0='';
	public string $strMensajesub_modulo='';
	public string $strMensajepaquete='';
	public string $strMensajees_para_menu='';
	public string $strMensajees_guardar_relaciones='';
	public string $strMensajecon_mostrar_acciones_campo='';
	public string $strMensajeestado='';
	
	
	public string $strVisibleBusquedaPorIdSistemaPorIdOpcion='display:table-row';
	public string $strVisibleBusquedaPorIdSistemaPorNombre='display:table-row';
	public string $strVisibleFK_Idgrupo_opcion='display:table-row';
	public string $strVisibleFK_Idmodulo='display:table-row';
	public string $strVisibleFK_Idopcion='display:table-row';
	public string $strVisibleFK_Idsistema='display:table-row';

	
	public array $sistemasFK=array();

	public function getsistemasFK():array {
		return $this->sistemasFK;
	}

	public function setsistemasFK(array $sistemasFK) {
		$this->sistemasFK = $sistemasFK;
	}

	public int $idsistemaDefaultFK=-1;

	public function getIdsistemaDefaultFK():int {
		return $this->idsistemaDefaultFK;
	}

	public function setIdsistemaDefaultFK(int $idsistemaDefaultFK) {
		$this->idsistemaDefaultFK = $idsistemaDefaultFK;
	}

	public array $opcionsFK=array();

	public function getopcionsFK():array {
		return $this->opcionsFK;
	}

	public function setopcionsFK(array $opcionsFK) {
		$this->opcionsFK = $opcionsFK;
	}

	public int $idopcionDefaultFK=-1;

	public function getIdopcionDefaultFK():int {
		return $this->idopcionDefaultFK;
	}

	public function setIdopcionDefaultFK(int $idopcionDefaultFK) {
		$this->idopcionDefaultFK = $idopcionDefaultFK;
	}

	public array $grupo_opcionsFK=array();

	public function getgrupo_opcionsFK():array {
		return $this->grupo_opcionsFK;
	}

	public function setgrupo_opcionsFK(array $grupo_opcionsFK) {
		$this->grupo_opcionsFK = $grupo_opcionsFK;
	}

	public int $idgrupo_opcionDefaultFK=-1;

	public function getIdgrupo_opcionDefaultFK():int {
		return $this->idgrupo_opcionDefaultFK;
	}

	public function setIdgrupo_opcionDefaultFK(int $idgrupo_opcionDefaultFK) {
		$this->idgrupo_opcionDefaultFK = $idgrupo_opcionDefaultFK;
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

	
	
	
	
	
	
	public $strTienePermisosperfil_opcion='none';
	public $strTienePermisosopcion='none';
	public $strTienePermisosaccion='none';
	public $strTienePermisoscampo='none';
	
	
	public  $id_sistemaBusquedaPorIdSistemaPorIdOpcion=null;


	public  $id_opcionBusquedaPorIdSistemaPorIdOpcion=null;

	public  $id_sistemaBusquedaPorIdSistemaPorNombre=null;


	public  $nombreBusquedaPorIdSistemaPorNombre=null;

	public  $id_grupo_opcionFK_Idgrupo_opcion=null;

	public  $id_moduloFK_Idmodulo=null;

	public  $id_opcionFK_Idopcion=null;

	public  $id_sistemaFK_Idsistema=null;

	public  $id_sistemaPorIdSistemaPorIdOpcionPorNombre=null;


	public  $id_opcionPorIdSistemaPorIdOpcionPorNombre=null;


	public  $nombrePorIdSistemaPorIdOpcionPorNombre=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->opcionLogic==null) {
				$this->opcionLogic=new opcion_logic();
			}
			
		} else {
			if($this->opcionLogic==null) {
				$this->opcionLogic=new opcion_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->opcionClase==null) {
				$this->opcionClase=new opcion();
			}
			
			$this->opcionClase->setId(0);	
				
				
			$this->opcionClase->setid_sistema(-1);	
			$this->opcionClase->setid_opcion(null);	
			$this->opcionClase->setid_grupo_opcion(-1);	
			$this->opcionClase->setid_modulo(-1);	
			$this->opcionClase->setcodigo('');	
			$this->opcionClase->setnombre('');	
			$this->opcionClase->setposicion(0);	
			$this->opcionClase->seticon_name('');	
			$this->opcionClase->setnombre_clase('');	
			$this->opcionClase->setmodulo0('');	
			$this->opcionClase->setsub_modulo('');	
			$this->opcionClase->setpaquete('');	
			$this->opcionClase->setes_para_menu(false);	
			$this->opcionClase->setes_guardar_relaciones(false);	
			$this->opcionClase->setcon_mostrar_acciones_campo(false);	
			$this->opcionClase->setestado(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('opcion');
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
		$this->cargarParametrosReporteBase('opcion');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('opcion');
	}
	
	public function actualizarControllerConReturnGeneral(opcion_param_return $opcionReturnGeneral) {
		if($opcionReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesopcionsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$opcionReturnGeneral->getsMensajeProceso();
		}
		
		if($opcionReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$opcionReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($opcionReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$opcionReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$opcionReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($opcionReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($opcionReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$opcionReturnGeneral->getsFuncionJs();
		}
		
		if($opcionReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(opcion_session $opcion_session){
		$this->strStyleDivArbol=$opcion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$opcion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$opcion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$opcion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$opcion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$opcion_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$opcion_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(opcion_session $opcion_session){
		$opcion_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$opcion_session->strStyleDivHeader='display:none';			
		$opcion_session->strStyleDivContent='width:93%;height:100%';	
		$opcion_session->strStyleDivOpcionesBanner='display:none';	
		$opcion_session->strStyleDivExpandirColapsar='display:none';	
		$opcion_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(opcion_control $opcion_control_session){
		$this->idNuevo=$opcion_control_session->idNuevo;
		$this->opcionActual=$opcion_control_session->opcionActual;
		$this->opcion=$opcion_control_session->opcion;
		$this->opcionClase=$opcion_control_session->opcionClase;
		$this->opcions=$opcion_control_session->opcions;
		$this->opcionsEliminados=$opcion_control_session->opcionsEliminados;
		$this->opcion=$opcion_control_session->opcion;
		$this->opcionsReporte=$opcion_control_session->opcionsReporte;
		$this->opcionsSeleccionados=$opcion_control_session->opcionsSeleccionados;
		$this->arrOrderBy=$opcion_control_session->arrOrderBy;
		$this->arrOrderByRel=$opcion_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$opcion_control_session->arrHistoryWebs;
		$this->arrSessionBases=$opcion_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadopcion=$opcion_control_session->strTypeOnLoadopcion;
		$this->strTipoPaginaAuxiliaropcion=$opcion_control_session->strTipoPaginaAuxiliaropcion;
		$this->strTipoUsuarioAuxiliaropcion=$opcion_control_session->strTipoUsuarioAuxiliaropcion;	
		
		$this->bitEsPopup=$opcion_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$opcion_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$opcion_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$opcion_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$opcion_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$opcion_control_session->strSufijo;
		$this->bitEsRelaciones=$opcion_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$opcion_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$opcion_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$opcion_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$opcion_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$opcion_control_session->strTituloTabla;
		$this->strTituloPathPagina=$opcion_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$opcion_control_session->strTituloPathElementoActual;
		
		if($this->opcionLogic==null) {			
			$this->opcionLogic=new opcion_logic();
		}
		
		
		if($this->opcionClase==null) {
			$this->opcionClase=new opcion();	
		}
		
		$this->opcionLogic->setopcion($this->opcionClase);
		
		
		if($this->opcions==null) {
			$this->opcions=array();	
		}
		
		$this->opcionLogic->setopcions($this->opcions);
		
		
		$this->strTipoView=$opcion_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$opcion_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$opcion_control_session->datosCliente;
		$this->strAccionBusqueda=$opcion_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$opcion_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$opcion_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$opcion_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$opcion_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$opcion_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$opcion_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$opcion_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$opcion_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$opcion_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$opcion_control_session->strTipoPaginacion;
		$this->strTipoAccion=$opcion_control_session->strTipoAccion;
		$this->tiposReportes=$opcion_control_session->tiposReportes;
		$this->tiposReporte=$opcion_control_session->tiposReporte;
		$this->tiposAcciones=$opcion_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$opcion_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$opcion_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$opcion_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$opcion_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$opcion_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$opcion_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$opcion_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$opcion_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$opcion_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$opcion_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$opcion_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$opcion_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$opcion_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$opcion_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$opcion_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$opcion_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$opcion_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$opcion_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$opcion_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$opcion_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$opcion_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$opcion_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$opcion_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$opcion_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$opcion_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$opcion_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$opcion_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$opcion_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$opcion_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$opcion_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$opcion_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$opcion_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$opcion_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$opcion_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$opcion_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$opcion_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$opcion_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$opcion_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$opcion_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$opcion_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$opcion_control_session->resumenUsuarioActual;	
		$this->moduloActual=$opcion_control_session->moduloActual;	
		$this->opcionActual=$opcion_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$opcion_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$opcion_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));
				
		if($opcion_session==null) {
			$opcion_session=new opcion_session();
		}
		
		$this->strStyleDivArbol=$opcion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$opcion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$opcion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$opcion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$opcion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$opcion_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$opcion_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$opcion_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$opcion_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$opcion_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$opcion_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_sistema=$opcion_control_session->strMensajeid_sistema;
		$this->strMensajeid_opcion=$opcion_control_session->strMensajeid_opcion;
		$this->strMensajeid_grupo_opcion=$opcion_control_session->strMensajeid_grupo_opcion;
		$this->strMensajeid_modulo=$opcion_control_session->strMensajeid_modulo;
		$this->strMensajecodigo=$opcion_control_session->strMensajecodigo;
		$this->strMensajenombre=$opcion_control_session->strMensajenombre;
		$this->strMensajeposicion=$opcion_control_session->strMensajeposicion;
		$this->strMensajeicon_name=$opcion_control_session->strMensajeicon_name;
		$this->strMensajenombre_clase=$opcion_control_session->strMensajenombre_clase;
		$this->strMensajemodulo0=$opcion_control_session->strMensajemodulo0;
		$this->strMensajesub_modulo=$opcion_control_session->strMensajesub_modulo;
		$this->strMensajepaquete=$opcion_control_session->strMensajepaquete;
		$this->strMensajees_para_menu=$opcion_control_session->strMensajees_para_menu;
		$this->strMensajees_guardar_relaciones=$opcion_control_session->strMensajees_guardar_relaciones;
		$this->strMensajecon_mostrar_acciones_campo=$opcion_control_session->strMensajecon_mostrar_acciones_campo;
		$this->strMensajeestado=$opcion_control_session->strMensajeestado;
			
		
		$this->sistemasFK=$opcion_control_session->sistemasFK;
		$this->idsistemaDefaultFK=$opcion_control_session->idsistemaDefaultFK;
		$this->opcionsFK=$opcion_control_session->opcionsFK;
		$this->idopcionDefaultFK=$opcion_control_session->idopcionDefaultFK;
		$this->grupo_opcionsFK=$opcion_control_session->grupo_opcionsFK;
		$this->idgrupo_opcionDefaultFK=$opcion_control_session->idgrupo_opcionDefaultFK;
		$this->modulosFK=$opcion_control_session->modulosFK;
		$this->idmoduloDefaultFK=$opcion_control_session->idmoduloDefaultFK;
		
		
		$this->strVisibleBusquedaPorIdSistemaPorIdOpcion=$opcion_control_session->strVisibleBusquedaPorIdSistemaPorIdOpcion;
		$this->strVisibleBusquedaPorIdSistemaPorNombre=$opcion_control_session->strVisibleBusquedaPorIdSistemaPorNombre;
		$this->strVisibleFK_Idgrupo_opcion=$opcion_control_session->strVisibleFK_Idgrupo_opcion;
		$this->strVisibleFK_Idmodulo=$opcion_control_session->strVisibleFK_Idmodulo;
		$this->strVisibleFK_Idopcion=$opcion_control_session->strVisibleFK_Idopcion;
		$this->strVisibleFK_Idsistema=$opcion_control_session->strVisibleFK_Idsistema;
		
		
		$this->strTienePermisosperfil_opcion=$opcion_control_session->strTienePermisosperfil_opcion;
		$this->strTienePermisosopcion=$opcion_control_session->strTienePermisosopcion;
		$this->strTienePermisosaccion=$opcion_control_session->strTienePermisosaccion;
		$this->strTienePermisoscampo=$opcion_control_session->strTienePermisoscampo;
		
		
		$this->id_sistemaBusquedaPorIdSistemaPorIdOpcion=$opcion_control_session->id_sistemaBusquedaPorIdSistemaPorIdOpcion;

		$this->id_opcionBusquedaPorIdSistemaPorIdOpcion=$opcion_control_session->id_opcionBusquedaPorIdSistemaPorIdOpcion;
		$this->id_sistemaBusquedaPorIdSistemaPorNombre=$opcion_control_session->id_sistemaBusquedaPorIdSistemaPorNombre;

		$this->nombreBusquedaPorIdSistemaPorNombre=$opcion_control_session->nombreBusquedaPorIdSistemaPorNombre;
		$this->id_grupo_opcionFK_Idgrupo_opcion=$opcion_control_session->id_grupo_opcionFK_Idgrupo_opcion;
		$this->id_moduloFK_Idmodulo=$opcion_control_session->id_moduloFK_Idmodulo;
		$this->id_opcionFK_Idopcion=$opcion_control_session->id_opcionFK_Idopcion;
		$this->id_sistemaFK_Idsistema=$opcion_control_session->id_sistemaFK_Idsistema;
		$this->id_sistemaPorIdSistemaPorIdOpcionPorNombre=$opcion_control_session->id_sistemaPorIdSistemaPorIdOpcionPorNombre;

		$this->id_opcionPorIdSistemaPorIdOpcionPorNombre=$opcion_control_session->id_opcionPorIdSistemaPorIdOpcionPorNombre;

		$this->nombrePorIdSistemaPorIdOpcionPorNombre=$opcion_control_session->nombrePorIdSistemaPorIdOpcionPorNombre;

		
		
		
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
	
	public function getopcionControllerAdditional() {
		return $this->opcionControllerAdditional;
	}

	public function setopcionControllerAdditional($opcionControllerAdditional) {
		$this->opcionControllerAdditional = $opcionControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getopcionActual() : opcion {
		return $this->opcionActual;
	}

	public function setopcionActual(opcion $opcionActual) {
		$this->opcionActual = $opcionActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidopcion() : int {
		return $this->idopcion;
	}

	public function setidopcion(int $idopcion) {
		$this->idopcion = $idopcion;
	}
	
	public function getopcion() : opcion {
		return $this->opcion;
	}

	public function setopcion(opcion $opcion) {
		$this->opcion = $opcion;
	}
		
	public function getopcionLogic() : opcion_logic {		
		return $this->opcionLogic;
	}

	public function setopcionLogic(opcion_logic $opcionLogic) {
		$this->opcionLogic = $opcionLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getopcionsModel() {		
		try {						
			/*opcionsModel.setWrappedData(opcionLogic->getopcions());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->opcionsModel;
	}
	
	public function setopcionsModel($opcionsModel) {
		$this->opcionsModel = $opcionsModel;
	}
	
	public function getopcions() : array {		
		return $this->opcions;
	}
	
	public function setopcions(array $opcions) {
		$this->opcions= $opcions;
	}
	
	public function getopcionsEliminados() : array {		
		return $this->opcionsEliminados;
	}
	
	public function setopcionsEliminados(array $opcionsEliminados) {
		$this->opcionsEliminados= $opcionsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getopcionActualFromListDataModel() {
		try {
			/*$opcionClase= $this->opcionsModel->getRowData();*/
			
			/*return $opcion;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
