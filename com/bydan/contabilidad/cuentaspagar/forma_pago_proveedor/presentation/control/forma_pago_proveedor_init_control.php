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

namespace com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\entity\forma_pago_proveedor;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/forma_pago_proveedor/util/forma_pago_proveedor_carga.php');
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_carga;

use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_param_return;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\logic\forma_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\presentation\session\forma_pago_proveedor_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\tipo_forma_pago\business\entity\tipo_forma_pago;
use com\bydan\contabilidad\general\tipo_forma_pago\business\logic\tipo_forma_pago_logic;
use com\bydan\contabilidad\general\tipo_forma_pago\util\tipo_forma_pago_carga;
use com\bydan\contabilidad\general\tipo_forma_pago\util\tipo_forma_pago_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL


use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\presentation\session\debito_cuenta_pagar_session;

use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\presentation\session\documento_cuenta_pagar_session;

use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\presentation\session\pago_cuenta_pagar_session;


/*CARGA ARCHIVOS FRAMEWORK*/
forma_pago_proveedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
forma_pago_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
forma_pago_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
forma_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*forma_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class forma_pago_proveedor_init_control extends ControllerBase {	
	
	public $forma_pago_proveedorClase=null;	
	public $forma_pago_proveedorsModel=null;	
	public $forma_pago_proveedorsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idforma_pago_proveedor=0;	
	public ?int $idforma_pago_proveedorActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $forma_pago_proveedorLogic=null;
	
	public $forma_pago_proveedorActual=null;	
	
	public $forma_pago_proveedor=null;
	public $forma_pago_proveedors=null;
	public $forma_pago_proveedorsEliminados=array();
	public $forma_pago_proveedorsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $forma_pago_proveedorsLocal=array();
	public ?array $forma_pago_proveedorsReporte=null;
	public ?array $forma_pago_proveedorsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadforma_pago_proveedor='onload';
	public string $strTipoPaginaAuxiliarforma_pago_proveedor='none';
	public string $strTipoUsuarioAuxiliarforma_pago_proveedor='none';
		
	public $forma_pago_proveedorReturnGeneral=null;
	public $forma_pago_proveedorParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $forma_pago_proveedorModel=null;
	public $forma_pago_proveedorControllerAdditional=null;
	
	
	

	public $debitocuentapagarLogic=null;

	public function  getdebito_cuenta_pagarLogic() {
		return $this->debitocuentapagarLogic;
	}

	public function setdebito_cuenta_pagarLogic($debitocuentapagarLogic) {
		$this->debitocuentapagarLogic =$debitocuentapagarLogic;
	}


	public $documentocuentapagarLogic=null;

	public function  getdocumento_cuenta_pagarLogic() {
		return $this->documentocuentapagarLogic;
	}

	public function setdocumento_cuenta_pagarLogic($documentocuentapagarLogic) {
		$this->documentocuentapagarLogic =$documentocuentapagarLogic;
	}


	public $pagocuentapagarLogic=null;

	public function  getpago_cuenta_pagarLogic() {
		return $this->pagocuentapagarLogic;
	}

	public function setpago_cuenta_pagarLogic($pagocuentapagarLogic) {
		$this->pagocuentapagarLogic =$pagocuentapagarLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_tipo_forma_pago='';
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	public string $strMensajepredeterminado='';
	public string $strMensajeid_cuenta='';
	public string $strMensajecuenta_contable='';
	
	
	public string $strVisibleFK_Idcuenta='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idtipo_forma_pago='display:table-row';

	
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

	public array $tipo_forma_pagosFK=array();

	public function gettipo_forma_pagosFK():array {
		return $this->tipo_forma_pagosFK;
	}

	public function settipo_forma_pagosFK(array $tipo_forma_pagosFK) {
		$this->tipo_forma_pagosFK = $tipo_forma_pagosFK;
	}

	public int $idtipo_forma_pagoDefaultFK=-1;

	public function getIdtipo_forma_pagoDefaultFK():int {
		return $this->idtipo_forma_pagoDefaultFK;
	}

	public function setIdtipo_forma_pagoDefaultFK(int $idtipo_forma_pagoDefaultFK) {
		$this->idtipo_forma_pagoDefaultFK = $idtipo_forma_pagoDefaultFK;
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

	
	
	
	
	
	
	public $strTienePermisosdebito_cuenta_pagar='none';
	public $strTienePermisosdocumento_cuenta_pagar='none';
	public $strTienePermisospago_cuenta_pagar='none';
	
	
	public  $id_cuentaFK_Idcuenta=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_tipo_forma_pagoFK_Idtipo_forma_pago=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->forma_pago_proveedorLogic==null) {
				$this->forma_pago_proveedorLogic=new forma_pago_proveedor_logic();
			}
			
		} else {
			if($this->forma_pago_proveedorLogic==null) {
				$this->forma_pago_proveedorLogic=new forma_pago_proveedor_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->forma_pago_proveedorClase==null) {
				$this->forma_pago_proveedorClase=new forma_pago_proveedor();
			}
			
			$this->forma_pago_proveedorClase->setId(0);	
				
				
			$this->forma_pago_proveedorClase->setid_empresa(-1);	
			$this->forma_pago_proveedorClase->setid_tipo_forma_pago(-1);	
			$this->forma_pago_proveedorClase->setcodigo('');	
			$this->forma_pago_proveedorClase->setnombre('');	
			$this->forma_pago_proveedorClase->setpredeterminado(false);	
			$this->forma_pago_proveedorClase->setid_cuenta(null);	
			$this->forma_pago_proveedorClase->setcuenta_contable('');	
			
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
		$this->prepararEjecutarMantenimientoBase('forma_pago_proveedor');
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
		$this->cargarParametrosReporteBase('forma_pago_proveedor');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('forma_pago_proveedor');
	}
	
	public function actualizarControllerConReturnGeneral(forma_pago_proveedor_param_return $forma_pago_proveedorReturnGeneral) {
		if($forma_pago_proveedorReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesforma_pago_proveedorsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$forma_pago_proveedorReturnGeneral->getsMensajeProceso();
		}
		
		if($forma_pago_proveedorReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$forma_pago_proveedorReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($forma_pago_proveedorReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$forma_pago_proveedorReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$forma_pago_proveedorReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($forma_pago_proveedorReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($forma_pago_proveedorReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$forma_pago_proveedorReturnGeneral->getsFuncionJs();
		}
		
		if($forma_pago_proveedorReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(forma_pago_proveedor_session $forma_pago_proveedor_session){
		$this->strStyleDivArbol=$forma_pago_proveedor_session->strStyleDivArbol;	
		$this->strStyleDivContent=$forma_pago_proveedor_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$forma_pago_proveedor_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$forma_pago_proveedor_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$forma_pago_proveedor_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$forma_pago_proveedor_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$forma_pago_proveedor_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(forma_pago_proveedor_session $forma_pago_proveedor_session){
		$forma_pago_proveedor_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$forma_pago_proveedor_session->strStyleDivHeader='display:none';			
		$forma_pago_proveedor_session->strStyleDivContent='width:93%;height:100%';	
		$forma_pago_proveedor_session->strStyleDivOpcionesBanner='display:none';	
		$forma_pago_proveedor_session->strStyleDivExpandirColapsar='display:none';	
		$forma_pago_proveedor_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(forma_pago_proveedor_control $forma_pago_proveedor_control_session){
		$this->idNuevo=$forma_pago_proveedor_control_session->idNuevo;
		$this->forma_pago_proveedorActual=$forma_pago_proveedor_control_session->forma_pago_proveedorActual;
		$this->forma_pago_proveedor=$forma_pago_proveedor_control_session->forma_pago_proveedor;
		$this->forma_pago_proveedorClase=$forma_pago_proveedor_control_session->forma_pago_proveedorClase;
		$this->forma_pago_proveedors=$forma_pago_proveedor_control_session->forma_pago_proveedors;
		$this->forma_pago_proveedorsEliminados=$forma_pago_proveedor_control_session->forma_pago_proveedorsEliminados;
		$this->forma_pago_proveedor=$forma_pago_proveedor_control_session->forma_pago_proveedor;
		$this->forma_pago_proveedorsReporte=$forma_pago_proveedor_control_session->forma_pago_proveedorsReporte;
		$this->forma_pago_proveedorsSeleccionados=$forma_pago_proveedor_control_session->forma_pago_proveedorsSeleccionados;
		$this->arrOrderBy=$forma_pago_proveedor_control_session->arrOrderBy;
		$this->arrOrderByRel=$forma_pago_proveedor_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$forma_pago_proveedor_control_session->arrHistoryWebs;
		$this->arrSessionBases=$forma_pago_proveedor_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadforma_pago_proveedor=$forma_pago_proveedor_control_session->strTypeOnLoadforma_pago_proveedor;
		$this->strTipoPaginaAuxiliarforma_pago_proveedor=$forma_pago_proveedor_control_session->strTipoPaginaAuxiliarforma_pago_proveedor;
		$this->strTipoUsuarioAuxiliarforma_pago_proveedor=$forma_pago_proveedor_control_session->strTipoUsuarioAuxiliarforma_pago_proveedor;	
		
		$this->bitEsPopup=$forma_pago_proveedor_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$forma_pago_proveedor_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$forma_pago_proveedor_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$forma_pago_proveedor_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$forma_pago_proveedor_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$forma_pago_proveedor_control_session->strSufijo;
		$this->bitEsRelaciones=$forma_pago_proveedor_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$forma_pago_proveedor_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$forma_pago_proveedor_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$forma_pago_proveedor_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$forma_pago_proveedor_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$forma_pago_proveedor_control_session->strTituloTabla;
		$this->strTituloPathPagina=$forma_pago_proveedor_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$forma_pago_proveedor_control_session->strTituloPathElementoActual;
		
		if($this->forma_pago_proveedorLogic==null) {			
			$this->forma_pago_proveedorLogic=new forma_pago_proveedor_logic();
		}
		
		
		if($this->forma_pago_proveedorClase==null) {
			$this->forma_pago_proveedorClase=new forma_pago_proveedor();	
		}
		
		$this->forma_pago_proveedorLogic->setforma_pago_proveedor($this->forma_pago_proveedorClase);
		
		
		if($this->forma_pago_proveedors==null) {
			$this->forma_pago_proveedors=array();	
		}
		
		$this->forma_pago_proveedorLogic->setforma_pago_proveedors($this->forma_pago_proveedors);
		
		
		$this->strTipoView=$forma_pago_proveedor_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$forma_pago_proveedor_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$forma_pago_proveedor_control_session->datosCliente;
		$this->strAccionBusqueda=$forma_pago_proveedor_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$forma_pago_proveedor_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$forma_pago_proveedor_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$forma_pago_proveedor_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$forma_pago_proveedor_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$forma_pago_proveedor_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$forma_pago_proveedor_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$forma_pago_proveedor_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$forma_pago_proveedor_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$forma_pago_proveedor_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$forma_pago_proveedor_control_session->strTipoPaginacion;
		$this->strTipoAccion=$forma_pago_proveedor_control_session->strTipoAccion;
		$this->tiposReportes=$forma_pago_proveedor_control_session->tiposReportes;
		$this->tiposReporte=$forma_pago_proveedor_control_session->tiposReporte;
		$this->tiposAcciones=$forma_pago_proveedor_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$forma_pago_proveedor_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$forma_pago_proveedor_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$forma_pago_proveedor_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$forma_pago_proveedor_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$forma_pago_proveedor_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$forma_pago_proveedor_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$forma_pago_proveedor_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$forma_pago_proveedor_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$forma_pago_proveedor_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$forma_pago_proveedor_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$forma_pago_proveedor_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$forma_pago_proveedor_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$forma_pago_proveedor_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$forma_pago_proveedor_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$forma_pago_proveedor_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$forma_pago_proveedor_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$forma_pago_proveedor_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$forma_pago_proveedor_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$forma_pago_proveedor_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$forma_pago_proveedor_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$forma_pago_proveedor_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$forma_pago_proveedor_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$forma_pago_proveedor_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$forma_pago_proveedor_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$forma_pago_proveedor_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$forma_pago_proveedor_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$forma_pago_proveedor_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$forma_pago_proveedor_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$forma_pago_proveedor_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$forma_pago_proveedor_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$forma_pago_proveedor_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$forma_pago_proveedor_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$forma_pago_proveedor_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$forma_pago_proveedor_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$forma_pago_proveedor_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$forma_pago_proveedor_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$forma_pago_proveedor_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$forma_pago_proveedor_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$forma_pago_proveedor_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$forma_pago_proveedor_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$forma_pago_proveedor_control_session->resumenUsuarioActual;	
		$this->moduloActual=$forma_pago_proveedor_control_session->moduloActual;	
		$this->opcionActual=$forma_pago_proveedor_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$forma_pago_proveedor_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$forma_pago_proveedor_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));
				
		if($forma_pago_proveedor_session==null) {
			$forma_pago_proveedor_session=new forma_pago_proveedor_session();
		}
		
		$this->strStyleDivArbol=$forma_pago_proveedor_session->strStyleDivArbol;	
		$this->strStyleDivContent=$forma_pago_proveedor_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$forma_pago_proveedor_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$forma_pago_proveedor_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$forma_pago_proveedor_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$forma_pago_proveedor_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$forma_pago_proveedor_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$forma_pago_proveedor_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$forma_pago_proveedor_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$forma_pago_proveedor_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$forma_pago_proveedor_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$forma_pago_proveedor_control_session->strMensajeid_empresa;
		$this->strMensajeid_tipo_forma_pago=$forma_pago_proveedor_control_session->strMensajeid_tipo_forma_pago;
		$this->strMensajecodigo=$forma_pago_proveedor_control_session->strMensajecodigo;
		$this->strMensajenombre=$forma_pago_proveedor_control_session->strMensajenombre;
		$this->strMensajepredeterminado=$forma_pago_proveedor_control_session->strMensajepredeterminado;
		$this->strMensajeid_cuenta=$forma_pago_proveedor_control_session->strMensajeid_cuenta;
		$this->strMensajecuenta_contable=$forma_pago_proveedor_control_session->strMensajecuenta_contable;
			
		
		$this->empresasFK=$forma_pago_proveedor_control_session->empresasFK;
		$this->idempresaDefaultFK=$forma_pago_proveedor_control_session->idempresaDefaultFK;
		$this->tipo_forma_pagosFK=$forma_pago_proveedor_control_session->tipo_forma_pagosFK;
		$this->idtipo_forma_pagoDefaultFK=$forma_pago_proveedor_control_session->idtipo_forma_pagoDefaultFK;
		$this->cuentasFK=$forma_pago_proveedor_control_session->cuentasFK;
		$this->idcuentaDefaultFK=$forma_pago_proveedor_control_session->idcuentaDefaultFK;
		
		
		$this->strVisibleFK_Idcuenta=$forma_pago_proveedor_control_session->strVisibleFK_Idcuenta;
		$this->strVisibleFK_Idempresa=$forma_pago_proveedor_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idtipo_forma_pago=$forma_pago_proveedor_control_session->strVisibleFK_Idtipo_forma_pago;
		
		
		$this->strTienePermisosdebito_cuenta_pagar=$forma_pago_proveedor_control_session->strTienePermisosdebito_cuenta_pagar;
		$this->strTienePermisosdocumento_cuenta_pagar=$forma_pago_proveedor_control_session->strTienePermisosdocumento_cuenta_pagar;
		$this->strTienePermisospago_cuenta_pagar=$forma_pago_proveedor_control_session->strTienePermisospago_cuenta_pagar;
		
		
		$this->id_cuentaFK_Idcuenta=$forma_pago_proveedor_control_session->id_cuentaFK_Idcuenta;
		$this->id_empresaFK_Idempresa=$forma_pago_proveedor_control_session->id_empresaFK_Idempresa;
		$this->id_tipo_forma_pagoFK_Idtipo_forma_pago=$forma_pago_proveedor_control_session->id_tipo_forma_pagoFK_Idtipo_forma_pago;

		
		
		
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
	
	public function getforma_pago_proveedorControllerAdditional() {
		return $this->forma_pago_proveedorControllerAdditional;
	}

	public function setforma_pago_proveedorControllerAdditional($forma_pago_proveedorControllerAdditional) {
		$this->forma_pago_proveedorControllerAdditional = $forma_pago_proveedorControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getforma_pago_proveedorActual() : forma_pago_proveedor {
		return $this->forma_pago_proveedorActual;
	}

	public function setforma_pago_proveedorActual(forma_pago_proveedor $forma_pago_proveedorActual) {
		$this->forma_pago_proveedorActual = $forma_pago_proveedorActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidforma_pago_proveedor() : int {
		return $this->idforma_pago_proveedor;
	}

	public function setidforma_pago_proveedor(int $idforma_pago_proveedor) {
		$this->idforma_pago_proveedor = $idforma_pago_proveedor;
	}
	
	public function getforma_pago_proveedor() : forma_pago_proveedor {
		return $this->forma_pago_proveedor;
	}

	public function setforma_pago_proveedor(forma_pago_proveedor $forma_pago_proveedor) {
		$this->forma_pago_proveedor = $forma_pago_proveedor;
	}
		
	public function getforma_pago_proveedorLogic() : forma_pago_proveedor_logic {		
		return $this->forma_pago_proveedorLogic;
	}

	public function setforma_pago_proveedorLogic(forma_pago_proveedor_logic $forma_pago_proveedorLogic) {
		$this->forma_pago_proveedorLogic = $forma_pago_proveedorLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getforma_pago_proveedorsModel() {		
		try {						
			/*forma_pago_proveedorsModel.setWrappedData(forma_pago_proveedorLogic->getforma_pago_proveedors());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->forma_pago_proveedorsModel;
	}
	
	public function setforma_pago_proveedorsModel($forma_pago_proveedorsModel) {
		$this->forma_pago_proveedorsModel = $forma_pago_proveedorsModel;
	}
	
	public function getforma_pago_proveedors() : array {		
		return $this->forma_pago_proveedors;
	}
	
	public function setforma_pago_proveedors(array $forma_pago_proveedors) {
		$this->forma_pago_proveedors= $forma_pago_proveedors;
	}
	
	public function getforma_pago_proveedorsEliminados() : array {		
		return $this->forma_pago_proveedorsEliminados;
	}
	
	public function setforma_pago_proveedorsEliminados(array $forma_pago_proveedorsEliminados) {
		$this->forma_pago_proveedorsEliminados= $forma_pago_proveedorsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getforma_pago_proveedorActualFromListDataModel() {
		try {
			/*$forma_pago_proveedorClase= $this->forma_pago_proveedorsModel->getRowData();*/
			
			/*return $forma_pago_proveedor;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
