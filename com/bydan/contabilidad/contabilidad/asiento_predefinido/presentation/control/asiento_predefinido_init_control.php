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

namespace com\bydan\contabilidad\contabilidad\asiento_predefinido\presentation\control;

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

use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\entity\asiento_predefinido;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/asiento_predefinido/util/asiento_predefinido_carga.php');
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_carga;

use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_param_return;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\logic\asiento_predefinido_logic;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\presentation\session\asiento_predefinido_session;


//FK


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

use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\modulo\business\logic\modulo_logic;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;

use com\bydan\contabilidad\contabilidad\fuente\business\entity\fuente;
use com\bydan\contabilidad\contabilidad\fuente\business\logic\fuente_logic;
use com\bydan\contabilidad\contabilidad\fuente\util\fuente_carga;
use com\bydan\contabilidad\contabilidad\fuente\util\fuente_util;

use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\logic\libro_auxiliar_logic;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_carga;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_util;

use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;
use com\bydan\contabilidad\contabilidad\centro_costo\business\logic\centro_costo_logic;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_carga;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_util;

use com\bydan\contabilidad\contabilidad\documento_contable\business\entity\documento_contable;
use com\bydan\contabilidad\contabilidad\documento_contable\business\logic\documento_contable_logic;
use com\bydan\contabilidad\contabilidad\documento_contable\util\documento_contable_carga;
use com\bydan\contabilidad\contabilidad\documento_contable\util\documento_contable_util;

//REL


use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_util;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\presentation\session\asiento_predefinido_detalle_session;

use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;
use com\bydan\contabilidad\contabilidad\asiento\presentation\session\asiento_session;


/*CARGA ARCHIVOS FRAMEWORK*/
asiento_predefinido_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
asiento_predefinido_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
asiento_predefinido_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
asiento_predefinido_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*asiento_predefinido_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class asiento_predefinido_init_control extends ControllerBase {	
	
	public $asiento_predefinidoClase=null;	
	public $asiento_predefinidosModel=null;	
	public $asiento_predefinidosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idasiento_predefinido=0;	
	public ?int $idasiento_predefinidoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $asiento_predefinidoLogic=null;
	
	public $asiento_predefinidoActual=null;	
	
	public $asiento_predefinido=null;
	public $asiento_predefinidos=null;
	public $asiento_predefinidosEliminados=array();
	public $asiento_predefinidosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $asiento_predefinidosLocal=array();
	public ?array $asiento_predefinidosReporte=null;
	public ?array $asiento_predefinidosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadasiento_predefinido='onload';
	public string $strTipoPaginaAuxiliarasiento_predefinido='none';
	public string $strTipoUsuarioAuxiliarasiento_predefinido='none';
		
	public $asiento_predefinidoReturnGeneral=null;
	public $asiento_predefinidoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $asiento_predefinidoModel=null;
	public $asiento_predefinidoControllerAdditional=null;
	
	
	

	public $asientopredefinidodetalleLogic=null;

	public function  getasiento_predefinido_detalleLogic() {
		return $this->asientopredefinidodetalleLogic;
	}

	public function setasiento_predefinido_detalleLogic($asientopredefinidodetalleLogic) {
		$this->asientopredefinidodetalleLogic =$asientopredefinidodetalleLogic;
	}


	public $asientoLogic=null;

	public function  getasientoLogic() {
		return $this->asientoLogic;
	}

	public function setasientoLogic($asientoLogic) {
		$this->asientoLogic =$asientoLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajeid_modulo='';
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	public string $strMensajeid_fuente='';
	public string $strMensajeid_libro_auxiliar='';
	public string $strMensajeid_centro_costo='';
	public string $strMensajeid_documento_contable='';
	public string $strMensajedescripcion='';
	public string $strMensajenro_nit='';
	public string $strMensajereferencia='';
	
	
	public string $strVisibleFK_Idcentro_costo='display:table-row';
	public string $strVisibleFK_Iddocumento_contable='display:table-row';
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idfuente='display:table-row';
	public string $strVisibleFK_Idlibro_auxiliar='display:table-row';
	public string $strVisibleFK_Idmodulo='display:table-row';
	public string $strVisibleFK_Idperiodo='display:table-row';
	public string $strVisibleFK_Idsucursal='display:table-row';
	public string $strVisibleFK_Idusuario='display:table-row';

	
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

	public array $modulosFK=array();

	public function getmodulosFK():array {
		return $this->modulosFK;
	}

	public function setmodulosFK(array $modulosFK) {
		$this->modulosFK = $modulosFK;
	}

	public int $idmoduloDefaultFK=-1;

	public function getIdmoduloDefaultFK():int {
		return $this->idmoduloDefaultFK;
	}

	public function setIdmoduloDefaultFK(int $idmoduloDefaultFK) {
		$this->idmoduloDefaultFK = $idmoduloDefaultFK;
	}

	public array $fuentesFK=array();

	public function getfuentesFK():array {
		return $this->fuentesFK;
	}

	public function setfuentesFK(array $fuentesFK) {
		$this->fuentesFK = $fuentesFK;
	}

	public int $idfuenteDefaultFK=-1;

	public function getIdfuenteDefaultFK():int {
		return $this->idfuenteDefaultFK;
	}

	public function setIdfuenteDefaultFK(int $idfuenteDefaultFK) {
		$this->idfuenteDefaultFK = $idfuenteDefaultFK;
	}

	public array $libro_auxiliarsFK=array();

	public function getlibro_auxiliarsFK():array {
		return $this->libro_auxiliarsFK;
	}

	public function setlibro_auxiliarsFK(array $libro_auxiliarsFK) {
		$this->libro_auxiliarsFK = $libro_auxiliarsFK;
	}

	public int $idlibro_auxiliarDefaultFK=-1;

	public function getIdlibro_auxiliarDefaultFK():int {
		return $this->idlibro_auxiliarDefaultFK;
	}

	public function setIdlibro_auxiliarDefaultFK(int $idlibro_auxiliarDefaultFK) {
		$this->idlibro_auxiliarDefaultFK = $idlibro_auxiliarDefaultFK;
	}

	public array $centro_costosFK=array();

	public function getcentro_costosFK():array {
		return $this->centro_costosFK;
	}

	public function setcentro_costosFK(array $centro_costosFK) {
		$this->centro_costosFK = $centro_costosFK;
	}

	public int $idcentro_costoDefaultFK=-1;

	public function getIdcentro_costoDefaultFK():int {
		return $this->idcentro_costoDefaultFK;
	}

	public function setIdcentro_costoDefaultFK(int $idcentro_costoDefaultFK) {
		$this->idcentro_costoDefaultFK = $idcentro_costoDefaultFK;
	}

	public array $documento_contablesFK=array();

	public function getdocumento_contablesFK():array {
		return $this->documento_contablesFK;
	}

	public function setdocumento_contablesFK(array $documento_contablesFK) {
		$this->documento_contablesFK = $documento_contablesFK;
	}

	public int $iddocumento_contableDefaultFK=-1;

	public function getIddocumento_contableDefaultFK():int {
		return $this->iddocumento_contableDefaultFK;
	}

	public function setIddocumento_contableDefaultFK(int $iddocumento_contableDefaultFK) {
		$this->iddocumento_contableDefaultFK = $iddocumento_contableDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisosasiento_predefinido_detalle='none';
	public $strTienePermisosasiento='none';
	
	
	public  $id_centro_costoFK_Idcentro_costo=null;

	public  $id_documento_contableFK_Iddocumento_contable=null;

	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_fuenteFK_Idfuente=null;

	public  $id_libro_auxiliarFK_Idlibro_auxiliar=null;

	public  $id_moduloFK_Idmodulo=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_sucursalFK_Idsucursal=null;

	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->asiento_predefinidoLogic==null) {
				$this->asiento_predefinidoLogic=new asiento_predefinido_logic();
			}
			
		} else {
			if($this->asiento_predefinidoLogic==null) {
				$this->asiento_predefinidoLogic=new asiento_predefinido_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->asiento_predefinidoClase==null) {
				$this->asiento_predefinidoClase=new asiento_predefinido();
			}
			
			$this->asiento_predefinidoClase->setId(0);	
				
				
			$this->asiento_predefinidoClase->setid_empresa(-1);	
			$this->asiento_predefinidoClase->setid_sucursal(-1);	
			$this->asiento_predefinidoClase->setid_ejercicio(-1);	
			$this->asiento_predefinidoClase->setid_periodo(-1);	
			$this->asiento_predefinidoClase->setid_usuario(-1);	
			$this->asiento_predefinidoClase->setid_modulo(-1);	
			$this->asiento_predefinidoClase->setcodigo('');	
			$this->asiento_predefinidoClase->setnombre('');	
			$this->asiento_predefinidoClase->setid_fuente(-1);	
			$this->asiento_predefinidoClase->setid_libro_auxiliar(-1);	
			$this->asiento_predefinidoClase->setid_centro_costo(-1);	
			$this->asiento_predefinidoClase->setid_documento_contable(-1);	
			$this->asiento_predefinidoClase->setdescripcion('');	
			$this->asiento_predefinidoClase->setnro_nit('');	
			$this->asiento_predefinidoClase->setreferencia('');	
			
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
		$this->prepararEjecutarMantenimientoBase('asiento_predefinido');
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
		$this->cargarParametrosReporteBase('asiento_predefinido');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('asiento_predefinido');
	}
	
	public function actualizarControllerConReturnGeneral(asiento_predefinido_param_return $asiento_predefinidoReturnGeneral) {
		if($asiento_predefinidoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesasiento_predefinidosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$asiento_predefinidoReturnGeneral->getsMensajeProceso();
		}
		
		if($asiento_predefinidoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$asiento_predefinidoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($asiento_predefinidoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$asiento_predefinidoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$asiento_predefinidoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($asiento_predefinidoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($asiento_predefinidoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$asiento_predefinidoReturnGeneral->getsFuncionJs();
		}
		
		if($asiento_predefinidoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(asiento_predefinido_session $asiento_predefinido_session){
		$this->strStyleDivArbol=$asiento_predefinido_session->strStyleDivArbol;	
		$this->strStyleDivContent=$asiento_predefinido_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$asiento_predefinido_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$asiento_predefinido_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$asiento_predefinido_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$asiento_predefinido_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$asiento_predefinido_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(asiento_predefinido_session $asiento_predefinido_session){
		$asiento_predefinido_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$asiento_predefinido_session->strStyleDivHeader='display:none';			
		$asiento_predefinido_session->strStyleDivContent='width:93%;height:100%';	
		$asiento_predefinido_session->strStyleDivOpcionesBanner='display:none';	
		$asiento_predefinido_session->strStyleDivExpandirColapsar='display:none';	
		$asiento_predefinido_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(asiento_predefinido_control $asiento_predefinido_control_session){
		$this->idNuevo=$asiento_predefinido_control_session->idNuevo;
		$this->asiento_predefinidoActual=$asiento_predefinido_control_session->asiento_predefinidoActual;
		$this->asiento_predefinido=$asiento_predefinido_control_session->asiento_predefinido;
		$this->asiento_predefinidoClase=$asiento_predefinido_control_session->asiento_predefinidoClase;
		$this->asiento_predefinidos=$asiento_predefinido_control_session->asiento_predefinidos;
		$this->asiento_predefinidosEliminados=$asiento_predefinido_control_session->asiento_predefinidosEliminados;
		$this->asiento_predefinido=$asiento_predefinido_control_session->asiento_predefinido;
		$this->asiento_predefinidosReporte=$asiento_predefinido_control_session->asiento_predefinidosReporte;
		$this->asiento_predefinidosSeleccionados=$asiento_predefinido_control_session->asiento_predefinidosSeleccionados;
		$this->arrOrderBy=$asiento_predefinido_control_session->arrOrderBy;
		$this->arrOrderByRel=$asiento_predefinido_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$asiento_predefinido_control_session->arrHistoryWebs;
		$this->arrSessionBases=$asiento_predefinido_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadasiento_predefinido=$asiento_predefinido_control_session->strTypeOnLoadasiento_predefinido;
		$this->strTipoPaginaAuxiliarasiento_predefinido=$asiento_predefinido_control_session->strTipoPaginaAuxiliarasiento_predefinido;
		$this->strTipoUsuarioAuxiliarasiento_predefinido=$asiento_predefinido_control_session->strTipoUsuarioAuxiliarasiento_predefinido;	
		
		$this->bitEsPopup=$asiento_predefinido_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$asiento_predefinido_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$asiento_predefinido_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$asiento_predefinido_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$asiento_predefinido_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$asiento_predefinido_control_session->strSufijo;
		$this->bitEsRelaciones=$asiento_predefinido_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$asiento_predefinido_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$asiento_predefinido_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$asiento_predefinido_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$asiento_predefinido_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$asiento_predefinido_control_session->strTituloTabla;
		$this->strTituloPathPagina=$asiento_predefinido_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$asiento_predefinido_control_session->strTituloPathElementoActual;
		
		if($this->asiento_predefinidoLogic==null) {			
			$this->asiento_predefinidoLogic=new asiento_predefinido_logic();
		}
		
		
		if($this->asiento_predefinidoClase==null) {
			$this->asiento_predefinidoClase=new asiento_predefinido();	
		}
		
		$this->asiento_predefinidoLogic->setasiento_predefinido($this->asiento_predefinidoClase);
		
		
		if($this->asiento_predefinidos==null) {
			$this->asiento_predefinidos=array();	
		}
		
		$this->asiento_predefinidoLogic->setasiento_predefinidos($this->asiento_predefinidos);
		
		
		$this->strTipoView=$asiento_predefinido_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$asiento_predefinido_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$asiento_predefinido_control_session->datosCliente;
		$this->strAccionBusqueda=$asiento_predefinido_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$asiento_predefinido_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$asiento_predefinido_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$asiento_predefinido_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$asiento_predefinido_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$asiento_predefinido_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$asiento_predefinido_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$asiento_predefinido_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$asiento_predefinido_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$asiento_predefinido_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$asiento_predefinido_control_session->strTipoPaginacion;
		$this->strTipoAccion=$asiento_predefinido_control_session->strTipoAccion;
		$this->tiposReportes=$asiento_predefinido_control_session->tiposReportes;
		$this->tiposReporte=$asiento_predefinido_control_session->tiposReporte;
		$this->tiposAcciones=$asiento_predefinido_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$asiento_predefinido_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$asiento_predefinido_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$asiento_predefinido_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$asiento_predefinido_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$asiento_predefinido_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$asiento_predefinido_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$asiento_predefinido_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$asiento_predefinido_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$asiento_predefinido_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$asiento_predefinido_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$asiento_predefinido_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$asiento_predefinido_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$asiento_predefinido_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$asiento_predefinido_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$asiento_predefinido_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$asiento_predefinido_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$asiento_predefinido_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$asiento_predefinido_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$asiento_predefinido_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$asiento_predefinido_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$asiento_predefinido_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$asiento_predefinido_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$asiento_predefinido_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$asiento_predefinido_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$asiento_predefinido_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$asiento_predefinido_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$asiento_predefinido_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$asiento_predefinido_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$asiento_predefinido_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$asiento_predefinido_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$asiento_predefinido_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$asiento_predefinido_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$asiento_predefinido_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$asiento_predefinido_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$asiento_predefinido_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$asiento_predefinido_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$asiento_predefinido_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$asiento_predefinido_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$asiento_predefinido_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$asiento_predefinido_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$asiento_predefinido_control_session->resumenUsuarioActual;	
		$this->moduloActual=$asiento_predefinido_control_session->moduloActual;	
		$this->opcionActual=$asiento_predefinido_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$asiento_predefinido_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$asiento_predefinido_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));
				
		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		$this->strStyleDivArbol=$asiento_predefinido_session->strStyleDivArbol;	
		$this->strStyleDivContent=$asiento_predefinido_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$asiento_predefinido_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$asiento_predefinido_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$asiento_predefinido_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$asiento_predefinido_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$asiento_predefinido_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$asiento_predefinido_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$asiento_predefinido_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$asiento_predefinido_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$asiento_predefinido_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$asiento_predefinido_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$asiento_predefinido_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$asiento_predefinido_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$asiento_predefinido_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$asiento_predefinido_control_session->strMensajeid_usuario;
		$this->strMensajeid_modulo=$asiento_predefinido_control_session->strMensajeid_modulo;
		$this->strMensajecodigo=$asiento_predefinido_control_session->strMensajecodigo;
		$this->strMensajenombre=$asiento_predefinido_control_session->strMensajenombre;
		$this->strMensajeid_fuente=$asiento_predefinido_control_session->strMensajeid_fuente;
		$this->strMensajeid_libro_auxiliar=$asiento_predefinido_control_session->strMensajeid_libro_auxiliar;
		$this->strMensajeid_centro_costo=$asiento_predefinido_control_session->strMensajeid_centro_costo;
		$this->strMensajeid_documento_contable=$asiento_predefinido_control_session->strMensajeid_documento_contable;
		$this->strMensajedescripcion=$asiento_predefinido_control_session->strMensajedescripcion;
		$this->strMensajenro_nit=$asiento_predefinido_control_session->strMensajenro_nit;
		$this->strMensajereferencia=$asiento_predefinido_control_session->strMensajereferencia;
			
		
		$this->empresasFK=$asiento_predefinido_control_session->empresasFK;
		$this->idempresaDefaultFK=$asiento_predefinido_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$asiento_predefinido_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$asiento_predefinido_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$asiento_predefinido_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$asiento_predefinido_control_session->idejercicioDefaultFK;
		$this->periodosFK=$asiento_predefinido_control_session->periodosFK;
		$this->idperiodoDefaultFK=$asiento_predefinido_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$asiento_predefinido_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$asiento_predefinido_control_session->idusuarioDefaultFK;
		$this->modulosFK=$asiento_predefinido_control_session->modulosFK;
		$this->idmoduloDefaultFK=$asiento_predefinido_control_session->idmoduloDefaultFK;
		$this->fuentesFK=$asiento_predefinido_control_session->fuentesFK;
		$this->idfuenteDefaultFK=$asiento_predefinido_control_session->idfuenteDefaultFK;
		$this->libro_auxiliarsFK=$asiento_predefinido_control_session->libro_auxiliarsFK;
		$this->idlibro_auxiliarDefaultFK=$asiento_predefinido_control_session->idlibro_auxiliarDefaultFK;
		$this->centro_costosFK=$asiento_predefinido_control_session->centro_costosFK;
		$this->idcentro_costoDefaultFK=$asiento_predefinido_control_session->idcentro_costoDefaultFK;
		$this->documento_contablesFK=$asiento_predefinido_control_session->documento_contablesFK;
		$this->iddocumento_contableDefaultFK=$asiento_predefinido_control_session->iddocumento_contableDefaultFK;
		
		
		$this->strVisibleFK_Idcentro_costo=$asiento_predefinido_control_session->strVisibleFK_Idcentro_costo;
		$this->strVisibleFK_Iddocumento_contable=$asiento_predefinido_control_session->strVisibleFK_Iddocumento_contable;
		$this->strVisibleFK_Idejercicio=$asiento_predefinido_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$asiento_predefinido_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idfuente=$asiento_predefinido_control_session->strVisibleFK_Idfuente;
		$this->strVisibleFK_Idlibro_auxiliar=$asiento_predefinido_control_session->strVisibleFK_Idlibro_auxiliar;
		$this->strVisibleFK_Idmodulo=$asiento_predefinido_control_session->strVisibleFK_Idmodulo;
		$this->strVisibleFK_Idperiodo=$asiento_predefinido_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idsucursal=$asiento_predefinido_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idusuario=$asiento_predefinido_control_session->strVisibleFK_Idusuario;
		
		
		$this->strTienePermisosasiento_predefinido_detalle=$asiento_predefinido_control_session->strTienePermisosasiento_predefinido_detalle;
		$this->strTienePermisosasiento=$asiento_predefinido_control_session->strTienePermisosasiento;
		
		
		$this->id_centro_costoFK_Idcentro_costo=$asiento_predefinido_control_session->id_centro_costoFK_Idcentro_costo;
		$this->id_documento_contableFK_Iddocumento_contable=$asiento_predefinido_control_session->id_documento_contableFK_Iddocumento_contable;
		$this->id_ejercicioFK_Idejercicio=$asiento_predefinido_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$asiento_predefinido_control_session->id_empresaFK_Idempresa;
		$this->id_fuenteFK_Idfuente=$asiento_predefinido_control_session->id_fuenteFK_Idfuente;
		$this->id_libro_auxiliarFK_Idlibro_auxiliar=$asiento_predefinido_control_session->id_libro_auxiliarFK_Idlibro_auxiliar;
		$this->id_moduloFK_Idmodulo=$asiento_predefinido_control_session->id_moduloFK_Idmodulo;
		$this->id_periodoFK_Idperiodo=$asiento_predefinido_control_session->id_periodoFK_Idperiodo;
		$this->id_sucursalFK_Idsucursal=$asiento_predefinido_control_session->id_sucursalFK_Idsucursal;
		$this->id_usuarioFK_Idusuario=$asiento_predefinido_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getasiento_predefinidoControllerAdditional() {
		return $this->asiento_predefinidoControllerAdditional;
	}

	public function setasiento_predefinidoControllerAdditional($asiento_predefinidoControllerAdditional) {
		$this->asiento_predefinidoControllerAdditional = $asiento_predefinidoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getasiento_predefinidoActual() : asiento_predefinido {
		return $this->asiento_predefinidoActual;
	}

	public function setasiento_predefinidoActual(asiento_predefinido $asiento_predefinidoActual) {
		$this->asiento_predefinidoActual = $asiento_predefinidoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidasiento_predefinido() : int {
		return $this->idasiento_predefinido;
	}

	public function setidasiento_predefinido(int $idasiento_predefinido) {
		$this->idasiento_predefinido = $idasiento_predefinido;
	}
	
	public function getasiento_predefinido() : asiento_predefinido {
		return $this->asiento_predefinido;
	}

	public function setasiento_predefinido(asiento_predefinido $asiento_predefinido) {
		$this->asiento_predefinido = $asiento_predefinido;
	}
		
	public function getasiento_predefinidoLogic() : asiento_predefinido_logic {		
		return $this->asiento_predefinidoLogic;
	}

	public function setasiento_predefinidoLogic(asiento_predefinido_logic $asiento_predefinidoLogic) {
		$this->asiento_predefinidoLogic = $asiento_predefinidoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getasiento_predefinidosModel() {		
		try {						
			/*asiento_predefinidosModel.setWrappedData(asiento_predefinidoLogic->getasiento_predefinidos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->asiento_predefinidosModel;
	}
	
	public function setasiento_predefinidosModel($asiento_predefinidosModel) {
		$this->asiento_predefinidosModel = $asiento_predefinidosModel;
	}
	
	public function getasiento_predefinidos() : array {		
		return $this->asiento_predefinidos;
	}
	
	public function setasiento_predefinidos(array $asiento_predefinidos) {
		$this->asiento_predefinidos= $asiento_predefinidos;
	}
	
	public function getasiento_predefinidosEliminados() : array {		
		return $this->asiento_predefinidosEliminados;
	}
	
	public function setasiento_predefinidosEliminados(array $asiento_predefinidosEliminados) {
		$this->asiento_predefinidosEliminados= $asiento_predefinidosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getasiento_predefinidoActualFromListDataModel() {
		try {
			/*$asiento_predefinidoClase= $this->asiento_predefinidosModel->getRowData();*/
			
			/*return $asiento_predefinido;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
