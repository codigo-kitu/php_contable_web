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

namespace com\bydan\contabilidad\contabilidad\libro_auxiliar\presentation\control;

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

use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/libro_auxiliar/util/libro_auxiliar_carga.php');
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_carga;

use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_util;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_param_return;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\logic\libro_auxiliar_logic;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\presentation\session\libro_auxiliar_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


use com\bydan\contabilidad\contabilidad\contador_auxiliar\util\contador_auxiliar_carga;
use com\bydan\contabilidad\contabilidad\contador_auxiliar\util\contador_auxiliar_util;
use com\bydan\contabilidad\contabilidad\contador_auxiliar\presentation\session\contador_auxiliar_session;

use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\presentation\session\asiento_predefinido_session;

use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_util;
use com\bydan\contabilidad\contabilidad\asiento_automatico\presentation\session\asiento_automatico_session;

use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;
use com\bydan\contabilidad\contabilidad\asiento\presentation\session\asiento_session;


/*CARGA ARCHIVOS FRAMEWORK*/
libro_auxiliar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
libro_auxiliar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
libro_auxiliar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class libro_auxiliar_base_control extends libro_auxiliar_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->libro_auxiliarClase==null) {		
				$this->libro_auxiliarClase=new libro_auxiliar();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->libro_auxiliarClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->libro_auxiliarClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->libro_auxiliarClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->libro_auxiliarClase->setiniciales($this->getDataCampoFormTabla('form'.$this->strSufijo,'iniciales'));
				
				$this->libro_auxiliarClase->setnombre($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre'));
				
				$this->libro_auxiliarClase->setsecuencial((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'secuencial'));
				
				$this->libro_auxiliarClase->setincremento((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'incremento'));
				
				$this->libro_auxiliarClase->setreinicia_secuencial_mes(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'reinicia_secuencial_mes')));
				
				$this->libro_auxiliarClase->setgenerado_por((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'generado_por'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->libro_auxiliarModel->set($this->libro_auxiliarClase);
				
				/*$this->libro_auxiliarModel->set($this->migrarModellibro_auxiliar($this->libro_auxiliarClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->libro_auxiliarLogic->getlibro_auxiliar()->setId($this->libro_auxiliarClase->getId());	
			$this->libro_auxiliarLogic->getlibro_auxiliar()->setVersionRow($this->libro_auxiliarClase->getVersionRow());	
			$this->libro_auxiliarLogic->getlibro_auxiliar()->setVersionRow($this->libro_auxiliarClase->getVersionRow());	
			$this->libro_auxiliarLogic->getlibro_auxiliar()->setid_empresa($this->libro_auxiliarClase->getid_empresa());	
			$this->libro_auxiliarLogic->getlibro_auxiliar()->setiniciales($this->libro_auxiliarClase->getiniciales());	
			$this->libro_auxiliarLogic->getlibro_auxiliar()->setnombre($this->libro_auxiliarClase->getnombre());	
			$this->libro_auxiliarLogic->getlibro_auxiliar()->setsecuencial($this->libro_auxiliarClase->getsecuencial());	
			$this->libro_auxiliarLogic->getlibro_auxiliar()->setincremento($this->libro_auxiliarClase->getincremento());	
			$this->libro_auxiliarLogic->getlibro_auxiliar()->setreinicia_secuencial_mes($this->libro_auxiliarClase->getreinicia_secuencial_mes());	
			$this->libro_auxiliarLogic->getlibro_auxiliar()->setgenerado_por($this->libro_auxiliarClase->getgenerado_por());	
		} else {
			$this->libro_auxiliarClase->setId($this->libro_auxiliarLogic->getlibro_auxiliar()->getId());	
			$this->libro_auxiliarClase->setVersionRow($this->libro_auxiliarLogic->getlibro_auxiliar()->getVersionRow());	
			$this->libro_auxiliarClase->setVersionRow($this->libro_auxiliarLogic->getlibro_auxiliar()->getVersionRow());	
			$this->libro_auxiliarClase->setid_empresa($this->libro_auxiliarLogic->getlibro_auxiliar()->getid_empresa());	
			$this->libro_auxiliarClase->setiniciales($this->libro_auxiliarLogic->getlibro_auxiliar()->getiniciales());	
			$this->libro_auxiliarClase->setnombre($this->libro_auxiliarLogic->getlibro_auxiliar()->getnombre());	
			$this->libro_auxiliarClase->setsecuencial($this->libro_auxiliarLogic->getlibro_auxiliar()->getsecuencial());	
			$this->libro_auxiliarClase->setincremento($this->libro_auxiliarLogic->getlibro_auxiliar()->getincremento());	
			$this->libro_auxiliarClase->setreinicia_secuencial_mes($this->libro_auxiliarLogic->getlibro_auxiliar()->getreinicia_secuencial_mes());	
			$this->libro_auxiliarClase->setgenerado_por($this->libro_auxiliarLogic->getlibro_auxiliar()->getgenerado_por());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->libro_auxiliarModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='iniciales') {$this->strMensajeiniciales=$strMensajeCampo;}
		if($strNombreCampo=='nombre') {$this->strMensajenombre=$strMensajeCampo;}
		if($strNombreCampo=='secuencial') {$this->strMensajesecuencial=$strMensajeCampo;}
		if($strNombreCampo=='incremento') {$this->strMensajeincremento=$strMensajeCampo;}
		if($strNombreCampo=='reinicia_secuencial_mes') {$this->strMensajereinicia_secuencial_mes=$strMensajeCampo;}
		if($strNombreCampo=='generado_por') {$this->strMensajegenerado_por=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeiniciales='';
		$this->strMensajenombre='';
		$this->strMensajesecuencial='';
		$this->strMensajeincremento='';
		$this->strMensajereinicia_secuencial_mes='';
		$this->strMensajegenerado_por='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
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
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}

			$libro_auxiliar_session=unserialize($this->Session->read(libro_auxiliar_util::$STR_SESSION_NAME));
						
			if($libro_auxiliar_session==null) {
				$libro_auxiliar_session=new libro_auxiliar_session();
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
						$this->libro_auxiliarLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->libro_auxiliarActual =$this->libro_auxiliarClase;
			
			/*$this->libro_auxiliarActual =$this->migrarModellibro_auxiliar($this->libro_auxiliarClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->libro_auxiliarLogic->getlibro_auxiliars(),$this->libro_auxiliarActual);
			
			$this->actualizarControllerConReturnGeneral($this->libro_auxiliarReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
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
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$libro_auxiliarsLocal=$this->getListaActual();
		
		$iIndice=libro_auxiliar_util::getIndiceNuevo($libro_auxiliarsLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(libro_auxiliar $libro_auxiliar,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$libro_auxiliarsLocal=$this->getListaActual();
		
		$iIndice=libro_auxiliar_util::getIndiceActual($libro_auxiliarsLocal,$libro_auxiliar,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevolibro_auxiliar')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->libro_auxiliarActual =$this->libro_auxiliarClase;
			
			/*$this->libro_auxiliarActual =$this->migrarModellibro_auxiliar($this->libro_auxiliarClase);*/
			
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
			
			$this->libro_auxiliarLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
			
			$this->libro_auxiliarLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->libro_auxiliarLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->libro_auxiliarLogic->setlibro_auxiliar(new libro_auxiliar());
				
				$this->libro_auxiliarLogic->getlibro_auxiliar()->setIsNew(true);
				$this->libro_auxiliarLogic->getlibro_auxiliar()->setIsChanged(true);
				$this->libro_auxiliarLogic->getlibro_auxiliar()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->libro_auxiliarModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->libro_auxiliarLogic->libro_auxiliars[]=$this->libro_auxiliarLogic->getlibro_auxiliar();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->libro_auxiliarLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							contador_auxiliar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$contadorauxiliars=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME.'Lista'));
							$contadorauxiliarsEliminados=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$contadorauxiliars=array_merge($contadorauxiliars,$contadorauxiliarsEliminados);
							libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_predefinido_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientopredefinidos=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME.'Lista'));
							$asientopredefinidosEliminados=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientopredefinidos=array_merge($asientopredefinidos,$asientopredefinidosEliminados);
							libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_automatico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientoautomaticos=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME.'Lista'));
							$asientoautomaticosEliminados=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientoautomaticos=array_merge($asientoautomaticos,$asientoautomaticosEliminados);
							libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientos=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'Lista'));
							$asientosEliminados=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientos=array_merge($asientos,$asientosEliminados);
							
							$this->libro_auxiliarLogic->saveRelaciones($this->libro_auxiliarLogic->getlibro_auxiliar(),$contadorauxiliars,$asientopredefinidos,$asientoautomaticos,$asientos);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->libro_auxiliarLogic->getlibro_auxiliar()->setIsChanged(true);
				$this->libro_auxiliarLogic->getlibro_auxiliar()->setIsNew(false);
				$this->libro_auxiliarLogic->getlibro_auxiliar()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->libro_auxiliarModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->libro_auxiliarLogic->getlibro_auxiliar(),$this->libro_auxiliarLogic->getlibro_auxiliars());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->libro_auxiliarLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							contador_auxiliar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$contadorauxiliars=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME.'Lista'));
							$contadorauxiliarsEliminados=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$contadorauxiliars=array_merge($contadorauxiliars,$contadorauxiliarsEliminados);
							libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_predefinido_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientopredefinidos=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME.'Lista'));
							$asientopredefinidosEliminados=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientopredefinidos=array_merge($asientopredefinidos,$asientopredefinidosEliminados);
							libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_automatico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientoautomaticos=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME.'Lista'));
							$asientoautomaticosEliminados=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientoautomaticos=array_merge($asientoautomaticos,$asientoautomaticosEliminados);
							libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientos=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'Lista'));
							$asientosEliminados=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientos=array_merge($asientos,$asientosEliminados);
							
							$this->libro_auxiliarLogic->saveRelaciones($this->libro_auxiliarLogic->getlibro_auxiliar(),$contadorauxiliars,$asientopredefinidos,$asientoautomaticos,$asientos);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->libro_auxiliarLogic->getlibro_auxiliar()->setIsDeleted(true);
				$this->libro_auxiliarLogic->getlibro_auxiliar()->setIsNew(false);
				$this->libro_auxiliarLogic->getlibro_auxiliar()->setIsChanged(false);				
				
				$this->actualizarLista($this->libro_auxiliarLogic->getlibro_auxiliar(),$this->libro_auxiliarLogic->getlibro_auxiliars());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->libro_auxiliarLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							contador_auxiliar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$contadorauxiliars=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME.'Lista'));
							$contadorauxiliarsEliminados=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$contadorauxiliars=array_merge($contadorauxiliars,$contadorauxiliarsEliminados);

							foreach($contadorauxiliars as $contadorauxiliar1) {
								$contadorauxiliar1->setIsDeleted(true);
							}
							libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_predefinido_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientopredefinidos=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME.'Lista'));
							$asientopredefinidosEliminados=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientopredefinidos=array_merge($asientopredefinidos,$asientopredefinidosEliminados);

							foreach($asientopredefinidos as $asientopredefinido1) {
								$asientopredefinido1->setIsDeleted(true);
							}
							libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_automatico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientoautomaticos=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME.'Lista'));
							$asientoautomaticosEliminados=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientoautomaticos=array_merge($asientoautomaticos,$asientoautomaticosEliminados);

							foreach($asientoautomaticos as $asientoautomatico1) {
								$asientoautomatico1->setIsDeleted(true);
							}
							libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientos=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'Lista'));
							$asientosEliminados=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientos=array_merge($asientos,$asientosEliminados);

							foreach($asientos as $asiento1) {
								$asiento1->setIsDeleted(true);
							}
							
						$this->libro_auxiliarLogic->saveRelaciones($this->libro_auxiliarLogic->getlibro_auxiliar(),$contadorauxiliars,$asientopredefinidos,$asientoautomaticos,$asientos);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->libro_auxiliarsEliminados[]=$this->libro_auxiliarLogic->getlibro_auxiliar();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->libro_auxiliarLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							contador_auxiliar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$contadorauxiliars=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME.'Lista'));
							$contadorauxiliarsEliminados=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$contadorauxiliars=array_merge($contadorauxiliars,$contadorauxiliarsEliminados);
							libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_predefinido_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientopredefinidos=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME.'Lista'));
							$asientopredefinidosEliminados=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientopredefinidos=array_merge($asientopredefinidos,$asientopredefinidosEliminados);
							libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_automatico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientoautomaticos=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME.'Lista'));
							$asientoautomaticosEliminados=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientoautomaticos=array_merge($asientoautomaticos,$asientoautomaticosEliminados);
							libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientos=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'Lista'));
							$asientosEliminados=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientos=array_merge($asientos,$asientosEliminados);
							
						$this->libro_auxiliarLogic->saveRelaciones($this->libro_auxiliarLogic->getlibro_auxiliar(),$contadorauxiliars,$asientopredefinidos,$asientoautomaticos,$asientos);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->libro_auxiliarsEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->libro_auxiliarLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->libro_auxiliarLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->libro_auxiliarsEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->libro_auxiliarLogic->setlibro_auxiliars();*/
					
					$this->libro_auxiliarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->libro_auxiliarLogic->setIsConDeepLoad(false);
			
			$this->libro_auxiliars=$this->libro_auxiliarLogic->getlibro_auxiliars();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(libro_auxiliar_util::$STR_SESSION_NAME.'Lista',serialize($this->libro_auxiliars));
				$this->Session->write(libro_auxiliar_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->libro_auxiliarsEliminados));
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
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
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
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginallibro_auxiliar;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->libro_auxiliarLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->libro_auxiliars as $libro_auxiliarLocal) {
				if($this->libro_auxiliarLogic->getlibro_auxiliar()->getId()==$libro_auxiliarLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->libro_auxiliarLogic->getlibro_auxiliar()->setIsDeleted(true);
			$this->libro_auxiliarsEliminados[]=$this->libro_auxiliarLogic->getlibro_auxiliar();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->libro_auxiliars[$indice]);
				
				$this->libro_auxiliars = array_values($this->libro_auxiliars);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModellibro_auxiliar($this->libro_auxiliarClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(libro_auxiliar $libro_auxiliar,array $libro_auxiliars) {
		try {
			foreach($libro_auxiliars as $libro_auxiliarLocal){ 
				if($libro_auxiliarLocal->getId()==$libro_auxiliar->getId()) {
					$libro_auxiliarLocal->setIsChanged($libro_auxiliar->getIsChanged());
					$libro_auxiliarLocal->setIsNew($libro_auxiliar->getIsNew());
					$libro_auxiliarLocal->setIsDeleted($libro_auxiliar->getIsDeleted());
					//$libro_auxiliarLocal->setbitExpired($libro_auxiliar->getbitExpired());
					
					$libro_auxiliarLocal->setId($libro_auxiliar->getId());	
					$libro_auxiliarLocal->setVersionRow($libro_auxiliar->getVersionRow());	
					$libro_auxiliarLocal->setVersionRow($libro_auxiliar->getVersionRow());	
					$libro_auxiliarLocal->setid_empresa($libro_auxiliar->getid_empresa());	
					$libro_auxiliarLocal->setiniciales($libro_auxiliar->getiniciales());	
					$libro_auxiliarLocal->setnombre($libro_auxiliar->getnombre());	
					$libro_auxiliarLocal->setsecuencial($libro_auxiliar->getsecuencial());	
					$libro_auxiliarLocal->setincremento($libro_auxiliar->getincremento());	
					$libro_auxiliarLocal->setreinicia_secuencial_mes($libro_auxiliar->getreinicia_secuencial_mes());	
					$libro_auxiliarLocal->setgenerado_por($libro_auxiliar->getgenerado_por());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$libro_auxiliarsLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$libro_auxiliarsLocal=$this->libro_auxiliarLogic->getlibro_auxiliars();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$libro_auxiliarsLocal=$this->libro_auxiliars;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $libro_auxiliarsLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->libro_auxiliarLogic->getlibro_auxiliars() as $libro_auxiliar) {
				if($libro_auxiliar->getId()==$id) {
					$this->libro_auxiliarLogic->setlibro_auxiliar($libro_auxiliar);
					
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
		/*$libro_auxiliarsSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->libro_auxiliars as $libro_auxiliar) {
			$libro_auxiliar->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->libro_auxiliars[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : libro_auxiliar_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$libro_auxiliar_session=unserialize($this->Session->read(libro_auxiliar_util::$STR_SESSION_NAME));
						
		if($libro_auxiliar_session==null) {
			$libro_auxiliar_session=new libro_auxiliar_session();
		}
		
		
		$this->libro_auxiliarReturnGeneral=new libro_auxiliar_param_return();
		$this->libro_auxiliarParameterGeneral=new libro_auxiliar_param_return();
			
		$this->libro_auxiliarParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActuallibro_auxiliar(this.libro_auxiliar,true);
			this.setVariablesFormularioToObjetoActualForeignKeyslibro_auxiliar(this.libro_auxiliar);*/
			
			if($libro_auxiliar_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActuallibro_auxiliar(this.libro_auxiliar,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->libro_auxiliarActual=$this->libro_auxiliarClase;
				
				$this->setCopiarVariablesObjetos($this->libro_auxiliarActual,$this->libro_auxiliar,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->libro_auxiliarReturnGeneral=$this->libro_auxiliarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->libro_auxiliarLogic->getlibro_auxiliars(),$this->libro_auxiliar,$this->libro_auxiliarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($libro_auxiliar_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanlibro_auxiliar($classes,$this->libro_auxiliarReturnGeneral,$this->libro_auxiliarBean,false);*/
				}
					
				if($this->libro_auxiliarReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->libro_auxiliarReturnGeneral->getlibro_auxiliar(),$this->libro_auxiliarActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeylibro_auxiliar($this->libro_auxiliarReturnGeneral->getlibro_auxiliar());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariolibro_auxiliar($this->libro_auxiliarReturnGeneral->getlibro_auxiliar());*/
				}
					
				if($this->libro_auxiliarReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->libro_auxiliarReturnGeneral->getlibro_auxiliar(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->libro_auxiliar,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(libro_auxiliarJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActuallibro_auxiliar(this.libro_auxiliar,true);
				this.setVariablesFormularioToObjetoActualForeignKeyslibro_auxiliar(this.libro_auxiliar);				
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
				
				if($this->libro_auxiliarAnterior!=null) {
					$this->libro_auxiliar=$this->libro_auxiliarAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->libro_auxiliarReturnGeneral=$this->libro_auxiliarLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->libro_auxiliarLogic->getlibro_auxiliars(),$this->libro_auxiliar,$this->libro_auxiliarParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->libro_auxiliarReturnGeneral->getlibro_auxiliar(),$this->libro_auxiliarLogic->getlibro_auxiliars());
			*/
		}
		
		return $this->libro_auxiliarReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}

			$this->libro_auxiliarReturnGeneral=new libro_auxiliar_param_return();			
			$this->libro_auxiliarParameterGeneral=new libro_auxiliar_param_return();
			
			$this->libro_auxiliarParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->libro_auxiliarReturnGeneral=$this->libro_auxiliarLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->libro_auxiliars,$this->libro_auxiliarParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->libro_auxiliarReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->libro_auxiliarReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->libro_auxiliarReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
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
		
		$this->libro_auxiliarReturnGeneral=new libro_auxiliar_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_libro_auxiliar') {
		    $sDominio='libro_auxiliar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->libro_auxiliarReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->libro_auxiliarReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='libro_auxiliar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='libro_auxiliar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='libro_auxiliar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->libro_auxiliarReturnGeneral=new libro_auxiliar_param_return();
		$this->libro_auxiliarParameterGeneral=new libro_auxiliar_param_return();
			
		$this->libro_auxiliarParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->libro_auxiliarReturnGeneral=$this->libro_auxiliarLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->libro_auxiliarLogic->getlibro_auxiliars(),$this->libro_auxiliar,$this->libro_auxiliarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->libro_auxiliarReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->libro_auxiliarReturnGeneral->getlibro_auxiliar(),$classes);*/
		}									
	
		if($this->libro_auxiliarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->libro_auxiliarReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->libro_auxiliarReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $libro_auxiliars,libro_auxiliar $libro_auxiliar) {
		
		$libro_auxiliar_session=unserialize($this->Session->read(libro_auxiliar_util::$STR_SESSION_NAME));
						
		if($libro_auxiliar_session==null) {
			$libro_auxiliar_session=new libro_auxiliar_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(libro_auxiliar_util::$CLASSNAME);
			}	
			*/
			
			$this->libro_auxiliarReturnGeneral=new libro_auxiliar_param_return();
			$this->libro_auxiliarParameterGeneral=new libro_auxiliar_param_return();
			
			$this->libro_auxiliarParameterGeneral->setdata($this->data);
		
		
			
		if($libro_auxiliar_session->conGuardarRelaciones) {
			$classes=libro_auxiliar_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->libro_auxiliarActual,$this->libro_auxiliar,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->libro_auxiliarReturnGeneral=$this->libro_auxiliarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->libro_auxiliarLogic->getlibro_auxiliars(),$this->libro_auxiliarActual,$this->libro_auxiliarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->libro_auxiliarReturnGeneral=$this->libro_auxiliarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$libro_auxiliars,$libro_auxiliar,$this->libro_auxiliarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModellibro_auxiliar($this->libro_auxiliarLogic->getlibro_auxiliar());*/
			
			$this->libro_auxiliar=$this->libro_auxiliarLogic->getlibro_auxiliar();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->libro_auxiliar);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$libro_auxiliarActual=new libro_auxiliar();
			
			if($this->libro_auxiliarClase==null) {		
				$this->libro_auxiliarClase=new libro_auxiliar();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$libro_auxiliarActual=$this->libro_auxiliars[$indice];*/
				
				$libro_auxiliarActual->setId($this->data['t'.$this->strSufijo]['cel_'.$i.'_0']);
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $libro_auxiliarActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $libro_auxiliarActual->setiniciales($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $libro_auxiliarActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $libro_auxiliarActual->setsecuencial((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $libro_auxiliarActual->setincremento((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $libro_auxiliarActual->setreinicia_secuencial_mes(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_8')));  } else { $libro_auxiliarActual->setreinicia_secuencial_mes(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $libro_auxiliarActual->setgenerado_por((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }

				$this->libro_auxiliarClase=$libro_auxiliarActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->libro_auxiliarModel->set($this->libro_auxiliarClase);
				
				/*$this->libro_auxiliarModel->set($this->migrarModellibro_auxiliar($this->libro_auxiliarClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->libro_auxiliars=$this->migrarModellibro_auxiliar($this->libro_auxiliarLogic->getlibro_auxiliars());							
		$this->libro_auxiliars=$this->libro_auxiliarLogic->getlibro_auxiliars();*/
		
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
			$this->Session->write(libro_auxiliar_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$libro_auxiliar_control_session=unserialize($this->Session->read(libro_auxiliar_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($libro_auxiliar_control_session==null) {
				$libro_auxiliar_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($libro_auxiliar_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(libro_auxiliar_util::$STR_SESSION_NAME,$this);*/
		} else {
			$libro_auxiliar_session=unserialize($this->Session->read(libro_auxiliar_util::$STR_SESSION_NAME));
			
			if($libro_auxiliar_session==null) {
				$libro_auxiliar_session=new libro_auxiliar_session();
			}
			
			$this->set(libro_auxiliar_util::$STR_SESSION_NAME, $libro_auxiliar_session);
		}
	}
	
	public function setCopiarVariablesObjetos(libro_auxiliar $libro_auxiliarOrigen,libro_auxiliar $libro_auxiliar,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($libro_auxiliar==null) {
				$libro_auxiliar=new libro_auxiliar();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $libro_auxiliarOrigen->getId()!=null && $libro_auxiliarOrigen->getId()!=0)) {$libro_auxiliar->setId($libro_auxiliarOrigen->getId());}}
			if($conDefault || ($conDefault==false && $libro_auxiliarOrigen->getiniciales()!=null && $libro_auxiliarOrigen->getiniciales()!='')) {$libro_auxiliar->setiniciales($libro_auxiliarOrigen->getiniciales());}
			if($conDefault || ($conDefault==false && $libro_auxiliarOrigen->getnombre()!=null && $libro_auxiliarOrigen->getnombre()!='')) {$libro_auxiliar->setnombre($libro_auxiliarOrigen->getnombre());}
			if($conDefault || ($conDefault==false && $libro_auxiliarOrigen->getsecuencial()!=null && $libro_auxiliarOrigen->getsecuencial()!=0)) {$libro_auxiliar->setsecuencial($libro_auxiliarOrigen->getsecuencial());}
			if($conDefault || ($conDefault==false && $libro_auxiliarOrigen->getincremento()!=null && $libro_auxiliarOrigen->getincremento()!=0)) {$libro_auxiliar->setincremento($libro_auxiliarOrigen->getincremento());}
			if($conDefault || ($conDefault==false && $libro_auxiliarOrigen->getreinicia_secuencial_mes()!=null && $libro_auxiliarOrigen->getreinicia_secuencial_mes()!=false)) {$libro_auxiliar->setreinicia_secuencial_mes($libro_auxiliarOrigen->getreinicia_secuencial_mes());}
			if($conDefault || ($conDefault==false && $libro_auxiliarOrigen->getgenerado_por()!=null && $libro_auxiliarOrigen->getgenerado_por()!=0)) {$libro_auxiliar->setgenerado_por($libro_auxiliarOrigen->getgenerado_por());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$libro_auxiliarsSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$libro_auxiliarsSeleccionados[]=$this->libro_auxiliars[$indice];
			}
		}
		
		return $libro_auxiliarsSeleccionados;
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
		$libro_auxiliar= new libro_auxiliar();
		
		foreach($this->libro_auxiliarLogic->getlibro_auxiliars() as $libro_auxiliar) {
			
		$libro_auxiliar->contadorauxiliars=array();
		$libro_auxiliar->asientopredefinidos=array();
		$libro_auxiliar->asientoautomaticos=array();
		$libro_auxiliar->asientos=array();
		}		
		
		if($libro_auxiliar!=null);
	}
	
	public function cargarRelaciones(array $libro_auxiliars=array()) : array {	
		
		$libro_auxiliarsRespaldo = array();
		$libro_auxiliarsLocal = array();
		
		libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			contador_auxiliar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			asiento_predefinido_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			asiento_automatico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			asiento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$libro_auxiliarsResp=array();
		$classes=array();
			
		
				$class=new Classe('contador_auxiliar'); 	$classes[]=$class;
				$class=new Classe('asiento_predefinido'); 	$classes[]=$class;
				$class=new Classe('asiento_automatico'); 	$classes[]=$class;
				$class=new Classe('asiento'); 	$classes[]=$class;
			
			
		$libro_auxiliarsRespaldo=$this->libro_auxiliarLogic->getlibro_auxiliars();
			
		$this->libro_auxiliarLogic->setIsConDeep(true);
		
		$this->libro_auxiliarLogic->setlibro_auxiliars($libro_auxiliars);
			
		$this->libro_auxiliarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$libro_auxiliarsLocal=$this->libro_auxiliarLogic->getlibro_auxiliars();
			
		/*RESPALDO*/
		$this->libro_auxiliarLogic->setlibro_auxiliars($libro_auxiliarsRespaldo);
			
		$this->libro_auxiliarLogic->setIsConDeep(false);
		
		if($libro_auxiliarsResp!=null);
		
		return $libro_auxiliarsLocal;
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
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(libro_auxiliar_session $libro_auxiliar_session) {
		$libro_auxiliar_session->strTypeOnLoad=$this->strTypeOnLoadlibro_auxiliar;
		$libro_auxiliar_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarlibro_auxiliar;
		$libro_auxiliar_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarlibro_auxiliar;
		$libro_auxiliar_session->bitEsPopup=$this->bitEsPopup;
		$libro_auxiliar_session->bitEsBusqueda=$this->bitEsBusqueda;
		$libro_auxiliar_session->strFuncionJs=$this->strFuncionJs;
		/*$libro_auxiliar_session->strSufijo=$this->strSufijo;*/
		$libro_auxiliar_session->bitEsRelaciones=$this->bitEsRelaciones;
		$libro_auxiliar_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, libro_auxiliar_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisoscontador_auxiliar='none';
			$this->strTienePermisoscontador_auxiliar=((Funciones::existeCadenaArray(contador_auxiliar_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoscontador_auxiliar='table-cell';

			$this->strTienePermisosasiento_predefinido='none';
			$this->strTienePermisosasiento_predefinido=((Funciones::existeCadenaArray(asiento_predefinido_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosasiento_predefinido='table-cell';

			$this->strTienePermisosasiento_automatico='none';
			$this->strTienePermisosasiento_automatico=((Funciones::existeCadenaArray(asiento_automatico_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosasiento_automatico='table-cell';

			$this->strTienePermisosasiento='none';
			$this->strTienePermisosasiento=((Funciones::existeCadenaArray(asiento_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosasiento='table-cell';
		} else {
			

			$this->strTienePermisoscontador_auxiliar='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoscontador_auxiliar=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, contador_auxiliar_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoscontador_auxiliar='table-cell';

			$this->strTienePermisosasiento_predefinido='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosasiento_predefinido=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, asiento_predefinido_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosasiento_predefinido='table-cell';

			$this->strTienePermisosasiento_automatico='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosasiento_automatico=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, asiento_automatico_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosasiento_automatico='table-cell';

			$this->strTienePermisosasiento='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosasiento=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, asiento_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosasiento='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$libro_auxiliarViewAdditional=new libro_auxiliarView_add();
		$libro_auxiliarViewAdditional->libro_auxiliars=$this->libro_auxiliars;
		$libro_auxiliarViewAdditional->Session=$this->Session;
		
		return $libro_auxiliarViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$libro_auxiliarsLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$libro_auxiliarsLocal=$this->libro_auxiliars;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$libro_auxiliarsLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($libro_auxiliarsLocal)<=0) {
					$libro_auxiliarsLocal=$this->libro_auxiliars;
				}
			} else {
				$libro_auxiliarsLocal=$this->libro_auxiliars;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarlibro_auxiliarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarlibro_auxiliarsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$libro_auxiliarLogic=new libro_auxiliar_logic();
		$libro_auxiliarLogic->setlibro_auxiliars($this->libro_auxiliars);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$contador_auxiliar_session=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME));

		if($contador_auxiliar_session==null) {
			$contador_auxiliar_session=new contador_auxiliar_session();
		}

		$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}

		$asiento_automatico_session=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME));

		if($asiento_automatico_session==null) {
			$asiento_automatico_session=new asiento_automatico_session();
		}

		$asiento_session=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME));

		if($asiento_session==null) {
			$asiento_session=new asiento_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$libro_auxiliarLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->libro_auxiliars=$libro_auxiliarLogic->getlibro_auxiliars();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->libro_auxiliarsLocal=$this->libro_auxiliars;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=libro_auxiliar_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=libro_auxiliar_util::$STR_TABLE_NAME;		
			
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
			
			$libro_auxiliars = $this->libro_auxiliars;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = libro_auxiliar_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = libro_auxiliar_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/contabilidad/presentation/templating/libro_auxiliar_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->libro_auxiliars=$libro_auxiliars;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->libro_auxiliarsLocal=$libro_auxiliarsLocal;
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
		
		$libro_auxiliarsLocal=array();
		
		$libro_auxiliarsLocal=$this->libro_auxiliars;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarlibro_auxiliarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarlibro_auxiliarsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$libro_auxiliarLogic=new libro_auxiliar_logic();
		$libro_auxiliarLogic->setlibro_auxiliars($this->libro_auxiliars);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$contador_auxiliar_session=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME));

		if($contador_auxiliar_session==null) {
			$contador_auxiliar_session=new contador_auxiliar_session();
		}

		$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}

		$asiento_automatico_session=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME));

		if($asiento_automatico_session==null) {
			$asiento_automatico_session=new asiento_automatico_session();
		}

		$asiento_session=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME));

		if($asiento_session==null) {
			$asiento_session=new asiento_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$libro_auxiliarLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->libro_auxiliars=$libro_auxiliarLogic->getlibro_auxiliars();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$libro_auxiliars = $this->libro_auxiliars;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = libro_auxiliar_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = libro_auxiliar_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/contabilidad/presentation/templating/libro_auxiliar_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->libro_auxiliars=$libro_auxiliars;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->libro_auxiliarsLocal=$libro_auxiliarsLocal;
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
	
	public function getHtmlTablaDatosResumen(array $libro_auxiliars=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->libro_auxiliarsReporte = $libro_auxiliars;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarlibro_auxiliarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarlibro_auxiliarsAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $libro_auxiliars=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->libro_auxiliarsReporte = $libro_auxiliars;		
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
		
		
		$this->libro_auxiliarsReporte=$this->cargarRelaciones($libro_auxiliars);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarlibro_auxiliarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarlibro_auxiliarsAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(libro_auxiliar $libro_auxiliar=null) : string {	
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
			
			
			$libro_auxiliarsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$libro_auxiliarsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($libro_auxiliarsLocal)<=0) {
					/*//DEBE ESCOGER
					$libro_auxiliarsLocal=$this->libro_auxiliars;*/
				}
			} else {
				/*//DEBE ESCOGER
				$libro_auxiliarsLocal=$this->libro_auxiliars;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($libro_auxiliarsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($libro_auxiliarsLocal,true);
			
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
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}
					
			$libro_auxiliarsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$libro_auxiliarsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($libro_auxiliarsLocal)<=0) {
					/*//DEBE ESCOGER
					$libro_auxiliarsLocal=$this->libro_auxiliars;*/
				}
			} else {
				/*//DEBE ESCOGER
				$libro_auxiliarsLocal=$this->libro_auxiliars;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($libro_auxiliarsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($libro_auxiliarsLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Libro Auxiliares';
			
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
			$fileName='libro_auxiliar';
			
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
			
			$title='Reporte de  Libro Auxiliares';
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
			
			$title='Reporte de  Libro Auxiliares';
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
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Libro Auxiliares';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=libro_auxiliar_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->libro_auxiliarsAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->libro_auxiliarsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->libro_auxiliarsAuxiliar)<=0) {
					$this->libro_auxiliarsAuxiliar=$this->libro_auxiliars;
				}
			} else {
				$this->libro_auxiliarsAuxiliar=$this->libro_auxiliars;
			}
		/*} else {
			$this->libro_auxiliarsAuxiliar=$this->libro_auxiliarsReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->libro_auxiliarsAuxiliar as $libro_auxiliar) {
				$row=array();
				
				$row=libro_auxiliar_util::getDataReportRow($tipo,$libro_auxiliar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			contador_auxiliar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			asiento_predefinido_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			asiento_automatico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			asiento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$libro_auxiliarsResp=array();
			$classes=array();
			
			
				$class=new Classe('contador_auxiliar'); 	$classes[]=$class;
				$class=new Classe('asiento_predefinido'); 	$classes[]=$class;
				$class=new Classe('asiento_automatico'); 	$classes[]=$class;
				$class=new Classe('asiento'); 	$classes[]=$class;
			
			
			$libro_auxiliarsResp=$this->libro_auxiliarLogic->getlibro_auxiliars();
			
			$this->libro_auxiliarLogic->setIsConDeep(true);
			
			$this->libro_auxiliarLogic->setlibro_auxiliars($this->libro_auxiliarsAuxiliar);
			
			$this->libro_auxiliarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->libro_auxiliarsAuxiliar=$this->libro_auxiliarLogic->getlibro_auxiliars();
			
			//RESPALDO
			$this->libro_auxiliarLogic->setlibro_auxiliars($libro_auxiliarsResp);
			
			$this->libro_auxiliarLogic->setIsConDeep(false);
			*/
			
			$this->libro_auxiliarsAuxiliar=$this->cargarRelaciones($this->libro_auxiliarsAuxiliar);
			
			$i=0;
			
			foreach ($this->libro_auxiliarsAuxiliar as $libro_auxiliar) {
				$row=array();
				
				if($i!=0) {
					$row=libro_auxiliar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=libro_auxiliar_util::getDataReportRow($tipo,$libro_auxiliar,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//contador_auxiliar
				if(Funciones::existeCadenaArrayOrderBy(contador_auxiliar_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($libro_auxiliar->getcontador_auxiliars())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(contador_auxiliar_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=contador_auxiliar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($libro_auxiliar->getcontador_auxiliars() as $contador_auxiliar) {
						$row=contador_auxiliar_util::getDataReportRow('RELACIONADO',$contador_auxiliar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//asiento_predefinido
				if(Funciones::existeCadenaArrayOrderBy(asiento_predefinido_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($libro_auxiliar->getasiento_predefinidos())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(asiento_predefinido_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=asiento_predefinido_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($libro_auxiliar->getasiento_predefinidos() as $asiento_predefinido) {
						$row=asiento_predefinido_util::getDataReportRow('RELACIONADO',$asiento_predefinido,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//asiento_automatico
				if(Funciones::existeCadenaArrayOrderBy(asiento_automatico_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($libro_auxiliar->getasiento_automaticos())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(asiento_automatico_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=asiento_automatico_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($libro_auxiliar->getasiento_automaticos() as $asiento_automatico) {
						$row=asiento_automatico_util::getDataReportRow('RELACIONADO',$asiento_automatico,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//asiento
				if(Funciones::existeCadenaArrayOrderBy(asiento_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($libro_auxiliar->getasientos())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(asiento_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=asiento_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($libro_auxiliar->getasientos() as $asiento) {
						$row=asiento_util::getDataReportRow('RELACIONADO',$asiento,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->libro_auxiliarsAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->libro_auxiliarsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->libro_auxiliarsAuxiliar)<=0) {
					$this->libro_auxiliarsAuxiliar=$this->libro_auxiliars;
				}
			} else {
				$this->libro_auxiliarsAuxiliar=$this->libro_auxiliars;
			}
		/*} else {
			$this->libro_auxiliarsAuxiliar=$this->libro_auxiliarsReporte;	
		}*/
		
		foreach ($this->libro_auxiliarsAuxiliar as $libro_auxiliar) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(libro_auxiliar_util::getlibro_auxiliarDescripcion($libro_auxiliar),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($libro_auxiliar->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Iniciales',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Iniciales',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($libro_auxiliar->getiniciales(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($libro_auxiliar->getnombre(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Secuencial',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Secuencial',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($libro_auxiliar->getsecuencial(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Incremento',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($libro_auxiliar->getincremento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Reinicia Secuencial Mes',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Reinicia Secuencial Mes',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($libro_auxiliar->getreinicia_secuencial_mes(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Generado Por',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Generado Por',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($libro_auxiliar->getgenerado_por(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface libro_auxiliar_base_controlI {			
		
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
		public function getIndiceActual(libro_auxiliar $libro_auxiliar,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(libro_auxiliar $libro_auxiliar,array $libro_auxiliars);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : libro_auxiliar_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $libro_auxiliars,libro_auxiliar $libro_auxiliar);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(libro_auxiliar_param_return $libro_auxiliarReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(libro_auxiliar_session $libro_auxiliar_session);		
		public function actualizarInvitadoSessionDivStyleVariables(libro_auxiliar_session $libro_auxiliar_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(libro_auxiliar $libro_auxiliarOrigen,libro_auxiliar $libro_auxiliar,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(libro_auxiliar_control $libro_auxiliar_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $libro_auxiliars=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(libro_auxiliar_session $libro_auxiliar_session);		
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
		public function getHtmlTablaDatosResumen(array $libro_auxiliars=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $libro_auxiliars=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(libro_auxiliar $libro_auxiliar=null) : string;
		
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
