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

namespace com\bydan\contabilidad\seguridad\parametro_general_usuario\presentation\control;

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

use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/parametro_general_usuario/util/parametro_general_usuario_carga.php');
use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_carga;

use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_util;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_param_return;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\logic\parametro_general_usuario_logic;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\presentation\session\parametro_general_usuario_session;


//FK


use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\seguridad\tipo_fondo\business\entity\tipo_fondo;
use com\bydan\contabilidad\seguridad\tipo_fondo\business\logic\tipo_fondo_logic;
use com\bydan\contabilidad\seguridad\tipo_fondo\util\tipo_fondo_carga;
use com\bydan\contabilidad\seguridad\tipo_fondo\util\tipo_fondo_util;

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\sucursal\util\sucursal_carga;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_carga;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_carga;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
parametro_general_usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
parametro_general_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
parametro_general_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
parametro_general_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*parametro_general_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class parametro_general_usuario_init_control extends ControllerBase {	
	
	public $parametro_general_usuarioClase=null;	
	public $parametro_general_usuariosModel=null;	
	public $parametro_general_usuariosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idparametro_general_usuario=0;	
	public ?int $idparametro_general_usuarioActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $parametro_general_usuarioLogic=null;
	
	public $parametro_general_usuarioActual=null;	
	
	public $parametro_general_usuario=null;
	public $parametro_general_usuarios=null;
	public $parametro_general_usuariosEliminados=array();
	public $parametro_general_usuariosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $parametro_general_usuariosLocal=array();
	public ?array $parametro_general_usuariosReporte=null;
	public ?array $parametro_general_usuariosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadparametro_general_usuario='onload';
	public string $strTipoPaginaAuxiliarparametro_general_usuario='none';
	public string $strTipoUsuarioAuxiliarparametro_general_usuario='none';
		
	public $parametro_general_usuarioReturnGeneral=null;
	public $parametro_general_usuarioParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $parametro_general_usuarioModel=null;
	public $parametro_general_usuarioControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_tipo_fondo='';
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajepath_exportar='';
	public string $strMensajecon_exportar_cabecera='';
	public string $strMensajecon_exportar_campo_version='';
	public string $strMensajecon_botones_tool_bar='';
	public string $strMensajecon_cargar_por_parte='';
	public string $strMensajecon_guardar_relaciones='';
	public string $strMensajecon_mostrar_acciones_campo_general='';
	public string $strMensajecon_mensaje_confirmacion='';
	
	
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idperiodo='display:table-row';
	public string $strVisibleFK_Idsucursal='display:table-row';
	public string $strVisibleFK_Idtipo_fondo='display:table-row';
	public string $strVisibleFK_Idusuarioid='display:table-row';

	
	public array $usuariosFK=array();

	public function getusuariosFK():array {
		return $this->usuariosFK;
	}

	public function setusuariosFK(array $usuariosFK) {
		$this->usuariosFK = $usuariosFK;
	}

	public int $idusuarioDefaultFK=-1;

	public function getIdusuarioDefaultFK():int {
		return $this->idusuarioDefaultFK;
	}

	public function setIdusuarioDefaultFK(int $idusuarioDefaultFK) {
		$this->idusuarioDefaultFK = $idusuarioDefaultFK;
	}

	public array $tipo_fondosFK=array();

	public function gettipo_fondosFK():array {
		return $this->tipo_fondosFK;
	}

	public function settipo_fondosFK(array $tipo_fondosFK) {
		$this->tipo_fondosFK = $tipo_fondosFK;
	}

	public int $idtipo_fondoDefaultFK=-1;

	public function getIdtipo_fondoDefaultFK():int {
		return $this->idtipo_fondoDefaultFK;
	}

	public function setIdtipo_fondoDefaultFK(int $idtipo_fondoDefaultFK) {
		$this->idtipo_fondoDefaultFK = $idtipo_fondoDefaultFK;
	}

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

	public array $sucursalsFK=array();

	public function getsucursalsFK():array {
		return $this->sucursalsFK;
	}

	public function setsucursalsFK(array $sucursalsFK) {
		$this->sucursalsFK = $sucursalsFK;
	}

	public int $idsucursalDefaultFK=-1;

	public function getIdsucursalDefaultFK():int {
		return $this->idsucursalDefaultFK;
	}

	public function setIdsucursalDefaultFK(int $idsucursalDefaultFK) {
		$this->idsucursalDefaultFK = $idsucursalDefaultFK;
	}

	public array $ejerciciosFK=array();

	public function getejerciciosFK():array {
		return $this->ejerciciosFK;
	}

	public function setejerciciosFK(array $ejerciciosFK) {
		$this->ejerciciosFK = $ejerciciosFK;
	}

	public int $idejercicioDefaultFK=-1;

	public function getIdejercicioDefaultFK():int {
		return $this->idejercicioDefaultFK;
	}

	public function setIdejercicioDefaultFK(int $idejercicioDefaultFK) {
		$this->idejercicioDefaultFK = $idejercicioDefaultFK;
	}

	public array $periodosFK=array();

	public function getperiodosFK():array {
		return $this->periodosFK;
	}

	public function setperiodosFK(array $periodosFK) {
		$this->periodosFK = $periodosFK;
	}

	public int $idperiodoDefaultFK=-1;

	public function getIdperiodoDefaultFK():int {
		return $this->idperiodoDefaultFK;
	}

	public function setIdperiodoDefaultFK(int $idperiodoDefaultFK) {
		$this->idperiodoDefaultFK = $idperiodoDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_sucursalFK_Idsucursal=null;

	public  $id_tipo_fondoFK_Idtipo_fondo=null;

	public  $idFK_Idusuarioid=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->parametro_general_usuarioLogic==null) {
				$this->parametro_general_usuarioLogic=new parametro_general_usuario_logic();
			}
			
		} else {
			if($this->parametro_general_usuarioLogic==null) {
				$this->parametro_general_usuarioLogic=new parametro_general_usuario_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->parametro_general_usuarioClase==null) {
				$this->parametro_general_usuarioClase=new parametro_general_usuario();
			}
			
			$this->parametro_general_usuarioClase->setId(-1);	
				
				
			$this->parametro_general_usuarioClase->setid_tipo_fondo(-1);	
			$this->parametro_general_usuarioClase->setid_empresa(-1);	
			$this->parametro_general_usuarioClase->setid_sucursal(-1);	
			$this->parametro_general_usuarioClase->setid_ejercicio(-1);	
			$this->parametro_general_usuarioClase->setid_periodo(-1);	
			$this->parametro_general_usuarioClase->setpath_exportar('');	
			$this->parametro_general_usuarioClase->setcon_exportar_cabecera(false);	
			$this->parametro_general_usuarioClase->setcon_exportar_campo_version(false);	
			$this->parametro_general_usuarioClase->setcon_botones_tool_bar(false);	
			$this->parametro_general_usuarioClase->setcon_cargar_por_parte(false);	
			$this->parametro_general_usuarioClase->setcon_guardar_relaciones(false);	
			$this->parametro_general_usuarioClase->setcon_mostrar_acciones_campo_general(false);	
			$this->parametro_general_usuarioClase->setcon_mensaje_confirmacion(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('parametro_general_usuario');
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
		$this->cargarParametrosReporteBase('parametro_general_usuario');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('parametro_general_usuario');
	}
	
	public function actualizarControllerConReturnGeneral(parametro_general_usuario_param_return $parametro_general_usuarioReturnGeneral) {
		if($parametro_general_usuarioReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesparametro_general_usuariosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$parametro_general_usuarioReturnGeneral->getsMensajeProceso();
		}
		
		if($parametro_general_usuarioReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$parametro_general_usuarioReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($parametro_general_usuarioReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$parametro_general_usuarioReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$parametro_general_usuarioReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($parametro_general_usuarioReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($parametro_general_usuarioReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$parametro_general_usuarioReturnGeneral->getsFuncionJs();
		}
		
		if($parametro_general_usuarioReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(parametro_general_usuario_session $parametro_general_usuario_session){
		$this->strStyleDivArbol=$parametro_general_usuario_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_general_usuario_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_general_usuario_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_general_usuario_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_general_usuario_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_general_usuario_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$parametro_general_usuario_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(parametro_general_usuario_session $parametro_general_usuario_session){
		$parametro_general_usuario_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$parametro_general_usuario_session->strStyleDivHeader='display:none';			
		$parametro_general_usuario_session->strStyleDivContent='width:93%;height:100%';	
		$parametro_general_usuario_session->strStyleDivOpcionesBanner='display:none';	
		$parametro_general_usuario_session->strStyleDivExpandirColapsar='display:none';	
		$parametro_general_usuario_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(parametro_general_usuario_control $parametro_general_usuario_control_session){
		$this->idNuevo=$parametro_general_usuario_control_session->idNuevo;
		$this->parametro_general_usuarioActual=$parametro_general_usuario_control_session->parametro_general_usuarioActual;
		$this->parametro_general_usuario=$parametro_general_usuario_control_session->parametro_general_usuario;
		$this->parametro_general_usuarioClase=$parametro_general_usuario_control_session->parametro_general_usuarioClase;
		$this->parametro_general_usuarios=$parametro_general_usuario_control_session->parametro_general_usuarios;
		$this->parametro_general_usuariosEliminados=$parametro_general_usuario_control_session->parametro_general_usuariosEliminados;
		$this->parametro_general_usuario=$parametro_general_usuario_control_session->parametro_general_usuario;
		$this->parametro_general_usuariosReporte=$parametro_general_usuario_control_session->parametro_general_usuariosReporte;
		$this->parametro_general_usuariosSeleccionados=$parametro_general_usuario_control_session->parametro_general_usuariosSeleccionados;
		$this->arrOrderBy=$parametro_general_usuario_control_session->arrOrderBy;
		$this->arrOrderByRel=$parametro_general_usuario_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$parametro_general_usuario_control_session->arrHistoryWebs;
		$this->arrSessionBases=$parametro_general_usuario_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadparametro_general_usuario=$parametro_general_usuario_control_session->strTypeOnLoadparametro_general_usuario;
		$this->strTipoPaginaAuxiliarparametro_general_usuario=$parametro_general_usuario_control_session->strTipoPaginaAuxiliarparametro_general_usuario;
		$this->strTipoUsuarioAuxiliarparametro_general_usuario=$parametro_general_usuario_control_session->strTipoUsuarioAuxiliarparametro_general_usuario;	
		
		$this->bitEsPopup=$parametro_general_usuario_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$parametro_general_usuario_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$parametro_general_usuario_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$parametro_general_usuario_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$parametro_general_usuario_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$parametro_general_usuario_control_session->strSufijo;
		$this->bitEsRelaciones=$parametro_general_usuario_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$parametro_general_usuario_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$parametro_general_usuario_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$parametro_general_usuario_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$parametro_general_usuario_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$parametro_general_usuario_control_session->strTituloTabla;
		$this->strTituloPathPagina=$parametro_general_usuario_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$parametro_general_usuario_control_session->strTituloPathElementoActual;
		
		if($this->parametro_general_usuarioLogic==null) {			
			$this->parametro_general_usuarioLogic=new parametro_general_usuario_logic();
		}
		
		
		if($this->parametro_general_usuarioClase==null) {
			$this->parametro_general_usuarioClase=new parametro_general_usuario();	
		}
		
		$this->parametro_general_usuarioLogic->setparametro_general_usuario($this->parametro_general_usuarioClase);
		
		
		if($this->parametro_general_usuarios==null) {
			$this->parametro_general_usuarios=array();	
		}
		
		$this->parametro_general_usuarioLogic->setparametro_general_usuarios($this->parametro_general_usuarios);
		
		
		$this->strTipoView=$parametro_general_usuario_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$parametro_general_usuario_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$parametro_general_usuario_control_session->datosCliente;
		$this->strAccionBusqueda=$parametro_general_usuario_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$parametro_general_usuario_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$parametro_general_usuario_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$parametro_general_usuario_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$parametro_general_usuario_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$parametro_general_usuario_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$parametro_general_usuario_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$parametro_general_usuario_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$parametro_general_usuario_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$parametro_general_usuario_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$parametro_general_usuario_control_session->strTipoPaginacion;
		$this->strTipoAccion=$parametro_general_usuario_control_session->strTipoAccion;
		$this->tiposReportes=$parametro_general_usuario_control_session->tiposReportes;
		$this->tiposReporte=$parametro_general_usuario_control_session->tiposReporte;
		$this->tiposAcciones=$parametro_general_usuario_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$parametro_general_usuario_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$parametro_general_usuario_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$parametro_general_usuario_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$parametro_general_usuario_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$parametro_general_usuario_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$parametro_general_usuario_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$parametro_general_usuario_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$parametro_general_usuario_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$parametro_general_usuario_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$parametro_general_usuario_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$parametro_general_usuario_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$parametro_general_usuario_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$parametro_general_usuario_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$parametro_general_usuario_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$parametro_general_usuario_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$parametro_general_usuario_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$parametro_general_usuario_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$parametro_general_usuario_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$parametro_general_usuario_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$parametro_general_usuario_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$parametro_general_usuario_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$parametro_general_usuario_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$parametro_general_usuario_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$parametro_general_usuario_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$parametro_general_usuario_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$parametro_general_usuario_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$parametro_general_usuario_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$parametro_general_usuario_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$parametro_general_usuario_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$parametro_general_usuario_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$parametro_general_usuario_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$parametro_general_usuario_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$parametro_general_usuario_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$parametro_general_usuario_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$parametro_general_usuario_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$parametro_general_usuario_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$parametro_general_usuario_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$parametro_general_usuario_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$parametro_general_usuario_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$parametro_general_usuario_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$parametro_general_usuario_control_session->resumenUsuarioActual;	
		$this->moduloActual=$parametro_general_usuario_control_session->moduloActual;	
		$this->opcionActual=$parametro_general_usuario_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$parametro_general_usuario_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$parametro_general_usuario_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));
				
		if($parametro_general_usuario_session==null) {
			$parametro_general_usuario_session=new parametro_general_usuario_session();
		}
		
		$this->strStyleDivArbol=$parametro_general_usuario_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_general_usuario_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_general_usuario_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_general_usuario_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_general_usuario_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_general_usuario_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$parametro_general_usuario_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$parametro_general_usuario_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$parametro_general_usuario_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$parametro_general_usuario_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$parametro_general_usuario_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_tipo_fondo=$parametro_general_usuario_control_session->strMensajeid_tipo_fondo;
		$this->strMensajeid_empresa=$parametro_general_usuario_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$parametro_general_usuario_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$parametro_general_usuario_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$parametro_general_usuario_control_session->strMensajeid_periodo;
		$this->strMensajepath_exportar=$parametro_general_usuario_control_session->strMensajepath_exportar;
		$this->strMensajecon_exportar_cabecera=$parametro_general_usuario_control_session->strMensajecon_exportar_cabecera;
		$this->strMensajecon_exportar_campo_version=$parametro_general_usuario_control_session->strMensajecon_exportar_campo_version;
		$this->strMensajecon_botones_tool_bar=$parametro_general_usuario_control_session->strMensajecon_botones_tool_bar;
		$this->strMensajecon_cargar_por_parte=$parametro_general_usuario_control_session->strMensajecon_cargar_por_parte;
		$this->strMensajecon_guardar_relaciones=$parametro_general_usuario_control_session->strMensajecon_guardar_relaciones;
		$this->strMensajecon_mostrar_acciones_campo_general=$parametro_general_usuario_control_session->strMensajecon_mostrar_acciones_campo_general;
		$this->strMensajecon_mensaje_confirmacion=$parametro_general_usuario_control_session->strMensajecon_mensaje_confirmacion;
			
		
		$this->usuariosFK=$parametro_general_usuario_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$parametro_general_usuario_control_session->idusuarioDefaultFK;
		$this->tipo_fondosFK=$parametro_general_usuario_control_session->tipo_fondosFK;
		$this->idtipo_fondoDefaultFK=$parametro_general_usuario_control_session->idtipo_fondoDefaultFK;
		$this->empresasFK=$parametro_general_usuario_control_session->empresasFK;
		$this->idempresaDefaultFK=$parametro_general_usuario_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$parametro_general_usuario_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$parametro_general_usuario_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$parametro_general_usuario_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$parametro_general_usuario_control_session->idejercicioDefaultFK;
		$this->periodosFK=$parametro_general_usuario_control_session->periodosFK;
		$this->idperiodoDefaultFK=$parametro_general_usuario_control_session->idperiodoDefaultFK;
		
		
		$this->strVisibleFK_Idejercicio=$parametro_general_usuario_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$parametro_general_usuario_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idperiodo=$parametro_general_usuario_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idsucursal=$parametro_general_usuario_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idtipo_fondo=$parametro_general_usuario_control_session->strVisibleFK_Idtipo_fondo;
		$this->strVisibleFK_Idusuarioid=$parametro_general_usuario_control_session->strVisibleFK_Idusuarioid;
		
		
		
		
		$this->id_ejercicioFK_Idejercicio=$parametro_general_usuario_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$parametro_general_usuario_control_session->id_empresaFK_Idempresa;
		$this->id_periodoFK_Idperiodo=$parametro_general_usuario_control_session->id_periodoFK_Idperiodo;
		$this->id_sucursalFK_Idsucursal=$parametro_general_usuario_control_session->id_sucursalFK_Idsucursal;
		$this->id_tipo_fondoFK_Idtipo_fondo=$parametro_general_usuario_control_session->id_tipo_fondoFK_Idtipo_fondo;
		$this->idFK_Idusuarioid=$parametro_general_usuario_control_session->idFK_Idusuarioid;

		
		
		
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
	
	public function getparametro_general_usuarioControllerAdditional() {
		return $this->parametro_general_usuarioControllerAdditional;
	}

	public function setparametro_general_usuarioControllerAdditional($parametro_general_usuarioControllerAdditional) {
		$this->parametro_general_usuarioControllerAdditional = $parametro_general_usuarioControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getparametro_general_usuarioActual() : parametro_general_usuario {
		return $this->parametro_general_usuarioActual;
	}

	public function setparametro_general_usuarioActual(parametro_general_usuario $parametro_general_usuarioActual) {
		$this->parametro_general_usuarioActual = $parametro_general_usuarioActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidparametro_general_usuario() : int {
		return $this->idparametro_general_usuario;
	}

	public function setidparametro_general_usuario(int $idparametro_general_usuario) {
		$this->idparametro_general_usuario = $idparametro_general_usuario;
	}
	
	public function getparametro_general_usuario() : parametro_general_usuario {
		return $this->parametro_general_usuario;
	}

	public function setparametro_general_usuario(parametro_general_usuario $parametro_general_usuario) {
		$this->parametro_general_usuario = $parametro_general_usuario;
	}
		
	public function getparametro_general_usuarioLogic() : parametro_general_usuario_logic {		
		return $this->parametro_general_usuarioLogic;
	}

	public function setparametro_general_usuarioLogic(parametro_general_usuario_logic $parametro_general_usuarioLogic) {
		$this->parametro_general_usuarioLogic = $parametro_general_usuarioLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getparametro_general_usuariosModel() {		
		try {						
			/*parametro_general_usuariosModel.setWrappedData(parametro_general_usuarioLogic->getparametro_general_usuarios());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->parametro_general_usuariosModel;
	}
	
	public function setparametro_general_usuariosModel($parametro_general_usuariosModel) {
		$this->parametro_general_usuariosModel = $parametro_general_usuariosModel;
	}
	
	public function getparametro_general_usuarios() : array {		
		return $this->parametro_general_usuarios;
	}
	
	public function setparametro_general_usuarios(array $parametro_general_usuarios) {
		$this->parametro_general_usuarios= $parametro_general_usuarios;
	}
	
	public function getparametro_general_usuariosEliminados() : array {		
		return $this->parametro_general_usuariosEliminados;
	}
	
	public function setparametro_general_usuariosEliminados(array $parametro_general_usuariosEliminados) {
		$this->parametro_general_usuariosEliminados= $parametro_general_usuariosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getparametro_general_usuarioActualFromListDataModel() {
		try {
			/*$parametro_general_usuarioClase= $this->parametro_general_usuariosModel->getRowData();*/
			
			/*return $parametro_general_usuario;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
