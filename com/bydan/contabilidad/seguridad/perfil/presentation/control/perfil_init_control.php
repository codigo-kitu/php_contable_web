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

namespace com\bydan\contabilidad\seguridad\perfil\presentation\control;

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

use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/perfil/util/perfil_carga.php');
use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;

use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_param_return;
use com\bydan\contabilidad\seguridad\perfil\business\logic\perfil_logic;
use com\bydan\contabilidad\seguridad\perfil\presentation\session\perfil_session;


//FK


use com\bydan\contabilidad\seguridad\sistema\business\entity\sistema;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_carga;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_util;

//REL


use com\bydan\contabilidad\seguridad\perfil_accion\util\perfil_accion_carga;
use com\bydan\contabilidad\seguridad\perfil_accion\util\perfil_accion_util;
use com\bydan\contabilidad\seguridad\perfil_accion\presentation\session\perfil_accion_session;

use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_carga;
use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_util;
use com\bydan\contabilidad\seguridad\perfil_campo\presentation\session\perfil_campo_session;

use com\bydan\contabilidad\seguridad\accion\util\accion_carga;
use com\bydan\contabilidad\seguridad\accion\util\accion_util;
use com\bydan\contabilidad\seguridad\accion\presentation\session\accion_session;

use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_carga;
use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_util;
use com\bydan\contabilidad\seguridad\perfil_opcion\presentation\session\perfil_opcion_session;

use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_carga;
use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_util;
use com\bydan\contabilidad\seguridad\perfil_usuario\presentation\session\perfil_usuario_session;

use com\bydan\contabilidad\seguridad\campo\util\campo_carga;
use com\bydan\contabilidad\seguridad\campo\util\campo_util;
use com\bydan\contabilidad\seguridad\campo\presentation\session\campo_session;

use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;
use com\bydan\contabilidad\seguridad\usuario\presentation\session\usuario_session;

use com\bydan\contabilidad\seguridad\opcion\util\opcion_carga;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_util;
use com\bydan\contabilidad\seguridad\opcion\presentation\session\opcion_session;


/*CARGA ARCHIVOS FRAMEWORK*/
perfil_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
perfil_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
perfil_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
perfil_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*perfil_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class perfil_init_control extends ControllerBase {	
	
	public $perfilClase=null;	
	public $perfilsModel=null;	
	public $perfilsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idperfil=0;	
	public ?int $idperfilActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $perfilLogic=null;
	
	public $perfilActual=null;	
	
	public $perfil=null;
	public $perfils=null;
	public $perfilsEliminados=array();
	public $perfilsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $perfilsLocal=array();
	public ?array $perfilsReporte=null;
	public ?array $perfilsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadperfil='onload';
	public string $strTipoPaginaAuxiliarperfil='none';
	public string $strTipoUsuarioAuxiliarperfil='none';
		
	public $perfilReturnGeneral=null;
	public $perfilParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $perfilModel=null;
	public $perfilControllerAdditional=null;
	
	
	

	public $perfilaccionLogic=null;

	public function  getperfil_accionLogic() {
		return $this->perfilaccionLogic;
	}

	public function setperfil_accionLogic($perfilaccionLogic) {
		$this->perfilaccionLogic =$perfilaccionLogic;
	}


	public $perfilcampoLogic=null;

	public function  getperfil_campoLogic() {
		return $this->perfilcampoLogic;
	}

	public function setperfil_campoLogic($perfilcampoLogic) {
		$this->perfilcampoLogic =$perfilcampoLogic;
	}


	public $perfilopcionLogic=null;

	public function  getperfil_opcionLogic() {
		return $this->perfilopcionLogic;
	}

	public function setperfil_opcionLogic($perfilopcionLogic) {
		$this->perfilopcionLogic =$perfilopcionLogic;
	}


	public $perfilusuarioLogic=null;

	public function  getperfil_usuarioLogic() {
		return $this->perfilusuarioLogic;
	}

	public function setperfil_usuarioLogic($perfilusuarioLogic) {
		$this->perfilusuarioLogic =$perfilusuarioLogic;
	}
 	
	
	public string $strMensajeid_sistema='';
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	public string $strMensajenombre2='';
	public string $strMensajeestado='';
	
	
	public string $strVisibleBusquedaPorNombre='display:table-row';
	public string $strVisibleBusquedaPorNombre2='display:table-row';
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

	
	
	
	
	
	
	public $strTienePermisosperfil_accion='none';
	public $strTienePermisosperfil_campo='none';
	public $strTienePermisosperfil_opcion='none';
	public $strTienePermisosperfil_usuario='none';
	
	
	public  $nombreBusquedaPorNombre=null;

	public  $nombre2BusquedaPorNombre2=null;

	public  $id_sistemaFK_Idsistema=null;

	public  $id_sistemaPorIdSistemaPorNombre=null;


	public  $nombrePorIdSistemaPorNombre=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->perfilLogic==null) {
				$this->perfilLogic=new perfil_logic();
			}
			
		} else {
			if($this->perfilLogic==null) {
				$this->perfilLogic=new perfil_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->perfilClase==null) {
				$this->perfilClase=new perfil();
			}
			
			$this->perfilClase->setId(0);	
				
				
			$this->perfilClase->setid_sistema(-1);	
			$this->perfilClase->setcodigo('');	
			$this->perfilClase->setnombre('');	
			$this->perfilClase->setnombre2('');	
			$this->perfilClase->setestado(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('perfil');
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
		$this->cargarParametrosReporteBase('perfil');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('perfil');
	}
	
	public function actualizarControllerConReturnGeneral(perfil_param_return $perfilReturnGeneral) {
		if($perfilReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesperfilsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$perfilReturnGeneral->getsMensajeProceso();
		}
		
		if($perfilReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$perfilReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($perfilReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$perfilReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$perfilReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($perfilReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($perfilReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$perfilReturnGeneral->getsFuncionJs();
		}
		
		if($perfilReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(perfil_session $perfil_session){
		$this->strStyleDivArbol=$perfil_session->strStyleDivArbol;	
		$this->strStyleDivContent=$perfil_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$perfil_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$perfil_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$perfil_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$perfil_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$perfil_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(perfil_session $perfil_session){
		$perfil_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$perfil_session->strStyleDivHeader='display:none';			
		$perfil_session->strStyleDivContent='width:93%;height:100%';	
		$perfil_session->strStyleDivOpcionesBanner='display:none';	
		$perfil_session->strStyleDivExpandirColapsar='display:none';	
		$perfil_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(perfil_control $perfil_control_session){
		$this->idNuevo=$perfil_control_session->idNuevo;
		$this->perfilActual=$perfil_control_session->perfilActual;
		$this->perfil=$perfil_control_session->perfil;
		$this->perfilClase=$perfil_control_session->perfilClase;
		$this->perfils=$perfil_control_session->perfils;
		$this->perfilsEliminados=$perfil_control_session->perfilsEliminados;
		$this->perfil=$perfil_control_session->perfil;
		$this->perfilsReporte=$perfil_control_session->perfilsReporte;
		$this->perfilsSeleccionados=$perfil_control_session->perfilsSeleccionados;
		$this->arrOrderBy=$perfil_control_session->arrOrderBy;
		$this->arrOrderByRel=$perfil_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$perfil_control_session->arrHistoryWebs;
		$this->arrSessionBases=$perfil_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadperfil=$perfil_control_session->strTypeOnLoadperfil;
		$this->strTipoPaginaAuxiliarperfil=$perfil_control_session->strTipoPaginaAuxiliarperfil;
		$this->strTipoUsuarioAuxiliarperfil=$perfil_control_session->strTipoUsuarioAuxiliarperfil;	
		
		$this->bitEsPopup=$perfil_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$perfil_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$perfil_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$perfil_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$perfil_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$perfil_control_session->strSufijo;
		$this->bitEsRelaciones=$perfil_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$perfil_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$perfil_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$perfil_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$perfil_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$perfil_control_session->strTituloTabla;
		$this->strTituloPathPagina=$perfil_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$perfil_control_session->strTituloPathElementoActual;
		
		if($this->perfilLogic==null) {			
			$this->perfilLogic=new perfil_logic();
		}
		
		
		if($this->perfilClase==null) {
			$this->perfilClase=new perfil();	
		}
		
		$this->perfilLogic->setperfil($this->perfilClase);
		
		
		if($this->perfils==null) {
			$this->perfils=array();	
		}
		
		$this->perfilLogic->setperfils($this->perfils);
		
		
		$this->strTipoView=$perfil_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$perfil_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$perfil_control_session->datosCliente;
		$this->strAccionBusqueda=$perfil_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$perfil_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$perfil_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$perfil_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$perfil_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$perfil_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$perfil_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$perfil_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$perfil_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$perfil_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$perfil_control_session->strTipoPaginacion;
		$this->strTipoAccion=$perfil_control_session->strTipoAccion;
		$this->tiposReportes=$perfil_control_session->tiposReportes;
		$this->tiposReporte=$perfil_control_session->tiposReporte;
		$this->tiposAcciones=$perfil_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$perfil_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$perfil_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$perfil_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$perfil_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$perfil_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$perfil_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$perfil_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$perfil_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$perfil_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$perfil_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$perfil_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$perfil_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$perfil_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$perfil_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$perfil_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$perfil_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$perfil_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$perfil_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$perfil_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$perfil_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$perfil_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$perfil_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$perfil_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$perfil_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$perfil_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$perfil_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$perfil_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$perfil_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$perfil_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$perfil_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$perfil_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$perfil_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$perfil_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$perfil_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$perfil_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$perfil_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$perfil_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$perfil_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$perfil_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$perfil_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$perfil_control_session->resumenUsuarioActual;	
		$this->moduloActual=$perfil_control_session->moduloActual;	
		$this->opcionActual=$perfil_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$perfil_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$perfil_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$perfil_session=unserialize($this->Session->read(perfil_util::$STR_SESSION_NAME));
				
		if($perfil_session==null) {
			$perfil_session=new perfil_session();
		}
		
		$this->strStyleDivArbol=$perfil_session->strStyleDivArbol;	
		$this->strStyleDivContent=$perfil_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$perfil_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$perfil_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$perfil_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$perfil_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$perfil_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$perfil_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$perfil_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$perfil_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$perfil_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_sistema=$perfil_control_session->strMensajeid_sistema;
		$this->strMensajecodigo=$perfil_control_session->strMensajecodigo;
		$this->strMensajenombre=$perfil_control_session->strMensajenombre;
		$this->strMensajenombre2=$perfil_control_session->strMensajenombre2;
		$this->strMensajeestado=$perfil_control_session->strMensajeestado;
			
		
		$this->sistemasFK=$perfil_control_session->sistemasFK;
		$this->idsistemaDefaultFK=$perfil_control_session->idsistemaDefaultFK;
		
		
		$this->strVisibleBusquedaPorNombre=$perfil_control_session->strVisibleBusquedaPorNombre;
		$this->strVisibleBusquedaPorNombre2=$perfil_control_session->strVisibleBusquedaPorNombre2;
		$this->strVisibleFK_Idsistema=$perfil_control_session->strVisibleFK_Idsistema;
		
		
		$this->strTienePermisosperfil_accion=$perfil_control_session->strTienePermisosperfil_accion;
		$this->strTienePermisosperfil_campo=$perfil_control_session->strTienePermisosperfil_campo;
		$this->strTienePermisosperfil_opcion=$perfil_control_session->strTienePermisosperfil_opcion;
		$this->strTienePermisosperfil_usuario=$perfil_control_session->strTienePermisosperfil_usuario;
		
		
		$this->nombreBusquedaPorNombre=$perfil_control_session->nombreBusquedaPorNombre;
		$this->nombre2BusquedaPorNombre2=$perfil_control_session->nombre2BusquedaPorNombre2;
		$this->id_sistemaFK_Idsistema=$perfil_control_session->id_sistemaFK_Idsistema;
		$this->id_sistemaPorIdSistemaPorNombre=$perfil_control_session->id_sistemaPorIdSistemaPorNombre;

		$this->nombrePorIdSistemaPorNombre=$perfil_control_session->nombrePorIdSistemaPorNombre;

		
		
		
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
	
	public function getperfilControllerAdditional() {
		return $this->perfilControllerAdditional;
	}

	public function setperfilControllerAdditional($perfilControllerAdditional) {
		$this->perfilControllerAdditional = $perfilControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getperfilActual() : perfil {
		return $this->perfilActual;
	}

	public function setperfilActual(perfil $perfilActual) {
		$this->perfilActual = $perfilActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidperfil() : int {
		return $this->idperfil;
	}

	public function setidperfil(int $idperfil) {
		$this->idperfil = $idperfil;
	}
	
	public function getperfil() : perfil {
		return $this->perfil;
	}

	public function setperfil(perfil $perfil) {
		$this->perfil = $perfil;
	}
		
	public function getperfilLogic() : perfil_logic {		
		return $this->perfilLogic;
	}

	public function setperfilLogic(perfil_logic $perfilLogic) {
		$this->perfilLogic = $perfilLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getperfilsModel() {		
		try {						
			/*perfilsModel.setWrappedData(perfilLogic->getperfils());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->perfilsModel;
	}
	
	public function setperfilsModel($perfilsModel) {
		$this->perfilsModel = $perfilsModel;
	}
	
	public function getperfils() : array {		
		return $this->perfils;
	}
	
	public function setperfils(array $perfils) {
		$this->perfils= $perfils;
	}
	
	public function getperfilsEliminados() : array {		
		return $this->perfilsEliminados;
	}
	
	public function setperfilsEliminados(array $perfilsEliminados) {
		$this->perfilsEliminados= $perfilsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getperfilActualFromListDataModel() {
		try {
			/*$perfilClase= $this->perfilsModel->getRowData();*/
			
			/*return $perfil;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
