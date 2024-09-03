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

namespace com\bydan\contabilidad\general\sucursal\presentation\control;

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

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/sucursal/util/sucursal_carga.php');
use com\bydan\contabilidad\general\sucursal\util\sucursal_carga;

use com\bydan\contabilidad\general\sucursal\util\sucursal_util;
use com\bydan\contabilidad\general\sucursal\util\sucursal_param_return;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\sucursal\presentation\session\sucursal_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\business\logic\pais_logic;
use com\bydan\contabilidad\seguridad\pais\util\pais_carga;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;

use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;
use com\bydan\contabilidad\seguridad\ciudad\business\logic\ciudad_logic;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_carga;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
sucursal_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
sucursal_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
sucursal_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
sucursal_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*sucursal_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class sucursal_base_control extends sucursal_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->sucursalClase==null) {		
				$this->sucursalClase=new sucursal();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_pais')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_pais',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ciudad')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_ciudad',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->sucursalClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->sucursalClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->sucursalClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->sucursalClase->setid_pais((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_pais'));
				
				$this->sucursalClase->setid_ciudad((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ciudad'));
				
				$this->sucursalClase->setnombre($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre'));
				
				$this->sucursalClase->setregistro_tributario($this->getDataCampoFormTabla('form'.$this->strSufijo,'registro_tributario'));
				
				$this->sucursalClase->setregistro_sucursalrial($this->getDataCampoFormTabla('form'.$this->strSufijo,'registro_sucursalrial'));
				
				$this->sucursalClase->setdireccion1($this->getDataCampoFormTabla('form'.$this->strSufijo,'direccion1'));
				
				$this->sucursalClase->setdireccion2($this->getDataCampoFormTabla('form'.$this->strSufijo,'direccion2'));
				
				$this->sucursalClase->setdireccion3($this->getDataCampoFormTabla('form'.$this->strSufijo,'direccion3'));
				
				$this->sucursalClase->settelefono1($this->getDataCampoFormTabla('form'.$this->strSufijo,'telefono1'));
				
				$this->sucursalClase->setcelular($this->getDataCampoFormTabla('form'.$this->strSufijo,'celular'));
				
				$this->sucursalClase->setcorreo_electronico($this->getDataCampoFormTabla('form'.$this->strSufijo,'correo_electronico'));
				
				$this->sucursalClase->setsitio_web($this->getDataCampoFormTabla('form'.$this->strSufijo,'sitio_web'));
				
				$this->sucursalClase->setcodigo_postal($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo_postal'));
				
				$this->sucursalClase->setfax($this->getDataCampoFormTabla('form'.$this->strSufijo,'fax'));
				
				$this->sucursalClase->setbarrio_distrito($this->getDataCampoFormTabla('form'.$this->strSufijo,'barrio_distrito'));
				
				$this->sucursalClase->setlogo($this->getDataCampoFormTabla('form'.$this->strSufijo,'logo'));
				
				$this->sucursalClase->setbase_de_datos($this->getDataCampoFormTabla('form'.$this->strSufijo,'base_de_datos'));
				
				$this->sucursalClase->setcondicion((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'condicion'));
				
				$this->sucursalClase->seticono_asociado($this->getDataCampoFormTabla('form'.$this->strSufijo,'icono_asociado'));
				
				$this->sucursalClase->setfolder_sucursal($this->getDataCampoFormTabla('form'.$this->strSufijo,'folder_sucursal'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->sucursalModel->set($this->sucursalClase);
				
				/*$this->sucursalModel->set($this->migrarModelsucursal($this->sucursalClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->sucursalLogic->getsucursal()->setId($this->sucursalClase->getId());	
			$this->sucursalLogic->getsucursal()->setVersionRow($this->sucursalClase->getVersionRow());	
			$this->sucursalLogic->getsucursal()->setVersionRow($this->sucursalClase->getVersionRow());	
			$this->sucursalLogic->getsucursal()->setid_empresa($this->sucursalClase->getid_empresa());	
			$this->sucursalLogic->getsucursal()->setid_pais($this->sucursalClase->getid_pais());	
			$this->sucursalLogic->getsucursal()->setid_ciudad($this->sucursalClase->getid_ciudad());	
			$this->sucursalLogic->getsucursal()->setnombre($this->sucursalClase->getnombre());	
			$this->sucursalLogic->getsucursal()->setregistro_tributario($this->sucursalClase->getregistro_tributario());	
			$this->sucursalLogic->getsucursal()->setregistro_sucursalrial($this->sucursalClase->getregistro_sucursalrial());	
			$this->sucursalLogic->getsucursal()->setdireccion1($this->sucursalClase->getdireccion1());	
			$this->sucursalLogic->getsucursal()->setdireccion2($this->sucursalClase->getdireccion2());	
			$this->sucursalLogic->getsucursal()->setdireccion3($this->sucursalClase->getdireccion3());	
			$this->sucursalLogic->getsucursal()->settelefono1($this->sucursalClase->gettelefono1());	
			$this->sucursalLogic->getsucursal()->setcelular($this->sucursalClase->getcelular());	
			$this->sucursalLogic->getsucursal()->setcorreo_electronico($this->sucursalClase->getcorreo_electronico());	
			$this->sucursalLogic->getsucursal()->setsitio_web($this->sucursalClase->getsitio_web());	
			$this->sucursalLogic->getsucursal()->setcodigo_postal($this->sucursalClase->getcodigo_postal());	
			$this->sucursalLogic->getsucursal()->setfax($this->sucursalClase->getfax());	
			$this->sucursalLogic->getsucursal()->setbarrio_distrito($this->sucursalClase->getbarrio_distrito());	
			$this->sucursalLogic->getsucursal()->setlogo($this->sucursalClase->getlogo());	
			$this->sucursalLogic->getsucursal()->setbase_de_datos($this->sucursalClase->getbase_de_datos());	
			$this->sucursalLogic->getsucursal()->setcondicion($this->sucursalClase->getcondicion());	
			$this->sucursalLogic->getsucursal()->seticono_asociado($this->sucursalClase->geticono_asociado());	
			$this->sucursalLogic->getsucursal()->setfolder_sucursal($this->sucursalClase->getfolder_sucursal());	
		} else {
			$this->sucursalClase->setId($this->sucursalLogic->getsucursal()->getId());	
			$this->sucursalClase->setVersionRow($this->sucursalLogic->getsucursal()->getVersionRow());	
			$this->sucursalClase->setVersionRow($this->sucursalLogic->getsucursal()->getVersionRow());	
			$this->sucursalClase->setid_empresa($this->sucursalLogic->getsucursal()->getid_empresa());	
			$this->sucursalClase->setid_pais($this->sucursalLogic->getsucursal()->getid_pais());	
			$this->sucursalClase->setid_ciudad($this->sucursalLogic->getsucursal()->getid_ciudad());	
			$this->sucursalClase->setnombre($this->sucursalLogic->getsucursal()->getnombre());	
			$this->sucursalClase->setregistro_tributario($this->sucursalLogic->getsucursal()->getregistro_tributario());	
			$this->sucursalClase->setregistro_sucursalrial($this->sucursalLogic->getsucursal()->getregistro_sucursalrial());	
			$this->sucursalClase->setdireccion1($this->sucursalLogic->getsucursal()->getdireccion1());	
			$this->sucursalClase->setdireccion2($this->sucursalLogic->getsucursal()->getdireccion2());	
			$this->sucursalClase->setdireccion3($this->sucursalLogic->getsucursal()->getdireccion3());	
			$this->sucursalClase->settelefono1($this->sucursalLogic->getsucursal()->gettelefono1());	
			$this->sucursalClase->setcelular($this->sucursalLogic->getsucursal()->getcelular());	
			$this->sucursalClase->setcorreo_electronico($this->sucursalLogic->getsucursal()->getcorreo_electronico());	
			$this->sucursalClase->setsitio_web($this->sucursalLogic->getsucursal()->getsitio_web());	
			$this->sucursalClase->setcodigo_postal($this->sucursalLogic->getsucursal()->getcodigo_postal());	
			$this->sucursalClase->setfax($this->sucursalLogic->getsucursal()->getfax());	
			$this->sucursalClase->setbarrio_distrito($this->sucursalLogic->getsucursal()->getbarrio_distrito());	
			$this->sucursalClase->setlogo($this->sucursalLogic->getsucursal()->getlogo());	
			$this->sucursalClase->setbase_de_datos($this->sucursalLogic->getsucursal()->getbase_de_datos());	
			$this->sucursalClase->setcondicion($this->sucursalLogic->getsucursal()->getcondicion());	
			$this->sucursalClase->seticono_asociado($this->sucursalLogic->getsucursal()->geticono_asociado());	
			$this->sucursalClase->setfolder_sucursal($this->sucursalLogic->getsucursal()->getfolder_sucursal());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->sucursalModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='id_pais') {$this->strMensajeid_pais=$strMensajeCampo;}
		if($strNombreCampo=='id_ciudad') {$this->strMensajeid_ciudad=$strMensajeCampo;}
		if($strNombreCampo=='nombre') {$this->strMensajenombre=$strMensajeCampo;}
		if($strNombreCampo=='registro_tributario') {$this->strMensajeregistro_tributario=$strMensajeCampo;}
		if($strNombreCampo=='registro_sucursalrial') {$this->strMensajeregistro_sucursalrial=$strMensajeCampo;}
		if($strNombreCampo=='direccion1') {$this->strMensajedireccion1=$strMensajeCampo;}
		if($strNombreCampo=='direccion2') {$this->strMensajedireccion2=$strMensajeCampo;}
		if($strNombreCampo=='direccion3') {$this->strMensajedireccion3=$strMensajeCampo;}
		if($strNombreCampo=='telefono1') {$this->strMensajetelefono1=$strMensajeCampo;}
		if($strNombreCampo=='celular') {$this->strMensajecelular=$strMensajeCampo;}
		if($strNombreCampo=='correo_electronico') {$this->strMensajecorreo_electronico=$strMensajeCampo;}
		if($strNombreCampo=='sitio_web') {$this->strMensajesitio_web=$strMensajeCampo;}
		if($strNombreCampo=='codigo_postal') {$this->strMensajecodigo_postal=$strMensajeCampo;}
		if($strNombreCampo=='fax') {$this->strMensajefax=$strMensajeCampo;}
		if($strNombreCampo=='barrio_distrito') {$this->strMensajebarrio_distrito=$strMensajeCampo;}
		if($strNombreCampo=='logo') {$this->strMensajelogo=$strMensajeCampo;}
		if($strNombreCampo=='base_de_datos') {$this->strMensajebase_de_datos=$strMensajeCampo;}
		if($strNombreCampo=='condicion') {$this->strMensajecondicion=$strMensajeCampo;}
		if($strNombreCampo=='icono_asociado') {$this->strMensajeicono_asociado=$strMensajeCampo;}
		if($strNombreCampo=='folder_sucursal') {$this->strMensajefolder_sucursal=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeid_pais='';
		$this->strMensajeid_ciudad='';
		$this->strMensajenombre='';
		$this->strMensajeregistro_tributario='';
		$this->strMensajeregistro_sucursalrial='';
		$this->strMensajedireccion1='';
		$this->strMensajedireccion2='';
		$this->strMensajedireccion3='';
		$this->strMensajetelefono1='';
		$this->strMensajecelular='';
		$this->strMensajecorreo_electronico='';
		$this->strMensajesitio_web='';
		$this->strMensajecodigo_postal='';
		$this->strMensajefax='';
		$this->strMensajebarrio_distrito='';
		$this->strMensajelogo='';
		$this->strMensajebase_de_datos='';
		$this->strMensajecondicion='';
		$this->strMensajeicono_asociado='';
		$this->strMensajefolder_sucursal='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->commitNewConnexionToDeep();
				$this->sucursalLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->rollbackNewConnexionToDeep();
				$this->sucursalLogic->closeNewConnexionToDeep();
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
				$this->sucursalLogic->getNewConnexionToDeep();
			}

			$sucursal_session=unserialize($this->Session->read(sucursal_util::$STR_SESSION_NAME));
						
			if($sucursal_session==null) {
				$sucursal_session=new sucursal_session();
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
						$this->sucursalLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->sucursalActual =$this->sucursalClase;
			
			/*$this->sucursalActual =$this->migrarModelsucursal($this->sucursalClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->commitNewConnexionToDeep();
				$this->sucursalLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->sucursalLogic->getsucursals(),$this->sucursalActual);
			
			$this->actualizarControllerConReturnGeneral($this->sucursalReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->rollbackNewConnexionToDeep();
				$this->sucursalLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->getNewConnexionToDeep();
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
				$this->sucursalLogic->commitNewConnexionToDeep();
				$this->sucursalLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->rollbackNewConnexionToDeep();
				$this->sucursalLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$sucursalsLocal=$this->getListaActual();
		
		$iIndice=sucursal_util::getIndiceNuevo($sucursalsLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(sucursal $sucursal,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$sucursalsLocal=$this->getListaActual();
		
		$iIndice=sucursal_util::getIndiceActual($sucursalsLocal,$sucursal,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevosucursal')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->sucursalActual =$this->sucursalClase;
			
			/*$this->sucursalActual =$this->migrarModelsucursal($this->sucursalClase);*/
			
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
			
			$this->sucursalLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('pais');$classes[]=$class;
				$class=new Classe('ciudad');$classes[]=$class;
			
			$this->sucursalLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->sucursalLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->sucursalLogic->setsucursal(new sucursal());
				
				$this->sucursalLogic->getsucursal()->setIsNew(true);
				$this->sucursalLogic->getsucursal()->setIsChanged(true);
				$this->sucursalLogic->getsucursal()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->sucursalModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->sucursalLogic->sucursals[]=$this->sucursalLogic->getsucursal();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->sucursalLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->sucursalLogic->saveRelaciones($this->sucursalLogic->getsucursal());/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->sucursalLogic->getsucursal()->setIsChanged(true);
				$this->sucursalLogic->getsucursal()->setIsNew(false);
				$this->sucursalLogic->getsucursal()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->sucursalModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->sucursalLogic->getsucursal(),$this->sucursalLogic->getsucursals());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->sucursalLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->sucursalLogic->saveRelaciones($this->sucursalLogic->getsucursal());/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->sucursalLogic->getsucursal()->setIsDeleted(true);
				$this->sucursalLogic->getsucursal()->setIsNew(false);
				$this->sucursalLogic->getsucursal()->setIsChanged(false);				
				
				$this->actualizarLista($this->sucursalLogic->getsucursal(),$this->sucursalLogic->getsucursals());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->sucursalLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->sucursalLogic->saveRelaciones($this->sucursalLogic->getsucursal());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->sucursalsEliminados[]=$this->sucursalLogic->getsucursal();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->sucursalLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->sucursalLogic->saveRelaciones($this->sucursalLogic->getsucursal());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->sucursalsEliminados=array();
				}
			}
			
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('pais');$classes[]=$class;
				$class=new Classe('ciudad');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->sucursalLogic->setsucursals();*/
					
					$this->sucursalLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->sucursalLogic->setIsConDeepLoad(false);
			
			$this->sucursals=$this->sucursalLogic->getsucursals();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(sucursal_util::$STR_SESSION_NAME.'Lista',serialize($this->sucursals));
				$this->Session->write(sucursal_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->sucursalsEliminados));
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
				$this->sucursalLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->commitNewConnexionToDeep();
				$this->sucursalLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->rollbackNewConnexionToDeep();
				$this->sucursalLogic->closeNewConnexionToDeep();
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
				$this->sucursalLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalsucursal;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->sucursalLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->sucursals as $sucursalLocal) {
				if($this->sucursalLogic->getsucursal()->getId()==$sucursalLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->sucursalLogic->getsucursal()->setIsDeleted(true);
			$this->sucursalsEliminados[]=$this->sucursalLogic->getsucursal();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->sucursals[$indice]);
				
				$this->sucursals = array_values($this->sucursals);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelsucursal($this->sucursalClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->commitNewConnexionToDeep();
				$this->sucursalLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->rollbackNewConnexionToDeep();
				$this->sucursalLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(sucursal $sucursal,array $sucursals) {
		try {
			foreach($sucursals as $sucursalLocal){ 
				if($sucursalLocal->getId()==$sucursal->getId()) {
					$sucursalLocal->setIsChanged($sucursal->getIsChanged());
					$sucursalLocal->setIsNew($sucursal->getIsNew());
					$sucursalLocal->setIsDeleted($sucursal->getIsDeleted());
					//$sucursalLocal->setbitExpired($sucursal->getbitExpired());
					
					$sucursalLocal->setId($sucursal->getId());	
					$sucursalLocal->setVersionRow($sucursal->getVersionRow());	
					$sucursalLocal->setVersionRow($sucursal->getVersionRow());	
					$sucursalLocal->setid_empresa($sucursal->getid_empresa());	
					$sucursalLocal->setid_pais($sucursal->getid_pais());	
					$sucursalLocal->setid_ciudad($sucursal->getid_ciudad());	
					$sucursalLocal->setnombre($sucursal->getnombre());	
					$sucursalLocal->setregistro_tributario($sucursal->getregistro_tributario());	
					$sucursalLocal->setregistro_sucursalrial($sucursal->getregistro_sucursalrial());	
					$sucursalLocal->setdireccion1($sucursal->getdireccion1());	
					$sucursalLocal->setdireccion2($sucursal->getdireccion2());	
					$sucursalLocal->setdireccion3($sucursal->getdireccion3());	
					$sucursalLocal->settelefono1($sucursal->gettelefono1());	
					$sucursalLocal->setcelular($sucursal->getcelular());	
					$sucursalLocal->setcorreo_electronico($sucursal->getcorreo_electronico());	
					$sucursalLocal->setsitio_web($sucursal->getsitio_web());	
					$sucursalLocal->setcodigo_postal($sucursal->getcodigo_postal());	
					$sucursalLocal->setfax($sucursal->getfax());	
					$sucursalLocal->setbarrio_distrito($sucursal->getbarrio_distrito());	
					$sucursalLocal->setlogo($sucursal->getlogo());	
					$sucursalLocal->setbase_de_datos($sucursal->getbase_de_datos());	
					$sucursalLocal->setcondicion($sucursal->getcondicion());	
					$sucursalLocal->seticono_asociado($sucursal->geticono_asociado());	
					$sucursalLocal->setfolder_sucursal($sucursal->getfolder_sucursal());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$sucursalsLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$sucursalsLocal=$this->sucursalLogic->getsucursals();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$sucursalsLocal=$this->sucursals;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $sucursalsLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->sucursalLogic->getsucursals() as $sucursal) {
				if($sucursal->getId()==$id) {
					$this->sucursalLogic->setsucursal($sucursal);
					
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
		/*$sucursalsSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->sucursals as $sucursal) {
			$sucursal->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->sucursals[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : sucursal_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$sucursal_session=unserialize($this->Session->read(sucursal_util::$STR_SESSION_NAME));
						
		if($sucursal_session==null) {
			$sucursal_session=new sucursal_session();
		}
		
		
		$this->sucursalReturnGeneral=new sucursal_param_return();
		$this->sucursalParameterGeneral=new sucursal_param_return();
			
		$this->sucursalParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualsucursal(this.sucursal,true);
			this.setVariablesFormularioToObjetoActualForeignKeyssucursal(this.sucursal);*/
			
			if($sucursal_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualsucursal(this.sucursal,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->sucursalActual=$this->sucursalClase;
				
				$this->setCopiarVariablesObjetos($this->sucursalActual,$this->sucursal,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->sucursalReturnGeneral=$this->sucursalLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->sucursalLogic->getsucursals(),$this->sucursal,$this->sucursalParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($sucursal_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeansucursal($classes,$this->sucursalReturnGeneral,$this->sucursalBean,false);*/
				}
					
				if($this->sucursalReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->sucursalReturnGeneral->getsucursal(),$this->sucursalActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeysucursal($this->sucursalReturnGeneral->getsucursal());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariosucursal($this->sucursalReturnGeneral->getsucursal());*/
				}
					
				if($this->sucursalReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->sucursalReturnGeneral->getsucursal(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->sucursal,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(sucursalJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualsucursal(this.sucursal,true);
				this.setVariablesFormularioToObjetoActualForeignKeyssucursal(this.sucursal);				
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
				
				if($this->sucursalAnterior!=null) {
					$this->sucursal=$this->sucursalAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->sucursalReturnGeneral=$this->sucursalLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->sucursalLogic->getsucursals(),$this->sucursal,$this->sucursalParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->sucursalReturnGeneral->getsucursal(),$this->sucursalLogic->getsucursals());
			*/
		}
		
		return $this->sucursalReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->getNewConnexionToDeep();
			}

			$this->sucursalReturnGeneral=new sucursal_param_return();			
			$this->sucursalParameterGeneral=new sucursal_param_return();
			
			$this->sucursalParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->sucursalReturnGeneral=$this->sucursalLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->sucursals,$this->sucursalParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->sucursalReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->sucursalReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->commitNewConnexionToDeep();
				$this->sucursalLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->sucursalReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->rollbackNewConnexionToDeep();
				$this->sucursalLogic->closeNewConnexionToDeep();
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
		
		$this->sucursalReturnGeneral=new sucursal_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_sucursal') {
		    $sDominio='sucursal';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->sucursalReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->sucursalReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='sucursal';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='sucursal';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='sucursal';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->sucursalReturnGeneral=new sucursal_param_return();
		$this->sucursalParameterGeneral=new sucursal_param_return();
			
		$this->sucursalParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->sucursalReturnGeneral=$this->sucursalLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->sucursalLogic->getsucursals(),$this->sucursal,$this->sucursalParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->sucursalReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->sucursalReturnGeneral->getsucursal(),$classes);*/
		}									
	
		if($this->sucursalReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->sucursalReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->sucursalReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $sucursals,sucursal $sucursal) {
		
		$sucursal_session=unserialize($this->Session->read(sucursal_util::$STR_SESSION_NAME));
						
		if($sucursal_session==null) {
			$sucursal_session=new sucursal_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(sucursal_util::$CLASSNAME);
			}	
			*/
			
			$this->sucursalReturnGeneral=new sucursal_param_return();
			$this->sucursalParameterGeneral=new sucursal_param_return();
			
			$this->sucursalParameterGeneral->setdata($this->data);
		
		
			
		if($sucursal_session->conGuardarRelaciones) {
			$classes=sucursal_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->sucursalActual,$this->sucursal,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->sucursalReturnGeneral=$this->sucursalLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->sucursalLogic->getsucursals(),$this->sucursalActual,$this->sucursalParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->sucursalReturnGeneral=$this->sucursalLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$sucursals,$sucursal,$this->sucursalParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelsucursal($this->sucursalLogic->getsucursal());*/
			
			$this->sucursal=$this->sucursalLogic->getsucursal();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->sucursal);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->commitNewConnexionToDeep();
				$this->sucursalLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->rollbackNewConnexionToDeep();
				$this->sucursalLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$sucursalActual=new sucursal();
			
			if($this->sucursalClase==null) {		
				$this->sucursalClase=new sucursal();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$sucursalActual=$this->sucursals[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $sucursalActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $sucursalActual->setid_pais((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $sucursalActual->setid_ciudad((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $sucursalActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $sucursalActual->setregistro_tributario($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $sucursalActual->setregistro_sucursalrial($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $sucursalActual->setdireccion1($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $sucursalActual->setdireccion2($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $sucursalActual->setdireccion3($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $sucursalActual->settelefono1($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $sucursalActual->setcelular($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $sucursalActual->setcorreo_electronico($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $sucursalActual->setsitio_web($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $sucursalActual->setcodigo_postal($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $sucursalActual->setfax($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $sucursalActual->setbarrio_distrito($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $sucursalActual->setlogo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $sucursalActual->setbase_de_datos($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $sucursalActual->setcondicion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $sucursalActual->seticono_asociado($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_22'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $sucursalActual->setfolder_sucursal($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }

				$this->sucursalClase=$sucursalActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->sucursalModel->set($this->sucursalClase);
				
				/*$this->sucursalModel->set($this->migrarModelsucursal($this->sucursalClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->sucursals=$this->migrarModelsucursal($this->sucursalLogic->getsucursals());							
		$this->sucursals=$this->sucursalLogic->getsucursals();*/
		
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
			$this->Session->write(sucursal_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$sucursal_control_session=unserialize($this->Session->read(sucursal_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($sucursal_control_session==null) {
				$sucursal_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($sucursal_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(sucursal_util::$STR_SESSION_NAME,$this);*/
		} else {
			$sucursal_session=unserialize($this->Session->read(sucursal_util::$STR_SESSION_NAME));
			
			if($sucursal_session==null) {
				$sucursal_session=new sucursal_session();
			}
			
			$this->set(sucursal_util::$STR_SESSION_NAME, $sucursal_session);
		}
	}
	
	public function setCopiarVariablesObjetos(sucursal $sucursalOrigen,sucursal $sucursal,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($sucursal==null) {
				$sucursal=new sucursal();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $sucursalOrigen->getId()!=null && $sucursalOrigen->getId()!=0)) {$sucursal->setId($sucursalOrigen->getId());}}
			if($conDefault || ($conDefault==false && $sucursalOrigen->getid_pais()!=null && $sucursalOrigen->getid_pais()!=-1)) {$sucursal->setid_pais($sucursalOrigen->getid_pais());}
			if($conDefault || ($conDefault==false && $sucursalOrigen->getid_ciudad()!=null && $sucursalOrigen->getid_ciudad()!=-1)) {$sucursal->setid_ciudad($sucursalOrigen->getid_ciudad());}
			if($conDefault || ($conDefault==false && $sucursalOrigen->getnombre()!=null && $sucursalOrigen->getnombre()!='')) {$sucursal->setnombre($sucursalOrigen->getnombre());}
			if($conDefault || ($conDefault==false && $sucursalOrigen->getregistro_tributario()!=null && $sucursalOrigen->getregistro_tributario()!='')) {$sucursal->setregistro_tributario($sucursalOrigen->getregistro_tributario());}
			if($conDefault || ($conDefault==false && $sucursalOrigen->getregistro_sucursalrial()!=null && $sucursalOrigen->getregistro_sucursalrial()!='')) {$sucursal->setregistro_sucursalrial($sucursalOrigen->getregistro_sucursalrial());}
			if($conDefault || ($conDefault==false && $sucursalOrigen->getdireccion1()!=null && $sucursalOrigen->getdireccion1()!='')) {$sucursal->setdireccion1($sucursalOrigen->getdireccion1());}
			if($conDefault || ($conDefault==false && $sucursalOrigen->getdireccion2()!=null && $sucursalOrigen->getdireccion2()!='')) {$sucursal->setdireccion2($sucursalOrigen->getdireccion2());}
			if($conDefault || ($conDefault==false && $sucursalOrigen->getdireccion3()!=null && $sucursalOrigen->getdireccion3()!='')) {$sucursal->setdireccion3($sucursalOrigen->getdireccion3());}
			if($conDefault || ($conDefault==false && $sucursalOrigen->gettelefono1()!=null && $sucursalOrigen->gettelefono1()!='')) {$sucursal->settelefono1($sucursalOrigen->gettelefono1());}
			if($conDefault || ($conDefault==false && $sucursalOrigen->getcelular()!=null && $sucursalOrigen->getcelular()!='')) {$sucursal->setcelular($sucursalOrigen->getcelular());}
			if($conDefault || ($conDefault==false && $sucursalOrigen->getcorreo_electronico()!=null && $sucursalOrigen->getcorreo_electronico()!='')) {$sucursal->setcorreo_electronico($sucursalOrigen->getcorreo_electronico());}
			if($conDefault || ($conDefault==false && $sucursalOrigen->getsitio_web()!=null && $sucursalOrigen->getsitio_web()!='')) {$sucursal->setsitio_web($sucursalOrigen->getsitio_web());}
			if($conDefault || ($conDefault==false && $sucursalOrigen->getcodigo_postal()!=null && $sucursalOrigen->getcodigo_postal()!='')) {$sucursal->setcodigo_postal($sucursalOrigen->getcodigo_postal());}
			if($conDefault || ($conDefault==false && $sucursalOrigen->getfax()!=null && $sucursalOrigen->getfax()!='')) {$sucursal->setfax($sucursalOrigen->getfax());}
			if($conDefault || ($conDefault==false && $sucursalOrigen->getbarrio_distrito()!=null && $sucursalOrigen->getbarrio_distrito()!='')) {$sucursal->setbarrio_distrito($sucursalOrigen->getbarrio_distrito());}
			if($conDefault || ($conDefault==false && $sucursalOrigen->getlogo()!=null && $sucursalOrigen->getlogo()!='')) {$sucursal->setlogo($sucursalOrigen->getlogo());}
			if($conDefault || ($conDefault==false && $sucursalOrigen->getbase_de_datos()!=null && $sucursalOrigen->getbase_de_datos()!='')) {$sucursal->setbase_de_datos($sucursalOrigen->getbase_de_datos());}
			if($conDefault || ($conDefault==false && $sucursalOrigen->getcondicion()!=null && $sucursalOrigen->getcondicion()!=0)) {$sucursal->setcondicion($sucursalOrigen->getcondicion());}
			if($conDefault || ($conDefault==false && $sucursalOrigen->geticono_asociado()!=null && $sucursalOrigen->geticono_asociado()!='')) {$sucursal->seticono_asociado($sucursalOrigen->geticono_asociado());}
			if($conDefault || ($conDefault==false && $sucursalOrigen->getfolder_sucursal()!=null && $sucursalOrigen->getfolder_sucursal()!='')) {$sucursal->setfolder_sucursal($sucursalOrigen->getfolder_sucursal());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$sucursalsSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$sucursalsSeleccionados[]=$this->sucursals[$indice];
			}
		}
		
		return $sucursalsSeleccionados;
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
		$sucursal= new sucursal();
		
		foreach($this->sucursalLogic->getsucursals() as $sucursal) {
			
		}		
		
		if($sucursal!=null);
	}
	
	public function cargarRelaciones(array $sucursals=array()) : array {	
		
		$sucursalsRespaldo = array();
		$sucursalsLocal = array();
		
		sucursal_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$sucursalsResp=array();
		$classes=array();
			
		
			
			
		$sucursalsRespaldo=$this->sucursalLogic->getsucursals();
			
		$this->sucursalLogic->setIsConDeep(true);
		
		$this->sucursalLogic->setsucursals($sucursals);
			
		$this->sucursalLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$sucursalsLocal=$this->sucursalLogic->getsucursals();
			
		/*RESPALDO*/
		$this->sucursalLogic->setsucursals($sucursalsRespaldo);
			
		$this->sucursalLogic->setIsConDeep(false);
		
		if($sucursalsResp!=null);
		
		return $sucursalsLocal;
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
				$this->sucursalLogic->rollbackNewConnexionToDeep();
				$this->sucursalLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(sucursal_session $sucursal_session) {
		$sucursal_session->strTypeOnLoad=$this->strTypeOnLoadsucursal;
		$sucursal_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarsucursal;
		$sucursal_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarsucursal;
		$sucursal_session->bitEsPopup=$this->bitEsPopup;
		$sucursal_session->bitEsBusqueda=$this->bitEsBusqueda;
		$sucursal_session->strFuncionJs=$this->strFuncionJs;
		/*$sucursal_session->strSufijo=$this->strSufijo;*/
		$sucursal_session->bitEsRelaciones=$this->bitEsRelaciones;
		$sucursal_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, sucursal_util::$STR_NOMBRE_CLASE,0,false,false);				
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
		$sucursalViewAdditional=new sucursalView_add();
		$sucursalViewAdditional->sucursals=$this->sucursals;
		$sucursalViewAdditional->Session=$this->Session;
		
		return $sucursalViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$sucursalsLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$sucursalsLocal=$this->sucursals;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$sucursalsLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($sucursalsLocal)<=0) {
					$sucursalsLocal=$this->sucursals;
				}
			} else {
				$sucursalsLocal=$this->sucursals;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarsucursalsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarsucursalsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$sucursalLogic=new sucursal_logic();
		$sucursalLogic->setsucursals($this->sucursals);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('pais');$classes[]=$class;
			$class=new Classe('ciudad');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$sucursalLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->sucursals=$sucursalLogic->getsucursals();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->sucursalsLocal=$this->sucursals;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=sucursal_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=sucursal_util::$STR_TABLE_NAME;		
			
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
			
			$sucursals = $this->sucursals;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = sucursal_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = sucursal_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/general/presentation/templating/sucursal_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->sucursals=$sucursals;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->sucursalsLocal=$sucursalsLocal;
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
		
		$sucursalsLocal=array();
		
		$sucursalsLocal=$this->sucursals;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarsucursalsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarsucursalsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$sucursalLogic=new sucursal_logic();
		$sucursalLogic->setsucursals($this->sucursals);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('pais');$classes[]=$class;
			$class=new Classe('ciudad');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$sucursalLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->sucursals=$sucursalLogic->getsucursals();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$sucursals = $this->sucursals;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = sucursal_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = sucursal_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/general/presentation/templating/sucursal_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->sucursals=$sucursals;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->sucursalsLocal=$sucursalsLocal;
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
	
	public function getHtmlTablaDatosResumen(array $sucursals=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->sucursalsReporte = $sucursals;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarsucursalsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarsucursalsAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $sucursals=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->sucursalsReporte = $sucursals;		
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
		
		
		$this->sucursalsReporte=$this->cargarRelaciones($sucursals);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarsucursalsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarsucursalsAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(sucursal $sucursal=null) : string {	
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
			
			
			$sucursalsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$sucursalsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($sucursalsLocal)<=0) {
					/*//DEBE ESCOGER
					$sucursalsLocal=$this->sucursals;*/
				}
			} else {
				/*//DEBE ESCOGER
				$sucursalsLocal=$this->sucursals;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($sucursalsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($sucursalsLocal,true);
			
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
				$this->sucursalLogic->getNewConnexionToDeep();
			}
					
			$sucursalsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$sucursalsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($sucursalsLocal)<=0) {
					/*//DEBE ESCOGER
					$sucursalsLocal=$this->sucursals;*/
				}
			} else {
				/*//DEBE ESCOGER
				$sucursalsLocal=$this->sucursals;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($sucursalsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($sucursalsLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->commitNewConnexionToDeep();
				$this->sucursalLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->rollbackNewConnexionToDeep();
				$this->sucursalLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Sucursals';
			
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
			$fileName='sucursal';
			
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
			
			$title='Reporte de  Sucursals';
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
			
			$title='Reporte de  Sucursals';
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
				$this->sucursalLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Sucursals';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->commitNewConnexionToDeep();
				$this->sucursalLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sucursalLogic->rollbackNewConnexionToDeep();
				$this->sucursalLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=sucursal_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->sucursalsAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->sucursalsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->sucursalsAuxiliar)<=0) {
					$this->sucursalsAuxiliar=$this->sucursals;
				}
			} else {
				$this->sucursalsAuxiliar=$this->sucursals;
			}
		/*} else {
			$this->sucursalsAuxiliar=$this->sucursalsReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->sucursalsAuxiliar as $sucursal) {
				$row=array();
				
				$row=sucursal_util::getDataReportRow($tipo,$sucursal,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			sucursal_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$sucursalsResp=array();
			$classes=array();
			
			
			
			
			$sucursalsResp=$this->sucursalLogic->getsucursals();
			
			$this->sucursalLogic->setIsConDeep(true);
			
			$this->sucursalLogic->setsucursals($this->sucursalsAuxiliar);
			
			$this->sucursalLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->sucursalsAuxiliar=$this->sucursalLogic->getsucursals();
			
			//RESPALDO
			$this->sucursalLogic->setsucursals($sucursalsResp);
			
			$this->sucursalLogic->setIsConDeep(false);
			*/
			
			$this->sucursalsAuxiliar=$this->cargarRelaciones($this->sucursalsAuxiliar);
			
			$i=0;
			
			foreach ($this->sucursalsAuxiliar as $sucursal) {
				$row=array();
				
				if($i!=0) {
					$row=sucursal_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=sucursal_util::getDataReportRow($tipo,$sucursal,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
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
		$this->sucursalsAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->sucursalsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->sucursalsAuxiliar)<=0) {
					$this->sucursalsAuxiliar=$this->sucursals;
				}
			} else {
				$this->sucursalsAuxiliar=$this->sucursals;
			}
		/*} else {
			$this->sucursalsAuxiliar=$this->sucursalsReporte;	
		}*/
		
		foreach ($this->sucursalsAuxiliar as $sucursal) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(sucursal_util::getsucursalDescripcion($sucursal),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Pais',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Pais',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getid_paisDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ciudad',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ciudad',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getid_ciudadDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getnombre(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Registro Tributario (RUC)',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Registro Tributario (RUC)',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getregistro_tributario(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Registro Empresarial',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Registro Empresarial',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getregistro_sucursalrial(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Direccion1',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Direccion1',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getdireccion1(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Direccion2',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Direccion2',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getdireccion2(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Direccion3',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Direccion3',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getdireccion3(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Telefono1',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Telefono1',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->gettelefono1(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Celular',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Celular',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getcelular(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Correo Electronico',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Correo Electronico',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getcorreo_electronico(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Sitio Web',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sitio Web',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getsitio_web(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Codigo Postal',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo Postal',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getcodigo_postal(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fax',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fax',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getfax(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Barrio Distrito',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Barrio Distrito',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getbarrio_distrito(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Logo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Logo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getlogo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Base De Datos',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Base De Datos',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getbase_de_datos(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Condicion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Condicion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getcondicion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Icono Asociado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Icono Asociado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->geticono_asociado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Folder',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Folder',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getfolder_sucursal(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface sucursal_base_controlI {			
		
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
		public function getIndiceActual(sucursal $sucursal,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(sucursal $sucursal,array $sucursals);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : sucursal_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $sucursals,sucursal $sucursal);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(sucursal_param_return $sucursalReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(sucursal_session $sucursal_session);		
		public function actualizarInvitadoSessionDivStyleVariables(sucursal_session $sucursal_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(sucursal $sucursalOrigen,sucursal $sucursal,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(sucursal_control $sucursal_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $sucursals=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(sucursal_session $sucursal_session);		
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
		public function getHtmlTablaDatosResumen(array $sucursals=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $sucursals=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(sucursal $sucursal=null) : string;
		
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
