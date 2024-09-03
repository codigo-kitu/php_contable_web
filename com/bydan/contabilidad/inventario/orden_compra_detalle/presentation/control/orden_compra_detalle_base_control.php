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

namespace com\bydan\contabilidad\inventario\orden_compra_detalle\presentation\control;

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

use com\bydan\contabilidad\inventario\orden_compra_detalle\business\entity\orden_compra_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/orden_compra_detalle/util/orden_compra_detalle_carga.php');
use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_carga;

use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_util;
use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_param_return;
use com\bydan\contabilidad\inventario\orden_compra_detalle\business\logic\orden_compra_detalle_logic;
use com\bydan\contabilidad\inventario\orden_compra_detalle\business\logic\orden_compra_detalle_logic_add;
use com\bydan\contabilidad\inventario\orden_compra_detalle\presentation\session\orden_compra_detalle_session;


//FK


use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;
use com\bydan\contabilidad\inventario\orden_compra\business\logic\orden_compra_logic;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;

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
orden_compra_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
orden_compra_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
orden_compra_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
orden_compra_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*orden_compra_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class orden_compra_detalle_base_control extends orden_compra_detalle_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->orden_compra_detalleClase==null) {		
				$this->orden_compra_detalleClase=new orden_compra_detalle();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_orden_compra')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_orden_compra',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_bodega')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_bodega',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_producto')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_producto',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_unidad')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_unidad',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->orden_compra_detalleClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->orden_compra_detalleClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->orden_compra_detalleClase->setid_orden_compra((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_orden_compra'));
				
				$this->orden_compra_detalleClase->setid_bodega((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_bodega'));
				
				$this->orden_compra_detalleClase->setid_producto((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_producto'));
				
				$this->orden_compra_detalleClase->setid_unidad((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_unidad'));
				
				$this->orden_compra_detalleClase->setcantidad((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'cantidad'));
				
				$this->orden_compra_detalleClase->setprecio((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'precio'));
				
				$this->orden_compra_detalleClase->setsub_total((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'sub_total'));
				
				$this->orden_compra_detalleClase->setdescuento_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'descuento_porciento'));
				
				$this->orden_compra_detalleClase->setdescuento_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'descuento_monto'));
				
				$this->orden_compra_detalleClase->setiva_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'iva_porciento'));
				
				$this->orden_compra_detalleClase->setiva_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'iva_monto'));
				
				$this->orden_compra_detalleClase->settotal((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'total'));
				
				$this->orden_compra_detalleClase->setobservacion($this->getDataCampoFormTabla('form'.$this->strSufijo,'observacion'));
				
				$this->orden_compra_detalleClase->setrecibido((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'recibido'));
				
				$this->orden_compra_detalleClase->setimpuesto2_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'impuesto2_porciento'));
				
				$this->orden_compra_detalleClase->setimpuesto2_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'impuesto2_monto'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->orden_compra_detalleModel->set($this->orden_compra_detalleClase);
				
				/*$this->orden_compra_detalleModel->set($this->migrarModelorden_compra_detalle($this->orden_compra_detalleClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->orden_compra_detalleLogic->getorden_compra_detalle()->setId($this->orden_compra_detalleClase->getId());	
			$this->orden_compra_detalleLogic->getorden_compra_detalle()->setVersionRow($this->orden_compra_detalleClase->getVersionRow());	
			$this->orden_compra_detalleLogic->getorden_compra_detalle()->setVersionRow($this->orden_compra_detalleClase->getVersionRow());	
			$this->orden_compra_detalleLogic->getorden_compra_detalle()->setid_orden_compra($this->orden_compra_detalleClase->getid_orden_compra());	
			$this->orden_compra_detalleLogic->getorden_compra_detalle()->setid_bodega($this->orden_compra_detalleClase->getid_bodega());	
			$this->orden_compra_detalleLogic->getorden_compra_detalle()->setid_producto($this->orden_compra_detalleClase->getid_producto());	
			$this->orden_compra_detalleLogic->getorden_compra_detalle()->setid_unidad($this->orden_compra_detalleClase->getid_unidad());	
			$this->orden_compra_detalleLogic->getorden_compra_detalle()->setcantidad($this->orden_compra_detalleClase->getcantidad());	
			$this->orden_compra_detalleLogic->getorden_compra_detalle()->setprecio($this->orden_compra_detalleClase->getprecio());	
			$this->orden_compra_detalleLogic->getorden_compra_detalle()->setsub_total($this->orden_compra_detalleClase->getsub_total());	
			$this->orden_compra_detalleLogic->getorden_compra_detalle()->setdescuento_porciento($this->orden_compra_detalleClase->getdescuento_porciento());	
			$this->orden_compra_detalleLogic->getorden_compra_detalle()->setdescuento_monto($this->orden_compra_detalleClase->getdescuento_monto());	
			$this->orden_compra_detalleLogic->getorden_compra_detalle()->setiva_porciento($this->orden_compra_detalleClase->getiva_porciento());	
			$this->orden_compra_detalleLogic->getorden_compra_detalle()->setiva_monto($this->orden_compra_detalleClase->getiva_monto());	
			$this->orden_compra_detalleLogic->getorden_compra_detalle()->settotal($this->orden_compra_detalleClase->gettotal());	
			$this->orden_compra_detalleLogic->getorden_compra_detalle()->setobservacion($this->orden_compra_detalleClase->getobservacion());	
			$this->orden_compra_detalleLogic->getorden_compra_detalle()->setrecibido($this->orden_compra_detalleClase->getrecibido());	
			$this->orden_compra_detalleLogic->getorden_compra_detalle()->setimpuesto2_porciento($this->orden_compra_detalleClase->getimpuesto2_porciento());	
			$this->orden_compra_detalleLogic->getorden_compra_detalle()->setimpuesto2_monto($this->orden_compra_detalleClase->getimpuesto2_monto());	
		} else {
			$this->orden_compra_detalleClase->setId($this->orden_compra_detalleLogic->getorden_compra_detalle()->getId());	
			$this->orden_compra_detalleClase->setVersionRow($this->orden_compra_detalleLogic->getorden_compra_detalle()->getVersionRow());	
			$this->orden_compra_detalleClase->setVersionRow($this->orden_compra_detalleLogic->getorden_compra_detalle()->getVersionRow());	
			$this->orden_compra_detalleClase->setid_orden_compra($this->orden_compra_detalleLogic->getorden_compra_detalle()->getid_orden_compra());	
			$this->orden_compra_detalleClase->setid_bodega($this->orden_compra_detalleLogic->getorden_compra_detalle()->getid_bodega());	
			$this->orden_compra_detalleClase->setid_producto($this->orden_compra_detalleLogic->getorden_compra_detalle()->getid_producto());	
			$this->orden_compra_detalleClase->setid_unidad($this->orden_compra_detalleLogic->getorden_compra_detalle()->getid_unidad());	
			$this->orden_compra_detalleClase->setcantidad($this->orden_compra_detalleLogic->getorden_compra_detalle()->getcantidad());	
			$this->orden_compra_detalleClase->setprecio($this->orden_compra_detalleLogic->getorden_compra_detalle()->getprecio());	
			$this->orden_compra_detalleClase->setsub_total($this->orden_compra_detalleLogic->getorden_compra_detalle()->getsub_total());	
			$this->orden_compra_detalleClase->setdescuento_porciento($this->orden_compra_detalleLogic->getorden_compra_detalle()->getdescuento_porciento());	
			$this->orden_compra_detalleClase->setdescuento_monto($this->orden_compra_detalleLogic->getorden_compra_detalle()->getdescuento_monto());	
			$this->orden_compra_detalleClase->setiva_porciento($this->orden_compra_detalleLogic->getorden_compra_detalle()->getiva_porciento());	
			$this->orden_compra_detalleClase->setiva_monto($this->orden_compra_detalleLogic->getorden_compra_detalle()->getiva_monto());	
			$this->orden_compra_detalleClase->settotal($this->orden_compra_detalleLogic->getorden_compra_detalle()->gettotal());	
			$this->orden_compra_detalleClase->setobservacion($this->orden_compra_detalleLogic->getorden_compra_detalle()->getobservacion());	
			$this->orden_compra_detalleClase->setrecibido($this->orden_compra_detalleLogic->getorden_compra_detalle()->getrecibido());	
			$this->orden_compra_detalleClase->setimpuesto2_porciento($this->orden_compra_detalleLogic->getorden_compra_detalle()->getimpuesto2_porciento());	
			$this->orden_compra_detalleClase->setimpuesto2_monto($this->orden_compra_detalleLogic->getorden_compra_detalle()->getimpuesto2_monto());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->orden_compra_detalleModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_orden_compra') {$this->strMensajeid_orden_compra=$strMensajeCampo;}
		if($strNombreCampo=='id_bodega') {$this->strMensajeid_bodega=$strMensajeCampo;}
		if($strNombreCampo=='id_producto') {$this->strMensajeid_producto=$strMensajeCampo;}
		if($strNombreCampo=='id_unidad') {$this->strMensajeid_unidad=$strMensajeCampo;}
		if($strNombreCampo=='cantidad') {$this->strMensajecantidad=$strMensajeCampo;}
		if($strNombreCampo=='precio') {$this->strMensajeprecio=$strMensajeCampo;}
		if($strNombreCampo=='sub_total') {$this->strMensajesub_total=$strMensajeCampo;}
		if($strNombreCampo=='descuento_porciento') {$this->strMensajedescuento_porciento=$strMensajeCampo;}
		if($strNombreCampo=='descuento_monto') {$this->strMensajedescuento_monto=$strMensajeCampo;}
		if($strNombreCampo=='iva_porciento') {$this->strMensajeiva_porciento=$strMensajeCampo;}
		if($strNombreCampo=='iva_monto') {$this->strMensajeiva_monto=$strMensajeCampo;}
		if($strNombreCampo=='total') {$this->strMensajetotal=$strMensajeCampo;}
		if($strNombreCampo=='observacion') {$this->strMensajeobservacion=$strMensajeCampo;}
		if($strNombreCampo=='recibido') {$this->strMensajerecibido=$strMensajeCampo;}
		if($strNombreCampo=='impuesto2_porciento') {$this->strMensajeimpuesto2_porciento=$strMensajeCampo;}
		if($strNombreCampo=='impuesto2_monto') {$this->strMensajeimpuesto2_monto=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_orden_compra='';
		$this->strMensajeid_bodega='';
		$this->strMensajeid_producto='';
		$this->strMensajeid_unidad='';
		$this->strMensajecantidad='';
		$this->strMensajeprecio='';
		$this->strMensajesub_total='';
		$this->strMensajedescuento_porciento='';
		$this->strMensajedescuento_monto='';
		$this->strMensajeiva_porciento='';
		$this->strMensajeiva_monto='';
		$this->strMensajetotal='';
		$this->strMensajeobservacion='';
		$this->strMensajerecibido='';
		$this->strMensajeimpuesto2_porciento='';
		$this->strMensajeimpuesto2_monto='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
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
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}

			$orden_compra_detalle_session=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME));
						
			if($orden_compra_detalle_session==null) {
				$orden_compra_detalle_session=new orden_compra_detalle_session();
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
						$this->orden_compra_detalleLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->orden_compra_detalleActual =$this->orden_compra_detalleClase;
			
			/*$this->orden_compra_detalleActual =$this->migrarModelorden_compra_detalle($this->orden_compra_detalleClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->orden_compra_detalleLogic->getorden_compra_detalles(),$this->orden_compra_detalleActual);
			
			$this->actualizarControllerConReturnGeneral($this->orden_compra_detalleReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
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
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$orden_compra_detallesLocal=$this->getListaActual();
		
		$iIndice=orden_compra_detalle_util::getIndiceNuevo($orden_compra_detallesLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(orden_compra_detalle $orden_compra_detalle,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$orden_compra_detallesLocal=$this->getListaActual();
		
		$iIndice=orden_compra_detalle_util::getIndiceActual($orden_compra_detallesLocal,$orden_compra_detalle,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevoorden_compra_detalle')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->orden_compra_detalleActual =$this->orden_compra_detalleClase;
			
			/*$this->orden_compra_detalleActual =$this->migrarModelorden_compra_detalle($this->orden_compra_detalleClase);*/
			
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
			
			$this->orden_compra_detalleLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('orden_compra');$classes[]=$class;
				$class=new Classe('bodega');$classes[]=$class;
				$class=new Classe('producto');$classes[]=$class;
				$class=new Classe('unidad');$classes[]=$class;
			
			$this->orden_compra_detalleLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->orden_compra_detalleLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->orden_compra_detalleLogic->setorden_compra_detalle(new orden_compra_detalle());
				
				$this->orden_compra_detalleLogic->getorden_compra_detalle()->setIsNew(true);
				$this->orden_compra_detalleLogic->getorden_compra_detalle()->setIsChanged(true);
				$this->orden_compra_detalleLogic->getorden_compra_detalle()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->orden_compra_detalleModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->orden_compra_detalleLogic->orden_compra_detalles[]=$this->orden_compra_detalleLogic->getorden_compra_detalle();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->orden_compra_detalleLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->orden_compra_detalleLogic->saveRelaciones($this->orden_compra_detalleLogic->getorden_compra_detalle());/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->orden_compra_detalleLogic->getorden_compra_detalle()->setIsChanged(true);
				$this->orden_compra_detalleLogic->getorden_compra_detalle()->setIsNew(false);
				$this->orden_compra_detalleLogic->getorden_compra_detalle()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->orden_compra_detalleModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->orden_compra_detalleLogic->getorden_compra_detalle(),$this->orden_compra_detalleLogic->getorden_compra_detalles());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->orden_compra_detalleLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->orden_compra_detalleLogic->saveRelaciones($this->orden_compra_detalleLogic->getorden_compra_detalle());/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->orden_compra_detalleLogic->getorden_compra_detalle()->setIsDeleted(true);
				$this->orden_compra_detalleLogic->getorden_compra_detalle()->setIsNew(false);
				$this->orden_compra_detalleLogic->getorden_compra_detalle()->setIsChanged(false);				
				
				$this->actualizarLista($this->orden_compra_detalleLogic->getorden_compra_detalle(),$this->orden_compra_detalleLogic->getorden_compra_detalles());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->orden_compra_detalleLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->orden_compra_detalleLogic->saveRelaciones($this->orden_compra_detalleLogic->getorden_compra_detalle());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->orden_compra_detallesEliminados[]=$this->orden_compra_detalleLogic->getorden_compra_detalle();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->orden_compra_detalleLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->orden_compra_detalleLogic->saveRelaciones($this->orden_compra_detalleLogic->getorden_compra_detalle());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->orden_compra_detallesEliminados=array();
				}
			}
			
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('orden_compra');$classes[]=$class;
				$class=new Classe('bodega');$classes[]=$class;
				$class=new Classe('producto');$classes[]=$class;
				$class=new Classe('unidad');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->orden_compra_detalleLogic->setorden_compra_detalles();*/
					
					$this->orden_compra_detalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->orden_compra_detalleLogic->setIsConDeepLoad(false);
			
			$this->orden_compra_detalles=$this->orden_compra_detalleLogic->getorden_compra_detalles();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(orden_compra_detalle_util::$STR_SESSION_NAME.'Lista',serialize($this->orden_compra_detalles));
				$this->Session->write(orden_compra_detalle_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->orden_compra_detallesEliminados));
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
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
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
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalorden_compra_detalle;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->orden_compra_detalleLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->orden_compra_detalles as $orden_compra_detalleLocal) {
				if($this->orden_compra_detalleLogic->getorden_compra_detalle()->getId()==$orden_compra_detalleLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->orden_compra_detalleLogic->getorden_compra_detalle()->setIsDeleted(true);
			$this->orden_compra_detallesEliminados[]=$this->orden_compra_detalleLogic->getorden_compra_detalle();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->orden_compra_detalles[$indice]);
				
				$this->orden_compra_detalles = array_values($this->orden_compra_detalles);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelorden_compra_detalle($this->orden_compra_detalleClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(orden_compra_detalle $orden_compra_detalle,array $orden_compra_detalles) {
		try {
			foreach($orden_compra_detalles as $orden_compra_detalleLocal){ 
				if($orden_compra_detalleLocal->getId()==$orden_compra_detalle->getId()) {
					$orden_compra_detalleLocal->setIsChanged($orden_compra_detalle->getIsChanged());
					$orden_compra_detalleLocal->setIsNew($orden_compra_detalle->getIsNew());
					$orden_compra_detalleLocal->setIsDeleted($orden_compra_detalle->getIsDeleted());
					//$orden_compra_detalleLocal->setbitExpired($orden_compra_detalle->getbitExpired());
					
					$orden_compra_detalleLocal->setId($orden_compra_detalle->getId());	
					$orden_compra_detalleLocal->setVersionRow($orden_compra_detalle->getVersionRow());	
					$orden_compra_detalleLocal->setVersionRow($orden_compra_detalle->getVersionRow());	
					$orden_compra_detalleLocal->setid_orden_compra($orden_compra_detalle->getid_orden_compra());	
					$orden_compra_detalleLocal->setid_bodega($orden_compra_detalle->getid_bodega());	
					$orden_compra_detalleLocal->setid_producto($orden_compra_detalle->getid_producto());	
					$orden_compra_detalleLocal->setid_unidad($orden_compra_detalle->getid_unidad());	
					$orden_compra_detalleLocal->setcantidad($orden_compra_detalle->getcantidad());	
					$orden_compra_detalleLocal->setprecio($orden_compra_detalle->getprecio());	
					$orden_compra_detalleLocal->setsub_total($orden_compra_detalle->getsub_total());	
					$orden_compra_detalleLocal->setdescuento_porciento($orden_compra_detalle->getdescuento_porciento());	
					$orden_compra_detalleLocal->setdescuento_monto($orden_compra_detalle->getdescuento_monto());	
					$orden_compra_detalleLocal->setiva_porciento($orden_compra_detalle->getiva_porciento());	
					$orden_compra_detalleLocal->setiva_monto($orden_compra_detalle->getiva_monto());	
					$orden_compra_detalleLocal->settotal($orden_compra_detalle->gettotal());	
					$orden_compra_detalleLocal->setobservacion($orden_compra_detalle->getobservacion());	
					$orden_compra_detalleLocal->setrecibido($orden_compra_detalle->getrecibido());	
					$orden_compra_detalleLocal->setimpuesto2_porciento($orden_compra_detalle->getimpuesto2_porciento());	
					$orden_compra_detalleLocal->setimpuesto2_monto($orden_compra_detalle->getimpuesto2_monto());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$orden_compra_detallesLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$orden_compra_detallesLocal=$this->orden_compra_detalleLogic->getorden_compra_detalles();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$orden_compra_detallesLocal=$this->orden_compra_detalles;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $orden_compra_detallesLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->orden_compra_detalleLogic->getorden_compra_detalles() as $orden_compra_detalle) {
				if($orden_compra_detalle->getId()==$id) {
					$this->orden_compra_detalleLogic->setorden_compra_detalle($orden_compra_detalle);
					
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
		/*$orden_compra_detallesSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->orden_compra_detalles as $orden_compra_detalle) {
			$orden_compra_detalle->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->orden_compra_detalles[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : orden_compra_detalle_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$orden_compra_detalle_session=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME));
						
		if($orden_compra_detalle_session==null) {
			$orden_compra_detalle_session=new orden_compra_detalle_session();
		}
		
		
		$this->orden_compra_detalleReturnGeneral=new orden_compra_detalle_param_return();
		$this->orden_compra_detalleParameterGeneral=new orden_compra_detalle_param_return();
			
		$this->orden_compra_detalleParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualorden_compra_detalle(this.orden_compra_detalle,true);
			this.setVariablesFormularioToObjetoActualForeignKeysorden_compra_detalle(this.orden_compra_detalle);*/
			
			if($orden_compra_detalle_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualorden_compra_detalle(this.orden_compra_detalle,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->orden_compra_detalleActual=$this->orden_compra_detalleClase;
				
				$this->setCopiarVariablesObjetos($this->orden_compra_detalleActual,$this->orden_compra_detalle,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->orden_compra_detalleReturnGeneral=$this->orden_compra_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->orden_compra_detalleLogic->getorden_compra_detalles(),$this->orden_compra_detalle,$this->orden_compra_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($orden_compra_detalle_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanorden_compra_detalle($classes,$this->orden_compra_detalleReturnGeneral,$this->orden_compra_detalleBean,false);*/
				}
					
				if($this->orden_compra_detalleReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->orden_compra_detalleReturnGeneral->getorden_compra_detalle(),$this->orden_compra_detalleActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeyorden_compra_detalle($this->orden_compra_detalleReturnGeneral->getorden_compra_detalle());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormularioorden_compra_detalle($this->orden_compra_detalleReturnGeneral->getorden_compra_detalle());*/
				}
					
				if($this->orden_compra_detalleReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->orden_compra_detalleReturnGeneral->getorden_compra_detalle(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->orden_compra_detalle,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(orden_compra_detalleJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualorden_compra_detalle(this.orden_compra_detalle,true);
				this.setVariablesFormularioToObjetoActualForeignKeysorden_compra_detalle(this.orden_compra_detalle);				
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
				
				if($this->orden_compra_detalleAnterior!=null) {
					$this->orden_compra_detalle=$this->orden_compra_detalleAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->orden_compra_detalleReturnGeneral=$this->orden_compra_detalleLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->orden_compra_detalleLogic->getorden_compra_detalles(),$this->orden_compra_detalle,$this->orden_compra_detalleParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->orden_compra_detalleReturnGeneral->getorden_compra_detalle(),$this->orden_compra_detalleLogic->getorden_compra_detalles());
			*/
		}
		
		return $this->orden_compra_detalleReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}

			$this->orden_compra_detalleReturnGeneral=new orden_compra_detalle_param_return();			
			$this->orden_compra_detalleParameterGeneral=new orden_compra_detalle_param_return();
			
			$this->orden_compra_detalleParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->orden_compra_detalleReturnGeneral=$this->orden_compra_detalleLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->orden_compra_detalles,$this->orden_compra_detalleParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->orden_compra_detalleReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->orden_compra_detalleReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->orden_compra_detalleReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
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
		
		$this->orden_compra_detalleReturnGeneral=new orden_compra_detalle_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_orden_compra_detalle') {
		    $sDominio='orden_compra_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		if($sTipoControl=='id_bodega' || $sTipoControl=='form-id_bodega' || $sTipoControl=='form_orden_compra_detalle-id_bodega') {
			$sDominio='orden_compra_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$CONTROL_CHANGE;	$controlTipo=ControlTipo::$COMBOBOX;
			$eventoTipo=EventoTipo::$CHANGE;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='COMBOBOX';
			$classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		 else if($sTipoControl=='id_producto' || $sTipoControl=='form-id_producto' || $sTipoControl=='form_orden_compra_detalle-id_producto') {
			$sDominio='orden_compra_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$CONTROL_CHANGE;	$controlTipo=ControlTipo::$COMBOBOX;
			$eventoTipo=EventoTipo::$CHANGE;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='COMBOBOX';
			$classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		 else if($sTipoControl=='cantidad' || $sTipoControl=='form-cantidad' || $sTipoControl=='form_orden_compra_detalle-cantidad') {
			$sDominio='orden_compra_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$CONTROL_CHANGE;	$controlTipo=ControlTipo::$TEXTBOX;
			$eventoTipo=EventoTipo::$CHANGE;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='TEXTBOX';
			$classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		 else if($sTipoControl=='precio' || $sTipoControl=='form-precio' || $sTipoControl=='form_orden_compra_detalle-precio') {
			$sDominio='orden_compra_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$CONTROL_CHANGE;	$controlTipo=ControlTipo::$TEXTBOX;
			$eventoTipo=EventoTipo::$CHANGE;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='TEXTBOX';
			$classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		 else if($sTipoControl=='descuento_porciento' || $sTipoControl=='form-descuento_porciento' || $sTipoControl=='form_orden_compra_detalle-descuento_porciento') {
			$sDominio='orden_compra_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$CONTROL_CHANGE;	$controlTipo=ControlTipo::$TEXTBOX;
			$eventoTipo=EventoTipo::$CHANGE;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='TEXTBOX';
			$classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		 else if($sTipoControl=='iva_porciento' || $sTipoControl=='form-iva_porciento' || $sTipoControl=='form_orden_compra_detalle-iva_porciento') {
			$sDominio='orden_compra_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$CONTROL_CHANGE;	$controlTipo=ControlTipo::$TEXTBOX;
			$eventoTipo=EventoTipo::$CHANGE;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='TEXTBOX';
			$classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->orden_compra_detalleReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->orden_compra_detalleReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='orden_compra_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='orden_compra_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='orden_compra_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->orden_compra_detalleReturnGeneral=new orden_compra_detalle_param_return();
		$this->orden_compra_detalleParameterGeneral=new orden_compra_detalle_param_return();
			
		$this->orden_compra_detalleParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->orden_compra_detalleReturnGeneral=$this->orden_compra_detalleLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->orden_compra_detalleLogic->getorden_compra_detalles(),$this->orden_compra_detalle,$this->orden_compra_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->orden_compra_detalleReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->orden_compra_detalleReturnGeneral->getorden_compra_detalle(),$classes);*/
		}									
	
		if($this->orden_compra_detalleReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->orden_compra_detalleReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->orden_compra_detalleReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $orden_compra_detalles,orden_compra_detalle $orden_compra_detalle) {
		
		$orden_compra_detalle_session=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME));
						
		if($orden_compra_detalle_session==null) {
			$orden_compra_detalle_session=new orden_compra_detalle_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(orden_compra_detalle_util::$CLASSNAME);
			}	
			*/
			
			$this->orden_compra_detalleReturnGeneral=new orden_compra_detalle_param_return();
			$this->orden_compra_detalleParameterGeneral=new orden_compra_detalle_param_return();
			
			$this->orden_compra_detalleParameterGeneral->setdata($this->data);
		
		
			
		if($orden_compra_detalle_session->conGuardarRelaciones) {
			$classes=orden_compra_detalle_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->orden_compra_detalleActual,$this->orden_compra_detalle,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->orden_compra_detalleReturnGeneral=$this->orden_compra_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->orden_compra_detalleLogic->getorden_compra_detalles(),$this->orden_compra_detalleActual,$this->orden_compra_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->orden_compra_detalleReturnGeneral=$this->orden_compra_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$orden_compra_detalles,$orden_compra_detalle,$this->orden_compra_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelorden_compra_detalle($this->orden_compra_detalleLogic->getorden_compra_detalle());*/
			
			$this->orden_compra_detalle=$this->orden_compra_detalleLogic->getorden_compra_detalle();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->orden_compra_detalle);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$orden_compra_detalleActual=new orden_compra_detalle();
			
			if($this->orden_compra_detalleClase==null) {		
				$this->orden_compra_detalleClase=new orden_compra_detalle();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$orden_compra_detalleActual=$this->orden_compra_detalles[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setid_orden_compra((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setid_bodega((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setid_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setid_unidad((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setcantidad((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setprecio((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setsub_total((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setdescuento_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setdescuento_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setiva_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setiva_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $orden_compra_detalleActual->settotal((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setobservacion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setrecibido((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setimpuesto2_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setimpuesto2_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }

				$this->orden_compra_detalleClase=$orden_compra_detalleActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->orden_compra_detalleModel->set($this->orden_compra_detalleClase);
				
				/*$this->orden_compra_detalleModel->set($this->migrarModelorden_compra_detalle($this->orden_compra_detalleClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->orden_compra_detalles=$this->migrarModelorden_compra_detalle($this->orden_compra_detalleLogic->getorden_compra_detalles());							
		$this->orden_compra_detalles=$this->orden_compra_detalleLogic->getorden_compra_detalles();*/
		
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
			$this->Session->write(orden_compra_detalle_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$orden_compra_detalle_control_session=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($orden_compra_detalle_control_session==null) {
				$orden_compra_detalle_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($orden_compra_detalle_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(orden_compra_detalle_util::$STR_SESSION_NAME,$this);*/
		} else {
			$orden_compra_detalle_session=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME));
			
			if($orden_compra_detalle_session==null) {
				$orden_compra_detalle_session=new orden_compra_detalle_session();
			}
			
			$this->set(orden_compra_detalle_util::$STR_SESSION_NAME, $orden_compra_detalle_session);
		}
	}
	
	public function setCopiarVariablesObjetos(orden_compra_detalle $orden_compra_detalleOrigen,orden_compra_detalle $orden_compra_detalle,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($orden_compra_detalle==null) {
				$orden_compra_detalle=new orden_compra_detalle();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $orden_compra_detalleOrigen->getId()!=null && $orden_compra_detalleOrigen->getId()!=0)) {$orden_compra_detalle->setId($orden_compra_detalleOrigen->getId());}}
			if($conDefault || ($conDefault==false && $orden_compra_detalleOrigen->getid_orden_compra()!=null && $orden_compra_detalleOrigen->getid_orden_compra()!=-1)) {$orden_compra_detalle->setid_orden_compra($orden_compra_detalleOrigen->getid_orden_compra());}
			if($conDefault || ($conDefault==false && $orden_compra_detalleOrigen->getid_bodega()!=null && $orden_compra_detalleOrigen->getid_bodega()!=-1)) {$orden_compra_detalle->setid_bodega($orden_compra_detalleOrigen->getid_bodega());}
			if($conDefault || ($conDefault==false && $orden_compra_detalleOrigen->getid_producto()!=null && $orden_compra_detalleOrigen->getid_producto()!=-1)) {$orden_compra_detalle->setid_producto($orden_compra_detalleOrigen->getid_producto());}
			if($conDefault || ($conDefault==false && $orden_compra_detalleOrigen->getid_unidad()!=null && $orden_compra_detalleOrigen->getid_unidad()!=-1)) {$orden_compra_detalle->setid_unidad($orden_compra_detalleOrigen->getid_unidad());}
			if($conDefault || ($conDefault==false && $orden_compra_detalleOrigen->getcantidad()!=null && $orden_compra_detalleOrigen->getcantidad()!=0.0)) {$orden_compra_detalle->setcantidad($orden_compra_detalleOrigen->getcantidad());}
			if($conDefault || ($conDefault==false && $orden_compra_detalleOrigen->getprecio()!=null && $orden_compra_detalleOrigen->getprecio()!=0.0)) {$orden_compra_detalle->setprecio($orden_compra_detalleOrigen->getprecio());}
			if($conDefault || ($conDefault==false && $orden_compra_detalleOrigen->getsub_total()!=null && $orden_compra_detalleOrigen->getsub_total()!=0.0)) {$orden_compra_detalle->setsub_total($orden_compra_detalleOrigen->getsub_total());}
			if($conDefault || ($conDefault==false && $orden_compra_detalleOrigen->getdescuento_porciento()!=null && $orden_compra_detalleOrigen->getdescuento_porciento()!=0.0)) {$orden_compra_detalle->setdescuento_porciento($orden_compra_detalleOrigen->getdescuento_porciento());}
			if($conDefault || ($conDefault==false && $orden_compra_detalleOrigen->getdescuento_monto()!=null && $orden_compra_detalleOrigen->getdescuento_monto()!=0.0)) {$orden_compra_detalle->setdescuento_monto($orden_compra_detalleOrigen->getdescuento_monto());}
			if($conDefault || ($conDefault==false && $orden_compra_detalleOrigen->getiva_porciento()!=null && $orden_compra_detalleOrigen->getiva_porciento()!=0.0)) {$orden_compra_detalle->setiva_porciento($orden_compra_detalleOrigen->getiva_porciento());}
			if($conDefault || ($conDefault==false && $orden_compra_detalleOrigen->getiva_monto()!=null && $orden_compra_detalleOrigen->getiva_monto()!=0.0)) {$orden_compra_detalle->setiva_monto($orden_compra_detalleOrigen->getiva_monto());}
			if($conDefault || ($conDefault==false && $orden_compra_detalleOrigen->gettotal()!=null && $orden_compra_detalleOrigen->gettotal()!=0.0)) {$orden_compra_detalle->settotal($orden_compra_detalleOrigen->gettotal());}
			if($conDefault || ($conDefault==false && $orden_compra_detalleOrigen->getobservacion()!=null && $orden_compra_detalleOrigen->getobservacion()!='')) {$orden_compra_detalle->setobservacion($orden_compra_detalleOrigen->getobservacion());}
			if($conDefault || ($conDefault==false && $orden_compra_detalleOrigen->getrecibido()!=null && $orden_compra_detalleOrigen->getrecibido()!=0.0)) {$orden_compra_detalle->setrecibido($orden_compra_detalleOrigen->getrecibido());}
			if($conDefault || ($conDefault==false && $orden_compra_detalleOrigen->getimpuesto2_porciento()!=null && $orden_compra_detalleOrigen->getimpuesto2_porciento()!=0.0)) {$orden_compra_detalle->setimpuesto2_porciento($orden_compra_detalleOrigen->getimpuesto2_porciento());}
			if($conDefault || ($conDefault==false && $orden_compra_detalleOrigen->getimpuesto2_monto()!=null && $orden_compra_detalleOrigen->getimpuesto2_monto()!=0.0)) {$orden_compra_detalle->setimpuesto2_monto($orden_compra_detalleOrigen->getimpuesto2_monto());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$orden_compra_detallesSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$orden_compra_detallesSeleccionados[]=$this->orden_compra_detalles[$indice];
			}
		}
		
		return $orden_compra_detallesSeleccionados;
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
		$orden_compra_detalle= new orden_compra_detalle();
		
		foreach($this->orden_compra_detalleLogic->getorden_compra_detalles() as $orden_compra_detalle) {
			
		}		
		
		if($orden_compra_detalle!=null);
	}
	
	public function cargarRelaciones(array $orden_compra_detalles=array()) : array {	
		
		$orden_compra_detallesRespaldo = array();
		$orden_compra_detallesLocal = array();
		
		orden_compra_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$orden_compra_detallesResp=array();
		$classes=array();
			
		
			
			
		$orden_compra_detallesRespaldo=$this->orden_compra_detalleLogic->getorden_compra_detalles();
			
		$this->orden_compra_detalleLogic->setIsConDeep(true);
		
		$this->orden_compra_detalleLogic->setorden_compra_detalles($orden_compra_detalles);
			
		$this->orden_compra_detalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$orden_compra_detallesLocal=$this->orden_compra_detalleLogic->getorden_compra_detalles();
			
		/*RESPALDO*/
		$this->orden_compra_detalleLogic->setorden_compra_detalles($orden_compra_detallesRespaldo);
			
		$this->orden_compra_detalleLogic->setIsConDeep(false);
		
		if($orden_compra_detallesResp!=null);
		
		return $orden_compra_detallesLocal;
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
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(orden_compra_detalle_session $orden_compra_detalle_session) {
		$orden_compra_detalle_session->strTypeOnLoad=$this->strTypeOnLoadorden_compra_detalle;
		$orden_compra_detalle_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarorden_compra_detalle;
		$orden_compra_detalle_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarorden_compra_detalle;
		$orden_compra_detalle_session->bitEsPopup=$this->bitEsPopup;
		$orden_compra_detalle_session->bitEsBusqueda=$this->bitEsBusqueda;
		$orden_compra_detalle_session->strFuncionJs=$this->strFuncionJs;
		/*$orden_compra_detalle_session->strSufijo=$this->strSufijo;*/
		$orden_compra_detalle_session->bitEsRelaciones=$this->bitEsRelaciones;
		$orden_compra_detalle_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, orden_compra_detalle_util::$STR_NOMBRE_CLASE,0,false,false);				
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
		$orden_compra_detalleViewAdditional=new orden_compra_detalleView_add();
		$orden_compra_detalleViewAdditional->orden_compra_detalles=$this->orden_compra_detalles;
		$orden_compra_detalleViewAdditional->Session=$this->Session;
		
		return $orden_compra_detalleViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$orden_compra_detallesLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$orden_compra_detallesLocal=$this->orden_compra_detalles;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$orden_compra_detallesLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($orden_compra_detallesLocal)<=0) {
					$orden_compra_detallesLocal=$this->orden_compra_detalles;
				}
			} else {
				$orden_compra_detallesLocal=$this->orden_compra_detalles;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarorden_compra_detallesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarorden_compra_detallesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$orden_compra_detalleLogic=new orden_compra_detalle_logic();
		$orden_compra_detalleLogic->setorden_compra_detalles($this->orden_compra_detalles);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		 
			
		
			$class=new Classe('orden_compra');$classes[]=$class;
			$class=new Classe('bodega');$classes[]=$class;
			$class=new Classe('producto');$classes[]=$class;
			$class=new Classe('unidad');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$orden_compra_detalleLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->orden_compra_detalles=$orden_compra_detalleLogic->getorden_compra_detalles();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->orden_compra_detallesLocal=$this->orden_compra_detalles;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=orden_compra_detalle_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=orden_compra_detalle_util::$STR_TABLE_NAME;		
			
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
			
			$orden_compra_detalles = $this->orden_compra_detalles;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = orden_compra_detalle_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = orden_compra_detalle_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/inventario/presentation/templating/orden_compra_detalle_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->orden_compra_detalles=$orden_compra_detalles;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->orden_compra_detallesLocal=$orden_compra_detallesLocal;
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
		
		$orden_compra_detallesLocal=array();
		
		$orden_compra_detallesLocal=$this->orden_compra_detalles;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarorden_compra_detallesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarorden_compra_detallesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$orden_compra_detalleLogic=new orden_compra_detalle_logic();
		$orden_compra_detalleLogic->setorden_compra_detalles($this->orden_compra_detalles);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		 
			
		
			$class=new Classe('orden_compra');$classes[]=$class;
			$class=new Classe('bodega');$classes[]=$class;
			$class=new Classe('producto');$classes[]=$class;
			$class=new Classe('unidad');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$orden_compra_detalleLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->orden_compra_detalles=$orden_compra_detalleLogic->getorden_compra_detalles();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$orden_compra_detalles = $this->orden_compra_detalles;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = orden_compra_detalle_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = orden_compra_detalle_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/inventario/presentation/templating/orden_compra_detalle_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->orden_compra_detalles=$orden_compra_detalles;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->orden_compra_detallesLocal=$orden_compra_detallesLocal;
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
	
	public function getHtmlTablaDatosResumen(array $orden_compra_detalles=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->orden_compra_detallesReporte = $orden_compra_detalles;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarorden_compra_detallesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarorden_compra_detallesAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $orden_compra_detalles=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->orden_compra_detallesReporte = $orden_compra_detalles;		
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
		
		
		$this->orden_compra_detallesReporte=$this->cargarRelaciones($orden_compra_detalles);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarorden_compra_detallesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarorden_compra_detallesAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(orden_compra_detalle $orden_compra_detalle=null) : string {	
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
			
			
			$orden_compra_detallesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$orden_compra_detallesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($orden_compra_detallesLocal)<=0) {
					/*//DEBE ESCOGER
					$orden_compra_detallesLocal=$this->orden_compra_detalles;*/
				}
			} else {
				/*//DEBE ESCOGER
				$orden_compra_detallesLocal=$this->orden_compra_detalles;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($orden_compra_detallesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($orden_compra_detallesLocal,true);
			
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
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}
					
			$orden_compra_detallesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$orden_compra_detallesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($orden_compra_detallesLocal)<=0) {
					/*//DEBE ESCOGER
					$orden_compra_detallesLocal=$this->orden_compra_detalles;*/
				}
			} else {
				/*//DEBE ESCOGER
				$orden_compra_detallesLocal=$this->orden_compra_detalles;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($orden_compra_detallesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($orden_compra_detallesLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Compras Detalles';
			
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
			$fileName='orden_compra_detalle';
			
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
			
			$title='Reporte de  Compras Detalles';
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
			
			$title='Reporte de  Compras Detalles';
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
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Compras Detalles';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=orden_compra_detalle_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->orden_compra_detallesAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->orden_compra_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->orden_compra_detallesAuxiliar)<=0) {
					$this->orden_compra_detallesAuxiliar=$this->orden_compra_detalles;
				}
			} else {
				$this->orden_compra_detallesAuxiliar=$this->orden_compra_detalles;
			}
		/*} else {
			$this->orden_compra_detallesAuxiliar=$this->orden_compra_detallesReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->orden_compra_detallesAuxiliar as $orden_compra_detalle) {
				$row=array();
				
				$row=orden_compra_detalle_util::getDataReportRow($tipo,$orden_compra_detalle,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			orden_compra_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$orden_compra_detallesResp=array();
			$classes=array();
			
			
			
			
			$orden_compra_detallesResp=$this->orden_compra_detalleLogic->getorden_compra_detalles();
			
			$this->orden_compra_detalleLogic->setIsConDeep(true);
			
			$this->orden_compra_detalleLogic->setorden_compra_detalles($this->orden_compra_detallesAuxiliar);
			
			$this->orden_compra_detalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->orden_compra_detallesAuxiliar=$this->orden_compra_detalleLogic->getorden_compra_detalles();
			
			//RESPALDO
			$this->orden_compra_detalleLogic->setorden_compra_detalles($orden_compra_detallesResp);
			
			$this->orden_compra_detalleLogic->setIsConDeep(false);
			*/
			
			$this->orden_compra_detallesAuxiliar=$this->cargarRelaciones($this->orden_compra_detallesAuxiliar);
			
			$i=0;
			
			foreach ($this->orden_compra_detallesAuxiliar as $orden_compra_detalle) {
				$row=array();
				
				if($i!=0) {
					$row=orden_compra_detalle_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=orden_compra_detalle_util::getDataReportRow($tipo,$orden_compra_detalle,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
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
		$this->orden_compra_detallesAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->orden_compra_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->orden_compra_detallesAuxiliar)<=0) {
					$this->orden_compra_detallesAuxiliar=$this->orden_compra_detalles;
				}
			} else {
				$this->orden_compra_detallesAuxiliar=$this->orden_compra_detalles;
			}
		/*} else {
			$this->orden_compra_detallesAuxiliar=$this->orden_compra_detallesReporte;	
		}*/
		
		foreach ($this->orden_compra_detallesAuxiliar as $orden_compra_detalle) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(orden_compra_detalle_util::getorden_compra_detalleDescripcion($orden_compra_detalle),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Orden Compra',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Orden Compra',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getid_orden_compraDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Bodega',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Bodega',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getid_bodegaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Producto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Producto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getid_productoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Unidad',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Unidad',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getid_unidadDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cantidad',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cantidad',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getcantidad(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Precio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Precio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getprecio(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Sub Total',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sub Total',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getsub_total(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descuento %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descuento %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getdescuento_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descuento',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descuento',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getdescuento_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Iva %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Iva %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getiva_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Iva',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Iva',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getiva_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Total',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Total',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->gettotal(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Observacion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Observacion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getobservacion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Recibido',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Recibido',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getrecibido(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impuesto2 %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto2 %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getimpuesto2_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impuesto2 Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto2 Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getimpuesto2_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface orden_compra_detalle_base_controlI {			
		
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
		public function getIndiceActual(orden_compra_detalle $orden_compra_detalle,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(orden_compra_detalle $orden_compra_detalle,array $orden_compra_detalles);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : orden_compra_detalle_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $orden_compra_detalles,orden_compra_detalle $orden_compra_detalle);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(orden_compra_detalle_param_return $orden_compra_detalleReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(orden_compra_detalle_session $orden_compra_detalle_session);		
		public function actualizarInvitadoSessionDivStyleVariables(orden_compra_detalle_session $orden_compra_detalle_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(orden_compra_detalle $orden_compra_detalleOrigen,orden_compra_detalle $orden_compra_detalle,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(orden_compra_detalle_control $orden_compra_detalle_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $orden_compra_detalles=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(orden_compra_detalle_session $orden_compra_detalle_session);		
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
		public function getHtmlTablaDatosResumen(array $orden_compra_detalles=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $orden_compra_detalles=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(orden_compra_detalle $orden_compra_detalle=null) : string;
		
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
