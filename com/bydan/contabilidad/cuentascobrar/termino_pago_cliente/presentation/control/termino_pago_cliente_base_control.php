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
	


class termino_pago_cliente_base_control extends termino_pago_cliente_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->termino_pago_clienteClase==null) {		
				$this->termino_pago_clienteClase=new termino_pago_cliente();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_termino_pago')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_tipo_termino_pago',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->termino_pago_clienteClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->termino_pago_clienteClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->termino_pago_clienteClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->termino_pago_clienteClase->setid_tipo_termino_pago((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_termino_pago'));
				
				$this->termino_pago_clienteClase->setcodigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo'));
				
				$this->termino_pago_clienteClase->setdescripcion($this->getDataCampoFormTabla('form'.$this->strSufijo,'descripcion'));
				
				$this->termino_pago_clienteClase->setmonto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'monto'));
				
				$this->termino_pago_clienteClase->setdias((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'dias'));
				
				$this->termino_pago_clienteClase->setinicial((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'inicial'));
				
				$this->termino_pago_clienteClase->setcuotas((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'cuotas'));
				
				$this->termino_pago_clienteClase->setdescuento_pronto_pago((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'descuento_pronto_pago'));
				
				$this->termino_pago_clienteClase->setpredeterminado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'predeterminado')));
				
				$this->termino_pago_clienteClase->setid_cuenta((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta'));
				
				$this->termino_pago_clienteClase->setcuenta_contable($this->getDataCampoFormTabla('form'.$this->strSufijo,'cuenta_contable'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->termino_pago_clienteModel->set($this->termino_pago_clienteClase);
				
				/*$this->termino_pago_clienteModel->set($this->migrarModeltermino_pago_cliente($this->termino_pago_clienteClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setId($this->termino_pago_clienteClase->getId());	
			$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setVersionRow($this->termino_pago_clienteClase->getVersionRow());	
			$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setVersionRow($this->termino_pago_clienteClase->getVersionRow());	
			$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setid_empresa($this->termino_pago_clienteClase->getid_empresa());	
			$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setid_tipo_termino_pago($this->termino_pago_clienteClase->getid_tipo_termino_pago());	
			$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setcodigo($this->termino_pago_clienteClase->getcodigo());	
			$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setdescripcion($this->termino_pago_clienteClase->getdescripcion());	
			$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setmonto($this->termino_pago_clienteClase->getmonto());	
			$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setdias($this->termino_pago_clienteClase->getdias());	
			$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setinicial($this->termino_pago_clienteClase->getinicial());	
			$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setcuotas($this->termino_pago_clienteClase->getcuotas());	
			$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setdescuento_pronto_pago($this->termino_pago_clienteClase->getdescuento_pronto_pago());	
			$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setpredeterminado($this->termino_pago_clienteClase->getpredeterminado());	
			$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setid_cuenta($this->termino_pago_clienteClase->getid_cuenta());	
			$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setcuenta_contable($this->termino_pago_clienteClase->getcuenta_contable());	
		} else {
			$this->termino_pago_clienteClase->setId($this->termino_pago_clienteLogic->gettermino_pago_cliente()->getId());	
			$this->termino_pago_clienteClase->setVersionRow($this->termino_pago_clienteLogic->gettermino_pago_cliente()->getVersionRow());	
			$this->termino_pago_clienteClase->setVersionRow($this->termino_pago_clienteLogic->gettermino_pago_cliente()->getVersionRow());	
			$this->termino_pago_clienteClase->setid_empresa($this->termino_pago_clienteLogic->gettermino_pago_cliente()->getid_empresa());	
			$this->termino_pago_clienteClase->setid_tipo_termino_pago($this->termino_pago_clienteLogic->gettermino_pago_cliente()->getid_tipo_termino_pago());	
			$this->termino_pago_clienteClase->setcodigo($this->termino_pago_clienteLogic->gettermino_pago_cliente()->getcodigo());	
			$this->termino_pago_clienteClase->setdescripcion($this->termino_pago_clienteLogic->gettermino_pago_cliente()->getdescripcion());	
			$this->termino_pago_clienteClase->setmonto($this->termino_pago_clienteLogic->gettermino_pago_cliente()->getmonto());	
			$this->termino_pago_clienteClase->setdias($this->termino_pago_clienteLogic->gettermino_pago_cliente()->getdias());	
			$this->termino_pago_clienteClase->setinicial($this->termino_pago_clienteLogic->gettermino_pago_cliente()->getinicial());	
			$this->termino_pago_clienteClase->setcuotas($this->termino_pago_clienteLogic->gettermino_pago_cliente()->getcuotas());	
			$this->termino_pago_clienteClase->setdescuento_pronto_pago($this->termino_pago_clienteLogic->gettermino_pago_cliente()->getdescuento_pronto_pago());	
			$this->termino_pago_clienteClase->setpredeterminado($this->termino_pago_clienteLogic->gettermino_pago_cliente()->getpredeterminado());	
			$this->termino_pago_clienteClase->setid_cuenta($this->termino_pago_clienteLogic->gettermino_pago_cliente()->getid_cuenta());	
			$this->termino_pago_clienteClase->setcuenta_contable($this->termino_pago_clienteLogic->gettermino_pago_cliente()->getcuenta_contable());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->termino_pago_clienteModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='id_tipo_termino_pago') {$this->strMensajeid_tipo_termino_pago=$strMensajeCampo;}
		if($strNombreCampo=='codigo') {$this->strMensajecodigo=$strMensajeCampo;}
		if($strNombreCampo=='descripcion') {$this->strMensajedescripcion=$strMensajeCampo;}
		if($strNombreCampo=='monto') {$this->strMensajemonto=$strMensajeCampo;}
		if($strNombreCampo=='dias') {$this->strMensajedias=$strMensajeCampo;}
		if($strNombreCampo=='inicial') {$this->strMensajeinicial=$strMensajeCampo;}
		if($strNombreCampo=='cuotas') {$this->strMensajecuotas=$strMensajeCampo;}
		if($strNombreCampo=='descuento_pronto_pago') {$this->strMensajedescuento_pronto_pago=$strMensajeCampo;}
		if($strNombreCampo=='predeterminado') {$this->strMensajepredeterminado=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta') {$this->strMensajeid_cuenta=$strMensajeCampo;}
		if($strNombreCampo=='cuenta_contable') {$this->strMensajecuenta_contable=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeid_tipo_termino_pago='';
		$this->strMensajecodigo='';
		$this->strMensajedescripcion='';
		$this->strMensajemonto='';
		$this->strMensajedias='';
		$this->strMensajeinicial='';
		$this->strMensajecuotas='';
		$this->strMensajedescuento_pronto_pago='';
		$this->strMensajepredeterminado='';
		$this->strMensajeid_cuenta='';
		$this->strMensajecuenta_contable='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->commitNewConnexionToDeep();
				$this->termino_pago_clienteLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_clienteLogic->closeNewConnexionToDeep();
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
				$this->termino_pago_clienteLogic->getNewConnexionToDeep();
			}

			$termino_pago_cliente_session=unserialize($this->Session->read(termino_pago_cliente_util::$STR_SESSION_NAME));
						
			if($termino_pago_cliente_session==null) {
				$termino_pago_cliente_session=new termino_pago_cliente_session();
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
						$this->termino_pago_clienteLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->termino_pago_clienteActual =$this->termino_pago_clienteClase;
			
			/*$this->termino_pago_clienteActual =$this->migrarModeltermino_pago_cliente($this->termino_pago_clienteClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->commitNewConnexionToDeep();
				$this->termino_pago_clienteLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->termino_pago_clienteLogic->gettermino_pago_clientes(),$this->termino_pago_clienteActual);
			
			$this->actualizarControllerConReturnGeneral($this->termino_pago_clienteReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->getNewConnexionToDeep();
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
				$this->termino_pago_clienteLogic->commitNewConnexionToDeep();
				$this->termino_pago_clienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$termino_pago_clientesLocal=$this->getListaActual();
		
		$iIndice=termino_pago_cliente_util::getIndiceNuevo($termino_pago_clientesLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(termino_pago_cliente $termino_pago_cliente,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$termino_pago_clientesLocal=$this->getListaActual();
		
		$iIndice=termino_pago_cliente_util::getIndiceActual($termino_pago_clientesLocal,$termino_pago_cliente,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevotermino_pago_cliente')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->termino_pago_clienteActual =$this->termino_pago_clienteClase;
			
			/*$this->termino_pago_clienteActual =$this->migrarModeltermino_pago_cliente($this->termino_pago_clienteClase);*/
			
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
			
			$this->termino_pago_clienteLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_termino_pago');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
			
			$this->termino_pago_clienteLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->termino_pago_clienteLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->termino_pago_clienteLogic->settermino_pago_cliente(new termino_pago_cliente());
				
				$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setIsNew(true);
				$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setIsChanged(true);
				$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->termino_pago_clienteModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->termino_pago_clienteLogic->termino_pago_clientes[]=$this->termino_pago_clienteLogic->gettermino_pago_cliente();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->termino_pago_clienteLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							parametro_facturacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$parametrofacturacions=unserialize($this->Session->read(parametro_facturacion_util::$STR_SESSION_NAME.'Lista'));
							$parametrofacturacionsEliminados=unserialize($this->Session->read(parametro_facturacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$parametrofacturacions=array_merge($parametrofacturacions,$parametrofacturacionsEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							debito_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$debitocuentacobrars=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$debitocuentacobrarsEliminados=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$debitocuentacobrars=array_merge($debitocuentacobrars,$debitocuentacobrarsEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucionfacturas=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'Lista'));
							$devolucionfacturasEliminados=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucionfacturas=array_merge($devolucionfacturas,$devolucionfacturasEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_lote_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturalotes=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'Lista'));
							$facturalotesEliminados=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturalotes=array_merge($facturalotes,$facturalotesEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							estimado_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$estimados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'Lista'));
							$estimadosEliminados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'ListaEliminados'));
							$estimados=array_merge($estimados,$estimadosEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentacobrars=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$cuentacobrarsEliminados=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentacobrars=array_merge($cuentacobrars,$cuentacobrarsEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$clientes=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'Lista'));
							$clientesEliminados=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$clientes=array_merge($clientes,$clientesEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturas=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'Lista'));
							$facturasEliminados=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturas=array_merge($facturas,$facturasEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							consignacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$consignacions=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'Lista'));
							$consignacionsEliminados=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$consignacions=array_merge($consignacions,$consignacionsEliminados);
							
							$this->termino_pago_clienteLogic->saveRelaciones($this->termino_pago_clienteLogic->gettermino_pago_cliente(),$parametrofacturacions,$debitocuentacobrars,$devolucionfacturas,$facturalotes,$estimados,$cuentacobrars,$clientes,$facturas,$consignacions);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setIsChanged(true);
				$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setIsNew(false);
				$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->termino_pago_clienteModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->termino_pago_clienteLogic->gettermino_pago_cliente(),$this->termino_pago_clienteLogic->gettermino_pago_clientes());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->termino_pago_clienteLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							parametro_facturacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$parametrofacturacions=unserialize($this->Session->read(parametro_facturacion_util::$STR_SESSION_NAME.'Lista'));
							$parametrofacturacionsEliminados=unserialize($this->Session->read(parametro_facturacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$parametrofacturacions=array_merge($parametrofacturacions,$parametrofacturacionsEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							debito_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$debitocuentacobrars=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$debitocuentacobrarsEliminados=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$debitocuentacobrars=array_merge($debitocuentacobrars,$debitocuentacobrarsEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucionfacturas=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'Lista'));
							$devolucionfacturasEliminados=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucionfacturas=array_merge($devolucionfacturas,$devolucionfacturasEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_lote_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturalotes=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'Lista'));
							$facturalotesEliminados=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturalotes=array_merge($facturalotes,$facturalotesEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							estimado_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$estimados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'Lista'));
							$estimadosEliminados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'ListaEliminados'));
							$estimados=array_merge($estimados,$estimadosEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentacobrars=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$cuentacobrarsEliminados=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentacobrars=array_merge($cuentacobrars,$cuentacobrarsEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$clientes=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'Lista'));
							$clientesEliminados=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$clientes=array_merge($clientes,$clientesEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturas=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'Lista'));
							$facturasEliminados=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturas=array_merge($facturas,$facturasEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							consignacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$consignacions=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'Lista'));
							$consignacionsEliminados=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$consignacions=array_merge($consignacions,$consignacionsEliminados);
							
							$this->termino_pago_clienteLogic->saveRelaciones($this->termino_pago_clienteLogic->gettermino_pago_cliente(),$parametrofacturacions,$debitocuentacobrars,$devolucionfacturas,$facturalotes,$estimados,$cuentacobrars,$clientes,$facturas,$consignacions);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setIsDeleted(true);
				$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setIsNew(false);
				$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setIsChanged(false);				
				
				$this->actualizarLista($this->termino_pago_clienteLogic->gettermino_pago_cliente(),$this->termino_pago_clienteLogic->gettermino_pago_clientes());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->termino_pago_clienteLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							parametro_facturacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$parametrofacturacions=unserialize($this->Session->read(parametro_facturacion_util::$STR_SESSION_NAME.'Lista'));
							$parametrofacturacionsEliminados=unserialize($this->Session->read(parametro_facturacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$parametrofacturacions=array_merge($parametrofacturacions,$parametrofacturacionsEliminados);

							foreach($parametrofacturacions as $parametrofacturacion1) {
								$parametrofacturacion1->setIsDeleted(true);
							}
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							debito_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$debitocuentacobrars=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$debitocuentacobrarsEliminados=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$debitocuentacobrars=array_merge($debitocuentacobrars,$debitocuentacobrarsEliminados);

							foreach($debitocuentacobrars as $debitocuentacobrar1) {
								$debitocuentacobrar1->setIsDeleted(true);
							}
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucionfacturas=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'Lista'));
							$devolucionfacturasEliminados=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucionfacturas=array_merge($devolucionfacturas,$devolucionfacturasEliminados);

							foreach($devolucionfacturas as $devolucionfactura1) {
								$devolucionfactura1->setIsDeleted(true);
							}
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_lote_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturalotes=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'Lista'));
							$facturalotesEliminados=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturalotes=array_merge($facturalotes,$facturalotesEliminados);

							foreach($facturalotes as $facturalote1) {
								$facturalote1->setIsDeleted(true);
							}
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							estimado_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$estimados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'Lista'));
							$estimadosEliminados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'ListaEliminados'));
							$estimados=array_merge($estimados,$estimadosEliminados);

							foreach($estimados as $estimado1) {
								$estimado1->setIsDeleted(true);
							}
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentacobrars=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$cuentacobrarsEliminados=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentacobrars=array_merge($cuentacobrars,$cuentacobrarsEliminados);

							foreach($cuentacobrars as $cuentacobrar1) {
								$cuentacobrar1->setIsDeleted(true);
							}
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$clientes=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'Lista'));
							$clientesEliminados=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$clientes=array_merge($clientes,$clientesEliminados);

							foreach($clientes as $cliente1) {
								$cliente1->setIsDeleted(true);
							}
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturas=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'Lista'));
							$facturasEliminados=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturas=array_merge($facturas,$facturasEliminados);

							foreach($facturas as $factura1) {
								$factura1->setIsDeleted(true);
							}
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							consignacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$consignacions=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'Lista'));
							$consignacionsEliminados=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$consignacions=array_merge($consignacions,$consignacionsEliminados);

							foreach($consignacions as $consignacion1) {
								$consignacion1->setIsDeleted(true);
							}
							
						$this->termino_pago_clienteLogic->saveRelaciones($this->termino_pago_clienteLogic->gettermino_pago_cliente(),$parametrofacturacions,$debitocuentacobrars,$devolucionfacturas,$facturalotes,$estimados,$cuentacobrars,$clientes,$facturas,$consignacions);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->termino_pago_clientesEliminados[]=$this->termino_pago_clienteLogic->gettermino_pago_cliente();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->termino_pago_clienteLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							parametro_facturacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$parametrofacturacions=unserialize($this->Session->read(parametro_facturacion_util::$STR_SESSION_NAME.'Lista'));
							$parametrofacturacionsEliminados=unserialize($this->Session->read(parametro_facturacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$parametrofacturacions=array_merge($parametrofacturacions,$parametrofacturacionsEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							debito_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$debitocuentacobrars=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$debitocuentacobrarsEliminados=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$debitocuentacobrars=array_merge($debitocuentacobrars,$debitocuentacobrarsEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucionfacturas=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'Lista'));
							$devolucionfacturasEliminados=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucionfacturas=array_merge($devolucionfacturas,$devolucionfacturasEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_lote_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturalotes=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'Lista'));
							$facturalotesEliminados=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturalotes=array_merge($facturalotes,$facturalotesEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							estimado_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$estimados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'Lista'));
							$estimadosEliminados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'ListaEliminados'));
							$estimados=array_merge($estimados,$estimadosEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentacobrars=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$cuentacobrarsEliminados=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentacobrars=array_merge($cuentacobrars,$cuentacobrarsEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$clientes=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'Lista'));
							$clientesEliminados=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$clientes=array_merge($clientes,$clientesEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturas=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'Lista'));
							$facturasEliminados=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturas=array_merge($facturas,$facturasEliminados);
							termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							consignacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$consignacions=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'Lista'));
							$consignacionsEliminados=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$consignacions=array_merge($consignacions,$consignacionsEliminados);
							
						$this->termino_pago_clienteLogic->saveRelaciones($this->termino_pago_clienteLogic->gettermino_pago_cliente(),$parametrofacturacions,$debitocuentacobrars,$devolucionfacturas,$facturalotes,$estimados,$cuentacobrars,$clientes,$facturas,$consignacions);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->termino_pago_clientesEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->termino_pago_clienteLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->termino_pago_clienteLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->termino_pago_clientesEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_termino_pago');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->termino_pago_clienteLogic->settermino_pago_clientes();*/
					
					$this->termino_pago_clienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->termino_pago_clienteLogic->setIsConDeepLoad(false);
			
			$this->termino_pago_clientes=$this->termino_pago_clienteLogic->gettermino_pago_clientes();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(termino_pago_cliente_util::$STR_SESSION_NAME.'Lista',serialize($this->termino_pago_clientes));
				$this->Session->write(termino_pago_cliente_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->termino_pago_clientesEliminados));
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
				$this->termino_pago_clienteLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->commitNewConnexionToDeep();
				$this->termino_pago_clienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_clienteLogic->closeNewConnexionToDeep();
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
				$this->termino_pago_clienteLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginaltermino_pago_cliente;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->termino_pago_clienteLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->termino_pago_clientes as $termino_pago_clienteLocal) {
				if($this->termino_pago_clienteLogic->gettermino_pago_cliente()->getId()==$termino_pago_clienteLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->termino_pago_clienteLogic->gettermino_pago_cliente()->setIsDeleted(true);
			$this->termino_pago_clientesEliminados[]=$this->termino_pago_clienteLogic->gettermino_pago_cliente();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->termino_pago_clientes[$indice]);
				
				$this->termino_pago_clientes = array_values($this->termino_pago_clientes);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModeltermino_pago_cliente($this->termino_pago_clienteClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->commitNewConnexionToDeep();
				$this->termino_pago_clienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_clienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(termino_pago_cliente $termino_pago_cliente,array $termino_pago_clientes) {
		try {
			foreach($termino_pago_clientes as $termino_pago_clienteLocal){ 
				if($termino_pago_clienteLocal->getId()==$termino_pago_cliente->getId()) {
					$termino_pago_clienteLocal->setIsChanged($termino_pago_cliente->getIsChanged());
					$termino_pago_clienteLocal->setIsNew($termino_pago_cliente->getIsNew());
					$termino_pago_clienteLocal->setIsDeleted($termino_pago_cliente->getIsDeleted());
					//$termino_pago_clienteLocal->setbitExpired($termino_pago_cliente->getbitExpired());
					
					$termino_pago_clienteLocal->setId($termino_pago_cliente->getId());	
					$termino_pago_clienteLocal->setVersionRow($termino_pago_cliente->getVersionRow());	
					$termino_pago_clienteLocal->setVersionRow($termino_pago_cliente->getVersionRow());	
					$termino_pago_clienteLocal->setid_empresa($termino_pago_cliente->getid_empresa());	
					$termino_pago_clienteLocal->setid_tipo_termino_pago($termino_pago_cliente->getid_tipo_termino_pago());	
					$termino_pago_clienteLocal->setcodigo($termino_pago_cliente->getcodigo());	
					$termino_pago_clienteLocal->setdescripcion($termino_pago_cliente->getdescripcion());	
					$termino_pago_clienteLocal->setmonto($termino_pago_cliente->getmonto());	
					$termino_pago_clienteLocal->setdias($termino_pago_cliente->getdias());	
					$termino_pago_clienteLocal->setinicial($termino_pago_cliente->getinicial());	
					$termino_pago_clienteLocal->setcuotas($termino_pago_cliente->getcuotas());	
					$termino_pago_clienteLocal->setdescuento_pronto_pago($termino_pago_cliente->getdescuento_pronto_pago());	
					$termino_pago_clienteLocal->setpredeterminado($termino_pago_cliente->getpredeterminado());	
					$termino_pago_clienteLocal->setid_cuenta($termino_pago_cliente->getid_cuenta());	
					$termino_pago_clienteLocal->setcuenta_contable($termino_pago_cliente->getcuenta_contable());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$termino_pago_clientesLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$termino_pago_clientesLocal=$this->termino_pago_clienteLogic->gettermino_pago_clientes();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$termino_pago_clientesLocal=$this->termino_pago_clientes;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $termino_pago_clientesLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->termino_pago_clienteLogic->gettermino_pago_clientes() as $termino_pago_cliente) {
				if($termino_pago_cliente->getId()==$id) {
					$this->termino_pago_clienteLogic->settermino_pago_cliente($termino_pago_cliente);
					
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
		/*$termino_pago_clientesSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->termino_pago_clientes as $termino_pago_cliente) {
			$termino_pago_cliente->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->termino_pago_clientes[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : termino_pago_cliente_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$termino_pago_cliente_session=unserialize($this->Session->read(termino_pago_cliente_util::$STR_SESSION_NAME));
						
		if($termino_pago_cliente_session==null) {
			$termino_pago_cliente_session=new termino_pago_cliente_session();
		}
		
		
		$this->termino_pago_clienteReturnGeneral=new termino_pago_cliente_param_return();
		$this->termino_pago_clienteParameterGeneral=new termino_pago_cliente_param_return();
			
		$this->termino_pago_clienteParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualtermino_pago_cliente(this.termino_pago_cliente,true);
			this.setVariablesFormularioToObjetoActualForeignKeystermino_pago_cliente(this.termino_pago_cliente);*/
			
			if($termino_pago_cliente_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualtermino_pago_cliente(this.termino_pago_cliente,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->termino_pago_clienteActual=$this->termino_pago_clienteClase;
				
				$this->setCopiarVariablesObjetos($this->termino_pago_clienteActual,$this->termino_pago_cliente,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->termino_pago_clienteReturnGeneral=$this->termino_pago_clienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->termino_pago_clienteLogic->gettermino_pago_clientes(),$this->termino_pago_cliente,$this->termino_pago_clienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($termino_pago_cliente_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeantermino_pago_cliente($classes,$this->termino_pago_clienteReturnGeneral,$this->termino_pago_clienteBean,false);*/
				}
					
				if($this->termino_pago_clienteReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->termino_pago_clienteReturnGeneral->gettermino_pago_cliente(),$this->termino_pago_clienteActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeytermino_pago_cliente($this->termino_pago_clienteReturnGeneral->gettermino_pago_cliente());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariotermino_pago_cliente($this->termino_pago_clienteReturnGeneral->gettermino_pago_cliente());*/
				}
					
				if($this->termino_pago_clienteReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->termino_pago_clienteReturnGeneral->gettermino_pago_cliente(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->termino_pago_cliente,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(termino_pago_clienteJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualtermino_pago_cliente(this.termino_pago_cliente,true);
				this.setVariablesFormularioToObjetoActualForeignKeystermino_pago_cliente(this.termino_pago_cliente);				
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
				
				if($this->termino_pago_clienteAnterior!=null) {
					$this->termino_pago_cliente=$this->termino_pago_clienteAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->termino_pago_clienteReturnGeneral=$this->termino_pago_clienteLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->termino_pago_clienteLogic->gettermino_pago_clientes(),$this->termino_pago_cliente,$this->termino_pago_clienteParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->termino_pago_clienteReturnGeneral->gettermino_pago_cliente(),$this->termino_pago_clienteLogic->gettermino_pago_clientes());
			*/
		}
		
		return $this->termino_pago_clienteReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->getNewConnexionToDeep();
			}

			$this->termino_pago_clienteReturnGeneral=new termino_pago_cliente_param_return();			
			$this->termino_pago_clienteParameterGeneral=new termino_pago_cliente_param_return();
			
			$this->termino_pago_clienteParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->termino_pago_clienteReturnGeneral=$this->termino_pago_clienteLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->termino_pago_clientes,$this->termino_pago_clienteParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->termino_pago_clienteReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->termino_pago_clienteReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->commitNewConnexionToDeep();
				$this->termino_pago_clienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->termino_pago_clienteReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_clienteLogic->closeNewConnexionToDeep();
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
		
		$this->termino_pago_clienteReturnGeneral=new termino_pago_cliente_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_termino_pago_cliente') {
		    $sDominio='termino_pago_cliente';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		if($sTipoControl=='id_tipo_termino_pago' || $sTipoControl=='form-id_tipo_termino_pago' || $sTipoControl=='form_termino_pago_cliente-id_tipo_termino_pago') {
			$sDominio='termino_pago_cliente';		$eventoGlobalTipo=EventoGlobalTipo::$CONTROL_CHANGE;	$controlTipo=ControlTipo::$COMBOBOX;
			$eventoTipo=EventoTipo::$CHANGE;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='COMBOBOX';
			$classes=array();		$conIrServidorAplicacion=false;		$esControlTabla=false;
		}
		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->termino_pago_clienteReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->termino_pago_clienteReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='termino_pago_cliente';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='termino_pago_cliente';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='termino_pago_cliente';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->termino_pago_clienteReturnGeneral=new termino_pago_cliente_param_return();
		$this->termino_pago_clienteParameterGeneral=new termino_pago_cliente_param_return();
			
		$this->termino_pago_clienteParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->termino_pago_clienteReturnGeneral=$this->termino_pago_clienteLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->termino_pago_clienteLogic->gettermino_pago_clientes(),$this->termino_pago_cliente,$this->termino_pago_clienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->termino_pago_clienteReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->termino_pago_clienteReturnGeneral->gettermino_pago_cliente(),$classes);*/
		}									
	
		if($this->termino_pago_clienteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->termino_pago_clienteReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->termino_pago_clienteReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $termino_pago_clientes,termino_pago_cliente $termino_pago_cliente) {
		
		$termino_pago_cliente_session=unserialize($this->Session->read(termino_pago_cliente_util::$STR_SESSION_NAME));
						
		if($termino_pago_cliente_session==null) {
			$termino_pago_cliente_session=new termino_pago_cliente_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(termino_pago_cliente_util::$CLASSNAME);
			}	
			*/
			
			$this->termino_pago_clienteReturnGeneral=new termino_pago_cliente_param_return();
			$this->termino_pago_clienteParameterGeneral=new termino_pago_cliente_param_return();
			
			$this->termino_pago_clienteParameterGeneral->setdata($this->data);
		
		
			
		if($termino_pago_cliente_session->conGuardarRelaciones) {
			$classes=termino_pago_cliente_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->termino_pago_clienteActual,$this->termino_pago_cliente,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->termino_pago_clienteReturnGeneral=$this->termino_pago_clienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->termino_pago_clienteLogic->gettermino_pago_clientes(),$this->termino_pago_clienteActual,$this->termino_pago_clienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->termino_pago_clienteReturnGeneral=$this->termino_pago_clienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$termino_pago_clientes,$termino_pago_cliente,$this->termino_pago_clienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModeltermino_pago_cliente($this->termino_pago_clienteLogic->gettermino_pago_cliente());*/
			
			$this->termino_pago_cliente=$this->termino_pago_clienteLogic->gettermino_pago_cliente();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->termino_pago_cliente);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->commitNewConnexionToDeep();
				$this->termino_pago_clienteLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$termino_pago_clienteActual=new termino_pago_cliente();
			
			if($this->termino_pago_clienteClase==null) {		
				$this->termino_pago_clienteClase=new termino_pago_cliente();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$termino_pago_clienteActual=$this->termino_pago_clientes[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $termino_pago_clienteActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $termino_pago_clienteActual->setid_tipo_termino_pago((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $termino_pago_clienteActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $termino_pago_clienteActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $termino_pago_clienteActual->setmonto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $termino_pago_clienteActual->setdias((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $termino_pago_clienteActual->setinicial((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $termino_pago_clienteActual->setcuotas((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $termino_pago_clienteActual->setdescuento_pronto_pago((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $termino_pago_clienteActual->setpredeterminado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_12')));  } else { $termino_pago_clienteActual->setpredeterminado(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $termino_pago_clienteActual->setid_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $termino_pago_clienteActual->setcuenta_contable($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }

				$this->termino_pago_clienteClase=$termino_pago_clienteActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->termino_pago_clienteModel->set($this->termino_pago_clienteClase);
				
				/*$this->termino_pago_clienteModel->set($this->migrarModeltermino_pago_cliente($this->termino_pago_clienteClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->termino_pago_clientes=$this->migrarModeltermino_pago_cliente($this->termino_pago_clienteLogic->gettermino_pago_clientes());							
		$this->termino_pago_clientes=$this->termino_pago_clienteLogic->gettermino_pago_clientes();*/
		
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
			$this->Session->write(termino_pago_cliente_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$termino_pago_cliente_control_session=unserialize($this->Session->read(termino_pago_cliente_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($termino_pago_cliente_control_session==null) {
				$termino_pago_cliente_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($termino_pago_cliente_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(termino_pago_cliente_util::$STR_SESSION_NAME,$this);*/
		} else {
			$termino_pago_cliente_session=unserialize($this->Session->read(termino_pago_cliente_util::$STR_SESSION_NAME));
			
			if($termino_pago_cliente_session==null) {
				$termino_pago_cliente_session=new termino_pago_cliente_session();
			}
			
			$this->set(termino_pago_cliente_util::$STR_SESSION_NAME, $termino_pago_cliente_session);
		}
	}
	
	public function setCopiarVariablesObjetos(termino_pago_cliente $termino_pago_clienteOrigen,termino_pago_cliente $termino_pago_cliente,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($termino_pago_cliente==null) {
				$termino_pago_cliente=new termino_pago_cliente();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $termino_pago_clienteOrigen->getId()!=null && $termino_pago_clienteOrigen->getId()!=0)) {$termino_pago_cliente->setId($termino_pago_clienteOrigen->getId());}}
			if($conDefault || ($conDefault==false && $termino_pago_clienteOrigen->getid_tipo_termino_pago()!=null && $termino_pago_clienteOrigen->getid_tipo_termino_pago()!=-1)) {$termino_pago_cliente->setid_tipo_termino_pago($termino_pago_clienteOrigen->getid_tipo_termino_pago());}
			if($conDefault || ($conDefault==false && $termino_pago_clienteOrigen->getcodigo()!=null && $termino_pago_clienteOrigen->getcodigo()!='')) {$termino_pago_cliente->setcodigo($termino_pago_clienteOrigen->getcodigo());}
			if($conDefault || ($conDefault==false && $termino_pago_clienteOrigen->getdescripcion()!=null && $termino_pago_clienteOrigen->getdescripcion()!='')) {$termino_pago_cliente->setdescripcion($termino_pago_clienteOrigen->getdescripcion());}
			if($conDefault || ($conDefault==false && $termino_pago_clienteOrigen->getmonto()!=null && $termino_pago_clienteOrigen->getmonto()!=0.0)) {$termino_pago_cliente->setmonto($termino_pago_clienteOrigen->getmonto());}
			if($conDefault || ($conDefault==false && $termino_pago_clienteOrigen->getdias()!=null && $termino_pago_clienteOrigen->getdias()!=0)) {$termino_pago_cliente->setdias($termino_pago_clienteOrigen->getdias());}
			if($conDefault || ($conDefault==false && $termino_pago_clienteOrigen->getinicial()!=null && $termino_pago_clienteOrigen->getinicial()!=0.0)) {$termino_pago_cliente->setinicial($termino_pago_clienteOrigen->getinicial());}
			if($conDefault || ($conDefault==false && $termino_pago_clienteOrigen->getcuotas()!=null && $termino_pago_clienteOrigen->getcuotas()!=0)) {$termino_pago_cliente->setcuotas($termino_pago_clienteOrigen->getcuotas());}
			if($conDefault || ($conDefault==false && $termino_pago_clienteOrigen->getdescuento_pronto_pago()!=null && $termino_pago_clienteOrigen->getdescuento_pronto_pago()!=0.0)) {$termino_pago_cliente->setdescuento_pronto_pago($termino_pago_clienteOrigen->getdescuento_pronto_pago());}
			if($conDefault || ($conDefault==false && $termino_pago_clienteOrigen->getpredeterminado()!=null && $termino_pago_clienteOrigen->getpredeterminado()!=false)) {$termino_pago_cliente->setpredeterminado($termino_pago_clienteOrigen->getpredeterminado());}
			if($conDefault || ($conDefault==false && $termino_pago_clienteOrigen->getid_cuenta()!=null && $termino_pago_clienteOrigen->getid_cuenta()!=-1)) {$termino_pago_cliente->setid_cuenta($termino_pago_clienteOrigen->getid_cuenta());}
			if($conDefault || ($conDefault==false && $termino_pago_clienteOrigen->getcuenta_contable()!=null && $termino_pago_clienteOrigen->getcuenta_contable()!='')) {$termino_pago_cliente->setcuenta_contable($termino_pago_clienteOrigen->getcuenta_contable());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$termino_pago_clientesSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$termino_pago_clientesSeleccionados[]=$this->termino_pago_clientes[$indice];
			}
		}
		
		return $termino_pago_clientesSeleccionados;
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
		$termino_pago_cliente= new termino_pago_cliente();
		
		foreach($this->termino_pago_clienteLogic->gettermino_pago_clientes() as $termino_pago_cliente) {
			
		$termino_pago_cliente->parametrofacturacions=array();
		$termino_pago_cliente->debitocuentacobrars=array();
		$termino_pago_cliente->devolucionfacturas=array();
		$termino_pago_cliente->facturaloteid_termino_pagos=array();
		$termino_pago_cliente->estimados=array();
		$termino_pago_cliente->cuentacobrars=array();
		$termino_pago_cliente->clientes=array();
		$termino_pago_cliente->facturas=array();
		$termino_pago_cliente->consignacions=array();
		}		
		
		if($termino_pago_cliente!=null);
	}
	
	public function cargarRelaciones(array $termino_pago_clientes=array()) : array {	
		
		$termino_pago_clientesRespaldo = array();
		$termino_pago_clientesLocal = array();
		
		termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			parametro_facturacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			debito_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			factura_lote_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			estimado_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			consignacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$termino_pago_clientesResp=array();
		$classes=array();
			
		
				$class=new Classe('parametro_facturacion'); 	$classes[]=$class;
				$class=new Classe('debito_cuenta_cobrar'); 	$classes[]=$class;
				$class=new Classe('devolucion_factura'); 	$classes[]=$class;
				$class=new Classe('factura_lote'); 	$classes[]=$class;
				$class=new Classe('estimado'); 	$classes[]=$class;
				$class=new Classe('cuenta_cobrar'); 	$classes[]=$class;
				$class=new Classe('cliente'); 	$classes[]=$class;
				$class=new Classe('factura'); 	$classes[]=$class;
				$class=new Classe('consignacion'); 	$classes[]=$class;
			
			
		$termino_pago_clientesRespaldo=$this->termino_pago_clienteLogic->gettermino_pago_clientes();
			
		$this->termino_pago_clienteLogic->setIsConDeep(true);
		
		$this->termino_pago_clienteLogic->settermino_pago_clientes($termino_pago_clientes);
			
		$this->termino_pago_clienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$termino_pago_clientesLocal=$this->termino_pago_clienteLogic->gettermino_pago_clientes();
			
		/*RESPALDO*/
		$this->termino_pago_clienteLogic->settermino_pago_clientes($termino_pago_clientesRespaldo);
			
		$this->termino_pago_clienteLogic->setIsConDeep(false);
		
		if($termino_pago_clientesResp!=null);
		
		return $termino_pago_clientesLocal;
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
				$this->termino_pago_clienteLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_clienteLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(termino_pago_cliente_session $termino_pago_cliente_session) {
		$termino_pago_cliente_session->strTypeOnLoad=$this->strTypeOnLoadtermino_pago_cliente;
		$termino_pago_cliente_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliartermino_pago_cliente;
		$termino_pago_cliente_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliartermino_pago_cliente;
		$termino_pago_cliente_session->bitEsPopup=$this->bitEsPopup;
		$termino_pago_cliente_session->bitEsBusqueda=$this->bitEsBusqueda;
		$termino_pago_cliente_session->strFuncionJs=$this->strFuncionJs;
		/*$termino_pago_cliente_session->strSufijo=$this->strSufijo;*/
		$termino_pago_cliente_session->bitEsRelaciones=$this->bitEsRelaciones;
		$termino_pago_cliente_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, termino_pago_cliente_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisosparametro_facturacion='none';
			$this->strTienePermisosparametro_facturacion=((Funciones::existeCadenaArray(parametro_facturacion_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosparametro_facturacion='table-cell';

			$this->strTienePermisosdebito_cuenta_cobrar='none';
			$this->strTienePermisosdebito_cuenta_cobrar=((Funciones::existeCadenaArray(debito_cuenta_cobrar_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosdebito_cuenta_cobrar='table-cell';

			$this->strTienePermisosdevolucion_factura='none';
			$this->strTienePermisosdevolucion_factura=((Funciones::existeCadenaArray(devolucion_factura_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosdevolucion_factura='table-cell';

			$this->strTienePermisosfactura_lote='none';
			$this->strTienePermisosfactura_lote=((Funciones::existeCadenaArray(factura_lote_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosfactura_lote='table-cell';

			$this->strTienePermisosestimado='none';
			$this->strTienePermisosestimado=((Funciones::existeCadenaArray(estimado_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosestimado='table-cell';

			$this->strTienePermisoscuenta_cobrar='none';
			$this->strTienePermisoscuenta_cobrar=((Funciones::existeCadenaArray(cuenta_cobrar_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoscuenta_cobrar='table-cell';

			$this->strTienePermisoscliente='none';
			$this->strTienePermisoscliente=((Funciones::existeCadenaArray(cliente_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoscliente='table-cell';

			$this->strTienePermisosfactura='none';
			$this->strTienePermisosfactura=((Funciones::existeCadenaArray(factura_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosfactura='table-cell';

			$this->strTienePermisosconsignacion='none';
			$this->strTienePermisosconsignacion=((Funciones::existeCadenaArray(consignacion_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosconsignacion='table-cell';
		} else {
			

			$this->strTienePermisosparametro_facturacion='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosparametro_facturacion=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, parametro_facturacion_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosparametro_facturacion='table-cell';

			$this->strTienePermisosdebito_cuenta_cobrar='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosdebito_cuenta_cobrar=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, debito_cuenta_cobrar_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosdebito_cuenta_cobrar='table-cell';

			$this->strTienePermisosdevolucion_factura='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosdevolucion_factura=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, devolucion_factura_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosdevolucion_factura='table-cell';

			$this->strTienePermisosfactura_lote='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosfactura_lote=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, factura_lote_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosfactura_lote='table-cell';

			$this->strTienePermisosestimado='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosestimado=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, estimado_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosestimado='table-cell';

			$this->strTienePermisoscuenta_cobrar='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoscuenta_cobrar=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_cobrar_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoscuenta_cobrar='table-cell';

			$this->strTienePermisoscliente='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoscliente=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cliente_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoscliente='table-cell';

			$this->strTienePermisosfactura='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosfactura=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, factura_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosfactura='table-cell';

			$this->strTienePermisosconsignacion='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosconsignacion=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, consignacion_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosconsignacion='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$termino_pago_clienteViewAdditional=new termino_pago_clienteView_add();
		$termino_pago_clienteViewAdditional->termino_pago_clientes=$this->termino_pago_clientes;
		$termino_pago_clienteViewAdditional->Session=$this->Session;
		
		return $termino_pago_clienteViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$termino_pago_clientesLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$termino_pago_clientesLocal=$this->termino_pago_clientes;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$termino_pago_clientesLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($termino_pago_clientesLocal)<=0) {
					$termino_pago_clientesLocal=$this->termino_pago_clientes;
				}
			} else {
				$termino_pago_clientesLocal=$this->termino_pago_clientes;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliartermino_pago_clientesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliartermino_pago_clientesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$termino_pago_clienteLogic=new termino_pago_cliente_logic();
		$termino_pago_clienteLogic->settermino_pago_clientes($this->termino_pago_clientes);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$parametro_facturacion_session=unserialize($this->Session->read(parametro_facturacion_util::$STR_SESSION_NAME));

		if($parametro_facturacion_session==null) {
			$parametro_facturacion_session=new parametro_facturacion_session();
		}

		$debito_cuenta_cobrar_session=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME));

		if($debito_cuenta_cobrar_session==null) {
			$debito_cuenta_cobrar_session=new debito_cuenta_cobrar_session();
		}

		$devolucion_factura_session=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME));

		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		}

		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}

		$estimado_session=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME));

		if($estimado_session==null) {
			$estimado_session=new estimado_session();
		}

		$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}

		$factura_session=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME));

		if($factura_session==null) {
			$factura_session=new factura_session();
		}

		$consignacion_session=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME));

		if($consignacion_session==null) {
			$consignacion_session=new consignacion_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_termino_pago');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$termino_pago_clienteLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->termino_pago_clientes=$termino_pago_clienteLogic->gettermino_pago_clientes();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->termino_pago_clientesLocal=$this->termino_pago_clientes;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=termino_pago_cliente_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=termino_pago_cliente_util::$STR_TABLE_NAME;		
			
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
			
			$termino_pago_clientes = $this->termino_pago_clientes;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = termino_pago_cliente_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = termino_pago_cliente_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/cuentascobrar/presentation/templating/termino_pago_cliente_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->termino_pago_clientes=$termino_pago_clientes;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->termino_pago_clientesLocal=$termino_pago_clientesLocal;
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
		
		$termino_pago_clientesLocal=array();
		
		$termino_pago_clientesLocal=$this->termino_pago_clientes;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliartermino_pago_clientesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliartermino_pago_clientesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$termino_pago_clienteLogic=new termino_pago_cliente_logic();
		$termino_pago_clienteLogic->settermino_pago_clientes($this->termino_pago_clientes);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$parametro_facturacion_session=unserialize($this->Session->read(parametro_facturacion_util::$STR_SESSION_NAME));

		if($parametro_facturacion_session==null) {
			$parametro_facturacion_session=new parametro_facturacion_session();
		}

		$debito_cuenta_cobrar_session=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME));

		if($debito_cuenta_cobrar_session==null) {
			$debito_cuenta_cobrar_session=new debito_cuenta_cobrar_session();
		}

		$devolucion_factura_session=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME));

		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		}

		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}

		$estimado_session=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME));

		if($estimado_session==null) {
			$estimado_session=new estimado_session();
		}

		$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}

		$factura_session=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME));

		if($factura_session==null) {
			$factura_session=new factura_session();
		}

		$consignacion_session=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME));

		if($consignacion_session==null) {
			$consignacion_session=new consignacion_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_termino_pago');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$termino_pago_clienteLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->termino_pago_clientes=$termino_pago_clienteLogic->gettermino_pago_clientes();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$termino_pago_clientes = $this->termino_pago_clientes;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = termino_pago_cliente_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = termino_pago_cliente_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/cuentascobrar/presentation/templating/termino_pago_cliente_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->termino_pago_clientes=$termino_pago_clientes;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->termino_pago_clientesLocal=$termino_pago_clientesLocal;
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
	
	public function getHtmlTablaDatosResumen(array $termino_pago_clientes=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->termino_pago_clientesReporte = $termino_pago_clientes;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliartermino_pago_clientesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliartermino_pago_clientesAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $termino_pago_clientes=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->termino_pago_clientesReporte = $termino_pago_clientes;		
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
		
		
		$this->termino_pago_clientesReporte=$this->cargarRelaciones($termino_pago_clientes);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliartermino_pago_clientesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliartermino_pago_clientesAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(termino_pago_cliente $termino_pago_cliente=null) : string {	
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
			
			
			$termino_pago_clientesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$termino_pago_clientesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($termino_pago_clientesLocal)<=0) {
					/*//DEBE ESCOGER
					$termino_pago_clientesLocal=$this->termino_pago_clientes;*/
				}
			} else {
				/*//DEBE ESCOGER
				$termino_pago_clientesLocal=$this->termino_pago_clientes;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($termino_pago_clientesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($termino_pago_clientesLocal,true);
			
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
				$this->termino_pago_clienteLogic->getNewConnexionToDeep();
			}
					
			$termino_pago_clientesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$termino_pago_clientesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($termino_pago_clientesLocal)<=0) {
					/*//DEBE ESCOGER
					$termino_pago_clientesLocal=$this->termino_pago_clientes;*/
				}
			} else {
				/*//DEBE ESCOGER
				$termino_pago_clientesLocal=$this->termino_pago_clientes;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($termino_pago_clientesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($termino_pago_clientesLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->commitNewConnexionToDeep();
				$this->termino_pago_clienteLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_clienteLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Terminos Pago Clientes';
			
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
			$fileName='termino_pago_cliente';
			
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
			
			$title='Reporte de  Terminos Pago Clientes';
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
			
			$title='Reporte de  Terminos Pago Clientes';
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
				$this->termino_pago_clienteLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Terminos Pago Clientes';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->commitNewConnexionToDeep();
				$this->termino_pago_clienteLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_clienteLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_clienteLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=termino_pago_cliente_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->termino_pago_clientesAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->termino_pago_clientesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->termino_pago_clientesAuxiliar)<=0) {
					$this->termino_pago_clientesAuxiliar=$this->termino_pago_clientes;
				}
			} else {
				$this->termino_pago_clientesAuxiliar=$this->termino_pago_clientes;
			}
		/*} else {
			$this->termino_pago_clientesAuxiliar=$this->termino_pago_clientesReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->termino_pago_clientesAuxiliar as $termino_pago_cliente) {
				$row=array();
				
				$row=termino_pago_cliente_util::getDataReportRow($tipo,$termino_pago_cliente,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			termino_pago_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			parametro_facturacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			debito_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			factura_lote_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			estimado_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			consignacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$termino_pago_clientesResp=array();
			$classes=array();
			
			
				$class=new Classe('parametro_facturacion'); 	$classes[]=$class;
				$class=new Classe('debito_cuenta_cobrar'); 	$classes[]=$class;
				$class=new Classe('devolucion_factura'); 	$classes[]=$class;
				$class=new Classe('factura_lote'); 	$classes[]=$class;
				$class=new Classe('estimado'); 	$classes[]=$class;
				$class=new Classe('cuenta_cobrar'); 	$classes[]=$class;
				$class=new Classe('cliente'); 	$classes[]=$class;
				$class=new Classe('factura'); 	$classes[]=$class;
				$class=new Classe('consignacion'); 	$classes[]=$class;
			
			
			$termino_pago_clientesResp=$this->termino_pago_clienteLogic->gettermino_pago_clientes();
			
			$this->termino_pago_clienteLogic->setIsConDeep(true);
			
			$this->termino_pago_clienteLogic->settermino_pago_clientes($this->termino_pago_clientesAuxiliar);
			
			$this->termino_pago_clienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->termino_pago_clientesAuxiliar=$this->termino_pago_clienteLogic->gettermino_pago_clientes();
			
			//RESPALDO
			$this->termino_pago_clienteLogic->settermino_pago_clientes($termino_pago_clientesResp);
			
			$this->termino_pago_clienteLogic->setIsConDeep(false);
			*/
			
			$this->termino_pago_clientesAuxiliar=$this->cargarRelaciones($this->termino_pago_clientesAuxiliar);
			
			$i=0;
			
			foreach ($this->termino_pago_clientesAuxiliar as $termino_pago_cliente) {
				$row=array();
				
				if($i!=0) {
					$row=termino_pago_cliente_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=termino_pago_cliente_util::getDataReportRow($tipo,$termino_pago_cliente,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//parametro_facturacion
				if(Funciones::existeCadenaArrayOrderBy(parametro_facturacion_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($termino_pago_cliente->getparametro_facturacions())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(parametro_facturacion_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=parametro_facturacion_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($termino_pago_cliente->getparametro_facturacions() as $parametro_facturacion) {
						$row=parametro_facturacion_util::getDataReportRow('RELACIONADO',$parametro_facturacion,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//debito_cuenta_cobrar
				if(Funciones::existeCadenaArrayOrderBy(debito_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($termino_pago_cliente->getdebito_cuenta_cobrars())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(debito_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=debito_cuenta_cobrar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($termino_pago_cliente->getdebito_cuenta_cobrars() as $debito_cuenta_cobrar) {
						$row=debito_cuenta_cobrar_util::getDataReportRow('RELACIONADO',$debito_cuenta_cobrar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//devolucion_factura
				if(Funciones::existeCadenaArrayOrderBy(devolucion_factura_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($termino_pago_cliente->getdevolucion_facturas())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(devolucion_factura_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=devolucion_factura_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($termino_pago_cliente->getdevolucion_facturas() as $devolucion_factura) {
						$row=devolucion_factura_util::getDataReportRow('RELACIONADO',$devolucion_factura,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//factura_lote
				if(Funciones::existeCadenaArrayOrderBy(factura_lote_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($termino_pago_cliente->getfactura_lotes())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(factura_lote_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=factura_lote_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($termino_pago_cliente->getfactura_lotes() as $factura_lote) {
						$row=factura_lote_util::getDataReportRow('RELACIONADO',$factura_lote,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//estimado
				if(Funciones::existeCadenaArrayOrderBy(estimado_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($termino_pago_cliente->getestimados())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(estimado_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=estimado_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($termino_pago_cliente->getestimados() as $estimado) {
						$row=estimado_util::getDataReportRow('RELACIONADO',$estimado,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//cuenta_cobrar
				if(Funciones::existeCadenaArrayOrderBy(cuenta_cobrar_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($termino_pago_cliente->getcuenta_cobrars())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cuenta_cobrar_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=cuenta_cobrar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($termino_pago_cliente->getcuenta_cobrars() as $cuenta_cobrar) {
						$row=cuenta_cobrar_util::getDataReportRow('RELACIONADO',$cuenta_cobrar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//cliente
				if(Funciones::existeCadenaArrayOrderBy(cliente_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($termino_pago_cliente->getclientes())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cliente_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=cliente_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($termino_pago_cliente->getclientes() as $cliente) {
						$row=cliente_util::getDataReportRow('RELACIONADO',$cliente,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//factura
				if(Funciones::existeCadenaArrayOrderBy(factura_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($termino_pago_cliente->getfacturas())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(factura_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=factura_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($termino_pago_cliente->getfacturas() as $factura) {
						$row=factura_util::getDataReportRow('RELACIONADO',$factura,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//consignacion
				if(Funciones::existeCadenaArrayOrderBy(consignacion_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($termino_pago_cliente->getconsignacions())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(consignacion_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=consignacion_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($termino_pago_cliente->getconsignacions() as $consignacion) {
						$row=consignacion_util::getDataReportRow('RELACIONADO',$consignacion,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}
				
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
		$this->termino_pago_clientesAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->termino_pago_clientesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->termino_pago_clientesAuxiliar)<=0) {
					$this->termino_pago_clientesAuxiliar=$this->termino_pago_clientes;
				}
			} else {
				$this->termino_pago_clientesAuxiliar=$this->termino_pago_clientes;
			}
		/*} else {
			$this->termino_pago_clientesAuxiliar=$this->termino_pago_clientesReporte;	
		}*/
		
		foreach ($this->termino_pago_clientesAuxiliar as $termino_pago_cliente) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(termino_pago_cliente_util::gettermino_pago_clienteDescripcion($termino_pago_cliente),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Tipo Termino Pago',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Termino Pago',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getid_tipo_termino_pagoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Codigo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getcodigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descripcion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getdescripcion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getmonto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Dias',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Dias',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getdias(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Inicial',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Inicial',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getinicial(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuotas',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuotas',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getcuotas(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descuento Pronto Pago',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descuento Pronto Pago',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getdescuento_pronto_pago(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Predeterminado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Predeterminado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getpredeterminado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Cuenta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getid_cuentaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuenta Contable',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Contable',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getcuenta_contable(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface termino_pago_cliente_base_controlI {			
		
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
		public function getIndiceActual(termino_pago_cliente $termino_pago_cliente,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(termino_pago_cliente $termino_pago_cliente,array $termino_pago_clientes);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : termino_pago_cliente_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $termino_pago_clientes,termino_pago_cliente $termino_pago_cliente);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(termino_pago_cliente_param_return $termino_pago_clienteReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(termino_pago_cliente_session $termino_pago_cliente_session);		
		public function actualizarInvitadoSessionDivStyleVariables(termino_pago_cliente_session $termino_pago_cliente_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(termino_pago_cliente $termino_pago_clienteOrigen,termino_pago_cliente $termino_pago_cliente,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(termino_pago_cliente_control $termino_pago_cliente_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $termino_pago_clientes=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(termino_pago_cliente_session $termino_pago_cliente_session);		
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
		public function getHtmlTablaDatosResumen(array $termino_pago_clientes=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $termino_pago_clientes=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(termino_pago_cliente $termino_pago_cliente=null) : string;
		
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
