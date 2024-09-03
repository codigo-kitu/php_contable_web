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

namespace com\bydan\contabilidad\seguridad\usuario\presentation\control;

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


use com\bydan\contabilidad\seguridad\perfil_opcion\business\entity\perfil_opcion;

use com\bydan\contabilidad\seguridad\sistema\util\sistema_param_return;

use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic_add;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\logic\resumen_usuario_logic_add;

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/usuario/util/usuario_carga.php');
use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;

use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_param_return;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic_add;
use com\bydan\contabilidad\seguridad\usuario\presentation\session\usuario_session;


//FK


//REL


use com\bydan\contabilidad\seguridad\historial_cambio_clave\util\historial_cambio_clave_carga;
use com\bydan\contabilidad\seguridad\historial_cambio_clave\util\historial_cambio_clave_util;
use com\bydan\contabilidad\seguridad\historial_cambio_clave\presentation\session\historial_cambio_clave_session;

use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_carga;
use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_util;
use com\bydan\contabilidad\seguridad\resumen_usuario\presentation\session\resumen_usuario_session;

use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_carga;
use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_util;
use com\bydan\contabilidad\seguridad\auditoria\presentation\session\auditoria_session;

use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;
use com\bydan\contabilidad\seguridad\perfil\presentation\session\perfil_session;

use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_carga;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_util;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\presentation\session\parametro_general_usuario_session;

use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_carga;
use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_util;
use com\bydan\contabilidad\seguridad\perfil_usuario\presentation\session\perfil_usuario_session;

use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_carga;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_util;
use com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\session\dato_general_usuario_session;


/*CARGA ARCHIVOS FRAMEWORK*/
usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class usuario_base_control extends usuario_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->usuarioClase==null) {		
				$this->usuarioClase=new usuario();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				/*FK_DEFAULT-FIN*/
				
				
				$this->usuarioClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->usuarioClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->usuarioClase->setuser_name($this->getDataCampoFormTabla('form'.$this->strSufijo,'user_name'));
				
				$this->usuarioClase->setclave($this->getDataCampoFormTabla('form'.$this->strSufijo,'clave'));
				
				$this->usuarioClase->setconfirmar_clave($this->getDataCampoFormTabla('form'.$this->strSufijo,'confirmar_clave'));
				
				$this->usuarioClase->setnombre($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre'));
				
				$this->usuarioClase->setcodigo_alterno($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo_alterno'));
				
				$this->usuarioClase->settipo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'tipo')));
				
				$this->usuarioClase->setestado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'estado')));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->usuarioModel->set($this->usuarioClase);
				
				/*$this->usuarioModel->set($this->migrarModelusuario($this->usuarioClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->usuarioLogic->getusuario()->setId($this->usuarioClase->getId());	
			$this->usuarioLogic->getusuario()->setVersionRow($this->usuarioClase->getVersionRow());	
			$this->usuarioLogic->getusuario()->setVersionRow($this->usuarioClase->getVersionRow());	
			$this->usuarioLogic->getusuario()->setuser_name($this->usuarioClase->getuser_name());	
			$this->usuarioLogic->getusuario()->setclave($this->usuarioClase->getclave());	
			$this->usuarioLogic->getusuario()->setconfirmar_clave($this->usuarioClase->getconfirmar_clave());	
			$this->usuarioLogic->getusuario()->setnombre($this->usuarioClase->getnombre());	
			$this->usuarioLogic->getusuario()->setcodigo_alterno($this->usuarioClase->getcodigo_alterno());	
			$this->usuarioLogic->getusuario()->settipo($this->usuarioClase->gettipo());	
			$this->usuarioLogic->getusuario()->setestado($this->usuarioClase->getestado());	
		} else {
			$this->usuarioClase->setId($this->usuarioLogic->getusuario()->getId());	
			$this->usuarioClase->setVersionRow($this->usuarioLogic->getusuario()->getVersionRow());	
			$this->usuarioClase->setVersionRow($this->usuarioLogic->getusuario()->getVersionRow());	
			$this->usuarioClase->setuser_name($this->usuarioLogic->getusuario()->getuser_name());	
			$this->usuarioClase->setclave($this->usuarioLogic->getusuario()->getclave());	
			$this->usuarioClase->setconfirmar_clave($this->usuarioLogic->getusuario()->getconfirmar_clave());	
			$this->usuarioClase->setnombre($this->usuarioLogic->getusuario()->getnombre());	
			$this->usuarioClase->setcodigo_alterno($this->usuarioLogic->getusuario()->getcodigo_alterno());	
			$this->usuarioClase->settipo($this->usuarioLogic->getusuario()->gettipo());	
			$this->usuarioClase->setestado($this->usuarioLogic->getusuario()->getestado());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->usuarioModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='user_name') {$this->strMensajeuser_name=$strMensajeCampo;}
		if($strNombreCampo=='clave') {$this->strMensajeclave=$strMensajeCampo;}
		if($strNombreCampo=='confirmar_clave') {$this->strMensajeconfirmar_clave=$strMensajeCampo;}
		if($strNombreCampo=='nombre') {$this->strMensajenombre=$strMensajeCampo;}
		if($strNombreCampo=='codigo_alterno') {$this->strMensajecodigo_alterno=$strMensajeCampo;}
		if($strNombreCampo=='tipo') {$this->strMensajetipo=$strMensajeCampo;}
		if($strNombreCampo=='estado') {$this->strMensajeestado=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeuser_name='';
		$this->strMensajeclave='';
		$this->strMensajeconfirmar_clave='';
		$this->strMensajenombre='';
		$this->strMensajecodigo_alterno='';
		$this->strMensajetipo='';
		$this->strMensajeestado='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->commitNewConnexionToDeep();
				$this->usuarioLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->rollbackNewConnexionToDeep();
				$this->usuarioLogic->closeNewConnexionToDeep();
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
				$this->usuarioLogic->getNewConnexionToDeep();
			}

			$usuario_session=unserialize($this->Session->read(usuario_util::$STR_SESSION_NAME));
						
			if($usuario_session==null) {
				$usuario_session=new usuario_session();
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
						$this->usuarioLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->usuarioActual =$this->usuarioClase;
			
			/*$this->usuarioActual =$this->migrarModelusuario($this->usuarioClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->commitNewConnexionToDeep();
				$this->usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->usuarioLogic->getusuarios(),$this->usuarioActual);
			
			$this->actualizarControllerConReturnGeneral($this->usuarioReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->rollbackNewConnexionToDeep();
				$this->usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->getNewConnexionToDeep();
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
				$this->usuarioLogic->commitNewConnexionToDeep();
				$this->usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->rollbackNewConnexionToDeep();
				$this->usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$usuariosLocal=$this->getListaActual();
		
		$iIndice=usuario_util::getIndiceNuevo($usuariosLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(usuario $usuario,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$usuariosLocal=$this->getListaActual();
		
		$iIndice=usuario_util::getIndiceActual($usuariosLocal,$usuario,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevousuario')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->usuarioActual =$this->usuarioClase;
			
			/*$this->usuarioActual =$this->migrarModelusuario($this->usuarioClase);*/
			
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
			
			$this->usuarioLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
			
			$this->usuarioLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->usuarioLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->usuarioLogic->setusuario(new usuario());
				
				$this->usuarioLogic->getusuario()->setIsNew(true);
				$this->usuarioLogic->getusuario()->setIsChanged(true);
				$this->usuarioLogic->getusuario()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->usuarioModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->usuarioLogic->usuarios[]=$this->usuarioLogic->getusuario();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->usuarioLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							historial_cambio_clave_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$historialcambioclaves=unserialize($this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME.'Lista'));
							$historialcambioclavesEliminados=unserialize($this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME.'ListaEliminados'));
							$historialcambioclaves=array_merge($historialcambioclaves,$historialcambioclavesEliminados);
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							resumen_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$resumenusuarios=unserialize($this->Session->read(resumen_usuario_util::$STR_SESSION_NAME.'Lista'));
							$resumenusuariosEliminados=unserialize($this->Session->read(resumen_usuario_util::$STR_SESSION_NAME.'ListaEliminados'));
							$resumenusuarios=array_merge($resumenusuarios,$resumenusuariosEliminados);
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							auditoria_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$auditorias=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME.'Lista'));
							$auditoriasEliminados=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME.'ListaEliminados'));
							$auditorias=array_merge($auditorias,$auditoriasEliminados);
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							parametro_general_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$parametrogeneralusuarios=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME.'Lista'));
							$parametrogeneralusuariosEliminados=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME.'ListaEliminados'));
							$parametrogeneralusuarios=array_merge($parametrogeneralusuarios,$parametrogeneralusuariosEliminados);
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							perfil_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$perfilusuarios=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME.'Lista'));
							$perfilusuariosEliminados=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME.'ListaEliminados'));
							$perfilusuarios=array_merge($perfilusuarios,$perfilusuariosEliminados);
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							dato_general_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$datogeneralusuarios=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME.'Lista'));
							$datogeneralusuariosEliminados=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME.'ListaEliminados'));
							$datogeneralusuarios=array_merge($datogeneralusuarios,$datogeneralusuariosEliminados);
							
							$this->usuarioLogic->saveRelaciones($this->usuarioLogic->getusuario(),$historialcambioclaves,$resumenusuarios,$auditorias,$parametrogeneralusuario,$perfilusuarios,$datogeneralusuario);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->usuarioLogic->getusuario()->setIsChanged(true);
				$this->usuarioLogic->getusuario()->setIsNew(false);
				$this->usuarioLogic->getusuario()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->usuarioModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->usuarioLogic->getusuario(),$this->usuarioLogic->getusuarios());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->usuarioLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							historial_cambio_clave_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$historialcambioclaves=unserialize($this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME.'Lista'));
							$historialcambioclavesEliminados=unserialize($this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME.'ListaEliminados'));
							$historialcambioclaves=array_merge($historialcambioclaves,$historialcambioclavesEliminados);
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							resumen_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$resumenusuarios=unserialize($this->Session->read(resumen_usuario_util::$STR_SESSION_NAME.'Lista'));
							$resumenusuariosEliminados=unserialize($this->Session->read(resumen_usuario_util::$STR_SESSION_NAME.'ListaEliminados'));
							$resumenusuarios=array_merge($resumenusuarios,$resumenusuariosEliminados);
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							auditoria_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$auditorias=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME.'Lista'));
							$auditoriasEliminados=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME.'ListaEliminados'));
							$auditorias=array_merge($auditorias,$auditoriasEliminados);
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							parametro_general_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$parametrogeneralusuarios=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME.'Lista'));
							$parametrogeneralusuariosEliminados=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME.'ListaEliminados'));
							$parametrogeneralusuarios=array_merge($parametrogeneralusuarios,$parametrogeneralusuariosEliminados);
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							perfil_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$perfilusuarios=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME.'Lista'));
							$perfilusuariosEliminados=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME.'ListaEliminados'));
							$perfilusuarios=array_merge($perfilusuarios,$perfilusuariosEliminados);
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							dato_general_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$datogeneralusuarios=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME.'Lista'));
							$datogeneralusuariosEliminados=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME.'ListaEliminados'));
							$datogeneralusuarios=array_merge($datogeneralusuarios,$datogeneralusuariosEliminados);
							
							$this->usuarioLogic->saveRelaciones($this->usuarioLogic->getusuario(),$historialcambioclaves,$resumenusuarios,$auditorias,$parametrogeneralusuario,$perfilusuarios,$datogeneralusuario);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->usuarioLogic->getusuario()->setIsDeleted(true);
				$this->usuarioLogic->getusuario()->setIsNew(false);
				$this->usuarioLogic->getusuario()->setIsChanged(false);				
				
				$this->actualizarLista($this->usuarioLogic->getusuario(),$this->usuarioLogic->getusuarios());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->usuarioLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							historial_cambio_clave_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$historialcambioclaves=unserialize($this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME.'Lista'));
							$historialcambioclavesEliminados=unserialize($this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME.'ListaEliminados'));
							$historialcambioclaves=array_merge($historialcambioclaves,$historialcambioclavesEliminados);

							foreach($historialcambioclaves as $historialcambioclave1) {
								$historialcambioclave1->setIsDeleted(true);
							}
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							resumen_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$resumenusuarios=unserialize($this->Session->read(resumen_usuario_util::$STR_SESSION_NAME.'Lista'));
							$resumenusuariosEliminados=unserialize($this->Session->read(resumen_usuario_util::$STR_SESSION_NAME.'ListaEliminados'));
							$resumenusuarios=array_merge($resumenusuarios,$resumenusuariosEliminados);

							foreach($resumenusuarios as $resumenusuario1) {
								$resumenusuario1->setIsDeleted(true);
							}
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							auditoria_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$auditorias=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME.'Lista'));
							$auditoriasEliminados=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME.'ListaEliminados'));
							$auditorias=array_merge($auditorias,$auditoriasEliminados);

							foreach($auditorias as $auditoria1) {
								$auditoria1->setIsDeleted(true);
							}
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							parametro_general_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$parametrogeneralusuarios=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME.'Lista'));
							$parametrogeneralusuariosEliminados=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME.'ListaEliminados'));
							$parametrogeneralusuarios=array_merge($parametrogeneralusuarios,$parametrogeneralusuariosEliminados);

							foreach($parametrogeneralusuarios as $parametrogeneralusuario1) {
								$parametrogeneralusuario1->setIsDeleted(true);
							}
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							perfil_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$perfilusuarios=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME.'Lista'));
							$perfilusuariosEliminados=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME.'ListaEliminados'));
							$perfilusuarios=array_merge($perfilusuarios,$perfilusuariosEliminados);

							foreach($perfilusuarios as $perfilusuario1) {
								$perfilusuario1->setIsDeleted(true);
							}
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							dato_general_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$datogeneralusuarios=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME.'Lista'));
							$datogeneralusuariosEliminados=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME.'ListaEliminados'));
							$datogeneralusuarios=array_merge($datogeneralusuarios,$datogeneralusuariosEliminados);

							foreach($datogeneralusuarios as $datogeneralusuario1) {
								$datogeneralusuario1->setIsDeleted(true);
							}
							
						$this->usuarioLogic->saveRelaciones($this->usuarioLogic->getusuario(),$historialcambioclaves,$resumenusuarios,$auditorias,$parametrogeneralusuario,$perfilusuarios,$datogeneralusuario);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->usuariosEliminados[]=$this->usuarioLogic->getusuario();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->usuarioLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							historial_cambio_clave_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$historialcambioclaves=unserialize($this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME.'Lista'));
							$historialcambioclavesEliminados=unserialize($this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME.'ListaEliminados'));
							$historialcambioclaves=array_merge($historialcambioclaves,$historialcambioclavesEliminados);
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							resumen_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$resumenusuarios=unserialize($this->Session->read(resumen_usuario_util::$STR_SESSION_NAME.'Lista'));
							$resumenusuariosEliminados=unserialize($this->Session->read(resumen_usuario_util::$STR_SESSION_NAME.'ListaEliminados'));
							$resumenusuarios=array_merge($resumenusuarios,$resumenusuariosEliminados);
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							auditoria_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$auditorias=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME.'Lista'));
							$auditoriasEliminados=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME.'ListaEliminados'));
							$auditorias=array_merge($auditorias,$auditoriasEliminados);
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							parametro_general_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$parametrogeneralusuarios=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME.'Lista'));
							$parametrogeneralusuariosEliminados=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME.'ListaEliminados'));
							$parametrogeneralusuarios=array_merge($parametrogeneralusuarios,$parametrogeneralusuariosEliminados);
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							perfil_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$perfilusuarios=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME.'Lista'));
							$perfilusuariosEliminados=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME.'ListaEliminados'));
							$perfilusuarios=array_merge($perfilusuarios,$perfilusuariosEliminados);
							usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							dato_general_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$datogeneralusuarios=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME.'Lista'));
							$datogeneralusuariosEliminados=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME.'ListaEliminados'));
							$datogeneralusuarios=array_merge($datogeneralusuarios,$datogeneralusuariosEliminados);
							
						$this->usuarioLogic->saveRelaciones($this->usuarioLogic->getusuario(),$historialcambioclaves,$resumenusuarios,$auditorias,$parametrogeneralusuario,$perfilusuarios,$datogeneralusuario);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->usuariosEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->usuarioLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->usuarioLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->usuariosEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->usuarioLogic->setIsConDeepLoad(false);
			
			$this->usuarios=$this->usuarioLogic->getusuarios();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(usuario_util::$STR_SESSION_NAME.'Lista',serialize($this->usuarios));
				$this->Session->write(usuario_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->usuariosEliminados));
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
				$this->usuarioLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->commitNewConnexionToDeep();
				$this->usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->rollbackNewConnexionToDeep();
				$this->usuarioLogic->closeNewConnexionToDeep();
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
				$this->usuarioLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalusuario;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->usuarioLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->usuarios as $usuarioLocal) {
				if($this->usuarioLogic->getusuario()->getId()==$usuarioLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->usuarioLogic->getusuario()->setIsDeleted(true);
			$this->usuariosEliminados[]=$this->usuarioLogic->getusuario();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->usuarios[$indice]);
				
				$this->usuarios = array_values($this->usuarios);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelusuario($this->usuarioClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->commitNewConnexionToDeep();
				$this->usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->rollbackNewConnexionToDeep();
				$this->usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(usuario $usuario,array $usuarios) {
		try {
			foreach($usuarios as $usuarioLocal){ 
				if($usuarioLocal->getId()==$usuario->getId()) {
					$usuarioLocal->setIsChanged($usuario->getIsChanged());
					$usuarioLocal->setIsNew($usuario->getIsNew());
					$usuarioLocal->setIsDeleted($usuario->getIsDeleted());
					//$usuarioLocal->setbitExpired($usuario->getbitExpired());
					
					$usuarioLocal->setId($usuario->getId());	
					$usuarioLocal->setVersionRow($usuario->getVersionRow());	
					$usuarioLocal->setVersionRow($usuario->getVersionRow());	
					$usuarioLocal->setuser_name($usuario->getuser_name());	
					$usuarioLocal->setclave($usuario->getclave());	
					$usuarioLocal->setconfirmar_clave($usuario->getconfirmar_clave());	
					$usuarioLocal->setnombre($usuario->getnombre());	
					$usuarioLocal->setcodigo_alterno($usuario->getcodigo_alterno());	
					$usuarioLocal->settipo($usuario->gettipo());	
					$usuarioLocal->setestado($usuario->getestado());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$usuariosLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$usuariosLocal=$this->usuarioLogic->getusuarios();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$usuariosLocal=$this->usuarios;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $usuariosLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->usuarioLogic->getusuarios() as $usuario) {
				if($usuario->getId()==$id) {
					$this->usuarioLogic->setusuario($usuario);
					
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
		/*$usuariosSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->usuarios as $usuario) {
			$usuario->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->usuarios[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : usuario_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$usuario_session=unserialize($this->Session->read(usuario_util::$STR_SESSION_NAME));
						
		if($usuario_session==null) {
			$usuario_session=new usuario_session();
		}
		
		
		$this->usuarioReturnGeneral=new usuario_param_return();
		$this->usuarioParameterGeneral=new usuario_param_return();
			
		$this->usuarioParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualusuario(this.usuario,true);
			this.setVariablesFormularioToObjetoActualForeignKeysusuario(this.usuario);*/
			
			if($usuario_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualusuario(this.usuario,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->usuarioActual=$this->usuarioClase;
				
				$this->setCopiarVariablesObjetos($this->usuarioActual,$this->usuario,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->usuarioReturnGeneral=$this->usuarioLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->usuarioLogic->getusuarios(),$this->usuario,$this->usuarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($usuario_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanusuario($classes,$this->usuarioReturnGeneral,$this->usuarioBean,false);*/
				}
					
				if($this->usuarioReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->usuarioReturnGeneral->getusuario(),$this->usuarioActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeyusuario($this->usuarioReturnGeneral->getusuario());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariousuario($this->usuarioReturnGeneral->getusuario());*/
				}
					
				if($this->usuarioReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->usuarioReturnGeneral->getusuario(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->usuario,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(usuarioJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualusuario(this.usuario,true);
				this.setVariablesFormularioToObjetoActualForeignKeysusuario(this.usuario);				
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
				
				if($this->usuarioAnterior!=null) {
					$this->usuario=$this->usuarioAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->usuarioReturnGeneral=$this->usuarioLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->usuarioLogic->getusuarios(),$this->usuario,$this->usuarioParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->usuarioReturnGeneral->getusuario(),$this->usuarioLogic->getusuarios());
			*/
		}
		
		return $this->usuarioReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->getNewConnexionToDeep();
			}

			$this->usuarioReturnGeneral=new usuario_param_return();			
			$this->usuarioParameterGeneral=new usuario_param_return();
			
			$this->usuarioParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->usuarioReturnGeneral=$this->usuarioLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->usuarios,$this->usuarioParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->usuarioReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->usuarioReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->commitNewConnexionToDeep();
				$this->usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->usuarioReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->rollbackNewConnexionToDeep();
				$this->usuarioLogic->closeNewConnexionToDeep();
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
		
		$this->usuarioReturnGeneral=new usuario_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_usuario') {
		    $sDominio='usuario';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->usuarioReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->usuarioReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='usuario';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='usuario';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='usuario';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->usuarioReturnGeneral=new usuario_param_return();
		$this->usuarioParameterGeneral=new usuario_param_return();
			
		$this->usuarioParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->usuarioReturnGeneral=$this->usuarioLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->usuarioLogic->getusuarios(),$this->usuario,$this->usuarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->usuarioReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->usuarioReturnGeneral->getusuario(),$classes);*/
		}									
	
		if($this->usuarioReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->usuarioReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->usuarioReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $usuarios,usuario $usuario) {
		
		$usuario_session=unserialize($this->Session->read(usuario_util::$STR_SESSION_NAME));
						
		if($usuario_session==null) {
			$usuario_session=new usuario_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(usuario_util::$CLASSNAME);
			}	
			*/
			
			$this->usuarioReturnGeneral=new usuario_param_return();
			$this->usuarioParameterGeneral=new usuario_param_return();
			
			$this->usuarioParameterGeneral->setdata($this->data);
		
		
			
		if($usuario_session->conGuardarRelaciones) {
			$classes=usuario_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->usuarioActual,$this->usuario,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->usuarioReturnGeneral=$this->usuarioLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->usuarioLogic->getusuarios(),$this->usuarioActual,$this->usuarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->usuarioReturnGeneral=$this->usuarioLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$usuarios,$usuario,$this->usuarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelusuario($this->usuarioLogic->getusuario());*/
			
			$this->usuario=$this->usuarioLogic->getusuario();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->usuario);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->commitNewConnexionToDeep();
				$this->usuarioLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->rollbackNewConnexionToDeep();
				$this->usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$usuarioActual=new usuario();
			
			if($this->usuarioClase==null) {		
				$this->usuarioClase=new usuario();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$usuarioActual=$this->usuarios[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $usuarioActual->setuser_name($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $usuarioActual->setclave($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $usuarioActual->setconfirmar_clave($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $usuarioActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $usuarioActual->setcodigo_alterno($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $usuarioActual->settipo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_8')));  } else { $usuarioActual->settipo(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $usuarioActual->setestado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_9')));  } else { $usuarioActual->setestado(false); }

				$this->usuarioClase=$usuarioActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->usuarioModel->set($this->usuarioClase);
				
				/*$this->usuarioModel->set($this->migrarModelusuario($this->usuarioClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->usuarios=$this->migrarModelusuario($this->usuarioLogic->getusuarios());							
		$this->usuarios=$this->usuarioLogic->getusuarios();*/
		
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
			$this->Session->write(usuario_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$usuario_control_session=unserialize($this->Session->read(usuario_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($usuario_control_session==null) {
				$usuario_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($usuario_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(usuario_util::$STR_SESSION_NAME,$this);*/
		} else {
			$usuario_session=unserialize($this->Session->read(usuario_util::$STR_SESSION_NAME));
			
			if($usuario_session==null) {
				$usuario_session=new usuario_session();
			}
			
			$this->set(usuario_util::$STR_SESSION_NAME, $usuario_session);
		}
	}
	
	public function setCopiarVariablesObjetos(usuario $usuarioOrigen,usuario $usuario,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($usuario==null) {
				$usuario=new usuario();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $usuarioOrigen->getId()!=null && $usuarioOrigen->getId()!=0)) {$usuario->setId($usuarioOrigen->getId());}}
			if($conDefault || ($conDefault==false && $usuarioOrigen->getuser_name()!=null && $usuarioOrigen->getuser_name()!='')) {$usuario->setuser_name($usuarioOrigen->getuser_name());}
			if($conDefault || ($conDefault==false && $usuarioOrigen->getclave()!=null && $usuarioOrigen->getclave()!='')) {$usuario->setclave($usuarioOrigen->getclave());}
			if($conDefault || ($conDefault==false && $usuarioOrigen->getconfirmar_clave()!=null && $usuarioOrigen->getconfirmar_clave()!='')) {$usuario->setconfirmar_clave($usuarioOrigen->getconfirmar_clave());}
			if($conDefault || ($conDefault==false && $usuarioOrigen->getnombre()!=null && $usuarioOrigen->getnombre()!='')) {$usuario->setnombre($usuarioOrigen->getnombre());}
			if($conDefault || ($conDefault==false && $usuarioOrigen->getcodigo_alterno()!=null && $usuarioOrigen->getcodigo_alterno()!='')) {$usuario->setcodigo_alterno($usuarioOrigen->getcodigo_alterno());}
			if($conDefault || ($conDefault==false && $usuarioOrigen->gettipo()!=null && $usuarioOrigen->gettipo()!=false)) {$usuario->settipo($usuarioOrigen->gettipo());}
			if($conDefault || ($conDefault==false && $usuarioOrigen->getestado()!=null && $usuarioOrigen->getestado()!=false)) {$usuario->setestado($usuarioOrigen->getestado());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$usuariosSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$usuariosSeleccionados[]=$this->usuarios[$indice];
			}
		}
		
		return $usuariosSeleccionados;
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
		$usuario= new usuario();
		
		foreach($this->usuarioLogic->getusuarios() as $usuario) {
			
		$usuario->historialcambioclaves=array();
		$usuario->resumenusuarios=array();
		$usuario->auditorias=array();
		$usuario->perfils=array();
		$usuario->perfilusuarios=array();
		}		
		
		if($usuario!=null);
	}
	
	public function cargarRelaciones(array $usuarios=array()) : array {	
		
		$usuariosRespaldo = array();
		$usuariosLocal = array();
		
		usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			historial_cambio_clave_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			resumen_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			auditoria_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			perfil_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$usuariosResp=array();
		$classes=array();
			
		
				$class=new Classe('historial_cambio_clave'); 	$classes[]=$class;
				$class=new Classe('resumen_usuario'); 	$classes[]=$class;
				$class=new Classe('auditoria'); 	$classes[]=$class;
				$class=new Classe('perfil_usuario'); 	$classes[]=$class;
			
			
		$usuariosRespaldo=$this->usuarioLogic->getusuarios();
			
		$this->usuarioLogic->setIsConDeep(true);
		
		$this->usuarioLogic->setusuarios($usuarios);
			
		$this->usuarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$usuariosLocal=$this->usuarioLogic->getusuarios();
			
		/*RESPALDO*/
		$this->usuarioLogic->setusuarios($usuariosRespaldo);
			
		$this->usuarioLogic->setIsConDeep(false);
		
		if($usuariosResp!=null);
		
		return $usuariosLocal;
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
				$this->usuarioLogic->rollbackNewConnexionToDeep();
				$this->usuarioLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(usuario_session $usuario_session) {
		$usuario_session->strTypeOnLoad=$this->strTypeOnLoadusuario;
		$usuario_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarusuario;
		$usuario_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarusuario;
		$usuario_session->bitEsPopup=$this->bitEsPopup;
		$usuario_session->bitEsBusqueda=$this->bitEsBusqueda;
		$usuario_session->strFuncionJs=$this->strFuncionJs;
		/*$usuario_session->strSufijo=$this->strSufijo;*/
		$usuario_session->bitEsRelaciones=$this->bitEsRelaciones;
		$usuario_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, usuario_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisoshistorial_cambio_clave='none';
			$this->strTienePermisoshistorial_cambio_clave=((Funciones::existeCadenaArray(historial_cambio_clave_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoshistorial_cambio_clave='table-cell';

			$this->strTienePermisosresumen_usuario='none';
			$this->strTienePermisosresumen_usuario=((Funciones::existeCadenaArray(resumen_usuario_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosresumen_usuario='table-cell';

			$this->strTienePermisosauditoria='none';
			$this->strTienePermisosauditoria=((Funciones::existeCadenaArray(auditoria_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosauditoria='table-cell';

			$this->strTienePermisosperfil_usuario='none';
			$this->strTienePermisosperfil_usuario=((Funciones::existeCadenaArray(perfil_usuario_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosperfil_usuario='table-cell';

			$this->strTienePermisosparametro_general_usuario='none';
			$this->strTienePermisosparametro_general_usuario=((Funciones::existeCadenaArray(parametro_general_usuario_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosparametro_general_usuario='table-cell';

			$this->strTienePermisosdato_general_usuario='none';
			$this->strTienePermisosdato_general_usuario=((Funciones::existeCadenaArray(dato_general_usuario_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosdato_general_usuario='table-cell';
		} else {
			

			$this->strTienePermisoshistorial_cambio_clave='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoshistorial_cambio_clave=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, historial_cambio_clave_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoshistorial_cambio_clave='table-cell';

			$this->strTienePermisosresumen_usuario='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosresumen_usuario=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, resumen_usuario_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosresumen_usuario='table-cell';

			$this->strTienePermisosauditoria='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosauditoria=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, auditoria_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosauditoria='table-cell';

			$this->strTienePermisosperfil_usuario='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosperfil_usuario=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, perfil_usuario_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosperfil_usuario='table-cell';

			$this->strTienePermisosparametro_general_usuario='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosparametro_general_usuario=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, parametro_general_usuario_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosparametro_general_usuario='table-cell';

			$this->strTienePermisosdato_general_usuario='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosdato_general_usuario=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, dato_general_usuario_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosdato_general_usuario='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$usuarioViewAdditional=new usuarioView_add();
		$usuarioViewAdditional->usuarios=$this->usuarios;
		$usuarioViewAdditional->Session=$this->Session;
		
		return $usuarioViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$usuariosLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$usuariosLocal=$this->usuarios;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$usuariosLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($usuariosLocal)<=0) {
					$usuariosLocal=$this->usuarios;
				}
			} else {
				$usuariosLocal=$this->usuarios;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarusuariosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarusuariosAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$usuarioLogic=new usuario_logic();
		$usuarioLogic->setusuarios($this->usuarios);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$historial_cambio_clave_session=unserialize($this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME));

		if($historial_cambio_clave_session==null) {
			$historial_cambio_clave_session=new historial_cambio_clave_session();
		}

		$resumen_usuario_session=unserialize($this->Session->read(resumen_usuario_util::$STR_SESSION_NAME));

		if($resumen_usuario_session==null) {
			$resumen_usuario_session=new resumen_usuario_session();
		}

		$auditoria_session=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME));

		if($auditoria_session==null) {
			$auditoria_session=new auditoria_session();
		}

		$perfil_usuario_session=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME));

		if($perfil_usuario_session==null) {
			$perfil_usuario_session=new perfil_usuario_session();
		}

		$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));

		if($parametro_general_usuario_session==null) {
			$parametro_general_usuario_session=new parametro_general_usuario_session();
		}

		$perfil_usuario_session=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME));

		if($perfil_usuario_session==null) {
			$perfil_usuario_session=new perfil_usuario_session();
		}

		$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));

		if($dato_general_usuario_session==null) {
			$dato_general_usuario_session=new dato_general_usuario_session();
		} 
			
		
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$usuarioLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->usuarios=$usuarioLogic->getusuarios();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->usuariosLocal=$this->usuarios;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=usuario_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=usuario_util::$STR_TABLE_NAME;		
			
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
			
			$usuarios = $this->usuarios;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = usuario_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = usuario_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/seguridad/presentation/templating/usuario_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->usuarios=$usuarios;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->usuariosLocal=$usuariosLocal;
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
		
		$usuariosLocal=array();
		
		$usuariosLocal=$this->usuarios;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarusuariosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarusuariosAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$usuarioLogic=new usuario_logic();
		$usuarioLogic->setusuarios($this->usuarios);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$historial_cambio_clave_session=unserialize($this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME));

		if($historial_cambio_clave_session==null) {
			$historial_cambio_clave_session=new historial_cambio_clave_session();
		}

		$resumen_usuario_session=unserialize($this->Session->read(resumen_usuario_util::$STR_SESSION_NAME));

		if($resumen_usuario_session==null) {
			$resumen_usuario_session=new resumen_usuario_session();
		}

		$auditoria_session=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME));

		if($auditoria_session==null) {
			$auditoria_session=new auditoria_session();
		}

		$perfil_usuario_session=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME));

		if($perfil_usuario_session==null) {
			$perfil_usuario_session=new perfil_usuario_session();
		}

		$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));

		if($parametro_general_usuario_session==null) {
			$parametro_general_usuario_session=new parametro_general_usuario_session();
		}

		$perfil_usuario_session=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME));

		if($perfil_usuario_session==null) {
			$perfil_usuario_session=new perfil_usuario_session();
		}

		$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));

		if($dato_general_usuario_session==null) {
			$dato_general_usuario_session=new dato_general_usuario_session();
		} 
			
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$usuarioLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->usuarios=$usuarioLogic->getusuarios();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$usuarios = $this->usuarios;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = usuario_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = usuario_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/seguridad/presentation/templating/usuario_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->usuarios=$usuarios;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->usuariosLocal=$usuariosLocal;
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
	
	public function getHtmlTablaDatosResumen(array $usuarios=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->usuariosReporte = $usuarios;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarusuariosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarusuariosAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $usuarios=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->usuariosReporte = $usuarios;		
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
		
		
		$this->usuariosReporte=$this->cargarRelaciones($usuarios);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarusuariosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarusuariosAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(usuario $usuario=null) : string {	
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
			
			
			$usuariosLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$usuariosLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($usuariosLocal)<=0) {
					/*//DEBE ESCOGER
					$usuariosLocal=$this->usuarios;*/
				}
			} else {
				/*//DEBE ESCOGER
				$usuariosLocal=$this->usuarios;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($usuariosLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($usuariosLocal,true);
			
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
				$this->usuarioLogic->getNewConnexionToDeep();
			}
					
			$usuariosLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$usuariosLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($usuariosLocal)<=0) {
					/*//DEBE ESCOGER
					$usuariosLocal=$this->usuarios;*/
				}
			} else {
				/*//DEBE ESCOGER
				$usuariosLocal=$this->usuarios;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($usuariosLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($usuariosLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->commitNewConnexionToDeep();
				$this->usuarioLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->rollbackNewConnexionToDeep();
				$this->usuarioLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Usuarios';
			
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
			$fileName='usuario';
			
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
			
			$title='Reporte de  Usuarios';
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
			
			$title='Reporte de  Usuarios';
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
				$this->usuarioLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Usuarios';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->commitNewConnexionToDeep();
				$this->usuarioLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->usuarioLogic->rollbackNewConnexionToDeep();
				$this->usuarioLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=usuario_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->usuariosAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->usuariosAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->usuariosAuxiliar)<=0) {
					$this->usuariosAuxiliar=$this->usuarios;
				}
			} else {
				$this->usuariosAuxiliar=$this->usuarios;
			}
		/*} else {
			$this->usuariosAuxiliar=$this->usuariosReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->usuariosAuxiliar as $usuario) {
				$row=array();
				
				$row=usuario_util::getDataReportRow($tipo,$usuario,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			historial_cambio_clave_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			resumen_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			auditoria_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			perfil_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$usuariosResp=array();
			$classes=array();
			
			
				$class=new Classe('historial_cambio_clave'); 	$classes[]=$class;
				$class=new Classe('resumen_usuario'); 	$classes[]=$class;
				$class=new Classe('auditoria'); 	$classes[]=$class;
				$class=new Classe('perfil_usuario'); 	$classes[]=$class;
			
			
			$usuariosResp=$this->usuarioLogic->getusuarios();
			
			$this->usuarioLogic->setIsConDeep(true);
			
			$this->usuarioLogic->setusuarios($this->usuariosAuxiliar);
			
			$this->usuarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->usuariosAuxiliar=$this->usuarioLogic->getusuarios();
			
			//RESPALDO
			$this->usuarioLogic->setusuarios($usuariosResp);
			
			$this->usuarioLogic->setIsConDeep(false);
			*/
			
			$this->usuariosAuxiliar=$this->cargarRelaciones($this->usuariosAuxiliar);
			
			$i=0;
			
			foreach ($this->usuariosAuxiliar as $usuario) {
				$row=array();
				
				if($i!=0) {
					$row=usuario_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=usuario_util::getDataReportRow($tipo,$usuario,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//historial_cambio_clave
				if(Funciones::existeCadenaArrayOrderBy(historial_cambio_clave_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($usuario->gethistorial_cambio_claves())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(historial_cambio_clave_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=historial_cambio_clave_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($usuario->gethistorial_cambio_claves() as $historial_cambio_clave) {
						$row=historial_cambio_clave_util::getDataReportRow('RELACIONADO',$historial_cambio_clave,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//resumen_usuario
				if(Funciones::existeCadenaArrayOrderBy(resumen_usuario_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($usuario->getresumen_usuarios())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(resumen_usuario_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=resumen_usuario_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($usuario->getresumen_usuarios() as $resumen_usuario) {
						$row=resumen_usuario_util::getDataReportRow('RELACIONADO',$resumen_usuario,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//auditoria
				if(Funciones::existeCadenaArrayOrderBy(auditoria_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($usuario->getauditorias())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(auditoria_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=auditoria_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($usuario->getauditorias() as $auditoria) {
						$row=auditoria_util::getDataReportRow('RELACIONADO',$auditoria,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//perfil_usuario
				if(Funciones::existeCadenaArrayOrderBy(perfil_usuario_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($usuario->getperfil_usuarios())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(perfil_usuario_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=perfil_usuario_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($usuario->getperfil_usuarios() as $perfil_usuario) {
						$row=perfil_usuario_util::getDataReportRow('RELACIONADO',$perfil_usuario,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->usuariosAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->usuariosAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->usuariosAuxiliar)<=0) {
					$this->usuariosAuxiliar=$this->usuarios;
				}
			} else {
				$this->usuariosAuxiliar=$this->usuarios;
			}
		/*} else {
			$this->usuariosAuxiliar=$this->usuariosReporte;	
		}*/
		
		foreach ($this->usuariosAuxiliar as $usuario) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(usuario_util::getusuarioDescripcion($usuario),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Nombre De Usuario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre De Usuario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($usuario->getuser_name(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Clave',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Clave',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($usuario->getclave(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Confirmar Clave',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Confirmar Clave',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($usuario->getconfirmar_clave(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre Completo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Completo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($usuario->getnombre(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Código Alterno',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Código Alterno',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($usuario->getcodigo_alterno(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Tipo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($usuario->gettipo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Estado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Estado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($usuario->getestado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface usuario_base_controlI {			
		
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
		public function getIndiceActual(usuario $usuario,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(usuario $usuario,array $usuarios);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : usuario_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $usuarios,usuario $usuario);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(usuario_param_return $usuarioReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(usuario_session $usuario_session);		
		public function actualizarInvitadoSessionDivStyleVariables(usuario_session $usuario_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(usuario $usuarioOrigen,usuario $usuario,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(usuario_control $usuario_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $usuarios=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(usuario_session $usuario_session);		
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
		public function getHtmlTablaDatosResumen(array $usuarios=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $usuarios=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(usuario $usuario=null) : string;
		
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
