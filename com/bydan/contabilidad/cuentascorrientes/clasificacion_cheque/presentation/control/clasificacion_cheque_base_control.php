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

namespace com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\entity\clasificacion_cheque;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/clasificacion_cheque/util/clasificacion_cheque_carga.php');
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_carga;

use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_util;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_param_return;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\logic\clasificacion_cheque_logic;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\presentation\session\clasificacion_cheque_session;


//FK


use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\entity\cuenta_corriente_detalle;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\logic\cuenta_corriente_detalle_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_util;

use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\entity\categoria_cheque;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\logic\categoria_cheque_logic;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
clasificacion_cheque_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
clasificacion_cheque_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
clasificacion_cheque_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
clasificacion_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*clasificacion_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class clasificacion_cheque_base_control extends clasificacion_cheque_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->clasificacion_chequeClase==null) {		
				$this->clasificacion_chequeClase=new clasificacion_cheque();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_corriente_detalle')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta_corriente_detalle',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_categoria_cheque')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_categoria_cheque',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->clasificacion_chequeClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->clasificacion_chequeClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->clasificacion_chequeClase->setid_cuenta_corriente_detalle((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_corriente_detalle'));
				
				$this->clasificacion_chequeClase->setid_categoria_cheque((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_categoria_cheque'));
				
				$this->clasificacion_chequeClase->setmonto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'monto'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->clasificacion_chequeModel->set($this->clasificacion_chequeClase);
				
				/*$this->clasificacion_chequeModel->set($this->migrarModelclasificacion_cheque($this->clasificacion_chequeClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->clasificacion_chequeLogic->getclasificacion_cheque()->setId($this->clasificacion_chequeClase->getId());	
			$this->clasificacion_chequeLogic->getclasificacion_cheque()->setVersionRow($this->clasificacion_chequeClase->getVersionRow());	
			$this->clasificacion_chequeLogic->getclasificacion_cheque()->setVersionRow($this->clasificacion_chequeClase->getVersionRow());	
			$this->clasificacion_chequeLogic->getclasificacion_cheque()->setid_cuenta_corriente_detalle($this->clasificacion_chequeClase->getid_cuenta_corriente_detalle());	
			$this->clasificacion_chequeLogic->getclasificacion_cheque()->setid_categoria_cheque($this->clasificacion_chequeClase->getid_categoria_cheque());	
			$this->clasificacion_chequeLogic->getclasificacion_cheque()->setmonto($this->clasificacion_chequeClase->getmonto());	
		} else {
			$this->clasificacion_chequeClase->setId($this->clasificacion_chequeLogic->getclasificacion_cheque()->getId());	
			$this->clasificacion_chequeClase->setVersionRow($this->clasificacion_chequeLogic->getclasificacion_cheque()->getVersionRow());	
			$this->clasificacion_chequeClase->setVersionRow($this->clasificacion_chequeLogic->getclasificacion_cheque()->getVersionRow());	
			$this->clasificacion_chequeClase->setid_cuenta_corriente_detalle($this->clasificacion_chequeLogic->getclasificacion_cheque()->getid_cuenta_corriente_detalle());	
			$this->clasificacion_chequeClase->setid_categoria_cheque($this->clasificacion_chequeLogic->getclasificacion_cheque()->getid_categoria_cheque());	
			$this->clasificacion_chequeClase->setmonto($this->clasificacion_chequeLogic->getclasificacion_cheque()->getmonto());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->clasificacion_chequeModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_cuenta_corriente_detalle') {$this->strMensajeid_cuenta_corriente_detalle=$strMensajeCampo;}
		if($strNombreCampo=='id_categoria_cheque') {$this->strMensajeid_categoria_cheque=$strMensajeCampo;}
		if($strNombreCampo=='monto') {$this->strMensajemonto=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_cuenta_corriente_detalle='';
		$this->strMensajeid_categoria_cheque='';
		$this->strMensajemonto='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
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
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}

			$clasificacion_cheque_session=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME));
						
			if($clasificacion_cheque_session==null) {
				$clasificacion_cheque_session=new clasificacion_cheque_session();
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
						$this->clasificacion_chequeLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->clasificacion_chequeActual =$this->clasificacion_chequeClase;
			
			/*$this->clasificacion_chequeActual =$this->migrarModelclasificacion_cheque($this->clasificacion_chequeClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->clasificacion_chequeLogic->getclasificacion_cheques(),$this->clasificacion_chequeActual);
			
			$this->actualizarControllerConReturnGeneral($this->clasificacion_chequeReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
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
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$clasificacion_chequesLocal=$this->getListaActual();
		
		$iIndice=clasificacion_cheque_util::getIndiceNuevo($clasificacion_chequesLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(clasificacion_cheque $clasificacion_cheque,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$clasificacion_chequesLocal=$this->getListaActual();
		
		$iIndice=clasificacion_cheque_util::getIndiceActual($clasificacion_chequesLocal,$clasificacion_cheque,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevoclasificacion_cheque')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->clasificacion_chequeActual =$this->clasificacion_chequeClase;
			
			/*$this->clasificacion_chequeActual =$this->migrarModelclasificacion_cheque($this->clasificacion_chequeClase);*/
			
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
			
			$this->clasificacion_chequeLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('cuenta_corriente_detalle');$classes[]=$class;
				$class=new Classe('categoria_cheque');$classes[]=$class;
			
			$this->clasificacion_chequeLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->clasificacion_chequeLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->clasificacion_chequeLogic->setclasificacion_cheque(new clasificacion_cheque());
				
				$this->clasificacion_chequeLogic->getclasificacion_cheque()->setIsNew(true);
				$this->clasificacion_chequeLogic->getclasificacion_cheque()->setIsChanged(true);
				$this->clasificacion_chequeLogic->getclasificacion_cheque()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->clasificacion_chequeModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->clasificacion_chequeLogic->clasificacion_cheques[]=$this->clasificacion_chequeLogic->getclasificacion_cheque();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->clasificacion_chequeLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->clasificacion_chequeLogic->saveRelaciones($this->clasificacion_chequeLogic->getclasificacion_cheque());/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->clasificacion_chequeLogic->getclasificacion_cheque()->setIsChanged(true);
				$this->clasificacion_chequeLogic->getclasificacion_cheque()->setIsNew(false);
				$this->clasificacion_chequeLogic->getclasificacion_cheque()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->clasificacion_chequeModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->clasificacion_chequeLogic->getclasificacion_cheque(),$this->clasificacion_chequeLogic->getclasificacion_cheques());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->clasificacion_chequeLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->clasificacion_chequeLogic->saveRelaciones($this->clasificacion_chequeLogic->getclasificacion_cheque());/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->clasificacion_chequeLogic->getclasificacion_cheque()->setIsDeleted(true);
				$this->clasificacion_chequeLogic->getclasificacion_cheque()->setIsNew(false);
				$this->clasificacion_chequeLogic->getclasificacion_cheque()->setIsChanged(false);				
				
				$this->actualizarLista($this->clasificacion_chequeLogic->getclasificacion_cheque(),$this->clasificacion_chequeLogic->getclasificacion_cheques());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->clasificacion_chequeLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->clasificacion_chequeLogic->saveRelaciones($this->clasificacion_chequeLogic->getclasificacion_cheque());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->clasificacion_chequesEliminados[]=$this->clasificacion_chequeLogic->getclasificacion_cheque();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->clasificacion_chequeLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->clasificacion_chequeLogic->saveRelaciones($this->clasificacion_chequeLogic->getclasificacion_cheque());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->clasificacion_chequesEliminados=array();
				}
			}
			
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('cuenta_corriente_detalle');$classes[]=$class;
				$class=new Classe('categoria_cheque');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->clasificacion_chequeLogic->setclasificacion_cheques();*/
					
					$this->clasificacion_chequeLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->clasificacion_chequeLogic->setIsConDeepLoad(false);
			
			$this->clasificacion_cheques=$this->clasificacion_chequeLogic->getclasificacion_cheques();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(clasificacion_cheque_util::$STR_SESSION_NAME.'Lista',serialize($this->clasificacion_cheques));
				$this->Session->write(clasificacion_cheque_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->clasificacion_chequesEliminados));
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
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
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
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalclasificacion_cheque;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->clasificacion_chequeLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->clasificacion_cheques as $clasificacion_chequeLocal) {
				if($this->clasificacion_chequeLogic->getclasificacion_cheque()->getId()==$clasificacion_chequeLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->clasificacion_chequeLogic->getclasificacion_cheque()->setIsDeleted(true);
			$this->clasificacion_chequesEliminados[]=$this->clasificacion_chequeLogic->getclasificacion_cheque();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->clasificacion_cheques[$indice]);
				
				$this->clasificacion_cheques = array_values($this->clasificacion_cheques);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelclasificacion_cheque($this->clasificacion_chequeClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(clasificacion_cheque $clasificacion_cheque,array $clasificacion_cheques) {
		try {
			foreach($clasificacion_cheques as $clasificacion_chequeLocal){ 
				if($clasificacion_chequeLocal->getId()==$clasificacion_cheque->getId()) {
					$clasificacion_chequeLocal->setIsChanged($clasificacion_cheque->getIsChanged());
					$clasificacion_chequeLocal->setIsNew($clasificacion_cheque->getIsNew());
					$clasificacion_chequeLocal->setIsDeleted($clasificacion_cheque->getIsDeleted());
					//$clasificacion_chequeLocal->setbitExpired($clasificacion_cheque->getbitExpired());
					
					$clasificacion_chequeLocal->setId($clasificacion_cheque->getId());	
					$clasificacion_chequeLocal->setVersionRow($clasificacion_cheque->getVersionRow());	
					$clasificacion_chequeLocal->setVersionRow($clasificacion_cheque->getVersionRow());	
					$clasificacion_chequeLocal->setid_cuenta_corriente_detalle($clasificacion_cheque->getid_cuenta_corriente_detalle());	
					$clasificacion_chequeLocal->setid_categoria_cheque($clasificacion_cheque->getid_categoria_cheque());	
					$clasificacion_chequeLocal->setmonto($clasificacion_cheque->getmonto());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$clasificacion_chequesLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$clasificacion_chequesLocal=$this->clasificacion_chequeLogic->getclasificacion_cheques();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$clasificacion_chequesLocal=$this->clasificacion_cheques;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $clasificacion_chequesLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->clasificacion_chequeLogic->getclasificacion_cheques() as $clasificacion_cheque) {
				if($clasificacion_cheque->getId()==$id) {
					$this->clasificacion_chequeLogic->setclasificacion_cheque($clasificacion_cheque);
					
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
		/*$clasificacion_chequesSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->clasificacion_cheques as $clasificacion_cheque) {
			$clasificacion_cheque->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->clasificacion_cheques[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : clasificacion_cheque_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$clasificacion_cheque_session=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME));
						
		if($clasificacion_cheque_session==null) {
			$clasificacion_cheque_session=new clasificacion_cheque_session();
		}
		
		
		$this->clasificacion_chequeReturnGeneral=new clasificacion_cheque_param_return();
		$this->clasificacion_chequeParameterGeneral=new clasificacion_cheque_param_return();
			
		$this->clasificacion_chequeParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualclasificacion_cheque(this.clasificacion_cheque,true);
			this.setVariablesFormularioToObjetoActualForeignKeysclasificacion_cheque(this.clasificacion_cheque);*/
			
			if($clasificacion_cheque_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualclasificacion_cheque(this.clasificacion_cheque,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->clasificacion_chequeActual=$this->clasificacion_chequeClase;
				
				$this->setCopiarVariablesObjetos($this->clasificacion_chequeActual,$this->clasificacion_cheque,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->clasificacion_chequeReturnGeneral=$this->clasificacion_chequeLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->clasificacion_chequeLogic->getclasificacion_cheques(),$this->clasificacion_cheque,$this->clasificacion_chequeParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($clasificacion_cheque_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanclasificacion_cheque($classes,$this->clasificacion_chequeReturnGeneral,$this->clasificacion_chequeBean,false);*/
				}
					
				if($this->clasificacion_chequeReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->clasificacion_chequeReturnGeneral->getclasificacion_cheque(),$this->clasificacion_chequeActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeyclasificacion_cheque($this->clasificacion_chequeReturnGeneral->getclasificacion_cheque());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormularioclasificacion_cheque($this->clasificacion_chequeReturnGeneral->getclasificacion_cheque());*/
				}
					
				if($this->clasificacion_chequeReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->clasificacion_chequeReturnGeneral->getclasificacion_cheque(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->clasificacion_cheque,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(clasificacion_chequeJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualclasificacion_cheque(this.clasificacion_cheque,true);
				this.setVariablesFormularioToObjetoActualForeignKeysclasificacion_cheque(this.clasificacion_cheque);				
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
				
				if($this->clasificacion_chequeAnterior!=null) {
					$this->clasificacion_cheque=$this->clasificacion_chequeAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->clasificacion_chequeReturnGeneral=$this->clasificacion_chequeLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->clasificacion_chequeLogic->getclasificacion_cheques(),$this->clasificacion_cheque,$this->clasificacion_chequeParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->clasificacion_chequeReturnGeneral->getclasificacion_cheque(),$this->clasificacion_chequeLogic->getclasificacion_cheques());
			*/
		}
		
		return $this->clasificacion_chequeReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}

			$this->clasificacion_chequeReturnGeneral=new clasificacion_cheque_param_return();			
			$this->clasificacion_chequeParameterGeneral=new clasificacion_cheque_param_return();
			
			$this->clasificacion_chequeParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->clasificacion_chequeReturnGeneral=$this->clasificacion_chequeLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->clasificacion_cheques,$this->clasificacion_chequeParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->clasificacion_chequeReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->clasificacion_chequeReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->clasificacion_chequeReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
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
		
		$this->clasificacion_chequeReturnGeneral=new clasificacion_cheque_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_clasificacion_cheque') {
		    $sDominio='clasificacion_cheque';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->clasificacion_chequeReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->clasificacion_chequeReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='clasificacion_cheque';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='clasificacion_cheque';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='clasificacion_cheque';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->clasificacion_chequeReturnGeneral=new clasificacion_cheque_param_return();
		$this->clasificacion_chequeParameterGeneral=new clasificacion_cheque_param_return();
			
		$this->clasificacion_chequeParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->clasificacion_chequeReturnGeneral=$this->clasificacion_chequeLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->clasificacion_chequeLogic->getclasificacion_cheques(),$this->clasificacion_cheque,$this->clasificacion_chequeParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->clasificacion_chequeReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->clasificacion_chequeReturnGeneral->getclasificacion_cheque(),$classes);*/
		}									
	
		if($this->clasificacion_chequeReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->clasificacion_chequeReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->clasificacion_chequeReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $clasificacion_cheques,clasificacion_cheque $clasificacion_cheque) {
		
		$clasificacion_cheque_session=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME));
						
		if($clasificacion_cheque_session==null) {
			$clasificacion_cheque_session=new clasificacion_cheque_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(clasificacion_cheque_util::$CLASSNAME);
			}	
			*/
			
			$this->clasificacion_chequeReturnGeneral=new clasificacion_cheque_param_return();
			$this->clasificacion_chequeParameterGeneral=new clasificacion_cheque_param_return();
			
			$this->clasificacion_chequeParameterGeneral->setdata($this->data);
		
		
			
		if($clasificacion_cheque_session->conGuardarRelaciones) {
			$classes=clasificacion_cheque_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->clasificacion_chequeActual,$this->clasificacion_cheque,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->clasificacion_chequeReturnGeneral=$this->clasificacion_chequeLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->clasificacion_chequeLogic->getclasificacion_cheques(),$this->clasificacion_chequeActual,$this->clasificacion_chequeParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->clasificacion_chequeReturnGeneral=$this->clasificacion_chequeLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$clasificacion_cheques,$clasificacion_cheque,$this->clasificacion_chequeParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelclasificacion_cheque($this->clasificacion_chequeLogic->getclasificacion_cheque());*/
			
			$this->clasificacion_cheque=$this->clasificacion_chequeLogic->getclasificacion_cheque();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->clasificacion_cheque);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$clasificacion_chequeActual=new clasificacion_cheque();
			
			if($this->clasificacion_chequeClase==null) {		
				$this->clasificacion_chequeClase=new clasificacion_cheque();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$clasificacion_chequeActual=$this->clasificacion_cheques[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $clasificacion_chequeActual->setid_cuenta_corriente_detalle((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $clasificacion_chequeActual->setid_categoria_cheque((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $clasificacion_chequeActual->setmonto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }

				$this->clasificacion_chequeClase=$clasificacion_chequeActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->clasificacion_chequeModel->set($this->clasificacion_chequeClase);
				
				/*$this->clasificacion_chequeModel->set($this->migrarModelclasificacion_cheque($this->clasificacion_chequeClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->clasificacion_cheques=$this->migrarModelclasificacion_cheque($this->clasificacion_chequeLogic->getclasificacion_cheques());							
		$this->clasificacion_cheques=$this->clasificacion_chequeLogic->getclasificacion_cheques();*/
		
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
			$this->Session->write(clasificacion_cheque_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$clasificacion_cheque_control_session=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($clasificacion_cheque_control_session==null) {
				$clasificacion_cheque_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($clasificacion_cheque_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(clasificacion_cheque_util::$STR_SESSION_NAME,$this);*/
		} else {
			$clasificacion_cheque_session=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME));
			
			if($clasificacion_cheque_session==null) {
				$clasificacion_cheque_session=new clasificacion_cheque_session();
			}
			
			$this->set(clasificacion_cheque_util::$STR_SESSION_NAME, $clasificacion_cheque_session);
		}
	}
	
	public function setCopiarVariablesObjetos(clasificacion_cheque $clasificacion_chequeOrigen,clasificacion_cheque $clasificacion_cheque,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($clasificacion_cheque==null) {
				$clasificacion_cheque=new clasificacion_cheque();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $clasificacion_chequeOrigen->getId()!=null && $clasificacion_chequeOrigen->getId()!=0)) {$clasificacion_cheque->setId($clasificacion_chequeOrigen->getId());}}
			if($conDefault || ($conDefault==false && $clasificacion_chequeOrigen->getid_cuenta_corriente_detalle()!=null && $clasificacion_chequeOrigen->getid_cuenta_corriente_detalle()!=-1)) {$clasificacion_cheque->setid_cuenta_corriente_detalle($clasificacion_chequeOrigen->getid_cuenta_corriente_detalle());}
			if($conDefault || ($conDefault==false && $clasificacion_chequeOrigen->getid_categoria_cheque()!=null && $clasificacion_chequeOrigen->getid_categoria_cheque()!=-1)) {$clasificacion_cheque->setid_categoria_cheque($clasificacion_chequeOrigen->getid_categoria_cheque());}
			if($conDefault || ($conDefault==false && $clasificacion_chequeOrigen->getmonto()!=null && $clasificacion_chequeOrigen->getmonto()!=0.0)) {$clasificacion_cheque->setmonto($clasificacion_chequeOrigen->getmonto());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$clasificacion_chequesSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$clasificacion_chequesSeleccionados[]=$this->clasificacion_cheques[$indice];
			}
		}
		
		return $clasificacion_chequesSeleccionados;
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
		$clasificacion_cheque= new clasificacion_cheque();
		
		foreach($this->clasificacion_chequeLogic->getclasificacion_cheques() as $clasificacion_cheque) {
			
		}		
		
		if($clasificacion_cheque!=null);
	}
	
	public function cargarRelaciones(array $clasificacion_cheques=array()) : array {	
		
		$clasificacion_chequesRespaldo = array();
		$clasificacion_chequesLocal = array();
		
		clasificacion_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$clasificacion_chequesResp=array();
		$classes=array();
			
		
			
			
		$clasificacion_chequesRespaldo=$this->clasificacion_chequeLogic->getclasificacion_cheques();
			
		$this->clasificacion_chequeLogic->setIsConDeep(true);
		
		$this->clasificacion_chequeLogic->setclasificacion_cheques($clasificacion_cheques);
			
		$this->clasificacion_chequeLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$clasificacion_chequesLocal=$this->clasificacion_chequeLogic->getclasificacion_cheques();
			
		/*RESPALDO*/
		$this->clasificacion_chequeLogic->setclasificacion_cheques($clasificacion_chequesRespaldo);
			
		$this->clasificacion_chequeLogic->setIsConDeep(false);
		
		if($clasificacion_chequesResp!=null);
		
		return $clasificacion_chequesLocal;
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
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(clasificacion_cheque_session $clasificacion_cheque_session) {
		$clasificacion_cheque_session->strTypeOnLoad=$this->strTypeOnLoadclasificacion_cheque;
		$clasificacion_cheque_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarclasificacion_cheque;
		$clasificacion_cheque_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarclasificacion_cheque;
		$clasificacion_cheque_session->bitEsPopup=$this->bitEsPopup;
		$clasificacion_cheque_session->bitEsBusqueda=$this->bitEsBusqueda;
		$clasificacion_cheque_session->strFuncionJs=$this->strFuncionJs;
		/*$clasificacion_cheque_session->strSufijo=$this->strSufijo;*/
		$clasificacion_cheque_session->bitEsRelaciones=$this->bitEsRelaciones;
		$clasificacion_cheque_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, clasificacion_cheque_util::$STR_NOMBRE_CLASE,0,false,false);				
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
		$clasificacion_chequeViewAdditional=new clasificacion_chequeView_add();
		$clasificacion_chequeViewAdditional->clasificacion_cheques=$this->clasificacion_cheques;
		$clasificacion_chequeViewAdditional->Session=$this->Session;
		
		return $clasificacion_chequeViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$clasificacion_chequesLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$clasificacion_chequesLocal=$this->clasificacion_cheques;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$clasificacion_chequesLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($clasificacion_chequesLocal)<=0) {
					$clasificacion_chequesLocal=$this->clasificacion_cheques;
				}
			} else {
				$clasificacion_chequesLocal=$this->clasificacion_cheques;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarclasificacion_chequesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarclasificacion_chequesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$clasificacion_chequeLogic=new clasificacion_cheque_logic();
		$clasificacion_chequeLogic->setclasificacion_cheques($this->clasificacion_cheques);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		 
			
		
			$class=new Classe('cuenta_corriente_detalle');$classes[]=$class;
			$class=new Classe('categoria_cheque');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$clasificacion_chequeLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->clasificacion_cheques=$clasificacion_chequeLogic->getclasificacion_cheques();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->clasificacion_chequesLocal=$this->clasificacion_cheques;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=clasificacion_cheque_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=clasificacion_cheque_util::$STR_TABLE_NAME;		
			
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
			
			$clasificacion_cheques = $this->clasificacion_cheques;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = clasificacion_cheque_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = clasificacion_cheque_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/cuentascorrientes/presentation/templating/clasificacion_cheque_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->clasificacion_cheques=$clasificacion_cheques;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->clasificacion_chequesLocal=$clasificacion_chequesLocal;
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
		
		$clasificacion_chequesLocal=array();
		
		$clasificacion_chequesLocal=$this->clasificacion_cheques;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarclasificacion_chequesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarclasificacion_chequesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$clasificacion_chequeLogic=new clasificacion_cheque_logic();
		$clasificacion_chequeLogic->setclasificacion_cheques($this->clasificacion_cheques);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		 
			
		
			$class=new Classe('cuenta_corriente_detalle');$classes[]=$class;
			$class=new Classe('categoria_cheque');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$clasificacion_chequeLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->clasificacion_cheques=$clasificacion_chequeLogic->getclasificacion_cheques();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$clasificacion_cheques = $this->clasificacion_cheques;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = clasificacion_cheque_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = clasificacion_cheque_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/cuentascorrientes/presentation/templating/clasificacion_cheque_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->clasificacion_cheques=$clasificacion_cheques;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->clasificacion_chequesLocal=$clasificacion_chequesLocal;
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
	
	public function getHtmlTablaDatosResumen(array $clasificacion_cheques=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->clasificacion_chequesReporte = $clasificacion_cheques;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarclasificacion_chequesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarclasificacion_chequesAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $clasificacion_cheques=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->clasificacion_chequesReporte = $clasificacion_cheques;		
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
		
		
		$this->clasificacion_chequesReporte=$this->cargarRelaciones($clasificacion_cheques);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarclasificacion_chequesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarclasificacion_chequesAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(clasificacion_cheque $clasificacion_cheque=null) : string {	
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
			
			
			$clasificacion_chequesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$clasificacion_chequesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($clasificacion_chequesLocal)<=0) {
					/*//DEBE ESCOGER
					$clasificacion_chequesLocal=$this->clasificacion_cheques;*/
				}
			} else {
				/*//DEBE ESCOGER
				$clasificacion_chequesLocal=$this->clasificacion_cheques;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($clasificacion_chequesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($clasificacion_chequesLocal,true);
			
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
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}
					
			$clasificacion_chequesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$clasificacion_chequesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($clasificacion_chequesLocal)<=0) {
					/*//DEBE ESCOGER
					$clasificacion_chequesLocal=$this->clasificacion_cheques;*/
				}
			} else {
				/*//DEBE ESCOGER
				$clasificacion_chequesLocal=$this->clasificacion_cheques;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($clasificacion_chequesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($clasificacion_chequesLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Clasificacion Cheques';
			
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
			$fileName='clasificacion_cheque';
			
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
			
			$title='Reporte de  Clasificacion Cheques';
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
			
			$title='Reporte de  Clasificacion Cheques';
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
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Clasificacion Cheques';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=clasificacion_cheque_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->clasificacion_chequesAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->clasificacion_chequesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->clasificacion_chequesAuxiliar)<=0) {
					$this->clasificacion_chequesAuxiliar=$this->clasificacion_cheques;
				}
			} else {
				$this->clasificacion_chequesAuxiliar=$this->clasificacion_cheques;
			}
		/*} else {
			$this->clasificacion_chequesAuxiliar=$this->clasificacion_chequesReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->clasificacion_chequesAuxiliar as $clasificacion_cheque) {
				$row=array();
				
				$row=clasificacion_cheque_util::getDataReportRow($tipo,$clasificacion_cheque,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			clasificacion_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$clasificacion_chequesResp=array();
			$classes=array();
			
			
			
			
			$clasificacion_chequesResp=$this->clasificacion_chequeLogic->getclasificacion_cheques();
			
			$this->clasificacion_chequeLogic->setIsConDeep(true);
			
			$this->clasificacion_chequeLogic->setclasificacion_cheques($this->clasificacion_chequesAuxiliar);
			
			$this->clasificacion_chequeLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->clasificacion_chequesAuxiliar=$this->clasificacion_chequeLogic->getclasificacion_cheques();
			
			//RESPALDO
			$this->clasificacion_chequeLogic->setclasificacion_cheques($clasificacion_chequesResp);
			
			$this->clasificacion_chequeLogic->setIsConDeep(false);
			*/
			
			$this->clasificacion_chequesAuxiliar=$this->cargarRelaciones($this->clasificacion_chequesAuxiliar);
			
			$i=0;
			
			foreach ($this->clasificacion_chequesAuxiliar as $clasificacion_cheque) {
				$row=array();
				
				if($i!=0) {
					$row=clasificacion_cheque_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=clasificacion_cheque_util::getDataReportRow($tipo,$clasificacion_cheque,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
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
		$this->clasificacion_chequesAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->clasificacion_chequesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->clasificacion_chequesAuxiliar)<=0) {
					$this->clasificacion_chequesAuxiliar=$this->clasificacion_cheques;
				}
			} else {
				$this->clasificacion_chequesAuxiliar=$this->clasificacion_cheques;
			}
		/*} else {
			$this->clasificacion_chequesAuxiliar=$this->clasificacion_chequesReporte;	
		}*/
		
		foreach ($this->clasificacion_chequesAuxiliar as $clasificacion_cheque) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(clasificacion_cheque_util::getclasificacion_chequeDescripcion($clasificacion_cheque),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Cuenta Cliente Detalle',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Cliente Detalle',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($clasificacion_cheque->getid_cuenta_corriente_detalleDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Categoria Cheque',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Categoria Cheque',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($clasificacion_cheque->getid_categoria_chequeDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($clasificacion_cheque->getmonto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface clasificacion_cheque_base_controlI {			
		
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
		public function getIndiceActual(clasificacion_cheque $clasificacion_cheque,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(clasificacion_cheque $clasificacion_cheque,array $clasificacion_cheques);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : clasificacion_cheque_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $clasificacion_cheques,clasificacion_cheque $clasificacion_cheque);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(clasificacion_cheque_param_return $clasificacion_chequeReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(clasificacion_cheque_session $clasificacion_cheque_session);		
		public function actualizarInvitadoSessionDivStyleVariables(clasificacion_cheque_session $clasificacion_cheque_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(clasificacion_cheque $clasificacion_chequeOrigen,clasificacion_cheque $clasificacion_cheque,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(clasificacion_cheque_control $clasificacion_cheque_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $clasificacion_cheques=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(clasificacion_cheque_session $clasificacion_cheque_session);		
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
		public function getHtmlTablaDatosResumen(array $clasificacion_cheques=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $clasificacion_cheques=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(clasificacion_cheque $clasificacion_cheque=null) : string;
		
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
