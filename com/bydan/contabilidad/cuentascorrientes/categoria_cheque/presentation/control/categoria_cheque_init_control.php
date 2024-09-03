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

namespace com\bydan\contabilidad\cuentascorrientes\categoria_cheque\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\entity\categoria_cheque;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/categoria_cheque/util/categoria_cheque_carga.php');
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_carga;

use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_util;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_param_return;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\logic\categoria_cheque_logic;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\presentation\session\categoria_cheque_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL


use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\presentation\session\cheque_cuenta_corriente_session;

use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_util;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\presentation\session\clasificacion_cheque_session;


/*CARGA ARCHIVOS FRAMEWORK*/
categoria_cheque_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
categoria_cheque_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
categoria_cheque_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
categoria_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*categoria_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class categoria_cheque_init_control extends ControllerBase {	
	
	public $categoria_chequeClase=null;	
	public $categoria_chequesModel=null;	
	public $categoria_chequesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcategoria_cheque=0;	
	public ?int $idcategoria_chequeActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $categoria_chequeLogic=null;
	
	public $categoria_chequeActual=null;	
	
	public $categoria_cheque=null;
	public $categoria_cheques=null;
	public $categoria_chequesEliminados=array();
	public $categoria_chequesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $categoria_chequesLocal=array();
	public ?array $categoria_chequesReporte=null;
	public ?array $categoria_chequesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcategoria_cheque='onload';
	public string $strTipoPaginaAuxiliarcategoria_cheque='none';
	public string $strTipoUsuarioAuxiliarcategoria_cheque='none';
		
	public $categoria_chequeReturnGeneral=null;
	public $categoria_chequeParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $categoria_chequeModel=null;
	public $categoria_chequeControllerAdditional=null;
	
	
	

	public $chequecuentacorrienteLogic=null;

	public function  getcheque_cuenta_corrienteLogic() {
		return $this->chequecuentacorrienteLogic;
	}

	public function setcheque_cuenta_corrienteLogic($chequecuentacorrienteLogic) {
		$this->chequecuentacorrienteLogic =$chequecuentacorrienteLogic;
	}


	public $clasificacionchequeLogic=null;

	public function  getclasificacion_chequeLogic() {
		return $this->clasificacionchequeLogic;
	}

	public function setclasificacion_chequeLogic($clasificacionchequeLogic) {
		$this->clasificacionchequeLogic =$clasificacionchequeLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_cuenta='';
	public string $strMensajenombre='';
	public string $strMensajecuenta_contable='';
	public string $strMensajepredeterminado='';
	
	
	public string $strVisibleFK_Idcuenta='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';

	
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

	public array $cuentasFK=array();

	public function getcuentasFK():array {
		return $this->cuentasFK;
	}

	public function setcuentasFK(array $cuentasFK) {
		$this->cuentasFK = $cuentasFK;
	}

	public int $idcuentaDefaultFK=-1;

	public function getIdcuentaDefaultFK():int {
		return $this->idcuentaDefaultFK;
	}

	public function setIdcuentaDefaultFK(int $idcuentaDefaultFK) {
		$this->idcuentaDefaultFK = $idcuentaDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisoscheque_cuenta_corriente='none';
	public $strTienePermisosclasificacion_cheque='none';
	
	
	public  $id_cuentaFK_Idcuenta=null;

	public  $id_empresaFK_Idempresa=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->categoria_chequeLogic==null) {
				$this->categoria_chequeLogic=new categoria_cheque_logic();
			}
			
		} else {
			if($this->categoria_chequeLogic==null) {
				$this->categoria_chequeLogic=new categoria_cheque_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->categoria_chequeClase==null) {
				$this->categoria_chequeClase=new categoria_cheque();
			}
			
			$this->categoria_chequeClase->setId(0);	
				
				
			$this->categoria_chequeClase->setid_empresa(-1);	
			$this->categoria_chequeClase->setid_cuenta(null);	
			$this->categoria_chequeClase->setnombre('');	
			$this->categoria_chequeClase->setcuenta_contable('');	
			$this->categoria_chequeClase->setpredeterminado(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('categoria_cheque');
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
		$this->cargarParametrosReporteBase('categoria_cheque');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('categoria_cheque');
	}
	
	public function actualizarControllerConReturnGeneral(categoria_cheque_param_return $categoria_chequeReturnGeneral) {
		if($categoria_chequeReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescategoria_chequesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$categoria_chequeReturnGeneral->getsMensajeProceso();
		}
		
		if($categoria_chequeReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$categoria_chequeReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($categoria_chequeReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$categoria_chequeReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$categoria_chequeReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($categoria_chequeReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($categoria_chequeReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$categoria_chequeReturnGeneral->getsFuncionJs();
		}
		
		if($categoria_chequeReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(categoria_cheque_session $categoria_cheque_session){
		$this->strStyleDivArbol=$categoria_cheque_session->strStyleDivArbol;	
		$this->strStyleDivContent=$categoria_cheque_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$categoria_cheque_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$categoria_cheque_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$categoria_cheque_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$categoria_cheque_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$categoria_cheque_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(categoria_cheque_session $categoria_cheque_session){
		$categoria_cheque_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$categoria_cheque_session->strStyleDivHeader='display:none';			
		$categoria_cheque_session->strStyleDivContent='width:93%;height:100%';	
		$categoria_cheque_session->strStyleDivOpcionesBanner='display:none';	
		$categoria_cheque_session->strStyleDivExpandirColapsar='display:none';	
		$categoria_cheque_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(categoria_cheque_control $categoria_cheque_control_session){
		$this->idNuevo=$categoria_cheque_control_session->idNuevo;
		$this->categoria_chequeActual=$categoria_cheque_control_session->categoria_chequeActual;
		$this->categoria_cheque=$categoria_cheque_control_session->categoria_cheque;
		$this->categoria_chequeClase=$categoria_cheque_control_session->categoria_chequeClase;
		$this->categoria_cheques=$categoria_cheque_control_session->categoria_cheques;
		$this->categoria_chequesEliminados=$categoria_cheque_control_session->categoria_chequesEliminados;
		$this->categoria_cheque=$categoria_cheque_control_session->categoria_cheque;
		$this->categoria_chequesReporte=$categoria_cheque_control_session->categoria_chequesReporte;
		$this->categoria_chequesSeleccionados=$categoria_cheque_control_session->categoria_chequesSeleccionados;
		$this->arrOrderBy=$categoria_cheque_control_session->arrOrderBy;
		$this->arrOrderByRel=$categoria_cheque_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$categoria_cheque_control_session->arrHistoryWebs;
		$this->arrSessionBases=$categoria_cheque_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcategoria_cheque=$categoria_cheque_control_session->strTypeOnLoadcategoria_cheque;
		$this->strTipoPaginaAuxiliarcategoria_cheque=$categoria_cheque_control_session->strTipoPaginaAuxiliarcategoria_cheque;
		$this->strTipoUsuarioAuxiliarcategoria_cheque=$categoria_cheque_control_session->strTipoUsuarioAuxiliarcategoria_cheque;	
		
		$this->bitEsPopup=$categoria_cheque_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$categoria_cheque_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$categoria_cheque_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$categoria_cheque_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$categoria_cheque_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$categoria_cheque_control_session->strSufijo;
		$this->bitEsRelaciones=$categoria_cheque_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$categoria_cheque_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$categoria_cheque_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$categoria_cheque_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$categoria_cheque_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$categoria_cheque_control_session->strTituloTabla;
		$this->strTituloPathPagina=$categoria_cheque_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$categoria_cheque_control_session->strTituloPathElementoActual;
		
		if($this->categoria_chequeLogic==null) {			
			$this->categoria_chequeLogic=new categoria_cheque_logic();
		}
		
		
		if($this->categoria_chequeClase==null) {
			$this->categoria_chequeClase=new categoria_cheque();	
		}
		
		$this->categoria_chequeLogic->setcategoria_cheque($this->categoria_chequeClase);
		
		
		if($this->categoria_cheques==null) {
			$this->categoria_cheques=array();	
		}
		
		$this->categoria_chequeLogic->setcategoria_cheques($this->categoria_cheques);
		
		
		$this->strTipoView=$categoria_cheque_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$categoria_cheque_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$categoria_cheque_control_session->datosCliente;
		$this->strAccionBusqueda=$categoria_cheque_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$categoria_cheque_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$categoria_cheque_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$categoria_cheque_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$categoria_cheque_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$categoria_cheque_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$categoria_cheque_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$categoria_cheque_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$categoria_cheque_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$categoria_cheque_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$categoria_cheque_control_session->strTipoPaginacion;
		$this->strTipoAccion=$categoria_cheque_control_session->strTipoAccion;
		$this->tiposReportes=$categoria_cheque_control_session->tiposReportes;
		$this->tiposReporte=$categoria_cheque_control_session->tiposReporte;
		$this->tiposAcciones=$categoria_cheque_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$categoria_cheque_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$categoria_cheque_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$categoria_cheque_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$categoria_cheque_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$categoria_cheque_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$categoria_cheque_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$categoria_cheque_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$categoria_cheque_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$categoria_cheque_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$categoria_cheque_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$categoria_cheque_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$categoria_cheque_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$categoria_cheque_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$categoria_cheque_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$categoria_cheque_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$categoria_cheque_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$categoria_cheque_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$categoria_cheque_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$categoria_cheque_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$categoria_cheque_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$categoria_cheque_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$categoria_cheque_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$categoria_cheque_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$categoria_cheque_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$categoria_cheque_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$categoria_cheque_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$categoria_cheque_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$categoria_cheque_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$categoria_cheque_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$categoria_cheque_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$categoria_cheque_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$categoria_cheque_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$categoria_cheque_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$categoria_cheque_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$categoria_cheque_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$categoria_cheque_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$categoria_cheque_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$categoria_cheque_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$categoria_cheque_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$categoria_cheque_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$categoria_cheque_control_session->resumenUsuarioActual;	
		$this->moduloActual=$categoria_cheque_control_session->moduloActual;	
		$this->opcionActual=$categoria_cheque_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$categoria_cheque_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$categoria_cheque_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$categoria_cheque_session=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME));
				
		if($categoria_cheque_session==null) {
			$categoria_cheque_session=new categoria_cheque_session();
		}
		
		$this->strStyleDivArbol=$categoria_cheque_session->strStyleDivArbol;	
		$this->strStyleDivContent=$categoria_cheque_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$categoria_cheque_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$categoria_cheque_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$categoria_cheque_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$categoria_cheque_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$categoria_cheque_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$categoria_cheque_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$categoria_cheque_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$categoria_cheque_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$categoria_cheque_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$categoria_cheque_control_session->strMensajeid_empresa;
		$this->strMensajeid_cuenta=$categoria_cheque_control_session->strMensajeid_cuenta;
		$this->strMensajenombre=$categoria_cheque_control_session->strMensajenombre;
		$this->strMensajecuenta_contable=$categoria_cheque_control_session->strMensajecuenta_contable;
		$this->strMensajepredeterminado=$categoria_cheque_control_session->strMensajepredeterminado;
			
		
		$this->empresasFK=$categoria_cheque_control_session->empresasFK;
		$this->idempresaDefaultFK=$categoria_cheque_control_session->idempresaDefaultFK;
		$this->cuentasFK=$categoria_cheque_control_session->cuentasFK;
		$this->idcuentaDefaultFK=$categoria_cheque_control_session->idcuentaDefaultFK;
		
		
		$this->strVisibleFK_Idcuenta=$categoria_cheque_control_session->strVisibleFK_Idcuenta;
		$this->strVisibleFK_Idempresa=$categoria_cheque_control_session->strVisibleFK_Idempresa;
		
		
		$this->strTienePermisoscheque_cuenta_corriente=$categoria_cheque_control_session->strTienePermisoscheque_cuenta_corriente;
		$this->strTienePermisosclasificacion_cheque=$categoria_cheque_control_session->strTienePermisosclasificacion_cheque;
		
		
		$this->id_cuentaFK_Idcuenta=$categoria_cheque_control_session->id_cuentaFK_Idcuenta;
		$this->id_empresaFK_Idempresa=$categoria_cheque_control_session->id_empresaFK_Idempresa;

		
		
		
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
	
	public function getcategoria_chequeControllerAdditional() {
		return $this->categoria_chequeControllerAdditional;
	}

	public function setcategoria_chequeControllerAdditional($categoria_chequeControllerAdditional) {
		$this->categoria_chequeControllerAdditional = $categoria_chequeControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcategoria_chequeActual() : categoria_cheque {
		return $this->categoria_chequeActual;
	}

	public function setcategoria_chequeActual(categoria_cheque $categoria_chequeActual) {
		$this->categoria_chequeActual = $categoria_chequeActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcategoria_cheque() : int {
		return $this->idcategoria_cheque;
	}

	public function setidcategoria_cheque(int $idcategoria_cheque) {
		$this->idcategoria_cheque = $idcategoria_cheque;
	}
	
	public function getcategoria_cheque() : categoria_cheque {
		return $this->categoria_cheque;
	}

	public function setcategoria_cheque(categoria_cheque $categoria_cheque) {
		$this->categoria_cheque = $categoria_cheque;
	}
		
	public function getcategoria_chequeLogic() : categoria_cheque_logic {		
		return $this->categoria_chequeLogic;
	}

	public function setcategoria_chequeLogic(categoria_cheque_logic $categoria_chequeLogic) {
		$this->categoria_chequeLogic = $categoria_chequeLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcategoria_chequesModel() {		
		try {						
			/*categoria_chequesModel.setWrappedData(categoria_chequeLogic->getcategoria_cheques());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->categoria_chequesModel;
	}
	
	public function setcategoria_chequesModel($categoria_chequesModel) {
		$this->categoria_chequesModel = $categoria_chequesModel;
	}
	
	public function getcategoria_cheques() : array {		
		return $this->categoria_cheques;
	}
	
	public function setcategoria_cheques(array $categoria_cheques) {
		$this->categoria_cheques= $categoria_cheques;
	}
	
	public function getcategoria_chequesEliminados() : array {		
		return $this->categoria_chequesEliminados;
	}
	
	public function setcategoria_chequesEliminados(array $categoria_chequesEliminados) {
		$this->categoria_chequesEliminados= $categoria_chequesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcategoria_chequeActualFromListDataModel() {
		try {
			/*$categoria_chequeClase= $this->categoria_chequesModel->getRowData();*/
			
			/*return $categoria_cheque;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
