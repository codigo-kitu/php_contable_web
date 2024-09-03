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

namespace com\bydan\contabilidad\general\tipo_termino_pago\presentation\control;

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

use com\bydan\contabilidad\general\tipo_termino_pago\business\entity\tipo_termino_pago;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/tipo_termino_pago/util/tipo_termino_pago_carga.php');
use com\bydan\contabilidad\general\tipo_termino_pago\util\tipo_termino_pago_carga;

use com\bydan\contabilidad\general\tipo_termino_pago\util\tipo_termino_pago_util;
use com\bydan\contabilidad\general\tipo_termino_pago\util\tipo_termino_pago_param_return;
use com\bydan\contabilidad\general\tipo_termino_pago\business\logic\tipo_termino_pago_logic;
use com\bydan\contabilidad\general\tipo_termino_pago\presentation\session\tipo_termino_pago_session;


//FK


//REL


use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\presentation\session\termino_pago_cliente_session;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\presentation\session\termino_pago_proveedor_session;


/*CARGA ARCHIVOS FRAMEWORK*/
tipo_termino_pago_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
tipo_termino_pago_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
tipo_termino_pago_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
tipo_termino_pago_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*tipo_termino_pago_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class tipo_termino_pago_init_control extends ControllerBase {	
	
	public $tipo_termino_pagoClase=null;	
	public $tipo_termino_pagosModel=null;	
	public $tipo_termino_pagosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idtipo_termino_pago=0;	
	public ?int $idtipo_termino_pagoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $tipo_termino_pagoLogic=null;
	
	public $tipo_termino_pagoActual=null;	
	
	public $tipo_termino_pago=null;
	public $tipo_termino_pagos=null;
	public $tipo_termino_pagosEliminados=array();
	public $tipo_termino_pagosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $tipo_termino_pagosLocal=array();
	public ?array $tipo_termino_pagosReporte=null;
	public ?array $tipo_termino_pagosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadtipo_termino_pago='onload';
	public string $strTipoPaginaAuxiliartipo_termino_pago='none';
	public string $strTipoUsuarioAuxiliartipo_termino_pago='none';
		
	public $tipo_termino_pagoReturnGeneral=null;
	public $tipo_termino_pagoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $tipo_termino_pagoModel=null;
	public $tipo_termino_pagoControllerAdditional=null;
	
	
	

	public $terminopagoclienteLogic=null;

	public function  gettermino_pago_clienteLogic() {
		return $this->terminopagoclienteLogic;
	}

	public function settermino_pago_clienteLogic($terminopagoclienteLogic) {
		$this->terminopagoclienteLogic =$terminopagoclienteLogic;
	}


	public $terminopagoproveedorLogic=null;

	public function  gettermino_pago_proveedorLogic() {
		return $this->terminopagoproveedorLogic;
	}

	public function settermino_pago_proveedorLogic($terminopagoproveedorLogic) {
		$this->terminopagoproveedorLogic =$terminopagoproveedorLogic;
	}
 	
	
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	
	

	
	
	
	
	
	
	
	public $strTienePermisostermino_pago_cliente='none';
	public $strTienePermisostermino_pago_proveedor='none';
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->tipo_termino_pagoLogic==null) {
				$this->tipo_termino_pagoLogic=new tipo_termino_pago_logic();
			}
			
		} else {
			if($this->tipo_termino_pagoLogic==null) {
				$this->tipo_termino_pagoLogic=new tipo_termino_pago_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->tipo_termino_pagoClase==null) {
				$this->tipo_termino_pagoClase=new tipo_termino_pago();
			}
			
			$this->tipo_termino_pagoClase->setId(0);	
				
				
			$this->tipo_termino_pagoClase->setcodigo('');	
			$this->tipo_termino_pagoClase->setnombre('');	
			
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
		$this->prepararEjecutarMantenimientoBase('tipo_termino_pago');
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
		$this->cargarParametrosReporteBase('tipo_termino_pago');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('tipo_termino_pago');
	}
	
	public function actualizarControllerConReturnGeneral(tipo_termino_pago_param_return $tipo_termino_pagoReturnGeneral) {
		if($tipo_termino_pagoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajestipo_termino_pagosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$tipo_termino_pagoReturnGeneral->getsMensajeProceso();
		}
		
		if($tipo_termino_pagoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$tipo_termino_pagoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($tipo_termino_pagoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$tipo_termino_pagoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$tipo_termino_pagoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($tipo_termino_pagoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($tipo_termino_pagoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$tipo_termino_pagoReturnGeneral->getsFuncionJs();
		}
		
		if($tipo_termino_pagoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(tipo_termino_pago_session $tipo_termino_pago_session){
		$this->strStyleDivArbol=$tipo_termino_pago_session->strStyleDivArbol;	
		$this->strStyleDivContent=$tipo_termino_pago_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$tipo_termino_pago_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$tipo_termino_pago_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$tipo_termino_pago_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$tipo_termino_pago_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$tipo_termino_pago_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(tipo_termino_pago_session $tipo_termino_pago_session){
		$tipo_termino_pago_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$tipo_termino_pago_session->strStyleDivHeader='display:none';			
		$tipo_termino_pago_session->strStyleDivContent='width:93%;height:100%';	
		$tipo_termino_pago_session->strStyleDivOpcionesBanner='display:none';	
		$tipo_termino_pago_session->strStyleDivExpandirColapsar='display:none';	
		$tipo_termino_pago_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(tipo_termino_pago_control $tipo_termino_pago_control_session){
		$this->idNuevo=$tipo_termino_pago_control_session->idNuevo;
		$this->tipo_termino_pagoActual=$tipo_termino_pago_control_session->tipo_termino_pagoActual;
		$this->tipo_termino_pago=$tipo_termino_pago_control_session->tipo_termino_pago;
		$this->tipo_termino_pagoClase=$tipo_termino_pago_control_session->tipo_termino_pagoClase;
		$this->tipo_termino_pagos=$tipo_termino_pago_control_session->tipo_termino_pagos;
		$this->tipo_termino_pagosEliminados=$tipo_termino_pago_control_session->tipo_termino_pagosEliminados;
		$this->tipo_termino_pago=$tipo_termino_pago_control_session->tipo_termino_pago;
		$this->tipo_termino_pagosReporte=$tipo_termino_pago_control_session->tipo_termino_pagosReporte;
		$this->tipo_termino_pagosSeleccionados=$tipo_termino_pago_control_session->tipo_termino_pagosSeleccionados;
		$this->arrOrderBy=$tipo_termino_pago_control_session->arrOrderBy;
		$this->arrOrderByRel=$tipo_termino_pago_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$tipo_termino_pago_control_session->arrHistoryWebs;
		$this->arrSessionBases=$tipo_termino_pago_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadtipo_termino_pago=$tipo_termino_pago_control_session->strTypeOnLoadtipo_termino_pago;
		$this->strTipoPaginaAuxiliartipo_termino_pago=$tipo_termino_pago_control_session->strTipoPaginaAuxiliartipo_termino_pago;
		$this->strTipoUsuarioAuxiliartipo_termino_pago=$tipo_termino_pago_control_session->strTipoUsuarioAuxiliartipo_termino_pago;	
		
		$this->bitEsPopup=$tipo_termino_pago_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$tipo_termino_pago_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$tipo_termino_pago_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$tipo_termino_pago_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$tipo_termino_pago_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$tipo_termino_pago_control_session->strSufijo;
		$this->bitEsRelaciones=$tipo_termino_pago_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$tipo_termino_pago_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$tipo_termino_pago_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$tipo_termino_pago_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$tipo_termino_pago_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$tipo_termino_pago_control_session->strTituloTabla;
		$this->strTituloPathPagina=$tipo_termino_pago_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$tipo_termino_pago_control_session->strTituloPathElementoActual;
		
		if($this->tipo_termino_pagoLogic==null) {			
			$this->tipo_termino_pagoLogic=new tipo_termino_pago_logic();
		}
		
		
		if($this->tipo_termino_pagoClase==null) {
			$this->tipo_termino_pagoClase=new tipo_termino_pago();	
		}
		
		$this->tipo_termino_pagoLogic->settipo_termino_pago($this->tipo_termino_pagoClase);
		
		
		if($this->tipo_termino_pagos==null) {
			$this->tipo_termino_pagos=array();	
		}
		
		$this->tipo_termino_pagoLogic->settipo_termino_pagos($this->tipo_termino_pagos);
		
		
		$this->strTipoView=$tipo_termino_pago_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$tipo_termino_pago_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$tipo_termino_pago_control_session->datosCliente;
		$this->strAccionBusqueda=$tipo_termino_pago_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$tipo_termino_pago_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$tipo_termino_pago_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$tipo_termino_pago_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$tipo_termino_pago_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$tipo_termino_pago_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$tipo_termino_pago_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$tipo_termino_pago_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$tipo_termino_pago_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$tipo_termino_pago_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$tipo_termino_pago_control_session->strTipoPaginacion;
		$this->strTipoAccion=$tipo_termino_pago_control_session->strTipoAccion;
		$this->tiposReportes=$tipo_termino_pago_control_session->tiposReportes;
		$this->tiposReporte=$tipo_termino_pago_control_session->tiposReporte;
		$this->tiposAcciones=$tipo_termino_pago_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$tipo_termino_pago_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$tipo_termino_pago_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$tipo_termino_pago_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$tipo_termino_pago_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$tipo_termino_pago_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$tipo_termino_pago_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$tipo_termino_pago_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$tipo_termino_pago_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$tipo_termino_pago_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$tipo_termino_pago_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$tipo_termino_pago_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$tipo_termino_pago_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$tipo_termino_pago_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$tipo_termino_pago_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$tipo_termino_pago_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$tipo_termino_pago_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$tipo_termino_pago_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$tipo_termino_pago_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$tipo_termino_pago_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$tipo_termino_pago_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$tipo_termino_pago_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$tipo_termino_pago_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$tipo_termino_pago_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$tipo_termino_pago_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$tipo_termino_pago_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$tipo_termino_pago_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$tipo_termino_pago_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$tipo_termino_pago_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$tipo_termino_pago_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$tipo_termino_pago_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$tipo_termino_pago_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$tipo_termino_pago_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$tipo_termino_pago_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$tipo_termino_pago_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$tipo_termino_pago_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$tipo_termino_pago_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$tipo_termino_pago_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$tipo_termino_pago_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$tipo_termino_pago_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$tipo_termino_pago_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$tipo_termino_pago_control_session->resumenUsuarioActual;	
		$this->moduloActual=$tipo_termino_pago_control_session->moduloActual;	
		$this->opcionActual=$tipo_termino_pago_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$tipo_termino_pago_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$tipo_termino_pago_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$tipo_termino_pago_session=unserialize($this->Session->read(tipo_termino_pago_util::$STR_SESSION_NAME));
				
		if($tipo_termino_pago_session==null) {
			$tipo_termino_pago_session=new tipo_termino_pago_session();
		}
		
		$this->strStyleDivArbol=$tipo_termino_pago_session->strStyleDivArbol;	
		$this->strStyleDivContent=$tipo_termino_pago_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$tipo_termino_pago_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$tipo_termino_pago_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$tipo_termino_pago_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$tipo_termino_pago_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$tipo_termino_pago_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$tipo_termino_pago_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$tipo_termino_pago_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$tipo_termino_pago_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$tipo_termino_pago_session->strRecargarFkQuery;
		*/
		
		$this->strMensajecodigo=$tipo_termino_pago_control_session->strMensajecodigo;
		$this->strMensajenombre=$tipo_termino_pago_control_session->strMensajenombre;
			
		
		
		
		
		
		$this->strTienePermisostermino_pago_cliente=$tipo_termino_pago_control_session->strTienePermisostermino_pago_cliente;
		$this->strTienePermisostermino_pago_proveedor=$tipo_termino_pago_control_session->strTienePermisostermino_pago_proveedor;
		
		

		
		
		
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
	
	public function gettipo_termino_pagoControllerAdditional() {
		return $this->tipo_termino_pagoControllerAdditional;
	}

	public function settipo_termino_pagoControllerAdditional($tipo_termino_pagoControllerAdditional) {
		$this->tipo_termino_pagoControllerAdditional = $tipo_termino_pagoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function gettipo_termino_pagoActual() : tipo_termino_pago {
		return $this->tipo_termino_pagoActual;
	}

	public function settipo_termino_pagoActual(tipo_termino_pago $tipo_termino_pagoActual) {
		$this->tipo_termino_pagoActual = $tipo_termino_pagoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidtipo_termino_pago() : int {
		return $this->idtipo_termino_pago;
	}

	public function setidtipo_termino_pago(int $idtipo_termino_pago) {
		$this->idtipo_termino_pago = $idtipo_termino_pago;
	}
	
	public function gettipo_termino_pago() : tipo_termino_pago {
		return $this->tipo_termino_pago;
	}

	public function settipo_termino_pago(tipo_termino_pago $tipo_termino_pago) {
		$this->tipo_termino_pago = $tipo_termino_pago;
	}
		
	public function gettipo_termino_pagoLogic() : tipo_termino_pago_logic {		
		return $this->tipo_termino_pagoLogic;
	}

	public function settipo_termino_pagoLogic(tipo_termino_pago_logic $tipo_termino_pagoLogic) {
		$this->tipo_termino_pagoLogic = $tipo_termino_pagoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function gettipo_termino_pagosModel() {		
		try {						
			/*tipo_termino_pagosModel.setWrappedData(tipo_termino_pagoLogic->gettipo_termino_pagos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->tipo_termino_pagosModel;
	}
	
	public function settipo_termino_pagosModel($tipo_termino_pagosModel) {
		$this->tipo_termino_pagosModel = $tipo_termino_pagosModel;
	}
	
	public function gettipo_termino_pagos() : array {		
		return $this->tipo_termino_pagos;
	}
	
	public function settipo_termino_pagos(array $tipo_termino_pagos) {
		$this->tipo_termino_pagos= $tipo_termino_pagos;
	}
	
	public function gettipo_termino_pagosEliminados() : array {		
		return $this->tipo_termino_pagosEliminados;
	}
	
	public function settipo_termino_pagosEliminados(array $tipo_termino_pagosEliminados) {
		$this->tipo_termino_pagosEliminados= $tipo_termino_pagosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function gettipo_termino_pagoActualFromListDataModel() {
		try {
			/*$tipo_termino_pagoClase= $this->tipo_termino_pagosModel->getRowData();*/
			
			/*return $tipo_termino_pago;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
