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

namespace com\bydan\contabilidad\seguridad\opcion\presentation\control;

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

use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/opcion/util/opcion_carga.php');
use com\bydan\contabilidad\seguridad\opcion\util\opcion_carga;

use com\bydan\contabilidad\seguridad\opcion\util\opcion_util;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_param_return;
use com\bydan\contabilidad\seguridad\opcion\business\logic\opcion_logic;
use com\bydan\contabilidad\seguridad\opcion\presentation\session\opcion_session;


//FK


use com\bydan\contabilidad\seguridad\sistema\business\entity\sistema;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_carga;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_util;

use com\bydan\contabilidad\seguridad\grupo_opcion\business\entity\grupo_opcion;
use com\bydan\contabilidad\seguridad\grupo_opcion\business\logic\grupo_opcion_logic;
use com\bydan\contabilidad\seguridad\grupo_opcion\util\grupo_opcion_carga;
use com\bydan\contabilidad\seguridad\grupo_opcion\util\grupo_opcion_util;

use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\modulo\business\logic\modulo_logic;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;

//REL


use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;
use com\bydan\contabilidad\seguridad\perfil\presentation\session\perfil_session;

use com\bydan\contabilidad\seguridad\accion\util\accion_carga;
use com\bydan\contabilidad\seguridad\accion\util\accion_util;
use com\bydan\contabilidad\seguridad\accion\presentation\session\accion_session;

use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_carga;
use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_util;
use com\bydan\contabilidad\seguridad\perfil_opcion\presentation\session\perfil_opcion_session;

use com\bydan\contabilidad\seguridad\campo\util\campo_carga;
use com\bydan\contabilidad\seguridad\campo\util\campo_util;
use com\bydan\contabilidad\seguridad\campo\presentation\session\campo_session;


/*CARGA ARCHIVOS FRAMEWORK*/
opcion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
opcion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class opcion_base_control extends opcion_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->opcionClase==null) {		
				$this->opcionClase=new opcion();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sistema')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_sistema',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_opcion')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_opcion',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_grupo_opcion')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_grupo_opcion',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_modulo')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_modulo',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->opcionClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->opcionClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->opcionClase->setid_sistema((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sistema'));
				
				$this->opcionClase->setid_opcion((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_opcion'));
				
				$this->opcionClase->setid_grupo_opcion((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_grupo_opcion'));
				
				$this->opcionClase->setid_modulo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_modulo'));
				
				$this->opcionClase->setcodigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo'));
				
				$this->opcionClase->setnombre($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre'));
				
				$this->opcionClase->setposicion((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'posicion'));
				
				$this->opcionClase->seticon_name($this->getDataCampoFormTabla('form'.$this->strSufijo,'icon_name'));
				
				$this->opcionClase->setnombre_clase($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre_clase'));
				
				$this->opcionClase->setmodulo0($this->getDataCampoFormTabla('form'.$this->strSufijo,'modulo0'));
				
				$this->opcionClase->setsub_modulo($this->getDataCampoFormTabla('form'.$this->strSufijo,'sub_modulo'));
				
				$this->opcionClase->setpaquete($this->getDataCampoFormTabla('form'.$this->strSufijo,'paquete'));
				
				$this->opcionClase->setes_para_menu(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'es_para_menu')));
				
				$this->opcionClase->setes_guardar_relaciones(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'es_guardar_relaciones')));
				
				$this->opcionClase->setcon_mostrar_acciones_campo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_mostrar_acciones_campo')));
				
				$this->opcionClase->setestado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'estado')));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->opcionModel->set($this->opcionClase);
				
				/*$this->opcionModel->set($this->migrarModelopcion($this->opcionClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->opcionLogic->getopcion()->setId($this->opcionClase->getId());	
			$this->opcionLogic->getopcion()->setVersionRow($this->opcionClase->getVersionRow());	
			$this->opcionLogic->getopcion()->setVersionRow($this->opcionClase->getVersionRow());	
			$this->opcionLogic->getopcion()->setid_sistema($this->opcionClase->getid_sistema());	
			$this->opcionLogic->getopcion()->setid_opcion($this->opcionClase->getid_opcion());	
			$this->opcionLogic->getopcion()->setid_grupo_opcion($this->opcionClase->getid_grupo_opcion());	
			$this->opcionLogic->getopcion()->setid_modulo($this->opcionClase->getid_modulo());	
			$this->opcionLogic->getopcion()->setcodigo($this->opcionClase->getcodigo());	
			$this->opcionLogic->getopcion()->setnombre($this->opcionClase->getnombre());	
			$this->opcionLogic->getopcion()->setposicion($this->opcionClase->getposicion());	
			$this->opcionLogic->getopcion()->seticon_name($this->opcionClase->geticon_name());	
			$this->opcionLogic->getopcion()->setnombre_clase($this->opcionClase->getnombre_clase());	
			$this->opcionLogic->getopcion()->setmodulo0($this->opcionClase->getmodulo0());	
			$this->opcionLogic->getopcion()->setsub_modulo($this->opcionClase->getsub_modulo());	
			$this->opcionLogic->getopcion()->setpaquete($this->opcionClase->getpaquete());	
			$this->opcionLogic->getopcion()->setes_para_menu($this->opcionClase->getes_para_menu());	
			$this->opcionLogic->getopcion()->setes_guardar_relaciones($this->opcionClase->getes_guardar_relaciones());	
			$this->opcionLogic->getopcion()->setcon_mostrar_acciones_campo($this->opcionClase->getcon_mostrar_acciones_campo());	
			$this->opcionLogic->getopcion()->setestado($this->opcionClase->getestado());	
		} else {
			$this->opcionClase->setId($this->opcionLogic->getopcion()->getId());	
			$this->opcionClase->setVersionRow($this->opcionLogic->getopcion()->getVersionRow());	
			$this->opcionClase->setVersionRow($this->opcionLogic->getopcion()->getVersionRow());	
			$this->opcionClase->setid_sistema($this->opcionLogic->getopcion()->getid_sistema());	
			$this->opcionClase->setid_opcion($this->opcionLogic->getopcion()->getid_opcion());	
			$this->opcionClase->setid_grupo_opcion($this->opcionLogic->getopcion()->getid_grupo_opcion());	
			$this->opcionClase->setid_modulo($this->opcionLogic->getopcion()->getid_modulo());	
			$this->opcionClase->setcodigo($this->opcionLogic->getopcion()->getcodigo());	
			$this->opcionClase->setnombre($this->opcionLogic->getopcion()->getnombre());	
			$this->opcionClase->setposicion($this->opcionLogic->getopcion()->getposicion());	
			$this->opcionClase->seticon_name($this->opcionLogic->getopcion()->geticon_name());	
			$this->opcionClase->setnombre_clase($this->opcionLogic->getopcion()->getnombre_clase());	
			$this->opcionClase->setmodulo0($this->opcionLogic->getopcion()->getmodulo0());	
			$this->opcionClase->setsub_modulo($this->opcionLogic->getopcion()->getsub_modulo());	
			$this->opcionClase->setpaquete($this->opcionLogic->getopcion()->getpaquete());	
			$this->opcionClase->setes_para_menu($this->opcionLogic->getopcion()->getes_para_menu());	
			$this->opcionClase->setes_guardar_relaciones($this->opcionLogic->getopcion()->getes_guardar_relaciones());	
			$this->opcionClase->setcon_mostrar_acciones_campo($this->opcionLogic->getopcion()->getcon_mostrar_acciones_campo());	
			$this->opcionClase->setestado($this->opcionLogic->getopcion()->getestado());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->opcionModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_sistema') {$this->strMensajeid_sistema=$strMensajeCampo;}
		if($strNombreCampo=='id_opcion') {$this->strMensajeid_opcion=$strMensajeCampo;}
		if($strNombreCampo=='id_grupo_opcion') {$this->strMensajeid_grupo_opcion=$strMensajeCampo;}
		if($strNombreCampo=='id_modulo') {$this->strMensajeid_modulo=$strMensajeCampo;}
		if($strNombreCampo=='codigo') {$this->strMensajecodigo=$strMensajeCampo;}
		if($strNombreCampo=='nombre') {$this->strMensajenombre=$strMensajeCampo;}
		if($strNombreCampo=='posicion') {$this->strMensajeposicion=$strMensajeCampo;}
		if($strNombreCampo=='icon_name') {$this->strMensajeicon_name=$strMensajeCampo;}
		if($strNombreCampo=='nombre_clase') {$this->strMensajenombre_clase=$strMensajeCampo;}
		if($strNombreCampo=='modulo0') {$this->strMensajemodulo0=$strMensajeCampo;}
		if($strNombreCampo=='sub_modulo') {$this->strMensajesub_modulo=$strMensajeCampo;}
		if($strNombreCampo=='paquete') {$this->strMensajepaquete=$strMensajeCampo;}
		if($strNombreCampo=='es_para_menu') {$this->strMensajees_para_menu=$strMensajeCampo;}
		if($strNombreCampo=='es_guardar_relaciones') {$this->strMensajees_guardar_relaciones=$strMensajeCampo;}
		if($strNombreCampo=='con_mostrar_acciones_campo') {$this->strMensajecon_mostrar_acciones_campo=$strMensajeCampo;}
		if($strNombreCampo=='estado') {$this->strMensajeestado=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_sistema='';
		$this->strMensajeid_opcion='';
		$this->strMensajeid_grupo_opcion='';
		$this->strMensajeid_modulo='';
		$this->strMensajecodigo='';
		$this->strMensajenombre='';
		$this->strMensajeposicion='';
		$this->strMensajeicon_name='';
		$this->strMensajenombre_clase='';
		$this->strMensajemodulo0='';
		$this->strMensajesub_modulo='';
		$this->strMensajepaquete='';
		$this->strMensajees_para_menu='';
		$this->strMensajees_guardar_relaciones='';
		$this->strMensajecon_mostrar_acciones_campo='';
		$this->strMensajeestado='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
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
				$this->opcionLogic->getNewConnexionToDeep();
			}

			$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));
						
			if($opcion_session==null) {
				$opcion_session=new opcion_session();
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
						$this->opcionLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->opcionActual =$this->opcionClase;
			
			/*$this->opcionActual =$this->migrarModelopcion($this->opcionClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->opcionLogic->getopcions(),$this->opcionActual);
			
			$this->actualizarControllerConReturnGeneral($this->opcionReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
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
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$opcionsLocal=$this->getListaActual();
		
		$iIndice=opcion_util::getIndiceNuevo($opcionsLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(opcion $opcion,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$opcionsLocal=$this->getListaActual();
		
		$iIndice=opcion_util::getIndiceActual($opcionsLocal,$opcion,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevoopcion')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->opcionActual =$this->opcionClase;
			
			/*$this->opcionActual =$this->migrarModelopcion($this->opcionClase);*/
			
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
			
			$this->opcionLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('sistema');$classes[]=$class;
				$class=new Classe('opcion');$classes[]=$class;
				$class=new Classe('grupo_opcion');$classes[]=$class;
				$class=new Classe('modulo');$classes[]=$class;
			
			$this->opcionLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->opcionLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->opcionLogic->setopcion(new opcion());
				
				$this->opcionLogic->getopcion()->setIsNew(true);
				$this->opcionLogic->getopcion()->setIsChanged(true);
				$this->opcionLogic->getopcion()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->opcionModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->opcionLogic->opcions[]=$this->opcionLogic->getopcion();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->opcionLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							opcion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$opcions=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME.'Lista'));
							$opcionsEliminados=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$opcions=array_merge($opcions,$opcionsEliminados);
							opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							accion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$accions=unserialize($this->Session->read(accion_util::$STR_SESSION_NAME.'Lista'));
							$accionsEliminados=unserialize($this->Session->read(accion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$accions=array_merge($accions,$accionsEliminados);
							opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							perfil_opcion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$perfilopcions=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME.'Lista'));
							$perfilopcionsEliminados=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$perfilopcions=array_merge($perfilopcions,$perfilopcionsEliminados);
							opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							campo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$campos=unserialize($this->Session->read(campo_util::$STR_SESSION_NAME.'Lista'));
							$camposEliminados=unserialize($this->Session->read(campo_util::$STR_SESSION_NAME.'ListaEliminados'));
							$campos=array_merge($campos,$camposEliminados);
							
							$this->opcionLogic->saveRelaciones($this->opcionLogic->getopcion(),$opcions,$accions,$perfilopcions,$campos);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->opcionLogic->getopcion()->setIsChanged(true);
				$this->opcionLogic->getopcion()->setIsNew(false);
				$this->opcionLogic->getopcion()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->opcionModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->opcionLogic->getopcion(),$this->opcionLogic->getopcions());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->opcionLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							opcion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$opcions=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME.'Lista'));
							$opcionsEliminados=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$opcions=array_merge($opcions,$opcionsEliminados);
							opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							accion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$accions=unserialize($this->Session->read(accion_util::$STR_SESSION_NAME.'Lista'));
							$accionsEliminados=unserialize($this->Session->read(accion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$accions=array_merge($accions,$accionsEliminados);
							opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							perfil_opcion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$perfilopcions=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME.'Lista'));
							$perfilopcionsEliminados=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$perfilopcions=array_merge($perfilopcions,$perfilopcionsEliminados);
							opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							campo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$campos=unserialize($this->Session->read(campo_util::$STR_SESSION_NAME.'Lista'));
							$camposEliminados=unserialize($this->Session->read(campo_util::$STR_SESSION_NAME.'ListaEliminados'));
							$campos=array_merge($campos,$camposEliminados);
							
							$this->opcionLogic->saveRelaciones($this->opcionLogic->getopcion(),$opcions,$accions,$perfilopcions,$campos);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->opcionLogic->getopcion()->setIsDeleted(true);
				$this->opcionLogic->getopcion()->setIsNew(false);
				$this->opcionLogic->getopcion()->setIsChanged(false);				
				
				$this->actualizarLista($this->opcionLogic->getopcion(),$this->opcionLogic->getopcions());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->opcionLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							opcion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$opcions=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME.'Lista'));
							$opcionsEliminados=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$opcions=array_merge($opcions,$opcionsEliminados);

							foreach($opcions as $opcion1) {
								$opcion1->setIsDeleted(true);
							}
							opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							accion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$accions=unserialize($this->Session->read(accion_util::$STR_SESSION_NAME.'Lista'));
							$accionsEliminados=unserialize($this->Session->read(accion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$accions=array_merge($accions,$accionsEliminados);

							foreach($accions as $accion1) {
								$accion1->setIsDeleted(true);
							}
							opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							perfil_opcion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$perfilopcions=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME.'Lista'));
							$perfilopcionsEliminados=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$perfilopcions=array_merge($perfilopcions,$perfilopcionsEliminados);

							foreach($perfilopcions as $perfilopcion1) {
								$perfilopcion1->setIsDeleted(true);
							}
							opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							campo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$campos=unserialize($this->Session->read(campo_util::$STR_SESSION_NAME.'Lista'));
							$camposEliminados=unserialize($this->Session->read(campo_util::$STR_SESSION_NAME.'ListaEliminados'));
							$campos=array_merge($campos,$camposEliminados);

							foreach($campos as $campo1) {
								$campo1->setIsDeleted(true);
							}
							
						$this->opcionLogic->saveRelaciones($this->opcionLogic->getopcion(),$opcions,$accions,$perfilopcions,$campos);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->opcionsEliminados[]=$this->opcionLogic->getopcion();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->opcionLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							opcion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$opcions=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME.'Lista'));
							$opcionsEliminados=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$opcions=array_merge($opcions,$opcionsEliminados);
							opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							accion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$accions=unserialize($this->Session->read(accion_util::$STR_SESSION_NAME.'Lista'));
							$accionsEliminados=unserialize($this->Session->read(accion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$accions=array_merge($accions,$accionsEliminados);
							opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							perfil_opcion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$perfilopcions=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME.'Lista'));
							$perfilopcionsEliminados=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$perfilopcions=array_merge($perfilopcions,$perfilopcionsEliminados);
							opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							campo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$campos=unserialize($this->Session->read(campo_util::$STR_SESSION_NAME.'Lista'));
							$camposEliminados=unserialize($this->Session->read(campo_util::$STR_SESSION_NAME.'ListaEliminados'));
							$campos=array_merge($campos,$camposEliminados);
							
						$this->opcionLogic->saveRelaciones($this->opcionLogic->getopcion(),$opcions,$accions,$perfilopcions,$campos);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->opcionsEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->opcionLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->opcionLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->opcionsEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('sistema');$classes[]=$class;
				$class=new Classe('opcion');$classes[]=$class;
				$class=new Classe('grupo_opcion');$classes[]=$class;
				$class=new Classe('modulo');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->opcionLogic->setopcions();*/
					
					$this->opcionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->opcionLogic->setIsConDeepLoad(false);
			
			$this->opcions=$this->opcionLogic->getopcions();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(opcion_util::$STR_SESSION_NAME.'Lista',serialize($this->opcions));
				$this->Session->write(opcion_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->opcionsEliminados));
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
				$this->opcionLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
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
				$this->opcionLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalopcion;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->opcionLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->opcions as $opcionLocal) {
				if($this->opcionLogic->getopcion()->getId()==$opcionLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->opcionLogic->getopcion()->setIsDeleted(true);
			$this->opcionsEliminados[]=$this->opcionLogic->getopcion();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->opcions[$indice]);
				
				$this->opcions = array_values($this->opcions);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelopcion($this->opcionClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(opcion $opcion,array $opcions) {
		try {
			foreach($opcions as $opcionLocal){ 
				if($opcionLocal->getId()==$opcion->getId()) {
					$opcionLocal->setIsChanged($opcion->getIsChanged());
					$opcionLocal->setIsNew($opcion->getIsNew());
					$opcionLocal->setIsDeleted($opcion->getIsDeleted());
					//$opcionLocal->setbitExpired($opcion->getbitExpired());
					
					$opcionLocal->setId($opcion->getId());	
					$opcionLocal->setVersionRow($opcion->getVersionRow());	
					$opcionLocal->setVersionRow($opcion->getVersionRow());	
					$opcionLocal->setid_sistema($opcion->getid_sistema());	
					$opcionLocal->setid_opcion($opcion->getid_opcion());	
					$opcionLocal->setid_grupo_opcion($opcion->getid_grupo_opcion());	
					$opcionLocal->setid_modulo($opcion->getid_modulo());	
					$opcionLocal->setcodigo($opcion->getcodigo());	
					$opcionLocal->setnombre($opcion->getnombre());	
					$opcionLocal->setposicion($opcion->getposicion());	
					$opcionLocal->seticon_name($opcion->geticon_name());	
					$opcionLocal->setnombre_clase($opcion->getnombre_clase());	
					$opcionLocal->setmodulo0($opcion->getmodulo0());	
					$opcionLocal->setsub_modulo($opcion->getsub_modulo());	
					$opcionLocal->setpaquete($opcion->getpaquete());	
					$opcionLocal->setes_para_menu($opcion->getes_para_menu());	
					$opcionLocal->setes_guardar_relaciones($opcion->getes_guardar_relaciones());	
					$opcionLocal->setcon_mostrar_acciones_campo($opcion->getcon_mostrar_acciones_campo());	
					$opcionLocal->setestado($opcion->getestado());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$opcionsLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$opcionsLocal=$this->opcionLogic->getopcions();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$opcionsLocal=$this->opcions;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $opcionsLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->opcionLogic->getopcions() as $opcion) {
				if($opcion->getId()==$id) {
					$this->opcionLogic->setopcion($opcion);
					
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
		/*$opcionsSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->opcions as $opcion) {
			$opcion->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->opcions[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : opcion_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));
						
		if($opcion_session==null) {
			$opcion_session=new opcion_session();
		}
		
		
		$this->opcionReturnGeneral=new opcion_param_return();
		$this->opcionParameterGeneral=new opcion_param_return();
			
		$this->opcionParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualopcion(this.opcion,true);
			this.setVariablesFormularioToObjetoActualForeignKeysopcion(this.opcion);*/
			
			if($opcion_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualopcion(this.opcion,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->opcionActual=$this->opcionClase;
				
				$this->setCopiarVariablesObjetos($this->opcionActual,$this->opcion,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->opcionReturnGeneral=$this->opcionLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->opcionLogic->getopcions(),$this->opcion,$this->opcionParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($opcion_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanopcion($classes,$this->opcionReturnGeneral,$this->opcionBean,false);*/
				}
					
				if($this->opcionReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->opcionReturnGeneral->getopcion(),$this->opcionActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeyopcion($this->opcionReturnGeneral->getopcion());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormularioopcion($this->opcionReturnGeneral->getopcion());*/
				}
					
				if($this->opcionReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->opcionReturnGeneral->getopcion(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->opcion,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(opcionJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualopcion(this.opcion,true);
				this.setVariablesFormularioToObjetoActualForeignKeysopcion(this.opcion);				
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
				
				if($this->opcionAnterior!=null) {
					$this->opcion=$this->opcionAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->opcionReturnGeneral=$this->opcionLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->opcionLogic->getopcions(),$this->opcion,$this->opcionParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->opcionReturnGeneral->getopcion(),$this->opcionLogic->getopcions());
			*/
		}
		
		return $this->opcionReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}

			$this->opcionReturnGeneral=new opcion_param_return();			
			$this->opcionParameterGeneral=new opcion_param_return();
			
			$this->opcionParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->opcionReturnGeneral=$this->opcionLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->opcions,$this->opcionParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->opcionReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->opcionReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->opcionReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
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
		
		$this->opcionReturnGeneral=new opcion_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_opcion') {
		    $sDominio='opcion';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->opcionReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->opcionReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='opcion';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='opcion';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='opcion';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->opcionReturnGeneral=new opcion_param_return();
		$this->opcionParameterGeneral=new opcion_param_return();
			
		$this->opcionParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->opcionReturnGeneral=$this->opcionLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->opcionLogic->getopcions(),$this->opcion,$this->opcionParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->opcionReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->opcionReturnGeneral->getopcion(),$classes);*/
		}									
	
		if($this->opcionReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->opcionReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->opcionReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $opcions,opcion $opcion) {
		
		$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));
						
		if($opcion_session==null) {
			$opcion_session=new opcion_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(opcion_util::$CLASSNAME);
			}	
			*/
			
			$this->opcionReturnGeneral=new opcion_param_return();
			$this->opcionParameterGeneral=new opcion_param_return();
			
			$this->opcionParameterGeneral->setdata($this->data);
		
		
			
		if($opcion_session->conGuardarRelaciones) {
			$classes=opcion_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->opcionActual,$this->opcion,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->opcionReturnGeneral=$this->opcionLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->opcionLogic->getopcions(),$this->opcionActual,$this->opcionParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->opcionReturnGeneral=$this->opcionLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$opcions,$opcion,$this->opcionParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelopcion($this->opcionLogic->getopcion());*/
			
			$this->opcion=$this->opcionLogic->getopcion();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->opcion);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$opcionActual=new opcion();
			
			if($this->opcionClase==null) {		
				$this->opcionClase=new opcion();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$opcionActual=$this->opcions[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $opcionActual->setid_sistema((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $opcionActual->setid_opcion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $opcionActual->setid_grupo_opcion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $opcionActual->setid_modulo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $opcionActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $opcionActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $opcionActual->setposicion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $opcionActual->seticon_name($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $opcionActual->setnombre_clase($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $opcionActual->setmodulo0($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $opcionActual->setsub_modulo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $opcionActual->setpaquete($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $opcionActual->setes_para_menu(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_15')));  } else { $opcionActual->setes_para_menu(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $opcionActual->setes_guardar_relaciones(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_16')));  } else { $opcionActual->setes_guardar_relaciones(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $opcionActual->setcon_mostrar_acciones_campo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_17')));  } else { $opcionActual->setcon_mostrar_acciones_campo(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $opcionActual->setestado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_18')));  } else { $opcionActual->setestado(false); }

				$this->opcionClase=$opcionActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->opcionModel->set($this->opcionClase);
				
				/*$this->opcionModel->set($this->migrarModelopcion($this->opcionClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->opcions=$this->migrarModelopcion($this->opcionLogic->getopcions());							
		$this->opcions=$this->opcionLogic->getopcions();*/
		
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
			$this->Session->write(opcion_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$opcion_control_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($opcion_control_session==null) {
				$opcion_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($opcion_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(opcion_util::$STR_SESSION_NAME,$this);*/
		} else {
			$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));
			
			if($opcion_session==null) {
				$opcion_session=new opcion_session();
			}
			
			$this->set(opcion_util::$STR_SESSION_NAME, $opcion_session);
		}
	}
	
	public function setCopiarVariablesObjetos(opcion $opcionOrigen,opcion $opcion,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($opcion==null) {
				$opcion=new opcion();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $opcionOrigen->getId()!=null && $opcionOrigen->getId()!=0)) {$opcion->setId($opcionOrigen->getId());}}
			if($conDefault || ($conDefault==false && $opcionOrigen->getid_sistema()!=null && $opcionOrigen->getid_sistema()!=-1)) {$opcion->setid_sistema($opcionOrigen->getid_sistema());}
			if($conDefault || ($conDefault==false && $opcionOrigen->getid_opcion()!=null && $opcionOrigen->getid_opcion()!=null)) {$opcion->setid_opcion($opcionOrigen->getid_opcion());}
			if($conDefault || ($conDefault==false && $opcionOrigen->getid_grupo_opcion()!=null && $opcionOrigen->getid_grupo_opcion()!=-1)) {$opcion->setid_grupo_opcion($opcionOrigen->getid_grupo_opcion());}
			if($conDefault || ($conDefault==false && $opcionOrigen->getcodigo()!=null && $opcionOrigen->getcodigo()!='')) {$opcion->setcodigo($opcionOrigen->getcodigo());}
			if($conDefault || ($conDefault==false && $opcionOrigen->getnombre()!=null && $opcionOrigen->getnombre()!='')) {$opcion->setnombre($opcionOrigen->getnombre());}
			if($conDefault || ($conDefault==false && $opcionOrigen->getposicion()!=null && $opcionOrigen->getposicion()!=0)) {$opcion->setposicion($opcionOrigen->getposicion());}
			if($conDefault || ($conDefault==false && $opcionOrigen->geticon_name()!=null && $opcionOrigen->geticon_name()!='')) {$opcion->seticon_name($opcionOrigen->geticon_name());}
			if($conDefault || ($conDefault==false && $opcionOrigen->getnombre_clase()!=null && $opcionOrigen->getnombre_clase()!='')) {$opcion->setnombre_clase($opcionOrigen->getnombre_clase());}
			if($conDefault || ($conDefault==false && $opcionOrigen->getmodulo0()!=null && $opcionOrigen->getmodulo0()!='')) {$opcion->setmodulo0($opcionOrigen->getmodulo0());}
			if($conDefault || ($conDefault==false && $opcionOrigen->getsub_modulo()!=null && $opcionOrigen->getsub_modulo()!='')) {$opcion->setsub_modulo($opcionOrigen->getsub_modulo());}
			if($conDefault || ($conDefault==false && $opcionOrigen->getpaquete()!=null && $opcionOrigen->getpaquete()!='')) {$opcion->setpaquete($opcionOrigen->getpaquete());}
			if($conDefault || ($conDefault==false && $opcionOrigen->getes_para_menu()!=null && $opcionOrigen->getes_para_menu()!=false)) {$opcion->setes_para_menu($opcionOrigen->getes_para_menu());}
			if($conDefault || ($conDefault==false && $opcionOrigen->getes_guardar_relaciones()!=null && $opcionOrigen->getes_guardar_relaciones()!=false)) {$opcion->setes_guardar_relaciones($opcionOrigen->getes_guardar_relaciones());}
			if($conDefault || ($conDefault==false && $opcionOrigen->getcon_mostrar_acciones_campo()!=null && $opcionOrigen->getcon_mostrar_acciones_campo()!=false)) {$opcion->setcon_mostrar_acciones_campo($opcionOrigen->getcon_mostrar_acciones_campo());}
			if($conDefault || ($conDefault==false && $opcionOrigen->getestado()!=null && $opcionOrigen->getestado()!=false)) {$opcion->setestado($opcionOrigen->getestado());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$opcionsSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$opcionsSeleccionados[]=$this->opcions[$indice];
			}
		}
		
		return $opcionsSeleccionados;
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
		$opcion= new opcion();
		
		foreach($this->opcionLogic->getopcions() as $opcion) {
			
		$opcion->perfils=array();
		$opcion->opcions=array();
		$opcion->accions=array();
		$opcion->perfilopcions=array();
		$opcion->campos=array();
		}		
		
		if($opcion!=null);
	}
	
	public function cargarRelaciones(array $opcions=array()) : array {	
		
		$opcionsRespaldo = array();
		$opcionsLocal = array();
		
		opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			opcion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			accion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			perfil_opcion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			campo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$opcionsResp=array();
		$classes=array();
			
		
				$class=new Classe('opcion'); 	$classes[]=$class;
				$class=new Classe('accion'); 	$classes[]=$class;
				$class=new Classe('perfil_opcion'); 	$classes[]=$class;
				$class=new Classe('campo'); 	$classes[]=$class;
			
			
		$opcionsRespaldo=$this->opcionLogic->getopcions();
			
		$this->opcionLogic->setIsConDeep(true);
		
		$this->opcionLogic->setopcions($opcions);
			
		$this->opcionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$opcionsLocal=$this->opcionLogic->getopcions();
			
		/*RESPALDO*/
		$this->opcionLogic->setopcions($opcionsRespaldo);
			
		$this->opcionLogic->setIsConDeep(false);
		
		if($opcionsResp!=null);
		
		return $opcionsLocal;
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
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(opcion_session $opcion_session) {
		$opcion_session->strTypeOnLoad=$this->strTypeOnLoadopcion;
		$opcion_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliaropcion;
		$opcion_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliaropcion;
		$opcion_session->bitEsPopup=$this->bitEsPopup;
		$opcion_session->bitEsBusqueda=$this->bitEsBusqueda;
		$opcion_session->strFuncionJs=$this->strFuncionJs;
		/*$opcion_session->strSufijo=$this->strSufijo;*/
		$opcion_session->bitEsRelaciones=$this->bitEsRelaciones;
		$opcion_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, opcion_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisosperfil_opcion='none';
			$this->strTienePermisosperfil_opcion=((Funciones::existeCadenaArray(perfil_opcion_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosperfil_opcion='table-cell';

			$this->strTienePermisosopcion='none';
			$this->strTienePermisosopcion=((Funciones::existeCadenaArray(opcion_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosopcion='table-cell';

			$this->strTienePermisosaccion='none';
			$this->strTienePermisosaccion=((Funciones::existeCadenaArray(accion_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosaccion='table-cell';

			$this->strTienePermisoscampo='none';
			$this->strTienePermisoscampo=((Funciones::existeCadenaArray(campo_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoscampo='table-cell';
		} else {
			

			$this->strTienePermisosperfil_opcion='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosperfil_opcion=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, perfil_opcion_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosperfil_opcion='table-cell';

			$this->strTienePermisosopcion='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosopcion=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, opcion_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosopcion='table-cell';

			$this->strTienePermisosaccion='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosaccion=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, accion_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosaccion='table-cell';

			$this->strTienePermisoscampo='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoscampo=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, campo_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoscampo='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$opcionViewAdditional=new opcionView_add();
		$opcionViewAdditional->opcions=$this->opcions;
		$opcionViewAdditional->Session=$this->Session;
		
		return $opcionViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$opcionsLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$opcionsLocal=$this->opcions;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$opcionsLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($opcionsLocal)<=0) {
					$opcionsLocal=$this->opcions;
				}
			} else {
				$opcionsLocal=$this->opcions;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliaropcionsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliaropcionsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$opcionLogic=new opcion_logic();
		$opcionLogic->setopcions($this->opcions);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$perfil_opcion_session=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME));

		if($perfil_opcion_session==null) {
			$perfil_opcion_session=new perfil_opcion_session();
		}

		$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));

		if($opcion_session==null) {
			$opcion_session=new opcion_session();
		}

		$accion_session=unserialize($this->Session->read(accion_util::$STR_SESSION_NAME));

		if($accion_session==null) {
			$accion_session=new accion_session();
		}

		$perfil_opcion_session=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME));

		if($perfil_opcion_session==null) {
			$perfil_opcion_session=new perfil_opcion_session();
		}

		$campo_session=unserialize($this->Session->read(campo_util::$STR_SESSION_NAME));

		if($campo_session==null) {
			$campo_session=new campo_session();
		} 
			
		
			$class=new Classe('sistema');$classes[]=$class;
			$class=new Classe('opcion');$classes[]=$class;
			$class=new Classe('grupo_opcion');$classes[]=$class;
			$class=new Classe('modulo');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$opcionLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->opcions=$opcionLogic->getopcions();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->opcionsLocal=$this->opcions;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=opcion_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=opcion_util::$STR_TABLE_NAME;		
			
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
			
			$opcions = $this->opcions;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = opcion_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = opcion_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/seguridad/presentation/templating/opcion_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->opcions=$opcions;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->opcionsLocal=$opcionsLocal;
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
		
		$opcionsLocal=array();
		
		$opcionsLocal=$this->opcions;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliaropcionsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliaropcionsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$opcionLogic=new opcion_logic();
		$opcionLogic->setopcions($this->opcions);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$perfil_opcion_session=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME));

		if($perfil_opcion_session==null) {
			$perfil_opcion_session=new perfil_opcion_session();
		}

		$opcion_session=unserialize($this->Session->read(opcion_util::$STR_SESSION_NAME));

		if($opcion_session==null) {
			$opcion_session=new opcion_session();
		}

		$accion_session=unserialize($this->Session->read(accion_util::$STR_SESSION_NAME));

		if($accion_session==null) {
			$accion_session=new accion_session();
		}

		$perfil_opcion_session=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME));

		if($perfil_opcion_session==null) {
			$perfil_opcion_session=new perfil_opcion_session();
		}

		$campo_session=unserialize($this->Session->read(campo_util::$STR_SESSION_NAME));

		if($campo_session==null) {
			$campo_session=new campo_session();
		} 
			
		
			$class=new Classe('sistema');$classes[]=$class;
			$class=new Classe('opcion');$classes[]=$class;
			$class=new Classe('grupo_opcion');$classes[]=$class;
			$class=new Classe('modulo');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$opcionLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->opcions=$opcionLogic->getopcions();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$opcions = $this->opcions;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = opcion_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = opcion_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/seguridad/presentation/templating/opcion_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->opcions=$opcions;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->opcionsLocal=$opcionsLocal;
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
	
	public function getHtmlTablaDatosResumen(array $opcions=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->opcionsReporte = $opcions;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliaropcionsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliaropcionsAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $opcions=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->opcionsReporte = $opcions;		
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
		
		
		$this->opcionsReporte=$this->cargarRelaciones($opcions);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliaropcionsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliaropcionsAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(opcion $opcion=null) : string {	
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
			
			
			$opcionsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$opcionsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($opcionsLocal)<=0) {
					/*//DEBE ESCOGER
					$opcionsLocal=$this->opcions;*/
				}
			} else {
				/*//DEBE ESCOGER
				$opcionsLocal=$this->opcions;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($opcionsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($opcionsLocal,true);
			
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
				$this->opcionLogic->getNewConnexionToDeep();
			}
					
			$opcionsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$opcionsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($opcionsLocal)<=0) {
					/*//DEBE ESCOGER
					$opcionsLocal=$this->opcions;*/
				}
			} else {
				/*//DEBE ESCOGER
				$opcionsLocal=$this->opcions;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($opcionsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($opcionsLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Opciones';
			
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
			$fileName='opcion';
			
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
			
			$title='Reporte de  Opciones';
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
			
			$title='Reporte de  Opciones';
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
				$this->opcionLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Opciones';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->commitNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->opcionLogic->rollbackNewConnexionToDeep();
				$this->opcionLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=opcion_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->opcionsAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->opcionsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->opcionsAuxiliar)<=0) {
					$this->opcionsAuxiliar=$this->opcions;
				}
			} else {
				$this->opcionsAuxiliar=$this->opcions;
			}
		/*} else {
			$this->opcionsAuxiliar=$this->opcionsReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->opcionsAuxiliar as $opcion) {
				$row=array();
				
				$row=opcion_util::getDataReportRow($tipo,$opcion,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			opcion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			accion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			perfil_opcion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			campo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$opcionsResp=array();
			$classes=array();
			
			
				$class=new Classe('opcion'); 	$classes[]=$class;
				$class=new Classe('accion'); 	$classes[]=$class;
				$class=new Classe('perfil_opcion'); 	$classes[]=$class;
				$class=new Classe('campo'); 	$classes[]=$class;
			
			
			$opcionsResp=$this->opcionLogic->getopcions();
			
			$this->opcionLogic->setIsConDeep(true);
			
			$this->opcionLogic->setopcions($this->opcionsAuxiliar);
			
			$this->opcionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->opcionsAuxiliar=$this->opcionLogic->getopcions();
			
			//RESPALDO
			$this->opcionLogic->setopcions($opcionsResp);
			
			$this->opcionLogic->setIsConDeep(false);
			*/
			
			$this->opcionsAuxiliar=$this->cargarRelaciones($this->opcionsAuxiliar);
			
			$i=0;
			
			foreach ($this->opcionsAuxiliar as $opcion) {
				$row=array();
				
				if($i!=0) {
					$row=opcion_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=opcion_util::getDataReportRow($tipo,$opcion,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//opcion
				if(Funciones::existeCadenaArrayOrderBy(opcion_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($opcion->getopcions())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(opcion_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=opcion_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($opcion->getopcions() as $opcion) {
						$row=opcion_util::getDataReportRow('RELACIONADO',$opcion,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//accion
				if(Funciones::existeCadenaArrayOrderBy(accion_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($opcion->getaccions())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(accion_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=accion_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($opcion->getaccions() as $accion) {
						$row=accion_util::getDataReportRow('RELACIONADO',$accion,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//perfil_opcion
				if(Funciones::existeCadenaArrayOrderBy(perfil_opcion_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($opcion->getperfil_opcions())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(perfil_opcion_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=perfil_opcion_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($opcion->getperfil_opcions() as $perfil_opcion) {
						$row=perfil_opcion_util::getDataReportRow('RELACIONADO',$perfil_opcion,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//campo
				if(Funciones::existeCadenaArrayOrderBy(campo_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($opcion->getcampos())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(campo_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=campo_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($opcion->getcampos() as $campo) {
						$row=campo_util::getDataReportRow('RELACIONADO',$campo,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->opcionsAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->opcionsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->opcionsAuxiliar)<=0) {
					$this->opcionsAuxiliar=$this->opcions;
				}
			} else {
				$this->opcionsAuxiliar=$this->opcions;
			}
		/*} else {
			$this->opcionsAuxiliar=$this->opcionsReporte;	
		}*/
		
		foreach ($this->opcionsAuxiliar as $opcion) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(opcion_util::getopcionDescripcion($opcion),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Sistema',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sistema',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getid_sistemaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Opcion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Opcion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getid_opcionDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Grupo Opcion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Grupo Opcion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getid_grupo_opcionDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Modulo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Modulo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getid_moduloDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Codigo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getcodigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getnombre(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Posicion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Posicion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getposicion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Path Del Icono',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Path Del Icono',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->geticon_name(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre De Clase',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre De Clase',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getnombre_clase(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Modulo 0',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Modulo 0',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getmodulo0(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Sub Modulo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sub Modulo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getsub_modulo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Paquete',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Paquete',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getpaquete(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Es Para Menu',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Es Para Menu',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getes_para_menu(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Es Guardar Relaciones',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Es Guardar Relaciones',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getes_guardar_relaciones(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Mostrar Acciones Campo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Mostrar Acciones Campo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getcon_mostrar_acciones_campo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Estado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Estado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getestado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface opcion_base_controlI {			
		
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
		public function getIndiceActual(opcion $opcion,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(opcion $opcion,array $opcions);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : opcion_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $opcions,opcion $opcion);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(opcion_param_return $opcionReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(opcion_session $opcion_session);		
		public function actualizarInvitadoSessionDivStyleVariables(opcion_session $opcion_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(opcion $opcionOrigen,opcion $opcion,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(opcion_control $opcion_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $opcions=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(opcion_session $opcion_session);		
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
		public function getHtmlTablaDatosResumen(array $opcions=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $opcions=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(opcion $opcion=null) : string;
		
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
