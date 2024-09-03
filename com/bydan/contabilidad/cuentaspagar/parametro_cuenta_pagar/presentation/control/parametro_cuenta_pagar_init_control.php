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

namespace com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\business\entity\parametro_cuenta_pagar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/parametro_cuenta_pagar/util/parametro_cuenta_pagar_carga.php');
use com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\util\parametro_cuenta_pagar_carga;

use com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\util\parametro_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\util\parametro_cuenta_pagar_param_return;
use com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\business\logic\parametro_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\presentation\session\parametro_cuenta_pagar_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
parametro_cuenta_pagar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
parametro_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
parametro_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
parametro_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*parametro_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class parametro_cuenta_pagar_init_control extends ControllerBase {	
	
	public $parametro_cuenta_pagarClase=null;	
	public $parametro_cuenta_pagarsModel=null;	
	public $parametro_cuenta_pagarsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idparametro_cuenta_pagar=0;	
	public ?int $idparametro_cuenta_pagarActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $parametro_cuenta_pagarLogic=null;
	
	public $parametro_cuenta_pagarActual=null;	
	
	public $parametro_cuenta_pagar=null;
	public $parametro_cuenta_pagars=null;
	public $parametro_cuenta_pagarsEliminados=array();
	public $parametro_cuenta_pagarsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $parametro_cuenta_pagarsLocal=array();
	public ?array $parametro_cuenta_pagarsReporte=null;
	public ?array $parametro_cuenta_pagarsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadparametro_cuenta_pagar='onload';
	public string $strTipoPaginaAuxiliarparametro_cuenta_pagar='none';
	public string $strTipoUsuarioAuxiliarparametro_cuenta_pagar='none';
		
	public $parametro_cuenta_pagarReturnGeneral=null;
	public $parametro_cuenta_pagarParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $parametro_cuenta_pagarModel=null;
	public $parametro_cuenta_pagarControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajenumero_cuenta_pagar='';
	public string $strMensajenumero_credito='';
	public string $strMensajenumero_debito='';
	public string $strMensajenumero_pago='';
	public string $strMensajemostrar_anulado='';
	public string $strMensajenumero_proveedor='';
	public string $strMensajecon_proveedor_inactivo='';
	
	
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

	
	
	
	
	
	
	
	
	public  $id_empresaFK_Idempresa=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->parametro_cuenta_pagarLogic==null) {
				$this->parametro_cuenta_pagarLogic=new parametro_cuenta_pagar_logic();
			}
			
		} else {
			if($this->parametro_cuenta_pagarLogic==null) {
				$this->parametro_cuenta_pagarLogic=new parametro_cuenta_pagar_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->parametro_cuenta_pagarClase==null) {
				$this->parametro_cuenta_pagarClase=new parametro_cuenta_pagar();
			}
			
			$this->parametro_cuenta_pagarClase->setId(0);	
				
				
			$this->parametro_cuenta_pagarClase->setid_empresa(-1);	
			$this->parametro_cuenta_pagarClase->setnumero_cuenta_pagar(0);	
			$this->parametro_cuenta_pagarClase->setnumero_credito(0);	
			$this->parametro_cuenta_pagarClase->setnumero_debito(0);	
			$this->parametro_cuenta_pagarClase->setnumero_pago(0);	
			$this->parametro_cuenta_pagarClase->setmostrar_anulado(false);	
			$this->parametro_cuenta_pagarClase->setnumero_proveedor(0);	
			$this->parametro_cuenta_pagarClase->setcon_proveedor_inactivo(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('parametro_cuenta_pagar');
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
		$this->cargarParametrosReporteBase('parametro_cuenta_pagar');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('parametro_cuenta_pagar');
	}
	
	public function actualizarControllerConReturnGeneral(parametro_cuenta_pagar_param_return $parametro_cuenta_pagarReturnGeneral) {
		if($parametro_cuenta_pagarReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesparametro_cuenta_pagarsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$parametro_cuenta_pagarReturnGeneral->getsMensajeProceso();
		}
		
		if($parametro_cuenta_pagarReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$parametro_cuenta_pagarReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($parametro_cuenta_pagarReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$parametro_cuenta_pagarReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$parametro_cuenta_pagarReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($parametro_cuenta_pagarReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($parametro_cuenta_pagarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$parametro_cuenta_pagarReturnGeneral->getsFuncionJs();
		}
		
		if($parametro_cuenta_pagarReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(parametro_cuenta_pagar_session $parametro_cuenta_pagar_session){
		$this->strStyleDivArbol=$parametro_cuenta_pagar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_cuenta_pagar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_cuenta_pagar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_cuenta_pagar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_cuenta_pagar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_cuenta_pagar_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$parametro_cuenta_pagar_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(parametro_cuenta_pagar_session $parametro_cuenta_pagar_session){
		$parametro_cuenta_pagar_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$parametro_cuenta_pagar_session->strStyleDivHeader='display:none';			
		$parametro_cuenta_pagar_session->strStyleDivContent='width:93%;height:100%';	
		$parametro_cuenta_pagar_session->strStyleDivOpcionesBanner='display:none';	
		$parametro_cuenta_pagar_session->strStyleDivExpandirColapsar='display:none';	
		$parametro_cuenta_pagar_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(parametro_cuenta_pagar_control $parametro_cuenta_pagar_control_session){
		$this->idNuevo=$parametro_cuenta_pagar_control_session->idNuevo;
		$this->parametro_cuenta_pagarActual=$parametro_cuenta_pagar_control_session->parametro_cuenta_pagarActual;
		$this->parametro_cuenta_pagar=$parametro_cuenta_pagar_control_session->parametro_cuenta_pagar;
		$this->parametro_cuenta_pagarClase=$parametro_cuenta_pagar_control_session->parametro_cuenta_pagarClase;
		$this->parametro_cuenta_pagars=$parametro_cuenta_pagar_control_session->parametro_cuenta_pagars;
		$this->parametro_cuenta_pagarsEliminados=$parametro_cuenta_pagar_control_session->parametro_cuenta_pagarsEliminados;
		$this->parametro_cuenta_pagar=$parametro_cuenta_pagar_control_session->parametro_cuenta_pagar;
		$this->parametro_cuenta_pagarsReporte=$parametro_cuenta_pagar_control_session->parametro_cuenta_pagarsReporte;
		$this->parametro_cuenta_pagarsSeleccionados=$parametro_cuenta_pagar_control_session->parametro_cuenta_pagarsSeleccionados;
		$this->arrOrderBy=$parametro_cuenta_pagar_control_session->arrOrderBy;
		$this->arrOrderByRel=$parametro_cuenta_pagar_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$parametro_cuenta_pagar_control_session->arrHistoryWebs;
		$this->arrSessionBases=$parametro_cuenta_pagar_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadparametro_cuenta_pagar=$parametro_cuenta_pagar_control_session->strTypeOnLoadparametro_cuenta_pagar;
		$this->strTipoPaginaAuxiliarparametro_cuenta_pagar=$parametro_cuenta_pagar_control_session->strTipoPaginaAuxiliarparametro_cuenta_pagar;
		$this->strTipoUsuarioAuxiliarparametro_cuenta_pagar=$parametro_cuenta_pagar_control_session->strTipoUsuarioAuxiliarparametro_cuenta_pagar;	
		
		$this->bitEsPopup=$parametro_cuenta_pagar_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$parametro_cuenta_pagar_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$parametro_cuenta_pagar_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$parametro_cuenta_pagar_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$parametro_cuenta_pagar_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$parametro_cuenta_pagar_control_session->strSufijo;
		$this->bitEsRelaciones=$parametro_cuenta_pagar_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$parametro_cuenta_pagar_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$parametro_cuenta_pagar_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$parametro_cuenta_pagar_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$parametro_cuenta_pagar_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$parametro_cuenta_pagar_control_session->strTituloTabla;
		$this->strTituloPathPagina=$parametro_cuenta_pagar_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$parametro_cuenta_pagar_control_session->strTituloPathElementoActual;
		
		if($this->parametro_cuenta_pagarLogic==null) {			
			$this->parametro_cuenta_pagarLogic=new parametro_cuenta_pagar_logic();
		}
		
		
		if($this->parametro_cuenta_pagarClase==null) {
			$this->parametro_cuenta_pagarClase=new parametro_cuenta_pagar();	
		}
		
		$this->parametro_cuenta_pagarLogic->setparametro_cuenta_pagar($this->parametro_cuenta_pagarClase);
		
		
		if($this->parametro_cuenta_pagars==null) {
			$this->parametro_cuenta_pagars=array();	
		}
		
		$this->parametro_cuenta_pagarLogic->setparametro_cuenta_pagars($this->parametro_cuenta_pagars);
		
		
		$this->strTipoView=$parametro_cuenta_pagar_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$parametro_cuenta_pagar_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$parametro_cuenta_pagar_control_session->datosCliente;
		$this->strAccionBusqueda=$parametro_cuenta_pagar_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$parametro_cuenta_pagar_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$parametro_cuenta_pagar_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$parametro_cuenta_pagar_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$parametro_cuenta_pagar_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$parametro_cuenta_pagar_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$parametro_cuenta_pagar_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$parametro_cuenta_pagar_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$parametro_cuenta_pagar_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$parametro_cuenta_pagar_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$parametro_cuenta_pagar_control_session->strTipoPaginacion;
		$this->strTipoAccion=$parametro_cuenta_pagar_control_session->strTipoAccion;
		$this->tiposReportes=$parametro_cuenta_pagar_control_session->tiposReportes;
		$this->tiposReporte=$parametro_cuenta_pagar_control_session->tiposReporte;
		$this->tiposAcciones=$parametro_cuenta_pagar_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$parametro_cuenta_pagar_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$parametro_cuenta_pagar_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$parametro_cuenta_pagar_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$parametro_cuenta_pagar_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$parametro_cuenta_pagar_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$parametro_cuenta_pagar_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$parametro_cuenta_pagar_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$parametro_cuenta_pagar_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$parametro_cuenta_pagar_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$parametro_cuenta_pagar_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$parametro_cuenta_pagar_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$parametro_cuenta_pagar_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$parametro_cuenta_pagar_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$parametro_cuenta_pagar_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$parametro_cuenta_pagar_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$parametro_cuenta_pagar_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$parametro_cuenta_pagar_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$parametro_cuenta_pagar_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$parametro_cuenta_pagar_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$parametro_cuenta_pagar_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$parametro_cuenta_pagar_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$parametro_cuenta_pagar_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$parametro_cuenta_pagar_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$parametro_cuenta_pagar_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$parametro_cuenta_pagar_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$parametro_cuenta_pagar_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$parametro_cuenta_pagar_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$parametro_cuenta_pagar_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$parametro_cuenta_pagar_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$parametro_cuenta_pagar_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$parametro_cuenta_pagar_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$parametro_cuenta_pagar_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$parametro_cuenta_pagar_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$parametro_cuenta_pagar_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$parametro_cuenta_pagar_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$parametro_cuenta_pagar_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$parametro_cuenta_pagar_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$parametro_cuenta_pagar_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$parametro_cuenta_pagar_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$parametro_cuenta_pagar_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$parametro_cuenta_pagar_control_session->resumenUsuarioActual;	
		$this->moduloActual=$parametro_cuenta_pagar_control_session->moduloActual;	
		$this->opcionActual=$parametro_cuenta_pagar_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$parametro_cuenta_pagar_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$parametro_cuenta_pagar_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$parametro_cuenta_pagar_session=unserialize($this->Session->read(parametro_cuenta_pagar_util::$STR_SESSION_NAME));
				
		if($parametro_cuenta_pagar_session==null) {
			$parametro_cuenta_pagar_session=new parametro_cuenta_pagar_session();
		}
		
		$this->strStyleDivArbol=$parametro_cuenta_pagar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_cuenta_pagar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_cuenta_pagar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_cuenta_pagar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_cuenta_pagar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_cuenta_pagar_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$parametro_cuenta_pagar_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$parametro_cuenta_pagar_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$parametro_cuenta_pagar_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$parametro_cuenta_pagar_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$parametro_cuenta_pagar_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$parametro_cuenta_pagar_control_session->strMensajeid_empresa;
		$this->strMensajenumero_cuenta_pagar=$parametro_cuenta_pagar_control_session->strMensajenumero_cuenta_pagar;
		$this->strMensajenumero_credito=$parametro_cuenta_pagar_control_session->strMensajenumero_credito;
		$this->strMensajenumero_debito=$parametro_cuenta_pagar_control_session->strMensajenumero_debito;
		$this->strMensajenumero_pago=$parametro_cuenta_pagar_control_session->strMensajenumero_pago;
		$this->strMensajemostrar_anulado=$parametro_cuenta_pagar_control_session->strMensajemostrar_anulado;
		$this->strMensajenumero_proveedor=$parametro_cuenta_pagar_control_session->strMensajenumero_proveedor;
		$this->strMensajecon_proveedor_inactivo=$parametro_cuenta_pagar_control_session->strMensajecon_proveedor_inactivo;
			
		
		$this->empresasFK=$parametro_cuenta_pagar_control_session->empresasFK;
		$this->idempresaDefaultFK=$parametro_cuenta_pagar_control_session->idempresaDefaultFK;
		
		
		$this->strVisibleFK_Idempresa=$parametro_cuenta_pagar_control_session->strVisibleFK_Idempresa;
		
		
		
		
		$this->id_empresaFK_Idempresa=$parametro_cuenta_pagar_control_session->id_empresaFK_Idempresa;

		
		
		
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
	
	public function getparametro_cuenta_pagarControllerAdditional() {
		return $this->parametro_cuenta_pagarControllerAdditional;
	}

	public function setparametro_cuenta_pagarControllerAdditional($parametro_cuenta_pagarControllerAdditional) {
		$this->parametro_cuenta_pagarControllerAdditional = $parametro_cuenta_pagarControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getparametro_cuenta_pagarActual() : parametro_cuenta_pagar {
		return $this->parametro_cuenta_pagarActual;
	}

	public function setparametro_cuenta_pagarActual(parametro_cuenta_pagar $parametro_cuenta_pagarActual) {
		$this->parametro_cuenta_pagarActual = $parametro_cuenta_pagarActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidparametro_cuenta_pagar() : int {
		return $this->idparametro_cuenta_pagar;
	}

	public function setidparametro_cuenta_pagar(int $idparametro_cuenta_pagar) {
		$this->idparametro_cuenta_pagar = $idparametro_cuenta_pagar;
	}
	
	public function getparametro_cuenta_pagar() : parametro_cuenta_pagar {
		return $this->parametro_cuenta_pagar;
	}

	public function setparametro_cuenta_pagar(parametro_cuenta_pagar $parametro_cuenta_pagar) {
		$this->parametro_cuenta_pagar = $parametro_cuenta_pagar;
	}
		
	public function getparametro_cuenta_pagarLogic() : parametro_cuenta_pagar_logic {		
		return $this->parametro_cuenta_pagarLogic;
	}

	public function setparametro_cuenta_pagarLogic(parametro_cuenta_pagar_logic $parametro_cuenta_pagarLogic) {
		$this->parametro_cuenta_pagarLogic = $parametro_cuenta_pagarLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getparametro_cuenta_pagarsModel() {		
		try {						
			/*parametro_cuenta_pagarsModel.setWrappedData(parametro_cuenta_pagarLogic->getparametro_cuenta_pagars());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->parametro_cuenta_pagarsModel;
	}
	
	public function setparametro_cuenta_pagarsModel($parametro_cuenta_pagarsModel) {
		$this->parametro_cuenta_pagarsModel = $parametro_cuenta_pagarsModel;
	}
	
	public function getparametro_cuenta_pagars() : array {		
		return $this->parametro_cuenta_pagars;
	}
	
	public function setparametro_cuenta_pagars(array $parametro_cuenta_pagars) {
		$this->parametro_cuenta_pagars= $parametro_cuenta_pagars;
	}
	
	public function getparametro_cuenta_pagarsEliminados() : array {		
		return $this->parametro_cuenta_pagarsEliminados;
	}
	
	public function setparametro_cuenta_pagarsEliminados(array $parametro_cuenta_pagarsEliminados) {
		$this->parametro_cuenta_pagarsEliminados= $parametro_cuenta_pagarsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getparametro_cuenta_pagarActualFromListDataModel() {
		try {
			/*$parametro_cuenta_pagarClase= $this->parametro_cuenta_pagarsModel->getRowData();*/
			
			/*return $parametro_cuenta_pagar;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
