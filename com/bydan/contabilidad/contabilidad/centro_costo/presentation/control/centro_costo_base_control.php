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

namespace com\bydan\contabilidad\contabilidad\centro_costo\presentation\control;

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

use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/centro_costo/util/centro_costo_carga.php');
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_carga;

use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_util;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_param_return;
use com\bydan\contabilidad\contabilidad\centro_costo\business\logic\centro_costo_logic;
use com\bydan\contabilidad\contabilidad\centro_costo\presentation\session\centro_costo_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\presentation\session\asiento_predefinido_session;

use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;
use com\bydan\contabilidad\contabilidad\asiento\presentation\session\asiento_session;

use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_util;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\presentation\session\asiento_automatico_detalle_session;

use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_util;
use com\bydan\contabilidad\contabilidad\asiento_automatico\presentation\session\asiento_automatico_session;


/*CARGA ARCHIVOS FRAMEWORK*/
centro_costo_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
centro_costo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
centro_costo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class centro_costo_base_control extends centro_costo_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->centro_costoClase==null) {		
				$this->centro_costoClase=new centro_costo();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->centro_costoClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->centro_costoClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->centro_costoClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->centro_costoClase->setcodigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo'));
				
				$this->centro_costoClase->setnombre($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->centro_costoModel->set($this->centro_costoClase);
				
				/*$this->centro_costoModel->set($this->migrarModelcentro_costo($this->centro_costoClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->centro_costoLogic->getcentro_costo()->setId($this->centro_costoClase->getId());	
			$this->centro_costoLogic->getcentro_costo()->setVersionRow($this->centro_costoClase->getVersionRow());	
			$this->centro_costoLogic->getcentro_costo()->setVersionRow($this->centro_costoClase->getVersionRow());	
			$this->centro_costoLogic->getcentro_costo()->setid_empresa($this->centro_costoClase->getid_empresa());	
			$this->centro_costoLogic->getcentro_costo()->setcodigo($this->centro_costoClase->getcodigo());	
			$this->centro_costoLogic->getcentro_costo()->setnombre($this->centro_costoClase->getnombre());	
		} else {
			$this->centro_costoClase->setId($this->centro_costoLogic->getcentro_costo()->getId());	
			$this->centro_costoClase->setVersionRow($this->centro_costoLogic->getcentro_costo()->getVersionRow());	
			$this->centro_costoClase->setVersionRow($this->centro_costoLogic->getcentro_costo()->getVersionRow());	
			$this->centro_costoClase->setid_empresa($this->centro_costoLogic->getcentro_costo()->getid_empresa());	
			$this->centro_costoClase->setcodigo($this->centro_costoLogic->getcentro_costo()->getcodigo());	
			$this->centro_costoClase->setnombre($this->centro_costoLogic->getcentro_costo()->getnombre());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->centro_costoModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='codigo') {$this->strMensajecodigo=$strMensajeCampo;}
		if($strNombreCampo=='nombre') {$this->strMensajenombre=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajecodigo='';
		$this->strMensajenombre='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->commitNewConnexionToDeep();
				$this->centro_costoLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->rollbackNewConnexionToDeep();
				$this->centro_costoLogic->closeNewConnexionToDeep();
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
				$this->centro_costoLogic->getNewConnexionToDeep();
			}

			$centro_costo_session=unserialize($this->Session->read(centro_costo_util::$STR_SESSION_NAME));
						
			if($centro_costo_session==null) {
				$centro_costo_session=new centro_costo_session();
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
						$this->centro_costoLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->centro_costoActual =$this->centro_costoClase;
			
			/*$this->centro_costoActual =$this->migrarModelcentro_costo($this->centro_costoClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->commitNewConnexionToDeep();
				$this->centro_costoLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->centro_costoLogic->getcentro_costos(),$this->centro_costoActual);
			
			$this->actualizarControllerConReturnGeneral($this->centro_costoReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->rollbackNewConnexionToDeep();
				$this->centro_costoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->getNewConnexionToDeep();
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
				$this->centro_costoLogic->commitNewConnexionToDeep();
				$this->centro_costoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->rollbackNewConnexionToDeep();
				$this->centro_costoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$centro_costosLocal=$this->getListaActual();
		
		$iIndice=centro_costo_util::getIndiceNuevo($centro_costosLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(centro_costo $centro_costo,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$centro_costosLocal=$this->getListaActual();
		
		$iIndice=centro_costo_util::getIndiceActual($centro_costosLocal,$centro_costo,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevocentro_costo')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->centro_costoActual =$this->centro_costoClase;
			
			/*$this->centro_costoActual =$this->migrarModelcentro_costo($this->centro_costoClase);*/
			
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
			
			$this->centro_costoLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
			
			$this->centro_costoLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->centro_costoLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->centro_costoLogic->setcentro_costo(new centro_costo());
				
				$this->centro_costoLogic->getcentro_costo()->setIsNew(true);
				$this->centro_costoLogic->getcentro_costo()->setIsChanged(true);
				$this->centro_costoLogic->getcentro_costo()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->centro_costoModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->centro_costoLogic->centro_costos[]=$this->centro_costoLogic->getcentro_costo();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->centro_costoLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_predefinido_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientopredefinidos=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME.'Lista'));
							$asientopredefinidosEliminados=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientopredefinidos=array_merge($asientopredefinidos,$asientopredefinidosEliminados);
							centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientos=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'Lista'));
							$asientosEliminados=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientos=array_merge($asientos,$asientosEliminados);
							centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_automatico_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientoautomaticodetalles=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME.'Lista'));
							$asientoautomaticodetallesEliminados=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientoautomaticodetalles=array_merge($asientoautomaticodetalles,$asientoautomaticodetallesEliminados);
							centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_automatico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientoautomaticos=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME.'Lista'));
							$asientoautomaticosEliminados=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientoautomaticos=array_merge($asientoautomaticos,$asientoautomaticosEliminados);
							
							$this->centro_costoLogic->saveRelaciones($this->centro_costoLogic->getcentro_costo(),$asientopredefinidos,$asientos,$asientoautomaticodetalles,$asientoautomaticos);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->centro_costoLogic->getcentro_costo()->setIsChanged(true);
				$this->centro_costoLogic->getcentro_costo()->setIsNew(false);
				$this->centro_costoLogic->getcentro_costo()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->centro_costoModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->centro_costoLogic->getcentro_costo(),$this->centro_costoLogic->getcentro_costos());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->centro_costoLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_predefinido_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientopredefinidos=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME.'Lista'));
							$asientopredefinidosEliminados=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientopredefinidos=array_merge($asientopredefinidos,$asientopredefinidosEliminados);
							centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientos=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'Lista'));
							$asientosEliminados=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientos=array_merge($asientos,$asientosEliminados);
							centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_automatico_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientoautomaticodetalles=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME.'Lista'));
							$asientoautomaticodetallesEliminados=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientoautomaticodetalles=array_merge($asientoautomaticodetalles,$asientoautomaticodetallesEliminados);
							centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_automatico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientoautomaticos=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME.'Lista'));
							$asientoautomaticosEliminados=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientoautomaticos=array_merge($asientoautomaticos,$asientoautomaticosEliminados);
							
							$this->centro_costoLogic->saveRelaciones($this->centro_costoLogic->getcentro_costo(),$asientopredefinidos,$asientos,$asientoautomaticodetalles,$asientoautomaticos);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->centro_costoLogic->getcentro_costo()->setIsDeleted(true);
				$this->centro_costoLogic->getcentro_costo()->setIsNew(false);
				$this->centro_costoLogic->getcentro_costo()->setIsChanged(false);				
				
				$this->actualizarLista($this->centro_costoLogic->getcentro_costo(),$this->centro_costoLogic->getcentro_costos());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->centro_costoLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_predefinido_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientopredefinidos=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME.'Lista'));
							$asientopredefinidosEliminados=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientopredefinidos=array_merge($asientopredefinidos,$asientopredefinidosEliminados);

							foreach($asientopredefinidos as $asientopredefinido1) {
								$asientopredefinido1->setIsDeleted(true);
							}
							centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientos=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'Lista'));
							$asientosEliminados=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientos=array_merge($asientos,$asientosEliminados);

							foreach($asientos as $asiento1) {
								$asiento1->setIsDeleted(true);
							}
							centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_automatico_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientoautomaticodetalles=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME.'Lista'));
							$asientoautomaticodetallesEliminados=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientoautomaticodetalles=array_merge($asientoautomaticodetalles,$asientoautomaticodetallesEliminados);

							foreach($asientoautomaticodetalles as $asientoautomaticodetalle1) {
								$asientoautomaticodetalle1->setIsDeleted(true);
							}
							centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_automatico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientoautomaticos=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME.'Lista'));
							$asientoautomaticosEliminados=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientoautomaticos=array_merge($asientoautomaticos,$asientoautomaticosEliminados);

							foreach($asientoautomaticos as $asientoautomatico1) {
								$asientoautomatico1->setIsDeleted(true);
							}
							
						$this->centro_costoLogic->saveRelaciones($this->centro_costoLogic->getcentro_costo(),$asientopredefinidos,$asientos,$asientoautomaticodetalles,$asientoautomaticos);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->centro_costosEliminados[]=$this->centro_costoLogic->getcentro_costo();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->centro_costoLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_predefinido_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientopredefinidos=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME.'Lista'));
							$asientopredefinidosEliminados=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientopredefinidos=array_merge($asientopredefinidos,$asientopredefinidosEliminados);
							centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientos=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'Lista'));
							$asientosEliminados=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientos=array_merge($asientos,$asientosEliminados);
							centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_automatico_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientoautomaticodetalles=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME.'Lista'));
							$asientoautomaticodetallesEliminados=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientoautomaticodetalles=array_merge($asientoautomaticodetalles,$asientoautomaticodetallesEliminados);
							centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_automatico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientoautomaticos=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME.'Lista'));
							$asientoautomaticosEliminados=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientoautomaticos=array_merge($asientoautomaticos,$asientoautomaticosEliminados);
							
						$this->centro_costoLogic->saveRelaciones($this->centro_costoLogic->getcentro_costo(),$asientopredefinidos,$asientos,$asientoautomaticodetalles,$asientoautomaticos);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->centro_costosEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->centro_costoLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->centro_costoLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->centro_costosEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->centro_costoLogic->setcentro_costos();*/
					
					$this->centro_costoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->centro_costoLogic->setIsConDeepLoad(false);
			
			$this->centro_costos=$this->centro_costoLogic->getcentro_costos();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(centro_costo_util::$STR_SESSION_NAME.'Lista',serialize($this->centro_costos));
				$this->Session->write(centro_costo_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->centro_costosEliminados));
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
				$this->centro_costoLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->commitNewConnexionToDeep();
				$this->centro_costoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->rollbackNewConnexionToDeep();
				$this->centro_costoLogic->closeNewConnexionToDeep();
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
				$this->centro_costoLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalcentro_costo;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->centro_costoLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->centro_costos as $centro_costoLocal) {
				if($this->centro_costoLogic->getcentro_costo()->getId()==$centro_costoLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->centro_costoLogic->getcentro_costo()->setIsDeleted(true);
			$this->centro_costosEliminados[]=$this->centro_costoLogic->getcentro_costo();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->centro_costos[$indice]);
				
				$this->centro_costos = array_values($this->centro_costos);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelcentro_costo($this->centro_costoClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->commitNewConnexionToDeep();
				$this->centro_costoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->rollbackNewConnexionToDeep();
				$this->centro_costoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(centro_costo $centro_costo,array $centro_costos) {
		try {
			foreach($centro_costos as $centro_costoLocal){ 
				if($centro_costoLocal->getId()==$centro_costo->getId()) {
					$centro_costoLocal->setIsChanged($centro_costo->getIsChanged());
					$centro_costoLocal->setIsNew($centro_costo->getIsNew());
					$centro_costoLocal->setIsDeleted($centro_costo->getIsDeleted());
					//$centro_costoLocal->setbitExpired($centro_costo->getbitExpired());
					
					$centro_costoLocal->setId($centro_costo->getId());	
					$centro_costoLocal->setVersionRow($centro_costo->getVersionRow());	
					$centro_costoLocal->setVersionRow($centro_costo->getVersionRow());	
					$centro_costoLocal->setid_empresa($centro_costo->getid_empresa());	
					$centro_costoLocal->setcodigo($centro_costo->getcodigo());	
					$centro_costoLocal->setnombre($centro_costo->getnombre());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$centro_costosLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$centro_costosLocal=$this->centro_costoLogic->getcentro_costos();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$centro_costosLocal=$this->centro_costos;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $centro_costosLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->centro_costoLogic->getcentro_costos() as $centro_costo) {
				if($centro_costo->getId()==$id) {
					$this->centro_costoLogic->setcentro_costo($centro_costo);
					
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
		/*$centro_costosSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->centro_costos as $centro_costo) {
			$centro_costo->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->centro_costos[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : centro_costo_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$centro_costo_session=unserialize($this->Session->read(centro_costo_util::$STR_SESSION_NAME));
						
		if($centro_costo_session==null) {
			$centro_costo_session=new centro_costo_session();
		}
		
		
		$this->centro_costoReturnGeneral=new centro_costo_param_return();
		$this->centro_costoParameterGeneral=new centro_costo_param_return();
			
		$this->centro_costoParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualcentro_costo(this.centro_costo,true);
			this.setVariablesFormularioToObjetoActualForeignKeyscentro_costo(this.centro_costo);*/
			
			if($centro_costo_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualcentro_costo(this.centro_costo,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->centro_costoActual=$this->centro_costoClase;
				
				$this->setCopiarVariablesObjetos($this->centro_costoActual,$this->centro_costo,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->centro_costoReturnGeneral=$this->centro_costoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->centro_costoLogic->getcentro_costos(),$this->centro_costo,$this->centro_costoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($centro_costo_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeancentro_costo($classes,$this->centro_costoReturnGeneral,$this->centro_costoBean,false);*/
				}
					
				if($this->centro_costoReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->centro_costoReturnGeneral->getcentro_costo(),$this->centro_costoActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeycentro_costo($this->centro_costoReturnGeneral->getcentro_costo());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariocentro_costo($this->centro_costoReturnGeneral->getcentro_costo());*/
				}
					
				if($this->centro_costoReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->centro_costoReturnGeneral->getcentro_costo(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->centro_costo,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(centro_costoJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualcentro_costo(this.centro_costo,true);
				this.setVariablesFormularioToObjetoActualForeignKeyscentro_costo(this.centro_costo);				
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
				
				if($this->centro_costoAnterior!=null) {
					$this->centro_costo=$this->centro_costoAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->centro_costoReturnGeneral=$this->centro_costoLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->centro_costoLogic->getcentro_costos(),$this->centro_costo,$this->centro_costoParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->centro_costoReturnGeneral->getcentro_costo(),$this->centro_costoLogic->getcentro_costos());
			*/
		}
		
		return $this->centro_costoReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->getNewConnexionToDeep();
			}

			$this->centro_costoReturnGeneral=new centro_costo_param_return();			
			$this->centro_costoParameterGeneral=new centro_costo_param_return();
			
			$this->centro_costoParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->centro_costoReturnGeneral=$this->centro_costoLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->centro_costos,$this->centro_costoParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->centro_costoReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->centro_costoReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->commitNewConnexionToDeep();
				$this->centro_costoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->centro_costoReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->rollbackNewConnexionToDeep();
				$this->centro_costoLogic->closeNewConnexionToDeep();
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
		
		$this->centro_costoReturnGeneral=new centro_costo_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_centro_costo') {
		    $sDominio='centro_costo';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->centro_costoReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->centro_costoReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='centro_costo';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='centro_costo';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='centro_costo';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->centro_costoReturnGeneral=new centro_costo_param_return();
		$this->centro_costoParameterGeneral=new centro_costo_param_return();
			
		$this->centro_costoParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->centro_costoReturnGeneral=$this->centro_costoLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->centro_costoLogic->getcentro_costos(),$this->centro_costo,$this->centro_costoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->centro_costoReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->centro_costoReturnGeneral->getcentro_costo(),$classes);*/
		}									
	
		if($this->centro_costoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->centro_costoReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->centro_costoReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $centro_costos,centro_costo $centro_costo) {
		
		$centro_costo_session=unserialize($this->Session->read(centro_costo_util::$STR_SESSION_NAME));
						
		if($centro_costo_session==null) {
			$centro_costo_session=new centro_costo_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(centro_costo_util::$CLASSNAME);
			}	
			*/
			
			$this->centro_costoReturnGeneral=new centro_costo_param_return();
			$this->centro_costoParameterGeneral=new centro_costo_param_return();
			
			$this->centro_costoParameterGeneral->setdata($this->data);
		
		
			
		if($centro_costo_session->conGuardarRelaciones) {
			$classes=centro_costo_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->centro_costoActual,$this->centro_costo,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->centro_costoReturnGeneral=$this->centro_costoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->centro_costoLogic->getcentro_costos(),$this->centro_costoActual,$this->centro_costoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->centro_costoReturnGeneral=$this->centro_costoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$centro_costos,$centro_costo,$this->centro_costoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelcentro_costo($this->centro_costoLogic->getcentro_costo());*/
			
			$this->centro_costo=$this->centro_costoLogic->getcentro_costo();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->centro_costo);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->commitNewConnexionToDeep();
				$this->centro_costoLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->rollbackNewConnexionToDeep();
				$this->centro_costoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$centro_costoActual=new centro_costo();
			
			if($this->centro_costoClase==null) {		
				$this->centro_costoClase=new centro_costo();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$centro_costoActual=$this->centro_costos[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $centro_costoActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $centro_costoActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $centro_costoActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }

				$this->centro_costoClase=$centro_costoActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->centro_costoModel->set($this->centro_costoClase);
				
				/*$this->centro_costoModel->set($this->migrarModelcentro_costo($this->centro_costoClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->centro_costos=$this->migrarModelcentro_costo($this->centro_costoLogic->getcentro_costos());							
		$this->centro_costos=$this->centro_costoLogic->getcentro_costos();*/
		
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
			$this->Session->write(centro_costo_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$centro_costo_control_session=unserialize($this->Session->read(centro_costo_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($centro_costo_control_session==null) {
				$centro_costo_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($centro_costo_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(centro_costo_util::$STR_SESSION_NAME,$this);*/
		} else {
			$centro_costo_session=unserialize($this->Session->read(centro_costo_util::$STR_SESSION_NAME));
			
			if($centro_costo_session==null) {
				$centro_costo_session=new centro_costo_session();
			}
			
			$this->set(centro_costo_util::$STR_SESSION_NAME, $centro_costo_session);
		}
	}
	
	public function setCopiarVariablesObjetos(centro_costo $centro_costoOrigen,centro_costo $centro_costo,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($centro_costo==null) {
				$centro_costo=new centro_costo();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $centro_costoOrigen->getId()!=null && $centro_costoOrigen->getId()!=0)) {$centro_costo->setId($centro_costoOrigen->getId());}}
			if($conDefault || ($conDefault==false && $centro_costoOrigen->getcodigo()!=null && $centro_costoOrigen->getcodigo()!='')) {$centro_costo->setcodigo($centro_costoOrigen->getcodigo());}
			if($conDefault || ($conDefault==false && $centro_costoOrigen->getnombre()!=null && $centro_costoOrigen->getnombre()!='')) {$centro_costo->setnombre($centro_costoOrigen->getnombre());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$centro_costosSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$centro_costosSeleccionados[]=$this->centro_costos[$indice];
			}
		}
		
		return $centro_costosSeleccionados;
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
		$centro_costo= new centro_costo();
		
		foreach($this->centro_costoLogic->getcentro_costos() as $centro_costo) {
			
		$centro_costo->asientopredefinidos=array();
		$centro_costo->asientos=array();
		$centro_costo->asientoautomaticodetalles=array();
		$centro_costo->asientoautomaticos=array();
		}		
		
		if($centro_costo!=null);
	}
	
	public function cargarRelaciones(array $centro_costos=array()) : array {	
		
		$centro_costosRespaldo = array();
		$centro_costosLocal = array();
		
		centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			asiento_predefinido_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			asiento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			asiento_automatico_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			asiento_automatico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$centro_costosResp=array();
		$classes=array();
			
		
				$class=new Classe('asiento_predefinido'); 	$classes[]=$class;
				$class=new Classe('asiento'); 	$classes[]=$class;
				$class=new Classe('asiento_automatico_detalle'); 	$classes[]=$class;
				$class=new Classe('asiento_automatico'); 	$classes[]=$class;
			
			
		$centro_costosRespaldo=$this->centro_costoLogic->getcentro_costos();
			
		$this->centro_costoLogic->setIsConDeep(true);
		
		$this->centro_costoLogic->setcentro_costos($centro_costos);
			
		$this->centro_costoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$centro_costosLocal=$this->centro_costoLogic->getcentro_costos();
			
		/*RESPALDO*/
		$this->centro_costoLogic->setcentro_costos($centro_costosRespaldo);
			
		$this->centro_costoLogic->setIsConDeep(false);
		
		if($centro_costosResp!=null);
		
		return $centro_costosLocal;
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
				$this->centro_costoLogic->rollbackNewConnexionToDeep();
				$this->centro_costoLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(centro_costo_session $centro_costo_session) {
		$centro_costo_session->strTypeOnLoad=$this->strTypeOnLoadcentro_costo;
		$centro_costo_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarcentro_costo;
		$centro_costo_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarcentro_costo;
		$centro_costo_session->bitEsPopup=$this->bitEsPopup;
		$centro_costo_session->bitEsBusqueda=$this->bitEsBusqueda;
		$centro_costo_session->strFuncionJs=$this->strFuncionJs;
		/*$centro_costo_session->strSufijo=$this->strSufijo;*/
		$centro_costo_session->bitEsRelaciones=$this->bitEsRelaciones;
		$centro_costo_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, centro_costo_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisosasiento_predefinido='none';
			$this->strTienePermisosasiento_predefinido=((Funciones::existeCadenaArray(asiento_predefinido_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosasiento_predefinido='table-cell';

			$this->strTienePermisosasiento='none';
			$this->strTienePermisosasiento=((Funciones::existeCadenaArray(asiento_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosasiento='table-cell';

			$this->strTienePermisosasiento_automatico_detalle='none';
			$this->strTienePermisosasiento_automatico_detalle=((Funciones::existeCadenaArray(asiento_automatico_detalle_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosasiento_automatico_detalle='table-cell';

			$this->strTienePermisosasiento_automatico='none';
			$this->strTienePermisosasiento_automatico=((Funciones::existeCadenaArray(asiento_automatico_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosasiento_automatico='table-cell';
		} else {
			

			$this->strTienePermisosasiento_predefinido='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosasiento_predefinido=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, asiento_predefinido_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosasiento_predefinido='table-cell';

			$this->strTienePermisosasiento='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosasiento=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, asiento_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosasiento='table-cell';

			$this->strTienePermisosasiento_automatico_detalle='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosasiento_automatico_detalle=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, asiento_automatico_detalle_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosasiento_automatico_detalle='table-cell';

			$this->strTienePermisosasiento_automatico='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosasiento_automatico=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, asiento_automatico_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosasiento_automatico='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$centro_costoViewAdditional=new centro_costoView_add();
		$centro_costoViewAdditional->centro_costos=$this->centro_costos;
		$centro_costoViewAdditional->Session=$this->Session;
		
		return $centro_costoViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$centro_costosLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$centro_costosLocal=$this->centro_costos;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$centro_costosLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($centro_costosLocal)<=0) {
					$centro_costosLocal=$this->centro_costos;
				}
			} else {
				$centro_costosLocal=$this->centro_costos;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcentro_costosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcentro_costosAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$centro_costoLogic=new centro_costo_logic();
		$centro_costoLogic->setcentro_costos($this->centro_costos);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}

		$asiento_session=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME));

		if($asiento_session==null) {
			$asiento_session=new asiento_session();
		}

		$asiento_automatico_detalle_session=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME));

		if($asiento_automatico_detalle_session==null) {
			$asiento_automatico_detalle_session=new asiento_automatico_detalle_session();
		}

		$asiento_automatico_session=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME));

		if($asiento_automatico_session==null) {
			$asiento_automatico_session=new asiento_automatico_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$centro_costoLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->centro_costos=$centro_costoLogic->getcentro_costos();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->centro_costosLocal=$this->centro_costos;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=centro_costo_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=centro_costo_util::$STR_TABLE_NAME;		
			
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
			
			$centro_costos = $this->centro_costos;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = centro_costo_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = centro_costo_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/contabilidad/presentation/templating/centro_costo_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->centro_costos=$centro_costos;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->centro_costosLocal=$centro_costosLocal;
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
		
		$centro_costosLocal=array();
		
		$centro_costosLocal=$this->centro_costos;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcentro_costosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcentro_costosAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$centro_costoLogic=new centro_costo_logic();
		$centro_costoLogic->setcentro_costos($this->centro_costos);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}

		$asiento_session=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME));

		if($asiento_session==null) {
			$asiento_session=new asiento_session();
		}

		$asiento_automatico_detalle_session=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME));

		if($asiento_automatico_detalle_session==null) {
			$asiento_automatico_detalle_session=new asiento_automatico_detalle_session();
		}

		$asiento_automatico_session=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME));

		if($asiento_automatico_session==null) {
			$asiento_automatico_session=new asiento_automatico_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$centro_costoLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->centro_costos=$centro_costoLogic->getcentro_costos();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$centro_costos = $this->centro_costos;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = centro_costo_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = centro_costo_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/contabilidad/presentation/templating/centro_costo_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->centro_costos=$centro_costos;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->centro_costosLocal=$centro_costosLocal;
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
	
	public function getHtmlTablaDatosResumen(array $centro_costos=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->centro_costosReporte = $centro_costos;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcentro_costosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcentro_costosAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $centro_costos=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->centro_costosReporte = $centro_costos;		
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
		
		
		$this->centro_costosReporte=$this->cargarRelaciones($centro_costos);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcentro_costosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcentro_costosAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(centro_costo $centro_costo=null) : string {	
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
			
			
			$centro_costosLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$centro_costosLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($centro_costosLocal)<=0) {
					/*//DEBE ESCOGER
					$centro_costosLocal=$this->centro_costos;*/
				}
			} else {
				/*//DEBE ESCOGER
				$centro_costosLocal=$this->centro_costos;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($centro_costosLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($centro_costosLocal,true);
			
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
				$this->centro_costoLogic->getNewConnexionToDeep();
			}
					
			$centro_costosLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$centro_costosLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($centro_costosLocal)<=0) {
					/*//DEBE ESCOGER
					$centro_costosLocal=$this->centro_costos;*/
				}
			} else {
				/*//DEBE ESCOGER
				$centro_costosLocal=$this->centro_costos;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($centro_costosLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($centro_costosLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->commitNewConnexionToDeep();
				$this->centro_costoLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->rollbackNewConnexionToDeep();
				$this->centro_costoLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Centro Costos';
			
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
			$fileName='centro_costo';
			
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
			
			$title='Reporte de  Centro Costos';
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
			
			$title='Reporte de  Centro Costos';
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
				$this->centro_costoLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Centro Costos';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->commitNewConnexionToDeep();
				$this->centro_costoLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->centro_costoLogic->rollbackNewConnexionToDeep();
				$this->centro_costoLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=centro_costo_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->centro_costosAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->centro_costosAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->centro_costosAuxiliar)<=0) {
					$this->centro_costosAuxiliar=$this->centro_costos;
				}
			} else {
				$this->centro_costosAuxiliar=$this->centro_costos;
			}
		/*} else {
			$this->centro_costosAuxiliar=$this->centro_costosReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->centro_costosAuxiliar as $centro_costo) {
				$row=array();
				
				$row=centro_costo_util::getDataReportRow($tipo,$centro_costo,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			asiento_predefinido_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			asiento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			asiento_automatico_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			asiento_automatico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$centro_costosResp=array();
			$classes=array();
			
			
				$class=new Classe('asiento_predefinido'); 	$classes[]=$class;
				$class=new Classe('asiento'); 	$classes[]=$class;
				$class=new Classe('asiento_automatico_detalle'); 	$classes[]=$class;
				$class=new Classe('asiento_automatico'); 	$classes[]=$class;
			
			
			$centro_costosResp=$this->centro_costoLogic->getcentro_costos();
			
			$this->centro_costoLogic->setIsConDeep(true);
			
			$this->centro_costoLogic->setcentro_costos($this->centro_costosAuxiliar);
			
			$this->centro_costoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->centro_costosAuxiliar=$this->centro_costoLogic->getcentro_costos();
			
			//RESPALDO
			$this->centro_costoLogic->setcentro_costos($centro_costosResp);
			
			$this->centro_costoLogic->setIsConDeep(false);
			*/
			
			$this->centro_costosAuxiliar=$this->cargarRelaciones($this->centro_costosAuxiliar);
			
			$i=0;
			
			foreach ($this->centro_costosAuxiliar as $centro_costo) {
				$row=array();
				
				if($i!=0) {
					$row=centro_costo_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=centro_costo_util::getDataReportRow($tipo,$centro_costo,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//asiento_predefinido
				if(Funciones::existeCadenaArrayOrderBy(asiento_predefinido_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($centro_costo->getasiento_predefinidos())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(asiento_predefinido_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=asiento_predefinido_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($centro_costo->getasiento_predefinidos() as $asiento_predefinido) {
						$row=asiento_predefinido_util::getDataReportRow('RELACIONADO',$asiento_predefinido,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//asiento
				if(Funciones::existeCadenaArrayOrderBy(asiento_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($centro_costo->getasientos())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(asiento_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=asiento_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($centro_costo->getasientos() as $asiento) {
						$row=asiento_util::getDataReportRow('RELACIONADO',$asiento,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//asiento_automatico_detalle
				if(Funciones::existeCadenaArrayOrderBy(asiento_automatico_detalle_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($centro_costo->getasiento_automatico_detalles())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(asiento_automatico_detalle_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=asiento_automatico_detalle_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($centro_costo->getasiento_automatico_detalles() as $asiento_automatico_detalle) {
						$row=asiento_automatico_detalle_util::getDataReportRow('RELACIONADO',$asiento_automatico_detalle,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//asiento_automatico
				if(Funciones::existeCadenaArrayOrderBy(asiento_automatico_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($centro_costo->getasiento_automaticos())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(asiento_automatico_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=asiento_automatico_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($centro_costo->getasiento_automaticos() as $asiento_automatico) {
						$row=asiento_automatico_util::getDataReportRow('RELACIONADO',$asiento_automatico,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->centro_costosAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->centro_costosAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->centro_costosAuxiliar)<=0) {
					$this->centro_costosAuxiliar=$this->centro_costos;
				}
			} else {
				$this->centro_costosAuxiliar=$this->centro_costos;
			}
		/*} else {
			$this->centro_costosAuxiliar=$this->centro_costosReporte;	
		}*/
		
		foreach ($this->centro_costosAuxiliar as $centro_costo) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(centro_costo_util::getcentro_costoDescripcion($centro_costo),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($centro_costo->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Codigo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($centro_costo->getcodigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($centro_costo->getnombre(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface centro_costo_base_controlI {			
		
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
		public function getIndiceActual(centro_costo $centro_costo,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(centro_costo $centro_costo,array $centro_costos);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : centro_costo_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $centro_costos,centro_costo $centro_costo);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(centro_costo_param_return $centro_costoReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(centro_costo_session $centro_costo_session);		
		public function actualizarInvitadoSessionDivStyleVariables(centro_costo_session $centro_costo_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(centro_costo $centro_costoOrigen,centro_costo $centro_costo,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(centro_costo_control $centro_costo_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $centro_costos=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(centro_costo_session $centro_costo_session);		
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
		public function getHtmlTablaDatosResumen(array $centro_costos=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $centro_costos=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(centro_costo $centro_costo=null) : string;
		
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
