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

namespace com\bydan\contabilidad\seguridad\usuario\presentation\control;

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


use com\bydan\contabilidad\seguridad\perfil_opcion\business\entity\perfil_opcion;

use com\bydan\contabilidad\seguridad\sistema\util\sistema_param_return;

use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic_add;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\logic\resumen_usuario_logic_add;

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/usuario/util/usuario_carga.php');
use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;

use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_param_return;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic_add;
use com\bydan\contabilidad\seguridad\usuario\presentation\session\usuario_session;


//FK


//REL


use com\bydan\contabilidad\seguridad\historial_cambio_clave\util\historial_cambio_clave_carga;
use com\bydan\contabilidad\seguridad\historial_cambio_clave\util\historial_cambio_clave_util;
use com\bydan\contabilidad\seguridad\historial_cambio_clave\presentation\session\historial_cambio_clave_session;

use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_carga;
use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_util;
use com\bydan\contabilidad\seguridad\resumen_usuario\presentation\session\resumen_usuario_session;

use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_carga;
use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_util;
use com\bydan\contabilidad\seguridad\auditoria\presentation\session\auditoria_session;

use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;
use com\bydan\contabilidad\seguridad\perfil\presentation\session\perfil_session;

use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_carga;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_util;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\presentation\session\parametro_general_usuario_session;

use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_carga;
use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_util;
use com\bydan\contabilidad\seguridad\perfil_usuario\presentation\session\perfil_usuario_session;

use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_carga;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_util;
use com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\session\dato_general_usuario_session;


/*CARGA ARCHIVOS FRAMEWORK*/
usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class usuario_init_control extends ControllerBase {	
	
	public $usuarioClase=null;	
	public $usuariosModel=null;	
	public $usuariosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idusuario=0;	
	public ?int $idusuarioActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $usuarioLogic=null;
	
	
	public $usuario=null;
	public $usuarios=null;
	public $usuariosEliminados=array();
	public $usuariosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $usuariosLocal=array();
	public ?array $usuariosReporte=null;
	public ?array $usuariosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadusuario='onload';
	public string $strTipoPaginaAuxiliarusuario='none';
	public string $strTipoUsuarioAuxiliarusuario='none';
		
	public $usuarioReturnGeneral=null;
	public $usuarioParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $usuarioModel=null;
	public $usuarioControllerAdditional=null;
	
	
	

	public $historialcambioclaveLogic=null;

	public function  gethistorial_cambio_claveLogic() {
		return $this->historialcambioclaveLogic;
	}

	public function sethistorial_cambio_claveLogic($historialcambioclaveLogic) {
		$this->historialcambioclaveLogic =$historialcambioclaveLogic;
	}


	public $resumenusuarioLogic=null;

	public function  getresumen_usuarioLogic() {
		return $this->resumenusuarioLogic;
	}

	public function setresumen_usuarioLogic($resumenusuarioLogic) {
		$this->resumenusuarioLogic =$resumenusuarioLogic;
	}


	public $auditoriaLogic=null;

	public function  getauditoriaLogic() {
		return $this->auditoriaLogic;
	}

	public function setauditoriaLogic($auditoriaLogic) {
		$this->auditoriaLogic =$auditoriaLogic;
	}


	public $parametrogeneralusuarioLogic=null;

	public function  getparametro_general_usuarioLogic() {
		return $this->parametrogeneralusuarioLogic;
	}

	public function setparametro_general_usuarioLogic($parametrogeneralusuarioLogic) {
		$this->parametrogeneralusuarioLogic =$parametrogeneralusuarioLogic;
	}


	public $perfilusuarioLogic=null;

	public function  getperfil_usuarioLogic() {
		return $this->perfilusuarioLogic;
	}

	public function setperfil_usuarioLogic($perfilusuarioLogic) {
		$this->perfilusuarioLogic =$perfilusuarioLogic;
	}


	public $datogeneralusuarioLogic=null;

	public function  getdato_general_usuarioLogic() {
		return $this->datogeneralusuarioLogic;
	}

	public function setdato_general_usuarioLogic($datogeneralusuarioLogic) {
		$this->datogeneralusuarioLogic =$datogeneralusuarioLogic;
	}
 	
	
	public string $strMensajeuser_name='';
	public string $strMensajeclave='';
	public string $strMensajeconfirmar_clave='';
	public string $strMensajenombre='';
	public string $strMensajecodigo_alterno='';
	public string $strMensajetipo='';
	public string $strMensajeestado='';
	
	
	public string $strVisibleBusquedaPorNombre='display:table-row';
	public string $strVisibleBusquedaPorUserName='display:table-row';

	
	
	
	
	
	
	
	public $strTienePermisoshistorial_cambio_clave='none';
	public $strTienePermisosresumen_usuario='none';
	public $strTienePermisosauditoria='none';
	public $strTienePermisosperfil_usuario='none';
	public $strTienePermisosparametro_general_usuario='none';
	public $strTienePermisosdato_general_usuario='none';
	
	
	public  $nombreBusquedaPorNombre=null;

	public  $user_nameBusquedaPorUserName=null;

	public  $codigo_alternoPorCodigoAlterno=null;

	public  $user_namePorUserName=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->usuarioLogic==null) {
				$this->usuarioLogic=new usuario_logic();
			}
			
		} else {
			if($this->usuarioLogic==null) {
				$this->usuarioLogic=new usuario_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->usuarioClase==null) {
				$this->usuarioClase=new usuario();
			}
			
			$this->usuarioClase->setId(0);	
				
				
			$this->usuarioClase->setuser_name('');	
			$this->usuarioClase->setclave('');	
			$this->usuarioClase->setconfirmar_clave('');	
			$this->usuarioClase->setnombre('');	
			$this->usuarioClase->setcodigo_alterno('');	
			$this->usuarioClase->settipo(false);	
			$this->usuarioClase->setestado(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('usuario');
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
		$this->cargarParametrosReporteBase('usuario');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('usuario');
	}
	
	public function actualizarControllerConReturnGeneral(usuario_param_return $usuarioReturnGeneral) {
		if($usuarioReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesusuariosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$usuarioReturnGeneral->getsMensajeProceso();
		}
		
		if($usuarioReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$usuarioReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($usuarioReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$usuarioReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$usuarioReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($usuarioReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($usuarioReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$usuarioReturnGeneral->getsFuncionJs();
		}
		
		if($usuarioReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(usuario_session $usuario_session){
		$this->strStyleDivArbol=$usuario_session->strStyleDivArbol;	
		$this->strStyleDivContent=$usuario_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$usuario_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$usuario_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$usuario_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$usuario_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$usuario_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(usuario_session $usuario_session){
		$usuario_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$usuario_session->strStyleDivHeader='display:none';			
		$usuario_session->strStyleDivContent='width:93%;height:100%';	
		$usuario_session->strStyleDivOpcionesBanner='display:none';	
		$usuario_session->strStyleDivExpandirColapsar='display:none';	
		$usuario_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(usuario_control $usuario_control_session){
		$this->idNuevo=$usuario_control_session->idNuevo;
		$this->usuarioActual=$usuario_control_session->usuarioActual;
		$this->usuario=$usuario_control_session->usuario;
		$this->usuarioClase=$usuario_control_session->usuarioClase;
		$this->usuarios=$usuario_control_session->usuarios;
		$this->usuariosEliminados=$usuario_control_session->usuariosEliminados;
		$this->usuario=$usuario_control_session->usuario;
		$this->usuariosReporte=$usuario_control_session->usuariosReporte;
		$this->usuariosSeleccionados=$usuario_control_session->usuariosSeleccionados;
		$this->arrOrderBy=$usuario_control_session->arrOrderBy;
		$this->arrOrderByRel=$usuario_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$usuario_control_session->arrHistoryWebs;
		$this->arrSessionBases=$usuario_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadusuario=$usuario_control_session->strTypeOnLoadusuario;
		$this->strTipoPaginaAuxiliarusuario=$usuario_control_session->strTipoPaginaAuxiliarusuario;
		$this->strTipoUsuarioAuxiliarusuario=$usuario_control_session->strTipoUsuarioAuxiliarusuario;	
		
		$this->bitEsPopup=$usuario_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$usuario_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$usuario_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$usuario_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$usuario_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$usuario_control_session->strSufijo;
		$this->bitEsRelaciones=$usuario_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$usuario_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$usuario_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$usuario_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$usuario_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$usuario_control_session->strTituloTabla;
		$this->strTituloPathPagina=$usuario_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$usuario_control_session->strTituloPathElementoActual;
		
		if($this->usuarioLogic==null) {			
			$this->usuarioLogic=new usuario_logic();
		}
		
		
		if($this->usuarioClase==null) {
			$this->usuarioClase=new usuario();	
		}
		
		$this->usuarioLogic->setusuario($this->usuarioClase);
		
		
		if($this->usuarios==null) {
			$this->usuarios=array();	
		}
		
		$this->usuarioLogic->setusuarios($this->usuarios);
		
		
		$this->strTipoView=$usuario_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$usuario_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$usuario_control_session->datosCliente;
		$this->strAccionBusqueda=$usuario_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$usuario_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$usuario_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$usuario_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$usuario_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$usuario_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$usuario_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$usuario_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$usuario_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$usuario_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$usuario_control_session->strTipoPaginacion;
		$this->strTipoAccion=$usuario_control_session->strTipoAccion;
		$this->tiposReportes=$usuario_control_session->tiposReportes;
		$this->tiposReporte=$usuario_control_session->tiposReporte;
		$this->tiposAcciones=$usuario_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$usuario_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$usuario_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$usuario_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$usuario_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$usuario_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$usuario_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$usuario_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$usuario_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$usuario_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$usuario_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$usuario_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$usuario_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$usuario_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$usuario_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$usuario_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$usuario_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$usuario_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$usuario_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$usuario_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$usuario_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$usuario_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$usuario_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$usuario_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$usuario_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$usuario_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$usuario_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$usuario_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$usuario_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$usuario_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$usuario_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$usuario_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$usuario_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$usuario_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$usuario_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$usuario_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$usuario_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$usuario_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$usuario_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$usuario_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$usuario_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$usuario_control_session->resumenUsuarioActual;	
		$this->moduloActual=$usuario_control_session->moduloActual;	
		$this->opcionActual=$usuario_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$usuario_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$usuario_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$usuario_session=unserialize($this->Session->read(usuario_util::$STR_SESSION_NAME));
				
		if($usuario_session==null) {
			$usuario_session=new usuario_session();
		}
		
		$this->strStyleDivArbol=$usuario_session->strStyleDivArbol;	
		$this->strStyleDivContent=$usuario_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$usuario_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$usuario_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$usuario_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$usuario_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$usuario_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$usuario_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$usuario_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$usuario_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$usuario_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeuser_name=$usuario_control_session->strMensajeuser_name;
		$this->strMensajeclave=$usuario_control_session->strMensajeclave;
		$this->strMensajeconfirmar_clave=$usuario_control_session->strMensajeconfirmar_clave;
		$this->strMensajenombre=$usuario_control_session->strMensajenombre;
		$this->strMensajecodigo_alterno=$usuario_control_session->strMensajecodigo_alterno;
		$this->strMensajetipo=$usuario_control_session->strMensajetipo;
		$this->strMensajeestado=$usuario_control_session->strMensajeestado;
			
		
		
		
		$this->strVisibleBusquedaPorNombre=$usuario_control_session->strVisibleBusquedaPorNombre;
		$this->strVisibleBusquedaPorUserName=$usuario_control_session->strVisibleBusquedaPorUserName;
		
		
		$this->strTienePermisoshistorial_cambio_clave=$usuario_control_session->strTienePermisoshistorial_cambio_clave;
		$this->strTienePermisosresumen_usuario=$usuario_control_session->strTienePermisosresumen_usuario;
		$this->strTienePermisosauditoria=$usuario_control_session->strTienePermisosauditoria;
		$this->strTienePermisosperfil_usuario=$usuario_control_session->strTienePermisosperfil_usuario;
		$this->strTienePermisosparametro_general_usuario=$usuario_control_session->strTienePermisosparametro_general_usuario;
		$this->strTienePermisosdato_general_usuario=$usuario_control_session->strTienePermisosdato_general_usuario;
		
		
		$this->nombreBusquedaPorNombre=$usuario_control_session->nombreBusquedaPorNombre;
		$this->user_nameBusquedaPorUserName=$usuario_control_session->user_nameBusquedaPorUserName;
		$this->codigo_alternoPorCodigoAlterno=$usuario_control_session->codigo_alternoPorCodigoAlterno;
		$this->user_namePorUserName=$usuario_control_session->user_namePorUserName;

		
		
		
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
	
	public function getusuarioControllerAdditional() {
		return $this->usuarioControllerAdditional;
	}

	public function setusuarioControllerAdditional($usuarioControllerAdditional) {
		$this->usuarioControllerAdditional = $usuarioControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidusuario() : int {
		return $this->idusuario;
	}

	public function setidusuario(int $idusuario) {
		$this->idusuario = $idusuario;
	}
	
	public function getusuario() : usuario {
		return $this->usuario;
	}

	public function setusuario(usuario $usuario) {
		$this->usuario = $usuario;
	}
		
	public function getusuarioLogic() : usuario_logic {		
		return $this->usuarioLogic;
	}

	public function setusuarioLogic(usuario_logic $usuarioLogic) {
		$this->usuarioLogic = $usuarioLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getusuariosModel() {		
		try {						
			/*usuariosModel.setWrappedData(usuarioLogic->getusuarios());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->usuariosModel;
	}
	
	public function setusuariosModel($usuariosModel) {
		$this->usuariosModel = $usuariosModel;
	}
	
	public function getusuarios() : array {		
		return $this->usuarios;
	}
	
	public function setusuarios(array $usuarios) {
		$this->usuarios= $usuarios;
	}
	
	public function getusuariosEliminados() : array {		
		return $this->usuariosEliminados;
	}
	
	public function setusuariosEliminados(array $usuariosEliminados) {
		$this->usuariosEliminados= $usuariosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getusuarioActualFromListDataModel() {
		try {
			/*$usuarioClase= $this->usuariosModel->getRowData();*/
			
			/*return $usuario;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
