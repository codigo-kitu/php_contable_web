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

namespace com\bydan\contabilidad\general\parametro_auxiliar_facturacion\presentation\control;

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

use com\bydan\contabilidad\general\parametro_auxiliar_facturacion\business\entity\parametro_auxiliar_facturacion;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/parametro_auxiliar_facturacion/util/parametro_auxiliar_facturacion_carga.php');
use com\bydan\contabilidad\general\parametro_auxiliar_facturacion\util\parametro_auxiliar_facturacion_carga;

use com\bydan\contabilidad\general\parametro_auxiliar_facturacion\util\parametro_auxiliar_facturacion_util;
use com\bydan\contabilidad\general\parametro_auxiliar_facturacion\util\parametro_auxiliar_facturacion_param_return;
use com\bydan\contabilidad\general\parametro_auxiliar_facturacion\business\logic\parametro_auxiliar_facturacion_logic;
use com\bydan\contabilidad\general\parametro_auxiliar_facturacion\presentation\session\parametro_auxiliar_facturacion_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
parametro_auxiliar_facturacion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
parametro_auxiliar_facturacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
parametro_auxiliar_facturacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
parametro_auxiliar_facturacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*parametro_auxiliar_facturacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class parametro_auxiliar_facturacion_base_control extends parametro_auxiliar_facturacion_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->parametro_auxiliar_facturacionClase==null) {		
				$this->parametro_auxiliar_facturacionClase=new parametro_auxiliar_facturacion();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->parametro_auxiliar_facturacionClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->parametro_auxiliar_facturacionClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->parametro_auxiliar_facturacionClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->parametro_auxiliar_facturacionClase->setnombre_tipo_factura($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre_tipo_factura'));
				
				$this->parametro_auxiliar_facturacionClase->setsiguiente_numero_correlativo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'siguiente_numero_correlativo'));
				
				$this->parametro_auxiliar_facturacionClase->setincremento((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'incremento'));
				
				$this->parametro_auxiliar_facturacionClase->setcon_creacion_rapida_producto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_creacion_rapida_producto')));
				
				$this->parametro_auxiliar_facturacionClase->setcon_busqueda_producto_fabricante(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_busqueda_producto_fabricante')));
				
				$this->parametro_auxiliar_facturacionClase->setcon_solo_costo_producto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_solo_costo_producto')));
				
				$this->parametro_auxiliar_facturacionClase->setcon_recibo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_recibo')));
				
				$this->parametro_auxiliar_facturacionClase->setnombre_tipo_factura_recibo($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre_tipo_factura_recibo'));
				
				$this->parametro_auxiliar_facturacionClase->setsiguiente_numero_correlativo_recibo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'siguiente_numero_correlativo_recibo'));
				
				$this->parametro_auxiliar_facturacionClase->setincremento_recibo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'incremento_recibo'));
				
				$this->parametro_auxiliar_facturacionClase->setcon_impuesto_final_boleta(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_impuesto_final_boleta')));
				
				$this->parametro_auxiliar_facturacionClase->setcon_ticket(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_ticket')));
				
				$this->parametro_auxiliar_facturacionClase->setnombre_tipo_factura_ticket($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre_tipo_factura_ticket'));
				
				$this->parametro_auxiliar_facturacionClase->setsiguiente_numero_correlativo_ticket((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'siguiente_numero_correlativo_ticket'));
				
				$this->parametro_auxiliar_facturacionClase->setincremento_ticket((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'incremento_ticket'));
				
				$this->parametro_auxiliar_facturacionClase->setcon_impuesto_final_ticket(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_impuesto_final_ticket')));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->parametro_auxiliar_facturacionModel->set($this->parametro_auxiliar_facturacionClase);
				
				/*$this->parametro_auxiliar_facturacionModel->set($this->migrarModelparametro_auxiliar_facturacion($this->parametro_auxiliar_facturacionClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setId($this->parametro_auxiliar_facturacionClase->getId());	
			$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setVersionRow($this->parametro_auxiliar_facturacionClase->getVersionRow());	
			$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setVersionRow($this->parametro_auxiliar_facturacionClase->getVersionRow());	
			$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setid_empresa($this->parametro_auxiliar_facturacionClase->getid_empresa());	
			$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setnombre_tipo_factura($this->parametro_auxiliar_facturacionClase->getnombre_tipo_factura());	
			$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setsiguiente_numero_correlativo($this->parametro_auxiliar_facturacionClase->getsiguiente_numero_correlativo());	
			$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setincremento($this->parametro_auxiliar_facturacionClase->getincremento());	
			$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setcon_creacion_rapida_producto($this->parametro_auxiliar_facturacionClase->getcon_creacion_rapida_producto());	
			$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setcon_busqueda_producto_fabricante($this->parametro_auxiliar_facturacionClase->getcon_busqueda_producto_fabricante());	
			$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setcon_solo_costo_producto($this->parametro_auxiliar_facturacionClase->getcon_solo_costo_producto());	
			$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setcon_recibo($this->parametro_auxiliar_facturacionClase->getcon_recibo());	
			$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setnombre_tipo_factura_recibo($this->parametro_auxiliar_facturacionClase->getnombre_tipo_factura_recibo());	
			$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setsiguiente_numero_correlativo_recibo($this->parametro_auxiliar_facturacionClase->getsiguiente_numero_correlativo_recibo());	
			$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setincremento_recibo($this->parametro_auxiliar_facturacionClase->getincremento_recibo());	
			$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setcon_impuesto_final_boleta($this->parametro_auxiliar_facturacionClase->getcon_impuesto_final_boleta());	
			$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setcon_ticket($this->parametro_auxiliar_facturacionClase->getcon_ticket());	
			$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setnombre_tipo_factura_ticket($this->parametro_auxiliar_facturacionClase->getnombre_tipo_factura_ticket());	
			$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setsiguiente_numero_correlativo_ticket($this->parametro_auxiliar_facturacionClase->getsiguiente_numero_correlativo_ticket());	
			$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setincremento_ticket($this->parametro_auxiliar_facturacionClase->getincremento_ticket());	
			$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setcon_impuesto_final_ticket($this->parametro_auxiliar_facturacionClase->getcon_impuesto_final_ticket());	
		} else {
			$this->parametro_auxiliar_facturacionClase->setId($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->getId());	
			$this->parametro_auxiliar_facturacionClase->setVersionRow($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->getVersionRow());	
			$this->parametro_auxiliar_facturacionClase->setVersionRow($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->getVersionRow());	
			$this->parametro_auxiliar_facturacionClase->setid_empresa($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->getid_empresa());	
			$this->parametro_auxiliar_facturacionClase->setnombre_tipo_factura($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->getnombre_tipo_factura());	
			$this->parametro_auxiliar_facturacionClase->setsiguiente_numero_correlativo($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->getsiguiente_numero_correlativo());	
			$this->parametro_auxiliar_facturacionClase->setincremento($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->getincremento());	
			$this->parametro_auxiliar_facturacionClase->setcon_creacion_rapida_producto($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->getcon_creacion_rapida_producto());	
			$this->parametro_auxiliar_facturacionClase->setcon_busqueda_producto_fabricante($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->getcon_busqueda_producto_fabricante());	
			$this->parametro_auxiliar_facturacionClase->setcon_solo_costo_producto($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->getcon_solo_costo_producto());	
			$this->parametro_auxiliar_facturacionClase->setcon_recibo($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->getcon_recibo());	
			$this->parametro_auxiliar_facturacionClase->setnombre_tipo_factura_recibo($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->getnombre_tipo_factura_recibo());	
			$this->parametro_auxiliar_facturacionClase->setsiguiente_numero_correlativo_recibo($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->getsiguiente_numero_correlativo_recibo());	
			$this->parametro_auxiliar_facturacionClase->setincremento_recibo($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->getincremento_recibo());	
			$this->parametro_auxiliar_facturacionClase->setcon_impuesto_final_boleta($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->getcon_impuesto_final_boleta());	
			$this->parametro_auxiliar_facturacionClase->setcon_ticket($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->getcon_ticket());	
			$this->parametro_auxiliar_facturacionClase->setnombre_tipo_factura_ticket($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->getnombre_tipo_factura_ticket());	
			$this->parametro_auxiliar_facturacionClase->setsiguiente_numero_correlativo_ticket($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->getsiguiente_numero_correlativo_ticket());	
			$this->parametro_auxiliar_facturacionClase->setincremento_ticket($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->getincremento_ticket());	
			$this->parametro_auxiliar_facturacionClase->setcon_impuesto_final_ticket($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->getcon_impuesto_final_ticket());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->parametro_auxiliar_facturacionModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='nombre_tipo_factura') {$this->strMensajenombre_tipo_factura=$strMensajeCampo;}
		if($strNombreCampo=='siguiente_numero_correlativo') {$this->strMensajesiguiente_numero_correlativo=$strMensajeCampo;}
		if($strNombreCampo=='incremento') {$this->strMensajeincremento=$strMensajeCampo;}
		if($strNombreCampo=='con_creacion_rapida_producto') {$this->strMensajecon_creacion_rapida_producto=$strMensajeCampo;}
		if($strNombreCampo=='con_busqueda_producto_fabricante') {$this->strMensajecon_busqueda_producto_fabricante=$strMensajeCampo;}
		if($strNombreCampo=='con_solo_costo_producto') {$this->strMensajecon_solo_costo_producto=$strMensajeCampo;}
		if($strNombreCampo=='con_recibo') {$this->strMensajecon_recibo=$strMensajeCampo;}
		if($strNombreCampo=='nombre_tipo_factura_recibo') {$this->strMensajenombre_tipo_factura_recibo=$strMensajeCampo;}
		if($strNombreCampo=='siguiente_numero_correlativo_recibo') {$this->strMensajesiguiente_numero_correlativo_recibo=$strMensajeCampo;}
		if($strNombreCampo=='incremento_recibo') {$this->strMensajeincremento_recibo=$strMensajeCampo;}
		if($strNombreCampo=='con_impuesto_final_boleta') {$this->strMensajecon_impuesto_final_boleta=$strMensajeCampo;}
		if($strNombreCampo=='con_ticket') {$this->strMensajecon_ticket=$strMensajeCampo;}
		if($strNombreCampo=='nombre_tipo_factura_ticket') {$this->strMensajenombre_tipo_factura_ticket=$strMensajeCampo;}
		if($strNombreCampo=='siguiente_numero_correlativo_ticket') {$this->strMensajesiguiente_numero_correlativo_ticket=$strMensajeCampo;}
		if($strNombreCampo=='incremento_ticket') {$this->strMensajeincremento_ticket=$strMensajeCampo;}
		if($strNombreCampo=='con_impuesto_final_ticket') {$this->strMensajecon_impuesto_final_ticket=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajenombre_tipo_factura='';
		$this->strMensajesiguiente_numero_correlativo='';
		$this->strMensajeincremento='';
		$this->strMensajecon_creacion_rapida_producto='';
		$this->strMensajecon_busqueda_producto_fabricante='';
		$this->strMensajecon_solo_costo_producto='';
		$this->strMensajecon_recibo='';
		$this->strMensajenombre_tipo_factura_recibo='';
		$this->strMensajesiguiente_numero_correlativo_recibo='';
		$this->strMensajeincremento_recibo='';
		$this->strMensajecon_impuesto_final_boleta='';
		$this->strMensajecon_ticket='';
		$this->strMensajenombre_tipo_factura_ticket='';
		$this->strMensajesiguiente_numero_correlativo_ticket='';
		$this->strMensajeincremento_ticket='';
		$this->strMensajecon_impuesto_final_ticket='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliar_facturacionLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliar_facturacionLogic->closeNewConnexionToDeep();
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
				$this->parametro_auxiliar_facturacionLogic->getNewConnexionToDeep();
			}

			$parametro_auxiliar_facturacion_session=unserialize($this->Session->read(parametro_auxiliar_facturacion_util::$STR_SESSION_NAME));
						
			if($parametro_auxiliar_facturacion_session==null) {
				$parametro_auxiliar_facturacion_session=new parametro_auxiliar_facturacion_session();
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
						$this->parametro_auxiliar_facturacionLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->parametro_auxiliar_facturacionActual =$this->parametro_auxiliar_facturacionClase;
			
			/*$this->parametro_auxiliar_facturacionActual =$this->migrarModelparametro_auxiliar_facturacion($this->parametro_auxiliar_facturacionClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliar_facturacionLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacions(),$this->parametro_auxiliar_facturacionActual);
			
			$this->actualizarControllerConReturnGeneral($this->parametro_auxiliar_facturacionReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliar_facturacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->getNewConnexionToDeep();
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
				$this->parametro_auxiliar_facturacionLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliar_facturacionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliar_facturacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$parametro_auxiliar_facturacionsLocal=$this->getListaActual();
		
		$iIndice=parametro_auxiliar_facturacion_util::getIndiceNuevo($parametro_auxiliar_facturacionsLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(parametro_auxiliar_facturacion $parametro_auxiliar_facturacion,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$parametro_auxiliar_facturacionsLocal=$this->getListaActual();
		
		$iIndice=parametro_auxiliar_facturacion_util::getIndiceActual($parametro_auxiliar_facturacionsLocal,$parametro_auxiliar_facturacion,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevoparametro_auxiliar_facturacion')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->parametro_auxiliar_facturacionActual =$this->parametro_auxiliar_facturacionClase;
			
			/*$this->parametro_auxiliar_facturacionActual =$this->migrarModelparametro_auxiliar_facturacion($this->parametro_auxiliar_facturacionClase);*/
			
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
			
			$this->parametro_auxiliar_facturacionLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
			
			$this->parametro_auxiliar_facturacionLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->parametro_auxiliar_facturacionLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->parametro_auxiliar_facturacionLogic->setparametro_auxiliar_facturacion(new parametro_auxiliar_facturacion());
				
				$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setIsNew(true);
				$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setIsChanged(true);
				$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->parametro_auxiliar_facturacionModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->parametro_auxiliar_facturacionLogic->parametro_auxiliar_facturacions[]=$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->parametro_auxiliar_facturacionLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->parametro_auxiliar_facturacionLogic->saveRelaciones($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion());/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setIsChanged(true);
				$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setIsNew(false);
				$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->parametro_auxiliar_facturacionModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion(),$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacions());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->parametro_auxiliar_facturacionLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->parametro_auxiliar_facturacionLogic->saveRelaciones($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion());/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setIsDeleted(true);
				$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setIsNew(false);
				$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setIsChanged(false);				
				
				$this->actualizarLista($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion(),$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacions());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->parametro_auxiliar_facturacionLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->parametro_auxiliar_facturacionLogic->saveRelaciones($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->parametro_auxiliar_facturacionsEliminados[]=$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->parametro_auxiliar_facturacionLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->parametro_auxiliar_facturacionLogic->saveRelaciones($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->parametro_auxiliar_facturacionsEliminados=array();
				}
			}
			
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->parametro_auxiliar_facturacionLogic->setparametro_auxiliar_facturacions();*/
					
					$this->parametro_auxiliar_facturacionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->parametro_auxiliar_facturacionLogic->setIsConDeepLoad(false);
			
			$this->parametro_auxiliar_facturacions=$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacions();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(parametro_auxiliar_facturacion_util::$STR_SESSION_NAME.'Lista',serialize($this->parametro_auxiliar_facturacions));
				$this->Session->write(parametro_auxiliar_facturacion_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->parametro_auxiliar_facturacionsEliminados));
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
				$this->parametro_auxiliar_facturacionLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliar_facturacionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliar_facturacionLogic->closeNewConnexionToDeep();
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
				$this->parametro_auxiliar_facturacionLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalparametro_auxiliar_facturacion;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->parametro_auxiliar_facturacionLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->parametro_auxiliar_facturacions as $parametro_auxiliar_facturacionLocal) {
				if($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->getId()==$parametro_auxiliar_facturacionLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion()->setIsDeleted(true);
			$this->parametro_auxiliar_facturacionsEliminados[]=$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->parametro_auxiliar_facturacions[$indice]);
				
				$this->parametro_auxiliar_facturacions = array_values($this->parametro_auxiliar_facturacions);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelparametro_auxiliar_facturacion($this->parametro_auxiliar_facturacionClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliar_facturacionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliar_facturacionLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(parametro_auxiliar_facturacion $parametro_auxiliar_facturacion,array $parametro_auxiliar_facturacions) {
		try {
			foreach($parametro_auxiliar_facturacions as $parametro_auxiliar_facturacionLocal){ 
				if($parametro_auxiliar_facturacionLocal->getId()==$parametro_auxiliar_facturacion->getId()) {
					$parametro_auxiliar_facturacionLocal->setIsChanged($parametro_auxiliar_facturacion->getIsChanged());
					$parametro_auxiliar_facturacionLocal->setIsNew($parametro_auxiliar_facturacion->getIsNew());
					$parametro_auxiliar_facturacionLocal->setIsDeleted($parametro_auxiliar_facturacion->getIsDeleted());
					//$parametro_auxiliar_facturacionLocal->setbitExpired($parametro_auxiliar_facturacion->getbitExpired());
					
					$parametro_auxiliar_facturacionLocal->setId($parametro_auxiliar_facturacion->getId());	
					$parametro_auxiliar_facturacionLocal->setVersionRow($parametro_auxiliar_facturacion->getVersionRow());	
					$parametro_auxiliar_facturacionLocal->setVersionRow($parametro_auxiliar_facturacion->getVersionRow());	
					$parametro_auxiliar_facturacionLocal->setid_empresa($parametro_auxiliar_facturacion->getid_empresa());	
					$parametro_auxiliar_facturacionLocal->setnombre_tipo_factura($parametro_auxiliar_facturacion->getnombre_tipo_factura());	
					$parametro_auxiliar_facturacionLocal->setsiguiente_numero_correlativo($parametro_auxiliar_facturacion->getsiguiente_numero_correlativo());	
					$parametro_auxiliar_facturacionLocal->setincremento($parametro_auxiliar_facturacion->getincremento());	
					$parametro_auxiliar_facturacionLocal->setcon_creacion_rapida_producto($parametro_auxiliar_facturacion->getcon_creacion_rapida_producto());	
					$parametro_auxiliar_facturacionLocal->setcon_busqueda_producto_fabricante($parametro_auxiliar_facturacion->getcon_busqueda_producto_fabricante());	
					$parametro_auxiliar_facturacionLocal->setcon_solo_costo_producto($parametro_auxiliar_facturacion->getcon_solo_costo_producto());	
					$parametro_auxiliar_facturacionLocal->setcon_recibo($parametro_auxiliar_facturacion->getcon_recibo());	
					$parametro_auxiliar_facturacionLocal->setnombre_tipo_factura_recibo($parametro_auxiliar_facturacion->getnombre_tipo_factura_recibo());	
					$parametro_auxiliar_facturacionLocal->setsiguiente_numero_correlativo_recibo($parametro_auxiliar_facturacion->getsiguiente_numero_correlativo_recibo());	
					$parametro_auxiliar_facturacionLocal->setincremento_recibo($parametro_auxiliar_facturacion->getincremento_recibo());	
					$parametro_auxiliar_facturacionLocal->setcon_impuesto_final_boleta($parametro_auxiliar_facturacion->getcon_impuesto_final_boleta());	
					$parametro_auxiliar_facturacionLocal->setcon_ticket($parametro_auxiliar_facturacion->getcon_ticket());	
					$parametro_auxiliar_facturacionLocal->setnombre_tipo_factura_ticket($parametro_auxiliar_facturacion->getnombre_tipo_factura_ticket());	
					$parametro_auxiliar_facturacionLocal->setsiguiente_numero_correlativo_ticket($parametro_auxiliar_facturacion->getsiguiente_numero_correlativo_ticket());	
					$parametro_auxiliar_facturacionLocal->setincremento_ticket($parametro_auxiliar_facturacion->getincremento_ticket());	
					$parametro_auxiliar_facturacionLocal->setcon_impuesto_final_ticket($parametro_auxiliar_facturacion->getcon_impuesto_final_ticket());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$parametro_auxiliar_facturacionsLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$parametro_auxiliar_facturacionsLocal=$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacions();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$parametro_auxiliar_facturacionsLocal=$this->parametro_auxiliar_facturacions;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $parametro_auxiliar_facturacionsLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacions() as $parametro_auxiliar_facturacion) {
				if($parametro_auxiliar_facturacion->getId()==$id) {
					$this->parametro_auxiliar_facturacionLogic->setparametro_auxiliar_facturacion($parametro_auxiliar_facturacion);
					
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
		/*$parametro_auxiliar_facturacionsSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->parametro_auxiliar_facturacions as $parametro_auxiliar_facturacion) {
			$parametro_auxiliar_facturacion->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->parametro_auxiliar_facturacions[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : parametro_auxiliar_facturacion_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$parametro_auxiliar_facturacion_session=unserialize($this->Session->read(parametro_auxiliar_facturacion_util::$STR_SESSION_NAME));
						
		if($parametro_auxiliar_facturacion_session==null) {
			$parametro_auxiliar_facturacion_session=new parametro_auxiliar_facturacion_session();
		}
		
		
		$this->parametro_auxiliar_facturacionReturnGeneral=new parametro_auxiliar_facturacion_param_return();
		$this->parametro_auxiliar_facturacionParameterGeneral=new parametro_auxiliar_facturacion_param_return();
			
		$this->parametro_auxiliar_facturacionParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualparametro_auxiliar_facturacion(this.parametro_auxiliar_facturacion,true);
			this.setVariablesFormularioToObjetoActualForeignKeysparametro_auxiliar_facturacion(this.parametro_auxiliar_facturacion);*/
			
			if($parametro_auxiliar_facturacion_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualparametro_auxiliar_facturacion(this.parametro_auxiliar_facturacion,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->parametro_auxiliar_facturacionActual=$this->parametro_auxiliar_facturacionClase;
				
				$this->setCopiarVariablesObjetos($this->parametro_auxiliar_facturacionActual,$this->parametro_auxiliar_facturacion,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->parametro_auxiliar_facturacionReturnGeneral=$this->parametro_auxiliar_facturacionLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacions(),$this->parametro_auxiliar_facturacion,$this->parametro_auxiliar_facturacionParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($parametro_auxiliar_facturacion_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanparametro_auxiliar_facturacion($classes,$this->parametro_auxiliar_facturacionReturnGeneral,$this->parametro_auxiliar_facturacionBean,false);*/
				}
					
				if($this->parametro_auxiliar_facturacionReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->parametro_auxiliar_facturacionReturnGeneral->getparametro_auxiliar_facturacion(),$this->parametro_auxiliar_facturacionActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeyparametro_auxiliar_facturacion($this->parametro_auxiliar_facturacionReturnGeneral->getparametro_auxiliar_facturacion());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormularioparametro_auxiliar_facturacion($this->parametro_auxiliar_facturacionReturnGeneral->getparametro_auxiliar_facturacion());*/
				}
					
				if($this->parametro_auxiliar_facturacionReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->parametro_auxiliar_facturacionReturnGeneral->getparametro_auxiliar_facturacion(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->parametro_auxiliar_facturacion,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(parametro_auxiliar_facturacionJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualparametro_auxiliar_facturacion(this.parametro_auxiliar_facturacion,true);
				this.setVariablesFormularioToObjetoActualForeignKeysparametro_auxiliar_facturacion(this.parametro_auxiliar_facturacion);				
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
				
				if($this->parametro_auxiliar_facturacionAnterior!=null) {
					$this->parametro_auxiliar_facturacion=$this->parametro_auxiliar_facturacionAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->parametro_auxiliar_facturacionReturnGeneral=$this->parametro_auxiliar_facturacionLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacions(),$this->parametro_auxiliar_facturacion,$this->parametro_auxiliar_facturacionParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->parametro_auxiliar_facturacionReturnGeneral->getparametro_auxiliar_facturacion(),$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacions());
			*/
		}
		
		return $this->parametro_auxiliar_facturacionReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->getNewConnexionToDeep();
			}

			$this->parametro_auxiliar_facturacionReturnGeneral=new parametro_auxiliar_facturacion_param_return();			
			$this->parametro_auxiliar_facturacionParameterGeneral=new parametro_auxiliar_facturacion_param_return();
			
			$this->parametro_auxiliar_facturacionParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->parametro_auxiliar_facturacionReturnGeneral=$this->parametro_auxiliar_facturacionLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->parametro_auxiliar_facturacions,$this->parametro_auxiliar_facturacionParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->parametro_auxiliar_facturacionReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->parametro_auxiliar_facturacionReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliar_facturacionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->parametro_auxiliar_facturacionReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliar_facturacionLogic->closeNewConnexionToDeep();
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
		
		$this->parametro_auxiliar_facturacionReturnGeneral=new parametro_auxiliar_facturacion_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_parametro_auxiliar_facturacion') {
		    $sDominio='parametro_auxiliar_facturacion';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->parametro_auxiliar_facturacionReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->parametro_auxiliar_facturacionReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='parametro_auxiliar_facturacion';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='parametro_auxiliar_facturacion';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='parametro_auxiliar_facturacion';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->parametro_auxiliar_facturacionReturnGeneral=new parametro_auxiliar_facturacion_param_return();
		$this->parametro_auxiliar_facturacionParameterGeneral=new parametro_auxiliar_facturacion_param_return();
			
		$this->parametro_auxiliar_facturacionParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->parametro_auxiliar_facturacionReturnGeneral=$this->parametro_auxiliar_facturacionLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacions(),$this->parametro_auxiliar_facturacion,$this->parametro_auxiliar_facturacionParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->parametro_auxiliar_facturacionReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->parametro_auxiliar_facturacionReturnGeneral->getparametro_auxiliar_facturacion(),$classes);*/
		}									
	
		if($this->parametro_auxiliar_facturacionReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->parametro_auxiliar_facturacionReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->parametro_auxiliar_facturacionReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $parametro_auxiliar_facturacions,parametro_auxiliar_facturacion $parametro_auxiliar_facturacion) {
		
		$parametro_auxiliar_facturacion_session=unserialize($this->Session->read(parametro_auxiliar_facturacion_util::$STR_SESSION_NAME));
						
		if($parametro_auxiliar_facturacion_session==null) {
			$parametro_auxiliar_facturacion_session=new parametro_auxiliar_facturacion_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(parametro_auxiliar_facturacion_util::$CLASSNAME);
			}	
			*/
			
			$this->parametro_auxiliar_facturacionReturnGeneral=new parametro_auxiliar_facturacion_param_return();
			$this->parametro_auxiliar_facturacionParameterGeneral=new parametro_auxiliar_facturacion_param_return();
			
			$this->parametro_auxiliar_facturacionParameterGeneral->setdata($this->data);
		
		
			
		if($parametro_auxiliar_facturacion_session->conGuardarRelaciones) {
			$classes=parametro_auxiliar_facturacion_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->parametro_auxiliar_facturacionActual,$this->parametro_auxiliar_facturacion,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->parametro_auxiliar_facturacionReturnGeneral=$this->parametro_auxiliar_facturacionLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacions(),$this->parametro_auxiliar_facturacionActual,$this->parametro_auxiliar_facturacionParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->parametro_auxiliar_facturacionReturnGeneral=$this->parametro_auxiliar_facturacionLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$parametro_auxiliar_facturacions,$parametro_auxiliar_facturacion,$this->parametro_auxiliar_facturacionParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelparametro_auxiliar_facturacion($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion());*/
			
			$this->parametro_auxiliar_facturacion=$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacion();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->parametro_auxiliar_facturacion);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliar_facturacionLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliar_facturacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$parametro_auxiliar_facturacionActual=new parametro_auxiliar_facturacion();
			
			if($this->parametro_auxiliar_facturacionClase==null) {		
				$this->parametro_auxiliar_facturacionClase=new parametro_auxiliar_facturacion();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$parametro_auxiliar_facturacionActual=$this->parametro_auxiliar_facturacions[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $parametro_auxiliar_facturacionActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $parametro_auxiliar_facturacionActual->setnombre_tipo_factura($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $parametro_auxiliar_facturacionActual->setsiguiente_numero_correlativo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $parametro_auxiliar_facturacionActual->setincremento((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $parametro_auxiliar_facturacionActual->setcon_creacion_rapida_producto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_7')));  } else { $parametro_auxiliar_facturacionActual->setcon_creacion_rapida_producto(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $parametro_auxiliar_facturacionActual->setcon_busqueda_producto_fabricante(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_8')));  } else { $parametro_auxiliar_facturacionActual->setcon_busqueda_producto_fabricante(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $parametro_auxiliar_facturacionActual->setcon_solo_costo_producto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_9')));  } else { $parametro_auxiliar_facturacionActual->setcon_solo_costo_producto(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $parametro_auxiliar_facturacionActual->setcon_recibo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_10')));  } else { $parametro_auxiliar_facturacionActual->setcon_recibo(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $parametro_auxiliar_facturacionActual->setnombre_tipo_factura_recibo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $parametro_auxiliar_facturacionActual->setsiguiente_numero_correlativo_recibo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $parametro_auxiliar_facturacionActual->setincremento_recibo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $parametro_auxiliar_facturacionActual->setcon_impuesto_final_boleta(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_14')));  } else { $parametro_auxiliar_facturacionActual->setcon_impuesto_final_boleta(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $parametro_auxiliar_facturacionActual->setcon_ticket(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_15')));  } else { $parametro_auxiliar_facturacionActual->setcon_ticket(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $parametro_auxiliar_facturacionActual->setnombre_tipo_factura_ticket($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $parametro_auxiliar_facturacionActual->setsiguiente_numero_correlativo_ticket((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $parametro_auxiliar_facturacionActual->setincremento_ticket((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $parametro_auxiliar_facturacionActual->setcon_impuesto_final_ticket(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_19')));  } else { $parametro_auxiliar_facturacionActual->setcon_impuesto_final_ticket(false); }

				$this->parametro_auxiliar_facturacionClase=$parametro_auxiliar_facturacionActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->parametro_auxiliar_facturacionModel->set($this->parametro_auxiliar_facturacionClase);
				
				/*$this->parametro_auxiliar_facturacionModel->set($this->migrarModelparametro_auxiliar_facturacion($this->parametro_auxiliar_facturacionClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->parametro_auxiliar_facturacions=$this->migrarModelparametro_auxiliar_facturacion($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacions());							
		$this->parametro_auxiliar_facturacions=$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacions();*/
		
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
			$this->Session->write(parametro_auxiliar_facturacion_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$parametro_auxiliar_facturacion_control_session=unserialize($this->Session->read(parametro_auxiliar_facturacion_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($parametro_auxiliar_facturacion_control_session==null) {
				$parametro_auxiliar_facturacion_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($parametro_auxiliar_facturacion_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(parametro_auxiliar_facturacion_util::$STR_SESSION_NAME,$this);*/
		} else {
			$parametro_auxiliar_facturacion_session=unserialize($this->Session->read(parametro_auxiliar_facturacion_util::$STR_SESSION_NAME));
			
			if($parametro_auxiliar_facturacion_session==null) {
				$parametro_auxiliar_facturacion_session=new parametro_auxiliar_facturacion_session();
			}
			
			$this->set(parametro_auxiliar_facturacion_util::$STR_SESSION_NAME, $parametro_auxiliar_facturacion_session);
		}
	}
	
	public function setCopiarVariablesObjetos(parametro_auxiliar_facturacion $parametro_auxiliar_facturacionOrigen,parametro_auxiliar_facturacion $parametro_auxiliar_facturacion,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($parametro_auxiliar_facturacion==null) {
				$parametro_auxiliar_facturacion=new parametro_auxiliar_facturacion();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $parametro_auxiliar_facturacionOrigen->getId()!=null && $parametro_auxiliar_facturacionOrigen->getId()!=0)) {$parametro_auxiliar_facturacion->setId($parametro_auxiliar_facturacionOrigen->getId());}}
			if($conDefault || ($conDefault==false && $parametro_auxiliar_facturacionOrigen->getnombre_tipo_factura()!=null && $parametro_auxiliar_facturacionOrigen->getnombre_tipo_factura()!='')) {$parametro_auxiliar_facturacion->setnombre_tipo_factura($parametro_auxiliar_facturacionOrigen->getnombre_tipo_factura());}
			if($conDefault || ($conDefault==false && $parametro_auxiliar_facturacionOrigen->getsiguiente_numero_correlativo()!=null && $parametro_auxiliar_facturacionOrigen->getsiguiente_numero_correlativo()!=0)) {$parametro_auxiliar_facturacion->setsiguiente_numero_correlativo($parametro_auxiliar_facturacionOrigen->getsiguiente_numero_correlativo());}
			if($conDefault || ($conDefault==false && $parametro_auxiliar_facturacionOrigen->getincremento()!=null && $parametro_auxiliar_facturacionOrigen->getincremento()!=0)) {$parametro_auxiliar_facturacion->setincremento($parametro_auxiliar_facturacionOrigen->getincremento());}
			if($conDefault || ($conDefault==false && $parametro_auxiliar_facturacionOrigen->getcon_creacion_rapida_producto()!=null && $parametro_auxiliar_facturacionOrigen->getcon_creacion_rapida_producto()!=false)) {$parametro_auxiliar_facturacion->setcon_creacion_rapida_producto($parametro_auxiliar_facturacionOrigen->getcon_creacion_rapida_producto());}
			if($conDefault || ($conDefault==false && $parametro_auxiliar_facturacionOrigen->getcon_busqueda_producto_fabricante()!=null && $parametro_auxiliar_facturacionOrigen->getcon_busqueda_producto_fabricante()!=false)) {$parametro_auxiliar_facturacion->setcon_busqueda_producto_fabricante($parametro_auxiliar_facturacionOrigen->getcon_busqueda_producto_fabricante());}
			if($conDefault || ($conDefault==false && $parametro_auxiliar_facturacionOrigen->getcon_solo_costo_producto()!=null && $parametro_auxiliar_facturacionOrigen->getcon_solo_costo_producto()!=false)) {$parametro_auxiliar_facturacion->setcon_solo_costo_producto($parametro_auxiliar_facturacionOrigen->getcon_solo_costo_producto());}
			if($conDefault || ($conDefault==false && $parametro_auxiliar_facturacionOrigen->getcon_recibo()!=null && $parametro_auxiliar_facturacionOrigen->getcon_recibo()!=false)) {$parametro_auxiliar_facturacion->setcon_recibo($parametro_auxiliar_facturacionOrigen->getcon_recibo());}
			if($conDefault || ($conDefault==false && $parametro_auxiliar_facturacionOrigen->getnombre_tipo_factura_recibo()!=null && $parametro_auxiliar_facturacionOrigen->getnombre_tipo_factura_recibo()!='')) {$parametro_auxiliar_facturacion->setnombre_tipo_factura_recibo($parametro_auxiliar_facturacionOrigen->getnombre_tipo_factura_recibo());}
			if($conDefault || ($conDefault==false && $parametro_auxiliar_facturacionOrigen->getsiguiente_numero_correlativo_recibo()!=null && $parametro_auxiliar_facturacionOrigen->getsiguiente_numero_correlativo_recibo()!=0)) {$parametro_auxiliar_facturacion->setsiguiente_numero_correlativo_recibo($parametro_auxiliar_facturacionOrigen->getsiguiente_numero_correlativo_recibo());}
			if($conDefault || ($conDefault==false && $parametro_auxiliar_facturacionOrigen->getincremento_recibo()!=null && $parametro_auxiliar_facturacionOrigen->getincremento_recibo()!=0)) {$parametro_auxiliar_facturacion->setincremento_recibo($parametro_auxiliar_facturacionOrigen->getincremento_recibo());}
			if($conDefault || ($conDefault==false && $parametro_auxiliar_facturacionOrigen->getcon_impuesto_final_boleta()!=null && $parametro_auxiliar_facturacionOrigen->getcon_impuesto_final_boleta()!=false)) {$parametro_auxiliar_facturacion->setcon_impuesto_final_boleta($parametro_auxiliar_facturacionOrigen->getcon_impuesto_final_boleta());}
			if($conDefault || ($conDefault==false && $parametro_auxiliar_facturacionOrigen->getcon_ticket()!=null && $parametro_auxiliar_facturacionOrigen->getcon_ticket()!=false)) {$parametro_auxiliar_facturacion->setcon_ticket($parametro_auxiliar_facturacionOrigen->getcon_ticket());}
			if($conDefault || ($conDefault==false && $parametro_auxiliar_facturacionOrigen->getnombre_tipo_factura_ticket()!=null && $parametro_auxiliar_facturacionOrigen->getnombre_tipo_factura_ticket()!='')) {$parametro_auxiliar_facturacion->setnombre_tipo_factura_ticket($parametro_auxiliar_facturacionOrigen->getnombre_tipo_factura_ticket());}
			if($conDefault || ($conDefault==false && $parametro_auxiliar_facturacionOrigen->getsiguiente_numero_correlativo_ticket()!=null && $parametro_auxiliar_facturacionOrigen->getsiguiente_numero_correlativo_ticket()!=0)) {$parametro_auxiliar_facturacion->setsiguiente_numero_correlativo_ticket($parametro_auxiliar_facturacionOrigen->getsiguiente_numero_correlativo_ticket());}
			if($conDefault || ($conDefault==false && $parametro_auxiliar_facturacionOrigen->getincremento_ticket()!=null && $parametro_auxiliar_facturacionOrigen->getincremento_ticket()!=0)) {$parametro_auxiliar_facturacion->setincremento_ticket($parametro_auxiliar_facturacionOrigen->getincremento_ticket());}
			if($conDefault || ($conDefault==false && $parametro_auxiliar_facturacionOrigen->getcon_impuesto_final_ticket()!=null && $parametro_auxiliar_facturacionOrigen->getcon_impuesto_final_ticket()!=false)) {$parametro_auxiliar_facturacion->setcon_impuesto_final_ticket($parametro_auxiliar_facturacionOrigen->getcon_impuesto_final_ticket());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$parametro_auxiliar_facturacionsSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$parametro_auxiliar_facturacionsSeleccionados[]=$this->parametro_auxiliar_facturacions[$indice];
			}
		}
		
		return $parametro_auxiliar_facturacionsSeleccionados;
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
		$parametro_auxiliar_facturacion= new parametro_auxiliar_facturacion();
		
		foreach($this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacions() as $parametro_auxiliar_facturacion) {
			
		}		
		
		if($parametro_auxiliar_facturacion!=null);
	}
	
	public function cargarRelaciones(array $parametro_auxiliar_facturacions=array()) : array {	
		
		$parametro_auxiliar_facturacionsRespaldo = array();
		$parametro_auxiliar_facturacionsLocal = array();
		
		parametro_auxiliar_facturacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$parametro_auxiliar_facturacionsResp=array();
		$classes=array();
			
		
			
			
		$parametro_auxiliar_facturacionsRespaldo=$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacions();
			
		$this->parametro_auxiliar_facturacionLogic->setIsConDeep(true);
		
		$this->parametro_auxiliar_facturacionLogic->setparametro_auxiliar_facturacions($parametro_auxiliar_facturacions);
			
		$this->parametro_auxiliar_facturacionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$parametro_auxiliar_facturacionsLocal=$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacions();
			
		/*RESPALDO*/
		$this->parametro_auxiliar_facturacionLogic->setparametro_auxiliar_facturacions($parametro_auxiliar_facturacionsRespaldo);
			
		$this->parametro_auxiliar_facturacionLogic->setIsConDeep(false);
		
		if($parametro_auxiliar_facturacionsResp!=null);
		
		return $parametro_auxiliar_facturacionsLocal;
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
				$this->parametro_auxiliar_facturacionLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliar_facturacionLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(parametro_auxiliar_facturacion_session $parametro_auxiliar_facturacion_session) {
		$parametro_auxiliar_facturacion_session->strTypeOnLoad=$this->strTypeOnLoadparametro_auxiliar_facturacion;
		$parametro_auxiliar_facturacion_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarparametro_auxiliar_facturacion;
		$parametro_auxiliar_facturacion_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarparametro_auxiliar_facturacion;
		$parametro_auxiliar_facturacion_session->bitEsPopup=$this->bitEsPopup;
		$parametro_auxiliar_facturacion_session->bitEsBusqueda=$this->bitEsBusqueda;
		$parametro_auxiliar_facturacion_session->strFuncionJs=$this->strFuncionJs;
		/*$parametro_auxiliar_facturacion_session->strSufijo=$this->strSufijo;*/
		$parametro_auxiliar_facturacion_session->bitEsRelaciones=$this->bitEsRelaciones;
		$parametro_auxiliar_facturacion_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, parametro_auxiliar_facturacion_util::$STR_NOMBRE_CLASE,0,false,false);				
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
		$parametro_auxiliar_facturacionViewAdditional=new parametro_auxiliar_facturacionView_add();
		$parametro_auxiliar_facturacionViewAdditional->parametro_auxiliar_facturacions=$this->parametro_auxiliar_facturacions;
		$parametro_auxiliar_facturacionViewAdditional->Session=$this->Session;
		
		return $parametro_auxiliar_facturacionViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$parametro_auxiliar_facturacionsLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$parametro_auxiliar_facturacionsLocal=$this->parametro_auxiliar_facturacions;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$parametro_auxiliar_facturacionsLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($parametro_auxiliar_facturacionsLocal)<=0) {
					$parametro_auxiliar_facturacionsLocal=$this->parametro_auxiliar_facturacions;
				}
			} else {
				$parametro_auxiliar_facturacionsLocal=$this->parametro_auxiliar_facturacions;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarparametro_auxiliar_facturacionsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarparametro_auxiliar_facturacionsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$parametro_auxiliar_facturacionLogic=new parametro_auxiliar_facturacion_logic();
		$parametro_auxiliar_facturacionLogic->setparametro_auxiliar_facturacions($this->parametro_auxiliar_facturacions);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		 
			
		
			$class=new Classe('empresa');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$parametro_auxiliar_facturacionLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->parametro_auxiliar_facturacions=$parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacions();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->parametro_auxiliar_facturacionsLocal=$this->parametro_auxiliar_facturacions;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=parametro_auxiliar_facturacion_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=parametro_auxiliar_facturacion_util::$STR_TABLE_NAME;		
			
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
			
			$parametro_auxiliar_facturacions = $this->parametro_auxiliar_facturacions;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = parametro_auxiliar_facturacion_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = parametro_auxiliar_facturacion_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/general/presentation/templating/parametro_auxiliar_facturacion_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->parametro_auxiliar_facturacions=$parametro_auxiliar_facturacions;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->parametro_auxiliar_facturacionsLocal=$parametro_auxiliar_facturacionsLocal;
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
		
		$parametro_auxiliar_facturacionsLocal=array();
		
		$parametro_auxiliar_facturacionsLocal=$this->parametro_auxiliar_facturacions;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarparametro_auxiliar_facturacionsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarparametro_auxiliar_facturacionsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$parametro_auxiliar_facturacionLogic=new parametro_auxiliar_facturacion_logic();
		$parametro_auxiliar_facturacionLogic->setparametro_auxiliar_facturacions($this->parametro_auxiliar_facturacions);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		 
			
		
			$class=new Classe('empresa');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$parametro_auxiliar_facturacionLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->parametro_auxiliar_facturacions=$parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacions();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$parametro_auxiliar_facturacions = $this->parametro_auxiliar_facturacions;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = parametro_auxiliar_facturacion_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = parametro_auxiliar_facturacion_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/general/presentation/templating/parametro_auxiliar_facturacion_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->parametro_auxiliar_facturacions=$parametro_auxiliar_facturacions;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->parametro_auxiliar_facturacionsLocal=$parametro_auxiliar_facturacionsLocal;
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
	
	public function getHtmlTablaDatosResumen(array $parametro_auxiliar_facturacions=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->parametro_auxiliar_facturacionsReporte = $parametro_auxiliar_facturacions;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarparametro_auxiliar_facturacionsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarparametro_auxiliar_facturacionsAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $parametro_auxiliar_facturacions=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->parametro_auxiliar_facturacionsReporte = $parametro_auxiliar_facturacions;		
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
		
		
		$this->parametro_auxiliar_facturacionsReporte=$this->cargarRelaciones($parametro_auxiliar_facturacions);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarparametro_auxiliar_facturacionsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarparametro_auxiliar_facturacionsAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(parametro_auxiliar_facturacion $parametro_auxiliar_facturacion=null) : string {	
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
			
			
			$parametro_auxiliar_facturacionsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$parametro_auxiliar_facturacionsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($parametro_auxiliar_facturacionsLocal)<=0) {
					/*//DEBE ESCOGER
					$parametro_auxiliar_facturacionsLocal=$this->parametro_auxiliar_facturacions;*/
				}
			} else {
				/*//DEBE ESCOGER
				$parametro_auxiliar_facturacionsLocal=$this->parametro_auxiliar_facturacions;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($parametro_auxiliar_facturacionsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($parametro_auxiliar_facturacionsLocal,true);
			
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
				$this->parametro_auxiliar_facturacionLogic->getNewConnexionToDeep();
			}
					
			$parametro_auxiliar_facturacionsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$parametro_auxiliar_facturacionsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($parametro_auxiliar_facturacionsLocal)<=0) {
					/*//DEBE ESCOGER
					$parametro_auxiliar_facturacionsLocal=$this->parametro_auxiliar_facturacions;*/
				}
			} else {
				/*//DEBE ESCOGER
				$parametro_auxiliar_facturacionsLocal=$this->parametro_auxiliar_facturacions;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($parametro_auxiliar_facturacionsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($parametro_auxiliar_facturacionsLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliar_facturacionLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliar_facturacionLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Parametro AuxiliarNOUSO Facturaciones';
			
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
			$fileName='parametro_auxiliar_facturacion';
			
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
			
			$title='Reporte de  Parametro AuxiliarNOUSO Facturaciones';
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
			
			$title='Reporte de  Parametro AuxiliarNOUSO Facturaciones';
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
				$this->parametro_auxiliar_facturacionLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Parametro AuxiliarNOUSO Facturaciones';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliar_facturacionLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliar_facturacionLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliar_facturacionLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=parametro_auxiliar_facturacion_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->parametro_auxiliar_facturacionsAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_auxiliar_facturacionsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->parametro_auxiliar_facturacionsAuxiliar)<=0) {
					$this->parametro_auxiliar_facturacionsAuxiliar=$this->parametro_auxiliar_facturacions;
				}
			} else {
				$this->parametro_auxiliar_facturacionsAuxiliar=$this->parametro_auxiliar_facturacions;
			}
		/*} else {
			$this->parametro_auxiliar_facturacionsAuxiliar=$this->parametro_auxiliar_facturacionsReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->parametro_auxiliar_facturacionsAuxiliar as $parametro_auxiliar_facturacion) {
				$row=array();
				
				$row=parametro_auxiliar_facturacion_util::getDataReportRow($tipo,$parametro_auxiliar_facturacion,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			parametro_auxiliar_facturacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$parametro_auxiliar_facturacionsResp=array();
			$classes=array();
			
			
			
			
			$parametro_auxiliar_facturacionsResp=$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacions();
			
			$this->parametro_auxiliar_facturacionLogic->setIsConDeep(true);
			
			$this->parametro_auxiliar_facturacionLogic->setparametro_auxiliar_facturacions($this->parametro_auxiliar_facturacionsAuxiliar);
			
			$this->parametro_auxiliar_facturacionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->parametro_auxiliar_facturacionsAuxiliar=$this->parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacions();
			
			//RESPALDO
			$this->parametro_auxiliar_facturacionLogic->setparametro_auxiliar_facturacions($parametro_auxiliar_facturacionsResp);
			
			$this->parametro_auxiliar_facturacionLogic->setIsConDeep(false);
			*/
			
			$this->parametro_auxiliar_facturacionsAuxiliar=$this->cargarRelaciones($this->parametro_auxiliar_facturacionsAuxiliar);
			
			$i=0;
			
			foreach ($this->parametro_auxiliar_facturacionsAuxiliar as $parametro_auxiliar_facturacion) {
				$row=array();
				
				if($i!=0) {
					$row=parametro_auxiliar_facturacion_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=parametro_auxiliar_facturacion_util::getDataReportRow($tipo,$parametro_auxiliar_facturacion,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
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
		$this->parametro_auxiliar_facturacionsAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_auxiliar_facturacionsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->parametro_auxiliar_facturacionsAuxiliar)<=0) {
					$this->parametro_auxiliar_facturacionsAuxiliar=$this->parametro_auxiliar_facturacions;
				}
			} else {
				$this->parametro_auxiliar_facturacionsAuxiliar=$this->parametro_auxiliar_facturacions;
			}
		/*} else {
			$this->parametro_auxiliar_facturacionsAuxiliar=$this->parametro_auxiliar_facturacionsReporte;	
		}*/
		
		foreach ($this->parametro_auxiliar_facturacionsAuxiliar as $parametro_auxiliar_facturacion) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(parametro_auxiliar_facturacion_util::getparametro_auxiliar_facturacionDescripcion($parametro_auxiliar_facturacion),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre Tipo Factura',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Tipo Factura',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getnombre_tipo_factura(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Siguiente Numero Correlativo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Siguiente Numero Correlativo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getsiguiente_numero_correlativo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Incremento',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getincremento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Creacion Rapida Producto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Creacion Rapida Producto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getcon_creacion_rapida_producto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Busqueda Producto Fabricante',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Busqueda Producto Fabricante',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getcon_busqueda_producto_fabricante(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Solo Costo Producto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Solo Costo Producto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getcon_solo_costo_producto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Recibo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Recibo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getcon_recibo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre Tipo Factura Recibo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Tipo Factura Recibo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getnombre_tipo_factura_recibo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Siguiente Numero Correlativo Recibo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Siguiente Numero Correlativo Recibo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getsiguiente_numero_correlativo_recibo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Incremento Recibo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento Recibo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getincremento_recibo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Impuesto Final Boleta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Impuesto Final Boleta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getcon_impuesto_final_boleta(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Ticket',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Ticket',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getcon_ticket(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre Tipo Factura Ticket',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Tipo Factura Ticket',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getnombre_tipo_factura_ticket(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Siguiente Numero Correlativo Ticket',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Siguiente Numero Correlativo Ticket',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getsiguiente_numero_correlativo_ticket(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Incremento Ticket',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento Ticket',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getincremento_ticket(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Impuesto Final Ticket',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Impuesto Final Ticket',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getcon_impuesto_final_ticket(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface parametro_auxiliar_facturacion_base_controlI {			
		
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
		public function getIndiceActual(parametro_auxiliar_facturacion $parametro_auxiliar_facturacion,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(parametro_auxiliar_facturacion $parametro_auxiliar_facturacion,array $parametro_auxiliar_facturacions);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : parametro_auxiliar_facturacion_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $parametro_auxiliar_facturacions,parametro_auxiliar_facturacion $parametro_auxiliar_facturacion);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(parametro_auxiliar_facturacion_param_return $parametro_auxiliar_facturacionReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(parametro_auxiliar_facturacion_session $parametro_auxiliar_facturacion_session);		
		public function actualizarInvitadoSessionDivStyleVariables(parametro_auxiliar_facturacion_session $parametro_auxiliar_facturacion_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(parametro_auxiliar_facturacion $parametro_auxiliar_facturacionOrigen,parametro_auxiliar_facturacion $parametro_auxiliar_facturacion,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(parametro_auxiliar_facturacion_control $parametro_auxiliar_facturacion_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $parametro_auxiliar_facturacions=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(parametro_auxiliar_facturacion_session $parametro_auxiliar_facturacion_session);		
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
		public function getHtmlTablaDatosResumen(array $parametro_auxiliar_facturacions=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $parametro_auxiliar_facturacions=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(parametro_auxiliar_facturacion $parametro_auxiliar_facturacion=null) : string;
		
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
