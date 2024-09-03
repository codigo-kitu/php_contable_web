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

namespace com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\entity\documento_cuenta_pagar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/documento_cuenta_pagar/util/documento_cuenta_pagar_carga.php');
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_carga;

use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_param_return;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\logic\documento_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\presentation\session\documento_cuenta_pagar_session;


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

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\entity\forma_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\logic\forma_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_util;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

//REL


use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;
use com\bydan\contabilidad\inventario\orden_compra\presentation\session\orden_compra_session;

use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\util\imagen_documento_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\util\imagen_documento_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\presentation\session\imagen_documento_cuenta_pagar_session;

use com\bydan\contabilidad\inventario\devolucion\util\devolucion_carga;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_util;
use com\bydan\contabilidad\inventario\devolucion\presentation\session\devolucion_session;


/*CARGA ARCHIVOS FRAMEWORK*/
documento_cuenta_pagar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
documento_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
documento_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
documento_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*documento_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class documento_cuenta_pagar_init_control extends ControllerBase {	
	
	public $documento_cuenta_pagarClase=null;	
	public $documento_cuenta_pagarsModel=null;	
	public $documento_cuenta_pagarsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $iddocumento_cuenta_pagar=0;	
	public ?int $iddocumento_cuenta_pagarActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $documento_cuenta_pagarLogic=null;
	
	public $documento_cuenta_pagarActual=null;	
	
	public $documento_cuenta_pagar=null;
	public $documento_cuenta_pagars=null;
	public $documento_cuenta_pagarsEliminados=array();
	public $documento_cuenta_pagarsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $documento_cuenta_pagarsLocal=array();
	public ?array $documento_cuenta_pagarsReporte=null;
	public ?array $documento_cuenta_pagarsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoaddocumento_cuenta_pagar='onload';
	public string $strTipoPaginaAuxiliardocumento_cuenta_pagar='none';
	public string $strTipoUsuarioAuxiliardocumento_cuenta_pagar='none';
		
	public $documento_cuenta_pagarReturnGeneral=null;
	public $documento_cuenta_pagarParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $documento_cuenta_pagarModel=null;
	public $documento_cuenta_pagarControllerAdditional=null;
	
	
	

	public $ordencompraLogic=null;

	public function  getorden_compraLogic() {
		return $this->ordencompraLogic;
	}

	public function setorden_compraLogic($ordencompraLogic) {
		$this->ordencompraLogic =$ordencompraLogic;
	}


	public $imagendocumentocuentapagarLogic=null;

	public function  getimagen_documento_cuenta_pagarLogic() {
		return $this->imagendocumentocuentapagarLogic;
	}

	public function setimagen_documento_cuenta_pagarLogic($imagendocumentocuentapagarLogic) {
		$this->imagendocumentocuentapagarLogic =$imagendocumentocuentapagarLogic;
	}


	public $devolucionLogic=null;

	public function  getdevolucionLogic() {
		return $this->devolucionLogic;
	}

	public function setdevolucionLogic($devolucionLogic) {
		$this->devolucionLogic =$devolucionLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajenumero='';
	public string $strMensajeid_proveedor='';
	public string $strMensajetipo='';
	public string $strMensajefecha_emision='';
	public string $strMensajedescripcion='';
	public string $strMensajemonto='';
	public string $strMensajemonto_parcial='';
	public string $strMensajemoneda='';
	public string $strMensajefecha_vence='';
	public string $strMensajenumero_de_pagos='';
	public string $strMensajebalance='';
	public string $strMensajebalance_mon='';
	public string $strMensajenumero_pagado='';
	public string $strMensajeid_pagado='';
	public string $strMensajemodulo_origen='';
	public string $strMensajeid_origen='';
	public string $strMensajemodulo_destino='';
	public string $strMensajeid_destino='';
	public string $strMensajenombre_pc='';
	public string $strMensajehora='';
	public string $strMensajemonto_mora='';
	public string $strMensajeinteres_mora='';
	public string $strMensajedias_gracia_mora='';
	public string $strMensajeinstrumento_pago='';
	public string $strMensajetipo_cambio='';
	public string $strMensajenro_documento_proveedor='';
	public string $strMensajeclase_registro='';
	public string $strMensajeestado_registro='';
	public string $strMensajemotivo_anulacion='';
	public string $strMensajeimpuesto_1='';
	public string $strMensajeimpuesto_2='';
	public string $strMensajeimpuesto_incluido='';
	public string $strMensajeobservaciones='';
	public string $strMensajegrupo_pago='';
	public string $strMensajetermino_idpv='';
	public string $strMensajeid_forma_pago_proveedor='';
	public string $strMensajenro_pago='';
	public string $strMensajereferencia_pago='';
	public string $strMensajefecha_hora='';
	public string $strMensajeid_base='';
	public string $strMensajeid_cuenta_corriente='';
	
	
	public string $strVisibleFK_Idcuenta_corriente='display:table-row';
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idforma_pago_proveedor='display:table-row';
	public string $strVisibleFK_Idperiodo='display:table-row';
	public string $strVisibleFK_Idproveedor='display:table-row';
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

	public array $forma_pago_proveedorsFK=array();

	public function getforma_pago_proveedorsFK():array {
		return $this->forma_pago_proveedorsFK;
	}

	public function setforma_pago_proveedorsFK(array $forma_pago_proveedorsFK) {
		$this->forma_pago_proveedorsFK = $forma_pago_proveedorsFK;
	}

	public int $idforma_pago_proveedorDefaultFK=-1;

	public function getIdforma_pago_proveedorDefaultFK():int {
		return $this->idforma_pago_proveedorDefaultFK;
	}

	public function setIdforma_pago_proveedorDefaultFK(int $idforma_pago_proveedorDefaultFK) {
		$this->idforma_pago_proveedorDefaultFK = $idforma_pago_proveedorDefaultFK;
	}

	public array $cuenta_corrientesFK=array();

	public function getcuenta_corrientesFK():array {
		return $this->cuenta_corrientesFK;
	}

	public function setcuenta_corrientesFK(array $cuenta_corrientesFK) {
		$this->cuenta_corrientesFK = $cuenta_corrientesFK;
	}

	public int $idcuenta_corrienteDefaultFK=-1;

	public function getIdcuenta_corrienteDefaultFK():int {
		return $this->idcuenta_corrienteDefaultFK;
	}

	public function setIdcuenta_corrienteDefaultFK(int $idcuenta_corrienteDefaultFK) {
		$this->idcuenta_corrienteDefaultFK = $idcuenta_corrienteDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisosorden_compra='none';
	public $strTienePermisosimagen_documento_cuenta_pagar='none';
	public $strTienePermisosdevolucion='none';
	
	
	public  $id_cuenta_corrienteFK_Idcuenta_corriente=null;

	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_forma_pago_proveedorFK_Idforma_pago_proveedor=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_proveedorFK_Idproveedor=null;

	public  $id_sucursalFK_Idsucursal=null;

	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->documento_cuenta_pagarLogic==null) {
				$this->documento_cuenta_pagarLogic=new documento_cuenta_pagar_logic();
			}
			
		} else {
			if($this->documento_cuenta_pagarLogic==null) {
				$this->documento_cuenta_pagarLogic=new documento_cuenta_pagar_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->documento_cuenta_pagarClase==null) {
				$this->documento_cuenta_pagarClase=new documento_cuenta_pagar();
			}
			
			$this->documento_cuenta_pagarClase->setId(0);	
				
				
			$this->documento_cuenta_pagarClase->setid_empresa(-1);	
			$this->documento_cuenta_pagarClase->setid_sucursal(-1);	
			$this->documento_cuenta_pagarClase->setid_ejercicio(-1);	
			$this->documento_cuenta_pagarClase->setid_periodo(-1);	
			$this->documento_cuenta_pagarClase->setid_usuario(-1);	
			$this->documento_cuenta_pagarClase->setnumero('');	
			$this->documento_cuenta_pagarClase->setid_proveedor(-1);	
			$this->documento_cuenta_pagarClase->settipo('');	
			$this->documento_cuenta_pagarClase->setfecha_emision(date('Y-m-d'));	
			$this->documento_cuenta_pagarClase->setdescripcion('');	
			$this->documento_cuenta_pagarClase->setmonto(0.0);	
			$this->documento_cuenta_pagarClase->setmonto_parcial(0.0);	
			$this->documento_cuenta_pagarClase->setmoneda('');	
			$this->documento_cuenta_pagarClase->setfecha_vence(date('Y-m-d'));	
			$this->documento_cuenta_pagarClase->setnumero_de_pagos(0);	
			$this->documento_cuenta_pagarClase->setbalance(0.0);	
			$this->documento_cuenta_pagarClase->setbalance_mon(0.0);	
			$this->documento_cuenta_pagarClase->setnumero_pagado('');	
			$this->documento_cuenta_pagarClase->setid_pagado(0);	
			$this->documento_cuenta_pagarClase->setmodulo_origen('');	
			$this->documento_cuenta_pagarClase->setid_origen(0);	
			$this->documento_cuenta_pagarClase->setmodulo_destino('');	
			$this->documento_cuenta_pagarClase->setid_destino(0);	
			$this->documento_cuenta_pagarClase->setnombre_pc('');	
			$this->documento_cuenta_pagarClase->sethora(date('Y-m-d'));	
			$this->documento_cuenta_pagarClase->setmonto_mora(0.0);	
			$this->documento_cuenta_pagarClase->setinteres_mora(0.0);	
			$this->documento_cuenta_pagarClase->setdias_gracia_mora(0);	
			$this->documento_cuenta_pagarClase->setinstrumento_pago('');	
			$this->documento_cuenta_pagarClase->settipo_cambio(0.0);	
			$this->documento_cuenta_pagarClase->setnro_documento_proveedor('');	
			$this->documento_cuenta_pagarClase->setclase_registro('');	
			$this->documento_cuenta_pagarClase->setestado_registro('');	
			$this->documento_cuenta_pagarClase->setmotivo_anulacion('');	
			$this->documento_cuenta_pagarClase->setimpuesto_1(0.0);	
			$this->documento_cuenta_pagarClase->setimpuesto_2(0.0);	
			$this->documento_cuenta_pagarClase->setimpuesto_incluido(false);	
			$this->documento_cuenta_pagarClase->setobservaciones('');	
			$this->documento_cuenta_pagarClase->setgrupo_pago('');	
			$this->documento_cuenta_pagarClase->settermino_idpv(0);	
			$this->documento_cuenta_pagarClase->setid_forma_pago_proveedor(-1);	
			$this->documento_cuenta_pagarClase->setnro_pago('');	
			$this->documento_cuenta_pagarClase->setreferencia_pago('');	
			$this->documento_cuenta_pagarClase->setfecha_hora(date('Y-m-d'));	
			$this->documento_cuenta_pagarClase->setid_base(0);	
			$this->documento_cuenta_pagarClase->setid_cuenta_corriente(-1);	
			
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
		$this->prepararEjecutarMantenimientoBase('documento_cuenta_pagar');
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
		$this->cargarParametrosReporteBase('documento_cuenta_pagar');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('documento_cuenta_pagar');
	}
	
	public function actualizarControllerConReturnGeneral(documento_cuenta_pagar_param_return $documento_cuenta_pagarReturnGeneral) {
		if($documento_cuenta_pagarReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesdocumento_cuenta_pagarsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$documento_cuenta_pagarReturnGeneral->getsMensajeProceso();
		}
		
		if($documento_cuenta_pagarReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$documento_cuenta_pagarReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($documento_cuenta_pagarReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$documento_cuenta_pagarReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$documento_cuenta_pagarReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($documento_cuenta_pagarReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($documento_cuenta_pagarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$documento_cuenta_pagarReturnGeneral->getsFuncionJs();
		}
		
		if($documento_cuenta_pagarReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(documento_cuenta_pagar_session $documento_cuenta_pagar_session){
		$this->strStyleDivArbol=$documento_cuenta_pagar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$documento_cuenta_pagar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$documento_cuenta_pagar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$documento_cuenta_pagar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$documento_cuenta_pagar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$documento_cuenta_pagar_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$documento_cuenta_pagar_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(documento_cuenta_pagar_session $documento_cuenta_pagar_session){
		$documento_cuenta_pagar_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$documento_cuenta_pagar_session->strStyleDivHeader='display:none';			
		$documento_cuenta_pagar_session->strStyleDivContent='width:93%;height:100%';	
		$documento_cuenta_pagar_session->strStyleDivOpcionesBanner='display:none';	
		$documento_cuenta_pagar_session->strStyleDivExpandirColapsar='display:none';	
		$documento_cuenta_pagar_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(documento_cuenta_pagar_control $documento_cuenta_pagar_control_session){
		$this->idNuevo=$documento_cuenta_pagar_control_session->idNuevo;
		$this->documento_cuenta_pagarActual=$documento_cuenta_pagar_control_session->documento_cuenta_pagarActual;
		$this->documento_cuenta_pagar=$documento_cuenta_pagar_control_session->documento_cuenta_pagar;
		$this->documento_cuenta_pagarClase=$documento_cuenta_pagar_control_session->documento_cuenta_pagarClase;
		$this->documento_cuenta_pagars=$documento_cuenta_pagar_control_session->documento_cuenta_pagars;
		$this->documento_cuenta_pagarsEliminados=$documento_cuenta_pagar_control_session->documento_cuenta_pagarsEliminados;
		$this->documento_cuenta_pagar=$documento_cuenta_pagar_control_session->documento_cuenta_pagar;
		$this->documento_cuenta_pagarsReporte=$documento_cuenta_pagar_control_session->documento_cuenta_pagarsReporte;
		$this->documento_cuenta_pagarsSeleccionados=$documento_cuenta_pagar_control_session->documento_cuenta_pagarsSeleccionados;
		$this->arrOrderBy=$documento_cuenta_pagar_control_session->arrOrderBy;
		$this->arrOrderByRel=$documento_cuenta_pagar_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$documento_cuenta_pagar_control_session->arrHistoryWebs;
		$this->arrSessionBases=$documento_cuenta_pagar_control_session->arrSessionBases;		
		
		$this->strTypeOnLoaddocumento_cuenta_pagar=$documento_cuenta_pagar_control_session->strTypeOnLoaddocumento_cuenta_pagar;
		$this->strTipoPaginaAuxiliardocumento_cuenta_pagar=$documento_cuenta_pagar_control_session->strTipoPaginaAuxiliardocumento_cuenta_pagar;
		$this->strTipoUsuarioAuxiliardocumento_cuenta_pagar=$documento_cuenta_pagar_control_session->strTipoUsuarioAuxiliardocumento_cuenta_pagar;	
		
		$this->bitEsPopup=$documento_cuenta_pagar_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$documento_cuenta_pagar_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$documento_cuenta_pagar_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$documento_cuenta_pagar_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$documento_cuenta_pagar_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$documento_cuenta_pagar_control_session->strSufijo;
		$this->bitEsRelaciones=$documento_cuenta_pagar_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$documento_cuenta_pagar_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$documento_cuenta_pagar_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$documento_cuenta_pagar_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$documento_cuenta_pagar_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$documento_cuenta_pagar_control_session->strTituloTabla;
		$this->strTituloPathPagina=$documento_cuenta_pagar_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$documento_cuenta_pagar_control_session->strTituloPathElementoActual;
		
		if($this->documento_cuenta_pagarLogic==null) {			
			$this->documento_cuenta_pagarLogic=new documento_cuenta_pagar_logic();
		}
		
		
		if($this->documento_cuenta_pagarClase==null) {
			$this->documento_cuenta_pagarClase=new documento_cuenta_pagar();	
		}
		
		$this->documento_cuenta_pagarLogic->setdocumento_cuenta_pagar($this->documento_cuenta_pagarClase);
		
		
		if($this->documento_cuenta_pagars==null) {
			$this->documento_cuenta_pagars=array();	
		}
		
		$this->documento_cuenta_pagarLogic->setdocumento_cuenta_pagars($this->documento_cuenta_pagars);
		
		
		$this->strTipoView=$documento_cuenta_pagar_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$documento_cuenta_pagar_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$documento_cuenta_pagar_control_session->datosCliente;
		$this->strAccionBusqueda=$documento_cuenta_pagar_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$documento_cuenta_pagar_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$documento_cuenta_pagar_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$documento_cuenta_pagar_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$documento_cuenta_pagar_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$documento_cuenta_pagar_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$documento_cuenta_pagar_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$documento_cuenta_pagar_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$documento_cuenta_pagar_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$documento_cuenta_pagar_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$documento_cuenta_pagar_control_session->strTipoPaginacion;
		$this->strTipoAccion=$documento_cuenta_pagar_control_session->strTipoAccion;
		$this->tiposReportes=$documento_cuenta_pagar_control_session->tiposReportes;
		$this->tiposReporte=$documento_cuenta_pagar_control_session->tiposReporte;
		$this->tiposAcciones=$documento_cuenta_pagar_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$documento_cuenta_pagar_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$documento_cuenta_pagar_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$documento_cuenta_pagar_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$documento_cuenta_pagar_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$documento_cuenta_pagar_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$documento_cuenta_pagar_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$documento_cuenta_pagar_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$documento_cuenta_pagar_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$documento_cuenta_pagar_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$documento_cuenta_pagar_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$documento_cuenta_pagar_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$documento_cuenta_pagar_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$documento_cuenta_pagar_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$documento_cuenta_pagar_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$documento_cuenta_pagar_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$documento_cuenta_pagar_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$documento_cuenta_pagar_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$documento_cuenta_pagar_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$documento_cuenta_pagar_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$documento_cuenta_pagar_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$documento_cuenta_pagar_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$documento_cuenta_pagar_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$documento_cuenta_pagar_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$documento_cuenta_pagar_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$documento_cuenta_pagar_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$documento_cuenta_pagar_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$documento_cuenta_pagar_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$documento_cuenta_pagar_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$documento_cuenta_pagar_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$documento_cuenta_pagar_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$documento_cuenta_pagar_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$documento_cuenta_pagar_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$documento_cuenta_pagar_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$documento_cuenta_pagar_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$documento_cuenta_pagar_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$documento_cuenta_pagar_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$documento_cuenta_pagar_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$documento_cuenta_pagar_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$documento_cuenta_pagar_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$documento_cuenta_pagar_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$documento_cuenta_pagar_control_session->resumenUsuarioActual;	
		$this->moduloActual=$documento_cuenta_pagar_control_session->moduloActual;	
		$this->opcionActual=$documento_cuenta_pagar_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$documento_cuenta_pagar_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$documento_cuenta_pagar_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$documento_cuenta_pagar_session=unserialize($this->Session->read(documento_cuenta_pagar_util::$STR_SESSION_NAME));
				
		if($documento_cuenta_pagar_session==null) {
			$documento_cuenta_pagar_session=new documento_cuenta_pagar_session();
		}
		
		$this->strStyleDivArbol=$documento_cuenta_pagar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$documento_cuenta_pagar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$documento_cuenta_pagar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$documento_cuenta_pagar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$documento_cuenta_pagar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$documento_cuenta_pagar_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$documento_cuenta_pagar_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$documento_cuenta_pagar_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$documento_cuenta_pagar_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$documento_cuenta_pagar_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$documento_cuenta_pagar_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$documento_cuenta_pagar_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$documento_cuenta_pagar_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$documento_cuenta_pagar_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$documento_cuenta_pagar_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$documento_cuenta_pagar_control_session->strMensajeid_usuario;
		$this->strMensajenumero=$documento_cuenta_pagar_control_session->strMensajenumero;
		$this->strMensajeid_proveedor=$documento_cuenta_pagar_control_session->strMensajeid_proveedor;
		$this->strMensajetipo=$documento_cuenta_pagar_control_session->strMensajetipo;
		$this->strMensajefecha_emision=$documento_cuenta_pagar_control_session->strMensajefecha_emision;
		$this->strMensajedescripcion=$documento_cuenta_pagar_control_session->strMensajedescripcion;
		$this->strMensajemonto=$documento_cuenta_pagar_control_session->strMensajemonto;
		$this->strMensajemonto_parcial=$documento_cuenta_pagar_control_session->strMensajemonto_parcial;
		$this->strMensajemoneda=$documento_cuenta_pagar_control_session->strMensajemoneda;
		$this->strMensajefecha_vence=$documento_cuenta_pagar_control_session->strMensajefecha_vence;
		$this->strMensajenumero_de_pagos=$documento_cuenta_pagar_control_session->strMensajenumero_de_pagos;
		$this->strMensajebalance=$documento_cuenta_pagar_control_session->strMensajebalance;
		$this->strMensajebalance_mon=$documento_cuenta_pagar_control_session->strMensajebalance_mon;
		$this->strMensajenumero_pagado=$documento_cuenta_pagar_control_session->strMensajenumero_pagado;
		$this->strMensajeid_pagado=$documento_cuenta_pagar_control_session->strMensajeid_pagado;
		$this->strMensajemodulo_origen=$documento_cuenta_pagar_control_session->strMensajemodulo_origen;
		$this->strMensajeid_origen=$documento_cuenta_pagar_control_session->strMensajeid_origen;
		$this->strMensajemodulo_destino=$documento_cuenta_pagar_control_session->strMensajemodulo_destino;
		$this->strMensajeid_destino=$documento_cuenta_pagar_control_session->strMensajeid_destino;
		$this->strMensajenombre_pc=$documento_cuenta_pagar_control_session->strMensajenombre_pc;
		$this->strMensajehora=$documento_cuenta_pagar_control_session->strMensajehora;
		$this->strMensajemonto_mora=$documento_cuenta_pagar_control_session->strMensajemonto_mora;
		$this->strMensajeinteres_mora=$documento_cuenta_pagar_control_session->strMensajeinteres_mora;
		$this->strMensajedias_gracia_mora=$documento_cuenta_pagar_control_session->strMensajedias_gracia_mora;
		$this->strMensajeinstrumento_pago=$documento_cuenta_pagar_control_session->strMensajeinstrumento_pago;
		$this->strMensajetipo_cambio=$documento_cuenta_pagar_control_session->strMensajetipo_cambio;
		$this->strMensajenro_documento_proveedor=$documento_cuenta_pagar_control_session->strMensajenro_documento_proveedor;
		$this->strMensajeclase_registro=$documento_cuenta_pagar_control_session->strMensajeclase_registro;
		$this->strMensajeestado_registro=$documento_cuenta_pagar_control_session->strMensajeestado_registro;
		$this->strMensajemotivo_anulacion=$documento_cuenta_pagar_control_session->strMensajemotivo_anulacion;
		$this->strMensajeimpuesto_1=$documento_cuenta_pagar_control_session->strMensajeimpuesto_1;
		$this->strMensajeimpuesto_2=$documento_cuenta_pagar_control_session->strMensajeimpuesto_2;
		$this->strMensajeimpuesto_incluido=$documento_cuenta_pagar_control_session->strMensajeimpuesto_incluido;
		$this->strMensajeobservaciones=$documento_cuenta_pagar_control_session->strMensajeobservaciones;
		$this->strMensajegrupo_pago=$documento_cuenta_pagar_control_session->strMensajegrupo_pago;
		$this->strMensajetermino_idpv=$documento_cuenta_pagar_control_session->strMensajetermino_idpv;
		$this->strMensajeid_forma_pago_proveedor=$documento_cuenta_pagar_control_session->strMensajeid_forma_pago_proveedor;
		$this->strMensajenro_pago=$documento_cuenta_pagar_control_session->strMensajenro_pago;
		$this->strMensajereferencia_pago=$documento_cuenta_pagar_control_session->strMensajereferencia_pago;
		$this->strMensajefecha_hora=$documento_cuenta_pagar_control_session->strMensajefecha_hora;
		$this->strMensajeid_base=$documento_cuenta_pagar_control_session->strMensajeid_base;
		$this->strMensajeid_cuenta_corriente=$documento_cuenta_pagar_control_session->strMensajeid_cuenta_corriente;
			
		
		$this->empresasFK=$documento_cuenta_pagar_control_session->empresasFK;
		$this->idempresaDefaultFK=$documento_cuenta_pagar_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$documento_cuenta_pagar_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$documento_cuenta_pagar_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$documento_cuenta_pagar_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$documento_cuenta_pagar_control_session->idejercicioDefaultFK;
		$this->periodosFK=$documento_cuenta_pagar_control_session->periodosFK;
		$this->idperiodoDefaultFK=$documento_cuenta_pagar_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$documento_cuenta_pagar_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$documento_cuenta_pagar_control_session->idusuarioDefaultFK;
		$this->proveedorsFK=$documento_cuenta_pagar_control_session->proveedorsFK;
		$this->idproveedorDefaultFK=$documento_cuenta_pagar_control_session->idproveedorDefaultFK;
		$this->forma_pago_proveedorsFK=$documento_cuenta_pagar_control_session->forma_pago_proveedorsFK;
		$this->idforma_pago_proveedorDefaultFK=$documento_cuenta_pagar_control_session->idforma_pago_proveedorDefaultFK;
		$this->cuenta_corrientesFK=$documento_cuenta_pagar_control_session->cuenta_corrientesFK;
		$this->idcuenta_corrienteDefaultFK=$documento_cuenta_pagar_control_session->idcuenta_corrienteDefaultFK;
		
		
		$this->strVisibleFK_Idcuenta_corriente=$documento_cuenta_pagar_control_session->strVisibleFK_Idcuenta_corriente;
		$this->strVisibleFK_Idejercicio=$documento_cuenta_pagar_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$documento_cuenta_pagar_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idforma_pago_proveedor=$documento_cuenta_pagar_control_session->strVisibleFK_Idforma_pago_proveedor;
		$this->strVisibleFK_Idperiodo=$documento_cuenta_pagar_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idproveedor=$documento_cuenta_pagar_control_session->strVisibleFK_Idproveedor;
		$this->strVisibleFK_Idsucursal=$documento_cuenta_pagar_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idusuario=$documento_cuenta_pagar_control_session->strVisibleFK_Idusuario;
		
		
		$this->strTienePermisosorden_compra=$documento_cuenta_pagar_control_session->strTienePermisosorden_compra;
		$this->strTienePermisosimagen_documento_cuenta_pagar=$documento_cuenta_pagar_control_session->strTienePermisosimagen_documento_cuenta_pagar;
		$this->strTienePermisosdevolucion=$documento_cuenta_pagar_control_session->strTienePermisosdevolucion;
		
		
		$this->id_cuenta_corrienteFK_Idcuenta_corriente=$documento_cuenta_pagar_control_session->id_cuenta_corrienteFK_Idcuenta_corriente;
		$this->id_ejercicioFK_Idejercicio=$documento_cuenta_pagar_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$documento_cuenta_pagar_control_session->id_empresaFK_Idempresa;
		$this->id_forma_pago_proveedorFK_Idforma_pago_proveedor=$documento_cuenta_pagar_control_session->id_forma_pago_proveedorFK_Idforma_pago_proveedor;
		$this->id_periodoFK_Idperiodo=$documento_cuenta_pagar_control_session->id_periodoFK_Idperiodo;
		$this->id_proveedorFK_Idproveedor=$documento_cuenta_pagar_control_session->id_proveedorFK_Idproveedor;
		$this->id_sucursalFK_Idsucursal=$documento_cuenta_pagar_control_session->id_sucursalFK_Idsucursal;
		$this->id_usuarioFK_Idusuario=$documento_cuenta_pagar_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getdocumento_cuenta_pagarControllerAdditional() {
		return $this->documento_cuenta_pagarControllerAdditional;
	}

	public function setdocumento_cuenta_pagarControllerAdditional($documento_cuenta_pagarControllerAdditional) {
		$this->documento_cuenta_pagarControllerAdditional = $documento_cuenta_pagarControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getdocumento_cuenta_pagarActual() : documento_cuenta_pagar {
		return $this->documento_cuenta_pagarActual;
	}

	public function setdocumento_cuenta_pagarActual(documento_cuenta_pagar $documento_cuenta_pagarActual) {
		$this->documento_cuenta_pagarActual = $documento_cuenta_pagarActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getiddocumento_cuenta_pagar() : int {
		return $this->iddocumento_cuenta_pagar;
	}

	public function setiddocumento_cuenta_pagar(int $iddocumento_cuenta_pagar) {
		$this->iddocumento_cuenta_pagar = $iddocumento_cuenta_pagar;
	}
	
	public function getdocumento_cuenta_pagar() : documento_cuenta_pagar {
		return $this->documento_cuenta_pagar;
	}

	public function setdocumento_cuenta_pagar(documento_cuenta_pagar $documento_cuenta_pagar) {
		$this->documento_cuenta_pagar = $documento_cuenta_pagar;
	}
		
	public function getdocumento_cuenta_pagarLogic() : documento_cuenta_pagar_logic {		
		return $this->documento_cuenta_pagarLogic;
	}

	public function setdocumento_cuenta_pagarLogic(documento_cuenta_pagar_logic $documento_cuenta_pagarLogic) {
		$this->documento_cuenta_pagarLogic = $documento_cuenta_pagarLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getdocumento_cuenta_pagarsModel() {		
		try {						
			/*documento_cuenta_pagarsModel.setWrappedData(documento_cuenta_pagarLogic->getdocumento_cuenta_pagars());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->documento_cuenta_pagarsModel;
	}
	
	public function setdocumento_cuenta_pagarsModel($documento_cuenta_pagarsModel) {
		$this->documento_cuenta_pagarsModel = $documento_cuenta_pagarsModel;
	}
	
	public function getdocumento_cuenta_pagars() : array {		
		return $this->documento_cuenta_pagars;
	}
	
	public function setdocumento_cuenta_pagars(array $documento_cuenta_pagars) {
		$this->documento_cuenta_pagars= $documento_cuenta_pagars;
	}
	
	public function getdocumento_cuenta_pagarsEliminados() : array {		
		return $this->documento_cuenta_pagarsEliminados;
	}
	
	public function setdocumento_cuenta_pagarsEliminados(array $documento_cuenta_pagarsEliminados) {
		$this->documento_cuenta_pagarsEliminados= $documento_cuenta_pagarsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getdocumento_cuenta_pagarActualFromListDataModel() {
		try {
			/*$documento_cuenta_pagarClase= $this->documento_cuenta_pagarsModel->getRowData();*/
			
			/*return $documento_cuenta_pagar;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
