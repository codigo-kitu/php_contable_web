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

namespace com\bydan\contabilidad\inventario\orden_compra\presentation\control;

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

use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/orden_compra/util/orden_compra_carga.php');
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;

use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_param_return;
use com\bydan\contabilidad\inventario\orden_compra\business\logic\orden_compra_logic;
use com\bydan\contabilidad\inventario\orden_compra\business\logic\orden_compra_logic_add;
use com\bydan\contabilidad\inventario\orden_compra\presentation\session\orden_compra_session;


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


use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_carga;
use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_util;
use com\bydan\contabilidad\inventario\orden_compra_detalle\presentation\session\orden_compra_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
orden_compra_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
orden_compra_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
orden_compra_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*orden_compra_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class orden_compra_init_control extends ControllerBase {	
	
	public $orden_compraClase=null;	
	public $orden_comprasModel=null;	
	public $orden_comprasListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idorden_compra=0;	
	public ?int $idorden_compraActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $orden_compraLogic=null;
	
	public $orden_compraActual=null;	
	
	public $orden_compra=null;
	public $orden_compras=null;
	public $orden_comprasEliminados=array();
	public $orden_comprasAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $orden_comprasLocal=array();
	public ?array $orden_comprasReporte=null;
	public ?array $orden_comprasSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadorden_compra='onload';
	public string $strTipoPaginaAuxiliarorden_compra='none';
	public string $strTipoUsuarioAuxiliarorden_compra='none';
		
	public $orden_compraReturnGeneral=null;
	public $orden_compraParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $orden_compraModel=null;
	public $orden_compraControllerAdditional=null;
	
	
	

	public $ordencompradetalleLogic=null;

	public function  getorden_compra_detalleLogic() {
		return $this->ordencompradetalleLogic;
	}

	public function setorden_compra_detalleLogic($ordencompradetalleLogic) {
		$this->ordencompradetalleLogic =$ordencompradetalleLogic;
	}


	public $cuentapagarLogic=null;

	public function  getcuenta_pagarLogic() {
		return $this->cuentapagarLogic;
	}

	public function setcuenta_pagarLogic($cuentapagarLogic) {
		$this->cuentapagarLogic =$cuentapagarLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajenumero='';
	public string $strMensajeid_proveedor='';
	public string $strMensajeruc='';
	public string $strMensajefecha_emision='';
	public string $strMensajeid_vendedor='';
	public string $strMensajeid_termino_pago_proveedor='';
	public string $strMensajefecha_vence='';
	public string $strMensajecotizacion='';
	public string $strMensajeid_moneda='';
	public string $strMensajeimpuesto_en_precio='';
	public string $strMensajeid_estado='';
	public string $strMensajedireccion='';
	public string $strMensajeenviar='';
	public string $strMensajeobservacion='';
	public string $strMensajesub_total='';
	public string $strMensajedescuento_monto='';
	public string $strMensajedescuento_porciento='';
	public string $strMensajeiva_monto='';
	public string $strMensajeiva_porciento='';
	public string $strMensajeretencion_fuente_monto='';
	public string $strMensajeretencion_fuente_porciento='';
	public string $strMensajeretencion_iva_monto='';
	public string $strMensajeretencion_iva_porciento='';
	public string $strMensajetotal='';
	public string $strMensajeotro_monto='';
	public string $strMensajeotro_porciento='';
	public string $strMensajeretencion_ica_monto='';
	public string $strMensajeretencion_ica_porciento='';
	public string $strMensajefactura_proveedor='';
	public string $strMensajerecibida='';
	public string $strMensajepagos='';
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

	
	
	
	
	
	
	public $strTienePermisosorden_compra_detalle='none';
	public $strTienePermisoscuenta_pagar='none';
	
	
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
			if($this->orden_compraLogic==null) {
				$this->orden_compraLogic=new orden_compra_logic();
			}
			
		} else {
			if($this->orden_compraLogic==null) {
				$this->orden_compraLogic=new orden_compra_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->orden_compraClase==null) {
				$this->orden_compraClase=new orden_compra();
			}
			
			$this->orden_compraClase->setId(0);	
				
				
			$this->orden_compraClase->setid_empresa(-1);	
			$this->orden_compraClase->setid_sucursal(-1);	
			$this->orden_compraClase->setid_ejercicio(-1);	
			$this->orden_compraClase->setid_periodo(-1);	
			$this->orden_compraClase->setid_usuario(-1);	
			$this->orden_compraClase->setnumero('');	
			$this->orden_compraClase->setid_proveedor(-1);	
			$this->orden_compraClase->setruc('');	
			$this->orden_compraClase->setfecha_emision(date('Y-m-d'));	
			$this->orden_compraClase->setid_vendedor(-1);	
			$this->orden_compraClase->setid_termino_pago_proveedor(-1);	
			$this->orden_compraClase->setfecha_vence(date('Y-m-d'));	
			$this->orden_compraClase->setcotizacion(0.0);	
			$this->orden_compraClase->setid_moneda(-1);	
			$this->orden_compraClase->setimpuesto_en_precio(false);	
			$this->orden_compraClase->setid_estado(-1);	
			$this->orden_compraClase->setdireccion('');	
			$this->orden_compraClase->setenviar('');	
			$this->orden_compraClase->setobservacion('');	
			$this->orden_compraClase->setsub_total(0.0);	
			$this->orden_compraClase->setdescuento_monto(0.0);	
			$this->orden_compraClase->setdescuento_porciento(0.0);	
			$this->orden_compraClase->setiva_monto(0.0);	
			$this->orden_compraClase->setiva_porciento(0.0);	
			$this->orden_compraClase->setretencion_fuente_monto(0.0);	
			$this->orden_compraClase->setretencion_fuente_porciento(0.0);	
			$this->orden_compraClase->setretencion_iva_monto(0.0);	
			$this->orden_compraClase->setretencion_iva_porciento(0.0);	
			$this->orden_compraClase->settotal(0.0);	
			$this->orden_compraClase->setotro_monto(0.0);	
			$this->orden_compraClase->setotro_porciento(0.0);	
			$this->orden_compraClase->setretencion_ica_monto(0.0);	
			$this->orden_compraClase->setretencion_ica_porciento(0.0);	
			$this->orden_compraClase->setfactura_proveedor('');	
			$this->orden_compraClase->setrecibida(false);	
			$this->orden_compraClase->setpagos(0.0);	
			$this->orden_compraClase->setid_asiento(null);	
			$this->orden_compraClase->setid_documento_cuenta_pagar(null);	
			$this->orden_compraClase->setid_kardex(null);	
			
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
		$this->prepararEjecutarMantenimientoBase('orden_compra');
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
		$this->cargarParametrosReporteBase('orden_compra');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('orden_compra');
	}
	
	public function actualizarControllerConReturnGeneral(orden_compra_param_return $orden_compraReturnGeneral) {
		if($orden_compraReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesorden_comprasAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$orden_compraReturnGeneral->getsMensajeProceso();
		}
		
		if($orden_compraReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$orden_compraReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($orden_compraReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$orden_compraReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$orden_compraReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($orden_compraReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($orden_compraReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$orden_compraReturnGeneral->getsFuncionJs();
		}
		
		if($orden_compraReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(orden_compra_session $orden_compra_session){
		$this->strStyleDivArbol=$orden_compra_session->strStyleDivArbol;	
		$this->strStyleDivContent=$orden_compra_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$orden_compra_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$orden_compra_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$orden_compra_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$orden_compra_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$orden_compra_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(orden_compra_session $orden_compra_session){
		$orden_compra_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$orden_compra_session->strStyleDivHeader='display:none';			
		$orden_compra_session->strStyleDivContent='width:93%;height:100%';	
		$orden_compra_session->strStyleDivOpcionesBanner='display:none';	
		$orden_compra_session->strStyleDivExpandirColapsar='display:none';	
		$orden_compra_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(orden_compra_control $orden_compra_control_session){
		$this->idNuevo=$orden_compra_control_session->idNuevo;
		$this->orden_compraActual=$orden_compra_control_session->orden_compraActual;
		$this->orden_compra=$orden_compra_control_session->orden_compra;
		$this->orden_compraClase=$orden_compra_control_session->orden_compraClase;
		$this->orden_compras=$orden_compra_control_session->orden_compras;
		$this->orden_comprasEliminados=$orden_compra_control_session->orden_comprasEliminados;
		$this->orden_compra=$orden_compra_control_session->orden_compra;
		$this->orden_comprasReporte=$orden_compra_control_session->orden_comprasReporte;
		$this->orden_comprasSeleccionados=$orden_compra_control_session->orden_comprasSeleccionados;
		$this->arrOrderBy=$orden_compra_control_session->arrOrderBy;
		$this->arrOrderByRel=$orden_compra_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$orden_compra_control_session->arrHistoryWebs;
		$this->arrSessionBases=$orden_compra_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadorden_compra=$orden_compra_control_session->strTypeOnLoadorden_compra;
		$this->strTipoPaginaAuxiliarorden_compra=$orden_compra_control_session->strTipoPaginaAuxiliarorden_compra;
		$this->strTipoUsuarioAuxiliarorden_compra=$orden_compra_control_session->strTipoUsuarioAuxiliarorden_compra;	
		
		$this->bitEsPopup=$orden_compra_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$orden_compra_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$orden_compra_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$orden_compra_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$orden_compra_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$orden_compra_control_session->strSufijo;
		$this->bitEsRelaciones=$orden_compra_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$orden_compra_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$orden_compra_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$orden_compra_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$orden_compra_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$orden_compra_control_session->strTituloTabla;
		$this->strTituloPathPagina=$orden_compra_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$orden_compra_control_session->strTituloPathElementoActual;
		
		if($this->orden_compraLogic==null) {			
			$this->orden_compraLogic=new orden_compra_logic();
		}
		
		
		if($this->orden_compraClase==null) {
			$this->orden_compraClase=new orden_compra();	
		}
		
		$this->orden_compraLogic->setorden_compra($this->orden_compraClase);
		
		
		if($this->orden_compras==null) {
			$this->orden_compras=array();	
		}
		
		$this->orden_compraLogic->setorden_compras($this->orden_compras);
		
		
		$this->strTipoView=$orden_compra_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$orden_compra_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$orden_compra_control_session->datosCliente;
		$this->strAccionBusqueda=$orden_compra_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$orden_compra_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$orden_compra_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$orden_compra_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$orden_compra_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$orden_compra_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$orden_compra_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$orden_compra_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$orden_compra_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$orden_compra_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$orden_compra_control_session->strTipoPaginacion;
		$this->strTipoAccion=$orden_compra_control_session->strTipoAccion;
		$this->tiposReportes=$orden_compra_control_session->tiposReportes;
		$this->tiposReporte=$orden_compra_control_session->tiposReporte;
		$this->tiposAcciones=$orden_compra_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$orden_compra_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$orden_compra_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$orden_compra_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$orden_compra_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$orden_compra_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$orden_compra_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$orden_compra_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$orden_compra_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$orden_compra_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$orden_compra_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$orden_compra_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$orden_compra_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$orden_compra_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$orden_compra_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$orden_compra_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$orden_compra_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$orden_compra_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$orden_compra_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$orden_compra_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$orden_compra_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$orden_compra_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$orden_compra_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$orden_compra_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$orden_compra_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$orden_compra_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$orden_compra_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$orden_compra_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$orden_compra_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$orden_compra_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$orden_compra_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$orden_compra_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$orden_compra_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$orden_compra_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$orden_compra_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$orden_compra_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$orden_compra_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$orden_compra_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$orden_compra_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$orden_compra_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$orden_compra_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$orden_compra_control_session->resumenUsuarioActual;	
		$this->moduloActual=$orden_compra_control_session->moduloActual;	
		$this->opcionActual=$orden_compra_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$orden_compra_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$orden_compra_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$orden_compra_session=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME));
				
		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}
		
		$this->strStyleDivArbol=$orden_compra_session->strStyleDivArbol;	
		$this->strStyleDivContent=$orden_compra_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$orden_compra_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$orden_compra_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$orden_compra_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$orden_compra_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$orden_compra_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$orden_compra_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$orden_compra_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$orden_compra_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$orden_compra_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$orden_compra_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$orden_compra_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$orden_compra_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$orden_compra_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$orden_compra_control_session->strMensajeid_usuario;
		$this->strMensajenumero=$orden_compra_control_session->strMensajenumero;
		$this->strMensajeid_proveedor=$orden_compra_control_session->strMensajeid_proveedor;
		$this->strMensajeruc=$orden_compra_control_session->strMensajeruc;
		$this->strMensajefecha_emision=$orden_compra_control_session->strMensajefecha_emision;
		$this->strMensajeid_vendedor=$orden_compra_control_session->strMensajeid_vendedor;
		$this->strMensajeid_termino_pago_proveedor=$orden_compra_control_session->strMensajeid_termino_pago_proveedor;
		$this->strMensajefecha_vence=$orden_compra_control_session->strMensajefecha_vence;
		$this->strMensajecotizacion=$orden_compra_control_session->strMensajecotizacion;
		$this->strMensajeid_moneda=$orden_compra_control_session->strMensajeid_moneda;
		$this->strMensajeimpuesto_en_precio=$orden_compra_control_session->strMensajeimpuesto_en_precio;
		$this->strMensajeid_estado=$orden_compra_control_session->strMensajeid_estado;
		$this->strMensajedireccion=$orden_compra_control_session->strMensajedireccion;
		$this->strMensajeenviar=$orden_compra_control_session->strMensajeenviar;
		$this->strMensajeobservacion=$orden_compra_control_session->strMensajeobservacion;
		$this->strMensajesub_total=$orden_compra_control_session->strMensajesub_total;
		$this->strMensajedescuento_monto=$orden_compra_control_session->strMensajedescuento_monto;
		$this->strMensajedescuento_porciento=$orden_compra_control_session->strMensajedescuento_porciento;
		$this->strMensajeiva_monto=$orden_compra_control_session->strMensajeiva_monto;
		$this->strMensajeiva_porciento=$orden_compra_control_session->strMensajeiva_porciento;
		$this->strMensajeretencion_fuente_monto=$orden_compra_control_session->strMensajeretencion_fuente_monto;
		$this->strMensajeretencion_fuente_porciento=$orden_compra_control_session->strMensajeretencion_fuente_porciento;
		$this->strMensajeretencion_iva_monto=$orden_compra_control_session->strMensajeretencion_iva_monto;
		$this->strMensajeretencion_iva_porciento=$orden_compra_control_session->strMensajeretencion_iva_porciento;
		$this->strMensajetotal=$orden_compra_control_session->strMensajetotal;
		$this->strMensajeotro_monto=$orden_compra_control_session->strMensajeotro_monto;
		$this->strMensajeotro_porciento=$orden_compra_control_session->strMensajeotro_porciento;
		$this->strMensajeretencion_ica_monto=$orden_compra_control_session->strMensajeretencion_ica_monto;
		$this->strMensajeretencion_ica_porciento=$orden_compra_control_session->strMensajeretencion_ica_porciento;
		$this->strMensajefactura_proveedor=$orden_compra_control_session->strMensajefactura_proveedor;
		$this->strMensajerecibida=$orden_compra_control_session->strMensajerecibida;
		$this->strMensajepagos=$orden_compra_control_session->strMensajepagos;
		$this->strMensajeid_asiento=$orden_compra_control_session->strMensajeid_asiento;
		$this->strMensajeid_documento_cuenta_pagar=$orden_compra_control_session->strMensajeid_documento_cuenta_pagar;
		$this->strMensajeid_kardex=$orden_compra_control_session->strMensajeid_kardex;
			
		
		$this->empresasFK=$orden_compra_control_session->empresasFK;
		$this->idempresaDefaultFK=$orden_compra_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$orden_compra_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$orden_compra_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$orden_compra_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$orden_compra_control_session->idejercicioDefaultFK;
		$this->periodosFK=$orden_compra_control_session->periodosFK;
		$this->idperiodoDefaultFK=$orden_compra_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$orden_compra_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$orden_compra_control_session->idusuarioDefaultFK;
		$this->proveedorsFK=$orden_compra_control_session->proveedorsFK;
		$this->idproveedorDefaultFK=$orden_compra_control_session->idproveedorDefaultFK;
		$this->vendedorsFK=$orden_compra_control_session->vendedorsFK;
		$this->idvendedorDefaultFK=$orden_compra_control_session->idvendedorDefaultFK;
		$this->termino_pago_proveedorsFK=$orden_compra_control_session->termino_pago_proveedorsFK;
		$this->idtermino_pago_proveedorDefaultFK=$orden_compra_control_session->idtermino_pago_proveedorDefaultFK;
		$this->monedasFK=$orden_compra_control_session->monedasFK;
		$this->idmonedaDefaultFK=$orden_compra_control_session->idmonedaDefaultFK;
		$this->estadosFK=$orden_compra_control_session->estadosFK;
		$this->idestadoDefaultFK=$orden_compra_control_session->idestadoDefaultFK;
		$this->asientosFK=$orden_compra_control_session->asientosFK;
		$this->idasientoDefaultFK=$orden_compra_control_session->idasientoDefaultFK;
		$this->documento_cuenta_pagarsFK=$orden_compra_control_session->documento_cuenta_pagarsFK;
		$this->iddocumento_cuenta_pagarDefaultFK=$orden_compra_control_session->iddocumento_cuenta_pagarDefaultFK;
		$this->kardexsFK=$orden_compra_control_session->kardexsFK;
		$this->idkardexDefaultFK=$orden_compra_control_session->idkardexDefaultFK;
		
		
		$this->strVisibleFK_Idasiento=$orden_compra_control_session->strVisibleFK_Idasiento;
		$this->strVisibleFK_Iddocumento_cuenta_pagar=$orden_compra_control_session->strVisibleFK_Iddocumento_cuenta_pagar;
		$this->strVisibleFK_Idejercicio=$orden_compra_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$orden_compra_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idestado=$orden_compra_control_session->strVisibleFK_Idestado;
		$this->strVisibleFK_Idkardex=$orden_compra_control_session->strVisibleFK_Idkardex;
		$this->strVisibleFK_Idmoneda=$orden_compra_control_session->strVisibleFK_Idmoneda;
		$this->strVisibleFK_Idperiodo=$orden_compra_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idproveedor=$orden_compra_control_session->strVisibleFK_Idproveedor;
		$this->strVisibleFK_Idsucursal=$orden_compra_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idtermino_pago=$orden_compra_control_session->strVisibleFK_Idtermino_pago;
		$this->strVisibleFK_Idusuario=$orden_compra_control_session->strVisibleFK_Idusuario;
		$this->strVisibleFK_Idvendedor=$orden_compra_control_session->strVisibleFK_Idvendedor;
		
		
		$this->strTienePermisosorden_compra_detalle=$orden_compra_control_session->strTienePermisosorden_compra_detalle;
		$this->strTienePermisoscuenta_pagar=$orden_compra_control_session->strTienePermisoscuenta_pagar;
		
		
		$this->id_asientoFK_Idasiento=$orden_compra_control_session->id_asientoFK_Idasiento;
		$this->id_documento_cuenta_pagarFK_Iddocumento_cuenta_pagar=$orden_compra_control_session->id_documento_cuenta_pagarFK_Iddocumento_cuenta_pagar;
		$this->id_ejercicioFK_Idejercicio=$orden_compra_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$orden_compra_control_session->id_empresaFK_Idempresa;
		$this->id_estadoFK_Idestado=$orden_compra_control_session->id_estadoFK_Idestado;
		$this->id_kardexFK_Idkardex=$orden_compra_control_session->id_kardexFK_Idkardex;
		$this->id_monedaFK_Idmoneda=$orden_compra_control_session->id_monedaFK_Idmoneda;
		$this->id_periodoFK_Idperiodo=$orden_compra_control_session->id_periodoFK_Idperiodo;
		$this->id_proveedorFK_Idproveedor=$orden_compra_control_session->id_proveedorFK_Idproveedor;
		$this->id_sucursalFK_Idsucursal=$orden_compra_control_session->id_sucursalFK_Idsucursal;
		$this->id_termino_pago_proveedorFK_Idtermino_pago=$orden_compra_control_session->id_termino_pago_proveedorFK_Idtermino_pago;
		$this->id_usuarioFK_Idusuario=$orden_compra_control_session->id_usuarioFK_Idusuario;
		$this->id_vendedorFK_Idvendedor=$orden_compra_control_session->id_vendedorFK_Idvendedor;

		
		
		
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
	
	public function getorden_compraControllerAdditional() {
		return $this->orden_compraControllerAdditional;
	}

	public function setorden_compraControllerAdditional($orden_compraControllerAdditional) {
		$this->orden_compraControllerAdditional = $orden_compraControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getorden_compraActual() : orden_compra {
		return $this->orden_compraActual;
	}

	public function setorden_compraActual(orden_compra $orden_compraActual) {
		$this->orden_compraActual = $orden_compraActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidorden_compra() : int {
		return $this->idorden_compra;
	}

	public function setidorden_compra(int $idorden_compra) {
		$this->idorden_compra = $idorden_compra;
	}
	
	public function getorden_compra() : orden_compra {
		return $this->orden_compra;
	}

	public function setorden_compra(orden_compra $orden_compra) {
		$this->orden_compra = $orden_compra;
	}
		
	public function getorden_compraLogic() : orden_compra_logic {		
		return $this->orden_compraLogic;
	}

	public function setorden_compraLogic(orden_compra_logic $orden_compraLogic) {
		$this->orden_compraLogic = $orden_compraLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getorden_comprasModel() {		
		try {						
			/*orden_comprasModel.setWrappedData(orden_compraLogic->getorden_compras());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->orden_comprasModel;
	}
	
	public function setorden_comprasModel($orden_comprasModel) {
		$this->orden_comprasModel = $orden_comprasModel;
	}
	
	public function getorden_compras() : array {		
		return $this->orden_compras;
	}
	
	public function setorden_compras(array $orden_compras) {
		$this->orden_compras= $orden_compras;
	}
	
	public function getorden_comprasEliminados() : array {		
		return $this->orden_comprasEliminados;
	}
	
	public function setorden_comprasEliminados(array $orden_comprasEliminados) {
		$this->orden_comprasEliminados= $orden_comprasEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getorden_compraActualFromListDataModel() {
		try {
			/*$orden_compraClase= $this->orden_comprasModel->getRowData();*/
			
			/*return $orden_compra;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
