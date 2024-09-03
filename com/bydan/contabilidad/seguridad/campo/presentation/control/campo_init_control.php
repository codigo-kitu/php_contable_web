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

namespace com\bydan\contabilidad\seguridad\campo\presentation\control;

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

use com\bydan\contabilidad\seguridad\campo\business\entity\campo;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/campo/util/campo_carga.php');
use com\bydan\contabilidad\seguridad\campo\util\campo_carga;

use com\bydan\contabilidad\seguridad\campo\util\campo_util;
use com\bydan\contabilidad\seguridad\campo\util\campo_param_return;
use com\bydan\contabilidad\seguridad\campo\business\logic\campo_logic;
use com\bydan\contabilidad\seguridad\campo\presentation\session\campo_session;


//FK


use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;
use com\bydan\contabilidad\seguridad\opcion\business\logic\opcion_logic;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_carga;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_util;

//REL


use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_carga;
use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_util;
use com\bydan\contabilidad\seguridad\perfil_campo\presentation\session\perfil_campo_session;

use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;
use com\bydan\contabilidad\seguridad\perfil\presentation\session\perfil_session;


/*CARGA ARCHIVOS FRAMEWORK*/
campo_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
campo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
campo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
campo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*campo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class campo_init_control extends ControllerBase {	
	
	public $campoClase=null;	
	public $camposModel=null;	
	public $camposListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcampo=0;	
	public ?int $idcampoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $campoLogic=null;
	
	public $campoActual=null;	
	
	public $campo=null;
	public $campos=null;
	public $camposEliminados=array();
	public $camposAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $camposLocal=array();
	public ?array $camposReporte=null;
	public ?array $camposSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcampo='onload';
	public string $strTipoPaginaAuxiliarcampo='none';
	public string $strTipoUsuarioAuxiliarcampo='none';
		
	public $campoReturnGeneral=null;
	public $campoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $campoModel=null;
	public $campoControllerAdditional=null;
	
	
	

	public $perfilcampoLogic=null;

	public function  getperfil_campoLogic() {
		return $this->perfilcampoLogic;
	}

	public function setperfil_campoLogic($perfilcampoLogic) {
		$this->perfilcampoLogic =$perfilcampoLogic;
	}
 	
	
	public string $strMensajeid_opcion='';
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	public string $strMensajedescripcion='';
	public string $strMensajeestado='';
	
	
	public string $strVisibleFK_Idopcion='display:table-row';

	
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

	
	
	
	
	
	
	public $strTienePermisosperfil_campo='none';
	
	
	public  $id_opcionFK_Idopcion=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->campoLogic==null) {
				$this->campoLogic=new campo_logic();
			}
			
		} else {
			if($this->campoLogic==null) {
				$this->campoLogic=new campo_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->campoClase==null) {
				$this->campoClase=new campo();
			}
			
			$this->campoClase->setId(0);	
				
				
			$this->campoClase->setid_opcion(-1);	
			$this->campoClase->setcodigo('');	
			$this->campoClase->setnombre('');	
			$this->campoClase->setdescripcion('');	
			$this->campoClase->setestado(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('campo');
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
		$this->cargarParametrosReporteBase('campo');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('campo');
	}
	
	public function actualizarControllerConReturnGeneral(campo_param_return $campoReturnGeneral) {
		if($campoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescamposAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$campoReturnGeneral->getsMensajeProceso();
		}
		
		if($campoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$campoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($campoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$campoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$campoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($campoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($campoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$campoReturnGeneral->getsFuncionJs();
		}
		
		if($campoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(campo_session $campo_session){
		$this->strStyleDivArbol=$campo_session->strStyleDivArbol;	
		$this->strStyleDivContent=$campo_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$campo_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$campo_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$campo_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$campo_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$campo_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(campo_session $campo_session){
		$campo_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$campo_session->strStyleDivHeader='display:none';			
		$campo_session->strStyleDivContent='width:93%;height:100%';	
		$campo_session->strStyleDivOpcionesBanner='display:none';	
		$campo_session->strStyleDivExpandirColapsar='display:none';	
		$campo_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(campo_control $campo_control_session){
		$this->idNuevo=$campo_control_session->idNuevo;
		$this->campoActual=$campo_control_session->campoActual;
		$this->campo=$campo_control_session->campo;
		$this->campoClase=$campo_control_session->campoClase;
		$this->campos=$campo_control_session->campos;
		$this->camposEliminados=$campo_control_session->camposEliminados;
		$this->campo=$campo_control_session->campo;
		$this->camposReporte=$campo_control_session->camposReporte;
		$this->camposSeleccionados=$campo_control_session->camposSeleccionados;
		$this->arrOrderBy=$campo_control_session->arrOrderBy;
		$this->arrOrderByRel=$campo_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$campo_control_session->arrHistoryWebs;
		$this->arrSessionBases=$campo_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcampo=$campo_control_session->strTypeOnLoadcampo;
		$this->strTipoPaginaAuxiliarcampo=$campo_control_session->strTipoPaginaAuxiliarcampo;
		$this->strTipoUsuarioAuxiliarcampo=$campo_control_session->strTipoUsuarioAuxiliarcampo;	
		
		$this->bitEsPopup=$campo_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$campo_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$campo_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$campo_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$campo_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$campo_control_session->strSufijo;
		$this->bitEsRelaciones=$campo_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$campo_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$campo_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$campo_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$campo_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$campo_control_session->strTituloTabla;
		$this->strTituloPathPagina=$campo_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$campo_control_session->strTituloPathElementoActual;
		
		if($this->campoLogic==null) {			
			$this->campoLogic=new campo_logic();
		}
		
		
		if($this->campoClase==null) {
			$this->campoClase=new campo();	
		}
		
		$this->campoLogic->setcampo($this->campoClase);
		
		
		if($this->campos==null) {
			$this->campos=array();	
		}
		
		$this->campoLogic->setcampos($this->campos);
		
		
		$this->strTipoView=$campo_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$campo_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$campo_control_session->datosCliente;
		$this->strAccionBusqueda=$campo_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$campo_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$campo_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$campo_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$campo_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$campo_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$campo_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$campo_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$campo_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$campo_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$campo_control_session->strTipoPaginacion;
		$this->strTipoAccion=$campo_control_session->strTipoAccion;
		$this->tiposReportes=$campo_control_session->tiposReportes;
		$this->tiposReporte=$campo_control_session->tiposReporte;
		$this->tiposAcciones=$campo_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$campo_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$campo_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$campo_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$campo_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$campo_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$campo_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$campo_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$campo_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$campo_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$campo_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$campo_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$campo_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$campo_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$campo_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$campo_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$campo_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$campo_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$campo_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$campo_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$campo_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$campo_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$campo_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$campo_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$campo_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$campo_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$campo_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$campo_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$campo_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$campo_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$campo_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$campo_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$campo_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$campo_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$campo_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$campo_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$campo_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$campo_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$campo_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$campo_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$campo_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$campo_control_session->resumenUsuarioActual;	
		$this->moduloActual=$campo_control_session->moduloActual;	
		$this->opcionActual=$campo_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$campo_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$campo_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$campo_session=unserialize($this->Session->read(campo_util::$STR_SESSION_NAME));
				
		if($campo_session==null) {
			$campo_session=new campo_session();
		}
		
		$this->strStyleDivArbol=$campo_session->strStyleDivArbol;	
		$this->strStyleDivContent=$campo_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$campo_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$campo_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$campo_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$campo_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$campo_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$campo_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$campo_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$campo_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$campo_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_opcion=$campo_control_session->strMensajeid_opcion;
		$this->strMensajecodigo=$campo_control_session->strMensajecodigo;
		$this->strMensajenombre=$campo_control_session->strMensajenombre;
		$this->strMensajedescripcion=$campo_control_session->strMensajedescripcion;
		$this->strMensajeestado=$campo_control_session->strMensajeestado;
			
		
		$this->opcionsFK=$campo_control_session->opcionsFK;
		$this->idopcionDefaultFK=$campo_control_session->idopcionDefaultFK;
		
		
		$this->strVisibleFK_Idopcion=$campo_control_session->strVisibleFK_Idopcion;
		
		
		$this->strTienePermisosperfil_campo=$campo_control_session->strTienePermisosperfil_campo;
		
		
		$this->id_opcionFK_Idopcion=$campo_control_session->id_opcionFK_Idopcion;

		
		
		
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
	
	public function getcampoControllerAdditional() {
		return $this->campoControllerAdditional;
	}

	public function setcampoControllerAdditional($campoControllerAdditional) {
		$this->campoControllerAdditional = $campoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcampoActual() : campo {
		return $this->campoActual;
	}

	public function setcampoActual(campo $campoActual) {
		$this->campoActual = $campoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcampo() : int {
		return $this->idcampo;
	}

	public function setidcampo(int $idcampo) {
		$this->idcampo = $idcampo;
	}
	
	public function getcampo() : campo {
		return $this->campo;
	}

	public function setcampo(campo $campo) {
		$this->campo = $campo;
	}
		
	public function getcampoLogic() : campo_logic {		
		return $this->campoLogic;
	}

	public function setcampoLogic(campo_logic $campoLogic) {
		$this->campoLogic = $campoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcamposModel() {		
		try {						
			/*camposModel.setWrappedData(campoLogic->getcampos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->camposModel;
	}
	
	public function setcamposModel($camposModel) {
		$this->camposModel = $camposModel;
	}
	
	public function getcampos() : array {		
		return $this->campos;
	}
	
	public function setcampos(array $campos) {
		$this->campos= $campos;
	}
	
	public function getcamposEliminados() : array {		
		return $this->camposEliminados;
	}
	
	public function setcamposEliminados(array $camposEliminados) {
		$this->camposEliminados= $camposEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcampoActualFromListDataModel() {
		try {
			/*$campoClase= $this->camposModel->getRowData();*/
			
			/*return $campo;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
