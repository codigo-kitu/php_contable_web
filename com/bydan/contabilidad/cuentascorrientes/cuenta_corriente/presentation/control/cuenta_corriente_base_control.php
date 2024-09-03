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

namespace com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/cuenta_corriente/util/cuenta_corriente_carga.php');
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_param_return;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic_add;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\presentation\session\cuenta_corriente_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\cuentascorrientes\banco\business\entity\banco;
use com\bydan\contabilidad\cuentascorrientes\banco\business\logic\banco_logic;
use com\bydan\contabilidad\cuentascorrientes\banco\util\banco_carga;
use com\bydan\contabilidad\cuentascorrientes\banco\util\banco_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\business\entity\estado_cuentas_corrientes;
use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\business\logic\estado_cuentas_corrientes_logic;
use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\util\estado_cuentas_corrientes_carga;
use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\util\estado_cuentas_corrientes_util;

//REL


use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\presentation\session\cheque_cuenta_corriente_session;

use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\util\retiro_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\util\retiro_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\presentation\session\retiro_cuenta_corriente_session;

use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\util\deposito_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\util\deposito_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\presentation\session\deposito_cuenta_corriente_session;


/*CARGA ARCHIVOS FRAMEWORK*/
cuenta_corriente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class cuenta_corriente_base_control extends cuenta_corriente_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->cuenta_corrienteClase==null) {		
				$this->cuenta_corrienteClase=new cuenta_corriente();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_usuario')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_usuario',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_banco')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_banco',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado_cuentas_corrientes')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_estado_cuentas_corrientes',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->cuenta_corrienteClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->cuenta_corrienteClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->cuenta_corrienteClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->cuenta_corrienteClase->setid_usuario((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_usuario'));
				
				$this->cuenta_corrienteClase->setid_banco((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_banco'));
				
				$this->cuenta_corrienteClase->setnumero_cuenta($this->getDataCampoFormTabla('form'.$this->strSufijo,'numero_cuenta'));
				
				$this->cuenta_corrienteClase->setbalance_inicial((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'balance_inicial'));
				
				$this->cuenta_corrienteClase->setsaldo((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'saldo'));
				
				$this->cuenta_corrienteClase->setcontador_cheque((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'contador_cheque'));
				
				$this->cuenta_corrienteClase->setid_cuenta((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta'));
				
				$this->cuenta_corrienteClase->setdescripcion($this->getDataCampoFormTabla('form'.$this->strSufijo,'descripcion'));
				
				$this->cuenta_corrienteClase->seticono($this->getDataCampoFormTabla('form'.$this->strSufijo,'icono'));
				
				$this->cuenta_corrienteClase->setid_estado_cuentas_corrientes((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado_cuentas_corrientes'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->cuenta_corrienteModel->set($this->cuenta_corrienteClase);
				
				/*$this->cuenta_corrienteModel->set($this->migrarModelcuenta_corriente($this->cuenta_corrienteClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->cuenta_corrienteLogic->getcuenta_corriente()->setId($this->cuenta_corrienteClase->getId());	
			$this->cuenta_corrienteLogic->getcuenta_corriente()->setVersionRow($this->cuenta_corrienteClase->getVersionRow());	
			$this->cuenta_corrienteLogic->getcuenta_corriente()->setVersionRow($this->cuenta_corrienteClase->getVersionRow());	
			$this->cuenta_corrienteLogic->getcuenta_corriente()->setid_empresa($this->cuenta_corrienteClase->getid_empresa());	
			$this->cuenta_corrienteLogic->getcuenta_corriente()->setid_usuario($this->cuenta_corrienteClase->getid_usuario());	
			$this->cuenta_corrienteLogic->getcuenta_corriente()->setid_banco($this->cuenta_corrienteClase->getid_banco());	
			$this->cuenta_corrienteLogic->getcuenta_corriente()->setnumero_cuenta($this->cuenta_corrienteClase->getnumero_cuenta());	
			$this->cuenta_corrienteLogic->getcuenta_corriente()->setbalance_inicial($this->cuenta_corrienteClase->getbalance_inicial());	
			$this->cuenta_corrienteLogic->getcuenta_corriente()->setsaldo($this->cuenta_corrienteClase->getsaldo());	
			$this->cuenta_corrienteLogic->getcuenta_corriente()->setcontador_cheque($this->cuenta_corrienteClase->getcontador_cheque());	
			$this->cuenta_corrienteLogic->getcuenta_corriente()->setid_cuenta($this->cuenta_corrienteClase->getid_cuenta());	
			$this->cuenta_corrienteLogic->getcuenta_corriente()->setdescripcion($this->cuenta_corrienteClase->getdescripcion());	
			$this->cuenta_corrienteLogic->getcuenta_corriente()->seticono($this->cuenta_corrienteClase->geticono());	
			$this->cuenta_corrienteLogic->getcuenta_corriente()->setid_estado_cuentas_corrientes($this->cuenta_corrienteClase->getid_estado_cuentas_corrientes());	
		} else {
			$this->cuenta_corrienteClase->setId($this->cuenta_corrienteLogic->getcuenta_corriente()->getId());	
			$this->cuenta_corrienteClase->setVersionRow($this->cuenta_corrienteLogic->getcuenta_corriente()->getVersionRow());	
			$this->cuenta_corrienteClase->setVersionRow($this->cuenta_corrienteLogic->getcuenta_corriente()->getVersionRow());	
			$this->cuenta_corrienteClase->setid_empresa($this->cuenta_corrienteLogic->getcuenta_corriente()->getid_empresa());	
			$this->cuenta_corrienteClase->setid_usuario($this->cuenta_corrienteLogic->getcuenta_corriente()->getid_usuario());	
			$this->cuenta_corrienteClase->setid_banco($this->cuenta_corrienteLogic->getcuenta_corriente()->getid_banco());	
			$this->cuenta_corrienteClase->setnumero_cuenta($this->cuenta_corrienteLogic->getcuenta_corriente()->getnumero_cuenta());	
			$this->cuenta_corrienteClase->setbalance_inicial($this->cuenta_corrienteLogic->getcuenta_corriente()->getbalance_inicial());	
			$this->cuenta_corrienteClase->setsaldo($this->cuenta_corrienteLogic->getcuenta_corriente()->getsaldo());	
			$this->cuenta_corrienteClase->setcontador_cheque($this->cuenta_corrienteLogic->getcuenta_corriente()->getcontador_cheque());	
			$this->cuenta_corrienteClase->setid_cuenta($this->cuenta_corrienteLogic->getcuenta_corriente()->getid_cuenta());	
			$this->cuenta_corrienteClase->setdescripcion($this->cuenta_corrienteLogic->getcuenta_corriente()->getdescripcion());	
			$this->cuenta_corrienteClase->seticono($this->cuenta_corrienteLogic->getcuenta_corriente()->geticono());	
			$this->cuenta_corrienteClase->setid_estado_cuentas_corrientes($this->cuenta_corrienteLogic->getcuenta_corriente()->getid_estado_cuentas_corrientes());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->cuenta_corrienteModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='id_usuario') {$this->strMensajeid_usuario=$strMensajeCampo;}
		if($strNombreCampo=='id_banco') {$this->strMensajeid_banco=$strMensajeCampo;}
		if($strNombreCampo=='numero_cuenta') {$this->strMensajenumero_cuenta=$strMensajeCampo;}
		if($strNombreCampo=='balance_inicial') {$this->strMensajebalance_inicial=$strMensajeCampo;}
		if($strNombreCampo=='saldo') {$this->strMensajesaldo=$strMensajeCampo;}
		if($strNombreCampo=='contador_cheque') {$this->strMensajecontador_cheque=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta') {$this->strMensajeid_cuenta=$strMensajeCampo;}
		if($strNombreCampo=='descripcion') {$this->strMensajedescripcion=$strMensajeCampo;}
		if($strNombreCampo=='icono') {$this->strMensajeicono=$strMensajeCampo;}
		if($strNombreCampo=='id_estado_cuentas_corrientes') {$this->strMensajeid_estado_cuentas_corrientes=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeid_usuario='';
		$this->strMensajeid_banco='';
		$this->strMensajenumero_cuenta='';
		$this->strMensajebalance_inicial='';
		$this->strMensajesaldo='';
		$this->strMensajecontador_cheque='';
		$this->strMensajeid_cuenta='';
		$this->strMensajedescripcion='';
		$this->strMensajeicono='';
		$this->strMensajeid_estado_cuentas_corrientes='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
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
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));
						
			if($cuenta_corriente_session==null) {
				$cuenta_corriente_session=new cuenta_corriente_session();
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
						$this->cuenta_corrienteLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->cuenta_corrienteActual =$this->cuenta_corrienteClase;
			
			/*$this->cuenta_corrienteActual =$this->migrarModelcuenta_corriente($this->cuenta_corrienteClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->cuenta_corrienteLogic->getcuenta_corrientes(),$this->cuenta_corrienteActual);
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_corrienteReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
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
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$cuenta_corrientesLocal=$this->getListaActual();
		
		$iIndice=cuenta_corriente_util::getIndiceNuevo($cuenta_corrientesLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(cuenta_corriente $cuenta_corriente,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$cuenta_corrientesLocal=$this->getListaActual();
		
		$iIndice=cuenta_corriente_util::getIndiceActual($cuenta_corrientesLocal,$cuenta_corriente,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevocuenta_corriente')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->cuenta_corrienteActual =$this->cuenta_corrienteClase;
			
			/*$this->cuenta_corrienteActual =$this->migrarModelcuenta_corriente($this->cuenta_corrienteClase);*/
			
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
			
			$this->cuenta_corrienteLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('banco');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				$class=new Classe('estado_cuentas_corrientes');$classes[]=$class;
			
			$this->cuenta_corrienteLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->cuenta_corrienteLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->cuenta_corrienteLogic->setcuenta_corriente(new cuenta_corriente());
				
				$this->cuenta_corrienteLogic->getcuenta_corriente()->setIsNew(true);
				$this->cuenta_corrienteLogic->getcuenta_corriente()->setIsChanged(true);
				$this->cuenta_corrienteLogic->getcuenta_corriente()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->cuenta_corrienteModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->cuenta_corrienteLogic->cuenta_corrientes[]=$this->cuenta_corrienteLogic->getcuenta_corriente();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_corrienteLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cheque_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$chequecuentacorrientes=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME.'Lista'));
							$chequecuentacorrientesEliminados=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$chequecuentacorrientes=array_merge($chequecuentacorrientes,$chequecuentacorrientesEliminados);
							cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							retiro_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$retirocuentacorrientes=unserialize($this->Session->read(retiro_cuenta_corriente_util::$STR_SESSION_NAME.'Lista'));
							$retirocuentacorrientesEliminados=unserialize($this->Session->read(retiro_cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$retirocuentacorrientes=array_merge($retirocuentacorrientes,$retirocuentacorrientesEliminados);
							cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							deposito_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$depositocuentacorrientes=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME.'Lista'));
							$depositocuentacorrientesEliminados=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$depositocuentacorrientes=array_merge($depositocuentacorrientes,$depositocuentacorrientesEliminados);
							
							$this->cuenta_corrienteLogic->saveRelaciones($this->cuenta_corrienteLogic->getcuenta_corriente(),$chequecuentacorrientes,$retirocuentacorrientes,$depositocuentacorrientes);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->cuenta_corrienteLogic->getcuenta_corriente()->setIsChanged(true);
				$this->cuenta_corrienteLogic->getcuenta_corriente()->setIsNew(false);
				$this->cuenta_corrienteLogic->getcuenta_corriente()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->cuenta_corrienteModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->cuenta_corrienteLogic->getcuenta_corriente(),$this->cuenta_corrienteLogic->getcuenta_corrientes());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_corrienteLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cheque_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$chequecuentacorrientes=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME.'Lista'));
							$chequecuentacorrientesEliminados=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$chequecuentacorrientes=array_merge($chequecuentacorrientes,$chequecuentacorrientesEliminados);
							cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							retiro_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$retirocuentacorrientes=unserialize($this->Session->read(retiro_cuenta_corriente_util::$STR_SESSION_NAME.'Lista'));
							$retirocuentacorrientesEliminados=unserialize($this->Session->read(retiro_cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$retirocuentacorrientes=array_merge($retirocuentacorrientes,$retirocuentacorrientesEliminados);
							cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							deposito_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$depositocuentacorrientes=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME.'Lista'));
							$depositocuentacorrientesEliminados=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$depositocuentacorrientes=array_merge($depositocuentacorrientes,$depositocuentacorrientesEliminados);
							
							$this->cuenta_corrienteLogic->saveRelaciones($this->cuenta_corrienteLogic->getcuenta_corriente(),$chequecuentacorrientes,$retirocuentacorrientes,$depositocuentacorrientes);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->cuenta_corrienteLogic->getcuenta_corriente()->setIsDeleted(true);
				$this->cuenta_corrienteLogic->getcuenta_corriente()->setIsNew(false);
				$this->cuenta_corrienteLogic->getcuenta_corriente()->setIsChanged(false);				
				
				$this->actualizarLista($this->cuenta_corrienteLogic->getcuenta_corriente(),$this->cuenta_corrienteLogic->getcuenta_corrientes());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuenta_corrienteLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cheque_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$chequecuentacorrientes=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME.'Lista'));
							$chequecuentacorrientesEliminados=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$chequecuentacorrientes=array_merge($chequecuentacorrientes,$chequecuentacorrientesEliminados);

							foreach($chequecuentacorrientes as $chequecuentacorriente1) {
								$chequecuentacorriente1->setIsDeleted(true);
							}
							cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							retiro_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$retirocuentacorrientes=unserialize($this->Session->read(retiro_cuenta_corriente_util::$STR_SESSION_NAME.'Lista'));
							$retirocuentacorrientesEliminados=unserialize($this->Session->read(retiro_cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$retirocuentacorrientes=array_merge($retirocuentacorrientes,$retirocuentacorrientesEliminados);

							foreach($retirocuentacorrientes as $retirocuentacorriente1) {
								$retirocuentacorriente1->setIsDeleted(true);
							}
							cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							deposito_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$depositocuentacorrientes=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME.'Lista'));
							$depositocuentacorrientesEliminados=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$depositocuentacorrientes=array_merge($depositocuentacorrientes,$depositocuentacorrientesEliminados);

							foreach($depositocuentacorrientes as $depositocuentacorriente1) {
								$depositocuentacorriente1->setIsDeleted(true);
							}
							
						$this->cuenta_corrienteLogic->saveRelaciones($this->cuenta_corrienteLogic->getcuenta_corriente(),$chequecuentacorrientes,$retirocuentacorrientes,$depositocuentacorrientes);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->cuenta_corrientesEliminados[]=$this->cuenta_corrienteLogic->getcuenta_corriente();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuenta_corrienteLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cheque_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$chequecuentacorrientes=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME.'Lista'));
							$chequecuentacorrientesEliminados=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$chequecuentacorrientes=array_merge($chequecuentacorrientes,$chequecuentacorrientesEliminados);
							cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							retiro_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$retirocuentacorrientes=unserialize($this->Session->read(retiro_cuenta_corriente_util::$STR_SESSION_NAME.'Lista'));
							$retirocuentacorrientesEliminados=unserialize($this->Session->read(retiro_cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$retirocuentacorrientes=array_merge($retirocuentacorrientes,$retirocuentacorrientesEliminados);
							cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							deposito_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$depositocuentacorrientes=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME.'Lista'));
							$depositocuentacorrientesEliminados=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$depositocuentacorrientes=array_merge($depositocuentacorrientes,$depositocuentacorrientesEliminados);
							
						$this->cuenta_corrienteLogic->saveRelaciones($this->cuenta_corrienteLogic->getcuenta_corriente(),$chequecuentacorrientes,$retirocuentacorrientes,$depositocuentacorrientes);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->cuenta_corrientesEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuenta_corrienteLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuenta_corrienteLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->cuenta_corrientesEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('banco');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				$class=new Classe('estado_cuentas_corrientes');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->cuenta_corrienteLogic->setcuenta_corrientes();*/
					
					$this->cuenta_corrienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->cuenta_corrienteLogic->setIsConDeepLoad(false);
			
			$this->cuenta_corrientes=$this->cuenta_corrienteLogic->getcuenta_corrientes();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(cuenta_corriente_util::$STR_SESSION_NAME.'Lista',serialize($this->cuenta_corrientes));
				$this->Session->write(cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->cuenta_corrientesEliminados));
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
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
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
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalcuenta_corriente;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->cuenta_corrienteLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->cuenta_corrientes as $cuenta_corrienteLocal) {
				if($this->cuenta_corrienteLogic->getcuenta_corriente()->getId()==$cuenta_corrienteLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->cuenta_corrienteLogic->getcuenta_corriente()->setIsDeleted(true);
			$this->cuenta_corrientesEliminados[]=$this->cuenta_corrienteLogic->getcuenta_corriente();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->cuenta_corrientes[$indice]);
				
				$this->cuenta_corrientes = array_values($this->cuenta_corrientes);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelcuenta_corriente($this->cuenta_corrienteClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(cuenta_corriente $cuenta_corriente,array $cuenta_corrientes) {
		try {
			foreach($cuenta_corrientes as $cuenta_corrienteLocal){ 
				if($cuenta_corrienteLocal->getId()==$cuenta_corriente->getId()) {
					$cuenta_corrienteLocal->setIsChanged($cuenta_corriente->getIsChanged());
					$cuenta_corrienteLocal->setIsNew($cuenta_corriente->getIsNew());
					$cuenta_corrienteLocal->setIsDeleted($cuenta_corriente->getIsDeleted());
					//$cuenta_corrienteLocal->setbitExpired($cuenta_corriente->getbitExpired());
					
					$cuenta_corrienteLocal->setId($cuenta_corriente->getId());	
					$cuenta_corrienteLocal->setVersionRow($cuenta_corriente->getVersionRow());	
					$cuenta_corrienteLocal->setVersionRow($cuenta_corriente->getVersionRow());	
					$cuenta_corrienteLocal->setid_empresa($cuenta_corriente->getid_empresa());	
					$cuenta_corrienteLocal->setid_usuario($cuenta_corriente->getid_usuario());	
					$cuenta_corrienteLocal->setid_banco($cuenta_corriente->getid_banco());	
					$cuenta_corrienteLocal->setnumero_cuenta($cuenta_corriente->getnumero_cuenta());	
					$cuenta_corrienteLocal->setbalance_inicial($cuenta_corriente->getbalance_inicial());	
					$cuenta_corrienteLocal->setsaldo($cuenta_corriente->getsaldo());	
					$cuenta_corrienteLocal->setcontador_cheque($cuenta_corriente->getcontador_cheque());	
					$cuenta_corrienteLocal->setid_cuenta($cuenta_corriente->getid_cuenta());	
					$cuenta_corrienteLocal->setdescripcion($cuenta_corriente->getdescripcion());	
					$cuenta_corrienteLocal->seticono($cuenta_corriente->geticono());	
					$cuenta_corrienteLocal->setid_estado_cuentas_corrientes($cuenta_corriente->getid_estado_cuentas_corrientes());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$cuenta_corrientesLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$cuenta_corrientesLocal=$this->cuenta_corrienteLogic->getcuenta_corrientes();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$cuenta_corrientesLocal=$this->cuenta_corrientes;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $cuenta_corrientesLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->cuenta_corrienteLogic->getcuenta_corrientes() as $cuenta_corriente) {
				if($cuenta_corriente->getId()==$id) {
					$this->cuenta_corrienteLogic->setcuenta_corriente($cuenta_corriente);
					
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
		/*$cuenta_corrientesSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->cuenta_corrientes as $cuenta_corriente) {
			$cuenta_corriente->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->cuenta_corrientes[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : cuenta_corriente_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));
						
		if($cuenta_corriente_session==null) {
			$cuenta_corriente_session=new cuenta_corriente_session();
		}
		
		
		$this->cuenta_corrienteReturnGeneral=new cuenta_corriente_param_return();
		$this->cuenta_corrienteParameterGeneral=new cuenta_corriente_param_return();
			
		$this->cuenta_corrienteParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualcuenta_corriente(this.cuenta_corriente,true);
			this.setVariablesFormularioToObjetoActualForeignKeyscuenta_corriente(this.cuenta_corriente);*/
			
			if($cuenta_corriente_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualcuenta_corriente(this.cuenta_corriente,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->cuenta_corrienteActual=$this->cuenta_corrienteClase;
				
				$this->setCopiarVariablesObjetos($this->cuenta_corrienteActual,$this->cuenta_corriente,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_corrienteReturnGeneral=$this->cuenta_corrienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->cuenta_corrienteLogic->getcuenta_corrientes(),$this->cuenta_corriente,$this->cuenta_corrienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($cuenta_corriente_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeancuenta_corriente($classes,$this->cuenta_corrienteReturnGeneral,$this->cuenta_corrienteBean,false);*/
				}
					
				if($this->cuenta_corrienteReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->cuenta_corrienteReturnGeneral->getcuenta_corriente(),$this->cuenta_corrienteActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeycuenta_corriente($this->cuenta_corrienteReturnGeneral->getcuenta_corriente());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariocuenta_corriente($this->cuenta_corrienteReturnGeneral->getcuenta_corriente());*/
				}
					
				if($this->cuenta_corrienteReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta_corrienteReturnGeneral->getcuenta_corriente(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta_corriente,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(cuenta_corrienteJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualcuenta_corriente(this.cuenta_corriente,true);
				this.setVariablesFormularioToObjetoActualForeignKeyscuenta_corriente(this.cuenta_corriente);				
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
				
				if($this->cuenta_corrienteAnterior!=null) {
					$this->cuenta_corriente=$this->cuenta_corrienteAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->cuenta_corrienteReturnGeneral=$this->cuenta_corrienteLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->cuenta_corrienteLogic->getcuenta_corrientes(),$this->cuenta_corriente,$this->cuenta_corrienteParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->cuenta_corrienteReturnGeneral->getcuenta_corriente(),$this->cuenta_corrienteLogic->getcuenta_corrientes());
			*/
		}
		
		return $this->cuenta_corrienteReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			$this->cuenta_corrienteReturnGeneral=new cuenta_corriente_param_return();			
			$this->cuenta_corrienteParameterGeneral=new cuenta_corriente_param_return();
			
			$this->cuenta_corrienteParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->cuenta_corrienteReturnGeneral=$this->cuenta_corrienteLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->cuenta_corrientes,$this->cuenta_corrienteParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->cuenta_corrienteReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_corrienteReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->cuenta_corrienteReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
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
		
		$this->cuenta_corrienteReturnGeneral=new cuenta_corriente_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_cuenta_corriente') {
		    $sDominio='cuenta_corriente';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->cuenta_corrienteReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->cuenta_corrienteReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='cuenta_corriente';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='cuenta_corriente';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='cuenta_corriente';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->cuenta_corrienteReturnGeneral=new cuenta_corriente_param_return();
		$this->cuenta_corrienteParameterGeneral=new cuenta_corriente_param_return();
			
		$this->cuenta_corrienteParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->cuenta_corrienteReturnGeneral=$this->cuenta_corrienteLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->cuenta_corrienteLogic->getcuenta_corrientes(),$this->cuenta_corriente,$this->cuenta_corrienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->cuenta_corrienteReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta_corrienteReturnGeneral->getcuenta_corriente(),$classes);*/
		}									
	
		if($this->cuenta_corrienteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->cuenta_corrienteReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->cuenta_corrienteReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $cuenta_corrientes,cuenta_corriente $cuenta_corriente) {
		
		$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));
						
		if($cuenta_corriente_session==null) {
			$cuenta_corriente_session=new cuenta_corriente_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(cuenta_corriente_util::$CLASSNAME);
			}	
			*/
			
			$this->cuenta_corrienteReturnGeneral=new cuenta_corriente_param_return();
			$this->cuenta_corrienteParameterGeneral=new cuenta_corriente_param_return();
			
			$this->cuenta_corrienteParameterGeneral->setdata($this->data);
		
		
			
		if($cuenta_corriente_session->conGuardarRelaciones) {
			$classes=cuenta_corriente_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->cuenta_corrienteActual,$this->cuenta_corriente,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->cuenta_corrienteReturnGeneral=$this->cuenta_corrienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->cuenta_corrienteLogic->getcuenta_corrientes(),$this->cuenta_corrienteActual,$this->cuenta_corrienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->cuenta_corrienteReturnGeneral=$this->cuenta_corrienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$cuenta_corrientes,$cuenta_corriente,$this->cuenta_corrienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelcuenta_corriente($this->cuenta_corrienteLogic->getcuenta_corriente());*/
			
			$this->cuenta_corriente=$this->cuenta_corrienteLogic->getcuenta_corriente();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->cuenta_corriente);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$cuenta_corrienteActual=new cuenta_corriente();
			
			if($this->cuenta_corrienteClase==null) {		
				$this->cuenta_corrienteClase=new cuenta_corriente();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$cuenta_corrienteActual=$this->cuenta_corrientes[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $cuenta_corrienteActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $cuenta_corrienteActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $cuenta_corrienteActual->setid_banco((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $cuenta_corrienteActual->setnumero_cuenta($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $cuenta_corrienteActual->setbalance_inicial((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $cuenta_corrienteActual->setsaldo((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $cuenta_corrienteActual->setcontador_cheque((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $cuenta_corrienteActual->setid_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $cuenta_corrienteActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $cuenta_corrienteActual->seticono($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $cuenta_corrienteActual->setid_estado_cuentas_corrientes((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }

				$this->cuenta_corrienteClase=$cuenta_corrienteActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->cuenta_corrienteModel->set($this->cuenta_corrienteClase);
				
				/*$this->cuenta_corrienteModel->set($this->migrarModelcuenta_corriente($this->cuenta_corrienteClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->cuenta_corrientes=$this->migrarModelcuenta_corriente($this->cuenta_corrienteLogic->getcuenta_corrientes());							
		$this->cuenta_corrientes=$this->cuenta_corrienteLogic->getcuenta_corrientes();*/
		
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
			$this->Session->write(cuenta_corriente_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$cuenta_corriente_control_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($cuenta_corriente_control_session==null) {
				$cuenta_corriente_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($cuenta_corriente_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(cuenta_corriente_util::$STR_SESSION_NAME,$this);*/
		} else {
			$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));
			
			if($cuenta_corriente_session==null) {
				$cuenta_corriente_session=new cuenta_corriente_session();
			}
			
			$this->set(cuenta_corriente_util::$STR_SESSION_NAME, $cuenta_corriente_session);
		}
	}
	
	public function setCopiarVariablesObjetos(cuenta_corriente $cuenta_corrienteOrigen,cuenta_corriente $cuenta_corriente,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($cuenta_corriente==null) {
				$cuenta_corriente=new cuenta_corriente();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $cuenta_corrienteOrigen->getId()!=null && $cuenta_corrienteOrigen->getId()!=0)) {$cuenta_corriente->setId($cuenta_corrienteOrigen->getId());}}
			if($conDefault || ($conDefault==false && $cuenta_corrienteOrigen->getid_banco()!=null && $cuenta_corrienteOrigen->getid_banco()!=-1)) {$cuenta_corriente->setid_banco($cuenta_corrienteOrigen->getid_banco());}
			if($conDefault || ($conDefault==false && $cuenta_corrienteOrigen->getnumero_cuenta()!=null && $cuenta_corrienteOrigen->getnumero_cuenta()!='')) {$cuenta_corriente->setnumero_cuenta($cuenta_corrienteOrigen->getnumero_cuenta());}
			if($conDefault || ($conDefault==false && $cuenta_corrienteOrigen->getbalance_inicial()!=null && $cuenta_corrienteOrigen->getbalance_inicial()!=0.0)) {$cuenta_corriente->setbalance_inicial($cuenta_corrienteOrigen->getbalance_inicial());}
			if($conDefault || ($conDefault==false && $cuenta_corrienteOrigen->getsaldo()!=null && $cuenta_corrienteOrigen->getsaldo()!=0.0)) {$cuenta_corriente->setsaldo($cuenta_corrienteOrigen->getsaldo());}
			if($conDefault || ($conDefault==false && $cuenta_corrienteOrigen->getcontador_cheque()!=null && $cuenta_corrienteOrigen->getcontador_cheque()!=0)) {$cuenta_corriente->setcontador_cheque($cuenta_corrienteOrigen->getcontador_cheque());}
			if($conDefault || ($conDefault==false && $cuenta_corrienteOrigen->getid_cuenta()!=null && $cuenta_corrienteOrigen->getid_cuenta()!=null)) {$cuenta_corriente->setid_cuenta($cuenta_corrienteOrigen->getid_cuenta());}
			if($conDefault || ($conDefault==false && $cuenta_corrienteOrigen->getdescripcion()!=null && $cuenta_corrienteOrigen->getdescripcion()!='')) {$cuenta_corriente->setdescripcion($cuenta_corrienteOrigen->getdescripcion());}
			if($conDefault || ($conDefault==false && $cuenta_corrienteOrigen->geticono()!=null && $cuenta_corrienteOrigen->geticono()!='')) {$cuenta_corriente->seticono($cuenta_corrienteOrigen->geticono());}
			if($conDefault || ($conDefault==false && $cuenta_corrienteOrigen->getid_estado_cuentas_corrientes()!=null && $cuenta_corrienteOrigen->getid_estado_cuentas_corrientes()!=-1)) {$cuenta_corriente->setid_estado_cuentas_corrientes($cuenta_corrienteOrigen->getid_estado_cuentas_corrientes());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$cuenta_corrientesSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$cuenta_corrientesSeleccionados[]=$this->cuenta_corrientes[$indice];
			}
		}
		
		return $cuenta_corrientesSeleccionados;
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
		$cuenta_corriente= new cuenta_corriente();
		
		foreach($this->cuenta_corrienteLogic->getcuenta_corrientes() as $cuenta_corriente) {
			
		$cuenta_corriente->chequecuentacorrientes=array();
		$cuenta_corriente->retirocuentacorrientes=array();
		$cuenta_corriente->depositocuentacorrientes=array();
		}		
		
		if($cuenta_corriente!=null);
	}
	
	public function cargarRelaciones(array $cuenta_corrientes=array()) : array {	
		
		$cuenta_corrientesRespaldo = array();
		$cuenta_corrientesLocal = array();
		
		cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			cheque_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			retiro_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			deposito_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$cuenta_corrientesResp=array();
		$classes=array();
			
		
				$class=new Classe('cheque_cuenta_corriente'); 	$classes[]=$class;
				$class=new Classe('retiro_cuenta_corriente'); 	$classes[]=$class;
				$class=new Classe('deposito_cuenta_corriente'); 	$classes[]=$class;
			
			
		$cuenta_corrientesRespaldo=$this->cuenta_corrienteLogic->getcuenta_corrientes();
			
		$this->cuenta_corrienteLogic->setIsConDeep(true);
		
		$this->cuenta_corrienteLogic->setcuenta_corrientes($cuenta_corrientes);
			
		$this->cuenta_corrienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$cuenta_corrientesLocal=$this->cuenta_corrienteLogic->getcuenta_corrientes();
			
		/*RESPALDO*/
		$this->cuenta_corrienteLogic->setcuenta_corrientes($cuenta_corrientesRespaldo);
			
		$this->cuenta_corrienteLogic->setIsConDeep(false);
		
		if($cuenta_corrientesResp!=null);
		
		return $cuenta_corrientesLocal;
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
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(cuenta_corriente_session $cuenta_corriente_session) {
		$cuenta_corriente_session->strTypeOnLoad=$this->strTypeOnLoadcuenta_corriente;
		$cuenta_corriente_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarcuenta_corriente;
		$cuenta_corriente_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarcuenta_corriente;
		$cuenta_corriente_session->bitEsPopup=$this->bitEsPopup;
		$cuenta_corriente_session->bitEsBusqueda=$this->bitEsBusqueda;
		$cuenta_corriente_session->strFuncionJs=$this->strFuncionJs;
		/*$cuenta_corriente_session->strSufijo=$this->strSufijo;*/
		$cuenta_corriente_session->bitEsRelaciones=$this->bitEsRelaciones;
		$cuenta_corriente_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_corriente_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisoscheque_cuenta_corriente='none';
			$this->strTienePermisoscheque_cuenta_corriente=((Funciones::existeCadenaArray(cheque_cuenta_corriente_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoscheque_cuenta_corriente='table-cell';

			$this->strTienePermisosretiro_cuenta_corriente='none';
			$this->strTienePermisosretiro_cuenta_corriente=((Funciones::existeCadenaArray(retiro_cuenta_corriente_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosretiro_cuenta_corriente='table-cell';

			$this->strTienePermisosdeposito_cuenta_corriente='none';
			$this->strTienePermisosdeposito_cuenta_corriente=((Funciones::existeCadenaArray(deposito_cuenta_corriente_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosdeposito_cuenta_corriente='table-cell';
		} else {
			

			$this->strTienePermisoscheque_cuenta_corriente='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoscheque_cuenta_corriente=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cheque_cuenta_corriente_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoscheque_cuenta_corriente='table-cell';

			$this->strTienePermisosretiro_cuenta_corriente='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosretiro_cuenta_corriente=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, retiro_cuenta_corriente_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosretiro_cuenta_corriente='table-cell';

			$this->strTienePermisosdeposito_cuenta_corriente='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosdeposito_cuenta_corriente=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, deposito_cuenta_corriente_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosdeposito_cuenta_corriente='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$cuenta_corrienteViewAdditional=new cuenta_corrienteView_add();
		$cuenta_corrienteViewAdditional->cuenta_corrientes=$this->cuenta_corrientes;
		$cuenta_corrienteViewAdditional->Session=$this->Session;
		
		return $cuenta_corrienteViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$cuenta_corrientesLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$cuenta_corrientesLocal=$this->cuenta_corrientes;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$cuenta_corrientesLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($cuenta_corrientesLocal)<=0) {
					$cuenta_corrientesLocal=$this->cuenta_corrientes;
				}
			} else {
				$cuenta_corrientesLocal=$this->cuenta_corrientes;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuenta_corrientesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuenta_corrientesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$cuenta_corrienteLogic=new cuenta_corriente_logic();
		$cuenta_corrienteLogic->setcuenta_corrientes($this->cuenta_corrientes);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}

		$retiro_cuenta_corriente_session=unserialize($this->Session->read(retiro_cuenta_corriente_util::$STR_SESSION_NAME));

		if($retiro_cuenta_corriente_session==null) {
			$retiro_cuenta_corriente_session=new retiro_cuenta_corriente_session();
		}

		$deposito_cuenta_corriente_session=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME));

		if($deposito_cuenta_corriente_session==null) {
			$deposito_cuenta_corriente_session=new deposito_cuenta_corriente_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('banco');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
			$class=new Classe('estado_cuentas_corrientes');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$cuenta_corrienteLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->cuenta_corrientes=$cuenta_corrienteLogic->getcuenta_corrientes();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->cuenta_corrientesLocal=$this->cuenta_corrientes;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=cuenta_corriente_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=cuenta_corriente_util::$STR_TABLE_NAME;		
			
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
			
			$cuenta_corrientes = $this->cuenta_corrientes;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = cuenta_corriente_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = cuenta_corriente_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/cuentascorrientes/presentation/templating/cuenta_corriente_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->cuenta_corrientes=$cuenta_corrientes;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->cuenta_corrientesLocal=$cuenta_corrientesLocal;
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
		
		$cuenta_corrientesLocal=array();
		
		$cuenta_corrientesLocal=$this->cuenta_corrientes;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuenta_corrientesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuenta_corrientesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$cuenta_corrienteLogic=new cuenta_corriente_logic();
		$cuenta_corrienteLogic->setcuenta_corrientes($this->cuenta_corrientes);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}

		$retiro_cuenta_corriente_session=unserialize($this->Session->read(retiro_cuenta_corriente_util::$STR_SESSION_NAME));

		if($retiro_cuenta_corriente_session==null) {
			$retiro_cuenta_corriente_session=new retiro_cuenta_corriente_session();
		}

		$deposito_cuenta_corriente_session=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME));

		if($deposito_cuenta_corriente_session==null) {
			$deposito_cuenta_corriente_session=new deposito_cuenta_corriente_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('banco');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
			$class=new Classe('estado_cuentas_corrientes');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$cuenta_corrienteLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->cuenta_corrientes=$cuenta_corrienteLogic->getcuenta_corrientes();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$cuenta_corrientes = $this->cuenta_corrientes;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = cuenta_corriente_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = cuenta_corriente_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/cuentascorrientes/presentation/templating/cuenta_corriente_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->cuenta_corrientes=$cuenta_corrientes;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->cuenta_corrientesLocal=$cuenta_corrientesLocal;
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
	
	public function getHtmlTablaDatosResumen(array $cuenta_corrientes=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->cuenta_corrientesReporte = $cuenta_corrientes;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuenta_corrientesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuenta_corrientesAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $cuenta_corrientes=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->cuenta_corrientesReporte = $cuenta_corrientes;		
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
		
		
		$this->cuenta_corrientesReporte=$this->cargarRelaciones($cuenta_corrientes);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuenta_corrientesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuenta_corrientesAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(cuenta_corriente $cuenta_corriente=null) : string {	
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
			
			
			$cuenta_corrientesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$cuenta_corrientesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($cuenta_corrientesLocal)<=0) {
					/*//DEBE ESCOGER
					$cuenta_corrientesLocal=$this->cuenta_corrientes;*/
				}
			} else {
				/*//DEBE ESCOGER
				$cuenta_corrientesLocal=$this->cuenta_corrientes;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($cuenta_corrientesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($cuenta_corrientesLocal,true);
			
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
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}
					
			$cuenta_corrientesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$cuenta_corrientesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($cuenta_corrientesLocal)<=0) {
					/*//DEBE ESCOGER
					$cuenta_corrientesLocal=$this->cuenta_corrientes;*/
				}
			} else {
				/*//DEBE ESCOGER
				$cuenta_corrientesLocal=$this->cuenta_corrientes;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($cuenta_corrientesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($cuenta_corrientesLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Cuenta Corrientes';
			
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
			$fileName='cuenta_corriente';
			
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
			
			$title='Reporte de  Cuenta Corrientes';
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
			
			$title='Reporte de  Cuenta Corrientes';
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
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Cuenta Corrientes';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=cuenta_corriente_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->cuenta_corrientesAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_corrientesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->cuenta_corrientesAuxiliar)<=0) {
					$this->cuenta_corrientesAuxiliar=$this->cuenta_corrientes;
				}
			} else {
				$this->cuenta_corrientesAuxiliar=$this->cuenta_corrientes;
			}
		/*} else {
			$this->cuenta_corrientesAuxiliar=$this->cuenta_corrientesReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->cuenta_corrientesAuxiliar as $cuenta_corriente) {
				$row=array();
				
				$row=cuenta_corriente_util::getDataReportRow($tipo,$cuenta_corriente,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			cheque_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			retiro_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			deposito_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$cuenta_corrientesResp=array();
			$classes=array();
			
			
				$class=new Classe('cheque_cuenta_corriente'); 	$classes[]=$class;
				$class=new Classe('retiro_cuenta_corriente'); 	$classes[]=$class;
				$class=new Classe('deposito_cuenta_corriente'); 	$classes[]=$class;
			
			
			$cuenta_corrientesResp=$this->cuenta_corrienteLogic->getcuenta_corrientes();
			
			$this->cuenta_corrienteLogic->setIsConDeep(true);
			
			$this->cuenta_corrienteLogic->setcuenta_corrientes($this->cuenta_corrientesAuxiliar);
			
			$this->cuenta_corrienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->cuenta_corrientesAuxiliar=$this->cuenta_corrienteLogic->getcuenta_corrientes();
			
			//RESPALDO
			$this->cuenta_corrienteLogic->setcuenta_corrientes($cuenta_corrientesResp);
			
			$this->cuenta_corrienteLogic->setIsConDeep(false);
			*/
			
			$this->cuenta_corrientesAuxiliar=$this->cargarRelaciones($this->cuenta_corrientesAuxiliar);
			
			$i=0;
			
			foreach ($this->cuenta_corrientesAuxiliar as $cuenta_corriente) {
				$row=array();
				
				if($i!=0) {
					$row=cuenta_corriente_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=cuenta_corriente_util::getDataReportRow($tipo,$cuenta_corriente,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//cheque_cuenta_corriente
				if(Funciones::existeCadenaArrayOrderBy(cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta_corriente->getcheque_cuenta_corrientes())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=cheque_cuenta_corriente_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta_corriente->getcheque_cuenta_corrientes() as $cheque_cuenta_corriente) {
						$row=cheque_cuenta_corriente_util::getDataReportRow('RELACIONADO',$cheque_cuenta_corriente,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//retiro_cuenta_corriente
				if(Funciones::existeCadenaArrayOrderBy(retiro_cuenta_corriente_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta_corriente->getretiro_cuenta_corrientes())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(retiro_cuenta_corriente_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=retiro_cuenta_corriente_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta_corriente->getretiro_cuenta_corrientes() as $retiro_cuenta_corriente) {
						$row=retiro_cuenta_corriente_util::getDataReportRow('RELACIONADO',$retiro_cuenta_corriente,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//deposito_cuenta_corriente
				if(Funciones::existeCadenaArrayOrderBy(deposito_cuenta_corriente_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta_corriente->getdeposito_cuenta_corrientes())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(deposito_cuenta_corriente_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=deposito_cuenta_corriente_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta_corriente->getdeposito_cuenta_corrientes() as $deposito_cuenta_corriente) {
						$row=deposito_cuenta_corriente_util::getDataReportRow('RELACIONADO',$deposito_cuenta_corriente,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->cuenta_corrientesAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_corrientesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->cuenta_corrientesAuxiliar)<=0) {
					$this->cuenta_corrientesAuxiliar=$this->cuenta_corrientes;
				}
			} else {
				$this->cuenta_corrientesAuxiliar=$this->cuenta_corrientes;
			}
		/*} else {
			$this->cuenta_corrientesAuxiliar=$this->cuenta_corrientesReporte;	
		}*/
		
		foreach ($this->cuenta_corrientesAuxiliar as $cuenta_corriente) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cuenta_corriente_util::getcuenta_corrienteDescripcion($cuenta_corriente),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Id Usuario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Id Usuario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente->getid_usuarioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Banco',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Banco',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente->getid_bancoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nro Cuenta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Cuenta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente->getnumero_cuenta(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Balance Inicial',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Balance Inicial',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente->getbalance_inicial(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Saldo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Saldo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente->getsaldo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Contador Cheque',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Contador Cheque',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente->getcontador_cheque(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Cuenta Contable',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta Contable',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente->getid_cuentaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descripcion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente->getdescripcion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Icono',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Icono',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente->geticono(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Estado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Estado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente->getid_estado_cuentas_corrientesDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface cuenta_corriente_base_controlI {			
		
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
		public function getIndiceActual(cuenta_corriente $cuenta_corriente,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(cuenta_corriente $cuenta_corriente,array $cuenta_corrientes);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : cuenta_corriente_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $cuenta_corrientes,cuenta_corriente $cuenta_corriente);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(cuenta_corriente_param_return $cuenta_corrienteReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(cuenta_corriente_session $cuenta_corriente_session);		
		public function actualizarInvitadoSessionDivStyleVariables(cuenta_corriente_session $cuenta_corriente_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(cuenta_corriente $cuenta_corrienteOrigen,cuenta_corriente $cuenta_corriente,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(cuenta_corriente_control $cuenta_corriente_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $cuenta_corrientes=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(cuenta_corriente_session $cuenta_corriente_session);		
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
		public function getHtmlTablaDatosResumen(array $cuenta_corrientes=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $cuenta_corrientes=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(cuenta_corriente $cuenta_corriente=null) : string;
		
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
