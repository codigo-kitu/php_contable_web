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

namespace com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\business\entity\giro_negocio_proveedor;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/giro_negocio_proveedor/util/giro_negocio_proveedor_carga.php');
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\util\giro_negocio_proveedor_carga;

use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\util\giro_negocio_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\util\giro_negocio_proveedor_param_return;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\business\logic\giro_negocio_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\presentation\session\giro_negocio_proveedor_session;


//FK


//REL


use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;


/*CARGA ARCHIVOS FRAMEWORK*/
giro_negocio_proveedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
giro_negocio_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
giro_negocio_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
giro_negocio_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*giro_negocio_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class giro_negocio_proveedor_base_control extends giro_negocio_proveedor_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->giro_negocio_proveedorClase==null) {		
				$this->giro_negocio_proveedorClase=new giro_negocio_proveedor();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				/*FK_DEFAULT-FIN*/
				
				
				$this->giro_negocio_proveedorClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->giro_negocio_proveedorClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->giro_negocio_proveedorClase->setnombre($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre'));
				
				$this->giro_negocio_proveedorClase->setpredeterminado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'predeterminado')));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->giro_negocio_proveedorModel->set($this->giro_negocio_proveedorClase);
				
				/*$this->giro_negocio_proveedorModel->set($this->migrarModelgiro_negocio_proveedor($this->giro_negocio_proveedorClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->setId($this->giro_negocio_proveedorClase->getId());	
			$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->setVersionRow($this->giro_negocio_proveedorClase->getVersionRow());	
			$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->setVersionRow($this->giro_negocio_proveedorClase->getVersionRow());	
			$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->setnombre($this->giro_negocio_proveedorClase->getnombre());	
			$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->setpredeterminado($this->giro_negocio_proveedorClase->getpredeterminado());	
		} else {
			$this->giro_negocio_proveedorClase->setId($this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->getId());	
			$this->giro_negocio_proveedorClase->setVersionRow($this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->getVersionRow());	
			$this->giro_negocio_proveedorClase->setVersionRow($this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->getVersionRow());	
			$this->giro_negocio_proveedorClase->setnombre($this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->getnombre());	
			$this->giro_negocio_proveedorClase->setpredeterminado($this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->getpredeterminado());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->giro_negocio_proveedorModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='nombre') {$this->strMensajenombre=$strMensajeCampo;}
		if($strNombreCampo=='predeterminado') {$this->strMensajepredeterminado=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajenombre='';
		$this->strMensajepredeterminado='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->commitNewConnexionToDeep();
				$this->giro_negocio_proveedorLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->rollbackNewConnexionToDeep();
				$this->giro_negocio_proveedorLogic->closeNewConnexionToDeep();
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
				$this->giro_negocio_proveedorLogic->getNewConnexionToDeep();
			}

			$giro_negocio_proveedor_session=unserialize($this->Session->read(giro_negocio_proveedor_util::$STR_SESSION_NAME));
						
			if($giro_negocio_proveedor_session==null) {
				$giro_negocio_proveedor_session=new giro_negocio_proveedor_session();
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
						$this->giro_negocio_proveedorLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->giro_negocio_proveedorActual =$this->giro_negocio_proveedorClase;
			
			/*$this->giro_negocio_proveedorActual =$this->migrarModelgiro_negocio_proveedor($this->giro_negocio_proveedorClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->commitNewConnexionToDeep();
				$this->giro_negocio_proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedors(),$this->giro_negocio_proveedorActual);
			
			$this->actualizarControllerConReturnGeneral($this->giro_negocio_proveedorReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->rollbackNewConnexionToDeep();
				$this->giro_negocio_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->getNewConnexionToDeep();
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
				$this->giro_negocio_proveedorLogic->commitNewConnexionToDeep();
				$this->giro_negocio_proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->rollbackNewConnexionToDeep();
				$this->giro_negocio_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$giro_negocio_proveedorsLocal=$this->getListaActual();
		
		$iIndice=giro_negocio_proveedor_util::getIndiceNuevo($giro_negocio_proveedorsLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(giro_negocio_proveedor $giro_negocio_proveedor,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$giro_negocio_proveedorsLocal=$this->getListaActual();
		
		$iIndice=giro_negocio_proveedor_util::getIndiceActual($giro_negocio_proveedorsLocal,$giro_negocio_proveedor,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevogiro_negocio_proveedor')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->giro_negocio_proveedorActual =$this->giro_negocio_proveedorClase;
			
			/*$this->giro_negocio_proveedorActual =$this->migrarModelgiro_negocio_proveedor($this->giro_negocio_proveedorClase);*/
			
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
			
			$this->giro_negocio_proveedorLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
			
			$this->giro_negocio_proveedorLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->giro_negocio_proveedorLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->giro_negocio_proveedorLogic->setgiro_negocio_proveedor(new giro_negocio_proveedor());
				
				$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->setIsNew(true);
				$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->setIsChanged(true);
				$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->giro_negocio_proveedorModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->giro_negocio_proveedorLogic->giro_negocio_proveedors[]=$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->giro_negocio_proveedorLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							giro_negocio_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$proveedors=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'Lista'));
							$proveedorsEliminados=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$proveedors=array_merge($proveedors,$proveedorsEliminados);
							
							$this->giro_negocio_proveedorLogic->saveRelaciones($this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor(),$proveedors);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->setIsChanged(true);
				$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->setIsNew(false);
				$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->giro_negocio_proveedorModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor(),$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedors());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->giro_negocio_proveedorLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							giro_negocio_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$proveedors=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'Lista'));
							$proveedorsEliminados=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$proveedors=array_merge($proveedors,$proveedorsEliminados);
							
							$this->giro_negocio_proveedorLogic->saveRelaciones($this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor(),$proveedors);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->setIsDeleted(true);
				$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->setIsNew(false);
				$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->setIsChanged(false);				
				
				$this->actualizarLista($this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor(),$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedors());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->giro_negocio_proveedorLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							giro_negocio_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$proveedors=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'Lista'));
							$proveedorsEliminados=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$proveedors=array_merge($proveedors,$proveedorsEliminados);

							foreach($proveedors as $proveedor1) {
								$proveedor1->setIsDeleted(true);
							}
							
						$this->giro_negocio_proveedorLogic->saveRelaciones($this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor(),$proveedors);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->giro_negocio_proveedorsEliminados[]=$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->giro_negocio_proveedorLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							giro_negocio_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$proveedors=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'Lista'));
							$proveedorsEliminados=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$proveedors=array_merge($proveedors,$proveedorsEliminados);
							
						$this->giro_negocio_proveedorLogic->saveRelaciones($this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor(),$proveedors);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->giro_negocio_proveedorsEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->giro_negocio_proveedorLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->giro_negocio_proveedorLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->giro_negocio_proveedorsEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->giro_negocio_proveedorLogic->setIsConDeepLoad(false);
			
			$this->giro_negocio_proveedors=$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedors();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(giro_negocio_proveedor_util::$STR_SESSION_NAME.'Lista',serialize($this->giro_negocio_proveedors));
				$this->Session->write(giro_negocio_proveedor_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->giro_negocio_proveedorsEliminados));
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
				$this->giro_negocio_proveedorLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->commitNewConnexionToDeep();
				$this->giro_negocio_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->rollbackNewConnexionToDeep();
				$this->giro_negocio_proveedorLogic->closeNewConnexionToDeep();
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
				$this->giro_negocio_proveedorLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalgiro_negocio_proveedor;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->giro_negocio_proveedorLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->giro_negocio_proveedors as $giro_negocio_proveedorLocal) {
				if($this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->getId()==$giro_negocio_proveedorLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->setIsDeleted(true);
			$this->giro_negocio_proveedorsEliminados[]=$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->giro_negocio_proveedors[$indice]);
				
				$this->giro_negocio_proveedors = array_values($this->giro_negocio_proveedors);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelgiro_negocio_proveedor($this->giro_negocio_proveedorClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->commitNewConnexionToDeep();
				$this->giro_negocio_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->rollbackNewConnexionToDeep();
				$this->giro_negocio_proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(giro_negocio_proveedor $giro_negocio_proveedor,array $giro_negocio_proveedors) {
		try {
			foreach($giro_negocio_proveedors as $giro_negocio_proveedorLocal){ 
				if($giro_negocio_proveedorLocal->getId()==$giro_negocio_proveedor->getId()) {
					$giro_negocio_proveedorLocal->setIsChanged($giro_negocio_proveedor->getIsChanged());
					$giro_negocio_proveedorLocal->setIsNew($giro_negocio_proveedor->getIsNew());
					$giro_negocio_proveedorLocal->setIsDeleted($giro_negocio_proveedor->getIsDeleted());
					//$giro_negocio_proveedorLocal->setbitExpired($giro_negocio_proveedor->getbitExpired());
					
					$giro_negocio_proveedorLocal->setId($giro_negocio_proveedor->getId());	
					$giro_negocio_proveedorLocal->setVersionRow($giro_negocio_proveedor->getVersionRow());	
					$giro_negocio_proveedorLocal->setVersionRow($giro_negocio_proveedor->getVersionRow());	
					$giro_negocio_proveedorLocal->setnombre($giro_negocio_proveedor->getnombre());	
					$giro_negocio_proveedorLocal->setpredeterminado($giro_negocio_proveedor->getpredeterminado());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$giro_negocio_proveedorsLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$giro_negocio_proveedorsLocal=$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedors();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$giro_negocio_proveedorsLocal=$this->giro_negocio_proveedors;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $giro_negocio_proveedorsLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->giro_negocio_proveedorLogic->getgiro_negocio_proveedors() as $giro_negocio_proveedor) {
				if($giro_negocio_proveedor->getId()==$id) {
					$this->giro_negocio_proveedorLogic->setgiro_negocio_proveedor($giro_negocio_proveedor);
					
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
		/*$giro_negocio_proveedorsSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->giro_negocio_proveedors as $giro_negocio_proveedor) {
			$giro_negocio_proveedor->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->giro_negocio_proveedors[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : giro_negocio_proveedor_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$giro_negocio_proveedor_session=unserialize($this->Session->read(giro_negocio_proveedor_util::$STR_SESSION_NAME));
						
		if($giro_negocio_proveedor_session==null) {
			$giro_negocio_proveedor_session=new giro_negocio_proveedor_session();
		}
		
		
		$this->giro_negocio_proveedorReturnGeneral=new giro_negocio_proveedor_param_return();
		$this->giro_negocio_proveedorParameterGeneral=new giro_negocio_proveedor_param_return();
			
		$this->giro_negocio_proveedorParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualgiro_negocio_proveedor(this.giro_negocio_proveedor,true);
			this.setVariablesFormularioToObjetoActualForeignKeysgiro_negocio_proveedor(this.giro_negocio_proveedor);*/
			
			if($giro_negocio_proveedor_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualgiro_negocio_proveedor(this.giro_negocio_proveedor,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->giro_negocio_proveedorActual=$this->giro_negocio_proveedorClase;
				
				$this->setCopiarVariablesObjetos($this->giro_negocio_proveedorActual,$this->giro_negocio_proveedor,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->giro_negocio_proveedorReturnGeneral=$this->giro_negocio_proveedorLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedors(),$this->giro_negocio_proveedor,$this->giro_negocio_proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($giro_negocio_proveedor_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeangiro_negocio_proveedor($classes,$this->giro_negocio_proveedorReturnGeneral,$this->giro_negocio_proveedorBean,false);*/
				}
					
				if($this->giro_negocio_proveedorReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->giro_negocio_proveedorReturnGeneral->getgiro_negocio_proveedor(),$this->giro_negocio_proveedorActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeygiro_negocio_proveedor($this->giro_negocio_proveedorReturnGeneral->getgiro_negocio_proveedor());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariogiro_negocio_proveedor($this->giro_negocio_proveedorReturnGeneral->getgiro_negocio_proveedor());*/
				}
					
				if($this->giro_negocio_proveedorReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->giro_negocio_proveedorReturnGeneral->getgiro_negocio_proveedor(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->giro_negocio_proveedor,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(giro_negocio_proveedorJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualgiro_negocio_proveedor(this.giro_negocio_proveedor,true);
				this.setVariablesFormularioToObjetoActualForeignKeysgiro_negocio_proveedor(this.giro_negocio_proveedor);				
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
				
				if($this->giro_negocio_proveedorAnterior!=null) {
					$this->giro_negocio_proveedor=$this->giro_negocio_proveedorAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->giro_negocio_proveedorReturnGeneral=$this->giro_negocio_proveedorLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedors(),$this->giro_negocio_proveedor,$this->giro_negocio_proveedorParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->giro_negocio_proveedorReturnGeneral->getgiro_negocio_proveedor(),$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedors());
			*/
		}
		
		return $this->giro_negocio_proveedorReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->getNewConnexionToDeep();
			}

			$this->giro_negocio_proveedorReturnGeneral=new giro_negocio_proveedor_param_return();			
			$this->giro_negocio_proveedorParameterGeneral=new giro_negocio_proveedor_param_return();
			
			$this->giro_negocio_proveedorParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->giro_negocio_proveedorReturnGeneral=$this->giro_negocio_proveedorLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->giro_negocio_proveedors,$this->giro_negocio_proveedorParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->giro_negocio_proveedorReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->giro_negocio_proveedorReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->commitNewConnexionToDeep();
				$this->giro_negocio_proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->giro_negocio_proveedorReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->rollbackNewConnexionToDeep();
				$this->giro_negocio_proveedorLogic->closeNewConnexionToDeep();
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
		
		$this->giro_negocio_proveedorReturnGeneral=new giro_negocio_proveedor_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_giro_negocio_proveedor') {
		    $sDominio='giro_negocio_proveedor';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->giro_negocio_proveedorReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->giro_negocio_proveedorReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='giro_negocio_proveedor';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='giro_negocio_proveedor';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='giro_negocio_proveedor';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->giro_negocio_proveedorReturnGeneral=new giro_negocio_proveedor_param_return();
		$this->giro_negocio_proveedorParameterGeneral=new giro_negocio_proveedor_param_return();
			
		$this->giro_negocio_proveedorParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->giro_negocio_proveedorReturnGeneral=$this->giro_negocio_proveedorLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedors(),$this->giro_negocio_proveedor,$this->giro_negocio_proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->giro_negocio_proveedorReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->giro_negocio_proveedorReturnGeneral->getgiro_negocio_proveedor(),$classes);*/
		}									
	
		if($this->giro_negocio_proveedorReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->giro_negocio_proveedorReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->giro_negocio_proveedorReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $giro_negocio_proveedors,giro_negocio_proveedor $giro_negocio_proveedor) {
		
		$giro_negocio_proveedor_session=unserialize($this->Session->read(giro_negocio_proveedor_util::$STR_SESSION_NAME));
						
		if($giro_negocio_proveedor_session==null) {
			$giro_negocio_proveedor_session=new giro_negocio_proveedor_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(giro_negocio_proveedor_util::$CLASSNAME);
			}	
			*/
			
			$this->giro_negocio_proveedorReturnGeneral=new giro_negocio_proveedor_param_return();
			$this->giro_negocio_proveedorParameterGeneral=new giro_negocio_proveedor_param_return();
			
			$this->giro_negocio_proveedorParameterGeneral->setdata($this->data);
		
		
			
		if($giro_negocio_proveedor_session->conGuardarRelaciones) {
			$classes=giro_negocio_proveedor_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->giro_negocio_proveedorActual,$this->giro_negocio_proveedor,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->giro_negocio_proveedorReturnGeneral=$this->giro_negocio_proveedorLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedors(),$this->giro_negocio_proveedorActual,$this->giro_negocio_proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->giro_negocio_proveedorReturnGeneral=$this->giro_negocio_proveedorLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$giro_negocio_proveedors,$giro_negocio_proveedor,$this->giro_negocio_proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelgiro_negocio_proveedor($this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor());*/
			
			$this->giro_negocio_proveedor=$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedor();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->giro_negocio_proveedor);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->commitNewConnexionToDeep();
				$this->giro_negocio_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->rollbackNewConnexionToDeep();
				$this->giro_negocio_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$giro_negocio_proveedorActual=new giro_negocio_proveedor();
			
			if($this->giro_negocio_proveedorClase==null) {		
				$this->giro_negocio_proveedorClase=new giro_negocio_proveedor();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$giro_negocio_proveedorActual=$this->giro_negocio_proveedors[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $giro_negocio_proveedorActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $giro_negocio_proveedorActual->setpredeterminado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_4')));  } else { $giro_negocio_proveedorActual->setpredeterminado(false); }

				$this->giro_negocio_proveedorClase=$giro_negocio_proveedorActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->giro_negocio_proveedorModel->set($this->giro_negocio_proveedorClase);
				
				/*$this->giro_negocio_proveedorModel->set($this->migrarModelgiro_negocio_proveedor($this->giro_negocio_proveedorClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->giro_negocio_proveedors=$this->migrarModelgiro_negocio_proveedor($this->giro_negocio_proveedorLogic->getgiro_negocio_proveedors());							
		$this->giro_negocio_proveedors=$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedors();*/
		
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
			$this->Session->write(giro_negocio_proveedor_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$giro_negocio_proveedor_control_session=unserialize($this->Session->read(giro_negocio_proveedor_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($giro_negocio_proveedor_control_session==null) {
				$giro_negocio_proveedor_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($giro_negocio_proveedor_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(giro_negocio_proveedor_util::$STR_SESSION_NAME,$this);*/
		} else {
			$giro_negocio_proveedor_session=unserialize($this->Session->read(giro_negocio_proveedor_util::$STR_SESSION_NAME));
			
			if($giro_negocio_proveedor_session==null) {
				$giro_negocio_proveedor_session=new giro_negocio_proveedor_session();
			}
			
			$this->set(giro_negocio_proveedor_util::$STR_SESSION_NAME, $giro_negocio_proveedor_session);
		}
	}
	
	public function setCopiarVariablesObjetos(giro_negocio_proveedor $giro_negocio_proveedorOrigen,giro_negocio_proveedor $giro_negocio_proveedor,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($giro_negocio_proveedor==null) {
				$giro_negocio_proveedor=new giro_negocio_proveedor();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $giro_negocio_proveedorOrigen->getId()!=null && $giro_negocio_proveedorOrigen->getId()!=0)) {$giro_negocio_proveedor->setId($giro_negocio_proveedorOrigen->getId());}}
			if($conDefault || ($conDefault==false && $giro_negocio_proveedorOrigen->getnombre()!=null && $giro_negocio_proveedorOrigen->getnombre()!='')) {$giro_negocio_proveedor->setnombre($giro_negocio_proveedorOrigen->getnombre());}
			if($conDefault || ($conDefault==false && $giro_negocio_proveedorOrigen->getpredeterminado()!=null && $giro_negocio_proveedorOrigen->getpredeterminado()!=false)) {$giro_negocio_proveedor->setpredeterminado($giro_negocio_proveedorOrigen->getpredeterminado());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$giro_negocio_proveedorsSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$giro_negocio_proveedorsSeleccionados[]=$this->giro_negocio_proveedors[$indice];
			}
		}
		
		return $giro_negocio_proveedorsSeleccionados;
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
		$giro_negocio_proveedor= new giro_negocio_proveedor();
		
		foreach($this->giro_negocio_proveedorLogic->getgiro_negocio_proveedors() as $giro_negocio_proveedor) {
			
		$giro_negocio_proveedor->proveedors=array();
		}		
		
		if($giro_negocio_proveedor!=null);
	}
	
	public function cargarRelaciones(array $giro_negocio_proveedors=array()) : array {	
		
		$giro_negocio_proveedorsRespaldo = array();
		$giro_negocio_proveedorsLocal = array();
		
		giro_negocio_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$giro_negocio_proveedorsResp=array();
		$classes=array();
			
		
				$class=new Classe('proveedor'); 	$classes[]=$class;
			
			
		$giro_negocio_proveedorsRespaldo=$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedors();
			
		$this->giro_negocio_proveedorLogic->setIsConDeep(true);
		
		$this->giro_negocio_proveedorLogic->setgiro_negocio_proveedors($giro_negocio_proveedors);
			
		$this->giro_negocio_proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$giro_negocio_proveedorsLocal=$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedors();
			
		/*RESPALDO*/
		$this->giro_negocio_proveedorLogic->setgiro_negocio_proveedors($giro_negocio_proveedorsRespaldo);
			
		$this->giro_negocio_proveedorLogic->setIsConDeep(false);
		
		if($giro_negocio_proveedorsResp!=null);
		
		return $giro_negocio_proveedorsLocal;
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
				$this->giro_negocio_proveedorLogic->rollbackNewConnexionToDeep();
				$this->giro_negocio_proveedorLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(giro_negocio_proveedor_session $giro_negocio_proveedor_session) {
		$giro_negocio_proveedor_session->strTypeOnLoad=$this->strTypeOnLoadgiro_negocio_proveedor;
		$giro_negocio_proveedor_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliargiro_negocio_proveedor;
		$giro_negocio_proveedor_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliargiro_negocio_proveedor;
		$giro_negocio_proveedor_session->bitEsPopup=$this->bitEsPopup;
		$giro_negocio_proveedor_session->bitEsBusqueda=$this->bitEsBusqueda;
		$giro_negocio_proveedor_session->strFuncionJs=$this->strFuncionJs;
		/*$giro_negocio_proveedor_session->strSufijo=$this->strSufijo;*/
		$giro_negocio_proveedor_session->bitEsRelaciones=$this->bitEsRelaciones;
		$giro_negocio_proveedor_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, giro_negocio_proveedor_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisosproveedor='none';
			$this->strTienePermisosproveedor=((Funciones::existeCadenaArray(proveedor_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosproveedor='table-cell';
		} else {
			

			$this->strTienePermisosproveedor='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosproveedor=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, proveedor_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosproveedor='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$giro_negocio_proveedorViewAdditional=new giro_negocio_proveedorView_add();
		$giro_negocio_proveedorViewAdditional->giro_negocio_proveedors=$this->giro_negocio_proveedors;
		$giro_negocio_proveedorViewAdditional->Session=$this->Session;
		
		return $giro_negocio_proveedorViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$giro_negocio_proveedorsLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$giro_negocio_proveedorsLocal=$this->giro_negocio_proveedors;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$giro_negocio_proveedorsLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($giro_negocio_proveedorsLocal)<=0) {
					$giro_negocio_proveedorsLocal=$this->giro_negocio_proveedors;
				}
			} else {
				$giro_negocio_proveedorsLocal=$this->giro_negocio_proveedors;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliargiro_negocio_proveedorsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliargiro_negocio_proveedorsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$giro_negocio_proveedorLogic=new giro_negocio_proveedor_logic();
		$giro_negocio_proveedorLogic->setgiro_negocio_proveedors($this->giro_negocio_proveedors);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		} 
			
		
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$giro_negocio_proveedorLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->giro_negocio_proveedors=$giro_negocio_proveedorLogic->getgiro_negocio_proveedors();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->giro_negocio_proveedorsLocal=$this->giro_negocio_proveedors;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=giro_negocio_proveedor_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=giro_negocio_proveedor_util::$STR_TABLE_NAME;		
			
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
			
			$giro_negocio_proveedors = $this->giro_negocio_proveedors;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = giro_negocio_proveedor_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = giro_negocio_proveedor_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/cuentaspagar/presentation/templating/giro_negocio_proveedor_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->giro_negocio_proveedors=$giro_negocio_proveedors;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->giro_negocio_proveedorsLocal=$giro_negocio_proveedorsLocal;
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
		
		$giro_negocio_proveedorsLocal=array();
		
		$giro_negocio_proveedorsLocal=$this->giro_negocio_proveedors;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliargiro_negocio_proveedorsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliargiro_negocio_proveedorsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$giro_negocio_proveedorLogic=new giro_negocio_proveedor_logic();
		$giro_negocio_proveedorLogic->setgiro_negocio_proveedors($this->giro_negocio_proveedors);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		} 
			
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$giro_negocio_proveedorLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->giro_negocio_proveedors=$giro_negocio_proveedorLogic->getgiro_negocio_proveedors();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$giro_negocio_proveedors = $this->giro_negocio_proveedors;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = giro_negocio_proveedor_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = giro_negocio_proveedor_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/cuentaspagar/presentation/templating/giro_negocio_proveedor_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->giro_negocio_proveedors=$giro_negocio_proveedors;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->giro_negocio_proveedorsLocal=$giro_negocio_proveedorsLocal;
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
	
	public function getHtmlTablaDatosResumen(array $giro_negocio_proveedors=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->giro_negocio_proveedorsReporte = $giro_negocio_proveedors;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliargiro_negocio_proveedorsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliargiro_negocio_proveedorsAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $giro_negocio_proveedors=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->giro_negocio_proveedorsReporte = $giro_negocio_proveedors;		
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
		
		
		$this->giro_negocio_proveedorsReporte=$this->cargarRelaciones($giro_negocio_proveedors);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliargiro_negocio_proveedorsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliargiro_negocio_proveedorsAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(giro_negocio_proveedor $giro_negocio_proveedor=null) : string {	
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
			
			
			$giro_negocio_proveedorsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$giro_negocio_proveedorsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($giro_negocio_proveedorsLocal)<=0) {
					/*//DEBE ESCOGER
					$giro_negocio_proveedorsLocal=$this->giro_negocio_proveedors;*/
				}
			} else {
				/*//DEBE ESCOGER
				$giro_negocio_proveedorsLocal=$this->giro_negocio_proveedors;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($giro_negocio_proveedorsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($giro_negocio_proveedorsLocal,true);
			
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
				$this->giro_negocio_proveedorLogic->getNewConnexionToDeep();
			}
					
			$giro_negocio_proveedorsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$giro_negocio_proveedorsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($giro_negocio_proveedorsLocal)<=0) {
					/*//DEBE ESCOGER
					$giro_negocio_proveedorsLocal=$this->giro_negocio_proveedors;*/
				}
			} else {
				/*//DEBE ESCOGER
				$giro_negocio_proveedorsLocal=$this->giro_negocio_proveedors;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($giro_negocio_proveedorsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($giro_negocio_proveedorsLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->commitNewConnexionToDeep();
				$this->giro_negocio_proveedorLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->rollbackNewConnexionToDeep();
				$this->giro_negocio_proveedorLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Giro Negocios Proveedores';
			
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
			$fileName='giro_negocio_proveedor';
			
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
			
			$title='Reporte de  Giro Negocios Proveedores';
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
			
			$title='Reporte de  Giro Negocios Proveedores';
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
				$this->giro_negocio_proveedorLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Giro Negocios Proveedores';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->commitNewConnexionToDeep();
				$this->giro_negocio_proveedorLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->giro_negocio_proveedorLogic->rollbackNewConnexionToDeep();
				$this->giro_negocio_proveedorLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=giro_negocio_proveedor_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->giro_negocio_proveedorsAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->giro_negocio_proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->giro_negocio_proveedorsAuxiliar)<=0) {
					$this->giro_negocio_proveedorsAuxiliar=$this->giro_negocio_proveedors;
				}
			} else {
				$this->giro_negocio_proveedorsAuxiliar=$this->giro_negocio_proveedors;
			}
		/*} else {
			$this->giro_negocio_proveedorsAuxiliar=$this->giro_negocio_proveedorsReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->giro_negocio_proveedorsAuxiliar as $giro_negocio_proveedor) {
				$row=array();
				
				$row=giro_negocio_proveedor_util::getDataReportRow($tipo,$giro_negocio_proveedor,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			giro_negocio_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$giro_negocio_proveedorsResp=array();
			$classes=array();
			
			
				$class=new Classe('proveedor'); 	$classes[]=$class;
			
			
			$giro_negocio_proveedorsResp=$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedors();
			
			$this->giro_negocio_proveedorLogic->setIsConDeep(true);
			
			$this->giro_negocio_proveedorLogic->setgiro_negocio_proveedors($this->giro_negocio_proveedorsAuxiliar);
			
			$this->giro_negocio_proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->giro_negocio_proveedorsAuxiliar=$this->giro_negocio_proveedorLogic->getgiro_negocio_proveedors();
			
			//RESPALDO
			$this->giro_negocio_proveedorLogic->setgiro_negocio_proveedors($giro_negocio_proveedorsResp);
			
			$this->giro_negocio_proveedorLogic->setIsConDeep(false);
			*/
			
			$this->giro_negocio_proveedorsAuxiliar=$this->cargarRelaciones($this->giro_negocio_proveedorsAuxiliar);
			
			$i=0;
			
			foreach ($this->giro_negocio_proveedorsAuxiliar as $giro_negocio_proveedor) {
				$row=array();
				
				if($i!=0) {
					$row=giro_negocio_proveedor_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=giro_negocio_proveedor_util::getDataReportRow($tipo,$giro_negocio_proveedor,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//proveedor
				if(Funciones::existeCadenaArrayOrderBy(proveedor_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($giro_negocio_proveedor->getproveedors())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(proveedor_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=proveedor_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($giro_negocio_proveedor->getproveedors() as $proveedor) {
						$row=proveedor_util::getDataReportRow('RELACIONADO',$proveedor,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->giro_negocio_proveedorsAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->giro_negocio_proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->giro_negocio_proveedorsAuxiliar)<=0) {
					$this->giro_negocio_proveedorsAuxiliar=$this->giro_negocio_proveedors;
				}
			} else {
				$this->giro_negocio_proveedorsAuxiliar=$this->giro_negocio_proveedors;
			}
		/*} else {
			$this->giro_negocio_proveedorsAuxiliar=$this->giro_negocio_proveedorsReporte;	
		}*/
		
		foreach ($this->giro_negocio_proveedorsAuxiliar as $giro_negocio_proveedor) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(giro_negocio_proveedor_util::getgiro_negocio_proveedorDescripcion($giro_negocio_proveedor),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Nombre',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($giro_negocio_proveedor->getnombre(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Predeterminado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Predeterminado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($giro_negocio_proveedor->getpredeterminado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface giro_negocio_proveedor_base_controlI {			
		
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
		public function getIndiceActual(giro_negocio_proveedor $giro_negocio_proveedor,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(giro_negocio_proveedor $giro_negocio_proveedor,array $giro_negocio_proveedors);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : giro_negocio_proveedor_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $giro_negocio_proveedors,giro_negocio_proveedor $giro_negocio_proveedor);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(giro_negocio_proveedor_param_return $giro_negocio_proveedorReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(giro_negocio_proveedor_session $giro_negocio_proveedor_session);		
		public function actualizarInvitadoSessionDivStyleVariables(giro_negocio_proveedor_session $giro_negocio_proveedor_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(giro_negocio_proveedor $giro_negocio_proveedorOrigen,giro_negocio_proveedor $giro_negocio_proveedor,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(giro_negocio_proveedor_control $giro_negocio_proveedor_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $giro_negocio_proveedors=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(giro_negocio_proveedor_session $giro_negocio_proveedor_session);		
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
		public function getHtmlTablaDatosResumen(array $giro_negocio_proveedors=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $giro_negocio_proveedors=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(giro_negocio_proveedor $giro_negocio_proveedor=null) : string;
		
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
