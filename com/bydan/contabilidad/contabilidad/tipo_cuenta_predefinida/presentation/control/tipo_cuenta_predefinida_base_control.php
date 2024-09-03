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

namespace com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\presentation\control;

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

use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\entity\tipo_cuenta_predefinida;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/tipo_cuenta_predefinida/util/tipo_cuenta_predefinida_carga.php');
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util\tipo_cuenta_predefinida_carga;

use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util\tipo_cuenta_predefinida_util;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util\tipo_cuenta_predefinida_param_return;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\logic\tipo_cuenta_predefinida_logic;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\presentation\session\tipo_cuenta_predefinida_session;


//FK


//REL


use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_carga;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_util;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\presentation\session\cuenta_predefinida_session;


/*CARGA ARCHIVOS FRAMEWORK*/
tipo_cuenta_predefinida_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
tipo_cuenta_predefinida_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
tipo_cuenta_predefinida_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
tipo_cuenta_predefinida_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*tipo_cuenta_predefinida_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class tipo_cuenta_predefinida_base_control extends tipo_cuenta_predefinida_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->tipo_cuenta_predefinidaClase==null) {		
				$this->tipo_cuenta_predefinidaClase=new tipo_cuenta_predefinida();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				/*FK_DEFAULT-FIN*/
				
				
				$this->tipo_cuenta_predefinidaClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->tipo_cuenta_predefinidaClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->tipo_cuenta_predefinidaClase->setcodigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo'));
				
				$this->tipo_cuenta_predefinidaClase->setnombre($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre'));
				
				$this->tipo_cuenta_predefinidaClase->setdescripcion($this->getDataCampoFormTabla('form'.$this->strSufijo,'descripcion'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->tipo_cuenta_predefinidaModel->set($this->tipo_cuenta_predefinidaClase);
				
				/*$this->tipo_cuenta_predefinidaModel->set($this->migrarModeltipo_cuenta_predefinida($this->tipo_cuenta_predefinidaClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->setId($this->tipo_cuenta_predefinidaClase->getId());	
			$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->setVersionRow($this->tipo_cuenta_predefinidaClase->getVersionRow());	
			$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->setVersionRow($this->tipo_cuenta_predefinidaClase->getVersionRow());	
			$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->setcodigo($this->tipo_cuenta_predefinidaClase->getcodigo());	
			$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->setnombre($this->tipo_cuenta_predefinidaClase->getnombre());	
			$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->setdescripcion($this->tipo_cuenta_predefinidaClase->getdescripcion());	
		} else {
			$this->tipo_cuenta_predefinidaClase->setId($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->getId());	
			$this->tipo_cuenta_predefinidaClase->setVersionRow($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->getVersionRow());	
			$this->tipo_cuenta_predefinidaClase->setVersionRow($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->getVersionRow());	
			$this->tipo_cuenta_predefinidaClase->setcodigo($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->getcodigo());	
			$this->tipo_cuenta_predefinidaClase->setnombre($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->getnombre());	
			$this->tipo_cuenta_predefinidaClase->setdescripcion($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->getdescripcion());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->tipo_cuenta_predefinidaModel->invalidFieldsMe();
		
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
		if($strNombreCampo=='descripcion') {$this->strMensajedescripcion=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajecodigo='';
		$this->strMensajenombre='';
		$this->strMensajedescripcion='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
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
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}

			$tipo_cuenta_predefinida_session=unserialize($this->Session->read(tipo_cuenta_predefinida_util::$STR_SESSION_NAME));
						
			if($tipo_cuenta_predefinida_session==null) {
				$tipo_cuenta_predefinida_session=new tipo_cuenta_predefinida_session();
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
						$this->tipo_cuenta_predefinidaLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->tipo_cuenta_predefinidaActual =$this->tipo_cuenta_predefinidaClase;
			
			/*$this->tipo_cuenta_predefinidaActual =$this->migrarModeltipo_cuenta_predefinida($this->tipo_cuenta_predefinidaClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas(),$this->tipo_cuenta_predefinidaActual);
			
			$this->actualizarControllerConReturnGeneral($this->tipo_cuenta_predefinidaReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
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
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$tipo_cuenta_predefinidasLocal=$this->getListaActual();
		
		$iIndice=tipo_cuenta_predefinida_util::getIndiceNuevo($tipo_cuenta_predefinidasLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(tipo_cuenta_predefinida $tipo_cuenta_predefinida,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$tipo_cuenta_predefinidasLocal=$this->getListaActual();
		
		$iIndice=tipo_cuenta_predefinida_util::getIndiceActual($tipo_cuenta_predefinidasLocal,$tipo_cuenta_predefinida,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevotipo_cuenta_predefinida')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->tipo_cuenta_predefinidaActual =$this->tipo_cuenta_predefinidaClase;
			
			/*$this->tipo_cuenta_predefinidaActual =$this->migrarModeltipo_cuenta_predefinida($this->tipo_cuenta_predefinidaClase);*/
			
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
			
			$this->tipo_cuenta_predefinidaLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
			
			$this->tipo_cuenta_predefinidaLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->tipo_cuenta_predefinidaLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->tipo_cuenta_predefinidaLogic->settipo_cuenta_predefinida(new tipo_cuenta_predefinida());
				
				$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->setIsNew(true);
				$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->setIsChanged(true);
				$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->tipo_cuenta_predefinidaModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->tipo_cuenta_predefinidaLogic->tipo_cuenta_predefinidas[]=$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->tipo_cuenta_predefinidaLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							tipo_cuenta_predefinida_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_predefinida_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentapredefinidas=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME.'Lista'));
							$cuentapredefinidasEliminados=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentapredefinidas=array_merge($cuentapredefinidas,$cuentapredefinidasEliminados);
							
							$this->tipo_cuenta_predefinidaLogic->saveRelaciones($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida(),$cuentapredefinidas);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->setIsChanged(true);
				$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->setIsNew(false);
				$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->tipo_cuenta_predefinidaModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida(),$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->tipo_cuenta_predefinidaLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							tipo_cuenta_predefinida_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_predefinida_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentapredefinidas=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME.'Lista'));
							$cuentapredefinidasEliminados=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentapredefinidas=array_merge($cuentapredefinidas,$cuentapredefinidasEliminados);
							
							$this->tipo_cuenta_predefinidaLogic->saveRelaciones($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida(),$cuentapredefinidas);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->setIsDeleted(true);
				$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->setIsNew(false);
				$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->setIsChanged(false);				
				
				$this->actualizarLista($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida(),$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->tipo_cuenta_predefinidaLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							tipo_cuenta_predefinida_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_predefinida_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentapredefinidas=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME.'Lista'));
							$cuentapredefinidasEliminados=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentapredefinidas=array_merge($cuentapredefinidas,$cuentapredefinidasEliminados);

							foreach($cuentapredefinidas as $cuentapredefinida1) {
								$cuentapredefinida1->setIsDeleted(true);
							}
							
						$this->tipo_cuenta_predefinidaLogic->saveRelaciones($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida(),$cuentapredefinidas);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->tipo_cuenta_predefinidasEliminados[]=$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->tipo_cuenta_predefinidaLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							tipo_cuenta_predefinida_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_predefinida_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentapredefinidas=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME.'Lista'));
							$cuentapredefinidasEliminados=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentapredefinidas=array_merge($cuentapredefinidas,$cuentapredefinidasEliminados);
							
						$this->tipo_cuenta_predefinidaLogic->saveRelaciones($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida(),$cuentapredefinidas);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->tipo_cuenta_predefinidasEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->tipo_cuenta_predefinidaLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->tipo_cuenta_predefinidaLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->tipo_cuenta_predefinidasEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->tipo_cuenta_predefinidaLogic->setIsConDeepLoad(false);
			
			$this->tipo_cuenta_predefinidas=$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(tipo_cuenta_predefinida_util::$STR_SESSION_NAME.'Lista',serialize($this->tipo_cuenta_predefinidas));
				$this->Session->write(tipo_cuenta_predefinida_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->tipo_cuenta_predefinidasEliminados));
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
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
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
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginaltipo_cuenta_predefinida;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->tipo_cuenta_predefinidaLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->tipo_cuenta_predefinidas as $tipo_cuenta_predefinidaLocal) {
				if($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->getId()==$tipo_cuenta_predefinidaLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()->setIsDeleted(true);
			$this->tipo_cuenta_predefinidasEliminados[]=$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->tipo_cuenta_predefinidas[$indice]);
				
				$this->tipo_cuenta_predefinidas = array_values($this->tipo_cuenta_predefinidas);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModeltipo_cuenta_predefinida($this->tipo_cuenta_predefinidaClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(tipo_cuenta_predefinida $tipo_cuenta_predefinida,array $tipo_cuenta_predefinidas) {
		try {
			foreach($tipo_cuenta_predefinidas as $tipo_cuenta_predefinidaLocal){ 
				if($tipo_cuenta_predefinidaLocal->getId()==$tipo_cuenta_predefinida->getId()) {
					$tipo_cuenta_predefinidaLocal->setIsChanged($tipo_cuenta_predefinida->getIsChanged());
					$tipo_cuenta_predefinidaLocal->setIsNew($tipo_cuenta_predefinida->getIsNew());
					$tipo_cuenta_predefinidaLocal->setIsDeleted($tipo_cuenta_predefinida->getIsDeleted());
					//$tipo_cuenta_predefinidaLocal->setbitExpired($tipo_cuenta_predefinida->getbitExpired());
					
					$tipo_cuenta_predefinidaLocal->setId($tipo_cuenta_predefinida->getId());	
					$tipo_cuenta_predefinidaLocal->setVersionRow($tipo_cuenta_predefinida->getVersionRow());	
					$tipo_cuenta_predefinidaLocal->setVersionRow($tipo_cuenta_predefinida->getVersionRow());	
					$tipo_cuenta_predefinidaLocal->setcodigo($tipo_cuenta_predefinida->getcodigo());	
					$tipo_cuenta_predefinidaLocal->setnombre($tipo_cuenta_predefinida->getnombre());	
					$tipo_cuenta_predefinidaLocal->setdescripcion($tipo_cuenta_predefinida->getdescripcion());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$tipo_cuenta_predefinidasLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$tipo_cuenta_predefinidasLocal=$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$tipo_cuenta_predefinidasLocal=$this->tipo_cuenta_predefinidas;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $tipo_cuenta_predefinidasLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas() as $tipo_cuenta_predefinida) {
				if($tipo_cuenta_predefinida->getId()==$id) {
					$this->tipo_cuenta_predefinidaLogic->settipo_cuenta_predefinida($tipo_cuenta_predefinida);
					
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
		/*$tipo_cuenta_predefinidasSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->tipo_cuenta_predefinidas as $tipo_cuenta_predefinida) {
			$tipo_cuenta_predefinida->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->tipo_cuenta_predefinidas[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : tipo_cuenta_predefinida_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$tipo_cuenta_predefinida_session=unserialize($this->Session->read(tipo_cuenta_predefinida_util::$STR_SESSION_NAME));
						
		if($tipo_cuenta_predefinida_session==null) {
			$tipo_cuenta_predefinida_session=new tipo_cuenta_predefinida_session();
		}
		
		
		$this->tipo_cuenta_predefinidaReturnGeneral=new tipo_cuenta_predefinida_param_return();
		$this->tipo_cuenta_predefinidaParameterGeneral=new tipo_cuenta_predefinida_param_return();
			
		$this->tipo_cuenta_predefinidaParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualtipo_cuenta_predefinida(this.tipo_cuenta_predefinida,true);
			this.setVariablesFormularioToObjetoActualForeignKeystipo_cuenta_predefinida(this.tipo_cuenta_predefinida);*/
			
			if($tipo_cuenta_predefinida_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualtipo_cuenta_predefinida(this.tipo_cuenta_predefinida,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->tipo_cuenta_predefinidaActual=$this->tipo_cuenta_predefinidaClase;
				
				$this->setCopiarVariablesObjetos($this->tipo_cuenta_predefinidaActual,$this->tipo_cuenta_predefinida,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->tipo_cuenta_predefinidaReturnGeneral=$this->tipo_cuenta_predefinidaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas(),$this->tipo_cuenta_predefinida,$this->tipo_cuenta_predefinidaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($tipo_cuenta_predefinida_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeantipo_cuenta_predefinida($classes,$this->tipo_cuenta_predefinidaReturnGeneral,$this->tipo_cuenta_predefinidaBean,false);*/
				}
					
				if($this->tipo_cuenta_predefinidaReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->tipo_cuenta_predefinidaReturnGeneral->gettipo_cuenta_predefinida(),$this->tipo_cuenta_predefinidaActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeytipo_cuenta_predefinida($this->tipo_cuenta_predefinidaReturnGeneral->gettipo_cuenta_predefinida());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariotipo_cuenta_predefinida($this->tipo_cuenta_predefinidaReturnGeneral->gettipo_cuenta_predefinida());*/
				}
					
				if($this->tipo_cuenta_predefinidaReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->tipo_cuenta_predefinidaReturnGeneral->gettipo_cuenta_predefinida(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->tipo_cuenta_predefinida,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(tipo_cuenta_predefinidaJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualtipo_cuenta_predefinida(this.tipo_cuenta_predefinida,true);
				this.setVariablesFormularioToObjetoActualForeignKeystipo_cuenta_predefinida(this.tipo_cuenta_predefinida);				
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
				
				if($this->tipo_cuenta_predefinidaAnterior!=null) {
					$this->tipo_cuenta_predefinida=$this->tipo_cuenta_predefinidaAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->tipo_cuenta_predefinidaReturnGeneral=$this->tipo_cuenta_predefinidaLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas(),$this->tipo_cuenta_predefinida,$this->tipo_cuenta_predefinidaParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->tipo_cuenta_predefinidaReturnGeneral->gettipo_cuenta_predefinida(),$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas());
			*/
		}
		
		return $this->tipo_cuenta_predefinidaReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}

			$this->tipo_cuenta_predefinidaReturnGeneral=new tipo_cuenta_predefinida_param_return();			
			$this->tipo_cuenta_predefinidaParameterGeneral=new tipo_cuenta_predefinida_param_return();
			
			$this->tipo_cuenta_predefinidaParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->tipo_cuenta_predefinidaReturnGeneral=$this->tipo_cuenta_predefinidaLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->tipo_cuenta_predefinidas,$this->tipo_cuenta_predefinidaParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->tipo_cuenta_predefinidaReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->tipo_cuenta_predefinidaReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->tipo_cuenta_predefinidaReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
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
		
		$this->tipo_cuenta_predefinidaReturnGeneral=new tipo_cuenta_predefinida_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_tipo_cuenta_predefinida') {
		    $sDominio='tipo_cuenta_predefinida';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->tipo_cuenta_predefinidaReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->tipo_cuenta_predefinidaReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='tipo_cuenta_predefinida';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='tipo_cuenta_predefinida';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='tipo_cuenta_predefinida';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->tipo_cuenta_predefinidaReturnGeneral=new tipo_cuenta_predefinida_param_return();
		$this->tipo_cuenta_predefinidaParameterGeneral=new tipo_cuenta_predefinida_param_return();
			
		$this->tipo_cuenta_predefinidaParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->tipo_cuenta_predefinidaReturnGeneral=$this->tipo_cuenta_predefinidaLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas(),$this->tipo_cuenta_predefinida,$this->tipo_cuenta_predefinidaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->tipo_cuenta_predefinidaReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->tipo_cuenta_predefinidaReturnGeneral->gettipo_cuenta_predefinida(),$classes);*/
		}									
	
		if($this->tipo_cuenta_predefinidaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->tipo_cuenta_predefinidaReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->tipo_cuenta_predefinidaReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $tipo_cuenta_predefinidas,tipo_cuenta_predefinida $tipo_cuenta_predefinida) {
		
		$tipo_cuenta_predefinida_session=unserialize($this->Session->read(tipo_cuenta_predefinida_util::$STR_SESSION_NAME));
						
		if($tipo_cuenta_predefinida_session==null) {
			$tipo_cuenta_predefinida_session=new tipo_cuenta_predefinida_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(tipo_cuenta_predefinida_util::$CLASSNAME);
			}	
			*/
			
			$this->tipo_cuenta_predefinidaReturnGeneral=new tipo_cuenta_predefinida_param_return();
			$this->tipo_cuenta_predefinidaParameterGeneral=new tipo_cuenta_predefinida_param_return();
			
			$this->tipo_cuenta_predefinidaParameterGeneral->setdata($this->data);
		
		
			
		if($tipo_cuenta_predefinida_session->conGuardarRelaciones) {
			$classes=tipo_cuenta_predefinida_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->tipo_cuenta_predefinidaActual,$this->tipo_cuenta_predefinida,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->tipo_cuenta_predefinidaReturnGeneral=$this->tipo_cuenta_predefinidaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas(),$this->tipo_cuenta_predefinidaActual,$this->tipo_cuenta_predefinidaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->tipo_cuenta_predefinidaReturnGeneral=$this->tipo_cuenta_predefinidaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$tipo_cuenta_predefinidas,$tipo_cuenta_predefinida,$this->tipo_cuenta_predefinidaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModeltipo_cuenta_predefinida($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida());*/
			
			$this->tipo_cuenta_predefinida=$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->tipo_cuenta_predefinida);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$tipo_cuenta_predefinidaActual=new tipo_cuenta_predefinida();
			
			if($this->tipo_cuenta_predefinidaClase==null) {		
				$this->tipo_cuenta_predefinidaClase=new tipo_cuenta_predefinida();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$tipo_cuenta_predefinidaActual=$this->tipo_cuenta_predefinidas[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $tipo_cuenta_predefinidaActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $tipo_cuenta_predefinidaActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $tipo_cuenta_predefinidaActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }

				$this->tipo_cuenta_predefinidaClase=$tipo_cuenta_predefinidaActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->tipo_cuenta_predefinidaModel->set($this->tipo_cuenta_predefinidaClase);
				
				/*$this->tipo_cuenta_predefinidaModel->set($this->migrarModeltipo_cuenta_predefinida($this->tipo_cuenta_predefinidaClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->tipo_cuenta_predefinidas=$this->migrarModeltipo_cuenta_predefinida($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas());							
		$this->tipo_cuenta_predefinidas=$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas();*/
		
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
			$this->Session->write(tipo_cuenta_predefinida_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$tipo_cuenta_predefinida_control_session=unserialize($this->Session->read(tipo_cuenta_predefinida_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($tipo_cuenta_predefinida_control_session==null) {
				$tipo_cuenta_predefinida_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($tipo_cuenta_predefinida_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(tipo_cuenta_predefinida_util::$STR_SESSION_NAME,$this);*/
		} else {
			$tipo_cuenta_predefinida_session=unserialize($this->Session->read(tipo_cuenta_predefinida_util::$STR_SESSION_NAME));
			
			if($tipo_cuenta_predefinida_session==null) {
				$tipo_cuenta_predefinida_session=new tipo_cuenta_predefinida_session();
			}
			
			$this->set(tipo_cuenta_predefinida_util::$STR_SESSION_NAME, $tipo_cuenta_predefinida_session);
		}
	}
	
	public function setCopiarVariablesObjetos(tipo_cuenta_predefinida $tipo_cuenta_predefinidaOrigen,tipo_cuenta_predefinida $tipo_cuenta_predefinida,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($tipo_cuenta_predefinida==null) {
				$tipo_cuenta_predefinida=new tipo_cuenta_predefinida();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $tipo_cuenta_predefinidaOrigen->getId()!=null && $tipo_cuenta_predefinidaOrigen->getId()!=0)) {$tipo_cuenta_predefinida->setId($tipo_cuenta_predefinidaOrigen->getId());}}
			if($conDefault || ($conDefault==false && $tipo_cuenta_predefinidaOrigen->getcodigo()!=null && $tipo_cuenta_predefinidaOrigen->getcodigo()!='')) {$tipo_cuenta_predefinida->setcodigo($tipo_cuenta_predefinidaOrigen->getcodigo());}
			if($conDefault || ($conDefault==false && $tipo_cuenta_predefinidaOrigen->getnombre()!=null && $tipo_cuenta_predefinidaOrigen->getnombre()!='')) {$tipo_cuenta_predefinida->setnombre($tipo_cuenta_predefinidaOrigen->getnombre());}
			if($conDefault || ($conDefault==false && $tipo_cuenta_predefinidaOrigen->getdescripcion()!=null && $tipo_cuenta_predefinidaOrigen->getdescripcion()!='')) {$tipo_cuenta_predefinida->setdescripcion($tipo_cuenta_predefinidaOrigen->getdescripcion());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$tipo_cuenta_predefinidasSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$tipo_cuenta_predefinidasSeleccionados[]=$this->tipo_cuenta_predefinidas[$indice];
			}
		}
		
		return $tipo_cuenta_predefinidasSeleccionados;
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
		$tipo_cuenta_predefinida= new tipo_cuenta_predefinida();
		
		foreach($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas() as $tipo_cuenta_predefinida) {
			
		$tipo_cuenta_predefinida->cuentapredefinidas=array();
		}		
		
		if($tipo_cuenta_predefinida!=null);
	}
	
	public function cargarRelaciones(array $tipo_cuenta_predefinidas=array()) : array {	
		
		$tipo_cuenta_predefinidasRespaldo = array();
		$tipo_cuenta_predefinidasLocal = array();
		
		tipo_cuenta_predefinida_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			cuenta_predefinida_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$tipo_cuenta_predefinidasResp=array();
		$classes=array();
			
		
				$class=new Classe('cuenta_predefinida'); 	$classes[]=$class;
			
			
		$tipo_cuenta_predefinidasRespaldo=$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas();
			
		$this->tipo_cuenta_predefinidaLogic->setIsConDeep(true);
		
		$this->tipo_cuenta_predefinidaLogic->settipo_cuenta_predefinidas($tipo_cuenta_predefinidas);
			
		$this->tipo_cuenta_predefinidaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$tipo_cuenta_predefinidasLocal=$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas();
			
		/*RESPALDO*/
		$this->tipo_cuenta_predefinidaLogic->settipo_cuenta_predefinidas($tipo_cuenta_predefinidasRespaldo);
			
		$this->tipo_cuenta_predefinidaLogic->setIsConDeep(false);
		
		if($tipo_cuenta_predefinidasResp!=null);
		
		return $tipo_cuenta_predefinidasLocal;
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
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(tipo_cuenta_predefinida_session $tipo_cuenta_predefinida_session) {
		$tipo_cuenta_predefinida_session->strTypeOnLoad=$this->strTypeOnLoadtipo_cuenta_predefinida;
		$tipo_cuenta_predefinida_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliartipo_cuenta_predefinida;
		$tipo_cuenta_predefinida_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliartipo_cuenta_predefinida;
		$tipo_cuenta_predefinida_session->bitEsPopup=$this->bitEsPopup;
		$tipo_cuenta_predefinida_session->bitEsBusqueda=$this->bitEsBusqueda;
		$tipo_cuenta_predefinida_session->strFuncionJs=$this->strFuncionJs;
		/*$tipo_cuenta_predefinida_session->strSufijo=$this->strSufijo;*/
		$tipo_cuenta_predefinida_session->bitEsRelaciones=$this->bitEsRelaciones;
		$tipo_cuenta_predefinida_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, tipo_cuenta_predefinida_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisoscuenta_predefinida='none';
			$this->strTienePermisoscuenta_predefinida=((Funciones::existeCadenaArray(cuenta_predefinida_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoscuenta_predefinida='table-cell';
		} else {
			

			$this->strTienePermisoscuenta_predefinida='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoscuenta_predefinida=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_predefinida_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoscuenta_predefinida='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$tipo_cuenta_predefinidaViewAdditional=new tipo_cuenta_predefinidaView_add();
		$tipo_cuenta_predefinidaViewAdditional->tipo_cuenta_predefinidas=$this->tipo_cuenta_predefinidas;
		$tipo_cuenta_predefinidaViewAdditional->Session=$this->Session;
		
		return $tipo_cuenta_predefinidaViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$tipo_cuenta_predefinidasLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$tipo_cuenta_predefinidasLocal=$this->tipo_cuenta_predefinidas;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$tipo_cuenta_predefinidasLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($tipo_cuenta_predefinidasLocal)<=0) {
					$tipo_cuenta_predefinidasLocal=$this->tipo_cuenta_predefinidas;
				}
			} else {
				$tipo_cuenta_predefinidasLocal=$this->tipo_cuenta_predefinidas;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliartipo_cuenta_predefinidasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliartipo_cuenta_predefinidasAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$tipo_cuenta_predefinidaLogic=new tipo_cuenta_predefinida_logic();
		$tipo_cuenta_predefinidaLogic->settipo_cuenta_predefinidas($this->tipo_cuenta_predefinidas);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$cuenta_predefinida_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME));

		if($cuenta_predefinida_session==null) {
			$cuenta_predefinida_session=new cuenta_predefinida_session();
		} 
			
		
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$tipo_cuenta_predefinidaLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->tipo_cuenta_predefinidas=$tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->tipo_cuenta_predefinidasLocal=$this->tipo_cuenta_predefinidas;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=tipo_cuenta_predefinida_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=tipo_cuenta_predefinida_util::$STR_TABLE_NAME;		
			
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
			
			$tipo_cuenta_predefinidas = $this->tipo_cuenta_predefinidas;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = tipo_cuenta_predefinida_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = tipo_cuenta_predefinida_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/contabilidad/presentation/templating/tipo_cuenta_predefinida_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->tipo_cuenta_predefinidas=$tipo_cuenta_predefinidas;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->tipo_cuenta_predefinidasLocal=$tipo_cuenta_predefinidasLocal;
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
		
		$tipo_cuenta_predefinidasLocal=array();
		
		$tipo_cuenta_predefinidasLocal=$this->tipo_cuenta_predefinidas;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliartipo_cuenta_predefinidasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliartipo_cuenta_predefinidasAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$tipo_cuenta_predefinidaLogic=new tipo_cuenta_predefinida_logic();
		$tipo_cuenta_predefinidaLogic->settipo_cuenta_predefinidas($this->tipo_cuenta_predefinidas);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$cuenta_predefinida_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME));

		if($cuenta_predefinida_session==null) {
			$cuenta_predefinida_session=new cuenta_predefinida_session();
		} 
			
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$tipo_cuenta_predefinidaLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->tipo_cuenta_predefinidas=$tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$tipo_cuenta_predefinidas = $this->tipo_cuenta_predefinidas;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = tipo_cuenta_predefinida_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = tipo_cuenta_predefinida_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/contabilidad/presentation/templating/tipo_cuenta_predefinida_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->tipo_cuenta_predefinidas=$tipo_cuenta_predefinidas;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->tipo_cuenta_predefinidasLocal=$tipo_cuenta_predefinidasLocal;
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
	
	public function getHtmlTablaDatosResumen(array $tipo_cuenta_predefinidas=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->tipo_cuenta_predefinidasReporte = $tipo_cuenta_predefinidas;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliartipo_cuenta_predefinidasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliartipo_cuenta_predefinidasAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $tipo_cuenta_predefinidas=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->tipo_cuenta_predefinidasReporte = $tipo_cuenta_predefinidas;		
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
		
		
		$this->tipo_cuenta_predefinidasReporte=$this->cargarRelaciones($tipo_cuenta_predefinidas);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliartipo_cuenta_predefinidasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliartipo_cuenta_predefinidasAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(tipo_cuenta_predefinida $tipo_cuenta_predefinida=null) : string {	
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
			
			
			$tipo_cuenta_predefinidasLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$tipo_cuenta_predefinidasLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($tipo_cuenta_predefinidasLocal)<=0) {
					/*//DEBE ESCOGER
					$tipo_cuenta_predefinidasLocal=$this->tipo_cuenta_predefinidas;*/
				}
			} else {
				/*//DEBE ESCOGER
				$tipo_cuenta_predefinidasLocal=$this->tipo_cuenta_predefinidas;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($tipo_cuenta_predefinidasLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($tipo_cuenta_predefinidasLocal,true);
			
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
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}
					
			$tipo_cuenta_predefinidasLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$tipo_cuenta_predefinidasLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($tipo_cuenta_predefinidasLocal)<=0) {
					/*//DEBE ESCOGER
					$tipo_cuenta_predefinidasLocal=$this->tipo_cuenta_predefinidas;*/
				}
			} else {
				/*//DEBE ESCOGER
				$tipo_cuenta_predefinidasLocal=$this->tipo_cuenta_predefinidas;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($tipo_cuenta_predefinidasLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($tipo_cuenta_predefinidasLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Tipo Cuentas';
			
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
			$fileName='tipo_cuenta_predefinida';
			
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
			
			$title='Reporte de  Tipo Cuentas';
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
			
			$title='Reporte de  Tipo Cuentas';
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
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Tipo Cuentas';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=tipo_cuenta_predefinida_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->tipo_cuenta_predefinidasAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->tipo_cuenta_predefinidasAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->tipo_cuenta_predefinidasAuxiliar)<=0) {
					$this->tipo_cuenta_predefinidasAuxiliar=$this->tipo_cuenta_predefinidas;
				}
			} else {
				$this->tipo_cuenta_predefinidasAuxiliar=$this->tipo_cuenta_predefinidas;
			}
		/*} else {
			$this->tipo_cuenta_predefinidasAuxiliar=$this->tipo_cuenta_predefinidasReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->tipo_cuenta_predefinidasAuxiliar as $tipo_cuenta_predefinida) {
				$row=array();
				
				$row=tipo_cuenta_predefinida_util::getDataReportRow($tipo,$tipo_cuenta_predefinida,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			tipo_cuenta_predefinida_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			cuenta_predefinida_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$tipo_cuenta_predefinidasResp=array();
			$classes=array();
			
			
				$class=new Classe('cuenta_predefinida'); 	$classes[]=$class;
			
			
			$tipo_cuenta_predefinidasResp=$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas();
			
			$this->tipo_cuenta_predefinidaLogic->setIsConDeep(true);
			
			$this->tipo_cuenta_predefinidaLogic->settipo_cuenta_predefinidas($this->tipo_cuenta_predefinidasAuxiliar);
			
			$this->tipo_cuenta_predefinidaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->tipo_cuenta_predefinidasAuxiliar=$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas();
			
			//RESPALDO
			$this->tipo_cuenta_predefinidaLogic->settipo_cuenta_predefinidas($tipo_cuenta_predefinidasResp);
			
			$this->tipo_cuenta_predefinidaLogic->setIsConDeep(false);
			*/
			
			$this->tipo_cuenta_predefinidasAuxiliar=$this->cargarRelaciones($this->tipo_cuenta_predefinidasAuxiliar);
			
			$i=0;
			
			foreach ($this->tipo_cuenta_predefinidasAuxiliar as $tipo_cuenta_predefinida) {
				$row=array();
				
				if($i!=0) {
					$row=tipo_cuenta_predefinida_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=tipo_cuenta_predefinida_util::getDataReportRow($tipo,$tipo_cuenta_predefinida,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//cuenta_predefinida
				if(Funciones::existeCadenaArrayOrderBy(cuenta_predefinida_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($tipo_cuenta_predefinida->getcuenta_predefinidas())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cuenta_predefinida_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=cuenta_predefinida_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($tipo_cuenta_predefinida->getcuenta_predefinidas() as $cuenta_predefinida) {
						$row=cuenta_predefinida_util::getDataReportRow('RELACIONADO',$cuenta_predefinida,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->tipo_cuenta_predefinidasAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->tipo_cuenta_predefinidasAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->tipo_cuenta_predefinidasAuxiliar)<=0) {
					$this->tipo_cuenta_predefinidasAuxiliar=$this->tipo_cuenta_predefinidas;
				}
			} else {
				$this->tipo_cuenta_predefinidasAuxiliar=$this->tipo_cuenta_predefinidas;
			}
		/*} else {
			$this->tipo_cuenta_predefinidasAuxiliar=$this->tipo_cuenta_predefinidasReporte;	
		}*/
		
		foreach ($this->tipo_cuenta_predefinidasAuxiliar as $tipo_cuenta_predefinida) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(tipo_cuenta_predefinida_util::gettipo_cuenta_predefinidaDescripcion($tipo_cuenta_predefinida),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Codigo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($tipo_cuenta_predefinida->getcodigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($tipo_cuenta_predefinida->getnombre(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descripcion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($tipo_cuenta_predefinida->getdescripcion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface tipo_cuenta_predefinida_base_controlI {			
		
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
		public function getIndiceActual(tipo_cuenta_predefinida $tipo_cuenta_predefinida,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(tipo_cuenta_predefinida $tipo_cuenta_predefinida,array $tipo_cuenta_predefinidas);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : tipo_cuenta_predefinida_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $tipo_cuenta_predefinidas,tipo_cuenta_predefinida $tipo_cuenta_predefinida);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(tipo_cuenta_predefinida_param_return $tipo_cuenta_predefinidaReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(tipo_cuenta_predefinida_session $tipo_cuenta_predefinida_session);		
		public function actualizarInvitadoSessionDivStyleVariables(tipo_cuenta_predefinida_session $tipo_cuenta_predefinida_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(tipo_cuenta_predefinida $tipo_cuenta_predefinidaOrigen,tipo_cuenta_predefinida $tipo_cuenta_predefinida,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(tipo_cuenta_predefinida_control $tipo_cuenta_predefinida_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $tipo_cuenta_predefinidas=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(tipo_cuenta_predefinida_session $tipo_cuenta_predefinida_session);		
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
		public function getHtmlTablaDatosResumen(array $tipo_cuenta_predefinidas=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $tipo_cuenta_predefinidas=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(tipo_cuenta_predefinida $tipo_cuenta_predefinida=null) : string;
		
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
