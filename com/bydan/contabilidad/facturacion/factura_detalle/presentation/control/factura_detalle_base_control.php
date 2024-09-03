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

namespace com\bydan\contabilidad\facturacion\factura_detalle\presentation\control;

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

use com\bydan\contabilidad\facturacion\factura_detalle\business\entity\factura_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/factura_detalle/util/factura_detalle_carga.php');
use com\bydan\contabilidad\facturacion\factura_detalle\util\factura_detalle_carga;

use com\bydan\contabilidad\facturacion\factura_detalle\util\factura_detalle_util;
use com\bydan\contabilidad\facturacion\factura_detalle\util\factura_detalle_param_return;
use com\bydan\contabilidad\facturacion\factura_detalle\business\logic\factura_detalle_logic;
use com\bydan\contabilidad\facturacion\factura_detalle\presentation\session\factura_detalle_session;


//FK


use com\bydan\contabilidad\facturacion\factura\business\entity\factura;
use com\bydan\contabilidad\facturacion\factura\business\logic\factura_logic;
use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_carga;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;
use com\bydan\contabilidad\inventario\unidad\business\logic\unidad_logic;
use com\bydan\contabilidad\inventario\unidad\util\unidad_carga;
use com\bydan\contabilidad\inventario\unidad\util\unidad_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
factura_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
factura_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
factura_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
factura_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*factura_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class factura_detalle_base_control extends factura_detalle_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->factura_detalleClase==null) {		
				$this->factura_detalleClase=new factura_detalle();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_factura')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_factura',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_bodega')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_bodega',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_producto')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_producto',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_unidad')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_unidad',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->factura_detalleClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->factura_detalleClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->factura_detalleClase->setid_factura((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_factura'));
				
				$this->factura_detalleClase->setid_bodega((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_bodega'));
				
				$this->factura_detalleClase->setid_producto((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_producto'));
				
				$this->factura_detalleClase->setid_unidad((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_unidad'));
				
				$this->factura_detalleClase->setcantidad((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'cantidad'));
				
				$this->factura_detalleClase->setprecio((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'precio'));
				
				$this->factura_detalleClase->setdescuento_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'descuento_porciento'));
				
				$this->factura_detalleClase->setdescuento_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'descuento_monto'));
				
				$this->factura_detalleClase->setsub_total((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'sub_total'));
				
				$this->factura_detalleClase->setiva_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'iva_porciento'));
				
				$this->factura_detalleClase->setiva_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'iva_monto'));
				
				$this->factura_detalleClase->settotal((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'total'));
				
				$this->factura_detalleClase->setrecibido((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'recibido'));
				
				$this->factura_detalleClase->setobservacion($this->getDataCampoFormTabla('form'.$this->strSufijo,'observacion'));
				
				$this->factura_detalleClase->setimpuesto2_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'impuesto2_porciento'));
				
				$this->factura_detalleClase->setimpuesto2_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'impuesto2_monto'));
				
				$this->factura_detalleClase->setcotizacion((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'cotizacion'));
				
				$this->factura_detalleClase->setmoneda((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'moneda'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->factura_detalleModel->set($this->factura_detalleClase);
				
				/*$this->factura_detalleModel->set($this->migrarModelfactura_detalle($this->factura_detalleClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->factura_detalleLogic->getfactura_detalle()->setId($this->factura_detalleClase->getId());	
			$this->factura_detalleLogic->getfactura_detalle()->setVersionRow($this->factura_detalleClase->getVersionRow());	
			$this->factura_detalleLogic->getfactura_detalle()->setVersionRow($this->factura_detalleClase->getVersionRow());	
			$this->factura_detalleLogic->getfactura_detalle()->setid_factura($this->factura_detalleClase->getid_factura());	
			$this->factura_detalleLogic->getfactura_detalle()->setid_bodega($this->factura_detalleClase->getid_bodega());	
			$this->factura_detalleLogic->getfactura_detalle()->setid_producto($this->factura_detalleClase->getid_producto());	
			$this->factura_detalleLogic->getfactura_detalle()->setid_unidad($this->factura_detalleClase->getid_unidad());	
			$this->factura_detalleLogic->getfactura_detalle()->setcantidad($this->factura_detalleClase->getcantidad());	
			$this->factura_detalleLogic->getfactura_detalle()->setprecio($this->factura_detalleClase->getprecio());	
			$this->factura_detalleLogic->getfactura_detalle()->setdescuento_porciento($this->factura_detalleClase->getdescuento_porciento());	
			$this->factura_detalleLogic->getfactura_detalle()->setdescuento_monto($this->factura_detalleClase->getdescuento_monto());	
			$this->factura_detalleLogic->getfactura_detalle()->setsub_total($this->factura_detalleClase->getsub_total());	
			$this->factura_detalleLogic->getfactura_detalle()->setiva_porciento($this->factura_detalleClase->getiva_porciento());	
			$this->factura_detalleLogic->getfactura_detalle()->setiva_monto($this->factura_detalleClase->getiva_monto());	
			$this->factura_detalleLogic->getfactura_detalle()->settotal($this->factura_detalleClase->gettotal());	
			$this->factura_detalleLogic->getfactura_detalle()->setrecibido($this->factura_detalleClase->getrecibido());	
			$this->factura_detalleLogic->getfactura_detalle()->setobservacion($this->factura_detalleClase->getobservacion());	
			$this->factura_detalleLogic->getfactura_detalle()->setimpuesto2_porciento($this->factura_detalleClase->getimpuesto2_porciento());	
			$this->factura_detalleLogic->getfactura_detalle()->setimpuesto2_monto($this->factura_detalleClase->getimpuesto2_monto());	
			$this->factura_detalleLogic->getfactura_detalle()->setcotizacion($this->factura_detalleClase->getcotizacion());	
			$this->factura_detalleLogic->getfactura_detalle()->setmoneda($this->factura_detalleClase->getmoneda());	
		} else {
			$this->factura_detalleClase->setId($this->factura_detalleLogic->getfactura_detalle()->getId());	
			$this->factura_detalleClase->setVersionRow($this->factura_detalleLogic->getfactura_detalle()->getVersionRow());	
			$this->factura_detalleClase->setVersionRow($this->factura_detalleLogic->getfactura_detalle()->getVersionRow());	
			$this->factura_detalleClase->setid_factura($this->factura_detalleLogic->getfactura_detalle()->getid_factura());	
			$this->factura_detalleClase->setid_bodega($this->factura_detalleLogic->getfactura_detalle()->getid_bodega());	
			$this->factura_detalleClase->setid_producto($this->factura_detalleLogic->getfactura_detalle()->getid_producto());	
			$this->factura_detalleClase->setid_unidad($this->factura_detalleLogic->getfactura_detalle()->getid_unidad());	
			$this->factura_detalleClase->setcantidad($this->factura_detalleLogic->getfactura_detalle()->getcantidad());	
			$this->factura_detalleClase->setprecio($this->factura_detalleLogic->getfactura_detalle()->getprecio());	
			$this->factura_detalleClase->setdescuento_porciento($this->factura_detalleLogic->getfactura_detalle()->getdescuento_porciento());	
			$this->factura_detalleClase->setdescuento_monto($this->factura_detalleLogic->getfactura_detalle()->getdescuento_monto());	
			$this->factura_detalleClase->setsub_total($this->factura_detalleLogic->getfactura_detalle()->getsub_total());	
			$this->factura_detalleClase->setiva_porciento($this->factura_detalleLogic->getfactura_detalle()->getiva_porciento());	
			$this->factura_detalleClase->setiva_monto($this->factura_detalleLogic->getfactura_detalle()->getiva_monto());	
			$this->factura_detalleClase->settotal($this->factura_detalleLogic->getfactura_detalle()->gettotal());	
			$this->factura_detalleClase->setrecibido($this->factura_detalleLogic->getfactura_detalle()->getrecibido());	
			$this->factura_detalleClase->setobservacion($this->factura_detalleLogic->getfactura_detalle()->getobservacion());	
			$this->factura_detalleClase->setimpuesto2_porciento($this->factura_detalleLogic->getfactura_detalle()->getimpuesto2_porciento());	
			$this->factura_detalleClase->setimpuesto2_monto($this->factura_detalleLogic->getfactura_detalle()->getimpuesto2_monto());	
			$this->factura_detalleClase->setcotizacion($this->factura_detalleLogic->getfactura_detalle()->getcotizacion());	
			$this->factura_detalleClase->setmoneda($this->factura_detalleLogic->getfactura_detalle()->getmoneda());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->factura_detalleModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_factura') {$this->strMensajeid_factura=$strMensajeCampo;}
		if($strNombreCampo=='id_bodega') {$this->strMensajeid_bodega=$strMensajeCampo;}
		if($strNombreCampo=='id_producto') {$this->strMensajeid_producto=$strMensajeCampo;}
		if($strNombreCampo=='id_unidad') {$this->strMensajeid_unidad=$strMensajeCampo;}
		if($strNombreCampo=='cantidad') {$this->strMensajecantidad=$strMensajeCampo;}
		if($strNombreCampo=='precio') {$this->strMensajeprecio=$strMensajeCampo;}
		if($strNombreCampo=='descuento_porciento') {$this->strMensajedescuento_porciento=$strMensajeCampo;}
		if($strNombreCampo=='descuento_monto') {$this->strMensajedescuento_monto=$strMensajeCampo;}
		if($strNombreCampo=='sub_total') {$this->strMensajesub_total=$strMensajeCampo;}
		if($strNombreCampo=='iva_porciento') {$this->strMensajeiva_porciento=$strMensajeCampo;}
		if($strNombreCampo=='iva_monto') {$this->strMensajeiva_monto=$strMensajeCampo;}
		if($strNombreCampo=='total') {$this->strMensajetotal=$strMensajeCampo;}
		if($strNombreCampo=='recibido') {$this->strMensajerecibido=$strMensajeCampo;}
		if($strNombreCampo=='observacion') {$this->strMensajeobservacion=$strMensajeCampo;}
		if($strNombreCampo=='impuesto2_porciento') {$this->strMensajeimpuesto2_porciento=$strMensajeCampo;}
		if($strNombreCampo=='impuesto2_monto') {$this->strMensajeimpuesto2_monto=$strMensajeCampo;}
		if($strNombreCampo=='cotizacion') {$this->strMensajecotizacion=$strMensajeCampo;}
		if($strNombreCampo=='moneda') {$this->strMensajemoneda=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_factura='';
		$this->strMensajeid_bodega='';
		$this->strMensajeid_producto='';
		$this->strMensajeid_unidad='';
		$this->strMensajecantidad='';
		$this->strMensajeprecio='';
		$this->strMensajedescuento_porciento='';
		$this->strMensajedescuento_monto='';
		$this->strMensajesub_total='';
		$this->strMensajeiva_porciento='';
		$this->strMensajeiva_monto='';
		$this->strMensajetotal='';
		$this->strMensajerecibido='';
		$this->strMensajeobservacion='';
		$this->strMensajeimpuesto2_porciento='';
		$this->strMensajeimpuesto2_monto='';
		$this->strMensajecotizacion='';
		$this->strMensajemoneda='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->commitNewConnexionToDeep();
				$this->factura_detalleLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->rollbackNewConnexionToDeep();
				$this->factura_detalleLogic->closeNewConnexionToDeep();
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
				$this->factura_detalleLogic->getNewConnexionToDeep();
			}

			$factura_detalle_session=unserialize($this->Session->read(factura_detalle_util::$STR_SESSION_NAME));
						
			if($factura_detalle_session==null) {
				$factura_detalle_session=new factura_detalle_session();
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
						$this->factura_detalleLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->factura_detalleActual =$this->factura_detalleClase;
			
			/*$this->factura_detalleActual =$this->migrarModelfactura_detalle($this->factura_detalleClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->commitNewConnexionToDeep();
				$this->factura_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->factura_detalleLogic->getfactura_detalles(),$this->factura_detalleActual);
			
			$this->actualizarControllerConReturnGeneral($this->factura_detalleReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->rollbackNewConnexionToDeep();
				$this->factura_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->getNewConnexionToDeep();
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
				$this->factura_detalleLogic->commitNewConnexionToDeep();
				$this->factura_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->rollbackNewConnexionToDeep();
				$this->factura_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$factura_detallesLocal=$this->getListaActual();
		
		$iIndice=factura_detalle_util::getIndiceNuevo($factura_detallesLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(factura_detalle $factura_detalle,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$factura_detallesLocal=$this->getListaActual();
		
		$iIndice=factura_detalle_util::getIndiceActual($factura_detallesLocal,$factura_detalle,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevofactura_detalle')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->factura_detalleActual =$this->factura_detalleClase;
			
			/*$this->factura_detalleActual =$this->migrarModelfactura_detalle($this->factura_detalleClase);*/
			
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
			
			$this->factura_detalleLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('factura');$classes[]=$class;
				$class=new Classe('bodega');$classes[]=$class;
				$class=new Classe('producto');$classes[]=$class;
				$class=new Classe('unidad');$classes[]=$class;
			
			$this->factura_detalleLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->factura_detalleLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->factura_detalleLogic->setfactura_detalle(new factura_detalle());
				
				$this->factura_detalleLogic->getfactura_detalle()->setIsNew(true);
				$this->factura_detalleLogic->getfactura_detalle()->setIsChanged(true);
				$this->factura_detalleLogic->getfactura_detalle()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->factura_detalleModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->factura_detalleLogic->factura_detalles[]=$this->factura_detalleLogic->getfactura_detalle();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->factura_detalleLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->factura_detalleLogic->saveRelaciones($this->factura_detalleLogic->getfactura_detalle());/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->factura_detalleLogic->getfactura_detalle()->setIsChanged(true);
				$this->factura_detalleLogic->getfactura_detalle()->setIsNew(false);
				$this->factura_detalleLogic->getfactura_detalle()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->factura_detalleModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->factura_detalleLogic->getfactura_detalle(),$this->factura_detalleLogic->getfactura_detalles());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->factura_detalleLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->factura_detalleLogic->saveRelaciones($this->factura_detalleLogic->getfactura_detalle());/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->factura_detalleLogic->getfactura_detalle()->setIsDeleted(true);
				$this->factura_detalleLogic->getfactura_detalle()->setIsNew(false);
				$this->factura_detalleLogic->getfactura_detalle()->setIsChanged(false);				
				
				$this->actualizarLista($this->factura_detalleLogic->getfactura_detalle(),$this->factura_detalleLogic->getfactura_detalles());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->factura_detalleLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->factura_detalleLogic->saveRelaciones($this->factura_detalleLogic->getfactura_detalle());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->factura_detallesEliminados[]=$this->factura_detalleLogic->getfactura_detalle();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->factura_detalleLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->factura_detalleLogic->saveRelaciones($this->factura_detalleLogic->getfactura_detalle());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->factura_detallesEliminados=array();
				}
			}
			
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('factura');$classes[]=$class;
				$class=new Classe('bodega');$classes[]=$class;
				$class=new Classe('producto');$classes[]=$class;
				$class=new Classe('unidad');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->factura_detalleLogic->setfactura_detalles();*/
					
					$this->factura_detalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->factura_detalleLogic->setIsConDeepLoad(false);
			
			$this->factura_detalles=$this->factura_detalleLogic->getfactura_detalles();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(factura_detalle_util::$STR_SESSION_NAME.'Lista',serialize($this->factura_detalles));
				$this->Session->write(factura_detalle_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->factura_detallesEliminados));
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
				$this->factura_detalleLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->commitNewConnexionToDeep();
				$this->factura_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->rollbackNewConnexionToDeep();
				$this->factura_detalleLogic->closeNewConnexionToDeep();
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
				$this->factura_detalleLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalfactura_detalle;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->factura_detalleLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->factura_detalles as $factura_detalleLocal) {
				if($this->factura_detalleLogic->getfactura_detalle()->getId()==$factura_detalleLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->factura_detalleLogic->getfactura_detalle()->setIsDeleted(true);
			$this->factura_detallesEliminados[]=$this->factura_detalleLogic->getfactura_detalle();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->factura_detalles[$indice]);
				
				$this->factura_detalles = array_values($this->factura_detalles);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelfactura_detalle($this->factura_detalleClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->commitNewConnexionToDeep();
				$this->factura_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->rollbackNewConnexionToDeep();
				$this->factura_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(factura_detalle $factura_detalle,array $factura_detalles) {
		try {
			foreach($factura_detalles as $factura_detalleLocal){ 
				if($factura_detalleLocal->getId()==$factura_detalle->getId()) {
					$factura_detalleLocal->setIsChanged($factura_detalle->getIsChanged());
					$factura_detalleLocal->setIsNew($factura_detalle->getIsNew());
					$factura_detalleLocal->setIsDeleted($factura_detalle->getIsDeleted());
					//$factura_detalleLocal->setbitExpired($factura_detalle->getbitExpired());
					
					$factura_detalleLocal->setId($factura_detalle->getId());	
					$factura_detalleLocal->setVersionRow($factura_detalle->getVersionRow());	
					$factura_detalleLocal->setVersionRow($factura_detalle->getVersionRow());	
					$factura_detalleLocal->setid_factura($factura_detalle->getid_factura());	
					$factura_detalleLocal->setid_bodega($factura_detalle->getid_bodega());	
					$factura_detalleLocal->setid_producto($factura_detalle->getid_producto());	
					$factura_detalleLocal->setid_unidad($factura_detalle->getid_unidad());	
					$factura_detalleLocal->setcantidad($factura_detalle->getcantidad());	
					$factura_detalleLocal->setprecio($factura_detalle->getprecio());	
					$factura_detalleLocal->setdescuento_porciento($factura_detalle->getdescuento_porciento());	
					$factura_detalleLocal->setdescuento_monto($factura_detalle->getdescuento_monto());	
					$factura_detalleLocal->setsub_total($factura_detalle->getsub_total());	
					$factura_detalleLocal->setiva_porciento($factura_detalle->getiva_porciento());	
					$factura_detalleLocal->setiva_monto($factura_detalle->getiva_monto());	
					$factura_detalleLocal->settotal($factura_detalle->gettotal());	
					$factura_detalleLocal->setrecibido($factura_detalle->getrecibido());	
					$factura_detalleLocal->setobservacion($factura_detalle->getobservacion());	
					$factura_detalleLocal->setimpuesto2_porciento($factura_detalle->getimpuesto2_porciento());	
					$factura_detalleLocal->setimpuesto2_monto($factura_detalle->getimpuesto2_monto());	
					$factura_detalleLocal->setcotizacion($factura_detalle->getcotizacion());	
					$factura_detalleLocal->setmoneda($factura_detalle->getmoneda());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$factura_detallesLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$factura_detallesLocal=$this->factura_detalleLogic->getfactura_detalles();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$factura_detallesLocal=$this->factura_detalles;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $factura_detallesLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->factura_detalleLogic->getfactura_detalles() as $factura_detalle) {
				if($factura_detalle->getId()==$id) {
					$this->factura_detalleLogic->setfactura_detalle($factura_detalle);
					
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
		/*$factura_detallesSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->factura_detalles as $factura_detalle) {
			$factura_detalle->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->factura_detalles[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : factura_detalle_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$factura_detalle_session=unserialize($this->Session->read(factura_detalle_util::$STR_SESSION_NAME));
						
		if($factura_detalle_session==null) {
			$factura_detalle_session=new factura_detalle_session();
		}
		
		
		$this->factura_detalleReturnGeneral=new factura_detalle_param_return();
		$this->factura_detalleParameterGeneral=new factura_detalle_param_return();
			
		$this->factura_detalleParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualfactura_detalle(this.factura_detalle,true);
			this.setVariablesFormularioToObjetoActualForeignKeysfactura_detalle(this.factura_detalle);*/
			
			if($factura_detalle_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualfactura_detalle(this.factura_detalle,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->factura_detalleActual=$this->factura_detalleClase;
				
				$this->setCopiarVariablesObjetos($this->factura_detalleActual,$this->factura_detalle,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->factura_detalleReturnGeneral=$this->factura_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->factura_detalleLogic->getfactura_detalles(),$this->factura_detalle,$this->factura_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($factura_detalle_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanfactura_detalle($classes,$this->factura_detalleReturnGeneral,$this->factura_detalleBean,false);*/
				}
					
				if($this->factura_detalleReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->factura_detalleReturnGeneral->getfactura_detalle(),$this->factura_detalleActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeyfactura_detalle($this->factura_detalleReturnGeneral->getfactura_detalle());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariofactura_detalle($this->factura_detalleReturnGeneral->getfactura_detalle());*/
				}
					
				if($this->factura_detalleReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->factura_detalleReturnGeneral->getfactura_detalle(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->factura_detalle,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(factura_detalleJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualfactura_detalle(this.factura_detalle,true);
				this.setVariablesFormularioToObjetoActualForeignKeysfactura_detalle(this.factura_detalle);				
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
				
				if($this->factura_detalleAnterior!=null) {
					$this->factura_detalle=$this->factura_detalleAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->factura_detalleReturnGeneral=$this->factura_detalleLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->factura_detalleLogic->getfactura_detalles(),$this->factura_detalle,$this->factura_detalleParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->factura_detalleReturnGeneral->getfactura_detalle(),$this->factura_detalleLogic->getfactura_detalles());
			*/
		}
		
		return $this->factura_detalleReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->getNewConnexionToDeep();
			}

			$this->factura_detalleReturnGeneral=new factura_detalle_param_return();			
			$this->factura_detalleParameterGeneral=new factura_detalle_param_return();
			
			$this->factura_detalleParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->factura_detalleReturnGeneral=$this->factura_detalleLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->factura_detalles,$this->factura_detalleParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->factura_detalleReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->factura_detalleReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->commitNewConnexionToDeep();
				$this->factura_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->factura_detalleReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->rollbackNewConnexionToDeep();
				$this->factura_detalleLogic->closeNewConnexionToDeep();
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
		
		$this->factura_detalleReturnGeneral=new factura_detalle_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_factura_detalle') {
		    $sDominio='factura_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		if($sTipoControl=='id_bodega' || $sTipoControl=='form-id_bodega' || $sTipoControl=='form_factura_detalle-id_bodega') {
			$sDominio='factura_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$CONTROL_CHANGE;	$controlTipo=ControlTipo::$COMBOBOX;
			$eventoTipo=EventoTipo::$CHANGE;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='COMBOBOX';
			$classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		 else if($sTipoControl=='id_producto' || $sTipoControl=='form-id_producto' || $sTipoControl=='form_factura_detalle-id_producto') {
			$sDominio='factura_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$CONTROL_CHANGE;	$controlTipo=ControlTipo::$COMBOBOX;
			$eventoTipo=EventoTipo::$CHANGE;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='COMBOBOX';
			$classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		 else if($sTipoControl=='cantidad' || $sTipoControl=='form-cantidad' || $sTipoControl=='form_factura_detalle-cantidad') {
			$sDominio='factura_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$CONTROL_CHANGE;	$controlTipo=ControlTipo::$TEXTBOX;
			$eventoTipo=EventoTipo::$CHANGE;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='TEXTBOX';
			$classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		 else if($sTipoControl=='precio' || $sTipoControl=='form-precio' || $sTipoControl=='form_factura_detalle-precio') {
			$sDominio='factura_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$CONTROL_CHANGE;	$controlTipo=ControlTipo::$TEXTBOX;
			$eventoTipo=EventoTipo::$CHANGE;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='TEXTBOX';
			$classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		 else if($sTipoControl=='descuento_porciento' || $sTipoControl=='form-descuento_porciento' || $sTipoControl=='form_factura_detalle-descuento_porciento') {
			$sDominio='factura_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$CONTROL_CHANGE;	$controlTipo=ControlTipo::$TEXTBOX;
			$eventoTipo=EventoTipo::$CHANGE;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='TEXTBOX';
			$classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		 else if($sTipoControl=='iva_porciento' || $sTipoControl=='form-iva_porciento' || $sTipoControl=='form_factura_detalle-iva_porciento') {
			$sDominio='factura_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$CONTROL_CHANGE;	$controlTipo=ControlTipo::$TEXTBOX;
			$eventoTipo=EventoTipo::$CHANGE;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='TEXTBOX';
			$classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->factura_detalleReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->factura_detalleReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='factura_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='factura_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='factura_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->factura_detalleReturnGeneral=new factura_detalle_param_return();
		$this->factura_detalleParameterGeneral=new factura_detalle_param_return();
			
		$this->factura_detalleParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->factura_detalleReturnGeneral=$this->factura_detalleLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->factura_detalleLogic->getfactura_detalles(),$this->factura_detalle,$this->factura_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->factura_detalleReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->factura_detalleReturnGeneral->getfactura_detalle(),$classes);*/
		}									
	
		if($this->factura_detalleReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->factura_detalleReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->factura_detalleReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $factura_detalles,factura_detalle $factura_detalle) {
		
		$factura_detalle_session=unserialize($this->Session->read(factura_detalle_util::$STR_SESSION_NAME));
						
		if($factura_detalle_session==null) {
			$factura_detalle_session=new factura_detalle_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(factura_detalle_util::$CLASSNAME);
			}	
			*/
			
			$this->factura_detalleReturnGeneral=new factura_detalle_param_return();
			$this->factura_detalleParameterGeneral=new factura_detalle_param_return();
			
			$this->factura_detalleParameterGeneral->setdata($this->data);
		
		
			
		if($factura_detalle_session->conGuardarRelaciones) {
			$classes=factura_detalle_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->factura_detalleActual,$this->factura_detalle,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->factura_detalleReturnGeneral=$this->factura_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->factura_detalleLogic->getfactura_detalles(),$this->factura_detalleActual,$this->factura_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->factura_detalleReturnGeneral=$this->factura_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$factura_detalles,$factura_detalle,$this->factura_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelfactura_detalle($this->factura_detalleLogic->getfactura_detalle());*/
			
			$this->factura_detalle=$this->factura_detalleLogic->getfactura_detalle();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->factura_detalle);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->commitNewConnexionToDeep();
				$this->factura_detalleLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->rollbackNewConnexionToDeep();
				$this->factura_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$factura_detalleActual=new factura_detalle();
			
			if($this->factura_detalleClase==null) {		
				$this->factura_detalleClase=new factura_detalle();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$factura_detalleActual=$this->factura_detalles[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $factura_detalleActual->setid_factura((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $factura_detalleActual->setid_bodega((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $factura_detalleActual->setid_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $factura_detalleActual->setid_unidad((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $factura_detalleActual->setcantidad((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $factura_detalleActual->setprecio((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $factura_detalleActual->setdescuento_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $factura_detalleActual->setdescuento_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $factura_detalleActual->setsub_total((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $factura_detalleActual->setiva_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $factura_detalleActual->setiva_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $factura_detalleActual->settotal((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $factura_detalleActual->setrecibido((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $factura_detalleActual->setobservacion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $factura_detalleActual->setimpuesto2_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $factura_detalleActual->setimpuesto2_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $factura_detalleActual->setcotizacion((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $factura_detalleActual->setmoneda((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }

				$this->factura_detalleClase=$factura_detalleActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->factura_detalleModel->set($this->factura_detalleClase);
				
				/*$this->factura_detalleModel->set($this->migrarModelfactura_detalle($this->factura_detalleClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->factura_detalles=$this->migrarModelfactura_detalle($this->factura_detalleLogic->getfactura_detalles());							
		$this->factura_detalles=$this->factura_detalleLogic->getfactura_detalles();*/
		
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
			$this->Session->write(factura_detalle_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$factura_detalle_control_session=unserialize($this->Session->read(factura_detalle_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($factura_detalle_control_session==null) {
				$factura_detalle_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($factura_detalle_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(factura_detalle_util::$STR_SESSION_NAME,$this);*/
		} else {
			$factura_detalle_session=unserialize($this->Session->read(factura_detalle_util::$STR_SESSION_NAME));
			
			if($factura_detalle_session==null) {
				$factura_detalle_session=new factura_detalle_session();
			}
			
			$this->set(factura_detalle_util::$STR_SESSION_NAME, $factura_detalle_session);
		}
	}
	
	public function setCopiarVariablesObjetos(factura_detalle $factura_detalleOrigen,factura_detalle $factura_detalle,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($factura_detalle==null) {
				$factura_detalle=new factura_detalle();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $factura_detalleOrigen->getId()!=null && $factura_detalleOrigen->getId()!=0)) {$factura_detalle->setId($factura_detalleOrigen->getId());}}
			if($conDefault || ($conDefault==false && $factura_detalleOrigen->getid_factura()!=null && $factura_detalleOrigen->getid_factura()!=-1)) {$factura_detalle->setid_factura($factura_detalleOrigen->getid_factura());}
			if($conDefault || ($conDefault==false && $factura_detalleOrigen->getid_bodega()!=null && $factura_detalleOrigen->getid_bodega()!=-1)) {$factura_detalle->setid_bodega($factura_detalleOrigen->getid_bodega());}
			if($conDefault || ($conDefault==false && $factura_detalleOrigen->getid_producto()!=null && $factura_detalleOrigen->getid_producto()!=-1)) {$factura_detalle->setid_producto($factura_detalleOrigen->getid_producto());}
			if($conDefault || ($conDefault==false && $factura_detalleOrigen->getid_unidad()!=null && $factura_detalleOrigen->getid_unidad()!=-1)) {$factura_detalle->setid_unidad($factura_detalleOrigen->getid_unidad());}
			if($conDefault || ($conDefault==false && $factura_detalleOrigen->getcantidad()!=null && $factura_detalleOrigen->getcantidad()!=0.0)) {$factura_detalle->setcantidad($factura_detalleOrigen->getcantidad());}
			if($conDefault || ($conDefault==false && $factura_detalleOrigen->getprecio()!=null && $factura_detalleOrigen->getprecio()!=0.0)) {$factura_detalle->setprecio($factura_detalleOrigen->getprecio());}
			if($conDefault || ($conDefault==false && $factura_detalleOrigen->getdescuento_porciento()!=null && $factura_detalleOrigen->getdescuento_porciento()!=0.0)) {$factura_detalle->setdescuento_porciento($factura_detalleOrigen->getdescuento_porciento());}
			if($conDefault || ($conDefault==false && $factura_detalleOrigen->getdescuento_monto()!=null && $factura_detalleOrigen->getdescuento_monto()!=0.0)) {$factura_detalle->setdescuento_monto($factura_detalleOrigen->getdescuento_monto());}
			if($conDefault || ($conDefault==false && $factura_detalleOrigen->getsub_total()!=null && $factura_detalleOrigen->getsub_total()!=0.0)) {$factura_detalle->setsub_total($factura_detalleOrigen->getsub_total());}
			if($conDefault || ($conDefault==false && $factura_detalleOrigen->getiva_porciento()!=null && $factura_detalleOrigen->getiva_porciento()!=0.0)) {$factura_detalle->setiva_porciento($factura_detalleOrigen->getiva_porciento());}
			if($conDefault || ($conDefault==false && $factura_detalleOrigen->getiva_monto()!=null && $factura_detalleOrigen->getiva_monto()!=0.0)) {$factura_detalle->setiva_monto($factura_detalleOrigen->getiva_monto());}
			if($conDefault || ($conDefault==false && $factura_detalleOrigen->gettotal()!=null && $factura_detalleOrigen->gettotal()!=0.0)) {$factura_detalle->settotal($factura_detalleOrigen->gettotal());}
			if($conDefault || ($conDefault==false && $factura_detalleOrigen->getrecibido()!=null && $factura_detalleOrigen->getrecibido()!=0.0)) {$factura_detalle->setrecibido($factura_detalleOrigen->getrecibido());}
			if($conDefault || ($conDefault==false && $factura_detalleOrigen->getobservacion()!=null && $factura_detalleOrigen->getobservacion()!='')) {$factura_detalle->setobservacion($factura_detalleOrigen->getobservacion());}
			if($conDefault || ($conDefault==false && $factura_detalleOrigen->getimpuesto2_porciento()!=null && $factura_detalleOrigen->getimpuesto2_porciento()!=0.0)) {$factura_detalle->setimpuesto2_porciento($factura_detalleOrigen->getimpuesto2_porciento());}
			if($conDefault || ($conDefault==false && $factura_detalleOrigen->getimpuesto2_monto()!=null && $factura_detalleOrigen->getimpuesto2_monto()!=0.0)) {$factura_detalle->setimpuesto2_monto($factura_detalleOrigen->getimpuesto2_monto());}
			if($conDefault || ($conDefault==false && $factura_detalleOrigen->getcotizacion()!=null && $factura_detalleOrigen->getcotizacion()!=0.0)) {$factura_detalle->setcotizacion($factura_detalleOrigen->getcotizacion());}
			if($conDefault || ($conDefault==false && $factura_detalleOrigen->getmoneda()!=null && $factura_detalleOrigen->getmoneda()!=0)) {$factura_detalle->setmoneda($factura_detalleOrigen->getmoneda());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$factura_detallesSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$factura_detallesSeleccionados[]=$this->factura_detalles[$indice];
			}
		}
		
		return $factura_detallesSeleccionados;
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
		$factura_detalle= new factura_detalle();
		
		foreach($this->factura_detalleLogic->getfactura_detalles() as $factura_detalle) {
			
		}		
		
		if($factura_detalle!=null);
	}
	
	public function cargarRelaciones(array $factura_detalles=array()) : array {	
		
		$factura_detallesRespaldo = array();
		$factura_detallesLocal = array();
		
		factura_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$factura_detallesResp=array();
		$classes=array();
			
		
			
			
		$factura_detallesRespaldo=$this->factura_detalleLogic->getfactura_detalles();
			
		$this->factura_detalleLogic->setIsConDeep(true);
		
		$this->factura_detalleLogic->setfactura_detalles($factura_detalles);
			
		$this->factura_detalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$factura_detallesLocal=$this->factura_detalleLogic->getfactura_detalles();
			
		/*RESPALDO*/
		$this->factura_detalleLogic->setfactura_detalles($factura_detallesRespaldo);
			
		$this->factura_detalleLogic->setIsConDeep(false);
		
		if($factura_detallesResp!=null);
		
		return $factura_detallesLocal;
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
				$this->factura_detalleLogic->rollbackNewConnexionToDeep();
				$this->factura_detalleLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(factura_detalle_session $factura_detalle_session) {
		$factura_detalle_session->strTypeOnLoad=$this->strTypeOnLoadfactura_detalle;
		$factura_detalle_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarfactura_detalle;
		$factura_detalle_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarfactura_detalle;
		$factura_detalle_session->bitEsPopup=$this->bitEsPopup;
		$factura_detalle_session->bitEsBusqueda=$this->bitEsBusqueda;
		$factura_detalle_session->strFuncionJs=$this->strFuncionJs;
		/*$factura_detalle_session->strSufijo=$this->strSufijo;*/
		$factura_detalle_session->bitEsRelaciones=$this->bitEsRelaciones;
		$factura_detalle_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, factura_detalle_util::$STR_NOMBRE_CLASE,0,false,false);				
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
		$factura_detalleViewAdditional=new factura_detalleView_add();
		$factura_detalleViewAdditional->factura_detalles=$this->factura_detalles;
		$factura_detalleViewAdditional->Session=$this->Session;
		
		return $factura_detalleViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$factura_detallesLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$factura_detallesLocal=$this->factura_detalles;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$factura_detallesLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($factura_detallesLocal)<=0) {
					$factura_detallesLocal=$this->factura_detalles;
				}
			} else {
				$factura_detallesLocal=$this->factura_detalles;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarfactura_detallesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarfactura_detallesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$factura_detalleLogic=new factura_detalle_logic();
		$factura_detalleLogic->setfactura_detalles($this->factura_detalles);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		 
			
		
			$class=new Classe('factura');$classes[]=$class;
			$class=new Classe('bodega');$classes[]=$class;
			$class=new Classe('producto');$classes[]=$class;
			$class=new Classe('unidad');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$factura_detalleLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->factura_detalles=$factura_detalleLogic->getfactura_detalles();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->factura_detallesLocal=$this->factura_detalles;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=factura_detalle_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=factura_detalle_util::$STR_TABLE_NAME;		
			
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
			
			$factura_detalles = $this->factura_detalles;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = factura_detalle_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = factura_detalle_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/facturacion/presentation/templating/factura_detalle_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->factura_detalles=$factura_detalles;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->factura_detallesLocal=$factura_detallesLocal;
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
		
		$factura_detallesLocal=array();
		
		$factura_detallesLocal=$this->factura_detalles;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarfactura_detallesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarfactura_detallesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$factura_detalleLogic=new factura_detalle_logic();
		$factura_detalleLogic->setfactura_detalles($this->factura_detalles);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		 
			
		
			$class=new Classe('factura');$classes[]=$class;
			$class=new Classe('bodega');$classes[]=$class;
			$class=new Classe('producto');$classes[]=$class;
			$class=new Classe('unidad');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$factura_detalleLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->factura_detalles=$factura_detalleLogic->getfactura_detalles();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$factura_detalles = $this->factura_detalles;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = factura_detalle_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = factura_detalle_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/facturacion/presentation/templating/factura_detalle_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->factura_detalles=$factura_detalles;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->factura_detallesLocal=$factura_detallesLocal;
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
	
	public function getHtmlTablaDatosResumen(array $factura_detalles=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->factura_detallesReporte = $factura_detalles;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarfactura_detallesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarfactura_detallesAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $factura_detalles=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->factura_detallesReporte = $factura_detalles;		
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
		
		
		$this->factura_detallesReporte=$this->cargarRelaciones($factura_detalles);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarfactura_detallesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarfactura_detallesAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(factura_detalle $factura_detalle=null) : string {	
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
			
			
			$factura_detallesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$factura_detallesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($factura_detallesLocal)<=0) {
					/*//DEBE ESCOGER
					$factura_detallesLocal=$this->factura_detalles;*/
				}
			} else {
				/*//DEBE ESCOGER
				$factura_detallesLocal=$this->factura_detalles;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($factura_detallesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($factura_detallesLocal,true);
			
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
				$this->factura_detalleLogic->getNewConnexionToDeep();
			}
					
			$factura_detallesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$factura_detallesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($factura_detallesLocal)<=0) {
					/*//DEBE ESCOGER
					$factura_detallesLocal=$this->factura_detalles;*/
				}
			} else {
				/*//DEBE ESCOGER
				$factura_detallesLocal=$this->factura_detalles;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($factura_detallesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($factura_detallesLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->commitNewConnexionToDeep();
				$this->factura_detalleLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->rollbackNewConnexionToDeep();
				$this->factura_detalleLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Factura Detalles';
			
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
			$fileName='factura_detalle';
			
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
			
			$title='Reporte de  Factura Detalles';
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
			
			$title='Reporte de  Factura Detalles';
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
				$this->factura_detalleLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Factura Detalles';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->commitNewConnexionToDeep();
				$this->factura_detalleLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_detalleLogic->rollbackNewConnexionToDeep();
				$this->factura_detalleLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=factura_detalle_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->factura_detallesAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->factura_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->factura_detallesAuxiliar)<=0) {
					$this->factura_detallesAuxiliar=$this->factura_detalles;
				}
			} else {
				$this->factura_detallesAuxiliar=$this->factura_detalles;
			}
		/*} else {
			$this->factura_detallesAuxiliar=$this->factura_detallesReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->factura_detallesAuxiliar as $factura_detalle) {
				$row=array();
				
				$row=factura_detalle_util::getDataReportRow($tipo,$factura_detalle,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			factura_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$factura_detallesResp=array();
			$classes=array();
			
			
			
			
			$factura_detallesResp=$this->factura_detalleLogic->getfactura_detalles();
			
			$this->factura_detalleLogic->setIsConDeep(true);
			
			$this->factura_detalleLogic->setfactura_detalles($this->factura_detallesAuxiliar);
			
			$this->factura_detalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->factura_detallesAuxiliar=$this->factura_detalleLogic->getfactura_detalles();
			
			//RESPALDO
			$this->factura_detalleLogic->setfactura_detalles($factura_detallesResp);
			
			$this->factura_detalleLogic->setIsConDeep(false);
			*/
			
			$this->factura_detallesAuxiliar=$this->cargarRelaciones($this->factura_detallesAuxiliar);
			
			$i=0;
			
			foreach ($this->factura_detallesAuxiliar as $factura_detalle) {
				$row=array();
				
				if($i!=0) {
					$row=factura_detalle_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=factura_detalle_util::getDataReportRow($tipo,$factura_detalle,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
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
		$this->factura_detallesAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->factura_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->factura_detallesAuxiliar)<=0) {
					$this->factura_detallesAuxiliar=$this->factura_detalles;
				}
			} else {
				$this->factura_detallesAuxiliar=$this->factura_detalles;
			}
		/*} else {
			$this->factura_detallesAuxiliar=$this->factura_detallesReporte;	
		}*/
		
		foreach ($this->factura_detallesAuxiliar as $factura_detalle) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(factura_detalle_util::getfactura_detalleDescripcion($factura_detalle),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Factura',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Factura',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_detalle->getid_facturaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Bodega',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Bodega',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_detalle->getid_bodegaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Producto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Producto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_detalle->getid_productoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Unidad',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Unidad',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_detalle->getid_unidadDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cantidad',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cantidad',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_detalle->getcantidad(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Precio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Precio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_detalle->getprecio(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descuento %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descuento %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_detalle->getdescuento_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descuento Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descuento Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_detalle->getdescuento_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Sub Total',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sub Total',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_detalle->getsub_total(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Iva %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Iva %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_detalle->getiva_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Iva',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Iva',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_detalle->getiva_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Total',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Total',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_detalle->gettotal(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('No Recibidos',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('No Recibidos',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_detalle->getrecibido(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Observacion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Observacion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_detalle->getobservacion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impuesto2 %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto2 %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_detalle->getimpuesto2_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impuesto2 Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto2 Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_detalle->getimpuesto2_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cotizacion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cotizacion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_detalle->getcotizacion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Moneda',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Moneda',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_detalle->getmoneda(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface factura_detalle_base_controlI {			
		
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
		public function getIndiceActual(factura_detalle $factura_detalle,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(factura_detalle $factura_detalle,array $factura_detalles);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : factura_detalle_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $factura_detalles,factura_detalle $factura_detalle);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(factura_detalle_param_return $factura_detalleReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(factura_detalle_session $factura_detalle_session);		
		public function actualizarInvitadoSessionDivStyleVariables(factura_detalle_session $factura_detalle_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(factura_detalle $factura_detalleOrigen,factura_detalle $factura_detalle,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(factura_detalle_control $factura_detalle_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $factura_detalles=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(factura_detalle_session $factura_detalle_session);		
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
		public function getHtmlTablaDatosResumen(array $factura_detalles=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $factura_detalles=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(factura_detalle $factura_detalle=null) : string;
		
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
