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

namespace com\bydan\contabilidad\cuentaspagar\cuenta_pagar\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/cuenta_pagar/util/cuenta_pagar_carga.php');
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_carga;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_param_return;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\logic\cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\logic\cuenta_pagar_logic_add;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\presentation\session\cuenta_pagar_session;


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

use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;
use com\bydan\contabilidad\inventario\orden_compra\business\logic\orden_compra_logic;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;

use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\business\entity\estado_cuentas_pagar;
use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\business\logic\estado_cuentas_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\util\estado_cuentas_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\util\estado_cuentas_pagar_util;

//REL


use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\presentation\session\debito_cuenta_pagar_session;

use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\presentation\session\credito_cuenta_pagar_session;

use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\presentation\session\pago_cuenta_pagar_session;


/*CARGA ARCHIVOS FRAMEWORK*/
cuenta_pagar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class cuenta_pagar_init_control extends ControllerBase {	
	
	public $cuenta_pagarClase=null;	
	public $cuenta_pagarsModel=null;	
	public $cuenta_pagarsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcuenta_pagar=0;	
	public ?int $idcuenta_pagarActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $cuenta_pagarLogic=null;
	
	public $cuenta_pagarActual=null;	
	
	public $cuenta_pagar=null;
	public $cuenta_pagars=null;
	public $cuenta_pagarsEliminados=array();
	public $cuenta_pagarsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $cuenta_pagarsLocal=array();
	public ?array $cuenta_pagarsReporte=null;
	public ?array $cuenta_pagarsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcuenta_pagar='onload';
	public string $strTipoPaginaAuxiliarcuenta_pagar='none';
	public string $strTipoUsuarioAuxiliarcuenta_pagar='none';
		
	public $cuenta_pagarReturnGeneral=null;
	public $cuenta_pagarParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $cuenta_pagarModel=null;
	public $cuenta_pagarControllerAdditional=null;
	
	
	

	public $debitocuentapagarLogic=null;

	public function  getdebito_cuenta_pagarLogic() {
		return $this->debitocuentapagarLogic;
	}

	public function setdebito_cuenta_pagarLogic($debitocuentapagarLogic) {
		$this->debitocuentapagarLogic =$debitocuentapagarLogic;
	}


	public $cuentacorrientedetalleLogic=null;

	public function  getcuenta_corriente_detalleLogic() {
		return $this->cuentacorrientedetalleLogic;
	}

	public function setcuenta_corriente_detalleLogic($cuentacorrientedetalleLogic) {
		$this->cuentacorrientedetalleLogic =$cuentacorrientedetalleLogic;
	}


	public $creditocuentapagarLogic=null;

	public function  getcredito_cuenta_pagarLogic() {
		return $this->creditocuentapagarLogic;
	}

	public function setcredito_cuenta_pagarLogic($creditocuentapagarLogic) {
		$this->creditocuentapagarLogic =$creditocuentapagarLogic;
	}


	public $cuentapagardetalleLogic=null;

	public function  getcuenta_pagar_detalleLogic() {
		return $this->cuentapagardetalleLogic;
	}

	public function setcuenta_pagar_detalleLogic($cuentapagardetalleLogic) {
		$this->cuentapagardetalleLogic =$cuentapagardetalleLogic;
	}


	public $pagocuentapagarLogic=null;

	public function  getpago_cuenta_pagarLogic() {
		return $this->pagocuentapagarLogic;
	}

	public function setpago_cuenta_pagarLogic($pagocuentapagarLogic) {
		$this->pagocuentapagarLogic =$pagocuentapagarLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajeid_orden_compra='';
	public string $strMensajeid_proveedor='';
	public string $strMensajeid_termino_pago_proveedor='';
	public string $strMensajenumero='';
	public string $strMensajefecha_emision='';
	public string $strMensajefecha_vence='';
	public string $strMensajefecha_ultimo_movimiento='';
	public string $strMensajemonto='';
	public string $strMensajesaldo='';
	public string $strMensajeporcentaje='';
	public string $strMensajedescripcion='';
	public string $strMensajeid_estado_cuentas_pagar='';
	public string $strMensajereferencia='';
	
	
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idestado_cuentas_pagar='display:table-row';
	public string $strVisibleFK_Idorden_compra='display:table-row';
	public string $strVisibleFK_Idperiodo='display:table-row';
	public string $strVisibleFK_Idproveedor='display:table-row';
	public string $strVisibleFK_Idsucursal='display:table-row';
	public string $strVisibleFK_Idtermino_pago_proveedor='display:table-row';
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

	public array $orden_comprasFK=array();

	public function getorden_comprasFK():array {
		return $this->orden_comprasFK;
	}

	public function setorden_comprasFK(array $orden_comprasFK) {
		$this->orden_comprasFK = $orden_comprasFK;
	}

	public int $idorden_compraDefaultFK=-1;

	public function getIdorden_compraDefaultFK():int {
		return $this->idorden_compraDefaultFK;
	}

	public function setIdorden_compraDefaultFK(int $idorden_compraDefaultFK) {
		$this->idorden_compraDefaultFK = $idorden_compraDefaultFK;
	}

	public array $proveedorsFK=array();

	public function getproveedorsFK():array {
		return $this->proveedorsFK;
	}

	public function setproveedorsFK(array $proveedorsFK) {
		$this->proveedorsFK = $proveedorsFK;
	}

	public int $idproveedorDefaultFK=-1;

	public function getIdproveedorDefaultFK():int {
		return $this->idproveedorDefaultFK;
	}

	public function setIdproveedorDefaultFK(int $idproveedorDefaultFK) {
		$this->idproveedorDefaultFK = $idproveedorDefaultFK;
	}

	public array $termino_pago_proveedorsFK=array();

	public function gettermino_pago_proveedorsFK():array {
		return $this->termino_pago_proveedorsFK;
	}

	public function settermino_pago_proveedorsFK(array $termino_pago_proveedorsFK) {
		$this->termino_pago_proveedorsFK = $termino_pago_proveedorsFK;
	}

	public int $idtermino_pago_proveedorDefaultFK=-1;

	public function getIdtermino_pago_proveedorDefaultFK():int {
		return $this->idtermino_pago_proveedorDefaultFK;
	}

	public function setIdtermino_pago_proveedorDefaultFK(int $idtermino_pago_proveedorDefaultFK) {
		$this->idtermino_pago_proveedorDefaultFK = $idtermino_pago_proveedorDefaultFK;
	}

	public array $estado_cuentas_pagarsFK=array();

	public function getestado_cuentas_pagarsFK():array {
		return $this->estado_cuentas_pagarsFK;
	}

	public function setestado_cuentas_pagarsFK(array $estado_cuentas_pagarsFK) {
		$this->estado_cuentas_pagarsFK = $estado_cuentas_pagarsFK;
	}

	public int $idestado_cuentas_pagarDefaultFK=-1;

	public function getIdestado_cuentas_pagarDefaultFK():int {
		return $this->idestado_cuentas_pagarDefaultFK;
	}

	public function setIdestado_cuentas_pagarDefaultFK(int $idestado_cuentas_pagarDefaultFK) {
		$this->idestado_cuentas_pagarDefaultFK = $idestado_cuentas_pagarDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisosdebito_cuenta_pagar='none';
	public $strTienePermisoscuenta_corriente_detalle='none';
	public $strTienePermisoscredito_cuenta_pagar='none';
	public $strTienePermisoscuenta_pagar_detalle='none';
	public $strTienePermisospago_cuenta_pagar='none';
	
	
	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_estado_cuentas_pagarFK_Idestado_cuentas_pagar=null;

	public  $id_orden_compraFK_Idorden_compra=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_proveedorFK_Idproveedor=null;

	public  $id_sucursalFK_Idsucursal=null;

	public  $id_termino_pago_proveedorFK_Idtermino_pago_proveedor=null;

	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->cuenta_pagarLogic==null) {
				$this->cuenta_pagarLogic=new cuenta_pagar_logic();
			}
			
		} else {
			if($this->cuenta_pagarLogic==null) {
				$this->cuenta_pagarLogic=new cuenta_pagar_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->cuenta_pagarClase==null) {
				$this->cuenta_pagarClase=new cuenta_pagar();
			}
			
			$this->cuenta_pagarClase->setId(0);	
				
				
			$this->cuenta_pagarClase->setid_empresa(-1);	
			$this->cuenta_pagarClase->setid_sucursal(-1);	
			$this->cuenta_pagarClase->setid_ejercicio(-1);	
			$this->cuenta_pagarClase->setid_periodo(-1);	
			$this->cuenta_pagarClase->setid_usuario(-1);	
			$this->cuenta_pagarClase->setid_orden_compra(null);	
			$this->cuenta_pagarClase->setid_proveedor(-1);	
			$this->cuenta_pagarClase->setid_termino_pago_proveedor(-1);	
			$this->cuenta_pagarClase->setnumero('');	
			$this->cuenta_pagarClase->setfecha_emision(date('Y-m-d'));	
			$this->cuenta_pagarClase->setfecha_vence(date('Y-m-d'));	
			$this->cuenta_pagarClase->setfecha_ultimo_movimiento(date('Y-m-d'));	
			$this->cuenta_pagarClase->setmonto(0.0);	
			$this->cuenta_pagarClase->setsaldo(0.0);	
			$this->cuenta_pagarClase->setporcentaje(0.0);	
			$this->cuenta_pagarClase->setdescripcion('');	
			$this->cuenta_pagarClase->setid_estado_cuentas_pagar(-1);	
			$this->cuenta_pagarClase->setreferencia('');	
			
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
		$this->prepararEjecutarMantenimientoBase('cuenta_pagar');
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
		$this->cargarParametrosReporteBase('cuenta_pagar');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('cuenta_pagar');
	}
	
	public function actualizarControllerConReturnGeneral(cuenta_pagar_param_return $cuenta_pagarReturnGeneral) {
		if($cuenta_pagarReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescuenta_pagarsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$cuenta_pagarReturnGeneral->getsMensajeProceso();
		}
		
		if($cuenta_pagarReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$cuenta_pagarReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($cuenta_pagarReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$cuenta_pagarReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$cuenta_pagarReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($cuenta_pagarReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($cuenta_pagarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$cuenta_pagarReturnGeneral->getsFuncionJs();
		}
		
		if($cuenta_pagarReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(cuenta_pagar_session $cuenta_pagar_session){
		$this->strStyleDivArbol=$cuenta_pagar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cuenta_pagar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cuenta_pagar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cuenta_pagar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cuenta_pagar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cuenta_pagar_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$cuenta_pagar_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(cuenta_pagar_session $cuenta_pagar_session){
		$cuenta_pagar_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$cuenta_pagar_session->strStyleDivHeader='display:none';			
		$cuenta_pagar_session->strStyleDivContent='width:93%;height:100%';	
		$cuenta_pagar_session->strStyleDivOpcionesBanner='display:none';	
		$cuenta_pagar_session->strStyleDivExpandirColapsar='display:none';	
		$cuenta_pagar_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(cuenta_pagar_control $cuenta_pagar_control_session){
		$this->idNuevo=$cuenta_pagar_control_session->idNuevo;
		$this->cuenta_pagarActual=$cuenta_pagar_control_session->cuenta_pagarActual;
		$this->cuenta_pagar=$cuenta_pagar_control_session->cuenta_pagar;
		$this->cuenta_pagarClase=$cuenta_pagar_control_session->cuenta_pagarClase;
		$this->cuenta_pagars=$cuenta_pagar_control_session->cuenta_pagars;
		$this->cuenta_pagarsEliminados=$cuenta_pagar_control_session->cuenta_pagarsEliminados;
		$this->cuenta_pagar=$cuenta_pagar_control_session->cuenta_pagar;
		$this->cuenta_pagarsReporte=$cuenta_pagar_control_session->cuenta_pagarsReporte;
		$this->cuenta_pagarsSeleccionados=$cuenta_pagar_control_session->cuenta_pagarsSeleccionados;
		$this->arrOrderBy=$cuenta_pagar_control_session->arrOrderBy;
		$this->arrOrderByRel=$cuenta_pagar_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$cuenta_pagar_control_session->arrHistoryWebs;
		$this->arrSessionBases=$cuenta_pagar_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcuenta_pagar=$cuenta_pagar_control_session->strTypeOnLoadcuenta_pagar;
		$this->strTipoPaginaAuxiliarcuenta_pagar=$cuenta_pagar_control_session->strTipoPaginaAuxiliarcuenta_pagar;
		$this->strTipoUsuarioAuxiliarcuenta_pagar=$cuenta_pagar_control_session->strTipoUsuarioAuxiliarcuenta_pagar;	
		
		$this->bitEsPopup=$cuenta_pagar_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$cuenta_pagar_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$cuenta_pagar_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$cuenta_pagar_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$cuenta_pagar_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$cuenta_pagar_control_session->strSufijo;
		$this->bitEsRelaciones=$cuenta_pagar_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$cuenta_pagar_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$cuenta_pagar_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$cuenta_pagar_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$cuenta_pagar_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$cuenta_pagar_control_session->strTituloTabla;
		$this->strTituloPathPagina=$cuenta_pagar_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$cuenta_pagar_control_session->strTituloPathElementoActual;
		
		if($this->cuenta_pagarLogic==null) {			
			$this->cuenta_pagarLogic=new cuenta_pagar_logic();
		}
		
		
		if($this->cuenta_pagarClase==null) {
			$this->cuenta_pagarClase=new cuenta_pagar();	
		}
		
		$this->cuenta_pagarLogic->setcuenta_pagar($this->cuenta_pagarClase);
		
		
		if($this->cuenta_pagars==null) {
			$this->cuenta_pagars=array();	
		}
		
		$this->cuenta_pagarLogic->setcuenta_pagars($this->cuenta_pagars);
		
		
		$this->strTipoView=$cuenta_pagar_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$cuenta_pagar_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$cuenta_pagar_control_session->datosCliente;
		$this->strAccionBusqueda=$cuenta_pagar_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$cuenta_pagar_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$cuenta_pagar_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$cuenta_pagar_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$cuenta_pagar_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$cuenta_pagar_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$cuenta_pagar_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$cuenta_pagar_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$cuenta_pagar_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$cuenta_pagar_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$cuenta_pagar_control_session->strTipoPaginacion;
		$this->strTipoAccion=$cuenta_pagar_control_session->strTipoAccion;
		$this->tiposReportes=$cuenta_pagar_control_session->tiposReportes;
		$this->tiposReporte=$cuenta_pagar_control_session->tiposReporte;
		$this->tiposAcciones=$cuenta_pagar_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$cuenta_pagar_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$cuenta_pagar_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$cuenta_pagar_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$cuenta_pagar_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$cuenta_pagar_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$cuenta_pagar_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$cuenta_pagar_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$cuenta_pagar_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$cuenta_pagar_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$cuenta_pagar_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$cuenta_pagar_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$cuenta_pagar_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$cuenta_pagar_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$cuenta_pagar_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$cuenta_pagar_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$cuenta_pagar_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$cuenta_pagar_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$cuenta_pagar_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$cuenta_pagar_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$cuenta_pagar_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$cuenta_pagar_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$cuenta_pagar_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$cuenta_pagar_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$cuenta_pagar_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$cuenta_pagar_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$cuenta_pagar_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$cuenta_pagar_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$cuenta_pagar_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$cuenta_pagar_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$cuenta_pagar_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$cuenta_pagar_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$cuenta_pagar_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$cuenta_pagar_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$cuenta_pagar_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$cuenta_pagar_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$cuenta_pagar_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$cuenta_pagar_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$cuenta_pagar_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$cuenta_pagar_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$cuenta_pagar_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$cuenta_pagar_control_session->resumenUsuarioActual;	
		$this->moduloActual=$cuenta_pagar_control_session->moduloActual;	
		$this->opcionActual=$cuenta_pagar_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$cuenta_pagar_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$cuenta_pagar_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));
				
		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		$this->strStyleDivArbol=$cuenta_pagar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cuenta_pagar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cuenta_pagar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cuenta_pagar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cuenta_pagar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cuenta_pagar_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$cuenta_pagar_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$cuenta_pagar_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$cuenta_pagar_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$cuenta_pagar_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$cuenta_pagar_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$cuenta_pagar_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$cuenta_pagar_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$cuenta_pagar_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$cuenta_pagar_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$cuenta_pagar_control_session->strMensajeid_usuario;
		$this->strMensajeid_orden_compra=$cuenta_pagar_control_session->strMensajeid_orden_compra;
		$this->strMensajeid_proveedor=$cuenta_pagar_control_session->strMensajeid_proveedor;
		$this->strMensajeid_termino_pago_proveedor=$cuenta_pagar_control_session->strMensajeid_termino_pago_proveedor;
		$this->strMensajenumero=$cuenta_pagar_control_session->strMensajenumero;
		$this->strMensajefecha_emision=$cuenta_pagar_control_session->strMensajefecha_emision;
		$this->strMensajefecha_vence=$cuenta_pagar_control_session->strMensajefecha_vence;
		$this->strMensajefecha_ultimo_movimiento=$cuenta_pagar_control_session->strMensajefecha_ultimo_movimiento;
		$this->strMensajemonto=$cuenta_pagar_control_session->strMensajemonto;
		$this->strMensajesaldo=$cuenta_pagar_control_session->strMensajesaldo;
		$this->strMensajeporcentaje=$cuenta_pagar_control_session->strMensajeporcentaje;
		$this->strMensajedescripcion=$cuenta_pagar_control_session->strMensajedescripcion;
		$this->strMensajeid_estado_cuentas_pagar=$cuenta_pagar_control_session->strMensajeid_estado_cuentas_pagar;
		$this->strMensajereferencia=$cuenta_pagar_control_session->strMensajereferencia;
			
		
		$this->empresasFK=$cuenta_pagar_control_session->empresasFK;
		$this->idempresaDefaultFK=$cuenta_pagar_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$cuenta_pagar_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$cuenta_pagar_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$cuenta_pagar_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$cuenta_pagar_control_session->idejercicioDefaultFK;
		$this->periodosFK=$cuenta_pagar_control_session->periodosFK;
		$this->idperiodoDefaultFK=$cuenta_pagar_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$cuenta_pagar_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$cuenta_pagar_control_session->idusuarioDefaultFK;
		$this->orden_comprasFK=$cuenta_pagar_control_session->orden_comprasFK;
		$this->idorden_compraDefaultFK=$cuenta_pagar_control_session->idorden_compraDefaultFK;
		$this->proveedorsFK=$cuenta_pagar_control_session->proveedorsFK;
		$this->idproveedorDefaultFK=$cuenta_pagar_control_session->idproveedorDefaultFK;
		$this->termino_pago_proveedorsFK=$cuenta_pagar_control_session->termino_pago_proveedorsFK;
		$this->idtermino_pago_proveedorDefaultFK=$cuenta_pagar_control_session->idtermino_pago_proveedorDefaultFK;
		$this->estado_cuentas_pagarsFK=$cuenta_pagar_control_session->estado_cuentas_pagarsFK;
		$this->idestado_cuentas_pagarDefaultFK=$cuenta_pagar_control_session->idestado_cuentas_pagarDefaultFK;
		
		
		$this->strVisibleFK_Idejercicio=$cuenta_pagar_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$cuenta_pagar_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idestado_cuentas_pagar=$cuenta_pagar_control_session->strVisibleFK_Idestado_cuentas_pagar;
		$this->strVisibleFK_Idorden_compra=$cuenta_pagar_control_session->strVisibleFK_Idorden_compra;
		$this->strVisibleFK_Idperiodo=$cuenta_pagar_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idproveedor=$cuenta_pagar_control_session->strVisibleFK_Idproveedor;
		$this->strVisibleFK_Idsucursal=$cuenta_pagar_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idtermino_pago_proveedor=$cuenta_pagar_control_session->strVisibleFK_Idtermino_pago_proveedor;
		$this->strVisibleFK_Idusuario=$cuenta_pagar_control_session->strVisibleFK_Idusuario;
		
		
		$this->strTienePermisosdebito_cuenta_pagar=$cuenta_pagar_control_session->strTienePermisosdebito_cuenta_pagar;
		$this->strTienePermisoscuenta_corriente_detalle=$cuenta_pagar_control_session->strTienePermisoscuenta_corriente_detalle;
		$this->strTienePermisoscredito_cuenta_pagar=$cuenta_pagar_control_session->strTienePermisoscredito_cuenta_pagar;
		$this->strTienePermisoscuenta_pagar_detalle=$cuenta_pagar_control_session->strTienePermisoscuenta_pagar_detalle;
		$this->strTienePermisospago_cuenta_pagar=$cuenta_pagar_control_session->strTienePermisospago_cuenta_pagar;
		
		
		$this->id_ejercicioFK_Idejercicio=$cuenta_pagar_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$cuenta_pagar_control_session->id_empresaFK_Idempresa;
		$this->id_estado_cuentas_pagarFK_Idestado_cuentas_pagar=$cuenta_pagar_control_session->id_estado_cuentas_pagarFK_Idestado_cuentas_pagar;
		$this->id_orden_compraFK_Idorden_compra=$cuenta_pagar_control_session->id_orden_compraFK_Idorden_compra;
		$this->id_periodoFK_Idperiodo=$cuenta_pagar_control_session->id_periodoFK_Idperiodo;
		$this->id_proveedorFK_Idproveedor=$cuenta_pagar_control_session->id_proveedorFK_Idproveedor;
		$this->id_sucursalFK_Idsucursal=$cuenta_pagar_control_session->id_sucursalFK_Idsucursal;
		$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor=$cuenta_pagar_control_session->id_termino_pago_proveedorFK_Idtermino_pago_proveedor;
		$this->id_usuarioFK_Idusuario=$cuenta_pagar_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getcuenta_pagarControllerAdditional() {
		return $this->cuenta_pagarControllerAdditional;
	}

	public function setcuenta_pagarControllerAdditional($cuenta_pagarControllerAdditional) {
		$this->cuenta_pagarControllerAdditional = $cuenta_pagarControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcuenta_pagarActual() : cuenta_pagar {
		return $this->cuenta_pagarActual;
	}

	public function setcuenta_pagarActual(cuenta_pagar $cuenta_pagarActual) {
		$this->cuenta_pagarActual = $cuenta_pagarActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcuenta_pagar() : int {
		return $this->idcuenta_pagar;
	}

	public function setidcuenta_pagar(int $idcuenta_pagar) {
		$this->idcuenta_pagar = $idcuenta_pagar;
	}
	
	public function getcuenta_pagar() : cuenta_pagar {
		return $this->cuenta_pagar;
	}

	public function setcuenta_pagar(cuenta_pagar $cuenta_pagar) {
		$this->cuenta_pagar = $cuenta_pagar;
	}
		
	public function getcuenta_pagarLogic() : cuenta_pagar_logic {		
		return $this->cuenta_pagarLogic;
	}

	public function setcuenta_pagarLogic(cuenta_pagar_logic $cuenta_pagarLogic) {
		$this->cuenta_pagarLogic = $cuenta_pagarLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcuenta_pagarsModel() {		
		try {						
			/*cuenta_pagarsModel.setWrappedData(cuenta_pagarLogic->getcuenta_pagars());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->cuenta_pagarsModel;
	}
	
	public function setcuenta_pagarsModel($cuenta_pagarsModel) {
		$this->cuenta_pagarsModel = $cuenta_pagarsModel;
	}
	
	public function getcuenta_pagars() : array {		
		return $this->cuenta_pagars;
	}
	
	public function setcuenta_pagars(array $cuenta_pagars) {
		$this->cuenta_pagars= $cuenta_pagars;
	}
	
	public function getcuenta_pagarsEliminados() : array {		
		return $this->cuenta_pagarsEliminados;
	}
	
	public function setcuenta_pagarsEliminados(array $cuenta_pagarsEliminados) {
		$this->cuenta_pagarsEliminados= $cuenta_pagarsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcuenta_pagarActualFromListDataModel() {
		try {
			/*$cuenta_pagarClase= $this->cuenta_pagarsModel->getRowData();*/
			
			/*return $cuenta_pagar;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
