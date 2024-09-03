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

namespace com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\control;

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

use com\bydan\contabilidad\seguridad\dato_general_usuario\business\entity\dato_general_usuario;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/dato_general_usuario/util/dato_general_usuario_carga.php');
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_carga;

use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_util;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_param_return;
use com\bydan\contabilidad\seguridad\dato_general_usuario\business\logic\dato_general_usuario_logic;
use com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\session\dato_general_usuario_session;


//FK


use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\business\logic\pais_logic;
use com\bydan\contabilidad\seguridad\pais\util\pais_carga;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;

use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;
use com\bydan\contabilidad\seguridad\provincia\business\logic\provincia_logic;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_carga;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_util;

use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;
use com\bydan\contabilidad\seguridad\ciudad\business\logic\ciudad_logic;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_carga;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
dato_general_usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
dato_general_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
dato_general_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
dato_general_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*dato_general_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class dato_general_usuario_base_control extends dato_general_usuario_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->dato_general_usuarioClase==null) {		
				$this->dato_general_usuarioClase=new dato_general_usuario();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_pais')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_pais',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_provincia')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_provincia',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ciudad')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_ciudad',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->dato_general_usuarioClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->dato_general_usuarioClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->dato_general_usuarioClase->setid_pais((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_pais'));
				
				$this->dato_general_usuarioClase->setid_provincia((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_provincia'));
				
				$this->dato_general_usuarioClase->setid_ciudad((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ciudad'));
				
				$this->dato_general_usuarioClase->setcedula($this->getDataCampoFormTabla('form'.$this->strSufijo,'cedula'));
				
				$this->dato_general_usuarioClase->setapellidos($this->getDataCampoFormTabla('form'.$this->strSufijo,'apellidos'));
				
				$this->dato_general_usuarioClase->setnombres($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombres'));
				
				$this->dato_general_usuarioClase->settelefono($this->getDataCampoFormTabla('form'.$this->strSufijo,'telefono'));
				
				$this->dato_general_usuarioClase->settelefono_movil($this->getDataCampoFormTabla('form'.$this->strSufijo,'telefono_movil'));
				
				$this->dato_general_usuarioClase->sete_mail($this->getDataCampoFormTabla('form'.$this->strSufijo,'e_mail'));
				
				$this->dato_general_usuarioClase->seturl($this->getDataCampoFormTabla('form'.$this->strSufijo,'url'));
				
				$this->dato_general_usuarioClase->setfecha_nacimiento(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_nacimiento')));
				
				$this->dato_general_usuarioClase->setdireccion($this->getDataCampoFormTabla('form'.$this->strSufijo,'direccion'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->dato_general_usuarioModel->set($this->dato_general_usuarioClase);
				
				/*$this->dato_general_usuarioModel->set($this->migrarModeldato_general_usuario($this->dato_general_usuarioClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->dato_general_usuarioLogic->getdato_general_usuario()->setId($this->dato_general_usuarioClase->getId());	
			$this->dato_general_usuarioLogic->getdato_general_usuario()->setVersionRow($this->dato_general_usuarioClase->getVersionRow());	
			$this->dato_general_usuarioLogic->getdato_general_usuario()->setVersionRow($this->dato_general_usuarioClase->getVersionRow());	
			$this->dato_general_usuarioLogic->getdato_general_usuario()->setid_pais($this->dato_general_usuarioClase->getid_pais());	
			$this->dato_general_usuarioLogic->getdato_general_usuario()->setid_provincia($this->dato_general_usuarioClase->getid_provincia());	
			$this->dato_general_usuarioLogic->getdato_general_usuario()->setid_ciudad($this->dato_general_usuarioClase->getid_ciudad());	
			$this->dato_general_usuarioLogic->getdato_general_usuario()->setcedula($this->dato_general_usuarioClase->getcedula());	
			$this->dato_general_usuarioLogic->getdato_general_usuario()->setapellidos($this->dato_general_usuarioClase->getapellidos());	
			$this->dato_general_usuarioLogic->getdato_general_usuario()->setnombres($this->dato_general_usuarioClase->getnombres());	
			$this->dato_general_usuarioLogic->getdato_general_usuario()->settelefono($this->dato_general_usuarioClase->gettelefono());	
			$this->dato_general_usuarioLogic->getdato_general_usuario()->settelefono_movil($this->dato_general_usuarioClase->gettelefono_movil());	
			$this->dato_general_usuarioLogic->getdato_general_usuario()->sete_mail($this->dato_general_usuarioClase->gete_mail());	
			$this->dato_general_usuarioLogic->getdato_general_usuario()->seturl($this->dato_general_usuarioClase->geturl());	
			$this->dato_general_usuarioLogic->getdato_general_usuario()->setfecha_nacimiento($this->dato_general_usuarioClase->getfecha_nacimiento());	
			$this->dato_general_usuarioLogic->getdato_general_usuario()->setdireccion($this->dato_general_usuarioClase->getdireccion());	
		} else {
			$this->dato_general_usuarioClase->setId($this->dato_general_usuarioLogic->getdato_general_usuario()->getId());	
			$this->dato_general_usuarioClase->setVersionRow($this->dato_general_usuarioLogic->getdato_general_usuario()->getVersionRow());	
			$this->dato_general_usuarioClase->setVersionRow($this->dato_general_usuarioLogic->getdato_general_usuario()->getVersionRow());	
			$this->dato_general_usuarioClase->setid_pais($this->dato_general_usuarioLogic->getdato_general_usuario()->getid_pais());	
			$this->dato_general_usuarioClase->setid_provincia($this->dato_general_usuarioLogic->getdato_general_usuario()->getid_provincia());	
			$this->dato_general_usuarioClase->setid_ciudad($this->dato_general_usuarioLogic->getdato_general_usuario()->getid_ciudad());	
			$this->dato_general_usuarioClase->setcedula($this->dato_general_usuarioLogic->getdato_general_usuario()->getcedula());	
			$this->dato_general_usuarioClase->setapellidos($this->dato_general_usuarioLogic->getdato_general_usuario()->getapellidos());	
			$this->dato_general_usuarioClase->setnombres($this->dato_general_usuarioLogic->getdato_general_usuario()->getnombres());	
			$this->dato_general_usuarioClase->settelefono($this->dato_general_usuarioLogic->getdato_general_usuario()->gettelefono());	
			$this->dato_general_usuarioClase->settelefono_movil($this->dato_general_usuarioLogic->getdato_general_usuario()->gettelefono_movil());	
			$this->dato_general_usuarioClase->sete_mail($this->dato_general_usuarioLogic->getdato_general_usuario()->gete_mail());	
			$this->dato_general_usuarioClase->seturl($this->dato_general_usuarioLogic->getdato_general_usuario()->geturl());	
			$this->dato_general_usuarioClase->setfecha_nacimiento($this->dato_general_usuarioLogic->getdato_general_usuario()->getfecha_nacimiento());	
			$this->dato_general_usuarioClase->setdireccion($this->dato_general_usuarioLogic->getdato_general_usuario()->getdireccion());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->dato_general_usuarioModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_pais') {$this->strMensajeid_pais=$strMensajeCampo;}
		if($strNombreCampo=='id_provincia') {$this->strMensajeid_provincia=$strMensajeCampo;}
		if($strNombreCampo=='id_ciudad') {$this->strMensajeid_ciudad=$strMensajeCampo;}
		if($strNombreCampo=='cedula') {$this->strMensajecedula=$strMensajeCampo;}
		if($strNombreCampo=='apellidos') {$this->strMensajeapellidos=$strMensajeCampo;}
		if($strNombreCampo=='nombres') {$this->strMensajenombres=$strMensajeCampo;}
		if($strNombreCampo=='telefono') {$this->strMensajetelefono=$strMensajeCampo;}
		if($strNombreCampo=='telefono_movil') {$this->strMensajetelefono_movil=$strMensajeCampo;}
		if($strNombreCampo=='e_mail') {$this->strMensajee_mail=$strMensajeCampo;}
		if($strNombreCampo=='url') {$this->strMensajeurl=$strMensajeCampo;}
		if($strNombreCampo=='fecha_nacimiento') {$this->strMensajefecha_nacimiento=$strMensajeCampo;}
		if($strNombreCampo=='direccion') {$this->strMensajedireccion=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_pais='';
		$this->strMensajeid_provincia='';
		$this->strMensajeid_ciudad='';
		$this->strMensajecedula='';
		$this->strMensajeapellidos='';
		$this->strMensajenombres='';
		$this->strMensajetelefono='';
		$this->strMensajetelefono_movil='';
		$this->strMensajee_mail='';
		$this->strMensajeurl='';
		$this->strMensajefecha_nacimiento='';
		$this->strMensajedireccion='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
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
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}

			$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));
						
			if($dato_general_usuario_session==null) {
				$dato_general_usuario_session=new dato_general_usuario_session();
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
						$this->dato_general_usuarioLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->dato_general_usuarioActual =$this->dato_general_usuarioClase;
			
			/*$this->dato_general_usuarioActual =$this->migrarModeldato_general_usuario($this->dato_general_usuarioClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->dato_general_usuarioLogic->getdato_general_usuarios(),$this->dato_general_usuarioActual);
			
			$this->actualizarControllerConReturnGeneral($this->dato_general_usuarioReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
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
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$dato_general_usuariosLocal=$this->getListaActual();
		
		$iIndice=dato_general_usuario_util::getIndiceNuevo($dato_general_usuariosLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(dato_general_usuario $dato_general_usuario,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$dato_general_usuariosLocal=$this->getListaActual();
		
		$iIndice=dato_general_usuario_util::getIndiceActual($dato_general_usuariosLocal,$dato_general_usuario,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevodato_general_usuario')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->dato_general_usuarioActual =$this->dato_general_usuarioClase;
			
			/*$this->dato_general_usuarioActual =$this->migrarModeldato_general_usuario($this->dato_general_usuarioClase);*/
			
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
			
			$this->dato_general_usuarioLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('pais');$classes[]=$class;
				$class=new Classe('provincia');$classes[]=$class;
				$class=new Classe('ciudad');$classes[]=$class;
			
			$this->dato_general_usuarioLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->dato_general_usuarioLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->dato_general_usuarioLogic->setdato_general_usuario(new dato_general_usuario());
				
				$this->dato_general_usuarioLogic->getdato_general_usuario()->setIsNew(true);
				$this->dato_general_usuarioLogic->getdato_general_usuario()->setIsChanged(true);
				$this->dato_general_usuarioLogic->getdato_general_usuario()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->dato_general_usuarioModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->dato_general_usuarioLogic->dato_general_usuarios[]=$this->dato_general_usuarioLogic->getdato_general_usuario();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->dato_general_usuarioLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->dato_general_usuarioLogic->saveRelaciones($this->dato_general_usuarioLogic->getdato_general_usuario());/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->dato_general_usuarioLogic->getdato_general_usuario()->setIsChanged(true);
				$this->dato_general_usuarioLogic->getdato_general_usuario()->setIsNew(false);
				$this->dato_general_usuarioLogic->getdato_general_usuario()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->dato_general_usuarioModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->dato_general_usuarioLogic->getdato_general_usuario(),$this->dato_general_usuarioLogic->getdato_general_usuarios());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->dato_general_usuarioLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->dato_general_usuarioLogic->saveRelaciones($this->dato_general_usuarioLogic->getdato_general_usuario());/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->dato_general_usuarioLogic->getdato_general_usuario()->setIsDeleted(true);
				$this->dato_general_usuarioLogic->getdato_general_usuario()->setIsNew(false);
				$this->dato_general_usuarioLogic->getdato_general_usuario()->setIsChanged(false);				
				
				$this->actualizarLista($this->dato_general_usuarioLogic->getdato_general_usuario(),$this->dato_general_usuarioLogic->getdato_general_usuarios());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->dato_general_usuarioLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->dato_general_usuarioLogic->saveRelaciones($this->dato_general_usuarioLogic->getdato_general_usuario());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->dato_general_usuariosEliminados[]=$this->dato_general_usuarioLogic->getdato_general_usuario();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->dato_general_usuarioLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->dato_general_usuarioLogic->saveRelaciones($this->dato_general_usuarioLogic->getdato_general_usuario());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->dato_general_usuariosEliminados=array();
				}
			}
			
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('pais');$classes[]=$class;
				$class=new Classe('provincia');$classes[]=$class;
				$class=new Classe('ciudad');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->dato_general_usuarioLogic->setdato_general_usuarios();*/
					
					$this->dato_general_usuarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->dato_general_usuarioLogic->setIsConDeepLoad(false);
			
			$this->dato_general_usuarios=$this->dato_general_usuarioLogic->getdato_general_usuarios();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(dato_general_usuario_util::$STR_SESSION_NAME.'Lista',serialize($this->dato_general_usuarios));
				$this->Session->write(dato_general_usuario_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->dato_general_usuariosEliminados));
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
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
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
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginaldato_general_usuario;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->dato_general_usuarioLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->dato_general_usuarios as $dato_general_usuarioLocal) {
				if($this->dato_general_usuarioLogic->getdato_general_usuario()->getId()==$dato_general_usuarioLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->dato_general_usuarioLogic->getdato_general_usuario()->setIsDeleted(true);
			$this->dato_general_usuariosEliminados[]=$this->dato_general_usuarioLogic->getdato_general_usuario();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->dato_general_usuarios[$indice]);
				
				$this->dato_general_usuarios = array_values($this->dato_general_usuarios);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModeldato_general_usuario($this->dato_general_usuarioClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(dato_general_usuario $dato_general_usuario,array $dato_general_usuarios) {
		try {
			foreach($dato_general_usuarios as $dato_general_usuarioLocal){ 
				if($dato_general_usuarioLocal->getId()==$dato_general_usuario->getId()) {
					$dato_general_usuarioLocal->setIsChanged($dato_general_usuario->getIsChanged());
					$dato_general_usuarioLocal->setIsNew($dato_general_usuario->getIsNew());
					$dato_general_usuarioLocal->setIsDeleted($dato_general_usuario->getIsDeleted());
					//$dato_general_usuarioLocal->setbitExpired($dato_general_usuario->getbitExpired());
					
					$dato_general_usuarioLocal->setId($dato_general_usuario->getId());	
					$dato_general_usuarioLocal->setVersionRow($dato_general_usuario->getVersionRow());	
					$dato_general_usuarioLocal->setVersionRow($dato_general_usuario->getVersionRow());	
					$dato_general_usuarioLocal->setid_pais($dato_general_usuario->getid_pais());	
					$dato_general_usuarioLocal->setid_provincia($dato_general_usuario->getid_provincia());	
					$dato_general_usuarioLocal->setid_ciudad($dato_general_usuario->getid_ciudad());	
					$dato_general_usuarioLocal->setcedula($dato_general_usuario->getcedula());	
					$dato_general_usuarioLocal->setapellidos($dato_general_usuario->getapellidos());	
					$dato_general_usuarioLocal->setnombres($dato_general_usuario->getnombres());	
					$dato_general_usuarioLocal->settelefono($dato_general_usuario->gettelefono());	
					$dato_general_usuarioLocal->settelefono_movil($dato_general_usuario->gettelefono_movil());	
					$dato_general_usuarioLocal->sete_mail($dato_general_usuario->gete_mail());	
					$dato_general_usuarioLocal->seturl($dato_general_usuario->geturl());	
					$dato_general_usuarioLocal->setfecha_nacimiento($dato_general_usuario->getfecha_nacimiento());	
					$dato_general_usuarioLocal->setdireccion($dato_general_usuario->getdireccion());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$dato_general_usuariosLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$dato_general_usuariosLocal=$this->dato_general_usuarioLogic->getdato_general_usuarios();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$dato_general_usuariosLocal=$this->dato_general_usuarios;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $dato_general_usuariosLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->dato_general_usuarioLogic->getdato_general_usuarios() as $dato_general_usuario) {
				if($dato_general_usuario->getId()==$id) {
					$this->dato_general_usuarioLogic->setdato_general_usuario($dato_general_usuario);
					
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
		/*$dato_general_usuariosSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->dato_general_usuarios as $dato_general_usuario) {
			$dato_general_usuario->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->dato_general_usuarios[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : dato_general_usuario_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));
						
		if($dato_general_usuario_session==null) {
			$dato_general_usuario_session=new dato_general_usuario_session();
		}
		
		
		$this->dato_general_usuarioReturnGeneral=new dato_general_usuario_param_return();
		$this->dato_general_usuarioParameterGeneral=new dato_general_usuario_param_return();
			
		$this->dato_general_usuarioParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualdato_general_usuario(this.dato_general_usuario,true);
			this.setVariablesFormularioToObjetoActualForeignKeysdato_general_usuario(this.dato_general_usuario);*/
			
			if($dato_general_usuario_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualdato_general_usuario(this.dato_general_usuario,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->dato_general_usuarioActual=$this->dato_general_usuarioClase;
				
				$this->setCopiarVariablesObjetos($this->dato_general_usuarioActual,$this->dato_general_usuario,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->dato_general_usuarioReturnGeneral=$this->dato_general_usuarioLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->dato_general_usuarioLogic->getdato_general_usuarios(),$this->dato_general_usuario,$this->dato_general_usuarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($dato_general_usuario_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeandato_general_usuario($classes,$this->dato_general_usuarioReturnGeneral,$this->dato_general_usuarioBean,false);*/
				}
					
				if($this->dato_general_usuarioReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->dato_general_usuarioReturnGeneral->getdato_general_usuario(),$this->dato_general_usuarioActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeydato_general_usuario($this->dato_general_usuarioReturnGeneral->getdato_general_usuario());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariodato_general_usuario($this->dato_general_usuarioReturnGeneral->getdato_general_usuario());*/
				}
					
				if($this->dato_general_usuarioReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->dato_general_usuarioReturnGeneral->getdato_general_usuario(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->dato_general_usuario,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(dato_general_usuarioJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualdato_general_usuario(this.dato_general_usuario,true);
				this.setVariablesFormularioToObjetoActualForeignKeysdato_general_usuario(this.dato_general_usuario);				
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
				
				if($this->dato_general_usuarioAnterior!=null) {
					$this->dato_general_usuario=$this->dato_general_usuarioAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->dato_general_usuarioReturnGeneral=$this->dato_general_usuarioLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->dato_general_usuarioLogic->getdato_general_usuarios(),$this->dato_general_usuario,$this->dato_general_usuarioParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->dato_general_usuarioReturnGeneral->getdato_general_usuario(),$this->dato_general_usuarioLogic->getdato_general_usuarios());
			*/
		}
		
		return $this->dato_general_usuarioReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}

			$this->dato_general_usuarioReturnGeneral=new dato_general_usuario_param_return();			
			$this->dato_general_usuarioParameterGeneral=new dato_general_usuario_param_return();
			
			$this->dato_general_usuarioParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->dato_general_usuarioReturnGeneral=$this->dato_general_usuarioLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->dato_general_usuarios,$this->dato_general_usuarioParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->dato_general_usuarioReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->dato_general_usuarioReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->dato_general_usuarioReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
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
		
		$this->dato_general_usuarioReturnGeneral=new dato_general_usuario_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_dato_general_usuario') {
		    $sDominio='dato_general_usuario';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->dato_general_usuarioReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->dato_general_usuarioReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='dato_general_usuario';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='dato_general_usuario';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='dato_general_usuario';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->dato_general_usuarioReturnGeneral=new dato_general_usuario_param_return();
		$this->dato_general_usuarioParameterGeneral=new dato_general_usuario_param_return();
			
		$this->dato_general_usuarioParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->dato_general_usuarioReturnGeneral=$this->dato_general_usuarioLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->dato_general_usuarioLogic->getdato_general_usuarios(),$this->dato_general_usuario,$this->dato_general_usuarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->dato_general_usuarioReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->dato_general_usuarioReturnGeneral->getdato_general_usuario(),$classes);*/
		}									
	
		if($this->dato_general_usuarioReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->dato_general_usuarioReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->dato_general_usuarioReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $dato_general_usuarios,dato_general_usuario $dato_general_usuario) {
		
		$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));
						
		if($dato_general_usuario_session==null) {
			$dato_general_usuario_session=new dato_general_usuario_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(dato_general_usuario_util::$CLASSNAME);
			}	
			*/
			
			$this->dato_general_usuarioReturnGeneral=new dato_general_usuario_param_return();
			$this->dato_general_usuarioParameterGeneral=new dato_general_usuario_param_return();
			
			$this->dato_general_usuarioParameterGeneral->setdata($this->data);
		
		
			
		if($dato_general_usuario_session->conGuardarRelaciones) {
			$classes=dato_general_usuario_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->dato_general_usuarioActual,$this->dato_general_usuario,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->dato_general_usuarioReturnGeneral=$this->dato_general_usuarioLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->dato_general_usuarioLogic->getdato_general_usuarios(),$this->dato_general_usuarioActual,$this->dato_general_usuarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->dato_general_usuarioReturnGeneral=$this->dato_general_usuarioLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$dato_general_usuarios,$dato_general_usuario,$this->dato_general_usuarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModeldato_general_usuario($this->dato_general_usuarioLogic->getdato_general_usuario());*/
			
			$this->dato_general_usuario=$this->dato_general_usuarioLogic->getdato_general_usuario();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->dato_general_usuario);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$dato_general_usuarioActual=new dato_general_usuario();
			
			if($this->dato_general_usuarioClase==null) {		
				$this->dato_general_usuarioClase=new dato_general_usuario();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$dato_general_usuarioActual=$this->dato_general_usuarios[$indice];*/
				
				$dato_general_usuarioActual->setId($this->data['t'.$this->strSufijo]['cel_'.$i.'_0']);
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $dato_general_usuarioActual->setid_pais((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $dato_general_usuarioActual->setid_provincia((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $dato_general_usuarioActual->setid_ciudad((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $dato_general_usuarioActual->setcedula($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $dato_general_usuarioActual->setapellidos($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $dato_general_usuarioActual->setnombres($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $dato_general_usuarioActual->settelefono($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $dato_general_usuarioActual->settelefono_movil($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $dato_general_usuarioActual->sete_mail($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $dato_general_usuarioActual->seturl($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $dato_general_usuarioActual->setfecha_nacimiento(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $dato_general_usuarioActual->setdireccion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }

				$this->dato_general_usuarioClase=$dato_general_usuarioActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->dato_general_usuarioModel->set($this->dato_general_usuarioClase);
				
				/*$this->dato_general_usuarioModel->set($this->migrarModeldato_general_usuario($this->dato_general_usuarioClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->dato_general_usuarios=$this->migrarModeldato_general_usuario($this->dato_general_usuarioLogic->getdato_general_usuarios());							
		$this->dato_general_usuarios=$this->dato_general_usuarioLogic->getdato_general_usuarios();*/
		
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
			$this->Session->write(dato_general_usuario_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$dato_general_usuario_control_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($dato_general_usuario_control_session==null) {
				$dato_general_usuario_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($dato_general_usuario_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(dato_general_usuario_util::$STR_SESSION_NAME,$this);*/
		} else {
			$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));
			
			if($dato_general_usuario_session==null) {
				$dato_general_usuario_session=new dato_general_usuario_session();
			}
			
			$this->set(dato_general_usuario_util::$STR_SESSION_NAME, $dato_general_usuario_session);
		}
	}
	
	public function setCopiarVariablesObjetos(dato_general_usuario $dato_general_usuarioOrigen,dato_general_usuario $dato_general_usuario,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($dato_general_usuario==null) {
				$dato_general_usuario=new dato_general_usuario();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $dato_general_usuarioOrigen->getId()!=null && $dato_general_usuarioOrigen->getId()!=-1)) {$dato_general_usuario->setId($dato_general_usuarioOrigen->getId());}}
			if($conDefault || ($conDefault==false && $dato_general_usuarioOrigen->getid_pais()!=null && $dato_general_usuarioOrigen->getid_pais()!=-1)) {$dato_general_usuario->setid_pais($dato_general_usuarioOrigen->getid_pais());}
			if($conDefault || ($conDefault==false && $dato_general_usuarioOrigen->getid_provincia()!=null && $dato_general_usuarioOrigen->getid_provincia()!=-1)) {$dato_general_usuario->setid_provincia($dato_general_usuarioOrigen->getid_provincia());}
			if($conDefault || ($conDefault==false && $dato_general_usuarioOrigen->getid_ciudad()!=null && $dato_general_usuarioOrigen->getid_ciudad()!=-1)) {$dato_general_usuario->setid_ciudad($dato_general_usuarioOrigen->getid_ciudad());}
			if($conDefault || ($conDefault==false && $dato_general_usuarioOrigen->getcedula()!=null && $dato_general_usuarioOrigen->getcedula()!='')) {$dato_general_usuario->setcedula($dato_general_usuarioOrigen->getcedula());}
			if($conDefault || ($conDefault==false && $dato_general_usuarioOrigen->getapellidos()!=null && $dato_general_usuarioOrigen->getapellidos()!='')) {$dato_general_usuario->setapellidos($dato_general_usuarioOrigen->getapellidos());}
			if($conDefault || ($conDefault==false && $dato_general_usuarioOrigen->getnombres()!=null && $dato_general_usuarioOrigen->getnombres()!='')) {$dato_general_usuario->setnombres($dato_general_usuarioOrigen->getnombres());}
			if($conDefault || ($conDefault==false && $dato_general_usuarioOrigen->gettelefono()!=null && $dato_general_usuarioOrigen->gettelefono()!='')) {$dato_general_usuario->settelefono($dato_general_usuarioOrigen->gettelefono());}
			if($conDefault || ($conDefault==false && $dato_general_usuarioOrigen->gettelefono_movil()!=null && $dato_general_usuarioOrigen->gettelefono_movil()!='')) {$dato_general_usuario->settelefono_movil($dato_general_usuarioOrigen->gettelefono_movil());}
			if($conDefault || ($conDefault==false && $dato_general_usuarioOrigen->gete_mail()!=null && $dato_general_usuarioOrigen->gete_mail()!='')) {$dato_general_usuario->sete_mail($dato_general_usuarioOrigen->gete_mail());}
			if($conDefault || ($conDefault==false && $dato_general_usuarioOrigen->geturl()!=null && $dato_general_usuarioOrigen->geturl()!='')) {$dato_general_usuario->seturl($dato_general_usuarioOrigen->geturl());}
			if($conDefault || ($conDefault==false && $dato_general_usuarioOrigen->getfecha_nacimiento()!=null && $dato_general_usuarioOrigen->getfecha_nacimiento()!=date('Y-m-d'))) {$dato_general_usuario->setfecha_nacimiento($dato_general_usuarioOrigen->getfecha_nacimiento());}
			if($conDefault || ($conDefault==false && $dato_general_usuarioOrigen->getdireccion()!=null && $dato_general_usuarioOrigen->getdireccion()!='')) {$dato_general_usuario->setdireccion($dato_general_usuarioOrigen->getdireccion());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$dato_general_usuariosSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$dato_general_usuariosSeleccionados[]=$this->dato_general_usuarios[$indice];
			}
		}
		
		return $dato_general_usuariosSeleccionados;
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
		$dato_general_usuario= new dato_general_usuario();
		
		foreach($this->dato_general_usuarioLogic->getdato_general_usuarios() as $dato_general_usuario) {
			
		}		
		
		if($dato_general_usuario!=null);
	}
	
	public function cargarRelaciones(array $dato_general_usuarios=array()) : array {	
		
		$dato_general_usuariosRespaldo = array();
		$dato_general_usuariosLocal = array();
		
		dato_general_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$dato_general_usuariosResp=array();
		$classes=array();
			
		
			
			
		$dato_general_usuariosRespaldo=$this->dato_general_usuarioLogic->getdato_general_usuarios();
			
		$this->dato_general_usuarioLogic->setIsConDeep(true);
		
		$this->dato_general_usuarioLogic->setdato_general_usuarios($dato_general_usuarios);
			
		$this->dato_general_usuarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$dato_general_usuariosLocal=$this->dato_general_usuarioLogic->getdato_general_usuarios();
			
		/*RESPALDO*/
		$this->dato_general_usuarioLogic->setdato_general_usuarios($dato_general_usuariosRespaldo);
			
		$this->dato_general_usuarioLogic->setIsConDeep(false);
		
		if($dato_general_usuariosResp!=null);
		
		return $dato_general_usuariosLocal;
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
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(dato_general_usuario_session $dato_general_usuario_session) {
		$dato_general_usuario_session->strTypeOnLoad=$this->strTypeOnLoaddato_general_usuario;
		$dato_general_usuario_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliardato_general_usuario;
		$dato_general_usuario_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliardato_general_usuario;
		$dato_general_usuario_session->bitEsPopup=$this->bitEsPopup;
		$dato_general_usuario_session->bitEsBusqueda=$this->bitEsBusqueda;
		$dato_general_usuario_session->strFuncionJs=$this->strFuncionJs;
		/*$dato_general_usuario_session->strSufijo=$this->strSufijo;*/
		$dato_general_usuario_session->bitEsRelaciones=$this->bitEsRelaciones;
		$dato_general_usuario_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, dato_general_usuario_util::$STR_NOMBRE_CLASE,0,false,false);				
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
		$dato_general_usuarioViewAdditional=new dato_general_usuarioView_add();
		$dato_general_usuarioViewAdditional->dato_general_usuarios=$this->dato_general_usuarios;
		$dato_general_usuarioViewAdditional->Session=$this->Session;
		
		return $dato_general_usuarioViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$dato_general_usuariosLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$dato_general_usuariosLocal=$this->dato_general_usuarios;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$dato_general_usuariosLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($dato_general_usuariosLocal)<=0) {
					$dato_general_usuariosLocal=$this->dato_general_usuarios;
				}
			} else {
				$dato_general_usuariosLocal=$this->dato_general_usuarios;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliardato_general_usuariosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliardato_general_usuariosAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$dato_general_usuarioLogic=new dato_general_usuario_logic();
		$dato_general_usuarioLogic->setdato_general_usuarios($this->dato_general_usuarios);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		 
			
		
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('pais');$classes[]=$class;
			$class=new Classe('provincia');$classes[]=$class;
			$class=new Classe('ciudad');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$dato_general_usuarioLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->dato_general_usuarios=$dato_general_usuarioLogic->getdato_general_usuarios();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->dato_general_usuariosLocal=$this->dato_general_usuarios;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=dato_general_usuario_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=dato_general_usuario_util::$STR_TABLE_NAME;		
			
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
			
			$dato_general_usuarios = $this->dato_general_usuarios;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = dato_general_usuario_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = dato_general_usuario_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/seguridad/presentation/templating/dato_general_usuario_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->dato_general_usuarios=$dato_general_usuarios;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->dato_general_usuariosLocal=$dato_general_usuariosLocal;
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
		
		$dato_general_usuariosLocal=array();
		
		$dato_general_usuariosLocal=$this->dato_general_usuarios;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliardato_general_usuariosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliardato_general_usuariosAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$dato_general_usuarioLogic=new dato_general_usuario_logic();
		$dato_general_usuarioLogic->setdato_general_usuarios($this->dato_general_usuarios);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		 
			
		
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('pais');$classes[]=$class;
			$class=new Classe('provincia');$classes[]=$class;
			$class=new Classe('ciudad');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$dato_general_usuarioLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->dato_general_usuarios=$dato_general_usuarioLogic->getdato_general_usuarios();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$dato_general_usuarios = $this->dato_general_usuarios;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = dato_general_usuario_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = dato_general_usuario_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/seguridad/presentation/templating/dato_general_usuario_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->dato_general_usuarios=$dato_general_usuarios;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->dato_general_usuariosLocal=$dato_general_usuariosLocal;
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
	
	public function getHtmlTablaDatosResumen(array $dato_general_usuarios=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->dato_general_usuariosReporte = $dato_general_usuarios;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliardato_general_usuariosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliardato_general_usuariosAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $dato_general_usuarios=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->dato_general_usuariosReporte = $dato_general_usuarios;		
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
		
		
		$this->dato_general_usuariosReporte=$this->cargarRelaciones($dato_general_usuarios);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliardato_general_usuariosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliardato_general_usuariosAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(dato_general_usuario $dato_general_usuario=null) : string {	
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
			
			
			$dato_general_usuariosLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$dato_general_usuariosLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($dato_general_usuariosLocal)<=0) {
					/*//DEBE ESCOGER
					$dato_general_usuariosLocal=$this->dato_general_usuarios;*/
				}
			} else {
				/*//DEBE ESCOGER
				$dato_general_usuariosLocal=$this->dato_general_usuarios;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($dato_general_usuariosLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($dato_general_usuariosLocal,true);
			
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
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}
					
			$dato_general_usuariosLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$dato_general_usuariosLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($dato_general_usuariosLocal)<=0) {
					/*//DEBE ESCOGER
					$dato_general_usuariosLocal=$this->dato_general_usuarios;*/
				}
			} else {
				/*//DEBE ESCOGER
				$dato_general_usuariosLocal=$this->dato_general_usuarios;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($dato_general_usuariosLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($dato_general_usuariosLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Dato General Usuarios';
			
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
			$fileName='dato_general_usuario';
			
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
			
			$title='Reporte de  Dato General Usuarios';
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
			
			$title='Reporte de  Dato General Usuarios';
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
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Dato General Usuarios';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=dato_general_usuario_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->dato_general_usuariosAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->dato_general_usuariosAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->dato_general_usuariosAuxiliar)<=0) {
					$this->dato_general_usuariosAuxiliar=$this->dato_general_usuarios;
				}
			} else {
				$this->dato_general_usuariosAuxiliar=$this->dato_general_usuarios;
			}
		/*} else {
			$this->dato_general_usuariosAuxiliar=$this->dato_general_usuariosReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->dato_general_usuariosAuxiliar as $dato_general_usuario) {
				$row=array();
				
				$row=dato_general_usuario_util::getDataReportRow($tipo,$dato_general_usuario,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			dato_general_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$dato_general_usuariosResp=array();
			$classes=array();
			
			
			
			
			$dato_general_usuariosResp=$this->dato_general_usuarioLogic->getdato_general_usuarios();
			
			$this->dato_general_usuarioLogic->setIsConDeep(true);
			
			$this->dato_general_usuarioLogic->setdato_general_usuarios($this->dato_general_usuariosAuxiliar);
			
			$this->dato_general_usuarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->dato_general_usuariosAuxiliar=$this->dato_general_usuarioLogic->getdato_general_usuarios();
			
			//RESPALDO
			$this->dato_general_usuarioLogic->setdato_general_usuarios($dato_general_usuariosResp);
			
			$this->dato_general_usuarioLogic->setIsConDeep(false);
			*/
			
			$this->dato_general_usuariosAuxiliar=$this->cargarRelaciones($this->dato_general_usuariosAuxiliar);
			
			$i=0;
			
			foreach ($this->dato_general_usuariosAuxiliar as $dato_general_usuario) {
				$row=array();
				
				if($i!=0) {
					$row=dato_general_usuario_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=dato_general_usuario_util::getDataReportRow($tipo,$dato_general_usuario,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
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
		$this->dato_general_usuariosAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->dato_general_usuariosAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->dato_general_usuariosAuxiliar)<=0) {
					$this->dato_general_usuariosAuxiliar=$this->dato_general_usuarios;
				}
			} else {
				$this->dato_general_usuariosAuxiliar=$this->dato_general_usuarios;
			}
		/*} else {
			$this->dato_general_usuariosAuxiliar=$this->dato_general_usuariosReporte;	
		}*/
		
		foreach ($this->dato_general_usuariosAuxiliar as $dato_general_usuario) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(dato_general_usuario_util::getdato_general_usuarioDescripcion($dato_general_usuario),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Pais',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Pais',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($dato_general_usuario->getid_paisDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Provincia',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Provincia',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($dato_general_usuario->getid_provinciaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ciudad',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ciudad',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($dato_general_usuario->getid_ciudadDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cedula',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cedula',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($dato_general_usuario->getcedula(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Apellidos',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Apellidos',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($dato_general_usuario->getapellidos(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombres',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombres',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($dato_general_usuario->getnombres(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Telefono',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Telefono',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($dato_general_usuario->gettelefono(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Telefono Movil',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Telefono Movil',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($dato_general_usuario->gettelefono_movil(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('E Mail',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('E Mail',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($dato_general_usuario->gete_mail(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Url',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Url',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($dato_general_usuario->geturl(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Nacimiento',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Nacimiento',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($dato_general_usuario->getfecha_nacimiento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Direccion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Direccion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($dato_general_usuario->getdireccion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface dato_general_usuario_base_controlI {			
		
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
		public function getIndiceActual(dato_general_usuario $dato_general_usuario,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(dato_general_usuario $dato_general_usuario,array $dato_general_usuarios);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : dato_general_usuario_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $dato_general_usuarios,dato_general_usuario $dato_general_usuario);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(dato_general_usuario_param_return $dato_general_usuarioReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(dato_general_usuario_session $dato_general_usuario_session);		
		public function actualizarInvitadoSessionDivStyleVariables(dato_general_usuario_session $dato_general_usuario_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(dato_general_usuario $dato_general_usuarioOrigen,dato_general_usuario $dato_general_usuario,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(dato_general_usuario_control $dato_general_usuario_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $dato_general_usuarios=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(dato_general_usuario_session $dato_general_usuario_session);		
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
		public function getHtmlTablaDatosResumen(array $dato_general_usuarios=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $dato_general_usuarios=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(dato_general_usuario $dato_general_usuario=null) : string;
		
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
