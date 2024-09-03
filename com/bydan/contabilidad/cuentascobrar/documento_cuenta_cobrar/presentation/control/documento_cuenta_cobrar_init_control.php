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

namespace com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\presentation\control;

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

use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\entity\documento_cuenta_cobrar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/documento_cuenta_cobrar/util/documento_cuenta_cobrar_carga.php');
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_carga;

use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_param_return;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\logic\documento_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\presentation\session\documento_cuenta_cobrar_session;


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

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\entity\forma_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\logic\forma_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_util;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

//REL


use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;
use com\bydan\contabilidad\facturacion\factura\presentation\session\factura_session;

use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\util\imagen_documento_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\util\imagen_documento_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\presentation\session\imagen_documento_cuenta_cobrar_session;

use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_carga;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;
use com\bydan\contabilidad\facturacion\factura_lote\presentation\session\factura_lote_session;

use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;
use com\bydan\contabilidad\facturacion\devolucion_factura\presentation\session\devolucion_factura_session;


/*CARGA ARCHIVOS FRAMEWORK*/
documento_cuenta_cobrar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
documento_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
documento_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class documento_cuenta_cobrar_init_control extends ControllerBase {	
	
	public $documento_cuenta_cobrarClase=null;	
	public $documento_cuenta_cobrarsModel=null;	
	public $documento_cuenta_cobrarsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $iddocumento_cuenta_cobrar=0;	
	public ?int $iddocumento_cuenta_cobrarActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $documento_cuenta_cobrarLogic=null;
	
	public $documento_cuenta_cobrarActual=null;	
	
	public $documento_cuenta_cobrar=null;
	public $documento_cuenta_cobrars=null;
	public $documento_cuenta_cobrarsEliminados=array();
	public $documento_cuenta_cobrarsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $documento_cuenta_cobrarsLocal=array();
	public ?array $documento_cuenta_cobrarsReporte=null;
	public ?array $documento_cuenta_cobrarsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoaddocumento_cuenta_cobrar='onload';
	public string $strTipoPaginaAuxiliardocumento_cuenta_cobrar='none';
	public string $strTipoUsuarioAuxiliardocumento_cuenta_cobrar='none';
		
	public $documento_cuenta_cobrarReturnGeneral=null;
	public $documento_cuenta_cobrarParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $documento_cuenta_cobrarModel=null;
	public $documento_cuenta_cobrarControllerAdditional=null;
	
	
	

	public $facturaLogic=null;

	public function  getfacturaLogic() {
		return $this->facturaLogic;
	}

	public function setfacturaLogic($facturaLogic) {
		$this->facturaLogic =$facturaLogic;
	}


	public $imagendocumentocuentacobrarLogic=null;

	public function  getimagen_documento_cuenta_cobrarLogic() {
		return $this->imagendocumentocuentacobrarLogic;
	}

	public function setimagen_documento_cuenta_cobrarLogic($imagendocumentocuentacobrarLogic) {
		$this->imagendocumentocuentacobrarLogic =$imagendocumentocuentacobrarLogic;
	}


	public $facturaloteLogic=null;

	public function  getfactura_loteLogic() {
		return $this->facturaloteLogic;
	}

	public function setfactura_loteLogic($facturaloteLogic) {
		$this->facturaloteLogic =$facturaloteLogic;
	}


	public $devolucionfacturaLogic=null;

	public function  getdevolucion_facturaLogic() {
		return $this->devolucionfacturaLogic;
	}

	public function setdevolucion_facturaLogic($devolucionfacturaLogic) {
		$this->devolucionfacturaLogic =$devolucionfacturaLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajenumero='';
	public string $strMensajeid_cliente='';
	public string $strMensajetipo='';
	public string $strMensajefecha_emision='';
	public string $strMensajedescripcion='';
	public string $strMensajemonto='';
	public string $strMensajemonto_parcial='';
	public string $strMensajemoneda='';
	public string $strMensajefecha_vence='';
	public string $strMensajenumero_de_pagos='';
	public string $strMensajebalance='';
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
	public string $strMensajenumero_cliente='';
	public string $strMensajeclase_registro='';
	public string $strMensajeestado_registro='';
	public string $strMensajemotivo_anulacion='';
	public string $strMensajeimpuesto_1='';
	public string $strMensajeimpuesto_2='';
	public string $strMensajeimpuesto_incluido='';
	public string $strMensajeobservaciones='';
	public string $strMensajegrupo_pago='';
	public string $strMensajetermino_idpv='';
	public string $strMensajeid_forma_pago_cliente='';
	public string $strMensajenro_pago='';
	public string $strMensajeref_pago='';
	public string $strMensajefecha_hora='';
	public string $strMensajeid_base='';
	public string $strMensajeid_cuenta_corriente='';
	public string $strMensajencf='';
	
	
	public string $strVisibleFK_Idcliente='display:table-row';
	public string $strVisibleFK_Idcuenta_corriente='display:table-row';
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idforma_pago_cliente='display:table-row';
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

	public array $forma_pago_clientesFK=array();

	public function getforma_pago_clientesFK():array {
		return $this->forma_pago_clientesFK;
	}

	public function setforma_pago_clientesFK(array $forma_pago_clientesFK) {
		$this->forma_pago_clientesFK = $forma_pago_clientesFK;
	}

	public int $idforma_pago_clienteDefaultFK=-1;

	public function getIdforma_pago_clienteDefaultFK():int {
		return $this->idforma_pago_clienteDefaultFK;
	}

	public function setIdforma_pago_clienteDefaultFK(int $idforma_pago_clienteDefaultFK) {
		$this->idforma_pago_clienteDefaultFK = $idforma_pago_clienteDefaultFK;
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

	
	
	
	
	
	
	public $strTienePermisosfactura='none';
	public $strTienePermisosimagen_documento_cuenta_cobrar='none';
	public $strTienePermisosfactura_lote='none';
	public $strTienePermisosdevolucion_factura='none';
	
	
	public  $id_clienteFK_Idcliente=null;

	public  $id_cuenta_corrienteFK_Idcuenta_corriente=null;

	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_forma_pago_clienteFK_Idforma_pago_cliente=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_sucursalFK_Idsucursal=null;

	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->documento_cuenta_cobrarLogic==null) {
				$this->documento_cuenta_cobrarLogic=new documento_cuenta_cobrar_logic();
			}
			
		} else {
			if($this->documento_cuenta_cobrarLogic==null) {
				$this->documento_cuenta_cobrarLogic=new documento_cuenta_cobrar_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->documento_cuenta_cobrarClase==null) {
				$this->documento_cuenta_cobrarClase=new documento_cuenta_cobrar();
			}
			
			$this->documento_cuenta_cobrarClase->setId(0);	
				
				
			$this->documento_cuenta_cobrarClase->setid_empresa(-1);	
			$this->documento_cuenta_cobrarClase->setid_sucursal(-1);	
			$this->documento_cuenta_cobrarClase->setid_ejercicio(-1);	
			$this->documento_cuenta_cobrarClase->setid_periodo(-1);	
			$this->documento_cuenta_cobrarClase->setid_usuario(-1);	
			$this->documento_cuenta_cobrarClase->setnumero('');	
			$this->documento_cuenta_cobrarClase->setid_cliente(-1);	
			$this->documento_cuenta_cobrarClase->settipo('');	
			$this->documento_cuenta_cobrarClase->setfecha_emision(date('Y-m-d'));	
			$this->documento_cuenta_cobrarClase->setdescripcion('');	
			$this->documento_cuenta_cobrarClase->setmonto(0.0);	
			$this->documento_cuenta_cobrarClase->setmonto_parcial(0.0);	
			$this->documento_cuenta_cobrarClase->setmoneda('');	
			$this->documento_cuenta_cobrarClase->setfecha_vence(date('Y-m-d'));	
			$this->documento_cuenta_cobrarClase->setnumero_de_pagos(0);	
			$this->documento_cuenta_cobrarClase->setbalance(0.0);	
			$this->documento_cuenta_cobrarClase->setnumero_pagado('');	
			$this->documento_cuenta_cobrarClase->setid_pagado(0);	
			$this->documento_cuenta_cobrarClase->setmodulo_origen('');	
			$this->documento_cuenta_cobrarClase->setid_origen(0);	
			$this->documento_cuenta_cobrarClase->setmodulo_destino('');	
			$this->documento_cuenta_cobrarClase->setid_destino(0);	
			$this->documento_cuenta_cobrarClase->setnombre_pc('');	
			$this->documento_cuenta_cobrarClase->sethora(date('Y-m-d'));	
			$this->documento_cuenta_cobrarClase->setmonto_mora(0.0);	
			$this->documento_cuenta_cobrarClase->setinteres_mora(0.0);	
			$this->documento_cuenta_cobrarClase->setdias_gracia_mora(0);	
			$this->documento_cuenta_cobrarClase->setinstrumento_pago('');	
			$this->documento_cuenta_cobrarClase->settipo_cambio(0.0);	
			$this->documento_cuenta_cobrarClase->setnumero_cliente('');	
			$this->documento_cuenta_cobrarClase->setclase_registro('');	
			$this->documento_cuenta_cobrarClase->setestado_registro('');	
			$this->documento_cuenta_cobrarClase->setmotivo_anulacion('');	
			$this->documento_cuenta_cobrarClase->setimpuesto_1(0.0);	
			$this->documento_cuenta_cobrarClase->setimpuesto_2(0.0);	
			$this->documento_cuenta_cobrarClase->setimpuesto_incluido('');	
			$this->documento_cuenta_cobrarClase->setobservaciones('');	
			$this->documento_cuenta_cobrarClase->setgrupo_pago('');	
			$this->documento_cuenta_cobrarClase->settermino_idpv(0);	
			$this->documento_cuenta_cobrarClase->setid_forma_pago_cliente(-1);	
			$this->documento_cuenta_cobrarClase->setnro_pago('');	
			$this->documento_cuenta_cobrarClase->setref_pago('');	
			$this->documento_cuenta_cobrarClase->setfecha_hora(date('Y-m-d'));	
			$this->documento_cuenta_cobrarClase->setid_base(0);	
			$this->documento_cuenta_cobrarClase->setid_cuenta_corriente(-1);	
			$this->documento_cuenta_cobrarClase->setncf('');	
			
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
		$this->prepararEjecutarMantenimientoBase('documento_cuenta_cobrar');
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
		$this->cargarParametrosReporteBase('documento_cuenta_cobrar');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('documento_cuenta_cobrar');
	}
	
	public function actualizarControllerConReturnGeneral(documento_cuenta_cobrar_param_return $documento_cuenta_cobrarReturnGeneral) {
		if($documento_cuenta_cobrarReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesdocumento_cuenta_cobrarsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$documento_cuenta_cobrarReturnGeneral->getsMensajeProceso();
		}
		
		if($documento_cuenta_cobrarReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$documento_cuenta_cobrarReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($documento_cuenta_cobrarReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$documento_cuenta_cobrarReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$documento_cuenta_cobrarReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($documento_cuenta_cobrarReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($documento_cuenta_cobrarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$documento_cuenta_cobrarReturnGeneral->getsFuncionJs();
		}
		
		if($documento_cuenta_cobrarReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(documento_cuenta_cobrar_session $documento_cuenta_cobrar_session){
		$this->strStyleDivArbol=$documento_cuenta_cobrar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$documento_cuenta_cobrar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$documento_cuenta_cobrar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$documento_cuenta_cobrar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$documento_cuenta_cobrar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$documento_cuenta_cobrar_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$documento_cuenta_cobrar_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(documento_cuenta_cobrar_session $documento_cuenta_cobrar_session){
		$documento_cuenta_cobrar_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$documento_cuenta_cobrar_session->strStyleDivHeader='display:none';			
		$documento_cuenta_cobrar_session->strStyleDivContent='width:93%;height:100%';	
		$documento_cuenta_cobrar_session->strStyleDivOpcionesBanner='display:none';	
		$documento_cuenta_cobrar_session->strStyleDivExpandirColapsar='display:none';	
		$documento_cuenta_cobrar_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(documento_cuenta_cobrar_control $documento_cuenta_cobrar_control_session){
		$this->idNuevo=$documento_cuenta_cobrar_control_session->idNuevo;
		$this->documento_cuenta_cobrarActual=$documento_cuenta_cobrar_control_session->documento_cuenta_cobrarActual;
		$this->documento_cuenta_cobrar=$documento_cuenta_cobrar_control_session->documento_cuenta_cobrar;
		$this->documento_cuenta_cobrarClase=$documento_cuenta_cobrar_control_session->documento_cuenta_cobrarClase;
		$this->documento_cuenta_cobrars=$documento_cuenta_cobrar_control_session->documento_cuenta_cobrars;
		$this->documento_cuenta_cobrarsEliminados=$documento_cuenta_cobrar_control_session->documento_cuenta_cobrarsEliminados;
		$this->documento_cuenta_cobrar=$documento_cuenta_cobrar_control_session->documento_cuenta_cobrar;
		$this->documento_cuenta_cobrarsReporte=$documento_cuenta_cobrar_control_session->documento_cuenta_cobrarsReporte;
		$this->documento_cuenta_cobrarsSeleccionados=$documento_cuenta_cobrar_control_session->documento_cuenta_cobrarsSeleccionados;
		$this->arrOrderBy=$documento_cuenta_cobrar_control_session->arrOrderBy;
		$this->arrOrderByRel=$documento_cuenta_cobrar_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$documento_cuenta_cobrar_control_session->arrHistoryWebs;
		$this->arrSessionBases=$documento_cuenta_cobrar_control_session->arrSessionBases;		
		
		$this->strTypeOnLoaddocumento_cuenta_cobrar=$documento_cuenta_cobrar_control_session->strTypeOnLoaddocumento_cuenta_cobrar;
		$this->strTipoPaginaAuxiliardocumento_cuenta_cobrar=$documento_cuenta_cobrar_control_session->strTipoPaginaAuxiliardocumento_cuenta_cobrar;
		$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar=$documento_cuenta_cobrar_control_session->strTipoUsuarioAuxiliardocumento_cuenta_cobrar;	
		
		$this->bitEsPopup=$documento_cuenta_cobrar_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$documento_cuenta_cobrar_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$documento_cuenta_cobrar_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$documento_cuenta_cobrar_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$documento_cuenta_cobrar_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$documento_cuenta_cobrar_control_session->strSufijo;
		$this->bitEsRelaciones=$documento_cuenta_cobrar_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$documento_cuenta_cobrar_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$documento_cuenta_cobrar_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$documento_cuenta_cobrar_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$documento_cuenta_cobrar_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$documento_cuenta_cobrar_control_session->strTituloTabla;
		$this->strTituloPathPagina=$documento_cuenta_cobrar_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$documento_cuenta_cobrar_control_session->strTituloPathElementoActual;
		
		if($this->documento_cuenta_cobrarLogic==null) {			
			$this->documento_cuenta_cobrarLogic=new documento_cuenta_cobrar_logic();
		}
		
		
		if($this->documento_cuenta_cobrarClase==null) {
			$this->documento_cuenta_cobrarClase=new documento_cuenta_cobrar();	
		}
		
		$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrar($this->documento_cuenta_cobrarClase);
		
		
		if($this->documento_cuenta_cobrars==null) {
			$this->documento_cuenta_cobrars=array();	
		}
		
		$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars($this->documento_cuenta_cobrars);
		
		
		$this->strTipoView=$documento_cuenta_cobrar_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$documento_cuenta_cobrar_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$documento_cuenta_cobrar_control_session->datosCliente;
		$this->strAccionBusqueda=$documento_cuenta_cobrar_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$documento_cuenta_cobrar_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$documento_cuenta_cobrar_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$documento_cuenta_cobrar_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$documento_cuenta_cobrar_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$documento_cuenta_cobrar_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$documento_cuenta_cobrar_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$documento_cuenta_cobrar_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$documento_cuenta_cobrar_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$documento_cuenta_cobrar_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$documento_cuenta_cobrar_control_session->strTipoPaginacion;
		$this->strTipoAccion=$documento_cuenta_cobrar_control_session->strTipoAccion;
		$this->tiposReportes=$documento_cuenta_cobrar_control_session->tiposReportes;
		$this->tiposReporte=$documento_cuenta_cobrar_control_session->tiposReporte;
		$this->tiposAcciones=$documento_cuenta_cobrar_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$documento_cuenta_cobrar_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$documento_cuenta_cobrar_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$documento_cuenta_cobrar_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$documento_cuenta_cobrar_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$documento_cuenta_cobrar_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$documento_cuenta_cobrar_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$documento_cuenta_cobrar_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$documento_cuenta_cobrar_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$documento_cuenta_cobrar_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$documento_cuenta_cobrar_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$documento_cuenta_cobrar_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$documento_cuenta_cobrar_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$documento_cuenta_cobrar_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$documento_cuenta_cobrar_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$documento_cuenta_cobrar_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$documento_cuenta_cobrar_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$documento_cuenta_cobrar_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$documento_cuenta_cobrar_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$documento_cuenta_cobrar_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$documento_cuenta_cobrar_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$documento_cuenta_cobrar_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$documento_cuenta_cobrar_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$documento_cuenta_cobrar_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$documento_cuenta_cobrar_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$documento_cuenta_cobrar_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$documento_cuenta_cobrar_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$documento_cuenta_cobrar_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$documento_cuenta_cobrar_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$documento_cuenta_cobrar_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$documento_cuenta_cobrar_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$documento_cuenta_cobrar_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$documento_cuenta_cobrar_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$documento_cuenta_cobrar_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$documento_cuenta_cobrar_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$documento_cuenta_cobrar_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$documento_cuenta_cobrar_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$documento_cuenta_cobrar_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$documento_cuenta_cobrar_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$documento_cuenta_cobrar_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$documento_cuenta_cobrar_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$documento_cuenta_cobrar_control_session->resumenUsuarioActual;	
		$this->moduloActual=$documento_cuenta_cobrar_control_session->moduloActual;	
		$this->opcionActual=$documento_cuenta_cobrar_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$documento_cuenta_cobrar_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$documento_cuenta_cobrar_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));
				
		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
		}
		
		$this->strStyleDivArbol=$documento_cuenta_cobrar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$documento_cuenta_cobrar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$documento_cuenta_cobrar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$documento_cuenta_cobrar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$documento_cuenta_cobrar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$documento_cuenta_cobrar_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$documento_cuenta_cobrar_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$documento_cuenta_cobrar_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$documento_cuenta_cobrar_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$documento_cuenta_cobrar_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$documento_cuenta_cobrar_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$documento_cuenta_cobrar_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$documento_cuenta_cobrar_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$documento_cuenta_cobrar_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$documento_cuenta_cobrar_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$documento_cuenta_cobrar_control_session->strMensajeid_usuario;
		$this->strMensajenumero=$documento_cuenta_cobrar_control_session->strMensajenumero;
		$this->strMensajeid_cliente=$documento_cuenta_cobrar_control_session->strMensajeid_cliente;
		$this->strMensajetipo=$documento_cuenta_cobrar_control_session->strMensajetipo;
		$this->strMensajefecha_emision=$documento_cuenta_cobrar_control_session->strMensajefecha_emision;
		$this->strMensajedescripcion=$documento_cuenta_cobrar_control_session->strMensajedescripcion;
		$this->strMensajemonto=$documento_cuenta_cobrar_control_session->strMensajemonto;
		$this->strMensajemonto_parcial=$documento_cuenta_cobrar_control_session->strMensajemonto_parcial;
		$this->strMensajemoneda=$documento_cuenta_cobrar_control_session->strMensajemoneda;
		$this->strMensajefecha_vence=$documento_cuenta_cobrar_control_session->strMensajefecha_vence;
		$this->strMensajenumero_de_pagos=$documento_cuenta_cobrar_control_session->strMensajenumero_de_pagos;
		$this->strMensajebalance=$documento_cuenta_cobrar_control_session->strMensajebalance;
		$this->strMensajenumero_pagado=$documento_cuenta_cobrar_control_session->strMensajenumero_pagado;
		$this->strMensajeid_pagado=$documento_cuenta_cobrar_control_session->strMensajeid_pagado;
		$this->strMensajemodulo_origen=$documento_cuenta_cobrar_control_session->strMensajemodulo_origen;
		$this->strMensajeid_origen=$documento_cuenta_cobrar_control_session->strMensajeid_origen;
		$this->strMensajemodulo_destino=$documento_cuenta_cobrar_control_session->strMensajemodulo_destino;
		$this->strMensajeid_destino=$documento_cuenta_cobrar_control_session->strMensajeid_destino;
		$this->strMensajenombre_pc=$documento_cuenta_cobrar_control_session->strMensajenombre_pc;
		$this->strMensajehora=$documento_cuenta_cobrar_control_session->strMensajehora;
		$this->strMensajemonto_mora=$documento_cuenta_cobrar_control_session->strMensajemonto_mora;
		$this->strMensajeinteres_mora=$documento_cuenta_cobrar_control_session->strMensajeinteres_mora;
		$this->strMensajedias_gracia_mora=$documento_cuenta_cobrar_control_session->strMensajedias_gracia_mora;
		$this->strMensajeinstrumento_pago=$documento_cuenta_cobrar_control_session->strMensajeinstrumento_pago;
		$this->strMensajetipo_cambio=$documento_cuenta_cobrar_control_session->strMensajetipo_cambio;
		$this->strMensajenumero_cliente=$documento_cuenta_cobrar_control_session->strMensajenumero_cliente;
		$this->strMensajeclase_registro=$documento_cuenta_cobrar_control_session->strMensajeclase_registro;
		$this->strMensajeestado_registro=$documento_cuenta_cobrar_control_session->strMensajeestado_registro;
		$this->strMensajemotivo_anulacion=$documento_cuenta_cobrar_control_session->strMensajemotivo_anulacion;
		$this->strMensajeimpuesto_1=$documento_cuenta_cobrar_control_session->strMensajeimpuesto_1;
		$this->strMensajeimpuesto_2=$documento_cuenta_cobrar_control_session->strMensajeimpuesto_2;
		$this->strMensajeimpuesto_incluido=$documento_cuenta_cobrar_control_session->strMensajeimpuesto_incluido;
		$this->strMensajeobservaciones=$documento_cuenta_cobrar_control_session->strMensajeobservaciones;
		$this->strMensajegrupo_pago=$documento_cuenta_cobrar_control_session->strMensajegrupo_pago;
		$this->strMensajetermino_idpv=$documento_cuenta_cobrar_control_session->strMensajetermino_idpv;
		$this->strMensajeid_forma_pago_cliente=$documento_cuenta_cobrar_control_session->strMensajeid_forma_pago_cliente;
		$this->strMensajenro_pago=$documento_cuenta_cobrar_control_session->strMensajenro_pago;
		$this->strMensajeref_pago=$documento_cuenta_cobrar_control_session->strMensajeref_pago;
		$this->strMensajefecha_hora=$documento_cuenta_cobrar_control_session->strMensajefecha_hora;
		$this->strMensajeid_base=$documento_cuenta_cobrar_control_session->strMensajeid_base;
		$this->strMensajeid_cuenta_corriente=$documento_cuenta_cobrar_control_session->strMensajeid_cuenta_corriente;
		$this->strMensajencf=$documento_cuenta_cobrar_control_session->strMensajencf;
			
		
		$this->empresasFK=$documento_cuenta_cobrar_control_session->empresasFK;
		$this->idempresaDefaultFK=$documento_cuenta_cobrar_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$documento_cuenta_cobrar_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$documento_cuenta_cobrar_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$documento_cuenta_cobrar_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$documento_cuenta_cobrar_control_session->idejercicioDefaultFK;
		$this->periodosFK=$documento_cuenta_cobrar_control_session->periodosFK;
		$this->idperiodoDefaultFK=$documento_cuenta_cobrar_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$documento_cuenta_cobrar_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$documento_cuenta_cobrar_control_session->idusuarioDefaultFK;
		$this->clientesFK=$documento_cuenta_cobrar_control_session->clientesFK;
		$this->idclienteDefaultFK=$documento_cuenta_cobrar_control_session->idclienteDefaultFK;
		$this->forma_pago_clientesFK=$documento_cuenta_cobrar_control_session->forma_pago_clientesFK;
		$this->idforma_pago_clienteDefaultFK=$documento_cuenta_cobrar_control_session->idforma_pago_clienteDefaultFK;
		$this->cuenta_corrientesFK=$documento_cuenta_cobrar_control_session->cuenta_corrientesFK;
		$this->idcuenta_corrienteDefaultFK=$documento_cuenta_cobrar_control_session->idcuenta_corrienteDefaultFK;
		
		
		$this->strVisibleFK_Idcliente=$documento_cuenta_cobrar_control_session->strVisibleFK_Idcliente;
		$this->strVisibleFK_Idcuenta_corriente=$documento_cuenta_cobrar_control_session->strVisibleFK_Idcuenta_corriente;
		$this->strVisibleFK_Idejercicio=$documento_cuenta_cobrar_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$documento_cuenta_cobrar_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idforma_pago_cliente=$documento_cuenta_cobrar_control_session->strVisibleFK_Idforma_pago_cliente;
		$this->strVisibleFK_Idperiodo=$documento_cuenta_cobrar_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idsucursal=$documento_cuenta_cobrar_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idusuario=$documento_cuenta_cobrar_control_session->strVisibleFK_Idusuario;
		
		
		$this->strTienePermisosfactura=$documento_cuenta_cobrar_control_session->strTienePermisosfactura;
		$this->strTienePermisosimagen_documento_cuenta_cobrar=$documento_cuenta_cobrar_control_session->strTienePermisosimagen_documento_cuenta_cobrar;
		$this->strTienePermisosfactura_lote=$documento_cuenta_cobrar_control_session->strTienePermisosfactura_lote;
		$this->strTienePermisosdevolucion_factura=$documento_cuenta_cobrar_control_session->strTienePermisosdevolucion_factura;
		
		
		$this->id_clienteFK_Idcliente=$documento_cuenta_cobrar_control_session->id_clienteFK_Idcliente;
		$this->id_cuenta_corrienteFK_Idcuenta_corriente=$documento_cuenta_cobrar_control_session->id_cuenta_corrienteFK_Idcuenta_corriente;
		$this->id_ejercicioFK_Idejercicio=$documento_cuenta_cobrar_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$documento_cuenta_cobrar_control_session->id_empresaFK_Idempresa;
		$this->id_forma_pago_clienteFK_Idforma_pago_cliente=$documento_cuenta_cobrar_control_session->id_forma_pago_clienteFK_Idforma_pago_cliente;
		$this->id_periodoFK_Idperiodo=$documento_cuenta_cobrar_control_session->id_periodoFK_Idperiodo;
		$this->id_sucursalFK_Idsucursal=$documento_cuenta_cobrar_control_session->id_sucursalFK_Idsucursal;
		$this->id_usuarioFK_Idusuario=$documento_cuenta_cobrar_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getdocumento_cuenta_cobrarControllerAdditional() {
		return $this->documento_cuenta_cobrarControllerAdditional;
	}

	public function setdocumento_cuenta_cobrarControllerAdditional($documento_cuenta_cobrarControllerAdditional) {
		$this->documento_cuenta_cobrarControllerAdditional = $documento_cuenta_cobrarControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getdocumento_cuenta_cobrarActual() : documento_cuenta_cobrar {
		return $this->documento_cuenta_cobrarActual;
	}

	public function setdocumento_cuenta_cobrarActual(documento_cuenta_cobrar $documento_cuenta_cobrarActual) {
		$this->documento_cuenta_cobrarActual = $documento_cuenta_cobrarActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getiddocumento_cuenta_cobrar() : int {
		return $this->iddocumento_cuenta_cobrar;
	}

	public function setiddocumento_cuenta_cobrar(int $iddocumento_cuenta_cobrar) {
		$this->iddocumento_cuenta_cobrar = $iddocumento_cuenta_cobrar;
	}
	
	public function getdocumento_cuenta_cobrar() : documento_cuenta_cobrar {
		return $this->documento_cuenta_cobrar;
	}

	public function setdocumento_cuenta_cobrar(documento_cuenta_cobrar $documento_cuenta_cobrar) {
		$this->documento_cuenta_cobrar = $documento_cuenta_cobrar;
	}
		
	public function getdocumento_cuenta_cobrarLogic() : documento_cuenta_cobrar_logic {		
		return $this->documento_cuenta_cobrarLogic;
	}

	public function setdocumento_cuenta_cobrarLogic(documento_cuenta_cobrar_logic $documento_cuenta_cobrarLogic) {
		$this->documento_cuenta_cobrarLogic = $documento_cuenta_cobrarLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getdocumento_cuenta_cobrarsModel() {		
		try {						
			/*documento_cuenta_cobrarsModel.setWrappedData(documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->documento_cuenta_cobrarsModel;
	}
	
	public function setdocumento_cuenta_cobrarsModel($documento_cuenta_cobrarsModel) {
		$this->documento_cuenta_cobrarsModel = $documento_cuenta_cobrarsModel;
	}
	
	public function getdocumento_cuenta_cobrars() : array {		
		return $this->documento_cuenta_cobrars;
	}
	
	public function setdocumento_cuenta_cobrars(array $documento_cuenta_cobrars) {
		$this->documento_cuenta_cobrars= $documento_cuenta_cobrars;
	}
	
	public function getdocumento_cuenta_cobrarsEliminados() : array {		
		return $this->documento_cuenta_cobrarsEliminados;
	}
	
	public function setdocumento_cuenta_cobrarsEliminados(array $documento_cuenta_cobrarsEliminados) {
		$this->documento_cuenta_cobrarsEliminados= $documento_cuenta_cobrarsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getdocumento_cuenta_cobrarActualFromListDataModel() {
		try {
			/*$documento_cuenta_cobrarClase= $this->documento_cuenta_cobrarsModel->getRowData();*/
			
			/*return $documento_cuenta_cobrar;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
