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

namespace com\bydan\contabilidad\inventario\devolucion\presentation\control;

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

use com\bydan\contabilidad\inventario\devolucion\business\entity\devolucion;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/devolucion/util/devolucion_carga.php');
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_carga;

use com\bydan\contabilidad\inventario\devolucion\util\devolucion_util;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_param_return;
use com\bydan\contabilidad\inventario\devolucion\business\logic\devolucion_logic;
use com\bydan\contabilidad\inventario\devolucion\business\logic\devolucion_logic_add;
use com\bydan\contabilidad\inventario\devolucion\presentation\session\devolucion_session;


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

use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\business\logic\vendedor_logic;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_carga;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;

use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;
use com\bydan\contabilidad\contabilidad\moneda\business\logic\moneda_logic;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_carga;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_util;

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\entity\documento_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\logic\documento_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_util;

use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;
use com\bydan\contabilidad\inventario\kardex\business\logic\kardex_logic;
use com\bydan\contabilidad\inventario\kardex\util\kardex_carga;
use com\bydan\contabilidad\inventario\kardex\util\kardex_util;

//REL


use com\bydan\contabilidad\inventario\devolucion_detalle\util\devolucion_detalle_carga;
use com\bydan\contabilidad\inventario\devolucion_detalle\util\devolucion_detalle_util;
use com\bydan\contabilidad\inventario\devolucion_detalle\presentation\session\devolucion_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
devolucion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
devolucion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
devolucion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
devolucion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*devolucion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class devolucion_init_control extends ControllerBase {	
	
	public $devolucionClase=null;	
	public $devolucionsModel=null;	
	public $devolucionsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $iddevolucion=0;	
	public ?int $iddevolucionActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $devolucionLogic=null;
	
	public $devolucionActual=null;	
	
	public $devolucion=null;
	public $devolucions=null;
	public $devolucionsEliminados=array();
	public $devolucionsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $devolucionsLocal=array();
	public ?array $devolucionsReporte=null;
	public ?array $devolucionsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoaddevolucion='onload';
	public string $strTipoPaginaAuxiliardevolucion='none';
	public string $strTipoUsuarioAuxiliardevolucion='none';
		
	public $devolucionReturnGeneral=null;
	public $devolucionParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $devolucionModel=null;
	public $devolucionControllerAdditional=null;
	
	
	

	public $devoluciondetalleLogic=null;

	public function  getdevolucion_detalleLogic() {
		return $this->devoluciondetalleLogic;
	}

	public function setdevolucion_detalleLogic($devoluciondetalleLogic) {
		$this->devoluciondetalleLogic =$devoluciondetalleLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajenumero='';
	public string $strMensajeid_proveedor='';
	public string $strMensajeid_vendedor='';
	public string $strMensajeruc='';
	public string $strMensajefecha_emision='';
	public string $strMensajeid_termino_pago_proveedor='';
	public string $strMensajefecha_vence='';
	public string $strMensajecotizacion='';
	public string $strMensajeid_moneda='';
	public string $strMensajeid_estado='';
	public string $strMensajedireccion='';
	public string $strMensajeenvia='';
	public string $strMensajeobservacion='';
	public string $strMensajeimpuesto_en_precio='';
	public string $strMensajesub_total='';
	public string $strMensajedescuento_monto='';
	public string $strMensajedescuento_porciento='';
	public string $strMensajeiva_monto='';
	public string $strMensajeiva_porciento='';
	public string $strMensajetotal='';
	public string $strMensajeotro_monto='';
	public string $strMensajeotro_porciento='';
	public string $strMensajefactura_proveedor='';
	public string $strMensajepago='';
	public string $strMensajeid_asiento='';
	public string $strMensajeid_documento_cuenta_pagar='';
	public string $strMensajeid_kardex='';
	
	
	public string $strVisibleFK_Idasiento='display:table-row';
	public string $strVisibleFK_Iddocumento_cuenta_pagar='display:table-row';
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idestado='display:table-row';
	public string $strVisibleFK_Idkardex='display:table-row';
	public string $strVisibleFK_Idmoneda='display:table-row';
	public string $strVisibleFK_Idperiodo='display:table-row';
	public string $strVisibleFK_Idproveedor='display:table-row';
	public string $strVisibleFK_Idsucursal='display:table-row';
	public string $strVisibleFK_Idtermino_pago='display:table-row';
	public string $strVisibleFK_Idusuario='display:table-row';
	public string $strVisibleFK_Idvendedor='display:table-row';

	
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

	public array $vendedorsFK=array();

	public function getvendedorsFK():array {
		return $this->vendedorsFK;
	}

	public function setvendedorsFK(array $vendedorsFK) {
		$this->vendedorsFK = $vendedorsFK;
	}

	public int $idvendedorDefaultFK=-1;

	public function getIdvendedorDefaultFK():int {
		return $this->idvendedorDefaultFK;
	}

	public function setIdvendedorDefaultFK(int $idvendedorDefaultFK) {
		$this->idvendedorDefaultFK = $idvendedorDefaultFK;
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

	public array $monedasFK=array();

	public function getmonedasFK():array {
		return $this->monedasFK;
	}

	public function setmonedasFK(array $monedasFK) {
		$this->monedasFK = $monedasFK;
	}

	public int $idmonedaDefaultFK=-1;

	public function getIdmonedaDefaultFK():int {
		return $this->idmonedaDefaultFK;
	}

	public function setIdmonedaDefaultFK(int $idmonedaDefaultFK) {
		$this->idmonedaDefaultFK = $idmonedaDefaultFK;
	}

	public array $estadosFK=array();

	public function getestadosFK():array {
		return $this->estadosFK;
	}

	public function setestadosFK(array $estadosFK) {
		$this->estadosFK = $estadosFK;
	}

	public int $idestadoDefaultFK=-1;

	public function getIdestadoDefaultFK():int {
		return $this->idestadoDefaultFK;
	}

	public function setIdestadoDefaultFK(int $idestadoDefaultFK) {
		$this->idestadoDefaultFK = $idestadoDefaultFK;
	}

	public array $asientosFK=array();

	public function getasientosFK():array {
		return $this->asientosFK;
	}

	public function setasientosFK(array $asientosFK) {
		$this->asientosFK = $asientosFK;
	}

	public int $idasientoDefaultFK=-1;

	public function getIdasientoDefaultFK():int {
		return $this->idasientoDefaultFK;
	}

	public function setIdasientoDefaultFK(int $idasientoDefaultFK) {
		$this->idasientoDefaultFK = $idasientoDefaultFK;
	}

	public array $documento_cuenta_pagarsFK=array();

	public function getdocumento_cuenta_pagarsFK():array {
		return $this->documento_cuenta_pagarsFK;
	}

	public function setdocumento_cuenta_pagarsFK(array $documento_cuenta_pagarsFK) {
		$this->documento_cuenta_pagarsFK = $documento_cuenta_pagarsFK;
	}

	public int $iddocumento_cuenta_pagarDefaultFK=-1;

	public function getIddocumento_cuenta_pagarDefaultFK():int {
		return $this->iddocumento_cuenta_pagarDefaultFK;
	}

	public function setIddocumento_cuenta_pagarDefaultFK(int $iddocumento_cuenta_pagarDefaultFK) {
		$this->iddocumento_cuenta_pagarDefaultFK = $iddocumento_cuenta_pagarDefaultFK;
	}

	public array $kardexsFK=array();

	public function getkardexsFK():array {
		return $this->kardexsFK;
	}

	public function setkardexsFK(array $kardexsFK) {
		$this->kardexsFK = $kardexsFK;
	}

	public int $idkardexDefaultFK=-1;

	public function getIdkardexDefaultFK():int {
		return $this->idkardexDefaultFK;
	}

	public function setIdkardexDefaultFK(int $idkardexDefaultFK) {
		$this->idkardexDefaultFK = $idkardexDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisosdevolucion_detalle='none';
	
	
	public  $id_asientoFK_Idasiento=null;

	public  $id_documento_cuenta_pagarFK_Iddocumento_cuenta_pagar=null;

	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_estadoFK_Idestado=null;

	public  $id_kardexFK_Idkardex=null;

	public  $id_monedaFK_Idmoneda=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_proveedorFK_Idproveedor=null;

	public  $id_sucursalFK_Idsucursal=null;

	public  $id_termino_pago_proveedorFK_Idtermino_pago=null;

	public  $id_usuarioFK_Idusuario=null;

	public  $id_vendedorFK_Idvendedor=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->devolucionLogic==null) {
				$this->devolucionLogic=new devolucion_logic();
			}
			
		} else {
			if($this->devolucionLogic==null) {
				$this->devolucionLogic=new devolucion_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->devolucionClase==null) {
				$this->devolucionClase=new devolucion();
			}
			
			$this->devolucionClase->setId(0);	
				
				
			$this->devolucionClase->setid_empresa(-1);	
			$this->devolucionClase->setid_sucursal(-1);	
			$this->devolucionClase->setid_ejercicio(-1);	
			$this->devolucionClase->setid_periodo(-1);	
			$this->devolucionClase->setid_usuario(-1);	
			$this->devolucionClase->setnumero('');	
			$this->devolucionClase->setid_proveedor(-1);	
			$this->devolucionClase->setid_vendedor(-1);	
			$this->devolucionClase->setruc('');	
			$this->devolucionClase->setfecha_emision(date('Y-m-d'));	
			$this->devolucionClase->setid_termino_pago_proveedor(-1);	
			$this->devolucionClase->setfecha_vence(date('Y-m-d'));	
			$this->devolucionClase->setcotizacion(0.0);	
			$this->devolucionClase->setid_moneda(-1);	
			$this->devolucionClase->setid_estado(-1);	
			$this->devolucionClase->setdireccion('');	
			$this->devolucionClase->setenvia('');	
			$this->devolucionClase->setobservacion('');	
			$this->devolucionClase->setimpuesto_en_precio(false);	
			$this->devolucionClase->setsub_total(0.0);	
			$this->devolucionClase->setdescuento_monto(0.0);	
			$this->devolucionClase->setdescuento_porciento(0.0);	
			$this->devolucionClase->setiva_monto(0.0);	
			$this->devolucionClase->setiva_porciento(0.0);	
			$this->devolucionClase->settotal(0.0);	
			$this->devolucionClase->setotro_monto(0.0);	
			$this->devolucionClase->setotro_porciento(0.0);	
			$this->devolucionClase->setfactura_proveedor('');	
			$this->devolucionClase->setpago(0.0);	
			$this->devolucionClase->setid_asiento(null);	
			$this->devolucionClase->setid_documento_cuenta_pagar(null);	
			$this->devolucionClase->setid_kardex(null);	
			
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
		$this->prepararEjecutarMantenimientoBase('devolucion');
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
		$this->cargarParametrosReporteBase('devolucion');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('devolucion');
	}
	
	public function actualizarControllerConReturnGeneral(devolucion_param_return $devolucionReturnGeneral) {
		if($devolucionReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesdevolucionsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$devolucionReturnGeneral->getsMensajeProceso();
		}
		
		if($devolucionReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$devolucionReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($devolucionReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$devolucionReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$devolucionReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($devolucionReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($devolucionReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$devolucionReturnGeneral->getsFuncionJs();
		}
		
		if($devolucionReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(devolucion_session $devolucion_session){
		$this->strStyleDivArbol=$devolucion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$devolucion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$devolucion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$devolucion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$devolucion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$devolucion_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$devolucion_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(devolucion_session $devolucion_session){
		$devolucion_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$devolucion_session->strStyleDivHeader='display:none';			
		$devolucion_session->strStyleDivContent='width:93%;height:100%';	
		$devolucion_session->strStyleDivOpcionesBanner='display:none';	
		$devolucion_session->strStyleDivExpandirColapsar='display:none';	
		$devolucion_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(devolucion_control $devolucion_control_session){
		$this->idNuevo=$devolucion_control_session->idNuevo;
		$this->devolucionActual=$devolucion_control_session->devolucionActual;
		$this->devolucion=$devolucion_control_session->devolucion;
		$this->devolucionClase=$devolucion_control_session->devolucionClase;
		$this->devolucions=$devolucion_control_session->devolucions;
		$this->devolucionsEliminados=$devolucion_control_session->devolucionsEliminados;
		$this->devolucion=$devolucion_control_session->devolucion;
		$this->devolucionsReporte=$devolucion_control_session->devolucionsReporte;
		$this->devolucionsSeleccionados=$devolucion_control_session->devolucionsSeleccionados;
		$this->arrOrderBy=$devolucion_control_session->arrOrderBy;
		$this->arrOrderByRel=$devolucion_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$devolucion_control_session->arrHistoryWebs;
		$this->arrSessionBases=$devolucion_control_session->arrSessionBases;		
		
		$this->strTypeOnLoaddevolucion=$devolucion_control_session->strTypeOnLoaddevolucion;
		$this->strTipoPaginaAuxiliardevolucion=$devolucion_control_session->strTipoPaginaAuxiliardevolucion;
		$this->strTipoUsuarioAuxiliardevolucion=$devolucion_control_session->strTipoUsuarioAuxiliardevolucion;	
		
		$this->bitEsPopup=$devolucion_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$devolucion_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$devolucion_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$devolucion_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$devolucion_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$devolucion_control_session->strSufijo;
		$this->bitEsRelaciones=$devolucion_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$devolucion_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$devolucion_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$devolucion_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$devolucion_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$devolucion_control_session->strTituloTabla;
		$this->strTituloPathPagina=$devolucion_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$devolucion_control_session->strTituloPathElementoActual;
		
		if($this->devolucionLogic==null) {			
			$this->devolucionLogic=new devolucion_logic();
		}
		
		
		if($this->devolucionClase==null) {
			$this->devolucionClase=new devolucion();	
		}
		
		$this->devolucionLogic->setdevolucion($this->devolucionClase);
		
		
		if($this->devolucions==null) {
			$this->devolucions=array();	
		}
		
		$this->devolucionLogic->setdevolucions($this->devolucions);
		
		
		$this->strTipoView=$devolucion_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$devolucion_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$devolucion_control_session->datosCliente;
		$this->strAccionBusqueda=$devolucion_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$devolucion_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$devolucion_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$devolucion_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$devolucion_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$devolucion_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$devolucion_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$devolucion_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$devolucion_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$devolucion_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$devolucion_control_session->strTipoPaginacion;
		$this->strTipoAccion=$devolucion_control_session->strTipoAccion;
		$this->tiposReportes=$devolucion_control_session->tiposReportes;
		$this->tiposReporte=$devolucion_control_session->tiposReporte;
		$this->tiposAcciones=$devolucion_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$devolucion_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$devolucion_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$devolucion_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$devolucion_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$devolucion_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$devolucion_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$devolucion_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$devolucion_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$devolucion_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$devolucion_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$devolucion_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$devolucion_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$devolucion_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$devolucion_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$devolucion_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$devolucion_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$devolucion_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$devolucion_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$devolucion_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$devolucion_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$devolucion_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$devolucion_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$devolucion_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$devolucion_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$devolucion_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$devolucion_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$devolucion_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$devolucion_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$devolucion_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$devolucion_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$devolucion_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$devolucion_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$devolucion_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$devolucion_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$devolucion_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$devolucion_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$devolucion_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$devolucion_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$devolucion_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$devolucion_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$devolucion_control_session->resumenUsuarioActual;	
		$this->moduloActual=$devolucion_control_session->moduloActual;	
		$this->opcionActual=$devolucion_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$devolucion_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$devolucion_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$devolucion_session=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME));
				
		if($devolucion_session==null) {
			$devolucion_session=new devolucion_session();
		}
		
		$this->strStyleDivArbol=$devolucion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$devolucion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$devolucion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$devolucion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$devolucion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$devolucion_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$devolucion_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$devolucion_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$devolucion_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$devolucion_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$devolucion_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$devolucion_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$devolucion_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$devolucion_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$devolucion_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$devolucion_control_session->strMensajeid_usuario;
		$this->strMensajenumero=$devolucion_control_session->strMensajenumero;
		$this->strMensajeid_proveedor=$devolucion_control_session->strMensajeid_proveedor;
		$this->strMensajeid_vendedor=$devolucion_control_session->strMensajeid_vendedor;
		$this->strMensajeruc=$devolucion_control_session->strMensajeruc;
		$this->strMensajefecha_emision=$devolucion_control_session->strMensajefecha_emision;
		$this->strMensajeid_termino_pago_proveedor=$devolucion_control_session->strMensajeid_termino_pago_proveedor;
		$this->strMensajefecha_vence=$devolucion_control_session->strMensajefecha_vence;
		$this->strMensajecotizacion=$devolucion_control_session->strMensajecotizacion;
		$this->strMensajeid_moneda=$devolucion_control_session->strMensajeid_moneda;
		$this->strMensajeid_estado=$devolucion_control_session->strMensajeid_estado;
		$this->strMensajedireccion=$devolucion_control_session->strMensajedireccion;
		$this->strMensajeenvia=$devolucion_control_session->strMensajeenvia;
		$this->strMensajeobservacion=$devolucion_control_session->strMensajeobservacion;
		$this->strMensajeimpuesto_en_precio=$devolucion_control_session->strMensajeimpuesto_en_precio;
		$this->strMensajesub_total=$devolucion_control_session->strMensajesub_total;
		$this->strMensajedescuento_monto=$devolucion_control_session->strMensajedescuento_monto;
		$this->strMensajedescuento_porciento=$devolucion_control_session->strMensajedescuento_porciento;
		$this->strMensajeiva_monto=$devolucion_control_session->strMensajeiva_monto;
		$this->strMensajeiva_porciento=$devolucion_control_session->strMensajeiva_porciento;
		$this->strMensajetotal=$devolucion_control_session->strMensajetotal;
		$this->strMensajeotro_monto=$devolucion_control_session->strMensajeotro_monto;
		$this->strMensajeotro_porciento=$devolucion_control_session->strMensajeotro_porciento;
		$this->strMensajefactura_proveedor=$devolucion_control_session->strMensajefactura_proveedor;
		$this->strMensajepago=$devolucion_control_session->strMensajepago;
		$this->strMensajeid_asiento=$devolucion_control_session->strMensajeid_asiento;
		$this->strMensajeid_documento_cuenta_pagar=$devolucion_control_session->strMensajeid_documento_cuenta_pagar;
		$this->strMensajeid_kardex=$devolucion_control_session->strMensajeid_kardex;
			
		
		$this->empresasFK=$devolucion_control_session->empresasFK;
		$this->idempresaDefaultFK=$devolucion_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$devolucion_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$devolucion_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$devolucion_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$devolucion_control_session->idejercicioDefaultFK;
		$this->periodosFK=$devolucion_control_session->periodosFK;
		$this->idperiodoDefaultFK=$devolucion_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$devolucion_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$devolucion_control_session->idusuarioDefaultFK;
		$this->proveedorsFK=$devolucion_control_session->proveedorsFK;
		$this->idproveedorDefaultFK=$devolucion_control_session->idproveedorDefaultFK;
		$this->vendedorsFK=$devolucion_control_session->vendedorsFK;
		$this->idvendedorDefaultFK=$devolucion_control_session->idvendedorDefaultFK;
		$this->termino_pago_proveedorsFK=$devolucion_control_session->termino_pago_proveedorsFK;
		$this->idtermino_pago_proveedorDefaultFK=$devolucion_control_session->idtermino_pago_proveedorDefaultFK;
		$this->monedasFK=$devolucion_control_session->monedasFK;
		$this->idmonedaDefaultFK=$devolucion_control_session->idmonedaDefaultFK;
		$this->estadosFK=$devolucion_control_session->estadosFK;
		$this->idestadoDefaultFK=$devolucion_control_session->idestadoDefaultFK;
		$this->asientosFK=$devolucion_control_session->asientosFK;
		$this->idasientoDefaultFK=$devolucion_control_session->idasientoDefaultFK;
		$this->documento_cuenta_pagarsFK=$devolucion_control_session->documento_cuenta_pagarsFK;
		$this->iddocumento_cuenta_pagarDefaultFK=$devolucion_control_session->iddocumento_cuenta_pagarDefaultFK;
		$this->kardexsFK=$devolucion_control_session->kardexsFK;
		$this->idkardexDefaultFK=$devolucion_control_session->idkardexDefaultFK;
		
		
		$this->strVisibleFK_Idasiento=$devolucion_control_session->strVisibleFK_Idasiento;
		$this->strVisibleFK_Iddocumento_cuenta_pagar=$devolucion_control_session->strVisibleFK_Iddocumento_cuenta_pagar;
		$this->strVisibleFK_Idejercicio=$devolucion_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$devolucion_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idestado=$devolucion_control_session->strVisibleFK_Idestado;
		$this->strVisibleFK_Idkardex=$devolucion_control_session->strVisibleFK_Idkardex;
		$this->strVisibleFK_Idmoneda=$devolucion_control_session->strVisibleFK_Idmoneda;
		$this->strVisibleFK_Idperiodo=$devolucion_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idproveedor=$devolucion_control_session->strVisibleFK_Idproveedor;
		$this->strVisibleFK_Idsucursal=$devolucion_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idtermino_pago=$devolucion_control_session->strVisibleFK_Idtermino_pago;
		$this->strVisibleFK_Idusuario=$devolucion_control_session->strVisibleFK_Idusuario;
		$this->strVisibleFK_Idvendedor=$devolucion_control_session->strVisibleFK_Idvendedor;
		
		
		$this->strTienePermisosdevolucion_detalle=$devolucion_control_session->strTienePermisosdevolucion_detalle;
		
		
		$this->id_asientoFK_Idasiento=$devolucion_control_session->id_asientoFK_Idasiento;
		$this->id_documento_cuenta_pagarFK_Iddocumento_cuenta_pagar=$devolucion_control_session->id_documento_cuenta_pagarFK_Iddocumento_cuenta_pagar;
		$this->id_ejercicioFK_Idejercicio=$devolucion_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$devolucion_control_session->id_empresaFK_Idempresa;
		$this->id_estadoFK_Idestado=$devolucion_control_session->id_estadoFK_Idestado;
		$this->id_kardexFK_Idkardex=$devolucion_control_session->id_kardexFK_Idkardex;
		$this->id_monedaFK_Idmoneda=$devolucion_control_session->id_monedaFK_Idmoneda;
		$this->id_periodoFK_Idperiodo=$devolucion_control_session->id_periodoFK_Idperiodo;
		$this->id_proveedorFK_Idproveedor=$devolucion_control_session->id_proveedorFK_Idproveedor;
		$this->id_sucursalFK_Idsucursal=$devolucion_control_session->id_sucursalFK_Idsucursal;
		$this->id_termino_pago_proveedorFK_Idtermino_pago=$devolucion_control_session->id_termino_pago_proveedorFK_Idtermino_pago;
		$this->id_usuarioFK_Idusuario=$devolucion_control_session->id_usuarioFK_Idusuario;
		$this->id_vendedorFK_Idvendedor=$devolucion_control_session->id_vendedorFK_Idvendedor;

		
		
		
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
	
	public function getdevolucionControllerAdditional() {
		return $this->devolucionControllerAdditional;
	}

	public function setdevolucionControllerAdditional($devolucionControllerAdditional) {
		$this->devolucionControllerAdditional = $devolucionControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getdevolucionActual() : devolucion {
		return $this->devolucionActual;
	}

	public function setdevolucionActual(devolucion $devolucionActual) {
		$this->devolucionActual = $devolucionActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getiddevolucion() : int {
		return $this->iddevolucion;
	}

	public function setiddevolucion(int $iddevolucion) {
		$this->iddevolucion = $iddevolucion;
	}
	
	public function getdevolucion() : devolucion {
		return $this->devolucion;
	}

	public function setdevolucion(devolucion $devolucion) {
		$this->devolucion = $devolucion;
	}
		
	public function getdevolucionLogic() : devolucion_logic {		
		return $this->devolucionLogic;
	}

	public function setdevolucionLogic(devolucion_logic $devolucionLogic) {
		$this->devolucionLogic = $devolucionLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getdevolucionsModel() {		
		try {						
			/*devolucionsModel.setWrappedData(devolucionLogic->getdevolucions());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->devolucionsModel;
	}
	
	public function setdevolucionsModel($devolucionsModel) {
		$this->devolucionsModel = $devolucionsModel;
	}
	
	public function getdevolucions() : array {		
		return $this->devolucions;
	}
	
	public function setdevolucions(array $devolucions) {
		$this->devolucions= $devolucions;
	}
	
	public function getdevolucionsEliminados() : array {		
		return $this->devolucionsEliminados;
	}
	
	public function setdevolucionsEliminados(array $devolucionsEliminados) {
		$this->devolucionsEliminados= $devolucionsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getdevolucionActualFromListDataModel() {
		try {
			/*$devolucionClase= $this->devolucionsModel->getRowData();*/
			
			/*return $devolucion;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
