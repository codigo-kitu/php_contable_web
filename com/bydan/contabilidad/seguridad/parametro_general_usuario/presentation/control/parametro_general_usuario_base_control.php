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

namespace com\bydan\contabilidad\seguridad\parametro_general_usuario\presentation\control;

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

use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/parametro_general_usuario/util/parametro_general_usuario_carga.php');
use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_carga;

use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_util;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_param_return;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\logic\parametro_general_usuario_logic;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\presentation\session\parametro_general_usuario_session;


//FK


use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\seguridad\tipo_fondo\business\entity\tipo_fondo;
use com\bydan\contabilidad\seguridad\tipo_fondo\business\logic\tipo_fondo_logic;
use com\bydan\contabilidad\seguridad\tipo_fondo\util\tipo_fondo_carga;
use com\bydan\contabilidad\seguridad\tipo_fondo\util\tipo_fondo_util;

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\sucursal\util\sucursal_carga;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_carga;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_carga;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
parametro_general_usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
parametro_general_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
parametro_general_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
parametro_general_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*parametro_general_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class parametro_general_usuario_base_control extends parametro_general_usuario_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->parametro_general_usuarioClase==null) {		
				$this->parametro_general_usuarioClase=new parametro_general_usuario();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_fondo')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_tipo_fondo',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sucursal')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_sucursal',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_ejercicio',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_periodo',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->parametro_general_usuarioClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->parametro_general_usuarioClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->parametro_general_usuarioClase->setid_tipo_fondo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_fondo'));
				
				$this->parametro_general_usuarioClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->parametro_general_usuarioClase->setid_sucursal((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sucursal'));
				
				$this->parametro_general_usuarioClase->setid_ejercicio((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio'));
				
				$this->parametro_general_usuarioClase->setid_periodo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo'));
				
				$this->parametro_general_usuarioClase->setpath_exportar($this->getDataCampoFormTabla('form'.$this->strSufijo,'path_exportar'));
				
				$this->parametro_general_usuarioClase->setcon_exportar_cabecera(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_exportar_cabecera')));
				
				$this->parametro_general_usuarioClase->setcon_exportar_campo_version(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_exportar_campo_version')));
				
				$this->parametro_general_usuarioClase->setcon_botones_tool_bar(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_botones_tool_bar')));
				
				$this->parametro_general_usuarioClase->setcon_cargar_por_parte(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_cargar_por_parte')));
				
				$this->parametro_general_usuarioClase->setcon_guardar_relaciones(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_guardar_relaciones')));
				
				$this->parametro_general_usuarioClase->setcon_mostrar_acciones_campo_general(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_mostrar_acciones_campo_general')));
				
				$this->parametro_general_usuarioClase->setcon_mensaje_confirmacion(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_mensaje_confirmacion')));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->parametro_general_usuarioModel->set($this->parametro_general_usuarioClase);
				
				/*$this->parametro_general_usuarioModel->set($this->migrarModelparametro_general_usuario($this->parametro_general_usuarioClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setId($this->parametro_general_usuarioClase->getId());	
			$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setVersionRow($this->parametro_general_usuarioClase->getVersionRow());	
			$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setVersionRow($this->parametro_general_usuarioClase->getVersionRow());	
			$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setid_tipo_fondo($this->parametro_general_usuarioClase->getid_tipo_fondo());	
			$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setid_empresa($this->parametro_general_usuarioClase->getid_empresa());	
			$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setid_sucursal($this->parametro_general_usuarioClase->getid_sucursal());	
			$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setid_ejercicio($this->parametro_general_usuarioClase->getid_ejercicio());	
			$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setid_periodo($this->parametro_general_usuarioClase->getid_periodo());	
			$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setpath_exportar($this->parametro_general_usuarioClase->getpath_exportar());	
			$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setcon_exportar_cabecera($this->parametro_general_usuarioClase->getcon_exportar_cabecera());	
			$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setcon_exportar_campo_version($this->parametro_general_usuarioClase->getcon_exportar_campo_version());	
			$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setcon_botones_tool_bar($this->parametro_general_usuarioClase->getcon_botones_tool_bar());	
			$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setcon_cargar_por_parte($this->parametro_general_usuarioClase->getcon_cargar_por_parte());	
			$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setcon_guardar_relaciones($this->parametro_general_usuarioClase->getcon_guardar_relaciones());	
			$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setcon_mostrar_acciones_campo_general($this->parametro_general_usuarioClase->getcon_mostrar_acciones_campo_general());	
			$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setcon_mensaje_confirmacion($this->parametro_general_usuarioClase->getcon_mensaje_confirmacion());	
		} else {
			$this->parametro_general_usuarioClase->setId($this->parametro_general_usuarioLogic->getparametro_general_usuario()->getId());	
			$this->parametro_general_usuarioClase->setVersionRow($this->parametro_general_usuarioLogic->getparametro_general_usuario()->getVersionRow());	
			$this->parametro_general_usuarioClase->setVersionRow($this->parametro_general_usuarioLogic->getparametro_general_usuario()->getVersionRow());	
			$this->parametro_general_usuarioClase->setid_tipo_fondo($this->parametro_general_usuarioLogic->getparametro_general_usuario()->getid_tipo_fondo());	
			$this->parametro_general_usuarioClase->setid_empresa($this->parametro_general_usuarioLogic->getparametro_general_usuario()->getid_empresa());	
			$this->parametro_general_usuarioClase->setid_sucursal($this->parametro_general_usuarioLogic->getparametro_general_usuario()->getid_sucursal());	
			$this->parametro_general_usuarioClase->setid_ejercicio($this->parametro_general_usuarioLogic->getparametro_general_usuario()->getid_ejercicio());	
			$this->parametro_general_usuarioClase->setid_periodo($this->parametro_general_usuarioLogic->getparametro_general_usuario()->getid_periodo());	
			$this->parametro_general_usuarioClase->setpath_exportar($this->parametro_general_usuarioLogic->getparametro_general_usuario()->getpath_exportar());	
			$this->parametro_general_usuarioClase->setcon_exportar_cabecera($this->parametro_general_usuarioLogic->getparametro_general_usuario()->getcon_exportar_cabecera());	
			$this->parametro_general_usuarioClase->setcon_exportar_campo_version($this->parametro_general_usuarioLogic->getparametro_general_usuario()->getcon_exportar_campo_version());	
			$this->parametro_general_usuarioClase->setcon_botones_tool_bar($this->parametro_general_usuarioLogic->getparametro_general_usuario()->getcon_botones_tool_bar());	
			$this->parametro_general_usuarioClase->setcon_cargar_por_parte($this->parametro_general_usuarioLogic->getparametro_general_usuario()->getcon_cargar_por_parte());	
			$this->parametro_general_usuarioClase->setcon_guardar_relaciones($this->parametro_general_usuarioLogic->getparametro_general_usuario()->getcon_guardar_relaciones());	
			$this->parametro_general_usuarioClase->setcon_mostrar_acciones_campo_general($this->parametro_general_usuarioLogic->getparametro_general_usuario()->getcon_mostrar_acciones_campo_general());	
			$this->parametro_general_usuarioClase->setcon_mensaje_confirmacion($this->parametro_general_usuarioLogic->getparametro_general_usuario()->getcon_mensaje_confirmacion());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->parametro_general_usuarioModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_tipo_fondo') {$this->strMensajeid_tipo_fondo=$strMensajeCampo;}
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='id_sucursal') {$this->strMensajeid_sucursal=$strMensajeCampo;}
		if($strNombreCampo=='id_ejercicio') {$this->strMensajeid_ejercicio=$strMensajeCampo;}
		if($strNombreCampo=='id_periodo') {$this->strMensajeid_periodo=$strMensajeCampo;}
		if($strNombreCampo=='path_exportar') {$this->strMensajepath_exportar=$strMensajeCampo;}
		if($strNombreCampo=='con_exportar_cabecera') {$this->strMensajecon_exportar_cabecera=$strMensajeCampo;}
		if($strNombreCampo=='con_exportar_campo_version') {$this->strMensajecon_exportar_campo_version=$strMensajeCampo;}
		if($strNombreCampo=='con_botones_tool_bar') {$this->strMensajecon_botones_tool_bar=$strMensajeCampo;}
		if($strNombreCampo=='con_cargar_por_parte') {$this->strMensajecon_cargar_por_parte=$strMensajeCampo;}
		if($strNombreCampo=='con_guardar_relaciones') {$this->strMensajecon_guardar_relaciones=$strMensajeCampo;}
		if($strNombreCampo=='con_mostrar_acciones_campo_general') {$this->strMensajecon_mostrar_acciones_campo_general=$strMensajeCampo;}
		if($strNombreCampo=='con_mensaje_confirmacion') {$this->strMensajecon_mensaje_confirmacion=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_tipo_fondo='';
		$this->strMensajeid_empresa='';
		$this->strMensajeid_sucursal='';
		$this->strMensajeid_ejercicio='';
		$this->strMensajeid_periodo='';
		$this->strMensajepath_exportar='';
		$this->strMensajecon_exportar_cabecera='';
		$this->strMensajecon_exportar_campo_version='';
		$this->strMensajecon_botones_tool_bar='';
		$this->strMensajecon_cargar_por_parte='';
		$this->strMensajecon_guardar_relaciones='';
		$this->strMensajecon_mostrar_acciones_campo_general='';
		$this->strMensajecon_mensaje_confirmacion='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
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
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}

			$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));
						
			if($parametro_general_usuario_session==null) {
				$parametro_general_usuario_session=new parametro_general_usuario_session();
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
						$this->parametro_general_usuarioLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->parametro_general_usuarioActual =$this->parametro_general_usuarioClase;
			
			/*$this->parametro_general_usuarioActual =$this->migrarModelparametro_general_usuario($this->parametro_general_usuarioClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->parametro_general_usuarioLogic->getparametro_general_usuarios(),$this->parametro_general_usuarioActual);
			
			$this->actualizarControllerConReturnGeneral($this->parametro_general_usuarioReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
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
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$parametro_general_usuariosLocal=$this->getListaActual();
		
		$iIndice=parametro_general_usuario_util::getIndiceNuevo($parametro_general_usuariosLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(parametro_general_usuario $parametro_general_usuario,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$parametro_general_usuariosLocal=$this->getListaActual();
		
		$iIndice=parametro_general_usuario_util::getIndiceActual($parametro_general_usuariosLocal,$parametro_general_usuario,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevoparametro_general_usuario')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->parametro_general_usuarioActual =$this->parametro_general_usuarioClase;
			
			/*$this->parametro_general_usuarioActual =$this->migrarModelparametro_general_usuario($this->parametro_general_usuarioClase);*/
			
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
			
			$this->parametro_general_usuarioLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('tipo_fondo');$classes[]=$class;
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
			
			$this->parametro_general_usuarioLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->parametro_general_usuarioLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->parametro_general_usuarioLogic->setparametro_general_usuario(new parametro_general_usuario());
				
				$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setIsNew(true);
				$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setIsChanged(true);
				$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->parametro_general_usuarioModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->parametro_general_usuarioLogic->parametro_general_usuarios[]=$this->parametro_general_usuarioLogic->getparametro_general_usuario();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->parametro_general_usuarioLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->parametro_general_usuarioLogic->saveRelaciones($this->parametro_general_usuarioLogic->getparametro_general_usuario());/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setIsChanged(true);
				$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setIsNew(false);
				$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->parametro_general_usuarioModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->parametro_general_usuarioLogic->getparametro_general_usuario(),$this->parametro_general_usuarioLogic->getparametro_general_usuarios());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->parametro_general_usuarioLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->parametro_general_usuarioLogic->saveRelaciones($this->parametro_general_usuarioLogic->getparametro_general_usuario());/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setIsDeleted(true);
				$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setIsNew(false);
				$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setIsChanged(false);				
				
				$this->actualizarLista($this->parametro_general_usuarioLogic->getparametro_general_usuario(),$this->parametro_general_usuarioLogic->getparametro_general_usuarios());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->parametro_general_usuarioLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->parametro_general_usuarioLogic->saveRelaciones($this->parametro_general_usuarioLogic->getparametro_general_usuario());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->parametro_general_usuariosEliminados[]=$this->parametro_general_usuarioLogic->getparametro_general_usuario();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->parametro_general_usuarioLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->parametro_general_usuarioLogic->saveRelaciones($this->parametro_general_usuarioLogic->getparametro_general_usuario());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->parametro_general_usuariosEliminados=array();
				}
			}
			
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('tipo_fondo');$classes[]=$class;
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->parametro_general_usuarioLogic->setparametro_general_usuarios();*/
					
					$this->parametro_general_usuarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->parametro_general_usuarioLogic->setIsConDeepLoad(false);
			
			$this->parametro_general_usuarios=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(parametro_general_usuario_util::$STR_SESSION_NAME.'Lista',serialize($this->parametro_general_usuarios));
				$this->Session->write(parametro_general_usuario_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->parametro_general_usuariosEliminados));
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
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
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
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalparametro_general_usuario;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->parametro_general_usuarioLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->parametro_general_usuarios as $parametro_general_usuarioLocal) {
				if($this->parametro_general_usuarioLogic->getparametro_general_usuario()->getId()==$parametro_general_usuarioLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->parametro_general_usuarioLogic->getparametro_general_usuario()->setIsDeleted(true);
			$this->parametro_general_usuariosEliminados[]=$this->parametro_general_usuarioLogic->getparametro_general_usuario();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->parametro_general_usuarios[$indice]);
				
				$this->parametro_general_usuarios = array_values($this->parametro_general_usuarios);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelparametro_general_usuario($this->parametro_general_usuarioClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(parametro_general_usuario $parametro_general_usuario,array $parametro_general_usuarios) {
		try {
			foreach($parametro_general_usuarios as $parametro_general_usuarioLocal){ 
				if($parametro_general_usuarioLocal->getId()==$parametro_general_usuario->getId()) {
					$parametro_general_usuarioLocal->setIsChanged($parametro_general_usuario->getIsChanged());
					$parametro_general_usuarioLocal->setIsNew($parametro_general_usuario->getIsNew());
					$parametro_general_usuarioLocal->setIsDeleted($parametro_general_usuario->getIsDeleted());
					//$parametro_general_usuarioLocal->setbitExpired($parametro_general_usuario->getbitExpired());
					
					$parametro_general_usuarioLocal->setId($parametro_general_usuario->getId());	
					$parametro_general_usuarioLocal->setVersionRow($parametro_general_usuario->getVersionRow());	
					$parametro_general_usuarioLocal->setVersionRow($parametro_general_usuario->getVersionRow());	
					$parametro_general_usuarioLocal->setid_tipo_fondo($parametro_general_usuario->getid_tipo_fondo());	
					$parametro_general_usuarioLocal->setid_empresa($parametro_general_usuario->getid_empresa());	
					$parametro_general_usuarioLocal->setid_sucursal($parametro_general_usuario->getid_sucursal());	
					$parametro_general_usuarioLocal->setid_ejercicio($parametro_general_usuario->getid_ejercicio());	
					$parametro_general_usuarioLocal->setid_periodo($parametro_general_usuario->getid_periodo());	
					$parametro_general_usuarioLocal->setpath_exportar($parametro_general_usuario->getpath_exportar());	
					$parametro_general_usuarioLocal->setcon_exportar_cabecera($parametro_general_usuario->getcon_exportar_cabecera());	
					$parametro_general_usuarioLocal->setcon_exportar_campo_version($parametro_general_usuario->getcon_exportar_campo_version());	
					$parametro_general_usuarioLocal->setcon_botones_tool_bar($parametro_general_usuario->getcon_botones_tool_bar());	
					$parametro_general_usuarioLocal->setcon_cargar_por_parte($parametro_general_usuario->getcon_cargar_por_parte());	
					$parametro_general_usuarioLocal->setcon_guardar_relaciones($parametro_general_usuario->getcon_guardar_relaciones());	
					$parametro_general_usuarioLocal->setcon_mostrar_acciones_campo_general($parametro_general_usuario->getcon_mostrar_acciones_campo_general());	
					$parametro_general_usuarioLocal->setcon_mensaje_confirmacion($parametro_general_usuario->getcon_mensaje_confirmacion());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$parametro_general_usuariosLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$parametro_general_usuariosLocal=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$parametro_general_usuariosLocal=$this->parametro_general_usuarios;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $parametro_general_usuariosLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->parametro_general_usuarioLogic->getparametro_general_usuarios() as $parametro_general_usuario) {
				if($parametro_general_usuario->getId()==$id) {
					$this->parametro_general_usuarioLogic->setparametro_general_usuario($parametro_general_usuario);
					
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
		/*$parametro_general_usuariosSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->parametro_general_usuarios as $parametro_general_usuario) {
			$parametro_general_usuario->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->parametro_general_usuarios[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : parametro_general_usuario_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));
						
		if($parametro_general_usuario_session==null) {
			$parametro_general_usuario_session=new parametro_general_usuario_session();
		}
		
		
		$this->parametro_general_usuarioReturnGeneral=new parametro_general_usuario_param_return();
		$this->parametro_general_usuarioParameterGeneral=new parametro_general_usuario_param_return();
			
		$this->parametro_general_usuarioParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualparametro_general_usuario(this.parametro_general_usuario,true);
			this.setVariablesFormularioToObjetoActualForeignKeysparametro_general_usuario(this.parametro_general_usuario);*/
			
			if($parametro_general_usuario_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualparametro_general_usuario(this.parametro_general_usuario,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->parametro_general_usuarioActual=$this->parametro_general_usuarioClase;
				
				$this->setCopiarVariablesObjetos($this->parametro_general_usuarioActual,$this->parametro_general_usuario,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->parametro_general_usuarioReturnGeneral=$this->parametro_general_usuarioLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->parametro_general_usuarioLogic->getparametro_general_usuarios(),$this->parametro_general_usuario,$this->parametro_general_usuarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($parametro_general_usuario_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanparametro_general_usuario($classes,$this->parametro_general_usuarioReturnGeneral,$this->parametro_general_usuarioBean,false);*/
				}
					
				if($this->parametro_general_usuarioReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->parametro_general_usuarioReturnGeneral->getparametro_general_usuario(),$this->parametro_general_usuarioActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeyparametro_general_usuario($this->parametro_general_usuarioReturnGeneral->getparametro_general_usuario());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormularioparametro_general_usuario($this->parametro_general_usuarioReturnGeneral->getparametro_general_usuario());*/
				}
					
				if($this->parametro_general_usuarioReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->parametro_general_usuarioReturnGeneral->getparametro_general_usuario(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->parametro_general_usuario,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(parametro_general_usuarioJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualparametro_general_usuario(this.parametro_general_usuario,true);
				this.setVariablesFormularioToObjetoActualForeignKeysparametro_general_usuario(this.parametro_general_usuario);				
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
				
				if($this->parametro_general_usuarioAnterior!=null) {
					$this->parametro_general_usuario=$this->parametro_general_usuarioAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->parametro_general_usuarioReturnGeneral=$this->parametro_general_usuarioLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->parametro_general_usuarioLogic->getparametro_general_usuarios(),$this->parametro_general_usuario,$this->parametro_general_usuarioParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->parametro_general_usuarioReturnGeneral->getparametro_general_usuario(),$this->parametro_general_usuarioLogic->getparametro_general_usuarios());
			*/
		}
		
		return $this->parametro_general_usuarioReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}

			$this->parametro_general_usuarioReturnGeneral=new parametro_general_usuario_param_return();			
			$this->parametro_general_usuarioParameterGeneral=new parametro_general_usuario_param_return();
			
			$this->parametro_general_usuarioParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->parametro_general_usuarioReturnGeneral=$this->parametro_general_usuarioLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->parametro_general_usuarios,$this->parametro_general_usuarioParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->parametro_general_usuarioReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->parametro_general_usuarioReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->parametro_general_usuarioReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
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
		
		$this->parametro_general_usuarioReturnGeneral=new parametro_general_usuario_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_parametro_general_usuario') {
		    $sDominio='parametro_general_usuario';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->parametro_general_usuarioReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->parametro_general_usuarioReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='parametro_general_usuario';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='parametro_general_usuario';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='parametro_general_usuario';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->parametro_general_usuarioReturnGeneral=new parametro_general_usuario_param_return();
		$this->parametro_general_usuarioParameterGeneral=new parametro_general_usuario_param_return();
			
		$this->parametro_general_usuarioParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->parametro_general_usuarioReturnGeneral=$this->parametro_general_usuarioLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->parametro_general_usuarioLogic->getparametro_general_usuarios(),$this->parametro_general_usuario,$this->parametro_general_usuarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->parametro_general_usuarioReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->parametro_general_usuarioReturnGeneral->getparametro_general_usuario(),$classes);*/
		}									
	
		if($this->parametro_general_usuarioReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->parametro_general_usuarioReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->parametro_general_usuarioReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $parametro_general_usuarios,parametro_general_usuario $parametro_general_usuario) {
		
		$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));
						
		if($parametro_general_usuario_session==null) {
			$parametro_general_usuario_session=new parametro_general_usuario_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(parametro_general_usuario_util::$CLASSNAME);
			}	
			*/
			
			$this->parametro_general_usuarioReturnGeneral=new parametro_general_usuario_param_return();
			$this->parametro_general_usuarioParameterGeneral=new parametro_general_usuario_param_return();
			
			$this->parametro_general_usuarioParameterGeneral->setdata($this->data);
		
		
			
		if($parametro_general_usuario_session->conGuardarRelaciones) {
			$classes=parametro_general_usuario_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->parametro_general_usuarioActual,$this->parametro_general_usuario,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->parametro_general_usuarioReturnGeneral=$this->parametro_general_usuarioLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->parametro_general_usuarioLogic->getparametro_general_usuarios(),$this->parametro_general_usuarioActual,$this->parametro_general_usuarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->parametro_general_usuarioReturnGeneral=$this->parametro_general_usuarioLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$parametro_general_usuarios,$parametro_general_usuario,$this->parametro_general_usuarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelparametro_general_usuario($this->parametro_general_usuarioLogic->getparametro_general_usuario());*/
			
			$this->parametro_general_usuario=$this->parametro_general_usuarioLogic->getparametro_general_usuario();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->parametro_general_usuario);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$parametro_general_usuarioActual=new parametro_general_usuario();
			
			if($this->parametro_general_usuarioClase==null) {		
				$this->parametro_general_usuarioClase=new parametro_general_usuario();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$parametro_general_usuarioActual=$this->parametro_general_usuarios[$indice];*/
				
				$parametro_general_usuarioActual->setId($this->data['t'.$this->strSufijo]['cel_'.$i.'_0']);
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setid_tipo_fondo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setpath_exportar($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setcon_exportar_cabecera(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_9')));  } else { $parametro_general_usuarioActual->setcon_exportar_cabecera(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setcon_exportar_campo_version(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_10')));  } else { $parametro_general_usuarioActual->setcon_exportar_campo_version(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setcon_botones_tool_bar(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_11')));  } else { $parametro_general_usuarioActual->setcon_botones_tool_bar(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setcon_cargar_por_parte(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_12')));  } else { $parametro_general_usuarioActual->setcon_cargar_por_parte(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setcon_guardar_relaciones(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_13')));  } else { $parametro_general_usuarioActual->setcon_guardar_relaciones(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setcon_mostrar_acciones_campo_general(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_14')));  } else { $parametro_general_usuarioActual->setcon_mostrar_acciones_campo_general(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $parametro_general_usuarioActual->setcon_mensaje_confirmacion(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_15')));  } else { $parametro_general_usuarioActual->setcon_mensaje_confirmacion(false); }

				$this->parametro_general_usuarioClase=$parametro_general_usuarioActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->parametro_general_usuarioModel->set($this->parametro_general_usuarioClase);
				
				/*$this->parametro_general_usuarioModel->set($this->migrarModelparametro_general_usuario($this->parametro_general_usuarioClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->parametro_general_usuarios=$this->migrarModelparametro_general_usuario($this->parametro_general_usuarioLogic->getparametro_general_usuarios());							
		$this->parametro_general_usuarios=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();*/
		
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
			$this->Session->write(parametro_general_usuario_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$parametro_general_usuario_control_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($parametro_general_usuario_control_session==null) {
				$parametro_general_usuario_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($parametro_general_usuario_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(parametro_general_usuario_util::$STR_SESSION_NAME,$this);*/
		} else {
			$parametro_general_usuario_session=unserialize($this->Session->read(parametro_general_usuario_util::$STR_SESSION_NAME));
			
			if($parametro_general_usuario_session==null) {
				$parametro_general_usuario_session=new parametro_general_usuario_session();
			}
			
			$this->set(parametro_general_usuario_util::$STR_SESSION_NAME, $parametro_general_usuario_session);
		}
	}
	
	public function setCopiarVariablesObjetos(parametro_general_usuario $parametro_general_usuarioOrigen,parametro_general_usuario $parametro_general_usuario,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($parametro_general_usuario==null) {
				$parametro_general_usuario=new parametro_general_usuario();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $parametro_general_usuarioOrigen->getId()!=null && $parametro_general_usuarioOrigen->getId()!=-1)) {$parametro_general_usuario->setId($parametro_general_usuarioOrigen->getId());}}
			if($conDefault || ($conDefault==false && $parametro_general_usuarioOrigen->getid_tipo_fondo()!=null && $parametro_general_usuarioOrigen->getid_tipo_fondo()!=-1)) {$parametro_general_usuario->setid_tipo_fondo($parametro_general_usuarioOrigen->getid_tipo_fondo());}
			if($conDefault || ($conDefault==false && $parametro_general_usuarioOrigen->getid_empresa()!=null && $parametro_general_usuarioOrigen->getid_empresa()!=-1)) {$parametro_general_usuario->setid_empresa($parametro_general_usuarioOrigen->getid_empresa());}
			if($conDefault || ($conDefault==false && $parametro_general_usuarioOrigen->getid_sucursal()!=null && $parametro_general_usuarioOrigen->getid_sucursal()!=-1)) {$parametro_general_usuario->setid_sucursal($parametro_general_usuarioOrigen->getid_sucursal());}
			if($conDefault || ($conDefault==false && $parametro_general_usuarioOrigen->getid_ejercicio()!=null && $parametro_general_usuarioOrigen->getid_ejercicio()!=-1)) {$parametro_general_usuario->setid_ejercicio($parametro_general_usuarioOrigen->getid_ejercicio());}
			if($conDefault || ($conDefault==false && $parametro_general_usuarioOrigen->getid_periodo()!=null && $parametro_general_usuarioOrigen->getid_periodo()!=-1)) {$parametro_general_usuario->setid_periodo($parametro_general_usuarioOrigen->getid_periodo());}
			if($conDefault || ($conDefault==false && $parametro_general_usuarioOrigen->getpath_exportar()!=null && $parametro_general_usuarioOrigen->getpath_exportar()!='')) {$parametro_general_usuario->setpath_exportar($parametro_general_usuarioOrigen->getpath_exportar());}
			if($conDefault || ($conDefault==false && $parametro_general_usuarioOrigen->getcon_exportar_cabecera()!=null && $parametro_general_usuarioOrigen->getcon_exportar_cabecera()!=false)) {$parametro_general_usuario->setcon_exportar_cabecera($parametro_general_usuarioOrigen->getcon_exportar_cabecera());}
			if($conDefault || ($conDefault==false && $parametro_general_usuarioOrigen->getcon_exportar_campo_version()!=null && $parametro_general_usuarioOrigen->getcon_exportar_campo_version()!=false)) {$parametro_general_usuario->setcon_exportar_campo_version($parametro_general_usuarioOrigen->getcon_exportar_campo_version());}
			if($conDefault || ($conDefault==false && $parametro_general_usuarioOrigen->getcon_botones_tool_bar()!=null && $parametro_general_usuarioOrigen->getcon_botones_tool_bar()!=false)) {$parametro_general_usuario->setcon_botones_tool_bar($parametro_general_usuarioOrigen->getcon_botones_tool_bar());}
			if($conDefault || ($conDefault==false && $parametro_general_usuarioOrigen->getcon_cargar_por_parte()!=null && $parametro_general_usuarioOrigen->getcon_cargar_por_parte()!=false)) {$parametro_general_usuario->setcon_cargar_por_parte($parametro_general_usuarioOrigen->getcon_cargar_por_parte());}
			if($conDefault || ($conDefault==false && $parametro_general_usuarioOrigen->getcon_guardar_relaciones()!=null && $parametro_general_usuarioOrigen->getcon_guardar_relaciones()!=false)) {$parametro_general_usuario->setcon_guardar_relaciones($parametro_general_usuarioOrigen->getcon_guardar_relaciones());}
			if($conDefault || ($conDefault==false && $parametro_general_usuarioOrigen->getcon_mostrar_acciones_campo_general()!=null && $parametro_general_usuarioOrigen->getcon_mostrar_acciones_campo_general()!=false)) {$parametro_general_usuario->setcon_mostrar_acciones_campo_general($parametro_general_usuarioOrigen->getcon_mostrar_acciones_campo_general());}
			if($conDefault || ($conDefault==false && $parametro_general_usuarioOrigen->getcon_mensaje_confirmacion()!=null && $parametro_general_usuarioOrigen->getcon_mensaje_confirmacion()!=false)) {$parametro_general_usuario->setcon_mensaje_confirmacion($parametro_general_usuarioOrigen->getcon_mensaje_confirmacion());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$parametro_general_usuariosSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$parametro_general_usuariosSeleccionados[]=$this->parametro_general_usuarios[$indice];
			}
		}
		
		return $parametro_general_usuariosSeleccionados;
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
		$parametro_general_usuario= new parametro_general_usuario();
		
		foreach($this->parametro_general_usuarioLogic->getparametro_general_usuarios() as $parametro_general_usuario) {
			
		}		
		
		if($parametro_general_usuario!=null);
	}
	
	public function cargarRelaciones(array $parametro_general_usuarios=array()) : array {	
		
		$parametro_general_usuariosRespaldo = array();
		$parametro_general_usuariosLocal = array();
		
		parametro_general_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$parametro_general_usuariosResp=array();
		$classes=array();
			
		
			
			
		$parametro_general_usuariosRespaldo=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();
			
		$this->parametro_general_usuarioLogic->setIsConDeep(true);
		
		$this->parametro_general_usuarioLogic->setparametro_general_usuarios($parametro_general_usuarios);
			
		$this->parametro_general_usuarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$parametro_general_usuariosLocal=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();
			
		/*RESPALDO*/
		$this->parametro_general_usuarioLogic->setparametro_general_usuarios($parametro_general_usuariosRespaldo);
			
		$this->parametro_general_usuarioLogic->setIsConDeep(false);
		
		if($parametro_general_usuariosResp!=null);
		
		return $parametro_general_usuariosLocal;
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
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(parametro_general_usuario_session $parametro_general_usuario_session) {
		$parametro_general_usuario_session->strTypeOnLoad=$this->strTypeOnLoadparametro_general_usuario;
		$parametro_general_usuario_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarparametro_general_usuario;
		$parametro_general_usuario_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarparametro_general_usuario;
		$parametro_general_usuario_session->bitEsPopup=$this->bitEsPopup;
		$parametro_general_usuario_session->bitEsBusqueda=$this->bitEsBusqueda;
		$parametro_general_usuario_session->strFuncionJs=$this->strFuncionJs;
		/*$parametro_general_usuario_session->strSufijo=$this->strSufijo;*/
		$parametro_general_usuario_session->bitEsRelaciones=$this->bitEsRelaciones;
		$parametro_general_usuario_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, parametro_general_usuario_util::$STR_NOMBRE_CLASE,0,false,false);				
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
		$parametro_general_usuarioViewAdditional=new parametro_general_usuarioView_add();
		$parametro_general_usuarioViewAdditional->parametro_general_usuarios=$this->parametro_general_usuarios;
		$parametro_general_usuarioViewAdditional->Session=$this->Session;
		
		return $parametro_general_usuarioViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$parametro_general_usuariosLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$parametro_general_usuariosLocal=$this->parametro_general_usuarios;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$parametro_general_usuariosLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($parametro_general_usuariosLocal)<=0) {
					$parametro_general_usuariosLocal=$this->parametro_general_usuarios;
				}
			} else {
				$parametro_general_usuariosLocal=$this->parametro_general_usuarios;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarparametro_general_usuariosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarparametro_general_usuariosAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$parametro_general_usuarioLogic=new parametro_general_usuario_logic();
		$parametro_general_usuarioLogic->setparametro_general_usuarios($this->parametro_general_usuarios);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		 
			
		
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('tipo_fondo');$classes[]=$class;
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$parametro_general_usuarioLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->parametro_general_usuarios=$parametro_general_usuarioLogic->getparametro_general_usuarios();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->parametro_general_usuariosLocal=$this->parametro_general_usuarios;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=parametro_general_usuario_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=parametro_general_usuario_util::$STR_TABLE_NAME;		
			
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
			
			$parametro_general_usuarios = $this->parametro_general_usuarios;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = parametro_general_usuario_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = parametro_general_usuario_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/seguridad/presentation/templating/parametro_general_usuario_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->parametro_general_usuarios=$parametro_general_usuarios;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->parametro_general_usuariosLocal=$parametro_general_usuariosLocal;
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
		
		$parametro_general_usuariosLocal=array();
		
		$parametro_general_usuariosLocal=$this->parametro_general_usuarios;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarparametro_general_usuariosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarparametro_general_usuariosAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$parametro_general_usuarioLogic=new parametro_general_usuario_logic();
		$parametro_general_usuarioLogic->setparametro_general_usuarios($this->parametro_general_usuarios);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		 
			
		
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('tipo_fondo');$classes[]=$class;
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$parametro_general_usuarioLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->parametro_general_usuarios=$parametro_general_usuarioLogic->getparametro_general_usuarios();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$parametro_general_usuarios = $this->parametro_general_usuarios;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = parametro_general_usuario_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = parametro_general_usuario_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/seguridad/presentation/templating/parametro_general_usuario_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->parametro_general_usuarios=$parametro_general_usuarios;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->parametro_general_usuariosLocal=$parametro_general_usuariosLocal;
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
	
	public function getHtmlTablaDatosResumen(array $parametro_general_usuarios=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->parametro_general_usuariosReporte = $parametro_general_usuarios;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarparametro_general_usuariosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarparametro_general_usuariosAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $parametro_general_usuarios=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->parametro_general_usuariosReporte = $parametro_general_usuarios;		
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
		
		
		$this->parametro_general_usuariosReporte=$this->cargarRelaciones($parametro_general_usuarios);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarparametro_general_usuariosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarparametro_general_usuariosAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(parametro_general_usuario $parametro_general_usuario=null) : string {	
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
			
			
			$parametro_general_usuariosLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$parametro_general_usuariosLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($parametro_general_usuariosLocal)<=0) {
					/*//DEBE ESCOGER
					$parametro_general_usuariosLocal=$this->parametro_general_usuarios;*/
				}
			} else {
				/*//DEBE ESCOGER
				$parametro_general_usuariosLocal=$this->parametro_general_usuarios;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($parametro_general_usuariosLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($parametro_general_usuariosLocal,true);
			
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
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
			}
					
			$parametro_general_usuariosLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$parametro_general_usuariosLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($parametro_general_usuariosLocal)<=0) {
					/*//DEBE ESCOGER
					$parametro_general_usuariosLocal=$this->parametro_general_usuarios;*/
				}
			} else {
				/*//DEBE ESCOGER
				$parametro_general_usuariosLocal=$this->parametro_general_usuarios;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($parametro_general_usuariosLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($parametro_general_usuariosLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Parametro Generales';
			
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
			$fileName='parametro_general_usuario';
			
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
			
			$title='Reporte de  Parametro Generales';
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
			
			$title='Reporte de  Parametro Generales';
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
				$this->parametro_general_usuarioLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Parametro Generales';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->commitNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_general_usuarioLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=parametro_general_usuario_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->parametro_general_usuariosAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_general_usuariosAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->parametro_general_usuariosAuxiliar)<=0) {
					$this->parametro_general_usuariosAuxiliar=$this->parametro_general_usuarios;
				}
			} else {
				$this->parametro_general_usuariosAuxiliar=$this->parametro_general_usuarios;
			}
		/*} else {
			$this->parametro_general_usuariosAuxiliar=$this->parametro_general_usuariosReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->parametro_general_usuariosAuxiliar as $parametro_general_usuario) {
				$row=array();
				
				$row=parametro_general_usuario_util::getDataReportRow($tipo,$parametro_general_usuario,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			parametro_general_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$parametro_general_usuariosResp=array();
			$classes=array();
			
			
			
			
			$parametro_general_usuariosResp=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();
			
			$this->parametro_general_usuarioLogic->setIsConDeep(true);
			
			$this->parametro_general_usuarioLogic->setparametro_general_usuarios($this->parametro_general_usuariosAuxiliar);
			
			$this->parametro_general_usuarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->parametro_general_usuariosAuxiliar=$this->parametro_general_usuarioLogic->getparametro_general_usuarios();
			
			//RESPALDO
			$this->parametro_general_usuarioLogic->setparametro_general_usuarios($parametro_general_usuariosResp);
			
			$this->parametro_general_usuarioLogic->setIsConDeep(false);
			*/
			
			$this->parametro_general_usuariosAuxiliar=$this->cargarRelaciones($this->parametro_general_usuariosAuxiliar);
			
			$i=0;
			
			foreach ($this->parametro_general_usuariosAuxiliar as $parametro_general_usuario) {
				$row=array();
				
				if($i!=0) {
					$row=parametro_general_usuario_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=parametro_general_usuario_util::getDataReportRow($tipo,$parametro_general_usuario,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
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
		$this->parametro_general_usuariosAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_general_usuariosAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->parametro_general_usuariosAuxiliar)<=0) {
					$this->parametro_general_usuariosAuxiliar=$this->parametro_general_usuarios;
				}
			} else {
				$this->parametro_general_usuariosAuxiliar=$this->parametro_general_usuarios;
			}
		/*} else {
			$this->parametro_general_usuariosAuxiliar=$this->parametro_general_usuariosReporte;	
		}*/
		
		foreach ($this->parametro_general_usuariosAuxiliar as $parametro_general_usuario) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(parametro_general_usuario_util::getparametro_general_usuarioDescripcion($parametro_general_usuario),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy(' Tipo Fondo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Tipo Fondo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_usuario->getid_tipo_fondoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_usuario->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Sucursal',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Sucursal',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_usuario->getid_sucursalDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Ejercicio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Ejercicio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_usuario->getid_ejercicioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Periodo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Periodo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_usuario->getid_periodoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Path Exportar',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Path Exportar',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_usuario->getpath_exportar(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Exportar Cabecera',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Exportar Cabecera',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_usuario->getcon_exportar_cabecera(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Exportar Campo Version',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Exportar Campo Version',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_usuario->getcon_exportar_campo_version(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Botones Tool Bar',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Botones Tool Bar',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_usuario->getcon_botones_tool_bar(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Cargar Por Parte',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Cargar Por Parte',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_usuario->getcon_cargar_por_parte(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Guardar Relaciones',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Guardar Relaciones',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_usuario->getcon_guardar_relaciones(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Mostrar Acciones Campo General',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Mostrar Acciones Campo General',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_usuario->getcon_mostrar_acciones_campo_general(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Mensaje Confirmacion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Mensaje Confirmacion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_usuario->getcon_mensaje_confirmacion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface parametro_general_usuario_base_controlI {			
		
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
		public function getIndiceActual(parametro_general_usuario $parametro_general_usuario,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(parametro_general_usuario $parametro_general_usuario,array $parametro_general_usuarios);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : parametro_general_usuario_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $parametro_general_usuarios,parametro_general_usuario $parametro_general_usuario);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(parametro_general_usuario_param_return $parametro_general_usuarioReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(parametro_general_usuario_session $parametro_general_usuario_session);		
		public function actualizarInvitadoSessionDivStyleVariables(parametro_general_usuario_session $parametro_general_usuario_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(parametro_general_usuario $parametro_general_usuarioOrigen,parametro_general_usuario $parametro_general_usuario,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(parametro_general_usuario_control $parametro_general_usuario_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $parametro_general_usuarios=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(parametro_general_usuario_session $parametro_general_usuario_session);		
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
		public function getHtmlTablaDatosResumen(array $parametro_general_usuarios=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $parametro_general_usuarios=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(parametro_general_usuario $parametro_general_usuario=null) : string;
		
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
