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

namespace com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/termino_pago_proveedor/util/termino_pago_proveedor_carga.php');
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_param_return;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\presentation\session\termino_pago_proveedor_session;


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


use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;
use com\bydan\contabilidad\inventario\orden_compra\presentation\session\orden_compra_session;

use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;

use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\presentation\session\credito_cuenta_pagar_session;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\presentation\session\cuenta_pagar_session;

use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_carga;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_util;
use com\bydan\contabilidad\inventario\cotizacion\presentation\session\cotizacion_session;

use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_carga;
use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_util;
use com\bydan\contabilidad\inventario\parametro_inventario\presentation\session\parametro_inventario_session;

use com\bydan\contabilidad\inventario\devolucion\util\devolucion_carga;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_util;
use com\bydan\contabilidad\inventario\devolucion\presentation\session\devolucion_session;


/*CARGA ARCHIVOS FRAMEWORK*/
termino_pago_proveedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
termino_pago_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
termino_pago_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class termino_pago_proveedor_base_control extends termino_pago_proveedor_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->termino_pago_proveedorClase==null) {		
				$this->termino_pago_proveedorClase=new termino_pago_proveedor();
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
				
				
				$this->termino_pago_proveedorClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->termino_pago_proveedorClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->termino_pago_proveedorClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->termino_pago_proveedorClase->setid_tipo_termino_pago((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_termino_pago'));
				
				$this->termino_pago_proveedorClase->setcodigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo'));
				
				$this->termino_pago_proveedorClase->setdescripcion($this->getDataCampoFormTabla('form'.$this->strSufijo,'descripcion'));
				
				$this->termino_pago_proveedorClase->setmonto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'monto'));
				
				$this->termino_pago_proveedorClase->setdias((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'dias'));
				
				$this->termino_pago_proveedorClase->setinicial((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'inicial'));
				
				$this->termino_pago_proveedorClase->setcuotas((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'cuotas'));
				
				$this->termino_pago_proveedorClase->setdescuento_pronto_pago((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'descuento_pronto_pago'));
				
				$this->termino_pago_proveedorClase->setpredeterminado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'predeterminado')));
				
				$this->termino_pago_proveedorClase->setid_cuenta((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta'));
				
				$this->termino_pago_proveedorClase->setcuenta_contable($this->getDataCampoFormTabla('form'.$this->strSufijo,'cuenta_contable'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->termino_pago_proveedorModel->set($this->termino_pago_proveedorClase);
				
				/*$this->termino_pago_proveedorModel->set($this->migrarModeltermino_pago_proveedor($this->termino_pago_proveedorClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setId($this->termino_pago_proveedorClase->getId());	
			$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setVersionRow($this->termino_pago_proveedorClase->getVersionRow());	
			$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setVersionRow($this->termino_pago_proveedorClase->getVersionRow());	
			$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setid_empresa($this->termino_pago_proveedorClase->getid_empresa());	
			$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setid_tipo_termino_pago($this->termino_pago_proveedorClase->getid_tipo_termino_pago());	
			$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setcodigo($this->termino_pago_proveedorClase->getcodigo());	
			$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setdescripcion($this->termino_pago_proveedorClase->getdescripcion());	
			$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setmonto($this->termino_pago_proveedorClase->getmonto());	
			$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setdias($this->termino_pago_proveedorClase->getdias());	
			$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setinicial($this->termino_pago_proveedorClase->getinicial());	
			$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setcuotas($this->termino_pago_proveedorClase->getcuotas());	
			$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setdescuento_pronto_pago($this->termino_pago_proveedorClase->getdescuento_pronto_pago());	
			$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setpredeterminado($this->termino_pago_proveedorClase->getpredeterminado());	
			$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setid_cuenta($this->termino_pago_proveedorClase->getid_cuenta());	
			$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setcuenta_contable($this->termino_pago_proveedorClase->getcuenta_contable());	
		} else {
			$this->termino_pago_proveedorClase->setId($this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId());	
			$this->termino_pago_proveedorClase->setVersionRow($this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->getVersionRow());	
			$this->termino_pago_proveedorClase->setVersionRow($this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->getVersionRow());	
			$this->termino_pago_proveedorClase->setid_empresa($this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->getid_empresa());	
			$this->termino_pago_proveedorClase->setid_tipo_termino_pago($this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->getid_tipo_termino_pago());	
			$this->termino_pago_proveedorClase->setcodigo($this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->getcodigo());	
			$this->termino_pago_proveedorClase->setdescripcion($this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->getdescripcion());	
			$this->termino_pago_proveedorClase->setmonto($this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->getmonto());	
			$this->termino_pago_proveedorClase->setdias($this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->getdias());	
			$this->termino_pago_proveedorClase->setinicial($this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->getinicial());	
			$this->termino_pago_proveedorClase->setcuotas($this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->getcuotas());	
			$this->termino_pago_proveedorClase->setdescuento_pronto_pago($this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->getdescuento_pronto_pago());	
			$this->termino_pago_proveedorClase->setpredeterminado($this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->getpredeterminado());	
			$this->termino_pago_proveedorClase->setid_cuenta($this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->getid_cuenta());	
			$this->termino_pago_proveedorClase->setcuenta_contable($this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->getcuenta_contable());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->termino_pago_proveedorModel->invalidFieldsMe();
		
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
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
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
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}

			$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));
						
			if($termino_pago_proveedor_session==null) {
				$termino_pago_proveedor_session=new termino_pago_proveedor_session();
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
						$this->termino_pago_proveedorLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->termino_pago_proveedorActual =$this->termino_pago_proveedorClase;
			
			/*$this->termino_pago_proveedorActual =$this->migrarModeltermino_pago_proveedor($this->termino_pago_proveedorClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->termino_pago_proveedorLogic->gettermino_pago_proveedors(),$this->termino_pago_proveedorActual);
			
			$this->actualizarControllerConReturnGeneral($this->termino_pago_proveedorReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
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
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$termino_pago_proveedorsLocal=$this->getListaActual();
		
		$iIndice=termino_pago_proveedor_util::getIndiceNuevo($termino_pago_proveedorsLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(termino_pago_proveedor $termino_pago_proveedor,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$termino_pago_proveedorsLocal=$this->getListaActual();
		
		$iIndice=termino_pago_proveedor_util::getIndiceActual($termino_pago_proveedorsLocal,$termino_pago_proveedor,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevotermino_pago_proveedor')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->termino_pago_proveedorActual =$this->termino_pago_proveedorClase;
			
			/*$this->termino_pago_proveedorActual =$this->migrarModeltermino_pago_proveedor($this->termino_pago_proveedorClase);*/
			
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
			
			$this->termino_pago_proveedorLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_termino_pago');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
			
			$this->termino_pago_proveedorLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->termino_pago_proveedorLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->termino_pago_proveedorLogic->settermino_pago_proveedor(new termino_pago_proveedor());
				
				$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setIsNew(true);
				$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setIsChanged(true);
				$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->termino_pago_proveedorModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->termino_pago_proveedorLogic->termino_pago_proveedors[]=$this->termino_pago_proveedorLogic->gettermino_pago_proveedor();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->termino_pago_proveedorLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$ordencompras=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'Lista'));
							$ordencomprasEliminados=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'ListaEliminados'));
							$ordencompras=array_merge($ordencompras,$ordencomprasEliminados);
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$proveedors=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'Lista'));
							$proveedorsEliminados=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$proveedors=array_merge($proveedors,$proveedorsEliminados);
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							credito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$creditocuentapagars=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$creditocuentapagarsEliminados=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$creditocuentapagars=array_merge($creditocuentapagars,$creditocuentapagarsEliminados);
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentapagars=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$cuentapagarsEliminados=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentapagars=array_merge($cuentapagars,$cuentapagarsEliminados);
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cotizacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cotizacions=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME.'Lista'));
							$cotizacionsEliminados=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cotizacions=array_merge($cotizacions,$cotizacionsEliminados);
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							parametro_inventario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$parametroinventarios=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME.'Lista'));
							$parametroinventariosEliminados=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME.'ListaEliminados'));
							$parametroinventarios=array_merge($parametroinventarios,$parametroinventariosEliminados);
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucions=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'Lista'));
							$devolucionsEliminados=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucions=array_merge($devolucions,$devolucionsEliminados);
							
							$this->termino_pago_proveedorLogic->saveRelaciones($this->termino_pago_proveedorLogic->gettermino_pago_proveedor(),$ordencompras,$proveedors,$creditocuentapagars,$cuentapagars,$cotizacions,$parametroinventarios,$devolucions);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setIsChanged(true);
				$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setIsNew(false);
				$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->termino_pago_proveedorModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->termino_pago_proveedorLogic->gettermino_pago_proveedor(),$this->termino_pago_proveedorLogic->gettermino_pago_proveedors());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->termino_pago_proveedorLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$ordencompras=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'Lista'));
							$ordencomprasEliminados=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'ListaEliminados'));
							$ordencompras=array_merge($ordencompras,$ordencomprasEliminados);
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$proveedors=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'Lista'));
							$proveedorsEliminados=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$proveedors=array_merge($proveedors,$proveedorsEliminados);
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							credito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$creditocuentapagars=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$creditocuentapagarsEliminados=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$creditocuentapagars=array_merge($creditocuentapagars,$creditocuentapagarsEliminados);
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentapagars=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$cuentapagarsEliminados=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentapagars=array_merge($cuentapagars,$cuentapagarsEliminados);
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cotizacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cotizacions=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME.'Lista'));
							$cotizacionsEliminados=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cotizacions=array_merge($cotizacions,$cotizacionsEliminados);
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							parametro_inventario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$parametroinventarios=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME.'Lista'));
							$parametroinventariosEliminados=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME.'ListaEliminados'));
							$parametroinventarios=array_merge($parametroinventarios,$parametroinventariosEliminados);
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucions=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'Lista'));
							$devolucionsEliminados=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucions=array_merge($devolucions,$devolucionsEliminados);
							
							$this->termino_pago_proveedorLogic->saveRelaciones($this->termino_pago_proveedorLogic->gettermino_pago_proveedor(),$ordencompras,$proveedors,$creditocuentapagars,$cuentapagars,$cotizacions,$parametroinventarios,$devolucions);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setIsDeleted(true);
				$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setIsNew(false);
				$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setIsChanged(false);				
				
				$this->actualizarLista($this->termino_pago_proveedorLogic->gettermino_pago_proveedor(),$this->termino_pago_proveedorLogic->gettermino_pago_proveedors());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->termino_pago_proveedorLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$ordencompras=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'Lista'));
							$ordencomprasEliminados=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'ListaEliminados'));
							$ordencompras=array_merge($ordencompras,$ordencomprasEliminados);

							foreach($ordencompras as $ordencompra1) {
								$ordencompra1->setIsDeleted(true);
							}
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$proveedors=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'Lista'));
							$proveedorsEliminados=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$proveedors=array_merge($proveedors,$proveedorsEliminados);

							foreach($proveedors as $proveedor1) {
								$proveedor1->setIsDeleted(true);
							}
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							credito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$creditocuentapagars=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$creditocuentapagarsEliminados=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$creditocuentapagars=array_merge($creditocuentapagars,$creditocuentapagarsEliminados);

							foreach($creditocuentapagars as $creditocuentapagar1) {
								$creditocuentapagar1->setIsDeleted(true);
							}
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentapagars=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$cuentapagarsEliminados=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentapagars=array_merge($cuentapagars,$cuentapagarsEliminados);

							foreach($cuentapagars as $cuentapagar1) {
								$cuentapagar1->setIsDeleted(true);
							}
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cotizacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cotizacions=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME.'Lista'));
							$cotizacionsEliminados=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cotizacions=array_merge($cotizacions,$cotizacionsEliminados);

							foreach($cotizacions as $cotizacion1) {
								$cotizacion1->setIsDeleted(true);
							}
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							parametro_inventario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$parametroinventarios=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME.'Lista'));
							$parametroinventariosEliminados=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME.'ListaEliminados'));
							$parametroinventarios=array_merge($parametroinventarios,$parametroinventariosEliminados);

							foreach($parametroinventarios as $parametroinventario1) {
								$parametroinventario1->setIsDeleted(true);
							}
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucions=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'Lista'));
							$devolucionsEliminados=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucions=array_merge($devolucions,$devolucionsEliminados);

							foreach($devolucions as $devolucion1) {
								$devolucion1->setIsDeleted(true);
							}
							
						$this->termino_pago_proveedorLogic->saveRelaciones($this->termino_pago_proveedorLogic->gettermino_pago_proveedor(),$ordencompras,$proveedors,$creditocuentapagars,$cuentapagars,$cotizacions,$parametroinventarios,$devolucions);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->termino_pago_proveedorsEliminados[]=$this->termino_pago_proveedorLogic->gettermino_pago_proveedor();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->termino_pago_proveedorLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$ordencompras=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'Lista'));
							$ordencomprasEliminados=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'ListaEliminados'));
							$ordencompras=array_merge($ordencompras,$ordencomprasEliminados);
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$proveedors=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'Lista'));
							$proveedorsEliminados=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$proveedors=array_merge($proveedors,$proveedorsEliminados);
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							credito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$creditocuentapagars=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$creditocuentapagarsEliminados=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$creditocuentapagars=array_merge($creditocuentapagars,$creditocuentapagarsEliminados);
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentapagars=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$cuentapagarsEliminados=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentapagars=array_merge($cuentapagars,$cuentapagarsEliminados);
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cotizacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cotizacions=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME.'Lista'));
							$cotizacionsEliminados=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cotizacions=array_merge($cotizacions,$cotizacionsEliminados);
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							parametro_inventario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$parametroinventarios=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME.'Lista'));
							$parametroinventariosEliminados=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME.'ListaEliminados'));
							$parametroinventarios=array_merge($parametroinventarios,$parametroinventariosEliminados);
							termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucions=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'Lista'));
							$devolucionsEliminados=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucions=array_merge($devolucions,$devolucionsEliminados);
							
						$this->termino_pago_proveedorLogic->saveRelaciones($this->termino_pago_proveedorLogic->gettermino_pago_proveedor(),$ordencompras,$proveedors,$creditocuentapagars,$cuentapagars,$cotizacions,$parametroinventarios,$devolucions);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->termino_pago_proveedorsEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->termino_pago_proveedorLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->termino_pago_proveedorLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->termino_pago_proveedorsEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_termino_pago');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->termino_pago_proveedorLogic->settermino_pago_proveedors();*/
					
					$this->termino_pago_proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->termino_pago_proveedorLogic->setIsConDeepLoad(false);
			
			$this->termino_pago_proveedors=$this->termino_pago_proveedorLogic->gettermino_pago_proveedors();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(termino_pago_proveedor_util::$STR_SESSION_NAME.'Lista',serialize($this->termino_pago_proveedors));
				$this->Session->write(termino_pago_proveedor_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->termino_pago_proveedorsEliminados));
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
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
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
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginaltermino_pago_proveedor;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->termino_pago_proveedorLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->termino_pago_proveedors as $termino_pago_proveedorLocal) {
				if($this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId()==$termino_pago_proveedorLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->termino_pago_proveedorLogic->gettermino_pago_proveedor()->setIsDeleted(true);
			$this->termino_pago_proveedorsEliminados[]=$this->termino_pago_proveedorLogic->gettermino_pago_proveedor();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->termino_pago_proveedors[$indice]);
				
				$this->termino_pago_proveedors = array_values($this->termino_pago_proveedors);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModeltermino_pago_proveedor($this->termino_pago_proveedorClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(termino_pago_proveedor $termino_pago_proveedor,array $termino_pago_proveedors) {
		try {
			foreach($termino_pago_proveedors as $termino_pago_proveedorLocal){ 
				if($termino_pago_proveedorLocal->getId()==$termino_pago_proveedor->getId()) {
					$termino_pago_proveedorLocal->setIsChanged($termino_pago_proveedor->getIsChanged());
					$termino_pago_proveedorLocal->setIsNew($termino_pago_proveedor->getIsNew());
					$termino_pago_proveedorLocal->setIsDeleted($termino_pago_proveedor->getIsDeleted());
					//$termino_pago_proveedorLocal->setbitExpired($termino_pago_proveedor->getbitExpired());
					
					$termino_pago_proveedorLocal->setId($termino_pago_proveedor->getId());	
					$termino_pago_proveedorLocal->setVersionRow($termino_pago_proveedor->getVersionRow());	
					$termino_pago_proveedorLocal->setVersionRow($termino_pago_proveedor->getVersionRow());	
					$termino_pago_proveedorLocal->setid_empresa($termino_pago_proveedor->getid_empresa());	
					$termino_pago_proveedorLocal->setid_tipo_termino_pago($termino_pago_proveedor->getid_tipo_termino_pago());	
					$termino_pago_proveedorLocal->setcodigo($termino_pago_proveedor->getcodigo());	
					$termino_pago_proveedorLocal->setdescripcion($termino_pago_proveedor->getdescripcion());	
					$termino_pago_proveedorLocal->setmonto($termino_pago_proveedor->getmonto());	
					$termino_pago_proveedorLocal->setdias($termino_pago_proveedor->getdias());	
					$termino_pago_proveedorLocal->setinicial($termino_pago_proveedor->getinicial());	
					$termino_pago_proveedorLocal->setcuotas($termino_pago_proveedor->getcuotas());	
					$termino_pago_proveedorLocal->setdescuento_pronto_pago($termino_pago_proveedor->getdescuento_pronto_pago());	
					$termino_pago_proveedorLocal->setpredeterminado($termino_pago_proveedor->getpredeterminado());	
					$termino_pago_proveedorLocal->setid_cuenta($termino_pago_proveedor->getid_cuenta());	
					$termino_pago_proveedorLocal->setcuenta_contable($termino_pago_proveedor->getcuenta_contable());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$termino_pago_proveedorsLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$termino_pago_proveedorsLocal=$this->termino_pago_proveedorLogic->gettermino_pago_proveedors();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$termino_pago_proveedorsLocal=$this->termino_pago_proveedors;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $termino_pago_proveedorsLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->termino_pago_proveedorLogic->gettermino_pago_proveedors() as $termino_pago_proveedor) {
				if($termino_pago_proveedor->getId()==$id) {
					$this->termino_pago_proveedorLogic->settermino_pago_proveedor($termino_pago_proveedor);
					
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
		/*$termino_pago_proveedorsSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->termino_pago_proveedors as $termino_pago_proveedor) {
			$termino_pago_proveedor->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->termino_pago_proveedors[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : termino_pago_proveedor_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));
						
		if($termino_pago_proveedor_session==null) {
			$termino_pago_proveedor_session=new termino_pago_proveedor_session();
		}
		
		
		$this->termino_pago_proveedorReturnGeneral=new termino_pago_proveedor_param_return();
		$this->termino_pago_proveedorParameterGeneral=new termino_pago_proveedor_param_return();
			
		$this->termino_pago_proveedorParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualtermino_pago_proveedor(this.termino_pago_proveedor,true);
			this.setVariablesFormularioToObjetoActualForeignKeystermino_pago_proveedor(this.termino_pago_proveedor);*/
			
			if($termino_pago_proveedor_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualtermino_pago_proveedor(this.termino_pago_proveedor,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->termino_pago_proveedorActual=$this->termino_pago_proveedorClase;
				
				$this->setCopiarVariablesObjetos($this->termino_pago_proveedorActual,$this->termino_pago_proveedor,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->termino_pago_proveedorReturnGeneral=$this->termino_pago_proveedorLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->termino_pago_proveedorLogic->gettermino_pago_proveedors(),$this->termino_pago_proveedor,$this->termino_pago_proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($termino_pago_proveedor_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeantermino_pago_proveedor($classes,$this->termino_pago_proveedorReturnGeneral,$this->termino_pago_proveedorBean,false);*/
				}
					
				if($this->termino_pago_proveedorReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->termino_pago_proveedorReturnGeneral->gettermino_pago_proveedor(),$this->termino_pago_proveedorActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeytermino_pago_proveedor($this->termino_pago_proveedorReturnGeneral->gettermino_pago_proveedor());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariotermino_pago_proveedor($this->termino_pago_proveedorReturnGeneral->gettermino_pago_proveedor());*/
				}
					
				if($this->termino_pago_proveedorReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->termino_pago_proveedorReturnGeneral->gettermino_pago_proveedor(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->termino_pago_proveedor,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(termino_pago_proveedorJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualtermino_pago_proveedor(this.termino_pago_proveedor,true);
				this.setVariablesFormularioToObjetoActualForeignKeystermino_pago_proveedor(this.termino_pago_proveedor);				
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
				
				if($this->termino_pago_proveedorAnterior!=null) {
					$this->termino_pago_proveedor=$this->termino_pago_proveedorAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->termino_pago_proveedorReturnGeneral=$this->termino_pago_proveedorLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->termino_pago_proveedorLogic->gettermino_pago_proveedors(),$this->termino_pago_proveedor,$this->termino_pago_proveedorParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->termino_pago_proveedorReturnGeneral->gettermino_pago_proveedor(),$this->termino_pago_proveedorLogic->gettermino_pago_proveedors());
			*/
		}
		
		return $this->termino_pago_proveedorReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}

			$this->termino_pago_proveedorReturnGeneral=new termino_pago_proveedor_param_return();			
			$this->termino_pago_proveedorParameterGeneral=new termino_pago_proveedor_param_return();
			
			$this->termino_pago_proveedorParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->termino_pago_proveedorReturnGeneral=$this->termino_pago_proveedorLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->termino_pago_proveedors,$this->termino_pago_proveedorParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->termino_pago_proveedorReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->termino_pago_proveedorReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->termino_pago_proveedorReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
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
		
		$this->termino_pago_proveedorReturnGeneral=new termino_pago_proveedor_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_termino_pago_proveedor') {
		    $sDominio='termino_pago_proveedor';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		if($sTipoControl=='id_tipo_termino_pago' || $sTipoControl=='form-id_tipo_termino_pago' || $sTipoControl=='form_termino_pago_proveedor-id_tipo_termino_pago') {
			$sDominio='termino_pago_proveedor';		$eventoGlobalTipo=EventoGlobalTipo::$CONTROL_CHANGE;	$controlTipo=ControlTipo::$COMBOBOX;
			$eventoTipo=EventoTipo::$CHANGE;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='COMBOBOX';
			$classes=array();		$conIrServidorAplicacion=false;		$esControlTabla=false;
		}
		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->termino_pago_proveedorReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->termino_pago_proveedorReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='termino_pago_proveedor';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='termino_pago_proveedor';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='termino_pago_proveedor';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->termino_pago_proveedorReturnGeneral=new termino_pago_proveedor_param_return();
		$this->termino_pago_proveedorParameterGeneral=new termino_pago_proveedor_param_return();
			
		$this->termino_pago_proveedorParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->termino_pago_proveedorReturnGeneral=$this->termino_pago_proveedorLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->termino_pago_proveedorLogic->gettermino_pago_proveedors(),$this->termino_pago_proveedor,$this->termino_pago_proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->termino_pago_proveedorReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->termino_pago_proveedorReturnGeneral->gettermino_pago_proveedor(),$classes);*/
		}									
	
		if($this->termino_pago_proveedorReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->termino_pago_proveedorReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->termino_pago_proveedorReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $termino_pago_proveedors,termino_pago_proveedor $termino_pago_proveedor) {
		
		$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));
						
		if($termino_pago_proveedor_session==null) {
			$termino_pago_proveedor_session=new termino_pago_proveedor_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(termino_pago_proveedor_util::$CLASSNAME);
			}	
			*/
			
			$this->termino_pago_proveedorReturnGeneral=new termino_pago_proveedor_param_return();
			$this->termino_pago_proveedorParameterGeneral=new termino_pago_proveedor_param_return();
			
			$this->termino_pago_proveedorParameterGeneral->setdata($this->data);
		
		
			
		if($termino_pago_proveedor_session->conGuardarRelaciones) {
			$classes=termino_pago_proveedor_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->termino_pago_proveedorActual,$this->termino_pago_proveedor,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->termino_pago_proveedorReturnGeneral=$this->termino_pago_proveedorLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->termino_pago_proveedorLogic->gettermino_pago_proveedors(),$this->termino_pago_proveedorActual,$this->termino_pago_proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->termino_pago_proveedorReturnGeneral=$this->termino_pago_proveedorLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$termino_pago_proveedors,$termino_pago_proveedor,$this->termino_pago_proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModeltermino_pago_proveedor($this->termino_pago_proveedorLogic->gettermino_pago_proveedor());*/
			
			$this->termino_pago_proveedor=$this->termino_pago_proveedorLogic->gettermino_pago_proveedor();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->termino_pago_proveedor);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$termino_pago_proveedorActual=new termino_pago_proveedor();
			
			if($this->termino_pago_proveedorClase==null) {		
				$this->termino_pago_proveedorClase=new termino_pago_proveedor();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$termino_pago_proveedorActual=$this->termino_pago_proveedors[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setid_tipo_termino_pago((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setmonto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setdias((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setinicial((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setcuotas((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setdescuento_pronto_pago((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setpredeterminado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_12')));  } else { $termino_pago_proveedorActual->setpredeterminado(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setid_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setcuenta_contable($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }

				$this->termino_pago_proveedorClase=$termino_pago_proveedorActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->termino_pago_proveedorModel->set($this->termino_pago_proveedorClase);
				
				/*$this->termino_pago_proveedorModel->set($this->migrarModeltermino_pago_proveedor($this->termino_pago_proveedorClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->termino_pago_proveedors=$this->migrarModeltermino_pago_proveedor($this->termino_pago_proveedorLogic->gettermino_pago_proveedors());							
		$this->termino_pago_proveedors=$this->termino_pago_proveedorLogic->gettermino_pago_proveedors();*/
		
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
			$this->Session->write(termino_pago_proveedor_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$termino_pago_proveedor_control_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($termino_pago_proveedor_control_session==null) {
				$termino_pago_proveedor_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($termino_pago_proveedor_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(termino_pago_proveedor_util::$STR_SESSION_NAME,$this);*/
		} else {
			$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));
			
			if($termino_pago_proveedor_session==null) {
				$termino_pago_proveedor_session=new termino_pago_proveedor_session();
			}
			
			$this->set(termino_pago_proveedor_util::$STR_SESSION_NAME, $termino_pago_proveedor_session);
		}
	}
	
	public function setCopiarVariablesObjetos(termino_pago_proveedor $termino_pago_proveedorOrigen,termino_pago_proveedor $termino_pago_proveedor,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($termino_pago_proveedor==null) {
				$termino_pago_proveedor=new termino_pago_proveedor();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $termino_pago_proveedorOrigen->getId()!=null && $termino_pago_proveedorOrigen->getId()!=0)) {$termino_pago_proveedor->setId($termino_pago_proveedorOrigen->getId());}}
			if($conDefault || ($conDefault==false && $termino_pago_proveedorOrigen->getid_tipo_termino_pago()!=null && $termino_pago_proveedorOrigen->getid_tipo_termino_pago()!=-1)) {$termino_pago_proveedor->setid_tipo_termino_pago($termino_pago_proveedorOrigen->getid_tipo_termino_pago());}
			if($conDefault || ($conDefault==false && $termino_pago_proveedorOrigen->getcodigo()!=null && $termino_pago_proveedorOrigen->getcodigo()!='')) {$termino_pago_proveedor->setcodigo($termino_pago_proveedorOrigen->getcodigo());}
			if($conDefault || ($conDefault==false && $termino_pago_proveedorOrigen->getdescripcion()!=null && $termino_pago_proveedorOrigen->getdescripcion()!='')) {$termino_pago_proveedor->setdescripcion($termino_pago_proveedorOrigen->getdescripcion());}
			if($conDefault || ($conDefault==false && $termino_pago_proveedorOrigen->getmonto()!=null && $termino_pago_proveedorOrigen->getmonto()!=0.0)) {$termino_pago_proveedor->setmonto($termino_pago_proveedorOrigen->getmonto());}
			if($conDefault || ($conDefault==false && $termino_pago_proveedorOrigen->getdias()!=null && $termino_pago_proveedorOrigen->getdias()!=0)) {$termino_pago_proveedor->setdias($termino_pago_proveedorOrigen->getdias());}
			if($conDefault || ($conDefault==false && $termino_pago_proveedorOrigen->getinicial()!=null && $termino_pago_proveedorOrigen->getinicial()!=0.0)) {$termino_pago_proveedor->setinicial($termino_pago_proveedorOrigen->getinicial());}
			if($conDefault || ($conDefault==false && $termino_pago_proveedorOrigen->getcuotas()!=null && $termino_pago_proveedorOrigen->getcuotas()!=0)) {$termino_pago_proveedor->setcuotas($termino_pago_proveedorOrigen->getcuotas());}
			if($conDefault || ($conDefault==false && $termino_pago_proveedorOrigen->getdescuento_pronto_pago()!=null && $termino_pago_proveedorOrigen->getdescuento_pronto_pago()!=0.0)) {$termino_pago_proveedor->setdescuento_pronto_pago($termino_pago_proveedorOrigen->getdescuento_pronto_pago());}
			if($conDefault || ($conDefault==false && $termino_pago_proveedorOrigen->getpredeterminado()!=null && $termino_pago_proveedorOrigen->getpredeterminado()!=false)) {$termino_pago_proveedor->setpredeterminado($termino_pago_proveedorOrigen->getpredeterminado());}
			if($conDefault || ($conDefault==false && $termino_pago_proveedorOrigen->getid_cuenta()!=null && $termino_pago_proveedorOrigen->getid_cuenta()!=-1)) {$termino_pago_proveedor->setid_cuenta($termino_pago_proveedorOrigen->getid_cuenta());}
			if($conDefault || ($conDefault==false && $termino_pago_proveedorOrigen->getcuenta_contable()!=null && $termino_pago_proveedorOrigen->getcuenta_contable()!='')) {$termino_pago_proveedor->setcuenta_contable($termino_pago_proveedorOrigen->getcuenta_contable());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$termino_pago_proveedorsSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$termino_pago_proveedorsSeleccionados[]=$this->termino_pago_proveedors[$indice];
			}
		}
		
		return $termino_pago_proveedorsSeleccionados;
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
		$termino_pago_proveedor= new termino_pago_proveedor();
		
		foreach($this->termino_pago_proveedorLogic->gettermino_pago_proveedors() as $termino_pago_proveedor) {
			
		$termino_pago_proveedor->ordencompras=array();
		$termino_pago_proveedor->proveedors=array();
		$termino_pago_proveedor->creditocuentapagars=array();
		$termino_pago_proveedor->cuentapagars=array();
		$termino_pago_proveedor->cotizacions=array();
		$termino_pago_proveedor->parametroinventarios=array();
		$termino_pago_proveedor->devolucions=array();
		}		
		
		if($termino_pago_proveedor!=null);
	}
	
	public function cargarRelaciones(array $termino_pago_proveedors=array()) : array {	
		
		$termino_pago_proveedorsRespaldo = array();
		$termino_pago_proveedorsLocal = array();
		
		termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			credito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cotizacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			parametro_inventario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			devolucion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$termino_pago_proveedorsResp=array();
		$classes=array();
			
		
				$class=new Classe('orden_compra'); 	$classes[]=$class;
				$class=new Classe('proveedor'); 	$classes[]=$class;
				$class=new Classe('credito_cuenta_pagar'); 	$classes[]=$class;
				$class=new Classe('cuenta_pagar'); 	$classes[]=$class;
				$class=new Classe('cotizacion'); 	$classes[]=$class;
				$class=new Classe('parametro_inventario'); 	$classes[]=$class;
				$class=new Classe('devolucion'); 	$classes[]=$class;
			
			
		$termino_pago_proveedorsRespaldo=$this->termino_pago_proveedorLogic->gettermino_pago_proveedors();
			
		$this->termino_pago_proveedorLogic->setIsConDeep(true);
		
		$this->termino_pago_proveedorLogic->settermino_pago_proveedors($termino_pago_proveedors);
			
		$this->termino_pago_proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$termino_pago_proveedorsLocal=$this->termino_pago_proveedorLogic->gettermino_pago_proveedors();
			
		/*RESPALDO*/
		$this->termino_pago_proveedorLogic->settermino_pago_proveedors($termino_pago_proveedorsRespaldo);
			
		$this->termino_pago_proveedorLogic->setIsConDeep(false);
		
		if($termino_pago_proveedorsResp!=null);
		
		return $termino_pago_proveedorsLocal;
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
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(termino_pago_proveedor_session $termino_pago_proveedor_session) {
		$termino_pago_proveedor_session->strTypeOnLoad=$this->strTypeOnLoadtermino_pago_proveedor;
		$termino_pago_proveedor_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliartermino_pago_proveedor;
		$termino_pago_proveedor_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliartermino_pago_proveedor;
		$termino_pago_proveedor_session->bitEsPopup=$this->bitEsPopup;
		$termino_pago_proveedor_session->bitEsBusqueda=$this->bitEsBusqueda;
		$termino_pago_proveedor_session->strFuncionJs=$this->strFuncionJs;
		/*$termino_pago_proveedor_session->strSufijo=$this->strSufijo;*/
		$termino_pago_proveedor_session->bitEsRelaciones=$this->bitEsRelaciones;
		$termino_pago_proveedor_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, termino_pago_proveedor_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisosorden_compra='none';
			$this->strTienePermisosorden_compra=((Funciones::existeCadenaArray(orden_compra_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosorden_compra='table-cell';

			$this->strTienePermisosproveedor='none';
			$this->strTienePermisosproveedor=((Funciones::existeCadenaArray(proveedor_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosproveedor='table-cell';

			$this->strTienePermisoscredito_cuenta_pagar='none';
			$this->strTienePermisoscredito_cuenta_pagar=((Funciones::existeCadenaArray(credito_cuenta_pagar_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoscredito_cuenta_pagar='table-cell';

			$this->strTienePermisoscuenta_pagar='none';
			$this->strTienePermisoscuenta_pagar=((Funciones::existeCadenaArray(cuenta_pagar_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoscuenta_pagar='table-cell';

			$this->strTienePermisoscotizacion='none';
			$this->strTienePermisoscotizacion=((Funciones::existeCadenaArray(cotizacion_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoscotizacion='table-cell';

			$this->strTienePermisosparametro_inventario='none';
			$this->strTienePermisosparametro_inventario=((Funciones::existeCadenaArray(parametro_inventario_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosparametro_inventario='table-cell';

			$this->strTienePermisosdevolucion='none';
			$this->strTienePermisosdevolucion=((Funciones::existeCadenaArray(devolucion_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosdevolucion='table-cell';
		} else {
			

			$this->strTienePermisosorden_compra='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosorden_compra=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, orden_compra_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosorden_compra='table-cell';

			$this->strTienePermisosproveedor='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosproveedor=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, proveedor_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosproveedor='table-cell';

			$this->strTienePermisoscredito_cuenta_pagar='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoscredito_cuenta_pagar=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, credito_cuenta_pagar_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoscredito_cuenta_pagar='table-cell';

			$this->strTienePermisoscuenta_pagar='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoscuenta_pagar=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_pagar_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoscuenta_pagar='table-cell';

			$this->strTienePermisoscotizacion='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoscotizacion=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cotizacion_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoscotizacion='table-cell';

			$this->strTienePermisosparametro_inventario='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosparametro_inventario=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, parametro_inventario_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosparametro_inventario='table-cell';

			$this->strTienePermisosdevolucion='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosdevolucion=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, devolucion_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosdevolucion='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$termino_pago_proveedorViewAdditional=new termino_pago_proveedorView_add();
		$termino_pago_proveedorViewAdditional->termino_pago_proveedors=$this->termino_pago_proveedors;
		$termino_pago_proveedorViewAdditional->Session=$this->Session;
		
		return $termino_pago_proveedorViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$termino_pago_proveedorsLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$termino_pago_proveedorsLocal=$this->termino_pago_proveedors;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$termino_pago_proveedorsLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($termino_pago_proveedorsLocal)<=0) {
					$termino_pago_proveedorsLocal=$this->termino_pago_proveedors;
				}
			} else {
				$termino_pago_proveedorsLocal=$this->termino_pago_proveedors;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliartermino_pago_proveedorsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliartermino_pago_proveedorsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$termino_pago_proveedorLogic=new termino_pago_proveedor_logic();
		$termino_pago_proveedorLogic->settermino_pago_proveedors($this->termino_pago_proveedors);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$orden_compra_session=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME));

		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}

		$credito_cuenta_pagar_session=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME));

		if($credito_cuenta_pagar_session==null) {
			$credito_cuenta_pagar_session=new credito_cuenta_pagar_session();
		}

		$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}

		$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}

		$parametro_inventario_session=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME));

		if($parametro_inventario_session==null) {
			$parametro_inventario_session=new parametro_inventario_session();
		}

		$devolucion_session=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME));

		if($devolucion_session==null) {
			$devolucion_session=new devolucion_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_termino_pago');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$termino_pago_proveedorLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->termino_pago_proveedors=$termino_pago_proveedorLogic->gettermino_pago_proveedors();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->termino_pago_proveedorsLocal=$this->termino_pago_proveedors;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=termino_pago_proveedor_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=termino_pago_proveedor_util::$STR_TABLE_NAME;		
			
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
			
			$termino_pago_proveedors = $this->termino_pago_proveedors;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = termino_pago_proveedor_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = termino_pago_proveedor_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/cuentaspagar/presentation/templating/termino_pago_proveedor_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->termino_pago_proveedors=$termino_pago_proveedors;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->termino_pago_proveedorsLocal=$termino_pago_proveedorsLocal;
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
		
		$termino_pago_proveedorsLocal=array();
		
		$termino_pago_proveedorsLocal=$this->termino_pago_proveedors;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliartermino_pago_proveedorsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliartermino_pago_proveedorsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$termino_pago_proveedorLogic=new termino_pago_proveedor_logic();
		$termino_pago_proveedorLogic->settermino_pago_proveedors($this->termino_pago_proveedors);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$orden_compra_session=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME));

		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}

		$credito_cuenta_pagar_session=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME));

		if($credito_cuenta_pagar_session==null) {
			$credito_cuenta_pagar_session=new credito_cuenta_pagar_session();
		}

		$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}

		$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}

		$parametro_inventario_session=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME));

		if($parametro_inventario_session==null) {
			$parametro_inventario_session=new parametro_inventario_session();
		}

		$devolucion_session=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME));

		if($devolucion_session==null) {
			$devolucion_session=new devolucion_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_termino_pago');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$termino_pago_proveedorLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->termino_pago_proveedors=$termino_pago_proveedorLogic->gettermino_pago_proveedors();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$termino_pago_proveedors = $this->termino_pago_proveedors;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = termino_pago_proveedor_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = termino_pago_proveedor_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/cuentaspagar/presentation/templating/termino_pago_proveedor_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->termino_pago_proveedors=$termino_pago_proveedors;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->termino_pago_proveedorsLocal=$termino_pago_proveedorsLocal;
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
	
	public function getHtmlTablaDatosResumen(array $termino_pago_proveedors=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->termino_pago_proveedorsReporte = $termino_pago_proveedors;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliartermino_pago_proveedorsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliartermino_pago_proveedorsAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $termino_pago_proveedors=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->termino_pago_proveedorsReporte = $termino_pago_proveedors;		
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
		
		
		$this->termino_pago_proveedorsReporte=$this->cargarRelaciones($termino_pago_proveedors);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliartermino_pago_proveedorsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliartermino_pago_proveedorsAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(termino_pago_proveedor $termino_pago_proveedor=null) : string {	
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
			
			
			$termino_pago_proveedorsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$termino_pago_proveedorsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($termino_pago_proveedorsLocal)<=0) {
					/*//DEBE ESCOGER
					$termino_pago_proveedorsLocal=$this->termino_pago_proveedors;*/
				}
			} else {
				/*//DEBE ESCOGER
				$termino_pago_proveedorsLocal=$this->termino_pago_proveedors;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($termino_pago_proveedorsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($termino_pago_proveedorsLocal,true);
			
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
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}
					
			$termino_pago_proveedorsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$termino_pago_proveedorsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($termino_pago_proveedorsLocal)<=0) {
					/*//DEBE ESCOGER
					$termino_pago_proveedorsLocal=$this->termino_pago_proveedors;*/
				}
			} else {
				/*//DEBE ESCOGER
				$termino_pago_proveedorsLocal=$this->termino_pago_proveedors;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($termino_pago_proveedorsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($termino_pago_proveedorsLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Terminos Pago Proveedoreses';
			
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
			$fileName='termino_pago_proveedor';
			
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
			
			$title='Reporte de  Terminos Pago Proveedoreses';
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
			
			$title='Reporte de  Terminos Pago Proveedoreses';
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
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Terminos Pago Proveedoreses';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=termino_pago_proveedor_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->termino_pago_proveedorsAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->termino_pago_proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->termino_pago_proveedorsAuxiliar)<=0) {
					$this->termino_pago_proveedorsAuxiliar=$this->termino_pago_proveedors;
				}
			} else {
				$this->termino_pago_proveedorsAuxiliar=$this->termino_pago_proveedors;
			}
		/*} else {
			$this->termino_pago_proveedorsAuxiliar=$this->termino_pago_proveedorsReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->termino_pago_proveedorsAuxiliar as $termino_pago_proveedor) {
				$row=array();
				
				$row=termino_pago_proveedor_util::getDataReportRow($tipo,$termino_pago_proveedor,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			credito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cotizacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			parametro_inventario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			devolucion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$termino_pago_proveedorsResp=array();
			$classes=array();
			
			
				$class=new Classe('orden_compra'); 	$classes[]=$class;
				$class=new Classe('proveedor'); 	$classes[]=$class;
				$class=new Classe('credito_cuenta_pagar'); 	$classes[]=$class;
				$class=new Classe('cuenta_pagar'); 	$classes[]=$class;
				$class=new Classe('cotizacion'); 	$classes[]=$class;
				$class=new Classe('parametro_inventario'); 	$classes[]=$class;
				$class=new Classe('devolucion'); 	$classes[]=$class;
			
			
			$termino_pago_proveedorsResp=$this->termino_pago_proveedorLogic->gettermino_pago_proveedors();
			
			$this->termino_pago_proveedorLogic->setIsConDeep(true);
			
			$this->termino_pago_proveedorLogic->settermino_pago_proveedors($this->termino_pago_proveedorsAuxiliar);
			
			$this->termino_pago_proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->termino_pago_proveedorsAuxiliar=$this->termino_pago_proveedorLogic->gettermino_pago_proveedors();
			
			//RESPALDO
			$this->termino_pago_proveedorLogic->settermino_pago_proveedors($termino_pago_proveedorsResp);
			
			$this->termino_pago_proveedorLogic->setIsConDeep(false);
			*/
			
			$this->termino_pago_proveedorsAuxiliar=$this->cargarRelaciones($this->termino_pago_proveedorsAuxiliar);
			
			$i=0;
			
			foreach ($this->termino_pago_proveedorsAuxiliar as $termino_pago_proveedor) {
				$row=array();
				
				if($i!=0) {
					$row=termino_pago_proveedor_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=termino_pago_proveedor_util::getDataReportRow($tipo,$termino_pago_proveedor,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//orden_compra
				if(Funciones::existeCadenaArrayOrderBy(orden_compra_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($termino_pago_proveedor->getorden_compras())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(orden_compra_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=orden_compra_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($termino_pago_proveedor->getorden_compras() as $orden_compra) {
						$row=orden_compra_util::getDataReportRow('RELACIONADO',$orden_compra,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//proveedor
				if(Funciones::existeCadenaArrayOrderBy(proveedor_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($termino_pago_proveedor->getproveedors())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(proveedor_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=proveedor_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($termino_pago_proveedor->getproveedors() as $proveedor) {
						$row=proveedor_util::getDataReportRow('RELACIONADO',$proveedor,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//credito_cuenta_pagar
				if(Funciones::existeCadenaArrayOrderBy(credito_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($termino_pago_proveedor->getcredito_cuenta_pagars())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(credito_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=credito_cuenta_pagar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($termino_pago_proveedor->getcredito_cuenta_pagars() as $credito_cuenta_pagar) {
						$row=credito_cuenta_pagar_util::getDataReportRow('RELACIONADO',$credito_cuenta_pagar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//cuenta_pagar
				if(Funciones::existeCadenaArrayOrderBy(cuenta_pagar_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($termino_pago_proveedor->getcuenta_pagars())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cuenta_pagar_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=cuenta_pagar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($termino_pago_proveedor->getcuenta_pagars() as $cuenta_pagar) {
						$row=cuenta_pagar_util::getDataReportRow('RELACIONADO',$cuenta_pagar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//cotizacion
				if(Funciones::existeCadenaArrayOrderBy(cotizacion_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($termino_pago_proveedor->getcotizacions())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cotizacion_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=cotizacion_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($termino_pago_proveedor->getcotizacions() as $cotizacion) {
						$row=cotizacion_util::getDataReportRow('RELACIONADO',$cotizacion,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//parametro_inventario
				if(Funciones::existeCadenaArrayOrderBy(parametro_inventario_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($termino_pago_proveedor->getparametro_inventarios())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(parametro_inventario_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=parametro_inventario_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($termino_pago_proveedor->getparametro_inventarios() as $parametro_inventario) {
						$row=parametro_inventario_util::getDataReportRow('RELACIONADO',$parametro_inventario,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//devolucion
				if(Funciones::existeCadenaArrayOrderBy(devolucion_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($termino_pago_proveedor->getdevolucions())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(devolucion_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=devolucion_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($termino_pago_proveedor->getdevolucions() as $devolucion) {
						$row=devolucion_util::getDataReportRow('RELACIONADO',$devolucion,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->termino_pago_proveedorsAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->termino_pago_proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->termino_pago_proveedorsAuxiliar)<=0) {
					$this->termino_pago_proveedorsAuxiliar=$this->termino_pago_proveedors;
				}
			} else {
				$this->termino_pago_proveedorsAuxiliar=$this->termino_pago_proveedors;
			}
		/*} else {
			$this->termino_pago_proveedorsAuxiliar=$this->termino_pago_proveedorsReporte;	
		}*/
		
		foreach ($this->termino_pago_proveedorsAuxiliar as $termino_pago_proveedor) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(termino_pago_proveedor_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedor),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Tipo Termino Pago',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Termino Pago',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getid_tipo_termino_pagoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Codigo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getcodigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descripcion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getdescripcion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getmonto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Dias',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Dias',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getdias(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Inicial',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Inicial',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getinicial(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuotas',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuotas',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getcuotas(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descuento Pronto Pago',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descuento Pronto Pago',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getdescuento_pronto_pago(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Predeterminado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Predeterminado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getpredeterminado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Cuenta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getid_cuentaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuenta Contable',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Contable',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getcuenta_contable(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface termino_pago_proveedor_base_controlI {			
		
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
		public function getIndiceActual(termino_pago_proveedor $termino_pago_proveedor,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(termino_pago_proveedor $termino_pago_proveedor,array $termino_pago_proveedors);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : termino_pago_proveedor_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $termino_pago_proveedors,termino_pago_proveedor $termino_pago_proveedor);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(termino_pago_proveedor_param_return $termino_pago_proveedorReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(termino_pago_proveedor_session $termino_pago_proveedor_session);		
		public function actualizarInvitadoSessionDivStyleVariables(termino_pago_proveedor_session $termino_pago_proveedor_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(termino_pago_proveedor $termino_pago_proveedorOrigen,termino_pago_proveedor $termino_pago_proveedor,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(termino_pago_proveedor_control $termino_pago_proveedor_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $termino_pago_proveedors=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(termino_pago_proveedor_session $termino_pago_proveedor_session);		
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
		public function getHtmlTablaDatosResumen(array $termino_pago_proveedors=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $termino_pago_proveedors=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(termino_pago_proveedor $termino_pago_proveedor=null) : string;
		
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
