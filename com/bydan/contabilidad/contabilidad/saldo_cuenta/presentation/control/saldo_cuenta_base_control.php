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

namespace com\bydan\contabilidad\contabilidad\saldo_cuenta\presentation\control;

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

use com\bydan\contabilidad\contabilidad\saldo_cuenta\business\entity\saldo_cuenta;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/saldo_cuenta/util/saldo_cuenta_carga.php');
use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_carga;

use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_util;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_param_return;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\business\logic\saldo_cuenta_logic;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\presentation\session\saldo_cuenta_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_carga;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_carga;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\entity\tipo_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\logic\tipo_cuenta_logic;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_carga;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
saldo_cuenta_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
saldo_cuenta_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
saldo_cuenta_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
saldo_cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*saldo_cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class saldo_cuenta_base_control extends saldo_cuenta_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->saldo_cuentaClase==null) {		
				$this->saldo_cuentaClase=new saldo_cuenta();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_ejercicio',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_periodo',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_cuenta')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_tipo_cuenta',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->saldo_cuentaClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->saldo_cuentaClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->saldo_cuentaClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->saldo_cuentaClase->setid_ejercicio((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio'));
				
				$this->saldo_cuentaClase->setid_periodo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo'));
				
				$this->saldo_cuentaClase->setid_tipo_cuenta((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_cuenta'));
				
				$this->saldo_cuentaClase->setid_cuenta((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta'));
				
				$this->saldo_cuentaClase->setsuma_debe((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'suma_debe'));
				
				$this->saldo_cuentaClase->setsuma_haber((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'suma_haber'));
				
				$this->saldo_cuentaClase->setdeudor((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'deudor'));
				
				$this->saldo_cuentaClase->setacreedor((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'acreedor'));
				
				$this->saldo_cuentaClase->setsaldo((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'saldo'));
				
				$this->saldo_cuentaClase->setfecha_proceso(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_proceso')));
				
				$this->saldo_cuentaClase->setfecha_fin_mes(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_fin_mes')));
				
				$this->saldo_cuentaClase->settipo_cuenta_codigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'tipo_cuenta_codigo'));
				
				$this->saldo_cuentaClase->setcuenta_contable($this->getDataCampoFormTabla('form'.$this->strSufijo,'cuenta_contable'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->saldo_cuentaModel->set($this->saldo_cuentaClase);
				
				/*$this->saldo_cuentaModel->set($this->migrarModelsaldo_cuenta($this->saldo_cuentaClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->saldo_cuentaLogic->getsaldo_cuenta()->setId($this->saldo_cuentaClase->getId());	
			$this->saldo_cuentaLogic->getsaldo_cuenta()->setVersionRow($this->saldo_cuentaClase->getVersionRow());	
			$this->saldo_cuentaLogic->getsaldo_cuenta()->setVersionRow($this->saldo_cuentaClase->getVersionRow());	
			$this->saldo_cuentaLogic->getsaldo_cuenta()->setid_empresa($this->saldo_cuentaClase->getid_empresa());	
			$this->saldo_cuentaLogic->getsaldo_cuenta()->setid_ejercicio($this->saldo_cuentaClase->getid_ejercicio());	
			$this->saldo_cuentaLogic->getsaldo_cuenta()->setid_periodo($this->saldo_cuentaClase->getid_periodo());	
			$this->saldo_cuentaLogic->getsaldo_cuenta()->setid_tipo_cuenta($this->saldo_cuentaClase->getid_tipo_cuenta());	
			$this->saldo_cuentaLogic->getsaldo_cuenta()->setid_cuenta($this->saldo_cuentaClase->getid_cuenta());	
			$this->saldo_cuentaLogic->getsaldo_cuenta()->setsuma_debe($this->saldo_cuentaClase->getsuma_debe());	
			$this->saldo_cuentaLogic->getsaldo_cuenta()->setsuma_haber($this->saldo_cuentaClase->getsuma_haber());	
			$this->saldo_cuentaLogic->getsaldo_cuenta()->setdeudor($this->saldo_cuentaClase->getdeudor());	
			$this->saldo_cuentaLogic->getsaldo_cuenta()->setacreedor($this->saldo_cuentaClase->getacreedor());	
			$this->saldo_cuentaLogic->getsaldo_cuenta()->setsaldo($this->saldo_cuentaClase->getsaldo());	
			$this->saldo_cuentaLogic->getsaldo_cuenta()->setfecha_proceso($this->saldo_cuentaClase->getfecha_proceso());	
			$this->saldo_cuentaLogic->getsaldo_cuenta()->setfecha_fin_mes($this->saldo_cuentaClase->getfecha_fin_mes());	
			$this->saldo_cuentaLogic->getsaldo_cuenta()->settipo_cuenta_codigo($this->saldo_cuentaClase->gettipo_cuenta_codigo());	
			$this->saldo_cuentaLogic->getsaldo_cuenta()->setcuenta_contable($this->saldo_cuentaClase->getcuenta_contable());	
		} else {
			$this->saldo_cuentaClase->setId($this->saldo_cuentaLogic->getsaldo_cuenta()->getId());	
			$this->saldo_cuentaClase->setVersionRow($this->saldo_cuentaLogic->getsaldo_cuenta()->getVersionRow());	
			$this->saldo_cuentaClase->setVersionRow($this->saldo_cuentaLogic->getsaldo_cuenta()->getVersionRow());	
			$this->saldo_cuentaClase->setid_empresa($this->saldo_cuentaLogic->getsaldo_cuenta()->getid_empresa());	
			$this->saldo_cuentaClase->setid_ejercicio($this->saldo_cuentaLogic->getsaldo_cuenta()->getid_ejercicio());	
			$this->saldo_cuentaClase->setid_periodo($this->saldo_cuentaLogic->getsaldo_cuenta()->getid_periodo());	
			$this->saldo_cuentaClase->setid_tipo_cuenta($this->saldo_cuentaLogic->getsaldo_cuenta()->getid_tipo_cuenta());	
			$this->saldo_cuentaClase->setid_cuenta($this->saldo_cuentaLogic->getsaldo_cuenta()->getid_cuenta());	
			$this->saldo_cuentaClase->setsuma_debe($this->saldo_cuentaLogic->getsaldo_cuenta()->getsuma_debe());	
			$this->saldo_cuentaClase->setsuma_haber($this->saldo_cuentaLogic->getsaldo_cuenta()->getsuma_haber());	
			$this->saldo_cuentaClase->setdeudor($this->saldo_cuentaLogic->getsaldo_cuenta()->getdeudor());	
			$this->saldo_cuentaClase->setacreedor($this->saldo_cuentaLogic->getsaldo_cuenta()->getacreedor());	
			$this->saldo_cuentaClase->setsaldo($this->saldo_cuentaLogic->getsaldo_cuenta()->getsaldo());	
			$this->saldo_cuentaClase->setfecha_proceso($this->saldo_cuentaLogic->getsaldo_cuenta()->getfecha_proceso());	
			$this->saldo_cuentaClase->setfecha_fin_mes($this->saldo_cuentaLogic->getsaldo_cuenta()->getfecha_fin_mes());	
			$this->saldo_cuentaClase->settipo_cuenta_codigo($this->saldo_cuentaLogic->getsaldo_cuenta()->gettipo_cuenta_codigo());	
			$this->saldo_cuentaClase->setcuenta_contable($this->saldo_cuentaLogic->getsaldo_cuenta()->getcuenta_contable());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->saldo_cuentaModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='id_ejercicio') {$this->strMensajeid_ejercicio=$strMensajeCampo;}
		if($strNombreCampo=='id_periodo') {$this->strMensajeid_periodo=$strMensajeCampo;}
		if($strNombreCampo=='id_tipo_cuenta') {$this->strMensajeid_tipo_cuenta=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta') {$this->strMensajeid_cuenta=$strMensajeCampo;}
		if($strNombreCampo=='suma_debe') {$this->strMensajesuma_debe=$strMensajeCampo;}
		if($strNombreCampo=='suma_haber') {$this->strMensajesuma_haber=$strMensajeCampo;}
		if($strNombreCampo=='deudor') {$this->strMensajedeudor=$strMensajeCampo;}
		if($strNombreCampo=='acreedor') {$this->strMensajeacreedor=$strMensajeCampo;}
		if($strNombreCampo=='saldo') {$this->strMensajesaldo=$strMensajeCampo;}
		if($strNombreCampo=='fecha_proceso') {$this->strMensajefecha_proceso=$strMensajeCampo;}
		if($strNombreCampo=='fecha_fin_mes') {$this->strMensajefecha_fin_mes=$strMensajeCampo;}
		if($strNombreCampo=='tipo_cuenta_codigo') {$this->strMensajetipo_cuenta_codigo=$strMensajeCampo;}
		if($strNombreCampo=='cuenta_contable') {$this->strMensajecuenta_contable=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeid_ejercicio='';
		$this->strMensajeid_periodo='';
		$this->strMensajeid_tipo_cuenta='';
		$this->strMensajeid_cuenta='';
		$this->strMensajesuma_debe='';
		$this->strMensajesuma_haber='';
		$this->strMensajedeudor='';
		$this->strMensajeacreedor='';
		$this->strMensajesaldo='';
		$this->strMensajefecha_proceso='';
		$this->strMensajefecha_fin_mes='';
		$this->strMensajetipo_cuenta_codigo='';
		$this->strMensajecuenta_contable='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
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
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}

			$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));
						
			if($saldo_cuenta_session==null) {
				$saldo_cuenta_session=new saldo_cuenta_session();
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
						$this->saldo_cuentaLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->saldo_cuentaActual =$this->saldo_cuentaClase;
			
			/*$this->saldo_cuentaActual =$this->migrarModelsaldo_cuenta($this->saldo_cuentaClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->saldo_cuentaLogic->getsaldo_cuentas(),$this->saldo_cuentaActual);
			
			$this->actualizarControllerConReturnGeneral($this->saldo_cuentaReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
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
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$saldo_cuentasLocal=$this->getListaActual();
		
		$iIndice=saldo_cuenta_util::getIndiceNuevo($saldo_cuentasLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(saldo_cuenta $saldo_cuenta,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$saldo_cuentasLocal=$this->getListaActual();
		
		$iIndice=saldo_cuenta_util::getIndiceActual($saldo_cuentasLocal,$saldo_cuenta,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevosaldo_cuenta')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->saldo_cuentaActual =$this->saldo_cuentaClase;
			
			/*$this->saldo_cuentaActual =$this->migrarModelsaldo_cuenta($this->saldo_cuentaClase);*/
			
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
			
			$this->saldo_cuentaLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('tipo_cuenta');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
			
			$this->saldo_cuentaLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->saldo_cuentaLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->saldo_cuentaLogic->setsaldo_cuenta(new saldo_cuenta());
				
				$this->saldo_cuentaLogic->getsaldo_cuenta()->setIsNew(true);
				$this->saldo_cuentaLogic->getsaldo_cuenta()->setIsChanged(true);
				$this->saldo_cuentaLogic->getsaldo_cuenta()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->saldo_cuentaModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->saldo_cuentaLogic->saldo_cuentas[]=$this->saldo_cuentaLogic->getsaldo_cuenta();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->saldo_cuentaLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->saldo_cuentaLogic->saveRelaciones($this->saldo_cuentaLogic->getsaldo_cuenta());/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->saldo_cuentaLogic->getsaldo_cuenta()->setIsChanged(true);
				$this->saldo_cuentaLogic->getsaldo_cuenta()->setIsNew(false);
				$this->saldo_cuentaLogic->getsaldo_cuenta()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->saldo_cuentaModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->saldo_cuentaLogic->getsaldo_cuenta(),$this->saldo_cuentaLogic->getsaldo_cuentas());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->saldo_cuentaLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->saldo_cuentaLogic->saveRelaciones($this->saldo_cuentaLogic->getsaldo_cuenta());/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->saldo_cuentaLogic->getsaldo_cuenta()->setIsDeleted(true);
				$this->saldo_cuentaLogic->getsaldo_cuenta()->setIsNew(false);
				$this->saldo_cuentaLogic->getsaldo_cuenta()->setIsChanged(false);				
				
				$this->actualizarLista($this->saldo_cuentaLogic->getsaldo_cuenta(),$this->saldo_cuentaLogic->getsaldo_cuentas());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->saldo_cuentaLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->saldo_cuentaLogic->saveRelaciones($this->saldo_cuentaLogic->getsaldo_cuenta());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->saldo_cuentasEliminados[]=$this->saldo_cuentaLogic->getsaldo_cuenta();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->saldo_cuentaLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->saldo_cuentaLogic->saveRelaciones($this->saldo_cuentaLogic->getsaldo_cuenta());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->saldo_cuentasEliminados=array();
				}
			}
			
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('tipo_cuenta');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->saldo_cuentaLogic->setsaldo_cuentas();*/
					
					$this->saldo_cuentaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->saldo_cuentaLogic->setIsConDeepLoad(false);
			
			$this->saldo_cuentas=$this->saldo_cuentaLogic->getsaldo_cuentas();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(saldo_cuenta_util::$STR_SESSION_NAME.'Lista',serialize($this->saldo_cuentas));
				$this->Session->write(saldo_cuenta_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->saldo_cuentasEliminados));
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
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
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
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalsaldo_cuenta;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->saldo_cuentaLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->saldo_cuentas as $saldo_cuentaLocal) {
				if($this->saldo_cuentaLogic->getsaldo_cuenta()->getId()==$saldo_cuentaLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->saldo_cuentaLogic->getsaldo_cuenta()->setIsDeleted(true);
			$this->saldo_cuentasEliminados[]=$this->saldo_cuentaLogic->getsaldo_cuenta();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->saldo_cuentas[$indice]);
				
				$this->saldo_cuentas = array_values($this->saldo_cuentas);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelsaldo_cuenta($this->saldo_cuentaClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(saldo_cuenta $saldo_cuenta,array $saldo_cuentas) {
		try {
			foreach($saldo_cuentas as $saldo_cuentaLocal){ 
				if($saldo_cuentaLocal->getId()==$saldo_cuenta->getId()) {
					$saldo_cuentaLocal->setIsChanged($saldo_cuenta->getIsChanged());
					$saldo_cuentaLocal->setIsNew($saldo_cuenta->getIsNew());
					$saldo_cuentaLocal->setIsDeleted($saldo_cuenta->getIsDeleted());
					//$saldo_cuentaLocal->setbitExpired($saldo_cuenta->getbitExpired());
					
					$saldo_cuentaLocal->setId($saldo_cuenta->getId());	
					$saldo_cuentaLocal->setVersionRow($saldo_cuenta->getVersionRow());	
					$saldo_cuentaLocal->setVersionRow($saldo_cuenta->getVersionRow());	
					$saldo_cuentaLocal->setid_empresa($saldo_cuenta->getid_empresa());	
					$saldo_cuentaLocal->setid_ejercicio($saldo_cuenta->getid_ejercicio());	
					$saldo_cuentaLocal->setid_periodo($saldo_cuenta->getid_periodo());	
					$saldo_cuentaLocal->setid_tipo_cuenta($saldo_cuenta->getid_tipo_cuenta());	
					$saldo_cuentaLocal->setid_cuenta($saldo_cuenta->getid_cuenta());	
					$saldo_cuentaLocal->setsuma_debe($saldo_cuenta->getsuma_debe());	
					$saldo_cuentaLocal->setsuma_haber($saldo_cuenta->getsuma_haber());	
					$saldo_cuentaLocal->setdeudor($saldo_cuenta->getdeudor());	
					$saldo_cuentaLocal->setacreedor($saldo_cuenta->getacreedor());	
					$saldo_cuentaLocal->setsaldo($saldo_cuenta->getsaldo());	
					$saldo_cuentaLocal->setfecha_proceso($saldo_cuenta->getfecha_proceso());	
					$saldo_cuentaLocal->setfecha_fin_mes($saldo_cuenta->getfecha_fin_mes());	
					$saldo_cuentaLocal->settipo_cuenta_codigo($saldo_cuenta->gettipo_cuenta_codigo());	
					$saldo_cuentaLocal->setcuenta_contable($saldo_cuenta->getcuenta_contable());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$saldo_cuentasLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$saldo_cuentasLocal=$this->saldo_cuentaLogic->getsaldo_cuentas();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$saldo_cuentasLocal=$this->saldo_cuentas;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $saldo_cuentasLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->saldo_cuentaLogic->getsaldo_cuentas() as $saldo_cuenta) {
				if($saldo_cuenta->getId()==$id) {
					$this->saldo_cuentaLogic->setsaldo_cuenta($saldo_cuenta);
					
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
		/*$saldo_cuentasSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->saldo_cuentas as $saldo_cuenta) {
			$saldo_cuenta->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->saldo_cuentas[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : saldo_cuenta_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));
						
		if($saldo_cuenta_session==null) {
			$saldo_cuenta_session=new saldo_cuenta_session();
		}
		
		
		$this->saldo_cuentaReturnGeneral=new saldo_cuenta_param_return();
		$this->saldo_cuentaParameterGeneral=new saldo_cuenta_param_return();
			
		$this->saldo_cuentaParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualsaldo_cuenta(this.saldo_cuenta,true);
			this.setVariablesFormularioToObjetoActualForeignKeyssaldo_cuenta(this.saldo_cuenta);*/
			
			if($saldo_cuenta_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualsaldo_cuenta(this.saldo_cuenta,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->saldo_cuentaActual=$this->saldo_cuentaClase;
				
				$this->setCopiarVariablesObjetos($this->saldo_cuentaActual,$this->saldo_cuenta,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->saldo_cuentaReturnGeneral=$this->saldo_cuentaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->saldo_cuentaLogic->getsaldo_cuentas(),$this->saldo_cuenta,$this->saldo_cuentaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($saldo_cuenta_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeansaldo_cuenta($classes,$this->saldo_cuentaReturnGeneral,$this->saldo_cuentaBean,false);*/
				}
					
				if($this->saldo_cuentaReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->saldo_cuentaReturnGeneral->getsaldo_cuenta(),$this->saldo_cuentaActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeysaldo_cuenta($this->saldo_cuentaReturnGeneral->getsaldo_cuenta());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariosaldo_cuenta($this->saldo_cuentaReturnGeneral->getsaldo_cuenta());*/
				}
					
				if($this->saldo_cuentaReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->saldo_cuentaReturnGeneral->getsaldo_cuenta(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->saldo_cuenta,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(saldo_cuentaJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualsaldo_cuenta(this.saldo_cuenta,true);
				this.setVariablesFormularioToObjetoActualForeignKeyssaldo_cuenta(this.saldo_cuenta);				
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
				
				if($this->saldo_cuentaAnterior!=null) {
					$this->saldo_cuenta=$this->saldo_cuentaAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->saldo_cuentaReturnGeneral=$this->saldo_cuentaLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->saldo_cuentaLogic->getsaldo_cuentas(),$this->saldo_cuenta,$this->saldo_cuentaParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->saldo_cuentaReturnGeneral->getsaldo_cuenta(),$this->saldo_cuentaLogic->getsaldo_cuentas());
			*/
		}
		
		return $this->saldo_cuentaReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}

			$this->saldo_cuentaReturnGeneral=new saldo_cuenta_param_return();			
			$this->saldo_cuentaParameterGeneral=new saldo_cuenta_param_return();
			
			$this->saldo_cuentaParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->saldo_cuentaReturnGeneral=$this->saldo_cuentaLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->saldo_cuentas,$this->saldo_cuentaParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->saldo_cuentaReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->saldo_cuentaReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->saldo_cuentaReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
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
		
		$this->saldo_cuentaReturnGeneral=new saldo_cuenta_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_saldo_cuenta') {
		    $sDominio='saldo_cuenta';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->saldo_cuentaReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->saldo_cuentaReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='saldo_cuenta';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='saldo_cuenta';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='saldo_cuenta';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->saldo_cuentaReturnGeneral=new saldo_cuenta_param_return();
		$this->saldo_cuentaParameterGeneral=new saldo_cuenta_param_return();
			
		$this->saldo_cuentaParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->saldo_cuentaReturnGeneral=$this->saldo_cuentaLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->saldo_cuentaLogic->getsaldo_cuentas(),$this->saldo_cuenta,$this->saldo_cuentaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->saldo_cuentaReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->saldo_cuentaReturnGeneral->getsaldo_cuenta(),$classes);*/
		}									
	
		if($this->saldo_cuentaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->saldo_cuentaReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->saldo_cuentaReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $saldo_cuentas,saldo_cuenta $saldo_cuenta) {
		
		$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));
						
		if($saldo_cuenta_session==null) {
			$saldo_cuenta_session=new saldo_cuenta_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(saldo_cuenta_util::$CLASSNAME);
			}	
			*/
			
			$this->saldo_cuentaReturnGeneral=new saldo_cuenta_param_return();
			$this->saldo_cuentaParameterGeneral=new saldo_cuenta_param_return();
			
			$this->saldo_cuentaParameterGeneral->setdata($this->data);
		
		
			
		if($saldo_cuenta_session->conGuardarRelaciones) {
			$classes=saldo_cuenta_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->saldo_cuentaActual,$this->saldo_cuenta,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->saldo_cuentaReturnGeneral=$this->saldo_cuentaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->saldo_cuentaLogic->getsaldo_cuentas(),$this->saldo_cuentaActual,$this->saldo_cuentaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->saldo_cuentaReturnGeneral=$this->saldo_cuentaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$saldo_cuentas,$saldo_cuenta,$this->saldo_cuentaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelsaldo_cuenta($this->saldo_cuentaLogic->getsaldo_cuenta());*/
			
			$this->saldo_cuenta=$this->saldo_cuentaLogic->getsaldo_cuenta();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->saldo_cuenta);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$saldo_cuentaActual=new saldo_cuenta();
			
			if($this->saldo_cuentaClase==null) {		
				$this->saldo_cuentaClase=new saldo_cuenta();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$saldo_cuentaActual=$this->saldo_cuentas[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $saldo_cuentaActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $saldo_cuentaActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $saldo_cuentaActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $saldo_cuentaActual->setid_tipo_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $saldo_cuentaActual->setid_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $saldo_cuentaActual->setsuma_debe((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $saldo_cuentaActual->setsuma_haber((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $saldo_cuentaActual->setdeudor((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $saldo_cuentaActual->setacreedor((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $saldo_cuentaActual->setsaldo((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $saldo_cuentaActual->setfecha_proceso(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $saldo_cuentaActual->setfecha_fin_mes(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $saldo_cuentaActual->settipo_cuenta_codigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $saldo_cuentaActual->setcuenta_contable($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }

				$this->saldo_cuentaClase=$saldo_cuentaActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->saldo_cuentaModel->set($this->saldo_cuentaClase);
				
				/*$this->saldo_cuentaModel->set($this->migrarModelsaldo_cuenta($this->saldo_cuentaClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->saldo_cuentas=$this->migrarModelsaldo_cuenta($this->saldo_cuentaLogic->getsaldo_cuentas());							
		$this->saldo_cuentas=$this->saldo_cuentaLogic->getsaldo_cuentas();*/
		
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
			$this->Session->write(saldo_cuenta_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$saldo_cuenta_control_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($saldo_cuenta_control_session==null) {
				$saldo_cuenta_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($saldo_cuenta_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(saldo_cuenta_util::$STR_SESSION_NAME,$this);*/
		} else {
			$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));
			
			if($saldo_cuenta_session==null) {
				$saldo_cuenta_session=new saldo_cuenta_session();
			}
			
			$this->set(saldo_cuenta_util::$STR_SESSION_NAME, $saldo_cuenta_session);
		}
	}
	
	public function setCopiarVariablesObjetos(saldo_cuenta $saldo_cuentaOrigen,saldo_cuenta $saldo_cuenta,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($saldo_cuenta==null) {
				$saldo_cuenta=new saldo_cuenta();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $saldo_cuentaOrigen->getId()!=null && $saldo_cuentaOrigen->getId()!=0)) {$saldo_cuenta->setId($saldo_cuentaOrigen->getId());}}
			if($conDefault || ($conDefault==false && $saldo_cuentaOrigen->getid_ejercicio()!=null && $saldo_cuentaOrigen->getid_ejercicio()!=-1)) {$saldo_cuenta->setid_ejercicio($saldo_cuentaOrigen->getid_ejercicio());}
			if($conDefault || ($conDefault==false && $saldo_cuentaOrigen->getid_periodo()!=null && $saldo_cuentaOrigen->getid_periodo()!=-1)) {$saldo_cuenta->setid_periodo($saldo_cuentaOrigen->getid_periodo());}
			if($conDefault || ($conDefault==false && $saldo_cuentaOrigen->getid_tipo_cuenta()!=null && $saldo_cuentaOrigen->getid_tipo_cuenta()!=-1)) {$saldo_cuenta->setid_tipo_cuenta($saldo_cuentaOrigen->getid_tipo_cuenta());}
			if($conDefault || ($conDefault==false && $saldo_cuentaOrigen->getid_cuenta()!=null && $saldo_cuentaOrigen->getid_cuenta()!=-1)) {$saldo_cuenta->setid_cuenta($saldo_cuentaOrigen->getid_cuenta());}
			if($conDefault || ($conDefault==false && $saldo_cuentaOrigen->getsuma_debe()!=null && $saldo_cuentaOrigen->getsuma_debe()!=0.0)) {$saldo_cuenta->setsuma_debe($saldo_cuentaOrigen->getsuma_debe());}
			if($conDefault || ($conDefault==false && $saldo_cuentaOrigen->getsuma_haber()!=null && $saldo_cuentaOrigen->getsuma_haber()!=0.0)) {$saldo_cuenta->setsuma_haber($saldo_cuentaOrigen->getsuma_haber());}
			if($conDefault || ($conDefault==false && $saldo_cuentaOrigen->getdeudor()!=null && $saldo_cuentaOrigen->getdeudor()!=0.0)) {$saldo_cuenta->setdeudor($saldo_cuentaOrigen->getdeudor());}
			if($conDefault || ($conDefault==false && $saldo_cuentaOrigen->getacreedor()!=null && $saldo_cuentaOrigen->getacreedor()!=0.0)) {$saldo_cuenta->setacreedor($saldo_cuentaOrigen->getacreedor());}
			if($conDefault || ($conDefault==false && $saldo_cuentaOrigen->getsaldo()!=null && $saldo_cuentaOrigen->getsaldo()!=0.0)) {$saldo_cuenta->setsaldo($saldo_cuentaOrigen->getsaldo());}
			if($conDefault || ($conDefault==false && $saldo_cuentaOrigen->getfecha_proceso()!=null && $saldo_cuentaOrigen->getfecha_proceso()!=date('Y-m-d'))) {$saldo_cuenta->setfecha_proceso($saldo_cuentaOrigen->getfecha_proceso());}
			if($conDefault || ($conDefault==false && $saldo_cuentaOrigen->getfecha_fin_mes()!=null && $saldo_cuentaOrigen->getfecha_fin_mes()!=date('Y-m-d'))) {$saldo_cuenta->setfecha_fin_mes($saldo_cuentaOrigen->getfecha_fin_mes());}
			if($conDefault || ($conDefault==false && $saldo_cuentaOrigen->gettipo_cuenta_codigo()!=null && $saldo_cuentaOrigen->gettipo_cuenta_codigo()!='')) {$saldo_cuenta->settipo_cuenta_codigo($saldo_cuentaOrigen->gettipo_cuenta_codigo());}
			if($conDefault || ($conDefault==false && $saldo_cuentaOrigen->getcuenta_contable()!=null && $saldo_cuentaOrigen->getcuenta_contable()!='')) {$saldo_cuenta->setcuenta_contable($saldo_cuentaOrigen->getcuenta_contable());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$saldo_cuentasSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$saldo_cuentasSeleccionados[]=$this->saldo_cuentas[$indice];
			}
		}
		
		return $saldo_cuentasSeleccionados;
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
		$saldo_cuenta= new saldo_cuenta();
		
		foreach($this->saldo_cuentaLogic->getsaldo_cuentas() as $saldo_cuenta) {
			
		}		
		
		if($saldo_cuenta!=null);
	}
	
	public function cargarRelaciones(array $saldo_cuentas=array()) : array {	
		
		$saldo_cuentasRespaldo = array();
		$saldo_cuentasLocal = array();
		
		saldo_cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$saldo_cuentasResp=array();
		$classes=array();
			
		
			
			
		$saldo_cuentasRespaldo=$this->saldo_cuentaLogic->getsaldo_cuentas();
			
		$this->saldo_cuentaLogic->setIsConDeep(true);
		
		$this->saldo_cuentaLogic->setsaldo_cuentas($saldo_cuentas);
			
		$this->saldo_cuentaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$saldo_cuentasLocal=$this->saldo_cuentaLogic->getsaldo_cuentas();
			
		/*RESPALDO*/
		$this->saldo_cuentaLogic->setsaldo_cuentas($saldo_cuentasRespaldo);
			
		$this->saldo_cuentaLogic->setIsConDeep(false);
		
		if($saldo_cuentasResp!=null);
		
		return $saldo_cuentasLocal;
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
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(saldo_cuenta_session $saldo_cuenta_session) {
		$saldo_cuenta_session->strTypeOnLoad=$this->strTypeOnLoadsaldo_cuenta;
		$saldo_cuenta_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarsaldo_cuenta;
		$saldo_cuenta_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarsaldo_cuenta;
		$saldo_cuenta_session->bitEsPopup=$this->bitEsPopup;
		$saldo_cuenta_session->bitEsBusqueda=$this->bitEsBusqueda;
		$saldo_cuenta_session->strFuncionJs=$this->strFuncionJs;
		/*$saldo_cuenta_session->strSufijo=$this->strSufijo;*/
		$saldo_cuenta_session->bitEsRelaciones=$this->bitEsRelaciones;
		$saldo_cuenta_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, saldo_cuenta_util::$STR_NOMBRE_CLASE,0,false,false);				
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
		$saldo_cuentaViewAdditional=new saldo_cuentaView_add();
		$saldo_cuentaViewAdditional->saldo_cuentas=$this->saldo_cuentas;
		$saldo_cuentaViewAdditional->Session=$this->Session;
		
		return $saldo_cuentaViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$saldo_cuentasLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$saldo_cuentasLocal=$this->saldo_cuentas;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$saldo_cuentasLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($saldo_cuentasLocal)<=0) {
					$saldo_cuentasLocal=$this->saldo_cuentas;
				}
			} else {
				$saldo_cuentasLocal=$this->saldo_cuentas;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarsaldo_cuentasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarsaldo_cuentasAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$saldo_cuentaLogic=new saldo_cuenta_logic();
		$saldo_cuentaLogic->setsaldo_cuentas($this->saldo_cuentas);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('tipo_cuenta');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$saldo_cuentaLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->saldo_cuentas=$saldo_cuentaLogic->getsaldo_cuentas();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->saldo_cuentasLocal=$this->saldo_cuentas;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=saldo_cuenta_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=saldo_cuenta_util::$STR_TABLE_NAME;		
			
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
			
			$saldo_cuentas = $this->saldo_cuentas;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = saldo_cuenta_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = saldo_cuenta_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/contabilidad/presentation/templating/saldo_cuenta_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->saldo_cuentas=$saldo_cuentas;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->saldo_cuentasLocal=$saldo_cuentasLocal;
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
		
		$saldo_cuentasLocal=array();
		
		$saldo_cuentasLocal=$this->saldo_cuentas;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarsaldo_cuentasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarsaldo_cuentasAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$saldo_cuentaLogic=new saldo_cuenta_logic();
		$saldo_cuentaLogic->setsaldo_cuentas($this->saldo_cuentas);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('tipo_cuenta');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$saldo_cuentaLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->saldo_cuentas=$saldo_cuentaLogic->getsaldo_cuentas();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$saldo_cuentas = $this->saldo_cuentas;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = saldo_cuenta_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = saldo_cuenta_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/contabilidad/presentation/templating/saldo_cuenta_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->saldo_cuentas=$saldo_cuentas;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->saldo_cuentasLocal=$saldo_cuentasLocal;
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
	
	public function getHtmlTablaDatosResumen(array $saldo_cuentas=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->saldo_cuentasReporte = $saldo_cuentas;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarsaldo_cuentasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarsaldo_cuentasAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $saldo_cuentas=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->saldo_cuentasReporte = $saldo_cuentas;		
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
		
		
		$this->saldo_cuentasReporte=$this->cargarRelaciones($saldo_cuentas);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarsaldo_cuentasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarsaldo_cuentasAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(saldo_cuenta $saldo_cuenta=null) : string {	
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
			
			
			$saldo_cuentasLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$saldo_cuentasLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($saldo_cuentasLocal)<=0) {
					/*//DEBE ESCOGER
					$saldo_cuentasLocal=$this->saldo_cuentas;*/
				}
			} else {
				/*//DEBE ESCOGER
				$saldo_cuentasLocal=$this->saldo_cuentas;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($saldo_cuentasLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($saldo_cuentasLocal,true);
			
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
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}
					
			$saldo_cuentasLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$saldo_cuentasLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($saldo_cuentasLocal)<=0) {
					/*//DEBE ESCOGER
					$saldo_cuentasLocal=$this->saldo_cuentas;*/
				}
			} else {
				/*//DEBE ESCOGER
				$saldo_cuentasLocal=$this->saldo_cuentas;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($saldo_cuentasLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($saldo_cuentasLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Saldo Cuentas';
			
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
			$fileName='saldo_cuenta';
			
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
			
			$title='Reporte de  Saldo Cuentas';
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
			
			$title='Reporte de  Saldo Cuentas';
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
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Saldo Cuentas';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=saldo_cuenta_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->saldo_cuentasAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->saldo_cuentasAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->saldo_cuentasAuxiliar)<=0) {
					$this->saldo_cuentasAuxiliar=$this->saldo_cuentas;
				}
			} else {
				$this->saldo_cuentasAuxiliar=$this->saldo_cuentas;
			}
		/*} else {
			$this->saldo_cuentasAuxiliar=$this->saldo_cuentasReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->saldo_cuentasAuxiliar as $saldo_cuenta) {
				$row=array();
				
				$row=saldo_cuenta_util::getDataReportRow($tipo,$saldo_cuenta,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			saldo_cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$saldo_cuentasResp=array();
			$classes=array();
			
			
			
			
			$saldo_cuentasResp=$this->saldo_cuentaLogic->getsaldo_cuentas();
			
			$this->saldo_cuentaLogic->setIsConDeep(true);
			
			$this->saldo_cuentaLogic->setsaldo_cuentas($this->saldo_cuentasAuxiliar);
			
			$this->saldo_cuentaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->saldo_cuentasAuxiliar=$this->saldo_cuentaLogic->getsaldo_cuentas();
			
			//RESPALDO
			$this->saldo_cuentaLogic->setsaldo_cuentas($saldo_cuentasResp);
			
			$this->saldo_cuentaLogic->setIsConDeep(false);
			*/
			
			$this->saldo_cuentasAuxiliar=$this->cargarRelaciones($this->saldo_cuentasAuxiliar);
			
			$i=0;
			
			foreach ($this->saldo_cuentasAuxiliar as $saldo_cuenta) {
				$row=array();
				
				if($i!=0) {
					$row=saldo_cuenta_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=saldo_cuenta_util::getDataReportRow($tipo,$saldo_cuenta,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
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
		$this->saldo_cuentasAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->saldo_cuentasAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->saldo_cuentasAuxiliar)<=0) {
					$this->saldo_cuentasAuxiliar=$this->saldo_cuentas;
				}
			} else {
				$this->saldo_cuentasAuxiliar=$this->saldo_cuentas;
			}
		/*} else {
			$this->saldo_cuentasAuxiliar=$this->saldo_cuentasReporte;	
		}*/
		
		foreach ($this->saldo_cuentasAuxiliar as $saldo_cuenta) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(saldo_cuenta_util::getsaldo_cuentaDescripcion($saldo_cuenta),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($saldo_cuenta->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Ejercicio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Ejercicio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($saldo_cuenta->getid_ejercicioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Periodo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Periodo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($saldo_cuenta->getid_periodoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Tipo Cuenta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Tipo Cuenta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($saldo_cuenta->getid_tipo_cuentaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Cuenta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($saldo_cuenta->getid_cuentaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Suma Debe',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Suma Debe',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($saldo_cuenta->getsuma_debe(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Suma Haber',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Suma Haber',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($saldo_cuenta->getsuma_haber(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Deudor',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Deudor',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($saldo_cuenta->getdeudor(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Acreedor',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Acreedor',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($saldo_cuenta->getacreedor(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Saldo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Saldo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($saldo_cuenta->getsaldo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Proceso',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Proceso',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($saldo_cuenta->getfecha_proceso(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Fin Mes',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Fin Mes',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($saldo_cuenta->getfecha_fin_mes(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Tipo Cuenta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Cuenta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($saldo_cuenta->gettipo_cuenta_codigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuenta Contable',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Contable',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($saldo_cuenta->getcuenta_contable(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface saldo_cuenta_base_controlI {			
		
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
		public function getIndiceActual(saldo_cuenta $saldo_cuenta,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(saldo_cuenta $saldo_cuenta,array $saldo_cuentas);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : saldo_cuenta_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $saldo_cuentas,saldo_cuenta $saldo_cuenta);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(saldo_cuenta_param_return $saldo_cuentaReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(saldo_cuenta_session $saldo_cuenta_session);		
		public function actualizarInvitadoSessionDivStyleVariables(saldo_cuenta_session $saldo_cuenta_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(saldo_cuenta $saldo_cuentaOrigen,saldo_cuenta $saldo_cuenta,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(saldo_cuenta_control $saldo_cuenta_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $saldo_cuentas=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(saldo_cuenta_session $saldo_cuenta_session);		
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
		public function getHtmlTablaDatosResumen(array $saldo_cuentas=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $saldo_cuentas=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(saldo_cuenta $saldo_cuenta=null) : string;
		
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
