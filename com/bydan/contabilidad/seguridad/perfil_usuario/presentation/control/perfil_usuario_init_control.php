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

namespace com\bydan\contabilidad\seguridad\perfil_usuario\presentation\control;

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

use com\bydan\contabilidad\seguridad\perfil_usuario\business\entity\perfil_usuario;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/perfil_usuario/util/perfil_usuario_carga.php');
use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_carga;

use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_util;
use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_param_return;
use com\bydan\contabilidad\seguridad\perfil_usuario\business\logic\perfil_usuario_logic;
use com\bydan\contabilidad\seguridad\perfil_usuario\presentation\session\perfil_usuario_session;


//FK


use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\business\logic\perfil_logic;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;

use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
perfil_usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
perfil_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
perfil_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
perfil_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*perfil_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class perfil_usuario_init_control extends ControllerBase {	
	
	public $perfil_usuarioClase=null;	
	public $perfil_usuariosModel=null;	
	public $perfil_usuariosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idperfil_usuario=0;	
	public ?int $idperfil_usuarioActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $perfil_usuarioLogic=null;
	
	public $perfil_usuarioActual=null;	
	
	public $perfil_usuario=null;
	public $perfil_usuarios=null;
	public $perfil_usuariosEliminados=array();
	public $perfil_usuariosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $perfil_usuariosLocal=array();
	public ?array $perfil_usuariosReporte=null;
	public ?array $perfil_usuariosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadperfil_usuario='onload';
	public string $strTipoPaginaAuxiliarperfil_usuario='none';
	public string $strTipoUsuarioAuxiliarperfil_usuario='none';
		
	public $perfil_usuarioReturnGeneral=null;
	public $perfil_usuarioParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $perfil_usuarioModel=null;
	public $perfil_usuarioControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_perfil='';
	public string $strMensajeid_usuario='';
	public string $strMensajeestado='';
	
	
	public string $strVisibleFK_Idperfil='display:table-row';
	public string $strVisibleFK_Idusuario='display:table-row';

	
	public array $perfilsFK=array();

	public function getperfilsFK():array {
		return $this->perfilsFK;
	}

	public function setperfilsFK(array $perfilsFK) {
		$this->perfilsFK = $perfilsFK;
	}

	public int $idperfilDefaultFK=-1;

	public function getIdperfilDefaultFK():int {
		return $this->idperfilDefaultFK;
	}

	public function setIdperfilDefaultFK(int $idperfilDefaultFK) {
		$this->idperfilDefaultFK = $idperfilDefaultFK;
	}

	public array $usuariosFK=array();

	public function getusuariosFK():array {
		return $this->usuariosFK;
	}

	public function setusuariosFK(array $usuariosFK) {
		$this->usuariosFK = $usuariosFK;
	}

	public int $idusuarioDefaultFK=-1;

	public function getIdusuarioDefaultFK():int {
		return $this->idusuarioDefaultFK;
	}

	public function setIdusuarioDefaultFK(int $idusuarioDefaultFK) {
		$this->idusuarioDefaultFK = $idusuarioDefaultFK;
	}

	
	
	public $usuario_control=null;
	public $usuario_session=null;
	
	
	//BUSQUEDA INTERNA FK
	public $idusuarioActual=0;

	public function getidusuarioActual() {
		return $this->idusuarioActual;
	}

	public function setidusuarioActual($idusuarioActual) {
		$this->idusuarioActual=$idusuarioActual;
	}
	
	
	
	
	public  $id_perfilFK_Idperfil=null;

	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->perfil_usuarioLogic==null) {
				$this->perfil_usuarioLogic=new perfil_usuario_logic();
			}
			
		} else {
			if($this->perfil_usuarioLogic==null) {
				$this->perfil_usuarioLogic=new perfil_usuario_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->perfil_usuarioClase==null) {
				$this->perfil_usuarioClase=new perfil_usuario();
			}
			
			$this->perfil_usuarioClase->setId(0);	
				
				
			$this->perfil_usuarioClase->setid_perfil(-1);	
			$this->perfil_usuarioClase->setid_usuario(-1);	
			$this->perfil_usuarioClase->setestado(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('perfil_usuario');
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
		$this->cargarParametrosReporteBase('perfil_usuario');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('perfil_usuario');
	}
	
	public function actualizarControllerConReturnGeneral(perfil_usuario_param_return $perfil_usuarioReturnGeneral) {
		if($perfil_usuarioReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesperfil_usuariosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$perfil_usuarioReturnGeneral->getsMensajeProceso();
		}
		
		if($perfil_usuarioReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$perfil_usuarioReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($perfil_usuarioReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$perfil_usuarioReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$perfil_usuarioReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($perfil_usuarioReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($perfil_usuarioReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$perfil_usuarioReturnGeneral->getsFuncionJs();
		}
		
		if($perfil_usuarioReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(perfil_usuario_session $perfil_usuario_session){
		$this->strStyleDivArbol=$perfil_usuario_session->strStyleDivArbol;	
		$this->strStyleDivContent=$perfil_usuario_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$perfil_usuario_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$perfil_usuario_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$perfil_usuario_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$perfil_usuario_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$perfil_usuario_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(perfil_usuario_session $perfil_usuario_session){
		$perfil_usuario_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$perfil_usuario_session->strStyleDivHeader='display:none';			
		$perfil_usuario_session->strStyleDivContent='width:93%;height:100%';	
		$perfil_usuario_session->strStyleDivOpcionesBanner='display:none';	
		$perfil_usuario_session->strStyleDivExpandirColapsar='display:none';	
		$perfil_usuario_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(perfil_usuario_control $perfil_usuario_control_session){
		$this->idNuevo=$perfil_usuario_control_session->idNuevo;
		$this->perfil_usuarioActual=$perfil_usuario_control_session->perfil_usuarioActual;
		$this->perfil_usuario=$perfil_usuario_control_session->perfil_usuario;
		$this->perfil_usuarioClase=$perfil_usuario_control_session->perfil_usuarioClase;
		$this->perfil_usuarios=$perfil_usuario_control_session->perfil_usuarios;
		$this->perfil_usuariosEliminados=$perfil_usuario_control_session->perfil_usuariosEliminados;
		$this->perfil_usuario=$perfil_usuario_control_session->perfil_usuario;
		$this->perfil_usuariosReporte=$perfil_usuario_control_session->perfil_usuariosReporte;
		$this->perfil_usuariosSeleccionados=$perfil_usuario_control_session->perfil_usuariosSeleccionados;
		$this->arrOrderBy=$perfil_usuario_control_session->arrOrderBy;
		$this->arrOrderByRel=$perfil_usuario_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$perfil_usuario_control_session->arrHistoryWebs;
		$this->arrSessionBases=$perfil_usuario_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadperfil_usuario=$perfil_usuario_control_session->strTypeOnLoadperfil_usuario;
		$this->strTipoPaginaAuxiliarperfil_usuario=$perfil_usuario_control_session->strTipoPaginaAuxiliarperfil_usuario;
		$this->strTipoUsuarioAuxiliarperfil_usuario=$perfil_usuario_control_session->strTipoUsuarioAuxiliarperfil_usuario;	
		
		$this->bitEsPopup=$perfil_usuario_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$perfil_usuario_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$perfil_usuario_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$perfil_usuario_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$perfil_usuario_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$perfil_usuario_control_session->strSufijo;
		$this->bitEsRelaciones=$perfil_usuario_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$perfil_usuario_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$perfil_usuario_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$perfil_usuario_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$perfil_usuario_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$perfil_usuario_control_session->strTituloTabla;
		$this->strTituloPathPagina=$perfil_usuario_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$perfil_usuario_control_session->strTituloPathElementoActual;
		
		if($this->perfil_usuarioLogic==null) {			
			$this->perfil_usuarioLogic=new perfil_usuario_logic();
		}
		
		
		if($this->perfil_usuarioClase==null) {
			$this->perfil_usuarioClase=new perfil_usuario();	
		}
		
		$this->perfil_usuarioLogic->setperfil_usuario($this->perfil_usuarioClase);
		
		
		if($this->perfil_usuarios==null) {
			$this->perfil_usuarios=array();	
		}
		
		$this->perfil_usuarioLogic->setperfil_usuarios($this->perfil_usuarios);
		
		
		$this->strTipoView=$perfil_usuario_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$perfil_usuario_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$perfil_usuario_control_session->datosCliente;
		$this->strAccionBusqueda=$perfil_usuario_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$perfil_usuario_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$perfil_usuario_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$perfil_usuario_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$perfil_usuario_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$perfil_usuario_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$perfil_usuario_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$perfil_usuario_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$perfil_usuario_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$perfil_usuario_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$perfil_usuario_control_session->strTipoPaginacion;
		$this->strTipoAccion=$perfil_usuario_control_session->strTipoAccion;
		$this->tiposReportes=$perfil_usuario_control_session->tiposReportes;
		$this->tiposReporte=$perfil_usuario_control_session->tiposReporte;
		$this->tiposAcciones=$perfil_usuario_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$perfil_usuario_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$perfil_usuario_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$perfil_usuario_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$perfil_usuario_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$perfil_usuario_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$perfil_usuario_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$perfil_usuario_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$perfil_usuario_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$perfil_usuario_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$perfil_usuario_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$perfil_usuario_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$perfil_usuario_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$perfil_usuario_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$perfil_usuario_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$perfil_usuario_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$perfil_usuario_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$perfil_usuario_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$perfil_usuario_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$perfil_usuario_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$perfil_usuario_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$perfil_usuario_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$perfil_usuario_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$perfil_usuario_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$perfil_usuario_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$perfil_usuario_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$perfil_usuario_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$perfil_usuario_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$perfil_usuario_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$perfil_usuario_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$perfil_usuario_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$perfil_usuario_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$perfil_usuario_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$perfil_usuario_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$perfil_usuario_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$perfil_usuario_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$perfil_usuario_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$perfil_usuario_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$perfil_usuario_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$perfil_usuario_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$perfil_usuario_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$perfil_usuario_control_session->resumenUsuarioActual;	
		$this->moduloActual=$perfil_usuario_control_session->moduloActual;	
		$this->opcionActual=$perfil_usuario_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$perfil_usuario_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$perfil_usuario_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$perfil_usuario_session=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME));
				
		if($perfil_usuario_session==null) {
			$perfil_usuario_session=new perfil_usuario_session();
		}
		
		$this->strStyleDivArbol=$perfil_usuario_session->strStyleDivArbol;	
		$this->strStyleDivContent=$perfil_usuario_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$perfil_usuario_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$perfil_usuario_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$perfil_usuario_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$perfil_usuario_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$perfil_usuario_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$perfil_usuario_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$perfil_usuario_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$perfil_usuario_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$perfil_usuario_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_perfil=$perfil_usuario_control_session->strMensajeid_perfil;
		$this->strMensajeid_usuario=$perfil_usuario_control_session->strMensajeid_usuario;
		$this->strMensajeestado=$perfil_usuario_control_session->strMensajeestado;
			
		
		$this->perfilsFK=$perfil_usuario_control_session->perfilsFK;
		$this->idperfilDefaultFK=$perfil_usuario_control_session->idperfilDefaultFK;
		$this->usuariosFK=$perfil_usuario_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$perfil_usuario_control_session->idusuarioDefaultFK;
		
		
		$this->strVisibleFK_Idperfil=$perfil_usuario_control_session->strVisibleFK_Idperfil;
		$this->strVisibleFK_Idusuario=$perfil_usuario_control_session->strVisibleFK_Idusuario;
		
		
		
		
		$this->id_perfilFK_Idperfil=$perfil_usuario_control_session->id_perfilFK_Idperfil;
		$this->id_usuarioFK_Idusuario=$perfil_usuario_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getperfil_usuarioControllerAdditional() {
		return $this->perfil_usuarioControllerAdditional;
	}

	public function setperfil_usuarioControllerAdditional($perfil_usuarioControllerAdditional) {
		$this->perfil_usuarioControllerAdditional = $perfil_usuarioControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getperfil_usuarioActual() : perfil_usuario {
		return $this->perfil_usuarioActual;
	}

	public function setperfil_usuarioActual(perfil_usuario $perfil_usuarioActual) {
		$this->perfil_usuarioActual = $perfil_usuarioActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidperfil_usuario() : int {
		return $this->idperfil_usuario;
	}

	public function setidperfil_usuario(int $idperfil_usuario) {
		$this->idperfil_usuario = $idperfil_usuario;
	}
	
	public function getperfil_usuario() : perfil_usuario {
		return $this->perfil_usuario;
	}

	public function setperfil_usuario(perfil_usuario $perfil_usuario) {
		$this->perfil_usuario = $perfil_usuario;
	}
		
	public function getperfil_usuarioLogic() : perfil_usuario_logic {		
		return $this->perfil_usuarioLogic;
	}

	public function setperfil_usuarioLogic(perfil_usuario_logic $perfil_usuarioLogic) {
		$this->perfil_usuarioLogic = $perfil_usuarioLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getperfil_usuariosModel() {		
		try {						
			/*perfil_usuariosModel.setWrappedData(perfil_usuarioLogic->getperfil_usuarios());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->perfil_usuariosModel;
	}
	
	public function setperfil_usuariosModel($perfil_usuariosModel) {
		$this->perfil_usuariosModel = $perfil_usuariosModel;
	}
	
	public function getperfil_usuarios() : array {		
		return $this->perfil_usuarios;
	}
	
	public function setperfil_usuarios(array $perfil_usuarios) {
		$this->perfil_usuarios= $perfil_usuarios;
	}
	
	public function getperfil_usuariosEliminados() : array {		
		return $this->perfil_usuariosEliminados;
	}
	
	public function setperfil_usuariosEliminados(array $perfil_usuariosEliminados) {
		$this->perfil_usuariosEliminados= $perfil_usuariosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getperfil_usuarioActualFromListDataModel() {
		try {
			/*$perfil_usuarioClase= $this->perfil_usuariosModel->getRowData();*/
			
			/*return $perfil_usuario;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
