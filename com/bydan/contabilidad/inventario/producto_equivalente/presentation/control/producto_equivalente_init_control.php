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

namespace com\bydan\contabilidad\inventario\producto_equivalente\presentation\control;

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

use com\bydan\contabilidad\inventario\producto_equivalente\business\entity\producto_equivalente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/producto_equivalente/util/producto_equivalente_carga.php');
use com\bydan\contabilidad\inventario\producto_equivalente\util\producto_equivalente_carga;

use com\bydan\contabilidad\inventario\producto_equivalente\util\producto_equivalente_util;
use com\bydan\contabilidad\inventario\producto_equivalente\util\producto_equivalente_param_return;
use com\bydan\contabilidad\inventario\producto_equivalente\business\logic\producto_equivalente_logic;
use com\bydan\contabilidad\inventario\producto_equivalente\presentation\session\producto_equivalente_session;


//FK


use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
producto_equivalente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
producto_equivalente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
producto_equivalente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
producto_equivalente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*producto_equivalente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class producto_equivalente_init_control extends ControllerBase {	
	
	public $producto_equivalenteClase=null;	
	public $producto_equivalentesModel=null;	
	public $producto_equivalentesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idproducto_equivalente=0;	
	public ?int $idproducto_equivalenteActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $producto_equivalenteLogic=null;
	
	public $producto_equivalenteActual=null;	
	
	public $producto_equivalente=null;
	public $producto_equivalentes=null;
	public $producto_equivalentesEliminados=array();
	public $producto_equivalentesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $producto_equivalentesLocal=array();
	public ?array $producto_equivalentesReporte=null;
	public ?array $producto_equivalentesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadproducto_equivalente='onload';
	public string $strTipoPaginaAuxiliarproducto_equivalente='none';
	public string $strTipoUsuarioAuxiliarproducto_equivalente='none';
		
	public $producto_equivalenteReturnGeneral=null;
	public $producto_equivalenteParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $producto_equivalenteModel=null;
	public $producto_equivalenteControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_producto_principal='';
	public string $strMensajeid_producto_equivalente='';
	public string $strMensajeproducto_id_principal='';
	public string $strMensajeproducto_id_equivalente='';
	public string $strMensajecomentario='';
	
	
	public string $strVisibleFK_Idproducto_equivalente='display:table-row';
	public string $strVisibleFK_Idproducto_principal='display:table-row';

	
	public array $producto_principalsFK=array();

	public function getproducto_principalsFK():array {
		return $this->producto_principalsFK;
	}

	public function setproducto_principalsFK(array $producto_principalsFK) {
		$this->producto_principalsFK = $producto_principalsFK;
	}

	public int $idproducto_principalDefaultFK=-1;

	public function getIdproducto_principalDefaultFK():int {
		return $this->idproducto_principalDefaultFK;
	}

	public function setIdproducto_principalDefaultFK(int $idproducto_principalDefaultFK) {
		$this->idproducto_principalDefaultFK = $idproducto_principalDefaultFK;
	}

	public array $producto_equivalentesFK=array();

	public function getproducto_equivalentesFK():array {
		return $this->producto_equivalentesFK;
	}

	public function setproducto_equivalentesFK(array $producto_equivalentesFK) {
		$this->producto_equivalentesFK = $producto_equivalentesFK;
	}

	public int $idproducto_equivalenteDefaultFK=-1;

	public function getIdproducto_equivalenteDefaultFK():int {
		return $this->idproducto_equivalenteDefaultFK;
	}

	public function setIdproducto_equivalenteDefaultFK(int $idproducto_equivalenteDefaultFK) {
		$this->idproducto_equivalenteDefaultFK = $idproducto_equivalenteDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisosproducto_equivalente='none';
	
	
	public  $id_producto_equivalenteFK_Idproducto_equivalente=null;

	public  $id_producto_principalFK_Idproducto_principal=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->producto_equivalenteLogic==null) {
				$this->producto_equivalenteLogic=new producto_equivalente_logic();
			}
			
		} else {
			if($this->producto_equivalenteLogic==null) {
				$this->producto_equivalenteLogic=new producto_equivalente_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->producto_equivalenteClase==null) {
				$this->producto_equivalenteClase=new producto_equivalente();
			}
			
			$this->producto_equivalenteClase->setId(0);	
				
				
			$this->producto_equivalenteClase->setid_producto_principal(-1);	
			$this->producto_equivalenteClase->setid_producto_equivalente(-1);	
			$this->producto_equivalenteClase->setproducto_id_principal(0);	
			$this->producto_equivalenteClase->setproducto_id_equivalente(0);	
			$this->producto_equivalenteClase->setcomentario('');	
			
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
		$this->prepararEjecutarMantenimientoBase('producto_equivalente');
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
		$this->cargarParametrosReporteBase('producto_equivalente');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('producto_equivalente');
	}
	
	public function actualizarControllerConReturnGeneral(producto_equivalente_param_return $producto_equivalenteReturnGeneral) {
		if($producto_equivalenteReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesproducto_equivalentesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$producto_equivalenteReturnGeneral->getsMensajeProceso();
		}
		
		if($producto_equivalenteReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$producto_equivalenteReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($producto_equivalenteReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$producto_equivalenteReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$producto_equivalenteReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($producto_equivalenteReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($producto_equivalenteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$producto_equivalenteReturnGeneral->getsFuncionJs();
		}
		
		if($producto_equivalenteReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(producto_equivalente_session $producto_equivalente_session){
		$this->strStyleDivArbol=$producto_equivalente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$producto_equivalente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$producto_equivalente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$producto_equivalente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$producto_equivalente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$producto_equivalente_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$producto_equivalente_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(producto_equivalente_session $producto_equivalente_session){
		$producto_equivalente_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$producto_equivalente_session->strStyleDivHeader='display:none';			
		$producto_equivalente_session->strStyleDivContent='width:93%;height:100%';	
		$producto_equivalente_session->strStyleDivOpcionesBanner='display:none';	
		$producto_equivalente_session->strStyleDivExpandirColapsar='display:none';	
		$producto_equivalente_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(producto_equivalente_control $producto_equivalente_control_session){
		$this->idNuevo=$producto_equivalente_control_session->idNuevo;
		$this->producto_equivalenteActual=$producto_equivalente_control_session->producto_equivalenteActual;
		$this->producto_equivalente=$producto_equivalente_control_session->producto_equivalente;
		$this->producto_equivalenteClase=$producto_equivalente_control_session->producto_equivalenteClase;
		$this->producto_equivalentes=$producto_equivalente_control_session->producto_equivalentes;
		$this->producto_equivalentesEliminados=$producto_equivalente_control_session->producto_equivalentesEliminados;
		$this->producto_equivalente=$producto_equivalente_control_session->producto_equivalente;
		$this->producto_equivalentesReporte=$producto_equivalente_control_session->producto_equivalentesReporte;
		$this->producto_equivalentesSeleccionados=$producto_equivalente_control_session->producto_equivalentesSeleccionados;
		$this->arrOrderBy=$producto_equivalente_control_session->arrOrderBy;
		$this->arrOrderByRel=$producto_equivalente_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$producto_equivalente_control_session->arrHistoryWebs;
		$this->arrSessionBases=$producto_equivalente_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadproducto_equivalente=$producto_equivalente_control_session->strTypeOnLoadproducto_equivalente;
		$this->strTipoPaginaAuxiliarproducto_equivalente=$producto_equivalente_control_session->strTipoPaginaAuxiliarproducto_equivalente;
		$this->strTipoUsuarioAuxiliarproducto_equivalente=$producto_equivalente_control_session->strTipoUsuarioAuxiliarproducto_equivalente;	
		
		$this->bitEsPopup=$producto_equivalente_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$producto_equivalente_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$producto_equivalente_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$producto_equivalente_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$producto_equivalente_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$producto_equivalente_control_session->strSufijo;
		$this->bitEsRelaciones=$producto_equivalente_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$producto_equivalente_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$producto_equivalente_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$producto_equivalente_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$producto_equivalente_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$producto_equivalente_control_session->strTituloTabla;
		$this->strTituloPathPagina=$producto_equivalente_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$producto_equivalente_control_session->strTituloPathElementoActual;
		
		if($this->producto_equivalenteLogic==null) {			
			$this->producto_equivalenteLogic=new producto_equivalente_logic();
		}
		
		
		if($this->producto_equivalenteClase==null) {
			$this->producto_equivalenteClase=new producto_equivalente();	
		}
		
		$this->producto_equivalenteLogic->setproducto_equivalente($this->producto_equivalenteClase);
		
		
		if($this->producto_equivalentes==null) {
			$this->producto_equivalentes=array();	
		}
		
		$this->producto_equivalenteLogic->setproducto_equivalentes($this->producto_equivalentes);
		
		
		$this->strTipoView=$producto_equivalente_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$producto_equivalente_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$producto_equivalente_control_session->datosCliente;
		$this->strAccionBusqueda=$producto_equivalente_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$producto_equivalente_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$producto_equivalente_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$producto_equivalente_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$producto_equivalente_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$producto_equivalente_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$producto_equivalente_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$producto_equivalente_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$producto_equivalente_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$producto_equivalente_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$producto_equivalente_control_session->strTipoPaginacion;
		$this->strTipoAccion=$producto_equivalente_control_session->strTipoAccion;
		$this->tiposReportes=$producto_equivalente_control_session->tiposReportes;
		$this->tiposReporte=$producto_equivalente_control_session->tiposReporte;
		$this->tiposAcciones=$producto_equivalente_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$producto_equivalente_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$producto_equivalente_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$producto_equivalente_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$producto_equivalente_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$producto_equivalente_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$producto_equivalente_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$producto_equivalente_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$producto_equivalente_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$producto_equivalente_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$producto_equivalente_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$producto_equivalente_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$producto_equivalente_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$producto_equivalente_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$producto_equivalente_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$producto_equivalente_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$producto_equivalente_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$producto_equivalente_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$producto_equivalente_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$producto_equivalente_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$producto_equivalente_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$producto_equivalente_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$producto_equivalente_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$producto_equivalente_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$producto_equivalente_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$producto_equivalente_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$producto_equivalente_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$producto_equivalente_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$producto_equivalente_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$producto_equivalente_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$producto_equivalente_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$producto_equivalente_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$producto_equivalente_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$producto_equivalente_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$producto_equivalente_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$producto_equivalente_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$producto_equivalente_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$producto_equivalente_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$producto_equivalente_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$producto_equivalente_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$producto_equivalente_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$producto_equivalente_control_session->resumenUsuarioActual;	
		$this->moduloActual=$producto_equivalente_control_session->moduloActual;	
		$this->opcionActual=$producto_equivalente_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$producto_equivalente_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$producto_equivalente_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$producto_equivalente_session=unserialize($this->Session->read(producto_equivalente_util::$STR_SESSION_NAME));
				
		if($producto_equivalente_session==null) {
			$producto_equivalente_session=new producto_equivalente_session();
		}
		
		$this->strStyleDivArbol=$producto_equivalente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$producto_equivalente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$producto_equivalente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$producto_equivalente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$producto_equivalente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$producto_equivalente_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$producto_equivalente_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$producto_equivalente_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$producto_equivalente_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$producto_equivalente_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$producto_equivalente_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_producto_principal=$producto_equivalente_control_session->strMensajeid_producto_principal;
		$this->strMensajeid_producto_equivalente=$producto_equivalente_control_session->strMensajeid_producto_equivalente;
		$this->strMensajeproducto_id_principal=$producto_equivalente_control_session->strMensajeproducto_id_principal;
		$this->strMensajeproducto_id_equivalente=$producto_equivalente_control_session->strMensajeproducto_id_equivalente;
		$this->strMensajecomentario=$producto_equivalente_control_session->strMensajecomentario;
			
		
		$this->producto_principalsFK=$producto_equivalente_control_session->producto_principalsFK;
		$this->idproducto_principalDefaultFK=$producto_equivalente_control_session->idproducto_principalDefaultFK;
		$this->producto_equivalentesFK=$producto_equivalente_control_session->producto_equivalentesFK;
		$this->idproducto_equivalenteDefaultFK=$producto_equivalente_control_session->idproducto_equivalenteDefaultFK;
		
		
		$this->strVisibleFK_Idproducto_equivalente=$producto_equivalente_control_session->strVisibleFK_Idproducto_equivalente;
		$this->strVisibleFK_Idproducto_principal=$producto_equivalente_control_session->strVisibleFK_Idproducto_principal;
		
		
		$this->strTienePermisosproducto_equivalente=$producto_equivalente_control_session->strTienePermisosproducto_equivalente;
		
		
		$this->id_producto_equivalenteFK_Idproducto_equivalente=$producto_equivalente_control_session->id_producto_equivalenteFK_Idproducto_equivalente;
		$this->id_producto_principalFK_Idproducto_principal=$producto_equivalente_control_session->id_producto_principalFK_Idproducto_principal;

		
		
		
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
	
	public function getproducto_equivalenteControllerAdditional() {
		return $this->producto_equivalenteControllerAdditional;
	}

	public function setproducto_equivalenteControllerAdditional($producto_equivalenteControllerAdditional) {
		$this->producto_equivalenteControllerAdditional = $producto_equivalenteControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getproducto_equivalenteActual() : producto_equivalente {
		return $this->producto_equivalenteActual;
	}

	public function setproducto_equivalenteActual(producto_equivalente $producto_equivalenteActual) {
		$this->producto_equivalenteActual = $producto_equivalenteActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidproducto_equivalente() : int {
		return $this->idproducto_equivalente;
	}

	public function setidproducto_equivalente(int $idproducto_equivalente) {
		$this->idproducto_equivalente = $idproducto_equivalente;
	}
	
	public function getproducto_equivalente() : producto_equivalente {
		return $this->producto_equivalente;
	}

	public function setproducto_equivalente(producto_equivalente $producto_equivalente) {
		$this->producto_equivalente = $producto_equivalente;
	}
		
	public function getproducto_equivalenteLogic() : producto_equivalente_logic {		
		return $this->producto_equivalenteLogic;
	}

	public function setproducto_equivalenteLogic(producto_equivalente_logic $producto_equivalenteLogic) {
		$this->producto_equivalenteLogic = $producto_equivalenteLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getproducto_equivalentesModel() {		
		try {						
			/*producto_equivalentesModel.setWrappedData(producto_equivalenteLogic->getproducto_equivalentes());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->producto_equivalentesModel;
	}
	
	public function setproducto_equivalentesModel($producto_equivalentesModel) {
		$this->producto_equivalentesModel = $producto_equivalentesModel;
	}
	
	public function getproducto_equivalentes() : array {		
		return $this->producto_equivalentes;
	}
	
	public function setproducto_equivalentes(array $producto_equivalentes) {
		$this->producto_equivalentes= $producto_equivalentes;
	}
	
	public function getproducto_equivalentesEliminados() : array {		
		return $this->producto_equivalentesEliminados;
	}
	
	public function setproducto_equivalentesEliminados(array $producto_equivalentesEliminados) {
		$this->producto_equivalentesEliminados= $producto_equivalentesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getproducto_equivalenteActualFromListDataModel() {
		try {
			/*$producto_equivalenteClase= $this->producto_equivalentesModel->getRowData();*/
			
			/*return $producto_equivalente;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
