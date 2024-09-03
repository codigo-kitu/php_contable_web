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

namespace com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\presentation\control;

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

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/termino_pago_cliente/util/termino_pago_cliente_carga.php');
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_param_return;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\presentation\session\termino_pago_cliente_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\tipo_termino_pago\business\entity\tipo_termino_pago;
use com\bydan\contabilidad\general\tipo_termino_pago\business\logic\tipo_termino_pago_logic;
use com\bydan\contabilidad\general\tipo_termino_pago\util\tipo_termino_pago_carga;
use com\bydan\contabilidad\general\tipo_termino_pago\util\tipo_termino_pago_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL


use com\bydan\contabilidad\facturacion\parametro_facturacion\util\parametro_facturacion_carga;
use com\bydan\contabilidad\facturacion\parametro_facturacion\util\parametro_facturacion_util;
use com\bydan\contabilidad\facturacion\parametro_facturacion\presentation\session\parametro_facturacion_session;

use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util\debito_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util\debito_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\presentation\session\debito_cuenta_cobrar_session;

use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;
use com\bydan\contabilidad\facturacion\devolucion_factura\presentation\session\devolucion_factura_session;

use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_carga;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;
use com\bydan\contabilidad\facturacion\factura_lote\presentation\session\factura_lote_session;

use com\bydan\contabilidad\estimados\estimado\util\estimado_carga;
use com\bydan\contabilidad\estimados\estimado\util\estimado_util;
use com\bydan\contabilidad\estimados\estimado\presentation\session\estimado_session;

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\presentation\session\cuenta_cobrar_session;

use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;

use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;
use com\bydan\contabilidad\facturacion\factura\presentation\session\factura_session;

use com\bydan\contabilidad\estimados\consignacion\util\consignacion_carga;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;
use com\bydan\contabilidad\estimados\consignacion\presentation\session\consignacion_session;


/*CARGA ARCHIVOS FRAMEWORK*/
termino_pago_cliente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
termino_pago_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
termino_pago_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class termino_pago_cliente_init_control extends ControllerBase {	
	
	public $termino_pago_clienteClase=null;	
	public $termino_pago_clientesModel=null;	
	public $termino_pago_clientesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idtermino_pago_cliente=0;	
	public ?int $idtermino_pago_clienteActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $termino_pago_clienteLogic=null;
	
	public $termino_pago_clienteActual=null;	
	
	public $termino_pago_cliente=null;
	public $termino_pago_clientes=null;
	public $termino_pago_clientesEliminados=array();
	public $termino_pago_clientesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $termino_pago_clientesLocal=array();
	public ?array $termino_pago_clientesReporte=null;
	public ?array $termino_pago_clientesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadtermino_pago_cliente='onload';
	public string $strTipoPaginaAuxiliartermino_pago_cliente='none';
	public string $strTipoUsuarioAuxiliartermino_pago_cliente='none';
		
	public $termino_pago_clienteReturnGeneral=null;
	public $termino_pago_clienteParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $termino_pago_clienteModel=null;
	public $termino_pago_clienteControllerAdditional=null;
	
	
	

	public $parametrofacturacionLogic=null;

	public function  getparametro_facturacionLogic() {
		return $this->parametrofacturacionLogic;
	}

	public function setparametro_facturacionLogic($parametrofacturacionLogic) {
		$this->parametrofacturacionLogic =$parametrofacturacionLogic;
	}


	public $debitocuentacobrarLogic=null;

	public function  getdebito_cuenta_cobrarLogic() {
		return $this->debitocuentacobrarLogic;
	}

	public function setdebito_cuenta_cobrarLogic($debitocuentacobrarLogic) {
		$this->debitocuentacobrarLogic =$debitocuentacobrarLogic;
	}


	public $devolucionfacturaLogic=null;

	public function  getdevolucion_facturaLogic() {
		return $this->devolucionfacturaLogic;
	}

	public function setdevolucion_facturaLogic($devolucionfacturaLogic) {
		$this->devolucionfacturaLogic =$devolucionfacturaLogic;
	}


	public $facturaloteLogic=null;

	public function  getfactura_loteLogic() {
		return $this->facturaloteLogic;
	}

	public function setfactura_loteLogic($facturaloteLogic) {
		$this->facturaloteLogic =$facturaloteLogic;
	}


	public $estimadoLogic=null;

	public function  getestimadoLogic() {
		return $this->estimadoLogic;
	}

	public function setestimadoLogic($estimadoLogic) {
		$this->estimadoLogic =$estimadoLogic;
	}


	public $cuentacobrarLogic=null;

	public function  getcuenta_cobrarLogic() {
		return $this->cuentacobrarLogic;
	}

	public function setcuenta_cobrarLogic($cuentacobrarLogic) {
		$this->cuentacobrarLogic =$cuentacobrarLogic;
	}


	public $clienteLogic=null;

	public function  getclienteLogic() {
		return $this->clienteLogic;
	}

	public function setclienteLogic($clienteLogic) {
		$this->clienteLogic =$clienteLogic;
	}


	public $facturaLogic=null;

	public function  getfacturaLogic() {
		return $this->facturaLogic;
	}

	public function setfacturaLogic($facturaLogic) {
		$this->facturaLogic =$facturaLogic;
	}


	public $consignacionLogic=null;

	public function  getconsignacionLogic() {
		return $this->consignacionLogic;
	}

	public function setconsignacionLogic($consignacionLogic) {
		$this->consignacionLogic =$consignacionLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_tipo_termino_pago='';
	public string $strMensajecodigo='';
	public string $strMensajedescripcion='';
	public string $strMensajemonto='';
	public string $strMensajedias='';
	public string $strMensajeinicial='';
	public string $strMensajecuotas='';
	public string $strMensajedescuento_pronto_pago='';
	public string $strMensajepredeterminado='';
	public string $strMensajeid_cuenta='';
	public string $strMensajecuenta_contable='';
	
	
	public string $strVisibleFK_Idcuenta='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idtipo_termino_pago='display:table-row';

	
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

	public array $tipo_termino_pagosFK=array();

	public function gettipo_termino_pagosFK():array {
		return $this->tipo_termino_pagosFK;
	}

	public function settipo_termino_pagosFK(array $tipo_termino_pagosFK) {
		$this->tipo_termino_pagosFK = $tipo_termino_pagosFK;
	}

	public int $idtipo_termino_pagoDefaultFK=-1;

	public function getIdtipo_termino_pagoDefaultFK():int {
		return $this->idtipo_termino_pagoDefaultFK;
	}

	public function setIdtipo_termino_pagoDefaultFK(int $idtipo_termino_pagoDefaultFK) {
		$this->idtipo_termino_pagoDefaultFK = $idtipo_termino_pagoDefaultFK;
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

	
	
	
	
	
	
	public $strTienePermisosparametro_facturacion='none';
	public $strTienePermisosdebito_cuenta_cobrar='none';
	public $strTienePermisosdevolucion_factura='none';
	public $strTienePermisosfactura_lote='none';
	public $strTienePermisosestimado='none';
	public $strTienePermisoscuenta_cobrar='none';
	public $strTienePermisoscliente='none';
	public $strTienePermisosfactura='none';
	public $strTienePermisosconsignacion='none';
	
	
	public  $id_cuentaFK_Idcuenta=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_tipo_termino_pagoFK_Idtipo_termino_pago=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->termino_pago_clienteLogic==null) {
				$this->termino_pago_clienteLogic=new termino_pago_cliente_logic();
			}
			
		} else {
			if($this->termino_pago_clienteLogic==null) {
				$this->termino_pago_clienteLogic=new termino_pago_cliente_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->termino_pago_clienteClase==null) {
				$this->termino_pago_clienteClase=new termino_pago_cliente();
			}
			
			$this->termino_pago_clienteClase->setId(0);	
				
				
			$this->termino_pago_clienteClase->setid_empresa(-1);	
			$this->termino_pago_clienteClase->setid_tipo_termino_pago(-1);	
			$this->termino_pago_clienteClase->setcodigo('');	
			$this->termino_pago_clienteClase->setdescripcion('');	
			$this->termino_pago_clienteClase->setmonto(0.0);	
			$this->termino_pago_clienteClase->setdias(0);	
			$this->termino_pago_clienteClase->setinicial(0.0);	
			$this->termino_pago_clienteClase->setcuotas(0);	
			$this->termino_pago_clienteClase->setdescuento_pronto_pago(0.0);	
			$this->termino_pago_clienteClase->setpredeterminado(false);	
			$this->termino_pago_clienteClase->setid_cuenta(-1);	
			$this->termino_pago_clienteClase->setcuenta_contable('');	
			
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
		$this->prepararEjecutarMantenimientoBase('termino_pago_cliente');
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
		$this->cargarParametrosReporteBase('termino_pago_cliente');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('termino_pago_cliente');
	}
	
	public function actualizarControllerConReturnGeneral(termino_pago_cliente_param_return $termino_pago_clienteReturnGeneral) {
		if($termino_pago_clienteReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajestermino_pago_clientesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$termino_pago_clienteReturnGeneral->getsMensajeProceso();
		}
		
		if($termino_pago_clienteReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$termino_pago_clienteReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($termino_pago_clienteReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$termino_pago_clienteReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$termino_pago_clienteReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($termino_pago_clienteReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($termino_pago_clienteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$termino_pago_clienteReturnGeneral->getsFuncionJs();
		}
		
		if($termino_pago_clienteReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(termino_pago_cliente_session $termino_pago_cliente_session){
		$this->strStyleDivArbol=$termino_pago_cliente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$termino_pago_cliente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$termino_pago_cliente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$termino_pago_cliente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$termino_pago_cliente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$termino_pago_cliente_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$termino_pago_cliente_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(termino_pago_cliente_session $termino_pago_cliente_session){
		$termino_pago_cliente_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$termino_pago_cliente_session->strStyleDivHeader='display:none';			
		$termino_pago_cliente_session->strStyleDivContent='width:93%;height:100%';	
		$termino_pago_cliente_session->strStyleDivOpcionesBanner='display:none';	
		$termino_pago_cliente_session->strStyleDivExpandirColapsar='display:none';	
		$termino_pago_cliente_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(termino_pago_cliente_control $termino_pago_cliente_control_session){
		$this->idNuevo=$termino_pago_cliente_control_session->idNuevo;
		$this->termino_pago_clienteActual=$termino_pago_cliente_control_session->termino_pago_clienteActual;
		$this->termino_pago_cliente=$termino_pago_cliente_control_session->termino_pago_cliente;
		$this->termino_pago_clienteClase=$termino_pago_cliente_control_session->termino_pago_clienteClase;
		$this->termino_pago_clientes=$termino_pago_cliente_control_session->termino_pago_clientes;
		$this->termino_pago_clientesEliminados=$termino_pago_cliente_control_session->termino_pago_clientesEliminados;
		$this->termino_pago_cliente=$termino_pago_cliente_control_session->termino_pago_cliente;
		$this->termino_pago_clientesReporte=$termino_pago_cliente_control_session->termino_pago_clientesReporte;
		$this->termino_pago_clientesSeleccionados=$termino_pago_cliente_control_session->termino_pago_clientesSeleccionados;
		$this->arrOrderBy=$termino_pago_cliente_control_session->arrOrderBy;
		$this->arrOrderByRel=$termino_pago_cliente_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$termino_pago_cliente_control_session->arrHistoryWebs;
		$this->arrSessionBases=$termino_pago_cliente_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadtermino_pago_cliente=$termino_pago_cliente_control_session->strTypeOnLoadtermino_pago_cliente;
		$this->strTipoPaginaAuxiliartermino_pago_cliente=$termino_pago_cliente_control_session->strTipoPaginaAuxiliartermino_pago_cliente;
		$this->strTipoUsuarioAuxiliartermino_pago_cliente=$termino_pago_cliente_control_session->strTipoUsuarioAuxiliartermino_pago_cliente;	
		
		$this->bitEsPopup=$termino_pago_cliente_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$termino_pago_cliente_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$termino_pago_cliente_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$termino_pago_cliente_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$termino_pago_cliente_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$termino_pago_cliente_control_session->strSufijo;
		$this->bitEsRelaciones=$termino_pago_cliente_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$termino_pago_cliente_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$termino_pago_cliente_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$termino_pago_cliente_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$termino_pago_cliente_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$termino_pago_cliente_control_session->strTituloTabla;
		$this->strTituloPathPagina=$termino_pago_cliente_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$termino_pago_cliente_control_session->strTituloPathElementoActual;
		
		if($this->termino_pago_clienteLogic==null) {			
			$this->termino_pago_clienteLogic=new termino_pago_cliente_logic();
		}
		
		
		if($this->termino_pago_clienteClase==null) {
			$this->termino_pago_clienteClase=new termino_pago_cliente();	
		}
		
		$this->termino_pago_clienteLogic->settermino_pago_cliente($this->termino_pago_clienteClase);
		
		
		if($this->termino_pago_clientes==null) {
			$this->termino_pago_clientes=array();	
		}
		
		$this->termino_pago_clienteLogic->settermino_pago_clientes($this->termino_pago_clientes);
		
		
		$this->strTipoView=$termino_pago_cliente_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$termino_pago_cliente_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$termino_pago_cliente_control_session->datosCliente;
		$this->strAccionBusqueda=$termino_pago_cliente_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$termino_pago_cliente_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$termino_pago_cliente_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$termino_pago_cliente_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$termino_pago_cliente_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$termino_pago_cliente_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$termino_pago_cliente_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$termino_pago_cliente_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$termino_pago_cliente_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$termino_pago_cliente_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$termino_pago_cliente_control_session->strTipoPaginacion;
		$this->strTipoAccion=$termino_pago_cliente_control_session->strTipoAccion;
		$this->tiposReportes=$termino_pago_cliente_control_session->tiposReportes;
		$this->tiposReporte=$termino_pago_cliente_control_session->tiposReporte;
		$this->tiposAcciones=$termino_pago_cliente_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$termino_pago_cliente_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$termino_pago_cliente_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$termino_pago_cliente_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$termino_pago_cliente_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$termino_pago_cliente_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$termino_pago_cliente_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$termino_pago_cliente_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$termino_pago_cliente_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$termino_pago_cliente_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$termino_pago_cliente_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$termino_pago_cliente_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$termino_pago_cliente_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$termino_pago_cliente_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$termino_pago_cliente_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$termino_pago_cliente_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$termino_pago_cliente_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$termino_pago_cliente_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$termino_pago_cliente_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$termino_pago_cliente_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$termino_pago_cliente_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$termino_pago_cliente_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$termino_pago_cliente_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$termino_pago_cliente_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$termino_pago_cliente_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$termino_pago_cliente_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$termino_pago_cliente_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$termino_pago_cliente_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$termino_pago_cliente_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$termino_pago_cliente_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$termino_pago_cliente_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$termino_pago_cliente_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$termino_pago_cliente_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$termino_pago_cliente_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$termino_pago_cliente_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$termino_pago_cliente_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$termino_pago_cliente_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$termino_pago_cliente_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$termino_pago_cliente_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$termino_pago_cliente_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$termino_pago_cliente_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$termino_pago_cliente_control_session->resumenUsuarioActual;	
		$this->moduloActual=$termino_pago_cliente_control_session->moduloActual;	
		$this->opcionActual=$termino_pago_cliente_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$termino_pago_cliente_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$termino_pago_cliente_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$termino_pago_cliente_session=unserialize($this->Session->read(termino_pago_cliente_util::$STR_SESSION_NAME));
				
		if($termino_pago_cliente_session==null) {
			$termino_pago_cliente_session=new termino_pago_cliente_session();
		}
		
		$this->strStyleDivArbol=$termino_pago_cliente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$termino_pago_cliente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$termino_pago_cliente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$termino_pago_cliente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$termino_pago_cliente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$termino_pago_cliente_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$termino_pago_cliente_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$termino_pago_cliente_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$termino_pago_cliente_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$termino_pago_cliente_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$termino_pago_cliente_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$termino_pago_cliente_control_session->strMensajeid_empresa;
		$this->strMensajeid_tipo_termino_pago=$termino_pago_cliente_control_session->strMensajeid_tipo_termino_pago;
		$this->strMensajecodigo=$termino_pago_cliente_control_session->strMensajecodigo;
		$this->strMensajedescripcion=$termino_pago_cliente_control_session->strMensajedescripcion;
		$this->strMensajemonto=$termino_pago_cliente_control_session->strMensajemonto;
		$this->strMensajedias=$termino_pago_cliente_control_session->strMensajedias;
		$this->strMensajeinicial=$termino_pago_cliente_control_session->strMensajeinicial;
		$this->strMensajecuotas=$termino_pago_cliente_control_session->strMensajecuotas;
		$this->strMensajedescuento_pronto_pago=$termino_pago_cliente_control_session->strMensajedescuento_pronto_pago;
		$this->strMensajepredeterminado=$termino_pago_cliente_control_session->strMensajepredeterminado;
		$this->strMensajeid_cuenta=$termino_pago_cliente_control_session->strMensajeid_cuenta;
		$this->strMensajecuenta_contable=$termino_pago_cliente_control_session->strMensajecuenta_contable;
			
		
		$this->empresasFK=$termino_pago_cliente_control_session->empresasFK;
		$this->idempresaDefaultFK=$termino_pago_cliente_control_session->idempresaDefaultFK;
		$this->tipo_termino_pagosFK=$termino_pago_cliente_control_session->tipo_termino_pagosFK;
		$this->idtipo_termino_pagoDefaultFK=$termino_pago_cliente_control_session->idtipo_termino_pagoDefaultFK;
		$this->cuentasFK=$termino_pago_cliente_control_session->cuentasFK;
		$this->idcuentaDefaultFK=$termino_pago_cliente_control_session->idcuentaDefaultFK;
		
		
		$this->strVisibleFK_Idcuenta=$termino_pago_cliente_control_session->strVisibleFK_Idcuenta;
		$this->strVisibleFK_Idempresa=$termino_pago_cliente_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idtipo_termino_pago=$termino_pago_cliente_control_session->strVisibleFK_Idtipo_termino_pago;
		
		
		$this->strTienePermisosparametro_facturacion=$termino_pago_cliente_control_session->strTienePermisosparametro_facturacion;
		$this->strTienePermisosdebito_cuenta_cobrar=$termino_pago_cliente_control_session->strTienePermisosdebito_cuenta_cobrar;
		$this->strTienePermisosdevolucion_factura=$termino_pago_cliente_control_session->strTienePermisosdevolucion_factura;
		$this->strTienePermisosfactura_lote=$termino_pago_cliente_control_session->strTienePermisosfactura_lote;
		$this->strTienePermisosestimado=$termino_pago_cliente_control_session->strTienePermisosestimado;
		$this->strTienePermisoscuenta_cobrar=$termino_pago_cliente_control_session->strTienePermisoscuenta_cobrar;
		$this->strTienePermisoscliente=$termino_pago_cliente_control_session->strTienePermisoscliente;
		$this->strTienePermisosfactura=$termino_pago_cliente_control_session->strTienePermisosfactura;
		$this->strTienePermisosconsignacion=$termino_pago_cliente_control_session->strTienePermisosconsignacion;
		
		
		$this->id_cuentaFK_Idcuenta=$termino_pago_cliente_control_session->id_cuentaFK_Idcuenta;
		$this->id_empresaFK_Idempresa=$termino_pago_cliente_control_session->id_empresaFK_Idempresa;
		$this->id_tipo_termino_pagoFK_Idtipo_termino_pago=$termino_pago_cliente_control_session->id_tipo_termino_pagoFK_Idtipo_termino_pago;

		
		
		
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
	
	public function gettermino_pago_clienteControllerAdditional() {
		return $this->termino_pago_clienteControllerAdditional;
	}

	public function settermino_pago_clienteControllerAdditional($termino_pago_clienteControllerAdditional) {
		$this->termino_pago_clienteControllerAdditional = $termino_pago_clienteControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function gettermino_pago_clienteActual() : termino_pago_cliente {
		return $this->termino_pago_clienteActual;
	}

	public function settermino_pago_clienteActual(termino_pago_cliente $termino_pago_clienteActual) {
		$this->termino_pago_clienteActual = $termino_pago_clienteActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidtermino_pago_cliente() : int {
		return $this->idtermino_pago_cliente;
	}

	public function setidtermino_pago_cliente(int $idtermino_pago_cliente) {
		$this->idtermino_pago_cliente = $idtermino_pago_cliente;
	}
	
	public function gettermino_pago_cliente() : termino_pago_cliente {
		return $this->termino_pago_cliente;
	}

	public function settermino_pago_cliente(termino_pago_cliente $termino_pago_cliente) {
		$this->termino_pago_cliente = $termino_pago_cliente;
	}
		
	public function gettermino_pago_clienteLogic() : termino_pago_cliente_logic {		
		return $this->termino_pago_clienteLogic;
	}

	public function settermino_pago_clienteLogic(termino_pago_cliente_logic $termino_pago_clienteLogic) {
		$this->termino_pago_clienteLogic = $termino_pago_clienteLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function gettermino_pago_clientesModel() {		
		try {						
			/*termino_pago_clientesModel.setWrappedData(termino_pago_clienteLogic->gettermino_pago_clientes());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->termino_pago_clientesModel;
	}
	
	public function settermino_pago_clientesModel($termino_pago_clientesModel) {
		$this->termino_pago_clientesModel = $termino_pago_clientesModel;
	}
	
	public function gettermino_pago_clientes() : array {		
		return $this->termino_pago_clientes;
	}
	
	public function settermino_pago_clientes(array $termino_pago_clientes) {
		$this->termino_pago_clientes= $termino_pago_clientes;
	}
	
	public function gettermino_pago_clientesEliminados() : array {		
		return $this->termino_pago_clientesEliminados;
	}
	
	public function settermino_pago_clientesEliminados(array $termino_pago_clientesEliminados) {
		$this->termino_pago_clientesEliminados= $termino_pago_clientesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function gettermino_pago_clienteActualFromListDataModel() {
		try {
			/*$termino_pago_clienteClase= $this->termino_pago_clientesModel->getRowData();*/
			
			/*return $termino_pago_cliente;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
