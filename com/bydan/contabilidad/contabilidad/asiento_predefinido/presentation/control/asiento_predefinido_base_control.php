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

namespace com\bydan\contabilidad\contabilidad\asiento_predefinido\presentation\control;

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

use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\entity\asiento_predefinido;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/asiento_predefinido/util/asiento_predefinido_carga.php');
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_carga;

use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_param_return;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\logic\asiento_predefinido_logic;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\presentation\session\asiento_predefinido_session;


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

use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\modulo\business\logic\modulo_logic;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;

use com\bydan\contabilidad\contabilidad\fuente\business\entity\fuente;
use com\bydan\contabilidad\contabilidad\fuente\business\logic\fuente_logic;
use com\bydan\contabilidad\contabilidad\fuente\util\fuente_carga;
use com\bydan\contabilidad\contabilidad\fuente\util\fuente_util;

use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\logic\libro_auxiliar_logic;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_carga;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_util;

use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;
use com\bydan\contabilidad\contabilidad\centro_costo\business\logic\centro_costo_logic;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_carga;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_util;

use com\bydan\contabilidad\contabilidad\documento_contable\business\entity\documento_contable;
use com\bydan\contabilidad\contabilidad\documento_contable\business\logic\documento_contable_logic;
use com\bydan\contabilidad\contabilidad\documento_contable\util\documento_contable_carga;
use com\bydan\contabilidad\contabilidad\documento_contable\util\documento_contable_util;

//REL


use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_util;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\presentation\session\asiento_predefinido_detalle_session;

use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;
use com\bydan\contabilidad\contabilidad\asiento\presentation\session\asiento_session;


/*CARGA ARCHIVOS FRAMEWORK*/
asiento_predefinido_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
asiento_predefinido_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
asiento_predefinido_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
asiento_predefinido_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*asiento_predefinido_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class asiento_predefinido_base_control extends asiento_predefinido_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->asiento_predefinidoClase==null) {		
				$this->asiento_predefinidoClase=new asiento_predefinido();
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
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_modulo')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_modulo',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_fuente')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_fuente',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_libro_auxiliar')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_libro_auxiliar',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_centro_costo')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_centro_costo',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_documento_contable')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_documento_contable',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->asiento_predefinidoClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->asiento_predefinidoClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->asiento_predefinidoClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->asiento_predefinidoClase->setid_sucursal((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sucursal'));
				
				$this->asiento_predefinidoClase->setid_ejercicio((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio'));
				
				$this->asiento_predefinidoClase->setid_periodo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo'));
				
				$this->asiento_predefinidoClase->setid_usuario((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_usuario'));
				
				$this->asiento_predefinidoClase->setid_modulo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_modulo'));
				
				$this->asiento_predefinidoClase->setcodigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo'));
				
				$this->asiento_predefinidoClase->setnombre($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre'));
				
				$this->asiento_predefinidoClase->setid_fuente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_fuente'));
				
				$this->asiento_predefinidoClase->setid_libro_auxiliar((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_libro_auxiliar'));
				
				$this->asiento_predefinidoClase->setid_centro_costo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_centro_costo'));
				
				$this->asiento_predefinidoClase->setid_documento_contable((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_documento_contable'));
				
				$this->asiento_predefinidoClase->setdescripcion($this->getDataCampoFormTabla('form'.$this->strSufijo,'descripcion'));
				
				$this->asiento_predefinidoClase->setnro_nit($this->getDataCampoFormTabla('form'.$this->strSufijo,'nro_nit'));
				
				$this->asiento_predefinidoClase->setreferencia($this->getDataCampoFormTabla('form'.$this->strSufijo,'referencia'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->asiento_predefinidoModel->set($this->asiento_predefinidoClase);
				
				/*$this->asiento_predefinidoModel->set($this->migrarModelasiento_predefinido($this->asiento_predefinidoClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->asiento_predefinidoLogic->getasiento_predefinido()->setId($this->asiento_predefinidoClase->getId());	
			$this->asiento_predefinidoLogic->getasiento_predefinido()->setVersionRow($this->asiento_predefinidoClase->getVersionRow());	
			$this->asiento_predefinidoLogic->getasiento_predefinido()->setVersionRow($this->asiento_predefinidoClase->getVersionRow());	
			$this->asiento_predefinidoLogic->getasiento_predefinido()->setid_empresa($this->asiento_predefinidoClase->getid_empresa());	
			$this->asiento_predefinidoLogic->getasiento_predefinido()->setid_sucursal($this->asiento_predefinidoClase->getid_sucursal());	
			$this->asiento_predefinidoLogic->getasiento_predefinido()->setid_ejercicio($this->asiento_predefinidoClase->getid_ejercicio());	
			$this->asiento_predefinidoLogic->getasiento_predefinido()->setid_periodo($this->asiento_predefinidoClase->getid_periodo());	
			$this->asiento_predefinidoLogic->getasiento_predefinido()->setid_usuario($this->asiento_predefinidoClase->getid_usuario());	
			$this->asiento_predefinidoLogic->getasiento_predefinido()->setid_modulo($this->asiento_predefinidoClase->getid_modulo());	
			$this->asiento_predefinidoLogic->getasiento_predefinido()->setcodigo($this->asiento_predefinidoClase->getcodigo());	
			$this->asiento_predefinidoLogic->getasiento_predefinido()->setnombre($this->asiento_predefinidoClase->getnombre());	
			$this->asiento_predefinidoLogic->getasiento_predefinido()->setid_fuente($this->asiento_predefinidoClase->getid_fuente());	
			$this->asiento_predefinidoLogic->getasiento_predefinido()->setid_libro_auxiliar($this->asiento_predefinidoClase->getid_libro_auxiliar());	
			$this->asiento_predefinidoLogic->getasiento_predefinido()->setid_centro_costo($this->asiento_predefinidoClase->getid_centro_costo());	
			$this->asiento_predefinidoLogic->getasiento_predefinido()->setid_documento_contable($this->asiento_predefinidoClase->getid_documento_contable());	
			$this->asiento_predefinidoLogic->getasiento_predefinido()->setdescripcion($this->asiento_predefinidoClase->getdescripcion());	
			$this->asiento_predefinidoLogic->getasiento_predefinido()->setnro_nit($this->asiento_predefinidoClase->getnro_nit());	
			$this->asiento_predefinidoLogic->getasiento_predefinido()->setreferencia($this->asiento_predefinidoClase->getreferencia());	
		} else {
			$this->asiento_predefinidoClase->setId($this->asiento_predefinidoLogic->getasiento_predefinido()->getId());	
			$this->asiento_predefinidoClase->setVersionRow($this->asiento_predefinidoLogic->getasiento_predefinido()->getVersionRow());	
			$this->asiento_predefinidoClase->setVersionRow($this->asiento_predefinidoLogic->getasiento_predefinido()->getVersionRow());	
			$this->asiento_predefinidoClase->setid_empresa($this->asiento_predefinidoLogic->getasiento_predefinido()->getid_empresa());	
			$this->asiento_predefinidoClase->setid_sucursal($this->asiento_predefinidoLogic->getasiento_predefinido()->getid_sucursal());	
			$this->asiento_predefinidoClase->setid_ejercicio($this->asiento_predefinidoLogic->getasiento_predefinido()->getid_ejercicio());	
			$this->asiento_predefinidoClase->setid_periodo($this->asiento_predefinidoLogic->getasiento_predefinido()->getid_periodo());	
			$this->asiento_predefinidoClase->setid_usuario($this->asiento_predefinidoLogic->getasiento_predefinido()->getid_usuario());	
			$this->asiento_predefinidoClase->setid_modulo($this->asiento_predefinidoLogic->getasiento_predefinido()->getid_modulo());	
			$this->asiento_predefinidoClase->setcodigo($this->asiento_predefinidoLogic->getasiento_predefinido()->getcodigo());	
			$this->asiento_predefinidoClase->setnombre($this->asiento_predefinidoLogic->getasiento_predefinido()->getnombre());	
			$this->asiento_predefinidoClase->setid_fuente($this->asiento_predefinidoLogic->getasiento_predefinido()->getid_fuente());	
			$this->asiento_predefinidoClase->setid_libro_auxiliar($this->asiento_predefinidoLogic->getasiento_predefinido()->getid_libro_auxiliar());	
			$this->asiento_predefinidoClase->setid_centro_costo($this->asiento_predefinidoLogic->getasiento_predefinido()->getid_centro_costo());	
			$this->asiento_predefinidoClase->setid_documento_contable($this->asiento_predefinidoLogic->getasiento_predefinido()->getid_documento_contable());	
			$this->asiento_predefinidoClase->setdescripcion($this->asiento_predefinidoLogic->getasiento_predefinido()->getdescripcion());	
			$this->asiento_predefinidoClase->setnro_nit($this->asiento_predefinidoLogic->getasiento_predefinido()->getnro_nit());	
			$this->asiento_predefinidoClase->setreferencia($this->asiento_predefinidoLogic->getasiento_predefinido()->getreferencia());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->asiento_predefinidoModel->invalidFieldsMe();
		
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
		if($strNombreCampo=='id_modulo') {$this->strMensajeid_modulo=$strMensajeCampo;}
		if($strNombreCampo=='codigo') {$this->strMensajecodigo=$strMensajeCampo;}
		if($strNombreCampo=='nombre') {$this->strMensajenombre=$strMensajeCampo;}
		if($strNombreCampo=='id_fuente') {$this->strMensajeid_fuente=$strMensajeCampo;}
		if($strNombreCampo=='id_libro_auxiliar') {$this->strMensajeid_libro_auxiliar=$strMensajeCampo;}
		if($strNombreCampo=='id_centro_costo') {$this->strMensajeid_centro_costo=$strMensajeCampo;}
		if($strNombreCampo=='id_documento_contable') {$this->strMensajeid_documento_contable=$strMensajeCampo;}
		if($strNombreCampo=='descripcion') {$this->strMensajedescripcion=$strMensajeCampo;}
		if($strNombreCampo=='nro_nit') {$this->strMensajenro_nit=$strMensajeCampo;}
		if($strNombreCampo=='referencia') {$this->strMensajereferencia=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeid_sucursal='';
		$this->strMensajeid_ejercicio='';
		$this->strMensajeid_periodo='';
		$this->strMensajeid_usuario='';
		$this->strMensajeid_modulo='';
		$this->strMensajecodigo='';
		$this->strMensajenombre='';
		$this->strMensajeid_fuente='';
		$this->strMensajeid_libro_auxiliar='';
		$this->strMensajeid_centro_costo='';
		$this->strMensajeid_documento_contable='';
		$this->strMensajedescripcion='';
		$this->strMensajenro_nit='';
		$this->strMensajereferencia='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
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
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}

			$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));
						
			if($asiento_predefinido_session==null) {
				$asiento_predefinido_session=new asiento_predefinido_session();
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
						$this->asiento_predefinidoLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->asiento_predefinidoActual =$this->asiento_predefinidoClase;
			
			/*$this->asiento_predefinidoActual =$this->migrarModelasiento_predefinido($this->asiento_predefinidoClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->asiento_predefinidoLogic->getasiento_predefinidos(),$this->asiento_predefinidoActual);
			
			$this->actualizarControllerConReturnGeneral($this->asiento_predefinidoReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
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
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$asiento_predefinidosLocal=$this->getListaActual();
		
		$iIndice=asiento_predefinido_util::getIndiceNuevo($asiento_predefinidosLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(asiento_predefinido $asiento_predefinido,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$asiento_predefinidosLocal=$this->getListaActual();
		
		$iIndice=asiento_predefinido_util::getIndiceActual($asiento_predefinidosLocal,$asiento_predefinido,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevoasiento_predefinido')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->asiento_predefinidoActual =$this->asiento_predefinidoClase;
			
			/*$this->asiento_predefinidoActual =$this->migrarModelasiento_predefinido($this->asiento_predefinidoClase);*/
			
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
			
			$this->asiento_predefinidoLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('modulo');$classes[]=$class;
				$class=new Classe('fuente');$classes[]=$class;
				$class=new Classe('libro_auxiliar');$classes[]=$class;
				$class=new Classe('centro_costo');$classes[]=$class;
				$class=new Classe('documento_contable');$classes[]=$class;
			
			$this->asiento_predefinidoLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->asiento_predefinidoLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->asiento_predefinidoLogic->setasiento_predefinido(new asiento_predefinido());
				
				$this->asiento_predefinidoLogic->getasiento_predefinido()->setIsNew(true);
				$this->asiento_predefinidoLogic->getasiento_predefinido()->setIsChanged(true);
				$this->asiento_predefinidoLogic->getasiento_predefinido()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->asiento_predefinidoModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->asiento_predefinidoLogic->asiento_predefinidos[]=$this->asiento_predefinidoLogic->getasiento_predefinido();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->asiento_predefinidoLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							asiento_predefinido_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_predefinido_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientopredefinidodetalles=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME.'Lista'));
							$asientopredefinidodetallesEliminados=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientopredefinidodetalles=array_merge($asientopredefinidodetalles,$asientopredefinidodetallesEliminados);
							asiento_predefinido_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientos=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'Lista'));
							$asientosEliminados=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientos=array_merge($asientos,$asientosEliminados);
							
							$this->asiento_predefinidoLogic->saveRelaciones($this->asiento_predefinidoLogic->getasiento_predefinido(),$asientopredefinidodetalles,$asientos);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->asiento_predefinidoLogic->getasiento_predefinido()->setIsChanged(true);
				$this->asiento_predefinidoLogic->getasiento_predefinido()->setIsNew(false);
				$this->asiento_predefinidoLogic->getasiento_predefinido()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->asiento_predefinidoModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->asiento_predefinidoLogic->getasiento_predefinido(),$this->asiento_predefinidoLogic->getasiento_predefinidos());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->asiento_predefinidoLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							asiento_predefinido_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_predefinido_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientopredefinidodetalles=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME.'Lista'));
							$asientopredefinidodetallesEliminados=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientopredefinidodetalles=array_merge($asientopredefinidodetalles,$asientopredefinidodetallesEliminados);
							asiento_predefinido_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientos=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'Lista'));
							$asientosEliminados=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientos=array_merge($asientos,$asientosEliminados);
							
							$this->asiento_predefinidoLogic->saveRelaciones($this->asiento_predefinidoLogic->getasiento_predefinido(),$asientopredefinidodetalles,$asientos);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->asiento_predefinidoLogic->getasiento_predefinido()->setIsDeleted(true);
				$this->asiento_predefinidoLogic->getasiento_predefinido()->setIsNew(false);
				$this->asiento_predefinidoLogic->getasiento_predefinido()->setIsChanged(false);				
				
				$this->actualizarLista($this->asiento_predefinidoLogic->getasiento_predefinido(),$this->asiento_predefinidoLogic->getasiento_predefinidos());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->asiento_predefinidoLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							asiento_predefinido_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_predefinido_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientopredefinidodetalles=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME.'Lista'));
							$asientopredefinidodetallesEliminados=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientopredefinidodetalles=array_merge($asientopredefinidodetalles,$asientopredefinidodetallesEliminados);

							foreach($asientopredefinidodetalles as $asientopredefinidodetalle1) {
								$asientopredefinidodetalle1->setIsDeleted(true);
							}
							asiento_predefinido_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientos=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'Lista'));
							$asientosEliminados=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientos=array_merge($asientos,$asientosEliminados);

							foreach($asientos as $asiento1) {
								$asiento1->setIsDeleted(true);
							}
							
						$this->asiento_predefinidoLogic->saveRelaciones($this->asiento_predefinidoLogic->getasiento_predefinido(),$asientopredefinidodetalles,$asientos);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->asiento_predefinidosEliminados[]=$this->asiento_predefinidoLogic->getasiento_predefinido();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->asiento_predefinidoLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							asiento_predefinido_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_predefinido_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientopredefinidodetalles=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME.'Lista'));
							$asientopredefinidodetallesEliminados=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientopredefinidodetalles=array_merge($asientopredefinidodetalles,$asientopredefinidodetallesEliminados);
							asiento_predefinido_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientos=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'Lista'));
							$asientosEliminados=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientos=array_merge($asientos,$asientosEliminados);
							
						$this->asiento_predefinidoLogic->saveRelaciones($this->asiento_predefinidoLogic->getasiento_predefinido(),$asientopredefinidodetalles,$asientos);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->asiento_predefinidosEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->asiento_predefinidoLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->asiento_predefinidoLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->asiento_predefinidosEliminados=array();
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
				$class=new Classe('modulo');$classes[]=$class;
				$class=new Classe('fuente');$classes[]=$class;
				$class=new Classe('libro_auxiliar');$classes[]=$class;
				$class=new Classe('centro_costo');$classes[]=$class;
				$class=new Classe('documento_contable');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->asiento_predefinidoLogic->setasiento_predefinidos();*/
					
					$this->asiento_predefinidoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->asiento_predefinidoLogic->setIsConDeepLoad(false);
			
			$this->asiento_predefinidos=$this->asiento_predefinidoLogic->getasiento_predefinidos();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(asiento_predefinido_util::$STR_SESSION_NAME.'Lista',serialize($this->asiento_predefinidos));
				$this->Session->write(asiento_predefinido_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->asiento_predefinidosEliminados));
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
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
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
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalasiento_predefinido;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->asiento_predefinidoLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->asiento_predefinidos as $asiento_predefinidoLocal) {
				if($this->asiento_predefinidoLogic->getasiento_predefinido()->getId()==$asiento_predefinidoLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->asiento_predefinidoLogic->getasiento_predefinido()->setIsDeleted(true);
			$this->asiento_predefinidosEliminados[]=$this->asiento_predefinidoLogic->getasiento_predefinido();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->asiento_predefinidos[$indice]);
				
				$this->asiento_predefinidos = array_values($this->asiento_predefinidos);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelasiento_predefinido($this->asiento_predefinidoClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(asiento_predefinido $asiento_predefinido,array $asiento_predefinidos) {
		try {
			foreach($asiento_predefinidos as $asiento_predefinidoLocal){ 
				if($asiento_predefinidoLocal->getId()==$asiento_predefinido->getId()) {
					$asiento_predefinidoLocal->setIsChanged($asiento_predefinido->getIsChanged());
					$asiento_predefinidoLocal->setIsNew($asiento_predefinido->getIsNew());
					$asiento_predefinidoLocal->setIsDeleted($asiento_predefinido->getIsDeleted());
					//$asiento_predefinidoLocal->setbitExpired($asiento_predefinido->getbitExpired());
					
					$asiento_predefinidoLocal->setId($asiento_predefinido->getId());	
					$asiento_predefinidoLocal->setVersionRow($asiento_predefinido->getVersionRow());	
					$asiento_predefinidoLocal->setVersionRow($asiento_predefinido->getVersionRow());	
					$asiento_predefinidoLocal->setid_empresa($asiento_predefinido->getid_empresa());	
					$asiento_predefinidoLocal->setid_sucursal($asiento_predefinido->getid_sucursal());	
					$asiento_predefinidoLocal->setid_ejercicio($asiento_predefinido->getid_ejercicio());	
					$asiento_predefinidoLocal->setid_periodo($asiento_predefinido->getid_periodo());	
					$asiento_predefinidoLocal->setid_usuario($asiento_predefinido->getid_usuario());	
					$asiento_predefinidoLocal->setid_modulo($asiento_predefinido->getid_modulo());	
					$asiento_predefinidoLocal->setcodigo($asiento_predefinido->getcodigo());	
					$asiento_predefinidoLocal->setnombre($asiento_predefinido->getnombre());	
					$asiento_predefinidoLocal->setid_fuente($asiento_predefinido->getid_fuente());	
					$asiento_predefinidoLocal->setid_libro_auxiliar($asiento_predefinido->getid_libro_auxiliar());	
					$asiento_predefinidoLocal->setid_centro_costo($asiento_predefinido->getid_centro_costo());	
					$asiento_predefinidoLocal->setid_documento_contable($asiento_predefinido->getid_documento_contable());	
					$asiento_predefinidoLocal->setdescripcion($asiento_predefinido->getdescripcion());	
					$asiento_predefinidoLocal->setnro_nit($asiento_predefinido->getnro_nit());	
					$asiento_predefinidoLocal->setreferencia($asiento_predefinido->getreferencia());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$asiento_predefinidosLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$asiento_predefinidosLocal=$this->asiento_predefinidoLogic->getasiento_predefinidos();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$asiento_predefinidosLocal=$this->asiento_predefinidos;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $asiento_predefinidosLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->asiento_predefinidoLogic->getasiento_predefinidos() as $asiento_predefinido) {
				if($asiento_predefinido->getId()==$id) {
					$this->asiento_predefinidoLogic->setasiento_predefinido($asiento_predefinido);
					
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
		/*$asiento_predefinidosSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->asiento_predefinidos as $asiento_predefinido) {
			$asiento_predefinido->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->asiento_predefinidos[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : asiento_predefinido_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));
						
		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		
		$this->asiento_predefinidoReturnGeneral=new asiento_predefinido_param_return();
		$this->asiento_predefinidoParameterGeneral=new asiento_predefinido_param_return();
			
		$this->asiento_predefinidoParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualasiento_predefinido(this.asiento_predefinido,true);
			this.setVariablesFormularioToObjetoActualForeignKeysasiento_predefinido(this.asiento_predefinido);*/
			
			if($asiento_predefinido_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualasiento_predefinido(this.asiento_predefinido,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->asiento_predefinidoActual=$this->asiento_predefinidoClase;
				
				$this->setCopiarVariablesObjetos($this->asiento_predefinidoActual,$this->asiento_predefinido,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->asiento_predefinidoReturnGeneral=$this->asiento_predefinidoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->asiento_predefinidoLogic->getasiento_predefinidos(),$this->asiento_predefinido,$this->asiento_predefinidoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($asiento_predefinido_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanasiento_predefinido($classes,$this->asiento_predefinidoReturnGeneral,$this->asiento_predefinidoBean,false);*/
				}
					
				if($this->asiento_predefinidoReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->asiento_predefinidoReturnGeneral->getasiento_predefinido(),$this->asiento_predefinidoActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeyasiento_predefinido($this->asiento_predefinidoReturnGeneral->getasiento_predefinido());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormularioasiento_predefinido($this->asiento_predefinidoReturnGeneral->getasiento_predefinido());*/
				}
					
				if($this->asiento_predefinidoReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->asiento_predefinidoReturnGeneral->getasiento_predefinido(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->asiento_predefinido,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(asiento_predefinidoJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualasiento_predefinido(this.asiento_predefinido,true);
				this.setVariablesFormularioToObjetoActualForeignKeysasiento_predefinido(this.asiento_predefinido);				
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
				
				if($this->asiento_predefinidoAnterior!=null) {
					$this->asiento_predefinido=$this->asiento_predefinidoAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->asiento_predefinidoReturnGeneral=$this->asiento_predefinidoLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->asiento_predefinidoLogic->getasiento_predefinidos(),$this->asiento_predefinido,$this->asiento_predefinidoParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->asiento_predefinidoReturnGeneral->getasiento_predefinido(),$this->asiento_predefinidoLogic->getasiento_predefinidos());
			*/
		}
		
		return $this->asiento_predefinidoReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}

			$this->asiento_predefinidoReturnGeneral=new asiento_predefinido_param_return();			
			$this->asiento_predefinidoParameterGeneral=new asiento_predefinido_param_return();
			
			$this->asiento_predefinidoParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->asiento_predefinidoReturnGeneral=$this->asiento_predefinidoLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->asiento_predefinidos,$this->asiento_predefinidoParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->asiento_predefinidoReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->asiento_predefinidoReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->asiento_predefinidoReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
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
		
		$this->asiento_predefinidoReturnGeneral=new asiento_predefinido_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_asiento_predefinido') {
		    $sDominio='asiento_predefinido';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->asiento_predefinidoReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->asiento_predefinidoReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='asiento_predefinido';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='asiento_predefinido';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='asiento_predefinido';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->asiento_predefinidoReturnGeneral=new asiento_predefinido_param_return();
		$this->asiento_predefinidoParameterGeneral=new asiento_predefinido_param_return();
			
		$this->asiento_predefinidoParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->asiento_predefinidoReturnGeneral=$this->asiento_predefinidoLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->asiento_predefinidoLogic->getasiento_predefinidos(),$this->asiento_predefinido,$this->asiento_predefinidoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->asiento_predefinidoReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->asiento_predefinidoReturnGeneral->getasiento_predefinido(),$classes);*/
		}									
	
		if($this->asiento_predefinidoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->asiento_predefinidoReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->asiento_predefinidoReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $asiento_predefinidos,asiento_predefinido $asiento_predefinido) {
		
		$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));
						
		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(asiento_predefinido_util::$CLASSNAME);
			}	
			*/
			
			$this->asiento_predefinidoReturnGeneral=new asiento_predefinido_param_return();
			$this->asiento_predefinidoParameterGeneral=new asiento_predefinido_param_return();
			
			$this->asiento_predefinidoParameterGeneral->setdata($this->data);
		
		
			
		if($asiento_predefinido_session->conGuardarRelaciones) {
			$classes=asiento_predefinido_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->asiento_predefinidoActual,$this->asiento_predefinido,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->asiento_predefinidoReturnGeneral=$this->asiento_predefinidoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->asiento_predefinidoLogic->getasiento_predefinidos(),$this->asiento_predefinidoActual,$this->asiento_predefinidoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->asiento_predefinidoReturnGeneral=$this->asiento_predefinidoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$asiento_predefinidos,$asiento_predefinido,$this->asiento_predefinidoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelasiento_predefinido($this->asiento_predefinidoLogic->getasiento_predefinido());*/
			
			$this->asiento_predefinido=$this->asiento_predefinidoLogic->getasiento_predefinido();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->asiento_predefinido);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$asiento_predefinidoActual=new asiento_predefinido();
			
			if($this->asiento_predefinidoClase==null) {		
				$this->asiento_predefinidoClase=new asiento_predefinido();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$asiento_predefinidoActual=$this->asiento_predefinidos[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setid_modulo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setid_fuente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setid_libro_auxiliar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setid_centro_costo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setid_documento_contable((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setnro_nit($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setreferencia($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }

				$this->asiento_predefinidoClase=$asiento_predefinidoActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->asiento_predefinidoModel->set($this->asiento_predefinidoClase);
				
				/*$this->asiento_predefinidoModel->set($this->migrarModelasiento_predefinido($this->asiento_predefinidoClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->asiento_predefinidos=$this->migrarModelasiento_predefinido($this->asiento_predefinidoLogic->getasiento_predefinidos());							
		$this->asiento_predefinidos=$this->asiento_predefinidoLogic->getasiento_predefinidos();*/
		
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
			$this->Session->write(asiento_predefinido_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$asiento_predefinido_control_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($asiento_predefinido_control_session==null) {
				$asiento_predefinido_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($asiento_predefinido_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(asiento_predefinido_util::$STR_SESSION_NAME,$this);*/
		} else {
			$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));
			
			if($asiento_predefinido_session==null) {
				$asiento_predefinido_session=new asiento_predefinido_session();
			}
			
			$this->set(asiento_predefinido_util::$STR_SESSION_NAME, $asiento_predefinido_session);
		}
	}
	
	public function setCopiarVariablesObjetos(asiento_predefinido $asiento_predefinidoOrigen,asiento_predefinido $asiento_predefinido,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($asiento_predefinido==null) {
				$asiento_predefinido=new asiento_predefinido();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $asiento_predefinidoOrigen->getId()!=null && $asiento_predefinidoOrigen->getId()!=0)) {$asiento_predefinido->setId($asiento_predefinidoOrigen->getId());}}
			if($conDefault || ($conDefault==false && $asiento_predefinidoOrigen->getid_modulo()!=null && $asiento_predefinidoOrigen->getid_modulo()!=-1)) {$asiento_predefinido->setid_modulo($asiento_predefinidoOrigen->getid_modulo());}
			if($conDefault || ($conDefault==false && $asiento_predefinidoOrigen->getcodigo()!=null && $asiento_predefinidoOrigen->getcodigo()!='')) {$asiento_predefinido->setcodigo($asiento_predefinidoOrigen->getcodigo());}
			if($conDefault || ($conDefault==false && $asiento_predefinidoOrigen->getnombre()!=null && $asiento_predefinidoOrigen->getnombre()!='')) {$asiento_predefinido->setnombre($asiento_predefinidoOrigen->getnombre());}
			if($conDefault || ($conDefault==false && $asiento_predefinidoOrigen->getid_fuente()!=null && $asiento_predefinidoOrigen->getid_fuente()!=-1)) {$asiento_predefinido->setid_fuente($asiento_predefinidoOrigen->getid_fuente());}
			if($conDefault || ($conDefault==false && $asiento_predefinidoOrigen->getid_libro_auxiliar()!=null && $asiento_predefinidoOrigen->getid_libro_auxiliar()!=-1)) {$asiento_predefinido->setid_libro_auxiliar($asiento_predefinidoOrigen->getid_libro_auxiliar());}
			if($conDefault || ($conDefault==false && $asiento_predefinidoOrigen->getid_centro_costo()!=null && $asiento_predefinidoOrigen->getid_centro_costo()!=-1)) {$asiento_predefinido->setid_centro_costo($asiento_predefinidoOrigen->getid_centro_costo());}
			if($conDefault || ($conDefault==false && $asiento_predefinidoOrigen->getid_documento_contable()!=null && $asiento_predefinidoOrigen->getid_documento_contable()!=-1)) {$asiento_predefinido->setid_documento_contable($asiento_predefinidoOrigen->getid_documento_contable());}
			if($conDefault || ($conDefault==false && $asiento_predefinidoOrigen->getdescripcion()!=null && $asiento_predefinidoOrigen->getdescripcion()!='')) {$asiento_predefinido->setdescripcion($asiento_predefinidoOrigen->getdescripcion());}
			if($conDefault || ($conDefault==false && $asiento_predefinidoOrigen->getnro_nit()!=null && $asiento_predefinidoOrigen->getnro_nit()!='')) {$asiento_predefinido->setnro_nit($asiento_predefinidoOrigen->getnro_nit());}
			if($conDefault || ($conDefault==false && $asiento_predefinidoOrigen->getreferencia()!=null && $asiento_predefinidoOrigen->getreferencia()!='')) {$asiento_predefinido->setreferencia($asiento_predefinidoOrigen->getreferencia());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$asiento_predefinidosSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$asiento_predefinidosSeleccionados[]=$this->asiento_predefinidos[$indice];
			}
		}
		
		return $asiento_predefinidosSeleccionados;
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
		$asiento_predefinido= new asiento_predefinido();
		
		foreach($this->asiento_predefinidoLogic->getasiento_predefinidos() as $asiento_predefinido) {
			
		$asiento_predefinido->asientopredefinidodetalles=array();
		$asiento_predefinido->asientos=array();
		}		
		
		if($asiento_predefinido!=null);
	}
	
	public function cargarRelaciones(array $asiento_predefinidos=array()) : array {	
		
		$asiento_predefinidosRespaldo = array();
		$asiento_predefinidosLocal = array();
		
		asiento_predefinido_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			asiento_predefinido_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			asiento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$asiento_predefinidosResp=array();
		$classes=array();
			
		
				$class=new Classe('asiento_predefinido_detalle'); 	$classes[]=$class;
				$class=new Classe('asiento'); 	$classes[]=$class;
			
			
		$asiento_predefinidosRespaldo=$this->asiento_predefinidoLogic->getasiento_predefinidos();
			
		$this->asiento_predefinidoLogic->setIsConDeep(true);
		
		$this->asiento_predefinidoLogic->setasiento_predefinidos($asiento_predefinidos);
			
		$this->asiento_predefinidoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$asiento_predefinidosLocal=$this->asiento_predefinidoLogic->getasiento_predefinidos();
			
		/*RESPALDO*/
		$this->asiento_predefinidoLogic->setasiento_predefinidos($asiento_predefinidosRespaldo);
			
		$this->asiento_predefinidoLogic->setIsConDeep(false);
		
		if($asiento_predefinidosResp!=null);
		
		return $asiento_predefinidosLocal;
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
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(asiento_predefinido_session $asiento_predefinido_session) {
		$asiento_predefinido_session->strTypeOnLoad=$this->strTypeOnLoadasiento_predefinido;
		$asiento_predefinido_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarasiento_predefinido;
		$asiento_predefinido_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarasiento_predefinido;
		$asiento_predefinido_session->bitEsPopup=$this->bitEsPopup;
		$asiento_predefinido_session->bitEsBusqueda=$this->bitEsBusqueda;
		$asiento_predefinido_session->strFuncionJs=$this->strFuncionJs;
		/*$asiento_predefinido_session->strSufijo=$this->strSufijo;*/
		$asiento_predefinido_session->bitEsRelaciones=$this->bitEsRelaciones;
		$asiento_predefinido_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, asiento_predefinido_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisosasiento_predefinido_detalle='none';
			$this->strTienePermisosasiento_predefinido_detalle=((Funciones::existeCadenaArray(asiento_predefinido_detalle_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosasiento_predefinido_detalle='table-cell';

			$this->strTienePermisosasiento='none';
			$this->strTienePermisosasiento=((Funciones::existeCadenaArray(asiento_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosasiento='table-cell';
		} else {
			

			$this->strTienePermisosasiento_predefinido_detalle='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosasiento_predefinido_detalle=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, asiento_predefinido_detalle_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosasiento_predefinido_detalle='table-cell';

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
		$asiento_predefinidoViewAdditional=new asiento_predefinidoView_add();
		$asiento_predefinidoViewAdditional->asiento_predefinidos=$this->asiento_predefinidos;
		$asiento_predefinidoViewAdditional->Session=$this->Session;
		
		return $asiento_predefinidoViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$asiento_predefinidosLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$asiento_predefinidosLocal=$this->asiento_predefinidos;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$asiento_predefinidosLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($asiento_predefinidosLocal)<=0) {
					$asiento_predefinidosLocal=$this->asiento_predefinidos;
				}
			} else {
				$asiento_predefinidosLocal=$this->asiento_predefinidos;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarasiento_predefinidosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarasiento_predefinidosAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$asiento_predefinidoLogic=new asiento_predefinido_logic();
		$asiento_predefinidoLogic->setasiento_predefinidos($this->asiento_predefinidos);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$asiento_predefinido_detalle_session=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME));

		if($asiento_predefinido_detalle_session==null) {
			$asiento_predefinido_detalle_session=new asiento_predefinido_detalle_session();
		}

		$asiento_session=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME));

		if($asiento_session==null) {
			$asiento_session=new asiento_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('modulo');$classes[]=$class;
			$class=new Classe('fuente');$classes[]=$class;
			$class=new Classe('libro_auxiliar');$classes[]=$class;
			$class=new Classe('centro_costo');$classes[]=$class;
			$class=new Classe('documento_contable');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$asiento_predefinidoLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->asiento_predefinidos=$asiento_predefinidoLogic->getasiento_predefinidos();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->asiento_predefinidosLocal=$this->asiento_predefinidos;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=asiento_predefinido_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=asiento_predefinido_util::$STR_TABLE_NAME;		
			
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
			
			$asiento_predefinidos = $this->asiento_predefinidos;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = asiento_predefinido_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = asiento_predefinido_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/contabilidad/presentation/templating/asiento_predefinido_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->asiento_predefinidos=$asiento_predefinidos;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->asiento_predefinidosLocal=$asiento_predefinidosLocal;
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
		
		$asiento_predefinidosLocal=array();
		
		$asiento_predefinidosLocal=$this->asiento_predefinidos;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarasiento_predefinidosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarasiento_predefinidosAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$asiento_predefinidoLogic=new asiento_predefinido_logic();
		$asiento_predefinidoLogic->setasiento_predefinidos($this->asiento_predefinidos);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$asiento_predefinido_detalle_session=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME));

		if($asiento_predefinido_detalle_session==null) {
			$asiento_predefinido_detalle_session=new asiento_predefinido_detalle_session();
		}

		$asiento_session=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME));

		if($asiento_session==null) {
			$asiento_session=new asiento_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('modulo');$classes[]=$class;
			$class=new Classe('fuente');$classes[]=$class;
			$class=new Classe('libro_auxiliar');$classes[]=$class;
			$class=new Classe('centro_costo');$classes[]=$class;
			$class=new Classe('documento_contable');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$asiento_predefinidoLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->asiento_predefinidos=$asiento_predefinidoLogic->getasiento_predefinidos();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$asiento_predefinidos = $this->asiento_predefinidos;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = asiento_predefinido_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = asiento_predefinido_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/contabilidad/presentation/templating/asiento_predefinido_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->asiento_predefinidos=$asiento_predefinidos;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->asiento_predefinidosLocal=$asiento_predefinidosLocal;
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
	
	public function getHtmlTablaDatosResumen(array $asiento_predefinidos=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->asiento_predefinidosReporte = $asiento_predefinidos;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarasiento_predefinidosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarasiento_predefinidosAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $asiento_predefinidos=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->asiento_predefinidosReporte = $asiento_predefinidos;		
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
		
		
		$this->asiento_predefinidosReporte=$this->cargarRelaciones($asiento_predefinidos);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarasiento_predefinidosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarasiento_predefinidosAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(asiento_predefinido $asiento_predefinido=null) : string {	
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
			
			
			$asiento_predefinidosLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$asiento_predefinidosLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($asiento_predefinidosLocal)<=0) {
					/*//DEBE ESCOGER
					$asiento_predefinidosLocal=$this->asiento_predefinidos;*/
				}
			} else {
				/*//DEBE ESCOGER
				$asiento_predefinidosLocal=$this->asiento_predefinidos;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($asiento_predefinidosLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($asiento_predefinidosLocal,true);
			
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
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}
					
			$asiento_predefinidosLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$asiento_predefinidosLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($asiento_predefinidosLocal)<=0) {
					/*//DEBE ESCOGER
					$asiento_predefinidosLocal=$this->asiento_predefinidos;*/
				}
			} else {
				/*//DEBE ESCOGER
				$asiento_predefinidosLocal=$this->asiento_predefinidos;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($asiento_predefinidosLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($asiento_predefinidosLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Asiento Predefinidos';
			
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
			$fileName='asiento_predefinido';
			
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
			
			$title='Reporte de  Asiento Predefinidos';
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
			
			$title='Reporte de  Asiento Predefinidos';
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
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Asiento Predefinidos';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=asiento_predefinido_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->asiento_predefinidosAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->asiento_predefinidosAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->asiento_predefinidosAuxiliar)<=0) {
					$this->asiento_predefinidosAuxiliar=$this->asiento_predefinidos;
				}
			} else {
				$this->asiento_predefinidosAuxiliar=$this->asiento_predefinidos;
			}
		/*} else {
			$this->asiento_predefinidosAuxiliar=$this->asiento_predefinidosReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->asiento_predefinidosAuxiliar as $asiento_predefinido) {
				$row=array();
				
				$row=asiento_predefinido_util::getDataReportRow($tipo,$asiento_predefinido,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			asiento_predefinido_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			asiento_predefinido_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			asiento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$asiento_predefinidosResp=array();
			$classes=array();
			
			
				$class=new Classe('asiento_predefinido_detalle'); 	$classes[]=$class;
				$class=new Classe('asiento'); 	$classes[]=$class;
			
			
			$asiento_predefinidosResp=$this->asiento_predefinidoLogic->getasiento_predefinidos();
			
			$this->asiento_predefinidoLogic->setIsConDeep(true);
			
			$this->asiento_predefinidoLogic->setasiento_predefinidos($this->asiento_predefinidosAuxiliar);
			
			$this->asiento_predefinidoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->asiento_predefinidosAuxiliar=$this->asiento_predefinidoLogic->getasiento_predefinidos();
			
			//RESPALDO
			$this->asiento_predefinidoLogic->setasiento_predefinidos($asiento_predefinidosResp);
			
			$this->asiento_predefinidoLogic->setIsConDeep(false);
			*/
			
			$this->asiento_predefinidosAuxiliar=$this->cargarRelaciones($this->asiento_predefinidosAuxiliar);
			
			$i=0;
			
			foreach ($this->asiento_predefinidosAuxiliar as $asiento_predefinido) {
				$row=array();
				
				if($i!=0) {
					$row=asiento_predefinido_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=asiento_predefinido_util::getDataReportRow($tipo,$asiento_predefinido,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//asiento_predefinido_detalle
				if(Funciones::existeCadenaArrayOrderBy(asiento_predefinido_detalle_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($asiento_predefinido->getasiento_predefinido_detalles())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(asiento_predefinido_detalle_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=asiento_predefinido_detalle_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($asiento_predefinido->getasiento_predefinido_detalles() as $asiento_predefinido_detalle) {
						$row=asiento_predefinido_detalle_util::getDataReportRow('RELACIONADO',$asiento_predefinido_detalle,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//asiento
				if(Funciones::existeCadenaArrayOrderBy(asiento_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($asiento_predefinido->getasientos())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(asiento_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=asiento_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($asiento_predefinido->getasientos() as $asiento) {
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
		$this->asiento_predefinidosAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->asiento_predefinidosAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->asiento_predefinidosAuxiliar)<=0) {
					$this->asiento_predefinidosAuxiliar=$this->asiento_predefinidos;
				}
			} else {
				$this->asiento_predefinidosAuxiliar=$this->asiento_predefinidos;
			}
		/*} else {
			$this->asiento_predefinidosAuxiliar=$this->asiento_predefinidosReporte;	
		}*/
		
		foreach ($this->asiento_predefinidosAuxiliar as $asiento_predefinido) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(asiento_predefinido_util::getasiento_predefinidoDescripcion($asiento_predefinido),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Sucursal',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Sucursal',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getid_sucursalDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Ejercicio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Ejercicio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getid_ejercicioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Periodo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Periodo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getid_periodoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Usuario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Usuario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getid_usuarioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Modulo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Modulo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getid_moduloDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Codigo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getcodigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getnombre(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fuente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fuente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getid_fuenteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Libro Auxiliar',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Libro Auxiliar',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getid_libro_auxiliarDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Centro Costo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Centro Costo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getid_centro_costoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Dcto Contable',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Dcto Contable',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getid_documento_contableDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descripcion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getdescripcion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nro Nit',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Nit',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getnro_nit(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Referencia',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Referencia',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getreferencia(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface asiento_predefinido_base_controlI {			
		
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
		public function getIndiceActual(asiento_predefinido $asiento_predefinido,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(asiento_predefinido $asiento_predefinido,array $asiento_predefinidos);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : asiento_predefinido_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $asiento_predefinidos,asiento_predefinido $asiento_predefinido);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(asiento_predefinido_param_return $asiento_predefinidoReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(asiento_predefinido_session $asiento_predefinido_session);		
		public function actualizarInvitadoSessionDivStyleVariables(asiento_predefinido_session $asiento_predefinido_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(asiento_predefinido $asiento_predefinidoOrigen,asiento_predefinido $asiento_predefinido,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(asiento_predefinido_control $asiento_predefinido_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $asiento_predefinidos=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(asiento_predefinido_session $asiento_predefinido_session);		
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
		public function getHtmlTablaDatosResumen(array $asiento_predefinidos=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $asiento_predefinidos=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(asiento_predefinido $asiento_predefinido=null) : string;
		
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
