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

namespace com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\entity\forma_pago_proveedor;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/forma_pago_proveedor/util/forma_pago_proveedor_carga.php');
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_carga;

use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_param_return;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\logic\forma_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\presentation\session\forma_pago_proveedor_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\tipo_forma_pago\business\entity\tipo_forma_pago;
use com\bydan\contabilidad\general\tipo_forma_pago\business\logic\tipo_forma_pago_logic;
use com\bydan\contabilidad\general\tipo_forma_pago\util\tipo_forma_pago_carga;
use com\bydan\contabilidad\general\tipo_forma_pago\util\tipo_forma_pago_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL


use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\presentation\session\debito_cuenta_pagar_session;

use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\presentation\session\documento_cuenta_pagar_session;

use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\presentation\session\pago_cuenta_pagar_session;


/*CARGA ARCHIVOS FRAMEWORK*/
forma_pago_proveedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
forma_pago_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
forma_pago_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
forma_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*forma_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class forma_pago_proveedor_base_control extends forma_pago_proveedor_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->forma_pago_proveedorClase==null) {		
				$this->forma_pago_proveedorClase=new forma_pago_proveedor();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_forma_pago')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_tipo_forma_pago',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->forma_pago_proveedorClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->forma_pago_proveedorClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->forma_pago_proveedorClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->forma_pago_proveedorClase->setid_tipo_forma_pago((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_forma_pago'));
				
				$this->forma_pago_proveedorClase->setcodigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo'));
				
				$this->forma_pago_proveedorClase->setnombre($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre'));
				
				$this->forma_pago_proveedorClase->setpredeterminado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'predeterminado')));
				
				$this->forma_pago_proveedorClase->setid_cuenta((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta'));
				
				$this->forma_pago_proveedorClase->setcuenta_contable($this->getDataCampoFormTabla('form'.$this->strSufijo,'cuenta_contable'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->forma_pago_proveedorModel->set($this->forma_pago_proveedorClase);
				
				/*$this->forma_pago_proveedorModel->set($this->migrarModelforma_pago_proveedor($this->forma_pago_proveedorClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->forma_pago_proveedorLogic->getforma_pago_proveedor()->setId($this->forma_pago_proveedorClase->getId());	
			$this->forma_pago_proveedorLogic->getforma_pago_proveedor()->setVersionRow($this->forma_pago_proveedorClase->getVersionRow());	
			$this->forma_pago_proveedorLogic->getforma_pago_proveedor()->setVersionRow($this->forma_pago_proveedorClase->getVersionRow());	
			$this->forma_pago_proveedorLogic->getforma_pago_proveedor()->setid_empresa($this->forma_pago_proveedorClase->getid_empresa());	
			$this->forma_pago_proveedorLogic->getforma_pago_proveedor()->setid_tipo_forma_pago($this->forma_pago_proveedorClase->getid_tipo_forma_pago());	
			$this->forma_pago_proveedorLogic->getforma_pago_proveedor()->setcodigo($this->forma_pago_proveedorClase->getcodigo());	
			$this->forma_pago_proveedorLogic->getforma_pago_proveedor()->setnombre($this->forma_pago_proveedorClase->getnombre());	
			$this->forma_pago_proveedorLogic->getforma_pago_proveedor()->setpredeterminado($this->forma_pago_proveedorClase->getpredeterminado());	
			$this->forma_pago_proveedorLogic->getforma_pago_proveedor()->setid_cuenta($this->forma_pago_proveedorClase->getid_cuenta());	
			$this->forma_pago_proveedorLogic->getforma_pago_proveedor()->setcuenta_contable($this->forma_pago_proveedorClase->getcuenta_contable());	
		} else {
			$this->forma_pago_proveedorClase->setId($this->forma_pago_proveedorLogic->getforma_pago_proveedor()->getId());	
			$this->forma_pago_proveedorClase->setVersionRow($this->forma_pago_proveedorLogic->getforma_pago_proveedor()->getVersionRow());	
			$this->forma_pago_proveedorClase->setVersionRow($this->forma_pago_proveedorLogic->getforma_pago_proveedor()->getVersionRow());	
			$this->forma_pago_proveedorClase->setid_empresa($this->forma_pago_proveedorLogic->getforma_pago_proveedor()->getid_empresa());	
			$this->forma_pago_proveedorClase->setid_tipo_forma_pago($this->forma_pago_proveedorLogic->getforma_pago_proveedor()->getid_tipo_forma_pago());	
			$this->forma_pago_proveedorClase->setcodigo($this->forma_pago_proveedorLogic->getforma_pago_proveedor()->getcodigo());	
			$this->forma_pago_proveedorClase->setnombre($this->forma_pago_proveedorLogic->getforma_pago_proveedor()->getnombre());	
			$this->forma_pago_proveedorClase->setpredeterminado($this->forma_pago_proveedorLogic->getforma_pago_proveedor()->getpredeterminado());	
			$this->forma_pago_proveedorClase->setid_cuenta($this->forma_pago_proveedorLogic->getforma_pago_proveedor()->getid_cuenta());	
			$this->forma_pago_proveedorClase->setcuenta_contable($this->forma_pago_proveedorLogic->getforma_pago_proveedor()->getcuenta_contable());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->forma_pago_proveedorModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='id_tipo_forma_pago') {$this->strMensajeid_tipo_forma_pago=$strMensajeCampo;}
		if($strNombreCampo=='codigo') {$this->strMensajecodigo=$strMensajeCampo;}
		if($strNombreCampo=='nombre') {$this->strMensajenombre=$strMensajeCampo;}
		if($strNombreCampo=='predeterminado') {$this->strMensajepredeterminado=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta') {$this->strMensajeid_cuenta=$strMensajeCampo;}
		if($strNombreCampo=='cuenta_contable') {$this->strMensajecuenta_contable=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeid_tipo_forma_pago='';
		$this->strMensajecodigo='';
		$this->strMensajenombre='';
		$this->strMensajepredeterminado='';
		$this->strMensajeid_cuenta='';
		$this->strMensajecuenta_contable='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
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
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}

			$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));
						
			if($forma_pago_proveedor_session==null) {
				$forma_pago_proveedor_session=new forma_pago_proveedor_session();
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
						$this->forma_pago_proveedorLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->forma_pago_proveedorActual =$this->forma_pago_proveedorClase;
			
			/*$this->forma_pago_proveedorActual =$this->migrarModelforma_pago_proveedor($this->forma_pago_proveedorClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->forma_pago_proveedorLogic->getforma_pago_proveedors(),$this->forma_pago_proveedorActual);
			
			$this->actualizarControllerConReturnGeneral($this->forma_pago_proveedorReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
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
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$forma_pago_proveedorsLocal=$this->getListaActual();
		
		$iIndice=forma_pago_proveedor_util::getIndiceNuevo($forma_pago_proveedorsLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(forma_pago_proveedor $forma_pago_proveedor,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$forma_pago_proveedorsLocal=$this->getListaActual();
		
		$iIndice=forma_pago_proveedor_util::getIndiceActual($forma_pago_proveedorsLocal,$forma_pago_proveedor,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevoforma_pago_proveedor')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->forma_pago_proveedorActual =$this->forma_pago_proveedorClase;
			
			/*$this->forma_pago_proveedorActual =$this->migrarModelforma_pago_proveedor($this->forma_pago_proveedorClase);*/
			
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
			
			$this->forma_pago_proveedorLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_forma_pago');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
			
			$this->forma_pago_proveedorLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->forma_pago_proveedorLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->forma_pago_proveedorLogic->setforma_pago_proveedor(new forma_pago_proveedor());
				
				$this->forma_pago_proveedorLogic->getforma_pago_proveedor()->setIsNew(true);
				$this->forma_pago_proveedorLogic->getforma_pago_proveedor()->setIsChanged(true);
				$this->forma_pago_proveedorLogic->getforma_pago_proveedor()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->forma_pago_proveedorModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->forma_pago_proveedorLogic->forma_pago_proveedors[]=$this->forma_pago_proveedorLogic->getforma_pago_proveedor();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->forma_pago_proveedorLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							forma_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							debito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$debitocuentapagars=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$debitocuentapagarsEliminados=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$debitocuentapagars=array_merge($debitocuentapagars,$debitocuentapagarsEliminados);
							forma_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							documento_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$documentocuentapagars=unserialize($this->Session->read(documento_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$documentocuentapagarsEliminados=unserialize($this->Session->read(documento_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$documentocuentapagars=array_merge($documentocuentapagars,$documentocuentapagarsEliminados);
							forma_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							pago_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$pagocuentapagars=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$pagocuentapagarsEliminados=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$pagocuentapagars=array_merge($pagocuentapagars,$pagocuentapagarsEliminados);
							
							$this->forma_pago_proveedorLogic->saveRelaciones($this->forma_pago_proveedorLogic->getforma_pago_proveedor(),$debitocuentapagars,$documentocuentapagars,$pagocuentapagars);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->forma_pago_proveedorLogic->getforma_pago_proveedor()->setIsChanged(true);
				$this->forma_pago_proveedorLogic->getforma_pago_proveedor()->setIsNew(false);
				$this->forma_pago_proveedorLogic->getforma_pago_proveedor()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->forma_pago_proveedorModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->forma_pago_proveedorLogic->getforma_pago_proveedor(),$this->forma_pago_proveedorLogic->getforma_pago_proveedors());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->forma_pago_proveedorLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							forma_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							debito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$debitocuentapagars=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$debitocuentapagarsEliminados=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$debitocuentapagars=array_merge($debitocuentapagars,$debitocuentapagarsEliminados);
							forma_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							documento_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$documentocuentapagars=unserialize($this->Session->read(documento_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$documentocuentapagarsEliminados=unserialize($this->Session->read(documento_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$documentocuentapagars=array_merge($documentocuentapagars,$documentocuentapagarsEliminados);
							forma_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							pago_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$pagocuentapagars=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$pagocuentapagarsEliminados=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$pagocuentapagars=array_merge($pagocuentapagars,$pagocuentapagarsEliminados);
							
							$this->forma_pago_proveedorLogic->saveRelaciones($this->forma_pago_proveedorLogic->getforma_pago_proveedor(),$debitocuentapagars,$documentocuentapagars,$pagocuentapagars);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->forma_pago_proveedorLogic->getforma_pago_proveedor()->setIsDeleted(true);
				$this->forma_pago_proveedorLogic->getforma_pago_proveedor()->setIsNew(false);
				$this->forma_pago_proveedorLogic->getforma_pago_proveedor()->setIsChanged(false);				
				
				$this->actualizarLista($this->forma_pago_proveedorLogic->getforma_pago_proveedor(),$this->forma_pago_proveedorLogic->getforma_pago_proveedors());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->forma_pago_proveedorLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							forma_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							debito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$debitocuentapagars=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$debitocuentapagarsEliminados=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$debitocuentapagars=array_merge($debitocuentapagars,$debitocuentapagarsEliminados);

							foreach($debitocuentapagars as $debitocuentapagar1) {
								$debitocuentapagar1->setIsDeleted(true);
							}
							forma_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							documento_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$documentocuentapagars=unserialize($this->Session->read(documento_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$documentocuentapagarsEliminados=unserialize($this->Session->read(documento_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$documentocuentapagars=array_merge($documentocuentapagars,$documentocuentapagarsEliminados);

							foreach($documentocuentapagars as $documentocuentapagar1) {
								$documentocuentapagar1->setIsDeleted(true);
							}
							forma_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							pago_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$pagocuentapagars=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$pagocuentapagarsEliminados=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$pagocuentapagars=array_merge($pagocuentapagars,$pagocuentapagarsEliminados);

							foreach($pagocuentapagars as $pagocuentapagar1) {
								$pagocuentapagar1->setIsDeleted(true);
							}
							
						$this->forma_pago_proveedorLogic->saveRelaciones($this->forma_pago_proveedorLogic->getforma_pago_proveedor(),$debitocuentapagars,$documentocuentapagars,$pagocuentapagars);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->forma_pago_proveedorsEliminados[]=$this->forma_pago_proveedorLogic->getforma_pago_proveedor();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->forma_pago_proveedorLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							forma_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							debito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$debitocuentapagars=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$debitocuentapagarsEliminados=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$debitocuentapagars=array_merge($debitocuentapagars,$debitocuentapagarsEliminados);
							forma_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							documento_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$documentocuentapagars=unserialize($this->Session->read(documento_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$documentocuentapagarsEliminados=unserialize($this->Session->read(documento_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$documentocuentapagars=array_merge($documentocuentapagars,$documentocuentapagarsEliminados);
							forma_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							pago_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$pagocuentapagars=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$pagocuentapagarsEliminados=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$pagocuentapagars=array_merge($pagocuentapagars,$pagocuentapagarsEliminados);
							
						$this->forma_pago_proveedorLogic->saveRelaciones($this->forma_pago_proveedorLogic->getforma_pago_proveedor(),$debitocuentapagars,$documentocuentapagars,$pagocuentapagars);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->forma_pago_proveedorsEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->forma_pago_proveedorLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->forma_pago_proveedorLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->forma_pago_proveedorsEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_forma_pago');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->forma_pago_proveedorLogic->setforma_pago_proveedors();*/
					
					$this->forma_pago_proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->forma_pago_proveedorLogic->setIsConDeepLoad(false);
			
			$this->forma_pago_proveedors=$this->forma_pago_proveedorLogic->getforma_pago_proveedors();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(forma_pago_proveedor_util::$STR_SESSION_NAME.'Lista',serialize($this->forma_pago_proveedors));
				$this->Session->write(forma_pago_proveedor_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->forma_pago_proveedorsEliminados));
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
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
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
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalforma_pago_proveedor;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->forma_pago_proveedorLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->forma_pago_proveedors as $forma_pago_proveedorLocal) {
				if($this->forma_pago_proveedorLogic->getforma_pago_proveedor()->getId()==$forma_pago_proveedorLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->forma_pago_proveedorLogic->getforma_pago_proveedor()->setIsDeleted(true);
			$this->forma_pago_proveedorsEliminados[]=$this->forma_pago_proveedorLogic->getforma_pago_proveedor();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->forma_pago_proveedors[$indice]);
				
				$this->forma_pago_proveedors = array_values($this->forma_pago_proveedors);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelforma_pago_proveedor($this->forma_pago_proveedorClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(forma_pago_proveedor $forma_pago_proveedor,array $forma_pago_proveedors) {
		try {
			foreach($forma_pago_proveedors as $forma_pago_proveedorLocal){ 
				if($forma_pago_proveedorLocal->getId()==$forma_pago_proveedor->getId()) {
					$forma_pago_proveedorLocal->setIsChanged($forma_pago_proveedor->getIsChanged());
					$forma_pago_proveedorLocal->setIsNew($forma_pago_proveedor->getIsNew());
					$forma_pago_proveedorLocal->setIsDeleted($forma_pago_proveedor->getIsDeleted());
					//$forma_pago_proveedorLocal->setbitExpired($forma_pago_proveedor->getbitExpired());
					
					$forma_pago_proveedorLocal->setId($forma_pago_proveedor->getId());	
					$forma_pago_proveedorLocal->setVersionRow($forma_pago_proveedor->getVersionRow());	
					$forma_pago_proveedorLocal->setVersionRow($forma_pago_proveedor->getVersionRow());	
					$forma_pago_proveedorLocal->setid_empresa($forma_pago_proveedor->getid_empresa());	
					$forma_pago_proveedorLocal->setid_tipo_forma_pago($forma_pago_proveedor->getid_tipo_forma_pago());	
					$forma_pago_proveedorLocal->setcodigo($forma_pago_proveedor->getcodigo());	
					$forma_pago_proveedorLocal->setnombre($forma_pago_proveedor->getnombre());	
					$forma_pago_proveedorLocal->setpredeterminado($forma_pago_proveedor->getpredeterminado());	
					$forma_pago_proveedorLocal->setid_cuenta($forma_pago_proveedor->getid_cuenta());	
					$forma_pago_proveedorLocal->setcuenta_contable($forma_pago_proveedor->getcuenta_contable());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$forma_pago_proveedorsLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$forma_pago_proveedorsLocal=$this->forma_pago_proveedorLogic->getforma_pago_proveedors();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$forma_pago_proveedorsLocal=$this->forma_pago_proveedors;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $forma_pago_proveedorsLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->forma_pago_proveedorLogic->getforma_pago_proveedors() as $forma_pago_proveedor) {
				if($forma_pago_proveedor->getId()==$id) {
					$this->forma_pago_proveedorLogic->setforma_pago_proveedor($forma_pago_proveedor);
					
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
		/*$forma_pago_proveedorsSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->forma_pago_proveedors as $forma_pago_proveedor) {
			$forma_pago_proveedor->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->forma_pago_proveedors[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : forma_pago_proveedor_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));
						
		if($forma_pago_proveedor_session==null) {
			$forma_pago_proveedor_session=new forma_pago_proveedor_session();
		}
		
		
		$this->forma_pago_proveedorReturnGeneral=new forma_pago_proveedor_param_return();
		$this->forma_pago_proveedorParameterGeneral=new forma_pago_proveedor_param_return();
			
		$this->forma_pago_proveedorParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualforma_pago_proveedor(this.forma_pago_proveedor,true);
			this.setVariablesFormularioToObjetoActualForeignKeysforma_pago_proveedor(this.forma_pago_proveedor);*/
			
			if($forma_pago_proveedor_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualforma_pago_proveedor(this.forma_pago_proveedor,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->forma_pago_proveedorActual=$this->forma_pago_proveedorClase;
				
				$this->setCopiarVariablesObjetos($this->forma_pago_proveedorActual,$this->forma_pago_proveedor,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->forma_pago_proveedorReturnGeneral=$this->forma_pago_proveedorLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->forma_pago_proveedorLogic->getforma_pago_proveedors(),$this->forma_pago_proveedor,$this->forma_pago_proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($forma_pago_proveedor_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanforma_pago_proveedor($classes,$this->forma_pago_proveedorReturnGeneral,$this->forma_pago_proveedorBean,false);*/
				}
					
				if($this->forma_pago_proveedorReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->forma_pago_proveedorReturnGeneral->getforma_pago_proveedor(),$this->forma_pago_proveedorActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeyforma_pago_proveedor($this->forma_pago_proveedorReturnGeneral->getforma_pago_proveedor());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormularioforma_pago_proveedor($this->forma_pago_proveedorReturnGeneral->getforma_pago_proveedor());*/
				}
					
				if($this->forma_pago_proveedorReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->forma_pago_proveedorReturnGeneral->getforma_pago_proveedor(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->forma_pago_proveedor,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(forma_pago_proveedorJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualforma_pago_proveedor(this.forma_pago_proveedor,true);
				this.setVariablesFormularioToObjetoActualForeignKeysforma_pago_proveedor(this.forma_pago_proveedor);				
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
				
				if($this->forma_pago_proveedorAnterior!=null) {
					$this->forma_pago_proveedor=$this->forma_pago_proveedorAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->forma_pago_proveedorReturnGeneral=$this->forma_pago_proveedorLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->forma_pago_proveedorLogic->getforma_pago_proveedors(),$this->forma_pago_proveedor,$this->forma_pago_proveedorParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->forma_pago_proveedorReturnGeneral->getforma_pago_proveedor(),$this->forma_pago_proveedorLogic->getforma_pago_proveedors());
			*/
		}
		
		return $this->forma_pago_proveedorReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}

			$this->forma_pago_proveedorReturnGeneral=new forma_pago_proveedor_param_return();			
			$this->forma_pago_proveedorParameterGeneral=new forma_pago_proveedor_param_return();
			
			$this->forma_pago_proveedorParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->forma_pago_proveedorReturnGeneral=$this->forma_pago_proveedorLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->forma_pago_proveedors,$this->forma_pago_proveedorParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->forma_pago_proveedorReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->forma_pago_proveedorReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->forma_pago_proveedorReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
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
		
		$this->forma_pago_proveedorReturnGeneral=new forma_pago_proveedor_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_forma_pago_proveedor') {
		    $sDominio='forma_pago_proveedor';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->forma_pago_proveedorReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->forma_pago_proveedorReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='forma_pago_proveedor';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='forma_pago_proveedor';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='forma_pago_proveedor';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->forma_pago_proveedorReturnGeneral=new forma_pago_proveedor_param_return();
		$this->forma_pago_proveedorParameterGeneral=new forma_pago_proveedor_param_return();
			
		$this->forma_pago_proveedorParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->forma_pago_proveedorReturnGeneral=$this->forma_pago_proveedorLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->forma_pago_proveedorLogic->getforma_pago_proveedors(),$this->forma_pago_proveedor,$this->forma_pago_proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->forma_pago_proveedorReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->forma_pago_proveedorReturnGeneral->getforma_pago_proveedor(),$classes);*/
		}									
	
		if($this->forma_pago_proveedorReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->forma_pago_proveedorReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->forma_pago_proveedorReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $forma_pago_proveedors,forma_pago_proveedor $forma_pago_proveedor) {
		
		$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));
						
		if($forma_pago_proveedor_session==null) {
			$forma_pago_proveedor_session=new forma_pago_proveedor_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(forma_pago_proveedor_util::$CLASSNAME);
			}	
			*/
			
			$this->forma_pago_proveedorReturnGeneral=new forma_pago_proveedor_param_return();
			$this->forma_pago_proveedorParameterGeneral=new forma_pago_proveedor_param_return();
			
			$this->forma_pago_proveedorParameterGeneral->setdata($this->data);
		
		
			
		if($forma_pago_proveedor_session->conGuardarRelaciones) {
			$classes=forma_pago_proveedor_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->forma_pago_proveedorActual,$this->forma_pago_proveedor,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->forma_pago_proveedorReturnGeneral=$this->forma_pago_proveedorLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->forma_pago_proveedorLogic->getforma_pago_proveedors(),$this->forma_pago_proveedorActual,$this->forma_pago_proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->forma_pago_proveedorReturnGeneral=$this->forma_pago_proveedorLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$forma_pago_proveedors,$forma_pago_proveedor,$this->forma_pago_proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelforma_pago_proveedor($this->forma_pago_proveedorLogic->getforma_pago_proveedor());*/
			
			$this->forma_pago_proveedor=$this->forma_pago_proveedorLogic->getforma_pago_proveedor();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->forma_pago_proveedor);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$forma_pago_proveedorActual=new forma_pago_proveedor();
			
			if($this->forma_pago_proveedorClase==null) {		
				$this->forma_pago_proveedorClase=new forma_pago_proveedor();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$forma_pago_proveedorActual=$this->forma_pago_proveedors[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $forma_pago_proveedorActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $forma_pago_proveedorActual->setid_tipo_forma_pago((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $forma_pago_proveedorActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $forma_pago_proveedorActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $forma_pago_proveedorActual->setpredeterminado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_7')));  } else { $forma_pago_proveedorActual->setpredeterminado(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $forma_pago_proveedorActual->setid_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $forma_pago_proveedorActual->setcuenta_contable($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }

				$this->forma_pago_proveedorClase=$forma_pago_proveedorActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->forma_pago_proveedorModel->set($this->forma_pago_proveedorClase);
				
				/*$this->forma_pago_proveedorModel->set($this->migrarModelforma_pago_proveedor($this->forma_pago_proveedorClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->forma_pago_proveedors=$this->migrarModelforma_pago_proveedor($this->forma_pago_proveedorLogic->getforma_pago_proveedors());							
		$this->forma_pago_proveedors=$this->forma_pago_proveedorLogic->getforma_pago_proveedors();*/
		
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
			$this->Session->write(forma_pago_proveedor_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$forma_pago_proveedor_control_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($forma_pago_proveedor_control_session==null) {
				$forma_pago_proveedor_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($forma_pago_proveedor_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(forma_pago_proveedor_util::$STR_SESSION_NAME,$this);*/
		} else {
			$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));
			
			if($forma_pago_proveedor_session==null) {
				$forma_pago_proveedor_session=new forma_pago_proveedor_session();
			}
			
			$this->set(forma_pago_proveedor_util::$STR_SESSION_NAME, $forma_pago_proveedor_session);
		}
	}
	
	public function setCopiarVariablesObjetos(forma_pago_proveedor $forma_pago_proveedorOrigen,forma_pago_proveedor $forma_pago_proveedor,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($forma_pago_proveedor==null) {
				$forma_pago_proveedor=new forma_pago_proveedor();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $forma_pago_proveedorOrigen->getId()!=null && $forma_pago_proveedorOrigen->getId()!=0)) {$forma_pago_proveedor->setId($forma_pago_proveedorOrigen->getId());}}
			if($conDefault || ($conDefault==false && $forma_pago_proveedorOrigen->getid_tipo_forma_pago()!=null && $forma_pago_proveedorOrigen->getid_tipo_forma_pago()!=-1)) {$forma_pago_proveedor->setid_tipo_forma_pago($forma_pago_proveedorOrigen->getid_tipo_forma_pago());}
			if($conDefault || ($conDefault==false && $forma_pago_proveedorOrigen->getcodigo()!=null && $forma_pago_proveedorOrigen->getcodigo()!='')) {$forma_pago_proveedor->setcodigo($forma_pago_proveedorOrigen->getcodigo());}
			if($conDefault || ($conDefault==false && $forma_pago_proveedorOrigen->getnombre()!=null && $forma_pago_proveedorOrigen->getnombre()!='')) {$forma_pago_proveedor->setnombre($forma_pago_proveedorOrigen->getnombre());}
			if($conDefault || ($conDefault==false && $forma_pago_proveedorOrigen->getpredeterminado()!=null && $forma_pago_proveedorOrigen->getpredeterminado()!=false)) {$forma_pago_proveedor->setpredeterminado($forma_pago_proveedorOrigen->getpredeterminado());}
			if($conDefault || ($conDefault==false && $forma_pago_proveedorOrigen->getid_cuenta()!=null && $forma_pago_proveedorOrigen->getid_cuenta()!=null)) {$forma_pago_proveedor->setid_cuenta($forma_pago_proveedorOrigen->getid_cuenta());}
			if($conDefault || ($conDefault==false && $forma_pago_proveedorOrigen->getcuenta_contable()!=null && $forma_pago_proveedorOrigen->getcuenta_contable()!='')) {$forma_pago_proveedor->setcuenta_contable($forma_pago_proveedorOrigen->getcuenta_contable());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$forma_pago_proveedorsSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$forma_pago_proveedorsSeleccionados[]=$this->forma_pago_proveedors[$indice];
			}
		}
		
		return $forma_pago_proveedorsSeleccionados;
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
		$forma_pago_proveedor= new forma_pago_proveedor();
		
		foreach($this->forma_pago_proveedorLogic->getforma_pago_proveedors() as $forma_pago_proveedor) {
			
		$forma_pago_proveedor->debitocuentapagars=array();
		$forma_pago_proveedor->documentocuentapagars=array();
		$forma_pago_proveedor->pagocuentapagars=array();
		}		
		
		if($forma_pago_proveedor!=null);
	}
	
	public function cargarRelaciones(array $forma_pago_proveedors=array()) : array {	
		
		$forma_pago_proveedorsRespaldo = array();
		$forma_pago_proveedorsLocal = array();
		
		forma_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			debito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			documento_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			pago_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$forma_pago_proveedorsResp=array();
		$classes=array();
			
		
				$class=new Classe('debito_cuenta_pagar'); 	$classes[]=$class;
				$class=new Classe('documento_cuenta_pagar'); 	$classes[]=$class;
				$class=new Classe('pago_cuenta_pagar'); 	$classes[]=$class;
			
			
		$forma_pago_proveedorsRespaldo=$this->forma_pago_proveedorLogic->getforma_pago_proveedors();
			
		$this->forma_pago_proveedorLogic->setIsConDeep(true);
		
		$this->forma_pago_proveedorLogic->setforma_pago_proveedors($forma_pago_proveedors);
			
		$this->forma_pago_proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$forma_pago_proveedorsLocal=$this->forma_pago_proveedorLogic->getforma_pago_proveedors();
			
		/*RESPALDO*/
		$this->forma_pago_proveedorLogic->setforma_pago_proveedors($forma_pago_proveedorsRespaldo);
			
		$this->forma_pago_proveedorLogic->setIsConDeep(false);
		
		if($forma_pago_proveedorsResp!=null);
		
		return $forma_pago_proveedorsLocal;
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
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(forma_pago_proveedor_session $forma_pago_proveedor_session) {
		$forma_pago_proveedor_session->strTypeOnLoad=$this->strTypeOnLoadforma_pago_proveedor;
		$forma_pago_proveedor_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarforma_pago_proveedor;
		$forma_pago_proveedor_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarforma_pago_proveedor;
		$forma_pago_proveedor_session->bitEsPopup=$this->bitEsPopup;
		$forma_pago_proveedor_session->bitEsBusqueda=$this->bitEsBusqueda;
		$forma_pago_proveedor_session->strFuncionJs=$this->strFuncionJs;
		/*$forma_pago_proveedor_session->strSufijo=$this->strSufijo;*/
		$forma_pago_proveedor_session->bitEsRelaciones=$this->bitEsRelaciones;
		$forma_pago_proveedor_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, forma_pago_proveedor_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisosdebito_cuenta_pagar='none';
			$this->strTienePermisosdebito_cuenta_pagar=((Funciones::existeCadenaArray(debito_cuenta_pagar_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosdebito_cuenta_pagar='table-cell';

			$this->strTienePermisosdocumento_cuenta_pagar='none';
			$this->strTienePermisosdocumento_cuenta_pagar=((Funciones::existeCadenaArray(documento_cuenta_pagar_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosdocumento_cuenta_pagar='table-cell';

			$this->strTienePermisospago_cuenta_pagar='none';
			$this->strTienePermisospago_cuenta_pagar=((Funciones::existeCadenaArray(pago_cuenta_pagar_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisospago_cuenta_pagar='table-cell';
		} else {
			

			$this->strTienePermisosdebito_cuenta_pagar='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosdebito_cuenta_pagar=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, debito_cuenta_pagar_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosdebito_cuenta_pagar='table-cell';

			$this->strTienePermisosdocumento_cuenta_pagar='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosdocumento_cuenta_pagar=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, documento_cuenta_pagar_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosdocumento_cuenta_pagar='table-cell';

			$this->strTienePermisospago_cuenta_pagar='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisospago_cuenta_pagar=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, pago_cuenta_pagar_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisospago_cuenta_pagar='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$forma_pago_proveedorViewAdditional=new forma_pago_proveedorView_add();
		$forma_pago_proveedorViewAdditional->forma_pago_proveedors=$this->forma_pago_proveedors;
		$forma_pago_proveedorViewAdditional->Session=$this->Session;
		
		return $forma_pago_proveedorViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$forma_pago_proveedorsLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$forma_pago_proveedorsLocal=$this->forma_pago_proveedors;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$forma_pago_proveedorsLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($forma_pago_proveedorsLocal)<=0) {
					$forma_pago_proveedorsLocal=$this->forma_pago_proveedors;
				}
			} else {
				$forma_pago_proveedorsLocal=$this->forma_pago_proveedors;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarforma_pago_proveedorsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarforma_pago_proveedorsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$forma_pago_proveedorLogic=new forma_pago_proveedor_logic();
		$forma_pago_proveedorLogic->setforma_pago_proveedors($this->forma_pago_proveedors);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$debito_cuenta_pagar_session=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME));

		if($debito_cuenta_pagar_session==null) {
			$debito_cuenta_pagar_session=new debito_cuenta_pagar_session();
		}

		$documento_cuenta_pagar_session=unserialize($this->Session->read(documento_cuenta_pagar_util::$STR_SESSION_NAME));

		if($documento_cuenta_pagar_session==null) {
			$documento_cuenta_pagar_session=new documento_cuenta_pagar_session();
		}

		$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));

		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_forma_pago');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$forma_pago_proveedorLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->forma_pago_proveedors=$forma_pago_proveedorLogic->getforma_pago_proveedors();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->forma_pago_proveedorsLocal=$this->forma_pago_proveedors;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=forma_pago_proveedor_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=forma_pago_proveedor_util::$STR_TABLE_NAME;		
			
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
			
			$forma_pago_proveedors = $this->forma_pago_proveedors;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = forma_pago_proveedor_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = forma_pago_proveedor_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/cuentaspagar/presentation/templating/forma_pago_proveedor_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->forma_pago_proveedors=$forma_pago_proveedors;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->forma_pago_proveedorsLocal=$forma_pago_proveedorsLocal;
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
		
		$forma_pago_proveedorsLocal=array();
		
		$forma_pago_proveedorsLocal=$this->forma_pago_proveedors;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarforma_pago_proveedorsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarforma_pago_proveedorsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$forma_pago_proveedorLogic=new forma_pago_proveedor_logic();
		$forma_pago_proveedorLogic->setforma_pago_proveedors($this->forma_pago_proveedors);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$debito_cuenta_pagar_session=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME));

		if($debito_cuenta_pagar_session==null) {
			$debito_cuenta_pagar_session=new debito_cuenta_pagar_session();
		}

		$documento_cuenta_pagar_session=unserialize($this->Session->read(documento_cuenta_pagar_util::$STR_SESSION_NAME));

		if($documento_cuenta_pagar_session==null) {
			$documento_cuenta_pagar_session=new documento_cuenta_pagar_session();
		}

		$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));

		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_forma_pago');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$forma_pago_proveedorLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->forma_pago_proveedors=$forma_pago_proveedorLogic->getforma_pago_proveedors();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$forma_pago_proveedors = $this->forma_pago_proveedors;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = forma_pago_proveedor_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = forma_pago_proveedor_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/cuentaspagar/presentation/templating/forma_pago_proveedor_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->forma_pago_proveedors=$forma_pago_proveedors;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->forma_pago_proveedorsLocal=$forma_pago_proveedorsLocal;
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
	
	public function getHtmlTablaDatosResumen(array $forma_pago_proveedors=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->forma_pago_proveedorsReporte = $forma_pago_proveedors;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarforma_pago_proveedorsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarforma_pago_proveedorsAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $forma_pago_proveedors=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->forma_pago_proveedorsReporte = $forma_pago_proveedors;		
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
		
		
		$this->forma_pago_proveedorsReporte=$this->cargarRelaciones($forma_pago_proveedors);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarforma_pago_proveedorsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarforma_pago_proveedorsAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(forma_pago_proveedor $forma_pago_proveedor=null) : string {	
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
			
			
			$forma_pago_proveedorsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$forma_pago_proveedorsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($forma_pago_proveedorsLocal)<=0) {
					/*//DEBE ESCOGER
					$forma_pago_proveedorsLocal=$this->forma_pago_proveedors;*/
				}
			} else {
				/*//DEBE ESCOGER
				$forma_pago_proveedorsLocal=$this->forma_pago_proveedors;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($forma_pago_proveedorsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($forma_pago_proveedorsLocal,true);
			
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
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}
					
			$forma_pago_proveedorsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$forma_pago_proveedorsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($forma_pago_proveedorsLocal)<=0) {
					/*//DEBE ESCOGER
					$forma_pago_proveedorsLocal=$this->forma_pago_proveedors;*/
				}
			} else {
				/*//DEBE ESCOGER
				$forma_pago_proveedorsLocal=$this->forma_pago_proveedors;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($forma_pago_proveedorsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($forma_pago_proveedorsLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Forma Pago Proveedores';
			
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
			$fileName='forma_pago_proveedor';
			
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
			
			$title='Reporte de  Forma Pago Proveedores';
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
			
			$title='Reporte de  Forma Pago Proveedores';
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
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Forma Pago Proveedores';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=forma_pago_proveedor_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->forma_pago_proveedorsAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->forma_pago_proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->forma_pago_proveedorsAuxiliar)<=0) {
					$this->forma_pago_proveedorsAuxiliar=$this->forma_pago_proveedors;
				}
			} else {
				$this->forma_pago_proveedorsAuxiliar=$this->forma_pago_proveedors;
			}
		/*} else {
			$this->forma_pago_proveedorsAuxiliar=$this->forma_pago_proveedorsReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->forma_pago_proveedorsAuxiliar as $forma_pago_proveedor) {
				$row=array();
				
				$row=forma_pago_proveedor_util::getDataReportRow($tipo,$forma_pago_proveedor,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			forma_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			debito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			documento_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			pago_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$forma_pago_proveedorsResp=array();
			$classes=array();
			
			
				$class=new Classe('debito_cuenta_pagar'); 	$classes[]=$class;
				$class=new Classe('documento_cuenta_pagar'); 	$classes[]=$class;
				$class=new Classe('pago_cuenta_pagar'); 	$classes[]=$class;
			
			
			$forma_pago_proveedorsResp=$this->forma_pago_proveedorLogic->getforma_pago_proveedors();
			
			$this->forma_pago_proveedorLogic->setIsConDeep(true);
			
			$this->forma_pago_proveedorLogic->setforma_pago_proveedors($this->forma_pago_proveedorsAuxiliar);
			
			$this->forma_pago_proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->forma_pago_proveedorsAuxiliar=$this->forma_pago_proveedorLogic->getforma_pago_proveedors();
			
			//RESPALDO
			$this->forma_pago_proveedorLogic->setforma_pago_proveedors($forma_pago_proveedorsResp);
			
			$this->forma_pago_proveedorLogic->setIsConDeep(false);
			*/
			
			$this->forma_pago_proveedorsAuxiliar=$this->cargarRelaciones($this->forma_pago_proveedorsAuxiliar);
			
			$i=0;
			
			foreach ($this->forma_pago_proveedorsAuxiliar as $forma_pago_proveedor) {
				$row=array();
				
				if($i!=0) {
					$row=forma_pago_proveedor_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=forma_pago_proveedor_util::getDataReportRow($tipo,$forma_pago_proveedor,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//debito_cuenta_pagar
				if(Funciones::existeCadenaArrayOrderBy(debito_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($forma_pago_proveedor->getdebito_cuenta_pagars())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(debito_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=debito_cuenta_pagar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($forma_pago_proveedor->getdebito_cuenta_pagars() as $debito_cuenta_pagar) {
						$row=debito_cuenta_pagar_util::getDataReportRow('RELACIONADO',$debito_cuenta_pagar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//documento_cuenta_pagar
				if(Funciones::existeCadenaArrayOrderBy(documento_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($forma_pago_proveedor->getdocumento_cuenta_pagars())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(documento_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=documento_cuenta_pagar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($forma_pago_proveedor->getdocumento_cuenta_pagars() as $documento_cuenta_pagar) {
						$row=documento_cuenta_pagar_util::getDataReportRow('RELACIONADO',$documento_cuenta_pagar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//pago_cuenta_pagar
				if(Funciones::existeCadenaArrayOrderBy(pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($forma_pago_proveedor->getpago_cuenta_pagars())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=pago_cuenta_pagar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($forma_pago_proveedor->getpago_cuenta_pagars() as $pago_cuenta_pagar) {
						$row=pago_cuenta_pagar_util::getDataReportRow('RELACIONADO',$pago_cuenta_pagar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->forma_pago_proveedorsAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->forma_pago_proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->forma_pago_proveedorsAuxiliar)<=0) {
					$this->forma_pago_proveedorsAuxiliar=$this->forma_pago_proveedors;
				}
			} else {
				$this->forma_pago_proveedorsAuxiliar=$this->forma_pago_proveedors;
			}
		/*} else {
			$this->forma_pago_proveedorsAuxiliar=$this->forma_pago_proveedorsReporte;	
		}*/
		
		foreach ($this->forma_pago_proveedorsAuxiliar as $forma_pago_proveedor) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(forma_pago_proveedor_util::getforma_pago_proveedorDescripcion($forma_pago_proveedor),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($forma_pago_proveedor->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Tipo Forma Pago',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Forma Pago',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($forma_pago_proveedor->getid_tipo_forma_pagoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Codigo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($forma_pago_proveedor->getcodigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($forma_pago_proveedor->getnombre(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Predeterminado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Predeterminado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($forma_pago_proveedor->getpredeterminado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Cuentas',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuentas',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($forma_pago_proveedor->getid_cuentaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuenta Contable',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Contable',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($forma_pago_proveedor->getcuenta_contable(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface forma_pago_proveedor_base_controlI {			
		
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
		public function getIndiceActual(forma_pago_proveedor $forma_pago_proveedor,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(forma_pago_proveedor $forma_pago_proveedor,array $forma_pago_proveedors);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : forma_pago_proveedor_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $forma_pago_proveedors,forma_pago_proveedor $forma_pago_proveedor);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(forma_pago_proveedor_param_return $forma_pago_proveedorReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(forma_pago_proveedor_session $forma_pago_proveedor_session);		
		public function actualizarInvitadoSessionDivStyleVariables(forma_pago_proveedor_session $forma_pago_proveedor_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(forma_pago_proveedor $forma_pago_proveedorOrigen,forma_pago_proveedor $forma_pago_proveedor,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(forma_pago_proveedor_control $forma_pago_proveedor_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $forma_pago_proveedors=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(forma_pago_proveedor_session $forma_pago_proveedor_session);		
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
		public function getHtmlTablaDatosResumen(array $forma_pago_proveedors=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $forma_pago_proveedors=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(forma_pago_proveedor $forma_pago_proveedor=null) : string;
		
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
