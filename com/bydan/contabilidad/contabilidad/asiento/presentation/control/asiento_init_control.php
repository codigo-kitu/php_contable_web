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

namespace com\bydan\contabilidad\contabilidad\asiento\presentation\control;

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

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/asiento/util/asiento_carga.php');
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;

use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_param_return;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\presentation\session\asiento_session;


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

use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\entity\asiento_predefinido;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\logic\asiento_predefinido_logic;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;

use com\bydan\contabilidad\contabilidad\documento_contable\business\entity\documento_contable;
use com\bydan\contabilidad\contabilidad\documento_contable\business\logic\documento_contable_logic;
use com\bydan\contabilidad\contabilidad\documento_contable\util\documento_contable_carga;
use com\bydan\contabilidad\contabilidad\documento_contable\util\documento_contable_util;

use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\logic\libro_auxiliar_logic;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_carga;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_util;

use com\bydan\contabilidad\contabilidad\fuente\business\entity\fuente;
use com\bydan\contabilidad\contabilidad\fuente\business\logic\fuente_logic;
use com\bydan\contabilidad\contabilidad\fuente\util\fuente_carga;
use com\bydan\contabilidad\contabilidad\fuente\util\fuente_util;

use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;
use com\bydan\contabilidad\contabilidad\centro_costo\business\logic\centro_costo_logic;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_carga;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL


use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_util;
use com\bydan\contabilidad\contabilidad\asiento_detalle\presentation\session\asiento_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
asiento_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
asiento_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
asiento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
asiento_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*asiento_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class asiento_init_control extends ControllerBase {	
	
	public $asientoClase=null;	
	public $asientosModel=null;	
	public $asientosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idasiento=0;	
	public ?int $idasientoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $asientoLogic=null;
	
	public $asientoActual=null;	
	
	public $asiento=null;
	public $asientos=null;
	public $asientosEliminados=array();
	public $asientosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $asientosLocal=array();
	public ?array $asientosReporte=null;
	public ?array $asientosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadasiento='onload';
	public string $strTipoPaginaAuxiliarasiento='none';
	public string $strTipoUsuarioAuxiliarasiento='none';
		
	public $asientoReturnGeneral=null;
	public $asientoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $asientoModel=null;
	public $asientoControllerAdditional=null;
	
	
	

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


	public $ordencompraLogic=null;

	public function  getorden_compraLogic() {
		return $this->ordencompraLogic;
	}

	public function setorden_compraLogic($ordencompraLogic) {
		$this->ordencompraLogic =$ordencompraLogic;
	}


	public $imagenasientoLogic=null;

	public function  getimagen_asientoLogic() {
		return $this->imagenasientoLogic;
	}

	public function setimagen_asientoLogic($imagenasientoLogic) {
		$this->imagenasientoLogic =$imagenasientoLogic;
	}


	public $cuentacorrientedetalleLogic=null;

	public function  getcuenta_corriente_detalleLogic() {
		return $this->cuentacorrientedetalleLogic;
	}

	public function setcuenta_corriente_detalleLogic($cuentacorrientedetalleLogic) {
		$this->cuentacorrientedetalleLogic =$cuentacorrientedetalleLogic;
	}


	public $devolucionLogic=null;

	public function  getdevolucionLogic() {
		return $this->devolucionLogic;
	}

	public function setdevolucionLogic($devolucionLogic) {
		$this->devolucionLogic =$devolucionLogic;
	}


	public $asientodetalleLogic=null;

	public function  getasiento_detalleLogic() {
		return $this->asientodetalleLogic;
	}

	public function setasiento_detalleLogic($asientodetalleLogic) {
		$this->asientodetalleLogic =$asientodetalleLogic;
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
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajenumero='';
	public string $strMensajefecha='';
	public string $strMensajeid_asiento_predefinido='';
	public string $strMensajeid_documento_contable='';
	public string $strMensajeid_libro_auxiliar='';
	public string $strMensajeid_fuente='';
	public string $strMensajeid_centro_costo='';
	public string $strMensajedescripcion='';
	public string $strMensajetotal_debito='';
	public string $strMensajetotal_credito='';
	public string $strMensajediferencia='';
	public string $strMensajeid_estado='';
	public string $strMensajeid_documento_contable_origen='';
	public string $strMensajevalor='';
	public string $strMensajenro_nit='';
	
	
	public string $strVisibleFK_Idasiento_predefinido='display:table-row';
	public string $strVisibleFK_Idcentro_costo='display:table-row';
	public string $strVisibleFK_Iddocumento_contable='display:table-row';
	public string $strVisibleFK_Iddocumento_contable_origen='display:table-row';
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idestado='display:table-row';
	public string $strVisibleFK_Idfuente='display:table-row';
	public string $strVisibleFK_Idlibro_auxiliar='display:table-row';
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

	public array $asiento_predefinidosFK=array();

	public function getasiento_predefinidosFK():array {
		return $this->asiento_predefinidosFK;
	}

	public function setasiento_predefinidosFK(array $asiento_predefinidosFK) {
		$this->asiento_predefinidosFK = $asiento_predefinidosFK;
	}

	public int $idasiento_predefinidoDefaultFK=-1;

	public function getIdasiento_predefinidoDefaultFK():int {
		return $this->idasiento_predefinidoDefaultFK;
	}

	public function setIdasiento_predefinidoDefaultFK(int $idasiento_predefinidoDefaultFK) {
		$this->idasiento_predefinidoDefaultFK = $idasiento_predefinidoDefaultFK;
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

	public array $documento_contable_origensFK=array();

	public function getdocumento_contable_origensFK():array {
		return $this->documento_contable_origensFK;
	}

	public function setdocumento_contable_origensFK(array $documento_contable_origensFK) {
		$this->documento_contable_origensFK = $documento_contable_origensFK;
	}

	public int $iddocumento_contable_origenDefaultFK=-1;

	public function getIddocumento_contable_origenDefaultFK():int {
		return $this->iddocumento_contable_origenDefaultFK;
	}

	public function setIddocumento_contable_origenDefaultFK(int $iddocumento_contable_origenDefaultFK) {
		$this->iddocumento_contable_origenDefaultFK = $iddocumento_contable_origenDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisosdevolucion_factura='none';
	public $strTienePermisosfactura_lote='none';
	public $strTienePermisosorden_compra='none';
	public $strTienePermisosimagen_asiento='none';
	public $strTienePermisoscuenta_corriente_detalle='none';
	public $strTienePermisosdevolucion='none';
	public $strTienePermisosasiento_detalle='none';
	public $strTienePermisosfactura='none';
	public $strTienePermisosconsignacion='none';
	
	
	public  $id_asiento_predefinidoFK_Idasiento_predefinido=null;

	public  $id_centro_costoFK_Idcentro_costo=null;

	public  $id_documento_contableFK_Iddocumento_contable=null;

	public  $id_documento_contable_origenFK_Iddocumento_contable_origen=null;

	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_estadoFK_Idestado=null;

	public  $id_fuenteFK_Idfuente=null;

	public  $id_libro_auxiliarFK_Idlibro_auxiliar=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_sucursalFK_Idsucursal=null;

	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->asientoLogic==null) {
				$this->asientoLogic=new asiento_logic();
			}
			
		} else {
			if($this->asientoLogic==null) {
				$this->asientoLogic=new asiento_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->asientoClase==null) {
				$this->asientoClase=new asiento();
			}
			
			$this->asientoClase->setId(0);	
				
				
			$this->asientoClase->setid_empresa(-1);	
			$this->asientoClase->setid_sucursal(-1);	
			$this->asientoClase->setid_ejercicio(-1);	
			$this->asientoClase->setid_periodo(-1);	
			$this->asientoClase->setid_usuario(-1);	
			$this->asientoClase->setnumero('');	
			$this->asientoClase->setfecha(date('Y-m-d'));	
			$this->asientoClase->setid_asiento_predefinido(null);	
			$this->asientoClase->setid_documento_contable(-1);	
			$this->asientoClase->setid_libro_auxiliar(-1);	
			$this->asientoClase->setid_fuente(-1);	
			$this->asientoClase->setid_centro_costo(-1);	
			$this->asientoClase->setdescripcion('');	
			$this->asientoClase->settotal_debito(0.0);	
			$this->asientoClase->settotal_credito(0.0);	
			$this->asientoClase->setdiferencia(0.0);	
			$this->asientoClase->setid_estado(-1);	
			$this->asientoClase->setid_documento_contable_origen(null);	
			$this->asientoClase->setvalor(0.0);	
			$this->asientoClase->setnro_nit('');	
			
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
		$this->prepararEjecutarMantenimientoBase('asiento');
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
		$this->cargarParametrosReporteBase('asiento');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('asiento');
	}
	
	public function actualizarControllerConReturnGeneral(asiento_param_return $asientoReturnGeneral) {
		if($asientoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesasientosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$asientoReturnGeneral->getsMensajeProceso();
		}
		
		if($asientoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$asientoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($asientoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$asientoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$asientoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($asientoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($asientoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$asientoReturnGeneral->getsFuncionJs();
		}
		
		if($asientoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(asiento_session $asiento_session){
		$this->strStyleDivArbol=$asiento_session->strStyleDivArbol;	
		$this->strStyleDivContent=$asiento_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$asiento_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$asiento_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$asiento_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$asiento_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$asiento_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(asiento_session $asiento_session){
		$asiento_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$asiento_session->strStyleDivHeader='display:none';			
		$asiento_session->strStyleDivContent='width:93%;height:100%';	
		$asiento_session->strStyleDivOpcionesBanner='display:none';	
		$asiento_session->strStyleDivExpandirColapsar='display:none';	
		$asiento_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(asiento_control $asiento_control_session){
		$this->idNuevo=$asiento_control_session->idNuevo;
		$this->asientoActual=$asiento_control_session->asientoActual;
		$this->asiento=$asiento_control_session->asiento;
		$this->asientoClase=$asiento_control_session->asientoClase;
		$this->asientos=$asiento_control_session->asientos;
		$this->asientosEliminados=$asiento_control_session->asientosEliminados;
		$this->asiento=$asiento_control_session->asiento;
		$this->asientosReporte=$asiento_control_session->asientosReporte;
		$this->asientosSeleccionados=$asiento_control_session->asientosSeleccionados;
		$this->arrOrderBy=$asiento_control_session->arrOrderBy;
		$this->arrOrderByRel=$asiento_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$asiento_control_session->arrHistoryWebs;
		$this->arrSessionBases=$asiento_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadasiento=$asiento_control_session->strTypeOnLoadasiento;
		$this->strTipoPaginaAuxiliarasiento=$asiento_control_session->strTipoPaginaAuxiliarasiento;
		$this->strTipoUsuarioAuxiliarasiento=$asiento_control_session->strTipoUsuarioAuxiliarasiento;	
		
		$this->bitEsPopup=$asiento_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$asiento_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$asiento_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$asiento_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$asiento_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$asiento_control_session->strSufijo;
		$this->bitEsRelaciones=$asiento_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$asiento_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$asiento_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$asiento_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$asiento_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$asiento_control_session->strTituloTabla;
		$this->strTituloPathPagina=$asiento_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$asiento_control_session->strTituloPathElementoActual;
		
		if($this->asientoLogic==null) {			
			$this->asientoLogic=new asiento_logic();
		}
		
		
		if($this->asientoClase==null) {
			$this->asientoClase=new asiento();	
		}
		
		$this->asientoLogic->setasiento($this->asientoClase);
		
		
		if($this->asientos==null) {
			$this->asientos=array();	
		}
		
		$this->asientoLogic->setasientos($this->asientos);
		
		
		$this->strTipoView=$asiento_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$asiento_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$asiento_control_session->datosCliente;
		$this->strAccionBusqueda=$asiento_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$asiento_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$asiento_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$asiento_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$asiento_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$asiento_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$asiento_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$asiento_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$asiento_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$asiento_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$asiento_control_session->strTipoPaginacion;
		$this->strTipoAccion=$asiento_control_session->strTipoAccion;
		$this->tiposReportes=$asiento_control_session->tiposReportes;
		$this->tiposReporte=$asiento_control_session->tiposReporte;
		$this->tiposAcciones=$asiento_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$asiento_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$asiento_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$asiento_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$asiento_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$asiento_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$asiento_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$asiento_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$asiento_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$asiento_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$asiento_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$asiento_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$asiento_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$asiento_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$asiento_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$asiento_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$asiento_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$asiento_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$asiento_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$asiento_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$asiento_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$asiento_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$asiento_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$asiento_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$asiento_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$asiento_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$asiento_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$asiento_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$asiento_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$asiento_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$asiento_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$asiento_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$asiento_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$asiento_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$asiento_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$asiento_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$asiento_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$asiento_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$asiento_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$asiento_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$asiento_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$asiento_control_session->resumenUsuarioActual;	
		$this->moduloActual=$asiento_control_session->moduloActual;	
		$this->opcionActual=$asiento_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$asiento_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$asiento_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$asiento_session=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME));
				
		if($asiento_session==null) {
			$asiento_session=new asiento_session();
		}
		
		$this->strStyleDivArbol=$asiento_session->strStyleDivArbol;	
		$this->strStyleDivContent=$asiento_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$asiento_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$asiento_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$asiento_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$asiento_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$asiento_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$asiento_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$asiento_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$asiento_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$asiento_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$asiento_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$asiento_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$asiento_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$asiento_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$asiento_control_session->strMensajeid_usuario;
		$this->strMensajenumero=$asiento_control_session->strMensajenumero;
		$this->strMensajefecha=$asiento_control_session->strMensajefecha;
		$this->strMensajeid_asiento_predefinido=$asiento_control_session->strMensajeid_asiento_predefinido;
		$this->strMensajeid_documento_contable=$asiento_control_session->strMensajeid_documento_contable;
		$this->strMensajeid_libro_auxiliar=$asiento_control_session->strMensajeid_libro_auxiliar;
		$this->strMensajeid_fuente=$asiento_control_session->strMensajeid_fuente;
		$this->strMensajeid_centro_costo=$asiento_control_session->strMensajeid_centro_costo;
		$this->strMensajedescripcion=$asiento_control_session->strMensajedescripcion;
		$this->strMensajetotal_debito=$asiento_control_session->strMensajetotal_debito;
		$this->strMensajetotal_credito=$asiento_control_session->strMensajetotal_credito;
		$this->strMensajediferencia=$asiento_control_session->strMensajediferencia;
		$this->strMensajeid_estado=$asiento_control_session->strMensajeid_estado;
		$this->strMensajeid_documento_contable_origen=$asiento_control_session->strMensajeid_documento_contable_origen;
		$this->strMensajevalor=$asiento_control_session->strMensajevalor;
		$this->strMensajenro_nit=$asiento_control_session->strMensajenro_nit;
			
		
		$this->empresasFK=$asiento_control_session->empresasFK;
		$this->idempresaDefaultFK=$asiento_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$asiento_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$asiento_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$asiento_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$asiento_control_session->idejercicioDefaultFK;
		$this->periodosFK=$asiento_control_session->periodosFK;
		$this->idperiodoDefaultFK=$asiento_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$asiento_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$asiento_control_session->idusuarioDefaultFK;
		$this->asiento_predefinidosFK=$asiento_control_session->asiento_predefinidosFK;
		$this->idasiento_predefinidoDefaultFK=$asiento_control_session->idasiento_predefinidoDefaultFK;
		$this->documento_contablesFK=$asiento_control_session->documento_contablesFK;
		$this->iddocumento_contableDefaultFK=$asiento_control_session->iddocumento_contableDefaultFK;
		$this->libro_auxiliarsFK=$asiento_control_session->libro_auxiliarsFK;
		$this->idlibro_auxiliarDefaultFK=$asiento_control_session->idlibro_auxiliarDefaultFK;
		$this->fuentesFK=$asiento_control_session->fuentesFK;
		$this->idfuenteDefaultFK=$asiento_control_session->idfuenteDefaultFK;
		$this->centro_costosFK=$asiento_control_session->centro_costosFK;
		$this->idcentro_costoDefaultFK=$asiento_control_session->idcentro_costoDefaultFK;
		$this->estadosFK=$asiento_control_session->estadosFK;
		$this->idestadoDefaultFK=$asiento_control_session->idestadoDefaultFK;
		$this->documento_contable_origensFK=$asiento_control_session->documento_contable_origensFK;
		$this->iddocumento_contable_origenDefaultFK=$asiento_control_session->iddocumento_contable_origenDefaultFK;
		
		
		$this->strVisibleFK_Idasiento_predefinido=$asiento_control_session->strVisibleFK_Idasiento_predefinido;
		$this->strVisibleFK_Idcentro_costo=$asiento_control_session->strVisibleFK_Idcentro_costo;
		$this->strVisibleFK_Iddocumento_contable=$asiento_control_session->strVisibleFK_Iddocumento_contable;
		$this->strVisibleFK_Iddocumento_contable_origen=$asiento_control_session->strVisibleFK_Iddocumento_contable_origen;
		$this->strVisibleFK_Idejercicio=$asiento_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$asiento_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idestado=$asiento_control_session->strVisibleFK_Idestado;
		$this->strVisibleFK_Idfuente=$asiento_control_session->strVisibleFK_Idfuente;
		$this->strVisibleFK_Idlibro_auxiliar=$asiento_control_session->strVisibleFK_Idlibro_auxiliar;
		$this->strVisibleFK_Idperiodo=$asiento_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idsucursal=$asiento_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idusuario=$asiento_control_session->strVisibleFK_Idusuario;
		
		
		$this->strTienePermisosdevolucion_factura=$asiento_control_session->strTienePermisosdevolucion_factura;
		$this->strTienePermisosfactura_lote=$asiento_control_session->strTienePermisosfactura_lote;
		$this->strTienePermisosorden_compra=$asiento_control_session->strTienePermisosorden_compra;
		$this->strTienePermisosimagen_asiento=$asiento_control_session->strTienePermisosimagen_asiento;
		$this->strTienePermisoscuenta_corriente_detalle=$asiento_control_session->strTienePermisoscuenta_corriente_detalle;
		$this->strTienePermisosdevolucion=$asiento_control_session->strTienePermisosdevolucion;
		$this->strTienePermisosasiento_detalle=$asiento_control_session->strTienePermisosasiento_detalle;
		$this->strTienePermisosfactura=$asiento_control_session->strTienePermisosfactura;
		$this->strTienePermisosconsignacion=$asiento_control_session->strTienePermisosconsignacion;
		
		
		$this->id_asiento_predefinidoFK_Idasiento_predefinido=$asiento_control_session->id_asiento_predefinidoFK_Idasiento_predefinido;
		$this->id_centro_costoFK_Idcentro_costo=$asiento_control_session->id_centro_costoFK_Idcentro_costo;
		$this->id_documento_contableFK_Iddocumento_contable=$asiento_control_session->id_documento_contableFK_Iddocumento_contable;
		$this->id_documento_contable_origenFK_Iddocumento_contable_origen=$asiento_control_session->id_documento_contable_origenFK_Iddocumento_contable_origen;
		$this->id_ejercicioFK_Idejercicio=$asiento_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$asiento_control_session->id_empresaFK_Idempresa;
		$this->id_estadoFK_Idestado=$asiento_control_session->id_estadoFK_Idestado;
		$this->id_fuenteFK_Idfuente=$asiento_control_session->id_fuenteFK_Idfuente;
		$this->id_libro_auxiliarFK_Idlibro_auxiliar=$asiento_control_session->id_libro_auxiliarFK_Idlibro_auxiliar;
		$this->id_periodoFK_Idperiodo=$asiento_control_session->id_periodoFK_Idperiodo;
		$this->id_sucursalFK_Idsucursal=$asiento_control_session->id_sucursalFK_Idsucursal;
		$this->id_usuarioFK_Idusuario=$asiento_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getasientoControllerAdditional() {
		return $this->asientoControllerAdditional;
	}

	public function setasientoControllerAdditional($asientoControllerAdditional) {
		$this->asientoControllerAdditional = $asientoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getasientoActual() : asiento {
		return $this->asientoActual;
	}

	public function setasientoActual(asiento $asientoActual) {
		$this->asientoActual = $asientoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidasiento() : int {
		return $this->idasiento;
	}

	public function setidasiento(int $idasiento) {
		$this->idasiento = $idasiento;
	}
	
	public function getasiento() : asiento {
		return $this->asiento;
	}

	public function setasiento(asiento $asiento) {
		$this->asiento = $asiento;
	}
		
	public function getasientoLogic() : asiento_logic {		
		return $this->asientoLogic;
	}

	public function setasientoLogic(asiento_logic $asientoLogic) {
		$this->asientoLogic = $asientoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getasientosModel() {		
		try {						
			/*asientosModel.setWrappedData(asientoLogic->getasientos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->asientosModel;
	}
	
	public function setasientosModel($asientosModel) {
		$this->asientosModel = $asientosModel;
	}
	
	public function getasientos() : array {		
		return $this->asientos;
	}
	
	public function setasientos(array $asientos) {
		$this->asientos= $asientos;
	}
	
	public function getasientosEliminados() : array {		
		return $this->asientosEliminados;
	}
	
	public function setasientosEliminados(array $asientosEliminados) {
		$this->asientosEliminados= $asientosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getasientoActualFromListDataModel() {
		try {
			/*$asientoClase= $this->asientosModel->getRowData();*/
			
			/*return $asiento;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
