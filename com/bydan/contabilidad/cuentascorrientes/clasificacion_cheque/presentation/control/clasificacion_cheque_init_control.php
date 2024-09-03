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

namespace com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\entity\clasificacion_cheque;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/clasificacion_cheque/util/clasificacion_cheque_carga.php');
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_carga;

use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_util;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_param_return;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\logic\clasificacion_cheque_logic;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\presentation\session\clasificacion_cheque_session;


//FK


use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\entity\cuenta_corriente_detalle;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\logic\cuenta_corriente_detalle_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_util;

use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\entity\categoria_cheque;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\logic\categoria_cheque_logic;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
clasificacion_cheque_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
clasificacion_cheque_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
clasificacion_cheque_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
clasificacion_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*clasificacion_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class clasificacion_cheque_init_control extends ControllerBase {	
	
	public $clasificacion_chequeClase=null;	
	public $clasificacion_chequesModel=null;	
	public $clasificacion_chequesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idclasificacion_cheque=0;	
	public ?int $idclasificacion_chequeActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $clasificacion_chequeLogic=null;
	
	public $clasificacion_chequeActual=null;	
	
	public $clasificacion_cheque=null;
	public $clasificacion_cheques=null;
	public $clasificacion_chequesEliminados=array();
	public $clasificacion_chequesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $clasificacion_chequesLocal=array();
	public ?array $clasificacion_chequesReporte=null;
	public ?array $clasificacion_chequesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadclasificacion_cheque='onload';
	public string $strTipoPaginaAuxiliarclasificacion_cheque='none';
	public string $strTipoUsuarioAuxiliarclasificacion_cheque='none';
		
	public $clasificacion_chequeReturnGeneral=null;
	public $clasificacion_chequeParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $clasificacion_chequeModel=null;
	public $clasificacion_chequeControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_cuenta_corriente_detalle='';
	public string $strMensajeid_categoria_cheque='';
	public string $strMensajemonto='';
	
	
	public string $strVisibleFK_Idcategoria_cheque='display:table-row';
	public string $strVisibleFK_Idcuenta_corriente_detalle='display:table-row';

	
	public array $cuenta_corriente_detallesFK=array();

	public function getcuenta_corriente_detallesFK():array {
		return $this->cuenta_corriente_detallesFK;
	}

	public function setcuenta_corriente_detallesFK(array $cuenta_corriente_detallesFK) {
		$this->cuenta_corriente_detallesFK = $cuenta_corriente_detallesFK;
	}

	public int $idcuenta_corriente_detalleDefaultFK=-1;

	public function getIdcuenta_corriente_detalleDefaultFK():int {
		return $this->idcuenta_corriente_detalleDefaultFK;
	}

	public function setIdcuenta_corriente_detalleDefaultFK(int $idcuenta_corriente_detalleDefaultFK) {
		$this->idcuenta_corriente_detalleDefaultFK = $idcuenta_corriente_detalleDefaultFK;
	}

	public array $categoria_chequesFK=array();

	public function getcategoria_chequesFK():array {
		return $this->categoria_chequesFK;
	}

	public function setcategoria_chequesFK(array $categoria_chequesFK) {
		$this->categoria_chequesFK = $categoria_chequesFK;
	}

	public int $idcategoria_chequeDefaultFK=-1;

	public function getIdcategoria_chequeDefaultFK():int {
		return $this->idcategoria_chequeDefaultFK;
	}

	public function setIdcategoria_chequeDefaultFK(int $idcategoria_chequeDefaultFK) {
		$this->idcategoria_chequeDefaultFK = $idcategoria_chequeDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_categoria_chequeFK_Idcategoria_cheque=null;

	public  $id_cuenta_corriente_detalleFK_Idcuenta_corriente_detalle=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->clasificacion_chequeLogic==null) {
				$this->clasificacion_chequeLogic=new clasificacion_cheque_logic();
			}
			
		} else {
			if($this->clasificacion_chequeLogic==null) {
				$this->clasificacion_chequeLogic=new clasificacion_cheque_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->clasificacion_chequeClase==null) {
				$this->clasificacion_chequeClase=new clasificacion_cheque();
			}
			
			$this->clasificacion_chequeClase->setId(0);	
				
				
			$this->clasificacion_chequeClase->setid_cuenta_corriente_detalle(-1);	
			$this->clasificacion_chequeClase->setid_categoria_cheque(-1);	
			$this->clasificacion_chequeClase->setmonto(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('clasificacion_cheque');
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
		$this->cargarParametrosReporteBase('clasificacion_cheque');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('clasificacion_cheque');
	}
	
	public function actualizarControllerConReturnGeneral(clasificacion_cheque_param_return $clasificacion_chequeReturnGeneral) {
		if($clasificacion_chequeReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesclasificacion_chequesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$clasificacion_chequeReturnGeneral->getsMensajeProceso();
		}
		
		if($clasificacion_chequeReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$clasificacion_chequeReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($clasificacion_chequeReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$clasificacion_chequeReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$clasificacion_chequeReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($clasificacion_chequeReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($clasificacion_chequeReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$clasificacion_chequeReturnGeneral->getsFuncionJs();
		}
		
		if($clasificacion_chequeReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(clasificacion_cheque_session $clasificacion_cheque_session){
		$this->strStyleDivArbol=$clasificacion_cheque_session->strStyleDivArbol;	
		$this->strStyleDivContent=$clasificacion_cheque_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$clasificacion_cheque_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$clasificacion_cheque_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$clasificacion_cheque_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$clasificacion_cheque_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$clasificacion_cheque_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(clasificacion_cheque_session $clasificacion_cheque_session){
		$clasificacion_cheque_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$clasificacion_cheque_session->strStyleDivHeader='display:none';			
		$clasificacion_cheque_session->strStyleDivContent='width:93%;height:100%';	
		$clasificacion_cheque_session->strStyleDivOpcionesBanner='display:none';	
		$clasificacion_cheque_session->strStyleDivExpandirColapsar='display:none';	
		$clasificacion_cheque_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(clasificacion_cheque_control $clasificacion_cheque_control_session){
		$this->idNuevo=$clasificacion_cheque_control_session->idNuevo;
		$this->clasificacion_chequeActual=$clasificacion_cheque_control_session->clasificacion_chequeActual;
		$this->clasificacion_cheque=$clasificacion_cheque_control_session->clasificacion_cheque;
		$this->clasificacion_chequeClase=$clasificacion_cheque_control_session->clasificacion_chequeClase;
		$this->clasificacion_cheques=$clasificacion_cheque_control_session->clasificacion_cheques;
		$this->clasificacion_chequesEliminados=$clasificacion_cheque_control_session->clasificacion_chequesEliminados;
		$this->clasificacion_cheque=$clasificacion_cheque_control_session->clasificacion_cheque;
		$this->clasificacion_chequesReporte=$clasificacion_cheque_control_session->clasificacion_chequesReporte;
		$this->clasificacion_chequesSeleccionados=$clasificacion_cheque_control_session->clasificacion_chequesSeleccionados;
		$this->arrOrderBy=$clasificacion_cheque_control_session->arrOrderBy;
		$this->arrOrderByRel=$clasificacion_cheque_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$clasificacion_cheque_control_session->arrHistoryWebs;
		$this->arrSessionBases=$clasificacion_cheque_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadclasificacion_cheque=$clasificacion_cheque_control_session->strTypeOnLoadclasificacion_cheque;
		$this->strTipoPaginaAuxiliarclasificacion_cheque=$clasificacion_cheque_control_session->strTipoPaginaAuxiliarclasificacion_cheque;
		$this->strTipoUsuarioAuxiliarclasificacion_cheque=$clasificacion_cheque_control_session->strTipoUsuarioAuxiliarclasificacion_cheque;	
		
		$this->bitEsPopup=$clasificacion_cheque_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$clasificacion_cheque_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$clasificacion_cheque_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$clasificacion_cheque_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$clasificacion_cheque_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$clasificacion_cheque_control_session->strSufijo;
		$this->bitEsRelaciones=$clasificacion_cheque_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$clasificacion_cheque_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$clasificacion_cheque_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$clasificacion_cheque_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$clasificacion_cheque_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$clasificacion_cheque_control_session->strTituloTabla;
		$this->strTituloPathPagina=$clasificacion_cheque_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$clasificacion_cheque_control_session->strTituloPathElementoActual;
		
		if($this->clasificacion_chequeLogic==null) {			
			$this->clasificacion_chequeLogic=new clasificacion_cheque_logic();
		}
		
		
		if($this->clasificacion_chequeClase==null) {
			$this->clasificacion_chequeClase=new clasificacion_cheque();	
		}
		
		$this->clasificacion_chequeLogic->setclasificacion_cheque($this->clasificacion_chequeClase);
		
		
		if($this->clasificacion_cheques==null) {
			$this->clasificacion_cheques=array();	
		}
		
		$this->clasificacion_chequeLogic->setclasificacion_cheques($this->clasificacion_cheques);
		
		
		$this->strTipoView=$clasificacion_cheque_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$clasificacion_cheque_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$clasificacion_cheque_control_session->datosCliente;
		$this->strAccionBusqueda=$clasificacion_cheque_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$clasificacion_cheque_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$clasificacion_cheque_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$clasificacion_cheque_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$clasificacion_cheque_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$clasificacion_cheque_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$clasificacion_cheque_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$clasificacion_cheque_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$clasificacion_cheque_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$clasificacion_cheque_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$clasificacion_cheque_control_session->strTipoPaginacion;
		$this->strTipoAccion=$clasificacion_cheque_control_session->strTipoAccion;
		$this->tiposReportes=$clasificacion_cheque_control_session->tiposReportes;
		$this->tiposReporte=$clasificacion_cheque_control_session->tiposReporte;
		$this->tiposAcciones=$clasificacion_cheque_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$clasificacion_cheque_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$clasificacion_cheque_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$clasificacion_cheque_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$clasificacion_cheque_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$clasificacion_cheque_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$clasificacion_cheque_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$clasificacion_cheque_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$clasificacion_cheque_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$clasificacion_cheque_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$clasificacion_cheque_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$clasificacion_cheque_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$clasificacion_cheque_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$clasificacion_cheque_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$clasificacion_cheque_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$clasificacion_cheque_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$clasificacion_cheque_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$clasificacion_cheque_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$clasificacion_cheque_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$clasificacion_cheque_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$clasificacion_cheque_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$clasificacion_cheque_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$clasificacion_cheque_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$clasificacion_cheque_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$clasificacion_cheque_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$clasificacion_cheque_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$clasificacion_cheque_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$clasificacion_cheque_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$clasificacion_cheque_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$clasificacion_cheque_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$clasificacion_cheque_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$clasificacion_cheque_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$clasificacion_cheque_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$clasificacion_cheque_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$clasificacion_cheque_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$clasificacion_cheque_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$clasificacion_cheque_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$clasificacion_cheque_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$clasificacion_cheque_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$clasificacion_cheque_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$clasificacion_cheque_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$clasificacion_cheque_control_session->resumenUsuarioActual;	
		$this->moduloActual=$clasificacion_cheque_control_session->moduloActual;	
		$this->opcionActual=$clasificacion_cheque_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$clasificacion_cheque_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$clasificacion_cheque_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$clasificacion_cheque_session=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME));
				
		if($clasificacion_cheque_session==null) {
			$clasificacion_cheque_session=new clasificacion_cheque_session();
		}
		
		$this->strStyleDivArbol=$clasificacion_cheque_session->strStyleDivArbol;	
		$this->strStyleDivContent=$clasificacion_cheque_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$clasificacion_cheque_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$clasificacion_cheque_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$clasificacion_cheque_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$clasificacion_cheque_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$clasificacion_cheque_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$clasificacion_cheque_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$clasificacion_cheque_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$clasificacion_cheque_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$clasificacion_cheque_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_cuenta_corriente_detalle=$clasificacion_cheque_control_session->strMensajeid_cuenta_corriente_detalle;
		$this->strMensajeid_categoria_cheque=$clasificacion_cheque_control_session->strMensajeid_categoria_cheque;
		$this->strMensajemonto=$clasificacion_cheque_control_session->strMensajemonto;
			
		
		$this->cuenta_corriente_detallesFK=$clasificacion_cheque_control_session->cuenta_corriente_detallesFK;
		$this->idcuenta_corriente_detalleDefaultFK=$clasificacion_cheque_control_session->idcuenta_corriente_detalleDefaultFK;
		$this->categoria_chequesFK=$clasificacion_cheque_control_session->categoria_chequesFK;
		$this->idcategoria_chequeDefaultFK=$clasificacion_cheque_control_session->idcategoria_chequeDefaultFK;
		
		
		$this->strVisibleFK_Idcategoria_cheque=$clasificacion_cheque_control_session->strVisibleFK_Idcategoria_cheque;
		$this->strVisibleFK_Idcuenta_corriente_detalle=$clasificacion_cheque_control_session->strVisibleFK_Idcuenta_corriente_detalle;
		
		
		
		
		$this->id_categoria_chequeFK_Idcategoria_cheque=$clasificacion_cheque_control_session->id_categoria_chequeFK_Idcategoria_cheque;
		$this->id_cuenta_corriente_detalleFK_Idcuenta_corriente_detalle=$clasificacion_cheque_control_session->id_cuenta_corriente_detalleFK_Idcuenta_corriente_detalle;

		
		
		
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
	
	public function getclasificacion_chequeControllerAdditional() {
		return $this->clasificacion_chequeControllerAdditional;
	}

	public function setclasificacion_chequeControllerAdditional($clasificacion_chequeControllerAdditional) {
		$this->clasificacion_chequeControllerAdditional = $clasificacion_chequeControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getclasificacion_chequeActual() : clasificacion_cheque {
		return $this->clasificacion_chequeActual;
	}

	public function setclasificacion_chequeActual(clasificacion_cheque $clasificacion_chequeActual) {
		$this->clasificacion_chequeActual = $clasificacion_chequeActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidclasificacion_cheque() : int {
		return $this->idclasificacion_cheque;
	}

	public function setidclasificacion_cheque(int $idclasificacion_cheque) {
		$this->idclasificacion_cheque = $idclasificacion_cheque;
	}
	
	public function getclasificacion_cheque() : clasificacion_cheque {
		return $this->clasificacion_cheque;
	}

	public function setclasificacion_cheque(clasificacion_cheque $clasificacion_cheque) {
		$this->clasificacion_cheque = $clasificacion_cheque;
	}
		
	public function getclasificacion_chequeLogic() : clasificacion_cheque_logic {		
		return $this->clasificacion_chequeLogic;
	}

	public function setclasificacion_chequeLogic(clasificacion_cheque_logic $clasificacion_chequeLogic) {
		$this->clasificacion_chequeLogic = $clasificacion_chequeLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getclasificacion_chequesModel() {		
		try {						
			/*clasificacion_chequesModel.setWrappedData(clasificacion_chequeLogic->getclasificacion_cheques());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->clasificacion_chequesModel;
	}
	
	public function setclasificacion_chequesModel($clasificacion_chequesModel) {
		$this->clasificacion_chequesModel = $clasificacion_chequesModel;
	}
	
	public function getclasificacion_cheques() : array {		
		return $this->clasificacion_cheques;
	}
	
	public function setclasificacion_cheques(array $clasificacion_cheques) {
		$this->clasificacion_cheques= $clasificacion_cheques;
	}
	
	public function getclasificacion_chequesEliminados() : array {		
		return $this->clasificacion_chequesEliminados;
	}
	
	public function setclasificacion_chequesEliminados(array $clasificacion_chequesEliminados) {
		$this->clasificacion_chequesEliminados= $clasificacion_chequesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getclasificacion_chequeActualFromListDataModel() {
		try {
			/*$clasificacion_chequeClase= $this->clasificacion_chequesModel->getRowData();*/
			
			/*return $clasificacion_cheque;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
