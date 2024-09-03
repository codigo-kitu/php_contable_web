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

namespace com\bydan\contabilidad\seguridad\perfil_campo\presentation\control;

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

use com\bydan\contabilidad\seguridad\perfil_campo\business\entity\perfil_campo;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/perfil_campo/util/perfil_campo_carga.php');
use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_carga;

use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_util;
use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_param_return;
use com\bydan\contabilidad\seguridad\perfil_campo\business\logic\perfil_campo_logic;
use com\bydan\contabilidad\seguridad\perfil_campo\presentation\session\perfil_campo_session;


//FK


use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\business\logic\perfil_logic;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;

use com\bydan\contabilidad\seguridad\campo\business\entity\campo;
use com\bydan\contabilidad\seguridad\campo\business\logic\campo_logic;
use com\bydan\contabilidad\seguridad\campo\util\campo_carga;
use com\bydan\contabilidad\seguridad\campo\util\campo_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
perfil_campo_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
perfil_campo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
perfil_campo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
perfil_campo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*perfil_campo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class perfil_campo_init_control extends ControllerBase {	
	
	public $perfil_campoClase=null;	
	public $perfil_camposModel=null;	
	public $perfil_camposListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idperfil_campo=0;	
	public ?int $idperfil_campoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $perfil_campoLogic=null;
	
	public $perfil_campoActual=null;	
	
	public $perfil_campo=null;
	public $perfil_campos=null;
	public $perfil_camposEliminados=array();
	public $perfil_camposAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $perfil_camposLocal=array();
	public ?array $perfil_camposReporte=null;
	public ?array $perfil_camposSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadperfil_campo='onload';
	public string $strTipoPaginaAuxiliarperfil_campo='none';
	public string $strTipoUsuarioAuxiliarperfil_campo='none';
		
	public $perfil_campoReturnGeneral=null;
	public $perfil_campoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $perfil_campoModel=null;
	public $perfil_campoControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_perfil='';
	public string $strMensajeid_campo='';
	public string $strMensajetodo='';
	public string $strMensajeingreso='';
	public string $strMensajemodificacion='';
	public string $strMensajeeliminacion='';
	public string $strMensajeconsulta='';
	public string $strMensajeestado='';
	
	
	public string $strVisibleFK_Idcampo='display:table-row';
	public string $strVisibleFK_Idperfil='display:table-row';

	
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

	public array $camposFK=array();

	public function getcamposFK():array {
		return $this->camposFK;
	}

	public function setcamposFK(array $camposFK) {
		$this->camposFK = $camposFK;
	}

	public int $idcampoDefaultFK=-1;

	public function getIdcampoDefaultFK():int {
		return $this->idcampoDefaultFK;
	}

	public function setIdcampoDefaultFK(int $idcampoDefaultFK) {
		$this->idcampoDefaultFK = $idcampoDefaultFK;
	}

	
	
	public $perfil_control=null;
	public $perfil_session=null;
	
	
	//BUSQUEDA INTERNA FK
	public $idperfilActual=0;

	public function getidperfilActual() {
		return $this->idperfilActual;
	}

	public function setidperfilActual($idperfilActual) {
		$this->idperfilActual=$idperfilActual;
	}
	
	
	
	
	public  $id_campoFK_Idcampo=null;

	public  $id_perfilFK_Idperfil=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->perfil_campoLogic==null) {
				$this->perfil_campoLogic=new perfil_campo_logic();
			}
			
		} else {
			if($this->perfil_campoLogic==null) {
				$this->perfil_campoLogic=new perfil_campo_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->perfil_campoClase==null) {
				$this->perfil_campoClase=new perfil_campo();
			}
			
			$this->perfil_campoClase->setId(0);	
				
				
			$this->perfil_campoClase->setid_perfil(-1);	
			$this->perfil_campoClase->setid_campo(-1);	
			$this->perfil_campoClase->settodo(false);	
			$this->perfil_campoClase->setingreso(false);	
			$this->perfil_campoClase->setmodificacion(false);	
			$this->perfil_campoClase->seteliminacion(false);	
			$this->perfil_campoClase->setconsulta(false);	
			$this->perfil_campoClase->setestado(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('perfil_campo');
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
		$this->cargarParametrosReporteBase('perfil_campo');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('perfil_campo');
	}
	
	public function actualizarControllerConReturnGeneral(perfil_campo_param_return $perfil_campoReturnGeneral) {
		if($perfil_campoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesperfil_camposAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$perfil_campoReturnGeneral->getsMensajeProceso();
		}
		
		if($perfil_campoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$perfil_campoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($perfil_campoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$perfil_campoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$perfil_campoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($perfil_campoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($perfil_campoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$perfil_campoReturnGeneral->getsFuncionJs();
		}
		
		if($perfil_campoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(perfil_campo_session $perfil_campo_session){
		$this->strStyleDivArbol=$perfil_campo_session->strStyleDivArbol;	
		$this->strStyleDivContent=$perfil_campo_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$perfil_campo_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$perfil_campo_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$perfil_campo_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$perfil_campo_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$perfil_campo_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(perfil_campo_session $perfil_campo_session){
		$perfil_campo_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$perfil_campo_session->strStyleDivHeader='display:none';			
		$perfil_campo_session->strStyleDivContent='width:93%;height:100%';	
		$perfil_campo_session->strStyleDivOpcionesBanner='display:none';	
		$perfil_campo_session->strStyleDivExpandirColapsar='display:none';	
		$perfil_campo_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(perfil_campo_control $perfil_campo_control_session){
		$this->idNuevo=$perfil_campo_control_session->idNuevo;
		$this->perfil_campoActual=$perfil_campo_control_session->perfil_campoActual;
		$this->perfil_campo=$perfil_campo_control_session->perfil_campo;
		$this->perfil_campoClase=$perfil_campo_control_session->perfil_campoClase;
		$this->perfil_campos=$perfil_campo_control_session->perfil_campos;
		$this->perfil_camposEliminados=$perfil_campo_control_session->perfil_camposEliminados;
		$this->perfil_campo=$perfil_campo_control_session->perfil_campo;
		$this->perfil_camposReporte=$perfil_campo_control_session->perfil_camposReporte;
		$this->perfil_camposSeleccionados=$perfil_campo_control_session->perfil_camposSeleccionados;
		$this->arrOrderBy=$perfil_campo_control_session->arrOrderBy;
		$this->arrOrderByRel=$perfil_campo_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$perfil_campo_control_session->arrHistoryWebs;
		$this->arrSessionBases=$perfil_campo_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadperfil_campo=$perfil_campo_control_session->strTypeOnLoadperfil_campo;
		$this->strTipoPaginaAuxiliarperfil_campo=$perfil_campo_control_session->strTipoPaginaAuxiliarperfil_campo;
		$this->strTipoUsuarioAuxiliarperfil_campo=$perfil_campo_control_session->strTipoUsuarioAuxiliarperfil_campo;	
		
		$this->bitEsPopup=$perfil_campo_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$perfil_campo_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$perfil_campo_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$perfil_campo_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$perfil_campo_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$perfil_campo_control_session->strSufijo;
		$this->bitEsRelaciones=$perfil_campo_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$perfil_campo_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$perfil_campo_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$perfil_campo_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$perfil_campo_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$perfil_campo_control_session->strTituloTabla;
		$this->strTituloPathPagina=$perfil_campo_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$perfil_campo_control_session->strTituloPathElementoActual;
		
		if($this->perfil_campoLogic==null) {			
			$this->perfil_campoLogic=new perfil_campo_logic();
		}
		
		
		if($this->perfil_campoClase==null) {
			$this->perfil_campoClase=new perfil_campo();	
		}
		
		$this->perfil_campoLogic->setperfil_campo($this->perfil_campoClase);
		
		
		if($this->perfil_campos==null) {
			$this->perfil_campos=array();	
		}
		
		$this->perfil_campoLogic->setperfil_campos($this->perfil_campos);
		
		
		$this->strTipoView=$perfil_campo_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$perfil_campo_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$perfil_campo_control_session->datosCliente;
		$this->strAccionBusqueda=$perfil_campo_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$perfil_campo_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$perfil_campo_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$perfil_campo_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$perfil_campo_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$perfil_campo_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$perfil_campo_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$perfil_campo_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$perfil_campo_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$perfil_campo_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$perfil_campo_control_session->strTipoPaginacion;
		$this->strTipoAccion=$perfil_campo_control_session->strTipoAccion;
		$this->tiposReportes=$perfil_campo_control_session->tiposReportes;
		$this->tiposReporte=$perfil_campo_control_session->tiposReporte;
		$this->tiposAcciones=$perfil_campo_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$perfil_campo_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$perfil_campo_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$perfil_campo_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$perfil_campo_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$perfil_campo_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$perfil_campo_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$perfil_campo_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$perfil_campo_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$perfil_campo_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$perfil_campo_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$perfil_campo_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$perfil_campo_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$perfil_campo_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$perfil_campo_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$perfil_campo_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$perfil_campo_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$perfil_campo_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$perfil_campo_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$perfil_campo_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$perfil_campo_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$perfil_campo_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$perfil_campo_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$perfil_campo_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$perfil_campo_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$perfil_campo_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$perfil_campo_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$perfil_campo_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$perfil_campo_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$perfil_campo_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$perfil_campo_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$perfil_campo_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$perfil_campo_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$perfil_campo_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$perfil_campo_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$perfil_campo_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$perfil_campo_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$perfil_campo_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$perfil_campo_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$perfil_campo_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$perfil_campo_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$perfil_campo_control_session->resumenUsuarioActual;	
		$this->moduloActual=$perfil_campo_control_session->moduloActual;	
		$this->opcionActual=$perfil_campo_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$perfil_campo_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$perfil_campo_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$perfil_campo_session=unserialize($this->Session->read(perfil_campo_util::$STR_SESSION_NAME));
				
		if($perfil_campo_session==null) {
			$perfil_campo_session=new perfil_campo_session();
		}
		
		$this->strStyleDivArbol=$perfil_campo_session->strStyleDivArbol;	
		$this->strStyleDivContent=$perfil_campo_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$perfil_campo_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$perfil_campo_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$perfil_campo_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$perfil_campo_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$perfil_campo_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$perfil_campo_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$perfil_campo_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$perfil_campo_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$perfil_campo_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_perfil=$perfil_campo_control_session->strMensajeid_perfil;
		$this->strMensajeid_campo=$perfil_campo_control_session->strMensajeid_campo;
		$this->strMensajetodo=$perfil_campo_control_session->strMensajetodo;
		$this->strMensajeingreso=$perfil_campo_control_session->strMensajeingreso;
		$this->strMensajemodificacion=$perfil_campo_control_session->strMensajemodificacion;
		$this->strMensajeeliminacion=$perfil_campo_control_session->strMensajeeliminacion;
		$this->strMensajeconsulta=$perfil_campo_control_session->strMensajeconsulta;
		$this->strMensajeestado=$perfil_campo_control_session->strMensajeestado;
			
		
		$this->perfilsFK=$perfil_campo_control_session->perfilsFK;
		$this->idperfilDefaultFK=$perfil_campo_control_session->idperfilDefaultFK;
		$this->camposFK=$perfil_campo_control_session->camposFK;
		$this->idcampoDefaultFK=$perfil_campo_control_session->idcampoDefaultFK;
		
		
		$this->strVisibleFK_Idcampo=$perfil_campo_control_session->strVisibleFK_Idcampo;
		$this->strVisibleFK_Idperfil=$perfil_campo_control_session->strVisibleFK_Idperfil;
		
		
		
		
		$this->id_campoFK_Idcampo=$perfil_campo_control_session->id_campoFK_Idcampo;
		$this->id_perfilFK_Idperfil=$perfil_campo_control_session->id_perfilFK_Idperfil;

		
		
		
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
	
	public function getperfil_campoControllerAdditional() {
		return $this->perfil_campoControllerAdditional;
	}

	public function setperfil_campoControllerAdditional($perfil_campoControllerAdditional) {
		$this->perfil_campoControllerAdditional = $perfil_campoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getperfil_campoActual() : perfil_campo {
		return $this->perfil_campoActual;
	}

	public function setperfil_campoActual(perfil_campo $perfil_campoActual) {
		$this->perfil_campoActual = $perfil_campoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidperfil_campo() : int {
		return $this->idperfil_campo;
	}

	public function setidperfil_campo(int $idperfil_campo) {
		$this->idperfil_campo = $idperfil_campo;
	}
	
	public function getperfil_campo() : perfil_campo {
		return $this->perfil_campo;
	}

	public function setperfil_campo(perfil_campo $perfil_campo) {
		$this->perfil_campo = $perfil_campo;
	}
		
	public function getperfil_campoLogic() : perfil_campo_logic {		
		return $this->perfil_campoLogic;
	}

	public function setperfil_campoLogic(perfil_campo_logic $perfil_campoLogic) {
		$this->perfil_campoLogic = $perfil_campoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getperfil_camposModel() {		
		try {						
			/*perfil_camposModel.setWrappedData(perfil_campoLogic->getperfil_campos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->perfil_camposModel;
	}
	
	public function setperfil_camposModel($perfil_camposModel) {
		$this->perfil_camposModel = $perfil_camposModel;
	}
	
	public function getperfil_campos() : array {		
		return $this->perfil_campos;
	}
	
	public function setperfil_campos(array $perfil_campos) {
		$this->perfil_campos= $perfil_campos;
	}
	
	public function getperfil_camposEliminados() : array {		
		return $this->perfil_camposEliminados;
	}
	
	public function setperfil_camposEliminados(array $perfil_camposEliminados) {
		$this->perfil_camposEliminados= $perfil_camposEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getperfil_campoActualFromListDataModel() {
		try {
			/*$perfil_campoClase= $this->perfil_camposModel->getRowData();*/
			
			/*return $perfil_campo;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
