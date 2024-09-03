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

namespace com\bydan\contabilidad\general\parametro_auxiliar\presentation\control;

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

use com\bydan\contabilidad\general\parametro_auxiliar\business\entity\parametro_auxiliar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/parametro_auxiliar/util/parametro_auxiliar_carga.php');
use com\bydan\contabilidad\general\parametro_auxiliar\util\parametro_auxiliar_carga;

use com\bydan\contabilidad\general\parametro_auxiliar\util\parametro_auxiliar_util;
use com\bydan\contabilidad\general\parametro_auxiliar\util\parametro_auxiliar_param_return;
use com\bydan\contabilidad\general\parametro_auxiliar\business\logic\parametro_auxiliar_logic;
use com\bydan\contabilidad\general\parametro_auxiliar\presentation\session\parametro_auxiliar_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\tipo_costeo_kardex\business\entity\tipo_costeo_kardex;
use com\bydan\contabilidad\general\tipo_costeo_kardex\business\logic\tipo_costeo_kardex_logic;
use com\bydan\contabilidad\general\tipo_costeo_kardex\util\tipo_costeo_kardex_carga;
use com\bydan\contabilidad\general\tipo_costeo_kardex\util\tipo_costeo_kardex_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
parametro_auxiliar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
parametro_auxiliar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
parametro_auxiliar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
parametro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*parametro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class parametro_auxiliar_base_control extends parametro_auxiliar_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->parametro_auxiliarClase==null) {		
				$this->parametro_auxiliarClase=new parametro_auxiliar();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_costeo_kardex')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_tipo_costeo_kardex',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->parametro_auxiliarClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->parametro_auxiliarClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->parametro_auxiliarClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->parametro_auxiliarClase->setnombre_asignado($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre_asignado'));
				
				$this->parametro_auxiliarClase->setsiguiente_numero_correlativo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'siguiente_numero_correlativo'));
				
				$this->parametro_auxiliarClase->setincremento((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'incremento'));
				
				$this->parametro_auxiliarClase->setmostrar_solo_costo_producto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'mostrar_solo_costo_producto')));
				
				$this->parametro_auxiliarClase->setcon_codigo_secuencial_producto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_codigo_secuencial_producto')));
				
				$this->parametro_auxiliarClase->setcontador_producto((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'contador_producto'));
				
				$this->parametro_auxiliarClase->setid_tipo_costeo_kardex((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_costeo_kardex'));
				
				$this->parametro_auxiliarClase->setcon_producto_inactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_producto_inactivo')));
				
				$this->parametro_auxiliarClase->setcon_busqueda_incremental(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_busqueda_incremental')));
				
				$this->parametro_auxiliarClase->setpermitir_revisar_asiento(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'permitir_revisar_asiento')));
				
				$this->parametro_auxiliarClase->setnumero_decimales_unidades((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'numero_decimales_unidades'));
				
				$this->parametro_auxiliarClase->setmostrar_documento_anulado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'mostrar_documento_anulado')));
				
				$this->parametro_auxiliarClase->setsiguiente_numero_correlativo_cc((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'siguiente_numero_correlativo_cc'));
				
				$this->parametro_auxiliarClase->setcon_eliminacion_fisica_asiento(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_eliminacion_fisica_asiento')));
				
				$this->parametro_auxiliarClase->setsiguiente_numero_correlativo_asiento((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'siguiente_numero_correlativo_asiento'));
				
				$this->parametro_auxiliarClase->setcon_asiento_simple_factura(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_asiento_simple_factura')));
				
				$this->parametro_auxiliarClase->setcon_codigo_secuencial_cliente(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_codigo_secuencial_cliente')));
				
				$this->parametro_auxiliarClase->setcontador_cliente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'contador_cliente'));
				
				$this->parametro_auxiliarClase->setcon_cliente_inactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_cliente_inactivo')));
				
				$this->parametro_auxiliarClase->setcon_codigo_secuencial_proveedor(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_codigo_secuencial_proveedor')));
				
				$this->parametro_auxiliarClase->setcontador_proveedor((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'contador_proveedor'));
				
				$this->parametro_auxiliarClase->setcon_proveedor_inactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_proveedor_inactivo')));
				
				$this->parametro_auxiliarClase->setabreviatura_registro_tributario($this->getDataCampoFormTabla('form'.$this->strSufijo,'abreviatura_registro_tributario'));
				
				$this->parametro_auxiliarClase->setcon_asiento_cheque(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_asiento_cheque')));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->parametro_auxiliarModel->set($this->parametro_auxiliarClase);
				
				/*$this->parametro_auxiliarModel->set($this->migrarModelparametro_auxiliar($this->parametro_auxiliarClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setId($this->parametro_auxiliarClase->getId());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setVersionRow($this->parametro_auxiliarClase->getVersionRow());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setVersionRow($this->parametro_auxiliarClase->getVersionRow());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setid_empresa($this->parametro_auxiliarClase->getid_empresa());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setnombre_asignado($this->parametro_auxiliarClase->getnombre_asignado());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setsiguiente_numero_correlativo($this->parametro_auxiliarClase->getsiguiente_numero_correlativo());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setincremento($this->parametro_auxiliarClase->getincremento());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setmostrar_solo_costo_producto($this->parametro_auxiliarClase->getmostrar_solo_costo_producto());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setcon_codigo_secuencial_producto($this->parametro_auxiliarClase->getcon_codigo_secuencial_producto());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setcontador_producto($this->parametro_auxiliarClase->getcontador_producto());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setid_tipo_costeo_kardex($this->parametro_auxiliarClase->getid_tipo_costeo_kardex());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setcon_producto_inactivo($this->parametro_auxiliarClase->getcon_producto_inactivo());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setcon_busqueda_incremental($this->parametro_auxiliarClase->getcon_busqueda_incremental());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setpermitir_revisar_asiento($this->parametro_auxiliarClase->getpermitir_revisar_asiento());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setnumero_decimales_unidades($this->parametro_auxiliarClase->getnumero_decimales_unidades());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setmostrar_documento_anulado($this->parametro_auxiliarClase->getmostrar_documento_anulado());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setsiguiente_numero_correlativo_cc($this->parametro_auxiliarClase->getsiguiente_numero_correlativo_cc());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setcon_eliminacion_fisica_asiento($this->parametro_auxiliarClase->getcon_eliminacion_fisica_asiento());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setsiguiente_numero_correlativo_asiento($this->parametro_auxiliarClase->getsiguiente_numero_correlativo_asiento());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setcon_asiento_simple_factura($this->parametro_auxiliarClase->getcon_asiento_simple_factura());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setcon_codigo_secuencial_cliente($this->parametro_auxiliarClase->getcon_codigo_secuencial_cliente());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setcontador_cliente($this->parametro_auxiliarClase->getcontador_cliente());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setcon_cliente_inactivo($this->parametro_auxiliarClase->getcon_cliente_inactivo());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setcon_codigo_secuencial_proveedor($this->parametro_auxiliarClase->getcon_codigo_secuencial_proveedor());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setcontador_proveedor($this->parametro_auxiliarClase->getcontador_proveedor());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setcon_proveedor_inactivo($this->parametro_auxiliarClase->getcon_proveedor_inactivo());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setabreviatura_registro_tributario($this->parametro_auxiliarClase->getabreviatura_registro_tributario());	
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setcon_asiento_cheque($this->parametro_auxiliarClase->getcon_asiento_cheque());	
		} else {
			$this->parametro_auxiliarClase->setId($this->parametro_auxiliarLogic->getparametro_auxiliar()->getId());	
			$this->parametro_auxiliarClase->setVersionRow($this->parametro_auxiliarLogic->getparametro_auxiliar()->getVersionRow());	
			$this->parametro_auxiliarClase->setVersionRow($this->parametro_auxiliarLogic->getparametro_auxiliar()->getVersionRow());	
			$this->parametro_auxiliarClase->setid_empresa($this->parametro_auxiliarLogic->getparametro_auxiliar()->getid_empresa());	
			$this->parametro_auxiliarClase->setnombre_asignado($this->parametro_auxiliarLogic->getparametro_auxiliar()->getnombre_asignado());	
			$this->parametro_auxiliarClase->setsiguiente_numero_correlativo($this->parametro_auxiliarLogic->getparametro_auxiliar()->getsiguiente_numero_correlativo());	
			$this->parametro_auxiliarClase->setincremento($this->parametro_auxiliarLogic->getparametro_auxiliar()->getincremento());	
			$this->parametro_auxiliarClase->setmostrar_solo_costo_producto($this->parametro_auxiliarLogic->getparametro_auxiliar()->getmostrar_solo_costo_producto());	
			$this->parametro_auxiliarClase->setcon_codigo_secuencial_producto($this->parametro_auxiliarLogic->getparametro_auxiliar()->getcon_codigo_secuencial_producto());	
			$this->parametro_auxiliarClase->setcontador_producto($this->parametro_auxiliarLogic->getparametro_auxiliar()->getcontador_producto());	
			$this->parametro_auxiliarClase->setid_tipo_costeo_kardex($this->parametro_auxiliarLogic->getparametro_auxiliar()->getid_tipo_costeo_kardex());	
			$this->parametro_auxiliarClase->setcon_producto_inactivo($this->parametro_auxiliarLogic->getparametro_auxiliar()->getcon_producto_inactivo());	
			$this->parametro_auxiliarClase->setcon_busqueda_incremental($this->parametro_auxiliarLogic->getparametro_auxiliar()->getcon_busqueda_incremental());	
			$this->parametro_auxiliarClase->setpermitir_revisar_asiento($this->parametro_auxiliarLogic->getparametro_auxiliar()->getpermitir_revisar_asiento());	
			$this->parametro_auxiliarClase->setnumero_decimales_unidades($this->parametro_auxiliarLogic->getparametro_auxiliar()->getnumero_decimales_unidades());	
			$this->parametro_auxiliarClase->setmostrar_documento_anulado($this->parametro_auxiliarLogic->getparametro_auxiliar()->getmostrar_documento_anulado());	
			$this->parametro_auxiliarClase->setsiguiente_numero_correlativo_cc($this->parametro_auxiliarLogic->getparametro_auxiliar()->getsiguiente_numero_correlativo_cc());	
			$this->parametro_auxiliarClase->setcon_eliminacion_fisica_asiento($this->parametro_auxiliarLogic->getparametro_auxiliar()->getcon_eliminacion_fisica_asiento());	
			$this->parametro_auxiliarClase->setsiguiente_numero_correlativo_asiento($this->parametro_auxiliarLogic->getparametro_auxiliar()->getsiguiente_numero_correlativo_asiento());	
			$this->parametro_auxiliarClase->setcon_asiento_simple_factura($this->parametro_auxiliarLogic->getparametro_auxiliar()->getcon_asiento_simple_factura());	
			$this->parametro_auxiliarClase->setcon_codigo_secuencial_cliente($this->parametro_auxiliarLogic->getparametro_auxiliar()->getcon_codigo_secuencial_cliente());	
			$this->parametro_auxiliarClase->setcontador_cliente($this->parametro_auxiliarLogic->getparametro_auxiliar()->getcontador_cliente());	
			$this->parametro_auxiliarClase->setcon_cliente_inactivo($this->parametro_auxiliarLogic->getparametro_auxiliar()->getcon_cliente_inactivo());	
			$this->parametro_auxiliarClase->setcon_codigo_secuencial_proveedor($this->parametro_auxiliarLogic->getparametro_auxiliar()->getcon_codigo_secuencial_proveedor());	
			$this->parametro_auxiliarClase->setcontador_proveedor($this->parametro_auxiliarLogic->getparametro_auxiliar()->getcontador_proveedor());	
			$this->parametro_auxiliarClase->setcon_proveedor_inactivo($this->parametro_auxiliarLogic->getparametro_auxiliar()->getcon_proveedor_inactivo());	
			$this->parametro_auxiliarClase->setabreviatura_registro_tributario($this->parametro_auxiliarLogic->getparametro_auxiliar()->getabreviatura_registro_tributario());	
			$this->parametro_auxiliarClase->setcon_asiento_cheque($this->parametro_auxiliarLogic->getparametro_auxiliar()->getcon_asiento_cheque());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->parametro_auxiliarModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='nombre_asignado') {$this->strMensajenombre_asignado=$strMensajeCampo;}
		if($strNombreCampo=='siguiente_numero_correlativo') {$this->strMensajesiguiente_numero_correlativo=$strMensajeCampo;}
		if($strNombreCampo=='incremento') {$this->strMensajeincremento=$strMensajeCampo;}
		if($strNombreCampo=='mostrar_solo_costo_producto') {$this->strMensajemostrar_solo_costo_producto=$strMensajeCampo;}
		if($strNombreCampo=='con_codigo_secuencial_producto') {$this->strMensajecon_codigo_secuencial_producto=$strMensajeCampo;}
		if($strNombreCampo=='contador_producto') {$this->strMensajecontador_producto=$strMensajeCampo;}
		if($strNombreCampo=='id_tipo_costeo_kardex') {$this->strMensajeid_tipo_costeo_kardex=$strMensajeCampo;}
		if($strNombreCampo=='con_producto_inactivo') {$this->strMensajecon_producto_inactivo=$strMensajeCampo;}
		if($strNombreCampo=='con_busqueda_incremental') {$this->strMensajecon_busqueda_incremental=$strMensajeCampo;}
		if($strNombreCampo=='permitir_revisar_asiento') {$this->strMensajepermitir_revisar_asiento=$strMensajeCampo;}
		if($strNombreCampo=='numero_decimales_unidades') {$this->strMensajenumero_decimales_unidades=$strMensajeCampo;}
		if($strNombreCampo=='mostrar_documento_anulado') {$this->strMensajemostrar_documento_anulado=$strMensajeCampo;}
		if($strNombreCampo=='siguiente_numero_correlativo_cc') {$this->strMensajesiguiente_numero_correlativo_cc=$strMensajeCampo;}
		if($strNombreCampo=='con_eliminacion_fisica_asiento') {$this->strMensajecon_eliminacion_fisica_asiento=$strMensajeCampo;}
		if($strNombreCampo=='siguiente_numero_correlativo_asiento') {$this->strMensajesiguiente_numero_correlativo_asiento=$strMensajeCampo;}
		if($strNombreCampo=='con_asiento_simple_factura') {$this->strMensajecon_asiento_simple_factura=$strMensajeCampo;}
		if($strNombreCampo=='con_codigo_secuencial_cliente') {$this->strMensajecon_codigo_secuencial_cliente=$strMensajeCampo;}
		if($strNombreCampo=='contador_cliente') {$this->strMensajecontador_cliente=$strMensajeCampo;}
		if($strNombreCampo=='con_cliente_inactivo') {$this->strMensajecon_cliente_inactivo=$strMensajeCampo;}
		if($strNombreCampo=='con_codigo_secuencial_proveedor') {$this->strMensajecon_codigo_secuencial_proveedor=$strMensajeCampo;}
		if($strNombreCampo=='contador_proveedor') {$this->strMensajecontador_proveedor=$strMensajeCampo;}
		if($strNombreCampo=='con_proveedor_inactivo') {$this->strMensajecon_proveedor_inactivo=$strMensajeCampo;}
		if($strNombreCampo=='abreviatura_registro_tributario') {$this->strMensajeabreviatura_registro_tributario=$strMensajeCampo;}
		if($strNombreCampo=='con_asiento_cheque') {$this->strMensajecon_asiento_cheque=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajenombre_asignado='';
		$this->strMensajesiguiente_numero_correlativo='';
		$this->strMensajeincremento='';
		$this->strMensajemostrar_solo_costo_producto='';
		$this->strMensajecon_codigo_secuencial_producto='';
		$this->strMensajecontador_producto='';
		$this->strMensajeid_tipo_costeo_kardex='';
		$this->strMensajecon_producto_inactivo='';
		$this->strMensajecon_busqueda_incremental='';
		$this->strMensajepermitir_revisar_asiento='';
		$this->strMensajenumero_decimales_unidades='';
		$this->strMensajemostrar_documento_anulado='';
		$this->strMensajesiguiente_numero_correlativo_cc='';
		$this->strMensajecon_eliminacion_fisica_asiento='';
		$this->strMensajesiguiente_numero_correlativo_asiento='';
		$this->strMensajecon_asiento_simple_factura='';
		$this->strMensajecon_codigo_secuencial_cliente='';
		$this->strMensajecontador_cliente='';
		$this->strMensajecon_cliente_inactivo='';
		$this->strMensajecon_codigo_secuencial_proveedor='';
		$this->strMensajecontador_proveedor='';
		$this->strMensajecon_proveedor_inactivo='';
		$this->strMensajeabreviatura_registro_tributario='';
		$this->strMensajecon_asiento_cheque='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
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
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}

			$parametro_auxiliar_session=unserialize($this->Session->read(parametro_auxiliar_util::$STR_SESSION_NAME));
						
			if($parametro_auxiliar_session==null) {
				$parametro_auxiliar_session=new parametro_auxiliar_session();
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
						$this->parametro_auxiliarLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->parametro_auxiliarActual =$this->parametro_auxiliarClase;
			
			/*$this->parametro_auxiliarActual =$this->migrarModelparametro_auxiliar($this->parametro_auxiliarClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->parametro_auxiliarLogic->getparametro_auxiliars(),$this->parametro_auxiliarActual);
			
			$this->actualizarControllerConReturnGeneral($this->parametro_auxiliarReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
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
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$parametro_auxiliarsLocal=$this->getListaActual();
		
		$iIndice=parametro_auxiliar_util::getIndiceNuevo($parametro_auxiliarsLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(parametro_auxiliar $parametro_auxiliar,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$parametro_auxiliarsLocal=$this->getListaActual();
		
		$iIndice=parametro_auxiliar_util::getIndiceActual($parametro_auxiliarsLocal,$parametro_auxiliar,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevoparametro_auxiliar')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->parametro_auxiliarActual =$this->parametro_auxiliarClase;
			
			/*$this->parametro_auxiliarActual =$this->migrarModelparametro_auxiliar($this->parametro_auxiliarClase);*/
			
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
			
			$this->parametro_auxiliarLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_costeo_kardex');$classes[]=$class;
			
			$this->parametro_auxiliarLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->parametro_auxiliarLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->parametro_auxiliarLogic->setparametro_auxiliar(new parametro_auxiliar());
				
				$this->parametro_auxiliarLogic->getparametro_auxiliar()->setIsNew(true);
				$this->parametro_auxiliarLogic->getparametro_auxiliar()->setIsChanged(true);
				$this->parametro_auxiliarLogic->getparametro_auxiliar()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->parametro_auxiliarModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->parametro_auxiliarLogic->parametro_auxiliars[]=$this->parametro_auxiliarLogic->getparametro_auxiliar();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->parametro_auxiliarLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->parametro_auxiliarLogic->saveRelaciones($this->parametro_auxiliarLogic->getparametro_auxiliar());/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->parametro_auxiliarLogic->getparametro_auxiliar()->setIsChanged(true);
				$this->parametro_auxiliarLogic->getparametro_auxiliar()->setIsNew(false);
				$this->parametro_auxiliarLogic->getparametro_auxiliar()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->parametro_auxiliarModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->parametro_auxiliarLogic->getparametro_auxiliar(),$this->parametro_auxiliarLogic->getparametro_auxiliars());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->parametro_auxiliarLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->parametro_auxiliarLogic->saveRelaciones($this->parametro_auxiliarLogic->getparametro_auxiliar());/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->parametro_auxiliarLogic->getparametro_auxiliar()->setIsDeleted(true);
				$this->parametro_auxiliarLogic->getparametro_auxiliar()->setIsNew(false);
				$this->parametro_auxiliarLogic->getparametro_auxiliar()->setIsChanged(false);				
				
				$this->actualizarLista($this->parametro_auxiliarLogic->getparametro_auxiliar(),$this->parametro_auxiliarLogic->getparametro_auxiliars());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->parametro_auxiliarLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->parametro_auxiliarLogic->saveRelaciones($this->parametro_auxiliarLogic->getparametro_auxiliar());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->parametro_auxiliarsEliminados[]=$this->parametro_auxiliarLogic->getparametro_auxiliar();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->parametro_auxiliarLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->parametro_auxiliarLogic->saveRelaciones($this->parametro_auxiliarLogic->getparametro_auxiliar());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->parametro_auxiliarsEliminados=array();
				}
			}
			
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_costeo_kardex');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->parametro_auxiliarLogic->setparametro_auxiliars();*/
					
					$this->parametro_auxiliarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->parametro_auxiliarLogic->setIsConDeepLoad(false);
			
			$this->parametro_auxiliars=$this->parametro_auxiliarLogic->getparametro_auxiliars();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(parametro_auxiliar_util::$STR_SESSION_NAME.'Lista',serialize($this->parametro_auxiliars));
				$this->Session->write(parametro_auxiliar_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->parametro_auxiliarsEliminados));
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
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
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
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalparametro_auxiliar;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->parametro_auxiliarLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->parametro_auxiliars as $parametro_auxiliarLocal) {
				if($this->parametro_auxiliarLogic->getparametro_auxiliar()->getId()==$parametro_auxiliarLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->parametro_auxiliarLogic->getparametro_auxiliar()->setIsDeleted(true);
			$this->parametro_auxiliarsEliminados[]=$this->parametro_auxiliarLogic->getparametro_auxiliar();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->parametro_auxiliars[$indice]);
				
				$this->parametro_auxiliars = array_values($this->parametro_auxiliars);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelparametro_auxiliar($this->parametro_auxiliarClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(parametro_auxiliar $parametro_auxiliar,array $parametro_auxiliars) {
		try {
			foreach($parametro_auxiliars as $parametro_auxiliarLocal){ 
				if($parametro_auxiliarLocal->getId()==$parametro_auxiliar->getId()) {
					$parametro_auxiliarLocal->setIsChanged($parametro_auxiliar->getIsChanged());
					$parametro_auxiliarLocal->setIsNew($parametro_auxiliar->getIsNew());
					$parametro_auxiliarLocal->setIsDeleted($parametro_auxiliar->getIsDeleted());
					//$parametro_auxiliarLocal->setbitExpired($parametro_auxiliar->getbitExpired());
					
					$parametro_auxiliarLocal->setId($parametro_auxiliar->getId());	
					$parametro_auxiliarLocal->setVersionRow($parametro_auxiliar->getVersionRow());	
					$parametro_auxiliarLocal->setVersionRow($parametro_auxiliar->getVersionRow());	
					$parametro_auxiliarLocal->setid_empresa($parametro_auxiliar->getid_empresa());	
					$parametro_auxiliarLocal->setnombre_asignado($parametro_auxiliar->getnombre_asignado());	
					$parametro_auxiliarLocal->setsiguiente_numero_correlativo($parametro_auxiliar->getsiguiente_numero_correlativo());	
					$parametro_auxiliarLocal->setincremento($parametro_auxiliar->getincremento());	
					$parametro_auxiliarLocal->setmostrar_solo_costo_producto($parametro_auxiliar->getmostrar_solo_costo_producto());	
					$parametro_auxiliarLocal->setcon_codigo_secuencial_producto($parametro_auxiliar->getcon_codigo_secuencial_producto());	
					$parametro_auxiliarLocal->setcontador_producto($parametro_auxiliar->getcontador_producto());	
					$parametro_auxiliarLocal->setid_tipo_costeo_kardex($parametro_auxiliar->getid_tipo_costeo_kardex());	
					$parametro_auxiliarLocal->setcon_producto_inactivo($parametro_auxiliar->getcon_producto_inactivo());	
					$parametro_auxiliarLocal->setcon_busqueda_incremental($parametro_auxiliar->getcon_busqueda_incremental());	
					$parametro_auxiliarLocal->setpermitir_revisar_asiento($parametro_auxiliar->getpermitir_revisar_asiento());	
					$parametro_auxiliarLocal->setnumero_decimales_unidades($parametro_auxiliar->getnumero_decimales_unidades());	
					$parametro_auxiliarLocal->setmostrar_documento_anulado($parametro_auxiliar->getmostrar_documento_anulado());	
					$parametro_auxiliarLocal->setsiguiente_numero_correlativo_cc($parametro_auxiliar->getsiguiente_numero_correlativo_cc());	
					$parametro_auxiliarLocal->setcon_eliminacion_fisica_asiento($parametro_auxiliar->getcon_eliminacion_fisica_asiento());	
					$parametro_auxiliarLocal->setsiguiente_numero_correlativo_asiento($parametro_auxiliar->getsiguiente_numero_correlativo_asiento());	
					$parametro_auxiliarLocal->setcon_asiento_simple_factura($parametro_auxiliar->getcon_asiento_simple_factura());	
					$parametro_auxiliarLocal->setcon_codigo_secuencial_cliente($parametro_auxiliar->getcon_codigo_secuencial_cliente());	
					$parametro_auxiliarLocal->setcontador_cliente($parametro_auxiliar->getcontador_cliente());	
					$parametro_auxiliarLocal->setcon_cliente_inactivo($parametro_auxiliar->getcon_cliente_inactivo());	
					$parametro_auxiliarLocal->setcon_codigo_secuencial_proveedor($parametro_auxiliar->getcon_codigo_secuencial_proveedor());	
					$parametro_auxiliarLocal->setcontador_proveedor($parametro_auxiliar->getcontador_proveedor());	
					$parametro_auxiliarLocal->setcon_proveedor_inactivo($parametro_auxiliar->getcon_proveedor_inactivo());	
					$parametro_auxiliarLocal->setabreviatura_registro_tributario($parametro_auxiliar->getabreviatura_registro_tributario());	
					$parametro_auxiliarLocal->setcon_asiento_cheque($parametro_auxiliar->getcon_asiento_cheque());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$parametro_auxiliarsLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$parametro_auxiliarsLocal=$this->parametro_auxiliarLogic->getparametro_auxiliars();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$parametro_auxiliarsLocal=$this->parametro_auxiliars;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $parametro_auxiliarsLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->parametro_auxiliarLogic->getparametro_auxiliars() as $parametro_auxiliar) {
				if($parametro_auxiliar->getId()==$id) {
					$this->parametro_auxiliarLogic->setparametro_auxiliar($parametro_auxiliar);
					
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
		/*$parametro_auxiliarsSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->parametro_auxiliars as $parametro_auxiliar) {
			$parametro_auxiliar->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->parametro_auxiliars[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : parametro_auxiliar_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$parametro_auxiliar_session=unserialize($this->Session->read(parametro_auxiliar_util::$STR_SESSION_NAME));
						
		if($parametro_auxiliar_session==null) {
			$parametro_auxiliar_session=new parametro_auxiliar_session();
		}
		
		
		$this->parametro_auxiliarReturnGeneral=new parametro_auxiliar_param_return();
		$this->parametro_auxiliarParameterGeneral=new parametro_auxiliar_param_return();
			
		$this->parametro_auxiliarParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualparametro_auxiliar(this.parametro_auxiliar,true);
			this.setVariablesFormularioToObjetoActualForeignKeysparametro_auxiliar(this.parametro_auxiliar);*/
			
			if($parametro_auxiliar_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualparametro_auxiliar(this.parametro_auxiliar,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->parametro_auxiliarActual=$this->parametro_auxiliarClase;
				
				$this->setCopiarVariablesObjetos($this->parametro_auxiliarActual,$this->parametro_auxiliar,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->parametro_auxiliarReturnGeneral=$this->parametro_auxiliarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->parametro_auxiliarLogic->getparametro_auxiliars(),$this->parametro_auxiliar,$this->parametro_auxiliarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($parametro_auxiliar_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanparametro_auxiliar($classes,$this->parametro_auxiliarReturnGeneral,$this->parametro_auxiliarBean,false);*/
				}
					
				if($this->parametro_auxiliarReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->parametro_auxiliarReturnGeneral->getparametro_auxiliar(),$this->parametro_auxiliarActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeyparametro_auxiliar($this->parametro_auxiliarReturnGeneral->getparametro_auxiliar());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormularioparametro_auxiliar($this->parametro_auxiliarReturnGeneral->getparametro_auxiliar());*/
				}
					
				if($this->parametro_auxiliarReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->parametro_auxiliarReturnGeneral->getparametro_auxiliar(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->parametro_auxiliar,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(parametro_auxiliarJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualparametro_auxiliar(this.parametro_auxiliar,true);
				this.setVariablesFormularioToObjetoActualForeignKeysparametro_auxiliar(this.parametro_auxiliar);				
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
				
				if($this->parametro_auxiliarAnterior!=null) {
					$this->parametro_auxiliar=$this->parametro_auxiliarAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->parametro_auxiliarReturnGeneral=$this->parametro_auxiliarLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->parametro_auxiliarLogic->getparametro_auxiliars(),$this->parametro_auxiliar,$this->parametro_auxiliarParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->parametro_auxiliarReturnGeneral->getparametro_auxiliar(),$this->parametro_auxiliarLogic->getparametro_auxiliars());
			*/
		}
		
		return $this->parametro_auxiliarReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}

			$this->parametro_auxiliarReturnGeneral=new parametro_auxiliar_param_return();			
			$this->parametro_auxiliarParameterGeneral=new parametro_auxiliar_param_return();
			
			$this->parametro_auxiliarParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->parametro_auxiliarReturnGeneral=$this->parametro_auxiliarLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->parametro_auxiliars,$this->parametro_auxiliarParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->parametro_auxiliarReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->parametro_auxiliarReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->parametro_auxiliarReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
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
		
		$this->parametro_auxiliarReturnGeneral=new parametro_auxiliar_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_parametro_auxiliar') {
		    $sDominio='parametro_auxiliar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->parametro_auxiliarReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->parametro_auxiliarReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='parametro_auxiliar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='parametro_auxiliar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='parametro_auxiliar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->parametro_auxiliarReturnGeneral=new parametro_auxiliar_param_return();
		$this->parametro_auxiliarParameterGeneral=new parametro_auxiliar_param_return();
			
		$this->parametro_auxiliarParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->parametro_auxiliarReturnGeneral=$this->parametro_auxiliarLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->parametro_auxiliarLogic->getparametro_auxiliars(),$this->parametro_auxiliar,$this->parametro_auxiliarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->parametro_auxiliarReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->parametro_auxiliarReturnGeneral->getparametro_auxiliar(),$classes);*/
		}									
	
		if($this->parametro_auxiliarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->parametro_auxiliarReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->parametro_auxiliarReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $parametro_auxiliars,parametro_auxiliar $parametro_auxiliar) {
		
		$parametro_auxiliar_session=unserialize($this->Session->read(parametro_auxiliar_util::$STR_SESSION_NAME));
						
		if($parametro_auxiliar_session==null) {
			$parametro_auxiliar_session=new parametro_auxiliar_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(parametro_auxiliar_util::$CLASSNAME);
			}	
			*/
			
			$this->parametro_auxiliarReturnGeneral=new parametro_auxiliar_param_return();
			$this->parametro_auxiliarParameterGeneral=new parametro_auxiliar_param_return();
			
			$this->parametro_auxiliarParameterGeneral->setdata($this->data);
		
		
			
		if($parametro_auxiliar_session->conGuardarRelaciones) {
			$classes=parametro_auxiliar_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->parametro_auxiliarActual,$this->parametro_auxiliar,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->parametro_auxiliarReturnGeneral=$this->parametro_auxiliarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->parametro_auxiliarLogic->getparametro_auxiliars(),$this->parametro_auxiliarActual,$this->parametro_auxiliarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->parametro_auxiliarReturnGeneral=$this->parametro_auxiliarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$parametro_auxiliars,$parametro_auxiliar,$this->parametro_auxiliarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelparametro_auxiliar($this->parametro_auxiliarLogic->getparametro_auxiliar());*/
			
			$this->parametro_auxiliar=$this->parametro_auxiliarLogic->getparametro_auxiliar();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->parametro_auxiliar);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$parametro_auxiliarActual=new parametro_auxiliar();
			
			if($this->parametro_auxiliarClase==null) {		
				$this->parametro_auxiliarClase=new parametro_auxiliar();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$parametro_auxiliarActual=$this->parametro_auxiliars[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setnombre_asignado($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setsiguiente_numero_correlativo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setincremento((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setmostrar_solo_costo_producto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_7')));  } else { $parametro_auxiliarActual->setmostrar_solo_costo_producto(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcon_codigo_secuencial_producto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_8')));  } else { $parametro_auxiliarActual->setcon_codigo_secuencial_producto(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcontador_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setid_tipo_costeo_kardex((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcon_producto_inactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_11')));  } else { $parametro_auxiliarActual->setcon_producto_inactivo(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcon_busqueda_incremental(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_12')));  } else { $parametro_auxiliarActual->setcon_busqueda_incremental(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setpermitir_revisar_asiento(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_13')));  } else { $parametro_auxiliarActual->setpermitir_revisar_asiento(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setnumero_decimales_unidades((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setmostrar_documento_anulado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_15')));  } else { $parametro_auxiliarActual->setmostrar_documento_anulado(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setsiguiente_numero_correlativo_cc((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcon_eliminacion_fisica_asiento(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_17')));  } else { $parametro_auxiliarActual->setcon_eliminacion_fisica_asiento(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setsiguiente_numero_correlativo_asiento((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcon_asiento_simple_factura(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_19')));  } else { $parametro_auxiliarActual->setcon_asiento_simple_factura(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcon_codigo_secuencial_cliente(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_20')));  } else { $parametro_auxiliarActual->setcon_codigo_secuencial_cliente(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcontador_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcon_cliente_inactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_22')));  } else { $parametro_auxiliarActual->setcon_cliente_inactivo(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcon_codigo_secuencial_proveedor(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_23')));  } else { $parametro_auxiliarActual->setcon_codigo_secuencial_proveedor(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_24','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcontador_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_24'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_25','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcon_proveedor_inactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_25')));  } else { $parametro_auxiliarActual->setcon_proveedor_inactivo(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_26','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setabreviatura_registro_tributario($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_26'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_27','t'.$this->strSufijo)) {  $parametro_auxiliarActual->setcon_asiento_cheque(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_27')));  } else { $parametro_auxiliarActual->setcon_asiento_cheque(false); }

				$this->parametro_auxiliarClase=$parametro_auxiliarActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->parametro_auxiliarModel->set($this->parametro_auxiliarClase);
				
				/*$this->parametro_auxiliarModel->set($this->migrarModelparametro_auxiliar($this->parametro_auxiliarClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->parametro_auxiliars=$this->migrarModelparametro_auxiliar($this->parametro_auxiliarLogic->getparametro_auxiliars());							
		$this->parametro_auxiliars=$this->parametro_auxiliarLogic->getparametro_auxiliars();*/
		
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
			$this->Session->write(parametro_auxiliar_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$parametro_auxiliar_control_session=unserialize($this->Session->read(parametro_auxiliar_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($parametro_auxiliar_control_session==null) {
				$parametro_auxiliar_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($parametro_auxiliar_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(parametro_auxiliar_util::$STR_SESSION_NAME,$this);*/
		} else {
			$parametro_auxiliar_session=unserialize($this->Session->read(parametro_auxiliar_util::$STR_SESSION_NAME));
			
			if($parametro_auxiliar_session==null) {
				$parametro_auxiliar_session=new parametro_auxiliar_session();
			}
			
			$this->set(parametro_auxiliar_util::$STR_SESSION_NAME, $parametro_auxiliar_session);
		}
	}
	
	public function setCopiarVariablesObjetos(parametro_auxiliar $parametro_auxiliarOrigen,parametro_auxiliar $parametro_auxiliar,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($parametro_auxiliar==null) {
				$parametro_auxiliar=new parametro_auxiliar();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getId()!=null && $parametro_auxiliarOrigen->getId()!=0)) {$parametro_auxiliar->setId($parametro_auxiliarOrigen->getId());}}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getnombre_asignado()!=null && $parametro_auxiliarOrigen->getnombre_asignado()!='')) {$parametro_auxiliar->setnombre_asignado($parametro_auxiliarOrigen->getnombre_asignado());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getsiguiente_numero_correlativo()!=null && $parametro_auxiliarOrigen->getsiguiente_numero_correlativo()!=0)) {$parametro_auxiliar->setsiguiente_numero_correlativo($parametro_auxiliarOrigen->getsiguiente_numero_correlativo());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getincremento()!=null && $parametro_auxiliarOrigen->getincremento()!=0)) {$parametro_auxiliar->setincremento($parametro_auxiliarOrigen->getincremento());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getmostrar_solo_costo_producto()!=null && $parametro_auxiliarOrigen->getmostrar_solo_costo_producto()!=false)) {$parametro_auxiliar->setmostrar_solo_costo_producto($parametro_auxiliarOrigen->getmostrar_solo_costo_producto());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getcon_codigo_secuencial_producto()!=null && $parametro_auxiliarOrigen->getcon_codigo_secuencial_producto()!=false)) {$parametro_auxiliar->setcon_codigo_secuencial_producto($parametro_auxiliarOrigen->getcon_codigo_secuencial_producto());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getcontador_producto()!=null && $parametro_auxiliarOrigen->getcontador_producto()!=0)) {$parametro_auxiliar->setcontador_producto($parametro_auxiliarOrigen->getcontador_producto());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getid_tipo_costeo_kardex()!=null && $parametro_auxiliarOrigen->getid_tipo_costeo_kardex()!=-1)) {$parametro_auxiliar->setid_tipo_costeo_kardex($parametro_auxiliarOrigen->getid_tipo_costeo_kardex());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getcon_producto_inactivo()!=null && $parametro_auxiliarOrigen->getcon_producto_inactivo()!=false)) {$parametro_auxiliar->setcon_producto_inactivo($parametro_auxiliarOrigen->getcon_producto_inactivo());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getcon_busqueda_incremental()!=null && $parametro_auxiliarOrigen->getcon_busqueda_incremental()!=false)) {$parametro_auxiliar->setcon_busqueda_incremental($parametro_auxiliarOrigen->getcon_busqueda_incremental());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getpermitir_revisar_asiento()!=null && $parametro_auxiliarOrigen->getpermitir_revisar_asiento()!=false)) {$parametro_auxiliar->setpermitir_revisar_asiento($parametro_auxiliarOrigen->getpermitir_revisar_asiento());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getnumero_decimales_unidades()!=null && $parametro_auxiliarOrigen->getnumero_decimales_unidades()!=0)) {$parametro_auxiliar->setnumero_decimales_unidades($parametro_auxiliarOrigen->getnumero_decimales_unidades());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getmostrar_documento_anulado()!=null && $parametro_auxiliarOrigen->getmostrar_documento_anulado()!=false)) {$parametro_auxiliar->setmostrar_documento_anulado($parametro_auxiliarOrigen->getmostrar_documento_anulado());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getsiguiente_numero_correlativo_cc()!=null && $parametro_auxiliarOrigen->getsiguiente_numero_correlativo_cc()!=0)) {$parametro_auxiliar->setsiguiente_numero_correlativo_cc($parametro_auxiliarOrigen->getsiguiente_numero_correlativo_cc());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getcon_eliminacion_fisica_asiento()!=null && $parametro_auxiliarOrigen->getcon_eliminacion_fisica_asiento()!=false)) {$parametro_auxiliar->setcon_eliminacion_fisica_asiento($parametro_auxiliarOrigen->getcon_eliminacion_fisica_asiento());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getsiguiente_numero_correlativo_asiento()!=null && $parametro_auxiliarOrigen->getsiguiente_numero_correlativo_asiento()!=0)) {$parametro_auxiliar->setsiguiente_numero_correlativo_asiento($parametro_auxiliarOrigen->getsiguiente_numero_correlativo_asiento());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getcon_asiento_simple_factura()!=null && $parametro_auxiliarOrigen->getcon_asiento_simple_factura()!=false)) {$parametro_auxiliar->setcon_asiento_simple_factura($parametro_auxiliarOrigen->getcon_asiento_simple_factura());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getcon_codigo_secuencial_cliente()!=null && $parametro_auxiliarOrigen->getcon_codigo_secuencial_cliente()!=false)) {$parametro_auxiliar->setcon_codigo_secuencial_cliente($parametro_auxiliarOrigen->getcon_codigo_secuencial_cliente());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getcontador_cliente()!=null && $parametro_auxiliarOrigen->getcontador_cliente()!=0)) {$parametro_auxiliar->setcontador_cliente($parametro_auxiliarOrigen->getcontador_cliente());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getcon_cliente_inactivo()!=null && $parametro_auxiliarOrigen->getcon_cliente_inactivo()!=false)) {$parametro_auxiliar->setcon_cliente_inactivo($parametro_auxiliarOrigen->getcon_cliente_inactivo());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getcon_codigo_secuencial_proveedor()!=null && $parametro_auxiliarOrigen->getcon_codigo_secuencial_proveedor()!=false)) {$parametro_auxiliar->setcon_codigo_secuencial_proveedor($parametro_auxiliarOrigen->getcon_codigo_secuencial_proveedor());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getcontador_proveedor()!=null && $parametro_auxiliarOrigen->getcontador_proveedor()!=0)) {$parametro_auxiliar->setcontador_proveedor($parametro_auxiliarOrigen->getcontador_proveedor());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getcon_proveedor_inactivo()!=null && $parametro_auxiliarOrigen->getcon_proveedor_inactivo()!=false)) {$parametro_auxiliar->setcon_proveedor_inactivo($parametro_auxiliarOrigen->getcon_proveedor_inactivo());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getabreviatura_registro_tributario()!=null && $parametro_auxiliarOrigen->getabreviatura_registro_tributario()!='')) {$parametro_auxiliar->setabreviatura_registro_tributario($parametro_auxiliarOrigen->getabreviatura_registro_tributario());}
			if($conDefault || ($conDefault==false && $parametro_auxiliarOrigen->getcon_asiento_cheque()!=null && $parametro_auxiliarOrigen->getcon_asiento_cheque()!=false)) {$parametro_auxiliar->setcon_asiento_cheque($parametro_auxiliarOrigen->getcon_asiento_cheque());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$parametro_auxiliarsSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$parametro_auxiliarsSeleccionados[]=$this->parametro_auxiliars[$indice];
			}
		}
		
		return $parametro_auxiliarsSeleccionados;
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
		$parametro_auxiliar= new parametro_auxiliar();
		
		foreach($this->parametro_auxiliarLogic->getparametro_auxiliars() as $parametro_auxiliar) {
			
		}		
		
		if($parametro_auxiliar!=null);
	}
	
	public function cargarRelaciones(array $parametro_auxiliars=array()) : array {	
		
		$parametro_auxiliarsRespaldo = array();
		$parametro_auxiliarsLocal = array();
		
		parametro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$parametro_auxiliarsResp=array();
		$classes=array();
			
		
			
			
		$parametro_auxiliarsRespaldo=$this->parametro_auxiliarLogic->getparametro_auxiliars();
			
		$this->parametro_auxiliarLogic->setIsConDeep(true);
		
		$this->parametro_auxiliarLogic->setparametro_auxiliars($parametro_auxiliars);
			
		$this->parametro_auxiliarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$parametro_auxiliarsLocal=$this->parametro_auxiliarLogic->getparametro_auxiliars();
			
		/*RESPALDO*/
		$this->parametro_auxiliarLogic->setparametro_auxiliars($parametro_auxiliarsRespaldo);
			
		$this->parametro_auxiliarLogic->setIsConDeep(false);
		
		if($parametro_auxiliarsResp!=null);
		
		return $parametro_auxiliarsLocal;
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
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(parametro_auxiliar_session $parametro_auxiliar_session) {
		$parametro_auxiliar_session->strTypeOnLoad=$this->strTypeOnLoadparametro_auxiliar;
		$parametro_auxiliar_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarparametro_auxiliar;
		$parametro_auxiliar_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarparametro_auxiliar;
		$parametro_auxiliar_session->bitEsPopup=$this->bitEsPopup;
		$parametro_auxiliar_session->bitEsBusqueda=$this->bitEsBusqueda;
		$parametro_auxiliar_session->strFuncionJs=$this->strFuncionJs;
		/*$parametro_auxiliar_session->strSufijo=$this->strSufijo;*/
		$parametro_auxiliar_session->bitEsRelaciones=$this->bitEsRelaciones;
		$parametro_auxiliar_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, parametro_auxiliar_util::$STR_NOMBRE_CLASE,0,false,false);				
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
		$parametro_auxiliarViewAdditional=new parametro_auxiliarView_add();
		$parametro_auxiliarViewAdditional->parametro_auxiliars=$this->parametro_auxiliars;
		$parametro_auxiliarViewAdditional->Session=$this->Session;
		
		return $parametro_auxiliarViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$parametro_auxiliarsLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$parametro_auxiliarsLocal=$this->parametro_auxiliars;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$parametro_auxiliarsLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($parametro_auxiliarsLocal)<=0) {
					$parametro_auxiliarsLocal=$this->parametro_auxiliars;
				}
			} else {
				$parametro_auxiliarsLocal=$this->parametro_auxiliars;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarparametro_auxiliarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarparametro_auxiliarsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$parametro_auxiliarLogic=new parametro_auxiliar_logic();
		$parametro_auxiliarLogic->setparametro_auxiliars($this->parametro_auxiliars);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_costeo_kardex');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$parametro_auxiliarLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->parametro_auxiliars=$parametro_auxiliarLogic->getparametro_auxiliars();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->parametro_auxiliarsLocal=$this->parametro_auxiliars;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=parametro_auxiliar_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=parametro_auxiliar_util::$STR_TABLE_NAME;		
			
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
			
			$parametro_auxiliars = $this->parametro_auxiliars;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = parametro_auxiliar_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = parametro_auxiliar_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/general/presentation/templating/parametro_auxiliar_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->parametro_auxiliars=$parametro_auxiliars;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->parametro_auxiliarsLocal=$parametro_auxiliarsLocal;
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
		
		$parametro_auxiliarsLocal=array();
		
		$parametro_auxiliarsLocal=$this->parametro_auxiliars;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarparametro_auxiliarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarparametro_auxiliarsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$parametro_auxiliarLogic=new parametro_auxiliar_logic();
		$parametro_auxiliarLogic->setparametro_auxiliars($this->parametro_auxiliars);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_costeo_kardex');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$parametro_auxiliarLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->parametro_auxiliars=$parametro_auxiliarLogic->getparametro_auxiliars();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$parametro_auxiliars = $this->parametro_auxiliars;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = parametro_auxiliar_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = parametro_auxiliar_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/general/presentation/templating/parametro_auxiliar_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->parametro_auxiliars=$parametro_auxiliars;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->parametro_auxiliarsLocal=$parametro_auxiliarsLocal;
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
	
	public function getHtmlTablaDatosResumen(array $parametro_auxiliars=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->parametro_auxiliarsReporte = $parametro_auxiliars;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarparametro_auxiliarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarparametro_auxiliarsAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $parametro_auxiliars=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->parametro_auxiliarsReporte = $parametro_auxiliars;		
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
		
		
		$this->parametro_auxiliarsReporte=$this->cargarRelaciones($parametro_auxiliars);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarparametro_auxiliarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarparametro_auxiliarsAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(parametro_auxiliar $parametro_auxiliar=null) : string {	
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
			
			
			$parametro_auxiliarsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$parametro_auxiliarsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($parametro_auxiliarsLocal)<=0) {
					/*//DEBE ESCOGER
					$parametro_auxiliarsLocal=$this->parametro_auxiliars;*/
				}
			} else {
				/*//DEBE ESCOGER
				$parametro_auxiliarsLocal=$this->parametro_auxiliars;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($parametro_auxiliarsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($parametro_auxiliarsLocal,true);
			
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
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
			}
					
			$parametro_auxiliarsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$parametro_auxiliarsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($parametro_auxiliarsLocal)<=0) {
					/*//DEBE ESCOGER
					$parametro_auxiliarsLocal=$this->parametro_auxiliars;*/
				}
			} else {
				/*//DEBE ESCOGER
				$parametro_auxiliarsLocal=$this->parametro_auxiliars;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($parametro_auxiliarsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($parametro_auxiliarsLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Parametro Auxiliares';
			
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
			$fileName='parametro_auxiliar';
			
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
			
			$title='Reporte de  Parametro Auxiliares';
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
			
			$title='Reporte de  Parametro Auxiliares';
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
				$this->parametro_auxiliarLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Parametro Auxiliares';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->commitNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->parametro_auxiliarLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=parametro_auxiliar_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->parametro_auxiliarsAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_auxiliarsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->parametro_auxiliarsAuxiliar)<=0) {
					$this->parametro_auxiliarsAuxiliar=$this->parametro_auxiliars;
				}
			} else {
				$this->parametro_auxiliarsAuxiliar=$this->parametro_auxiliars;
			}
		/*} else {
			$this->parametro_auxiliarsAuxiliar=$this->parametro_auxiliarsReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->parametro_auxiliarsAuxiliar as $parametro_auxiliar) {
				$row=array();
				
				$row=parametro_auxiliar_util::getDataReportRow($tipo,$parametro_auxiliar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			parametro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$parametro_auxiliarsResp=array();
			$classes=array();
			
			
			
			
			$parametro_auxiliarsResp=$this->parametro_auxiliarLogic->getparametro_auxiliars();
			
			$this->parametro_auxiliarLogic->setIsConDeep(true);
			
			$this->parametro_auxiliarLogic->setparametro_auxiliars($this->parametro_auxiliarsAuxiliar);
			
			$this->parametro_auxiliarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->parametro_auxiliarsAuxiliar=$this->parametro_auxiliarLogic->getparametro_auxiliars();
			
			//RESPALDO
			$this->parametro_auxiliarLogic->setparametro_auxiliars($parametro_auxiliarsResp);
			
			$this->parametro_auxiliarLogic->setIsConDeep(false);
			*/
			
			$this->parametro_auxiliarsAuxiliar=$this->cargarRelaciones($this->parametro_auxiliarsAuxiliar);
			
			$i=0;
			
			foreach ($this->parametro_auxiliarsAuxiliar as $parametro_auxiliar) {
				$row=array();
				
				if($i!=0) {
					$row=parametro_auxiliar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=parametro_auxiliar_util::getDataReportRow($tipo,$parametro_auxiliar,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
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
		$this->parametro_auxiliarsAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_auxiliarsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->parametro_auxiliarsAuxiliar)<=0) {
					$this->parametro_auxiliarsAuxiliar=$this->parametro_auxiliars;
				}
			} else {
				$this->parametro_auxiliarsAuxiliar=$this->parametro_auxiliars;
			}
		/*} else {
			$this->parametro_auxiliarsAuxiliar=$this->parametro_auxiliarsReporte;	
		}*/
		
		foreach ($this->parametro_auxiliarsAuxiliar as $parametro_auxiliar) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(parametro_auxiliar_util::getparametro_auxiliarDescripcion($parametro_auxiliar),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre Asignado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Asignado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getnombre_asignado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Siguiente Numero Correlativo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Siguiente Numero Correlativo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getsiguiente_numero_correlativo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Incremento',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getincremento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Mostrar Solo Costo Producto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Mostrar Solo Costo Producto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getmostrar_solo_costo_producto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Codigo Secuencial Producto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Codigo Secuencial Producto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getcon_codigo_secuencial_producto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Contador Producto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Contador Producto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getcontador_producto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Tipo Costeo Kardex',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Tipo Costeo Kardex',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getid_tipo_costeo_kardexDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Producto Inactivo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Producto Inactivo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getcon_producto_inactivo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Busqueda Incremental',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Busqueda Incremental',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getcon_busqueda_incremental(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Permitir Revisar Asiento',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Permitir Revisar Asiento',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getpermitir_revisar_asiento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero Decimales Unidades',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Decimales Unidades',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getnumero_decimales_unidades(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Mostrar Documento Anulado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Mostrar Documento Anulado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getmostrar_documento_anulado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Siguiente Numero Correlativo Cc',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Siguiente Numero Correlativo Cc',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getsiguiente_numero_correlativo_cc(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Eliminacion Fisica Asiento',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Eliminacion Fisica Asiento',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getcon_eliminacion_fisica_asiento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Siguiente Numero Correlativo Asiento',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Siguiente Numero Correlativo Asiento',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getsiguiente_numero_correlativo_asiento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Asiento Simple Factura',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Asiento Simple Factura',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getcon_asiento_simple_factura(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Codigo Secuencial Cliente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Codigo Secuencial Cliente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getcon_codigo_secuencial_cliente(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Contador Cliente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Contador Cliente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getcontador_cliente(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Cliente Inactivo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Cliente Inactivo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getcon_cliente_inactivo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Codigo Secuencial Proveedor',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Codigo Secuencial Proveedor',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getcon_codigo_secuencial_proveedor(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Contador Proveedor',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Contador Proveedor',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getcontador_proveedor(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Proveedor Inactivo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Proveedor Inactivo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getcon_proveedor_inactivo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Abreviatura Registro Tributario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Abreviatura Registro Tributario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getabreviatura_registro_tributario(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Asiento Cheque',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Asiento Cheque',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getcon_asiento_cheque(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface parametro_auxiliar_base_controlI {			
		
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
		public function getIndiceActual(parametro_auxiliar $parametro_auxiliar,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(parametro_auxiliar $parametro_auxiliar,array $parametro_auxiliars);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : parametro_auxiliar_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $parametro_auxiliars,parametro_auxiliar $parametro_auxiliar);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(parametro_auxiliar_param_return $parametro_auxiliarReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(parametro_auxiliar_session $parametro_auxiliar_session);		
		public function actualizarInvitadoSessionDivStyleVariables(parametro_auxiliar_session $parametro_auxiliar_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(parametro_auxiliar $parametro_auxiliarOrigen,parametro_auxiliar $parametro_auxiliar,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(parametro_auxiliar_control $parametro_auxiliar_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $parametro_auxiliars=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(parametro_auxiliar_session $parametro_auxiliar_session);		
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
		public function getHtmlTablaDatosResumen(array $parametro_auxiliars=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $parametro_auxiliars=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(parametro_auxiliar $parametro_auxiliar=null) : string;
		
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
