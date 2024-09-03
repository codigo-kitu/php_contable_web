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

namespace com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\business\entity\retiro_cuenta_corriente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/retiro_cuenta_corriente/util/retiro_cuenta_corriente_carga.php');
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\util\retiro_cuenta_corriente_carga;

use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\util\retiro_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\util\retiro_cuenta_corriente_param_return;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\business\logic\retiro_cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\business\logic\retiro_cuenta_corriente_logic_add;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\presentation\session\retiro_cuenta_corriente_session;


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

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\entity\estado_deposito_retiro;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\logic\estado_deposito_retiro_logic;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\util\estado_deposito_retiro_carga;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\util\estado_deposito_retiro_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
retiro_cuenta_corriente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
retiro_cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
retiro_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
retiro_cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*retiro_cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class retiro_cuenta_corriente_base_control extends retiro_cuenta_corriente_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->retiro_cuenta_corrienteClase==null) {		
				$this->retiro_cuenta_corrienteClase=new retiro_cuenta_corriente();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sucursal')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_sucursal',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_ejercicio',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_periodo',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_usuario')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_usuario',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_corriente')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta_corriente',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado_deposito_retiro')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_estado_deposito_retiro',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->retiro_cuenta_corrienteClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->retiro_cuenta_corrienteClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->retiro_cuenta_corrienteClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->retiro_cuenta_corrienteClase->setid_sucursal((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sucursal'));
				
				$this->retiro_cuenta_corrienteClase->setid_ejercicio((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio'));
				
				$this->retiro_cuenta_corrienteClase->setid_periodo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo'));
				
				$this->retiro_cuenta_corrienteClase->setid_usuario((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_usuario'));
				
				$this->retiro_cuenta_corrienteClase->setid_cuenta_corriente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_corriente'));
				
				$this->retiro_cuenta_corrienteClase->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_emision')));
				
				$this->retiro_cuenta_corrienteClase->setmonto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'monto'));
				
				$this->retiro_cuenta_corrienteClase->setmonto_texto($this->getDataCampoFormTabla('form'.$this->strSufijo,'monto_texto'));
				
				$this->retiro_cuenta_corrienteClase->setsaldo((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'saldo'));
				
				$this->retiro_cuenta_corrienteClase->setdescripcion($this->getDataCampoFormTabla('form'.$this->strSufijo,'descripcion'));
				
				$this->retiro_cuenta_corrienteClase->setid_estado_deposito_retiro((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado_deposito_retiro'));
				
				$this->retiro_cuenta_corrienteClase->setdebito((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'debito'));
				
				$this->retiro_cuenta_corrienteClase->setcredito((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'credito'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->retiro_cuenta_corrienteModel->set($this->retiro_cuenta_corrienteClase);
				
				/*$this->retiro_cuenta_corrienteModel->set($this->migrarModelretiro_cuenta_corriente($this->retiro_cuenta_corrienteClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setId($this->retiro_cuenta_corrienteClase->getId());	
			$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setVersionRow($this->retiro_cuenta_corrienteClase->getVersionRow());	
			$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setVersionRow($this->retiro_cuenta_corrienteClase->getVersionRow());	
			$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setid_empresa($this->retiro_cuenta_corrienteClase->getid_empresa());	
			$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setid_sucursal($this->retiro_cuenta_corrienteClase->getid_sucursal());	
			$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setid_ejercicio($this->retiro_cuenta_corrienteClase->getid_ejercicio());	
			$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setid_periodo($this->retiro_cuenta_corrienteClase->getid_periodo());	
			$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setid_usuario($this->retiro_cuenta_corrienteClase->getid_usuario());	
			$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setid_cuenta_corriente($this->retiro_cuenta_corrienteClase->getid_cuenta_corriente());	
			$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setfecha_emision($this->retiro_cuenta_corrienteClase->getfecha_emision());	
			$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setmonto($this->retiro_cuenta_corrienteClase->getmonto());	
			$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setmonto_texto($this->retiro_cuenta_corrienteClase->getmonto_texto());	
			$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setsaldo($this->retiro_cuenta_corrienteClase->getsaldo());	
			$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setdescripcion($this->retiro_cuenta_corrienteClase->getdescripcion());	
			$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setid_estado_deposito_retiro($this->retiro_cuenta_corrienteClase->getid_estado_deposito_retiro());	
			$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setdebito($this->retiro_cuenta_corrienteClase->getdebito());	
			$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setcredito($this->retiro_cuenta_corrienteClase->getcredito());	
		} else {
			$this->retiro_cuenta_corrienteClase->setId($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->getId());	
			$this->retiro_cuenta_corrienteClase->setVersionRow($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->getVersionRow());	
			$this->retiro_cuenta_corrienteClase->setVersionRow($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->getVersionRow());	
			$this->retiro_cuenta_corrienteClase->setid_empresa($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->getid_empresa());	
			$this->retiro_cuenta_corrienteClase->setid_sucursal($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->getid_sucursal());	
			$this->retiro_cuenta_corrienteClase->setid_ejercicio($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->getid_ejercicio());	
			$this->retiro_cuenta_corrienteClase->setid_periodo($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->getid_periodo());	
			$this->retiro_cuenta_corrienteClase->setid_usuario($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->getid_usuario());	
			$this->retiro_cuenta_corrienteClase->setid_cuenta_corriente($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->getid_cuenta_corriente());	
			$this->retiro_cuenta_corrienteClase->setfecha_emision($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->getfecha_emision());	
			$this->retiro_cuenta_corrienteClase->setmonto($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->getmonto());	
			$this->retiro_cuenta_corrienteClase->setmonto_texto($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->getmonto_texto());	
			$this->retiro_cuenta_corrienteClase->setsaldo($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->getsaldo());	
			$this->retiro_cuenta_corrienteClase->setdescripcion($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->getdescripcion());	
			$this->retiro_cuenta_corrienteClase->setid_estado_deposito_retiro($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->getid_estado_deposito_retiro());	
			$this->retiro_cuenta_corrienteClase->setdebito($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->getdebito());	
			$this->retiro_cuenta_corrienteClase->setcredito($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->getcredito());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->retiro_cuenta_corrienteModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='id_sucursal') {$this->strMensajeid_sucursal=$strMensajeCampo;}
		if($strNombreCampo=='id_ejercicio') {$this->strMensajeid_ejercicio=$strMensajeCampo;}
		if($strNombreCampo=='id_periodo') {$this->strMensajeid_periodo=$strMensajeCampo;}
		if($strNombreCampo=='id_usuario') {$this->strMensajeid_usuario=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta_corriente') {$this->strMensajeid_cuenta_corriente=$strMensajeCampo;}
		if($strNombreCampo=='fecha_emision') {$this->strMensajefecha_emision=$strMensajeCampo;}
		if($strNombreCampo=='monto') {$this->strMensajemonto=$strMensajeCampo;}
		if($strNombreCampo=='monto_texto') {$this->strMensajemonto_texto=$strMensajeCampo;}
		if($strNombreCampo=='saldo') {$this->strMensajesaldo=$strMensajeCampo;}
		if($strNombreCampo=='descripcion') {$this->strMensajedescripcion=$strMensajeCampo;}
		if($strNombreCampo=='id_estado_deposito_retiro') {$this->strMensajeid_estado_deposito_retiro=$strMensajeCampo;}
		if($strNombreCampo=='debito') {$this->strMensajedebito=$strMensajeCampo;}
		if($strNombreCampo=='credito') {$this->strMensajecredito=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeid_sucursal='';
		$this->strMensajeid_ejercicio='';
		$this->strMensajeid_periodo='';
		$this->strMensajeid_usuario='';
		$this->strMensajeid_cuenta_corriente='';
		$this->strMensajefecha_emision='';
		$this->strMensajemonto='';
		$this->strMensajemonto_texto='';
		$this->strMensajesaldo='';
		$this->strMensajedescripcion='';
		$this->strMensajeid_estado_deposito_retiro='';
		$this->strMensajedebito='';
		$this->strMensajecredito='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->retiro_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->retiro_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
				$this->retiro_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			$retiro_cuenta_corriente_session=unserialize($this->Session->read(retiro_cuenta_corriente_util::$STR_SESSION_NAME));
						
			if($retiro_cuenta_corriente_session==null) {
				$retiro_cuenta_corriente_session=new retiro_cuenta_corriente_session();
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
						$this->retiro_cuenta_corrienteLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->retiro_cuenta_corrienteActual =$this->retiro_cuenta_corrienteClase;
			
			/*$this->retiro_cuenta_corrienteActual =$this->migrarModelretiro_cuenta_corriente($this->retiro_cuenta_corrienteClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->retiro_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes(),$this->retiro_cuenta_corrienteActual);
			
			$this->actualizarControllerConReturnGeneral($this->retiro_cuenta_corrienteReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->retiro_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->getNewConnexionToDeep();
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
				$this->retiro_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->retiro_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->retiro_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$retiro_cuenta_corrientesLocal=$this->getListaActual();
		
		$iIndice=retiro_cuenta_corriente_util::getIndiceNuevo($retiro_cuenta_corrientesLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(retiro_cuenta_corriente $retiro_cuenta_corriente,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$retiro_cuenta_corrientesLocal=$this->getListaActual();
		
		$iIndice=retiro_cuenta_corriente_util::getIndiceActual($retiro_cuenta_corrientesLocal,$retiro_cuenta_corriente,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevoretiro_cuenta_corriente')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->retiro_cuenta_corrienteActual =$this->retiro_cuenta_corrienteClase;
			
			/*$this->retiro_cuenta_corrienteActual =$this->migrarModelretiro_cuenta_corriente($this->retiro_cuenta_corrienteClase);*/
			
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
			
			$this->retiro_cuenta_corrienteLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('cuenta_corriente');$classes[]=$class;
				$class=new Classe('estado_deposito_retiro');$classes[]=$class;
			
			$this->retiro_cuenta_corrienteLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->retiro_cuenta_corrienteLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->retiro_cuenta_corrienteLogic->setretiro_cuenta_corriente(new retiro_cuenta_corriente());
				
				$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setIsNew(true);
				$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setIsChanged(true);
				$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->retiro_cuenta_corrienteModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->retiro_cuenta_corrienteLogic->retiro_cuenta_corrientes[]=$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->retiro_cuenta_corrienteLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->retiro_cuenta_corrienteLogic->saveRelaciones($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente());/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setIsChanged(true);
				$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setIsNew(false);
				$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->retiro_cuenta_corrienteModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente(),$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->retiro_cuenta_corrienteLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->retiro_cuenta_corrienteLogic->saveRelaciones($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente());/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setIsDeleted(true);
				$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setIsNew(false);
				$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setIsChanged(false);				
				
				$this->actualizarLista($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente(),$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->retiro_cuenta_corrienteLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->retiro_cuenta_corrienteLogic->saveRelaciones($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->retiro_cuenta_corrientesEliminados[]=$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->retiro_cuenta_corrienteLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->retiro_cuenta_corrienteLogic->saveRelaciones($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->retiro_cuenta_corrientesEliminados=array();
				}
			}
			
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('cuenta_corriente');$classes[]=$class;
				$class=new Classe('estado_deposito_retiro');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->retiro_cuenta_corrienteLogic->setretiro_cuenta_corrientes();*/
					
					$this->retiro_cuenta_corrienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->retiro_cuenta_corrienteLogic->setIsConDeepLoad(false);
			
			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(retiro_cuenta_corriente_util::$STR_SESSION_NAME.'Lista',serialize($this->retiro_cuenta_corrientes));
				$this->Session->write(retiro_cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->retiro_cuenta_corrientesEliminados));
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
				$this->retiro_cuenta_corrienteLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->retiro_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->retiro_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
				$this->retiro_cuenta_corrienteLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalretiro_cuenta_corriente;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->retiro_cuenta_corrienteLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->retiro_cuenta_corrientes as $retiro_cuenta_corrienteLocal) {
				if($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->getId()==$retiro_cuenta_corrienteLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente()->setIsDeleted(true);
			$this->retiro_cuenta_corrientesEliminados[]=$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->retiro_cuenta_corrientes[$indice]);
				
				$this->retiro_cuenta_corrientes = array_values($this->retiro_cuenta_corrientes);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelretiro_cuenta_corriente($this->retiro_cuenta_corrienteClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->retiro_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->retiro_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(retiro_cuenta_corriente $retiro_cuenta_corriente,array $retiro_cuenta_corrientes) {
		try {
			foreach($retiro_cuenta_corrientes as $retiro_cuenta_corrienteLocal){ 
				if($retiro_cuenta_corrienteLocal->getId()==$retiro_cuenta_corriente->getId()) {
					$retiro_cuenta_corrienteLocal->setIsChanged($retiro_cuenta_corriente->getIsChanged());
					$retiro_cuenta_corrienteLocal->setIsNew($retiro_cuenta_corriente->getIsNew());
					$retiro_cuenta_corrienteLocal->setIsDeleted($retiro_cuenta_corriente->getIsDeleted());
					//$retiro_cuenta_corrienteLocal->setbitExpired($retiro_cuenta_corriente->getbitExpired());
					
					$retiro_cuenta_corrienteLocal->setId($retiro_cuenta_corriente->getId());	
					$retiro_cuenta_corrienteLocal->setVersionRow($retiro_cuenta_corriente->getVersionRow());	
					$retiro_cuenta_corrienteLocal->setVersionRow($retiro_cuenta_corriente->getVersionRow());	
					$retiro_cuenta_corrienteLocal->setid_empresa($retiro_cuenta_corriente->getid_empresa());	
					$retiro_cuenta_corrienteLocal->setid_sucursal($retiro_cuenta_corriente->getid_sucursal());	
					$retiro_cuenta_corrienteLocal->setid_ejercicio($retiro_cuenta_corriente->getid_ejercicio());	
					$retiro_cuenta_corrienteLocal->setid_periodo($retiro_cuenta_corriente->getid_periodo());	
					$retiro_cuenta_corrienteLocal->setid_usuario($retiro_cuenta_corriente->getid_usuario());	
					$retiro_cuenta_corrienteLocal->setid_cuenta_corriente($retiro_cuenta_corriente->getid_cuenta_corriente());	
					$retiro_cuenta_corrienteLocal->setfecha_emision($retiro_cuenta_corriente->getfecha_emision());	
					$retiro_cuenta_corrienteLocal->setmonto($retiro_cuenta_corriente->getmonto());	
					$retiro_cuenta_corrienteLocal->setmonto_texto($retiro_cuenta_corriente->getmonto_texto());	
					$retiro_cuenta_corrienteLocal->setsaldo($retiro_cuenta_corriente->getsaldo());	
					$retiro_cuenta_corrienteLocal->setdescripcion($retiro_cuenta_corriente->getdescripcion());	
					$retiro_cuenta_corrienteLocal->setid_estado_deposito_retiro($retiro_cuenta_corriente->getid_estado_deposito_retiro());	
					$retiro_cuenta_corrienteLocal->setdebito($retiro_cuenta_corriente->getdebito());	
					$retiro_cuenta_corrienteLocal->setcredito($retiro_cuenta_corriente->getcredito());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$retiro_cuenta_corrientesLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$retiro_cuenta_corrientesLocal=$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$retiro_cuenta_corrientesLocal=$this->retiro_cuenta_corrientes;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $retiro_cuenta_corrientesLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes() as $retiro_cuenta_corriente) {
				if($retiro_cuenta_corriente->getId()==$id) {
					$this->retiro_cuenta_corrienteLogic->setretiro_cuenta_corriente($retiro_cuenta_corriente);
					
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
		/*$retiro_cuenta_corrientesSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->retiro_cuenta_corrientes as $retiro_cuenta_corriente) {
			$retiro_cuenta_corriente->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->retiro_cuenta_corrientes[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : retiro_cuenta_corriente_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$retiro_cuenta_corriente_session=unserialize($this->Session->read(retiro_cuenta_corriente_util::$STR_SESSION_NAME));
						
		if($retiro_cuenta_corriente_session==null) {
			$retiro_cuenta_corriente_session=new retiro_cuenta_corriente_session();
		}
		
		
		$this->retiro_cuenta_corrienteReturnGeneral=new retiro_cuenta_corriente_param_return();
		$this->retiro_cuenta_corrienteParameterGeneral=new retiro_cuenta_corriente_param_return();
			
		$this->retiro_cuenta_corrienteParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualretiro_cuenta_corriente(this.retiro_cuenta_corriente,true);
			this.setVariablesFormularioToObjetoActualForeignKeysretiro_cuenta_corriente(this.retiro_cuenta_corriente);*/
			
			if($retiro_cuenta_corriente_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualretiro_cuenta_corriente(this.retiro_cuenta_corriente,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->retiro_cuenta_corrienteActual=$this->retiro_cuenta_corrienteClase;
				
				$this->setCopiarVariablesObjetos($this->retiro_cuenta_corrienteActual,$this->retiro_cuenta_corriente,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->retiro_cuenta_corrienteReturnGeneral=$this->retiro_cuenta_corrienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes(),$this->retiro_cuenta_corriente,$this->retiro_cuenta_corrienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($retiro_cuenta_corriente_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanretiro_cuenta_corriente($classes,$this->retiro_cuenta_corrienteReturnGeneral,$this->retiro_cuenta_corrienteBean,false);*/
				}
					
				if($this->retiro_cuenta_corrienteReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->retiro_cuenta_corrienteReturnGeneral->getretiro_cuenta_corriente(),$this->retiro_cuenta_corrienteActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeyretiro_cuenta_corriente($this->retiro_cuenta_corrienteReturnGeneral->getretiro_cuenta_corriente());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormularioretiro_cuenta_corriente($this->retiro_cuenta_corrienteReturnGeneral->getretiro_cuenta_corriente());*/
				}
					
				if($this->retiro_cuenta_corrienteReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->retiro_cuenta_corrienteReturnGeneral->getretiro_cuenta_corriente(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->retiro_cuenta_corriente,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(retiro_cuenta_corrienteJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualretiro_cuenta_corriente(this.retiro_cuenta_corriente,true);
				this.setVariablesFormularioToObjetoActualForeignKeysretiro_cuenta_corriente(this.retiro_cuenta_corriente);				
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
				
				if($this->retiro_cuenta_corrienteAnterior!=null) {
					$this->retiro_cuenta_corriente=$this->retiro_cuenta_corrienteAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->retiro_cuenta_corrienteReturnGeneral=$this->retiro_cuenta_corrienteLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes(),$this->retiro_cuenta_corriente,$this->retiro_cuenta_corrienteParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->retiro_cuenta_corrienteReturnGeneral->getretiro_cuenta_corriente(),$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes());
			*/
		}
		
		return $this->retiro_cuenta_corrienteReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			$this->retiro_cuenta_corrienteReturnGeneral=new retiro_cuenta_corriente_param_return();			
			$this->retiro_cuenta_corrienteParameterGeneral=new retiro_cuenta_corriente_param_return();
			
			$this->retiro_cuenta_corrienteParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->retiro_cuenta_corrienteReturnGeneral=$this->retiro_cuenta_corrienteLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->retiro_cuenta_corrientes,$this->retiro_cuenta_corrienteParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->retiro_cuenta_corrienteReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->retiro_cuenta_corrienteReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->retiro_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->retiro_cuenta_corrienteReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->retiro_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
		
		$this->retiro_cuenta_corrienteReturnGeneral=new retiro_cuenta_corriente_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_retiro_cuenta_corriente') {
		    $sDominio='retiro_cuenta_corriente';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->retiro_cuenta_corrienteReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->retiro_cuenta_corrienteReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='retiro_cuenta_corriente';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='retiro_cuenta_corriente';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='retiro_cuenta_corriente';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->retiro_cuenta_corrienteReturnGeneral=new retiro_cuenta_corriente_param_return();
		$this->retiro_cuenta_corrienteParameterGeneral=new retiro_cuenta_corriente_param_return();
			
		$this->retiro_cuenta_corrienteParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->retiro_cuenta_corrienteReturnGeneral=$this->retiro_cuenta_corrienteLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes(),$this->retiro_cuenta_corriente,$this->retiro_cuenta_corrienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->retiro_cuenta_corrienteReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->retiro_cuenta_corrienteReturnGeneral->getretiro_cuenta_corriente(),$classes);*/
		}									
	
		if($this->retiro_cuenta_corrienteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->retiro_cuenta_corrienteReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->retiro_cuenta_corrienteReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $retiro_cuenta_corrientes,retiro_cuenta_corriente $retiro_cuenta_corriente) {
		
		$retiro_cuenta_corriente_session=unserialize($this->Session->read(retiro_cuenta_corriente_util::$STR_SESSION_NAME));
						
		if($retiro_cuenta_corriente_session==null) {
			$retiro_cuenta_corriente_session=new retiro_cuenta_corriente_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(retiro_cuenta_corriente_util::$CLASSNAME);
			}	
			*/
			
			$this->retiro_cuenta_corrienteReturnGeneral=new retiro_cuenta_corriente_param_return();
			$this->retiro_cuenta_corrienteParameterGeneral=new retiro_cuenta_corriente_param_return();
			
			$this->retiro_cuenta_corrienteParameterGeneral->setdata($this->data);
		
		
			
		if($retiro_cuenta_corriente_session->conGuardarRelaciones) {
			$classes=retiro_cuenta_corriente_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->retiro_cuenta_corrienteActual,$this->retiro_cuenta_corriente,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->retiro_cuenta_corrienteReturnGeneral=$this->retiro_cuenta_corrienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes(),$this->retiro_cuenta_corrienteActual,$this->retiro_cuenta_corrienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->retiro_cuenta_corrienteReturnGeneral=$this->retiro_cuenta_corrienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$retiro_cuenta_corrientes,$retiro_cuenta_corriente,$this->retiro_cuenta_corrienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelretiro_cuenta_corriente($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente());*/
			
			$this->retiro_cuenta_corriente=$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->retiro_cuenta_corriente);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->retiro_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->retiro_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$retiro_cuenta_corrienteActual=new retiro_cuenta_corriente();
			
			if($this->retiro_cuenta_corrienteClase==null) {		
				$this->retiro_cuenta_corrienteClase=new retiro_cuenta_corriente();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$retiro_cuenta_corrienteActual=$this->retiro_cuenta_corrientes[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $retiro_cuenta_corrienteActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $retiro_cuenta_corrienteActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $retiro_cuenta_corrienteActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $retiro_cuenta_corrienteActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $retiro_cuenta_corrienteActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $retiro_cuenta_corrienteActual->setid_cuenta_corriente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $retiro_cuenta_corrienteActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $retiro_cuenta_corrienteActual->setmonto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $retiro_cuenta_corrienteActual->setmonto_texto($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $retiro_cuenta_corrienteActual->setsaldo((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $retiro_cuenta_corrienteActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $retiro_cuenta_corrienteActual->setid_estado_deposito_retiro((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $retiro_cuenta_corrienteActual->setdebito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $retiro_cuenta_corrienteActual->setcredito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }

				$this->retiro_cuenta_corrienteClase=$retiro_cuenta_corrienteActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->retiro_cuenta_corrienteModel->set($this->retiro_cuenta_corrienteClase);
				
				/*$this->retiro_cuenta_corrienteModel->set($this->migrarModelretiro_cuenta_corriente($this->retiro_cuenta_corrienteClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->retiro_cuenta_corrientes=$this->migrarModelretiro_cuenta_corriente($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes());							
		$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes();*/
		
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
			$this->Session->write(retiro_cuenta_corriente_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$retiro_cuenta_corriente_control_session=unserialize($this->Session->read(retiro_cuenta_corriente_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($retiro_cuenta_corriente_control_session==null) {
				$retiro_cuenta_corriente_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($retiro_cuenta_corriente_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(retiro_cuenta_corriente_util::$STR_SESSION_NAME,$this);*/
		} else {
			$retiro_cuenta_corriente_session=unserialize($this->Session->read(retiro_cuenta_corriente_util::$STR_SESSION_NAME));
			
			if($retiro_cuenta_corriente_session==null) {
				$retiro_cuenta_corriente_session=new retiro_cuenta_corriente_session();
			}
			
			$this->set(retiro_cuenta_corriente_util::$STR_SESSION_NAME, $retiro_cuenta_corriente_session);
		}
	}
	
	public function setCopiarVariablesObjetos(retiro_cuenta_corriente $retiro_cuenta_corrienteOrigen,retiro_cuenta_corriente $retiro_cuenta_corriente,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($retiro_cuenta_corriente==null) {
				$retiro_cuenta_corriente=new retiro_cuenta_corriente();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $retiro_cuenta_corrienteOrigen->getId()!=null && $retiro_cuenta_corrienteOrigen->getId()!=0)) {$retiro_cuenta_corriente->setId($retiro_cuenta_corrienteOrigen->getId());}}
			if($conDefault || ($conDefault==false && $retiro_cuenta_corrienteOrigen->getid_cuenta_corriente()!=null && $retiro_cuenta_corrienteOrigen->getid_cuenta_corriente()!=-1)) {$retiro_cuenta_corriente->setid_cuenta_corriente($retiro_cuenta_corrienteOrigen->getid_cuenta_corriente());}
			if($conDefault || ($conDefault==false && $retiro_cuenta_corrienteOrigen->getfecha_emision()!=null && $retiro_cuenta_corrienteOrigen->getfecha_emision()!=date('Y-m-d'))) {$retiro_cuenta_corriente->setfecha_emision($retiro_cuenta_corrienteOrigen->getfecha_emision());}
			if($conDefault || ($conDefault==false && $retiro_cuenta_corrienteOrigen->getmonto()!=null && $retiro_cuenta_corrienteOrigen->getmonto()!=0.0)) {$retiro_cuenta_corriente->setmonto($retiro_cuenta_corrienteOrigen->getmonto());}
			if($conDefault || ($conDefault==false && $retiro_cuenta_corrienteOrigen->getmonto_texto()!=null && $retiro_cuenta_corrienteOrigen->getmonto_texto()!='')) {$retiro_cuenta_corriente->setmonto_texto($retiro_cuenta_corrienteOrigen->getmonto_texto());}
			if($conDefault || ($conDefault==false && $retiro_cuenta_corrienteOrigen->getsaldo()!=null && $retiro_cuenta_corrienteOrigen->getsaldo()!=0.0)) {$retiro_cuenta_corriente->setsaldo($retiro_cuenta_corrienteOrigen->getsaldo());}
			if($conDefault || ($conDefault==false && $retiro_cuenta_corrienteOrigen->getdescripcion()!=null && $retiro_cuenta_corrienteOrigen->getdescripcion()!='')) {$retiro_cuenta_corriente->setdescripcion($retiro_cuenta_corrienteOrigen->getdescripcion());}
			if($conDefault || ($conDefault==false && $retiro_cuenta_corrienteOrigen->getid_estado_deposito_retiro()!=null && $retiro_cuenta_corrienteOrigen->getid_estado_deposito_retiro()!=-1)) {$retiro_cuenta_corriente->setid_estado_deposito_retiro($retiro_cuenta_corrienteOrigen->getid_estado_deposito_retiro());}
			if($conDefault || ($conDefault==false && $retiro_cuenta_corrienteOrigen->getdebito()!=null && $retiro_cuenta_corrienteOrigen->getdebito()!=0.0)) {$retiro_cuenta_corriente->setdebito($retiro_cuenta_corrienteOrigen->getdebito());}
			if($conDefault || ($conDefault==false && $retiro_cuenta_corrienteOrigen->getcredito()!=null && $retiro_cuenta_corrienteOrigen->getcredito()!=0.0)) {$retiro_cuenta_corriente->setcredito($retiro_cuenta_corrienteOrigen->getcredito());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$retiro_cuenta_corrientesSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$retiro_cuenta_corrientesSeleccionados[]=$this->retiro_cuenta_corrientes[$indice];
			}
		}
		
		return $retiro_cuenta_corrientesSeleccionados;
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
		$retiro_cuenta_corriente= new retiro_cuenta_corriente();
		
		foreach($this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes() as $retiro_cuenta_corriente) {
			
		}		
		
		if($retiro_cuenta_corriente!=null);
	}
	
	public function cargarRelaciones(array $retiro_cuenta_corrientes=array()) : array {	
		
		$retiro_cuenta_corrientesRespaldo = array();
		$retiro_cuenta_corrientesLocal = array();
		
		retiro_cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$retiro_cuenta_corrientesResp=array();
		$classes=array();
			
		
			
			
		$retiro_cuenta_corrientesRespaldo=$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes();
			
		$this->retiro_cuenta_corrienteLogic->setIsConDeep(true);
		
		$this->retiro_cuenta_corrienteLogic->setretiro_cuenta_corrientes($retiro_cuenta_corrientes);
			
		$this->retiro_cuenta_corrienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$retiro_cuenta_corrientesLocal=$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes();
			
		/*RESPALDO*/
		$this->retiro_cuenta_corrienteLogic->setretiro_cuenta_corrientes($retiro_cuenta_corrientesRespaldo);
			
		$this->retiro_cuenta_corrienteLogic->setIsConDeep(false);
		
		if($retiro_cuenta_corrientesResp!=null);
		
		return $retiro_cuenta_corrientesLocal;
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
				$this->retiro_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->retiro_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(retiro_cuenta_corriente_session $retiro_cuenta_corriente_session) {
		$retiro_cuenta_corriente_session->strTypeOnLoad=$this->strTypeOnLoadretiro_cuenta_corriente;
		$retiro_cuenta_corriente_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarretiro_cuenta_corriente;
		$retiro_cuenta_corriente_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarretiro_cuenta_corriente;
		$retiro_cuenta_corriente_session->bitEsPopup=$this->bitEsPopup;
		$retiro_cuenta_corriente_session->bitEsBusqueda=$this->bitEsBusqueda;
		$retiro_cuenta_corriente_session->strFuncionJs=$this->strFuncionJs;
		/*$retiro_cuenta_corriente_session->strSufijo=$this->strSufijo;*/
		$retiro_cuenta_corriente_session->bitEsRelaciones=$this->bitEsRelaciones;
		$retiro_cuenta_corriente_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, retiro_cuenta_corriente_util::$STR_NOMBRE_CLASE,0,false,false);				
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
		$retiro_cuenta_corrienteViewAdditional=new retiro_cuenta_corrienteView_add();
		$retiro_cuenta_corrienteViewAdditional->retiro_cuenta_corrientes=$this->retiro_cuenta_corrientes;
		$retiro_cuenta_corrienteViewAdditional->Session=$this->Session;
		
		return $retiro_cuenta_corrienteViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$retiro_cuenta_corrientesLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$retiro_cuenta_corrientesLocal=$this->retiro_cuenta_corrientes;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$retiro_cuenta_corrientesLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($retiro_cuenta_corrientesLocal)<=0) {
					$retiro_cuenta_corrientesLocal=$this->retiro_cuenta_corrientes;
				}
			} else {
				$retiro_cuenta_corrientesLocal=$this->retiro_cuenta_corrientes;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarretiro_cuenta_corrientesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarretiro_cuenta_corrientesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$retiro_cuenta_corrienteLogic=new retiro_cuenta_corriente_logic();
		$retiro_cuenta_corrienteLogic->setretiro_cuenta_corrientes($this->retiro_cuenta_corrientes);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cuenta_corriente');$classes[]=$class;
			$class=new Classe('estado_deposito_retiro');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$retiro_cuenta_corrienteLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->retiro_cuenta_corrientes=$retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->retiro_cuenta_corrientesLocal=$this->retiro_cuenta_corrientes;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=retiro_cuenta_corriente_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=retiro_cuenta_corriente_util::$STR_TABLE_NAME;		
			
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
			
			$retiro_cuenta_corrientes = $this->retiro_cuenta_corrientes;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = retiro_cuenta_corriente_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = retiro_cuenta_corriente_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/cuentascorrientes/presentation/templating/retiro_cuenta_corriente_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->retiro_cuenta_corrientes=$retiro_cuenta_corrientes;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->retiro_cuenta_corrientesLocal=$retiro_cuenta_corrientesLocal;
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
		
		$retiro_cuenta_corrientesLocal=array();
		
		$retiro_cuenta_corrientesLocal=$this->retiro_cuenta_corrientes;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarretiro_cuenta_corrientesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarretiro_cuenta_corrientesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$retiro_cuenta_corrienteLogic=new retiro_cuenta_corriente_logic();
		$retiro_cuenta_corrienteLogic->setretiro_cuenta_corrientes($this->retiro_cuenta_corrientes);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cuenta_corriente');$classes[]=$class;
			$class=new Classe('estado_deposito_retiro');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$retiro_cuenta_corrienteLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->retiro_cuenta_corrientes=$retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$retiro_cuenta_corrientes = $this->retiro_cuenta_corrientes;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = retiro_cuenta_corriente_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = retiro_cuenta_corriente_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/cuentascorrientes/presentation/templating/retiro_cuenta_corriente_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->retiro_cuenta_corrientes=$retiro_cuenta_corrientes;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->retiro_cuenta_corrientesLocal=$retiro_cuenta_corrientesLocal;
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
	
	public function getHtmlTablaDatosResumen(array $retiro_cuenta_corrientes=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->retiro_cuenta_corrientesReporte = $retiro_cuenta_corrientes;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarretiro_cuenta_corrientesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarretiro_cuenta_corrientesAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $retiro_cuenta_corrientes=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->retiro_cuenta_corrientesReporte = $retiro_cuenta_corrientes;		
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
		
		
		$this->retiro_cuenta_corrientesReporte=$this->cargarRelaciones($retiro_cuenta_corrientes);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarretiro_cuenta_corrientesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarretiro_cuenta_corrientesAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(retiro_cuenta_corriente $retiro_cuenta_corriente=null) : string {	
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
			
			
			$retiro_cuenta_corrientesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$retiro_cuenta_corrientesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($retiro_cuenta_corrientesLocal)<=0) {
					/*//DEBE ESCOGER
					$retiro_cuenta_corrientesLocal=$this->retiro_cuenta_corrientes;*/
				}
			} else {
				/*//DEBE ESCOGER
				$retiro_cuenta_corrientesLocal=$this->retiro_cuenta_corrientes;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($retiro_cuenta_corrientesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($retiro_cuenta_corrientesLocal,true);
			
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
				$this->retiro_cuenta_corrienteLogic->getNewConnexionToDeep();
			}
					
			$retiro_cuenta_corrientesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$retiro_cuenta_corrientesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($retiro_cuenta_corrientesLocal)<=0) {
					/*//DEBE ESCOGER
					$retiro_cuenta_corrientesLocal=$this->retiro_cuenta_corrientes;*/
				}
			} else {
				/*//DEBE ESCOGER
				$retiro_cuenta_corrientesLocal=$this->retiro_cuenta_corrientes;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($retiro_cuenta_corrientesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($retiro_cuenta_corrientesLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->retiro_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->retiro_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Retiro Cta Corrientes';
			
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
			$fileName='retiro_cuenta_corriente';
			
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
			
			$title='Reporte de  Retiro Cta Corrientes';
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
			
			$title='Reporte de  Retiro Cta Corrientes';
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
				$this->retiro_cuenta_corrienteLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Retiro Cta Corrientes';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->retiro_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retiro_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->retiro_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=retiro_cuenta_corriente_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->retiro_cuenta_corrientesAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->retiro_cuenta_corrientesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->retiro_cuenta_corrientesAuxiliar)<=0) {
					$this->retiro_cuenta_corrientesAuxiliar=$this->retiro_cuenta_corrientes;
				}
			} else {
				$this->retiro_cuenta_corrientesAuxiliar=$this->retiro_cuenta_corrientes;
			}
		/*} else {
			$this->retiro_cuenta_corrientesAuxiliar=$this->retiro_cuenta_corrientesReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->retiro_cuenta_corrientesAuxiliar as $retiro_cuenta_corriente) {
				$row=array();
				
				$row=retiro_cuenta_corriente_util::getDataReportRow($tipo,$retiro_cuenta_corriente,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			retiro_cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$retiro_cuenta_corrientesResp=array();
			$classes=array();
			
			
			
			
			$retiro_cuenta_corrientesResp=$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes();
			
			$this->retiro_cuenta_corrienteLogic->setIsConDeep(true);
			
			$this->retiro_cuenta_corrienteLogic->setretiro_cuenta_corrientes($this->retiro_cuenta_corrientesAuxiliar);
			
			$this->retiro_cuenta_corrienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->retiro_cuenta_corrientesAuxiliar=$this->retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes();
			
			//RESPALDO
			$this->retiro_cuenta_corrienteLogic->setretiro_cuenta_corrientes($retiro_cuenta_corrientesResp);
			
			$this->retiro_cuenta_corrienteLogic->setIsConDeep(false);
			*/
			
			$this->retiro_cuenta_corrientesAuxiliar=$this->cargarRelaciones($this->retiro_cuenta_corrientesAuxiliar);
			
			$i=0;
			
			foreach ($this->retiro_cuenta_corrientesAuxiliar as $retiro_cuenta_corriente) {
				$row=array();
				
				if($i!=0) {
					$row=retiro_cuenta_corriente_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=retiro_cuenta_corriente_util::getDataReportRow($tipo,$retiro_cuenta_corriente,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
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
		$this->retiro_cuenta_corrientesAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->retiro_cuenta_corrientesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->retiro_cuenta_corrientesAuxiliar)<=0) {
					$this->retiro_cuenta_corrientesAuxiliar=$this->retiro_cuenta_corrientes;
				}
			} else {
				$this->retiro_cuenta_corrientesAuxiliar=$this->retiro_cuenta_corrientes;
			}
		/*} else {
			$this->retiro_cuenta_corrientesAuxiliar=$this->retiro_cuenta_corrientesReporte;	
		}*/
		
		foreach ($this->retiro_cuenta_corrientesAuxiliar as $retiro_cuenta_corriente) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(retiro_cuenta_corriente_util::getretiro_cuenta_corrienteDescripcion($retiro_cuenta_corriente),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy(' Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Sucursal',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Sucursal',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getid_sucursalDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Ejercicio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Ejercicio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getid_ejercicioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Periodo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Periodo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getid_periodoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Usuario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Usuario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getid_usuarioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Cuenta Corriente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta Corriente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getid_cuenta_corrienteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Emision',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Emision',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getfecha_emision(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getmonto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Monto Texto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto Texto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getmonto_texto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Saldo Actual',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Saldo Actual',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getsaldo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descripcion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getdescripcion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Estado Deposito Retiro',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Estado Deposito Retiro',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getid_estado_deposito_retiroDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Debito',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Debito',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getdebito(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Credito',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Credito',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getcredito(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface retiro_cuenta_corriente_base_controlI {			
		
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
		public function getIndiceActual(retiro_cuenta_corriente $retiro_cuenta_corriente,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(retiro_cuenta_corriente $retiro_cuenta_corriente,array $retiro_cuenta_corrientes);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : retiro_cuenta_corriente_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $retiro_cuenta_corrientes,retiro_cuenta_corriente $retiro_cuenta_corriente);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(retiro_cuenta_corriente_param_return $retiro_cuenta_corrienteReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(retiro_cuenta_corriente_session $retiro_cuenta_corriente_session);		
		public function actualizarInvitadoSessionDivStyleVariables(retiro_cuenta_corriente_session $retiro_cuenta_corriente_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(retiro_cuenta_corriente $retiro_cuenta_corrienteOrigen,retiro_cuenta_corriente $retiro_cuenta_corriente,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(retiro_cuenta_corriente_control $retiro_cuenta_corriente_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $retiro_cuenta_corrientes=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(retiro_cuenta_corriente_session $retiro_cuenta_corriente_session);		
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
		public function getHtmlTablaDatosResumen(array $retiro_cuenta_corrientes=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $retiro_cuenta_corrientes=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(retiro_cuenta_corriente $retiro_cuenta_corriente=null) : string;
		
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
