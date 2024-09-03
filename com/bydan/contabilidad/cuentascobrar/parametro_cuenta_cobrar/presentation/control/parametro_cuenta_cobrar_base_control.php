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

namespace com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\presentation\control;

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

use com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\business\entity\parametro_cuenta_cobrar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/parametro_cuenta_cobrar/util/parametro_cuenta_cobrar_carga.php');
use com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\util\parametro_cuenta_cobrar_carga;

use com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\util\parametro_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\util\parametro_cuenta_cobrar_param_return;
use com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\business\logic\parametro_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\presentation\session\parametro_cuenta_cobrar_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
parametro_cuenta_cobrar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
parametro_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
parametro_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
parametro_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*parametro_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class parametro_cuenta_cobrar_base_control extends parametro_cuenta_cobrar_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->parametro_cuenta_cobrarClase==null) {		
				$this->parametro_cuenta_cobrarClase=new parametro_cuenta_cobrar();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->parametro_cuenta_cobrarClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->parametro_cuenta_cobrarClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->parametro_cuenta_cobrarClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->parametro_cuenta_cobrarClase->setnumero_cuenta_cobrar((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'numero_cuenta_cobrar'));
				
				$this->parametro_cuenta_cobrarClase->setnumero_debito((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'numero_debito'));
				
				$this->parametro_cuenta_cobrarClase->setnumero_credito((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'numero_credito'));
				
				$this->parametro_cuenta_cobrarClase->setnumero_pago((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'numero_pago'));
				
				$this->parametro_cuenta_cobrarClase->setmostrar_anulado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'mostrar_anulado')));
				
				$this->parametro_cuenta_cobrarClase->setnumero_cliente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'numero_cliente'));
				
				$this->parametro_cuenta_cobrarClase->setcon_cliente_inactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_cliente_inactivo')));
				
				$this->parametro_cuenta_cobrarClase->setnombre_registro_tributario($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre_registro_tributario'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->parametro_cuenta_cobrarModel->set($this->parametro_cuenta_cobrarClase);
				
				/*$this->parametro_cuenta_cobrarModel->set($this->migrarModelparametro_cuenta_cobrar($this->parametro_cuenta_cobrarClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setId($this->parametro_cuenta_cobrarClase->getId());	
			$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setVersionRow($this->parametro_cuenta_cobrarClase->getVersionRow());	
			$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setVersionRow($this->parametro_cuenta_cobrarClase->getVersionRow());	
			$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setid_empresa($this->parametro_cuenta_cobrarClase->getid_empresa());	
			$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setnumero_cuenta_cobrar($this->parametro_cuenta_cobrarClase->getnumero_cuenta_cobrar());	
			$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setnumero_debito($this->parametro_cuenta_cobrarClase->getnumero_debito());	
			$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setnumero_credito($this->parametro_cuenta_cobrarClase->getnumero_credito());	
			$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setnumero_pago($this->parametro_cuenta_cobrarClase->getnumero_pago());	
			$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setmostrar_anulado($this->parametro_cuenta_cobrarClase->getmostrar_anulado());	
			$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setnumero_cliente($this->parametro_cuenta_cobrarClase->getnumero_cliente());	
			$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setcon_cliente_inactivo($this->parametro_cuenta_cobrarClase->getcon_cliente_inactivo());	
			$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setnombre_registro_tributario($this->parametro_cuenta_cobrarClase->getnombre_registro_tributario());	
		} else {
			$this->parametro_cuenta_cobrarClase->setId($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->getId());	
			$this->parametro_cuenta_cobrarClase->setVersionRow($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->getVersionRow());	
			$this->parametro_cuenta_cobrarClase->setVersionRow($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->getVersionRow());	
			$this->parametro_cuenta_cobrarClase->setid_empresa($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->getid_empresa());	
			$this->parametro_cuenta_cobrarClase->setnumero_cuenta_cobrar($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->getnumero_cuenta_cobrar());	
			$this->parametro_cuenta_cobrarClase->setnumero_debito($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->getnumero_debito());	
			$this->parametro_cuenta_cobrarClase->setnumero_credito($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->getnumero_credito());	
			$this->parametro_cuenta_cobrarClase->setnumero_pago($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->getnumero_pago());	
			$this->parametro_cuenta_cobrarClase->setmostrar_anulado($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->getmostrar_anulado());	
			$this->parametro_cuenta_cobrarClase->setnumero_cliente($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->getnumero_cliente());	
			$this->parametro_cuenta_cobrarClase->setcon_cliente_inactivo($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->getcon_cliente_inactivo());	
			$this->parametro_cuenta_cobrarClase->setnombre_registro_tributario($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->getnombre_registro_tributario());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->parametro_cuenta_cobrarModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='numero_cuenta_cobrar') {$this->strMensajenumero_cuenta_cobrar=$strMensajeCampo;}
		if($strNombreCampo=='numero_debito') {$this->strMensajenumero_debito=$strMensajeCampo;}
		if($strNombreCampo=='numero_credito') {$this->strMensajenumero_credito=$strMensajeCampo;}
		if($strNombreCampo=='numero_pago') {$this->strMensajenumero_pago=$strMensajeCampo;}
		if($strNombreCampo=='mostrar_anulado') {$this->strMensajemostrar_anulado=$strMensajeCampo;}
		if($strNombreCampo=='numero_cliente') {$this->strMensajenumero_cliente=$strMensajeCampo;}
		if($strNombreCampo=='con_cliente_inactivo') {$this->strMensajecon_cliente_inactivo=$strMensajeCampo;}
		if($strNombreCampo=='nombre_registro_tributario') {$this->strMensajenombre_registro_tributario=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajenumero_cuenta_cobrar='';
		$this->strMensajenumero_debito='';
		$this->strMensajenumero_credito='';
		$this->strMensajenumero_pago='';
		$this->strMensajemostrar_anulado='';
		$this->strMensajenumero_cliente='';
		$this->strMensajecon_cliente_inactivo='';
		$this->strMensajenombre_registro_tributario='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->parametro_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->parametro_cuenta_cobrarLogic->closeNewConnexionToDeep();
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
				$this->parametro_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			$parametro_cuenta_cobrar_session=unserialize($this->Session->read(parametro_cuenta_cobrar_util::$STR_SESSION_NAME));
						
			if($parametro_cuenta_cobrar_session==null) {
				$parametro_cuenta_cobrar_session=new parametro_cuenta_cobrar_session();
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
						$this->parametro_cuenta_cobrarLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->parametro_cuenta_cobrarActual =$this->parametro_cuenta_cobrarClase;
			
			/*$this->parametro_cuenta_cobrarActual =$this->migrarModelparametro_cuenta_cobrar($this->parametro_cuenta_cobrarClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->parametro_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrars(),$this->parametro_cuenta_cobrarActual);
			
			$this->actualizarControllerConReturnGeneral($this->parametro_cuenta_cobrarReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->parametro_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->getNewConnexionToDeep();
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
				$this->parametro_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->parametro_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->parametro_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$parametro_cuenta_cobrarsLocal=$this->getListaActual();
		
		$iIndice=parametro_cuenta_cobrar_util::getIndiceNuevo($parametro_cuenta_cobrarsLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(parametro_cuenta_cobrar $parametro_cuenta_cobrar,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$parametro_cuenta_cobrarsLocal=$this->getListaActual();
		
		$iIndice=parametro_cuenta_cobrar_util::getIndiceActual($parametro_cuenta_cobrarsLocal,$parametro_cuenta_cobrar,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevoparametro_cuenta_cobrar')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->parametro_cuenta_cobrarActual =$this->parametro_cuenta_cobrarClase;
			
			/*$this->parametro_cuenta_cobrarActual =$this->migrarModelparametro_cuenta_cobrar($this->parametro_cuenta_cobrarClase);*/
			
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
			
			$this->parametro_cuenta_cobrarLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
			
			$this->parametro_cuenta_cobrarLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->parametro_cuenta_cobrarLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->parametro_cuenta_cobrarLogic->setparametro_cuenta_cobrar(new parametro_cuenta_cobrar());
				
				$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setIsNew(true);
				$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setIsChanged(true);
				$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->parametro_cuenta_cobrarModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->parametro_cuenta_cobrarLogic->parametro_cuenta_cobrars[]=$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->parametro_cuenta_cobrarLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->parametro_cuenta_cobrarLogic->saveRelaciones($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar());/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setIsChanged(true);
				$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setIsNew(false);
				$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->parametro_cuenta_cobrarModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar(),$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrars());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->parametro_cuenta_cobrarLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->parametro_cuenta_cobrarLogic->saveRelaciones($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar());/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setIsDeleted(true);
				$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setIsNew(false);
				$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setIsChanged(false);				
				
				$this->actualizarLista($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar(),$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrars());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->parametro_cuenta_cobrarLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->parametro_cuenta_cobrarLogic->saveRelaciones($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->parametro_cuenta_cobrarsEliminados[]=$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->parametro_cuenta_cobrarLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->parametro_cuenta_cobrarLogic->saveRelaciones($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->parametro_cuenta_cobrarsEliminados=array();
				}
			}
			
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->parametro_cuenta_cobrarLogic->setparametro_cuenta_cobrars();*/
					
					$this->parametro_cuenta_cobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->parametro_cuenta_cobrarLogic->setIsConDeepLoad(false);
			
			$this->parametro_cuenta_cobrars=$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrars();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(parametro_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista',serialize($this->parametro_cuenta_cobrars));
				$this->Session->write(parametro_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->parametro_cuenta_cobrarsEliminados));
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
				$this->parametro_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->parametro_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->parametro_cuenta_cobrarLogic->closeNewConnexionToDeep();
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
				$this->parametro_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalparametro_cuenta_cobrar;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->parametro_cuenta_cobrarLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->parametro_cuenta_cobrars as $parametro_cuenta_cobrarLocal) {
				if($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->getId()==$parametro_cuenta_cobrarLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar()->setIsDeleted(true);
			$this->parametro_cuenta_cobrarsEliminados[]=$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->parametro_cuenta_cobrars[$indice]);
				
				$this->parametro_cuenta_cobrars = array_values($this->parametro_cuenta_cobrars);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelparametro_cuenta_cobrar($this->parametro_cuenta_cobrarClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->parametro_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->parametro_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(parametro_cuenta_cobrar $parametro_cuenta_cobrar,array $parametro_cuenta_cobrars) {
		try {
			foreach($parametro_cuenta_cobrars as $parametro_cuenta_cobrarLocal){ 
				if($parametro_cuenta_cobrarLocal->getId()==$parametro_cuenta_cobrar->getId()) {
					$parametro_cuenta_cobrarLocal->setIsChanged($parametro_cuenta_cobrar->getIsChanged());
					$parametro_cuenta_cobrarLocal->setIsNew($parametro_cuenta_cobrar->getIsNew());
					$parametro_cuenta_cobrarLocal->setIsDeleted($parametro_cuenta_cobrar->getIsDeleted());
					//$parametro_cuenta_cobrarLocal->setbitExpired($parametro_cuenta_cobrar->getbitExpired());
					
					$parametro_cuenta_cobrarLocal->setId($parametro_cuenta_cobrar->getId());	
					$parametro_cuenta_cobrarLocal->setVersionRow($parametro_cuenta_cobrar->getVersionRow());	
					$parametro_cuenta_cobrarLocal->setVersionRow($parametro_cuenta_cobrar->getVersionRow());	
					$parametro_cuenta_cobrarLocal->setid_empresa($parametro_cuenta_cobrar->getid_empresa());	
					$parametro_cuenta_cobrarLocal->setnumero_cuenta_cobrar($parametro_cuenta_cobrar->getnumero_cuenta_cobrar());	
					$parametro_cuenta_cobrarLocal->setnumero_debito($parametro_cuenta_cobrar->getnumero_debito());	
					$parametro_cuenta_cobrarLocal->setnumero_credito($parametro_cuenta_cobrar->getnumero_credito());	
					$parametro_cuenta_cobrarLocal->setnumero_pago($parametro_cuenta_cobrar->getnumero_pago());	
					$parametro_cuenta_cobrarLocal->setmostrar_anulado($parametro_cuenta_cobrar->getmostrar_anulado());	
					$parametro_cuenta_cobrarLocal->setnumero_cliente($parametro_cuenta_cobrar->getnumero_cliente());	
					$parametro_cuenta_cobrarLocal->setcon_cliente_inactivo($parametro_cuenta_cobrar->getcon_cliente_inactivo());	
					$parametro_cuenta_cobrarLocal->setnombre_registro_tributario($parametro_cuenta_cobrar->getnombre_registro_tributario());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$parametro_cuenta_cobrarsLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$parametro_cuenta_cobrarsLocal=$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrars();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$parametro_cuenta_cobrarsLocal=$this->parametro_cuenta_cobrars;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $parametro_cuenta_cobrarsLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrars() as $parametro_cuenta_cobrar) {
				if($parametro_cuenta_cobrar->getId()==$id) {
					$this->parametro_cuenta_cobrarLogic->setparametro_cuenta_cobrar($parametro_cuenta_cobrar);
					
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
		/*$parametro_cuenta_cobrarsSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->parametro_cuenta_cobrars as $parametro_cuenta_cobrar) {
			$parametro_cuenta_cobrar->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->parametro_cuenta_cobrars[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : parametro_cuenta_cobrar_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$parametro_cuenta_cobrar_session=unserialize($this->Session->read(parametro_cuenta_cobrar_util::$STR_SESSION_NAME));
						
		if($parametro_cuenta_cobrar_session==null) {
			$parametro_cuenta_cobrar_session=new parametro_cuenta_cobrar_session();
		}
		
		
		$this->parametro_cuenta_cobrarReturnGeneral=new parametro_cuenta_cobrar_param_return();
		$this->parametro_cuenta_cobrarParameterGeneral=new parametro_cuenta_cobrar_param_return();
			
		$this->parametro_cuenta_cobrarParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualparametro_cuenta_cobrar(this.parametro_cuenta_cobrar,true);
			this.setVariablesFormularioToObjetoActualForeignKeysparametro_cuenta_cobrar(this.parametro_cuenta_cobrar);*/
			
			if($parametro_cuenta_cobrar_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualparametro_cuenta_cobrar(this.parametro_cuenta_cobrar,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->parametro_cuenta_cobrarActual=$this->parametro_cuenta_cobrarClase;
				
				$this->setCopiarVariablesObjetos($this->parametro_cuenta_cobrarActual,$this->parametro_cuenta_cobrar,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->parametro_cuenta_cobrarReturnGeneral=$this->parametro_cuenta_cobrarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrars(),$this->parametro_cuenta_cobrar,$this->parametro_cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($parametro_cuenta_cobrar_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanparametro_cuenta_cobrar($classes,$this->parametro_cuenta_cobrarReturnGeneral,$this->parametro_cuenta_cobrarBean,false);*/
				}
					
				if($this->parametro_cuenta_cobrarReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->parametro_cuenta_cobrarReturnGeneral->getparametro_cuenta_cobrar(),$this->parametro_cuenta_cobrarActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeyparametro_cuenta_cobrar($this->parametro_cuenta_cobrarReturnGeneral->getparametro_cuenta_cobrar());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormularioparametro_cuenta_cobrar($this->parametro_cuenta_cobrarReturnGeneral->getparametro_cuenta_cobrar());*/
				}
					
				if($this->parametro_cuenta_cobrarReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->parametro_cuenta_cobrarReturnGeneral->getparametro_cuenta_cobrar(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->parametro_cuenta_cobrar,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(parametro_cuenta_cobrarJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualparametro_cuenta_cobrar(this.parametro_cuenta_cobrar,true);
				this.setVariablesFormularioToObjetoActualForeignKeysparametro_cuenta_cobrar(this.parametro_cuenta_cobrar);				
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
				
				if($this->parametro_cuenta_cobrarAnterior!=null) {
					$this->parametro_cuenta_cobrar=$this->parametro_cuenta_cobrarAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->parametro_cuenta_cobrarReturnGeneral=$this->parametro_cuenta_cobrarLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrars(),$this->parametro_cuenta_cobrar,$this->parametro_cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->parametro_cuenta_cobrarReturnGeneral->getparametro_cuenta_cobrar(),$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrars());
			*/
		}
		
		return $this->parametro_cuenta_cobrarReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			$this->parametro_cuenta_cobrarReturnGeneral=new parametro_cuenta_cobrar_param_return();			
			$this->parametro_cuenta_cobrarParameterGeneral=new parametro_cuenta_cobrar_param_return();
			
			$this->parametro_cuenta_cobrarParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->parametro_cuenta_cobrarReturnGeneral=$this->parametro_cuenta_cobrarLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->parametro_cuenta_cobrars,$this->parametro_cuenta_cobrarParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->parametro_cuenta_cobrarReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->parametro_cuenta_cobrarReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->parametro_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->parametro_cuenta_cobrarReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->parametro_cuenta_cobrarLogic->closeNewConnexionToDeep();
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
		
		$this->parametro_cuenta_cobrarReturnGeneral=new parametro_cuenta_cobrar_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_parametro_cuenta_cobrar') {
		    $sDominio='parametro_cuenta_cobrar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->parametro_cuenta_cobrarReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->parametro_cuenta_cobrarReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='parametro_cuenta_cobrar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='parametro_cuenta_cobrar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='parametro_cuenta_cobrar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->parametro_cuenta_cobrarReturnGeneral=new parametro_cuenta_cobrar_param_return();
		$this->parametro_cuenta_cobrarParameterGeneral=new parametro_cuenta_cobrar_param_return();
			
		$this->parametro_cuenta_cobrarParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->parametro_cuenta_cobrarReturnGeneral=$this->parametro_cuenta_cobrarLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrars(),$this->parametro_cuenta_cobrar,$this->parametro_cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->parametro_cuenta_cobrarReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->parametro_cuenta_cobrarReturnGeneral->getparametro_cuenta_cobrar(),$classes);*/
		}									
	
		if($this->parametro_cuenta_cobrarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->parametro_cuenta_cobrarReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->parametro_cuenta_cobrarReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $parametro_cuenta_cobrars,parametro_cuenta_cobrar $parametro_cuenta_cobrar) {
		
		$parametro_cuenta_cobrar_session=unserialize($this->Session->read(parametro_cuenta_cobrar_util::$STR_SESSION_NAME));
						
		if($parametro_cuenta_cobrar_session==null) {
			$parametro_cuenta_cobrar_session=new parametro_cuenta_cobrar_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(parametro_cuenta_cobrar_util::$CLASSNAME);
			}	
			*/
			
			$this->parametro_cuenta_cobrarReturnGeneral=new parametro_cuenta_cobrar_param_return();
			$this->parametro_cuenta_cobrarParameterGeneral=new parametro_cuenta_cobrar_param_return();
			
			$this->parametro_cuenta_cobrarParameterGeneral->setdata($this->data);
		
		
			
		if($parametro_cuenta_cobrar_session->conGuardarRelaciones) {
			$classes=parametro_cuenta_cobrar_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->parametro_cuenta_cobrarActual,$this->parametro_cuenta_cobrar,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->parametro_cuenta_cobrarReturnGeneral=$this->parametro_cuenta_cobrarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrars(),$this->parametro_cuenta_cobrarActual,$this->parametro_cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->parametro_cuenta_cobrarReturnGeneral=$this->parametro_cuenta_cobrarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$parametro_cuenta_cobrars,$parametro_cuenta_cobrar,$this->parametro_cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelparametro_cuenta_cobrar($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar());*/
			
			$this->parametro_cuenta_cobrar=$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrar();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->parametro_cuenta_cobrar);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->parametro_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->parametro_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$parametro_cuenta_cobrarActual=new parametro_cuenta_cobrar();
			
			if($this->parametro_cuenta_cobrarClase==null) {		
				$this->parametro_cuenta_cobrarClase=new parametro_cuenta_cobrar();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$parametro_cuenta_cobrarActual=$this->parametro_cuenta_cobrars[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $parametro_cuenta_cobrarActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $parametro_cuenta_cobrarActual->setnumero_cuenta_cobrar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $parametro_cuenta_cobrarActual->setnumero_debito((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $parametro_cuenta_cobrarActual->setnumero_credito((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $parametro_cuenta_cobrarActual->setnumero_pago((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $parametro_cuenta_cobrarActual->setmostrar_anulado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_8')));  } else { $parametro_cuenta_cobrarActual->setmostrar_anulado(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $parametro_cuenta_cobrarActual->setnumero_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $parametro_cuenta_cobrarActual->setcon_cliente_inactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_10')));  } else { $parametro_cuenta_cobrarActual->setcon_cliente_inactivo(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $parametro_cuenta_cobrarActual->setnombre_registro_tributario($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }

				$this->parametro_cuenta_cobrarClase=$parametro_cuenta_cobrarActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->parametro_cuenta_cobrarModel->set($this->parametro_cuenta_cobrarClase);
				
				/*$this->parametro_cuenta_cobrarModel->set($this->migrarModelparametro_cuenta_cobrar($this->parametro_cuenta_cobrarClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->parametro_cuenta_cobrars=$this->migrarModelparametro_cuenta_cobrar($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrars());							
		$this->parametro_cuenta_cobrars=$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrars();*/
		
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
			$this->Session->write(parametro_cuenta_cobrar_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$parametro_cuenta_cobrar_control_session=unserialize($this->Session->read(parametro_cuenta_cobrar_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($parametro_cuenta_cobrar_control_session==null) {
				$parametro_cuenta_cobrar_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($parametro_cuenta_cobrar_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(parametro_cuenta_cobrar_util::$STR_SESSION_NAME,$this);*/
		} else {
			$parametro_cuenta_cobrar_session=unserialize($this->Session->read(parametro_cuenta_cobrar_util::$STR_SESSION_NAME));
			
			if($parametro_cuenta_cobrar_session==null) {
				$parametro_cuenta_cobrar_session=new parametro_cuenta_cobrar_session();
			}
			
			$this->set(parametro_cuenta_cobrar_util::$STR_SESSION_NAME, $parametro_cuenta_cobrar_session);
		}
	}
	
	public function setCopiarVariablesObjetos(parametro_cuenta_cobrar $parametro_cuenta_cobrarOrigen,parametro_cuenta_cobrar $parametro_cuenta_cobrar,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($parametro_cuenta_cobrar==null) {
				$parametro_cuenta_cobrar=new parametro_cuenta_cobrar();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $parametro_cuenta_cobrarOrigen->getId()!=null && $parametro_cuenta_cobrarOrigen->getId()!=0)) {$parametro_cuenta_cobrar->setId($parametro_cuenta_cobrarOrigen->getId());}}
			if($conDefault || ($conDefault==false && $parametro_cuenta_cobrarOrigen->getnumero_cuenta_cobrar()!=null && $parametro_cuenta_cobrarOrigen->getnumero_cuenta_cobrar()!=0)) {$parametro_cuenta_cobrar->setnumero_cuenta_cobrar($parametro_cuenta_cobrarOrigen->getnumero_cuenta_cobrar());}
			if($conDefault || ($conDefault==false && $parametro_cuenta_cobrarOrigen->getnumero_debito()!=null && $parametro_cuenta_cobrarOrigen->getnumero_debito()!=0)) {$parametro_cuenta_cobrar->setnumero_debito($parametro_cuenta_cobrarOrigen->getnumero_debito());}
			if($conDefault || ($conDefault==false && $parametro_cuenta_cobrarOrigen->getnumero_credito()!=null && $parametro_cuenta_cobrarOrigen->getnumero_credito()!=0)) {$parametro_cuenta_cobrar->setnumero_credito($parametro_cuenta_cobrarOrigen->getnumero_credito());}
			if($conDefault || ($conDefault==false && $parametro_cuenta_cobrarOrigen->getnumero_pago()!=null && $parametro_cuenta_cobrarOrigen->getnumero_pago()!=0)) {$parametro_cuenta_cobrar->setnumero_pago($parametro_cuenta_cobrarOrigen->getnumero_pago());}
			if($conDefault || ($conDefault==false && $parametro_cuenta_cobrarOrigen->getmostrar_anulado()!=null && $parametro_cuenta_cobrarOrigen->getmostrar_anulado()!=false)) {$parametro_cuenta_cobrar->setmostrar_anulado($parametro_cuenta_cobrarOrigen->getmostrar_anulado());}
			if($conDefault || ($conDefault==false && $parametro_cuenta_cobrarOrigen->getnumero_cliente()!=null && $parametro_cuenta_cobrarOrigen->getnumero_cliente()!=0)) {$parametro_cuenta_cobrar->setnumero_cliente($parametro_cuenta_cobrarOrigen->getnumero_cliente());}
			if($conDefault || ($conDefault==false && $parametro_cuenta_cobrarOrigen->getcon_cliente_inactivo()!=null && $parametro_cuenta_cobrarOrigen->getcon_cliente_inactivo()!=false)) {$parametro_cuenta_cobrar->setcon_cliente_inactivo($parametro_cuenta_cobrarOrigen->getcon_cliente_inactivo());}
			if($conDefault || ($conDefault==false && $parametro_cuenta_cobrarOrigen->getnombre_registro_tributario()!=null && $parametro_cuenta_cobrarOrigen->getnombre_registro_tributario()!='')) {$parametro_cuenta_cobrar->setnombre_registro_tributario($parametro_cuenta_cobrarOrigen->getnombre_registro_tributario());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$parametro_cuenta_cobrarsSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$parametro_cuenta_cobrarsSeleccionados[]=$this->parametro_cuenta_cobrars[$indice];
			}
		}
		
		return $parametro_cuenta_cobrarsSeleccionados;
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
		$parametro_cuenta_cobrar= new parametro_cuenta_cobrar();
		
		foreach($this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrars() as $parametro_cuenta_cobrar) {
			
		}		
		
		if($parametro_cuenta_cobrar!=null);
	}
	
	public function cargarRelaciones(array $parametro_cuenta_cobrars=array()) : array {	
		
		$parametro_cuenta_cobrarsRespaldo = array();
		$parametro_cuenta_cobrarsLocal = array();
		
		parametro_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$parametro_cuenta_cobrarsResp=array();
		$classes=array();
			
		
			
			
		$parametro_cuenta_cobrarsRespaldo=$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrars();
			
		$this->parametro_cuenta_cobrarLogic->setIsConDeep(true);
		
		$this->parametro_cuenta_cobrarLogic->setparametro_cuenta_cobrars($parametro_cuenta_cobrars);
			
		$this->parametro_cuenta_cobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$parametro_cuenta_cobrarsLocal=$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrars();
			
		/*RESPALDO*/
		$this->parametro_cuenta_cobrarLogic->setparametro_cuenta_cobrars($parametro_cuenta_cobrarsRespaldo);
			
		$this->parametro_cuenta_cobrarLogic->setIsConDeep(false);
		
		if($parametro_cuenta_cobrarsResp!=null);
		
		return $parametro_cuenta_cobrarsLocal;
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
				$this->parametro_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->parametro_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(parametro_cuenta_cobrar_session $parametro_cuenta_cobrar_session) {
		$parametro_cuenta_cobrar_session->strTypeOnLoad=$this->strTypeOnLoadparametro_cuenta_cobrar;
		$parametro_cuenta_cobrar_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarparametro_cuenta_cobrar;
		$parametro_cuenta_cobrar_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarparametro_cuenta_cobrar;
		$parametro_cuenta_cobrar_session->bitEsPopup=$this->bitEsPopup;
		$parametro_cuenta_cobrar_session->bitEsBusqueda=$this->bitEsBusqueda;
		$parametro_cuenta_cobrar_session->strFuncionJs=$this->strFuncionJs;
		/*$parametro_cuenta_cobrar_session->strSufijo=$this->strSufijo;*/
		$parametro_cuenta_cobrar_session->bitEsRelaciones=$this->bitEsRelaciones;
		$parametro_cuenta_cobrar_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, parametro_cuenta_cobrar_util::$STR_NOMBRE_CLASE,0,false,false);				
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
		$parametro_cuenta_cobrarViewAdditional=new parametro_cuenta_cobrarView_add();
		$parametro_cuenta_cobrarViewAdditional->parametro_cuenta_cobrars=$this->parametro_cuenta_cobrars;
		$parametro_cuenta_cobrarViewAdditional->Session=$this->Session;
		
		return $parametro_cuenta_cobrarViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$parametro_cuenta_cobrarsLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$parametro_cuenta_cobrarsLocal=$this->parametro_cuenta_cobrars;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$parametro_cuenta_cobrarsLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($parametro_cuenta_cobrarsLocal)<=0) {
					$parametro_cuenta_cobrarsLocal=$this->parametro_cuenta_cobrars;
				}
			} else {
				$parametro_cuenta_cobrarsLocal=$this->parametro_cuenta_cobrars;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarparametro_cuenta_cobrarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarparametro_cuenta_cobrarsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$parametro_cuenta_cobrarLogic=new parametro_cuenta_cobrar_logic();
		$parametro_cuenta_cobrarLogic->setparametro_cuenta_cobrars($this->parametro_cuenta_cobrars);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		 
			
		
			$class=new Classe('empresa');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$parametro_cuenta_cobrarLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->parametro_cuenta_cobrars=$parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrars();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->parametro_cuenta_cobrarsLocal=$this->parametro_cuenta_cobrars;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=parametro_cuenta_cobrar_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=parametro_cuenta_cobrar_util::$STR_TABLE_NAME;		
			
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
			
			$parametro_cuenta_cobrars = $this->parametro_cuenta_cobrars;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = parametro_cuenta_cobrar_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = parametro_cuenta_cobrar_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/cuentascobrar/presentation/templating/parametro_cuenta_cobrar_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->parametro_cuenta_cobrars=$parametro_cuenta_cobrars;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->parametro_cuenta_cobrarsLocal=$parametro_cuenta_cobrarsLocal;
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
		
		$parametro_cuenta_cobrarsLocal=array();
		
		$parametro_cuenta_cobrarsLocal=$this->parametro_cuenta_cobrars;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarparametro_cuenta_cobrarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarparametro_cuenta_cobrarsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$parametro_cuenta_cobrarLogic=new parametro_cuenta_cobrar_logic();
		$parametro_cuenta_cobrarLogic->setparametro_cuenta_cobrars($this->parametro_cuenta_cobrars);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		 
			
		
			$class=new Classe('empresa');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$parametro_cuenta_cobrarLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->parametro_cuenta_cobrars=$parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrars();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$parametro_cuenta_cobrars = $this->parametro_cuenta_cobrars;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = parametro_cuenta_cobrar_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = parametro_cuenta_cobrar_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/cuentascobrar/presentation/templating/parametro_cuenta_cobrar_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->parametro_cuenta_cobrars=$parametro_cuenta_cobrars;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->parametro_cuenta_cobrarsLocal=$parametro_cuenta_cobrarsLocal;
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
	
	public function getHtmlTablaDatosResumen(array $parametro_cuenta_cobrars=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->parametro_cuenta_cobrarsReporte = $parametro_cuenta_cobrars;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarparametro_cuenta_cobrarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarparametro_cuenta_cobrarsAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $parametro_cuenta_cobrars=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->parametro_cuenta_cobrarsReporte = $parametro_cuenta_cobrars;		
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
		
		
		$this->parametro_cuenta_cobrarsReporte=$this->cargarRelaciones($parametro_cuenta_cobrars);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarparametro_cuenta_cobrarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarparametro_cuenta_cobrarsAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(parametro_cuenta_cobrar $parametro_cuenta_cobrar=null) : string {	
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
			
			
			$parametro_cuenta_cobrarsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$parametro_cuenta_cobrarsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($parametro_cuenta_cobrarsLocal)<=0) {
					/*//DEBE ESCOGER
					$parametro_cuenta_cobrarsLocal=$this->parametro_cuenta_cobrars;*/
				}
			} else {
				/*//DEBE ESCOGER
				$parametro_cuenta_cobrarsLocal=$this->parametro_cuenta_cobrars;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($parametro_cuenta_cobrarsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($parametro_cuenta_cobrarsLocal,true);
			
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
				$this->parametro_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
					
			$parametro_cuenta_cobrarsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$parametro_cuenta_cobrarsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($parametro_cuenta_cobrarsLocal)<=0) {
					/*//DEBE ESCOGER
					$parametro_cuenta_cobrarsLocal=$this->parametro_cuenta_cobrars;*/
				}
			} else {
				/*//DEBE ESCOGER
				$parametro_cuenta_cobrarsLocal=$this->parametro_cuenta_cobrars;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($parametro_cuenta_cobrarsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($parametro_cuenta_cobrarsLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->parametro_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->parametro_cuenta_cobrarLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Parametro Cuentas Cobrars';
			
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
			$fileName='parametro_cuenta_cobrar';
			
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
			
			$title='Reporte de  Parametro Cuentas Cobrars';
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
			
			$title='Reporte de  Parametro Cuentas Cobrars';
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
				$this->parametro_cuenta_cobrarLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Parametro Cuentas Cobrars';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->parametro_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->parametro_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=parametro_cuenta_cobrar_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->parametro_cuenta_cobrarsAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_cuenta_cobrarsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->parametro_cuenta_cobrarsAuxiliar)<=0) {
					$this->parametro_cuenta_cobrarsAuxiliar=$this->parametro_cuenta_cobrars;
				}
			} else {
				$this->parametro_cuenta_cobrarsAuxiliar=$this->parametro_cuenta_cobrars;
			}
		/*} else {
			$this->parametro_cuenta_cobrarsAuxiliar=$this->parametro_cuenta_cobrarsReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->parametro_cuenta_cobrarsAuxiliar as $parametro_cuenta_cobrar) {
				$row=array();
				
				$row=parametro_cuenta_cobrar_util::getDataReportRow($tipo,$parametro_cuenta_cobrar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			parametro_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$parametro_cuenta_cobrarsResp=array();
			$classes=array();
			
			
			
			
			$parametro_cuenta_cobrarsResp=$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrars();
			
			$this->parametro_cuenta_cobrarLogic->setIsConDeep(true);
			
			$this->parametro_cuenta_cobrarLogic->setparametro_cuenta_cobrars($this->parametro_cuenta_cobrarsAuxiliar);
			
			$this->parametro_cuenta_cobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->parametro_cuenta_cobrarsAuxiliar=$this->parametro_cuenta_cobrarLogic->getparametro_cuenta_cobrars();
			
			//RESPALDO
			$this->parametro_cuenta_cobrarLogic->setparametro_cuenta_cobrars($parametro_cuenta_cobrarsResp);
			
			$this->parametro_cuenta_cobrarLogic->setIsConDeep(false);
			*/
			
			$this->parametro_cuenta_cobrarsAuxiliar=$this->cargarRelaciones($this->parametro_cuenta_cobrarsAuxiliar);
			
			$i=0;
			
			foreach ($this->parametro_cuenta_cobrarsAuxiliar as $parametro_cuenta_cobrar) {
				$row=array();
				
				if($i!=0) {
					$row=parametro_cuenta_cobrar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=parametro_cuenta_cobrar_util::getDataReportRow($tipo,$parametro_cuenta_cobrar,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
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
		$this->parametro_cuenta_cobrarsAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_cuenta_cobrarsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->parametro_cuenta_cobrarsAuxiliar)<=0) {
					$this->parametro_cuenta_cobrarsAuxiliar=$this->parametro_cuenta_cobrars;
				}
			} else {
				$this->parametro_cuenta_cobrarsAuxiliar=$this->parametro_cuenta_cobrars;
			}
		/*} else {
			$this->parametro_cuenta_cobrarsAuxiliar=$this->parametro_cuenta_cobrarsReporte;	
		}*/
		
		foreach ($this->parametro_cuenta_cobrarsAuxiliar as $parametro_cuenta_cobrar) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(parametro_cuenta_cobrar_util::getparametro_cuenta_cobrarDescripcion($parametro_cuenta_cobrar),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_cobrar->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero Cuenta Cobrar',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Cuenta Cobrar',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_cobrar->getnumero_cuenta_cobrar(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero Debito',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Debito',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_cobrar->getnumero_debito(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero Credito',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Credito',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_cobrar->getnumero_credito(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero Pago',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Pago',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_cobrar->getnumero_pago(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Mostrar Anulado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Mostrar Anulado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_cobrar->getmostrar_anulado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero Cliente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Cliente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_cobrar->getnumero_cliente(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Cliente Inactivo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Cliente Inactivo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_cobrar->getcon_cliente_inactivo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre Registro Tributario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Registro Tributario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_cobrar->getnombre_registro_tributario(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface parametro_cuenta_cobrar_base_controlI {			
		
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
		public function getIndiceActual(parametro_cuenta_cobrar $parametro_cuenta_cobrar,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(parametro_cuenta_cobrar $parametro_cuenta_cobrar,array $parametro_cuenta_cobrars);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : parametro_cuenta_cobrar_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $parametro_cuenta_cobrars,parametro_cuenta_cobrar $parametro_cuenta_cobrar);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(parametro_cuenta_cobrar_param_return $parametro_cuenta_cobrarReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(parametro_cuenta_cobrar_session $parametro_cuenta_cobrar_session);		
		public function actualizarInvitadoSessionDivStyleVariables(parametro_cuenta_cobrar_session $parametro_cuenta_cobrar_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(parametro_cuenta_cobrar $parametro_cuenta_cobrarOrigen,parametro_cuenta_cobrar $parametro_cuenta_cobrar,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(parametro_cuenta_cobrar_control $parametro_cuenta_cobrar_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $parametro_cuenta_cobrars=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(parametro_cuenta_cobrar_session $parametro_cuenta_cobrar_session);		
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
		public function getHtmlTablaDatosResumen(array $parametro_cuenta_cobrars=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $parametro_cuenta_cobrars=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(parametro_cuenta_cobrar $parametro_cuenta_cobrar=null) : string;
		
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
