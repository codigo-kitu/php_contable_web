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

namespace com\bydan\contabilidad\facturacion\parametro_facturacion\presentation\control;

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

use com\bydan\contabilidad\facturacion\parametro_facturacion\business\entity\parametro_facturacion;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/parametro_facturacion/util/parametro_facturacion_carga.php');
use com\bydan\contabilidad\facturacion\parametro_facturacion\util\parametro_facturacion_carga;

use com\bydan\contabilidad\facturacion\parametro_facturacion\util\parametro_facturacion_util;
use com\bydan\contabilidad\facturacion\parametro_facturacion\util\parametro_facturacion_param_return;
use com\bydan\contabilidad\facturacion\parametro_facturacion\business\logic\parametro_facturacion_logic;
use com\bydan\contabilidad\facturacion\parametro_facturacion\presentation\session\parametro_facturacion_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
parametro_facturacion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
parametro_facturacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
parametro_facturacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
parametro_facturacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*parametro_facturacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class parametro_facturacion_base_control extends parametro_facturacion_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->parametro_facturacionClase==null) {		
				$this->parametro_facturacionClase=new parametro_facturacion();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_termino_pago_cliente')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_termino_pago_cliente',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->parametro_facturacionClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->parametro_facturacionClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->parametro_facturacionClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->parametro_facturacionClase->setnombre_factura($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre_factura'));
				
				$this->parametro_facturacionClase->setnumero_factura((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'numero_factura'));
				
				$this->parametro_facturacionClase->setincremento_factura((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'incremento_factura'));
				
				$this->parametro_facturacionClase->setsolo_costo_producto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'solo_costo_producto')));
				
				$this->parametro_facturacionClase->setnumero_factura_lote((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'numero_factura_lote'));
				
				$this->parametro_facturacionClase->setincremento_factura_lote((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'incremento_factura_lote'));
				
				$this->parametro_facturacionClase->setnumero_devolucion((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'numero_devolucion'));
				
				$this->parametro_facturacionClase->setincremento_devolucion((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'incremento_devolucion'));
				
				$this->parametro_facturacionClase->setid_termino_pago_cliente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_termino_pago_cliente'));
				
				$this->parametro_facturacionClase->setnombre_estimado($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre_estimado'));
				
				$this->parametro_facturacionClase->setnumero_estimado((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'numero_estimado'));
				
				$this->parametro_facturacionClase->setincremento_estimado((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'incremento_estimado'));
				
				$this->parametro_facturacionClase->setsolo_costo_producto_estimado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'solo_costo_producto_estimado')));
				
				$this->parametro_facturacionClase->setnombre_consignacion($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre_consignacion'));
				
				$this->parametro_facturacionClase->setnumero_consignacion((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'numero_consignacion'));
				
				$this->parametro_facturacionClase->setincremento_consignacion((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'incremento_consignacion'));
				
				$this->parametro_facturacionClase->setsolo_costo_producto_consignacion(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'solo_costo_producto_consignacion')));
				
				$this->parametro_facturacionClase->setcon_recibo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_recibo')));
				
				$this->parametro_facturacionClase->setnombre_recibo($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre_recibo'));
				
				$this->parametro_facturacionClase->setnumero_recibo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'numero_recibo'));
				
				$this->parametro_facturacionClase->setincremento_recibo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'incremento_recibo'));
				
				$this->parametro_facturacionClase->setcon_impuesto_recibo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_impuesto_recibo')));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->parametro_facturacionModel->set($this->parametro_facturacionClase);
				
				/*$this->parametro_facturacionModel->set($this->migrarModelparametro_facturacion($this->parametro_facturacionClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->parametro_facturacionLogic->getparametro_facturacion()->setId($this->parametro_facturacionClase->getId());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setVersionRow($this->parametro_facturacionClase->getVersionRow());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setVersionRow($this->parametro_facturacionClase->getVersionRow());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setid_empresa($this->parametro_facturacionClase->getid_empresa());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setnombre_factura($this->parametro_facturacionClase->getnombre_factura());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setnumero_factura($this->parametro_facturacionClase->getnumero_factura());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setincremento_factura($this->parametro_facturacionClase->getincremento_factura());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setsolo_costo_producto($this->parametro_facturacionClase->getsolo_costo_producto());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setnumero_factura_lote($this->parametro_facturacionClase->getnumero_factura_lote());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setincremento_factura_lote($this->parametro_facturacionClase->getincremento_factura_lote());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setnumero_devolucion($this->parametro_facturacionClase->getnumero_devolucion());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setincremento_devolucion($this->parametro_facturacionClase->getincremento_devolucion());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setid_termino_pago_cliente($this->parametro_facturacionClase->getid_termino_pago_cliente());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setnombre_estimado($this->parametro_facturacionClase->getnombre_estimado());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setnumero_estimado($this->parametro_facturacionClase->getnumero_estimado());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setincremento_estimado($this->parametro_facturacionClase->getincremento_estimado());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setsolo_costo_producto_estimado($this->parametro_facturacionClase->getsolo_costo_producto_estimado());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setnombre_consignacion($this->parametro_facturacionClase->getnombre_consignacion());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setnumero_consignacion($this->parametro_facturacionClase->getnumero_consignacion());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setincremento_consignacion($this->parametro_facturacionClase->getincremento_consignacion());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setsolo_costo_producto_consignacion($this->parametro_facturacionClase->getsolo_costo_producto_consignacion());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setcon_recibo($this->parametro_facturacionClase->getcon_recibo());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setnombre_recibo($this->parametro_facturacionClase->getnombre_recibo());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setnumero_recibo($this->parametro_facturacionClase->getnumero_recibo());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setincremento_recibo($this->parametro_facturacionClase->getincremento_recibo());	
			$this->parametro_facturacionLogic->getparametro_facturacion()->setcon_impuesto_recibo($this->parametro_facturacionClase->getcon_impuesto_recibo());	
		} else {
			$this->parametro_facturacionClase->setId($this->parametro_facturacionLogic->getparametro_facturacion()->getId());	
			$this->parametro_facturacionClase->setVersionRow($this->parametro_facturacionLogic->getparametro_facturacion()->getVersionRow());	
			$this->parametro_facturacionClase->setVersionRow($this->parametro_facturacionLogic->getparametro_facturacion()->getVersionRow());	
			$this->parametro_facturacionClase->setid_empresa($this->parametro_facturacionLogic->getparametro_facturacion()->getid_empresa());	
			$this->parametro_facturacionClase->setnombre_factura($this->parametro_facturacionLogic->getparametro_facturacion()->getnombre_factura());	
			$this->parametro_facturacionClase->setnumero_factura($this->parametro_facturacionLogic->getparametro_facturacion()->getnumero_factura());	
			$this->parametro_facturacionClase->setincremento_factura($this->parametro_facturacionLogic->getparametro_facturacion()->getincremento_factura());	
			$this->parametro_facturacionClase->setsolo_costo_producto($this->parametro_facturacionLogic->getparametro_facturacion()->getsolo_costo_producto());	
			$this->parametro_facturacionClase->setnumero_factura_lote($this->parametro_facturacionLogic->getparametro_facturacion()->getnumero_factura_lote());	
			$this->parametro_facturacionClase->setincremento_factura_lote($this->parametro_facturacionLogic->getparametro_facturacion()->getincremento_factura_lote());	
			$this->parametro_facturacionClase->setnumero_devolucion($this->parametro_facturacionLogic->getparametro_facturacion()->getnumero_devolucion());	
			$this->parametro_facturacionClase->setincremento_devolucion($this->parametro_facturacionLogic->getparametro_facturacion()->getincremento_devolucion());	
			$this->parametro_facturacionClase->setid_termino_pago_cliente($this->parametro_facturacionLogic->getparametro_facturacion()->getid_termino_pago_cliente());	
			$this->parametro_facturacionClase->setnombre_estimado($this->parametro_facturacionLogic->getparametro_facturacion()->getnombre_estimado());	
			$this->parametro_facturacionClase->setnumero_estimado($this->parametro_facturacionLogic->getparametro_facturacion()->getnumero_estimado());	
			$this->parametro_facturacionClase->setincremento_estimado($this->parametro_facturacionLogic->getparametro_facturacion()->getincremento_estimado());	
			$this->parametro_facturacionClase->setsolo_costo_producto_estimado($this->parametro_facturacionLogic->getparametro_facturacion()->getsolo_costo_producto_estimado());	
			$this->parametro_facturacionClase->setnombre_consignacion($this->parametro_facturacionLogic->getparametro_facturacion()->getnombre_consignacion());	
			$this->parametro_facturacionClase->setnumero_consignacion($this->parametro_facturacionLogic->getparametro_facturacion()->getnumero_consignacion());	
			$this->parametro_facturacionClase->setincremento_consignacion($this->parametro_facturacionLogic->getparametro_facturacion()->getincremento_consignacion());	
			$this->parametro_facturacionClase->setsolo_costo_producto_consignacion($this->parametro_facturacionLogic->getparametro_facturacion()->getsolo_costo_producto_consignacion());	
			$this->parametro_facturacionClase->setcon_recibo($this->parametro_facturacionLogic->getparametro_facturacion()->getcon_recibo());	
			$this->parametro_facturacionClase->setnombre_recibo($this->parametro_facturacionLogic->getparametro_facturacion()->getnombre_recibo());	
			$this->parametro_facturacionClase->setnumero_recibo($this->parametro_facturacionLogic->getparametro_facturacion()->getnumero_recibo());	
			$this->parametro_facturacionClase->setincremento_recibo($this->parametro_facturacionLogic->getparametro_facturacion()->getincremento_recibo());	
			$this->parametro_facturacionClase->setcon_impuesto_recibo($this->parametro_facturacionLogic->getparametro_facturacion()->getcon_impuesto_recibo());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->parametro_facturacionModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='nombre_factura') {$this->strMensajenombre_factura=$strMensajeCampo;}
		if($strNombreCampo=='numero_factura') {$this->strMensajenumero_factura=$strMensajeCampo;}
		if($strNombreCampo=='incremento_factura') {$this->strMensajeincremento_factura=$strMensajeCampo;}
		if($strNombreCampo=='solo_costo_producto') {$this->strMensajesolo_costo_producto=$strMensajeCampo;}
		if($strNombreCampo=='numero_factura_lote') {$this->strMensajenumero_factura_lote=$strMensajeCampo;}
		if($strNombreCampo=='incremento_factura_lote') {$this->strMensajeincremento_factura_lote=$strMensajeCampo;}
		if($strNombreCampo=='numero_devolucion') {$this->strMensajenumero_devolucion=$strMensajeCampo;}
		if($strNombreCampo=='incremento_devolucion') {$this->strMensajeincremento_devolucion=$strMensajeCampo;}
		if($strNombreCampo=='id_termino_pago_cliente') {$this->strMensajeid_termino_pago_cliente=$strMensajeCampo;}
		if($strNombreCampo=='nombre_estimado') {$this->strMensajenombre_estimado=$strMensajeCampo;}
		if($strNombreCampo=='numero_estimado') {$this->strMensajenumero_estimado=$strMensajeCampo;}
		if($strNombreCampo=='incremento_estimado') {$this->strMensajeincremento_estimado=$strMensajeCampo;}
		if($strNombreCampo=='solo_costo_producto_estimado') {$this->strMensajesolo_costo_producto_estimado=$strMensajeCampo;}
		if($strNombreCampo=='nombre_consignacion') {$this->strMensajenombre_consignacion=$strMensajeCampo;}
		if($strNombreCampo=='numero_consignacion') {$this->strMensajenumero_consignacion=$strMensajeCampo;}
		if($strNombreCampo=='incremento_consignacion') {$this->strMensajeincremento_consignacion=$strMensajeCampo;}
		if($strNombreCampo=='solo_costo_producto_consignacion') {$this->strMensajesolo_costo_producto_consignacion=$strMensajeCampo;}
		if($strNombreCampo=='con_recibo') {$this->strMensajecon_recibo=$strMensajeCampo;}
		if($strNombreCampo=='nombre_recibo') {$this->strMensajenombre_recibo=$strMensajeCampo;}
		if($strNombreCampo=='numero_recibo') {$this->strMensajenumero_recibo=$strMensajeCampo;}
		if($strNombreCampo=='incremento_recibo') {$this->strMensajeincremento_recibo=$strMensajeCampo;}
		if($strNombreCampo=='con_impuesto_recibo') {$this->strMensajecon_impuesto_recibo=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajenombre_factura='';
		$this->strMensajenumero_factura='';
		$this->strMensajeincremento_factura='';
		$this->strMensajesolo_costo_producto='';
		$this->strMensajenumero_factura_lote='';
		$this->strMensajeincremento_factura_lote='';
		$this->strMensajenumero_devolucion='';
		$this->strMensajeincremento_devolucion='';
		$this->strMensajeid_termino_pago_cliente='';
		$this->strMensajenombre_estimado='';
		$this->strMensajenumero_estimado='';
		$this->strMensajeincremento_estimado='';
		$this->strMensajesolo_costo_producto_estimado='';
		$this->strMensajenombre_consignacion='';
		$this->strMensajenumero_consignacion='';
		$this->strMensajeincremento_consignacion='';
		$this->strMensajesolo_costo_producto_consignacion='';
		$this->strMensajecon_recibo='';
		$this->strMensajenombre_recibo='';
		$this->strMensajenumero_recibo='';
		$this->strMensajeincremento_recibo='';
		$this->strMensajecon_impuesto_recibo='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->commitNewConnexionToDeep();
				$this->parametro_facturacionLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->rollbackNewConnexionToDeep();
				$this->parametro_facturacionLogic->closeNewConnexionToDeep();
			}
			*/
			
			$this->manejarRetornarExcepcion($e);
			throw $e;
		}
	}
	
	public function actualizar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->getNewConnexionToDeep();
			}

			$parametro_facturacion_session=unserialize($this->Session->read(parametro_facturacion_util::$STR_SESSION_NAME));
						
			if($parametro_facturacion_session==null) {
				$parametro_facturacion_session=new parametro_facturacion_session();
			}
			
			if(!$this->bitEsnuevo){ 
				$this->ejecutarMantenimiento(MaintenanceType::$ACTUALIZAR);
				
				if($this->bitPostAccionSinCerrar || $this->bitPostAccionNuevo) {
					$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);					
					
				} else {
					$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
				}
				
			} else { 
				$this->nuevo();
				
				if($this->bitPostAccionSinCerrar || $this->bitPostAccionNuevo) {
					$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);					
					
					if($this->bitPostAccionNuevo) {
						$this->bitEsnuevo=true;
					}
				} else {
					$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
				}
			}						
					
			
			
			if($this->bitPostAccionSinCerrar || $this->bitPostAccionNuevo) {				
				$this->strVisibleTablaElementos='table-row';
				$this->strVisibleTablaAcciones='table-row';	
				
			} else {
				/*OCULTA CAMPOS Y ACCIONES*/
				$this->cancelarControles();
			}
			
			
			if($this->bitPostAccionSinCerrar) {
				$id=$this->getDataFormId();
					
				if($id!=null && $id>0) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->parametro_facturacionLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->parametro_facturacionActual =$this->parametro_facturacionClase;
			
			/*$this->parametro_facturacionActual =$this->migrarModelparametro_facturacion($this->parametro_facturacionClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->commitNewConnexionToDeep();
				$this->parametro_facturacionLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->parametro_facturacionLogic->getparametro_facturacions(),$this->parametro_facturacionActual);
			
			$this->actualizarControllerConReturnGeneral($this->parametro_facturacionReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->rollbackNewConnexionToDeep();
				$this->parametro_facturacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->getNewConnexionToDeep();
			}


			if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
				$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR);
			
			} else {
				$this->eliminarTabla($idActual);
			}
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR',null);			
		
			$this->procesarPostAccion("form",MaintenanceType::$ELIMINAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->commitNewConnexionToDeep();
				$this->parametro_facturacionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->rollbackNewConnexionToDeep();
				$this->parametro_facturacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$parametro_facturacionsLocal=$this->getListaActual();
		
		$iIndice=parametro_facturacion_util::getIndiceNuevo($parametro_facturacionsLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(parametro_facturacion $parametro_facturacion,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$parametro_facturacionsLocal=$this->getListaActual();
		
		$iIndice=parametro_facturacion_util::getIndiceActual($parametro_facturacionsLocal,$parametro_facturacion,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevoparametro_facturacion')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->parametro_facturacionActual =$this->parametro_facturacionClase;
			
			/*$this->parametro_facturacionActual =$this->migrarModelparametro_facturacion($this->parametro_facturacionClase);*/
			
			$this->cancelarControles();
			
			$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_INFO;
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function ejecutarMantenimiento(string $maintenanceType){
		
		try {
			
			$this->cargarDatosCliente();		
			
			$this->parametro_facturacionLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('termino_pago_cliente');$classes[]=$class;
			
			$this->parametro_facturacionLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->parametro_facturacionLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->parametro_facturacionLogic->setparametro_facturacion(new parametro_facturacion());
				
				$this->parametro_facturacionLogic->getparametro_facturacion()->setIsNew(true);
				$this->parametro_facturacionLogic->getparametro_facturacion()->setIsChanged(true);
				$this->parametro_facturacionLogic->getparametro_facturacion()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->parametro_facturacionModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->parametro_facturacionLogic->parametro_facturacions[]=$this->parametro_facturacionLogic->getparametro_facturacion();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->parametro_facturacionLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->parametro_facturacionLogic->saveRelaciones($this->parametro_facturacionLogic->getparametro_facturacion());/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->parametro_facturacionLogic->getparametro_facturacion()->setIsChanged(true);
				$this->parametro_facturacionLogic->getparametro_facturacion()->setIsNew(false);
				$this->parametro_facturacionLogic->getparametro_facturacion()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->parametro_facturacionModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->parametro_facturacionLogic->getparametro_facturacion(),$this->parametro_facturacionLogic->getparametro_facturacions());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->parametro_facturacionLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->parametro_facturacionLogic->saveRelaciones($this->parametro_facturacionLogic->getparametro_facturacion());/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->parametro_facturacionLogic->getparametro_facturacion()->setIsDeleted(true);
				$this->parametro_facturacionLogic->getparametro_facturacion()->setIsNew(false);
				$this->parametro_facturacionLogic->getparametro_facturacion()->setIsChanged(false);				
				
				$this->actualizarLista($this->parametro_facturacionLogic->getparametro_facturacion(),$this->parametro_facturacionLogic->getparametro_facturacions());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->parametro_facturacionLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->parametro_facturacionLogic->saveRelaciones($this->parametro_facturacionLogic->getparametro_facturacion());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->parametro_facturacionsEliminados[]=$this->parametro_facturacionLogic->getparametro_facturacion();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->parametro_facturacionLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->parametro_facturacionLogic->saveRelaciones($this->parametro_facturacionLogic->getparametro_facturacion());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->parametro_facturacionsEliminados=array();
				}
			}
			
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('termino_pago_cliente');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->parametro_facturacionLogic->setparametro_facturacions();*/
					
					$this->parametro_facturacionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->parametro_facturacionLogic->setIsConDeepLoad(false);
			
			$this->parametro_facturacions=$this->parametro_facturacionLogic->getparametro_facturacions();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(parametro_facturacion_util::$STR_SESSION_NAME.'Lista',serialize($this->parametro_facturacions));
				$this->Session->write(parametro_facturacion_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->parametro_facturacionsEliminados));
			}
			
			if($class!=null);
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function eliminarTabla(int $id = null) {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->commitNewConnexionToDeep();
				$this->parametro_facturacionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->rollbackNewConnexionToDeep();
				$this->parametro_facturacionLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);			
		}
	}
	
	public function eliminarTablaBase(int $id = null) {		
		try {
			/*SOLO SI ES NECESARIO*/
			/*
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalparametro_facturacion;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->parametro_facturacionLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->parametro_facturacions as $parametro_facturacionLocal) {
				if($this->parametro_facturacionLogic->getparametro_facturacion()->getId()==$parametro_facturacionLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->parametro_facturacionLogic->getparametro_facturacion()->setIsDeleted(true);
			$this->parametro_facturacionsEliminados[]=$this->parametro_facturacionLogic->getparametro_facturacion();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->parametro_facturacions[$indice]);
				
				$this->parametro_facturacions = array_values($this->parametro_facturacions);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelparametro_facturacion($this->parametro_facturacionClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->commitNewConnexionToDeep();
				$this->parametro_facturacionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->rollbackNewConnexionToDeep();
				$this->parametro_facturacionLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(parametro_facturacion $parametro_facturacion,array $parametro_facturacions) {
		try {
			foreach($parametro_facturacions as $parametro_facturacionLocal){ 
				if($parametro_facturacionLocal->getId()==$parametro_facturacion->getId()) {
					$parametro_facturacionLocal->setIsChanged($parametro_facturacion->getIsChanged());
					$parametro_facturacionLocal->setIsNew($parametro_facturacion->getIsNew());
					$parametro_facturacionLocal->setIsDeleted($parametro_facturacion->getIsDeleted());
					//$parametro_facturacionLocal->setbitExpired($parametro_facturacion->getbitExpired());
					
					$parametro_facturacionLocal->setId($parametro_facturacion->getId());	
					$parametro_facturacionLocal->setVersionRow($parametro_facturacion->getVersionRow());	
					$parametro_facturacionLocal->setVersionRow($parametro_facturacion->getVersionRow());	
					$parametro_facturacionLocal->setid_empresa($parametro_facturacion->getid_empresa());	
					$parametro_facturacionLocal->setnombre_factura($parametro_facturacion->getnombre_factura());	
					$parametro_facturacionLocal->setnumero_factura($parametro_facturacion->getnumero_factura());	
					$parametro_facturacionLocal->setincremento_factura($parametro_facturacion->getincremento_factura());	
					$parametro_facturacionLocal->setsolo_costo_producto($parametro_facturacion->getsolo_costo_producto());	
					$parametro_facturacionLocal->setnumero_factura_lote($parametro_facturacion->getnumero_factura_lote());	
					$parametro_facturacionLocal->setincremento_factura_lote($parametro_facturacion->getincremento_factura_lote());	
					$parametro_facturacionLocal->setnumero_devolucion($parametro_facturacion->getnumero_devolucion());	
					$parametro_facturacionLocal->setincremento_devolucion($parametro_facturacion->getincremento_devolucion());	
					$parametro_facturacionLocal->setid_termino_pago_cliente($parametro_facturacion->getid_termino_pago_cliente());	
					$parametro_facturacionLocal->setnombre_estimado($parametro_facturacion->getnombre_estimado());	
					$parametro_facturacionLocal->setnumero_estimado($parametro_facturacion->getnumero_estimado());	
					$parametro_facturacionLocal->setincremento_estimado($parametro_facturacion->getincremento_estimado());	
					$parametro_facturacionLocal->setsolo_costo_producto_estimado($parametro_facturacion->getsolo_costo_producto_estimado());	
					$parametro_facturacionLocal->setnombre_consignacion($parametro_facturacion->getnombre_consignacion());	
					$parametro_facturacionLocal->setnumero_consignacion($parametro_facturacion->getnumero_consignacion());	
					$parametro_facturacionLocal->setincremento_consignacion($parametro_facturacion->getincremento_consignacion());	
					$parametro_facturacionLocal->setsolo_costo_producto_consignacion($parametro_facturacion->getsolo_costo_producto_consignacion());	
					$parametro_facturacionLocal->setcon_recibo($parametro_facturacion->getcon_recibo());	
					$parametro_facturacionLocal->setnombre_recibo($parametro_facturacion->getnombre_recibo());	
					$parametro_facturacionLocal->setnumero_recibo($parametro_facturacion->getnumero_recibo());	
					$parametro_facturacionLocal->setincremento_recibo($parametro_facturacion->getincremento_recibo());	
					$parametro_facturacionLocal->setcon_impuesto_recibo($parametro_facturacion->getcon_impuesto_recibo());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$parametro_facturacionsLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$parametro_facturacionsLocal=$this->parametro_facturacionLogic->getparametro_facturacions();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$parametro_facturacionsLocal=$this->parametro_facturacions;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $parametro_facturacionsLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->parametro_facturacionLogic->getparametro_facturacions() as $parametro_facturacion) {
				if($parametro_facturacion->getId()==$id) {
					$this->parametro_facturacionLogic->setparametro_facturacion($parametro_facturacion);
					
					break;
				}
			}				
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
		}
	}
	
	public function seleccionarActualAuxiliar(int $id = null) {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*NO FUNCIONA AQUI, SINO EN search.php
			$this->strFuncionBusquedaRapida=str_replace('TO_REPLACE',$id,$this->strFuncionBusquedaRapida);*/
			
					
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setSeleccionars(int $maxima_fila) {
		/*$parametro_facturacionsSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->parametro_facturacions as $parametro_facturacion) {
			$parametro_facturacion->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->parametro_facturacions[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : parametro_facturacion_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$parametro_facturacion_session=unserialize($this->Session->read(parametro_facturacion_util::$STR_SESSION_NAME));
						
		if($parametro_facturacion_session==null) {
			$parametro_facturacion_session=new parametro_facturacion_session();
		}
		
		
		$this->parametro_facturacionReturnGeneral=new parametro_facturacion_param_return();
		$this->parametro_facturacionParameterGeneral=new parametro_facturacion_param_return();
			
		$this->parametro_facturacionParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualparametro_facturacion(this.parametro_facturacion,true);
			this.setVariablesFormularioToObjetoActualForeignKeysparametro_facturacion(this.parametro_facturacion);*/
			
			if($parametro_facturacion_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualparametro_facturacion(this.parametro_facturacion,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->parametro_facturacionActual=$this->parametro_facturacionClase;
				
				$this->setCopiarVariablesObjetos($this->parametro_facturacionActual,$this->parametro_facturacion,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->parametro_facturacionReturnGeneral=$this->parametro_facturacionLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->parametro_facturacionLogic->getparametro_facturacions(),$this->parametro_facturacion,$this->parametro_facturacionParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($parametro_facturacion_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanparametro_facturacion($classes,$this->parametro_facturacionReturnGeneral,$this->parametro_facturacionBean,false);*/
				}
					
				if($this->parametro_facturacionReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->parametro_facturacionReturnGeneral->getparametro_facturacion(),$this->parametro_facturacionActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeyparametro_facturacion($this->parametro_facturacionReturnGeneral->getparametro_facturacion());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormularioparametro_facturacion($this->parametro_facturacionReturnGeneral->getparametro_facturacion());*/
				}
					
				if($this->parametro_facturacionReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->parametro_facturacionReturnGeneral->getparametro_facturacion(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->parametro_facturacion,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(parametro_facturacionJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualparametro_facturacion(this.parametro_facturacion,true);
				this.setVariablesFormularioToObjetoActualForeignKeysparametro_facturacion(this.parametro_facturacion);				
			}
			*/
		} else {
			/*
			//AUN_NO
			//MANEJAR EN TABLA
			
			if((($controlTipo==ControlTipo::$TEXTBOX || $controlTipo==ControlTipo::$DATE
				|| $controlTipo==ControlTipo::$TEXTAREA || $controlTipo==ControlTipo::$COMBOBOX
				)				
				&& $eventoTipo==EventoTipo::$CHANGE
				)
				
				|| ($controlTipo==ControlTipo::$CHECKBOX && $eventoTipo==EventoTipo::$CLIC)
				
			) { // && sTipoGeneral.equals("TEXTBOX")
				
				if($this->parametro_facturacionAnterior!=null) {
					$this->parametro_facturacion=$this->parametro_facturacionAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->parametro_facturacionReturnGeneral=$this->parametro_facturacionLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->parametro_facturacionLogic->getparametro_facturacions(),$this->parametro_facturacion,$this->parametro_facturacionParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->parametro_facturacionReturnGeneral->getparametro_facturacion(),$this->parametro_facturacionLogic->getparametro_facturacions());
			*/
		}
		
		return $this->parametro_facturacionReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->getNewConnexionToDeep();
			}

			$this->parametro_facturacionReturnGeneral=new parametro_facturacion_param_return();			
			$this->parametro_facturacionParameterGeneral=new parametro_facturacion_param_return();
			
			$this->parametro_facturacionParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->parametro_facturacionReturnGeneral=$this->parametro_facturacionLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->parametro_facturacions,$this->parametro_facturacionParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->parametro_facturacionReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->parametro_facturacionReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->commitNewConnexionToDeep();
				$this->parametro_facturacionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->parametro_facturacionReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->rollbackNewConnexionToDeep();
				$this->parametro_facturacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
			
			/*throw $e;*/
      	}
		
		return $return_json;
	}
	
	public function manejarEventos(string $sTipoControl,string $sTipoEvento) {		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		$this->parametro_facturacionReturnGeneral=new parametro_facturacion_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_parametro_facturacion') {
		    $sDominio='parametro_facturacion';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->parametro_facturacionReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->parametro_facturacionReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='parametro_facturacion';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='parametro_facturacion';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='parametro_facturacion';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->parametro_facturacionReturnGeneral=new parametro_facturacion_param_return();
		$this->parametro_facturacionParameterGeneral=new parametro_facturacion_param_return();
			
		$this->parametro_facturacionParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->parametro_facturacionReturnGeneral=$this->parametro_facturacionLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->parametro_facturacionLogic->getparametro_facturacions(),$this->parametro_facturacion,$this->parametro_facturacionParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->parametro_facturacionReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->parametro_facturacionReturnGeneral->getparametro_facturacion(),$classes);*/
		}									
	
		if($this->parametro_facturacionReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->parametro_facturacionReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->parametro_facturacionReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $parametro_facturacions,parametro_facturacion $parametro_facturacion) {
		
		$parametro_facturacion_session=unserialize($this->Session->read(parametro_facturacion_util::$STR_SESSION_NAME));
						
		if($parametro_facturacion_session==null) {
			$parametro_facturacion_session=new parametro_facturacion_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(parametro_facturacion_util::$CLASSNAME);
			}	
			*/
			
			$this->parametro_facturacionReturnGeneral=new parametro_facturacion_param_return();
			$this->parametro_facturacionParameterGeneral=new parametro_facturacion_param_return();
			
			$this->parametro_facturacionParameterGeneral->setdata($this->data);
		
		
			
		if($parametro_facturacion_session->conGuardarRelaciones) {
			$classes=parametro_facturacion_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->parametro_facturacionActual,$this->parametro_facturacion,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->parametro_facturacionReturnGeneral=$this->parametro_facturacionLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->parametro_facturacionLogic->getparametro_facturacions(),$this->parametro_facturacionActual,$this->parametro_facturacionParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->parametro_facturacionReturnGeneral=$this->parametro_facturacionLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$parametro_facturacions,$parametro_facturacion,$this->parametro_facturacionParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelparametro_facturacion($this->parametro_facturacionLogic->getparametro_facturacion());*/
			
			$this->parametro_facturacion=$this->parametro_facturacionLogic->getparametro_facturacion();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->parametro_facturacion);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->commitNewConnexionToDeep();
				$this->parametro_facturacionLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->rollbackNewConnexionToDeep();
				$this->parametro_facturacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$parametro_facturacionActual=new parametro_facturacion();
			
			if($this->parametro_facturacionClase==null) {		
				$this->parametro_facturacionClase=new parametro_facturacion();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$parametro_facturacionActual=$this->parametro_facturacions[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $parametro_facturacionActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $parametro_facturacionActual->setnombre_factura($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $parametro_facturacionActual->setnumero_factura((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $parametro_facturacionActual->setincremento_factura((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $parametro_facturacionActual->setsolo_costo_producto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_7')));  } else { $parametro_facturacionActual->setsolo_costo_producto(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $parametro_facturacionActual->setnumero_factura_lote((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $parametro_facturacionActual->setincremento_factura_lote((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $parametro_facturacionActual->setnumero_devolucion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $parametro_facturacionActual->setincremento_devolucion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $parametro_facturacionActual->setid_termino_pago_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $parametro_facturacionActual->setnombre_estimado($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $parametro_facturacionActual->setnumero_estimado((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $parametro_facturacionActual->setincremento_estimado((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $parametro_facturacionActual->setsolo_costo_producto_estimado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_16')));  } else { $parametro_facturacionActual->setsolo_costo_producto_estimado(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $parametro_facturacionActual->setnombre_consignacion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $parametro_facturacionActual->setnumero_consignacion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $parametro_facturacionActual->setincremento_consignacion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $parametro_facturacionActual->setsolo_costo_producto_consignacion(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_20')));  } else { $parametro_facturacionActual->setsolo_costo_producto_consignacion(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $parametro_facturacionActual->setcon_recibo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_21')));  } else { $parametro_facturacionActual->setcon_recibo(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $parametro_facturacionActual->setnombre_recibo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_22'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $parametro_facturacionActual->setnumero_recibo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_24','t'.$this->strSufijo)) {  $parametro_facturacionActual->setincremento_recibo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_24'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_25','t'.$this->strSufijo)) {  $parametro_facturacionActual->setcon_impuesto_recibo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_25')));  } else { $parametro_facturacionActual->setcon_impuesto_recibo(false); }

				$this->parametro_facturacionClase=$parametro_facturacionActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->parametro_facturacionModel->set($this->parametro_facturacionClase);
				
				/*$this->parametro_facturacionModel->set($this->migrarModelparametro_facturacion($this->parametro_facturacionClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->parametro_facturacions=$this->migrarModelparametro_facturacion($this->parametro_facturacionLogic->getparametro_facturacions());							
		$this->parametro_facturacions=$this->parametro_facturacionLogic->getparametro_facturacions();*/
		
			if(!$this->bitEsBusqueda) {
				$this->htmlTabla=$this->setHtmlTablaDatos();
			} else {
				$this->htmlTabla=$this->setHtmlTablaDatosParaBusqueda();
			}
		
		if($bitConRetrurnAjax==true) {			
			//$this->returnAjax();
		}		
	}
	
	public function returnAjax() {
		$this->returnAjaxBase();
	}
	
	public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession) {								
		/*$this->activarSession();*/
		
		if($bitSaveSession==true) {			
			$this->Session->write(parametro_facturacion_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$parametro_facturacion_control_session=unserialize($this->Session->read(parametro_facturacion_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($parametro_facturacion_control_session==null) {
				$parametro_facturacion_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($parametro_facturacion_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(parametro_facturacion_util::$STR_SESSION_NAME,$this);*/
		} else {
			$parametro_facturacion_session=unserialize($this->Session->read(parametro_facturacion_util::$STR_SESSION_NAME));
			
			if($parametro_facturacion_session==null) {
				$parametro_facturacion_session=new parametro_facturacion_session();
			}
			
			$this->set(parametro_facturacion_util::$STR_SESSION_NAME, $parametro_facturacion_session);
		}
	}
	
	public function setCopiarVariablesObjetos(parametro_facturacion $parametro_facturacionOrigen,parametro_facturacion $parametro_facturacion,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($parametro_facturacion==null) {
				$parametro_facturacion=new parametro_facturacion();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getId()!=null && $parametro_facturacionOrigen->getId()!=0)) {$parametro_facturacion->setId($parametro_facturacionOrigen->getId());}}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getnombre_factura()!=null && $parametro_facturacionOrigen->getnombre_factura()!='')) {$parametro_facturacion->setnombre_factura($parametro_facturacionOrigen->getnombre_factura());}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getnumero_factura()!=null && $parametro_facturacionOrigen->getnumero_factura()!=0)) {$parametro_facturacion->setnumero_factura($parametro_facturacionOrigen->getnumero_factura());}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getincremento_factura()!=null && $parametro_facturacionOrigen->getincremento_factura()!=0)) {$parametro_facturacion->setincremento_factura($parametro_facturacionOrigen->getincremento_factura());}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getsolo_costo_producto()!=null && $parametro_facturacionOrigen->getsolo_costo_producto()!=false)) {$parametro_facturacion->setsolo_costo_producto($parametro_facturacionOrigen->getsolo_costo_producto());}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getnumero_factura_lote()!=null && $parametro_facturacionOrigen->getnumero_factura_lote()!=0)) {$parametro_facturacion->setnumero_factura_lote($parametro_facturacionOrigen->getnumero_factura_lote());}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getincremento_factura_lote()!=null && $parametro_facturacionOrigen->getincremento_factura_lote()!=0)) {$parametro_facturacion->setincremento_factura_lote($parametro_facturacionOrigen->getincremento_factura_lote());}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getnumero_devolucion()!=null && $parametro_facturacionOrigen->getnumero_devolucion()!=0)) {$parametro_facturacion->setnumero_devolucion($parametro_facturacionOrigen->getnumero_devolucion());}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getincremento_devolucion()!=null && $parametro_facturacionOrigen->getincremento_devolucion()!=0)) {$parametro_facturacion->setincremento_devolucion($parametro_facturacionOrigen->getincremento_devolucion());}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getid_termino_pago_cliente()!=null && $parametro_facturacionOrigen->getid_termino_pago_cliente()!=-1)) {$parametro_facturacion->setid_termino_pago_cliente($parametro_facturacionOrigen->getid_termino_pago_cliente());}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getnombre_estimado()!=null && $parametro_facturacionOrigen->getnombre_estimado()!='')) {$parametro_facturacion->setnombre_estimado($parametro_facturacionOrigen->getnombre_estimado());}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getnumero_estimado()!=null && $parametro_facturacionOrigen->getnumero_estimado()!=0)) {$parametro_facturacion->setnumero_estimado($parametro_facturacionOrigen->getnumero_estimado());}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getincremento_estimado()!=null && $parametro_facturacionOrigen->getincremento_estimado()!=0)) {$parametro_facturacion->setincremento_estimado($parametro_facturacionOrigen->getincremento_estimado());}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getsolo_costo_producto_estimado()!=null && $parametro_facturacionOrigen->getsolo_costo_producto_estimado()!=false)) {$parametro_facturacion->setsolo_costo_producto_estimado($parametro_facturacionOrigen->getsolo_costo_producto_estimado());}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getnombre_consignacion()!=null && $parametro_facturacionOrigen->getnombre_consignacion()!='')) {$parametro_facturacion->setnombre_consignacion($parametro_facturacionOrigen->getnombre_consignacion());}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getnumero_consignacion()!=null && $parametro_facturacionOrigen->getnumero_consignacion()!=0)) {$parametro_facturacion->setnumero_consignacion($parametro_facturacionOrigen->getnumero_consignacion());}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getincremento_consignacion()!=null && $parametro_facturacionOrigen->getincremento_consignacion()!=0)) {$parametro_facturacion->setincremento_consignacion($parametro_facturacionOrigen->getincremento_consignacion());}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getsolo_costo_producto_consignacion()!=null && $parametro_facturacionOrigen->getsolo_costo_producto_consignacion()!=false)) {$parametro_facturacion->setsolo_costo_producto_consignacion($parametro_facturacionOrigen->getsolo_costo_producto_consignacion());}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getcon_recibo()!=null && $parametro_facturacionOrigen->getcon_recibo()!=false)) {$parametro_facturacion->setcon_recibo($parametro_facturacionOrigen->getcon_recibo());}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getnombre_recibo()!=null && $parametro_facturacionOrigen->getnombre_recibo()!='')) {$parametro_facturacion->setnombre_recibo($parametro_facturacionOrigen->getnombre_recibo());}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getnumero_recibo()!=null && $parametro_facturacionOrigen->getnumero_recibo()!=0)) {$parametro_facturacion->setnumero_recibo($parametro_facturacionOrigen->getnumero_recibo());}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getincremento_recibo()!=null && $parametro_facturacionOrigen->getincremento_recibo()!=0)) {$parametro_facturacion->setincremento_recibo($parametro_facturacionOrigen->getincremento_recibo());}
			if($conDefault || ($conDefault==false && $parametro_facturacionOrigen->getcon_impuesto_recibo()!=null && $parametro_facturacionOrigen->getcon_impuesto_recibo()!=false)) {$parametro_facturacion->setcon_impuesto_recibo($parametro_facturacionOrigen->getcon_impuesto_recibo());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$parametro_facturacionsSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$parametro_facturacionsSeleccionados[]=$this->parametro_facturacions[$indice];
			}
		}
		
		return $parametro_facturacionsSeleccionados;
	}
	
	public function getIdsFksSeleccionados(int $maxima_fila) : array {
		$IdsFksSeleccionados=array();
		$checkbox_id=0;
		//$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			//$indice=$i-1;
			
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$IdsFksSeleccionados[]=$checkbox_id;
			}
		}
		
		return $IdsFksSeleccionados;
	}
	
	public function quitarRelaciones() {	
		$parametro_facturacion= new parametro_facturacion();
		
		foreach($this->parametro_facturacionLogic->getparametro_facturacions() as $parametro_facturacion) {
			
		}		
		
		if($parametro_facturacion!=null);
	}
	
	public function cargarRelaciones(array $parametro_facturacions=array()) : array {	
		
		$parametro_facturacionsRespaldo = array();
		$parametro_facturacionsLocal = array();
		
		parametro_facturacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$parametro_facturacionsResp=array();
		$classes=array();
			
		
			
			
		$parametro_facturacionsRespaldo=$this->parametro_facturacionLogic->getparametro_facturacions();
			
		$this->parametro_facturacionLogic->setIsConDeep(true);
		
		$this->parametro_facturacionLogic->setparametro_facturacions($parametro_facturacions);
			
		$this->parametro_facturacionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$parametro_facturacionsLocal=$this->parametro_facturacionLogic->getparametro_facturacions();
			
		/*RESPALDO*/
		$this->parametro_facturacionLogic->setparametro_facturacions($parametro_facturacionsRespaldo);
			
		$this->parametro_facturacionLogic->setIsConDeep(false);
		
		if($parametro_facturacionsResp!=null);
		
		return $parametro_facturacionsLocal;
	}
	
	public function quitarRelacionesReporte() {
		try {			
			
			//PARA QUE NO GENERE ERROR EN SESSION
			$this->cargarRelaciones(array());
			
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			$this->quitarRelaciones();
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->rollbackNewConnexionToDeep();
				$this->parametro_facturacionLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(parametro_facturacion_session $parametro_facturacion_session) {
		$parametro_facturacion_session->strTypeOnLoad=$this->strTypeOnLoadparametro_facturacion;
		$parametro_facturacion_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarparametro_facturacion;
		$parametro_facturacion_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarparametro_facturacion;
		$parametro_facturacion_session->bitEsPopup=$this->bitEsPopup;
		$parametro_facturacion_session->bitEsBusqueda=$this->bitEsBusqueda;
		$parametro_facturacion_session->strFuncionJs=$this->strFuncionJs;
		/*$parametro_facturacion_session->strSufijo=$this->strSufijo;*/
		$parametro_facturacion_session->bitEsRelaciones=$this->bitEsRelaciones;
		$parametro_facturacion_session->bitEsRelacionado=$this->bitEsRelacionado;
	}
	
	public function setPermisosUsuarioConPermiso(string $strPermiso) {
		$this->setPermisosUsuarioConPermisoBase($strPermiso);
	}
	
	public function setPermisosMantenimientoUsuarioConPermiso(string $strPermiso) {
		$this->setPermisosMantenimientoUsuarioConPermisoBase($strPermiso);
	}
	
	public function setPermisosUsuario() {
		$perfilOpcionUsuario=null;
		$perfilOpcionUsuario=new perfil_opcion();		
					
		if(Constantes::$CON_LLAMADA_SIMPLE) {
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, parametro_facturacion_util::$STR_NOMBRE_CLASE,0,false,false);				
		} else {
			$perfilOpcionUsuario=$this->sistemaReturnGeneral->getPerfilOpcionUsuario();
		}
		
		if($perfilOpcionUsuario!=null && $perfilOpcionUsuario->getId()>0) {
			$this->strPermisoNuevo=(($perfilOpcionUsuario->getingreso() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 
			$this->strPermisoActualizar=(($perfilOpcionUsuario->getmodificacion() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 
			$this->strPermisoActualizarOriginal=$this->strPermisoActualizar;
			$this->strPermisoEliminar=(($perfilOpcionUsuario->geteliminacion() || $perfilOpcionUsuario->gettodo()) ? 'table-cell':'none'  );//con table-row en tabla se descuadra
			$this->strPermisoConsulta=(($perfilOpcionUsuario->getconsulta() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 			
			$this->strPermisoTodo=(($perfilOpcionUsuario->gettodo() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 
			$this->strPermisoReporte=(($perfilOpcionUsuario->getreporte() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 
			
			if($perfilOpcionUsuario->getingreso() || $perfilOpcionUsuario->getmodificacion() || $perfilOpcionUsuario->geteliminacion() || $perfilOpcionUsuario->gettodo()) {
				$this->strPermisoGuardar='table-row';
			} else {
				$this->strPermisoGuardar='none';
			}
			
			if(!$this->bitEsRelacionado) {
				$this->strPermisoBusqueda=(($perfilOpcionUsuario->getbusqueda() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 
			} else {
				$this->strPermisoBusqueda='none';
			}
			
		} else {
			$this->setPermisosUsuarioConPermiso('none');
		}
		
		/*SI SE NECESITA PONER TODOS LOS PERMISOS POR DEFECTO*/
		//$this->setPermisosUsuarioConPermiso('table-row');		
	}
	
	public function setAccionesUsuario() {
		//$accionUsuario=null;
		$accionesUsuario=array();		
					
		if(Constantes::$CON_LLAMADA_SIMPLE) {
			$accionesUsuario=$this->sistemaLogicAdditional->traerAccionesPaginaWebPerfilOpcion($this->usuarioActual, 0 ,false);				
		} else {
			$accionesUsuario=$this->sistemaReturnGeneral->getAccionesUsuario();
		}
		
		if($accionesUsuario!=null) {
			foreach($accionesUsuario as $accion)	{
				$this->tiposAcciones[]=$accion->getnombre();
			}
		}				
	}
	
	/*Todo,ActualizarOriginal,Consulta,Busqueda,Reporte*/
	public function inicializarPermisos() {
		$this->inicializarPermisosBase();
	}
	
	public function inicializarSetPermisosUsuarioClasesRelacionadas() {
		if(!Constantes::$CON_LLAMADA_SIMPLE) {
			
		} else {
			
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$parametro_facturacionViewAdditional=new parametro_facturacionView_add();
		$parametro_facturacionViewAdditional->parametro_facturacions=$this->parametro_facturacions;
		$parametro_facturacionViewAdditional->Session=$this->Session;
		
		return $parametro_facturacionViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$parametro_facturacionsLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$parametro_facturacionsLocal=$this->parametro_facturacions;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$parametro_facturacionsLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($parametro_facturacionsLocal)<=0) {
					$parametro_facturacionsLocal=$this->parametro_facturacions;
				}
			} else {
				$parametro_facturacionsLocal=$this->parametro_facturacions;
			}
		}
						
		
		$classes=array();
		$style_tabla='width:100%;margin: 0 0 0 0px;';//height: 100%;
		/*overflow:auto;*/
		$style_div='width:100%;height: 300px; overflow:auto; margin: 0 0 0 0px;';//background-color: #b0c4de;
		
		$class_cabecera='';
		$class_table=Constantes::$CSS_CLASS_TABLE;
		//$class_table=' class="'.Constantes::$CSS_CLASS_TABLE.'" ';
		
		
		if(!$paraReporte) {
			
			if(Constantes::$STR_TIPO_TABLA=='normal') {
				$class_cabecera='cabeceratabla';
				$class_table='';
			}
			
			if($this->bitConAltoMaximoTabla==true) {
				$style_div='width:100%;height: 100%; overflow:auto; margin: 0 0 0 0px;';//background-color: #b0c4de;			
			}
			
		} else {			
			$class_cabecera='cabeceratabla';
			$class_table='reporte';
			$style_tabla='';
			$style_div='width:100%;height: 100%; overflow:auto; margin: 0 0 0 0px;';//background-color: #b0c4de;	
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarparametro_facturacionsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarparametro_facturacionsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$parametro_facturacionLogic=new parametro_facturacion_logic();
		$parametro_facturacionLogic->setparametro_facturacions($this->parametro_facturacions);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('termino_pago_cliente');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$parametro_facturacionLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->parametro_facturacions=$parametro_facturacionLogic->getparametro_facturacions();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->parametro_facturacionsLocal=$this->parametro_facturacions;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=parametro_facturacion_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=parametro_facturacion_util::$STR_TABLE_NAME;		
			
		$this->classes=$classes;
		$this->style_tabla=$style_tabla;
		$this->style_div=$style_div;
		$this->class_cabecera=$class_cabecera;
		$this->class_table=$class_table;		
		$this->proceso_print=$proceso_print;
		
		//PARA TEMPLATE JS
		

		if($this->bitConEditar==false || $paraReporte) {
			/*|| $this->bitConEditar==true*/


		} else {
			
		
			//TEMPLATING
			$funciones = new FuncionesObject();
			
			$funciones->arrOrderBy = $this->arrOrderBy;
			$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
			
			$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
			$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
			$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
			$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
			
			$parametro_facturacions = $this->parametro_facturacions;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = parametro_facturacion_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = parametro_facturacion_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/facturacion/presentation/templating/parametro_facturacion_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->parametro_facturacions=$parametro_facturacions;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->parametro_facturacionsLocal=$parametro_facturacionsLocal;
			$template->classes=$classes;
			$template->style_tabla=$style_tabla;
			$template->style_div=$style_div;
			$template->class_cabecera=$class_cabecera;
			$template->class_table=$class_table;		
			$template->proceso_print=$proceso_print;
			
			$htmlTablaLocal=$template->render_html();
			
			//TEMPLATING
		
		
		
			
			if($this->strSufijo!='') {
				$htmlTablaLocal=str_replace('id="t-','id="t'.$this->strSufijo.'-',$htmlTablaLocal);
				$htmlTablaLocal=str_replace('name="t-','name="t'.$this->strSufijo.'-',$htmlTablaLocal);
				
				$htmlTablaLocal=str_replace('id="chb_t-cel','id="chb_t'.$this->strSufijo.'-cel',$htmlTablaLocal);
				$htmlTablaLocal=str_replace('name="chb_t-cel','name="chb_t'.$this->strSufijo.'-cel',$htmlTablaLocal);
			}
		}
		
		if(!$paraReporte) {
			$this->htmlTabla=$htmlTablaLocal;
		
		} else {
			
			/*
			$this->htmlTablaReporteAuxiliars=$htmlTablaLocal;
			*/
			
			/*
			$this->htmlTablaReporteAuxiliars.='<!DOCTYPE html>';
			$this->htmlTablaReporteAuxiliars.='<html>';
			$this->htmlTablaReporteAuxiliars.='<head>';
			$this->htmlTablaReporteAuxiliars.='<meta http-equiv="Content-Type" content="text/html;charset=utf-8">';
			$this->htmlTablaReporteAuxiliars.='</head>';
			$this->htmlTablaReporteAuxiliars.='<body>';
			*/
			
			$this->htmlTablaReporteAuxiliars.=$htmlTablaLocal;
			
			/*
			$this->htmlTablaReporteAuxiliars.='</body>';
			$this->htmlTablaReporteAuxiliars.='</html>';
			*/
		}

		return $htmlTablaLocal;
	}	
	
	public function setHtmlTablaDatosParaBusqueda() : string {
		return $this->getHtmlTablaDatosParaBusqueda(false);
	}
	
	public function getHtmlTablaDatosParaBusqueda(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		$parametro_facturacionsLocal=array();
		
		$parametro_facturacionsLocal=$this->parametro_facturacions;
				
		$classes=array();		
		
		$style_tabla=' style=" width:100%;height: 100%; margin: 0 0 0 0px;" ';
		/*overflow:auto;*/
		$style_div=' style=" width:100%;height: 300px; overflow:auto; margin: 0 0 0 0px;" ';
		
		$class_cabecera='';
		$class_table=' class="'.Constantes::$CSS_CLASS_TABLE.'" ';
		

		if(!$paraReporte) {
			
			if(Constantes::$STR_TIPO_TABLA=='normal') {
				$class_cabecera=' class="cabeceratabla" ';
				$class_table='';
			}
			
			if($this->bitConAltoMaximoTabla==true) {
				$style_div=' style=" width:100%;height: 100%; overflow:auto; margin: 0 0 0 0px;" ';			
			}
		} else {			
			$class_cabecera=' class="cabeceratabla" ';
			$class_table='';
			$style_div=' style=" width:100%;height: 100%; overflow:auto; margin: 0 0 0 0px;" ';	
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarparametro_facturacionsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarparametro_facturacionsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$parametro_facturacionLogic=new parametro_facturacion_logic();
		$parametro_facturacionLogic->setparametro_facturacions($this->parametro_facturacions);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('termino_pago_cliente');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$parametro_facturacionLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->parametro_facturacions=$parametro_facturacionLogic->getparametro_facturacions();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$parametro_facturacions = $this->parametro_facturacions;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = parametro_facturacion_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = parametro_facturacion_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/facturacion/presentation/templating/parametro_facturacion_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->parametro_facturacions=$parametro_facturacions;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->parametro_facturacionsLocal=$parametro_facturacionsLocal;
		$template->classes=$classes;
		$template->style_tabla=$style_tabla;
		$template->style_div=$style_div;
		$template->class_cabecera=$class_cabecera;
		$template->class_table=$class_table;		
		$template->proceso_print=$proceso_print;
		
		$htmlTablaLocal=$template->render_html();
		
		//TEMPLATING
		
		
		
		
		
		$this->htmlTabla=$htmlTablaLocal;
			
		return $htmlTablaLocal;
	}	
	
	public function getHtmlTablaDatosResumen(array $parametro_facturacions=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->parametro_facturacionsReporte = $parametro_facturacions;		
		$bitParaReporteOrderBy = $paraReporte; //$this->bitParaReporteOrderBy;
		
		$strAuxStyleBackgroundTablaPrincipal='';
		$strAuxStyleBackgroundTitulo='';
		$strAuxStyleBackgroundContenido='';
			$strAuxStyleBackgroundContenidoCabecera='';
			$strAuxStyleBackgroundContenidoDetalle='';		
		$strAuxStyleBackgroundIzquierda='';
		$strAuxStyleBackgroundDerecha='';
		
		
		
		if(!$paraReporte) {
			$strAuxStyleBackgroundTablaPrincipal=' class="tablaficha" ';
			$strAuxStyleBackgroundContenido=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-contenido-resumen.jpg);background-repeat:repeat;"';
				$strAuxStyleBackgroundContenidoCabecera='';
				$strAuxStyleBackgroundContenidoDetalle='';				
			$strAuxStyleBackgroundTitulo=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-titulo-resumen.gif);background-repeat:repeat;"';
			$strAuxStyleBackgroundIzquierda=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-izquierda-resumen.gif);background-repeat:repeat;"';
			$strAuxStyleBackgroundDerecha=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-derecha-resumen.gif);background-repeat:repeat;"';
			
			
		} else {
			$strAuxStyleBackgroundTablaPrincipal='';
			$strAuxStyleBackgroundTitulo=' class="cabeceraformulario" ';
			$strAuxStyleBackgroundContenido='';			
				$strAuxStyleBackgroundContenidoCabecera=' class="filazebra" ';
				$strAuxStyleBackgroundContenidoDetalle='';				
			$strAuxStyleBackgroundIzquierda='';
			$strAuxStyleBackgroundDerecha='';						
		}
		
		$strAuxColumnRowSpan='
			<td rowspan="#rowspan" '.$strAuxStyleBackgroundIzquierda.'>
				<pre> 
				</pre>
			</td>';
						
		$strTamanioTablaPrincipal="500px";
		
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarparametro_facturacionsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarparametro_facturacionsAjaxWebPart\').style.overflow=\'auto\';';
		}
	
		//TEMPLATING CONTROLLER BASE
		
		$this->paraReporte=$paraReporte;
		$this->proceso_print=$proceso_print;
		$this->strAuxStyleBackgroundTablaPrincipal=$strAuxStyleBackgroundTablaPrincipal;
		$this->borderValue=$borderValue;
		$this->strTamanioTablaPrincipal=$strTamanioTablaPrincipal;
		$this->strAuxStyleBackgroundTitulo=$strAuxStyleBackgroundTitulo;
		
		$this->strAuxStyleBackgroundContenido=$strAuxStyleBackgroundContenido;
		$this->strAuxStyleBackgroundContenidoCabecera=$strAuxStyleBackgroundContenidoCabecera;
		$this->bitParaReporteOrderBy=$bitParaReporteOrderBy;
		
		
		if($rowSpanValue!=null);
		if($blnTieneCampo!=null);
		
		return $htmlTablaLocal;
	}	
	
	public function getHtmlTablaDatosRelaciones(array $parametro_facturacions=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->parametro_facturacionsReporte = $parametro_facturacions;		
		$bitParaReporteOrderBy = $paraReporte; //$this->bitParaReporteOrderBy;
		
		$strAuxStyleBackgroundTablaPrincipal='';
		$strAuxStyleBackgroundTitulo='';
		$strAuxStyleBackgroundContenido='';
			$strAuxStyleBackgroundContenidoCabecera='';
			$strAuxStyleBackgroundContenidoDetalle='';		
		$strAuxStyleBackgroundIzquierda='';
		$strAuxStyleBackgroundDerecha='';
		
		
		
		if(!$paraReporte) {
			$strAuxStyleBackgroundTablaPrincipal=' class="tablaficha" ';
			$strAuxStyleBackgroundContenido=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-contenido-resumen.jpg);background-repeat:repeat;"';
				$strAuxStyleBackgroundContenidoCabecera='';
				$strAuxStyleBackgroundContenidoDetalle='';				
			$strAuxStyleBackgroundTitulo=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-titulo-resumen.gif);background-repeat:repeat;"';
			$strAuxStyleBackgroundIzquierda=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-izquierda-resumen.gif);background-repeat:repeat;"';
			$strAuxStyleBackgroundDerecha=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-derecha-resumen.gif);background-repeat:repeat;"';
			
			
		} else {
			$strAuxStyleBackgroundTablaPrincipal='';
			$strAuxStyleBackgroundTitulo=' class="cabeceraformulario" ';
			$strAuxStyleBackgroundContenido='';			
				$strAuxStyleBackgroundContenidoCabecera=' class="filazebra" ';
				$strAuxStyleBackgroundContenidoDetalle='';				
			$strAuxStyleBackgroundIzquierda='';
			$strAuxStyleBackgroundDerecha='';	
		}
		
		$strAuxColumnRowSpan='
			<td rowspan="#rowspan" '.$strAuxStyleBackgroundIzquierda.'>
				<pre> 
				</pre>
			</td>';
						
		$strTamanioTablaPrincipal="500px";
		
		
		$this->parametro_facturacionsReporte=$this->cargarRelaciones($parametro_facturacions);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarparametro_facturacionsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarparametro_facturacionsAjaxWebPart\').style.overflow=\'auto\';';			
		}
		
	
		//TEMPLATING CONTROLLER BASE
		
		$this->paraReporte=$paraReporte;
		$this->proceso_print=$proceso_print;
		$this->strAuxStyleBackgroundTablaPrincipal=$strAuxStyleBackgroundTablaPrincipal;
		$this->borderValue=$borderValue;
		$this->strTamanioTablaPrincipal=$strTamanioTablaPrincipal;
		$this->strAuxStyleBackgroundTitulo=$strAuxStyleBackgroundTitulo;
		
		$this->strAuxStyleBackgroundContenido=$strAuxStyleBackgroundContenido;
		$this->strAuxStyleBackgroundContenidoCabecera=$strAuxStyleBackgroundContenidoCabecera;
		$this->bitParaReporteOrderBy=$bitParaReporteOrderBy;
		
		if($rowSpanValue!=null);
		if($blnTieneCampo!=null);
		
		return $htmlTablaLocal;
	}
	
	public function getHtmlTablaAccionesRelaciones(parametro_facturacion $parametro_facturacion=null) : string {	
		$htmlTablaLocal='';
		$PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		
	
		if($PATH_IMAGEN!=null);
		
		return $htmlTablaLocal;
	}
	
	public function generarHtmlReporte() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*
			if($this->bitConEditar) {
				$this->bitConAltoMaximoTabla=true;
			}
			*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			/*$checkbox_parareporte=null;*/
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
			
			
			
			$this->getHtmlTablaDatos(true);
			
									
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS, SE REPITE
			//$this->returnHtml(true);			
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function generarHtmlFormReporte() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			$parametro_facturacionsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$parametro_facturacionsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($parametro_facturacionsLocal)<=0) {
					/*//DEBE ESCOGER
					$parametro_facturacionsLocal=$this->parametro_facturacions;*/
				}
			} else {
				/*//DEBE ESCOGER
				$parametro_facturacionsLocal=$this->parametro_facturacions;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($parametro_facturacionsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($parametro_facturacionsLocal,true);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function generarHtmlRelacionesReporte() {
		
		try {			
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->getNewConnexionToDeep();
			}
					
			$parametro_facturacionsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$parametro_facturacionsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($parametro_facturacionsLocal)<=0) {
					/*//DEBE ESCOGER
					$parametro_facturacionsLocal=$this->parametro_facturacions;*/
				}
			} else {
				/*//DEBE ESCOGER
				$parametro_facturacionsLocal=$this->parametro_facturacions;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($parametro_facturacionsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($parametro_facturacionsLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->commitNewConnexionToDeep();
				$this->parametro_facturacionLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->rollbackNewConnexionToDeep();
				$this->parametro_facturacionLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function generarReporteAuxiliar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function generarFpdf() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			$this->layout = 'fpdf';
			
			$titulo=Constantes::getstrAreaDepartamento();
			$subtitulo='Reporte de  Parametro Facturacions';
			
			$header=array();
			$data=array();
			//$row=array();
			//$cellReport=new CellReport();
					
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderByFromData();
			
			/*PARA COLUMNAS DINAMICAS*/
			
			
			$header=$this->getHeadersReport('NORMAL');
			
			$data=$this->getDataReport(false,'NORMAL');						
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			$fpdf_helper=new FpdfHelper();
			
			$font='Arial';
			$sizefont=12;
			$fileName='parametro_facturacion';
			
			header("Content-type: application/pdf"); 
			header('Content-Disposition: attachment;filename="'.$fileName.'.pdf"'); 
			header('Cache-Control: max-age=0'); 
		
			$fpdf_helper->SetFont($font,'',$sizefont);
			$fpdf_helper->title=$titulo; 
			$fpdf_helper->subtitle=$subtitulo;
			$fpdf_helper->AddPage();
			$fpdf_helper->basicTable($header,$data);
			
						
			echo $fpdf_helper->fpdfOutput();  
			
		} catch(Exception $e) {
			
			throw $e;
		}
	}
	
	public function generarReporteConPhpExcel(string $strTipoReporte='PDF') {
		try {
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
			
						
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
		
		
			/*NO UTILIZA LAYOUT*/
			$this->layout ='';
									
			$header=array();
			$data=array();
						
			$header=$this->getHeadersReport('NORMAL');
			
			$data=$this->getDataReport(false,'NORMAL');
					
			
			$excel_helper=new ExcelHelper();
			
			$title='Reporte de  Parametro Facturacions';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
		} catch(Exception $e) {
			throw $e;
		}
    } 
	
	public function generarReporteConPhpExcelVertical(string $strTipoReporte='PDF') {
		try {
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderByFromData();
			
			/*PARA COLUMNAS DINAMICAS*/
			
			/*NO UTILIZA LAYOUT*/
			$this->layout ='';
	
			$header=array();
			$data=array();
						
			/*$header=$this->getHeadersReportVertical();*/
			
			$data=$this->getDataReportVertical();
					
			
			$excel_helper=new ExcelHelper();
			
			$title='Reporte de  Parametro Facturacions';
			$tipo=$strTipoReporte;
			
			$excel_helper->generateVertical($header,$data, $title,$tipo,'webroot');
			
		} catch(Exception $e) {
			throw $e;
		}
    } 
	
	public function generarReporteConPhpExcelRelaciones(string $strTipoReporte='PDF') {
		try {
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->getNewConnexionToDeep();
			}
					
			/*$this->inicializarVariables('NORMAL');
			
			//PARA COLUMNAS DINAMICAS*/
			
			$orderByQueryRelAux=Funciones::getCargarOrderByQueryRel($this->arrOrderByRel,$this->data,'REPORTE');
			$orderByQueryRelAux=trim($orderByQueryRelAux);
			
			$this->bitParaReporteOrderByRel=false;
			$checkbox_parareporte_rel=null;
				
			$this->getDataParaReporteOrderByRelFromData();
			
			/*PARA COLUMNAS DINAMICAS*/
		
		
			/*NO UTILIZA LAYOUT*/
			$this->layout ='';
									
			$header=array();
			$data=array();
						
			$header=$this->getHeadersReport('NORMAL');
			
			$data=$this->getDataReport(true,'NORMAL');
					
			
			$excel_helper=new ExcelHelper();
			
			$title='Reporte de  Parametro Facturacions';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->commitNewConnexionToDeep();
				$this->parametro_facturacionLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_facturacionLogic->rollbackNewConnexionToDeep();
				$this->parametro_facturacionLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=parametro_facturacion_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
		return $header;
	}
	
	public function ValCol(string $sColName,bool $paraReporte) {
		$valido=true;
		
		if($paraReporte) {
			$valido=Funciones::existeCadenaArrayOrderBy($sColName,$this->arrOrderBy,$this->bitParaReporteOrderBy);
		}
		
		return $valido;
	}
	
	
	
	public function getDataReport(bool $paraRelaciones=false,string $tipo='NORMAL') : array {	
		$data=array();
		$row=array();
		$cellReport=new CellReport();
		$this->parametro_facturacionsAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_facturacionsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->parametro_facturacionsAuxiliar)<=0) {
					$this->parametro_facturacionsAuxiliar=$this->parametro_facturacions;
				}
			} else {
				$this->parametro_facturacionsAuxiliar=$this->parametro_facturacions;
			}
		/*} else {
			$this->parametro_facturacionsAuxiliar=$this->parametro_facturacionsReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->parametro_facturacionsAuxiliar as $parametro_facturacion) {
				$row=array();
				
				$row=parametro_facturacion_util::getDataReportRow($tipo,$parametro_facturacion,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			parametro_facturacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$parametro_facturacionsResp=array();
			$classes=array();
			
			
			
			
			$parametro_facturacionsResp=$this->parametro_facturacionLogic->getparametro_facturacions();
			
			$this->parametro_facturacionLogic->setIsConDeep(true);
			
			$this->parametro_facturacionLogic->setparametro_facturacions($this->parametro_facturacionsAuxiliar);
			
			$this->parametro_facturacionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->parametro_facturacionsAuxiliar=$this->parametro_facturacionLogic->getparametro_facturacions();
			
			//RESPALDO
			$this->parametro_facturacionLogic->setparametro_facturacions($parametro_facturacionsResp);
			
			$this->parametro_facturacionLogic->setIsConDeep(false);
			*/
			
			$this->parametro_facturacionsAuxiliar=$this->cargarRelaciones($this->parametro_facturacionsAuxiliar);
			
			$i=0;
			
			foreach ($this->parametro_facturacionsAuxiliar as $parametro_facturacion) {
				$row=array();
				
				if($i!=0) {
					$row=parametro_facturacion_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=parametro_facturacion_util::getDataReportRow($tipo,$parametro_facturacion,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				
				
				$i++;
			}
		}
		
		if($cellReport!=null);
		
		return $data;
	}
	
	public function getDataReportVertical() : array {	
		$data=array();
		$row=array();
		$cellReport=new CellReport();
		$this->parametro_facturacionsAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_facturacionsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->parametro_facturacionsAuxiliar)<=0) {
					$this->parametro_facturacionsAuxiliar=$this->parametro_facturacions;
				}
			} else {
				$this->parametro_facturacionsAuxiliar=$this->parametro_facturacions;
			}
		/*} else {
			$this->parametro_facturacionsAuxiliar=$this->parametro_facturacionsReporte;	
		}*/
		
		foreach ($this->parametro_facturacionsAuxiliar as $parametro_facturacion) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(parametro_facturacion_util::getparametro_facturacionDescripcion($parametro_facturacion),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre Factura',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Factura',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getnombre_factura(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero Factura',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Factura',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getnumero_factura(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Incremento Factura',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento Factura',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getincremento_factura(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Solo Costo Producto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Solo Costo Producto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getsolo_costo_producto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero Factura Lote',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Factura Lote',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getnumero_factura_lote(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Incremento Factura Lote',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento Factura Lote',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getincremento_factura_lote(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero Devolucion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Devolucion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getnumero_devolucion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Incremento Devolucion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento Devolucion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getincremento_devolucion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Termino Pago',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Termino Pago',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getid_termino_pago_clienteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre Estimado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Estimado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getnombre_estimado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero Estimado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Estimado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getnumero_estimado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Incremento Estimado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento Estimado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getincremento_estimado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Solo Costo Producto Estimado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Solo Costo Producto Estimado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getsolo_costo_producto_estimado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre Consignacion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Consignacion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getnombre_consignacion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero Consignacion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Consignacion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getnumero_consignacion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Incremento Consignacion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento Consignacion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getincremento_consignacion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Solo Costo Producto Consignacion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Solo Costo Producto Consignacion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getsolo_costo_producto_consignacion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Recibo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Recibo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getcon_recibo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre Recibo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Recibo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getnombre_recibo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero Recibo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Recibo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getnumero_recibo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Incremento Recibos',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento Recibos',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getincremento_recibo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Impuesto Recibo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Impuesto Recibo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getcon_impuesto_recibo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface parametro_facturacion_base_controlI {			
		
		public function inicializarVariables(string $strType);		
		public function inicializar();
		
		public function cargarParametros();		
		public function cargarDatosLogicClaseBean(bool $esParaLogic=true);		
		public function inicializarMensajesDatosInvalidos();		
		public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo);		
		public function inicializarMensajesDefectoDatosInvalidos();
		
		public function nuevo();		
		public function actualizar();		
		public function eliminar(?int $idActual=0);		
		public function getIndiceNuevo() : int;		
		public function getIndiceActual(parametro_facturacion $parametro_facturacion,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(parametro_facturacion $parametro_facturacion,array $parametro_facturacions);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : parametro_facturacion_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $parametro_facturacions,parametro_facturacion $parametro_facturacion);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(parametro_facturacion_param_return $parametro_facturacionReturnGeneral);		
		public function actualizarEstadoCeldasBotones(string $strAccion,bool $bitGuardarCambiosEnLote=false,bool $bitEsMantenimientoRelacionado=false);		
		public function manejarRetornarExcepcion(Exception $e);		
		public function cancelarControles();		
		public function inicializarAuxiliares();		
		public function inicializarMensajesTipo(string $tipo,$e=null);		
		public function prepararEjecutarMantenimiento();		
		public function setTipoAction(string $action='INDEX');		
		public function cargarDatosCliente();		
		public function cargarParametrosPagina();		
		public function cargarParametrosEventosTabla();		
		public function cargarParametrosReporte();		
		public function cargarParamsPostAccion();		
		public function cargarParamsPaginar();
		
		public function returnHtml(bool $bitConRetrurnAjax);		
		public function returnAjax();
		
		public function actualizarDesdeSessionDivStyleVariables(parametro_facturacion_session $parametro_facturacion_session);		
		public function actualizarInvitadoSessionDivStyleVariables(parametro_facturacion_session $parametro_facturacion_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(parametro_facturacion $parametro_facturacionOrigen,parametro_facturacion $parametro_facturacion,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(parametro_facturacion_control $parametro_facturacion_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $parametro_facturacions=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(parametro_facturacion_session $parametro_facturacion_session);		
		public function setPermisosUsuarioConPermiso(string $strPermiso);		
		public function setPermisosMantenimientoUsuarioConPermiso(string $strPermiso);
		
		public function setPermisosUsuario();		
		public function setAccionesUsuario();		
		
		//Todo,ActualizarOriginal,Consulta,Busqueda,Reporte
		public function inicializarPermisos();		
		public function inicializarSetPermisosUsuarioClasesRelacionadas();
		
		
		//VIEW_LAYER
		public function setHtmlTablaDatos() : string;		
		public function getHtmlTablaDatos(bool $paraReporte=false) : string;		
		public function setHtmlTablaDatosParaBusqueda() : string;		
		public function getHtmlTablaDatosParaBusqueda(bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosResumen(array $parametro_facturacions=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $parametro_facturacions=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(parametro_facturacion $parametro_facturacion=null) : string;
		
		public function generarHtmlReporte();		
		public function generarHtmlFormReporte();		
		public function generarHtmlRelacionesReporte();
		
		public function generarReporteAuxiliar();		
		public function generarFpdf();		
		public function generarReporteConPhpExcel(string $strTipoReporte='PDF');		
		public function generarReporteConPhpExcelVertical(string $strTipoReporte='PDF');		
		public function generarReporteConPhpExcelRelaciones(string $strTipoReporte='PDF');		
		public function getHeadersReport(string $tipo='NORMAL');
		
		public function ValCol(string $sColName,bool $paraReporte);				
		public function getDataReport(bool $paraRelaciones=false,string $tipo='NORMAL') : array;		
		public function getDataReportVertical() : array;
	}

	*/
}

?>
