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

namespace com\bydan\contabilidad\inventario\lista_cliente\presentation\control;

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

use com\bydan\contabilidad\inventario\lista_cliente\business\entity\lista_cliente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/lista_cliente/util/lista_cliente_carga.php');
use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_carga;

use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_util;
use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_param_return;
use com\bydan\contabilidad\inventario\lista_cliente\business\logic\lista_cliente_logic;
use com\bydan\contabilidad\inventario\lista_cliente\presentation\session\lista_cliente_session;


//FK


use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
lista_cliente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
lista_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
lista_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
lista_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*lista_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class lista_cliente_init_control extends ControllerBase {	
	
	public $lista_clienteClase=null;	
	public $lista_clientesModel=null;	
	public $lista_clientesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idlista_cliente=0;	
	public ?int $idlista_clienteActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $lista_clienteLogic=null;
	
	public $lista_clienteActual=null;	
	
	public $lista_cliente=null;
	public $lista_clientes=null;
	public $lista_clientesEliminados=array();
	public $lista_clientesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $lista_clientesLocal=array();
	public ?array $lista_clientesReporte=null;
	public ?array $lista_clientesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadlista_cliente='onload';
	public string $strTipoPaginaAuxiliarlista_cliente='none';
	public string $strTipoUsuarioAuxiliarlista_cliente='none';
		
	public $lista_clienteReturnGeneral=null;
	public $lista_clienteParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $lista_clienteModel=null;
	public $lista_clienteControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_cliente='';
	public string $strMensajeid_producto='';
	public string $strMensajeprecio='';
	
	
	public string $strVisibleFK_Idcliente='display:table-row';
	public string $strVisibleFK_Idproducto='display:table-row';

	
	public array $clientesFK=array();

	public function getclientesFK():array {
		return $this->clientesFK;
	}

	public function setclientesFK(array $clientesFK) {
		$this->clientesFK = $clientesFK;
	}

	public int $idclienteDefaultFK=-1;

	public function getIdclienteDefaultFK():int {
		return $this->idclienteDefaultFK;
	}

	public function setIdclienteDefaultFK(int $idclienteDefaultFK) {
		$this->idclienteDefaultFK = $idclienteDefaultFK;
	}

	public array $productosFK=array();

	public function getproductosFK():array {
		return $this->productosFK;
	}

	public function setproductosFK(array $productosFK) {
		$this->productosFK = $productosFK;
	}

	public int $idproductoDefaultFK=-1;

	public function getIdproductoDefaultFK():int {
		return $this->idproductoDefaultFK;
	}

	public function setIdproductoDefaultFK(int $idproductoDefaultFK) {
		$this->idproductoDefaultFK = $idproductoDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_clienteFK_Idcliente=null;

	public  $id_productoFK_Idproducto=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->lista_clienteLogic==null) {
				$this->lista_clienteLogic=new lista_cliente_logic();
			}
			
		} else {
			if($this->lista_clienteLogic==null) {
				$this->lista_clienteLogic=new lista_cliente_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->lista_clienteClase==null) {
				$this->lista_clienteClase=new lista_cliente();
			}
			
			$this->lista_clienteClase->setId(0);	
				
				
			$this->lista_clienteClase->setid_cliente(-1);	
			$this->lista_clienteClase->setid_producto(-1);	
			$this->lista_clienteClase->setprecio(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('lista_cliente');
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
		$this->cargarParametrosReporteBase('lista_cliente');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('lista_cliente');
	}
	
	public function actualizarControllerConReturnGeneral(lista_cliente_param_return $lista_clienteReturnGeneral) {
		if($lista_clienteReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajeslista_clientesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$lista_clienteReturnGeneral->getsMensajeProceso();
		}
		
		if($lista_clienteReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$lista_clienteReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($lista_clienteReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$lista_clienteReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$lista_clienteReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($lista_clienteReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($lista_clienteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$lista_clienteReturnGeneral->getsFuncionJs();
		}
		
		if($lista_clienteReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(lista_cliente_session $lista_cliente_session){
		$this->strStyleDivArbol=$lista_cliente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$lista_cliente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$lista_cliente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$lista_cliente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$lista_cliente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$lista_cliente_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$lista_cliente_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(lista_cliente_session $lista_cliente_session){
		$lista_cliente_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$lista_cliente_session->strStyleDivHeader='display:none';			
		$lista_cliente_session->strStyleDivContent='width:93%;height:100%';	
		$lista_cliente_session->strStyleDivOpcionesBanner='display:none';	
		$lista_cliente_session->strStyleDivExpandirColapsar='display:none';	
		$lista_cliente_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(lista_cliente_control $lista_cliente_control_session){
		$this->idNuevo=$lista_cliente_control_session->idNuevo;
		$this->lista_clienteActual=$lista_cliente_control_session->lista_clienteActual;
		$this->lista_cliente=$lista_cliente_control_session->lista_cliente;
		$this->lista_clienteClase=$lista_cliente_control_session->lista_clienteClase;
		$this->lista_clientes=$lista_cliente_control_session->lista_clientes;
		$this->lista_clientesEliminados=$lista_cliente_control_session->lista_clientesEliminados;
		$this->lista_cliente=$lista_cliente_control_session->lista_cliente;
		$this->lista_clientesReporte=$lista_cliente_control_session->lista_clientesReporte;
		$this->lista_clientesSeleccionados=$lista_cliente_control_session->lista_clientesSeleccionados;
		$this->arrOrderBy=$lista_cliente_control_session->arrOrderBy;
		$this->arrOrderByRel=$lista_cliente_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$lista_cliente_control_session->arrHistoryWebs;
		$this->arrSessionBases=$lista_cliente_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadlista_cliente=$lista_cliente_control_session->strTypeOnLoadlista_cliente;
		$this->strTipoPaginaAuxiliarlista_cliente=$lista_cliente_control_session->strTipoPaginaAuxiliarlista_cliente;
		$this->strTipoUsuarioAuxiliarlista_cliente=$lista_cliente_control_session->strTipoUsuarioAuxiliarlista_cliente;	
		
		$this->bitEsPopup=$lista_cliente_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$lista_cliente_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$lista_cliente_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$lista_cliente_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$lista_cliente_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$lista_cliente_control_session->strSufijo;
		$this->bitEsRelaciones=$lista_cliente_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$lista_cliente_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$lista_cliente_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$lista_cliente_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$lista_cliente_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$lista_cliente_control_session->strTituloTabla;
		$this->strTituloPathPagina=$lista_cliente_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$lista_cliente_control_session->strTituloPathElementoActual;
		
		if($this->lista_clienteLogic==null) {			
			$this->lista_clienteLogic=new lista_cliente_logic();
		}
		
		
		if($this->lista_clienteClase==null) {
			$this->lista_clienteClase=new lista_cliente();	
		}
		
		$this->lista_clienteLogic->setlista_cliente($this->lista_clienteClase);
		
		
		if($this->lista_clientes==null) {
			$this->lista_clientes=array();	
		}
		
		$this->lista_clienteLogic->setlista_clientes($this->lista_clientes);
		
		
		$this->strTipoView=$lista_cliente_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$lista_cliente_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$lista_cliente_control_session->datosCliente;
		$this->strAccionBusqueda=$lista_cliente_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$lista_cliente_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$lista_cliente_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$lista_cliente_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$lista_cliente_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$lista_cliente_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$lista_cliente_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$lista_cliente_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$lista_cliente_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$lista_cliente_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$lista_cliente_control_session->strTipoPaginacion;
		$this->strTipoAccion=$lista_cliente_control_session->strTipoAccion;
		$this->tiposReportes=$lista_cliente_control_session->tiposReportes;
		$this->tiposReporte=$lista_cliente_control_session->tiposReporte;
		$this->tiposAcciones=$lista_cliente_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$lista_cliente_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$lista_cliente_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$lista_cliente_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$lista_cliente_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$lista_cliente_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$lista_cliente_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$lista_cliente_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$lista_cliente_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$lista_cliente_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$lista_cliente_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$lista_cliente_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$lista_cliente_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$lista_cliente_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$lista_cliente_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$lista_cliente_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$lista_cliente_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$lista_cliente_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$lista_cliente_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$lista_cliente_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$lista_cliente_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$lista_cliente_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$lista_cliente_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$lista_cliente_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$lista_cliente_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$lista_cliente_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$lista_cliente_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$lista_cliente_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$lista_cliente_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$lista_cliente_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$lista_cliente_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$lista_cliente_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$lista_cliente_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$lista_cliente_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$lista_cliente_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$lista_cliente_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$lista_cliente_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$lista_cliente_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$lista_cliente_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$lista_cliente_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$lista_cliente_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$lista_cliente_control_session->resumenUsuarioActual;	
		$this->moduloActual=$lista_cliente_control_session->moduloActual;	
		$this->opcionActual=$lista_cliente_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$lista_cliente_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$lista_cliente_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$lista_cliente_session=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME));
				
		if($lista_cliente_session==null) {
			$lista_cliente_session=new lista_cliente_session();
		}
		
		$this->strStyleDivArbol=$lista_cliente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$lista_cliente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$lista_cliente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$lista_cliente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$lista_cliente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$lista_cliente_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$lista_cliente_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$lista_cliente_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$lista_cliente_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$lista_cliente_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$lista_cliente_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_cliente=$lista_cliente_control_session->strMensajeid_cliente;
		$this->strMensajeid_producto=$lista_cliente_control_session->strMensajeid_producto;
		$this->strMensajeprecio=$lista_cliente_control_session->strMensajeprecio;
			
		
		$this->clientesFK=$lista_cliente_control_session->clientesFK;
		$this->idclienteDefaultFK=$lista_cliente_control_session->idclienteDefaultFK;
		$this->productosFK=$lista_cliente_control_session->productosFK;
		$this->idproductoDefaultFK=$lista_cliente_control_session->idproductoDefaultFK;
		
		
		$this->strVisibleFK_Idcliente=$lista_cliente_control_session->strVisibleFK_Idcliente;
		$this->strVisibleFK_Idproducto=$lista_cliente_control_session->strVisibleFK_Idproducto;
		
		
		
		
		$this->id_clienteFK_Idcliente=$lista_cliente_control_session->id_clienteFK_Idcliente;
		$this->id_productoFK_Idproducto=$lista_cliente_control_session->id_productoFK_Idproducto;

		
		
		
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
	
	public function getlista_clienteControllerAdditional() {
		return $this->lista_clienteControllerAdditional;
	}

	public function setlista_clienteControllerAdditional($lista_clienteControllerAdditional) {
		$this->lista_clienteControllerAdditional = $lista_clienteControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getlista_clienteActual() : lista_cliente {
		return $this->lista_clienteActual;
	}

	public function setlista_clienteActual(lista_cliente $lista_clienteActual) {
		$this->lista_clienteActual = $lista_clienteActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidlista_cliente() : int {
		return $this->idlista_cliente;
	}

	public function setidlista_cliente(int $idlista_cliente) {
		$this->idlista_cliente = $idlista_cliente;
	}
	
	public function getlista_cliente() : lista_cliente {
		return $this->lista_cliente;
	}

	public function setlista_cliente(lista_cliente $lista_cliente) {
		$this->lista_cliente = $lista_cliente;
	}
		
	public function getlista_clienteLogic() : lista_cliente_logic {		
		return $this->lista_clienteLogic;
	}

	public function setlista_clienteLogic(lista_cliente_logic $lista_clienteLogic) {
		$this->lista_clienteLogic = $lista_clienteLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getlista_clientesModel() {		
		try {						
			/*lista_clientesModel.setWrappedData(lista_clienteLogic->getlista_clientes());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->lista_clientesModel;
	}
	
	public function setlista_clientesModel($lista_clientesModel) {
		$this->lista_clientesModel = $lista_clientesModel;
	}
	
	public function getlista_clientes() : array {		
		return $this->lista_clientes;
	}
	
	public function setlista_clientes(array $lista_clientes) {
		$this->lista_clientes= $lista_clientes;
	}
	
	public function getlista_clientesEliminados() : array {		
		return $this->lista_clientesEliminados;
	}
	
	public function setlista_clientesEliminados(array $lista_clientesEliminados) {
		$this->lista_clientesEliminados= $lista_clientesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getlista_clienteActualFromListDataModel() {
		try {
			/*$lista_clienteClase= $this->lista_clientesModel->getRowData();*/
			
			/*return $lista_cliente;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
