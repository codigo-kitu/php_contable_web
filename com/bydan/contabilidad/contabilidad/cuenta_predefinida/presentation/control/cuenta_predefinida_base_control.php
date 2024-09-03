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

namespace com\bydan\contabilidad\contabilidad\cuenta_predefinida\presentation\control;

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

use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\entity\cuenta_predefinida;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta_predefinida/util/cuenta_predefinida_carga.php');
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_carga;

use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_util;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_param_return;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\logic\cuenta_predefinida_logic;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\presentation\session\cuenta_predefinida_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\entity\tipo_cuenta_predefinida;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\logic\tipo_cuenta_predefinida_logic;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util\tipo_cuenta_predefinida_carga;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util\tipo_cuenta_predefinida_util;

use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\entity\tipo_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\logic\tipo_cuenta_logic;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_carga;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_util;

use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\entity\tipo_nivel_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\logic\tipo_nivel_cuenta_logic;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\util\tipo_nivel_cuenta_carga;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\util\tipo_nivel_cuenta_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
cuenta_predefinida_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cuenta_predefinida_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cuenta_predefinida_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cuenta_predefinida_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cuenta_predefinida_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class cuenta_predefinida_base_control extends cuenta_predefinida_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->cuenta_predefinidaClase==null) {		
				$this->cuenta_predefinidaClase=new cuenta_predefinida();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_cuenta_predefinida')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_tipo_cuenta_predefinida',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_cuenta')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_tipo_cuenta',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_nivel_cuenta')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_tipo_nivel_cuenta',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->cuenta_predefinidaClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->cuenta_predefinidaClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->cuenta_predefinidaClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->cuenta_predefinidaClase->setid_tipo_cuenta_predefinida((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_cuenta_predefinida'));
				
				$this->cuenta_predefinidaClase->setid_tipo_cuenta((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_cuenta'));
				
				$this->cuenta_predefinidaClase->setid_tipo_nivel_cuenta((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_nivel_cuenta'));
				
				$this->cuenta_predefinidaClase->setcodigo_tabla($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo_tabla'));
				
				$this->cuenta_predefinidaClase->setcodigo_cuenta($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo_cuenta'));
				
				$this->cuenta_predefinidaClase->setnombre_cuenta($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre_cuenta'));
				
				$this->cuenta_predefinidaClase->setmonto_minimo((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'monto_minimo'));
				
				$this->cuenta_predefinidaClase->setvalor_retencion((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'valor_retencion'));
				
				$this->cuenta_predefinidaClase->setbalance((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'balance'));
				
				$this->cuenta_predefinidaClase->setporcentaje_base((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'porcentaje_base'));
				
				$this->cuenta_predefinidaClase->setseleccionar((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'seleccionar'));
				
				$this->cuenta_predefinidaClase->setcentro_costos(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'centro_costos')));
				
				$this->cuenta_predefinidaClase->setretencion(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion')));
				
				$this->cuenta_predefinidaClase->setusa_base(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'usa_base')));
				
				$this->cuenta_predefinidaClase->setnit(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'nit')));
				
				$this->cuenta_predefinidaClase->setmodifica(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'modifica')));
				
				$this->cuenta_predefinidaClase->setultima_transaccion(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'ultima_transaccion')));
				
				$this->cuenta_predefinidaClase->setcomenta1($this->getDataCampoFormTabla('form'.$this->strSufijo,'comenta1'));
				
				$this->cuenta_predefinidaClase->setcomenta2($this->getDataCampoFormTabla('form'.$this->strSufijo,'comenta2'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->cuenta_predefinidaModel->set($this->cuenta_predefinidaClase);
				
				/*$this->cuenta_predefinidaModel->set($this->migrarModelcuenta_predefinida($this->cuenta_predefinidaClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setId($this->cuenta_predefinidaClase->getId());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setVersionRow($this->cuenta_predefinidaClase->getVersionRow());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setVersionRow($this->cuenta_predefinidaClase->getVersionRow());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setid_empresa($this->cuenta_predefinidaClase->getid_empresa());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setid_tipo_cuenta_predefinida($this->cuenta_predefinidaClase->getid_tipo_cuenta_predefinida());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setid_tipo_cuenta($this->cuenta_predefinidaClase->getid_tipo_cuenta());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setid_tipo_nivel_cuenta($this->cuenta_predefinidaClase->getid_tipo_nivel_cuenta());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setcodigo_tabla($this->cuenta_predefinidaClase->getcodigo_tabla());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setcodigo_cuenta($this->cuenta_predefinidaClase->getcodigo_cuenta());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setnombre_cuenta($this->cuenta_predefinidaClase->getnombre_cuenta());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setmonto_minimo($this->cuenta_predefinidaClase->getmonto_minimo());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setvalor_retencion($this->cuenta_predefinidaClase->getvalor_retencion());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setbalance($this->cuenta_predefinidaClase->getbalance());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setporcentaje_base($this->cuenta_predefinidaClase->getporcentaje_base());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setseleccionar($this->cuenta_predefinidaClase->getseleccionar());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setcentro_costos($this->cuenta_predefinidaClase->getcentro_costos());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setretencion($this->cuenta_predefinidaClase->getretencion());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setusa_base($this->cuenta_predefinidaClase->getusa_base());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setnit($this->cuenta_predefinidaClase->getnit());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setmodifica($this->cuenta_predefinidaClase->getmodifica());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setultima_transaccion($this->cuenta_predefinidaClase->getultima_transaccion());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setcomenta1($this->cuenta_predefinidaClase->getcomenta1());	
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setcomenta2($this->cuenta_predefinidaClase->getcomenta2());	
		} else {
			$this->cuenta_predefinidaClase->setId($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getId());	
			$this->cuenta_predefinidaClase->setVersionRow($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getVersionRow());	
			$this->cuenta_predefinidaClase->setVersionRow($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getVersionRow());	
			$this->cuenta_predefinidaClase->setid_empresa($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getid_empresa());	
			$this->cuenta_predefinidaClase->setid_tipo_cuenta_predefinida($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getid_tipo_cuenta_predefinida());	
			$this->cuenta_predefinidaClase->setid_tipo_cuenta($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getid_tipo_cuenta());	
			$this->cuenta_predefinidaClase->setid_tipo_nivel_cuenta($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getid_tipo_nivel_cuenta());	
			$this->cuenta_predefinidaClase->setcodigo_tabla($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getcodigo_tabla());	
			$this->cuenta_predefinidaClase->setcodigo_cuenta($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getcodigo_cuenta());	
			$this->cuenta_predefinidaClase->setnombre_cuenta($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getnombre_cuenta());	
			$this->cuenta_predefinidaClase->setmonto_minimo($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getmonto_minimo());	
			$this->cuenta_predefinidaClase->setvalor_retencion($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getvalor_retencion());	
			$this->cuenta_predefinidaClase->setbalance($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getbalance());	
			$this->cuenta_predefinidaClase->setporcentaje_base($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getporcentaje_base());	
			$this->cuenta_predefinidaClase->setseleccionar($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getseleccionar());	
			$this->cuenta_predefinidaClase->setcentro_costos($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getcentro_costos());	
			$this->cuenta_predefinidaClase->setretencion($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getretencion());	
			$this->cuenta_predefinidaClase->setusa_base($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getusa_base());	
			$this->cuenta_predefinidaClase->setnit($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getnit());	
			$this->cuenta_predefinidaClase->setmodifica($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getmodifica());	
			$this->cuenta_predefinidaClase->setultima_transaccion($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getultima_transaccion());	
			$this->cuenta_predefinidaClase->setcomenta1($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getcomenta1());	
			$this->cuenta_predefinidaClase->setcomenta2($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getcomenta2());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->cuenta_predefinidaModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='id_tipo_cuenta_predefinida') {$this->strMensajeid_tipo_cuenta_predefinida=$strMensajeCampo;}
		if($strNombreCampo=='id_tipo_cuenta') {$this->strMensajeid_tipo_cuenta=$strMensajeCampo;}
		if($strNombreCampo=='id_tipo_nivel_cuenta') {$this->strMensajeid_tipo_nivel_cuenta=$strMensajeCampo;}
		if($strNombreCampo=='codigo_tabla') {$this->strMensajecodigo_tabla=$strMensajeCampo;}
		if($strNombreCampo=='codigo_cuenta') {$this->strMensajecodigo_cuenta=$strMensajeCampo;}
		if($strNombreCampo=='nombre_cuenta') {$this->strMensajenombre_cuenta=$strMensajeCampo;}
		if($strNombreCampo=='monto_minimo') {$this->strMensajemonto_minimo=$strMensajeCampo;}
		if($strNombreCampo=='valor_retencion') {$this->strMensajevalor_retencion=$strMensajeCampo;}
		if($strNombreCampo=='balance') {$this->strMensajebalance=$strMensajeCampo;}
		if($strNombreCampo=='porcentaje_base') {$this->strMensajeporcentaje_base=$strMensajeCampo;}
		if($strNombreCampo=='seleccionar') {$this->strMensajeseleccionar=$strMensajeCampo;}
		if($strNombreCampo=='centro_costos') {$this->strMensajecentro_costos=$strMensajeCampo;}
		if($strNombreCampo=='retencion') {$this->strMensajeretencion=$strMensajeCampo;}
		if($strNombreCampo=='usa_base') {$this->strMensajeusa_base=$strMensajeCampo;}
		if($strNombreCampo=='nit') {$this->strMensajenit=$strMensajeCampo;}
		if($strNombreCampo=='modifica') {$this->strMensajemodifica=$strMensajeCampo;}
		if($strNombreCampo=='ultima_transaccion') {$this->strMensajeultima_transaccion=$strMensajeCampo;}
		if($strNombreCampo=='comenta1') {$this->strMensajecomenta1=$strMensajeCampo;}
		if($strNombreCampo=='comenta2') {$this->strMensajecomenta2=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeid_tipo_cuenta_predefinida='';
		$this->strMensajeid_tipo_cuenta='';
		$this->strMensajeid_tipo_nivel_cuenta='';
		$this->strMensajecodigo_tabla='';
		$this->strMensajecodigo_cuenta='';
		$this->strMensajenombre_cuenta='';
		$this->strMensajemonto_minimo='';
		$this->strMensajevalor_retencion='';
		$this->strMensajebalance='';
		$this->strMensajeporcentaje_base='';
		$this->strMensajeseleccionar='';
		$this->strMensajecentro_costos='';
		$this->strMensajeretencion='';
		$this->strMensajeusa_base='';
		$this->strMensajenit='';
		$this->strMensajemodifica='';
		$this->strMensajeultima_transaccion='';
		$this->strMensajecomenta1='';
		$this->strMensajecomenta2='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
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
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}

			$cuenta_predefinida_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME));
						
			if($cuenta_predefinida_session==null) {
				$cuenta_predefinida_session=new cuenta_predefinida_session();
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
						$this->cuenta_predefinidaLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->cuenta_predefinidaActual =$this->cuenta_predefinidaClase;
			
			/*$this->cuenta_predefinidaActual =$this->migrarModelcuenta_predefinida($this->cuenta_predefinidaClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->cuenta_predefinidaLogic->getcuenta_predefinidas(),$this->cuenta_predefinidaActual);
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_predefinidaReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
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
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$cuenta_predefinidasLocal=$this->getListaActual();
		
		$iIndice=cuenta_predefinida_util::getIndiceNuevo($cuenta_predefinidasLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(cuenta_predefinida $cuenta_predefinida,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$cuenta_predefinidasLocal=$this->getListaActual();
		
		$iIndice=cuenta_predefinida_util::getIndiceActual($cuenta_predefinidasLocal,$cuenta_predefinida,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevocuenta_predefinida')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->cuenta_predefinidaActual =$this->cuenta_predefinidaClase;
			
			/*$this->cuenta_predefinidaActual =$this->migrarModelcuenta_predefinida($this->cuenta_predefinidaClase);*/
			
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
			
			$this->cuenta_predefinidaLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_cuenta_predefinida');$classes[]=$class;
				$class=new Classe('tipo_cuenta');$classes[]=$class;
				$class=new Classe('tipo_nivel_cuenta');$classes[]=$class;
			
			$this->cuenta_predefinidaLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->cuenta_predefinidaLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->cuenta_predefinidaLogic->setcuenta_predefinida(new cuenta_predefinida());
				
				$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setIsNew(true);
				$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setIsChanged(true);
				$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->cuenta_predefinidaModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->cuenta_predefinidaLogic->cuenta_predefinidas[]=$this->cuenta_predefinidaLogic->getcuenta_predefinida();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_predefinidaLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->cuenta_predefinidaLogic->saveRelaciones($this->cuenta_predefinidaLogic->getcuenta_predefinida());/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setIsChanged(true);
				$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setIsNew(false);
				$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->cuenta_predefinidaModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->cuenta_predefinidaLogic->getcuenta_predefinida(),$this->cuenta_predefinidaLogic->getcuenta_predefinidas());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_predefinidaLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->cuenta_predefinidaLogic->saveRelaciones($this->cuenta_predefinidaLogic->getcuenta_predefinida());/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setIsDeleted(true);
				$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setIsNew(false);
				$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setIsChanged(false);				
				
				$this->actualizarLista($this->cuenta_predefinidaLogic->getcuenta_predefinida(),$this->cuenta_predefinidaLogic->getcuenta_predefinidas());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuenta_predefinidaLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->cuenta_predefinidaLogic->saveRelaciones($this->cuenta_predefinidaLogic->getcuenta_predefinida());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->cuenta_predefinidasEliminados[]=$this->cuenta_predefinidaLogic->getcuenta_predefinida();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuenta_predefinidaLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->cuenta_predefinidaLogic->saveRelaciones($this->cuenta_predefinidaLogic->getcuenta_predefinida());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->cuenta_predefinidasEliminados=array();
				}
			}
			
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_cuenta_predefinida');$classes[]=$class;
				$class=new Classe('tipo_cuenta');$classes[]=$class;
				$class=new Classe('tipo_nivel_cuenta');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->cuenta_predefinidaLogic->setcuenta_predefinidas();*/
					
					$this->cuenta_predefinidaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->cuenta_predefinidaLogic->setIsConDeepLoad(false);
			
			$this->cuenta_predefinidas=$this->cuenta_predefinidaLogic->getcuenta_predefinidas();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(cuenta_predefinida_util::$STR_SESSION_NAME.'Lista',serialize($this->cuenta_predefinidas));
				$this->Session->write(cuenta_predefinida_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->cuenta_predefinidasEliminados));
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
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
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
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalcuenta_predefinida;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->cuenta_predefinidaLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->cuenta_predefinidas as $cuenta_predefinidaLocal) {
				if($this->cuenta_predefinidaLogic->getcuenta_predefinida()->getId()==$cuenta_predefinidaLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->cuenta_predefinidaLogic->getcuenta_predefinida()->setIsDeleted(true);
			$this->cuenta_predefinidasEliminados[]=$this->cuenta_predefinidaLogic->getcuenta_predefinida();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->cuenta_predefinidas[$indice]);
				
				$this->cuenta_predefinidas = array_values($this->cuenta_predefinidas);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelcuenta_predefinida($this->cuenta_predefinidaClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(cuenta_predefinida $cuenta_predefinida,array $cuenta_predefinidas) {
		try {
			foreach($cuenta_predefinidas as $cuenta_predefinidaLocal){ 
				if($cuenta_predefinidaLocal->getId()==$cuenta_predefinida->getId()) {
					$cuenta_predefinidaLocal->setIsChanged($cuenta_predefinida->getIsChanged());
					$cuenta_predefinidaLocal->setIsNew($cuenta_predefinida->getIsNew());
					$cuenta_predefinidaLocal->setIsDeleted($cuenta_predefinida->getIsDeleted());
					//$cuenta_predefinidaLocal->setbitExpired($cuenta_predefinida->getbitExpired());
					
					$cuenta_predefinidaLocal->setId($cuenta_predefinida->getId());	
					$cuenta_predefinidaLocal->setVersionRow($cuenta_predefinida->getVersionRow());	
					$cuenta_predefinidaLocal->setVersionRow($cuenta_predefinida->getVersionRow());	
					$cuenta_predefinidaLocal->setid_empresa($cuenta_predefinida->getid_empresa());	
					$cuenta_predefinidaLocal->setid_tipo_cuenta_predefinida($cuenta_predefinida->getid_tipo_cuenta_predefinida());	
					$cuenta_predefinidaLocal->setid_tipo_cuenta($cuenta_predefinida->getid_tipo_cuenta());	
					$cuenta_predefinidaLocal->setid_tipo_nivel_cuenta($cuenta_predefinida->getid_tipo_nivel_cuenta());	
					$cuenta_predefinidaLocal->setcodigo_tabla($cuenta_predefinida->getcodigo_tabla());	
					$cuenta_predefinidaLocal->setcodigo_cuenta($cuenta_predefinida->getcodigo_cuenta());	
					$cuenta_predefinidaLocal->setnombre_cuenta($cuenta_predefinida->getnombre_cuenta());	
					$cuenta_predefinidaLocal->setmonto_minimo($cuenta_predefinida->getmonto_minimo());	
					$cuenta_predefinidaLocal->setvalor_retencion($cuenta_predefinida->getvalor_retencion());	
					$cuenta_predefinidaLocal->setbalance($cuenta_predefinida->getbalance());	
					$cuenta_predefinidaLocal->setporcentaje_base($cuenta_predefinida->getporcentaje_base());	
					$cuenta_predefinidaLocal->setseleccionar($cuenta_predefinida->getseleccionar());	
					$cuenta_predefinidaLocal->setcentro_costos($cuenta_predefinida->getcentro_costos());	
					$cuenta_predefinidaLocal->setretencion($cuenta_predefinida->getretencion());	
					$cuenta_predefinidaLocal->setusa_base($cuenta_predefinida->getusa_base());	
					$cuenta_predefinidaLocal->setnit($cuenta_predefinida->getnit());	
					$cuenta_predefinidaLocal->setmodifica($cuenta_predefinida->getmodifica());	
					$cuenta_predefinidaLocal->setultima_transaccion($cuenta_predefinida->getultima_transaccion());	
					$cuenta_predefinidaLocal->setcomenta1($cuenta_predefinida->getcomenta1());	
					$cuenta_predefinidaLocal->setcomenta2($cuenta_predefinida->getcomenta2());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$cuenta_predefinidasLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$cuenta_predefinidasLocal=$this->cuenta_predefinidaLogic->getcuenta_predefinidas();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$cuenta_predefinidasLocal=$this->cuenta_predefinidas;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $cuenta_predefinidasLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->cuenta_predefinidaLogic->getcuenta_predefinidas() as $cuenta_predefinida) {
				if($cuenta_predefinida->getId()==$id) {
					$this->cuenta_predefinidaLogic->setcuenta_predefinida($cuenta_predefinida);
					
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
		/*$cuenta_predefinidasSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->cuenta_predefinidas as $cuenta_predefinida) {
			$cuenta_predefinida->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->cuenta_predefinidas[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : cuenta_predefinida_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$cuenta_predefinida_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME));
						
		if($cuenta_predefinida_session==null) {
			$cuenta_predefinida_session=new cuenta_predefinida_session();
		}
		
		
		$this->cuenta_predefinidaReturnGeneral=new cuenta_predefinida_param_return();
		$this->cuenta_predefinidaParameterGeneral=new cuenta_predefinida_param_return();
			
		$this->cuenta_predefinidaParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualcuenta_predefinida(this.cuenta_predefinida,true);
			this.setVariablesFormularioToObjetoActualForeignKeyscuenta_predefinida(this.cuenta_predefinida);*/
			
			if($cuenta_predefinida_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualcuenta_predefinida(this.cuenta_predefinida,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->cuenta_predefinidaActual=$this->cuenta_predefinidaClase;
				
				$this->setCopiarVariablesObjetos($this->cuenta_predefinidaActual,$this->cuenta_predefinida,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_predefinidaReturnGeneral=$this->cuenta_predefinidaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->cuenta_predefinidaLogic->getcuenta_predefinidas(),$this->cuenta_predefinida,$this->cuenta_predefinidaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($cuenta_predefinida_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeancuenta_predefinida($classes,$this->cuenta_predefinidaReturnGeneral,$this->cuenta_predefinidaBean,false);*/
				}
					
				if($this->cuenta_predefinidaReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->cuenta_predefinidaReturnGeneral->getcuenta_predefinida(),$this->cuenta_predefinidaActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeycuenta_predefinida($this->cuenta_predefinidaReturnGeneral->getcuenta_predefinida());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariocuenta_predefinida($this->cuenta_predefinidaReturnGeneral->getcuenta_predefinida());*/
				}
					
				if($this->cuenta_predefinidaReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta_predefinidaReturnGeneral->getcuenta_predefinida(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta_predefinida,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(cuenta_predefinidaJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualcuenta_predefinida(this.cuenta_predefinida,true);
				this.setVariablesFormularioToObjetoActualForeignKeyscuenta_predefinida(this.cuenta_predefinida);				
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
				
				if($this->cuenta_predefinidaAnterior!=null) {
					$this->cuenta_predefinida=$this->cuenta_predefinidaAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->cuenta_predefinidaReturnGeneral=$this->cuenta_predefinidaLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->cuenta_predefinidaLogic->getcuenta_predefinidas(),$this->cuenta_predefinida,$this->cuenta_predefinidaParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->cuenta_predefinidaReturnGeneral->getcuenta_predefinida(),$this->cuenta_predefinidaLogic->getcuenta_predefinidas());
			*/
		}
		
		return $this->cuenta_predefinidaReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}

			$this->cuenta_predefinidaReturnGeneral=new cuenta_predefinida_param_return();			
			$this->cuenta_predefinidaParameterGeneral=new cuenta_predefinida_param_return();
			
			$this->cuenta_predefinidaParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->cuenta_predefinidaReturnGeneral=$this->cuenta_predefinidaLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->cuenta_predefinidas,$this->cuenta_predefinidaParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->cuenta_predefinidaReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_predefinidaReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->cuenta_predefinidaReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
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
		
		$this->cuenta_predefinidaReturnGeneral=new cuenta_predefinida_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_cuenta_predefinida') {
		    $sDominio='cuenta_predefinida';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->cuenta_predefinidaReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->cuenta_predefinidaReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='cuenta_predefinida';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='cuenta_predefinida';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='cuenta_predefinida';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->cuenta_predefinidaReturnGeneral=new cuenta_predefinida_param_return();
		$this->cuenta_predefinidaParameterGeneral=new cuenta_predefinida_param_return();
			
		$this->cuenta_predefinidaParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->cuenta_predefinidaReturnGeneral=$this->cuenta_predefinidaLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->cuenta_predefinidaLogic->getcuenta_predefinidas(),$this->cuenta_predefinida,$this->cuenta_predefinidaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->cuenta_predefinidaReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta_predefinidaReturnGeneral->getcuenta_predefinida(),$classes);*/
		}									
	
		if($this->cuenta_predefinidaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->cuenta_predefinidaReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->cuenta_predefinidaReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $cuenta_predefinidas,cuenta_predefinida $cuenta_predefinida) {
		
		$cuenta_predefinida_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME));
						
		if($cuenta_predefinida_session==null) {
			$cuenta_predefinida_session=new cuenta_predefinida_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(cuenta_predefinida_util::$CLASSNAME);
			}	
			*/
			
			$this->cuenta_predefinidaReturnGeneral=new cuenta_predefinida_param_return();
			$this->cuenta_predefinidaParameterGeneral=new cuenta_predefinida_param_return();
			
			$this->cuenta_predefinidaParameterGeneral->setdata($this->data);
		
		
			
		if($cuenta_predefinida_session->conGuardarRelaciones) {
			$classes=cuenta_predefinida_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->cuenta_predefinidaActual,$this->cuenta_predefinida,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->cuenta_predefinidaReturnGeneral=$this->cuenta_predefinidaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->cuenta_predefinidaLogic->getcuenta_predefinidas(),$this->cuenta_predefinidaActual,$this->cuenta_predefinidaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->cuenta_predefinidaReturnGeneral=$this->cuenta_predefinidaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$cuenta_predefinidas,$cuenta_predefinida,$this->cuenta_predefinidaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelcuenta_predefinida($this->cuenta_predefinidaLogic->getcuenta_predefinida());*/
			
			$this->cuenta_predefinida=$this->cuenta_predefinidaLogic->getcuenta_predefinida();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->cuenta_predefinida);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$cuenta_predefinidaActual=new cuenta_predefinida();
			
			if($this->cuenta_predefinidaClase==null) {		
				$this->cuenta_predefinidaClase=new cuenta_predefinida();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$cuenta_predefinidaActual=$this->cuenta_predefinidas[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setid_tipo_cuenta_predefinida((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setid_tipo_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setid_tipo_nivel_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setcodigo_tabla($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setcodigo_cuenta($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setnombre_cuenta($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setmonto_minimo((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setvalor_retencion((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setbalance((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setporcentaje_base((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setseleccionar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setcentro_costos(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_15')));  } else { $cuenta_predefinidaActual->setcentro_costos(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setretencion(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_16')));  } else { $cuenta_predefinidaActual->setretencion(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setusa_base(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_17')));  } else { $cuenta_predefinidaActual->setusa_base(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setnit(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_18')));  } else { $cuenta_predefinidaActual->setnit(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setmodifica(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_19')));  } else { $cuenta_predefinidaActual->setmodifica(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setultima_transaccion(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setcomenta1($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $cuenta_predefinidaActual->setcomenta2($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_22'));  }

				$this->cuenta_predefinidaClase=$cuenta_predefinidaActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->cuenta_predefinidaModel->set($this->cuenta_predefinidaClase);
				
				/*$this->cuenta_predefinidaModel->set($this->migrarModelcuenta_predefinida($this->cuenta_predefinidaClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->cuenta_predefinidas=$this->migrarModelcuenta_predefinida($this->cuenta_predefinidaLogic->getcuenta_predefinidas());							
		$this->cuenta_predefinidas=$this->cuenta_predefinidaLogic->getcuenta_predefinidas();*/
		
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
			$this->Session->write(cuenta_predefinida_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$cuenta_predefinida_control_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($cuenta_predefinida_control_session==null) {
				$cuenta_predefinida_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($cuenta_predefinida_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(cuenta_predefinida_util::$STR_SESSION_NAME,$this);*/
		} else {
			$cuenta_predefinida_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME));
			
			if($cuenta_predefinida_session==null) {
				$cuenta_predefinida_session=new cuenta_predefinida_session();
			}
			
			$this->set(cuenta_predefinida_util::$STR_SESSION_NAME, $cuenta_predefinida_session);
		}
	}
	
	public function setCopiarVariablesObjetos(cuenta_predefinida $cuenta_predefinidaOrigen,cuenta_predefinida $cuenta_predefinida,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($cuenta_predefinida==null) {
				$cuenta_predefinida=new cuenta_predefinida();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $cuenta_predefinidaOrigen->getId()!=null && $cuenta_predefinidaOrigen->getId()!=0)) {$cuenta_predefinida->setId($cuenta_predefinidaOrigen->getId());}}
			if($conDefault || ($conDefault==false && $cuenta_predefinidaOrigen->getid_tipo_cuenta_predefinida()!=null && $cuenta_predefinidaOrigen->getid_tipo_cuenta_predefinida()!=-1)) {$cuenta_predefinida->setid_tipo_cuenta_predefinida($cuenta_predefinidaOrigen->getid_tipo_cuenta_predefinida());}
			if($conDefault || ($conDefault==false && $cuenta_predefinidaOrigen->getid_tipo_cuenta()!=null && $cuenta_predefinidaOrigen->getid_tipo_cuenta()!=-1)) {$cuenta_predefinida->setid_tipo_cuenta($cuenta_predefinidaOrigen->getid_tipo_cuenta());}
			if($conDefault || ($conDefault==false && $cuenta_predefinidaOrigen->getid_tipo_nivel_cuenta()!=null && $cuenta_predefinidaOrigen->getid_tipo_nivel_cuenta()!=-1)) {$cuenta_predefinida->setid_tipo_nivel_cuenta($cuenta_predefinidaOrigen->getid_tipo_nivel_cuenta());}
			if($conDefault || ($conDefault==false && $cuenta_predefinidaOrigen->getcodigo_tabla()!=null && $cuenta_predefinidaOrigen->getcodigo_tabla()!='')) {$cuenta_predefinida->setcodigo_tabla($cuenta_predefinidaOrigen->getcodigo_tabla());}
			if($conDefault || ($conDefault==false && $cuenta_predefinidaOrigen->getcodigo_cuenta()!=null && $cuenta_predefinidaOrigen->getcodigo_cuenta()!='')) {$cuenta_predefinida->setcodigo_cuenta($cuenta_predefinidaOrigen->getcodigo_cuenta());}
			if($conDefault || ($conDefault==false && $cuenta_predefinidaOrigen->getnombre_cuenta()!=null && $cuenta_predefinidaOrigen->getnombre_cuenta()!='')) {$cuenta_predefinida->setnombre_cuenta($cuenta_predefinidaOrigen->getnombre_cuenta());}
			if($conDefault || ($conDefault==false && $cuenta_predefinidaOrigen->getmonto_minimo()!=null && $cuenta_predefinidaOrigen->getmonto_minimo()!=0.0)) {$cuenta_predefinida->setmonto_minimo($cuenta_predefinidaOrigen->getmonto_minimo());}
			if($conDefault || ($conDefault==false && $cuenta_predefinidaOrigen->getvalor_retencion()!=null && $cuenta_predefinidaOrigen->getvalor_retencion()!=0.0)) {$cuenta_predefinida->setvalor_retencion($cuenta_predefinidaOrigen->getvalor_retencion());}
			if($conDefault || ($conDefault==false && $cuenta_predefinidaOrigen->getbalance()!=null && $cuenta_predefinidaOrigen->getbalance()!=0.0)) {$cuenta_predefinida->setbalance($cuenta_predefinidaOrigen->getbalance());}
			if($conDefault || ($conDefault==false && $cuenta_predefinidaOrigen->getporcentaje_base()!=null && $cuenta_predefinidaOrigen->getporcentaje_base()!=0.0)) {$cuenta_predefinida->setporcentaje_base($cuenta_predefinidaOrigen->getporcentaje_base());}
			if($conDefault || ($conDefault==false && $cuenta_predefinidaOrigen->getseleccionar()!=null && $cuenta_predefinidaOrigen->getseleccionar()!=0)) {$cuenta_predefinida->setseleccionar($cuenta_predefinidaOrigen->getseleccionar());}
			if($conDefault || ($conDefault==false && $cuenta_predefinidaOrigen->getcentro_costos()!=null && $cuenta_predefinidaOrigen->getcentro_costos()!=false)) {$cuenta_predefinida->setcentro_costos($cuenta_predefinidaOrigen->getcentro_costos());}
			if($conDefault || ($conDefault==false && $cuenta_predefinidaOrigen->getretencion()!=null && $cuenta_predefinidaOrigen->getretencion()!=false)) {$cuenta_predefinida->setretencion($cuenta_predefinidaOrigen->getretencion());}
			if($conDefault || ($conDefault==false && $cuenta_predefinidaOrigen->getusa_base()!=null && $cuenta_predefinidaOrigen->getusa_base()!=false)) {$cuenta_predefinida->setusa_base($cuenta_predefinidaOrigen->getusa_base());}
			if($conDefault || ($conDefault==false && $cuenta_predefinidaOrigen->getnit()!=null && $cuenta_predefinidaOrigen->getnit()!=false)) {$cuenta_predefinida->setnit($cuenta_predefinidaOrigen->getnit());}
			if($conDefault || ($conDefault==false && $cuenta_predefinidaOrigen->getmodifica()!=null && $cuenta_predefinidaOrigen->getmodifica()!=false)) {$cuenta_predefinida->setmodifica($cuenta_predefinidaOrigen->getmodifica());}
			if($conDefault || ($conDefault==false && $cuenta_predefinidaOrigen->getultima_transaccion()!=null && $cuenta_predefinidaOrigen->getultima_transaccion()!=date('Y-m-d'))) {$cuenta_predefinida->setultima_transaccion($cuenta_predefinidaOrigen->getultima_transaccion());}
			if($conDefault || ($conDefault==false && $cuenta_predefinidaOrigen->getcomenta1()!=null && $cuenta_predefinidaOrigen->getcomenta1()!='')) {$cuenta_predefinida->setcomenta1($cuenta_predefinidaOrigen->getcomenta1());}
			if($conDefault || ($conDefault==false && $cuenta_predefinidaOrigen->getcomenta2()!=null && $cuenta_predefinidaOrigen->getcomenta2()!='')) {$cuenta_predefinida->setcomenta2($cuenta_predefinidaOrigen->getcomenta2());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$cuenta_predefinidasSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$cuenta_predefinidasSeleccionados[]=$this->cuenta_predefinidas[$indice];
			}
		}
		
		return $cuenta_predefinidasSeleccionados;
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
		$cuenta_predefinida= new cuenta_predefinida();
		
		foreach($this->cuenta_predefinidaLogic->getcuenta_predefinidas() as $cuenta_predefinida) {
			
		}		
		
		if($cuenta_predefinida!=null);
	}
	
	public function cargarRelaciones(array $cuenta_predefinidas=array()) : array {	
		
		$cuenta_predefinidasRespaldo = array();
		$cuenta_predefinidasLocal = array();
		
		cuenta_predefinida_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$cuenta_predefinidasResp=array();
		$classes=array();
			
		
			
			
		$cuenta_predefinidasRespaldo=$this->cuenta_predefinidaLogic->getcuenta_predefinidas();
			
		$this->cuenta_predefinidaLogic->setIsConDeep(true);
		
		$this->cuenta_predefinidaLogic->setcuenta_predefinidas($cuenta_predefinidas);
			
		$this->cuenta_predefinidaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$cuenta_predefinidasLocal=$this->cuenta_predefinidaLogic->getcuenta_predefinidas();
			
		/*RESPALDO*/
		$this->cuenta_predefinidaLogic->setcuenta_predefinidas($cuenta_predefinidasRespaldo);
			
		$this->cuenta_predefinidaLogic->setIsConDeep(false);
		
		if($cuenta_predefinidasResp!=null);
		
		return $cuenta_predefinidasLocal;
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
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(cuenta_predefinida_session $cuenta_predefinida_session) {
		$cuenta_predefinida_session->strTypeOnLoad=$this->strTypeOnLoadcuenta_predefinida;
		$cuenta_predefinida_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarcuenta_predefinida;
		$cuenta_predefinida_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarcuenta_predefinida;
		$cuenta_predefinida_session->bitEsPopup=$this->bitEsPopup;
		$cuenta_predefinida_session->bitEsBusqueda=$this->bitEsBusqueda;
		$cuenta_predefinida_session->strFuncionJs=$this->strFuncionJs;
		/*$cuenta_predefinida_session->strSufijo=$this->strSufijo;*/
		$cuenta_predefinida_session->bitEsRelaciones=$this->bitEsRelaciones;
		$cuenta_predefinida_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_predefinida_util::$STR_NOMBRE_CLASE,0,false,false);				
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
		$cuenta_predefinidaViewAdditional=new cuenta_predefinidaView_add();
		$cuenta_predefinidaViewAdditional->cuenta_predefinidas=$this->cuenta_predefinidas;
		$cuenta_predefinidaViewAdditional->Session=$this->Session;
		
		return $cuenta_predefinidaViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$cuenta_predefinidasLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$cuenta_predefinidasLocal=$this->cuenta_predefinidas;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$cuenta_predefinidasLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($cuenta_predefinidasLocal)<=0) {
					$cuenta_predefinidasLocal=$this->cuenta_predefinidas;
				}
			} else {
				$cuenta_predefinidasLocal=$this->cuenta_predefinidas;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuenta_predefinidasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuenta_predefinidasAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$cuenta_predefinidaLogic=new cuenta_predefinida_logic();
		$cuenta_predefinidaLogic->setcuenta_predefinidas($this->cuenta_predefinidas);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_cuenta_predefinida');$classes[]=$class;
			$class=new Classe('tipo_cuenta');$classes[]=$class;
			$class=new Classe('tipo_nivel_cuenta');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$cuenta_predefinidaLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->cuenta_predefinidas=$cuenta_predefinidaLogic->getcuenta_predefinidas();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->cuenta_predefinidasLocal=$this->cuenta_predefinidas;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=cuenta_predefinida_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=cuenta_predefinida_util::$STR_TABLE_NAME;		
			
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
			
			$cuenta_predefinidas = $this->cuenta_predefinidas;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = cuenta_predefinida_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = cuenta_predefinida_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/contabilidad/presentation/templating/cuenta_predefinida_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->cuenta_predefinidas=$cuenta_predefinidas;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->cuenta_predefinidasLocal=$cuenta_predefinidasLocal;
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
		
		$cuenta_predefinidasLocal=array();
		
		$cuenta_predefinidasLocal=$this->cuenta_predefinidas;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuenta_predefinidasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuenta_predefinidasAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$cuenta_predefinidaLogic=new cuenta_predefinida_logic();
		$cuenta_predefinidaLogic->setcuenta_predefinidas($this->cuenta_predefinidas);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_cuenta_predefinida');$classes[]=$class;
			$class=new Classe('tipo_cuenta');$classes[]=$class;
			$class=new Classe('tipo_nivel_cuenta');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$cuenta_predefinidaLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->cuenta_predefinidas=$cuenta_predefinidaLogic->getcuenta_predefinidas();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$cuenta_predefinidas = $this->cuenta_predefinidas;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = cuenta_predefinida_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = cuenta_predefinida_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/contabilidad/presentation/templating/cuenta_predefinida_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->cuenta_predefinidas=$cuenta_predefinidas;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->cuenta_predefinidasLocal=$cuenta_predefinidasLocal;
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
	
	public function getHtmlTablaDatosResumen(array $cuenta_predefinidas=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->cuenta_predefinidasReporte = $cuenta_predefinidas;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuenta_predefinidasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuenta_predefinidasAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $cuenta_predefinidas=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->cuenta_predefinidasReporte = $cuenta_predefinidas;		
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
		
		
		$this->cuenta_predefinidasReporte=$this->cargarRelaciones($cuenta_predefinidas);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuenta_predefinidasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuenta_predefinidasAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(cuenta_predefinida $cuenta_predefinida=null) : string {	
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
			
			
			$cuenta_predefinidasLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$cuenta_predefinidasLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($cuenta_predefinidasLocal)<=0) {
					/*//DEBE ESCOGER
					$cuenta_predefinidasLocal=$this->cuenta_predefinidas;*/
				}
			} else {
				/*//DEBE ESCOGER
				$cuenta_predefinidasLocal=$this->cuenta_predefinidas;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($cuenta_predefinidasLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($cuenta_predefinidasLocal,true);
			
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
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
			}
					
			$cuenta_predefinidasLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$cuenta_predefinidasLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($cuenta_predefinidasLocal)<=0) {
					/*//DEBE ESCOGER
					$cuenta_predefinidasLocal=$this->cuenta_predefinidas;*/
				}
			} else {
				/*//DEBE ESCOGER
				$cuenta_predefinidasLocal=$this->cuenta_predefinidas;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($cuenta_predefinidasLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($cuenta_predefinidasLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Cuentas Predefinidases';
			
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
			$fileName='cuenta_predefinida';
			
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
			
			$title='Reporte de  Cuentas Predefinidases';
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
			
			$title='Reporte de  Cuentas Predefinidases';
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
				$this->cuenta_predefinidaLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Cuentas Predefinidases';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=cuenta_predefinida_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->cuenta_predefinidasAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_predefinidasAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->cuenta_predefinidasAuxiliar)<=0) {
					$this->cuenta_predefinidasAuxiliar=$this->cuenta_predefinidas;
				}
			} else {
				$this->cuenta_predefinidasAuxiliar=$this->cuenta_predefinidas;
			}
		/*} else {
			$this->cuenta_predefinidasAuxiliar=$this->cuenta_predefinidasReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->cuenta_predefinidasAuxiliar as $cuenta_predefinida) {
				$row=array();
				
				$row=cuenta_predefinida_util::getDataReportRow($tipo,$cuenta_predefinida,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			cuenta_predefinida_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$cuenta_predefinidasResp=array();
			$classes=array();
			
			
			
			
			$cuenta_predefinidasResp=$this->cuenta_predefinidaLogic->getcuenta_predefinidas();
			
			$this->cuenta_predefinidaLogic->setIsConDeep(true);
			
			$this->cuenta_predefinidaLogic->setcuenta_predefinidas($this->cuenta_predefinidasAuxiliar);
			
			$this->cuenta_predefinidaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->cuenta_predefinidasAuxiliar=$this->cuenta_predefinidaLogic->getcuenta_predefinidas();
			
			//RESPALDO
			$this->cuenta_predefinidaLogic->setcuenta_predefinidas($cuenta_predefinidasResp);
			
			$this->cuenta_predefinidaLogic->setIsConDeep(false);
			*/
			
			$this->cuenta_predefinidasAuxiliar=$this->cargarRelaciones($this->cuenta_predefinidasAuxiliar);
			
			$i=0;
			
			foreach ($this->cuenta_predefinidasAuxiliar as $cuenta_predefinida) {
				$row=array();
				
				if($i!=0) {
					$row=cuenta_predefinida_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=cuenta_predefinida_util::getDataReportRow($tipo,$cuenta_predefinida,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
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
		$this->cuenta_predefinidasAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_predefinidasAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->cuenta_predefinidasAuxiliar)<=0) {
					$this->cuenta_predefinidasAuxiliar=$this->cuenta_predefinidas;
				}
			} else {
				$this->cuenta_predefinidasAuxiliar=$this->cuenta_predefinidas;
			}
		/*} else {
			$this->cuenta_predefinidasAuxiliar=$this->cuenta_predefinidasReporte;	
		}*/
		
		foreach ($this->cuenta_predefinidasAuxiliar as $cuenta_predefinida) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cuenta_predefinida_util::getcuenta_predefinidaDescripcion($cuenta_predefinida),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Tipo Cuenta Predefinida',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Cuenta Predefinida',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getid_tipo_cuenta_predefinidaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Tipo Cuenta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Cuenta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getid_tipo_cuentaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Tipo Nivel Cuenta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Nivel Cuenta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getid_tipo_nivel_cuentaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Codigo Tabla',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo Tabla',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getcodigo_tabla(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Codigo Cuenta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo Cuenta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getcodigo_cuenta(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre Cuenta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Cuenta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getnombre_cuenta(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Monto Minimo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto Minimo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getmonto_minimo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Valor Retencion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Valor Retencion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getvalor_retencion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Balance',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Balance',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getbalance(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Porcentaje Base',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Porcentaje Base',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getporcentaje_base(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Seleccionar',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Seleccionar',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getseleccionar(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Centro Costos',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Centro Costos',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getcentro_costos(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Retencion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Retencion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getretencion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Usa Base',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Usa Base',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getusa_base(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nit',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nit',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getnit(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Modifica',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Modifica',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getmodifica(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ultima Transaccion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ultima Transaccion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getultima_transaccion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Comenta1',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Comenta1',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getcomenta1(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Comenta2',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Comenta2',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getcomenta2(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface cuenta_predefinida_base_controlI {			
		
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
		public function getIndiceActual(cuenta_predefinida $cuenta_predefinida,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(cuenta_predefinida $cuenta_predefinida,array $cuenta_predefinidas);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : cuenta_predefinida_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $cuenta_predefinidas,cuenta_predefinida $cuenta_predefinida);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(cuenta_predefinida_param_return $cuenta_predefinidaReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(cuenta_predefinida_session $cuenta_predefinida_session);		
		public function actualizarInvitadoSessionDivStyleVariables(cuenta_predefinida_session $cuenta_predefinida_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(cuenta_predefinida $cuenta_predefinidaOrigen,cuenta_predefinida $cuenta_predefinida,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(cuenta_predefinida_control $cuenta_predefinida_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $cuenta_predefinidas=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(cuenta_predefinida_session $cuenta_predefinida_session);		
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
		public function getHtmlTablaDatosResumen(array $cuenta_predefinidas=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $cuenta_predefinidas=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(cuenta_predefinida $cuenta_predefinida=null) : string;
		
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
