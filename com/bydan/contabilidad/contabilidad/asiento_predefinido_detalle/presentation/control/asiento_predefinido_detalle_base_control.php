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

namespace com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\presentation\control;

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

use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\business\entity\asiento_predefinido_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/asiento_predefinido_detalle/util/asiento_predefinido_detalle_carga.php');
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_carga;

use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_util;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_param_return;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\business\logic\asiento_predefinido_detalle_logic;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\presentation\session\asiento_predefinido_detalle_session;


//FK


use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\entity\asiento_predefinido;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\logic\asiento_predefinido_logic;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;
use com\bydan\contabilidad\contabilidad\centro_costo\business\logic\centro_costo_logic;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_carga;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
asiento_predefinido_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
asiento_predefinido_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
asiento_predefinido_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
asiento_predefinido_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*asiento_predefinido_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class asiento_predefinido_detalle_base_control extends asiento_predefinido_detalle_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->asiento_predefinido_detalleClase==null) {		
				$this->asiento_predefinido_detalleClase=new asiento_predefinido_detalle();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_asiento_predefinido')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_asiento_predefinido',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_centro_costo')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_centro_costo',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->asiento_predefinido_detalleClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->asiento_predefinido_detalleClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->asiento_predefinido_detalleClase->setid_asiento_predefinido((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_asiento_predefinido'));
				
				$this->asiento_predefinido_detalleClase->setid_cuenta((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta'));
				
				$this->asiento_predefinido_detalleClase->setid_centro_costo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_centro_costo'));
				
				$this->asiento_predefinido_detalleClase->setorden((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'orden'));
				
				$this->asiento_predefinido_detalleClase->setcuenta_contable($this->getDataCampoFormTabla('form'.$this->strSufijo,'cuenta_contable'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->asiento_predefinido_detalleModel->set($this->asiento_predefinido_detalleClase);
				
				/*$this->asiento_predefinido_detalleModel->set($this->migrarModelasiento_predefinido_detalle($this->asiento_predefinido_detalleClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->setId($this->asiento_predefinido_detalleClase->getId());	
			$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->setVersionRow($this->asiento_predefinido_detalleClase->getVersionRow());	
			$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->setVersionRow($this->asiento_predefinido_detalleClase->getVersionRow());	
			$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->setid_asiento_predefinido($this->asiento_predefinido_detalleClase->getid_asiento_predefinido());	
			$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->setid_cuenta($this->asiento_predefinido_detalleClase->getid_cuenta());	
			$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->setid_centro_costo($this->asiento_predefinido_detalleClase->getid_centro_costo());	
			$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->setorden($this->asiento_predefinido_detalleClase->getorden());	
			$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->setcuenta_contable($this->asiento_predefinido_detalleClase->getcuenta_contable());	
		} else {
			$this->asiento_predefinido_detalleClase->setId($this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->getId());	
			$this->asiento_predefinido_detalleClase->setVersionRow($this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->getVersionRow());	
			$this->asiento_predefinido_detalleClase->setVersionRow($this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->getVersionRow());	
			$this->asiento_predefinido_detalleClase->setid_asiento_predefinido($this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->getid_asiento_predefinido());	
			$this->asiento_predefinido_detalleClase->setid_cuenta($this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->getid_cuenta());	
			$this->asiento_predefinido_detalleClase->setid_centro_costo($this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->getid_centro_costo());	
			$this->asiento_predefinido_detalleClase->setorden($this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->getorden());	
			$this->asiento_predefinido_detalleClase->setcuenta_contable($this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->getcuenta_contable());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->asiento_predefinido_detalleModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_asiento_predefinido') {$this->strMensajeid_asiento_predefinido=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta') {$this->strMensajeid_cuenta=$strMensajeCampo;}
		if($strNombreCampo=='id_centro_costo') {$this->strMensajeid_centro_costo=$strMensajeCampo;}
		if($strNombreCampo=='orden') {$this->strMensajeorden=$strMensajeCampo;}
		if($strNombreCampo=='cuenta_contable') {$this->strMensajecuenta_contable=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_asiento_predefinido='';
		$this->strMensajeid_cuenta='';
		$this->strMensajeid_centro_costo='';
		$this->strMensajeorden='';
		$this->strMensajecuenta_contable='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_predefinido_detalleLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinido_detalleLogic->closeNewConnexionToDeep();
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
				$this->asiento_predefinido_detalleLogic->getNewConnexionToDeep();
			}

			$asiento_predefinido_detalle_session=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME));
						
			if($asiento_predefinido_detalle_session==null) {
				$asiento_predefinido_detalle_session=new asiento_predefinido_detalle_session();
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
						$this->asiento_predefinido_detalleLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->asiento_predefinido_detalleActual =$this->asiento_predefinido_detalleClase;
			
			/*$this->asiento_predefinido_detalleActual =$this->migrarModelasiento_predefinido_detalle($this->asiento_predefinido_detalleClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_predefinido_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalles(),$this->asiento_predefinido_detalleActual);
			
			$this->actualizarControllerConReturnGeneral($this->asiento_predefinido_detalleReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinido_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->getNewConnexionToDeep();
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
				$this->asiento_predefinido_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_predefinido_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinido_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$asiento_predefinido_detallesLocal=$this->getListaActual();
		
		$iIndice=asiento_predefinido_detalle_util::getIndiceNuevo($asiento_predefinido_detallesLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(asiento_predefinido_detalle $asiento_predefinido_detalle,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$asiento_predefinido_detallesLocal=$this->getListaActual();
		
		$iIndice=asiento_predefinido_detalle_util::getIndiceActual($asiento_predefinido_detallesLocal,$asiento_predefinido_detalle,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevoasiento_predefinido_detalle')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->asiento_predefinido_detalleActual =$this->asiento_predefinido_detalleClase;
			
			/*$this->asiento_predefinido_detalleActual =$this->migrarModelasiento_predefinido_detalle($this->asiento_predefinido_detalleClase);*/
			
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
			
			$this->asiento_predefinido_detalleLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('asiento_predefinido');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				$class=new Classe('centro_costo');$classes[]=$class;
			
			$this->asiento_predefinido_detalleLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->asiento_predefinido_detalleLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->asiento_predefinido_detalleLogic->setasiento_predefinido_detalle(new asiento_predefinido_detalle());
				
				$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->setIsNew(true);
				$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->setIsChanged(true);
				$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->asiento_predefinido_detalleModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->asiento_predefinido_detalleLogic->asiento_predefinido_detalles[]=$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->asiento_predefinido_detalleLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->asiento_predefinido_detalleLogic->saveRelaciones($this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle());/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->setIsChanged(true);
				$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->setIsNew(false);
				$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->asiento_predefinido_detalleModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle(),$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalles());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->asiento_predefinido_detalleLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->asiento_predefinido_detalleLogic->saveRelaciones($this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle());/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->setIsDeleted(true);
				$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->setIsNew(false);
				$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->setIsChanged(false);				
				
				$this->actualizarLista($this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle(),$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalles());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->asiento_predefinido_detalleLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->asiento_predefinido_detalleLogic->saveRelaciones($this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->asiento_predefinido_detallesEliminados[]=$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->asiento_predefinido_detalleLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->asiento_predefinido_detalleLogic->saveRelaciones($this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->asiento_predefinido_detallesEliminados=array();
				}
			}
			
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('asiento_predefinido');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				$class=new Classe('centro_costo');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->asiento_predefinido_detalleLogic->setasiento_predefinido_detalles();*/
					
					$this->asiento_predefinido_detalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->asiento_predefinido_detalleLogic->setIsConDeepLoad(false);
			
			$this->asiento_predefinido_detalles=$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalles();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(asiento_predefinido_detalle_util::$STR_SESSION_NAME.'Lista',serialize($this->asiento_predefinido_detalles));
				$this->Session->write(asiento_predefinido_detalle_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->asiento_predefinido_detallesEliminados));
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
				$this->asiento_predefinido_detalleLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_predefinido_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinido_detalleLogic->closeNewConnexionToDeep();
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
				$this->asiento_predefinido_detalleLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalasiento_predefinido_detalle;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->asiento_predefinido_detalleLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->asiento_predefinido_detalles as $asiento_predefinido_detalleLocal) {
				if($this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->getId()==$asiento_predefinido_detalleLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle()->setIsDeleted(true);
			$this->asiento_predefinido_detallesEliminados[]=$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->asiento_predefinido_detalles[$indice]);
				
				$this->asiento_predefinido_detalles = array_values($this->asiento_predefinido_detalles);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelasiento_predefinido_detalle($this->asiento_predefinido_detalleClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_predefinido_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinido_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(asiento_predefinido_detalle $asiento_predefinido_detalle,array $asiento_predefinido_detalles) {
		try {
			foreach($asiento_predefinido_detalles as $asiento_predefinido_detalleLocal){ 
				if($asiento_predefinido_detalleLocal->getId()==$asiento_predefinido_detalle->getId()) {
					$asiento_predefinido_detalleLocal->setIsChanged($asiento_predefinido_detalle->getIsChanged());
					$asiento_predefinido_detalleLocal->setIsNew($asiento_predefinido_detalle->getIsNew());
					$asiento_predefinido_detalleLocal->setIsDeleted($asiento_predefinido_detalle->getIsDeleted());
					//$asiento_predefinido_detalleLocal->setbitExpired($asiento_predefinido_detalle->getbitExpired());
					
					$asiento_predefinido_detalleLocal->setId($asiento_predefinido_detalle->getId());	
					$asiento_predefinido_detalleLocal->setVersionRow($asiento_predefinido_detalle->getVersionRow());	
					$asiento_predefinido_detalleLocal->setVersionRow($asiento_predefinido_detalle->getVersionRow());	
					$asiento_predefinido_detalleLocal->setid_asiento_predefinido($asiento_predefinido_detalle->getid_asiento_predefinido());	
					$asiento_predefinido_detalleLocal->setid_cuenta($asiento_predefinido_detalle->getid_cuenta());	
					$asiento_predefinido_detalleLocal->setid_centro_costo($asiento_predefinido_detalle->getid_centro_costo());	
					$asiento_predefinido_detalleLocal->setorden($asiento_predefinido_detalle->getorden());	
					$asiento_predefinido_detalleLocal->setcuenta_contable($asiento_predefinido_detalle->getcuenta_contable());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$asiento_predefinido_detallesLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$asiento_predefinido_detallesLocal=$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalles();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$asiento_predefinido_detallesLocal=$this->asiento_predefinido_detalles;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $asiento_predefinido_detallesLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalles() as $asiento_predefinido_detalle) {
				if($asiento_predefinido_detalle->getId()==$id) {
					$this->asiento_predefinido_detalleLogic->setasiento_predefinido_detalle($asiento_predefinido_detalle);
					
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
		/*$asiento_predefinido_detallesSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->asiento_predefinido_detalles as $asiento_predefinido_detalle) {
			$asiento_predefinido_detalle->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->asiento_predefinido_detalles[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : asiento_predefinido_detalle_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$asiento_predefinido_detalle_session=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME));
						
		if($asiento_predefinido_detalle_session==null) {
			$asiento_predefinido_detalle_session=new asiento_predefinido_detalle_session();
		}
		
		
		$this->asiento_predefinido_detalleReturnGeneral=new asiento_predefinido_detalle_param_return();
		$this->asiento_predefinido_detalleParameterGeneral=new asiento_predefinido_detalle_param_return();
			
		$this->asiento_predefinido_detalleParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualasiento_predefinido_detalle(this.asiento_predefinido_detalle,true);
			this.setVariablesFormularioToObjetoActualForeignKeysasiento_predefinido_detalle(this.asiento_predefinido_detalle);*/
			
			if($asiento_predefinido_detalle_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualasiento_predefinido_detalle(this.asiento_predefinido_detalle,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->asiento_predefinido_detalleActual=$this->asiento_predefinido_detalleClase;
				
				$this->setCopiarVariablesObjetos($this->asiento_predefinido_detalleActual,$this->asiento_predefinido_detalle,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->asiento_predefinido_detalleReturnGeneral=$this->asiento_predefinido_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalles(),$this->asiento_predefinido_detalle,$this->asiento_predefinido_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($asiento_predefinido_detalle_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanasiento_predefinido_detalle($classes,$this->asiento_predefinido_detalleReturnGeneral,$this->asiento_predefinido_detalleBean,false);*/
				}
					
				if($this->asiento_predefinido_detalleReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->asiento_predefinido_detalleReturnGeneral->getasiento_predefinido_detalle(),$this->asiento_predefinido_detalleActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeyasiento_predefinido_detalle($this->asiento_predefinido_detalleReturnGeneral->getasiento_predefinido_detalle());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormularioasiento_predefinido_detalle($this->asiento_predefinido_detalleReturnGeneral->getasiento_predefinido_detalle());*/
				}
					
				if($this->asiento_predefinido_detalleReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->asiento_predefinido_detalleReturnGeneral->getasiento_predefinido_detalle(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->asiento_predefinido_detalle,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(asiento_predefinido_detalleJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualasiento_predefinido_detalle(this.asiento_predefinido_detalle,true);
				this.setVariablesFormularioToObjetoActualForeignKeysasiento_predefinido_detalle(this.asiento_predefinido_detalle);				
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
				
				if($this->asiento_predefinido_detalleAnterior!=null) {
					$this->asiento_predefinido_detalle=$this->asiento_predefinido_detalleAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->asiento_predefinido_detalleReturnGeneral=$this->asiento_predefinido_detalleLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalles(),$this->asiento_predefinido_detalle,$this->asiento_predefinido_detalleParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->asiento_predefinido_detalleReturnGeneral->getasiento_predefinido_detalle(),$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalles());
			*/
		}
		
		return $this->asiento_predefinido_detalleReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->getNewConnexionToDeep();
			}

			$this->asiento_predefinido_detalleReturnGeneral=new asiento_predefinido_detalle_param_return();			
			$this->asiento_predefinido_detalleParameterGeneral=new asiento_predefinido_detalle_param_return();
			
			$this->asiento_predefinido_detalleParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->asiento_predefinido_detalleReturnGeneral=$this->asiento_predefinido_detalleLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->asiento_predefinido_detalles,$this->asiento_predefinido_detalleParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->asiento_predefinido_detalleReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->asiento_predefinido_detalleReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_predefinido_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->asiento_predefinido_detalleReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinido_detalleLogic->closeNewConnexionToDeep();
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
		
		$this->asiento_predefinido_detalleReturnGeneral=new asiento_predefinido_detalle_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_asiento_predefinido_detalle') {
		    $sDominio='asiento_predefinido_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->asiento_predefinido_detalleReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->asiento_predefinido_detalleReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='asiento_predefinido_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='asiento_predefinido_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='asiento_predefinido_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->asiento_predefinido_detalleReturnGeneral=new asiento_predefinido_detalle_param_return();
		$this->asiento_predefinido_detalleParameterGeneral=new asiento_predefinido_detalle_param_return();
			
		$this->asiento_predefinido_detalleParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->asiento_predefinido_detalleReturnGeneral=$this->asiento_predefinido_detalleLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalles(),$this->asiento_predefinido_detalle,$this->asiento_predefinido_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->asiento_predefinido_detalleReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->asiento_predefinido_detalleReturnGeneral->getasiento_predefinido_detalle(),$classes);*/
		}									
	
		if($this->asiento_predefinido_detalleReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->asiento_predefinido_detalleReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->asiento_predefinido_detalleReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $asiento_predefinido_detalles,asiento_predefinido_detalle $asiento_predefinido_detalle) {
		
		$asiento_predefinido_detalle_session=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME));
						
		if($asiento_predefinido_detalle_session==null) {
			$asiento_predefinido_detalle_session=new asiento_predefinido_detalle_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(asiento_predefinido_detalle_util::$CLASSNAME);
			}	
			*/
			
			$this->asiento_predefinido_detalleReturnGeneral=new asiento_predefinido_detalle_param_return();
			$this->asiento_predefinido_detalleParameterGeneral=new asiento_predefinido_detalle_param_return();
			
			$this->asiento_predefinido_detalleParameterGeneral->setdata($this->data);
		
		
			
		if($asiento_predefinido_detalle_session->conGuardarRelaciones) {
			$classes=asiento_predefinido_detalle_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->asiento_predefinido_detalleActual,$this->asiento_predefinido_detalle,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->asiento_predefinido_detalleReturnGeneral=$this->asiento_predefinido_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalles(),$this->asiento_predefinido_detalleActual,$this->asiento_predefinido_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->asiento_predefinido_detalleReturnGeneral=$this->asiento_predefinido_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$asiento_predefinido_detalles,$asiento_predefinido_detalle,$this->asiento_predefinido_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelasiento_predefinido_detalle($this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle());*/
			
			$this->asiento_predefinido_detalle=$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalle();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->asiento_predefinido_detalle);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_predefinido_detalleLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinido_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$asiento_predefinido_detalleActual=new asiento_predefinido_detalle();
			
			if($this->asiento_predefinido_detalleClase==null) {		
				$this->asiento_predefinido_detalleClase=new asiento_predefinido_detalle();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$asiento_predefinido_detalleActual=$this->asiento_predefinido_detalles[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $asiento_predefinido_detalleActual->setid_asiento_predefinido((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $asiento_predefinido_detalleActual->setid_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $asiento_predefinido_detalleActual->setid_centro_costo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $asiento_predefinido_detalleActual->setorden((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $asiento_predefinido_detalleActual->setcuenta_contable($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }

				$this->asiento_predefinido_detalleClase=$asiento_predefinido_detalleActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->asiento_predefinido_detalleModel->set($this->asiento_predefinido_detalleClase);
				
				/*$this->asiento_predefinido_detalleModel->set($this->migrarModelasiento_predefinido_detalle($this->asiento_predefinido_detalleClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->asiento_predefinido_detalles=$this->migrarModelasiento_predefinido_detalle($this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalles());							
		$this->asiento_predefinido_detalles=$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalles();*/
		
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
			$this->Session->write(asiento_predefinido_detalle_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$asiento_predefinido_detalle_control_session=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($asiento_predefinido_detalle_control_session==null) {
				$asiento_predefinido_detalle_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($asiento_predefinido_detalle_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(asiento_predefinido_detalle_util::$STR_SESSION_NAME,$this);*/
		} else {
			$asiento_predefinido_detalle_session=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME));
			
			if($asiento_predefinido_detalle_session==null) {
				$asiento_predefinido_detalle_session=new asiento_predefinido_detalle_session();
			}
			
			$this->set(asiento_predefinido_detalle_util::$STR_SESSION_NAME, $asiento_predefinido_detalle_session);
		}
	}
	
	public function setCopiarVariablesObjetos(asiento_predefinido_detalle $asiento_predefinido_detalleOrigen,asiento_predefinido_detalle $asiento_predefinido_detalle,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($asiento_predefinido_detalle==null) {
				$asiento_predefinido_detalle=new asiento_predefinido_detalle();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $asiento_predefinido_detalleOrigen->getId()!=null && $asiento_predefinido_detalleOrigen->getId()!=0)) {$asiento_predefinido_detalle->setId($asiento_predefinido_detalleOrigen->getId());}}
			if($conDefault || ($conDefault==false && $asiento_predefinido_detalleOrigen->getid_asiento_predefinido()!=null && $asiento_predefinido_detalleOrigen->getid_asiento_predefinido()!=-1)) {$asiento_predefinido_detalle->setid_asiento_predefinido($asiento_predefinido_detalleOrigen->getid_asiento_predefinido());}
			if($conDefault || ($conDefault==false && $asiento_predefinido_detalleOrigen->getid_cuenta()!=null && $asiento_predefinido_detalleOrigen->getid_cuenta()!=-1)) {$asiento_predefinido_detalle->setid_cuenta($asiento_predefinido_detalleOrigen->getid_cuenta());}
			if($conDefault || ($conDefault==false && $asiento_predefinido_detalleOrigen->getid_centro_costo()!=null && $asiento_predefinido_detalleOrigen->getid_centro_costo()!=-1)) {$asiento_predefinido_detalle->setid_centro_costo($asiento_predefinido_detalleOrigen->getid_centro_costo());}
			if($conDefault || ($conDefault==false && $asiento_predefinido_detalleOrigen->getorden()!=null && $asiento_predefinido_detalleOrigen->getorden()!=0)) {$asiento_predefinido_detalle->setorden($asiento_predefinido_detalleOrigen->getorden());}
			if($conDefault || ($conDefault==false && $asiento_predefinido_detalleOrigen->getcuenta_contable()!=null && $asiento_predefinido_detalleOrigen->getcuenta_contable()!='')) {$asiento_predefinido_detalle->setcuenta_contable($asiento_predefinido_detalleOrigen->getcuenta_contable());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$asiento_predefinido_detallesSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$asiento_predefinido_detallesSeleccionados[]=$this->asiento_predefinido_detalles[$indice];
			}
		}
		
		return $asiento_predefinido_detallesSeleccionados;
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
		$asiento_predefinido_detalle= new asiento_predefinido_detalle();
		
		foreach($this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalles() as $asiento_predefinido_detalle) {
			
		}		
		
		if($asiento_predefinido_detalle!=null);
	}
	
	public function cargarRelaciones(array $asiento_predefinido_detalles=array()) : array {	
		
		$asiento_predefinido_detallesRespaldo = array();
		$asiento_predefinido_detallesLocal = array();
		
		asiento_predefinido_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$asiento_predefinido_detallesResp=array();
		$classes=array();
			
		
			
			
		$asiento_predefinido_detallesRespaldo=$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalles();
			
		$this->asiento_predefinido_detalleLogic->setIsConDeep(true);
		
		$this->asiento_predefinido_detalleLogic->setasiento_predefinido_detalles($asiento_predefinido_detalles);
			
		$this->asiento_predefinido_detalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$asiento_predefinido_detallesLocal=$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalles();
			
		/*RESPALDO*/
		$this->asiento_predefinido_detalleLogic->setasiento_predefinido_detalles($asiento_predefinido_detallesRespaldo);
			
		$this->asiento_predefinido_detalleLogic->setIsConDeep(false);
		
		if($asiento_predefinido_detallesResp!=null);
		
		return $asiento_predefinido_detallesLocal;
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
				$this->asiento_predefinido_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinido_detalleLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(asiento_predefinido_detalle_session $asiento_predefinido_detalle_session) {
		$asiento_predefinido_detalle_session->strTypeOnLoad=$this->strTypeOnLoadasiento_predefinido_detalle;
		$asiento_predefinido_detalle_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarasiento_predefinido_detalle;
		$asiento_predefinido_detalle_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarasiento_predefinido_detalle;
		$asiento_predefinido_detalle_session->bitEsPopup=$this->bitEsPopup;
		$asiento_predefinido_detalle_session->bitEsBusqueda=$this->bitEsBusqueda;
		$asiento_predefinido_detalle_session->strFuncionJs=$this->strFuncionJs;
		/*$asiento_predefinido_detalle_session->strSufijo=$this->strSufijo;*/
		$asiento_predefinido_detalle_session->bitEsRelaciones=$this->bitEsRelaciones;
		$asiento_predefinido_detalle_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, asiento_predefinido_detalle_util::$STR_NOMBRE_CLASE,0,false,false);				
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
		$asiento_predefinido_detalleViewAdditional=new asiento_predefinido_detalleView_add();
		$asiento_predefinido_detalleViewAdditional->asiento_predefinido_detalles=$this->asiento_predefinido_detalles;
		$asiento_predefinido_detalleViewAdditional->Session=$this->Session;
		
		return $asiento_predefinido_detalleViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$asiento_predefinido_detallesLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$asiento_predefinido_detallesLocal=$this->asiento_predefinido_detalles;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$asiento_predefinido_detallesLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($asiento_predefinido_detallesLocal)<=0) {
					$asiento_predefinido_detallesLocal=$this->asiento_predefinido_detalles;
				}
			} else {
				$asiento_predefinido_detallesLocal=$this->asiento_predefinido_detalles;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarasiento_predefinido_detallesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarasiento_predefinido_detallesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$asiento_predefinido_detalleLogic=new asiento_predefinido_detalle_logic();
		$asiento_predefinido_detalleLogic->setasiento_predefinido_detalles($this->asiento_predefinido_detalles);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		 
			
		
			$class=new Classe('asiento_predefinido');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
			$class=new Classe('centro_costo');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$asiento_predefinido_detalleLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->asiento_predefinido_detalles=$asiento_predefinido_detalleLogic->getasiento_predefinido_detalles();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->asiento_predefinido_detallesLocal=$this->asiento_predefinido_detalles;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=asiento_predefinido_detalle_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=asiento_predefinido_detalle_util::$STR_TABLE_NAME;		
			
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
			
			$asiento_predefinido_detalles = $this->asiento_predefinido_detalles;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = asiento_predefinido_detalle_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = asiento_predefinido_detalle_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/contabilidad/presentation/templating/asiento_predefinido_detalle_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->asiento_predefinido_detalles=$asiento_predefinido_detalles;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->asiento_predefinido_detallesLocal=$asiento_predefinido_detallesLocal;
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
		
		$asiento_predefinido_detallesLocal=array();
		
		$asiento_predefinido_detallesLocal=$this->asiento_predefinido_detalles;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarasiento_predefinido_detallesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarasiento_predefinido_detallesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$asiento_predefinido_detalleLogic=new asiento_predefinido_detalle_logic();
		$asiento_predefinido_detalleLogic->setasiento_predefinido_detalles($this->asiento_predefinido_detalles);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		 
			
		
			$class=new Classe('asiento_predefinido');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
			$class=new Classe('centro_costo');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$asiento_predefinido_detalleLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->asiento_predefinido_detalles=$asiento_predefinido_detalleLogic->getasiento_predefinido_detalles();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$asiento_predefinido_detalles = $this->asiento_predefinido_detalles;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = asiento_predefinido_detalle_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = asiento_predefinido_detalle_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/contabilidad/presentation/templating/asiento_predefinido_detalle_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->asiento_predefinido_detalles=$asiento_predefinido_detalles;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->asiento_predefinido_detallesLocal=$asiento_predefinido_detallesLocal;
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
	
	public function getHtmlTablaDatosResumen(array $asiento_predefinido_detalles=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->asiento_predefinido_detallesReporte = $asiento_predefinido_detalles;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarasiento_predefinido_detallesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarasiento_predefinido_detallesAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $asiento_predefinido_detalles=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->asiento_predefinido_detallesReporte = $asiento_predefinido_detalles;		
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
		
		
		$this->asiento_predefinido_detallesReporte=$this->cargarRelaciones($asiento_predefinido_detalles);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarasiento_predefinido_detallesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarasiento_predefinido_detallesAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(asiento_predefinido_detalle $asiento_predefinido_detalle=null) : string {	
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
			
			
			$asiento_predefinido_detallesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$asiento_predefinido_detallesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($asiento_predefinido_detallesLocal)<=0) {
					/*//DEBE ESCOGER
					$asiento_predefinido_detallesLocal=$this->asiento_predefinido_detalles;*/
				}
			} else {
				/*//DEBE ESCOGER
				$asiento_predefinido_detallesLocal=$this->asiento_predefinido_detalles;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($asiento_predefinido_detallesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($asiento_predefinido_detallesLocal,true);
			
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
				$this->asiento_predefinido_detalleLogic->getNewConnexionToDeep();
			}
					
			$asiento_predefinido_detallesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$asiento_predefinido_detallesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($asiento_predefinido_detallesLocal)<=0) {
					/*//DEBE ESCOGER
					$asiento_predefinido_detallesLocal=$this->asiento_predefinido_detalles;*/
				}
			} else {
				/*//DEBE ESCOGER
				$asiento_predefinido_detallesLocal=$this->asiento_predefinido_detalles;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($asiento_predefinido_detallesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($asiento_predefinido_detallesLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_predefinido_detalleLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinido_detalleLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Detalle Asiento Predefinidos';
			
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
			$fileName='asiento_predefinido_detalle';
			
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
			
			$title='Reporte de  Detalle Asiento Predefinidos';
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
			
			$title='Reporte de  Detalle Asiento Predefinidos';
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
				$this->asiento_predefinido_detalleLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Detalle Asiento Predefinidos';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_predefinido_detalleLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinido_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinido_detalleLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=asiento_predefinido_detalle_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->asiento_predefinido_detallesAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->asiento_predefinido_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->asiento_predefinido_detallesAuxiliar)<=0) {
					$this->asiento_predefinido_detallesAuxiliar=$this->asiento_predefinido_detalles;
				}
			} else {
				$this->asiento_predefinido_detallesAuxiliar=$this->asiento_predefinido_detalles;
			}
		/*} else {
			$this->asiento_predefinido_detallesAuxiliar=$this->asiento_predefinido_detallesReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->asiento_predefinido_detallesAuxiliar as $asiento_predefinido_detalle) {
				$row=array();
				
				$row=asiento_predefinido_detalle_util::getDataReportRow($tipo,$asiento_predefinido_detalle,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			asiento_predefinido_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$asiento_predefinido_detallesResp=array();
			$classes=array();
			
			
			
			
			$asiento_predefinido_detallesResp=$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalles();
			
			$this->asiento_predefinido_detalleLogic->setIsConDeep(true);
			
			$this->asiento_predefinido_detalleLogic->setasiento_predefinido_detalles($this->asiento_predefinido_detallesAuxiliar);
			
			$this->asiento_predefinido_detalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->asiento_predefinido_detallesAuxiliar=$this->asiento_predefinido_detalleLogic->getasiento_predefinido_detalles();
			
			//RESPALDO
			$this->asiento_predefinido_detalleLogic->setasiento_predefinido_detalles($asiento_predefinido_detallesResp);
			
			$this->asiento_predefinido_detalleLogic->setIsConDeep(false);
			*/
			
			$this->asiento_predefinido_detallesAuxiliar=$this->cargarRelaciones($this->asiento_predefinido_detallesAuxiliar);
			
			$i=0;
			
			foreach ($this->asiento_predefinido_detallesAuxiliar as $asiento_predefinido_detalle) {
				$row=array();
				
				if($i!=0) {
					$row=asiento_predefinido_detalle_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=asiento_predefinido_detalle_util::getDataReportRow($tipo,$asiento_predefinido_detalle,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
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
		$this->asiento_predefinido_detallesAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->asiento_predefinido_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->asiento_predefinido_detallesAuxiliar)<=0) {
					$this->asiento_predefinido_detallesAuxiliar=$this->asiento_predefinido_detalles;
				}
			} else {
				$this->asiento_predefinido_detallesAuxiliar=$this->asiento_predefinido_detalles;
			}
		/*} else {
			$this->asiento_predefinido_detallesAuxiliar=$this->asiento_predefinido_detallesReporte;	
		}*/
		
		foreach ($this->asiento_predefinido_detallesAuxiliar as $asiento_predefinido_detalle) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(asiento_predefinido_detalle_util::getasiento_predefinido_detalleDescripcion($asiento_predefinido_detalle),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy(' Asiento Predefinido',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Asiento Predefinido',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido_detalle->getid_asiento_predefinidoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Cuenta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido_detalle->getid_cuentaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Centro Costo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Centro Costo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido_detalle->getid_centro_costoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Orden',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Orden',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido_detalle->getorden(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuenta Contable',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Contable',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido_detalle->getcuenta_contable(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface asiento_predefinido_detalle_base_controlI {			
		
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
		public function getIndiceActual(asiento_predefinido_detalle $asiento_predefinido_detalle,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(asiento_predefinido_detalle $asiento_predefinido_detalle,array $asiento_predefinido_detalles);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : asiento_predefinido_detalle_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $asiento_predefinido_detalles,asiento_predefinido_detalle $asiento_predefinido_detalle);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(asiento_predefinido_detalle_param_return $asiento_predefinido_detalleReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(asiento_predefinido_detalle_session $asiento_predefinido_detalle_session);		
		public function actualizarInvitadoSessionDivStyleVariables(asiento_predefinido_detalle_session $asiento_predefinido_detalle_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(asiento_predefinido_detalle $asiento_predefinido_detalleOrigen,asiento_predefinido_detalle $asiento_predefinido_detalle,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(asiento_predefinido_detalle_control $asiento_predefinido_detalle_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $asiento_predefinido_detalles=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(asiento_predefinido_detalle_session $asiento_predefinido_detalle_session);		
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
		public function getHtmlTablaDatosResumen(array $asiento_predefinido_detalles=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $asiento_predefinido_detalles=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(asiento_predefinido_detalle $asiento_predefinido_detalle=null) : string;
		
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
