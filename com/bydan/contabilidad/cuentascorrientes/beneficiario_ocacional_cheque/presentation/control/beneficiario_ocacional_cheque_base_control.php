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

namespace com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\entity\beneficiario_ocacional_cheque;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/util/beneficiario_ocacional_cheque_carga.php');
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_carga;

use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_util;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_param_return;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\logic\beneficiario_ocacional_cheque_logic;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\presentation\session\beneficiario_ocacional_cheque_session;


//FK


//REL


use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\presentation\session\cheque_cuenta_corriente_session;


/*CARGA ARCHIVOS FRAMEWORK*/
beneficiario_ocacional_cheque_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
beneficiario_ocacional_cheque_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
beneficiario_ocacional_cheque_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
beneficiario_ocacional_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*beneficiario_ocacional_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class beneficiario_ocacional_cheque_base_control extends beneficiario_ocacional_cheque_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->beneficiario_ocacional_chequeClase==null) {		
				$this->beneficiario_ocacional_chequeClase=new beneficiario_ocacional_cheque();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				/*FK_DEFAULT-FIN*/
				
				
				$this->beneficiario_ocacional_chequeClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->beneficiario_ocacional_chequeClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->beneficiario_ocacional_chequeClase->setcodigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo'));
				
				$this->beneficiario_ocacional_chequeClase->setnombre($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre'));
				
				$this->beneficiario_ocacional_chequeClase->setdireccion_1($this->getDataCampoFormTabla('form'.$this->strSufijo,'direccion_1'));
				
				$this->beneficiario_ocacional_chequeClase->setdireccion_2($this->getDataCampoFormTabla('form'.$this->strSufijo,'direccion_2'));
				
				$this->beneficiario_ocacional_chequeClase->setdireccion_3($this->getDataCampoFormTabla('form'.$this->strSufijo,'direccion_3'));
				
				$this->beneficiario_ocacional_chequeClase->settelefono($this->getDataCampoFormTabla('form'.$this->strSufijo,'telefono'));
				
				$this->beneficiario_ocacional_chequeClase->settelefono_movil($this->getDataCampoFormTabla('form'.$this->strSufijo,'telefono_movil'));
				
				$this->beneficiario_ocacional_chequeClase->setemail($this->getDataCampoFormTabla('form'.$this->strSufijo,'email'));
				
				$this->beneficiario_ocacional_chequeClase->setnotas($this->getDataCampoFormTabla('form'.$this->strSufijo,'notas'));
				
				$this->beneficiario_ocacional_chequeClase->setregistro_ocacional($this->getDataCampoFormTabla('form'.$this->strSufijo,'registro_ocacional'));
				
				$this->beneficiario_ocacional_chequeClase->setregistro_tributario($this->getDataCampoFormTabla('form'.$this->strSufijo,'registro_tributario'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->beneficiario_ocacional_chequeModel->set($this->beneficiario_ocacional_chequeClase);
				
				/*$this->beneficiario_ocacional_chequeModel->set($this->migrarModelbeneficiario_ocacional_cheque($this->beneficiario_ocacional_chequeClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setId($this->beneficiario_ocacional_chequeClase->getId());	
			$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setVersionRow($this->beneficiario_ocacional_chequeClase->getVersionRow());	
			$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setVersionRow($this->beneficiario_ocacional_chequeClase->getVersionRow());	
			$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setcodigo($this->beneficiario_ocacional_chequeClase->getcodigo());	
			$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setnombre($this->beneficiario_ocacional_chequeClase->getnombre());	
			$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setdireccion_1($this->beneficiario_ocacional_chequeClase->getdireccion_1());	
			$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setdireccion_2($this->beneficiario_ocacional_chequeClase->getdireccion_2());	
			$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setdireccion_3($this->beneficiario_ocacional_chequeClase->getdireccion_3());	
			$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->settelefono($this->beneficiario_ocacional_chequeClase->gettelefono());	
			$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->settelefono_movil($this->beneficiario_ocacional_chequeClase->gettelefono_movil());	
			$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setemail($this->beneficiario_ocacional_chequeClase->getemail());	
			$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setnotas($this->beneficiario_ocacional_chequeClase->getnotas());	
			$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setregistro_ocacional($this->beneficiario_ocacional_chequeClase->getregistro_ocacional());	
			$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setregistro_tributario($this->beneficiario_ocacional_chequeClase->getregistro_tributario());	
		} else {
			$this->beneficiario_ocacional_chequeClase->setId($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->getId());	
			$this->beneficiario_ocacional_chequeClase->setVersionRow($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->getVersionRow());	
			$this->beneficiario_ocacional_chequeClase->setVersionRow($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->getVersionRow());	
			$this->beneficiario_ocacional_chequeClase->setcodigo($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->getcodigo());	
			$this->beneficiario_ocacional_chequeClase->setnombre($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->getnombre());	
			$this->beneficiario_ocacional_chequeClase->setdireccion_1($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->getdireccion_1());	
			$this->beneficiario_ocacional_chequeClase->setdireccion_2($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->getdireccion_2());	
			$this->beneficiario_ocacional_chequeClase->setdireccion_3($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->getdireccion_3());	
			$this->beneficiario_ocacional_chequeClase->settelefono($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->gettelefono());	
			$this->beneficiario_ocacional_chequeClase->settelefono_movil($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->gettelefono_movil());	
			$this->beneficiario_ocacional_chequeClase->setemail($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->getemail());	
			$this->beneficiario_ocacional_chequeClase->setnotas($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->getnotas());	
			$this->beneficiario_ocacional_chequeClase->setregistro_ocacional($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->getregistro_ocacional());	
			$this->beneficiario_ocacional_chequeClase->setregistro_tributario($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->getregistro_tributario());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->beneficiario_ocacional_chequeModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='codigo') {$this->strMensajecodigo=$strMensajeCampo;}
		if($strNombreCampo=='nombre') {$this->strMensajenombre=$strMensajeCampo;}
		if($strNombreCampo=='direccion_1') {$this->strMensajedireccion_1=$strMensajeCampo;}
		if($strNombreCampo=='direccion_2') {$this->strMensajedireccion_2=$strMensajeCampo;}
		if($strNombreCampo=='direccion_3') {$this->strMensajedireccion_3=$strMensajeCampo;}
		if($strNombreCampo=='telefono') {$this->strMensajetelefono=$strMensajeCampo;}
		if($strNombreCampo=='telefono_movil') {$this->strMensajetelefono_movil=$strMensajeCampo;}
		if($strNombreCampo=='email') {$this->strMensajeemail=$strMensajeCampo;}
		if($strNombreCampo=='notas') {$this->strMensajenotas=$strMensajeCampo;}
		if($strNombreCampo=='registro_ocacional') {$this->strMensajeregistro_ocacional=$strMensajeCampo;}
		if($strNombreCampo=='registro_tributario') {$this->strMensajeregistro_tributario=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajecodigo='';
		$this->strMensajenombre='';
		$this->strMensajedireccion_1='';
		$this->strMensajedireccion_2='';
		$this->strMensajedireccion_3='';
		$this->strMensajetelefono='';
		$this->strMensajetelefono_movil='';
		$this->strMensajeemail='';
		$this->strMensajenotas='';
		$this->strMensajeregistro_ocacional='';
		$this->strMensajeregistro_tributario='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
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
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}

			$beneficiario_ocacional_cheque_session=unserialize($this->Session->read(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME));
						
			if($beneficiario_ocacional_cheque_session==null) {
				$beneficiario_ocacional_cheque_session=new beneficiario_ocacional_cheque_session();
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
						$this->beneficiario_ocacional_chequeLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->beneficiario_ocacional_chequeActual =$this->beneficiario_ocacional_chequeClase;
			
			/*$this->beneficiario_ocacional_chequeActual =$this->migrarModelbeneficiario_ocacional_cheque($this->beneficiario_ocacional_chequeClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques(),$this->beneficiario_ocacional_chequeActual);
			
			$this->actualizarControllerConReturnGeneral($this->beneficiario_ocacional_chequeReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
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
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$beneficiario_ocacional_chequesLocal=$this->getListaActual();
		
		$iIndice=beneficiario_ocacional_cheque_util::getIndiceNuevo($beneficiario_ocacional_chequesLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$beneficiario_ocacional_chequesLocal=$this->getListaActual();
		
		$iIndice=beneficiario_ocacional_cheque_util::getIndiceActual($beneficiario_ocacional_chequesLocal,$beneficiario_ocacional_cheque,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevobeneficiario_ocacional_cheque')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->beneficiario_ocacional_chequeActual =$this->beneficiario_ocacional_chequeClase;
			
			/*$this->beneficiario_ocacional_chequeActual =$this->migrarModelbeneficiario_ocacional_cheque($this->beneficiario_ocacional_chequeClase);*/
			
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
			
			$this->beneficiario_ocacional_chequeLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
			
			$this->beneficiario_ocacional_chequeLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->beneficiario_ocacional_chequeLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->beneficiario_ocacional_chequeLogic->setbeneficiario_ocacional_cheque(new beneficiario_ocacional_cheque());
				
				$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setIsNew(true);
				$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setIsChanged(true);
				$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->beneficiario_ocacional_chequeModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->beneficiario_ocacional_chequeLogic->beneficiario_ocacional_cheques[]=$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->beneficiario_ocacional_chequeLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							beneficiario_ocacional_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cheque_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$chequecuentacorrientes=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME.'Lista'));
							$chequecuentacorrientesEliminados=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$chequecuentacorrientes=array_merge($chequecuentacorrientes,$chequecuentacorrientesEliminados);
							
							$this->beneficiario_ocacional_chequeLogic->saveRelaciones($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque(),$chequecuentacorrientes);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setIsChanged(true);
				$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setIsNew(false);
				$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->beneficiario_ocacional_chequeModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque(),$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->beneficiario_ocacional_chequeLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							beneficiario_ocacional_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cheque_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$chequecuentacorrientes=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME.'Lista'));
							$chequecuentacorrientesEliminados=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$chequecuentacorrientes=array_merge($chequecuentacorrientes,$chequecuentacorrientesEliminados);
							
							$this->beneficiario_ocacional_chequeLogic->saveRelaciones($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque(),$chequecuentacorrientes);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setIsDeleted(true);
				$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setIsNew(false);
				$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setIsChanged(false);				
				
				$this->actualizarLista($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque(),$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->beneficiario_ocacional_chequeLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							beneficiario_ocacional_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cheque_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$chequecuentacorrientes=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME.'Lista'));
							$chequecuentacorrientesEliminados=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$chequecuentacorrientes=array_merge($chequecuentacorrientes,$chequecuentacorrientesEliminados);

							foreach($chequecuentacorrientes as $chequecuentacorriente1) {
								$chequecuentacorriente1->setIsDeleted(true);
							}
							
						$this->beneficiario_ocacional_chequeLogic->saveRelaciones($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque(),$chequecuentacorrientes);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->beneficiario_ocacional_chequesEliminados[]=$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->beneficiario_ocacional_chequeLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							beneficiario_ocacional_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cheque_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$chequecuentacorrientes=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME.'Lista'));
							$chequecuentacorrientesEliminados=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$chequecuentacorrientes=array_merge($chequecuentacorrientes,$chequecuentacorrientesEliminados);
							
						$this->beneficiario_ocacional_chequeLogic->saveRelaciones($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque(),$chequecuentacorrientes);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->beneficiario_ocacional_chequesEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->beneficiario_ocacional_chequeLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->beneficiario_ocacional_chequeLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->beneficiario_ocacional_chequesEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->beneficiario_ocacional_chequeLogic->setIsConDeepLoad(false);
			
			$this->beneficiario_ocacional_cheques=$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME.'Lista',serialize($this->beneficiario_ocacional_cheques));
				$this->Session->write(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->beneficiario_ocacional_chequesEliminados));
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
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
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
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalbeneficiario_ocacional_cheque;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->beneficiario_ocacional_chequeLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->beneficiario_ocacional_cheques as $beneficiario_ocacional_chequeLocal) {
				if($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->getId()==$beneficiario_ocacional_chequeLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()->setIsDeleted(true);
			$this->beneficiario_ocacional_chequesEliminados[]=$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->beneficiario_ocacional_cheques[$indice]);
				
				$this->beneficiario_ocacional_cheques = array_values($this->beneficiario_ocacional_cheques);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelbeneficiario_ocacional_cheque($this->beneficiario_ocacional_chequeClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,array $beneficiario_ocacional_cheques) {
		try {
			foreach($beneficiario_ocacional_cheques as $beneficiario_ocacional_chequeLocal){ 
				if($beneficiario_ocacional_chequeLocal->getId()==$beneficiario_ocacional_cheque->getId()) {
					$beneficiario_ocacional_chequeLocal->setIsChanged($beneficiario_ocacional_cheque->getIsChanged());
					$beneficiario_ocacional_chequeLocal->setIsNew($beneficiario_ocacional_cheque->getIsNew());
					$beneficiario_ocacional_chequeLocal->setIsDeleted($beneficiario_ocacional_cheque->getIsDeleted());
					//$beneficiario_ocacional_chequeLocal->setbitExpired($beneficiario_ocacional_cheque->getbitExpired());
					
					$beneficiario_ocacional_chequeLocal->setId($beneficiario_ocacional_cheque->getId());	
					$beneficiario_ocacional_chequeLocal->setVersionRow($beneficiario_ocacional_cheque->getVersionRow());	
					$beneficiario_ocacional_chequeLocal->setVersionRow($beneficiario_ocacional_cheque->getVersionRow());	
					$beneficiario_ocacional_chequeLocal->setcodigo($beneficiario_ocacional_cheque->getcodigo());	
					$beneficiario_ocacional_chequeLocal->setnombre($beneficiario_ocacional_cheque->getnombre());	
					$beneficiario_ocacional_chequeLocal->setdireccion_1($beneficiario_ocacional_cheque->getdireccion_1());	
					$beneficiario_ocacional_chequeLocal->setdireccion_2($beneficiario_ocacional_cheque->getdireccion_2());	
					$beneficiario_ocacional_chequeLocal->setdireccion_3($beneficiario_ocacional_cheque->getdireccion_3());	
					$beneficiario_ocacional_chequeLocal->settelefono($beneficiario_ocacional_cheque->gettelefono());	
					$beneficiario_ocacional_chequeLocal->settelefono_movil($beneficiario_ocacional_cheque->gettelefono_movil());	
					$beneficiario_ocacional_chequeLocal->setemail($beneficiario_ocacional_cheque->getemail());	
					$beneficiario_ocacional_chequeLocal->setnotas($beneficiario_ocacional_cheque->getnotas());	
					$beneficiario_ocacional_chequeLocal->setregistro_ocacional($beneficiario_ocacional_cheque->getregistro_ocacional());	
					$beneficiario_ocacional_chequeLocal->setregistro_tributario($beneficiario_ocacional_cheque->getregistro_tributario());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$beneficiario_ocacional_chequesLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$beneficiario_ocacional_chequesLocal=$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$beneficiario_ocacional_chequesLocal=$this->beneficiario_ocacional_cheques;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $beneficiario_ocacional_chequesLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques() as $beneficiario_ocacional_cheque) {
				if($beneficiario_ocacional_cheque->getId()==$id) {
					$this->beneficiario_ocacional_chequeLogic->setbeneficiario_ocacional_cheque($beneficiario_ocacional_cheque);
					
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
		/*$beneficiario_ocacional_chequesSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->beneficiario_ocacional_cheques as $beneficiario_ocacional_cheque) {
			$beneficiario_ocacional_cheque->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->beneficiario_ocacional_cheques[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : beneficiario_ocacional_cheque_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$beneficiario_ocacional_cheque_session=unserialize($this->Session->read(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME));
						
		if($beneficiario_ocacional_cheque_session==null) {
			$beneficiario_ocacional_cheque_session=new beneficiario_ocacional_cheque_session();
		}
		
		
		$this->beneficiario_ocacional_chequeReturnGeneral=new beneficiario_ocacional_cheque_param_return();
		$this->beneficiario_ocacional_chequeParameterGeneral=new beneficiario_ocacional_cheque_param_return();
			
		$this->beneficiario_ocacional_chequeParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualbeneficiario_ocacional_cheque(this.beneficiario_ocacional_cheque,true);
			this.setVariablesFormularioToObjetoActualForeignKeysbeneficiario_ocacional_cheque(this.beneficiario_ocacional_cheque);*/
			
			if($beneficiario_ocacional_cheque_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualbeneficiario_ocacional_cheque(this.beneficiario_ocacional_cheque,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->beneficiario_ocacional_chequeActual=$this->beneficiario_ocacional_chequeClase;
				
				$this->setCopiarVariablesObjetos($this->beneficiario_ocacional_chequeActual,$this->beneficiario_ocacional_cheque,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->beneficiario_ocacional_chequeReturnGeneral=$this->beneficiario_ocacional_chequeLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques(),$this->beneficiario_ocacional_cheque,$this->beneficiario_ocacional_chequeParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($beneficiario_ocacional_cheque_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanbeneficiario_ocacional_cheque($classes,$this->beneficiario_ocacional_chequeReturnGeneral,$this->beneficiario_ocacional_chequeBean,false);*/
				}
					
				if($this->beneficiario_ocacional_chequeReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->beneficiario_ocacional_chequeReturnGeneral->getbeneficiario_ocacional_cheque(),$this->beneficiario_ocacional_chequeActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeybeneficiario_ocacional_cheque($this->beneficiario_ocacional_chequeReturnGeneral->getbeneficiario_ocacional_cheque());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariobeneficiario_ocacional_cheque($this->beneficiario_ocacional_chequeReturnGeneral->getbeneficiario_ocacional_cheque());*/
				}
					
				if($this->beneficiario_ocacional_chequeReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->beneficiario_ocacional_chequeReturnGeneral->getbeneficiario_ocacional_cheque(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->beneficiario_ocacional_cheque,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(beneficiario_ocacional_chequeJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualbeneficiario_ocacional_cheque(this.beneficiario_ocacional_cheque,true);
				this.setVariablesFormularioToObjetoActualForeignKeysbeneficiario_ocacional_cheque(this.beneficiario_ocacional_cheque);				
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
				
				if($this->beneficiario_ocacional_chequeAnterior!=null) {
					$this->beneficiario_ocacional_cheque=$this->beneficiario_ocacional_chequeAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->beneficiario_ocacional_chequeReturnGeneral=$this->beneficiario_ocacional_chequeLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques(),$this->beneficiario_ocacional_cheque,$this->beneficiario_ocacional_chequeParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->beneficiario_ocacional_chequeReturnGeneral->getbeneficiario_ocacional_cheque(),$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques());
			*/
		}
		
		return $this->beneficiario_ocacional_chequeReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}

			$this->beneficiario_ocacional_chequeReturnGeneral=new beneficiario_ocacional_cheque_param_return();			
			$this->beneficiario_ocacional_chequeParameterGeneral=new beneficiario_ocacional_cheque_param_return();
			
			$this->beneficiario_ocacional_chequeParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->beneficiario_ocacional_chequeReturnGeneral=$this->beneficiario_ocacional_chequeLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->beneficiario_ocacional_cheques,$this->beneficiario_ocacional_chequeParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->beneficiario_ocacional_chequeReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->beneficiario_ocacional_chequeReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->beneficiario_ocacional_chequeReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
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
		
		$this->beneficiario_ocacional_chequeReturnGeneral=new beneficiario_ocacional_cheque_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_beneficiario_ocacional_cheque') {
		    $sDominio='beneficiario_ocacional_cheque';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->beneficiario_ocacional_chequeReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->beneficiario_ocacional_chequeReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='beneficiario_ocacional_cheque';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='beneficiario_ocacional_cheque';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='beneficiario_ocacional_cheque';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->beneficiario_ocacional_chequeReturnGeneral=new beneficiario_ocacional_cheque_param_return();
		$this->beneficiario_ocacional_chequeParameterGeneral=new beneficiario_ocacional_cheque_param_return();
			
		$this->beneficiario_ocacional_chequeParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->beneficiario_ocacional_chequeReturnGeneral=$this->beneficiario_ocacional_chequeLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques(),$this->beneficiario_ocacional_cheque,$this->beneficiario_ocacional_chequeParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->beneficiario_ocacional_chequeReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->beneficiario_ocacional_chequeReturnGeneral->getbeneficiario_ocacional_cheque(),$classes);*/
		}									
	
		if($this->beneficiario_ocacional_chequeReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->beneficiario_ocacional_chequeReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->beneficiario_ocacional_chequeReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $beneficiario_ocacional_cheques,beneficiario_ocacional_cheque $beneficiario_ocacional_cheque) {
		
		$beneficiario_ocacional_cheque_session=unserialize($this->Session->read(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME));
						
		if($beneficiario_ocacional_cheque_session==null) {
			$beneficiario_ocacional_cheque_session=new beneficiario_ocacional_cheque_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(beneficiario_ocacional_cheque_util::$CLASSNAME);
			}	
			*/
			
			$this->beneficiario_ocacional_chequeReturnGeneral=new beneficiario_ocacional_cheque_param_return();
			$this->beneficiario_ocacional_chequeParameterGeneral=new beneficiario_ocacional_cheque_param_return();
			
			$this->beneficiario_ocacional_chequeParameterGeneral->setdata($this->data);
		
		
			
		if($beneficiario_ocacional_cheque_session->conGuardarRelaciones) {
			$classes=beneficiario_ocacional_cheque_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->beneficiario_ocacional_chequeActual,$this->beneficiario_ocacional_cheque,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->beneficiario_ocacional_chequeReturnGeneral=$this->beneficiario_ocacional_chequeLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques(),$this->beneficiario_ocacional_chequeActual,$this->beneficiario_ocacional_chequeParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->beneficiario_ocacional_chequeReturnGeneral=$this->beneficiario_ocacional_chequeLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$beneficiario_ocacional_cheques,$beneficiario_ocacional_cheque,$this->beneficiario_ocacional_chequeParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelbeneficiario_ocacional_cheque($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque());*/
			
			$this->beneficiario_ocacional_cheque=$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->beneficiario_ocacional_cheque);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$beneficiario_ocacional_chequeActual=new beneficiario_ocacional_cheque();
			
			if($this->beneficiario_ocacional_chequeClase==null) {		
				$this->beneficiario_ocacional_chequeClase=new beneficiario_ocacional_cheque();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$beneficiario_ocacional_chequeActual=$this->beneficiario_ocacional_cheques[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->setdireccion_1($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->setdireccion_2($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->setdireccion_3($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->settelefono($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->settelefono_movil($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->setemail($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->setnotas($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->setregistro_ocacional($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->setregistro_tributario($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }

				$this->beneficiario_ocacional_chequeClase=$beneficiario_ocacional_chequeActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->beneficiario_ocacional_chequeModel->set($this->beneficiario_ocacional_chequeClase);
				
				/*$this->beneficiario_ocacional_chequeModel->set($this->migrarModelbeneficiario_ocacional_cheque($this->beneficiario_ocacional_chequeClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->beneficiario_ocacional_cheques=$this->migrarModelbeneficiario_ocacional_cheque($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques());							
		$this->beneficiario_ocacional_cheques=$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques();*/
		
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
			$this->Session->write(beneficiario_ocacional_cheque_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$beneficiario_ocacional_cheque_control_session=unserialize($this->Session->read(beneficiario_ocacional_cheque_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($beneficiario_ocacional_cheque_control_session==null) {
				$beneficiario_ocacional_cheque_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($beneficiario_ocacional_cheque_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME,$this);*/
		} else {
			$beneficiario_ocacional_cheque_session=unserialize($this->Session->read(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME));
			
			if($beneficiario_ocacional_cheque_session==null) {
				$beneficiario_ocacional_cheque_session=new beneficiario_ocacional_cheque_session();
			}
			
			$this->set(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME, $beneficiario_ocacional_cheque_session);
		}
	}
	
	public function setCopiarVariablesObjetos(beneficiario_ocacional_cheque $beneficiario_ocacional_chequeOrigen,beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($beneficiario_ocacional_cheque==null) {
				$beneficiario_ocacional_cheque=new beneficiario_ocacional_cheque();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $beneficiario_ocacional_chequeOrigen->getId()!=null && $beneficiario_ocacional_chequeOrigen->getId()!=0)) {$beneficiario_ocacional_cheque->setId($beneficiario_ocacional_chequeOrigen->getId());}}
			if($conDefault || ($conDefault==false && $beneficiario_ocacional_chequeOrigen->getcodigo()!=null && $beneficiario_ocacional_chequeOrigen->getcodigo()!='')) {$beneficiario_ocacional_cheque->setcodigo($beneficiario_ocacional_chequeOrigen->getcodigo());}
			if($conDefault || ($conDefault==false && $beneficiario_ocacional_chequeOrigen->getnombre()!=null && $beneficiario_ocacional_chequeOrigen->getnombre()!='')) {$beneficiario_ocacional_cheque->setnombre($beneficiario_ocacional_chequeOrigen->getnombre());}
			if($conDefault || ($conDefault==false && $beneficiario_ocacional_chequeOrigen->getdireccion_1()!=null && $beneficiario_ocacional_chequeOrigen->getdireccion_1()!='')) {$beneficiario_ocacional_cheque->setdireccion_1($beneficiario_ocacional_chequeOrigen->getdireccion_1());}
			if($conDefault || ($conDefault==false && $beneficiario_ocacional_chequeOrigen->getdireccion_2()!=null && $beneficiario_ocacional_chequeOrigen->getdireccion_2()!='')) {$beneficiario_ocacional_cheque->setdireccion_2($beneficiario_ocacional_chequeOrigen->getdireccion_2());}
			if($conDefault || ($conDefault==false && $beneficiario_ocacional_chequeOrigen->getdireccion_3()!=null && $beneficiario_ocacional_chequeOrigen->getdireccion_3()!='')) {$beneficiario_ocacional_cheque->setdireccion_3($beneficiario_ocacional_chequeOrigen->getdireccion_3());}
			if($conDefault || ($conDefault==false && $beneficiario_ocacional_chequeOrigen->gettelefono()!=null && $beneficiario_ocacional_chequeOrigen->gettelefono()!='')) {$beneficiario_ocacional_cheque->settelefono($beneficiario_ocacional_chequeOrigen->gettelefono());}
			if($conDefault || ($conDefault==false && $beneficiario_ocacional_chequeOrigen->gettelefono_movil()!=null && $beneficiario_ocacional_chequeOrigen->gettelefono_movil()!='')) {$beneficiario_ocacional_cheque->settelefono_movil($beneficiario_ocacional_chequeOrigen->gettelefono_movil());}
			if($conDefault || ($conDefault==false && $beneficiario_ocacional_chequeOrigen->getemail()!=null && $beneficiario_ocacional_chequeOrigen->getemail()!='')) {$beneficiario_ocacional_cheque->setemail($beneficiario_ocacional_chequeOrigen->getemail());}
			if($conDefault || ($conDefault==false && $beneficiario_ocacional_chequeOrigen->getnotas()!=null && $beneficiario_ocacional_chequeOrigen->getnotas()!='')) {$beneficiario_ocacional_cheque->setnotas($beneficiario_ocacional_chequeOrigen->getnotas());}
			if($conDefault || ($conDefault==false && $beneficiario_ocacional_chequeOrigen->getregistro_ocacional()!=null && $beneficiario_ocacional_chequeOrigen->getregistro_ocacional()!='')) {$beneficiario_ocacional_cheque->setregistro_ocacional($beneficiario_ocacional_chequeOrigen->getregistro_ocacional());}
			if($conDefault || ($conDefault==false && $beneficiario_ocacional_chequeOrigen->getregistro_tributario()!=null && $beneficiario_ocacional_chequeOrigen->getregistro_tributario()!='')) {$beneficiario_ocacional_cheque->setregistro_tributario($beneficiario_ocacional_chequeOrigen->getregistro_tributario());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$beneficiario_ocacional_chequesSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$beneficiario_ocacional_chequesSeleccionados[]=$this->beneficiario_ocacional_cheques[$indice];
			}
		}
		
		return $beneficiario_ocacional_chequesSeleccionados;
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
		$beneficiario_ocacional_cheque= new beneficiario_ocacional_cheque();
		
		foreach($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques() as $beneficiario_ocacional_cheque) {
			
		$beneficiario_ocacional_cheque->chequecuentacorrientes=array();
		}		
		
		if($beneficiario_ocacional_cheque!=null);
	}
	
	public function cargarRelaciones(array $beneficiario_ocacional_cheques=array()) : array {	
		
		$beneficiario_ocacional_chequesRespaldo = array();
		$beneficiario_ocacional_chequesLocal = array();
		
		beneficiario_ocacional_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			cheque_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$beneficiario_ocacional_chequesResp=array();
		$classes=array();
			
		
				$class=new Classe('cheque_cuenta_corriente'); 	$classes[]=$class;
			
			
		$beneficiario_ocacional_chequesRespaldo=$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques();
			
		$this->beneficiario_ocacional_chequeLogic->setIsConDeep(true);
		
		$this->beneficiario_ocacional_chequeLogic->setbeneficiario_ocacional_cheques($beneficiario_ocacional_cheques);
			
		$this->beneficiario_ocacional_chequeLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$beneficiario_ocacional_chequesLocal=$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques();
			
		/*RESPALDO*/
		$this->beneficiario_ocacional_chequeLogic->setbeneficiario_ocacional_cheques($beneficiario_ocacional_chequesRespaldo);
			
		$this->beneficiario_ocacional_chequeLogic->setIsConDeep(false);
		
		if($beneficiario_ocacional_chequesResp!=null);
		
		return $beneficiario_ocacional_chequesLocal;
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
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(beneficiario_ocacional_cheque_session $beneficiario_ocacional_cheque_session) {
		$beneficiario_ocacional_cheque_session->strTypeOnLoad=$this->strTypeOnLoadbeneficiario_ocacional_cheque;
		$beneficiario_ocacional_cheque_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarbeneficiario_ocacional_cheque;
		$beneficiario_ocacional_cheque_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque;
		$beneficiario_ocacional_cheque_session->bitEsPopup=$this->bitEsPopup;
		$beneficiario_ocacional_cheque_session->bitEsBusqueda=$this->bitEsBusqueda;
		$beneficiario_ocacional_cheque_session->strFuncionJs=$this->strFuncionJs;
		/*$beneficiario_ocacional_cheque_session->strSufijo=$this->strSufijo;*/
		$beneficiario_ocacional_cheque_session->bitEsRelaciones=$this->bitEsRelaciones;
		$beneficiario_ocacional_cheque_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, beneficiario_ocacional_cheque_util::$STR_NOMBRE_CLASE,0,false,false);				
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
		} else {
			

			$this->strTienePermisoscheque_cuenta_corriente='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoscheque_cuenta_corriente=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cheque_cuenta_corriente_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoscheque_cuenta_corriente='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$beneficiario_ocacional_chequeViewAdditional=new beneficiario_ocacional_chequeView_add();
		$beneficiario_ocacional_chequeViewAdditional->beneficiario_ocacional_cheques=$this->beneficiario_ocacional_cheques;
		$beneficiario_ocacional_chequeViewAdditional->Session=$this->Session;
		
		return $beneficiario_ocacional_chequeViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$beneficiario_ocacional_chequesLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$beneficiario_ocacional_chequesLocal=$this->beneficiario_ocacional_cheques;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$beneficiario_ocacional_chequesLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($beneficiario_ocacional_chequesLocal)<=0) {
					$beneficiario_ocacional_chequesLocal=$this->beneficiario_ocacional_cheques;
				}
			} else {
				$beneficiario_ocacional_chequesLocal=$this->beneficiario_ocacional_cheques;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarbeneficiario_ocacional_chequesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarbeneficiario_ocacional_chequesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$beneficiario_ocacional_chequeLogic=new beneficiario_ocacional_cheque_logic();
		$beneficiario_ocacional_chequeLogic->setbeneficiario_ocacional_cheques($this->beneficiario_ocacional_cheques);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		} 
			
		
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$beneficiario_ocacional_chequeLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->beneficiario_ocacional_cheques=$beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->beneficiario_ocacional_chequesLocal=$this->beneficiario_ocacional_cheques;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=beneficiario_ocacional_cheque_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=beneficiario_ocacional_cheque_util::$STR_TABLE_NAME;		
			
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
			
			$beneficiario_ocacional_cheques = $this->beneficiario_ocacional_cheques;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = beneficiario_ocacional_cheque_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = beneficiario_ocacional_cheque_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/cuentascorrientes/presentation/templating/beneficiario_ocacional_cheque_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->beneficiario_ocacional_cheques=$beneficiario_ocacional_cheques;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->beneficiario_ocacional_chequesLocal=$beneficiario_ocacional_chequesLocal;
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
		
		$beneficiario_ocacional_chequesLocal=array();
		
		$beneficiario_ocacional_chequesLocal=$this->beneficiario_ocacional_cheques;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarbeneficiario_ocacional_chequesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarbeneficiario_ocacional_chequesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$beneficiario_ocacional_chequeLogic=new beneficiario_ocacional_cheque_logic();
		$beneficiario_ocacional_chequeLogic->setbeneficiario_ocacional_cheques($this->beneficiario_ocacional_cheques);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));

		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		} 
			
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$beneficiario_ocacional_chequeLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->beneficiario_ocacional_cheques=$beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$beneficiario_ocacional_cheques = $this->beneficiario_ocacional_cheques;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = beneficiario_ocacional_cheque_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = beneficiario_ocacional_cheque_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/cuentascorrientes/presentation/templating/beneficiario_ocacional_cheque_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->beneficiario_ocacional_cheques=$beneficiario_ocacional_cheques;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->beneficiario_ocacional_chequesLocal=$beneficiario_ocacional_chequesLocal;
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
	
	public function getHtmlTablaDatosResumen(array $beneficiario_ocacional_cheques=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->beneficiario_ocacional_chequesReporte = $beneficiario_ocacional_cheques;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarbeneficiario_ocacional_chequesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarbeneficiario_ocacional_chequesAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $beneficiario_ocacional_cheques=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->beneficiario_ocacional_chequesReporte = $beneficiario_ocacional_cheques;		
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
		
		
		$this->beneficiario_ocacional_chequesReporte=$this->cargarRelaciones($beneficiario_ocacional_cheques);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarbeneficiario_ocacional_chequesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarbeneficiario_ocacional_chequesAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(beneficiario_ocacional_cheque $beneficiario_ocacional_cheque=null) : string {	
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
			
			
			$beneficiario_ocacional_chequesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$beneficiario_ocacional_chequesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($beneficiario_ocacional_chequesLocal)<=0) {
					/*//DEBE ESCOGER
					$beneficiario_ocacional_chequesLocal=$this->beneficiario_ocacional_cheques;*/
				}
			} else {
				/*//DEBE ESCOGER
				$beneficiario_ocacional_chequesLocal=$this->beneficiario_ocacional_cheques;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($beneficiario_ocacional_chequesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($beneficiario_ocacional_chequesLocal,true);
			
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
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}
					
			$beneficiario_ocacional_chequesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$beneficiario_ocacional_chequesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($beneficiario_ocacional_chequesLocal)<=0) {
					/*//DEBE ESCOGER
					$beneficiario_ocacional_chequesLocal=$this->beneficiario_ocacional_cheques;*/
				}
			} else {
				/*//DEBE ESCOGER
				$beneficiario_ocacional_chequesLocal=$this->beneficiario_ocacional_cheques;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($beneficiario_ocacional_chequesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($beneficiario_ocacional_chequesLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Beneficiario Ocacionales';
			
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
			$fileName='beneficiario_ocacional_cheque';
			
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
			
			$title='Reporte de  Beneficiario Ocacionales';
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
			
			$title='Reporte de  Beneficiario Ocacionales';
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
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Beneficiario Ocacionales';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=beneficiario_ocacional_cheque_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->beneficiario_ocacional_chequesAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->beneficiario_ocacional_chequesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->beneficiario_ocacional_chequesAuxiliar)<=0) {
					$this->beneficiario_ocacional_chequesAuxiliar=$this->beneficiario_ocacional_cheques;
				}
			} else {
				$this->beneficiario_ocacional_chequesAuxiliar=$this->beneficiario_ocacional_cheques;
			}
		/*} else {
			$this->beneficiario_ocacional_chequesAuxiliar=$this->beneficiario_ocacional_chequesReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->beneficiario_ocacional_chequesAuxiliar as $beneficiario_ocacional_cheque) {
				$row=array();
				
				$row=beneficiario_ocacional_cheque_util::getDataReportRow($tipo,$beneficiario_ocacional_cheque,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			beneficiario_ocacional_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			cheque_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$beneficiario_ocacional_chequesResp=array();
			$classes=array();
			
			
				$class=new Classe('cheque_cuenta_corriente'); 	$classes[]=$class;
			
			
			$beneficiario_ocacional_chequesResp=$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques();
			
			$this->beneficiario_ocacional_chequeLogic->setIsConDeep(true);
			
			$this->beneficiario_ocacional_chequeLogic->setbeneficiario_ocacional_cheques($this->beneficiario_ocacional_chequesAuxiliar);
			
			$this->beneficiario_ocacional_chequeLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->beneficiario_ocacional_chequesAuxiliar=$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques();
			
			//RESPALDO
			$this->beneficiario_ocacional_chequeLogic->setbeneficiario_ocacional_cheques($beneficiario_ocacional_chequesResp);
			
			$this->beneficiario_ocacional_chequeLogic->setIsConDeep(false);
			*/
			
			$this->beneficiario_ocacional_chequesAuxiliar=$this->cargarRelaciones($this->beneficiario_ocacional_chequesAuxiliar);
			
			$i=0;
			
			foreach ($this->beneficiario_ocacional_chequesAuxiliar as $beneficiario_ocacional_cheque) {
				$row=array();
				
				if($i!=0) {
					$row=beneficiario_ocacional_cheque_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=beneficiario_ocacional_cheque_util::getDataReportRow($tipo,$beneficiario_ocacional_cheque,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//cheque_cuenta_corriente
				if(Funciones::existeCadenaArrayOrderBy(cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($beneficiario_ocacional_cheque->getcheque_cuenta_corrientes())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=cheque_cuenta_corriente_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($beneficiario_ocacional_cheque->getcheque_cuenta_corrientes() as $cheque_cuenta_corriente) {
						$row=cheque_cuenta_corriente_util::getDataReportRow('RELACIONADO',$cheque_cuenta_corriente,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->beneficiario_ocacional_chequesAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->beneficiario_ocacional_chequesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->beneficiario_ocacional_chequesAuxiliar)<=0) {
					$this->beneficiario_ocacional_chequesAuxiliar=$this->beneficiario_ocacional_cheques;
				}
			} else {
				$this->beneficiario_ocacional_chequesAuxiliar=$this->beneficiario_ocacional_cheques;
			}
		/*} else {
			$this->beneficiario_ocacional_chequesAuxiliar=$this->beneficiario_ocacional_chequesReporte;	
		}*/
		
		foreach ($this->beneficiario_ocacional_chequesAuxiliar as $beneficiario_ocacional_cheque) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(beneficiario_ocacional_cheque_util::getbeneficiario_ocacional_chequeDescripcion($beneficiario_ocacional_cheque),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Codigo Beneficiario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo Beneficiario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->getcodigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->getnombre(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Direccion 1',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Direccion 1',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->getdireccion_1(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Direccion 2',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Direccion 2',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->getdireccion_2(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Direccion 3',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Direccion 3',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->getdireccion_3(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Telefono',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Telefono',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->gettelefono(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Telefono Movil',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Telefono Movil',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->gettelefono_movil(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Email',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Email',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->getemail(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Notas',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Notas',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->getnotas(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Registro Ocacional',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Registro Ocacional',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->getregistro_ocacional(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Registro Tributario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Registro Tributario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->getregistro_tributario(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface beneficiario_ocacional_cheque_base_controlI {			
		
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
		public function getIndiceActual(beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,array $beneficiario_ocacional_cheques);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : beneficiario_ocacional_cheque_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $beneficiario_ocacional_cheques,beneficiario_ocacional_cheque $beneficiario_ocacional_cheque);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(beneficiario_ocacional_cheque_param_return $beneficiario_ocacional_chequeReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(beneficiario_ocacional_cheque_session $beneficiario_ocacional_cheque_session);		
		public function actualizarInvitadoSessionDivStyleVariables(beneficiario_ocacional_cheque_session $beneficiario_ocacional_cheque_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(beneficiario_ocacional_cheque $beneficiario_ocacional_chequeOrigen,beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(beneficiario_ocacional_cheque_control $beneficiario_ocacional_cheque_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $beneficiario_ocacional_cheques=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(beneficiario_ocacional_cheque_session $beneficiario_ocacional_cheque_session);		
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
		public function getHtmlTablaDatosResumen(array $beneficiario_ocacional_cheques=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $beneficiario_ocacional_cheques=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(beneficiario_ocacional_cheque $beneficiario_ocacional_cheque=null) : string;
		
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
