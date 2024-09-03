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

namespace com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\presentation\control;

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

use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\business\entity\pago_cuenta_cobrar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/pago_cuenta_cobrar/util/pago_cuenta_cobrar_carga.php');
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\util\pago_cuenta_cobrar_carga;

use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\util\pago_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\util\pago_cuenta_cobrar_param_return;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\business\logic\pago_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\business\logic\pago_cuenta_cobrar_logic_add;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\presentation\session\pago_cuenta_cobrar_session;


//FK


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

use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\logic\cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_util;

use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\entity\forma_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\logic\forma_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
pago_cuenta_cobrar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
pago_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
pago_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
pago_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*pago_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class pago_cuenta_cobrar_base_control extends pago_cuenta_cobrar_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->pago_cuenta_cobrarClase==null) {		
				$this->pago_cuenta_cobrarClase=new pago_cuenta_cobrar();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sucursal')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_sucursal',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_ejercicio',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_periodo',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_usuario')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_usuario',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_cobrar')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta_cobrar',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_forma_pago_cliente')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_forma_pago_cliente',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_estado',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->pago_cuenta_cobrarClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->pago_cuenta_cobrarClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->pago_cuenta_cobrarClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->pago_cuenta_cobrarClase->setid_sucursal((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sucursal'));
				
				$this->pago_cuenta_cobrarClase->setid_ejercicio((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio'));
				
				$this->pago_cuenta_cobrarClase->setid_periodo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo'));
				
				$this->pago_cuenta_cobrarClase->setid_usuario((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_usuario'));
				
				$this->pago_cuenta_cobrarClase->setid_cuenta_cobrar((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_cobrar'));
				
				$this->pago_cuenta_cobrarClase->setnumero($this->getDataCampoFormTabla('form'.$this->strSufijo,'numero'));
				
				$this->pago_cuenta_cobrarClase->setid_forma_pago_cliente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_forma_pago_cliente'));
				
				$this->pago_cuenta_cobrarClase->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_emision')));
				
				$this->pago_cuenta_cobrarClase->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_vence')));
				
				$this->pago_cuenta_cobrarClase->setabono((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'abono'));
				
				$this->pago_cuenta_cobrarClase->setsaldo((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'saldo'));
				
				$this->pago_cuenta_cobrarClase->setdescripcion($this->getDataCampoFormTabla('form'.$this->strSufijo,'descripcion'));
				
				$this->pago_cuenta_cobrarClase->setid_estado((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado'));
				
				$this->pago_cuenta_cobrarClase->setreferencia($this->getDataCampoFormTabla('form'.$this->strSufijo,'referencia'));
				
				$this->pago_cuenta_cobrarClase->setdebito((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'debito'));
				
				$this->pago_cuenta_cobrarClase->setcredito((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'credito'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->pago_cuenta_cobrarModel->set($this->pago_cuenta_cobrarClase);
				
				/*$this->pago_cuenta_cobrarModel->set($this->migrarModelpago_cuenta_cobrar($this->pago_cuenta_cobrarClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setId($this->pago_cuenta_cobrarClase->getId());	
			$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setVersionRow($this->pago_cuenta_cobrarClase->getVersionRow());	
			$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setVersionRow($this->pago_cuenta_cobrarClase->getVersionRow());	
			$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setid_empresa($this->pago_cuenta_cobrarClase->getid_empresa());	
			$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setid_sucursal($this->pago_cuenta_cobrarClase->getid_sucursal());	
			$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setid_ejercicio($this->pago_cuenta_cobrarClase->getid_ejercicio());	
			$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setid_periodo($this->pago_cuenta_cobrarClase->getid_periodo());	
			$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setid_usuario($this->pago_cuenta_cobrarClase->getid_usuario());	
			$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setid_cuenta_cobrar($this->pago_cuenta_cobrarClase->getid_cuenta_cobrar());	
			$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setnumero($this->pago_cuenta_cobrarClase->getnumero());	
			$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setid_forma_pago_cliente($this->pago_cuenta_cobrarClase->getid_forma_pago_cliente());	
			$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setfecha_emision($this->pago_cuenta_cobrarClase->getfecha_emision());	
			$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setfecha_vence($this->pago_cuenta_cobrarClase->getfecha_vence());	
			$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setabono($this->pago_cuenta_cobrarClase->getabono());	
			$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setsaldo($this->pago_cuenta_cobrarClase->getsaldo());	
			$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setdescripcion($this->pago_cuenta_cobrarClase->getdescripcion());	
			$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setid_estado($this->pago_cuenta_cobrarClase->getid_estado());	
			$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setreferencia($this->pago_cuenta_cobrarClase->getreferencia());	
			$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setdebito($this->pago_cuenta_cobrarClase->getdebito());	
			$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setcredito($this->pago_cuenta_cobrarClase->getcredito());	
		} else {
			$this->pago_cuenta_cobrarClase->setId($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->getId());	
			$this->pago_cuenta_cobrarClase->setVersionRow($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->getVersionRow());	
			$this->pago_cuenta_cobrarClase->setVersionRow($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->getVersionRow());	
			$this->pago_cuenta_cobrarClase->setid_empresa($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->getid_empresa());	
			$this->pago_cuenta_cobrarClase->setid_sucursal($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->getid_sucursal());	
			$this->pago_cuenta_cobrarClase->setid_ejercicio($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->getid_ejercicio());	
			$this->pago_cuenta_cobrarClase->setid_periodo($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->getid_periodo());	
			$this->pago_cuenta_cobrarClase->setid_usuario($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->getid_usuario());	
			$this->pago_cuenta_cobrarClase->setid_cuenta_cobrar($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->getid_cuenta_cobrar());	
			$this->pago_cuenta_cobrarClase->setnumero($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->getnumero());	
			$this->pago_cuenta_cobrarClase->setid_forma_pago_cliente($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->getid_forma_pago_cliente());	
			$this->pago_cuenta_cobrarClase->setfecha_emision($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->getfecha_emision());	
			$this->pago_cuenta_cobrarClase->setfecha_vence($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->getfecha_vence());	
			$this->pago_cuenta_cobrarClase->setabono($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->getabono());	
			$this->pago_cuenta_cobrarClase->setsaldo($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->getsaldo());	
			$this->pago_cuenta_cobrarClase->setdescripcion($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->getdescripcion());	
			$this->pago_cuenta_cobrarClase->setid_estado($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->getid_estado());	
			$this->pago_cuenta_cobrarClase->setreferencia($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->getreferencia());	
			$this->pago_cuenta_cobrarClase->setdebito($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->getdebito());	
			$this->pago_cuenta_cobrarClase->setcredito($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->getcredito());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->pago_cuenta_cobrarModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='id_sucursal') {$this->strMensajeid_sucursal=$strMensajeCampo;}
		if($strNombreCampo=='id_ejercicio') {$this->strMensajeid_ejercicio=$strMensajeCampo;}
		if($strNombreCampo=='id_periodo') {$this->strMensajeid_periodo=$strMensajeCampo;}
		if($strNombreCampo=='id_usuario') {$this->strMensajeid_usuario=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta_cobrar') {$this->strMensajeid_cuenta_cobrar=$strMensajeCampo;}
		if($strNombreCampo=='numero') {$this->strMensajenumero=$strMensajeCampo;}
		if($strNombreCampo=='id_forma_pago_cliente') {$this->strMensajeid_forma_pago_cliente=$strMensajeCampo;}
		if($strNombreCampo=='fecha_emision') {$this->strMensajefecha_emision=$strMensajeCampo;}
		if($strNombreCampo=='fecha_vence') {$this->strMensajefecha_vence=$strMensajeCampo;}
		if($strNombreCampo=='abono') {$this->strMensajeabono=$strMensajeCampo;}
		if($strNombreCampo=='saldo') {$this->strMensajesaldo=$strMensajeCampo;}
		if($strNombreCampo=='descripcion') {$this->strMensajedescripcion=$strMensajeCampo;}
		if($strNombreCampo=='id_estado') {$this->strMensajeid_estado=$strMensajeCampo;}
		if($strNombreCampo=='referencia') {$this->strMensajereferencia=$strMensajeCampo;}
		if($strNombreCampo=='debito') {$this->strMensajedebito=$strMensajeCampo;}
		if($strNombreCampo=='credito') {$this->strMensajecredito=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeid_sucursal='';
		$this->strMensajeid_ejercicio='';
		$this->strMensajeid_periodo='';
		$this->strMensajeid_usuario='';
		$this->strMensajeid_cuenta_cobrar='';
		$this->strMensajenumero='';
		$this->strMensajeid_forma_pago_cliente='';
		$this->strMensajefecha_emision='';
		$this->strMensajefecha_vence='';
		$this->strMensajeabono='';
		$this->strMensajesaldo='';
		$this->strMensajedescripcion='';
		$this->strMensajeid_estado='';
		$this->strMensajereferencia='';
		$this->strMensajedebito='';
		$this->strMensajecredito='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_cobrarLogic->closeNewConnexionToDeep();
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
				$this->pago_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			$pago_cuenta_cobrar_session=unserialize($this->Session->read(pago_cuenta_cobrar_util::$STR_SESSION_NAME));
						
			if($pago_cuenta_cobrar_session==null) {
				$pago_cuenta_cobrar_session=new pago_cuenta_cobrar_session();
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
						$this->pago_cuenta_cobrarLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->pago_cuenta_cobrarActual =$this->pago_cuenta_cobrarClase;
			
			/*$this->pago_cuenta_cobrarActual =$this->migrarModelpago_cuenta_cobrar($this->pago_cuenta_cobrarClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrars(),$this->pago_cuenta_cobrarActual);
			
			$this->actualizarControllerConReturnGeneral($this->pago_cuenta_cobrarReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->getNewConnexionToDeep();
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
				$this->pago_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$pago_cuenta_cobrarsLocal=$this->getListaActual();
		
		$iIndice=pago_cuenta_cobrar_util::getIndiceNuevo($pago_cuenta_cobrarsLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(pago_cuenta_cobrar $pago_cuenta_cobrar,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$pago_cuenta_cobrarsLocal=$this->getListaActual();
		
		$iIndice=pago_cuenta_cobrar_util::getIndiceActual($pago_cuenta_cobrarsLocal,$pago_cuenta_cobrar,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevopago_cuenta_cobrar')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->pago_cuenta_cobrarActual =$this->pago_cuenta_cobrarClase;
			
			/*$this->pago_cuenta_cobrarActual =$this->migrarModelpago_cuenta_cobrar($this->pago_cuenta_cobrarClase);*/
			
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
			
			$this->pago_cuenta_cobrarLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('cuenta_cobrar');$classes[]=$class;
				$class=new Classe('forma_pago_cliente');$classes[]=$class;
				$class=new Classe('estado');$classes[]=$class;
			
			$this->pago_cuenta_cobrarLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->pago_cuenta_cobrarLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->pago_cuenta_cobrarLogic->setpago_cuenta_cobrar(new pago_cuenta_cobrar());
				
				$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setIsNew(true);
				$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setIsChanged(true);
				$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->pago_cuenta_cobrarModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->pago_cuenta_cobrarLogic->pago_cuenta_cobrars[]=$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->pago_cuenta_cobrarLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->pago_cuenta_cobrarLogic->saveRelaciones($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar());/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setIsChanged(true);
				$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setIsNew(false);
				$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->pago_cuenta_cobrarModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar(),$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrars());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->pago_cuenta_cobrarLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->pago_cuenta_cobrarLogic->saveRelaciones($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar());/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setIsDeleted(true);
				$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setIsNew(false);
				$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setIsChanged(false);				
				
				$this->actualizarLista($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar(),$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrars());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->pago_cuenta_cobrarLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->pago_cuenta_cobrarLogic->saveRelaciones($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->pago_cuenta_cobrarsEliminados[]=$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->pago_cuenta_cobrarLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->pago_cuenta_cobrarLogic->saveRelaciones($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->pago_cuenta_cobrarsEliminados=array();
				}
			}
			
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('cuenta_cobrar');$classes[]=$class;
				$class=new Classe('forma_pago_cliente');$classes[]=$class;
				$class=new Classe('estado');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->pago_cuenta_cobrarLogic->setpago_cuenta_cobrars();*/
					
					$this->pago_cuenta_cobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->pago_cuenta_cobrarLogic->setIsConDeepLoad(false);
			
			$this->pago_cuenta_cobrars=$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrars();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(pago_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista',serialize($this->pago_cuenta_cobrars));
				$this->Session->write(pago_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->pago_cuenta_cobrarsEliminados));
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
				$this->pago_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_cobrarLogic->closeNewConnexionToDeep();
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
				$this->pago_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalpago_cuenta_cobrar;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->pago_cuenta_cobrarLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->pago_cuenta_cobrars as $pago_cuenta_cobrarLocal) {
				if($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->getId()==$pago_cuenta_cobrarLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar()->setIsDeleted(true);
			$this->pago_cuenta_cobrarsEliminados[]=$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->pago_cuenta_cobrars[$indice]);
				
				$this->pago_cuenta_cobrars = array_values($this->pago_cuenta_cobrars);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelpago_cuenta_cobrar($this->pago_cuenta_cobrarClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(pago_cuenta_cobrar $pago_cuenta_cobrar,array $pago_cuenta_cobrars) {
		try {
			foreach($pago_cuenta_cobrars as $pago_cuenta_cobrarLocal){ 
				if($pago_cuenta_cobrarLocal->getId()==$pago_cuenta_cobrar->getId()) {
					$pago_cuenta_cobrarLocal->setIsChanged($pago_cuenta_cobrar->getIsChanged());
					$pago_cuenta_cobrarLocal->setIsNew($pago_cuenta_cobrar->getIsNew());
					$pago_cuenta_cobrarLocal->setIsDeleted($pago_cuenta_cobrar->getIsDeleted());
					//$pago_cuenta_cobrarLocal->setbitExpired($pago_cuenta_cobrar->getbitExpired());
					
					$pago_cuenta_cobrarLocal->setId($pago_cuenta_cobrar->getId());	
					$pago_cuenta_cobrarLocal->setVersionRow($pago_cuenta_cobrar->getVersionRow());	
					$pago_cuenta_cobrarLocal->setVersionRow($pago_cuenta_cobrar->getVersionRow());	
					$pago_cuenta_cobrarLocal->setid_empresa($pago_cuenta_cobrar->getid_empresa());	
					$pago_cuenta_cobrarLocal->setid_sucursal($pago_cuenta_cobrar->getid_sucursal());	
					$pago_cuenta_cobrarLocal->setid_ejercicio($pago_cuenta_cobrar->getid_ejercicio());	
					$pago_cuenta_cobrarLocal->setid_periodo($pago_cuenta_cobrar->getid_periodo());	
					$pago_cuenta_cobrarLocal->setid_usuario($pago_cuenta_cobrar->getid_usuario());	
					$pago_cuenta_cobrarLocal->setid_cuenta_cobrar($pago_cuenta_cobrar->getid_cuenta_cobrar());	
					$pago_cuenta_cobrarLocal->setnumero($pago_cuenta_cobrar->getnumero());	
					$pago_cuenta_cobrarLocal->setid_forma_pago_cliente($pago_cuenta_cobrar->getid_forma_pago_cliente());	
					$pago_cuenta_cobrarLocal->setfecha_emision($pago_cuenta_cobrar->getfecha_emision());	
					$pago_cuenta_cobrarLocal->setfecha_vence($pago_cuenta_cobrar->getfecha_vence());	
					$pago_cuenta_cobrarLocal->setabono($pago_cuenta_cobrar->getabono());	
					$pago_cuenta_cobrarLocal->setsaldo($pago_cuenta_cobrar->getsaldo());	
					$pago_cuenta_cobrarLocal->setdescripcion($pago_cuenta_cobrar->getdescripcion());	
					$pago_cuenta_cobrarLocal->setid_estado($pago_cuenta_cobrar->getid_estado());	
					$pago_cuenta_cobrarLocal->setreferencia($pago_cuenta_cobrar->getreferencia());	
					$pago_cuenta_cobrarLocal->setdebito($pago_cuenta_cobrar->getdebito());	
					$pago_cuenta_cobrarLocal->setcredito($pago_cuenta_cobrar->getcredito());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$pago_cuenta_cobrarsLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$pago_cuenta_cobrarsLocal=$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrars();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$pago_cuenta_cobrarsLocal=$this->pago_cuenta_cobrars;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $pago_cuenta_cobrarsLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrars() as $pago_cuenta_cobrar) {
				if($pago_cuenta_cobrar->getId()==$id) {
					$this->pago_cuenta_cobrarLogic->setpago_cuenta_cobrar($pago_cuenta_cobrar);
					
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
		/*$pago_cuenta_cobrarsSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->pago_cuenta_cobrars as $pago_cuenta_cobrar) {
			$pago_cuenta_cobrar->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->pago_cuenta_cobrars[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : pago_cuenta_cobrar_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$pago_cuenta_cobrar_session=unserialize($this->Session->read(pago_cuenta_cobrar_util::$STR_SESSION_NAME));
						
		if($pago_cuenta_cobrar_session==null) {
			$pago_cuenta_cobrar_session=new pago_cuenta_cobrar_session();
		}
		
		
		$this->pago_cuenta_cobrarReturnGeneral=new pago_cuenta_cobrar_param_return();
		$this->pago_cuenta_cobrarParameterGeneral=new pago_cuenta_cobrar_param_return();
			
		$this->pago_cuenta_cobrarParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualpago_cuenta_cobrar(this.pago_cuenta_cobrar,true);
			this.setVariablesFormularioToObjetoActualForeignKeyspago_cuenta_cobrar(this.pago_cuenta_cobrar);*/
			
			if($pago_cuenta_cobrar_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualpago_cuenta_cobrar(this.pago_cuenta_cobrar,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->pago_cuenta_cobrarActual=$this->pago_cuenta_cobrarClase;
				
				$this->setCopiarVariablesObjetos($this->pago_cuenta_cobrarActual,$this->pago_cuenta_cobrar,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->pago_cuenta_cobrarReturnGeneral=$this->pago_cuenta_cobrarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrars(),$this->pago_cuenta_cobrar,$this->pago_cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($pago_cuenta_cobrar_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanpago_cuenta_cobrar($classes,$this->pago_cuenta_cobrarReturnGeneral,$this->pago_cuenta_cobrarBean,false);*/
				}
					
				if($this->pago_cuenta_cobrarReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->pago_cuenta_cobrarReturnGeneral->getpago_cuenta_cobrar(),$this->pago_cuenta_cobrarActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeypago_cuenta_cobrar($this->pago_cuenta_cobrarReturnGeneral->getpago_cuenta_cobrar());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariopago_cuenta_cobrar($this->pago_cuenta_cobrarReturnGeneral->getpago_cuenta_cobrar());*/
				}
					
				if($this->pago_cuenta_cobrarReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->pago_cuenta_cobrarReturnGeneral->getpago_cuenta_cobrar(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->pago_cuenta_cobrar,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(pago_cuenta_cobrarJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualpago_cuenta_cobrar(this.pago_cuenta_cobrar,true);
				this.setVariablesFormularioToObjetoActualForeignKeyspago_cuenta_cobrar(this.pago_cuenta_cobrar);				
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
				
				if($this->pago_cuenta_cobrarAnterior!=null) {
					$this->pago_cuenta_cobrar=$this->pago_cuenta_cobrarAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->pago_cuenta_cobrarReturnGeneral=$this->pago_cuenta_cobrarLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrars(),$this->pago_cuenta_cobrar,$this->pago_cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->pago_cuenta_cobrarReturnGeneral->getpago_cuenta_cobrar(),$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrars());
			*/
		}
		
		return $this->pago_cuenta_cobrarReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			$this->pago_cuenta_cobrarReturnGeneral=new pago_cuenta_cobrar_param_return();			
			$this->pago_cuenta_cobrarParameterGeneral=new pago_cuenta_cobrar_param_return();
			
			$this->pago_cuenta_cobrarParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->pago_cuenta_cobrarReturnGeneral=$this->pago_cuenta_cobrarLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->pago_cuenta_cobrars,$this->pago_cuenta_cobrarParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->pago_cuenta_cobrarReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->pago_cuenta_cobrarReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->pago_cuenta_cobrarReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_cobrarLogic->closeNewConnexionToDeep();
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
		
		$this->pago_cuenta_cobrarReturnGeneral=new pago_cuenta_cobrar_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_pago_cuenta_cobrar') {
		    $sDominio='pago_cuenta_cobrar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->pago_cuenta_cobrarReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->pago_cuenta_cobrarReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='pago_cuenta_cobrar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='pago_cuenta_cobrar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='pago_cuenta_cobrar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->pago_cuenta_cobrarReturnGeneral=new pago_cuenta_cobrar_param_return();
		$this->pago_cuenta_cobrarParameterGeneral=new pago_cuenta_cobrar_param_return();
			
		$this->pago_cuenta_cobrarParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->pago_cuenta_cobrarReturnGeneral=$this->pago_cuenta_cobrarLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrars(),$this->pago_cuenta_cobrar,$this->pago_cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->pago_cuenta_cobrarReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->pago_cuenta_cobrarReturnGeneral->getpago_cuenta_cobrar(),$classes);*/
		}									
	
		if($this->pago_cuenta_cobrarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->pago_cuenta_cobrarReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->pago_cuenta_cobrarReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $pago_cuenta_cobrars,pago_cuenta_cobrar $pago_cuenta_cobrar) {
		
		$pago_cuenta_cobrar_session=unserialize($this->Session->read(pago_cuenta_cobrar_util::$STR_SESSION_NAME));
						
		if($pago_cuenta_cobrar_session==null) {
			$pago_cuenta_cobrar_session=new pago_cuenta_cobrar_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(pago_cuenta_cobrar_util::$CLASSNAME);
			}	
			*/
			
			$this->pago_cuenta_cobrarReturnGeneral=new pago_cuenta_cobrar_param_return();
			$this->pago_cuenta_cobrarParameterGeneral=new pago_cuenta_cobrar_param_return();
			
			$this->pago_cuenta_cobrarParameterGeneral->setdata($this->data);
		
		
			
		if($pago_cuenta_cobrar_session->conGuardarRelaciones) {
			$classes=pago_cuenta_cobrar_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->pago_cuenta_cobrarActual,$this->pago_cuenta_cobrar,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->pago_cuenta_cobrarReturnGeneral=$this->pago_cuenta_cobrarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrars(),$this->pago_cuenta_cobrarActual,$this->pago_cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->pago_cuenta_cobrarReturnGeneral=$this->pago_cuenta_cobrarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$pago_cuenta_cobrars,$pago_cuenta_cobrar,$this->pago_cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelpago_cuenta_cobrar($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar());*/
			
			$this->pago_cuenta_cobrar=$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrar();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->pago_cuenta_cobrar);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$pago_cuenta_cobrarActual=new pago_cuenta_cobrar();
			
			if($this->pago_cuenta_cobrarClase==null) {		
				$this->pago_cuenta_cobrarClase=new pago_cuenta_cobrar();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$pago_cuenta_cobrarActual=$this->pago_cuenta_cobrars[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $pago_cuenta_cobrarActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $pago_cuenta_cobrarActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $pago_cuenta_cobrarActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $pago_cuenta_cobrarActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $pago_cuenta_cobrarActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $pago_cuenta_cobrarActual->setid_cuenta_cobrar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $pago_cuenta_cobrarActual->setnumero($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $pago_cuenta_cobrarActual->setid_forma_pago_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $pago_cuenta_cobrarActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $pago_cuenta_cobrarActual->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $pago_cuenta_cobrarActual->setabono((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $pago_cuenta_cobrarActual->setsaldo((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $pago_cuenta_cobrarActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $pago_cuenta_cobrarActual->setid_estado((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $pago_cuenta_cobrarActual->setreferencia($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $pago_cuenta_cobrarActual->setdebito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $pago_cuenta_cobrarActual->setcredito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }

				$this->pago_cuenta_cobrarClase=$pago_cuenta_cobrarActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->pago_cuenta_cobrarModel->set($this->pago_cuenta_cobrarClase);
				
				/*$this->pago_cuenta_cobrarModel->set($this->migrarModelpago_cuenta_cobrar($this->pago_cuenta_cobrarClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->pago_cuenta_cobrars=$this->migrarModelpago_cuenta_cobrar($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrars());							
		$this->pago_cuenta_cobrars=$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrars();*/
		
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
			$this->Session->write(pago_cuenta_cobrar_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$pago_cuenta_cobrar_control_session=unserialize($this->Session->read(pago_cuenta_cobrar_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($pago_cuenta_cobrar_control_session==null) {
				$pago_cuenta_cobrar_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($pago_cuenta_cobrar_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(pago_cuenta_cobrar_util::$STR_SESSION_NAME,$this);*/
		} else {
			$pago_cuenta_cobrar_session=unserialize($this->Session->read(pago_cuenta_cobrar_util::$STR_SESSION_NAME));
			
			if($pago_cuenta_cobrar_session==null) {
				$pago_cuenta_cobrar_session=new pago_cuenta_cobrar_session();
			}
			
			$this->set(pago_cuenta_cobrar_util::$STR_SESSION_NAME, $pago_cuenta_cobrar_session);
		}
	}
	
	public function setCopiarVariablesObjetos(pago_cuenta_cobrar $pago_cuenta_cobrarOrigen,pago_cuenta_cobrar $pago_cuenta_cobrar,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($pago_cuenta_cobrar==null) {
				$pago_cuenta_cobrar=new pago_cuenta_cobrar();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $pago_cuenta_cobrarOrigen->getId()!=null && $pago_cuenta_cobrarOrigen->getId()!=0)) {$pago_cuenta_cobrar->setId($pago_cuenta_cobrarOrigen->getId());}}
			if($conDefault || ($conDefault==false && $pago_cuenta_cobrarOrigen->getid_cuenta_cobrar()!=null && $pago_cuenta_cobrarOrigen->getid_cuenta_cobrar()!=-1)) {$pago_cuenta_cobrar->setid_cuenta_cobrar($pago_cuenta_cobrarOrigen->getid_cuenta_cobrar());}
			if($conDefault || ($conDefault==false && $pago_cuenta_cobrarOrigen->getnumero()!=null && $pago_cuenta_cobrarOrigen->getnumero()!='')) {$pago_cuenta_cobrar->setnumero($pago_cuenta_cobrarOrigen->getnumero());}
			if($conDefault || ($conDefault==false && $pago_cuenta_cobrarOrigen->getid_forma_pago_cliente()!=null && $pago_cuenta_cobrarOrigen->getid_forma_pago_cliente()!=-1)) {$pago_cuenta_cobrar->setid_forma_pago_cliente($pago_cuenta_cobrarOrigen->getid_forma_pago_cliente());}
			if($conDefault || ($conDefault==false && $pago_cuenta_cobrarOrigen->getfecha_emision()!=null && $pago_cuenta_cobrarOrigen->getfecha_emision()!=date('Y-m-d'))) {$pago_cuenta_cobrar->setfecha_emision($pago_cuenta_cobrarOrigen->getfecha_emision());}
			if($conDefault || ($conDefault==false && $pago_cuenta_cobrarOrigen->getfecha_vence()!=null && $pago_cuenta_cobrarOrigen->getfecha_vence()!=date('Y-m-d'))) {$pago_cuenta_cobrar->setfecha_vence($pago_cuenta_cobrarOrigen->getfecha_vence());}
			if($conDefault || ($conDefault==false && $pago_cuenta_cobrarOrigen->getabono()!=null && $pago_cuenta_cobrarOrigen->getabono()!=0.0)) {$pago_cuenta_cobrar->setabono($pago_cuenta_cobrarOrigen->getabono());}
			if($conDefault || ($conDefault==false && $pago_cuenta_cobrarOrigen->getsaldo()!=null && $pago_cuenta_cobrarOrigen->getsaldo()!=0.0)) {$pago_cuenta_cobrar->setsaldo($pago_cuenta_cobrarOrigen->getsaldo());}
			if($conDefault || ($conDefault==false && $pago_cuenta_cobrarOrigen->getdescripcion()!=null && $pago_cuenta_cobrarOrigen->getdescripcion()!='')) {$pago_cuenta_cobrar->setdescripcion($pago_cuenta_cobrarOrigen->getdescripcion());}
			if($conDefault || ($conDefault==false && $pago_cuenta_cobrarOrigen->getid_estado()!=null && $pago_cuenta_cobrarOrigen->getid_estado()!=-1)) {$pago_cuenta_cobrar->setid_estado($pago_cuenta_cobrarOrigen->getid_estado());}
			if($conDefault || ($conDefault==false && $pago_cuenta_cobrarOrigen->getreferencia()!=null && $pago_cuenta_cobrarOrigen->getreferencia()!='')) {$pago_cuenta_cobrar->setreferencia($pago_cuenta_cobrarOrigen->getreferencia());}
			if($conDefault || ($conDefault==false && $pago_cuenta_cobrarOrigen->getdebito()!=null && $pago_cuenta_cobrarOrigen->getdebito()!=0.0)) {$pago_cuenta_cobrar->setdebito($pago_cuenta_cobrarOrigen->getdebito());}
			if($conDefault || ($conDefault==false && $pago_cuenta_cobrarOrigen->getcredito()!=null && $pago_cuenta_cobrarOrigen->getcredito()!=0.0)) {$pago_cuenta_cobrar->setcredito($pago_cuenta_cobrarOrigen->getcredito());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$pago_cuenta_cobrarsSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$pago_cuenta_cobrarsSeleccionados[]=$this->pago_cuenta_cobrars[$indice];
			}
		}
		
		return $pago_cuenta_cobrarsSeleccionados;
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
		$pago_cuenta_cobrar= new pago_cuenta_cobrar();
		
		foreach($this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrars() as $pago_cuenta_cobrar) {
			
		}		
		
		if($pago_cuenta_cobrar!=null);
	}
	
	public function cargarRelaciones(array $pago_cuenta_cobrars=array()) : array {	
		
		$pago_cuenta_cobrarsRespaldo = array();
		$pago_cuenta_cobrarsLocal = array();
		
		pago_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$pago_cuenta_cobrarsResp=array();
		$classes=array();
			
		
			
			
		$pago_cuenta_cobrarsRespaldo=$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrars();
			
		$this->pago_cuenta_cobrarLogic->setIsConDeep(true);
		
		$this->pago_cuenta_cobrarLogic->setpago_cuenta_cobrars($pago_cuenta_cobrars);
			
		$this->pago_cuenta_cobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$pago_cuenta_cobrarsLocal=$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrars();
			
		/*RESPALDO*/
		$this->pago_cuenta_cobrarLogic->setpago_cuenta_cobrars($pago_cuenta_cobrarsRespaldo);
			
		$this->pago_cuenta_cobrarLogic->setIsConDeep(false);
		
		if($pago_cuenta_cobrarsResp!=null);
		
		return $pago_cuenta_cobrarsLocal;
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
				$this->pago_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(pago_cuenta_cobrar_session $pago_cuenta_cobrar_session) {
		$pago_cuenta_cobrar_session->strTypeOnLoad=$this->strTypeOnLoadpago_cuenta_cobrar;
		$pago_cuenta_cobrar_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarpago_cuenta_cobrar;
		$pago_cuenta_cobrar_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarpago_cuenta_cobrar;
		$pago_cuenta_cobrar_session->bitEsPopup=$this->bitEsPopup;
		$pago_cuenta_cobrar_session->bitEsBusqueda=$this->bitEsBusqueda;
		$pago_cuenta_cobrar_session->strFuncionJs=$this->strFuncionJs;
		/*$pago_cuenta_cobrar_session->strSufijo=$this->strSufijo;*/
		$pago_cuenta_cobrar_session->bitEsRelaciones=$this->bitEsRelaciones;
		$pago_cuenta_cobrar_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, pago_cuenta_cobrar_util::$STR_NOMBRE_CLASE,0,false,false);				
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
		$pago_cuenta_cobrarViewAdditional=new pago_cuenta_cobrarView_add();
		$pago_cuenta_cobrarViewAdditional->pago_cuenta_cobrars=$this->pago_cuenta_cobrars;
		$pago_cuenta_cobrarViewAdditional->Session=$this->Session;
		
		return $pago_cuenta_cobrarViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$pago_cuenta_cobrarsLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$pago_cuenta_cobrarsLocal=$this->pago_cuenta_cobrars;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$pago_cuenta_cobrarsLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($pago_cuenta_cobrarsLocal)<=0) {
					$pago_cuenta_cobrarsLocal=$this->pago_cuenta_cobrars;
				}
			} else {
				$pago_cuenta_cobrarsLocal=$this->pago_cuenta_cobrars;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarpago_cuenta_cobrarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarpago_cuenta_cobrarsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$pago_cuenta_cobrarLogic=new pago_cuenta_cobrar_logic();
		$pago_cuenta_cobrarLogic->setpago_cuenta_cobrars($this->pago_cuenta_cobrars);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cuenta_cobrar');$classes[]=$class;
			$class=new Classe('forma_pago_cliente');$classes[]=$class;
			$class=new Classe('estado');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$pago_cuenta_cobrarLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->pago_cuenta_cobrars=$pago_cuenta_cobrarLogic->getpago_cuenta_cobrars();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->pago_cuenta_cobrarsLocal=$this->pago_cuenta_cobrars;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=pago_cuenta_cobrar_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=pago_cuenta_cobrar_util::$STR_TABLE_NAME;		
			
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
			
			$pago_cuenta_cobrars = $this->pago_cuenta_cobrars;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = pago_cuenta_cobrar_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = pago_cuenta_cobrar_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/cuentascobrar/presentation/templating/pago_cuenta_cobrar_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->pago_cuenta_cobrars=$pago_cuenta_cobrars;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->pago_cuenta_cobrarsLocal=$pago_cuenta_cobrarsLocal;
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
		
		$pago_cuenta_cobrarsLocal=array();
		
		$pago_cuenta_cobrarsLocal=$this->pago_cuenta_cobrars;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarpago_cuenta_cobrarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarpago_cuenta_cobrarsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$pago_cuenta_cobrarLogic=new pago_cuenta_cobrar_logic();
		$pago_cuenta_cobrarLogic->setpago_cuenta_cobrars($this->pago_cuenta_cobrars);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cuenta_cobrar');$classes[]=$class;
			$class=new Classe('forma_pago_cliente');$classes[]=$class;
			$class=new Classe('estado');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$pago_cuenta_cobrarLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->pago_cuenta_cobrars=$pago_cuenta_cobrarLogic->getpago_cuenta_cobrars();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$pago_cuenta_cobrars = $this->pago_cuenta_cobrars;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = pago_cuenta_cobrar_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = pago_cuenta_cobrar_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/cuentascobrar/presentation/templating/pago_cuenta_cobrar_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->pago_cuenta_cobrars=$pago_cuenta_cobrars;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->pago_cuenta_cobrarsLocal=$pago_cuenta_cobrarsLocal;
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
	
	public function getHtmlTablaDatosResumen(array $pago_cuenta_cobrars=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->pago_cuenta_cobrarsReporte = $pago_cuenta_cobrars;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarpago_cuenta_cobrarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarpago_cuenta_cobrarsAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $pago_cuenta_cobrars=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->pago_cuenta_cobrarsReporte = $pago_cuenta_cobrars;		
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
		
		
		$this->pago_cuenta_cobrarsReporte=$this->cargarRelaciones($pago_cuenta_cobrars);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarpago_cuenta_cobrarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarpago_cuenta_cobrarsAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(pago_cuenta_cobrar $pago_cuenta_cobrar=null) : string {	
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
			
			
			$pago_cuenta_cobrarsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$pago_cuenta_cobrarsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($pago_cuenta_cobrarsLocal)<=0) {
					/*//DEBE ESCOGER
					$pago_cuenta_cobrarsLocal=$this->pago_cuenta_cobrars;*/
				}
			} else {
				/*//DEBE ESCOGER
				$pago_cuenta_cobrarsLocal=$this->pago_cuenta_cobrars;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($pago_cuenta_cobrarsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($pago_cuenta_cobrarsLocal,true);
			
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
				$this->pago_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
					
			$pago_cuenta_cobrarsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$pago_cuenta_cobrarsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($pago_cuenta_cobrarsLocal)<=0) {
					/*//DEBE ESCOGER
					$pago_cuenta_cobrarsLocal=$this->pago_cuenta_cobrars;*/
				}
			} else {
				/*//DEBE ESCOGER
				$pago_cuenta_cobrarsLocal=$this->pago_cuenta_cobrars;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($pago_cuenta_cobrarsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($pago_cuenta_cobrarsLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_cobrarLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Pago Cuenta Cobrars';
			
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
			$fileName='pago_cuenta_cobrar';
			
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
			
			$title='Reporte de  Pago Cuenta Cobrars';
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
			
			$title='Reporte de  Pago Cuenta Cobrars';
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
				$this->pago_cuenta_cobrarLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Pago Cuenta Cobrars';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=pago_cuenta_cobrar_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->pago_cuenta_cobrarsAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->pago_cuenta_cobrarsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->pago_cuenta_cobrarsAuxiliar)<=0) {
					$this->pago_cuenta_cobrarsAuxiliar=$this->pago_cuenta_cobrars;
				}
			} else {
				$this->pago_cuenta_cobrarsAuxiliar=$this->pago_cuenta_cobrars;
			}
		/*} else {
			$this->pago_cuenta_cobrarsAuxiliar=$this->pago_cuenta_cobrarsReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->pago_cuenta_cobrarsAuxiliar as $pago_cuenta_cobrar) {
				$row=array();
				
				$row=pago_cuenta_cobrar_util::getDataReportRow($tipo,$pago_cuenta_cobrar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			pago_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$pago_cuenta_cobrarsResp=array();
			$classes=array();
			
			
			
			
			$pago_cuenta_cobrarsResp=$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrars();
			
			$this->pago_cuenta_cobrarLogic->setIsConDeep(true);
			
			$this->pago_cuenta_cobrarLogic->setpago_cuenta_cobrars($this->pago_cuenta_cobrarsAuxiliar);
			
			$this->pago_cuenta_cobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->pago_cuenta_cobrarsAuxiliar=$this->pago_cuenta_cobrarLogic->getpago_cuenta_cobrars();
			
			//RESPALDO
			$this->pago_cuenta_cobrarLogic->setpago_cuenta_cobrars($pago_cuenta_cobrarsResp);
			
			$this->pago_cuenta_cobrarLogic->setIsConDeep(false);
			*/
			
			$this->pago_cuenta_cobrarsAuxiliar=$this->cargarRelaciones($this->pago_cuenta_cobrarsAuxiliar);
			
			$i=0;
			
			foreach ($this->pago_cuenta_cobrarsAuxiliar as $pago_cuenta_cobrar) {
				$row=array();
				
				if($i!=0) {
					$row=pago_cuenta_cobrar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=pago_cuenta_cobrar_util::getDataReportRow($tipo,$pago_cuenta_cobrar,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
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
		$this->pago_cuenta_cobrarsAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->pago_cuenta_cobrarsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->pago_cuenta_cobrarsAuxiliar)<=0) {
					$this->pago_cuenta_cobrarsAuxiliar=$this->pago_cuenta_cobrars;
				}
			} else {
				$this->pago_cuenta_cobrarsAuxiliar=$this->pago_cuenta_cobrars;
			}
		/*} else {
			$this->pago_cuenta_cobrarsAuxiliar=$this->pago_cuenta_cobrarsReporte;	
		}*/
		
		foreach ($this->pago_cuenta_cobrarsAuxiliar as $pago_cuenta_cobrar) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(pago_cuenta_cobrar_util::getpago_cuenta_cobrarDescripcion($pago_cuenta_cobrar),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy(' Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Sucursal',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Sucursal',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getid_sucursalDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Ejercicio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Ejercicio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getid_ejercicioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Periodo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Periodo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getid_periodoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Usuario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Usuario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getid_usuarioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Cuenta Cobrar',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta Cobrar',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getid_cuenta_cobrarDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getnumero(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Forma Pago Cliente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Forma Pago Cliente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getid_forma_pago_clienteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Emision',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Emision',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getfecha_emision(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Vence',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Vence',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getfecha_vence(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Abono',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Abono',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getabono(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Saldo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Saldo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getsaldo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descripcion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getdescripcion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Estado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Estado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getid_estadoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Referencia',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Referencia',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getreferencia(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Debito',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Debito',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getdebito(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Credito',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Credito',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getcredito(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface pago_cuenta_cobrar_base_controlI {			
		
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
		public function getIndiceActual(pago_cuenta_cobrar $pago_cuenta_cobrar,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(pago_cuenta_cobrar $pago_cuenta_cobrar,array $pago_cuenta_cobrars);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : pago_cuenta_cobrar_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $pago_cuenta_cobrars,pago_cuenta_cobrar $pago_cuenta_cobrar);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(pago_cuenta_cobrar_param_return $pago_cuenta_cobrarReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(pago_cuenta_cobrar_session $pago_cuenta_cobrar_session);		
		public function actualizarInvitadoSessionDivStyleVariables(pago_cuenta_cobrar_session $pago_cuenta_cobrar_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(pago_cuenta_cobrar $pago_cuenta_cobrarOrigen,pago_cuenta_cobrar $pago_cuenta_cobrar,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(pago_cuenta_cobrar_control $pago_cuenta_cobrar_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $pago_cuenta_cobrars=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(pago_cuenta_cobrar_session $pago_cuenta_cobrar_session);		
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
		public function getHtmlTablaDatosResumen(array $pago_cuenta_cobrars=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $pago_cuenta_cobrars=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(pago_cuenta_cobrar $pago_cuenta_cobrar=null) : string;
		
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
